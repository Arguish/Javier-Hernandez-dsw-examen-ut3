# Flujos

# Introducción

    Los flujos ("streams" en inglés) son un método de
    generalización de los ficheros, sockets,
    conexiones de red, datos comprimidos y otras operaciones similares,
    que comparten operaciones comunes. En su definición más simple,
    un flujo es un recurso que
    presenta capacidades de flujo: es decir, que estos objetos pueden
    ser leídos o recibir escrituras de manera lineal, y disponen también
    de medios para acceder a una posición arbitraria en el flujo.




    Un gestor (literalmente,
    wrapper en inglés), es una función que indica cómo se comporta el flujo específicamente. Es el caso del gestor
    http, que sabe cómo traducir una URL en una
    petición HTTP/1.0 a un servidor remoto.
    Existen numerosos gestores integrados en PHP
    por defecto (ver [Protocolos y Envolturas soportados](#wrappers)),
    y, además, gestores específicos pueden ser añadidos en
    los scripts PHP con la función [stream_register_wrapper()](#function.stream-register-wrapper),
    o bien directamente por otra extensión.
    Gracias a la flexibilidad de los gestores que pueden ser añadidos a PHP,
    no hay límites a las posibilidades ofrecidas. Para conocer la lista
    de los gestores actualmente registrados, se puede utilizar la función
    [stream_get_wrappers()](#function.stream-get-wrappers).




    Un flujo se referencia como:
    scheme://target



     -

       scheme (string) -
       El nombre del gestor a utilizar. Por ejemplo, file,
       http, https,
       ftp, ftps, compress.zlib,
       compress.bz y php.
       Ver [Protocolos y Envolturas soportados](#wrappers)
       para una lista completa de los gestores registrados de PHP.
       Si ningún gestor es especificado, se utiliza la función por defecto (típicamente,
       file://).



     -

       target -
       Depende del gestor utilizado. Para los flujos relativos a los sistemas
       de ficheros, es típicamente una ruta y un nombre de fichero del
       fichero deseado. Para los flujos relativos a las redes, es
       típicamente el nombre de host, a menudo con una ruta añadida.
       Ver también [Protocolos y Envolturas soportados](#wrappers)
       para una descripción de los objetivos de los flujos integrados.



# Instalación/Configuración

## Tabla de contenidos

- [Clases Stream](#stream.resources)

    ## Clases Stream

    Los gestores personalizados pueden ser registrados mediante la función
    [stream_register_wrapper()](#function.stream-register-wrapper), utilizando la definición de
    clase descrita en este manual.

    La clase [php_user_filter](#class.php-user-filter) está predefinida. Es una clase abstracta
    para ser utilizada con los filtros personalizados. Consulte el manual de la función
    **stream_register_filter()** para obtener más detalles sobre las
    implementaciones de filtros de usuario.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

**
Opciones disponibles para el flags de
[stream_socket_client()](#function.stream-socket-client)
**

    **[STREAM_CLIENT_ASYNC_CONNECT](#constant.stream-client-async-connect)**
    ([int](#language.types.integer))



     Abre el socket cliente de manera asíncrona.
     Esta opción debe utilizarse con el flag
     **[STREAM_CLIENT_CONNECT](#constant.stream-client-connect)**.





    **[STREAM_CLIENT_CONNECT](#constant.stream-client-connect)**
    ([int](#language.types.integer))



     Abre la conexión del socket cliente.
     Los sockets cliente deben incluir siempre este flag.





    **[STREAM_CLIENT_PERSISTENT](#constant.stream-client-persistent)**
    ([int](#language.types.integer))



     El socket cliente debe permanecer persistente entre las cargas de página.

**
Flags disponibles para el parámetro flags de la función
[stream_socket_server()](#function.stream-socket-server).
**

    **[STREAM_SERVER_BIND](#constant.stream-server-bind)**
    ([int](#language.types.integer))



     Indica que un flujo debe enlazarse al objetivo especificado.
     Los sockets servidor deben incluir siempre este flag.





    **[STREAM_SERVER_LISTEN](#constant.stream-server-listen)**
    ([int](#language.types.integer))



     Indica que un flujo enlazado con el flag
     **[STREAM_SERVER_BIND](#constant.stream-server-bind)** debe comenzar a escuchar el socket.
     Los transportes orientados a conexión (como TCP) deben utilizar este flag,
     de lo contrario el socket servidor no se activará.
     Utilizar este flag para transportes sin conexión (como UDP) es un error.

**
Valores para el parámetro mode de
[stream_socket_shutdown()](#function.stream-socket-shutdown)
**

    **[STREAM_SHUT_RD](#constant.stream-shut-rd)**
    ([int](#language.types.integer))



     Desactivar las recepciones adicionales.





    **[STREAM_SHUT_WR](#constant.stream-shut-wr)**
    ([int](#language.types.integer))



     Desactivar las transmisiones adicionales.





    **[STREAM_SHUT_RDWR](#constant.stream-shut-rdwr)**
    ([int](#language.types.integer))



     Desactivar las recepciones y transmisiones adicionales.

**Flags de transferencia de socket de flujo**

Estas constantes se utilizan para el parámetro flags
de las funciones [stream_socket_recvfrom()](#function.stream-socket-recvfrom) y
[stream_socket_sendto()](#function.stream-socket-sendto).

    **[STREAM_OOB](#constant.stream-oob)**
    ([int](#language.types.integer))



     Procesa los datos OOB (fuera de banda).





    **[STREAM_PEEK](#constant.stream-peek)**
    ([int](#language.types.integer))



     Recupera los datos del socket, pero sin consumir el búfer.


     Las llamadas siguientes a [fread()](#function.fread) o
     [stream_socket_recvfrom()](#function.stream-socket-recvfrom) verán los mismos datos.

    **Nota**:

      No es un flag válido para [stream_socket_sendto()](#function.stream-socket-sendto).


**Constantes de filtro de flujo**

Estas constantes se utilizan para las funciones
[stream_filter_append()](#function.stream-filter-append) y
[stream_filter_prepend()](#function.stream-filter-prepend).

    **[STREAM_FILTER_READ](#constant.stream-filter-read)**
    ([int](#language.types.integer))



     Indica que el filtro especificado debe aplicarse únicamente durante la
     *lectura*.





    **[STREAM_FILTER_WRITE](#constant.stream-filter-write)**
    ([int](#language.types.integer))



     Indica que el filtro especificado debe aplicarse únicamente durante la
     *escritura*.





    **[STREAM_FILTER_ALL](#constant.stream-filter-all)**
    ([int](#language.types.integer))



     Equivalente a STREAM_FILTER_READ | STREAM_FILTER_WRITE.

**
Métodos Crypto de Flujo
**

     **[STREAM_CRYPTO_METHOD_ANY_CLIENT](#constant.stream-crypto-method-any-client)**
     ([int](#language.types.integer))



      Cualquier versión de TLS o SSL en un flujo cliente.





     **[STREAM_CRYPTO_METHOD_SSLv2_CLIENT](#constant.stream-crypto-method-sslv2-client)**
     ([int](#language.types.integer))



      SSL 2 en un flujo cliente.





     **[STREAM_CRYPTO_METHOD_SSLv3_CLIENT](#constant.stream-crypto-method-sslv3-client)**
     ([int](#language.types.integer))



      SSL 3 en un flujo cliente.





     **[STREAM_CRYPTO_METHOD_SSLv23_CLIENT](#constant.stream-crypto-method-sslv23-client)**
     ([int](#language.types.integer))



      TLS 1.0, 1.1 o 1.2 en un flujo cliente.





     **[STREAM_CRYPTO_METHOD_TLS_CLIENT](#constant.stream-crypto-method-tls-client)**
     ([int](#language.types.integer))



      Cualquier versión de TLS en un flujo cliente.





     **[STREAM_CRYPTO_METHOD_TLSv1_0_CLIENT](#constant.stream-crypto-method-tlsv1-0-client)**
     ([int](#language.types.integer))



      TLS 1.0 en un flujo cliente.





     **[STREAM_CRYPTO_METHOD_TLSv1_1_CLIENT](#constant.stream-crypto-method-tlsv1-1-client)**
     ([int](#language.types.integer))



      TLS 1.1 en un flujo cliente.





     **[STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT](#constant.stream-crypto-method-tlsv1-2-client)**
     ([int](#language.types.integer))



      TLS 1.2 en un flujo cliente.





     **[STREAM_CRYPTO_METHOD_TLSv1_3_CLIENT](#constant.stream-crypto-method-tlsv1-3-client)**
     ([int](#language.types.integer))



      TLS 1.3 en un flujo cliente.





     **[STREAM_CRYPTO_METHOD_ANY_SERVER](#constant.stream-crypto-method-any-server)**
     ([int](#language.types.integer))



      Cualquier versión de TLS o SSL en un flujo servidor.





     **[STREAM_CRYPTO_METHOD_SSLv2_SERVER](#constant.stream-crypto-method-sslv2-server)**
     ([int](#language.types.integer))



      SSL 2 en un flujo servidor.





     **[STREAM_CRYPTO_METHOD_SSLv3_SERVER](#constant.stream-crypto-method-sslv3-server)**
     ([int](#language.types.integer))



      SSL 3 en un flujo servidor.





     **[STREAM_CRYPTO_METHOD_SSLv23_SERVER](#constant.stream-crypto-method-sslv23-server)**
     ([int](#language.types.integer))



      TLS 1.0, 1.1 o 1.2 en un flujo servidor.





     **[STREAM_CRYPTO_METHOD_TLS_SERVER](#constant.stream-crypto-method-tls-server)**
     ([int](#language.types.integer))



      Cualquier versión de TLS en un flujo servidor.





     **[STREAM_CRYPTO_METHOD_TLSv1_0_SERVER](#constant.stream-crypto-method-tlsv1-0-server)**
     ([int](#language.types.integer))



      TLS 1.0 en un flujo servidor.





     **[STREAM_CRYPTO_METHOD_TLSv1_1_SERVER](#constant.stream-crypto-method-tlsv1-1-server)**
     ([int](#language.types.integer))



      TLS 1.1 en un flujo servidor.





     **[STREAM_CRYPTO_METHOD_TLSv1_2_SERVER](#constant.stream-crypto-method-tlsv1-2-server)**
     ([int](#language.types.integer))



      TLS 1.2 en un flujo servidor.





     **[STREAM_CRYPTO_METHOD_TLSv1_3_SERVER](#constant.stream-crypto-method-tlsv1-3-server)**
     ([int](#language.types.integer))



      TLS 1.3 en un flujo servidor.





     **[STREAM_CRYPTO_PROTO_SSLv3](#constant.stream-crypto-proto-sslv3)**
     ([int](#language.types.integer))



      Alias de **[STREAM_CRYPTO_METHOD_SSLv3_SERVER](#constant.stream-crypto-method-sslv3-server)**.





     **[STREAM_CRYPTO_PROTO_TLSv1_0](#constant.stream-crypto-proto-tlsv1-0)**
     ([int](#language.types.integer))



      Alias de **[STREAM_CRYPTO_METHOD_TLSv1_0_SERVER](#constant.stream-crypto-method-tlsv1-0-server)**.





     **[STREAM_CRYPTO_PROTO_TLSv1_1](#constant.stream-crypto-proto-tlsv1-1)**
     ([int](#language.types.integer))



      Alias de **[STREAM_CRYPTO_METHOD_TLSv1_1_SERVER](#constant.stream-crypto-method-tlsv1-1-server)**.





     **[STREAM_CRYPTO_PROTO_TLSv1_2](#constant.stream-crypto-proto-tlsv1-2)**
     ([int](#language.types.integer))



      Alias de **[STREAM_CRYPTO_METHOD_TLSv1_2_SERVER](#constant.stream-crypto-method-tlsv1-2-server)**.





     **[STREAM_CRYPTO_PROTO_TLSv1_3](#constant.stream-crypto-proto-tlsv1-3)**
     ([int](#language.types.integer))



      Alias de **[STREAM_CRYPTO_METHOD_TLSv1_3_SERVER](#constant.stream-crypto-method-tlsv1-3-server)**.


**
Constantes internas no utilizadas
**

     **[STREAM_MUST_SEEK](#constant.stream-must-seek)**
     ([int](#language.types.integer))



      Asegura que el flujo sea accesible en lectura/escritura.
      Esto puede provocar la creación de una copia del flujo.





     **[STREAM_IGNORE_URL](#constant.stream-ignore-url)**
     ([int](#language.types.integer))



      No utilizar los wrappers de complementos.


###

    Constantes utilizadas con [stream_socket_pair()](#function.stream-socket-pair)

**Nota**:

     No todas las constantes están necesariamente disponibles en un sistema dado.





    **
     Constantes para el parámetro domain
    **


      **[STREAM_PF_INET](#constant.stream-pf-inet)**
      ([int](#language.types.integer))



       Protocolo de Internet Versión 4 (IPv4).





      **[STREAM_PF_INET6](#constant.stream-pf-inet6)**
      ([int](#language.types.integer))



       Protocolo de Internet Versión 6 (IPv6).





      **[STREAM_PF_UNIX](#constant.stream-pf-unix)**
      ([int](#language.types.integer))



       Protocolos internos del sistema Unix.






    **
     Constantes para el parámetro type
    **


      **[STREAM_SOCK_DGRAM](#constant.stream-sock-dgram)**
      ([int](#language.types.integer))



       Proporciona datagramas, que son mensajes sin conexión.
       Por ejemplo: UDP.





      **[STREAM_SOCK_RAW](#constant.stream-sock-raw)**
      ([int](#language.types.integer))



       Proporciona un socket crudo, dando acceso a los protocolos
       e interfaces de red internas.
       Generalmente, este tipo de socket está reservado para el usuario root.





      **[STREAM_SOCK_RDM](#constant.stream-sock-rdm)**
      ([int](#language.types.integer))



       Proporciona un socket RDM (mensajes entregados de manera confiable).





      **[STREAM_SOCK_SEQPACKET](#constant.stream-sock-seqpacket)**
      ([int](#language.types.integer))



       Proporciona un socket de flujo de paquetes secuenciados.





      **[STREAM_SOCK_STREAM](#constant.stream-sock-stream)**
      ([int](#language.types.integer))



       Proporciona flujos bidireccionales secuenciados con un mecanismo de
       transmisión para los datos fuera de banda.
       Por ejemplo: TCP.






    **
     Constantes para el parámetro protocol
    **


      **[STREAM_IPPROTO_ICMP](#constant.stream-ipproto-icmp)**
      ([int](#language.types.integer))



       Proporciona un socket ICMP.





      **[STREAM_IPPROTO_IP](#constant.stream-ipproto-ip)**
      ([int](#language.types.integer))



       Proporciona un socket IP.





      **[STREAM_IPPROTO_RAW](#constant.stream-ipproto-raw)**
      ([int](#language.types.integer))



       Proporciona un socket RAW.





      **[STREAM_IPPROTO_TCP](#constant.stream-ipproto-tcp)**
      ([int](#language.types.integer))



       Proporciona un socket TCP.





      **[STREAM_IPPROTO_UDP](#constant.stream-ipproto-udp)**
      ([int](#language.types.integer))



       Proporciona un socket UDP.



###

    Constantes utilizadas con [stream_notification_callback()](#function.stream-notification-callback)



    **
     Valores para el parámetro notification_code
    **



      **[STREAM_NOTIFY_RESOLVE](#constant.stream-notify-resolve)**
      ([int](#language.types.integer))



       Una dirección remota requerida para este flujo ha sido resuelta,
       o la resolución ha fallado.


       Consulte severity para saber qué ha ocurrido.

      **Advertencia**

        El soporte para este código de notificación aún no está implementado.








      **[STREAM_NOTIFY_CONNECT](#constant.stream-notify-connect)**
      ([int](#language.types.integer))



       Se ha establecido una conexión con un recurso externo.





      **[STREAM_NOTIFY_AUTH_REQUIRED](#constant.stream-notify-auth-required)**
      ([int](#language.types.integer))



       Se requiere autorización adicional para acceder al recurso especificado.


       Normalmente emitido con un nivel severity de
       **[STREAM_NOTIFY_SEVERITY_ERR](#constant.stream-notify-severity-err)**.





      **[STREAM_NOTIFY_MIME_TYPE_IS](#constant.stream-notify-mime-type-is)**
      ([int](#language.types.integer))



       Se ha identificado el tipo MIME del recurso.


       Consulte message para una descripción del tipo descubierto.





      **[STREAM_NOTIFY_FILE_SIZE_IS](#constant.stream-notify-file-size-is)**
      ([int](#language.types.integer))



       Se ha descubierto el tamaño del recurso.





      **[STREAM_NOTIFY_REDIRECTED](#constant.stream-notify-redirected)**
      ([int](#language.types.integer))



       El recurso externo ha redirigido el flujo a otra ubicación.


       Consulte message.





      **[STREAM_NOTIFY_PROGRESS](#constant.stream-notify-progress)**
      ([int](#language.types.integer))



       Indica el progreso actual de la transferencia de flujo en
       bytes_transferred y eventualmente
       bytes_max también.





      **[STREAM_NOTIFY_COMPLETED](#constant.stream-notify-completed)**
      ([int](#language.types.integer))



       No hay datos adicionales disponibles en el flujo.
       (Implementado por primera vez a partir de PHP 8.3.0.)





      **[STREAM_NOTIFY_FAILURE](#constant.stream-notify-failure)**
      ([int](#language.types.integer))



       Ha ocurrido un error genérico en el flujo.


       Consulte message y
       message_code para más detalles.





      **[STREAM_NOTIFY_AUTH_RESULT](#constant.stream-notify-auth-result)**
      ([int](#language.types.integer))



       La autorización ha sido completada (con o sin éxito).






    **
     Valores para el parámetro severity
    **



      **[STREAM_NOTIFY_SEVERITY_INFO](#constant.stream-notify-severity-info)**
      ([int](#language.types.integer))



       Notificación normal, sin relación con un error.





      **[STREAM_NOTIFY_SEVERITY_WARN](#constant.stream-notify-severity-warn)**
      ([int](#language.types.integer))



       Condición de error no crítica.
       El procesamiento puede continuar.





      **[STREAM_NOTIFY_SEVERITY_ERR](#constant.stream-notify-severity-err)**
      ([int](#language.types.integer))



       Ha ocurrido un error crítico.
       El procesamiento no puede continuar.



### Constantes relacionadas con [streamWrapper](#class.streamwrapper)

    **
     Flags válidos para [stream_wrapper_register()](#function.stream-wrapper-register)
    **



      **[STREAM_IS_URL](#constant.stream-is-url)**
      ([int](#language.types.integer))



       Indica que el protocolo de la interfaz de flujo es un
       protocolo URL.






    **
     Valores para el parámetro cast_as de
     [streamWrapper::stream_cast()](#streamwrapper.stream-cast)
    **



      **[STREAM_CAST_FOR_SELECT](#constant.stream-cast-for-select)**
      ([int](#language.types.integer))



       Indica que [streamWrapper::stream_cast()](#streamwrapper.stream-cast)
       ha sido llamado por **streamWrapper::stream_select()**.





      **[STREAM_CAST_AS_STREAM](#constant.stream-cast-as-stream)**
      ([int](#language.types.integer))



       Indica que [streamWrapper::stream_cast()](#streamwrapper.stream-cast)
       ha sido llamado por un método distinto de
       **streamWrapper::stream_select()**.






    **
     Valores para el parámetro option de
     [streamWrapper::stream_metadata()](#streamwrapper.stream-metadata)
    **



      **[STREAM_META_TOUCH](#constant.stream-meta-touch)**
      ([int](#language.types.integer))



       Indica una llamada a [touch()](#function.touch).





      **[STREAM_META_OWNER](#constant.stream-meta-owner)**
      ([int](#language.types.integer))



       Indica una llamada a [chown()](#function.chown).





      **[STREAM_META_OWNER_NAME](#constant.stream-meta-owner-name)**
      ([int](#language.types.integer))



       Indica una llamada a [chown()](#function.chown).





      **[STREAM_META_GROUP](#constant.stream-meta-group)**
      ([int](#language.types.integer))



       Indica una llamada a [chgrp()](#function.chgrp).





      **[STREAM_META_GROUP_NAME](#constant.stream-meta-group-name)**
      ([int](#language.types.integer))



       Indica una llamada a [chgrp()](#function.chgrp).





      **[STREAM_META_ACCESS](#constant.stream-meta-access)**
      ([int](#language.types.integer))



       Indica una llamada a [chmod()](#function.chmod).






    **
     Flags válidos para
     [streamWrapper::mkdir()](#streamwrapper.mkdir)
     y
     [streamWrapper::rmdir()](#streamwrapper.rmdir)
    **



      **[STREAM_MKDIR_RECURSIVE](#constant.stream-mkdir-recursive)**
      ([int](#language.types.integer))



       Flag recursivo para los parámetros de opciones de
       [mkdir()](#function.mkdir) y [rmdir()](#function.rmdir).






    **
     Valores para el parámetro options de
     [streamWrapper::stream_open()](#streamwrapper.stream-open)
    **



      **[STREAM_USE_PATH](#constant.stream-use-path)**
      ([int](#language.types.integer))



       Flag que indica que las rutas relativas deben utilizar la ruta de inclusión para
       localizar el recurso.





      **[STREAM_REPORT_ERRORS](#constant.stream-report-errors)**
      ([int](#language.types.integer))



       Flag que indica que la interfaz de flujo debe reportar errores.
       Si el flag no está definido, no se debe reportar ningún error.


       Los errores generalmente se reportan mediante el uso de la
       función [trigger_error()](#function.trigger-error).






    **
     Valores para el parámetro option de
     [streamWrapper::stream_set_option()](#streamwrapper.stream-set-option)
    **



      **[STREAM_OPTION_BLOCKING](#constant.stream-option-blocking)**
      ([int](#language.types.integer))



       Establece el modo de bloqueo/no bloqueo en un flujo.





      **[STREAM_OPTION_READ_BUFFER](#constant.stream-option-read-buffer)**
      ([int](#language.types.integer))



       Establece el búfer de lectura en un flujo.


       **
        Valores de opción válidos
       **


         **[STREAM_BUFFER_NONE](#constant.stream-buffer-none)**
         ([int](#language.types.integer))



          Sin búfer.





         **[STREAM_BUFFER_LINE](#constant.stream-buffer-line)**
         ([int](#language.types.integer))



          Búfer por línea.





         **[STREAM_BUFFER_FULL](#constant.stream-buffer-full)**
         ([int](#language.types.integer))



          Búfer completo.








      **[STREAM_OPTION_READ_TIMEOUT](#constant.stream-option-read-timeout)**
      ([int](#language.types.integer))



       Establece el tiempo de espera de lectura en un flujo.





      **[STREAM_OPTION_WRITE_BUFFER](#constant.stream-option-write-buffer)**
      ([int](#language.types.integer))



       Establece el búfer de escritura en un flujo.


       Ver **[STREAM_OPTION_READ_BUFFER](#constant.stream-option-read-buffer)**
       para las opciones de búfer válidas.






    **
     Valores para el parámetro flags de
     [streamWrapper::url_stat()](#streamwrapper.url-stat)
    **



      **[STREAM_URL_STAT_LINK](#constant.stream-url-stat-link)**
      ([int](#language.types.integer))



       Solo se debe devolver información sobre el enlace en sí,
       y no sobre el recurso apuntado por el enlace.





      **[STREAM_URL_STAT_QUIET](#constant.stream-url-stat-quiet)**
      ([int](#language.types.integer))



       La interfaz de flujo no debe generar errores.



### Constantes relacionadas con [php_user_filter](#class.php-user-filter)

    **
     Valores de retorno válidos para
     [php_user_filter::filter()](#php-user-filter.filter)
    **



      **[PSFS_PASS_ON](#constant.psfs-pass-on)**
      ([int](#language.types.integer))



       Valor de retorno que indica que el filtro de usuario
       ha devuelto cubos en $out.





      **[PSFS_FEED_ME](#constant.psfs-feed-me)**
      ([int](#language.types.integer))



       Valor de retorno que indica que el filtro de usuario
       no ha devuelto cubos en $out.
       (es decir, no hay datos disponibles).





      **[PSFS_ERR_FATAL](#constant.psfs-err-fatal)**
      ([int](#language.types.integer))



       Valor de retorno que indica que el filtro de usuario
       ha encontrado un error irrecuperable.
       (es decir, datos no válidos recibidos).






    **
     Constantes internas no utilizadas
    **



      **[PSFS_FLAG_NORMAL](#constant.psfs-flag-normal)**
      ([int](#language.types.integer))



       Lectura/escritura normal.





      **[PSFS_FLAG_FLUSH_INC](#constant.psfs-flag-flush-inc)**
      ([int](#language.types.integer))



       Un vaciado incremental.





      **[PSFS_FLAG_FLUSH_CLOSE](#constant.psfs-flag-flush-close)**
      ([int](#language.types.integer))



       Vaciado final antes del cierre.



# Filtros de Flujos

Un filtro es una pieza final de código que puede realizar
operaciones sobre información que está siendo leída o escrita en un flujo.
Se puede apilar cualquier número de filtros en un flujo. Los filtros
personalizados se pueden definir en un script de PHP usando
[stream_filter_register()](#function.stream-filter-register) o en una extensión.
Para acceder a la lista de los filtros
actualmente registrados, use [stream_get_filters()](#function.stream-get-filters).

# Contextos de Flujos

Un contexto es un conjunto de parámetros y
opciones específicas de envolturas que modifican o mejoran el
comportamiento de un flujo. Los contextos se crean usando
[stream_context_create()](#function.stream-context-create) y se pueden pasar a la mayoría
de las funciones de creación de flujos relacionados con sistemas de archivos (esto es, [fopen()](#function.fopen),
[file()](#function.file), [file_get_contents()](#function.file-get-contents), etc...).

Se pueden especificar opciones cuando se llama a
[stream_context_create()](#function.stream-context-create), o después, usando
[stream_context_set_option()](#function.stream-context-set-option).
Una lista de opciones específicas de envolturas se puede encontrar en el
capítulo [Opciones y parámetros de contexto](#context).

Se pueden especificar parámetros para los
contextos usando la función
[stream_context_set_params()](#function.stream-context-set-params).

# Errores de Flujos

Como con cualquier función relacionada con un archivo o con un socket, una operación sobre un flujo
puede fallar por varias razones normales (esto es: Incapaz de conectarse al host
remoto, archivo no encontrado, etc...). Una llamada relacionada con un flujo puede también fallar
porque el flujo no está registrado en el sistema en ejecución. Véase la matriz devuelta
por [stream_get_wrappers()](#function.stream-get-wrappers) para una lista de los flujos soportados por su
instalación de PHP. Como con la mayoría de la funciones internas de PHP,
si ocurre un error se generará un mensaje **[E_WARNING](#constant.e-warning)**
describiendo la naturaleza del error.

# Ejemplos

## Tabla de contenidos

- [Ejemplo de clase registrada como envoltura de flujo](#stream.streamwrapper.example-1)

    **Ejemplo #1 Usar [file_get_contents()](#function.file-get-contents)
    para recuperar información desde múltiples fuentes**

&lt;?php
/_ Leer un archivo local desde /home/bar _/
$archivolocal = file_get_contents("/home/bar/foo.txt");

/_ Igual que arriba, explícitamente nombrando el protocolo FILE _/
$archivolocal = file_get_contents("file:///home/bar/foo.txt");

/_ Leer un archivo remoto desde www.example.com usando HTTP _/
$archivohttp = file_get_contents("http://www.example.com/foo.txt");

/_ Leer un archivo remoto desde www.example.com usando HTTPS _/
$archivohttps = file_get_contents("https://www.example.com/foo.txt");

/_ Leer un archivo remoto desde ftp.example.com usando FTP _/
$archivoftp = file_get_contents("ftp://user:pass@ftp.example.com/foo.txt");

/_ Leer un archivo remoto desde ftp.example.com usando FTPS _/
$archivoftps = file_get_contents("ftps://user:pass@ftp.example.com/foo.txt");
?&gt;

**Ejemplo #2 Hacer una petición POST a un servidor https**

&lt;?php
/\* Enviar una petición POST a https://secure.example.com/form_action.php

- Incluir los elementos de formulario llamados "foo" y "bar" con valores sin importancia
  \*/

$sock = fsockopen("ssl://secure.example.com", 443, $errno, $errstr, 30);
if (!$sock) die("$errstr ($errno)\n");

$data = "foo=" . urlencode("Valor para Foo") . "&amp;bar=" . urlencode("Valor para Bar");

fwrite($sock, "POST /form_action.php HTTP/1.0\r\n");
fwrite($sock, "Host: secure.example.com\r\n");
fwrite($sock, "Content-type: application/x-www-form-urlencoded\r\n");
fwrite($sock, "Content-length: " . strlen($data) . "\r\n");
fwrite($sock, "Accept: _/_\r\n");
fwrite($sock, "\r\n");
fwrite($sock, $data);

$headers = "";
while ($str = trim(fgets($sock, 4096)))
$headers .= "$str\n";

echo "\n";

$body = "";
while (!feof($sock))
$body .= fgets($sock, 4096);

fclose($sock);
?&gt;

**Ejemplo #3 Escribir información en un archivo compirmido**

&lt;?php
/\* Crear un archivo comprimido que contiene una cadena arbitraria

- El archivo se puede volver a leer usando el flujo compress.zlib o
- descomprimiéndolo desde la línea de comandos usando 'gzip -d foo-bar.txt.gz'
  \*/
  $fp = fopen("compress.zlib://foo-bar.txt.gz", "wb");
if (!$fp) die("No se puede crear el archivo.");

fwrite($fp, "Esto es una prueba.\n");

fclose($fp);
?&gt;

## Ejemplo de clase registrada como envoltura de flujo

El ejemplo de abajo implementa un gestor de protocolo var:// que permite
el acceso a la lectura/escritura de una variable global nominada usando un flujo de sistema de
archivos estándar tal como [fread()](#function.fread). El protocolo var://
implementado abajo, dada la URL "var://foo", leerá/escribirá información
hacia/desde $GLOBALS["foo"].

    **Ejemplo #1 Un Flujo para leer/escribir variables globales**

&lt;?php

class FlujoVariable {
var $posición;
var $nombre;

    function stream_open($ruta, $modo, $opciones, &amp;$ruta_abierta)
    {
        $url = parse_url($ruta);
        $this-&gt;nombre = $url["host"];
        $this-&gt;posición = 0;

        return true;
    }

    function stream_read($cuenta)
    {
        $ret = substr($GLOBALS[$this-&gt;nombre], $this-&gt;posición, $cuenta);
        $this-&gt;posición += strlen($ret);
        return $ret;
    }

    function stream_write($data)
    {
        $izquierda = substr($GLOBALS[$this-&gt;nombre], 0, $this-&gt;posición);
        $derecha = substr($GLOBALS[$this-&gt;nombre], $this-&gt;posición + strlen($data));
        $GLOBALS[$this-&gt;nombre] = $izquierda . $data . $derecha;
        $this-&gt;posición += strlen($data);
        return strlen($data);
    }

    function stream_tell()
    {
        return $this-&gt;posición;
    }

    function stream_eof()
    {
        return $this-&gt;posición &gt;= strlen($GLOBALS[$this-&gt;nombre]);
    }

    function stream_seek($índice, $dónde)
    {
        switch ($dónde) {
            case SEEK_SET:
                if ($índice &lt; strlen($GLOBALS[$this-&gt;nombre]) &amp;&amp; $índice &gt;= 0) {
                     $this-&gt;posición = $índice;
                     return true;
                } else {
                     return false;
                }
                break;

            case SEEK_CUR:
                if ($índice &gt;= 0) {
                     $this-&gt;posición += $índice;
                     return true;
                } else {
                     return false;
                }
                break;

            case SEEK_END:
                if (strlen($GLOBALS[$this-&gt;nombre]) + $índice &gt;= 0) {
                     $this-&gt;posición = strlen($GLOBALS[$this-&gt;nombre]) + $índice;
                     return true;
                } else {
                     return false;
                }
                break;

            default:
                return false;
        }
    }

    function stream_metadata($ruta, $opción, $var)
    {
        if($opción== STREAM_META_TOUCH) {
            $url = parse_url($ruta);
            $varname = $url["host"];
            if(!isset($GLOBALS[$varname])) {
                $GLOBALS[$varname] = '';
            }
            return true;
        }
        return false;
    }

}

stream_wrapper_register("var", "FlujoVariable")
or die("Error al registrar el protocolo");

$mivar = "";

$fp = fopen("var://mivar", "r+");

fwrite($fp, "línea1\n");
fwrite($fp, "línea2\n");
fwrite($fp, "línea3\n");

rewind($fp);
while (!feof($fp)) {
echo fgets($fp);
}
fclose($fp);
var_dump($mivar);

?&gt;

    El ejemplo anterior mostrará:

línea1
línea2
línea3
string(24) "línea1
línea2
línea3
"

# La clase php_user_filter

(PHP 5, PHP 7, PHP 8)

## Introducción

    Los hijos de esta clase se pasan a la función
    [stream_filter_register()](#function.stream-filter-register).
    Cabe señalar que el método [__construct](#object.construct) no es llamado;
    en su lugar, [php_user_filter::onCreate()](#php-user-filter.oncreate) debería ser utilizado para
    la inicialización.

## Sinopsis de la Clase

     class **php_user_filter**
     {

    /* Propiedades */

     public
     [string](#language.types.string)
      [$filtername](#php-user-filter.props.filtername) = "";

    public
     [mixed](#language.types.mixed)
      [$params](#php-user-filter.props.params) = "";

    public
     ?[resource](#language.types.resource)
      [$stream](#php-user-filter.props.stream) = null;


    /* Métodos */

public [filter](#php-user-filter.filter)(
    [resource](#language.types.resource) $in,
    [resource](#language.types.resource) $out,
    [int](#language.types.integer) &amp;$consumed,
    [bool](#language.types.boolean) $closing
): [int](#language.types.integer)
public [onClose](#php-user-filter.onclose)(): [void](language.types.void.html)
public [onCreate](#php-user-filter.oncreate)(): [bool](#language.types.boolean)

}

## Propiedades

     filtername


       Nombre del filtro a registrar por la función
       [stream_filter_append()](#function.stream-filter-append).






     params







     stream






# php_user_filter::filter

(PHP 5, PHP 7, PHP 8)

php_user_filter::filter — Llamado cuando se aplica un filtro

### Descripción

public **php_user_filter::filter**(
    [resource](#language.types.resource) $in,
    [resource](#language.types.resource) $out,
    [int](#language.types.integer) &amp;$consumed,
    [bool](#language.types.boolean) $closing
): [int](#language.types.integer)

Este método es llamado siempre que los datos son leídos desde o escritos en
el flujo adjunto (como con [fread()](#function.fread) o [fwrite()](#function.fwrite)).

### Parámetros

    in


      in es un recurso que apunta a una cadena de recipientes
      que contiene uno o más objetos recipiente que contienen información que va a ser filtrada.






    out


      out es un recurso que apunta a una segunda cadena de recipientes
      dentro de la cual se deberían ubicar los recipientes modificados.






    consumed


      consumed, el cual *siempre* debe
      ser declarado por referencia, debería ser incrementado por la longitud de la información
      que el filtro lee y altera. En la mayoría de los casos esto significa que se
      incrementará consumed por $recipiente-&gt;datalen
      para cada $recipiente.






    closing


      Si el flujo está en el proceso de cierre
      (y por lo tanto éste es el último pase a través de la cadena de filtros),
      el parámetro closing será establecido a **[true](#constant.true)**.


### Valores devueltos

El método **filter()** debe devolver uno de estos
tres valores cuando se complete.

       Valor Devuelto
       Significado






       **[PSFS_PASS_ON](#constant.psfs-pass-on)**

        El filtró se procesó con éxito con información disponible en la
        cadena de recipientes out.




       **[PSFS_FEED_ME](#constant.psfs-feed-me)**

        El filtró se procesó con éxito, sin embargo no había información disponible que
        devolver. Se requiere más información del flujo o del filtro previo.




       **[PSFS_ERR_FATAL](#constant.psfs-err-fatal)** (predeterminado)

        El filtro experimentó un error irrecuperable y no puede continuar.





# php_user_filter::onClose

(PHP 5, PHP 7, PHP 8)

php_user_filter::onClose — Llamado cuando se cierra el filtro

### Descripción

public **php_user_filter::onClose**(): [void](language.types.void.html)

Este método es llamado bajo el cierre del filtro (normalmente también
durante el cierre del flujo), y se ejecuta _después_
de llamar al método flush. Si se asignó o inicializo
cualquier recurso durante onCreate(),
este sería el momento de destruirlo o deshacerse de él.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor de retorono es ignorado.

# php_user_filter::onCreate

(PHP 5, PHP 7, PHP 8)

php_user_filter::onCreate — Llamado cuando se crea el filtro

### Descripción

public **php_user_filter::onCreate**(): [bool](#language.types.boolean)

Este método se llama durante la instanciación del objeto de la clase del
filtro. Si el filtro asigna o inicializa cualquier otro recurso
(como un buffer), éste es el lugar para hacerlo.

Cuando primero se instancia el filtro, y
se llama a elfiltro-&gt;onCreate(), estarán disponibles
varias propiedades como se muestra en la tabla de abajo.

       Propiedad
       Contenido






       FilterClass-&gt;filtername

        Una cadena que contiene el nombre del filtro con el que fue instanciado.
        Los filtros pueden ser registrados bajo múltiples nombres o bajo comodines.
        Use esta propiedad para determinar qué nombre fue usado.




       FilterClass-&gt;params

        El contenido del parámetro params pasado
        a [stream_filter_append()](#function.stream-filter-append)
        o a [stream_filter_prepend()](#function.stream-filter-prepend).




       FilterClass-&gt;stream

        El recurso de flujo que va a ser filtrado. Quizás disponible sólo durante
        las llamadas a **filter()** cuando el
        parámetro closing es **[false](#constant.false)**.





### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La implementación de
este método debería devolver **[false](#constant.false)** en caso de error, o **[true](#constant.true)** en caso de éxito.

## Tabla de contenidos

- [php_user_filter::filter](#php-user-filter.filter) — Llamado cuando se aplica un filtro
- [php_user_filter::onClose](#php-user-filter.onclose) — Llamado cuando se cierra el filtro
- [php_user_filter::onCreate](#php-user-filter.oncreate) — Llamado cuando se crea el filtro

# La clase streamWrapper

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

## Introducción

    Permite implementar sus propios gestores de protocolo y flujos para usarlos
    con las demás funciones de sistemas de archivos (como [fopen()](#function.fopen),
    [fread()](#function.fread) etc.).

**Nota**:

     Esta *NO* es una clase real, sólo es un prototipo de cómo
     debería ser una clase que define su propio protocolo.

**Nota**:

     Implementar los métodos de distinta forma que la descrita aquí puede conducir a
     un comportamiento indefinido.





    Una instancia de esta clase se inicializa tan pronto como una función de flujo
    intente acceder al protocolo al que está asociado.

## Sinopsis de la Clase

    ****




      class streamWrapper

     {

    /* Propiedades */

     public
     [resource](#language.types.resource)
      [$context](#streamwrapper.props.context);



    /* Métodos */

public [\_\_construct](#streamwrapper.construct)()

    public [dir_closedir](#streamwrapper.dir-closedir)(): [bool](#language.types.boolean)

public [dir_opendir](#streamwrapper.dir-opendir)([string](#language.types.string) $path, [int](#language.types.integer) $options): [bool](#language.types.boolean)
public [dir_readdir](#streamwrapper.dir-readdir)(): [string](#language.types.string)|[bool](#language.types.boolean)
public [dir_rewinddir](#streamwrapper.dir-rewinddir)(): [bool](#language.types.boolean)
public [mkdir](#streamwrapper.mkdir)([string](#language.types.string) $path, [int](#language.types.integer) $mode, [int](#language.types.integer) $options): [bool](#language.types.boolean)
public [rename](#streamwrapper.rename)([string](#language.types.string) $path_from, [string](#language.types.string) $path_to): [bool](#language.types.boolean)
public [rmdir](#streamwrapper.rmdir)([string](#language.types.string) $path, [int](#language.types.integer) $options): [bool](#language.types.boolean)
public [stream_cast](#streamwrapper.stream-cast)([int](#language.types.integer) $cast_as): [resource](#language.types.resource)|[false](#language.types.singleton)
public [stream_close](#streamwrapper.stream-close)(): [void](language.types.void.html)
public [stream_eof](#streamwrapper.stream-eof)(): [bool](#language.types.boolean)
public [stream_flush](#streamwrapper.stream-flush)(): [bool](#language.types.boolean)
public [stream_lock](#streamwrapper.stream-lock)([int](#language.types.integer) $operation): [bool](#language.types.boolean)
public [stream_metadata](#streamwrapper.stream-metadata)([string](#language.types.string) $path, [int](#language.types.integer) $option, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)
public [stream_open](#streamwrapper.stream-open)(
    [string](#language.types.string) $path,
    [string](#language.types.string) $mode,
    [int](#language.types.integer) $options,
    [?](#language.types.null)[string](#language.types.string) &amp;$opened_path
): [bool](#language.types.boolean)
public [stream_read](#streamwrapper.stream-read)([int](#language.types.integer) $count): [string](#language.types.string)|[false](#language.types.singleton)
public [stream_seek](#streamwrapper.stream-seek)([int](#language.types.integer) $offset, [int](#language.types.integer) $whence): [bool](#language.types.boolean)
public [stream_set_option](#streamwrapper.stream-set-option)([int](#language.types.integer) $option, [int](#language.types.integer) $arg1, [int](#language.types.integer) $arg2): [bool](#language.types.boolean)
public [stream_stat](#streamwrapper.stream-stat)(): [array](#language.types.array)|[false](#language.types.singleton)
public [stream_tell](#streamwrapper.stream-tell)(): [int](#language.types.integer)
public [stream_truncate](#streamwrapper.stream-truncate)([int](#language.types.integer) $new_size): [bool](#language.types.boolean)
public [stream_write](#streamwrapper.stream-write)([string](#language.types.string) $data): [int](#language.types.integer)
public [unlink](#streamwrapper.unlink)([string](#language.types.string) $path): [bool](#language.types.boolean)
public [url_stat](#streamwrapper.url-stat)([string](#language.types.string) $path, [int](#language.types.integer) $flags): [array](#language.types.array)|[false](#language.types.singleton)

    public [__destruct](#streamwrapper.destruct)()

}

## Propiedades

     recurso de context


       El [contexto](#context) actual, o **[null](#constant.null)** si no
       se pasó ningún contexto a la función que realizó la llamada.




       Use la función [stream_context_get_options()](#function.stream-context-get-options) para analizar el
       contexto.



      **Nota**:



        Esta propiedad *debe* ser pública para que PHP pueda rellenarla
        con el recurso de contexto real.






## Ver también

     - [Ejemplo de clase registrada como envoltura de flujo](#stream.streamwrapper.example-1)

     - [stream_wrapper_register()](#function.stream-wrapper-register)

     - [stream_wrapper_unregister()](#function.stream-wrapper-unregister)

     - [stream_wrapper_restore()](#function.stream-wrapper-restore)

# streamWrapper::\_\_construct

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

streamWrapper::\_\_construct — Construye una nueva envoltura de flujo

### Descripción

public **streamWrapper::\_\_construct**()

Llamado cuando se abre la envoltura de flujo, justo antes de
[streamWrapper::stream_open()](#streamwrapper.stream-open).

### Parámetros

Esta función no contiene ningún parámetro.

# streamWrapper::\_\_destruct

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

streamWrapper::\_\_destruct — Destruye una envoltura de flujo existente

### Descripción

public **streamWrapper::\_\_destruct**()

Llamado al cerrar la envoltura de flujo, justo antes de
[streamWrapper::stream_flush()](#streamwrapper.stream-flush).

### Parámetros

Esta función no contiene ningún parámetro.

# streamWrapper::dir_closedir

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

streamWrapper::dir_closedir — Cerrar un gestor de directorio

### Descripción

public **streamWrapper::dir_closedir**(): [bool](#language.types.boolean)

Este método es llamado en respuesta a [closedir()](#function.closedir).

Cualquier recurso que fue bloqueado o asignado durante la apertura y utiliza
el flujo de directorio, debería ser liberado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [closedir()](#function.closedir) - Cierra el puntero al directorio

    - [streamWrapper::dir_opendir()](#streamwrapper.dir-opendir) - Abrir un gestor de directorio

# streamWrapper::dir_opendir

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

streamWrapper::dir_opendir — Abrir un gestor de directorio

### Descripción

public **streamWrapper::dir_opendir**([string](#language.types.string) $path, [int](#language.types.integer) $options): [bool](#language.types.boolean)

Este método es llamado en respuesta a [opendir()](#function.opendir).

### Parámetros

     path


       Especifica la URL que fue pasada a [opendir()](#function.opendir).



      **Nota**:



        La URL se puede desmontar con [parse_url()](#function.parse-url).







     options








### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [opendir()](#function.opendir) - Abre un directorio y recupera un puntero sobre él

    - [streamWrapper::dir_closedir()](#streamwrapper.dir-closedir) - Cerrar un gestor de directorio

    - [parse_url()](#function.parse-url) - Analiza una URL y devuelve sus componentes

# streamWrapper::dir_readdir

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

streamWrapper::dir_readdir — Lee un archivo en un directorio

### Descripción

public **streamWrapper::dir_readdir**(): [string](#language.types.string)|[bool](#language.types.boolean)

Este método se llama en respuesta a [readdir()](#function.readdir).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Debe devolver una [string](#language.types.string) que representa el próximo nombre de archivo,
o **[false](#constant.false)** si no hay más archivos.

**Advertencia**

    Devolver [true](#language.types.singleton) o [false](#language.types.singleton) tendrá el mismo
    efecto de señalar que no hay un siguiente fichero. Sin embargo,
    devolver [true](#language.types.singleton) está desaconsejado y [false](#language.types.singleton)
    debe ser utilizado para señalar esta condición en su lugar.

**Nota**:

    Un valor de retorno no booleano se convertirá en  [string](#language.types.string).

### Errores/Excepciones

Emite una advertencia
**[E_WARNING](#constant.e-warning)** si la llamada a este método falla
(i.e. no implementado).

### Ejemplos

    **Ejemplo #1 Lista de archivos de un archivo tar**

&lt;?php
class streamWrapper {
protected $fp;

    public function dir_opendir($path, $options) {
        $url = parse_url($path);

        $path = $url["host"] . $url["path"];

        if (!is_readable($path)) {
            trigger_error("$path no es legible para mí", E_USER_NOTICE);
            return false;
        }
        if (!is_file($path)) {
            trigger_error("$path no es un archivo", E_USER_NOTICE);
            return false;
        }

        $this-&gt;fp = fopen($path, "rb");
        return true;
    }

    public function dir_readdir() {
        // Extrae el encabezado para esta entrada
        $header      = fread($this-&gt;fp, 512);
        $data = unpack("a100filename/a8mode/a8uid/a8gid/a12size/a12mtime/a8checksum/a1filetype/a100link/a100linkedfile", $header);

        // Recorta el nombre del archivo y el tamaño del archivo
        $filename    = trim($data["filename"]);

        // No hay archivo, estamos al final del archivo
        if (!$filename) {
            return false;
        }

        $octal_bytes = trim($data["size"]);
        // El tamaño del archivo está definido en octetos
        $bytes       = octdec($octal_bytes);

        // tar redondea los tamaños de archivos al múltiplo de 512 siguiente
        $rest        = $bytes % 512;
        if ($rest &gt; 0) {
            $bytes      += 512 - $rest;
        }

        // Lectura del archivo
        fseek($this-&gt;fp, $bytes, SEEK_CUR);

        return $filename;
    }

    public function dir_closedir() {
        return fclose($this-&gt;fp);
    }

    public function dir_rewinddir() {
        return fseek($this-&gt;fp, 0, SEEK_SET);
    }

}

stream_wrapper_register("tar", "streamWrapper");
$handle = opendir("tar://example.tar");
while (false !== ($file = readdir($handle))) {
    var_dump($file);
}

echo "Reinicio...\n";
rewind($handle);
var_dump(readdir($handle));

closedir($handle);
?&gt;

    Resultado del ejemplo anterior es similar a:

string(13) "construct.xml"
string(16) "dir-closedir.xml"
string(15) "dir-opendir.xml"
string(15) "dir-readdir.xml"
string(17) "dir-rewinddir.xml"
string(9) "mkdir.xml"
string(10) "rename.xml"
string(9) "rmdir.xml"
string(15) "stream-cast.xml"
string(16) "stream-close.xml"
string(14) "stream-eof.xml"
string(16) "stream-flush.xml"
string(15) "stream-lock.xml"
string(15) "stream-open.xml"
string(15) "stream-read.xml"
string(15) "stream-seek.xml"
string(21) "stream-set-option.xml"
string(15) "stream-stat.xml"
string(15) "stream-tell.xml"
string(16) "stream-write.xml"
string(10) "unlink.xml"
string(12) "url-stat.xml"
Reinicio...
string(13) "construct.xml"

### Ver también

    - [readdir()](#function.readdir) - Lee una entrada del directorio

# streamWrapper::dir_rewinddir

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

streamWrapper::dir_rewinddir — Rebobina el gestor de directorio

### Descripción

public **streamWrapper::dir_rewinddir**(): [bool](#language.types.boolean)

Este método es llamado en respuesta a [rewinddir()](#function.rewinddir).

Debería reiniciar la salida generada por
[streamWrapper::dir_readdir()](#streamwrapper.dir-readdir).
Esto es: La siguiente llamada a [streamWrapper::dir_readdir()](#streamwrapper.dir-readdir)
debería devolver la primera entrada en la ubicación devueta por
[streamWrapper::dir_opendir()](#streamwrapper.dir-opendir).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [rewinddir()](#function.rewinddir) - Retorna al primer elemento del directorio

    - [streamWrapper::dir_readdir()](#streamwrapper.dir-readdir) - Lee un archivo en un directorio

# streamWrapper::mkdir

(PHP 5, PHP 7, PHP 8)

streamWrapper::mkdir — Crear un directorio

### Descripción

public **streamWrapper::mkdir**([string](#language.types.string) $path, [int](#language.types.integer) $mode, [int](#language.types.integer) $options): [bool](#language.types.boolean)

Este método es llamado en respuesta a [mkdir()](#function.mkdir).

**Nota**:

    Para que el mensaje de error apropiado sea devuelto, este método
    *no* debería ser definido si la envoltura no soporta
    la creación de directorios.

### Parámetros

     path


       El directorio que debería ser creado.






     mode


       El valor pasdo a [mkdir()](#function.mkdir).






     options


       Una máscara a nivel de bits de valores, como **[STREAM_MKDIR_RECURSIVE](#constant.stream-mkdir-recursive)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite una advertencia
**[E_WARNING](#constant.e-warning)** si la llamada a este método falla
(i.e. no implementado).

### Notas

**Nota**:

La propiedad
streamWrapper::$context
es actualizada si un contexto válido es pasado a la función.

### Ver también

    - [mkdir()](#function.mkdir) - Crea un directorio

    - [streamwrapper::rmdir()](#streamwrapper.rmdir) - Elimina un directorio

# streamWrapper::rename

(PHP 5, PHP 7, PHP 8)

streamWrapper::rename — Renombra un archivo o directorio

### Descripción

public **streamWrapper::rename**([string](#language.types.string) $path_from, [string](#language.types.string) $path_to): [bool](#language.types.boolean)

Este método es llamado en respuesta a [rename()](#function.rename).

Debería intentar renombrar path_from a
path_to

**Nota**:

    Para que el mensaje de error apropiado sea devuelto, este método
    *no* debería ser definido si la envoltura no soporta
    el renombramiento de archivos.

### Parámetros

     path_from


       La URL al archivo actual.






     path_to


       La URL que debería ser renombrada por path_from.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite una advertencia
**[E_WARNING](#constant.e-warning)** si la llamada a este método falla
(i.e. no implementado).

### Notas

**Nota**:

La propiedad
streamWrapper::$context
es actualizada si un contexto válido es pasado a la función.

### Ver también

    - [rename()](#function.rename) - Renombra un fichero o un directorio

# streamWrapper::rmdir

(PHP 5, PHP 7, PHP 8)

streamWrapper::rmdir — Elimina un directorio

### Descripción

public **streamWrapper::rmdir**([string](#language.types.string) $path, [int](#language.types.integer) $options): [bool](#language.types.boolean)

Este método es llamado en respuesta a [rmdir()](#function.rmdir).

**Nota**:

    Para que el mensaje de error apropiado sea devuelto, este método
    *no* debería ser definido si la envoltura no soporta
    la eliminación de directorios.

### Parámetros

     path


       La URL del directorio que debería ser eliminado.






     options


       Una máscara a nivel de bits de valores, como **[STREAM_MKDIR_RECURSIVE](#constant.stream-mkdir-recursive)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite una advertencia
**[E_WARNING](#constant.e-warning)** si la llamada a este método falla
(i.e. no implementado).

### Notas

**Nota**:

La propiedad
streamWrapper::$context
es actualizada si un contexto válido es pasado a la función.

### Ver también

    - [rmdir()](#function.rmdir) - Elimina un directorio

    - [streamwrapper::mkdir()](#streamwrapper.mkdir) - Crear un directorio

    - [streamwrapper::unlink()](#streamwrapper.unlink) - Borrar un archivo

# streamWrapper::stream_cast

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

streamWrapper::stream_cast — Recuperar el recurso subyacente

### Descripción

public **streamWrapper::stream_cast**([int](#language.types.integer) $cast_as): [resource](#language.types.resource)|[false](#language.types.singleton)

Esta función es llamada en respuesta a [stream_select()](#function.stream-select).

### Parámetros

     cast_as


       Puede ser una de las siguientes valores:
       **[STREAM_CAST_FOR_SELECT](#constant.stream-cast-for-select)** si
       [stream_select()](#function.stream-select) es la función que llama
       **stream_cast()** o
       **[STREAM_CAST_AS_STREAM](#constant.stream-cast-as-stream)** si
       **stream_cast()** es llamada para los
       otros casos.





### Valores devueltos

Debe devolver el flujo subyacente, utilizado por el gestor,
y en caso contrario **[false](#constant.false)**.

### Ver también

    - [stream_select()](#function.stream-select) - Supervisa la modificación de uno o varios flujos

# streamWrapper::stream_close

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

streamWrapper::stream_close — Cerrar un recurso

### Descripción

public **streamWrapper::stream_close**(): [void](language.types.void.html)

Este método es llamado en respuesta a [fclose()](#function.fclose).

Todos los recursos que estaban bloqueados o asignados por la envoltura deberían ser
liberados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [fclose()](#function.fclose) - Cierra un fichero

    - [streamWrapper::dir_closedir()](#streamwrapper.dir-closedir) - Cerrar un gestor de directorio

# streamWrapper::stream_eof

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

streamWrapper::stream_eof — Comprueba si un puntero a un archivo está en el final del archivo (EOF)

### Descripción

public **streamWrapper::stream_eof**(): [bool](#language.types.boolean)

Este método es llamado en respuesta a [feof()](#function.feof).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Debería devolver **[true](#constant.true)** si la posición de lectura/escritura está al final del flujo y
no hay más información disponible para leer, o de otro modo **[false](#constant.false)**.

### Notas

**Advertencia**

      Al leer un fichero entero (por ejemplo, con
      [file_get_contents()](#function.file-get-contents)), PHP llamará a
      [streamWrapper::stream_read()](#streamwrapper.stream-read) seguido de
      **streamWrapper::stream_eof()** en un bucle, pero siempre y cuando
      [streamWrapper::stream_read()](#streamwrapper.stream-read) devuelva un texto
      no vacío, el valor que devuelva
      **streamWrapper::stream_eof()** será ignorado.

### Ver también

    - [feof()](#function.feof) - Prueba el final del archivo

# streamWrapper::stream_flush

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

streamWrapper::stream_flush — Vuelca la salida

### Descripción

public **streamWrapper::stream_flush**(): [bool](#language.types.boolean)

Este método es llamado en respuesta a [fflush()](#function.fflush) y cuando el flujo está siendo cerrado mientras cualquier dato no volcado haya sido escrito en él antes.

Si se tiene información en la caché del flujo pero aún no se ha guardado en el
almacenamiento subyacente, se debería hacer ahora.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Debería devolver **[true](#constant.true)** si la información en la caché se almacenó con éxito (o
si no había información que almacenar), o **[false](#constant.false)** si la información podría
no estar almacenada.

### Notas

**Nota**:

    Si no está implementado, se asume que el valor devuelto es **[false](#constant.false)**.

### Ver también

    - [fflush()](#function.fflush) - Envía todo el contenido generado en un fichero

# streamWrapper::stream_lock

(PHP 5, PHP 7, PHP 8)

streamWrapper::stream_lock — Bloqueo de archivos asesorado

### Descripción

public **streamWrapper::stream_lock**([int](#language.types.integer) $operation): [bool](#language.types.boolean)

Este método es llamado en respuesta a [flock()](#function.flock), cuando se utiliza
[file_put_contents()](#function.file-put-contents) (cuando el parámetro flags
contiene **[LOCK_EX](#constant.lock-ex)**),
[stream_set_blocking()](#function.stream-set-blocking) y cuando se cierra el flujo
(**[LOCK_UN](#constant.lock-un)**).

### Parámetros

     operation


       operation es una de las operaciones siguientes:



        -

          **[LOCK_SH](#constant.lock-sh)** para adquirir un bloqueo compartido (lectura).



        -

          **[LOCK_EX](#constant.lock-ex)** para adquirir un bloqueo exclusivo (escritura).



        -

          **[LOCK_UN](#constant.lock-un)** para liberar un bloqueo (compartido o exclusivo).



        -

          **[LOCK_NB](#constant.lock-nb)**, utilice esta operación si no quiere que
          [flock()](#function.flock) bloquee mientras opera.
          (no soportado en Windows)







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite un **[E_WARNING](#constant.e-warning)** si la llamada a este método falla (es decir, no implementado).

### Ver también

    - [stream_set_blocking()](#function.stream-set-blocking) - Configura el modo de bloqueo de un flujo

    - [flock()](#function.flock) - Bloquea el fichero

# streamWrapper::stream_metadata

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

streamWrapper::stream_metadata — Cambiar los metadatos del flujo

### Descripción

public **streamWrapper::stream_metadata**([string](#language.types.string) $path, [int](#language.types.integer) $option, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Este método es llamado para establecer metadatos en el flujo. Se invoca cuando una de las siguientes funciones es llamada sobre un URL de flujo:

    - [touch()](#function.touch)

    - [chmod()](#function.chmod)

    - [chown()](#function.chown)

    - [chgrp()](#function.chgrp)

Observe que algunas de estas operaciones pueden no estar disponibles en su sistema.

### Parámetros

     path


       La ruta del fichero o el URL a establecer los metadatos. Observe que en caso de ser un URL, debe ser un URL delimitado por
       ://. No se admiten otros formatos de URL.






     option


       Una de las siguientes opciones:



        - **[STREAM_META_TOUCH](#constant.stream-meta-touch)** (El método fue llamado en respuesta a [touch()](#function.touch))

        - **[STREAM_META_OWNER_NAME](#constant.stream-meta-owner-name)** (El método fue llamado en respuesta a [chown()](#function.chown) con parámetro de tipo string)

        - **[STREAM_META_OWNER](#constant.stream-meta-owner)** (El método fue llamado en respuesta a [chown()](#function.chown))

        - **[STREAM_META_GROUP_NAME](#constant.stream-meta-group-name)** (El método fue llamado en respuesta a [chgrp()](#function.chgrp))

        - **[STREAM_META_GROUP](#constant.stream-meta-group)** (El método fue llamado en respuesta a [chgrp()](#function.chgrp))

        - **[STREAM_META_ACCESS](#constant.stream-meta-access)** (El método fue llamado en respuesta a [chmod()](#function.chmod))






     value


       Si el parámetro option es



        - **[STREAM_META_TOUCH](#constant.stream-meta-touch)**: [Array](#language.types.array) que consiste en dos argumentos de la función
         [touch()](#function.touch).

        - **[STREAM_META_OWNER_NAME](#constant.stream-meta-owner-name)** o **[STREAM_META_GROUP_NAME](#constant.stream-meta-group-name)**:
         El nombre del usuario/grupo propietario como [string](#language.types.string).

        - **[STREAM_META_OWNER](#constant.stream-meta-owner)** o **[STREAM_META_GROUP](#constant.stream-meta-group)**:
         El valor del argumento del usuario/grupo propietario como [int](#language.types.integer).

        - **[STREAM_META_ACCESS](#constant.stream-meta-access)**: El argumento de la función [chmod()](#function.chmod) como [int](#language.types.integer).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Si option no se implementa, debería devolver
**[false](#constant.false)**.

### Ver también

    - [touch()](#function.touch) - Modifica la fecha de modificación y de último acceso de un fichero

    - [chmod()](#function.chmod) - Cambia el modo del fichero

    - [chown()](#function.chown) - Cambia el propietario del fichero

    - [chgrp()](#function.chgrp) - Cambia el grupo de un fichero

# streamWrapper::stream_open

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

streamWrapper::stream_open — Abre un archivo o una URL

### Descripción

public **streamWrapper::stream_open**(
    [string](#language.types.string) $path,
    [string](#language.types.string) $mode,
    [int](#language.types.integer) $options,
    [?](#language.types.null)[string](#language.types.string) &amp;$opened_path
): [bool](#language.types.boolean)

Este método es llamado inmediatemente después de que la envoltura sea inicializada (p.ej.
usando [fopen()](#function.fopen) y [file_get_contents()](#function.file-get-contents)).

### Parámetros

     path


       Especifica la URL que fue pasada a la función original.



      **Nota**:



        La URL se puede desmontar con [parse_url()](#function.parse-url). Observe que sólo las URL
        delimitadas por :// están soportadas. : y :/ aunque técnicamente son URL válidas, no lo están.







     mode


       El modo usado para abrir el archivo, como está detallado en [fopen()](#function.fopen).



      **Nota**:



        Recuerde verificar si mode es válido para la ruta
        path solicitada.







     options


       Contiene banderas adicionales establecidas por la API de flujos. Puede contener uno o más
       de los siguientes valores usando OR entre ellos.






           Bandera
           Descripción






           **[STREAM_USE_PATH](#constant.stream-use-path)**
           Si la ruta path es relativa, se
            busca el recurso usando include_path.




           **[STREAM_REPORT_ERRORS](#constant.stream-report-errors)**
           Si está establecida esta bandera, uno mismo es responsble de lanzar
            errores usando [trigger_error()](#function.trigger-error) durante
            la apertura del flujo. Si esta bandera no está establecida, no se debería
            lanzar ningún error.











     opened_path


       Si la ruta path es abierta con éxito,
       y **[STREAM_USE_PATH](#constant.stream-use-path)** está establecido en options,
       opened_path debería ser establecido a la ruta
       completa del archivo/recurso que fue abierto realmente.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite una advertencia
**[E_WARNING](#constant.e-warning)** si la llamada a este método falla
(i.e. no implementado).

### Notas

**Nota**:

La propiedad
streamWrapper::$context
es actualizada si un contexto válido es pasado a la función.

### Ver también

    - [fopen()](#function.fopen) - Abre un fichero o un URL

    - [parse_url()](#function.parse-url) - Analiza una URL y devuelve sus componentes

# streamWrapper::stream_read

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

streamWrapper::stream_read — Lee desde el flujo

### Descripción

public **streamWrapper::stream_read**([int](#language.types.integer) $count): [string](#language.types.string)|[false](#language.types.singleton)

Este método es llamado en respuesta a [fread()](#function.fread)
y [fgets()](#function.fgets).

**Nota**:

    No olvide modificar la posición de lectura y escritura
    del número de bytes que han podido ser leídos.

### Parámetros

     count


       El número de bytes que han podido ser leídos, a partir de
       la posición actual.





### Valores devueltos

Si hay menos que count bytes
disponibles, tantos como sea posible deberían ser retornados.
Si no hay más datos disponibles, un string vacío debe ser retornado.
Para señalar un error de lectura **[false](#constant.false)** debe ser retornado.

### Errores/Excepciones

Emite una advertencia
**[E_WARNING](#constant.e-warning)** si la llamada a este método falla
(i.e. no implementado).

**Nota**:

    Si el valor de retorno es mayor que count,
    se emitirá una advertencia **[E_WARNING](#constant.e-warning)**, y
    los datos excedentes se perderán.

### Notas

**Nota**:

    [streamWrapper::stream_eof()](#streamwrapper.stream-eof) es llamado directamente
    después de **streamWrapper::stream_read()** para verificar
    si se ha alcanzado EOF. Si la función no está
    implementada, se utilizará EOF.

**Advertencia**

    Al leer completamente un fichero (por ejemplo, mediante
    la función [file_get_contents()](#function.file-get-contents)), PHP
    llamará a la función **streamWrapper::stream_read()**
    seguida de la función [streamWrapper::stream_eof()](#streamwrapper.stream-eof)
    en un bucle, pero mientras la función
    **streamWrapper::stream_read()** retorne un
    string no vacío, el valor retornado de la función
    [streamWrapper::stream_eof()](#streamwrapper.stream-eof) será ignorado.

### Ver también

    - [fread()](#function.fread) - Lectura del archivo en modo binario

    - [fgets()](#function.fgets) - Recupera la línea actual a partir de la posición del puntero de archivo

# streamWrapper::stream_seek

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

streamWrapper::stream_seek — Coloca el puntero de flujo en una posición

### Descripción

public **streamWrapper::stream_seek**([int](#language.types.integer) $offset, [int](#language.types.integer) $whence): [bool](#language.types.boolean)

Este método es llamado en respuesta a [fseek()](#function.fseek).

La posición de lectura/escritura debe ser modificada para reflejar
la nueva posición offset y
whence.

### Parámetros

     offset


       La posición a buscar en el flujo.






     whence


       Los valores posibles son:



        - **[SEEK_SET](#constant.seek-set)**: la nueva posición es offset bytes.

        - **[SEEK_CUR](#constant.seek-cur)**: la nueva posición es la posición actual más offset.

        - **[SEEK_END](#constant.seek-end)**: la nueva posición es el final del fichero más offset.



      **Nota**:

        La implementación actual nunca define whence como
        **[SEEK_CUR](#constant.seek-cur)**; de hecho, estas búsquedas de posición son
        convertidas internamente a búsquedas de tipo **[SEEK_SET](#constant.seek-set)**.






### Valores devueltos

Retorna **[true](#constant.true)** si la posición ha sido actualizada,
**[false](#constant.false)** en caso contrario.

### Notas

**Nota**:

    Si no está implementado, **[false](#constant.false)** será utilizado como
    valor de retorno.

**Nota**:

    En caso de éxito,
    [streamWrapper::stream_tell()](#streamwrapper.stream-tell) es llamado
    directamente después de **streamWrapper::stream_seek()**.
    Si [streamWrapper::stream_tell()](#streamwrapper.stream-tell) falla,
    el valor retornado a la función llamante es **[false](#constant.false)**.

**Nota**:

    Todas las operaciones de desplazamiento en un flujo no requieren
    necesariamente el uso de esta función. Los flujos PHP
    tienen la lectura en búfer activada por omisión (ver también la
    función [stream_set_read_buffer()](#function.stream-set-read-buffer)) así como el
    desplazamiento en este flujo, que puede ser realizado moviendo el puntero
    del búfer.

### Ver también

    - [fseek()](#function.fseek) - Modifica la posición del puntero de archivo

# streamWrapper::stream_set_option

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

streamWrapper::stream_set_option — Cambia las opciones del flujo

### Descripción

public **streamWrapper::stream_set_option**([int](#language.types.integer) $option, [int](#language.types.integer) $arg1, [int](#language.types.integer) $arg2): [bool](#language.types.boolean)

Este método es llamado para modificar las opciones del flujo.

### Parámetros

     option


       Una de las constantes entre:



        - **[STREAM_OPTION_BLOCKING](#constant.stream-option-blocking)** (Este método es llamado en respuesta a [stream_set_blocking()](#function.stream-set-blocking))

        - **[STREAM_OPTION_READ_TIMEOUT](#constant.stream-option-read-timeout)** (Este método es llamado en respuesta a [stream_set_timeout()](#function.stream-set-timeout))

        - **[STREAM_OPTION_READ_BUFFER](#constant.stream-option-read-buffer)** (Este método es llamado en respuesta a [stream_set_read_buffer()](#function.stream-set-read-buffer))

        - **[STREAM_OPTION_WRITE_BUFFER](#constant.stream-option-write-buffer)** (Este método es llamado en respuesta a [stream_set_write_buffer()](#function.stream-set-write-buffer))






     arg1


       Si option es



        - **[STREAM_OPTION_BLOCKING](#constant.stream-option-blocking)**: modo de bloqueo solicitado (1 significa bloqueante, 0 no bloqueante).

        - **[STREAM_OPTION_READ_TIMEOUT](#constant.stream-option-read-timeout)**: el tiempo de espera en segundos.

        - **[STREAM_OPTION_READ_BUFFER](#constant.stream-option-read-buffer)**: el modo de buffer (**[STREAM_BUFFER_NONE](#constant.stream-buffer-none)** o **[STREAM_BUFFER_FULL](#constant.stream-buffer-full)**).

        - **[STREAM_OPTION_WRITE_BUFFER](#constant.stream-option-write-buffer)**: el modo de buffer (**[STREAM_BUFFER_NONE](#constant.stream-buffer-none)** o **[STREAM_BUFFER_FULL](#constant.stream-buffer-full)**).






     arg2


       Si option es



        - **[STREAM_OPTION_BLOCKING](#constant.stream-option-blocking)**: esta opción no está activa.

        - **[STREAM_OPTION_READ_TIMEOUT](#constant.stream-option-read-timeout)**: el tiempo de espera en microsegundos.

        - **[STREAM_OPTION_READ_BUFFER](#constant.stream-option-read-buffer)**: el tamaño del buffer solicitado.

        - **[STREAM_OPTION_WRITE_BUFFER](#constant.stream-option-write-buffer)**: el tamaño del buffer solicitado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Si option no está implementada,
**[false](#constant.false)** debe ser retornado.

### Ver también

    - [stream_set_blocking()](#function.stream-set-blocking) - Configura el modo de bloqueo de un flujo

    - [stream_set_timeout()](#function.stream-set-timeout) - Configura el tiempo de espera de un flujo

    - [stream_set_write_buffer()](#function.stream-set-write-buffer) - Configura el buffer de escritura de un flujo

# streamWrapper::stream_stat

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

streamWrapper::stream_stat — Recuperar información sobre un recurso de archivo

### Descripción

public **streamWrapper::stream_stat**(): [array](#language.types.array)|[false](#language.types.singleton)

Este método es llamado en respuesta a [fstat()](#function.fstat).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Véase [stat()](#function.stat).

### Errores/Excepciones

Emite una advertencia
**[E_WARNING](#constant.e-warning)** si la llamada a este método falla
(i.e. no implementado).

### Ver también

    - [stat()](#function.stat) - Proporciona información sobre un fichero

    - [streamwrapper::url_stat()](#streamwrapper.url-stat) - Lee la información sobre un fichero

# streamWrapper::stream_tell

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

streamWrapper::stream_tell — Recuperar la posición actual de un flujo

### Descripción

public **streamWrapper::stream_tell**(): [int](#language.types.integer)

Este método es llamado en respuesta a [fseek()](#function.fseek)
para determinar la posición actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Debería devolver la posición actual del flujo.

### Ver también

    - [ftell()](#function.ftell) - Devuelve la posición actual del puntero de archivo

# streamWrapper::stream_truncate

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

streamWrapper::stream_truncate — Truncar un flujo

### Descripción

public **streamWrapper::stream_truncate**([int](#language.types.integer) $new_size): [bool](#language.types.boolean)

Responderá a la truncación, p.ej. a través de [ftruncate()](#function.ftruncate).

### Parámetros

     new_size


       El nuevo tamaño.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ftruncate()](#function.ftruncate) - Tronca un fichero

# streamWrapper::stream_write

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

streamWrapper::stream_write — Escribir en un flujo

### Descripción

public **streamWrapper::stream_write**([string](#language.types.string) $data): [int](#language.types.integer)

Este método es llamado en respuesta a [fwrite()](#function.fwrite).

**Nota**:

    Recuerde actualizar la posición actual del flujo por el número de bytes
    que fueron escritos con éxito.

### Parámetros

     data


       Esta información debería ser almacenada en el flujo subyacente.



      **Nota**:



        Si no hay espacio suficiente en el flujo subyacente, guardar lo más
        posible.






### Valores devueltos

Debería devolver el número de bytes que fueron almacenados con éxito, o 0 si
no se puede almacenar nada.

### Errores/Excepciones

Emite una advertencia
**[E_WARNING](#constant.e-warning)** si la llamada a este método falla
(i.e. no implementado).

**Nota**:

    Si el valor devuelto es mayor que la longitud de
    data, se emitirá un **[E_WARNING](#constant.e-warning)**
    y el valor devuelto será truncado a su longitud.

### Ver también

    - [fwrite()](#function.fwrite) - Escribe en un fichero en modo binario

# streamWrapper::unlink

(PHP 5, PHP 7, PHP 8)

streamWrapper::unlink — Borrar un archivo

### Descripción

public **streamWrapper::unlink**([string](#language.types.string) $path): [bool](#language.types.boolean)

Este método es llamado en respuesta a [unlink()](#function.unlink).

**Nota**:

    Para que el mensaje de error apropiado sea devuelto, este método
    *no* debería ser definido si la envoltura no soporta
    la eliminación de archivos.

### Parámetros

     path


       LA URL del archivo que debería ser borrado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite una advertencia
**[E_WARNING](#constant.e-warning)** si la llamada a este método falla
(i.e. no implementado).

### Notas

**Nota**:

La propiedad
streamWrapper::$context
es actualizada si un contexto válido es pasado a la función.

### Ver también

    - [unlink()](#function.unlink) - Elimina un fichero

    - [streamWrapper::rmdir()](#streamwrapper.rmdir) - Elimina un directorio

# streamWrapper::url_stat

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

streamWrapper::url_stat — Lee la información sobre un fichero

### Descripción

public **streamWrapper::url_stat**([string](#language.types.string) $path, [int](#language.types.integer) $flags): [array](#language.types.array)|[false](#language.types.singleton)

Este método es llamado en respuesta a todas las funciones
relacionadas con [stat()](#function.stat), tales como:

    - [copy()](#function.copy)

    - [fileperms()](#function.fileperms)

    - [fileinode()](#function.fileinode)

    - [filesize()](#function.filesize)

    - [fileowner()](#function.fileowner)

    - [filegroup()](#function.filegroup)

    - [fileatime()](#function.fileatime)

    - [filemtime()](#function.filemtime)

    - [filectime()](#function.filectime)

    - [filetype()](#function.filetype)

    - [is_writable()](#function.is-writable)

    - [is_readable()](#function.is-readable)

    - [is_executable()](#function.is-executable)

    - [is_file()](#function.is-file)

    - [is_dir()](#function.is-dir)

    - [is_link()](#function.is-link)

    - [file_exists()](#function.file-exists)

    - [lstat()](#function.lstat)

    - [stat()](#function.stat)

    - [SplFileInfo::getPerms()](#splfileinfo.getperms)

    - [SplFileInfo::getInode()](#splfileinfo.getinode)

    - [SplFileInfo::getSize()](#splfileinfo.getsize)

    - [SplFileInfo::getOwner()](#splfileinfo.getowner)

    - [SplFileInfo::getGroup()](#splfileinfo.getgroup)

    - [SplFileInfo::getATime()](#splfileinfo.getatime)

    - [SplFileInfo::getMTime()](#splfileinfo.getmtime)

    - [SplFileInfo::getCTime()](#splfileinfo.getctime)

    - [SplFileInfo::getType()](#splfileinfo.gettype)

    - [SplFileInfo::isWritable()](#splfileinfo.iswritable)

    - [SplFileInfo::isReadable()](#splfileinfo.isreadable)

    - [SplFileInfo::isExecutable()](#splfileinfo.isexecutable)

    - [SplFileInfo::isFile()](#splfileinfo.isfile)

    - [SplFileInfo::isDir()](#splfileinfo.isdir)

    - [SplFileInfo::isLink()](#splfileinfo.islink)

    - [RecursiveDirectoryIterator::hasChildren()](#recursivedirectoryiterator.haschildren)

### Parámetros

     path


       La ruta de acceso del fichero o la URL a analizar. Se debe tener en cuenta que en el caso de las URLs,
       deben estar delimitadas por ://. Cualquier otro formato no es soportado.






     flags


       Las opciones adicionales activadas por la API de flujos.
       Puede contener una o más de las constantes siguientes, combinadas por OR:






           Opción
           Descripción






           STREAM_URL_STAT_LINK

            Para los recursos que tienen la capacidad de enlazarse
            a otros recursos (como una redirección HTTP
            o un enlace simbólico). Esta opción indica
            que la información leída debe concernir al enlace
            en sí mismo, y no al recurso apuntado por el enlace.
            Esta opción es activada en respuesta a una llamada a
            [lstat()](#function.lstat), [is_link()](#function.is-link)
            o [filetype()](#function.filetype).




           STREAM_URL_STAT_QUIET

            Si esta opción está activada, el gestor no
            debe emitir errores. Si esta opción no está
            activada, se es responsable del informe de errores,
            llamando a la función [trigger_error()](#function.trigger-error)
            durante el análisis de la ruta de acceso.










### Valores devueltos

Debe retornar un [array](#language.types.array) con tantos elementos como [stat()](#function.stat) retorna.
Los valores desconocidos o no disponibles deben tomar un valor
razonable (generalmente, 0). Se debe prestar especial
atención a mode como está documentado bajo
[stat()](#function.stat).
Debe retornar **[false](#constant.false)** en caso de fallo.

### Errores/Excepciones

Emite una advertencia
**[E_WARNING](#constant.e-warning)** si la llamada a este método falla
(i.e. no implementado).

### Notas

**Nota**:

La propiedad
streamWrapper::$context
es actualizada si un contexto válido es pasado a la función.

### Ver también

    - [stat()](#function.stat) - Proporciona información sobre un fichero

    - [streamwrapper::stream_stat()](#streamwrapper.stream-stat) - Recuperar información sobre un recurso de archivo

## Tabla de contenidos

- [streamWrapper::\_\_construct](#streamwrapper.construct) — Construye una nueva envoltura de flujo
- [streamWrapper::\_\_destruct](#streamwrapper.destruct) — Destruye una envoltura de flujo existente
- [streamWrapper::dir_closedir](#streamwrapper.dir-closedir) — Cerrar un gestor de directorio
- [streamWrapper::dir_opendir](#streamwrapper.dir-opendir) — Abrir un gestor de directorio
- [streamWrapper::dir_readdir](#streamwrapper.dir-readdir) — Lee un archivo en un directorio
- [streamWrapper::dir_rewinddir](#streamwrapper.dir-rewinddir) — Rebobina el gestor de directorio
- [streamWrapper::mkdir](#streamwrapper.mkdir) — Crear un directorio
- [streamWrapper::rename](#streamwrapper.rename) — Renombra un archivo o directorio
- [streamWrapper::rmdir](#streamwrapper.rmdir) — Elimina un directorio
- [streamWrapper::stream_cast](#streamwrapper.stream-cast) — Recuperar el recurso subyacente
- [streamWrapper::stream_close](#streamwrapper.stream-close) — Cerrar un recurso
- [streamWrapper::stream_eof](#streamwrapper.stream-eof) — Comprueba si un puntero a un archivo está en el final del archivo (EOF)
- [streamWrapper::stream_flush](#streamwrapper.stream-flush) — Vuelca la salida
- [streamWrapper::stream_lock](#streamwrapper.stream-lock) — Bloqueo de archivos asesorado
- [streamWrapper::stream_metadata](#streamwrapper.stream-metadata) — Cambiar los metadatos del flujo
- [streamWrapper::stream_open](#streamwrapper.stream-open) — Abre un archivo o una URL
- [streamWrapper::stream_read](#streamwrapper.stream-read) — Lee desde el flujo
- [streamWrapper::stream_seek](#streamwrapper.stream-seek) — Coloca el puntero de flujo en una posición
- [streamWrapper::stream_set_option](#streamwrapper.stream-set-option) — Cambia las opciones del flujo
- [streamWrapper::stream_stat](#streamwrapper.stream-stat) — Recuperar información sobre un recurso de archivo
- [streamWrapper::stream_tell](#streamwrapper.stream-tell) — Recuperar la posición actual de un flujo
- [streamWrapper::stream_truncate](#streamwrapper.stream-truncate) — Truncar un flujo
- [streamWrapper::stream_write](#streamwrapper.stream-write) — Escribir en un flujo
- [streamWrapper::unlink](#streamwrapper.unlink) — Borrar un archivo
- [streamWrapper::url_stat](#streamwrapper.url-stat) — Lee la información sobre un fichero

# Funciones de Flujos

# stream_bucket_append

(PHP 5, PHP 7, PHP 8)

stream_bucket_append —
Añade un compartimento al cuerpo

### Descripción

**stream_bucket_append**([resource](#language.types.resource) $brigade, [object](#language.types.object) $bucket): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Historial de cambios

      Versión
      Descripción






      8.4.0
      bucket ahora espera una instancia de **StreamBucket**; anteriormente, se esperaba una [stdClass](#class.stdclass).


# stream_bucket_make_writeable

(PHP 5, PHP 7, PHP 8)

stream_bucket_make_writeable —
Devuelve un objeto de compartimento desde el cuerpo para operaciones sobre el mismo

### Descripción

**stream_bucket_make_writeable**([resource](#language.types.resource) $brigade): [?](#language.types.null)StreamBucket

Esta función es llamada cuando hay necesidad de acceder y operar sobre el contenido comprendido en una brigada.
Típicamente llamada desde [php_user_filter::filter()](#php-user-filter.filter).

### Parámetros

     brigade


       La brigada desde donde devolver un objeto bucket.





### Valores devueltos

Devuelve un objeto bucket o **[null](#constant.null)**.

### Historial de cambios

      Versión
      Descripción






      8.4.0
      Esta función ahora retorna una instancia de **StreamBucket**; anteriormente, se retornaba una [stdClass](#class.stdclass).


### Ver también

    - [stream_bucket_append()](#function.stream-bucket-append) - Añade un compartimento al cuerpo

    - [stream_bucket_prepend()](#function.stream-bucket-prepend) - Añadir inicialmente un bucket a una brigada

# stream_bucket_new

(PHP 5, PHP 7, PHP 8)

stream_bucket_new —
Crea un nuevo compartimento para utilizarlo en el flujo actual

### Descripción

**stream_bucket_new**([resource](#language.types.resource) $stream, [string](#language.types.string) $buffer): StreamBucket

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Historial de cambios

      Versión
      Descripción






      8.4.0
      Esta función ahora retorna una instancia de **StreamBucket**; anteriormente, se retornaba una [stdClass](#class.stdclass).


# stream_bucket_prepend

(PHP 5, PHP 7, PHP 8)

stream_bucket_prepend —
Añadir inicialmente un bucket a una brigada

### Descripción

**stream_bucket_prepend**([resource](#language.types.resource) $brigade, StreamBucket $bucket): [void](language.types.void.html)

Esta función puede ser llamada para añadir un bucket a una
brigada de buckets. Es típicamente llamada desde el método
[php_user_filter::filter()](#php-user-filter.filter).

### Parámetros

    brigade


      brigade es un recurso que apunta a
      una bucket brigade que contiene uno
      o varios objetos bucket.






    bucket


      Un objeto bucket.


### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.4.0
      bucket ahora espera una instancia de **StreamBucket**; anteriormente, se esperaba una [stdClass](#class.stdclass).


### Ejemplos

    **Ejemplo #1 Ejemplo con stream_bucket_prepend()**

&lt;?php

class foo extends php_user_filter {
protected $calls = 0;
  public function filter($in, $out, &amp;$consumed, $closing) {
    while ($bucket = stream_bucket_make_writeable($in)) {
      $consumed += $bucket-&gt;datalen;
      if ($this-&gt;calls++ == 2) {
// Este bucket aparecerá antes que cualquier otro bucket.
stream_bucket_prepend($in, $bucket);
}
}
return PSFS_FEED_ME;
}
}
stream_filter_register('test', 'foo');
print file_get_contents('php://filter/read=test/resource=foo');
?&gt;

# stream_context_create

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

stream_context_create — Crea un contexto de flujo

### Descripción

**stream_context_create**([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**, [?](#language.types.null)[array](#language.types.array) $params = **[null](#constant.null)**): [resource](#language.types.resource)

Crea y devuelve un contexto de flujo, con los parámetros proporcionados
por options.

### Parámetros

     options


       Debe ser un array asociativo, en el formato
       $arr['wrapper']['option'] = $value o **[null](#constant.null)**.
       Consulte las [opciones de contexto](#context)
       para obtener una lista de las envolturas y opciones disponibles.




       Por omisión **[null](#constant.null)**.






     params


       Debe ser un array asociativo
       de formato $arr['parameter'] = $value o **[null](#constant.null)**.
       Consulte la documentación sobre los
       [parámetros de contexto](#context.params) para obtener una lista
       de los parámetros de flujo estándar.





### Valores devueltos

Un recurso que representa el contexto del flujo.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       options y params ahora son nullable.



### Ejemplos

**Ejemplo #1 Ejemplo con stream_context_create()**

&lt;?php

$opts = [
'http' =&gt; [
'method' =&gt; "GET",
// Utilice CRLF \r\n para separar múltiples encabezados
'header' =&gt; "Accept-language: en\r\n" .
"Cookie: foo=bar",
]
];

$context = stream_context_create($opts);

/_ Envía una petición HTTP a www.example.com
con los encabezados adicionales anteriores _/
$fp = fopen('http://www.example.com', 'r', false, $context);
fpassthru($fp);
fclose($fp);
?&gt;

### Ver también

- [stream_context_set_option()](#function.stream-context-set-option) - Configura una opción para un flujo/gestor/contexto

- La lista de gestores ([Protocolos y Envolturas soportados](#wrappers))

- Las opciones de contexto ([Opciones y parámetros de contexto](#context))

# stream_context_get_default

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

stream_context_get_default — Lee el contexto por defecto de los flujos

### Descripción

**stream_context_get_default**([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [resource](#language.types.resource)

**stream_context_get_default()** devuelve el contexto por
defecto que se utiliza con las funciones de ficheros como
[fopen()](#function.fopen), [file_get_contents()](#function.file-get-contents), etc,
cuando se utilizan sin parámetro de contexto. Las opciones del contexto
por defecto pueden especificarse opcionalmente con la misma
sintaxis que para [stream_context_create()](#function.stream-context-create).

### Parámetros

     options


       options debe ser un array asociativo
       de arrays asociativos, en el formato
       $arr['wrapper']['option'] = $value o **[null](#constant.null)**.



### Valores devueltos

Un [resource](#language.types.resource) de contexto de flujo.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       options es ahora nullable.



### Ejemplos

     **Ejemplo #1 Ejemplo con stream_context_get_default()**

&lt;?php
$default_opts = [
'http' =&gt; [
'method' =&gt; "GET",
'header' =&gt; "Accept-language: en\r\n" .
"Cookie: foo=bar",
'proxy' =&gt; "tcp://10.54.1.39:8000",
]
];

$alternate_opts = [
'http' =&gt; [
'method' =&gt; "POST",
'header' =&gt; "Content-type: application/x-www-form-urlencoded\r\n" .
"Content-length: " . strlen("baz=bomb"),
'content' =&gt; "baz=bomb",
]
];

$default = stream_context_get_default($default_opts);
$alternate = stream_context_create($alternate_opts);

/\* Envía una petición GET clásica a un servidor proxy 10.54.1.39

- hacia www.example.com, utilizando las opciones de contexto especificadas
- en $default_opts
  \*/
  readfile('http://www.example.com');

/\* Envía una petición POST directamente a www.example.com

- Utiliza las opciones de contexto de $alternate_opts
  \*/
  readfile('http://www.example.com', false, $alternate);

?&gt;

### Ver también

    - [stream_context_create()](#function.stream-context-create) - Crea un contexto de flujo

    - [stream_context_set_default()](#function.stream-context-set-default) - Configura el contexto predeterminado de los flujos

    - Lista de gestores soportados con las opciones de contexto ([Protocolos y Envolturas soportados](#wrappers)).

# stream_context_get_options

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

stream_context_get_options — Recuperar las opciones para un flujo/envoltura/contexto

### Descripción

**stream_context_get_options**([resource](#language.types.resource) $stream_or_context): [array](#language.types.array)

Devuelve una matriz de opciones del el flujo o contexto especificados.

### Parámetros

     stream_or_context


       El stream (flujo) o context (contexto) de donde se van a obtener las opciones





### Valores devueltos

Devuelve una matriz asociativa con las opciones.

### Ejemplos

    **Ejemplo #1 Ejemplo de stream_context_get_options()**

&lt;?php
$params = array("método" =&gt; "POST");

stream_context_set_default(array("http" =&gt; $params));

var_dump(stream_context_get_options(stream_context_get_default()));

?&gt;

    Resultado del ejemplo anterior es similar a:

array(1) {
["http"]=&gt;
array(1) {
["método"]=&gt;
string(4) "POST"
}
}

# stream_context_get_params

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

stream_context_get_params — Lee los parámetros de un contexto

### Descripción

**stream_context_get_params**([resource](#language.types.resource) $context): [array](#language.types.array)

**stream_context_get_params()** lee los parámetros
del contexto o del flujo stream_or_context.

### Parámetros

     context


       Un [resource](#language.types.resource) de flujo o de
       [contexto](#context).





### Valores devueltos

Devuelve un array asociativo que contiene las opciones de contexto y
su valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con stream_context_get_params()**



     Ejemplo simple.

&lt;?php
$ctx = stream_context_create();
$params = array("notification" =&gt; "stream_notification_callback");
stream_context_set_params($ctx, $params);

var_dump(stream_context_get_params($ctx));
?&gt;

    Resultado del ejemplo anterior es similar a:

array(2) {
["notification"]=&gt;
string(28) "stream_notification_callback"
["options"]=&gt;
array(0) {
}
}

### Ver también

    - [stream_context_set_option()](#function.stream-context-set-option) - Configura una opción para un flujo/gestor/contexto

    - [stream_context_set_params()](#function.stream-context-set-params) - Configura los parámetros para un flujo/gestor/contexto

# stream_context_set_default

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

stream_context_set_default — Configura el contexto predeterminado de los flujos

### Descripción

**stream_context_set_default**([array](#language.types.array) $options): [resource](#language.types.resource)

Configura el contexto predeterminado de los flujos que será utilizado cada vez
que un fichero sea manipulado ([fopen()](#function.fopen), [file_get_contents()](#function.file-get-contents),
etc.) sin parámetro de contexto. Utiliza la misma sintaxis que
[stream_context_create()](#function.stream-context-create).

### Parámetros

     options


       Las opciones a configurar para el contexto predeterminado.



      **Nota**:



        options debe ser un array asociativo
        de arrays asociativos, en el formato
        $arr['gestor']['opción'] = $valor.






### Valores devueltos

Devuelve el contexto de flujo predeterminado.

### Ejemplos

    **Ejemplo #1 Ejemplo con stream_context_set_default()**

&lt;?php
$default_opts = [
'http' =&gt; [
'method' =&gt; "GET",
'header' =&gt; "Accept-language: en\r\n" .
"Cookie: foo=bar",
'proxy' =&gt; "tcp://10.54.1.39:8000",
]
];

$default = stream_context_set_default($default_opts);

/\* Envía una petición GET al servidor proxy 10.54.1.39

- para www.example.com, utilizando las opciones de contexto especificadas en $default_opts
  \*/
  readfile('http://www.example.com');
  ?&gt;

### Ver también

    - [stream_context_create()](#function.stream-context-create) - Crea un contexto de flujo

    - [stream_context_get_default()](#function.stream-context-get-default) - Lee el contexto por defecto de los flujos

    - Lista de gestores de flujos con sus opciones de contexto ([Protocolos y Envolturas soportados](#wrappers)).

# stream_context_set_option

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

stream_context_set_option — Configura una opción para un flujo/gestor/contexto

### Descripción

**stream_context_set_option**(
    [resource](#language.types.resource) $stream_or_context,
    [string](#language.types.string) $wrapper,
    [string](#language.types.string) $option_name,
    [mixed](#language.types.mixed) $value
): [bool](#language.types.boolean)

La firma alternativa siguiente está obsoleta a partir de PHP 8.4.0,
utilice [stream_context_set_options()](#function.stream-context-set-options) en su lugar.

    **stream_context_set_option**([resource](#language.types.resource) $stream_or_context, [array](#language.types.array) $options): [bool](#language.types.boolean)

**stream_context_set_option()** define una opción
para el contexto especificado. El valor value
se define para la option para el contexto
wrapper.

### Parámetros

     stream_or_context


       El flujo o el recurso de contexto al que se aplica la opción.






     wrapper


       El nombre del gestor (que puede ser diferente del protocolo).
       Consulte la sección sobre los [contextos](#context) para
       conocer la lista de parámetros estándar de flujo.






     option_name


       El nombre de la opción.






      value


        El valor de la opción.






     options


       La opción a definir para el parámetro stream_or_context.



      **Nota**:



        El parámetro options debe ser un
        array asociativo de arrays asociativos, en el formato
        $arr['wrapper']['option'] = $value.




        Consulte la sección sobre los
        [contextos](#context) para
        conocer la lista de parámetros estándar de flujo.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       La firma alternativa con 2 parámetros está ahora obsoleta.
       Utilice [stream_context_set_options()](#function.stream-context-set-options) en su lugar.



# stream_context_set_options

(PHP 8 &gt;= 8.3.0)

stream_context_set_options — Define las opciones en el contexto especificado

### Descripción

**stream_context_set_options**([resource](#language.types.resource) $context, [array](#language.types.array) $options): [true](#language.types.singleton)

Define las opciones en el contexto especificado.

### Parámetros

     context


       El flujo o recurso de contexto en el cual aplicar las opciones.






     options


       Las opciones a definir para context.



      **Nota**:



        options debe ser un [array](#language.types.array) asociativo
        en el formato $array['wrapper']['option'] = $value.




        Ver [opciones y parámetros de contexto](#context)
        para una lista de las opciones de flujo.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de stream_context_set_options()**

&lt;?php

$context = stream_context_create();

$options = [
'http' =&gt; [
'protocol_version' =&gt; 1.1,
'user_agent' =&gt; 'PHPT Agent',
],
];

stream_context_set_options($context, $options);
var_dump(stream_context_get_options($context));
?&gt;

    El ejemplo anterior mostrará:

array(1) {
["http"]=&gt;
array(2) {
["protocol_version"]=&gt;
float(1.1)
["user_agent"]=&gt;
string(10) "PHPT Agent"
}
}

### Ver también

    - [stream_context_set_option()](#function.stream-context-set-option) - Configura una opción para un flujo/gestor/contexto

# stream_context_set_params

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

stream_context_set_params — Configura los parámetros para un flujo/gestor/contexto

### Descripción

**stream_context_set_params**([resource](#language.types.resource) $context, [array](#language.types.array) $params): [true](#language.types.singleton)

**stream_context_set_params()** define
los parámetros para el contexto especificado.

### Parámetros

     context


       El flujo o contexto al que se aplican los parámetros.






     params


       Un array asociativo de parámetros a definir en el formato siguiente:
       $params['paramname'] = "paramvalue";.




       <caption>**Parámetros admitidos**</caption>



          Parámetro
          Uso







           notification


           Nombre de la función de retrollamada definida por el usuario llamada cuando un flujo genera una notificación.
           Admitido únicamente por las envolturas de flujo [http://](#wrappers.http)
           y [ftp://](#wrappers.ftp).





           options


           Un array de opciones, como para las
           [opciones y parámetros de contexto](#context).









### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [stream_notification_callback()](#function.stream-notification-callback) - Una función de retrollamada para el parámetro de contexto notification

# stream_copy_to_stream

(PHP 5, PHP 7, PHP 8)

stream_copy_to_stream — Copia datos desde un flujo hacia otro

### Descripción

**stream_copy_to_stream**(
    [resource](#language.types.resource) $from,
    [resource](#language.types.resource) $to,
    [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**,
    [int](#language.types.integer) $offset = 0
): [int](#language.types.integer)|[false](#language.types.singleton)

Realiza una copia de hasta length bytes de datos desde la posición actual del puntero (o desde la posición offset, si se especifica) en el flujo from hacia el parámetro to. Si length no está especificado, se copiará todo el resto del flujo from.

### Parámetros

     from


       El flujo de origen






     to


       El flujo de destino






     length


       Número máximo de bytes a copiar. Por omisión, se copian todos los bytes restantes.






     offset


       El desplazamiento donde comenzar la copia de datos





### Valores devueltos

Devuelve el número total de bytes copiados, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       length ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con stream_copy_to_stream()**

&lt;?php
$src = fopen('http://www.example.com', 'r');
$dest1 = fopen('first1k.txt', 'w');
$dest2 = fopen('remainder.txt', 'w');

echo stream_copy_to_stream($src, $dest1, 1024) . " bytes copiados a first1k.txt\n";
echo stream_copy_to_stream($src, $dest2) . " bytes copiados a remainder.txt\n";

?&gt;

### Ver también

    - [copy()](#function.copy) - Copia un fichero

# stream_filter_append

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

stream_filter_append — Añade un filtro a un flujo al final de la lista

### Descripción

    **stream_filter_append**(

    [resource](#language.types.resource) $stream,
    [string](#language.types.string) $filtername,
    [int](#language.types.integer) $read_write = ?,
    [mixed](#language.types.mixed) $params = ?
): [resource](#language.types.resource)

    **stream_filter_append()** añade el filtro
    filtername a la lista de filtros adjuntos al
    flujo stream.

### Parámetros

      stream


       El flujo de destino.






     filtername


       El nombre del filtro.






     read_write


       Por omisión, **stream_filter_append()** añadirá
       el filtro a la lista de filtros de lectura si el fichero se abrió
       en modo lectura (r y/o +). El
       filtro también se adjuntará a la lista de filtros de escritura
       si el fichero se abrió en modo escritura (w,
       a y/o +).
       **[STREAM_FILTER_READ](#constant.stream-filter-read)**,
       **[STREAM_FILTER_WRITE](#constant.stream-filter-write)**, y/o
       **[STREAM_FILTER_ALL](#constant.stream-filter-all)** pueden también ser utilizadas
       en el parámetro read_write para controlar
       este comportamiento.






     params


       Este filtro se añadirá con los parámetros
       params al *final* de
       la lista de filtros, y será llamado al final de las
       operaciones de filtros. Para añadir un filtro al principio
       de la lista, utilice la función
       [stream_filter_prepend()](#function.stream-filter-prepend).





### Valores devueltos

Devuelve un recurso en caso de éxito, o **[false](#constant.false)** si ocurre un error.
El recurso puede ser utilizado para referirse a la instancia de este filtro
durante una llamada a la función [stream_filter_remove()](#function.stream-filter-remove).

**[false](#constant.false)** es devuelto si stream no es un recurso
o si filtername no puede ser alcanzado.

### Ejemplos

      **Ejemplo #1 Controlar la aplicación de los filtros**




&lt;?php
// Apertura de un fichero de prueba en modo lectura/escritura
$fp = fopen('test.txt', 'w+');

/\* Se aplica el filtro ROT13 al flujo de escritura, pero no al

- de lectura \*/
  stream_filter_append($fp, "string.rot13", STREAM_FILTER_WRITE);

/\* Se añade una simple cadena al fichero, será

- transformada por ROT13 al escribir \*/
  fwrite($fp, "Ceci est un test\n");

/_ Se vuelve al principio del fichero _/
rewind($fp);

/\* Se lee el contenido del fichero.

- Si se aplicara el filtro ROT13 tendríamos la
- cadena en su estado original \*/
  fpassthru($fp);

fclose($fp);

/\* Resultado esperado

---

Guvf vf n grfg

\*/
?&gt;

### Notas

**Nota**:
**Cuando se utilizan filtros personalizados**

    **stream_register_filter()** debe ser llamada antes
    de **stream_filter_append()** para registrar el filtro
    bajo el nombre de filtername.

**Nota**:

    Los datos del flujo (locales y remotos) son devueltos en fragmentos,
    los datos no procesados se conservan en el búfer interno.
    Cuando un nuevo filtro es añadido al final del flujo, los datos en
    el búfer interno son pasados al nuevo filtro en ese momento.
    Esto es diferente del comportamiento de
    [stream_filter_prepend()](#function.stream-filter-prepend).

**Nota**:

    Cuando un filtro es añadido para lectura y escritura, se crean dos instancias
    del filtro. [stream_filter_prepend()](#function.stream-filter-prepend) debe ser
    llamada dos veces con **[STREAM_FILTER_READ](#constant.stream-filter-read)** y
    **[STREAM_FILTER_WRITE](#constant.stream-filter-write)** para obtener los recursos de los filtros.

### Ver también

- [stream_filter_register()](#function.stream-filter-register) - Registra un filtro de flujo

- [stream_filter_prepend()](#function.stream-filter-prepend) - Adjunta un filtro a un flujo al inicio de la lista

- [stream_get_filters()](#function.stream-get-filters) - Lista los filtros registrados

# stream_filter_prepend

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

stream_filter_prepend — Adjunta un filtro a un flujo al inicio de la lista

### Descripción

**stream_filter_prepend**(
    [resource](#language.types.resource) $stream,
    [string](#language.types.string) $filtername,
    [int](#language.types.integer) $read_write = ?,
    [mixed](#language.types.mixed) $params = ?
): [resource](#language.types.resource)

**stream_filter_prepend()** añade el filtro
filtername a la lista de filtros adjuntos al
flujo stream.

### Parámetros

     stream


       El flujo de destino.






     filtername


       El nombre del filtro.






     read_write


       Por omisión, **stream_filter_prepend()**
       adjuntará el filtro a la cadena de filtros de lectura
       si el fichero ha sido abierto en modo lectura (es decir, modo
       r, y/o +). El filtro
       también será adjuntado a la cadena de filtros de escritura
       si el fichero ha sido abierto en modo escritura (es decir, modo
       w, a, y/o +).
       **[STREAM_FILTER_READ](#constant.stream-filter-read)**,
       **[STREAM_FILTER_WRITE](#constant.stream-filter-write)**, y/o
       **[STREAM_FILTER_ALL](#constant.stream-filter-all)** pueden también ser pasados en el
       parámetro read_write para imponer el comportamiento
       deseado. Véase [stream_filter_append()](#function.stream-filter-append) para un ejemplo
       de uso de este parámetro.






     params


       El filtro será añadido con los parámetros especificados en params,
       al *inicio* de la lista, y será llamado en primer lugar
       en las operaciones del flujo. Para añadir un filtro al final de la lista,
       utilice [stream_filter_append()](#function.stream-filter-append).





### Valores devueltos

Devuelve un recurso en caso de éxito, o **[false](#constant.false)** en caso de error.
El recurso puede ser utilizado para referirse a esta instancia de filtro
durante una llamada a la función [stream_filter_remove()](#function.stream-filter-remove).

**[false](#constant.false)** es devuelto si stream no es un recurso,
o si filtername no puede ser alcanzado.

### Notas

**Nota**:
**Cuando se utilizan filtros personalizados**

    **stream_register_filter()** debe ser llamada antes
    que **stream_filter_prepend()** para registrar el filtro
    bajo el nombre de filtername.

**Nota**:

    Los datos del flujo (locales y remotos) son devueltos en fragmentos,
    los datos no encaminados son conservados en el búfer interno.
    Cuando un nuevo filtro es añadido al inicio del flujo, los datos en
    el búfer interno no son *pasados* al nuevo
    filtro en ese momento. Esto es diferente del comportamiento de
    [stream_filter_append()](#function.stream-filter-append).

**Nota**:

    Cuando un filtro es añadido para lectura y escritura, se crean dos instancias
    del filtro. **stream_filter_prepend()** debe ser
    llamada dos veces con **[STREAM_FILTER_READ](#constant.stream-filter-read)** y
    **[STREAM_FILTER_WRITE](#constant.stream-filter-write)** para obtener los recursos de los filtros.

### Ver también

- [stream_filter_register()](#function.stream-filter-register) - Registra un filtro de flujo

- [stream_filter_append()](#function.stream-filter-append) - Añade un filtro a un flujo al final de la lista

# stream_filter_register

(PHP 5, PHP 7, PHP 8)

stream_filter_register — Registra un filtro de flujo

### Descripción

**stream_filter_register**([string](#language.types.string) $filter_name, [string](#language.types.string) $class): [bool](#language.types.boolean)

**stream_filter_register()** permite implementar
un filtro de flujo personalizado, para ser utilizado con las funciones de acceso
a datos externos (como [fopen()](#function.fopen),
[fread()](#function.fread), etc.).

### Parámetros

     filter_name


       El nombre del filtro a registrar.






     class


       Para crear una clase de filtro, se debe definir una clase que
       extienda la clase [php_user_filter](#class.php-user-filter).
       Al realizar operaciones
       de lectura y escritura en el flujo al que esté adjunto el filtro,
       PHP pasará los datos a través del filtro (y de todos los otros
       filtros adjuntos), de manera que los datos sean modificados
       según lo deseado. Se deben implementar los métodos tal como
       se describe en [php_user_filter](#class.php-user-filter), de lo contrario
       se producirán comportamientos indefinidos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**stream_filter_register()** debe devolver siempre **[false](#constant.false)** si
el parámetro filter_name ya está definido.

### Ejemplos

    **Ejemplo #1 Filtro de letras mayúsculas en el flujo foo-bar.txt**



     El ejemplo siguiente implementa un filtro llamado
     strtoupper, en el flujo foo-bar.txt,
     que convierte a mayúsculas todas las letras escritas/leídas desde este flujo.

&lt;?php

/_ Definición de la clase _/
class strtoupper_filter extends php_user_filter {
function filter($in, $out, &amp;$consumed, $closing)
  {
    while ($bucket = stream_bucket_make_writeable($in)) {
      $bucket-&gt;data = strtoupper($bucket-&gt;data);
$consumed += $bucket-&gt;datalen;
      stream_bucket_append($out, $bucket);
}
return PSFS_PASS_ON;
}
}

/_ Registro de nuestro filtro con PHP _/
stream_filter_register("strtoupper", "strtoupper_filter")
or die("Error al registrar el filtro");

$fp = fopen("foo-bar.txt", "w");

/_ Adjuntar el filtro registrado al flujo que acabamos de abrir _/
stream_filter_append($fp, "strtoupper");

fwrite($fp, "Línea1\n");
fwrite($fp, "Palabra - 2\n");
fwrite($fp, "Fácil como 123\n");

fclose($fp);

/_ Lectura del contenido _/
readfile("foo-bar.txt");

?&gt;

    El ejemplo anterior mostrará:

LÍNEA1
PALABRA - 2
FÁCIL COMO 123

    **Ejemplo #2 Registro de una clase de filtro genérica para coincidir
     con múltiples nombres de filtros**

&lt;?php

/_ Definición de la clase _/
class string_filter extends php_user_filter {
var $mode;

function filter($in, $out, &amp;$consumed, $closing)
  {
    while ($bucket = stream_bucket_make_writeable($in)) {
      if ($this-&gt;mode == 1) {
$bucket-&gt;data = strtoupper($bucket-&gt;data);
} elseif ($this-&gt;mode == 0) {
        $bucket-&gt;data = strtolower($bucket-&gt;data);
}

      $consumed += $bucket-&gt;datalen;
      stream_bucket_append($out, $bucket);
    }
    return PSFS_PASS_ON;

}

function onCreate()
{
if ($this-&gt;filtername == 'str.toupper') {
      $this-&gt;mode = 1;
    } elseif ($this-&gt;filtername == 'str.tolower') {
$this-&gt;mode = 0;
} else {
/_ Se solicitan algunos otros filtros str._, manejo del error con PHP \*/
return false;
}

    return true;

}
}

/_ Registro de nuestro filtro con PHP _/
stream_filter_register("str.\*", "string_filter")
or die("Error al registrar el filtro");

$fp = fopen("foo-bar.txt", "w");

/_ Adjuntar el filtro registrado al flujo que acabamos de abrir
Podemos alternativamente pasar a str.tolower aquí _/
stream_filter_append($fp, "str.toupper");

fwrite($fp, "Línea1\n");
fwrite($fp, "Palabra - 2\n");
fwrite($fp, "Fácil como 123\n");

fclose($fp);

/_ Lectura del contenido _/
readfile("foo-bar.txt");

?&gt;

    El ejemplo anterior mostrará:

LÍNEA1
PALABRA - 2
FÁCIL COMO 123

### Ver también

    - [stream_wrapper_register()](#function.stream-wrapper-register) - Registra un gestor de URL

    - [stream_filter_append()](#function.stream-filter-append) - Añade un filtro a un flujo al final de la lista

    - [stream_filter_prepend()](#function.stream-filter-prepend) - Adjunta un filtro a un flujo al inicio de la lista

# stream_filter_remove

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

stream_filter_remove — Elimina un filtro de un flujo

### Descripción

**stream_filter_remove**([resource](#language.types.resource) $stream_filter): [bool](#language.types.boolean)

Elimina un filtro de flujo previamente añadido al flujo con
[stream_filter_prepend()](#function.stream-filter-prepend) o
[stream_filter_append()](#function.stream-filter-append). Cualquier información restante en el
buffer interno del filtro será volcada al siguiente filtro antes de
eliminarla.

### Parámetros

     stream_filter


       El filtro de flujo a eliminar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Refiltrar dináminamente un flujo**

&lt;?php
/_ Abrir un archivo de prueba para lectura y escritura _/
$fp = fopen("prueba.txt", "rw");

$filtro_rot13 = stream_filter_append($fp, "string.rot13", STREAM_FILTER_WRITE);
fwrite($fp, "Esto es ");
stream_filter_remove($filtro_rot13);
fwrite($fp, "una prueba\n");

rewind($fp);
fpassthru($fp);
fclose($fp);

?&gt;

    El ejemplo anterior mostrará:

Rfgb rf una prueba

### Ver también

    - [stream_filter_register()](#function.stream-filter-register) - Registra un filtro de flujo

    - [stream_filter_append()](#function.stream-filter-append) - Añade un filtro a un flujo al final de la lista

    - [stream_filter_prepend()](#function.stream-filter-prepend) - Adjunta un filtro a un flujo al inicio de la lista

# stream_get_contents

(PHP 5, PHP 7, PHP 8)

stream_get_contents — Lee todo un flujo en un string

### Descripción

**stream_get_contents**([resource](#language.types.resource) $stream, [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**, [int](#language.types.integer) $offset = -1): [string](#language.types.string)|[false](#language.types.singleton)

**stream_get_contents()** es idéntica a
[file_get_contents()](#function.file-get-contents), salvo que opera sobre
un puntero de fichero ya abierto y devuelve el contenido restante, hasta
length bytes, en un string y comenzando en la posición
offset.

### Parámetros

     stream ([resource](#language.types.resource))


       Un [resource](#language.types.resource) de flujo (por ejemplo, devuelto por la función [fopen()](#function.fopen))






     length ([int](#language.types.integer))


       El número máximo de bytes a leer. Por omisión, **[null](#constant.null)**
       (lee todo el contenido restante del buffer).






     offset ([int](#language.types.integer))


       Se desplaza a la posición especificada antes de la lectura. Si el número
       pasado es negativo, no se realizará ningún desplazamiento y la lectura
       comenzará desde la posición actual.





### Valores devueltos

Devuelve un [string](#language.types.string) o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       length ahora es nullable.



### Ejemplos

**Ejemplo #1 Ejemplo con stream_get_contents()**

&lt;?php

if ($stream = fopen('http://www.example.com', 'r')) {
    // muestra toda la página, comenzando en la posición 10
    echo stream_get_contents($stream, -1, 10);

    fclose($stream);

}

if ($stream = fopen('http://www.exemple.net', 'r')) {
    // Muestra los 5 primeros bytes
    echo stream_get_contents($stream, 5);

    fclose($stream);

}

?&gt;

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

**Nota**:

    Cuando se especifica un valor de length distinto de **[null](#constant.null)**, esta función asignará
    inmediatamente un buffer interno de ese tamaño, incluso si el
    contenido real es significativamente más corto.

### Ver también

    - [fgets()](#function.fgets) - Recupera la línea actual a partir de la posición del puntero de archivo

    - [fread()](#function.fread) - Lectura del archivo en modo binario

    - [fpassthru()](#function.fpassthru) - Muestra el resto del fichero

# stream_get_filters

(PHP 5, PHP 7, PHP 8)

stream_get_filters — Lista los filtros registrados

### Descripción

**stream_get_filters**(): [array](#language.types.array)

**stream_get_filters()** lee la lista
de los filtros registrados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array indexado que contiene la lista de los filtros
de flujo disponibles en el sistema.

### Ejemplos

    **Ejemplo #1 Ejemplo con stream_get_filters()**

&lt;?php
$streamlist = stream_get_filters();
print_r($streamlist);
?&gt;

     Resultado del ejemplo anterior es similar a:

Array (
[0] =&gt; string.rot13
[1] =&gt; string.toupper
[2] =&gt; string.tolower
[3] =&gt; string.base64
[4] =&gt; string.quoted-printable
)

### Ver también

- [stream_filter_register()](#function.stream-filter-register) - Registra un filtro de flujo

- [stream_get_wrappers()](#function.stream-get-wrappers) - Lista los gestores de flujo

# stream_get_line

(PHP 5, PHP 7, PHP 8)

stream_get_line — Lee una línea en un flujo

### Descripción

**stream_get_line**([resource](#language.types.resource) $stream, [int](#language.types.integer) $length, [string](#language.types.string) $ending = ""): [string](#language.types.string)|[false](#language.types.singleton)

**stream_get_line()** lee una línea en el recurso
handle.

La lectura termina cuando se han leído length bytes,
cuando se encuentra la cadena no vacía especificada por
ending (pero _no se incluirá_
en el valor devuelto), o si ocurre EOF: cualquiera de los tres
que ocurra primero.

Esta función es casi idéntica a [fgets()](#function.fgets) excepto
que permite usar un delimitador de línea diferente de los caracteres estándar
\n, \r y \r\n,
y _no devuelve_ el delimitador en sí.

### Parámetros

     stream


       Un [resource](#language.types.resource) válido de fichero.






     length


       El número máximo de bytes a leer desde el gestor.
       Los valores negativos no están soportados.
       Cero (0) significa el tamaño de chunk de socket por defecto,
       es decir, 8192 bytes.






     ending


       Un delimitador de cadena opcional.





### Valores devueltos

**stream_get_line()** lee una línea de tamaño máximo
length en el flujo stream o **[false](#constant.false)** si ocurre un error.

### Ver también

- [fread()](#function.fread) - Lectura del archivo en modo binario

- [fgets()](#function.fgets) - Recupera la línea actual a partir de la posición del puntero de archivo

- [fgetc()](#function.fgetc) - Lee un carácter en un fichero

# stream_get_meta_data

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

stream_get_meta_data — Lee los encabezados y metadatos de los flujos

### Descripción

**stream_get_meta_data**([resource](#language.types.resource) $stream): [array](#language.types.array)

Devuelve la información disponible sobre el flujo stream.

### Parámetros

     stream


       El flujo puede ser cualquier flujo creado por las funciones
       [fopen()](#function.fopen), [fsockopen()](#function.fsockopen),
       [pfsockopen()](#function.pfsockopen) y [stream_socket_client()](#function.stream-socket-client).





### Valores devueltos

El array resultante puede contener los siguientes elementos:

- timed_out ([bool](#language.types.boolean)) : **[true](#constant.true)** si el flujo
  ha alcanzado el tiempo límite de espera de datos durante la última llamada a las funciones
  [fread()](#function.fread) y [fgets()](#function.fgets).

- blocked ([bool](#language.types.boolean)) : **[true](#constant.true)** si el flujo está en modo bloqueante.
  Véase también [stream_set_blocking()](#function.stream-set-blocking).

- eof ([bool](#language.types.boolean)) : **[true](#constant.true)** si el flujo ha alcanzado el final del fichero.
  Tenga en cuenta que para los sockets, este valor puede ser **[true](#constant.true)** incluso si unread_bytes
  no es nulo. Para determinar si quedan datos por leer, utilice en su lugar la función [feof()](#function.feof).

- unread_bytes ([int](#language.types.integer)) : el número de bytes actualmente colocados en el búfer interno de PHP.

    **Nota**:

    No se debería utilizar este valor en un script.

- stream_type ([string](#language.types.string)) : un nombre que describe la implementación subyacente del flujo.

- wrapper_type ([string](#language.types.string)) : un nombre que describe el gestor de protocolo para este flujo.
  Véase [Protocolos y Envolturas soportados](#wrappers) para más información sobre los gestores.

- wrapper_data (mixed) : datos específicos del gestor asociados a este flujo.
  Véase [Protocolos y Envolturas soportados](#wrappers) para más información sobre los gestores y sus datos.

- mode ([string](#language.types.string)) : el tipo de acceso requerido para este flujo
  (véase la tabla 1 de la referencia de la función [<a href="#function.fopen" class="function">fopen()](#function.fopen)</a>).

- seekable ([bool](#language.types.boolean)) : si se puede buscar en el flujo actual.

- uri ([string](#language.types.string)) : la URI/nombre de fichero asociado a este flujo.

- crypto ([array](#language.types.array)) - los metadatos de la conexión TLS para este flujo.
  (Nota: Solo se proporciona cuando el recurso de flujo utiliza TLS).

### Ejemplos

    **Ejemplo #1 Ejemplo de stream_get_meta_data()** utilizando [fopen()](#function.fopen) con http

&lt;?php
$url = 'http://www.example.com/';

if (!$fp = fopen($url, 'r')) {
trigger_error("No se puede abrir la URL ($url)", E_USER_ERROR);
}

$meta = stream_get_meta_data($fp);

var_dump($meta);

fclose($fp);
?&gt;

    Resultado del ejemplo anterior es similar a:

array(10) {
'timed_out' =&gt;
bool(false)
'blocked' =&gt;
bool(true)
'eof' =&gt;
bool(false)
'wrapper_data' =&gt;
array(13) {
[0] =&gt;
string(15) "HTTP/1.1 200 OK"
[1] =&gt;
string(11) "Age: 244629"
[2] =&gt;
string(29) "Cache-Control: max-age=604800"
[3] =&gt;
string(38) "Content-Type: text/html; charset=UTF-8"
[4] =&gt;
string(35) "Date: Sat, 20 Nov 2021 18:17:57 GMT"
[5] =&gt;
string(24) "Etag: "3147526947+ident""
[6] =&gt;
string(38) "Expires: Sat, 27 Nov 2021 18:17:57 GMT"
[7] =&gt;
string(44) "Last-Modified: Thu, 17 Oct 2019 07:18:26 GMT"
[8] =&gt;
string(22) "Server: ECS (chb/0286)"
[9] =&gt;
string(21) "Vary: Accept-Encoding"
[10] =&gt;
string(12) "X-Cache: HIT"
[11] =&gt;
string(20) "Content-Length: 1256"
[12] =&gt;
string(17) "Connection: close"
}
'wrapper_type' =&gt;
string(4) "http"
'stream_type' =&gt;
string(14) "tcp_socket/ssl"
'mode' =&gt;
string(1) "r"
'unread_bytes' =&gt;
int(1256)
'seekable' =&gt;
bool(false)
'uri' =&gt;
string(23) "http://www.example.com/"
}

    **Ejemplo #2 Ejemplo de stream_get_meta_data()** utilizando [stream_socket_client()](#function.stream-socket-client) con https



     &lt;?php

$streamContext = stream_context_create(
[
'ssl' =&gt; [
'capture_peer_cert' =&gt; true,
'capture_peer_cert_chain' =&gt; true,
'disable_compression' =&gt; true,
],
]
);

$client = stream_socket_client(
'ssl://www.example.com:443',
$errorNumber,
$errorDescription,
40,
STREAM_CLIENT_CONNECT,
$streamContext
);

$meta = stream_get_meta_data($client);

var_dump($meta);
?&gt;

    Resultado del ejemplo anterior es similar a:

array(8) {
'crypto' =&gt;
array(4) {
'protocol' =&gt;
string(7) "TLSv1.3"
'cipher_name' =&gt;
string(22) "TLS_AES_256_GCM_SHA384"
'cipher_bits' =&gt;
int(256)
'cipher_version' =&gt;
string(7) "TLSv1.3"
}
'timed_out' =&gt;
bool(false)
'blocked' =&gt;
bool(true)
'eof' =&gt;
bool(false)
'stream_type' =&gt;
string(14) "tcp_socket/ssl"
'mode' =&gt;
string(2) "r+"
'unread_bytes' =&gt;
int(0)
'seekable' =&gt;
bool(false)
}

### Notas

**Nota**:

    Esta función no funciona en los sockets creados con [la extensión socket](#ref.sockets).

### Ver también

    - [get_headers()](#function.get-headers) - Devuelve todos los encabezados enviados por el servidor en respuesta a una petición HTTP

    - [$http_response_header](#reserved.variables.httpresponseheader)

# stream_get_transports

(PHP 5, PHP 7, PHP 8)

stream_get_transports — Lista los gestores de transporte de sockets disponibles

### Descripción

    **stream_get_transports**(): [array](#language.types.array)

**stream_get_transports()** devuelve un array indexado que contiene
los nombres de los transportes de sockets disponibles para el sistema.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array indexado de nombres de sockets de transporte.

### Ejemplos

      **Ejemplo #1 Ejemplo con stream_get_transports()**




&lt;?php
$xportlist = stream_get_transports();
print_r($xportlist);
?&gt;

    Resultado del ejemplo anterior es similar a:

Array (
[0] =&gt; tcp
[1] =&gt; udp
[2] =&gt; unix
[3] =&gt; udg
)
?&gt;

### Ver también

- [stream_get_filters()](#function.stream-get-filters) - Lista los filtros registrados

- [stream_get_wrappers()](#function.stream-get-wrappers) - Lista los gestores de flujo

# stream_get_wrappers

(PHP 5, PHP 7, PHP 8)

stream_get_wrappers — Lista los gestores de flujo

### Descripción

    **stream_get_wrappers**(): [array](#language.types.array)

**stream_get_wrappers()** lee la lista de los
gestores de flujo disponibles en el sistema actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**stream_get_wrappers()** devuelve un array indexado
que contiene el nombre de todos los gestores de flujo disponibles en
el sistema.

### Ejemplos

    **Ejemplo #1 Ejemplo con stream_get_wrappers()**

&lt;?php
print_r(stream_get_wrappers());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; php
[1] =&gt; file
[2] =&gt; http
[3] =&gt; ftp
[4] =&gt; compress.bzip2
[5] =&gt; compress.zlib
)

    **Ejemplo #2 Verificación de la existencia de un gestor de flujo**

&lt;?php
// Verificación de la existencia de un gestor de flujo bzip2
if (in_array('compress.bzip2', stream_get_wrappers())) {
echo 'compress.bzip2:// soporte activo.';
} else {
echo 'compress.bzip2:// soporte inactivo.';
}
?&gt;

### Ver también

- [stream_wrapper_register()](#function.stream-wrapper-register) - Registra un gestor de URL

# stream_is_local

(PHP 5 &gt;= 5.2.4, PHP 7, PHP 8)

stream_is_local — Verifica si un flujo es local

### Descripción

**stream_is_local**([resource](#language.types.resource)|[string](#language.types.string) $stream): [bool](#language.types.boolean)

**stream_is_local()** verifica si el flujo o
la URL stream_or_url es local al sistema o no.

### Parámetros

     stream


       El [resource](#language.types.resource) de flujo o la URL a verificar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con stream_is_local()**



     Ejemplo simple.

&lt;?php
var_dump(stream_is_local("http://example.com"));
var_dump(stream_is_local("/etc"));
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(false)
bool(true)

# stream_isatty

(PHP 7 &gt;= 7.2.0, PHP 8)

stream_isatty — Verifica si un flujo es un TTY

### Descripción

**stream_isatty**([resource](#language.types.resource) $stream): [bool](#language.types.boolean)

Determina si el flujo stream se refiere a un dispositivo de tipo terminal válido.
Esta es una versión más portable de [posix_isatty()](#function.posix-isatty),
ya que también funciona en sistemas Windows.

### Parámetros

    stream





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con stream_isatty()**



     Este comando puede ser utilizado para determinar si un flujo de salida / error estándar es redirigido a un fichero.



    php -r "var_export(stream_isatty(STDERR));"


    Resultado del ejemplo anterior es similar a:



     true

    php -r "var_export(stream_isatty(STDERR));" 2&gt;output.txt


    Resultado del ejemplo anterior es similar a:



     false

# stream_notification_callback

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

stream_notification_callback — Una función de retrollamada para el parámetro de contexto notification

### Descripción

stream_notification_callback(
    [int](#language.types.integer) $notification_code,
    [int](#language.types.integer) $severity,
    [?](#language.types.null)[string](#language.types.string) $message,
    [int](#language.types.integer) $message_code,
    [int](#language.types.integer) $bytes_transferred,
    [int](#language.types.integer) $bytes_max
): [void](language.types.void.html)

Una función de retrollamada de tipo [callable](#language.types.callable), utilizada por el
[parámetro de contexto notification](#context.params.notification),
llamada durante un evento.

**Nota**:

    Esto *no* es una función real, únicamente un prototipo de
    cómo debe ser la función.

### Parámetros

     notification_code


       Una de las constantes de notificación **[STREAM_NOTIFY_*](#constant.stream-notify-resolve)**.






     severity


       Una de las constantes de notificación **[STREAM_NOTIFY_SEVERITY_*](#constant.stream-notify-severity-info)**.






     message


       Pasado si un mensaje descriptivo está disponible para este evento.






     message_code


       Pasado si un código de mensaje descriptivo está disponible para este evento.




       El significado de este valor depende del gestor específico utilizado.






     bytes_transferred


       Si es posible, bytes_transferred será rellenado.






     bytes_max


       Si es posible, bytes_max será rellenado.





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Soporte para **[STREAM_NOTIFY_COMPLETED](#constant.stream-notify-completed)** implementado,
       las versiones anteriores de PHP nunca desencadenaban esta notificación.



### Ejemplos

    **Ejemplo #1 Ejemplo con stream_notification_callback()**

&lt;?php
function stream_notification_callback($notification_code, $severity, $message, $message_code, $bytes_transferred, $bytes_max) {

    switch($notification_code) {
        case STREAM_NOTIFY_RESOLVE:
        case STREAM_NOTIFY_AUTH_REQUIRED:
        case STREAM_NOTIFY_COMPLETED:
        case STREAM_NOTIFY_FAILURE:
        case STREAM_NOTIFY_AUTH_RESULT:
            var_dump($notification_code, $severity, $message, $message_code, $bytes_transferred, $bytes_max);
            /* Ignorar */
            break;

        case STREAM_NOTIFY_REDIRECTED:
            echo "Redirección a: ", $message;
            break;

        case STREAM_NOTIFY_CONNECT:
            echo "Conectado...";
            break;

        case STREAM_NOTIFY_FILE_SIZE_IS:
            echo "Obteniendo el tamaño del fichero: ", $bytes_max;
            break;

        case STREAM_NOTIFY_MIME_TYPE_IS:
            echo "Tipo mime encontrado: ", $message;
            break;

        case STREAM_NOTIFY_PROGRESS:
            echo "Descargando, ya ", $bytes_transferred, " bytes transferidos";
            break;
    }
    echo "\n";

}

$ctx = stream_context_create();
stream_context_set_params($ctx, array("notification" =&gt; "stream_notification_callback"));

file_get_contents("http://php.net/contact", false, $ctx);
?&gt;

    Resultado del ejemplo anterior es similar a:

Conectado...
Tipo mime encontrado: text/html; charset=utf-8
Redirección a: http://no.php.net/contact
Conectado...
Obteniendo el tamaño del fichero: 0
Tipo mime encontrado: text/html; charset=utf-8
Redirección a: http://no.php.net/contact.php
Conectado...
Obteniendo el tamaño del fichero: 4589
Tipo mime encontrado: text/html;charset=utf-8
Descargando, ya 0 bytes transferidos
Descargando, ya 0 bytes transferidos
Descargando, ya 0 bytes transferidos
Descargando, ya 1440 bytes transferidos
Descargando, ya 2880 bytes transferidos
Descargando, ya 4320 bytes transferidos
Descargando, ya 5760 bytes transferidos
Descargando, ya 6381 bytes transferidos
Descargando, ya 7002 bytes transferidos

    **Ejemplo #2 Barra de progreso simple para un cliente de descarga en línea de comandos**

&lt;?php
function usage($argv) {
echo "Uso:\n";
printf("\tphp %s &lt;http://example.com/file&gt; &lt;localfile&gt;\n", $argv[0]);
exit(1);
}

function stream_notification_callback($notification_code, $severity, $message, $message_code, $bytes_transferred, $bytes_max) {
static $filesize = null;

    switch($notification_code) {
    case STREAM_NOTIFY_RESOLVE:
    case STREAM_NOTIFY_AUTH_REQUIRED:
    case STREAM_NOTIFY_COMPLETED:
    case STREAM_NOTIFY_FAILURE:
    case STREAM_NOTIFY_AUTH_RESULT:
        /* Ignorar */
        break;

    case STREAM_NOTIFY_REDIRECTED:
        echo "Redirección a: ", $message, "\n";
        break;

    case STREAM_NOTIFY_CONNECT:
        echo "Conectado...\n";
        break;

    case STREAM_NOTIFY_FILE_SIZE_IS:
        $filesize = $bytes_max;
        echo "Tamaño del fichero: ", $filesize, "\n";
        break;

    case STREAM_NOTIFY_MIME_TYPE_IS:
        echo "Tipo Mime: ", $message, "\n";
        break;

    case STREAM_NOTIFY_PROGRESS:
        if ($bytes_transferred &gt; 0) {
            if (!isset($filesize)) {
                printf("\rTamaño del fichero desconocido.. %2d kb hechos..", $bytes_transferred/1024);
            } else {
                $length = (int) (($bytes_transferred/$filesize)*100);
                printf("\r[%-100s] %d%% (%2d/%2d kb)", str_repeat("=", $length). "&gt;", $length, ($bytes_transferred/1024), $filesize/1024);
            }
        }
        break;
    }

}

isset($argv[1], $argv[2]) or usage($argv);

$ctx = stream_context_create();
stream_context_set_params($ctx, array("notification" =&gt; "stream_notification_callback"));

$fp = fopen($argv[1], "r", false, $ctx);
if (is_resource($fp) &amp;&amp; file_put_contents($argv[2], $fp)) {
echo "\n¡Hecho!\n";
exit(0);
}

$err = error_get_last();
echo "\n¡Error!\n", $err["message"], "\n";
exit(1);
?&gt;

     Ejecute el ejemplo anterior con:
     php -n fetch.php
     http://no2.php.net/get/php-5-LATEST.tar.bz2/from/this/mirror
     php-latest.tar.bz2 mostrará algo similar a:

Conectado...
Tipo Mime: text/html; charset=utf-8
Redirección a: http://no2.php.net/distributions/php-5.2.5.tar.bz2
Conectado...
Tamaño del fichero: 7773024
Tipo Mime: application/octet-stream
[========================================&gt; ] 40% (3076/7590 kb)

### Ver también

    - [Contexto parámetros](#context.params)

# stream_register_wrapper

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

stream_register_wrapper — Alias de [stream_wrapper_register()](#function.stream-wrapper-register)

### Descripción

Esta función es un alias de: [stream_wrapper_register()](#function.stream-wrapper-register).

# stream_resolve_include_path

(PHP 5 &gt;= 5.3.2, PHP 7, PHP 8)

stream_resolve_include_path — Resuelve un nombre de fichero siguiendo las reglas de la ruta de inclusión

### Descripción

**stream_resolve_include_path**([string](#language.types.string) $filename): [string](#language.types.string)|[false](#language.types.singleton)

Resuelve el nombre de fichero filename utilizando
la ruta de inclusión, siguiendo las mismas reglas que las funciones
[fopen()](#function.fopen)/[include](#function.include).

### Parámetros

     filename


       El nombre de fichero a resolver.





### Valores devueltos

Devuelve un [string](#language.types.string) que contiene el nombre de fichero absoluto resuelto,
o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con stream_resolve_include_path()**



     Ejemplo simple de utilización.

&lt;?php
var_dump(stream_resolve_include_path("test.php"));
?&gt;

    Resultado del ejemplo anterior es similar a:

string(22) "/var/www/html/test.php"

# stream_select

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

stream_select — Supervisa la modificación de uno o varios flujos

### Descripción

**stream_select**(
    [?](#language.types.null)[array](#language.types.array) &amp;$read,
    [?](#language.types.null)[array](#language.types.array) &amp;$write,
    [?](#language.types.null)[array](#language.types.array) &amp;$except,
    [?](#language.types.null)[int](#language.types.integer) $seconds,
    [?](#language.types.null)[int](#language.types.integer) $microseconds = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)

**stream_select()** acepta un array de flujos y
espera a que alguno de ellos cambie de estado. Esta operación es
equivalente a lo que hace la función [socket_select()](#function.socket-select),
salvo que trabaja sobre un flujo.

### Parámetros

     read


       Los flujos que están listados en el parámetro read
       serán supervisados en lectura, es decir, si hay nuevos bytes
       disponibles para lectura (para ser precisos, si una lectura no
       bloqueará, lo que incluye también flujos que están al final de
       archivo, en cuyo caso una llamada a la función [fread()](#function.fread)
       retornará un string de tamaño 0).






     write


       Los flujos que están listados en el parámetro write
       serán supervisados en escritura (para ser precisos, si una escritura no
       bloqueará).






     except


       Los flujos que están listados en el parámetro except
       serán supervisados para ver si se lanza una excepción.



      **Nota**:



        Cuando **stream_select()** termina, los arrays
        read, write y
        except son modificados para indicar qué flujos
        han cambiado de estado actualmente.
        Las claves originales del array se preservan.







     seconds


       Los parámetros seconds y
       microseconds
       forman el *tiempo límite*,
       seconds especifica el número de segundos
       mientras que microseconds, el número de
       microsegundos. El parámetro timeout
       representa el límite superior del tiempo que
       **stream_select()** debe esperar antes de
       terminar. Si seconds y
       microseconds están ambos definidos
       a 0, **stream_select()** no esperará
       datos - en su lugar, terminará inmediatamente,
       indicando el estado actual del flujo.




       Si seconds vale **[null](#constant.null)**,
       **stream_select()** puede bloquearse indefinidamente,
       terminando únicamente cuando un evento en alguno de los flujos supervisados
       ocurra (o si una señal interrumpe la llamada al sistema).



      **Advertencia**

        Utilizar un valor de 0 permite
        probar instantáneamente el estado de los flujos, pero debe saberse
        que no se recomienda utilizar 0
        en un bucle, ya que esto hará que el script consuma una gran cantidad
        de procesador.




        Es mucho mejor especificar un valor de algunos segundos, incluso
        si se debe supervisar y ejecutar diferentes códigos de manera
        simultánea. Por ejemplo, utilizar un valor de al menos
        200000 microsegundos, se reducirá considerablemente
        el consumo de procesador del script.




        No se debe olvidar que el valor de expiración es la duración máxima
        de espera, si no ocurre nada: **stream_select()**
        retornará un resultado tan pronto como uno de los flujos suministrados esté listo para
        su uso.







     microseconds


       Véase la descripción de seconds.





### Valores devueltos

En caso de éxito, **stream_select()** retorna
el número de flujos que han cambiado, lo que puede ser 0, si
el tiempo límite fue alcanzado antes de que los flujos cambien.
En caso de error, la función retornará **[false](#constant.false)** y un
aviso será devuelto (esto puede ocurrir si la llamada
al sistema es interrumpida por una señal entrante).

### Historial de cambios

      Versión
      Descripción






      8.1.0

       microseconds ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con stream_select()**



     Este ejemplo supervisa si los datos llegan para ser
     leídos ya sea en $stream1 o en
     $stream2. Si el tiempo límite
     es 0, la función termina inmediatamente:

&lt;?php
/_ Preparación del array de flujos de lectura _/
$read   = array($stream1, $stream2);
$write = NULL;
$except = NULL;
if (false === ($num_changed_streams = stream_select($read, $write, $except, 0))) {
    /* Manejo de errores */
} elseif ($num_changed_streams &gt; 0) {
/_ Al menos uno de los flujos ha cambiado _/
}
?&gt;

### Notas

**Nota**:

    Debido a una limitación del motor Zend actual, no es posible
    pasar el valor **[null](#constant.null)** directamente como parámetro de una función
    que espera parámetros pasados por referencia. En su lugar,
    se recomienda utilizar una variable temporal, o una expresión
    cuyo miembro izquierdo sea una variable temporal. Como esto:

&lt;?php
$e = NULL;
stream_select($r, $w, $e, 0);
?&gt;

**Nota**:

    Asegúrese de utilizar el operador === cuando
    busque errores. Como **stream_select()** puede retornar
    0, una comparación realizada con ==
    lo evaluaría como **[true](#constant.true)**:

&lt;?php
$e = NULL;
if (false === stream_select($r, $w, $e, 0)) {
echo "stream_select() falló\n";
}
?&gt;

**Nota**:

    Si ha escrito o leído en un flujo que es retornado en los arrays
    de flujos, sea consciente de que estos flujos pueden no haber escrito
    o leído la totalidad de los datos solicitados. Sea
    capaz de leer un solo byte.

**Nota**:

    Algunos flujos (como zlib) no pueden ser
    seleccionados por esta función.

**Nota**:
**Compatibilidad con Windows**

    Utilizar la función **stream_select()**
    en un puntero de archivo retornado por [proc_open()](#function.proc-open)
    fallará y retornará **[false](#constant.false)** en Windows.




    **[STDIN](#constant.stdin)** desde una consola cambia su estado tan pronto como
    *cualquier* evento de entrada esté disponible,
    pero leer desde un flujo puede seguir siendo bloqueante.

### Ver también

- [stream_set_blocking()](#function.stream-set-blocking) - Configura el modo de bloqueo de un flujo

# stream_set_blocking

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

stream_set_blocking — Configura el modo de bloqueo de un flujo

### Descripción

**stream_set_blocking**([resource](#language.types.resource) $stream, [bool](#language.types.boolean) $enable): [bool](#language.types.boolean)

**stream_set_blocking()** configura el modo de bloqueo
del flujo stream.

Esta función funciona para todos los flujos que soportan el modo
no bloqueante (actualmente, los ficheros y los flujos de sockets).

### Parámetros

     stream


       El flujo.






     enable


       Si enable vale **[false](#constant.false)**,
       stream se configurará en modo no bloqueante,
       y si vale **[true](#constant.true)**, stream se configurará en
       modo bloqueante. Esta llamada afecta a las funciones tales como
       [fgets()](#function.fgets) y [fread()](#function.fread)
       que leen en flujos. En modo no bloqueante, la función
       [fgets()](#function.fgets) se ejecuta justo después de su llamada, mientras
       que en modo bloqueante, esperará datos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Notas

**Nota**:

    Esta función no tiene efecto para los ficheros locales bajo Windows. El modo no bloqueante no está soportado bajo Windows.

### Ver también

- [stream_select()](#function.stream-select) - Supervisa la modificación de uno o varios flujos

# stream_set_size

(No version information available, might only be in Git)

stream_set_size — Cambia el tamaño del segmento del flujo

### Descripción

**stream_set_size**([resource](#language.types.resource) $stream, [int](#language.types.integer) $size): [int](#language.types.integer)

Cambia el tamaño del segmento del flujo.

### Parámetros

    stream


      El flujo en cuestión.






    size


      El nuevo tamaño de segmento deseado.


### Valores devueltos

Devuelve el tamaño anterior del segmento en caso de éxito.

### Errores/Excepciones

Se lanza un [ValueError](#class.valueerror) si size
es inferior a 1 o mayor que **[PHP_INT_MAX](#constant.php-int-max)**.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Ahora se lanza un [ValueError](#class.valueerror) si
        size es inferior a 1 o superior a
        **[PHP_INT_MAX](#constant.php-int-max)**. Anteriormente, se emitía un
        error de nivel **[E_WARNING](#constant.e-warning)** y se devolvía **[false](#constant.false)**.





# stream_set_read_buffer

(PHP 5 &gt;= 5.3.3, PHP 7, PHP 8)

stream_set_read_buffer — Configura el buffer de lectura de un flujo

### Descripción

**stream_set_read_buffer**([resource](#language.types.resource) $stream, [int](#language.types.integer) $size): [int](#language.types.integer)

Configura el buffer de lectura de un flujo. Equivalente a [stream_set_write_buffer()](#function.stream-set-write-buffer),
pero para operaciones de lectura.

### Parámetros

    stream


      El puntero de fichero.






    size


       El número de bytes a almacenar en el buffer. Si size
       es 0, las operaciones se realizan sin buffer. Esto garantiza que las operaciones
       con [fread()](#function.fread) se completen antes de que otros procesos
       puedan leer en el flujo de salida.


### Valores devueltos

Devuelve 0 en caso de éxito, o otro valor si la petición falla.

### Ver también

- [stream_set_write_buffer()](#function.stream-set-write-buffer) - Configura el buffer de escritura de un flujo

# stream_set_timeout

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

stream_set_timeout — Configura el tiempo de espera de un flujo

### Descripción

**stream_set_timeout**([resource](#language.types.resource) $stream, [int](#language.types.integer) $seconds, [int](#language.types.integer) $microseconds = 0): [bool](#language.types.boolean)

**stream_set_timeout()** configura el tiempo de espera
del flujo stream, expresado como la duración de
seconds segundos y
microseconds microsegundos.

Cuando el flujo se agota, la clave 'timed_out' del array devuelto por
[stream_get_meta_data()](#function.stream-get-meta-data) se establece a **[true](#constant.true)**,
sin embargo, no se genera ningún error o alerta.

### Parámetros

     stream


       El flujo objetivo.






     seconds


       El número de segundos enteros del tiempo de espera.






     microseconds


       El número de microsegundos enteros del tiempo de espera.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con stream_set_timeout()**

&lt;?php
$fp = fsockopen("www.example.com", 80);
if (!$fp) {
echo "No se puede abrir\n";
} else {

fwrite($fp, "GET / HTTP/1.0\r\n\r\n");
  stream_set_timeout($fp, 2);
$res = fread($fp, 2000);

$info = stream_get_meta_data($fp);
fclose($fp);

if ($info['timed_out']) {
echo '¡Tiempo de conexión agotado!';
} else {
echo $res;
}

}
?&gt;

### Notas

**Nota**:

    Esta función no funciona con operaciones avanzadas como
    [stream_socket_recvfrom()](#function.stream-socket-recvfrom), utilice en su lugar
    [stream_select()](#function.stream-select) con un tiempo de espera como
    parámetro.

Esta función se llamaba anteriormente
**set_socket_timeout()**, y también
[socket_set_timeout()](#function.socket-set-timeout), pero estos nombres están
obsoletos.

### Ver también

- [fsockopen()](#function.fsockopen) - Abre un socket de conexión Internet o Unix

- [fopen()](#function.fopen) - Abre un fichero o un URL

# stream_set_write_buffer

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

stream_set_write_buffer — Configura el buffer de escritura de un flujo

### Descripción

**stream_set_write_buffer**([resource](#language.types.resource) $stream, [int](#language.types.integer) $size): [int](#language.types.integer)

**stream_set_write_buffer()** configura el buffer de escritura
del flujo stream al tamaño de
size bytes.

### Parámetros

     stream


       El puntero de fichero.






     size


       El número de bytes a almacenar en el buffer. Si size
       es 0, las operaciones se realizan sin buffer. Esto garantiza que las operaciones
       con [fwrite()](#function.fwrite) se completen antes de que otros procesos
       puedan escribir en el flujo de salida.





### Valores devueltos

Devuelve 0 en caso de éxito, o otro valor si la petición falla.

### Ejemplos

    **Ejemplo #1 Ejemplo con stream_set_write_buffer()**



     El ejemplo siguiente ilustra el uso de
     **stream_set_write_buffer()** para crear un flujo sin buffer.

&lt;?php
$fp = fopen($file, "w");
if ($fp) {
  if (stream_set_write_buffer($fp, 0) !== 0) {
// la modificación del buffer ha fallado
}
fwrite($fp, $output);
  fclose($fp);
}
?&gt;

### Ver también

- [fopen()](#function.fopen) - Abre un fichero o un URL

- [fwrite()](#function.fwrite) - Escribe en un fichero en modo binario

# stream_socket_accept

(PHP 5, PHP 7, PHP 8)

stream_socket_accept — Acepta una conexión en un socket creado por [stream_socket_server()](#function.stream-socket-server)

### Descripción

**stream_socket_accept**([resource](#language.types.resource) $socket, [?](#language.types.null)[float](#language.types.float) $timeout = **[null](#constant.null)**, [string](#language.types.string) &amp;$peer_name = **[null](#constant.null)**): [resource](#language.types.resource)|[false](#language.types.singleton)

Acepta una conexión en un socket creado previamente con
[stream_socket_server()](#function.stream-socket-server).

### Parámetros

     socket


       El socket servidor desde el cual aceptar una conexión.






     timeout


       Reemplaza el tiempo de espera predeterminado del socket. Este tiempo
       debe ser proporcionado en segundos. Por omisión, se utiliza [default_socket_timeout](#ini.default-socket-timeout).






     peer_name


       El nombre (dirección) del cliente conectado, si se proporciona y si está disponible para
       el transporte seleccionado.



      **Nota**:



        Asimismo puede ser determinado más tarde, utilizando la función
        [stream_socket_get_name()](#function.stream-socket-get-name).






### Valores devueltos

Devuelve un flujo hacia la conexión socket aceptada o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       timeout ahora es nullable.



### Notas

**Advertencia**

    Esta función no debe ser utilizada con sockets servidor UDP.
    En su lugar, utilice las funciones
    [stream_socket_recvfrom()](#function.stream-socket-recvfrom) y
    [stream_socket_sendto()](#function.stream-socket-sendto).

### Ver también

    - [stream_socket_server()](#function.stream-socket-server) - Crea un socket de servidor Unix o Internet

    - [stream_socket_get_name()](#function.stream-socket-get-name) - Lee el nombre del socket local o remoto

    - [stream_set_blocking()](#function.stream-set-blocking) - Configura el modo de bloqueo de un flujo

    - [stream_set_timeout()](#function.stream-set-timeout) - Configura el tiempo de espera de un flujo

    - [fgets()](#function.fgets) - Recupera la línea actual a partir de la posición del puntero de archivo

    - [fgetss()](#function.fgetss) - Obtiene un línea desde un puntero a un archivo y elimina las etiquetas HTML

    - [fwrite()](#function.fwrite) - Escribe en un fichero en modo binario

    - [fclose()](#function.fclose) - Cierra un fichero

    - [feof()](#function.feof) - Prueba el final del archivo

    - [Funciones de cURL](#ref.curl)

# stream_socket_client

(PHP 5, PHP 7, PHP 8)

stream_socket_client — Abre una conexión de socket de Internet o Unix

### Descripción

**stream_socket_client**(
    [string](#language.types.string) $address,
    [int](#language.types.integer) &amp;$error_code = **[null](#constant.null)**,
    [string](#language.types.string) &amp;$error_message = **[null](#constant.null)**,
    [?](#language.types.null)[float](#language.types.float) $timeout = **[null](#constant.null)**,
    [int](#language.types.integer) $flags = **[STREAM_CLIENT_CONNECT](#constant.stream-client-connect)**,
    [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**
): [resource](#language.types.resource)|[false](#language.types.singleton)

Inicia un flujo o una conexión de datagrama con el destino
address. El tipo de socket creado se determina
por el transporte especificado con el formato URL siguiente:
transport://target. Para un socket de Internet,
(AF_INET) como TCP y UDP, el objetivo
de address será una dirección IP o un nombre de host.
Para un socket Unix, el objetivo debe ser un fichero de
socket del sistema.

**Nota**:

    El flujo se abrirá por omisión en modo bloqueante. Puede pasarse
    a modo no bloqueante utilizando la función
    [stream_set_blocking()](#function.stream-set-blocking).

### Parámetros

     address


       La dirección del socket.






     error_code


       Contendrá el número del error del sistema si la conexión falla.






     error_message


       Contendrá el mensaje del error del sistema si la conexión falla.






     timeout


       Tiempo límite, en segundos, para la llamada al sistema
       connect().
       Por omisión, se utiliza [default_socket_timeout](#ini.default-socket-timeout).


**Nota**:

         Este parámetro solo se aplica para conexiones
         que no son asíncronas.




       **Nota**:



         Para definir un tiempo límite al leer/escribir
         datos a través de un socket, utilice la función
         [stream_set_timeout()](#function.stream-set-timeout), ya que el parámetro
         timeout solo se aplica durante la conexión
         al socket.








     flags


       Campo de bits que puede ser la combinación de cualquier opción
       de conexión. Actualmente, los valores posibles para estas opciones son
       **[STREAM_CLIENT_CONNECT](#constant.stream-client-connect)** (por omisión),
       **[STREAM_CLIENT_ASYNC_CONNECT](#constant.stream-client-async-connect)** y
       **[STREAM_CLIENT_PERSISTENT](#constant.stream-client-persistent)**.






     context


       Un recurso de contexto válido, creado por la función
       [stream_context_create()](#function.stream-context-create).





### Valores devueltos

En caso de éxito, se devuelve un recurso de flujo, que puede ser utilizado
con otras funciones de ficheros, como
[fgets()](#function.fgets), [fgetss()](#function.fgetss),
[fwrite()](#function.fwrite), [fclose()](#function.fclose), y
[feof()](#function.feof), **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si la llamada falla, **stream_socket_client()** devolverá
**[false](#constant.false)** y si los parámetros opcionales error_code y
error_message son proporcionados, recibirán el error
exacto que ocurrió en el sistema durante la llamada a
connect(). Si el valor devuelto en
error_code es 0 y la función
ha devuelto **[false](#constant.false)**, es una indicación de que el error ocurrió
antes de la llamada a connect(). Esto es probablemente debido
a un problema de inicialización del socket. Tenga en cuenta que
error_code y error_message
deben ser pasados por referencia.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       timeout y context ahora pueden ser nulos.



### Ejemplos

    **Ejemplo #1 Ejemplo con stream_socket_client()**

&lt;?php
$fp = stream_socket_client("tcp://www.example.com:80", $errno, $errstr, 30);
if (!$fp) {
echo "$errstr ($errno)&lt;br /&gt;\n";
} else {
fwrite($fp, "GET / HTTP/1.0\r\nHost: www.example.com\r\nAccept: */*\r\n\r\n");
    while (!feof($fp)) {
echo fgets($fp, 1024);
    }
    fclose($fp);
}
?&gt;

    **Ejemplo #2 Uso de conexiones UDP**



     Lee la fecha y hora en un servicio UDP de tipo
     "daytime" (puerto 13) en su propia máquina:

&lt;?php
$fp = stream_socket_client("udp://127.0.0.1:13", $errno, $errstr);
if (!$fp) {
echo "ERROR: $errno - $errstr&lt;br /&gt;\n";
} else {
    fwrite($fp, "\n");
echo fread($fp, 26);
    fclose($fp);
}
?&gt;

### Notas

**Advertencia**

    Los sockets UDP a veces parecerán abrirse sin error, incluso si el host
    remoto no es accesible. Este error solo se hará aparente
    cuando se intente leer o escribir datos con este
    socket. La razón es que UDP es un protocolo sin conexión,
    lo que significa que el sistema operativo no tiene que establecer
    un enlace para el socket, hasta que comience a intercambiar datos.

**Nota**: Al especificar direcciones
IPv6 en formato numérico (ej. fe80::1) se debe colocar la dirección IP
entre corchetes. Por ejemplo: tcp://[fe80::1]:80.

**Nota**:

    Según su entorno, los sockets Unix o el tiempo límite
    pueden no estar disponibles. Una lista de los transportes disponibles
    en el sistema es accesible mediante [stream_get_transports()](#function.stream-get-transports).
    Consulte [Lista de los modos de transporte de sockets disponibles](#transports) para una lista de transportes nativos.

### Ver también

    - [stream_socket_server()](#function.stream-socket-server) - Crea un socket de servidor Unix o Internet

    - [stream_set_blocking()](#function.stream-set-blocking) - Configura el modo de bloqueo de un flujo

    - [stream_set_timeout()](#function.stream-set-timeout) - Configura el tiempo de espera de un flujo

    - [stream_select()](#function.stream-select) - Supervisa la modificación de uno o varios flujos

    - [fgets()](#function.fgets) - Recupera la línea actual a partir de la posición del puntero de archivo

    - [fgetss()](#function.fgetss) - Obtiene un línea desde un puntero a un archivo y elimina las etiquetas HTML

    - [fwrite()](#function.fwrite) - Escribe en un fichero en modo binario

    - [fclose()](#function.fclose) - Cierra un fichero

    - [feof()](#function.feof) - Prueba el final del archivo

    - [Funciones de cURL](#ref.curl)

# stream_socket_enable_crypto

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

stream_socket_enable_crypto — Activa o desactiva el cifrado para un socket ya conectado

### Descripción

**stream_socket_enable_crypto**(
    [resource](#language.types.resource) $stream,
    [bool](#language.types.boolean) $enable,
    [?](#language.types.null)[int](#language.types.integer) $crypto_method = **[null](#constant.null)**,
    [?](#language.types.null)[resource](#language.types.resource) $session_stream = **[null](#constant.null)**
): [int](#language.types.integer)|[bool](#language.types.boolean)

Activa o desactiva el cifrado para un socket ya conectado.

Una vez definidos los parámetros de cifrado, este puede ser activado
y desactivado dinámicamente pasando **[true](#constant.true)** o **[false](#constant.false)** en el argumento
enable.

### Parámetros

     stream


       El recurso de flujo.






     enable


       Activa o desactiva el cifrado en el flujo.






     crypto_method


       Configura el cifrado en el flujo.
       Los métodos válidos son



        - **[STREAM_CRYPTO_METHOD_SSLv2_CLIENT](#constant.stream-crypto-method-sslv2-client)**

        - **[STREAM_CRYPTO_METHOD_SSLv3_CLIENT](#constant.stream-crypto-method-sslv3-client)**

        - **[STREAM_CRYPTO_METHOD_SSLv23_CLIENT](#constant.stream-crypto-method-sslv23-client)**

        - **[STREAM_CRYPTO_METHOD_ANY_CLIENT](#constant.stream-crypto-method-any-client)**

        - **[STREAM_CRYPTO_METHOD_TLS_CLIENT](#constant.stream-crypto-method-tls-client)**

        - **[STREAM_CRYPTO_METHOD_TLSv1_0_CLIENT](#constant.stream-crypto-method-tlsv1-0-client)**

        - **[STREAM_CRYPTO_METHOD_TLSv1_1_CLIENT](#constant.stream-crypto-method-tlsv1-1-client)**

        - **[STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT](#constant.stream-crypto-method-tlsv1-2-client)**

        - **[STREAM_CRYPTO_METHOD_TLSv1_3_CLIENT](#constant.stream-crypto-method-tlsv1-3-client)** (disponible a partir de PHP 7.4.0)

        - **[STREAM_CRYPTO_METHOD_SSLv2_SERVER](#constant.stream-crypto-method-sslv2-server)**

        - **[STREAM_CRYPTO_METHOD_SSLv3_SERVER](#constant.stream-crypto-method-sslv3-server)**

        - **[STREAM_CRYPTO_METHOD_SSLv23_SERVER](#constant.stream-crypto-method-sslv23-server)**

        - **[STREAM_CRYPTO_METHOD_ANY_SERVER](#constant.stream-crypto-method-any-server)**

        - **[STREAM_CRYPTO_METHOD_TLS_SERVER](#constant.stream-crypto-method-tls-server)**

        - **[STREAM_CRYPTO_METHOD_TLSv1_0_SERVER](#constant.stream-crypto-method-tlsv1-0-server)**

        - **[STREAM_CRYPTO_METHOD_TLSv1_1_SERVER](#constant.stream-crypto-method-tlsv1-1-server)**

        - **[STREAM_CRYPTO_METHOD_TLSv1_2_SERVER](#constant.stream-crypto-method-tlsv1-2-server)**

        - **[STREAM_CRYPTO_METHOD_TLSv1_3_SERVER](#constant.stream-crypto-method-tlsv1-3-server)** (disponible a partir de PHP 7.4.0)




       Si se omite, la opción de contexto crypto_method
       en el contexto SSL del flujo será utilizada en su lugar.






     session_stream


       Inicializa el flujo con la configuración proveniente del argumento
       session_stream.





### Valores devueltos

Retorna **[true](#constant.true)** en caso de éxito, **[false](#constant.false)** si la negociación falló o
0 si no hay suficientes datos y se debe intentar
nuevamente (únicamente para sockets no bloqueantes).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       session_stream ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con stream_socket_enable_crypto()**

&lt;?php
$fp = stream_socket_client("tcp://myproto.example.com:31337", $errno, $errstr, 30);
if (!$fp) {
die("Imposible conectar: $errstr ($errno)");
}

/_ Activación del cifrado durante la identificación _/
stream_socket_enable_crypto($fp, true, STREAM_CRYPTO_METHOD_SSLv23_CLIENT);
fwrite($fp, "USER god\r\n");
fwrite($fp, "PASS secret\r\n");

/_ Desactivación del cifrado para el resto _/
stream_socket_enable_crypto($fp, false);

while ($motd = fgets($fp)) {
echo $motd;
}

fclose($fp);
?&gt;

    Resultado del ejemplo anterior es similar a:

### Ver también

    - [Funciones de OpenSSL](#ref.openssl)

    - [Lista de los modos de transporte de sockets disponibles](#transports)

# stream_socket_get_name

(PHP 5, PHP 7, PHP 8)

stream_socket_get_name — Lee el nombre del socket local o remoto

### Descripción

**stream_socket_get_name**([resource](#language.types.resource) $socket, [bool](#language.types.boolean) $remote): [string](#language.types.string)|[false](#language.types.singleton)

**stream_socket_get_name()** devuelve el nombre del socket
local o remoto para la conexión socket.

### Parámetros

     socket


       El socket del que se debe leer el nombre.






     remote


       Si este argumento vale **[true](#constant.true)**, se devolverá el nombre del socket remote
       (remoto), y si vale **[false](#constant.false)**, se devolverá el socket local (local).





### Valores devueltos

El nombre del socket, o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [stream_socket_accept()](#function.stream-socket-accept) - Acepta una conexión en un socket creado por stream_socket_server

# stream_socket_pair

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

stream_socket_pair —
Crea un par de sockets conectados e inseparables

### Descripción

**stream_socket_pair**([int](#language.types.integer) $domain, [int](#language.types.integer) $type, [int](#language.types.integer) $protocol): [array](#language.types.array)|[false](#language.types.singleton)

**stream_socket_pair()** crea un par de sockets conectados
e inseparables. Esta función se utiliza comúnmente en IPC
(InterProcess Communication).

### Parámetros

     domain


       La familia de protocolo a utilizar: **[STREAM_PF_INET](#constant.stream-pf-inet)**,
       **[STREAM_PF_INET6](#constant.stream-pf-inet6)** o
       **[STREAM_PF_UNIX](#constant.stream-pf-unix)**






     type


       El tipo de comunicación a utilizar:
       **[STREAM_SOCK_DGRAM](#constant.stream-sock-dgram)**,
       **[STREAM_SOCK_RAW](#constant.stream-sock-raw)**,
       **[STREAM_SOCK_RDM](#constant.stream-sock-rdm)**,
       **[STREAM_SOCK_SEQPACKET](#constant.stream-sock-seqpacket)** o
       **[STREAM_SOCK_STREAM](#constant.stream-sock-stream)**






     protocol


       El protocolo a utilizar: **[STREAM_IPPROTO_ICMP](#constant.stream-ipproto-icmp)**,
       **[STREAM_IPPROTO_IP](#constant.stream-ipproto-ip)**,
       **[STREAM_IPPROTO_RAW](#constant.stream-ipproto-raw)**,
       **[STREAM_IPPROTO_TCP](#constant.stream-ipproto-tcp)** o
       **[STREAM_IPPROTO_UDP](#constant.stream-ipproto-udp)**





**Nota**:

    Consulte la [lista de constantes de flujo](#stream.constants)
    para más detalles sobre cada constante.

### Valores devueltos

Devuelve un [array](#language.types.array) que contiene los recursos de los dos sockets en caso de éxito, o
**[false](#constant.false)** en caso de fallo.

### Ejemplos

    **Ejemplo #1 Ejemplo con stream_socket_pair()**



     Este ejemplo muestra un uso básico de
     **stream_socket_pair()** en una comunicación interprocesos.

&lt;?php

$sockets = stream_socket_pair(STREAM_PF_UNIX, STREAM_SOCK_STREAM, STREAM_IPPROTO_IP);
$pid = pcntl_fork();

if ($pid == -1) {
die('Imposible bifurcar');

} else if ($pid) {
  /* padre */
  fclose($sockets[0]);

fwrite($sockets[1], "PID hijo: $pid\n");
  echo fgets($sockets[1]);

fclose($sockets[1]);

} else {
/_ hijo _/
fclose($sockets[1]);

fwrite($sockets[0], "mensaje del hijo\n");
  echo fgets($sockets[0]);

fclose($sockets[0]);
}

?&gt;

    Resultado del ejemplo anterior es similar a:

PID hijo: 1378
mensaje del hijo

# stream_socket_recvfrom

(PHP 5, PHP 7, PHP 8)

stream_socket_recvfrom — Lee datos desde un socket, conectado o no

### Descripción

**stream_socket_recvfrom**(
    [resource](#language.types.resource) $socket,
    [int](#language.types.integer) $length,
    [int](#language.types.integer) $flags = 0,
    [?](#language.types.null)[string](#language.types.string) &amp;$address = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)

    **stream_socket_recvfrom()** acepta datos
    desde un socket remoto, hasta un total de length
    bytes.

### Parámetros

     socket


       El socket remoto.






     length


       El número de bytes a recibir de socket.






     flags


       El valor de flags puede ser la combinación
       de las constantes siguientes:



        <caption>**Valores posibles para flags**</caption>



           **[STREAM_OOB](#constant.stream-oob)**

            Procesa los datos en modo OOB (out-of-band).




           **[STREAM_PEEK](#constant.stream-peek)**

            Lee datos desde el socket, pero no utiliza el buffer.
            Las próximas llamadas a [fread()](#function.fread) o
            **stream_socket_recvfrom()** leerán los mismos
            datos.











     address


       Si el argumento address es proporcionado, recibirá
       la dirección del socket remoto.





### Valores devueltos

Devuelve los datos leídos, como [string](#language.types.string), o **[false](#constant.false)** si ocurre un error.

### Ejemplos

     **Ejemplo #1 Ejemplo con stream_socket_recvfrom()**




&lt;?php
/_ Abre un socket en el puerto 1234 de localhost _/
$server = stream_socket_server('tcp://127.0.0.1:1234');

/_ Acepta una conexión _/
$socket = stream_socket_accept($server);

/_ Lee un paquete (1500 es el tamaño clásico MTU) de datos OOB _/
echo "Recibido Out-Of-Band: '" . stream_socket_recvfrom($socket, 1500, STREAM_OOB) . "'\n";

/_ Lee los datos normales in-band, pero no modifica nada _/
echo "Datos: '" . stream_socket_recvfrom($socket, 1500, STREAM_PEEK) . "'\n";

/_ Vuelve a leer el mismo paquete, pero vacía el buffer. _/
echo "Datos: '" . stream_socket_recvfrom($socket, 1500) . "'\n";

/_ Finalización _/
fclose($socket);
fclose($server);
?&gt;

### Notas

    **Nota**:



      Si el mensaje recibido es más grande que length,
      los datos adicionales pueden ser destruidos, dependiendo del tipo
      de socket utilizado (por ejemplo UDP).




    **Nota**:



      La llamada a **stream_socket_recvfrom()** en flujos
      basados en socket, después de la llamada a funciones de flujo basadas en
      buffer (como [fread()](#function.fread) o
      [stream_get_line()](#function.stream-get-line)) lee directamente los datos desde
      el socket y evita el uso del buffer con el flujo.


### Ver también

- [stream_socket_sendto()](#function.stream-socket-sendto) - Envía un mensaje al socket, conectado o no

- [stream_socket_client()](#function.stream-socket-client) - Abre una conexión de socket de Internet o Unix

- [stream_socket_server()](#function.stream-socket-server) - Crea un socket de servidor Unix o Internet

# stream_socket_sendto

(PHP 5, PHP 7, PHP 8)

stream_socket_sendto — Envía un mensaje al socket, conectado o no

### Descripción

**stream_socket_sendto**(
    [resource](#language.types.resource) $socket,
    [string](#language.types.string) $data,
    [int](#language.types.integer) $flags = 0,
    [string](#language.types.string) $address = ""
): [int](#language.types.integer)|[false](#language.types.singleton)

**stream_socket_sendto()** envía los datos
data al socket socket.

### Parámetros

     socket


       El socket al cual enviar los datos data.






     data


       Los datos a enviar.






     flags


       El valor de flags puede ser la combinación
       de las constantes siguientes:



        <caption>**Valores posibles para flags**</caption>



           **[STREAM_OOB](#constant.stream-oob)**

            Trata los datos en modo OOB (out-of-band).











     address


       La dirección del socket se especifica cuando el socket es creado,
       y será utilizada si otra dirección no es especificada
       en el parámetro address.




       Cuando es proporcionada, debe estar en formato IP numérico
       (versión 4 o 6).





### Valores devueltos

Retorna el código de resultado, en forma de integer, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con stream_socket_sendto()**

&lt;?php
/_ Abre un socket en el puerto 1234 de localhost _/
$socket = stream_socket_client('tcp://127.0.0.1:1234');

/_ Envía datos directamente _/
fwrite($socket, "Normal data transmit.");

/_ Envía otros datos, en modo out of band. _/
stream_socket_sendto($socket, "Mode out of Band.", STREAM_OOB);

/_ Fin _/
fclose($socket);
?&gt;

### Ver también

- [stream_socket_recvfrom()](#function.stream-socket-recvfrom) - Lee datos desde un socket, conectado o no

- [stream_socket_client()](#function.stream-socket-client) - Abre una conexión de socket de Internet o Unix

- [stream_socket_server()](#function.stream-socket-server) - Crea un socket de servidor Unix o Internet

# stream_socket_server

(PHP 5, PHP 7, PHP 8)

stream_socket_server — Crea un socket de servidor Unix o Internet

### Descripción

**stream_socket_server**(
    [string](#language.types.string) $address,
    [int](#language.types.integer) &amp;$error_code = **[null](#constant.null)**,
    [string](#language.types.string) &amp;$error_message = **[null](#constant.null)**,
    [int](#language.types.integer) $flags = STREAM_SERVER_BIND | STREAM_SERVER_LISTEN,
    [?](#language.types.null)[resource](#language.types.resource) $context = **[null](#constant.null)**
): [resource](#language.types.resource)|[false](#language.types.singleton)

**stream_socket_server()** crea un flujo o un datagrama en el socket especificado address.

**stream_socket_server()** solo crea un socket y, para aceptar conexiones, se debe utilizar [stream_socket_accept()](#function.stream-socket-accept).

### Parámetros

     address


       El tipo de socket creado se determina por el transporte especificado con el formato URL siguiente: transport://target.




       Para un socket de Internet (**[AF_INET](#constant.af-inet)**) como TCP y UDP, el target de remote_socket será una dirección IP o un nombre de host seguido de dos puntos y un número de puerto. Para un socket Unix, el target debe ser un fichero de socket del sistema.




       Según el entorno, los sockets de dominio Unix pueden no estar disponibles. Una lista de los transportes disponibles se puede obtener mediante [stream_get_transports()](#function.stream-get-transports). Consulte [Lista de los modos de transporte de sockets disponibles](#transports) para conocer la lista de transportes nativos.






     error_code


       Si los argumentos opcionales error_code y error_message están presentes, se configurarán para indicar el nivel de error actual de las funciones del sistema socket(), bind() y listen(). Si el valor devuelto en error_code es 0 y la función devuelve **[false](#constant.false)**, esto indica que el error ocurrió antes de la llamada a bind(). Esto probablemente se deba a un problema de inicialización del socket. Tenga en cuenta que los argumentos error_code y error_message siempre se pasarán por referencia.






     error_message


       Consulte la descripción de error_code.






     flags


       Un campo de bits, que puede ser la combinación de cualquier opción de creación de socket.



      **Nota**:



        Para los sockets UDP, se debe utilizar la constante **[STREAM_SERVER_BIND](#constant.stream-server-bind)** como valor del parámetro flags.







     context







### Valores devueltos

Devuelve el flujo creado, o bien **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       context ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con stream_socket_server()**

&lt;?php
$socket = stream_socket_server("tcp://0.0.0.0:8000", $errno, $errstr);
if (!$socket) {
echo "$errstr ($errno)&lt;br /&gt;\n";
} else {
while ($conn = stream_socket_accept($socket)) {
fputs ($conn, 'La hora local es ' . date('n/j/Y g:i a') . "\n");
    fclose ($conn);
}
fclose($socket);
}
?&gt;

El ejemplo siguiente muestra cómo leer la fecha y la hora en un servicio UDP (puerto 13) en su propia máquina, tal como se presenta con la función [stream_socket_client()](#function.stream-socket-client):

**Nota**:

     La mayoría de los sistemas requieren acceso de administrador para abrir un socket en los puertos por debajo de 1024.





    **Ejemplo #2 Utilizar un servidor de socket UDP**

&lt;?php
$socket = stream_socket_server("udp://0.0.0.0:13", $errno, $errstr, STREAM_SERVER_BIND);
if (!$socket) {
echo "ERROR: $errno - $errstr&lt;br /&gt;\n";
} else {
  while ($conn = stream_socket_accept($socket)) {
    fwrite($conn, date("D M j H:i:s Y\r\n"));
fclose($conn);
  }
  fclose($socket);
}
?&gt;

### Notas

**Nota**: Al especificar direcciones
IPv6 en formato numérico (ej. fe80::1) se debe colocar la dirección IP
entre corchetes. Por ejemplo: tcp://[fe80::1]:80.

### Ver también

- [stream_socket_client()](#function.stream-socket-client) - Abre una conexión de socket de Internet o Unix

- [stream_set_blocking()](#function.stream-set-blocking) - Configura el modo de bloqueo de un flujo

- [stream_set_timeout()](#function.stream-set-timeout) - Configura el tiempo de espera de un flujo

- [fgets()](#function.fgets) - Recupera la línea actual a partir de la posición del puntero de archivo

- [fgetss()](#function.fgetss) - Obtiene un línea desde un puntero a un archivo y elimina las etiquetas HTML

- [fwrite()](#function.fwrite) - Escribe en un fichero en modo binario

- [fclose()](#function.fclose) - Cierra un fichero

- [feof()](#function.feof) - Prueba el final del archivo

- [Extensión Curl](#ref.curl)

# stream_socket_shutdown

(PHP 5 &gt;= 5.2.1, PHP 7, PHP 8)

stream_socket_shutdown — Detiene una conexión full-duplex

### Descripción

**stream_socket_shutdown**([resource](#language.types.resource) $stream, [int](#language.types.integer) $mode): [bool](#language.types.boolean)

Detiene (parcialmente o no) una conexión full-duplex.

**Nota**:

    El o los buffers asociados pueden o no ser vaciados.

### Parámetros

     stream


       Un flujo abierto (abierto con la función
       [stream_socket_client()](#function.stream-socket-client), por ejemplo)






     mode


       Una de las constantes siguientes: **[STREAM_SHUT_RD](#constant.stream-shut-rd)**
       (desactiva las recepciones futuras), **[STREAM_SHUT_WR](#constant.stream-shut-wr)**
       (desactiva las transmisiones futuras) o
       **[STREAM_SHUT_RDWR](#constant.stream-shut-rdwr)** (desactiva las recepciones o las
       transmisiones futuras).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con stream_socket_shutdown()**

&lt;?php

$server = stream_socket_server('tcp://127.0.0.1:1337');
$client = stream_socket_client('tcp://127.0.0.1:1337');

var_dump(fputs($client, "Hola"));

stream_socket_shutdown($client, STREAM_SHUT_WR);
var_dump(fputs($client, "Hola")); // actualmente no funciona

?&gt;

    Resultado del ejemplo anterior es similar a:

int(5)

Notice: fputs(): send of 5 bytes failed with errno=32 Broken pipe in test.php on line 9
int(0)

### Ver también

    - [fclose()](#function.fclose) - Cierra un fichero

# stream_supports_lock

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

stream_supports_lock — Indica si el flujo soporta bloqueo

### Descripción

**stream_supports_lock**([resource](#language.types.resource) $stream): [bool](#language.types.boolean)

Indica si el flujo soporta bloqueo a través de
[flock()](#function.flock).

### Parámetros

     stream


       El flujo a comprobar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [flock()](#function.flock) - Bloquea el fichero

# stream_wrapper_register

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

stream_wrapper_register —
Registra un gestor de URL

### Descripción

**stream_wrapper_register**([string](#language.types.string) $protocol, [string](#language.types.string) $class, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

**stream_wrapper_register()** permite implementar
gestores de protocolo y flujo, para ser utilizados con
todas las otras funciones de ficheros, como [fopen()](#function.fopen),
[fread()](#function.fread), etc.

### Parámetros

     protocol


       El nombre del gestor a registrar.
       Los nombres de protocolo válidos deben contener únicamente caracteres
       alfanuméricos, puntos (.), más (+) o guiones (-).






     class


       La clase que implementa el protocolo protocol.






     flags


       Debe ser configurado a **[STREAM_IS_URL](#constant.stream-is-url)** si
       protocol es un protocolo de URL. Por omisión,
       esta opción vale 0, y es válida para flujos locales.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**stream_wrapper_register()** retorna **[false](#constant.false)** si
el protocolo protocol ya tiene un gestor.

### Ejemplos

    **Ejemplo #1 Cómo registrar un gestor de flujo**

&lt;?php
$existed = in_array("var", stream_get_wrappers());
if ($existed) {
stream_wrapper_unregister("var");
}
stream_wrapper_register("var", "VariableStream");
$myvar = "";

$fp = fopen("var://myvar", "r+");

fwrite($fp, "line1\n");
fwrite($fp, "line2\n");
fwrite($fp, "line3\n");

rewind($fp);
while (!feof($fp)) {
echo fgets($fp);
}
fclose($fp);
var_dump($myvar);

if ($existed) {
stream_wrapper_restore("var");
}

?&gt;

    El ejemplo anterior mostrará:

line1
line2
line3
string(18) "line1
line2
line3
"

### Ver también

    - El prototipo de clase [streamWrapper](#class.streamwrapper)

    - [Ejemplo de clase registrada como envoltura de flujo](#stream.streamwrapper.example-1)

    - [stream_wrapper_unregister()](#function.stream-wrapper-unregister) - Deja de registrar una envoltura de URL

    - [stream_wrapper_restore()](#function.stream-wrapper-restore) - Restablece una envoltura incluida que se dejó de registrar previamente

    - [stream_get_wrappers()](#function.stream-get-wrappers) - Lista los gestores de flujo

# stream_wrapper_restore

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

stream_wrapper_restore — Restablece una envoltura incluida que se dejó de registrar previamente

### Descripción

**stream_wrapper_restore**([string](#language.types.string) $protocol): [bool](#language.types.boolean)

Restablece una envoltura incluida que se dejó de registrar previamente con
[stream_wrapper_unregister()](#function.stream-wrapper-unregister).

### Parámetros

     protocol







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# stream_wrapper_unregister

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

stream_wrapper_unregister — Deja de registrar una envoltura de URL

### Descripción

**stream_wrapper_unregister**([string](#language.types.string) $protocol): [bool](#language.types.boolean)

Permite deshabilitar una envoltura de flujo ya definida. Una vez que la envoltura
ha sido deshabilitada, se la puede sobreescribir con una envoltura definida por el usuario usando
[stream_wrapper_register()](#function.stream-wrapper-register) o rehabilitándola después com
[stream_wrapper_restore()](#function.stream-wrapper-restore).

### Parámetros

     protocol







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

## Tabla de contenidos

- [stream_bucket_append](#function.stream-bucket-append) — Añade un compartimento al cuerpo
- [stream_bucket_make_writeable](#function.stream-bucket-make-writeable) — Devuelve un objeto de compartimento desde el cuerpo para operaciones sobre el mismo
- [stream_bucket_new](#function.stream-bucket-new) — Crea un nuevo compartimento para utilizarlo en el flujo actual
- [stream_bucket_prepend](#function.stream-bucket-prepend) — Añadir inicialmente un bucket a una brigada
- [stream_context_create](#function.stream-context-create) — Crea un contexto de flujo
- [stream_context_get_default](#function.stream-context-get-default) — Lee el contexto por defecto de los flujos
- [stream_context_get_options](#function.stream-context-get-options) — Recuperar las opciones para un flujo/envoltura/contexto
- [stream_context_get_params](#function.stream-context-get-params) — Lee los parámetros de un contexto
- [stream_context_set_default](#function.stream-context-set-default) — Configura el contexto predeterminado de los flujos
- [stream_context_set_option](#function.stream-context-set-option) — Configura una opción para un flujo/gestor/contexto
- [stream_context_set_options](#function.stream-context-set-options) — Define las opciones en el contexto especificado
- [stream_context_set_params](#function.stream-context-set-params) — Configura los parámetros para un flujo/gestor/contexto
- [stream_copy_to_stream](#function.stream-copy-to-stream) — Copia datos desde un flujo hacia otro
- [stream_filter_append](#function.stream-filter-append) — Añade un filtro a un flujo al final de la lista
- [stream_filter_prepend](#function.stream-filter-prepend) — Adjunta un filtro a un flujo al inicio de la lista
- [stream_filter_register](#function.stream-filter-register) — Registra un filtro de flujo
- [stream_filter_remove](#function.stream-filter-remove) — Elimina un filtro de un flujo
- [stream_get_contents](#function.stream-get-contents) — Lee todo un flujo en un string
- [stream_get_filters](#function.stream-get-filters) — Lista los filtros registrados
- [stream_get_line](#function.stream-get-line) — Lee una línea en un flujo
- [stream_get_meta_data](#function.stream-get-meta-data) — Lee los encabezados y metadatos de los flujos
- [stream_get_transports](#function.stream-get-transports) — Lista los gestores de transporte de sockets disponibles
- [stream_get_wrappers](#function.stream-get-wrappers) — Lista los gestores de flujo
- [stream_is_local](#function.stream-is-local) — Verifica si un flujo es local
- [stream_isatty](#function.stream-isatty) — Verifica si un flujo es un TTY
- [stream_notification_callback](#function.stream-notification-callback) — Una función de retrollamada para el parámetro de contexto notification
- [stream_register_wrapper](#function.stream-register-wrapper) — Alias de stream_wrapper_register
- [stream_resolve_include_path](#function.stream-resolve-include-path) — Resuelve un nombre de fichero siguiendo las reglas de la ruta de inclusión
- [stream_select](#function.stream-select) — Supervisa la modificación de uno o varios flujos
- [stream_set_blocking](#function.stream-set-blocking) — Configura el modo de bloqueo de un flujo
- [stream_set_size](#function.stream-set-chunk-size) — Cambia el tamaño del segmento del flujo
- [stream_set_read_buffer](#function.stream-set-read-buffer) — Configura el buffer de lectura de un flujo
- [stream_set_timeout](#function.stream-set-timeout) — Configura el tiempo de espera de un flujo
- [stream_set_write_buffer](#function.stream-set-write-buffer) — Configura el buffer de escritura de un flujo
- [stream_socket_accept](#function.stream-socket-accept) — Acepta una conexión en un socket creado por stream_socket_server
- [stream_socket_client](#function.stream-socket-client) — Abre una conexión de socket de Internet o Unix
- [stream_socket_enable_crypto](#function.stream-socket-enable-crypto) — Activa o desactiva el cifrado para un socket ya conectado
- [stream_socket_get_name](#function.stream-socket-get-name) — Lee el nombre del socket local o remoto
- [stream_socket_pair](#function.stream-socket-pair) — Crea un par de sockets conectados e inseparables
- [stream_socket_recvfrom](#function.stream-socket-recvfrom) — Lee datos desde un socket, conectado o no
- [stream_socket_sendto](#function.stream-socket-sendto) — Envía un mensaje al socket, conectado o no
- [stream_socket_server](#function.stream-socket-server) — Crea un socket de servidor Unix o Internet
- [stream_socket_shutdown](#function.stream-socket-shutdown) — Detiene una conexión full-duplex
- [stream_supports_lock](#function.stream-supports-lock) — Indica si el flujo soporta bloqueo
- [stream_wrapper_register](#function.stream-wrapper-register) — Registra un gestor de URL
- [stream_wrapper_restore](#function.stream-wrapper-restore) — Restablece una envoltura incluida que se dejó de registrar previamente
- [stream_wrapper_unregister](#function.stream-wrapper-unregister) — Deja de registrar una envoltura de URL

- [Introducción](#intro.stream)
- [Instalación/Configuración](#stream.setup)<li>[Clases Stream](#stream.resources)
  </li>- [Constantes predefinidas](#stream.constants)
- [Filtros de Flujos](#stream.filters)
- [Contextos de Flujos](#stream.contexts)
- [Errores de Flujos](#stream.errors)
- [Ejemplos](#stream.examples)<li>[Ejemplo de clase registrada como envoltura de flujo](#stream.streamwrapper.example-1)
  </li>- [php_user_filter](#class.php-user-filter) — La clase php_user_filter<li>[php_user_filter::filter](#php-user-filter.filter) — Llamado cuando se aplica un filtro
- [php_user_filter::onClose](#php-user-filter.onclose) — Llamado cuando se cierra el filtro
- [php_user_filter::onCreate](#php-user-filter.oncreate) — Llamado cuando se crea el filtro
  </li>- [streamWrapper](#class.streamwrapper) — La clase streamWrapper<li>[streamWrapper::__construct](#streamwrapper.construct) — Construye una nueva envoltura de flujo
- [streamWrapper::\_\_destruct](#streamwrapper.destruct) — Destruye una envoltura de flujo existente
- [streamWrapper::dir_closedir](#streamwrapper.dir-closedir) — Cerrar un gestor de directorio
- [streamWrapper::dir_opendir](#streamwrapper.dir-opendir) — Abrir un gestor de directorio
- [streamWrapper::dir_readdir](#streamwrapper.dir-readdir) — Lee un archivo en un directorio
- [streamWrapper::dir_rewinddir](#streamwrapper.dir-rewinddir) — Rebobina el gestor de directorio
- [streamWrapper::mkdir](#streamwrapper.mkdir) — Crear un directorio
- [streamWrapper::rename](#streamwrapper.rename) — Renombra un archivo o directorio
- [streamWrapper::rmdir](#streamwrapper.rmdir) — Elimina un directorio
- [streamWrapper::stream_cast](#streamwrapper.stream-cast) — Recuperar el recurso subyacente
- [streamWrapper::stream_close](#streamwrapper.stream-close) — Cerrar un recurso
- [streamWrapper::stream_eof](#streamwrapper.stream-eof) — Comprueba si un puntero a un archivo está en el final del archivo (EOF)
- [streamWrapper::stream_flush](#streamwrapper.stream-flush) — Vuelca la salida
- [streamWrapper::stream_lock](#streamwrapper.stream-lock) — Bloqueo de archivos asesorado
- [streamWrapper::stream_metadata](#streamwrapper.stream-metadata) — Cambiar los metadatos del flujo
- [streamWrapper::stream_open](#streamwrapper.stream-open) — Abre un archivo o una URL
- [streamWrapper::stream_read](#streamwrapper.stream-read) — Lee desde el flujo
- [streamWrapper::stream_seek](#streamwrapper.stream-seek) — Coloca el puntero de flujo en una posición
- [streamWrapper::stream_set_option](#streamwrapper.stream-set-option) — Cambia las opciones del flujo
- [streamWrapper::stream_stat](#streamwrapper.stream-stat) — Recuperar información sobre un recurso de archivo
- [streamWrapper::stream_tell](#streamwrapper.stream-tell) — Recuperar la posición actual de un flujo
- [streamWrapper::stream_truncate](#streamwrapper.stream-truncate) — Truncar un flujo
- [streamWrapper::stream_write](#streamwrapper.stream-write) — Escribir en un flujo
- [streamWrapper::unlink](#streamwrapper.unlink) — Borrar un archivo
- [streamWrapper::url_stat](#streamwrapper.url-stat) — Lee la información sobre un fichero
  </li>- [Funciones de Flujos](#ref.stream)<li>[stream_bucket_append](#function.stream-bucket-append) — Añade un compartimento al cuerpo
- [stream_bucket_make_writeable](#function.stream-bucket-make-writeable) — Devuelve un objeto de compartimento desde el cuerpo para operaciones sobre el mismo
- [stream_bucket_new](#function.stream-bucket-new) — Crea un nuevo compartimento para utilizarlo en el flujo actual
- [stream_bucket_prepend](#function.stream-bucket-prepend) — Añadir inicialmente un bucket a una brigada
- [stream_context_create](#function.stream-context-create) — Crea un contexto de flujo
- [stream_context_get_default](#function.stream-context-get-default) — Lee el contexto por defecto de los flujos
- [stream_context_get_options](#function.stream-context-get-options) — Recuperar las opciones para un flujo/envoltura/contexto
- [stream_context_get_params](#function.stream-context-get-params) — Lee los parámetros de un contexto
- [stream_context_set_default](#function.stream-context-set-default) — Configura el contexto predeterminado de los flujos
- [stream_context_set_option](#function.stream-context-set-option) — Configura una opción para un flujo/gestor/contexto
- [stream_context_set_options](#function.stream-context-set-options) — Define las opciones en el contexto especificado
- [stream_context_set_params](#function.stream-context-set-params) — Configura los parámetros para un flujo/gestor/contexto
- [stream_copy_to_stream](#function.stream-copy-to-stream) — Copia datos desde un flujo hacia otro
- [stream_filter_append](#function.stream-filter-append) — Añade un filtro a un flujo al final de la lista
- [stream_filter_prepend](#function.stream-filter-prepend) — Adjunta un filtro a un flujo al inicio de la lista
- [stream_filter_register](#function.stream-filter-register) — Registra un filtro de flujo
- [stream_filter_remove](#function.stream-filter-remove) — Elimina un filtro de un flujo
- [stream_get_contents](#function.stream-get-contents) — Lee todo un flujo en un string
- [stream_get_filters](#function.stream-get-filters) — Lista los filtros registrados
- [stream_get_line](#function.stream-get-line) — Lee una línea en un flujo
- [stream_get_meta_data](#function.stream-get-meta-data) — Lee los encabezados y metadatos de los flujos
- [stream_get_transports](#function.stream-get-transports) — Lista los gestores de transporte de sockets disponibles
- [stream_get_wrappers](#function.stream-get-wrappers) — Lista los gestores de flujo
- [stream_is_local](#function.stream-is-local) — Verifica si un flujo es local
- [stream_isatty](#function.stream-isatty) — Verifica si un flujo es un TTY
- [stream_notification_callback](#function.stream-notification-callback) — Una función de retrollamada para el parámetro de contexto notification
- [stream_register_wrapper](#function.stream-register-wrapper) — Alias de stream_wrapper_register
- [stream_resolve_include_path](#function.stream-resolve-include-path) — Resuelve un nombre de fichero siguiendo las reglas de la ruta de inclusión
- [stream_select](#function.stream-select) — Supervisa la modificación de uno o varios flujos
- [stream_set_blocking](#function.stream-set-blocking) — Configura el modo de bloqueo de un flujo
- [stream_set_size](#function.stream-set-chunk-size) — Cambia el tamaño del segmento del flujo
- [stream_set_read_buffer](#function.stream-set-read-buffer) — Configura el buffer de lectura de un flujo
- [stream_set_timeout](#function.stream-set-timeout) — Configura el tiempo de espera de un flujo
- [stream_set_write_buffer](#function.stream-set-write-buffer) — Configura el buffer de escritura de un flujo
- [stream_socket_accept](#function.stream-socket-accept) — Acepta una conexión en un socket creado por stream_socket_server
- [stream_socket_client](#function.stream-socket-client) — Abre una conexión de socket de Internet o Unix
- [stream_socket_enable_crypto](#function.stream-socket-enable-crypto) — Activa o desactiva el cifrado para un socket ya conectado
- [stream_socket_get_name](#function.stream-socket-get-name) — Lee el nombre del socket local o remoto
- [stream_socket_pair](#function.stream-socket-pair) — Crea un par de sockets conectados e inseparables
- [stream_socket_recvfrom](#function.stream-socket-recvfrom) — Lee datos desde un socket, conectado o no
- [stream_socket_sendto](#function.stream-socket-sendto) — Envía un mensaje al socket, conectado o no
- [stream_socket_server](#function.stream-socket-server) — Crea un socket de servidor Unix o Internet
- [stream_socket_shutdown](#function.stream-socket-shutdown) — Detiene una conexión full-duplex
- [stream_supports_lock](#function.stream-supports-lock) — Indica si el flujo soporta bloqueo
- [stream_wrapper_register](#function.stream-wrapper-register) — Registra un gestor de URL
- [stream_wrapper_restore](#function.stream-wrapper-restore) — Restablece una envoltura incluida que se dejó de registrar previamente
- [stream_wrapper_unregister](#function.stream-wrapper-unregister) — Deja de registrar una envoltura de URL
  </li>
