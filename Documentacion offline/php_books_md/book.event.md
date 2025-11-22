# Event

# Introducción

Esta es una extensión para planificar eficientemente las I/O, los tiempos
y los señales basados en eventos utilizando el mejor mecanismo I/O disponible
en una plataforma específica. Se trata de un portaje de libevent para la
infraestructura PHP.

**Nota**:

    Se observa que el soporte para Windows fue introducido en
    event-1.9.0.

La versión _1.0.0_ introduce una nueva API
orientada a objetos (rompiendo así la compatibilidad ascendente), así como
el soporte para libevent 2+, incluyendo las escuchas HTTP, DNS, OpenSSL
y eventos.

**Nota**:

    Se observa que event-1.0.0 y versiones superiores
    no son compatibles con versiones anteriores.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#event.requirements)
- [Instalación](#event.installation)

    ## Requerimientos

    Esta extensión requiere la biblioteca
    [» libevent](http://libevent.org/).
    La mayoría de las distribuciones modernas proporcionan paquetes
    para libevent.

    Las funcionalidades OpenSSL requieren la biblioteca
    [» OpenSSL](http://www.openssl.org/).

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/event](https://pecl.php.net/package/event).

# Ejemplos

**Ejemplo #1 Cliente HTTP simple**

&lt;?php
// Lectura de la función de retrollamada
function readcb($bev, $base) {
    //$input = $bev-&gt;input; //$bev-&gt;getInput();

    //$pos = $input-&gt;search("TTP");
    $pos = $bev-&gt;input-&gt;search("TTP");

    while (($n = $bev-&gt;input-&gt;remove($buf, 1024)) &gt; 0) {
        echo $buf;
    }

}

// Función de retrollamada del evento
function eventcb($bev, $events, $base) {
    if ($events &amp; EventBufferEvent::CONNECTED) {
echo "Conectado.\n";
} elseif ($events &amp; (EventBufferEvent::ERROR | EventBufferEvent::EOF)) {
        if ($events &amp; EventBufferEvent::ERROR) {
echo "error DNS : ", $bev-&gt;getDnsErrorString(), PHP_EOL;
}

        echo "Cierre\n";
        $base-&gt;exit();
        exit("¡Hecho!\n");
    }

}

if ($argc != 3) {
    echo &lt;&lt;&lt;EOS
Trivial HTTP 0.x client
Syntax: php {$argv[0]} [hostname] [resource]
Example: php {$argv[0]} www.google.com /

EOS;
exit();
}

$base = new EventBase();

$dns_base = new EventDnsBase($base, TRUE); // Se utiliza una resolución DNS asíncrona
if (!$dns_base) {
exit("Fallo en la inicialización de la base DNS\n");
}

$bev = new EventBufferEvent($base, /_ use internal socket _/ NULL,
EventBufferEvent::OPT_CLOSE_ON_FREE | EventBufferEvent::OPT_DEFER_CALLBACKS,
"readcb", /_ writecb _/ NULL, "eventcb"
);
if (!$bev) {
exit("Fallo en la creación del socket bufferevent\n");
}

//$bev-&gt;setCallbacks("readcb", /* writecb */ NULL, "eventcb", $base);
$bev-&gt;enable(Event::READ | Event::WRITE);

$output = $bev-&gt;output; //$bev-&gt;getOutput();
if (!$output-&gt;add(
    "GET {$argv[2]} HTTP/1.0\r\n".
"Host: {$argv[1]}\r\n".
"Connection: Close\r\n\r\n"
)) {
exit("Fallo en la adición de la petición en el buffer de salida\n");
}

if (!$bev-&gt;connectHost($dns_base, $argv[1], 80, EventUtil::AF_UNSPEC)) {
    exit("Conexión imposible al host {$argv[1]}\n");
}

$base-&gt;dispatch();
?&gt;

Resultado del ejemplo anterior es similar a:

Connected.
HTTP/1.1 301 Moved Permanently
Date: Fri, 01 Mar 2013 18:47:48 GMT
Location: http://www.google.co.uk/
Content-Type: text/html; charset=UTF-8
Cache-Control: public, max-age=2592000
Server: gws
Content-Length: 221
X-XSS-Protection: 1; mode=block
X-Frame-Options: SAMEORIGIN
Age: 133438
Expires: Sat, 30 Mar 2013 05:39:28 GMT
Connection: close

&lt;HTML&gt;&lt;HEAD&gt;&lt;meta http-equiv="content-type" content="text/html;charset=utf-8"&gt;
&lt;TITLE&gt;301 Moved&lt;/TITLE&gt;&lt;/HEAD&gt;&lt;BODY&gt;
&lt;H1&gt;301 Moved&lt;/H1&gt;
The document has moved
&lt;A HREF="http://www.google.co.uk/"&gt;here&lt;/A&gt;.
&lt;/BODY&gt;&lt;/HTML&gt;
Closing
Done

**Ejemplo #2 Cliente HTTP utilizando una resolución DNS asíncrona**

&lt;?php
/\*

-   1. Conexión a 127.0.0.1 en el puerto 80
- utilizando EventBufferEvent::connect().
-
-   2. Petición /index.cphp vía HTTP/1.0
- utilizando el buffer de salida.
-
-   3. Lectura asíncrona de la respuesta y la muestra en stdout.
       \*/

// Lectura de la función de retrollamada
function readcb($bev, $base) {
$input = $bev-&gt;getInput();

    while (($n = $input-&gt;remove($buf, 1024)) &gt; 0) {
        echo $buf;
    }

}

// Función de retrollamada del evento
function eventcb($bev, $events, $base) {
    if ($events &amp; EventBufferEvent::CONNECTED) {
echo "Conectado.\n";
} elseif ($events &amp; (EventBufferEvent::ERROR | EventBufferEvent::EOF)) {
        if ($events &amp; EventBufferEvent::ERROR) {
echo "Error DNS : ", $bev-&gt;getDnsErrorString(), PHP_EOL;
}

        echo "Cierre\n";
        $base-&gt;exit();
        exit("¡Hecho!\n");
    }

}

$base = new EventBase();

echo "paso n°1\n";
$bev = new EventBufferEvent($base, /_ use internal socket _/ NULL,
EventBufferEvent::OPT_CLOSE_ON_FREE | EventBufferEvent::OPT_DEFER_CALLBACKS);
if (!$bev) {
exit("Fallo en la creación del socket bufferevent\n");
}

echo "paso n°2\n";
$bev-&gt;setCallbacks("readcb", /* writecb */ NULL, "eventcb", $base);
$bev-&gt;enable(Event::READ | Event::WRITE);

echo "paso n°3\n";
// Envío de la petición
$output = $bev-&gt;getOutput();
if (!$output-&gt;add(
"GET /index.cphp HTTP/1.0\r\n".
"Connection: Close\r\n\r\n"
)) {
exit("Fallo en la adición de la petición en el buffer de salida\n");
}

/_ Conexión al host de forma síncrona.
Conocemos la IP, por lo que no se necesita resolución DNS. _/
if (!$bev-&gt;connect("127.0.0.1:80")) {
exit("Imposible conectar al host\n");
}

// Difunde los eventos pendientes
$base-&gt;dispatch();
?&gt;

**Ejemplo #3 Servidor de visualización**

&lt;?php
/\*

- Servidor de visualización simple basado en las escuchas de conexión libevent.
-
- Uso:
-   1. En un terminal, ejecute:
-
- $ php listener.php 9881
-
-   2. En otro terminal, abra una conexión, i.e. :
-
- $ nc 127.0.0.1 9881
-
-   3. Comience a escribir. El servidor debería repetir las entradas.
       \*/

class MyListenerConnection {
private $bev, $base;

    public function __destruct() {
        $this-&gt;bev-&gt;free();
    }

    public function __construct($base, $fd) {
        $this-&gt;base = $base;

        $this-&gt;bev = new EventBufferEvent($base, $fd, EventBufferEvent::OPT_CLOSE_ON_FREE);

        $this-&gt;bev-&gt;setCallbacks(array($this, "echoReadCallback"), NULL,
            array($this, "echoEventCallback"), NULL);

        if (!$this-&gt;bev-&gt;enable(Event::READ)) {
            echo "Fallo en la activación de READ\n";
            return;
        }
    }

    public function echoReadCallback($bev, $ctx) {
        // Copia todos los datos desde el buffer de entrada hacia el buffer de salida

        // Variante #1
        $bev-&gt;output-&gt;addBuffer($bev-&gt;input);

        /* Variante #2 */
        /*
        $input    = $bev-&gt;getInput();
        $output = $bev-&gt;getOutput();
        $output-&gt;addBuffer($input);
        */
    }

    public function echoEventCallback($bev, $events, $ctx) {
        if ($events &amp; EventBufferEvent::ERROR) {
            echo "Error desde bufferevent\n";
        }

        if ($events &amp; (EventBufferEvent::EOF | EventBufferEvent::ERROR)) {
            //$bev-&gt;free();
            $this-&gt;__destruct();
        }
    }

}

class MyListener {
public $base,
$listener,
$socket;
private $conn = array();

    public function __destruct() {
        foreach ($this-&gt;conn as &amp;$c) $c = NULL;
    }

    public function __construct($port) {
        $this-&gt;base = new EventBase();
        if (!$this-&gt;base) {
            echo "Imposible abrir la base del evento";
            exit(1);
        }

        // Variante #1
        /*
        $this-&gt;socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if (!socket_bind($this-&gt;socket, '0.0.0.0', $port)) {
            echo "Imposible enlazar el socket\n";
            exit(1);
        }
        $this-&gt;listener = new EventListener($this-&gt;base,
            array($this, "acceptConnCallback"), $this-&gt;base,
            EventListener::OPT_CLOSE_ON_FREE | EventListener::OPT_REUSEABLE,
            -1, $this-&gt;socket);
         */

        // Variante #2
         $this-&gt;listener = new EventListener($this-&gt;base,
             array($this, "acceptConnCallback"), $this-&gt;base,
             EventListener::OPT_CLOSE_ON_FREE | EventListener::OPT_REUSEABLE, -1,
             "0.0.0.0:$port");

        if (!$this-&gt;listener) {
            echo "Imposible crear el oyente";
            exit(1);
        }

        $this-&gt;listener-&gt;setErrorCallback(array($this, "accept_error_cb"));
    }

    public function dispatch() {
        $this-&gt;base-&gt;dispatch();
    }

    // Esta función de retrollamada es llamada cuando hay datos para leer en $bev
    public function acceptConnCallback($listener, $fd, $address, $ctx) {
        // ¡Tenemos una nueva conexión! Se define un bufferevent para ella. */
        $base = $this-&gt;base;
        $this-&gt;conn[] = new MyListenerConnection($base, $fd);
    }

    public function accept_error_cb($listener, $ctx) {
        $base = $this-&gt;base;

        fprintf(STDERR, "Se recibe un error %d (%s) en el oyente. "
            ."Cerrando.\n",
            EventUtil::getLastSocketErrno(),
            EventUtil::getLastSocketError());

        $base-&gt;exit(NULL);
    }

}

$port = 9808;

if ($argc &gt; 1) {
    $port = (int) $argv[1];
}
if ($port &lt;= 0 || $port &gt; 65535) {
exit("Puerto inválido");
}

$l = new MyListener($port);
$l-&gt;dispatch();
?&gt;

**Ejemplo #4 Servidor de visualización SSL**

&lt;?php
/\*

- Servidor de visualización SSL
-
- Para probar:
-   1. Ejecute:
- $ php examples/ssl-echo-server/server.php 9998
-
-   2. en otro terminal, ejecute:
- $ socat - SSL:127.0.0.1:9998,verify=1,cafile=examples/ssl-echo-server/cert.pem
  \*/

class MySslEchoServer {
public $port,
$base,
$bev,
$listener,
$ctx;

    function __construct ($port, $host = "127.0.0.1") {
        $this-&gt;port = $port;
        $this-&gt;ctx = $this-&gt;init_ssl();
        if (!$this-&gt;ctx) {
            exit("Fallo en la creación del contexto SSL\n");
        }

        $this-&gt;base = new EventBase();
        if (!$this-&gt;base) {
            exit("Imposible abrir la base del evento\n");
        }

        $this-&gt;listener = new EventListener($this-&gt;base,
            array($this, "ssl_accept_cb"), $this-&gt;ctx,
            EventListener::OPT_CLOSE_ON_FREE | EventListener::OPT_REUSEABLE,
            -1, "$host:$port");
        if (!$this-&gt;listener) {
            exit("Imposible crear el oyente\n");
        }

        $this-&gt;listener-&gt;setErrorCallback(array($this, "accept_error_cb"));
    }
    function dispatch() {
        $this-&gt;base-&gt;dispatch();
    }

    // Esta función de retrollamada es llamada cuando hay datos para leer en $bev.
    function ssl_read_cb($bev, $ctx) {
        $in = $bev-&gt;input; //$bev-&gt;getInput();

        printf("Recepción de %zu bytes\n", $in-&gt;length);
        printf("----- datos ----\n");
        printf("%ld:\t%s\n", (int) $in-&gt;length, $in-&gt;pullup(-1));

        $bev-&gt;writeBuffer($in);
    }

    // Esta función de retrollamada es llamada cuando ocurren errores en el oyente de eventos,
    // i.e. la conexión se cierra, o ocurre un error
    function ssl_event_cb($bev, $events, $ctx) {
        if ($events &amp; EventBufferEvent::ERROR) {
            // Recupera los errores desde la pila de errores SSL
            while ($err = $bev-&gt;sslError()) {
                fprintf(STDERR, "Error Bufferevent %s.\n", $err);
            }
        }

        if ($events &amp; (EventBufferEvent::EOF | EventBufferEvent::ERROR)) {
            $bev-&gt;free();
        }
    }

    // Esta función de retrollamada es llamada cuando un cliente acepta una nueva conexión
    function ssl_accept_cb($listener, $fd, $address, $ctx) {
        // ¡Tenemos una nueva conexión! Se define un bufferevent para ella.
        $this-&gt;bev = EventBufferEvent::sslSocket($this-&gt;base, $fd, $this-&gt;ctx,
            EventBufferEvent::SSL_ACCEPTING, EventBufferEvent::OPT_CLOSE_ON_FREE);

        if (!$this-&gt;bev) {
            echo "Fallo en la creación del buffer SSL\n";
            $this-&gt;base-&gt;exit(NULL);
            exit(1);
        }

        $this-&gt;bev-&gt;enable(Event::READ);
        $this-&gt;bev-&gt;setCallbacks(array($this, "ssl_read_cb"), NULL,
            array($this, "ssl_event_cb"), NULL);
    }

    // Esta función de retrollamada es llamada cuando se falla en definir una nueva conexión para un cliente
    function accept_error_cb($listener, $ctx) {
        fprintf(STDERR, "Se recibe un error %d (%s) en el oyente. "
            ."Cerrando.\n",
            EventUtil::getLastSocketErrno(),
            EventUtil::getLastSocketError());

        $this-&gt;base-&gt;exit(NULL);
    }

    // Inicializa las estructuras SSL; crea un EventSslContext
    // Opcionalmente, crea certificados autofirmados
    function init_ssl() {
        // Necesitamos la entropía. De lo contrario, no tiene sentido cifrar.
        if (!EventUtil::sslRandPoll()) {
            exit("Fallo de EventUtil::sslRandPoll\n");
        }

        $local_cert = __DIR__."/cert.pem";
        $local_pk   = __DIR__."/privkey.pem";

        if (!file_exists($local_cert) || !file_exists($local_pk)) {
            echo "Imposible leer $local_cert ni $local_pk archivo. Para generar una clave\n",
                "y un certificado autofirmado, ejecute :\n",
                "  openssl genrsa -out $local_pk 2048\n",
                "  openssl req -new -key $local_pk -out cert.req\n",
                "  openssl x509 -req -days 365 -in cert.req -signkey $local_pk -out $local_cert\n";

            return FALSE;
        }

        $ctx = new EventSslContext(EventSslContext::SSLv3_SERVER_METHOD, array (
             EventSslContext::OPT_LOCAL_CERT  =&gt; $local_cert,
             EventSslContext::OPT_LOCAL_PK    =&gt; $local_pk,
             //EventSslContext::OPT_PASSPHRASE  =&gt; "echo server",
             EventSslContext::OPT_VERIFY_PEER =&gt; true,
             EventSslContext::OPT_ALLOW_SELF_SIGNED =&gt; false,
        ));

        return $ctx;
    }

}

// Permite el sobrescrito del puerto
$port = 9999;
if ($argc &gt; 1) {
$port = (int) $argv[1];
}
if ($port &lt;= 0 || $port &gt; 65535) {
exit("Puerto inválido\n");
}

$l = new MySslEchoServer($port);
$l-&gt;dispatch();
?&gt;

**Ejemplo #5 Manejador de señal**

&lt;?php
/\*
En un terminal, ejecute:

$ php examples/signal.php

En otro terminal, encuentre el pid y envíe la señal SIGTERM, i.e. :

$ ps aux | grep examp
ruslan 3976 0.2 0.0 139896 11256 pts/1 S+ 10:25 0:00 php examples/signal.php
ruslan 3978 0.0 0.0 9572 864 pts/2 S+ 10:26 0:00 grep --color=auto examp
$ kill -TERM 3976

En el primer terminal, debería capturar lo siguiente:

Se captura la señal 15
\*/
class MyEventSignal {
private $base;

    function __construct($base) {
        $this-&gt;base = $base;
    }

    function eventSighandler($no, $c) {
        echo "Se captura la señal $no\n";
        event_base_loopexit($c-&gt;base);
    }

}

$base = event_base_new();
$c = new MyEventSignal($base);
$no = SIGTERM;
$ev   = evsignal_new($base, $no, array($c,'eventSighandler'), $c);

evsignal_add($ev);

event_base_loop($base);
?&gt;

**Ejemplo #6 Uso de un bucle libevent para realizar las peticiones de la extensión `eio'**

&lt;?php
// Función de retrollamada para eio_nop()
function my_nop_cb($d, $r) {
echo "paso 6\n";
}

$dir = "/tmp/abc-eio-temp";
if (file_exists($dir)) {
rmdir($dir);
}

echo "paso 1\n";

$base = new EventBase();

echo "paso 2\n";

eio_init();

eio_mkdir($dir, 0750, EIO_PRI_DEFAULT, "my_nop_cb");

$event = new Event($base, eio_get_event_stream(),
Event::READ | Event::PERSIST, function ($fd, $events, $base) {
echo "paso 5\n";

    while (eio_nreqs()) {
        eio_poll();
    }

    $base-&gt;stop();

}, $base);

echo "paso 3\n";

$event-&gt;add();

echo "paso 4\n";

$base-&gt;dispatch();

echo "¡Hecho!\n";
?&gt;

**Ejemplo #7 Diversos**

&lt;?php
/_ {{{ Configuración y métodos soportados _/
echo "Métodos soportados :\n";
foreach (Event::getSupportedMethods() as $m) {
echo $m, PHP_EOL;
}

// Se desactiva el método "select"
$cfg = new EventConfig();
if ($cfg-&gt;avoidMethod("select")) {
echo "El método 'select' ha sido desactivado\n";
}

// Crea un event_base asociado a la configuración
$base = new EventBase($cfg);
echo "Método de evento utilizado : ", $base-&gt;getMethod(), PHP_EOL;

echo "Características :\n";
$features = $base-&gt;getFeatures();
($features &amp; EventConfig::FEATURE_ET) and print "ET - edge-triggered IO\n";
($features &amp; EventConfig::FEATURE_O1) and print "O1 - O(1) operation for adding/deleting events\n";
($features &amp; EventConfig::FEATURE_FDS) and print "FDS - arbitrary file descriptor types, and not just sockets\n";

// Requiere la característica FDS
if ($cfg-&gt;requireFeatures(EventConfig::FEATURE_FDS)) {
echo "La característica FDS es ahora requerida\n";

    $base = new EventBase($cfg);
    ($base-&gt;getFeatures() &amp; EventConfig::FEATURE_FDS)
        and print "FDS - tipo de descriptor de archivo arbitrario, y no solo los sockets\n";

}
/_ }}} _/

/_ {{{ Base _/
$base = new EventBase();
$event = new Event($base, STDIN, Event::READ | Event::PERSIST, function ($fd, $events, $arg) {
static $max_iterations = 0;

    if (++$max_iterations &gt;= 5) {
        /* se sale después de 5 iteraciones con un tiempo máximo de espera de 2.33 segundos */
        echo "Detención...\n";
        $arg[0]-&gt;exit(2.33);
    }

    echo fgets($fd);

}, array (&amp;$base));

$event-&gt;add();
$base-&gt;loop();
/_ Base }}} _/
?&gt;

**Ejemplo #8 Servidor HTTP simple**

&lt;?php
/\*

- Servidor HTTP simple.
-
- Para probarlo:
-   1. Ejecútelo en el puerto de su elección, i.e. :
- $ php examples/http.php 8010
-   2. En otro terminal, conéctese a una dirección de este puerto
- y realice peticiones GET o POST (los otros tipos están desactivados en este ejemplo), i.e. :
- $ nc -t 127.0.0.1 8010
- POST /about HTTP/1.0
- Content-Type: text/plain
- Content-Length: 4
- Connection: close
- (presione Enter)
-
- Debería mostrar:
- a=12
- HTTP/1.0 200 OK
- Content-Type: text/html; charset=ISO-8859-1
- Connection: close
-
- $ nc -t 127.0.0.1 8010
- GET /dump HTTP/1.0
- Content-Type: text/plain
- Content-Encoding: UTF-8
- Connection: close
- (presione Enter)
-
- Debería mostrar:
- HTTP/1.0 200 OK
- Content-Type: text/html; charset=ISO-8859-1
- Connection: close
-
- $ nc -t 127.0.0.1 8010
- GET /unknown HTTP/1.0
- Connection: close
-
- Debería mostrar:
- HTTP/1.0 200 OK
- Content-Type: text/html; charset=ISO-8859-1
- Connection: close
-
-   3. Ver lo que el servidor muestra en el terminal anterior.
       \*/

function \_http_dump($req, $data) {
static $counter = 0;
static $max_requests = 2;

    if (++$counter &gt;= $max_requests)  {
        echo "El contador ha alcanzado el número máximo de peticiones ($max_requests). ¡Salida!\n";
        exit();
    }

    echo __METHOD__, " llamada\n";
    echo "Petición :"; var_dump($req);
    echo "Datos :"; var_dump($data);

    echo "\n===== DUMP =====\n";
    echo "Comando :", $req-&gt;getCommand(), PHP_EOL;
    echo "URI :", $req-&gt;getUri(), PHP_EOL;
    echo "Encabezados de entrada :"; var_dump($req-&gt;getInputHeaders());
    echo "Encabezados de salida :"; var_dump($req-&gt;getOutputHeaders());

    echo "\n &gt;&gt; Enviando la respuesta ...";
    $req-&gt;sendReply(200, "OK");
    echo "OK\n";

    echo "\n &gt;&gt; Lectura del buffer de entrada ...\n";
    $buf = $req-&gt;getInputBuffer();
    while ($s = $buf-&gt;readLine(EventBuffer::EOL_ANY)) {
        echo $s, PHP_EOL;
    }
    echo "No hay más datos en el buffer\n";

}

function \_http_about($req) {
echo **METHOD**, PHP_EOL;
echo "URI : ", $req-&gt;getUri(), PHP_EOL;
echo "\n &gt;&gt; Enviando la respuesta ...";
$req-&gt;sendReply(200, "OK");
echo "OK\n";
}

function \_http_default($req, $data) {
echo **METHOD**, PHP_EOL;
echo "URI: ", $req-&gt;getUri(), PHP_EOL;
echo "\n &gt;&gt; Enviando la respuesta ...";
$req-&gt;sendReply(200, "OK");
echo "OK\n";
}

$port = 8010;
if ($argc &gt; 1) {
$port = (int) $argv[1];
}
if ($port &lt;= 0 || $port &gt; 65535) {
exit("Puerto inválido");
}

$base = new EventBase();
$http = new EventHttp($base);
$http-&gt;setAllowedMethods(EventHttpRequest::CMD_GET | EventHttpRequest::CMD_POST);

$http-&gt;setCallback("/dump", "_http_dump", array(4, 8));
$http-&gt;setCallback("/about", "\_http_about");
$http-&gt;setDefaultCallback("\_http_default", "valor de datos personalizados");

$http-&gt;bind("0.0.0.0", 8010);
$base-&gt;loop();
?&gt;

Resultado del ejemplo anterior es similar a:

a=12
HTTP/1.0 200 OK
Content-Type: text/html; charset=ISO-8859-1
Connection: close

HTTP/1.0 200 OK
Content-Type: text/html; charset=ISO-8859-1
Connection: close
(presione Enter)

HTTP/1.0 200 OK
Content-Type: text/html; charset=ISO-8859-1
Connection: close

**Ejemplo #9 Servidor HTTPS simple**

&lt;?php
/\*

- Servidor HTTPS simple.
-
-   1. Ejecute el servidor: `php examples/https.php 9999`
-   2. Pruébelo: `php examples/ssl-connection.php 9999`
       \*/

function \_http_dump($req, $data) {
static $counter = 0;
static $max_requests = 200;

    if (++$counter &gt;= $max_requests)  {
        echo "El contador ha alcanzado el número máximo de peticiones ($max_requests). Salida\n";
        exit();
    }

    echo __METHOD__, " llamada\n";
    echo "Petición :"; var_dump($req);
    echo "Datos :"; var_dump($data);

    echo "\n===== DUMP =====\n";
    echo "Comando :", $req-&gt;getCommand(), PHP_EOL;
    echo "URI :", $req-&gt;getUri(), PHP_EOL;
    echo "Encabezados de entrada :"; var_dump($req-&gt;getInputHeaders());
    echo "Encabezados de salida :"; var_dump($req-&gt;getOutputHeaders());

    echo "\n &gt;&gt; Enviando la respuesta ...";
    $req-&gt;sendReply(200, "OK");
    echo "OK\n";

    $buf = $req-&gt;getInputBuffer();
    echo "\n &gt;&gt; Lectura del buffer de entrada (", $buf-&gt;length, ") ...\n";
    while ($s = $buf-&gt;read(1024)) {
        echo $s;
    }
    echo "\nNo hay más datos en el buffer\n";

}

function \_http_about($req) {
echo **METHOD**, PHP_EOL;
echo "URI : ", $req-&gt;getUri(), PHP_EOL;
echo "\n &gt;&gt; Enviando la respuesta ...";
$req-&gt;sendReply(200, "OK");
echo "OK\n";
}

function \_http_default($req, $data) {
echo **METHOD**, PHP_EOL;
echo "URI: ", $req-&gt;getUri(), PHP_EOL;
echo "\n &gt;&gt; Enviando la respuesta ...";
$req-&gt;sendReply(200, "OK");
echo "OK\n";
}

function \_http_400($req) {
$req-&gt;sendError(400);
}

function \_init_ssl() {
$local_cert = **DIR**."/ssl-echo-server/cert.pem";
$local_pk = **DIR**."/ssl-echo-server/privkey.pem";

    $ctx = new EventSslContext(EventSslContext::SSLv3_SERVER_METHOD, array (
        EventSslContext::OPT_LOCAL_CERT  =&gt; $local_cert,
        EventSslContext::OPT_LOCAL_PK    =&gt; $local_pk,
        //EventSslContext::OPT_PASSPHRASE  =&gt; "test",
        EventSslContext::OPT_ALLOW_SELF_SIGNED =&gt; true,
    ));

    return $ctx;

}

$port = 9999;
if ($argc &gt; 1) {
$port = (int) $argv[1];
}
if ($port &lt;= 0 || $port &gt; 65535) {
    exit("Puerto inválido");
}
$ip = '0.0.0.0';

$base = new EventBase();
$ctx = \_init_ssl();
$http = new EventHttp($base, $ctx);
$http-&gt;setAllowedMethods(EventHttpRequest::CMD_GET | EventHttpRequest::CMD_POST);

$http-&gt;setCallback("/dump", "_http_dump", array(4, 8));
$http-&gt;setCallback("/about", "\_http_about");
$http-&gt;setCallback("/err400", "_http_400");
$http-&gt;setDefaultCallback("\_http_default", "Valor de los datos personalizados");

$http-&gt;bind($ip, $port);
$base-&gt;dispatch();

**Ejemplo #10 Conexión OpenSSL**

&lt;?php
/\*

- Ejemplo de Cliente OpenSSL.
-
- Uso:
-   1. Ejecute un servidor, i.e. :
- $ php examples/https.php 9999
-
-   2. Lance el cliente en otro terminal:
- $ php examples/ssl-connection.php 9999
  \*/

function \_request_handler($req, $base) {
echo **FUNCTION**, PHP_EOL;

    if (is_null($req)) {
        echo "Tiempo máximo de espera alcanzado\n";
    } else {
        $response_code = $req-&gt;getResponseCode();

        if ($response_code == 0) {
            echo "Conexión rechazada\n";
        } elseif ($response_code != 200) {
            echo "Respuesta inesperada : $response_code\n";
        } else {
            echo "Éxito : $response_code\n";
            $buf = $req-&gt;getInputBuffer();
            echo "Cuerpo :\n";
            while ($s = $buf-&gt;readLine(EventBuffer::EOL_ANY)) {
                echo $s, PHP_EOL;
            }
        }
    }

    $base-&gt;exit(NULL);

}

function \_init_ssl() {
$ctx = new EventSslContext(EventSslContext::SSLv3_CLIENT_METHOD, array ());

    return $ctx;

}

// Permite el sobrescrito del puerto
$port = 9999;
if ($argc &gt; 1) {
$port = (int) $argv[1];
}
if ($port &lt;= 0 || $port &gt; 65535) {
    exit("Puerto inválido\n");
}
$host = '127.0.0.1';

$ctx = _init_ssl();
if (!$ctx) {
trigger_error("Fallo en la creación del contexto SSL", E_USER_ERROR);
}

$base = new EventBase();
if (!$base) {
trigger_error("Fallo en la inicialización de la base de evento", E_USER_ERROR);
}

$conn = new EventHttpConnection($base, NULL, $host, $port, $ctx);
$conn-&gt;setTimeout(50);

$req = new EventHttpRequest("_request_handler", $base);
$req-&gt;addHeader("Host", $host, EventHttpRequest::OUTPUT_HEADER);
$buf = $req-&gt;getOutputBuffer();
$buf-&gt;add("&lt;html&gt;HTML TEST&lt;/html&gt;");
//$req-&gt;addHeader("Content-Length", $buf-&gt;length, EventHttpRequest::OUTPUT_HEADER);
//$req-&gt;addHeader("Connection", "close", EventHttpRequest::OUTPUT_HEADER);
$conn-&gt;makeRequest($req, EventHttpRequest::CMD_POST, "/dump");

$base-&gt;dispatch();
echo "FIN\n";
?&gt;

**Ejemplo #11
Ejemplo con [EventHttpConnection::makeRequest()](#eventhttpconnection.makerequest)**

&lt;?php
function \_request_handler($req, $base) {
echo **FUNCTION**, PHP_EOL;

    if (is_null($req)) {
        echo "Tiempo máximo de espera alcanzado\n";
    } else {
        $response_code = $req-&gt;getResponseCode();

        if ($response_code == 0) {
            echo "Conexión rechazada\n";
        } elseif ($response_code != 200) {
            echo "Respuesta inesperada : $response_code\n";
        } else {
            echo "Éxito : $response_code\n";
            $buf = $req-&gt;getInputBuffer();
            echo "Cuerpo :\n";
            while ($s = $buf-&gt;readLine(EventBuffer::EOL_ANY)) {
                echo $s, PHP_EOL;
            }
        }
    }

    $base-&gt;exit(NULL);

}

$address = "127.0.0.1";
$port = 80;

$base = new EventBase();
$conn = new EventHttpConnection($base, NULL, $address, $port);
$conn-&gt;setTimeout(5);
$req = new EventHttpRequest("\_request_handler", $base);

$req-&gt;addHeader("Host", $address, EventHttpRequest::OUTPUT_HEADER);
$req-&gt;addHeader("Content-Length", "0", EventHttpRequest::OUTPUT_HEADER);
$conn-&gt;makeRequest($req, EventHttpRequest::CMD_GET, "/index.cphp");

$base-&gt;loop();
?&gt;

Resultado del ejemplo anterior es similar a:

\_request_handler
Éxito : 200
Cuerpo :
PHP, date:
2013-03-13T20:27:52+05:00

**Ejemplo #12 Escucha de una conexión basada en un socket de dominio Unix**

&lt;?php
/\*

- Servidor de escucha basado en un oyente de conexión libevent.
-
- Uso:
-   1. En un terminal, ejecute:
-
- $ php unix-domain-listener.php [ruta-al-socket]
-
-   2. En otro terminal, abra la conexión
- hacia el socket, i.e. :
-
- $ socat - GOPEN:/tmp/1.sock
-
-   3. Comience a escribir. El servidor debería repetir las entradas.
       \*/

class MyListenerConnection {
private $bev, $base;

    public function __destruct() {
        if ($this-&gt;bev) {
            $this-&gt;bev-&gt;free();
        }
    }

    public function __construct($base, $fd) {
        $this-&gt;base = $base;

        $this-&gt;bev = new EventBufferEvent($base, $fd, EventBufferEvent::OPT_CLOSE_ON_FREE);

        $this-&gt;bev-&gt;setCallbacks(array($this, "echoReadCallback"), NULL,
            array($this, "echoEventCallback"), NULL);

        if (!$this-&gt;bev-&gt;enable(Event::READ)) {
            echo "Fallo en la activación de READ\n";
            return;
        }
    }

    public function echoReadCallback($bev, $ctx) {
        // Copia todos los datos desde el buffer de entrada hacia el buffer de salida
        $bev-&gt;output-&gt;addBuffer($bev-&gt;input);
    }

    public function echoEventCallback($bev, $events, $ctx) {
        if ($events &amp; EventBufferEvent::ERROR) {
            echo "Error desde bufferevent\n";
        }

        if ($events &amp; (EventBufferEvent::EOF | EventBufferEvent::ERROR)) {
            $bev-&gt;free();
            $bev = NULL;
        }
    }

}

class MyListener {
public $base,
$listener,
$socket;
private $conn = array();

    public function __destruct() {
        foreach ($this-&gt;conn as &amp;$c) $c = NULL;
    }

    public function __construct($sock_path) {
        $this-&gt;base = new EventBase();
        if (!$this-&gt;base) {
            echo "No se pudo abrir la base de eventos";
            exit(1);
        }

        if (file_exists($sock_path)) {
            unlink($sock_path);
        }

         $this-&gt;listener = new EventListener($this-&gt;base,
             array($this, "acceptConnCallback"), $this-&gt;base,
             EventListener::OPT_CLOSE_ON_FREE | EventListener::OPT_REUSEABLE, -1,
             "unix:$sock_path");

        if (!$this-&gt;listener) {
            trigger_error("Imposible crear el oyente", E_USER_ERROR);
        }

        $this-&gt;listener-&gt;setErrorCallback(array($this, "accept_error_cb"));
    }

    public function dispatch() {
        $this-&gt;base-&gt;dispatch();
    }

    // Esta función de retrollamada será llamada cuando haya datos para leer en $bev
    public function acceptConnCallback($listener, $fd, $address, $ctx) {
        // ¡Tenemos una nueva conexión! Se define un bufferevent para ella. */
        $base = $this-&gt;base;
        $this-&gt;conn[] = new MyListenerConnection($base, $fd);
    }

    public function accept_error_cb($listener, $ctx) {
        $base = $this-&gt;base;

        fprintf(STDERR, "Se recibe un error %d (%s) en el oyente. "
            ."Cerrando.\n",
            EventUtil::getLastSocketErrno(),
            EventUtil::getLastSocketError());

        $base-&gt;exit(NULL);
    }

}

if ($argc &lt;= 1) {
    exit("La ruta hacia el socket no está proporcionada\n");
}
$sock_path = $argv[1];

$l = new MyListener($sock_path);
$l-&gt;dispatch();
?&gt;

**Ejemplo #13 Ejemplo de servidor SMTP**

&lt;?php
/\*

- Autor: Andrew Rose &lt;hello at andrewrose dot co dot uk&gt;
-
- Uso:
-   1. Prepare el certificado cert.pem y la clave privada privkey.pem.
-   2. Inicie el script del servidor
-   3. Abra la conexión TLS, i.e. :
-      $ openssl s_client -connect localhost:25 -starttls smtp -crlf
-   4. Comience a probar los comandos listados en el método `cmd` a continuación.
       \*/

class Handler {
public $domainName = FALSE;
public $connections = [];
public $buffers = [];
public $maxRead = 256000;

    public function __construct() {
        $this-&gt;ctx = new EventSslContext(EventSslContext::SSLv3_SERVER_METHOD, [
            EventSslContext::OPT_LOCAL_CERT  =&gt; 'cert.pem',
            EventSslContext::OPT_LOCAL_PK    =&gt; 'privkey.pem',
            //EventSslContext::OPT_PASSPHRASE  =&gt; '',
            EventSslContext::OPT_VERIFY_PEER =&gt; false, // cambiar a TRUE con certificados auténticos
            EventSslContext::OPT_ALLOW_SELF_SIGNED =&gt; true // cambiar a FALSE con certificados auténticos
        ]);

        $this-&gt;base = new EventBase();
        if (!$this-&gt;base) {
            exit("Imposible abrir la base del evento\n");
        }

        if (!$this-&gt;listener = new EventListener($this-&gt;base,
            [$this, 'ev_accept'],
            $this-&gt;ctx,
            EventListener::OPT_CLOSE_ON_FREE | EventListener::OPT_REUSEABLE,
            -1,
            '0.0.0.0:25'))
        {
            exit("Imposible crear el oyente\n");
        }

        $this-&gt;listener-&gt;setErrorCallback([$this, 'ev_error']);
        $this-&gt;base-&gt;dispatch();
    }

    public function ev_accept($listener, $fd, $address, $ctx) {
        static $id = 0;
        $id += 1;

        $this-&gt;connections[$id]['clientData'] = '';
        $this-&gt;connections[$id]['cnx'] = new EventBufferEvent($this-&gt;base, $fd,
            EventBufferEvent::OPT_CLOSE_ON_FREE);

        if (!$this-&gt;connections[$id]['cnx']) {
            echo "Fallo en la creación del buffer\n";
            $this-&gt;base-&gt;exit(NULL);
            exit(1);
        }

        $this-&gt;connections[$id]['cnx']-&gt;setCallbacks([$this, "ev_read"], NULL,
            [$this, 'ev_error'], $id);
        $this-&gt;connections[$id]['cnx']-&gt;enable(Event::READ | Event::WRITE);

        $this-&gt;ev_write($id, '220 '.$this-&gt;domainName." wazzzap?\r\n");
    }

    function ev_error($listener, $ctx) {
        $errno = EventUtil::getLastSocketErrno();

        fprintf(STDERR, "Se recibe el error %d (%s) en el oyente. Detención.\n",
            $errno, EventUtil::getLastSocketError());

        if ($errno != 0) {
            $this-&gt;base-&gt;exit(NULL);
            exit();
        }
    }

    public function ev_close($id) {
        $this-&gt;connections[$id]['cnx']-&gt;disable(Event::READ | Event::WRITE);
        unset($this-&gt;connections[$id]);
    }

    protected function ev_write($id, $string) {
        echo 'S('.$id.'): '.$string;
        $this-&gt;connections[$id]['cnx']-&gt;write($string);
    }

    public function ev_read($buffer, $id) {
        while($buffer-&gt;input-&gt;length &gt; 0) {
            $this-&gt;connections[$id]['clientData'] .= $buffer-&gt;input-&gt;read($this-&gt;maxRead);
            $clientDataLen = strlen($this-&gt;connections[$id]['clientData']);

            if($this-&gt;connections[$id]['clientData'][$clientDataLen-1] == "\n"
                &amp;&amp; $this-&gt;connections[$id]['clientData'][$clientDataLen-2] == "\r")
            {
                // Elimina los caracteres \r\n al final
                $line = substr($this-&gt;connections[$id]['clientData'], 0,
                    strlen($this-&gt;connections[$id]['clientData']) - 2);

                $this-&gt;connections[$id]['clientData'] = '';
                $this-&gt;cmd($buffer, $id, $line);
            }
        }
    }

    protected function cmd($buffer, $id, $line) {
        switch ($line) {
            case strncmp('EHLO ', $line, 4):
                $this-&gt;ev_write($id, "250-STARTTLS\r\n");
                $this-&gt;ev_write($id, "250 OK ehlo\r\n");
                break;

            case strncmp('HELO ', $line, 4):
                $this-&gt;ev_write($id, "250-STARTTLS\r\n");
                $this-&gt;ev_write($id, "250 OK helo\r\n");
                break;

            case strncmp('QUIT', $line, 3):
                $this-&gt;ev_write($id, "250 OK quit\r\n");
                $this-&gt;ev_close($id);
                break;

            case strncmp('STARTTLS', $line, 3):
                $this-&gt;ev_write($id, "220 Ready to start TLS\r\n");
                $this-&gt;connections[$id]['cnx'] = EventBufferEvent::sslFilter($this-&gt;base,
                    $this-&gt;connections[$id]['cnx'], $this-&gt;ctx,
                    EventBufferEvent::SSL_ACCEPTING,
                    EventBufferEvent::OPT_CLOSE_ON_FREE);
                $this-&gt;connections[$id]['cnx']-&gt;setCallbacks([$this, "ev_read"], NULL, [$this, 'ev_error'], $id);
                $this-&gt;connections[$id]['cnx']-&gt;enable(Event::READ | Event::WRITE);
                break;

            default:
                echo 'Comando desconocido : '.$line."\n";
                break;
        }
    }

}

new Handler();

# Los flags de eventos

**[Event::READ](#event.constants.read)**
Este flag indica que el evento se activa cuando el descriptor de fichero proporcionado (generalmente un recurso de flujo o un socket) está listo para ser leído.

**[Event::WRITE](#event.constants.write)**
Este flag indica que el evento se activa cuando el descriptor de fichero proporcionado (generalmente un recurso de flujo o un socket) está listo para ser leído.

**[Event::SIGNAL](#event.constants.signal)**
Este flag se utiliza para implementar la detección de señales. Ver la creación de un evento de tipo señal a continuación.

**[Event::TIMEOUT](#event.constants.timeout)**
Este flag indica que el evento se activa después de la expiración de un tiempo límite. El flag **[Event::TIMEOUT](#event.constants.timeout)** se ignora durante la construcción de un evento: un tiempo límite puede ser definido al _añadir_ el evento, o no. Se define en el argumento $what de la función de retrollamada cuando se alcanza el tiempo límite.

Ver también
[» 
la programación de red fácil, portable y no bloqueante con Libevent; los trabajos con los eventos y sus flags](http://www.wangafu.net/~nickm/libevent-book/Ref4_event.html#_the_event_flags)

# Acerca de la persistencia de eventos

Por omisión, tan pronto como un evento pendiente se vuelve activo (porque su descriptor de fichero está listo para ser leído o escrito, o porque su tiempo de espera máximo ha sido alcanzado), ya no está pendiente una vez que su función de retrollamada es ejecutada. Asimismo, para volver a poner el evento en estado pendiente, una manera es llamar al método [Event::add()](#event.add) en la función de retrollamada.

Si el flag **[Event::PERSIST](#event.constants.persist)** está definido en el evento, entonces es _persistente_. Esto significa que el evento permanece en estado pendiente incluso cuando su función de retrollamada es activada. El método [Event::del()](#event.del) puede ser llamado para pasarlo a estado no pendiente.

El tiempo de espera máximo en un evento persistente es reinicializado tan pronto como su función de retrollamada es ejecutada. Así, si un evento tiene los flags **[Event::READ](#event.constants.read)** | **[Event::PERSIST](#event.constants.persist)** y un tiempo de espera fijado a 5 segundos, el evento se vuelve activo:

- Cuando el socket o el descriptor de fichero está listo para la lectura.

- Cuando han pasado 5 segundos desde la última activación del evento.

Ver también
[» 
la programación de red rápida, portable y no bloqueante con Libevent; Acerca de los eventos persistentes](http://www.wangafu.net/~nickm/libevent-book/Ref4_event.html#_about_event_persistence)

# Funciones de retrollamada de eventos

Si una función de retrollamada está registrada para un evento, será llamada cuando el evento se active. Para asociar una función de retrollamada con un evento, se debe pasar con un tipo [callable](#language.types.callable) al método [Event::\_\_construct()](#event.construct), [Event::set()](#event.set), o cualquier otro método factorial como [Event::timer()](#event.timer).

Una función de retrollamada de evento debe corresponder al siguiente prototipo:

**callback**(

[mixed](#language.types.mixed) $fd
= **[null](#constant.null)**
,

[int](#language.types.integer) $what
= ?,

[mixed](#language.types.mixed) $arg
= **[null](#constant.null)**
): [void](language.types.void.html)

     fd



      Un descriptor de fichero, un recurso de flujo, o un socket asociado con el evento. Para los eventos de tipo señal, fd corresponde al número de la señal.







     what



      Máscara de bits de *todos* los eventos lanzados.







     arg



      Datos de usuario personalizados.


El método [Event::timer()](#event.timer) espera una función de retrollamada que corresponda al siguiente prototipo:

**callback**(

[mixed](#language.types.mixed) $arg
= **[null](#constant.null)**
): [void](language.types.void.html)

     arg



      Datos de usuario personalizados.


El método [Event::signal()](#event.signal) espera una función de retrollamada que corresponda al siguiente prototipo:

**callback**(

[int](#language.types.integer) $signum
= ?,

[mixed](#language.types.mixed) $arg
= **[null](#constant.null)**
): [void](language.types.void.html)

     signum



      El número de la señal lanzada (i.e. **[SIGTERM](#constant.sigterm)**).







     arg



      Datos de usuario personalizados.


# Construcción de un evento de tipo señal

Un evento puede también supervisar las señales de estilo POSIX.
Para construir un gestor para una señal, utilice el método
[Event::\_\_construct()](#event.construct) con el flag
**[Event::SIGNAL](#event.constants.signal)** o el método factorial
[Event::signal()](#event.signal).

**Ejemplo #1 Gestión de una señal SIGTERM**

&lt;?php
/\*
Ejecute este ejemplo en un terminal:

$ php examples/signal.php

En otro terminal, encuentre el pid y envíe la señal SIGTERM, es decir:

$ ps aux | grep examp
ruslan 3976 0.2 0.0 139896 11256 pts/1 S+ 10:25 0:00 php examples/signal.php
ruslan 3978 0.0 0.0 9572 864 pts/2 S+ 10:26 0:00 grep --color=auto examp
$ kill -TERM 3976

En el primer terminal, debería capturar lo siguiente:

Caught signal 15
\*/
class MyEventSignal {
private $base, $ev;

    public function __construct($base) {
        $this-&gt;base = $base;
        $this-&gt;ev = Event::signal($base, SIGTERM, array($this, 'eventSighandler'));
        $this-&gt;ev-&gt;add();
    }

    public function eventSighandler($no, $c) {
        echo "Caught signal $no\n";
        $this-&gt;base-&gt;exit();
    }

}

$base = new EventBase();
$c = new MyEventSignal($base);

$base-&gt;loop();
?&gt;

Tenga en cuenta que las funciones de retrollamada de una señal se ejecutan en el bucle de eventos después de que la señal haya ocurrido, por lo tanto, es más seguro para la señal llamar a funciones desde el bucle que no se supone que se llamen desde un gestor de señales POSIX clásico.

Véase también la
[» 
programación de red fácil, portable y no bloqueante con Libevent; Construcción de un evento de tipo señal](http://www.wangafu.net/~nickm/libevent-book/Ref4_event.html#_constructing_signal_events).

# La clase Event

(PECL event &gt;= 1.2.6-beta)

## Introducción

    La clase **Event** representa y lanza un evento
    sobre un descriptor de fichero que se ha vuelto listo para una lectura o una escritura;
    un descriptor de fichero se vuelve listo para una lectura o una escritura
    (I/O únicamente); un tiempo de espera expirado; una señal ocurriendo;
    un evento lanzado por el usuario.




    Cada evento está asociado con un [EventBase](#class.eventbase).
    Sin embargo, el evento nunca será lanzado hasta que no haya sido
    *añadido* (a través del método [Event::add()](#event.add)).
    Un evento añadido permanece en un estado de *espera*
    hasta que el evento registrado ocurra, pasándolo así a un estado *activo*. Para gestionar los eventos, el usuario
    debe registrar una función de retrollamada que será llamada cuando el evento
    se vuelva activo. Si el evento está configurado como *persistente*,
    permanecerá en espera. Si no es persistente, ya no estará en espera
    cuando su función de retrollamada sea ejecutada. El método [Event::del()](#event.del)
    *elimina* el evento, y ya no estará en espera.
    Al llamar al método [Event::add()](#event.add), será añadido
    de nuevo.

## Sinopsis de la Clase

     ****




      final
      class **Event**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [ET](#event.constants.et) = 32;

    const
     [int](#language.types.integer)
      [PERSIST](#event.constants.persist) = 16;

    const
     [int](#language.types.integer)
      [READ](#event.constants.read) = 2;

    const
     [int](#language.types.integer)
      [WRITE](#event.constants.write) = 4;

    const
     [int](#language.types.integer)
      [SIGNAL](#event.constants.signal) = 8;

    const
     [int](#language.types.integer)
      [TIMEOUT](#event.constants.timeout) = 1;

    /* Propiedades */
    public
     readonly
     [bool](#language.types.boolean)
      [$pending](#event.props.pending);

    /* Métodos */

public
[add](#event.add)(

    [float](#language.types.float) $timeout
    = ?): [bool](#language.types.boolean)

public
[\_\_construct](#event.construct)(

    

    [EventBase](#class.eventbase) $base

,

    

    [mixed](#language.types.mixed) $fd

,

    

    [int](#language.types.integer) $what

,

    

    [callable](#language.types.callable) $cb

,

    

    [mixed](#language.types.mixed) $arg
     = NULL

)
public
[del](#event.del)(): [bool](#language.types.boolean)
public
[free](#event.free)(): [void](language.types.void.html)
public
static
[getSupportedMethods](#event.getsupportedmethods)(): [array](#language.types.array)
public
[pending](#event.pending)(

    [int](#language.types.integer) $flags

): [bool](#language.types.boolean)
public
[set](#event.set)(

    

    [EventBase](#class.eventbase) $base

,

    

    [mixed](#language.types.mixed) $fd

,

    

    [int](#language.types.integer) $what
    = ?,

    

    [callable](#language.types.callable) $cb
    = ?,

    

    [mixed](#language.types.mixed) $arg
    = ?

): [bool](#language.types.boolean)
public
[setPriority](#event.setpriority)(

    [int](#language.types.integer) $priority

): [bool](#language.types.boolean)
public
[setTimer](#event.settimer)(

    [EventBase](#class.eventbase) $base

,

    [callable](#language.types.callable) $cb

,

    [mixed](#language.types.mixed) $arg
    = ?): [bool](#language.types.boolean)

public
static
[signal](#event.signal)(

    

    [EventBase](#class.eventbase) $base

,

    

    [int](#language.types.integer) $signum

,

    

    [callable](#language.types.callable) $cb

,

    

    [mixed](#language.types.mixed) $arg
    = ?

): [Event](#class.event)
public
static
[timer](#event.timer)(

    [EventBase](#class.eventbase) $base

,

    [callable](#language.types.callable) $cb

,

    [mixed](#language.types.mixed) $arg
    = ?): [Event](#class.event)

}

## Propiedades

      pending



       Si el evento está en espera. Ver la sección :
       [Acerca de la persistencia de los eventos](#event.persistence).





## Constantes predefinidas

      **[Event::ET](#event.constants.et)**



       Indica que el evento debe ser lanzado, si la base de evento
       subyacente soporta este tipo de evento. Esto afecta la semántica
       de **[Event::READ](#event.constants.read)** y de **[Event::WRITE](#event.constants.write)**.







      **[Event::PERSIST](#event.constants.persist)**



       Indica que el evento es persistente. Ver la sección :
       [Acerca de la persistencia de los eventos](#event.persistence).







      **[Event::READ](#event.constants.read)**



       Este flag indica que un evento se vuelve activo cuando el descriptor
       de fichero proporcionado (normalmente, un recurso de flujo o un socket)
       está listo para una lectura.







      **[Event::WRITE](#event.constants.write)**



       Este flag indica que un evento se vuelve activo cuando el descriptor
       de fichero proporcionado (normalmente, un recurso de flujo o un socket)
       está listo para una escritura.







      **[Event::SIGNAL](#event.constants.signal)**



       Utilizado para implementar una detección de señal. Ver la sección a continuación
       sobre la construcción de un evento de tipo señal.







      **[Event::TIMEOUT](#event.constants.timeout)**



       Este flag indica que un evento se vuelve activo después de la expiración
       de este tiempo de espera máximo.




       El flag **[Event::TIMEOUT](#event.constants.timeout)** es ignorado durante la
       construcción de un evento: puede ser indicado o no durante la
       *adición* del evento. Debe ser definido en el argumento $what de la función de retrollamada
       cuando un tiempo de espera máximo haya ocurrido.





# Event::add

(PECL event &gt;= 1.2.6-beta)

Event::add — Pone un evento en espera

### Descripción

public
**Event::add**(

    [float](#language.types.float) $timeout
    = ?): [bool](#language.types.boolean)

Pone un evento en espera. Un evento que no tiene el estado en espera nunca se lanzará, y la retrollamada del evento nunca se llamará. Utilizando [Event::del()](#event.del) un evento puede ser reprogramado por el usuario cuando lo desee.

Si **Event::add()** es llamado en un evento ya en espera, libevent lo dejará en espera y lo reprogramará con el nuevo timeout (si se da). En el caso de que el timeout no esté especificado, **Event::add()** no tiene ningún efecto.

### Parámetros

     timeout



      Timeout en segundos.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Adición de una señal personalizada**

&lt;?php
/\*
Ejecute en una ventana de terminal:

$ php examples/signal.php

En otra ventana de terminal, encuentre el pid y envíe SIGTERM, por ejemplo:

$ ps aux | grep examp
ruslan 3976 0.2 0.0 139896 11256 pts/1 S+ 10:25 0:00 php examples/signal.php
ruslan 3978 0.0 0.0 9572 864 pts/2 S+ 10:26 0:00 grep --color=auto examp

$ kill -TERM 3976

En la primera ventana del terminal, debería ver lo siguiente:

Señal atrapada 15
\*/

class MyEventSignal {
private $base, $ev;
    public function __construct($base) {
$this-&gt;base = $base;
        $this-&gt;ev = Event::signal($base, SIGTERM, array($this, 'eventSighandler'));
        $this-&gt;ev-&gt;add();
    }
    public function eventSighandler($no, $c) {
echo "Señal atrapada $no\n";
$this-&gt;base-&gt;exit();
}
}

$base = new EventBase();
$c = new MyEventSignal($base);

$base-&gt;loop();
?&gt;

Resultado del ejemplo anterior es similar a:

Señal atrapada 15

**Ejemplo #2 Adición de un temporizador**

&lt;?php

$base = new EventBase();
$n = 2;
$e = Event::timer($base, function($n) use (&amp;$e) {
echo "$n segundos transcurridos\n";
    $e-&gt;delTimer();
}, $n);
$e-&gt;add($n);
$base-&gt;loop();
?&gt;

Resultado del ejemplo anterior es similar a:

2 segundos transcurridos

### Ver también

- **Event::add()**

- [Event::del()](#event.del) - Elimina un evento de la lista de eventos monitoreados

- [Event::signal()](#event.signal) - Construye un objeto de evento de señal

- [Event::timer()](#event.timer) - Construye un objeto de evento timer

# Event::addSignal

(PECL event &gt;= 1.2.6-beta)

Event::addSignal — Alias de [Event::add()](#event.add)

### Descripción

Este método es un alias de: [Event::add()](#event.add)

# Event::addTimer

(PECL event &gt;= 1.2.6-beta)

Event::addTimer — Alias de [Event::add()](#event.add)

### Descripción

Este método es un alias de: [Event::add()](#event.add)

# Event::\_\_construct

(PECL event &gt;= 1.2.6-beta)

Event::\_\_construct — Construye un objeto Event

### Descripción

public
**Event::\_\_construct**(

    

    [EventBase](#class.eventbase) $base

,

    

    [mixed](#language.types.mixed) $fd

,

    

    [int](#language.types.integer) $what

,

    

    [callable](#language.types.callable) $cb

,

    

    [mixed](#language.types.mixed) $arg
     = NULL

)

Construye un objeto Event.

### Parámetros

     base



      La base de evento a asociar.







     fd



      Recurso de flujo, recurso de socket, o descriptor numérico de fichero. Para los eventos timer, pase como valor **[-1](#constant.-1)**. Para los eventos de tipo señal, pase el número de la señal, i.e. **[SIGHUP](#constant.sighup)**.







     what



      Flags de eventos. Ver los [flags de eventos](#event.flags) para más detalles.







     cb



      La función de retrollamada del evento. Ver las [funciones de retrollamada de eventos](#event.callbacks) para más detalles.







     arg



      Datos personalizados. Si se especifican, serán pasados a la función de retrollamada cuando el evento haya lanzado los triggers.


### Ver también

- [Event::signal()](#event.signal) - Construye un objeto de evento de señal

- [Event::timer()](#event.timer) - Construye un objeto de evento timer

# Event::del

(PECL event &gt;= 1.2.6-beta)

Event::del — Elimina un evento de la lista de eventos monitoreados

### Descripción

public
**Event::del**(): [bool](#language.types.boolean)

Elimina un evento del conjunto de eventos monitoreados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [Event::add()](#event.add) - Pone un evento en espera

# Event::delSignal

(PECL event &gt;= 1.2.6-beta)

Event::delSignal — Alias de [Event::del()](#event.del)

### Descripción

Este método es un alias de: [Event::del()](#event.del)

# Event::delTimer

(PECL event &gt;= 1.2.6-beta)

Event::delTimer — Alias de [Event::del()](#event.del)

### Descripción

Este método es un alias de: [Event::del()](#event.del)

# Event::free

(PECL event &gt;= 1.2.6-beta)

Event::free — Elimina un evento de la lista de eventos vigilados y libera los recursos asociados

### Descripción

public
**Event::free**(): [void](language.types.void.html)

Elimina un evento de la lista de eventos vigilados por libevent y libera los recursos asignados a ese evento.

**Advertencia**

    El método **Event::free()**
    no destruye actualmente el objeto en sí. Para destruir el objeto completamente, llame a la función [unset()](#function.unset)
    o asigne el valor **[null](#constant.null)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [Event::\_\_construct()](#event.construct) - Construye un objeto Event

# Event::getSupportedMethods

(PECL event &gt;= 1.2.6-beta)

Event::getSupportedMethods — Devuelve un array que contiene los nombres de los métodos soportados
por esta versión de Libevent

### Descripción

public
static
**Event::getSupportedMethods**(): [array](#language.types.array)

Devuelve un array que contiene los nombres de los métodos soportados
por esta versión de Libevent.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array.

### Ver también

- [EventConfig](#class.eventconfig)

# Event::pending

(PECL event &gt;= 1.2.6-beta)

Event::pending — Detecta si el evento está pendiente o programado

### Descripción

public
**Event::pending**(

    [int](#language.types.integer) $flags

): [bool](#language.types.boolean)

Detecta si el evento está pendiente o programado.

### Parámetros

     flags



      Una o más de las siguientes constantes:
      **[Event::READ](#event.constants.read)**,
      **[Event::WRITE](#event.constants.write)**,
      **[Event::TIMEOUT](#event.constants.timeout)**,
      **[Event::SIGNAL](#event.constants.signal)**.


### Valores devueltos

Devuelve **[true](#constant.true)** si el evento está pendiente o programado,
**[false](#constant.false)** en caso contrario.

# Event::set

(PECL event &gt;= 1.2.6-beta)

Event::set — Reconfigurar el evento

### Descripción

public
**Event::set**(

    

    [EventBase](#class.eventbase) $base

,

    

    [mixed](#language.types.mixed) $fd

,

    

    [int](#language.types.integer) $what
    = ?,

    

    [callable](#language.types.callable) $cb
    = ?,

    

    [mixed](#language.types.mixed) $arg
    = ?

): [bool](#language.types.boolean)

Reconfigurar el evento. Téngase en cuenta que esta función no llama a la función obsoleta event_set de libevent. En su lugar, llama a la función event_assign.

### Parámetros

     base



      La base de evento a asociar.







     fd



      Un recurso de flujo, un recurso de socket, o un descriptor numérico de fichero. Para los eventos de tipo temporizador pase **[-1](#constant.-1)**.
      Para los eventos de tipo señal pase el número de la señal, por ejemplo **[SIGHUP](#constant.sighup)**.







     what



      Ver los
      [flags de eventos](#event.flags).







     cb



      La función de retrollamada del evento. Ver las
      [funciones de retrollamada de eventos](#event.callbacks).







     arg



      Datos personalizados a asociar con el evento. Serán pasados a la función de retrollamada cuando el evento se active.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# Event::setPriority

(PECL event &gt;= 1.2.6-beta)

Event::setPriority — Define la prioridad del evento

### Descripción

public
**Event::setPriority**(

    [int](#language.types.integer) $priority

): [bool](#language.types.boolean)

Define la prioridad del evento.

### Parámetros

     priority



      La prioridad del evento.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# Event::setTimer

(PECL event &gt;= 1.2.6-beta)

Event::setTimer — Reconfigurar un evento timer

### Descripción

public
**Event::setTimer**(

    [EventBase](#class.eventbase) $base

,

    [callable](#language.types.callable) $cb

,

    [mixed](#language.types.mixed) $arg
    = ?): [bool](#language.types.boolean)

Reconfigurar un evento timer. Téngase en cuenta que este método
no llama a la función obsoleta event_set
de libevent. En su lugar, llama a la función
event_assign.

### Parámetros

     base



      La base de evento a asociar.







     cb



      La función de retrollamada del evento timer. Ver las
      [funciones de retrollamada de eventos](#event.callbacks).







     arg



      Datos personalizados. Si se especifican, serán pasados a la función
      de retrollamada cuando el evento dispare los triggers.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [Event::\_\_construct()](#event.construct) - Construye un objeto Event

- [Event::timer()](#event.timer) - Construye un objeto de evento timer

# Event::signal

(PECL event &gt;= 1.2.6-beta)

Event::signal — Construye un objeto de evento de señal

### Descripción

public
static
**Event::signal**(

    

    [EventBase](#class.eventbase) $base

,

    

    [int](#language.types.integer) $signum

,

    

    [callable](#language.types.callable) $cb

,

    

    [mixed](#language.types.mixed) $arg
    = ?

): [Event](#class.event)

Construye un objeto de evento de señal. Es un método simple para
crear un evento de señal. Tenga en cuenta que el método genérico
[Event::\_\_construct()](#event.construct) también puede construir un
objeto de evento de señal.

### Parámetros

     base



      El objeto de base de evento asociado.







     signum



      El número de la señal.







     cb



      La función de retrollamada del evento de señal. Ver las
      [funciones de retrollamada de eventos](#event.callbacks).







     arg



      Datos personalizados. Si se especifican, serán pasados a la función
      de retrollamada cuando el evento lance los triggers.


### Valores devueltos

Devuelve un objeto de evento en caso de éxito, **[false](#constant.false)** de lo contrario.

### Ver también

- [La construcción de eventos de señal](#event.constructing.signal.events)

# Event::timer

(PECL event &gt;= 1.2.6-beta)

Event::timer — Construye un objeto de evento timer

### Descripción

public
static
**Event::timer**(

    [EventBase](#class.eventbase) $base

,

    [callable](#language.types.callable) $cb

,

    [mixed](#language.types.mixed) $arg
    = ?): [Event](#class.event)

Construye un objeto de evento timer. Se trata de un método simple para
crear un evento timer. Téngase en cuenta que el método genérico
[Event::\_\_construct()](#event.construct) también puede construir objetos
de eventos signal.

### Parámetros

     base



      El objeto de base de evento asociado.







     cb



      La función de retrollamada de evento signal. Ver las
      [funciones de retrollamada de eventos](#event.callbacks).







     arg



      Datos personalizados. Si se especifican, serán pasados a la función
      de retrollamada cuando el evento lance los triggers.


### Valores devueltos

Devuelve un objeto de evento en caso de éxito, **[false](#constant.false)** en caso contrario.

## Tabla de contenidos

- [Event::add](#event.add) — Pone un evento en espera
- [Event::addSignal](#event.addsignal) — Alias de Event::add
- [Event::addTimer](#event.addtimer) — Alias de Event::add
- [Event::\_\_construct](#event.construct) — Construye un objeto Event
- [Event::del](#event.del) — Elimina un evento de la lista de eventos monitoreados
- [Event::delSignal](#event.delsignal) — Alias de Event::del
- [Event::delTimer](#event.deltimer) — Alias de Event::del
- [Event::free](#event.free) — Elimina un evento de la lista de eventos vigilados y libera los recursos asociados
- [Event::getSupportedMethods](#event.getsupportedmethods) — Devuelve un array que contiene los nombres de los métodos soportados
  por esta versión de Libevent
- [Event::pending](#event.pending) — Detecta si el evento está pendiente o programado
- [Event::set](#event.set) — Reconfigurar el evento
- [Event::setPriority](#event.setpriority) — Define la prioridad del evento
- [Event::setTimer](#event.settimer) — Reconfigurar un evento timer
- [Event::signal](#event.signal) — Construye un objeto de evento de señal
- [Event::timer](#event.timer) — Construye un objeto de evento timer

# La clase EventBase

(PECL event &gt;= 1.2.6-beta)

## Introducción

    La clase **EventBase** representa la estructura
    base de un evento libevent. Contiene un conjunto de eventos
    y puede verificar cuáles son los eventos activos.




    Cada evento base tiene un *método* o un
    *backend* utilizado para determinar cuáles
    son los eventos listos. Estos métodos son :
    select, poll, epoll,
    kqueue, devpoll, evport
    y win32.




    Para configurar un evento base a utilizar, o evitar un backend específico,
    la clase [EventConfig](#class.eventconfig) puede ser utilizada.

**Advertencia**

     No *destruya* el objeto **EventBase**
     hasta que los recursos asociados a los objetos Event
     no sean liberados. De lo contrario, esto llevará a resultados totalmente indefinidos.

## Sinopsis de la Clase

     ****




      final
      class **EventBase**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [LOOP_ONCE](#eventbase.constants.loop-once) = 1;

    const
     [int](#language.types.integer)
      [LOOP_NONBLOCK](#eventbase.constants.loop-nonblock) = 2;

    const
     [int](#language.types.integer)
      [NOLOCK](#eventbase.constants.nolock) = 1;

    const
     [int](#language.types.integer)
      [STARTUP_IOCP](#eventbase.constants.startup-iocp) = 4;

    const
     [int](#language.types.integer)
      [NO_CACHE_TIME](#eventbase.constants.no-cache-time) = 8;

    const
     [int](#language.types.integer)
      [EPOLL_USE_CHANGELIST](#eventbase.constants.epoll-use-changelist) = 16;

    /* Métodos */

public
[\_\_construct](#eventbase.construct)(

    [EventConfig](#class.eventconfig) $cfg
    = ?)

public
[dispatch](#eventbase.dispatch)(): [void](language.types.void.html)
public
[exit](#eventbase.exit)(

    [float](#language.types.float) $timeout
    = ?): [bool](#language.types.boolean)

public
[free](#eventbase.free)(): [void](language.types.void.html)
public
[getFeatures](#eventbase.getfeatures)(): [int](#language.types.integer)
public
[getMethod](#eventbase.getmethod)(): [string](#language.types.string)
public
[getTimeOfDayCached](#eventbase.gettimeofdaycached)(): [float](#language.types.float)
public
[gotExit](#eventbase.gotexit)(): [bool](#language.types.boolean)
public
[gotStop](#eventbase.gotstop)(): [bool](#language.types.boolean)
public
[loop](#eventbase.loop)(

    [int](#language.types.integer) $flags
    = ?): [bool](#language.types.boolean)

public
[priorityInit](#eventbase.priorityinit)(

    [int](#language.types.integer) $n_priorities

): [bool](#language.types.boolean)
public
[reInit](#eventbase.reinit)(): [bool](#language.types.boolean)
public
[stop](#eventbase.stop)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

      **[EventBase::LOOP_ONCE](#eventbase.constants.loop-once)**



       Flag utilizado con el método [EventBase::loop()](#eventbase.loop)
       que significa: "bloqueo mientras libevent tiene un evento activo, luego,
       salida una vez que todos los eventos activos han ejecutado sus
       funciones de retrollamada".







      **[EventBase::LOOP_NONBLOCK](#eventbase.constants.loop-nonblock)**



       Flag utilizado con el método [EventBase::loop()](#eventbase.loop)
       que significa: "no bloquear: ver qué eventos están listos actualmente,
       ejecutar sus funciones de retrollamada con una prioridad alta, luego, salir".







      **[EventBase::NOLOCK](#eventbase.constants.nolock)**



       Flag de configuración. No bloquear la base del evento, incluso si
       un bloqueo había sido puesto en su lugar.







      **[EventBase::STARTUP_IOCP](#eventbase.constants.startup-iocp)**



       Flag de configuración específico de Windows. Activa el repartidor IOCP
       al inicio.







      **[EventBase::NO_CACHE_TIME](#eventbase.constants.no-cache-time)**



       Flag de configuración. En lugar de verificar el tiempo actual cada vez
       que el bucle de eventos está listo para ejecutar la función de retrollamada,
       el tiempo será verificado cada vez que el tiempo máximo de espera para la
       función de retrollamada sea alcanzado.







      **[EventBase::EPOLL_USE_CHANGELIST](#eventbase.constants.epoll-use-changelist)**



       Si se utiliza el backend epoll, este flag
       significa que es seguro utilizar el código interno de modificación de lista
       interna a Libevent para agrupar los añadidos y las supresiones con el fin
       de intentar minimizar el número de llamadas al sistema.




       El hecho de definir este flag hace que el código sea más rápido, pero puede
       enfrentarse a un bug de Linux: no es seguro utilizar este flag
       en presencia de fds clonados por dup() o una de sus variantes.
       Esto produciría un comportamiento extraño y muy difícil de diagnosticar.




       Este flag también puede ser activado definiendo la variable de entorno
       EVENT_EPOLL_USE_CHANGELIST.




       Este flag no tiene ningún efecto si se utiliza con un backend diferente a
       epoll.





# EventBase::\_\_construct

(PECL event &gt;= 1.2.6-beta)

EventBase::\_\_construct — Construye un objeto EventBase

### Descripción

public
**EventBase::\_\_construct**(

    [EventConfig](#class.eventconfig) $cfg
    = ?)

Construye un objeto EventBase.

### Parámetros

     cfg



      Opcional - Un objeto [EventConfig](#class.eventconfig).


### Errores/Excepciones

Si [EventBase](#class.eventbase) no puede ser construido con la configuración proporcionada,
se lanzará una excepción de tipo [EventException](#class.eventexception).

### Ver también

- [EventConfig](#class.eventconfig)

# EventBase::dispatch

(PECL event &gt;= 1.2.6-beta)

EventBase::dispatch — Despacha eventos pendientes

### Descripción

public
**EventBase::dispatch**(): [void](language.types.void.html)

    Espara a que los eventos estén activos y ejecuta sus llamadas de retorno. Hace lo mismo que
    [EventBase::loop()](#eventbase.loop)
    pero sin flags definidas.

**Advertencia**

     No *destruya* el objeto [EventBase](#class.eventbase)
     hasta que los recursos asociados a los objetos Event
     no sean liberados. De lo contrario, esto llevará a resultados totalmente indefinidos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    -
     [EventBase::loop()](#eventbase.loop) - Distribuye los eventos en espera

# EventBase::exit

(PECL event &gt;= 1.2.6-beta)

EventBase::exit — Detiene el envío de los eventos

### Descripción

public
**EventBase::exit**(

    [float](#language.types.float) $timeout
    = ?): [bool](#language.types.boolean)

Le indica al evento base que pare el envío de los eventos, opcionamente después de un número de segundos dado.

### Parámetros

     timeout



      Número opcional de segundos después de los cuales el evento base deberá parar el
      envío de eventos.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBase::stop()](#eventbase.stop) - Solicita a event_base que detenga la emisión de eventos

# EventBase::free

(PECL event &gt;= 1.10.0)

EventBase::free — Libera los recursos asignados para el evento base

### Descripción

public
**EventBase::free**(): [void](language.types.void.html)

Libera los recursos asignados por libevent para el objeto
[EventBase](#class.eventbase).

**Advertencia**

    El método **EventBase::free()** no destruye
    el objeto mismo. Para destruir el objeto completamente, llame a la función
    [unset()](#function.unset) o asignele el valor **[null](#constant.null)**.




    Este método no libera, ni desasocia ningún evento que esté actualmente
    asociado con el objeto [EventBase](#class.eventbase), ni cierra ninguno de sus
    sockets; tenga esto en cuenta.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EventBase::\_\_construct()](#eventbase.construct) - Construye un objeto EventBase

# EventBase::getFeatures

(PECL event &gt;= 1.2.6-beta)

EventBase::getFeatures — Devuelve una máscara de las funcionalidades soportadas

### Descripción

public
**EventBase::getFeatures**(): [int](#language.types.integer)

Devuelve una máscara de las funcionalidades soportadas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero que representa una máscara de las funcionalidades soportadas.
Consulte las constantes
[EventConfig::FEATURE\_\*](#eventconfig.constants).

### Ejemplos

**Ejemplo #1 Ejemplo con EventBase::getFeatures()**

&lt;?php
// Desactivación del método "select"
$cfg = new EventConfig();
if ($cfg-&gt;avoidMethod("select")) {
echo "Desactivación del método 'select'\n";
}

$base = new EventBase($cfg);

echo "funcionalidades:\n";
$features = $base-&gt;getFeatures();
($features &amp; EventConfig::FEATURE_ET) and print "ET - edge-triggered IO\n";
($features &amp; EventConfig::FEATURE_O1) and print "O1 - O(1) operation for adding/deleting events\n";
($features &amp; EventConfig::FEATURE_FDS) and print "FDS - arbitrary file descriptor types, and not just sockets\n";
?&gt;

### Ver también

- [EventBase::getMethod()](#eventbase.getmethod) - Devuelve el método de evento utilizado

- [EventConfig](#class.eventconfig)

# EventBase::getMethod

(PECL event &gt;= 1.2.6-beta)

EventBase::getMethod — Devuelve el método de evento utilizado

### Descripción

public
**EventBase::getMethod**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

String que representa el método de evento utilizado (backend).

### Ejemplos

**Ejemplo #1
Ejemplo con EventBase::getMethod()**

&lt;?php
$cfg = new EventConfig();
if ($cfg-&gt;avoidMethod("select")) {
echo "Método `select' evitado\n";
}

// Crear un evento base asociado con el config
$base = new EventBase($cfg);
echo "Método de evento utilizado: ", $base-&gt;getMethod(), PHP_EOL;

?&gt;

Resultado del ejemplo anterior es similar a:

método `select' evitado
Método de evento utilizado: epoll

### Ver también

- [EventBase::getFeatures()](#eventbase.getfeatures) - Devuelve una máscara de las funcionalidades soportadas

# EventBase::getTimeOfDayCached

(PECL event &gt;= 1.2.6-beta)

EventBase::getTimeOfDayCached — Devuelve el tiempo del evento base actual

### Descripción

public
**EventBase::getTimeOfDayCached**(): [float](#language.types.float)

En caso de éxito devuelve el tiempo actual(como el devuelto por
gettimeofday()
), mirando el valor en la caché dentro de
_base_
si es posible, y llamando a
gettimeofday()
o
clock_gettime()
si no hay tiempo disponible en la caché.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el actual tiempo de
_event base_
. En caso de error devuelve **[null](#constant.null)**.

# EventBase::gotExit

(PECL event &gt;= 1.2.6-beta)

EventBase::gotExit — Verifica si se ha solicitado que el bucle de eventos salga

### Descripción

public
**EventBase::gotExit**(): [bool](#language.types.boolean)

Verifica si se ha solicitado que el bucle de eventos salga mediante
el método [EventBase::exit()](#eventbase.exit).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si se ha solicitado que el bucle de eventos salga
mediante el método [EventBase::exit()](#eventbase.exit).
**[false](#constant.false)** en caso contrario.

### Ver también

- [EventBase::exit()](#eventbase.exit) - Detiene el envío de los eventos

- [EventBase::stop()](#eventbase.stop) - Solicita a event_base que detenga la emisión de eventos

- [EventBase::gotStop()](#eventbase.gotstop) - Verifica si se ha solicitado que la iteración de eventos se detenga

# EventBase::gotStop

(PECL event &gt;= 1.2.6-beta)

EventBase::gotStop — Verifica si se ha solicitado que la iteración de eventos se detenga

### Descripción

public
**EventBase::gotStop**(): [bool](#language.types.boolean)

Verifica si se ha solicitado que la iteración de eventos se detenga
mediante el método [EventBase::stop()](#eventbase.stop).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si se ha solicitado que la iteración de eventos
se detenga mediante el método [EventBase::stop()](#eventbase.stop).
**[false](#constant.false)** en caso contrario.

### Ver también

- [EventBase::exit()](#eventbase.exit) - Detiene el envío de los eventos

- [EventBase::stop()](#eventbase.stop) - Solicita a event_base que detenga la emisión de eventos

- [EventBase::gotExit()](#eventbase.gotexit) - Verifica si se ha solicitado que el bucle de eventos salga

# EventBase::loop

(PECL event &gt;= 1.2.6-beta)

EventBase::loop — Distribuye los eventos en espera

### Descripción

public
**EventBase::loop**(

    [int](#language.types.integer) $flags
    = ?): [bool](#language.types.boolean)

Espera a que los eventos se vuelvan activos, luego,
ejecuta sus funciones de retrollamada.

**Advertencia**

     No *destruya* el objeto [EventBase](#class.eventbase)
     hasta que los recursos asociados a los objetos Event
     no sean liberados. De lo contrario, esto llevará a resultados totalmente indefinidos.

### Parámetros

     flags



      Banderas opcionales. Una constante EventBase::LOOP_*.
      Ver las [constantes EventBase](#eventbase.constants).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBase::dispatch()](#eventbase.dispatch) - Despacha eventos pendientes

# EventBase::priorityInit

(PECL event &gt;= 1.2.6-beta)

EventBase::priorityInit — Define el número de prioridades por evento base

### Descripción

public
**EventBase::priorityInit**(

    [int](#language.types.integer) $n_priorities

): [bool](#language.types.boolean)

Define el número de prioridades por evento base.

### Parámetros

     n_priorities



      El número de prioridades por evento base.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [Event::setPriority()](#event.setpriority) - Define la prioridad del evento

# EventBase::reInit

(PECL event &gt;= 1.2.6-beta)

EventBase::reInit — Reinicializa el evento base (después de un 'fork')

### Descripción

public
**EventBase::reInit**(): [bool](#language.types.boolean)

Reinicializa el evento base. Debe ser llamado después de un 'fork'.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# EventBase::stop

(PECL event &gt;= 1.2.6-beta)

EventBase::stop — Solicita a event_base que detenga la emisión de eventos

### Descripción

public
**EventBase::stop**(): [bool](#language.types.boolean)

Solicita a event_base que detenga la emisión de eventos

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBase::exit()](#eventbase.exit) - Detiene el envío de los eventos

- [EventBase::gotStop()](#eventbase.gotstop) - Verifica si se ha solicitado que la iteración de eventos se detenga

## Tabla de contenidos

- [EventBase::\_\_construct](#eventbase.construct) — Construye un objeto EventBase
- [EventBase::dispatch](#eventbase.dispatch) — Despacha eventos pendientes
- [EventBase::exit](#eventbase.exit) — Detiene el envío de los eventos
- [EventBase::free](#eventbase.free) — Libera los recursos asignados para el evento base
- [EventBase::getFeatures](#eventbase.getfeatures) — Devuelve una máscara de las funcionalidades soportadas
- [EventBase::getMethod](#eventbase.getmethod) — Devuelve el método de evento utilizado
- [EventBase::getTimeOfDayCached](#eventbase.gettimeofdaycached) — Devuelve el tiempo del evento base actual
- [EventBase::gotExit](#eventbase.gotexit) — Verifica si se ha solicitado que el bucle de eventos salga
- [EventBase::gotStop](#eventbase.gotstop) — Verifica si se ha solicitado que la iteración de eventos se detenga
- [EventBase::loop](#eventbase.loop) — Distribuye los eventos en espera
- [EventBase::priorityInit](#eventbase.priorityinit) — Define el número de prioridades por evento base
- [EventBase::reInit](#eventbase.reinit) — Reinicializa el evento base (después de un 'fork')
- [EventBase::stop](#eventbase.stop) — Solicita a event_base que detenga la emisión de eventos

# La clase EventBuffer

(PECL event &gt;= 1.5.0)

## Introducción

    La clase **EventBuffer** representa
    "evbuffer" de Libevent, una utilidad para las I/O bufferizadas.




    Los buffers de eventos son generalmente útiles para realizar la
    parte buffer de una red I/O bufferizada.

## Sinopsis de la Clase

     ****




      class **EventBuffer**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [EOL_ANY](#eventbuffer.constants.eol-any) = 0;

    const
     [int](#language.types.integer)
      [EOL_CRLF](#eventbuffer.constants.eol-crlf) = 1;

    const
     [int](#language.types.integer)
      [EOL_CRLF_STRICT](#eventbuffer.constants.eol-crlf-strict) = 2;

    const
     [int](#language.types.integer)
      [EOL_LF](#eventbuffer.constants.eol-lf) = 3;

    const
     [int](#language.types.integer)
      [PTR_SET](#eventbuffer.constants.ptr-set) = 0;

    const
     [int](#language.types.integer)
      [PTR_ADD](#eventbuffer.constants.ptr-add) = 1;

    /* Propiedades */
    public
     readonly
     [int](#language.types.integer)
      [$length](#eventbuffer.props.length);

    public
     readonly
     [int](#language.types.integer)
      [$contiguous_space](#eventbuffer.props.contiguous-space);

    /* Métodos */

public
[add](#eventbuffer.add)(

    [string](#language.types.string) $data

): [bool](#language.types.boolean)
public
[addBuffer](#eventbuffer.addbuffer)(

    [EventBuffer](#class.eventbuffer) $buf

): [bool](#language.types.boolean)
public
[appendFrom](#eventbuffer.appendfrom)(

    [EventBuffer](#class.eventbuffer) $buf

,

    [int](#language.types.integer) $len

): [int](#language.types.integer)
public
[\_\_construct](#eventbuffer.construct)()
public
[copyout](#eventbuffer.copyout)(

    [string](#language.types.string) &amp;$data

,

    [int](#language.types.integer) $max_bytes

): [int](#language.types.integer)
public
[drain](#eventbuffer.drain)(

    [int](#language.types.integer) $len

): [bool](#language.types.boolean)
public
[enableLocking](#eventbuffer.enablelocking)(): [void](language.types.void.html)
public
[expand](#eventbuffer.expand)(

    [int](#language.types.integer) $len

): [bool](#language.types.boolean)
public
[freeze](#eventbuffer.freeze)(

    [bool](#language.types.boolean) $at_front

): [bool](#language.types.boolean)
public
[lock](#eventbuffer.lock)(): [void](language.types.void.html)
public
[prepend](#eventbuffer.prepend)(

    [string](#language.types.string) $data

): [bool](#language.types.boolean)
public
[prependBuffer](#eventbuffer.prependbuffer)(

    [EventBuffer](#class.eventbuffer) $buf

): [bool](#language.types.boolean)
public
[pullup](#eventbuffer.pullup)(

    [int](#language.types.integer) $size

): [string](#language.types.string)
public
[read](#eventbuffer.read)(

    [int](#language.types.integer) $max_bytes

): [string](#language.types.string)
public
[read](#eventbuffer.read)(

    [mixed](#language.types.mixed) $fd

,

    [int](#language.types.integer) $howmuch

): [int](#language.types.integer)
public
[readLine](#eventbuffer.readline)(

    [int](#language.types.integer) $eol_style

): [string](#language.types.string)
public
[search](#eventbuffer.search)(

    [string](#language.types.string) $what

,

    [int](#language.types.integer) $start
     = -1

,

    [int](#language.types.integer) $end
     = -1

): [mixed](#language.types.mixed)
public
[searchEol](#eventbuffer.searcheol)(

    [int](#language.types.integer) $start
     = -1

,

    [int](#language.types.integer) $eol_style
     =
     **[EventBuffer::EOL_ANY](#eventbuffer.constants.eol-any)**

): [mixed](#language.types.mixed)
public
[substr](#eventbuffer.substr)(

    [int](#language.types.integer) $start

,

    [int](#language.types.integer) $length
    = ?): [string](#language.types.string)

public
[unfreeze](#eventbuffer.unfreeze)(

    [bool](#language.types.boolean) $at_front

): [bool](#language.types.boolean)
public
[unlock](#eventbuffer.unlock)(): [bool](#language.types.boolean)
public
[write](#eventbuffer.write)(

    [mixed](#language.types.mixed) $fd

,

    [int](#language.types.integer) $howmuch
    = ?): [int](#language.types.integer)

}

## Propiedades

      length



       El número de bytes almacenados en un buffer de eventos.







      contiguous_space



       El número de bytes almacenados de manera contigua al inicio del buffer.
       Los bytes en un buffer pueden estar almacenados en varias partes
       separadas de la memoria; esta propiedad devuelve el número de bytes
       actualmente almacenados en la primera parte.





## Constantes predefinidas

      **[EventBuffer::EOL_ANY](#eventbuffer.constants.eol-any)**



       El fin de línea es una secuencia de números que representan un retorno de carro
       y una nueva línea. Este formato no es muy útil; existe solo por razones de compatibilidad ascendente.







      **[EventBuffer::EOL_CRLF](#eventbuffer.constants.eol-crlf)**



       El fin de línea es un retorno de carro opcional, seguido de una nueva
       línea. (En otras palabras, es "\r\n"
       o "\n"). Este formato es útil para analizar
       los protocolos de Internet basados en texto; el estándar requiere
       "\r\n" pero algunos clientes proporcionan solo
       "\n".







      **[EventBuffer::EOL_CRLF_STRICT](#eventbuffer.constants.eol-crlf-strict)**



       El fin de línea es un simple retorno de carro, seguido de una
       simple nueva línea (también conocido como "\r\n".
       Los valores ASCII son 0x0D 0x0A).







      **[EventBuffer::EOL_LF](#eventbuffer.constants.eol-lf)**



       El fin de línea es un simple carácter de nueva línea (también conocido
       como "\n". El valor ASCII es 0x0A).







      **[EventBuffer::PTR_SET](#eventbuffer.constants.ptr-set)**



       Flag utilizado como argumento del método
       **EventBuffer::setPosition()**. Si este flag es especificado,
       la posición del puntero es movida a una posición absoluta del buffer.







      **[EventBuffer::PTR_ADD](#eventbuffer.constants.ptr-add)**



       Idéntico a **[EventBuffer::PTR_SET](#eventbuffer.constants.ptr-set)**,
       excepto que este flag hace que el método
       **EventBuffer::setPosition()**
       se mueva a una posición hacia atrás en relación con el número
       de bytes especificado (en lugar de definir una posición absoluta).





# EventBuffer::add

(PECL event &gt;= 1.2.6-beta)

EventBuffer::add — Añade datos al final de un buffer de eventos

### Descripción

public
**EventBuffer::add**(

    [string](#language.types.string) $data

): [bool](#language.types.boolean)

Añade datos al final de un buffer de eventos.

### Parámetros

     data



      String que se añadirá al final del buffer.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBuffer::addBuffer()](#eventbuffer.addbuffer) - Desplaza todos los datos del búfer proporcionado al EventBuffer actual

# EventBuffer::addBuffer

(PECL event &gt;= 1.2.6-beta)

EventBuffer::addBuffer — Desplaza todos los datos del búfer proporcionado al EventBuffer actual

### Descripción

public
**EventBuffer::addBuffer**(

    [EventBuffer](#class.eventbuffer) $buf

): [bool](#language.types.boolean)

Desplaza todos los datos del búfer proporcionado por el argumento
buf al final del [EventBuffer](#class.eventbuffer)
actual. Se trata de una adición destructiva. Los datos del primer búfer
son desplazados al otro. Sin embargo, no se produce ninguna copia en memoria.

### Parámetros

     buf



      El objeto EventBuffer de origen.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBuffer::add()](#eventbuffer.add) - Añade datos al final de un buffer de eventos

# EventBuffer::appendFrom

(PECL event &gt;= 1.6.0)

EventBuffer::appendFrom — Mueve el número de bytes especificados desde un buffer fuente, al
final del buffer actual

### Descripción

public
**EventBuffer::appendFrom**(

    [EventBuffer](#class.eventbuffer) $buf

,

    [int](#language.types.integer) $len

): [int](#language.types.integer)

Mueve el número de bytes especificados desde un buffer fuente, al final del
buffer actual. Si hay menos bytes, mueve todos los bytes
disponibles del buffer fuente.

### Parámetros

     buf



      Buffer fuente.







     len




### Valores devueltos

Devuelve el número de bytes leídos.

### Historial de cambios

       Versión
       Descripción






       PECL event 1.6.0

        Renombrado de **EventBuffer::appendFrom()**(nombre
        antiguo del método) a **EventBuffer::appendFrom()**.





### Ver también

- [EventBuffer::copyout()](#eventbuffer.copyout) - Copia el número de bytes especificado desde el inicio del búfer

- [EventBuffer::drain()](#eventbuffer.drain) - Elimina un número especificado de bytes desde el inicio del búfer
  sin copiar los datos

- [EventBuffer::pullup()](#eventbuffer.pullup) - Serializa los datos del buffer y devuelve el contenido del
  buffer en forma de string

- [EventBuffer::readLine()](#eventbuffer.readline) - Extrae una línea desde el inicio del búfer

- [EventBuffer::read()](#eventbuffer.read) - Lee los datos de un evbuffer y vacía los bytes leídos

# EventBuffer::\_\_construct

(PECL event &gt;= 1.2.6-beta)

EventBuffer::\_\_construct — Construye el objeto EventBuffer

### Descripción

public
**EventBuffer::\_\_construct**()

Construye el objeto EventBuffer

### Parámetros

Esta función no contiene ningún parámetro.

# EventBuffer::copyout

(PECL event &gt;= 1.2.6-beta)

EventBuffer::copyout — Copia el número de bytes especificado desde el inicio del búfer

### Descripción

public
**EventBuffer::copyout**(

    [string](#language.types.string) &amp;$data

,

    [int](#language.types.integer) $max_bytes

): [int](#language.types.integer)

Funciona de la misma manera que el método
[EventBuffer::read()](#eventbuffer.read), pero no vacía los
datos del búfer. Es decir, el método copia los primeros
max_bytes bytes desde el inicio del búfer
en el argumento data. Si hay menos de
max_bytes bytes disponibles, el método
copia todos los bytes presentes.

### Parámetros

     data



      String de salida.







     max_bytes



      El número de bytes a copiar.


### Valores devueltos

Devuelve el número de bytes copiados, o
**[-1](#constant.-1)** si ocurre un error.

### Ver también

- [EventBuffer::read()](#eventbuffer.read) - Lee los datos de un evbuffer y vacía los bytes leídos

- [EventBuffer::appendFrom()](#eventbuffer.appendfrom) - Mueve el número de bytes especificados desde un buffer fuente, al
  final del buffer actual

# EventBuffer::drain

(PECL event &gt;= 1.2.6-beta)

EventBuffer::drain — Elimina un número especificado de bytes desde el inicio del búfer
sin copiar los datos

### Descripción

public
**EventBuffer::drain**(

    [int](#language.types.integer) $len

): [bool](#language.types.boolean)

Funciona de la misma manera que el método
[EventBuffer::read()](#eventbuffer.read) excepto que
los datos eliminados no son copiados: solo se eliminan
del inicio del búfer.

### Parámetros

     len



      El número de bytes a eliminar del búfer.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBuffer::read()](#eventbuffer.read) - Lee los datos de un evbuffer y vacía los bytes leídos

- [EventBuffer::appendFrom()](#eventbuffer.appendfrom) - Mueve el número de bytes especificados desde un buffer fuente, al
  final del buffer actual

# EventBuffer::enableLocking

(PECL event &gt;= 1.2.6-beta)

EventBuffer::enableLocking —

### Descripción

public
**EventBuffer::enableLocking**(): [void](language.types.void.html)

Se activa el bloqueo del [EventBuffer](#class.eventbuffer), permitiendo
así su uso seguro por varios hilos simultáneamente. Cuando el bloqueo está activado,
el bloqueo se coloca cuando se llaman las funciones de retrollamada.
Este comportamiento puede provocar bloqueos si no se tiene cuidado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [» Evbuffers and Thread-safety](http://www.wangafu.net/~nickm/libevent-book/Ref7_evbuffer.html#_evbuffers_and_thread_safety)

# EventBuffer::expand

(PECL event &gt;= 1.2.6-beta)

EventBuffer::expand — Reserva espacio en el buffer

### Descripción

public
**EventBuffer::expand**(

    [int](#language.types.integer) $len

): [bool](#language.types.boolean)

Modifica el último bloque de memoria del buffer, o añade un nuevo bloque, de modo
que el buffer es ahora suficientemente grande para contener
len
bytes sin añadir espacios suplementarios.

### Parámetros

     len



      El número de bytes a reservar del buffer


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# EventBuffer::freeze

(PECL event &gt;= 1.2.6-beta)

EventBuffer::freeze — Evita que las llamadas puedan modificar un buffer de eventos

### Descripción

public
**EventBuffer::freeze**(

    [bool](#language.types.boolean) $at_front

): [bool](#language.types.boolean)

Evita que las llamadas puedan modificar un buffer de eventos

### Parámetros

     at_front



      Permite desactivar cambios en el principio o final del buffer.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBuffer::unfreeze()](#eventbuffer.unfreeze) - Re-activa las llamadas que permiten modificar un buffer de eventos

# EventBuffer::lock

(PECL event &gt;= 1.2.6-beta)

EventBuffer::lock — Bloquea un buffer

### Descripción

public
**EventBuffer::lock**(): [void](language.types.void.html)

Bloquea un buffer. Puede ser utilizado junto con
[EventBuffer::unlock()](#eventbuffer.unlock)
para que un conjunto de operaciones sean atómicas, p.e. thread-safe. Notar que no se
necesita bloquear buffers para operaciones
_individuales_ .
Cuando el bloqueo está activo (ver
[EventBuffer::enableLocking()](#eventbuffer.enablelocking)
), las operaciones individuales en buffers de eventos ya son atómicas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EventBuffer::unlock()](#eventbuffer.unlock) - Libera un bloqueo adquirido con EventBuffer::lock

# EventBuffer::prepend

(PECL event &gt;= 1.2.6-beta)

EventBuffer::prepend — Añade datos al principio del buffer

### Descripción

public
**EventBuffer::prepend**(

    [string](#language.types.string) $data

): [bool](#language.types.boolean)

Añade datos al principio del buffer.

### Parámetros

     data



      String a añadir al principio del buffer.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBuffer::prependBuffer()](#eventbuffer.prependbuffer) - Desplaza todos los datos desde el buffer fuente hacia el inicio
  del buffer actual

- [EventBuffer::add()](#eventbuffer.add) - Añade datos al final de un buffer de eventos

- [EventBuffer::addBuffer()](#eventbuffer.addbuffer) - Desplaza todos los datos del búfer proporcionado al EventBuffer actual

# EventBuffer::prependBuffer

(PECL event &gt;= 1.2.6-beta)

EventBuffer::prependBuffer — Desplaza todos los datos desde el buffer fuente hacia el inicio
del buffer actual

### Descripción

public
**EventBuffer::prependBuffer**(

    [EventBuffer](#class.eventbuffer) $buf

): [bool](#language.types.boolean)

Funciona exactamente como el método
[EventBuffer::addBuffer()](#eventbuffer.addbuffer), excepto que desplaza los datos al inicio del buffer.

### Parámetros

     buf



      Buffer fuente.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBuffer::add()](#eventbuffer.add) - Añade datos al final de un buffer de eventos

- [EventBuffer::addBuffer()](#eventbuffer.addbuffer) - Desplaza todos los datos del búfer proporcionado al EventBuffer actual

- [EventBuffer::prepend()](#eventbuffer.prepend) - Añade datos al principio del buffer

# EventBuffer::pullup

(PECL event &gt;= 1.2.6-beta)

EventBuffer::pullup — Serializa los datos del buffer y devuelve el contenido del
buffer en forma de string

### Descripción

public
**EventBuffer::pullup**(

    [int](#language.types.integer) $size

): [string](#language.types.string)

Serializa los primeros size bytes del buffer,
los copia o los mueve según sea necesario para asegurar que sean contiguos
y ocupen la misma parte de la memoria. Si el tamaño es negativo, la función
lineariza la totalidad del buffer.

**Advertencia**

    La llamada al método **EventBuffer::pullup()**
    con un tamaño muy grande ralentiza la ejecución, ya que puede potencialmente
    necesitar copiar el contenido entero del buffer.

### Parámetros

     size



      El número de bytes que deben ser contiguos en el buffer.


### Valores devueltos

Si size es superior al número de bytes del buffer,
la función devolverá **[null](#constant.null)**. De lo contrario, **EventBuffer::pullup()**
devolverá un string.

### Ver también

- [EventBuffer::copyout()](#eventbuffer.copyout) - Copia el número de bytes especificado desde el inicio del búfer

- [EventBuffer::drain()](#eventbuffer.drain) - Elimina un número especificado de bytes desde el inicio del búfer
  sin copiar los datos

- [EventBuffer::read()](#eventbuffer.read) - Lee los datos de un evbuffer y vacía los bytes leídos

- [EventBuffer::readLine()](#eventbuffer.readline) - Extrae una línea desde el inicio del búfer

- [EventBuffer::appendFrom()](#eventbuffer.appendfrom) - Mueve el número de bytes especificados desde un buffer fuente, al
  final del buffer actual

# EventBuffer::read

(PECL event &gt;= 1.6.0)

EventBuffer::read — Lee los datos de un evbuffer y vacía los bytes leídos

### Descripción

public
**EventBuffer::read**(

    [int](#language.types.integer) $max_bytes

): [string](#language.types.string)

Lee los primeros max_bytes bytes desde el búfer
y vacía los bytes leídos. Si el argumento max_bytes
representa más bytes de los disponibles en el búfer,
todos los bytes disponibles serán leídos.

### Parámetros

     max_bytes



      El número máximo de bytes a leer desde el búfer.


### Valores devueltos

Devuelve el string leído, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL event 1.6.0

        El método **EventBuffer::read()**
        fue renombrado a **EventBuffer::read()**.
        **EventBuffer::read()**
        ahora toma solo un argumento: max_bytes
        ; ahora devuelve un string en lugar de un integer.





### Ver también

- [EventBuffer::copyout()](#eventbuffer.copyout) - Copia el número de bytes especificado desde el inicio del búfer

- [EventBuffer::drain()](#eventbuffer.drain) - Elimina un número especificado de bytes desde el inicio del búfer
  sin copiar los datos

- [EventBuffer::pullup()](#eventbuffer.pullup) - Serializa los datos del buffer y devuelve el contenido del
  buffer en forma de string

- [EventBuffer::readLine()](#eventbuffer.readline) - Extrae una línea desde el inicio del búfer

- [EventBuffer::appendFrom()](#eventbuffer.appendfrom) - Mueve el número de bytes especificados desde un buffer fuente, al
  final del buffer actual

# EventBuffer::readFrom

(PECL event &gt;= 1.7.0)

EventBuffer::readFrom — Lee datos desde un fichero y los coloca al final del búfer

### Descripción

public
[EventBuffer::read](#eventbuffer.read)(

    [mixed](#language.types.mixed) $fd

,

    [int](#language.types.integer) $howmuch

): [int](#language.types.integer)

Lee datos desde el fichero fd
y los coloca al final del búfer.

### Parámetros

     fd



      Un socket, un flujo, o un descriptor de fichero numérico.







     howmuch



      Número máximo de bytes a leer.


### Valores devueltos

Devuelve el número de bytes leídos, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBuffer::copyout()](#eventbuffer.copyout) - Copia el número de bytes especificado desde el inicio del búfer

- [EventBuffer::drain()](#eventbuffer.drain) - Elimina un número especificado de bytes desde el inicio del búfer
  sin copiar los datos

- [EventBuffer::pullup()](#eventbuffer.pullup) - Serializa los datos del buffer y devuelve el contenido del
  buffer en forma de string

- [EventBuffer::readLine()](#eventbuffer.readline) - Extrae una línea desde el inicio del búfer

- [EventBuffer::appendFrom()](#eventbuffer.appendfrom) - Mueve el número de bytes especificados desde un buffer fuente, al
  final del buffer actual

# EventBuffer::readLine

(PECL event &gt;= 1.2.6-beta)

EventBuffer::readLine — Extrae una línea desde el inicio del búfer

### Descripción

public
**EventBuffer::readLine**(

    [int](#language.types.integer) $eol_style

): [string](#language.types.string)

Extrae una línea desde el inicio del búfer y la devuelve
en una nueva string asignada. Si no hay una línea completa
para leer, el método devuelve **[null](#constant.null)**. La terminación de la línea
no está incluida en la string copiada.

### Parámetros

     eol_style



      Una constante
      [EventBuffer:EOL_*](#eventbuffer.constants).


### Valores devueltos

En caso de éxito, devuelve la línea leída desde el búfer,
**[null](#constant.null)** en caso contrario.

### Ver también

- [EventBuffer::copyout()](#eventbuffer.copyout) - Copia el número de bytes especificado desde el inicio del búfer

- [EventBuffer::drain()](#eventbuffer.drain) - Elimina un número especificado de bytes desde el inicio del búfer
  sin copiar los datos

- [EventBuffer::pullup()](#eventbuffer.pullup) - Serializa los datos del buffer y devuelve el contenido del
  buffer en forma de string

- [EventBuffer::read()](#eventbuffer.read) - Lee los datos de un evbuffer y vacía los bytes leídos

- [EventBuffer::appendFrom()](#eventbuffer.appendfrom) - Mueve el número de bytes especificados desde un buffer fuente, al
  final del buffer actual

# EventBuffer::search

(PECL event &gt;= 1.2.6-beta)

EventBuffer::search — Busca en el búfer una ocurrencia de un string

### Descripción

public
**EventBuffer::search**(

    [string](#language.types.string) $what

,

    [int](#language.types.integer) $start
     = -1

,

    [int](#language.types.integer) $end
     = -1

): [mixed](#language.types.mixed)

Busca en el búfer una ocurrencia del string
what. El método devuelve la posición
numérica del string buscado, o **[false](#constant.false)** si el string
no ha podido ser encontrado.

Si el argumento start es proporcionado, será la posición
desde la cual la búsqueda debe comenzar; de lo contrario, la búsqueda
se realizará desde el inicio del string. Si el argumento
end es proporcionado, la búsqueda se realizará
entre las posiciones de inicio y fin del búfer.

### Parámetros

     what



      String a buscar.







     start



      Posición de inicio de la búsqueda.







     end



      Posición de fin de la búsqueda.


### Valores devueltos

Devuelve la posición numérica de la primera ocurrencia del
string en el búfer, o **[false](#constant.false)** si el string no ha sido encontrado.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Ejemplos

**Ejemplo #1 Ejemplo con EventBuffer::search()**

&lt;?php
// Cuenta el número de ocurrencias del string 'str' en el búfer 'buf'
function count_instances($buf, $str) {
$total = 0;
$p = 0;
$i = 0;

    while (1) {
        $p = $buf-&gt;search($str, $p);
        if ($p === FALSE) {
            break;
        }
        ++$total;
        ++$p;
    }

    return $total;

}

$buf = new EventBuffer();
$buf-&gt;add("Some string within a string inside another string");
var_dump(count_instances($buf, "str"));
?&gt;

Resultado del ejemplo anterior es similar a:

int(3)

### Ver también

- [EventBuffer::searchEol()](#eventbuffer.searcheol) - Busca en el búfer una ocurrencia de fin de línea

# EventBuffer::searchEol

(PECL event &gt;= 1.5.0)

EventBuffer::searchEol — Busca en el búfer una ocurrencia de fin de línea

### Descripción

public
**EventBuffer::searchEol**(

    [int](#language.types.integer) $start
     = -1

,

    [int](#language.types.integer) $eol_style
     =
     **[EventBuffer::EOL_ANY](#eventbuffer.constants.eol-any)**

): [mixed](#language.types.mixed)

Busca en el búfer una ocurrencia de fin de línea especificada por
el argumento eol_style. El método devuelve
la posición numérica del string, o **[false](#constant.false)** si el string no ha sido
encontrado.

Si el argumento start es proporcionado, representa
la posición donde la búsqueda comenzará; de lo contrario, la búsqueda
se realizará desde el inicio del string. Si el argumento end
es proporcionado, la búsqueda se realizará entre las posiciones de inicio
y fin del búfer.

### Parámetros

     start



      Posición de inicio de la búsqueda.







     eol_style



      Una constante
      [EventBuffer:EOL_*](#eventbuffer.constants).


### Valores devueltos

Devuelve la posición numérica de la primera ocurrencia del
símbolo de fin de línea en el búfer, o bien **[false](#constant.false)** si
no ha sido encontrado.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Ver también

- [EventBuffer::search()](#eventbuffer.search) - Busca en el búfer una ocurrencia de un string

# EventBuffer::substr

(PECL event &gt;= 1.6.0)

EventBuffer::substr — Sustrae una porción de los datos del búfer

### Descripción

public
**EventBuffer::substr**(

    [int](#language.types.integer) $start

,

    [int](#language.types.integer) $length
    = ?): [string](#language.types.string)

Sustrae una cantidad de length bytes
del búfer, comenzando en la posición start.

### Parámetros

     start



      La posición de inicio de los datos a sustraer.







     length



      Número máximo de bytes a sustraer.


### Valores devueltos

Devuelve los datos sustraídos en forma de string
en caso de éxito, o bien **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBuffer::read()](#eventbuffer.read) - Lee los datos de un evbuffer y vacía los bytes leídos

# EventBuffer::unfreeze

(PECL event &gt;= 1.2.6-beta)

EventBuffer::unfreeze — Re-activa las llamadas que permiten modificar un buffer de eventos

### Descripción

public
**EventBuffer::unfreeze**(

    [bool](#language.types.boolean) $at_front

): [bool](#language.types.boolean)

Re-activa las llamadas que permiten modificar un buffer de eventos.

### Parámetros

     at_front



      Si se deben activar los eventos al principio o al final del buffer.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBuffer::freeze()](#eventbuffer.freeze) - Evita que las llamadas puedan modificar un buffer de eventos

# EventBuffer::unlock

(PECL event &gt;= 1.2.6-beta)

EventBuffer::unlock — Libera un bloqueo adquirido con EventBuffer::lock

### Descripción

public
**EventBuffer::unlock**(): [bool](#language.types.boolean)

Libera un bloqueo adquirido con el método
[EventBuffer::lock()](#eventbuffer.lock).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBuffer::lock()](#eventbuffer.lock) - Bloquea un buffer

# EventBuffer::write

(PECL event &gt;= 1.6.0)

EventBuffer::write — Escribe el contenido del buffer en un fichero o en un socket

### Descripción

public
**EventBuffer::write**(

    [mixed](#language.types.mixed) $fd

,

    [int](#language.types.integer) $howmuch
    = ?): [int](#language.types.integer)

Escribe el contenido del buffer en un descriptor de fichero. El buffer
será vaciado después de la escritura exitosa de los últimos octetos.

### Parámetros

     fd



      Recurso de socket, flujo, o un descriptor numérico de fichero asociado con un socket.







     howmuch



      El número máximo de octetos a escribir.


### Valores devueltos

Devuelve el número de octetos escritos, o **[false](#constant.false)** en caso de error.

### Ver también

- [EventBuffer::read()](#eventbuffer.read) - Lee los datos de un evbuffer y vacía los bytes leídos

## Tabla de contenidos

- [EventBuffer::add](#eventbuffer.add) — Añade datos al final de un buffer de eventos
- [EventBuffer::addBuffer](#eventbuffer.addbuffer) — Desplaza todos los datos del búfer proporcionado al EventBuffer actual
- [EventBuffer::appendFrom](#eventbuffer.appendfrom) — Mueve el número de bytes especificados desde un buffer fuente, al
  final del buffer actual
- [EventBuffer::\_\_construct](#eventbuffer.construct) — Construye el objeto EventBuffer
- [EventBuffer::copyout](#eventbuffer.copyout) — Copia el número de bytes especificado desde el inicio del búfer
- [EventBuffer::drain](#eventbuffer.drain) — Elimina un número especificado de bytes desde el inicio del búfer
  sin copiar los datos
- [EventBuffer::enableLocking](#eventbuffer.enablelocking) — Descripción
- [EventBuffer::expand](#eventbuffer.expand) — Reserva espacio en el buffer
- [EventBuffer::freeze](#eventbuffer.freeze) — Evita que las llamadas puedan modificar un buffer de eventos
- [EventBuffer::lock](#eventbuffer.lock) — Bloquea un buffer
- [EventBuffer::prepend](#eventbuffer.prepend) — Añade datos al principio del buffer
- [EventBuffer::prependBuffer](#eventbuffer.prependbuffer) — Desplaza todos los datos desde el buffer fuente hacia el inicio
  del buffer actual
- [EventBuffer::pullup](#eventbuffer.pullup) — Serializa los datos del buffer y devuelve el contenido del
  buffer en forma de string
- [EventBuffer::read](#eventbuffer.read) — Lee los datos de un evbuffer y vacía los bytes leídos
- [EventBuffer::readFrom](#eventbuffer.readfrom) — Lee datos desde un fichero y los coloca al final del búfer
- [EventBuffer::readLine](#eventbuffer.readline) — Extrae una línea desde el inicio del búfer
- [EventBuffer::search](#eventbuffer.search) — Busca en el búfer una ocurrencia de un string
- [EventBuffer::searchEol](#eventbuffer.searcheol) — Busca en el búfer una ocurrencia de fin de línea
- [EventBuffer::substr](#eventbuffer.substr) — Sustrae una porción de los datos del búfer
- [EventBuffer::unfreeze](#eventbuffer.unfreeze) — Re-activa las llamadas que permiten modificar un buffer de eventos
- [EventBuffer::unlock](#eventbuffer.unlock) — Libera un bloqueo adquirido con EventBuffer::lock
- [EventBuffer::write](#eventbuffer.write) — Escribe el contenido del buffer en un fichero o en un socket

# La clase EventBufferEvent

(PECL event &gt;= 1.2.6-beta)

## Introducción

    Representa un buffer de eventos Libevent.




    Normalmente, una aplicación desea poner en buffer datos además de simplemente responder a eventos. Cuando se desea escribir datos, por ejemplo, el mecanismo habitual se asemeja a:




    -

      Se decide que se desea escribir datos en una conexión; coloque estos datos en un buffer.





    -

      Se espera a que la conexión se vuelva accesible en escritura.





    -

      Se escribe la mayor cantidad de datos posible.





    -

      Se recuerda la cantidad escrita, y si aún hay más datos para escribir, se espera a que la conexión vuelva a ser accesible en escritura.







    Este mecanismo de bufferización de E/S es lo suficientemente común como para que Libevent proporcione un mecanismo genérico para ello. Un buffer de eventos consta de un transporte subyacente (como un socket), un buffer de lectura y un buffer de escritura. En lugar de un evento clásico, que proporciona funciones de retrollamada cuando el transporte subyacente está listo para ser leído o escrito, un buffer de eventos llama a sus funciones de retrollamada proporcionadas por el usuario cuando ha leído o escrito suficientes datos.

## Sinopsis de la Clase

     ****




      final
      class **EventBufferEvent**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [READING](#eventbufferevent.constants.reading) = 1;

    const
     [int](#language.types.integer)
      [WRITING](#eventbufferevent.constants.writing) = 2;

    const
     [int](#language.types.integer)
      [EOF](#eventbufferevent.constants.eof) = 16;

    const
     [int](#language.types.integer)
      [ERROR](#eventbufferevent.constants.error) = 32;

    const
     [int](#language.types.integer)
      [TIMEOUT](#eventbufferevent.constants.timeout) = 64;

    const
     [int](#language.types.integer)
      [CONNECTED](#eventbufferevent.constants.connected) = 128;

    const
     [int](#language.types.integer)
      [OPT_CLOSE_ON_FREE](#eventbufferevent.constants.opt-close-on-free) = 1;

    const
     [int](#language.types.integer)
      [OPT_THREADSAFE](#eventbufferevent.constants.opt-threadsafe) = 2;

    const
     [int](#language.types.integer)
      [OPT_DEFER_CALLBACKS](#eventbufferevent.constants.opt-defer-callbacks) = 4;

    const
     [int](#language.types.integer)
      [OPT_UNLOCK_CALLBACKS](#eventbufferevent.constants.opt-unlock-callbacks) = 8;

    const
     [int](#language.types.integer)
      [SSL_OPEN](#eventbufferevent.constants.ssl-open) = 0;

    const
     [int](#language.types.integer)
      [SSL_CONNECTING](#eventbufferevent.constants.ssl-connecting) = 1;

    const
     [int](#language.types.integer)
      [SSL_ACCEPTING](#eventbufferevent.constants.ssl-accepting) = 2;

    /* Propiedades */
    public
     [int](#language.types.integer)
      [$fd](#eventbufferevent.props.fd);

    public
     [int](#language.types.integer)
      [$priority](#eventbufferevent.props.priority);

    public
     readonly
     [EventBuffer](#class.eventbuffer)
      [$input](#eventbufferevent.props.input);

    public
     readonly
     [EventBuffer](#class.eventbuffer)
      [$output](#eventbufferevent.props.output);

    /* Métodos */

public
[close](#eventbufferevent.close)(): [void](language.types.void.html)
public
[connect](#eventbufferevent.connect)(

    [string](#language.types.string) $addr

): [bool](#language.types.boolean)
public
[connectHost](#eventbufferevent.connecthost)(

    

    [EventDnsBase](#class.eventdnsbase) $dns_base

,

    

    [string](#language.types.string) $hostname

,

    

    [int](#language.types.integer) $port

,

    

    [int](#language.types.integer) $family
     = EventUtil::AF_UNSPEC

): [bool](#language.types.boolean)
public
[\_\_construct](#eventbufferevent.construct)(

    

    [EventBase](#class.eventbase) $base

,

    

    [mixed](#language.types.mixed) $socket
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $options
     = 0

,

    

    [callable](#language.types.callable) $readcb
     = **[null](#constant.null)**

,

    

    [callable](#language.types.callable) $writecb
     = **[null](#constant.null)**

,

    

    [callable](#language.types.callable) $eventcb
     = **[null](#constant.null)**

,
    [mixed](#language.types.mixed) $arg = **[null](#constant.null)**
)
public
static
[createPair](#eventbufferevent.createpair)(

    [EventBase](#class.eventbase) $base

,

    [int](#language.types.integer) $options
     = 0

): [array](#language.types.array)
public
[disable](#eventbufferevent.disable)(

    [int](#language.types.integer) $events

): [bool](#language.types.boolean)
public
[enable](#eventbufferevent.enable)(

    [int](#language.types.integer) $events

): [bool](#language.types.boolean)
public
[free](#eventbufferevent.free)(): [void](language.types.void.html)
public
[getDnsErrorString](#eventbufferevent.getdnserrorstring)(): [string](#language.types.string)
public
[getEnabled](#eventbufferevent.getenabled)(): [int](#language.types.integer)
public
[getInput](#eventbufferevent.getinput)(): [EventBuffer](#class.eventbuffer)
public
[getOutput](#eventbufferevent.getoutput)(): [EventBuffer](#class.eventbuffer)
public
[read](#eventbufferevent.read)(

    [int](#language.types.integer) $size

): [string](#language.types.string)
public
[readBuffer](#eventbufferevent.readbuffer)(

    [EventBuffer](#class.eventbuffer) $buf

): [bool](#language.types.boolean)
public
[setCallbacks](#eventbufferevent.setcallbacks)(

    

    [callable](#language.types.callable) $readcb

,

    

    [callable](#language.types.callable) $writecb

,

    

    [callable](#language.types.callable) $eventcb

,

    

    [mixed](#language.types.mixed) $arg
    = ?

): [void](language.types.void.html)
public
[setPriority](#eventbufferevent.setpriority)(

    [int](#language.types.integer) $priority

): [bool](#language.types.boolean)
public
[setTimeouts](#eventbufferevent.settimeouts)(

    [float](#language.types.float) $timeout_read

,

    [float](#language.types.float) $timeout_write

): [bool](#language.types.boolean)
public
[setWatermark](#eventbufferevent.setwatermark)(

    [int](#language.types.integer) $events

,

    [int](#language.types.integer) $lowmark

,

    [int](#language.types.integer) $highmark

): [void](language.types.void.html)
public
[sslError](#eventbufferevent.sslerror)(): [string](#language.types.string)
public
static
[sslFilter](#eventbufferevent.sslfilter)(

    

    [EventBase](#class.eventbase) $base

,

    

    [EventBufferEvent](#class.eventbufferevent) $underlying

,

    

    [EventSslContext](#class.eventsslcontext) $ctx

,

    

    [int](#language.types.integer) $state

,

    

    [int](#language.types.integer) $options
     = 0

): [EventBufferEvent](#class.eventbufferevent)
public
[sslGetCipherInfo](#eventbufferevent.sslgetcipherinfo)(): [string](#language.types.string)
public
[sslGetCipherName](#eventbufferevent.sslgetciphername)(): [string](#language.types.string)
public
[sslGetCipherVersion](#eventbufferevent.sslgetcipherversion)(): [string](#language.types.string)
public
[sslGetProtocol](#eventbufferevent.sslgetprotocol)(): [string](#language.types.string)
public
[sslRenegotiate](#eventbufferevent.sslrenegotiate)(): [void](language.types.void.html)
public
static
[sslSocket](#eventbufferevent.sslsocket)(

    

    [EventBase](#class.eventbase) $base

,

    

    [mixed](#language.types.mixed) $socket

,

    

    [EventSslContext](#class.eventsslcontext) $ctx

,

    

    [int](#language.types.integer) $state

,

    

    [int](#language.types.integer) $options
    = ?

): [EventBufferEvent](#class.eventbufferevent)
public
[write](#eventbufferevent.write)(

    [string](#language.types.string) $data

): [bool](#language.types.boolean)
public
[writeBuffer](#eventbufferevent.writebuffer)(

    [EventBuffer](#class.eventbuffer) $buf

): [bool](#language.types.boolean)

}

## Propiedades

      fd



       Descriptor de fichero numérico asociado con el buffer de eventos. Normalmente, representa un socket enlazado. Vale **[null](#constant.null)** si no hay ningún descriptor de fichero (socket) asociado con el buffer de eventos.







      priority



       La prioridad del evento, utilizada para implementar el buffer de eventos.







      input



       Objeto de buffer de entrada subyacente ([EventBuffer](#class.eventbuffer))







      output



       Objeto de buffer de salida subyacente ([EventBuffer](#class.eventbuffer))





## Constantes predefinidas

      **[EventBufferEvent::READING](#eventbufferevent.constants.reading)**



       Un evento ocurre durante la operación de lectura en el bufferevent. Ver otros flags para conocer el tipo de evento.







      **[EventBufferEvent::WRITING](#eventbufferevent.constants.writing)**



       Un evento ocurre durante una operación de escritura en el bufferevent. Ver otros flags para conocer el tipo de evento.







      **[EventBufferEvent::EOF](#eventbufferevent.constants.eof)**



       Se recibe una indicación de fin de fichero en el buffer de eventos.







      **[EventBufferEvent::ERROR](#eventbufferevent.constants.error)**



       Un error ocurre durante una operación bufferevent. Para más información sobre el error, llame al método [EventUtil::getLastSocketErrno()](#eventutil.getlastsocketerrno) y/o [EventUtil::getLastSocketError()](#eventutil.getlastsocketerror).







      **[EventBufferEvent::TIMEOUT](#eventbufferevent.constants.timeout)**









      **[EventBufferEvent::CONNECTED](#eventbufferevent.constants.connected)**



       Termina una conexión solicitada en el bufferevent.







      **[EventBufferEvent::OPT_CLOSE_ON_FREE](#eventbufferevent.constants.opt-close-on-free)**



       Cuando el buffer de eventos es liberado, cierra el transporte subyacente. Esto cerrará el socket subyacente, liberará el buffer de eventos subyacente, etc.







      **[EventBufferEvent::OPT_THREADSAFE](#eventbufferevent.constants.opt-threadsafe)**



       Asigna automáticamente bloqueos para el bufferevent, para hacer segura la utilización de múltiples threads.







      **[EventBufferEvent::OPT_DEFER_CALLBACKS](#eventbufferevent.constants.opt-defer-callbacks)**



       Cuando este flag está definido, el bufferevent pospone todas sus funciones de retrollamada. Ver [» la documentación sobre la programación de red rápida, portable, no bloqueante con Libevent, el posponer de las funciones de retrollamada](http://www.wangafu.net/~nickm/libevent-book/Ref6_bufferevent.html#_deferred_callbacks).







      **[EventBufferEvent::OPT_UNLOCK_CALLBACKS](#eventbufferevent.constants.opt-unlock-callbacks)**



       Por omisión, cuando el bufferevent está definido para ser seguro al nivel de los threads, el bloqueo del buffer de eventos es mantenido, incluso si una función de retrollamada de usuario es llamada. La definición de esta opción permite a Libevent liberar el bloqueo del buffer de eventos cuando la función de retrollamada es llamada.







      **[EventBufferEvent::SSL_OPEN](#eventbufferevent.constants.ssl-open)**



       La negociación SSL se realiza.







      **[EventBufferEvent::SSL_CONNECTING](#eventbufferevent.constants.ssl-connecting)**



       SSL realiza actualmente la negociación como cliente.







      **[EventBufferEvent::SSL_ACCEPTING](#eventbufferevent.constants.ssl-accepting)**



       SSL realiza actualmente la negociación como servidor.





# EventBufferEvent::close

(PECL event &gt;= 1.10.0)

EventBufferEvent::close — Cierra el descriptor de fichero asociado con el buffer de eventos actual

### Descripción

public
**EventBufferEvent::close**(): [void](language.types.void.html)

Cierra el descriptor de fichero asociado con el buffer de eventos actual.

Este método puede ser utilizado en los casos donde la opción
**[EventBufferEvent::OPT_CLOSE_ON_FREE](#eventbufferevent.constants.opt-close-on-free)** no es apropiada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# EventBufferEvent::connect

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::connect — Conecta el descriptor de fichero del búfer de eventos a la dirección proporcionada,
o al socket UNIX

### Descripción

public
**EventBufferEvent::connect**(

    [string](#language.types.string) $addr

): [bool](#language.types.boolean)

Conecta el descriptor de fichero del búfer de eventos a la dirección proporcionada
(opcionalmente, proporcionando el puerto), o al socket UNIX.

Si el socket no está asignado al búfer de eventos, este método
asigna un nuevo socket y lo hace no bloqueante internamente.

Para resolver los nombres DNS (de forma asíncrona), utilice el método
[EventBufferEvent::connectHost()](#eventbufferevent.connecthost).

### Parámetros

     addr



      Debe contener una dirección IP con, opcionalmente, el número del puerto,
      o una ruta hacia el socket UNIX. Los formatos reconocidos son :


[IPv6Address]: port

[IPv6Address]
IPv6Address
IPv4Address:port
IPv4Address
unix:path

      Tenga en cuenta que el prefijo 'unix:' actualmente
      no distingue entre mayúsculas y minúsculas.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con EventBufferEvent::connect()**

&lt;?php
/\*

-   1. Conexión a la dirección 127.0.0.1 en el puerto 80
- llamando al método EventBufferEvent::connect().
-
-   2. Solicitud /index.cphp a través de HTTP/1.0
- utilizando el búfer de salida.
-
-   3. Lee la respuesta de forma asíncrona y la muestra en stdout.
       \*/

/_ Función de retrollamada de lectura _/
function readcb($bev, $base) {
$input = $bev-&gt;getInput();

    while (($n = $input-&gt;remove($buf, 1024)) &gt; 0) {
        echo $buf;
    }

}

/_ Función de retrollamada de evento _/
function eventcb($bev, $events, $base) {
    if ($events &amp; EventBufferEvent::CONNECTED) {
echo "Conectado.\n";
} elseif ($events &amp; (EventBufferEvent::ERROR | EventBufferEvent::EOF)) {
        if ($events &amp; EventBufferEvent::ERROR) {
echo "Error DNS: ", $bev-&gt;getDnsErrorString(), PHP_EOL;
}

        echo "Cierre\n";
        $base-&gt;exit();
        exit("Hecho !\n");
    }

}

$base = new EventBase();

echo "paso 1\n";
$bev = new EventBufferEvent($base, /_ usar socket interno _/ NULL,
EventBufferEvent::OPT_CLOSE_ON_FREE | EventBufferEvent::OPT_DEFER_CALLBACKS);
if (!$bev) {
exit("Fallo al crear el socket bufferevent\n");
}

echo "paso 2\n";
$bev-&gt;setCallbacks("readcb", /* writecb */ NULL, "eventcb", $base);
$bev-&gt;enable(Event::READ | Event::WRITE);

echo "paso 3\n";
/_ Envía la solicitud _/
$output = $bev-&gt;getOutput();
if (!$output-&gt;add(
"GET /index.cphp HTTP/1.0\r\n".
"Connection: Close\r\n\r\n"
)) {
exit("Fallo al añadir la solicitud en el búfer de salida\n");
}

/\* Conexión al host de forma asíncrona.

- Conocemos la IP, y por lo tanto, no necesitamos resolución DNS. \*/
  if (!$bev-&gt;connect("127.0.0.1:80")) {
  exit("Imposible conectar al host\n");
  }

/_ Distribuye los eventos pendientes _/
$base-&gt;dispatch();

Resultado del ejemplo anterior es similar a:

paso 1
paso 2
paso 3
Conectado.
HTTP/1.1 200 OK
Server: nginx/1.2.6
Date: Sat, 09 Mar 2013 10:06:58 GMT
Content-Type: text/html; charset=utf-8
Connection: close
X-Powered-By: PHP/5.4.11--pl2-gentoo

sdfsdfsf
Cierre
Hecho !

**Ejemplo #2 Conexión a un socket UNIX, lectura de la respuesta desde el
servidor, y visualización en una consola**

&lt;?php
class MyUnixSocketClient {
private $base, $bev;

    function __construct($base, $sock_path) {
        $this-&gt;base = $base;
        $this-&gt;bev = new EventBufferEvent($base, NULL, EventBufferEvent::OPT_CLOSE_ON_FREE,
            array ($this, "read_cb"), NULL, array ($this, "event_cb"));

        if (!$this-&gt;bev-&gt;connect("unix:$sock_path")) {
            trigger_error("Fallo al conectar al socket `$sock_path'", E_USER_ERROR);
        }

        $this-&gt;bev-&gt;enable(Event::READ);
    }

    function __destruct() {
        if ($this-&gt;bev) {
            $this-&gt;bev-&gt;free();
            $this-&gt;bev = NULL;
        }
    }

    function dispatch() {
        $this-&gt;base-&gt;dispatch();
    }

    function read_cb($bev, $unused) {
        $in = $bev-&gt;input;

        printf("Recepción de %ld bytes\n", $in-&gt;length);
        printf("----- datos ----\n");
        printf("%ld:\t%s\n", (int) $in-&gt;length, $in-&gt;pullup(-1));

        $this-&gt;bev-&gt;free();
        $this-&gt;bev = NULL;
        $this-&gt;base-&gt;exit(NULL);
    }

    function event_cb($bev, $events, $unused) {
        if ($events &amp; EventBufferEvent::ERROR) {
            echo "Error desde bufferevent\n";
        }

        if ($events &amp; (EventBufferEvent::EOF | EventBufferEvent::ERROR)) {
            $bev-&gt;free();
            $bev = NULL;
        } elseif ($events &amp; EventBufferEvent::CONNECTED) {
            $bev-&gt;output-&gt;add("test\n");
        }
    }

}

if ($argc &lt;= 1) {
    exit("La ruta hacia el socket no está proporcionada\n");
}
$sock_path = $argv[1];

$base = new EventBase();
$cl = new MyUnixSocketClient($base, $sock_path);
$cl-&gt;dispatch();
?&gt;

Resultado del ejemplo anterior es similar a:

Recepción de 5 bytes
----- datos ----
5: test

### Ver también

- [EventBufferEvent::connectHost()](#eventbufferevent.connecthost) - Conexión a un host

# EventBufferEvent::connectHost

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::connectHost — Conexión a un host

### Descripción

public
**EventBufferEvent::connectHost**(

    

    [EventDnsBase](#class.eventdnsbase) $dns_base

,

    

    [string](#language.types.string) $hostname

,

    

    [int](#language.types.integer) $port

,

    

    [int](#language.types.integer) $family
     = EventUtil::AF_UNSPEC

): [bool](#language.types.boolean)

Resuelve el nombre de host DNS, buscando la dirección del tipo
family (constante EventUtil::AF\_\*).
Si la resolución del nombre falla, la función de retrollamada del evento
será llamada con un evento de error. Si la resolución tiene éxito,
se realizará un intento de conexión, de manera similar a como lo hace el método
[EventBufferEvent::connect()](#eventbufferevent.connect).

El parámetro dns_base es opcional.
Puede ser **[null](#constant.null)**, o bien un objeto creado con el método
[EventDnsBase::\_\_construct()](#eventdnsbase.construct).
Para una resolución de nombre de host asíncrona, pase una fuente de evento de base DNS válida. De lo contrario, la resolución del nombre de host
será bloqueante.

**Nota**:

    [EventDnsBase](#class.eventdnsbase) solo está disponible si
    Event está configurado con la opción
    **--with-event-extra**
    (biblioteca event_extra,
    *el soporte de las funcionalidades específicas de libevent
     incluyendo HTTP, DNS y RPC*).

**Nota**:

    **EventBufferEvent::connectHost()**
    requiere libevent-2.0.3-alpha o posteriores.

### Parámetros

     dns_base



      Objeto [EventDnsBase](#class.eventdnsbase) en el caso
      donde el DNS debe ser resuelto de manera asíncrona. De lo contrario, **[null](#constant.null)**.







     hostname



      El nombre de host al cual se intenta realizar la conexión.
      Los formatos reconocidos son:


www.example.com (hostname)
1.2.3.4 (ipv4address)
::1 (ipv6address)
[::1] ([ipv6address])

     port



      El número del puerto







     family



      Familia de la dirección.
      **[EventUtil::AF_UNSPEC](#eventutil.constants.af-unspec)**,
      **[EventUtil::AF_INET](#eventutil.constants.af-inet)** o
      **[EventUtil::AF_INET6](#eventutil.constants.af-inet6)**. Ver las
      [constantes EventUtil](#eventutil.constants).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con EventBufferEvent::connectHost()**

&lt;?php
/_ Función de retrollamada de lectura _/
function readcb($bev, $base) {
    //$input = $bev-&gt;input; //$bev-&gt;getInput();

    //$pos = $input-&gt;search("TTP");
    $pos = $bev-&gt;input-&gt;search("TTP");

    while (($n = $bev-&gt;input-&gt;remove($buf, 1024)) &gt; 0) {
        echo $buf;
    }

}

/_ Función de retrollamada del evento _/
function eventcb($bev, $events, $base) {
    if ($events &amp; EventBufferEvent::CONNECTED) {
echo "Conectado.\n";
} elseif ($events &amp; (EventBufferEvent::ERROR | EventBufferEvent::EOF)) {
        if ($events &amp; EventBufferEvent::ERROR) {
echo "Error DNS: ", $bev-&gt;getDnsErrorString(), PHP_EOL;
}

        echo "Cerrando\n";
        $base-&gt;exit();
        exit("Hecho !\n");
    }

}

$base = new EventBase();

$dns_base = new EventDnsBase($base, TRUE); // Resolución DNS asíncrona
if (!$dns_base) {
exit("Fallo en la inicialización de la base DNS\n");
}

$bev = new EventBufferEvent($base, /_ uso de un socket interno _/ NULL,
EventBufferEvent::OPT_CLOSE_ON_FREE | EventBufferEvent::OPT_DEFER_CALLBACKS,
"readcb", /_ writecb _/ NULL, "eventcb", $base
);
if (!$bev) {
exit("Fallo al crear el socket bufferevent\n");
}

//$bev-&gt;setCallbacks("readcb", /* writecb */ NULL, "eventcb", $base);
$bev-&gt;enable(Event::READ | Event::WRITE);

$output = $bev-&gt;output; //$bev-&gt;getOutput();
if (!$output-&gt;add(
    "GET {$argv[2]} HTTP/1.0\r\n".
"Host: {$argv[1]}\r\n".
"Connection: Close\r\n\r\n"
)) {
exit("Fallo al añadir la solicitud en el búfer de salida\n");
}

if (!$bev-&gt;connectHost($dns_base, $argv[1], 80, EventUtil::AF_UNSPEC)) {
    exit("Imposible conectar al host {$argv[1]}\n");
}

$base-&gt;dispatch();
?&gt;

Resultado del ejemplo anterior es similar a:

Conectado.
HTTP/1.0 301 Moved Permanently
Location: http://www.google.co.uk/
Content-Type: text/html; charset=UTF-8
Date: Sat, 09 Mar 2013 12:21:19 GMT
Expires: Mon, 08 Apr 2013 12:21:19 GMT
Cache-Control: public, max-age=2592000
Server: gws
Content-Length: 221
X-XSS-Protection: 1; mode=block
X-Frame-Options: SAMEORIGIN

&lt;HTML&gt;&lt;HEAD&gt;&lt;meta http-equiv="content-type" content="text/html;charset=utf-8"&gt;
&lt;TITLE&gt;301 Moved&lt;/TITLE&gt;&lt;/HEAD&gt;&lt;BODY&gt;
&lt;H1&gt;301 Moved&lt;/H1&gt;
The document has moved
&lt;A HREF="http://www.google.co.uk/"&gt;here&lt;/A&gt;.
&lt;/BODY&gt;&lt;/HTML&gt;
Cerrando
Hecho !

### Ver también

- [EventBufferEvent::connect()](#eventbufferevent.connect) - Conecta el descriptor de fichero del búfer de eventos a la dirección proporcionada,
  o al socket UNIX

# EventBufferEvent::\_\_construct

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::\_\_construct — Construye un objeto EventBufferEvent

### Descripción

public
**EventBufferEvent::\_\_construct**(

    

    [EventBase](#class.eventbase) $base

,

    

    [mixed](#language.types.mixed) $socket
     = **[null](#constant.null)**

,

    

    [int](#language.types.integer) $options
     = 0

,

    

    [callable](#language.types.callable) $readcb
     = **[null](#constant.null)**

,

    

    [callable](#language.types.callable) $writecb
     = **[null](#constant.null)**

,

    

    [callable](#language.types.callable) $eventcb
     = **[null](#constant.null)**

,
    [mixed](#language.types.mixed) $arg = **[null](#constant.null)**
)

Crea un buffer de eventos en un socket, un flujo o un descriptor de fichero. Pasar el valor **[null](#constant.null)** al parámetro
socket significa que el socket debe ser creado posteriormente, es decir, a través del método
[EventBufferEvent::connect()](#eventbufferevent.connect).

### Parámetros

     base



      Evento base que debe ser asociado con el nuevo buffer de eventos.







     socket



      Debe ser creado como flujo (no necesariamente a través de la extensión
      sockets)







     options



      Una constante entre las constantes
      [EventBufferEvent::OPT_*](#eventbufferevent.constants),
      o 0.







     readcb



      Función de retrollamada para los eventos de lectura. Ver también las
      [funciones de retrollamada del buffer de eventos](#eventbufferevent.about.callbacks).







     writecb



      Función de retrollamada para los eventos de escritura. Ver también las
      [funciones de retrollamada del buffer de eventos](#eventbufferevent.about.callbacks).







     eventcb



      Función de retrollamada para los eventos de cambio de estado. Ver también las
      [funciones de retrollamada del buffer de eventos](#eventbufferevent.about.callbacks).







     arg



      Una variable que será pasada a todas las funciones de retrollamada.


### Ver también

- [EventBufferEvent::sslFilter()](#eventbufferevent.sslfilter) - Crea un nuevo búfer de evento SSL, cuyos datos
  serán enviados a través de otro búfer de evento

- [EventBufferEvent::sslSocket()](#eventbufferevent.sslsocket) - Crea un nuevo buffer SSL cuyos datos serán enviados a través de un socket SSL

# EventBufferEvent::createPair

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::createPair — Crea dos eventos de buffer conectados entre sí

### Descripción

public
static
**EventBufferEvent::createPair**(

    [EventBase](#class.eventbase) $base

,

    [int](#language.types.integer) $options
     = 0

): [array](#language.types.array)

Devuelve un array de dos objetos [EventBufferEvent](#class.eventbufferevent)
conectados entre sí. Todas las opciones habituales son soportadas,
salvo **[EventBufferEvent::OPT_CLOSE_ON_FREE](#eventbufferevent.constants.opt-close-on-free)**
que no tiene ningún efecto, y **[EventBufferEvent::OPT_DEFER_CALLBACKS](#eventbufferevent.constants.opt-defer-callbacks)**
que siempre está activado.

### Parámetros

     base



      Evento base asociado.







     options



      Constantes <a href="" class="link">EventBufferEvent::OPT_*</a>
      combinadas con el operador OR.


### Valores devueltos

Devuelve un array de dos objetos
[EventBufferEvent](#class.eventbufferevent)
conectados entre sí.

### Historial de cambios

       Versión
       Descripción






       PECL event 1.9.0

        El método es ahora estático.





# EventBufferEvent::disable

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::disable — Desactiva los eventos de lectura, escritura o ambos en un evento de búfer

### Descripción

public
**EventBufferEvent::disable**(

    [int](#language.types.integer) $events

): [bool](#language.types.boolean)

Desactiva los eventos **[Event::READ](#event.constants.read)**,
**[Event::WRITE](#event.constants.write)**, o
**[Event::READ](#event.constants.read)**|**[Event::WRITE](#event.constants.write)**
en un evento de búfer.

### Parámetros

     events




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBufferEvent::enable()](#eventbufferevent.enable) - Activa los eventos de lectura, escritura, o ambos, en un evento de buffer

# EventBufferEvent::enable

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::enable — Activa los eventos de lectura, escritura, o ambos, en un evento de buffer

### Descripción

public
**EventBufferEvent::enable**(

    [int](#language.types.integer) $events

): [bool](#language.types.boolean)

Activa los eventos **[Event::READ](#event.constants.read)**,
**[Event::WRITE](#event.constants.write)**, o
**[Event::READ](#event.constants.read)**|**[Event::WRITE](#event.constants.write)**
en un evento de buffer.

### Parámetros

     events



      **[Event::READ](#event.constants.read)**, **[Event::WRITE](#event.constants.write)**, o
      **[Event::READ](#event.constants.read)**|**[Event::WRITE](#event.constants.write)**
      en un evento de buffer.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBufferEvent::disable()](#eventbufferevent.disable) - Desactiva los eventos de lectura, escritura o ambos en un evento de búfer

# EventBufferEvent::free

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::free — Libera un evento de búfer

### Descripción

public
**EventBufferEvent::free**(): [void](language.types.void.html)

Libera todos los recursos asignados por un evento
de búfer.

Generalmente, no es necesario llamar a este método, ya que normalmente, la liberación total de los recursos asociados se realiza
en los destructores internos del objeto. Sin embargo, puede ocurrir
que un script largo asigne muchas instancias, o bien que un script
utilice una gran cantidad de memoria; en estos casos, puede ser necesario
liberar los recursos lo más rápido posible. Asimismo, el uso del método
**EventBufferEvent::free()** puede ser útil
para proteger la ejecución del script de alcanzar el valor de
memory_limit.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# EventBufferEvent::getDnsErrorString

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::getDnsErrorString — Devuelve un string que describe el último error DNS

### Descripción

public
**EventBufferEvent::getDnsErrorString**(): [string](#language.types.string)

Devuelve un string que describe el último error DNS durante
la ejecución del método [EventBufferEvent::connectHost()](#eventbufferevent.connecthost)
o un string vacío si no se detecta ningún error DNS.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string que describe el error DNS, o un string vacío si no hay
ningún error.

### Ver también

- [EventBufferEvent::connectHost()](#eventbufferevent.connecthost) - Conexión a un host

# EventBufferEvent::getEnabled

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::getEnabled — Devuelve una máscara de eventos actualmente activos en el búfer de eventos

### Descripción

public
**EventBufferEvent::getEnabled**(): [int](#language.types.integer)

Devuelve una máscara de eventos actualmente activos en el búfer de eventos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero que representa una máscara de eventos actualmente
activos en el búfer de eventos.

### Ver también

- [EventBufferEvent::enable()](#eventbufferevent.enable) - Activa los eventos de lectura, escritura, o ambos, en un evento de buffer

- [EventBufferEvent::disable()](#eventbufferevent.disable) - Desactiva los eventos de lectura, escritura o ambos en un evento de búfer

# EventBufferEvent::getInput

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::getInput — Devuelve el búfer de entrada asociado con el búfer de eventos actual

### Descripción

public
**EventBufferEvent::getInput**(): [EventBuffer](#class.eventbuffer)

Devuelve el búfer de entrada asociado con el búfer de eventos actual.
Un búfer de entrada es un almacenamiento para los datos a leer.

Téngase en cuenta que también hay propiedades de
[entrada](#eventbufferevent.props.input)
para la clase [EventBufferEvent](#class.eventbufferevent).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una instancia del búfer de entrada
[EventBuffer](#class.eventbuffer) asociado con el búfer de eventos actual.

### Ejemplos

**Ejemplo #1 Función de retrollamada para un evento de lectura en el búfer**

&lt;?php
function readcb($bev, $base) {
    $input = $bev-&gt;input; //$bev-&gt;getInput();

    while (($n = $input-&gt;remove($buf, 1024)) &gt; 0) {
        echo $buf;
    }

}
?&gt;

### Ver también

- [EventBufferEvent::getOutput()](#eventbufferevent.getoutput) - Devuelve el búfer de salida asociado con el búfer de evento actual

# EventBufferEvent::getOutput

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::getOutput — Devuelve el búfer de salida asociado con el búfer de evento actual

### Descripción

public
**EventBufferEvent::getOutput**(): [EventBuffer](#class.eventbuffer)

Devuelve el búfer de salida asociado con el búfer de evento actual. Un búfer de salida es un almacenamiento para los datos a escribir.

Tenga en cuenta que también hay propiedades de
[salida](#eventbufferevent.props.output)
para la clase [EventBufferEvent](#class.eventbufferevent).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una instancia del búfer de salida
[EventBuffer](#class.eventbuffer) asociado con el búfer de eventos actual.

### Ejemplos

**Ejemplo #1 Ejemplo con EventBufferEvent::getOutput()**

&lt;?php
$base = new EventBase();

$dns_base = new EventDnsBase($base, TRUE); // Uso de la resolución async DNS
if (!$dns_base) {
exit("Fallo al inicializar la base DNS\n");
}

$bev = new EventBufferEvent($base, /_ usar socket interno _/ NULL,
EventBufferEvent::OPT_CLOSE_ON_FREE | EventBufferEvent::OPT_DEFER_CALLBACKS,
"readcb", /_ writecb _/ NULL, "eventcb", $base
);
if (!$bev) {
exit("Fallo al crear el socket bufferevent\n");
}

$bev-&gt;enable(Event::READ | Event::WRITE);

$output = $bev-&gt;getOutput();
if (!$output-&gt;add(
"GET {$argv[2]} HTTP/1.0\r\n".
    "Host: {$argv[1]}\r\n".
"Connection: Close\r\n\r\n"
)) {
exit("Fallo al añadir la solicitud en el búfer de salida\n");
}

/_ ... _/
?&gt;

### Ver también

- [EventBufferEvent::getInput()](#eventbufferevent.getinput) - Devuelve el búfer de entrada asociado con el búfer de eventos actual

# EventBufferEvent::read

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::read — Lee los datos del búfer

### Descripción

public
**EventBufferEvent::read**(

    [int](#language.types.integer) $size

): [string](#language.types.string)

Elimina los size bytes del búfer
de entrada. Devuelve un string de datos leídos
desde el búfer de entrada.

### Parámetros

     size



      Número máximo de bytes a leer


### Valores devueltos

Devuelve el string de datos leídos desde el búfer de entrada.

### Ver también

- [EventBufferEvent::readBuffer()](#eventbufferevent.readbuffer) - Vacía el contenido entero del búfer de entrada y lo coloca en el búfer

# EventBufferEvent::readBuffer

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::readBuffer — Vacía el contenido entero del búfer de entrada y lo coloca en el búfer

### Descripción

public
**EventBufferEvent::readBuffer**(

    [EventBuffer](#class.eventbuffer) $buf

): [bool](#language.types.boolean)

Vacía el contenido entero del búfer de entrada y lo coloca en el búfer
buf.

### Parámetros

     buf



      Búfer objetivo


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBufferEvent::read()](#eventbufferevent.read) - Lee los datos del búfer

# EventBufferEvent::setCallbacks

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::setCallbacks — Asigna las funciones de retrollamada para la lectura, la escritura y los estados de eventos

### Descripción

public
**EventBufferEvent::setCallbacks**(

    

    [callable](#language.types.callable) $readcb

,

    

    [callable](#language.types.callable) $writecb

,

    

    [callable](#language.types.callable) $eventcb

,

    

    [mixed](#language.types.mixed) $arg
    = ?

): [void](language.types.void.html)

Asigna las funciones de retrollamada para la lectura, la escritura y los estados de eventos.

### Parámetros

     readcb



      Función de retrollamada para un evento de lectura.
      Véase las
      [funciones de
       retrollamada para los tampones de eventos](#eventbufferevent.about.callbacks).







     writecb



      Función de retrollamada para un evento de escritura.
      Véase las
      [funciones de
       retrollamada para los tampones de eventos](#eventbufferevent.about.callbacks).







     eventcb



      Función de retrollamada para un evento de cambio de estado.
      Véase las
      [funciones de
       retrollamada para los tampones de eventos](#eventbufferevent.about.callbacks).







     arg



      Una variable que será pasada a todas las funciones de retrollamada.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EventBufferEvent::\_\_construct()](#eventbufferevent.construct) - Construye un objeto EventBufferEvent

# EventBufferEvent::setPriority

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::setPriority — Asigna una prioridad para un búfer de eventos

### Descripción

public
**EventBufferEvent::setPriority**(

    [int](#language.types.integer) $priority

): [bool](#language.types.boolean)

Asigna una prioridad para un búfer de eventos.

**Advertencia**

    Solo soportado para los sockets de búfer de eventos.

### Parámetros

     priority



      Valor de la prioridad.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# EventBufferEvent::setTimeouts

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::setTimeouts — Define el modo de lectura y escritura para el tiempo de espera máximo de un búfer de eventos

### Descripción

public
**EventBufferEvent::setTimeouts**(

    [float](#language.types.float) $timeout_read

,

    [float](#language.types.float) $timeout_write

): [bool](#language.types.boolean)

Define el modo de lectura y escritura para el tiempo de espera máximo de un búfer de eventos.

### Parámetros

     timeout_read



      La lectura del tiempo de espera máximo







     timeout_write



      La escritura del tiempo de espera máximo


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# EventBufferEvent::setWatermark

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::setWatermark — Activa la lectura, y/o la escritura de las marcas de agua

### Descripción

public
**EventBufferEvent::setWatermark**(

    [int](#language.types.integer) $events

,

    [int](#language.types.integer) $lowmark

,

    [int](#language.types.integer) $highmark

): [void](language.types.void.html)

Activa la lectura, la escritura o ambas para las _marcas de agua_
de un búfer de eventos.

Una marca de agua de búfer de eventos es una porción, un valor que especifica
el número de bytes a leer o escribir antes de llamar a la función de retrollamada.
Por omisión, cada evento de lectura/escritura lanza una función de retrollamada.
Vea también la siguiente página (en inglés):
[» Fast
portable non-blocking network programming with Libevent: Callbacks and watermarks](http://www.wangafu.net/~nickm/libevent-book/Ref6_bufferevent.html#_callbacks_and_watermarks)

### Parámetros

     events



      Máscara de constantes **[Event::READ](#event.constants.read)**,
      **[Event::WRITE](#event.constants.write)**, o ambas.







     lowmark



      Valor mínimo de la marca de agua.







     highmark



      Valor máximo de la marca de agua. El valor 0
      significa "sin límite".


### Valores devueltos

No se retorna ningún valor.

# EventBufferEvent::sslError

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::sslError — Devuelve el error OpenSSL más reciente reportado por el buffer de eventos

### Descripción

public
**EventBufferEvent::sslError**(): [string](#language.types.string)

Devuelve el error OpenSSL más reciente reportado por el buffer de eventos.

**Nota**:

    Este método solo está disponible si
    Event ha sido compilado con soporte OpenSSL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la cadena de error OpenSSL reportada por el buffer de eventos o
$false; si no hay más errores que devolver.

### Ejemplos

**Ejemplo #1 Ejemplo con EventBufferEvent::sslError()**

&lt;?php
// Esta función de retrollamada será llamada cuando ocurran eventos
// en el oyente de eventos, es decir, cierre de conexión, o cuando ocurra
// un error.
function ssl_event_cb($bev, $events, $ctx) {
    if ($events &amp; EventBufferEvent::ERROR) {
// Recupera los errores desde la pila de errores SSL
while ($err = $bev-&gt;sslError()) {
fprintf(STDERR, "Bufferevent error %s.\n", $err);
}
}

    if ($events &amp; (EventBufferEvent::EOF | EventBufferEvent::ERROR)) {
        $bev-&gt;free();
    }

}
?&gt;

### Ver también

- [EventBufferEvent::sslRenegotiate()](#eventbufferevent.sslrenegotiate) - Solicita al búfer de eventos iniciar una renegociación SSL

# EventBufferEvent::sslFilter

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::sslFilter — Crea un nuevo búfer de evento SSL, cuyos datos
serán enviados a través de otro búfer de evento

### Descripción

public
static
**EventBufferEvent::sslFilter**(

    

    [EventBase](#class.eventbase) $base

,

    

    [EventBufferEvent](#class.eventbufferevent) $underlying

,

    

    [EventSslContext](#class.eventsslcontext) $ctx

,

    

    [int](#language.types.integer) $state

,

    

    [int](#language.types.integer) $options
     = 0

): [EventBufferEvent](#class.eventbufferevent)

Crea un nuevo búfer de evento SSL, cuyos datos
serán enviados a través de otro búfer de evento.

**Nota**:

    Este método solo está disponible si
    Event ha sido compilado con soporte OpenSSL.

### Parámetros

     base



      Evento base asociado.







     underlying



      Un socket de búfer de evento a utilizar para este SSL.







     ctx



      Objeto de la clase [EventSslContext](#class.eventsslcontext).







     state



      El estado actual de la conexión SSL:
      **[EventBufferEvent::SSL_OPEN](#eventbufferevent.constants.ssl-open)**,
      **[EventBufferEvent::SSL_ACCEPTING](#eventbufferevent.constants.ssl-accepting)** o
      **[EventBufferEvent::SSL_CONNECTING](#eventbufferevent.constants.ssl-connecting)**.







     options



      Una o más opciones de búfer de evento.


### Valores devueltos

Devuelve un nuevo objeto [EventBufferEvent](#class.eventbufferevent) SSL.

### Ejemplos

    **Ejemplo #1 Ejemplo de servidor SMTP**

&lt;?php
/\*

- Autor: Andrew Rose &lt;hello at andrewrose dot co dot uk&gt;
-
- Uso:
-   1. Prepare el certificado cert.pem y la clave privada privkey.pem.
-   2. Inicie el script del servidor
-   3. Abra la conexión TLS, i.e. :
-      $ openssl s_client -connect localhost:25 -starttls smtp -crlf
-   4. Comience a probar los comandos listados en el método `cmd` a continuación.
       \*/

class Handler {
public $domainName = FALSE;
public $connections = [];
public $buffers = [];
public $maxRead = 256000;

    public function __construct() {
        $this-&gt;ctx = new EventSslContext(EventSslContext::SSLv3_SERVER_METHOD, [
            EventSslContext::OPT_LOCAL_CERT  =&gt; 'cert.pem',
            EventSslContext::OPT_LOCAL_PK    =&gt; 'privkey.pem',
            //EventSslContext::OPT_PASSPHRASE  =&gt; '',
            EventSslContext::OPT_VERIFY_PEER =&gt; false, // cambiar a TRUE con certificados auténticos
            EventSslContext::OPT_ALLOW_SELF_SIGNED =&gt; true // cambiar a FALSE con certificados auténticos
        ]);

        $this-&gt;base = new EventBase();
        if (!$this-&gt;base) {
            exit("Imposible abrir la base del evento\n");
        }

        if (!$this-&gt;listener = new EventListener($this-&gt;base,
            [$this, 'ev_accept'],
            $this-&gt;ctx,
            EventListener::OPT_CLOSE_ON_FREE | EventListener::OPT_REUSEABLE,
            -1,
            '0.0.0.0:25'))
        {
            exit("Imposible crear el oyente\n");
        }

        $this-&gt;listener-&gt;setErrorCallback([$this, 'ev_error']);
        $this-&gt;base-&gt;dispatch();
    }

    public function ev_accept($listener, $fd, $address, $ctx) {
        static $id = 0;
        $id += 1;

        $this-&gt;connections[$id]['clientData'] = '';
        $this-&gt;connections[$id]['cnx'] = new EventBufferEvent($this-&gt;base, $fd,
            EventBufferEvent::OPT_CLOSE_ON_FREE);

        if (!$this-&gt;connections[$id]['cnx']) {
            echo "Fallo en la creación del buffer\n";
            $this-&gt;base-&gt;exit(NULL);
            exit(1);
        }

        $this-&gt;connections[$id]['cnx']-&gt;setCallbacks([$this, "ev_read"], NULL,
            [$this, 'ev_error'], $id);
        $this-&gt;connections[$id]['cnx']-&gt;enable(Event::READ | Event::WRITE);

        $this-&gt;ev_write($id, '220 '.$this-&gt;domainName." wazzzap?\r\n");
    }

    function ev_error($listener, $ctx) {
        $errno = EventUtil::getLastSocketErrno();

        fprintf(STDERR, "Se recibe el error %d (%s) en el oyente. Detención.\n",
            $errno, EventUtil::getLastSocketError());

        if ($errno != 0) {
            $this-&gt;base-&gt;exit(NULL);
            exit();
        }
    }

    public function ev_close($id) {
        $this-&gt;connections[$id]['cnx']-&gt;disable(Event::READ | Event::WRITE);
        unset($this-&gt;connections[$id]);
    }

    protected function ev_write($id, $string) {
        echo 'S('.$id.'): '.$string;
        $this-&gt;connections[$id]['cnx']-&gt;write($string);
    }

    public function ev_read($buffer, $id) {
        while($buffer-&gt;input-&gt;length &gt; 0) {
            $this-&gt;connections[$id]['clientData'] .= $buffer-&gt;input-&gt;read($this-&gt;maxRead);
            $clientDataLen = strlen($this-&gt;connections[$id]['clientData']);

            if($this-&gt;connections[$id]['clientData'][$clientDataLen-1] == "\n"
                &amp;&amp; $this-&gt;connections[$id]['clientData'][$clientDataLen-2] == "\r")
            {
                // Elimina los caracteres \r\n al final
                $line = substr($this-&gt;connections[$id]['clientData'], 0,
                    strlen($this-&gt;connections[$id]['clientData']) - 2);

                $this-&gt;connections[$id]['clientData'] = '';
                $this-&gt;cmd($buffer, $id, $line);
            }
        }
    }

    protected function cmd($buffer, $id, $line) {
        switch ($line) {
            case strncmp('EHLO ', $line, 4):
                $this-&gt;ev_write($id, "250-STARTTLS\r\n");
                $this-&gt;ev_write($id, "250 OK ehlo\r\n");
                break;

            case strncmp('HELO ', $line, 4):
                $this-&gt;ev_write($id, "250-STARTTLS\r\n");
                $this-&gt;ev_write($id, "250 OK helo\r\n");
                break;

            case strncmp('QUIT', $line, 3):
                $this-&gt;ev_write($id, "250 OK quit\r\n");
                $this-&gt;ev_close($id);
                break;

            case strncmp('STARTTLS', $line, 3):
                $this-&gt;ev_write($id, "220 Ready to start TLS\r\n");
                $this-&gt;connections[$id]['cnx'] = EventBufferEvent::sslFilter($this-&gt;base,
                    $this-&gt;connections[$id]['cnx'], $this-&gt;ctx,
                    EventBufferEvent::SSL_ACCEPTING,
                    EventBufferEvent::OPT_CLOSE_ON_FREE);
                $this-&gt;connections[$id]['cnx']-&gt;setCallbacks([$this, "ev_read"], NULL, [$this, 'ev_error'], $id);
                $this-&gt;connections[$id]['cnx']-&gt;enable(Event::READ | Event::WRITE);
                break;

            default:
                echo 'Comando desconocido : '.$line."\n";
                break;
        }
    }

}

new Handler();

### Ver también

- [EventBufferEvent::sslSocket()](#eventbufferevent.sslsocket) - Crea un nuevo buffer SSL cuyos datos serán enviados a través de un socket SSL

# EventBufferEvent::sslGetCipherInfo

(PECL event &gt;= 1.10.0)

EventBufferEvent::sslGetCipherInfo — Devuelve una descripción textual de un cipher

### Descripción

public
**EventBufferEvent::sslGetCipherInfo**(): [string](#language.types.string)

Recupera la descripción del cipher actual a través de la función
SSL_CIPHER_description de la API SSL (ver
la página man de _SSL_CIPHER_get_name(3)_).

**Nota**:

    Esta función solo está disponible si
    Event ha sido compilado con soporte
    OpenSSL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una descripción textual del cipher en caso de éxito,
o bien **[false](#constant.false)** si ocurre un error.

# EventBufferEvent::sslGetCipherName

(PECL event &gt;= 1.10.0)

EventBufferEvent::sslGetCipherName — Devuelve el nombre del cipher actual para la conexión SSL

### Descripción

public
**EventBufferEvent::sslGetCipherName**(): [string](#language.types.string)

Recupera el nombre del cipher actual para la conexión SSL.

**Nota**:

    Esta función solo está disponible si
    Event ha sido compilado con soporte
    OpenSSL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del cipher actual para la conexión SSL o **[false](#constant.false)**
en caso de error.

# EventBufferEvent::sslGetCipherVersion

(PECL event &gt;= 1.10.0)

EventBufferEvent::sslGetCipherVersion — Devuelve la versión del cipher utilizado para la conexión SSL actual

### Descripción

public
**EventBufferEvent::sslGetCipherVersion**(): [string](#language.types.string)

Recupera la versión del cipher utilizado para la conexión SSL actual.

**Nota**:

    Esta función solo está disponible si
    Event ha sido compilado con soporte
    OpenSSL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la versión del cipher utilizado para la conexión SSL actual
o **[false](#constant.false)** en caso de error.

# EventBufferEvent::sslGetProtocol

(PECL event &gt;= 1.10.0)

EventBufferEvent::sslGetProtocol — Devuelve el nombre del protocolo utilizado para la conexión SSL actual

### Descripción

public
**EventBufferEvent::sslGetProtocol**(): [string](#language.types.string)

Devuelve el nombre del protocolo utilizado para la conexión SSL actual.

**Nota**:

    Esta función solo está disponible si
    Event ha sido compilado con soporte
    OpenSSL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del protocolo utilizado para la conexión SSL actual.

# EventBufferEvent::sslRenegotiate

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::sslRenegotiate — Solicita al búfer de eventos iniciar una renegociación SSL

### Descripción

public
**EventBufferEvent::sslRenegotiate**(): [void](language.types.void.html)

Solicita al búfer de eventos iniciar una renegociación SSL.

**Advertencia**

    La llamada a este método solicita a SSL una renegociación, y al búfer de eventos llamar a la función de retrollamada apropiada. Es un método muy avanzado; solo debe ser llamado si se sabe perfectamente lo que se hace, especialmente desde algunas versiones SSL donde se han actualizado fallas de seguridad durante la renegociación.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# EventBufferEvent::sslSocket

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::sslSocket — Crea un nuevo buffer SSL cuyos datos serán enviados a través de un socket SSL

### Descripción

public
static
**EventBufferEvent::sslSocket**(

    

    [EventBase](#class.eventbase) $base

,

    

    [mixed](#language.types.mixed) $socket

,

    

    [EventSslContext](#class.eventsslcontext) $ctx

,

    

    [int](#language.types.integer) $state

,

    

    [int](#language.types.integer) $options
    = ?

): [EventBufferEvent](#class.eventbufferevent)

Crea un nuevo buffer SSL cuyos datos serán
enviados a través de un socket SSL.

### Parámetros

     base



      Evento base asociado.







     socket



      Socket a utilizar para este SSL. Puede ser un flujo, un recurso
      de socket, un descriptor numérico de fichero, o **[null](#constant.null)**. Si el
      argumento socket es **[null](#constant.null)**, se asume
      que el descriptor de fichero para este socket será asignado posteriormente
      a través del método [EventBufferEvent::connectHost()](#eventbufferevent.connecthost).







     ctx



      Objeto de la clase [EventSslContext](#class.eventsslcontext).







     state



      El estado actual de la conexión SSL:
      **[EventBufferEvent::SSL_OPEN](#eventbufferevent.constants.ssl-open)**,
      **[EventBufferEvent::SSL_ACCEPTING](#eventbufferevent.constants.ssl-accepting)** o
      **[EventBufferEvent::SSL_CONNECTING](#eventbufferevent.constants.ssl-connecting)**.







     options



      Las opciones del buffer de evento.


### Valores devueltos

Devuelve un objeto [EventBufferEvent](#class.eventbufferevent).

### Ver también

- [EventBufferEvent::sslFilter()](#eventbufferevent.sslfilter) - Crea un nuevo búfer de evento SSL, cuyos datos
  serán enviados a través de otro búfer de evento

# EventBufferEvent::write

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::write — Añade datos a un buffer de evento de salida

### Descripción

public
**EventBufferEvent::write**(

    [string](#language.types.string) $data

): [bool](#language.types.boolean)

Añade datos a un buffer de evento de salida.

### Parámetros

     data



      Datos a añadir al buffer.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBufferEvent::writeBuffer()](#eventbufferevent.writebuffer) - Añade el contenido entero de un buffer en un buffer de evento de salida

# EventBufferEvent::writeBuffer

(PECL event &gt;= 1.2.6-beta)

EventBufferEvent::writeBuffer — Añade el contenido entero de un buffer en un buffer de evento de salida

### Descripción

public
**EventBufferEvent::writeBuffer**(

    [EventBuffer](#class.eventbuffer) $buf

): [bool](#language.types.boolean)

Añade el contenido entero de un buffer en un buffer de evento de salida.

### Parámetros

     buf



      Objeto [EventBuffer](#class.eventbuffer) fuente.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBufferEvent::write()](#eventbufferevent.write) - Añade datos a un buffer de evento de salida

## Tabla de contenidos

- [EventBufferEvent::close](#eventbufferevent.close) — Cierra el descriptor de fichero asociado con el buffer de eventos actual
- [EventBufferEvent::connect](#eventbufferevent.connect) — Conecta el descriptor de fichero del búfer de eventos a la dirección proporcionada,
  o al socket UNIX
- [EventBufferEvent::connectHost](#eventbufferevent.connecthost) — Conexión a un host
- [EventBufferEvent::\_\_construct](#eventbufferevent.construct) — Construye un objeto EventBufferEvent
- [EventBufferEvent::createPair](#eventbufferevent.createpair) — Crea dos eventos de buffer conectados entre sí
- [EventBufferEvent::disable](#eventbufferevent.disable) — Desactiva los eventos de lectura, escritura o ambos en un evento de búfer
- [EventBufferEvent::enable](#eventbufferevent.enable) — Activa los eventos de lectura, escritura, o ambos, en un evento de buffer
- [EventBufferEvent::free](#eventbufferevent.free) — Libera un evento de búfer
- [EventBufferEvent::getDnsErrorString](#eventbufferevent.getdnserrorstring) — Devuelve un string que describe el último error DNS
- [EventBufferEvent::getEnabled](#eventbufferevent.getenabled) — Devuelve una máscara de eventos actualmente activos en el búfer de eventos
- [EventBufferEvent::getInput](#eventbufferevent.getinput) — Devuelve el búfer de entrada asociado con el búfer de eventos actual
- [EventBufferEvent::getOutput](#eventbufferevent.getoutput) — Devuelve el búfer de salida asociado con el búfer de evento actual
- [EventBufferEvent::read](#eventbufferevent.read) — Lee los datos del búfer
- [EventBufferEvent::readBuffer](#eventbufferevent.readbuffer) — Vacía el contenido entero del búfer de entrada y lo coloca en el búfer
- [EventBufferEvent::setCallbacks](#eventbufferevent.setcallbacks) — Asigna las funciones de retrollamada para la lectura, la escritura y los estados de eventos
- [EventBufferEvent::setPriority](#eventbufferevent.setpriority) — Asigna una prioridad para un búfer de eventos
- [EventBufferEvent::setTimeouts](#eventbufferevent.settimeouts) — Define el modo de lectura y escritura para el tiempo de espera máximo de un búfer de eventos
- [EventBufferEvent::setWatermark](#eventbufferevent.setwatermark) — Activa la lectura, y/o la escritura de las marcas de agua
- [EventBufferEvent::sslError](#eventbufferevent.sslerror) — Devuelve el error OpenSSL más reciente reportado por el buffer de eventos
- [EventBufferEvent::sslFilter](#eventbufferevent.sslfilter) — Crea un nuevo búfer de evento SSL, cuyos datos
  serán enviados a través de otro búfer de evento
- [EventBufferEvent::sslGetCipherInfo](#eventbufferevent.sslgetcipherinfo) — Devuelve una descripción textual de un cipher
- [EventBufferEvent::sslGetCipherName](#eventbufferevent.sslgetciphername) — Devuelve el nombre del cipher actual para la conexión SSL
- [EventBufferEvent::sslGetCipherVersion](#eventbufferevent.sslgetcipherversion) — Devuelve la versión del cipher utilizado para la conexión SSL actual
- [EventBufferEvent::sslGetProtocol](#eventbufferevent.sslgetprotocol) — Devuelve el nombre del protocolo utilizado para la conexión SSL actual
- [EventBufferEvent::sslRenegotiate](#eventbufferevent.sslrenegotiate) — Solicita al búfer de eventos iniciar una renegociación SSL
- [EventBufferEvent::sslSocket](#eventbufferevent.sslsocket) — Crea un nuevo buffer SSL cuyos datos serán enviados a través de un socket SSL
- [EventBufferEvent::write](#eventbufferevent.write) — Añade datos a un buffer de evento de salida
- [EventBufferEvent::writeBuffer](#eventbufferevent.writebuffer) — Añade el contenido entero de un buffer en un buffer de evento de salida

# Acerca de las funciones de retrollamada del buffer de eventos

Un objeto de la clase [EventBufferEvent](#class.eventbufferevent)
representa un _buffer de eventos_.
La naturaleza asíncrona de I/O realizada por Libevent implica que un socket
(o cualquier otro tipo de descriptor de ficheros) no siempre está disponible. Event invoca las funciones de retrollamada correspondientes cuando
el recurso se vuelve disponible para una lectura o una escritura,
o cuando ocurren eventos (i.e. un error, un fin de línea,
etc.).

Las funciones de retrollamada de lectura y escritura deben corresponder
al siguiente prototipo:

**callback**(

[EventBufferEvent](#class.eventbufferevent) $bev
= **[null](#constant.null)**
,

[mixed](#language.types.mixed) $arg
= **[null](#constant.null)**
): [void](language.types.void.html)

     bev



      Objeto [EventBufferEvent](#class.eventbufferevent) asociado.







     arg



      Variable personalizada adjunta a todas las funciones de retrollamada
      a través del método [EventBufferEvent::__construct()](#eventbufferevent.construct)
      o del método [EventBufferEvent::setCallbacks()](#eventbufferevent.setcallbacks).


Una función de retrollamada de evento debe corresponder al siguiente prototipo:

**callback**(

[EventBufferEvent](#class.eventbufferevent) $bev
= **[null](#constant.null)**
,

[int](#language.types.integer) $events
= 0
,

[mixed](#language.types.mixed) $arg
= **[null](#constant.null)**
): [void](language.types.void.html)

     bev



      Objeto [EventBufferEvent](#class.eventbufferevent) asociado.







     events



      Máscara de bits de eventos:
      **[EventBufferEvent::READING](#eventbufferevent.constants.reading)**,
      **[EventBufferEvent::WRITING](#eventbufferevent.constants.writing)**,
      **[EventBufferEvent::EOL](#eventbufferevent.constants.eol)**,
      **[EventBufferEvent::ERROR](#eventbufferevent.constants.error)** y
      **[EventBufferEvent::TIMEOUT](#eventbufferevent.constants.timeout)**. Ver las
      [constantes EventBufferEvent](#eventbufferevent.constants).







     arg



      Variable personalizada adjunta a todas las funciones de retrollamada a través
      del método [EventBufferEvent::__construct()](#eventbufferevent.construct) o
      del método [EventBufferEvent::setCallbacks()](#eventbufferevent.setcallbacks).


# La clase EventConfig

(PECL event &gt;= 1.2.6-beta)

## Introducción

    Representa la estructura de configuración que puede ser utilizada
    en la construcción de la clase [EventBase](#class.eventbase).

## Sinopsis de la Clase

     ****




      final
      class **EventConfig**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [FEATURE_ET](#eventconfig.constants.feature-et) = 1;

    const
     [int](#language.types.integer)
      [FEATURE_O1](#eventconfig.constants.feature-o1) = 2;

    const
     [int](#language.types.integer)
      [FEATURE_FDS](#eventconfig.constants.feature-fds) = 4;

    /* Métodos */

public
[avoidMethod](#eventconfig.avoidmethod)(

    [string](#language.types.string) $method

): [bool](#language.types.boolean)
public
[\_\_construct](#eventconfig.construct)()
public
[requireFeatures](#eventconfig.requirefeatures)(

    [int](#language.types.integer) $feature

): [bool](#language.types.boolean)
public
[setFlags](#eventconfig.setflags)(

    [int](#language.types.integer) $flags

): [bool](#language.types.boolean)
public
[setMaxDispatchInterval](#eventconfig.setmaxdispatchinterval)(

    [int](#language.types.integer) $max_interval

,

    [int](#language.types.integer) $max_callbacks

,

    [int](#language.types.integer) $min_priority

): [void](language.types.void.html)

}

## Constantes predefinidas

      **[EventConfig::FEATURE_ET](#eventconfig.constants.feature-et)**



       Requiere un método del backend que soporte las I/O edge-triggered.







      **[EventConfig::FEATURE_O1](#eventconfig.constants.feature-o1)**



       Requiere un método del backend donde añadir o eliminar un solo evento,
       o tener un solo evento que se vuelve activo.







      **[EventConfig::FEATURE_FDS](#eventconfig.constants.feature-fds)**



       Requiere un método del backend que puede soportar tipos de
       descriptor de fichero arbitrario, y no solo sockets.





# EventConfig::avoidMethod

(PECL event &gt;= 1.2.6-beta)

EventConfig::avoidMethod — Solicita a libevent que ignore un método de evento específico

### Descripción

public
**EventConfig::avoidMethod**(

    [string](#language.types.string) $method

): [bool](#language.types.boolean)

Solicita a libevent que ignore un método de evento específico.
Ver la
[» creación
de un evento de base](http://www.wangafu.net/~nickm/libevent-book/Ref2_eventbase.html#_creating_an_event_base).

### Parámetros

     method



      El método a ignorar. Ver
      [las constantes EventConfig](#eventconfig.constants).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con EventConfig::avoidMethod()**

&lt;?php
$cfg = new EventConfig();
if ($cfg-&gt;avoidMethod("select")) {
echo "Método 'select' ignorado\n";
}
?&gt;

### Ver también

- [EventBase::\_\_construct()](#eventbase.construct) - Construye un objeto EventBase

# EventConfig::\_\_construct

(PECL event &gt;= 1.2.6-beta)

EventConfig::\_\_construct — Construye un objeto EventConfig

### Descripción

public
**EventConfig::\_\_construct**()

Construye un objeto EventConfig que podrá ser pasado
al constructor [EventBase::\_\_construct()](#eventbase.construct).

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo con EventConfig::\_\_construct()**

&lt;?php
// Se ignora el método "select"
$cfg = new EventConfig();
if ($cfg-&gt;avoidMethod("select")) {
echo "Método 'select' ignorado\n";
}

// Crea un event_base asociado con la configuración
$base = new EventBase($cfg);

/_ Ahora, $base está configurado para ignorar el método select _/
?&gt;

### Ver también

- [EventBase::\_\_construct()](#eventbase.construct) - Construye un objeto EventBase

# EventConfig::requireFeatures

(PECL event &gt;= 1.2.6-beta)

EventConfig::requireFeatures — Ingresa una funcionalidad de método de evento solicitada por la aplicación

### Descripción

public
**EventConfig::requireFeatures**(

    [int](#language.types.integer) $feature

): [bool](#language.types.boolean)

Ingresa una funcionalidad de método de evento solicitada
por la aplicación.

### Parámetros

     feature



      Máscara de funcionalidades solicitadas. Ver las constantes
      [EventConfig::FEATURE_*](#eventconfig.constants).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con EventConfig::requireFeatures()**

&lt;?php
$cfg = new EventConfig();

// Crea un event_base asociado con la configuración
$base = new EventBase($cfg);

// Solicitud de la funcionalidad FDS
if ($cfg-&gt;requireFeatures(EventConfig::FEATURE_FDS)) {
echo "funcionalidad FDS solicitada\n";

    $base = new EventBase($cfg);
    ($base-&gt;getFeatures() &amp; EventConfig::FEATURE_FDS)
        and print "FDS - tipos arbitrarios de descriptor de fichero y no solo sockets\n";

}
?&gt;

Resultado del ejemplo anterior es similar a:

funcionalidad FDS solicitada
FDS - tipos arbitrarios de descriptor de fichero y no solo sockets

### Ver también

- [EventBase::getFeatures()](#eventbase.getfeatures) - Devuelve una máscara de las funcionalidades soportadas

# EventConfig::setFlags

(PECL event &gt;= 2.0.2-alpha)

EventConfig::setFlags — Define uno o varios flags para configurar la inicialización eventual de EventBase

### Descripción

public
**EventConfig::setFlags**(

    [int](#language.types.integer) $flags

): [bool](#language.types.boolean)

Define uno o varios flags para configurar las partes de la inicialización eventual de EventBase que serán inicializadas, y cómo funcionarán.

### Parámetros

     flags



      Una de las constantes EventBase::LOOP_*. Ver [constantes de EventBase](#eventbase.constants).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventBase::getFeatures()](#eventbase.getfeatures) - Devuelve una máscara de las funcionalidades soportadas

# EventConfig::setMaxDispatchInterval

(PECL event &gt;= 2.1.0-alpha)

EventConfig::setMaxDispatchInterval — Evita la inversión de prioridades

### Descripción

public
**EventConfig::setMaxDispatchInterval**(

    [int](#language.types.integer) $max_interval

,

    [int](#language.types.integer) $max_callbacks

,

    [int](#language.types.integer) $min_priority

): [void](language.types.void.html)

Evita la inversión de prioridades limitando el número de funciones de retrollamada de eventos de baja prioridad que pueden ser invocadas antes de verificar la presencia de eventos de alta prioridad.

**Nota**:

    Disponible a partir de libevent 2.1.0-alpha.

### Parámetros

     max_interval



      Un intervalo después del cual Libevent detendrá la ejecución de las funciones de retrollamada y verificará la presencia de otros eventos, o 0 si no debe haber tal intervalo.







     max_callbacks



      Un número de funciones de retrollamada después del cual Libevent debe detener la ejecución de las funciones de retrollamada y verificar la presencia de otros eventos, o **[-1](#constant.-1)** si no debe haber tal límite.







     min_priority



      Una prioridad por debajo de la cual max_interval y max_callbacks no deben ser tomados en cuenta. Si se define a 0, serán tomados en cuenta para los eventos de cualquier prioridad; si se define a 1, serán tomados en cuenta para los eventos de prioridad 1 y así sucesivamente.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

## Tabla de contenidos

- [EventConfig::avoidMethod](#eventconfig.avoidmethod) — Solicita a libevent que ignore un método de evento específico
- [EventConfig::\_\_construct](#eventconfig.construct) — Construye un objeto EventConfig
- [EventConfig::requireFeatures](#eventconfig.requirefeatures) — Ingresa una funcionalidad de método de evento solicitada por la aplicación
- [EventConfig::setFlags](#eventconfig.setflags) — Define uno o varios flags para configurar la inicialización eventual de EventBase
- [EventConfig::setMaxDispatchInterval](#eventconfig.setmaxdispatchinterval) — Evita la inversión de prioridades

# La clase EventDnsBase

(PECL event &gt;= 1.2.6-beta)

## Introducción

    Representa la estructura base DNS de Libevent. Utilizada para
    resolver DNS de forma asíncrona, para analizar ficheros
    de configuración como resolv.conf etc.

## Sinopsis de la Clase

     ****




      final
      class **EventDnsBase**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [OPTION_SEARCH](#eventdnsbase.constants.option-search) = 1;

    const
     [int](#language.types.integer)
      [OPTION_NAMESERVERS](#eventdnsbase.constants.option-nameservers) = 2;

    const
     [int](#language.types.integer)
      [OPTION_MISC](#eventdnsbase.constants.option-misc) = 4;

    const
     [int](#language.types.integer)
      [OPTION_HOSTSFILE](#eventdnsbase.constants.option-hostsfile) = 8;

    const
     [int](#language.types.integer)
      [OPTIONS_ALL](#eventdnsbase.constants.options-all) = 15;

    const
     [int](#language.types.integer)
      [DISABLE_WHEN_INACTIVE](#eventdnsbase.constants.disable-when-inactive) = 32768;

    const
     [int](#language.types.integer)
      [INITIALIZE_NAMESERVERS](#eventdnsbase.constants.initialize-nameservers) = 1;

    const
     [int](#language.types.integer)
      [NAMESERVERS_NO_DEFAULT](#eventdnsbase.constants.nameservers-no-default) = 65536;

    /* Métodos */

public
[\_\_construct](#eventdnsbase.construct)(

    [EventBase](#class.eventbase) $base

,

    [int](#language.types.integer)|[bool](#language.types.boolean) $initialize

)

    public

[addNameserverIp](#eventdnsbase.addnameserverip)(

    [string](#language.types.string) $ip

): [bool](#language.types.boolean)
public
[addSearch](#eventdnsbase.addsearch)(

    [string](#language.types.string) $domain

): [void](language.types.void.html)
public
[clearSearch](#eventdnsbase.clearsearch)(): [void](language.types.void.html)
public
[countNameservers](#eventdnsbase.countnameservers)(): [int](#language.types.integer)
public
[loadHosts](#eventdnsbase.loadhosts)(

    [string](#language.types.string) $hosts

): [bool](#language.types.boolean)
public
[parseResolvConf](#eventdnsbase.parseresolvconf)(

    [int](#language.types.integer) $flags

,

    [string](#language.types.string) $filename

): [bool](#language.types.boolean)
public
[setOption](#eventdnsbase.setoption)(

    [string](#language.types.string) $option

,

    [string](#language.types.string) $value

): [bool](#language.types.boolean)
public
[setSearchNdots](#eventdnsbase.setsearchndots)(

    [int](#language.types.integer) $ndots

): [bool](#language.types.boolean)

}

## Constantes predefinidas

      **[EventDnsBase::OPTION_SEARCH](#eventdnsbase.constants.option-search)**



       Solicita leer el dominio y buscar los campos desde el
       fichero resolv.conf y la opción
       ndots, y los utiliza para decidir qué dominio
       (si lo hay) debe ser utilizado para buscar los nombres de hosts
       que no están totalmente cualificados.







      **[EventDnsBase::OPTION_NAMESERVERS](#eventdnsbase.constants.option-nameservers)**



       Solicita conocer los nombres de los servidores desde el fichero
       resolv.conf.







      **[EventDnsBase::OPTION_MISC](#eventdnsbase.constants.option-misc)**









      **[EventDnsBase::OPTION_HOSTSFILE](#eventdnsbase.constants.option-hostsfile)**



       Solicita leer una lista de hosts desde el fichero
       /etc/hosts como parte de la
       carga del fichero resolv.conf.







      **[EventDnsBase::OPTIONS_ALL](#eventdnsbase.constants.options-all)**



       Solicita conocer todo el contenido del fichero
       resolv.conf.







      **[EventDnsBase::DISABLE_WHEN_INACTIVE](#eventdnsbase.constants.disable-when-inactive)**



       No impide que el bucle de eventos de libevent termine cuando no se tienen peticiones DNS activas.







      **[EventDnsBase::INITIALIZE_NAMESERVERS](#eventdnsbase.constants.initialize-nameservers)**



       Procesar el fichero resolv.conf.







      **[EventDnsBase::NAMESERVERS_NO_DEFAULT](#eventdnsbase.constants.nameservers-no-default)**



       No añadir un servidor de nombres por omisión si no hay servidores de nombres en el fichero resolv.conf.





# EventDnsBase::addNameserverIp

(PECL event &gt;= 1.2.6-beta)

EventDnsBase::addNameserverIp — Añade un servidor de nombres a la base DNS

### Descripción

public
**EventDnsBase::addNameserverIp**(

    [string](#language.types.string) $ip

): [bool](#language.types.boolean)

Añade un servidor de nombres a evdns_base.

### Parámetros

     ip



      El string que representa el servidor de nombres; puede ser una dirección
      IPv4, una dirección IPv6, una dirección IPv4 con un puerto
      (IPv4:Port), o una dirección IPv6 con un
      puerto ([IPv6]:Port).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# EventDnsBase::addSearch

(PECL event &gt;= 1.2.6-beta)

EventDnsBase::addSearch — Añade un dominio a la lista de dominios utilizados para la búsqueda

### Descripción

public
**EventDnsBase::addSearch**(

    [string](#language.types.string) $domain

): [void](language.types.void.html)

Añade un dominio a la lista de dominios utilizados para la búsqueda.

### Parámetros

     domain



      El dominio a añadir para la búsqueda.


### Valores devueltos

No se retorna ningún valor.

# EventDnsBase::clearSearch

(PECL event &gt;= 1.2.6-beta)

EventDnsBase::clearSearch — Elimina todos los sufijos de búsqueda comunes

### Descripción

public
**EventDnsBase::clearSearch**(): [void](language.types.void.html)

Elimina todos los sufijos de búsqueda comunes desde
la base DNS; el método [EventDnsBase::addSearch()](#eventdnsbase.addsearch)
añade un sufijo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EventDnsBase::addSearch()](#eventdnsbase.addsearch) - Añade un dominio a la lista de dominios utilizados para la búsqueda

# EventDnsBase::\_\_construct

(PECL event &gt;= 1.2.6-beta)

EventDnsBase::\_\_construct — Construye un objeto EventDnsBase

### Descripción

public
**EventDnsBase::\_\_construct**(

    [EventBase](#class.eventbase) $base

,

    [int](#language.types.integer)|[bool](#language.types.boolean) $initialize

)

Construye un objeto EventDnsBase.

### Parámetros

     base



      Evento de base.







     initialize



      Si initialize es **[true](#constant.true)**, intenta utilizar los parámetros por defecto del sistema operativo subyacente para configurar adecuadamente la base DNS.
      Si es **[false](#constant.false)**, la base DNS se deja sin configurar, sin servidores de nombres ni opciones definidas.
      En este último caso, la base DNS debe ser configurada manualmente, por ejemplo con el método [EventDnsBase::parseResolvConf()](#eventdnsbase.parseresolvconf).




      Si initialize es un entero, debe ser uno de los siguientes flags:






          Flag
          Descripción






          **[EventDnsBase::DISABLE_WHEN_INACTIVE](#eventdnsbase.constants.disable-when-inactive)**

           No impide que el bucle de eventos de libevent termine cuando no haya solicitudes DNS activas.




          **[EventDnsBase::INITIALIZE_NAMESERVERS](#eventdnsbase.constants.initialize-nameservers)**

           Procesar el fichero resolv.conf.




          **[EventDnsBase::NAMESERVERS_NO_DEFAULT](#eventdnsbase.constants.nameservers-no-default)**

           No añadir servidores de nombres por defecto si no hay servidores de nombres en el fichero resolv.conf.









### Errores/Excepciones

Si initialize tiene un tipo distinto de
[int](#language.types.integer)|[bool](#language.types.boolean),
se lanza una [TypeError](#class.typeerror).

Si el valor de initialize es inválido,
se lanza una [EventException](#class.eventexception).

### Historial de cambios

       Versión
       Descripción






       PECL event 3.1.3

        Si initialize tiene un tipo distinto de
        [int](#language.types.integer)|[bool](#language.types.boolean),
        se lanza una [TypeError](#class.typeerror).




       PECL event 3.1.0RC1

        El tipo del parámetro initialize ha sido cambiado de [bool](#language.types.boolean)
        a [mixed](#language.types.mixed). El valor puede ser [bool](#language.types.boolean) (preservando el significado anterior)
        o una de las siguientes constantes:
        **[EventDnsBase::DISABLE_WHEN_INACTIVE](#eventdnsbase.constants.disable-when-inactive)**,
        **[EventDnsBase::INITIALIZE_NAMESERVERS](#eventdnsbase.constants.initialize-nameservers)**,
        o **[EventDnsBase::NAMESERVERS_NO_DEFAULT](#eventdnsbase.constants.nameservers-no-default)**.





# EventDnsBase::countNameservers

(PECL event &gt;= 1.2.6-beta)

EventDnsBase::countNameservers — Recupera el número de servidores de nombres configurados

### Descripción

public
**EventDnsBase::countNameservers**(): [int](#language.types.integer)

Recupera el número de servidores de nombres configurados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de servidores de nombres configurados (no necesariamente
el número de servidores de nombres en funcionamiento). Esto es útil
para verificar si las llamadas a las diversas funciones de configuración
de los servidores de nombres han tenido éxito o no.

# EventDnsBase::loadHosts

(PECL event &gt;= 1.2.6-beta)

EventDnsBase::loadHosts — Carga un fichero hosts (en el mismo formato que /etc/hosts)

### Descripción

public
**EventDnsBase::loadHosts**(

    [string](#language.types.string) $hosts

): [bool](#language.types.boolean)

Carga un fichero hosts (en el mismo formato que /etc/hosts).

### Parámetros

     hosts



      Ruta de acceso al fichero hosts.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# EventDnsBase::parseResolvConf

(PECL event &gt;= 1.2.6-beta)

EventDnsBase::parseResolvConf — Analiza el fichero resolv.conf

### Descripción

public
**EventDnsBase::parseResolvConf**(

    [int](#language.types.integer) $flags

,

    [string](#language.types.string) $filename

): [bool](#language.types.boolean)

Analiza el fichero resolv.conf y lee todas las opciones presentes.

### Parámetros

     flags



      Determina la información a analizar desde el fichero
      resolv.conf. Ver la página del manual del sistema
      del fichero resolv.conf para conocer
      su formato.




      Las siguientes directivas no son analizadas en el fichero:
      sortlist, rotate, no-check-names, inet6, debug.




      Si esta función encuentra un error, los valores devueltos posibles
      son:



       -
        1 = fallo al abrir el fichero

       -
        2 = fallo al recuperar la información del fichero

       -
        3 = fichero demasiado grande

       -
        4 = exceso de memoria

       -
        5 = lectura demasiado corta del fichero

       -
        6 = ningún servidor de nombres listado en el fichero







     filename



      Ruta hacia el fichero resolv.conf.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# EventDnsBase::setOption

(PECL event &gt;= 1.2.6-beta)

EventDnsBase::setOption — Define el valor de una opción de configuración

### Descripción

public
**EventDnsBase::setOption**(

    [string](#language.types.string) $option

,

    [string](#language.types.string) $value

): [bool](#language.types.boolean)

Define el valor de una opción de configuración.

### Parámetros

     option



      Las opciones de configuración actualmente disponibles son:
      "ndots", "timeout",
      "max-timeouts", "max-inflight"
      y "attempts".







     value



      El valor de la opción.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# EventDnsBase::setSearchNdots

(PECL event &gt;= 1.2.6-beta)

EventDnsBase::setSearchNdots — Define el parámetro 'ndots' para las búsquedas

### Descripción

public
**EventDnsBase::setSearchNdots**(

    [int](#language.types.integer) $ndots

): [bool](#language.types.boolean)

Define el parámetro 'ndots' para las búsquedas.
Define el número de puntos que, cuando se encuentran en un nombre,
hace que la primera solicitud se realice sin búsqueda de dominio.

### Parámetros

     ndots



      El número de puntos.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

## Tabla de contenidos

- [EventDnsBase::addNameserverIp](#eventdnsbase.addnameserverip) — Añade un servidor de nombres a la base DNS
- [EventDnsBase::addSearch](#eventdnsbase.addsearch) — Añade un dominio a la lista de dominios utilizados para la búsqueda
- [EventDnsBase::clearSearch](#eventdnsbase.clearsearch) — Elimina todos los sufijos de búsqueda comunes
- [EventDnsBase::\_\_construct](#eventdnsbase.construct) — Construye un objeto EventDnsBase
- [EventDnsBase::countNameservers](#eventdnsbase.countnameservers) — Recupera el número de servidores de nombres configurados
- [EventDnsBase::loadHosts](#eventdnsbase.loadhosts) — Carga un fichero hosts (en el mismo formato que /etc/hosts)
- [EventDnsBase::parseResolvConf](#eventdnsbase.parseresolvconf) — Analiza el fichero resolv.conf
- [EventDnsBase::setOption](#eventdnsbase.setoption) — Define el valor de una opción de configuración
- [EventDnsBase::setSearchNdots](#eventdnsbase.setsearchndots) — Define el parámetro 'ndots' para las búsquedas

# La clase EventHttp

(PECL event &gt;= 1.4.0-beta)

## Introducción

    Representa el servidor HTTP.

## Sinopsis de la Clase

     ****




      final
      class **EventHttp**

     {

    /* Métodos */

public
[accept](#eventhttp.accept)(

    [mixed](#language.types.mixed) $socket

): [bool](#language.types.boolean)
public
[addServerAlias](#eventhttp.addserveralias)(

    [string](#language.types.string) $alias

): [bool](#language.types.boolean)
public
[bind](#eventhttp.bind)(

    [string](#language.types.string) $address

,

    [int](#language.types.integer) $port

): [void](language.types.void.html)
public
[\_\_construct](#eventhttp.construct)(

    [EventBase](#class.eventbase) $base

,

    [EventSslContext](#class.eventsslcontext) $ctx
     = **[null](#constant.null)**

)
public
[removeServerAlias](#eventhttp.removeserveralias)(

    [string](#language.types.string) $alias

): [bool](#language.types.boolean)
public
[setAllowedMethods](#eventhttp.setallowedmethods)(

    [int](#language.types.integer) $methods

): [void](language.types.void.html)
public
[setCallback](#eventhttp.setcallback)(

    [string](#language.types.string) $path

,

    [string](#language.types.string) $cb

,

    [string](#language.types.string) $arg
    = ?): [void](language.types.void.html)

public
[setDefaultCallback](#eventhttp.setdefaultcallback)(

    [string](#language.types.string) $cb

,

    [string](#language.types.string) $arg
    = ?): [void](language.types.void.html)

public
[setMaxBodySize](#eventhttp.setmaxbodysize)(

    [int](#language.types.integer) $value

): [void](language.types.void.html)
public
[setMaxHeadersSize](#eventhttp.setmaxheaderssize)(

    [int](#language.types.integer) $value

): [void](language.types.void.html)
public
[setTimeout](#eventhttp.settimeout)(

    [int](#language.types.integer) $value

): [void](language.types.void.html)

}

# EventHttp::accept

(PECL event &gt;= 1.2.6-beta)

EventHttp::accept — Permite a un servidor HTTP aceptar las conexiones en el
socket o recurso especificado

### Descripción

public
**EventHttp::accept**(

    [mixed](#language.types.mixed) $socket

): [bool](#language.types.boolean)

Permite a un servidor HTTP aceptar las conexiones en el
socket o recurso especificado. El socket debe estar listo para
aceptar las conexiones.

Puede ser llamado varias veces para aceptar las conexiones en
diferentes sockets.

**Nota**:

    Para enlazar un socket, una conexión listen y una conexión
    accept
    en el socket en una sola llamada, utilice el método
    [EventHttp::bind()](#eventhttp.bind).
    **EventHttp::accept()** solo es necesario si un socket
    está listo para aceptar las conexiones.

### Parámetros

     socket



      Socket, flujo, o descriptor numérico de fichero representando un socket
      listo para aceptar las conexiones.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con EventHttp::accept()**

&lt;?php

$base = new EventBase();
$http = new EventHttp($base);

$addresses = [
     8091 =&gt; "127.0.0.1",
     8092 =&gt; "127.0.0.2",
];
$i = 0;

$socket = array();

foreach ($addresses as $port =&gt; $ip) {
    echo $ip, " ", $port, PHP_EOL;
    $socket[$i] = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if (!socket_bind($socket[$i], $ip, $port)) {
        exit("fallo de socket_bind\n");
    }
    socket_listen($socket[$i], 0);
socket_set_nonblock($socket[$i]);

    if (!$http-&gt;accept($socket[$i])) {
        echo "La aceptación ha fallado\n";
        exit(1);
    }

    ++$i;

}

$http-&gt;setCallback("/some-page", function() {
echo "(some-page)\n";
echo "URI : ", $req-&gt;getUri(), PHP_EOL;
$req-&gt;sendReply(200, "OK");
echo "OK\n";
});

$http-&gt;setDefaultCallback(function($req) {
echo "URI : ", $req-&gt;getUri(), PHP_EOL;
$req-&gt;sendReply(200, "OK");
echo "OK\n";
});

$signal = Event::signal($base, SIGINT, function () use ($base) {
    echo "SIGINT recibido. Deteniendo...\n";
    $base-&gt;stop();
});
$signal-&gt;add();

$base-&gt;dispatch();
echo "END\n";

// No cerramos los sockets, sabiendo que Libevent ya establece
// los flags CLOSE_ON_FREE y CLOSE_ON_EXEC en el descriptor
// de fichero con los sockets.
?&gt;

Resultado del ejemplo anterior es similar a:

Cliente:
$ nc 127.0.0.1 8091
GET /about HTTP/1.0
Connection: close

HTTP/1.0 200 OK
Content-Type: text/html; charset=ISO-8859-1
Connection: close

Servidor:
127.0.0.1 8091
127.0.0.2 8092
URI : /about
OK

### Ver también

- [EventHttp::bind()](#eventhttp.bind) - Liga un servidor HTTP a una dirección y un puerto especificados

# EventHttp::addServerAlias

(PECL event &gt;= 1.4.0-beta)

EventHttp::addServerAlias — Añade un alias del servidor para el objeto servidor HTTP

### Descripción

public
**EventHttp::addServerAlias**(

    [string](#language.types.string) $alias

): [bool](#language.types.boolean)

Añade un alias del servidor para el objeto servidor HTTP.

### Parámetros

     alias



      El alias a añadir.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1
Ejemplo con EventHttp::addServerAlias()**

&lt;?php
$base = new EventBase();
$http = new EventHttp($base);

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if (!$http-&gt;bind("127.0.0.1", 8088)) {
exit("bind(1) ha fallado\n");
};

if (!$http-&gt;addServerAlias("local.net")) {
exit("Imposible añadir el alias del servidor\n");
}

$http-&gt;setCallback("/about", function($req) {
echo "URI : ", $req-&gt;getUri(), PHP_EOL;
    $req-&gt;sendReply(200, "OK");
});
$base-&gt;dispatch();
?&gt;

### Ver también

- [EventHttp::removeServerAlias()](#eventhttp.removeserveralias) - Elimina un alias en el servidor

# EventHttp::bind

(PECL event &gt;= 1.2.6-beta)

EventHttp::bind — Liga un servidor HTTP a una dirección y un puerto especificados

### Descripción

public
**EventHttp::bind**(

    [string](#language.types.string) $address

,

    [int](#language.types.integer) $port

): [void](language.types.void.html)

Liga un servidor HTTP a una dirección y un puerto especificados.

Puede ser llamada varias veces para ligar el mismo servidor HTTP a varios puertos.

### Parámetros

     address



      Un string que contiene la dirección IP a escuchar.







     port



      El número de puerto en el que se realizará la escucha.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con EventHttp::bind()**

&lt;?php
$base = new EventBase();
$http = new EventHttp($base);

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if (!$http-&gt;bind("127.0.0.1", 8088)) {
    exit("bind(1) ha fallado\n");
};
if (!$http-&gt;bind("127.0.0.1", 8089)) {
exit("bind(2) ha fallado\n");

};

$http-&gt;setCallback("/about", function($req) {
echo "URI : ", $req-&gt;getUri(), PHP_EOL;
$req-&gt;sendReply(200, "OK");
echo "OK\n";
});

$base-&gt;dispatch();
?&gt;

Resultado del ejemplo anterior es similar a:

Cliente:

$ nc 127.0.0.1 8088
GET /about HTTP/1.0
Connection: close

HTTP/1.0 200 OK
Content-Type: text/html; charset=ISO-8859-1
Connection: close

$ nc 127.0.0.1 8089
GET /unknown HTTP/1.0
Connection: close

HTTP/1.1 404 Not Found
Content-Type: text/html
Date: Wed, 13 Mar 2013 04:14:41 GMT
Content-Length: 149
Connection: close

&lt;html&gt;&lt;head&gt;&lt;title&gt;404 Not Found&lt;/title&gt;&lt;/head&gt;&lt;body&gt;&lt;h1&gt;Not Found&lt;/h1&gt;&lt;p&gt;The requested URL /unknown was not found on this server.&lt;/p&gt;&lt;/body&gt;&lt;/html&gt;

Servidor:
URI: /about
OK

### Ver también

- [EventHttp::accept()](#eventhttp.accept) - Permite a un servidor HTTP aceptar las conexiones en el
  socket o recurso especificado

# EventHttp::\_\_construct

(PECL event &gt;= 1.2.6-beta)

EventHttp::\_\_construct — Construye un objeto EventHttp (el servidor HTTP)

### Descripción

public
**EventHttp::\_\_construct**(

    [EventBase](#class.eventbase) $base

,

    [EventSslContext](#class.eventsslcontext) $ctx
     = **[null](#constant.null)**

)

Construye el objeto del servidor HTTP.

### Parámetros

     base



      Evento base asociado.







     ctx



      El objeto de la clase [EventSslContext](#class.eventsslcontext).
      Transforma un servidor HTTP en un servidor HTTPS. Esto significa que si
      el argumento ctx está configurado correctamente,
      entonces el buffer de eventos subyacente se basará en sockets OpenSSL.
      Asimismo, todo el tráfico pasará a través de SSL o TLS.



     **Nota**:



       Este argumento solo está disponible si Event
       ha sido compilado con soporte para OpenSSL, y solo a partir de la
       versión Libevent 2.1.0-alpha o superiores.





### Historial de cambios

       Versión
       Descripción






       PECL event 1.9.0

        Añadido soporte para OpenSSL (ctx).





### Ejemplos

**Ejemplo #1 Servidor HTTP simple**

&lt;?php
/\*

- Servidor HTTP simple.
-
- Para probarlo:
-   1. Ejecútelo en el puerto de su elección, i.e. :
- $ php examples/http.php 8010
-   2. En otro terminal, conéctese a una dirección de este puerto
- y realice una solicitud GET o POST (las otras están deshabilitadas aquí),
- i.e. :
- $ nc -t 127.0.0.1 8010
- POST /about HTTP/1.0
- Content-Type: text/plain
- Content-Length: 4
- Connection: close
- (presione Enter)
-
- Debería mostrar:
- a=12
- HTTP/1.0 200 OK
- Content-Type: text/html; charset=ISO-8859-1
- Connection: close
-
- $ nc -t 127.0.0.1 8010
- GET /dump HTTP/1.0
- Content-Type: text/plain
- Content-Encoding: UTF-8
- Connection: close
- (presione Enter)
-
- Debería mostrar:
- HTTP/1.0 200 OK
- Content-Type: text/html; charset=ISO-8859-1
- Connection: close
- (presione Enter)
-
- $ nc -t 127.0.0.1 8010
- GET /unknown HTTP/1.0
- Connection: close
-
- Debería mostrar:
- HTTP/1.0 200 OK
- Content-Type: text/html; charset=ISO-8859-1
- Connection: close
-
-   3. Observe lo que muestra el servidor en el terminal anterior.
       \*/

function \_http_dump($req, $data) {
static $counter = 0;
static $max_requests = 2;

    if (++$counter &gt;= $max_requests)  {
        echo "Counter reached max requests $max_requests. Exiting\n";
        exit();
    }

    echo __METHOD__, " called\n";
    echo "request:"; var_dump($req);
    echo "data:"; var_dump($data);

    echo "\n===== DUMP =====\n";
    echo "Command:", $req-&gt;getCommand(), PHP_EOL;
    echo "URI:", $req-&gt;getUri(), PHP_EOL;
    echo "Input headers:"; var_dump($req-&gt;getInputHeaders());
    echo "Output headers:"; var_dump($req-&gt;getOutputHeaders());

    echo "\n &gt;&gt; Sending reply ...";
    $req-&gt;sendReply(200, "OK");
    echo "OK\n";

    echo "\n &gt;&gt; Reading input buffer ...\n";
    $buf = $req-&gt;getInputBuffer();
    while ($s = $buf-&gt;readLine(EventBuffer::EOL_ANY)) {
        echo $s, PHP_EOL;
    }
    echo "No more data in the buffer\n";

}

function \_http_about($req) {
echo **METHOD**, PHP_EOL;
echo "URI: ", $req-&gt;getUri(), PHP_EOL;
echo "\n &gt;&gt; Sending reply ...";
$req-&gt;sendReply(200, "OK");
echo "OK\n";
}

function \_http_default($req, $data) {
echo **METHOD**, PHP_EOL;
echo "URI: ", $req-&gt;getUri(), PHP_EOL;
echo "\n &gt;&gt; Sending reply ...";
$req-&gt;sendReply(200, "OK");
echo "OK\n";
}

$port = 8010;
if ($argc &gt; 1) {
$port = (int) $argv[1];
}
if ($port &lt;= 0 || $port &gt; 65535) {
exit("Invalid port");
}

$base = new EventBase();
$http = new EventHttp($base);
$http-&gt;setAllowedMethods(EventHttpRequest::CMD_GET | EventHttpRequest::CMD_POST);

$http-&gt;setCallback("/dump", "_http_dump", array(4, 8));
$http-&gt;setCallback("/about", "\_http_about");
$http-&gt;setDefaultCallback("\_http_default", "custom data value");

$http-&gt;bind("0.0.0.0", 8010);
$base-&gt;loop();
?&gt;

Resultado del ejemplo anterior es similar a:

a=12
HTTP/1.0 200 OK
Content-Type: text/html; charset=ISO-8859-1
Connection: close

HTTP/1.0 200 OK
Content-Type: text/html; charset=ISO-8859-1
Connection: close
(presione Enter)

HTTP/1.0 200 OK
Content-Type: text/html; charset=ISO-8859-1
Connection: close

# EventHttp::removeServerAlias

(PECL event &gt;= 1.4.0-beta)

EventHttp::removeServerAlias — Elimina un alias en el servidor

### Descripción

public
**EventHttp::removeServerAlias**(

    [string](#language.types.string) $alias

): [bool](#language.types.boolean)

Elimina un alias en el servidor, previamente añadido con el
método [EventHttp::addServerAlias()](#eventhttp.addserveralias)

### Parámetros

     alias



      El alias a eliminar.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventHttp::addServerAlias()](#eventhttp.addserveralias) - Añade un alias del servidor para el objeto servidor HTTP

# EventHttp::setAllowedMethods

(PECL event &gt;= 1.4.0-beta)

EventHttp::setAllowedMethods — Define los métodos HTTP soportados y aceptados en las peticiones
en este servidor, y pasados a las funciones de retrollamada de los usuarios

### Descripción

public
**EventHttp::setAllowedMethods**(

    [int](#language.types.integer) $methods

): [void](language.types.void.html)

Define los métodos HTTP soportados y aceptados en las peticiones
en este servidor, y pasados a las funciones de retrollamada de los usuarios.

Si no son soportados, generarán una respuesta
"405 Method not allowed".

Por omisión, los siguientes métodos están incluidos:
GET, POST, HEAD,
PUT, y DELETE. Ver las constantes
EventHttpRequest::CMD\_\*.

### Parámetros

     methods



      Una máscara de [constantes
      EventHttpRequest::CMD_*](#eventhttprequest.constants).


### Valores devueltos

No se retorna ningún valor.

# EventHttp::setCallback

(PECL event &gt;= 1.4.0-beta)

EventHttp::setCallback — Define una retrollamada para una URI específica

### Descripción

public
**EventHttp::setCallback**(

    [string](#language.types.string) $path

,

    [string](#language.types.string) $cb

,

    [string](#language.types.string) $arg
    = ?): [void](language.types.void.html)

Define una retrollamada para una URI específica.

### Parámetros

     path



      La URI para la cual la retrollamada debe ser invocada.







     cb



      La retrollamada [callable](#language.types.callable)
      que será invocada durante una petición en la URI
      path. Debe corresponder al siguiente prototipo:




      **callback**(

       [EventHttpRequest](#class.eventhttprequest) $req
        = NULL
      ,

       [mixed](#language.types.mixed) $arg
        = NULL
      ): [void](language.types.void.html)







         req



          Un objeto [EventHttpRequest](#class.eventhttprequest).







         arg



          Datos personalizados.











     arg



      Datos personalizados.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con EventHttp::setCallback()**

&lt;?php
/\*

- Servidor HTTP simple.
-
- Para probarlo:
-   1. Ejecútelo en el puerto de su elección, i.e. :
- $ php examples/http.php 8010
-   2. En otro terminal, conéctese a una dirección de este puerto
- y realice una petición GET o POST (las otras están desactivadas aquí), i.e.:
- $ nc -t 127.0.0.1 8010
- POST /about HTTP/1.0
- Content-Type: text/plain
- Content-Length: 4
- Connection: close
- (presione Enter)
-
- Debería mostrar:
- a=12
- HTTP/1.0 200 OK
- Content-Type: text/html; charset=ISO-8859-1
- Connection: close
-
-   3. Ver lo que muestra el servidor en el terminal anterior.
       \*/

function \_http_dump($req, $data) {
static $counter = 0;
static $max_requests = 2;

    if (++$counter &gt;= $max_requests)  {
        echo "Counter reached max requests $max_requests. Exiting\n";
        exit();
    }

    echo __METHOD__, " called\n";
    echo "request:"; var_dump($req);
    echo "data:"; var_dump($data);

    echo "\n===== DUMP =====\n";
    echo "Command:", $req-&gt;getCommand(), PHP_EOL;
    echo "URI:", $req-&gt;getUri(), PHP_EOL;
    echo "Input headers:"; var_dump($req-&gt;getInputHeaders());
    echo "Output headers:"; var_dump($req-&gt;getOutputHeaders());

    echo "\n &gt;&gt; Sending reply ...";
    $req-&gt;sendReply(200, "OK");
    echo "OK\n";

    echo "\n &gt;&gt; Reading input buffer ...\n";
    $buf = $req-&gt;getInputBuffer();
    while ($s = $buf-&gt;readLine(EventBuffer::EOL_ANY)) {
        echo $s, PHP_EOL;
    }
    echo "No more data in the buffer\n";

}

function \_http_about($req) {
echo **METHOD**, PHP_EOL;
echo "URI: ", $req-&gt;getUri(), PHP_EOL;
echo "\n &gt;&gt; Sending reply ...";
$req-&gt;sendReply(200, "OK");
echo "OK\n";
}

function \_http_default($req, $data) {
echo **METHOD**, PHP_EOL;
echo "URI: ", $req-&gt;getUri(), PHP_EOL;
echo "\n &gt;&gt; Sending reply ...";
$req-&gt;sendReply(200, "OK");
echo "OK\n";
}

$port = 8010;
if ($argc &gt; 1) {
$port = (int) $argv[1];
}
if ($port &lt;= 0 || $port &gt; 65535) {
exit("Invalid port");
}

$base = new EventBase();
$http = new EventHttp($base);
$http-&gt;setAllowedMethods(EventHttpRequest::CMD_GET | EventHttpRequest::CMD_POST);

$http-&gt;setCallback("/dump", "_http_dump", array(4, 8));
$http-&gt;setCallback("/about", "\_http_about");
$http-&gt;setDefaultCallback("\_http_default", "custom data value");

$http-&gt;bind("0.0.0.0", 8010);
$base-&gt;loop();
?&gt;

Resultado del ejemplo anterior es similar a:

a=12
HTTP/1.0 200 OK
Content-Type: text/html; charset=ISO-8859-1
Connection: close

### Ver también

- [EventHttp::setDefaultCallback()](#eventhttp.setdefaultcallback) - Define la función de retrollamada por defecto para manejar las peticiones que no son capturadas por
  funciones de retrollamada específicas

# EventHttp::setDefaultCallback

(PECL event &gt;= 1.4.0-beta)

EventHttp::setDefaultCallback — Define la función de retrollamada por defecto para manejar las peticiones que no son capturadas por
funciones de retrollamada específicas

### Descripción

public
**EventHttp::setDefaultCallback**(

    [string](#language.types.string) $cb

,

    [string](#language.types.string) $arg
    = ?): [void](language.types.void.html)

Define la función de retrollamada por defecto para manejar las peticiones que no son capturadas por
funciones de retrollamada específicas.

### Parámetros

     cb



      La función de retrollamada de tipo [callable](#language.types.callable).
      Debe corresponder al siguiente prototipo:



     **callback**(

       [EventHttpRequest](#class.eventhttprequest) $req
        = NULL
      ,

       [mixed](#language.types.mixed) $arg
        = NULL
      ): [void](language.types.void.html)







         req



          [EventHttpRequest](#class.eventhttprequest)
          Objeto.







         arg



          Datos personalizados.











     arg



      Datos personalizados proporcionados por el usuario a la función de retrollamada.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con EventHttp::setDefaultCallback()**

&lt;?php
$base = new EventBase();
$http = new EventHttp($base);

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if (!$http-&gt;bind("127.0.0.1", 8088)) {
exit("Fallo en bind(1)\n");
};

$http-&gt;setDefaultCallback(function($req) {
echo "URI : ", $req-&gt;getUri(), PHP_EOL;
$req-&gt;sendReply(200, "OK");
});

$base-&gt;dispatch();
?&gt;

### Ver también

- [EventHttp::setCallback()](#eventhttp.setcallback) - Define una retrollamada para una URI específica

# EventHttp::setMaxBodySize

(PECL event &gt;= 1.4.0-beta)

EventHttp::setMaxBodySize — Define la talla máxima del cuerpo de la petición

### Descripción

public
**EventHttp::setMaxBodySize**(

    [int](#language.types.integer) $value

): [void](language.types.void.html)

Define la talla máxima del cuerpo de la petición.

### Parámetros

     value



      La talla del cuerpo, en bytes.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EventHttp::setMaxHeadersSize()](#eventhttp.setmaxheaderssize) - Define el tamaño máximo de las cabeceras HTTP

# EventHttp::setMaxHeadersSize

(PECL event &gt;= 1.4.0-beta)

EventHttp::setMaxHeadersSize — Define el tamaño máximo de las cabeceras HTTP

### Descripción

public
**EventHttp::setMaxHeadersSize**(

    [int](#language.types.integer) $value

): [void](language.types.void.html)

Define el tamaño máximo de las cabeceras HTTP.

### Parámetros

     value



      El tamaño máximo de las cabeceras, en bytes.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- **EventHttp::setMaxHeadersSize()**

# EventHttp::setTimeout

(PECL event &gt;= 1.4.0-beta)

EventHttp::setTimeout — Define el tiempo máximo de espera para una petición HTTP

### Descripción

public
**EventHttp::setTimeout**(

    [int](#language.types.integer) $value

): [void](language.types.void.html)

Define el tiempo máximo de espera para una petición HTTP.

### Parámetros

     value



      El tiempo máximo de espera, en segundos.


### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [EventHttp::accept](#eventhttp.accept) — Permite a un servidor HTTP aceptar las conexiones en el
  socket o recurso especificado
- [EventHttp::addServerAlias](#eventhttp.addserveralias) — Añade un alias del servidor para el objeto servidor HTTP
- [EventHttp::bind](#eventhttp.bind) — Liga un servidor HTTP a una dirección y un puerto especificados
- [EventHttp::\_\_construct](#eventhttp.construct) — Construye un objeto EventHttp (el servidor HTTP)
- [EventHttp::removeServerAlias](#eventhttp.removeserveralias) — Elimina un alias en el servidor
- [EventHttp::setAllowedMethods](#eventhttp.setallowedmethods) — Define los métodos HTTP soportados y aceptados en las peticiones
  en este servidor, y pasados a las funciones de retrollamada de los usuarios
- [EventHttp::setCallback](#eventhttp.setcallback) — Define una retrollamada para una URI específica
- [EventHttp::setDefaultCallback](#eventhttp.setdefaultcallback) — Define la función de retrollamada por defecto para manejar las peticiones que no son capturadas por
  funciones de retrollamada específicas
- [EventHttp::setMaxBodySize](#eventhttp.setmaxbodysize) — Define la talla máxima del cuerpo de la petición
- [EventHttp::setMaxHeadersSize](#eventhttp.setmaxheaderssize) — Define el tamaño máximo de las cabeceras HTTP
- [EventHttp::setTimeout](#eventhttp.settimeout) — Define el tiempo máximo de espera para una petición HTTP

# La clase EventHttpConnection

(PECL event &gt;= 1.4.0-beta)

## Introducción

    Representa una conexión HTTP.

## Sinopsis de la Clase

     ****




      class **EventHttpConnection**

     {

    /* Métodos */

public
[\_\_construct](#eventhttpconnection.construct)(

    

    [EventBase](#class.eventbase) $base

,

    

    [EventDnsBase](#class.eventdnsbase) $dns_base

,

    

    [string](#language.types.string) $address

,

    

    [int](#language.types.integer) $port

,

    

    [EventSslContext](#class.eventsslcontext) $ctx
     = **[null](#constant.null)**

)
public
[getBase](#eventhttpconnection.getbase)(): [EventBase](#class.eventbase)
public
[getPeer](#eventhttpconnection.getpeer)(

    [string](#language.types.string) &amp;$address

,

    [int](#language.types.integer) &amp;$port

): [void](language.types.void.html)
public
[makeRequest](#eventhttpconnection.makerequest)(

    [EventHttpRequest](#class.eventhttprequest) $req

,

    [int](#language.types.integer) $type

,

    [string](#language.types.string) $uri

): [bool](#language.types.boolean)
public
[setCloseCallback](#eventhttpconnection.setclosecallback)(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
    = ?): [void](language.types.void.html)

public
[setLocalAddress](#eventhttpconnection.setlocaladdress)(

    [string](#language.types.string) $address

): [void](language.types.void.html)
public
[setLocalPort](#eventhttpconnection.setlocalport)(

    [int](#language.types.integer) $port

): [void](language.types.void.html)
public
[setMaxBodySize](#eventhttpconnection.setmaxbodysize)(

    [string](#language.types.string) $max_size

): [void](language.types.void.html)
public
[setMaxHeadersSize](#eventhttpconnection.setmaxheaderssize)(

    [string](#language.types.string) $max_size

): [void](language.types.void.html)
public
[setRetries](#eventhttpconnection.setretries)(

    [int](#language.types.integer) $retries

): [void](language.types.void.html)
public
[setTimeout](#eventhttpconnection.settimeout)(

    [int](#language.types.integer) $timeout

): [void](language.types.void.html)

}

# EventHttpConnection::\_\_construct

(PECL event &gt;= 1.2.6-beta)

EventHttpConnection::\_\_construct — Construye un objeto EventHttpConnection

### Descripción

public
**EventHttpConnection::\_\_construct**(

    

    [EventBase](#class.eventbase) $base

,

    

    [EventDnsBase](#class.eventdnsbase) $dns_base

,

    

    [string](#language.types.string) $address

,

    

    [int](#language.types.integer) $port

,

    

    [EventSslContext](#class.eventsslcontext) $ctx
     = **[null](#constant.null)**

)

Construye un objeto EventHttpConnection.

### Parámetros

     base



      Base de evento asociada.







     dns_base



      Si vale **[null](#constant.null)**, la resolución del nombre de host será bloqueante.







     address



      La dirección de conexión.







     port



      El puerto de conexión.







     ctx



      El objeto de la clase [EventSslContext](#class.eventsslcontext).
      Activa OpenSSL.



     **Nota**:



       Este parámetro solo está disponible si Event
       ha sido compilado con soporte OpenSSL, y únicamente con la
       versión Libevent 2.1.0-alpha y superiores.





### Historial de cambios

       Versión
       Descripción






       PECL event 1.9.0

        Añadido soporte de OpenSSL (ctx).





# EventHttpConnection::getBase

(PECL event &gt;= 1.2.6-beta)

EventHttpConnection::getBase — Devuelve la base de eventos asociada con la conexión

### Descripción

public
**EventHttpConnection::getBase**(): [EventBase](#class.eventbase)

Devuelve la base de eventos asociada con la conexión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el objeto [EventBase](#class.eventbase) asociado con
la conexión en caso de éxito, **[false](#constant.false)** de lo contrario.

# EventHttpConnection::getPeer

(PECL event &gt;= 1.2.6-beta)

EventHttpConnection::getPeer — Recupera la dirección y el puerto remoto asociados con la conexión

### Descripción

public
**EventHttpConnection::getPeer**(

    [string](#language.types.string) &amp;$address

,

    [int](#language.types.integer) &amp;$port

): [void](language.types.void.html)

Recupera la dirección y el puerto remoto asociados con la conexión.

### Parámetros

     address



      Dirección del par.







     port



      Puerto del par.


### Valores devueltos

No se retorna ningún valor.

# EventHttpConnection::makeRequest

(PECL event &gt;= 1.4.0-beta)

EventHttpConnection::makeRequest — Realiza una petición HTTP en la conexión especificada

### Descripción

public
**EventHttpConnection::makeRequest**(

    [EventHttpRequest](#class.eventhttprequest) $req

,

    [int](#language.types.integer) $type

,

    [string](#language.types.string) $uri

): [bool](#language.types.boolean)

Realiza una petición HTTP en la conexión especificada.
El parámetro type será una constante
EventHttpRequest::CMD\_\*.

### Parámetros

     req



      El objeto que representa la conexión en la que se enviará la petición.







     type



      Una constante
      [EventHttpRequest::CMD_*](#eventhttprequest.constants).







     uri



      El URI asociado a la petición.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1
Ejemplo con EventHttpConnection::makeRequest()**

&lt;?php
function \_request_handler($req, $base) {
echo **FUNCTION**, PHP_EOL;

    if (is_null($req)) {
        echo "Tiempo límite excedido\n";
    } else {
        $response_code = $req-&gt;getResponseCode();

        if ($response_code == 0) {
            echo "Conexión rechazada\n";
        } elseif ($response_code != 200) {
            echo "Respuesta inesperada: $response_code\n";
        } else {
            echo "Éxito: $response_code\n";
            $buf = $req-&gt;getInputBuffer();
            echo "Cuerpo:\n";
            while ($s = $buf-&gt;readLine(EventBuffer::EOL_ANY)) {
                echo $s, PHP_EOL;
            }
        }
    }

    $base-&gt;exit(NULL);

}

$address = "127.0.0.1";
$port = 80;

$base = new EventBase();
$conn = new EventHttpConnection($base, NULL, $address, $port);
$conn-&gt;setTimeout(5);
$req = new EventHttpRequest("\_request_handler", $base);

$req-&gt;addHeader("Host", $address, EventHttpRequest::OUTPUT_HEADER);
$req-&gt;addHeader("Content-Length", "0", EventHttpRequest::OUTPUT_HEADER);
$conn-&gt;makeRequest($req, EventHttpRequest::CMD_GET, "/index.cphp");

$base-&gt;loop();
?&gt;

Resultado del ejemplo anterior es similar a:

\_request_handler
Éxito: 200
Cuerpo:
PHP, date:
2013-03-13T20:27:52+05:00

### Ver también

- [EventHttpRequest::addHeader()](#eventhttprequest.addheader) - Añade un encabezado HTTP a los encabezados de la petición

# EventHttpConnection::setCloseCallback

(PECL event &gt;= 1.8.0)

EventHttpConnection::setCloseCallback — Define una función de retrollamada al cerrar la conexión

### Descripción

public
**EventHttpConnection::setCloseCallback**(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
    = ?): [void](language.types.void.html)

Define una función de retrollamada al cerrar la conexión.

### Parámetros

     callback



      Función de retrollamada a llamar al cerrar la conexión.
      Debe corresponder al siguiente prototipo:




      **callback**(

       [EventHttpConnection](#class.eventhttpconnection) $conn
        = **[null](#constant.null)**
      ,

       [mixed](#language.types.mixed) $arg
        = **[null](#constant.null)**
      ): [void](language.types.void.html)

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo con EventHttpConnection::setCloseCallback()**

&lt;?php
/\*

- Configuración de la retrollamada de cierre de conexión
-
- El script maneja las conexiones cerradas utilizando la API HTTP.
-
- Uso:
-   1. Iniciar el servidor:
- $ php examples/http_closecb.php 4242
-
-   2. Iniciar un cliente en otra terminal. La sesión de tipo telnet
- debe verse como sigue:
-
- $ nc -t 127.0.0.1 4242
- GET / HTTP/1.0
- Connection: close
-
- El servidor debe mostrar algo similar a lo siguiente:
-
- HTTP/1.0 200 OK
- Content-Type: multipart/x-mixed-replace;boundary=boundarydonotcross
- Connection: close
-
- &lt;html&gt;
-
-   3. Terminar la conexión del cliente abruptamente,
- es decir, matar el proceso o simplemente presionar Ctrl-C.
-
-   4. Verificar si el servidor llamó a \_close_callback.
- El script debe mostrar la cadena "\_close_callback" en la salida estándar.
-
-   5. Verificar si el proceso del servidor no tiene conexiones huérfanas,
- por ejemplo, con la utilidad `lsof`.
  \*/

function \_close_callback($conn)
{
echo **FUNCTION**, PHP_EOL;
}

function \_http_default($req, $dummy)
{
$conn = $req-&gt;getConnection();
$conn-&gt;setCloseCallback('\_close_callback', NULL);

    /*
    Al habilitar Event::READ se protege al servidor contra conexiones no cerradas.
    Esta es una peculiaridad de Libevent. La biblioteca deshabilita los eventos Event::READ
    en esta conexión, y el servidor no es notificado sobre las conexiones terminadas.

    Por lo tanto, cada vez que el cliente termina la conexión abruptamente, obtenemos una conexión huérfana. Por ejemplo, lo siguiente es parte del comando `lsof -p $PID | grep TCP`
    después de que el cliente ha terminado la conexión:

    57-php     15057 ruslan  6u  unix 0xffff8802fb59c780   0t0  125187 socket
    58:php     15057 ruslan  7u  IPv4             125189   0t0     TCP *:4242 (LISTEN)
    59:php     15057 ruslan  8u  IPv4             124342   0t0     TCP localhost:4242-&gt;localhost:37375 (CLOSE_WAIT)

    donde $PID es el ID del proceso.

    El siguiente bloque de código corrige este tipo de conexiones huérfanas.
     */
    $bev = $req-&gt;getBufferEvent();
    $bev-&gt;enable(Event::READ);

    // Debemos liberarlo explícitamente. Ver EventHttpRequest::getConnection

    $bev-&gt;free(); // Debemos liberarlo explícitamente

    $req-&gt;addHeader(
        'Content-Type',
        'multipart/x-mixed-replace;boundary=boundarydonotcross',
        EventHttpRequest::OUTPUT_HEADER
    );

    $buf = new EventBuffer();
    $buf-&gt;add('&lt;html&gt;');

    $req-&gt;sendReply(200, "OK");
    $req-&gt;sendReplyChunk($buf);

}

$port = 4242;
if ($argc &gt; 1) {
$port = (int) $argv[1];
}
if ($port &lt;= 0 || $port &gt; 65535) {
exit("Puerto no válido");
}

$base = new EventBase();
$http = new EventHttp($base);

$http-&gt;setDefaultCallback("_http_default", NULL);
$http-&gt;bind("0.0.0.0", $port);
$base-&gt;loop();

?&gt;

# EventHttpConnection::setLocalAddress

(PECL event &gt;= 1.2.6-beta)

EventHttpConnection::setLocalAddress — Define la dirección IP desde la cual se realizan las conexiones HTTP

### Descripción

public
**EventHttpConnection::setLocalAddress**(

    [string](#language.types.string) $address

): [void](language.types.void.html)

Define la dirección IP desde la cual se realizan las conexiones HTTP.

### Parámetros

     address



      La dirección IP desde la cual se realizan las conexiones HTTP.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EventHttpConnection::setLocalPort()](#eventhttpconnection.setlocalport) - Define el puerto local desde el cual se realizan las conexiones

# EventHttpConnection::setLocalPort

(PECL event &gt;= 1.2.6-beta)

EventHttpConnection::setLocalPort — Define el puerto local desde el cual se realizan las conexiones

### Descripción

public
**EventHttpConnection::setLocalPort**(

    [int](#language.types.integer) $port

): [void](language.types.void.html)

Define el puerto local desde el cual se realizan las conexiones.

### Parámetros

     port



      El número del puerto.


### Valores devueltos

### Ver también

- [EventHttpConnection::setLocalAddress()](#eventhttpconnection.setlocaladdress) - Define la dirección IP desde la cual se realizan las conexiones HTTP

# EventHttpConnection::setMaxBodySize

(PECL event &gt;= 1.2.6-beta)

EventHttpConnection::setMaxBodySize — Define el tamaño máximo del cuerpo para la conexión

### Descripción

public
**EventHttpConnection::setMaxBodySize**(

    [string](#language.types.string) $max_size

): [void](language.types.void.html)

Define el tamaño máximo del cuerpo para la conexión.

### Parámetros

     max_size



      El tamaño máximo del cuerpo, en bytes.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EventHttpConnection::setMaxHeadersSize()](#eventhttpconnection.setmaxheaderssize) - Define el tamaño máximo de las cabeceras

# EventHttpConnection::setMaxHeadersSize

(PECL event &gt;= 1.2.6-beta)

EventHttpConnection::setMaxHeadersSize — Define el tamaño máximo de las cabeceras

### Descripción

public
**EventHttpConnection::setMaxHeadersSize**(

    [string](#language.types.string) $max_size

): [void](language.types.void.html)

Define el tamaño máximo de las cabeceras para la conexión.

### Parámetros

     max_size



      El tamaño máximo de las cabeceras, en bytes.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EventHttpConnection::setMaxBodySize()](#eventhttpconnection.setmaxbodysize) - Define el tamaño máximo del cuerpo para la conexión

# EventHttpConnection::setRetries

(PECL event &gt;= 1.2.6-beta)

EventHttpConnection::setRetries — Define el número de intentos para la conexión

### Descripción

public
**EventHttpConnection::setRetries**(

    [int](#language.types.integer) $retries

): [void](language.types.void.html)

Define el número de intentos para la conexión.

### Parámetros

     retries



      El número límite de intentos.
      **[-1](#constant.-1)** significa indefinidamente.


### Valores devueltos

No se retorna ningún valor.

# EventHttpConnection::setTimeout

(PECL event &gt;= 1.2.6-beta)

EventHttpConnection::setTimeout — Define el tiempo límite máximo para la conexión

### Descripción

public
**EventHttpConnection::setTimeout**(

    [int](#language.types.integer) $timeout

): [void](language.types.void.html)

Define el tiempo límite máximo para la conexión.

### Parámetros

     timeout



      El tiempo límite máximo, en segundos.


### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [EventHttpConnection::\_\_construct](#eventhttpconnection.construct) — Construye un objeto EventHttpConnection
- [EventHttpConnection::getBase](#eventhttpconnection.getbase) — Devuelve la base de eventos asociada con la conexión
- [EventHttpConnection::getPeer](#eventhttpconnection.getpeer) — Recupera la dirección y el puerto remoto asociados con la conexión
- [EventHttpConnection::makeRequest](#eventhttpconnection.makerequest) — Realiza una petición HTTP en la conexión especificada
- [EventHttpConnection::setCloseCallback](#eventhttpconnection.setclosecallback) — Define una función de retrollamada al cerrar la conexión
- [EventHttpConnection::setLocalAddress](#eventhttpconnection.setlocaladdress) — Define la dirección IP desde la cual se realizan las conexiones HTTP
- [EventHttpConnection::setLocalPort](#eventhttpconnection.setlocalport) — Define el puerto local desde el cual se realizan las conexiones
- [EventHttpConnection::setMaxBodySize](#eventhttpconnection.setmaxbodysize) — Define el tamaño máximo del cuerpo para la conexión
- [EventHttpConnection::setMaxHeadersSize](#eventhttpconnection.setmaxheaderssize) — Define el tamaño máximo de las cabeceras
- [EventHttpConnection::setRetries](#eventhttpconnection.setretries) — Define el número de intentos para la conexión
- [EventHttpConnection::setTimeout](#eventhttpconnection.settimeout) — Define el tiempo límite máximo para la conexión

# La clase EventHttpRequest

(PECL event &gt;= 1.4.0-beta)

## Introducción

    Representa una petición HTTP.

## Sinopsis de la Clase

     ****




      class **EventHttpRequest**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [CMD_GET](#eventhttprequest.constants.cmd-get) = 1;

    const
     [int](#language.types.integer)
      [CMD_POST](#eventhttprequest.constants.cmd-post) = 2;

    const
     [int](#language.types.integer)
      [CMD_HEAD](#eventhttprequest.constants.cmd-head) = 4;

    const
     [int](#language.types.integer)
      [CMD_PUT](#eventhttprequest.constants.cmd-put) = 8;

    const
     [int](#language.types.integer)
      [CMD_DELETE](#eventhttprequest.constants.cmd-delete) = 16;

    const
     [int](#language.types.integer)
      [CMD_OPTIONS](#eventhttprequest.constants.cmd-options) = 32;

    const
     [int](#language.types.integer)
      [CMD_TRACE](#eventhttprequest.constants.cmd-trace) = 64;

    const
     [int](#language.types.integer)
      [CMD_CONNECT](#eventhttprequest.constants.cmd-connect) = 128;

    const
     [int](#language.types.integer)
      [CMD_PATCH](#eventhttprequest.constants.cmd-patch) = 256;

    const
     [int](#language.types.integer)
      [INPUT_HEADER](#eventhttprequest.constants.input-header) = 1;

    const
     [int](#language.types.integer)
      [OUTPUT_HEADER](#eventhttprequest.constants.output-header) = 2;

    /* Métodos */

public
[addHeader](#eventhttprequest.addheader)(

    [string](#language.types.string) $key

,

    [string](#language.types.string) $value

,

    [int](#language.types.integer) $type

): [bool](#language.types.boolean)
public
[cancel](#eventhttprequest.cancel)(): [void](language.types.void.html)
public
[clearHeaders](#eventhttprequest.clearheaders)(): [void](language.types.void.html)
public
[closeConnection](#eventhttprequest.closeconnection)(): [void](language.types.void.html)
public
[\_\_construct](#eventhttprequest.construct)(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

)
public
[findHeader](#eventhttprequest.findheader)(

    [string](#language.types.string) $key

,

    [string](#language.types.string) $type

): [void](language.types.void.html)
public
[free](#eventhttprequest.free)(): [void](language.types.void.html)
public
[closeConnection](#eventhttprequest.closeconnection)(): [EventBufferEvent](#class.eventbufferevent)
public
[getCommand](#eventhttprequest.getcommand)(): [void](language.types.void.html)
public
[closeConnection](#eventhttprequest.closeconnection)(): [EventHttpConnection](#class.eventhttpconnection)
public
[getHost](#eventhttprequest.gethost)(): [string](#language.types.string)
public
[getInputBuffer](#eventhttprequest.getinputbuffer)(): [EventBuffer](#class.eventbuffer)
public
[getInputHeaders](#eventhttprequest.getinputheaders)(): [array](#language.types.array)
public
[getOutputBuffer](#eventhttprequest.getoutputbuffer)(): [EventBuffer](#class.eventbuffer)
public
[getOutputHeaders](#eventhttprequest.getoutputheaders)(): [void](language.types.void.html)
public
[getResponseCode](#eventhttprequest.getresponsecode)(): [int](#language.types.integer)
public
[getUri](#eventhttprequest.geturi)(): [string](#language.types.string)
public
[removeHeader](#eventhttprequest.removeheader)(

    [string](#language.types.string) $key

,

    [string](#language.types.string) $type

): [void](language.types.void.html)
public
[sendError](#eventhttprequest.senderror)(

    [int](#language.types.integer) $error

,

    [string](#language.types.string) $reason
     = **[null](#constant.null)**

): [void](language.types.void.html)
public
[sendReply](#eventhttprequest.sendreply)(

    [int](#language.types.integer) $code

,

    [string](#language.types.string) $reason

,

    [EventBuffer](#class.eventbuffer) $buf
    = ?): [void](language.types.void.html)

public
[sendReplyChunk](#eventhttprequest.sendreplychunk)(

    [EventBuffer](#class.eventbuffer) $buf

): [void](language.types.void.html)
public
[sendReplyEnd](#eventhttprequest.sendreplyend)(): [void](language.types.void.html)
public
[sendReplyStart](#eventhttprequest.sendreplystart)(

    [int](#language.types.integer) $code

,

    [string](#language.types.string) $reason

): [void](language.types.void.html)

}

## Constantes predefinidas

      **[EventHttpRequest::CMD_GET](#eventhttprequest.constants.cmd-get)**



       método GET (comando)







      **[EventHttpRequest::CMD_POST](#eventhttprequest.constants.cmd-post)**



       método POST (comando)







      **[EventHttpRequest::CMD_HEAD](#eventhttprequest.constants.cmd-head)**



       método HEAD (comando)







      **[EventHttpRequest::CMD_PUT](#eventhttprequest.constants.cmd-put)**



       método PUT (comando)







      **[EventHttpRequest::CMD_DELETE](#eventhttprequest.constants.cmd-delete)**



       comando DELETE (método)







      **[EventHttpRequest::CMD_OPTIONS](#eventhttprequest.constants.cmd-options)**



       método OPTIONS (comando)







      **[EventHttpRequest::CMD_TRACE](#eventhttprequest.constants.cmd-trace)**



       método TRACE (comando)







      **[EventHttpRequest::CMD_CONNECT](#eventhttprequest.constants.cmd-connect)**



       método CONNECT (comando)







      **[EventHttpRequest::CMD_PATCH](#eventhttprequest.constants.cmd-patch)**



       método PATCH (comando)







      **[EventHttpRequest::INPUT_HEADER](#eventhttprequest.constants.input-header)**



       Solicita el tipo de encabezado de entrada.







      **[EventHttpRequest::OUTPUT_HEADER](#eventhttprequest.constants.output-header)**



       Solicita el tipo de encabezado de salida.





# EventHttpRequest::addHeader

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::addHeader — Añade un encabezado HTTP a los encabezados de la petición

### Descripción

public
**EventHttpRequest::addHeader**(

    [string](#language.types.string) $key

,

    [string](#language.types.string) $value

,

    [int](#language.types.integer) $type

): [bool](#language.types.boolean)

Añade un encabezado HTTP a los encabezados de la petición.

### Parámetros

     key



      Nombre del encabezado.







     value



      Valor del encabezado.







     type



      Una de las constantes
      [
       EventHttpRequest::*_HEADER](#eventhttprequest.constants).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventHttpRequest::removeHeader()](#eventhttprequest.removeheader) - Elimina un encabezado HTTP de los encabezados de la petición

# EventHttpRequest::cancel

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::cancel — Cancela una petición HTTP pendiente

### Descripción

public
**EventHttpRequest::cancel**(): [void](language.types.void.html)

Cancela una petición HTTP pendiente.

Cancela una petición HTTP entrante. La retrollamada asociada con
esta petición no será ejecutada, y el objeto de la petición, liberado.
Si la petición está en curso de procesamiento, el objeto [EventHttpConnection](#class.eventhttpconnection)
correspondiente será re-inicializado.

Una petición no puede ser cancelada si su retrollamada ya ha sido ejecutada.
Una petición puede ser cancelada desde su retrollamada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# EventHttpRequest::clearHeaders

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::clearHeaders — Elimina todos los encabezados de la lista de encabezados de la petición

### Descripción

public
**EventHttpRequest::clearHeaders**(): [void](language.types.void.html)

Elimina todos los encabezados de la lista de encabezados de la petición.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EventHttpRequest::addHeader()](#eventhttprequest.addheader) - Añade un encabezado HTTP a los encabezados de la petición

# EventHttpRequest::closeConnection

(PECL event &gt;= 1.8.0)

EventHttpRequest::closeConnection — Cierra las conexiones HTTP asociadas

### Descripción

public
**EventHttpRequest::closeConnection**(): [void](language.types.void.html)

Cierra las conexiones HTTP asociadas con la petición.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# EventHttpRequest::\_\_construct

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::\_\_construct — Construye un objeto EventHttpRequest

### Descripción

public
**EventHttpRequest::\_\_construct**(

    [callable](#language.types.callable) $callback

,

    [mixed](#language.types.mixed) $data
     = **[null](#constant.null)**

)

Construye un objeto EventHttpRequest.

### Parámetros

     callback



      Función de retrollamada llamada con la ruta solicitada.
      Debe corresponder al siguiente prototipo:




      **callback**(

       [EventHttpRequest](#class.eventhttprequest) $req
        = **[null](#constant.null)**
      ,

       [mixed](#language.types.mixed) $arg
        = **[null](#constant.null)**
      ): [void](language.types.void.html)





     data



      Datos personalizados del usuario para pasar a
      la función de retrollamada.


### Ejemplos

**Ejemplo #1
Ejemplo con EventHttpRequest::\_\_construct()**

&lt;?php

function \_request_handler($req, $base) {
echo **FUNCTION**, PHP_EOL;

    if (is_null($req)) {
        echo "Tiempo límite de ejecución alcanzado\n";
    } else {
        $response_code = $req-&gt;getResponseCode();

        if ($response_code == 0) {
            echo "Conexión rechazada\n";
        } elseif ($response_code != 200) {
            echo "Respuesta inesperada: $response_code\n";
        } else {
            echo "Éxito: $response_code\n";
            $buf = $req-&gt;getInputBuffer();
            echo "Body:\n";
            while ($s = $buf-&gt;readLine(EventBuffer::EOL_ANY)) {
                echo $s, PHP_EOL;
            }
        }
    }

    $base-&gt;exit(NULL);

}

$address = "127.0.0.1";
$port = 80;

$base = new EventBase();
$conn = new EventHttpConnection($base, NULL, $address, $port);
$conn-&gt;setTimeout(5);
$req = new EventHttpRequest("\_request_handler", $base);

$req-&gt;addHeader("Host", $address, EventHttpRequest::OUTPUT_HEADER);
$req-&gt;addHeader("Content-Length", "0", EventHttpRequest::OUTPUT_HEADER);
$conn-&gt;makeRequest($req, EventHttpRequest::CMD_GET, "/index.cphp");

$base-&gt;loop();
?&gt;

### Ver también

- [EventHttpRequest::cancel()](#eventhttprequest.cancel) - Cancela una petición HTTP pendiente

- [EventHttpRequest::addHeader()](#eventhttprequest.addheader) - Añade un encabezado HTTP a los encabezados de la petición

# EventHttpRequest::findHeader

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::findHeader — Busca el valor de un encabezado

### Descripción

public
**EventHttpRequest::findHeader**(

    [string](#language.types.string) $key

,

    [string](#language.types.string) $type

): [void](language.types.void.html)

Busca el valor de un encabezado.

### Parámetros

     key



      El nombre del encabezado.







     type



      Una de las constantes
      [
       EventHttpRequest::*_HEADER](#eventhttprequest.constants).


### Valores devueltos

Devuelve **[null](#constant.null)** si el encabezado no ha sido encontrado.

### Ver también

- [EventHttpRequest::addHeader()](#eventhttprequest.addheader) - Añade un encabezado HTTP a los encabezados de la petición

# EventHttpRequest::free

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::free — Libera el objeto y elimina los eventos asociados

### Descripción

public
**EventHttpRequest::free**(): [void](language.types.void.html)

Libera el objeto y elimina los eventos asociados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# EventHttpRequest::getBufferEvent

(PECL event &gt;= 1.8.0)

EventHttpRequest::getBufferEvent — Devuelve el objeto EventBufferEvent

### Descripción

public
[EventHttpRequest::closeConnection](#eventhttprequest.closeconnection)(): [EventBufferEvent](#class.eventbufferevent)

Devuelve el objeto [EventBufferEvent](#class.eventbufferevent)
que representa el evento de buffer que la conexión utiliza.

**Advertencia**

    El contador de referencia del objeto devuelto será incrementado en uno para
    proteger las estructuras internas contra destrucciones prematuras cuando
    el método es llamado desde una función de retrollamada. El objeto
    [EventBufferEvent](#class.eventbufferevent) debe ser liberado explícitamente
    a través del método [EventBufferEvent::free()](#eventbufferevent.free).
    De lo contrario, habrá una fuga de memoria.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto [EventBufferEvent](#class.eventbufferevent).

### Ver también

- [EventHttpRequest::getConnection()](#eventhttprequest.getconnection) - Devuelve un objeto EventHttpConnection

# EventHttpRequest::getCommand

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::getCommand — Devuelve el comando de la petición (método)

### Descripción

public
**EventHttpRequest::getCommand**(): [void](language.types.void.html)

Devuelve el comando de la petición; una de las constantes
[
EventHttpRequest::CMD\_\*
](#eventhttprequest.constants).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el comando de la petición; una de las constantes
[
EventHttpRequest::CMD\_\*
](#eventhttprequest.constants).

# EventHttpRequest::getConnection

(PECL event &gt;= 1.8.0)

EventHttpRequest::getConnection — Devuelve un objeto EventHttpConnection

### Descripción

public
[EventHttpRequest::closeConnection](#eventhttprequest.closeconnection)(): [EventHttpConnection](#class.eventhttpconnection)

Devuelve un objeto [EventHttpConnection](#class.eventhttpconnection)
que representa una conexión HTTP asociada a la petición.

**Advertencia**

    La API Libevent permite que los objetos de petición HTTP no estén
    ligados a una conexión HTTP. Sin embargo, no se puede disociar
    [EventHttpRequest](#class.eventhttprequest) de
    [EventHttpConnection](#class.eventhttpconnection). Por lo tanto, se construye
    el objeto [EventHttpConnection](#class.eventhttpconnection) sobre la marcha.
    Dado que no se dispone de información sobre el evento de base,
    la base DNS, ni sobre la función de retrollamada asociada al cierre
    de la conexión, se establecen estos campos como indefinidos.

El método **EventHttpRequest::getConnection()**
es habitualmente útil cuando se debe definir una función de retrollamada
para asociarla al cierre de la conexión. Ver el método
[EventHttpConnection::setCloseCallback()](#eventhttpconnection.setclosecallback).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto [EventHttpConnection](#class.eventhttpconnection).

### Ver también

- [EventHttpConnection::setCloseCallback()](#eventhttpconnection.setclosecallback) - Define una función de retrollamada al cerrar la conexión

- [EventHttpRequest::getBufferEvent()](#eventhttprequest.getbufferevent) - Devuelve el objeto EventBufferEvent

# EventHttpRequest::getHost

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::getHost — Devuelve el host solicitado

### Descripción

public
**EventHttpRequest::getHost**(): [string](#language.types.string)

Devuelve el host solicitado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el host solicitado.

### Ver también

- [EventHttpRequest::getUri()](#eventhttprequest.geturi) - Devuelve el URI de la petición

- [EventHttpRequest::getCommand()](#eventhttprequest.getcommand) - Devuelve el comando de la petición (método)

# EventHttpRequest::getInputBuffer

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::getInputBuffer — Devuelve el buffer de entrada

### Descripción

public
**EventHttpRequest::getInputBuffer**(): [EventBuffer](#class.eventbuffer)

Devuelve el buffer de entrada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el buffer de entrada.

### Ver también

- [EventHttpRequest::getOutputBuffer()](#eventhttprequest.getoutputbuffer) - Devuelve el buffer de salida de la petición

# EventHttpRequest::getInputHeaders

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::getInputHeaders — Devuelve el array asociativo que contiene los encabezados de entrada

### Descripción

public
**EventHttpRequest::getInputHeaders**(): [array](#language.types.array)

Devuelve el array asociativo que contiene los encabezados de entrada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el array asociativo que contiene los encabezados de entrada.

### Ver también

- [EventHttpRequest::getOutputHeaders()](#eventhttprequest.getoutputheaders) - Devuelve un array asociativo que contiene los encabezados de salida

# EventHttpRequest::getOutputBuffer

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::getOutputBuffer — Devuelve el buffer de salida de la petición

### Descripción

public
**EventHttpRequest::getOutputBuffer**(): [EventBuffer](#class.eventbuffer)

Devuelve el buffer de salida de la petición.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el buffer de salida de la petición.

### Ver también

- [EventHttpRequest::getInputBuffer()](#eventhttprequest.getinputbuffer) - Devuelve el buffer de entrada

# EventHttpRequest::getOutputHeaders

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::getOutputHeaders — Devuelve un array asociativo que contiene los encabezados de salida

### Descripción

public
**EventHttpRequest::getOutputHeaders**(): [void](language.types.void.html)

Devuelve un array asociativo que contiene los encabezados de salida.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [EventHttpRequest::getInputHeaders()](#eventhttprequest.getinputheaders) - Devuelve el array asociativo que contiene los encabezados de entrada

# EventHttpRequest::getResponseCode

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::getResponseCode — Devuelve el código de la respuesta

### Descripción

public
**EventHttpRequest::getResponseCode**(): [int](#language.types.integer)

Devuelve el código de la respuesta.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el código de la respuesta.

### Ver también

- [EventHttpRequest::getCommand()](#eventhttprequest.getcommand) - Devuelve el comando de la petición (método)

- [EventHttpRequest::getHost()](#eventhttprequest.gethost) - Devuelve el host solicitado

- [EventHttpRequest::getUri()](#eventhttprequest.geturi) - Devuelve el URI de la petición

# EventHttpRequest::getUri

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::getUri — Devuelve el URI de la petición

### Descripción

public
**EventHttpRequest::getUri**(): [string](#language.types.string)

Devuelve el URI de la petición.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el URI de la petición.

### Ver también

- [EventHttpRequest::getCommand()](#eventhttprequest.getcommand) - Devuelve el comando de la petición (método)

- [EventHttpRequest::getHost()](#eventhttprequest.gethost) - Devuelve el host solicitado

- [EventHttpRequest::getResponseCode()](#eventhttprequest.getresponsecode) - Devuelve el código de la respuesta

# EventHttpRequest::removeHeader

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::removeHeader — Elimina un encabezado HTTP de los encabezados de la petición

### Descripción

public
**EventHttpRequest::removeHeader**(

    [string](#language.types.string) $key

,

    [string](#language.types.string) $type

): [void](language.types.void.html)

Elimina un encabezado HTTP de los encabezados de la petición.

### Parámetros

     key



      El nombre del encabezado.







     type



      Una constante EventHttpRequest::*_HEADER.


### Valores devueltos

Elimina un encabezado HTTP de los encabezados de la petición.

### Ver también

- [EventHttpRequest::addHeader()](#eventhttprequest.addheader) - Añade un encabezado HTTP a los encabezados de la petición

# EventHttpRequest::sendError

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::sendError — Envía un mensaje de error HTML al cliente

### Descripción

public
**EventHttpRequest::sendError**(

    [int](#language.types.integer) $error

,

    [string](#language.types.string) $reason
     = **[null](#constant.null)**

): [void](language.types.void.html)

Envía un mensaje de error HTML al cliente.

### Parámetros

     error



      El código de error HTTP.







     reason



      Una breve explicación del error. Si es **[null](#constant.null)**, se utilizará el significado estándar del código de error.


### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo con EventHttpRequest::sendError()**

&lt;?php
function \_http_400($req) {
$req-&gt;sendError(400);
}

$base = new EventBase();
$http = new EventHttp($base);

$http-&gt;setCallback("/err400", "\_http_400");

$http-&gt;bind("0.0.0.0", 8010);
$base-&gt;loop();
?&gt;

### Ver también

- [EventHttpRequest::sendReply()](#eventhttprequest.sendreply) - Envía una respuesta HTML al cliente

# EventHttpRequest::sendReply

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::sendReply — Envía una respuesta HTML al cliente

### Descripción

public
**EventHttpRequest::sendReply**(

    [int](#language.types.integer) $code

,

    [string](#language.types.string) $reason

,

    [EventBuffer](#class.eventbuffer) $buf
    = ?): [void](language.types.void.html)

Envía una respuesta HTML al cliente. El cuerpo de la respuesta contiene
los datos del parámetro opcional buf.

### Parámetros

     code



      El código de respuesta HTTP a enviar.







     reason



      Un breve mensaje a enviar con el código de respuesta.







     buf



      El cuerpo de la respuesta.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EventHttpRequest::sendError()](#eventhttprequest.senderror) - Envía un mensaje de error HTML al cliente

- [EventHttpRequest::sendReplyChunk()](#eventhttprequest.sendreplychunk) - Envía otro bloque de datos como parte de un bloque de respuesta entrante

# EventHttpRequest::sendReplyChunk

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::sendReplyChunk — Envía otro bloque de datos como parte de un bloque de respuesta entrante

### Descripción

public
**EventHttpRequest::sendReplyChunk**(

    [EventBuffer](#class.eventbuffer) $buf

): [void](language.types.void.html)

Envía otro bloque de datos como parte de un bloque de respuesta entrante.
Después de la llamada a este método, el parámetro buf
estará vacío.

### Parámetros

     buf



      El bloque de datos a enviar como parte de la respuesta.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EventHttpRequest::sendReplyStart()](#eventhttprequest.sendreplystart) - Inicializa un bloque de respuesta

- [EventHttpRequest::sendReplyEnd()](#eventhttprequest.sendreplyend) - Completa un bloque de respuesta, liberando la petición

# EventHttpRequest::sendReplyEnd

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::sendReplyEnd — Completa un bloque de respuesta, liberando la petición

### Descripción

public
**EventHttpRequest::sendReplyEnd**(): [void](language.types.void.html)

Completa un bloque de respuesta, liberando la petición.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EventHttpRequest::sendReplyStart()](#eventhttprequest.sendreplystart) - Inicializa un bloque de respuesta

- [EventHttpRequest::sendReplyChunk()](#eventhttprequest.sendreplychunk) - Envía otro bloque de datos como parte de un bloque de respuesta entrante

# EventHttpRequest::sendReplyStart

(PECL event &gt;= 1.4.0-beta)

EventHttpRequest::sendReplyStart — Inicializa un bloque de respuesta

### Descripción

public
**EventHttpRequest::sendReplyStart**(

    [int](#language.types.integer) $code

,

    [string](#language.types.string) $reason

): [void](language.types.void.html)

Inicializa una respuesta que utiliza las cabeceras
Transfer-Encoding
chunked.

Esto permite al llamante difundir la respuesta al cliente, y es útil
cuando no todos los datos de la respuesta están inmediatamente
disponibles, o bien al enviar respuestas demasiado voluminosas.

El llamante debe proporcionar los bloques de datos con el método
[EventHttpRequest::sendReplyChunk()](#eventhttprequest.sendreplychunk) y completar
la respuesta llamando al método
[EventHttpRequest::sendReplyEnd()](#eventhttprequest.sendreplyend).

### Parámetros

     code



      El código de respuesta HTTP a enviar.







     reason



      Un breve mensaje a enviar con el código de respuesta.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [EventHttpRequest::sendReplyChunk()](#eventhttprequest.sendreplychunk) - Envía otro bloque de datos como parte de un bloque de respuesta entrante

- [EventHttpRequest::sendReplyEnd()](#eventhttprequest.sendreplyend) - Completa un bloque de respuesta, liberando la petición

## Tabla de contenidos

- [EventHttpRequest::addHeader](#eventhttprequest.addheader) — Añade un encabezado HTTP a los encabezados de la petición
- [EventHttpRequest::cancel](#eventhttprequest.cancel) — Cancela una petición HTTP pendiente
- [EventHttpRequest::clearHeaders](#eventhttprequest.clearheaders) — Elimina todos los encabezados de la lista de encabezados de la petición
- [EventHttpRequest::closeConnection](#eventhttprequest.closeconnection) — Cierra las conexiones HTTP asociadas
- [EventHttpRequest::\_\_construct](#eventhttprequest.construct) — Construye un objeto EventHttpRequest
- [EventHttpRequest::findHeader](#eventhttprequest.findheader) — Busca el valor de un encabezado
- [EventHttpRequest::free](#eventhttprequest.free) — Libera el objeto y elimina los eventos asociados
- [EventHttpRequest::getBufferEvent](#eventhttprequest.getbufferevent) — Devuelve el objeto EventBufferEvent
- [EventHttpRequest::getCommand](#eventhttprequest.getcommand) — Devuelve el comando de la petición (método)
- [EventHttpRequest::getConnection](#eventhttprequest.getconnection) — Devuelve un objeto EventHttpConnection
- [EventHttpRequest::getHost](#eventhttprequest.gethost) — Devuelve el host solicitado
- [EventHttpRequest::getInputBuffer](#eventhttprequest.getinputbuffer) — Devuelve el buffer de entrada
- [EventHttpRequest::getInputHeaders](#eventhttprequest.getinputheaders) — Devuelve el array asociativo que contiene los encabezados de entrada
- [EventHttpRequest::getOutputBuffer](#eventhttprequest.getoutputbuffer) — Devuelve el buffer de salida de la petición
- [EventHttpRequest::getOutputHeaders](#eventhttprequest.getoutputheaders) — Devuelve un array asociativo que contiene los encabezados de salida
- [EventHttpRequest::getResponseCode](#eventhttprequest.getresponsecode) — Devuelve el código de la respuesta
- [EventHttpRequest::getUri](#eventhttprequest.geturi) — Devuelve el URI de la petición
- [EventHttpRequest::removeHeader](#eventhttprequest.removeheader) — Elimina un encabezado HTTP de los encabezados de la petición
- [EventHttpRequest::sendError](#eventhttprequest.senderror) — Envía un mensaje de error HTML al cliente
- [EventHttpRequest::sendReply](#eventhttprequest.sendreply) — Envía una respuesta HTML al cliente
- [EventHttpRequest::sendReplyChunk](#eventhttprequest.sendreplychunk) — Envía otro bloque de datos como parte de un bloque de respuesta entrante
- [EventHttpRequest::sendReplyEnd](#eventhttprequest.sendreplyend) — Completa un bloque de respuesta, liberando la petición
- [EventHttpRequest::sendReplyStart](#eventhttprequest.sendreplystart) — Inicializa un bloque de respuesta

# La clase EventListener

(PECL event &gt;= 1.5.0)

## Introducción

    Representa una escucha de conexión.

## Sinopsis de la Clase

     ****




      final
      class **EventListener**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [OPT_LEAVE_SOCKETS_BLOCKING](#eventlistener.constants.opt-leave-sockets-blocking) = 1;

    const
     [int](#language.types.integer)
      [OPT_CLOSE_ON_FREE](#eventlistener.constants.opt-close-on-free) = 2;

    const
     [int](#language.types.integer)
      [OPT_CLOSE_ON_EXEC](#eventlistener.constants.opt-close-on-exec) = 4;

    const
     [int](#language.types.integer)
      [OPT_REUSEABLE](#eventlistener.constants.opt-reuseable) = 8;

    const
     [int](#language.types.integer)
      [OPT_THREADSAFE](#eventlistener.constants.opt-threadsafe) = 16;

    /* Propiedades */
    public
     readonly
     [int](#language.types.integer)
      [$fd](#eventlistener.props.fd);

    /* Métodos */

public
[\_\_construct](#eventlistener.construct)(

    

    [EventBase](#class.eventbase) $base

,

    

    [callable](#language.types.callable) $cb

,

    

    [mixed](#language.types.mixed) $data

,

    

    [int](#language.types.integer) $flags

,

    

    [int](#language.types.integer) $backlog

,

    

    [mixed](#language.types.mixed) $target

)
public
[disable](#eventlistener.disable)(): [bool](#language.types.boolean)
public
[enable](#eventlistener.enable)(): [bool](#language.types.boolean)
public
[getBase](#eventlistener.getbase)(): [void](language.types.void.html)
public
static
[getSocketName](#eventlistener.getsocketname)(

    [string](#language.types.string) &amp;$address

,

    [mixed](#language.types.mixed) &amp;$port
    = ?): [bool](#language.types.boolean)

public
[setCallback](#eventlistener.setcallback)(

    [callable](#language.types.callable) $cb

,

    [mixed](#language.types.mixed) $arg
     = **[null](#constant.null)**

): [void](language.types.void.html)
public
[setErrorCallback](#eventlistener.seterrorcallback)(

    [string](#language.types.string) $cb

): [void](language.types.void.html)

}

## Propiedades

      fd



       Descriptor de fichero numérico del socket subyacente
       (Añadido en event-1.6.0).





## Constantes predefinidas

      **[EventListener::OPT_LEAVE_SOCKETS_BLOCKING](#eventlistener.constants.opt-leave-sockets-blocking)**



       Por omisión, Libevent pone en modo no bloqueante los descriptores
       de ficheros o sockets subyacentes. Este flag indica a Libevent que los deje en modo bloqueante.







      **[EventListener::OPT_CLOSE_ON_FREE](#eventlistener.constants.opt-close-on-free)**



       Si esta opción está definida, la escucha de la conexión cierra su
       socket subyacente cuando el objeto **EventListener**
       es liberado.







      **[EventListener::OPT_CLOSE_ON_EXEC](#eventlistener.constants.opt-close-on-exec)**



       Si esta opción está definida, la escucha de la conexión define
       el flag de cierre a la ejecución en el socket de escucha subyacente. Ver la documentación de la plataforma
       para más información sobre fcntl y
       **[FD_CLOEXEC](#constant.fd-cloexec)**.







      **[EventListener::OPT_REUSEABLE](#eventlistener.constants.opt-reuseable)**



       Por omisión en algunas plataformas, una vez que un socket de escucha
       es cerrado, ningún otro socket puede ser ligado al mismo puerto
       hasta que cierto tiempo no haya pasado. El hecho de definir
       esta opción hace que Libevent marque este socket como reutilizable,
       así, una vez cerrado, otro socket puede ser abierto para escuchar
       el mismo puerto.







      **[EventListener::OPT_THREADSAFE](#eventlistener.constants.opt-threadsafe)**



       Bloqueo de la asignación para el escuchador; así, es seguro utilizarlo desde múltiples threads.





# EventListener::\_\_construct

(PECL event &gt;= 1.2.6-beta)

EventListener::\_\_construct — Crea un nuevo oyente de conexión asociado con la base de eventos

### Descripción

public
**EventListener::\_\_construct**(

    

    [EventBase](#class.eventbase) $base

,

    

    [callable](#language.types.callable) $cb

,

    

    [mixed](#language.types.mixed) $data

,

    

    [int](#language.types.integer) $flags

,

    

    [int](#language.types.integer) $backlog

,

    

    [mixed](#language.types.mixed) $target

)

Crea un nuevo oyente de conexión asociado con la base de eventos.

### Parámetros

     base



      Base de eventos asociada.







     cb



      Un [callable](#language.types.callable) que será invocado cuando una
      nueva conexión sea recibida.







     data



      Datos de usuario personalizados adjuntos al parámetro
      cb.







     flags



      Una máscara de constantes
      EventListener::OPT_*. Ver las
      [constantes EventListener](#eventlistener.constants).







     backlog



      Controla el número máximo de conexiones en espera que la pila de red
      permite esperar en un estado "aún no aceptado"; ver la documentación
      de la función listen de su sistema para más
      detalles. Si el parámetro backlog es negativo,
      Libevent intenta obtener un buen valor para este parámetro;
      si es cero, Event asume que la función del sistema listen
      ya ha sido llamada en el socket (target).







     target



      Puede ser un string, un recurso de socket, o un flujo asociado con un socket. En el caso de que este parámetro sea un string, será analizado como dirección IP.
      Será analizado como socket de dominio UNIX si está prefijado
      por 'unix:', por ejemplo, 'unix:/tmp/my.sock'.


### Historial de cambios

       Versión
       Descripción






       PECL event 1.5.0

        Se añadió el soporte para sockets de dominio UNIX.





### Ejemplos

**Ejemplo #1
Ejemplo con EventListener::\_\_construct()**

&lt;?php
/\*

- Un simple servidor de eco, basado en un oyente de conexión libevent.
-
- Uso:
-   1. En una terminal Windows, ejecute:
-
- $ php listener.php 9881
-
-   2. En otra terminal Windows, abra la siguiente conexión:
-
- $ nc 127.0.0.1 9881
-
-   3. Comience a escribir. El servidor debería repetir las entradas.
       \*/

class MyListenerConnection {
private $bev, $base;

    public function __destruct() {
        $this-&gt;bev-&gt;free();
    }

    public function __construct($base, $fd) {
        $this-&gt;base = $base;

        $this-&gt;bev = new EventBufferEvent($base, $fd, EventBufferEvent::OPT_CLOSE_ON_FREE);

        $this-&gt;bev-&gt;setCallbacks(array($this, "echoReadCallback"), NULL,
            array($this, "echoEventCallback"), NULL);

        if (!$this-&gt;bev-&gt;enable(Event::READ)) {
            echo "Imposible habilitar READ\n";
            return;
        }
    }

    public function echoReadCallback($bev, $ctx) {
        // Copia todos los datos desde el buffer de entrada hacia el buffer de salida

        // Variante #1
        $bev-&gt;output-&gt;addBuffer($bev-&gt;input);

        /* Variante #2 */
        /*
        $input    = $bev-&gt;getInput();
        $output = $bev-&gt;getOutput();
        $output-&gt;addBuffer($input);
        */
    }

    public function echoEventCallback($bev, $events, $ctx) {
        if ($events &amp; EventBufferEvent::ERROR) {
            echo "Error desde bufferevent\n";
        }

        if ($events &amp; (EventBufferEvent::EOF | EventBufferEvent::ERROR)) {
            //$bev-&gt;free();
            $this-&gt;__destruct();
        }
    }

}

class MyListener {
public $base,
$listener,
$socket;
private $conn = array();

    public function __destruct() {
        foreach ($this-&gt;conn as &amp;$c) $c = NULL;
    }

    public function __construct($port) {
        $this-&gt;base = new EventBase();
        if (!$this-&gt;base) {
            echo "Imposible abrir la base del evento";
            exit(1);
        }

        // Variante #1
        /*
        $this-&gt;socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if (!socket_bind($this-&gt;socket, '0.0.0.0', $port)) {
            echo "Imposible enlazar el socket\n";
            exit(1);
        }
        $this-&gt;listener = new EventListener($this-&gt;base,
            array($this, "acceptConnCallback"), $this-&gt;base,
            EventListener::OPT_CLOSE_ON_FREE | EventListener::OPT_REUSEABLE,
            -1, $this-&gt;socket);
         */

        // Variante #2
         $this-&gt;listener = new EventListener($this-&gt;base,
             array($this, "acceptConnCallback"), $this-&gt;base,
             EventListener::OPT_CLOSE_ON_FREE | EventListener::OPT_REUSEABLE, -1,
             "0.0.0.0:$port");

        if (!$this-&gt;listener) {
            echo "No se pudo crear el oyente";
            exit(1);
        }

        $this-&gt;listener-&gt;setErrorCallback(array($this, "accept_error_cb"));
    }

    public function dispatch() {
        $this-&gt;base-&gt;dispatch();
    }

    // Esta función de retrollamada es llamada cuando hay datos para leer desde $bev
    public function acceptConnCallback($listener, $fd, $address, $ctx) {
        // ¡Tenemos una nueva conexión! Se le define un bufferevent. */
        $base = $this-&gt;base;
        $this-&gt;conn[] = new MyListenerConnection($base, $fd);
    }

    public function accept_error_cb($listener, $ctx) {
        $base = $this-&gt;base;

        fprintf(STDERR, "Error recibido %d (%s) en el oyente. "
            ."Cerrando.\n",
            EventUtil::getLastSocketErrno(),
            EventUtil::getLastSocketError());

        $base-&gt;exit(NULL);
    }

}

$port = 9808;

if ($argc &gt; 1) {
    $port = (int) $argv[1];
}
if ($port &lt;= 0 || $port &gt; 65535) {
exit("Puerto inválido");
}

$l = new MyListener($port);
$l-&gt;dispatch();
?&gt;

# EventListener::disable

(PECL event &gt;= 1.2.6-beta)

EventListener::disable — Desactiva un objeto de escucha de eventos de conexión

### Descripción

public
**EventListener::disable**(): [bool](#language.types.boolean)

Desactiva un objeto de escucha de eventos de conexión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventListener::enable()](#eventlistener.enable) - Activa un objeto de escucha de eventos de conexión

# EventListener::enable

(PECL event &gt;= 1.2.6-beta)

EventListener::enable — Activa un objeto de escucha de eventos de conexión

### Descripción

public
**EventListener::enable**(): [bool](#language.types.boolean)

Activa un objeto de escucha de eventos de conexión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [EventListener::disable()](#eventlistener.disable) - Desactiva un objeto de escucha de eventos de conexión

# EventListener::getBase

(PECL event &gt;= 1.2.6-beta)

EventListener::getBase — Devuelve la base de evento asociada con el escuchador de eventos

### Descripción

public
**EventListener::getBase**(): [void](language.types.void.html)

Devuelve la base de evento asociada con el escuchador de eventos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la base de evento asociada con el escuchador de eventos.

# EventListener::getSocketName

(PECL event &gt;= 1.5.0)

EventListener::getSocketName — Recupera la dirección actual a la que está ligado el socket de escucha

### Descripción

public
static
**EventListener::getSocketName**(

    [string](#language.types.string) &amp;$address

,

    [mixed](#language.types.mixed) &amp;$port
    = ?): [bool](#language.types.boolean)

Recupera la dirección actual a la que está ligado el socket de escucha.

### Parámetros

     address



      Parámetro de salida. La dirección IP según la familia de direcciones del socket.







     port



      Parámetro de salida. El puerto al que está ligado el socket.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# EventListener::setCallback

(PECL event &gt;= 1.2.6-beta)

EventListener::setCallback — El propósito de setCallback

### Descripción

public
**EventListener::setCallback**(

    [callable](#language.types.callable) $cb

,

    [mixed](#language.types.mixed) $arg
     = **[null](#constant.null)**

): [void](language.types.void.html)

Coloca una retrollamada para el evento de conexión, y, opcionalmente,
argumentos para esta retrollamada.

### Parámetros

     cb



      La nueva retrollamada para las nuevas conexiones.
      Ignorada si vale **[null](#constant.null)**.




      Debe corresponder al siguiente prototipo:




      **callback**(

    

       [EventListener](#class.eventlistener) $listener
        = **[null](#constant.null)**
      ,

    

       [mixed](#language.types.mixed) $fd
        = **[null](#constant.null)**
      ,

    

       [array](#language.types.array) $address
        = **[null](#constant.null)**
      ,

    

       [mixed](#language.types.mixed) $arg
        = **[null](#constant.null)**


): [void](language.types.void.html)

         listener



          El objeto [EventListener](#class.eventlistener).







         fd



          El descriptor de fichero o un recurso asociado a la escucha.







         address



          Array de dos elementos: la dirección IP y el puerto
          del *servidor*.







         arg



          Datos de usuario personalizados adjuntos a la retrollamada.











     arg



      Datos de usuario personalizados adjuntos a la retrollamada. Ignorados si valen **[null](#constant.null)**.


### Valores devueltos

No se retorna ningún valor.

# EventListener::setErrorCallback

(PECL event &gt;= 1.2.6-beta)

EventListener::setErrorCallback — Define la función de retrollamada en el evento de error

### Descripción

public
**EventListener::setErrorCallback**(

    [string](#language.types.string) $cb

): [void](language.types.void.html)

Define la función de retrollamada en el evento de error.

### Parámetros

     cb



      La función de retrollamada para el error. Debe corresponder al siguiente prototipo:




      **callback**(

       [EventListener](#class.eventlistener) $listener
        = **[null](#constant.null)**
      ,

       [mixed](#language.types.mixed) $data
        = **[null](#constant.null)**
      ): [void](language.types.void.html)







         listener



          El objeto [EventListener](#class.eventlistener).







         data



          Datos personalizados del usuario para asociar a la función de retrollamada.








### Valores devueltos

### Ver también

- [EventListener::setCallback()](#eventlistener.setcallback) - El propósito de setCallback

## Tabla de contenidos

- [EventListener::\_\_construct](#eventlistener.construct) — Crea un nuevo oyente de conexión asociado con la base de eventos
- [EventListener::disable](#eventlistener.disable) — Desactiva un objeto de escucha de eventos de conexión
- [EventListener::enable](#eventlistener.enable) — Activa un objeto de escucha de eventos de conexión
- [EventListener::getBase](#eventlistener.getbase) — Devuelve la base de evento asociada con el escuchador de eventos
- [EventListener::getSocketName](#eventlistener.getsocketname) — Recupera la dirección actual a la que está ligado el socket de escucha
- [EventListener::setCallback](#eventlistener.setcallback) — El propósito de setCallback
- [EventListener::setErrorCallback](#eventlistener.seterrorcallback) — Define la función de retrollamada en el evento de error

# La clase EventSslContext

(PECL event &gt;= 1.2.6-beta)

## Introducción

    Representa la estructura SSL_CTX.
    Proporciona métodos y propiedades para configurar el contexto SSL.

## Sinopsis de la Clase

     ****




      final
      class **EventSslContext**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [SSLv2_CLIENT_METHOD](#eventsslcontext.constants.sslv2-client-method) = 1;

    const
     [int](#language.types.integer)
      [SSLv3_CLIENT_METHOD](#eventsslcontext.constants.sslv3-client-method) = 2;

    const
     [int](#language.types.integer)
      [SSLv23_CLIENT_METHOD](#eventsslcontext.constants.sslv23-client-method) = 3;

    const
     [int](#language.types.integer)
      [TLS_CLIENT_METHOD](#eventsslcontext.constants.tls-client-method) = 4;

    const
     [int](#language.types.integer)
      [SSLv2_SERVER_METHOD](#eventsslcontext.constants.sslv2-server-method) = 5;

    const
     [int](#language.types.integer)
      [SSLv3_SERVER_METHOD](#eventsslcontext.constants.sslv3-server-method) = 6;

    const
     [int](#language.types.integer)
      [SSLv23_SERVER_METHOD](#eventsslcontext.constants.sslv23-server-method) = 7;

    const
     [int](#language.types.integer)
      [TLS_SERVER_METHOD](#eventsslcontext.constants.tls-server-method) = 8;

    const
     [int](#language.types.integer)
      [OPT_LOCAL_CERT](#eventsslcontext.constants.opt-local-cert) = 1;

    const
     [int](#language.types.integer)
      [OPT_LOCAL_PK](#eventsslcontext.constants.opt-local-pk) = 2;

    const
     [int](#language.types.integer)
      [OPT_PASSPHRASE](#eventsslcontext.constants.opt-passphrase) = 3;

    const
     [int](#language.types.integer)
      [OPT_CA_FILE](#eventsslcontext.constants.opt-ca-file) = 4;

    const
     [int](#language.types.integer)
      [OPT_CA_PATH](#eventsslcontext.constants.opt-ca-path) = 5;

    const
     [int](#language.types.integer)
      [OPT_ALLOW_SELF_SIGNED](#eventsslcontext.constants.opt-allow-self-signed) = 6;

    const
     [int](#language.types.integer)
      [OPT_VERIFY_PEER](#eventsslcontext.constants.opt-verify-peer) = 7;

    const
     [int](#language.types.integer)
      [OPT_VERIFY_DEPTH](#eventsslcontext.constants.opt-verify-depth) = 8;

    const
     [int](#language.types.integer)
      [OPT_CIPHERS](#eventsslcontext.constants.opt-ciphers) = 9;

    /* Propiedades */
    public
     [string](#language.types.string)
      [$local_cert](#eventsslcontext.props.local-cert);

    public
     [string](#language.types.string)
      [$local_pk](#eventsslcontext.props.local-pk);

    /* Métodos */

public
[\_\_construct](#eventsslcontext.construct)(

    [string](#language.types.string) $method

,

    [string](#language.types.string) $options

)

}

## Propiedades

      local_cert



       Ruta hacia el fichero que contiene el certificado en el sistema de ficheros.
       Debe ser un fichero codificado PEM que contiene los certificados.
       Puede, opcionalmente, contener la cadena del certificado
       del emisor.







      local_pk



       Ruta hacia el fichero que contiene la clave privada local.





## Constantes predefinidas

      **[EventSslContext::SSLv2_CLIENT_METHOD](#eventsslcontext.constants.sslv2-client-method)**



       Método cliente SSLv2. Ver la página del manual sobre
       SSL_CTX_new(3).







      **[EventSslContext::SSLv3_CLIENT_METHOD](#eventsslcontext.constants.sslv3-client-method)**



       Método cliente SSLv3. Ver la página del manual sobre
       SSL_CTX_new(3).







      **[EventSslContext::SSLv23_CLIENT_METHOD](#eventsslcontext.constants.sslv23-client-method)**



       Método cliente SSLv23. Ver la página del manual sobre
       SSL_CTX_new(3).







      **[EventSslContext::TLS_CLIENT_METHOD](#eventsslcontext.constants.tls-client-method)**



       Método cliente TLS. Ver la página del manual sobre
       SSL_CTX_new(3).







      **[EventSslContext::SSLv2_SERVER_METHOD](#eventsslcontext.constants.sslv2-server-method)**



       Método servidor SSLv2. Ver la página del manual sobre
       SSL_CTX_new(3).







      **[EventSslContext::SSLv3_SERVER_METHOD](#eventsslcontext.constants.sslv3-server-method)**



       Método servidor SSLv3. Ver la página del manual sobre
       SSL_CTX_new(3).







      **[EventSslContext::SSLv23_SERVER_METHOD](#eventsslcontext.constants.sslv23-server-method)**



       Método servidor SSLv23. Ver la página del manual sobre
       SSL_CTX_new(3).







      **[EventSslContext::TLS_SERVER_METHOD](#eventsslcontext.constants.tls-server-method)**



       Método servidor TLS. Ver la página del manual sobre
       SSL_CTX_new(3).







      **[EventSslContext::OPT_LOCAL_CERT](#eventsslcontext.constants.opt-local-cert)**



       Clave para un elemento del array que contiene las opciones, utilizado
       en el método [EventSslContext::__construct()](#eventsslcontext.construct).
       Las opciones apuntan a la ruta del certificado local.







      **[EventSslContext::OPT_LOCAL_PK](#eventsslcontext.constants.opt-local-pk)**



       Clave para un elemento del array que contiene las opciones, utilizado
       en el método [EventSslContext::__construct()](#eventsslcontext.construct).
       Las opciones apuntan a la ruta de la clave privada.







      **[EventSslContext::OPT_PASSPHRASE](#eventsslcontext.constants.opt-passphrase)**



       Clave para un elemento del array que contiene las opciones, utilizado
       en el método [EventSslContext::__construct()](#eventsslcontext.construct).
       Representa la contraseña del certificado.







      **[EventSslContext::OPT_CA_FILE](#eventsslcontext.constants.opt-ca-file)**



       Clave para un elemento del array que contiene las opciones, utilizado
       en el método [EventSslContext::__construct()](#eventsslcontext.construct).
       Representa la ruta hacia el fichero de la autoridad del certificado.







      **[EventSslContext::OPT_CA_PATH](#eventsslcontext.constants.opt-ca-path)**



       Clave para un elemento del array que contiene las opciones, utilizado
       en el método [EventSslContext::__construct()](#eventsslcontext.construct).
       Representa la ruta en la que se debe buscar el fichero
       de la autoridad del certificado.







      **[EventSslContext::OPT_ALLOW_SELF_SIGNED](#eventsslcontext.constants.opt-allow-self-signed)**



       Clave para un elemento del array que contiene las opciones, utilizado
       en el método [EventSslContext::__construct()](#eventsslcontext.construct).
       Representa una opción que permite los certificados autofirmados.







      **[EventSslContext::OPT_VERIFY_PEER](#eventsslcontext.constants.opt-verify-peer)**



       Clave para un elemento del array que contiene las opciones, utilizado
       en el método [EventSslContext::__construct()](#eventsslcontext.construct).
       Representa una opción que indica a Event que verifique los pares.







      **[EventSslContext::OPT_VERIFY_DEPTH](#eventsslcontext.constants.opt-verify-depth)**



       Clave para un elemento del array que contiene las opciones, utilizado
       en el método [EventSslContext::__construct()](#eventsslcontext.construct).
       Representa la profundidad máxima de la verificación de la cadena
       del certificado que debe ser permitida para el contexto SSL.







      **[EventSslContext::OPT_CIPHERS](#eventsslcontext.constants.opt-ciphers)**



       Clave para un elemento del array que contiene las opciones, utilizado
       en el método [EventSslContext::__construct()](#eventsslcontext.construct).
       Representa la lista de cifrados para el contexto SSL.





# EventSslContext::\_\_construct

(PECL event &gt;= 1.2.6-beta)

EventSslContext::\_\_construct — Construye un contexto OpenSSL para usar con las clases Event

### Descripción

public
**EventSslContext::\_\_construct**(

    [string](#language.types.string) $method

,

    [string](#language.types.string) $options

)

Crea un contexto SSL que contiene el puntero hacia SSL_CTX
(ver el manual del sistema).

### Parámetros

     method



      Una de las constantes
      [EventSslContext::*_METHOD](#eventsslcontext.constants).







     options



      Un array asociativo de opciones de contexto SSL.
      Una de las constantes
      [EventSslContext::OPT_*](#eventsslcontext.constants).


### Ejemplos

**Ejemplo #1
Ejemplo con EventSslContext::\_\_construct()**

&lt;?php
$ctx = new EventSslContext(EventSslContext::SSLv3_SERVER_METHOD, array(
EventSslContext::OPT_LOCAL_CERT =&gt; $local_cert,
EventSslContext::OPT_LOCAL_PK =&gt; $local_pk,
EventSslContext::OPT_PASSPHRASE =&gt; "echo server",
EventSslContext::OPT_VERIFY_PEER =&gt; true,
EventSslContext::OPT_ALLOW_SELF_SIGNED =&gt; false,
));
?&gt;

## Tabla de contenidos

- [EventSslContext::\_\_construct](#eventsslcontext.construct) — Construye un contexto OpenSSL para usar con las clases Event

# La clase EventUtil

(PECL event &gt;= 1.5.0)

## Introducción

    La clase **EventUtil** es un esqueleto con métodos y constantes adicionales.

## Sinopsis de la Clase

     ****




      final
      class **EventUtil**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [AF_INET](#eventutil.constants.af-inet) = 2;

    const
     [int](#language.types.integer)
      [AF_INET6](#eventutil.constants.af-inet6) = 10;

    const
     [int](#language.types.integer)
      [AF_UNSPEC](#eventutil.constants.af-unspec) = 0;

    const
     [int](#language.types.integer)
      [LIBEVENT_VERSION_NUMBER](#eventutil.constants.libevent-version-number) = 33559808;

    const
     [int](#language.types.integer)
      [SO_DEBUG](#eventutil.constants.so-debug) = 1;

    const
     [int](#language.types.integer)
      [SO_REUSEADDR](#eventutil.constants.so-reuseaddr) = 2;

    const
     [int](#language.types.integer)
      [SO_KEEPALIVE](#eventutil.constants.so-keepalive) = 9;

    const
     [int](#language.types.integer)
      [SO_DONTROUTE](#eventutil.constants.so-dontroute) = 5;

    const
     [int](#language.types.integer)
      [SO_LINGER](#eventutil.constants.so-linger) = 13;

    const
     [int](#language.types.integer)
      [SO_BROADCAST](#eventutil.constants.so-broadcast) = 6;

    const
     [int](#language.types.integer)
      [SO_OOBINLINE](#eventutil.constants.so-oobinline) = 10;

    const
     [int](#language.types.integer)
      [SO_SNDBUF](#eventutil.constants.so-sndbuf) = 7;

    const
     [int](#language.types.integer)
      [SO_RCVBUF](#eventutil.constants.so-rcvbuf) = 8;

    const
     [int](#language.types.integer)
      [SO_SNDLOWAT](#eventutil.constants.so-sndlowat) = 19;

    const
     [int](#language.types.integer)
      [SO_RCVLOWAT](#eventutil.constants.so-rcvlowat) = 18;

    const
     [int](#language.types.integer)
      [SO_SNDTIMEO](#eventutil.constants.so-sndtimeo) = 21;

    const
     [int](#language.types.integer)
      [SO_RCVTIMEO](#eventutil.constants.so-rcvtimeo) = 20;

    const
     [int](#language.types.integer)
      [SO_TYPE](#eventutil.constants.so-type) = 3;

    const
     [int](#language.types.integer)
      [SO_ERROR](#eventutil.constants.so-error) = 4;

    const
     [int](#language.types.integer)
      [SOL_SOCKET](#eventutil.constants.sol-socket) = 1;

    const
     [int](#language.types.integer)
      [SOL_TCP](#eventutil.constants.sol-tcp) = 6;

    const
     [int](#language.types.integer)
      [SOL_UDP](#eventutil.constants.sol-udp) = 17;

    const
     [int](#language.types.integer)
      [IPPROTO_IP](#eventutil.constants.ipproto-ip) = 0;

    const
     [int](#language.types.integer)
      [IPPROTO_IPV6](#eventutil.constants.ipproto-ipv6) = 41;

    /* Métodos */

abstract
public
[\_\_construct](#eventutil.construct)()
public
static
[getLastSocketErrno](#eventutil.getlastsocketerrno)(

    [mixed](#language.types.mixed) $socket
     = **[null](#constant.null)**

): [int](#language.types.integer)
public
static
[getLastSocketError](#eventutil.getlastsocketerror)(

    [mixed](#language.types.mixed) $socket
    = ?): [string](#language.types.string)

public
static
[getSocketFd](#eventutil.getsocketfd)(

    [mixed](#language.types.mixed) $socket

): [int](#language.types.integer)
public
static
[getSocketName](#eventutil.getsocketname)(

    [mixed](#language.types.mixed) $socket

,

    [string](#language.types.string) &amp;$address

,

    [mixed](#language.types.mixed) &amp;$port
    = ?): [bool](#language.types.boolean)

public
static
[setSocketOption](#eventutil.setsocketoption)(

    

    [mixed](#language.types.mixed) $socket

,

    

    [int](#language.types.integer) $level

,

    

    [int](#language.types.integer) $optname

,

    

    [mixed](#language.types.mixed) $optval

): [bool](#language.types.boolean)
public
static
[sslRandPoll](#eventutil.sslrandpoll)(): [void](language.types.void.html)

}

## Constantes predefinidas

      **[EventUtil::AF_INET](#eventutil.constants.af-inet)**



       Familia de direcciones IPv4







      **[EventUtil::AF_INET6](#eventutil.constants.af-inet6)**



       Familia de direcciones IPv6







      **[EventUtil::AF_UNSPEC](#eventutil.constants.af-unspec)**



       Familia de direcciones IP no especificada







      **[EventUtil::SO_DEBUG](#eventutil.constants.so-debug)**



       Opción del socket. Activa la depuración del socket. Solo permitido para
       los procesos con la capacidad CAP_NET_ADMIN
       o un ID de usuario efectivo de 0.
       (Añadido en event-1.6.0.)







      **[EventUtil::SO_REUSEADDR](#eventutil.constants.so-reuseaddr)**



       Opción del socket. Indica que las reglas utilizadas en la
       validación de direcciones proporcionadas en una llamada a
       bind(2) deben permitir la reutilización
       de direcciones locales. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::SO_KEEPALIVE](#eventutil.constants.so-keepalive)**



       Opción del socket. Activa el envío de mensajes keep-alive en los
       sockets de conexión. Espera un entero. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::SO_DONTROUTE](#eventutil.constants.so-dontroute)**



       Opción del socket. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::SO_LINGER](#eventutil.constants.so-linger)**



       Opción del socket. Cuando está activo, una llamada a
       close(2) o a shutdown(2)
       no devolverá hasta que todos los mensajes de la cola del socket hayan sido enviados, o hasta que se alcance el tiempo máximo de espera del linger. De lo contrario, las llamadas devolverán inmediatamente
       y el cierre se realizará en segundo plano. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::SO_BROADCAST](#eventutil.constants.so-broadcast)**



       Opción del socket. Indica si la transmisión de mensajes
       de broadcast está soportada. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::SO_OOBINLINE](#eventutil.constants.so-oobinline)**



       Opción del socket. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::SO_SNDBUF](#eventutil.constants.so-sndbuf)**



       Opción del socket. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::SO_RCVBUF](#eventutil.constants.so-rcvbuf)**



       Opción del socket. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::SO_SNDLOWAT](#eventutil.constants.so-sndlowat)**



       Opción del socket. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::SO_RCVLOWAT](#eventutil.constants.so-rcvlowat)**



       Opción del socket. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::SO_SNDTIMEO](#eventutil.constants.so-sndtimeo)**



       Opción del socket. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::SO_RCVTIMEO](#eventutil.constants.so-rcvtimeo)**



       Opción del socket. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::SO_TYPE](#eventutil.constants.so-type)**



       Opción del socket. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::SO_ERROR](#eventutil.constants.so-error)**



       Opción del socket. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::SOL_SOCKET](#eventutil.constants.sol-socket)**



       Opción del socket. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::SOL_TCP](#eventutil.constants.sol-tcp)**



       Opción del socket. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::SOL_UDP](#eventutil.constants.sol-udp)**



       Opción del socket. Ver la página del manual sobre
       socket(7). (Añadido en event-1.6.0.)







      **[EventUtil::IPPROTO_IP](#eventutil.constants.ipproto-ip)**



       Ver la página del manual sobre socket(7).
       (Añadido en event-1.6.0.)







      **[EventUtil::IPPROTO_IPV6](#eventutil.constants.ipproto-ipv6)**



       Ver la página del manual sobre socket(7).
       (Añadido en event-1.6.0.)







      **[EventUtil::LIBEVENT_VERSION_NUMBER](#eventutil.constants.libevent-version-number)**



       Número de versión de Libevent en el momento en que la extensión Event
       fue compilada con la biblioteca.





# EventUtil::\_\_construct

(PECL event &gt;= 1.2.6-beta)

EventUtil::\_\_construct — El constructor

### Descripción

abstract
public
**EventUtil::\_\_construct**()

[EventUtil](#class.eventutil) es un esqueleto.
Asimismo, el constructor es abstracto, y por lo tanto es imposible
crear objetos basados en esta clase.

### Parámetros

Esta función no contiene ningún parámetro.

# EventUtil::getLastSocketErrno

(PECL event &gt;= 1.2.6-beta)

EventUtil::getLastSocketErrno — Devuelve el número de error más reciente ocurrido en el socket

### Descripción

public
static
**EventUtil::getLastSocketErrno**(

    [mixed](#language.types.mixed) $socket
     = **[null](#constant.null)**

): [int](#language.types.integer)

Devuelve el número de error más reciente ocurrido en el socket
(errno).

### Parámetros

     socket



      Recurso de socket, flujo o descriptor de fichero de socket.


### Valores devueltos

Devuelve el número de error más reciente ocurrido en el socket
(errno).

### Ver también

- [EventUtil::getLastSocketError()](#eventutil.getlastsocketerror) - Devuelve el error más reciente ocurrido en el socket

# EventUtil::getLastSocketError

(PECL event &gt;= 1.2.6-beta)

EventUtil::getLastSocketError — Devuelve el error más reciente ocurrido en el socket

### Descripción

public
static
**EventUtil::getLastSocketError**(

    [mixed](#language.types.mixed) $socket
    = ?): [string](#language.types.string)

Devuelve el error más reciente ocurrido en el socket.

### Parámetros

     socket



      Recurso de socket, flujo, o descriptor de fichero de socket.


### Valores devueltos

Devuelve el error más reciente ocurrido en el socket.

### Ver también

- [EventUtil::getLastSocketErrno()](#eventutil.getlastsocketerrno) - Devuelve el número de error más reciente ocurrido en el socket

# EventUtil::getSocketFd

(PECL event &gt;= 1.7.0)

EventUtil::getSocketFd — Devuelve el descriptor de fichero de un socket o de un flujo

### Descripción

public
static
**EventUtil::getSocketFd**(

    [mixed](#language.types.mixed) $socket

): [int](#language.types.integer)

Devuelve el descriptor numérico de fichero de un socket
o de un flujo especificado por el parámetro socket,
como lo hace la extensión Event internamente
para todos los métodos que aceptan un socket o un flujo.

### Parámetros

     socket



      Socket o flujo.


### Valores devueltos

Devuelve el descriptor de fichero numérico en caso de éxito, **[false](#constant.false)** en caso contrario.
**EventUtil::getSocketFd()** devuelve **[false](#constant.false)**
en el caso de que el tipo de fichero no haya podido ser reconocido, o bien cuando
el descriptor de fichero asociado con el parámetro socket
no es válido.

# EventUtil::getSocketName

(PECL event &gt;= 1.5.0)

EventUtil::getSocketName — Recupera la dirección actual ligada al socket

### Descripción

public
static
**EventUtil::getSocketName**(

    [mixed](#language.types.mixed) $socket

,

    [string](#language.types.string) &amp;$address

,

    [mixed](#language.types.mixed) &amp;$port
    = ?): [bool](#language.types.boolean)

Recupera la dirección actual ligada al socket.

### Parámetros

     socket



      Recurso de socket, flujo, o descriptor de fichero de socket.







     address



      Parámetro de salida. Dirección IP o la ruta del dominio UNIX del socket,
      según la familia de dirección del socket.







     port



      Parámetro de salida. El puerto ligado al socket. No tiene sentido para
      los sockets de dominio UNIX.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# EventUtil::setSocketOption

(PECL event &gt;= 1.6.0)

EventUtil::setSocketOption — Define las opciones del socket

### Descripción

public
static
**EventUtil::setSocketOption**(

    

    [mixed](#language.types.mixed) $socket

,

    

    [int](#language.types.integer) $level

,

    

    [int](#language.types.integer) $optname

,

    

    [mixed](#language.types.mixed) $optval

): [bool](#language.types.boolean)

Define las opciones del socket.

### Parámetros

     socket



      Recurso de socket, flujo, o descriptor de fichero numérico asociado con el socket.







     level



      Una constante EventUtil::SOL_*. Especifica el nivel del protocolo en el cual residen las opciones. Por ejemplo, para recuperar las opciones a nivel de socket, el parámetro level debe ser establecido al valor **[EventUtil::SOL_SOCKET](#eventutil.constants.sol-socket)**. Otros niveles, como TCP, pueden ser utilizados especificando el número del protocolo de ese nivel. Los números de los protocolos pueden ser encontrados utilizando la función [getprotobyname()](#function.getprotobyname). Ver también las [constantes EventUtil](#eventutil.constants).







     optname



      Nombre de la opción (tipo). Tiene el mismo significado que el parámetro correspondiente de la función [socket_get_option()](#function.socket-get-option). Ver también las [constantes EventUtil](#eventutil.constants).







     optval



      Acepta los mismos valores que el parámetro optval de la función [socket_get_option()](#function.socket-get-option).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [socket_get_option()](#function.socket-get-option) - Lee las opciones del socket

- [socket_set_option()](#function.socket-set-option) - Modifica las opciones de socket

# EventUtil::sslRandPoll

(PECL event &gt;= 1.2.6-beta)

EventUtil::sslRandPoll — Genera la entropía a través de OpenSSL RAND_poll()

### Descripción

public
static
**EventUtil::sslRandPoll**(): [void](language.types.void.html)

Genera la entropía a través de OpenSSL RAND_poll()
(ver el manual del sistema).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [EventUtil::\_\_construct](#eventutil.construct) — El constructor
- [EventUtil::getLastSocketErrno](#eventutil.getlastsocketerrno) — Devuelve el número de error más reciente ocurrido en el socket
- [EventUtil::getLastSocketError](#eventutil.getlastsocketerror) — Devuelve el error más reciente ocurrido en el socket
- [EventUtil::getSocketFd](#eventutil.getsocketfd) — Devuelve el descriptor de fichero de un socket o de un flujo
- [EventUtil::getSocketName](#eventutil.getsocketname) — Recupera la dirección actual ligada al socket
- [EventUtil::setSocketOption](#eventutil.setsocketoption) — Define las opciones del socket
- [EventUtil::sslRandPoll](#eventutil.sslrandpoll) — Genera la entropía a través de OpenSSL RAND_poll()

# La clase EventException

(No version information available, might only be in Git)

## Introducción

    Una **EventException** es lanzada cuando los métodos de extensión de Event
    encuentran una entrada de usuario inválida o identifican un error irrecuperable. Esta excepción
    sirve como señal para los desarrolladores para manejar situaciones excepcionales de manera elegante.

## Sinopsis de la Clase

     class **EventException**



     extends
      [RuntimeException](#class.runtimeexception)
     {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#error.props.message) = "";

private
[string](#language.types.string)
[$string](#error.props.string) = "";
protected
[int](#language.types.integer)
[$code](#error.props.code);
protected
[string](#language.types.string)
[$file](#error.props.file) = "";
protected
[int](#language.types.integer)
[$line](#error.props.line);
private
[array](#language.types.array)
[$trace](#error.props.trace) = [];
private
?[Throwable](#class.throwable)
[$previous](#error.props.previous) = null;

    /* Métodos heredados */

public [Error::\_\_construct](#error.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Error::getMessage](#error.getmessage)(): [string](#language.types.string)

final public [Error::getPrevious](#error.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Error::getCode](#error.getcode)(): [int](#language.types.integer)
final public [Error::getFile](#error.getfile)(): [string](#language.types.string)
final public [Error::getLine](#error.getline)(): [int](#language.types.integer)
final public [Error::getTrace](#error.gettrace)(): [array](#language.types.array)
final public [Error::getTraceAsString](#error.gettraceasstring)(): [string](#language.types.string)
public [Error::\_\_toString](#error.tostring)(): [string](#language.types.string)
private [Error::\_\_clone](#error.clone)(): [void](language.types.void.html)

}

- [Introducción](#intro.event)
- [Instalación/Configuración](#event.setup)<li>[Requerimientos](#event.requirements)
- [Instalación](#event.installation)
  </li>- [Ejemplos](#event.examples)
- [Los flags de eventos](#event.flags)
- [Acerca de la persistencia de eventos](#event.persistence)
- [Funciones de retrollamada de eventos](#event.callbacks)
- [Construcción de un evento de tipo señal](#event.constructing.signal.events)
- [Event](#class.event) — La clase Event<li>[Event::add](#event.add) — Pone un evento en espera
- [Event::addSignal](#event.addsignal) — Alias de Event::add
- [Event::addTimer](#event.addtimer) — Alias de Event::add
- [Event::\_\_construct](#event.construct) — Construye un objeto Event
- [Event::del](#event.del) — Elimina un evento de la lista de eventos monitoreados
- [Event::delSignal](#event.delsignal) — Alias de Event::del
- [Event::delTimer](#event.deltimer) — Alias de Event::del
- [Event::free](#event.free) — Elimina un evento de la lista de eventos vigilados y libera los recursos asociados
- [Event::getSupportedMethods](#event.getsupportedmethods) — Devuelve un array que contiene los nombres de los métodos soportados
  por esta versión de Libevent
- [Event::pending](#event.pending) — Detecta si el evento está pendiente o programado
- [Event::set](#event.set) — Reconfigurar el evento
- [Event::setPriority](#event.setpriority) — Define la prioridad del evento
- [Event::setTimer](#event.settimer) — Reconfigurar un evento timer
- [Event::signal](#event.signal) — Construye un objeto de evento de señal
- [Event::timer](#event.timer) — Construye un objeto de evento timer
  </li>- [EventBase](#class.eventbase) — La clase EventBase<li>[EventBase::__construct](#eventbase.construct) — Construye un objeto EventBase
- [EventBase::dispatch](#eventbase.dispatch) — Despacha eventos pendientes
- [EventBase::exit](#eventbase.exit) — Detiene el envío de los eventos
- [EventBase::free](#eventbase.free) — Libera los recursos asignados para el evento base
- [EventBase::getFeatures](#eventbase.getfeatures) — Devuelve una máscara de las funcionalidades soportadas
- [EventBase::getMethod](#eventbase.getmethod) — Devuelve el método de evento utilizado
- [EventBase::getTimeOfDayCached](#eventbase.gettimeofdaycached) — Devuelve el tiempo del evento base actual
- [EventBase::gotExit](#eventbase.gotexit) — Verifica si se ha solicitado que el bucle de eventos salga
- [EventBase::gotStop](#eventbase.gotstop) — Verifica si se ha solicitado que la iteración de eventos se detenga
- [EventBase::loop](#eventbase.loop) — Distribuye los eventos en espera
- [EventBase::priorityInit](#eventbase.priorityinit) — Define el número de prioridades por evento base
- [EventBase::reInit](#eventbase.reinit) — Reinicializa el evento base (después de un 'fork')
- [EventBase::stop](#eventbase.stop) — Solicita a event_base que detenga la emisión de eventos
  </li>- [EventBuffer](#class.eventbuffer) — La clase EventBuffer<li>[EventBuffer::add](#eventbuffer.add) — Añade datos al final de un buffer de eventos
- [EventBuffer::addBuffer](#eventbuffer.addbuffer) — Desplaza todos los datos del búfer proporcionado al EventBuffer actual
- [EventBuffer::appendFrom](#eventbuffer.appendfrom) — Mueve el número de bytes especificados desde un buffer fuente, al
  final del buffer actual
- [EventBuffer::\_\_construct](#eventbuffer.construct) — Construye el objeto EventBuffer
- [EventBuffer::copyout](#eventbuffer.copyout) — Copia el número de bytes especificado desde el inicio del búfer
- [EventBuffer::drain](#eventbuffer.drain) — Elimina un número especificado de bytes desde el inicio del búfer
  sin copiar los datos
- [EventBuffer::enableLocking](#eventbuffer.enablelocking) — Descripción
- [EventBuffer::expand](#eventbuffer.expand) — Reserva espacio en el buffer
- [EventBuffer::freeze](#eventbuffer.freeze) — Evita que las llamadas puedan modificar un buffer de eventos
- [EventBuffer::lock](#eventbuffer.lock) — Bloquea un buffer
- [EventBuffer::prepend](#eventbuffer.prepend) — Añade datos al principio del buffer
- [EventBuffer::prependBuffer](#eventbuffer.prependbuffer) — Desplaza todos los datos desde el buffer fuente hacia el inicio
  del buffer actual
- [EventBuffer::pullup](#eventbuffer.pullup) — Serializa los datos del buffer y devuelve el contenido del
  buffer en forma de string
- [EventBuffer::read](#eventbuffer.read) — Lee los datos de un evbuffer y vacía los bytes leídos
- [EventBuffer::readFrom](#eventbuffer.readfrom) — Lee datos desde un fichero y los coloca al final del búfer
- [EventBuffer::readLine](#eventbuffer.readline) — Extrae una línea desde el inicio del búfer
- [EventBuffer::search](#eventbuffer.search) — Busca en el búfer una ocurrencia de un string
- [EventBuffer::searchEol](#eventbuffer.searcheol) — Busca en el búfer una ocurrencia de fin de línea
- [EventBuffer::substr](#eventbuffer.substr) — Sustrae una porción de los datos del búfer
- [EventBuffer::unfreeze](#eventbuffer.unfreeze) — Re-activa las llamadas que permiten modificar un buffer de eventos
- [EventBuffer::unlock](#eventbuffer.unlock) — Libera un bloqueo adquirido con EventBuffer::lock
- [EventBuffer::write](#eventbuffer.write) — Escribe el contenido del buffer en un fichero o en un socket
  </li>- [EventBufferEvent](#class.eventbufferevent) — La clase EventBufferEvent<li>[EventBufferEvent::close](#eventbufferevent.close) — Cierra el descriptor de fichero asociado con el buffer de eventos actual
- [EventBufferEvent::connect](#eventbufferevent.connect) — Conecta el descriptor de fichero del búfer de eventos a la dirección proporcionada,
  o al socket UNIX
- [EventBufferEvent::connectHost](#eventbufferevent.connecthost) — Conexión a un host
- [EventBufferEvent::\_\_construct](#eventbufferevent.construct) — Construye un objeto EventBufferEvent
- [EventBufferEvent::createPair](#eventbufferevent.createpair) — Crea dos eventos de buffer conectados entre sí
- [EventBufferEvent::disable](#eventbufferevent.disable) — Desactiva los eventos de lectura, escritura o ambos en un evento de búfer
- [EventBufferEvent::enable](#eventbufferevent.enable) — Activa los eventos de lectura, escritura, o ambos, en un evento de buffer
- [EventBufferEvent::free](#eventbufferevent.free) — Libera un evento de búfer
- [EventBufferEvent::getDnsErrorString](#eventbufferevent.getdnserrorstring) — Devuelve un string que describe el último error DNS
- [EventBufferEvent::getEnabled](#eventbufferevent.getenabled) — Devuelve una máscara de eventos actualmente activos en el búfer de eventos
- [EventBufferEvent::getInput](#eventbufferevent.getinput) — Devuelve el búfer de entrada asociado con el búfer de eventos actual
- [EventBufferEvent::getOutput](#eventbufferevent.getoutput) — Devuelve el búfer de salida asociado con el búfer de evento actual
- [EventBufferEvent::read](#eventbufferevent.read) — Lee los datos del búfer
- [EventBufferEvent::readBuffer](#eventbufferevent.readbuffer) — Vacía el contenido entero del búfer de entrada y lo coloca en el búfer
- [EventBufferEvent::setCallbacks](#eventbufferevent.setcallbacks) — Asigna las funciones de retrollamada para la lectura, la escritura y los estados de eventos
- [EventBufferEvent::setPriority](#eventbufferevent.setpriority) — Asigna una prioridad para un búfer de eventos
- [EventBufferEvent::setTimeouts](#eventbufferevent.settimeouts) — Define el modo de lectura y escritura para el tiempo de espera máximo de un búfer de eventos
- [EventBufferEvent::setWatermark](#eventbufferevent.setwatermark) — Activa la lectura, y/o la escritura de las marcas de agua
- [EventBufferEvent::sslError](#eventbufferevent.sslerror) — Devuelve el error OpenSSL más reciente reportado por el buffer de eventos
- [EventBufferEvent::sslFilter](#eventbufferevent.sslfilter) — Crea un nuevo búfer de evento SSL, cuyos datos
  serán enviados a través de otro búfer de evento
- [EventBufferEvent::sslGetCipherInfo](#eventbufferevent.sslgetcipherinfo) — Devuelve una descripción textual de un cipher
- [EventBufferEvent::sslGetCipherName](#eventbufferevent.sslgetciphername) — Devuelve el nombre del cipher actual para la conexión SSL
- [EventBufferEvent::sslGetCipherVersion](#eventbufferevent.sslgetcipherversion) — Devuelve la versión del cipher utilizado para la conexión SSL actual
- [EventBufferEvent::sslGetProtocol](#eventbufferevent.sslgetprotocol) — Devuelve el nombre del protocolo utilizado para la conexión SSL actual
- [EventBufferEvent::sslRenegotiate](#eventbufferevent.sslrenegotiate) — Solicita al búfer de eventos iniciar una renegociación SSL
- [EventBufferEvent::sslSocket](#eventbufferevent.sslsocket) — Crea un nuevo buffer SSL cuyos datos serán enviados a través de un socket SSL
- [EventBufferEvent::write](#eventbufferevent.write) — Añade datos a un buffer de evento de salida
- [EventBufferEvent::writeBuffer](#eventbufferevent.writebuffer) — Añade el contenido entero de un buffer en un buffer de evento de salida
  </li>- [Acerca de las funciones de retrollamada del buffer de eventos](#eventbufferevent.about.callbacks)
- [EventConfig](#class.eventconfig) — La clase EventConfig<li>[EventConfig::avoidMethod](#eventconfig.avoidmethod) — Solicita a libevent que ignore un método de evento específico
- [EventConfig::\_\_construct](#eventconfig.construct) — Construye un objeto EventConfig
- [EventConfig::requireFeatures](#eventconfig.requirefeatures) — Ingresa una funcionalidad de método de evento solicitada por la aplicación
- [EventConfig::setFlags](#eventconfig.setflags) — Define uno o varios flags para configurar la inicialización eventual de EventBase
- [EventConfig::setMaxDispatchInterval](#eventconfig.setmaxdispatchinterval) — Evita la inversión de prioridades
  </li>- [EventDnsBase](#class.eventdnsbase) — La clase EventDnsBase<li>[EventDnsBase::addNameserverIp](#eventdnsbase.addnameserverip) — Añade un servidor de nombres a la base DNS
- [EventDnsBase::addSearch](#eventdnsbase.addsearch) — Añade un dominio a la lista de dominios utilizados para la búsqueda
- [EventDnsBase::clearSearch](#eventdnsbase.clearsearch) — Elimina todos los sufijos de búsqueda comunes
- [EventDnsBase::\_\_construct](#eventdnsbase.construct) — Construye un objeto EventDnsBase
- [EventDnsBase::countNameservers](#eventdnsbase.countnameservers) — Recupera el número de servidores de nombres configurados
- [EventDnsBase::loadHosts](#eventdnsbase.loadhosts) — Carga un fichero hosts (en el mismo formato que /etc/hosts)
- [EventDnsBase::parseResolvConf](#eventdnsbase.parseresolvconf) — Analiza el fichero resolv.conf
- [EventDnsBase::setOption](#eventdnsbase.setoption) — Define el valor de una opción de configuración
- [EventDnsBase::setSearchNdots](#eventdnsbase.setsearchndots) — Define el parámetro 'ndots' para las búsquedas
  </li>- [EventHttp](#class.eventhttp) — La clase EventHttp<li>[EventHttp::accept](#eventhttp.accept) — Permite a un servidor HTTP aceptar las conexiones en el
     socket o recurso especificado
- [EventHttp::addServerAlias](#eventhttp.addserveralias) — Añade un alias del servidor para el objeto servidor HTTP
- [EventHttp::bind](#eventhttp.bind) — Liga un servidor HTTP a una dirección y un puerto especificados
- [EventHttp::\_\_construct](#eventhttp.construct) — Construye un objeto EventHttp (el servidor HTTP)
- [EventHttp::removeServerAlias](#eventhttp.removeserveralias) — Elimina un alias en el servidor
- [EventHttp::setAllowedMethods](#eventhttp.setallowedmethods) — Define los métodos HTTP soportados y aceptados en las peticiones
  en este servidor, y pasados a las funciones de retrollamada de los usuarios
- [EventHttp::setCallback](#eventhttp.setcallback) — Define una retrollamada para una URI específica
- [EventHttp::setDefaultCallback](#eventhttp.setdefaultcallback) — Define la función de retrollamada por defecto para manejar las peticiones que no son capturadas por
  funciones de retrollamada específicas
- [EventHttp::setMaxBodySize](#eventhttp.setmaxbodysize) — Define la talla máxima del cuerpo de la petición
- [EventHttp::setMaxHeadersSize](#eventhttp.setmaxheaderssize) — Define el tamaño máximo de las cabeceras HTTP
- [EventHttp::setTimeout](#eventhttp.settimeout) — Define el tiempo máximo de espera para una petición HTTP
  </li>- [EventHttpConnection](#class.eventhttpconnection) — La clase EventHttpConnection<li>[EventHttpConnection::__construct](#eventhttpconnection.construct) — Construye un objeto EventHttpConnection
- [EventHttpConnection::getBase](#eventhttpconnection.getbase) — Devuelve la base de eventos asociada con la conexión
- [EventHttpConnection::getPeer](#eventhttpconnection.getpeer) — Recupera la dirección y el puerto remoto asociados con la conexión
- [EventHttpConnection::makeRequest](#eventhttpconnection.makerequest) — Realiza una petición HTTP en la conexión especificada
- [EventHttpConnection::setCloseCallback](#eventhttpconnection.setclosecallback) — Define una función de retrollamada al cerrar la conexión
- [EventHttpConnection::setLocalAddress](#eventhttpconnection.setlocaladdress) — Define la dirección IP desde la cual se realizan las conexiones HTTP
- [EventHttpConnection::setLocalPort](#eventhttpconnection.setlocalport) — Define el puerto local desde el cual se realizan las conexiones
- [EventHttpConnection::setMaxBodySize](#eventhttpconnection.setmaxbodysize) — Define el tamaño máximo del cuerpo para la conexión
- [EventHttpConnection::setMaxHeadersSize](#eventhttpconnection.setmaxheaderssize) — Define el tamaño máximo de las cabeceras
- [EventHttpConnection::setRetries](#eventhttpconnection.setretries) — Define el número de intentos para la conexión
- [EventHttpConnection::setTimeout](#eventhttpconnection.settimeout) — Define el tiempo límite máximo para la conexión
  </li>- [EventHttpRequest](#class.eventhttprequest) — La clase EventHttpRequest<li>[EventHttpRequest::addHeader](#eventhttprequest.addheader) — Añade un encabezado HTTP a los encabezados de la petición
- [EventHttpRequest::cancel](#eventhttprequest.cancel) — Cancela una petición HTTP pendiente
- [EventHttpRequest::clearHeaders](#eventhttprequest.clearheaders) — Elimina todos los encabezados de la lista de encabezados de la petición
- [EventHttpRequest::closeConnection](#eventhttprequest.closeconnection) — Cierra las conexiones HTTP asociadas
- [EventHttpRequest::\_\_construct](#eventhttprequest.construct) — Construye un objeto EventHttpRequest
- [EventHttpRequest::findHeader](#eventhttprequest.findheader) — Busca el valor de un encabezado
- [EventHttpRequest::free](#eventhttprequest.free) — Libera el objeto y elimina los eventos asociados
- [EventHttpRequest::getBufferEvent](#eventhttprequest.getbufferevent) — Devuelve el objeto EventBufferEvent
- [EventHttpRequest::getCommand](#eventhttprequest.getcommand) — Devuelve el comando de la petición (método)
- [EventHttpRequest::getConnection](#eventhttprequest.getconnection) — Devuelve un objeto EventHttpConnection
- [EventHttpRequest::getHost](#eventhttprequest.gethost) — Devuelve el host solicitado
- [EventHttpRequest::getInputBuffer](#eventhttprequest.getinputbuffer) — Devuelve el buffer de entrada
- [EventHttpRequest::getInputHeaders](#eventhttprequest.getinputheaders) — Devuelve el array asociativo que contiene los encabezados de entrada
- [EventHttpRequest::getOutputBuffer](#eventhttprequest.getoutputbuffer) — Devuelve el buffer de salida de la petición
- [EventHttpRequest::getOutputHeaders](#eventhttprequest.getoutputheaders) — Devuelve un array asociativo que contiene los encabezados de salida
- [EventHttpRequest::getResponseCode](#eventhttprequest.getresponsecode) — Devuelve el código de la respuesta
- [EventHttpRequest::getUri](#eventhttprequest.geturi) — Devuelve el URI de la petición
- [EventHttpRequest::removeHeader](#eventhttprequest.removeheader) — Elimina un encabezado HTTP de los encabezados de la petición
- [EventHttpRequest::sendError](#eventhttprequest.senderror) — Envía un mensaje de error HTML al cliente
- [EventHttpRequest::sendReply](#eventhttprequest.sendreply) — Envía una respuesta HTML al cliente
- [EventHttpRequest::sendReplyChunk](#eventhttprequest.sendreplychunk) — Envía otro bloque de datos como parte de un bloque de respuesta entrante
- [EventHttpRequest::sendReplyEnd](#eventhttprequest.sendreplyend) — Completa un bloque de respuesta, liberando la petición
- [EventHttpRequest::sendReplyStart](#eventhttprequest.sendreplystart) — Inicializa un bloque de respuesta
  </li>- [EventListener](#class.eventlistener) — La clase EventListener<li>[EventListener::__construct](#eventlistener.construct) — Crea un nuevo oyente de conexión asociado con la base de eventos
- [EventListener::disable](#eventlistener.disable) — Desactiva un objeto de escucha de eventos de conexión
- [EventListener::enable](#eventlistener.enable) — Activa un objeto de escucha de eventos de conexión
- [EventListener::getBase](#eventlistener.getbase) — Devuelve la base de evento asociada con el escuchador de eventos
- [EventListener::getSocketName](#eventlistener.getsocketname) — Recupera la dirección actual a la que está ligado el socket de escucha
- [EventListener::setCallback](#eventlistener.setcallback) — El propósito de setCallback
- [EventListener::setErrorCallback](#eventlistener.seterrorcallback) — Define la función de retrollamada en el evento de error
  </li>- [EventSslContext](#class.eventsslcontext) — La clase EventSslContext<li>[EventSslContext::__construct](#eventsslcontext.construct) — Construye un contexto OpenSSL para usar con las clases Event
  </li>- [EventUtil](#class.eventutil) — La clase EventUtil<li>[EventUtil::__construct](#eventutil.construct) — El constructor
- [EventUtil::getLastSocketErrno](#eventutil.getlastsocketerrno) — Devuelve el número de error más reciente ocurrido en el socket
- [EventUtil::getLastSocketError](#eventutil.getlastsocketerror) — Devuelve el error más reciente ocurrido en el socket
- [EventUtil::getSocketFd](#eventutil.getsocketfd) — Devuelve el descriptor de fichero de un socket o de un flujo
- [EventUtil::getSocketName](#eventutil.getsocketname) — Recupera la dirección actual ligada al socket
- [EventUtil::setSocketOption](#eventutil.setsocketoption) — Define las opciones del socket
- [EventUtil::sslRandPoll](#eventutil.sslrandpoll) — Genera la entropía a través de OpenSSL RAND_poll()
  </li>- [EventException](#class.eventexception) — La clase EventException
