# Swoole

# Introducción

Swoole es un motor de comunicación en red paralelo basado en eventos asíncronos y corrutinas,
escrito en C++, que proporciona soporte para corrutinas y programación de red de alto rendimiento para PHP.
Ofrece varios módulos de servidor y cliente de red para múltiples protocolos de comunicación, lo que facilita
la implementación rápida de servicios TCP/UDP, Web de alto rendimiento, servicios WebSocket, IoT, comunicación en tiempo real, juegos,
microservicios, etc., rompiendo los límites de PHP en los dominios web tradicionales.

Para comenzar, consulte la [» Documentación de Swoole](https://wiki.swoole.com/).

**Nota**:
Esta extensión no está disponible en las plataformas Windows.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#swoole.requirements)
- [Instalación](#swoole.installation)
- [Configuración en tiempo de ejecución](#swoole.configuration)

    ## Requerimientos

          Swoole requiere la biblioteca libbrotli.




          La activación de la opción --enable-swoole-curl requiere la biblioteca libcurl,
          y PHP así como Swoole deben estar vinculados a la misma biblioteca compartida libcurl
          y a los mismos encabezados, a fin de evitar un comportamiento indefinido.




          La activación de la opción --enable-iouring requiere la biblioteca liburing (versión ≥ 2.0)
          y un núcleo Linux (versión ≥ 5.12).




          La activación de la opción --enable-swoole-thread requiere que PHP sea compilado en modo ZTS (Zend Thread Safety).




          La activación de la opción --enable-cares requiere la biblioteca libc-ares.




          La activación de la opción --enable-zstd requiere la biblioteca libzstd (versión ≥ 1.4.0).




          La activación de la opción --enable-swoole-sqlite requiere la biblioteca libsqlite.




          La activación de la opción --enable-swoole-pgsql requiere la biblioteca libpq.




          La activación de la opción --with-swoole-odbc requiere la biblioteca unixodbc-dev.




          La activación de la opción --with-swoole-oracle requiere las bibliotecas Oracle Instant Client.

## Instalación

Utilizar **--with-swoole[=DIR]** durante la compilación de PHP.

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/swoole](https://pecl.php.net/package/swoole)

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de Swoole**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [swoole.enable_library](#ini.swoole.enable-library)
      On
      **[INI_ALL](#constant.ini-all)**




      [swoole.enable_fiber_mock](#ini.swoole.enable-fiber-mock)
      Off
      **[INI_ALL](#constant.ini-all)**




      [swoole.enable_preemptive_scheduler](#ini.swoole.enable-preemptive-scheduler)
      Off
      **[INI_ALL](#constant.ini-all)**




      [swoole.display_errors](#ini.swoole.display-errors)
      On
      **[INI_ALL](#constant.ini-all)**




      [swoole.use_shortname](#ini.swoole.use-shortname)
      **[INI_SYSTEM](#constant.ini-system)**




      [swoole.unixsock_buffer_size](#ini.swoole.unixsock-buffer-size)
      8388608
      **[INI_ALL](#constant.ini-all)**



Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     swoole.enable_library
     [string](#language.types.string)



      Activa o desactiva la biblioteca integrada de la extensión.







     swoole.enable_fiber_mock
     [string](#language.types.string)



      Activa o desactiva el uso de la extensión xdebug para depurar programas Swoole.







     swoole.enable_preemptive_scheduler
     [string](#language.types.string)



      Impide que ciertas corrutinas consuman demasiado tiempo de CPU en un bucle cerrado (10 ms de tiempo CPU),
      lo que podría impedir la planificación de otras corrutinas.







     swoole.display_errors
     [string](#language.types.string)



      Activa o desactiva la visualización de los mensajes de error de Swoole.








     swoole.use_shortname
     [string](#language.types.string)



      Activa o desactiva los alias cortos.








     swoole.unixsock_buffer_size
     [int](#language.types.integer)



      Define el tamaño del búfer Socket para la comunicación interprocesos.


# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[SWOOLE_VERSION](#constant.swoole-version)**
     ([string](#language.types.string))



      La versión de Swoole.





     **[SWOOLE_VERSION_ID](#constant.swoole-version-id)**
     ([int](#language.types.integer))



      La versión de Swoole.





     **[SWOOLE_MAJOR_VERSION](#constant.swoole-major-version)**
     ([int](#language.types.integer))



      La versión mayor de Swoole.





     **[SWOOLE_MINOR_VERSION](#constant.swoole-minor-version)**
     ([int](#language.types.integer))



      La versión menor de Swoole.





     **[SWOOLE_RELEASE_VERSION](#constant.swoole-release-version)**
     ([int](#language.types.integer))



      La versión de lanzamiento de Swoole.





     **[SWOOLE_EXTRA_VERSION](#constant.swoole-extra-version)**
     ([string](#language.types.string))



      La versión extra de Swoole.





     **[SWOOLE_DEBUG](#constant.swoole-debug)**
     ([int](#language.types.integer))



      El modo de depuración de Swoole.





     **[SWOOLE_HAVE_COMPRESSION](#constant.swoole-have-compression)**
     ([int](#language.types.integer))



      Activa el modo de compresión de las respuestas HTTP.





     **[SWOOLE_HAVE_ZLIB](#constant.swoole-have-zlib)**
     ([int](#language.types.integer))



      Si la herramienta de compresión zlib está disponible.





     **[SWOOLE_HAVE_BROTLI](#constant.swoole-have-brotli)**
     ([int](#language.types.integer))



      Si la herramienta de compresión brotli está disponible.





     **[SWOOLE_USE_HTTP2](#constant.swoole-use-http2)**
     ([int](#language.types.integer))



      El soporte para HTTP2.





     **[SWOOLE_USE_SHORTNAME](#constant.swoole-use-shortname)**
     ([int](#language.types.integer))



      Activa/desactiva los alias cortos.





     **[SWOOLE_SOCK_TCP](#constant.swoole-sock-tcp)**
     ([int](#language.types.integer))



      El socket TCP ipv4.





     **[SWOOLE_SOCK_TCP6](#constant.swoole-sock-tcp6)**
     ([int](#language.types.integer))



      El socket TCP ipv6.





     **[SWOOLE_SOCK_UDP](#constant.swoole-sock-udp)**
     ([int](#language.types.integer))



      El socket UDP ipv4.





     **[SWOOLE_SOCK_UDP6](#constant.swoole-sock-udp6)**
     ([int](#language.types.integer))



      El socket UDP ipv6.





     **[SWOOLE_SOCK_UNIX_DGRAM](#constant.swoole-sock-unix-dgram)**
     ([int](#language.types.integer))



      El socket UNIX dgram.





     **[SWOOLE_SOCK_UNIX_STREAM](#constant.swoole-sock-unix-stream)**
     ([int](#language.types.integer))



      El socket UNIX stream.





     **[SWOOLE_SOCK_SYNC](#constant.swoole-sock-sync)**
     ([int](#language.types.integer))



      El modo cliente síncrono.





     **[SWOOLE_SOCK_ASYNC](#constant.swoole-sock-async)**
     ([int](#language.types.integer))



      El modo cliente asíncrono.





     **[SWOOLE_KEEP](#constant.swoole-keep)**
     ([int](#language.types.integer))



      Swoole\Client soporta la creación de una conexión TCP larga al servidor en PHP-FPM/Apache.





     **[SWOOLE_SSL](#constant.swoole-ssl)**
     ([int](#language.types.integer))



      Activa el cifrado SSL.





     **[SWOOLE_SSLv3_METHOD](#constant.swoole-sslv3-method)**
     ([int](#language.types.integer))



      Método SSLv3.





     **[SWOOLE_SSLv3_SERVER_METHOD](#constant.swoole-sslv3-server-method)**
     ([int](#language.types.integer))



      El método de servidor SSLv3.





     **[SWOOLE_SSLv3_CLIENT_METHOD](#constant.swoole-sslv3-client-method)**
     ([int](#language.types.integer))



      El método de cliente SSLv3.





     **[SWOOLE_TLSv1_METHOD](#constant.swoole-tlsv1-method)**
     ([int](#language.types.integer))



      El método TLSv1.





     **[SWOOLE_TLSv1_SERVER_METHOD](#constant.swoole-tlsv1-server-method)**
     ([int](#language.types.integer))



      El método de servidor TLSv1.





     **[SWOOLE_TLSv1_CLIENT_METHOD](#constant.swoole-tlsv1-client-method)**
     ([int](#language.types.integer))



      El método de cliente TLSv1.





     **[SWOOLE_TLSv1_1_METHOD](#constant.swoole-tlsv1-1-method)**
     ([int](#language.types.integer))



      El método TLSv1_1.





     **[SWOOLE_TLSv1_1_SERVER_METHOD](#constant.swoole-tlsv1-1-server-method)**
     ([int](#language.types.integer))



      El método de servidor TLSv1_1.





     **[SWOOLE_TLSv1_1_CLIENT_METHOD](#constant.swoole-tlsv1-1-client-method)**
     ([int](#language.types.integer))



      El método de cliente TLSv1_1.





     **[SWOOLE_TLSv1_2_METHOD](#constant.swoole-tlsv1-2-method)**
     ([int](#language.types.integer))



      El método TLSv1_2.





     **[SWOOLE_TLSv1_2_SERVER_METHOD](#constant.swoole-tlsv1-2-server-method)**
     ([int](#language.types.integer))



      El método de servidor TLSv1_2.





     **[SWOOLE_TLSv1_2_CLIENT_METHOD](#constant.swoole-tlsv1-2-client-method)**
     ([int](#language.types.integer))



      El método de cliente TLSv1_2.





     **[SWOOLE_DTLS_SERVER_METHOD](#constant.swoole-dtls-server-method)**
     ([int](#language.types.integer))



      El método de servidor DTLS.





     **[SWOOLE_DTLS_CLIENT_METHOD](#constant.swoole-dtls-client-method)**
     ([int](#language.types.integer))



      El método de cliente DTLS.





     **[SWOOLE_SSLv23_METHOD](#constant.swoole-sslv23-method)**
     ([int](#language.types.integer))



      El método SSLv23.





     **[SWOOLE_SSLv23_SERVER_METHOD](#constant.swoole-sslv23-server-method)**
     ([int](#language.types.integer))



      El método de servidor SSLv23.





     **[SWOOLE_SSLv23_CLIENT_METHOD](#constant.swoole-sslv23-client-method)**
     ([int](#language.types.integer))



      El método de cliente SSLv23.





     **[SWOOLE_TLS_METHOD](#constant.swoole-tls-method)**
     ([int](#language.types.integer))



      El método TLS.





     **[SWOOLE_TLS_SERVER_METHOD](#constant.swoole-tls-server-method)**
     ([int](#language.types.integer))



      El método de servidor TLS.





     **[SWOOLE_TLS_CLIENT_METHOD](#constant.swoole-tls-client-method)**
     ([int](#language.types.integer))



      El método de cliente TLS.





     **[SWOOLE_SSL_SSLv3](#constant.swoole-ssl-sslv3)**
     ([int](#language.types.integer))



      El protocolo SSLv3.





     **[SWOOLE_SSL_TLSv1](#constant.swoole-ssl-tlsv1)**
     ([int](#language.types.integer))



      El protocolo TLSv1.





     **[SWOOLE_SSL_TLSv1_1](#constant.swoole-ssl-tlsv1-1)**
     ([int](#language.types.integer))



      El protocolo TLSv1_1.





     **[SWOOLE_SSL_TLSv1_2](#constant.swoole-ssl-tlsv1-2)**
     ([int](#language.types.integer))



      El protocolo TLSv1_2.





     **[SWOOLE_SSL_TLSv1_3](#constant.swoole-ssl-tlsv1-3)**
     ([int](#language.types.integer))



      El protocolo TLSv1_3.





     **[SWOOLE_SSL_DTLS](#constant.swoole-ssl-dtls)**
     ([int](#language.types.integer))



      El protocolo DTLS.





     **[SWOOLE_SSL_SSLv2](#constant.swoole-ssl-sslv2)**
     ([int](#language.types.integer))



      El protocolo SSLv2.





     **[SWOOLE_EVENT_READ](#constant.swoole-event-read)**
     ([int](#language.types.integer))



      Si es necesario escuchar los eventos de lectura.





     **[SWOOLE_EVENT_WRITE](#constant.swoole-event-write)**
     ([int](#language.types.integer))



      Si es necesario escuchar los eventos de escritura.





     **[SWOOLE_STRERROR_SYSTEM](#constant.swoole-strerror-system)**
     ([int](#language.types.integer))



      Convierte el número errno del sistema en mensajes de error.





     **[SWOOLE_STRERROR_GAI](#constant.swoole-strerror-gai)**
     ([int](#language.types.integer))



      Convierte el número errno de la información de dirección en mensajes de error.





     **[SWOOLE_STRERROR_DNS](#constant.swoole-strerror-dns)**
     ([int](#language.types.integer))



      Convierte el número errno de DNS en mensajes de error.





     **[SWOOLE_STRERROR_SWOOLE](#constant.swoole-strerror-swoole)**
     ([int](#language.types.integer))



      Convierte el número errno de Swoole en mensajes de error.





     **[SWOOLE_ERROR_MALLOC_FAIL](#constant.swoole-error-malloc-fail)**
     ([int](#language.types.integer))



      Fallo en la asignación de memoria (MALLOC).





     **[SWOOLE_ERROR_SYSTEM_CALL_FAIL](#constant.swoole-error-system-call-fail)**
     ([int](#language.types.integer))



      Fallo en la llamada al sistema.





     **[SWOOLE_ERROR_PHP_FATAL_ERROR](#constant.swoole-error-php-fatal-error)**
     ([int](#language.types.integer))



      Error fatal de PHP.





     **[SWOOLE_ERROR_NAME_TOO_LONG](#constant.swoole-error-name-too-long)**
     ([int](#language.types.integer))



      Nombre demasiado largo.





     **[SWOOLE_ERROR_INVALID_PARAMS](#constant.swoole-error-invalid-params)**
     ([int](#language.types.integer))



      Parámetros no válidos.





     **[SWOOLE_ERROR_QUEUE_FULL](#constant.swoole-error-queue-full)**
     ([int](#language.types.integer))



      La cola está llena.





     **[SWOOLE_ERROR_OPERATION_NOT_SUPPORT](#constant.swoole-error-operation-not-support)**
     ([int](#language.types.integer))



      Operación no soportada.





     **[SWOOLE_ERROR_PROTOCOL_ERROR](#constant.swoole-error-protocol-error)**
     ([int](#language.types.integer))



      Error de protocolo.





     **[SWOOLE_ERROR_WRONG_OPERATION](#constant.swoole-error-wrong-operation)**
     ([int](#language.types.integer))



      Operación incorrecta.





     **[SWOOLE_ERROR_PHP_RUNTIME_NOTICE](#constant.swoole-error-php-runtime-notice)**
     ([int](#language.types.integer))



      Aviso de ejecución de PHP.





     **[SWOOLE_ERROR_FOR_TEST](#constant.swoole-error-for-test)**
     ([int](#language.types.integer))



      Para pruebas.





     **[SWOOLE_ERROR_NO_PAYLOAD](#constant.swoole-error-no-payload)**
     ([int](#language.types.integer))



      Sin carga útil.





     **[SWOOLE_ERROR_UNDEFINED_BEHAVIOR](#constant.swoole-error-undefined-behavior)**
     ([int](#language.types.integer))



      Comportamiento no definido.





     **[SWOOLE_ERROR_NOT_THREAD_SAFETY](#constant.swoole-error-not-thread-safety)**
     ([int](#language.types.integer))



      No es seguro para los hilos.





     **[SWOOLE_ERROR_FILE_NOT_EXIST](#constant.swoole-error-file-not-exist)**
     ([int](#language.types.integer))



      El fichero no existe.





     **[SWOOLE_ERROR_FILE_TOO_LARGE](#constant.swoole-error-file-too-large)**
     ([int](#language.types.integer))



      Fichero demasiado grande.





     **[SWOOLE_ERROR_FILE_EMPTY](#constant.swoole-error-file-empty)**
     ([int](#language.types.integer))



      Fichero vacío.





     **[SWOOLE_ERROR_DNSLOOKUP_DUPLICATE_REQUEST](#constant.swoole-error-dnslookup-duplicate-request)**
     ([int](#language.types.integer))



      La solicitud de búsqueda DNS está duplicada.





     **[SWOOLE_ERROR_DNSLOOKUP_RESOLVE_FAILED](#constant.swoole-error-dnslookup-resolve-failed)**
     ([int](#language.types.integer))



      La resolución DNS ha fallado.





     **[SWOOLE_ERROR_DNSLOOKUP_RESOLVE_TIMEOUT](#constant.swoole-error-dnslookup-resolve-timeout)**
     ([int](#language.types.integer))



      La resolución DNS ha tardado demasiado.





     **[SWOOLE_ERROR_DNSLOOKUP_UNSUPPORTED](#constant.swoole-error-dnslookup-unsupported)**
     ([int](#language.types.integer))



      La resolución DNS no está soportada.





     **[SWOOLE_ERROR_DNSLOOKUP_NO_SERVER](#constant.swoole-error-dnslookup-no-server)**
     ([int](#language.types.integer))



      La resolución DNS no tiene servidor.





     **[SWOOLE_ERROR_BAD_IPV6_ADDRESS](#constant.swoole-error-bad-ipv6-address)**
     ([int](#language.types.integer))



      Dirección IPv6 incorrecta.





     **[SWOOLE_ERROR_UNREGISTERED_SIGNAL](#constant.swoole-error-unregistered-signal)**
     ([int](#language.types.integer))



      Señal no registrada.





     **[SWOOLE_ERROR_BAD_HOST_ADDR](#constant.swoole-error-bad-host-addr)**
     ([int](#language.types.integer))



      Dirección de host incorrecta.





     **[SWOOLE_ERROR_EVENT_SOCKET_REMOVED](#constant.swoole-error-event-socket-removed)**
     ([int](#language.types.integer))



      Socket de evento eliminado.





     **[SWOOLE_ERROR_SESSION_CLOSED_BY_SERVER](#constant.swoole-error-session-closed-by-server)**
     ([int](#language.types.integer))



      La sesión ha sido cerrada por el servidor.





     **[SWOOLE_ERROR_SESSION_CLOSED_BY_CLIENT](#constant.swoole-error-session-closed-by-client)**
     ([int](#language.types.integer))



      La sesión ha sido cerrada por el cliente.





     **[SWOOLE_ERROR_SESSION_CLOSING](#constant.swoole-error-session-closing)**
     ([int](#language.types.integer))



      Cierre de sesión.





     **[SWOOLE_ERROR_SESSION_CLOSED](#constant.swoole-error-session-closed)**
     ([int](#language.types.integer))



      Sesión cerrada.





     **[SWOOLE_ERROR_SESSION_NOT_EXIST](#constant.swoole-error-session-not-exist)**
     ([int](#language.types.integer))



      La sesión no existe.





     **[SWOOLE_ERROR_SESSION_INVALID_ID](#constant.swoole-error-session-invalid-id)**
     ([int](#language.types.integer))



      La sesión tiene un ID inválido.





     **[SWOOLE_ERROR_SESSION_DISCARD_TIMEOUT_DATA](#constant.swoole-error-session-discard-timeout-data)**
     ([int](#language.types.integer))



      Datos de sesión con tiempo de espera agotado.





     **[SWOOLE_ERROR_SESSION_DISCARD_DATA](#constant.swoole-error-session-discard-data)**
     ([int](#language.types.integer))



      Datos de sesión descartados.





     **[SWOOLE_ERROR_OUTPUT_BUFFER_OVERFLOW](#constant.swoole-error-output-buffer-overflow)**
     ([int](#language.types.integer))



      Desbordamiento del búfer de salida.





     **[SWOOLE_ERROR_OUTPUT_SEND_YIELD](#constant.swoole-error-output-send-yield)**
     ([int](#language.types.integer))



      Rendimiento de envío de salida.





     **[SWOOLE_ERROR_SSL_NOT_READY](#constant.swoole-error-ssl-not-ready)**
     ([int](#language.types.integer))



      SSL no está listo.





     **[SWOOLE_ERROR_SSL_CANNOT_USE_SENFILE](#constant.swoole-error-ssl-cannot-use-senfile)**
     ([int](#language.types.integer))



      SSL no puede utilizar senfile.





     **[SWOOLE_ERROR_SSL_EMPTY_PEER_CERTIFICATE](#constant.swoole-error-ssl-empty-peer-certificate)**
     ([int](#language.types.integer))



      SSL certificado de par vacío.





     **[SWOOLE_ERROR_SSL_VERIFY_FAILED](#constant.swoole-error-ssl-verify-failed)**
     ([int](#language.types.integer))



      SSL verificación fallida.





     **[SWOOLE_ERROR_SSL_BAD_CLIENT](#constant.swoole-error-ssl-bad-client)**
     ([int](#language.types.integer))



      SSL cliente incorrecto.





     **[SWOOLE_ERROR_SSL_BAD_PROTOCOL](#constant.swoole-error-ssl-bad-protocol)**
     ([int](#language.types.integer))



      SSL protocolo incorrecto.





     **[SWOOLE_ERROR_SSL_RESET](#constant.swoole-error-ssl-reset)**
     ([int](#language.types.integer))



      SSL reiniciado.





     **[SWOOLE_ERROR_SSL_HANDSHAKE_FAILED](#constant.swoole-error-ssl-handshake-failed)**
     ([int](#language.types.integer))



      SSL fallo en el apretón de manos.





     **[SWOOLE_ERROR_PACKAGE_LENGTH_TOO_LARGE](#constant.swoole-error-package-length-too-large)**
     ([int](#language.types.integer))



      Longitud de paquete demasiado grande.





     **[SWOOLE_ERROR_PACKAGE_LENGTH_NOT_FOUND](#constant.swoole-error-package-length-not-found)**
     ([int](#language.types.integer))



      Longitud de paquete no encontrada.





     **[SWOOLE_ERROR_DATA_LENGTH_TOO_LARGE](#constant.swoole-error-data-length-too-large)**
     ([int](#language.types.integer))



      Los datos son demasiado largos.





     **[SWOOLE_ERROR_PACKAGE_MALFORMED_DATA](#constant.swoole-error-package-malformed-data)**
     ([int](#language.types.integer))



      Error de datos de paquete mal formado.





     **[SWOOLE_ERROR_TASK_PACKAGE_TOO_BIG](#constant.swoole-error-task-package-too-big)**
     ([int](#language.types.integer))



      Paquete de tarea demasiado grande.





     **[SWOOLE_ERROR_TASK_DISPATCH_FAIL](#constant.swoole-error-task-dispatch-fail)**
     ([int](#language.types.integer))



      Distribución de tarea fallida.





     **[SWOOLE_ERROR_TASK_TIMEOUT](#constant.swoole-error-task-timeout)**
     ([int](#language.types.integer))



      Tiempo de espera de la tarea agotado.





     **[SWOOLE_ERROR_HTTP2_STREAM_ID_TOO_BIG](#constant.swoole-error-http2-stream-id-too-big)**
     ([int](#language.types.integer))



      El identificador del flujo HTTP2 es demasiado grande.





     **[SWOOLE_ERROR_HTTP2_STREAM_NO_HEADER](#constant.swoole-error-http2-stream-no-header)**
     ([int](#language.types.integer))



      El flujo HTTP2 no tiene encabezado.





     **[SWOOLE_ERROR_HTTP2_STREAM_NOT_FOUND](#constant.swoole-error-http2-stream-not-found)**
     ([int](#language.types.integer))



      El flujo HTTP2 no ha sido encontrado.





     **[SWOOLE_ERROR_HTTP2_STREAM_IGNORE](#constant.swoole-error-http2-stream-ignore)**
     ([int](#language.types.integer))



      El flujo HTTP2 es ignorado.





     **[SWOOLE_ERROR_HTTP2_SEND_CONTROL_FRAME_FAILED](#constant.swoole-error-http2-send-control-frame-failed)**
     ([int](#language.types.integer))



      El envío del marco de control Http2 ha fallado.





     **[SWOOLE_ERROR_AIO_BAD_REQUEST](#constant.swoole-error-aio-bad-request)**
     ([int](#language.types.integer))



      Solicitud Aio incorrecta.





     **[SWOOLE_ERROR_AIO_CANCELED](#constant.swoole-error-aio-canceled)**
     ([int](#language.types.integer))



      Aio cancelada.





     **[SWOOLE_ERROR_AIO_TIMEOUT](#constant.swoole-error-aio-timeout)**
     ([int](#language.types.integer))



      Tiempo de espera Aio agotado.





     **[SWOOLE_ERROR_CLIENT_NO_CONNECTION](#constant.swoole-error-client-no-connection)**
     ([int](#language.types.integer))



      El cliente no tiene conexión.





     **[SWOOLE_ERROR_SOCKET_CLOSED](#constant.swoole-error-socket-closed)**
     ([int](#language.types.integer))



      El socket ha sido cerrado.





     **[SWOOLE_ERROR_SOCKET_POLL_TIMEOUT](#constant.swoole-error-socket-poll-timeout)**
     ([int](#language.types.integer))



      Tiempo de espera del socket poll agotado.





     **[SWOOLE_ERROR_SOCKS5_UNSUPPORT_VERSION](#constant.swoole-error-socks5-unsupport-version)**
     ([int](#language.types.integer))



      Versión no soportada de Socks5.





     **[SWOOLE_ERROR_SOCKS5_UNSUPPORT_METHOD](#constant.swoole-error-socks5-unsupport-method)**
     ([int](#language.types.integer))



      Método no soportado de Socks5.





     **[SWOOLE_ERROR_SOCKS5_AUTH_FAILED](#constant.swoole-error-socks5-auth-failed)**
     ([int](#language.types.integer))



      La autenticación Socks5 ha fallado.





     **[SWOOLE_ERROR_SOCKS5_SERVER_ERROR](#constant.swoole-error-socks5-server-error)**
     ([int](#language.types.integer))



      Error del servidor Socks5.





     **[SWOOLE_ERROR_SOCKS5_HANDSHAKE_FAILED](#constant.swoole-error-socks5-handshake-failed)**
     ([int](#language.types.integer))



      El apretón de manos Socks5 ha fallado.





     **[SWOOLE_ERROR_HTTP_PROXY_HANDSHAKE_ERROR](#constant.swoole-error-http-proxy-handshake-error)**
     ([int](#language.types.integer))



      Error de apretón de manos Http proxy.





     **[SWOOLE_ERROR_HTTP_INVALID_PROTOCOL](#constant.swoole-error-http-invalid-protocol)**
     ([int](#language.types.integer))



      Protocolo Http inválido.





     **[SWOOLE_ERROR_HTTP_PROXY_HANDSHAKE_FAILED](#constant.swoole-error-http-proxy-handshake-failed)**
     ([int](#language.types.integer))



      Fallo en el apretón de manos Http proxy.





     **[SWOOLE_ERROR_HTTP_PROXY_BAD_RESPONSE](#constant.swoole-error-http-proxy-bad-response)**
     ([int](#language.types.integer))



      Respuesta incorrecta Http proxy.





     **[SWOOLE_ERROR_HTTP_CONFLICT_HEADER](#constant.swoole-error-http-conflict-header)**
     ([int](#language.types.integer))



      Conflicto de encabezado Http.





     **[SWOOLE_ERROR_HTTP_CONTEXT_UNAVAILABLE](#constant.swoole-error-http-context-unavailable)**
     ([int](#language.types.integer))



      Contexto Http no disponible.





     **[SWOOLE_ERROR_HTTP_COOKIE_UNAVAILABLE](#constant.swoole-error-http-cookie-unavailable)**
     ([int](#language.types.integer))



      Cookie Http no disponible.





     **[SWOOLE_ERROR_WEBSOCKET_BAD_CLIENT](#constant.swoole-error-websocket-bad-client)**
     ([int](#language.types.integer))



      Cliente Websocket incorrecto.





     **[SWOOLE_ERROR_WEBSOCKET_BAD_OPCODE](#constant.swoole-error-websocket-bad-opcode)**
     ([int](#language.types.integer))



      Opcode Websocket incorrecto.





     **[SWOOLE_ERROR_WEBSOCKET_UNCONNECTED](#constant.swoole-error-websocket-unconnected)**
     ([int](#language.types.integer))



      Websocket no conectado.





     **[SWOOLE_ERROR_WEBSOCKET_HANDSHAKE_FAILED](#constant.swoole-error-websocket-handshake-failed)**
     ([int](#language.types.integer))



      El apretón de manos de Websocket ha fallado.





     **[SWOOLE_ERROR_WEBSOCKET_PACK_FAILED](#constant.swoole-error-websocket-pack-failed)**
     ([int](#language.types.integer))



      El empaquetado de Websocket ha fallado.





     **[SWOOLE_ERROR_WEBSOCKET_UNPACK_FAILED](#constant.swoole-error-websocket-unpack-failed)**
     ([int](#language.types.integer))



      El desempaquetado de Websocket ha fallado.





     **[SWOOLE_ERROR_WEBSOCKET_INCOMPLETE_PACKET](#constant.swoole-error-websocket-incomplete-packet)**
     ([int](#language.types.integer))



      Paquete Websocket incompleto.





     **[SWOOLE_ERROR_SERVER_MUST_CREATED_BEFORE_CLIENT](#constant.swoole-error-server-must-created-before-client)**
     ([int](#language.types.integer))



      El servidor debe ser creado antes que el cliente.





     **[SWOOLE_ERROR_SERVER_TOO_MANY_SOCKET](#constant.swoole-error-server-too-many-socket)**
     ([int](#language.types.integer))



      El servidor tiene demasiados sockets.





     **[SWOOLE_ERROR_SERVER_WORKER_TERMINATED](#constant.swoole-error-server-worker-terminated)**
     ([int](#language.types.integer))



      El servidor de trabajo ha sido terminado.





     **[SWOOLE_ERROR_SERVER_INVALID_LISTEN_PORT](#constant.swoole-error-server-invalid-listen-port)**
     ([int](#language.types.integer))



      Puerto de escucha del servidor inválido.





     **[SWOOLE_ERROR_SERVER_TOO_MANY_LISTEN_PORT](#constant.swoole-error-server-too-many-listen-port)**
     ([int](#language.types.integer))



      El servidor tiene demasiados puertos de escucha.





     **[SWOOLE_ERROR_SERVER_PIPE_BUFFER_FULL](#constant.swoole-error-server-pipe-buffer-full)**
     ([int](#language.types.integer))



      El búfer de tubería del servidor está lleno.





     **[SWOOLE_ERROR_SERVER_NO_IDLE_WORKER](#constant.swoole-error-server-no-idle-worker)**
     ([int](#language.types.integer))



      El servidor no tiene trabajadores inactivos.





     **[SWOOLE_ERROR_SERVER_ONLY_START_ONE](#constant.swoole-error-server-only-start-one)**
     ([int](#language.types.integer))



      El servidor solo puede iniciarse una vez.





     **[SWOOLE_ERROR_SERVER_SEND_IN_MASTER](#constant.swoole-error-server-send-in-master)**
     ([int](#language.types.integer))



      Servidor enviado en el maestro.





     **[SWOOLE_ERROR_SERVER_INVALID_REQUEST](#constant.swoole-error-server-invalid-request)**
     ([int](#language.types.integer))



      Solicitud inválida del servidor.





     **[SWOOLE_ERROR_SERVER_CONNECT_FAIL](#constant.swoole-error-server-connect-fail)**
     ([int](#language.types.integer))



      Fallo en la conexión del servidor.





     **[SWOOLE_ERROR_SERVER_INVALID_COMMAND](#constant.swoole-error-server-invalid-command)**
     ([int](#language.types.integer))



      Comando inválido del servidor.





     **[SWOOLE_ERROR_SERVER_IS_NOT_REGULAR_FILE](#constant.swoole-error-server-is-not-regular-file)**
     ([int](#language.types.integer))



      El servidor no es un archivo regular.





     **[SWOOLE_ERROR_SERVER_SEND_TO_WOKER_TIMEOUT](#constant.swoole-error-server-send-to-woker-timeout)**
     ([int](#language.types.integer))



      Tiempo de espera agotado al enviar del servidor al trabajador.





     **[SWOOLE_ERROR_SERVER_INVALID_CALLBACK](#constant.swoole-error-server-invalid-callback)**
     ([int](#language.types.integer))



      Función de devolución de llamada inválida del servidor.





     **[SWOOLE_ERROR_SERVER_UNRELATED_THREAD](#constant.swoole-error-server-unrelated-thread)**
     ([int](#language.types.integer))



      El servidor no está vinculado a un hilo.





     **[SWOOLE_ERROR_SERVER_WORKER_EXIT_TIMEOUT](#constant.swoole-error-server-worker-exit-timeout)**
     ([int](#language.types.integer))



      Tiempo de espera de salida del servidor de trabajo.





     **[SWOOLE_ERROR_SERVER_WORKER_ABNORMAL_PIPE_DATA](#constant.swoole-error-server-worker-abnormal-pipe-data)**
     ([int](#language.types.integer))



      Datos de pipe anormales del servidor de trabajo.





     **[SWOOLE_ERROR_SERVER_WORKER_UNPROCESSED_DATA](#constant.swoole-error-server-worker-unprocessed-data)**
     ([int](#language.types.integer))



      Datos no procesados del servidor de trabajo.





     **[SWOOLE_ERROR_CO_OUT_OF_COROUTINE](#constant.swoole-error-co-out-of-coroutine)**
     ([int](#language.types.integer))



      Corrutina fuera de corrutina.





     **[SWOOLE_ERROR_CO_HAS_BEEN_BOUND](#constant.swoole-error-co-has-been-bound)**
     ([int](#language.types.integer))



      La corrutina ha sido vinculada.





     **[SWOOLE_ERROR_CO_HAS_BEEN_DISCARDED](#constant.swoole-error-co-has-been-discarded)**
     ([int](#language.types.integer))



      La corrutina ha sido descartada.





     **[SWOOLE_ERROR_CO_MUTEX_DOUBLE_UNLOCK](#constant.swoole-error-co-mutex-double-unlock)**
     ([int](#language.types.integer))



      El mutex de corrutina ha sido desbloqueado dos veces.





     **[SWOOLE_ERROR_CO_BLOCK_OBJECT_LOCKED](#constant.swoole-error-co-block-object-locked)**
     ([int](#language.types.integer))



      El bloque de objeto de corrutina está bloqueado.





     **[SWOOLE_ERROR_CO_BLOCK_OBJECT_WAITING](#constant.swoole-error-co-block-object-waiting)**
     ([int](#language.types.integer))



      El bloque de objeto de corrutina está en espera.





     **[SWOOLE_ERROR_CO_YIELD_FAILED](#constant.swoole-error-co-yield-failed)**
     ([int](#language.types.integer))



      El rendimiento de la corrutina ha fallado.





     **[SWOOLE_ERROR_CO_GETCONTEXT_FAILED](#constant.swoole-error-co-getcontext-failed)**
     ([int](#language.types.integer))



      Getcontext de la corrutina ha fallado.





     **[SWOOLE_ERROR_CO_SWAPCONTEXT_FAILED](#constant.swoole-error-co-swapcontext-failed)**
     ([int](#language.types.integer))



      Swapcontext de la corrutina ha fallado.





     **[SWOOLE_ERROR_CO_MAKECONTEXT_FAILED](#constant.swoole-error-co-makecontext-failed)**
     ([int](#language.types.integer))



      Makecontext de la corrutina ha fallado.





     **[SWOOLE_ERROR_CO_IOCPINIT_FAILED](#constant.swoole-error-co-iocpinit-failed)**
     ([int](#language.types.integer))



      Iocpinit de la corrutina ha fallado.





     **[SWOOLE_ERROR_CO_PROTECT_STACK_FAILED](#constant.swoole-error-co-protect-stack-failed)**
     ([int](#language.types.integer))



      Protect stack de la corrutina ha fallado.





     **[SWOOLE_ERROR_CO_STD_THREAD_LINK_ERROR](#constant.swoole-error-co-std-thread-link-error)**
     ([int](#language.types.integer))



      Error de enlace de hilo std de corrutina.





     **[SWOOLE_ERROR_CO_DISABLED_MULTI_THREAD](#constant.swoole-error-co-disabled-multi-thread)**
     ([int](#language.types.integer))



      Desactiva el multi-hilo de corrutina.





     **[SWOOLE_ERROR_CO_CANNOT_CANCEL](#constant.swoole-error-co-cannot-cancel)**
     ([int](#language.types.integer))



      La corrutina no puede ser cancelada.





     **[SWOOLE_ERROR_CO_NOT_EXISTS](#constant.swoole-error-co-not-exists)**
     ([int](#language.types.integer))



      La corrutina no existe.





     **[SWOOLE_ERROR_CO_CANCELED](#constant.swoole-error-co-canceled)**
     ([int](#language.types.integer))



      La coroutine ha sido cancelada.





     **[SWOOLE_ERROR_CO_TIMEDOUT](#constant.swoole-error-co-timedout)**
     ([int](#language.types.integer))



      La coroutine ha expirado.





     **[SWOOLE_ERROR_CO_SOCKET_CLOSE_WAIT](#constant.swoole-error-co-socket-close-wait)**
     ([int](#language.types.integer))



      Espera de cierre de socket de coroutine.





     **[SWOOLE_TRACE_SERVER](#constant.swoole-trace-server)**
     ([int](#language.types.integer))



      Flag de registro del servidor.





     **[SWOOLE_TRACE_CLIENT](#constant.swoole-trace-client)**
     ([int](#language.types.integer))



      Flag de registro del cliente.





     **[SWOOLE_TRACE_BUFFER](#constant.swoole-trace-buffer)**
     ([int](#language.types.integer))



      Flag de registro del búfer.





     **[SWOOLE_TRACE_CONN](#constant.swoole-trace-conn)**
     ([int](#language.types.integer))



      Flag de registro de la conexión.





     **[SWOOLE_TRACE_EVENT](#constant.swoole-trace-event)**
     ([int](#language.types.integer))



      Flag de registro de eventos.





     **[SWOOLE_TRACE_WORKER](#constant.swoole-trace-worker)**
     ([int](#language.types.integer))



      Flag de registro del trabajador.





     **[SWOOLE_TRACE_MEMORY](#constant.swoole-trace-memory)**
     ([int](#language.types.integer))



      Flag de registro de la memoria.





     **[SWOOLE_TRACE_REACTOR](#constant.swoole-trace-reactor)**
     ([int](#language.types.integer))



      Flag de registro del reactor.





     **[SWOOLE_TRACE_PHP](#constant.swoole-trace-php)**
     ([int](#language.types.integer))



      Flag de registro PHP.





     **[SWOOLE_TRACE_HTTP](#constant.swoole-trace-http)**
     ([int](#language.types.integer))



      Flag de registro HTTP.





     **[SWOOLE_TRACE_HTTP2](#constant.swoole-trace-http2)**
     ([int](#language.types.integer))



      Flag de registro HTTP2.





     **[SWOOLE_TRACE_EOF_PROTOCOL](#constant.swoole-trace-eof-protocol)**
     ([int](#language.types.integer))



      Flag de registro del protocolo eof.





     **[SWOOLE_TRACE_LENGTH_PROTOCOL](#constant.swoole-trace-length-protocol)**
     ([int](#language.types.integer))



      Flag de registro del protocolo de longitud.





     **[SWOOLE_TRACE_CLOSE](#constant.swoole-trace-close)**
     ([int](#language.types.integer))



      Flag de registro de cierre.





     **[SWOOLE_TRACE_WEBSOCKET](#constant.swoole-trace-websocket)**
     ([int](#language.types.integer))



      Flag de registro Websocket.





     **[SWOOLE_TRACE_REDIS_CLIENT](#constant.swoole-trace-redis-client)**
     ([int](#language.types.integer))



      Flag de registro del cliente Redis.





     **[SWOOLE_TRACE_MYSQL_CLIENT](#constant.swoole-trace-mysql-client)**
     ([int](#language.types.integer))



      Flag de registro del cliente MySQL.





     **[SWOOLE_TRACE_HTTP_CLIENT](#constant.swoole-trace-http-client)**
     ([int](#language.types.integer))



      Flag de registro del cliente HTTP.





     **[SWOOLE_TRACE_AIO](#constant.swoole-trace-aio)**
     ([int](#language.types.integer))



      Flag de registro AIO.





     **[SWOOLE_TRACE_SSL](#constant.swoole-trace-ssl)**
     ([int](#language.types.integer))



      Flag de registro SSL.





     **[SWOOLE_TRACE_NORMAL](#constant.swoole-trace-normal)**
     ([int](#language.types.integer))



      Flag de registro normal.





     **[SWOOLE_TRACE_CHANNEL](#constant.swoole-trace-channel)**
     ([int](#language.types.integer))



      Flag de registro de canal.





     **[SWOOLE_TRACE_TIMER](#constant.swoole-trace-timer)**
     ([int](#language.types.integer))



      Flag de registro del temporizador.





     **[SWOOLE_TRACE_SOCKET](#constant.swoole-trace-socket)**
     ([int](#language.types.integer))



      Flag de registro de socket.





     **[SWOOLE_TRACE_COROUTINE](#constant.swoole-trace-coroutine)**
     ([int](#language.types.integer))



      Flag de registro de coroutine.





     **[SWOOLE_TRACE_CONTEXT](#constant.swoole-trace-context)**
     ([int](#language.types.integer))



      Flag de registro de contexto.





     **[SWOOLE_TRACE_CO_HTTP_SERVER](#constant.swoole-trace-co-http-server)**
     ([int](#language.types.integer))



      Flag de registro del servidor http de coroutine.





     **[SWOOLE_TRACE_TABLE](#constant.swoole-trace-table)**
     ([int](#language.types.integer))



      Flag de registro de la tabla.





     **[SWOOLE_TRACE_CO_CURL](#constant.swoole-trace-co-curl)**
     ([int](#language.types.integer))



      Flag de registro de la coroutine curl.





     **[SWOOLE_TRACE_CARES](#constant.swoole-trace-cares)**
     ([int](#language.types.integer))



      Flag de registro de Cares.





     **[SWOOLE_TRACE_ZLIB](#constant.swoole-trace-zlib)**
     ([int](#language.types.integer))



      Flag de registro zlib.





     **[SWOOLE_TRACE_CO_PGSQL](#constant.swoole-trace-co-pgsql)**
     ([int](#language.types.integer))



      Flag de registro de la coroutine pgsql.





     **[SWOOLE_TRACE_CO_ODBC](#constant.swoole-trace-co-odbc)**
     ([int](#language.types.integer))



      Flag de registro de la coroutine odbc.





     **[SWOOLE_TRACE_CO_ORACLE](#constant.swoole-trace-co-oracle)**
     ([int](#language.types.integer))



      Flag de registro de la coroutine oracle.





     **[SWOOLE_TRACE_CO_SQLITE](#constant.swoole-trace-co-sqlite)**
     ([int](#language.types.integer))



      Flag de registro de la coroutine sqlite.





     **[SWOOLE_TRACE_ALL](#constant.swoole-trace-all)**
     ([int](#language.types.integer))



      Flag de registro de todos los niveles.





     **[SWOOLE_LOG_DEBUG](#constant.swoole-log-debug)**
     ([int](#language.types.integer))



      Flag de registro de depuración.





     **[SWOOLE_LOG_TRACE](#constant.swoole-log-trace)**
     ([int](#language.types.integer))



      Flag de registro de trace.





     **[SWOOLE_LOG_INFO](#constant.swoole-log-info)**
     ([int](#language.types.integer))



      Flag de registro de información.





     **[SWOOLE_LOG_NOTICE](#constant.swoole-log-notice)**
     ([int](#language.types.integer))



      Flag de registro de notificación.





     **[SWOOLE_LOG_WARNING](#constant.swoole-log-warning)**
     ([int](#language.types.integer))



      Flag de registro de advertencia.





     **[SWOOLE_LOG_ERROR](#constant.swoole-log-error)**
     ([int](#language.types.integer))



      Bandera de registro de errores.





     **[SWOOLE_LOG_NONE](#constant.swoole-log-none)**
     ([int](#language.types.integer))



      Equivale a desactivar las informaciones de registro, las informaciones de registro no serán lanzadas.





     **[SWOOLE_LOG_ROTATION_SINGLE](#constant.swoole-log-rotation-single)**
     ([int](#language.types.integer))



      Desactiva la rotación de los registros.





     **[SWOOLE_LOG_ROTATION_MONTHLY](#constant.swoole-log-rotation-monthly)**
     ([int](#language.types.integer))



      Gira los registros mensualmente.





     **[SWOOLE_LOG_ROTATION_DAILY](#constant.swoole-log-rotation-daily)**
     ([int](#language.types.integer))



      Gira los registros diariamente.





     **[SWOOLE_LOG_ROTATION_HOURLY](#constant.swoole-log-rotation-hourly)**
     ([int](#language.types.integer))



      Gira los registros cada hora.





     **[SWOOLE_LOG_ROTATION_EVERY_MINUTE](#constant.swoole-log-rotation-every-minute)**
     ([int](#language.types.integer))



      Gira los registros cada minuto.





     **[SWOOLE_IPC_NONE](#constant.swoole-ipc-none)**
     ([int](#language.types.integer))



      No utilizar mecanismo de comunicación interproceso (IPC).





     **[SWOOLE_IPC_UNIXSOCK](#constant.swoole-ipc-unixsock)**
     ([int](#language.types.integer))



      Para la comunicación entre procesos (IPC), el uso de sockets Unix (UnixSocket) en modo corrutina
      es altamente recomendado.





     **[SWOOLE_IPC_SOCKET](#constant.swoole-ipc-socket)**
     ([int](#language.types.integer))



      Para la comunicación entre procesos (IPC),
      el método listen debe ser llamado para especificar la dirección y el puerto a monitorear.





     **[SWOOLE_IOV_MAX](#constant.swoole-iov-max)**
     ([int](#language.types.integer))



      El límite MAX de iov.





     **[SWOOLE_IOURING_DEFAULT](#constant.swoole-iouring-default)**
     ([int](#language.types.integer))



      En modo interrupt-driven, las I/O son enviadas a través de la llamada al sistema io_uring_enter,
      y la finalización es determinada verificando directamente el estado de la cola de finalización.





     **[SWOOLE_IOURING_SQPOLL](#constant.swoole-iouring-sqpoll)**
     ([int](#language.types.integer))



      En modo de interrogación del núcleo, el núcleo crea hilos dedicados para enviar y recolectar las solicitudes I/O,
      eliminando casi los cambios de contexto entre el usuario y el núcleo.





     **[SWOOLE_BASE](#constant.swoole-base)**
     ([int](#language.types.integer))



      Modo básico.





     **[SWOOLE_PROCESS](#constant.swoole-process)**
     ([int](#language.types.integer))



      Modo multi-processus.





     **[SWOOLE_THREAD](#constant.swoole-thread)**
     ([int](#language.types.integer))



      Modo multi-thread.





     **[SWOOLE_IPC_UNSOCK](#constant.swoole-ipc-unsock)**
     ([int](#language.types.integer))



      El proceso de tarea comunica con el proceso de trabajo utilizando un socket Unix.





     **[SWOOLE_IPC_MSGQUEUE](#constant.swoole-ipc-msgqueue)**
     ([int](#language.types.integer))



      El proceso de tarea comunica con el proceso de trabajo utilizando una cola de mensajes Sysv.





     **[SWOOLE_IPC_PREEMPTIVE](#constant.swoole-ipc-preemptive)**
     ([int](#language.types.integer))



      El proceso de tarea comunica con el proceso de trabajo utilizando un modo preemptivo sobre una cola de mensajes sysvmsg.





     **[SWOOLE_SERVER_COMMAND_MASTER](#constant.swoole-server-command-master)**
     ([int](#language.types.integer))



      El proceso maestro acepta las solicitudes.





     **[SWOOLE_SERVER_COMMAND_MANAGER](#constant.swoole-server-command-manager)**
     ([int](#language.types.integer))



      El proceso de gestión acepta las solicitudes.





     **[SWOOLE_SERVER_COMMAND_REACTOR_THREAD](#constant.swoole-server-command-reactor-thread)**
     ([int](#language.types.integer))



      El hilo Reactor acepta las solicitudes.





     **[SWOOLE_SERVER_COMMAND_EVENT_WORKER](#constant.swoole-server-command-event-worker)**
     ([int](#language.types.integer))



      El proceso de trabajador de eventos acepta las solicitudes.





     **[SWOOLE_SERVER_COMMAND_TASK_WORKER](#constant.swoole-server-command-task-worker)**
     ([int](#language.types.integer))



      El proceso de trabajador de tareas acepta las solicitudes.





     **[SWOOLE_DISPATCH_ROUND](#constant.swoole-dispatch-round)**
     ([int](#language.types.integer))



      Modo round robin, cada proceso Worker será asignado secuencialmente para cada conexión recibida.





     **[SWOOLE_DISPATCH_FDMOD](#constant.swoole-dispatch-fdmod)**
     ([int](#language.types.integer))



      Asigna el Worker en función del descriptor de archivo de la conexión. Esto garantiza que los datos de la misma conexión
      serán tratados por el mismo Worker únicamente.





     **[SWOOLE_DISPATCH_IDLE_WORKER](#constant.swoole-dispatch-idle-worker)**
     ([int](#language.types.integer))



      El proceso principal elegirá la entrega en función del estado de carga de trabajo del Worker, entregando únicamente a los Workers inactivos.





     **[SWOOLE_DISPATCH_IPMOD](#constant.swoole-dispatch-ipmod)**
     ([int](#language.types.integer))



      Asignación basada en la IP del cliente utilizando un hachado módulo, asignando a un proceso Worker específico.
      Esto asegura que los datos de la misma conexión de IP fuente serán siempre asignados al
      mismo proceso Worker. Algoritmo: inet_addr_mod(ClientIP, worker_num).





     **[SWOOLE_DISPATCH_UIDMOD](#constant.swoole-dispatch-uidmod)**
     ([int](#language.types.integer))



      Requiere la asignación de un uid único llamando a Server-&gt;bind() en el código del usuario.
      Luego, el sistema subyacente asigna a diferentes procesos Worker en función del valor del UID.
      Algoritmo: UID % worker_num. Para usar strings como UID, puede utilizarse crc32(UID_STRING).





     **[SWOOLE_DISPATCH_USERFUNC](#constant.swoole-dispatch-userfunc)**
     ([int](#language.types.integer))



      Define una función de retorno dispatch_func, donde el valor de retorno determina
      qué proceso maneja la solicitud.





     **[SWOOLE_DISPATCH_CO_CONN_LB](#constant.swoole-dispatch-co-conn-lb)**
     ([int](#language.types.integer))



      Determina qué proceso maneja la solicitud en función del número de conexiones.





     **[SWOOLE_DISPATCH_CO_REQ_LB](#constant.swoole-dispatch-co-req-lb)**
     ([int](#language.types.integer))



      Determina qué proceso maneja la solicitud en función del número de solicitudes.





     **[SWOOLE_DISPATCH_CONCURRENT_LB](#constant.swoole-dispatch-concurrent-lb)**
     ([int](#language.types.integer))



      Determina qué proceso maneja la solicitud en función del número de conexiones y solicitudes.





     **[SWOOLE_WORKER_BUSY](#constant.swoole-worker-busy)**
     ([int](#language.types.integer))



      El proceso está ocupado.





     **[SWOOLE_WORKER_IDLE](#constant.swoole-worker-idle)**
     ([int](#language.types.integer))



      El proceso está inactivo.





     **[SWOOLE_WORKER_EXIT](#constant.swoole-worker-exit)**
     ([int](#language.types.integer))



      El proceso ha finalizado.





     **[SWOOLE_MUTEX](#constant.swoole-mutex)**
     ([int](#language.types.integer))



      Bloqueo Mutex.





     **[SWOOLE_RWLOCK](#constant.swoole-rwlock)**
     ([int](#language.types.integer))



      Bloqueo RW.





     **[SWOOLE_SPINLOCK](#constant.swoole-spinlock)**
     ([int](#language.types.integer))



      Verrour de spin.





     **[SWOOLE_CORO_MAX_NUM_LIMIT](#constant.swoole-coro-max-num-limit)**
     ([int](#language.types.integer))



      El número máximo de corrutinas creadas (PHP_INT_MAX).





     **[SWOOLE_CORO_INIT](#constant.swoole-coro-init)**
     ([int](#language.types.integer))



      Inicialización de corrutina.





     **[SWOOLE_CORO_WAITING](#constant.swoole-coro-waiting)**
     ([int](#language.types.integer))



      Rendimiento de la corrutina.





     **[SWOOLE_CORO_RUNNING](#constant.swoole-coro-running)**
     ([int](#language.types.integer))



      Completación de la corrutina.





     **[SWOOLE_CORO_END](#constant.swoole-coro-end)**
     ([int](#language.types.integer))



      Corrutina completada.





     **[SWOOLE_EXIT_IN_COROUTINE](#constant.swoole-exit-in-coroutine)**
     ([int](#language.types.integer))



      Ejecuta la función exit() en la corrutina.





     **[SWOOLE_EXIT_IN_SERVER](#constant.swoole-exit-in-server)**
     ([int](#language.types.integer))



      Ejecuta la función exit() en el servidor.





     **[SWOOLE_HTTP2_TYPE_DATA](#constant.swoole-http2-type-data)**
     ([int](#language.types.integer))



      Trama de datos HTTP2.





     **[SWOOLE_HTTP2_TYPE_HEADERS](#constant.swoole-http2-type-headers)**
     ([int](#language.types.integer))



      Trama de encabezados HTTP2.





     **[SWOOLE_HTTP2_TYPE_PRIORITY](#constant.swoole-http2-type-priority)**
     ([int](#language.types.integer))



      Trama de prioridad HTTP2.





     **[SWOOLE_HTTP2_TYPE_RST_STREAM](#constant.swoole-http2-type-rst-stream)**
     ([int](#language.types.integer))



      Trama de rst de flujo HTTP2.





     **[SWOOLE_HTTP2_TYPE_SETTINGS](#constant.swoole-http2-type-settings)**
     ([int](#language.types.integer))



      Trama de parámetros HTTP2.





     **[SWOOLE_HTTP2_TYPE_PUSH_PROMISE](#constant.swoole-http2-type-push-promise)**
     ([int](#language.types.integer))



      Trama de promesa de empuje HTTP2.





     **[SWOOLE_HTTP2_TYPE_PING](#constant.swoole-http2-type-ping)**
     ([int](#language.types.integer))



      Trama de ping HTTP2.





     **[SWOOLE_HTTP2_TYPE_GOAWAY](#constant.swoole-http2-type-goaway)**
     ([int](#language.types.integer))



      Trama de goaway HTTP2.





     **[SWOOLE_HTTP2_TYPE_WINDOW_UPDATE](#constant.swoole-http2-type-window-update)**
     ([int](#language.types.integer))



      Trama de actualización de ventana HTTP2.





     **[SWOOLE_HTTP2_TYPE_CONTINUATION](#constant.swoole-http2-type-continuation)**
     ([int](#language.types.integer))



      Trama de continuación HTTP2.





     **[SWOOLE_HTTP2_ERROR_NO_ERROR](#constant.swoole-http2-error-no-error)**
     ([int](#language.types.integer))



      Ningún error HTTP2.





     **[SWOOLE_HTTP2_ERROR_PROTOCOL_ERROR](#constant.swoole-http2-error-protocol-error)**
     ([int](#language.types.integer))



      Error de protocolo HTTP2.





     **[SWOOLE_HTTP2_ERROR_INTERNAL_ERROR](#constant.swoole-http2-error-internal-error)**
     ([int](#language.types.integer))



      Error interno HTTP2.





     **[SWOOLE_HTTP2_ERROR_FLOW_CONTROL_ERROR](#constant.swoole-http2-error-flow-control-error)**
     ([int](#language.types.integer))



      Error de control de flujo HTTP2.





     **[SWOOLE_HTTP2_ERROR_SETTINGS_TIMEOUT](#constant.swoole-http2-error-settings-timeout)**
     ([int](#language.types.integer))



      Error de tiempo de espera de los parámetros HTTP2.





     **[SWOOLE_HTTP2_ERROR_STREAM_CLOSED](#constant.swoole-http2-error-stream-closed)**
     ([int](#language.types.integer))



      Error de flujo HTTP2 cerrado.





     **[SWOOLE_HTTP2_ERROR_FRAME_SIZE_ERROR](#constant.swoole-http2-error-frame-size-error)**
     ([int](#language.types.integer))



      Error de tamaño de trama HTTP2.





     **[SWOOLE_HTTP2_ERROR_REFUSED_STREAM](#constant.swoole-http2-error-refused-stream)**
     ([int](#language.types.integer))



      Error de flujo rechazado HTTP2.





     **[SWOOLE_HTTP2_ERROR_CANCEL](#constant.swoole-http2-error-cancel)**
     ([int](#language.types.integer))



      Error de cancelación HTTP2.





     **[SWOOLE_HTTP2_ERROR_COMPRESSION_ERROR](#constant.swoole-http2-error-compression-error)**
     ([int](#language.types.integer))



      Error de compresión HTTP2.





     **[SWOOLE_HTTP2_ERROR_CONNECT_ERROR](#constant.swoole-http2-error-connect-error)**
     ([int](#language.types.integer))



      Error de conexión HTTP2.





     **[SWOOLE_HTTP2_ERROR_ENHANCE_YOUR_CALM](#constant.swoole-http2-error-enhance-your-calm)**
     ([int](#language.types.integer))



      Error enhance your calm HTTP2.





     **[SWOOLE_HTTP2_ERROR_INADEQUATE_SECURITY](#constant.swoole-http2-error-inadequate-security)**
     ([int](#language.types.integer))



      Error de seguridad inadecuada HTTP2.





     **[SWOOLE_HTTP2_ERROR_HTTP_1_1_REQUIRED](#constant.swoole-http2-error-http-1-1-required)**
     ([int](#language.types.integer))



      Error HTTP2 requiere http1.1.





     **[SWOOLE_HTTP_CLIENT_ESTATUS_CONNECT_FAILED](#constant.swoole-http-client-estatus-connect-failed)**
     ([int](#language.types.integer))



      Expiración de la conexión, el servidor no escucha en el puerto o hay una falla en la red,
      se puede leer $errCode para obtener el código de error de red específico.





     **[SWOOLE_HTTP_CLIENT_ESTATUS_REQUEST_TIMEOUT](#constant.swoole-http-client-estatus-request-timeout)**
     ([int](#language.types.integer))



      Expiración de la petición, el servidor no ha devuelto una respuesta en el tiempo especificado.





     **[SWOOLE_HTTP_CLIENT_ESTATUS_SERVER_RESET](#constant.swoole-http-client-estatus-server-reset)**
     ([int](#language.types.integer))



      Después de que la petición del cliente sea enviada, el servidor ha forzado la desconexión de la conexión.





     **[SWOOLE_HTTP_CLIENT_ESTATUS_SEND_FAILED](#constant.swoole-http-client-estatus-send-failed)**
     ([int](#language.types.integer))



      Fallo al enviar al cliente (esta constante está disponible en Swoole versión &gt;= v4.5.9,
      anteriormente, se utilizaba el código de estado).





     **[SWOOLE_MSGQUEUE_ORIENT](#constant.swoole-msgqueue-orient)**
     ([int](#language.types.integer))



      Swoole\Process::pop() va a devolver un dato específico en la cola con el tipo de mensaje como id del proceso + 1,
      Swoole\Process::pusl() va a añadir el tipo de mensaje id del proceso + 1 al dato.





     **[SWOOLE_MSGQUEUE_BALANCE](#constant.swoole-msgqueue-balance)**
     ([int](#language.types.integer))



      Swoole\Process::pop() devuelve el primer mensaje en la cola,
      Swoole\Process::push() no añade un tipo específico al mensaje.





     **[SWOOLE_HOOK_TCP](#constant.swoole-hook-tcp)**
     ([int](#language.types.integer))



      Flujo basado en corrutina de tipo TCP Socket, incluyendo los tipos más comunes como Redis, PDO, Mysqli.





     **[SWOOLE_HOOK_UDP](#constant.swoole-hook-udp)**
     ([int](#language.types.integer))



      Flujo basado en corrutina de tipo UDP Socket.





     **[SWOOLE_HOOK_UNIX](#constant.swoole-hook-unix)**
     ([int](#language.types.integer))



      Flujo basado en corrutina de tipo Unix Socket.





     **[SWOOLE_HOOK_UDG](#constant.swoole-hook-udg)**
     ([int](#language.types.integer))



      Flujo basado en corrutina de tipo UDG Stream Socket.





     **[SWOOLE_HOOK_SSL](#constant.swoole-hook-ssl)**
     ([int](#language.types.integer))



      Flujo basado en corrutina de tipo SSL Stream Socket.





     **[SWOOLE_HOOK_TLS](#constant.swoole-hook-tls)**
     ([int](#language.types.integer))



      Flujo basado en corrutina de tipo TLS Stream Socket.





     **[SWOOLE_HOOK_STREAM_FUNCTION](#constant.swoole-hook-stream-function)**
     ([int](#language.types.integer))



      Flujo basado en corrutina para las funciones stream_*.





     **[SWOOLE_HOOK_FILE](#constant.swoole-hook-file)**
     ([int](#language.types.integer))



      Fichero basado en corrutina para las funciones de ficheros.





     **[SWOOLE_HOOK_STDIO](#constant.swoole-hook-stdio)**
     ([int](#language.types.integer))



      Operaciones STDIO basadas en corrutina.





     **[SWOOLE_HOOK_SLEEP](#constant.swoole-hook-sleep)**
     ([int](#language.types.integer))



      Operaciones de sueño basadas en corrutina, incluyendo sleep, usleep, time_nanosleep, time_sleep_until.





     **[SWOOLE_HOOK_PROC](#constant.swoole-hook-proc)**
     ([int](#language.types.integer))



      Funciones proc* basadas en corrutina, incluyendo: proc_open, proc_close, proc_get_status, proc_terminate.





     **[SWOOLE_HOOK_CURL](#constant.swoole-hook-curl)**
     ([int](#language.types.integer))



      Extensión curl basada en corrutina.





     **[SWOOLE_HOOK_NATIVE_CURL](#constant.swoole-hook-native-curl)**
     ([int](#language.types.integer))



      Extensión curl nativa basada en corrutina.





     **[SWOOLE_HOOK_BLOCKING_FUNCTION](#constant.swoole-hook-blocking-function)**
     ([int](#language.types.integer))



      Función no bloqueante basada en corrutina, incluyendo: gethostbyname, exec, shell_exec.





     **[SWOOLE_HOOK_SOCKETS](#constant.swoole-hook-sockets)**
     ([int](#language.types.integer))



      Extensión sockets basada en corrutina.





     **[SWOOLE_HOOK_PDO_PGSQL](#constant.swoole-hook-pdo-pgsql)**
     ([int](#language.types.integer))



      Extensión pdo_pgsql basada en corrutina.





     **[SWOOLE_HOOK_PDO_ODBC](#constant.swoole-hook-pdo-odbc)**
     ([int](#language.types.integer))



      Extensión pdo_odbc basada en corrutina.





     **[SWOOLE_HOOK_PDO_ORACLE](#constant.swoole-hook-pdo-oracle)**
     ([int](#language.types.integer))



      Extensión pdo_oracle basada en corrutina.





     **[SWOOLE_HOOK_PDO_SQLITE](#constant.swoole-hook-pdo-sqlite)**
     ([int](#language.types.integer))



      Extensión pdo_sqlite basada en corrutina.





     **[SWOOLE_HOOK_ALL](#constant.swoole-hook-all)**
     ([int](#language.types.integer))



      Todos los bloques de funciones y extensiones basadas en corrutina.





     **[SOCKET_ECANCELED](#constant.socket-ecanceled)**
     ([int](#language.types.integer))



      Error de socket ecanceled.





     **[TCP_INFO](#constant.tcp-info)**
     ([int](#language.types.integer))



      TCP_INFO.





     **[SWOOLE_TIMER_MIN_MS](#constant.swoole-timer-min-ms)**
     ([int](#language.types.integer))



      El mínimo del intervalo de temporizador soportado (en milisegundos).





     **[SWOOLE_TIMER_MIN_SEC](#constant.swoole-timer-min-sec)**
     ([double](#language.types.float))



      El mínimo del intervalo de temporizador admitido (en segundos).





     **[SWOOLE_TIMER_MAX_MS](#constant.swoole-timer-max-ms)**
     ([int](#language.types.integer))



      El máximo del intervalo de temporizador admitido (en milisegundos).





     **[SWOOLE_TIMER_MAX_SEC](#constant.swoole-timer-max-sec)**
     ([int](#language.types.integer))



      El máximo del intervalo de temporizador admitido (en segundos).





     **[SWOOLE_WEBSOCKET_STATUS_CONNECTION](#constant.swoole-websocket-status-connection)**
     ([int](#language.types.integer))



      WebSocket se encuentra en fase de conexión.





     **[SWOOLE_WEBSOCKET_STATUS_HANDSHAKE](#constant.swoole-websocket-status-handshake)**
     ([int](#language.types.integer))



      El WebSocket se encuentra en fase de apretón de manos.





     **[SWOOLE_WEBSOCKET_STATUS_ACTIVE](#constant.swoole-websocket-status-active)**
     ([int](#language.types.integer))



      Conexión WebSocket activa.





     **[SWOOLE_WEBSOCKET_STATUS_CLOSING](#constant.swoole-websocket-status-closing)**
     ([int](#language.types.integer))



      La conexión WebSocket está cerrada.





     **[SWOOLE_WEBSOCKET_OPCODE_CONTINUATION](#constant.swoole-websocket-opcode-continuation)**
     ([int](#language.types.integer))



      Trama de continuación WebSocket.





     **[SWOOLE_WEBSOCKET_OPCODE_TEXT](#constant.swoole-websocket-opcode-text)**
     ([int](#language.types.integer))



      Trama de texto WebSocket.





     **[SWOOLE_WEBSOCKET_OPCODE_BINARY](#constant.swoole-websocket-opcode-binary)**
     ([int](#language.types.integer))



      Trama binaria WebSocket.





     **[SWOOLE_WEBSOCKET_OPCODE_CLOSE](#constant.swoole-websocket-opcode-close)**
     ([int](#language.types.integer))



      Trama de cierre WebSocket.





     **[SWOOLE_WEBSOCKET_OPCODE_PING](#constant.swoole-websocket-opcode-ping)**
     ([int](#language.types.integer))



      Trama de ping WebSocket.





     **[SWOOLE_WEBSOCKET_OPCODE_PONG](#constant.swoole-websocket-opcode-pong)**
     ([int](#language.types.integer))



      Trama de pong WebSocket.





     **[SWOOLE_WEBSOCKET_FLAG_FIN](#constant.swoole-websocket-flag-fin)**
     ([int](#language.types.integer))



      Flag FIN WebSocket.





     **[SWOOLE_WEBSOCKET_FLAG_RSV1](#constant.swoole-websocket-flag-rsv1)**
     ([int](#language.types.integer))



      Flag RSV1 WebSocket.





     **[SWOOLE_WEBSOCKET_FLAG_RSV2](#constant.swoole-websocket-flag-rsv2)**
     ([int](#language.types.integer))



      Flag RSV2 WebSocket.





     **[SWOOLE_WEBSOCKET_FLAG_RSV3](#constant.swoole-websocket-flag-rsv3)**
     ([int](#language.types.integer))



      Flag RSV3 WebSocket.





     **[SWOOLE_WEBSOCKET_FLAG_MASK](#constant.swoole-websocket-flag-mask)**
     ([int](#language.types.integer))



      Flag MASK WebSocket.





     **[SWOOLE_WEBSOCKET_FLAG_COMPRESS](#constant.swoole-websocket-flag-compress)**
     ([int](#language.types.integer))



      Flag COMPRESS WebSocket.





     **[SWOOLE_WEBSOCKET_CLOSE_NORMAL](#constant.swoole-websocket-close-normal)**
     ([int](#language.types.integer))



      Cierre normal (la conexión ha finalizado con éxito).





     **[SWOOLE_WEBSOCKET_CLOSE_GOING_AWAY](#constant.swoole-websocket-close-going-away)**
     ([int](#language.types.integer))



      El punto final se ha ido (por ejemplo, pestaña del navegador cerrada).





     **[SWOOLE_WEBSOCKET_CLOSE_PROTOCOL_ERROR](#constant.swoole-websocket-close-protocol-error)**
     ([int](#language.types.integer))



      Error de protocolo (trama de datos malformada).





     **[SWOOLE_WEBSOCKET_CLOSE_DATA_ERROR](#constant.swoole-websocket-close-data-error)**
     ([int](#language.types.integer))



      Recepción de datos no soportada (por ejemplo, binaria cuando se espera texto).





     **[SWOOLE_WEBSOCKET_CLOSE_STATUS_ERROR](#constant.swoole-websocket-close-status-error)**
     ([int](#language.types.integer))



      No se ha proporcionado código de estado (enviado como un espacio reservado).





     **[SWOOLE_WEBSOCKET_CLOSE_ABNORMAL](#constant.swoole-websocket-close-abnormal)**
     ([int](#language.types.integer))



      Cierre anormal (ninguna trama de cierre recibida, por ejemplo, reinicialización TCP).





     **[SWOOLE_WEBSOCKET_CLOSE_MESSAGE_ERROR](#constant.swoole-websocket-close-message-error)**
     ([int](#language.types.integer))



      Datos inválidos (por ejemplo, texto no-UTF-8 en una trama de texto).





     **[SWOOLE_WEBSOCKET_CLOSE_POLICY_ERROR](#constant.swoole-websocket-close-policy-error)**
     ([int](#language.types.integer))



      Violación de la política (por ejemplo, acción no autorizada).





     **[SWOOLE_WEBSOCKET_CLOSE_MESSAGE_TOO_BIG](#constant.swoole-websocket-close-message-too-big)**
     ([int](#language.types.integer))



      Mensaje demasiado grande (supera el tamaño máximo del servidor).





     **[SWOOLE_WEBSOCKET_CLOSE_EXTENSION_MISSING](#constant.swoole-websocket-close-extension-missing)**
     ([int](#language.types.integer))



      El cliente no ha negociado las extensiones requeridas.





     **[SWOOLE_WEBSOCKET_CLOSE_SERVER_ERROR](#constant.swoole-websocket-close-server-error)**
     ([int](#language.types.integer))



      El servidor ha encontrado un error.





     **[SWOOLE_WEBSOCKET_CLOSE_CLOSE_SERVICE_RESTART](#constant.swoole-websocket-close-close-service-restart)**
     ([int](#language.types.integer))



      El servicio se reinicia (condición temporal).





     **[SWOOLE_WEBSOCKET_CLOSE_TRY_AGAIN_LATER](#constant.swoole-websocket-close-try-again-later)**
     ([int](#language.types.integer))



      El servidor está temporalmente sobrecargado (el cliente debería reintentar).





     **[SWOOLE_WEBSOCKET_CLOSE_BAD_GATEWAY](#constant.swoole-websocket-close-bad-gateway)**
     ([int](#language.types.integer))



      Respuesta inválida del servidor en amont.





     **[SWOOLE_WEBSOCKET_CLOSE_TLS](#constant.swoole-websocket-close-tls)**
     ([int](#language.types.integer))



      El apretón de manos TLS ha fallado (utilizado cuando HTTPS falla).


# Funciones de Swoole

# swoole_async_dns_lookup

(PECL swoole &gt;= 1.9.0)

swoole_async_dns_lookup — Busca de manera asíncrona y no bloqueante la dirección IP de un host

### Descripción

**swoole_async_dns_lookup**([string](#language.types.string) $hostname, [callable](#language.types.callable) $callback): [bool](#language.types.boolean)

### Parámetros

    hostname


      El nombre de host.






    callback



       callback([string](#language.types.string) $hostname, [string](#language.types.string) $ip): [mixed](#language.types.mixed)



        hostname


          El nombre de host.






        IP


          La dirección IP.








### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# swoole_async_read

(PECL swoole &gt;= 1.9.0)

swoole_async_read — Lee un flujo de fichero de manera asíncrona

### Descripción

**swoole_async_read**(
    [string](#language.types.string) $filename,
    [callable](#language.types.callable) $callback,
    [int](#language.types.integer) $chunk_size = 65536,
    [int](#language.types.integer) $offset = 0
): [bool](#language.types.boolean)

### Parámetros

    filename


      El nombre del fichero a leer.






    callback


       callback([string](#language.types.string) $filename, [string](#language.types.string) $content): [mixed](#language.types.mixed)



        filename


          El nombre del fichero.






        content


          El contenido leído del flujo de fichero.









    chunk_size


      El tamaño del fragmento.






    offset


      El desplazamiento.


### Valores devueltos

Si la lectura tiene éxito.

# swoole_async_readfile

(PECL swoole &gt;= 1.9.0)

swoole_async_readfile — Lee un fichero de manera asíncrona

### Descripción

**swoole_async_readfile**([string](#language.types.string) $filename, [callable](#language.types.callable) $callback): [bool](#language.types.boolean)

### Parámetros

    filename


      El nombre del fichero a leer.






    callback


       callback([string](#language.types.string) $filename, [string](#language.types.string) $content): [mixed](#language.types.mixed)



        filename


          El nombre del fichero.






        content


          El contenido leído del fichero.







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# swoole_async_set

(PECL swoole &gt;= 1.9.0)

swoole_async_set — Actualiza las opciones de E/S asíncronas

### Descripción

**swoole_async_set**([array](#language.types.array) $settings): [void](language.types.void.html)

### Parámetros

    settings





### Valores devueltos

No se retorna ningún valor.

# swoole_async_write

(PECL swoole &gt;= 1.9.0)

swoole_async_write — Escribe datos en un flujo de fichero de manera asíncrona

### Descripción

**swoole_async_write**(
    [string](#language.types.string) $filename,
    [string](#language.types.string) $content,
    [int](#language.types.integer) $offset = ?,
    [callable](#language.types.callable) $callback = ?
): [bool](#language.types.boolean)

### Parámetros

    filename


      El nombre del fichero a escribir.






    content


      El contenido a escribir en el fichero.






    offset


      El desplazamiento.






    callback





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# swoole_async_writefile

(PECL swoole &gt;= 1.9.0)

swoole_async_writefile — Escribe datos en un fichero de manera asíncrona

### Descripción

**swoole_async_writefile**(
    [string](#language.types.string) $filename,
    [string](#language.types.string) $content,
    [callable](#language.types.callable) $callback = ?,
    [int](#language.types.integer) $flags = 0
): [bool](#language.types.boolean)

### Parámetros

    filename


      El nombre del fichero a escribir.






    content


      El contenido a escribir en el fichero.






    callback









    flags





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# swoole_clear_error

(PECL swoole &gt;= 4.6.0)

swoole_clear_error — Elimina los errores en el socket o el último código de error

### Descripción

**swoole_clear_error**(): [void](language.types.void.html)

Elimina los errores en el socket o el último código de error.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# swoole_client_select

(PECL swoole &gt;= 1.9.0)

swoole_client_select — Devuelve la descripción del fichero listo para ser leído/escrito o un error

### Descripción

**swoole_client_select**(
    [array](#language.types.array) &amp;$read_array,
    [array](#language.types.array) &amp;$write_array,
    [array](#language.types.array) &amp;$error_array,
    [float](#language.types.float) $timeout = 0.5
): [int](#language.types.integer)

### Parámetros

    read_array









    write_array









    error_array









    timeout





### Valores devueltos

# swoole_cpu_num

(PECL swoole &gt;= 1.9.0)

swoole_cpu_num — Devuelve el número de CPU

### Descripción

**swoole_cpu_num**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El número de CPU.

# swoole_errno

(PECL swoole &gt;= 1.9.0)

swoole_errno — Devuelve el código de error de la última llamada al sistema

### Descripción

**swoole_errno**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# swoole_error_log

(PECL swoole &gt;= 4.5.8)

swoole_error_log — Escribe los mensajes de error en el registro

### Descripción

**swoole_error_log**([int](#language.types.integer) $level, [string](#language.types.string) $msg): [void](language.types.void.html)

Escribe los mensajes de error en el registro.

### Parámetros

    level


      El nivel de registro, las siguientes constantes pueden ser utilizadas: **[SWOOLE_LOG_DEBUG](#constant.swoole-log-debug)**,
      **[SWOOLE_LOG_TRACE](#constant.swoole-log-trace)**,
      **[SWOOLE_LOG_INFO](#constant.swoole-log-info)**,
      **[SWOOLE_LOG_NOTICE](#constant.swoole-log-notice)**,
      **[SWOOLE_LOG_WARNING](#constant.swoole-log-warning)**,
      **[SWOOLE_LOG_ERROR](#constant.swoole-log-error)**,
      **[SWOOLE_LOG_NONE](#constant.swoole-log-none)**






    msg


      El contenido del mensaje a escribir en el registro.


### Valores devueltos

No se retorna ningún valor.

# swoole_event_add

(PECL swoole &gt;= 1.9.0)

swoole_event_add — Añade una nueva función de retrollamada de un socket en el EventLoop

### Descripción

**swoole_event_add**(
    [int](#language.types.integer) $fd,
    [callable](#language.types.callable) $read_callback = ?,
    [callable](#language.types.callable) $write_callback = ?,
    [int](#language.types.integer) $events = 0
): [int](#language.types.integer)

### Parámetros

    fd









    read_callback









    write_callback









    events





### Valores devueltos

# swoole_event_defer

(PECL swoole &gt;= 1.9.0)

swoole_event_defer — Añade una retrollamada a la próxima iteración del bucle de eventos

### Descripción

**swoole_event_defer**([callable](#language.types.callable) $callback): [bool](#language.types.boolean)

### Parámetros

    callback





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# swoole_event_del

(PECL swoole &gt;= 1.9.0)

swoole_event_del — Elimina todas las funciones de retrollamada de eventos de un socket

### Descripción

**swoole_event_del**([int](#language.types.integer) $fd): [bool](#language.types.boolean)

### Parámetros

    fd





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# swoole_event_exit

(PECL swoole &gt;= 1.9.0)

swoole_event_exit — Sale del bucle de eventos, disponible únicamente en el lado-cliente

### Descripción

**swoole_event_exit**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# swoole_event_set

(PECL swoole &gt;= 1.9.0)

swoole_event_set — Actualiza las funciones de retrollamada de eventos de un socket

### Descripción

**swoole_event_set**(
    [int](#language.types.integer) $fd,
    [callable](#language.types.callable) $read_callback = ?,
    [callable](#language.types.callable) $write_callback = ?,
    [int](#language.types.integer) $events = 0
): [bool](#language.types.boolean)

### Parámetros

    fd









    read_callback









    write_callback









    events





### Valores devueltos

# swoole_event_wait

(PECL swoole &gt;= 1.9.0)

swoole_event_wait — Inicia el bucle de eventos

### Descripción

**swoole_event_wait**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# swoole_event_write

(PECL swoole &gt;= 1.9.0)

swoole_event_write — Escribe datos en un socket

### Descripción

**swoole_event_write**([int](#language.types.integer) $fd, [string](#language.types.string) $data): [bool](#language.types.boolean)

### Parámetros

    fd









    data





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# swoole_get_local_ip

(PECL swoole &gt;= 1.9.0)

swoole_get_local_ip — Devuelve las direcciones IP IPv4 de cada NIC en la máquina

### Descripción

**swoole_get_local_ip**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# swoole_last_error

(PECL swoole &gt;= 1.9.0)

swoole_last_error — Devuelve el último mensaje de error

### Descripción

**swoole_last_error**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# swoole_load_module

(PECL swoole &gt;= 1.9.0)

swoole_load_module — Carga una extensión swoole

### Descripción

**swoole_load_module**([string](#language.types.string) $filename): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# swoole_select

(PECL swoole &gt;= 1.9.0)

swoole_select — Selecciona las descripciones de ficheros listas para leer/escribir o en error en el bucle de eventos

### Descripción

**swoole_select**(
    [array](#language.types.array) &amp;$read_array,
    [array](#language.types.array) &amp;$write_array,
    [array](#language.types.array) &amp;$error_array,
    [float](#language.types.float) $timeout = ?
): [int](#language.types.integer)

### Parámetros

    read_array









    write_array









    error_array









    timeout





### Valores devueltos

# swoole_set_process_name

(PECL swoole &gt;= 1.9.0)

swoole_set_process_name — Define el nombre del proceso

### Descripción

**swoole_set_process_name**([string](#language.types.string) $process_name, [int](#language.types.integer) $size = 128): [void](language.types.void.html)

### Parámetros

    process_name





### Valores devueltos

# swoole_strerror

(PECL swoole &gt;= 1.9.0)

swoole_strerror — Convierte el Errno en mensajes de error

### Descripción

**swoole_strerror**([int](#language.types.integer) $errno, [int](#language.types.integer) $error_type = 0): [string](#language.types.string)

### Parámetros

    errno





### Valores devueltos

# swoole_timer_after

(PECL swoole &gt;= 1.9.0)

swoole_timer_after — Dispara una retrollamada única en el futuro

### Descripción

**swoole_timer_after**([int](#language.types.integer) $ms, [callable](#language.types.callable) $callback, [mixed](#language.types.mixed) $param = ?): [int](#language.types.integer)

### Parámetros

    ms









    callback









    param





### Valores devueltos

# swoole_timer_exists

(PECL swoole &gt;= 1.9.0)

swoole_timer_exists — Devuelve si existe una retrollamada de temporizador

### Descripción

**swoole_timer_exists**([int](#language.types.integer) $timer_id): [bool](#language.types.boolean)

### Parámetros

    timer_id





### Valores devueltos

# swoole_timer_tick

(PECL swoole &gt;= 1.9.0)

swoole_timer_tick — Dispara una retrollamada de temporizador por intervalo de tiempo

### Descripción

**swoole_timer_tick**([int](#language.types.integer) $ms, [callable](#language.types.callable) $callback, [mixed](#language.types.mixed) $param = ?): [int](#language.types.integer)

### Parámetros

    ms









    callback





### Valores devueltos

# swoole_version

(PECL swoole &gt;= 1.9.0)

swoole_version — Devuelve la versión de Swoole

### Descripción

**swoole_version**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La versión de Swoole.

## Tabla de contenidos

- [swoole_async_dns_lookup](#function.swoole-async-dns-lookup) — Busca de manera asíncrona y no bloqueante la dirección IP de un host
- [swoole_async_read](#function.swoole-async-read) — Lee un flujo de fichero de manera asíncrona
- [swoole_async_readfile](#function.swoole-async-readfile) — Lee un fichero de manera asíncrona
- [swoole_async_set](#function.swoole-async-set) — Actualiza las opciones de E/S asíncronas
- [swoole_async_write](#function.swoole-async-write) — Escribe datos en un flujo de fichero de manera asíncrona
- [swoole_async_writefile](#function.swoole-async-writefile) — Escribe datos en un fichero de manera asíncrona
- [swoole_clear_error](#function.swoole-clear-error) — Elimina los errores en el socket o el último código de error
- [swoole_client_select](#function.swoole-client-select) — Devuelve la descripción del fichero listo para ser leído/escrito o un error
- [swoole_cpu_num](#function.swoole-cpu-num) — Devuelve el número de CPU
- [swoole_errno](#function.swoole-errno) — Devuelve el código de error de la última llamada al sistema
- [swoole_error_log](#function.swoole-error-log) — Escribe los mensajes de error en el registro
- [swoole_event_add](#function.swoole-event-add) — Añade una nueva función de retrollamada de un socket en el EventLoop
- [swoole_event_defer](#function.swoole-event-defer) — Añade una retrollamada a la próxima iteración del bucle de eventos
- [swoole_event_del](#function.swoole-event-del) — Elimina todas las funciones de retrollamada de eventos de un socket
- [swoole_event_exit](#function.swoole-event-exit) — Sale del bucle de eventos, disponible únicamente en el lado-cliente
- [swoole_event_set](#function.swoole-event-set) — Actualiza las funciones de retrollamada de eventos de un socket
- [swoole_event_wait](#function.swoole-event-wait) — Inicia el bucle de eventos
- [swoole_event_write](#function.swoole-event-write) — Escribe datos en un socket
- [swoole_get_local_ip](#function.swoole-get-local-ip) — Devuelve las direcciones IP IPv4 de cada NIC en la máquina
- [swoole_last_error](#function.swoole-last-error) — Devuelve el último mensaje de error
- [swoole_load_module](#function.swoole-load-module) — Carga una extensión swoole
- [swoole_select](#function.swoole-select) — Selecciona las descripciones de ficheros listas para leer/escribir o en error en el bucle de eventos
- [swoole_set_process_name](#function.swoole-set-process-name) — Define el nombre del proceso
- [swoole_strerror](#function.swoole-strerror) — Convierte el Errno en mensajes de error
- [swoole_timer_after](#function.swoole-timer-after) — Dispara una retrollamada única en el futuro
- [swoole_timer_exists](#function.swoole-timer-exists) — Devuelve si existe una retrollamada de temporizador
- [swoole_timer_tick](#function.swoole-timer-tick) — Dispara una retrollamada de temporizador por intervalo de tiempo
- [swoole_version](#function.swoole-version) — Devuelve la versión de Swoole

# La clase Swoole\Async

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Async**

     {


    /* Métodos */

public static [dnsLookup](#swoole-async.dnslookup)([string](#language.types.string) $hostname, [callable](#language.types.callable) $callback): [void](language.types.void.html)
public static [read](#swoole-async.read)(
    [string](#language.types.string) $filename,
    [callable](#language.types.callable) $callback,
    [int](#language.types.integer) $chunk_size = ?,
    [int](#language.types.integer) $offset = ?
): [bool](#language.types.boolean)
public static [readFile](#swoole-async.readfile)([string](#language.types.string) $filename, [callable](#language.types.callable) $callback): [void](language.types.void.html)
public static [set](#swoole-async.set)([array](#language.types.array) $settings): [void](language.types.void.html)
public static [write](#swoole-async.write)(
    [string](#language.types.string) $filename,
    [string](#language.types.string) $content,
    [int](#language.types.integer) $offset = ?,
    [callable](#language.types.callable) $callback = ?
): [void](language.types.void.html)
public static [writeFile](#swoole-async.writefile)(
    [string](#language.types.string) $filename,
    [string](#language.types.string) $content,
    [callable](#language.types.callable) $callback = ?,
    [string](#language.types.string) $flags = ?
): [void](language.types.void.html)

}

# Swoole\Async::dnsLookup

(PECL swoole &gt;= 1.9.0)

Swoole\Async::dnsLookup — Busca de manera asíncrona y no bloqueante la dirección IP de un host.

### Descripción

public static **Swoole\Async::dnsLookup**([string](#language.types.string) $hostname, [callable](#language.types.callable) $callback): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    hostname


      El nombre de host.






    callback


       callback([string](#language.types.string) $hostname, [string](#language.types.string) $ip): [mixed](#language.types.mixed)



        hostname


          El nombre de host.






        IP


          La dirección IP.








# Swoole\Async::read

(PECL swoole &gt;= 1.9.0)

Swoole\Async::read — Lee de manera asíncrona un flujo de fichero.

### Descripción

public static **Swoole\Async::read**(
    [string](#language.types.string) $filename,
    [callable](#language.types.callable) $callback,
    [int](#language.types.integer) $chunk_size = ?,
    [int](#language.types.integer) $offset = ?
): [bool](#language.types.boolean)

### Parámetros

    filename


      El nombre del fichero.






    callback


       callback([string](#language.types.string) $filename, [string](#language.types.string) $content): [mixed](#language.types.mixed)



        filename


          El nombre del fichero.






        content


          El contenido leído desde el flujo de fichero.









    chunk_size


      El tamaño del fragmento.






    offset


      El desplazamiento.


### Valores devueltos

Si la lectura tiene éxito.

# Swoole\Async::readFile

(PECL swoole &gt;= 1.9.0)

Swoole\Async::readFile — Lee un fichero de manera asíncrona.

### Descripción

public static **Swoole\Async::readFile**([string](#language.types.string) $filename, [callable](#language.types.callable) $callback): [void](language.types.void.html)

### Parámetros

    filename


      El nombre del fichero a leer.






    callback


       callback([string](#language.types.string) $filename, [string](#language.types.string) $content): [mixed](#language.types.mixed)



        filename


          El nombre del fichero.






        content


          El contenido leído desde el fichero.







# Swoole\Async::set

(PECL swoole &gt;= 1.9.0)

Swoole\Async::set — Actualiza las opciones de E/S asíncrona.

### Descripción

public static **Swoole\Async::set**([array](#language.types.array) $settings): [void](language.types.void.html)

### Parámetros

    settings





# Swoole\Async::write

(PECL swoole &gt;= 1.9.0)

Swoole\Async::write — Escribe de manera asíncrona datos en un flujo de fichero.

### Descripción

public static **Swoole\Async::write**(
    [string](#language.types.string) $filename,
    [string](#language.types.string) $content,
    [int](#language.types.integer) $offset = ?,
    [callable](#language.types.callable) $callback = ?
): [void](language.types.void.html)

### Parámetros

    filename


      El nombre del fichero en el cual escribir.






    content


      El contenido a escribir en el fichero.






    offset


      El desplazamiento.






    callback





# Swoole\Async::writeFile

(PECL swoole &gt;= 1.9.0)

Swoole\Async::writeFile — Descripción

### Descripción

public static **Swoole\Async::writeFile**(
    [string](#language.types.string) $filename,
    [string](#language.types.string) $content,
    [callable](#language.types.callable) $callback = ?,
    [string](#language.types.string) $flags = ?
): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    filename


      El nombre del fichero a escribir.






    content


      El contenido a escribir en el fichero.






    callback









    flags





## Tabla de contenidos

- [Swoole\Async::dnsLookup](#swoole-async.dnslookup) — Busca de manera asíncrona y no bloqueante la dirección IP de un host.
- [Swoole\Async::read](#swoole-async.read) — Lee de manera asíncrona un flujo de fichero.
- [Swoole\Async::readFile](#swoole-async.readfile) — Lee un fichero de manera asíncrona.
- [Swoole\Async::set](#swoole-async.set) — Actualiza las opciones de E/S asíncrona.
- [Swoole\Async::write](#swoole-async.write) — Escribe de manera asíncrona datos en un flujo de fichero.
- [Swoole\Async::writeFile](#swoole-async.writefile) — Descripción

# La clase Swoole\Atomic

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Atomic**

     {


    /* Métodos */

public [add](#swoole-atomic.add)([int](#language.types.integer) $add_value = ?): [int](#language.types.integer)
public [cmpset](#swoole-atomic.cmpset)([int](#language.types.integer) $cmp_value, [int](#language.types.integer) $new_value): [int](#language.types.integer)
public [get](#swoole-atomic.get)(): [int](#language.types.integer)
public [set](#swoole-atomic.set)([int](#language.types.integer) $value): [int](#language.types.integer)
public [sub](#swoole-atomic.sub)([int](#language.types.integer) $sub_value = ?): [int](#language.types.integer)

}

# Swoole\Atomic::add

(PECL swoole &gt;= 1.9.0)

Swoole\Atomic::add — Añade un número al valor del objeto atómico.

### Descripción

public **Swoole\Atomic::add**([int](#language.types.integer) $add_value = ?): [int](#language.types.integer)

    Añade un número al valor del objeto atómico.

### Parámetros

    add_value


      El valor que será añadido al valor actual.


### Valores devueltos

El nuevo valor del objeto atómico.

# Swoole\Atomic::cmpset

(PECL swoole &gt;= 1.9.0)

Swoole\Atomic::cmpset — Compara y define el valor del objeto atómico.

### Descripción

public **Swoole\Atomic::cmpset**([int](#language.types.integer) $cmp_value, [int](#language.types.integer) $new_value): [int](#language.types.integer)

### Parámetros

    cmp_value


      El valor a comparar con el valor actual del objeto atómico.






    new_value


      El valor a definir en el objeto atómico si el valor de cmp_value es el mismo que el valor actual del
      objeto atómico.


### Valores devueltos

El nuevo valor del objeto atómico.

# Swoole\Atomic::\_\_construct

(PECL swoole &gt;= 1.9.0)

Swoole\Atomic::\_\_construct — Construye un nuevo objeto atómico Swoole.

### Descripción

public **Swoole\Atomic::\_\_construct**([int](#language.types.integer) $value = ?)

    Un objeto atómico Swoole es una variable entera que permite a cualquier procesador probar y modificar de manera atómica.
    Se implementa sobre la base de las instrucciones atómicas del procesador. Las variables atómicas Swoole deben definirse antes
    de que se llame a swoole_server-&gt;start.





    Compare-and-swap (CAS) es una instrucción atómica utilizada en el multithreading para realizar la sincronización.
    Compara el contenido de una ubicación de memoria con un valor dado y, solo si son idénticos,
    modifica el contenido de esa ubicación de memoria a un nuevo valor dado.

### Parámetros

    value


      El valor del objeto atómico.


# Swoole\Atomic::get

(PECL swoole &gt;= 1.9.0)

Swoole\Atomic::get — Devuelve el valor actual del objeto atómico.

### Descripción

public **Swoole\Atomic::get**(): [int](#language.types.integer)

    Devuelve el valor actual del objeto atómico.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor actual del objeto atómico.

# Swoole\Atomic::set

(PECL swoole &gt;= 1.9.0)

Swoole\Atomic::set — Define un nuevo valor para el objeto atómico.

### Descripción

public **Swoole\Atomic::set**([int](#language.types.integer) $value): [int](#language.types.integer)

    Define un nuevo valor para el objeto atómico.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    value


      El valor a definir para el objeto atómico.


### Valores devueltos

El nuevo valor del objeto atómico.

# Swoole\Atomic::sub

(PECL swoole &gt;= 1.9.0)

Swoole\Atomic::sub — Sustrae un número del valor del objeto atómico.

### Descripción

public **Swoole\Atomic::sub**([int](#language.types.integer) $sub_value = ?): [int](#language.types.integer)

    Sustrae un número del valor del objeto atómico.

### Parámetros

    sub_value


      El valor que será sustraído del valor actual.


### Valores devueltos

    El nuevo valor del objeto atómico.

## Tabla de contenidos

- [Swoole\Atomic::add](#swoole-atomic.add) — Añade un número al valor del objeto atómico.
- [Swoole\Atomic::cmpset](#swoole-atomic.cmpset) — Compara y define el valor del objeto atómico.
- [Swoole\Atomic::\_\_construct](#swoole-atomic.construct) — Construye un nuevo objeto atómico Swoole.
- [Swoole\Atomic::get](#swoole-atomic.get) — Devuelve el valor actual del objeto atómico.
- [Swoole\Atomic::set](#swoole-atomic.set) — Define un nuevo valor para el objeto atómico.
- [Swoole\Atomic::sub](#swoole-atomic.sub) — Sustrae un número del valor del objeto atómico.

# La clase Swoole\Buffer

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Buffer**

     {


    /* Métodos */

public [append](#swoole-buffer.append)([string](#language.types.string) $data): [int](#language.types.integer)
public [clear](#swoole-buffer.clear)(): [void](language.types.void.html)
public [\_\_destruct](#swoole-buffer.destruct)(): [void](language.types.void.html)
public [expand](#swoole-buffer.expand)([int](#language.types.integer) $size): [int](#language.types.integer)
public [read](#swoole-buffer.read)([int](#language.types.integer) $offset, [int](#language.types.integer) $length): [string](#language.types.string)
public [recycle](#swoole-buffer.recycle)(): [void](language.types.void.html)
public [substr](#swoole-buffer.substr)([int](#language.types.integer) $offset, [int](#language.types.integer) $length = ?, [bool](#language.types.boolean) $remove = ?): [string](#language.types.string)
public [\_\_toString](#swoole-buffer.tostring)(): [string](#language.types.string)
public [write](#swoole-buffer.write)([int](#language.types.integer) $offset, [string](#language.types.string) $data): [void](language.types.void.html)

}

# Swoole\Buffer::append

(PECL swoole &gt;= 1.9.0)

Swoole\Buffer::append — Añade la string o los datos binarios al final del buffer de memoria y devuelve el nuevo tamaño de la memoria asignada.

### Descripción

public **Swoole\Buffer::append**([string](#language.types.string) $data): [int](#language.types.integer)

### Parámetros

    data


      La string o los datos binarios a añadir al final del buffer de memoria.


### Valores devueltos

El nuevo tamaño del buffer de memoria.

# Swoole\Buffer::clear

(PECL swoole &gt;= 1.9.0)

Swoole\Buffer::clear — Reinicializa el búfer de memoria.

### Descripción

public **Swoole\Buffer::clear**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

# Swoole\Buffer::\_\_construct

(PECL swoole &gt;= 1.9.0)

Swoole\Buffer::\_\_construct — Asignación de bloques de memoria de tamaño fijo.

### Descripción

public **Swoole\Buffer::\_\_construct**([int](#language.types.integer) $size = ?)

### Parámetros

    size


      El tamaño de la memoria a asignar.


# Swoole\Buffer::\_\_destruct

(PECL swoole &gt;= 1.9.0)

Swoole\Buffer::\_\_destruct — Destruye el buffer de memoria Swoole.

### Descripción

public **Swoole\Buffer::\_\_destruct**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

# Swoole\Buffer::expand

(PECL swoole &gt;= 1.9.0)

Swoole\Buffer::expand — Amplía el tamaño del búfer de memoria.

### Descripción

public **Swoole\Buffer::expand**([int](#language.types.integer) $size): [int](#language.types.integer)

### Parámetros

    size


      El nuevo tamaño del búfer de memoria.


### Valores devueltos

El nuevo tamaño del búfer de memoria.

# Swoole\Buffer::read

(PECL swoole &gt;= 1.9.0)

Swoole\Buffer::read — Lee los datos del búfer de memoria en función del desplazamiento y la longitud.

### Descripción

public **Swoole\Buffer::read**([int](#language.types.integer) $offset, [int](#language.types.integer) $length): [string](#language.types.string)

### Parámetros

    offset


      El desplazamiento.






    length


      La longitud.


### Valores devueltos

Los datos leídos del búfer de memoria.

# Swoole\Buffer::recycle

(PECL swoole &gt;= 1.9.0)

Swoole\Buffer::recycle — Libera la memoria al SO que no es utilizada por el buffer de memoria.

### Descripción

public **Swoole\Buffer::recycle**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

# Swoole\Buffer::substr

(PECL swoole &gt;= 1.9.0)

Swoole\Buffer::substr — Lee los datos del búfer de memoria en función del desplazamiento y la longitud. O elimina los datos del búfer de memoria.

### Descripción

public **Swoole\Buffer::substr**([int](#language.types.integer) $offset, [int](#language.types.integer) $length = ?, [bool](#language.types.boolean) $remove = ?): [string](#language.types.string)

    Si $remove está definido como true y $offset está definido como 0, los datos serán eliminados del búfer.
    La memoria para almacenar los datos será liberada cuando el objeto búfer sea destruido.

### Parámetros

    offset


      El desplazamiento.






    length


      La longitud.






    remove


      Si los datos deben ser eliminados del búfer.


### Valores devueltos

Los datos leídos del búfer de memoria.

# Swoole\Buffer::\_\_toString

(PECL swoole &gt;= 1.9.0)

Swoole\Buffer::\_\_toString — Devuelve el valor de la string del búfer de memoria.

### Descripción

public **Swoole\Buffer::\_\_toString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor de la string del búfer de memoria.

# Swoole\Buffer::write

(PECL swoole &gt;= 1.9.0)

Swoole\Buffer::write — Escribe datos en el buffer de memoria. La memoria asignada para el buffer no será modificada.

### Descripción

public **Swoole\Buffer::write**([int](#language.types.integer) $offset, [string](#language.types.string) $data): [void](language.types.void.html)

### Parámetros

    offset


      El desplazamiento.






    data


      Los datos a escribir en el buffer de memoria.


### Valores devueltos

## Tabla de contenidos

- [Swoole\Buffer::append](#swoole-buffer.append) — Añade la string o los datos binarios al final del buffer de memoria y devuelve el nuevo tamaño de la memoria asignada.
- [Swoole\Buffer::clear](#swoole-buffer.clear) — Reinicializa el búfer de memoria.
- [Swoole\Buffer::\_\_construct](#swoole-buffer.construct) — Asignación de bloques de memoria de tamaño fijo.
- [Swoole\Buffer::\_\_destruct](#swoole-buffer.destruct) — Destruye el buffer de memoria Swoole.
- [Swoole\Buffer::expand](#swoole-buffer.expand) — Amplía el tamaño del búfer de memoria.
- [Swoole\Buffer::read](#swoole-buffer.read) — Lee los datos del búfer de memoria en función del desplazamiento y la longitud.
- [Swoole\Buffer::recycle](#swoole-buffer.recycle) — Libera la memoria al SO que no es utilizada por el buffer de memoria.
- [Swoole\Buffer::substr](#swoole-buffer.substr) — Lee los datos del búfer de memoria en función del desplazamiento y la longitud. O elimina los datos del búfer de memoria.
- [Swoole\Buffer::\_\_toString](#swoole-buffer.tostring) — Devuelve el valor de la string del búfer de memoria.
- [Swoole\Buffer::write](#swoole-buffer.write) — Escribe datos en el buffer de memoria. La memoria asignada para el buffer no será modificada.

# La clase Swoole\Channel

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Channel**

     {


    /* Métodos */

public [\_\_destruct](#swoole-channel.destruct)(): [void](language.types.void.html)
public [pop](#swoole-channel.pop)(): [mixed](#language.types.mixed)
public [push](#swoole-channel.push)([string](#language.types.string) $data): [bool](#language.types.boolean)
public [stats](#swoole-channel.stats)(): [array](#language.types.array)

}

# Swoole\Channel::\_\_construct

(PECL swoole &gt;= 1.9.0)

Swoole\Channel::\_\_construct — Construye un canal Swoole

### Descripción

public **Swoole\Channel::\_\_construct**([string](#language.types.string) $size)

    Un canal Swoole es una estructura de datos en memoria que funciona como Chan en Golang, implementada sobre la base de
    memoria compartida y cerrojos mutex. Puede ser utilizado como una cola de mensajes de alto rendimiento en memoria.
    Construye un canal swoole con un tamaño fijo. El tamaño mínimo de un canal swoole es de 64 Ko.
    Se lanzarán excepciones si no hay suficiente memoria.

### Parámetros

    size


      El tamaño del canal Swoole.


# Swoole\Channel::\_\_destruct

(PECL swoole &gt;= 1.9.0)

Swoole\Channel::\_\_destruct — Destruye un canal Swoole.

### Descripción

public **Swoole\Channel::\_\_destruct**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

# Swoole\Channel::pop

(PECL swoole &gt;= 1.9.0)

Swoole\Channel::pop — Lee y extrae datos del canal swoole.

### Descripción

public **Swoole\Channel::pop**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Si el canal está vacío, la función devolverá false, o devolverá los datos deserializados.

# Swoole\Channel::push

(PECL swoole &gt;= 1.9.0)

Swoole\Channel::push — Escribe y empuja datos en el canal Swoole.

### Descripción

public **Swoole\Channel::push**([string](#language.types.string) $data): [bool](#language.types.boolean)

    Los datos pueden ser cualquier variable PHP no vacía, la variable será serializada si no es de tipo string.




    Si el tamaño de los datos es superior a 8 Ko, el canal swoole utilizará un almacenamiento de ficheros temporales.




    La función devolverá true si la operación de escritura es exitosa, o devolverá false si no hay suficiente espacio.

### Parámetros

    data


      Los datos a empujar en el canal Swoole.


### Valores devueltos

Si los datos son empujados en el canal Swoole.

# Swoole\Channel::stats

(PECL swoole &gt;= 1.9.0)

Swoole\Channel::stats — Devuelve las estadísticas del canal Swoole.

### Descripción

public **Swoole\Channel::stats**(): [array](#language.types.array)

    Devuelve el número de elementos en espera y el tamaño total de la memoria utilizada por la cola.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Las estadísticas del canal Swoole.

## Tabla de contenidos

- [Swoole\Channel::\_\_construct](#swoole-channel.construct) — Construye un canal Swoole
- [Swoole\Channel::\_\_destruct](#swoole-channel.destruct) — Destruye un canal Swoole.
- [Swoole\Channel::pop](#swoole-channel.pop) — Lee y extrae datos del canal swoole.
- [Swoole\Channel::push](#swoole-channel.push) — Escribe y empuja datos en el canal Swoole.
- [Swoole\Channel::stats](#swoole-channel.stats) — Devuelve las estadísticas del canal Swoole.

# La clase Swoole\Client

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Client**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [MSG_OOB](#swoole-client.constants.msg-oob) = 1;

    const
     [int](#language.types.integer)
      [MSG_PEEK](#swoole-client.constants.msg-peek) = 2;

    const
     [int](#language.types.integer)
      [MSG_DONTWAIT](#swoole-client.constants.msg-dontwait) = 128;

    const
     [int](#language.types.integer)
      [MSG_WAITALL](#swoole-client.constants.msg-waitall) = 64;


    /* Propiedades */
    public
      [$errCode](#swoole-client.props.errcode);

    public
      [$sock](#swoole-client.props.sock);

    public
      [$reuse](#swoole-client.props.reuse);

    public
      [$reuseCount](#swoole-client.props.reusecount);


    /* Métodos */

public [close](#swoole-client.close)([bool](#language.types.boolean) $force = ?): [bool](#language.types.boolean)
public [connect](#swoole-client.connect)(
    [string](#language.types.string) $host,
    [int](#language.types.integer) $port = ?,
    [int](#language.types.integer) $timeout = ?,
    [int](#language.types.integer) $flag = ?
): [bool](#language.types.boolean)
public [\_\_destruct](#swoole-client.destruct)(): [void](language.types.void.html)
public [getpeername](#swoole-client.getpeername)(): [array](#language.types.array)
public [getsockname](#swoole-client.getsockname)(): [array](#language.types.array)
public [isConnected](#swoole-client.isconnected)(): [bool](#language.types.boolean)
public [on](#swoole-client.on)([string](#language.types.string) $event, [callable](#language.types.callable) $callback): [void](language.types.void.html)
public [pause](#swoole-client.pause)(): [void](language.types.void.html)
public [pipe](#swoole-client.pipe)([string](#language.types.string) $socket): [void](language.types.void.html)
public [recv](#swoole-client.recv)([string](#language.types.string) $size = ?, [string](#language.types.string) $flag = ?): [void](language.types.void.html)
public [resume](#swoole-client.resume)(): [void](language.types.void.html)
public [send](#swoole-client.send)([string](#language.types.string) $data, [string](#language.types.string) $flag = ?): [int](#language.types.integer)
public [sendfile](#swoole-client.sendfile)([string](#language.types.string) $filename, [int](#language.types.integer) $offset = ?): [bool](#language.types.boolean)
public [sendto](#swoole-client.sendto)([string](#language.types.string) $ip, [int](#language.types.integer) $port, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [set](#swoole-client.set)([array](#language.types.array) $settings): [void](language.types.void.html)
public [sleep](#swoole-client.sleep)(): [void](language.types.void.html)
public [wakeup](#swoole-client.wakeup)(): [void](language.types.void.html)

}

## Propiedades

     errCode







     sock







     reuse







     reuseCount






## Constantes predefinidas

     **[Swoole\Client::MSG_OOB](#swoole-client.constants.msg-oob)**








     **[Swoole\Client::MSG_PEEK](#swoole-client.constants.msg-peek)**








     **[Swoole\Client::MSG_DONTWAIT](#swoole-client.constants.msg-dontwait)**








     **[Swoole\Client::MSG_WAITALL](#swoole-client.constants.msg-waitall)**






# Swoole\Client::close

(PECL swoole &gt;= 1.9.0)

Swoole\Client::close — Cierra la conexión establecida.

### Descripción

public **Swoole\Client::close**([bool](#language.types.boolean) $force = ?): [bool](#language.types.boolean)

### Parámetros

    force


      Forzar o no el cierre de la conexión.


### Valores devueltos

Si la conexión es cerrada.

# Swoole\Client::connect

(PECL swoole &gt;= 1.9.0)

Swoole\Client::connect — Conecta al puerto TCP o UDP remoto.

### Descripción

public **Swoole\Client::connect**(
    [string](#language.types.string) $host,
    [int](#language.types.integer) $port = ?,
    [int](#language.types.integer) $timeout = ?,
    [int](#language.types.integer) $flag = ?
): [bool](#language.types.boolean)

### Parámetros

    host


      El nombre de host de la dirección remota.






    port


      El número de puerto de la dirección remota.






    timeout


      El tiempo de espera (en segundos) de conexión/envío/recepción, el valor por omisión es de 0,1 s.






    flag


      Si el tipo de cliente es UDP, el $flag indica si se debe activar la configuración udp_connect.
      Si la configuración udp_connect está activada, el cliente solo recibirá los datos de la ip:puerto especificada.
      Si el tipo de cliente es TCP y el $flag está definido en 1, se debe utilizar swoole_client_select para verificar el estado de la conexión antes de enviar/recibir.


### Valores devueltos

Si la conexión es establecida.

# Swoole\Client::\_\_construct

(PECL swoole &gt;= 1.9.0)

Swoole\Client::\_\_construct — Crea un cliente TCP/UDP síncrono o asíncrono Swoole, con o sin SSL.

### Descripción

public **Swoole\Client::\_\_construct**([int](#language.types.integer) $sock_type, [int](#language.types.integer) $is_async = ?)

### Parámetros

    sock_type


      El tipo de socket: SWOOLE_TCP, SWOOLE_UDP, SWOOLE_ASYNC, SWOOLE_SSL, SWOOLE_KEEP.






    is_async


      Cliente síncrono o asíncrono.


# Swoole\Client::\_\_destruct

(PECL swoole &gt;= 1.9.0)

Swoole\Client::\_\_destruct — Destruye el cliente Swoole.

### Descripción

public **Swoole\Client::\_\_destruct**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

# Swoole\Client::getpeername

(PECL swoole &gt;= 1.9.0)

Swoole\Client::getpeername — Devuelve el nombre del socket remoto de la conexión.

### Descripción

public **Swoole\Client::getpeername**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El host y el puerto del socket remoto.

# Swoole\Client::getsockname

(PECL swoole &gt;= 1.9.0)

Swoole\Client::getsockname — Devuelve el nombre del socket local de la conexión.

### Descripción

public **Swoole\Client::getsockname**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El host y el puerto del socket local.

# Swoole\Client::isConnected

(PECL swoole &gt;= 1.9.0)

Swoole\Client::isConnected — Verifica si la conexión está establecida.

### Descripción

public **Swoole\Client::isConnected**(): [bool](#language.types.boolean)

    Este método devuelve el estado de la conexión de la capa de aplicación.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Si la conexión está establecida.

# Swoole\Client::on

(PECL swoole &gt;= 1.9.0)

Swoole\Client::on — Añade funciones de retrollamada desencadenadas por eventos.

### Descripción

public **Swoole\Client::on**([string](#language.types.string) $event, [callable](#language.types.callable) $callback): [void](language.types.void.html)

### Parámetros

    event









    callback





# Swoole\Client::pause

(PECL swoole &gt;= 1.9.0)

Swoole\Client::pause — Pone en pausa la recepción de datos.

### Descripción

public **Swoole\Client::pause**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

# Swoole\Client::pipe

(PECL swoole &gt;= 1.9.0)

Swoole\Client::pipe — Redirige los datos hacia otro descriptor de fichero.

### Descripción

public **Swoole\Client::pipe**([string](#language.types.string) $socket): [void](language.types.void.html)

### Parámetros

    socket





# Swoole\Client::recv

(PECL swoole &gt;= 1.9.0)

Swoole\Client::recv — Recibe datos del socket remoto.

### Descripción

public **Swoole\Client::recv**([string](#language.types.string) $size = ?, [string](#language.types.string) $flag = ?): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    size









    flag





### Valores devueltos

# Swoole\Client::resume

(PECL swoole &gt;= 1.9.0)

Swoole\Client::resume — Reanuda la recepción de datos.

### Descripción

public **Swoole\Client::resume**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

# Swoole\Client::send

(PECL swoole &gt;= 1.9.0)

Swoole\Client::send — Envía datos al socket TCP remoto.

### Descripción

public **Swoole\Client::send**([string](#language.types.string) $data, [string](#language.types.string) $flag = ?): [int](#language.types.integer)

### Parámetros

    data


      Los datos a enviar que pueden ser una string o binarios.






    flag





### Valores devueltos

Si el cliente envía datos con éxito, devuelve la longitud de los datos enviados.
O devuelve false y define $swoole_client-&gt;errCode. Para el cliente síncrono,
no hay límite para los datos a enviar. Para el cliente asíncrono, el límite
para los datos a enviar es socket_buffer_size.

# Swoole\Client::sendfile

(PECL swoole &gt;= 1.9.0)

Swoole\Client::sendfile — Envía un fichero al socket TCP remoto.

### Descripción

public **Swoole\Client::sendfile**([string](#language.types.string) $filename, [int](#language.types.integer) $offset = ?): [bool](#language.types.boolean)

    Esto es una envoltura de la llamada al sistema sendfile de Linux.

### Parámetros

    filename


      La ruta del fichero a enviar.






    offset


      El desplazamiento del fichero a enviar.


### Valores devueltos

# Swoole\Client::sendto

(PECL swoole &gt;= 1.9.0)

Swoole\Client::sendto — Envía datos a la dirección UDP remota.

### Descripción

public **Swoole\Client::sendto**([string](#language.types.string) $ip, [int](#language.types.integer) $port, [string](#language.types.string) $data): [bool](#language.types.boolean)

    El cliente swoole debe ser de tipo SWOOLE_SOCK_UDP o SWOOLE_SOCK_UDP6.

### Parámetros

    ip


      La dirección IP del host remoto, IPv4 o IPv6.






    port


      El número de puerto del host remoto.






    data


      Los datos a enviar que deben ser inferiores a 64K.


### Valores devueltos

# Swoole\Client::set

(PECL swoole &gt;= 1.9.0)

Swoole\Client::set — Define los parámetros del cliente Swoole antes de que la conexión sea establecida.

### Descripción

public **Swoole\Client::set**([array](#language.types.array) $settings): [void](language.types.void.html)

### Parámetros

    settings





### Valores devueltos

# Swoole\Client::sleep

(PECL swoole &gt;= 1.9.0)

Swoole\Client::sleep — Elimina el cliente TCP del bucle de eventos del sistema.

### Descripción

public **Swoole\Client::sleep**(): [void](language.types.void.html)

    Elimina el cliente TCP del bucle de eventos del sistema.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Client::wakeup

(PECL swoole &gt;= 1.9.0)

Swoole\Client::wakeup — Añade el cliente TCP al ciclo de eventos del sistema.

### Descripción

public **Swoole\Client::wakeup**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [Swoole\Client::close](#swoole-client.close) — Cierra la conexión establecida.
- [Swoole\Client::connect](#swoole-client.connect) — Conecta al puerto TCP o UDP remoto.
- [Swoole\Client::\_\_construct](#swoole-client.construct) — Crea un cliente TCP/UDP síncrono o asíncrono Swoole, con o sin SSL.
- [Swoole\Client::\_\_destruct](#swoole-client.destruct) — Destruye el cliente Swoole.
- [Swoole\Client::getpeername](#swoole-client.getpeername) — Devuelve el nombre del socket remoto de la conexión.
- [Swoole\Client::getsockname](#swoole-client.getsockname) — Devuelve el nombre del socket local de la conexión.
- [Swoole\Client::isConnected](#swoole-client.isconnected) — Verifica si la conexión está establecida.
- [Swoole\Client::on](#swoole-client.on) — Añade funciones de retrollamada desencadenadas por eventos.
- [Swoole\Client::pause](#swoole-client.pause) — Pone en pausa la recepción de datos.
- [Swoole\Client::pipe](#swoole-client.pipe) — Redirige los datos hacia otro descriptor de fichero.
- [Swoole\Client::recv](#swoole-client.recv) — Recibe datos del socket remoto.
- [Swoole\Client::resume](#swoole-client.resume) — Reanuda la recepción de datos.
- [Swoole\Client::send](#swoole-client.send) — Envía datos al socket TCP remoto.
- [Swoole\Client::sendfile](#swoole-client.sendfile) — Envía un fichero al socket TCP remoto.
- [Swoole\Client::sendto](#swoole-client.sendto) — Envía datos a la dirección UDP remota.
- [Swoole\Client::set](#swoole-client.set) — Define los parámetros del cliente Swoole antes de que la conexión sea establecida.
- [Swoole\Client::sleep](#swoole-client.sleep) — Elimina el cliente TCP del bucle de eventos del sistema.
- [Swoole\Client::wakeup](#swoole-client.wakeup) — Añade el cliente TCP al ciclo de eventos del sistema.

# La clase Swoole\Connection\Iterator

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Connection\Iterator**


     implements
       [Iterator](#class.iterator),  [Countable](#class.countable),  [ArrayAccess](#class.arrayaccess) {


    /* Métodos */

public [count](#swoole-connection-iterator.count)(): [int](#language.types.integer)
public [current](#swoole-connection-iterator.current)(): Connection
public [key](#swoole-connection-iterator.key)(): [int](#language.types.integer)
public [next](#swoole-connection-iterator.next)(): Connection
public [offsetExists](#swoole-connection-iterator.offsetexists)([int](#language.types.integer) $index): [bool](#language.types.boolean)
public [offsetGet](#swoole-connection-iterator.offsetget)([string](#language.types.string) $index): Connection
public [offsetSet](#swoole-connection-iterator.offsetset)([int](#language.types.integer) $offset, [mixed](#language.types.mixed) $connection): [void](language.types.void.html)
public [offsetUnset](#swoole-connection-iterator.offsetunset)([int](#language.types.integer) $offset): [void](language.types.void.html)
public [rewind](#swoole-connection-iterator.rewind)(): [void](language.types.void.html)
public [valid](#swoole-connection-iterator.valid)(): [bool](#language.types.boolean)

}

# Swoole\Connection\Iterator::count

(PECL swoole &gt;= 1.9.0)

Swoole\Connection\Iterator::count — Cuenta las conexiones.

### Descripción

public **Swoole\Connection\Iterator::count**(): [int](#language.types.integer)

    Devuelve el número de conexiones.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de conexiones.

# Swoole\Connection\Iterator::current

(PECL swoole &gt;= 1.9.0)

Swoole\Connection\Iterator::current — Devuelve la entrada de conexión actual.

### Descripción

public **Swoole\Connection\Iterator::current**(): Connection

    Devuelve la entrada de conexión actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La entrada de conexión actual.

# Swoole\Connection\Iterator::key

(PECL swoole &gt;= 1.9.0)

Swoole\Connection\Iterator::key — Devuelve la clave de la conexión actual.

### Descripción

public **Swoole\Connection\Iterator::key**(): [int](#language.types.integer)

    Esta función devuelve la clave de la conexión actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La clave de la conexión actual.

# Swoole\Connection\Iterator::next

(PECL swoole &gt;= 1.9.0)

Swoole\Connection\Iterator::next — Se desplaza hacia la siguiente conexión.

### Descripción

public **Swoole\Connection\Iterator::next**(): Connection

    El iterador se desplaza hacia la siguiente conexión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Connection\Iterator::offsetExists

(PECL swoole &gt;= 1.9.0)

Swoole\Connection\Iterator::offsetExists — Verifica si una posición existe.

### Descripción

public **Swoole\Connection\Iterator::offsetExists**([int](#language.types.integer) $index): [bool](#language.types.boolean)

    Verifica si una posición existe.

### Parámetros

    index


      La posición a verificar.


### Valores devueltos

Devuelve TRUE si la posición existe, FALSE en caso contrario.

# Swoole\Connection\Iterator::offsetGet

(PECL swoole &gt;= 1.9.0)

Swoole\Connection\Iterator::offsetGet — Posición a recuperar.

### Descripción

public **Swoole\Connection\Iterator::offsetGet**([string](#language.types.string) $index): Connection

    Devuelve la conexión en la posición especificada.

### Parámetros

    index


      La posición a recuperar.


### Valores devueltos

# Swoole\Connection\Iterator::offsetSet

(PECL swoole &gt;= 1.9.0)

Swoole\Connection\Iterator::offsetSet — Asigna una conexión a la posición especificada.

### Descripción

public **Swoole\Connection\Iterator::offsetSet**([int](#language.types.integer) $offset, [mixed](#language.types.mixed) $connection): [void](language.types.void.html)

    Asigna una conexión a la posición especificada.

### Parámetros

    offset


      La posición a la cual asignar la conexión.






    connection


      La conexión a asignar.


### Valores devueltos

# Swoole\Connection\Iterator::offsetUnset

(PECL swoole &gt;= 1.9.0)

Swoole\Connection\Iterator::offsetUnset — Elimina una posición.

### Descripción

public **Swoole\Connection\Iterator::offsetUnset**([int](#language.types.integer) $offset): [void](language.types.void.html)

    Elimina una posición.

### Parámetros

    offset


      La posición a eliminar.


### Valores devueltos

# Swoole\Connection\Iterator::rewind

(PECL swoole &gt;= 1.9.0)

Swoole\Connection\Iterator::rewind — Reinicializa el iterador.

### Descripción

public **Swoole\Connection\Iterator::rewind**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Connection\Iterator::valid

(PECL swoole &gt;= 1.9.0)

Swoole\Connection\Iterator::valid — Verifica si la posición actual es válida.

### Descripción

public **Swoole\Connection\Iterator::valid**(): [bool](#language.types.boolean)

    Verifica si la posición actual es válida.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve TRUE si la posición actual es válida, FALSE en caso contrario.

## Tabla de contenidos

- [Swoole\Connection\Iterator::count](#swoole-connection-iterator.count) — Cuenta las conexiones.
- [Swoole\Connection\Iterator::current](#swoole-connection-iterator.current) — Devuelve la entrada de conexión actual.
- [Swoole\Connection\Iterator::key](#swoole-connection-iterator.key) — Devuelve la clave de la conexión actual.
- [Swoole\Connection\Iterator::next](#swoole-connection-iterator.next) — Se desplaza hacia la siguiente conexión.
- [Swoole\Connection\Iterator::offsetExists](#swoole-connection-iterator.offsetexists) — Verifica si una posición existe.
- [Swoole\Connection\Iterator::offsetGet](#swoole-connection-iterator.offsetget) — Posición a recuperar.
- [Swoole\Connection\Iterator::offsetSet](#swoole-connection-iterator.offsetset) — Asigna una conexión a la posición especificada.
- [Swoole\Connection\Iterator::offsetUnset](#swoole-connection-iterator.offsetunset) — Elimina una posición.
- [Swoole\Connection\Iterator::rewind](#swoole-connection-iterator.rewind) — Reinicializa el iterador.
- [Swoole\Connection\Iterator::valid](#swoole-connection-iterator.valid) — Verifica si la posición actual es válida.

# La clase Swoole\Coroutine

(PECL swoole &gt;= 2.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Coroutine**

     {


    /* Métodos */

public static [call_user_func](#swoole-coroutine.call-user-func)([callable](#language.types.callable) $callback, [mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)
public static [call_user_func_array](#swoole-coroutine.call-user-func-array)([callable](#language.types.callable) $callback, [array](#language.types.array) $param_array): [mixed](#language.types.mixed)
public static [cli_wait](#swoole-coroutine.cli-wait)(): ReturnType
public static [create](#swoole-coroutine.create)(): ReturnType
public static [getuid](#swoole-coroutine.getuid)(): ReturnType
public static [resume](#swoole-coroutine.resume)(): ReturnType
public static [suspend](#swoole-coroutine.suspend)(): ReturnType

}

# Swoole\Coroutine::call_user_func

(PECL swoole &gt;= 2.0.0)

Swoole\Coroutine::call_user_func — Llama a una función de retrollamada dada por el primer argumento

### Descripción

public static **Swoole\Coroutine::call_user_func**([callable](#language.types.callable) $callback, [mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)

    Llama al callback dado por el primer argumento y pasa los argumentos restantes como argumentos.

### Parámetros

        callback


          El [callable](#language.types.callable) a llamar.






     args


       Cero o más argumentos a pasar a la función de retrollamada.





### Valores devueltos

# Swoole\Coroutine::call_user_func_array

(PECL swoole &gt;= 2.0.0)

Swoole\Coroutine::call_user_func_array — Llama a una función de retrollamada con un array de argumentos

### Descripción

public static **Swoole\Coroutine::call_user_func_array**([callable](#language.types.callable) $callback, [array](#language.types.array) $param_array): [mixed](#language.types.mixed)

    Llama a la función de retrollamada dada por el primer argumento con los argumentos en param_array.

### Parámetros

        callback


          El [callable](#language.types.callable) a llamar.






     param_array


       Cero o más argumentos en el array a pasar a la función de retrollamada.





### Valores devueltos

# Swoole\Coroutine::cli_wait

(PECL swoole &gt;= 2.0.0)

Swoole\Coroutine::cli_wait — Descripción

### Descripción

public static **Swoole\Coroutine::cli_wait**(): ReturnType

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Coroutine::create

(PECL swoole &gt;= 2.0.0)

Swoole\Coroutine::create — Descripción

### Descripción

public static **Swoole\Coroutine::create**(): ReturnType

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Coroutine::getuid

(PECL swoole &gt;= 2.0.0)

Swoole\Coroutine::getuid — Descripción

### Descripción

public static **Swoole\Coroutine::getuid**(): ReturnType

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Coroutine::resume

(PECL swoole &gt;= 2.0.0)

Swoole\Coroutine::resume — Descripción

### Descripción

public static **Swoole\Coroutine::resume**(): ReturnType

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Coroutine::suspend

(PECL swoole &gt;= 2.0.0)

Swoole\Coroutine::suspend — Descripción

### Descripción

public static **Swoole\Coroutine::suspend**(): ReturnType

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [Swoole\Coroutine::call_user_func](#swoole-coroutine.call-user-func) — Llama a una función de retrollamada dada por el primer argumento
- [Swoole\Coroutine::call_user_func_array](#swoole-coroutine.call-user-func-array) — Llama a una función de retrollamada con un array de argumentos
- [Swoole\Coroutine::cli_wait](#swoole-coroutine.cli-wait) — Descripción
- [Swoole\Coroutine::create](#swoole-coroutine.create) — Descripción
- [Swoole\Coroutine::getuid](#swoole-coroutine.getuid) — Descripción
- [Swoole\Coroutine::resume](#swoole-coroutine.resume) — Descripción
- [Swoole\Coroutine::suspend](#swoole-coroutine.suspend) — Descripción

# The Swoole\Coroutine\Lock class

(No version information available, might only be in Git)

## Introducción

    Swoole 6.0.1 introdujo un bloqueo de corrutina que admite el uso compartido entre procesos e hilos.
    Este bloqueo está diseñado con un comportamiento no bloqueante y permite una sincronización eficiente
    de corrutinas en entornos multiproceso y multihilo.




    Cuando se compila con la opción --enable-iouring y el kernel de Linux admite
    la característica io_uring futex, el bloqueo de corrutina de Swoole implementa
    la sincronización usando io_uring futex. En este caso, las corrutinas esperan
    las activaciones del bloqueo usando un mecanismo de cola eficiente, mejorando significativamente el rendimiento.




    Sin io_uring futex, el bloqueo de corrutina recurre a un mecanismo de retroceso
    exponencial, donde el tiempo de espera aumenta en 2^n milisegundos (siendo n el número de fallos)
    después de cada intento fallido de adquirir el bloqueo. Aunque este enfoque evita la espera activa,
    introduce una carga adicional de programación de CPU y latencia.




    El bloqueo de corrutina es reentrante, lo que permite a la corrutina que actualmente lo posee realizar
    múltiples operaciones de bloqueo de manera segura.

**Advertencia**

     No cree bloqueos en funciones de retrollamada como onReceive, ya que esto causará
     un crecimiento continuo de la memoria y llevará a fugas de memoria.

**Advertencia**

     El bloqueo y desbloqueo deben realizarse en la misma corrutina, de lo contrario se romperán
     las condiciones estáticas.

## Sinopsis de la Clase

    ****




      class **Swoole\Coroutine\Lock**

     {


    /* Métodos */

public [\_\_construct](#swoole-coroutine-lock.construct)(): [void](language.types.void.html)
public [lock](#swoole-coroutine-lock.lock)(): [bool](#language.types.boolean)
public [trylock](#swoole-coroutine-lock.trylock)(): [bool](#language.types.boolean)
public [unlock](#swoole-coroutine-lock.unlock)(): [bool](#language.types.boolean)

}

## Ejemplos

    **Ejemplo #1 Basic usage**

&lt;?php
use Swoole\Coroutine\Lock;
use Swoole\Coroutine\WaitGroup;
use function Swoole\Coroutine\go;
use function Swoole\Coroutine\run;

$lock = new Lock();
$waitGroup = new WaitGroup();

run(function() use ($lock, $waitGroup) {
    go(function() use ($lock, $waitGroup) {
$waitGroup-&gt;add();
$lock-&gt;lock();
sleep(1);
$lock-&gt;unlock();
$waitGroup-&gt;done();
});

    go(function() use ($lock, $waitGroup) {
        $waitGroup-&gt;add();
        $lock-&gt;lock(); // Espera a que la corrutina que lo posee lo desbloquee
        sleep(1);
        $lock-&gt;unlock();
        $waitGroup-&gt;done();
    });

    echo 'El bloqueo no bloquea el proceso';
    $waitGroup-&gt;wait();

});

# Swoole\Coroutine\Lock::\_\_construct

(No version information available, might only be in Git)

Swoole\Coroutine\Lock::\_\_construct — Construye un nuevo bloqueo de corrutina

### Descripción

public **Swoole\Coroutine\Lock::\_\_construct**(): [void](language.types.void.html)

Crea una nueva instancia de bloqueo de corrutina.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# Swoole\Coroutine\Lock::lock

(No version information available, might only be in Git)

Swoole\Coroutine\Lock::lock — Adquirir el bloqueo, bloqueando si es necesario

### Descripción

public **Swoole\Coroutine\Lock::lock**(): [bool](#language.types.boolean)

Al ejecutar la operación de bloqueo, si el bloqueo ya está siendo mantenido por otra corrutina,
la corrutina actual cederá activamente el control de la CPU y entrará en un estado suspendido.
Cuando la corrutina que mantiene el bloqueo llame a unlock(), la corrutina en espera será
despertada y tratará de adquirir el bloqueo nuevamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna true si el bloqueo fue adquirido exitosamente,
false en caso contrario.

# Swoole\Coroutine\Lock::trylock

(No version information available, might only be in Git)

Swoole\Coroutine\Lock::trylock — Intenta adquirir el bloqueo sin bloquear

### Descripción

public **Swoole\Coroutine\Lock::trylock**(): [bool](#language.types.boolean)

Al llamar a la operación de bloqueo, si el bloqueo ya está siendo mantenido por otra corrutina,
la función devolverá inmediatamente false sin suspender la corrutina actual
ni ceder el control de la CPU. Este diseño no bloqueante permite al llamador manejar
flexiblemente situaciones de contención, como reintentar, abandonar o ejecutar otra lógica.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve true si el bloqueo se adquirió con éxito,
false si el bloqueo no está disponible.

# Swoole\Coroutine\Lock::unlock

(No version information available, might only be in Git)

Swoole\Coroutine\Lock::unlock — Liberar el bloqueo

### Descripción

public **Swoole\Coroutine\Lock::unlock**(): [bool](#language.types.boolean)

### Comportamiento de desbloqueo

- _Con io_uring futex:_ el sistema despertará precisamente una corrutina en la cola de espera.

- _Sin io_uring futex:_ las corrutinas en espera deben esperar a que termine su tiempo de retroceso
  y competir para readquirir el bloqueo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve true si el bloqueo se liberó correctamente,
false en caso contrario.

## Tabla de contenidos

- [Swoole\Coroutine\Lock::\_\_construct](#swoole-coroutine-lock.construct) — Construye un nuevo bloqueo de corrutina
- [Swoole\Coroutine\Lock::lock](#swoole-coroutine-lock.lock) — Adquirir el bloqueo, bloqueando si es necesario
- [Swoole\Coroutine\Lock::trylock](#swoole-coroutine-lock.trylock) — Intenta adquirir el bloqueo sin bloquear
- [Swoole\Coroutine\Lock::unlock](#swoole-coroutine-lock.unlock) — Liberar el bloqueo

# La clase Swoole\Event

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Event**

     {


    /* Métodos */

public static [add](#swoole-event.add)(
    [int](#language.types.integer) $fd,
    [callable](#language.types.callable) $read_callback,
    [callable](#language.types.callable) $write_callback = ?,
    [string](#language.types.string) $events = ?
): [bool](#language.types.boolean)
public static [defer](#swoole-event.defer)([mixed](#language.types.mixed) $callback): [void](language.types.void.html)
public static [del](#swoole-event.del)([string](#language.types.string) $fd): [bool](#language.types.boolean)
public static [exit](#swoole-event.exit)(): [void](language.types.void.html)
public static [set](#swoole-event.set)(
    [int](#language.types.integer) $fd,
    [string](#language.types.string) $read_callback = ?,
    [string](#language.types.string) $write_callback = ?,
    [string](#language.types.string) $events = ?
): [bool](#language.types.boolean)
public static [wait](#swoole-event.wait)(): [void](language.types.void.html)
public static [write](#swoole-event.write)([string](#language.types.string) $fd, [string](#language.types.string) $data): [void](language.types.void.html)

}

# Swoole\Event::add

(PECL swoole &gt;= 1.9.0)

Swoole\Event::add — Añade una nueva función de retrollamada de un socket en la ciclo de eventos.

### Descripción

public static **Swoole\Event::add**(
    [int](#language.types.integer) $fd,
    [callable](#language.types.callable) $read_callback,
    [callable](#language.types.callable) $write_callback = ?,
    [string](#language.types.string) $events = ?
): [bool](#language.types.boolean)

### Parámetros

    fd









    read_callback









    write_callback









    events





### Valores devueltos

# Swoole\Event::defer

(PECL swoole &gt;= 1.9.0)

Swoole\Event::defer — Añade una retrollamada a la próxima iteración del bucle de eventos.

### Descripción

public static **Swoole\Event::defer**([mixed](#language.types.mixed) $callback): [void](language.types.void.html)

### Parámetros

    callback





### Valores devueltos

# Swoole\Event::del

(PECL swoole &gt;= 1.9.0)

Swoole\Event::del — Elimina todas las funciones de retrollamada de eventos de un socket.

### Descripción

public static **Swoole\Event::del**([string](#language.types.string) $fd): [bool](#language.types.boolean)

### Parámetros

    fd





### Valores devueltos

# Swoole\Event::exit

(PECL swoole &gt;= 1.9.0)

Swoole\Event::exit — Sale del bucle de eventos, disponible únicamente en el lado-cliente.

### Descripción

public static **Swoole\Event::exit**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Event::set

(PECL swoole &gt;= 1.9.0)

Swoole\Event::set — Actualiza las funciones de retrollamada de eventos de un socket.

### Descripción

public static **Swoole\Event::set**(
    [int](#language.types.integer) $fd,
    [string](#language.types.string) $read_callback = ?,
    [string](#language.types.string) $write_callback = ?,
    [string](#language.types.string) $events = ?
): [bool](#language.types.boolean)

### Parámetros

    fd









    read_callback









    write_callback









    events





### Valores devueltos

# Swoole\Event::wait

(PECL swoole &gt;= 1.9.0)

Swoole\Event::wait — Descripción

### Descripción

public static **Swoole\Event::wait**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Event::write

(PECL swoole &gt;= 1.9.0)

Swoole\Event::write — Escribe datos en el socket.

### Descripción

public static **Swoole\Event::write**([string](#language.types.string) $fd, [string](#language.types.string) $data): [void](language.types.void.html)

### Parámetros

    fd









    data





### Valores devueltos

## Tabla de contenidos

- [Swoole\Event::add](#swoole-event.add) — Añade una nueva función de retrollamada de un socket en la ciclo de eventos.
- [Swoole\Event::defer](#swoole-event.defer) — Añade una retrollamada a la próxima iteración del bucle de eventos.
- [Swoole\Event::del](#swoole-event.del) — Elimina todas las funciones de retrollamada de eventos de un socket.
- [Swoole\Event::exit](#swoole-event.exit) — Sale del bucle de eventos, disponible únicamente en el lado-cliente.
- [Swoole\Event::set](#swoole-event.set) — Actualiza las funciones de retrollamada de eventos de un socket.
- [Swoole\Event::wait](#swoole-event.wait) — Descripción
- [Swoole\Event::write](#swoole-event.write) — Escribe datos en el socket.

# La clase Swoole\Exception

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Exception**



      extends
       [Exception](#class.exception)


     implements
       [Throwable](#class.throwable) {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#exception.props.message) = "";

private
[string](#language.types.string)
[$string](#exception.props.string) = "";
protected
[int](#language.types.integer)
[$code](#exception.props.code);
protected
[string](#language.types.string)
[$file](#exception.props.file) = "";
protected
[int](#language.types.integer)
[$line](#exception.props.line);
private
[array](#language.types.array)
[$trace](#exception.props.trace) = [];
private
?[Throwable](#class.throwable)
[$previous](#exception.props.previous) = null;

}

# La clase Swoole\Http\Client

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Http\Client**

     {

    /* Propiedades */

     public
      [$errCode](#swoole-http-client.props.errcode);

    public
      [$sock](#swoole-http-client.props.sock);


    /* Métodos */

public [addFile](#swoole-http-client.addfile)(
    [string](#language.types.string) $path,
    [string](#language.types.string) $name,
    [string](#language.types.string) $type = ?,
    [string](#language.types.string) $filename = ?,
    [string](#language.types.string) $offset = ?
): [void](language.types.void.html)
public [close](#swoole-http-client.close)(): [void](language.types.void.html)
public [\_\_destruct](#swoole-http-client.destruct)(): [void](language.types.void.html)
public [download](#swoole-http-client.download)(
    [string](#language.types.string) $path,
    [string](#language.types.string) $file,
    [callable](#language.types.callable) $callback,
    [int](#language.types.integer) $offset = ?
): [void](language.types.void.html)
public [execute](#swoole-http-client.execute)([string](#language.types.string) $path, [string](#language.types.string) $callback): [void](language.types.void.html)
public [get](#swoole-http-client.get)([string](#language.types.string) $path, [callable](#language.types.callable) $callback): [void](language.types.void.html)
public [isConnected](#swoole-http-client.isconnected)(): [bool](#language.types.boolean)
public [on](#swoole-http-client.on)([string](#language.types.string) $event_name, [callable](#language.types.callable) $callback): [void](language.types.void.html)
public [post](#swoole-http-client.post)([string](#language.types.string) $path, [string](#language.types.string) $data, [callable](#language.types.callable) $callback): [void](language.types.void.html)
public [push](#swoole-http-client.push)([string](#language.types.string) $data, [string](#language.types.string) $opcode = ?, [string](#language.types.string) $finish = ?): [void](language.types.void.html)
public [set](#swoole-http-client.set)([array](#language.types.array) $settings): [void](language.types.void.html)
public [setCookies](#swoole-http-client.setcookies)([array](#language.types.array) $cookies): [void](language.types.void.html)
public [setData](#swoole-http-client.setdata)([string](#language.types.string) $data): ReturnType
public [setHeaders](#swoole-http-client.setheaders)([array](#language.types.array) $headers): [void](language.types.void.html)
public [setMethod](#swoole-http-client.setmethod)([string](#language.types.string) $method): [void](language.types.void.html)
public [upgrade](#swoole-http-client.upgrade)([string](#language.types.string) $path, [string](#language.types.string) $callback): [void](language.types.void.html)

}

## Propiedades

     errCode







     sock






# Swoole\Http\Client::addFile

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::addFile — Añade un fichero al formulario de publicación.

### Descripción

public **Swoole\Http\Client::addFile**(
    [string](#language.types.string) $path,
    [string](#language.types.string) $name,
    [string](#language.types.string) $type = ?,
    [string](#language.types.string) $filename = ?,
    [string](#language.types.string) $offset = ?
): [void](language.types.void.html)

### Parámetros

    path









    name









    type









    filename









    offset





### Valores devueltos

# Swoole\Http\Client::close

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::close — Cierra la conexión http.

### Descripción

public **Swoole\Http\Client::close**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Http\Client::\_\_construct

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::\_\_construct — Construye el cliente HTTP asíncrono.

### Descripción

public **Swoole\Http\Client::\_\_construct**([string](#language.types.string) $host, [string](#language.types.string) $port = ?, [bool](#language.types.boolean) $ssl = ?)

### Parámetros

    host


      El nombre de host del host remoto.






    port


      El número de puerto del host remoto.






    ssl


      Activar o no SSL.


# Swoole\Http\Client::\_\_destruct

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::\_\_destruct — Destruye el cliente HTTP.

### Descripción

public **Swoole\Http\Client::\_\_destruct**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Http\Client::download

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::download — Descarga un fichero desde el servidor remoto.

### Descripción

public **Swoole\Http\Client::download**(
    [string](#language.types.string) $path,
    [string](#language.types.string) $file,
    [callable](#language.types.callable) $callback,
    [int](#language.types.integer) $offset = ?
): [void](language.types.void.html)

### Parámetros

    path









    file









    callback









    offset





### Valores devueltos

# Swoole\Http\Client::execute

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::execute — Envía la petición HTTP después de haber definido los parámetros.

### Descripción

public **Swoole\Http\Client::execute**([string](#language.types.string) $path, [string](#language.types.string) $callback): [void](language.types.void.html)

### Parámetros

    path









    callback





### Valores devueltos

# Swoole\Http\Client::get

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::get — Envía una petición HTTP GET al servidor remoto.

### Descripción

public **Swoole\Http\Client::get**([string](#language.types.string) $path, [callable](#language.types.callable) $callback): [void](language.types.void.html)

### Parámetros

    path









    callback





### Valores devueltos

# Swoole\Http\Client::isConnected

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::isConnected — Verifica si la conexión HTTP está establecida.

### Descripción

public **Swoole\Http\Client::isConnected**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Http\Client::on

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::on — Registra una retrollamada por nombre de evento.

### Descripción

public **Swoole\Http\Client::on**([string](#language.types.string) $event_name, [callable](#language.types.callable) $callback): [void](language.types.void.html)

### Parámetros

    event_name









    callback





### Valores devueltos

# Swoole\Http\Client::post

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::post — Envía una petición HTTP POST al servidor remoto.

### Descripción

public **Swoole\Http\Client::post**([string](#language.types.string) $path, [string](#language.types.string) $data, [callable](#language.types.callable) $callback): [void](language.types.void.html)

### Parámetros

    path









    data









    callback





### Valores devueltos

# Swoole\Http\Client::push

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::push — Añade datos al cliente websocket.

### Descripción

public **Swoole\Http\Client::push**([string](#language.types.string) $data, [string](#language.types.string) $opcode = ?, [string](#language.types.string) $finish = ?): [void](language.types.void.html)

### Parámetros

    data









    opcode









    finish





### Valores devueltos

# Swoole\Http\Client::set

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::set — Actualiza los parámetros del cliente HTTP.

### Descripción

public **Swoole\Http\Client::set**([array](#language.types.array) $settings): [void](language.types.void.html)

### Parámetros

    settings





### Valores devueltos

# Swoole\Http\Client::setCookies

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::setCookies — Define las cookies de la petición HTTP.

### Descripción

public **Swoole\Http\Client::setCookies**([array](#language.types.array) $cookies): [void](language.types.void.html)

### Parámetros

    cookies





### Valores devueltos

# Swoole\Http\Client::setData

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::setData — Define los datos del cuerpo de la petición HTTP.

### Descripción

public **Swoole\Http\Client::setData**([string](#language.types.string) $data): ReturnType

    El método HTTP será modificado para ser POST.

### Parámetros

    data





### Valores devueltos

# Swoole\Http\Client::setHeaders

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::setHeaders — Define las cabeceras de la petición HTTP.

### Descripción

public **Swoole\Http\Client::setHeaders**([array](#language.types.array) $headers): [void](language.types.void.html)

### Parámetros

    headers





### Valores devueltos

# Swoole\Http\Client::setMethod

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::setMethod — Define el método de petición HTTP.

### Descripción

public **Swoole\Http\Client::setMethod**([string](#language.types.string) $method): [void](language.types.void.html)

### Parámetros

    method





### Valores devueltos

# Swoole\Http\Client::upgrade

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Client::upgrade — Actualiza al protocolo websocket.

### Descripción

public **Swoole\Http\Client::upgrade**([string](#language.types.string) $path, [string](#language.types.string) $callback): [void](language.types.void.html)

### Parámetros

    path









    callback





### Valores devueltos

## Tabla de contenidos

- [Swoole\Http\Client::addFile](#swoole-http-client.addfile) — Añade un fichero al formulario de publicación.
- [Swoole\Http\Client::close](#swoole-http-client.close) — Cierra la conexión http.
- [Swoole\Http\Client::\_\_construct](#swoole-http-client.construct) — Construye el cliente HTTP asíncrono.
- [Swoole\Http\Client::\_\_destruct](#swoole-http-client.destruct) — Destruye el cliente HTTP.
- [Swoole\Http\Client::download](#swoole-http-client.download) — Descarga un fichero desde el servidor remoto.
- [Swoole\Http\Client::execute](#swoole-http-client.execute) — Envía la petición HTTP después de haber definido los parámetros.
- [Swoole\Http\Client::get](#swoole-http-client.get) — Envía una petición HTTP GET al servidor remoto.
- [Swoole\Http\Client::isConnected](#swoole-http-client.isconnected) — Verifica si la conexión HTTP está establecida.
- [Swoole\Http\Client::on](#swoole-http-client.on) — Registra una retrollamada por nombre de evento.
- [Swoole\Http\Client::post](#swoole-http-client.post) — Envía una petición HTTP POST al servidor remoto.
- [Swoole\Http\Client::push](#swoole-http-client.push) — Añade datos al cliente websocket.
- [Swoole\Http\Client::set](#swoole-http-client.set) — Actualiza los parámetros del cliente HTTP.
- [Swoole\Http\Client::setCookies](#swoole-http-client.setcookies) — Define las cookies de la petición HTTP.
- [Swoole\Http\Client::setData](#swoole-http-client.setdata) — Define los datos del cuerpo de la petición HTTP.
- [Swoole\Http\Client::setHeaders](#swoole-http-client.setheaders) — Define las cabeceras de la petición HTTP.
- [Swoole\Http\Client::setMethod](#swoole-http-client.setmethod) — Define el método de petición HTTP.
- [Swoole\Http\Client::upgrade](#swoole-http-client.upgrade) — Actualiza al protocolo websocket.

# La clase Swoole\Http\Request

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Http\Request**

     {


    /* Métodos */

public [\_\_destruct](#swoole-http-request.destruct)(): [void](language.types.void.html)
public [rawcontent](#swoole-http-request.rawcontent)(): [string](#language.types.string)

}

# Swoole\Http\Request::\_\_destruct

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Request::\_\_destruct — Destruye la petición HTTP.

### Descripción

public **Swoole\Http\Request::\_\_destruct**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Http\Request::rawcontent

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Request::rawcontent — Devuelve el cuerpo bruto de la petición HTTP.

### Descripción

public **Swoole\Http\Request::rawcontent**(): [string](#language.types.string)

    Este método se utiliza para obtener los datos POST que no están en la forma de `application/x-www-form-urlencoded`.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [Swoole\Http\Request::\_\_destruct](#swoole-http-request.destruct) — Destruye la petición HTTP.
- [Swoole\Http\Request::rawcontent](#swoole-http-request.rawcontent) — Devuelve el cuerpo bruto de la petición HTTP.

# La clase Swoole\Http\Response

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Http\Response**

     {


    /* Métodos */

public [cookie](#swoole-http-response.cookie)(
    [string](#language.types.string) $name,
    [string](#language.types.string) $value = ?,
    [string](#language.types.string) $expires = ?,
    [string](#language.types.string) $path = ?,
    [string](#language.types.string) $domain = ?,
    [string](#language.types.string) $secure = ?,
    [string](#language.types.string) $httponly = ?
): [string](#language.types.string)
public [\_\_destruct](#swoole-http-response.destruct)(): [void](language.types.void.html)
public [end](#swoole-http-response.end)([string](#language.types.string) $content = ?): [void](language.types.void.html)
public [gzip](#swoole-http-response.gzip)([string](#language.types.string) $compress_level = ?): ReturnType
public [header](#swoole-http-response.header)([string](#language.types.string) $key, [string](#language.types.string) $value, [string](#language.types.string) $ucwords = ?): [void](language.types.void.html)
public [initHeader](#swoole-http-response.initheader)(): ReturnType
public [rawcookie](#swoole-http-response.rawcookie)(
    [string](#language.types.string) $name,
    [string](#language.types.string) $value = ?,
    [string](#language.types.string) $expires = ?,
    [string](#language.types.string) $path = ?,
    [string](#language.types.string) $domain = ?,
    [string](#language.types.string) $secure = ?,
    [string](#language.types.string) $httponly = ?
): ReturnType
public [sendfile](#swoole-http-response.sendfile)([string](#language.types.string) $filename, [int](#language.types.integer) $offset = ?): ReturnType
public [status](#swoole-http-response.status)([string](#language.types.string) $http_code): ReturnType
public [write](#swoole-http-response.write)([string](#language.types.string) $content): [void](language.types.void.html)

}

# Swoole\Http\Response::cookie

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Response::cookie — Define las cookies de la respuesta HTTP.

### Descripción

public **Swoole\Http\Response::cookie**(
    [string](#language.types.string) $name,
    [string](#language.types.string) $value = ?,
    [string](#language.types.string) $expires = ?,
    [string](#language.types.string) $path = ?,
    [string](#language.types.string) $domain = ?,
    [string](#language.types.string) $secure = ?,
    [string](#language.types.string) $httponly = ?
): [string](#language.types.string)

### Parámetros

    name









    value









    expires









    path









    domain









    secure









    httponly





### Valores devueltos

# Swoole\Http\Response::\_\_destruct

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Response::\_\_destruct — Destruye la respuesta HTTP.

### Descripción

public **Swoole\Http\Response::\_\_destruct**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Http\Response::end

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Response::end — Envía los datos para la petición HTTP y termina la respuesta.

### Descripción

public **Swoole\Http\Response::end**([string](#language.types.string) $content = ?): [void](language.types.void.html)

### Parámetros

    content





### Valores devueltos

# Swoole\Http\Response::gzip

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Response::gzip — Activa la compresión gzip del contenido de la respuesta.

### Descripción

public **Swoole\Http\Response::gzip**([string](#language.types.string) $compress_level = ?): ReturnType

    Las cabeceras sobre Content-Encoding serán añadidas automáticamente.

### Parámetros

    compress_level





### Valores devueltos

# Swoole\Http\Response::header

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Response::header — Define los encabezados de respuesta HTTP.

### Descripción

public **Swoole\Http\Response::header**([string](#language.types.string) $key, [string](#language.types.string) $value, [string](#language.types.string) $ucwords = ?): [void](language.types.void.html)

### Parámetros

    key









    value









    ucwords





### Valores devueltos

# Swoole\Http\Response::initHeader

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Response::initHeader — Inicializa el encabezado de respuesta HTTP.

### Descripción

public **Swoole\Http\Response::initHeader**(): ReturnType

    Inicializa el encabezado de respuesta HTTP.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Http\Response::rawcookie

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Response::rawcookie — Define los cookies bruts de la respuesta HTTP.

### Descripción

public **Swoole\Http\Response::rawcookie**(
    [string](#language.types.string) $name,
    [string](#language.types.string) $value = ?,
    [string](#language.types.string) $expires = ?,
    [string](#language.types.string) $path = ?,
    [string](#language.types.string) $domain = ?,
    [string](#language.types.string) $secure = ?,
    [string](#language.types.string) $httponly = ?
): ReturnType

### Parámetros

    name









    value









    expires









    path









    domain









    secure









    httponly





### Valores devueltos

# Swoole\Http\Response::sendfile

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Response::sendfile — Envía un fichero a través de la respuesta HTTP.

### Descripción

public **Swoole\Http\Response::sendfile**([string](#language.types.string) $filename, [int](#language.types.integer) $offset = ?): ReturnType

    Envía un fichero a través de la respuesta HTTP.

### Parámetros

    filename









    offset





### Valores devueltos

# Swoole\Http\Response::status

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Response::status — Define el código de estado de la respuesta HTTP.

### Descripción

public **Swoole\Http\Response::status**([string](#language.types.string) $http_code): ReturnType

    Define el código de estado de la respuesta HTTP.

### Parámetros

    http_code





### Valores devueltos

# Swoole\Http\Response::write

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Response::write — Añade el contenido del cuerpo HTTP a la respuesta HTTP.

### Descripción

public **Swoole\Http\Response::write**([string](#language.types.string) $content): [void](language.types.void.html)

    Añade el contenido del cuerpo HTTP a la respuesta HTTP.

### Parámetros

    content





### Valores devueltos

## Tabla de contenidos

- [Swoole\Http\Response::cookie](#swoole-http-response.cookie) — Define las cookies de la respuesta HTTP.
- [Swoole\Http\Response::\_\_destruct](#swoole-http-response.destruct) — Destruye la respuesta HTTP.
- [Swoole\Http\Response::end](#swoole-http-response.end) — Envía los datos para la petición HTTP y termina la respuesta.
- [Swoole\Http\Response::gzip](#swoole-http-response.gzip) — Activa la compresión gzip del contenido de la respuesta.
- [Swoole\Http\Response::header](#swoole-http-response.header) — Define los encabezados de respuesta HTTP.
- [Swoole\Http\Response::initHeader](#swoole-http-response.initheader) — Inicializa el encabezado de respuesta HTTP.
- [Swoole\Http\Response::rawcookie](#swoole-http-response.rawcookie) — Define los cookies bruts de la respuesta HTTP.
- [Swoole\Http\Response::sendfile](#swoole-http-response.sendfile) — Envía un fichero a través de la respuesta HTTP.
- [Swoole\Http\Response::status](#swoole-http-response.status) — Define el código de estado de la respuesta HTTP.
- [Swoole\Http\Response::write](#swoole-http-response.write) — Añade el contenido del cuerpo HTTP a la respuesta HTTP.

# La clase Swoole\Http\Server

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Http\Server**



      extends
       [Swoole\Server](#class.swoole-server)

     {


    /* Métodos */

public [on](#swoole-http-server.on)([string](#language.types.string) $event_name, [callable](#language.types.callable) $callback): [void](language.types.void.html)
public [start](#swoole-http-server.start)(): [void](language.types.void.html)

    /* Métodos heredados */
    public [Swoole\Server::addlistener](#swoole-server.addlistener)([string](#language.types.string) $host, [int](#language.types.integer) $port, [string](#language.types.string) $socket_type): [void](language.types.void.html)

public [Swoole\Server::addProcess](#swoole-server.addprocess)([swoole_process](#class.swoole-process) $process): [bool](#language.types.boolean)
public [Swoole\Server::after](#swoole-server.after)([int](#language.types.integer) $after_time_ms, [callable](#language.types.callable) $callback, [string](#language.types.string) $param = ?): ReturnType
public [Swoole\Server::bind](#swoole-server.bind)([int](#language.types.integer) $fd, [int](#language.types.integer) $uid): [bool](#language.types.boolean)
public [Swoole\Server::clearTimer](#swoole-server.cleartimer)([int](#language.types.integer) $timer_id): [void](language.types.void.html)
**swoole_timer_clear**([int](#language.types.integer) $timer_id): [void](language.types.void.html)
public [Swoole\Server::close](#swoole-server.close)([int](#language.types.integer) $fd, [bool](#language.types.boolean) $reset = ?): [bool](#language.types.boolean)
public [Swoole\Server::confirm](#swoole-server.confirm)([int](#language.types.integer) $fd): [bool](#language.types.boolean)
public [Swoole\Server::connection_info](#swoole-server.connection-info)([int](#language.types.integer) $fd, [int](#language.types.integer) $reactor_id = ?): [array](#language.types.array)
public [Swoole\Server::connection_list](#swoole-server.connection-list)([int](#language.types.integer) $start_fd, [int](#language.types.integer) $pagesize = ?): [array](#language.types.array)
public [Swoole\Server::defer](#swoole-server.defer)([callable](#language.types.callable) $callback): [void](language.types.void.html)
public [Swoole\Server::exist](#swoole-server.exist)([int](#language.types.integer) $fd): [bool](#language.types.boolean)
public [Swoole\Server::finish](#swoole-server.finish)([string](#language.types.string) $data): [void](language.types.void.html)
public [Swoole\Server::getClientInfo](#swoole-server.getclientinfo)([int](#language.types.integer) $fd, [int](#language.types.integer) $reactor_id = ?, [bool](#language.types.boolean) $ignore_error = ?): [array](#language.types.array)
public [Swoole\Server::getClientList](#swoole-server.getclientlist)([int](#language.types.integer) $start_fd, [int](#language.types.integer) $pagesize = ?): [array](#language.types.array)
public [Swoole\Server::getLastError](#swoole-server.getlasterror)(): [int](#language.types.integer)
public [Swoole\Server::heartbeat](#swoole-server.heartbeat)([bool](#language.types.boolean) $if_close_connection): [mixed](#language.types.mixed)
public [Swoole\Server::listen](#swoole-server.listen)([string](#language.types.string) $host, [int](#language.types.integer) $port, [string](#language.types.string) $socket_type): [bool](#language.types.boolean)
public [Swoole\Server::on](#swoole-server.on)([string](#language.types.string) $event_name, [callable](#language.types.callable) $callback): [void](language.types.void.html)
public [Swoole\Server::pause](#swoole-server.pause)([int](#language.types.integer) $fd): [void](language.types.void.html)
public [Swoole\Server::protect](#swoole-server.protect)([int](#language.types.integer) $fd, [bool](#language.types.boolean) $is_protected = ?): [void](language.types.void.html)
public [Swoole\Server::reload](#swoole-server.reload)(): [bool](#language.types.boolean)
public [Swoole\Server::resume](#swoole-server.resume)([int](#language.types.integer) $fd): [void](language.types.void.html)
public [Swoole\Server::send](#swoole-server.send)([int](#language.types.integer) $fd, [string](#language.types.string) $data, [int](#language.types.integer) $reactor_id = ?): [bool](#language.types.boolean)
public [Swoole\Server::sendfile](#swoole-server.sendfile)([int](#language.types.integer) $fd, [string](#language.types.string) $filename, [int](#language.types.integer) $offset = ?): [bool](#language.types.boolean)
public [Swoole\Server::sendMessage](#swoole-server.sendmessage)([int](#language.types.integer) $worker_id, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [Swoole\Server::sendto](#swoole-server.sendto)(
    [string](#language.types.string) $ip,
    [int](#language.types.integer) $port,
    [string](#language.types.string) $data,
    [string](#language.types.string) $server_socket = ?
): [bool](#language.types.boolean)
public [Swoole\Server::sendwait](#swoole-server.sendwait)([int](#language.types.integer) $fd, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [Swoole\Server::set](#swoole-server.set)([array](#language.types.array) $settings): ReturnType
public [Swoole\Server::shutdown](#swoole-server.shutdown)(): [void](language.types.void.html)
public [Swoole\Server::start](#swoole-server.start)(): [void](language.types.void.html)
public [Swoole\Server::stats](#swoole-server.stats)(): [array](#language.types.array)
public [Swoole\Server::stop](#swoole-server.stop)([int](#language.types.integer) $worker_id = ?): [bool](#language.types.boolean)
public [Swoole\Server::task](#swoole-server.task)([string](#language.types.string) $data, [int](#language.types.integer) $dst_worker_id = ?, [callable](#language.types.callable) $callback = ?): [mixed](#language.types.mixed)
public [Swoole\Server::taskwait](#swoole-server.taskwait)([string](#language.types.string) $data, [float](#language.types.float) $timeout = ?, [int](#language.types.integer) $worker_id = ?): [void](language.types.void.html)
public [Swoole\Server::taskWaitMulti](#swoole-server.taskwaitmulti)([array](#language.types.array) $tasks, [float](#language.types.float) $timeout_ms = ?): [void](language.types.void.html)
public [Swoole\Server::tick](#swoole-server.tick)([int](#language.types.integer) $interval_ms, [callable](#language.types.callable) $callback): [void](language.types.void.html)

}

# Swoole\Http\Server::on

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Server::on — Vincula una retrollamada al servidor HTTP por nombre de evento.

### Descripción

public **Swoole\Http\Server::on**([string](#language.types.string) $event_name, [callable](#language.types.callable) $callback): [void](language.types.void.html)

    Vincula una retrollamada al servidor HTTP por nombre de evento.

### Parámetros

    event_name









    callback





### Valores devueltos

# Swoole\Http\Server::start

(PECL swoole &gt;= 1.9.0)

Swoole\Http\Server::start — Inicia el servidor HTTP swoole.

### Descripción

public **Swoole\Http\Server::start**(): [void](language.types.void.html)

    Inicia el servidor HTTP swoole.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [Swoole\Http\Server::on](#swoole-http-server.on) — Vincula una retrollamada al servidor HTTP por nombre de evento.
- [Swoole\Http\Server::start](#swoole-http-server.start) — Inicia el servidor HTTP swoole.

# La clase Swoole\Lock

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Lock**

     {


    /* Métodos */

public [\_\_destruct](#swoole-lock.destruct)(): [void](language.types.void.html)
public [lock](#swoole-lock.lock)(): [void](language.types.void.html)
public [lock_read](#swoole-lock.lock-read)(): [void](language.types.void.html)
public [trylock](#swoole-lock.trylock)(): [void](language.types.void.html)
public [trylock_read](#swoole-lock.trylock-read)(): [void](language.types.void.html)
public [unlock](#swoole-lock.unlock)(): [void](language.types.void.html)

}

# Swoole\Lock::\_\_construct

(PECL swoole &gt;= 1.9.0)

Swoole\Lock::\_\_construct — Construye un bloqueo de memoria.

### Descripción

public **Swoole\Lock::\_\_construct**([string](#language.types.string) $type = ?, [string](#language.types.string) $file_lock_location = ?)

    Un bloqueo Swoole se utiliza para la sincronización de datos entre varios hilos o procesos.

### Parámetros

    type









    file_lock_location





# Swoole\Lock::\_\_destruct

(PECL swoole &gt;= 1.9.0)

Swoole\Lock::\_\_destruct — Destruye un bloqueo de memoria Swoole.

### Descripción

public **Swoole\Lock::\_\_destruct**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Lock::lock

(PECL swoole &gt;= 1.9.0)

Swoole\Lock::lock — Intenta adquirir el bloqueo. Bloqueará si el bloqueo no está disponible.

### Descripción

public **Swoole\Lock::lock**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Lock::lock_read

(PECL swoole &gt;= 1.9.0)

Swoole\Lock::lock_read — Bloquea un bloqueo de lectura-escritura para la lectura.

### Descripción

public **Swoole\Lock::lock_read**(): [void](language.types.void.html)

    Bloquea un bloqueo de lectura-escritura para la lectura.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Lock::trylock

(PECL swoole &gt;= 1.9.0)

Swoole\Lock::trylock — Intenta adquirir el bloqueo y devuelve inmediatamente incluso si el bloqueo no está disponible.

### Descripción

public **Swoole\Lock::trylock**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Lock::trylock_read

(PECL swoole &gt;= 1.9.0)

Swoole\Lock::trylock_read — Intenta bloquear un bloqueo de lectura-escritura para la lectura y devuelve inmediatamente incluso si el bloqueo no está disponible.

### Descripción

public **Swoole\Lock::trylock_read**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Lock::unlock

(PECL swoole &gt;= 1.9.0)

Swoole\Lock::unlock — Libera el bloqueo.

### Descripción

public **Swoole\Lock::unlock**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [Swoole\Lock::\_\_construct](#swoole-lock.construct) — Construye un bloqueo de memoria.
- [Swoole\Lock::\_\_destruct](#swoole-lock.destruct) — Destruye un bloqueo de memoria Swoole.
- [Swoole\Lock::lock](#swoole-lock.lock) — Intenta adquirir el bloqueo. Bloqueará si el bloqueo no está disponible.
- [Swoole\Lock::lock_read](#swoole-lock.lock-read) — Bloquea un bloqueo de lectura-escritura para la lectura.
- [Swoole\Lock::trylock](#swoole-lock.trylock) — Intenta adquirir el bloqueo y devuelve inmediatamente incluso si el bloqueo no está disponible.
- [Swoole\Lock::trylock_read](#swoole-lock.trylock-read) — Intenta bloquear un bloqueo de lectura-escritura para la lectura y devuelve inmediatamente incluso si el bloqueo no está disponible.
- [Swoole\Lock::unlock](#swoole-lock.unlock) — Libera el bloqueo.

# La clase Swoole\Mmap

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Mmap**

     {


    /* Métodos */

public static [open](#swoole-mmap.open)([string](#language.types.string) $filename, [string](#language.types.string) $size = ?, [string](#language.types.string) $offset = ?): ReturnType

}

# Swoole\Mmap::open

(PECL swoole &gt;= 1.9.0)

Swoole\Mmap::open — Mapea un fichero en memoria y devuelve el recurso de flujo que puede ser utilizado por las operaciones de flujo PHP.

### Descripción

public static **Swoole\Mmap::open**([string](#language.types.string) $filename, [string](#language.types.string) $size = ?, [string](#language.types.string) $offset = ?): ReturnType

### Parámetros

    filename









    size









    offset





### Valores devueltos

## Tabla de contenidos

- [Swoole\Mmap::open](#swoole-mmap.open) — Mapea un fichero en memoria y devuelve el recurso de flujo que puede ser utilizado por las operaciones de flujo PHP.

# La clase Swoole\MySQL

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\MySQL**

     {


    /* Métodos */

public [close](#swoole-mysql.close)(): [void](language.types.void.html)
public [connect](#swoole-mysql.connect)([array](#language.types.array) $server_config, [callable](#language.types.callable) $callback): [void](language.types.void.html)
public [\_\_destruct](#swoole-mysql.destruct)(): [void](language.types.void.html)
public [getBuffer](#swoole-mysql.getbuffer)(): ReturnType
public [on](#swoole-mysql.on)([string](#language.types.string) $event_name, [callable](#language.types.callable) $callback): [void](language.types.void.html)
public [query](#swoole-mysql.query)([string](#language.types.string) $sql, [callable](#language.types.callable) $callback): ReturnType

}

# Swoole\MySQL::close

(PECL swoole &gt;= 1.9.0)

Swoole\MySQL::close — Cierra la conexión MySQL asíncrona.

### Descripción

public **Swoole\MySQL::close**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\MySQL::connect

(PECL swoole &gt;= 1.9.0)

Swoole\MySQL::connect — Conecta al servidor MySQL remoto.

### Descripción

public **Swoole\MySQL::connect**([array](#language.types.array) $server_config, [callable](#language.types.callable) $callback): [void](language.types.void.html)

    Conecta al servidor MySQL remoto.

### Parámetros

    server_config









    callback





### Valores devueltos

# Swoole\MySQL::\_\_construct

(PECL swoole &gt;= 1.9.0)

Swoole\MySQL::\_\_construct — Construye un cliente MySQL asíncrono.

### Descripción

public **Swoole\MySQL::\_\_construct**()

    Construye un cliente MySQL asíncrono.

### Parámetros

Esta función no contiene ningún parámetro.

# Swoole\MySQL::\_\_destruct

(PECL swoole &gt;= 1.9.0)

Swoole\MySQL::\_\_destruct — Destruye el cliente MySQL asíncrono.

### Descripción

public **Swoole\MySQL::\_\_destruct**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\MySQL::getBuffer

(PECL swoole &gt;= 1.9.0)

Swoole\MySQL::getBuffer — Descripción

### Descripción

public **Swoole\MySQL::getBuffer**(): ReturnType

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\MySQL::on

(PECL swoole &gt;= 1.9.0)

Swoole\MySQL::on — Registra una retrollamada basada en el nombre del evento.

### Descripción

public **Swoole\MySQL::on**([string](#language.types.string) $event_name, [callable](#language.types.callable) $callback): [void](language.types.void.html)

    Registra una retrollamada basada en el nombre del evento, actualmente solo el evento 'close' es soportado.

### Parámetros

    event_name









    callback





### Valores devueltos

# Swoole\MySQL::query

(PECL swoole &gt;= 1.9.0)

Swoole\MySQL::query — Ejecuta la consulta SQL.

### Descripción

public **Swoole\MySQL::query**([string](#language.types.string) $sql, [callable](#language.types.callable) $callback): ReturnType

### Parámetros

    sql









    callback





### Valores devueltos

## Tabla de contenidos

- [Swoole\MySQL::close](#swoole-mysql.close) — Cierra la conexión MySQL asíncrona.
- [Swoole\MySQL::connect](#swoole-mysql.connect) — Conecta al servidor MySQL remoto.
- [Swoole\MySQL::\_\_construct](#swoole-mysql.construct) — Construye un cliente MySQL asíncrono.
- [Swoole\MySQL::\_\_destruct](#swoole-mysql.destruct) — Destruye el cliente MySQL asíncrono.
- [Swoole\MySQL::getBuffer](#swoole-mysql.getbuffer) — Descripción
- [Swoole\MySQL::on](#swoole-mysql.on) — Registra una retrollamada basada en el nombre del evento.
- [Swoole\MySQL::query](#swoole-mysql.query) — Ejecuta la consulta SQL.

# La clase Swoole\MySQL\Exception

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\MySQL\Exception**



      extends
       [Exception](#class.exception)


     implements
       [Throwable](#class.throwable) {

    /* Propiedades heredadas */

     protected
     [string](#language.types.string)
      [$message](#exception.props.message) = "";

private
[string](#language.types.string)
[$string](#exception.props.string) = "";
protected
[int](#language.types.integer)
[$code](#exception.props.code);
protected
[string](#language.types.string)
[$file](#exception.props.file) = "";
protected
[int](#language.types.integer)
[$line](#exception.props.line);
private
[array](#language.types.array)
[$trace](#exception.props.trace) = [];
private
?[Throwable](#class.throwable)
[$previous](#exception.props.previous) = null;

}

# La clase Swoole\Process

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Process**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [IPC_NOWAIT](#swoole-process.constants.ipc-nowait) = 256;


    /* Métodos */

public static [alarm](#swoole-process.alarm)([int](#language.types.integer) $interval_usec): [void](language.types.void.html)
public [close](#swoole-process.close)(): [void](language.types.void.html)
public static [daemon](#swoole-process.daemon)([bool](#language.types.boolean) $nochdir = ?, [bool](#language.types.boolean) $noclose = ?): [void](language.types.void.html)
public [\_\_destruct](#swoole-process.destruct)(): [void](language.types.void.html)
public [exec](#swoole-process.exec)([string](#language.types.string) $exec_file, [string](#language.types.string) $args): ReturnType
public [exit](#swoole-process.exit)([string](#language.types.string) $exit_code = ?): [void](language.types.void.html)
public [freeQueue](#swoole-process.freequeue)(): [void](language.types.void.html)
public static [kill](#swoole-process.kill)([int](#language.types.integer) $pid, [int](#language.types.integer) $signal_no = ?): [bool](#language.types.boolean)
public [name](#swoole-process.name)([string](#language.types.string) $process_name): [bool](#language.types.boolean)
public [pop](#swoole-process.pop)([int](#language.types.integer) $maxsize = ?): [mixed](#language.types.mixed)
public [push](#swoole-process.push)([string](#language.types.string) $data): [bool](#language.types.boolean)
public [read](#swoole-process.read)([int](#language.types.integer) $maxsize = ?): [string](#language.types.string)
public static [signal](#swoole-process.signal)([string](#language.types.string) $signal_no, [callable](#language.types.callable) $callback): [void](language.types.void.html)
public [start](#swoole-process.start)(): [void](language.types.void.html)
public [statQueue](#swoole-process.statqueue)(): [array](#language.types.array)
public [useQueue](#swoole-process.usequeue)([int](#language.types.integer) $key, [int](#language.types.integer) $mode = ?): [bool](#language.types.boolean)
public static [wait](#swoole-process.wait)([bool](#language.types.boolean) $blocking = ?): [array](#language.types.array)
public [write](#swoole-process.write)([string](#language.types.string) $data): [int](#language.types.integer)

}

## Constantes predefinidas

     **[Swoole\Process::IPC_NOWAIT](#swoole-process.constants.ipc-nowait)**






# Swoole\Process::alarm

(PECL swoole &gt;= 1.9.0)

Swoole\Process::alarm — Temporizador de alta precisión que dispara una señal a intervalo fijo.

### Descripción

public static **Swoole\Process::alarm**([int](#language.types.integer) $interval_usec): [void](language.types.void.html)

### Parámetros

    interval_usec





### Valores devueltos

# Swoole\Process::close

(PECL swoole &gt;= 1.9.0)

Swoole\Process::close — Cierra el tubo hacia el proceso hijo.

### Descripción

public **Swoole\Process::close**(): [void](language.types.void.html)

    Cierra el tubo hacia el proceso hijo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Process::\_\_construct

(PECL swoole &gt;= 1.9.0)

Swoole\Process::\_\_construct — Construye un proceso.

### Descripción

public **Swoole\Process::\_\_construct**([callable](#language.types.callable) $callback, [bool](#language.types.boolean) $redirect_stdin_and_stdout = ?, [int](#language.types.integer) $pipe_type = ?)

### Parámetros

    callback









    redirect_stdin_and_stdout









    pipe_type





# Swoole\Process::daemon

(PECL swoole &gt;= 1.9.0)

Swoole\Process::daemon — Cambia el proceso a un proceso daemon.

### Descripción

public static **Swoole\Process::daemon**([bool](#language.types.boolean) $nochdir = ?, [bool](#language.types.boolean) $noclose = ?): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    nochdir









    noclose





### Valores devueltos

# Swoole\Process::\_\_destruct

(PECL swoole &gt;= 1.9.0)

Swoole\Process::\_\_destruct — Destruye el proceso.

### Descripción

public **Swoole\Process::\_\_destruct**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Process::exec

(PECL swoole &gt;= 1.9.0)

Swoole\Process::exec — Ejecuta un comando del sistema.

### Descripción

public **Swoole\Process::exec**([string](#language.types.string) $exec_file, [string](#language.types.string) $args): ReturnType

    El proceso será reemplazado por el proceso del comando del sistema, pero el tubo hacia el proceso padre será conservado.

### Parámetros

    exec_file









    args





### Valores devueltos

# Swoole\Process::exit

(PECL swoole &gt;= 1.9.0)

Swoole\Process::exit — Detiene los procesos hijos.

### Descripción

public **Swoole\Process::exit**([string](#language.types.string) $exit_code = ?): [void](language.types.void.html)

### Parámetros

    exit_code





### Valores devueltos

# Swoole\Process::freeQueue

(PECL swoole &gt;= 1.9.0)

Swoole\Process::freeQueue — Destruye la cola de mensajes creada por swoole_process::useQueue.

### Descripción

public **Swoole\Process::freeQueue**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Process::kill

(PECL swoole &gt;= 1.9.0)

Swoole\Process::kill — Envía una señal al proceso hijo.

### Descripción

public static **Swoole\Process::kill**([int](#language.types.integer) $pid, [int](#language.types.integer) $signal_no = ?): [bool](#language.types.boolean)

    Envía una señal al proceso hijo.

### Parámetros

    pid


      El PID del proceso






    signal_no


      La señal a enviar


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# Swoole\Process::name

(PECL swoole &gt;= 1.9.0)

Swoole\Process::name — Define el nombre del proceso.

### Descripción

public **Swoole\Process::name**([string](#language.types.string) $process_name): [bool](#language.types.boolean)

### Parámetros

    process_name


      Define el nombre del proceso.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# Swoole\Process::pop

(PECL swoole &gt;= 1.9.0)

Swoole\Process::pop — Lee y extrae datos de la cola de mensajes.

### Descripción

public **Swoole\Process::pop**([int](#language.types.integer) $maxsize = ?): [mixed](#language.types.mixed)

### Parámetros

    maxsize





### Valores devueltos

# Swoole\Process::push

(PECL swoole &gt;= 1.9.0)

Swoole\Process::push — Escribe y empuja datos en la cola de mensajes.

### Descripción

public **Swoole\Process::push**([string](#language.types.string) $data): [bool](#language.types.boolean)

### Parámetros

    data





### Valores devueltos

# Swoole\Process::read

(PECL swoole &gt;= 1.9.0)

Swoole\Process::read — Lee los datos enviados al proceso.

### Descripción

public **Swoole\Process::read**([int](#language.types.integer) $maxsize = ?): [string](#language.types.string)

### Parámetros

    maxsize





### Valores devueltos

# Swoole\Process::signal

(PECL swoole &gt;= 1.9.0)

Swoole\Process::signal — Envía un signal a los procesos hijos.

### Descripción

public static **Swoole\Process::signal**([string](#language.types.string) $signal_no, [callable](#language.types.callable) $callback): [void](language.types.void.html)

### Parámetros

    signal_no









    callback





### Valores devueltos

Si el signal es enviado con éxito, devuelve TRUE, de lo contrario devuelve FALSE.

# Swoole\Process::start

(PECL swoole &gt;= 1.9.0)

Swoole\Process::start — Inicia el proceso.

### Descripción

public **Swoole\Process::start**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Process::statQueue

(PECL swoole &gt;= 1.9.0)

Swoole\Process::statQueue — Devuelve las estadísticas de la cola de mensajes utilizada como método de comunicación entre los procesos.

### Descripción

public **Swoole\Process::statQueue**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El array de estado de la cola de mensajes.

# Swoole\Process::useQueue

(PECL swoole &gt;= 1.9.0)

Swoole\Process::useQueue — Crear una cola de mensajes como método de comunicación entre el proceso padre y los procesos hijos.

### Descripción

public **Swoole\Process::useQueue**([int](#language.types.integer) $key, [int](#language.types.integer) $mode = ?): [bool](#language.types.boolean)

### Parámetros

    key









    mode





### Valores devueltos

# Swoole\Process::wait

(PECL swoole &gt;= 1.9.0)

Swoole\Process::wait — Espera los eventos de los procesos hijos.

### Descripción

public static **Swoole\Process::wait**([bool](#language.types.boolean) $blocking = ?): [array](#language.types.array)

### Parámetros

    blocking





### Valores devueltos

# Swoole\Process::write

(PECL swoole &gt;= 1.9.0)

Swoole\Process::write — Escribe datos en el tubo y comunica con el proceso padre o los procesos hijos.

### Descripción

public **Swoole\Process::write**([string](#language.types.string) $data): [int](#language.types.integer)

### Parámetros

    data





### Valores devueltos

## Tabla de contenidos

- [Swoole\Process::alarm](#swoole-process.alarm) — Temporizador de alta precisión que dispara una señal a intervalo fijo.
- [Swoole\Process::close](#swoole-process.close) — Cierra el tubo hacia el proceso hijo.
- [Swoole\Process::\_\_construct](#swoole-process.construct) — Construye un proceso.
- [Swoole\Process::daemon](#swoole-process.daemon) — Cambia el proceso a un proceso daemon.
- [Swoole\Process::\_\_destruct](#swoole-process.destruct) — Destruye el proceso.
- [Swoole\Process::exec](#swoole-process.exec) — Ejecuta un comando del sistema.
- [Swoole\Process::exit](#swoole-process.exit) — Detiene los procesos hijos.
- [Swoole\Process::freeQueue](#swoole-process.freequeue) — Destruye la cola de mensajes creada por swoole_process::useQueue.
- [Swoole\Process::kill](#swoole-process.kill) — Envía una señal al proceso hijo.
- [Swoole\Process::name](#swoole-process.name) — Define el nombre del proceso.
- [Swoole\Process::pop](#swoole-process.pop) — Lee y extrae datos de la cola de mensajes.
- [Swoole\Process::push](#swoole-process.push) — Escribe y empuja datos en la cola de mensajes.
- [Swoole\Process::read](#swoole-process.read) — Lee los datos enviados al proceso.
- [Swoole\Process::signal](#swoole-process.signal) — Envía un signal a los procesos hijos.
- [Swoole\Process::start](#swoole-process.start) — Inicia el proceso.
- [Swoole\Process::statQueue](#swoole-process.statqueue) — Devuelve las estadísticas de la cola de mensajes utilizada como método de comunicación entre los procesos.
- [Swoole\Process::useQueue](#swoole-process.usequeue) — Crear una cola de mensajes como método de comunicación entre el proceso padre y los procesos hijos.
- [Swoole\Process::wait](#swoole-process.wait) — Espera los eventos de los procesos hijos.
- [Swoole\Process::write](#swoole-process.write) — Escribe datos en el tubo y comunica con el proceso padre o los procesos hijos.

# La clase Swoole\Redis\Server

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Redis\Server**



      extends
       [Swoole\Server](#class.swoole-server)

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [NIL](#swoole-redis-server.constants.nil) = 1;

    const
     [int](#language.types.integer)
      [ERROR](#swoole-redis-server.constants.error) = 0;

    const
     [int](#language.types.integer)
      [STATUS](#swoole-redis-server.constants.status) = 2;

    const
     [int](#language.types.integer)
      [INT](#swoole-redis-server.constants.int) = 3;

    const
     [int](#language.types.integer)
      [STRING](#swoole-redis-server.constants.string) = 4;

    const
     [int](#language.types.integer)
      [SET](#swoole-redis-server.constants.set) = 5;

    const
     [int](#language.types.integer)
      [MAP](#swoole-redis-server.constants.map) = 6;


    /* Métodos */

public static [format](#swoole-redis-server.format)([string](#language.types.string) $type, [string](#language.types.string) $value = ?): ReturnType
public [setHandler](#swoole-redis-server.sethandler)(
    [string](#language.types.string) $command,
    [string](#language.types.string) $callback,
    [string](#language.types.string) $number_of_string_param = ?,
    [string](#language.types.string) $type_of_array_param = ?
): ReturnType
public [start](#swoole-redis-server.start)(): ReturnType

    /* Métodos heredados */
    public [Swoole\Server::addlistener](#swoole-server.addlistener)([string](#language.types.string) $host, [int](#language.types.integer) $port, [string](#language.types.string) $socket_type): [void](language.types.void.html)

public [Swoole\Server::addProcess](#swoole-server.addprocess)([swoole_process](#class.swoole-process) $process): [bool](#language.types.boolean)
public [Swoole\Server::after](#swoole-server.after)([int](#language.types.integer) $after_time_ms, [callable](#language.types.callable) $callback, [string](#language.types.string) $param = ?): ReturnType
public [Swoole\Server::bind](#swoole-server.bind)([int](#language.types.integer) $fd, [int](#language.types.integer) $uid): [bool](#language.types.boolean)
public [Swoole\Server::clearTimer](#swoole-server.cleartimer)([int](#language.types.integer) $timer_id): [void](language.types.void.html)
**swoole_timer_clear**([int](#language.types.integer) $timer_id): [void](language.types.void.html)
public [Swoole\Server::close](#swoole-server.close)([int](#language.types.integer) $fd, [bool](#language.types.boolean) $reset = ?): [bool](#language.types.boolean)
public [Swoole\Server::confirm](#swoole-server.confirm)([int](#language.types.integer) $fd): [bool](#language.types.boolean)
public [Swoole\Server::connection_info](#swoole-server.connection-info)([int](#language.types.integer) $fd, [int](#language.types.integer) $reactor_id = ?): [array](#language.types.array)
public [Swoole\Server::connection_list](#swoole-server.connection-list)([int](#language.types.integer) $start_fd, [int](#language.types.integer) $pagesize = ?): [array](#language.types.array)
public [Swoole\Server::defer](#swoole-server.defer)([callable](#language.types.callable) $callback): [void](language.types.void.html)
public [Swoole\Server::exist](#swoole-server.exist)([int](#language.types.integer) $fd): [bool](#language.types.boolean)
public [Swoole\Server::finish](#swoole-server.finish)([string](#language.types.string) $data): [void](language.types.void.html)
public [Swoole\Server::getClientInfo](#swoole-server.getclientinfo)([int](#language.types.integer) $fd, [int](#language.types.integer) $reactor_id = ?, [bool](#language.types.boolean) $ignore_error = ?): [array](#language.types.array)
public [Swoole\Server::getClientList](#swoole-server.getclientlist)([int](#language.types.integer) $start_fd, [int](#language.types.integer) $pagesize = ?): [array](#language.types.array)
public [Swoole\Server::getLastError](#swoole-server.getlasterror)(): [int](#language.types.integer)
public [Swoole\Server::heartbeat](#swoole-server.heartbeat)([bool](#language.types.boolean) $if_close_connection): [mixed](#language.types.mixed)
public [Swoole\Server::listen](#swoole-server.listen)([string](#language.types.string) $host, [int](#language.types.integer) $port, [string](#language.types.string) $socket_type): [bool](#language.types.boolean)
public [Swoole\Server::on](#swoole-server.on)([string](#language.types.string) $event_name, [callable](#language.types.callable) $callback): [void](language.types.void.html)
public [Swoole\Server::pause](#swoole-server.pause)([int](#language.types.integer) $fd): [void](language.types.void.html)
public [Swoole\Server::protect](#swoole-server.protect)([int](#language.types.integer) $fd, [bool](#language.types.boolean) $is_protected = ?): [void](language.types.void.html)
public [Swoole\Server::reload](#swoole-server.reload)(): [bool](#language.types.boolean)
public [Swoole\Server::resume](#swoole-server.resume)([int](#language.types.integer) $fd): [void](language.types.void.html)
public [Swoole\Server::send](#swoole-server.send)([int](#language.types.integer) $fd, [string](#language.types.string) $data, [int](#language.types.integer) $reactor_id = ?): [bool](#language.types.boolean)
public [Swoole\Server::sendfile](#swoole-server.sendfile)([int](#language.types.integer) $fd, [string](#language.types.string) $filename, [int](#language.types.integer) $offset = ?): [bool](#language.types.boolean)
public [Swoole\Server::sendMessage](#swoole-server.sendmessage)([int](#language.types.integer) $worker_id, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [Swoole\Server::sendto](#swoole-server.sendto)(
    [string](#language.types.string) $ip,
    [int](#language.types.integer) $port,
    [string](#language.types.string) $data,
    [string](#language.types.string) $server_socket = ?
): [bool](#language.types.boolean)
public [Swoole\Server::sendwait](#swoole-server.sendwait)([int](#language.types.integer) $fd, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [Swoole\Server::set](#swoole-server.set)([array](#language.types.array) $settings): ReturnType
public [Swoole\Server::shutdown](#swoole-server.shutdown)(): [void](language.types.void.html)
public [Swoole\Server::start](#swoole-server.start)(): [void](language.types.void.html)
public [Swoole\Server::stats](#swoole-server.stats)(): [array](#language.types.array)
public [Swoole\Server::stop](#swoole-server.stop)([int](#language.types.integer) $worker_id = ?): [bool](#language.types.boolean)
public [Swoole\Server::task](#swoole-server.task)([string](#language.types.string) $data, [int](#language.types.integer) $dst_worker_id = ?, [callable](#language.types.callable) $callback = ?): [mixed](#language.types.mixed)
public [Swoole\Server::taskwait](#swoole-server.taskwait)([string](#language.types.string) $data, [float](#language.types.float) $timeout = ?, [int](#language.types.integer) $worker_id = ?): [void](language.types.void.html)
public [Swoole\Server::taskWaitMulti](#swoole-server.taskwaitmulti)([array](#language.types.array) $tasks, [float](#language.types.float) $timeout_ms = ?): [void](language.types.void.html)
public [Swoole\Server::tick](#swoole-server.tick)([int](#language.types.integer) $interval_ms, [callable](#language.types.callable) $callback): [void](language.types.void.html)

}

## Constantes predefinidas

     **[Swoole\Redis\Server::NIL](#swoole-redis-server.constants.nil)**








     **[Swoole\Redis\Server::ERROR](#swoole-redis-server.constants.error)**








     **[Swoole\Redis\Server::STATUS](#swoole-redis-server.constants.status)**








     **[Swoole\Redis\Server::INT](#swoole-redis-server.constants.int)**








     **[Swoole\Redis\Server::STRING](#swoole-redis-server.constants.string)**








     **[Swoole\Redis\Server::SET](#swoole-redis-server.constants.set)**








     **[Swoole\Redis\Server::MAP](#swoole-redis-server.constants.map)**






# Swoole\Redis\Server::format

(PECL swoole &gt;= 1.9.0)

Swoole\Redis\Server::format — Descripción

### Descripción

public static **Swoole\Redis\Server::format**([string](#language.types.string) $type, [string](#language.types.string) $value = ?): ReturnType

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    type









    value





### Valores devueltos

# Swoole\Redis\Server::setHandler

(PECL swoole &gt;= 1.9.0)

Swoole\Redis\Server::setHandler — Descripción

### Descripción

public **Swoole\Redis\Server::setHandler**(
    [string](#language.types.string) $command,
    [string](#language.types.string) $callback,
    [string](#language.types.string) $number_of_string_param = ?,
    [string](#language.types.string) $type_of_array_param = ?
): ReturnType

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    command









    callback









    number_of_string_param









    type_of_array_param





### Valores devueltos

# Swoole\Redis\Server::start

(PECL swoole &gt;= 1.9.0)

Swoole\Redis\Server::start — Descripción

### Descripción

public **Swoole\Redis\Server::start**(): ReturnType

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [Swoole\Redis\Server::format](#swoole-redis-server.format) — Descripción
- [Swoole\Redis\Server::setHandler](#swoole-redis-server.sethandler) — Descripción
- [Swoole\Redis\Server::start](#swoole-redis-server.start) — Descripción

# The Swoole\Runtime class

(No version information available, might only be in Git)

## Introducción

    Swoole\Runtime proporciona soporte de corrutinas para varias funciones PHP a través del mecanismo de hook,
    permitiendo que el código síncrono funcione de manera asíncrona en un entorno de corrutinas.

## Sinopsis de la Clase

    ****




      class **Swoole\Runtime**

     {


    /* Métodos */

public static [enableCoroutine](#swoole-runtime.enable-coroutine)([int](#language.types.integer) $flags = SWOOLE_HOOK_ALL): [void](language.types.void.html)
public static [getHookFlags](#swoole-runtime.get-hook-flags)(): [int](#language.types.integer)
public static [setHookFlags](#swoole-runtime.set-hook-flags)([int](#language.types.integer) $flags): [bool](#language.types.boolean)

}

# Swoole\Runtime::enableCoroutine

(No version information available, might only be in Git)

Swoole\Runtime::enableCoroutine — Habilitar corrutinas para funciones específicas

### Descripción

public static **Swoole\Runtime::enableCoroutine**([int](#language.types.integer) $flags = SWOOLE_HOOK_ALL): [void](language.types.void.html)

Este método habilita el soporte de corrutinas para funciones PHP específicas según los flags proporcionados.
Debe ser llamado una vez al inicio de la aplicación.

### Parámetros

    flags


      Máscara de bits de flags que especifica qué funciones se deben interceptar. Puede combinarse usando el operador |.
      Flags disponibles:
      **[SWOOLE_HOOK_TCP](#constant.swoole-hook-tcp)**,
      **[SWOOLE_HOOK_UDP](#constant.swoole-hook-udp)**,
      **[SWOOLE_HOOK_UNIX](#constant.swoole-hook-unix)**,
      **[SWOOLE_HOOK_UDG](#constant.swoole-hook-udg)**,
      **[SWOOLE_HOOK_SSL](#constant.swoole-hook-ssl)**,
      **[SWOOLE_HOOK_TLS](#constant.swoole-hook-tls)**,
      **[SWOOLE_HOOK_SLEEP](#constant.swoole-hook-sleep)**,
      **[SWOOLE_HOOK_FILE](#constant.swoole-hook-file)**,
      **[SWOOLE_HOOK_STREAM_FUNCTION](#constant.swoole-hook-stream-function)**,
      **[SWOOLE_HOOK_BLOCKING_FUNCTION](#constant.swoole-hook-blocking-function)**,
      **[SWOOLE_HOOK_PROC](#constant.swoole-hook-proc)**,
      **[SWOOLE_HOOK_CURL](#constant.swoole-hook-curl)**,
      **[SWOOLE_HOOK_NATIVE_CURL](#constant.swoole-hook-native-curl)**,
      **[SWOOLE_HOOK_SOCKETS](#constant.swoole-hook-sockets)**,
      **[SWOOLE_HOOK_STDIO](#constant.swoole-hook-stdio)**,
      **[SWOOLE_HOOK_PDO_PGSQL](#constant.swoole-hook-pdo-pgsql)**,
      **[SWOOLE_HOOK_PDO_ODBC](#constant.swoole-hook-pdo-odbc)**,
      **[SWOOLE_HOOK_PDO_ORACLE](#constant.swoole-hook-pdo-oracle)**,
      **[SWOOLE_HOOK_PDO_SQLITE](#constant.swoole-hook-pdo-sqlite)**,
      o **[SWOOLE_HOOK_ALL](#constant.swoole-hook-all)** para todos los flags.


### Valores devueltos

No se retorna ningún valor.

# Swoole\Runtime::getHookFlags

(No version information available, might only be in Git)

Swoole\Runtime::getHookFlags — Obtiene los flags de hook actuales

### Descripción

public static **Swoole\Runtime::getHookFlags**(): [int](#language.types.integer)

Obtiene los flags de hook actuales.
Tenga en cuenta que los flags devueltos pueden diferir de lo que se estableció si algunos hooks fallaron.

### Parámetros

Esta función no tiene parámetros.

### Valores devueltos

Devuelve los flags de hook actuales como una máscara de bits.

# Swoole\Runtime::setHookFlags

(No version information available, might only be in Git)

Swoole\Runtime::setHookFlags — Establece los flags de hook para corrutinas

### Descripción

public static **Swoole\Runtime::setHookFlags**([int](#language.types.integer) $flags): [bool](#language.types.boolean)

Establece los flags de hook para el soporte de corrutinas.
Esto cambia dinámicamente los flags de hook en tiempo de ejecución.

### Parámetros

    flags


      Máscara de bits de flags que especifica qué funciones se deben hookear. Los mismos flags que enableCoroutine.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

## Tabla de contenidos

- [Swoole\Runtime::enableCoroutine](#swoole-runtime.enable-coroutine) — Habilitar corrutinas para funciones específicas
- [Swoole\Runtime::getHookFlags](#swoole-runtime.get-hook-flags) — Obtiene los flags de hook actuales
- [Swoole\Runtime::setHookFlags](#swoole-runtime.set-hook-flags) — Establece los flags de hook para corrutinas

# La clase Swoole\Serialize

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Serialize**

     {


    /* Métodos */

public static [pack](#swoole-serialize.pack)([string](#language.types.string) $data, [int](#language.types.integer) $is_fast = ?): ReturnType
public static [unpack](#swoole-serialize.unpack)([string](#language.types.string) $data, [string](#language.types.string) $args = ?): ReturnType

}

# Swoole\Serialize::pack

(PECL swoole &gt;= 1.9.0)

Swoole\Serialize::pack — Serializa los datos.

### Descripción

public static **Swoole\Serialize::pack**([string](#language.types.string) $data, [int](#language.types.integer) $is_fast = ?): ReturnType

    Swoole proporciona un módulo de serialización rápido y eficiente.

### Parámetros

    data









    is_fast





### Valores devueltos

# Swoole\Serialize::unpack

(PECL swoole &gt;= 1.9.0)

Swoole\Serialize::unpack — Deserializa los datos.

### Descripción

public static **Swoole\Serialize::unpack**([string](#language.types.string) $data, [string](#language.types.string) $args = ?): ReturnType

    Deserializa los datos.

### Parámetros

    string









    args





### Valores devueltos

## Tabla de contenidos

- [Swoole\Serialize::pack](#swoole-serialize.pack) — Serializa los datos.
- [Swoole\Serialize::unpack](#swoole-serialize.unpack) — Deserializa los datos.

# La clase Swoole\Server

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Server**

     {


    /* Métodos */

public [addlistener](#swoole-server.addlistener)([string](#language.types.string) $host, [int](#language.types.integer) $port, [string](#language.types.string) $socket_type): [void](language.types.void.html)
public [addProcess](#swoole-server.addprocess)([swoole_process](#class.swoole-process) $process): [bool](#language.types.boolean)
public [after](#swoole-server.after)([int](#language.types.integer) $after_time_ms, [callable](#language.types.callable) $callback, [string](#language.types.string) $param = ?): ReturnType
public [bind](#swoole-server.bind)([int](#language.types.integer) $fd, [int](#language.types.integer) $uid): [bool](#language.types.boolean)
public [clearTimer](#swoole-server.cleartimer)([int](#language.types.integer) $timer_id): [void](language.types.void.html)
**swoole_timer_clear**([int](#language.types.integer) $timer_id): [void](language.types.void.html)
public [close](#swoole-server.close)([int](#language.types.integer) $fd, [bool](#language.types.boolean) $reset = ?): [bool](#language.types.boolean)
public [confirm](#swoole-server.confirm)([int](#language.types.integer) $fd): [bool](#language.types.boolean)
public [connection_info](#swoole-server.connection-info)([int](#language.types.integer) $fd, [int](#language.types.integer) $reactor_id = ?): [array](#language.types.array)
public [connection_list](#swoole-server.connection-list)([int](#language.types.integer) $start_fd, [int](#language.types.integer) $pagesize = ?): [array](#language.types.array)
public [defer](#swoole-server.defer)([callable](#language.types.callable) $callback): [void](language.types.void.html)
public [exist](#swoole-server.exist)([int](#language.types.integer) $fd): [bool](#language.types.boolean)
public [finish](#swoole-server.finish)([string](#language.types.string) $data): [void](language.types.void.html)
public [getClientInfo](#swoole-server.getclientinfo)([int](#language.types.integer) $fd, [int](#language.types.integer) $reactor_id = ?, [bool](#language.types.boolean) $ignore_error = ?): [array](#language.types.array)
public [getClientList](#swoole-server.getclientlist)([int](#language.types.integer) $start_fd, [int](#language.types.integer) $pagesize = ?): [array](#language.types.array)
public [getLastError](#swoole-server.getlasterror)(): [int](#language.types.integer)
public [heartbeat](#swoole-server.heartbeat)([bool](#language.types.boolean) $if_close_connection): [mixed](#language.types.mixed)
public [listen](#swoole-server.listen)([string](#language.types.string) $host, [int](#language.types.integer) $port, [string](#language.types.string) $socket_type): [bool](#language.types.boolean)
public [on](#swoole-server.on)([string](#language.types.string) $event_name, [callable](#language.types.callable) $callback): [void](language.types.void.html)
public [pause](#swoole-server.pause)([int](#language.types.integer) $fd): [void](language.types.void.html)
public [protect](#swoole-server.protect)([int](#language.types.integer) $fd, [bool](#language.types.boolean) $is_protected = ?): [void](language.types.void.html)
public [reload](#swoole-server.reload)(): [bool](#language.types.boolean)
public [resume](#swoole-server.resume)([int](#language.types.integer) $fd): [void](language.types.void.html)
public [send](#swoole-server.send)([int](#language.types.integer) $fd, [string](#language.types.string) $data, [int](#language.types.integer) $reactor_id = ?): [bool](#language.types.boolean)
public [sendfile](#swoole-server.sendfile)([int](#language.types.integer) $fd, [string](#language.types.string) $filename, [int](#language.types.integer) $offset = ?): [bool](#language.types.boolean)
public [sendMessage](#swoole-server.sendmessage)([int](#language.types.integer) $worker_id, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [sendto](#swoole-server.sendto)(
    [string](#language.types.string) $ip,
    [int](#language.types.integer) $port,
    [string](#language.types.string) $data,
    [string](#language.types.string) $server_socket = ?
): [bool](#language.types.boolean)
public [sendwait](#swoole-server.sendwait)([int](#language.types.integer) $fd, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [set](#swoole-server.set)([array](#language.types.array) $settings): ReturnType
public [shutdown](#swoole-server.shutdown)(): [void](language.types.void.html)
public [start](#swoole-server.start)(): [void](language.types.void.html)
public [stats](#swoole-server.stats)(): [array](#language.types.array)
public [stop](#swoole-server.stop)([int](#language.types.integer) $worker_id = ?): [bool](#language.types.boolean)
public [task](#swoole-server.task)([string](#language.types.string) $data, [int](#language.types.integer) $dst_worker_id = ?, [callable](#language.types.callable) $callback = ?): [mixed](#language.types.mixed)
public [taskwait](#swoole-server.taskwait)([string](#language.types.string) $data, [float](#language.types.float) $timeout = ?, [int](#language.types.integer) $worker_id = ?): [void](language.types.void.html)
public [taskWaitMulti](#swoole-server.taskwaitmulti)([array](#language.types.array) $tasks, [float](#language.types.float) $timeout_ms = ?): [void](language.types.void.html)
public [tick](#swoole-server.tick)([int](#language.types.integer) $interval_ms, [callable](#language.types.callable) $callback): [void](language.types.void.html)

}

# Swoole\Server::addlistener

(PECL swoole &gt;= 1.9.0)

Swoole\Server::addlistener — Añade un nuevo observador al servidor.

### Descripción

public **Swoole\Server::addlistener**([string](#language.types.string) $host, [int](#language.types.integer) $port, [string](#language.types.string) $socket_type): [void](language.types.void.html)

### Parámetros

    host









    port









    socket_type





### Valores devueltos

# Swoole\Server::addProcess

(PECL swoole &gt;= 1.9.0)

Swoole\Server::addProcess — Añade un swoole_process definido por el usuario al servidor.

### Descripción

public **Swoole\Server::addProcess**([swoole_process](#class.swoole-process) $process): [bool](#language.types.boolean)

### Parámetros

    process





### Valores devueltos

# Swoole\Server::after

(PECL swoole &gt;= 1.9.0)

Swoole\Server::after — Dispara una retrollamada después de un período de tiempo.

### Descripción

public **Swoole\Server::after**([int](#language.types.integer) $after_time_ms, [callable](#language.types.callable) $callback, [string](#language.types.string) $param = ?): ReturnType

### Parámetros

    after_time_ms









    callback









    param





### Valores devueltos

# Swoole\Server::bind

(PECL swoole &gt;= 1.9.0)

Swoole\Server::bind — Vincula la conexión a un identificador de usuario definido por el usuario.

### Descripción

public **Swoole\Server::bind**([int](#language.types.integer) $fd, [int](#language.types.integer) $uid): [bool](#language.types.boolean)

### Parámetros

    fd









    uid





### Valores devueltos

# Swoole\Server::clearTimer

# swoole_timer_clear

(PECL swoole &gt;= 1.9.0)

Swoole\Server::clearTimer -- swoole_timer_clear — Destruye y detiene un temporizador.

### Descripción

Estilo orientado a objetos (method):

public **Swoole\Server::clearTimer**([int](#language.types.integer) $timer_id): [void](language.types.void.html)

Estilo procedimental:

**swoole_timer_clear**([int](#language.types.integer) $timer_id): [void](language.types.void.html)

    Detiene y destruye un temporizador.

### Parámetros

     timer_id








### Valores devueltos

# Swoole\Server::close

(PECL swoole &gt;= 1.9.0)

Swoole\Server::close — Cierra una conexión con el cliente.

### Descripción

public **Swoole\Server::close**([int](#language.types.integer) $fd, [bool](#language.types.boolean) $reset = ?): [bool](#language.types.boolean)

### Parámetros

    fd









    reset





### Valores devueltos

# Swoole\Server::confirm

(PECL swoole &gt;= 1.9.0)

Swoole\Server::confirm — Verifica el estado de la conexión.

### Descripción

public **Swoole\Server::confirm**([int](#language.types.integer) $fd): [bool](#language.types.boolean)

### Parámetros

    fd





### Valores devueltos

# Swoole\Server::connection_info

(PECL swoole &gt;= 1.9.0)

Swoole\Server::connection_info — Devuelve la información de conexión por la descripción del fichero.

### Descripción

public **Swoole\Server::connection_info**([int](#language.types.integer) $fd, [int](#language.types.integer) $reactor_id = ?): [array](#language.types.array)

### Parámetros

    fd









    reactor_id





### Valores devueltos

# Swoole\Server::connection_list

(PECL swoole &gt;= 1.9.0)

Swoole\Server::connection_list — Devuelve todas las conexiones establecidas.

### Descripción

public **Swoole\Server::connection_list**([int](#language.types.integer) $start_fd, [int](#language.types.integer) $pagesize = ?): [array](#language.types.array)

### Parámetros

    start_fd









    pagesize





### Valores devueltos

# Swoole\Server::\_\_construct

(PECL swoole &gt;= 1.9.0)

Swoole\Server::\_\_construct — Construye un servidor Swoole.

### Descripción

public **Swoole\Server::\_\_construct**(
    [string](#language.types.string) $host,
    [int](#language.types.integer) $port = ?,
    [int](#language.types.integer) $mode = ?,
    [int](#language.types.integer) $sock_type = ?
)

### Parámetros

    host









    port









    mode









    sock_type





# Swoole\Server::defer

(PECL swoole &gt;= 1.9.0)

Swoole\Server::defer — Retrasa la ejecución de la función de retrollamada al final del ciclo de eventos actual.

### Descripción

public **Swoole\Server::defer**([callable](#language.types.callable) $callback): [void](language.types.void.html)

### Parámetros

    callback





### Valores devueltos

# Swoole\Server::exist

(PECL swoole &gt;= 1.9.0)

Swoole\Server::exist — Verifica si la conexión existe.

### Descripción

public **Swoole\Server::exist**([int](#language.types.integer) $fd): [bool](#language.types.boolean)

### Parámetros

    fd





### Valores devueltos

# Swoole\Server::finish

(PECL swoole &gt;= 1.9.0)

Swoole\Server::finish — Utilizado en el proceso de tarea para enviar el resultado al proceso de trabajo cuando la tarea está terminada.

### Descripción

public **Swoole\Server::finish**([string](#language.types.string) $data): [void](language.types.void.html)

### Parámetros

    data





### Valores devueltos

# Swoole\Server::getClientInfo

(PECL swoole &gt;= 1.9.0)

Swoole\Server::getClientInfo — Devuelve la información de conexión por la descripción del fichero.

### Descripción

public **Swoole\Server::getClientInfo**([int](#language.types.integer) $fd, [int](#language.types.integer) $reactor_id = ?, [bool](#language.types.boolean) $ignore_error = ?): [array](#language.types.array)

### Parámetros

    fd


      Los descriptores de ficheros.






    reactor_id


      El identificador del thread Reactor donde se establece la conexión.






    ignore_error


      Ignorar los errores o no, si se establece en true,
      la información de conexión será devuelta incluso si la conexión está cerrada.


### Valores devueltos

Devuelve la información sobre la conexión del cliente.

# Swoole\Server::getClientList

(PECL swoole &gt;= 1.9.0)

Swoole\Server::getClientList — Devuelve todas las conexiones establecidas.

### Descripción

public **Swoole\Server::getClientList**([int](#language.types.integer) $start_fd, [int](#language.types.integer) $pagesize = ?): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    start_fd









    pagesize





### Valores devueltos

# Swoole\Server::getLastError

(PECL swoole &gt;= 1.9.0)

Swoole\Server::getLastError — Devuelve el código de error del último error.

### Descripción

public **Swoole\Server::getLastError**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Server::heartbeat

(PECL swoole &gt;= 1.9.0)

Swoole\Server::heartbeat — Verifica todas las conexiones en el servidor.

### Descripción

public **Swoole\Server::heartbeat**([bool](#language.types.boolean) $if_close_connection): [mixed](#language.types.mixed)

### Parámetros

    if_close_connection





### Valores devueltos

# Swoole\Server::listen

(PECL swoole &gt;= 1.9.0)

Swoole\Server::listen — Escucha en la IP y el puerto dados, tipo de socket.

### Descripción

public **Swoole\Server::listen**([string](#language.types.string) $host, [int](#language.types.integer) $port, [string](#language.types.string) $socket_type): [bool](#language.types.boolean)

### Parámetros

    host









    port









    socket_type





### Valores devueltos

# Swoole\Server::on

(PECL swoole &gt;= 1.9.0)

Swoole\Server::on — Registra una retrollamada por nombre de evento.

### Descripción

public **Swoole\Server::on**([string](#language.types.string) $event_name, [callable](#language.types.callable) $callback): [void](language.types.void.html)

### Parámetros

    event_name









    callback





### Valores devueltos

# Swoole\Server::pause

(PECL swoole &gt;= 1.9.0)

Swoole\Server::pause — Detiene la recepción de datos de la conexión.

### Descripción

public **Swoole\Server::pause**([int](#language.types.integer) $fd): [void](language.types.void.html)

### Parámetros

    fd





### Valores devueltos

# Swoole\Server::protect

(PECL swoole &gt;= 1.9.0)

Swoole\Server::protect — Pone la conexión en modo protegido.

### Descripción

public **Swoole\Server::protect**([int](#language.types.integer) $fd, [bool](#language.types.boolean) $is_protected = ?): [void](language.types.void.html)

### Parámetros

    fd









    is_protected





### Valores devueltos

# Swoole\Server::reload

(PECL swoole &gt;= 1.9.0)

Swoole\Server::reload — Reinicia todos los procesos de trabajo.

### Descripción

public **Swoole\Server::reload**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Server::resume

(PECL swoole &gt;= 1.9.0)

Swoole\Server::resume — Reanuda la recepción de datos desde la conexión.

### Descripción

public **Swoole\Server::resume**([int](#language.types.integer) $fd): [void](language.types.void.html)

### Parámetros

    fd





### Valores devueltos

# Swoole\Server::send

(PECL swoole &gt;= 1.9.0)

Swoole\Server::send — Envía datos al cliente.

### Descripción

public **Swoole\Server::send**([int](#language.types.integer) $fd, [string](#language.types.string) $data, [int](#language.types.integer) $reactor_id = ?): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    fd









    data









    reactor_id





### Valores devueltos

# Swoole\Server::sendfile

(PECL swoole &gt;= 1.9.0)

Swoole\Server::sendfile — Envía un fichero a la conexión.

### Descripción

public **Swoole\Server::sendfile**([int](#language.types.integer) $fd, [string](#language.types.string) $filename, [int](#language.types.integer) $offset = ?): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    fd









    filename









    offset





### Valores devueltos

# Swoole\Server::sendMessage

(PECL swoole &gt;= 1.9.0)

Swoole\Server::sendMessage — Envía un mensaje a los procesos de trabajo por ID.

### Descripción

public **Swoole\Server::sendMessage**([int](#language.types.integer) $worker_id, [string](#language.types.string) $data): [bool](#language.types.boolean)

### Parámetros

    dst_worker_id









    data





### Valores devueltos

# Swoole\Server::sendto

(PECL swoole &gt;= 1.9.0)

Swoole\Server::sendto — Envía datos a la dirección UDP remota.

### Descripción

public **Swoole\Server::sendto**(
    [string](#language.types.string) $ip,
    [int](#language.types.integer) $port,
    [string](#language.types.string) $data,
    [string](#language.types.string) $server_socket = ?
): [bool](#language.types.boolean)

### Parámetros

    ip









    port









    data









    server_socket





### Valores devueltos

# Swoole\Server::sendwait

(PECL swoole &gt;= 1.9.0)

Swoole\Server::sendwait — Envía datos al socket remoto de manera bloqueante.

### Descripción

public **Swoole\Server::sendwait**([int](#language.types.integer) $fd, [string](#language.types.string) $data): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    fd









    data





### Valores devueltos

# Swoole\Server::set

(PECL swoole &gt;= 1.9.0)

Swoole\Server::set — Define los parámetros de ejecución del servidor swoole.

### Descripción

public **Swoole\Server::set**([array](#language.types.array) $settings): ReturnType

    Define los parámetros de ejecución del servidor swoole. Los parámetros pueden ser accedidos por $server-&gt;setting cuando el servidor swoole ha iniciado.

### Parámetros

    settings





### Valores devueltos

# Swoole\Server::shutdown

(PECL swoole &gt;= 1.9.0)

Swoole\Server::shutdown — Detiene el proceso del servidor maestro, esta función puede ser llamada en los procesos de trabajo.

### Descripción

public **Swoole\Server::shutdown**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Server::start

(PECL swoole &gt;= 1.9.0)

Swoole\Server::start — Inicia el servidor Swoole.

### Descripción

public **Swoole\Server::start**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Server::stats

(PECL swoole &gt;= 1.9.0)

Swoole\Server::stats — Devuelve las estadísticas del servidor Swoole.

### Descripción

public **Swoole\Server::stats**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Server::stop

(PECL swoole &gt;= 1.9.0)

Swoole\Server::stop — Detiene el servidor Swoole.

### Descripción

public **Swoole\Server::stop**([int](#language.types.integer) $worker_id = ?): [bool](#language.types.boolean)

### Parámetros

    worker_id





### Valores devueltos

# Swoole\Server::task

(PECL swoole &gt;= 1.9.0)

Swoole\Server::task — Envía datos a los procesos de trabajo de tarea.

### Descripción

public **Swoole\Server::task**([string](#language.types.string) $data, [int](#language.types.integer) $dst_worker_id = ?, [callable](#language.types.callable) $callback = ?): [mixed](#language.types.mixed)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    data









    dst_worker_id









    callback





### Valores devueltos

# Swoole\Server::taskwait

(PECL swoole &gt;= 1.9.0)

Swoole\Server::taskwait — Envía datos a los procesos de trabajo de tarea de manera bloqueante.

### Descripción

public **Swoole\Server::taskwait**([string](#language.types.string) $data, [float](#language.types.float) $timeout = ?, [int](#language.types.integer) $worker_id = ?): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    data









    timeout









    worker_id





### Valores devueltos

# Swoole\Server::taskWaitMulti

(PECL swoole &gt;= 1.9.0)

Swoole\Server::taskWaitMulti — Ejecuta varias tareas en paralelo.

### Descripción

public **Swoole\Server::taskWaitMulti**([array](#language.types.array) $tasks, [float](#language.types.float) $timeout_ms = ?): [void](language.types.void.html)

### Parámetros

    tasks









    timeout_ms





### Valores devueltos

# Swoole\Server::tick

(PECL swoole &gt;= 1.9.0)

Swoole\Server::tick — Repite una función dada a cada intervalo de tiempo dado.

### Descripción

public **Swoole\Server::tick**([int](#language.types.integer) $interval_ms, [callable](#language.types.callable) $callback): [void](language.types.void.html)

### Parámetros

    interval_ms









    callback





### Valores devueltos

## Tabla de contenidos

- [Swoole\Server::addlistener](#swoole-server.addlistener) — Añade un nuevo observador al servidor.
- [Swoole\Server::addProcess](#swoole-server.addprocess) — Añade un swoole_process definido por el usuario al servidor.
- [Swoole\Server::after](#swoole-server.after) — Dispara una retrollamada después de un período de tiempo.
- [Swoole\Server::bind](#swoole-server.bind) — Vincula la conexión a un identificador de usuario definido por el usuario.
- [Swoole\Server::clearTimer](#swoole-server.cleartimer) — Destruye y detiene un temporizador.
- [Swoole\Server::close](#swoole-server.close) — Cierra una conexión con el cliente.
- [Swoole\Server::confirm](#swoole-server.confirm) — Verifica el estado de la conexión.
- [Swoole\Server::connection_info](#swoole-server.connection-info) — Devuelve la información de conexión por la descripción del fichero.
- [Swoole\Server::connection_list](#swoole-server.connection-list) — Devuelve todas las conexiones establecidas.
- [Swoole\Server::\_\_construct](#swoole-server.construct) — Construye un servidor Swoole.
- [Swoole\Server::defer](#swoole-server.defer) — Retrasa la ejecución de la función de retrollamada al final del ciclo de eventos actual.
- [Swoole\Server::exist](#swoole-server.exist) — Verifica si la conexión existe.
- [Swoole\Server::finish](#swoole-server.finish) — Utilizado en el proceso de tarea para enviar el resultado al proceso de trabajo cuando la tarea está terminada.
- [Swoole\Server::getClientInfo](#swoole-server.getclientinfo) — Devuelve la información de conexión por la descripción del fichero.
- [Swoole\Server::getClientList](#swoole-server.getclientlist) — Devuelve todas las conexiones establecidas.
- [Swoole\Server::getLastError](#swoole-server.getlasterror) — Devuelve el código de error del último error.
- [Swoole\Server::heartbeat](#swoole-server.heartbeat) — Verifica todas las conexiones en el servidor.
- [Swoole\Server::listen](#swoole-server.listen) — Escucha en la IP y el puerto dados, tipo de socket.
- [Swoole\Server::on](#swoole-server.on) — Registra una retrollamada por nombre de evento.
- [Swoole\Server::pause](#swoole-server.pause) — Detiene la recepción de datos de la conexión.
- [Swoole\Server::protect](#swoole-server.protect) — Pone la conexión en modo protegido.
- [Swoole\Server::reload](#swoole-server.reload) — Reinicia todos los procesos de trabajo.
- [Swoole\Server::resume](#swoole-server.resume) — Reanuda la recepción de datos desde la conexión.
- [Swoole\Server::send](#swoole-server.send) — Envía datos al cliente.
- [Swoole\Server::sendfile](#swoole-server.sendfile) — Envía un fichero a la conexión.
- [Swoole\Server::sendMessage](#swoole-server.sendmessage) — Envía un mensaje a los procesos de trabajo por ID.
- [Swoole\Server::sendto](#swoole-server.sendto) — Envía datos a la dirección UDP remota.
- [Swoole\Server::sendwait](#swoole-server.sendwait) — Envía datos al socket remoto de manera bloqueante.
- [Swoole\Server::set](#swoole-server.set) — Define los parámetros de ejecución del servidor swoole.
- [Swoole\Server::shutdown](#swoole-server.shutdown) — Detiene el proceso del servidor maestro, esta función puede ser llamada en los procesos de trabajo.
- [Swoole\Server::start](#swoole-server.start) — Inicia el servidor Swoole.
- [Swoole\Server::stats](#swoole-server.stats) — Devuelve las estadísticas del servidor Swoole.
- [Swoole\Server::stop](#swoole-server.stop) — Detiene el servidor Swoole.
- [Swoole\Server::task](#swoole-server.task) — Envía datos a los procesos de trabajo de tarea.
- [Swoole\Server::taskwait](#swoole-server.taskwait) — Envía datos a los procesos de trabajo de tarea de manera bloqueante.
- [Swoole\Server::taskWaitMulti](#swoole-server.taskwaitmulti) — Ejecuta varias tareas en paralelo.
- [Swoole\Server::tick](#swoole-server.tick) — Repite una función dada a cada intervalo de tiempo dado.

# La clase Swoole\Table

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Table**


     implements
       [Iterator](#class.iterator),  [Countable](#class.countable) {

    /* Constantes */

     const
     [int](#language.types.integer)
      [TYPE_INT](#swoole-table.constants.type-int) = 1;

    const
     [int](#language.types.integer)
      [TYPE_STRING](#swoole-table.constants.type-string) = 7;

    const
     [int](#language.types.integer)
      [TYPE_FLOAT](#swoole-table.constants.type-float) = 6;


    /* Métodos */

public [column](#swoole-table.column)([string](#language.types.string) $name, [string](#language.types.string) $type, [int](#language.types.integer) $size = ?): [bool](#language.types.boolean)
public [count](#swoole-table.count)(): [int](#language.types.integer)
public [create](#swoole-table.create)(): [bool](#language.types.boolean)
public [current](#swoole-table.current)(): [array](#language.types.array)
public [decr](#swoole-table.decr)([string](#language.types.string) $key, [string](#language.types.string) $column, [int](#language.types.integer) $decrby = ?): [int](#language.types.integer)
public [del](#swoole-table.del)([string](#language.types.string) $key): [bool](#language.types.boolean)
public [destroy](#swoole-table.destroy)(): [bool](#language.types.boolean)
public [exist](#swoole-table.exist)([string](#language.types.string) $key): [bool](#language.types.boolean)
public [get](#swoole-table.get)([string](#language.types.string) $key, [string](#language.types.string) $field = ?): [mixed](#language.types.mixed)
public [incr](#swoole-table.incr)([string](#language.types.string) $key, [string](#language.types.string) $column, [int](#language.types.integer) $incrby = ?): [int](#language.types.integer)
public [key](#swoole-table.key)(): [mixed](#language.types.mixed)
public [next](#swoole-table.next)(): [void](language.types.void.html)
public [rewind](#swoole-table.rewind)(): [void](language.types.void.html)
public [set](#swoole-table.set)([string](#language.types.string) $key, [array](#language.types.array) $value): [bool](#language.types.boolean)
public [valid](#swoole-table.valid)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[Swoole\Table::TYPE_INT](#swoole-table.constants.type-int)**








     **[Swoole\Table::TYPE_STRING](#swoole-table.constants.type-string)**








     **[Swoole\Table::TYPE_FLOAT](#swoole-table.constants.type-float)**






# Swoole\Table::column

(PECL swoole &gt;= 1.9.0)

Swoole\Table::column — Define el tipo de datos y el tamaño de las columnas.

### Descripción

public **Swoole\Table::column**([string](#language.types.string) $name, [string](#language.types.string) $type, [int](#language.types.integer) $size = ?): [bool](#language.types.boolean)

### Parámetros

    name


      Especifica el nombre del campo.







    type


      Especifica el tipo del campo.






    size


      Especifica el tamaño del campo.


### Valores devueltos

# Swoole\Table::\_\_construct

(PECL swoole &gt;= 1.9.0)

Swoole\Table::\_\_construct — Construye una tabla de memoria Swoole de tamaño fijo.

### Descripción

public **Swoole\Table::\_\_construct**([int](#language.types.integer) $table_size)

### Parámetros

    table_size





# Swoole\Table::count

(PECL swoole &gt;= 1.9.0)

Swoole\Table::count — Cuenta las filas en la tabla, o cuenta todos los elementos en la tabla si $mode = 1.

### Descripción

public **Swoole\Table::count**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Table::create

(PECL swoole &gt;= 1.9.0)

Swoole\Table::create — Crear la tabla de memoria swoole.

### Descripción

public **Swoole\Table::create**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Table::current

(PECL swoole &gt;= 1.9.0)

Swoole\Table::current — Devuelve la fila actual.

### Descripción

public **Swoole\Table::current**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Table::decr

(PECL swoole &gt;= 1.9.0)

Swoole\Table::decr — Disminuye el valor en la tabla Swoole por $key y $column

### Descripción

public **Swoole\Table::decr**([string](#language.types.string) $key, [string](#language.types.string) $column, [int](#language.types.integer) $decrby = ?): [int](#language.types.integer)

### Parámetros

    key


      Clave de los datos.






    column


      Especifica el nombre de la columna.






    decrby


      Valor de decremento.


### Valores devueltos

# Swoole\Table::del

(PECL swoole &gt;= 1.9.0)

Swoole\Table::del — Elimina una fila en la tabla Swoole mediante $key

### Descripción

public **Swoole\Table::del**([string](#language.types.string) $key): [bool](#language.types.boolean)

### Parámetros

    key


       Clave para identificar la fila a eliminar


### Valores devueltos

    Devuelve true si la operación fue exitosa, false en caso contrario

# Swoole\Table::destroy

(PECL swoole &gt;= 1.9.0)

Swoole\Table::destroy — Destruye la tabla Swoole.

### Descripción

public **Swoole\Table::destroy**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Table::exist

(PECL swoole &gt;= 1.9.0)

Swoole\Table::exist — Verifica si una fila existe por $row_key.

### Descripción

public **Swoole\Table::exist**([string](#language.types.string) $key): [bool](#language.types.boolean)

### Parámetros

    key





### Valores devueltos

# Swoole\Table::get

(PECL swoole &gt;= 1.9.0)

Swoole\Table::get — Devuelve el valor en la tabla Swoole mediante $key y $field.

### Descripción

public **Swoole\Table::get**([string](#language.types.string) $key, [string](#language.types.string) $field = ?): [mixed](#language.types.mixed)

Este método permite obtener un valor almacenado en una tabla Swoole mediante una clave y un campo específico.

### Parámetros

    key


     La clave utilizada para identificar la fila en la tabla Swoole.






    field


     El nombre del campo del cual se desea obtener el valor. Si no se especifica, se devuelve todo el array asociativo de la fila.


### Valores devueltos

El valor asociado a la clave y campo especificados, o el array completo de la fila si no se especifica campo. En caso de no existir la clave, se devuelve NULL.

# Swoole\Table::incr

(PECL swoole &gt;= 1.9.0)

Swoole\Table::incr — Incrementa el valor por $key y $column

### Descripción

public **Swoole\Table::incr**([string](#language.types.string) $key, [string](#language.types.string) $column, [int](#language.types.integer) $incrby = ?): [int](#language.types.integer)

### Parámetros

    key


      Clave para los datos.






    column


      Especifica el nombre de la columna.






    incrby


      Valor de incremento.


### Valores devueltos

# Swoole\Table::key

(PECL swoole &gt;= 1.9.0)

Swoole\Table::key — Devuelve la clave de la fila actual.

### Descripción

public **Swoole\Table::key**(): [mixed](#language.types.mixed)

Este método permite obtener la clave de la fila actual en una tabla Swoole.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor devuelto es de tipo mixed, correspondiente a la clave de la fila actual.

# Swoole\Table::next

(PECL swoole &gt;= 1.9.0)

Swoole\Table::next — Iterador de la siguiente fila

### Descripción

public **Swoole\Table::next**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Table::rewind

(PECL swoole &gt;= 1.9.0)

Swoole\Table::rewind — Reinicializa el iterador.

### Descripción

public **Swoole\Table::rewind**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Swoole\Table::set

(PECL swoole &gt;= 1.9.0)

Swoole\Table::set — Actualiza una línea de la tabla mediante $key.

### Descripción

public **Swoole\Table::set**([string](#language.types.string) $key, [array](#language.types.array) $value): [bool](#language.types.boolean)

### Parámetros

    key


      La clave de los datos.






    value


      El valor de los datos.


### Valores devueltos

# Swoole\Table::valid

(PECL swoole &gt;= 1.9.0)

Swoole\Table::valid — Verifica si la línea actual es válida.

### Descripción

public **Swoole\Table::valid**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [Swoole\Table::column](#swoole-table.column) — Define el tipo de datos y el tamaño de las columnas.
- [Swoole\Table::\_\_construct](#swoole-table.construct) — Construye una tabla de memoria Swoole de tamaño fijo.
- [Swoole\Table::count](#swoole-table.count) — Cuenta las filas en la tabla, o cuenta todos los elementos en la tabla si $mode = 1.
- [Swoole\Table::create](#swoole-table.create) — Crear la tabla de memoria swoole.
- [Swoole\Table::current](#swoole-table.current) — Devuelve la fila actual.
- [Swoole\Table::decr](#swoole-table.decr) — Disminuye el valor en la tabla Swoole por $key y $column
- [Swoole\Table::del](#swoole-table.del) — Elimina una fila en la tabla Swoole mediante $key
- [Swoole\Table::destroy](#swoole-table.destroy) — Destruye la tabla Swoole.
- [Swoole\Table::exist](#swoole-table.exist) — Verifica si una fila existe por $row_key.
- [Swoole\Table::get](#swoole-table.get) — Devuelve el valor en la tabla Swoole mediante $key y $field.
- [Swoole\Table::incr](#swoole-table.incr) — Incrementa el valor por $key y $column
- [Swoole\Table::key](#swoole-table.key) — Devuelve la clave de la fila actual.
- [Swoole\Table::next](#swoole-table.next) — Iterador de la siguiente fila
- [Swoole\Table::rewind](#swoole-table.rewind) — Reinicializa el iterador.
- [Swoole\Table::set](#swoole-table.set) — Actualiza una línea de la tabla mediante $key.
- [Swoole\Table::valid](#swoole-table.valid) — Verifica si la línea actual es válida.

# La clase Swoole\Timer

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\Timer**

     {


    /* Métodos */

public static [after](#swoole-timer.after)([int](#language.types.integer) $after_time_ms, [callable](#language.types.callable) $callback): [void](language.types.void.html)
public static [clear](#swoole-timer.clear)([int](#language.types.integer) $timer_id): [void](language.types.void.html)
public static [exists](#swoole-timer.exists)([int](#language.types.integer) $timer_id): [bool](#language.types.boolean)
public static [tick](#swoole-timer.tick)([int](#language.types.integer) $interval_ms, [callable](#language.types.callable) $callback, [string](#language.types.string) $param = ?): [void](language.types.void.html)

}

# Swoole\Timer::after

(PECL swoole &gt;= 1.9.0)

Swoole\Timer::after — Dispara una retrollamada después de un período de tiempo.

### Descripción

public static **Swoole\Timer::after**([int](#language.types.integer) $after_time_ms, [callable](#language.types.callable) $callback): [void](language.types.void.html)

    Dispara una retrollamada después de un período de tiempo.

### Parámetros

    after_time_ms









    callback





### Valores devueltos

# Swoole\Timer::clear

(PECL swoole &gt;= 1.9.0)

Swoole\Timer::clear — Elimina un temporizador por ID de temporizador.

### Descripción

public static **Swoole\Timer::clear**([int](#language.types.integer) $timer_id): [void](language.types.void.html)

    Elimina un temporizador por ID de temporizador.

### Parámetros

    timer_id





### Valores devueltos

# Swoole\Timer::exists

(PECL swoole &gt;= 1.9.0)

Swoole\Timer::exists — Verifica si un temporizador existe.

### Descripción

public static **Swoole\Timer::exists**([int](#language.types.integer) $timer_id): [bool](#language.types.boolean)

    Verifica si un temporizador existe.

### Parámetros

    timer_id





### Valores devueltos

# Swoole\Timer::tick

(PECL swoole &gt;= 1.9.0)

Swoole\Timer::tick — Repite una función dada en cada intervalo de tiempo dado.

### Descripción

public static **Swoole\Timer::tick**([int](#language.types.integer) $interval_ms, [callable](#language.types.callable) $callback, [string](#language.types.string) $param = ?): [void](language.types.void.html)

### Parámetros

    interval_ms









    callback









    param





### Valores devueltos

## Tabla de contenidos

- [Swoole\Timer::after](#swoole-timer.after) — Dispara una retrollamada después de un período de tiempo.
- [Swoole\Timer::clear](#swoole-timer.clear) — Elimina un temporizador por ID de temporizador.
- [Swoole\Timer::exists](#swoole-timer.exists) — Verifica si un temporizador existe.
- [Swoole\Timer::tick](#swoole-timer.tick) — Repite una función dada en cada intervalo de tiempo dado.

# La clase Swoole\WebSocket\Frame

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\WebSocket\Frame**

     {


    /* Métodos */

}

# La clase Swoole\WebSocket\Server

(PECL swoole &gt;= 1.9.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Swoole\WebSocket\Server**



      extends
       [Swoole\Http\Server](#class.swoole-http-server)

     {


    /* Métodos */

public [exist](#swoole-websocket-server.exist)([int](#language.types.integer) $fd): [bool](#language.types.boolean)
public [on](#swoole-websocket-server.on)([string](#language.types.string) $event_name, [callable](#language.types.callable) $callback): ReturnType
public static [pack](#swoole-websocket-server.pack)(
    [string](#language.types.string) $data,
    [string](#language.types.string) $opcode = ?,
    [string](#language.types.string) $finish = ?,
    [string](#language.types.string) $mask = ?
): binary
public [push](#swoole-websocket-server.push)(
    [string](#language.types.string) $fd,
    [string](#language.types.string) $data,
    [string](#language.types.string) $opcode = ?,
    [string](#language.types.string) $finish = ?
): [void](language.types.void.html)
public static [unpack](#swoole-websocket-server.unpack)(binary $data): [string](#language.types.string)

    /* Métodos heredados */
    public [Swoole\Http\Server::on](#swoole-http-server.on)([string](#language.types.string) $event_name, [callable](#language.types.callable) $callback): [void](language.types.void.html)

public [Swoole\Http\Server::start](#swoole-http-server.start)(): [void](language.types.void.html)

}

# Swoole\WebSocket\Server::exist

(PECL swoole &gt;= 1.9.0)

Swoole\WebSocket\Server::exist — Verifica si el descriptor de fichero existe.

### Descripción

public **Swoole\WebSocket\Server::exist**([int](#language.types.integer) $fd): [bool](#language.types.boolean)

### Parámetros

    fd





### Valores devueltos

# Swoole\WebSocket\Server::on

(PECL swoole &gt;= 1.9.0)

Swoole\WebSocket\Server::on — Registra la función de retrollamada del evento

### Descripción

public **Swoole\WebSocket\Server::on**([string](#language.types.string) $event_name, [callable](#language.types.callable) $callback): ReturnType

    Registra la función de retrollamada del evento

### Parámetros

    event_name









    callback





### Valores devueltos

# Swoole\WebSocket\Server::pack

(PECL swoole &gt;= 1.9.0)

Swoole\WebSocket\Server::pack — Devuelve un paquete de datos binarios para enviar en una sola trama.

### Descripción

public static **Swoole\WebSocket\Server::pack**(
    [string](#language.types.string) $data,
    [string](#language.types.string) $opcode = ?,
    [string](#language.types.string) $finish = ?,
    [string](#language.types.string) $mask = ?
): binary

### Parámetros

    data









    opcode









    finish









    mask





### Valores devueltos

# Swoole\WebSocket\Server::push

(PECL swoole &gt;= 1.9.0)

Swoole\WebSocket\Server::push — Envía los datos al cliente remoto.

### Descripción

public **Swoole\WebSocket\Server::push**(
    [string](#language.types.string) $fd,
    [string](#language.types.string) $data,
    [string](#language.types.string) $opcode = ?,
    [string](#language.types.string) $finish = ?
): [void](language.types.void.html)

### Parámetros

    fd









    data









    opcode









    finish





### Valores devueltos

# Swoole\WebSocket\Server::unpack

(PECL swoole &gt;= 1.9.0)

Swoole\WebSocket\Server::unpack — Descomprime los datos binarios recibidos del cliente.

### Descripción

public static **Swoole\WebSocket\Server::unpack**(binary $data): [string](#language.types.string)

### Parámetros

    data





### Valores devueltos

## Tabla de contenidos

- [Swoole\WebSocket\Server::exist](#swoole-websocket-server.exist) — Verifica si el descriptor de fichero existe.
- [Swoole\WebSocket\Server::on](#swoole-websocket-server.on) — Registra la función de retrollamada del evento
- [Swoole\WebSocket\Server::pack](#swoole-websocket-server.pack) — Devuelve un paquete de datos binarios para enviar en una sola trama.
- [Swoole\WebSocket\Server::push](#swoole-websocket-server.push) — Envía los datos al cliente remoto.
- [Swoole\WebSocket\Server::unpack](#swoole-websocket-server.unpack) — Descomprime los datos binarios recibidos del cliente.

- [Introducción](#intro.swoole)
- [Instalación/Configuración](#swoole.setup)<li>[Requerimientos](#swoole.requirements)
- [Instalación](#swoole.installation)
- [Configuración en tiempo de ejecución](#swoole.configuration)
  </li>- [Constantes predefinidas](#swoole.constants)
- [Funciones de Swoole](#ref.swoole-funcs)<li>[swoole_async_dns_lookup](#function.swoole-async-dns-lookup) — Busca de manera asíncrona y no bloqueante la dirección IP de un host
- [swoole_async_read](#function.swoole-async-read) — Lee un flujo de fichero de manera asíncrona
- [swoole_async_readfile](#function.swoole-async-readfile) — Lee un fichero de manera asíncrona
- [swoole_async_set](#function.swoole-async-set) — Actualiza las opciones de E/S asíncronas
- [swoole_async_write](#function.swoole-async-write) — Escribe datos en un flujo de fichero de manera asíncrona
- [swoole_async_writefile](#function.swoole-async-writefile) — Escribe datos en un fichero de manera asíncrona
- [swoole_clear_error](#function.swoole-clear-error) — Elimina los errores en el socket o el último código de error
- [swoole_client_select](#function.swoole-client-select) — Devuelve la descripción del fichero listo para ser leído/escrito o un error
- [swoole_cpu_num](#function.swoole-cpu-num) — Devuelve el número de CPU
- [swoole_errno](#function.swoole-errno) — Devuelve el código de error de la última llamada al sistema
- [swoole_error_log](#function.swoole-error-log) — Escribe los mensajes de error en el registro
- [swoole_event_add](#function.swoole-event-add) — Añade una nueva función de retrollamada de un socket en el EventLoop
- [swoole_event_defer](#function.swoole-event-defer) — Añade una retrollamada a la próxima iteración del bucle de eventos
- [swoole_event_del](#function.swoole-event-del) — Elimina todas las funciones de retrollamada de eventos de un socket
- [swoole_event_exit](#function.swoole-event-exit) — Sale del bucle de eventos, disponible únicamente en el lado-cliente
- [swoole_event_set](#function.swoole-event-set) — Actualiza las funciones de retrollamada de eventos de un socket
- [swoole_event_wait](#function.swoole-event-wait) — Inicia el bucle de eventos
- [swoole_event_write](#function.swoole-event-write) — Escribe datos en un socket
- [swoole_get_local_ip](#function.swoole-get-local-ip) — Devuelve las direcciones IP IPv4 de cada NIC en la máquina
- [swoole_last_error](#function.swoole-last-error) — Devuelve el último mensaje de error
- [swoole_load_module](#function.swoole-load-module) — Carga una extensión swoole
- [swoole_select](#function.swoole-select) — Selecciona las descripciones de ficheros listas para leer/escribir o en error en el bucle de eventos
- [swoole_set_process_name](#function.swoole-set-process-name) — Define el nombre del proceso
- [swoole_strerror](#function.swoole-strerror) — Convierte el Errno en mensajes de error
- [swoole_timer_after](#function.swoole-timer-after) — Dispara una retrollamada única en el futuro
- [swoole_timer_exists](#function.swoole-timer-exists) — Devuelve si existe una retrollamada de temporizador
- [swoole_timer_tick](#function.swoole-timer-tick) — Dispara una retrollamada de temporizador por intervalo de tiempo
- [swoole_version](#function.swoole-version) — Devuelve la versión de Swoole
  </li>- [Swoole\Async](#class.swoole-async) — La clase Swoole\Async<li>[Swoole\Async::dnsLookup](#swoole-async.dnslookup) — Busca de manera asíncrona y no bloqueante la dirección IP de un host.
- [Swoole\Async::read](#swoole-async.read) — Lee de manera asíncrona un flujo de fichero.
- [Swoole\Async::readFile](#swoole-async.readfile) — Lee un fichero de manera asíncrona.
- [Swoole\Async::set](#swoole-async.set) — Actualiza las opciones de E/S asíncrona.
- [Swoole\Async::write](#swoole-async.write) — Escribe de manera asíncrona datos en un flujo de fichero.
- [Swoole\Async::writeFile](#swoole-async.writefile) — Descripción
  </li>- [Swoole\Atomic](#class.swoole-atomic) — La clase Swoole\Atomic<li>[Swoole\Atomic::add](#swoole-atomic.add) — Añade un número al valor del objeto atómico.
- [Swoole\Atomic::cmpset](#swoole-atomic.cmpset) — Compara y define el valor del objeto atómico.
- [Swoole\Atomic::\_\_construct](#swoole-atomic.construct) — Construye un nuevo objeto atómico Swoole.
- [Swoole\Atomic::get](#swoole-atomic.get) — Devuelve el valor actual del objeto atómico.
- [Swoole\Atomic::set](#swoole-atomic.set) — Define un nuevo valor para el objeto atómico.
- [Swoole\Atomic::sub](#swoole-atomic.sub) — Sustrae un número del valor del objeto atómico.
  </li>- [Swoole\Buffer](#class.swoole-buffer) — La clase Swoole\Buffer<li>[Swoole\Buffer::append](#swoole-buffer.append) — Añade la string o los datos binarios al final del buffer de memoria y devuelve el nuevo tamaño de la memoria asignada.
- [Swoole\Buffer::clear](#swoole-buffer.clear) — Reinicializa el búfer de memoria.
- [Swoole\Buffer::\_\_construct](#swoole-buffer.construct) — Asignación de bloques de memoria de tamaño fijo.
- [Swoole\Buffer::\_\_destruct](#swoole-buffer.destruct) — Destruye el buffer de memoria Swoole.
- [Swoole\Buffer::expand](#swoole-buffer.expand) — Amplía el tamaño del búfer de memoria.
- [Swoole\Buffer::read](#swoole-buffer.read) — Lee los datos del búfer de memoria en función del desplazamiento y la longitud.
- [Swoole\Buffer::recycle](#swoole-buffer.recycle) — Libera la memoria al SO que no es utilizada por el buffer de memoria.
- [Swoole\Buffer::substr](#swoole-buffer.substr) — Lee los datos del búfer de memoria en función del desplazamiento y la longitud. O elimina los datos del búfer de memoria.
- [Swoole\Buffer::\_\_toString](#swoole-buffer.tostring) — Devuelve el valor de la string del búfer de memoria.
- [Swoole\Buffer::write](#swoole-buffer.write) — Escribe datos en el buffer de memoria. La memoria asignada para el buffer no será modificada.
  </li>- [Swoole\Channel](#class.swoole-channel) — La clase Swoole\Channel<li>[Swoole\Channel::__construct](#swoole-channel.construct) — Construye un canal Swoole
- [Swoole\Channel::\_\_destruct](#swoole-channel.destruct) — Destruye un canal Swoole.
- [Swoole\Channel::pop](#swoole-channel.pop) — Lee y extrae datos del canal swoole.
- [Swoole\Channel::push](#swoole-channel.push) — Escribe y empuja datos en el canal Swoole.
- [Swoole\Channel::stats](#swoole-channel.stats) — Devuelve las estadísticas del canal Swoole.
  </li>- [Swoole\Client](#class.swoole-client) — La clase Swoole\Client<li>[Swoole\Client::close](#swoole-client.close) — Cierra la conexión establecida.
- [Swoole\Client::connect](#swoole-client.connect) — Conecta al puerto TCP o UDP remoto.
- [Swoole\Client::\_\_construct](#swoole-client.construct) — Crea un cliente TCP/UDP síncrono o asíncrono Swoole, con o sin SSL.
- [Swoole\Client::\_\_destruct](#swoole-client.destruct) — Destruye el cliente Swoole.
- [Swoole\Client::getpeername](#swoole-client.getpeername) — Devuelve el nombre del socket remoto de la conexión.
- [Swoole\Client::getsockname](#swoole-client.getsockname) — Devuelve el nombre del socket local de la conexión.
- [Swoole\Client::isConnected](#swoole-client.isconnected) — Verifica si la conexión está establecida.
- [Swoole\Client::on](#swoole-client.on) — Añade funciones de retrollamada desencadenadas por eventos.
- [Swoole\Client::pause](#swoole-client.pause) — Pone en pausa la recepción de datos.
- [Swoole\Client::pipe](#swoole-client.pipe) — Redirige los datos hacia otro descriptor de fichero.
- [Swoole\Client::recv](#swoole-client.recv) — Recibe datos del socket remoto.
- [Swoole\Client::resume](#swoole-client.resume) — Reanuda la recepción de datos.
- [Swoole\Client::send](#swoole-client.send) — Envía datos al socket TCP remoto.
- [Swoole\Client::sendfile](#swoole-client.sendfile) — Envía un fichero al socket TCP remoto.
- [Swoole\Client::sendto](#swoole-client.sendto) — Envía datos a la dirección UDP remota.
- [Swoole\Client::set](#swoole-client.set) — Define los parámetros del cliente Swoole antes de que la conexión sea establecida.
- [Swoole\Client::sleep](#swoole-client.sleep) — Elimina el cliente TCP del bucle de eventos del sistema.
- [Swoole\Client::wakeup](#swoole-client.wakeup) — Añade el cliente TCP al ciclo de eventos del sistema.
  </li>- [Swoole\Connection\Iterator](#class.swoole-connection-iterator) — La clase Swoole\Connection\Iterator<li>[Swoole\Connection\Iterator::count](#swoole-connection-iterator.count) — Cuenta las conexiones.
- [Swoole\Connection\Iterator::current](#swoole-connection-iterator.current) — Devuelve la entrada de conexión actual.
- [Swoole\Connection\Iterator::key](#swoole-connection-iterator.key) — Devuelve la clave de la conexión actual.
- [Swoole\Connection\Iterator::next](#swoole-connection-iterator.next) — Se desplaza hacia la siguiente conexión.
- [Swoole\Connection\Iterator::offsetExists](#swoole-connection-iterator.offsetexists) — Verifica si una posición existe.
- [Swoole\Connection\Iterator::offsetGet](#swoole-connection-iterator.offsetget) — Posición a recuperar.
- [Swoole\Connection\Iterator::offsetSet](#swoole-connection-iterator.offsetset) — Asigna una conexión a la posición especificada.
- [Swoole\Connection\Iterator::offsetUnset](#swoole-connection-iterator.offsetunset) — Elimina una posición.
- [Swoole\Connection\Iterator::rewind](#swoole-connection-iterator.rewind) — Reinicializa el iterador.
- [Swoole\Connection\Iterator::valid](#swoole-connection-iterator.valid) — Verifica si la posición actual es válida.
  </li>- [Swoole\Coroutine](#class.swoole-coroutine) — La clase Swoole\Coroutine<li>[Swoole\Coroutine::call_user_func](#swoole-coroutine.call-user-func) — Llama a una función de retrollamada dada por el primer argumento
- [Swoole\Coroutine::call_user_func_array](#swoole-coroutine.call-user-func-array) — Llama a una función de retrollamada con un array de argumentos
- [Swoole\Coroutine::cli_wait](#swoole-coroutine.cli-wait) — Descripción
- [Swoole\Coroutine::create](#swoole-coroutine.create) — Descripción
- [Swoole\Coroutine::getuid](#swoole-coroutine.getuid) — Descripción
- [Swoole\Coroutine::resume](#swoole-coroutine.resume) — Descripción
- [Swoole\Coroutine::suspend](#swoole-coroutine.suspend) — Descripción
  </li>- [Swoole\Coroutine\Lock](#class.swoole-coroutine-lock) — The Swoole\Coroutine\Lock class<li>[Swoole\Coroutine\Lock::__construct](#swoole-coroutine-lock.construct) — Construye un nuevo bloqueo de corrutina
- [Swoole\Coroutine\Lock::lock](#swoole-coroutine-lock.lock) — Adquirir el bloqueo, bloqueando si es necesario
- [Swoole\Coroutine\Lock::trylock](#swoole-coroutine-lock.trylock) — Intenta adquirir el bloqueo sin bloquear
- [Swoole\Coroutine\Lock::unlock](#swoole-coroutine-lock.unlock) — Liberar el bloqueo
  </li>- [Swoole\Event](#class.swoole-event) — La clase Swoole\Event<li>[Swoole\Event::add](#swoole-event.add) — Añade una nueva función de retrollamada de un socket en la ciclo de eventos.
- [Swoole\Event::defer](#swoole-event.defer) — Añade una retrollamada a la próxima iteración del bucle de eventos.
- [Swoole\Event::del](#swoole-event.del) — Elimina todas las funciones de retrollamada de eventos de un socket.
- [Swoole\Event::exit](#swoole-event.exit) — Sale del bucle de eventos, disponible únicamente en el lado-cliente.
- [Swoole\Event::set](#swoole-event.set) — Actualiza las funciones de retrollamada de eventos de un socket.
- [Swoole\Event::wait](#swoole-event.wait) — Descripción
- [Swoole\Event::write](#swoole-event.write) — Escribe datos en el socket.
  </li>- [Swoole\Exception](#class.swoole-exception) — La clase Swoole\Exception
- [Swoole\Http\Client](#class.swoole-http-client) — La clase Swoole\Http\Client<li>[Swoole\Http\Client::addFile](#swoole-http-client.addfile) — Añade un fichero al formulario de publicación.
- [Swoole\Http\Client::close](#swoole-http-client.close) — Cierra la conexión http.
- [Swoole\Http\Client::\_\_construct](#swoole-http-client.construct) — Construye el cliente HTTP asíncrono.
- [Swoole\Http\Client::\_\_destruct](#swoole-http-client.destruct) — Destruye el cliente HTTP.
- [Swoole\Http\Client::download](#swoole-http-client.download) — Descarga un fichero desde el servidor remoto.
- [Swoole\Http\Client::execute](#swoole-http-client.execute) — Envía la petición HTTP después de haber definido los parámetros.
- [Swoole\Http\Client::get](#swoole-http-client.get) — Envía una petición HTTP GET al servidor remoto.
- [Swoole\Http\Client::isConnected](#swoole-http-client.isconnected) — Verifica si la conexión HTTP está establecida.
- [Swoole\Http\Client::on](#swoole-http-client.on) — Registra una retrollamada por nombre de evento.
- [Swoole\Http\Client::post](#swoole-http-client.post) — Envía una petición HTTP POST al servidor remoto.
- [Swoole\Http\Client::push](#swoole-http-client.push) — Añade datos al cliente websocket.
- [Swoole\Http\Client::set](#swoole-http-client.set) — Actualiza los parámetros del cliente HTTP.
- [Swoole\Http\Client::setCookies](#swoole-http-client.setcookies) — Define las cookies de la petición HTTP.
- [Swoole\Http\Client::setData](#swoole-http-client.setdata) — Define los datos del cuerpo de la petición HTTP.
- [Swoole\Http\Client::setHeaders](#swoole-http-client.setheaders) — Define las cabeceras de la petición HTTP.
- [Swoole\Http\Client::setMethod](#swoole-http-client.setmethod) — Define el método de petición HTTP.
- [Swoole\Http\Client::upgrade](#swoole-http-client.upgrade) — Actualiza al protocolo websocket.
  </li>- [Swoole\Http\Request](#class.swoole-http-request) — La clase Swoole\Http\Request<li>[Swoole\Http\Request::__destruct](#swoole-http-request.destruct) — Destruye la petición HTTP.
- [Swoole\Http\Request::rawcontent](#swoole-http-request.rawcontent) — Devuelve el cuerpo bruto de la petición HTTP.
  </li>- [Swoole\Http\Response](#class.swoole-http-response) — La clase Swoole\Http\Response<li>[Swoole\Http\Response::cookie](#swoole-http-response.cookie) — Define las cookies de la respuesta HTTP.
- [Swoole\Http\Response::\_\_destruct](#swoole-http-response.destruct) — Destruye la respuesta HTTP.
- [Swoole\Http\Response::end](#swoole-http-response.end) — Envía los datos para la petición HTTP y termina la respuesta.
- [Swoole\Http\Response::gzip](#swoole-http-response.gzip) — Activa la compresión gzip del contenido de la respuesta.
- [Swoole\Http\Response::header](#swoole-http-response.header) — Define los encabezados de respuesta HTTP.
- [Swoole\Http\Response::initHeader](#swoole-http-response.initheader) — Inicializa el encabezado de respuesta HTTP.
- [Swoole\Http\Response::rawcookie](#swoole-http-response.rawcookie) — Define los cookies bruts de la respuesta HTTP.
- [Swoole\Http\Response::sendfile](#swoole-http-response.sendfile) — Envía un fichero a través de la respuesta HTTP.
- [Swoole\Http\Response::status](#swoole-http-response.status) — Define el código de estado de la respuesta HTTP.
- [Swoole\Http\Response::write](#swoole-http-response.write) — Añade el contenido del cuerpo HTTP a la respuesta HTTP.
  </li>- [Swoole\Http\Server](#class.swoole-http-server) — La clase Swoole\Http\Server<li>[Swoole\Http\Server::on](#swoole-http-server.on) — Vincula una retrollamada al servidor HTTP por nombre de evento.
- [Swoole\Http\Server::start](#swoole-http-server.start) — Inicia el servidor HTTP swoole.
  </li>- [Swoole\Lock](#class.swoole-lock) — La clase Swoole\Lock<li>[Swoole\Lock::__construct](#swoole-lock.construct) — Construye un bloqueo de memoria.
- [Swoole\Lock::\_\_destruct](#swoole-lock.destruct) — Destruye un bloqueo de memoria Swoole.
- [Swoole\Lock::lock](#swoole-lock.lock) — Intenta adquirir el bloqueo. Bloqueará si el bloqueo no está disponible.
- [Swoole\Lock::lock_read](#swoole-lock.lock-read) — Bloquea un bloqueo de lectura-escritura para la lectura.
- [Swoole\Lock::trylock](#swoole-lock.trylock) — Intenta adquirir el bloqueo y devuelve inmediatamente incluso si el bloqueo no está disponible.
- [Swoole\Lock::trylock_read](#swoole-lock.trylock-read) — Intenta bloquear un bloqueo de lectura-escritura para la lectura y devuelve inmediatamente incluso si el bloqueo no está disponible.
- [Swoole\Lock::unlock](#swoole-lock.unlock) — Libera el bloqueo.
  </li>- [Swoole\Mmap](#class.swoole-mmap) — La clase Swoole\Mmap<li>[Swoole\Mmap::open](#swoole-mmap.open) — Mapea un fichero en memoria y devuelve el recurso de flujo que puede ser utilizado por las operaciones de flujo PHP.
  </li>- [Swoole\MySQL](#class.swoole-mysql) — La clase Swoole\MySQL<li>[Swoole\MySQL::close](#swoole-mysql.close) — Cierra la conexión MySQL asíncrona.
- [Swoole\MySQL::connect](#swoole-mysql.connect) — Conecta al servidor MySQL remoto.
- [Swoole\MySQL::\_\_construct](#swoole-mysql.construct) — Construye un cliente MySQL asíncrono.
- [Swoole\MySQL::\_\_destruct](#swoole-mysql.destruct) — Destruye el cliente MySQL asíncrono.
- [Swoole\MySQL::getBuffer](#swoole-mysql.getbuffer) — Descripción
- [Swoole\MySQL::on](#swoole-mysql.on) — Registra una retrollamada basada en el nombre del evento.
- [Swoole\MySQL::query](#swoole-mysql.query) — Ejecuta la consulta SQL.
  </li>- [Swoole\MySQL\Exception](#class.swoole-mysql-exception) — La clase Swoole\MySQL\Exception
- [Swoole\Process](#class.swoole-process) — La clase Swoole\Process<li>[Swoole\Process::alarm](#swoole-process.alarm) — Temporizador de alta precisión que dispara una señal a intervalo fijo.
- [Swoole\Process::close](#swoole-process.close) — Cierra el tubo hacia el proceso hijo.
- [Swoole\Process::\_\_construct](#swoole-process.construct) — Construye un proceso.
- [Swoole\Process::daemon](#swoole-process.daemon) — Cambia el proceso a un proceso daemon.
- [Swoole\Process::\_\_destruct](#swoole-process.destruct) — Destruye el proceso.
- [Swoole\Process::exec](#swoole-process.exec) — Ejecuta un comando del sistema.
- [Swoole\Process::exit](#swoole-process.exit) — Detiene los procesos hijos.
- [Swoole\Process::freeQueue](#swoole-process.freequeue) — Destruye la cola de mensajes creada por swoole_process::useQueue.
- [Swoole\Process::kill](#swoole-process.kill) — Envía una señal al proceso hijo.
- [Swoole\Process::name](#swoole-process.name) — Define el nombre del proceso.
- [Swoole\Process::pop](#swoole-process.pop) — Lee y extrae datos de la cola de mensajes.
- [Swoole\Process::push](#swoole-process.push) — Escribe y empuja datos en la cola de mensajes.
- [Swoole\Process::read](#swoole-process.read) — Lee los datos enviados al proceso.
- [Swoole\Process::signal](#swoole-process.signal) — Envía un signal a los procesos hijos.
- [Swoole\Process::start](#swoole-process.start) — Inicia el proceso.
- [Swoole\Process::statQueue](#swoole-process.statqueue) — Devuelve las estadísticas de la cola de mensajes utilizada como método de comunicación entre los procesos.
- [Swoole\Process::useQueue](#swoole-process.usequeue) — Crear una cola de mensajes como método de comunicación entre el proceso padre y los procesos hijos.
- [Swoole\Process::wait](#swoole-process.wait) — Espera los eventos de los procesos hijos.
- [Swoole\Process::write](#swoole-process.write) — Escribe datos en el tubo y comunica con el proceso padre o los procesos hijos.
  </li>- [Swoole\Redis\Server](#class.swoole-redis-server) — La clase Swoole\Redis\Server<li>[Swoole\Redis\Server::format](#swoole-redis-server.format) — Descripción
- [Swoole\Redis\Server::setHandler](#swoole-redis-server.sethandler) — Descripción
- [Swoole\Redis\Server::start](#swoole-redis-server.start) — Descripción
  </li>- [Swoole\Runtime](#class.swoole-runtime) — The Swoole\Runtime class<li>[Swoole\Runtime::enableCoroutine](#swoole-runtime.enable-coroutine) — Habilitar corrutinas para funciones específicas
- [Swoole\Runtime::getHookFlags](#swoole-runtime.get-hook-flags) — Obtiene los flags de hook actuales
- [Swoole\Runtime::setHookFlags](#swoole-runtime.set-hook-flags) — Establece los flags de hook para corrutinas
  </li>- [Swoole\Serialize](#class.swoole-serialize) — La clase Swoole\Serialize<li>[Swoole\Serialize::pack](#swoole-serialize.pack) — Serializa los datos.
- [Swoole\Serialize::unpack](#swoole-serialize.unpack) — Deserializa los datos.
  </li>- [Swoole\Server](#class.swoole-server) — La clase Swoole\Server<li>[Swoole\Server::addlistener](#swoole-server.addlistener) — Añade un nuevo observador al servidor.
- [Swoole\Server::addProcess](#swoole-server.addprocess) — Añade un swoole_process definido por el usuario al servidor.
- [Swoole\Server::after](#swoole-server.after) — Dispara una retrollamada después de un período de tiempo.
- [Swoole\Server::bind](#swoole-server.bind) — Vincula la conexión a un identificador de usuario definido por el usuario.
- [Swoole\Server::clearTimer](#swoole-server.cleartimer) — Destruye y detiene un temporizador.
- [Swoole\Server::close](#swoole-server.close) — Cierra una conexión con el cliente.
- [Swoole\Server::confirm](#swoole-server.confirm) — Verifica el estado de la conexión.
- [Swoole\Server::connection_info](#swoole-server.connection-info) — Devuelve la información de conexión por la descripción del fichero.
- [Swoole\Server::connection_list](#swoole-server.connection-list) — Devuelve todas las conexiones establecidas.
- [Swoole\Server::\_\_construct](#swoole-server.construct) — Construye un servidor Swoole.
- [Swoole\Server::defer](#swoole-server.defer) — Retrasa la ejecución de la función de retrollamada al final del ciclo de eventos actual.
- [Swoole\Server::exist](#swoole-server.exist) — Verifica si la conexión existe.
- [Swoole\Server::finish](#swoole-server.finish) — Utilizado en el proceso de tarea para enviar el resultado al proceso de trabajo cuando la tarea está terminada.
- [Swoole\Server::getClientInfo](#swoole-server.getclientinfo) — Devuelve la información de conexión por la descripción del fichero.
- [Swoole\Server::getClientList](#swoole-server.getclientlist) — Devuelve todas las conexiones establecidas.
- [Swoole\Server::getLastError](#swoole-server.getlasterror) — Devuelve el código de error del último error.
- [Swoole\Server::heartbeat](#swoole-server.heartbeat) — Verifica todas las conexiones en el servidor.
- [Swoole\Server::listen](#swoole-server.listen) — Escucha en la IP y el puerto dados, tipo de socket.
- [Swoole\Server::on](#swoole-server.on) — Registra una retrollamada por nombre de evento.
- [Swoole\Server::pause](#swoole-server.pause) — Detiene la recepción de datos de la conexión.
- [Swoole\Server::protect](#swoole-server.protect) — Pone la conexión en modo protegido.
- [Swoole\Server::reload](#swoole-server.reload) — Reinicia todos los procesos de trabajo.
- [Swoole\Server::resume](#swoole-server.resume) — Reanuda la recepción de datos desde la conexión.
- [Swoole\Server::send](#swoole-server.send) — Envía datos al cliente.
- [Swoole\Server::sendfile](#swoole-server.sendfile) — Envía un fichero a la conexión.
- [Swoole\Server::sendMessage](#swoole-server.sendmessage) — Envía un mensaje a los procesos de trabajo por ID.
- [Swoole\Server::sendto](#swoole-server.sendto) — Envía datos a la dirección UDP remota.
- [Swoole\Server::sendwait](#swoole-server.sendwait) — Envía datos al socket remoto de manera bloqueante.
- [Swoole\Server::set](#swoole-server.set) — Define los parámetros de ejecución del servidor swoole.
- [Swoole\Server::shutdown](#swoole-server.shutdown) — Detiene el proceso del servidor maestro, esta función puede ser llamada en los procesos de trabajo.
- [Swoole\Server::start](#swoole-server.start) — Inicia el servidor Swoole.
- [Swoole\Server::stats](#swoole-server.stats) — Devuelve las estadísticas del servidor Swoole.
- [Swoole\Server::stop](#swoole-server.stop) — Detiene el servidor Swoole.
- [Swoole\Server::task](#swoole-server.task) — Envía datos a los procesos de trabajo de tarea.
- [Swoole\Server::taskwait](#swoole-server.taskwait) — Envía datos a los procesos de trabajo de tarea de manera bloqueante.
- [Swoole\Server::taskWaitMulti](#swoole-server.taskwaitmulti) — Ejecuta varias tareas en paralelo.
- [Swoole\Server::tick](#swoole-server.tick) — Repite una función dada a cada intervalo de tiempo dado.
  </li>- [Swoole\Table](#class.swoole-table) — La clase Swoole\Table<li>[Swoole\Table::column](#swoole-table.column) — Define el tipo de datos y el tamaño de las columnas.
- [Swoole\Table::\_\_construct](#swoole-table.construct) — Construye una tabla de memoria Swoole de tamaño fijo.
- [Swoole\Table::count](#swoole-table.count) — Cuenta las filas en la tabla, o cuenta todos los elementos en la tabla si $mode = 1.
- [Swoole\Table::create](#swoole-table.create) — Crear la tabla de memoria swoole.
- [Swoole\Table::current](#swoole-table.current) — Devuelve la fila actual.
- [Swoole\Table::decr](#swoole-table.decr) — Disminuye el valor en la tabla Swoole por $key y $column
- [Swoole\Table::del](#swoole-table.del) — Elimina una fila en la tabla Swoole mediante $key
- [Swoole\Table::destroy](#swoole-table.destroy) — Destruye la tabla Swoole.
- [Swoole\Table::exist](#swoole-table.exist) — Verifica si una fila existe por $row_key.
- [Swoole\Table::get](#swoole-table.get) — Devuelve el valor en la tabla Swoole mediante $key y $field.
- [Swoole\Table::incr](#swoole-table.incr) — Incrementa el valor por $key y $column
- [Swoole\Table::key](#swoole-table.key) — Devuelve la clave de la fila actual.
- [Swoole\Table::next](#swoole-table.next) — Iterador de la siguiente fila
- [Swoole\Table::rewind](#swoole-table.rewind) — Reinicializa el iterador.
- [Swoole\Table::set](#swoole-table.set) — Actualiza una línea de la tabla mediante $key.
- [Swoole\Table::valid](#swoole-table.valid) — Verifica si la línea actual es válida.
  </li>- [Swoole\Timer](#class.swoole-timer) — La clase Swoole\Timer<li>[Swoole\Timer::after](#swoole-timer.after) — Dispara una retrollamada después de un período de tiempo.
- [Swoole\Timer::clear](#swoole-timer.clear) — Elimina un temporizador por ID de temporizador.
- [Swoole\Timer::exists](#swoole-timer.exists) — Verifica si un temporizador existe.
- [Swoole\Timer::tick](#swoole-timer.tick) — Repite una función dada en cada intervalo de tiempo dado.
  </li>- [Swoole\WebSocket\Frame](#class.swoole-websocket-frame) — La clase Swoole\WebSocket\Frame
- [Swoole\WebSocket\Server](#class.swoole-websocket-server) — La clase Swoole\WebSocket\Server<li>[Swoole\WebSocket\Server::exist](#swoole-websocket-server.exist) — Verifica si el descriptor de fichero existe.
- [Swoole\WebSocket\Server::on](#swoole-websocket-server.on) — Registra la función de retrollamada del evento
- [Swoole\WebSocket\Server::pack](#swoole-websocket-server.pack) — Devuelve un paquete de datos binarios para enviar en una sola trama.
- [Swoole\WebSocket\Server::push](#swoole-websocket-server.push) — Envía los datos al cliente remoto.
- [Swoole\WebSocket\Server::unpack](#swoole-websocket-server.unpack) — Descomprime los datos binarios recibidos del cliente.
  </li>
