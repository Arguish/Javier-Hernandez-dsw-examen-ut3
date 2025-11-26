# Sync

# Introducción

La extensión sync introduce la sincronización de objetos cross-plataforma en PHP.
Los Mutex nombrados o no, los semáforos, los eventos, los objetos de
lectura-escritura y la memoria compartida se beneficiarán de una sincronización a nivel del sistema operativo tanto en
los sistemas POSIX (i.e. Linux) como en los sistemas Windows.

Una limpieza automática de los objetos que han obtenido una sincronización
se realiza al desmontar la extensión. Esto significa que si PHP termina prematuramente
un script (i.e. el script excede su tiempo máximo de ejecución), los objetos
no se dejarán en un estado desconocido. La única excepción a este mecanismo
es si PHP mismo se bloquea (i.e. un desbordamiento de buffer interno).

La sincronización de los objetos no nombrados no tiene utilidad fuera de un
escenario multihilo. Los objetos no nombrados son más útiles en conjunción
con la extensión PECL pthreads.

**Nota**:

    Los objetos nombrados requieren atención adicional para ser utilizados
    en todos los sistemas. Si un objeto se instancia con un conjunto específico de
    parámetros, siempre debe ser instanciado con estos parámetros o el objeto
    probablemente terminará en un estado no consistente hasta el próximo
    reinicio o hasta que un administrador los limpie.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#sync.requirements)
- [Instalación](#sync.installation)

    ## Requerimientos

    Un sistema con soporte POSIX de memoria compartida (shm_open()) o funcionando bajo Windows.

    ## Instalación

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/sync](https://pecl.php.net/package/sync).

# La clase SyncMutex

(PECL sync &gt;= 1.0.0)

## Introducción

    Una implementación multiplataforma, nativa de los objetos Mutex nombrados o no nombrados.




    Un Mutex es un objeto de exclusión mutua que restringe el acceso a un recurso compartido
    (i.e. un fichero) a una sola instancia. Los Mutex contables adquieren el mutex una
    sola vez y, internamente, rastrean el número de veces que el mutex es bloqueado.
    El Mutex es desbloqueado tan pronto como sale del ámbito o es desbloqueado el
    mismo número de veces que ha sido bloqueado.

## Sinopsis de la Clase

    ****




      class **SyncMutex**

     {


    /* Métodos */

public [\_\_construct](#syncmutex.construct)([string](#language.types.string) $name = ?)
public [lock](#syncmutex.lock)([int](#language.types.integer) $wait = -1): [bool](#language.types.boolean)
public [unlock](#syncmutex.unlock)([bool](#language.types.boolean) $all = **[false](#constant.false)**): [bool](#language.types.boolean)

}

# SyncMutex::\_\_construct

(PECL sync &gt;= 1.0.0)

SyncMutex::\_\_construct — Construye un nuevo objeto SyncMutex

### Descripción

public **SyncMutex::\_\_construct**([string](#language.types.string) $name = ?)

Construye un objeto contable nombrado o no.

### Parámetros

    name


      El nombre del mutex si se trata de un objeto mutex nombrado.



     **Nota**:



       Si el nombre ya existe, debe ser capaz de ser abierto por el usuario
       actual ejecutando el proceso, o bien se lanzará una excepción
       con el mensaje de error correspondiente.





### Valores devueltos

El nuevo objeto [SyncMutex](#class.syncmutex).

### Errores/Excepciones

Se lanza una excepción si el mutex no puede
ser creado o abierto.

### Ejemplos

**Ejemplo #1 Ejemplo con SyncMutex::\_\_construct()**
y un mutex nombrado con un tiempo de espera máximo para el bloqueo

&lt;?php
$mutex = new SyncMutex("UniqueName");

if (!$mutex-&gt;lock(3000))
{
echo "Imposible bloquear el mutex.";

    exit();

}

/_ ... _/

$mutex-&gt;unlock();
?&gt;

**Ejemplo #2 Ejemplo con SyncMutex::\_\_construct()**
y un mutex no nombrado

&lt;?php
$mutex = new SyncMutex();

$mutex-&gt;lock();

/_ ... _/

$mutex-&gt;unlock();
?&gt;

### Ver también

- [SyncMutex::lock()](#syncmutex.lock) - Obtiene un bloqueo exclusivo

- [SyncMutex::unlock()](#syncmutex.unlock) - Desbloquea el mutex

# SyncMutex::lock

(PECL sync &gt;= 1.0.0)

SyncMutex::lock — Obtiene un bloqueo exclusivo

### Descripción

public **SyncMutex::lock**([int](#language.types.integer) $wait = -1): [bool](#language.types.boolean)

Obtiene un bloqueo exclusivo sobre un objeto [SyncMutex](#class.syncmutex).
Si el bloqueo ya está adquirido, entonces este método incrementará el contador interno.

### Parámetros

    wait


      El número de milisegundos a esperar para la obtención del bloqueo exclusivo.
      Un valor de -1 significa que se espera indefinidamente.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con SyncMutex::lock()**

&lt;?php
$mutex = new SyncMutex("UniqueName");

if (!$mutex-&gt;lock(3000))
{
echo "Imposible bloquear el mutex.";

    exit();

}

/_ ... _/

$mutex-&gt;unlock();
?&gt;

### Ver también

- [SyncMutex::unlock()](#syncmutex.unlock) - Desbloquea el mutex

# SyncMutex::unlock

(PECL sync &gt;= 1.0.0)

SyncMutex::unlock — Desbloquea el mutex

### Descripción

public **SyncMutex::unlock**([bool](#language.types.boolean) $all = **[false](#constant.false)**): [bool](#language.types.boolean)

Decrementa el contador interno de un objeto [SyncMutex](#class.syncmutex).
Cuando el contador interno llega a cero, el bloqueo actual
del objeto se libera.

### Parámetros

    all


      Especifica si se debe o no establecer el contador interno a cero
      y, por lo tanto, liberar el bloqueo.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con SyncMutex::unlock()**

&lt;?php
$mutex = new SyncMutex("UniqueName");

$mutex-&gt;lock();

/_ ... _/

$mutex-&gt;unlock();
?&gt;

### Ver también

- [SyncMutex::lock()](#syncmutex.lock) - Obtiene un bloqueo exclusivo

## Tabla de contenidos

- [SyncMutex::\_\_construct](#syncmutex.construct) — Construye un nuevo objeto SyncMutex
- [SyncMutex::lock](#syncmutex.lock) — Obtiene un bloqueo exclusivo
- [SyncMutex::unlock](#syncmutex.unlock) — Desbloquea el mutex

# La clase SyncSemaphore

(PECL sync &gt;= 1.0.0)

## Introducción

    Una implementación multiplataforma, nativa de los objetos Sémaphore nombrados o no nombrados.




    Un sémaphore restringe el acceso a un recurso limitado a un número limitado
    de instancias. Los sémaphores difieren de los mutexes en el sentido de que permiten
    a más de una instancia acceder a un recurso al mismo tiempo, mientras que el mutex
    solo permite una instancia a la vez.

## Sinopsis de la Clase

    ****




      class **SyncSemaphore**

     {


    /* Métodos */

public [\_\_construct](#syncsemaphore.construct)([string](#language.types.string) $name = ?, [int](#language.types.integer) $initialval = 1, [bool](#language.types.boolean) $autounlock = **[true](#constant.true)**)
public [lock](#syncsemaphore.lock)([int](#language.types.integer) $wait = -1): [bool](#language.types.boolean)
public [unlock](#syncsemaphore.unlock)([int](#language.types.integer) &amp;$prevcount = ?): [bool](#language.types.boolean)

}

# SyncSemaphore::\_\_construct

(PECL sync &gt;= 1.0.0)

SyncSemaphore::\_\_construct — Construye un nuevo objeto SyncSemaphore

### Descripción

public **SyncSemaphore::\_\_construct**([string](#language.types.string) $name = ?, [int](#language.types.integer) $initialval = 1, [bool](#language.types.boolean) $autounlock = **[true](#constant.true)**)

Construye un semáforo con nombre o sin nombre.

### Parámetros

    name


      El nombre del semáforo si tiene nombre.



     **Nota**:



       Si el nombre ya existe, el objeto debe poder ser abierto por el usuario
       actual que ejecuta el proceso, o se emitirá una excepción con el mensaje de error.







    initialval


      El valor inicial del semáforo. Este será el número de bloqueos que pueden
      ser obtenidos.






    autounlock


      Especifica si se debe desbloquear automáticamente el semáforo al final del script PHP.



     **Advertencia**

       Si el objeto es un semáforo con nombre cuyo autounlock es **[false](#constant.false)**, el objeto está bloqueado, y el script PHP termina antes de que el objeto sea desbloqueado, entonces el semáforo subyacente terminará en un estado no consistente.





### Valores devueltos

El nuevo objeto [SyncSemaphore](#class.syncsemaphore).

### Errores/Excepciones

Se emitirá una excepción si el semáforo no puede ser creado o abierto.

### Ejemplos

**Ejemplo #1 Ejemplo con SyncSemaphore::\_\_construct()**

&lt;?php
$semaphore = new SyncSemaphore("LimitedResource_2clients", 2);

if (!$semaphore-&gt;lock(3000))
{
echo "Imposible bloquear el semáforo.";

    exit();

}

/_ ... _/

$semaphore-&gt;unlock();
?&gt;

### Ver también

- [SyncSemaphore::lock()](#syncsemaphore.lock) - Disminuye el contador del objeto SyncSemaphore o espera

- [SyncSemaphore::unlock()](#syncsemaphore.unlock) - Incrementa el contador del objeto SyncSemaphore

# SyncSemaphore::lock

(PECL sync &gt;= 1.0.0)

SyncSemaphore::lock — Disminuye el contador del objeto SyncSemaphore o espera

### Descripción

public **SyncSemaphore::lock**([int](#language.types.integer) $wait = -1): [bool](#language.types.boolean)

Disminuye el contador del objeto [SyncSemaphore](#class.syncsemaphore) o espera hasta que el semáforo
tenga un valor diferente de cero.

### Parámetros

    wait


      El número de milisegundos a esperar por el semáforo.
      Un valor de -1 significa que se espera indefinidamente.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con SyncSemaphore::lock()**

&lt;?php
$semaphore = new SyncSemaphore("LimitedResource_2clients", 2);

if (!$semaphore-&gt;lock(3000))
{
echo "Imposible desbloquear el semáforo.";

    exit();

}

/_ ... _/

$semaphore-&gt;unlock();
?&gt;

### Ver también

- [SyncSemaphore::unlock()](#syncsemaphore.unlock) - Incrementa el contador del objeto SyncSemaphore

# SyncSemaphore::unlock

(PECL sync &gt;= 1.0.0)

SyncSemaphore::unlock — Incrementa el contador del objeto SyncSemaphore

### Descripción

public **SyncSemaphore::unlock**([int](#language.types.integer) &amp;$prevcount = ?): [bool](#language.types.boolean)

Incrementa el contador del objeto [SyncSemaphore](#class.syncsemaphore).

### Parámetros

    prevcount


      Devuelve el contador anterior del semáforo.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con SyncSemaphore::unlock()**

&lt;?php
$semaphore = new SyncSemaphore("LimitedResource_2clients", 2);

if (!$semaphore-&gt;lock(3000))
{
echo "Imposible desbloquear el semáforo.";

    exit();

}

/_ ... _/

$semaphore-&gt;unlock();
?&gt;

### Ver también

- [SyncSemaphore::lock()](#syncsemaphore.lock) - Disminuye el contador del objeto SyncSemaphore o espera

## Tabla de contenidos

- [SyncSemaphore::\_\_construct](#syncsemaphore.construct) — Construye un nuevo objeto SyncSemaphore
- [SyncSemaphore::lock](#syncsemaphore.lock) — Disminuye el contador del objeto SyncSemaphore o espera
- [SyncSemaphore::unlock](#syncsemaphore.unlock) — Incrementa el contador del objeto SyncSemaphore

# La clase SyncEvent

(PECL sync &gt;= 1.0.0)

## Introducción

    Una implementación multiplataforma nativa de objetos de eventos nombrados o sin nombre.
    Se soportan tanto los objetos de eventos automáticos como manuales.




    Un objeto de evento espera, sin cola, que los objetos sean lanzados/definidos.
    Una instancia espera en el objeto de evento mientras otra lanza/define el evento.
    Los objetos de eventos son útiles a lo largo de un proceso largo (i.e. verificar si una descarga de datos debe ser analizada).

## Sinopsis de la Clase

    ****




      class **SyncEvent**

     {


    /* Métodos */

public [\_\_construct](#syncevent.construct)([string](#language.types.string) $name = ?, [bool](#language.types.boolean) $manual = **[false](#constant.false)**, [bool](#language.types.boolean) $prefire = **[false](#constant.false)**)
public [fire](#syncevent.fire)(): [bool](#language.types.boolean)
public [reset](#syncevent.reset)(): [bool](#language.types.boolean)
public [wait](#syncevent.wait)([int](#language.types.integer) $wait = -1): [bool](#language.types.boolean)

}

# SyncEvent::\_\_construct

(PECL sync &gt;= 1.0.0)

SyncEvent::\_\_construct — Construye un nuevo objeto SyncEvent

### Descripción

public **SyncEvent::\_\_construct**([string](#language.types.string) $name = ?, [bool](#language.types.boolean) $manual = **[false](#constant.false)**, [bool](#language.types.boolean) $prefire = **[false](#constant.false)**)

Construye un objeto de evento nombrado o no.

### Parámetros

    name


      El nombre del evento si es un objeto de evento nombrado.



     **Nota**:



       Si el nombre ya existe, debe ser posible abrirlo con el usuario
       actual que ejecuta el proceso, o se lanzará una excepción
       con el contenido del mensaje de error.







    manual


      Especifica si el objeto de evento debe ser reinicializado manualmente o no.



     **Nota**:



       La reinicialización manual de los objetos de eventos permite la
       puesta en espera de los procesos hasta que el objeto sea reinicializado.







    prefire


      Especifica si se debe o no pre-enviar (la señal)
      al objeto de evento.



     **Nota**:



       Solo tiene impacto si la llamada al proceso/hilo
       es el primero en crear el objeto.





### Valores devueltos

El nuevo objeto [SyncEvent](#class.syncevent).

### Errores/Excepciones

Se lanza una excepción si el objeto de evento
no puede ser creado o abierto.

### Ejemplos

**Ejemplo #1 Ejemplo con SyncEvent::\_\_construct()**

&lt;?php
// En una aplicación web:
$event = new SyncEvent("GetAppReport");
$event-&gt;fire();

// En un cron:
$event = new SyncEvent("GetAppReport");
$event-&gt;wait();
?&gt;

### Historial de cambios

       Versión
       Descripción






       PECL sync 1.1.0


         Adición del parámetro prefire.








### Ver también

- [SyncEvent::fire()](#syncevent.fire) - Lanza/define el evento

- [SyncEvent::reset()](#syncevent.reset) - Reinicializa manualmente un evento

- [SyncEvent::wait()](#syncevent.wait) - Espera a que el objeto SyncEvent sea lanzado

# SyncEvent::fire

(PECL sync &gt;= 1.0.0)

SyncEvent::fire — Lanza/define el evento

### Descripción

public **SyncEvent::fire**(): [bool](#language.types.boolean)

Lanza/define un objeto [SyncEvent](#class.syncevent). Mantiene varios hilos en espera
si el objeto de evento ha sido creado con un valor manual a **[true](#constant.true)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con SyncEvent::fire()**

&lt;?php
// En una aplicación web:
$event = new SyncEvent("GetAppReport");
$event-&gt;fire();

// En un cron:
$event = new SyncEvent("GetAppReport");
$event-&gt;wait();
?&gt;

### Ver también

- [SyncEvent::reset()](#syncevent.reset) - Reinicializa manualmente un evento

- [SyncEvent::wait()](#syncevent.wait) - Espera a que el objeto SyncEvent sea lanzado

# SyncEvent::reset

(PECL sync &gt;= 1.0.0)

SyncEvent::reset — Reinicializa manualmente un evento

### Descripción

public **SyncEvent::reset**(): [bool](#language.types.boolean)

Reinicializa un objeto [SyncEvent](#class.syncevent) que ha sido lanzado/definido. Solo válido para
los objetos de evento manuales.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con SyncEvent::reset()**

&lt;?php
// En una aplicación web:
$event = new SyncEvent("DemoApplication", true);
$event-&gt;wait();

// En un cron:
$event = new SyncEvent("DemoApplication", true);
$event-&gt;reset();
/_ ... Realizar algunas tareas de mantenimiento ... _/
$event-&gt;fire();
?&gt;

### Ver también

- [SyncEvent::fire()](#syncevent.fire) - Lanza/define el evento

- **SyncEvent::reset()**

- [SyncEvent::wait()](#syncevent.wait) - Espera a que el objeto SyncEvent sea lanzado

# SyncEvent::wait

(PECL sync &gt;= 1.0.0)

SyncEvent::wait — Espera a que el objeto SyncEvent sea lanzado

### Descripción

public **SyncEvent::wait**([int](#language.types.integer) $wait = -1): [bool](#language.types.boolean)

Espera a que el objeto [SyncEvent](#class.syncevent) sea lanzado.

### Parámetros

    wait


      El número de milisegundos a esperar a que el evento sea lanzado.
      Un valor de -1 significa que se espera indefinidamente.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con SyncEvent::wait()**

&lt;?php
// En una aplicación web:
$event = new SyncEvent("GetAppReport");
$event-&gt;fire();

// En un cron:
$event = new SyncEvent("GetAppReport");
$event-&gt;wait();
?&gt;

### Ver también

- [SyncEvent::fire()](#syncevent.fire) - Lanza/define el evento

## Tabla de contenidos

- [SyncEvent::\_\_construct](#syncevent.construct) — Construye un nuevo objeto SyncEvent
- [SyncEvent::fire](#syncevent.fire) — Lanza/define el evento
- [SyncEvent::reset](#syncevent.reset) — Reinicializa manualmente un evento
- [SyncEvent::wait](#syncevent.wait) — Espera a que el objeto SyncEvent sea lanzado

# La clase SyncReaderWriter

(PECL sync &gt;= 1.0.0)

## Introducción

    Una implementación multiplataforma, nativa de los objetos de lectura-escritura nombrados o no.




    Un objeto de lectura-escritura permite múltiples lecturas o una escritura para acceder a un recurso. Es una solución eficiente para gestionar los recursos donde el acceso es originalmente de solo lectura, pero un acceso de escritura es ocasionalmente necesario.

## Sinopsis de la Clase

    ****




      class **SyncReaderWriter**

     {


    /* Métodos */

public [\_\_construct](#syncreaderwriter.construct)([string](#language.types.string) $name = ?, [int](#language.types.integer) $autounlock = 1)
public [readlock](#syncreaderwriter.readlock)([int](#language.types.integer) $wait = -1): [bool](#language.types.boolean)
public [readunlock](#syncreaderwriter.readunlock)(): [bool](#language.types.boolean)
public [writelock](#syncreaderwriter.writelock)([int](#language.types.integer) $wait = -1): [bool](#language.types.boolean)
public [writeunlock](#syncreaderwriter.writeunlock)(): [bool](#language.types.boolean)

}

# SyncReaderWriter::\_\_construct

(PECL sync &gt;= 1.0.0)

SyncReaderWriter::\_\_construct — Construye un nuevo objeto SyncReaderWriter

### Descripción

public **SyncReaderWriter::\_\_construct**([string](#language.types.string) $name = ?, [int](#language.types.integer) $autounlock = 1)

Construye un objeto de lectura/escritura nombrado o no.

### Parámetros

    name


      El nombre del objeto si está nombrado.



     **Nota**:



       Si el nombre ya existe, el objeto debe poder ser abierto con el usuario
       actual que ejecuta el proceso, o se emitirá una excepción conteniendo
       el mensaje de error.




     **Nota**:

       En Windows, name no debe contener barras invertidas.







    autounlock


      Especifica si se debe desbloquear automáticamente el objeto al final del
      script PHP.



     **Advertencia**

       Si el objeto es un objeto de lectura/escritura con el autounlock en **[false](#constant.false)**,
       el objeto está bloqueado en lectura o en escritura, y el script PHP
       terminará antes del desbloqueo del objeto, y por lo tanto, el objeto
       subyacente terminará en un estado no consistente.





### Valores devueltos

El nuevo objeto [SyncReaderWriter](#class.syncreaderwriter).

### Errores/Excepciones

Se emite una excepción si el objeto de
lectura/escritura no puede ser creado o abierto.

### Ejemplos

**Ejemplo #1 Ejemplo con SyncReaderWriter::\_\_construct()**

&lt;?php
$readwrite = new SyncReaderWriter("FileCacheLock");
$readwrite-&gt;readlock();
/_ ... _/
$readwrite-&gt;readunlock();

$readwrite-&gt;writelock();
/* ... */
$readwrite-&gt;writeunlock();
?&gt;

### Ver también

- [SyncReaderWriter::readlock()](#syncreaderwriter.readlock) - Obtiene un bloqueo de lectura

- [SyncReaderWriter::readunlock()](#syncreaderwriter.readunlock) - Libera un bloqueo de lectura

- [SyncReaderWriter::writelock()](#syncreaderwriter.writelock) - Espera un bloqueo de escritura exclusivo

- [SyncReaderWriter::writeunlock()](#syncreaderwriter.writeunlock) - Libera un bloqueo de escritura

# SyncReaderWriter::readlock

(PECL sync &gt;= 1.0.0)

SyncReaderWriter::readlock — Obtiene un bloqueo de lectura

### Descripción

public **SyncReaderWriter::readlock**([int](#language.types.integer) $wait = -1): [bool](#language.types.boolean)

Obtiene un bloqueo de lectura en un objeto [SyncReaderWriter](#class.syncreaderwriter).

### Parámetros

    wait


      El número de milisegundos de espera para obtener un bloqueo. Un valor de -1 significa
      que se espera indefinidamente.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con SyncReaderWriter::readlock()**

&lt;?php
$readwrite = new SyncReaderWriter("FileCacheLock");
$readwrite-&gt;readlock();
/_ ... _/
$readwrite-&gt;readunlock();
?&gt;

### Ver también

- [SyncReaderWriter::readunlock()](#syncreaderwriter.readunlock) - Libera un bloqueo de lectura

# SyncReaderWriter::readunlock

(PECL sync &gt;= 1.0.0)

SyncReaderWriter::readunlock — Libera un bloqueo de lectura

### Descripción

public **SyncReaderWriter::readunlock**(): [bool](#language.types.boolean)

Libera un bloqueo de lectura sobre un objeto [SyncReaderWriter](#class.syncreaderwriter).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con SyncReaderWriter::readunlock()**

&lt;?php
$readwrite = new SyncReaderWriter("FileCacheLock");
$readwrite-&gt;readlock();
/_ ... _/
$readwrite-&gt;readunlock();
?&gt;

### Ver también

- [SyncReaderWriter::readlock()](#syncreaderwriter.readlock) - Obtiene un bloqueo de lectura

# SyncReaderWriter::writelock

(PECL sync &gt;= 1.0.0)

SyncReaderWriter::writelock — Espera un bloqueo de escritura exclusivo

### Descripción

public **SyncReaderWriter::writelock**([int](#language.types.integer) $wait = -1): [bool](#language.types.boolean)

Obtiene un bloqueo de escritura exclusivo sobre un objeto [SyncReaderWriter](#class.syncreaderwriter).

### Parámetros

    wait


      El número de milisegundos para esperar el bloqueo.
      Un valor de -1 significa que se espera indefinidamente.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con SyncReaderWriter::writelock()**

&lt;?php
$readwrite = new SyncReaderWriter("FileCacheLock");
$readwrite-&gt;writelock();
/_ ... _/
$readwrite-&gt;writeunlock();
?&gt;

### Ver también

- [SyncReaderWriter::writeunlock()](#syncreaderwriter.writeunlock) - Libera un bloqueo de escritura

# SyncReaderWriter::writeunlock

(PECL sync &gt;= 1.0.0)

SyncReaderWriter::writeunlock — Libera un bloqueo de escritura

### Descripción

public **SyncReaderWriter::writeunlock**(): [bool](#language.types.boolean)

Libera un bloqueo de escritura en un objeto [SyncReaderWriter](#class.syncreaderwriter).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con SyncReaderWriter::writeunlock()**

&lt;?php
$readwrite = new SyncReaderWriter("FileCacheLock");
$readwrite-&gt;writelock();
/_ ... _/
$readwrite-&gt;writeunlock();
?&gt;

### Ver también

- [SyncReaderWriter::writelock()](#syncreaderwriter.writelock) - Espera un bloqueo de escritura exclusivo

## Tabla de contenidos

- [SyncReaderWriter::\_\_construct](#syncreaderwriter.construct) — Construye un nuevo objeto SyncReaderWriter
- [SyncReaderWriter::readlock](#syncreaderwriter.readlock) — Obtiene un bloqueo de lectura
- [SyncReaderWriter::readunlock](#syncreaderwriter.readunlock) — Libera un bloqueo de lectura
- [SyncReaderWriter::writelock](#syncreaderwriter.writelock) — Espera un bloqueo de escritura exclusivo
- [SyncReaderWriter::writeunlock](#syncreaderwriter.writeunlock) — Libera un bloqueo de escritura

# La clase SyncSharedMemory

(PECL sync &gt;= 1.1.0)

## Introducción

    Una implementación nativa, coherente y multiplataforma de objetos de memoria compartida nombrada.




    La memoria compartida permite a dos procesos distintos comunicarse sin necesidad de
    tuberías o sockets complejos. Existen varias implementaciones de memoria compartida
    basadas en enteros para PHP. La memoria compartida nombrada es una alternativa.




    Los objetos de sincronización (por ejemplo, SyncMutex) son siempre necesarios para proteger la mayoría
    de los usos de la memoria compartida.

## Sinopsis de la Clase

    ****




      class **SyncSharedMemory**

     {


    /* Métodos */

public [\_\_construct](#syncsharedmemory.construct)([string](#language.types.string) $name, [int](#language.types.integer) $size)
public [first](#syncsharedmemory.first)(): [bool](#language.types.boolean)
public [read](#syncsharedmemory.read)([int](#language.types.integer) $start = 0, [int](#language.types.integer) $length = ?)
public [size](#syncsharedmemory.size)(): [int](#language.types.integer)
public [write](#syncsharedmemory.write)([string](#language.types.string) $string = ?, [int](#language.types.integer) $start = 0)

}

# SyncSharedMemory::\_\_construct

(PECL sync &gt;= 1.1.0)

SyncSharedMemory::\_\_construct — Construye un nuevo objeto SyncSharedMemory

### Descripción

public **SyncSharedMemory::\_\_construct**([string](#language.types.string) $name, [int](#language.types.integer) $size)

Construye un objeto de memoria compartida con nombre.

### Parámetros

    name


      El nombre del objeto de memoria compartida.



     **Nota**:



       Si el nombre ya existe, debe poder ser abierto por el usuario actual
       que el proceso está en ejecución o se lanzará una excepción con un mensaje de error
       sin significado.







    size


      El tamaño, en bytes, de la memoria compartida a reservar.



     **Nota**:



       La cantidad de memoria no puede ser redimensionada posteriormente. Solicite suficiente almacenamiento de antemano.





### Valores devueltos

El nuevo objeto [SyncSharedMemory](#class.syncsharedmemory).

### Errores/Excepciones

Se lanza una excepción si el objeto de memoria compartida no puede ser creado o abierto.

### Ejemplos

**Ejemplo #1 Ejemplo de SyncSharedMemory::\_\_construct()**

&lt;?php
// Probablemente se deberá proteger la memoria compartida con otros objetos de sincronización.
// La memoria compartida desaparece cuando la última referencia a ella desaparece.
$mem = new SyncSharedMemory("AppReportName", 1024);
if ($mem-&gt;first())
{
// Realizar el trabajo de inicialización la primera vez aquí.
}

$result = $mem-&gt;write(json_encode(array("name" =&gt; "my_report.txt")));
?&gt;

### Ver también

- [SyncSharedMemory::first()](#syncsharedmemory.first) - Verifica si el objeto es la primera instancia en todo el sistema de la memoria compartida nombrada

- [SyncSharedMemory::size()](#syncsharedmemory.size) - Devuelve el tamaño de la memoria compartida nombrada

- [SyncSharedMemory::write()](#syncsharedmemory.write) - Copia los datos en la memoria compartida nombrada

- [SyncSharedMemory::read()](#syncsharedmemory.read) - Copia de datos de la memoria compartida nombrada

# SyncSharedMemory::first

(PECL sync &gt;= 1.1.0)

SyncSharedMemory::first — Verifica si el objeto es la primera instancia en todo el sistema de la memoria compartida nombrada

### Descripción

public **SyncSharedMemory::first**(): [bool](#language.types.boolean)

Recupera el estado de primera instancia del objeto [SyncSharedMemory](#class.syncsharedmemory) en todo el sistema.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de SyncSharedMemory::first()**

&lt;?php
$mem = new SyncSharedMemory("AppReportName", 1024);
if ($mem-&gt;first())
{
// Realizar el trabajo de inicialización la primera vez aquí.
}

var_dump($mem-&gt;first());

$mem2 = new SyncSharedMemory("AppReportName", 1024);

var_dump($mem2-&gt;first());
?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)
bool(false)

### Ver también

- [SyncSharedMemory::write()](#syncsharedmemory.write) - Copia los datos en la memoria compartida nombrada

- [SyncSharedMemory::read()](#syncsharedmemory.read) - Copia de datos de la memoria compartida nombrada

# SyncSharedMemory::read

(PECL sync &gt;= 1.1.0)

SyncSharedMemory::read — Copia de datos de la memoria compartida nombrada

### Descripción

public **SyncSharedMemory::read**([int](#language.types.integer) $start = 0, [int](#language.types.integer) $length = ?)

Copia de datos de la memoria compartida nombrada.

### Parámetros

    start


      El inicio/desplazamiento, en bytes, para comenzar la lectura.



     **Nota**:



       Si el valor es negativo, la posición de inicio comenzará en el número especificado
       de bytes desde el final del segmento de memoria compartida.







    length


      El número de bytes a leer.



     **Nota**:



       Si no se especifica, la lectura se detendrá al final del segmento de memoria compartida.




       Si el valor es negativo, la lectura se detendrá en el número especificado de bytes
       desde el final del segmento de memoria compartida.





### Valores devueltos

Un string que contiene los datos leídos de la memoria compartida.

### Ejemplos

**Ejemplo #1 Ejemplo de [SyncSharedMemory::\_\_construct()](#syncsharedmemory.construct)**

&lt;?php
// Probablemente se deberá proteger la memoria compartida con otros objetos de sincronización.
// La memoria compartida desaparece cuando la última referencia a ella desaparece.
$mem = new SyncSharedMemory("AppReportName", 1024);
if ($mem-&gt;first())
{
// Realizar el trabajo de inicialización la primera vez aquí.
}

$result = $mem-&gt;write("report.txt");

$result = $mem-&gt;read(3, -4);
var_dump($result);
?&gt;

Resultado del ejemplo anterior es similar a:

string(3) "ort"

### Ver también

- [SyncSharedMemory::\_\_construct()](#syncsharedmemory.construct) - Construye un nuevo objeto SyncSharedMemory

- [SyncSharedMemory::first()](#syncsharedmemory.first) - Verifica si el objeto es la primera instancia en todo el sistema de la memoria compartida nombrada

- [SyncSharedMemory::write()](#syncsharedmemory.write) - Copia los datos en la memoria compartida nombrada

- **SyncSharedMemory::read()**

# SyncSharedMemory::size

(PECL sync &gt;= 1.1.0)

SyncSharedMemory::size — Devuelve el tamaño de la memoria compartida nombrada

### Descripción

public **SyncSharedMemory::size**(): [int](#language.types.integer)

Recupera el tamaño de la memoria compartida de un objeto [SyncSharedMemory](#class.syncsharedmemory).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un integer que contiene el tamaño de la memoria compartida. Este será el mismo tamaño que se pasó al constructor.

### Ejemplos

**Ejemplo #1 Ejemplo de SyncSharedMemory::size()**

&lt;?php
$mem = new SyncSharedMemory("AppReportName", 1024);
var_dump($mem-&gt;size());
?&gt;

Resultado del ejemplo anterior es similar a:

int(1024)

### Ver también

- [SyncSharedMemory::\_\_construct()](#syncsharedmemory.construct) - Construye un nuevo objeto SyncSharedMemory

- [SyncSharedMemory::write()](#syncsharedmemory.write) - Copia los datos en la memoria compartida nombrada

- [SyncSharedMemory::read()](#syncsharedmemory.read) - Copia de datos de la memoria compartida nombrada

# SyncSharedMemory::write

(PECL sync &gt;= 1.1.0)

SyncSharedMemory::write — Copia los datos en la memoria compartida nombrada

### Descripción

public **SyncSharedMemory::write**([string](#language.types.string) $string = ?, [int](#language.types.integer) $start = 0)

Copia los datos en la memoria compartida nombrada.

### Parámetros

    string


      Los datos a escribir en la memoria compartida.



     **Nota**:



       Si el tamaño de los datos excede el tamaño de la memoria compartida, el número
       de bytes escritos devueltos será inferior a la longitud de la entrada.







    start


      El inicio/desplazamiento, en bytes, para comenzar la escritura.



     **Nota**:



       Si el valor es negativo, la posición de inicio comenzará en el número especificado
       de bytes desde el final del segmento de memoria compartida.





### Valores devueltos

Un integer que contiene el número de bytes escritos en la memoria compartida.

### Ejemplos

**Ejemplo #1 Ejemplo de SyncSharedMemory::write()**

&lt;?php
// Probablemente se deberá proteger la memoria compartida con otros objetos de sincronización.
// La memoria compartida desaparece cuando la última referencia a ella desaparece.
$mem = new SyncSharedMemory("AppReportName", 1024);
if ($mem-&gt;first())
{
// Realizar el trabajo de inicialización la primera vez aquí.
}

$result = $mem-&gt;write("report.txt");
var_dump($result);

$result = $mem-&gt;write("report.txt", -3);
var_dump($result);
?&gt;

Resultado del ejemplo anterior es similar a:

int(10)
int(3)

### Ver también

- [SyncSharedMemory::\_\_construct()](#syncsharedmemory.construct) - Construye un nuevo objeto SyncSharedMemory

- [SyncSharedMemory::first()](#syncsharedmemory.first) - Verifica si el objeto es la primera instancia en todo el sistema de la memoria compartida nombrada

- **SyncSharedMemory::write()**

- [SyncSharedMemory::read()](#syncsharedmemory.read) - Copia de datos de la memoria compartida nombrada

## Tabla de contenidos

- [SyncSharedMemory::\_\_construct](#syncsharedmemory.construct) — Construye un nuevo objeto SyncSharedMemory
- [SyncSharedMemory::first](#syncsharedmemory.first) — Verifica si el objeto es la primera instancia en todo el sistema de la memoria compartida nombrada
- [SyncSharedMemory::read](#syncsharedmemory.read) — Copia de datos de la memoria compartida nombrada
- [SyncSharedMemory::size](#syncsharedmemory.size) — Devuelve el tamaño de la memoria compartida nombrada
- [SyncSharedMemory::write](#syncsharedmemory.write) — Copia los datos en la memoria compartida nombrada

- [Introducción](#intro.sync)
- [Instalación/Configuración](#sync.setup)<li>[Requerimientos](#sync.requirements)
- [Instalación](#sync.installation)
  </li>- [SyncMutex](#class.syncmutex) — La clase SyncMutex<li>[SyncMutex::__construct](#syncmutex.construct) — Construye un nuevo objeto SyncMutex
- [SyncMutex::lock](#syncmutex.lock) — Obtiene un bloqueo exclusivo
- [SyncMutex::unlock](#syncmutex.unlock) — Desbloquea el mutex
  </li>- [SyncSemaphore](#class.syncsemaphore) — La clase SyncSemaphore<li>[SyncSemaphore::__construct](#syncsemaphore.construct) — Construye un nuevo objeto SyncSemaphore
- [SyncSemaphore::lock](#syncsemaphore.lock) — Disminuye el contador del objeto SyncSemaphore o espera
- [SyncSemaphore::unlock](#syncsemaphore.unlock) — Incrementa el contador del objeto SyncSemaphore
  </li>- [SyncEvent](#class.syncevent) — La clase SyncEvent<li>[SyncEvent::__construct](#syncevent.construct) — Construye un nuevo objeto SyncEvent
- [SyncEvent::fire](#syncevent.fire) — Lanza/define el evento
- [SyncEvent::reset](#syncevent.reset) — Reinicializa manualmente un evento
- [SyncEvent::wait](#syncevent.wait) — Espera a que el objeto SyncEvent sea lanzado
  </li>- [SyncReaderWriter](#class.syncreaderwriter) — La clase SyncReaderWriter<li>[SyncReaderWriter::__construct](#syncreaderwriter.construct) — Construye un nuevo objeto SyncReaderWriter
- [SyncReaderWriter::readlock](#syncreaderwriter.readlock) — Obtiene un bloqueo de lectura
- [SyncReaderWriter::readunlock](#syncreaderwriter.readunlock) — Libera un bloqueo de lectura
- [SyncReaderWriter::writelock](#syncreaderwriter.writelock) — Espera un bloqueo de escritura exclusivo
- [SyncReaderWriter::writeunlock](#syncreaderwriter.writeunlock) — Libera un bloqueo de escritura
  </li>- [SyncSharedMemory](#class.syncsharedmemory) — La clase SyncSharedMemory<li>[SyncSharedMemory::__construct](#syncsharedmemory.construct) — Construye un nuevo objeto SyncSharedMemory
- [SyncSharedMemory::first](#syncsharedmemory.first) — Verifica si el objeto es la primera instancia en todo el sistema de la memoria compartida nombrada
- [SyncSharedMemory::read](#syncsharedmemory.read) — Copia de datos de la memoria compartida nombrada
- [SyncSharedMemory::size](#syncsharedmemory.size) — Devuelve el tamaño de la memoria compartida nombrada
- [SyncSharedMemory::write](#syncsharedmemory.write) — Copia los datos en la memoria compartida nombrada
  </li>
