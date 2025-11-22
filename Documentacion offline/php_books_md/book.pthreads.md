# pthreads

# Introducción

pthreads es una API orientada a objetos que aporta todas las herramientas necesarias para
el multithreading en PHP.
Las aplicaciones PHP pueden crear, leer, escribir, ejecutar
y sincronizar Threads, Workers, y objetos Threaded.

**Advertencia**

    Esta extensión es considerada no mantenida y obsoleta.

**Sugerencia**

    Considerar el uso de [parallel](#book.parallel) en su lugar.

**Advertencia**

    La extensión pthreads no puede ser utilizada en un entorno de
    servidor Web. El threading en PHP se limita por tanto a aplicaciones basadas
    en CLI únicamente.

**Advertencia**

    pthreads (v3) puede ser utilizado únicamente con PHP 7.2+ debido a un
    modo ZTS peligroso en PHP 7.0 y 7.1.

La clase [Threaded](#class.threaded) constituye la base de la
funcionalidad que permite a pthreads funcionar. Expone los métodos
de sincronización y algunas interfaces útiles para el programador.

La clase [Thread](#class.thread) permite crear threads extendiéndola simplemente e
implementando un método run. Todos los miembros pueden ser escritos y leídos
por cualquier contexto con una referencia al thread. Todo contexto puede igualmente ejecutar
todos los métodos públicos y protegidos. El cuerpo del método run será ejecutado
en un thread separado cuando el método [Thread::start()](#thread.start)
de la implementación sea llamado desde el contexto que lo creó. Solo el
contexto que crea un thread puede iniciarlo y unirse a él.

La clase [Worker](#class.worker) tiene un estado persistente y estará
disponible desde la llamada a [Thread::start()](#thread.start) (un método heredado)
hasta que el objeto esté fuera de alcance, o sea explícitamente detenido (vía
[Worker::shutdown()](#worker.shutdown)). Todo contexto con una referencia al objeto Worker
puede apilar tareas en el Worker (vía [Worker::stack()](#worker.stack)), donde estas
tareas serán ejecutadas por el Worker en un thread separado. El método
run de un objeto worker es ejecutado antes de cualquier objeto de la pila del worker,
lo que permite que los recursos sean inicializados para que los objetos a ejecutar puedan usarlos.

La clase [Pool](#class.pool) se utiliza para crear un grupo de
workers para distribuir objetos [Threaded](#class.threaded) entre ellos.
Es el medio más fácil y eficiente de utilizar múltiples threads en aplicaciones PHP.

**Precaución**

    La clase [Pool](#class.pool) no extiende la clase

[Threaded](#class.threaded), y por tanto los objetos basados en pool son
considerados como objetos PHP normales. En consecuencia, sus instancias no
deben ser compartidas entre contextos diferentes.

La clase [Volatile](#class.volatile) es nueva para pthreads v3.
Se utiliza para designar las propiedades [Threaded](#class.threaded) mutables
de las clases [Threaded](#class.threaded) (ya que estas son ahora inmutables por defecto).
También se utiliza para almacenar arrays PHP en contextos [Threaded](#class.threaded).

La sincronización es una capacidad importante al realizar threading. Todos los
objetos creados por pthreads han sido construidos con sincronización en la forma
(que será familiar a los programadores Java) de
[Threaded::wait()](#threaded.wait) y
[Threaded::notify()](#threaded.notify). La llamada a
[Threaded::wait()](#threaded.wait) sobre un objeto hará que el contexto
espere a que otro contexto llame a
[Threaded::notify()](#threaded.notify) sobre el mismo objeto. Este mecanismo
permite una sincronización poderosa entre los objetos
[Threaded](#class.threaded) en PHP.

**Precaución**

    Todo objeto previsto para ser utilizado en una parte multithread de la aplicación
    debe extender [Threaded](#class.threaded).

Almacenamiento de datos: En regla general, todos los tipos de datos que puedan ser serializados pueden
ser utilizados como miembro de un objeto Threaded, pueden ser leídos y escritos desde cualquier
contexto con una referencia al objeto Threaded. No todos los tipos de datos son almacenados
después de la serialización; los tipos simples son almacenados en su forma inicial. Los tipos
complejos, los arrays y los objetos que no son Threaded, son almacenados serializados; pueden ser
leídos y escritos en el objeto Threaded desde cualquier contexto con una referencia.
A excepción de los objetos Threaded, toda referencia utilizada para definir un miembro de un objeto
Threaded es separada de la referencia en el objeto Threaded; los mismos datos pueden ser leídos
directamente desde el objeto Threaded en cualquier momento por cualquier contexto con una referencia
al objeto Threaded.

Miembros estáticos: Cuando un nuevo contexto es creado (Thread o Worker),
generalmente son copiados, pero los recursos y objetos con estado interno son nullificados
(por razones de seguridad). Esto permite a la función una especie de almacenamiento local
a nivel de thread. Por ejemplo, al iniciar el contexto, una clase cuyos miembros estáticos
incluyen información de conexión a un servidor de base de datos, solo la información
será copiada, y no la conexión en sí. Esto permite al nuevo contexto inicializar
una conexión de la misma forma que el contexto que lo creó, almacenando la conexión
en el mismo lugar sin afectar al contexto original.

**Precaución**

Cuando print_r, var_dump y otras funciones de depuración son ejecutadas, no incluyen
protección contra la recursión.

**Nota**:

    Recursos: Las extensiones y funcionalidades que definen recursos en PHP no están preparadas
    para este tipo de entorno; pthreads toma disposiciones en materia de recursos a compartir entre
    los contextos, sin embargo, para la mayoría de los recursos, deberán ser considerados como peligrosos.
    Un cuidado y una extrema precaución deberán ser de aplicación para compartir recursos entre los contextos.

**Precaución**

    En el entorno de ejecución de pthreads, restricciones y limitaciones son necesarias para
    proporcionar un entorno estable.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#pthreads.requirements)
- [Instalación](#pthreads.installation)

    ## Requerimientos

    Pthreads requiere una construcción de PHP con ZTS activado
    (**--enable-zts**, o en sistemas no-Windows anteriores a PHP 8.0.0,
    **--enable-maintainer-zts**).

    **Precaución**

    La seguridad de los Threads Zend (Zend Thread Safety - ZTS) no puede ser activada
    después de la construcción; es una opción de compilación.

    pthreads debería compilar siempre que exista un encabezado Posix Threads funcional
    (pthread.h) así como una construcción ZTS de PHP, lo cual incluye Windows (utilizando
    el proyecto pthread-w32 de redhat).

    ## Instalación

    Las versiones de pthreads están alojadas en PECL y las fuentes en
    [» github](https://github.com/krakjoe/pthreads).
    El procedimiento de instalación más sencillo es el estándar de PECL:
    [» https://pecl.php.net/package/pthreads](https://pecl.php.net/package/pthreads).

    Los usuarios de Windows pueden descargar binarios preconstruidos desde
    el sitio de [» PECL](https://pecl.php.net/package/pthreads).

    **Precaución**

    Los usuarios de Windows deben añadir pthreadVC2.dll (distribuido
    con Windows) a su PATH.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[PTHREADS_INHERIT_ALL](#constant.pthreads-inherit-all)**
     ([int](#language.types.integer))



      Las opciones por omisión para todos los hilos,
      haciendo que los pthreads copien los entornos
      cuando los nuevos hilos son iniciados





     **[PTHREADS_INHERIT_NONE](#constant.pthreads-inherit-none)**
     ([int](#language.types.integer))



      No hereda nada cuando los nuevos hilos son iniciados





     **[PTHREADS_INHERIT_INI](#constant.pthreads-inherit-ini)**
     ([int](#language.types.integer))



      Hereda las entradas INI cuando los nuevos hilos son iniciados





     **[PTHREADS_INHERIT_CONSTANTS](#constant.pthreads-inherit-constants)**
     ([int](#language.types.integer))



      Hereda las constantes declaradas por el usuario cuando los
      nuevos hilos son iniciados





     **[PTHREADS_INHERIT_CLASSES](#constant.pthreads-inherit-classes)**
     ([int](#language.types.integer))



      Hereda las clases declaradas por el usuario cuando los nuevos
      hilos son iniciados





     **[PTHREADS_INHERIT_FUNCTIONS](#constant.pthreads-inherit-functions)**
     ([int](#language.types.integer))



      Hereda las funciones declaradas por el usuario cuando los nuevos
      hilos son iniciados





     **[PTHREADS_INHERIT_INCLUDES](#constant.pthreads-inherit-includes)**
     ([int](#language.types.integer))



      La herencia incluye la información de fichero cuando los nuevos
      hilos son iniciados





     **[PTHREADS_INHERIT_COMMENTS](#constant.pthreads-inherit-comments)**
     ([int](#language.types.integer))



      Hereda todos los comentarios cuando los nuevos hilos son
      iniciados





     **[PTHREADS_ALLOW_HEADERS](#constant.pthreads-allow-headers)**
     ([int](#language.types.integer))



      Permite que los nuevos hilos envíen los encabezados a la salida
      estándar (normalmente no permitido)


# La clase Threaded

(PECL pthreads &gt;= 2.0.0)

## Introducción

    Los objetos Threaded constituyen la base de pthreads para ejecutar código de forma paralela; exponen e incluyen métodos de sincronización así como diversas interfaces útiles.




    Los objetos Threaded proporcionan seguridad nativa para el desarrollador; todas las operaciones son thread-safe dentro del ámbito del objeto.

## Sinopsis de la Clase

    ****




      class **Threaded**


     implements
       [Collectable](#class.collectable),  [Traversable](#class.traversable),  [Countable](#class.countable),  [ArrayAccess](#class.arrayaccess) {


    /* Métodos */

public [chunk](#threaded.chunk)([int](#language.types.integer) $size, [bool](#language.types.boolean) $preserve): [array](#language.types.array)
public [count](#threaded.count)(): [int](#language.types.integer)
public [extend](#threaded.extend)([string](#language.types.string) $class): [bool](#language.types.boolean)
public [isRunning](#thread.isrunning)(): [bool](#language.types.boolean)
public [isTerminated](#threaded.isterminated)(): [bool](#language.types.boolean)
public [merge](#threaded.merge)([mixed](#language.types.mixed) $from, [bool](#language.types.boolean) $overwrite = ?): [bool](#language.types.boolean)
public [notify](#threaded.notify)(): [bool](#language.types.boolean)
public [notifyOne](#threaded.notifyone)(): [bool](#language.types.boolean)
public [pop](#threaded.pop)(): [bool](#language.types.boolean)
public [run](#threaded.run)(): [void](language.types.void.html)
public [shift](#threaded.shift)(): [bool](#language.types.boolean)
public [synchronized](#threaded.synchronized)([Closure](#class.closure) $block, [mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)
public [wait](#threaded.wait)([int](#language.types.integer) $timeout = ?): [bool](#language.types.boolean)

}

# Threaded::chunk

(PECL pthreads &gt;= 2.0.0)

Threaded::chunk — Manipulación

### Descripción

public **Threaded::chunk**([int](#language.types.integer) $size, [bool](#language.types.boolean) $preserve): [array](#language.types.array)

Recorre una parte de la tabla de propiedades de los objetos
preservando, opcionalmente, las claves.

### Parámetros

    size


      El número de elementos a recorrer






    preserve


      Preserva las claves de los miembros; por omisión, vale **[false](#constant.false)**


### Valores devueltos

Un array de elementos desde la tabla de propiedades de los objetos.

### Ejemplos

    **Ejemplo #1 Recorrido de una parte de la tabla de propiedades**

&lt;?php
$safe = new Threaded();

while (count($safe) &lt; 10) {
    $safe[] = count($safe);
}

var_dump($safe-&gt;chunk(5));
?&gt;

    El ejemplo anterior mostrará:

array(5) {
[0]=&gt;
int(0)
[1]=&gt;
int(1)
[2]=&gt;
int(2)
[3]=&gt;
int(3)
[4]=&gt;
int(4)
}

# Threaded::count

(PECL pthreads &gt;= 2.0.0)

Threaded::count — Manipulación

### Descripción

public **Threaded::count**(): [int](#language.types.integer)

Devuelve el número de propiedades para este objeto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

    **Ejemplo #1 Cuenta las propiedades de un objeto**

&lt;?php
$safe = new Threaded();

while (count($safe) &lt; 10) {
    $safe[] = count($safe);
}

var_dump(count($safe));
?&gt;

    El ejemplo anterior mostrará:

int(10)

# Threaded::extend

(PECL pthreads &gt;= 2.0.8)

Threaded::extend — Manipulación durante la ejecución

### Descripción

public **Threaded::extend**([string](#language.types.string) $class): [bool](#language.types.boolean)

Hace que la clase estándar sea segura a nivel de thread durante la ejecución.

### Parámetros

    class


      La clase a extender.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Herencia durante la ejecución**

&lt;?php
class My {}

Threaded::extend(My::class);

$my = new My();

var_dump($my instanceof Threaded);
?&gt;

    El ejemplo anterior mostrará:

bool(true)

# Threaded::isRunning

(PECL pthreads &gt;= 2.0.0)

Threaded::isRunning — Detección de estado

### Descripción

public **Threaded::isRunning**(): [bool](#language.types.boolean)

Se verifica si el objeto referenciado está en ejecución.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un valor booleano que indica el estado.

**Nota**:

     Un objeto se considera en ejecución cuando ejecuta el método run.

### Ejemplos

    **Ejemplo #1 Detecta el estado del objeto referenciado**

&lt;?php
class My extends Thread {
public function run() {
$this-&gt;synchronized(function($thread){
if (!$thread-&gt;done)
                $thread-&gt;wait();
        }, $this);
    }
}
$my = new My();
$my-&gt;start();
var_dump($my-&gt;isRunning());
$my-&gt;synchronized(function($thread){
$thread-&gt;done = true;
$thread-&gt;notify();
}, $my);
?&gt;

    El ejemplo anterior mostrará:

bool(true)

# Threaded::isTerminated

(PECL pthreads &gt;= 2.0.0)

Threaded::isTerminated — Detección de estado

### Descripción

public **Threaded::isTerminated**(): [bool](#language.types.boolean)

Se verifica si el objeto referenciado ha finalizado durante la ejecución;
si ha sufrido un error fatal o ha generado excepciones que no han podido
ser capturadas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un valor booleano que indica el estado.

### Ejemplos

    **Ejemplo #1 Detecta el estado del objeto referenciado**

&lt;?php
class My extends Thread {
public function run() {
i_do_not_exist();
}
}
$my = new My();
$my-&gt;start();
$my-&gt;join();
var_dump($my-&gt;isTerminated());
?&gt;

    El ejemplo anterior mostrará:

bool(true)

# Threaded::merge

(PECL pthreads &gt;= 2.0.0)

Threaded::merge — Manipulación

### Descripción

public **Threaded::merge**([mixed](#language.types.mixed) $from, [bool](#language.types.boolean) $overwrite = ?): [bool](#language.types.boolean)

Fusiona los datos en el objeto actual

### Parámetros

    from


      Los datos a fusionar






    overwrite


      Sobrescribe las claves existentes; por omisión vale **[true](#constant.true)**


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Fusiona el objeto thread en la tabla de propiedades**

&lt;?php
$array = [];

while (count($array) &lt; 10)
    $array[] = count($array);

$stdClass = new stdClass();
$stdClass-&gt;foo = "foo";
$stdClass-&gt;bar = "bar";
$stdClass-&gt;baz = "baz";

$safe = new Threaded();
$safe-&gt;merge($array);
$safe-&gt;merge($stdClass);

var_dump($safe);
?&gt;

    El ejemplo anterior mostrará:

object(Threaded)#2 (13) {
["0"]=&gt;
int(0)
["1"]=&gt;
int(1)
["2"]=&gt;
int(2)
["3"]=&gt;
int(3)
["4"]=&gt;
int(4)
["5"]=&gt;
int(5)
["6"]=&gt;
int(6)
["7"]=&gt;
int(7)
["8"]=&gt;
int(8)
["9"]=&gt;
int(9)
["foo"]=&gt;
string(3) "foo"
["bar"]=&gt;
string(3) "bar"
["baz"]=&gt;
string(3) "baz"
}

# Threaded::notify

(PECL pthreads &gt;= 2.0.0)

Threaded::notify — Sincronización

### Descripción

public **Threaded::notify**(): [bool](#language.types.boolean)

Envía una notificación al objeto referenciado

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Notificaciones y espera**

&lt;?php
class My extends Thread {
public function run() {
/** hace que el hilo espere **/
$this-&gt;synchronized(function($thread){
if (!$thread-&gt;done)
                $this-&gt;wait();
        }, $this);
    }
}
$my = new My();
$my-&gt;start();
/** envía la notificación al hilo que espera **/
$my-&gt;synchronized(function($thread){
    $thread-&gt;done = true;
    $thread-&gt;notify();
}, $my);
var_dump($my-&gt;join());
?&gt;

    El ejemplo anterior mostrará:

bool(true)

# Threaded::notifyOne

(PECL pthreads &gt;= 3.0.0)

Threaded::notifyOne — Sincronizar

### Descripción

public **Threaded::notifyOne**(): [bool](#language.types.boolean)

Envía una notificación al objeto referenciado. Esto desbloquea al menos uno de
los threads bloqueados (a diferencia de desbloquearlos todos, como ocurre con
[Threaded::notify()](#threaded.notify)).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Notificaciones y espera**

&lt;?php
class My extends Thread {
public function run() {
/** causa que este thread espere **/
$this-&gt;synchronized(function($thread){
if (!$thread-&gt;done)
                $this-&gt;wait();
        }, $this);
    }
}
$my = new My();
$my-&gt;start();
/** envía una notificación al thread en espera **/
$my-&gt;synchronized(function($thread){
    $thread-&gt;done = true;
    $thread-&gt;notifyOne();
}, $my);
var_dump($my-&gt;join());
?&gt;

    El ejemplo anterior mostrará:

bool(true)

# Threaded::pop

(PECL pthreads &gt;= 2.0.0)

Threaded::pop — Manipulación

### Descripción

public **Threaded::pop**(): [bool](#language.types.boolean)

Se elimina el último elemento de la tabla de propiedades del objeto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El último elemento de la tabla de propiedades del objeto.

### Ejemplos

    **Ejemplo #1 Eliminar el último elemento de la tabla de propiedades de un objeto thread**

&lt;?php
$safe = new Threaded();

while (count($safe) &lt; 10)
    $safe[] = count($safe);

var_dump($safe-&gt;pop());
?&gt;

    El ejemplo anterior mostrará:

int(9)

# Threaded::run

(PECL pthreads &gt;= 2.0.0)

Threaded::run — Ejecución

### Descripción

public **Threaded::run**(): [void](language.types.void.html)

El desarrollador debe siempre implementar el método run para los objetos
que deben ser ejecutados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Threaded::shift

(PECL pthreads &gt;= 2.0.0)

Threaded::shift — Manipulación

### Descripción

public **Threaded::shift**(): [bool](#language.types.boolean)

Se elimina el primer elemento de la tabla de propiedades del objeto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El primer elemento de la tabla de propiedades del objeto.

### Ejemplos

    **Ejemplo #1
     Eliminación del primer elemento de la tabla de propiedades del objeto threadado**

&lt;?php
$safe = new Threaded();

while (count($safe) &lt; 10)
    $safe[] = count($safe);

var_dump($safe-&gt;shift());
?&gt;

    El ejemplo anterior mostrará:

int(0)

# Threaded::synchronized

(PECL pthreads &gt;= 2.0.0)

Threaded::synchronized — Sincronización

### Descripción

public **Threaded::synchronized**([Closure](#class.closure) $block, [mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)

Se ejecuta el bloque mientras se retienen los candados de sincronización
de los objetos referenciados para el contexto llamante.

### Parámetros

    block


      El bloque de código a ejecutar






    args


      Lista variable de argumentos a utilizar como argumento de la función


### Valores devueltos

El valor devuelto del bloque

### Ejemplos

    **Ejemplo #1 Sincronización**

&lt;?php
class My extends Thread {
public function run() {
$this-&gt;synchronized(function($thread){
if (!$thread-&gt;done)
                $thread-&gt;wait();
        }, $this);
    }
}
$my = new My();
$my-&gt;start();
$my-&gt;synchronized(function($thread){
    $thread-&gt;done = true;
    $thread-&gt;notify();
}, $my);
var_dump($my-&gt;join());
?&gt;

    El ejemplo anterior mostrará:

bool(true)

# Threaded::wait

(PECL pthreads &gt;= 2.0.0)

Threaded::wait — Sincronización

### Descripción

public **Threaded::wait**([int](#language.types.integer) $timeout = ?): [bool](#language.types.boolean)

Hace esperar al contexto llamante una notificación desde el objeto referenciado.

### Parámetros

    timeout


      Un tiempo de espera máximo opcional, en microsegundos.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Notificaciones y espera**

&lt;?php
class My extends Thread {
public function run() {
/** Hace esperar este hilo **/
$this-&gt;synchronized(function($thread){
if (!$thread-&gt;done)
                $thread-&gt;wait();
        }, $this);
    }
}
$my = new My();
$my-&gt;start();
/** Envía la notificación al hilo que espera **/
$my-&gt;synchronized(function($thread){
    $thread-&gt;done = true;
    $thread-&gt;notify();
}, $my);
var_dump($my-&gt;join());
?&gt;

    El ejemplo anterior mostrará:

bool(true)

## Tabla de contenidos

- [Threaded::chunk](#threaded.chunk) — Manipulación
- [Threaded::count](#threaded.count) — Manipulación
- [Threaded::extend](#threaded.extend) — Manipulación durante la ejecución
- [Threaded::isRunning](#thread.isrunning) — Detección de estado
- [Threaded::isTerminated](#threaded.isterminated) — Detección de estado
- [Threaded::merge](#threaded.merge) — Manipulación
- [Threaded::notify](#threaded.notify) — Sincronización
- [Threaded::notifyOne](#threaded.notifyone) — Sincronizar
- [Threaded::pop](#threaded.pop) — Manipulación
- [Threaded::run](#threaded.run) — Ejecución
- [Threaded::shift](#threaded.shift) — Manipulación
- [Threaded::synchronized](#threaded.synchronized) — Sincronización
- [Threaded::wait](#threaded.wait) — Sincronización

# La clase Thread

(PECL pthreads &gt;= 2.0.0)

## Introducción

    Cuando el método start de un Thread es llamado, el código del método run será
    ejecutado de forma paralela en un Thread separado.




     Después de la ejecución del método run, el Thread se terminará inmediatamente, será
     vinculado al Thread original posteriormente.

**Advertencia**

     Basarse en el motor para determinar cuándo un Thread será vinculado puede
     provocar un comportamiento no deseado. El desarrollador debe ser explícito
     en la medida de lo posible.

## Sinopsis de la Clase

    ****




      class **Thread**



      extends
       [Threaded](#class.threaded)


     implements
       [Countable](#class.countable),  [Traversable](#class.traversable),  [ArrayAccess](#class.arrayaccess) {


    /* Métodos */

public [getCreatorId](#thread.getcreatorid)(): [int](#language.types.integer)
public static [getCurrentThread](#thread.getcurrentthread)(): [Thread](#class.thread)
public static [getCurrentThreadId](#thread.getcurrentthreadid)(): [int](#language.types.integer)
public [getThreadId](#thread.getthreadid)(): [int](#language.types.integer)
public [isJoined](#thread.isjoined)(): [bool](#language.types.boolean)
public [isStarted](#thread.isstarted)(): [bool](#language.types.boolean)
public [join](#thread.join)(): [bool](#language.types.boolean)
public [start](#thread.start)([int](#language.types.integer) $options = ?): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [Threaded::chunk](#threaded.chunk)([int](#language.types.integer) $size, [bool](#language.types.boolean) $preserve): [array](#language.types.array)

public [Threaded::count](#threaded.count)(): [int](#language.types.integer)
public [Threaded::extend](#threaded.extend)([string](#language.types.string) $class): [bool](#language.types.boolean)
public [Threaded::isRunning](#thread.isrunning)(): [bool](#language.types.boolean)
public [Threaded::isTerminated](#threaded.isterminated)(): [bool](#language.types.boolean)
public [Threaded::merge](#threaded.merge)([mixed](#language.types.mixed) $from, [bool](#language.types.boolean) $overwrite = ?): [bool](#language.types.boolean)
public [Threaded::notify](#threaded.notify)(): [bool](#language.types.boolean)
public [Threaded::notifyOne](#threaded.notifyone)(): [bool](#language.types.boolean)
public [Threaded::pop](#threaded.pop)(): [bool](#language.types.boolean)
public [Threaded::run](#threaded.run)(): [void](language.types.void.html)
public [Threaded::shift](#threaded.shift)(): [bool](#language.types.boolean)
public [Threaded::synchronized](#threaded.synchronized)([Closure](#class.closure) $block, [mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)
public [Threaded::wait](#threaded.wait)([int](#language.types.integer) $timeout = ?): [bool](#language.types.boolean)

}

# Thread::getCreatorId

(PECL pthreads &gt;= 2.0.0)

Thread::getCreatorId — Identificación

### Descripción

public **Thread::getCreatorId**(): [int](#language.types.integer)

Devuelve la identidad del Thread que ha creado el Thread referenciado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una identidad numérica.

### Ejemplos

    **Ejemplo #1 Devuelve la identidad del Thread o del proceso que ha creado el Thread referenciado**

&lt;?php
class My extends Thread {
public function run() {
printf("%s ha sido creado por el Thread #%lu\n", **CLASS**, $this-&gt;getCreatorId());
    }
}
$my = new My();
$my-&gt;start();
?&gt;

    El ejemplo anterior mostrará:

My ha sido creado por el Thread #123456778899

# Thread::getCurrentThread

(PECL pthreads &gt;= 2.0.0)

Thread::getCurrentThread — Identificación

### Descripción

public static **Thread::getCurrentThread**(): [Thread](#class.thread)

Devuelve una referencia del hilo actualmente en ejecución

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto que representa el hilo actualmente en ejecución.

### Ejemplos

    **Ejemplo #1 Devuelve el hilo actualmente en ejecución**

&lt;?php
class My extends Thread {
public function run() {
var_dump(Thread::getCurrentThread());
}
}
$my = new My();
$my-&gt;start();
?&gt;

    El ejemplo anterior mostrará:

object(My)#2 (0) {
}

# Thread::getCurrentThreadId

(PECL pthreads &gt;= 2.0.0)

Thread::getCurrentThreadId — Identificación

### Descripción

public static **Thread::getCurrentThreadId**(): [int](#language.types.integer)

Se devuelve la identidad del hilo actualmente en ejecución

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una identidad numérica

### Ejemplos

    **Ejemplo #1 Se devuelve la identidad del hilo actualmente en ejecución**

&lt;?php
class My extends Thread {
public function run() {
printf("%s es Hilo #%lu\n", **CLASS**, Thread::getCurrentThreadId());
}
}
$my = new My();
$my-&gt;start();
?&gt;

    El ejemplo anterior mostrará:

My es Hilo #123456778899

# Thread::getThreadId

(PECL pthreads &gt;= 2.0.0)

Thread::getThreadId — Identificación

### Descripción

public **Thread::getThreadId**(): [int](#language.types.integer)

Se devuelve la identidad del Thread referenciado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una identidad numérica.

### Ejemplos

    **Ejemplo #1 Se devuelve la identidad del Thread referenciado**

&lt;?php
class My extends Thread {
public function run() {
printf("%s es el Thread #%lu\n", **CLASS**, $this-&gt;getThreadId());
    }
}
$my = new My();
$my-&gt;start();
?&gt;

    El ejemplo anterior mostrará:

My es el Thread #123456778899

# Thread::isJoined

(PECL pthreads &gt;= 2.0.0)

Thread::isJoined — Detección de estado

### Descripción

public **Thread::isJoined**(): [bool](#language.types.boolean)

Indica si el Thread referenciado ha sido unido.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Detecta el estado del Thread referenciado**

&lt;?php
class My extends Thread {
public function run() {
$this-&gt;synchronized(function($thread){
if (!$thread-&gt;done)
                $this-&gt;wait();
        }, $this);
    }
}
$my = new My();
$my-&gt;start();
var_dump($my-&gt;isJoined());
$my-&gt;synchronized(function($thread){
$thread-&gt;done = true;
$thread-&gt;notify();
}, $my);
?&gt;

    El ejemplo anterior mostrará:

bool(false)

# Thread::isStarted

(PECL pthreads &gt;= 2.0.0)

Thread::isStarted — Detección de estado

### Descripción

public **Thread::isStarted**(): [bool](#language.types.boolean)

Indica si el Thread referenciado ha sido iniciado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Indica si el Thread referenciado ha sido iniciado**

&lt;?php
$worker = new Worker();
$worker-&gt;start();
var_dump($worker-&gt;isStarted());
?&gt;

    El ejemplo anterior mostrará:

bool(true)

# Thread::join

(PECL pthreads &gt;= 2.0.0)

Thread::join — Sincronización

### Descripción

public **Thread::join**(): [bool](#language.types.boolean)

Permite esperar al contexto llamante del Thread referenciado
hasta que finalice la ejecución.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Une el Thread referenciado**

&lt;?php
class My extends Thread {
public function run() {
/_ ... _/
}
}
$my = new My();
$my-&gt;start();
/_ ... _/
var_dump($my-&gt;join());
/_ ... _/
?&gt;

    El ejemplo anterior mostrará:

bool(true)

# Thread::start

(PECL pthreads &gt;= 2.0.0)

Thread::start — Ejecución

### Descripción

public **Thread::start**([int](#language.types.integer) $options = ?): [bool](#language.types.boolean)

Inicia un nuevo Thread y ejecuta el método run implementado.

### Parámetros

    options


      Una máscara opcional de constantes heredadas; por omisión,
      PTHREADS_INHERIT_ALL


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Inicia los Threads**

&lt;?php
class My extends Thread {
public function run() {
/** ... **/
}
}
$my = new My();
var_dump($my-&gt;start());
?&gt;

    El ejemplo anterior mostrará:

bool(true)

## Tabla de contenidos

- [Thread::getCreatorId](#thread.getcreatorid) — Identificación
- [Thread::getCurrentThread](#thread.getcurrentthread) — Identificación
- [Thread::getCurrentThreadId](#thread.getcurrentthreadid) — Identificación
- [Thread::getThreadId](#thread.getthreadid) — Identificación
- [Thread::isJoined](#thread.isjoined) — Detección de estado
- [Thread::isStarted](#thread.isstarted) — Detección de estado
- [Thread::join](#thread.join) — Sincronización
- [Thread::start](#thread.start) — Ejecución

# La clase Worker

(PECL pthreads &gt;= 2.0.0)

## Introducción

    Los Threads Worker tienen un contexto persistente, por lo tanto,
    pueden ser utilizados mediante Threads en la mayoría de los casos.




    Cuando un Worker es iniciado, el método **run()** será
    ejecutado, pero el [Thread](#class.thread) no
    se detendrá hasta que una de las siguientes condiciones se cumpla:




    -
     el Worker está fuera de alcance (no hay referencias restantes);




    -
     el desarrollador llama a **shutdown()**;




    -
     el script muere.






    Esto significa que el desarrollador puede reutilizar el contexto durante
    toda la ejecución; colocar objetos en la pila del
    **Worker** hará que el **Worker**
    ejecute el método **run()** sobre los objetos apilados.

## Sinopsis de la Clase

    ****




      class **Worker**



      extends
       [Thread](#class.thread)


     implements
       [Traversable](#class.traversable),  [Countable](#class.countable),  [ArrayAccess](#class.arrayaccess) {


    /* Métodos */

public [collect](#worker.collect)([Callable](#language.types.callable) $collector = ?): [int](#language.types.integer)
public [getStacked](#worker.getstacked)(): [int](#language.types.integer)
public [isShutdown](#worker.isshutdown)(): [bool](#language.types.boolean)
public [shutdown](#worker.shutdown)(): [bool](#language.types.boolean)
public [stack](#worker.stack)([Threaded](#class.threaded) &amp;$work): [int](#language.types.integer)
public [unstack](#worker.unstack)(): [int](#language.types.integer)

    /* Métodos heredados */
    public [Thread::getCreatorId](#thread.getcreatorid)(): [int](#language.types.integer)

public static [Thread::getCurrentThread](#thread.getcurrentthread)(): [Thread](#class.thread)
public static [Thread::getCurrentThreadId](#thread.getcurrentthreadid)(): [int](#language.types.integer)
public [Thread::getThreadId](#thread.getthreadid)(): [int](#language.types.integer)
public [Thread::isJoined](#thread.isjoined)(): [bool](#language.types.boolean)
public [Thread::isStarted](#thread.isstarted)(): [bool](#language.types.boolean)
public [Thread::join](#thread.join)(): [bool](#language.types.boolean)
public [Thread::start](#thread.start)([int](#language.types.integer) $options = ?): [bool](#language.types.boolean)

}

# Worker::collect

(PECL pthreads &gt;= 3.0.0)

Worker::collect — Recopila las referencias de las tareas finalizadas

### Descripción

public **Worker::collect**([Callable](#language.types.callable) $collector = ?): [int](#language.types.integer)

Permite al worker recopilar las referencias determinadas como migajas por el
collector eventualmente proporcionado.

### Parámetros

    collector


      Una función de retrollamada que devuelve un booleano sobre la posibilidad de
      recopilar la tarea o no. Solo en casos raros debería utilizarse un collector
      personalizado.


### Valores devueltos

El número de tareas restantes en la pila del worker a recopilar.

### Ejemplos

    **Ejemplo #1 Un ejemplo básico de Worker::collect()**

&lt;?php
$worker = new Worker();

echo "There are currently {$worker-&gt;collect()} tasks on the stack to be collected\n";

for ($i = 0; $i &lt; 15; ++$i) {
$worker-&gt;stack(new class extends Threaded {});
}

echo "There are {$worker-&gt;collect()} tasks remaining on the stack to be collected\n";

$worker-&gt;start();

while ($worker-&gt;collect()); // bloque hasta que todas las tareas estén finalizadas

echo "There are now {$worker-&gt;collect()} tasks on the stack to be collected\n";

$worker-&gt;shutdown();

    El ejemplo anterior mostrará:

There are currently 0 tasks on the stack to be collected
There are 15 tasks remaining on the stack to be collected
There are now 0 tasks on the stack to be collected

# Worker::getStacked

(PECL pthreads &gt;= 2.0.0)

Worker::getStacked — Obtiene el tamaño de pila restante

### Descripción

public **Worker::getStacked**(): [int](#language.types.integer)

Devuelve el número de tareas dejadas en la pila

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de tareas actualmente en espera de ser ejecutadas por el worker

### Ejemplos

    **Ejemplo #1 Un ejemplo básico de Worker::getStacked**

&lt;?php
$worker = new Worker();

for ($i = 0; $i &lt; 5; ++$i) {
$worker-&gt;stack(new class extends Threaded {});
}

echo "Hay {$worker-&gt;getStacked()} tareas apiladas\n";

    El ejemplo anterior mostrará:

Hay 5 tareas apiladas

# Worker::isShutdown

(PECL pthreads &gt;= 2.0.0)

Worker::isShutdown — Detección de estado

### Descripción

public **Worker::isShutdown**(): [bool](#language.types.boolean)

Indica si el Worker ha sido detenido o no.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve si el Worker ha sido detenido o no.

### Ejemplos

    **Ejemplo #1 Detecta el estado de un worker**

&lt;?php
$worker = new Worker();
$worker-&gt;start();

var_dump($worker-&gt;isShutdown());

$worker-&gt;shutdown();

var_dump($worker-&gt;isShutdown());

    El ejemplo anterior mostrará:

bool(false)
bool(true)

# Worker::shutdown

(PECL pthreads &gt;= 2.0.0)

Worker::shutdown — Detener el worker

### Descripción

public **Worker::shutdown**(): [bool](#language.types.boolean)

Detiene el Worker después de ejecutar todas las tareas apiladas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Apaga el worker referenciado**

&lt;?php
$my = new Worker();
$my-&gt;start();
/_ apilar/ejecutar tareas _/
var_dump($my-&gt;shutdown());

    El ejemplo anterior mostrará:

bool(true)

# Worker::stack

(PECL pthreads &gt;= 2.0.0)

Worker::stack — Apila la tarea

### Descripción

public **Worker::stack**([Threaded](#class.threaded) &amp;$work): [int](#language.types.integer)

Añade la nueva tarea a la pila del worker referenciado.

### Parámetros

    work


      Objeto [Threaded](#class.threaded) a ejecutar por el worker.


### Valores devueltos

El nuevo tamaño de la pila.

### Ejemplos

    **Ejemplo #1 Apilamiento de una tarea para ejecución en un worker**

&lt;?php
&lt;?php
$worker = new Worker();
$work = new class extends Threaded {};

var_dump($worker-&gt;stack($work));

    El ejemplo anterior mostrará:

int(1)

# Worker::unstack

(PECL pthreads &gt;= 2.0.0)

Worker::unstack — Desapila una tarea

### Descripción

public **Worker::unstack**(): [int](#language.types.integer)

Elimina la primera tarea (la más antigua) de la pila.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nuevo tamaño de la pila.

### Historial de cambios

       Versión
       Descripción






       PECL pthreads 3.0.0

        El argumento para especificar la tarea a desapilar ha sido eliminado.
        Ahora, solo la primera tarea en la pila es eliminada.





### Ejemplos

    **Ejemplo #1 Elimina el objeto desde la cola de espera de los Workers**

&lt;?php
$my = new Worker();
$work = new class extends Threaded {};

var_dump($my-&gt;stack($work));
var_dump($my-&gt;unstack());

    El ejemplo anterior mostrará:

int(1)
int(0)

## Tabla de contenidos

- [Worker::collect](#worker.collect) — Recopila las referencias de las tareas finalizadas
- [Worker::getStacked](#worker.getstacked) — Obtiene el tamaño de pila restante
- [Worker::isShutdown](#worker.isshutdown) — Detección de estado
- [Worker::shutdown](#worker.shutdown) — Detener el worker
- [Worker::stack](#worker.stack) — Apila la tarea
- [Worker::unstack](#worker.unstack) — Desapila una tarea

# La interfaz Collectable

(PECL pthreads &gt;= 2.0.8)

## Introducción

    Representa un objeto de colección de datos obsoletos.

## Sinopsis de la Clase

    ****




        interface **Collectable** {


    /* Métodos */

public [isGarbage](#collectable.isgarbage)(): [true](#language.types.singleton)

}

# Collectable::isGarbage

(PECL pthreads &gt;= 2.0.8)

Collectable::isGarbage — Determina si un objeto ha sido marcado como obsoleto

### Descripción

public **Collectable::isGarbage**(): [true](#language.types.singleton)

Puede ser llamado en [Pool::collect()](#pool.collect)
para determinar si este objeto está obsoleto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción







8.2.0

El tipo de retorno es ahora **[true](#constant.true)**, anteriormente era [bool](#language.types.boolean).

### Ver también

    - [Pool::collect()](#pool.collect) - Recopila las referencias de las tareas completadas

## Tabla de contenidos

- [Collectable::isGarbage](#collectable.isgarbage) — Determina si un objeto ha sido marcado como obsoleto

# La clase Pool

(PECL pthreads &gt;= 2.0.0)

## Introducción

    Un Pool es un contenedor para, y controlado por, un número ajustable de Workers.




    El pooling proporciona un nivel alto de abstracción sobre la funcionalidad Worker, incluyendo la gestión de referencias en el sentido requerido por pthreads.

## Sinopsis de la Clase

    ****




      class **Pool**

     {

    /* Propiedades */

     protected
      [$size](#pool.props.size);

    protected
      [$class](#pool.props.class);

    protected
      [$workers](#pool.props.workers);

    protected
      [$ctor](#pool.props.ctor);

    protected
      [$last](#pool.props.last);


    /* Métodos */

public [\_\_construct](#pool.construct)([int](#language.types.integer) $size, [string](#language.types.string) $class = ?, [array](#language.types.array) $ctor = ?)

    public [collect](#pool.collect)([Callable](#language.types.callable) $collector = ?): [int](#language.types.integer)

public [resize](#pool.resize)([int](#language.types.integer) $size): [void](language.types.void.html)
public [shutdown](#pool.shutdown)(): [void](language.types.void.html)
public [submit](#pool.submit)([Threaded](#class.threaded) $task): [int](#language.types.integer)
public [submitTo](#pool.submitTo)([int](#language.types.integer) $worker, [Threaded](#class.threaded) $task): [int](#language.types.integer)

}

## Propiedades

     size

      Número máximo de Workers que este pool puede utilizar





     class

      La clase del Worker





     workers

      referencias a los Workers





     ctor

      Los argumentos para el constructor de los nuevos Workers





     last

      desplazamiento en los workers del último Worker utilizado




# Pool::collect

(PECL pthreads &gt;= 2.0.0)

Pool::collect — Recopila las referencias de las tareas completadas

### Descripción

public **Pool::collect**([Callable](#language.types.callable) $collector = ?): [int](#language.types.integer)

Permite al pool recopilar referencias determinadas para ser colectadas
por el colector dado opcionalmente.

### Parámetros

    collector


      Un colector que puede ser llamado y que devuelve un valor booleano para
      determinar si la tarea puede ser colectada o no. Solo en casos raros debe
      utilizarse un colector personalizado.


### Valores devueltos

Número de tareas restantes en el pool para ser colectadas.

### Historial de cambios

       Versión
       Descripción






       PECL pthreads 3.0.0

        Ahora se devuelve un entero, y el argumento
        collector es ahora opcional.





### Ejemplos

    **Ejemplo #1 Un ejemplo básico de Pool::collect()**

&lt;?php
$pool = new Pool(4);

for ($i = 0; $i &lt; 15; ++$i) {
$pool-&gt;submit(new class extends Threaded {});
}

while ($pool-&gt;collect()); // bloquea hasta que todas las tareas hayan finalizado

$pool-&gt;shutdown();

# Pool::\_\_construct

(PECL pthreads &gt;= 2.0.0)

Pool::\_\_construct — Crea un nuevo Pool de Workers

### Descripción

public **Pool::\_\_construct**([int](#language.types.integer) $size, [string](#language.types.string) $class = ?, [array](#language.types.array) $ctor = ?)

Construye un nuevo pool de workers. Los pools crean sus hilos de forma perezosa,
lo que significa que los nuevos hilos solo se generarán cuando sean necesarios
para ejecutar tareas.

### Parámetros

    size


      El número máximo de Workers que este Pool puede crear






    class


      La clase para los nuevos Workers. Si no se proporciona ninguna clase, la clase por defecto es [Worker](#class.worker).






    ctor


      Un array de argumentos para pasar al constructor de los nuevos Workers


### Ejemplos

    **Ejemplo #1 Creación de un Pool**

&lt;?php
class MyWorker extends Worker {

    public function __construct(Something $something) {
        $this-&gt;something = $something;
    }

    public function run() {
        /** ... **/
    }

}

$pool = new Pool(8, \MyWorker::class, [new Something()]);

var_dump($pool);
?&gt;

    El ejemplo anterior mostrará:

object(Pool)#1 (6) {
["size":protected]=&gt;
int(8)
["class":protected]=&gt;
string(8) "MyWorker"
["workers":protected]=&gt;
NULL
["work":protected]=&gt;
NULL
["ctor":protected]=&gt;
array(1) {
[0]=&gt;
object(Something)#2 (0) {
}
}
["last":protected]=&gt;
int(0)
}

# Pool::resize

(PECL pthreads &gt;= 2.0.0)

Pool::resize — Redimensiona el Pool

### Descripción

public **Pool::resize**([int](#language.types.integer) $size): [void](language.types.void.html)

Redimensiona el Pool.

### Parámetros

    size


      El número máximo de Workers que este Pool puede crear


### Valores devueltos

No se retorna ningún valor.

# Pool::shutdown

(PECL pthreads &gt;= 2.0.0)

Pool::shutdown — Detiene todos los workers

### Descripción

public **Pool::shutdown**(): [void](language.types.void.html)

Detiene todos los workers de este Pool. Esto se bloqueará hasta que todas
las tareas enviadas hayan sido ejecutadas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Detener un pool**

&lt;?php
class Task extends Threaded
{
public function run()
{
usleep(500000);
}
}

$pool = new Pool(4);

for ($i = 0; $i &lt; 10; ++$i) {
$pool-&gt;submit(new Task());
}

$pool-&gt;shutdown(); // se bloquea hasta que todas las tareas enviadas hayan terminado la ejecución

# Pool::submit

(PECL pthreads &gt;= 2.0.0)

Pool::submit — Envía un objeto para su ejecución

### Descripción

public **Pool::submit**([Threaded](#class.threaded) $task): [int](#language.types.integer)

Envía la tarea al próximo Worker del Pool

### Parámetros

    size


      La tarea para su ejecución


### Valores devueltos

El identificador del Worker que ejecuta el objeto

### Ejemplos

    **Ejemplo #1 Envío de tareas**

&lt;?php
class MyWork extends Threaded {

    public function run() {
        /* ... */
    }

}

class MyWorker extends Worker {

    public function __construct(Something $something) {
        $this-&gt;something = $something;
    }

    public function run() {
        /** ... **/
    }

}

$pool = new Pool(8, \MyWorker::class, [new Something()]);
$pool-&gt;submit(new MyWork());
var_dump($pool);
?&gt;

    El ejemplo anterior mostrará:

object(Pool)#1 (6) {
["size":protected]=&gt;
int(8)
["class":protected]=&gt;
string(8) "MyWorker"
["workers":protected]=&gt;
array(1) {
[0]=&gt;
object(MyWorker)#4 (1) {
["something"]=&gt;
object(Something)#5 (0) {
}
}
}
["work":protected]=&gt;
array(1) {
[0]=&gt;
object(MyWork)#3 (1) {
["worker"]=&gt;
object(MyWorker)#5 (1) {
["something"]=&gt;
object(Something)#6 (0) {
}
}
}
}
["ctor":protected]=&gt;
array(1) {
[0]=&gt;
object(Something)#2 (0) {
}
}
["last":protected]=&gt;
int(1)
}

# Pool::submitTo

(PECL pthreads &gt;= 2.0.0)

Pool::submitTo — Envía una tarea a un worker específico para su ejecución

### Descripción

public **Pool::submitTo**([int](#language.types.integer) $worker, [Threaded](#class.threaded) $task): [int](#language.types.integer)

Envía la tarea al worker especificado en el Pool. Los workers están
indexados a partir de 0, y solo existirán si el pool necesita crearlos
(ya que los threads se generan de forma perezosa).

### Parámetros

    worker


      El worker donde apilar la tarea, indexado a partir de 0.






    size


      La tarea, para su ejecución


### Valores devueltos

El identificador del Worker que ha aceptado la tarea.

### Ejemplos

    **Ejemplo #1 Envío de una tarea a un worker específico**

&lt;?php
class Task extends Threaded {
public function run() {
var_dump(Thread::getCurrentThreadID());
}
}

$pool = new Pool(2);

$pool-&gt;submit(new Task());

for ($i = 0; $i &lt; 5; ++$i) {
$pool-&gt;submitTo(0, new Task()); // apilar todas las tareas en el primer worker
}

$pool-&gt;submitTo(1, new Task()); // No es posible apilar la tarea en el segundo worker ya que aún no existe

$pool-&gt;shutdown();
?&gt;

    El ejemplo anterior mostrará:

int(4475011072)
int(4475011072)
int(4475011072)
int(4475011072)
int(4475011072)
int(4475011072)

Fatal error: Uncaught Exception: The selected worker (1) does not exist in %s:%d

## Tabla de contenidos

- [Pool::collect](#pool.collect) — Recopila las referencias de las tareas completadas
- [Pool::\_\_construct](#pool.construct) — Crea un nuevo Pool de Workers
- [Pool::resize](#pool.resize) — Redimensiona el Pool
- [Pool::shutdown](#pool.shutdown) — Detiene todos los workers
- [Pool::submit](#pool.submit) — Envía un objeto para su ejecución
- [Pool::submitTo](#pool.submitTo) — Envía una tarea a un worker específico para su ejecución

# La clase Volatile

(PECL pthreads &gt;= 3.0.0)

## Introducción

    La clase **Volatile** es nueva en pthreads v3. Su
    introducción es una consecuencia de las nuevas semánticas de inmutabilidad
    de los miembros [Threaded](#class.threaded) de las clases [Threaded](#class.threaded).
    La clase **Volatile** permite la mutabilidad de sus miembros
    [Threaded](#class.threaded), y es igualmente utilizada para almacenar
    arrays PHP en contextos [Threaded](#class.threaded).

## Sinopsis de la Clase

    ****




      class **Volatile**



      extends
       [Threaded](#class.threaded)


     implements
       [Collectable](#class.collectable),  [Traversable](#class.traversable) {

    /* Métodos heredados */

public [Threaded::chunk](#threaded.chunk)([int](#language.types.integer) $size, [bool](#language.types.boolean) $preserve): [array](#language.types.array)
public [Threaded::count](#threaded.count)(): [int](#language.types.integer)
public [Threaded::extend](#threaded.extend)([string](#language.types.string) $class): [bool](#language.types.boolean)
public [Threaded::isRunning](#thread.isrunning)(): [bool](#language.types.boolean)
public [Threaded::isTerminated](#threaded.isterminated)(): [bool](#language.types.boolean)
public [Threaded::merge](#threaded.merge)([mixed](#language.types.mixed) $from, [bool](#language.types.boolean) $overwrite = ?): [bool](#language.types.boolean)
public [Threaded::notify](#threaded.notify)(): [bool](#language.types.boolean)
public [Threaded::notifyOne](#threaded.notifyone)(): [bool](#language.types.boolean)
public [Threaded::pop](#threaded.pop)(): [bool](#language.types.boolean)
public [Threaded::run](#threaded.run)(): [void](language.types.void.html)
public [Threaded::shift](#threaded.shift)(): [bool](#language.types.boolean)
public [Threaded::synchronized](#threaded.synchronized)([Closure](#class.closure) $block, [mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)
public [Threaded::wait](#threaded.wait)([int](#language.types.integer) $timeout = ?): [bool](#language.types.boolean)

}

## Ejemplos

    **Ejemplo #1 Nuevas semánticas de inmutabilidad de Threaded**

&lt;?php

class Task extends Threaded
{
public function \_\_construct()
{
$this-&gt;data = new Threaded();

        // intenta reemplazar una propiedad Threaded de una clase Threaded (inválido)
        $this-&gt;data = new stdClass();
    }

}

var_dump((new Task())-&gt;data);

    Resultado del ejemplo anterior es similar a:

RuntimeException: Threaded members previously set to Threaded objects are immutable, cannot overwrite data in %s:%d

    **Ejemplo #2 Caso de uso de Volatile**

&lt;?php

class Task extends Volatile
{
public function \_\_construct()
{
$this-&gt;data = new Threaded();

        // intenta reemplazar una propiedad Threaded de una clase Volatile (válido)
        $this-&gt;data = new stdClass();
    }

}

var_dump((new Task())-&gt;data);

    Resultado del ejemplo anterior es similar a:

object(stdClass)#3 (0) {
}

- [Introducción](#intro.pthreads)
- [Instalación/Configuración](#pthreads.setup)<li>[Requerimientos](#pthreads.requirements)
- [Instalación](#pthreads.installation)
  </li>- [Constantes predefinidas](#pthreads.constants)
- [Threaded](#class.threaded) — La clase Threaded<li>[Threaded::chunk](#threaded.chunk) — Manipulación
- [Threaded::count](#threaded.count) — Manipulación
- [Threaded::extend](#threaded.extend) — Manipulación durante la ejecución
- [Threaded::isRunning](#thread.isrunning) — Detección de estado
- [Threaded::isTerminated](#threaded.isterminated) — Detección de estado
- [Threaded::merge](#threaded.merge) — Manipulación
- [Threaded::notify](#threaded.notify) — Sincronización
- [Threaded::notifyOne](#threaded.notifyone) — Sincronizar
- [Threaded::pop](#threaded.pop) — Manipulación
- [Threaded::run](#threaded.run) — Ejecución
- [Threaded::shift](#threaded.shift) — Manipulación
- [Threaded::synchronized](#threaded.synchronized) — Sincronización
- [Threaded::wait](#threaded.wait) — Sincronización
  </li>- [Thread](#class.thread) — La clase Thread<li>[Thread::getCreatorId](#thread.getcreatorid) — Identificación
- [Thread::getCurrentThread](#thread.getcurrentthread) — Identificación
- [Thread::getCurrentThreadId](#thread.getcurrentthreadid) — Identificación
- [Thread::getThreadId](#thread.getthreadid) — Identificación
- [Thread::isJoined](#thread.isjoined) — Detección de estado
- [Thread::isStarted](#thread.isstarted) — Detección de estado
- [Thread::join](#thread.join) — Sincronización
- [Thread::start](#thread.start) — Ejecución
  </li>- [Worker](#class.worker) — La clase Worker<li>[Worker::collect](#worker.collect) — Recopila las referencias de las tareas finalizadas
- [Worker::getStacked](#worker.getstacked) — Obtiene el tamaño de pila restante
- [Worker::isShutdown](#worker.isshutdown) — Detección de estado
- [Worker::shutdown](#worker.shutdown) — Detener el worker
- [Worker::stack](#worker.stack) — Apila la tarea
- [Worker::unstack](#worker.unstack) — Desapila una tarea
  </li>- [Collectable](#class.collectable) — La interfaz Collectable<li>[Collectable::isGarbage](#collectable.isgarbage) — Determina si un objeto ha sido marcado como obsoleto
  </li>- [Pool](#class.pool) — La clase Pool<li>[Pool::collect](#pool.collect) — Recopila las referencias de las tareas completadas
- [Pool::\_\_construct](#pool.construct) — Crea un nuevo Pool de Workers
- [Pool::resize](#pool.resize) — Redimensiona el Pool
- [Pool::shutdown](#pool.shutdown) — Detiene todos los workers
- [Pool::submit](#pool.submit) — Envía un objeto para su ejecución
- [Pool::submitTo](#pool.submitTo) — Envía una tarea a un worker específico para su ejecución
  </li>- [Volatile](#class.volatile) — La clase Volatile
