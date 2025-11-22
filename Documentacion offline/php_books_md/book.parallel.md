# parallel

# Introducción

parallel es una extensión de concurrencia paralela para PHP ≥ 7.2.0.
A partir de parallel 1.2.0, PHP ≥ 8.0.0 es requerido.

A continuación se presenta una breve descripción de los conceptos básicos de parallel, se puede encontrar información más detallada en esta sección del manual.

### Ejecución

    Un [parallel\Runtime](#class.parallel-runtime) representa un hilo de intérprete PHP. Un [parallel\Runtime](#class.parallel-runtime) se configura con un fichero de arranque opcional pasado a [parallel\Runtime::__construct()](#parallel-runtime.construct), generalmente un cargador automático,
    o alguna otra rutina de precarga: el fichero de arranque será incluido antes de la ejecución de cualquier tarea.




    Después de la construcción, el [parallel\Runtime](#class.parallel-runtime) permanece disponible hasta que se cierre, se mate, o se destruya por las reglas de ámbito normales de los objetos PHP.
    [parallel\Runtime::run()](#parallel-runtime.run) permite al desarrollador programar tareas para una ejecución paralela.
    Un [parallel\Runtime](#class.parallel-runtime) tiene un orden de programación FIFO, las tareas se ejecutarán en el orden en que se programen.

### API Funcional

    Parallel implementa una API funcional, de alto nivel sobre [parallel\Runtime](#class.parallel-runtime) que proporciona un único punto de entrada para ejecutar código paralelo
    con una programación automática: [parallel\run()](#parallel.run).

### Tareas

    Una tarea (Task) es simplemente una [Closure](#class.closure) destinada a una ejecución paralela. La [Closure](#class.closure) puede contener casi cualquier instrucción, incluyendo cierres anidados.
    Sin embargo, algunas instrucciones están prohibidas en las tareas:



     -
     yield




     -
     use by-reference




     -
     declare class




     -
     declare named function




**Nota**:

     Los cierres anidados pueden usar yield o use by-reference, pero no deben contener declaraciones de clase o funciones nombradas.

**Nota**:

     Ninguna instrucción está prohibida en los ficheros que la tarea puede incluir.

### Future

    El [parallel\Future](#class.parallel-future) se utiliza para acceder al valor de retorno de la tarea, y expone una API para la cancelación de la tarea.

### Canales

    Una tarea puede ser programada con argumentos, usar variables de ámbito léxico (por valor), y devolver un valor (a través de un [parallel\Future](#class.parallel-future)), pero estos solo permiten la comunicación unidireccional:
    Permiten al desarrollador enviar datos a una tarea y recuperar datos de una tarea, pero no permiten la comunicación bidireccional entre las tareas. La API [parallel\Channel](#class.parallel-channel) permite la comunicación bidireccional entre las tareas, un [parallel\Channel](#class.parallel-channel) es un enlace de tipo socket entre las tareas que el desarrollador puede usar para enviar y recibir datos.

### Eventos

    La API [parallel\Events](#class.parallel-events) implementa un bucle de eventos ([Traversable](#class.traversable)) nativo, y el método [parallel\Events::poll()](#parallel-events.poll).
    Esto permite al desarrollador trabajar con conjuntos de canales y/o futuros.
    El desarrollador simplemente añade canales y futuros al bucle de eventos, definiendo opcionalmente la entrada para las escrituras con [parallel\Events::setInput()](#parallel-events.setinput),
    y entra en un bucle foreach: parallel leerá y escribirá en los objetos a medida que se vuelvan disponibles, devolviendo objetos [parallel\Events\Event](#class.parallel-events-event)
    describiendo las operaciones que han ocurrido.

### Ver también

    - [Filosofía](#philosophy.parallel)

# Instalación

### Requerimientos

parallel requiere una compilación de PHP con ZTS (Zend Thread Safety) activado
(**--enable-zts**, o en sistemas no-Windows antes de PHP 8.0.0,
**--enable-maintainer-zts**)

**Precaución**

Zend Thread Safety no puede ser activado después de la compilación; es una opción de configuración de compilación.

parallel debería compilarse en cualquier lugar donde haya un encabezado Posix Threads funcional (pthread.h) y una compilación ZTS de PHP, incluyendo Windows (utilizando el proyecto pthread-w32 de redhat).

### Instalación

Las versiones de parallel son alojadas por PECL y el código fuente por
[» github](https://github.com/krakjoe/parallel),
el método de instalación más simple es la ruta PECL normal:
[» https://pecl.php.net/package/parallel](https://pecl.php.net/package/parallel).

Los usuarios de Windows pueden descargar binarios de versiones precompiladas desde el sitio [» PECL](https://pecl.php.net/package/parallel).

**Precaución**

    Los usuarios de Windows deben tomar la medida adicional de añadir pthreadVC?.dll (distribuido con las versiones de Windows) a su PATH.

# Filosofía

Esta sección contiene filosofías importantes para escribir código paralelo y algunos detalles sobre la implementación interna de parallel.

### No se comunica compartiendo memoria; comparta memoria comunicando.

    Esta filosofía, adoptada por parallel, tiene sus orígenes en Go, una de las plataformas más ampliamente admiradas, si no utilizadas, para escribir código paralelo en este momento.
    Los desarrolladores de Go deben trabajar duro para estar a la altura de este ideal: PHP y parallel hacen todo el trabajo difícil para el programador, y por omisión.




    En los modelos de hilos convencionales encontrados en otros lenguajes, generalmente los hilos se comunican entre sí por el simple hecho de que operan en el mismo espacio de direcciones.
    El desarrollador debe desplegar exclusiones mutuas, variables de condición y otras primitivas de bajo nivel de hilos o sincronización para garantizar una comunicación adecuada del estado y la coherencia.




    Cuando el modelo convencional se invierte, significa que los hilos solo comparten memoria mediante la comunicación (una variable se pasa sobre un canal, por ejemplo).




    Cuando parallel pasa una variable de un hilo a otro por cualquier medio - argumentos de tarea, retorno a través de Future y Channels - se pasa por valor.
    En todos los casos, excepto en el caso de los canales no almacenados en búfer, la variable también se almacena en búfer de modo que no pueda cambiar (o ser destruida) antes de ser utilizada en el hilo
    al que se transmite la variable. Una lectura no almacenada en búfer en un canal es el único caso en el que un hilo lee directamente la memoria asignada por otro hilo, puede hacerlo de manera segura porque
    el hilo que posee la memoria espera a que la lectura termine antes de poder continuar manipulándola, y el hilo que no posee la memoria lee por valor. Cuando
    ambos hilos continúan, ya no comparten memoria.




    Esto hace que escribir y razonar sobre el código paralelo sea mucho más fácil que el modelo convencional de hilos. Esto significa que el programador no necesita considerar que los hilos
    pueden manipular datos simultáneamente, ya que esto no es posible.




    Esto también convierte a PHP en la plataforma perfecta para implementar una API de concurrencia paralela basada en CSP (paso de mensajes sobre canales), ya que PHP en sí mismo no comparte nada -
    los hilos de PHP funcionan en su propio espacio de direcciones virtual por omisión, y por lo tanto solo pueden compartir memoria comunicándose.

### Los datos deben tener un propietario único y definitivo

Cuando se aborda el modelo CSP por primera vez, un programador versado en el modelo tradicional de hilos puede encontrarse buscando estructuras de datos concurrentes,
ya que es a lo que está acostumbrado: pasa objetos compartidos para manipularlos.

Cuando se aborda el modelo CSP, no es necesario que las estructuras de datos sean compartidas por muchas tareas, y de hecho, es más simple si no lo son. Los datos deben ser propiedad
de una sola tarea, las modificaciones (o operaciones) de esta estructura de datos deben ser comunicadas a través de canales y realizadas por el propietario de los datos, el éxito, el fracaso,
o el resultado (estado) del cambio (o de la operación) siendo comunicado de vuelta.

Una vez más, la naturaleza de PHP y la naturaleza de copia por valor de parallel ayuda al desarrollador a alcanzar este objetivo, ningún dato será compartido por accidente,
solo como resultado de la comunicación.

# API Funcional

La API [parallel\Runtime](#class.parallel-runtime) proporciona un alto grado de control al desarrollador PHP experimentado, y a aquellos que están íntimamente familiarizados con la escritura de aplicaciones que utilizan
la concurrencia paralela.

La API funcional proporciona menos control a cambio de la capacidad de tomar decisiones para el desarrollador:

    -
    todos los runtimes en ejecución se inician de manera idéntica




    -
    la programación es determinada por la API, y no por el desarrollador

[parallel\run()](#parallel.run) proporciona la garantía de que la tarea comenzará a ejecutarse en paralelo tan pronto como las restricciones de hardware y del sistema operativo lo permitan, sin
crear innecesariamente espacios de ejecución. Para la mayoría de las aplicaciones, la API funcional debería ser preferida.

# parallel\bootstrap

(1.0.0)

parallel\bootstrap — Inicialización

### Descripción

**parallel\bootstrap**([string](#language.types.string) $file): [void](language.types.void.html)

Utiliza el file proporcionado para inicializar todas las ejecuciones creadas para la planificación automática a través de [parallel\run()](#parallel.run).

### Parámetros

     file


       La ruta del fichero para inicializar todas las ejecuciones.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**Advertencia**

    Lanza una excepción parallel\Runtime\Error\Bootstrap si ya ha sido llamado para este proceso.

**Advertencia**

    Lanza una excepción parallel\Runtime\Error\Bootstrap si es llamado después de [parallel\run()](#parallel.run).

### Ver también

    - [parallel\Runtime::run](#parallel-runtime.run)

# parallel\run

(1.0.0)

parallel\run — Ejecución

### Descripción

**parallel\run**([Closure](#class.closure) $task): [?](#language.types.null)Future

Programa task para ejecución en paralelo.

**parallel\run**([Closure](#class.closure) $task, [array](#language.types.array) $argv): [?](#language.types.null)Future

Programa task para ejecución en paralelo, pasando argv a la ejecución.

### Planificación automática

Si un [\parallel\Runtime](#class.parallel-runtime) creado y almacenado en caché por una llamada previa a **parallel\run()** está inactivo,
se utilizará para ejecutar la tarea. Si ningún [\parallel\Runtime](#class.parallel-runtime) está inactivo, parallel creará y almacenará en caché un
[\parallel\Runtime](#class.parallel-runtime).

**Nota**:

    Los objetos [\parallel\Runtime](#class.parallel-runtime) creados por el desarrollador no se utilizan para la planificación automática.

### Parámetros

    task


      Una [Closure](#class.closure) con características específicas.






    argv


      Un [array](#language.types.array) de argumentos con características específicas para pasar a task en el momento de la ejecución.


### Características de la tarea

Las cierres planificadas para la ejecución en paralelo no deben:

- aceptar o devolver por referencia

- aceptar o devolver objetos internos (ver notas)

- ejecutar un conjunto limitado de instrucciones

Las instrucciones prohibidas en los cierres destinados a la ejecución en paralelo son:

- yield

- usar by-reference

- declarar clases

- declarar funciones nombradas

**Nota**:

Los cierres anidados pueden usar yield o by-reference, pero no deben contener declaraciones de clases o funciones nombradas.

**Nota**:

Ninguna instrucción está prohibida en los ficheros que la tarea puede incluir.

### Características de los argumentos

Los argumentos no deben:

- contener referencias

- contener recursos

- contener objetos internos (ver notas)

**Nota**:

    En el caso de los recursos de flujo de ficheros, el recurso será convertido en descriptor de fichero y pasado en [int](#language.types.integer) si es posible, esto no está soportado en Windows.

### Notas sobre los objetos internos

Los objetos internos utilizan generalmente una estructura personalizada que no puede ser copiada de manera segura por valor, PHP carece actualmente de mecanismos para hacerlo (sin serialización)
y por lo tanto solo los objetos que no utilizan una estructura personalizada pueden ser compartidos.

Algunos objetos internos no utilizan una estructura personalizada, por ejemplo [parallel\Events\Event](#class.parallel-events-event) y por lo tanto pueden ser compartidos.

Los cierres son un tipo especial de objeto interno y soportan ser copiados por valor, y por lo tanto pueden ser compartidos.

Los canales son centrales para la escritura de código paralelo y soportan el acceso y la ejecución concurrentes por necesidad, y por lo tanto pueden ser compartidos.

**Advertencia**

    Una clase de usuario que extiende una clase interna puede usar una estructura personalizada tal como está definida por la clase interna, en cuyo caso no puede ser copiada de manera segura por valor,
    y por lo tanto no puede ser compartida.

### Valores devueltos

**Advertencia**

    El Future devuelto no debe ser ignorado cuando la tarea contiene una declaración de retorno o de lanzamiento.

### Excepciones

**Advertencia**

    Lanza una parallel\Runtime\Error\Closed si [parallel\Runtime](#class.parallel-runtime) estaba cerrado.

**Advertencia**

    Lanza una parallel\Runtime\Error\IllegalFunction si task es un cierre creado a partir de una función interna.

**Advertencia**

    Lanza una parallel\Runtime\Error\IllegalInstruction si task contiene instrucciones ilegales.

**Advertencia**

    Lanza una parallel\Runtime\Error\IllegalParameter si task acepta o argv contiene variables ilegales.

**Advertencia**

    Lanza una parallel\Runtime\Error\IllegalReturn si task devuelve de manera ilegal.

### Ver también

    - [parallel\Runtime::run](#parallel-runtime.run)

## Tabla de contenidos

- [parallel\bootstrap](#parallel.bootstrap) — Inicialización
- [parallel\run](#parallel.run) — Ejecución

# La clase parallel\Runtime

(0.8.0)

    ## Objetos de ejecución


     Cada ejecución representa un solo thread PHP, el thread es creado (e inicializado) durante la construcción.
     El thread espera luego a que se programen tareas: las tareas programadas serán ejecutadas FIFO y luego el thread volverá
     a esperar hasta que se programen otras tareas, o hasta que sea cerrado, eliminado o destruido por las reglas de ámbito normales de los objetos PHP.



    **Advertencia**

      Cuando una ejecución es destruida por las reglas de ámbito normales de los objetos PHP, primero ejecutará todas las tareas que han sido programadas,
      y bloqueará durante este tiempo.







    ## Amortiguación de ejecución


     Cuando se crea una nueva ejecución, no comparte código con el thread (o el proceso) que la creó. Esto significa que no tiene las mismas
     clases y funciones cargadas, ni el mismo cargador automático definido. En algunos casos, una ejecución muy ligera es deseable porque las tareas que
     serán programadas no necesitan acceder al código del thread padre. En los casos en que las tareas necesitan acceder al mismo código, basta con definir
     un cargador automático como amortiguación.



    **Nota**:



      La precarga puede ser utilizada en conjunción con parallel, en este caso el código precargado está disponible sin amortiguación.


## Sinopsis de la Clase

    ****




      final
      class **parallel\Runtime**

     {


    /* Crear */

public [\_\_construct](#parallel-runtime.construct)([string](#language.types.string) $bootstrap)

    /* Ejecutar */
    public [run](#parallel-runtime.run)([Closure](#class.closure) $task): [?](#language.types.null)Future

public [run](#parallel-runtime.run)([Closure](#class.closure) $task, [array](#language.types.array) $argv): [?](#language.types.null)Future

    /* Unir */
    public [close](#parallel-runtime.close)(): [void](language.types.void.html)

public [kill](#parallel-runtime.kill)(): [void](language.types.void.html)

}

# parallel\Runtime::\_\_construct

(0.8.0)

parallel\Runtime::\_\_construct — Construcción de la ejecución

### Descripción

public **parallel\Runtime::\_\_construct**([string](#language.types.string) $bootstrap)

Construye una ejecución amorcada.

### Parámetros

    bootstrap


      La localización de un fichero de amorce, generalmente un cargador automático.


### Excepciones

**Advertencia**

    Lanza una parallel\Runtime\Error si el hilo no ha podido ser creado.

**Advertencia**

    Lanza una parallel\Runtime\Bootstrap si el amorce ha fallado.

# parallel\Runtime::run

(0.8.0)

parallel\Runtime::run — Ejecución

### Descripción

public **parallel\Runtime::run**([Closure](#class.closure) $task): [?](#language.types.null)Future

Planifica task para la ejecución en paralelo.

public **parallel\Runtime::run**([Closure](#class.closure) $task, [array](#language.types.array) $argv): [?](#language.types.null)Future

Planifica task para la ejecución en paralelo, pasando argv en el momento de la ejecución.

### Parámetros

    task


      Una [Closure](#class.closure) con características específicas.






    argv


      Un [array](#language.types.array) de argumentos con características específicas para pasar a task en el momento de la ejecución.


### Características de la tarea

Las cierres planificadas para la ejecución en paralelo no deben:

- aceptar o devolver por referencia

- aceptar o devolver objetos internos (ver notas)

- ejecutar un conjunto limitado de instrucciones

Las instrucciones prohibidas en los cierres destinados a la ejecución en paralelo son:

- yield

- usar by-reference

- declarar clases

- declarar funciones nombradas

**Nota**:

Los cierres anidados pueden usar yield o by-reference, pero no deben contener declaraciones de clases o funciones nombradas.

**Nota**:

Ninguna instrucción está prohibida en los ficheros que la tarea puede incluir.

### Características de los argumentos

Los argumentos no deben:

- contener referencias

- contener recursos

- contener objetos internos (ver notas)

**Nota**:

    En el caso de los recursos de flujo de ficheros, el recurso será convertido en descriptor de fichero y pasado en [int](#language.types.integer) si es posible, esto no está soportado en Windows.

### Notas sobre los objetos internos

Los objetos internos utilizan generalmente una estructura personalizada que no puede ser copiada de manera segura por valor, PHP carece actualmente de mecanismos para hacerlo (sin serialización)
y por lo tanto solo los objetos que no utilizan una estructura personalizada pueden ser compartidos.

Algunos objetos internos no utilizan una estructura personalizada, por ejemplo [parallel\Events\Event](#class.parallel-events-event) y por lo tanto pueden ser compartidos.

Los cierres son un tipo especial de objeto interno y soportan ser copiados por valor, y por lo tanto pueden ser compartidos.

Los canales son centrales para la escritura de código paralelo y soportan el acceso y la ejecución concurrentes por necesidad, y por lo tanto pueden ser compartidos.

**Advertencia**

    Una clase de usuario que extiende una clase interna puede usar una estructura personalizada tal como está definida por la clase interna, en cuyo caso no puede ser copiada de manera segura por valor,
    y por lo tanto no puede ser compartida.

### Valores devueltos

**Advertencia**

    El Future devuelto no debe ser ignorado cuando la tarea contiene una declaración de retorno o de lanzamiento.

### Excepciones

**Advertencia**

    Lanza una parallel\Runtime\Error\Closed si [parallel\Runtime](#class.parallel-runtime) estaba cerrado.

**Advertencia**

    Lanza una parallel\Runtime\Error\IllegalFunction si task es un cierre creado a partir de una función interna.

**Advertencia**

    Lanza una parallel\Runtime\Error\IllegalInstruction si task contiene instrucciones ilegales.

**Advertencia**

    Lanza una parallel\Runtime\Error\IllegalParameter si task acepta o argv contiene variables ilegales.

**Advertencia**

    Lanza una parallel\Runtime\Error\IllegalReturn si task devuelve de manera ilegal.

# parallel\Runtime::close

(0.8.0)

parallel\Runtime::close — Se une graciosamente a la ejecución

### Descripción

public **parallel\Runtime::close**(): [void](language.types.void.html)

Solicita que la ejecución se detenga.

**Nota**:

    Las tareas programadas para la ejecución se ejecutarán antes de que se produzca la detención.

### Excepciones

**Advertencia**

    Lanza una parallel\Runtime\Error\Closed si Runtime ya estaba cerrado.

# parallel\Runtime::kill

(0.8.0)

parallel\Runtime::kill — Se une a la ejecución

### Descripción

public **parallel\Runtime::kill**(): [void](language.types.void.html)

Intenta forzar la detención de la ejecución.

**Nota**:

    Las tareas programadas para la ejecución no se ejecutarán, la tarea en curso será interrumpida.

**Advertencia**

    Las llamadas de funciones internas en curso no pueden ser interrumpidas.

### Excepciones

**Advertencia**

    Lanza una parallel\Runtime\Error\Closed si Runtime ya estaba cerrado.

## Tabla de contenidos

- [parallel\Runtime::\_\_construct](#parallel-runtime.construct) — Construcción de la ejecución
- [parallel\Runtime::run](#parallel-runtime.run) — Ejecución
- [parallel\Runtime::close](#parallel-runtime.close) — Se une graciosamente a la ejecución
- [parallel\Runtime::kill](#parallel-runtime.kill) — Se une a la ejecución

# La clase parallel\Future

(0.8.0)

    ## Futures


     Un Future representa el valor de retorno o la excepción no capturada de una tarea, y expone una API para la cancelación.




      **Ejemplo #1 Ejemplo mostrando Future como valor de retorno**




&lt;?php
$runtime = new \parallel\Runtime;
$future = $runtime-&gt;run(function(){
return "World";
});
printf("Hello %s\n", $future-&gt;value());
?&gt;

      Resultado del ejemplo anterior es similar a:




Hello World

     El comportamiento de un Future permite también su uso como un simple punto de sincronización incluso si la tarea no devuelve explícitamente un valor.




      **Ejemplo #2 Ejemplo mostrando Future como punto de sincronización**




&lt;?php
$runtime = new \parallel\Runtime;
$future = $runtime-&gt;run(function(){
    echo "in child ";
    for ($i = 0; $i &lt; 500; $i++) {
        if ($i % 10 == 0) {
echo ".";
}
}
echo " leaving child";
});

$future-&gt;value();
echo "\nparent continues\n";
?&gt;

      Resultado del ejemplo anterior es similar a:




in child .................................................. leaving child
parent continues

## Sinopsis de la Clase

    ****




      final
      class **parallel\Future**

     {


    /* Resolución */

public [value](#parallel-future.value)(): [mixed](#language.types.mixed)

    /* Estados */
    public [cancelled](#parallel-future.cancelled)(): [bool](#language.types.boolean)

public [done](#parallel-future.done)(): [bool](#language.types.boolean)

    /* Cancelación */
    public [cancel](#parallel-future.cancel)(): [bool](#language.types.boolean)

}

# parallel\Future::cancel

(0.9.0)

parallel\Future::cancel — Cancelación

### Descripción

public **parallel\Future::cancel**(): [bool](#language.types.boolean)

    Intenta cancelar la tarea.

**Nota**:

    Si la tarea está en ejecución, será interrumpida.

**Advertencia**

    Las llamadas de funciones internas en curso no pueden ser interrumpidas.

### Excepciones

**Advertencia**

    Lanza una parallel\Future\Error\Killed si la tarea ejecutada por [parallel\Runtime](#class.parallel-runtime) ha sido interrumpida.

**Advertencia**

    Lanza una parallel\Future\Error\Cancelled si la tarea ya ha sido cancelada.

# parallel\Future::cancelled

(0.9.0)

parallel\Future::cancelled — Detección de estado

### Descripción

public **parallel\Future::cancelled**(): [bool](#language.types.boolean)

Indica si la tarea ha sido cancelada.

# parallel\Future::done

(0.8.0)

parallel\Future::done — Detección de estado

### Descripción

public **parallel\Future::done**(): [bool](#language.types.boolean)

Indica si la tarea está terminada.

# parallel\Future::value

(0.8.0)

parallel\Future::value — Resolución

### Descripción

public **parallel\Future::value**(): [mixed](#language.types.mixed)

Devuelve (y espera si es necesario) el retorno de la tarea.

### Excepciones

**Advertencia**

    Lanza una parallel\Future\Error si la espera ha fallado (error interno).

**Advertencia**

    Lanza una parallel\Future\Error\Killed si la tarea ejecutada por [parallel\Runtime](#class.parallel-runtime) ha sido interrumpida.

**Advertencia**

    Lanza una parallel\Future\Error\Cancelled si la tarea ha sido cancelada.

**Advertencia**

    Lanza una parallel\Future\Error\Foreign si la tarea ha levantado una excepción no reconocida.

**Advertencia**

    Relaunch una [Throwable](#class.throwable) no atrapada en la tarea.

## Tabla de contenidos

- [parallel\Future::cancel](#parallel-future.cancel) — Cancelación
- [parallel\Future::cancelled](#parallel-future.cancelled) — Detección de estado
- [parallel\Future::done](#parallel-future.done) — Detección de estado
- [parallel\Future::value](#parallel-future.value) — Resolución

# La clase parallel\Channel

(0.9.0)

    ## canales no tamponados


     Un canal no tamponado bloqueará las llamadas a [parallel\Channel::send()](#parallel-channel.send) hasta que haya un receptor, y bloqueará las llamadas a
     [parallel\Channel::recv()](#parallel-channel.recv) hasta que haya un emisor. Esto significa que un canal no tamponado no es solo un medio para compartir datos entre las tareas
     sino también un método simple de sincronización.




     Un canal no tamponado es la forma más rápida de compartir datos entre las tareas, requiriendo la menor cantidad de copias.






    ## canales tamponados


     Un canal tamponado no bloqueará las llamadas a [parallel\Channel::send()](#parallel-channel.send) hasta que se alcance la capacidad, las llamadas a
     [parallel\Channel::recv()](#parallel-channel.recv) bloquearán hasta que haya datos en el búfer.






    ## Cierres en los canales


     Una funcionalidad poderosa de los canales paralelos es que permiten el intercambio de cierres entre las tareas (y los entornos de ejecución).




     Cuando un cierre es enviado a través de un canal, el cierre es tamponado, esto no cambia el búfer del canal que transmite el cierre,
     pero afecta el ámbito estático dentro del cierre: el mismo cierre enviado a diferentes ejecuciones, o a la misma ejecución,
     no compartirá su ámbito estático.




     Esto significa que cada vez que un cierre es ejecutado y ha sido transmitido por un canal, el estado estático será el mismo que cuando el cierre fue tamponado.

## canales anónimos

    La construcción de canales anónimos permite al desarrollador evitar asignar nombres a cada canal: parallel generará un nombre único para los canales anónimos.

## Sinopsis de la Clase

    ****




      final
      class **parallel\Channel**

     {


    /* Constructores anónimos */

public [\_\_construct](#parallel-channel.construct)()
public [\_\_construct](#parallel-channel.construct)([int](#language.types.integer) $capacity)

    /* Acceso */
    public [make](#parallel-channel.make)([string](#language.types.string) $name): Channel

public [make](#parallel-channel.make)([string](#language.types.string) $name, [int](#language.types.integer) $capacity): Channel
public [open](#parallel-channel.open)([string](#language.types.string) $name): Channel

    /* Compartir */
    public [recv](#parallel-channel.recv)(): [mixed](#language.types.mixed)

public [send](#parallel-channel.send)([mixed](#language.types.mixed) $value): [void](language.types.void.html)

    /* Cerrar */
    public [close](#parallel-channel.close)(): [void](language.types.void.html)


    /* Constantes para el tamponamiento infinito */

     const
      Infinite;

}

# parallel\Channel::\_\_construct

(1.1.0)

parallel\Channel::\_\_construct — Construcción de canal

### Descripción

public **parallel\Channel::\_\_construct**()

Crear un canal anónimo no tamponado.

public **parallel\Channel::\_\_construct**([int](#language.types.integer) $capacity)

Crear un canal anónimo tamponado con la capacidad dada.

### Parámetros

    capacity


      Puede ser Channel::Infinite o un integer positivo


# parallel\Channel::make

(0.9.0)

parallel\Channel::make — Acceso

### Descripción

public **parallel\Channel::make**([string](#language.types.string) $name): Channel

Crear un canal no tamponado con el nombre dado.

public **parallel\Channel::make**([string](#language.types.string) $name, [int](#language.types.integer) $capacity): Channel

Crear un canal tamponado con el nombre y la capacidad dados.

### Parámetros

    name


      El nombre del canal.






    capacity


      Puede ser Channel::Infinite o un entero positivo.


### Excepciones

**Advertencia**

    Lanza una parallel\Channel\Error\Existence si el canal ya existe.

# parallel\Channel::open

(0.9.0)

parallel\Channel::open — Acceso

### Descripción

public **parallel\Channel::open**([string](#language.types.string) $name): Channel

Abre el canal con el nombre dado.

### Excepciones

**Advertencia**

    Lanza una parallel\Channel\Error\Existence si el canal no existe.

# parallel\Channel::recv

(0.9.0)

parallel\Channel::recv — Compartir

### Descripción

public **parallel\Channel::recv**(): [mixed](#language.types.mixed)

Recibe un valor de este canal.

### Excepciones

**Advertencia**

    Lanza una parallel\Channel\Error\Closed si el canal está cerrado.

# parallel\Channel::send

(0.9.0)

parallel\Channel::send — Compartir

### Descripción

public **parallel\Channel::send**([mixed](#language.types.mixed) $value): [void](language.types.void.html)

Envía el valor dado sobre este canal.

### Excepciones

**Advertencia**

    Lanza una parallel\Channel\Error\Closed si el canal está cerrado.

**Advertencia**

    Lanza una parallel\Channel\Error\IllegalValue si el valor es ilegal.

# parallel\Channel::close

(0.9.0)

parallel\Channel::close — Cierra

### Descripción

public **parallel\Channel::close**(): [void](language.types.void.html)

Cierra este canal.

### Excepciones

**Advertencia**

    Lanza una parallel\Channel\Error\Closed si el canal está cerrado.

## Tabla de contenidos

- [parallel\Channel::\_\_construct](#parallel-channel.construct) — Construcción de canal
- [parallel\Channel::make](#parallel-channel.make) — Acceso
- [parallel\Channel::open](#parallel-channel.open) — Acceso
- [parallel\Channel::recv](#parallel-channel.recv) — Compartir
- [parallel\Channel::send](#parallel-channel.send) — Compartir
- [parallel\Channel::close](#parallel-channel.close) — Cierra

# La clase parallel\Events

(0.9.0)

    ## El bucle de eventos


     El bucle de eventos supervisa el estado de los conjuntos de futuros y/o canales (objetivos) para realizar operaciones de lectura ([parallel\Future::value()](#parallel-future.value), [parallel\Channel::recv()](#parallel-channel.recv)) y escritura ([parallel\Channel::send()](#parallel-channel.send)) cuando los objetivos se vuelven disponibles y las operaciones pueden ser realizadas sin bloquear el bucle de eventos.

## Sinopsis de la Clase

    ****




      final
      class **parallel\Events**

     implements
       [Countable](#class.countable),  [Traversable](#class.traversable) {


    /* Input */

public [setInput](#parallel-events.setinput)(Input $input): [void](language.types.void.html)

    /* Targets */
    public [addChannel](#parallel-events.addchannel)([parallel\Channel](#class.parallel-channel) $channel): [void](language.types.void.html)

public [addFuture](#parallel-events.addfuture)([string](#language.types.string) $name, [parallel\Future](#class.parallel-future) $future): [void](language.types.void.html)
public [remove](#parallel-events.remove)([string](#language.types.string) $target): [void](language.types.void.html)

    /* Behaviour */
    public [setBlocking](#parallel-events.setblocking)([bool](#language.types.boolean) $blocking): [void](language.types.void.html)

public [setTimeout](#parallel-events.settimeout)([int](#language.types.integer) $timeout): [void](language.types.void.html)

    /* Polling */
    public [poll](#parallel-events.poll)(): [?](#language.types.null)[parallel\Events\Event](#class.parallel-events-event)

}

# parallel\Events::setBlocking

(0.9.0)

parallel\Events::setBlocking — Comportamiento

### Descripción

Por omisión, cuando un evento es interrogado, se produce un bloqueo (a nivel de PHP) hasta que el primer evento pueda ser devuelto: Definir el modo de bloqueo a **[false](#constant.false)** hará que la interrogación devuelva el control si la primera cible interrogada no está lista.

Esto difiere de definir un tiempo límite de 0 con [parallel\Events::setTimeout()](#parallel-events.settimeout), ya que un tiempo límite de 0, aunque permitido, provocará que se lance una excepción, lo cual puede ser extremadamente lento o derrochador si lo que realmente se desea es un comportamiento no bloqueante.

Un bucle no bloqueante afecta el valor de retorno de [parallel\Events::poll()](#parallel-events.poll), de modo que puede ser **[null](#constant.null)** antes de que todos los eventos hayan sido procesados.

public **parallel\Events::setBlocking**([bool](#language.types.boolean) $blocking): [void](language.types.void.html)

    Define el modo de bloqueo.

### Excepciones

**Advertencia**

    Lanza una parallel\Events\Error si el bucle tiene un tiempo límite definido.

# parallel\Events::setTimeout

(0.9.0)

parallel\Events::setTimeout — Comportamiento

### Descripción

Por omisión, cuando los eventos son interrogados, se produce un bloqueo (a nivel de PHP) hasta que el primer evento pueda ser devuelto: Definir el tiempo de espera provoca el lanzamiento de una excepción cuando el tiempo de espera es alcanzado.

Esto difiere de definir el modo de bloqueo a **[false](#constant.false)** con [parallel\Events::setBlocking()](#parallel-events.setblocking), que no provocará el lanzamiento de una excepción.

public **parallel\Events::setTimeout**([int](#language.types.integer) $timeout): [void](language.types.void.html)

    Define el tiempo de espera en microsegundos.

### Excepciones

**Advertencia**

    Lanza una parallel\Events\Error si el bucle es no bloqueante.

# parallel\Events::setInput

(0.9.0)

parallel\Events::setInput — Entrada

### Descripción

public **parallel\Events::setInput**(Input $input): [void](language.types.void.html)

    Define el input para este bucle de eventos

# parallel\Events::addChannel

(0.9.0)

parallel\Events::addChannel — Objetivo

### Descripción

public **parallel\Events::addChannel**([parallel\Channel](#class.parallel-channel) $channel): [void](language.types.void.html)

    Observa los eventos en el channel dado.

### Excepciones

**Advertencia**

    Lanza una parallel\Events\Error\Existence si el canal ya ha sido añadido.

# parallel\Events::addFuture

(0.9.0)

parallel\Events::addFuture — Objetivo

### Descripción

public **parallel\Events::addFuture**([string](#language.types.string) $name, [parallel\Future](#class.parallel-future) $future): [void](language.types.void.html)

    Observa los eventos en el future dado.

### Excepciones

**Advertencia**

    Lanza una parallel\Events\Error\Existence si el objetivo con el nombre dado ya ha sido añadido.

# parallel\Events::remove

(0.9.0)

parallel\Events::remove — Objetivo

### Descripción

public **parallel\Events::remove**([string](#language.types.string) $target): [void](language.types.void.html)

    Elimina el target dado.

### Excepciones

**Advertencia**

    Lanza una parallel\Events\Error\Existence si el objetivo con el nombre dado no ha sido encontrado.

# parallel\Events::poll

(0.9.0)

parallel\Events::poll — Interroga

### Descripción

public **parallel\Events::poll**(): [?](#language.types.null)[parallel\Events\Event](#class.parallel-events-event)

    Interroga para el próximo evento.

### Valores devueltos

    Si no quedan más objetivos, **[null](#constant.null)** será devuelto.




    Esto es un bucle no bloqueante, y si se produce un bloqueo, **[null](#constant.null)** será devuelto.




    De lo contrario, el [parallel\Events\Event](#class.parallel-events-event) devuelto describe el evento.

### Excepciones

**Advertencia**

    Lanza una parallel\Events\Error\Existence si se supera el tiempo de espera.

## Tabla de contenidos

- [parallel\Events::setBlocking](#parallel-events.setblocking) — Comportamiento
- [parallel\Events::setTimeout](#parallel-events.settimeout) — Comportamiento
- [parallel\Events::setInput](#parallel-events.setinput) — Entrada
- [parallel\Events::addChannel](#parallel-events.addchannel) — Objetivo
- [parallel\Events::addFuture](#parallel-events.addfuture) — Objetivo
- [parallel\Events::remove](#parallel-events.remove) — Objetivo
- [parallel\Events::poll](#parallel-events.poll) — Interroga

# La clase parallel\Events\Input

(0.9.0)

    ## Eventos de entrada


     Un objeto de entrada es un contenedor para los datos que el objeto [parallel\Events](#class.parallel-events) escribirá en
     los objetos [parallel\Channel](#class.parallel-channel) a medida que se vayan haciendo disponibles. Varios bucles de eventos pueden compartir un contenedor de entrada - parallel no verifica
     el contenido del contenedor cuando se establece como entrada para un objeto [parallel\Events](#class.parallel-events).



    **Nota**:



     Cuando un objeto [parallel\Events](#class.parallel-events) realiza una escritura, el objetivo se retira del objeto de entrada como si
     [parallel\Events\Input::remove()](#parallel-events-input.remove) fuera llamado.

## Sinopsis de la Clase

    ****




      final
      class **parallel\Events\Input**

     {

public [add](#parallel-events-input.add)([string](#language.types.string) $target, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

    public [remove](#parallel-events-input.remove)([string](#language.types.string) $target): [void](language.types.void.html)

    public [clear](#parallel-events-input.clear)(): [void](language.types.void.html)

}

# parallel\Events\Input::add

(0.9.0)

parallel\Events\Input::add — Entradas

### Descripción

public **parallel\Events\Input::add**([string](#language.types.string) $target, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

    Define una entrada para el objetivo dado.

### Excepciones

**Advertencia**

    Lanza una parallel\Events\Input\Error\Existence si la entrada para el objetivo ya existe.

**Advertencia**

    Lanza una parallel\Events\Input\Error\IllegalValue si el valor es ilegal ([object](#language.types.object), **[null](#constant.null)**).

# parallel\Events\Input::clear

(0.9.0)

parallel\Events\Input::clear — Entradas

### Descripción

public **parallel\Events\Input::clear**(): [void](language.types.void.html)

    Elimina la entrada para todos los objetivos.

# parallel\Events\Input::remove

(0.9.0)

parallel\Events\Input::remove — Entradas

### Descripción

public **parallel\Events\Input::remove**([string](#language.types.string) $target): [void](language.types.void.html)

    Elimina la entrada para el objetivo dado.

### Excepciones

**Advertencia**

    Lanza una parallel\Events\Input\Error\Existence si la entrada para el objetivo no existe.

## Tabla de contenidos

- [parallel\Events\Input::add](#parallel-events-input.add) — Entradas
- [parallel\Events\Input::clear](#parallel-events-input.clear) — Entradas
- [parallel\Events\Input::remove](#parallel-events-input.remove) — Entradas

# La clase parallel\Events\Event

(0.9.0)

## Objeto de evento

    Cuando un evento es devuelto, Event::$object debe ser retirado del bucle que lo devolvió. Si el evento es un evento de escritura, el **Input** para Event::$source también debe ser retirado.

## Sinopsis de la Clase

    ****




      final
      class **parallel\Events\Event**

     {


    /* Debe ser una de las constantes **Event\Type** */

     public
     [int](#language.types.integer)
      $type;


    /* Debe ser la fuente del evento (nombre del objetivo) */
    public
     [string](#language.types.string)
      $source;


    /* Debe ser un Future o un Channel */
    public
     [object](#language.types.object)
      $object;


    /* Debe definir los eventos de lectura/Error */
    public
      $value;

}

# La clase parallel\Events\Event\Type

(0.9.0)

## Sinopsis de la Clase

    ****




      final
      class **parallel\Events\Event\Type**

     {


    /* Event::$object fue leído en Event::$value */

     const
      Read;


    /* Entrada para Event::$source escrita en Event::$object */
    const
      Write;


    /* Event::$object (Channel) fue cerrado */
    const
      Close;


    /* Event::$object (Future) fue cancelado */
    const
      Cancel;


    /* El entorno de ejecución de Event::$object (Future) fue terminado */
    const
      Kill;


    /* Event::$object (Future) generó un error */
    const
      Error;

}

# La clase parallel\Sync

(1.1.0)

    ## Sincronización de bajo nivel


     La clase **parallel\Sync** proporciona acceso a las primitivas de sincronización de bajo nivel, mutex, variables de condición y permite la implementación de semáforos.





     La sincronización para la mayoría de las aplicaciones se implementa mucho mejor utilizando canales, sin embargo, en algunos casos los autores de código de bajo nivel pueden encontrar útil poder acceder a estos mecanismos de nivel más bajo.

## Sinopsis de la Clase

    ****




      final
      class **parallel\Sync**

     {


    /* Constructor */

public [\_\_construct](#parallel-sync.construct)()
public [\_\_construct](#parallel-sync.construct)(scalar $value)

    /* Acceso */
    public [get](#parallel-sync.get)(): scalar

public [set](#parallel-sync.set)(scalar $value)

    /* Sincronización */
    public [wait](#parallel-sync.wait)()

public [notify](#parallel-sync.notify)([bool](#language.types.boolean) $all = ?)
public [\_\_invoke](#parallel-sync.invoke)([callable](#language.types.callable) $critical)

}

# parallel\Sync::\_\_construct

(1.1.0)

parallel\Sync::\_\_construct — Construcción

### Descripción

public **parallel\Sync::\_\_construct**()

Construye un nuevo objeto de sincronización sin valor.

public **parallel\Sync::\_\_construct**(scalar $value)

Construye un nuevo objeto de sincronización que contiene el valor escalar dado.

### Excepciones

**Advertencia**

    Lanza una parallel\Sync\Error\IllegalValue si value no es escalar.

# parallel\Sync::get

(1.1.0)

parallel\Sync::get — Acceso

### Descripción

public **parallel\Sync::get**(): scalar

Devuelve de manera atómica el valor del objeto de sincronización.

# parallel\Sync::set

(1.1.0)

parallel\Sync::set — Acceso

### Descripción

public **parallel\Sync::set**(scalar $value)

Define atomiquement la valeur de l'objet de synchronisation

### Excepciones

**Advertencia**

    Lance une parallel\Sync\Error\IllegalValue si value n'est pas scalaire.

# parallel\Sync::wait

(1.1.0)

parallel\Sync::wait — Sincronización

### Descripción

public **parallel\Sync::wait**()

Espera la notificación en este objeto de sincronización

# parallel\Sync::notify

(1.1.0)

parallel\Sync::notify — Sincronización

### Descripción

public **parallel\Sync::notify**([bool](#language.types.boolean) $all = ?)

Notifica un (por omisión) o todos los hilos en espera sobre el objeto de sincronización

# parallel\Sync::\_\_invoke

(1.1.0)

parallel\Sync::\_\_invoke — Sincronización

### Descripción

public **parallel\Sync::\_\_invoke**([callable](#language.types.callable) $critical)

Entra exclusivamente en el código crítico

## Tabla de contenidos

- [parallel\Sync::\_\_construct](#parallel-sync.construct) — Construcción
- [parallel\Sync::get](#parallel-sync.get) — Acceso
- [parallel\Sync::set](#parallel-sync.set) — Acceso
- [parallel\Sync::wait](#parallel-sync.wait) — Sincronización
- [parallel\Sync::notify](#parallel-sync.notify) — Sincronización
- [parallel\Sync::\_\_invoke](#parallel-sync.invoke) — Sincronización

- [Introducción](#intro.parallel)
- [Instalación](#parallel.setup)
- [Filosofía](#philosophy.parallel)
- [API Funcional](#functional.parallel)<li>[parallel\bootstrap](#parallel.bootstrap) — Inicialización
- [parallel\run](#parallel.run) — Ejecución
  </li>- [parallel\Runtime](#class.parallel-runtime) — La clase parallel\Runtime<li>[parallel\Runtime::__construct](#parallel-runtime.construct) — Construcción de la ejecución
- [parallel\Runtime::run](#parallel-runtime.run) — Ejecución
- [parallel\Runtime::close](#parallel-runtime.close) — Se une graciosamente a la ejecución
- [parallel\Runtime::kill](#parallel-runtime.kill) — Se une a la ejecución
  </li>- [parallel\Future](#class.parallel-future) — La clase parallel\Future<li>[parallel\Future::cancel](#parallel-future.cancel) — Cancelación
- [parallel\Future::cancelled](#parallel-future.cancelled) — Detección de estado
- [parallel\Future::done](#parallel-future.done) — Detección de estado
- [parallel\Future::value](#parallel-future.value) — Resolución
  </li>- [parallel\Channel](#class.parallel-channel) — La clase parallel\Channel<li>[parallel\Channel::__construct](#parallel-channel.construct) — Construcción de canal
- [parallel\Channel::make](#parallel-channel.make) — Acceso
- [parallel\Channel::open](#parallel-channel.open) — Acceso
- [parallel\Channel::recv](#parallel-channel.recv) — Compartir
- [parallel\Channel::send](#parallel-channel.send) — Compartir
- [parallel\Channel::close](#parallel-channel.close) — Cierra
  </li>- [parallel\Events](#class.parallel-events) — La clase parallel\Events<li>[parallel\Events::setBlocking](#parallel-events.setblocking) — Comportamiento
- [parallel\Events::setTimeout](#parallel-events.settimeout) — Comportamiento
- [parallel\Events::setInput](#parallel-events.setinput) — Entrada
- [parallel\Events::addChannel](#parallel-events.addchannel) — Objetivo
- [parallel\Events::addFuture](#parallel-events.addfuture) — Objetivo
- [parallel\Events::remove](#parallel-events.remove) — Objetivo
- [parallel\Events::poll](#parallel-events.poll) — Interroga
  </li>- [parallel\Events\Input](#class.parallel-events-input) — La clase parallel\Events\Input<li>[parallel\Events\Input::add](#parallel-events-input.add) — Entradas
- [parallel\Events\Input::clear](#parallel-events-input.clear) — Entradas
- [parallel\Events\Input::remove](#parallel-events-input.remove) — Entradas
  </li>- [parallel\Events\Event](#class.parallel-events-event) — La clase parallel\Events\Event
- [parallel\Events\Event\Type](#class.parallel-events-event-type) — La clase parallel\Events\Event\Type
- [parallel\Sync](#class.parallel-sync) — La clase parallel\Sync<li>[parallel\Sync::\_\_construct](#parallel-sync.construct) — Construcción
- [parallel\Sync::get](#parallel-sync.get) — Acceso
- [parallel\Sync::set](#parallel-sync.set) — Acceso
- [parallel\Sync::wait](#parallel-sync.wait) — Sincronización
- [parallel\Sync::notify](#parallel-sync.notify) — Sincronización
- [parallel\Sync::\_\_invoke](#parallel-sync.invoke) — Sincronización
  </li>
