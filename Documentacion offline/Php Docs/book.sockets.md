# Sockets

# Introducción

La extensión socket implementa una interfaz de bajo nivel con las funciones
de comunicación por socket, basadas en los sockets BSD tan populares,
y proporciona la posibilidad de funcionar tanto como cliente
como servidor.

    Para una interfaz de socket cliente más genérica, véase
    [stream_socket_client()](#function.stream-socket-client),
    [stream_socket_server()](#function.stream-socket-server),
    [fsockopen()](#function.fsockopen) y
    [pfsockopen()](#function.pfsockopen).

Al utilizar estas funciones, es importante recordar que si muchas de ellas
tienen el mismo nombre que sus equivalentes en lenguaje C, suelen tener
declaraciones diferentes. Léanse atentamente las descripciones para evitar
confusiones.

Dicho esto, quienes no estén familiarizados con la programación por socket
pueden encontrar mucha documentación en las páginas de manual Unix
apropiadas, y existe una gran cantidad de introducciones en lenguaje C
en la web, que pueden ser fácilmente reutilizadas, con adaptaciones menores.
[» UNIX Socket FAQ](http://www.unixguide.net/network/socketfaq/) es un buen punto de partida.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#sockets.installation)
- [Tipos de recursos](#sockets.resources)

## Instalación

Las funciones de socket descritas aquí son parte de una extensión de
PHP que debe ser habilitada en tiempo de compilación dando la opción
**--enable-sockets** a
**configure**.

## Tipos de recursos

Anterior a PHP 8.0.0,
[socket_accept()](#function.socket-accept), [socket_import_stream()](#function.socket-import-stream),
[socket_addrinfo_connect()](#function.socket-addrinfo-connect), [socket_addrinfo_bind()](#function.socket-addrinfo-bind),
[socket_create_listen()](#function.socket-create-listen), [socket_wsaprotocol_info_import()](#function.socket-wsaprotocol-info-import) y
[socket_create()](#function.socket-create) retornaban recursos Socket.

Anterior a PHP 8.0.0,
[socket_addrinfo_lookup()](#function.socket-addrinfo-lookup) retornaba un array de recursos AddressInfo.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[AF_UNIX](#constant.af-unix)**
    ([int](#language.types.integer))



     Familia de direcciones de socket de rutas de archivos del sistema en el Dominio Unix.





    **[AF_INET](#constant.af-inet)**
    ([int](#language.types.integer))



     Familia de direcciones de socket de IPv4 en el Dominio de Internet.





    **[AF_INET6](#constant.af-inet6)**
    ([int](#language.types.integer))



     Familia de direcciones de socket de IPv6 en el Dominio de Internet. Solo disponible si se compila con soporte para
     IPv6.





    **[AF_DIVERT](#constant.af-divert)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo FreeBSD)





    **[SOCK_STREAM](#constant.sock-stream)**
    ([int](#language.types.integer))









    **[SOCK_DGRAM](#constant.sock-dgram)**
    ([int](#language.types.integer))









    **[SOCK_RAW](#constant.sock-raw)**
    ([int](#language.types.integer))









    **[SOCK_SEQPACKET](#constant.sock-seqpacket)**
    ([int](#language.types.integer))









    **[SOCK_RDM](#constant.sock-rdm)**
    ([int](#language.types.integer))









    **[SOCK_CONN_DGRAM](#constant.sock-conn-dgram)**
    ([int](#language.types.integer))



     Establece el socket como un datagrama orientado a conexión.
     Disponible a partir de PHP 8.4.0. (solo NetBSD)





    **[SOCK_DCCP](#constant.sock-dccp)**
    ([int](#language.types.integer))



     Establece el socket como un protocolo de control de congestión de datagramas.
     Disponible a partir de PHP 8.4.0. (solo NetBSD)





    **[SOCK_NONBLOCK](#constant.sock-nonblock)**
    ([int](#language.types.integer))



     Establece la bandera de estado de socket no bloqueante.
     Disponible a partir de PHP 8.4.0.





    **[SOCK_CLOEXEC](#constant.sock-cloexec)**
    ([int](#language.types.integer))



     Establece la bandera de estado de socket close-on-exec.
     Disponible a partir de PHP 8.4.0.





    **[MSG_OOB](#constant.msg-oob)**
    ([int](#language.types.integer))









    **[MSG_WAITALL](#constant.msg-waitall)**
    ([int](#language.types.integer))









    **[MSG_PEEK](#constant.msg-peek)**
    ([int](#language.types.integer))









    **[MSG_DONTROUTE](#constant.msg-dontroute)**
    ([int](#language.types.integer))









    **[MSG_EOR](#constant.msg-eor)**
    ([int](#language.types.integer))



     No disponible en plataformas Windows.





    **[MSG_EOF](#constant.msg-eof)**
    ([int](#language.types.integer))



     No disponible en plataformas Windows.





    **[MSG_ZEROCOPY](#constant.msg-zerocopy)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SO_DEBUG](#constant.so-debug)**
    ([int](#language.types.integer))









    **[SO_REUSEADDR](#constant.so-reuseaddr)**
    ([int](#language.types.integer))









    **[SO_REUSEPORT](#constant.so-reuseport)**
    ([int](#language.types.integer))



     Esta constante solo está disponible en plataformas que
     soportan la opción de socket **[SO_REUSEPORT](#constant.so-reuseport)**: esto
     incluye Linux, macOS y *BSD, pero no incluye Windows.





    **[SO_KEEPALIVE](#constant.so-keepalive)**
    ([int](#language.types.integer))









    **[SO_DONTROUTE](#constant.so-dontroute)**
    ([int](#language.types.integer))









    **[SO_LINGER](#constant.so-linger)**
    ([int](#language.types.integer))









    **[SO_BROADCAST](#constant.so-broadcast)**
    ([int](#language.types.integer))









    **[SO_OOBINLINE](#constant.so-oobinline)**
    ([int](#language.types.integer))









    **[SO_SNDBUF](#constant.so-sndbuf)**
    ([int](#language.types.integer))









    **[SO_RCVBUF](#constant.so-rcvbuf)**
    ([int](#language.types.integer))









    **[SO_SNDLOWAT](#constant.so-sndlowat)**
    ([int](#language.types.integer))









    **[SO_RCVLOWAT](#constant.so-rcvlowat)**
    ([int](#language.types.integer))









    **[SO_SNDTIMEO](#constant.so-sndtimeo)**
    ([int](#language.types.integer))









    **[SO_RCVTIMEO](#constant.so-rcvtimeo)**
    ([int](#language.types.integer))









    **[SO_TYPE](#constant.so-type)**
    ([int](#language.types.integer))









    **[SO_ERROR](#constant.so-error)**
    ([int](#language.types.integer))









    **[SO_ZEROCOPY](#constant.so-zerocopy)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[TCP_NODELAY](#constant.tcp-nodelay)**
    ([int](#language.types.integer))



     Usado para deshabilitar el algoritmo TCP de Nagle.





    **[TCP_KEEPCNT](#constant.tcp-keepcnt)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[TCP_KEEPIDLE](#constant.tcp-keepidle)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[TCP_KEEPINTVL](#constant.tcp-keepintvl)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[TCP_KEEPALIVE](#constant.tcp-keepalive)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[TCP_NOTSENT_LOWAT](#constant.tcp-notsent-lowat)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SO_MARK](#constant.so-mark)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.1.0





    **[SO_USER_COOKIE](#constant.so-user-cookie)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.1.0





    **[SO_RTABLE](#constant.so-rtable)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SO_ACCEPTFILTER](#constant.so-acceptfilter)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.1.0





    **[SO_DONTTRUNC](#constant.so-donttrunc)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.1.0





    **[SO_WANTMORE](#constant.so-wantmore)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.1.0





    **[SO_INCOMING_CPU](#constant.so-incoming-cpu)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SO_MEMINFO](#constant.so-meminfo)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SO_BPF_EXTENSIONS](#constant.so-bpf-extensions)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SO_SETFIB](#constant.so-setfib)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SO_ATTACH_REUSEPORT_CBPF](#constant.so-attach-reuseport-cbpf)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo Linux)





    **[SO_DETACH_BPF](#constant.so-detach-bpf)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo Linux)





    **[SO_DETACH_FILTER](#constant.so-detach-filter)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo Linux)





    **[SO_RERROR](#constant.so-rerror)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo NetBSD)





    **[SO_ZEROIZE](#constant.so-zeroize)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo OpenBSD)





    **[SO_SPLICE](#constant.so-splice)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo OpenBSD)





    **[SO_REUSEPORT_LB](#constant.so-reuseport-lb)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo FreeBSD)





    **[SOL_FILTER](#constant.sol-filter)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SOL_UDPLITE](#constant.sol-udplite)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0





    **[UDPLITE_RECV_CSCOV](#constant.udplite-recv-cscov)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0





    **[UDPLITE_SEND_CSCOV](#constant.udplite-send-cscov)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0





    **[TCP_DEFER_ACCEPT](#constant.tcp-defer-accept)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.1.0





    **[TCP_CONGESTION](#constant.tcp-congestion)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[TCP_QUICKACK](#constant.tcp-quickack)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo Linux)





    **[TCP_REPAIR](#constant.tcp-repair)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo Linux)





    **[TCP_SYNCNT](#constant.tcp-syncnt)**
    ([int](#language.types.integer))



     Establece el número de retransmisiones SYN que TCP debe enviar
     antes de abortar el intento de conexión.
     Disponible a partir de PHP 8.4.0 (solo Linux)





    **[IP_DONTFRAG](#constant.ip-dontfrag)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo FreeBSD)





    **[IP_MTU_DISCOVER](#constant.ip-mtu-discover)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo Linux)





    **[IP_PMTUDISC_DO](#constant.ip-pmtudisc-do)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo Linux)





    **[IP_PMTUDISC_DONT](#constant.ip-pmtudisc-dont)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo Linux)





    **[IP_PMTUDISC_WANT](#constant.ip-pmtudisc-want)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo Linux)





    **[IP_PMTUDISC_PROBE](#constant.ip-pmtudisc-probe)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo Linux)





    **[IP_PMTUDISC_INTERFACE](#constant.ip-pmtudisc-interface)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo Linux)





    **[IP_PMTUDISC_OMIT](#constant.ip-pmtudisc-omit)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo Linux)





    **[IP_BIND_ADDRESS_NO_PORT](#constant.ip-bind-address-no-port)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 (solo Linux)





    **[SOL_SOCKET](#constant.sol-socket)**
    ([int](#language.types.integer))









    **[PHP_NORMAL_READ](#constant.php-normal-read)**
    ([int](#language.types.integer))









    **[PHP_BINARY_READ](#constant.php-binary-read)**
    ([int](#language.types.integer))









    **[SOL_TCP](#constant.sol-tcp)**
    ([int](#language.types.integer))









    **[SOL_UDP](#constant.sol-udp)**
    ([int](#language.types.integer))

Las siguientes constantes están definidas bajo plataformas Windows y UNIX-like.
Cada constante solo está definida si su equivalente está disponible en la plataforma.

    **[SOCKET_EINTR](#constant.socket-eintr)**
    ([int](#language.types.integer))



     Llamada al sistema interrumpida.





    **[SOCKET_EBADF](#constant.socket-ebadf)**
    ([int](#language.types.integer))



     Número de descriptor de archivo inválido.





    **[SOCKET_EACCES](#constant.socket-eacces)**
    ([int](#language.types.integer))



     Permiso denegado.





    **[SOCKET_EFAULT](#constant.socket-efault)**
    ([int](#language.types.integer))



     Dirección inválida.





    **[SOCKET_EINVAL](#constant.socket-einval)**
    ([int](#language.types.integer))



     Argumento inválido.





    **[SOCKET_EMFILE](#constant.socket-emfile)**
    ([int](#language.types.integer))



     Demasiados archivos abiertos.





    **[SOCKET_ENAMETOOLONG](#constant.socket-enametoolong)**
    ([int](#language.types.integer))



     Nombre de archivo demasiado largo.





    **[SOCKET_ENOTEMPTY](#constant.socket-enotempty)**
    ([int](#language.types.integer))



     Directorio no vacío.





    **[SOCKET_ELOOP](#constant.socket-eloop)**
    ([int](#language.types.integer))



     Demasiados enlaces simbólicos encontrados.





    **[SOCKET_EWOULDBLOCK](#constant.socket-ewouldblock)**
    ([int](#language.types.integer))



     La operación bloquearía.





    **[SOCKET_EREMOTE](#constant.socket-eremote)**
    ([int](#language.types.integer))



     El objeto es remoto.





    **[SOCKET_EUSERS](#constant.socket-eusers)**
    ([int](#language.types.integer))



     Demasiados usuarios.





    **[SOCKET_ENOTSOCK](#constant.socket-enotsock)**
    ([int](#language.types.integer))



     Operación de socket en un no-socket.





    **[SOCKET_EDESTADDRREQ](#constant.socket-edestaddrreq)**
    ([int](#language.types.integer))



     Dirección de destino requerida.





    **[SOCKET_EMSGSIZE](#constant.socket-emsgsize)**
    ([int](#language.types.integer))



     Mensaje demasiado largo.





    **[SOCKET_EPROTOTYPE](#constant.socket-eprototype)**
    ([int](#language.types.integer))



     Tipo de protocolo incorrecto para el socket.





    **[SOCKET_EPROTONOSUPPORT](#constant.socket-eprotonosupport)**
    ([int](#language.types.integer))



     Protocolo no soportado.





    **[SOCKET_ESOCKTNOSUPPORT](#constant.socket-esocktnosupport)**
    ([int](#language.types.integer))



     Tipo de socket no soportado.





    **[SOCKET_EOPNOTSUPP](#constant.socket-eopnotsupp)**
    ([int](#language.types.integer))



     Operación no soportada en el punto final de transporte.





    **[SOCKET_EPFNOSUPPORT](#constant.socket-epfnosupport)**
    ([int](#language.types.integer))



     Familia de protocolos no soportada.





    **[SOCKET_EAFNOSUPPORT](#constant.socket-eafnosupport)**
    ([int](#language.types.integer))



     Familia de direcciones no soportada por el protocolo.





    **[SOCKET_EADDRNOTAVAIL](#constant.socket-eaddrnotavail)**
    ([int](#language.types.integer))



     No se puede asignar la dirección solicitada.





    **[SOCKET_ENETDOWN](#constant.socket-enetdown)**
    ([int](#language.types.integer))



     La red está inactiva.





    **[SOCKET_ENETUNREACH](#constant.socket-enetunreach)**
    ([int](#language.types.integer))



     La red no es accesible.





    **[SOCKET_ENETRESET](#constant.socket-enetreset)**
    ([int](#language.types.integer))



     La red interrumpió la conexión debido a un reinicio.





    **[SOCKET_ECONNABORTED](#constant.socket-econnaborted)**
    ([int](#language.types.integer))



     El software causó el aborto de la conexión.





    **[SOCKET_ECONNRESET](#constant.socket-econnreset)**
    ([int](#language.types.integer))



     La conexión fue reiniciada por el otro extremo.





    **[SOCKET_ENOBUFS](#constant.socket-enobufs)**
    ([int](#language.types.integer))



     No hay espacio en el búfer disponible.





    **[SOCKET_EISCONN](#constant.socket-eisconn)**
    ([int](#language.types.integer))



     El punto final de transporte ya está conectado.





    **[SOCKET_ENOTCONN](#constant.socket-enotconn)**
    ([int](#language.types.integer))



     El punto final de transporte no está conectado.





    **[SOCKET_ESHUTDOWN](#constant.socket-eshutdown)**
    ([int](#language.types.integer))



     No se puede enviar después del cierre del punto final de transporte.





    **[SOCKET_ETIMEDOUT](#constant.socket-etimedout)**
    ([int](#language.types.integer))



     La conexión expiró.





    **[SOCKET_ECONNREFUSED](#constant.socket-econnrefused)**
    ([int](#language.types.integer))



     La conexión fue rechazada.





    **[SOCKET_EHOSTDOWN](#constant.socket-ehostdown)**
    ([int](#language.types.integer))



     El host está inactivo.





    **[SOCKET_EHOSTUNREACH](#constant.socket-ehostunreach)**
    ([int](#language.types.integer))



     No hay ruta al host.





    **[SOCKET_EALREADY](#constant.socket-ealready)**
    ([int](#language.types.integer))



     La operación ya está en progreso.





    **[SOCKET_EINPROGRESS](#constant.socket-einprogress)**
    ([int](#language.types.integer))



     La red no está disponible.

Las constantes siguientes solo están disponibles en Windows.

    **[SOCKET_ENOPROTOOPT](#constant.socket-enoprotoopt)**
    ([int](#language.types.integer))











    **[SOCKET_EADDRINUSE](#constant.socket-eaddrinuse)**
    ([int](#language.types.integer))











    **[SOCKET_ETOOMYREFS](#constant.socket-etoomyrefs)**
    ([int](#language.types.integer))











    **[SOCKET_EPROCLIM](#constant.socket-eproclim)**
    ([int](#language.types.integer))










    **[SOCKET_EDUOT](#constant.socket-eduot)**
    ([int](#language.types.integer))









    **[SOCKET_ESTALE](#constant.socket-estale)**
    ([int](#language.types.integer))










    **[SOCKET_EDISCON](#constant.socket-ediscon)**
    ([int](#language.types.integer))









    **[SOCKET_SYSNOTREADY](#constant.socket-sysnotready)**
    ([int](#language.types.integer))









    **[SOCKET_VERNOTSUPPORTED](#constant.socket-vernotsupported)**
    ([int](#language.types.integer))









    **[SOCKET_NOTINITIALISED](#constant.socket-notinitialised)**
    ([int](#language.types.integer))









    **[SOCKET_HOST_NOT_FOUND](#constant.socket-host-not-found)**
    ([int](#language.types.integer))









    **[SOCKET_TRY_AGAIN](#constant.socket-try-again)**
    ([int](#language.types.integer))









    **[SOCKET_NO_RECOVERY](#constant.socket-no-recovery)**
    ([int](#language.types.integer))









    **[SOCKET_NO_DATA](#constant.socket-no-data)**
    ([int](#language.types.integer))









    **[SOCKET_NO_ADDRESS](#constant.socket-no-address)**
    ([int](#language.types.integer))

Las siguientes constantes solo están disponibles en plataformas similares a UNIX.
Cada constante solo está definida si su equivalente está disponible en la plataforma.

    **[SOCKET_EPERM](#constant.socket-eperm)**
    ([int](#language.types.integer))



     Operación no permitida.





    **[SOCKET_ENOENT](#constant.socket-enoent)**
    ([int](#language.types.integer))



     No existe el archivo o directorio.





    **[SOCKET_EIO](#constant.socket-eio)**
    ([int](#language.types.integer))



     Error de E/S.





    **[SOCKET_ENXIO](#constant.socket-enxio)**
    ([int](#language.types.integer))



     No existe el dispositivo o dirección.





    **[SOCKET_E2BIG](#constant.socket-e2big)**
    ([int](#language.types.integer))



     Lista de argumentos demasiado larga.





    **[SOCKET_EAGAIN](#constant.socket-eagain)**
    ([int](#language.types.integer))



     Inténtelo de nuevo.





    **[SOCKET_ENOMEM](#constant.socket-enomem)**
    ([int](#language.types.integer))



     Sin memoria.





    **[SOCKET_ENOTBLK](#constant.socket-enotblk)**
    ([int](#language.types.integer))



     Se requiere un dispositivo de bloque.





    **[SOCKET_EBUSY](#constant.socket-ebusy)**
    ([int](#language.types.integer))



     Dispositivo o recurso ocupado.





    **[SOCKET_EEXIST](#constant.socket-eexist)**
    ([int](#language.types.integer))



     El archivo existe.





    **[SOCKET_EXDEV](#constant.socket-exdev)**
    ([int](#language.types.integer))



     Enlace entre dispositivos.





    **[SOCKET_ENODEV](#constant.socket-enodev)**
    ([int](#language.types.integer))



     No existe el dispositivo.





    **[SOCKET_ENOTDIR](#constant.socket-enotdir)**
    ([int](#language.types.integer))



     No es un directorio.





    **[SOCKET_EISDIR](#constant.socket-eisdir)**
    ([int](#language.types.integer))



     Es un directorio.





    **[SOCKET_ENFILE](#constant.socket-enfile)**
    ([int](#language.types.integer))



     Desbordamiento de la tabla de archivos.





    **[SOCKET_ENOTTY](#constant.socket-enotty)**
    ([int](#language.types.integer))



     No es un terminal.





    **[SOCKET_ENOSPC](#constant.socket-enospc)**
    ([int](#language.types.integer))



     No hay espacio disponible en el dispositivo.





    **[SOCKET_ESPIPE](#constant.socket-espipe)**
    ([int](#language.types.integer))



     Búsqueda ilegal.





    **[SOCKET_EROFS](#constant.socket-erofs)**
    ([int](#language.types.integer))



     Sistema de archivos de solo lectura.





    **[SOCKET_EMLINK](#constant.socket-emlink)**
    ([int](#language.types.integer))



     Demasiados enlaces.





    **[SOCKET_EPIPE](#constant.socket-epipe)**
    ([int](#language.types.integer))



     Tubo roto.






    **[SOCKET_ENOLCK](#constant.socket-enolck)**
    ([int](#language.types.integer))



     No hay bloqueos de registros disponibles.





    **[SOCKET_ENOSYS](#constant.socket-enosys)**
    ([int](#language.types.integer))



     Función no implementada.






    **[SOCKET_ENOMSG](#constant.socket-enomsg)**
    ([int](#language.types.integer))



     No hay mensaje del tipo deseado.





    **[SOCKET_EIDRM](#constant.socket-eidrm)**
    ([int](#language.types.integer))



     Identificador eliminado.





    **[SOCKET_ECHRNG](#constant.socket-echrng)**
    ([int](#language.types.integer))



     Número de canal fuera de rango.





    **[SOCKET_EL2NSYNC](#constant.socket-el2nsync)**
    ([int](#language.types.integer))



     Nivel 2 no sincronizado.





    **[SOCKET_EL3HLT](#constant.socket-el3hlt)**
    ([int](#language.types.integer))



     Nivel 3 detenido.





    **[SOCKET_EL3RST](#constant.socket-el3rst)**
    ([int](#language.types.integer))



     Nivel 3 reiniciado.





    **[SOCKET_ELNRNG](#constant.socket-elnrng)**
    ([int](#language.types.integer))



     Número de enlace fuera de rango.





    **[SOCKET_EUNATCH](#constant.socket-eunatch)**
    ([int](#language.types.integer))



     Controlador de protocolo no adjunto.





    **[SOCKET_ENOCSI](#constant.socket-enocsi)**
    ([int](#language.types.integer))



     No hay estructura CSI disponible.





    **[SOCKET_EL2HLT](#constant.socket-el2hlt)**
    ([int](#language.types.integer))



     Nivel 2 detenido.





    **[SOCKET_EBADE](#constant.socket-ebade)**
    ([int](#language.types.integer))



     Intercambio inválido.





    **[SOCKET_EBADR](#constant.socket-ebadr)**
    ([int](#language.types.integer))



     Descriptor de solicitud inválido.





    **[SOCKET_EXFULL](#constant.socket-exfull)**
    ([int](#language.types.integer))



     Intercambio lleno.





    **[SOCKET_ENOANO](#constant.socket-enoano)**
    ([int](#language.types.integer))



     No hay ánodo.





    **[SOCKET_EBADRQC](#constant.socket-ebadrqc)**
    ([int](#language.types.integer))



     Código de solicitud inválido.





    **[SOCKET_EBADSLT](#constant.socket-ebadslt)**
    ([int](#language.types.integer))



     Ranura inválida.





    **[SOCKET_ENOSTR](#constant.socket-enostr)**
    ([int](#language.types.integer))



     El dispositivo no es un flujo.





    **[SOCKET_ENODATA](#constant.socket-enodata)**
    ([int](#language.types.integer))



     No hay datos disponibles.





    **[SOCKET_ETIME](#constant.socket-etime)**
    ([int](#language.types.integer))



     El temporizador expiró.





    **[SOCKET_ENOSR](#constant.socket-enosr)**
    ([int](#language.types.integer))



     Sin recursos de flujo.





    **[SOCKET_ENONET](#constant.socket-enonet)**
    ([int](#language.types.integer))



     La máquina no está en la red.






    **[SOCKET_ENOLINK](#constant.socket-enolink)**
    ([int](#language.types.integer))



     El enlace ha sido cortado.





    **[SOCKET_EADV](#constant.socket-eadv)**
    ([int](#language.types.integer))



     Error de anuncio.





    **[SOCKET_ESRMNT](#constant.socket-esrmnt)**
    ([int](#language.types.integer))



     Error de srmount.





    **[SOCKET_ECOMM](#constant.socket-ecomm)**
    ([int](#language.types.integer))



     Error de comunicación al enviar.





    **[SOCKET_EPROTO](#constant.socket-eproto)**
    ([int](#language.types.integer))



     Error de protocolo.





    **[SOCKET_EMULTIHOP](#constant.socket-emultihop)**
    ([int](#language.types.integer))



     Se intentó un multihop.





    **[SOCKET_EBADMSG](#constant.socket-ebadmsg)**
    ([int](#language.types.integer))



     No es un mensaje de datos.





    **[SOCKET_ENOTUNIQ](#constant.socket-enotuniq)**
    ([int](#language.types.integer))



     El nombre no es único en la red.





    **[SOCKET_EBADFD](#constant.socket-ebadfd)**
    ([int](#language.types.integer))



     El descriptor de archivo está en mal estado.





    **[SOCKET_EREMCHG](#constant.socket-eremchg)**
    ([int](#language.types.integer))



     La dirección remota cambió.





    **[SOCKET_ERESTART](#constant.socket-erestart)**
    ([int](#language.types.integer))



     La llamada al sistema interrumpida debe reiniciarse.





    **[SOCKET_ESTRPIPE](#constant.socket-estrpipe)**
    ([int](#language.types.integer))



     Error de tubería de flujos.







    **[SOCKET_EPROTOOPT](#constant.socket-eprotoopt)**
    ([int](#language.types.integer))



     Protocolo no disponible.







    **[SOCKET_ADDRINUSE](#constant.socket-addrinuse)**
    ([int](#language.types.integer))



     La dirección ya está en uso.







    **[SOCKET_ETOOMANYREFS](#constant.socket-etoomanyrefs)**
    ([int](#language.types.integer))



     Demasiadas referencias: no se puede insertar.







    **[SOCKET_EISNAM](#constant.socket-eisnam)**
    ([int](#language.types.integer))



     Es un archivo de tipo nombrado.





    **[SOCKET_EREMOTEIO](#constant.socket-eremoteio)**
    ([int](#language.types.integer))



     Error de E/S remoto.





    **[SOCKET_EDQUOT](#constant.socket-edquot)**
    ([int](#language.types.integer))



     Cuota excedida.





    **[SOCKET_ENOMEDIUM](#constant.socket-enomedium)**
    ([int](#language.types.integer))



     No se encontró medio.





    **[SOCKET_EMEDIUMTYPE](#constant.socket-emediumtype)**
    ([int](#language.types.integer))



     Tipo de medio incorrecto.





    **[SCM_RIGHTS](#constant.scm-rights)**
    ([int](#language.types.integer))



     Enviar o recibir un conjunto de descriptores de archivo abiertos de otro proceso.





    **[SCM_CREDENTIALS](#constant.scm-credentials)**
    ([int](#language.types.integer))









    **[SCM_CREDS](#constant.scm-creds)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SCM_CREDS2](#constant.scm-creds2)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[LOCAL_CREDS](#constant.local-creds)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[LOCAL_CREDS_PERSISTENT](#constant.local-creds-persistent)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_OFF](#constant.skf-ad-off)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_PROTOCOL](#constant.skf-ad-protocol)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_PKTTYPE](#constant.skf-ad-pkttype)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_IFINDEX](#constant.skf-ad-ifindex)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_NLATTR](#constant.skf-ad-nlattr)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_NLATTR_NEST](#constant.skf-ad-nlattr-nest)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_MARK](#constant.skf-ad-mark)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_QUEUE](#constant.skf-ad-queue)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_HATYPE](#constant.skf-ad-hatype)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_RXHASH](#constant.skf-ad-rxhash)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_CPU](#constant.skf-ad-cpu)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_ALU_XOR_X](#constant.skf-ad-alu-xor-x)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_VLAN_TAG](#constant.skf-ad-vlan-tag)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_VLAN_TAG_PRESENT](#constant.skf-ad-vlan-tag-present)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_PAY_OFFSET](#constant.skf-ad-pay-offset)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_RANDOM](#constant.skf-ad-random)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_VLAN_TPID](#constant.skf-ad-vlan-tpid)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[SKF_AD_MAX](#constant.skf-ad-max)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0





    **[AI_ADDRCONFIG](#constant.ai-addrconfig)**
    ([int](#language.types.integer))








    **[AI_ALL](#constant.ai-all)**
    ([int](#language.types.integer))








    **[AI_CANONIDN](#constant.ai-canonidn)**
    ([int](#language.types.integer))








    **[AI_CANONNAME](#constant.ai-canonname)**
    ([int](#language.types.integer))








    **[AI_IDN](#constant.ai-idn)**
    ([int](#language.types.integer))








    **[AI_NUMERICHOST](#constant.ai-numerichost)**
    ([int](#language.types.integer))








    **[AI_NUMERICSERV](#constant.ai-numericserv)**
    ([int](#language.types.integer))








    **[AI_PASSIVE](#constant.ai-passive)**
    ([int](#language.types.integer))








    **[AI_V4MAPPED](#constant.ai-v4mapped)**
    ([int](#language.types.integer))








    **[FIL_ATTACH](#constant.fil-attach)**
    ([int](#language.types.integer))








    **[FIL_DETACH](#constant.fil-detach)**
    ([int](#language.types.integer))








    **[IPPROTO_IP](#constant.ipproto-ip)**
    ([int](#language.types.integer))








    **[IPPROTO_IPV6](#constant.ipproto-ipv6)**
    ([int](#language.types.integer))








    **[IPV6_HOPLIMIT](#constant.ipv6-hoplimit)**
    ([int](#language.types.integer))








    **[IPV6_MULTICAST_HOPS](#constant.ipv6-multicast-hops)**
    ([int](#language.types.integer))








    **[IPV6_MULTICAST_IF](#constant.ipv6-multicast-if)**
    ([int](#language.types.integer))








    **[IPV6_MULTICAST_LOOP](#constant.ipv6-multicast-loop)**
    ([int](#language.types.integer))








    **[IPV6_PKTINFO](#constant.ipv6-pktinfo)**
    ([int](#language.types.integer))








    **[IPV6_RECVHOPLIMIT](#constant.ipv6-recvhoplimit)**
    ([int](#language.types.integer))








    **[IPV6_RECVPKTINFO](#constant.ipv6-recvpktinfo)**
    ([int](#language.types.integer))








    **[IPV6_RECVTCLASS](#constant.ipv6-recvtclass)**
    ([int](#language.types.integer))








    **[IPV6_TCLASS](#constant.ipv6-tclass)**
    ([int](#language.types.integer))








    **[IPV6_UNICAST_HOPS](#constant.ipv6-unicast-hops)**
    ([int](#language.types.integer))








    **[IPV6_V6ONLY](#constant.ipv6-v6only)**
    ([int](#language.types.integer))








    **[IP_MULTICAST_IF](#constant.ip-multicast-if)**
    ([int](#language.types.integer))








    **[IP_MULTICAST_LOOP](#constant.ip-multicast-loop)**
    ([int](#language.types.integer))








    **[IP_MULTICAST_TTL](#constant.ip-multicast-ttl)**
    ([int](#language.types.integer))








    **[IP_PORTRANGE](#constant.ip-portrange)**
    ([int](#language.types.integer))



     Establece el rango de puertos utilizado para seleccionar un número de puerto local.
     Disponible a partir de PHP 8.4.0. (Solo FreeBSD/NetBSD/OpenBSD)





    **[IP_PORTRANGE_DEFAULT](#constant.ip-portrange-default)**
    ([int](#language.types.integer))



     Usa el rango predeterminado de valores de puerto.
     Disponible a partir de PHP 8.4.0. (Solo FreeBSD/NetBSD/OpenBSD)





    **[IP_PORTRANGE_HIGH](#constant.ip-portrange-high)**
    ([int](#language.types.integer))



     Usa un rango alto de valores de puerto.
     Disponible a partir de PHP 8.4.0. (Solo FreeBSD/NetBSD/OpenBSD)





    **[IP_PORTRANGE_LOW](#constant.ip-portrange-low)**
    ([int](#language.types.integer))



     Usa un rango bajo de valores de puerto.
     Disponible a partir de PHP 8.4.0. (Solo FreeBSD/NetBSD/OpenBSD)





    **[MCAST_BLOCK_SOURCE](#constant.mcast-block-source)**
    ([int](#language.types.integer))








    **[MCAST_JOIN_GROUP](#constant.mcast-join-group)**
    ([int](#language.types.integer))








    **[MCAST_JOIN_SOURCE_GROUP](#constant.mcast-join-source-group)**
    ([int](#language.types.integer))








    **[MCAST_LEAVE_GROUP](#constant.mcast-leave-group)**
    ([int](#language.types.integer))








    **[MCAST_LEAVE_SOURCE_GROUP](#constant.mcast-leave-source-group)**
    ([int](#language.types.integer))








    **[MCAST_UNBLOCK_SOURCE](#constant.mcast-unblock-source)**
    ([int](#language.types.integer))








    **[MSG_CMSG_CLOEXEC](#constant.msg-cmsg-cloexec)**
    ([int](#language.types.integer))








    **[MSG_CONFIRM](#constant.msg-confirm)**
    ([int](#language.types.integer))








    **[MSG_CTRUNC](#constant.msg-ctrunc)**
    ([int](#language.types.integer))








    **[MSG_DONTWAIT](#constant.msg-dontwait)**
    ([int](#language.types.integer))








    **[MSG_ERRQUEUE](#constant.msg-errqueue)**
    ([int](#language.types.integer))








    **[MSG_MORE](#constant.msg-more)**
    ([int](#language.types.integer))








    **[MSG_NOSIGNAL](#constant.msg-nosignal)**
    ([int](#language.types.integer))








    **[MSG_TRUNC](#constant.msg-trunc)**
    ([int](#language.types.integer))








    **[MSG_WAITFORONE](#constant.msg-waitforone)**
    ([int](#language.types.integer))








    **[SOL_LOCAL](#constant.sol-local)**
    ([int](#language.types.integer))








    **[SOMAXCONN](#constant.somaxconn)**
    ([int](#language.types.integer))








    **[SO_BINDTODEVICE](#constant.so-bindtodevice)**
    ([int](#language.types.integer))








    **[SO_FAMILY](#constant.so-family)**
    ([int](#language.types.integer))








    **[SO_LABEL](#constant.so-label)**
    ([int](#language.types.integer))








    **[SO_LISTENQLEN](#constant.so-listenqlen)**
    ([int](#language.types.integer))








    **[SO_LISTENQLIMIT](#constant.so-listenqlimit)**
    ([int](#language.types.integer))








    **[SO_PASSCRED](#constant.so-passcred)**
    ([int](#language.types.integer))








    **[SO_PEERLABEL](#constant.so-peerlabel)**
    ([int](#language.types.integer))








    **[SO_EXCLUSIVEADDRUSE](#constant.so-exclusiveaddruse)**
    ([int](#language.types.integer))



     Evita que otros sockets se vinculen de forma forzada a la misma dirección y puerto.
     Disponible a partir de PHP 8.4.0. (Solo Windows)





    **[SO_EXCLBIND](#constant.so-exclbind)**
    ([int](#language.types.integer))



     Habilita/deshabilita la vinculación exclusiva del socket.
     Disponible a partir de PHP 8.4.0. (Solo Solaris)





    **[SO_NOSIGPIPE](#constant.so-nosigpipe)**
    ([int](#language.types.integer))



     Controla la generación de SIGPIPE para el socket.
     Disponible a partir de PHP 8.4.0. (Solo macOs y FreeBSD)





    **[SO_LINGER_SEC](#constant.so-linger-sec)**
    ([int](#language.types.integer))



     Similar a **[SO_LINGER](#constant.so-linger)** pero el tiempo de espera es en segundos
     en lugar de ticks de tiempo en macOs.
     Disponible a partir de PHP 8.4.0. (Solo macOs)





    **[SO_BINDTOIFINDEX](#constant.so-bindtoifindex)**
    ([int](#language.types.integer))



     Vincula un socket a una interfaz de red específica por su índice.
     Disponible a partir de PHP 8.4.0.

# Ejemplos

**Ejemplo #1 Ejemplo de socket: Servidor TCP/IP sencillo**

    Este ejemplo muestra una respuesta de servidor simple. Cambie las
    variables address y port
    para ajustar su configuración y ejecútelo. Debe después conectar el
    servidor con un comando similar a: **telnet 192.168.1.53
    10000** (donde la dirección y el puerto deben coincidir con su
    cofiguración). Cualquier cosa que escriba será impresa en el lado del
    servidor, y vuelta a repetir (echo) para usted. Para desconectar, introduzca 'quit'.

#!/usr/local/bin/php -q
&lt;?php
error_reporting(E_ALL);

/_ Permitir al script esperar para conexiones. _/
set_time_limit(0);

/\* Activar el volcado de salida implícito, así veremos lo que estamos obteniendo

- mientras llega. \*/
  ob_implicit_flush();

$address = '192.168.1.53';
$port = 10000;

if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
echo "socket_create() falló: razón: " . socket_strerror(socket_last_error()) . "\n";
}

if (socket_bind($sock, $address, $port) === false) {
    echo "socket_bind() falló: razón: " . socket_strerror(socket_last_error($sock)) . "\n";
}

if (socket_listen($sock, 5) === false) {
    echo "socket_listen() falló: razón: " . socket_strerror(socket_last_error($sock)) . "\n";
}

do {
if (($msgsock = socket_accept($sock)) === false) {
echo "socket_accept() falló: razón: " . socket_strerror(socket_last_error($sock)) . "\n";
        break;
    }
    /* Enviar instrucciones. */
    $msg = "\nBienvenido al Servidor De Prueba de PHP. \n" .
        "Para salir, escriba 'quit'. Para cerrar el servidor escriba 'shutdown'.\n";
    socket_write($msgsock, $msg, strlen($msg));

    do {
        if (false === ($buf = socket_read($msgsock, 2048, PHP_NORMAL_READ))) {
            echo "socket_read() falló: razón: " . socket_strerror(socket_last_error($msgsock)) . "\n";
            break 2;
        }
        if (!$buf = trim($buf)) {
            continue;
        }
        if ($buf == 'quit') {
            break;
        }
        if ($buf == 'shutdown') {
            socket_close($msgsock);
            break 2;
        }
        $talkback = "PHP: Usted dijo '$buf'.\n";
        socket_write($msgsock, $talkback, strlen($talkback));
        echo "$buf\n";
    } while (true);
    socket_close($msgsock);

} while (true);

socket_close($sock);
?&gt;

**Ejemplo #2 Ejemplo de socket: Cliente TCP/IP sencillo**

    Este ejemplo muestra un simple, único cliente HTTP. Simplemente
    se conecta a una página, envía una petición HEAD, repite la réplica,
    y sale.

&lt;?php
error_reporting(E_ALL);

echo "&lt;h2&gt;TCP/IP Connection&lt;/h2&gt;\n";

/_ Obtener el puerto para el servicio WWW. _/
$service_port = getservbyname('www', 'tcp');

/_ Obtener la dirección IP para el host objetivo. _/
$address = gethostbyname('www.example.com');

/_ Crear un socket TCP/IP. _/
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
echo "socket_create() falló: razón: " . socket_strerror(socket_last_error()) . "\n";
} else {
echo "OK.\n";
}

echo "Intentando conectar a '$address' en el puerto '$service_port'...";
$result = socket_connect($socket, $address, $service_port);
if ($result === false) {
echo "socket_connect() falló.\nRazón: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
} else {
echo "OK.\n";
}

$in = "HEAD / HTTP/1.1\r\n";
$in .= "Host: www.example.com\r\n";
$in .= "Connection: Close\r\n\r\n";
$out = '';

echo "Enviando petición HTTP HEAD ...";
socket_write($socket, $in, strlen($in));
echo "OK.\n";

echo "Leyendo respuesta:\n\n";
while ($out = socket_read($socket, 2048)) {
echo $out;
}

echo "Cerrando socket...";
socket_close($socket);
echo "OK.\n\n";
?&gt;

# Errores de Socket

La extensión socket fue escrita para proporcionar una interfaz utilizable para los
poderosos sockets de BSD. Se ha tenido cuidado en hacer que las funciones trabajen igualmente
bien en implementaciones de Win32 y Unix. Casi todas las funciones de
sockets pueden fallar bajo ciertas condiciones y por lo tanto emitir un
mensaje **[E_WARNING](#constant.e-warning)** describiendo el error. Algunas veces esto
no ocurre para los deseos del desarrollador. Por ejemplo, la función
[socket_read()](#function.socket-read) puede de pronto emitir un
mensaje **[E_WARNING](#constant.e-warning)** porque la conexión se quebró
de improvisto. Es común suprimir la advertencia con el
operador @ y capturar el código de error dentro de la
aplicación con la función [socket_last_error()](#function.socket-last-error).
Se puede llamar a la función [socket_strerror()](#function.socket-strerror) con este código de
error para recuperar una cadena describiendo el error. Vea su descripción para
más información.

**Nota**:

Los mensajes **[E_WARNING](#constant.e-warning)** generados por la extensión
socket están en inglés aunque el mensaje de error recuperado aparecéra
según la configuración regional actual (**[LC_MESSAGES](#constant.lc-messages)**):

Warning - socket_bind() unable to bind address [98]: Die Adresse wird bereits verwendet

# Funciones de Socket

# socket_accept

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_accept — Acepta una conexión en un socket

### Descripción

**socket_accept**([Socket](#class.socket) $socket): [Socket](#class.socket)|[false](#language.types.singleton)

Una vez que el socket socket ha sido creado con la
función [socket_create()](#function.socket-create), vinculado a un nombre con la función
[socket_bind()](#function.socket-bind), y puesto en espera de conexión con la
función [socket_listen()](#function.socket-listen),
**socket_accept()** acepta las conexiones en este
socket. Una vez que se establece una conexión, se devuelve una nueva instancia de
[Socket](#class.socket). Esta puede ser utilizada para las comunicaciones.
Si hay varias conexiones en espera, se utilizará la primera. Si
no hay conexiones en espera, **socket_accept()** se
bloqueará hasta que se presente una conexión. Si
socket ha sido configurado como no bloqueante, gracias a
[socket_set_blocking()](#function.socket-set-blocking) o
[socket_set_nonblock()](#function.socket-set-nonblock), se devolverá **[false](#constant.false)**.

La instancia de [Socket](#class.socket) devuelta por
**socket_accept()** no debe ser utilizada
para aceptar nuevas conexiones. El socket original
socket, que está en espera, permanece abierto
y puede ser reutilizado.

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada por [socket_create()](#function.socket-create).





### Valores devueltos

Devuelve una nueva instancia de [Socket](#class.socket) en caso de éxito o **[false](#constant.false)** en caso
de error. El código de error generado puede ser obtenido llamando a la función
[socket_last_error()](#function.socket-last-error). Este código de error puede ser pasado a
la función [socket_strerror()](#function.socket-strerror) para obtener un mensaje
de error legible por humanos.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de [Socket](#class.socket) ;
       anteriormente, se devolvía un [resource](#language.types.resource).



### Ver también

    - [socket_connect()](#function.socket-connect) - Crea una conexión en un socket

    - [socket_listen()](#function.socket-listen) - Espera una conexión en un socket

    - [socket_create()](#function.socket-create) - Crea un socket

    - [socket_bind()](#function.socket-bind) - Asocia un nombre a un socket

    - [socket_strerror()](#function.socket-strerror) - Devuelve un string describiendo un mensaje de error

# socket_addrinfo_bind

(PHP 7 &gt;= 7.2.0, PHP 8)

socket_addrinfo_bind — Crea y vincula un socket a una dirección dada

### Descripción

**socket_addrinfo_bind**([AddressInfo](#class.addressinfo) $address): [Socket](#class.socket)|[false](#language.types.singleton)

Crea una instancia de [Socket](#class.socket) y la vincula al [AddressInfo](#class.addressinfo) proporcionado. El valor de retorno
de esta función puede ser utilizado con [socket_listen()](#function.socket-listen).

### Parámetros

    address


      La instancia de [AddressInfo](#class.addressinfo) creada por [socket_addrinfo_lookup()](#function.socket-addrinfo-lookup).


### Valores devueltos

Devuelve una instancia de [Socket](#class.socket) en caso de éxito o **[false](#constant.false)** en caso de fallo.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de [Socket](#class.socket);
       antes, se devolvía un recurso.





8.0.0

address ahora es una instancia de [AddressInfo](#class.addressinfo) ;
anteriormente, era un [resource](#language.types.resource).

### Ver también

    - [socket_addrinfo_connect()](#function.socket-addrinfo-connect) - Crea e inicia la conexión de un socket a una dirección dada

    - [socket_addrinfo_explain()](#function.socket-addrinfo-explain) - Proporciona información sobre addrinfo

    - [socket_addrinfo_lookup()](#function.socket-addrinfo-lookup) - Devuelve un array que contiene la información de getaddrinfo sobre el nombre de host dado

    - [socket_listen()](#function.socket-listen) - Espera una conexión en un socket

# socket_addrinfo_connect

(PHP 7 &gt;= 7.2.0, PHP 8)

socket_addrinfo_connect — Crea e inicia la conexión de un socket a una dirección dada

### Descripción

**socket_addrinfo_connect**([AddressInfo](#class.addressinfo) $address): [Socket](#class.socket)|[false](#language.types.singleton)

Crea una instancia de [Socket](#class.socket) y la conecta a la [AddressInfo](#class.addressinfo) proporcionada. El valor de retorno
de esta función puede ser utilizado con el resto de las funciones de socket.

### Parámetros

    address


      La instancia de [AddressInfo](#class.addressinfo) creada por [socket_addrinfo_lookup()](#function.socket-addrinfo-lookup).


### Valores devueltos

Devuelve una instancia de [Socket](#class.socket) en caso de éxito o **[false](#constant.false)** en caso de fallo.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de [Socket](#class.socket);
       antes, se devolvía un [resource](#language.types.resource).





8.0.0

address ahora es una instancia de [AddressInfo](#class.addressinfo) ;
anteriormente, era un [resource](#language.types.resource).

### Ver también

    - [socket_addrinfo_bind()](#function.socket-addrinfo-bind) - Crea y vincula un socket a una dirección dada

    - [socket_addrinfo_explain()](#function.socket-addrinfo-explain) - Proporciona información sobre addrinfo

    - [socket_addrinfo_lookup()](#function.socket-addrinfo-lookup) - Devuelve un array que contiene la información de getaddrinfo sobre el nombre de host dado

# socket_addrinfo_explain

(PHP 7 &gt;= 7.2.0, PHP 8)

socket_addrinfo_explain — Proporciona información sobre addrinfo

### Descripción

**socket_addrinfo_explain**([AddressInfo](#class.addressinfo) $address): [array](#language.types.array)

**socket_addrinfo_explain()** expone la estructura
addrinfo subyacente.

### Parámetros

    address


      Una instancia de [AddressInfo](#class.addressinfo) creada por [socket_addrinfo_lookup()](#function.socket-addrinfo-lookup).


### Valores devueltos

Devuelve un array que contiene los campos de la estructura addrinfo.

### Historial de cambios

      Versión
      Descripción







8.0.0

address ahora es una instancia de [AddressInfo](#class.addressinfo) ;
anteriormente, era un [resource](#language.types.resource).

### Ver también

    - [socket_addrinfo_bind()](#function.socket-addrinfo-bind) - Crea y vincula un socket a una dirección dada

    - [socket_addrinfo_connect()](#function.socket-addrinfo-connect) - Crea e inicia la conexión de un socket a una dirección dada

    - [socket_addrinfo_lookup()](#function.socket-addrinfo-lookup) - Devuelve un array que contiene la información de getaddrinfo sobre el nombre de host dado

# socket_addrinfo_lookup

(PHP 7 &gt;= 7.2.0, PHP 8)

socket_addrinfo_lookup — Devuelve un array que contiene la información de getaddrinfo sobre el nombre de host dado

### Descripción

**socket_addrinfo_lookup**([string](#language.types.string) $host, [?](#language.types.null)[string](#language.types.string) $service = **[null](#constant.null)**, [array](#language.types.array) $hints = []): [array](#language.types.array)|[false](#language.types.singleton)

Busca las diferentes formas de conectarse a host. El array devuelto contiene
un conjunto de instancias de [AddressInfo](#class.addressinfo) a las cuales se puede vincular utilizando [socket_addrinfo_bind()](#function.socket-addrinfo-bind).

### Parámetros

    host


      El nombre de host a buscar.






    service


      El servicio al cual conectarse. Si service es una cadena numérica, designa el puerto.
      De lo contrario, designa un nombre de servicio de red, que es mapeado a un puerto por el sistema operativo.






    hints


      Permite especificar criterios para la selección de las direcciones devueltas. Se pueden especificar los
      hints tal como se definen en getaddrinfo.


### Valores devueltos

Devuelve un array de instancias de [AddressInfo](#class.addressinfo) que pueden ser utilizadas con
la familia de funciones **socket*addrinfo*()\***.
En caso de fallo, **[false](#constant.false)** es devuelto.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora un array de instancias de [AddressInfo](#class.addressinfo);
       antes, se devolvía un array de [resource](#language.types.resource)s.




      8.0.0

       service ahora es nullable.



### Ver también

    - [socket_addrinfo_bind()](#function.socket-addrinfo-bind) - Crea y vincula un socket a una dirección dada

    - [socket_addrinfo_connect()](#function.socket-addrinfo-connect) - Crea e inicia la conexión de un socket a una dirección dada

    - [socket_addrinfo_explain()](#function.socket-addrinfo-explain) - Proporciona información sobre addrinfo

# socket_atmark

(PHP 8 &gt;= 8.3.0, PHP 8)

socket_atmark — Determina si el socket está en la marca fuera de banda

### Descripción

**socket_atmark**([Socket](#class.socket) $socket): [bool](#language.types.boolean)

Determina si socket está en la marca fuera de banda.

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada con [socket_create()](#function.socket-create).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Uso de socket_atmark()** para definir la dirección fuente

&lt;?php
// Crear un nuevo socket
$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
var_dump(socket_atmark($sock));
// Cerrar
socket_close($sock);
?&gt;

### Ver también

    - [socket_connect()](#function.socket-connect) - Crea una conexión en un socket

    - [socket_create()](#function.socket-create) - Crea un socket

# socket_bind

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_bind — Asocia un nombre a un socket

### Descripción

**socket_bind**([Socket](#class.socket) $socket, [string](#language.types.string) $address, [int](#language.types.integer) $port = 0): [bool](#language.types.boolean)

Asocia el nombre proporcionado por address a la
interfaz de conexión descrita por socket. Esto debe
realizarse antes de que se establezca una conexión utilizando
[socket_connect()](#function.socket-connect) o [socket_listen()](#function.socket-listen).

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada por [socket_create()](#function.socket-create).






     address


       Si el socket pertenece a la familia **[AF_INET](#constant.af-inet)**, el parámetro
       address es una IP numérica
       (i.e. 127.0.0.1).




       Si el socket pertenece a la familia **[AF_UNIX](#constant.af-unix)**, el parámetro
       address representa la ruta de un socket de dominio Unix
       (i.e. /tmp/my.sock).






     port (opcional)


       El parámetro port solo se utiliza al
       asociar un socket **[AF_INET](#constant.af-inet)** y designa el puerto
       en el que escuchar para una conexión.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

El código de error puede ser recuperado con la función [socket_last_error()](#function.socket-last-error).
Este código puede ser pasado a la función [socket_strerror()](#function.socket-strerror)
para recuperar el mensaje textual del error.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Uso de socket_bind()** para definir la dirección de origen

&lt;?php
// Creación de un nuevo socket
$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

// Una lista de direcciones IP, por ejemplo, pertenecen a la computadora
$sourceips['kevin']    = '127.0.0.1';
$sourceips['madcoder'] = '127.0.0.2';

// Asocia la dirección de origen
socket_bind($sock, $sourceips['madcoder']);

// Conexión a la dirección de destino
socket_connect($sock, '127.0.0.1', 80);

// Escritura
$request = 'GET / HTTP/1.1' . "\r\n" .
'Host: example.com' . "\r\n\r\n";
socket_write($sock, $request);

// Cierre
socket_close($sock);

?&gt;

### Notas

**Nota**:

    Esta función debe ser utilizada en el socket antes de la función
    [socket_connect()](#function.socket-connect).

### Ver también

    - [socket_connect()](#function.socket-connect) - Crea una conexión en un socket

    - [socket_listen()](#function.socket-listen) - Espera una conexión en un socket

    - [socket_create()](#function.socket-create) - Crea un socket

    - [socket_last_error()](#function.socket-last-error) - Lee el último error generado por un socket

    - [socket_strerror()](#function.socket-strerror) - Devuelve un string describiendo un mensaje de error

# socket_clear_error

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

socket_clear_error — Elimina todos los errores generados previamente por un socket

### Descripción

**socket_clear_error**([?](#language.types.null)[Socket](#class.socket) $socket = **[null](#constant.null)**): [void](language.types.void.html)

Elimina todos los códigos de error que han sido registrados para el socket
socket, o bien para el socket general.

**socket_clear_error()** permite restablecer a cero los
códigos de error de un socket o del socket global. Esto puede ser
útil para detectar la aparición de un error durante una parte de
la aplicación.

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada por [socket_create()](#function.socket-create).





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

      8.0.0

       socket ahora es nullable.



### Ver también

    - [socket_last_error()](#function.socket-last-error) - Lee el último error generado por un socket

    - [socket_strerror()](#function.socket-strerror) - Devuelve un string describiendo un mensaje de error

# socket_close

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_close — Cierra una instancia de [Socket](#class.socket)

### Descripción

**socket_close**([Socket](#class.socket) $socket): [void](language.types.void.html)

**socket_close()** cierra la instancia [Socket](#class.socket)
proporcionada por socket.

### Parámetros

     socket


        Una instancia de [Socket](#class.socket) creada por [socket_create()](#function.socket-create)
        o [socket_accept()](#function.socket-accept).





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

### Ver también

    - [socket_bind()](#function.socket-bind) - Asocia un nombre a un socket

    - [socket_listen()](#function.socket-listen) - Espera una conexión en un socket

    - [socket_create()](#function.socket-create) - Crea un socket

    - [socket_strerror()](#function.socket-strerror) - Devuelve un string describiendo un mensaje de error

# socket_cmsg_space

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

socket_cmsg_space — Calcula el tamaño del búfer

### Descripción

**socket_cmsg_space**([int](#language.types.integer) $level, [int](#language.types.integer) $type, [int](#language.types.integer) $num = 0): [?](#language.types.null)[int](#language.types.integer)

Calcula el tamaño del búfer que debe ser asignado para recibir los
datos auxiliares.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     level








     type







### Valores devueltos

### Ver también

    - [socket_recvmsg()](#function.socket-recvmsg) - Lee un mensaje

    - [socket_sendmsg()](#function.socket-sendmsg) - Envía un mensaje

# socket_connect

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_connect — Crea una conexión en un socket

### Descripción

**socket_connect**([Socket](#class.socket) $socket, [string](#language.types.string) $address, [?](#language.types.null)[int](#language.types.integer) $port = **[null](#constant.null)**): [bool](#language.types.boolean)

Crea una nueva conexión utilizando la instancia [Socket](#class.socket)
socket, que debe ser una instancia de
[Socket](#class.socket) creada por [socket_create()](#function.socket-create).

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada con
       [socket_create()](#function.socket-create).






     address


       El argumento address es una dirección IPv4 válida
       (por ejemplo, 127.0.0.1) si socket es
       **[AF_INET](#constant.af-inet)**, o una dirección IPv6 válida
       (por ejemplo, ::1) si el soporte IPv6 está activo y el argumento
       socket es **[AF_INET6](#constant.af-inet6)**, o una ruta hacia un socket de dominio Unix, si la familia de sockets es
       **[AF_UNIX](#constant.af-unix)**.






     port


       El argumento port solo se utiliza y es obligatorio
       al conectarse a un socket **[AF_INET](#constant.af-inet)** o
       **[AF_INET6](#constant.af-inet6)**, e indica el puerto del host remoto
       al que debe realizarse la conexión.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error. El código
de error generado puede obtenerse llamando a la función
[socket_last_error()](#function.socket-last-error). Este código de error
puede pasarse a la función [socket_strerror()](#function.socket-strerror)
para obtener un mensaje de error legible por humanos.

**Nota**:

    Si el socket es no bloqueante, entonces esta función devuelve **[false](#constant.false)**
    con el siguiente error: Operation now in progress.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

      8.0.0

       port ahora es nullable.



### Ver también

    - [socket_bind()](#function.socket-bind) - Asocia un nombre a un socket

    - [socket_listen()](#function.socket-listen) - Espera una conexión en un socket

    - [socket_create()](#function.socket-create) - Crea un socket

    - [socket_last_error()](#function.socket-last-error) - Lee el último error generado por un socket

    - [socket_strerror()](#function.socket-strerror) - Devuelve un string describiendo un mensaje de error

# socket_create

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_create — Crea un socket

### Descripción

**socket_create**([int](#language.types.integer) $domain, [int](#language.types.integer) $type, [int](#language.types.integer) $protocol): [Socket](#class.socket)|[false](#language.types.singleton)

**socket_create()** crea un punto de comunicación
(un socket) y devuelve una instancia de [Socket](#class.socket)
Una conexión típica de red está compuesta por dos sockets:
uno que actúa como cliente y otro como servidor.

### Parámetros

     domain


       El argumento domain especifica la familia
       de protocolos a utilizar por el socket.




       <caption>**Familia de direcciones / protocolos disponibles**</caption>



          Dominio
          Descripción






          **[AF_INET](#constant.af-inet)**

           Protocolo basado en IPv4. TCP y UDP son los protocolos comunes
           de esta familia de protocolos.




          **[AF_INET6](#constant.af-inet6)**

           Protocolo basado en IPv6. TCP y UDP son los protocolos comunes
           de esta familia de protocolos.
           El soporte fue añadido en PHP 5.0.0.




          **[AF_UNIX](#constant.af-unix)**

           Familia de protocolos de comunicación local. El alto rendimiento
           y los menores costos adicionales lo hacen una gran fuerza de IPC
           (Interprocess Communication).










     type


       El argumento type selecciona el tipo de
       comunicación a utilizar por el socket.




       <caption>**Tipos de sockets disponibles**</caption>



          Tipo
          Descripción






          **[SOCK_STREAM](#constant.sock-stream)**

           Proporciona flujos de bytes ordenados, fiables, full-duplex,
           conectados en base. Un mecanismo de transmisión de datos
           "out-of-band" puede ser soportado.
           El protocolo TCP se basa en este tipo de sockets.




          **[SOCK_DGRAM](#constant.sock-dgram)**

           Soporte para datagramas (menos conexión, mensaje no garantizado
           de longitud máxima fija). El protocolo UDP se basa en este
           tipo de sockets.




          **[SOCK_SEQPACKET](#constant.sock-seqpacket)**

           Proporciona un camino de transmisión de datos secuencial, fiable,
           conectado en base por dos caminos para los datagramas de
           longitud máxima fija; un consumidor es requerido para leer
           la totalidad de un paquete con cada llamada a la lectura.




          **[SOCK_RAW](#constant.sock-raw)**

           Proporciona acceso bruto de protocolo de red. Este tipo especial de
           socket puede ser utilizado para construir manualmente cualquier tipo
           de protocolo. Un uso común de este tipo de sockets es el procesamiento
           de las peticiones ICMP (como el ping).




          **[SOCK_RDM](#constant.sock-rdm)**

           Proporciona una capa fiable de datagrama que no garantiza
           el orden de los datos. Este tipo de socket es el más probable
           de no estar implementado en su sistema operativo.










     protocol


       El argumento protocol define el protocolo
       específico para el dominio domain a utilizar
       durante las comunicaciones en un socket devuelto. El valor apropiado
       puede ser encontrado por su nombre utilizando la función
       [getprotobyname()](#function.getprotobyname). Si el protocolo deseado es TCP
       o UDP, las constantes correspondientes **[SOL_TCP](#constant.sol-tcp)**
       y **[SOL_UDP](#constant.sol-udp)** pueden ser utilizadas.




       <caption>**Protocoles Comunes**</caption>



          Nombre
          Descripción






          icmp

           El protocolo ICMP (Internet Control Message
            Protocol) es utilizado primero por las
           pasarelas y los hosts para reportar errores en
           comunicaciones de datagrama. El comando
           "ping" (presente en los sistemas
           modernos) es un ejemplo de aplicación
           utilizando el protocolo ICMP.




          udp

           El protocolo UDP (User Datagramm Protocol)
           es un protocolo sin conexión, incierto con longitudes
           de registros fijas. Por lo tanto, UDP
           requiere una cantidad mínima de protocolo aéreo.




          tcp

           El protocolo TCP (Transmission Control Protocol)
           es un protocolo fiable, conectado en base, orientado a flujo y
           full-duplex. TCP garantiza que cada paquete es
           recibido en el orden en que fue enviado. Si algunos paquetes
           se pierden durante la comunicación, TCP
           retransmitirá estos paquetes hasta que el host destinatario
           los haya recibido completamente. Por razones de fiabilidad y
           rendimiento, la implementación TCP, ella misma,
           decide las fronteras apropiadas de bytes de la capa fundamental
           de comunicación del datagrama. Por lo tanto, las aplicaciones
           TCP deben permitir la posibilidad de
           transmisión parcial de registros.









### Valores devueltos

**socket_create()** devuelve una instancia de
[Socket](#class.socket) en caso de éxito y **[false](#constant.false)** en caso contrario.
El código de error generado puede ser obtenido llamando a la función
[socket_last_error()](#function.socket-last-error). Este código de error
puede ser pasado a la función [socket_strerror()](#function.socket-strerror)
para obtener un mensaje de error legible por humanos.

### Errores/Excepciones

Si un valor inválido es especificado en el argumento domain o
en el argumento type, la función **socket_create()**
tomará como argumentos por defecto respectivamente **[AF_INET](#constant.af-inet)** y
**[SOCK_STREAM](#constant.sock-stream)** y generará un mensaje de advertencia
(**[E_WARNING](#constant.e-warning)**).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [Socket](#class.socket); anteriormente, se devolvía un [resource](#language.types.resource).



### Ver también

    - [socket_accept()](#function.socket-accept) - Acepta una conexión en un socket

    - [socket_bind()](#function.socket-bind) - Asocia un nombre a un socket

    - [socket_connect()](#function.socket-connect) - Crea una conexión en un socket

    - [socket_listen()](#function.socket-listen) - Espera una conexión en un socket

    - [socket_last_error()](#function.socket-last-error) - Lee el último error generado por un socket

    - [socket_strerror()](#function.socket-strerror) - Devuelve un string describiendo un mensaje de error

# socket_create_listen

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_create_listen — Abre un socket en un puerto para aceptar conexiones

### Descripción

**socket_create_listen**([int](#language.types.integer) $port, [int](#language.types.integer) $backlog = **[SOMAXCONN](#constant.somaxconn)**): [Socket](#class.socket)|[false](#language.types.singleton)

**socket_create_listen()** crea una nueva instancia
de [Socket](#class.socket), de tipo **[AF_INET](#constant.af-inet)**, en espera
en _todas_ las interfaces locales,
para el puerto port.

**socket_create_listen()** sirve para simplificar
la creación de nuevos sockets destinados a estar en espera, y
aceptar nuevas conexiones.

### Parámetros

     port


       El puerto que debe ser escuchado en todas las interfaces.






     backlog


       El parámetro backlog define el tamaño
       máximo de la cola de conexiones en espera.
       **[SOMAXCONN](#constant.somaxconn)** puede ser utilizada como
       valor para el parámetro backlog. Consulte
       [socket_listen()](#function.socket-listen) para más detalles.





### Valores devueltos

**socket_create_listen()** devuelve una nueva instancia
de [Socket](#class.socket) en caso de éxito y **[false](#constant.false)** en caso de error.
El código de error generado puede ser obtenido llamando a la función
[socket_last_error()](#function.socket-last-error). Este código de error
puede ser pasado a la función [socket_strerror()](#function.socket-strerror)
para obtener un mensaje de error legible por humanos.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       El valor por omisión es ahora **[SOMAXCONN](#constant.somaxconn)**.
       Anteriormente, era 128.




      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [Socket](#class.socket); anteriormente, se devolvía un [resource](#language.types.resource).



### Notas

**Nota**:

    Si se desea crear un socket que solo escuche ciertas
    interfaces, debe utilizarse [socket_create()](#function.socket-create),
    [socket_bind()](#function.socket-bind) y [socket_listen()](#function.socket-listen).

### Ver también

    - [socket_create()](#function.socket-create) - Crea un socket

    - [socket_create_pair()](#function.socket-create-pair) - Crea un par de sockets idénticos y los almacena en un array

    - [socket_bind()](#function.socket-bind) - Asocia un nombre a un socket

    - [socket_listen()](#function.socket-listen) - Espera una conexión en un socket

    - [socket_last_error()](#function.socket-last-error) - Lee el último error generado por un socket

    - [socket_strerror()](#function.socket-strerror) - Devuelve un string describiendo un mensaje de error

# socket_create_pair

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_create_pair — Crea un par de sockets idénticos y los almacena en un array

### Descripción

**socket_create_pair**(
    [int](#language.types.integer) $domain,
    [int](#language.types.integer) $type,
    [int](#language.types.integer) $protocol,
    [array](#language.types.array) &amp;$pair
): [bool](#language.types.boolean)

**socket_create_pair()** crea un par de sockets idénticos y los almacena
en pair. Esta función se utiliza comúnmente en
IPC (InterProcess Communication).

### Parámetros

     domain


       El argumento domain especifica la familia del protocolo a utilizar por
       el socket. Ver la documentación sobre la función [socket_create()](#function.socket-create)
       para una lista completa.






     type


       El argumento type especifica el tipo de
       comunicación a utilizar por el socket. Ver la documentación
       sobre la función [socket_create()](#function.socket-create) para una lista
       completa.






     protocol


       El argumento protocol define un protocolo
       específico en el dominio especificado domain
       para ser utilizado durante una comunicación en un socket devuelto.
       El valor apropiado puede ser encontrado por su nombre utilizando
       la función [getprotobyname()](#function.getprotobyname). Si el protocolo
       deseado es TCP o UDP, las constantes correspondientes
       **[SOL_TCP](#constant.sol-tcp)** y **[SOL_UDP](#constant.sol-udp)** pueden
       ser utilizadas.




       Ver la documentación sobre la función [socket_create()](#function.socket-create)
       para una lista completa de los protocolos soportados.






     pair


       Una referencia a un array en el cual las dos instancias de
       [Socket](#class.socket) serán insertadas.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       pair es una referencia a un array de instancias de
       [Socket](#class.socket); anteriormente, era una referencia a un
       array de [resource](#language.types.resource)s.



### Ejemplos

    **Ejemplo #1 Ejemplo con socket_create_pair()**

&lt;?php
$sockets = array();

/_ En Windows, debemos utilizar AF_INET _/
$domain = (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN' ? AF_INET : AF_UNIX);

/_ Creación del par de sockets _/
if (socket_create_pair($domain, SOCK_STREAM, 0, $sockets) === false) {
    echo "socket_create_pair ha fallado. Razón: ".socket_strerror(socket_last_error());
}
/* Envío y recepción de datos */
if (socket_write($sockets[0], "ABCdef123\n", strlen("ABCdef123\n")) === false) {
echo "socket_write() ha fallado. Razón: ".socket_strerror(socket_last_error($sockets[0]));
}
if (($data = socket_read($sockets[1], strlen("ABCdef123\n"), PHP_BINARY_READ)) === false) {
    echo "socket_read() ha fallado. Razón: ".socket_strerror(socket_last_error($sockets[1]));
}
var_dump($data);

/_ Cierre de los sockets _/
socket_close($sockets[0]);
socket_close($sockets[1]);
?&gt;

    **Ejemplo #2 Ejemplo IPC con socket_create_pair()**

&lt;?php
$ary = array();
$strone = 'Mensaje desde el padre.';
$strtwo = 'Mensaje desde el hijo.';
if (socket_create_pair(AF_UNIX, SOCK_STREAM, 0, $ary) === false) {
    echo "socket_create_pair() ha fallado. Razón: ".socket_strerror(socket_last_error());
}
$pid = pcntl_fork();
if ($pid == -1) {
    echo 'No es posible duplicar el proceso.';
} elseif ($pid) {
/_ padre _/
socket_close($ary[0]);
    if (socket_write($ary[1], $strone, strlen($strone)) === false) {
echo "socket_write() ha fallado. Razón: ".socket_strerror(socket_last_error($ary[1]));
    }
    if (socket_read($ary[1], strlen($strtwo), PHP_BINARY_READ) == $strtwo) {
        echo "Recepción de $strtwo\n";
    }
    socket_close($ary[1]);
} else {
/_ hijo _/
socket_close($ary[1]);
    if (socket_write($ary[0], $strtwo, strlen($strtwo)) === false) {
echo "socket_write() ha fallado. Razón: ".socket_strerror(socket_last_error($ary[0]));
    }
    if (socket_read($ary[0], strlen($strone), PHP_BINARY_READ) == $strone) {
        echo "Recepción de $strone\n";
    }
    socket_close($ary[0]);
}
?&gt;

### Ver también

    - [socket_create()](#function.socket-create) - Crea un socket

    - [socket_create_listen()](#function.socket-create-listen) - Abre un socket en un puerto para aceptar conexiones

    - [socket_bind()](#function.socket-bind) - Asocia un nombre a un socket

    - [socket_listen()](#function.socket-listen) - Espera una conexión en un socket

    - [socket_last_error()](#function.socket-last-error) - Lee el último error generado por un socket

    - [socket_strerror()](#function.socket-strerror) - Devuelve un string describiendo un mensaje de error

# socket_export_stream

(PHP 7 &gt;= 7.0.7, PHP 8)

socket_export_stream — Exporta un socket en un flujo que encapsula un socket

### Descripción

**socket_export_stream**([Socket](#class.socket) $socket): [resource](#language.types.resource)|[false](#language.types.singleton)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    socket





### Valores devueltos

Devuelve un resource o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

# socket_get_option

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

socket_get_option — Lee las opciones del socket

### Descripción

**socket_get_option**([Socket](#class.socket) $socket, [int](#language.types.integer) $level, [int](#language.types.integer) $option): [array](#language.types.array)|[int](#language.types.integer)|[false](#language.types.singleton)

**socket_get_option()** recupera el valor de la opción
especificada por el argumento option para el socket
especificado por el argumento socket.

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada por
       [socket_create()](#function.socket-create) o [socket_accept()](#function.socket-accept).






     level


       El argumento level especifica la capa de
       protocolo de la opción. Por ejemplo, para conocer las opciones de
       la capa socket, el valor **[SOL_SOCKET](#constant.sol-socket)** del argumento
       level será utilizado. Otros niveles, como
       **[TCP](#constant.tcp)**, pueden ser utilizados especificando el
       número del protocolo de esta capa. Los números de protocolos
       pueden ser encontrados utilizando la función
       [getprotobyname()](#function.getprotobyname).






     option


       <caption>**Opciones disponibles para los sockets**</caption>



          Opción
          Descripción
          Tipo






          **[SO_DEBUG](#constant.so-debug)**

           Reporta si las informaciones de depuración son registradas o no.


           [int](#language.types.integer)




          **[SO_BROADCAST](#constant.so-broadcast)**

           Reporta si la transmisión de anuncios globales es soportada o no.


           [int](#language.types.integer)




          **[SO_REUSEADDR](#constant.so-reuseaddr)**

           Indica si las direcciones locales pueden ser reutilizadas o no.


           [int](#language.types.integer)




          **[SO_REUSEPORT](#constant.so-reuseport)**

           Indica si los puertos locales pueden ser reutilizados.


           [int](#language.types.integer)




          **[SO_KEEPALIVE](#constant.so-keepalive)**

           Reporta si las conexiones son persistentes con transmisiones
           periódicas de mensajes o no. Si el socket conectado falla en
           respuesta a estos mensajes, la conexión es interrumpida y el proceso
           escribirá sobre este socket una notificación con un señal SIGPIPE.


           [int](#language.types.integer)




          **[SO_LINGER](#constant.so-linger)**


            Reporta si el socket socket se demora en
            la función [socket_close()](#function.socket-close) si hay datos presentes o no. Por omisión, cuando el socket es cerrado,
            [socket_close()](#function.socket-close) intenta enviar todos los
            datos que no han sido enviados aún.




            Si l_onoff no vale cero y que
            l_linger vale cero, todos los datos
            que no han sido enviados aún serán cancelados y RST
            (reinicialización) será enviado en el caso de una conexión
            orientada socket.




            Por otro lado, si l_onoff no vale cero
            y l_linger no vale cero,
            [socket_close()](#function.socket-close) bloqueará hasta que los datos
            no enviados sean enviados o durante el tiempo especificado por
            l_linger. Si el socket es no-bloqueante,
            [socket_close()](#function.socket-close) fallará y retornará un
            error.





           [array](#language.types.array). El array contendrá 2 claves :
           l_onoff y
           l_linger.




          **[SO_OOBINLINE](#constant.so-oobinline)**

           Reporta si el socket socket parte sobre datos en
           línea out-of-band o no.


           [int](#language.types.integer)




          **[SO_SNDBUF](#constant.so-sndbuf)**

           Reporta las informaciones sobre el tamaño del buffer enviado.


           [int](#language.types.integer)




          **[SO_RCVBUF](#constant.so-rcvbuf)**

           Reporta las informaciones sobre el tamaño del buffer recibido.


           [int](#language.types.integer)




          **[SO_ERROR](#constant.so-error)**

           Reporta las informaciones sobre el estado de error y lo vacía.


           [int](#language.types.integer) (no puede ser definido por la función
           [socket_set_option()](#function.socket-set-option))




          **[SO_TYPE](#constant.so-type)**

           Reporta el tipo del socket socket (ej.
           **[SOCK_STREAM](#constant.sock-stream)**).


           [int](#language.types.integer) (no puede ser definido por la función
           [socket_set_option()](#function.socket-set-option))




          **[SO_DONTROUTE](#constant.so-dontroute)**

           Reporta si los mensajes salientes desvían los equipos estándar de encaminamiento.


           [int](#language.types.integer)




          **[SO_RCVLOWAT](#constant.so-rcvlowat)**

           Reporta el número mínimo de octetos al proceso para las operaciones
           entrantes sobre el socket socket.


           [int](#language.types.integer)




          **[SO_RCVTIMEO](#constant.so-rcvtimeo)**

           Reporta el valor del tiempo límite para las operaciones entrantes.


           [array](#language.types.array). El array contendrá 2 claves :
           sec que es la parte representando los segundos
           del valor del tiempo de espera y usec que es
           la parte representando los microsegundos.




          **[SO_SNDTIMEO](#constant.so-sndtimeo)**

           Reporta el valor del tiempo límite especificando el tiempo máximo de ejecución
           para las funciones salientes bloqueantes porque el comando de flujo
           impide que los datos sean enviados.


           [array](#language.types.array). El array contendrá 2 claves :
           sec que es la parte representando los segundos
           del valor del tiempo de espera y usec que es
           la parte representando los microsegundos.




          **[SO_SNDLOWAT](#constant.so-sndlowat)**

           Reporta el número mínimo de octetos al proceso para las operaciones
           salientes sobre el socket socket.


           [int](#language.types.integer)




          **[TCP_NODELAY](#constant.tcp-nodelay)**

           Indica si el algoritmo Nagle TCP está desactivado.


           [int](#language.types.integer)




          **[MCAST_JOIN_GROUP](#constant.mcast-join-group)**

           Se une a un grupo multicast.


           Un array con una clave "group",
           especificando un string con las direcciones multicast IPv4 o IPv6
           y una clave "interface", especificando ya sea un
           número de interfaz (de tipo [int](#language.types.integer)), ya sea un
           string con el nombre de la interfaz, como
           "eth0".
           0 puede ser especificado para indicar que la interfaz
           debe ser seleccionada utilizando las reglas de encaminamiento (no puede ser
           utilizado más que con la función [socket_set_option()](#function.socket-set-option)).




          **[MCAST_LEAVE_GROUP](#constant.mcast-leave-group)**

           Abandona un grupo multicast.


           Un array. Ver la constante **[MCAST_JOIN_GROUP](#constant.mcast-join-group)**
           para más informaciones (no puede ser utilizado más que con la función
           [socket_set_option()](#function.socket-set-option)).




          **[MCAST_BLOCK_SOURCE](#constant.mcast-block-source)**

           Bloquea paquetes llegando desde una fuente específica
           hacia un grupo multicast específico, que habrá debido ser unido
           anteriormente.


           Un array conteniendo las mismas claves que las de la constante
           **[MCAST_JOIN_GROUP](#constant.mcast-join-group)**, con una clave adicional
           source, ligado a un string especificando
           una dirección IPv4 o IPv6 de la fuente a bloquear
           (no puede ser utilizado más que con la función
           [socket_set_option()](#function.socket-set-option)).




          **[MCAST_UNBLOCK_SOURCE](#constant.mcast-unblock-source)**

           Desbloquea (recomienza a recibir) los paquetes llegando desde
           una fuente específica hacia un grupo multicast específico,
           que habrá debido ser unido anteriormente.


           Un array en el mismo formato que el de la constante
           **[MCAST_BLOCK_SOURCE](#constant.mcast-block-source)**
           (no puede ser utilizado más que con la función
           [socket_set_option()](#function.socket-set-option)).




          **[MCAST_JOIN_SOURCE_GROUP](#constant.mcast-join-source-group)**

           Recibe paquetes destinados a un grupo multicast específico
           cuya dirección fuente corresponde a un valor específico.


           Un array en el mismo formato que el de la constante
           **[MCAST_BLOCK_SOURCE](#constant.mcast-block-source)**
           (no puede ser utilizado más que con la función
           [socket_set_option()](#function.socket-set-option)).




          **[MCAST_LEAVE_SOURCE_GROUP](#constant.mcast-leave-source-group)**

           Deja de recibir paquetes destinados a un grupo multicast
           específico cuya dirección fuente corresponde a un valor específico.


           Un array en el mismo formato que el de la constante
           **[MCAST_BLOCK_SOURCE](#constant.mcast-block-source)**
           (no puede ser utilizado más que con la función
           [socket_set_option()](#function.socket-set-option)).




          **[IP_MULTICAST_IF](#constant.ip-multicast-if)**

           La interfaz de salida para los paquetes multicast IPv4.


           Ya sea un entero especificando el número de la interfaz, ya sea un
           string representando el nombre de la interfaz, por ejemplo,
           eth0. El valor 0
           puede ser utilizado para indicar la tabla de encaminamiento a utilizar
           en la selección de la interfaz. La función
           **socket_get_option()** retorna un índice de interfaz.
           Note que, a diferencia de la API C, esta opción no toma
           como argumento una dirección IP. Esto elimina la diferencia de interfaz
           entre las constantes **[IP_MULTICAST_IF](#constant.ip-multicast-if)** y
           **[IPV6_MULTICAST_IF](#constant.ipv6-multicast-if)**.




          **[IPV6_MULTICAST_IF](#constant.ipv6-multicast-if)**

           La interfaz de salida para los paquetes multicast IPv6.


           Idéntico a la constante **[IP_MULTICAST_IF](#constant.ip-multicast-if)**.




          **[IP_MULTICAST_LOOP](#constant.ip-multicast-loop)**

           La política de la bucla local multicast para los paquetes
           IPv4 activa o desactiva el buclaje de las multidifusiones salientes,
           que deben haber sido unidas anteriormente. El efecto difiere sin embargo
           según que se aplique a Unix o a Windows, el primero siendo sobre el
           camino de recepción mientras que el segundo sobre el camino de envío.


           Un entero (ya sea 0, ya sea 1).
           Para la función [socket_set_option()](#function.socket-set-option),
           cualquier valor será aceptado y será convertido
           en un booleano siguiendo las reglas habituales de PHP.




          **[IPV6_MULTICAST_LOOP](#constant.ipv6-multicast-loop)**

           Idéntico a la constante **[IP_MULTICAST_LOOP](#constant.ip-multicast-loop)**,
           pero para el IPv6.


           Un entero. Ver la constante **[IP_MULTICAST_LOOP](#constant.ip-multicast-loop)**.




          **[IP_MULTICAST_TTL](#constant.ip-multicast-ttl)**

           La duración de vida de los paquetes salientes multicast IPv4.
           Esto debe ser un valor comprendido entre 0 (no salir
           de la interfaz) y 255. Por omisión, el valor es a 1 (solo
           la red local es alcanzada).


           Un entero entre 0 y 255.




          **[IPV6_MULTICAST_HOPS](#constant.ipv6-multicast-hops)**

           Idéntico a la constante **[IP_MULTICAST_TTL](#constant.ip-multicast-ttl)**,
           pero para los paquetes IPv6. El valor -1 es igualmente aceptado,
           significando que la ruta por omisión debe ser utilizada.


           Un entero comprendido entre -1 y 255.




          **[SO_MARK](#constant.so-mark)**

           Define un identificador sobre el socket para el propósito de filtrar
           los paquetes sobre Linux.


           [int](#language.types.integer)




          **[SO_ACCEPTFILTER](#constant.so-acceptfilter)**

           Añade un filtro de aceptación sobre el socket escuchado (FreeBSD/NetBSD).
           Un módulo kernel de filtro de aceptación debe ser cargado
           primero sobre FreeBSD (ej. accf_http).


           [string](#language.types.string) nombre del filtro (longitud 15 max).




          **[SO_USER_COOKIE](#constant.so-user-cookie)**

           Define un identificador sobre el socket para el propósito de filtrar
           los paquetes sobre FreeBSD.


           [int](#language.types.integer)




          **[SO_RTABLE](#constant.so-rtable)**

           Define un identificador sobre el socket para el propósito de filtrar
           los paquetes sobre OpenBSD.


           [int](#language.types.integer)




          **[SO_DONTTRUNC](#constant.so-donttrunc)**

           Conserva los datos no leídos.


           [int](#language.types.integer)




          **[SO_WANTMORE](#constant.so-wantmore)**

           Proporciona un índice cuando más datos están listos.


           [int](#language.types.integer)




          **[TCP_DEFER_ACCEPT](#constant.tcp-defer-accept)**

           No notificar un socket que escucha hasta que los datos no estén listos.


           [int](#language.types.integer)




          **[SO_INCOMING_CPU](#constant.so-incoming-cpu)**

           Recupera/Define la afinidad del cpu para un socket.


           [int](#language.types.integer)




          **[SO_MEMINFO](#constant.so-meminfo)**

           Recupera toda la meminfo de un socket.


           [int](#language.types.integer)




          **[SO_BPF_EXTENSIONS](#constant.so-bpf-extensions)**

           Recupera las extensiones BPF soportadas por el kernel para adjuntar a un socket.


           [int](#language.types.integer)




          **[SO_SETFIB](#constant.so-setfib)**

           Define la tabla de encaminamiento (FIB) de un socket. (FreeBSD solamente)


           [int](#language.types.integer)




          **[SOL_FILTER](#constant.sol-filter)**

           Filtros atribuidos a un socket. (Solaris/Illumos solamente)


           [int](#language.types.integer)




          **[TCP_KEEPCNT](#constant.tcp-keepcnt)**

           Define el número máximo de sondas keepalive TCP debería enviar antes de soltar la conexión.


           [int](#language.types.integer)




          **[TCP_KEEPIDLE](#constant.tcp-keepidle)**

           Define el tiempo que la conexión debe permanecer inactiva.


           [int](#language.types.integer)




          **[TCP_KEEPINTVL](#constant.tcp-keepintvl)**

           Define el tiempo entre las sondas keepalive individuales.


           [int](#language.types.integer)




          **[TCP_KEEPALIVE](#constant.tcp-keepalive)**

           Define el tiempo que la conexión debe permanecer inactiva. (macOS solamente)


           [int](#language.types.integer)




          **[TCP_NOTSENT_LOWAT](#constant.tcp-notsent-lowat)**

           Define el número límite de datos no enviados en la cola de escritura
           por el flujo de socket. (Linux solamente)


           [int](#language.types.integer)









### Valores devueltos

Retorna el valor de la opción proporcionada, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con socket_get_option()**

&lt;?php
$socket = socket_create_listen(1223);

$linger = array('l_linger' =&gt; 1, 'l_onoff' =&gt; 1);
socket_set_option($socket, SOL_SOCKET, SO_LINGER, $linger);

var_dump(socket_get_option($socket, SOL_SOCKET, SO_REUSEADDR));
?&gt;

### Ver también

    - [socket_create_listen()](#function.socket-create-listen) - Abre un socket en un puerto para aceptar conexiones

    - [socket_set_option()](#function.socket-set-option) - Modifica las opciones de socket

# socket_getopt

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_getopt — Alias de [socket_get_option()](#function.socket-get-option)

### Descripción

Esta función es un alias de:
[socket_get_option()](#function.socket-get-option).

# socket_getpeername

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_getpeername — Interroga el otro extremo de la comunicación

### Descripción

**socket_getpeername**([Socket](#class.socket) $socket, [string](#language.types.string) &amp;$address, [int](#language.types.integer) &amp;$port = **[null](#constant.null)**): [bool](#language.types.boolean)

Interroga el otro extremo de la comunicación.

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada por
       [socket_create()](#function.socket-create) o [socket_accept()](#function.socket-accept).






     address


       Si el socket socket es de tipo
       **[AF_INET](#constant.af-inet)** o **[AF_INET6](#constant.af-inet6)**,
       **socket_getpeername()** devolverá
       *la dirección IP* del host, en notación numérica (por ejemplo,
       127.0.0.1 o fe80::1) en el
       parámetro address, y si el parámetro opcional
       port está presente, también devolverá el puerto
       de la comunicación establecida.




       Si el socket socket es de tipo **[AF_UNIX](#constant.af-unix)**,
       **socket_getpeername()** devolverá la ruta en el
       sistema de archivos (por ejemplo, /var/run/daemon.sock) en el
       parámetro address.






     port


       Si se proporciona, este debe ser el puerto asociado a la dirección
       del parámetro address.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error. **socket_getpeername()** también puede
devolver **[false](#constant.false)** si el tipo del socket no es ni **[AF_INET](#constant.af-inet)**,
**[AF_INET6](#constant.af-inet6)** ni **[AF_UNIX](#constant.af-unix)**, en cuyo caso el
último código de error del socket _no_ se modifica.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

### Notas

**Nota**:

    [socket_getsockname()](#function.socket-getsockname) no debe usarse con los sockets
    **[AF_UNIX](#constant.af-unix)** creados con [socket_accept()](#function.socket-accept).
    Solo los sockets creados con [socket_connect()](#function.socket-connect) o un socket
    servidor primario tras una llamada a [socket_bind()](#function.socket-bind) devolverán
    valores lógicos.

**Nota**:

    Para que la función **socket_getpeername()** devuelva un
    valor coherente, el socket sobre el que se llama a la función debe ser
    evidentemente uno para el que el concepto de "peer" tiene sentido.

### Ver también

    - [socket_getsockname()](#function.socket-getsockname) - Interroga el socket local

    - [socket_last_error()](#function.socket-last-error) - Lee el último error generado por un socket

    - [socket_strerror()](#function.socket-strerror) - Devuelve un string describiendo un mensaje de error

# socket_getsockname

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_getsockname — Interroga el socket local

### Descripción

**socket_getsockname**([Socket](#class.socket) $socket, [string](#language.types.string) &amp;$address, [int](#language.types.integer) &amp;$port = **[null](#constant.null)**): [bool](#language.types.boolean)

**Nota**:

    **socket_getsockname()** no debe ser utilizada con los sockets
    **[AF_UNIX](#constant.af-unix)** creados con [socket_connect()](#function.socket-connect).
    Solo los sockets tras una llamada a [socket_bind()](#function.socket-bind) devolverán
    valores lógicos.

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada por
       [socket_create()](#function.socket-create) o [socket_accept()](#function.socket-accept).






     address


       Si el socket socket es de tipo **[AF_INET](#constant.af-inet)**,
       o **[AF_INET6](#constant.af-inet6)**, **socket_getsockname()** devolverá
       *la dirección IP* local, en notación numérica (e.g.
       127.0.0.1 o fe80::1) en el parámetro
       address, y si el parámetro opcional
       port está presente, también devolverá el puerto de la
       comunicación establecida.




       Si el socket socket es de tipo **[AF_UNIX](#constant.af-unix)**,
       **socket_getsockname()** devolverá la ruta en el
       sistema de archivos (e.g. /var/run/daemon.sock) en el
       parámetro address.






     port


       Si se proporciona, este deberá ser el puerto asociado a la dirección.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error. **socket_getsockname()** también
puede devolver **[false](#constant.false)** si el tipo del socket no es ni **[AF_INET](#constant.af-inet)**,
ni **[AF_INET6](#constant.af-inet6)**, ni **[AF_UNIX](#constant.af-unix)**, en cuyo caso
el último código de error socket no es _modificado_.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

### Ver también

    - [socket_getpeername()](#function.socket-getpeername) - Interroga el otro extremo de la comunicación

    - [socket_last_error()](#function.socket-last-error) - Lee el último error generado por un socket

    - [socket_strerror()](#function.socket-strerror) - Devuelve un string describiendo un mensaje de error

# socket_import_stream

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

socket_import_stream — Importa un flujo

### Descripción

**socket_import_stream**([resource](#language.types.resource) $stream): [Socket](#class.socket)|[false](#language.types.singleton)

Importa un flujo que encapsula un socket en un recurso.

### Parámetros

     stream


       El recurso de flujo a importar.





### Valores devueltos

Devuelve **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [Socket](#class.socket); anteriormente se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Ejemplo con socket_import_stream()**

&lt;?php
$stream = stream_socket_server("udp://0.0.0.0:58380", $errno, $errstr, STREAM_SERVER_BIND);
$sock = socket_import_stream($stream);
?&gt;

### Ver también

    - [stream_socket_server()](#function.stream-socket-server) - Crea un socket de servidor Unix o Internet

# socket_last_error

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_last_error — Lee el último error generado por un socket

### Descripción

**socket_last_error**([?](#language.types.null)[Socket](#class.socket) $socket = **[null](#constant.null)**): [int](#language.types.integer)

Si una instancia de [Socket](#class.socket) es pasada a esta función, el último error
que haya sido generado por este socket será devuelto. Si socket
es **[null](#constant.null)**, el último código de error generado es devuelto.
Este comportamiento es particularmente práctico para funciones como
[socket_create()](#function.socket-create) que no devuelven un socket
en caso de fallo, y [socket_select()](#function.socket-select) que puede
fallar sin razón directamente relacionada con el socket. El código de error
puede ser transmitido a [socket_strerror()](#function.socket-strerror) que devuelve
un mensaje de error legible.

Si no ha ocurrido ningún error, o si el error ha sido
eliminado con la función [socket_clear_error()](#function.socket-clear-error),
esta función devolverá 0.

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada por
       [socket_create()](#function.socket-create).





### Valores devueltos

Devuelve el código de error asociado al socket.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

      8.0.0

       socket ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con socket_last_error()**

&lt;?php
$socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if ($socket === false) {
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);

    die("Imposible crear el socket : [$errorcode] $errormsg");

}
?&gt;

### Notas

**Nota**:

    **socket_last_error()** no borra el código de error. Utilice
    en su lugar la función [socket_clear_error()](#function.socket-clear-error) para ello.

# socket_listen

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_listen — Espera una conexión en un socket

### Descripción

**socket_listen**([Socket](#class.socket) $socket, [int](#language.types.integer) $backlog = 0): [bool](#language.types.boolean)

Una vez que el socket socket ha sido
creado con la función [socket_create()](#function.socket-create)
y vinculado a un nombre con la función
[socket_bind()](#function.socket-bind), puede ponerse en espera de la
conexión entrante.

**socket_listen()** solo funciona con sockets de
tipo **[SOCK_STREAM](#constant.sock-stream)** y **[SOCK_SEQPACKET](#constant.sock-seqpacket)**.

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada por
       [socket_create()](#function.socket-create) o [socket_addrinfo_bind()](#function.socket-addrinfo-bind).






     backlog


       Un número máximo de backlog conexiones serán puestas
       en espera de procesamiento. Si una solicitud de conexión llega y la
       cola está llena, el cliente recibirá un error indicando
       ECONNREFUSED, o, si el protocolo de soporte acepta
       retransmisiones, la solicitud será ignorada para que los intentos
       posteriores finalmente tengan éxito.



      **Nota**:



        El número máximo pasado en el parámetro backlog
        depende principalmente de la plataforma de soporte. En Linux, se trunca
        automáticamente a **[SOMAXCONN](#constant.somaxconn)**. En Windows,
        si la constante **[SOMAXCONN](#constant.somaxconn)** es pasada, el servicio
        responsable de los sockets elegirá un valor máximo *razonable*.
        No hay método para adivinar el valor realmente elegido.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error. El código de error generado puede obtenerse llamando a la
función [socket_last_error()](#function.socket-last-error). Este código de error
puede pasarse a la función [socket_strerror()](#function.socket-strerror)
para obtener un mensaje de error legible por humanos.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

### Ver también

    - [socket_accept()](#function.socket-accept) - Acepta una conexión en un socket

    - [socket_bind()](#function.socket-bind) - Asocia un nombre a un socket

    - [socket_connect()](#function.socket-connect) - Crea una conexión en un socket

    - [socket_create()](#function.socket-create) - Crea un socket

    - [socket_strerror()](#function.socket-strerror) - Devuelve un string describiendo un mensaje de error

    - [socket_addrinfo_bind()](#function.socket-addrinfo-bind) - Crea y vincula un socket a una dirección dada

# socket_read

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_read — Lee datos de un socket

### Descripción

**socket_read**([Socket](#class.socket) $socket, [int](#language.types.integer) $length, [int](#language.types.integer) $mode = **[PHP_BINARY_READ](#constant.php-binary-read)**): [string](#language.types.string)|[false](#language.types.singleton)

**socket_read()** lee datos desde la instancia de
[Socket](#class.socket) socket, creada por
[socket_create()](#function.socket-create) o [socket_accept()](#function.socket-accept).

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada por
       [socket_create()](#function.socket-create) o [socket_accept()](#function.socket-accept).






     length


       Lee un máximo de length bytes. De lo contrario, puede utilizarse \r,
       \n o \0
       para terminar la lectura (según el valor elegido para
       mode, ver a continuación).






     mode


       El parámetro opcional mode puede tomar uno
       de los siguientes valores constantes:



        -

          **[PHP_BINARY_READ](#constant.php-binary-read)** (Por omisión) - utiliza la función del sistema
          recv(). Capaz de leer datos binarios.



        -

          **[PHP_NORMAL_READ](#constant.php-normal-read)** - la lectura se detiene en \n
          y \r







### Valores devueltos

**socket_read()** devuelve los datos en forma de
string en caso de éxito, y **[false](#constant.false)** en caso contrario (incluyendo si el host remoto
ha cerrado la conexión). El código
de error generado puede obtenerse llamando a la función
[socket_last_error()](#function.socket-last-error). Este código de error
puede pasarse a la función [socket_strerror()](#function.socket-strerror)
para obtener un mensaje de error legible por humanos.

**Nota**:

    **socket_read()** devuelve un string de longitud
    cero (""), cuando ya no hay más datos para leer.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

### Ver también

    - [socket_accept()](#function.socket-accept) - Acepta una conexión en un socket

    - [socket_bind()](#function.socket-bind) - Asocia un nombre a un socket

    - [socket_connect()](#function.socket-connect) - Crea una conexión en un socket

    - [socket_listen()](#function.socket-listen) - Espera una conexión en un socket

    - [socket_last_error()](#function.socket-last-error) - Lee el último error generado por un socket

    - [socket_strerror()](#function.socket-strerror) - Devuelve un string describiendo un mensaje de error

    - [socket_write()](#function.socket-write) - Escribe en un socket

# socket_recv

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_recv — Recibe datos de un socket conectado

### Descripción

**socket_recv**(
    [Socket](#class.socket) $socket,
    [?](#language.types.null)[string](#language.types.string) &amp;$data,
    [int](#language.types.integer) $length,
    [int](#language.types.integer) $flags
): [int](#language.types.integer)|[false](#language.types.singleton)

La función **socket_recv()** recibe
length bytes de datos en data desde
socket. **socket_recv()** puede ser utilizada
para recuperar datos desde sockets conectados. Asimismo, los flags
permiten modificar el comportamiento de la función.

data se pasa por referencia, por lo que debe estar presente
en la lista de argumentos. Los datos recibidos desde la
socket por **socket_recv()**
serán devueltos en data.

### Parámetros

     socket


       socket debe ser una instancia de [Socket](#class.socket)
       previamente creada por [socket_create()](#function.socket-create).







     data


       Los datos recibidos serán transmitidos en
       data. Si ocurre un error, si la conexión
       está cerrada o si no hay datos disponibles,
       data valdrá entonces **[null](#constant.null)**.







     length


       Hasta length bytes serán leídos desde
       el host remoto.







     flags


       El valor de flags puede ser una combinación
       de los siguientes flags, agrupados mediante el operador OR binario
       (|).





       <caption>**Valores posibles de flags**</caption>



          Flag
          Descripción






          **[MSG_OOB](#constant.msg-oob)**

           Trata datos fuera de banda.




          **[MSG_PEEK](#constant.msg-peek)**

           Recibe los datos desde el inicio de la cola sin eliminarlos de la cola.




          **[MSG_WAITALL](#constant.msg-waitall)**

           Bloquea antes de que al menos length bytes sean recibidos.
           Sin embargo, si se intercepta una señal o la conexión se termina,
           la función puede devolver menos datos.




          **[MSG_DONTWAIT](#constant.msg-dontwait)**

           Si este flag está especificado, la función devolverá datos cuando normalmente habría bloqueado.









### Valores devueltos

**socket_recv()** devuelve el número de bytes recibidos,
o **[false](#constant.false)** si ha ocurrido un error. El código de error actual puede ser
recuperado llamando a [socket_last_error()](#function.socket-last-error). Este código
de error puede ser pasado a la función [socket_strerror()](#function.socket-strerror)
para obtener una representación textual del error.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplos con socket_recv()**



     Este ejemplo es una reescritura del ejemplo tomado en
     [Ejemplos](#sockets.examples) para utilizar
     **socket_recv()**.

&lt;?php
error_reporting(E_ALL);

echo "&lt;h2&gt;Conexión TCP/IP&lt;/h2&gt;\n";

/_ Obtiene el puerto del servicio WWW. _/
$service_port = getservbyname('www', 'tcp');

/_ Obtiene la dirección IP del host objetivo. _/
$address = gethostbyname('www.example.com');

/_ Crea un socket TCP/IP. _/
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
echo "socket_create() ha fallado: razón: " . socket_strerror(socket_last_error()) . "\n";
} else {
echo "OK.\n";
}

echo "Intentando conectar a '$address' en el puerto '$service_port'...";
$result = socket_connect($socket, $address, $service_port);
if ($result === false) {
echo "socket_connect() ha fallado.\nRazón: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
} else {
echo "OK.\n";
}

$in = "HEAD / HTTP/1.1\r\n";
$in .= "Host: www.example.com\r\n";
$in .= "Connexion: Cerrada\r\n\r\n";
$out = '';

echo "Enviando una solicitud HTTP HEAD...";
socket_write($socket, $in, strlen($in));
echo "OK.\n";

echo "Leyendo la respuesta:\n\n";
$buf = 'Este es mi búfer.';
if (false !== ($bytes = socket_recv($socket, $buf, 2048, MSG_WAITALL))) {
    echo "$bytes bytes leídos desde socket_recv(). Cerrando el socket...";
} else {
echo "socket_recv() ha fallado; razón: " . socket_strerror(socket_last_error($socket)) . "\n";
}
socket_close($socket);

echo $buf . "\n";
echo "OK.\n\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

&lt;h2&gt;Conexión TCP/IP&lt;/h2&gt;
OK.
Intentando conectar a '208.77.188.166' en el puerto '80'...OK.
Enviando una solicitud HTTP HEAD...OK.
Leyendo la respuesta:

123 bytes leídos desde socket_recv(). Cerrando el socket...HTTP/1.1 200 OK
Date: Mon, 14 Sep 2009 08:56:36 GMT
Server: Apache/2.2.3 (Red Hat)
Last-Modified: Tue, 15 Nov 2005 13:24:10 GMT
ETag: "b80f4-1b6-80bfd280"
Accept-Ranges: bytes
Content-Length: 438
Connexion : Cerrada
Content-Type: text/html; charset=UTF-8

OK.

# socket_recvfrom

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_recvfrom — Recibe datos de un socket, conectado o no

### Descripción

**socket_recvfrom**(
    [Socket](#class.socket) $socket,
    [string](#language.types.string) &amp;$data,
    [int](#language.types.integer) $length,
    [int](#language.types.integer) $flags,
    [string](#language.types.string) &amp;$address,
    [int](#language.types.integer) &amp;$port = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)

La función **socket_recvfrom()** recibe
length bytes de datos del buffer data
desde address en el puerto port (si el socket
no es del tipo **[AF_UNIX](#constant.af-unix)**), utilizando
socket. **socket_recvfrom()** puede ser utilizado
para recuperar los datos desde sockets conectadas o no. Asimismo,
uno o varios flags pueden ser especificados para modificar este comportamiento.

Los parámetros address y port
deben ser pasados por referencia. Si el socket no está conectado,
address contendrá la dirección internet del host remoto o
la ruta del socket Unix. Si el socket está conectado, address
valdrá **[null](#constant.null)**. Asimismo, el parámetro port contendrá
el puerto del host remoto en el caso de un socket **[AF_INET](#constant.af-inet)** o
**[AF_INET6](#constant.af-inet6)**.

**Nota**: Esta función es
segura para sistemas binarios.

### Parámetros

     socket


       El parámetro socket debe ser una instancia
       de [Socket](#class.socket) creada por [socket_create()](#function.socket-create).







     data


       Los datos recuperados serán colocados en la variable especificada
       por este parámetro.







     length


       Hasta length bytes deben ser recuperados
       del host remoto.







     flags


       El valor de este parámetro puede ser una combinación de los flags siguientes,
       unidos por un OR binario (|).





       <caption>**Valores posibles para flags**</caption>



          Flag
          Descripción






          **[MSG_OOB](#constant.msg-oob)**

           Procesamiento fuera de la banda de datos.




          **[MSG_PEEK](#constant.msg-peek)**

           Recibe los datos desde el inicio de la cola de recepción
           sin eliminarlos de esta cola.




          **[MSG_WAITALL](#constant.msg-waitall)**

           Bloquea hasta que al menos length bytes hayan
           sido recibidos. Sin embargo, si se recibe una señal o el host remoto
           se desconecta, la función podrá retornar menos datos.




          **[MSG_DONTWAIT](#constant.msg-dontwait)**

           Cuando este flag está definido, la función retorna datos
           incluso si debería permanecer bloqueada.











     address


       Si el socket es del tipo **[AF_UNIX](#constant.af-unix)**,
       address será la ruta hacia este fichero. De lo contrario,
       para los sockets no-conectados, address es la dirección
       IP del host remoto, o **[null](#constant.null)** si el socket está conectado.







     port


       Este argumento solo se aplica a los sockets **[AF_INET](#constant.af-inet)** y
       **[AF_INET6](#constant.af-inet6)**, y especifica el puerto remoto desde el cual
       los datos son recibidos. Si el socket está conectado,
       port valdrá **[null](#constant.null)**.





### Valores devueltos

**socket_recvfrom()** retorna el número de bytes
recibidos, o **[false](#constant.false)** si ocurre un error. El código de error actual puede
ser obtenido llamando a la función [socket_last_error()](#function.socket-last-error).
Este código de error puede ser pasado a la función [socket_strerror()](#function.socket-strerror)
para obtener una explicación textual del error.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con socket_recvfrom()**

&lt;?php

$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
socket_bind($socket, '127.0.0.1', 1223);

$from = '';
$port = 0;
socket_recvfrom($socket, $buf, 12, 0, $from, $port);

echo "Recepción de $buf desde la dirección remota $from y del puerto remoto $port" . PHP_EOL;
?&gt;

     Este ejemplo inicializa un socket UDP en el puerto 1223 de la dirección
     127.0.0.1 y muestra al menos 12 caracteres recibidos desde el host remoto.

### Ver también

    - [socket_recv()](#function.socket-recv) - Recibe datos de un socket conectado

    - [socket_send()](#function.socket-send) - Envía datos a un socket conectado

    - [socket_sendto()](#function.socket-sendto) - Envía un mensaje a un socket, ya esté conectado o no

    - [socket_create()](#function.socket-create) - Crea un socket

# socket_recvmsg

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

socket_recvmsg — Lee un mensaje

### Descripción

**socket_recvmsg**([Socket](#class.socket) $socket, [array](#language.types.array) &amp;$message, [int](#language.types.integer) $flags = 0): [int](#language.types.integer)|[false](#language.types.singleton)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     socket








     message








     flags







### Valores devueltos

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

### Ver también

    - [socket_sendmsg()](#function.socket-sendmsg) - Envía un mensaje

    - [socket_cmsg_space()](#function.socket-cmsg-space) - Calcula el tamaño del búfer

# socket_select

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_select — Ejecuta la llamada al sistema select() sobre un array de sockets con un tiempo de expiración

### Descripción

**socket_select**(
    [?](#language.types.null)[array](#language.types.array) &amp;$read,
    [?](#language.types.null)[array](#language.types.array) &amp;$write,
    [?](#language.types.null)[array](#language.types.array) &amp;$except,
    [?](#language.types.null)[int](#language.types.integer) $seconds,
    [int](#language.types.integer) $microseconds = 0
): [int](#language.types.integer)|[false](#language.types.singleton)

**socket_select()** acepta un array de sockets y
espera a que cambien de estado. Quienes estén familiarizados con los
sockets de BSD reconocerán en estos arrays de sockets los juegos de punteros a ficheros. Tres arrays independientes
de sockets son monitorizados.

### Parámetros

     read


       Los sockets listados en el argumento read
       serán monitorizados en lectura: para saber cuándo están
       disponibles para lectura (más precisamente, si una lectura
       no va a bloquear, en particular, un socket ya
       ha alcanzado un fin de archivo, en cuyo caso [socket_read()](#function.socket-read)
       devolverá una string de tamaño cero).






     write


       Los sockets listados en write serán monitorizados
       en escritura: para ver si una escritura no va a bloquear.






     except


       Los sockets listados en except serán monitorizados para
       sus excepciones.






     seconds


       Los argumentos seconds y microseconds
       juntos forman el argumento timeout (duración).
       El timeout es la duración máxima de tiempo antes de que
       **socket_select()** termine.
       seconds puede ser cero, lo que hará que
       **socket_select()** devuelva inmediatamente. Esto es muy
       útil para hacer polling (sondaje). Si seconds es **[null](#constant.null)**
       (sin timeout), **socket_select()** puede bloquearse indefinidamente.






     microseconds







**Advertencia**

    Al salir de la función, los arrays son modificados para indicar
    qué sockets han cambiado de estado.

No es necesario pasar todos los arrays a
**socket_select()**. Pueden ser omitidos, o
puede usarse un array vacío, o incluso **[null](#constant.null)** en su lugar. No olvide
que estos arrays son pasados por _referencia_ y
serán modificados por **socket_select()**.

**Nota**:

    Debido a una limitación del motor Zend actual, no es posible
    pasar una constante como **[null](#constant.null)** directamente como argumento a esta
    función, que espera una referencia. En su lugar, utilice un array temporal o una expresión donde el miembro izquierdo
    sea una variable temporal:



     **Ejemplo #1 Pasar [null](#constant.null)** a **socket_select()**




&lt;?php
$e = NULL;
socket_select($r, $w, $e, 0);
?&gt;

### Valores devueltos

En caso de éxito, **socket_select()** devuelve el número de
sockets contenidas en los arrays modificados. Este número puede ser cero si
se alcanzó el tiempo máximo de espera. En caso de error, **[false](#constant.false)**
es devuelto. El código de error generado puede ser obtenido llamando a la
función [socket_last_error()](#function.socket-last-error).

**Nota**:

    Asegúrese de usar el operador ===
    cuando verifique los errores. Dado que
    **socket_select()** puede devolver 0, la comparación
    con **[false](#constant.false)** mediante == daría **[true](#constant.true)**:



     **Ejemplo #2 Analizar el resultado de socket_select()**




&lt;?php
$e = NULL;
if (false === socket_select($r, $w, $e, 0)) {
echo "socket_select() falló. Razón: " .
socket_strerror(socket_last_error()) . "\n";
}
?&gt;

### Ejemplos

    **Ejemplo #3 Ejemplo con socket_select()**

&lt;?php
/_ Prepara el array read (sockets monitorizadas en lectura) _/
$read   = array($socket1, $socket2);
$write = NULL;
$except = NULL;
$num_changed_sockets = socket_select($read, $write, $except, 0);

if ($num_changed_sockets === false) {
  /* Manejo de errores */
} else if ($num_changed_sockets &gt; 0) {
/_ Al menos una de las sockets ha sido modificada _/
}
?&gt;

### Notas

**Nota**:

    Tenga cuidado con las implementaciones de sockets, que deben ser manipuladas con
    delicadeza. Algunas reglas básicas:



     -

       Siempre debe intentarse usar **socket_select()**
       sin timeout. Su programa no debería hacer nada si
       no hay datos disponibles. El código que depende de un
       timeout generalmente es poco portable y difícil de depurar.



     -

       Un socket no debe ser añadido a uno de los arrays de argumentos,
       si no se desea verificar el resultado después de la llamada a
       **socket_select()**. Después del retorno de
       **socket_select()**, todos los sockets en todos los
       arrays deben ser verificados. Todo socket que esté disponible en
       escritura o lectura debe ser usado para escribir o leer.



     -

       Si escribe o lee con un socket devuelto en un array,
       tenga en cuenta que no podrá escribir o leer todas las datos
       que solicite. Esté preparado para poder leer solo un byte.



     -

       Es común a la mayoría de las implementaciones de sockets que la única
       excepción interceptada por los sockets en el array
       except sea el caso de datos fuera de límites,
       recibidos por un socket.



### Ver también

    - [socket_read()](#function.socket-read) - Lee datos de un socket

    - [socket_write()](#function.socket-write) - Escribe en un socket

    - [socket_last_error()](#function.socket-last-error) - Lee el último error generado por un socket

    - [socket_strerror()](#function.socket-strerror) - Devuelve un string describiendo un mensaje de error

# socket_send

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_send — Envía datos a un socket conectado

### Descripción

**socket_send**(
    [Socket](#class.socket) $socket,
    [string](#language.types.string) $data,
    [int](#language.types.integer) $length,
    [int](#language.types.integer) $flags
): [int](#language.types.integer)|[false](#language.types.singleton)

La función **socket_send()** envía
length bytes al socket
socket desde el buffer data.

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada por
       [socket_create()](#function.socket-create) o [socket_accept()](#function.socket-accept).






     data


       Un buffer que contiene los datos que serán enviados al host remoto.






     length


       El número de bytes que deben ser enviados al host remoto
       desde el buffer data.






     flags


       El valor del parámetro flags puede ser una
       combinación de los siguientes flags, unidos por un OR a nivel de bits
       (|).



        <caption>**Valores posibles para flags**</caption>



           **[MSG_OOB](#constant.msg-oob)**

            Trata los datos OOB (out-of-band).




           **[MSG_EOR](#constant.msg-eor)**

            Indica un marcador de registro. Los datos enviados
            completan el registro.




           **[MSG_EOF](#constant.msg-eof)**

            Termina el envío a través del socket e incluye una notificación
            apropiada al final de los datos enviados. Los datos enviados
            completan la transacción.




           **[MSG_DONTROUTE](#constant.msg-dontroute)**

            Ignora el enrutamiento, utiliza una interfaz directa.










### Valores devueltos

Devuelve el número de bytes enviados, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

### Ver también

    - [socket_sendto()](#function.socket-sendto) - Envía un mensaje a un socket, ya esté conectado o no

# socket_sendmsg

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

socket_sendmsg — Envía un mensaje

### Descripción

**socket_sendmsg**([Socket](#class.socket) $socket, [array](#language.types.array) $message, [int](#language.types.integer) $flags = 0): [int](#language.types.integer)|[false](#language.types.singleton)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     socket








     message








     flags







### Valores devueltos

Devuelve el número de bytes enviados, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

### Ver también

    - [socket_recvmsg()](#function.socket-recvmsg) - Lee un mensaje

    - [socket_cmsg_space()](#function.socket-cmsg-space) - Calcula el tamaño del búfer

# socket_sendto

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_sendto — Envía un mensaje a un socket, ya esté conectado o no

### Descripción

**socket_sendto**(
    [Socket](#class.socket) $socket,
    [string](#language.types.string) $data,
    [int](#language.types.integer) $length,
    [int](#language.types.integer) $flags,
    [string](#language.types.string) $address,
    [?](#language.types.null)[int](#language.types.integer) $port = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)

**socket_sendto()** envía length
octetos del buffer data a través del socket
socket, hacia el puerto port,
a la dirección address.

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada por [socket_create()](#function.socket-create).






     data


       Los datos a enviar serán tomados del buffer
       data.






     length


       length octetos de data
       deben ser enviados.






     flags


       Puede ser una combinación de los siguientes flags, unidos por
       un OR a nivel de bits (|).



        <caption>**Valores posibles para flags**</caption>



           **[MSG_OOB](#constant.msg-oob)**

            Trata los datos OOB (out-of-band).




           **[MSG_EOR](#constant.msg-eor)**

            Indica un marcador de registro. Los datos enviados
            completan el registro.




           **[MSG_EOF](#constant.msg-eof)**

            Termina el envío a través del socket e incluye una notificación
            apropiada al final de los datos enviados. Los datos enviados
            completan la transacción.




           **[MSG_DONTROUTE](#constant.msg-dontroute)**

            Ignora el enrutamiento, usa una interfaz directa.











     address


       La dirección IP del host remoto.






     port


       port es el número de puerto al cual los
       datos deben ser enviados.





### Valores devueltos

**socket_sendto()** devuelve el número de octetos
enviados al host remoto o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

      8.0.0

       port ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con socket_sendto()**

&lt;?php
$sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);

$msg = "Ping !";
$len = strlen($msg);

socket_sendto($sock, $msg, $len, 0, '127.0.0.1', 1223);
socket_close($sock);
?&gt;

### Ver también

    - [socket_send()](#function.socket-send) - Envía datos a un socket conectado

# socket_set_block

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

socket_set_block — Establece el socket en modo bloqueante

### Descripción

**socket_set_block**([Socket](#class.socket) $socket): [bool](#language.types.boolean)

**socket_set_block()** elimina la opción
**[O_NONBLOCK](#constant.o-nonblock)** del socket especificado por
socket.

Cuando se realiza una operación (por ejemplo, recepción, envío, conexión, aceptación, etc.)
sobre un socket no bloqueante, el script no se pone en pausa
hasta que recibe una señal. En su lugar, si la operación debe resultar en
un bloqueo, la función llamada fallará.

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada por
       [socket_create()](#function.socket-create) o [socket_accept()](#function.socket-accept).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con socket_set_block()**

&lt;?php
$socket = socket_create_listen(1223);
socket_set_block($socket);

socket_accept($socket);
?&gt;

     Este ejemplo crea un socket que escucha todas las interfaces del puerto 1223 y
     establece el socket en modo **[O_BLOCK](#constant.o-block)**.
     [socket_accept()](#function.socket-accept) esperará hasta que haya una
     conexión para aceptar.

### Ver también

    - [socket_set_nonblock()](#function.socket-set-nonblock) - Selecciona el modo no bloqueante de un puntero de fichero

    - [socket_set_option()](#function.socket-set-option) - Modifica las opciones de socket

# socket_set_nonblock

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_set_nonblock — Selecciona el modo no bloqueante de un puntero de fichero

### Descripción

**socket_set_nonblock**([Socket](#class.socket) $socket): [bool](#language.types.boolean)

La función **socket_set_nonblock()** configura la opción
**[O_NONBLOCK](#constant.o-nonblock)** para el socket especificado por el argumento
socket.

Cuando una operación (por ejemplo, recepción, envío, conexión, aceptación, etc.)
se realiza sobre un socket no bloqueante, el script no se pone en pausa
mientras recibe una señal. En su lugar, si la operación debe resultar en
un bloqueo, la función llamada fallará.

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada por
       [socket_create()](#function.socket-create) o [socket_accept()](#function.socket-accept).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con socket_set_nonblock()**

&lt;?php
$socket = socket_create_listen(1223);
socket_set_nonblock($socket);

socket_accept($socket);
?&gt;

     Este ejemplo crea un socket escuchando todas las interfaces en el puerto 1223 y
     define el socket en modo **[O_NONBLOCK](#constant.o-nonblock)**.
     [socket_accept()](#function.socket-accept) fallará inmediatamente si hay una conexión
     pendiente exactamente en ese momento.

### Ver también

    - [socket_set_block()](#function.socket-set-block) - Establece el socket en modo bloqueante

    - [socket_set_option()](#function.socket-set-option) - Modifica las opciones de socket

    - [stream_set_blocking()](#function.stream-set-blocking) - Configura el modo de bloqueo de un flujo

# socket_set_option

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

socket_set_option — Modifica las opciones de socket

### Descripción

**socket_set_option**(
    [Socket](#class.socket) $socket,
    [int](#language.types.integer) $level,
    [int](#language.types.integer) $option,
    [array](#language.types.array)|[string](#language.types.string)|[int](#language.types.integer) $value
): [bool](#language.types.boolean)

**socket_set_option()** configura la opción especificada por
option, al nivel de protocolo
level al valor apuntado por
value para el socket especificado por
socket.

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada por
       [socket_create()](#function.socket-create) o [socket_accept()](#function.socket-accept).






     level


       El parámetro level especifica la capa del
       protocolo de la opción. Por ejemplo, para modificar una opción de
       la capa socket, se utiliza un nivel igual a **[SOL_SOCKET](#constant.sol-socket)**.
       Otros niveles, como TCP, pueden ser utilizados especificando un número de protocolo para este nivel.
       Los números de protocolos pueden ser utilizados utilizando la función
       [getprotobyname()](#function.getprotobyname).






     option


       Las opciones disponibles son las mismas que para
       la función [socket_get_option()](#function.socket-get-option).






     value


       El valor de la opción.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

### Ejemplos

    **Ejemplo #1 Ejemplo con socket_set_option()**

&lt;?php
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

if (!is_resource($socket)) {
echo 'No es posible crear el socket: '. socket_strerror(socket_last_error()) . PHP_EOL;
}

if (!socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1)) {
echo 'No es posible definir la opción del socket: '. socket_strerror(socket_last_error()) . PHP_EOL;
}

if (!socket_bind($socket, '127.0.0.1', 1223)) {
echo 'No es posible vincular el socket: '. socket_strerror(socket_last_error()) . PHP_EOL;
}

$rval = socket_get_option($socket, SOL_SOCKET, SO_REUSEADDR);

if ($rval === false) {
    echo 'No es posible recuperar la opción del socket: '. socket_strerror(socket_last_error()) . PHP_EOL;
} else if ($rval !== 0) {
echo 'SO_REUSEADDR está definido en el socket!' . PHP_EOL;
}
?&gt;

### Ver también

    - [socket_create()](#function.socket-create) - Crea un socket

    - [socket_bind()](#function.socket-bind) - Asocia un nombre a un socket

    - [socket_strerror()](#function.socket-strerror) - Devuelve un string describiendo un mensaje de error

    - [socket_last_error()](#function.socket-last-error) - Lee el último error generado por un socket

    - [socket_get_option()](#function.socket-get-option) - Lee las opciones del socket

# socket_setopt

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_setopt — Alias de [socket_set_option()](#function.socket-set-option)

### Descripción

Esta función es un alias de:
[socket_set_option()](#function.socket-set-option).

# socket_shutdown

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_shutdown — Desactiva un socket en lectura y/o escritura

### Descripción

**socket_shutdown**([Socket](#class.socket) $socket, [int](#language.types.integer) $mode = 2): [bool](#language.types.boolean)

**socket_shutdown()** permite evitar que los datos
entrantes o salientes o ambos (por omisión) sean emitidos a través
del socket socket.

**Nota**:

    Los buffers asociados pueden o no ser vaciados.

### Parámetros

     socket


       Una instancia de [Socket](#class.socket) creada por [socket_create()](#function.socket-create).






     mode


       El valor del parámetro mode puede ser uno
       de los siguientes :



        <caption>**Valores posibles para mode**</caption>



           0

            Impide la lectura del socket




           1

            Impide la escritura del socket




           2

            Impide la escritura y la lectura del socket










### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

# socket_strerror

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_strerror — Devuelve un string describiendo un mensaje de error

### Descripción

**socket_strerror**([int](#language.types.integer) $error_code): [string](#language.types.string)

**socket_strerror()** toma un código de error como argumento
error_code. Este valor es frecuentemente devuelto por la
función [socket_last_error()](#function.socket-last-error). La función devuelve
el mensaje de error correspondiente.

**Nota**:

    Aunque los mensajes de error generados por la extensión socket estén
    en inglés, el sistema que gestiona los mensajes de esta función depende
    de la configuración local actual (**[LC_MESSAGES](#constant.lc-messages)**).

### Parámetros

     error_code


       Un número de error de socket válido, como el producido por la función
       [socket_last_error()](#function.socket-last-error).





### Valores devueltos

Devuelve el mensaje de error asociado con el argumento
error_code.

### Ejemplos

    **Ejemplo #1 Ejemplo con socket_strerror()**

&lt;?php
if (false == ($socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP))) {
echo "socket_create() ha fallado : razón : " . socket_strerror(socket_last_error()) . "\n";
}

if (false == (@socket_bind($socket, '127.0.0.1', 80))) {
   echo "socket_bind() ha fallado : razón : " . socket_strerror(socket_last_error($socket)) . "\n";
}
?&gt;

     La salida esperada para el ejemplo anterior (suponiendo que
     se intenta ejecutar el script sin los derechos de Administrador) :

socket_bind() ha fallado : razón : Permission denied

### Ver también

    - [socket_accept()](#function.socket-accept) - Acepta una conexión en un socket

    - [socket_bind()](#function.socket-bind) - Asocia un nombre a un socket

    - [socket_connect()](#function.socket-connect) - Crea una conexión en un socket

    - [socket_listen()](#function.socket-listen) - Espera una conexión en un socket

    - [socket_create()](#function.socket-create) - Crea un socket

# socket_write

(PHP 4 &gt;= 4.1.0, PHP 5, PHP 7, PHP 8)

socket_write — Escribe en un socket

### Descripción

**socket_write**([Socket](#class.socket) $socket, [string](#language.types.string) $data, [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)

**socket_write()** escribe en el socket
socket los datos del buffer
data.

### Parámetros

     socket








     data


       El buffer a escribir.






     length


       El parámetro opcional length puede especificar
       explícitamente el tamaño de los datos que deben ser escritos. Si esta
       longitud es mayor que el tamaño de data,
       será reducida automáticamente al tamaño de data mismo.





### Valores devueltos

**socket_write()** devuelve el número de bytes que han
podido ser escritos en el socket o **[false](#constant.false)** si ocurre un error.
El código de error generado puede ser obtenido llamando a la función
[socket_last_error()](#function.socket-last-error). Este código de error
puede ser pasado a la función [socket_strerror()](#function.socket-strerror)
para obtener un mensaje de error, legible para humanos.

**Nota**:

    Es perfectamente válido que **socket_write()** devuelva cero, lo que significa que ningún byte ha sido escrito. Asegúrese de utilizar el operador === para
    comparar el retorno de la función con **[false](#constant.false)**, y detectar un
    caso de error.

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

      8.0.0

       length ahora es nullable.



### Notas

**Nota**:

    **socket_write()** no escribe necesariamente todos
    los bytes de data proporcionados. Es válido que, siguiendo ciertas
    configuraciones de buffer de red, solo una cierta cantidad
    de datos, incluso un byte, sea escrito, incluso si data es más grande.
    Un ciclo debe ser utilizado para asegurarse de que el resto de data
    sea transmitido.

### Ver también

    - [socket_accept()](#function.socket-accept) - Acepta una conexión en un socket

    - [socket_bind()](#function.socket-bind) - Asocia un nombre a un socket

    - [socket_connect()](#function.socket-connect) - Crea una conexión en un socket

    - [socket_listen()](#function.socket-listen) - Espera una conexión en un socket

    - [socket_read()](#function.socket-read) - Lee datos de un socket

    - [socket_strerror()](#function.socket-strerror) - Devuelve un string describiendo un mensaje de error

# socket_wsaprotocol_info_export

(PHP 7 &gt;= 7.3.0, PHP 8)

socket_wsaprotocol_info_export — Exporta la estructura WSAPROTOCOL_INFO

### Descripción

**socket_wsaprotocol_info_export**([Socket](#class.socket) $socket, [int](#language.types.integer) $process_id): [string](#language.types.string)|[false](#language.types.singleton)

Exporta la estructura WSAPROTOCOL_INFO a la memoria compartida y devuelve
un identificador para su uso con [socket_wsaprotocol_info_import()](#function.socket-wsaprotocol-info-import). El ID exportado
solo es valido para el process_id especificado.

**Nota**:

    La función solo está disponible en Windows.

### Parámetros

    socket


      Una instancia de [Socket](#class.socket).






    process_id


      El identificador del proceso que importará el socket.


### Valores devueltos

Devuelve un identificador para la importación, o **[false](#constant.false)** si ocurre un error

### Historial de cambios

      Versión
      Descripción







8.0.0

socket ahora es una instancia de [Socket](#class.socket) ;
anteriormente, era un [resource](#language.types.resource).

### Ver también

- [socket_wsaprotocol_info_import()](#function.socket-wsaprotocol-info-import) - Importa un socket de otro proceso

- [socket_wsaprotocol_info_release()](#function.socket-wsaprotocol-info-release) - Libera una estructura WSAPROTOCOL_INFO exportada

# socket_wsaprotocol_info_import

(PHP 7 &gt;= 7.3.0, PHP 8)

socket_wsaprotocol_info_import — Importa un socket de otro proceso

### Descripción

**socket_wsaprotocol_info_import**([string](#language.types.string) $info_id): [Socket](#class.socket)|[false](#language.types.singleton)

Importa un socket que ha sido exportado previamente por otro proceso.

**Nota**:

    Esta función solo está disponible en Windows.


### Parámetros

    info_id


      El identificador que fue devuelto por una llamada previa a
      [socket_wsaprotocol_info_export()](#function.socket-wsaprotocol-info-export).


### Valores devueltos

Devuelve una instancia de [Socket](#class.socket) en caso de éxito, o **[false](#constant.false)** si ocurre un error

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función ahora devuelve una instancia de [Socket](#class.socket);
       anteriormente se devolvía un recurso.



### Ver también

- [socket_wsaprotocol_info_export()](#function.socket-wsaprotocol-info-export) - Exporta la estructura WSAPROTOCOL_INFO

# socket_wsaprotocol_info_release

(PHP 7 &gt;= 7.3.0, PHP 8)

socket_wsaprotocol_info_release — Libera una estructura WSAPROTOCOL_INFO exportada

### Descripción

**socket_wsaprotocol_info_release**([string](#language.types.string) $info_id): [bool](#language.types.boolean)

Libera la memoria compartida correspondiente al info_id dado.

**Nota**:

    Esta función solo está disponible en Windows.


### Parámetros

    info_id


      El identificador que fue devuelto por una llamada previa a
      [socket_wsaprotocol_info_export()](#function.socket-wsaprotocol-info-export).


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [socket_wsaprotocol_info_export()](#function.socket-wsaprotocol-info-export) - Exporta la estructura WSAPROTOCOL_INFO

## Tabla de contenidos

- [socket_accept](#function.socket-accept) — Acepta una conexión en un socket
- [socket_addrinfo_bind](#function.socket-addrinfo-bind) — Crea y vincula un socket a una dirección dada
- [socket_addrinfo_connect](#function.socket-addrinfo-connect) — Crea e inicia la conexión de un socket a una dirección dada
- [socket_addrinfo_explain](#function.socket-addrinfo-explain) — Proporciona información sobre addrinfo
- [socket_addrinfo_lookup](#function.socket-addrinfo-lookup) — Devuelve un array que contiene la información de getaddrinfo sobre el nombre de host dado
- [socket_atmark](#function.socket-atmark) — Determina si el socket está en la marca fuera de banda
- [socket_bind](#function.socket-bind) — Asocia un nombre a un socket
- [socket_clear_error](#function.socket-clear-error) — Elimina todos los errores generados previamente por un socket
- [socket_close](#function.socket-close) — Cierra una instancia de Socket
- [socket_cmsg_space](#function.socket-cmsg-space) — Calcula el tamaño del búfer
- [socket_connect](#function.socket-connect) — Crea una conexión en un socket
- [socket_create](#function.socket-create) — Crea un socket
- [socket_create_listen](#function.socket-create-listen) — Abre un socket en un puerto para aceptar conexiones
- [socket_create_pair](#function.socket-create-pair) — Crea un par de sockets idénticos y los almacena en un array
- [socket_export_stream](#function.socket-export-stream) — Exporta un socket en un flujo que encapsula un socket
- [socket_get_option](#function.socket-get-option) — Lee las opciones del socket
- [socket_getopt](#function.socket-getopt) — Alias de socket_get_option
- [socket_getpeername](#function.socket-getpeername) — Interroga el otro extremo de la comunicación
- [socket_getsockname](#function.socket-getsockname) — Interroga el socket local
- [socket_import_stream](#function.socket-import-stream) — Importa un flujo
- [socket_last_error](#function.socket-last-error) — Lee el último error generado por un socket
- [socket_listen](#function.socket-listen) — Espera una conexión en un socket
- [socket_read](#function.socket-read) — Lee datos de un socket
- [socket_recv](#function.socket-recv) — Recibe datos de un socket conectado
- [socket_recvfrom](#function.socket-recvfrom) — Recibe datos de un socket, conectado o no
- [socket_recvmsg](#function.socket-recvmsg) — Lee un mensaje
- [socket_select](#function.socket-select) — Ejecuta la llamada al sistema select() sobre un array de sockets con un tiempo de expiración
- [socket_send](#function.socket-send) — Envía datos a un socket conectado
- [socket_sendmsg](#function.socket-sendmsg) — Envía un mensaje
- [socket_sendto](#function.socket-sendto) — Envía un mensaje a un socket, ya esté conectado o no
- [socket_set_block](#function.socket-set-block) — Establece el socket en modo bloqueante
- [socket_set_nonblock](#function.socket-set-nonblock) — Selecciona el modo no bloqueante de un puntero de fichero
- [socket_set_option](#function.socket-set-option) — Modifica las opciones de socket
- [socket_setopt](#function.socket-setopt) — Alias de socket_set_option
- [socket_shutdown](#function.socket-shutdown) — Desactiva un socket en lectura y/o escritura
- [socket_strerror](#function.socket-strerror) — Devuelve un string describiendo un mensaje de error
- [socket_write](#function.socket-write) — Escribe en un socket
- [socket_wsaprotocol_info_export](#function.socket-wsaprotocol-info-export) — Exporta la estructura WSAPROTOCOL_INFO
- [socket_wsaprotocol_info_import](#function.socket-wsaprotocol-info-import) — Importa un socket de otro proceso
- [socket_wsaprotocol_info_release](#function.socket-wsaprotocol-info-release) — Libera una estructura WSAPROTOCOL_INFO exportada

# La clase Socket

(PHP 8)

## Introducción

    Una clase completamente opaca que reemplaza los recursos Socket
    a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **Socket**
     {

}

# La clase AddressInfo

(PHP 8)

## Introducción

    Una clase completamente opaca que reemplaza los recursos AddressInfo
    a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **AddressInfo**
     {

}

- [Introducción](#intro.sockets)
- [Instalación/Configuración](#sockets.setup)<li>[Instalación](#sockets.installation)
- [Tipos de recursos](#sockets.resources)
  </li>- [Constantes predefinidas](#sockets.constants)
- [Ejemplos](#sockets.examples)
- [Errores de Socket](#sockets.errors)
- [Funciones de Socket](#ref.sockets)<li>[socket_accept](#function.socket-accept) — Acepta una conexión en un socket
- [socket_addrinfo_bind](#function.socket-addrinfo-bind) — Crea y vincula un socket a una dirección dada
- [socket_addrinfo_connect](#function.socket-addrinfo-connect) — Crea e inicia la conexión de un socket a una dirección dada
- [socket_addrinfo_explain](#function.socket-addrinfo-explain) — Proporciona información sobre addrinfo
- [socket_addrinfo_lookup](#function.socket-addrinfo-lookup) — Devuelve un array que contiene la información de getaddrinfo sobre el nombre de host dado
- [socket_atmark](#function.socket-atmark) — Determina si el socket está en la marca fuera de banda
- [socket_bind](#function.socket-bind) — Asocia un nombre a un socket
- [socket_clear_error](#function.socket-clear-error) — Elimina todos los errores generados previamente por un socket
- [socket_close](#function.socket-close) — Cierra una instancia de Socket
- [socket_cmsg_space](#function.socket-cmsg-space) — Calcula el tamaño del búfer
- [socket_connect](#function.socket-connect) — Crea una conexión en un socket
- [socket_create](#function.socket-create) — Crea un socket
- [socket_create_listen](#function.socket-create-listen) — Abre un socket en un puerto para aceptar conexiones
- [socket_create_pair](#function.socket-create-pair) — Crea un par de sockets idénticos y los almacena en un array
- [socket_export_stream](#function.socket-export-stream) — Exporta un socket en un flujo que encapsula un socket
- [socket_get_option](#function.socket-get-option) — Lee las opciones del socket
- [socket_getopt](#function.socket-getopt) — Alias de socket_get_option
- [socket_getpeername](#function.socket-getpeername) — Interroga el otro extremo de la comunicación
- [socket_getsockname](#function.socket-getsockname) — Interroga el socket local
- [socket_import_stream](#function.socket-import-stream) — Importa un flujo
- [socket_last_error](#function.socket-last-error) — Lee el último error generado por un socket
- [socket_listen](#function.socket-listen) — Espera una conexión en un socket
- [socket_read](#function.socket-read) — Lee datos de un socket
- [socket_recv](#function.socket-recv) — Recibe datos de un socket conectado
- [socket_recvfrom](#function.socket-recvfrom) — Recibe datos de un socket, conectado o no
- [socket_recvmsg](#function.socket-recvmsg) — Lee un mensaje
- [socket_select](#function.socket-select) — Ejecuta la llamada al sistema select() sobre un array de sockets con un tiempo de expiración
- [socket_send](#function.socket-send) — Envía datos a un socket conectado
- [socket_sendmsg](#function.socket-sendmsg) — Envía un mensaje
- [socket_sendto](#function.socket-sendto) — Envía un mensaje a un socket, ya esté conectado o no
- [socket_set_block](#function.socket-set-block) — Establece el socket en modo bloqueante
- [socket_set_nonblock](#function.socket-set-nonblock) — Selecciona el modo no bloqueante de un puntero de fichero
- [socket_set_option](#function.socket-set-option) — Modifica las opciones de socket
- [socket_setopt](#function.socket-setopt) — Alias de socket_set_option
- [socket_shutdown](#function.socket-shutdown) — Desactiva un socket en lectura y/o escritura
- [socket_strerror](#function.socket-strerror) — Devuelve un string describiendo un mensaje de error
- [socket_write](#function.socket-write) — Escribe en un socket
- [socket_wsaprotocol_info_export](#function.socket-wsaprotocol-info-export) — Exporta la estructura WSAPROTOCOL_INFO
- [socket_wsaprotocol_info_import](#function.socket-wsaprotocol-info-import) — Importa un socket de otro proceso
- [socket_wsaprotocol_info_release](#function.socket-wsaprotocol-info-release) — Libera una estructura WSAPROTOCOL_INFO exportada
  </li>- [Socket](#class.socket) — La clase Socket
- [AddressInfo](#class.addressinfo) — La clase AddressInfo
