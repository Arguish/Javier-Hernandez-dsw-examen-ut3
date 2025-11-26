# ZMQ

# Introducción

**Advertencia**
Esta extensión es _EXPERIMENTAL_. El comportamiento de esta extensión, los nombres de sus funciones,
y toda la documentación alrededor de esta extensión puede cambiar sin previo aviso en una próxima versión de PHP.
Esta extensión debe ser utilizada bajo su propio riesgo.

"ØMQ es una biblioteca software que permite diseñar e implementar rápidamente una aplicación basada en mensajes." --Sitio web de 0MQ

Para más información acerca de 0MQ, visite [» http://zeromq.org/](http://zeromq.org/).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#zmq.requirements)
- [Instalación](#zmq.installation)

    ## Requerimientos

    La extensión ZMQ requiere la version 2.0.7 o superior de 0MQ. 0MQ se puede adquirir en [» http://zeromq.org/area:download](http://zeromq.org/area:download).

        ## Instalación



         Esta extensión es considerada no mantenida y muerta.
            Sin embargo, el código fuente sigue disponible desde el

    SVN de
    PECL aquí:
    [» https://pecl.php.net/package/zmq](https://pecl.php.net/package/zmq)

          Los binarios Windows
            (los archivos DLL)
            para esta extensión PECL están disponibles en el sitio web PECL.

# La clase ZMQ

(PECL zmq &gt;= 0.5.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **ZMQ**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [SOCKET_PAIR](#zmq.constants.socket-pair);

    const
     [int](#language.types.integer)
      [SOCKET_PUB](#zmq.constants.socket-pub);

    const
     [int](#language.types.integer)
      [SOCKET_SUB](#zmq.constants.socket-sub);

    const
     [int](#language.types.integer)
      [SOCKET_REQ](#zmq.constants.socket-req);

    const
     [int](#language.types.integer)
      [SOCKET_REP](#zmq.constants.socket-rep);

    const
     [int](#language.types.integer)
      [SOCKET_XREQ](#zmq.constants.socket-xreq);

    const
     [int](#language.types.integer)
      [SOCKET_XREP](#zmq.constants.socket-xrep);

    const
     [int](#language.types.integer)
      [SOCKET_PUSH](#zmq.constants.socket-push);

    const
     [int](#language.types.integer)
      [SOCKET_PULL](#zmq.constants.socket-pull);

    const
     [int](#language.types.integer)
      [SOCKET_ROUTER](#zmq.constants.socket-router);

    const
     [int](#language.types.integer)
      [SOCKET_DEALER](#zmq.constants.socket-dealer);

    const
     [int](#language.types.integer)
      [SOCKET_XPUB](#zmq.constants.socket-xpub);

    const
     [int](#language.types.integer)
      [SOCKET_XSUB](#zmq.constants.socket-xsub);

    const
     [int](#language.types.integer)
      [SOCKET_STREAM](#zmq.constants.socket-stream);

    const
     [int](#language.types.integer)
      [SOCKOPT_HWM](#zmq.constants.sockopt-hwm);

    const
     [int](#language.types.integer)
      [SOCKOPT_SNDHWM](#zmq.constants.sockopt-sndhwm);

    const
     [int](#language.types.integer)
      [SOCKOPT_RCVHWM](#zmq.constants.sockopt-rcvhwm);

    const
     [int](#language.types.integer)
      [SOCKOPT_AFFINITY](#zmq.constants.sockopt-affinity);

    const
     [int](#language.types.integer)
      [SOCKOPT_IDENTITY](#zmq.constants.sockopt-identity);

    const
     [int](#language.types.integer)
      [SOCKOPT_SUBSCRIBE](#zmq.constants.sockopt-subscribe);

    const
     [int](#language.types.integer)
      [SOCKOPT_UNSUBSCRIBE](#zmq.constants.sockopt-unsubscribe);

    const
     [int](#language.types.integer)
      [SOCKOPT_RATE](#zmq.constants.sockopt-rate);

    const
     [int](#language.types.integer)
      [SOCKOPT_RECOVERY_IVL](#zmq.constants.sockopt-recovery-ivl);

    const
     [int](#language.types.integer)
      [SOCKOPT_RECONNECT_IVL](#zmq.constants.sockopt-reconnect-ivl);

    const
     [int](#language.types.integer)
      [SOCKOPT_RECONNECT_IVL_MAX](#zmq.constants.sockopt-reconnect-ivl-max);

    const
     [int](#language.types.integer)
      [SOCKOPT_MCAST_LOOP](#zmq.constants.sockopt-mcast-loop);

    const
     [int](#language.types.integer)
      [SOCKOPT_SNDBUF](#zmq.constants.sockopt-sndbuf);

    const
     [int](#language.types.integer)
      [SOCKOPT_RCVBUF](#zmq.constants.sockopt-rcvbuf);

    const
     [int](#language.types.integer)
      [SOCKOPT_RCVMORE](#zmq.constants.sockopt-rcvmore);

    const
     [int](#language.types.integer)
      [SOCKOPT_TYPE](#zmq.constants.sockopt-type);

    const
     [int](#language.types.integer)
      [SOCKOPT_LINGER](#zmq.constants.sockopt-linger);

    const
     [int](#language.types.integer)
      [SOCKOPT_BACKLOG](#zmq.constants.sockopt-backlog);

    const
     [int](#language.types.integer)
      [SOCKOPT_MAXMSGSIZE](#zmq.constants.sockopt-maxmsgsize);

    const
     [int](#language.types.integer)
      [SOCKOPT_SNDTIMEO](#zmq.constants.sockopt-sndtimeo);

    const
     [int](#language.types.integer)
      [SOCKOPT_RCVTIMEO](#zmq.constants.sockopt-rcvtimeo);

    const
     [int](#language.types.integer)
      [SOCKOPT_IPV4ONLY](#zmq.constants.sockopt-ipv4only);

    const
     [int](#language.types.integer)
      [SOCKOPT_LAST_ENDPOINT](#zmq.constants.sockopt-last-endpoint);

    const
     [int](#language.types.integer)
      [SOCKOPT_TCP_KEEPALIVE_IDLE](#zmq.constants.sockopt-tcp-keepalive-idle);

    const
     [int](#language.types.integer)
      [SOCKOPT_TCP_KEEPALIVE_CNT](#zmq.constants.sockopt-tcp-keepalive-cnt);

    const
     [int](#language.types.integer)
      [SOCKOPT_TCP_KEEPALIVE_INTVL](#zmq.constants.sockopt-tcp-keepalive-intvl);

    const
     [int](#language.types.integer)
      [SOCKOPT_TCP_ACCEPT_FILTER](#zmq.constants.sockopt-tcp-accept-filter);

    const
     [int](#language.types.integer)
      [SOCKOPT_TCP_ACCEPT_FILTER](#zmq.constants.sockopt-tcp-accept-filter);

    const
     [int](#language.types.integer)
      [SOCKOPT_DELAY_ATTACH_ON_CONNECT](#zmq.constants.sockopt-delay-attach-on-connect);

    const
     [int](#language.types.integer)
      [SOCKOPT_XPUB_VERBOSE](#zmq.constants.sockopt-xpub-verbose);

    const
     [int](#language.types.integer)
      [SOCKOPT_ROUTER_RAW](#zmq.constants.sockopt-router-raw);

    const
     [int](#language.types.integer)
      [SOCKOPT_IPV6](#zmq.constants.sockopt-ipv6);

    const
     [int](#language.types.integer)
      [CTXOPT_MAX_SOCKETS](#zmq.constants.ctxopt-max-sockets);

    const
     [int](#language.types.integer)
      [POLL_IN](#zmq.constants.poll-in);

    const
     [int](#language.types.integer)
      [POLL_OUT](#zmq.constants.poll-out);

    const
     [int](#language.types.integer)
      [MODE_NOBLOCK](#zmq.constants.mode-noblock);

    const
     [int](#language.types.integer)
      [MODE_DONTWAIT](#zmq.constants.mode-dontwait);

    const
     [int](#language.types.integer)
      [MODE_SNDMORE](#zmq.constants.mode-sndmore);

    const
     [int](#language.types.integer)
      [ERR_INTERNAL](#zmq.constants.err-internal);

    const
     [int](#language.types.integer)
      [ERR_EAGAIN](#zmq.constants.err-eagain);

    const
     [int](#language.types.integer)
      [ERR_ENOTSUP](#zmq.constants.err-enotsup);

    const
     [int](#language.types.integer)
      [ERR_EFSM](#zmq.constants.err-efsm);

    const
     [int](#language.types.integer)
      [ERR_ETERM](#zmq.constants.err-eterm);


    /* Métodos */

private [\_\_construct](#zmq.construct)()

}

## Constantes predefinidas

    ## Tipos de constantes de ZMQ




      **[ZMQ::SOCKET_PAIR](#zmq.constants.socket-pair)**

       Patrón de par exclusivo






      **[ZMQ::SOCKET_PUB](#zmq.constants.socket-pub)**

       Socket publicador






      **[ZMQ::SOCKET_SUB](#zmq.constants.socket-sub)**

       Socket suscriptor






      **[ZMQ::SOCKET_REQ](#zmq.constants.socket-req)**

       Socket de petición






      **[ZMQ::SOCKET_REP](#zmq.constants.socket-rep)**

       Socket de respuesta






      **[ZMQ::SOCKET_XREQ](#zmq.constants.socket-xreq)**

       Alias de SOCKET_DEALER






      **[ZMQ::SOCKET_XREP](#zmq.constants.socket-xrep)**

       Alias de SOCKET_ROUTER






      **[ZMQ::SOCKET_PUSH](#zmq.constants.socket-push)**

       Socket "push" ascendente de tubería






      **[ZMQ::SOCKET_PULL](#zmq.constants.socket-pull)**

       Socket "pull" descendente de tubería






      **[ZMQ::SOCKET_ROUTER](#zmq.constants.socket-router)**

       Socket REP ampliado que puede dirigir réplicas a solicitantes






      **[ZMQ::SOCKET_DEALER](#zmq.constants.socket-dealer)**

       Sokect REQ ampliado que equilibra a todos los pares conectados






      **[ZMQ::SOCKET_XPUB](#zmq.constants.socket-xpub)**

       Similar to SOCKET_PUB, except you can receive subscriptions as messages.
        The subscription message is 0 (unsubscribe) or 1 (subscribe) followed by the topic.






      **[ZMQ::SOCKET_XSUB](#zmq.constants.socket-xsub)**

       Similar a SOCKET_SUB, excepto que se puede enviar suscripciones como mensajes. Véase SOCKET_XPUB para el formato.






      **[ZMQ::SOCKET_STREAM](#zmq.constants.socket-stream)**

       Utilizada para enviar y recibir datos TCP de un par que no sea ØMQ. Disponible si se compila con ZeroMQ 4.0 o superior (Value: [int](#language.types.integer)).






      **[ZMQ::SOCKOPT_HWM](#zmq.constants.sockopt-hwm)**

       La marca de agua para mensajes entrantes y salientes es un límite firme sobre el número máximo de mensajes salientes que ØMQ pondrá en cola en la memoria para cualquier único par con que se comunique el socket especificado. Establecer esta opción en un socket solamente afectará a las conexiones realizadas después de haber establecido esta opción. En ZeroMQ 3.x esto es una envoltura para establecer tanto SNDHWM como RCVHWM. (Valor: [int](#language.types.integer)).






      **[ZMQ::SOCKOPT_SNDHWM](#zmq.constants.sockopt-sndhwm)**

       La opción ZMQ_SNDHWM establece la marca de agua alta para mensajes salientes en el socket especificado. Disponible si se compila con ZeroMQ 3.0 o superior (Valor: [int](#language.types.integer)).






      **[ZMQ::SOCKOPT_RCVHWM](#zmq.constants.sockopt-rcvhwm)**

       La opción SOCKOPT_RCVHWM establece la marca de agua alta para mensajes entrantes en el socket especificado. Disponible si se compila con ZeroMQ 3.0 o superior (Valor: [int](#language.types.integer)).






      **[ZMQ::SOCKOPT_AFFINITY](#zmq.constants.sockopt-affinity)**

       Establecer la afinidad del hilo de E/S (Valor: [int](#language.types.integer))






      **[ZMQ::SOCKOPT_IDENTITY](#zmq.constants.sockopt-identity)**

       Establecer la identidad del socket identity (Valor: [string](#language.types.string))






      **[ZMQ::SOCKOPT_SUBSCRIBE](#zmq.constants.sockopt-subscribe)**

       Establecer un filtro para mensajes. Válido para socket suscriptores socket (Valor: [string](#language.types.string))






      **[ZMQ::SOCKOPT_UNSUBSCRIBE](#zmq.constants.sockopt-unsubscribe)**

       Eliminar un filtro para mensajes. Válido para socket suscriptores (Valor: [string](#language.types.string))






      **[ZMQ::SOCKOPT_RATE](#zmq.constants.sockopt-rate)**

       Establecer la tasa para los socket de multidifusión (pgm) (Valor: [int](#language.types.integer) &gt;= 0)






      **[ZMQ::SOCKOPT_RECOVERY_IVL](#zmq.constants.sockopt-recovery-ivl)**

       Establecer el intervalo de recuperación de la multidifusión (Valor: [int](#language.types.integer) &gt;= 0)






      **[ZMQ::SOCKOPT_RECONNECT_IVL](#zmq.constants.sockopt-reconnect-ivl)**

        Establecer el intervañp de reconexión inicial (Valor: [int](#language.types.integer) &gt;= 0)






      **[ZMQ::SOCKOPT_RECONNECT_IVL_MAX](#zmq.constants.sockopt-reconnect-ivl-max)**

        Establecer el intervalo de reconexión máximo (Valor: [int](#language.types.integer) &gt;= 0)






      **[ZMQ::SOCKOPT_MCAST_LOOP](#zmq.constants.sockopt-mcast-loop)**

        Controlar el loopback de la multidifusión (Valor: [int](#language.types.integer) &gt;= 0)






      **[ZMQ::SOCKOPT_SNDBUF](#zmq.constants.sockopt-sndbuf)**

       Establecer el tamaño del buffer de transmisión del kernel (Valor: [int](#language.types.integer) &gt;= 0)






      **[ZMQ::SOCKOPT_RCVBUF](#zmq.constants.sockopt-rcvbuf)**

        Establecer el tamaño del buffer de recepción del kernel (Valor: [int](#language.types.integer) &gt;= 0)






      **[ZMQ::SOCKOPT_RCVMORE](#zmq.constants.sockopt-rcvmore)**

       Recibir mensajes multiparte (Valor: [int](#language.types.integer))






      **[ZMQ::SOCKOPT_TYPE](#zmq.constants.sockopt-type)**

       Obtener el tipo de socket. Válido para getSockOpt (Valor: [int](#language.types.integer))






      **[ZMQ::SOCKOPT_LINGER](#zmq.constants.sockopt-linger)**

       El valor de permanencia ("linger") del socket. Especifica cuánto quedará esperando el socket
       intentando volcar mensajes después de haber sido cerrado (Valor: [int](#language.types.integer))






      **[ZMQ::SOCKOPT_BACKLOG](#zmq.constants.sockopt-backlog)**

       La opción SOCKOPT_BACKLOG establece la longitud máxima de la cola de las conexiones de pares salientes para el socket especificado; esto solamente se aplica a transportes orientados a conexión. (Valor: [int](#language.types.integer))






      **[ZMQ::SOCKOPT_MAXMSGSIZE](#zmq.constants.sockopt-maxmsgsize)**

       Limita el tamaño máximo del mensaje entrante. Un valor de -1 significa sin límite. Disponible si se compila con ZeroMQ 3.0 o superior (Valor: [int](#language.types.integer))






      **[ZMQ::SOCKOPT_SNDTIMEO](#zmq.constants.sockopt-sndtimeo)**

       Establecer el tiempo de espera para la operación de envío del socket. Un valor de -1 significa sin límite. Disponible si se compila con ZeroMQ 3.0 o superior (Valor: [int](#language.types.integer))






      **[ZMQ::SOCKOPT_RCVTIMEO](#zmq.constants.sockopt-rcvtimeo)**

       Establecer el tiempo de espera para la operación de recepción del socket. Un valor de -1 significa sin límite. Disponible si se compila con ZeroMQ 3.0 o superior (Valor: [int](#language.types.integer))






      **[ZMQ::SOCKOPT_IPV4ONLY](#zmq.constants.sockopt-ipv4only)**

       Deshabilitar el soporte para IPV6 si es 1. Disponible si se compila con ZeroMQ 3.x (Valor: [int](#language.types.integer))






      **[ZMQ::SOCKOPT_LAST_ENDPOINT](#zmq.constants.sockopt-last-endpoint)**

       Obtener el último extremo conectado - para emplear con puertos comodín *. Disponible si se compila con ZeroMQ 3.0 o superior (Valor: [string](#language.types.string))






      **[ZMQ::SOCKOPT_TCP_KEEPALIVE_IDLE](#zmq.constants.sockopt-tcp-keepalive-idle)**

       Tiempo de inactividad para el mensaje "keepalive" de TCP. Disponible si se compila con ZeroMQ 3.0 o superior (Valor: [int](#language.types.integer))






      **[ZMQ::SOCKOPT_TCP_KEEPALIVE_CNT](#zmq.constants.sockopt-tcp-keepalive-cnt)**

       Cuante de tiempo para el mensaje "keepalive" de TCP. Disponible si se compila con ZeroMQ 3.0 o superior (Valor: [int](#language.types.integer))






      **[ZMQ::SOCKOPT_TCP_KEEPALIVE_INTVL](#zmq.constants.sockopt-tcp-keepalive-intvl)**

       Intervalo para el mensaje "keepalive" de TCP. Disponible si se compila con ZeroMQ 3.0 o superior (Valor: [int](#language.types.integer))






      **[ZMQ::SOCKOPT_DELAY_ATTACH_ON_CONNECT](#zmq.constants.sockopt-delay-attach-on-connect)**

       Establecer un string CIDR para comparar con conexiones TCP entrantes. Disponible si se compila con ZeroMQ 3.0 o superior (Valor: [string](#language.types.string))






      **[ZMQ::SOCKOPT_TCP_ACCEPT_FILTER](#zmq.constants.sockopt-tcp-accept-filter)**

       Establecer un string CIDR para comparar con conexioines TCP entrantes. Disponible si se compila con ZeroMQ 3.0 o superior (Valor: [string](#language.types.string))






      **[ZMQ::SOCKOPT_XPUB_VERBOSE](#zmq.constants.sockopt-xpub-verbose)**

       Establcer el XPUB para recibir un mensaje de aplicación en cada instancia de una subscripción. Disponible si se compila con ZeroMQ 3.0 o superior (Valor: [string](#language.types.string))






      **[ZMQ::SOCKOPT_ROUTER_RAW](#zmq.constants.sockopt-router-raw)**

       Establece el modo puro ("raw") del ROUTER, cuando se establece a 1. En el modo puro, al usar el transporte tcp://, el socket leerá y escribirá sin el encuadrre de ZeroMQ.
        Disponible si se compila con ZeroMQ 4.0 o superior (Valor: [string](#language.types.string))






      **[ZMQ::SOCKOPT_IPV6](#zmq.constants.sockopt-ipv6)**

       Habilitar IPV6. Disponible si se compila con ZeroMQ 4.0 o superior (Valor: [string](#language.types.string))






      **[ZMQ::CTXOPT_MAX_SOCKETS](#zmq.constants.ctxopt-max-sockets)**

       El límite de socket para este contexto. Disponible si se compila con ZeroMQ 3.x o superior (Valor: [int](#language.types.integer))






      **[ZMQ::POLL_IN](#zmq.constants.poll-in)**

       Sondeo para datos entrantes






      **[ZMQ::POLL_OUT](#zmq.constants.poll-out)**

       Sondeo para datos salientes






      **[ZMQ::MODE_NOBLOCK](#zmq.constants.mode-noblock)**

       Operación de no espera. Obsoleta, emplee ZMQ::MODE_DONTWAIT en su lugar






      **[ZMQ::MODE_DONTWAIT](#zmq.constants.mode-dontwait)**

       Operación de no espera






      **[ZMQ::MODE_SNDMORE](#zmq.constants.mode-sndmore)**

       Enviar un mensaje multiparte






      **[ZMQ::DEVICE_FORWARDER](#zmq.constants.device-forwarder)**

       Dispositivo reenviador






      **[ZMQ::DEVICE_QUEUE](#zmq.constants.device-queue)**

       Dispositivo de cola






      **[ZMQ::DEVICE_STREAMER](#zmq.constants.device-streamer)**

       Dispositivo de flujo






      **[ZMQ::ERR_INTERNAL](#zmq.constants.err-internal)**

       Error interno de la extensión ZMQ






      **[ZMQ::ERR_EAGAIN](#zmq.constants.err-eagain)**

       Implica que la operación debería esperar esperar cuando se emplee ZMQ::MODE_DONTWAIT






      **[ZMQ::ERR_ENOTSUP](#zmq.constants.err-enotsup)**

       La operación no está soportada por el tipo de socket






      **[ZMQ::ERR_EFSM](#zmq.constants.err-efsm)**

       La operación no se pudo ejecutar debido a que el socket no está en un estado correcto






      **[ZMQ::ERR_ETERM](#zmq.constants.err-eterm)**

       El contexto ha sido finalizado





# ZMQ::\_\_construct

(PECL zmq &gt;= 0.5.0)

ZMQ::\_\_construct — El constructor de ZMQ

### Descripción

private **ZMQ::\_\_construct**()

Constructor privado para evitar la inicialización directa. Esta clase mantiene las constantes para la extensión ZMQ.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [ZMQ::\_\_construct](#zmq.construct) — El constructor de ZMQ

# La clase ZMQContext

(PECL zmq &gt;= 0.5.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **ZMQContext**

     {


    /* Métodos */

public [\_\_construct](#zmqcontext.construct)([int](#language.types.integer) $io_threads = 1, [bool](#language.types.boolean) $is_persistent = **[true](#constant.true)**)
public [getOpt](#zmqcontext.getopt)([string](#language.types.string) $key): [mixed](#language.types.mixed)
public [getSocket](#zmqcontext.getsocket)([int](#language.types.integer) $type, [string](#language.types.string) $persistent_id = **[null](#constant.null)**, [callable](#language.types.callable) $on_new_socket = **[null](#constant.null)**): [ZMQSocket](#class.zmqsocket)
public [isPersistent](#zmqcontext.ispersistent)(): [bool](#language.types.boolean)
public [setOpt](#zmqcontext.setopt)([int](#language.types.integer) $key, [mixed](#language.types.mixed) $value): [ZMQContext](#class.zmqcontext)

}

# ZMQContext::\_\_construct

(PECL zmq &gt;= 0.5.0)

ZMQContext::\_\_construct — Construir un nuevo objeto ZMQContext

### Descripción

public **ZMQContext::\_\_construct**([int](#language.types.integer) $io_threads = 1, [bool](#language.types.boolean) $is_persistent = **[true](#constant.true)**)

Construye un nuevo contexto ZMQ. Este se emplea para inicializar sockets. Se requiere una conexión persistente
para inicializar sockets persistentes.

### Parámetros

     io_threads


       Número de hilos de entrada/salida del contexto.






     is_persistent


       Si el contexto es persistente. Los contextos persistentes se almacenan
       durante múltiples peticiones, por lo que son un requisito para los sockets persistentes.





### Errores/Excepciones

Lanza una **ZMQContextException** si la inicialización del contexto falla.

### Ejemplos

    **Ejemplo #1 Un ejemplo de ZMQContext()**



     Construir un nuevo contexto y asignarle un socket de petición

&lt;?php
/_ Asignar un nuevo contexto _/
$context = new ZMQContext();

/_ Crear un nuevo socket _/
$socket = $context-&gt;getSocket(ZMQ::SOCKET_REQ, 'my sock');

/_ Conectar con el socket _/
$socket-&gt;connect("tcp://example.com:1234");

/_ Enviar una petición _/
$socket-&gt;send("Hello there");

/_ Recibir la respuesta _/
$message = $socket-&gt;recv();
?&gt;

# ZMQContext::getOpt

(PECL zmq &gt;= 1.0.4)

ZMQContext::getOpt — Obtener la opción de contexto

### Descripción

public **ZMQContext::getOpt**([string](#language.types.string) $key): [mixed](#language.types.mixed)

Devuelve el valor de una opción de contexto.

### Parámetros

     key


       Un entero que representa la opción.
       Véanse las constantes **[ZMQ::CTXOPT_*](#zmq.constants.ctxopt-max-sockets)**.





### Valores devueltos

Devuelve un [string](#language.types.string) o un [int](#language.types.integer), dependiendo de key. Lanza
una ZMQContextException en caso de error.

# ZMQContext::getSocket

(PECL zmq &gt;= 0.5.0)

ZMQContext::getSocket — Crear un nuevo socket

### Descripción

public **ZMQContext::getSocket**([int](#language.types.integer) $type, [string](#language.types.string) $persistent_id = **[null](#constant.null)**, [callable](#language.types.callable) $on_new_socket = **[null](#constant.null)**): [ZMQSocket](#class.zmqsocket)

Método rápido para crear nuevos sockets desde un contexto. Si el contexto no es persistente, el parámetro persistent_id
es ignorado y el socket se convierte en no persistente. on_new_socket solamente se invoca
cuando se crea una estructura de socket subyacente.

### Parámetros

     type


       Constante **[ZMQ::SOCKET_*](#zmq.constants.socket-pair)** para especificar el tipo de socket.






     persistent_id


       Si se especifica persistent_id, el socket será persistente durante varias peticiones.






     on_new_socket


       Función de retrollamada que es ejecutada cuando se crea una nueva estrucutra de socket. Esta función no es invocada
       si la conexión persistente subyacente es reutilizada. La retrollamada toma ZMQSocket y persistent_id como dos argumentos.





### Valores devueltos

Devuelve un objeto [ZMQSocket](#class.zmqsocket).

### Errores/Excepciones

Lanza una **ZMQSocketException** en caso de error.

### Ejemplos

    **Ejemplo #1 Un ejemplo de ZMQContext()**



     Basic usage

&lt;?php
/_ Asignar un nuevo contexto _/
$context = new ZMQContext();

/_ Crear un nuevo socket _/
$socket = $context-&gt;getSocket(ZMQ::SOCKET_REQ, 'my sock');

/_ Conectar con el socket _/
$socket-&gt;connect("tcp://example.com:1234");

/_ Enviar una petición _/
$socket-&gt;send("Hello there");

/_ Recibir la respuesta _/
$message = $socket-&gt;recv();
echo "Received message: {$message}\n";
?&gt;

# ZMQContext::isPersistent

(PECL zmq &gt;= 0.5.0)

ZMQContext::isPersistent — Indicar si el contexto es persistente

### Descripción

public **ZMQContext::isPersistent**(): [bool](#language.types.boolean)

Indica si el contexto es persistente. Un contexto persistente es necesario para conexiones persistentes,
ya que cada socket se asigna a partir de un contexto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el contexto es persistente y **[false](#constant.false)** si no lo es.

# ZMQContext::setOpt

(PECL zmq &gt;= 1.0.4)

ZMQContext::setOpt — Establecer una opción de socket

### Descripción

public **ZMQContext::setOpt**([int](#language.types.integer) $key, [mixed](#language.types.mixed) $value): [ZMQContext](#class.zmqcontext)

Establece una opción de contexto de ZMQ. El tipo del valor value depende de key.
Véanse los [Tipos de constantes de ZMQ](#zmq.constants) para más información.

### Parámetros

     key


       Una de las constantes **[ZMQ::CTXOPT_*](#zmq.constants.ctxopt-max-sockets)**.






     value


       El valor del parámetro.





### Valores devueltos

Devuelve el objeto actual. Lanza una ZMQContextException en caso de error.

## Tabla de contenidos

- [ZMQContext::\_\_construct](#zmqcontext.construct) — Construir un nuevo objeto ZMQContext
- [ZMQContext::getOpt](#zmqcontext.getopt) — Obtener la opción de contexto
- [ZMQContext::getSocket](#zmqcontext.getsocket) — Crear un nuevo socket
- [ZMQContext::isPersistent](#zmqcontext.ispersistent) — Indicar si el contexto es persistente
- [ZMQContext::setOpt](#zmqcontext.setopt) — Establecer una opción de socket

# La clase ZMQSocket

(PECL zmq &gt;= 0.5.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **ZMQSocket**

     {


    /* Métodos */

public [bind](#zmqsocket.bind)([string](#language.types.string) $dsn, [bool](#language.types.boolean) $force = **[false](#constant.false)**): [ZMQSocket](#class.zmqsocket)
public [connect](#zmqsocket.connect)([string](#language.types.string) $dsn, [bool](#language.types.boolean) $force = **[false](#constant.false)**): [ZMQSocket](#class.zmqsocket)
public [\_\_construct](#zmqsocket.construct)(
    [ZMQContext](#class.zmqcontext) $context,
    [int](#language.types.integer) $type,
    [string](#language.types.string) $persistent_id = **[null](#constant.null)**,
    [callable](#language.types.callable) $on_new_socket = **[null](#constant.null)**
)
public [disconnect](#zmqsocket.disconnect)([string](#language.types.string) $dsn): [ZMQSocket](#class.zmqsocket)
public [getEndpoints](#zmqsocket.getendpoints)(): [array](#language.types.array)
public [getPersistentId](#zmqsocket.getpersistentid)(): [string](#language.types.string)
public [getSocketType](#zmqsocket.getsockettype)(): [int](#language.types.integer)
public [getSockOpt](#zmqsocket.getsockopt)([string](#language.types.string) $key): [mixed](#language.types.mixed)
public [isPersistent](#zmqsocket.ispersistent)(): [bool](#language.types.boolean)
public [recv](#zmqsocket.recv)([int](#language.types.integer) $mode = 0): [string](#language.types.string)
public [recvMulti](#zmqsocket.recvmulti)([int](#language.types.integer) $mode = 0): [array](#language.types.array)
public [send](#zmqsocket.send)([string](#language.types.string) $message, [int](#language.types.integer) $mode = 0): [ZMQSocket](#class.zmqsocket)
public [sendmulti](#zmqsocket.sendmulti)([array](#language.types.array) $message, [int](#language.types.integer) $mode = 0): [ZMQSocket](#class.zmqsocket)
public [setSockOpt](#zmqsocket.setsockopt)([int](#language.types.integer) $key, [mixed](#language.types.mixed) $value): [ZMQSocket](#class.zmqsocket)
public [unbind](#zmqsocket.unbind)([string](#language.types.string) $dsn): [ZMQSocket](#class.zmqsocket)

}

# ZMQSocket::bind

(PECL zmq &gt;= 0.5.0)

ZMQSocket::bind — Vincular el socket

### Descripción

public **ZMQSocket::bind**([string](#language.types.string) $dsn, [bool](#language.types.boolean) $force = **[false](#constant.false)**): [ZMQSocket](#class.zmqsocket)

Vincula el socket a un extremo. El extremo está definido en formato transporte://dirección donde
transporte es uno de los siguientes: inproc, ipc, tcp, pgm o epgm.

### Parámetros

     dsn


       El DSN del vículo, por ejemplo transporte://dirección.






     force


       Intenta el vínculo incluso si elm socket ya ha sido vinculado al extremo dado.





### Valores devueltos

Devuelve el objeto actual. Lanza una ZMQSocketException en caso de error.

# ZMQSocket::connect

(PECL zmq &gt;= 0.5.0)

ZMQSocket::connect — Contectar el socket

### Descripción

public **ZMQSocket::connect**([string](#language.types.string) $dsn, [bool](#language.types.boolean) $force = **[false](#constant.false)**): [ZMQSocket](#class.zmqsocket)

Contecta el socket a un extremo remoto. El extremo está definido en formato transporte://dirección donde
transporte es uno de los siguientes: inproc, ipc, tcp, pgm o epgm.

### Parámetros

     dsn


       El DSN de la conexión, por ejemplo transporte://dirección.






     force


       Intenta la conexión incluso si elm socket ya ha sido conectado al extremo dado.





### Valores devueltos

Devuelve el objeto actual.

### Errores/Excepciones

Lanza una **ZMQSocketException** en caso de error.

### Ejemplos

    **Ejemplo #1 Un ejemplo de ZMQContext()**



     Construir un nuevo contexto y asignar un socket de petición

&lt;?php
/_ Nombre de host del servidor _/
$dsn = "tcp://127.0.0.1:5555";

/_ Crear un socket _/
$socket = new ZMQSocket(new ZMQContext(), ZMQ::SOCKET_REQ, 'my socket');

/_ Obtener una lista de los extremos conectados _/
$endpoints = $socket-&gt;getEndpoints();

/_ Comprobar si el socket está conectado _/
if (!in_array($dsn, $endpoints['connect'])) {
    echo "&lt;p&gt;Conectando a $dsn&lt;/p&gt;";
    $socket-&gt;connect($dsn);
} else {
echo "&lt;p&gt;Ya se ha contectado a $dsn&lt;/p&gt;";
}

/_ Enviar y recibir _/
$socket-&gt;send("¡Hola!");
$message = $socket-&gt;recv();

echo "&lt;p&gt;El servidor dice: {$message}&lt;/p&gt;";
?&gt;

# ZMQSocket::\_\_construct

(PECL zmq &gt;= 0.5.0)

ZMQSocket::\_\_construct — Construir un nuevo ZMQSocket

### Descripción

public **ZMQSocket::\_\_construct**(
    [ZMQContext](#class.zmqcontext) $context,
    [int](#language.types.integer) $type,
    [string](#language.types.string) $persistent_id = **[null](#constant.null)**,
    [callable](#language.types.callable) $on_new_socket = **[null](#constant.null)**
)

Construye un objeto ZMQSocket. Se puede utilizar el parámetro persistent_id para asignar un socket
persistente. Un socket persistente tiene que ser asignado desde un contexto persistente, por lo que permanece conectado durante múltiples peticiones.
Se puede emplear el parámetro persistent_id para recordar el mismo socket durante múltiples peticiones.
on_new_socket es llamado solamente cuando se crea un nueva estructura de socket subyacente.

### Parámetros

     context


       Un objeto ZMQContext.






     type


       El tipo de socket. Véanse las constantes **[ZMQ::SOCKET_*](#zmq.constants.socket-pair)**.






     persistent_id


       Si se especifica persistent_id, el socket será persistente durante múltiples peticiones.
       Si context no es persistente, el socket recurrirá al modo no persistente.






     on_new_socket


       Función de retrollamada que es ejecutada cuando se crea una nueva estrucutra de socket. Esta función no es invocada
       si la conexión persistente subyacente es reutilizada.




       callback([ZMQSocket](#class.zmqsocket) $socket, [string](#language.types.string) $persistent_id = **[null](#constant.null)**)



### Errores/Excepciones

Lanza una **ZMQSocketException** en caso de error.

### Ejemplos

    **Ejemplo #1 Un ejemplo de ZMQSocket()**



     Utilizar una callback the bind/connect socket

&lt;?php

/_
El socket es persistente, por lo que esta función es llamada solamente en la
primera petición del script.
_/
function on_new_socket_cb(ZMQSocket $socket, $persistent_id = null)
{
    if ($persistent_id === 'server') {
$socket-&gt;bind("tcp://localhost:12122");
} else {
$socket-&gt;connect("tcp://localhost:12122");
}
}

/_ Asignar un nuevo contexto _/
$context = new ZMQContext();

/_ Crear un nuevo socket _/
$socket = $context-&gt;getSocket(ZMQ::SOCKET_REP, 'server', 'on_new_socket_cb');

$message = $socket-&gt;recv();
echo "Mensaje recibido: {$message}\n";
?&gt;

# ZMQSocket::disconnect

(PECL zmq &gt;= 1.0.4)

ZMQSocket::disconnect — Desconectar un socket

### Descripción

public **ZMQSocket::disconnect**([string](#language.types.string) $dsn): [ZMQSocket](#class.zmqsocket)

Desconectar el socket de un extremo remoto conectado previamente. El extremo está definido con el formato
transporte://dirección, donde transporte es uno de los siguientes: inproc, ipc, tcp, pgm o epgm.

### Parámetros

     dsn


       El DSN de conexión, por ejemplo transporte://dirección.





### Valores devueltos

Devuelve el objeto actual. Lanza una ZMQSocketException en caso de error.

# ZMQSocket::getEndpoints

(PECL zmq &gt;= 0.5.0)

ZMQSocket::getEndpoints — Obtener una lista de los extremos

### Descripción

public **ZMQSocket::getEndpoints**(): [array](#language.types.array)

Devuelve una lista de los extremos donde el socket está conectado o vinculado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array que contiene los elementos 'bind' y 'connect'.

# ZMQSocket::getPersistentId

(PECL zmq &gt;= 0.5.0)

ZMQSocket::getPersistentId — Obtener el ID de persistencia

### Descripción

public **ZMQSocket::getPersistentId**(): [string](#language.types.string)

Devuelve el ID de persistencia del socket.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el ID de persistencia asignado al objeto, y **[null](#constant.null)** si el socket no es persistente.

# ZMQSocket::getSocketType

(PECL zmq &gt;= 0.5.0)

ZMQSocket::getSocketType — Obtener el tipo de socket

### Descripción

public **ZMQSocket::getSocketType**(): [int](#language.types.integer)

Obtiene el tipo de socket.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un número entero que representa el tipo de socket. El número entero puede ser comparado con
las constantes **[ZMQ::SOCKET\_\*](#zmq.constants.socket-pair)**

# ZMQSocket::getSockOpt

(PECL zmq &gt;= 0.5.0)

ZMQSocket::getSockOpt — Obtener la opción de un socket

### Descripción

public **ZMQSocket::getSockOpt**([string](#language.types.string) $key): [mixed](#language.types.mixed)

Devuelve el valor de la opción de un socket.

### Parámetros

     key


       Un número entero que representa la opción.
       Véanse las constantes **[ZMQ::SOCKOPT_*](#zmq.constants.sockopt-hwm)**.





### Valores devueltos

Devuelve un [string](#language.types.string) o un [int](#language.types.integer) dependiendo de key. Lanza
una ZMQSocketException en caso de error.

# ZMQSocket::isPersistent

(PECL zmq &gt;= 0.5.0)

ZMQSocket::isPersistent — Comprobrar si un socket es persistente

### Descripción

public **ZMQSocket::isPersistent**(): [bool](#language.types.boolean)

Comprueba si el socket es persistente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [bool](#language.types.boolean) basado en si el socket es persistente o no.

# ZMQSocket::recv

(PECL zmq &gt;= 0.5.0)

ZMQSocket::recv — Recibir un mensaje

### Descripción

public **ZMQSocket::recv**([int](#language.types.integer) $mode = 0): [string](#language.types.string)

Recibe un mensaje de un socket. Por defecto, la recepción quedará en espera hasta que haya disponible un mensaje, a menos
que se emplee la bandera **[ZMQ::MODE_DONTWAIT](#zmq.constants.mode-dontwait)**. Se puede emplear la opción de socket
**[ZMQ::SOCKOPT_RCVMORE](#zmq.constants.sockopt-rcvmore)** para recibir mensajes multiparte. Véase [ZMQSocket::setSockOpt()](#zmqsocket.setsockopt)
para más información.

### Parámetros

     mode


       Proporcionar banderas de modo para recibir mensajes multiparte o hacer que la operación no quede en espera.
       Véanse las constantes **[ZMQ::MODE_*](#zmq.constants.mode-noblock)**.





### Valores devueltos

Devuelve el mensaje. Si se emplea **[ZMQ::MODE_DONTWAIT](#zmq.constants.mode-dontwait)**
y la operación debería quedar en espera, se devolverá **[false](#constant.false)**.

### Errores/Excepciones

Lanza una **ZMQSocketException** en caso de error.

### Ejemplos

    **Ejemplo #1 Un ejemplo de send/recv**



     Envío / respuesta sin esperas

&lt;?php

/_ Crear un nuevo objeto cola, debe existir un servidor en el otro extremo _/
$cola = new ZMQSocket(new ZMQContext(), ZMQ::SOCKET_REQ);
$cola-&gt;connect("tcp://127.0.0.1:5555");

/_ Asginar el socket 1 a la cola, enviar y recibir _/
$reintentos = 5;
$sending = true;

/_ Iniciar y recorrer _/
do {
try {
/_ Intentar enviar / recibir _/
if ($sending) {
            echo "Enviando el mensaje\n";
            $cola-&gt;send("Este es un mensaje", ZMQ::MODE_DONTWAIT);
            $sending = false;
        } else {
            echo "Respuesta obtenida: " . $cola-&gt;recv(ZMQ::MODE_DONTWAIT) . "\n";
            break;
        }
    } catch (ZMQSocketException $e) {
        /* EAGAIN significa que la operación tendrá que esperar, reintentar */
        if ($e-&gt;getCode() === ZMQ::ERR_EAGAIN) {
echo " - EAGAIN, reintentando ($reintentos)\n";
        } else {
            die(" - Error: " . $e-&gt;getMessage());
        }
    }
    /* Dormir un poco entre operaciones */
    usleep(5);
} while (--$reintentos);
?&gt;

    Resultado del ejemplo anterior es similar a:

Enviando el mensaje

- Unable to execute operation, retrying (4)
  Respuesta obtenida: Este es un mensaje

# ZMQSocket::recvMulti

(PECL zmq &gt;= 0.8.0)

ZMQSocket::recvMulti — Recibir un mensaje multiparte

### Descripción

public **ZMQSocket::recvMulti**([int](#language.types.integer) $mode = 0): [array](#language.types.array)

Recibe un array con el mensaje multiparte de un socket. Por defecto, la recepción quedará en espera hasta que haya disponible un mensaje, a menos
que se emplee el flag **[ZMQ::MODE\_\*](#zmq.constants.mode-noblock)**.

### Parámetros

     mode


       Proporcionar banderas de modo para recibir mensajes multiparte o hacer que la operación no quede en espera.
       Véanse las constantes **[ZMQ::MODE_*](#zmq.constants.mode-*)**.





### Valores devueltos

Devuelve el array con las partes del mensaje. Lanza una ZMQSocketException en caso de error.
Si se emplea **[ZMQ::MODE_NOBLOCK](#zmq.constants.mode-noblock)** y la operación debería quedar
en espera, se devolverá el [bool](#language.types.boolean) false.

# ZMQSocket::send

(PECL zmq &gt;= 0.5.0)

ZMQSocket::send — Enviar un mensaje

### Descripción

public **ZMQSocket::send**([string](#language.types.string) $message, [int](#language.types.integer) $mode = 0): [ZMQSocket](#class.zmqsocket)

Envía un mensaje mediante el socket. La operación puede quedar en espera, a menos que se emplee **[ZMQ::MODE_NOBLOCK](#zmq.constants.mode-noblock)**.

### Parámetros

     message


       El mensaje a enviar.






     mode


       Proporcionar banderas de modo para recibir mensajes multiparte o hacer que la operación no quede en espera.
       Véanse las constantes **[ZMQ::MODE_*](#zmq.constants.mode-noblock)**.





### Valores devueltos

Devuelve el objeto actual. Lanza una ZMQSocketException en caso de error.
Si se emplea **[ZMQ::MODE_NOBLOCK](#zmq.constants.mode-noblock)** y la operación debería quedar
en espera, se devolverá el [bool](#language.types.boolean) false.

# ZMQSocket::sendmulti

(PECL zmq &gt;= 0.8.0)

ZMQSocket::sendmulti — Enviar un mensaje multiparte

### Descripción

public **ZMQSocket::sendmulti**([array](#language.types.array) $message, [int](#language.types.integer) $mode = 0): [ZMQSocket](#class.zmqsocket)

Envía un mensaje multiparte mediante el socket. La operación puede quedar en espera, a menos que se emplee **[ZMQ::MODE_NOBLOCK](#zmq.constants.mode-noblock)**.

### Parámetros

     message


       El mensaje a enviar - un array de cadenas






     mode


       Proporcional flags de modo para recibir mensajes multiparte o hacer que la operación no quede en espera.
       Véanse las constantes **[ZMQ::MODE_*](#zmq.constants.mode-noblock)**.





### Valores devueltos

Devuelve el objeto actual. Lanza una ZMQSocketException en caso de error.
Si se emplea **[ZMQ::MODE_NOBLOCK](#zmq.constants.mode-noblock)** y la operación debería quedar
en espera, se devolverá el [bool](#language.types.boolean) false.

# ZMQSocket::setSockOpt

(PECL zmq &gt;= 0.5.0)

ZMQSocket::setSockOpt — Establecer una opción de socket

### Descripción

public **ZMQSocket::setSockOpt**([int](#language.types.integer) $key, [mixed](#language.types.mixed) $value): [ZMQSocket](#class.zmqsocket)

Establece una opción de socket de ZMQ. El tipo del valor value depende de la clave key.
Véanse los [Tipos de constantes de ZMQ](#zmq.constants) para más información.

### Parámetros

     key


       Una de las constantes **[ZMQ::SOCKOPT_*](#zmq.constants.sockopt-hwm)**.






     value


       El valor del parámetro.





### Valores devueltos

Devuelve el objeto actual. Lanaza una ZMQSocketException en caso de error.

# ZMQSocket::unbind

(PECL zmq &gt;= 1.0.4)

ZMQSocket::unbind — Desvincular el socket

### Descripción

public **ZMQSocket::unbind**([string](#language.types.string) $dsn): [ZMQSocket](#class.zmqsocket)

Desvincula el socket de un extremo. El extremo está definido con el formato transporte://dirección, donde
transporte es uno de los siguientes: inproc, ipc, tcp, pgm o epgm.

### Parámetros

     dsn


       El DSN vinculado previamente, por ejemplo transporte://dirección.





### Valores devueltos

Devuelve el objeto actual. Lanaza una ZMQSocketException en caso de error.

## Tabla de contenidos

- [ZMQSocket::bind](#zmqsocket.bind) — Vincular el socket
- [ZMQSocket::connect](#zmqsocket.connect) — Contectar el socket
- [ZMQSocket::\_\_construct](#zmqsocket.construct) — Construir un nuevo ZMQSocket
- [ZMQSocket::disconnect](#zmqsocket.disconnect) — Desconectar un socket
- [ZMQSocket::getEndpoints](#zmqsocket.getendpoints) — Obtener una lista de los extremos
- [ZMQSocket::getPersistentId](#zmqsocket.getpersistentid) — Obtener el ID de persistencia
- [ZMQSocket::getSocketType](#zmqsocket.getsockettype) — Obtener el tipo de socket
- [ZMQSocket::getSockOpt](#zmqsocket.getsockopt) — Obtener la opción de un socket
- [ZMQSocket::isPersistent](#zmqsocket.ispersistent) — Comprobrar si un socket es persistente
- [ZMQSocket::recv](#zmqsocket.recv) — Recibir un mensaje
- [ZMQSocket::recvMulti](#zmqsocket.recvmulti) — Recibir un mensaje multiparte
- [ZMQSocket::send](#zmqsocket.send) — Enviar un mensaje
- [ZMQSocket::sendmulti](#zmqsocket.sendmulti) — Enviar un mensaje multiparte
- [ZMQSocket::setSockOpt](#zmqsocket.setsockopt) — Establecer una opción de socket
- [ZMQSocket::unbind](#zmqsocket.unbind) — Desvincular el socket

# La clase ZMQPoll

(PECL zmq &gt;= 0.5.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **ZMQPoll**

     {


    /* Métodos */

public [add](#zmqpoll.add)([mixed](#language.types.mixed) $entry, [int](#language.types.integer) $type): [string](#language.types.string)
public [clear](#zmqpoll.clear)(): [ZMQPoll](#class.zmqpoll)
public [count](#zmqpoll.count)(): [int](#language.types.integer)
public [getLastErrors](#zmqpoll.getlasterrors)(): [array](#language.types.array)
public [poll](#zmqpoll.poll)([array](#language.types.array) &amp;$readable, [array](#language.types.array) &amp;$writable, [int](#language.types.integer) $timeout = -1): [int](#language.types.integer)
public [remove](#zmqpoll.remove)([mixed](#language.types.mixed) $item): [bool](#language.types.boolean)

}

# ZMQPoll::add

(PECL zmq &gt;= 0.5.0)

ZMQPoll::add — Añadir un elemento al conjunto de sondeo

### Descripción

public **ZMQPoll::add**([mixed](#language.types.mixed) $entry, [int](#language.types.integer) $type): [string](#language.types.string)

Añade un nuevo elemento al conjunto de sondeo y devuelve el ID interno de dicho elemento. El elemento puede ser eliminado
del conjunto de sondeo utilizando el ID devuelto.

### Parámetros

     entry


       Un objeto ZMQSocket o un recursode de flujo de PHP






     type


       Defina la actidad para la que es sondeado el socket
       Véanse las constantes **[ZMQ::POLL_IN](#zmq.constants.poll-in)** y **[ZMQ::POLL_OUT](#zmq.constants.poll-out)**.





### Valores devueltos

Devuelve el ID del elemento añadido, el cual puede ser empleado más adelante para eliminar el elemento.
Lanza una ZMQPollException en caso de error.

# ZMQPoll::clear

(PECL zmq &gt;= 0.5.0)

ZMQPoll::clear — Limpiar el conjunto de sondeo

### Descripción

public **ZMQPoll::clear**(): [ZMQPoll](#class.zmqpoll)

Limpia todos los elementos del conjuntos de sondeo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Returns the current object.

# ZMQPoll::count

(PECL zmq &gt;= 0.5.0)

ZMQPoll::count — Contar los elementos del conjunto de sondeo

### Descripción

public **ZMQPoll::count**(): [int](#language.types.integer)

Cuenta los elementos del conjunto de sondeo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [int](#language.types.integer) que representa la cantidad de elementos del conjunto de sondeo.

# ZMQPoll::getLastErrors

(PECL zmq &gt;= 0.5.0)

ZMQPoll::getLastErrors — Obtener los errores del sondeo

### Descripción

public **ZMQPoll::getLastErrors**(): [array](#language.types.array)

Devuelve los ID de los objetos que poseen errores en el último sondeo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devueve un array que contiene los ID de los elementos que poseen errores en el último sondeo. Se devuelve un
array vacío si no hay errores.

# ZMQPoll::poll

(PECL zmq &gt;= 0.5.0)

ZMQPoll::poll — Sondear los elementos

### Descripción

public **ZMQPoll::poll**([array](#language.types.array) &amp;$readable, [array](#language.types.array) &amp;$writable, [int](#language.types.integer) $timeout = -1): [int](#language.types.integer)

Sondea los elementos en el conjunto de sondeo actual. Los elementos legibles y escribibles son devueltos en
los parámetros readable y writable respectivamente.
Se puede utilizar [ZMQPoll::getLastErrors()](#zmqpoll.getlasterrors) para comprobar si existen errores.

### Parámetros

     readable


       Un array donde se sevuelven los flujos de PHP/ZMQSockets legibles. El array
       se limpiará al inicio de la operación.






     writable


       Un array donde se sevuelven los flujos de PHP/ZMQSockets escribibles. El array
       se limpiará al inicio de la operación.






     timeout


       Tiempo de espera de la operación. -1 significa que el sondeo esperará hasta
       que al menos un elemento tenga actividad. Observe que desde la
       versión 1.0.0, el tiempo de espera del sondeo está definido en milisegundos, en lugar
       de en microsegundos.





### Valores devueltos

Devuelve un número entero que representa la cantidad de elementos con actividad.

### Errores/Excepciones

Lanza una **ZMQPollException** en caso de error.

### Ejemplos

    **Ejemplo #1 Un ejemplo de ZMQPoll()**



     Crear un servidor de sondeos sencillo

&lt;?php

/_ Crear un socket, patrón de petición-respuesta (socket de respuesta) _/
$context = new ZMQContext();
$server = $context-&gt;getSocket(ZMQ::SOCKET_REP);

/_ Vincular al puerta 5555 en 127.0.0.1 _/
$server-&gt;bind("tcp://127.0.0.1:5555");

/_ Crear un conjunto de sondeo nuevo para mensajes entrantes/salientes _/
$poll = new ZMQPoll();

/_ Añadir el objeto y escuchar la entrada/salida del sondeo _/
$id = $poll-&gt;add($server, ZMQ::POLL_IN | ZMQ::POLL_OUT);
echo "Se añaió el objeto con id " . $id . "\n";

/_ Inicializar los arrays readable y writable _/
$readable = array();
$writable = array();

while (true) {
/_ Cantidad de eventos recuperados _/
$events = 0;

try {
/_ Sondear hasta que haya algo que hacer _/
$events = $poll-&gt;poll($readable, $writable, -1);
$errors = $poll-&gt;getLastErrors();

       if (count($errors) &gt; 0) {
           foreach ($errors as $error) {
               echo "Error al sondear el objeto " . $error . "\n";
           }
       }

} catch (ZMQPollException $e) {
echo "Fallón el sondeo: " . $e-&gt;getMessage() . "\n";
}

if ($events &gt; 0) {
       /* Recorrer los objetos legibles y los mensajes recibidos */
       foreach ($readable as $r) {
try {
echo "Mensaje recibido: " . $r-&gt;recv() . "\n";
} catch (ZMQException $e) {
echo "Falló la recepción: " . $e-&gt;getMessage() . "\n";
}
}

       /* Recorrer los objetos escribibles y enviar de vuelta los mensajes */
       foreach ($writable as $w) {
           try {
               $w-&gt;send("Got it!");
           } catch (ZMQException $e) {
               echo "Falló el envío: " . $e-&gt;getMessage() . "\n";
           }
       }

}
}
?&gt;

# ZMQPoll::remove

(PECL zmq &gt;= 0.5.0)

ZMQPoll::remove — Eliminar un elemento del conjunto de sondeo

### Descripción

public **ZMQPoll::remove**([mixed](#language.types.mixed) $item): [bool](#language.types.boolean)

Elimina un elemento del conjunto de sondeo. El parámetro item puede ser un objeto ZMQSocket,
un recurso de flujo o el ID devuelto por el método [ZMQPoll::add()](#zmqpoll.add).

### Parámetros

     item


       El objeto ZMQSocket, flujo de PHP o [string](#language.types.string) con el ID del elemento.





### Valores devueltos

Devuelve true si el objeto se eliminó y false si el objeto
con el ID dado no existe en el conjunto de sondeo.

## Tabla de contenidos

- [ZMQPoll::add](#zmqpoll.add) — Añadir un elemento al conjunto de sondeo
- [ZMQPoll::clear](#zmqpoll.clear) — Limpiar el conjunto de sondeo
- [ZMQPoll::count](#zmqpoll.count) — Contar los elementos del conjunto de sondeo
- [ZMQPoll::getLastErrors](#zmqpoll.getlasterrors) — Obtener los errores del sondeo
- [ZMQPoll::poll](#zmqpoll.poll) — Sondear los elementos
- [ZMQPoll::remove](#zmqpoll.remove) — Eliminar un elemento del conjunto de sondeo

# La clase ZMQDevice

(PECL zmq &gt;= 0.5.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **ZMQDevice**

     {


    /* Métodos */

public [\_\_construct](#zmqdevice.construct)([ZMQSocket](#class.zmqsocket) $frontend, [ZMQSocket](#class.zmqsocket) $backend, [ZMQSocket](#class.zmqsocket) $listener = ?)
public [getIdleTimeout](#zmqdevice.getidletimeout)(): [ZMQDevice](#class.zmqdevice)
public [getTimerTimeout](#zmqdevice.gettimertimeout)(): [ZMQDevice](#class.zmqdevice)
public [run](#zmqdevice.run)(): [void](language.types.void.html)
public [setIdleCallback](#zmqdevice.setidlecallback)([callable](#language.types.callable) $cb_func, [int](#language.types.integer) $timeout, [mixed](#language.types.mixed) $user_data = ?): [ZMQDevice](#class.zmqdevice)
public [setIdleTimeout](#zmqdevice.setidletimeout)([int](#language.types.integer) $timeout): [ZMQDevice](#class.zmqdevice)
public [setTimerCallback](#zmqdevice.settimercallback)([callable](#language.types.callable) $cb_func, [int](#language.types.integer) $timeout, [mixed](#language.types.mixed) $user_data = ?): [ZMQDevice](#class.zmqdevice)
public [setTimerTimeout](#zmqdevice.settimertimeout)([int](#language.types.integer) $timeout): [ZMQDevice](#class.zmqdevice)

}

# ZMQDevice::\_\_construct

(PECL zmq &gt;= 0.5.0)

ZMQDevice::\_\_construct — Construir un nuevo dispositivo

### Descripción

public **ZMQDevice::\_\_construct**([ZMQSocket](#class.zmqsocket) $frontend, [ZMQSocket](#class.zmqsocket) $backend, [ZMQSocket](#class.zmqsocket) $listener = ?)

"Los dispositivos de ØMQ pueden hacer de intermediarios de direcciones, servicios, colas o cualquier abstracción que se defina sobre las capas de mensaje y socket." -- zguide

### Parámetros

    frontend


      Parámetro "frontend" para los dispositivos. Normalmente donde llegan
      los mensajes.






    backend


      Parámetro "backend" para los dispositivos. Normalmente donde van
      los mensajes.






    listener


      Socket escuchador, el cual recibe una copia de todos los mensajes en ambas direcciones.
      El tipo de este socket debería ser SUB, PULL o DEALER.


### Valores devueltos

Una llamada a este método preparará el dispositivo. Normalmente, los dispositivos son procesos de
larga ejecución, por lo que no se recomienda la ejecución de este método desde un script interactivo. Este
método lanza una ZMQDeviceException si el dispositivo no puede iniciarse.

# ZMQDevice::getIdleTimeout

(No version information available, might only be in Git)

ZMQDevice::getIdleTimeout — Obtener el tiempo de espera de inactividad

### Descripción

public **ZMQDevice::getIdleTimeout**(): [ZMQDevice](#class.zmqdevice)

Obtiene el valor del tiempo de espera para la retrollamada de inactividad. Añadido en la versión 1.1.0 de la extensión ZMQ.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Este método devuelve el valor del tiempo de espera de la retrollamada del temporizador.

# ZMQDevice::getTimerTimeout

(No version information available, might only be in Git)

ZMQDevice::getTimerTimeout — Obtener el tiempo de espera del temporizador

### Descripción

public **ZMQDevice::getTimerTimeout**(): [ZMQDevice](#class.zmqdevice)

Obtiene el valor del tiempo de espera para la retrollamada del temporizador. Añadido en la versión 1.1.0 de la extensión ZMQ.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Este método devuelve el valor del tiempo de espera del temporizador.

# ZMQDevice::run

(No version information available, might only be in Git)

ZMQDevice::run — Ejecutar el nuevo dispositivo

### Descripción

public **ZMQDevice::run**(): [void](language.types.void.html)

Ejecuta el dispositivo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una llamada a este método hará que quede en espera hasta que el dispositivo esté en ejecución. No se recomienda
que los dispositivos se utilicen desde script interactivos. En caso de fallo, este método lanzará una
ZMQDeviceException.

# ZMQDevice::setIdleCallback

(No version information available, might only be in Git)

ZMQDevice::setIdleCallback — Establecer la función de retrollamada de inactividad

### Descripción

public **ZMQDevice::setIdleCallback**([callable](#language.types.callable) $cb_func, [int](#language.types.integer) $timeout, [mixed](#language.types.mixed) $user_data = ?): [ZMQDevice](#class.zmqdevice)

Sets the idle callback function. If idle timeout is defined the idle callback function
shall be called if the internal poll loop times out without events. If the callback function
returns false or a value that evaluates to false the device is stopped.

The callback function signature is callback (mixed $user_data).

Establece la función de retrollamada de inactividad. Si el tiempo de espera está definido, la función de retrollamada de inactividad
será invocada si el bucle de sondeo interno expira sin eventos. Si la función de retrollamada
devuelve false o un valor que se evalúa como false, el dispositivo se detendrá.

La firma de la función de retrollamada es callback (mixed $datos_usuario).

### Parámetros

    cb_func


      Función de retrollamada a invocar cuando el dispositivo está inactivo. La devolución de false
      o de un valor que se evalú como false por parte de esta función causará la detención
      del dispositivo.






    timeout


      Frecuencia con la que se invoca la retrollamada de inactividad en milisegundos. La retrollamada de inactividad se invoca
      periódicamente cuando no hay actividad en el dispositivo.
      El valor del tiempo de espera garantiza que haya al menos dicha cantidad de milisegundos entre
      invocaciones a la función de retrollamada.






    user_data


      Datos adcionales a pasar a la función de retrollamada.


### Valores devueltos

En caso de éxito, este método devuelve el objeto actual.

# ZMQDevice::setIdleTimeout

(No version information available, might only be in Git)

ZMQDevice::setIdleTimeout — Establecer el tiempo de espera para la inactividad

### Descripción

public **ZMQDevice::setIdleTimeout**([int](#language.types.integer) $timeout): [ZMQDevice](#class.zmqdevice)

Establece el valor del tiempo de espera de la retrollamada de inactividad. La retrollamada de inactividad se invoca periódicamente invoked cuando el dispositivo está
inactivo.

### Parámetros

    timeout


      El valor del tiempo de espera de la retrollamada de inactividad.


### Valores devueltos

En caso de éxito, este método devuelve el objeto actual.

# ZMQDevice::setTimerCallback

(No version information available, might only be in Git)

ZMQDevice::setTimerCallback — Establecer la función de retrollamada del temporizador

### Descripción

public **ZMQDevice::setTimerCallback**([callable](#language.types.callable) $cb_func, [int](#language.types.integer) $timeout, [mixed](#language.types.mixed) $user_data = ?): [ZMQDevice](#class.zmqdevice)

Establece la función de retrollamada del temporizador. La retrollamada del temporizador será invocada después de haber
pasado el tiempo de espera. La diferencia entre las retrollamadas de inactividad y del temporizador es que la de inactividad
es invocada solamente cuando el dispositivo está inactivo.

La firma de la función de retrollamada es callback (mixed $datos_usuario). Se añadió en la verisón 1.1.0 de la extensión ZMQ.

### Parámetros

    cb_func


      Función de retrollamada a invocar cuando el dispositivo está inactivo. La devolución de false
      o de un valor que se evalú como false por parte de esta función causará la detención
      del dispositivo.






    timeout


      Frecuencia con la que se invoca la retrollamada de inactividad en milisegundos. La retrollamada de inactividad se invoca
      periódicamente cuando no hay actividad en el dispositivo.
      El valor del tiempo de espera garantiza que haya al menos dicha cantidad de milisegundos entre
      invocaciones a la función de retrollamada.






    user_data


      Datos adcionales a pasar a la función de retrollamada.


### Valores devueltos

En caso de éxito, este método devuelve el objeto actual.

# ZMQDevice::setTimerTimeout

(No version information available, might only be in Git)

ZMQDevice::setTimerTimeout — Establecer el tiempo de espera del temporizador

### Descripción

public **ZMQDevice::setTimerTimeout**([int](#language.types.integer) $timeout): [ZMQDevice](#class.zmqdevice)

Establece el valor de tiempo de espera de la retrollamada del temporizador. La retrollamada del temporizador se invoca periódicamente si está establecida.
Se añadion en la versión 1.1.0 de la extensión ZMQ.

### Parámetros

    timeout


      El valor del tiempo de espera de la retrollamada del temporizador.


### Valores devueltos

En caso de éxito, este método devuelve el objeto actual.

## Tabla de contenidos

- [ZMQDevice::\_\_construct](#zmqdevice.construct) — Construir un nuevo dispositivo
- [ZMQDevice::getIdleTimeout](#zmqdevice.getidletimeout) — Obtener el tiempo de espera de inactividad
- [ZMQDevice::getTimerTimeout](#zmqdevice.gettimertimeout) — Obtener el tiempo de espera del temporizador
- [ZMQDevice::run](#zmqdevice.run) — Ejecutar el nuevo dispositivo
- [ZMQDevice::setIdleCallback](#zmqdevice.setidlecallback) — Establecer la función de retrollamada de inactividad
- [ZMQDevice::setIdleTimeout](#zmqdevice.setidletimeout) — Establecer el tiempo de espera para la inactividad
- [ZMQDevice::setTimerCallback](#zmqdevice.settimercallback) — Establecer la función de retrollamada del temporizador
- [ZMQDevice::setTimerTimeout](#zmqdevice.settimertimeout) — Establecer el tiempo de espera del temporizador

- [Introducción](#intro.zmq)
- [Instalación/Configuración](#zmq.setup)<li>[Requerimientos](#zmq.requirements)
- [Instalación](#zmq.installation)
  </li>- [ZMQ](#class.zmq) — La clase ZMQ<li>[ZMQ::__construct](#zmq.construct) — El constructor de ZMQ
  </li>- [ZMQContext](#class.zmqcontext) — La clase ZMQContext<li>[ZMQContext::__construct](#zmqcontext.construct) — Construir un nuevo objeto ZMQContext
- [ZMQContext::getOpt](#zmqcontext.getopt) — Obtener la opción de contexto
- [ZMQContext::getSocket](#zmqcontext.getsocket) — Crear un nuevo socket
- [ZMQContext::isPersistent](#zmqcontext.ispersistent) — Indicar si el contexto es persistente
- [ZMQContext::setOpt](#zmqcontext.setopt) — Establecer una opción de socket
  </li>- [ZMQSocket](#class.zmqsocket) — La clase ZMQSocket<li>[ZMQSocket::bind](#zmqsocket.bind) — Vincular el socket
- [ZMQSocket::connect](#zmqsocket.connect) — Contectar el socket
- [ZMQSocket::\_\_construct](#zmqsocket.construct) — Construir un nuevo ZMQSocket
- [ZMQSocket::disconnect](#zmqsocket.disconnect) — Desconectar un socket
- [ZMQSocket::getEndpoints](#zmqsocket.getendpoints) — Obtener una lista de los extremos
- [ZMQSocket::getPersistentId](#zmqsocket.getpersistentid) — Obtener el ID de persistencia
- [ZMQSocket::getSocketType](#zmqsocket.getsockettype) — Obtener el tipo de socket
- [ZMQSocket::getSockOpt](#zmqsocket.getsockopt) — Obtener la opción de un socket
- [ZMQSocket::isPersistent](#zmqsocket.ispersistent) — Comprobrar si un socket es persistente
- [ZMQSocket::recv](#zmqsocket.recv) — Recibir un mensaje
- [ZMQSocket::recvMulti](#zmqsocket.recvmulti) — Recibir un mensaje multiparte
- [ZMQSocket::send](#zmqsocket.send) — Enviar un mensaje
- [ZMQSocket::sendmulti](#zmqsocket.sendmulti) — Enviar un mensaje multiparte
- [ZMQSocket::setSockOpt](#zmqsocket.setsockopt) — Establecer una opción de socket
- [ZMQSocket::unbind](#zmqsocket.unbind) — Desvincular el socket
  </li>- [ZMQPoll](#class.zmqpoll) — La clase ZMQPoll<li>[ZMQPoll::add](#zmqpoll.add) — Añadir un elemento al conjunto de sondeo
- [ZMQPoll::clear](#zmqpoll.clear) — Limpiar el conjunto de sondeo
- [ZMQPoll::count](#zmqpoll.count) — Contar los elementos del conjunto de sondeo
- [ZMQPoll::getLastErrors](#zmqpoll.getlasterrors) — Obtener los errores del sondeo
- [ZMQPoll::poll](#zmqpoll.poll) — Sondear los elementos
- [ZMQPoll::remove](#zmqpoll.remove) — Eliminar un elemento del conjunto de sondeo
  </li>- [ZMQDevice](#class.zmqdevice) — La clase ZMQDevice<li>[ZMQDevice::__construct](#zmqdevice.construct) — Construir un nuevo dispositivo
- [ZMQDevice::getIdleTimeout](#zmqdevice.getidletimeout) — Obtener el tiempo de espera de inactividad
- [ZMQDevice::getTimerTimeout](#zmqdevice.gettimertimeout) — Obtener el tiempo de espera del temporizador
- [ZMQDevice::run](#zmqdevice.run) — Ejecutar el nuevo dispositivo
- [ZMQDevice::setIdleCallback](#zmqdevice.setidlecallback) — Establecer la función de retrollamada de inactividad
- [ZMQDevice::setIdleTimeout](#zmqdevice.setidletimeout) — Establecer el tiempo de espera para la inactividad
- [ZMQDevice::setTimerCallback](#zmqdevice.settimercallback) — Establecer la función de retrollamada del temporizador
- [ZMQDevice::setTimerTimeout](#zmqdevice.settimertimeout) — Establecer el tiempo de espera del temporizador
  </li>
