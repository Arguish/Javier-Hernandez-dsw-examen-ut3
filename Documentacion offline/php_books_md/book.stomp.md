# Cliente Stomp

# Introducción

Esta extensión permite a aplicaciones php comunicarse con cualquier Message Brokers compatible con el protocolo STOMP,
a través de sencillas interfaces procedurales orientadas a objetos.
[» Stomp official site](https://stomp.github.io/)

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#stomp.requirements)
- [Instalación](#stomp.installation)
- [Configuración en tiempo de ejecución](#stomp.configuration)
- [Tipos de recursos](#stomp.resources)

    ## Requerimientos

    El paquete [» OpenSSL](http://www.openssl.org/) &gt;= 0.9.6 y la extensión [openssl](#book.openssl) pueden ser también requeridos para utilizar stomp a través de SSL.

    ## Instalación

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/stomp](https://pecl.php.net/package/stomp)

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración Stomp**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [stomp.default_broker](#ini.stomp.default-broker)
      tcp://localhost:61613
      **[INI_ALL](#constant.ini-all)**




      [stomp.default_connection_timeout_sec](#ini.stomp.default-connection-timeout-sec)
      2
      **[INI_ALL](#constant.ini-all)**




      [stomp.default_connection_timeout_usec](#ini.stomp.default-connection-timeout-usec)
      0
      **[INI_ALL](#constant.ini-all)**





      [stomp.default_read_timeout_sec](#ini.stomp.default-read-timeout-sec)
      2
      **[INI_ALL](#constant.ini-all)**




      [stomp.default_read_timeout_usec](#ini.stomp.default-read-timeout-usec)
      0
      **[INI_ALL](#constant.ini-all)**



Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     stomp.default_broker
     [string](#language.types.string)



      La URI broker por defecto a utilizar cuando conectemos a el message broker si otra URI no es especificada.







     stomp.default_connection_timeout_sec
     [int](#language.types.integer)



      Los segundos parte del tiempo de espera de la solicitud de conexión por defecto.







     stomp.default_connection_timeout_usec
     [int](#language.types.integer)



      Los microsegundos parte del tiempo de espera de la solicitud de conexión por defecto.







     stomp.default_read_timeout_sec
     [int](#language.types.integer)



      Los segundos parte del tiempo de espera de lectura por defecto.







     stomp.default_read_timeout_usec
     [int](#language.types.integer)



      Los microsegundos parte del tiempo de espera de lectura por defecto.


## Tipos de recursos

    Sólo hay un tipo de recurso utilizado en la extensión stomp - este es
    el identificador de enlace para una conexión stomp.

# Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php

$queue  = '/queue/foo';
$msg = 'bar';

/_ conexión _/
try {
$stomp = new Stomp('tcp://localhost:61613');
} catch(StompException $e) {
die('Connection failed: ' . $e-&gt;getMessage());
}

/_ Enviar un mensaje a la cola 'foo' _/
$stomp-&gt;send($queue, $msg);

/_ suscribirse a mensajes de la cola 'foo' _/
$stomp-&gt;subscribe($queue);

/_ leer una trama (frame) _/
$frame = $stomp-&gt;readFrame();

if ($frame-&gt;body === $msg) {
    var_dump($frame);

    /* reconocer que la trama (frame) fue recibida */
    $stomp-&gt;ack($frame);

}

/_ cerrar conexión _/
unset($stomp);

?&gt;

    Resultado del ejemplo anterior es similar a:

object(StompFrame)#2 (3) {
["command"]=&gt;
string(7) "MESSAGE"
["headers"]=&gt;
array(5) {
["message-id"]=&gt;
string(41) "ID:php.net-55293-1257226743606-4:2:-1:1:1"
["destination"]=&gt;
string(10) "/queue/foo"
["timestamp"]=&gt;
string(13) "1257226805828"
["expires"]=&gt;
string(1) "0"
["priority"]=&gt;
string(1) "0"
}
["body"]=&gt;
string(3) "bar"
}

**Ejemplo #2 Estilo procedimental**

&lt;?php

$queue  = '/queue/foo';
$msg = 'bar';

/_ conexión _/
$link = stomp_connect('ssl://localhost:61612');

/_ comprobar la conexión _/
if (!$link) {
die('Connection failed: ' . stomp_connect_error());
}

/_ iniciar una transacción _/
stomp_begin($link, 't1');

/_ Enviar un mensaje a la cola 'foo' _/
stomp_send($link, $queue, $msg, array('transaction' =&gt; 't1'));

/_ confirmar una transacción _/
stomp_commit($link, 't1');

/_ suscribirse a mensajes de la cola 'foo' _/
stomp_subscribe($link, $queue);

/_ leer una trama (frame) _/
$frame = stomp_read_frame($link);

if ($frame['body'] === $msg) {
    var_dump($frame);

    /* reconocer que la trama fue recibida */
    stomp_ack($link, $frame['headers']['message-id']);

}

/_ cerrar conexión _/
stomp_close($link);

?&gt;

    Resultado del ejemplo anterior es similar a:

array(3) {
["command"]=&gt;
string(7) "MESSAGE"
["body"]=&gt;
string(3) "bar"
["headers"]=&gt;
array(6) {
["transaction"]=&gt;
string(2) "t1"
["message-id"]=&gt;
string(41) "ID:php.net-55293-1257226743606-4:3:-1:1:1"
["destination"]=&gt;
string(10) "/queue/foo"
["timestamp"]=&gt;
string(13) "1257227037059"
["expires"]=&gt;
string(1) "0"
["priority"]=&gt;
string(1) "0"
}
}

# Funciones Stomp

# stomp_connect_error

(PECL stomp &gt;= 0.3.0)

stomp_connect_error — Devuelve una cadena descripción de el último error al conectar

### Descripción

**stomp_connect_error**(): [string](#language.types.string)

Devuelve una cadena descripción de el último error al conectar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una cadena que describe el error, o **[null](#constant.null)** si no hay errores.

### Ejemplos

    **Ejemplo #1 Ejemplo de stomp_connect_error()**

&lt;?php
$link = stomp_connect('http://localhost:61613');

if(!$link) {
die('Connection failed: ' . stomp_connect_error());
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Connection failed: Invalid Broker URI scheme

# stomp_version

(PECL stomp &gt;= 0.1.0)

stomp_version — Obtiene la versión actual de la extensión stomp

### Descripción

**stomp_version**(): [string](#language.types.string)

Devuelve una cadena que contiene la versión actual de la extensión stomp.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Esta devuelve la versión actual de la extensión stomp

### Ejemplos

    **Ejemplo #1 Ejemplo de stomp_version()**

&lt;?php

var_dump(stomp_version());

?&gt;

    Resultado del ejemplo anterior es similar a:

string(5) "0.2.0"

## Tabla de contenidos

- [stomp_connect_error](#function.stomp-connect-error) — Devuelve una cadena descripción de el último error al conectar
- [stomp_version](#function.stomp-version) — Obtiene la versión actual de la extensión stomp

# La clase Stomp

(PECL stomp &gt;= 0.1.0)

## Introducción

Representa una conexión entre PHP y un Message Brokers que cumpla con las normas del protocolo Stomp.

## Sinopsis de la Clase

    ****




      class **Stomp**

     {


    /* Métodos */

    public [__construct](#stomp.construct)(

    [string](#language.types.string) $broker = ini_get("stomp.default_broker_uri"),
    [string](#language.types.string) $username = ?,
    [string](#language.types.string) $password = ?,
    [array](#language.types.array) $headers = ?
)

    public [abort](#stomp.abort)([string](#language.types.string) $transaction_id, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)

**stomp_abort**([resource](#language.types.resource) $link, [string](#language.types.string) $transaction_id, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)
public [ack](#stomp.ack)([mixed](#language.types.mixed) $msg, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)
**stomp_ack**([resource](#language.types.resource) $link, [mixed](#language.types.mixed) $msg, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)
public [begin](#stomp.begin)([string](#language.types.string) $transaction_id, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)
**stomp_begin**([resource](#language.types.resource) $link, [string](#language.types.string) $transaction_id, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)
public [commit](#stomp.commit)([string](#language.types.string) $transaction_id, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)
**stomp_commit**([resource](#language.types.resource) $link, [string](#language.types.string) $transaction_id, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)
**stomp_connect**(
    [string](#language.types.string) $broker = ini_get("stomp.default_broker_uri"),
    [string](#language.types.string) $username = ?,
    [string](#language.types.string) $password = ?,
    [array](#language.types.array) $headers = ?
): [resource](#language.types.resource)
**stomp_close**([resource](#language.types.resource) $link): [bool](#language.types.boolean)
public [error](#stomp.error)(): [string](#language.types.string)
**stomp_error**([resource](#language.types.resource) $link): [string](#language.types.string)
public [getReadTimeout](#stomp.getreadtimeout)(): [array](#language.types.array)
**stomp_get_read_timeout**([resource](#language.types.resource) $link): [array](#language.types.array)
public [getSessionId](#stomp.getsessionid)(): [string](#language.types.string)|[false](#language.types.singleton)
**stomp_get_session_id**([resource](#language.types.resource) $link): [string](#language.types.string)|[false](#language.types.singleton)
public [hasFrame](#stomp.hasframe)(): [bool](#language.types.boolean)
**stomp_has_frame**([resource](#language.types.resource) $link): [bool](#language.types.boolean)
public [readFrame](#stomp.readframe)([string](#language.types.string) $class_name = "stompFrame"): [stompframe](#class.stompframe)
**stomp_read_frame**([resource](#language.types.resource) $link): [array](#language.types.array)
public [send](#stomp.send)([string](#language.types.string) $destination, [mixed](#language.types.mixed) $msg, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)
**stomp_send**(
    [resource](#language.types.resource) $link,
    [string](#language.types.string) $destination,
    [mixed](#language.types.mixed) $msg,
    [array](#language.types.array) $headers = ?
): [bool](#language.types.boolean)
public [setReadTimeout](#stomp.setreadtimeout)([int](#language.types.integer) $seconds, [int](#language.types.integer) $microseconds = ?): [void](language.types.void.html)
**stomp_set_read_timeout**([resource](#language.types.resource) $link, [int](#language.types.integer) $seconds, [int](#language.types.integer) $microseconds = ?): [void](language.types.void.html)
public [subscribe](#stomp.subscribe)([string](#language.types.string) $destination, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)
**stomp_subscribe**([resource](#language.types.resource) $link, [string](#language.types.string) $destination, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)
public [unsubscribe](#stomp.unsubscribe)([string](#language.types.string) $destination, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)
**stomp_unsubscribe**([resource](#language.types.resource) $link, [string](#language.types.string) $destination, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)

    public [__destruct](#stomp.destruct)()

}

# Stomp::abort

# stomp_abort

(PECL stomp &gt;= 0.1.0)

Stomp::abort -- stomp_abort — Deshacer una transacción en curso

### Descripción

Estilo orientado a objetos (método):

public **Stomp::abort**([string](#language.types.string) $transaction_id, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)

Estilo procedimental:

**stomp_abort**([resource](#language.types.resource) $link, [string](#language.types.string) $transaction_id, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)

Deshacer una transacción en curso.

### Parámetros

    linkEstilo procedimental únicamente: El identificador stomp devuelto por la función[stomp_connect()](#stomp.construct).



     transaction_id


       La transacción a abortar.





    headersArray asociativo que contiene los encabezados adicionales (ejemplo: receipt).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php

/_ conexión _/
try {
$stomp = new Stomp('tcp://localhost:61613');
} catch(StompException $e) {
die('Connection failed: ' . $e-&gt;getMessage());
}

/_ iniciar una transacción _/
$stomp-&gt;begin('t1');

/_ enviar un mensaje a la cola _/
$stomp-&gt;send('/queue/foo', 'bar', array('transaction' =&gt; 't1'));

/_ deshacer/abortar _/
$stomp-&gt;abort('t1');

/_ cerrar la conexión _/
unset($stomp);
?&gt;

    **Ejemplo #2 Estilo procedimental**

&lt;?php

/_ conexión _/
$link = stomp_connect('tcp://localhost:61613');

/_ comprobar la conexión _/
if (!$link) {
die('Connection failed: ' . stomp_connect_error());
}

/_ iniciar una transacción _/
stomp_begin($link, 't1');

/_ enviar un mensaje a la cola 'foo' _/
stomp_send($link, '/queue/foo', 'bar', array('transaction' =&gt; 't1'));

/_ deshacer/abortar _/
stomp_abort($link, 't1');

/_ cerrar la conexión _/
stomp_close($link);

?&gt;

### Notas

**Sugerencia**Stomp es, por naturaleza, asíncrono. Una comunicación síncrona puede ser implementada añadiendo un encabezado receipt. Esto hará que los métodos no devuelvan nada hasta que el mensaje de confirmación no haya sido recibido o hasta que el tiempo de espera no sea alcanzado.

# Stomp::ack

# stomp_ack

(PECL stomp &gt;= 0.1.0)

Stomp::ack -- stomp_ack — Confirmar la recepción y el consumo de un mensaje

### Descripción

Estilo orientado a objetos (método):

public **Stomp::ack**([mixed](#language.types.mixed) $msg, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)

Estilo procedimental:

**stomp_ack**([resource](#language.types.resource) $link, [mixed](#language.types.mixed) $msg, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)

Confirmar el consumo de un mensaje desde una suscripción enviando el cliente una trama ACK de confirmación.

### Parámetros

    linkEstilo procedimental únicamente: El identificador stomp devuelto por la función[stomp_connect()](#stomp.construct).



     msg


       El mensaje/Id del mensaje a ser confirmado.





    headersArray asociativo que contiene los encabezados adicionales (ejemplo: receipt).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php

$queue  = '/queue/foo';
$msg = 'bar';

/_ conexión _/
try {
$stomp = new Stomp('tcp://localhost:61613');
} catch(StompException $e) {
die('Connection failed: ' . $e-&gt;getMessage());
}

/_ enviar un mensaje a la cola 'foo' _/
$stomp-&gt;send($queue, $msg);

/_ suscribirse a mensajes de la cola 'foo' _/
$stomp-&gt;subscribe($queue);

/_ leer una trama _/
$frame = $stomp-&gt;readFrame();

if ($frame-&gt;body === $msg) {
    /* confirmar que la trama fue recibida */
    $stomp-&gt;ack($frame);
}

/_ eliminar la suscripción _/
$stomp-&gt;unsubscribe($queue);

/_ cerrar la conexión _/
unset($stomp);

?&gt;

    **Ejemplo #2 Estilo procedimental**

&lt;?php

$queue  = '/queue/foo';
$msg = 'bar';

/_ conexión _/
$link = stomp_connect('ssl://localhost:61612');

/_ comprobar la conexión _/
if (!$link) {
die('Connection failed: ' . stomp_connect_error());
}

/_ iniciar una transacción _/
stomp_begin($link, 't1');

/_ enviar un mensaje a la cola 'foo' _/
stomp_send($link, $queue, $msg, array('transaction' =&gt; 't1'));

/_ validar una transacción _/
stomp_commit($link, 't1');

/_ suscribirse a mensajes de la cola 'foo' _/
stomp_subscribe($link, $queue);

/_ leer una trama _/
$frame = stomp_read_frame($link);

if ($frame['body'] === $msg) {
    /* confirmar que la trama fue recibida */
    stomp_ack($link, $frame['headers']['message-id']);
}

/_ eliminar la suscripción _/
stomp_unsubscribe($link, $queue);

/_ cerrar la conexión _/
stomp_close($link);

?&gt;

### Notas

**Nota**:

Un encabezado de transacción puede ser especificado, indicando que la confirmación de los mensajes debe ser parte de la transacción.

**Sugerencia**Stomp es, por naturaleza, asíncrono. Una comunicación síncrona puede ser implementada añadiendo un encabezado receipt. Esto hará que los métodos no devuelvan nada hasta que el mensaje de confirmación no haya sido recibido o hasta que el tiempo de espera no sea alcanzado.

# Stomp::begin

# stomp_begin

(PECL stomp &gt;= 0.1.0)

Stomp::begin -- stomp_begin — Iniciar una transacción

### Descripción

Estilo orientado a objetos (método):

public **Stomp::begin**([string](#language.types.string) $transaction_id, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)

Estilo procedimental:

**stomp_begin**([resource](#language.types.resource) $link, [string](#language.types.string) $transaction_id, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)

Inicia una transacción.

### Parámetros

    linkEstilo procedimental únicamente: El identificador stomp devuelto por la función[stomp_connect()](#stomp.construct).



     transaction_id


       La identificación de la transacción.





    headersArray asociativo que contiene los encabezados adicionales (ejemplo: receipt).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

Vea [stomp_commit()](#stomp.commit) o [stomp_abort()](#stomp.abort).

### Notas

**Sugerencia**Stomp es, por naturaleza, asíncrono. Una comunicación síncrona puede ser implementada añadiendo un encabezado receipt. Esto hará que los métodos no devuelvan nada hasta que el mensaje de confirmación no haya sido recibido o hasta que el tiempo de espera no sea alcanzado.

# Stomp::commit

# stomp_commit

(PECL stomp &gt;= 0.1.0)

Stomp::commit -- stomp_commit — Validar una transacción en curso

### Descripción

Estilo orientado a objetos (método):

public **Stomp::commit**([string](#language.types.string) $transaction_id, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)

Estilo procedimental:

**stomp_commit**([resource](#language.types.resource) $link, [string](#language.types.string) $transaction_id, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)

Valida una transacción en curso.

### Parámetros

    linkEstilo procedimental únicamente: El identificador stomp devuelto por la función[stomp_connect()](#stomp.construct).



     transaction_id


       La identificación de la transacción.





    headersArray asociativo que contiene los encabezados adicionales (ejemplo: receipt).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php

/_ conexión _/
try {
$stomp = new Stomp('tcp://localhost:61613');
} catch(StompException $e) {
die('Connection failed: ' . $e-&gt;getMessage());
}

/_ iniciar una transacción _/
$stomp-&gt;begin('t1');

/_ enviar un mensaje a la cola _/
$stomp-&gt;send('/queue/foo', 'bar', array('transaction' =&gt; 't1'));

/_ validar _/
$stomp-&gt;commit('t1');

/_ cerrar la conexión _/
unset($stomp);

?&gt;

    **Ejemplo #2 Estilo procedimental**

&lt;?php

/_ conexión _/
$link = stomp_connect('tcp://localhost:61613');

/_ comprobar la conexión _/
if (!$link) {
die('Connection failed: ' . stomp_connect_error());
}

/_ iniciar una transacción _/
stomp_begin($link, 't1');

/_ enviar un mensaje a la cola 'foo' _/
stomp_send($link, '/queue/foo', 'bar', array('transaction' =&gt; 't1'));

/_ validar _/
stomp_commit($link, 't1');

/_ cerrar la conexión _/
stomp_close($link);

?&gt;

### Notas

**Sugerencia**Stomp es, por naturaleza, asíncrono. Una comunicación síncrona puede ser implementada añadiendo un encabezado receipt. Esto hará que los métodos no devuelvan nada hasta que el mensaje de confirmación no haya sido recibido o hasta que el tiempo de espera no sea alcanzado.

# Stomp::\_\_construct

# stomp_connect

(PECL stomp &gt;= 0.1.0)

Stomp::\_\_construct -- stomp_connect — Abre una conexión

### Descripción

Estilo orientado a objetos (constructor):

    public **Stomp::__construct**(

    [string](#language.types.string) $broker = ini_get("stomp.default_broker_uri"),
    [string](#language.types.string) $username = ?,
    [string](#language.types.string) $password = ?,
    [array](#language.types.array) $headers = ?
)

Estilo procedimental:

**stomp_connect**(
    [string](#language.types.string) $broker = ini_get("stomp.default_broker_uri"),
    [string](#language.types.string) $username = ?,
    [string](#language.types.string) $password = ?,
    [array](#language.types.array) $headers = ?
): [resource](#language.types.resource)

Abre una conexión con un Message Broker compatible con el protocolo STOMP.

### Parámetros

     broker


       La URI broker






     username


       El nombre de usuario.






     password


       La contraseña.





    headersArray asociativo que contiene los encabezados adicionales (ejemplo: receipt).

### Valores devueltos

**Nota**:

Un encabezado de transacción puede ser especificado, indicando que la confirmación de los mensajes debe ser parte de la transacción.

### Historial de cambios

       Versión
       Descripción






       PECL stomp 1.0.1

        El paramétro headers fue añadido





### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php

/_ conexión _/
try {
$stomp = new Stomp('tcp://localhost:61613');
} catch(StompException $e) {
die('Connection failed: ' . $e-&gt;getMessage());
}

/_ cerrar la conexión _/
unset($stomp);

?&gt;

    **Ejemplo #2 Estilo procedimental**

&lt;?php

/_ conexión _/
$link = stomp_connect('ssl://localhost:61612');

/_ comprobar la conexión _/
if (!$link) {
die('Connection failed: ' . stomp_connect_error());
}

/_ cerrar la conexión _/
stomp_close($link);

?&gt;

# Stomp::\_\_destruct

# stomp_close

(PECL stomp &gt;= 0.1.0)

Stomp::\_\_destruct -- stomp_close — Cierra una conexión stomp

### Descripción

Estilo orientado a objetos (destructor):

public **Stomp::\_\_destruct**()

Estilo procedimental:

**stomp_close**([resource](#language.types.resource) $link): [bool](#language.types.boolean)

Cierra una conexión previamente abierta.

### Parámetros

    linkEstilo procedimental únicamente: El identificador stomp devuelto por la función[stomp_connect()](#stomp.construct).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

Vea [stomp_connect()](#stomp.construct).

# Stomp::error

# stomp_error

(PECL stomp &gt;= 0.1.0)

Stomp::error -- stomp_error — Obtiene el último error stomp

### Descripción

Estilo orientado a objetos (método):

public **Stomp::error**(): [string](#language.types.string)

Estilo procedimental:

**stomp_error**([resource](#language.types.resource) $link): [string](#language.types.string)

Obtiene el último error stomp.

### Parámetros

     linkEstilo procedimental únicamente: El identificador stomp devuelto por la función[stomp_connect()](#stomp.construct).

### Valores devueltos

Devuelve una cadena de error o **[false](#constant.false)** si no hay errores.

### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php

/_ conexión _/
try {
$stomp = new Stomp('tcp://localhost:61613');
} catch(StompException $e) {
die('Connection failed: ' . $e-&gt;getMessage());
}

var_dump($stomp-&gt;error());

if (!$stomp-&gt;abort('unknown-transaction', array('receipt' =&gt; 'foo'))) {
    var_dump($stomp-&gt;error());
}

/_ cerrar la conexión _/
unset($stomp);

?&gt;

     Resultado del ejemplo anterior es similar a:




bool(false)
string(43) "Invalid transaction id: unknown-transaction"

    **Ejemplo #2 Estilo procedimental**

&lt;?php

/_ conexión _/
$link = stomp_connect('ssl://localhost:61612');

/_ comprobar la conexión _/
if (!$link) {
die('Connection failed: ' . stomp_connect_error());
}

var_dump(stomp_error($link));

if (!stomp_abort($link, 'unknown-transaction', array('receipt' =&gt; 'foo'))) {
    var_dump(stomp_error($link));
}

/_ cerrar la conexión _/
stomp_close($link);

?&gt;

     Resultado del ejemplo anterior es similar a:




bool(false)
string(43) "Invalid transaction id: unknown-transaction"

# Stomp::getReadTimeout

# stomp_get_read_timeout

(PECL stomp &gt;= 0.3.0)

Stomp::getReadTimeout -- stomp_get_read_timeout — Obtener la lectura del tiempo de espera de la solicitud

### Descripción

Estilo orientado a objetos (método):

public **Stomp::getReadTimeout**(): [array](#language.types.array)

Estilo procedimental:

**stomp_get_read_timeout**([resource](#language.types.resource) $link): [array](#language.types.array)

Obtiene la lectura del tiempo de espera de la solicitud

### Parámetros

    linkEstilo procedimental únicamente: El identificador stomp devuelto por la función[stomp_connect()](#stomp.construct).

### Valores devueltos

Devuelve un array con dos elementos: sec y usec.

### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php

/_ conexión _/
try {
$stomp = new Stomp('tcp://localhost:61613');
} catch(StompException $e) {
die('Connection failed: ' . $e-&gt;getMessage());
}

var_dump($stomp-&gt;getReadTimeout());

/_ cerrar la conexión _/
unset($stomp);

?&gt;

     Resultado del ejemplo anterior es similar a:




array(2) {
["sec"]=&gt;
int(2)
["usec"]=&gt;
int(0)
}

    **Ejemplo #2 Estilo procedimental**

&lt;?php

/_ conexión _/
$link = stomp_connect('ssl://localhost:61612');

/_ comprobar la conexión _/
if (!$link) {
die('Connection failed: ' . stomp_connect_error());
}

var_dump(stomp_get_read_timeout($link));

/_ cerrar la conexión _/
stomp_close($link);

?&gt;

     Resultado del ejemplo anterior es similar a:




array(2) {
["sec"]=&gt;
int(2)
["usec"]=&gt;
int(0)
}

# Stomp::getSessionId

# stomp_get_session_id

(PECL stomp &gt;= 0.1.0)

Stomp::getSessionId -- stomp_get_session_id — Obtiene el identificador de sesión actual stomp

### Descripción

Estilo orientado a objetos (método):

    public **Stomp::getSessionId**(): [string](#language.types.string)|[false](#language.types.singleton)

Estilo procedimental:

**stomp_get_session_id**([resource](#language.types.resource) $link): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene el identificador de sesión actual stomp.

### Parámetros

    linkEstilo procedimental únicamente: El identificador stomp devuelto por la función[stomp_connect()](#stomp.construct).

### Valores devueltos

    [string](#language.types.string) session id on success o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php

/_ conexión _/
try {
$stomp = new Stomp('tcp://localhost:61613');
} catch(StompException $e) {
die('Connection failed: ' . $e-&gt;getMessage());
}

var_dump($stomp-&gt;getSessionId());

/_ cerrar la conexión _/
unset($stomp);

?&gt;

     Resultado del ejemplo anterior es similar a:




string(35) "ID:php.net-52873-1257291895530-4:14"

    **Ejemplo #2 Estilo procedural**

&lt;?php

/_ conexión _/
$link = stomp_connect('ssl://localhost:61612');

/_ comprobar la conexión _/
if (!$link) {
die('Connection failed: ' . stomp_connect_error());
}

var_dump(stomp_get_session_id($link));

/_ cerrar la conexión _/
stomp_close($link);

?&gt;

     Resultado del ejemplo anterior es similar a:




string(35) "ID:php.net-52873-1257291895530-4:14"

# Stomp::hasFrame

# stomp_has_frame

(PECL stomp &gt;= 0.1.0)

Stomp::hasFrame -- stomp_has_frame — Indica si existe o no una trama lista para leer

### Descripción

Estilo orientado a objetos (método):

public **Stomp::hasFrame**(): [bool](#language.types.boolean)

Estilo procedimental:

**stomp_has_frame**([resource](#language.types.resource) $link): [bool](#language.types.boolean)

Indica si existe o no una trama lista para leer.

### Parámetros

    linkEstilo procedimental únicamente: El identificador stomp devuelto por la función[stomp_connect()](#stomp.construct).

### Valores devueltos

Devuelve **[true](#constant.true)** si hay una trama lista para leer, o **[false](#constant.false)** en caso contrario.

# Stomp::readFrame

# stomp_read_frame

(PECL stomp &gt;= 0.1.0)

Stomp::readFrame -- stomp_read_frame — Leer la siguiente trama

### Descripción

Estilo orientado a objetos (método):

public **Stomp::readFrame**([string](#language.types.string) $class_name = "stompFrame"): [stompframe](#class.stompframe)

Estilo procedimental:

**stomp_read_frame**([resource](#language.types.resource) $link): [array](#language.types.array)

Lee la siguiente trama. Es posible crear una instancia de un objeto de una clase específica, y pasar parámetros al constructor de esa clase.

### Parámetros

    linkEstilo procedimental únicamente: El identificador stomp devuelto por la función[stomp_connect()](#stomp.construct).



     class_name


        El nombre de la clase a instanciar. Si no se especifica, un objeto stompFrame es devuelto.





### Valores devueltos

**Nota**:

Un encabezado de transacción puede ser especificado, indicando que la confirmación de los mensajes debe ser parte de la transacción.

### Historial de cambios

       Versión
       Descripción






       PECL stomp 0.4.0

        El parámentro class_name fue añadido.





### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php

/_ conexión _/
try {
$stomp = new Stomp('tcp://localhost:61613');
} catch(StompException $e) {
die('Connection failed: ' . $e-&gt;getMessage());
}

/_ suscribirse a mensajes de la cola 'foo' _/
$stomp-&gt;subscribe('/queue/foo');

/_ leer una trama _/
var_dump($stomp-&gt;readFrame());

/_ cerrar la conexión _/
unset($stomp);

?&gt;

     Resultado del ejemplo anterior es similar a:




object(StompFrame)#2 (3) {
["command"]=&gt;
string(7) "MESSAGE"
["headers"]=&gt;
array(5) {
["message-id"]=&gt;
string(41) "ID:php.net-55293-1257226743606-4:2:-1:1:1"
["destination"]=&gt;
string(10) "/queue/foo"
["timestamp"]=&gt;
string(13) "1257226805828"
["expires"]=&gt;
string(1) "0"
["priority"]=&gt;
string(1) "0"
}
["body"]=&gt;
string(3) "bar"
}

    **Ejemplo #2 Estilo procedimental**

&lt;?php

/_ conexión _/
$link = stomp_connect('ssl://localhost:61612');

/_ comprobar la conexión _/
if (!$link) {
die('Connection failed: ' . stomp_connect_error());
}

/_ suscribirse a mensajes de la cola 'foo' _/
stomp_subscribe($link, '/queue/foo');

/_ leer una trama _/
$frame = stomp_read_frame($link);

/_ cerrar la conexión _/
stomp_close($link);

?&gt;

     Resultado del ejemplo anterior es similar a:




array(3) {
["command"]=&gt;
string(7) "MESSAGE"
["body"]=&gt;
string(3) "bar"
["headers"]=&gt;
array(6) {
["transaction"]=&gt;
string(2) "t1"
["message-id"]=&gt;
string(41) "ID:php.net-55293-1257226743606-4:3:-1:1:1"
["destination"]=&gt;
string(10) "/queue/foo"
["timestamp"]=&gt;
string(13) "1257227037059"
["expires"]=&gt;
string(1) "0"
["priority"]=&gt;
string(1) "0"
}
}

# Stomp::send

# stomp_send

(PECL stomp &gt;= 0.1.0)

Stomp::send -- stomp_send — Envía un mensaje

### Descripción

Estilo orientado a objetos (método):

public **Stomp::send**([string](#language.types.string) $destination, [mixed](#language.types.mixed) $msg, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)

Estilo procedimental:

**stomp_send**(
    [resource](#language.types.resource) $link,
    [string](#language.types.string) $destination,
    [mixed](#language.types.mixed) $msg,
    [array](#language.types.array) $headers = ?
): [bool](#language.types.boolean)

Envía un mensaje a el Message Broker.

### Parámetros

    linkEstilo procedimental únicamente: El identificador stomp devuelto por la función[stomp_connect()](#stomp.construct).



     destination


       A dónde eenviar el mensaje






     msg


       Mensaje a enviar.





    headersArray asociativo que contiene los encabezados adicionales (ejemplo: receipt).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

Vea [stomp_ack()](#stomp.ack).

### Notas

**Nota**:

Un encabezado de transacción puede ser especificado, indicando que la confirmación de los mensajes debe ser parte de la transacción.

**Sugerencia**Stomp es, por naturaleza, asíncrono. Una comunicación síncrona puede ser implementada añadiendo un encabezado receipt. Esto hará que los métodos no devuelvan nada hasta que el mensaje de confirmación no haya sido recibido o hasta que el tiempo de espera no sea alcanzado.

# Stomp::setReadTimeout

# stomp_set_read_timeout

(PECL stomp &gt;= 0.3.0)

Stomp::setReadTimeout -- stomp_set_read_timeout — Establecer el tiempo de espera de lectura

### Descripción

Estilo orientado a objetos (método):

public **Stomp::setReadTimeout**([int](#language.types.integer) $seconds, [int](#language.types.integer) $microseconds = ?): [void](language.types.void.html)

Estilo procedimental:

**stomp_set_read_timeout**([resource](#language.types.resource) $link, [int](#language.types.integer) $seconds, [int](#language.types.integer) $microseconds = ?): [void](language.types.void.html)

Establece el tiempo de espera de lectura.

### Parámetros

    linkEstilo procedimental únicamente: El identificador stomp devuelto por la función[stomp_connect()](#stomp.construct).



     seconds


       Los segundos parte de el tiempo de espera a ser establecido.






     microseconds


       Los microsegundos parte de el tiempo de espera a ser establecido.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php

/_ conexión _/
try {
$stomp = new Stomp('tcp://localhost:61613');
} catch(StompException $e) {
die('Connection failed: ' . $e-&gt;getMessage());
}

$stomp-&gt;setReadTimeout(10);

/_ cerrar la conexión _/
unset($stomp);

?&gt;

    **Ejemplo #2 Estilo procedimental**

&lt;?php

/_ conexión _/
$link = stomp_connect('ssl://localhost:61612');

/_ comprobar la conexión _/
if (!$link) {
die('Connection failed: ' . stomp_connect_error());
}

stomp_set_read_timeout($link, 10);

/_ cerrar la conexión _/
stomp_close($link);

?&gt;

# Stomp::subscribe

# stomp_subscribe

(PECL stomp &gt;= 0.1.0)

Stomp::subscribe -- stomp_subscribe — Registrarse para escuchar a un destino dado

### Descripción

Estilo orientado a objetos (método):

public **Stomp::subscribe**([string](#language.types.string) $destination, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)

Estilo procedimental:

**stomp_subscribe**([resource](#language.types.resource) $link, [string](#language.types.string) $destination, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)

Registrarse para escuchar a un destino dado.

### Parámetros

    linkEstilo procedimental únicamente: El identificador stomp devuelto por la función[stomp_connect()](#stomp.construct).



     destination


       Destino al que suscribirse.





    headersArray asociativo que contiene los encabezados adicionales (ejemplo: receipt).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

Vea [stomp_ack()](#stomp.ack).

### Notas

**Sugerencia**Stomp es, por naturaleza, asíncrono. Una comunicación síncrona puede ser implementada añadiendo un encabezado receipt. Esto hará que los métodos no devuelvan nada hasta que el mensaje de confirmación no haya sido recibido o hasta que el tiempo de espera no sea alcanzado.

# Stomp::unsubscribe

# stomp_unsubscribe

(PECL stomp &gt;= 0.1.0)

Stomp::unsubscribe -- stomp_unsubscribe — Dar de baja una suscripción existente

### Descripción

Estilo orientado a objetos (método):

public **Stomp::unsubscribe**([string](#language.types.string) $destination, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)

Estilo procedimental:

**stomp_unsubscribe**([resource](#language.types.resource) $link, [string](#language.types.string) $destination, [array](#language.types.array) $headers = ?): [bool](#language.types.boolean)

Dar de baja una suscripción existente.

### Parámetros

    linkEstilo procedimental únicamente: El identificador stomp devuelto por la función[stomp_connect()](#stomp.construct).



     destination


       Suscripción a eliminar





    headersArray asociativo que contiene los encabezados adicionales (ejemplo: receipt).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

Vea [stomp_ack()](#stomp.ack).

### Notas

**Sugerencia**Stomp es, por naturaleza, asíncrono. Una comunicación síncrona puede ser implementada añadiendo un encabezado receipt. Esto hará que los métodos no devuelvan nada hasta que el mensaje de confirmación no haya sido recibido o hasta que el tiempo de espera no sea alcanzado.

## Tabla de contenidos

- [Stomp::abort](#stomp.abort) — Deshacer una transacción en curso
- [Stomp::ack](#stomp.ack) — Confirmar la recepción y el consumo de un mensaje
- [Stomp::begin](#stomp.begin) — Iniciar una transacción
- [Stomp::commit](#stomp.commit) — Validar una transacción en curso
- [Stomp::\_\_construct](#stomp.construct) — Abre una conexión
- [Stomp::\_\_destruct](#stomp.destruct) — Cierra una conexión stomp
- [Stomp::error](#stomp.error) — Obtiene el último error stomp
- [Stomp::getReadTimeout](#stomp.getreadtimeout) — Obtener la lectura del tiempo de espera de la solicitud
- [Stomp::getSessionId](#stomp.getsessionid) — Obtiene el identificador de sesión actual stomp
- [Stomp::hasFrame](#stomp.hasframe) — Indica si existe o no una trama lista para leer
- [Stomp::readFrame](#stomp.readframe) — Leer la siguiente trama
- [Stomp::send](#stomp.send) — Envía un mensaje
- [Stomp::setReadTimeout](#stomp.setreadtimeout) — Establecer el tiempo de espera de lectura
- [Stomp::subscribe](#stomp.subscribe) — Registrarse para escuchar a un destino dado
- [Stomp::unsubscribe](#stomp.unsubscribe) — Dar de baja una suscripción existente

# La clase StompFrame

(PECL stomp &gt;= 0.1.0)

## Introducción

    Representa un mensaje el cual fue enviado o recibido desde un Message Brokers que cumple con las normas del protocolo Stomp.

## Sinopsis de la Clase

    ****




      class **StompFrame**

     {

    /* Propiedades */

     public
      [$command](#stompframe.props.command);

    public
      [$headers](#stompframe.props.headers);

    public
      [$body](#stompframe.props.body);



    /* Métodos */

[\_\_construct](#stompframe.construct)([string](#language.types.string) $command = ?, [array](#language.types.array) $headers = ?, [string](#language.types.string) $body = ?)

}

## Propiedades

     command

      Frame command.





     headers

      Frame headers ([array](#language.types.array)).





     body

      Frame body.




# StompFrame::\_\_construct

(PECL stomp &gt;= 0.1.0)

StompFrame::\_\_construct — Constructor

### Descripción

**StompFrame::\_\_construct**([string](#language.types.string) $command = ?, [array](#language.types.array) $headers = ?, [string](#language.types.string) $body = ?)

Constructor.

### Parámetros

     command


       Comando del frame






     headers


       encabezados del frame ([array](#language.types.array)).






     body


       cuerpo del frame





## Tabla de contenidos

- [StompFrame::\_\_construct](#stompframe.construct) — Constructor

# La clase StompException

(PECL stomp &gt;= 0.1.0)

## Introducción

Representa un error proveniente desde la extensión stomp. Vea [Exceptions](#language.exceptions) para obtener más información acerca de las excepciones en PHP.

## Sinopsis de la Clase

    ****




      class **StompException**



      extends
       [Exception](#class.exception)

     {


    /* Métodos heredados */

final public [Exception::getMessage](#exception.getmessage)(): [string](#language.types.string)
final public [Exception::getPrevious](#exception.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Exception::getCode](#exception.getcode)(): [int](#language.types.integer)
final public [Exception::getFile](#exception.getfile)(): [string](#language.types.string)
final public [Exception::getLine](#exception.getline)(): [int](#language.types.integer)
final public [Exception::getTrace](#exception.gettrace)(): [array](#language.types.array)
final public [Exception::getTraceAsString](#exception.gettraceasstring)(): [string](#language.types.string)
public [Exception::\_\_toString](#exception.tostring)(): [string](#language.types.string)
private [Exception::\_\_clone](#exception.clone)(): [void](language.types.void.html)

    /* Métodos */
    public [getDetails](#stomp.getdetails)(): [string](#language.types.string)

}

# StompException::getDetails

(PECL stomp &gt;= 0.1.0)

StompException::getDetails — Obtener detalles de la excepción

### Descripción

public **StompException::getDetails**(): [string](#language.types.string)

Obtener detalles de la excepción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    [string](#language.types.string) que contiene los detalles del error.

## Tabla de contenidos

- [StompException::getDetails](#stomp.getdetails) — Obtener detalles de la excepción

- [Introducción](#intro.stomp)
- [Instalación/Configuración](#stomp.setup)<li>[Requerimientos](#stomp.requirements)
- [Instalación](#stomp.installation)
- [Configuración en tiempo de ejecución](#stomp.configuration)
- [Tipos de recursos](#stomp.resources)
  </li>- [Ejemplos](#stomp.examples)
- [Funciones Stomp](#ref.stomp)<li>[stomp_connect_error](#function.stomp-connect-error) — Devuelve una cadena descripción de el último error al conectar
- [stomp_version](#function.stomp-version) — Obtiene la versión actual de la extensión stomp
  </li>- [Stomp](#class.stomp) — La clase Stomp<li>[Stomp::abort](#stomp.abort) — Deshacer una transacción en curso
- [Stomp::ack](#stomp.ack) — Confirmar la recepción y el consumo de un mensaje
- [Stomp::begin](#stomp.begin) — Iniciar una transacción
- [Stomp::commit](#stomp.commit) — Validar una transacción en curso
- [Stomp::\_\_construct](#stomp.construct) — Abre una conexión
- [Stomp::\_\_destruct](#stomp.destruct) — Cierra una conexión stomp
- [Stomp::error](#stomp.error) — Obtiene el último error stomp
- [Stomp::getReadTimeout](#stomp.getreadtimeout) — Obtener la lectura del tiempo de espera de la solicitud
- [Stomp::getSessionId](#stomp.getsessionid) — Obtiene el identificador de sesión actual stomp
- [Stomp::hasFrame](#stomp.hasframe) — Indica si existe o no una trama lista para leer
- [Stomp::readFrame](#stomp.readframe) — Leer la siguiente trama
- [Stomp::send](#stomp.send) — Envía un mensaje
- [Stomp::setReadTimeout](#stomp.setreadtimeout) — Establecer el tiempo de espera de lectura
- [Stomp::subscribe](#stomp.subscribe) — Registrarse para escuchar a un destino dado
- [Stomp::unsubscribe](#stomp.unsubscribe) — Dar de baja una suscripción existente
  </li>- [StompFrame](#class.stompframe) — La clase StompFrame<li>[StompFrame::__construct](#stompframe.construct) — Constructor
  </li>- [StompException](#class.stompexception) — La clase StompException<li>[StompException::getDetails](#stomp.getdetails) — Obtener detalles de la excepción
  </li>
