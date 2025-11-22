# Ev

# Introducción

Esta extensión proporciona una interfaz a la biblioteca
[» libev](http://software.schmorp.de/pkg/libev.html), un bucle de eventos
de alto rendimiento, escrito en C.

**Nota**:
Esta extensión no está disponible en las plataformas Windows.

_Libev_ es un bucle de eventos: registra
un interés por ciertos eventos (como un descriptor de fichero
que se vuelve legible, o un tiempo de espera máximo que ocurre),
gestiona las fuentes de estos eventos y proporciona al programa
dichos eventos.

Para lograr esto, toma un control más o menos total
del proceso (o hilo) ejecutando un gestor de bucle
de eventos, luego los comunica mediante un mecanismo de función
de retrollamada.

El registro de intereses por ciertos eventos se realiza mediante
observadores, luego, devuelve el control a libev iniciando estos
observadores.

Para más detalles, consulte la
[» documentación de libev](http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#ev.requirements)
- [Instalación](#ev.installation)

    ## Requerimientos

    La biblioteca libev está incluida en
    esta extensión. No es necesario instalarla por separado.

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/ev](https://pecl.php.net/package/ev).

# Ejemplos

**Ejemplo #1 Ejemplo de temporizadores**

&lt;?php
// Crea e inicia un temporizador que se activa después de 2 segundos
$w1 = new EvTimer(2, 0, function () {
echo "Han pasado 2 segundos\n";
});

// Crea e inicia un temporizador que se activa después de 2 segundos y se repite cada segundo
// hasta que se detenga manualmente
$w2 = new EvTimer(2, 1, function ($w) {
echo "se llama cada segundo y se inicia después de 2 segundos\n";
echo "iteración = ", Ev::iteration(), PHP_EOL;

    // Detiene el watcher después de 5 iteraciones
    Ev::iteration() == 5 and $w-&gt;stop();
    // Detiene el watcher si las próximas llamadas provocan más de 10 iteraciones
    Ev::iteration() &gt;= 10 and $w-&gt;stop();

});

// Crea un temporizador detenido. Permanecerá inactivo hasta que lo iniciemos manualmente
$w_stopped = EvTimer::createStopped(10, 5, function($w) {
echo "Función de retorno de un temporizador creado detenido\n";

    // Detiene el watcher después de 2 iteraciones
    Ev::iteration() &gt;= 2 and $w-&gt;stop();

});

// Bucle mientras Ev::stop() no sea llamado o todos los watchers no estén detenidos
Ev::run();

// Inicia y verifica si funciona
$w_stopped-&gt;start();
echo "Ejecuta una sola iteración\n";
Ev::run(Ev::RUN_ONCE);

echo "Reinicia el segundo watcher e intenta manejar el mismo evento, pero no bloquea\n";
$w2-&gt;again();
Ev::run(Ev::RUN_NOWAIT);

$w = new EvTimer(10, 0, function() {});
echo "Ejecutando un bucle bloqueante\n";
Ev::run();
echo "FIN\n";
?&gt;

Resultado del ejemplo anterior es similar a:

Han pasado 2 segundos
se llama cada segundo y se inicia después de 2 segundos
iteración = 1
se llama cada segundo y se inicia después de 2 segundos
iteración = 2
se llama cada segundo y se inicia después de 2 segundos
iteración = 3
se llama cada segundo y se inicia después de 2 segundos
iteración = 4
se llama cada segundo y se inicia después de 2 segundos
iteración = 5
Ejecuta una sola iteración
Función de retorno de un temporizador creado detenido
Reinicia el segundo watcher e intenta manejar el mismo evento, pero no bloquea
Ejecutando un bucle bloqueante
se llama cada segundo y se inicia después de 2 segundos
iteración = 8
se llama cada segundo y se inicia después de 2 segundos
iteración = 9
se llama cada segundo y se inicia después de 2 segundos
iteración = 10
FIN

**Ejemplo #2 Temporizador periódico. Alerta cada 10.5 segundos**

&lt;?php
$w = new EvPeriodic(0., 10.5, NULL, function ($w, $revents) {
echo time(), PHP_EOL;
});

Ev::run();
?&gt;

**Ejemplo #3 Temporizador periódico. Uso de la función de retorno de reprogramación**

&lt;?php
// Alerta cada 10.5 segundos

function reschedule_cb ($watcher, $now) {
    return $now + (10.5. - fmod($now, 10.5));
}

$w = new EvPeriodic(0., 0., "reschedule_cb", function ($w, $revents) {
echo time(), PHP_EOL;
});

Ev::run();
?&gt;

**Ejemplo #4 Temporizador periódico. Alerta cada 10.5 segundos, comenzando ahora**

&lt;?php
// Alerta cada 10.5 segundos comenzando ahora
$w = new EvPeriodic(fmod(Ev::now(), 10.5), 10.5, NULL, function ($w, $revents) {
echo time(), PHP_EOL;
});

Ev::run();
?&gt;

**Ejemplo #5 Espera a que STDIN sea accesible para lectura**

&lt;?php
// Espera a que STDIN sea accesible para lectura
$w = new EvIo(STDIN, Ev::READ, function ($watcher, $revents) {
echo "STDIN es accesible para lectura\n";
});

Ev::run(Ev::RUN_ONCE);
?&gt;

**Ejemplo #6 Uso de algunas E/S asíncronas para acceder a un socket**

&lt;?php
/_ Usa algunas E/S asíncronas para acceder a un socket _/

// La extensión `sockets' continuará registrando alertas
// para EINPROGRESS, EAGAIN/EWOULDBLOCK etc.
error_reporting(E_ERROR);

$e_nonblocking = array (/_EAGAIN or EWOULDBLOCK_/11, /_EINPROGRESS_/115);

// Obtiene el puerto para el servicio WWW
$service_port = getservbyname('www', 'tcp');

// Obtiene la dirección IP para el host objetivo
$address = gethostbyname('google.co.uk');

// Crea un socket TCP/IP
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === FALSE) {
echo "Fallo en socket_create() : razón : "
.socket_strerror(socket_last_error()) . "\n";
}

// Establece el flag O_NONBLOCK
socket_set_nonblock($socket);

// Se detiene una vez alcanzado el tiempo máximo de espera
$timeout_watcher = new EvTimer(10.0, 0., function () use ($socket) {
socket_close($socket);
Ev::stop(Ev::BREAK_ALL);
});

// Realiza una solicitud HEAD cuando el socket es accesible para escritura
$write_watcher = new EvIo($socket, Ev::WRITE, function ($w)
    use ($socket, $timeout_watcher, $e_nonblocking)
{
// Detiene el watcher timeout
$timeout_watcher-&gt;stop();
// Detiene el watcher write
$w-&gt;stop();

    $in = "HEAD / HTTP/1.1\r\n";
    $in .= "Host: google.co.uk\r\n";
    $in .= "Connection: Close\r\n\r\n";

    if (!socket_write($socket, $in, strlen($in))) {
        trigger_error("Fallo al escribir $in en el socket", E_USER_ERROR);
    }

    $read_watcher = new EvIo($socket, Ev::READ, function ($w, $re)
        use ($socket, $e_nonblocking)
    {
        // El socket es accesible para lectura. recv() recibió 20 bytes usando el modo no bloqueante
        $ret = socket_recv($socket, $out, 20, MSG_DONTWAIT);

        if ($ret) {
            echo $out;
        } elseif ($ret === 0) {
            // Todo ha sido leído
            $w-&gt;stop();
            socket_close($socket);
            return;
        }

        // Se capturan EINPROGRESS, EAGAIN, o EWOULDBLOCK
        if (in_array(socket_last_error(), $e_nonblocking)) {
            return;
        }

        $w-&gt;stop();
        socket_close($socket);
    });

    Ev::run();

});

$result = socket_connect($socket, $address, $service_port);

Ev::run();
?&gt;

Resultado del ejemplo anterior es similar a:

HTTP/1.1 301 Moved Permanently
Location: http://www.google.co.uk/
Content-Type: text/html; charset=UTF-8
Date: Sun, 23 Dec 2012 16:08:27 GMT
Expires: Tue, 22 Jan 2013 16:08:27 GMT
Cache-Control: public, max-age=2592000
Server: gws
Content-Length: 221
X-XSS-Protection: 1; mode=block
X-Frame-Options: SAMEORIGIN
Connection: close

**Ejemplo #7 Encapsula un bucle dentro de otro**

&lt;?php
/\*

- Intenta obtener un bucle de eventos encapsulable y lo encapsula en
- un bucle de eventos por defecto. Si es posible, se usa el bucle
- por defecto. El bucle por defecto se almacena en $loop_hi, mientras que el bucle
- encapsulable se almacena en $loop_lo (que es $loop_hi en el caso de
- que no se pueda usar ningún bucle encapsulable).
-
- Ejemplo traducido a PHP de:
- http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#Examples_CONTENT-9
  \*/
  $loop_hi = EvLoop::defaultLoop();
$loop_lo = NULL;
  $embed = NULL;

/\*

- Verifica si hay posibilidad de obtener uno que funcione
- (un valor de flag a 0 significa autodetección)
  \*/
  $loop_lo = Ev::embeddableBackends() &amp; Ev::recommendedBackends()
  ? new EvLoop(Ev::embeddableBackends() &amp; Ev::recommendedBackends())
  : 0;

if ($loop_lo) {
    $embed = new EvEmbed($loop_lo, function () {});
} else {
$loop_lo = $loop_hi;
}
?&gt;

**Ejemplo #8 Encapsula un bucle creado con el backend kqueue en el bucle por defecto**

&lt;?php
/\*

- Verifica si kqueue está disponible pero no recomendado, y crea un backend kqueue
- para usarlo con sockets (lo cual funciona con todas las implementaciones kqueue).
- Almacena el bucle de eventos kqueue/solo-socket en loop_socket. (También se puede
- usar EVFLAG_NOENV)
-
- Ejemplo tomado de:
- http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#Examples_CONTENT-9
  \*/
  $loop        = EvLoop::defaultLoop();
$socket_loop = NULL;
  $embed = NULL;

if (Ev::supportedBackends() &amp; ~Ev::recommendedBackends() &amp; Ev::BACKEND_KQUEUE) {
if (($socket_loop = new EvLoop(Ev::BACKEND_KQUEUE))) {
        $embed = new EvEmbed($loop);
}
}

if (!$socket_loop) {
$socket_loop = $loop;
}

// Ahora se puede usar $socket_loop para todos los sockets, y $loop para todo lo demás
?&gt;

**Ejemplo #9 Manejo de la señal SIGTERM**

&lt;?php
$w = new EvSignal(SIGTERM, function ($watcher) {
echo "Se recibe un SIGTERM\n";
$watcher-&gt;stop();
});

Ev::run();
?&gt;

**Ejemplo #10 Monitoreo de cambios en /var/log/messages**

&lt;?php
// Uso de un intervalo de actualización de 10 segundos.
$w = new EvStat("/var/log/messages", 8, function ($w) {
echo "Cambio en /var/log/messages\n";

    $attr = $w-&gt;attr();

    if ($attr['nlink']) {
        printf("Tamaño actual: %ld\n", $attr['size']);
        printf("atime actual: %ld\n", $attr['atime']);
        printf("mtime actual: %ld\n", $attr['mtime']);
    } else {
        fprintf(STDERR, "¡El fichero `messages` ya no está aquí!");
        $w-&gt;stop();
    }

});

Ev::run();
?&gt;

**Ejemplo #11 Monitoreo de cambios en /var/log/messages. Se observan cambios con un segundo de retraso**

&lt;?php
$timer = EvTimer::createStopped(0., 1.02, function ($w) {
$w-&gt;stop();

    $stat = $w-&gt;data;

    // 1 segundo después de la última modificación de un fichero
    printf("Tamaño actual: %ld\n", $stat-&gt;attr()['size']);

});

$stat = new EvStat("/var/log/messages", 0., function () use ($timer) {
// Reinicia el watcher timer
$timer-&gt;again();
});

$timer-&gt;data = $stat;

Ev::run();
?&gt;

**Ejemplo #12 Cambio de estado de un proceso**

&lt;?php
$pid = pcntl_fork();

if ($pid == -1) {
    fprintf(STDERR, "pcntl_fork ha fallado\n");
} elseif ($pid) {
$w = new EvChild($pid, FALSE, function ($w, $revents) {
$w-&gt;stop();

        printf("El proceso %d ha salido con estado %d\n", $w-&gt;rpid, $w-&gt;rstatus);
    });

    Ev::run();

    // Protección contra Zombies
    pcntl_wait($status);

} else {
// Se bifurca el hijo
exit(2);
}
?&gt;

# Watchers

Un watcher es un objeto creado para registrar particularidades de un evento.
Por ejemplo, el código siguiente espera que
**[STDIN](#constant.stdin)** se vuelva accesible en lectura:

&lt;?php
// Esperar hasta que STDIN sea legible
$w = new EvIo(STDIN, Ev::READ, function ($watcher, $revents) {
echo "STDIN es accesible en lectura\n";
});
Ev::run(Ev::RUN_ONCE);
?&gt;

Todos los constructores de los watchers inician automáticamente los watchers.
El método createStopped detiene un watcher (i.e.
[EvIo::createStopped()](#evio.createstopped)).

Tenga en cuenta que un watcher se detendrá automáticamente cuando el objeto watcher sea
destruido. Sin embargo, los objetos watchers devueltos por los constructores
o los métodos de fábrica serán conservados.

Tenga en cuenta también que todos los métodos que modifican las propiedades
de un watcher (_set_, priority etc.)
detienen y reinician automáticamente el watcher si está activo, lo que
significa que los eventos pendientes se perderán.

Ver también:
[Las funciones de retrollamada de los Watchers](#ev.watcher-callbacks).

# Las funciones de retrollamada de un Watcher

Todos los watchers pueden estar activos (esperando eventos) o inactivos
(en pausa). Solo los watchers activos pueden tener sus funciones de retrollamada
llamadas. Todas las funciones de retrollamada serán llamadas con al menos dos
argumentos:
watcher - el watcher, y revents,
una máscara de eventos recibidos.

Las funciones de retrollamada de los watchers son pasadas a los constructores de los watchers
(una clase derivada de [EvWatcher](#class.evwatcher) -
[EvCheck::\_\_construct()](#evcheck.construct), [EvChild::\_\_construct()](#evchild.construct)
etc.). Una función de retrollamada de un watcher debe coincidir con el siguiente prototipo:

**callback**(

[object](#language.types.object) $watcher
= NULL
,

[int](#language.types.integer) $revents
= NULL
): [void](language.types.void.html)

     watcher



      La instancia del watcher (de una clase que extiende [EvWatcher](#class.evwatcher)).







     revents



      [Un watcher que recibe los eventos](#ev.constants.watcher-revents).


Cada tipo de watcher tiene un byte asociado en
revents, por lo tanto, se puede utilizar la misma
función de retrollamada para varios watchers. La máscara de eventos
se nombra según el tipo, es decir,
[EvChild](#class.evchild) (o [EvLoop::child()](#evloop.child)) define
**[EV::CHILD](#ev.constants.child)**, [EvPrepare](#class.evprepare) (o
[EvLoop::prepare()](#evloop.prepare)) define **[Ev::PREPARE](#ev.constants.prepare)**,
[EvPeriodic](#class.evperiodic) (o [EvLoop::periodic()](#evloop.periodic))
define **[Ev::PERIODIC](#ev.constants.periodic)** y así sucesivamente, con la excepción de los
eventos de E/S (que pueden definir tanto los bytes
**[Ev::READ](#ev.constants.read)** como **[Ev::WRITE](#ev.constants.write)**).

# Modos de operación periódica de un watcher

El watcher [EvPeriodic](#class.evperiodic) funciona en diferentes
modos según los parámetros offset,
interval y reschedule_cb.

- El modo _Temporizador absoluto_. En este modo,
  interval = 0,
  reschedule_cb = **[null](#constant.null)**.
  La llamada se realizará a la hora del reloj offset
  y no se repetirá. No se ajustará cuando ocurra un salto en el tiempo,
  por lo tanto, si debe ejecutarse el _1 de enero de 2014_,
  se ejecutará cuando la hora del sistema sea alcanzada o superada.

- El modo _Temporizador con repetición por intervalo_.
  En este modo, interval &gt; 0,
  reschedule_cb = **[null](#constant.null)** ; el watcher será programado
  automáticamente para finalizar en la próxima duración
  offset + **[N](#constant.n)** \* interval
  (para un entero **[N](#constant.n)**) y luego se repite, independientemente
  de los saltos en el tiempo.

    Puede utilizarse para crear temporizadores que no derivan respetando
    el reloj del sistema:

&lt;?php
$hourly = EvPeriodic(0, 3600, NULL, function () {
echo "una vez por hora\n";
});
?&gt;

    Esto no significa que siempre habrá 3600 segundos
    entre cada llamada, sino solo que la función de retrollamada será llamada
    cuando el reloj del sistema muestre una hora completa (*UTC*).


    La clase [EvPeriodic](#class.evperiodic) intentará ejecutar la función
    de retrollamada en este modo a la próxima hora posible donde
    time = offset (mod
    interval), independientemente de los saltos en el tiempo.

- El modo _reprogramación manual_. En este modo,
  reschedule_cb es un [callable](#language.types.callable).

    interval y offset
    serán ambos ignorados. En su lugar, cada vez que el watcher periódico
    esté programado, la función de retrollamada de reprogramación (reschedule_cb)
    será llamada con el watcher primero y el tiempo actual como segundo argumento.

    Esta función de retrollamada _no debe_ detener ni destruir
    este watcher periódico, ni otro, y _no debe_
    llamar a funciones o métodos de bucle de eventos. Para detenerlo,
    devuelva 1e30 y deténgalo después. Un watcher
    [EvPrepare](#class.evprepare) puede ser utilizado para realizar esta tarea.

    Debe devolver la próxima hora de llamada, basada en el valor
    del tiempo pasado (el valor de tiempo más pequeño debe ser superior
    o igual al segundo argumento). Será llamada, habitualmente, justo después
    de que la función de retrollamada sea lanzada, pero posiblemente en otros momentos.

    **Ejemplo #1 Utilización de retrollamada de reprogramación**

&lt;?php
// Cada 10.5 segundos

function reschedule_cb ($watcher, $now) {
   return $now + (10.5 - fmod($now, 10.5));
}

$w = new EvPeriodic(0., 0., "reschedule_cb", function ($w, $revents) {
echo time(), PHP_EOL;
});

Ev::run();
?&gt;

# La clase Ev

(PECL ev &gt;= 0.2.0)

## Introducción

    La clase Ev es una clase estática que proporciona acceso al bucle por defecto
    así como a algunas operaciones comunes.

## Sinopsis de la Clase

     ****




      final
      class **Ev**

     {

    /* Constantes */


     const
     [int](#language.types.integer)
      [FLAG_AUTO](#ev.constants.flag-auto) = 0;

    const
     [int](#language.types.integer)
      [FLAG_NOENV](#ev.constants.flag-noenv) = 16777216;

    const
     [int](#language.types.integer)
      [FLAG_FORKCHECK](#ev.constants.flag-forkcheck) = 33554432;

    const
     [int](#language.types.integer)
      [FLAG_NOINOTIFY](#ev.constants.flag-noinotify) = 1048576;

    const
     [int](#language.types.integer)
      [FLAG_SIGNALFD](#ev.constants.flag-signalfd) = 2097152;

    const
     [int](#language.types.integer)
      [FLAG_NOSIGMASK](#ev.constants.flag-nosigmask) = 4194304;

    const
     [int](#language.types.integer)
      [RUN_NOWAIT](#ev.constants.run-nowait) = 1;

    const
     [int](#language.types.integer)
      [RUN_ONCE](#ev.constants.run-once) = 2;

    const
     [int](#language.types.integer)
      [BREAK_CANCEL](#ev.constants.break-cancel) = 0;

    const
     [int](#language.types.integer)
      [BREAK_ONE](#ev.constants.break-one) = 1;

    const
     [int](#language.types.integer)
      [BREAK_ALL](#ev.constants.break-all) = 2;

    const
     [int](#language.types.integer)
      [MINPRI](#ev.constants.minpri) = -2;

    const
     [int](#language.types.integer)
      [MAXPRI](#ev.constants.maxpri) = 2;

    const
     [int](#language.types.integer)
      [READ](#ev.constants.read) = 1;

    const
     [int](#language.types.integer)
      [WRITE](#ev.constants.write) = 2;

    const
     [int](#language.types.integer)
      [TIMER](#ev.constants.timer) = 256;

    const
     [int](#language.types.integer)
      [PERIODIC](#ev.constants.periodic) = 512;

    const
     [int](#language.types.integer)
      [SIGNAL](#ev.constants.signal) = 1024;

    const
     [int](#language.types.integer)
      [CHILD](#ev.constants.child) = 2048;

    const
     [int](#language.types.integer)
      [STAT](#ev.constants.stat) = 4096;

    const
     [int](#language.types.integer)
      [IDLE](#ev.constants.idle) = 8192;

    const
     [int](#language.types.integer)
      [PREPARE](#ev.constants.prepare) = 16384;

    const
     [int](#language.types.integer)
      [CHECK](#ev.constants.check) = 32768;

    const
     [int](#language.types.integer)
      [EMBED](#ev.constants.embed) = 65536;

    const
     [int](#language.types.integer)
      [CUSTOM](#ev.constants.custom) = 16777216;

    const
     [int](#language.types.integer)
      [ERROR](#ev.constants.error) = 2147483648;

    const
     [int](#language.types.integer)
      [BACKEND_SELECT](#ev.constants.backend-select) = 1;

    const
     [int](#language.types.integer)
      [BACKEND_POLL](#ev.constants.backend-poll) = 2;

    const
     [int](#language.types.integer)
      [BACKEND_EPOLL](#ev.constants.backend-epoll) = 4;

    const
     [int](#language.types.integer)
      [BACKEND_KQUEUE](#ev.constants.backend-kqueue) = 8;

    const
     [int](#language.types.integer)
      [BACKEND_DEVPOLL](#ev.constants.backend-devpoll) = 16;

    const
     [int](#language.types.integer)
      [BACKEND_PORT](#ev.constants.backend-port) = 32;

    const
     [int](#language.types.integer)
      [BACKEND_ALL](#ev.constants.backend-all) = 63;

    const
     [int](#language.types.integer)
      [BACKEND_MASK](#ev.constants.backend-mask) = 65535;


    /* Métodos */

final
public
static
[backend](#ev.backend)(): [int](#language.types.integer)
final
public
static
[depth](#ev.depth)(): [int](#language.types.integer)
final
public
static
[embeddableBackends](#ev.embeddablebackends)(): [int](#language.types.integer)
final
public
static
[feedSignal](#ev.feedsignal)(

    [int](#language.types.integer) $signum

): [void](language.types.void.html)
final
public
static
[feedSignalEvent](#ev.feedsignalevent)(

    [int](#language.types.integer) $signum

): [void](language.types.void.html)
final
public
static
[iteration](#ev.iteration)(): [int](#language.types.integer)
final
public
static
[now](#ev.now)(): [float](#language.types.float)
final
public
static
[nowUpdate](#ev.nowupdate)(): [void](language.types.void.html)
final
public
static
[recommendedBackends](#ev.recommendedbackends)(): [int](#language.types.integer)
final
public
static
[resume](#ev.resume)(): [void](language.types.void.html)
final
public
static
[run](#ev.run)(

    [int](#language.types.integer) $flags
    = ?): [void](language.types.void.html)

final
public
static
[sleep](#ev.sleep)(

    [float](#language.types.float) $seconds

): [void](language.types.void.html)
final
public
static
[stop](#ev.stop)(

    [int](#language.types.integer) $how
    = ?): [void](language.types.void.html)

final
public
static
[supportedBackends](#ev.supportedbackends)(): [int](#language.types.integer)
final
public
static
[suspend](#ev.suspend)(): [void](language.types.void.html)
final
public
static
[time](#ev.time)(): [float](#language.types.float)
final
public
static
[verify](#ev.verify)(): [void](language.types.void.html)

}

## Constantes predefinidas

Flags pasados para crear un bucle:

       **[Ev::FLAG_AUTO](#ev.constants.flag-auto)**



        El valor por defecto de los flags.







       **[Ev::FLAG_NOENV](#ev.constants.flag-noenv)**



        Si este flag se utiliza (o si el programa ejecuta
        setuid o setgid), libev
        no va a mirar la variable de entorno
        LIBEV_FLAGS. De lo contrario (comportamiento por defecto),
        LIBEV_FLAGS va a sobrescribir completamente el
        flag si se encuentra. Útil para pruebas de rendimiento
        y para la búsqueda de bugs.







       **[Ev::FLAG_FORKCHECK](#ev.constants.flag-forkcheck)**



        Hace que libev verifique si existe un fork en cada iteración,
        en lugar de llamar manualmente al método
        [EvLoop::fork()](#evloop.fork). Este mecanismo funciona
        llamando a getpid() en cada iteración de
        la bucle, y así, va a ralentizar el bucle de eventos que
        poseen muchas iteraciones, pero habitualmente,
        este ralentizamiento no es notable. La configuración de este flag
        no puede ser sobrescrita o especificada en la variable
        de entorno LIBEV_FLAGS.







       **[Ev::FLAG_NOINOTIFY](#ev.constants.flag-noinotify)**



        Cuando este flag está especificado, libev
        no va a intentar utilizar la API inotify
        para estos watchers
        [» ev_stat](http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#code_ev_stat_code_did_the_file_attri).
        Este flag puede ser útil para conservar los descriptores de
        ficheros inotify, sabiendo que de lo contrario, cada bucle utilizando los
        watchers ev_stat va a consumir un manejador
        inotify.







       **[Ev::FLAG_SIGNALFD](#ev.constants.flag-signalfd)**



        Cuando este flag está especificado, libev
        va a intentar utilizar la API signalfd
        para estos watchers
        [» ev_signal](http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#code_ev_signal_code_signal_me_when_a)
        (y
        [» ev_child](http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#code_ev_child_code_watch_out_for_pro)).
        Esta API entrega las señales de forma asíncrona, lo que
        la hace más rápida, y puede permitir la recuperación de datos
        de señales en espera. También puede simplificar la gestión
        de señales con hilos, sabiendo que las señales son propiedades bloqueadas
        en los hilos. Signalfd
        no será utilizado por defecto.







       **[Ev::FLAG_NOSIGMASK](#ev.constants.flag-nosigmask)**



        Cuando este flag está especificado, libev
        no va a modificar la máscara de señal. Esto significa
        que se debe asegurar que las señales están desbloqueadas
        antes de recibirlas.




        Este comportamiento es útil para la gestión personalizada de señales,
        o la gestión de señales únicamente en hilos específicos.









    Flags a pasar a
    [Ev::run()](#ev.run),
    o a [EvLoop::run()](#evloop.run)






       **[Ev::RUN_NOWAIT](#ev.constants.run-nowait)**



        Significa que el bucle de eventos va a mirar si hay nuevos
        eventos presentes, va a gestionar estos nuevos eventos,
        y todos los eventos especiales, pero no va a esperar y
        bloquear el proceso en el caso de que no haya eventos,
        y va a retornar después de una iteración del bucle. A veces
        es útil poner en cola y gestionar los nuevos eventos
        durante cálculos largos, y esto, para mantener el programa activo.







       **[Ev::RUN_ONCE](#ev.constants.run-once)**



        Significa que el bucle de eventos va a mirar si hay nuevos
        eventos presentes (y esperar, si es necesario), y va a gestionarlos,
        ellos y los especiales. Va a bloquear el proceso hasta que al
        menos un evento llegue (que puede ser un evento interno de libev,
        también, no está garantizado que una función de callback registrada por
        el usuario sea llamada), y va a retornar después de una iteración
        del bucle.









    Flags pasados a
    [Ev::stop()](#ev.stop),
    o a
    [EvLoop::stop()](#evloop.stop)






       **[Ev::BREAK_CANCEL](#ev.constants.break-cancel)**



        Cancela la operación de cancelación.







       **[Ev::BREAK_ONE](#ev.constants.break-one)**



        Retorna la llamada más profunda a
        [Ev::run()](#ev.run)
        (o [EvLoop::run()](#evloop.run)).







       **[Ev::BREAK_ALL](#ev.constants.break-all)**



        Retorna la llamada más cercana a
        [Ev::run()](#ev.run)
        (o [EvLoop::run()](#evloop.run)).









    Prioridades de Watcher:






       **[Ev::MINPRI](#ev.constants.minpri)**



        Prioridad mínima permitida para un watcher.







       **[Ev::MAXPRI](#ev.constants.maxpri)**



        Prioridad máxima permitida para un watcher.









    Máscaras de bytes de eventos (recibidos):






       **[Ev::READ](#ev.constants.read)**



        El descriptor de fichero en el watcher
        [EvIo](#class.evio) se ha vuelto accesible
        en lectura.







       **[Ev::WRITE](#ev.constants.write)**



        El descriptor de fichero en el watcher
        [EvIo](#class.evio) se ha vuelto accesible
        en escritura.







       **[Ev::TIMER](#ev.constants.timer)**



        El watcher [EvTimer](#class.evtimer)
        ha alcanzado su tiempo máximo de espera.







       **[Ev::PERIODIC](#ev.constants.periodic)**



        El watcher [EvPeriodic](#class.evperiodic)
        ha alcanzado su tiempo máximo de espera.







       **[Ev::SIGNAL](#ev.constants.signal)**



        Una señal especificada en
        [EvSignal::__construct()](#evsignal.construct)
        ha sido recibida.







       **[Ev::CHILD](#ev.constants.child)**



        El pid especificado en
        [EvChild::__construct()](#evchild.construct)
        ha recibido una modificación de estado.







       **[Ev::STAT](#ev.constants.stat)**



        La ruta especificada en el watcher
        [EvStat](#class.evstat) ha modificado sus
        atributos.







       **[Ev::IDLE](#ev.constants.idle)**



        El watcher [EvIdle](#class.evidle) funciona cuando
        no tiene ninguna otra tarea que hacer con los otros watchers.







       **[Ev::PREPARE](#ev.constants.prepare)**



        Todos los watchers [EvPrepare](#class.evprepare)
        son llamados justo antes del inicio de
        [Ev::run()](#ev.run). Así, los watchers
        [EvPrepare](#class.evprepare) son los últimos watchers
        en ser llamados antes del reposo del bucle de eventos,
        o la puesta en cola de los nuevos eventos.







       **[Ev::CHECK](#ev.constants.check)**



        Todos los watchers [EvCheck](#class.evcheck)
        son puestos en cola justo después de que
        [Ev::run()](#ev.run) haya recuperado
        los nuevos eventos, pero antes, todas las
        funciones de callback de todos los eventos recibidos
        son puestas en cola. Así, los watchers
        [EvCheck](#class.evcheck) serán llamados antes que cualquier
        otro watcher de misma prioridad o de prioridad más baja
        en una iteración del bucle de eventos.







       **[Ev::EMBED](#ev.constants.embed)**



        El bucle de eventos embebido especificado en el
        watcher [EvEmbed](#class.evembed) necesita
        toda la atención.







       **[Ev::CUSTOM](#ev.constants.custom)**



        Aún no enviado (o utilizado) por
        libev, pero puede ser
        libremente utilizado por los usuarios
        libev para señalar los watchers
        (i.e. vía el método [EvWatcher::feed()](#evwatcher.feed)).







       **[Ev::ERROR](#ev.constants.error)**



        Ha ocurrido un error desconocido, el watcher se ha detenido. Esto puede
        ocurrir porque el watcher no ha podido ser iniciado correctamente
        porque libev ha excedido la memoria asignada, un
        descriptor de fichero ha sido cerrado, u otro problema.
        Libev considera esto como bugs
        de la aplicación. Ver también
        [» la anatomía
        de un watcher](http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#ANATOMY_OF_A_WATCHER_CONTENT)









    Flags de Backend:






       **[Ev::BACKEND_SELECT](#ev.constants.backend-select)**



        select(2) backend







       **[Ev::BACKEND_POLL](#ev.constants.backend-poll)**



        poll(2) backend







       **[Ev::BACKEND_EPOLL](#ev.constants.backend-epoll)**



        Backend epoll(7) específico de Linux
        para, a la vez, los kernels antes y después de 2.6.9.







       **[Ev::BACKEND_KQUEUE](#ev.constants.backend-kqueue)**



        Backend kqueue utilizado en la
        mayoría de los sistemas BSD. El watcher [EvEmbed](#class.evembed)
        puede ser utilizado para embeber un bucle (con el
        backend kqueue) en otro. Actualmente, un bucle puede
        intentar crear un bucle de eventos con el backend
        kqueue y utilizarlo únicamente para los
        sockets.







       **[Ev::BACKEND_DEVPOLL](#ev.constants.backend-devpoll)**



        Backend Solaris 8. Actualmente no implementado.







       **[Ev::BACKEND_PORT](#ev.constants.backend-port)**



        Mecanismo de puerto de eventos Solaris con buen rendimiento.







       **[Ev::BACKEND_ALL](#ev.constants.backend-all)**



        Prueba todos los backends (incluyendo los corruptos).
        No se recomienda utilizarlo explícitamente.
        Los operadores de bits deberían ser aplicados aquí
        (i.e. **[Ev::BACKEND_ALL](#ev.constants.backend-all)** &amp; ~
        **[Ev::BACKEND_KQUEUE](#ev.constants.backend-kqueue)**).
        Utilice el método
        [Ev::recommendedBackends()](#ev.recommendedbackends) o no
        especifique ningún backend.







       **[Ev::BACKEND_MASK](#ev.constants.backend-mask)**



        No es un backend, sino una máscara para seleccionar todos
        los bits de un backend desde el valor de
        flags para representar en una
        máscara cualquier backend (i.e. al modificar
        la variable de entorno LIBEV_FLAGS).






**Nota**:

     Para el bucle por defecto, durante la fase de inicialización
     del módulo, Ev registra llamadas a
     [» ev_loop_fork](http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#FUNCTIONS_CONTROLLING_EVENT_LOOPS_CO)
     vía pthread_atfork (si está disponible).

**Nota**:

     Hay métodos que proporcionan acceso a la
     *bucle de eventos por defecto*
     en la clase **Ev**
     (i.e. [Ev::iteration()](#ev.iteration),
     [Ev::depth()](#ev.depth), etc.) Para los
     *bucles personalizados* (creados con
     [EvLoop::__construct()](#evloop.construct)), estos
     valores pueden ser accesibles vía las propiedades y los
     métodos correspondientes de la clase
     [EvLoop](#class.evloop).




     La instancia del bucle de eventos por defecto puede ser recuperada
     vía el método [EvLoop::defaultLoop()](#evloop.defaultloop).

# Ev::backend

(PECL ev &gt;= 0.2.0)

Ev::backend — Devuelve un integer que describe el backend utilizado por libev

### Descripción

final
public
static
**Ev::backend**(): [int](#language.types.integer)

Devuelve un integer que describe el backend utilizado por _libev_.
Ver los
[flags de Backend](#ev.constants.watcher-backends).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un integer (máscara de bytes) que describe el backend utilizado por
_libev_.

### Ver también

- [EvEmbed](#class.evembed)

- [Ev::embeddableBackends()](#ev.embeddablebackends) - Devuelve el conjunto de backends que pueden ser encapsulados en otros bucles de eventos

- [Ev::recommendedBackends()](#ev.recommendedbackends) - Devuelve una máscara de octetos de backends recomendados
  para la plataforma actual

- [Ev::supportedBackends()](#ev.supportedbackends) - Devuelve el conjunto de backends soportados por la configuración actual de libev

- [Los flags de Backend](#ev.constants.watcher-backends)

# Ev::depth

(PECL ev &gt;= 0.2.0)

Ev::depth — Retorna la profundidad de recursión

### Descripción

final
public
static
**Ev::depth**(): [int](#language.types.integer)

El número de veces que el método [Ev::run()](#ev.run)
ha sido invocado, menos el número de veces que el método
[Ev::run()](#ev.run) ha finalizado normalmente, en otras
palabras, la profundidad de recursión. Fuera de
[Ev::run()](#ev.run), este número vale 0.
En una función de retrollamada, este número vale 1,
mientras que el método [Ev::run()](#ev.run) sea invocado
recursivamente (o desde otro hilo), en cuyo caso, será superior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**ev_depth()** retorna la profundidad de recursión
del bucle por omisión.

### Ver también

- [Ev::iteration()](#ev.iteration) - Devuelve el número de veces que el bucle de eventos por omisión
  ha sido solicitado para un nuevo evento

# Ev::embeddableBackends

(PECL ev &gt;= 0.2.0)

Ev::embeddableBackends — Devuelve el conjunto de backends que pueden ser encapsulados en otros bucles de eventos

### Descripción

final
public
static
**Ev::embeddableBackends**(): [int](#language.types.integer)

Devuelve el conjunto de backends que pueden ser encapsulados en otros bucles de eventos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una máscara de octetos que puede contener los
[flags de backend](#ev.constants.watcher-backends)
combinados con el operador _OR_.

### Ejemplos

**Ejemplo #1 Encapsula un bucle creado con el backend kqueue en el bucle por defecto**

&lt;?php
/\*

- Verifica si kqueue está disponible y crea un backend kqueue
- para usarlo con sockets (que funciona habitualmente con cualquier
- implementación de kqueue).
- Almacena el bucle de eventos kqueue/solo-sockets en loop_socket.
- (uso opcional de EVFLAG_NOENV)
-
- Ejemplo tomado de:
- http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#Examples_CONTENT-9
  \*/
  $loop        = EvLoop::defaultLoop();
$socket_loop = NULL;
  $embed = NULL;

if (Ev::supportedBackends() &amp; ~Ev::recommendedBackends() &amp; Ev::BACKEND_KQUEUE) {
if (($socket_loop = new EvLoop(Ev::BACKEND_KQUEUE))) {
  $embed = new EvEmbed($loop);
}
}

if (!$socket_loop) {
$socket_loop = $loop;
}

// Ahora, se utiliza $socket_loop para todos los sockets, y $loop para todo lo demás
?&gt;

### Ver también

- [EvEmbed](#class.evembed)

- [Ev::recommendedBackends()](#ev.recommendedbackends) - Devuelve una máscara de octetos de backends recomendados
  para la plataforma actual

- [Ev::supportedBackends()](#ev.supportedbackends) - Devuelve el conjunto de backends soportados por la configuración actual de libev

- [Los flags de Backend](#ev.constants.watcher-backends)

- [Los ejemplos](#ev.examples)

# Ev::feedSignal

(PECL ev &gt;= 0.2.0)

Ev::feedSignal — Simula la recepción de una señal

### Descripción

final
public
static
**Ev::feedSignal**(

    [int](#language.types.integer) $signum

): [void](language.types.void.html)

Simula la recepción de una señal. Es seguro llamar a esta función
en cualquier momento, desde cualquier contexto, incluyendo desde
un gestor de señales, o desde un hilo aleatorio. Su principal
utilización es personalizar el gestor de señales en el proceso.

A diferencia del método [Ev::feedSignalEvent()](#ev.feedsignalevent),
este método funciona según la loop que ha registrado la señal.

### Parámetros

     signum



      Número de la señal. Ver la página man de signal(7)
      para más detalles. Se pueden utilizar las constantes exportadas
      por la extensión pcntl.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [Ev::feedSignalEvent()](#ev.feedsignalevent) - Simula un evento de señal en el bucle por omisión

# Ev::feedSignalEvent

(No version information available, might only be in Git)

Ev::feedSignalEvent — Simula un evento de señal en el bucle por omisión

### Descripción

final
public
static
**Ev::feedSignalEvent**(

    [int](#language.types.integer) $signum

): [void](language.types.void.html)

Simula un evento de señal en el bucle por omisión.
Ev reaccionará a esta llamada como si la señal especificada por
el argumento signal hubiera ocurrido.

### Parámetros

     signum



      Número de la señal. Ver la página man de signal(7)
      para más detalles. Ver también las constantes exportadas por
      la extensión pcntl.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [Ev::feedSignal()](#ev.feedsignal) - Simula la recepción de una señal

# Ev::iteration

(PECL ev &gt;= 0.2.0)

Ev::iteration — Devuelve el número de veces que el bucle de eventos por omisión
ha sido solicitado para un nuevo evento

### Descripción

final
public
static
**Ev::iteration**(): [int](#language.types.integer)

Devuelve el número de veces que el bucle de eventos por omisión
ha sido solicitado para un nuevo evento. Puede ser útil como
contador de generación.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de solicitudes del bucle de eventos
por omisión.

### Ver también

- [Ev::depth()](#ev.depth) - Retorna la profundidad de recursión

# Ev::now

(PECL ev &gt;= 0.2.0)

Ev::now — Devuelve el tiempo de inicio de la última iteración del bucle de eventos por omisión

### Descripción

final
public
static
**Ev::now**(): [float](#language.types.float)

Devuelve el tiempo de inicio de la última iteración del bucle de eventos por omisión.
Es el tiempo en el que se basan los temporizadores ([EvTimer](#class.evtimer) y
[EvPeriodic](#class.evperiodic)), y referirse a este es a menudo más rápido que
llamar al método [Ev::time()](#ev.time).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de segundos que representan el tiempo de inicio de la última iteración
del bucle de eventos por omisión.

### Ver también

- [Ev::nowUpdate()](#ev.nowupdate) - Establece el tiempo actual solicitándolo al kernel; actualiza el
  tiempo devuelto por Ev::now durante la ejecución

# Ev::nowUpdate

(PECL ev &gt;= 0.2.0)

Ev::nowUpdate — Establece el tiempo actual solicitándolo al kernel; actualiza el
tiempo devuelto por Ev::now durante la ejecución

### Descripción

final
public
static
**Ev::nowUpdate**(): [void](language.types.void.html)

Establece el tiempo actual solicitándolo al kernel; actualiza el tiempo
devuelto por el método [Ev::now()](#ev.now) durante
la ejecución. Esta es una operación costosa, y se realiza habitualmente
automáticamente en el método [Ev::run()](#ev.run).

Este método es raramente útil, pero cuando las funciones de retrollamada
de evento se ejecutan durante mucho tiempo sin entrar en un bucle de evento,
actualizar _libev_ con el tiempo actual es una buena idea.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [Ev::now()](#ev.now) - Devuelve el tiempo de inicio de la última iteración del bucle de eventos por omisión

# Ev::recommendedBackends

(PECL ev &gt;= 0.2.0)

Ev::recommendedBackends — Devuelve una máscara de octetos de backends recomendados
para la plataforma actual

### Descripción

final
public
static
**Ev::recommendedBackends**(): [int](#language.types.integer)

Devuelve un conjunto de todos los backends compilados en este binario de
libev, y también recomendados para esta
plataforma, lo que significa que deberían funcionar para la
mayoría de los tipos de descriptor de ficheros. Este conjunto es generalmente
más pequeño que el devuelto por la función
**ev_supported_backends()**, sabiendo que, por ejemplo,
kqueue está roto en los sistemas BSD
y no será auto-detectado hasta que no sea requerido explícitamente.
Es el conjunto de backends que libev utilizará
cuando ninguno sea solicitado explícitamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una máscara de octetos que contiene los
[flags de backends](#ev.constants.watcher-backends)
combinados utilizando el operador _OR_.

### Ejemplos

**Ejemplo #1 Encapsula un bucle en otro**

&lt;?php
/\*

- Intenta recuperar un bucle de evento interno, y encapsularlo en
- el bucle de evento por defecto.
- Si es posible, se utiliza el bucle por defecto.
- El bucle por defecto se almacena en $loop_hi, mientras que el bucle interno
- se almacena en $loop_lo (que es $loop_hi en este caso ya que ningún bucle interno
- puede ser utilizado).
-
- Ejemplo de:
- http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#Examples_CONTENT-9
  \*/
  $loop_hi = EvLoop::defaultLoop();
$loop_lo = NULL;
  $embed = NULL;

/\*

- Mira si hay posibilidad de recuperar uno que funcione
- (el valor del flag a 0 significa auto-detección)
  \*/
  $loop_lo = Ev::embeddableBackends() &amp; Ev::recommendedBackends()
  ? new EvLoop(Ev::embeddableBackends() &amp; Ev::recommendedBackends())
  : 0;

if ($loop_lo) {
 $embed = new EvEmbed($loop_lo, function () {});
} else {
$loop_lo = $loop_hi;
}
?&gt;

### Ver también

- [EvEmbed](#class.evembed)

- [Ev::embeddableBackends()](#ev.embeddablebackends) - Devuelve el conjunto de backends que pueden ser encapsulados en otros bucles de eventos

- [Ev::supportedBackends()](#ev.supportedbackends) - Devuelve el conjunto de backends soportados por la configuración actual de libev

- [Los flags de Backend](#ev.constants.watcher-backends)

- [Los ejemplos](#ev.examples)

# Ev::resume

(PECL ev &gt;= 0.2.0)

Ev::resume — Reanuda el bucle de eventos por defecto previamente detenido

### Descripción

final
public
static
**Ev::resume**(): [void](language.types.void.html)

Los métodos [Ev::suspend()](#ev.suspend) y
**Ev::resume()** suspenden y reanudan
un bucle.

Todos los watchers timer serán suspendidos durante el tiempo entre
_la suspensión_ y la _reanudación_
y todos los watchers _periodic_ serán
reprogramados (y perderán todos los eventos que hayan ocurrido
durante el tiempo de esta suspensión).

Tras la llamada al método [Ev::suspend()](#ev.suspend),
no está permitido llamar a una función en el bucle proporcionado
distinto del método **Ev::resume()**.
Además, no está permitido llamar al método
**Ev::resume()** sin una llamada previa al
método [Ev::suspend()](#ev.suspend).

La llamada a una _suspensión_/_reanudación_
tiene como efecto secundario la actualización del tiempo del bucle de eventos
(ver el método [Ev::nowUpdate()](#ev.nowupdate)).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [Ev::suspend()](#ev.suspend) - Suspende el bucle de eventos predeterminado

# Ev::run

(PECL ev &gt;= 0.2.0)

Ev::run — Inicia la verificación de eventos y llama a las funciones de retrollamada para el bucle por defecto

### Descripción

final
public
static
**Ev::run**(

    [int](#language.types.integer) $flags
    = ?): [void](language.types.void.html)

Inicia la verificación de eventos y llama a las funciones de retrollamada
_para el bucle por defecto_. Retorna cuando una función
de retrollamada llama al método [Ev::stop()](#ev.stop), o cuando
los flags son diferentes de cero (en cuyo caso, el valor retornado
será **[true](#constant.true)**), o bien cuando no hay más observadores activos que
referencian el bucle ([EvWatcher::keepalive()](#evwatcher.keepalive) vale
**[true](#constant.true)**), en cuyo caso, el valor retornado será **[false](#constant.false)**. El valor retornado
puede generalmente ser interpretado como: _si **[true](#constant.true)**, aún hay trabajo por hacer_.

### Parámetros

     flags



      El parámetro opcional flags
      puede ser uno de los siguientes valores:



       <caption>**
        Lista de valores posibles de flags
       **</caption>




           flags

          Descripción







           0

          El comportamiento por omisión, descrito arriba




           **[Ev::RUN_ONCE](#ev.constants.run-once)**

          Bloquea al menos un (pone en espera, pero no bucla más)




           **[Ev::RUN_NOWAIT](#ev.constants.run-nowait)**

          No bloquea en absoluto (recupera/gestiona los eventos
           pero no espera)








      Ver las
      [constantes de flags de ejecución](#ev.constants.run-flags).


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [Ev::stop()](#ev.stop) - Detiene el bucle de eventos predeterminado

- [EvLoop::run()](#evloop.run) - Comienza a verificar los eventos y a llamar a las funciones de retrollamada de la bucle

# Ev::sleep

(PECL ev &gt;= 0.2.0)

Ev::sleep — Bloquea el proceso durante un número de segundos proporcionado

### Descripción

final
public
static
**Ev::sleep**(

    [float](#language.types.float) $seconds

): [void](language.types.void.html)

Bloquea el proceso durante un número de segundos proporcionado.

### Parámetros

     seconds



      Número de segundos


### Valores devueltos

No se retorna ningún valor.

# Ev::stop

(PECL ev &gt;= 0.2.0)

Ev::stop — Detiene el bucle de eventos predeterminado

### Descripción

final
public
static
**Ev::stop**(

    [int](#language.types.integer) $how
    = ?): [void](language.types.void.html)

Detiene el bucle de eventos predeterminado.

### Parámetros

     how



      Una [constante](#ev.constants.break-flags)
      entre las constantes *Ev::BREAK_**.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [Ev::run()](#ev.run) - Inicia la verificación de eventos y llama a las funciones de retrollamada para el bucle por defecto

# Ev::supportedBackends

(PECL ev &gt;= 0.2.0)

Ev::supportedBackends — Devuelve el conjunto de backends soportados por la configuración actual de libev

### Descripción

final
public
static
**Ev::supportedBackends**(): [int](#language.types.integer)

Devuelve el conjunto de backends soportados por la configuración actual de libev.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una máscara de bits que puede contener los
[flags de backend](#ev.constants.watcher-backends)
combinados utilizando el operador _OR_.

### Ejemplos

**Ejemplo #1 Bucle integrado creado con el backend kqueue en el bucle por defecto**

&lt;?php
/\*

- Verifica si kqueue está disponible (pero no recomendado) y crea un backend kqueue
- para usarlo con sockets (lo cual funciona con cualquier implementación
- kqueue).
- Almacena el bucle de eventos kqueue (utilizable únicamente a través de sockets)
- en loop_socket. (uso opcional de EVFLAG_NOENV)
-
- Ejemplo tomado de la siguiente URL:
- http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#Examples_CONTENT-9
  \*/
  $loop        = EvLoop::defaultLoop();
$socket_loop = NULL;
  $embed = NULL;

if (Ev::supportedBackends() &amp; ~Ev::recommendedBackends() &amp; Ev::BACKEND_KQUEUE) {
if (($socket_loop = new EvLoop(Ev::BACKEND_KQUEUE))) {
  $embed = new EvEmbed($loop);
}
}

if (!$socket_loop) {
$socket_loop = $loop;
}

// Ahora, uso de $socket_loop para todos los sockets y $loop para todo lo demás
?&gt;

### Ver también

- [EvEmbed](#class.evembed)

- [Ev::recommendedBackends()](#ev.recommendedbackends) - Devuelve una máscara de octetos de backends recomendados
  para la plataforma actual

- [Ev::embeddableBackends()](#ev.embeddablebackends) - Devuelve el conjunto de backends que pueden ser encapsulados en otros bucles de eventos

- [Los flags de backend](#ev.constants.watcher-backends)

- [Los ejemplos](#ev.examples)

# Ev::suspend

(PECL ev &gt;= 0.2.0)

Ev::suspend — Suspende el bucle de eventos predeterminado

### Descripción

final
public
static
**Ev::suspend**(): [void](language.types.void.html)

Los métodos **Ev::suspend()** y
[Ev::resume()](#ev.resume) suspenden y reanudan
el bucle predeterminado.

Todos los temporizadores de los observadores serán suspendidos entre una
_suspensión_ y una _reanudación_,
y todos los observadores _periódicos_
serán actualizados (asimismo, todos los eventos ocurridos durante
esta suspensión se perderán).

Tras una llamada al método **Ev::suspend()**,
no está permitido llamar a una función en el bucle proporcionado
distinta del método [Ev::resume()](#ev.resume). Asimismo,
no está permitido llamar al método [Ev::resume()](#ev.resume)
sin una llamada previa al método **Ev::suspend()**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [Ev::resume()](#ev.resume) - Reanuda el bucle de eventos por defecto previamente detenido

# Ev::time

(PECL ev &gt;= 0.2.0)

Ev::time — Devuelve el tiempo actual desde la época Unix

### Descripción

final
public
static
**Ev::time**(): [float](#language.types.float)

Devuelve el tiempo actual desde la época Unix.
Se recomienda utilizar el método [Ev::now()](#ev.now).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tiempo actual, en número de segundos, desde la época Unix.

### Ver también

- [Ev::now()](#ev.now) - Devuelve el tiempo de inicio de la última iteración del bucle de eventos por omisión

# Ev::verify

(PECL ev &gt;= 0.2.0)

Ev::verify — Efectúa verificaciones internas de consistencia (para la depuración)

### Descripción

final
public
static
**Ev::verify**(): [void](language.types.void.html)

Efectúa verificaciones internas de consistencia (para la depuración de
_libev_) y finaliza el programa si se encuentra una estructura
de datos corrompida.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [Ev::backend](#ev.backend) — Devuelve un integer que describe el backend utilizado por libev
- [Ev::depth](#ev.depth) — Retorna la profundidad de recursión
- [Ev::embeddableBackends](#ev.embeddablebackends) — Devuelve el conjunto de backends que pueden ser encapsulados en otros bucles de eventos
- [Ev::feedSignal](#ev.feedsignal) — Simula la recepción de una señal
- [Ev::feedSignalEvent](#ev.feedsignalevent) — Simula un evento de señal en el bucle por omisión
- [Ev::iteration](#ev.iteration) — Devuelve el número de veces que el bucle de eventos por omisión
  ha sido solicitado para un nuevo evento
- [Ev::now](#ev.now) — Devuelve el tiempo de inicio de la última iteración del bucle de eventos por omisión
- [Ev::nowUpdate](#ev.nowupdate) — Establece el tiempo actual solicitándolo al kernel; actualiza el
  tiempo devuelto por Ev::now durante la ejecución
- [Ev::recommendedBackends](#ev.recommendedbackends) — Devuelve una máscara de octetos de backends recomendados
  para la plataforma actual
- [Ev::resume](#ev.resume) — Reanuda el bucle de eventos por defecto previamente detenido
- [Ev::run](#ev.run) — Inicia la verificación de eventos y llama a las funciones de retrollamada para el bucle por defecto
- [Ev::sleep](#ev.sleep) — Bloquea el proceso durante un número de segundos proporcionado
- [Ev::stop](#ev.stop) — Detiene el bucle de eventos predeterminado
- [Ev::supportedBackends](#ev.supportedbackends) — Devuelve el conjunto de backends soportados por la configuración actual de libev
- [Ev::suspend](#ev.suspend) — Suspende el bucle de eventos predeterminado
- [Ev::time](#ev.time) — Devuelve el tiempo actual desde la época Unix
- [Ev::verify](#ev.verify) — Efectúa verificaciones internas de consistencia (para la depuración)

# La clase EvCheck

(PECL ev &gt;= 0.2.0)

## Introducción

    Los observadores [EvPrepare](#class.evprepare) y
    **EvCheck** se utilizan habitualmente juntos.
    El observador [EvPrepare](#class.evprepare) será llamado antes de
    los bloques del proceso, mientras que el observador **EvCheck**
    será llamado después.




    No está permitido llamar al método [EvLoop::run()](#evloop.run)
    o a un método/función similar que entre en el bucle del evento
    actual desde el observador [EvPrepare](#class.evprepare),
    o desde el observador **EvCheck**. Sin embargo,
    esto es posible para todos los demás bucles que no sean el actual.
    La razón es que no es necesario verificar la recursión
    en estos observadores, es decir, la secuencia siguiente será siempre:
    [EvPrepare](#class.evprepare) -&gt; bloqueo -&gt; **EvCheck**,
    por lo tanto, tener un observador para cada uno no es útil, sabiendo que siempre serán llamados
    juntos al llamar al bloqueo.




    El propósito principal es integrar otros mecanismos de eventos en
    la biblioteca *libev*, con un uso avanzado.
    Pueden ser utilizados, por ejemplo, para monitorear los cambios
    de variables, implementar observadores personalizados, integrar net-snmp
    o una biblioteca adicional, y mucho más. También pueden ser útiles para almacenar en caché datos, y querer mostrarlos después
    del bloqueo.




    Se recomienda proporcionar una prioridad alta a **EvCheck**
    (**[Ev::MAXPRI](#ev.constants.maxpri)**) para asegurarse de que se ejecutará
    antes que cualquier otro observador en la cola (a diferencia de lo que ocurre con
    el observador [EvPrepare](#class.evprepare)).




    Además, los observadores **EvCheck** no deben
    activar/alimentar eventos. Aunque *libev*
    admite esto, pueden ser ejecutados antes de que los otros observadores
    **EvCheck** terminen sus trabajos.

## Sinopsis de la Clase

     ****




      class **EvCheck**


      extends
       [EvWatcher](#class.evwatcher)

     {


    /* Propiedades heredadas */

     public
      [$is_active](#evwatcher.props.is-active);

public
[$data](#evwatcher.props.data);
public
[$is_pending](#evwatcher.props.is-pending);
public
[$priority](#evwatcher.props.priority);

    /* Métodos */

public
[\_\_construct](#evcheck.construct)(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
    = ?,

    [int](#language.types.integer) $priority
    = ?)

    final

public
static
[createStopped](#evcheck.createstopped)(

    [string](#language.types.string) $callback

,

    [string](#language.types.string) $data
    = ?,

    [string](#language.types.string) $priority
    = ?): [object](#language.types.object)

    /* Métodos heredados */
    public

[EvWatcher::clear](#evwatcher.clear)(): [int](#language.types.integer)
public
[EvWatcher::feed](#evwatcher.feed)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::getLoop](#evwatcher.getloop)(): [EvLoop](#class.evloop)
public
[EvWatcher::invoke](#evwatcher.invoke)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::keepalive](#evwatcher.keepalive)(

    [bool](#language.types.boolean) $value
    = ?): [bool](#language.types.boolean)

public
[EvWatcher::setCallback](#evwatcher.setcallback)(

    [callable](#language.types.callable) $callback

): [void](language.types.void.html)
public
[EvWatcher::start](#evwatcher.start)(): [void](language.types.void.html)
public
[EvWatcher::stop](#evwatcher.stop)(): [void](language.types.void.html)

}

# EvCheck::\_\_construct

(PECL ev &gt;= 0.2.0)

EvCheck::\_\_construct — Construye el objeto de observación EvCheck

### Descripción

public
**EvCheck::\_\_construct**(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
    = ?,

    [int](#language.types.integer) $priority
    = ?)

Construye el objeto de observación [EvCheck](#class.evcheck).

### Parámetros

     callback



      Ver las
      [retrollamadas de las observaciones](#ev.watcher-callbacks).







     data



      Datos personalizados asociados con el observador.







     priority



      [Prioridad del observador](#ev.constants.watcher-pri)


### Ver también

- [EvPrepare](#class.evprepare)

- [EvLoop::check()](#evloop.check) - Crea un objeto EvCheck asociado con la instancia del bucle de eventos actual

# EvCheck::createStopped

(PECL ev &gt;= 0.2.0)

EvCheck::createStopped — Crea una instancia de un observador EvCheck detenido

### Descripción

final
public
static
**EvCheck::createStopped**(

    [string](#language.types.string) $callback

,

    [string](#language.types.string) $data
    = ?,

    [string](#language.types.string) $priority
    = ?): [object](#language.types.object)

Crea una instancia de un observador EvCheck detenido.

### Parámetros

     callback



      Ver las
      [retrollamadas de los
       observadores](#ev.watcher-callbacks).







     data



      Datos personalizados para asociar con el observador.







     priority



      [Prioridad del observador](#ev.constants.watcher-pri)


### Valores devueltos

Devuelve el objeto EvCheck en caso de éxito.

### Ver también

- [EvPrepare](#class.evprepare)

## Tabla de contenidos

- [EvCheck::\_\_construct](#evcheck.construct) — Construye el objeto de observación EvCheck
- [EvCheck::createStopped](#evcheck.createstopped) — Crea una instancia de un observador EvCheck detenido

# La clase EvChild

(PECL ev &gt;= 0.2.0)

## Introducción

    Los watchers **EvChild** se activan cuando el
    proceso recibe un **[SIGCHLD](#constant.sigchld)** en respuesta a cambios de estado de los hijos (típicamente, cuando un hijo
    muere o termina). Está permitido instalar un watcher
    **[EvChild](#constant.evchild)** después de que el hijo haya sido forkeado
    (lo que implica que ya debe existir), siempre que el bucle
    de eventos no haya comenzado (o continuado desde un watcher), es decir,
    forkear y luego registrar inmediatamente un watcher para el hijo es
    el método correcto, pero forkear y registrar un watcher después de algunas
    iteraciones del bucle de eventos o en la próxima invocación
    de la función de retrollamada no es el método correcto.




    Solo está permitido registrar watchers
    **EvChild** en el
    *bucle por defecto*.

## Sinopsis de la Clase

     ****




      class **EvChild**


      extends
       [EvWatcher](#class.evwatcher)

     {

    /* Propiedades */

     public
      [$pid](#evchild.props.pid);

    public
      [$rpid](#evchild.props.rpid);

    public
      [$rstatus](#evchild.props.rstatus);

    /* Propiedades heredadas */
    public
      [$is_active](#evwatcher.props.is-active);

public
[$data](#evwatcher.props.data);
public
[$is_pending](#evwatcher.props.is-pending);
public
[$priority](#evwatcher.props.priority);

    /* Métodos */

public
[\_\_construct](#evchild.construct)(

    

    [int](#language.types.integer) $pid

,

    

    [bool](#language.types.boolean) $trace

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

)

    final

public
static
[createStopped](#evchild.createstopped)(

    

    [int](#language.types.integer) $pid

,

    

    [bool](#language.types.boolean) $trace

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
    = ?,

    

    [int](#language.types.integer) $priority
    = ?

): [object](#language.types.object)
public
[set](#evchild.set)(

    [int](#language.types.integer) $pid

,

    [bool](#language.types.boolean) $trace

): [void](language.types.void.html)

    /* Métodos heredados */
    public

[EvWatcher::clear](#evwatcher.clear)(): [int](#language.types.integer)
public
[EvWatcher::feed](#evwatcher.feed)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::getLoop](#evwatcher.getloop)(): [EvLoop](#class.evloop)
public
[EvWatcher::invoke](#evwatcher.invoke)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::keepalive](#evwatcher.keepalive)(

    [bool](#language.types.boolean) $value
    = ?): [bool](#language.types.boolean)

public
[EvWatcher::setCallback](#evwatcher.setcallback)(

    [callable](#language.types.callable) $callback

): [void](language.types.void.html)
public
[EvWatcher::start](#evwatcher.start)(): [void](language.types.void.html)
public
[EvWatcher::stop](#evwatcher.stop)(): [void](language.types.void.html)

}

## Propiedades

      pid



       *Solo lectura*.
       El ID del proceso relacionado
       con los watchers, o 0 que significa todos los IDs
       de proceso.







      rpid



       *Solo lectura*. El ID del proceso que ha detectado
       un cambio de estado.







      rstatus



       *Solo lectura*.
       El estado de salida del proceso
       causado por rpid.





# EvChild::\_\_construct

(PECL ev &gt;= 0.2.0)

EvChild::\_\_construct — Construye el objeto de observación EvChild

### Descripción

public
**EvChild::\_\_construct**(

    

    [int](#language.types.integer) $pid

,

    

    [bool](#language.types.boolean) $trace

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

)

Construye el objeto observador [EvChild](#class.evchild).

Llama a la retrollamada cuando se recibe un cambio de estado de un proceso
cuyo ID pid (o de cualquier _PID_
si vale 0) (un cambio de estado ocurre cuando el proceso
termina o es eliminado, o cuando el parámetro trace
vale **[true](#constant.true)**, cuando el proceso es detenido o continuado). En otras palabras,
cuando el proceso recibe un **[SIGCHLD](#constant.sigchld)**, _Ev_
recuperará todos los estados de salida/espera para todos los hijos
modificados/zombies y llamará a la retrollamada.

Es válido instalar un observador en el hijo después de que un
[EvChild](#class.evchild) haya salido, pero antes de que el bucle
de eventos haya iniciado su siguiente iteración. Por ejemplo,
primero, se llama a fork, luego el nuevo proceso
hijo puede salir, y solo entonces, un observador
[EvChild](#class.evchild) es instalado en el padre para el
nuevo _PID_.

Se podrá acceder a los estados de salida/de traza así como a los
pid utilizando las propiedades
rstatus y rpid del objeto observador.

El número de observadores _PID_ por _PID_
no está limitado. Todos serán llamados.

El método [EvChild::createStopped()](#evchild.createstopped)
no inicia (activa) el nuevo observador creado.

### Parámetros

     pid



      Espera los cambios de estado de los procesos PID (o cualquier proceso
      si PID vale 0).







     trace



      Si vale **[false](#constant.false)**, solo activa el observador cuando el proceso
      termina. De lo contrario (**[true](#constant.true)**), activa el observador cuando el
      proceso es detenido o continuado.







     callback



      Ver las
      [retrollamadas de los observadores](#ev.watcher-callbacks).







     data



      Datos personalizados asociados con el observador.







     priority



      [Retrollamadas del observador](#ev.constants.watcher-pri)


### Ver también

- [EvLoop::child()](#evloop.child) - Crea un objeto EvChild asociado con el bucle de eventos actual

# EvChild::createStopped

(PECL ev &gt;= 0.2.0)

EvChild::createStopped — Crea una instancia del observador detenido EvCheck

### Descripción

final
public
static
**EvChild::createStopped**(

    

    [int](#language.types.integer) $pid

,

    

    [bool](#language.types.boolean) $trace

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
    = ?,

    

    [int](#language.types.integer) $priority
    = ?

): [object](#language.types.object)

Idéntico a [EvChild::\_\_construct()](#evchild.construct),
pero no inicia automáticamente el observador.

### Parámetros

     pid



      Idéntico al utilizado para
      [EvChild::__construct()](#evchild.construct)







     trace



      Idéntico al utilizado para
      [EvChild::__construct()](#evchild.construct)







     callback



      Ver las [funciones
      de retrollamada de los observadores](#ev.watcher-callbacks).







     data



      Datos personalizados asociados con el observador.







     priority



      [Prioridad de
       el observador](#ev.constants.watcher-pri)


### Valores devueltos

### Ver también

- [EvChild::\_\_construct()](#evchild.construct) - Construye el objeto de observación EvChild

- [EvLoop::child()](#evloop.child) - Crea un objeto EvChild asociado con el bucle de eventos actual

# EvChild::set

(PECL ev &gt;= 0.2.0)

EvChild::set — Configura el observador

### Descripción

public
**EvChild::set**(

    [int](#language.types.integer) $pid

,

    [bool](#language.types.boolean) $trace

): [void](language.types.void.html)

### Parámetros

     pid



      Idéntico al utilizado para
      [EvChild::__construct()](#evchild.construct)







     trace



      Idéntico al utilizado para
      [EvChild::__construct()](#evchild.construct)


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EvChild::\_\_construct()](#evchild.construct) - Construye el objeto de observación EvChild

## Tabla de contenidos

- [EvChild::\_\_construct](#evchild.construct) — Construye el objeto de observación EvChild
- [EvChild::createStopped](#evchild.createstopped) — Crea una instancia del observador detenido EvCheck
- [EvChild::set](#evchild.set) — Configura el observador

# La clase EvEmbed

(PECL ev &gt;= 0.2.0)

## Introducción

    Utilizado para integrar un bucle de eventos en otro.

## Sinopsis de la Clase

     ****




      class **EvEmbed**


      extends
       [EvWatcher](#class.evwatcher)

     {

    /* Propiedades */

     public
      [$embed](#evembed.props.embed);

    /* Métodos */

public
[\_\_construct](#evembed.construct)(

    

    [object](#language.types.object) $other

,

    

    [callable](#language.types.callable) $callback
    = ?,

    

    [mixed](#language.types.mixed) $data
    = ?,

    

    [int](#language.types.integer) $priority
    = ?

)

    final

public
static
[createStopped](#evembed.createstopped)(

    

    [object](#language.types.object) $other

,

    

    [callable](#language.types.callable) $callback
    = ?,

    

    [mixed](#language.types.mixed) $data
    = ?,

    

    [int](#language.types.integer) $priority
    = ?

): [void](language.types.void.html)
public
[set](#evembed.set)(

    [object](#language.types.object) $other

): [void](language.types.void.html)
public
[sweep](#evembed.sweep)(): [void](language.types.void.html)

    /* Métodos heredados */
    public

[EvWatcher::clear](#evwatcher.clear)(): [int](#language.types.integer)
public
[EvWatcher::feed](#evwatcher.feed)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::getLoop](#evwatcher.getloop)(): [EvLoop](#class.evloop)
public
[EvWatcher::invoke](#evwatcher.invoke)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::keepalive](#evwatcher.keepalive)(

    [bool](#language.types.boolean) $value
    = ?): [bool](#language.types.boolean)

public
[EvWatcher::setCallback](#evwatcher.setcallback)(

    [callable](#language.types.callable) $callback

): [void](language.types.void.html)
public
[EvWatcher::start](#evwatcher.start)(): [void](language.types.void.html)
public
[EvWatcher::stop](#evwatcher.stop)(): [void](language.types.void.html)

}

## Propiedades

      is_active









      data









      is_pending









      priority









      embed







# EvEmbed::\_\_construct

(PECL ev &gt;= 0.2.0)

EvEmbed::\_\_construct — Construye un objeto EvEmbed

### Descripción

public
**EvEmbed::\_\_construct**(

    

    [object](#language.types.object) $other

,

    

    [callable](#language.types.callable) $callback
    = ?,

    

    [mixed](#language.types.mixed) $data
    = ?,

    

    [int](#language.types.integer) $priority
    = ?

)

Se trata de un tipo de watcher avanzado que permite integrar un bucle
de eventos en otro (actualmente, solo los eventos IO son
soportados en el bucle interno, otros tipos de watcher no deben
ser utilizados).

Ver la
[» 
documentación libev](http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#code_ev_embed_code_when_one_backend_) para más detalles.

Este watcher es más útil en sistemas
_BSD_ donde kqueue no es utilizado,
para poder manejar un gran número de sockets. Ver el ejemplo a continuación.

### Parámetros

     other



      Una instancia de [EvLoop](#class.evloop). El bucle a integrar;
      debe ser encapsulable (ver el método
      [Ev::embeddableBackends()](#ev.embeddablebackends)).







     callback



      Ver las
      [funciones de retrollamada de los Watcher](#ev.watcher-callbacks).







     data



      Datos personalizados para asociar con el watcher.







     priority



      [Prioridad del Watcher](#ev.constants.watcher-pri)


### Ejemplos

**Ejemplo #1
Encapsulamiento de un bucle creado con el gestor kqueue en el bucle por omisión**

&lt;?php
/\*

- Verifica si kqueue está disponible y crea un gestor kqueue
- para usarlo con los sockets (que funciona habitualmente con cualquier implementación
- de kqueue. Almacena el bucle de eventos kqueue/socket solo, en loop_socket.
- (opcionalmente, uso de EVFLAG_NOENV)
-
- Ejemplo tomado de
- http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#Examples_CONTENT-9
  \*/
  $loop        = EvLoop::defaultLoop();
$socket_loop = NULL;
  $embed = NULL;

if (Ev::supportedBackends() &amp; ~Ev::recommendedBackends() &amp; Ev::BACKEND_KQUEUE) {
if (($socket_loop = new EvLoop(Ev::BACKEND_KQUEUE))) {
        $embed = new EvEmbed($loop);
}
}

if (!$socket_loop) {
$socket_loop = $loop;
}

// Ahora, se usa $socket_loop para todos los sockets, y $loop para todo lo demás
?&gt;

### Ver también

- [Ev::embeddableBackends()](#ev.embeddablebackends) - Devuelve el conjunto de backends que pueden ser encapsulados en otros bucles de eventos

# EvEmbed::createStopped

(PECL ev &gt;= 0.2.0)

EvEmbed::createStopped — Crea un objeto EvEmbed watcher detenido

### Descripción

final
public
static
**EvEmbed::createStopped**(

    

    [object](#language.types.object) $other

,

    

    [callable](#language.types.callable) $callback
    = ?,

    

    [mixed](#language.types.mixed) $data
    = ?,

    

    [int](#language.types.integer) $priority
    = ?

): [void](language.types.void.html)

Idéntico al método
[EvEmbed::\_\_construct()](#evembed.construct), pero no inicia
automáticamente el watcher.

### Parámetros

     other



      Idéntico al argumento del método
      [EvEmbed::__construct()](#evembed.construct)







     callback



      Ver las
      [retrollamadas de los Watcher](#ev.watcher-callbacks).







     data



      Datos personalizados para asociar con el watcher.







     priority



      [Prioridad del Watcher](#ev.constants.watcher-pri)


### Valores devueltos

Retorna un objeto EvEmbed detenido en caso de éxito.

### Ver también

- [EvEmbed::\_\_construct()](#evembed.construct) - Construye un objeto EvEmbed

- [Ev::embeddableBackends()](#ev.embeddablebackends) - Devuelve el conjunto de backends que pueden ser encapsulados en otros bucles de eventos

# EvEmbed::set

(PECL ev &gt;= 0.2.0)

EvEmbed::set — Configura el watcher

### Descripción

public
**EvEmbed::set**(

    [object](#language.types.object) $other

): [void](language.types.void.html)

Configura el watcher para utilizar el objeto
other del bucle de eventos.

### Parámetros

     other



      Idéntico al argumento del método
      [EvEmbed::__construct()](#evembed.construct)


### Valores devueltos

No se retorna ningún valor.

# EvEmbed::sweep

(PECL ev &gt;= 0.2.0)

EvEmbed::sweep — Barre, una sola vez y de forma no bloqueante, el bucle interno

### Descripción

public
**EvEmbed::sweep**(): [void](language.types.void.html)

Barre, una sola vez y de forma no bloqueante, el bucle interno.
Funciona de la misma manera que lo siguiente, pero de una forma más
apropiada para los bucles internos:

&lt;?php
$other-&gt;start(Ev::RUN_NOWAIT);
?&gt;

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EvWatcher::start()](#evwatcher.start) - Inicia el Watcher

## Tabla de contenidos

- [EvEmbed::\_\_construct](#evembed.construct) — Construye un objeto EvEmbed
- [EvEmbed::createStopped](#evembed.createstopped) — Crea un objeto EvEmbed watcher detenido
- [EvEmbed::set](#evembed.set) — Configura el watcher
- [EvEmbed::sweep](#evembed.sweep) — Barre, una sola vez y de forma no bloqueante, el bucle interno

# La clase EvFork

(PECL ev &gt;= 0.2.0)

## Introducción

    Los observadores Fork son llamados cuando un
    fork() ha sido detectado (habitualmente, porque
    señalado a *libev* al llamar al método
    [EvLoop::fork()](#evloop.fork)). La invocación se
    realiza antes de que el bucle de eventos bloquee el siguiente
    y antes de la llamada de los observadores [EvCheck](#class.evcheck),
    y solo en el hijo después del fork. Tenga en cuenta que si alguien
    llama a [EvLoop::fork()](#evloop.fork) en el proceso incorrecto, el gestor de fork será llamado también.

## Sinopsis de la Clase

     ****




      class **EvFork**


      extends
       [EvWatcher](#class.evwatcher)

     {


    /* Propiedades heredadas */

     public
      [$is_active](#evwatcher.props.is-active);

public
[$data](#evwatcher.props.data);
public
[$is_pending](#evwatcher.props.is-pending);
public
[$priority](#evwatcher.props.priority);

    /* Métodos */

public
[\_\_construct](#evfork.construct)(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    [int](#language.types.integer) $priority
     = 0

)

    final

public
static
[createStopped](#evfork.createstopped)(

    [string](#language.types.string) $callback

,

    [string](#language.types.string) $data
    = ?,

    [string](#language.types.string) $priority
    = ?): [object](#language.types.object)

    /* Métodos heredados */
    public

[EvWatcher::clear](#evwatcher.clear)(): [int](#language.types.integer)
public
[EvWatcher::feed](#evwatcher.feed)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::getLoop](#evwatcher.getloop)(): [EvLoop](#class.evloop)
public
[EvWatcher::invoke](#evwatcher.invoke)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::keepalive](#evwatcher.keepalive)(

    [bool](#language.types.boolean) $value
    = ?): [bool](#language.types.boolean)

public
[EvWatcher::setCallback](#evwatcher.setcallback)(

    [callable](#language.types.callable) $callback

): [void](language.types.void.html)
public
[EvWatcher::start](#evwatcher.start)(): [void](language.types.void.html)
public
[EvWatcher::stop](#evwatcher.stop)(): [void](language.types.void.html)

}

# EvFork::\_\_construct

(PECL ev &gt;= 0.2.0)

EvFork::\_\_construct — Construye el objeto observador EvFork

### Descripción

public
**EvFork::\_\_construct**(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    [int](#language.types.integer) $priority
     = 0

)

Construye el objeto observador EvFork y arranca el observador automáticamente.

### Parámetros

     callback



      Véase también las
      [funciones de retrollamada para
       los observadores](#ev.watcher-callbacks).







     data



      Datos personalizados asociados al observador.







     priority



      [Prioridad del observador](#ev.constants.watcher-pri)


### Ver también

- [EvLoop::fork()](#evloop.fork) - Crea un objeto EvFork watcher asociado con la instancia del bucle de eventos actual

- [EvCheck](#class.evcheck)

# EvFork::createStopped

(PECL ev &gt;= 0.2.0)

EvFork::createStopped — Crea una instancia detenida de la clase observadora EvFork

### Descripción

final
public
static
**EvFork::createStopped**(

    [string](#language.types.string) $callback

,

    [string](#language.types.string) $data
    = ?,

    [string](#language.types.string) $priority
    = ?): [object](#language.types.object)

Idéntico al método
[EvFork::\_\_construct()](#evfork.construct) pero
no inicia automáticamente el observador.

### Parámetros

     callback



      Ver las
      [retrollamadas de observadores](#ev.watcher-callbacks).







     data



      Datos personalizados asociados con el observador.







     priority



      [Prioridad de observador](#ev.constants.watcher-pri)


### Valores devueltos

Devuelve un objeto EvFork (detenido) en caso de éxito.

### Ver también

- [EvFork::\_\_construct()](#evfork.construct) - Construye el objeto observador EvFork

## Tabla de contenidos

- [EvFork::\_\_construct](#evfork.construct) — Construye el objeto observador EvFork
- [EvFork::createStopped](#evfork.createstopped) — Crea una instancia detenida de la clase observadora EvFork

# La clase EvIdle

(PECL ev &gt;= 0.2.0)

## Introducción

    Los observadores **EvIdle** lanzan los eventos
    cuando ningún otro evento con la misma (o superior) prioridad
    está pendiente ([EvPrepare](#class.evprepare), [EvCheck](#class.evcheck)
    y otros observadores **EvIdle** no cuentan
    como *eventos*).




    Asimismo, mientras el proceso está gestionando sockets o
    tiempos de espera máximos (o incluso señales) de la misma prioridad (o
    de prioridad superior), no se lanzará. Pero cuando el proceso
    está inactivo (o solo hay observadores con prioridad baja pendientes), los observadores **EvIdle** serán llamados
    una vez por iteración del bucle de eventos - y esto, mientras
    no se detengan, o el proceso no reciba más eventos
    y se ocupe así de gestionar trabajos con prioridad superior.




    Además de mantener el proceso no bloqueante (lo cual es útil a veces),
    los observadores **EvIdle** son un buen lugar
    para realizar *"trabajos en pseudo-segundo plano"*,
    o reprogramar trabajos después de que el bucle de eventos haya gestionado
    los eventos excepcionales.




    El efecto más notable es que, mientras los observadores
    *idle* estén activos, el proceso
    *no* se bloqueará al esperar nuevos
    eventos.

## Sinopsis de la Clase

     ****




      class **EvIdle**


      extends
       [EvWatcher](#class.evwatcher)

     {


    /* Propiedades heredadas */

     public
      [$is_active](#evwatcher.props.is-active);

public
[$data](#evwatcher.props.data);
public
[$is_pending](#evwatcher.props.is-pending);
public
[$priority](#evwatcher.props.priority);

    /* Métodos */

public
[\_\_construct](#evidle.construct)(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
    = ?,

    [int](#language.types.integer) $priority
    = ?)

    final

public
static
[createStopped](#evidle.createstopped)(

    [string](#language.types.string) $callback

,

    [mixed](#language.types.mixed) $data
    = ?,

    [int](#language.types.integer) $priority
    = ?): [object](#language.types.object)

    /* Métodos heredados */
    public

[EvWatcher::clear](#evwatcher.clear)(): [int](#language.types.integer)
public
[EvWatcher::feed](#evwatcher.feed)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::getLoop](#evwatcher.getloop)(): [EvLoop](#class.evloop)
public
[EvWatcher::invoke](#evwatcher.invoke)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::keepalive](#evwatcher.keepalive)(

    [bool](#language.types.boolean) $value
    = ?): [bool](#language.types.boolean)

public
[EvWatcher::setCallback](#evwatcher.setcallback)(

    [callable](#language.types.callable) $callback

): [void](language.types.void.html)
public
[EvWatcher::start](#evwatcher.start)(): [void](language.types.void.html)
public
[EvWatcher::stop](#evwatcher.stop)(): [void](language.types.void.html)

}

# EvIdle::\_\_construct

(PECL ev &gt;= 0.2.0)

EvIdle::\_\_construct — Construye el objeto observador EvIdle

### Descripción

public
**EvIdle::\_\_construct**(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
    = ?,

    [int](#language.types.integer) $priority
    = ?)

Construye el objeto observador EvIdle e inicia automáticamente
el observador.

### Parámetros

     callback



      Ver las
      [funciones de retrollamada de los
      observadores](#ev.watcher-callbacks).







     data



      Datos personalizados asociados con el observador.







     priority



      [Prioridad del observador](#ev.constants.watcher-pri)


### Ver también

- [EvIdle::createStopped()](#evidle.createstopped) - Crea una instancia de un objeto observador EvIdle

- [EvLoop::idle()](#evloop.idle) - Crea un objeto EvIdle watcher asociado con la instancia del bucle
  de eventos actual

# EvIdle::createStopped

(PECL ev &gt;= 0.2.0)

EvIdle::createStopped — Crea una instancia de un objeto observador EvIdle

### Descripción

final
public
static
**EvIdle::createStopped**(

    [string](#language.types.string) $callback

,

    [mixed](#language.types.mixed) $data
    = ?,

    [int](#language.types.integer) $priority
    = ?): [object](#language.types.object)

Idéntico al método [EvIdle::\_\_construct()](#evidle.construct)
pero no inicia automáticamente el observador.

### Parámetros

     callback



      Ver las
      [retrollamadas de los
       observadores](#ev.watcher-callbacks).







     data



      Datos personalizados con el observador.







     priority



      [Prioridad del observador](#ev.constants.watcher-pri)


### Valores devueltos

Devuelve un objeto EvIdle en caso de éxito.

### Ver también

- [EvIdle::\_\_construct()](#evidle.construct) - Construye el objeto observador EvIdle

- [EvLoop::idle()](#evloop.idle) - Crea un objeto EvIdle watcher asociado con la instancia del bucle
  de eventos actual

## Tabla de contenidos

- [EvIdle::\_\_construct](#evidle.construct) — Construye el objeto observador EvIdle
- [EvIdle::createStopped](#evidle.createstopped) — Crea una instancia de un objeto observador EvIdle

# La clase EvIo

(PECL ev &gt;= 0.2.0)

## Introducción

    Los observadores **EvIo** verifican si un descriptor
    de fichero (o un socket, o un flujo que pueda ser convertido en descriptor
    de fichero numérico) está disponible para lectura o escritura en cada
    iteración del bucle de eventos, o, más precisamente, cuando la
    lectura no va a bloquear el proceso, y cuando la escritura va
    a permitir escribir datos. Este comportamiento se denomina
    *nivel de activación* porque los eventos se
    mantienen mientras persista la condición. Para detener la recepción
    de eventos, simplemente se debe detener el observador.




    El número de eventos de lectura/escritura de los observadores por
    fd es ilimitado. Establecer todos los
    descriptores de ficheros en modo no bloqueante es generalmente
    una buena idea (aunque no es obligatorio).




    Otra cosa a tener en cuenta es que es muy fácil recibir
    notificaciones falsas de sistema listo para lectura, es decir, la función
    de retrollamada puede ser llamada con **[Ev::READ](#ev.constants.read)**
    pero una subsiguiente *read()* puede bloquearse
    debido a que no hay datos. Es muy simple
    encontrarse en esta situación. Por lo tanto, se recomienda siempre
    utilizar I/O no bloqueante: una *read()*
    adicional que devuelva **[EAGAIN](#constant.eagain)** (o similar)
    es preferible a un programa que espera la llegada de datos.




    Si por alguna razón no es posible ejecutar el
    fd en modo no bloqueante, entonces, por separado,
    se debe volver a verificar si el descriptor de fichero está realmente listo.
    Algunos usuarios utilizan además **[SIGALRM](#constant.sigalrm)**
    y un temporizador de intervalo, solo para asegurarse de que no haya
    bloqueos infinitos.




    Se recomienda siempre utilizar el modo no bloqueante.

## Sinopsis de la Clase

     ****




      class **EvIo**


      extends
       [EvWatcher](#class.evwatcher)

     {

    /* Propiedades */

     public
      [$fd](#evio.props.fd);

    public
      [$events](#evio.props.events);

    /* Propiedades heredadas */
    public
      [$is_active](#evwatcher.props.is-active);

public
[$data](#evwatcher.props.data);
public
[$is_pending](#evwatcher.props.is-pending);
public
[$priority](#evwatcher.props.priority);

    /* Métodos */

public
[\_\_construct](#evio.construct)(

    

    [mixed](#language.types.mixed) $fd

,

    

    [int](#language.types.integer) $events

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
    = ?,

    

    [int](#language.types.integer) $priority
    = ?

)

    final

public
static
[createStopped](#evio.createstopped)(

    

    [mixed](#language.types.mixed) $fd

,

    

    [int](#language.types.integer) $events

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvIo](#class.evio)
public
[set](#evio.set)(

    [mixed](#language.types.mixed) $fd

,

    [int](#language.types.integer) $events

): [void](language.types.void.html)

    /* Métodos heredados */
    public

[EvWatcher::clear](#evwatcher.clear)(): [int](#language.types.integer)
public
[EvWatcher::feed](#evwatcher.feed)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::getLoop](#evwatcher.getloop)(): [EvLoop](#class.evloop)
public
[EvWatcher::invoke](#evwatcher.invoke)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::keepalive](#evwatcher.keepalive)(

    [bool](#language.types.boolean) $value
    = ?): [bool](#language.types.boolean)

public
[EvWatcher::setCallback](#evwatcher.setcallback)(

    [callable](#language.types.callable) $callback

): [void](language.types.void.html)
public
[EvWatcher::start](#evwatcher.start)(): [void](language.types.void.html)
public
[EvWatcher::stop](#evwatcher.stop)(): [void](language.types.void.html)

}

## Propiedades

      fd









      events







# EvIo::\_\_construct

(PECL ev &gt;= 0.2.0)

EvIo::\_\_construct — Construye un nuevo objeto EvIo

### Descripción

public
**EvIo::\_\_construct**(

    

    [mixed](#language.types.mixed) $fd

,

    

    [int](#language.types.integer) $events

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
    = ?,

    

    [int](#language.types.integer) $priority
    = ?

)

Construye un nuevo objeto EvIo y arranca el observador automáticamente.

### Parámetros

     fd



      Puede ser un flujo abierto con la función
      [fopen()](#function.fopen) o cualquier función similar,
      descriptores de ficheros o sockets.







     events



      **[Ev::READ](#ev.constants.read)** y/o **[Ev::WRITE](#ev.constants.write)**.
      Ver las
      [máscaras de octetos](#ev.constants.watcher-revents).







     callback



      Ver las
      [funciones de retrollamada de los observadores](#ev.watcher-callbacks).







     data



      Datos personalizados asociados con el observador.







     priority



      [Prioridad del observador](#ev.constants.watcher-pri)


### Ver también

- [EvIo::createStopped()](#evio.createstopped) - Crea un objeto observador EvIo detenido

- [EvLoop::io()](#evloop.io) - Crea un objeto EvIo watcher asociado con la instancia del bucle de eventos actual

# EvIo::createStopped

(PECL ev &gt;= 0.2.0)

EvIo::createStopped — Crea un objeto observador EvIo detenido

### Descripción

final
public
static
**EvIo::createStopped**(

    

    [mixed](#language.types.mixed) $fd

,

    

    [int](#language.types.integer) $events

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvIo](#class.evio)

Idéntico al método
[EvIo::\_\_construct()](#evio.construct) pero
no inicia automáticamente el observador.

### Parámetros

     fd



      Idéntico al método
      [EvIo::__construct()](#evio.construct)







     events



      Idéntico al método
      [EvIo::__construct()](#evio.construct)







     callback



      Ver las
      [funciones de retrollamada de los observadores](#ev.watcher-callbacks).







     data



      Datos personalizados asociados con el observador.







     priority



      [Prioridad del observador](#ev.constants.watcher-pri)


### Valores devueltos

Devuelve un objeto EvIo en caso de éxito.

### Ver también

- [EvIo::\_\_construct()](#evio.construct) - Construye un nuevo objeto EvIo

- [EvLoop::io()](#evloop.io) - Crea un objeto EvIo watcher asociado con la instancia del bucle de eventos actual

# EvIo::set

(PECL ev &gt;= 0.2.0)

EvIo::set — Configura el observador

### Descripción

public
**EvIo::set**(

    [mixed](#language.types.mixed) $fd

,

    [int](#language.types.integer) $events

): [void](language.types.void.html)

Configura el observador EvIo.

### Parámetros

     fd



      Idéntico al método
      [EvIo::__construct()](#evio.construct)







     events



      Idéntico al método
      [EvIo::__construct()](#evio.construct)


### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [EvIo::\_\_construct](#evio.construct) — Construye un nuevo objeto EvIo
- [EvIo::createStopped](#evio.createstopped) — Crea un objeto observador EvIo detenido
- [EvIo::set](#evio.set) — Configura el observador

# La clase EvLoop

(PECL ev &gt;= 0.2.0)

## Introducción

    Representa un bucle de eventos que siempre es distinto del
    *bucle por defecto*. A diferencia del
    *bucle por defecto*, no puede gestionar los
    watchers [EvChild](#class.evchild).




    Al utilizar hilos, se debe crear un bucle por hilo,
    y utilizar el *bucle por defecto* en el hilo
    padre.




    El *bucle de eventos por defecto* es inicializado
    automáticamente por *Ev*. Es accesible a través de los
    métodos de la clase [Ev](#class.ev) o mediante el método
    [EvLoop::defaultLoop()](#evloop.defaultloop).

## Sinopsis de la Clase

     ****




      final
      class **EvLoop**

     {

    /* Propiedades */

     public
      [$data](#evloop.props.data);

    public
      [$backend](#evloop.props.backend);

    public
      [$is_default_loop](#evloop.props.is-default-loop);

    public
      [$iteration](#evloop.props.iteration);

    public
      [$pending](#evloop.props.pending);

    public
      [$io_interval](#evloop.props.io-interval);

    public
      [$timeout_interval](#evloop.props.timeout-interval);

    public
      [$depth](#evloop.props.depth);

    /* Métodos */

public
[\_\_construct](#evloop.construct)(

    

    [int](#language.types.integer) $flags
    = ?,

    

    [mixed](#language.types.mixed) $data
     = NULL

,

    

    [float](#language.types.float) $io_interval
     = 0.0

,

    

    [float](#language.types.float) $timeout_interval
     = 0.0

)

    public

[backend](#evloop.backend)(): [int](#language.types.integer)
final
public
[check](#evloop.check)(

    [string](#language.types.string) $callback

,

    [string](#language.types.string) $data
    = ?,

    [string](#language.types.string) $priority
    = ?): [EvCheck](#class.evcheck)

final
public
[child](#evloop.child)(

    

    [string](#language.types.string) $pid

,

    

    [string](#language.types.string) $trace

,

    

    [string](#language.types.string) $callback

,

    

    [string](#language.types.string) $data
    = ?,

    

    [string](#language.types.string) $priority
    = ?

): [EvChild](#class.evchild)
public
static
[defaultLoop](#evloop.defaultloop)(

    

    [int](#language.types.integer) $flags
     = Ev::FLAG_AUTO

,

    

    [mixed](#language.types.mixed) $data
     = NULL

,

    

    [float](#language.types.float) $io_interval
     = 0.

,

    

    [float](#language.types.float) $timeout_interval
     = 0.

): [EvLoop](#class.evloop)
final
public
[embed](#evloop.embed)(

    

    [string](#language.types.string) $other

,

    

    [string](#language.types.string) $callback
    = ?,

    

    [string](#language.types.string) $data
    = ?,

    

    [string](#language.types.string) $priority
    = ?

): [EvEmbed](#class.evembed)
final
public
[fork](#evloop.fork)(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    [int](#language.types.integer) $priority
     = 0

): [EvFork](#class.evfork)
final
public
[idle](#evloop.idle)(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    [int](#language.types.integer) $priority
     = 0

): [EvIdle](#class.evidle)
public
[invokePending](#evloop.invokepending)(): [void](language.types.void.html)
final
public
[io](#evloop.io)(

    

    [mixed](#language.types.mixed) $fd

,

    

    [int](#language.types.integer) $events

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvIo](#class.evio)
public
[loopFork](#evloop.loopfork)(): [void](language.types.void.html)
public
[now](#evloop.now)(): [float](#language.types.float)
public
[nowUpdate](#evloop.nowupdate)(): [void](language.types.void.html)
final
public
[periodic](#evloop.periodic)(

    

    [float](#language.types.float) $offset

,

    

    [float](#language.types.float) $interval

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvPeriodic](#class.evperiodic)
final
public
[prepare](#evloop.prepare)(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    [int](#language.types.integer) $priority
     = 0

): [EvPrepare](#class.evprepare)
public
[resume](#evloop.resume)(): [void](language.types.void.html)
public
[run](#evloop.run)(

    [int](#language.types.integer) $flags
     = 0

): [void](language.types.void.html)
final
public
[signal](#evloop.signal)(

    

    [int](#language.types.integer) $signum

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvSignal](#class.evsignal)
final
public
[stat](#evloop.stat)(

    

    [string](#language.types.string) $path

,

    

    [float](#language.types.float) $interval

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvStat](#class.evstat)
public
[stop](#evloop.stop)(

    [int](#language.types.integer) $how
    = ?): [void](language.types.void.html)

public
[suspend](#evloop.suspend)(): [void](language.types.void.html)
final
public
[timer](#evloop.timer)(

    

    [float](#language.types.float) $after

,

    

    [float](#language.types.float) $repeat

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvTimer](#class.evtimer)
public
[verify](#evloop.verify)(): [void](language.types.void.html)

}

## Propiedades

      data



       Datos personalizados para adjuntar al bucle







      backend



       *Solo lectura*.
       Los
       [flags del backend](#ev.constants.watcher-backends)
       que indican el backend de eventos en uso.







      is_default_loop



       *Solo lectura*.
       **[true](#constant.true)** si es el bucle de eventos por defecto.







      iteration



       El contador de iteración actual del bucle. Ver el método
       [Ev::iteration()](#ev.iteration).







      pending



       El número de watchers pendientes.
       0 indica que no hay watchers pendientes.







      io_interval



       Un valor alto para io_interval permite a
       *libev* pasar más tiempo recolectando
       los eventos [EvIo](#class.evio), así, más eventos
       pueden ser gestionados por iteración, pero esto aumentará la
       latencia. Los tiempos de espera máximos (tanto para
       [EvPeriodic](#class.evperiodic) como para [EvTimer](#class.evtimer))
       no se verán afectados. Establecer esta opción a un valor
       distinto de cero introducirá una llamada adicional a sleep()
       en la mayoría de las iteraciones del bucle.
       El tiempo de pausa asegura que *libev*
       no consultará [EvIo](#class.evio) más de una vez
       durante este intervalo, en promedio. La mayoría de los programas
       pueden beneficiarse estableciendo
       io_interval a un valor cercano a
       0.1, lo cual es generalmente suficiente para los
       servidores interactivos (y no destinados a juegos). Generalmente
       no tiene sentido establecer este valor a menos de
       0.01, ya que se acerca a la
       granularidad a nivel de tiempos de la mayoría de los sistemas.




       Ver también las
       [» 
       funciones que controlan los bucles de eventos](http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#FUNCTIONS_CONTROLLING_EVENT_LOOPS).







      timeout_interval



       Un valor alto para timeout_interval permite a
       *libev* pasar más tiempo recolectando los
       tiempos de espera máximos, pero como consecuencia aumenta
       la latencia, el estrés y la inexactitud (la función de retrollamada
       del watcher será llamada más tarde). Los watchers [EvIo](#class.evio)
       no se verán afectados. Establecer este valor a un valor no
       nulo no introducirá ninguna sobrecarga adicional a
       *libev*. Ver también las
       [» 
       funciones que controlan los bucles de eventos](http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#FUNCTIONS_CONTROLLING_EVENT_LOOPS).







      depth



       La profundidad de la recursión. Ver el método
       [Ev::depth()](#ev.depth).





# EvLoop::backend

(PECL ev &gt;= 0.2.0)

EvLoop::backend — Retorna un integer que describe el backend utilizado por libev

### Descripción

public
**EvLoop::backend**(): [int](#language.types.integer)

Idéntico al método [Ev::backend()](#ev.backend),
pero para la instancia del ciclo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna un integer que describe el backend utilizado por libev.
Ver el método [Ev::backend()](#ev.backend).

### Ver también

- [Ev::backend()](#ev.backend) - Devuelve un integer que describe el backend utilizado por libev

# EvLoop::check

(PECL ev &gt;= 0.2.0)

EvLoop::check — Crea un objeto EvCheck asociado con la instancia del bucle de eventos actual

### Descripción

final
public
**EvLoop::check**(

    [string](#language.types.string) $callback

,

    [string](#language.types.string) $data
    = ?,

    [string](#language.types.string) $priority
    = ?): [EvCheck](#class.evcheck)

Crea un objeto EvCheck asociado con la instancia del bucle de eventos actual.

### Parámetros

Todos los argumentos tienen el mismo significado que para el método
[EvCheck::\_\_construct()](#evcheck.construct).

### Valores devueltos

Devuelve un objeto EvCheck en caso de éxito.

### Ver también

- [EvCheck::\_\_construct()](#evcheck.construct) - Construye el objeto de observación EvCheck

# EvLoop::child

(PECL ev &gt;= 0.2.0)

EvLoop::child — Crea un objeto EvChild asociado con el bucle de eventos actual

### Descripción

final
public
**EvLoop::child**(

    

    [string](#language.types.string) $pid

,

    

    [string](#language.types.string) $trace

,

    

    [string](#language.types.string) $callback

,

    

    [string](#language.types.string) $data
    = ?,

    

    [string](#language.types.string) $priority
    = ?

): [EvChild](#class.evchild)

Crea un objeto EvChild asociado con el bucle de eventos actual.

### Parámetros

Todos los argumentos tienen el mismo significado que para el método
[EvChild::\_\_construct()](#evchild.construct).

### Valores devueltos

Devuelve un objeto EvChild en caso de éxito.

### Ver también

- [EvChild::\_\_construct()](#evchild.construct) - Construye el objeto de observación EvChild

# EvLoop::\_\_construct

(PECL ev &gt;= 0.2.0)

EvLoop::\_\_construct — Construye un objeto de bucle de eventos

### Descripción

public
**EvLoop::\_\_construct**(

    

    [int](#language.types.integer) $flags
    = ?,

    

    [mixed](#language.types.mixed) $data
     = NULL

,

    

    [float](#language.types.float) $io_interval
     = 0.0

,

    

    [float](#language.types.float) $timeout_interval
     = 0.0

)

Construye el objeto de bucle de eventos.

### Parámetros

     flags



      Uno de los
      [flags de bucle
       de eventos](#ev.constants.loop-flags)







     data



      Datos personalizados para asociar con el bucle.







     io_interval



      Ver la función
      [io_interval](#evloop.props.io-interval)







     timeout_interval



      Ver la función
      [timeout_interval](#evloop.props.timeout-interval)


### Ver también

- [EvLoop::defaultLoop()](#evloop.defaultloop) - Devuelve o crea el bucle de eventos por omisión

# EvLoop::defaultLoop

(PECL ev &gt;= 0.2.0)

EvLoop::defaultLoop — Devuelve o crea el bucle de eventos por omisión

### Descripción

public
static
**EvLoop::defaultLoop**(

    

    [int](#language.types.integer) $flags
     = Ev::FLAG_AUTO

,

    

    [mixed](#language.types.mixed) $data
     = NULL

,

    

    [float](#language.types.float) $io_interval
     = 0.

,

    

    [float](#language.types.float) $timeout_interval
     = 0.

): [EvLoop](#class.evloop)

Si el bucle de eventos por omisión no está creado, el método
**EvLoop::defaultLoop()** lo crea con los parámetros
especificados. De lo contrario, devolverá la instancia del objeto correspondiente
previamente creado ignorando todos los parámetros.

### Parámetros

     flags



      Uno de los
      [flags de bucle de eventos](#ev.constants.loop-flags)







     data



      Datos personalizados para asociar con el bucle.







     io_collect_interval



      Ver la función
      [io_interval](#evloop.props.io-interval)







     timeout_collect_interval



      Ver la función
      [timeout_interval](#evloop.props.timeout-interval)


### Valores devueltos

Devuelve el objeto EvLoop en caso de éxito.

### Ver también

- [EvLoop::\_\_construct()](#evloop.construct) - Construye un objeto de bucle de eventos

# EvLoop::embed

(PECL ev &gt;= 0.2.0)

EvLoop::embed — Crea una instancia del observador EvEmbed asociado con el objeto EvLoop actual

### Descripción

final
public
**EvLoop::embed**(

    

    [string](#language.types.string) $other

,

    

    [string](#language.types.string) $callback
    = ?,

    

    [string](#language.types.string) $data
    = ?,

    

    [string](#language.types.string) $priority
    = ?

): [EvEmbed](#class.evembed)

Crea una instancia del observador
[EvEmbed](#class.evembed) asociado con el objeto
[EvLoop](#class.evloop) actual.

### Parámetros

Todos los argumentos tienen el mismo significado que para el método
[EvEmbed::\_\_construct()](#evembed.construct).

### Valores devueltos

Devuelve el objeto EvEmbed en caso de éxito.

### Ver también

- [EvEmbed::\_\_construct()](#evembed.construct) - Construye un objeto EvEmbed

# EvLoop::fork

(PECL ev &gt;= 0.2.0)

EvLoop::fork — Crea un objeto EvFork watcher asociado con la instancia del bucle de eventos actual

### Descripción

final
public
**EvLoop::fork**(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    [int](#language.types.integer) $priority
     = 0

): [EvFork](#class.evfork)

Crea un objeto EvFork watcher asociado con la instancia del bucle de eventos actual

### Parámetros

Todos los parámetros tienen el mismo significado que los de la función
[EvFork::\_\_construct()](#evfork.construct).

### Valores devueltos

Devuelve el objeto EvFork en caso de éxito.

### Ver también

- [EvFork::\_\_construct()](#evfork.construct) - Construye el objeto observador EvFork

# EvLoop::idle

(PECL ev &gt;= 0.2.0)

EvLoop::idle — Crea un objeto EvIdle watcher asociado con la instancia del bucle
de eventos actual

### Descripción

final
public
**EvLoop::idle**(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    [int](#language.types.integer) $priority
     = 0

): [EvIdle](#class.evidle)

Crea un objeto EvIdle watcher asociado con la instancia del bucle
de eventos actual

### Parámetros

Todos los parámetros tienen el mismo significado que los de la función
[EvIdle::\_\_construct()](#evidle.construct)

### Valores devueltos

Devuelve un objeto EvIdle en caso de éxito.

### Ver también

- [EvIdle::\_\_construct()](#evidle.construct) - Construye el objeto observador EvIdle

# EvLoop::invokePending

(PECL ev &gt;= 0.2.0)

EvLoop::invokePending — Invoca todos los watchers pendientes mientras sus estados
de cola no sean reinicializados

### Descripción

public
**EvLoop::invokePending**(): [void](language.types.void.html)

Invoca todos los watchers pendientes mientras sus estados
de cola no sean reinicializados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# EvLoop::io

(PECL ev &gt;= 0.2.0)

EvLoop::io — Crea un objeto EvIo watcher asociado con la instancia del bucle de eventos actual

### Descripción

final
public
**EvLoop::io**(

    

    [mixed](#language.types.mixed) $fd

,

    

    [int](#language.types.integer) $events

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvIo](#class.evio)

Crea un objeto EvIo watcher asociado con la instancia del bucle de eventos actual.

### Parámetros

Todos los parámetros tienen el mismo significado que los del método
[EvIo::\_\_construct()](#evio.construct).

### Valores devueltos

Devuelve un objeto EvIo en caso de éxito.

### Ver también

- [EvIo::\_\_construct()](#evio.construct) - Construye un nuevo objeto EvIo

# EvLoop::loopFork

(PECL ev &gt;= 0.2.0)

EvLoop::loopFork — Debe ser llamado después de un fork

### Descripción

public
**EvLoop::loopFork**(): [void](language.types.void.html)

Debe ser llamado después de un _fork_ en el hijo,
y antes de entrar o continuar el bucle de eventos. Una alternativa
es utilizar la constante **[Ev::FLAG_FORKCHECK](#ev.constants.flag-forkcheck)**
que llama a esta función automáticamente, con una pérdida de
rendimiento (consulte la [» documentación
libev](http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#FUNCTIONS_CONTROLLING_EVENT_LOOPS)).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# EvLoop::now

(PECL ev &gt;= 0.2.0)

EvLoop::now — Devuelve el "event loop time" actual

### Descripción

public
**EvLoop::now**(): [float](#language.types.float)

Devuelve el "event loop time" actual, que es la duración durante
la cual el bucle de eventos recibe eventos y
inicia sus análisis. Este timestamp no cambia mientras las
retrollamadas están en ejecución, y es también el tiempo
base utilizado para los temporizadores relativos. Puede considerarse
como el timestamp del evento en curso (o más exactamente,
el utilizado por libev).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el timestamp del bucle de eventos, en segundos.

### Ver también

- [Ev::now()](#ev.now) - Devuelve el tiempo de inicio de la última iteración del bucle de eventos por omisión

# EvLoop::nowUpdate

(PECL ev &gt;= 0.2.0)

EvLoop::nowUpdate — Establece el tiempo actual solicitándolo al kernel y actualiza el tiempo devuelto por EvLoop::now durante la ejecución

### Descripción

public
**EvLoop::nowUpdate**(): [void](language.types.void.html)

Establece el tiempo actual solicitándolo al kernel y actualiza el tiempo devuelto por [EvLoop::now()](#evloop.now) durante la ejecución.
Se trata de una operación costosa en términos de rendimiento que normalmente se ejecuta automáticamente en el método [EvLoop::run()](#evloop.run).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EvLoop::now()](#evloop.now) - Devuelve el "event loop time" actual

- [Ev::nowUpdate()](#ev.nowupdate) - Establece el tiempo actual solicitándolo al kernel; actualiza el
  tiempo devuelto por Ev::now durante la ejecución

# EvLoop::periodic

(PECL ev &gt;= 0.2.0)

EvLoop::periodic — Crea un objeto EvPeriodic watcher asociado con la instancia del
bucle de eventos actual

### Descripción

final
public
**EvLoop::periodic**(

    

    [float](#language.types.float) $offset

,

    

    [float](#language.types.float) $interval

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvPeriodic](#class.evperiodic)

Crea un objeto EvPeriodic watcher asociado con la instancia del
bucle de eventos actual.

### Parámetros

Todos los parámetros tienen el mismo significado que los de la método
[EvPeriodic::\_\_construct()](#evperiodic.construct).

### Valores devueltos

Devuelve un objeto EvPeriodic en caso de éxito.

### Ver también

- [EvPeriodic::\_\_construct()](#evperiodic.construct) - Construye un objeto watcher EvPeriodic

# EvLoop::prepare

(PECL ev &gt;= 0.2.0)

EvLoop::prepare — Crea un objeto EvPrepare watcher asociado con la instancia del bucle de eventos actual

### Descripción

final
public
**EvLoop::prepare**(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    [int](#language.types.integer) $priority
     = 0

): [EvPrepare](#class.evprepare)

Crea un objeto EvPrepare watcher asociado con la instancia del bucle de eventos actual.

### Parámetros

Todos los parámetros tienen el mismo significado que los de la función
**EvPrepare()**.

### Valores devueltos

Devuelve un objeto EvPrepare en caso de éxito.

### Ver también

- [EvPrepare::\_\_construct()](#evprepare.construct) - Construye un objeto watcher EvPrepare

# EvLoop::resume

(PECL ev &gt;= 0.2.0)

EvLoop::resume — Reanuda un bucle de eventos previamente detenido

### Descripción

public
**EvLoop::resume**(): [void](language.types.void.html)

Los métodos [EvLoop::suspend()](#evloop.suspend)
y **EvLoop::resume()** suspenden y
reanudan un bucle.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EvLoop::suspend()](#evloop.suspend) - Suspende el bucle

- [Ev::resume()](#ev.resume) - Reanuda el bucle de eventos por defecto previamente detenido

# EvLoop::run

(PECL ev &gt;= 0.2.0)

EvLoop::run — Comienza a verificar los eventos y a llamar a las funciones de retrollamada de la bucle

### Descripción

public
**EvLoop::run**(

    [int](#language.types.integer) $flags
     = 0

): [void](language.types.void.html)

Comienza a verificar los eventos y a llamar a las funciones de retrollamada
para la bucle de evento actual. El método se detiene cuando una
función de retrollamada llama al método [Ev::stop()](#ev.stop)
o cuando los flags son diferentes de cero (en cuyo caso, el valor
devuelto es **[true](#constant.true)**) o cuando no hay ningún watcher activo que referencie
la bucle ([EvWatcher::keepalive()](#evwatcher.keepalive) vale **[true](#constant.true)**),
en cuyo caso, el valor devuelto será **[false](#constant.false)**.
El valor devuelto puede generalmente ser interpretado como
_si **[true](#constant.true)**, aún hay trabajo por hacer_.

### Parámetros

     flags



      El argumento opcional flags
      puede tomar uno de los valores siguientes:



       <caption>**
        Lista de valores posibles para flags
       **</caption>




           flags

          Descripción







           0

          El comportamiento por omisión, descrito anteriormente




           **[Ev::RUN_ONCE](#ev.constants.run-once)**

          No bloquear más de un evento (espera, pero no bucla)




           **[Ev::RUN_NOWAIT](#ev.constants.run-nowait)**

          Sin bloqueo (recupera, gestiona los eventos, pero no espera)








      Ver las
      [constantes de los flags
       de ejecución](#ev.constants.run-flags).


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EvLoop::stop()](#evloop.stop) - Detiene el bucle de eventos

- [Ev::run()](#ev.run) - Inicia la verificación de eventos y llama a las funciones de retrollamada para el bucle por defecto

# EvLoop::signal

(PECL ev &gt;= 0.2.0)

EvLoop::signal — Crea un objeto EvSignal watcher asociado con la instancia del
bucle de eventos actual

### Descripción

final
public
**EvLoop::signal**(

    

    [int](#language.types.integer) $signum

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvSignal](#class.evsignal)

Crea un objeto EvSignal watcher asociado con la instancia del
bucle de eventos actual.

### Parámetros

Todos los argumentos tienen el mismo significado que los de la método
[EvSignal::\_\_construct()](#evsignal.construct).

### Valores devueltos

Devuelve un objeto EvSignal en caso de éxito.

### Ver también

- [EvSignal::\_\_construct()](#evsignal.construct) - Construye un objeto watcher EvSignal

# EvLoop::stat

(PECL ev &gt;= 0.2.0)

EvLoop::stat — Crea un objeto EvStat watcher asociado con la instancia del bucle de eventos actual

### Descripción

final
public
**EvLoop::stat**(

    

    [string](#language.types.string) $path

,

    

    [float](#language.types.float) $interval

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvStat](#class.evstat)

Crea un objeto EvStat watcher asociado con la instancia del bucle de eventos actual.

### Parámetros

Todos los parámetros tienen el mismo significado que los de la función
[EvSignal::\_\_construct()](#evsignal.construct).

### Valores devueltos

Devuelve un objeto EvStat en caso de éxito.

### Ver también

- [EvSignal::\_\_construct()](#evsignal.construct) - Construye un objeto watcher EvSignal

# EvLoop::stop

(PECL ev &gt;= 0.2.0)

EvLoop::stop — Detiene el bucle de eventos

### Descripción

public
**EvLoop::stop**(

    [int](#language.types.integer) $how
    = ?): [void](language.types.void.html)

Detiene el bucle de eventos.

### Parámetros

     how



      Una [constante](#ev.constants.break-flags)
      *Ev::BREAK_**.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EvLoop::run()](#evloop.run) - Comienza a verificar los eventos y a llamar a las funciones de retrollamada de la bucle

- [Ev::stop()](#ev.stop) - Detiene el bucle de eventos predeterminado

# EvLoop::suspend

(PECL ev &gt;= 0.2.0)

EvLoop::suspend — Suspende el bucle

### Descripción

public
**EvLoop::suspend**(): [void](language.types.void.html)

Los métodos **EvLoop::suspend()**
y [EvLoop::resume()](#evloop.resume) suspenden
y reanudan un bucle.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EvLoop::resume()](#evloop.resume) - Reanuda un bucle de eventos previamente detenido

- [Ev::suspend()](#ev.suspend) - Suspende el bucle de eventos predeterminado

# EvLoop::timer

(PECL ev &gt;= 0.2.0)

EvLoop::timer — Crea un objeto EvTimer watcher asociado con la instancia del bucle de eventos actual

### Descripción

final
public
**EvLoop::timer**(

    

    [float](#language.types.float) $after

,

    

    [float](#language.types.float) $repeat

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvTimer](#class.evtimer)

Crea un objeto EvTimer watcher asociado con la instancia del bucle de eventos actual.

### Parámetros

Todos los argumentos tienen el mismo significado que los de la función
[EvTimer::\_\_construct()](#evtimer.construct).

### Valores devueltos

Devuelve el objeto EvTimer en caso de éxito.

### Ver también

- [EvTimer::\_\_construct()](#evtimer.construct) - Construye un objeto EvTimer watcher

# EvLoop::verify

(PECL ev &gt;= 0.2.0)

EvLoop::verify — Realiza verificaciones de consistencia interna (para la depuración)

### Descripción

public
**EvLoop::verify**(): [void](language.types.void.html)

Realiza verificaciones de consistencia interna (para la depuración
de _libev_) y detiene el programa si se encuentran estructuras
de datos corruptas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [Ev::verify()](#ev.verify) - Efectúa verificaciones internas de consistencia (para la depuración)

## Tabla de contenidos

- [EvLoop::backend](#evloop.backend) — Retorna un integer que describe el backend utilizado por libev
- [EvLoop::check](#evloop.check) — Crea un objeto EvCheck asociado con la instancia del bucle de eventos actual
- [EvLoop::child](#evloop.child) — Crea un objeto EvChild asociado con el bucle de eventos actual
- [EvLoop::\_\_construct](#evloop.construct) — Construye un objeto de bucle de eventos
- [EvLoop::defaultLoop](#evloop.defaultloop) — Devuelve o crea el bucle de eventos por omisión
- [EvLoop::embed](#evloop.embed) — Crea una instancia del observador EvEmbed asociado con el objeto EvLoop actual
- [EvLoop::fork](#evloop.fork) — Crea un objeto EvFork watcher asociado con la instancia del bucle de eventos actual
- [EvLoop::idle](#evloop.idle) — Crea un objeto EvIdle watcher asociado con la instancia del bucle
  de eventos actual
- [EvLoop::invokePending](#evloop.invokepending) — Invoca todos los watchers pendientes mientras sus estados
  de cola no sean reinicializados
- [EvLoop::io](#evloop.io) — Crea un objeto EvIo watcher asociado con la instancia del bucle de eventos actual
- [EvLoop::loopFork](#evloop.loopfork) — Debe ser llamado después de un fork
- [EvLoop::now](#evloop.now) — Devuelve el "event loop time" actual
- [EvLoop::nowUpdate](#evloop.nowupdate) — Establece el tiempo actual solicitándolo al kernel y actualiza el tiempo devuelto por EvLoop::now durante la ejecución
- [EvLoop::periodic](#evloop.periodic) — Crea un objeto EvPeriodic watcher asociado con la instancia del
  bucle de eventos actual
- [EvLoop::prepare](#evloop.prepare) — Crea un objeto EvPrepare watcher asociado con la instancia del bucle de eventos actual
- [EvLoop::resume](#evloop.resume) — Reanuda un bucle de eventos previamente detenido
- [EvLoop::run](#evloop.run) — Comienza a verificar los eventos y a llamar a las funciones de retrollamada de la bucle
- [EvLoop::signal](#evloop.signal) — Crea un objeto EvSignal watcher asociado con la instancia del
  bucle de eventos actual
- [EvLoop::stat](#evloop.stat) — Crea un objeto EvStat watcher asociado con la instancia del bucle de eventos actual
- [EvLoop::stop](#evloop.stop) — Detiene el bucle de eventos
- [EvLoop::suspend](#evloop.suspend) — Suspende el bucle
- [EvLoop::timer](#evloop.timer) — Crea un objeto EvTimer watcher asociado con la instancia del bucle de eventos actual
- [EvLoop::verify](#evloop.verify) — Realiza verificaciones de consistencia interna (para la depuración)

# La clase EvPeriodic

(PECL ev &gt;= 0.2.0)

## Introducción

Los observadores periódicos son una especie de temporizadores, pero son muy
versátiles.

    A diferencia de [EvTimer](#class.evtimer), los observadores
    **EvPeriodic** no se basan en un tiempo real
    (o un tiempo relativo, el tiempo físico que transcurre), sino en un tiempo
    de reloj (tiempo absoluto, calendario o de reloj). La diferencia es
    que un tiempo de reloj puede ser más rápido o más lento que un tiempo
    real, y los saltos en el tiempo no son raros (por ejemplo, durante un ajuste).




    Un observador **EvPeriodic** puede ser configurado para
    ser lanzado después de puntos específicos en el tiempo. Por ejemplo,
    si un observador **EvPeriodic** está configurado para
    lanzarse *"en 10 segundos"* (es decir,
    [EvLoop::now()](#evloop.now) + 10.0,
    es decir, un tiempo absoluto, y no un retraso), y el reloj del sistema
    se reinicia a *enero del año pasado*,
    entonces tomará un año o más para lanzar el evento (a diferencia
    de [EvTimer](#class.evtimer) que se lanzará 10
    segundos después de su inicio, ya que utiliza un retraso máximo relativo).




    Al igual que con los temporizadores, se garantiza que la función de retrollamada sea
    llamada únicamente cuando el punto en el tiempo en el que se supone que debe lanzarse
    haya pasado. Si varios temporizadores se vuelven listos al mismo tiempo
    durante la misma iteración del bucle, entonces aquellos con valores de retraso
    máximo más cercanos serán llamados antes que aquellos con valores de retraso
    máximo más lejanos (pero esto ya no es cierto cuando una función de retrollamada
    llama recursivamente al método [EvLoop::run()](#evloop.run)).

## Sinopsis de la Clase

     ****




      class **EvPeriodic**


      extends
       [EvWatcher](#class.evwatcher)

     {

    /* Propiedades */

     public
      [$offset](#evperiodic.props.offset);

    public
      [$interval](#evperiodic.props.interval);

    /* Propiedades heredadas */
    public
      [$is_active](#evwatcher.props.is-active);

public
[$data](#evwatcher.props.data);
public
[$is_pending](#evwatcher.props.is-pending);
public
[$priority](#evwatcher.props.priority);

    /* Métodos */

public
[\_\_construct](#evperiodic.construct)(

    

    [float](#language.types.float) $offset

,

    

    [string](#language.types.string) $interval

,

    

    [callable](#language.types.callable) $reschedule_cb

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

)

    public

[again](#evperiodic.again)(): [void](language.types.void.html)
public
[at](#evperiodic.at)(): [float](#language.types.float)
final
public
static
[createStopped](#evperiodic.createstopped)(

    

    [float](#language.types.float) $offset

,

    

    [float](#language.types.float) $interval

,

    

    [callable](#language.types.callable) $reschedule_cb

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvPeriodic](#class.evperiodic)
public
[set](#evperiodic.set)(

    [float](#language.types.float) $offset

,

    [float](#language.types.float) $interval

): [void](language.types.void.html)

    /* Métodos heredados */
    public

[EvWatcher::clear](#evwatcher.clear)(): [int](#language.types.integer)
public
[EvWatcher::feed](#evwatcher.feed)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::getLoop](#evwatcher.getloop)(): [EvLoop](#class.evloop)
public
[EvWatcher::invoke](#evwatcher.invoke)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::keepalive](#evwatcher.keepalive)(

    [bool](#language.types.boolean) $value
    = ?): [bool](#language.types.boolean)

public
[EvWatcher::setCallback](#evwatcher.setcallback)(

    [callable](#language.types.callable) $callback

): [void](language.types.void.html)
public
[EvWatcher::start](#evwatcher.start)(): [void](language.types.void.html)
public
[EvWatcher::stop](#evwatcher.stop)(): [void](language.types.void.html)

}

## Propiedades

      offset



       Al repetirse, contendrá el valor de la posición, de lo contrario,
       será el punto absoluto en el tiempo (el valor de la posición
       pasado al método [EvPeriodic::set()](#evperiodic.set),
       aunque *libev* puede modificar este valor
       para una mejor estabilidad numérica).







      interval



       El valor del intervalo actual. Puede ser modificado en cualquier momento,
       pero los cambios no surten efecto hasta que el temporizador
       periódico no se lance, o cuando se llame al método
       [EvPeriodic::again()](#evperiodic.again).





# EvPeriodic::again

(PECL ev &gt;= 0.2.0)

EvPeriodic::again — Detiene y reinicia el observador periódico

### Descripción

public
**EvPeriodic::again**(): [void](language.types.void.html)

Detiene y reinicia el observador periódico. Esto solo es útil
cuando los atributos han cambiado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EvTimer::again()](#evtimer.again) - Reinicia el watcher Timer

# EvPeriodic::at

(PECL ev &gt;= 0.2.0)

EvPeriodic::at — Devuelve el tiempo absoluto en el que este watcher será llamado la próxima vez

### Descripción

public
**EvPeriodic::at**(): [float](#language.types.float)

Devuelve el tiempo absoluto en el que este watcher será llamado la próxima vez.
Esto no es lo mismo que el argumento de posición del método
[EvPeriodic::set()](#evperiodic.set) o el método
[EvPeriodic::\_\_construct()](#evperiodic.construct), pero funciona también en
modo intervalo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tiempo absoluto en el que este watcher será llamado la próxima vez,
en segundos.

# EvPeriodic::\_\_construct

(PECL ev &gt;= 0.2.0)

EvPeriodic::\_\_construct — Construye un objeto watcher EvPeriodic

### Descripción

public
**EvPeriodic::\_\_construct**(

    

    [float](#language.types.float) $offset

,

    

    [string](#language.types.string) $interval

,

    

    [callable](#language.types.callable) $reschedule_cb

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

)

Construye un objeto watcher EvPeriodic y lo inicia automáticamente.
El método [EvPeriodic::createStopped()](#evperiodic.createstopped)
crea un watcher periódico detenido.

### Parámetros

     offset



      Ver los
      [modos de operación del watcher periódico](#ev.periodic-modes)







     interval



      Ver los
      [modos de operación del watcher periódico](#ev.periodic-modes)







     reschedule_cb



      Función de retrollamada Reschedule. Puede pasarse el valor **[null](#constant.null)**.
      Ver los
      [modos de operación del watcher periódico](#ev.periodic-modes)







     callback



      Ver las
      [funciones de retrollamada de los Watchers](#ev.watcher-callbacks) .







     data



      Datos personalizados para asociar con el watcher.







     priority



      [Prioridad del Watcher](#ev.constants.watcher-pri)


### Ejemplos

**Ejemplo #1 Temporizador periódico. Utilizando la retrollamada de replanificación**

&lt;?php
// Cada 10.5 segundos

function reschedule_cb ($watcher, $now) {
 return $now + (10.5. - fmod($now, 10.5));
}

$w = new EvPeriodic(0., 0., "reschedule_cb", function ($w, $revents) {
echo time(), PHP_EOL;
});
Ev::run();
?&gt;

**Ejemplo #2 Temporizador periódico. Llamado cada 10.5 segundos**

&lt;?php
// Cada 10.5 segundos a partir de ahora
$w = new EvPeriodic(fmod(Ev::now(), 10.5), 10.5, NULL, function ($w, $revents) {
echo time(), PHP_EOL;
});
Ev::run();
?&gt;

**Ejemplo #3 Watcher cada hora**

&lt;?php
$hourly = EvPeriodic(0, 3600, NULL, function () {
echo "una vez por hora\n";
});
?&gt;

### Ver también

- [Los modos de operación del watcher periódico](#ev.periodic-modes)

- [EvTimer](#class.evtimer)

- [EvPeriodic::createStopped()](#evperiodic.createstopped) - Crea un watcher EvPeriodic detenido

# EvPeriodic::createStopped

(PECL ev &gt;= 0.2.0)

EvPeriodic::createStopped — Crea un watcher EvPeriodic detenido

### Descripción

final
public
static
**EvPeriodic::createStopped**(

    

    [float](#language.types.float) $offset

,

    

    [float](#language.types.float) $interval

,

    

    [callable](#language.types.callable) $reschedule_cb

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvPeriodic](#class.evperiodic)

Crea un objeto EvPeriodic. A diferencia del método
[EvPeriodic::\_\_construct()](#evperiodic.construct), este método
no inicia el watcher automáticamente.

### Parámetros

     offset



      Ver
      [modos de operación del watcher periódico](#ev.periodic-modes)







     interval



      Ver los
      [modos de operación del watcher periódico](#ev.periodic-modes)







     reschedule_cb



      Función de retrollamada Reschedule. Puede pasarse el valor **[null](#constant.null)**.
      Ver los
      [modos de operación del watcher periódico](#ev.periodic-modes)







     callback



      Ver las
      [funciones de retrollamada de los Watchers](#ev.watcher-callbacks).







     data



      Datos personalizados para asociar con el watcher.







     priority



      [Prioridad del Watcher](#ev.constants.watcher-pri)


### Valores devueltos

Devuelve un objeto watcher EvPeriodic en caso de éxito.

### Ver también

- [EvPeriodic::\_\_construct()](#evperiodic.construct) - Construye un objeto watcher EvPeriodic

- [EvTimer::createStopped()](#evtimer.createstopped) - Crea un objeto EvTimer watcher detenido

# EvPeriodic::set

(PECL ev &gt;= 0.2.0)

EvPeriodic::set — Configura el watcher

### Descripción

public
**EvPeriodic::set**(

    [float](#language.types.float) $offset

,

    [float](#language.types.float) $interval

): [void](language.types.void.html)

(Re-)Configura el watcher EvPeriodic.

### Parámetros

     offset



      El mismo significado que para el método
      [EvPeriodic::__construct()](#evperiodic.construct).
      Ver los
      [modos de operación del watcher periódico](#ev.periodic-modes)







     interval



      El mismo significado que para el método
      [EvPeriodic::__construct()](#evperiodic.construct).
      Ver los
      [modos de operación del watcher periódico](#ev.periodic-modes)


### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [EvPeriodic::again](#evperiodic.again) — Detiene y reinicia el observador periódico
- [EvPeriodic::at](#evperiodic.at) — Devuelve el tiempo absoluto en el que este watcher será llamado la próxima vez
- [EvPeriodic::\_\_construct](#evperiodic.construct) — Construye un objeto watcher EvPeriodic
- [EvPeriodic::createStopped](#evperiodic.createstopped) — Crea un watcher EvPeriodic detenido
- [EvPeriodic::set](#evperiodic.set) — Configura el watcher

# La clase EvPrepare

(PECL ev &gt;= 0.2.0)

## Introducción

    Los observadores **EvPrepare** y
    [EvCheck](#class.evcheck) se utilizan habitualmente juntos.
    El observador **EvPrepare** será llamado antes de
    los bloques del proceso, mientras que el observador [EvCheck](#class.evcheck)
    será llamado después.



    No está permitido llamar al método [EvLoop::run()](#evloop.run)
    o a un método/función similar que entre en el bucle del evento
    actual desde el observador **EvPrepare**,
    o desde el observador [EvCheck](#class.evcheck). Sin embargo,
    esto es posible para todos los demás bucles que no sean el actual.
    La razón es que no es necesario verificar la recursión
    en estos observadores, es decir, la secuencia siguiente será siempre:
    **EvPrepare** -&gt; bloqueo -&gt; [EvCheck](#class.evcheck),
    por lo tanto, tener un observador para cada uno no es útil, sabiendo que siempre serán llamados
    juntos al llamar al bloqueo.



    El propósito principal es integrar otros mecanismos de eventos en
    la biblioteca *libev*, con un uso avanzado.
    Pueden ser utilizados, por ejemplo, para monitorear los cambios
    de variables, implementar observadores personalizados, integrar net-snmp
    o una biblioteca adicional, y mucho más. También pueden ser útiles para almacenar en caché datos, y querer mostrarlos después
    del bloqueo.



    Se recomienda proporcionar una prioridad alta a [EvCheck](#class.evcheck)
    (**[Ev::MAXPRI](#ev.constants.maxpri)**) para asegurarse de que se ejecutará
    antes que cualquier otro observador en la cola (a diferencia de lo que ocurre con
    el observador **EvPrepare**).



    Además, los observadores [EvCheck](#class.evcheck) no deben
    activar/alimentar eventos. Aunque *libev*
    admite esto, pueden ser ejecutados antes de que los otros observadores
    [EvCheck](#class.evcheck) terminen sus trabajos.

## Sinopsis de la Clase

     ****




      class **EvPrepare**


      extends
       [EvWatcher](#class.evwatcher)

     {


    /* Propiedades heredadas */

     public
      [$is_active](#evwatcher.props.is-active);

public
[$data](#evwatcher.props.data);
public
[$is_pending](#evwatcher.props.is-pending);
public
[$priority](#evwatcher.props.priority);

    /* Métodos */

public
[\_\_construct](#evprepare.construct)(

    [string](#language.types.string) $callback

,

    [string](#language.types.string) $data
    = ?,

    [string](#language.types.string) $priority
    = ?)

    final

public
static
[createStopped](#evprepare.createstopped)(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    [int](#language.types.integer) $priority
     = 0

): [EvPrepare](#class.evprepare)

    /* Métodos heredados */
    public

[EvWatcher::clear](#evwatcher.clear)(): [int](#language.types.integer)
public
[EvWatcher::feed](#evwatcher.feed)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::getLoop](#evwatcher.getloop)(): [EvLoop](#class.evloop)
public
[EvWatcher::invoke](#evwatcher.invoke)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::keepalive](#evwatcher.keepalive)(

    [bool](#language.types.boolean) $value
    = ?): [bool](#language.types.boolean)

public
[EvWatcher::setCallback](#evwatcher.setcallback)(

    [callable](#language.types.callable) $callback

): [void](language.types.void.html)
public
[EvWatcher::start](#evwatcher.start)(): [void](language.types.void.html)
public
[EvWatcher::stop](#evwatcher.stop)(): [void](language.types.void.html)

}

# EvPrepare::\_\_construct

(PECL ev &gt;= 0.2.0)

EvPrepare::\_\_construct — Construye un objeto watcher EvPrepare

### Descripción

public
**EvPrepare::\_\_construct**(

    [string](#language.types.string) $callback

,

    [string](#language.types.string) $data
    = ?,

    [string](#language.types.string) $priority
    = ?)

Construye un objeto watcher EvPrepare.
Inicia el watcher automáticamente. Si se necesita
un watcher detenido, se debe utilizar el método
[EvPrepare::createStopped()](#evprepare.createstopped).

### Parámetros

     callback



      Ver las
      [retrollamadas de los Watchers](#ev.watcher-callbacks).







     data



      Datos personalizados para asociar con el watcher.







     priority



      [Prioridad del Watcher](#ev.constants.watcher-pri)


### Ver también

- [EvCheck](#class.evcheck)

# EvPrepare::createStopped

(PECL ev &gt;= 0.2.0)

EvPrepare::createStopped — Crea una instancia detenida del watcher EvPrepare

### Descripción

final
public
static
**EvPrepare::createStopped**(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    [int](#language.types.integer) $priority
     = 0

): [EvPrepare](#class.evprepare)

Crea una instancia detenida del watcher EvPrepare. A diferencia
del método [EvPrepare::\_\_construct()](#evprepare.construct),
este método no inicia el watcher automáticamente.

### Parámetros

     callback



      Ver las
      [funciones de retrollamada de los Watchers](#ev.watcher-callbacks).







     data



      Datos personalizados para asociar con el watcher.







     priority



      [Prioridad del Watcher](#ev.constants.watcher-pri)


### Valores devueltos

Devuelve un objeto EvPrepare en caso de éxito.

### Ver también

- [EvPrepare::\_\_construct()](#evprepare.construct) - Construye un objeto watcher EvPrepare

- [EvWatcher::start()](#evwatcher.start) - Inicia el Watcher

## Tabla de contenidos

- [EvPrepare::\_\_construct](#evprepare.construct) — Construye un objeto watcher EvPrepare
- [EvPrepare::createStopped](#evprepare.createstopped) — Crea una instancia detenida del watcher EvPrepare

# La clase EvSignal

(PECL ev &gt;= 0.2.0)

## Introducción

    Los watchers **EvSignal** lanzarán un evento

cuando el proceso reciba una señal específica una o varias veces.
A pesar de que las señales sean asíncronas,
_libev_ intentará hacer lo posible para
entregar las señales de forma síncrona, es decir, al igual que cualquier
otro evento.

    No hay límite para el número de watchers para la misma señal,
    pero solo en la misma loop, es decir, se puede vigilar
    **[SIGINT](#constant.sigint)** en la loop por defecto, y para
    **[SIGIO](#constant.sigio)** en otra loop, pero no está permitido vigilar **[SIGINT](#constant.sigint)** tanto en
    la loop por defecto como en otra loop al mismo tiempo.
    En este momento, **[SIGCHLD](#constant.sigchld)** está permanentemente
    vinculado a la loop por defecto.




    Si es posible y está soportado, *libev* instalará su
    manejador con SA_RESTART (o equivalente) activado,
    por lo tanto, las llamadas al sistema no deberían ser interrumpidas. En el caso
    de un problema con las llamadas al sistema que se vieran interrumpidas por
    señales, todas las señales pueden ser bloqueadas en un watcher
    [EvCheck](#class.evcheck) y desbloqueadas en un watcher
    [EvPrepare](#class.evprepare).

## Sinopsis de la Clase

     ****




      class **EvSignal**


      extends
       [EvWatcher](#class.evwatcher)

     {

    /* Propiedades */

     public
      [$signum](#evsignal.props.signum);

    /* Propiedades heredadas */
    public
      [$is_active](#evwatcher.props.is-active);

public
[$data](#evwatcher.props.data);
public
[$is_pending](#evwatcher.props.is-pending);
public
[$priority](#evwatcher.props.priority);

    /* Métodos */

public
[\_\_construct](#evsignal.construct)(

    

    [int](#language.types.integer) $signum

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

)

    final

public
static
[createStopped](#evsignal.createstopped)(

    

    [int](#language.types.integer) $signum

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvSignal](#class.evsignal)
public
[set](#evsignal.set)(

    [int](#language.types.integer) $signum

): [void](language.types.void.html)

    /* Métodos heredados */
    public

[EvWatcher::clear](#evwatcher.clear)(): [int](#language.types.integer)
public
[EvWatcher::feed](#evwatcher.feed)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::getLoop](#evwatcher.getloop)(): [EvLoop](#class.evloop)
public
[EvWatcher::invoke](#evwatcher.invoke)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::keepalive](#evwatcher.keepalive)(

    [bool](#language.types.boolean) $value
    = ?): [bool](#language.types.boolean)

public
[EvWatcher::setCallback](#evwatcher.setcallback)(

    [callable](#language.types.callable) $callback

): [void](language.types.void.html)
public
[EvWatcher::start](#evwatcher.start)(): [void](language.types.void.html)
public
[EvWatcher::stop](#evwatcher.stop)(): [void](language.types.void.html)

}

## Propiedades

      signum



       El número de la señal. Ver las constantes exportadas por la extensión
       *pcntl*. Ver también la página del manual para
       signal(7).





# EvSignal::\_\_construct

(PECL ev &gt;= 0.2.0)

EvSignal::\_\_construct — Construye un objeto watcher EvSignal

### Descripción

public
**EvSignal::\_\_construct**(

    

    [int](#language.types.integer) $signum

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

)

Construye un objeto watcher EvSignal y lo inicia automáticamente.
Para un watcher periódico detenido, utilice en su lugar el método
[EvSignal::createStopped()](#evsignal.createstopped).

### Parámetros

     signum



      Número de la señal. Consulte las constantes exportadas por la extensión
      *pcntl*. Consulte también la página del manual del sistema
      signal(7).







     callback



      Consulte las
      [funciones de retrollamada de los Watchers](#ev.watcher-callbacks).







     data



      Datos personalizados para asociar con el watcher.







     priority



      [Prioridad del Watcher](#ev.constants.watcher-pri)


### Ejemplos

**Ejemplo #1 Gestión de una señal SIGTERM**

&lt;?php
$w = new EvSignal(SIGTERM, function ($watcher) {
echo "¡Señal SIGTERM recibida!\n";
$watcher-&gt;stop();
});

Ev::run();
?&gt;

### Ver también

- [EvSignal::createStopped()](#evsignal.createstopped) - Crea un objeto watcher EvSignal detenido

# EvSignal::createStopped

(PECL ev &gt;= 0.2.0)

EvSignal::createStopped — Crea un objeto watcher EvSignal detenido

### Descripción

final
public
static
**EvSignal::createStopped**(

    

    [int](#language.types.integer) $signum

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvSignal](#class.evsignal)

Crea un objeto watcher EvSignal detenido. A diferencia del método
[EvSignal::\_\_construct()](#evsignal.construct), este método
no inicia automáticamente el watcher.

### Parámetros

     signum



      Número de la señal. Ver las constantes exportadas por la extensión
      *pcntl*. Ver también la página del manual del sistema
      signal(7).







     callback



      Ver las
      [funciones de retrollamada de los Watchers](#ev.watcher-callbacks).







     data



      Datos personalizados para asociar con el watcher.







     priority



      [Prioridad del Watcher](#ev.constants.watcher-pri)


### Valores devueltos

Devuelve un objeto EvSignal en caso de éxito.

### Ver también

- [EvWatcher::start()](#evwatcher.start) - Inicia el Watcher

- [EvSignal::\_\_construct()](#evsignal.construct) - Construye un objeto watcher EvSignal

# EvSignal::set

(PECL ev &gt;= 0.2.0)

EvSignal::set — Configura el observador

### Descripción

public
**EvSignal::set**(

    [int](#language.types.integer) $signum

): [void](language.types.void.html)

Configura el observador.

### Parámetros

     signum



      Número de la señal. Idéntico al del constructor
      [EvSignal::__construct()](#evsignal.construct).


### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [EvSignal::\_\_construct](#evsignal.construct) — Construye un objeto watcher EvSignal
- [EvSignal::createStopped](#evsignal.createstopped) — Crea un objeto watcher EvSignal detenido
- [EvSignal::set](#evsignal.set) — Configura el observador

# La clase EvStat

(PECL ev &gt;= 0.2.0)

## Introducción

    La clase **EvStat** supervisa
    un fichero del sistema de ficheros para detectar cualquier modificación
    de sus atributos. Invoca el comando *stat()*
    en esta ruta, a intervalos regulares (o cuando el sistema operativo notifica una modificación)
    y verifica si ha sido modificado desde la última vez, llamando a la
    función de retrollamada si es el caso.




    La ruta no necesita existir: el cambio de "la ruta existe"
    a "la ruta no existe" es una modificación de estado como cualquier otra.
    La condición "la ruta no existe" está indicada por el valor 0 del
    elemento 'nlink' (devolvido por el método
    [EvStat::attr()](#evstat.attr)).




    La ruta no debe terminar con un slash, ni contener componentes
    especiales como '.' o ...
    La ruta debe ser absoluta: si es relativa, y el directorio de trabajo
    cambia, entonces el comportamiento será indefinido.




    Dado que no hay una interfaz de notificación de cambios portable,
    la implementación portable simplemente invoca el comando
    *stat()* en la ruta para verificar las modificaciones.
    Para este caso, un intervalo regular puede ser especificado. Si se especifica,
    un intervalo de 0.0  (altamente recomendado) entonces
    un valor predeterminado no especificado será utilizado (alrededor de 5 segundos,
    y puede ser modificado dinámicamente). *libev*
    también impondrá un intervalo mínimo que actualmente está alrededor
    de 0.1, lo cual es ampliamente suficiente.




    Este tipo de observador no está previsto para un gran número de observadores
    **EvStat**, dado que incluso con las notificaciones
    del sistema sobre modificaciones soportadas por el sistema operativo, esto consume muchos
    recursos.

## Sinopsis de la Clase

     ****




      class **EvStat**


      extends
       [EvWatcher](#class.evwatcher)

     {

    /* Propiedades */

     public
      [$path](#evstat.props.path);

    public
      [$interval](#evstat.props.interval);

    /* Propiedades heredadas */
    public
      [$is_active](#evwatcher.props.is-active);

public
[$data](#evwatcher.props.data);
public
[$is_pending](#evwatcher.props.is-pending);
public
[$priority](#evwatcher.props.priority);

    /* Métodos */

public
[\_\_construct](#evstat.construct)(

    

    [string](#language.types.string) $path

,

    

    [float](#language.types.float) $interval

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

)

    public

[attr](#evstat.attr)(): [array](#language.types.array)
final
public
static
[createStopped](#evstat.createstopped)(

    

    [string](#language.types.string) $path

,

    

    [float](#language.types.float) $interval

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [void](language.types.void.html)
public
[prev](#evstat.prev)(): [void](language.types.void.html)
public
[set](#evstat.set)(

    [string](#language.types.string) $path

,

    [float](#language.types.float) $interval

): [void](language.types.void.html)
public
[stat](#evstat.stat)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public

[EvWatcher::clear](#evwatcher.clear)(): [int](#language.types.integer)
public
[EvWatcher::feed](#evwatcher.feed)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::getLoop](#evwatcher.getloop)(): [EvLoop](#class.evloop)
public
[EvWatcher::invoke](#evwatcher.invoke)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::keepalive](#evwatcher.keepalive)(

    [bool](#language.types.boolean) $value
    = ?): [bool](#language.types.boolean)

public
[EvWatcher::setCallback](#evwatcher.setcallback)(

    [callable](#language.types.callable) $callback

): [void](language.types.void.html)
public
[EvWatcher::start](#evwatcher.start)(): [void](language.types.void.html)
public
[EvWatcher::stop](#evwatcher.stop)(): [void](language.types.void.html)

}

## Propiedades

      interval



       *Solo lectura*. La rapidez con la que
       una modificación debe ser detectada; normalmente, debe valer
       0.0 para dejar que *libev*
       elija un buen valor.







      path



       *Solo lectura*. La ruta hacia el fichero
       del cual se desean supervisar las modificaciones de estado.





# EvStat::attr

(PECL ev &gt;= 0.2.0)

EvStat::attr — Devuelve el valor más reciente detectado por Ev

### Descripción

public
**EvStat::attr**(): [array](#language.types.array)

Devuelve un array de los valores más recientes detectados por Ev.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de los valores más recientes detectados por Ev
(sin el stat actual):

    <caption>**Lista de claves del array devuelto por el método EvStat::attr()**</caption>



       Clave
       Descripción







        'dev'

       ID del dispositivo que contiene el fichero




        'ino'

       número de inodos




        'mode'

       protección




        'nlink'

       número de enlaces duros




        'uid'

       ID del usuario del propietario




        'size'

       tamaño total, en bytes




        'gid'

       ID del grupo del propietario




        'rdev'

       ID del dispositivo (si fichero especial)




        'blksize'

       tamaño del bloque para un sistema de ficheros I/O




        'blocks'

       número de bloques 512B asignados




        'atime'

       Fecha/hora del último acceso




        'ctime'

       Fecha/Hora de la última modificación de estado




        'mtime'

       Fecha/hora de la última modificación




Consulte la página del manual sobre stat(2)
para más detalles.

### Ejemplos

**Ejemplo #1 Monitoreo de cambios en /var/log/messages**

&lt;?php
// Uso de un intervalo de 10 segundos.
$w = new EvStat("/var/log/messages", 8, function ($w) {
echo "/var/log/messages ha cambiado\n";

    $attr = $w-&gt;attr();

    if ($attr['nlink']) {
        printf("Tamaño actual: %ld\n", $attr['size']);
        printf("atime actual: %ld\n", $attr['atime']);
        printf("mtime actual: %ld\n", $attr['mtime']);
    } else {
        fprintf(STDERR, "¡El fichero `messages` no está presente!");
        $w-&gt;stop();
    }

});

Ev::run();
?&gt;

### Ver también

- [EvStat::prev()](#evstat.prev) - Devuelve el conjunto anterior devuelto por EvStat::attr

- [EvStat::stat()](#evstat.stat) - Inicializa la llamada a stat

# EvStat::\_\_construct

(PECL ev &gt;= 0.2.0)

EvStat::\_\_construct — Construye un objeto EvStat watcher

### Descripción

public
**EvStat::\_\_construct**(

    

    [string](#language.types.string) $path

,

    

    [float](#language.types.float) $interval

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

)

Construye un objeto EvStat watcher e inicia el watcher automáticamente.

### Parámetros

     path



      La ruta de acceso para la cual se espera una modificación de estado.







     interval



      Intervalo de detección de una modificación; debe valer normalmente
      0.0 para dejar que *libev*
      elija el valor adecuado.







     callback



      Ver las
      [retrollamadas Watcher](#ev.watcher-callbacks).







     data



      Datos personalizados para asociar con el watcher.







     priority



      [Las prioridades del Watcher](#ev.constants.watcher-pri)


### Ejemplos

**Ejemplo #1 Monitoreo de cambios en el directorio /var/log/messages**

&lt;?php
// Uso de un intervalo de 10 segundos.
$w = new EvStat("/var/log/messages", 10, function ($w) {
echo "/var/log/messages changed\n";

$attr = $w-&gt;attr();

if ($attr['nlink']) {
printf("Tamaño actual: %ld\n", $attr['size']);
printf("Hora de último acceso: %ld\n", $attr['atime']);
printf("Hora de última modificación: %ld\n", $attr['mtime']);
} else {
fprintf(STDERR, "¡El fichero `messages` no está presente!");
$w-&gt;stop();
}
});

?&gt;

# EvStat::createStopped

(PECL ev &gt;= 0.2.0)

EvStat::createStopped — Crea un objeto EvStat watcher detenido

### Descripción

final
public
static
**EvStat::createStopped**(

    

    [string](#language.types.string) $path

,

    

    [float](#language.types.float) $interval

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [void](language.types.void.html)

Crea un objeto EvStat watcher, pero no lo inicia automáticamente
(a diferencia del método [EvStat::\_\_construct()](#evstat.construct)).

### Parámetros

     path



      La ruta de acceso para la cual se debe esperar un cambio de estado.







     interval



      Intervalo de detección de la modificación; debe normalmente valer
      0.0 para dejar que *libev*
      elija un buen valor.







     callback



      Ver las
      [funciones de retrollamada Watcher](#ev.watcher-callbacks).







     data



      Datos personalizados para asociar con el watcher.







     priority



      [las prioridades del Watcher](#ev.constants.watcher-pri)


### Valores devueltos

Devuelve un objeto EvStat watcher detenido en caso de éxito.

### Ver también

- [EvStat::\_\_construct()](#evstat.construct) - Construye un objeto EvStat watcher

- [EvWatcher::start()](#evwatcher.start) - Inicia el Watcher

# EvStat::prev

(PECL ev &gt;= 0.2.0)

EvStat::prev — Devuelve el conjunto anterior devuelto por EvStat::attr

### Descripción

public
**EvStat::prev**(): [void](language.types.void.html)

Idéntico al método [EvStat::attr()](#evstat.attr)
pero devuelve el conjunto anterior de valores.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array con la misma estructura que el array devuelto por
el método [EvStat::attr()](#evstat.attr). El array contendrá
los valores detectados previamente.

### Ver también

- [EvStat::attr()](#evstat.attr) - Devuelve el valor más reciente detectado por Ev

- [EvStat::stat()](#evstat.stat) - Inicializa la llamada a stat

# EvStat::set

(PECL ev &gt;= 0.2.0)

EvStat::set — Configura el watcher

### Descripción

public
**EvStat::set**(

    [string](#language.types.string) $path

,

    [float](#language.types.float) $interval

): [void](language.types.void.html)

Configura el watcher.

### Parámetros

     path



      La ruta de acceso para la cual se esperará un cambio de estado.







     interval



      Intervalo de detección de modificaciones; debe normalmente valer
      0.0 para dejar que *libev*
      elija un buen valor.


### Valores devueltos

No se retorna ningún valor.

# EvStat::stat

(PECL ev &gt;= 0.2.0)

EvStat::stat — Inicializa la llamada a stat

### Descripción

public
**EvStat::stat**(): [bool](#language.types.boolean)

Inicializa la llamada a stat (actualización de la caché interna).
El comando llamará a stat (usando lstat)
en la ruta de acceso especificada path en el observador
y establecerá los valores encontrados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si path existe. De lo contrario, **[false](#constant.false)**.

### Ver también

- [EvStat::attr()](#evstat.attr) - Devuelve el valor más reciente detectado por Ev

- [EvStat::prev()](#evstat.prev) - Devuelve el conjunto anterior devuelto por EvStat::attr

## Tabla de contenidos

- [EvStat::attr](#evstat.attr) — Devuelve el valor más reciente detectado por Ev
- [EvStat::\_\_construct](#evstat.construct) — Construye un objeto EvStat watcher
- [EvStat::createStopped](#evstat.createstopped) — Crea un objeto EvStat watcher detenido
- [EvStat::prev](#evstat.prev) — Devuelve el conjunto anterior devuelto por EvStat::attr
- [EvStat::set](#evstat.set) — Configura el watcher
- [EvStat::stat](#evstat.stat) — Inicializa la llamada a stat

# La clase EvTimer

(PECL ev &gt;= 0.2.0)

## Introducción

    Los observadores **EvTimer** son observadores relativamente
    simples que generan un evento después de un tiempo especificado y, opcionalmente,
    se repiten a intervalos regulares.




    Los temporizadores se basan en tiempo real, por lo que si un temporizador
    programa un evento que finaliza después de una hora y se reinicia el reloj del sistema
    a *enero del año pasado*, volverá a estar fuera de tiempo
    después de una hora (aproximadamente). "Aproximadamente" porque la detección de
    saltos en el tiempo es difícil y ciertas inexactitudes son inevitables.




    Se garantiza que la función de retrollamada se llamará solo después de que
    expire el tiempo de espera máximo (y no exactamente en ese momento preciso,
    por lo que en sistemas con una resolución de reloj baja, puede introducirse
    un pequeño retraso). Si varios temporizadores están listos durante la misma
    iteración del bucle, el que tenga el valor de tiempo de espera máximo más cercano
    se invocará antes que otro con la misma prioridad pero con un valor de tiempo
    de espera más lejano (aunque esto ya no es cierto cuando una función de retrollamada
    llama recursivamente al método [EvLoop::run()](#evloop.run)).




    El temporizador en sí hará todo lo posible para no derivar, pero si un temporizador
    está configurado para ejecutarse cada 10 segundos, entonces
    normalmente se ejecutará exactamente cada 10 segundos.
    Sin embargo, si el script no puede mantener el temporizador porque tarda más
    que sus 10 segundos, el temporizador no podrá ejecutarse
    más de una vez por iteración del bucle de eventos.

## Sinopsis de la Clase

     ****




      class **EvTimer**


      extends
       [EvWatcher](#class.evwatcher)

     {

    /* Propiedades */

     public
      [$repeat](#evtimer.props.repeat);

    public
      [$remaining](#evtimer.props.remaining);

    /* Propiedades heredadas */
    public
      [$is_active](#evwatcher.props.is-active);

public
[$data](#evwatcher.props.data);
public
[$is_pending](#evwatcher.props.is-pending);
public
[$priority](#evwatcher.props.priority);

    /* Métodos */

public
[\_\_construct](#evtimer.construct)(

    

    [float](#language.types.float) $after

,

    

    [float](#language.types.float) $repeat

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

)

    public

[again](#evtimer.again)(): [void](language.types.void.html)
final
public
static
[createStopped](#evtimer.createstopped)(

    

    [float](#language.types.float) $after

,

    

    [float](#language.types.float) $repeat

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvTimer](#class.evtimer)
public
[set](#evtimer.set)(

    [float](#language.types.float) $after

,

    [float](#language.types.float) $repeat

): [void](language.types.void.html)

    /* Métodos heredados */
    public

[EvWatcher::clear](#evwatcher.clear)(): [int](#language.types.integer)
public
[EvWatcher::feed](#evwatcher.feed)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::getLoop](#evwatcher.getloop)(): [EvLoop](#class.evloop)
public
[EvWatcher::invoke](#evwatcher.invoke)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[EvWatcher::keepalive](#evwatcher.keepalive)(

    [bool](#language.types.boolean) $value
    = ?): [bool](#language.types.boolean)

public
[EvWatcher::setCallback](#evwatcher.setcallback)(

    [callable](#language.types.callable) $callback

): [void](language.types.void.html)
public
[EvWatcher::start](#evwatcher.start)(): [void](language.types.void.html)
public
[EvWatcher::stop](#evwatcher.stop)(): [void](language.types.void.html)

}

## Propiedades

      repeat



       Si esta propiedad vale 0.0, entonces se detendrá automáticamente
       una vez alcanzado el tiempo de espera máximo. Si es positivo, entonces el temporizador
       se configurará automáticamente para ejecutarse cada segundo siguiente, hasta que
       no se detenga manualmente.







      remaining



       Devuelve el tiempo restante antes de que el temporizador se ejecute.
       Si el temporizador está activo, entonces este tiempo será relativo al tiempo
       del bucle de eventos actual, de lo contrario, será relativo al valor del
       tiempo de espera máximo configurado actualmente.




       Asimismo, después de instanciar un **EvTimer**
       con un valor de after en
       5.0 y un valor de repeat
       en 7.0, remaining devolverá
       5.0. Cuando el temporizador se inicia y pasa un
       segundo, remaining devolverá
       4.0. Cuando el temporizador expire y se reinicie,
       devolverá aproximadamente 7.0
       (probablemente un poco menos, ya que la invocación de la función de retrollamada
       también lleva algo de tiempo), y así sucesivamente.





# EvTimer::again

(PECL ev &gt;= 0.2.0)

EvTimer::again — Reinicia el watcher Timer

### Descripción

public
**EvTimer::again**(): [void](language.types.void.html)

Este método funciona como si el Timer hubiera terminado y reinicia su ciclo.
La semántica exacta es:

- si el Timer está en espera, su estado se limpia.

- si el Timer está en ejecución, pero no debe reiniciarse, entonces se detendrá
  (como si hubiera terminado normalmente).

- si el Timer debe reiniciarse, el método lo iniciará si es necesario (con el
  valor repeat), o reiniciará el Timer al valor de la
  variable repeat.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EvWatcher::stop()](#evwatcher.stop) - Detiene el Watcher

# EvTimer::\_\_construct

(PECL ev &gt;= 0.2.0)

EvTimer::\_\_construct — Construye un objeto EvTimer watcher

### Descripción

public
**EvTimer::\_\_construct**(

    

    [float](#language.types.float) $after

,

    

    [float](#language.types.float) $repeat

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

)

Construye un objeto EvTimer watcher.

### Parámetros

     after



      Configura el tiempo para lanzar el trigger después de
      after segundos.







     repeat



      Si este argumento vale 0.0, entonces el watcher
      se detendrá automáticamente cuando se alcance el tiempo máximo de espera. Si este argumento es positivo, entonces el timer lanzará automáticamente el trigger cada segundo siguiente, hasta que se detenga manualmente.







     callback



      Ver las
      [funciones de retrollamada Watcher](#ev.watcher-callbacks).







     data



      Datos personalizados asociados con el watcher.







     priority



      [Las prioridades del Watcher](#ev.constants.watcher-pri)


### Ejemplos

**Ejemplo #1 timers simples**

&lt;?php
// Crea e inicia un timer lanzado después de 2 segundos
$w1 = new EvTimer(2, 0, function () {
echo "2 segundos pasados\n";
});

// Crea e inicia un timer lanzado después de 2 segundos, y lo repite cada segundo
// hasta que no se detenga manualmente
$w2 = new EvTimer(2, 1, function ($w) {
echo "es llamado cada segundo, es iniciado después de 2 segundos\n";
echo "iteración = ", Ev::iteration(), PHP_EOL;

    // Detiene el watcher después de 5 iteraciones
    Ev::iteration() == 5 and $w-&gt;stop();
    // Detiene el watcher si llamadas posteriores causan más de 10 iteraciones
    Ev::iteration() &gt;= 10 and $w-&gt;stop();

});

// Crea un timer detenido. Estará inactivo hasta que no se inicie manualmente
$w_stopped = EvTimer::createStopped(10, 5, function($w) {
echo "Función de retrollamada del timer creado detenido\n";

    // Detiene el watcher después de 2 iteraciones
    Ev::iteration() &gt;= 2 and $w-&gt;stop();

});

// Bucle mientras Ev::stop() es llamado o mientras todos los watchers no se detienen
Ev::run();

// Inicia y bloquea si está en funcionamiento
$w_stopped-&gt;start();
echo "Ejecución de una sola iteración\n";
Ev::run(Ev::RUN_ONCE);

echo "Reinicia el segundo watcher y intenta manejar los mismos eventos, pero no bloquea\n";
$w2-&gt;again();
Ev::run(Ev::RUN_NOWAIT);

$w = new EvTimer(10, 0, function() {});
echo "Ejecución de un bucle bloqueante\n";
Ev::run();
echo "FIN\n";
?&gt;

Resultado del ejemplo anterior es similar a:

2 segundos pasados
es llamado cada segundo, es iniciado después de 2 segundos
iteración = 1
es llamado cada segundo, es iniciado después de 2 segundos
iteración = 2
es llamado cada segundo, es iniciado después de 2 segundos
iteración = 3
es llamado cada segundo, es iniciado después de 2 segundos
iteración = 4
es llamado cada segundo, es iniciado después de 2 segundos
iteración = 5
Ejecución de una sola iteración
Función de retrollamada del timer creado detenido
Reinicia el segundo watcher y intenta manejar los mismos eventos, pero no bloquea
Ejecución de un bucle bloqueante
es llamado cada segundo, es iniciado después de 2 segundos
iteración = 8
es llamado cada segundo, es iniciado después de 2 segundos
iteración = 9
es llamado cada segundo, es iniciado después de 2 segundos
iteración = 10
FIN

### Ver también

- [EvTimer::createStopped()](#evtimer.createstopped) - Crea un objeto EvTimer watcher detenido

- [EvPeriodic](#class.evperiodic)

- [» ev_timer - repetición de un tiempo de espera máximo](http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#code_ev_timer_code_relative_and_opti)

- [» Ser inteligente con los tiempos de espera máximo](http://pod.tst.eu/http://cvs.schmorp.de/libev/ev.pod#Be_smart_about_timeouts)

# EvTimer::createStopped

(PECL ev &gt;= 0.2.0)

EvTimer::createStopped — Crea un objeto EvTimer watcher detenido

### Descripción

final
public
static
**EvTimer::createStopped**(

    

    [float](#language.types.float) $after

,

    

    [float](#language.types.float) $repeat

,

    

    [callable](#language.types.callable) $callback

,

    

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $priority
     = 0

): [EvTimer](#class.evtimer)

Crea un objeto EvTimer watcher detenido. A diferencia del método
[EvTimer::\_\_construct()](#evtimer.construct), este método no
inicia automáticamente el watcher.

### Parámetros

     after



      Configura el tiempo para lanzar un trigger después de
      after segundos.







     repeat



      Si este parámetro vale 0.0, entonces el watcher
      se detendrá automáticamente una vez alcanzado el tiempo máximo de espera.
      Si este parámetro es positivo, entonces el timer lanzará automáticamente
      el trigger cada segundo siguiente, hasta que se detenga manualmente.







     callback



      Ver las
      [funciones de retrollamada Watcher](#ev.watcher-callbacks).







     data



      Datos personales asociados al watcher.







     priority



      [Las prioridades del Watcher](#ev.constants.watcher-pri)


### Valores devueltos

Retorna un objeto EvTimer watcher en caso de éxito.

### Ejemplos

**Ejemplo #1 Monitoreo de modificaciones en /var/log/messages.
Detecta actualizaciones olvidadas añadiendo un segundo de demora**

&lt;?php
$timer = EvTimer::createStopped(0., 1.02, function ($w) {
$w-&gt;stop();

    $stat = $w-&gt;data;

    // 1 segundo después de la modificación más reciente del fichero
    printf("Tamaño actual: %ld\n", $stat-&gt;attr()['size']);

});

$stat = new EvStat("/var/log/messages", 0., function () use ($timer) {
// Reinicia el watcher timer
$timer-&gt;again();
});

$timer-&gt;data = $stat;

Ev::run();
?&gt;

### Ver también

- [EvTimer::\_\_construct()](#evtimer.construct) - Construye un objeto EvTimer watcher

- [EvPeriodic](#class.evperiodic)

# EvTimer::set

(PECL ev &gt;= 0.2.0)

EvTimer::set — Configura el observador

### Descripción

public
**EvTimer::set**(

    [float](#language.types.float) $after

,

    [float](#language.types.float) $repeat

): [void](language.types.void.html)

Configura el observador

### Parámetros

     after



      Configura el temporizador del trigger para que se lance después de
      after segundos.







     repeat



      Si este argumento vale 0.0, entonces el observador será
      automáticamente detenido si se alcanza el tiempo de espera máximo.
      Si este argumento es positivo, entonces el temporizador lanzará automáticamente
      el trigger en cada segundo siguiente, hasta que no sea detenido manualmente.


### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [EvTimer::again](#evtimer.again) — Reinicia el watcher Timer
- [EvTimer::\_\_construct](#evtimer.construct) — Construye un objeto EvTimer watcher
- [EvTimer::createStopped](#evtimer.createstopped) — Crea un objeto EvTimer watcher detenido
- [EvTimer::set](#evtimer.set) — Configura el observador

# La clase EvWatcher

(PECL ev &gt;= 0.2.0)

## Introducción

    La clase **EvWatcher** es una clase base
    para todos los watchers ([EvCheck](#class.evcheck), [EvChild](#class.evchild)
    etc.). Dado que el constructor de la clase **EvWatcher**
    es abstracto, no se puede
    (y no se debe) crear objetos EvWatcher directamente.

## Sinopsis de la Clase

     ****




      abstract
      class **EvWatcher**

     {

    /* Propiedades */

     public
      [$is_active](#evwatcher.props.is-active);

    public
      [$data](#evwatcher.props.data);

    public
      [$is_pending](#evwatcher.props.is-pending);

    public
      [$priority](#evwatcher.props.priority);

    /* Métodos */

abstract
public
[\_\_construct](#evwatcher.construct)()

    public

[clear](#evwatcher.clear)(): [int](#language.types.integer)
public
[feed](#evwatcher.feed)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[getLoop](#evwatcher.getloop)(): [EvLoop](#class.evloop)
public
[invoke](#evwatcher.invoke)(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)
public
[keepalive](#evwatcher.keepalive)(

    [bool](#language.types.boolean) $value
    = ?): [bool](#language.types.boolean)

public
[setCallback](#evwatcher.setcallback)(

    [callable](#language.types.callable) $callback

): [void](language.types.void.html)
public
[start](#evwatcher.start)(): [void](language.types.void.html)
public
[stop](#evwatcher.stop)(): [void](language.types.void.html)

}

## Propiedades

      is_active



       *Solo lectura*. **[true](#constant.true)** si el watcher está
       activo, **[false](#constant.false)** en caso contrario.







      data



       Datos de usuario personalizados asociados con el watcher







      is_pending



       *Solo lectura*. Si el watcher está pendiente,
       es decir, si el watcher tiene eventos pendientes, pero su función
       de retrollamada aún no ha sido llamada, **[false](#constant.false)** en caso contrario. Mientras el
       watcher esté pendiente (pero no activo), otro *no puede*
       modificar sus prioridades.







      priority



       [int](#language.types.integer)
       Rango de **[Ev::MINPRI](#ev.constants.minpri)** a **[Ev::MAXPRI](#ev.constants.maxpri)**.
       Los watchers pendientes con una prioridad alta serán llamados
       antes que los watchers con una prioridad baja, pero la prioridad no puede
       hacer que un watcher nunca sea ejecutado (excepto para los watchers
       [EvIdle](#class.evidle)).
       Los watchers [EvIdle](#class.evidle) proporcionan funcionalidades
       para suprimir la invocación cuando hay eventos con una prioridad
       más alta pendientes.





# EvWatcher::clear

(PECL ev &gt;= 0.2.0)

EvWatcher::clear — Borra el estado de espera del observador

### Descripción

public
**EvWatcher::clear**(): [int](#language.types.integer)

Si el observador está en espera, este método borra su estado
de espera (pending) y devuelve su bitset
revents (como si su función de retrollamada hubiera sido invocada).
Si el observador no está en espera, este método no hará nada,
y devolverá 0.

Algunas veces, es útil interrogar un observador en lugar de esperar
a que su función de retrollamada sea invocada, y esto es precisamente lo que permite
hacer este método.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

En el caso de que el observador esté en espera, devuelve el bitset
revents, como si su [función de retrollamada](#ev.watcher-callbacks) fuera invocada.
De lo contrario, devuelve 0.

# EvWatcher::\_\_construct

(PECL ev &gt;= 0.2.0)

EvWatcher::\_\_construct — Constructor de objeto observador

### Descripción

abstract
public
**EvWatcher::\_\_construct**()

**EvWatcher::\_\_construct()** es un constructor
de objeto observador, implementado en las clases derivadas.

### Parámetros

Esta función no contiene ningún parámetro.

# EvWatcher::feed

(PECL ev &gt;= 0.2.0)

EvWatcher::feed — Alimenta los revents proporcionados en el bucle de eventos

### Descripción

public
**EvWatcher::feed**(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)

Alimenta los revents proporcionados en el bucle de eventos,
como si el evento especificado hubiera ocurrido en el observador.

### Parámetros

     revents



      Máscara de bits del observador
      [de recepción de eventos](#ev.constants.watcher-revents).


### Valores devueltos

No se retorna ningún valor.

# EvWatcher::getLoop

(PECL ev &gt;= 0.2.0)

EvWatcher::getLoop — Retorna el bucle responsable del observador

### Descripción

public
**EvWatcher::getLoop**(): [EvLoop](#class.evloop)

Retorna el bucle responsable del observador.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna un objeto [EvLoop](#class.evloop)
responsable del observador.

# EvWatcher::invoke

(PECL ev &gt;= 0.2.0)

EvWatcher::invoke — Invoca la función de retrollamada del observador con
el mascara de bits de los eventos recibidos proporcionados

### Descripción

public
**EvWatcher::invoke**(

    [int](#language.types.integer) $revents

): [void](language.types.void.html)

Invoca la función de retrollamada del observador con
el mascara de bits de los eventos recibidos proporcionados.

### Parámetros

     revents



      Mascara de bits del observador
      [que recibe los eventos](#ev.constants.watcher-revents).


### Valores devueltos

No se retorna ningún valor.

# EvWatcher::keepalive

(PECL ev &gt;= 0.2.0)

EvWatcher::keepalive — Mantiene el bucle activo

### Descripción

public
**EvWatcher::keepalive**(

    [bool](#language.types.boolean) $value
    = ?): [bool](#language.types.boolean)

Mantiene el bucle activo. Con un parámetro value
definido a **[false](#constant.false)**, el Watcher no evitará que los métodos
[Ev::run()](#ev.run)/[EvLoop::run()](#evloop.run)
se detengan incluso si el Watcher está activo.

Los Watchers tienen, por omisión, un parámetro
value definido a **[true](#constant.true)**.

Limpiar el estado "keepalive" es útil al regresar de los métodos
[Ev::run()](#ev.run)/[EvLoop::run()](#evloop.run),
en cuyo caso el Watcher ya no es deseado. Puede ser un Watcher de socket UDP
que continúa funcionando durante mucho tiempo.

### Parámetros

     value



      Si es **[false](#constant.false)**, el Watcher no evitará que los métodos
      [Ev::run()](#ev.run)/[EvLoop::run()](#evloop.run)
      terminen, incluso si el Watcher está activo.


### Valores devueltos

Devuelve el estado anterior.

### Ejemplos

**Ejemplo #1 Registra un Watcher E/S para sockets UDP**

&lt;?php
$udp_socket = ...
$udp_watcher = new EvIo($udp_socket, Ev::READ, function () { /* ... */ });
$udp_watcher-&gt;keepalive(FALSE);
?&gt;

# EvWatcher::setCallback

(PECL ev &gt;= 0.2.0)

EvWatcher::setCallback — Establece una nueva retrollamada para el watcher

### Descripción

public
**EvWatcher::setCallback**(

    [callable](#language.types.callable) $callback

): [void](language.types.void.html)

Establece una nueva retrollamada para el watcher.

### Parámetros

     callback



      Ver las
      [retrollamadas para los Watchers](#ev.watcher-callbacks).


### Valores devueltos

No se retorna ningún valor.

# EvWatcher::start

(PECL ev &gt;= 0.2.0)

EvWatcher::start — Inicia el Watcher

### Descripción

public
**EvWatcher::start**(): [void](language.types.void.html)

Marca el Watcher como activo. Tenga en cuenta que solo los Watchers activos
recibirán los eventos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EvWatcher::stop()](#evwatcher.stop) - Detiene el Watcher

# EvWatcher::stop

(PECL ev &gt;= 0.2.0)

EvWatcher::stop — Detiene el Watcher

### Descripción

public
**EvWatcher::stop**(): [void](language.types.void.html)

Marca el Watcher como inactivo. Tenga en cuenta que solo los Watchers activos
recibirán los eventos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EvWatcher::start()](#evwatcher.start) - Inicia el Watcher

## Tabla de contenidos

- [EvWatcher::clear](#evwatcher.clear) — Borra el estado de espera del observador
- [EvWatcher::\_\_construct](#evwatcher.construct) — Constructor de objeto observador
- [EvWatcher::feed](#evwatcher.feed) — Alimenta los revents proporcionados en el bucle de eventos
- [EvWatcher::getLoop](#evwatcher.getloop) — Retorna el bucle responsable del observador
- [EvWatcher::invoke](#evwatcher.invoke) — Invoca la función de retrollamada del observador con
  el mascara de bits de los eventos recibidos proporcionados
- [EvWatcher::keepalive](#evwatcher.keepalive) — Mantiene el bucle activo
- [EvWatcher::setCallback](#evwatcher.setcallback) — Establece una nueva retrollamada para el watcher
- [EvWatcher::start](#evwatcher.start) — Inicia el Watcher
- [EvWatcher::stop](#evwatcher.stop) — Detiene el Watcher

- [Introducción](#intro.ev)
- [Instalación/Configuración](#ev.setup)<li>[Requerimientos](#ev.requirements)
- [Instalación](#ev.installation)
  </li>- [Ejemplos](#ev.examples)
- [Watchers](#ev.watchers)
- [Las funciones de retrollamada de un Watcher](#ev.watcher-callbacks)
- [Modos de operación periódica de un watcher](#ev.periodic-modes)
- [Ev](#class.ev) — La clase Ev<li>[Ev::backend](#ev.backend) — Devuelve un integer que describe el backend utilizado por libev
- [Ev::depth](#ev.depth) — Retorna la profundidad de recursión
- [Ev::embeddableBackends](#ev.embeddablebackends) — Devuelve el conjunto de backends que pueden ser encapsulados en otros bucles de eventos
- [Ev::feedSignal](#ev.feedsignal) — Simula la recepción de una señal
- [Ev::feedSignalEvent](#ev.feedsignalevent) — Simula un evento de señal en el bucle por omisión
- [Ev::iteration](#ev.iteration) — Devuelve el número de veces que el bucle de eventos por omisión
  ha sido solicitado para un nuevo evento
- [Ev::now](#ev.now) — Devuelve el tiempo de inicio de la última iteración del bucle de eventos por omisión
- [Ev::nowUpdate](#ev.nowupdate) — Establece el tiempo actual solicitándolo al kernel; actualiza el
  tiempo devuelto por Ev::now durante la ejecución
- [Ev::recommendedBackends](#ev.recommendedbackends) — Devuelve una máscara de octetos de backends recomendados
  para la plataforma actual
- [Ev::resume](#ev.resume) — Reanuda el bucle de eventos por defecto previamente detenido
- [Ev::run](#ev.run) — Inicia la verificación de eventos y llama a las funciones de retrollamada para el bucle por defecto
- [Ev::sleep](#ev.sleep) — Bloquea el proceso durante un número de segundos proporcionado
- [Ev::stop](#ev.stop) — Detiene el bucle de eventos predeterminado
- [Ev::supportedBackends](#ev.supportedbackends) — Devuelve el conjunto de backends soportados por la configuración actual de libev
- [Ev::suspend](#ev.suspend) — Suspende el bucle de eventos predeterminado
- [Ev::time](#ev.time) — Devuelve el tiempo actual desde la época Unix
- [Ev::verify](#ev.verify) — Efectúa verificaciones internas de consistencia (para la depuración)
  </li>- [EvCheck](#class.evcheck) — La clase EvCheck<li>[EvCheck::__construct](#evcheck.construct) — Construye el objeto de observación EvCheck
- [EvCheck::createStopped](#evcheck.createstopped) — Crea una instancia de un observador EvCheck detenido
  </li>- [EvChild](#class.evchild) — La clase EvChild<li>[EvChild::__construct](#evchild.construct) — Construye el objeto de observación EvChild
- [EvChild::createStopped](#evchild.createstopped) — Crea una instancia del observador detenido EvCheck
- [EvChild::set](#evchild.set) — Configura el observador
  </li>- [EvEmbed](#class.evembed) — La clase EvEmbed<li>[EvEmbed::__construct](#evembed.construct) — Construye un objeto EvEmbed
- [EvEmbed::createStopped](#evembed.createstopped) — Crea un objeto EvEmbed watcher detenido
- [EvEmbed::set](#evembed.set) — Configura el watcher
- [EvEmbed::sweep](#evembed.sweep) — Barre, una sola vez y de forma no bloqueante, el bucle interno
  </li>- [EvFork](#class.evfork) — La clase EvFork<li>[EvFork::__construct](#evfork.construct) — Construye el objeto observador EvFork
- [EvFork::createStopped](#evfork.createstopped) — Crea una instancia detenida de la clase observadora EvFork
  </li>- [EvIdle](#class.evidle) — La clase EvIdle<li>[EvIdle::__construct](#evidle.construct) — Construye el objeto observador EvIdle
- [EvIdle::createStopped](#evidle.createstopped) — Crea una instancia de un objeto observador EvIdle
  </li>- [EvIo](#class.evio) — La clase EvIo<li>[EvIo::__construct](#evio.construct) — Construye un nuevo objeto EvIo
- [EvIo::createStopped](#evio.createstopped) — Crea un objeto observador EvIo detenido
- [EvIo::set](#evio.set) — Configura el observador
  </li>- [EvLoop](#class.evloop) — La clase EvLoop<li>[EvLoop::backend](#evloop.backend) — Retorna un integer que describe el backend utilizado por libev
- [EvLoop::check](#evloop.check) — Crea un objeto EvCheck asociado con la instancia del bucle de eventos actual
- [EvLoop::child](#evloop.child) — Crea un objeto EvChild asociado con el bucle de eventos actual
- [EvLoop::\_\_construct](#evloop.construct) — Construye un objeto de bucle de eventos
- [EvLoop::defaultLoop](#evloop.defaultloop) — Devuelve o crea el bucle de eventos por omisión
- [EvLoop::embed](#evloop.embed) — Crea una instancia del observador EvEmbed asociado con el objeto EvLoop actual
- [EvLoop::fork](#evloop.fork) — Crea un objeto EvFork watcher asociado con la instancia del bucle de eventos actual
- [EvLoop::idle](#evloop.idle) — Crea un objeto EvIdle watcher asociado con la instancia del bucle
  de eventos actual
- [EvLoop::invokePending](#evloop.invokepending) — Invoca todos los watchers pendientes mientras sus estados
  de cola no sean reinicializados
- [EvLoop::io](#evloop.io) — Crea un objeto EvIo watcher asociado con la instancia del bucle de eventos actual
- [EvLoop::loopFork](#evloop.loopfork) — Debe ser llamado después de un fork
- [EvLoop::now](#evloop.now) — Devuelve el "event loop time" actual
- [EvLoop::nowUpdate](#evloop.nowupdate) — Establece el tiempo actual solicitándolo al kernel y actualiza el tiempo devuelto por EvLoop::now durante la ejecución
- [EvLoop::periodic](#evloop.periodic) — Crea un objeto EvPeriodic watcher asociado con la instancia del
  bucle de eventos actual
- [EvLoop::prepare](#evloop.prepare) — Crea un objeto EvPrepare watcher asociado con la instancia del bucle de eventos actual
- [EvLoop::resume](#evloop.resume) — Reanuda un bucle de eventos previamente detenido
- [EvLoop::run](#evloop.run) — Comienza a verificar los eventos y a llamar a las funciones de retrollamada de la bucle
- [EvLoop::signal](#evloop.signal) — Crea un objeto EvSignal watcher asociado con la instancia del
  bucle de eventos actual
- [EvLoop::stat](#evloop.stat) — Crea un objeto EvStat watcher asociado con la instancia del bucle de eventos actual
- [EvLoop::stop](#evloop.stop) — Detiene el bucle de eventos
- [EvLoop::suspend](#evloop.suspend) — Suspende el bucle
- [EvLoop::timer](#evloop.timer) — Crea un objeto EvTimer watcher asociado con la instancia del bucle de eventos actual
- [EvLoop::verify](#evloop.verify) — Realiza verificaciones de consistencia interna (para la depuración)
  </li>- [EvPeriodic](#class.evperiodic) — La clase EvPeriodic<li>[EvPeriodic::again](#evperiodic.again) — Detiene y reinicia el observador periódico
- [EvPeriodic::at](#evperiodic.at) — Devuelve el tiempo absoluto en el que este watcher será llamado la próxima vez
- [EvPeriodic::\_\_construct](#evperiodic.construct) — Construye un objeto watcher EvPeriodic
- [EvPeriodic::createStopped](#evperiodic.createstopped) — Crea un watcher EvPeriodic detenido
- [EvPeriodic::set](#evperiodic.set) — Configura el watcher
  </li>- [EvPrepare](#class.evprepare) — La clase EvPrepare<li>[EvPrepare::__construct](#evprepare.construct) — Construye un objeto watcher EvPrepare
- [EvPrepare::createStopped](#evprepare.createstopped) — Crea una instancia detenida del watcher EvPrepare
  </li>- [EvSignal](#class.evsignal) — La clase EvSignal<li>[EvSignal::__construct](#evsignal.construct) — Construye un objeto watcher EvSignal
- [EvSignal::createStopped](#evsignal.createstopped) — Crea un objeto watcher EvSignal detenido
- [EvSignal::set](#evsignal.set) — Configura el observador
  </li>- [EvStat](#class.evstat) — La clase EvStat<li>[EvStat::attr](#evstat.attr) — Devuelve el valor más reciente detectado por Ev
- [EvStat::\_\_construct](#evstat.construct) — Construye un objeto EvStat watcher
- [EvStat::createStopped](#evstat.createstopped) — Crea un objeto EvStat watcher detenido
- [EvStat::prev](#evstat.prev) — Devuelve el conjunto anterior devuelto por EvStat::attr
- [EvStat::set](#evstat.set) — Configura el watcher
- [EvStat::stat](#evstat.stat) — Inicializa la llamada a stat
  </li>- [EvTimer](#class.evtimer) — La clase EvTimer<li>[EvTimer::again](#evtimer.again) — Reinicia el watcher Timer
- [EvTimer::\_\_construct](#evtimer.construct) — Construye un objeto EvTimer watcher
- [EvTimer::createStopped](#evtimer.createstopped) — Crea un objeto EvTimer watcher detenido
- [EvTimer::set](#evtimer.set) — Configura el observador
  </li>- [EvWatcher](#class.evwatcher) — La clase EvWatcher<li>[EvWatcher::clear](#evwatcher.clear) — Borra el estado de espera del observador
- [EvWatcher::\_\_construct](#evwatcher.construct) — Constructor de objeto observador
- [EvWatcher::feed](#evwatcher.feed) — Alimenta los revents proporcionados en el bucle de eventos
- [EvWatcher::getLoop](#evwatcher.getloop) — Retorna el bucle responsable del observador
- [EvWatcher::invoke](#evwatcher.invoke) — Invoca la función de retrollamada del observador con
  el mascara de bits de los eventos recibidos proporcionados
- [EvWatcher::keepalive](#evwatcher.keepalive) — Mantiene el bucle activo
- [EvWatcher::setCallback](#evwatcher.setcallback) — Establece una nueva retrollamada para el watcher
- [EvWatcher::start](#evwatcher.start) — Inicia el Watcher
- [EvWatcher::stop](#evwatcher.stop) — Detiene el Watcher
  </li>
