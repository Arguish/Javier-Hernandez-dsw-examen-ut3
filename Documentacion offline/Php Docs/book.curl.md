# Biblioteca de URL cliente

# Introducción

PHP soporta libcurl, una biblioteca creada por Daniel Stenberg,
que permite conectarse y comunicarse con diferentes tipos de servidores,
y esto, con diferentes tipos de protocolos.
libcurl soporta actualmente los protocolos http, https, ftp,
gopher, telnet, DICT, file y LDAP. libcurl soporta asimismo los
certificados HTTPS, HTTP POST, HTTP PUT, la descarga FTP
(esto también puede realizarse mediante la extensión ftp de PHP),
los formularios de subida HTTP, los servidores mandatarios
(proxy), las cookies y la identificación usuario/contraseña.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#curl.requirements)
- [Instalación](#curl.installation)
- [Configuración en tiempo de ejecución](#curl.configuration)
- [Tipos de recursos](#curl.resources)

    ## Requerimientos

    Para poder utilizar las funciones cURL en PHP, debe instalarse el paquete [» libcurl](http://curl.haxx.se/).
    PHP requiere libcurl versión 7.10.5 o superior.
    A partir de PHP 7.3.0, se requiere la versión 7.15.5 o posterior.
    A partir de PHP 8.0.0, se requiere la versión 7.29.0 o posterior.
    A partir de PHP 8.4.0, se requiere la versión 7.61.0 o superior.

## Instalación

Para utilizar cURL desde los scripts PHP, debe compilárselo
con la opción **--with-curl[=DIR]**
donde DIR es la ruta hasta el directorio que contiene los directorios
lib y include. En el
directorio include, debe existir un directorio
llamado curl, que contiene entre otros los
ficheros easy.h y curl.h.
Debe existir también un fichero llamado
libcurl.a en el directorio lib.

**Nota**:
**Nota para usuarios Win32**

Para activar este módulo en el entorno Windows,
libeay32.dll y ssleay32.dll, o,
desde OpenSSL 1.1,
libcrypto-_.dll y libssl-_.dll,
deben estar presentes en el PATH.
libssh2.dll debe estar también presente en el PATH.

No es necesario libcurl.dll del sitio cURL.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de Configuración de cURL**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [curl.cainfo](#ini.curl.cainfo)
      NULL
      **[INI_SYSTEM](#constant.ini-system)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     curl.cainfo
     [string](#language.types.string)



      Define un valor predeterminado para la opción **[CURLOPT_CAINFO](#constant.curlopt-cainfo)**.
      Debe especificarse una ruta absoluta.


## Tipos de recursos

Antes de PHP 8.0.0, esta extensión definía tres tipos de recursos:
un manejador curl, un manejador curl_multi
y un manejador curl_share.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

Las descripciones así como los usos de estas constantes se describen
en la documentación de las funciones [curl_setopt()](#function.curl-setopt),
[curl_multi_setopt()](#function.curl-multi-setopt) y [curl_getinfo()](#function.curl-getinfo).

       Constantes
       Descripción



    **[CURLALTSVC_H1](#constant.curlaltsvc-h1)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.64.1.





    **[CURLALTSVC_H2](#constant.curlaltsvc-h2)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.64.1.





    **[CURLALTSVC_H3](#constant.curlaltsvc-h3)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.64.1.





    **[CURLALTSVC_READONLYFILE](#constant.curlaltsvc-readonlyfile)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.64.1.





    **[CURLAUTH_ANY](#constant.curlauth-any)**
    ([int](#language.types.integer))









    **[CURLAUTH_ANYSAFE](#constant.curlauth-anysafe)**
    ([int](#language.types.integer))









    **[CURLAUTH_AWS_SIGV4](#constant.curlauth-aws-sigv4)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.75.0.





    **[CURLAUTH_BASIC](#constant.curlauth-basic)**
    ([int](#language.types.integer))








    **[CURLAUTH_BEARER](#constant.curlauth-bearer)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.0 y cURL 7.61.0.





    **[CURLAUTH_DIGEST](#constant.curlauth-digest)**
    ([int](#language.types.integer))








    **[CURLAUTH_DIGEST_IE](#constant.curlauth-digest-ie)**
    ([int](#language.types.integer))



     Utilizar la autenticación HTTP Digest con un navegador IE.
     Disponible a partir de cURL 7.19.3.





    **[CURLAUTH_GSSAPI](#constant.curlauth-gssapi)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.0 y cURL 7.54.1





    **[CURLAUTH_GSSNEGOTIATE](#constant.curlauth-gssnegotiate)**
    ([int](#language.types.integer))








    **[CURLAUTH_NEGOTIATE](#constant.curlauth-negotiate)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.0 y cURL 7.61.0.





    **[CURLAUTH_NONE](#constant.curlauth-none)**
    ([int](#language.types.integer))



     Disponible a partir de cURL 7.10.6.





    **[CURLAUTH_NTLM](#constant.curlauth-ntlm)**
    ([int](#language.types.integer))








    **[CURLAUTH_NTLM_WB](#constant.curlauth-ntlm-wb)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.0.7 y cURL 7.22.0





    **[CURLAUTH_ONLY](#constant.curlauth-only)**
    ([int](#language.types.integer))



     Este es un símbolo meta. Colocar este valor CON
     un solo valor de autenticación específico
     para forzar a libcurl a verificar la autenticación no restringida y si no,
     solo este algoritmo de autenticación es aceptable.
     Disponible a partir de cURL 7.21.3.





    **[CURLFTPAUTH_DEFAULT](#constant.curlftpauth-default)**
    ([int](#language.types.integer))









    **[CURLFTPAUTH_SSL](#constant.curlftpauth-ssl)**
    ([int](#language.types.integer))









    **[CURLFTPAUTH_TLS](#constant.curlftpauth-tls)**
    ([int](#language.types.integer))









    **[CURLFTPMETHOD_DEFAULT](#constant.curlftpmethod-default)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.15.3.





    **[CURLFTPMETHOD_MULTICWD](#constant.curlftpmethod-multicwd)**
    ([int](#language.types.integer))



     Realiza una sola operación CWD
     para cada parte del camino en la URL dada.
     Disponible a partir de cURL 7.15.3.





    **[CURLFTPMETHOD_NOCWD](#constant.curlftpmethod-nocwd)**
    ([int](#language.types.integer))



     libcurl no realiza CWD en absoluto.
     libcurl realiza SIZE, RETR,
     STOR etc.
     y devuelve un camino completo al servidor para todas estas comandas.
     Disponible a partir de cURL 7.15.3.





    **[CURLFTPMETHOD_SINGLECWD](#constant.curlftpmethod-singlecwd)**
    ([int](#language.types.integer))



     libcurl realiza un CWD con el directorio objetivo completo
     luego opera sobre el fichero como en el caso multicwd.
     Disponible a partir de cURL 7.15.3.





    **[CURLFTPSSL_ALL](#constant.curlftpssl-all)**
    ([int](#language.types.integer))









    **[CURLFTPSSL_CCC_ACTIVE](#constant.curlftpssl-ccc-active)**
    ([int](#language.types.integer))



     Inicia el cierre de la conexión y espera una respuesta.
     Disponible a partir de cURL 7.16.2.





    **[CURLFTPSSL_CCC_NONE](#constant.curlftpssl-ccc-none)**
    ([int](#language.types.integer))



     No intenta usar CCC (Clear Command Channel).
     Disponible a partir de cURL 7.16.2.





    **[CURLFTPSSL_CCC_PASSIVE](#constant.curlftpssl-ccc-passive)**
    ([int](#language.types.integer))



     No inicia el cierre de la conexión, pero espera que el servidor lo haga.
     No envía respuesta.
     Disponible a partir de cURL 7.16.2.





    **[CURLFTPSSL_CONTROL](#constant.curlftpssl-control)**
    ([int](#language.types.integer))









    **[CURLFTPSSL_NONE](#constant.curlftpssl-none)**
    ([int](#language.types.integer))









    **[CURLFTPSSL_TRY](#constant.curlftpssl-try)**
    ([int](#language.types.integer))









    **[CURLFTP_CREATE_DIR](#constant.curlftp-create-dir)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.0.7 y cURL 7.19.3





    **[CURLFTP_CREATE_DIR_NONE](#constant.curlftp-create-dir-none)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.0.7 y cURL 7.19.3





    **[CURLFTP_CREATE_DIR_RETRY](#constant.curlftp-create-dir-retry)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.0.7 y cURL 7.19.3





    **[CURLGSSAPI_DELEGATION_FLAG](#constant.curlgssapi-delegation-flag)**
    ([int](#language.types.integer))



     Permite la delegación incondicional de las credenciales GSSAPI.
     Disponible a partir de cURL 7.22.0.





    **[CURLGSSAPI_DELEGATION_POLICY_FLAG](#constant.curlgssapi-delegation-policy-flag)**
    ([int](#language.types.integer))



     Delega únicamente si el flag OK-AS-DELEGATE está definido
     en el ticket de servicio si esta funcionalidad es soportada por la implementación GSS-API
     y que la definición de GSS_C_DELEG_POLICY_FLAG
     estaba disponible en la compilación.
     Disponible a partir de cURL 7.22.0.





    **[CURLHEADER_SEPARATE](#constant.curlheader-separate)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.0.7 y cURL 7.37.0.





    **[CURLHEADER_UNIFIED](#constant.curlheader-unified)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.0.7 y cURL 7.37.0.





    **[CURLHSTS_ENABLE](#constant.curlhsts-enable)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.74.0





    **[CURLHSTS_READONLYFILE](#constant.curlhsts-readonlyfile)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.74.0





    **[CURLKHMATCH_LAST](#constant.curlkhmatch-last)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 y cURL 7.19.6





    **[CURLKHMATCH_MISMATCH](#constant.curlkhmatch-mismatch)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 y cURL 7.19.6





    **[CURLKHMATCH_MISSING](#constant.curlkhmatch-missing)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 y cURL 7.19.6





    **[CURLKHMATCH_OK](#constant.curlkhmatch-ok)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 y cURL 7.19.6





    **[CURLMIMEOPT_FORMESCAPE](#constant.curlmimeopt-formescape)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 y cURL 7.81.0





    **[CURLMSG_DONE](#constant.curlmsg-done)**
    ([int](#language.types.integer))









    **[CURLPIPE_HTTP1](#constant.curlpipe-http1)**
    ([int](#language.types.integer))



     Disponible a partir de cURL 7.43.0.





    **[CURLPIPE_MULTIPLEX](#constant.curlpipe-multiplex)**
    ([int](#language.types.integer))



     Disponible a partir de cURL 7.43.0.





    **[CURLPIPE_NOTHING](#constant.curlpipe-nothing)**
    ([int](#language.types.integer))



     Disponible a partir de cURL 7.43.0.





    **[CURLPROXY_HTTP](#constant.curlproxy-http)**
    ([int](#language.types.integer))



     Disponible a partir de cURL 7.10.





    **[CURLPROXY_HTTPS](#constant.curlproxy-https)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.0 y cURL 7.52.0





    **[CURLPROXY_HTTP_1_0](#constant.curlproxy-http-1-0)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.0.7 y cURL 7.19.3





    **[CURLPROXY_SOCKS4](#constant.curlproxy-socks4)**
    ([int](#language.types.integer))



     Disponible a partir de cURL 7.10.





    **[CURLPROXY_SOCKS4A](#constant.curlproxy-socks4a)**
    ([int](#language.types.integer))



     Disponible a partir de cURL 7.18.0.





    **[CURLPROXY_SOCKS5](#constant.curlproxy-socks5)**
    ([int](#language.types.integer))



     Disponible a partir de cURL 7.10.





    **[CURLPROXY_SOCKS5_HOSTNAME](#constant.curlproxy-socks5-hostname)**
    ([int](#language.types.integer))



     Disponible a partir de cURL 7.18.0.





    **[CURLPX_BAD_ADDRESS_TYPE](#constant.curlpx-bad-address-type)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_BAD_VERSION](#constant.curlpx-bad-version)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_CLOSED](#constant.curlpx-closed)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_GSSAPI](#constant.curlpx-gssapi)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_GSSAPI_PERMSG](#constant.curlpx-gssapi-permsg)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_GSSAPI_PROTECTION](#constant.curlpx-gssapi-protection)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_IDENTD](#constant.curlpx-identd)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_IDENTD_DIFFER](#constant.curlpx-identd-differ)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_LONG_HOSTNAME](#constant.curlpx-long-hostname)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_LONG_PASSWD](#constant.curlpx-long-passwd)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_LONG_USER](#constant.curlpx-long-user)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_NO_AUTH](#constant.curlpx-no-auth)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_OK](#constant.curlpx-ok)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_RECV_ADDRESS](#constant.curlpx-recv-address)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_RECV_AUTH](#constant.curlpx-recv-auth)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_RECV_CONNECT](#constant.curlpx-recv-connect)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_RECV_REQACK](#constant.curlpx-recv-reqack)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_REPLY_ADDRESS_TYPE_NOT_SUPPORTED](#constant.curlpx-reply-address-type-not-supported)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_REPLY_COMMAND_NOT_SUPPORTED](#constant.curlpx-reply-command-not-supported)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_REPLY_CONNECTION_REFUSED](#constant.curlpx-reply-connection-refused)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_REPLY_GENERAL_SERVER_FAILURE](#constant.curlpx-reply-general-server-failure)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_REPLY_HOST_UNREACHABLE](#constant.curlpx-reply-host-unreachable)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_REPLY_NETWORK_UNREACHABLE](#constant.curlpx-reply-network-unreachable)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_REPLY_NOT_ALLOWED](#constant.curlpx-reply-not-allowed)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_REPLY_TTL_EXPIRED](#constant.curlpx-reply-ttl-expired)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_REPLY_UNASSIGNED](#constant.curlpx-reply-unassigned)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_REQUEST_FAILED](#constant.curlpx-request-failed)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_RESOLVE_HOST](#constant.curlpx-resolve-host)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_SEND_AUTH](#constant.curlpx-send-auth)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_SEND_CONNECT](#constant.curlpx-send-connect)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_SEND_REQUEST](#constant.curlpx-send-request)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_UNKNOWN_FAIL](#constant.curlpx-unknown-fail)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_UNKNOWN_MODE](#constant.curlpx-unknown-mode)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLPX_USER_REJECTED](#constant.curlpx-user-rejected)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.73.0





    **[CURLSSH_AUTH_AGENT](#constant.curlssh-auth-agent)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.0.7 y cURL 7.28.0





    **[CURLSSH_AUTH_ANY](#constant.curlssh-auth-any)**
    ([int](#language.types.integer))









    **[CURLSSH_AUTH_DEFAULT](#constant.curlssh-auth-default)**
    ([int](#language.types.integer))









    **[CURLSSH_AUTH_GSSAPI](#constant.curlssh-auth-gssapi)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.0 y cURL 7.58.0





    **[CURLSSH_AUTH_HOST](#constant.curlssh-auth-host)**
    ([int](#language.types.integer))









    **[CURLSSH_AUTH_KEYBOARD](#constant.curlssh-auth-keyboard)**
    ([int](#language.types.integer))









    **[CURLSSH_AUTH_NONE](#constant.curlssh-auth-none)**
    ([int](#language.types.integer))









    **[CURLSSH_AUTH_PASSWORD](#constant.curlssh-auth-password)**
    ([int](#language.types.integer))









    **[CURLSSH_AUTH_PUBLICKEY](#constant.curlssh-auth-publickey)**
    ([int](#language.types.integer))









    **[CURLSSLOPT_ALLOW_BEAST](#constant.curlsslopt-allow-beast)**
    ([int](#language.types.integer))



     Disponible a partir de cURL 7.25.0





    **[CURLSSLOPT_AUTO_CLIENT_CERT](#constant.curlsslopt-auto-client-cert)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.77.0





    **[CURLSSLOPT_NATIVE_CA](#constant.curlsslopt-native-ca)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.71.0





    **[CURLSSLOPT_NO_PARTIALCHAIN](#constant.curlsslopt-no-partialchain)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.68.0





    **[CURLSSLOPT_NO_REVOKE](#constant.curlsslopt-no-revoke)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.0.7 y cURL 7.44.0





    **[CURLSSLOPT_REVOKE_BEST_EFFORT](#constant.curlsslopt-revoke-best-effort)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.70.0





    **[CURLUSESSL_ALL](#constant.curlusessl-all)**
    ([int](#language.types.integer))



     Requiere SSL para todas las comunicaciones
     o falla con **[CURLE_USE_SSL_FAILED](#constant.curle-use-ssl-failed)**.
     Disponible a partir de cURL 7.17.0.





    **[CURLUSESSL_CONTROL](#constant.curlusessl-control)**
    ([int](#language.types.integer))



     Requiere SSL para la conexión de control
     o falla con **[CURLE_USE_SSL_FAILED](#constant.curle-use-ssl-failed)**.
     Disponible a partir de cURL 7.17.0.





    **[CURLUSESSL_NONE](#constant.curlusessl-none)**
    ([int](#language.types.integer))



     No intenta usar SSL.
     Disponible a partir de cURL 7.17.0.





    **[CURLUSESSL_TRY](#constant.curlusessl-try)**
    ([int](#language.types.integer))



     Intenta usar SSL, sino continúa normalmente.
     Es de notar que el servidor puede cerrar la conexión si la negociación falla.
     Disponible a partir de cURL 7.17.0.





    **[CURLVERSION_NOW](#constant.curlversion-now)**
    ([int](#language.types.integer))









    **[CURLWS_RAW_MODE](#constant.curlws-raw-mode)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.3.0 y cURL 7.86.0





    **[CURL_FNMATCHFUNC_FAIL](#constant.curl-fnmatchfunc-fail)**
    ([int](#language.types.integer))



     Devolvido por la función de devolución de llamada de coincidencia de caracteres genéricos si una error ha ocurrido.
     Disponible a partir de cURL 7.21.0.





    **[CURL_FNMATCHFUNC_MATCH](#constant.curl-fnmatchfunc-match)**
    ([int](#language.types.integer))



     Devolvido por la función de devolución de llamada de coincidencia de caracteres genéricos
     si el patrón coincide con la cadena.
     Disponible a partir de cURL 7.21.0.





    **[CURL_FNMATCHFUNC_NOMATCH](#constant.curl-fnmatchfunc-nomatch)**
    ([int](#language.types.integer))



     Devolvido por la función de devolución de llamada de coincidencia de caracteres genéricos
     si el patrón no coincide con la cadena.
     Disponible a partir de cURL 7.21.0.





    **[CURL_HTTP_VERSION_1_0](#constant.curl-http-version-1-0)**
    ([int](#language.types.integer))









    **[CURL_HTTP_VERSION_1_1](#constant.curl-http-version-1-1)**
    ([int](#language.types.integer))









    **[CURL_HTTP_VERSION_2](#constant.curl-http-version-2)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.0.7 y cURL 7.43.0





    **[CURL_HTTP_VERSION_2TLS](#constant.curl-http-version-2tls)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.0.7 y cURL 7.47.0





    **[CURL_HTTP_VERSION_2_0](#constant.curl-http-version-2-0)**
    ([int](#language.types.integer))



     Disponible a partir de cURL 7.33.0





    **[CURL_HTTP_VERSION_2_PRIOR_KNOWLEDGE](#constant.curl-http-version-2-prior-knowledge)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.0.7 y cURL 7.49.0





    **[CURL_HTTP_VERSION_3](#constant.curl-http-version-3)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.4.0 y cURL 7.66.0.





    **[CURL_HTTP_VERSION_3ONLY](#constant.curl-http-version-3only)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.4.0 y cURL 7.88.0.





    **[CURL_HTTP_VERSION_NONE](#constant.curl-http-version-none)**
    ([int](#language.types.integer))









    **[CURL_IPRESOLVE_V4](#constant.curl-ipresolve-v4)**
    ([int](#language.types.integer))



     Utilizar únicamente direcciones IPv4 al establecer una conexión
     o al elegir una del pool de conexiones.
     Disponible a partir de cURL 7.10.8.





    **[CURL_IPRESOLVE_V6](#constant.curl-ipresolve-v6)**
    ([int](#language.types.integer))



     Utilizar únicamente direcciones IPv6 al establecer una conexión
     o al elegir una del pool de conexiones.
     Disponible a partir de cURL 7.10.8.





    **[CURL_IPRESOLVE_WHATEVER](#constant.curl-ipresolve-whatever)**
    ([int](#language.types.integer))



     Utilizar direcciones de todas las versiones IP permitidas por el sistema.
     Disponible a partir de cURL 7.10.8.





    **[CURL_MAX_READ_SIZE](#constant.curl-max-read-size)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.0 y cURL 7.53.0





    **[CURL_NETRC_IGNORED](#constant.curl-netrc-ignored)**
    ([int](#language.types.integer))









    **[CURL_NETRC_OPTIONAL](#constant.curl-netrc-optional)**
    ([int](#language.types.integer))









    **[CURL_NETRC_REQUIRED](#constant.curl-netrc-required)**
    ([int](#language.types.integer))









    **[CURL_PUSH_DENY](#constant.curl-push-deny)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.1.0 y cURL 7.44.0





    **[CURL_PUSH_OK](#constant.curl-push-ok)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.1.0 y cURL 7.44.0





    **[CURL_READFUNC_PAUSE](#constant.curl-readfunc-pause)**
    ([int](#language.types.integer))



     Disponible a partir de cURL 7.18.0





    **[CURL_REDIR_POST_301](#constant.curl-redir-post-301)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.0.7 y cURL 7.18.2





    **[CURL_REDIR_POST_302](#constant.curl-redir-post-302)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.0.7 y cURL 7.18.2





    **[CURL_REDIR_POST_303](#constant.curl-redir-post-303)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.0.7 y cURL 7.25.1





    **[CURL_REDIR_POST_ALL](#constant.curl-redir-post-all)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.0.7 y cURL 7.18.2





    **[CURL_RTSPREQ_ANNOUNCE](#constant.curl-rtspreq-announce)**
    ([int](#language.types.integer))



     Cuando enviado por un cliente, este método cambia la descripción de la sesión.
     ANNOUNCE actúa como un HTTP PUT o POST
     así como **[CURL_RTSPREQ_SET_PARAMETER](#constant.curl-rtspreq-set-parameter)**.
     Disponible a partir de cURL 7.20.0.





    **[CURL_RTSPREQ_DESCRIBE](#constant.curl-rtspreq-describe)**
    ([int](#language.types.integer))



     Utilizado para obtener la descripción de bajo nivel de un flujo.
     La aplicación debe anotar los formatos que comprende
     en el encabezado Accept:. A menos que esté definido manualmente,
     libcurl añade automáticamente Accept: application/sdp.
     Los encabezados de condición temporal son añadidos a las peticiones DESCRIBE
     si la opción **[CURLOPT_TIMECONDITION](#constant.curlopt-timecondition)** es utilizada.
     Disponible a partir de cURL 7.20.0.





    **[CURL_RTSPREQ_GET_PARAMETER](#constant.curl-rtspreq-get-parameter)**
    ([int](#language.types.integer))



     Recupera un parámetro del servidor.
     Por omisión, libcurl añade un encabezado Content-Type: text/parameters
     a todas las peticiones no vacías a menos que un encabezado personalizado esté definido.
     GET_PARAMETER actúa como un HTTP PUT o POST.
     Las aplicaciones que deseen enviar un mensaje de latido
     deben utilizar una petición GET_PARAMETER vacía.
     Disponible a partir de cURL 7.20.0.





    **[CURL_RTSPREQ_OPTIONS](#constant.curl-rtspreq-options)**
    ([int](#language.types.integer))



     Utilizado para obtener las opciones de la sesión.
     Disponible a partir de cURL 7.20.0.





    **[CURL_RTSPREQ_PAUSE](#constant.curl-rtspreq-pause)**
    ([int](#language.types.integer))



     Envía un comando PAUSE al servidor.
     Utilizar la opción **[CURLOPT_RANGE](#constant.curlopt-range)** con un solo valor
     para indicar cuándo el flujo debe ser detenido (por ejemplo npt=25).
     Disponible a partir de cURL 7.20.0.





    **[CURL_RTSPREQ_PLAY](#constant.curl-rtspreq-play)**
    ([int](#language.types.integer))



     Envía un comando PLAY al servidor.
     Utilizar la opción **[CURLOPT_RANGE](#constant.curlopt-range)**
     para modificar el tiempo de lectura (por ejemplo npt=10-15).
     Disponible a partir de cURL 7.20.0.





    **[CURL_RTSPREQ_RECEIVE](#constant.curl-rtspreq-receive)**
    ([int](#language.types.integer))



     Define el tipo de petición RTSP para recibir datos RTP entrelazados.
     Disponible a partir de cURL 7.20.0.





    **[CURL_RTSPREQ_RECORD](#constant.curl-rtspreq-record)**
    ([int](#language.types.integer))



     Utilizado para decirle al servidor que grabe una sesión.
     Utilizar la opción **[CURLOPT_RANGE](#constant.curlopt-range)** para modificar el tiempo de grabación.
     Disponible a partir de cURL 7.20.0.





    **[CURL_RTSPREQ_SETUP](#constant.curl-rtspreq-setup)**
    ([int](#language.types.integer))



     Utilizado para inicializar la capa de transporte para la sesión.
     Disponible a partir de cURL 7.20.0.





    **[CURL_RTSPREQ_SET_PARAMETER](#constant.curl-rtspreq-set-parameter)**
    ([int](#language.types.integer))



     Define un parámetro en el servidor.
     Disponible a partir de cURL 7.20.0.





    **[CURL_RTSPREQ_TEARDOWN](#constant.curl-rtspreq-teardown)**
    ([int](#language.types.integer))



     Termina una sesión RTSP.
     Cerrar simplemente una conexión no termina la sesión RTSP
     ya que es válido controlar una sesión RTSP en diferentes conexiones.
     Disponible a partir de cURL 7.20.0.





    **[CURL_SSLVERSION_DEFAULT](#constant.curl-sslversion-default)**
    ([int](#language.types.integer))









    **[CURL_SSLVERSION_MAX_DEFAULT](#constant.curl-sslversion-max-default)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.0 y cURL 7.54.0





    **[CURL_SSLVERSION_MAX_NONE](#constant.curl-sslversion-max-none)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.0 y cURL 7.54.0





    **[CURL_SSLVERSION_MAX_TLSv1_0](#constant.curl-sslversion-max-tlsv1-0)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.0 y cURL 7.54.0





    **[CURL_SSLVERSION_MAX_TLSv1_1](#constant.curl-sslversion-max-tlsv1-1)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.0 y cURL 7.54.0





    **[CURL_SSLVERSION_MAX_TLSv1_2](#constant.curl-sslversion-max-tlsv1-2)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.0 y cURL 7.54.0





    **[CURL_SSLVERSION_MAX_TLSv1_3](#constant.curl-sslversion-max-tlsv1-3)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.0 y cURL 7.54.0





    **[CURL_SSLVERSION_SSLv2](#constant.curl-sslversion-sslv2)**
    ([int](#language.types.integer))









    **[CURL_SSLVERSION_SSLv3](#constant.curl-sslversion-sslv3)**
    ([int](#language.types.integer))









    **[CURL_SSLVERSION_TLSv1](#constant.curl-sslversion-tlsv1)**
    ([int](#language.types.integer))









    **[CURL_SSLVERSION_TLSv1_0](#constant.curl-sslversion-tlsv1-0)**
    ([int](#language.types.integer))









    **[CURL_SSLVERSION_TLSv1_1](#constant.curl-sslversion-tlsv1-1)**
    ([int](#language.types.integer))









    **[CURL_SSLVERSION_TLSv1_2](#constant.curl-sslversion-tlsv1-2)**
    ([int](#language.types.integer))









    **[CURL_SSLVERSION_TLSv1_3](#constant.curl-sslversion-tlsv1-3)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.0 y cURL 7.52.0





    **[CURL_TIMECOND_IFMODSINCE](#constant.curl-timecond-ifmodsince)**
    ([int](#language.types.integer))









    **[CURL_TIMECOND_IFUNMODSINCE](#constant.curl-timecond-ifunmodsince)**
    ([int](#language.types.integer))









    **[CURL_TIMECOND_LASTMOD](#constant.curl-timecond-lastmod)**
    ([int](#language.types.integer))









    **[CURL_TIMECOND_NONE](#constant.curl-timecond-none)**
    ([int](#language.types.integer))









    **[CURL_TLSAUTH_SRP](#constant.curl-tlsauth-srp)**
    ([int](#language.types.integer))



     Disponible a partir de cURL 7.21.4.





    **[CURL_VERSION_ALTSVC](#constant.curl-version-altsvc)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.6 y cURL 7.64.1





    **[CURL_VERSION_ASYNCHDNS](#constant.curl-version-asynchdns)**
    ([int](#language.types.integer))



     Resoluciones DNS asíncronas.
     Disponible a partir de PHP 7.3.0 y cURL 7.10.7





    **[CURL_VERSION_BROTLI](#constant.curl-version-brotli)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.0 y cURL 7.57.0





    **[CURL_VERSION_CONV](#constant.curl-version-conv)**
    ([int](#language.types.integer))



     Conversiones de caracteres soportadas.
     Disponible a partir de PHP 7.3.0 y cURL 7.15.4





    **[CURL_VERSION_CURLDEBUG](#constant.curl-version-curldebug)**
    ([int](#language.types.integer))



     Seguimiento de la memoria de depuración soportado.
     Disponible a partir de PHP 7.3.6 y cURL 7.19.6





    **[CURL_VERSION_DEBUG](#constant.curl-version-debug)**
    ([int](#language.types.integer))



     Construido con capacidades de depuración.
     Disponible a partir de PHP 7.3.0 y cURL 7.10.6





    **[CURL_VERSION_GSASL](#constant.curl-version-gsasl)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.76.0





    **[CURL_VERSION_GSSAPI](#constant.curl-version-gssapi)**
    ([int](#language.types.integer))



     Construido contra una biblioteca GSS-API.
     Disponible a partir de PHP 7.3.0 y cURL 7.38.0





    **[CURL_VERSION_GSSNEGOTIATE](#constant.curl-version-gssnegotiate)**
    ([int](#language.types.integer))



     La autenticación Negotiate es soportada.
     Disponible a partir de PHP 7.3.0 y cURL 7.10.6 (obsoleto a partir de cURL 7.38.0)





    **[CURL_VERSION_HSTS](#constant.curl-version-hsts)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.74.0





    **[CURL_VERSION_HTTP2](#constant.curl-version-http2)**
    ([int](#language.types.integer))



     Soporte HTTP2 integrado.
     Disponible a partir de cURL 7.33.0





    **[CURL_VERSION_HTTP3](#constant.curl-version-http3)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.66.0





    **[CURL_VERSION_HTTPS_PROXY](#constant.curl-version-https-proxy)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.0 y cURL 7.52.0





    **[CURL_VERSION_IDN](#constant.curl-version-idn)**
    ([int](#language.types.integer))



     Los nombres de dominio internacionalizados son soportados.
     Disponible a partir de PHP 7.3.0 y cURL 7.12.0





    **[CURL_VERSION_IPV6](#constant.curl-version-ipv6)**
    ([int](#language.types.integer))



     Soporte IPv6.





    **[CURL_VERSION_KERBEROS4](#constant.curl-version-kerberos4)**
    ([int](#language.types.integer))



     La autenticación Kerberos V4 es soportada.





    **[CURL_VERSION_KERBEROS5](#constant.curl-version-kerberos5)**
    ([int](#language.types.integer))



     La autenticación Kerberos V5 es soportada.
     Disponible a partir de PHP 7.0.7 y cURL 7.40.0





    **[CURL_VERSION_LARGEFILE](#constant.curl-version-largefile)**
    ([int](#language.types.integer))



     Soporte para ficheros de más de 2 Go.
     Disponible a partir de cURL 7.33.0





    **[CURL_VERSION_LIBZ](#constant.curl-version-libz)**
    ([int](#language.types.integer))



     Las funcionalidades de libz están presentes.





    **[CURL_VERSION_MULTI_SSL](#constant.curl-version-multi-ssl)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 7.3.0 y cURL 7.56.0





    **[CURL_VERSION_NTLM](#constant.curl-version-ntlm)**
    ([int](#language.types.integer))



     La autenticación NTLM es soportada.
     Disponible a partir de PHP 7.3.0 y cURL 7.10.6





    **[CURL_VERSION_NTLM_WB](#constant.curl-version-ntlm-wb)**
    ([int](#language.types.integer))



     La delegación NTLM al helper winbind es soportada.
     Disponible a partir de PHP 7.3.0 y cURL 7.22.0





    **[CURL_VERSION_PSL](#constant.curl-version-psl)**
    ([int](#language.types.integer))



     Lista de sufijos públicos de Mozilla, utilizada para la verificación de dominios de cookies.
     Disponible a partir de PHP 7.3.6 y cURL 7.47.0





    **[CURL_VERSION_SPNEGO](#constant.curl-version-spnego)**
    ([int](#language.types.integer))



     La autenticación SPNEGO es soportada.
     Disponible a partir de PHP 7.3.0 y cURL 7.10.8





    **[CURL_VERSION_SSL](#constant.curl-version-ssl)**
    ([int](#language.types.integer))



     Las opciones SSL están presentes.





    **[CURL_VERSION_SSPI](#constant.curl-version-sspi)**
    ([int](#language.types.integer))



     Construido contra Windows SSPI.
     Disponible a partir de PHP 7.3.0 y cURL 7.13.2





    **[CURL_VERSION_TLSAUTH_SRP](#constant.curl-version-tlsauth-srp)**
    ([int](#language.types.integer))



     La autenticación TLS-SRP es soportada.
     Disponible a partir de PHP 7.3.0 y cURL 7.21.4





    **[CURL_VERSION_UNICODE](#constant.curl-version-unicode)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.72.0





    **[CURL_VERSION_UNIX_SOCKETS](#constant.curl-version-unix-sockets)**
    ([int](#language.types.integer))



     Soporte para sockets de dominio Unix.
     Disponible a partir de PHP 7.0.7 y cURL 7.40.0





    **[CURL_VERSION_ZSTD](#constant.curl-version-zstd)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.2.0 y cURL 7.72.0





    **[CURL_WRITEFUNC_PAUSE](#constant.curl-writefunc-pause)**
    ([int](#language.types.integer))



     Disponible a partir de cURL 7.18.0





    **[CURL_PREREQFUNC_OK](#constant.curl-prereqfunc-ok)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.4.0 y cURL 7.80.0.





    **[CURL_PREREQFUNC_ABORT](#constant.curl-prereqfunc-abort)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.4.0 y cURL 7.80.0.









       Constantes
       Descripción


**[curl_setopt()](#function.curl-setopt)**

**[CURLOPT_ABSTRACT_UNIX_SOCKET](#constant.curlopt-abstract-unix-socket)**
([int](#language.types.integer))

    Activa el uso de un socket Unix abstracto en lugar de
    establecer una conexión TCP a un host y define la ruta dada
    en [string](#language.types.string). Esta opción comparte las mismas semánticas
    que **[CURLOPT_UNIX_SOCKET_PATH](#constant.curlopt-unix-socket-path)**. Ambas opciones
    comparten el mismo almacenamiento y por lo tanto solo una de ellas puede ser
    definida por un manejador.
    Disponible a partir de PHP 7.3.0 y cURL 7.53.0.

**[CURLOPT_ACCEPT_ENCODING](#constant.curlopt-accept-encoding)**
([int](#language.types.integer))

    Define un [string](#language.types.string) con el contenido
    del encabezado Accept-Encoding: enviado en una solicitud HTTP.
    Establecer en **[null](#constant.null)** para desactivar el envío del encabezado Accept-Encoding:.
    Por omisión a **[null](#constant.null)**.
    Disponible a partir de cURL 7.21.6.

**[CURLOPT_ACCEPTTIMEOUT_MS](#constant.curlopt-accepttimeout-ms)**
([int](#language.types.integer))

    El número máximo de milisegundos a esperar para que un servidor
    se reconecte a cURL cuando se usa una conexión FTP activa.
    Por omisión a 60000 milisegundos.
    Disponible a partir de cURL 7.24.0.

**[CURLOPT_ADDRESS_SCOPE](#constant.curlopt-address-scope)**
([int](#language.types.integer))

    El identificador de ámbito a usar al conectarse a una dirección IPv6.
    Esta opción acepta cualquier valor que pueda ser convertido en un [int](#language.types.integer) válido.
    Por omisión a 0.
    Disponible a partir de cURL 7.19.0.

**[CURLOPT_ALTSVC](#constant.curlopt-altsvc)**
([int](#language.types.integer))

    Pasar un [string](#language.types.string) con el nombre de archivo para que cURL lo use como caché Alt-Svc para leer el contenido
    de la caché existente
    y eventualmente reescribirlo después de un transferencia, a menos que
    **[CURLALTSVC_READONLYFILE](#constant.curlaltsvc-readonlyfile)**
    esté definido a través de **[CURLOPT_ALTSVC_CTRL](#constant.curlopt-altsvc-ctrl)**.
    Disponible a partir de PHP 8.2.0 y cURL 7.64.1.

**[CURLOPT_ALTSVC_CTRL](#constant.curlopt-altsvc-ctrl)**
([int](#language.types.integer))

    Rellena el bitmask con el conjunto correcto de funcionalidades para indicar a cURL cómo manejar Alt-Svc para los
    transferencias usando este manejador. cURL solo acepta los encabezados Alt-Svc en HTTPS. También completará
    una solicitud a un origen alternativo solo si este origen está correctamente alojado en HTTPS.
    Definir un bit activará el motor alt-svc.
    Definido en una de las constantes
    **
    CURLALTSVC_
     *
    **
    .
    Por omisión, la gestión Alt-Svc está desactivada.
    Disponible a partir de PHP 8.2.0 y cURL 7.64.1.

**[CURLOPT_APPEND](#constant.curlopt-append)**
([int](#language.types.integer))

    Establecer esta opción a 1 hará que las descargas FTP
    añadan al archivo remoto en lugar de sobrescribirlo.
    Por omisión a 0.
    Disponible a partir de cURL 7.17.0.

**[CURLOPT_AUTOREFERER](#constant.curlopt-autoreferer)**
([int](#language.types.integer))

    **[true](#constant.true)** para definir automáticamente el campo Referer: en
    las solicitudes donde sigue una redirección Location:.
    Por omisión, el valor es 0.

**[CURLOPT_AWS_SIGV4](#constant.curlopt-aws-sigv4)**
([int](#language.types.integer))

    Proporciona autenticación de firma AWS V4 en el encabezado HTTP(S) como [string](#language.types.string).
    Esta opción reemplaza cualquier otro tipo de autenticación que haya sido definido en
    **[CURLOPT_HTTPAUTH](#constant.curlopt-httpauth)**. Este método no puede combinarse con otros tipos de autenticación.
    Disponible a partir de PHP 8.2.0 y cURL 7.75.0.

**[CURLOPT_BINARYTRANSFER](#constant.curlopt-binarytransfer)**
([int](#language.types.integer))

    Esta constante ya no se usa a partir de PHP 5.5.0.
    Deprecado a partir de PHP 8.4.0.

**[CURLOPT_BUFFERSIZE](#constant.curlopt-buffersize)**
([int](#language.types.integer))

    Un tamaño de búfer a usar para cada lectura. No hay garantía
    de que esta solicitud será satisfecha, sin embargo.
    Esta opción acepta cualquier valor que pueda ser convertido en un [int](#language.types.integer) válido.
    Por omisión, el valor es **[CURL_MAX_WRITE_SIZE](#constant.curl-max-write-size)** (actualmente, 16kB).
    Disponible a partir de cURL 7.10.

**[CURLOPT_CAINFO](#constant.curlopt-cainfo)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el nombre de un archivo que contiene uno o varios certificados para verificar el
    par con. Esto solo tiene sentido cuando se usa en combinación con
    **[CURLOPT_SSL_VERIFYPEER](#constant.curlopt-ssl-verifypeer)**. Puede requerir una ruta absoluta.
    Disponible a partir de cURL 7.4.2.

**[CURLOPT_CAINFO_BLOB](#constant.curlopt-cainfo-blob)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el nombre de un archivo PEM que contiene uno o varios certificados para verificar el par
    con.
    Esta opción reemplaza **[CURLOPT_CAINFO](#constant.curlopt-cainfo)**.
    Disponible a partir de PHP 8.2.0 y cURL 7.77.0.

**[CURLOPT_CAPATH](#constant.curlopt-capath)**
([int](#language.types.integer))

    Un [string](#language.types.string) con un directorio que contiene varios certificados CA. Use esta opción
    en combinación con **[CURLOPT_SSL_VERIFYPEER](#constant.curlopt-ssl-verifypeer)**.
    Disponible a partir de cURL 7.9.8.

**[CURLOPT_CA_CACHE_TIMEOUT](#constant.curlopt-ca-cache-timeout)**
([int](#language.types.integer))

    Define el tiempo máximo en segundos durante el cual un almacén de certificados CA
    almacenado en caché en memoria puede ser conservado y reutilizado para nuevas conexiones.
    Esta opción acepta cualquier valor que pueda ser convertido en un [int](#language.types.integer) válido.
    Por omisión, el valor es 86400 (24 horas).
    Disponible a partir de PHP 8.3.0 y cURL 7.87.0

**[CURLOPT_CERTINFO](#constant.curlopt-certinfo)**
([int](#language.types.integer))

    **[true](#constant.true)** para salir con información sobre el certificado SSL en
    **[STDERR](#constant.stderr)**
    en transferencias seguras.
    Requiere **[CURLOPT_VERBOSE](#constant.curlopt-verbose)** para tener efecto.
    Por omisión, el valor es **[false](#constant.false)**.
    Disponible a partir de cURL 7.19.1.

**[CURLOPT_CONNECTTIMEOUT](#constant.curlopt-connecttimeout)**
([int](#language.types.integer))

    El número de segundos a esperar al intentar conectarse. Use 0 para
    esperar indefinidamente.
    Esta opción acepta cualquier valor que pueda ser convertido en un [int](#language.types.integer) válido.
    Por omisión, el valor es 300.
    Disponible a partir de cURL 7.7.0.

**[CURLOPT_CONNECTTIMEOUT_MS](#constant.curlopt-connecttimeout-ms)**
([int](#language.types.integer))

    El número de milisegundos a esperar al intentar conectarse.
    Use 0 para esperar indefinidamente.
    Si cURL está compilado para usar el resolutor de nombres estándar del sistema, esta
    parte de la conexión siempre usará una resolución a segundo completo para
    los tiempos de espera con un tiempo de espera mínimo permitido de un segundo.
    Esta opción acepta cualquier valor que pueda ser convertido en un [int](#language.types.integer) válido.
    Por omisión, el valor es 300000.
    Disponible a partir de cURL 7.16.2.

**[CURLOPT_CONNECT_ONLY](#constant.curlopt-connect-only)**
([int](#language.types.integer))

    **[true](#constant.true)** para indicar a la biblioteca que no realice autenticación de proxy
    y configuración de conexión requerida, pero no transferencia de datos. Esta opción está implementada para
    HTTP, SMTP y POP3.
    Por omisión, el valor es **[false](#constant.false)**.
    Disponible a partir de cURL 7.15.2.

**[CURLOPT_CONNECT_TO](#constant.curlopt-connect-to)**
([int](#language.types.integer))

    Conecta a un host y puerto específicos en lugar del host y puerto de la URL.
    Acepta un [array](#language.types.array) de [string](#language.types.string)s en el formato
    HOST:PORT:CONNECT-TO-HOST:CONNECT-TO-PORT.
    Disponible a partir de PHP 7.0.7 y cURL 7.49.0.

**[CURLOPT_COOKIE](#constant.curlopt-cookie)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el contenido del encabezado "Cookie: " a usar
    en la solicitud HTTP.
    Es de notar que múltiples cookies están separadas por un punto y coma seguido
    de un espacio (por ejemplo, fruit=apple; colour=red).
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_COOKIEFILE](#constant.curlopt-cookiefile)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el nombre del archivo que contiene los datos de las cookies.
    El archivo de cookies puede estar en formato Netscape, o simplemente encabezados HTTP clásicos
    volcados en un archivo.
    Si el nombre es una cadena vacía, no se cargan cookies, pero la gestión de cookies
    sigue activada.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_COOKIEJAR](#constant.curlopt-cookiejar)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el nombre del archivo para guardar todas las cookies internas cuando
    el destructor del manejador es llamado.
    Disponible a partir de cURL 7.9.0.

**Advertencia**

      A partir de PHP 8.0.0, [curl_close()](#function.curl-close) es una operación nula
      y no destruye *ningún* manejador.
      Si las cookies deben ser escritas antes de que el manejador sea destruido
      automáticamente, ejecute curl_setopt($ch, CURLOPT_COOKIELIST, "FLUSH");.


**[CURLOPT_COOKIELIST](#constant.curlopt-cookielist)**
([int](#language.types.integer))

    Un [string](#language.types.string) de cookies (es decir, una sola línea en el formato Netscape/Mozilla, o un encabezado
    Set-Cookie HTTP regular) añade esta única cookie al almacenamiento interno de cookies.

      ALL
      borra todas las cookies almacenadas en memoria
     ,
      SESS
      borra todas las cookies de sesión almacenadas en memoria
     ,
      FLUSH
      escribe todas las cookies conocidas en el archivo especificado por
      **[CURLOPT_COOKIEJAR](#constant.curlopt-cookiejar)**
     ,
      RELOAD
      carga todas las cookies desde los archivos especificados por
      **[CURLOPT_COOKIEFILE](#constant.curlopt-cookiefile)**

    .
    Disponible a partir de cURL 7.14.1.

**[CURLOPT_COOKIESESSION](#constant.curlopt-cookiesession)**
([int](#language.types.integer))

    **[true](#constant.true)** para marcar esto como una nueva "sesión" de cookies. Esto forzará a cURL
    a ignorar todas las cookies que está a punto de cargar que son "cookies de sesión"
    de la sesión anterior. Por omisión, cURL almacena y carga siempre
    todas las cookies, independientemente de si son cookies de sesión o no.
    Las cookies de sesión son cookies sin fecha de expiración y están destinadas a ser vivas
    y existentes solo para esta "sesión".
    Disponible a partir de cURL 7.9.7.

**[CURLOPT_CRLF](#constant.curlopt-crlf)**
([int](#language.types.integer))

    **[true](#constant.true)** para convertir los finales de línea Unix en finales de línea CRLF
    en las transferencias.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_CRLFILE](#constant.curlopt-crlfile)**
([int](#language.types.integer))

    Pasar un [string](#language.types.string) nombrando un archivo con la concatenación de
    la CRL (Certificate Revocation List) (en formato PEM)
    para usar en la validación del certificado que ocurre durante el intercambio SSL.
    Cuando cUrl está compilado para usar GnuTLS,
    no hay manera de influir en el uso de CRL pasado
    para ayudar en el proceso de verificación.
    Cuando cUrl está compilado para usar OpenSSL,
    X509_V_FLAG_CRL_CHECK
    y X509_V_FLAG_CRL_CHECK_ALL están ambos definidos,
    exigiendo la verificación de la CRL contra todos los elementos de la cadena de certificados
    si un archivo CRL es pasado.
    También es de notar que **[CURLOPT_CRLFILE](#constant.curlopt-crlfile)** implica
    **[CURLSSLOPT_NO_PARTIALCHAIN](#constant.curlsslopt-no-partialchain)**
    a partir de cURL 7.71.0 debido a un bug de OpenSSL.
    Disponible a partir de cURL 7.19.0.

**[CURLOPT_CUSTOMREQUEST](#constant.curlopt-customrequest)**
([int](#language.types.integer))

    Un método de solicitud personalizado a usar en lugar de
    GET
    o HEAD al realizar
    una solicitud HTTP. Esto es útil para realizar
    solicitudes HTTP más oscuras como DELETE u otras.
    Los valores válidos son cosas como GET,
    POST, CONNECT y así sucesivamente;
    es decir, no ingresar una línea completa de solicitud HTTP aquí. Por ejemplo,
    ingresar
    GET /index.html HTTP/1.0\r\n\r\n
    sería incorrecto.
    Esta opción acepta un [string](#language.types.string) o **[null](#constant.null)**.
    Disponible a partir de cURL 7.1.0.

**Nota**:

      No hacer esto sin asegurarse de que el servidor soporte el método de solicitud
      personalizado primero.


**[CURLOPT_DEFAULT_PROTOCOL](#constant.curlopt-default-protocol)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el protocolo por defecto a usar si la URL carece de un nombre de esquema.
    Disponible a partir de PHP 7.0.7 y cURL 7.45.0.

**[CURLOPT_DIRLISTONLY](#constant.curlopt-dirlistonly)**
([int](#language.types.integer))

    Definir esta opción a 1 para tener efectos diferentes
    basados en el protocolo con el que se usa.
    Las URLs basadas en FTP y SFTP solo listarán los nombres de archivos en un directorio.
    POP3 listará el mensaje o mensajes de correo electrónico en el servidor POP3.
    Para FILE, esta opción no tiene efecto
    ya que los directorios siempre se listan en este modo.
    Usar esta opción con
    **[CURLOPT_WILDCARDMATCH](#constant.curlopt-wildcardmatch)**
    evitará que este último tenga algún efecto.
    Por omisión a 0.
    Disponible a partir de cURL 7.17.0.

**[CURLOPT_DISALLOW_USERNAME_IN_URL](#constant.curlopt-disallow-username-in-url)**
([int](#language.types.integer))

    **[true](#constant.true)** para no permitir URLs que incluyen un nombre de usuario.
    Los nombres de usuario están permitidos por omisión.
    Disponible a partir de PHP 7.3.0 y cURL 7.61.0.

**[CURLOPT_DNS_CACHE_TIMEOUT](#constant.curlopt-dns-cache-timeout)**
([int](#language.types.integer))

    El número de segundos para mantener las entradas DNS en memoria. Esta
    opción está definida por omisión a 120 (2 minutos).
    Esta opción acepta cualquier valor que pueda ser convertido en un [int](#language.types.integer) válido.
    Disponible a partir de cURL 7.9.3.

**[CURLOPT_DNS_INTERFACE](#constant.curlopt-dns-interface)**
([int](#language.types.integer))

    Define el nombre de la interfaz de red a la que el resolutor DNS debe enlazarse.
    Esto debe ser un nombre de interfaz (no una dirección).
    Esta opción acepta un [string](#language.types.string) o **[null](#constant.null)**.
    Disponible a partir de PHP 7.0.7 y cURL 7.33.0

**[CURLOPT_DNS_LOCAL_IP4](#constant.curlopt-dns-local-ip4)**
([int](#language.types.integer))

    Define la dirección IPv4 local a la que el resolutor debe enlazarse.
    El argumento debe contener una sola dirección IPv4 numérica.
    Esta opción acepta un [string](#language.types.string) o **[null](#constant.null)**.
    Disponible a partir de PHP 7.0.7 y cURL 7.33.0.

**[CURLOPT_DNS_LOCAL_IP6](#constant.curlopt-dns-local-ip6)**
([int](#language.types.integer))

    Define la dirección IPv6 local a la que el resolutor debe enlazarse.
    El argumento debe contener una sola dirección IPv6 numérica.
    Esta opción acepta un [string](#language.types.string) o **[null](#constant.null)**.
    Disponible a partir de PHP 7.0.7 y cURL 7.33.0.

**[CURLOPT_DNS_SERVERS](#constant.curlopt-dns-servers)**
([int](#language.types.integer))

    Pasar un [string](#language.types.string) con una lista separada por comas de servidores DNS a usar
    en lugar del sistema por defecto
    (por ejemplo: 192.168.1.100,192.168.1.101:8080).
    Disponible a partir de cURL 7.24.0.

**[CURLOPT_DNS_SHUFFLE_ADDRESSES](#constant.curlopt-dns-shuffle-addresses)**
([int](#language.types.integer))

    **[true](#constant.true)** para mezclar el orden de todas las direcciones devueltas para que sean usadas
    en un orden aleatorio, cuando un nombre es resuelto y más de una dirección IP es devuelta.
    Esto puede resultar en el uso de IPv4 antes que IPv6 o viceversa.
    Disponible a partir de PHP 7.3.0 y cURL 7.60.0.

**[CURLOPT_DNS_USE_GLOBAL_CACHE](#constant.curlopt-dns-use-global-cache)**
([int](#language.types.integer))

    **[true](#constant.true)** para usar una caché DNS global. Esta opción no es thread-safe.
    Está activada por omisión si PHP está compilado para uso no threadado
    (CLI, FCGI, Apache2-Prefork, etc.).
    Disponible a partir de cURL 7.9.3 y obsoleta a partir de cURL 7.11.1.
    A partir de PHP 8.4, esta opción ya no tiene ningún efecto.

**[CURLOPT_DOH_SSL_VERIFYHOST](#constant.curlopt-doh-ssl-verifyhost)**
([int](#language.types.integer))

    Establecer en 2 para verificar el campo de nombre del certificado SSL del servidor DNS-over-HTTPS
    en comparación con el nombre de host.
    Disponible a partir de PHP 8.2.0 y cURL 7.76.0.

**[CURLOPT_DOH_SSL_VERIFYPEER](#constant.curlopt-doh-ssl-verifypeer)**
([int](#language.types.integer))

    Establecer en 1 para activar y 0 para desactivar
    la verificación de la autenticidad del certificado SSL del servidor DNS-over-HTTPS.
    Disponible a partir de PHP 8.2.0 y cURL 7.76.0.

**[CURLOPT_DOH_SSL_VERIFYSTATUS](#constant.curlopt-doh-ssl-verifystatus)**
([int](#language.types.integer))

    Establecer en 1 para activar y 0 para desactivar
    la verificación del estado del certificado del servidor DNS-over-HTTPS usando
    la extensión TLS "Certificate Status Request" (OCSP stapling).
    Disponible a partir de PHP 8.2.0 y cURL 7.76.0.

**[CURLOPT_DOH_URL](#constant.curlopt-doh-url)**
([int](#language.types.integer))

    Proporciona la URL DNS-over-HTTPS.
    Esta opción acepta un [string](#language.types.string) o **[null](#constant.null)**.
    Disponible a partir de PHP 8.1.0 y cURL 7.62.0.

**[CURLOPT_EGDSOCKET](#constant.curlopt-egdsocket)**
([int](#language.types.integer))

    Como **[CURLOPT_RANDOM_FILE](#constant.curlopt-random-file)** excepto que pasas una cadena que contiene un nombre
    de archivo al socket Entropy Gathering Daemon.
    Disponible a partir de cURL 7.7.0 y obsoleto a partir de cURL 7.84.0.

**[CURLOPT_ENCODING](#constant.curlopt-encoding)**
([int](#language.types.integer))

    El contenido de los encabezados Accept-Encoding: como [string](#language.types.string).
    Esto permite decodificar la respuesta.
    Los encodings soportados son

      identity
     ,
      deflate
     ,
      gzip

    .
    Si una cadena vacía, [string](#language.types.string),
    es definida, un encabezado que contiene todos los tipos de encoding soportados es enviado.
    Disponible a partir de cURL 7.10.

**[CURLOPT_EXPECT_100_TIMEOUT_MS](#constant.curlopt-expect-100-timeout-ms)**
([int](#language.types.integer))

    El tiempo de espera para las respuestas Expect: 100-continue en milisegundos.
    Por omisión, 1000 milisegundos.
    Esta opción acepta cualquier valor que pueda convertirse en un [int](#language.types.integer) válido.
    Disponible a partir de PHP 7.0.7 y cURL 7.36.0.

**[CURLOPT_FAILONERROR](#constant.curlopt-failonerror)**
([int](#language.types.integer))

    **[true](#constant.true)** para fallar verbalmente si el código HTTP devuelto
    es superior o igual a 400. El comportamiento por omisión es devolver
    la página normalmente, ignorando el código.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_FILE](#constant.curlopt-file)**
([int](#language.types.integer))

    Acepta un descriptor de fichero
    [resource](#language.types.resource)
    hacia el fichero en el que debe escribirse la transferencia.
    El valor por omisión es **[STDOUT](#constant.stdout)** (la ventana del navegador).
    Disponible a partir de cURL 7.1.0 y obsoleto a partir de cURL 7.9.7.

**[CURLOPT_FILETIME](#constant.curlopt-filetime)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para intentar recuperar la fecha de modificación
    del documento remoto. Este valor puede ser recuperado utilizando la opción
    **[CURLINFO_FILETIME](#constant.curlinfo-filetime)**
    con
    [curl_getinfo()](#function.curl-getinfo).
    Disponible a partir de cURL 7.5.0.

**[CURLOPT_FNMATCH_FUNCTION](#constant.curlopt-fnmatch-function)**
([int](#language.types.integer))

    Pasar un [callable](#language.types.callable) que será utilizado para la correspondencia de caracteres genéricos.
    La firma de la función de devolución de llamada debe ser:




      callback
     (

      [resource](#language.types.resource) $curlHandle
     ,

      [string](#language.types.string) $pattern
     ,

      [string](#language.types.string) $string
     ): [int](#language.types.integer)




       curlHandle



        El manejador cURL.





       pattern



        La cadena de caracteres genéricos.





       string



        El [string](#language.types.string) sobre el que ejecutar la correspondencia de caracteres genéricos.




    La función de devolución de llamada debe devolver
    **[CURL_FNMATCHFUNC_MATCH](#constant.curl-fnmatchfunc-match)**
    si el patrón coincide con el [string](#language.types.string),
    **[CURL_FNMATCHFUNC_NOMATCH](#constant.curl-fnmatchfunc-nomatch)**
    si no es así
    o **[CURL_FNMATCHFUNC_FAIL](#constant.curl-fnmatchfunc-fail)** si ha ocurrido un error.
    Disponible a partir de cURL 7.21.0.

**[CURLOPT_FOLLOWLOCATION](#constant.curlopt-followlocation)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para seguir todos los encabezados
    Location:
    enviados por el servidor en la respuesta HTTP.
    Ver también **[CURLOPT_MAXREDIRS](#constant.curlopt-maxredirs)**.
    Esta constante no está disponible cuando
    [open_basedir](#ini.open-basedir)
    está activado.

**[CURLOPT_FORBID_REUSE](#constant.curlopt-forbid-reuse)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para forzar el cierre explícito de la conexión
    cuando el proceso finaliza, por lo que no se almacenará en caché para su reutilización.
    Disponible a partir de cURL 7.7.0.

**[CURLOPT_FRESH_CONNECT](#constant.curlopt-fresh-connect)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para forzar el uso de una nueva conexión
    en lugar de una conexión almacenada en caché.
    Disponible a partir de cURL 7.7.0.

**[CURLOPT_FTPAPPEND](#constant.curlopt-ftpappend)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para añadir al fichero remoto en lugar de
    sobrescribirlo.
    Disponible a partir de cURL 7.1.0 y obsoleto a partir de cURL 7.16.4.

**[CURLOPT_FTPASCII](#constant.curlopt-ftpascii)**
([int](#language.types.integer))

    Un alias de
    **[CURLOPT_TRANSFERTEXT](#constant.curlopt-transfertext)**. Utilice esto en su lugar.
    Disponible a partir de cURL 7.1, obsoleto a partir de cURL 7.11.1
    y disponible por última vez a partir de cURL 7.15.5.
    Eliminado a partir de PHP 7.3.0.

**[CURLOPT_FTPLISTONLY](#constant.curlopt-ftplistonly)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para solo listar los nombres de un
    directorio FTP.
    Disponible a partir de cURL 7.1.0 y obsoleto a partir de cURL 7.16.4.

**[CURLOPT_FTPPORT](#constant.curlopt-ftpport)**
([int](#language.types.integer))

    Una [string](#language.types.string) que se utilizará para obtener la dirección IP a usar para el comando FTP
    PORT.
    El comando PORT indica al servidor remoto que se conecte a nuestra dirección IP especificada.
    El [string](#language.types.string) puede ser una dirección IP simple, un nombre de host, un nombre de interfaz de red (en Unix),
    o simplemente un - para usar la dirección IP por defecto del sistema.
    Esta opción acepta una [string](#language.types.string) o **[null](#constant.null)**.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_FTPSSLAUTH](#constant.curlopt-ftpsslauth)**
([int](#language.types.integer))

    Definir el método de autenticación FTP sobre SSL (si está activado) en una de las
    constantes
    **
    CURLFTPAUTH_
     *
    **
    .
    El valor por omisión es **[CURLFTPAUTH_DEFAULT](#constant.curlftpauth-default)**.

**[CURLOPT_FTP_ACCOUNT](#constant.curlopt-ftp-account)**
([int](#language.types.integer))

    Pasar un [string](#language.types.string) que será enviado como información de cuenta en FTP
    (usando el comando ACCT) después de que el nombre de usuario y la contraseña hayan sido
    proporcionados
    al servidor.
    Definir en **[null](#constant.null)** para desactivar el envío de la información de cuenta.
    Por omisión en **[null](#constant.null)**.
    Disponible a partir de cURL 7.13.0.

**[CURLOPT_FTP_ALTERNATIVE_TO_USER](#constant.curlopt-ftp-alternative-to-user)**
([int](#language.types.integer))

    Pasar un [string](#language.types.string) que será utilizado para intentar autenticarse en FTP
    si la negociación USER/PASS falla.
    Disponible a partir de cURL 7.15.5.

**[CURLOPT_FTP_CREATE_MISSING_DIRS](#constant.curlopt-ftp-create-missing-dirs)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para crear los directorios faltantes cuando una operación FTP
    encuentra un camino que actualmente no existe.
    Disponible a partir de cURL 7.10.7.

**[CURLOPT_FTP_FILEMETHOD](#constant.curlopt-ftp-filemethod)**
([int](#language.types.integer))

    Indica a curl qué método usar para alcanzar un fichero en un servidor FTP(S).
    Los valores posibles son
    una de las constantes
    **
    CURLFTPMETHOD_
     *
    **
    .
    El valor por omisión es **[CURLFTPMETHOD_MULTICWD](#constant.curlftpmethod-multicwd)**.
    Disponible a partir de cURL 7.15.1.

**[CURLOPT_FTP_RESPONSE_TIMEOUT](#constant.curlopt-ftp-response-timeout)**
([int](#language.types.integer))

    El tiempo de espera en segundos que cURL esperará para una respuesta de un servidor FTP
    Esta opción reemplaza **[CURLOPT_TIMEOUT](#constant.curlopt-timeout)**.
    Esta opción acepta cualquier valor que pueda convertirse en un [int](#language.types.integer) válido.
    Este nombre de opción es reemplazado por **[CURLOPT_SERVER_RESPONSE_TIMEOUT](#constant.curlopt-server-response-timeout)**, disponible a partir
    de PHP 8.4.0.
    Disponible a partir de cURL 7.10.8 y deprecado a partir de cURL 7.85.0.

**[CURLOPT_FTP_SKIP_PASV_IP](#constant.curlopt-ftp-skip-pasv-ip)**
([int](#language.types.integer))

    Si esta opción está definida en 1,
    cURL no utilizará la dirección IP que el servidor sugiere
    en su respuesta 227 al comando PASV de cURL
    sino que utilizará la dirección IP que usó para la conexión.
    El número de puerto recibido de la respuesta 227 no será ignorado por cURL.
    Por omisión en 1 a partir de cURL 7.74.0
    y 0 antes de eso.
    Disponible a partir de cURL 7.15.0.

**[CURLOPT_FTP_SSL](#constant.curlopt-ftp-ssl)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.11.0 y obsoleto a partir de cURL 7.16.4.

**[CURLOPT_FTP_SSL_CCC](#constant.curlopt-ftp-ssl-ccc)**
([int](#language.types.integer))

    Esta opción hace que cURL use CCC (Clear Command Channel)
    que detiene la capa SSL/TLS después de la autenticación
    dejando el resto de la comunicación del canal de control sin cifrar.
    Usar una de las constantes
    **
    CURLFTPSSL_CCC_
     *
    **
    .
    Por omisión en **[CURLFTPSSL_CCC_NONE](#constant.curlftpssl-ccc-none)**.
    Disponible a partir de cURL 7.16.1.

**[CURLOPT_FTP_USE_EPRT](#constant.curlopt-ftp-use-eprt)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para usar EPRT (y LPRT) durante las descargas FTP activas.
    Definir en **[false](#constant.false)** para desactivar EPRT y LPRT y usar solo
    PORT.
    Disponible a partir de cURL 7.10.5.

**[CURLOPT_FTP_USE_EPSV](#constant.curlopt-ftp-use-epsv)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para intentar primero un comando EPSV para las transferencias FTP antes de
    volver a PASV.
    Definir en **[false](#constant.false)** para desactivar EPSV.
    Disponible a partir de cURL 7.9.2.

**[CURLOPT_FTP_USE_PRET](#constant.curlopt-ftp-use-pret)**
([int](#language.types.integer))

    Definir en 1 para enviar un comando PRET antes
    PASV
    (y EPSV).
    No tiene ningún efecto al usar el modo de transferencia FTP activo.
    Por omisión en 0.
    Disponible a partir de cURL 7.20.0.

**[CURLOPT_GSSAPI_DELEGATION](#constant.curlopt-gssapi-delegation)**
([int](#language.types.integer))

    Definir en
    **[CURLGSSAPI_DELEGATION_FLAG](#constant.curlgssapi-delegation-flag)**
    para permitir la delegación incondicional de las credenciales GSSAPI.
    Definir en
    **[CURLGSSAPI_DELEGATION_POLICY_FLAG](#constant.curlgssapi-delegation-policy-flag)**
    para delegar solo si la bandera OK-AS-DELEGATE está definida
    en el ticket de servicio.
    Por omisión en **[CURLGSSAPI_DELEGATION_NONE](#constant.curlgssapi-delegation-none)**.
    Disponible a partir de cURL 7.22.0.

**[CURLOPT_HAPPY_EYEBALLS_TIMEOUT_MS](#constant.curlopt-happy-eyeballs-timeout-ms)**
([int](#language.types.integer))

    Un avance para IPv6 para el algoritmo Happy Eyeballs. Happy Eyeballs intenta
    conectarse tanto a las direcciones IPv4 como IPv6 para los hosts de doble pila,
    prefiriendo IPv6 primero para los milisegundos de tiempo de espera.
    Por omisión en **[CURL_HET_DEFAULT](#constant.curl-het-default)**, que actualmente es de 200 milisegundos.
    Esta opción acepta cualquier valor que pueda convertirse en un [int](#language.types.integer) válido.
    Disponible a partir de PHP 7.3.0 y cURL 7.59.0.

**[CURLOPT_HAPROXYPROTOCOL](#constant.curlopt-haproxyprotocol)**
([int](#language.types.integer))

    **[true](#constant.true)** para enviar un encabezado de protocolo HAProxy PROXY v1 al inicio de la conexión.
    La acción por omisión es no enviar este encabezado.
    Disponible a partir de PHP 7.3.0 y cURL 7.60.0.

**[CURLOPT_HEADER](#constant.curlopt-header)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para incluir los encabezados en la salida enviada al callback
    definido por **[CURLOPT_WRITEFUNCTION](#constant.curlopt-writefunction)**.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_HEADERFUNCTION](#constant.curlopt-headerfunction)**
([int](#language.types.integer))

    Un [callable](#language.types.callable) con la siguiente firma:




      callback
     (

      [resource](#language.types.resource) $curlHandle
     ,

      [string](#language.types.string) $headerData
     ): [int](#language.types.integer)




       curlHandle



        El manejador cURL.





       headerData



        Los datos de encabezado que deben ser escritos por el callback.




    El callback debe devolver el número de bytes escritos.
    Disponible a partir de cURL 7.7.2.

**[CURLOPT_HEADEROPT](#constant.curlopt-headeropt)**
([int](#language.types.integer))

    Enviar los encabezados HTTP tanto al proxy como al host o por separado.
    Los valores posibles son cualquiera de las
    constantes
    **
    CURLHEADER_
     *
    **
    .
    Por omisión en **[CURLHEADER_SEPARATE](#constant.curlheader-separate)** a partir de cURL
    7.42.1, y **[CURLHEADER_UNIFIED](#constant.curlheader-unified)** antes de eso.
    Disponible a partir de PHP 7.0.7 y cURL 7.37.0.

**[CURLOPT_HSTS](#constant.curlopt-hsts)**
([int](#language.types.integer))

    [string](#language.types.string)
    con el nombre del archivo de caché HSTS (HTTP Strict Transport Security)
    o **[null](#constant.null)** para permitir HSTS sin leer ni escribir en un archivo
    y borrar la lista de archivos para leer los datos HSTS.
    Disponible a partir de PHP 8.2.0 y cURL 7.74.0.

**[CURLOPT_HSTS_CTRL](#constant.curlopt-hsts-ctrl)**
([int](#language.types.integer))

    Acepta una máscara de bits de las características HSTS (HTTP Strict Transport Security)
    definidas por las constantes
    **
    CURLHSTS_
     *
    **
    .
    Disponible a partir de PHP 8.2.0 y cURL 7.74.0.

**[CURLOPT_HTTP09_ALLOWED](#constant.curlopt-http09-allowed)**
([int](#language.types.integer))

    Si se permiten las respuestas HTTP/0.9. Por omisión en **[false](#constant.false)** a partir de cURL 7.66.0;
    antes, era **[true](#constant.true)**.
    Disponible a partir de PHP 7.3.15 y 7.4.3, respectivamente, y cURL 7.64.0

**[CURLOPT_HTTP200ALIASES](#constant.curlopt-http200aliases)**
([int](#language.types.integer))

    Un [array](#language.types.array) de respuestas HTTP 200 que serán consideradas como respuestas válidas y no
    como errores.
    Disponible a partir de cURL 7.10.3.

**[CURLOPT_HTTPAUTH](#constant.curlopt-httpauth)**
([int](#language.types.integer))

    Una máscara de bits de los métodos de autenticación HTTP a usar. Las opciones son:

      **[CURLAUTH_BASIC](#constant.curlauth-basic)**
     ,
      **[CURLAUTH_DIGEST](#constant.curlauth-digest)**
     ,
      **[CURLAUTH_GSSNEGOTIATE](#constant.curlauth-gssnegotiate)**
     ,
      **[CURLAUTH_NTLM](#constant.curlauth-ntlm)**
     ,
      **[CURLAUTH_AWS_SIGV4](#constant.curlauth-aws-sigv4)**
     ,
      **[CURLAUTH_ANY](#constant.curlauth-any)**
     ,
      **[CURLAUTH_ANYSAFE](#constant.curlauth-anysafe)**

    .
    Si se usa más de un método, cURL interrogará al servidor para ver
    qué métodos soporta y elegirá el mejor.
    **[CURLAUTH_ANY](#constant.curlauth-any)**
    define todos los bits. cURL seleccionará automáticamente
    la que encuentre más segura.
    Disponible a partir de cURL 7.10.6.

**[CURLOPT_HTTPGET](#constant.curlopt-httpget)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para restablecer el método de solicitud HTTP a GET. Como GET es
    el valor por omisión, esto solo es necesario si la solicitud
    de solicitud ha sido cambiada.
    Disponible a partir de cURL 7.8.1.

**[CURLOPT_HTTPHEADER](#constant.curlopt-httpheader)**
([int](#language.types.integer))

    Un [array](#language.types.array) de campos de encabezado HTTP a definir. Este array debe estar en el formato

     array('Content-type: text/plain', 'Content-length: 100')

    Disponible a partir de cURL 7.1.0.

**[CURLOPT_HTTPPROXYTUNNEL](#constant.curlopt-httpproxytunnel)**
([int](#language.types.integer))

    **[true](#constant.true)** para tunelizar a través de un proxy HTTP dado.
    Disponible a partir de cURL 7.3.0.

**[CURLOPT_HTTP_CONTENT_DECODING](#constant.curlopt-http-content-decoding)**
([int](#language.types.integer))

    **[false](#constant.false)** para desactivar el decodificado automático del contenido de respuesta.
    Disponible a partir de cURL 7.16.2.

**[CURLOPT_HTTP_TRANSFER_DECODING](#constant.curlopt-http-transfer-decoding)**
([int](#language.types.integer))

    Si se define en 0, el decodificado de transferencia está desactivado.
    Si se define en 1, el decodificado de transferencia está activado.
    cURL hace el decodificado de transferencia por partes por omisión
    a menos que esta opción se defina en 0.
    Por omisión en 1.
    Disponible a partir de cURL 7.16.2.

**[CURLOPT_HTTP_VERSION](#constant.curlopt-http-version)**
([int](#language.types.integer))

    Definir en una de las constantes
    **
    CURL_HTTP_VERSION_
     *
    **
    para que cURL use la versión HTTP especificada.
    Disponible a partir de cURL 7.9.1.

**[CURLOPT_IGNORE_CONTENT_LENGTH](#constant.curlopt-ignore-content-length)**
([int](#language.types.integer))

    Si se define en 1,
    ignora el encabezado Content-Length en la respuesta HTTP
    e ignora la solicitud o dependencia de este para las transferencias FTP.
    Por omisión en 0.
    Disponible a partir de cURL 7.14.1.

**[CURLOPT_INFILE](#constant.curlopt-infile)**
([int](#language.types.integer))

    Acepta un manejador de fichero [resource](#language.types.resource) hacia el fichero desde el que debe leerse la transferencia
    durante la descarga.
    Disponible a partir de cURL 7.1.0 y deprecado a partir de cURL 7.9.7.
    Use **[CURLOPT_READDATA](#constant.curlopt-readdata)** en su lugar.

**[CURLOPT_INFILESIZE](#constant.curlopt-infilesize)**
([int](#language.types.integer))

    El tamaño esperado, en bytes, del fichero al enviar un fichero
    a un sitio remoto. Es de notar que el uso de esta opción no evitará
    que cURL envíe más datos, ya que lo que se envía depende exactamente de
    **[CURLOPT_READFUNCTION](#constant.curlopt-readfunction)**.
    Esta opción acepta cualquier valor que pueda convertirse en un [int](#language.types.integer) válido.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_INTERFACE](#constant.curlopt-interface)**
([int](#language.types.integer))

    Definir en una [string](#language.types.string) que contiene el nombre de la interfaz de red saliente a usar.
    Esto puede ser un nombre de interfaz, una dirección IP o un nombre de host.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_IPRESOLVE](#constant.curlopt-ipresolve)**
([int](#language.types.integer))

    Permite a una aplicación seleccionar el tipo de direcciones IP a utilizar durante
    la resolución de nombres de host. Esto solo es interesante al utilizar nombres de host que
    resuelven direcciones usando más de una versión de IP.
    Definir en una de las constantes
    **
    CURL_IPRESOLVE_
     *
    **
    .
    El valor por omisión es **[CURL_IPRESOLVE_WHATEVER](#constant.curl-ipresolve-whatever)**.
    Disponible a partir de cURL 7.10.8.

**[CURLOPT_ISSUERCERT](#constant.curlopt-issuercert)**
([int](#language.types.integer))

    Si se define a un [string](#language.types.string) que nombra un archivo que contiene un certificado CA en formato PEM,
    se realiza una verificación adicional contra el certificado del par
    para verificar que el emisor es el asociado
    con el certificado proporcionado por la opción.
    Para que el resultado de la verificación se considere un fracaso,
    esta opción debe usarse en combinación con la opción
    **[CURLOPT_SSL_VERIFYPEER](#constant.curlopt-ssl-verifypeer)**.
    Disponible a partir de cURL 7.19.0.

**[CURLOPT_ISSUERCERT_BLOB](#constant.curlopt-issuercert-blob)**
([int](#language.types.integer))

    Pasar un [string](#language.types.string) que contenga datos binarios de un certificado SSL CA en formato PEM.
    Si esta opción está definida, se realiza una verificación adicional del certificado de la entidad (peer) para
    verificar que el emisor es el asociado al certificado proporcionado por esta opción.
    Disponible a partir de PHP 8.1.0 y cURL 7.71.0.

**[CURLOPT_KEEP_SENDING_ON_ERROR](#constant.curlopt-keep-sending-on-error)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para continuar enviando el cuerpo de la petición si el código HTTP devuelto es superior o igual a
    300.
    La acción por omisión es detener el envío
    y cerrar el flujo o la conexión. Adecuado para la autenticación NTLM manual.
    La mayoría de las aplicaciones no necesitan esta opción.
    Disponible a partir de PHP 7.3.0 y cURL 7.51.0.

**[CURLOPT_KEYPASSWD](#constant.curlopt-keypasswd)**
([int](#language.types.integer))

    Definir en un [string](#language.types.string) con la contraseña requerida para usar el
    **[CURLOPT_SSLKEY](#constant.curlopt-sslkey)**
    o **[CURLOPT_SSH_PRIVATE_KEYFILE](#constant.curlopt-ssh-private-keyfile)**.
    Definir esta opción en **[null](#constant.null)** desactiva el uso de una contraseña para estas opciones.
    Disponible a partir de cURL 7.17.0.

**[CURLOPT_KRB4LEVEL](#constant.curlopt-krb4level)**
([int](#language.types.integer))

    La seguridad KRB4 (Kerberos 4). Cualquier valor [string](#language.types.string) siguiente
    (en orden del menos al más potente) es válido:

      clear
     ,
      safe
     ,
      confidential
     ,
      private

    .
    Si el [string](#language.types.string) no coincide con uno de estos valores,
    private
    es usado. Definir esta opción en **[null](#constant.null)**
    desactivará la seguridad KRB4. Actualmente, la seguridad KRB4 solo funciona
    con transacciones FTP.
    Disponible a partir de cURL 7.3.0 y obsoleto a partir de cURL 7.17.0.

**[CURLOPT_KRBLEVEL](#constant.curlopt-krblevel)**
([int](#language.types.integer))

    Define el nivel de seguridad Kerberos para FTP y también activa el soporte de Kerberos.
    Esto debe definirse en una de las [string](#language.types.string)s siguientes:

      clear
     ,
      safe
     ,
      confidential
     ,
      private

    Si la opción [string](#language.types.string) está definida pero no coincide con ninguna de estas valores,
    private
    es usado.
    Definir esta opción en **[null](#constant.null)** desactivará el soporte de Kerberos para FTP.
    Por omisión en **[null](#constant.null)**.
    Disponible a partir de cURL 7.16.4.

**[CURLOPT_LOCALPORT](#constant.curlopt-localport)**
([int](#language.types.integer))

    Define el número de puerto local del socket usado para la conexión.
    Esta opción acepta cualquier valor que pueda convertirse en un [int](#language.types.integer) válido.
    Por omisión en 0.
    Disponible a partir de cURL 7.15.2.

**[CURLOPT_LOCALPORTRANGE](#constant.curlopt-localportrange)**
([int](#language.types.integer))

    El número de intentos que cURL hace para encontrar un número de puerto local funcional,
    comenzando por el definido con **[CURLOPT_LOCALPORT](#constant.curlopt-localport)**.
    Esta opción acepta cualquier valor que pueda convertirse en un [int](#language.types.integer) válido.
    Por omisión en 1.
    Disponible a partir de cURL 7.15.2.

**[CURLOPT_LOGIN_OPTIONS](#constant.curlopt-login-options)**
([int](#language.types.integer))

    Puede usarse para definir opciones de conexión específicas del protocolo, tales como el
    mecanismo de autenticación preferido vía AUTH=NTLM o AUTH=*,
    y debe usarse en conjunción con la opción
    **[CURLOPT_USERNAME](#constant.curlopt-username)**.
    Disponible a partir de PHP 7.0.7 y cURL 7.34.0.

**[CURLOPT_LOW_SPEED_LIMIT](#constant.curlopt-low-speed-limit)**
([int](#language.types.integer))

    La velocidad de transferencia, en bytes por segundo, que la transferencia debe ser
    inferior durante el conteo de
    **[CURLOPT_LOW_SPEED_TIME](#constant.curlopt-low-speed-time)**
    segundos antes de que PHP considere la transferencia demasiado lenta y la interrumpa.
    Esta opción acepta cualquier valor que pueda convertirse en un [int](#language.types.integer) válido.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_LOW_SPEED_TIME](#constant.curlopt-low-speed-time)**
([int](#language.types.integer))

    El número de segundos que la velocidad de transferencia debe ser inferior
    a **[CURLOPT_LOW_SPEED_LIMIT](#constant.curlopt-low-speed-limit)** antes de que PHP considere
    la transferencia demasiado lenta y la interrumpa.
    Esta opción acepta cualquier valor que pueda convertirse en un [int](#language.types.integer) válido.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_MAIL_AUTH](#constant.curlopt-mail-auth)**
([int](#language.types.integer))

    Define un [string](#language.types.string) con la dirección de autenticación (identidad)
    de un mensaje enviado que es reenviado a otro servidor.
    Esta dirección no debe especificarse entre paréntesis
     (&lt;&gt;).
    Si se usa un [string](#language.types.string) vacío, entonces se envía un par de paréntesis por cURL
    como requerido por la RFC 2554.
    Disponible a partir de cURL 7.25.0.

**[CURLOPT_MAIL_FROM](#constant.curlopt-mail-from)**
([int](#language.types.integer))

    Define un [string](#language.types.string) con la dirección de correo electrónico del remitente al enviar un correo SMTP.
    La dirección de correo electrónico debe especificarse con paréntesis
    (&lt;&gt;) alrededor de ella,
    que si no están especificados son añadidos automáticamente.
    Si este parámetro no está especificado, se envía una dirección vacía
    al servidor SMTP que podría causar el rechazo del correo.
    Disponible a partir de cURL 7.20.0.

**[CURLOPT_MAIL_RCPT](#constant.curlopt-mail-rcpt)**
([int](#language.types.integer))

    Define un [array](#language.types.array) de [string](#language.types.string)s
    con los destinatarios a enviar al servidor en una petición de correo SMTP.
    Cada destinatario debe especificarse entre paréntesis
    (&lt;&gt;).
    Si un paréntesis no es usado como primer carácter,
    cURL asume que se ha proporcionado una sola dirección de correo electrónico
    y la encierra entre paréntesis.
    Disponible a partir de cURL 7.20.0.

**[CURLOPT_MAIL_RCPT_ALLLOWFAILS](#constant.curlopt-mail-rcpt-alllowfails)**
([int](#language.types.integer))

    Definir en 1 para permitir que el comando RCPT TO falle para algunos
    destinatarios, lo que hace que cURL ignore los errores para los destinatarios individuales y continúe con los otros
    destinatarios aceptados.
    Si todos los destinatarios resultan en fallos y esta bandera está especificada, cURL interrumpe la conversación SMTP
    y devuelve el error recibido del último comando RCPT TO.
    Reemplazado por **[CURLOPT_MAIL_RCPT_ALLOWFAILS](#constant.curlopt-mail-rcpt-allowfails)** a partir de cURL 8.2.0.
    Disponible a partir de PHP 8.2.0 y cURL 7.69.0.
    Deprecado a partir de cURL 8.2.0.

**[CURLOPT_MAXAGE_CONN](#constant.curlopt-maxage-conn)**
([int](#language.types.integer))

    El tiempo máximo de inactividad permitido para una conexión existente para ser considerada para reutilización.
    Por omisión, el tiempo máximo es definido en 118 segundos.
    Esta opción acepta cualquier valor que pueda convertirse en un [int](#language.types.integer) válido.
    Disponible a partir de PHP 8.2.0 y cURL 7.65.0

**[CURLOPT_MAXCONNECTS](#constant.curlopt-maxconnects)**
([int](#language.types.integer))

    El máximo de conexiones persistentes permitidas.
    Cuando se alcanza el límite, la más antigua en el caché es cerrada
    para evitar el aumento del número de conexiones abiertas.
    Esta opción acepta cualquier valor que pueda convertirse en un [int](#language.types.integer) válido.
    Disponible a partir de cURL 7.7.0.

**[CURLOPT_MAXFILESIZE](#constant.curlopt-maxfilesize)**
([int](#language.types.integer))

    Define el tamaño máximo admitido (en bytes) de un archivo a descargar.
    Si el archivo solicitado se encuentra más grande que este valor,
    la transferencia es interrumpida
    y **[CURLE_FILESIZE_EXCEEDED](#constant.curle-filesize-exceeded)** es devuelto.
    Pasar 0 desactiva esta opción,
    y pasar un tamaño negativo devuelve una
    **[CURLE_BAD_FUNCTION_ARGUMENT](#constant.curle-bad-function-argument)**.
    Si el tamaño del archivo no es conocido antes del inicio de la descarga,
    esta opción no tiene efecto.
    Para un límite de tamaño superior a 2GB,
    **[CURLOPT_MAXFILESIZE_LARGE](#constant.curlopt-maxfilesize-large)**
    debe ser usado.
    a partir de cURL 8.4.0, esta opción también detiene las transferencias en curso
    si alcanzan este umbral.
    Esta opción acepta cualquier valor que pueda convertirse en un [int](#language.types.integer) válido.
    Por omisión en 0.
    Disponible a partir de cURL 7.10.8.

**[CURLOPT_MAXFILESIZE_LARGE](#constant.curlopt-maxfilesize-large)**
([int](#language.types.integer))

    El tamaño máximo en bytes permitido para la descarga. Si el archivo solicitado se encuentra más grande que este
    valor,
    la transferencia no comenzará y **[CURLE_FILESIZE_EXCEEDED](#constant.curle-filesize-exceeded)** será devuelto.
    El tamaño del archivo no siempre es conocido antes de la descarga, y para tales archivos esta opción no tiene ningún
    efecto incluso si
    la transferencia de archivo termina siendo más grande que este límite dado.
    Disponible a partir de PHP 8.2.0 y cURL 7.11.0

**[CURLOPT_MAXLIFETIME_CONN](#constant.curlopt-maxlifetime-conn)**
([int](#language.types.integer))

    El tiempo máximo en segundos, desde la creación de la conexión, permitido para una conexión
    existente para ser considerada para reutilización. Si se encuentra una conexión en el caché que es más antigua
    que este valor, será cerrada una vez que todas las transferencias en curso hayan terminado.
    Por omisión en 0 segundos, lo que significa que la opción está desactivada y todas las conexiones
    son elegibles para reutilización.
    Esta opción acepta cualquier valor que pueda convertirse en un [int](#language.types.integer) válido.
    Disponible a partir de PHP 8.2.0 y cURL 7.80.0

**[CURLOPT_MAXREDIRS](#constant.curlopt-maxredirs)**
([int](#language.types.integer))

    La cantidad máxima de redirecciones HTTP a seguir. Usar esta opción junto con **[
    CURLOPT_FOLLOWLOCATION](#constant.%0A%20%20%20%20curlopt-followlocation)**.
    El valor por omisión de 20 está definido para evitar redirecciones infinitas.
    Definir en -1 permite redirecciones infinitas, y 0 rechaza todas las
    redirecciones.
    Disponible a partir de cURL 7.5.0.

**[CURLOPT_MAX_RECV_SPEED_LARGE](#constant.curlopt-max-recv-speed-large)**
([int](#language.types.integer))

    Si una descarga supera esta velocidad (contada en bytes por segundo)
    en promedio acumulativo durante la transferencia, la transferencia será pausada para
    mantener la velocidad promedio inferior o igual al valor del parámetro.
    El valor por omisión es una velocidad ilimitada.
    Esta opción acepta cualquier valor que pueda convertirse en un [int](#language.types.integer) válido.
    Disponible a partir de cURL 7.15.5.

**[CURLOPT_MAX_SEND_SPEED_LARGE](#constant.curlopt-max-send-speed-large)**
([int](#language.types.integer))

    Si un envío supera esta velocidad (contada en bytes por segundo)
    en promedio acumulativo durante la transferencia, la transferencia será pausada para
    mantener la velocidad promedio inferior o igual al valor del parámetro.
    El valor por omisión es una velocidad ilimitada.
    Esta opción acepta cualquier valor que pueda convertirse en un [int](#language.types.integer) válido.
    Disponible a partir de cURL 7.15.5.

**[CURLOPT_MIME_OPTIONS](#constant.curlopt-mime-options)**
([int](#language.types.integer))

    Definir un valor a una máscara de bits de las constantes
    **
    CURLMIMEOPT_
     *
    **
    .
    Actualmente, solo hay una opción disponible: **[CURLMIMEOPT_FORMESCAPE](#constant.curlmimeopt-formescape)**.
    Disponible a partir de PHP 8.3.0 y cURL 7.81.0.

**[CURLOPT_MUTE](#constant.curlopt-mute)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para ser completamente silencioso con
    las funciones cURL.
    Usar **[CURLOPT_RETURNTRANSFER](#constant.curlopt-returntransfer)** en su lugar.
    Disponible a partir de cURL 7.1.0, deprecado a partir de cURL 7.8.0
    y último disponible a partir de cURL 7.15.5.
    Eliminado a partir de PHP 7.3.0.

**[CURLOPT_NETRC](#constant.curlopt-netrc)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para escanear el archivo
    ~/.netrc
    para encontrar un nombre de usuario y una contraseña para el sitio remoto
    con el que se establece una conexión.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_NETRC_FILE](#constant.curlopt-netrc-file)**
([int](#language.types.integer))

    Define un [string](#language.types.string) que contiene el nombre completo del archivo .netrc.
    Si esta opción es omitida y **[CURLOPT_NETRC](#constant.curlopt-netrc)** está definido,
    cURL verifica un archivo
    .netrc
    en el directorio personal del usuario actual.
    Disponible a partir de cURL 7.11.0.

**[CURLOPT_NEW_DIRECTORY_PERMS](#constant.curlopt-new-directory-perms)**
([int](#language.types.integer))

    Define el valor de los permisos ([int](#language.types.integer)) que son definidos en los directorios recién creados
    en el servidor remoto. El valor por omisión es 0755.
    Los únicos protocolos que pueden usar esta opción son
    sftp://,
    scp://
    y file://.
    Disponible a partir de cURL 7.16.4.

**[CURLOPT_NEW_FILE_PERMS](#constant.curlopt-new-file-perms)**
([int](#language.types.integer))

    Define el valor de los permisos ([int](#language.types.integer)) que son definidos en los archivos recién creados
    en el servidor remoto. El valor por omisión es 0644.
    Los únicos protocolos que pueden usar esta opción son
    sftp://,
    scp://
    y file://.
    Disponible a partir de cURL 7.16.4.

**[CURLOPT_NOBODY](#constant.curlopt-nobody)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para excluir el cuerpo de la salida.
    Para HTTP(S), cURL realiza una petición HEAD. Para la mayoría de los otros protocolos,
    cURL no solicita en absoluto los datos del cuerpo.
    Cambiar esto a **[false](#constant.false)** resultará en la inclusión de los datos del cuerpo en la salida.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_NOPROGRESS](#constant.curlopt-noprogress)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para desactivar la barra de progreso para las transferencias cURL.

**Nota**:

      PHP define automáticamente esta opción en **[true](#constant.true)**, esto solo debería ser
      cambiado por razones de depuración.




    Disponible a partir de cURL 7.1.0.

**[CURLOPT_NOPROXY](#constant.curlopt-noproxy)**
([int](#language.types.integer))

    Define un [string](#language.types.string) consistente en una lista separada por comas de nombres de host
    que no requieren proxy para ser alcanzados.
    Cada nombre en esta lista es comparado ya sea como un dominio
    que contiene el nombre de host o el nombre de host mismo.
    El único carácter genérico disponibles en el
    [string](#language.types.string)
    es un simple carácter * que coincide con todos los hosts,
    desactivando efectivamente el proxy.
    Definir esta opción en un [string](#language.types.string) vacío activa el proxy para todos los nombres de host.
    a partir de cURL 7.86.0, las direcciones IP definidas con esta opción
    pueden ser proporcionadas usando la notación CIDR.
    Disponible a partir de cURL 7.19.4.

**[CURLOPT_NOSIGNAL](#constant.curlopt-nosignal)**
([int](#language.types.integer))

    **[true](#constant.true)** para ignorar cualquier función cURL que envíe un
    señal al proceso PHP. Esto está activado por omisión
    en los SAPI multi-hilo para que las opciones de tiempo de espera puedan siempre ser usadas.
    Disponible a partir de cURL 7.10.

**[CURLOPT_PASSWDFUNCTION](#constant.curlopt-passwdfunction)**
([int](#language.types.integer))

    Un [callable](#language.types.callable) con la siguiente firma:




      callback
     (

      [resource](#language.types.resource) $curlHandle
     ,

      [string](#language.types.string) $passwordPrompt
     ,

      [int](#language.types.integer) $maximumPasswordLength
     ): [string](#language.types.string)




       curlHandle



        El manejador cURL.





       passwordPrompt



        Un indicador de contraseña.





       maximumPasswordLength



        La longitud máxima de la contraseña.




    El callback debe devolver un [string](#language.types.string) que contenga la contraseña.
    Disponible a partir de cURL 7.4.2, deprecado a partir de cURL 7.11.1
    y último disponible a partir de cURL 7.15.5.
    Eliminado a partir de PHP 7.3.0.

**[CURLOPT_PASSWORD](#constant.curlopt-password)**
([int](#language.types.integer))

    Definir en un [string](#language.types.string) que contenga la contraseña a usar para la autenticación.
    Disponible a partir de cURL 7.19.1.

**[CURLOPT_PATH_AS_IS](#constant.curlopt-path-as-is)**
([int](#language.types.integer))

    Definir en **[true](#constant.true)** para que cURL no altere los caminos de URL antes de transmitirlos al servidor.
    Por omisión es **[false](#constant.false)**, lo que aplana las secuencias de
    /../
    o /./ que pueden existir en la parte camino de la URL
    y que están destinadas a ser eliminadas conforme a la sección 5.2.4 del RFC 3986.
    Disponible a partir de PHP 7.0.7 y cURL 7.42.0.

**[CURLOPT_PINNEDPUBLICKEY](#constant.curlopt-pinnedpublickey)**
([int](#language.types.integer))

    Definir un [string](#language.types.string) con la clave pública fijada.
    El [string](#language.types.string) puede ser el nombre del archivo de la clave pública fijada
    en formato PEM o DER. El [string](#language.types.string) también puede ser cualquier número de hachajes sha256 codificados en
    base64 precedidos por sha256// y
    separados por ;.
    Disponible a partir de PHP 7.0.7 y cURL 7.39.0.

**[CURLOPT_PIPEWAIT](#constant.curlopt-pipewait)**
([int](#language.types.integer))

    Establecer en **[true](#constant.true)** para esperar que una conexión existente confirme
    si puede hacer multiplexaje y usarlo si es el caso
    antes de crear y usar una nueva conexión.
    Disponible a partir de PHP 7.0.7 y cURL 7.43.0.

**[CURLOPT_PORT](#constant.curlopt-port)**
([int](#language.types.integer))

    Un [int](#language.types.integer) con un número de puerto alternativo para conectarse
    en lugar del especificado en la URL o del puerto por defecto para el protocolo utilizado.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_POST](#constant.curlopt-post)**
([int](#language.types.integer))

    Establecer en **[true](#constant.true)** para realizar una petición HTTP POST.
    Esta petición usa el encabezado application/x-www-form-urlencoded.
    Por omisión, es **[false](#constant.false)**.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_POSTFIELDS](#constant.curlopt-postfields)**
([int](#language.types.integer))

    Los datos completos a enviar en una operación HTTP POST.
    Este parámetro puede pasarse ya sea
    en forma de [string](#language.types.string) urlencodada como 'para1=val1&amp;para2=val2&amp;...'
    o en forma de un [array](#language.types.array) con el nombre del campo como clave y los datos del campo como valor.
    Si value es un array, el encabezado
    Content-Type
    será establecido en
    multipart/form-data.
    Los archivos pueden ser enviados usando [CURLFile](#class.curlfile) o [CURLStringFile](#class.curlstringfile),
    en cuyo caso value debe ser un [array](#language.types.array).
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_POSTQUOTE](#constant.curlopt-postquote)**
([int](#language.types.integer))

    Un [array](#language.types.array) de [string](#language.types.string)s de comandos FTP a ejecutar en el servidor después de ejecutar la
    petición FTP.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_POSTREDIR](#constant.curlopt-postredir)**
([int](#language.types.integer))

    Establecer en un bitmask de **[CURL_REDIR_POST_301](#constant.curl-redir-post-301)**,
    **[CURL_REDIR_POST_302](#constant.curl-redir-post-302)**
    y
    **[CURL_REDIR_POST_303](#constant.curl-redir-post-303)**
    si el método HTTP POST debe mantenerse
    cuando **[CURLOPT_FOLLOWLOCATION](#constant.curlopt-followlocation)** está establecido y ocurre
    un tipo específico de redirección.
    Disponible a partir de cURL 7.19.1.

**[CURLOPT_PRE_PROXY](#constant.curlopt-pre-proxy)**
([int](#language.types.integer))

    Establece una cadena [string](#language.types.string) que contiene el nombre de host o la dirección IP numérica
    a usar como preproxy al que cURL se conecta antes de
    conectarse al proxy HTTP(S) especificado en la opción
    **[CURLOPT_PROXY](#constant.curlopt-proxy)**
    para la próxima petición.
    El preproxy solo puede ser un proxy SOCKS y debe estar prefijado por
    [scheme]://
    para especificar qué tipo de calcetín se usa.
    Una dirección IP numérica IPv6 debe escribirse entre [corchetes].
    Establecer el preproxy en un [string](#language.types.string) vacío desactiva explícitamente el uso de un preproxy.
    Para especificar el número de puerto en este [string](#language.types.string), añadir
    :[port]
    al final del nombre de host. El número de puerto del proxy puede opcionalmente ser
    especificado con la opción separada **[CURLOPT_PROXYPORT](#constant.curlopt-proxyport)**.
    Por omisión, usa el puerto 1080 para los proxys si un puerto no está especificado.
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PREQUOTE](#constant.curlopt-prequote)**
([int](#language.types.integer))

    Establece un array de comandos FTP a ejecutar en el servidor antes de la petición
    después de que la conexión FTP haya sido establecida.
    Estos comandos no se ejecutan cuando se solicita una lista de directorio,
    solo para las transferencias de archivos.
    Disponible a partir de cURL 7.9.5.

**[CURLOPT_PRIVATE](#constant.curlopt-private)**
([int](#language.types.integer))

    Cualquier dato que debería asociarse con este manejador cURL. Estos datos
    pueden luego ser recuperados con la opción
    **[CURLINFO_PRIVATE](#constant.curlinfo-private)**
    de
    [curl_getinfo()](#function.curl-getinfo). cURL no hace nada con estos datos.
    Al usar un manejador cURL multi, estos datos privados son típicamente una
    clave única para identificar un manejador cURL estándar.
    Disponible a partir de cURL 7.10.3.

**[CURLOPT_PROGRESSFUNCTION](#constant.curlopt-progressfunction)**
([int](#language.types.integer))

    Un [callable](#language.types.callable) con la siguiente firma:




      callback
     (

    

      [resource](#language.types.resource) $curlHandle
     ,

    

      [int](#language.types.integer) $bytesToDownload
     ,

    

      [int](#language.types.integer) $bytesDownloaded
     ,

    

      [int](#language.types.integer) $bytesToUpload
     ,

    

      [int](#language.types.integer) $bytesUploaded


): [int](#language.types.integer)

       curlHandle



        El manejador cURL.





       bytesToDownload



        El número total de bytes esperados a descargar durante esta transferencia.





       bytesDownloaded



        El número de bytes descargados hasta ahora.





       bytesToUpload



        El número total de bytes esperados a descargar durante esta transferencia.





       bytesUploaded



        El número de bytes descargados hasta ahora.




    La devolución de llamada debe devolver un [int](#language.types.integer) con un valor no nulo para interrumpir la transferencia
    y establecer un error **[CURLE_ABORTED_BY_CALLBACK](#constant.curle-aborted-by-callback)**.
    **Nota**:



      La función es llamada cuando la opción
      **[CURLOPT_NOPROGRESS](#constant.curlopt-noprogress)**
      está establecida en **[false](#constant.false)**.




    Disponible a partir de cURL 7.1.0 y obsoleto a partir de cURL 7.32.0.
    Usar **[CURLOPT_XFERINFOFUNCTION](#constant.curlopt-xferinfofunction)** en su lugar.

**[CURLOPT_PROTOCOLS](#constant.curlopt-protocols)**
([int](#language.types.integer))

    Un bitmask de valores
    **
    CURLPROTO_
     *
    **
    .
    Si se usa, este bitmask limita los protocolos que cURL puede usar en la transferencia.
    Por omisión, esto vale **[CURLPROTO_ALL](#constant.curlproto-all)**, es decir, cURL aceptará todos los protocolos que soporta.
    Ver **[CURLOPT_REDIR_PROTOCOLS](#constant.curlopt-redir-protocols)**.
    Disponible a partir de cURL 7.19.4 y depreciado a partir de cURL 7.85.0.

**[CURLOPT_PROTOCOLS_STR](#constant.curlopt-protocols-str)**
([int](#language.types.integer))

    Establecer en un [string](#language.types.string) que contiene una lista separada por comas
    de nombres de protocolos insensibles a mayúsculas/minúsculas (esquemas de URL) permitidos en la transferencia.
    Establecer en ALL para activar todos los protocolos.
    Por omisión, cURL acepta todos los protocolos para los que ha sido construido con soporte.
    Los protocolos disponibles son:

      DICT
     ,
      FILE
     ,
      FTP
     ,
      FTPS
     ,
      GOPHER
     ,
      GOPHERS
     ,
      HTTP
     ,
      HTTPS
     ,
      IMAP
     ,
      IMAPS
     ,
      LDAP
     ,
      LDAPS
     ,
      MQTT
     ,
      POP3
     ,
      POP3S
     ,
      RTMP
     ,
      RTMPE
     ,
      RTMPS
     ,
      RTMPT
     ,
      RTMPTE
     ,
      RTMPTS
     ,
      RTSP
     ,
      SCP
     ,
      SFTP
     ,
      SMB
     ,
      SMBS
     ,
      SMTP
     ,
      SMTPS
     ,
      TELNET
     ,
      TFTP
     ,
      WS
     ,
      WSS

    .
    Disponible a partir de PHP 8.3.0 y cURL 7.85.0.

**[CURLOPT_PROXY](#constant.curlopt-proxy)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el proxy HTTP a través del cual realizar las peticiones.
    Esto debe ser el nombre de host, la dirección IP numérica en notación decimal
    o una dirección IPv6 numérica escrita entre [corchetes].
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_PROXYAUTH](#constant.curlopt-proxyauth)**
([int](#language.types.integer))

    Un bitmask de los métodos de autenticación HTTP
    (
    **
    CURLAUTH_
     *
    **
    )
    a usar para la conexión al proxy.
    Para la autenticación por proxy, solo **[CURLAUTH_BASIC](#constant.curlauth-basic)** y
    **[CURLAUTH_NTLM](#constant.curlauth-ntlm)**
    están actualmente soportados.
    Por omisión, es **[CURLAUTH_BASIC](#constant.curlauth-basic)**.
    Disponible a partir de cURL 7.10.7.

**[CURLOPT_PROXYHEADER](#constant.curlopt-proxyheader)**
([int](#language.types.integer))

    Un [array](#language.types.array) de encabezados HTTP personalizados como [string](#language.types.string) a enviar al proxy.
    Disponible a partir de PHP 7.0.7 y cURL 7.37.0.

**[CURLOPT_PROXYPASSWORD](#constant.curlopt-proxypassword)**
([int](#language.types.integer))

    Establece un [string](#language.types.string) con la contraseña a usar para la autenticación con el proxy.
    Disponible a partir de cURL 7.19.1.

**[CURLOPT_PROXYPORT](#constant.curlopt-proxyport)**
([int](#language.types.integer))

    Un [int](#language.types.integer) con el número de puerto del proxy a usar para la conexión.
    Este número de puerto también puede ser establecido en **[CURLOPT_PROXY](#constant.curlopt-proxy)**.
    Establecerlo en cero hace que cURL use el número de puerto por defecto del proxy
    o el número de puerto especificado en la cadena de caracteres de la URL del proxy.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_PROXYTYPE](#constant.curlopt-proxytype)**
([int](#language.types.integer))

    Establece el tipo de proxy a una de las constantes
    **
    CURLPROXY_
     *
    **
    .
    Por omisión, es **[CURLPROXY_HTTP](#constant.curlproxy-http)**.
    Disponible a partir de cURL 7.10.

**[CURLOPT_PROXYUSERNAME](#constant.curlopt-proxyusername)**
([int](#language.types.integer))

    Establece un [string](#language.types.string) con el nombre de usuario a usar para la autenticación con el proxy.
    Disponible a partir de cURL 7.19.1.

**[CURLOPT_PROXYUSERPWD](#constant.curlopt-proxyuserpwd)**
([int](#language.types.integer))

    Un [string](#language.types.string) que contiene un nombre de usuario y una contraseña en el formato
    [nombre_usuario]:[contraseña]
    a usar para la
    conexión al proxy.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_PROXY_CAINFO](#constant.curlopt-proxy-cainfo)**
([int](#language.types.integer))

    La ruta al archivo de certificados de la Autoridad de Certificación (CA) del proxy. Establecer la ruta como un
    [string](#language.types.string)
    que nombre un archivo que contenga uno o más certificados
    para verificar el proxy HTTPS.
    Esta opción es para conectarse a un proxy HTTPS, no a un servidor HTTPS.
    El valor por defecto es la ruta del sistema donde se supone que está almacenado el paquete cacert de cURL
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PROXY_CAINFO_BLOB](#constant.curlopt-proxy-cainfo-blob)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el nombre del archivo PEM que contiene uno o más certificados para verificar el proxy
    HTTPS.
    Esta opción es para conectarse a un proxy HTTPS, no a un servidor HTTPS.
    Por defecto, la ruta del sistema donde se supone que está almacenado el paquete cacert de cURL.
    Disponible a partir de PHP 8.2.0 y cURL 7.77.0.

**[CURLOPT_PROXY_CAPATH](#constant.curlopt-proxy-capath)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el directorio que contiene varios certificados CA para verificar el proxy HTTPS.
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PROXY_CRLFILE](#constant.curlopt-proxy-crlfile)**
([int](#language.types.integer))

    Establecer en un [string](#language.types.string) con el nombre de archivo que contiene la lista de revocación de certificados
    (CRL)
    en formato PEM a usar en la validación del certificado que ocurre durante
    el intercambio SSL.
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PROXY_ISSUERCERT](#constant.curlopt-proxy-issuercert)**
([int](#language.types.integer))

    El nombre de archivo del certificado SSL del emisor del proxy como [string](#language.types.string).
    Disponible a partir de PHP 8.1.0 y cURL 7.71.0.

**[CURLOPT_PROXY_ISSUERCERT_BLOB](#constant.curlopt-proxy-issuercert-blob)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el certificado SSL del emisor del proxy a partir del blob de memoria.
    Disponible a partir de PHP 8.1.0 y cURL 7.71.0.

**[CURLOPT_PROXY_KEYPASSWD](#constant.curlopt-proxy-keypasswd)**
([int](#language.types.integer))

    Establece el [string](#language.types.string) a usar como contraseña para cargar la clave privada
    **[CURLOPT_PROXY_SSLKEY](#constant.curlopt-proxy-sslkey)**.
    Una frase secreta no es necesaria para cargar un certificado,
    pero es requerida para cargar una clave privada.
    Esta opción es para conectarse a un proxy HTTPS, no a un servidor HTTPS.
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PROXY_PINNEDPUBLICKEY](#constant.curlopt-proxy-pinnedpublickey)**
([int](#language.types.integer))

    Establece la clave pública anclada para el proxy HTTPS.
    El [string](#language.types.string) puede ser el nombre de archivo de la clave pública anclada
    que debe estar en formato
    PEM
    o DER.
    El [string](#language.types.string) también puede ser cualquier número de hachados sha256 codificados en base64
    precedidos por sha256// y separados por ;.
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PROXY_SERVICE_NAME](#constant.curlopt-proxy-service-name)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el nombre del servicio de autenticación del proxy.
    Disponible a partir de PHP 7.0.7, cURL 7.43.0 (para proxys HTTP) y cURL 7.49.0 (para proxys SOCKS5).

**[CURLOPT_PROXY_SSLCERT](#constant.curlopt-proxy-sslcert)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el nombre de archivo del certificado cliente usado para conectarse al proxy HTTPS.
    El formato por defecto es P12 en Secure Transport y PEM en otros motores,
    y puede ser cambiado con **[CURLOPT_PROXY_SSLCERTTYPE](#constant.curlopt-proxy-sslcerttype)**.
    Con NSS o Secure Transport, esto también puede ser el sobrenombre del certificado
    usado para la autenticación tal como está nombrado en la base de datos de seguridad.
    Si un archivo del directorio actual debe ser usado,
    debe ser precedido por
    ./
    para evitar cualquier confusión con un sobrenombre.
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PROXY_SSLCERTTYPE](#constant.curlopt-proxy-sslcerttype)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el formato del certificado cliente usado al conectarse a un proxy HTTPS.
    Los formatos soportados son PEM y DER, excepto con Secure Transport.
    OpenSSL (versiones 0.9.3 y posteriores) y Secure Transport
    (en iOS 5 o posterior, o OS X 10.7 o posterior) también soportan P12 para
    archivos codificados en PKCS#12. Por defecto, es PEM.
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PROXY_SSLCERT_BLOB](#constant.curlopt-proxy-sslcert-blob)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el certificado cliente SSL del proxy.
    Disponible a partir de PHP 8.1.0 y cURL 7.71.0.

**[CURLOPT_PROXY_SSLKEY](#constant.curlopt-proxy-sslkey)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el nombre de archivo de la clave privada
    usada para conectarse al proxy HTTPS.
    El formato por defecto es PEM y puede ser modificado con
    **[CURLOPT_PROXY_SSLKEYTYPE](#constant.curlopt-proxy-sslkeytype)**.
    (iOS y Mac OS X solo) Esta opción es ignorada si cURL ha sido compilado
    con Secure Transport. Disponible si compilado con TLS.
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PROXY_SSLKEYTYPE](#constant.curlopt-proxy-sslkeytype)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el formato de la clave privada.
    Los formatos soportados son:

      PEM
     ,
      DER
     ,
      ENG

    .
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PROXY_SSLKEY_BLOB](#constant.curlopt-proxy-sslkey-blob)**
([int](#language.types.integer))

    Un [string](#language.types.string) con la clave privada usada para conectarse al proxy HTTPS.
    Disponible a partir de PHP 8.1.0 y cURL 7.71.0.

**[CURLOPT_PROXY_SSLVERSION](#constant.curlopt-proxy-sslversion)**
([int](#language.types.integer))

    Establece la versión TLS del proxy HTTPS preferida en una de las constantes
    **
    CURL_SSLVERSION_
     *
    **
    .
    Por defecto, esto corresponde a **[CURL_SSLVERSION_DEFAULT](#constant.curl-sslversion-default)**.

**Advertencia**

      Es preferible no establecer esta opción y dejar el valor por defecto
      **[CURL_SSLVERSION_DEFAULT](#constant.curl-sslversion-default)**
      que intentará determinar la versión del protocolo SSL remoto.




    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PROXY_SSL_CIPHER_LIST](#constant.curlopt-proxy-ssl-cipher-list)**
([int](#language.types.integer))

    Un [string](#language.types.string) con una lista de cifrados separados por dos puntos a usar para la conexión al proxy HTTPS.
    Cuando se usa con OpenSSL, comas y espacios también son aceptables como separadores,
    y !, - y + pueden ser usados como operadores.
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PROXY_SSL_OPTIONS](#constant.curlopt-proxy-ssl-options)**
([int](#language.types.integer))

    Establece las opciones de comportamiento SSL del proxy, que es un bitmask de las
    constantes
    **
    CURLSSLOPT_
     *
    **
    .
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PROXY_SSL_VERIFYHOST](#constant.curlopt-proxy-ssl-verifyhost)**
([int](#language.types.integer))

    Establecer en 2 para verificar en los campos de nombre del certificado del proxy
    contra el nombre del proxy. Cuando se establece en 0, la conexión tiene éxito
    independientemente de los nombres utilizados en el certificado. ¡Use esta capacidad con precaución!
    Establecer en 1 a partir de cURL 7.28.0 y versiones anteriores como opción de depuración.
    Establecer en 1 a partir de cURL 7.28.1 a 7.65.3 **[CURLE_BAD_FUNCTION_ARGUMENT](#constant.curle-bad-function-argument)** es
    devuelto.
    A partir de cURL 7.66.0, 1 y 2 se tratan como el mismo valor.
    Por defecto, el valor de esta opción debe mantenerse en 2.
    En entornos de producción, el valor de esta opción debe permanecer en 2.
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PROXY_SSL_VERIFYPEER](#constant.curlopt-proxy-ssl-verifypeer)**
([int](#language.types.integer))

    Establecer en **[false](#constant.false)** para detener cURL de verificar el certificado del proxy.
    Certificados alternativos a verificar pueden ser
    especificados con la opción
    **[CURLOPT_PROXY_CAINFO](#constant.curlopt-proxy-cainfo)**
    o un directorio de certificados puede ser especificado con la opción
    **[CURLOPT_PROXY_CAPATH](#constant.curlopt-proxy-capath)**.
    Cuando está definido en **[false](#constant.false)**, la verificación del certificado del proxy tiene éxito independientemente.
    **[true](#constant.true)** por defecto.
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0

**[CURLOPT_PROXY_TLS13_CIPHERS](#constant.curlopt-proxy-tls13-ciphers)**
([int](#language.types.integer))

    Una [string](#language.types.string) con una lista de cifrados separados por dos puntos para usar en la conexión al proxy a
    través de TLS 1.3.
    Esta opción se usa actualmente solo cuando cURL está construido para usar OpenSSL 1.1.1 o una versión posterior.
    Al usar otro backend SSL, las suites de cifrado TLS 1.3 pueden ser definidas
    con la opción **[CURLOPT_PROXY_SSL_CIPHER_LIST](#constant.curlopt-proxy-ssl-cipher-list)**.
    Disponible a partir de PHP 7.3.0 y cURL 7.61.0.

**[CURLOPT_PROXY_TLSAUTH_PASSWORD](#constant.curlopt-proxy-tlsauth-password)**
([int](#language.types.integer))

    Una [string](#language.types.string) que contiene la contraseña a usar para el método de autenticación TLS especificado con el
    **[CURLOPT_PROXY_TLSAUTH_TYPE](#constant.curlopt-proxy-tlsauth-type)**. Requiere también que la opción
    **[CURLOPT_PROXY_TLSAUTH_USERNAME](#constant.curlopt-proxy-tlsauth-username)**
    esté definida.
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PROXY_TLSAUTH_TYPE](#constant.curlopt-proxy-tlsauth-type)**
([int](#language.types.integer))

    El método de autenticación TLS usado para la conexión HTTPS.
    El método soportado es SRP.

**Nota**:

      La autenticación Secure Remote Password (SRP) para TLS proporciona autenticación mutua
      si ambas partes tienen un secreto compartido. Para usar TLS-SRP, las opciones
      **[CURLOPT_PROXY_TLSAUTH_USERNAME](#constant.curlopt-proxy-tlsauth-username)**
      y
      **[CURLOPT_PROXY_TLSAUTH_PASSWORD](#constant.curlopt-proxy-tlsauth-password)**
      también deben estar definidas.




    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PROXY_TLSAUTH_USERNAME](#constant.curlopt-proxy-tlsauth-username)**
([int](#language.types.integer))

    El nombre de usuario a usar para el método de autenticación TLS del proxy HTTPS especificado con la opción
    **[CURLOPT_PROXY_TLSAUTH_TYPE](#constant.curlopt-proxy-tlsauth-type)**. Requiere también que la opción
    **[CURLOPT_PROXY_TLSAUTH_PASSWORD](#constant.curlopt-proxy-tlsauth-password)**
    esté definida.
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0.

**[CURLOPT_PROXY_TRANSFER_MODE](#constant.curlopt-proxy-transfer-mode)**
([int](#language.types.integer))

    Establecer en 1 para definir el modo de transferencia (binario o ASCII)
    para las transferencias FTP realizadas a través de un proxy HTTP, añadiendo
    type=a
    o type=i a la URL.
    Sin este parámetro o si está definido en 0,
    **[CURLOPT_TRANSFERTEXT](#constant.curlopt-transfertext)**
    no tiene ningún efecto
    al usar FTP a través de un proxy.
    Por defecto en 0.
    Disponible a partir de cURL 7.18.0.

**[CURLOPT_PUT](#constant.curlopt-put)**
([int](#language.types.integer))

    **[true](#constant.true)** para realizar una solicitud HTTP PUT de un archivo. El archivo a subir
    debe ser definido con **[CURLOPT_READDATA](#constant.curlopt-readdata)** y
    **[CURLOPT_INFILESIZE](#constant.curlopt-infilesize)**.
    Disponible a partir de cURL 7.1.0 y obsoleto a partir de cURL 7.12.1.

**[CURLOPT_QUICK_EXIT](#constant.curlopt-quick-exit)**
([int](#language.types.integer))

    Establecer en **[true](#constant.true)** para que cURL ignore la limpieza de recursos al recuperar un tiempo límite.
    Esto permite una terminación rápida del proceso cURL a costa de una posible fuga de recursos asociados.
    Disponible a partir de PHP 8.3.0 y cURL 7.87.0.

**[CURLOPT_QUOTE](#constant.curlopt-quote)**
([int](#language.types.integer))

    Un [array](#language.types.array) de comandos FTP para ejecutar en el servidor antes de la
    solicitud FTP.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_RANDOM_FILE](#constant.curlopt-random-file)**
([int](#language.types.integer))

    Una [string](#language.types.string) con un nombre de archivo para usar para inicializar el generador de números aleatorios para
    SSL.
    Disponible a partir de cURL 7.7.0 y obsoleto a partir de cURL 7.84.0.

**[CURLOPT_RANGE](#constant.curlopt-range)**
([int](#language.types.integer))

    Una [string](#language.types.string) con el/los rango(s) de datos a recuperar en formato X-Y, donde X o Y son
    opcionales. Las transferencias HTTP
    también soportan múltiples intervalos, separados por comas en formato
    X-Y,N-M.
    Establecer en **[null](#constant.null)** para desactivar la solicitud de un rango de bytes.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_READDATA](#constant.curlopt-readdata)**
([int](#language.types.integer))

    Define un puntero de archivo [resource](#language.types.resource) que será usado por la función de lectura de archivo
    definida con **[CURLOPT_READFUNCTION](#constant.curlopt-readfunction)**.
    Disponible a partir de cURL 7.9.7.

**[CURLOPT_READFUNCTION](#constant.curlopt-readfunction)**
([int](#language.types.integer))

    Un [callable](#language.types.callable) con la siguiente firma:




      callback
     (

      [resource](#language.types.resource) $curlHandle
     ,

      [resource](#language.types.resource) $streamResource
     ,

      [int](#language.types.integer) $maxAmountOfDataToRead
     ): [string](#language.types.string)




       curlHandle



        El manejador cURL.





       streamResource



        Recurso de flujo [resource](#language.types.resource) proporcionado a cURL a través de la opción
        **[CURLOPT_READDATA](#constant.curlopt-readdata)**.





       maxAmountOfDataToRead



        La cantidad máxima de datos a leer.




    La devolución de llamada debe devolver una
    [string](#language.types.string)
    de una longitud igual o inferior a la cantidad de datos solicitados,
    típicamente leyéndola desde el stream de flujo pasado. Debe
    devolver una [string](#language.types.string) vacía para indicar fin de archivo.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_REDIR_PROTOCOLS](#constant.curlopt-redir-protocols)**
([int](#language.types.integer))

    Una máscara de bits de valores
    **
    CURLPROTO_
     *
    **
    que
    limita los protocolos que cURL puede usar en una transferencia que sigue en una
    redirección cuando **[CURLOPT_FOLLOWLOCATION](#constant.curlopt-followlocation)** está activado.
    Esto permite limitar ciertas transferencias para que solo usen un subconjunto de protocolos durante las
    redirecciones.
    A partir de cURL 7.19.4, por defecto, cURL permitirá todos los protocolos, excepto FILE
    y SCP.
    Antes de cURL 7.19.4, cURL seguía sin condición todos los protocolos soportados.
    Ver también **[CURLOPT_PROTOCOLS](#constant.curlopt-protocols)** para los valores constantes de protocolo.
    Disponible a partir de cURL 7.19.4 y obsoleto a partir de cURL 7.85.0.

**[CURLOPT_REDIR_PROTOCOLS_STR](#constant.curlopt-redir-protocols-str)**
([int](#language.types.integer))

    Establecer en una [string](#language.types.string) con una lista separada por comas
    de nombres de protocolos insensibles a mayúsculas/minúsculas (esquemas de URL)
    para permitir durante una redirección cuando
    **[CURLOPT_FOLLOWLOCATION](#constant.curlopt-followlocation)**
    está activado.
    Establecer en ALL para activar todos los protocolos.
    A partir de cURL 7.65.2, esto por defecto es FTP,
    FTPS, HTTP y HTTPS.
    De cURL 7.40.0 a 7.65.1, esto por defecto es todos los protocolos excepto
    FILE, SCP, SMB y
    SMBS.
    Antes de cURL 7.40.0, esto por defecto es todos los protocolos excepto
    FILE
    y SCP.
    Los protocolos disponibles son:

      DICT
     ,
      FILE
     ,
      FTP
     ,
      FTPS
     ,
      GOPHER
     ,
      GOPHERS
     ,
      HTTP
     ,
      HTTPS
     ,
      IMAP
     ,
      IMAPS
     ,
      LDAP
     ,
      LDAPS
     ,
      MQTT
     ,
      POP3
     ,
      POP3S
     ,
      RTMP
     ,
      RTMPE
     ,
      RTMPS
     ,
      RTMPT
     ,
      RTMPTE
     ,
      RTMPTS
     ,
      RTSP
     ,
      SCP
     ,
      SFTP
     ,
      SMB
     ,
      SMBS
     ,
      SMTP
     ,
      SMTPS
     ,
      TELNET
     ,
      TFTP
     ,
      WS
     ,
      WSS

    .
    Disponible a partir de PHP 8.3.0 y cURL 7.85.0.

**[CURLOPT_REFERER](#constant.curlopt-referer)**
([int](#language.types.integer))

    Una [string](#language.types.string) que contiene el contenido del encabezado
    Referer:
    para usar en una solicitud HTTP.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_REQUEST_TARGET](#constant.curlopt-request-target)**
([int](#language.types.integer))

    Una [string](#language.types.string) para usar en la solicitud entrante
    en lugar de la ruta extraída de la URL.
    Disponible a partir de PHP 7.3.0 y cURL 7.55.0.

**[CURLOPT_RESOLVE](#constant.curlopt-resolve)**
([int](#language.types.integer))

    Proporcionar un [array](#language.types.array) de [string](#language.types.string)s separados por dos puntos
    con direcciones personalizadas para pares de host y puerto específicos en el siguiente formato:

     array(
     "example.com:80:127.0.0.1",
     "example2.com:443:127.0.0.2",
     )

    Disponible a partir de cURL 7.21.3.

**[CURLOPT_RESUME_FROM](#constant.curlopt-resume-from)**
([int](#language.types.integer))

    El desplazamiento, en bytes, para reanudar una transferencia.
    Esta opción acepta cualquier valor que pueda convertirse en un [int](#language.types.integer) válido.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_RETURNTRANSFER](#constant.curlopt-returntransfer)**
([int](#language.types.integer))

    **[true](#constant.true)** para devolver la respuesta como [string](#language.types.string) de la función
    [curl_exec()](#function.curl-exec)
    en lugar de mostrarla directamente.

**[CURLOPT_RTSP_CLIENT_CSEQ](#constant.curlopt-rtsp-client-cseq)**
([int](#language.types.integer))

    Define un [int](#language.types.integer) con el número CSEQ para emitir en la próxima solicitud RTSP.
    Usar si la aplicación reanuda una conexión previamente interrumpida.
    El CSEQ se incrementa a partir de este nuevo número posteriormente.
    Por defecto en 0.
    Disponible a partir de cURL 7.20.0.

**[CURLOPT_RTSP_REQUEST](#constant.curlopt-rtsp-request)**
([int](#language.types.integer))

    Define el tipo de solicitud RTSP a realizar.
    Debe ser una de las constantes
    **
    CURL_RTSPREQ_
     *
    **
    .
    Disponible a partir de cURL 7.20.0.

**[CURLOPT_RTSP_SERVER_CSEQ](#constant.curlopt-rtsp-server-cseq)**
([int](#language.types.integer))

    Define un [int](#language.types.integer) con el número CSEQ para esperar
    en la próxima solicitud RTSP del servidor.
    Esta funcionalidad (escuchar solicitudes del servidor) no está implementada.
    Por defecto en 0.
    Disponible a partir de cURL 7.20.0.

**[CURLOPT_RTSP_SESSION_ID](#constant.curlopt-rtsp-session-id)**
([int](#language.types.integer))

    Define un [string](#language.types.string) con el valor del identificador de la sesión RTSP actual para el manejador.
    Una vez que este valor se establece en un valor no-**[null](#constant.null)**,
    cURL devuelve
    **[CURLE_RTSP_SESSION_ERROR](#constant.curle-rtsp-session-error)**
    si el identificador recibido del servidor no coincide.
    Si se establece en **[null](#constant.null)**, cURL define automáticamente el identificador
    la primera vez que el servidor lo define en una respuesta.
    Por defecto en **[null](#constant.null)**
    Disponible a partir de cURL 7.20.0.

**[CURLOPT_RTSP_STREAM_URI](#constant.curlopt-rtsp-stream-uri)**
([int](#language.types.integer))

    Define un [string](#language.types.string) con el URI del flujo sobre el que operar.
    Si no está definido, cURL define por defecto la operación en las opciones de servidor genéricas
    pasando * en lugar del URI del flujo RTSP.
    Al trabajar con RTSP,
    CURLOPT_RTSP_STREAM_URI
    indica qué URL enviar al servidor en el encabezado de solicitud
    mientras que CURLOPT_URL indica
    dónde establecer la conexión.
    Disponible a partir de cURL 7.20.0.

**[CURLOPT_RTSP_TRANSPORT](#constant.curlopt-rtsp-transport)**
([int](#language.types.integer))

    Define el encabezado Transport: para esta sesión RTSP.
    Disponible a partir de cURL 7.20.0.

**[CURLOPT_SAFE_UPLOAD](#constant.curlopt-safe-upload)**
([int](#language.types.integer))

    Siempre **[true](#constant.true)**, lo que desactiva el soporte del prefijo
    "@"
    para enviar archivos en **[CURLOPT_POSTFIELDS](#constant.curlopt-postfields)**, lo que
    significa que los valores que comienzan con "@" pueden ser
    pasados de forma segura como campos. [CURLFile](#class.curlfile) puede ser
    usado para las subidas a la vez.

**[CURLOPT_SASL_AUTHZID](#constant.curlopt-sasl-authzid)**
([int](#language.types.integer))

    La identidad de autorización (authzid) [string](#language.types.string) para la transferencia. Aplicable solo a SASL PLAIN
    donde es opcional. Cuando no se especifica, solo la identidad de autenticación
    (authcid) tal como se especifica por el nombre de usuario será enviada al servidor, con la contraseña.
    El servidor deducirá el authzid del authcid cuando no se proporcione, que luego usará internamente.
    Disponible a partir de PHP 8.2.0 y cURL 7.66.0.

**[CURLOPT_SASL_IR](#constant.curlopt-sasl-ir)**
([int](#language.types.integer))

    **[true](#constant.true)** para habilitar la inicialización de la respuesta SASL (SASL Initial Response).
    Disponible a partir de PHP 7.0.7 y cURL 7.31.0.

**[CURLOPT_SERVICE_NAME](#constant.curlopt-service-name)**
([int](#language.types.integer))

    Un [string](#language.types.string) con el nombre del servicio de autenticación.
    Disponible a partir de PHP 7.0.7 y cURL 7.43.0.

**[CURLOPT_SHARE](#constant.curlopt-share)**
([int](#language.types.integer))

    Un resultado de [curl_share_init()](#function.curl-share-init). Hace que el manejador cURL
    use los datos del manejador compartido.
    Disponible a partir de cURL 7.10.

**[CURLOPT_SOCKS5_AUTH](#constant.curlopt-socks5-auth)**
([int](#language.types.integer))

      **[CURLAUTH_BASIC](#constant.curlauth-basic)**
     ,
      **[CURLAUTH_GSSAPI](#constant.curlauth-gssapi)**
     ,
      **[CURLAUTH_NONE](#constant.curlauth-none)**

    .
    Cuando más de un método está definido, cURL consultará al servidor para ver
    qué métodos soporta y elegirá el mejor.
    Por defecto, CURLAUTH_BASIC|CURLAUTH_GSSAPI.
    Definir el nombre de usuario y la contraseña reales con la opción **[CURLOPT_PROXYUSERPWD](#constant.curlopt-proxyuserpwd)**.
    Disponible a partir de PHP 7.3.0 y cURL 7.55.0.

**[CURLOPT_SOCKS5_GSSAPI_NEC](#constant.curlopt-socks5-gssapi-nec)**
([int](#language.types.integer))

    Establecer en 1 para habilitar y en 0 para deshabilitar
    el intercambio no protegido de la negociación del modo de protección
    en el contexto de la negociación GSSAPI.
    Disponible a partir de cURL 7.19.4.

**[CURLOPT_SOCKS5_GSSAPI_SERVICE](#constant.curlopt-socks5-gssapi-service)**
([int](#language.types.integer))

    Define un [string](#language.types.string) que contiene el nombre del servicio SOCKSS.
    Por defecto en rcmd.
    Disponible a partir de cURL 7.19.4 y obsoleto a partir de cURL 7.49.0.
    Usar **[CURLOPT_PROXY_SERVICE_NAME](#constant.curlopt-proxy-service-name)** en su lugar.

**[CURLOPT_SSH_AUTH_TYPES](#constant.curlopt-ssh-auth-types)**
([int](#language.types.integer))

    Una máscara de bits compuesta por una o más de las siguientes constantes:

      **[CURLSSH_AUTH_PUBLICKEY](#constant.curlssh-auth-publickey)**
     ,
      **[CURLSSH_AUTH_PASSWORD](#constant.curlssh-auth-password)**
     ,
      **[CURLSSH_AUTH_HOST](#constant.curlssh-auth-host)**
     ,
      **[CURLSSH_AUTH_KEYBOARD](#constant.curlssh-auth-keyboard)**
     ,
      **[CURLSSH_AUTH_AGENT](#constant.curlssh-auth-agent)**
     ,
      **[CURLSSH_AUTH_ANY](#constant.curlssh-auth-any)**

    .
    Por defecto, esto corresponde a **[CURLSSH_AUTH_ANY](#constant.curlssh-auth-any)**.
    Disponible a partir de cURL 7.16.1.

**[CURLOPT_SSH_COMPRESSION](#constant.curlopt-ssh-compression)**
([int](#language.types.integer))

    **[true](#constant.true)** para habilitar, **[false](#constant.false)** para deshabilitar la compresión SSH integrada.
    Tenga en cuenta que el servidor puede ignorar esta solicitud.
    Por defecto, esto corresponde a **[false](#constant.false)**.
    Disponible a partir de PHP 7.3.0 y cURL 7.56.0.

**[CURLOPT_SSH_HOSTKEYFUNCTION](#constant.curlopt-ssh-hostkeyfunction)**
([int](#language.types.integer))

    Un [callable](#language.types.callable) que será llamado cuando la verificación de la clave del host SSH sea necesaria.
    La devolución de llamada debe tener la siguiente firma:




      callback
     (

    

      [resource](#language.types.resource) $curlHandle
     ,

    

      [int](#language.types.integer) $keyType
     ,

    

      [string](#language.types.string) $key
     ,

    

      [int](#language.types.integer) $keyLength


): [int](#language.types.integer)

       curlHandle



        El manejador cURL.





       keyType



        Uno de los tipos de clave
        **
        CURLKHTYPE_
         *
        **
        .





       key



        La clave a verificar.





       keyLength



        La longitud de la clave en bytes.




    Esta opción reemplaza **[CURLOPT_SSH_KNOWNHOSTS](#constant.curlopt-ssh-knownhosts)**.
    Disponible a partir de PHP 8.3.0 y cURL 7.84.0.

**[CURLOPT_SSH_HOST_PUBLIC_KEY_MD5](#constant.curlopt-ssh-host-public-key-md5)**
([int](#language.types.integer))

    Una [string](#language.types.string) que contiene 32 dígitos hexadecimales que deben contener el
    checksum MD5 de la clave pública del host remoto, y cURL rechazará
    la conexión al host a menos que las sumas de control md5 coincidan.
    Esta opción es únicamente para transferencias SCP y SFTP.
    Disponible a partir de cURL 7.17.1.

**[CURLOPT_SSH_HOST_PUBLIC_KEY_SHA256](#constant.curlopt-ssh-host-public-key-sha256)**
([int](#language.types.integer))

    Una [string](#language.types.string) con el hash SHA256 codificado en base64
    de la clave pública del host remoto.
    La transferencia fallará si el hash proporcionado no coincide con el hash proporcionado por el host remoto.
    Disponible a partir de PHP 8.2.0 y cURL 7.80.0.

**[CURLOPT_SSH_KNOWNHOSTS](#constant.curlopt-ssh-knownhosts)**
([int](#language.types.integer))

    Define el nombre del archivo known_host a utilizar
    que debería usar el formato de archivo OpenSSH soportado por libssh2.
    Disponible a partir de cURL 7.19.6.

**[CURLOPT_SSH_PRIVATE_KEYFILE](#constant.curlopt-ssh-private-keyfile)**
([int](#language.types.integer))

    El nombre del archivo de su clave privada. Si no se usa, cURL usa por omisión
    $HOME/.ssh/id_dsa
    si la variable de entorno HOME está definida,
    y solo id_dsa en el directorio actual si HOME no está definido.
    Si el archivo está protegido por contraseña, defina la contraseña con
    **[CURLOPT_KEYPASSWD](#constant.curlopt-keypasswd)**.
    Disponible a partir de cURL 7.16.1.

**[CURLOPT_SSH_PUBLIC_KEYFILE](#constant.curlopt-ssh-public-keyfile)**
([int](#language.types.integer))

    El nombre del archivo de su clave pública. Si no se usa, cURL usa por omisión
    $HOME/.ssh/id_dsa.pub
    si la variable de entorno HOME está definida,
    y solo id_dsa.pub en el directorio actual si HOME no está definido.
    Disponible a partir de cURL 7.16.1.

**[CURLOPT_SSLCERT](#constant.curlopt-sslcert)**
([int](#language.types.integer))

    El nombre de un archivo que contiene un certificado en formato PEM.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_SSLCERTPASSWD](#constant.curlopt-sslcertpasswd)**
([int](#language.types.integer))

    La contraseña requerida para usar el certificado
    **[CURLOPT_SSLCERT](#constant.curlopt-sslcert)**.
    Disponible a partir de cURL 7.1.0 y desaconsejado a partir de cURL 7.17.0.

**[CURLOPT_SSLCERTTYPE](#constant.curlopt-sslcerttype)**
([int](#language.types.integer))

    Una [string](#language.types.string) con el formato del certificado. Los formatos soportados son :

      PEM
     ,
      DER
     ,
      ENG
     ,
      P12

    .
    P12
    (para archivos codificados en PKCS#12) está disponible a partir de OpenSSL 0.9.3.
    Por omisión, es PEM.
    Disponible a partir de cURL 7.9.3.

**[CURLOPT_SSLCERT_BLOB](#constant.curlopt-sslcert-blob)**
([int](#language.types.integer))

    Una [string](#language.types.string) con el certificado SSL del cliente.
    Disponible a partir de PHP 8.1.0 y cURL 7.71.0.

**[CURLOPT_SSLENGINE](#constant.curlopt-sslengine)**
([int](#language.types.integer))

    El identificador [string](#language.types.string) para el motor criptográfico de la clave SSL privada
    especificada en **[CURLOPT_SSLKEY](#constant.curlopt-sslkey)**.
    Disponible a partir de cURL 7.9.3.

**[CURLOPT_SSLENGINE_DEFAULT](#constant.curlopt-sslengine-default)**
([int](#language.types.integer))

    El identificador del motor de criptografía usado para las operaciones de
    criptografía asimétrica.

**[CURLOPT_SSLKEY](#constant.curlopt-sslkey)**
([int](#language.types.integer))

    El nombre de un archivo que contiene una clave privada SSL.
    Disponible a partir de cURL 7.9.3.

**[CURLOPT_SSLKEYPASSWD](#constant.curlopt-sslkeypasswd)**
([int](#language.types.integer))

    La contraseña requerida para usar la clave privada SSL
    especificada en **[CURLOPT_SSLKEY](#constant.curlopt-sslkey)**.

**Nota**:

      Dado que esta opción contiene una contraseña sensible, no olvide mantener
      el script PHP en el que está contenido seguro.




    Disponible a partir de cURL 7.9.3 y desaconsejado a partir de cURL 7.17.0.

**[CURLOPT_SSLKEYTYPE](#constant.curlopt-sslkeytype)**
([int](#language.types.integer))

    El tipo de clave privada SSL especificada en
    **[CURLOPT_SSLKEY](#constant.curlopt-sslkey)**. Los tipos de clave soportados son :

      PEM
     ,
      DER
     ,
      ENG

    .
    Por omisión, es PEM.
    Disponible a partir de cURL 7.9.3.

**[CURLOPT_SSLKEY_BLOB](#constant.curlopt-sslkey-blob)**
([int](#language.types.integer))

    Una [string](#language.types.string) clave privada para el certificado del cliente.
    Disponible a partir de PHP 8.1.0 y cURL 7.71.0.

**[CURLOPT_SSLVERSION](#constant.curlopt-sslversion)**
([int](#language.types.integer))

    Una de
    las constantes siguientes
    **
    CURL_SSLVERSION_
     *
    **
    .

**Advertencia**

      Es preferible no definir esta opción y dejar los valores por omisión.
      Definir esta opción a
      **[CURL_SSLVERSION_SSLv2](#constant.curl-sslversion-sslv2)**
      o
      **[CURL_SSLVERSION_SSLv3](#constant.curl-sslversion-sslv3)**
      es muy peligroso, dado las
      vulnerabilidades conocidas en SSLv2 y SSLv3.




    Por omisión, es **[CURL_SSLVERSION_DEFAULT](#constant.curl-sslversion-default)**.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_SSL_CIPHER_LIST](#constant.curlopt-ssl-cipher-list)**
([int](#language.types.integer))

    Una [string](#language.types.string) separada por dos puntos de los cifrados a usar
    para la conexión TLS 1.2 (1.1, 1.0).
    Disponible a partir de cURL 7.9.

**[CURLOPT_SSL_EC_CURVES](#constant.curlopt-ssl-ec-curves)**
([int](#language.types.integer))

    Una lista de curvas elípticas delimitadas por dos puntos. Por ejemplo,
    X25519:P-521
    es una lista de dos curvas elípticas válidas.
    Esta opción define los algoritmos de intercambio de claves del cliente en el apretón de mano SSL,
    si el backend SSL de cURL está compilado para usarlo.
    Disponible a partir de PHP 8.2.0 y cURL 7.73.0.

**[CURLOPT_SSL_ENABLE_ALPN](#constant.curlopt-ssl-enable-alpn)**
([int](#language.types.integer))

    **[false](#constant.false)** para deshabilitar ALPN en el apretón de mano SSL (si el backend SSL
    de cURL está compilado para usarlo), lo cual puede ser usado para
    negociar http2.
    Disponible a partir de PHP 7.0.7 y cURL 7.36.0.

**[CURLOPT_SSL_ENABLE_NPN](#constant.curlopt-ssl-enable-npn)**
([int](#language.types.integer))

    **[false](#constant.false)** para deshabilitar NPN en el apretón de mano SSL (si el backend SSL
    de cURL está compilado para usarlo), lo cual puede ser usado para
    negociar http2.
    Disponible a partir de PHP 7.0.7 y cURL 7.36.0, y obsoleto a partir de cURL 7.86.

**[CURLOPT_SSL_FALSESTART](#constant.curlopt-ssl-falsestart)**
([int](#language.types.integer))

    **[true](#constant.true)** para habilitar y **[false](#constant.false)** para deshabilitar el inicio anticipado de TLS,
    que es un modo donde un cliente TLS comienza a enviar datos de aplicación
    antes de verificar el mensaje Finished del servidor.
    Disponible a partir de PHP 7.0.7 y cURL 7.42.0.

**[CURLOPT_SSL_OPTIONS](#constant.curlopt-ssl-options)**
([int](#language.types.integer))

    Definir las opciones de comportamiento SSL, que son una máscara de bits de las
    constantes
    **
    CURLSSLOPT_
     *
    **
    .
    Por omisión, ninguno de los bits está definido.
    Disponible a partir de PHP 7.0.7 y cURL 7.25.0.

**[CURLOPT_SSL_SESSIONID_CACHE](#constant.curlopt-ssl-sessionid-cache)**
([int](#language.types.integer))

    Definir a 0 para deshabilitar y a 1 para habilitar
    el caché de sesión SSL.
    Por omisión, todas las transferencias se realizan usando el caché habilitado.
    Disponible a partir de cURL 7.16.0.

**[CURLOPT_SSL_VERIFYHOST](#constant.curlopt-ssl-verifyhost)**
([int](#language.types.integer))

    2
    para verificar que un campo de nombre común o un campo de nombre alternativo
    en el certificado SSL del par coincide con el nombre de host proporcionado.
    0
    para no verificar los nombres.
    1
    no debe ser usado.
    En producción, el valor de esta opción
    debe mantenerse en 2 (valor por omisión). El soporte para el valor 1 fue
    eliminado a partir de cURL 7.28.1.
    Disponible a partir de cURL 7.8.1.

**[CURLOPT_SSL_VERIFYPEER](#constant.curlopt-ssl-verifypeer)**
([int](#language.types.integer))

    **[false](#constant.false)** para evitar que cURL verifique el certificado del
    par. Certificados alternativos a verificar pueden ser
    especificados con la opción
    **[CURLOPT_CAINFO](#constant.curlopt-cainfo)**
    o un directorio de certificados puede ser especificado con
    la opción **[CURLOPT_CAPATH](#constant.curlopt-capath)**.
    Por omisión, es **[true](#constant.true)** a partir de cURL 7.10.
    Paquete por omisión de certificados CA instalado a partir de cURL 7.10.
    Disponible a partir de cURL 7.4.2.

**[CURLOPT_SSL_VERIFYSTATUS](#constant.curlopt-ssl-verifystatus)**
([int](#language.types.integer))

    **[true](#constant.true)** para habilitar y **[false](#constant.false)** para deshabilitar la verificación del estado del certificado.
    Disponible a partir de PHP 7.0.7 y cURL 7.41.0.

**[CURLOPT_STDERR](#constant.curlopt-stderr)**
([int](#language.types.integer))

    Acepta un descriptor de archivo [resource](#language.types.resource) que apunta hacia
    una ubicación alternativa para enviar errores en lugar de
    **[STDERR](#constant.stderr)**.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_STREAM_WEIGHT](#constant.curlopt-stream-weight)**
([int](#language.types.integer))

    Definir el peso numérico del flujo (un número entre 1 y 256).
    Disponible a partir de PHP 7.0.7 y cURL 7.46.0.

**[CURLOPT_SUPPRESS_CONNECT_HEADERS](#constant.curlopt-suppress-connect-headers)**
([int](#language.types.integer))

    **[true](#constant.true)** para suprimir los encabezados de respuesta proxy CONNECT de las funciones de devolución de llamada de usuario
    **[CURLOPT_HEADERFUNCTION](#constant.curlopt-headerfunction)**
    y **[CURLOPT_WRITEFUNCTION](#constant.curlopt-writefunction)**,
    cuando **[CURLOPT_HTTPPROXYTUNNEL](#constant.curlopt-httpproxytunnel)** es usado y una petición CONNECT es realizada.
    Por omisión, es **[false](#constant.false)**.
    Disponible a partir de PHP 7.3.0 y cURL 7.54.0.

**[CURLOPT_TCP_FASTOPEN](#constant.curlopt-tcp-fastopen)**
([int](#language.types.integer))

    **[true](#constant.true)** para habilitar y **[false](#constant.false)** para deshabilitar TCP Fast Open.
    Disponible a partir de PHP 7.0.7 y cURL 7.49.0.

**[CURLOPT_TCP_KEEPALIVE](#constant.curlopt-tcp-keepalive)**
([int](#language.types.integer))

    Si se define a 1, se enviarán sondas de mantenimiento de conexión TCP. El intervalo y
    la frecuencia de estas sondas pueden ser controladas por las opciones
    **[CURLOPT_TCP_KEEPIDLE](#constant.curlopt-tcp-keepidle)**
    y **[CURLOPT_TCP_KEEPINTVL](#constant.curlopt-tcp-keepintvl)**, siempre que el sistema operativo
    las soporte. Si se define a 0 (por omisión), las sondas de mantenimiento de conexión están
    deshabilitadas.
    El número máximo de sondas puede ser definido con la opción **[CURLOPT_TCP_KEEPCNT](#constant.curlopt-tcp-keepcnt)**.
    Disponible a partir de cURL 7.25.0.

**[CURLOPT_TCP_KEEPIDLE](#constant.curlopt-tcp-keepidle)**
([int](#language.types.integer))

    Define el intervalo, en segundos, que el sistema operativo esperará mientras la conexión está
    inutilizada antes de enviar sondas de mantenimiento de conexión, si **[CURLOPT_TCP_KEEPALIVE](#constant.curlopt-tcp-keepalive)** está
    habilitado. No todos los sistemas operativos soportan esta opción.
    El valor por omisión es 60.
    Disponible a partir de cURL 7.25.0.

**[CURLOPT_TCP_KEEPINTVL](#constant.curlopt-tcp-keepintvl)**
([int](#language.types.integer))

    Define el intervalo, en segundos, que el sistema operativo esperará entre el envío
    de sondas de mantenimiento de conexión, si **[CURLOPT_TCP_KEEPALIVE](#constant.curlopt-tcp-keepalive)** está habilitado.
    No todos los sistemas operativos soportan esta opción.
    El valor por omisión es 60.
    Disponible a partir de cURL 7.25.0.

**[CURLOPT_TCP_KEEPCNT](#constant.curlopt-tcp-keepcnt)**
([int](#language.types.integer))

    Define el número máximo de sondas de mantenimiento de conexión TCP.
    El valor por omisión es 9.
    Disponible a partir de PHP 8.4.0 y cURL 8.9.0.

**[CURLOPT_TCP_NODELAY](#constant.curlopt-tcp-nodelay)**
([int](#language.types.integer))

    **[true](#constant.true)** para deshabilitar el algoritmo de Nagle TCP, que intenta minimizar
    el número de pequeños paquetes en la red.
    Por omisión, es **[true](#constant.true)**.
    Disponible a partir de cURL 7.11.2.

**[CURLOPT_TELNETOPTIONS](#constant.curlopt-telnetoptions)**
([int](#language.types.integer))

    Define un [array](#language.types.array) de [string](#language.types.string)s a pasar a las negociaciones telnet.
    Estas variables deben estar en el formato &lt;option=valor&gt;.
    cURL soporta las opciones TTYPE,
    XDISPLOC
    y NEW_ENV.
    Disponible a partir de cURL 7.7.0.

**[CURLOPT_TFTP_BLKSIZE](#constant.curlopt-tftp-blksize)**
([int](#language.types.integer))

    Define el tamaño de bloque a usar para la transmisión de datos TFTP.
    El rango válido es de 8 a 65464 bytes.
    Por omisión, se usan 512 bytes si esta opción no está especificada.
    El tamaño de bloque especificado solo se usa si es soportado por el servidor remoto.
    SI el servidor no devuelve un ACK de opción
    o devuelve un ACK de opción sin tamaño de bloque,
    se usa el valor por omisión de 512 bytes.
    Disponible a partir de cURL 7.19.4.

**[CURLOPT_TFTP_NO_OPTIONS](#constant.curlopt-tftp-no-options)**
([int](#language.types.integer))

    **[true](#constant.true)** para no enviar solicitudes de opciones TFTP.
    Por omisión, es **[false](#constant.false)**.
    Disponible a partir de PHP 7.0.7 y cURL 7.48.0.

**[CURLOPT_TIMECONDITION](#constant.curlopt-timecondition)**
([int](#language.types.integer))

    Definir cómo **[CURLOPT_TIMEVALUE](#constant.curlopt-timevalue)** es tratado.
    Usar **[CURL_TIMECOND_IFMODSINCE](#constant.curl-timecond-ifmodsince)** para devolver la
    página solo si ha sido modificada desde el tiempo especificado en
    **[CURLOPT_TIMEVALUE](#constant.curlopt-timevalue)**. Si no ha sido modificada,
    un encabezado 304 Not Modified será devuelto
    asumiendo que **[CURLOPT_HEADER](#constant.curlopt-header)** es **[true](#constant.true)**.
    Usar **[CURL_TIMECOND_IFUNMODSINCE](#constant.curl-timecond-ifunmodsince)** para el efecto inverso.
    Usar **[CURL_TIMECOND_NONE](#constant.curl-timecond-none)** para ignorar
    **[CURLOPT_TIMEVALUE](#constant.curlopt-timevalue)**
    y siempre devolver la página.
    **[CURL_TIMECOND_NONE](#constant.curl-timecond-none)**
    es el valor por omisión.
    Antes de cURL 7.46.0, el valor por omisión era
    **[CURL_TIMECOND_IFMODSINCE](#constant.curl-timecond-ifmodsince)**.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_TIMEOUT](#constant.curlopt-timeout)**
([int](#language.types.integer))

    El número máximo de segundos a esperar para las funciones cURL.
    Por omisión, es 0, lo que significa que las funciones nunca exceden el tiempo de espera durante
    la transferencia.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_TIMEOUT_MS](#constant.curlopt-timeout-ms)**
([int](#language.types.integer))

    El número máximo de milisegundos a esperar para las funciones cURL
    se ejecutan.
    Si cURL está compilado para usar el resolutor de nombres estándar del sistema,
    esta parte de la conexión siempre usará una resolución de segundo completo
    para los tiempos de espera con un mínimo permitido de un segundo.
    Por omisión, es 0, lo que significa que las funciones nunca exceden el tiempo de espera durante
    la transferencia.
    Disponible a partir de cURL 7.16.2.

**[CURLOPT_TIMEVALUE](#constant.curlopt-timevalue)**
([int](#language.types.integer))

    El tiempo en segundos desde el 1 de enero de 1970. El tiempo será usado
    por **[CURLOPT_TIMECONDITION](#constant.curlopt-timecondition)**.
    Por omisión, es 0.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_TIMEVALUE_LARGE](#constant.curlopt-timevalue-large)**
([int](#language.types.integer))

    El tiempo en segundos desde el 1 de enero de 1970. El tiempo será usado
    por **[CURLOPT_TIMECONDITION](#constant.curlopt-timecondition)**. Por omisión, cero.
    La diferencia entre esta opción y
    **[CURLOPT_TIMEVALUE](#constant.curlopt-timevalue)**
    es el tipo del argumento. En sistemas donde 'long' solo tiene 32 bits de ancho,
    esta opción debe ser usada para definir fechas más allá del año 2038.
    Disponible a partir de PHP 7.3.0 y cURL 7.59.0

**[CURLOPT_TLS13_CIPHERS](#constant.curlopt-tls13-ciphers)**
([int](#language.types.integer))

    Una [string](#language.types.string) con una lista de cifrados separados por dos puntos
    a usar para la conexión TLS 1.3.
    Esta opción actualmente solo se usa cuando cURL está compilado con OpenSSL 1.1.1 o versión posterior.
    Al usar otro backend SSL, las suites de cifrado TLS 1.3 pueden ser definidas
    con la opción **[CURLOPT_SSL_CIPHER_LIST](#constant.curlopt-ssl-cipher-list)**.
    Disponible a partir de PHP 7.3.0 y cURL 7.61.0.

**[CURLOPT_TLSAUTH_PASSWORD](#constant.curlopt-tlsauth-password)**
([int](#language.types.integer))

    El tiempo de espera para las respuestas Expect: 100-continue en milisegundos.
    Por omisión, 1000 milisegundos.
    Esta opción acepta cualquier valor que pueda convertirse en un [int](#language.types.integer) válido.
    Disponible a partir de PHP 7.0.7 y cURL 7.36.0.

**[CURLOPT_TLSAUTH_TYPE](#constant.curlopt-tlsauth-type)**
([int](#language.types.integer))

    Define una [string](#language.types.string) con el método de autenticación TLS.
    El método soportado es
    SRP
    (autenticación TLS Secure Remote Password).
    Disponible a partir de cURL 7.21.4.

**[CURLOPT_TLSAUTH_USERNAME](#constant.curlopt-tlsauth-username)**
([int](#language.types.integer))

    Define un [string](#language.types.string) con el nombre de usuario a utilizar para el método de autenticación TLS
    especificado con la opción **[CURLOPT_TLSAUTH_TYPE](#constant.curlopt-tlsauth-type)**.
    Requiere que la opción
    **[CURLOPT_TLSAUTH_PASSWORD](#constant.curlopt-tlsauth-password)**
    también esté definida.
    Esta funcionalidad se basa en TLS SRP que no funciona con TLS 1.3.
    Disponible a partir de cURL 7.21.4.

**[CURLOPT_TRANSFER_ENCODING](#constant.curlopt-transfer-encoding)**
([int](#language.types.integer))

    Define a 1 para activar y a 0 para desactivar
    la solicitud de Transfer Encoding comprimido en la solicitud
    HTTP saliente. Si el servidor responde con un
    Transfer Encoding
    comprimido,
    cURL lo descomprimirá automáticamente al recibirlo.
    Por omisión, es 0.
    Disponible a partir de cURL 7.21.6.

**[CURLOPT_TRANSFERTEXT](#constant.curlopt-transfertext)**
([int](#language.types.integer))

    **[true](#constant.true)** para usar el modo ASCII para transferencias FTP.
    Para LDAP, recupera los datos en texto sin formato en lugar de HTML. En
    sistemas Windows, no establecerá **[STDOUT](#constant.stdout)** en
    modo binario.
    Por omisión, es **[false](#constant.false)**.
    Disponible a partir de cURL 7.1.1.

**[CURLOPT_UNIX_SOCKET_PATH](#constant.curlopt-unix-socket-path)**
([int](#language.types.integer))

    Activa el uso de sockets de dominio Unix como punto de conexión y
    define la ruta del [string](#language.types.string) dado.
    Definir en **[null](#constant.null)** para desactivar.
    Por omisión, es **[null](#constant.null)**.
    Disponible a partir de PHP 7.0.7 y cURL 7.40.0.

**[CURLOPT_UNRESTRICTED_AUTH](#constant.curlopt-unrestricted-auth)**
([int](#language.types.integer))

    **[true](#constant.true)** para continuar enviando el nombre de usuario y la contraseña
    al seguir las ubicaciones (usando
    **[CURLOPT_FOLLOWLOCATION](#constant.curlopt-followlocation)**), incluso cuando el
    nombre de host ha cambiado.
    Por omisión, es **[false](#constant.false)**.
    Disponible a partir de cURL 7.10.4.

**[CURLOPT_UPKEEP_INTERVAL_MS](#constant.curlopt-upkeep-interval-ms)**
([int](#language.types.integer))

    Algunos protocolos tienen mecanismos de "mantenimiento de la conexión". Estos mecanismos generalmente envían
    tráfico en las conexiones existentes para mantenerlas vivas. Esta opción define el intervalo de mantenimiento de la
    conexión.
    Actualmente, el único protocolo con un mecanismo de mantenimiento de la conexión es HTTP/2. Cuando el intervalo de
    mantenimiento de la
    conexión es excedido, un marco PING HTTP/2 es enviado en la conexión.
    Por omisión, es
    **[CURL_UPKEEP_INTERVAL_DEFAULT](#constant.curl-upkeep-interval-default)**
    que actualmente es 60 segundos.
    Disponible a partir de PHP 8.2.0 y cURL 7.62.0.

**[CURLOPT_UPLOAD](#constant.curlopt-upload)**
([int](#language.types.integer))

    **[true](#constant.true)** para preparar y realizar una subida.
    Por omisión, es **[false](#constant.false)**.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_UPLOAD_BUFFERSIZE](#constant.curlopt-upload-buffersize)**
([int](#language.types.integer))

    El tamaño de búfer preferido en bytes para la subida cURL.
    El tamaño de búfer de subida por omisión es de 64 kilobytes. El tamaño máximo de búfer permitido a ser definido es
    de 2 megabytes.
    El tamaño mínimo de búfer permitido a ser definido es de 16 kilobytes.
    Disponible a partir de PHP 8.2.0 y cURL 7.62.0.

**[CURLOPT_URL](#constant.curlopt-url)**
([int](#language.types.integer))

    La URL a recuperar. Esto también puede ser definido durante la inicialización de una
    sesión con [curl_init()](#function.curl-init).
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_USE_SSL](#constant.curlopt-use-ssl)**
([int](#language.types.integer))

    Define el nivel de SSL/TLS deseado para la transferencia
    al utilizar FTP, SMTP, POP3, IMAP, etc.
    Estos son todos protocolos que comienzan en texto claro
    y son "mejorados" en SSL utilizando el comando STARTTLS.
    Definir en una de las constantes
    **
    CURLUSESSL_
     *
    **
    .
    Disponible a partir de cURL 7.17.0.

**[CURLOPT_USERAGENT](#constant.curlopt-useragent)**
([int](#language.types.integer))

    El contenido del encabezado User-Agent: a utilizar en una
    solicitud HTTP.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_USERNAME](#constant.curlopt-username)**
([int](#language.types.integer))

    El nombre de usuario a utilizar en la autenticación.
    Disponible a partir de cURL 7.19.1.

**[CURLOPT_USERPWD](#constant.curlopt-userpwd)**
([int](#language.types.integer))

    El nombre de usuario y la contraseña en la forma
    [username]:[password]
    a utilizar
    para la conexión.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_VERBOSE](#constant.curlopt-verbose)**
([int](#language.types.integer))

    **[true](#constant.true)** para mostrar información detallada sobre la conexión.
    Escribe la salida en **[STDERR](#constant.stderr)**, o el archivo especificado utilizando
    **[CURLOPT_STDERR](#constant.curlopt-stderr)**.
    Por omisión, es **[false](#constant.false)**.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_WILDCARDMATCH](#constant.curlopt-wildcardmatch)**
([int](#language.types.integer))

    Definir en 1 para transferir múltiples archivos
    según un patrón de nombre de archivo.
    El patrón puede ser especificado como parte de la opción
    **[CURLOPT_URL](#constant.curlopt-url)**,
    utilizando un patrón similar a fnmatch (Shell Pattern Matching)
    en la última parte de la URL (nombre de archivo).
    Disponible a partir de cURL 7.21.0.

**[CURLOPT_WRITEFUNCTION](#constant.curlopt-writefunction)**
([int](#language.types.integer))

    Un [callable](#language.types.callable) con la siguiente firma:




      callback
     (

      [resource](#language.types.resource) $curlHandle
     ,

      [string](#language.types.string) $data
     ): [int](#language.types.integer)




       curlHandle



        El manejador cURL.





       data



        Los datos a escribir.




    Los datos deben ser almacenados por el callback
    y el callback debe devolver el número exacto de bytes escritos
    o la transferencia será cancelada con un error.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_WRITEHEADER](#constant.curlopt-writeheader)**
([int](#language.types.integer))

    Acepta un manejador de archivo [resource](#language.types.resource) hacia el archivo en el cual la parte de encabezado de la
    transferencia es escrita.
    Disponible a partir de cURL 7.1.0.

**[CURLOPT_WS_OPTIONS](#constant.curlopt-ws-options)**
([int](#language.types.integer))

    Acepta una máscara de bits para definir las opciones de comportamiento WebSocket.
    La única opción disponible es **[CURLWS_RAW_MODE](#constant.curlws-raw-mode)**.
    Por omisión, es 0.
    Disponible a partir de PHP 8.3.0 y cURL 7.86.0.

**[CURLOPT_XFERINFOFUNCTION](#constant.curlopt-xferinfofunction)**
([int](#language.types.integer))

    Un [callable](#language.types.callable) con la siguiente firma:




      callback
     (

    

      [resource](#language.types.resource) $curlHandle
     ,

    

      [int](#language.types.integer) $bytesToDownload
     ,

    

      [int](#language.types.integer) $bytesDownloaded
     ,

    

      [int](#language.types.integer) $bytesToUpload
     ,

    

      [int](#language.types.integer) $bytesUploaded


): [int](#language.types.integer)

       curlHandle



        El manejador cURL.





       bytesToDownload



        El número total de bytes que deberían ser descargados durante esta transferencia.





       bytesDownloaded



        El número de bytes descargados hasta ahora.





       bytesToUpload



        El número total de bytes que deberían ser subidos durante esta transferencia.





       bytesUploaded



        El número de bytes subidos hasta ahora.




    Devolver 1 para cancelar la transferencia
    y establecer un error **[CURLE_ABORTED_BY_CALLBACK](#constant.curle-aborted-by-callback)**.
    Disponible a partir de PHP 8.2.0 y cURL 7.32.0.

**[CURLOPT_SERVER_RESPONSE_TIMEOUT](#constant.curlopt-server-response-timeout)**
([int](#language.types.integer))

    Un tiempo de espera en segundos que cURL esperará para una respuesta de un
    servidor FTP, SFTP, IMAP,
    SCP, SMTP, o un servidor POP3.
    Esta opción reemplaza la opción existente
    **[CURLOPT_FTP_RESPONSE_TIMEOUT](#constant.curlopt-ftp-response-timeout)**
    que está obsoleta a partir de cURL 7.85.0.
    Disponible a partir de PHP 8.4.0.

**[CURLOPT_XOAUTH2_BEARER](#constant.curlopt-xoauth2-bearer)**
([int](#language.types.integer))

    Especifica el token de acceso OAuth 2.0.
    Definir en **[null](#constant.null)** para desactivar.
    Por omisión, es **[null](#constant.null)**.
    Disponible a partir de PHP 7.0.7 y cURL 7.33.0.

**[CURLOPT_PREREQFUNCTION](#constant.curlopt-prereqfunction)**
([int](#language.types.integer))

    Un [callable](#language.types.callable) con la siguiente firma que es llamada después de establecer la conexión,
    pero antes de que la carga útil de la solicitud (por ejemplo, la solicitud GET/POST/DELETE de una conexión HTTP)
    sea enviada, y que puede ser utilizada para cancelar o autorizar la conexión en función de la dirección IP de origen
    y los números de puerto de origen y destino:




      callback
     (

    

      [CurlHandle](#class.curlhandle) $curlHandle
     ,

    

      [string](#language.types.string) $destination_ip
     ,

    

      [string](#language.types.string) $local_ip
     ,

    

      [int](#language.types.integer) $destination_port
     ,

    

      [int](#language.types.integer) $local_port


): [int](#language.types.integer)

       curlHandle



        El manejador cURL.





       destination_ip



        La dirección IP principal del servidor remoto establecido con esta conexión.
        Para FTP, es la IP de la conexión de control.
        Las direcciones IPv6 se representan sin corchetes.





       local_ip



        La dirección IP de origen para esta conexión.
        Las direcciones IPv6 se representan sin corchetes.





       destination_port



        El número de puerto principal en el servidor remoto establecido con esta conexión.
        Para FTP, es el puerto de la conexión de control.
        Esto puede ser un número de puerto TCP o UDP dependiendo del protocolo.





       local_port



        El número de puerto de origen para esta conexión.
        Esto puede ser un número de puerto TCP o UDP dependiendo del protocolo.




    Devolver **[CURL_PREREQFUNC_OK](#constant.curl-prereqfunc-ok)** para autorizar la solicitud, o
    **[CURL_PREREQFUNC_ABORT](#constant.curl-prereqfunc-abort)**
    para cancelar la transferencia.
    Disponible a partir de PHP 8.4.0 y cURL 7.80.0.

**[CURLOPT_DEBUGFUNCTION](#constant.curlopt-debugfunction)**
([int](#language.types.integer))

    Disponible a partir de PHP 8.4.0.
    Esta opción requiere la opción **[CURLOPT_VERBOSE](#constant.curlopt-verbose)** activada.
    Un [callable](#language.types.callable) para reemplazar la salida verbose estándar de cURL.
    Este callback es llamado en diferentes etapas de la solicitud con información de depuración detallada.
    El callback debe coincidir con la siguiente firma:




      callback
     (

      [CurlHandle](#class.curlhandle) $curlHandle
     ,

      [int](#language.types.integer) $type
     ,

      [string](#language.types.string) $data
     ): [void](language.types.void.html)




       curlHandle



        El manejador cURL.





       type



        Una de las siguientes constantes que indica el tipo del valor data:



              Constantes
              Descripción



          **[CURLINFO_TEXT](#constant.curlinfo-text)**
          ([int](#language.types.integer))



           Texto informativo.





          **[CURLINFO_HEADER_IN](#constant.curlinfo-header-in)**
          ([int](#language.types.integer))



           Datos de encabezado (o similares a los encabezados) recibidos del par.





          **[CURLINFO_HEADER_OUT](#constant.curlinfo-header-out)**
          ([int](#language.types.integer))



           Datos de encabezado (o similares a los encabezados) enviados al par.





          **[CURLINFO_DATA_IN](#constant.curlinfo-data-in)**
          ([int](#language.types.integer))



           Datos de protocolo sin procesar recibidos del par.
           Incluso si los datos están codificados o comprimidos, no se proporcionan decodificados ni descomprimidos a
           este callback.





          **[CURLINFO_DATA_OUT](#constant.curlinfo-data-out)**
          ([int](#language.types.integer))



           Datos de protocolo enviados al par.





          **[CURLINFO_SSL_DATA_IN](#constant.curlinfo-ssl-data-in)**
          ([int](#language.types.integer))



           Datos SSL/TLS (binarios) recibidos del par.





          **[CURLINFO_SSL_DATA_OUT](#constant.curlinfo-ssl-data-out)**
          ([int](#language.types.integer))



           Datos SSL/TLS (binarios) enviados al par.








       data



        Datos de depuración detallados del tipo indicado por el parámetro type.














       Constantes
       Descripción


**[curl_share_setopt()](#function.curl-share-setopt)**

**[CURL_LOCK_DATA_CONNECT](#constant.curl-lock-data-connect)**
([int](#language.types.integer))

    Comparte/descomparte la conexión.
    Disponible a partir de PHP 7.3.0 y cURL 7.10.3.

**[CURL_LOCK_DATA_COOKIE](#constant.curl-lock-data-cookie)**
([int](#language.types.integer))

    Comparte/descomparte los datos de cookie.
    Disponible a partir de cURL 7.10.3.

**[CURL_LOCK_DATA_DNS](#constant.curl-lock-data-dns)**
([int](#language.types.integer))

    Comparte/descomparte la caché DNS.
    Es de notar que cuando se utilizan múltiples gestores cURL,
    todos los gestores añadidos al gestor múltiple compartirán la caché DNS por omisión.
    Disponible a partir de cURL 7.10.3.

**[CURL_LOCK_DATA_PSL](#constant.curl-lock-data-psl)**
([int](#language.types.integer))

    Comparte/descomparte la lista de sufijos públicos.
    Disponible a partir de PHP 7.3.0 y cURL 7.61.0.

**[CURL_LOCK_DATA_SSL_SESSION](#constant.curl-lock-data-ssl-session)**
([int](#language.types.integer))

    Comparte/descomparte los identificadores de sesión SSL, reduciendo el tiempo pasado
    en la gestión SSL al reconectar al mismo servidor.
    Es de notar que los identificadores de sesión SSL son reutilizados en el mismo gestor por omisión.
    Disponible a partir de cURL 7.10.3.

**[CURLSHOPT_NONE](#constant.curlshopt-none)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.10.3.

**[CURLSHOPT_SHARE](#constant.curlshopt-share)**
([int](#language.types.integer))

    Especifica un tipo de datos a compartir.
    Disponible a partir de cURL 7.10.3.

**[CURLSHOPT_UNSHARE](#constant.curlshopt-unshare)**
([int](#language.types.integer))

    Especifica un tipo de datos que ya no será compartido.
    Disponible a partir de cURL 7.10.3.










       Constantes
       Descripción


**[curl_getinfo()](#function.curl-getinfo)**

**[CURLINFO_APPCONNECT_TIME](#constant.curlinfo-appconnect-time)**
([int](#language.types.integer))

    El tiempo en segundos que ha sido necesario para establecer la conexión SSL/SSH con el host remoto.

**[CURLINFO_APPCONNECT_TIME_T](#constant.curlinfo-appconnect-time-t)**
([int](#language.types.integer))

    El tiempo en microsegundos que ha sido necesario para establecer la conexión SSL/SSH con el host remoto.
    Disponible a partir de PHP 7.3.0 y cURL 7.61.0

**[CURLINFO_CAINFO](#constant.curlinfo-cainfo)**
([int](#language.types.integer))

    Ruta nativa del certificado CA.
    Disponible a partir de PHP 8.3.0 y cURL 7.84.0

**[CURLINFO_CAPATH](#constant.curlinfo-capath)**
([int](#language.types.integer))

    Ruta nativa del CA.
    Disponible a partir de PHP 8.3.0 y cURL 7.84.0

**[CURLINFO_CERTINFO](#constant.curlinfo-certinfo)**
([int](#language.types.integer))

    La cadena del certificado TLS.
    TLS certificate chain

**[CURLINFO_CONDITION_UNMET](#constant.curlinfo-condition-unmet)**
([int](#language.types.integer))

    Información sobre la condición temporal no cumplida.

**[CURLINFO_CONNECT_TIME](#constant.curlinfo-connect-time)**
([int](#language.types.integer))

    El tiempo en segundos que ha sido necesario para establecer la conexión.

**[CURLINFO_CONNECT_TIME_T](#constant.curlinfo-connect-time-t)**
([int](#language.types.integer))

    El tiempo total, en microsegundos, desde el inicio hasta que la conexión con el host remoto (o el proxy) se haya completado.
    Disponible a partir de PHP 7.3.0 y cURL 7.61.0

**[CURLINFO_CONTENT_LENGTH_DOWNLOAD](#constant.curlinfo-content-length-download)**
([int](#language.types.integer))

    La longitud del contenido descargado, leída desde el campo Content-Length:

**[CURLINFO_CONTENT_LENGTH_DOWNLOAD_T](#constant.curlinfo-content-length-download-t)**
([int](#language.types.integer))

    El contenido de la longitud de la descarga. Es el valor leído desde el campo Content-Length:. -1 si el tamaño no es conocido.
    Disponible a partir de PHP 7.3.0 y cURL 7.55.0

**[CURLINFO_CONTENT_LENGTH_UPLOAD](#constant.curlinfo-content-length-upload)**
([int](#language.types.integer))

    El tamaño especificado del envío.

**[CURLINFO_CONTENT_LENGTH_UPLOAD_T](#constant.curlinfo-content-length-upload-t)**
([int](#language.types.integer))

    El tamaño especificado del envío. -1 si el tamaño no es conocido.
    Disponible a partir de PHP 7.3.0 y cURL 7.55.0

**[CURLINFO_CONTENT_TYPE](#constant.curlinfo-content-type)**
([int](#language.types.integer))

    El Content-Type: del documento solicitado.
    NULL indica que el servidor no ha enviado un encabezado Content-Type: válido.

**[CURLINFO_COOKIELIST](#constant.curlinfo-cookielist)**
([int](#language.types.integer))

    Las cookies conocidas.

**[CURLINFO_EFFECTIVE_METHOD](#constant.curlinfo-effective-method)**
([int](#language.types.integer))

    Devuelve el último método HTTP utilizado.

**[CURLINFO_EFFECTIVE_URL](#constant.curlinfo-effective-url)**
([int](#language.types.integer))

    La última URL efectiva.

**[CURLINFO_FILETIME](#constant.curlinfo-filetime)**
([int](#language.types.integer))

    El tiempo remoto del documento recuperado, con **[CURLOPT_FILETIME](#constant.curlopt-filetime)** activado; si -1 es devuelto, el tiempo del documento es desconocido.

**[CURLINFO_FILETIME_T](#constant.curlinfo-filetime-t)**
([int](#language.types.integer))

    El tiempo remoto del documento recuperado (como un timestamp Unix), una alternativa a **[CURLINFO_FILETIME](#constant.curlinfo-filetime)** para permitir a los sistemas con variables largas de 32 bits extraer fechas fuera del rango de tiempo de 32 bits.
    Disponible a partir de PHP 7.3.0 y cURL 7.59.0

**[CURLINFO_FTP_ENTRY_PATH](#constant.curlinfo-ftp-entry-path)**
([int](#language.types.integer))

    La ruta de entrada en el servidor FTP.

**[CURLINFO_HEADER_OUT](#constant.curlinfo-header-out)**
([int](#language.types.integer))

    La cadena de solicitud enviada. Para que esto funcione, añada la opción **[CURLINFO_HEADER_OUT](#constant.curlinfo-header-out)** al manejador llamando a [curl_setopt()](#function.curl-setopt).

**[CURLINFO_HEADER_SIZE](#constant.curlinfo-header-size)**
([int](#language.types.integer))

    El tamaño total de todos los encabezados recibidos.

**[CURLINFO_HTTPAUTH_AVAIL](#constant.curlinfo-httpauth-avail)**
([int](#language.types.integer))

    La máscara de bits que indica el método de autenticación disponible(s) según la respuesta anterior.

**[CURLINFO_HTTP_CODE](#constant.curlinfo-http-code)**
([int](#language.types.integer))

    El último código de respuesta.
    A partir de cURL 7.10.8, es un alias heredado de **[CURLINFO_RESPONSE_CODE](#constant.curlinfo-response-code)**.

**[CURLINFO_HTTP_CONNECTCODE](#constant.curlinfo-http-connectcode)**
([int](#language.types.integer))

    El código de respuesta CONNECT.

**[CURLINFO_HTTP_VERSION](#constant.curlinfo-http-version)**
([int](#language.types.integer))

    La versión utilizada en la última conexión HTTP. El valor de retorno será una de las constantes **[CURL_HTTP_VERSION_*](#constant.curl-http-version-1-0)** definidas o 0 si la versión no puede ser determinada.
    Disponible a partir de PHP 7.3.0 y cURL 7.50.0

**[CURLINFO_LASTONE](#constant.curlinfo-lastone)**
([int](#language.types.integer))

    El último valor de enumeración en la enumeración CURLINFO subyacente en libcurl.

**[CURLINFO_LOCAL_IP](#constant.curlinfo-local-ip)**
([int](#language.types.integer))

    La dirección IP local (fuente) de la última conexión.

**[CURLINFO_LOCAL_PORT](#constant.curlinfo-local-port)**
([int](#language.types.integer))

    El puerto local (fuente) de la última conexión.

**[CURLINFO_NAMELOOKUP_TIME](#constant.curlinfo-namelookup-time)**
([int](#language.types.integer))

    El tiempo en segundos hasta que la resolución del nombre esté completa.

**[CURLINFO_NAMELOOKUP_TIME_T](#constant.curlinfo-namelookup-time-t)**
([int](#language.types.integer))

    El tiempo en microsegundos hasta que la resolución del nombre esté completa.
    Disponible a partir de PHP 7.3.0 y cURL 7.61.0

**[CURLINFO_NUM_CONNECTS](#constant.curlinfo-num-connects)**
([int](#language.types.integer))

    El número de conexiones que curl ha tenido que crear para realizar la transferencia anterior.

**[CURLINFO_OS_ERRNO](#constant.curlinfo-os-errno)**
([int](#language.types.integer))

    El número de error del fallo de conexión. El número es específico del sistema operativo y del sistema.

**[CURLINFO_PRETRANSFER_TIME](#constant.curlinfo-pretransfer-time)**
([int](#language.types.integer))

    El tiempo en segundos desde el inicio hasta justo antes de que la transferencia de fichero comience.

**[CURLINFO_PRETRANSFER_TIME_T](#constant.curlinfo-pretransfer-time-t)**
([int](#language.types.integer))

    El tiempo transcurrido desde el inicio hasta que la transferencia de fichero comience, en microsegundos.
    Disponible a partir de PHP 7.3.0 y cURL 7.61.0

**[CURLINFO_PRIMARY_IP](#constant.curlinfo-primary-ip)**
([int](#language.types.integer))

    La dirección IP de la última conexión.

**[CURLINFO_PRIMARY_PORT](#constant.curlinfo-primary-port)**
([int](#language.types.integer))

    El puerto de destino de la última conexión.

**[CURLINFO_PRIVATE](#constant.curlinfo-private)**
([int](#language.types.integer))

    Los datos privados asociados a esta conexión cURL, previamente definidos con la opción **[CURLOPT_PRIVATE](#constant.curlopt-private)** de [curl_setopt()](#function.curl-setopt).

**[CURLINFO_PROTOCOL](#constant.curlinfo-protocol)**
([int](#language.types.integer))

    El protocolo utilizado en la última conexión HTTP. El valor de retorno será exactamente uno de los valores **[CURLPROTO_*](#constant.curlproto-all)**.
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0

**[CURLINFO_PROXYAUTH_AVAIL](#constant.curlinfo-proxyauth-avail)**
([int](#language.types.integer))

    La máscara de bits que indica el método de autenticación de proxy disponible según la respuesta anterior.

**[CURLINFO_PROXY_ERROR](#constant.curlinfo-proxy-error)**
([int](#language.types.integer))

    El detalle del código de error (SOCKS) proxy cuando la última transferencia ha devuelto un error **[CURLE_PROXY](#constant.curle-proxy)**. El valor devuelto será exactamente uno de los valores **[CURLPX_*](#constant.curlpx-bad-address-type)**. El código de error será **[CURLPX_OK](#constant.curlpx-ok)** si ningún código de respuesta estaba disponible.
    Disponible a partir de PHP 8.2.0 y cURL 7.73.0

**[CURLINFO_PROXY_SSL_VERIFYRESULT](#constant.curlinfo-proxy-ssl-verifyresult)**
([int](#language.types.integer))

    El resultado de la verificación del certificado que ha sido solicitada (usando la opción **[CURLOPT_PROXY_SSL_VERIFYPEER](#constant.curlopt-proxy-ssl-verifypeer)**). Utilizado únicamente para proxies HTTPS.
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0

**[CURLINFO_REDIRECT_COUNT](#constant.curlinfo-redirect-count)**
([int](#language.types.integer))

    El número de redirecciones, con la opción **[CURLOPT_FOLLOWLOCATION](#constant.curlopt-followlocation)** activada.

**[CURLINFO_REDIRECT_TIME](#constant.curlinfo-redirect-time)**
([int](#language.types.integer))

    El tiempo en segundos de todas las etapas de redirección antes de que la transacción final comience, con la opción **[CURLOPT_FOLLOWLOCATION](#constant.curlopt-followlocation)** activada.

**[CURLINFO_REDIRECT_TIME_T](#constant.curlinfo-redirect-time-t)**
([int](#language.types.integer))

    El tiempo total, en microsegundos, que ha sido necesario para todas las etapas de redirección, incluyendo la resolución de nombre, la conexión, el pre-transferencia y la transferencia antes de que la transacción final comience.
    Disponible a partir de PHP 7.3.0 y cURL 7.61.0

**[CURLINFO_REDIRECT_URL](#constant.curlinfo-redirect-url)**
([int](#language.types.integer))

    Con la opción **[CURLOPT_FOLLOWLOCATION](#constant.curlopt-followlocation)** desactivada: URL de redirección encontrada en la última transacción, que debería ser solicitada manualmente después. Con la opción **[CURLOPT_FOLLOWLOCATION](#constant.curlopt-followlocation)** activada: está vacía. La URL de redirección en este caso está disponible en **[CURLINFO_EFFECTIVE_URL](#constant.curlinfo-effective-url)**.

**[CURLINFO_REFERER](#constant.curlinfo-referer)**
([int](#language.types.integer))

    El encabezado Referer.
    Disponible a partir de PHP 8.2.0 y cURL 7.76.0

**[CURLINFO_REQUEST_SIZE](#constant.curlinfo-request-size)**
([int](#language.types.integer))

    El tamaño total de las solicitudes emitidas, actualmente únicamente para las solicitudes HTTP.

**[CURLINFO_RESPONSE_CODE](#constant.curlinfo-response-code)**
([int](#language.types.integer))

    El último código de respuesta.
    Disponible a partir de cURL 7.10.8

**[CURLINFO_RETRY_AFTER](#constant.curlinfo-retry-after)**
([int](#language.types.integer))

    La información del encabezado Retry-After, o cero si no había un encabezado válido.
    Disponible a partir de PHP 8.2.0 y cURL 7.66.0

**[CURLINFO_RTSP_CLIENT_CSEQ](#constant.curlinfo-rtsp-client-cseq)**
([int](#language.types.integer))

    La próxima secuencia CSeq del cliente RTSP.

**[CURLINFO_RTSP_CSEQ_RECV](#constant.curlinfo-rtsp-cseq-recv)**
([int](#language.types.integer))

    La recepción CSeq RTSP reciente.

**[CURLINFO_RTSP_SERVER_CSEQ](#constant.curlinfo-rtsp-server-cseq)**
([int](#language.types.integer))

    La próxima secuencia CSeq del servidor RTSP.

**[CURLINFO_RTSP_SESSION_ID](#constant.curlinfo-rtsp-session-id)**
([int](#language.types.integer))

    El ID de sesión RTSP.

**[CURLINFO_SCHEME](#constant.curlinfo-scheme)**
([int](#language.types.integer))

    El esquema de URL utilizado para la última conexión.
    Disponible a partir de PHP 7.3.0 y cURL 7.52.0

**[CURLINFO_SIZE_DOWNLOAD](#constant.curlinfo-size-download)**
([int](#language.types.integer))

    El número total de octetos descargados.

**[CURLINFO_SIZE_DOWNLOAD_T](#constant.curlinfo-size-download-t)**
([int](#language.types.integer))

    El número total de octetos descargados. El número es únicamente para la última transferencia y será reiniciado para cada nueva transferencia.
    Disponible a partir de PHP 7.3.0 y cURL 7.50.0

**[CURLINFO_SIZE_UPLOAD](#constant.curlinfo-size-upload)**
([int](#language.types.integer))

    El número total de octetos subidos.

**[CURLINFO_SIZE_UPLOAD_T](#constant.curlinfo-size-upload-t)**
([int](#language.types.integer))

    El número total de octetos subidos.
    Disponible a partir de PHP 7.3.0 y cURL 7.50.0

**[CURLINFO_SPEED_DOWNLOAD](#constant.curlinfo-speed-download)**
([int](#language.types.integer))

    La velocidad media de descarga.

**[CURLINFO_SPEED_DOWNLOAD_T](#constant.curlinfo-speed-download-t)**
([int](#language.types.integer))

    La velocidad media de descarga en octetos/segundo que curl ha medido para la descarga completa.
    Disponible a partir de PHP 7.3.0 y cURL 7.50.0

**[CURLINFO_SPEED_UPLOAD](#constant.curlinfo-speed-upload)**
([int](#language.types.integer))

    La velocidad media de subida.

**[CURLINFO_SPEED_UPLOAD_T](#constant.curlinfo-speed-upload-t)**
([int](#language.types.integer))

    La velocidad media de subida en octetos/segundo que curl ha medido para la subida completa.
    Disponible a partir de PHP 7.3.0 y cURL 7.50.0

**[CURLINFO_SSL_ENGINES](#constant.curlinfo-ssl-engines)**
([int](#language.types.integer))

    Los motores de criptografía OpenSSL soportados.

**[CURLINFO_SSL_VERIFYRESULT](#constant.curlinfo-ssl-verifyresult)**
([int](#language.types.integer))

    El resultado de la verificación del certificado SSL solicitada definiendo **[CURLOPT_SSL_VERIFYPEER](#constant.curlopt-ssl-verifypeer)**.

**[CURLINFO_STARTTRANSFER_TIME](#constant.curlinfo-starttransfer-time)**
([int](#language.types.integer))

    El tiempo en segundos hasta que el primer octeto esté a punto de ser transferido.

**[CURLINFO_STARTTRANSFER_TIME_T](#constant.curlinfo-starttransfer-time-t)**
([int](#language.types.integer))

    El tiempo, en microsegundos, que ha sido necesario desde el inicio hasta que el primer octeto sea recibido.
    Disponible a partir de PHP 7.3.0 y cURL 7.61.0

**[CURLINFO_TOTAL_TIME](#constant.curlinfo-total-time)**
([int](#language.types.integer))

    El tiempo total en segundos para la última transferencia.

**[CURLINFO_TOTAL_TIME_T](#constant.curlinfo-total-time-t)**
([int](#language.types.integer))

    El tiempo total en microsegundos para la última transferencia, incluyendo la resolución de nombre, la conexión TCP, etc.
    Disponible a partir de PHP 7.3.0 y cURL 7.61.0

**[CURLINFO_POSTTRANSFER_TIME_T](#constant.curlinfo-posttransfer-time-t)**
([int](#language.types.integer))

    Tiempo transcurrido desde el inicio hasta el envío del último octeto, en microsegundos.
    Disponible a partir de PHP 8.4.0 y cURL 8.10.0.










       Constantes
       Descripción


**[curl_multi_setopt()](#function.curl-multi-setopt)**

    **[CURLMOPT_CHUNK_LENGTH_PENALTY_SIZE](#constant.curlmopt-chunk-length-penalty-size)**
    ([int](#language.types.integer))



     Especifica el umbral de longitud de fragmento para el pipelining en bytes.
     Disponible a partir de PHP 7.0.7 y cURL 7.30.0





    **[CURLMOPT_CONTENT_LENGTH_PENALTY_SIZE](#constant.curlmopt-content-length-penalty-size)**
    ([int](#language.types.integer))



     Especifica el umbral de tamaño de penalización de pipelining en bytes.
     Disponible a partir de PHP 7.0.7 y cURL 7.30.0





    **[CURLMOPT_MAXCONNECTS](#constant.curlmopt-maxconnects)**
    ([int](#language.types.integer))



     Especifica la cantidad máxima de conexiones abiertas simultáneamente
     que libcurl puede almacenar en caché.
     Por omisión, el tamaño se ampliará para contener cuatro veces el número
     de gestores añadidos a través de [curl_multi_add_handle()](#function.curl-multi-add-handle).
     Cuando la caché está llena, cURL cierra la más antigua en la caché
     para evitar que el número de conexiones abiertas aumente.
     Disponible a partir de cURL 7.16.3.





    **[CURLMOPT_MAX_CONCURRENT_STREAMS](#constant.curlmopt-max-concurrent-streams)**
    ([int](#language.types.integer))



     Especifica el número máximo de streams simultáneos para las conexiones
     que cURL debería soportar en conexiones que utilizan HTTP/2.
     Los valores válidos van de 1
     a 2147483647 (2^31 - 1).
     El valor pasado aquí será respetado
     en función de otras propiedades de los recursos del sistema.
     Por omisión, es 100.
     Disponible a partir de PHP 8.2.0 y cURL 7.67.0.





    **[CURLMOPT_MAX_HOST_CONNECTIONS](#constant.curlmopt-max-host-connections)**
    ([int](#language.types.integer))



     Especifica el número máximo de conexiones a un solo host.
     Disponible a partir de PHP 7.0.7 y cURL 7.30.0





    **[CURLMOPT_MAX_PIPELINE_LENGTH](#constant.curlmopt-max-pipeline-length)**
    ([int](#language.types.integer))



     Especifica el número máximo de solicitudes en un pipeline.
     Disponible a partir de PHP 7.0.7 y cURL 7.30.0





    **[CURLMOPT_MAX_TOTAL_CONNECTIONS](#constant.curlmopt-max-total-connections)**
    ([int](#language.types.integer))



     Especifica el número máximo de conexiones abiertas simultáneamente.
     Disponible a partir de PHP 7.0.7 y cURL 7.30.0





    **[CURLMOPT_PIPELINING](#constant.curlmopt-pipelining)**
    ([int](#language.types.integer))



     Pasar 1 para activar o 0 para desactivar. Activar el pipelining en un gestor múltiple
     hará que intente realizar el pipelining HTTP tanto como sea posible
     para las transferencias que utilizan este gestor. Esto significa que añadir
     una segunda solicitud que puede utilizar una conexión ya existente
     "pipe" la segunda solicitud en la misma conexión.
     A partir de cURL 7.43.0, el valor es una máscara de bits,
     y pasar 2 intentará multiplexar el nuevo
     transferencia en una conexión HTTP/2 existente.
     Pasar 3 indica a cURL solicitar el pipelining y el multiplexado
     independientemente uno del otro.
     A partir de cURL 7.62.0, establecer el bit de pipelining no tiene ningún efecto.
     En lugar de literales enteros, las constantes CURLPIPE_* también pueden ser utilizadas.
     Disponible a partir de cURL 7.16.0.





    **[CURLMOPT_PUSHFUNCTION](#constant.curlmopt-pushfunction)**
    ([int](#language.types.integer))



     Pasar una fermeture que será registrada para gestionar las poussées del servidor
     y debe tener la siguiente firma:



      pushfunction([resource](#language.types.resource) $parent_ch, [resource](#language.types.resource) $pushed_ch, [array](#language.types.array) $headers): [int](#language.types.integer)



       parent_ch


         El gestor parental cURL (la solicitud que el cliente ha hecho).




       pushed_ch


         Un nuevo gestor cURL para la solicitud poussée.




       headers


         Los encabezados de la promesa de poussée.




     La función push debe devolver ya sea
     **[CURL_PUSH_OK](#constant.curl-push-ok)** si puede gestionar la poussée, o
     **[CURL_PUSH_DENY](#constant.curl-push-deny)** para rechazarla.
     Disponible a partir de PHP 7.1.0 y cURL 7.44.0










       Constantes
       Descripción


**Constantes de protocolo cURL**

**[CURLPROTO_ALL](#constant.curlproto-all)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.19.4.

**[CURLPROTO_DICT](#constant.curlproto-dict)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.19.4.

**[CURLPROTO_FILE](#constant.curlproto-file)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.19.4.

**[CURLPROTO_FTP](#constant.curlproto-ftp)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.19.4.

**[CURLPROTO_FTPS](#constant.curlproto-ftps)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.19.4.

**[CURLPROTO_GOPHER](#constant.curlproto-gopher)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.21.2.

**[CURLPROTO_HTTP](#constant.curlproto-http)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.19.4.

**[CURLPROTO_HTTPS](#constant.curlproto-https)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.19.4.

**[CURLPROTO_IMAP](#constant.curlproto-imap)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.20.0.

**[CURLPROTO_IMAPS](#constant.curlproto-imaps)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.20.0.

**[CURLPROTO_LDAP](#constant.curlproto-ldap)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.19.4.

**[CURLPROTO_LDAPS](#constant.curlproto-ldaps)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.19.4.

**[CURLPROTO_MQTT](#constant.curlproto-mqtt)**
([int](#language.types.integer))

    Disponible a partir de PHP 8.2.0 y cURL 7.71.0.

**[CURLPROTO_POP3](#constant.curlproto-pop3)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.20.0.

**[CURLPROTO_POP3S](#constant.curlproto-pop3s)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.20.0.

**[CURLPROTO_RTMP](#constant.curlproto-rtmp)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.21.0.

**[CURLPROTO_RTMPE](#constant.curlproto-rtmpe)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.21.0.

**[CURLPROTO_RTMPS](#constant.curlproto-rtmps)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.21.0.

**[CURLPROTO_RTMPT](#constant.curlproto-rtmpt)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.21.0.

**[CURLPROTO_RTMPTE](#constant.curlproto-rtmpte)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.21.0.

**[CURLPROTO_RTMPTS](#constant.curlproto-rtmpts)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.21.0.

**[CURLPROTO_RTSP](#constant.curlproto-rtsp)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.20.0.

**[CURLPROTO_SCP](#constant.curlproto-scp)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.19.4.

**[CURLPROTO_SFTP](#constant.curlproto-sftp)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.19.4.

**[CURLPROTO_SMB](#constant.curlproto-smb)**
([int](#language.types.integer))

    Disponible a partir de PHP 7.0.7 y cURL 7.40.0.

**[CURLPROTO_SMBS](#constant.curlproto-smbs)**
([int](#language.types.integer))

    Disponible a partir de PHP 7.0.7 y cURL 7.40.0.

**[CURLPROTO_SMTP](#constant.curlproto-smtp)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.20.0.

**[CURLPROTO_SMTPS](#constant.curlproto-smtps)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.20.0.

**[CURLPROTO_TELNET](#constant.curlproto-telnet)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.19.4.

**[CURLPROTO_TFTP](#constant.curlproto-tftp)**
([int](#language.types.integer))

    Disponible a partir de cURL 7.19.4.










       Constantes
       Descripción


**Constantes de errores cURL**

**[CURLE_ABORTED_BY_CALLBACK](#constant.curle-aborted-by-callback)**
([int](#language.types.integer))

    Abandonado por la función de retrollamada. Una función de retrollamada ha devuelto "abort" a libcurl.

**[CURLE_BAD_CALLING_ORDER](#constant.curle-bad-calling-order)**
([int](#language.types.integer))

**[CURLE_BAD_CONTENT_ENCODING](#constant.curle-bad-content-encoding)**
([int](#language.types.integer))

    Codificación de contenido no reconocida.

**[CURLE_BAD_DOWNLOAD_RESUME](#constant.curle-bad-download-resume)**
([int](#language.types.integer))

    La descarga no pudo ser reanudada porque el desplazamiento especificado estaba fuera de los límites del fichero.

**[CURLE_BAD_FUNCTION_ARGUMENT](#constant.curle-bad-function-argument)**
([int](#language.types.integer))

    Una función fue llamada con un argumento incorrecto.

**[CURLE_BAD_PASSWORD_ENTERED](#constant.curle-bad-password-entered)**
([int](#language.types.integer))

**[CURLE_COULDNT_CONNECT](#constant.curle-couldnt-connect)**
([int](#language.types.integer))

    Fallo en la conexión al host o al proxy.

**[CURLE_COULDNT_RESOLVE_HOST](#constant.curle-couldnt-resolve-host)**
([int](#language.types.integer))

    Resolución del host imposible. El host remoto no pudo ser resuelto.

**[CURLE_COULDNT_RESOLVE_PROXY](#constant.curle-couldnt-resolve-proxy)**
([int](#language.types.integer))

    Resolución del proxy imposible. El proxy dado no pudo ser resuelto.

**[CURLE_FAILED_INIT](#constant.curle-failed-init)**
([int](#language.types.integer))

    El código de inicialización ha fallado.
    Probablemente se trate de un error interno o de un problema de recursos
    donde algo fundamental no pudo ser hecho al momento de la inicialización.

**[CURLE_FILESIZE_EXCEEDED](#constant.curle-filesize-exceeded)**
([int](#language.types.integer))

    Se ha superado el tamaño máximo del fichero.

**[CURLE_FILE_COULDNT_READ_FILE](#constant.curle-file-couldnt-read-file)**
([int](#language.types.integer))

    Un fichero dado con FILE:// no pudo ser abierto.
    Lo más probable es que la ruta del fichero no corresponda a un fichero existente
    o debido a la falta de permisos de fichero adecuados.

**[CURLE_FTP_ACCESS_DENIED](#constant.curle-ftp-access-denied)**
([int](#language.types.integer))

**[CURLE_FTP_BAD_DOWNLOAD_RESUME](#constant.curle-ftp-bad-download-resume)**
([int](#language.types.integer))

**[CURLE_FTP_CANT_GET_HOST](#constant.curle-ftp-cant-get-host)**
([int](#language.types.integer))

    Se ha producido un error interno al buscar el host utilizado para la nueva conexión.

**[CURLE_FTP_CANT_RECONNECT](#constant.curle-ftp-cant-reconnect)**
([int](#language.types.integer))

**[CURLE_FTP_COULDNT_GET_SIZE](#constant.curle-ftp-couldnt-get-size)**
([int](#language.types.integer))

**[CURLE_FTP_COULDNT_RETR_FILE](#constant.curle-ftp-couldnt-retr-file)**
([int](#language.types.integer))

    Esto fue una respuesta inesperada a una orden 'RETR'
    o una transferencia de cero octetos completa.

**[CURLE_FTP_COULDNT_SET_ASCII](#constant.curle-ftp-couldnt-set-ascii)**
([int](#language.types.integer))

**[CURLE_FTP_COULDNT_SET_BINARY](#constant.curle-ftp-couldnt-set-binary)**
([int](#language.types.integer))

**[CURLE_FTP_COULDNT_STOR_FILE](#constant.curle-ftp-couldnt-stor-file)**
([int](#language.types.integer))

**[CURLE_FTP_COULDNT_USE_REST](#constant.curle-ftp-couldnt-use-rest)**
([int](#language.types.integer))

    La orden FTP REST ha devuelto un error.
    Esto no debería ocurrir nunca si el servidor está sano.

**[CURLE_FTP_PARTIAL_FILE](#constant.curle-ftp-partial-file)**
([int](#language.types.integer))

**[CURLE_FTP_PORT_FAILED](#constant.curle-ftp-port-failed)**
([int](#language.types.integer))

    La orden FTP PORT ha devuelto un error.
    Esto ocurre principalmente cuando la dirección especificada para libcurl no es suficientemente buena.
    Ver **[CURLOPT_FTPPORT](#constant.curlopt-ftpport)**.

**[CURLE_FTP_QUOTE_ERROR](#constant.curle-ftp-quote-error)**
([int](#language.types.integer))

**[CURLE_FTP_SSL_FAILED](#constant.curle-ftp-ssl-failed)**
([int](#language.types.integer))

**[CURLE_FTP_USER_PASSWORD_INCORRECT](#constant.curle-ftp-user-password-incorrect)**
([int](#language.types.integer))

**[CURLE_FTP_WEIRD_227_FORMAT](#constant.curle-ftp-weird-227-format)**
([int](#language.types.integer))

    Los servidores FTP devuelven una línea 227 en respuesta a una orden PASV.
    Si libcurl falla al analizar esta línea, este código de retorno es devuelto.

**[CURLE_FTP_WEIRD_PASS_REPLY](#constant.curle-ftp-weird-pass-reply)**
([int](#language.types.integer))

    Después de enviar la contraseña FTP al servidor, libcurl espera una respuesta apropiada.
    Este código de error indica que se ha devuelto un código inesperado.

**[CURLE_FTP_WEIRD_PASV_REPLY](#constant.curle-ftp-weird-pasv-reply)**
([int](#language.types.integer))

    Libcurl no ha podido obtener un resultado sensato del servidor
    en respuesta a una orden PASV o EPSV. El servidor es defectuoso.

**[CURLE_FTP_WEIRD_SERVER_REPLY](#constant.curle-ftp-weird-server-reply)**
([int](#language.types.integer))

    El servidor ha devuelto datos que libcurl no ha podido analizar.
    Este código de error es conocido como **[CURLE_WEIRD_SERVER_REPLY](#constant.curle-weird-server-reply)**
    a partir de cURL 7.51.0.

**[CURLE_FTP_WEIRD_USER_REPLY](#constant.curle-ftp-weird-user-reply)**
([int](#language.types.integer))

**[CURLE_FTP_WRITE_ERROR](#constant.curle-ftp-write-error)**
([int](#language.types.integer))

**[CURLE_FUNCTION_NOT_FOUND](#constant.curle-function-not-found)**
([int](#language.types.integer))

    La función no ha sido encontrada. Una función zlib requerida no ha sido encontrada.

**[CURLE_GOT_NOTHING](#constant.curle-got-nothing)**
([int](#language.types.integer))

    Nada ha sido devuelto por el servidor, y en las circunstancias,
    no recibir nada es considerado como un error.

**[CURLE_HTTP_NOT_FOUND](#constant.curle-http-not-found)**
([int](#language.types.integer))

**[CURLE_HTTP_PORT_FAILED](#constant.curle-http-port-failed)**
([int](#language.types.integer))

**[CURLE_HTTP_POST_ERROR](#constant.curle-http-post-error)**
([int](#language.types.integer))

    Es un error extraño que ocurre principalmente debido a una confusión interna.

**[CURLE_HTTP_RANGE_ERROR](#constant.curle-http-range-error)**
([int](#language.types.integer))

**[CURLE_HTTP_RETURNED_ERROR](#constant.curle-http-returned-error)**
([int](#language.types.integer))

    Esto se devuelve si **[CURLOPT_FAILONERROR](#constant.curlopt-failonerror)** está definido a **[true](#constant.true)**
    y que el servidor HTTP devuelve un código de error superior o igual a 400.

**[CURLE_LDAP_CANNOT_BIND](#constant.curle-ldap-cannot-bind)**
([int](#language.types.integer))

    LDAP no puede enlazarse. La operación de enlace LDAP ha fallado.

**[CURLE_LDAP_INVALID_URL](#constant.curle-ldap-invalid-url)**
([int](#language.types.integer))

**[CURLE_LDAP_SEARCH_FAILED](#constant.curle-ldap-search-failed)**
([int](#language.types.integer))

    La búsqueda LDAP ha fallado.

**[CURLE_LIBRARY_NOT_FOUND](#constant.curle-library-not-found)**
([int](#language.types.integer))

**[CURLE_MALFORMAT_USER](#constant.curle-malformat-user)**
([int](#language.types.integer))

**[CURLE_OBSOLETE](#constant.curle-obsolete)**
([int](#language.types.integer))

**[CURLE_OK](#constant.curle-ok)**
([int](#language.types.integer))

    Todo está bien. Proceda como de costumbre.

**[CURLE_OPERATION_TIMEDOUT](#constant.curle-operation-timedout)**
([int](#language.types.integer))

    Operación expirada.
    El período de tiempo especificado ha sido alcanzado según las condiciones.

**[CURLE_OPERATION_TIMEOUTED](#constant.curle-operation-timeouted)**
([int](#language.types.integer))

**[CURLE_OUT_OF_MEMORY](#constant.curle-out-of-memory)**
([int](#language.types.integer))

    Una solicitud de asignación de memoria ha fallado.

**[CURLE_PARTIAL_FILE](#constant.curle-partial-file)**
([int](#language.types.integer))

    Una transferencia de fichero ha sido más corta o más larga de lo esperado.
    Esto ocurre cuando el servidor señala primero un tamaño de transferencia esperado,
    y luego proporciona datos que no coinciden con el tamaño dado anteriormente.

**[CURLE_PROXY](#constant.curle-proxy)**
([int](#language.types.integer))

    Error de conexión al proxy.
    **[CURLINFO_PROXY_ERROR](#constant.curlinfo-proxy-error)** proporciona detalles adicionales sobre el problema específico.
    Disponible a partir de PHP 8.2.0 y cURL 7.73.0

**[CURLE_READ_ERROR](#constant.curle-read-error)**
([int](#language.types.integer))

    Hubo un problema al leer un fichero local o un error devuelto por la función de retrollamada de lectura.

**[CURLE_RECV_ERROR](#constant.curle-recv-error)**
([int](#language.types.integer))

    Fallo en la recepción de los datos de red.

**[CURLE_SEND_ERROR](#constant.curle-send-error)**
([int](#language.types.integer))

    Fallo en el envío de los datos de red.

**[CURLE_SHARE_IN_USE](#constant.curle-share-in-use)**
([int](#language.types.integer))

**[CURLE_SSH](#constant.curle-ssh)**
([int](#language.types.integer))

    Se ha producido un error no especificado durante la sesión SSH.
    Disponible a partir de cURL 7.16.1.

**[CURLE_SSL_CACERT](#constant.curle-ssl-cacert)**
([int](#language.types.integer))

**[CURLE_SSL_CACERT_BADFILE](#constant.curle-ssl-cacert-badfile)**
([int](#language.types.integer))

    Problema de lectura del certificado SSL CA.

**[CURLE_SSL_CERTPROBLEM](#constant.curle-ssl-certproblem)**
([int](#language.types.integer))

    Problema con el cliente de certificado local.

**[CURLE_SSL_CIPHER](#constant.curle-ssl-cipher)**
([int](#language.types.integer))

    Imposible utilizar el cifrado especificado.

**[CURLE_SSL_CONNECT_ERROR](#constant.curle-ssl-connect-error)**
([int](#language.types.integer))

    Se ha producido un problema en algún lugar de la gestión SSL/TLS.
    La lectura del mensaje en el búfer de error proporciona más detalles sobre el problema.
    Podría ser de certificados (formatos de ficheros, rutas, permisos), contraseñas y otros.

**[CURLE_SSL_ENGINE_NOTFOUND](#constant.curle-ssl-engine-notfound)**
([int](#language.types.integer))

    El motor de cifrado especificado no ha sido encontrado.

**[CURLE_SSL_ENGINE_SETFAILED](#constant.curle-ssl-engine-setfailed)**
([int](#language.types.integer))

    Fallo en la definición del motor de cifrado seleccionado como motor por defecto.

**[CURLE_SSL_PEER_CERTIFICATE](#constant.curle-ssl-peer-certificate)**
([int](#language.types.integer))

**[CURLE_SSL_PINNEDPUBKEYNOTMATCH](#constant.curle-ssl-pinnedpubkeynotmatch)**
([int](#language.types.integer))

    Fallo en la coincidencia de la clave pública especificada con
    **[CURLOPT_PINNEDPUBLICKEY](#constant.curlopt-pinnedpublickey)**.

**[CURLE_TELNET_OPTION_SYNTAX](#constant.curle-telnet-option-syntax)**
([int](#language.types.integer))

**[CURLE_TOO_MANY_REDIRECTS](#constant.curle-too-many-redirects)**
([int](#language.types.integer))

    Demasiadas redirecciones. Al seguir las redirecciones, libcurl ha alcanzado el número máximo.
    El límite puede ser definido con **[CURLOPT_MAXREDIRS](#constant.curlopt-maxredirs)**.

**[CURLE_UNKNOWN_TELNET_OPTION](#constant.curle-unknown-telnet-option)**
([int](#language.types.integer))

**[CURLE_UNSUPPORTED_PROTOCOL](#constant.curle-unsupported-protocol)**
([int](#language.types.integer))

    La URL pasada a libcurl utilizó un protocolo que libcurl no soporta.
    El problema podría ser una opción de compilación que no ha sido utilizada,
    una cadena de protocolo mal escrita o simplemente un protocolo para el cual libcurl no tiene código.

**[CURLE_URL_MALFORMAT](#constant.curle-url-malformat)**
([int](#language.types.integer))

    La URL no estaba correctamente formateada.

**[CURLE_URL_MALFORMAT_USER](#constant.curle-url-malformat-user)**
([int](#language.types.integer))

**[CURLE_WEIRD_SERVER_REPLY](#constant.curle-weird-server-reply)**
([int](#language.types.integer))

    El servidor ha devuelto datos que libcurl no ha podido analizar.
    Este código de error era conocido como **[CURLE_FTP_WEIRD_SERVER_REPLY](#constant.curle-ftp-weird-server-reply)**
    antes de cURL 7.51.0.
    Disponible a partir de PHP 7.3.0 y cURL 7.51.0

**[CURLE_WRITE_ERROR](#constant.curle-write-error)**
([int](#language.types.integer))

    Se ha producido un error al escribir los datos recibidos en un fichero local,
    o un error ha sido devuelto a libcurl desde una función de retrollamada de escritura.










       Constantes
       Descripción


**curl*multi*\* constantes de estado**

**[CURLM_ADDED_ALREADY](#constant.curlm-added-already)**
([int](#language.types.integer))

    Un gestor fácil ya añadido a un gestor múltiple ha sido intentado ser añadido una segunda vez.
    Disponible a partir de cURL 7.32.1.

**[CURLM_BAD_EASY_HANDLE](#constant.curlm-bad-easy-handle)**
([int](#language.types.integer))

    Un gestor fácil no era bueno/válido. Esto podría significar que no se trata de un gestor fácil en absoluto, o eventualmente que el gestor ya está siendo utilizado por este o por otro gestor múltiple.
    Disponible a partir de cURL 7.9.6.

**[CURLM_BAD_HANDLE](#constant.curlm-bad-handle)**
([int](#language.types.integer))

    El gestor pasado no es un gestor múltiple válido.
    Disponible a partir de cURL 7.9.6.

**[CURLM_CALL_MULTI_PERFORM](#constant.curlm-call-multi-perform)**
([int](#language.types.integer))

    Desde cURL 7.20.0, esta constante no se utiliza.
    Antes de cURL 7.20.0, este estado podía ser devuelto por
    [curl_multi_exec()](#function.curl-multi-exec) cuando [curl_multi_select()](#function.curl-multi-select)
    o una función similar era llamada antes de que devolviera otra constante.
    Disponible a partir de cURL 7.9.6.

**[CURLM_INTERNAL_ERROR](#constant.curlm-internal-error)**
([int](#language.types.integer))

    Error interno de libcurl.

**[CURLM_OK](#constant.curlm-ok)**
([int](#language.types.integer))

    Ningún error.
    Disponible a partir de cURL 7.9.6.

**[CURLM_OUT_OF_MEMORY](#constant.curlm-out-of-memory)**
([int](#language.types.integer))

    No hay suficiente memoria al procesar los gestores múltiples.
    Disponible a partir de cURL 7.9.6.










       Constantes
       Descripción


**[curl_pause()](#function.curl-pause)**

**[CURLPAUSE_ALL](#constant.curlpause-all)**
([int](#language.types.integer))

    Pone en pausa el envío y la recepción de datos.
    Disponible a partir de cURL 7.18.0.

**[CURLPAUSE_CONT](#constant.curlpause-cont)**
([int](#language.types.integer))

    Reanuda el envío y la recepción de datos.
    Disponible a partir de cURL 7.18.0.

**[CURLPAUSE_RECV](#constant.curlpause-recv)**
([int](#language.types.integer))

    Pone en pausa la recepción de datos.
    Disponible a partir de cURL 7.18.0.

**[CURLPAUSE_RECV_CONT](#constant.curlpause-recv-cont)**
([int](#language.types.integer))

    Reanuda la recepción de datos.
    Disponible a partir de cURL 7.18.0.

**[CURLPAUSE_SEND](#constant.curlpause-send)**
([int](#language.types.integer))

    Pone en pausa el envío de datos.
    Disponible a partir de cURL 7.18.0.

**[CURLPAUSE_SEND_CONT](#constant.curlpause-send-cont)**
([int](#language.types.integer))

    Reanuda el envío de datos.
    Disponible a partir de cURL 7.18.0.

# Ejemplos

## Tabla de contenidos

- [Ejemplo con curl](#curl.examples-basic)

    ## Ejemplo con curl

    Una vez compilado PHP con soporte para cURL, puede empezar a usar
    las funciones cURL. La idea básica detrás de las funciones cURL es
    que se inicializa una sesión cURL usando
    [curl_init()](#function.curl-init), luego pueden definirse todas
    las opciones para la transferencia con la función [curl_setopt()](#function.curl-setopt),
    y finalmente, puede ejecutarse la sesión con
    [curl_exec()](#function.curl-exec).
    A continuación se muestra un ejemplo que utiliza las funciones cURL para recuperar la página de inicio del sitio
    example.com en un fichero:

    **Ejemplo #1 Uso del módulo cURL para recuperar la página de inicio de example.com**

&lt;?php

$ch = curl_init("http://www.example.com/");
$fp = fopen("example_homepage.txt", "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
if(curl_error($ch)) {
fwrite($fp, curl_error($ch));
}
fclose($fp);
?&gt;

# Funciones de cURL

# curl_close

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

curl_close — Cierra una sesión CURL

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.5.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**curl_close**([CurlHandle](#class.curlhandle) $handle): [void](language.types.void.html)

**Nota**:

Esta función no tiene ningún efecto. Anterior a PHP 8.0.0,
esta función era utilizada para cerrar un recurso.

Cierra una sesión cURL y libera todos los recursos. El identificador cURL,
handle, también es borrado.

### Parámetros

    handle

A cURL handle returned by
[curl_init()](#function.curl-init).

### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción







8.0.0

handle expects a [CurlHandle](#class.curlhandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Inicializa una sesión cURL y recupera una página web**

&lt;?php
// creación de un nuevo recurso cURL
$ch = curl_init();

// configuración de la URL y otras opciones
curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
curl_setopt($ch, CURLOPT_HEADER, 0);

// recuperación de la URL y visualización en el navegador
curl_exec($ch);

// cierre de la sesión cURL
curl_close($ch);
?&gt;

### Ver también

    - [curl_init()](#function.curl-init) - Inicializa una sesión cURL

    - [curl_multi_close()](#function.curl-multi-close) - Eliminar todos los gestores cURL de un gestor múltiple

# curl_copy_handle

(PHP 5, PHP 7, PHP 8)

curl_copy_handle — Copia un recurso cURL con todas sus preferencias

### Descripción

**curl_copy_handle**([CurlHandle](#class.curlhandle) $handle): [CurlHandle](#class.curlhandle)|[false](#language.types.singleton)

Copia un recurso cURL, devolviendo un nuevo recurso
cURL con las mismas preferencias.

### Parámetros

    handle

A cURL handle returned by
[curl_init()](#function.curl-init).

### Valores devueltos

Devuelve un nuevo recurso cURL, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

handle expects a [CurlHandle](#class.curlhandle)
instance now; previously, a [resource](#language.types.resource) was expected.

      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [CurlHandle](#class.curlhandle); anteriormente se devolvía un[resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Copia de un recurso cURL**

&lt;?php
// crea un nuevo recurso cURL
$ch = curl_init();

// asigna URL y otras opciones apropiadas
curl_setopt($ch, CURLOPT_URL, 'http://www.example.com/');
curl_setopt($ch, CURLOPT_HEADER, 0);

// copia el recurso
$ch2 = curl_copy_handle($ch);

// captura la URL (http://www.example.com/) y la envía al navegador
curl_exec($ch2);
?&gt;

# curl_errno

(PHP 4 &gt;= 4.0.3, PHP 5, PHP 7, PHP 8)

curl_errno — Devuelve el último mensaje de error cURL

### Descripción

**curl_errno**([CurlHandle](#class.curlhandle) $handle): [int](#language.types.integer)

Devuelve el número de error de la última operación cURL.

### Parámetros

    handle

A cURL handle returned by
[curl_init()](#function.curl-init).

### Valores devueltos

Devuelve el número de error o 0 si no ha ocurrido ningún error.

### Historial de cambios

      Versión
      Descripción







8.0.0

handle expects a [CurlHandle](#class.curlhandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con curl_errno()**

&lt;?php
// Creación de un manejador curl hacia una URL inexistente
$ch = curl_init('http://404.php.net/');

// Ejecución
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);

// Verifica si ocurre un error
if(curl_errno($ch))
{
    echo 'Error Curl : ' . curl_error($ch);
}
?&gt;

### Ver también

    - [curl_error()](#function.curl-error) - Devuelve un string que contiene el último mensaje de error cURL

    - [» los códigos de error cURL](http://curl.haxx.se/libcurl/c/libcurl-errors.html)

# curl_error

(PHP 4 &gt;= 4.0.3, PHP 5, PHP 7, PHP 8)

curl_error — Devuelve un string que contiene el último mensaje de error cURL

### Descripción

**curl_error**([CurlHandle](#class.curlhandle) $handle): [string](#language.types.string)

Devuelve un mensaje claro que representa el último error cURL.

### Parámetros

    handle

A cURL handle returned by
[curl_init()](#function.curl-init).

### Valores devueltos

Devuelve el mensaje de error o '' (string vacío) si no
ha ocurrido ningún error.

### Historial de cambios

      Versión
      Descripción







8.0.0

handle expects a [CurlHandle](#class.curlhandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con curl_error()**

&lt;?php
// Creación de un manejador curl hacia una URL inexistente
$ch = curl_init('http://404.php.net/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

if(curl_exec($ch) === false)
{
    echo 'Error Curl : ' . curl_error($ch);
}
else
{
echo 'La operación se ha completado sin ningún error';
}
?&gt;

### Ver también

    - [curl_errno()](#function.curl-errno) - Devuelve el último mensaje de error cURL

    - [» Códigos de error Curl](http://curl.haxx.se/libcurl/c/libcurl-errors.html)

# curl_escape

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

curl_escape — Codificar la cadena proporcionada para URL

### Descripción

**curl_escape**([CurlHandle](#class.curlhandle) $handle, [string](#language.types.string) $string): [string](#language.types.string)|[false](#language.types.singleton)

Esta función codifica la cadena proporcionada para URL según [» RFC 3986](https://datatracker.ietf.org/doc/html/rfc3986).

### Parámetros

handle
A cURL handle returned by
[curl_init()](#function.curl-init).

    string


      La cadena a codificar.


### Valores devueltos

Devuelve la cadena codificada o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

handle expects a [CurlHandle](#class.curlhandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con curl_escape()**

&lt;?php

// Crea un manejador curl
$ch = curl_init();

// Escapa una cadena utilizada como parámetro GET
$location = curl_escape($ch, 'Hofbräuhaus / München');
// Resultado: Hofbr%C3%A4uhaus%20%2F%20M%C3%BCnchen

// Compone una URL con la cadena escapada
$url = "http://example.com/add_location.php?location={$location}";
// Resultado: http://example.com/add_location.php?location=Hofbr%C3%A4uhaus%20%2F%20M%C3%BCnchen

// Establece las opciones y envía la petición HTTP
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
?&gt;

### Ver también

    - [curl_unescape()](#function.curl-unescape) - Decodifica la URL proporcionada

    - [urlencode()](#function.urlencode) - Codifica como URL una cadena

    - [rawurlencode()](#function.rawurlencode) - Codificar estilo URL de acuerdo al RFC 3986

    - [» RFC 3986](https://datatracker.ietf.org/doc/html/rfc3986)

# curl_exec

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

curl_exec — Ejecuta una sesión cURL

### Descripción

**curl_exec**([CurlHandle](#class.curlhandle) $handle): [string](#language.types.string)|[bool](#language.types.boolean)

Ejecuta la sesión cURL proporcionada.

Esta función debe llamarse después de inicializar una sesión cURL y de que todas
las opciones de la sesión estén configuradas.

### Parámetros

    handle

A cURL handle returned by
[curl_init()](#function.curl-init).

### Valores devueltos

En caso de éxito, esta función vacía el resultado directamente en
stdout y devuelve **[true](#constant.true)**, o **[false](#constant.false)** si ocurre un error.
Sin embargo, si **[CURLOPT_RETURNTRANSFER](#constant.curlopt-returntransfer)**
está [definida](#function.curl-setopt), la función devolverá
el resultado en caso de éxito, y **[false](#constant.false)** en caso de fallo.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

**Nota**:

    Tenga en cuenta que los códigos de estado de una respuesta que indican errores (como
    404 Not found) no se consideran fallos.
    [curl_getinfo()](#function.curl-getinfo) puede ser utilizado para verificar estos casos.

### Historial de cambios

      Versión
      Descripción







8.0.0

handle expects a [CurlHandle](#class.curlhandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Recupera el contenido de una página web**

&lt;?php
// Creación de un nuevo recurso cURL
$ch = curl_init();

// Configuración de la URL y otras opciones
curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
curl_setopt($ch, CURLOPT_HEADER, 0);

// Recuperación de la URL y visualización en el navegador
curl_exec($ch);
?&gt;

### Ver también

    - [curl_multi_exec()](#function.curl-multi-exec) - Ejecuta las subpeticiones de la sesión cURL

# curl_getinfo

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

curl_getinfo — Obtiene información sobre una transferencia específica

### Descripción

**curl_getinfo**([CurlHandle](#class.curlhandle) $handle, [?](#language.types.null)[int](#language.types.integer) $option = **[null](#constant.null)**): [mixed](#language.types.mixed)

Obtiene información sobre la última transferencia.

### Parámetros

    handle

A cURL handle returned by
[curl_init()](#function.curl-init).

     option


       Una de las constantes **[CURLINFO_*](#constant.curlinfo-text)**.





### Valores devueltos

Si option es proporcionado, el valor será devuelto.
De lo contrario, será un array asociativo conteniendo los siguientes elementos
(que corresponden a option), o **[false](#constant.false)** si ocurre un error:

    -

      "url"



    -

      "content_type"



    -

      "http_code"



    -

      "header_size"



    -

      "request_size"



    -

      "filetime"



    -

      "ssl_verify_result"



    -

      "redirect_count"



    -

      "total_time"



    -

      "namelookup_time"



    -

      "connect_time"



    -

      "pretransfer_time"



    -

      "size_upload"



    -

      "size_download"



    -

      "speed_download"



    -

      "speed_upload"



    -

      "download_content_length"



    -

      "upload_content_length"



    -

      "starttransfer_time"



    -

      "redirect_time"



    -

      "certinfo"



    -

      "primary_ip"



    -

      "primary_port"



    -

      "local_ip"



    -

      "local_port"



    -

      "redirect_url"



    -

      "request_header" (Solo existe si **[CURLINFO_HEADER_OUT](#constant.curlinfo-header-out)**
      es utilizado mediante una llamada a [curl_setopt()](#function.curl-setopt))



    -

      "posttransfer_time_us" (Disponible a partir de PHP 8.4.0 y cURL 8.10.0)


Tenga en cuenta que los datos privados no están incluidos en el array
asociativo y deben ser recuperados individualmente con la opción
**[CURLINFO_PRIVATE](#constant.curlinfo-private)**.

### Historial de cambios

       Versión
       Descripción






       8.4.0

        Introducción de la constante **[CURLINFO_POSTTRANSFER_TIME_T](#constant.curlinfo-posttransfer-time-t)** y de posttransfer_time_us (cURL 8.10.0 o versión posterior).




       8.3.0

        Introdujo **[CURLINFO_CAINFO](#constant.curlinfo-cainfo)**
        y **[CURLINFO_CAPATH](#constant.curlinfo-capath)**.




       8.2.0

        Introducción de las nuevas constantes **[CURLINFO_PROXY_ERROR](#constant.curlinfo-proxy-error)**,
        **[CURLINFO_REFERER](#constant.curlinfo-referer)**,
        **[CURLINFO_RETRY_AFTER](#constant.curlinfo-retry-after)**.





8.0.0

handle expects a [CurlHandle](#class.curlhandle)
instance now; previously, a [resource](#language.types.resource) was expected.

       8.0.0

        option ahora es nullable;
        anteriormente, el valor por omisión era 0.




       7.3.0

        Añadido **[CURLINFO_CONTENT_LENGTH_DOWNLOAD_T](#constant.curlinfo-content-length-download-t)**,
        **[CURLINFO_CONTENT_LENGTH_UPLOAD_T](#constant.curlinfo-content-length-upload-t)**,
        **[CURLINFO_HTTP_VERSION](#constant.curlinfo-http-version)**,
        **[CURLINFO_PROTOCOL](#constant.curlinfo-protocol)**,
        **[CURLINFO_PROXY_SSL_VERIFYRESULT](#constant.curlinfo-proxy-ssl-verifyresult)**,
        **[CURLINFO_SCHEME](#constant.curlinfo-scheme)**,
        **[CURLINFO_SIZE_DOWNLOAD_T](#constant.curlinfo-size-download-t)**,
        **[CURLINFO_SIZE_UPLOAD_T](#constant.curlinfo-size-upload-t)**,
        **[CURLINFO_SPEED_DOWNLOAD_T](#constant.curlinfo-speed-download-t)**,
        **[CURLINFO_SPEED_UPLOAD_T](#constant.curlinfo-speed-upload-t)**,
        **[CURLINFO_APPCONNECT_TIME_T](#constant.curlinfo-appconnect-time-t)**,
        **[CURLINFO_CONNECT_TIME_T](#constant.curlinfo-connect-time-t)**,
        **[CURLINFO_FILETIME_T](#constant.curlinfo-filetime-t)**,
        **[CURLINFO_NAMELOOKUP_TIME_T](#constant.curlinfo-namelookup-time-t)**,
        **[CURLINFO_PRETRANSFER_TIME_T](#constant.curlinfo-pretransfer-time-t)**,
        **[CURLINFO_REDIRECT_TIME_T](#constant.curlinfo-redirect-time-t)**,
        **[CURLINFO_STARTTRANSFER_TIME_T](#constant.curlinfo-starttransfer-time-t)**,
        **[CURLINFO_TOTAL_TIME_T](#constant.curlinfo-total-time-t)**.





### Ejemplos

    **Ejemplo #1 Ejemplo con curl_getinfo()**

&lt;?php
// Creación de un manejador cURL
$ch = curl_init('http://www.example.com/');

// Ejecución
curl_exec($ch);

// Verificación si ocurrió un error
if(!curl_errno($ch))
{
 $info = curl_getinfo($ch);

echo 'La petición tardó ' . $info['total_time'] . ' segundos en ser enviada a ' . $info['url'];
}
?&gt;

    **Ejemplo #2 Ejemplo de curl_getinfo()** con el parámetro option

&lt;?php
// Creación de un manejador cURL
$ch = curl_init('http://www.example.com/');

// Ejecución
curl_exec($ch);

// Verificación del código de estado HTTP
if (!curl_errno($ch)) {
  switch ($http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
case 200: # OK
break;
default:
echo 'Código HTTP inesperado: ', $http_code, "\n";
}
}
?&gt;

### Notas

**Nota**:

    Las informaciones proporcionadas por esta función se conservan si la conexión
    es reutilizada. Los datos previamente utilizados son por lo tanto devueltos a menos que
    sean sobrescritos internamente entre tanto.

# curl_init

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

curl_init — Inicializa una sesión cURL

### Descripción

**curl_init**([?](#language.types.null)[string](#language.types.string) $url = **[null](#constant.null)**): [CurlHandle](#class.curlhandle)|[false](#language.types.singleton)

Inicializa una nueva sesión y devuelve un manejador cURL.

### Parámetros

     url


       Si se proporciona, entonces **[CURLOPT_URL](#constant.curlopt-url)** tomará
       este valor. Esto puede ser configurado manualmente utilizando la
       función [curl_setopt()](#function.curl-setopt).



      **Nota**:



        El protocolo file está desactivado por cURL
        si [open_basedir](#ini.open-basedir) está definido.






### Valores devueltos

Devuelve una sesión cURL en caso de éxito, **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función devuelve ahora una instancia de [CurlHandle](#class.curlhandle);
       anteriormente, se devolvía un [resource](#language.types.resource).




      8.0.0

       url ahora es nullable.



### Ejemplos

    **Ejemplo #1
     Inicializar una sesión cURL y recuperar una página web
    **

&lt;?php

// Inicializa una nueva sesión cURL
$ch = curl_init();

// Definir la URL y otras opciones apropiadas
curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
curl_setopt($ch, CURLOPT_HEADER, 0);

// Recuperar la URL y pasarla al navegador
curl_exec($ch);

?&gt;

### Ver también

    - [curl_multi_init()](#function.curl-multi-init) - Devuelve un nuevo cURL múltiple

# curl_multi_add_handle

(PHP 5, PHP 7, PHP 8)

curl_multi_add_handle — Añade un recurso cURL a un cURL múltiple

### Descripción

**curl_multi_add_handle**([CurlMultiHandle](#class.curlmultihandle) $multi_handle, [CurlHandle](#class.curlhandle) $handle): [int](#language.types.integer)

Añade la sesión handle al gestor múltiple
multi_handle

### Parámetros

    multi_handle

A cURL multi handle returned by
[curl_multi_init()](#function.curl-multi-init).

    handle

A cURL handle returned by
[curl_init()](#function.curl-init).

### Valores devueltos

Devuelve 0 en caso de éxito, o uno de los códigos de error
**[CURLM\_\*](#constant.curlm-added-already)**.

### Historial de cambios

      Versión
      Descripción







8.0.0

multi_handle expects a [CurlMultiHandle](#class.curlmultihandle)
instance now; previously, a [resource](#language.types.resource) was expected.

8.0.0

handle expects a [CurlHandle](#class.curlhandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ver también

    - [curl_multi_remove_handle()](#function.curl-multi-remove-handle) - Retira un manejador de un conjunto de manejadores cURL

    - [curl_multi_init()](#function.curl-multi-init) - Devuelve un nuevo cURL múltiple

    - [curl_init()](#function.curl-init) - Inicializa una sesión cURL

# curl_multi_close

(PHP 5, PHP 7, PHP 8)

curl_multi_close — Eliminar todos los gestores cURL de un gestor múltiple

### Descripción

**curl_multi_close**([CurlMultiHandle](#class.curlmultihandle) $multi_handle): [void](language.types.void.html)

Elimina todos los [CurlHandle](#class.curlhandle)s adjuntos al [CurlMultiHandle](#class.curlmultihandle),
como si [curl_multi_remove_handle()](#function.curl-multi-remove-handle) hubiera sido llamado para cada uno de ellos.

Antes de PHP 8.0.0, esta función también cerraba el recurso de gestor múltiple cURL, dejándolo inutilizable.

### Parámetros

    multi_handle

A cURL multi handle returned by
[curl_multi_init()](#function.curl-multi-init).

### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción







8.0.0

multi_handle expects a [CurlMultiHandle](#class.curlmultihandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ver también

    - [curl_multi_init()](#function.curl-multi-init) - Devuelve un nuevo cURL múltiple

# curl_multi_errno

(PHP 7 &gt;= 7.1.0, PHP 8)

curl_multi_errno — Devuelve el último número de error múltiple cURL

### Descripción

**curl_multi_errno**([CurlMultiHandle](#class.curlmultihandle) $multi_handle): [int](#language.types.integer)

Devuelve un integer que contiene el último número de error múltiple cURL.

### Parámetros

    multi_handle

A cURL multi handle returned by
[curl_multi_init()](#function.curl-multi-init).

### Valores devueltos

Devuelve un integer que contiene el último número de error múltiple cURL.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ya no devuelve **[false](#constant.false)** en caso de fallo.





8.0.0

multi_handle expects a [CurlMultiHandle](#class.curlmultihandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ver también

- [curl_errno()](#function.curl-errno) - Devuelve el último mensaje de error cURL

# curl_multi_exec

(PHP 5, PHP 7, PHP 8)

curl_multi_exec — Ejecuta las subpeticiones de la sesión cURL

### Descripción

**curl_multi_exec**([CurlMultiHandle](#class.curlmultihandle) $multi_handle, [int](#language.types.integer) &amp;$still_running): [int](#language.types.integer)

Ejecuta cada gestor de la pila. Este método puede ser llamado
incluso si un gestor necesita leer o escribir datos.

### Parámetros

    multi_handle

A cURL multi handle returned by
[curl_multi_init()](#function.curl-multi-init).

     still_running


       Una referencia a un flag, que indica si las operaciones están aún en curso.





### Valores devueltos

Un código cURL, definido en las [constantes predefinidas](#curl.constants)
de cURL.

**Nota**:

    Esta función solo retorna errores relacionados con la pila. Problemas
    pueden ocurrir en transferencias individuales incluso cuando esta función
    retorna **[CURLM_OK](#constant.curlm-ok)**.

### Historial de cambios

      Versión
      Descripción







8.0.0

multi_handle expects a [CurlMultiHandle](#class.curlmultihandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con curl_multi_exec()**



     Este ejemplo creará gestores cURL para una lista de URLs, los añadirá a un gestor
     múltiple, y los ejecutará de forma asíncrona.

&lt;?php
$urls = [
"https://www.php.net/",
"https://www.example.com/",
];

$mh = curl_multi_init();
$map = new WeakMap();

foreach ($urls as $url) {
    $ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_multi_add_handle($mh, $ch);
    $map[$ch] = $url;
}

do {
$status = curl_multi_exec($mh, $unfinishedHandles);
    if ($status !== CURLM_OK) {
throw new \Exception(curl_multi_strerror(curl_multi_errno($mh)));
}

    while (($info = curl_multi_info_read($mh)) !== false) {
        if ($info['msg'] === CURLMSG_DONE) {
            $handle = $info['handle'];
            curl_multi_remove_handle($mh, $handle);
            $url = $map[$handle];

            if ($info['result'] === CURLE_OK) {
                $statusCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

                echo "La petición a {$url} ha terminado con el estado HTTP {$statusCode} :", PHP_EOL;
                echo curl_multi_getcontent($handle);
                echo PHP_EOL, PHP_EOL;
            } else {
                echo "La petición a {$url} ha fallado con el error : ", PHP_EOL;
                echo curl_strerror($info['result']);
                echo PHP_EOL, PHP_EOL;
            }
        }
    }

    if ($unfinishedHandles) {
        if (($updatedHandles = curl_multi_select($mh)) === -1) {
            throw new \Exception(curl_multi_strerror(curl_multi_errno($mh)));
        }
    }

} while ($unfinishedHandles);

curl_multi_close($mh);

?&gt;

### Ver también

    - [curl_multi_init()](#function.curl-multi-init) - Devuelve un nuevo cURL múltiple

    - [curl_multi_select()](#function.curl-multi-select) - Espera hasta que la lectura o la escritura sea posible para cualquier conexión de gestor cURL multi

    - [curl_exec()](#function.curl-exec) - Ejecuta una sesión cURL

# curl_multi_getcontent

(PHP 5, PHP 7, PHP 8)

curl_multi_getcontent — Devuelve el contenido obtenido con la opción **[CURLOPT_RETURNTRANSFER](#constant.curlopt-returntransfer)**

### Descripción

**curl_multi_getcontent**([CurlHandle](#class.curlhandle) $handle): [?](#language.types.null)[string](#language.types.string)

Si **[CURLOPT_RETURNTRANSFER](#constant.curlopt-returntransfer)** es una opción definida
para un manejador específico, entonces esta función devolverá el contenido
de ese manejador cURL, en forma de [string](#language.types.string).

### Parámetros

    handle

A cURL handle returned by
[curl_init()](#function.curl-init).

### Valores devueltos

Devuelve el contenido del manejador cURL, si
**[CURLOPT_RETURNTRANSFER](#constant.curlopt-returntransfer)** está definido o **[null](#constant.null)** si no lo está.

### Historial de cambios

      Versión
      Descripción







8.0.0

handle expects a [CurlHandle](#class.curlhandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ver también

    - [curl_multi_init()](#function.curl-multi-init) - Devuelve un nuevo cURL múltiple

# curl_multi_info_read

(PHP 5, PHP 7, PHP 8)

curl_multi_info_read — Lee las informaciones sobre las transferencias actuales

### Descripción

**curl_multi_info_read**([CurlMultiHandle](#class.curlmultihandle) $multi_handle, [int](#language.types.integer) &amp;$queued_messages = **[null](#constant.null)**): [array](#language.types.array)|[false](#language.types.singleton)

Invoca el gestor múltiple si existen mensajes o informaciones
provenientes de las transferencias individuales. Los mensajes pueden incluir
informaciones como un código de error de la transferencia, o simplemente el hecho de que la transferencia ha finalizado.

Las llamadas repetidas a esta función devolverán un nuevo resultado cada vez,
hasta que **[false](#constant.false)** no sea devuelto, indicando que no hay nada más que recuperar
en este momento. El entero presente en el argumento queued_messages
representa el número de mensajes restantes una vez llamada esta función.

**Advertencia**

    Los datos apuntados por el recurso devuelto, no sobrevivirán
    a la llamada de la función [curl_multi_remove_handle()](#function.curl-multi-remove-handle).

### Parámetros

    multi_handle

A cURL multi handle returned by
[curl_multi_init()](#function.curl-multi-init).

     queued_messages


       Número de mensajes aún presentes en la cola





### Valores devueltos

Devuelve un array asociativo que contiene el mensaje en caso de éxito,
**[false](#constant.false)** si ocurre un error.

    <caption>**Contenido del array devuelto**</caption>



       Key:
       Value:






       msg
       La constante **[CURLMSG_DONE](#constant.curlmsg-done)**. Las demás valores devueltos
        no están actualmente disponibles.



       result
       Una de las constantes **[CURLE_*](#constant.curle-aborted-by-callback)**. Si todo ha transcurrido correctamente,
        se devolverá la constante **[CURLE_OK](#constant.curle-ok)**.



       handle
       Recurso de tipo curl que indica el gestor concernido.




### Historial de cambios

      Versión
      Descripción







8.0.0

multi_handle expects a [CurlMultiHandle](#class.curlmultihandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ver también

    - [curl_multi_init()](#function.curl-multi-init) - Devuelve un nuevo cURL múltiple

# curl_multi_init

(PHP 5, PHP 7, PHP 8)

curl_multi_init — Devuelve un nuevo cURL múltiple

### Descripción

**curl_multi_init**(): [CurlMultiHandle](#class.curlmultihandle)

Permite la ejecución de múltiples gestores cURL de forma asíncrona.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un gestor cURL múltiple.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función devuelve ahora una instancia de [CurlMultiHandle](#class.curlmultihandle);
       anteriormente, se devolvía un [resource](#language.types.resource).



### Ver también

    - [curl_init()](#function.curl-init) - Inicializa una sesión cURL

    - [curl_multi_close()](#function.curl-multi-close) - Eliminar todos los gestores cURL de un gestor múltiple

# curl_multi_remove_handle

(PHP 5, PHP 7, PHP 8)

curl_multi_remove_handle — Retira un manejador de un conjunto de manejadores cURL

### Descripción

**curl_multi_remove_handle**([CurlMultiHandle](#class.curlmultihandle) $multi_handle, [CurlHandle](#class.curlhandle) $handle): [int](#language.types.integer)

Retira un manejador handle dado del
multi_handle. Cuando el manejador handle
ha sido retirado, es nuevamente perfectamente correcto ejecutar la función
[curl_exec()](#function.curl-exec). El hecho de retirar
el handle en uso detiene todas
las transferencias en curso.

### Parámetros

    multi_handle

A cURL multi handle returned by
[curl_multi_init()](#function.curl-multi-init).

    handle

A cURL handle returned by
[curl_init()](#function.curl-init).

### Valores devueltos

Retorna 0 en caso de éxito, o uno de los códigos de error
**[CURLM\_\*](#constant.curlm-added-already)**.

### Historial de cambios

      Versión
      Descripción







8.0.0

multi_handle expects a [CurlMultiHandle](#class.curlmultihandle)
instance now; previously, a [resource](#language.types.resource) was expected.

8.0.0

handle expects a [CurlHandle](#class.curlhandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ver también

    - [curl_init()](#function.curl-init) - Inicializa una sesión cURL

    - [curl_multi_init()](#function.curl-multi-init) - Devuelve un nuevo cURL múltiple

    - [curl_multi_add_handle()](#function.curl-multi-add-handle) - Añade un recurso cURL a un cURL múltiple

# curl_multi_select

(PHP 5, PHP 7, PHP 8)

curl_multi_select — Espera hasta que la lectura o la escritura sea posible para cualquier conexión de gestor cURL multi

### Descripción

**curl_multi_select**([CurlMultiHandle](#class.curlmultihandle) $multi_handle, [float](#language.types.float) $timeout = 1.0): [int](#language.types.integer)

Bloquea la ejecución del script hasta que un gestor cURL asociado al gestor cURL multi pueda progresar
durante la próxima llamada a [curl_multi_exec()](#function.curl-multi-exec) o hasta que expire el tiempo de espera
(según lo que ocurra primero).

### Parámetros

    multi_handle

A cURL multi handle returned by
[curl_multi_init()](#function.curl-multi-init).

     timeout


       Duración máxima, en segundos, para esperar una respuesta de las conexiones activas del gestor cURL multi.





### Valores devueltos

En caso de éxito, devuelve el número de descriptores activos
contenidos en los conjuntos de descriptores. Esto puede ser
0 si no ha habido actividad en ninguno
de los descriptores. En caso de error, esta función devolverá
-1 en caso de fallo de selección (de la llamada al sistema select() subyacente).

### Errores/Excepciones

Genera una [ValueError](#class.valueerror) si timeout
es inferior a 0 o superior a **[PHP_INT_MAX](#constant.php-int-max)**.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Genera ahora una [ValueError](#class.valueerror) si timeout
       es inferior a 0 o superior a **[PHP_INT_MAX](#constant.php-int-max)**.





8.0.0

multi_handle expects a [CurlMultiHandle](#class.curlmultihandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ver también

    - [curl_multi_init()](#function.curl-multi-init) - Devuelve un nuevo cURL múltiple

# curl_multi_setopt

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

curl_multi_setopt — Define una opción múltiple cURL

### Descripción

**curl_multi_setopt**([CurlMultiHandle](#class.curlmultihandle) $multi_handle, [int](#language.types.integer) $option, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Define una opción en el manejador multi cURL dado.

### Parámetros

multi_handle
A cURL multi handle returned by
[curl_multi_init()](#function.curl-multi-init).

    option


      Una de las constantes **[CURLMOPT_*](#constant.curlmopt-chunk-length-penalty-size)**.






    value


      El valor a definir para el parámetro
      option.
      Ver la descripción de las
      constantes **[CURLMOPT_*](#constant.curlmopt-chunk-length-penalty-size)**
      para detalles sobre el tipo de valores esperados por cada constante.


### Valores devueltos

    Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

        Versión
        Descripción






        8.2.0

         Añadido **[CURLMOPT_MAX_CONCURRENT_STREAMS](#constant.curlmopt-max-concurrent-streams)**.





8.0.0

multi_handle expects a [CurlMultiHandle](#class.curlmultihandle)
instance now; previously, a [resource](#language.types.resource) was expected.

        7.1.0

         Añadido **[CURLMOPT_PUSHFUNCTION](#constant.curlmopt-pushfunction)**.




        7.0.7

         Añadido **[CURLMOPT_CHUNK_LENGTH_PENALTY_SIZE](#constant.curlmopt-chunk-length-penalty-size)**,
         **[CURLMOPT_CONTENT_LENGTH_PENALTY_SIZE](#constant.curlmopt-content-length-penalty-size)**,
         **[CURLMOPT_MAX_HOST_CONNECTIONS](#constant.curlmopt-max-host-connections)**,
         **[CURLMOPT_MAX_PIPELINE_LENGTH](#constant.curlmopt-max-pipeline-length)** y
         **[CURLMOPT_MAX_TOTAL_CONNECTIONS](#constant.curlmopt-max-total-connections)**.






# curl_multi_strerror

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

curl_multi_strerror — Devuelve la descripción de un código de error

### Descripción

**curl_multi_strerror**([int](#language.types.integer) $error_code): [?](#language.types.null)[string](#language.types.string)

Devuelve el mensaje de error que describe el código de error
**[CURLM\_\*](#constant.curlm-added-already)** proporcionado.

### Parámetros

    error_code


      Una constante entre las constantes de
      **[CURLM_*](#constant.curlm-added-already)**


### Valores devueltos

Devuelve la descripción de un código de error válido,
**[null](#constant.null)** en caso contrario.

### Ver también

    - [curl_strerror()](#function.curl-strerror) - Devuelve la cadena descriptiva del código de error proporcionado

    - [» los códigos de error cURL](http://curl.haxx.se/libcurl/c/libcurl-errors.html)

# curl_pause

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

curl_pause — Pone en pausa, o saca de la pausa una conexión

### Descripción

**curl_pause**([CurlHandle](#class.curlhandle) $handle, [int](#language.types.integer) $flags): [int](#language.types.integer)

Pone en pausa o reanuda una sesión cURL. Una sesión puede ser pausada mientras se realiza una transferencia,
en las direcciones de lectura, escritura o ambas, llamando a esta función
desde una función de devolución de llamada registrada con la función [curl_setopt()](#function.curl-setopt).

### Parámetros

handle
A cURL handle returned by
[curl_init()](#function.curl-init).

    flags


      Una constante entre **[CURLPAUSE_*](#constant.curlpause-all)**.


### Valores devueltos

Devuelve un código de error (**[CURLE_OK](#constant.curle-ok)** corresponde a ninguna error).

### Historial de cambios

      Versión
      Descripción







8.0.0

handle expects a [CurlHandle](#class.curlhandle)
instance now; previously, a [resource](#language.types.resource) was expected.

# curl_reset

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

curl_reset — Reinicia todas las opciones de un manejador de sesión libcurl

### Descripción

**curl_reset**([CurlHandle](#class.curlhandle) $handle): [void](language.types.void.html)

Esta función reinicia todas las opciones definidas
en el manejador cURL dado a sus valores por omisión.

### Parámetros

handle
A cURL handle returned by
[curl_init()](#function.curl-init).

### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción







8.0.0

handle expects a [CurlHandle](#class.curlhandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con curl_reset()**

&lt;?php
// Crea un manejador cURL
$ch = curl_init();

// Define la opción CURLOPT_USERAGENT
curl_setopt($ch, CURLOPT_USERAGENT, "Mi user-agent de prueba");

// Reinicia todas las opciones definidas previamente
curl_reset($ch);

// Envía la petición HTTP
curl_setopt($ch, CURLOPT_URL, 'http://example.com/');
curl_exec($ch); // el user-agent definido previamente no será enviado, fue reiniciado por la función curl_reset
?&gt;

### Notas

**Nota**:

    La función **curl_reset()** también reiniciará
    la URL proporcionada como argumento de la función
    [curl_init()](#function.curl-init).

### Ver también

    - [curl_setopt()](#function.curl-setopt) - Establece una opción para una transferencia cURL

# curl_setopt

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

curl_setopt — Establece una opción para una transferencia cURL

### Descripción

**curl_setopt**([CurlHandle](#class.curlhandle) $handle, [int](#language.types.integer) $option, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Establece una opción para el gestor de sesión cURL proporcionado.

### Parámetros

    handle

A cURL handle returned by
[curl_init()](#function.curl-init).

     option


       La opción CURLOPT_* a definir.






     value


       El valor a definir para option.
       Ver la descripción de las
       constantes **[CURLOPT_*](#constant.curlopt-abstract-unix-socket)**
       para detalles sobre el tipo de valores esperados por cada constante.




       Otros valores:






           Option
           Define el parámetro value en






           **[CURLOPT_SHARE](#constant.curlopt-share)**

            Un resultado de la función [curl_share_init()](#function.curl-share-init).
            Hace que el gestor cURL utilice los datos desde
            el gestor compartido.










### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.4.0

        **[CURLOPT_DNS_USE_GLOBAL_CACHE](#constant.curlopt-dns-use-global-cache)** ya no tiene ningún efecto,
        y la activación de esta opción en las versiones PHP thread-safe ya no genera advertencias.





8.0.0

handle expects a [CurlHandle](#class.curlhandle)
instance now; previously, a [resource](#language.types.resource) was expected.

       7.3.15, 7.4.3

        Introducción de la constante
        **[CURLOPT_HTTP09_ALLOWED](#constant.curlopt-http09-allowed)**.




       7.3.0

        Introdujo **[CURLOPT_ABSTRACT_UNIX_SOCKET](#constant.curlopt-abstract-unix-socket)**, **[CURLOPT_KEEP_SENDING_ON_ERROR](#constant.curlopt-keep-sending-on-error)**,
        **[CURLOPT_PRE_PROXY](#constant.curlopt-pre-proxy)**, **[CURLOPT_PROXY_CAINFO](#constant.curlopt-proxy-cainfo)**,
        **[CURLOPT_PROXY_CAPATH](#constant.curlopt-proxy-capath)**, **[CURLOPT_PROXY_CRLFILE](#constant.curlopt-proxy-crlfile)**,
        **[CURLOPT_PROXY_KEYPASSWD](#constant.curlopt-proxy-keypasswd)**, **[CURLOPT_PROXY_PINNEDPUBLICKEY](#constant.curlopt-proxy-pinnedpublickey)**,
        **[CURLOPT_PROXY_SSLCERT](#constant.curlopt-proxy-sslcert)**, **[CURLOPT_PROXY_SSLCERTTYPE](#constant.curlopt-proxy-sslcerttype)**,
        **[CURLOPT_PROXY_SSL_CIPHER_LIST](#constant.curlopt-proxy-ssl-cipher-list)**, **[CURLOPT_PROXY_SSLKEY](#constant.curlopt-proxy-sslkey)**,
        **[CURLOPT_PROXY_SSLKEYTYPE](#constant.curlopt-proxy-sslkeytype)**, **[CURLOPT_PROXY_SSL_OPTIONS](#constant.curlopt-proxy-ssl-options)**,
        **[CURLOPT_PROXY_SSL_VERIFYHOST](#constant.curlopt-proxy-ssl-verifyhost)**, **[CURLOPT_PROXY_SSL_VERIFYPEER](#constant.curlopt-proxy-ssl-verifypeer)**,
        **[CURLOPT_PROXY_SSLVERSION](#constant.curlopt-proxy-sslversion)**, **[CURLOPT_PROXY_TLSAUTH_PASSWORD](#constant.curlopt-proxy-tlsauth-password)**,
        **[CURLOPT_PROXY_TLSAUTH_TYPE](#constant.curlopt-proxy-tlsauth-type)**, **[CURLOPT_PROXY_TLSAUTH_USERNAME](#constant.curlopt-proxy-tlsauth-username)**,
        **[CURLOPT_SOCKS5_AUTH](#constant.curlopt-socks5-auth)**, **[CURLOPT_SUPPRESS_CONNECT_HEADERS](#constant.curlopt-suppress-connect-headers)**,
        **[CURLOPT_DISALLOW_USERNAME_IN_URL](#constant.curlopt-disallow-username-in-url)**, **[CURLOPT_DNS_SHUFFLE_ADDRESSES](#constant.curlopt-dns-shuffle-addresses)**,
        **[CURLOPT_HAPPY_EYEBALLS_TIMEOUT_MS](#constant.curlopt-happy-eyeballs-timeout-ms)**, **[CURLOPT_HAPROXYPROTOCOL](#constant.curlopt-haproxyprotocol)**,
        **[CURLOPT_PROXY_TLS13_CIPHERS](#constant.curlopt-proxy-tls13-ciphers)**, **[CURLOPT_SSH_COMPRESSION](#constant.curlopt-ssh-compression)**,
        **[CURLOPT_TIMEVALUE_LARGE](#constant.curlopt-timevalue-large)** y **[CURLOPT_TLS13_CIPHERS](#constant.curlopt-tls13-ciphers)**.




       7.0.7

        Introdujo **[CURL_HTTP_VERSION_2](#constant.curl-http-version-2)**, **[CURL_HTTP_VERSION_2_PRIOR_KNOWLEDGE](#constant.curl-http-version-2-prior-knowledge)**,
        **[CURL_HTTP_VERSION_2TLS](#constant.curl-http-version-2tls)**, **[CURL_REDIR_POST_301](#constant.curl-redir-post-301)**,
        **[CURL_REDIR_POST_302](#constant.curl-redir-post-302)**, **[CURL_REDIR_POST_303](#constant.curl-redir-post-303)**,
        **[CURL_REDIR_POST_ALL](#constant.curl-redir-post-all)**, **[CURL_VERSION_KERBEROS5](#constant.curl-version-kerberos5)**,
        **[CURL_VERSION_PSL](#constant.curl-version-psl)**, **[CURL_VERSION_UNIX_SOCKETS](#constant.curl-version-unix-sockets)**,
        **[CURLAUTH_NEGOTIATE](#constant.curlauth-negotiate)**, **[CURLAUTH_NTLM_WB](#constant.curlauth-ntlm-wb)**,
        **[CURLFTP_CREATE_DIR](#constant.curlftp-create-dir)**, **[CURLFTP_CREATE_DIR_NONE](#constant.curlftp-create-dir-none)**,
        **[CURLFTP_CREATE_DIR_RETRY](#constant.curlftp-create-dir-retry)**, **[CURLHEADER_SEPARATE](#constant.curlheader-separate)**,
        **[CURLHEADER_UNIFIED](#constant.curlheader-unified)**, **[CURLMOPT_CHUNK_LENGTH_PENALTY_SIZE](#constant.curlmopt-chunk-length-penalty-size)**,
        **[CURLMOPT_CONTENT_LENGTH_PENALTY_SIZE](#constant.curlmopt-content-length-penalty-size)**, **[CURLMOPT_MAX_HOST_CONNECTIONS](#constant.curlmopt-max-host-connections)**,
        **[CURLMOPT_MAX_PIPELINE_LENGTH](#constant.curlmopt-max-pipeline-length)**, **[CURLMOPT_MAX_TOTAL_CONNECTIONS](#constant.curlmopt-max-total-connections)**,
        **[CURLOPT_CONNECT_TO](#constant.curlopt-connect-to)**, **[CURLOPT_DEFAULT_PROTOCOL](#constant.curlopt-default-protocol)**,
        **[CURLOPT_DNS_INTERFACE](#constant.curlopt-dns-interface)**, **[CURLOPT_DNS_LOCAL_IP4](#constant.curlopt-dns-local-ip4)**,
        **[CURLOPT_DNS_LOCAL_IP6](#constant.curlopt-dns-local-ip6)**, **[CURLOPT_EXPECT_100_TIMEOUT_MS](#constant.curlopt-expect-100-timeout-ms)**,
        **[CURLOPT_HEADEROPT](#constant.curlopt-headeropt)**, **[CURLOPT_LOGIN_OPTIONS](#constant.curlopt-login-options)**,
        **[CURLOPT_PATH_AS_IS](#constant.curlopt-path-as-is)**, **[CURLOPT_PINNEDPUBLICKEY](#constant.curlopt-pinnedpublickey)**,
        **[CURLOPT_PIPEWAIT](#constant.curlopt-pipewait)**, **[CURLOPT_PROXY_SERVICE_NAME](#constant.curlopt-proxy-service-name)**,
        **[CURLOPT_PROXYHEADER](#constant.curlopt-proxyheader)**, **[CURLOPT_SASL_IR](#constant.curlopt-sasl-ir)**,
        **[CURLOPT_SERVICE_NAME](#constant.curlopt-service-name)**, **[CURLOPT_SSL_ENABLE_ALPN](#constant.curlopt-ssl-enable-alpn)**,
        **[CURLOPT_SSL_ENABLE_NPN](#constant.curlopt-ssl-enable-npn)**, **[CURLOPT_SSL_FALSESTART](#constant.curlopt-ssl-falsestart)**,
        **[CURLOPT_SSL_VERIFYSTATUS](#constant.curlopt-ssl-verifystatus)**, **[CURLOPT_STREAM_WEIGHT](#constant.curlopt-stream-weight)**,
        **[CURLOPT_TCP_FASTOPEN](#constant.curlopt-tcp-fastopen)**, **[CURLOPT_TFTP_NO_OPTIONS](#constant.curlopt-tftp-no-options)**,
        **[CURLOPT_UNIX_SOCKET_PATH](#constant.curlopt-unix-socket-path)**, **[CURLOPT_XOAUTH2_BEARER](#constant.curlopt-xoauth2-bearer)**,
        **[CURLPROTO_SMB](#constant.curlproto-smb)**, **[CURLPROTO_SMBS](#constant.curlproto-smbs)**,
        **[CURLPROXY_HTTP_1_0](#constant.curlproxy-http-1-0)**, **[CURLSSH_AUTH_AGENT](#constant.curlssh-auth-agent)** y
        **[CURLSSLOPT_NO_REVOKE](#constant.curlsslopt-no-revoke)**.





### Ejemplos

    **Ejemplo #1 Inicialización de una nueva sesión CURL y búsqueda de una página web**

&lt;?php
// Creación de un recurso cURL
$ch = curl_init();

// Definición de la URL y otras opciones apropiadas
curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
curl_setopt($ch, CURLOPT_HEADER, false);

// Recuperación de la URL y paso al navegador
curl_exec($ch);
?&gt;

### Notas

**Nota**:

    El hecho de pasar un array a la constante
    **[CURLOPT_POSTFIELDS](#constant.curlopt-postfields)** codificará los datos como
    *multipart/form-data*, mientras que el hecho de pasar
    una cadena codificada URL codificará los datos como
    *application/x-www-form-urlencoded*.

### Ver también

    - [curl_setopt_array()](#function.curl-setopt-array) - Establece múltiples opciones para una transferencia cURL

    - [CURLFile](#class.curlfile)

    - [CURLStringFile](#class.curlstringfile)

# curl_setopt_array

(PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

curl_setopt_array — Establece múltiples opciones para una transferencia cURL

### Descripción

**curl_setopt_array**([CurlHandle](#class.curlhandle) $handle, [array](#language.types.array) $options): [bool](#language.types.boolean)

Establece múltiples opciones para una sesión cURL. Esta función es útil para
configurar un gran número de opciones cURL sin llamar a cada vez
[curl_setopt()](#function.curl-setopt).

### Parámetros

    handle

A cURL handle returned by
[curl_init()](#function.curl-init).

     options


       Un array que especifica qué opciones establecer con sus valores. Las
       claves deberían ser constantes válidas de
       [curl_setopt()](#function.curl-setopt) o sus enteros equivalentes.





### Valores devueltos

Devuelve **[true](#constant.true)** si todas las opciones se establecieron correctamente. Si una
opción no puede ser establecida correctamente, **[false](#constant.false)** es devuelto
inmediatamente, ignorando todas las opciones futuras en el array
options.

### Historial de cambios

      Versión
      Descripción







8.0.0

handle expects a [CurlHandle](#class.curlhandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1
     Inicialización de una nueva sesión cURL y recuperación de una página web
    **

&lt;?php
// crea un nuevo recurso cURL
$ch = curl_init();

// establece la URL y otras opciones apropiadas
$options = array(CURLOPT_URL =&gt; 'http://www.example.com/',
CURLOPT_HEADER =&gt; false
);

curl_setopt_array($ch, $options);

// captura la URL y la pasa al navegador
curl_exec($ch);
?&gt;

### Notas

**Nota**:

    Con la función [curl_setopt()](#function.curl-setopt), el hecho de
    pasar un array como valor de la constante
    **[CURLOPT_POST](#constant.curlopt-post)** hará que los datos sean
    codificados como *multipart/form-data*, mientras que
    el hecho de pasar una string codificada URL hará que los datos
    sean codificados como *application/x-www-form-urlencoded*.

### Ver también

    - [curl_setopt()](#function.curl-setopt) - Establece una opción para una transferencia cURL

# curl_share_close

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

curl_share_close — Cierra un manejador compartido cURL

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.5.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**curl_share_close**([CurlShareHandle](#class.curlsharehandle) $share_handle): [void](language.types.void.html)

**Nota**:

Esta función no tiene ningún efecto. Anterior a PHP 8.0.0,
esta función era utilizada para cerrar un recurso.

Cierra un manejador compartido cURL y libera todos los recursos.

### Parámetros

share_handle
A cURL share handle returned by
[curl_share_init()](#function.curl-share-init).

### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción







8.0.0

share_handle expects a [CurlShareHandle](#class.curlsharehandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con [curl_share_setopt()](#function.curl-share-setopt)**



     Este ejemplo crea un manejador compartido cURL, añade dos manejadores
     cURL, y luego los ejecuta con cookies de datos compartidos.

&lt;?php
// Crea un manejador compartido cURL, y lo define para compartir cookies de datos
$sh = curl_share_init();
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_COOKIE);

// Inicializa el primer manejador cURL, y le asigna el manejador compartido
$ch1 = curl_init("http://example.com/");
curl_setopt($ch1, CURLOPT_SHARE, $sh);

// Ejecuta el primer manejador cURL
curl_exec($ch1);

// Inicializa el segundo manejador cURL, y le asigna el manejador compartido
$ch2 = curl_init("http://php.net/");
curl_setopt($ch2, CURLOPT_SHARE, $sh);

// Ejecuta el segundo manejador cURL.
// Todas las cookies del manejador $ch1 son compartidas con el manejador $ch2.
curl_exec($ch2);

// Cierra el manejador compartido cURL
curl_share_close($sh);
?&gt;

### Ver también

    - [curl_share_init()](#function.curl-share-init) - Inicializa un manejador compartido cURL

# curl_share_errno

(PHP 7 &gt;= 7.1.0, PHP 8)

curl_share_errno — Devuelve el último número de error del gestor compartido cURL

### Descripción

**curl_share_errno**([CurlShareHandle](#class.curlsharehandle) $share_handle): [int](#language.types.integer)

Devuelve un integer que contiene el último número de error del gestor compartido cURL.

### Parámetros

share_handle
A cURL share handle returned by
[curl_share_init()](#function.curl-share-init).

### Valores devueltos

Devuelve un integer que contiene el último número de error del gestor compartido cURL.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       La función ya no devuelve **[false](#constant.false)** en caso de fallo.





8.0.0

share_handle expects a [CurlShareHandle](#class.curlsharehandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ver también

- [curl_errno()](#function.curl-errno) - Devuelve el último mensaje de error cURL

# curl_share_init

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

curl_share_init — Inicializa un manejador compartido cURL

### Descripción

**curl_share_init**(): [CurlShareHandle](#class.curlsharehandle)

Permite el intercambio de datos entre manejadores cURL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un manejador cURL compartido.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función devuelve ahora una instancia de [CurlShareHandle](#class.curlsharehandle);
       anteriormente, se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Ejemplo con curl_share_init()**



     Este ejemplo crea un manejador compartido cURL, añade dos manejadores
     cURL, y luego los ejecuta con cookies de datos compartidos.

&lt;?php
// Crea un manejador compartido cURL, y lo configura para compartir datos de cookies
$sh = curl_share_init();
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_COOKIE);

// Inicializa el primer manejador cURL, y le asigna el manejador compartido
$ch1 = curl_init("http://example.com/");
curl_setopt($ch1, CURLOPT_SHARE, $sh);

// Ejecuta el primer manejador cURL
curl_exec($ch1);

// Inicializa el segundo manejador cURL y le asigna el manejador compartido
$ch2 = curl_init("http://php.net/");
curl_setopt($ch2, CURLOPT_SHARE, $sh);

// Ejecuta el segundo manejador cURL.
// Todas las cookies del manejador $ch1 son compartidas con el manejador $ch2.
curl_exec($ch2);
?&gt;

### Ver también

    - [curl_share_setopt()](#function.curl-share-setopt) - Establece una opción del manejador compartido cURL

    - [curl_share_init_persistent()](#function.curl-share-init-persistent) - Inicializa un gestor cURL "share" persistent

# curl_share_init_persistent

(PHP 8 &gt;= 8.5.0)

curl_share_init_persistent — Inicializa un gestor cURL "share" **persistent**

### Descripción

**curl_share_init_persistent**([array](#language.types.array) $share_options): [CurlSharePersistentHandle](#class.curlsharepersistenthandle)

Inicializa un gestor cURL "share" **persistent**
con las opciones de partage dadas. A diferencia de [curl_share_init()](#function.curl-share-init),
los gestores creados por esta función no serán destruidos al final de la
petición PHP. Si se encuentra un gestor de partage persistente con el mismo conjunto
de share_options, será reutilizado.

### Parámetros

    share_options


      Un array no vacío de constantes **[CURL_LOCK_DATA_*](#constant.curl-lock-data-connect)**.

     **Nota**:

       **[CURL_LOCK_DATA_COOKIE](#constant.curl-lock-data-cookie)**
       no está permitido y, si se especifica, esta función lanzará una
       [ValueError](#class.valueerror). El partage de cookies entre las peticiones PHP
       puede llevar a una mezcla involuntaria de cookies sensibles entre los usuarios.



### Valores devueltos

Devuelve un [CurlSharePersistentHandle](#class.curlsharepersistenthandle).

### Errores/Excepciones

- Si share_options está vacío, esta función lanza
  una [ValueError](#class.valueerror).

- Si share*options contiene un valor que no corresponde
  a una \*\*[CURL_LOCK_DATA*\*](#constant.curl-lock-data-connect)\*\*,
  esta función lanza una [ValueError](#class.valueerror).

- Si share_options contiene
  **[CURL_LOCK_DATA_COOKIE](#constant.curl-lock-data-cookie)**, esta función lanza una
  [ValueError](#class.valueerror).

- Si share_options contiene un valor no entero,
  esta función lanza una [TypeError](#class.typeerror).

### Ejemplos

**Ejemplo #1 curl_share_init_persistent()** example

    Este ejemplo creará un gestor cURL "share" persistente y demostrará
    el partage de conexiones entre ellos. Si se ejecuta en un SAPI PHP
    de larga duración, $sh sobrevivirá entre las peticiones SAPI.





    &lt;?php

// Crear o recuperar un gestor cURL "share" persistente configurado para compartir las búsquedas DNS y las conexiones
$sh = curl_share_init_persistent([CURL_LOCK_DATA_DNS, CURL_LOCK_DATA_CONNECT]);

// Inicializa el primer gestor cURL y le asigna el gestor de partage
$ch1 = curl_init("http://example.com/");
curl_setopt($ch1, CURLOPT_SHARE, $sh);

// Ejecuta el primer gestor cURL. Esto puede reutilizar la conexión de una petición SAPI anterior
curl_exec($ch1);

// Inicializa el segundo gestor cURL y le asigna el gestor de partage
$ch2 = curl_init("http://example.com/");
curl_setopt($ch2, CURLOPT_SHARE, $sh);

// Ejecuta el segundo gestor cURL. Esto puede reutilizar la conexión de $ch1
curl_exec($ch2);

?&gt;

### Ver también

- [curl_setopt()](#function.curl-setopt) - Establece una opción para una transferencia cURL

- [curl_share_init()](#function.curl-share-init) - Inicializa un manejador compartido cURL

# curl_share_setopt

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

curl_share_setopt — Establece una opción del manejador compartido cURL

### Descripción

**curl_share_setopt**([CurlShareHandle](#class.curlsharehandle) $share_handle, [int](#language.types.integer) $option, [mixed](#language.types.mixed) $value): [bool](#language.types.boolean)

Establece una opción en el manejador compartido cURL proporcionado.

### Parámetros

share_handle
A cURL share handle returned by
[curl_share_init()](#function.curl-share-init).

    option


      Una de las constantes **[CURLSHOPT_*](#constant.curlshopt-none)**.






    value


      Una de las constantes **[CURL_LOCK_DATA_*](#constant.curl-lock-data-connect)**.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

share_handle expects a [CurlShareHandle](#class.curlsharehandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con curl_share_setopt()**



     Este ejemplo crea un manejador compartido cURL, añade dos manejadores
     cURL, y luego los ejecuta con cookies de datos compartidos.

&lt;?php
// Crea un manejador compartido cURL y lo define para compartir los cookies de datos
$sh = curl_share_init();
curl_share_setopt($sh, CURLSHOPT_SHARE, CURL_LOCK_DATA_COOKIE);

// Inicializa el primer manejador cURL y le asigna el manejador compartido
$ch1 = curl_init("http://example.com/");
curl_setopt($ch1, CURLOPT_SHARE, $sh);

// Ejecuta el primer manejador cURL
curl_exec($ch1);

// Inicializa el segundo manejador cURL y le asigna el manejador compartido
$ch2 = curl_init("http://php.net/");
curl_setopt($ch2, CURLOPT_SHARE, $sh);

// Ejecuta el segundo manejador cURL
// Todas las cookies del manejador $ch1 son compartidas con el manejador $ch2
curl_exec($ch2);
?&gt;

# curl_share_strerror

(PHP 7 &gt;= 7.1.0, PHP 8)

curl_share_strerror — Devuelve un string que describe el código de error proporcionado

### Descripción

**curl_share_strerror**([int](#language.types.integer) $error_code): [?](#language.types.null)[string](#language.types.string)

Devuelve un mensaje de error textual que describe el código de error proporcionado.

### Parámetros

    error_code


      Una de las constantes de los [» códigos de error cURL](http://curl.haxx.se/libcurl/c/libcurl-errors.html).


### Valores devueltos

Devuelve una descripción del error o **[null](#constant.null)** para los códigos de error inválidos.

### Ver también

- [curl_share_errno()](#function.curl-share-errno) - Devuelve el último número de error del gestor compartido cURL

- [curl_strerror()](#function.curl-strerror) - Devuelve la cadena descriptiva del código de error proporcionado

# curl_strerror

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

curl_strerror — Devuelve la cadena descriptiva del código de error proporcionado

### Descripción

**curl_strerror**([int](#language.types.integer) $error_code): [?](#language.types.null)[string](#language.types.string)

Devuelve el mensaje de error que describe el código de error proporcionado.

### Parámetros

    error_code


      Una constante entre las constantes
      [» de los códigos de error cURL](http://curl.haxx.se/libcurl/c/libcurl-errors.html).


### Valores devueltos

Devuelve la descripción del error o **[null](#constant.null)** para un código de error inválido.

### Ejemplos

    **Ejemplo #1 Ejemplo con [curl_errno()](#function.curl-errno)**

&lt;?php
// Crea un manejador curl con un error en el protocolo de la URL utilizada
$ch = curl_init("htp://example.com/");

// Envía la petición
curl_exec($ch);

// Verifica los errores y muestra el mensaje de error
if($errno = curl_errno($ch)) {
$error_message = curl_strerror($errno);
echo "Error cURL ({$errno}):\n {$error_message}";
}
?&gt;

    El ejemplo anterior mostrará:

Error cURL (1):
Unsupported protocol

### Ver también

    - [curl_errno()](#function.curl-errno) - Devuelve el último mensaje de error cURL

    - [curl_error()](#function.curl-error) - Devuelve un string que contiene el último mensaje de error cURL

    - [» Los códigos de error Curl](http://curl.haxx.se/libcurl/c/libcurl-errors.html)

# curl_unescape

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

curl_unescape — Decodifica la URL proporcionada

### Descripción

**curl_unescape**([CurlHandle](#class.curlhandle) $handle, [string](#language.types.string) $string): [string](#language.types.string)|[false](#language.types.singleton)

Esta función decodifica la URL proporcionada.

### Parámetros

handle
A cURL handle returned by
[curl_init()](#function.curl-init).

    string


      La URL codificada, a decodificar.


### Valores devueltos

Devuelve el string decodificado o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

handle expects a [CurlHandle](#class.curlhandle)
instance now; previously, a [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con [curl_escape()](#function.curl-escape)**

&lt;?php
// Creación de un manejador curl
$ch = curl_init('http://example.com/redirect.php');

// Envía una petición HTTP y sigue las redirecciones
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_exec($ch);

// Obtiene la última URL efectiva
$effective_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
// es decir, "http://example.com/show_location.php?loc=M%C3%BCnchen"

// Decodifica la URL
$effective_url_decoded = curl_unescape($ch, $effective_url);
// "http://example.com/show_location.php?loc=München"
?&gt;

### Notas

**Nota**:

    **curl_unescape()** no decodifica los símbolos "más" (+)
    en espacios, a diferencia de la función
    [urldecode()](#function.urldecode).

### Ver también

    - [curl_escape()](#function.curl-escape) - Codificar la cadena proporcionada para URL

    - [urlencode()](#function.urlencode) - Codifica como URL una cadena

    - [urldecode()](#function.urldecode) - Decodifica una cadena cifrada como URL

    - [rawurlencode()](#function.rawurlencode) - Codificar estilo URL de acuerdo al RFC 3986

    - [rawurldecode()](#function.rawurldecode) - Decodificar cadenas codificadas estilo URL

# curl_upkeep

(PHP 8 &gt;= 8.2.0)

curl_upkeep — Realiza los controles de mantenimiento de la conexión

### Descripción

**curl_upkeep**([CurlHandle](#class.curlhandle) $handle): [bool](#language.types.boolean)

Disponible si construido con libcurl &gt;= 7.62.0.

Algunos protocolos tienen mecanismos de "mantenimiento de la conexión".
Estos mecanismos generalmente envían tráfico sobre las conexiones existentes para mantenerlas vivas;
Esto permite, por ejemplo, evitar que las conexiones sean cerradas debido a firewalls demasiado celosos.

El mantenimiento de la conexión está actualmente disponible solo para las conexiones HTTP/2.
Una pequeña cantidad de tráfico es generalmente enviada para mantener una conexión viva.
HTTP/2 mantiene su conexión enviando una trama HTTP/2 PING.

### Parámetros

    handle

A cURL handle returned by
[curl_init()](#function.curl-init).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de curl_upkeep()**

&lt;?php
$url = "https://example.com";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_2_0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_UPKEEP_INTERVAL_MS, 200);
if (curl_exec($ch)) {
usleep(300);
var_dump(curl_upkeep($ch));
}
?&gt;

### Ver también

    - [curl_init()](#function.curl-init) - Inicializa una sesión cURL

# curl_version

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

curl_version — Devuelve la versión actual de cURL

### Descripción

**curl_version**(): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve información sobre la versión de cURL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array asociativo que contiene los siguientes elementos:

       Clave
       Descripción del valor






       version_number
       número de versión de cURL de 24 bits



       version
       número de versión de cURL, en forma de string



       ssl_version_number
       número de versión de OpenSSL de 24 bits



       ssl_version
       número de versión de OpenSSL, en forma de string



       libz_version
       número de versión de zlib, en forma de string



       host
       Información sobre el host en el que se construyó cURL



       age
        



       features
       Una máscara de constantes CURL_VERSION_*



       protocols
       Un array de nombres de protocolos soportados por cURL



       feature_list

        Un array asociativo de todas las funcionalidades de cURL conocidas, y si
        son soportadas (**[true](#constant.true)**) o no (**[false](#constant.false)**).





### Historial de cambios

      Versión
      Descripción






      8.4.0

       features_list añadido.




      8.0.0

       El argumento opcional age ha sido eliminado.




      7.4.0

       El argumento opcional age está deprecado;
       si se proporciona un valor, es ignorado.



### Ejemplos

    **Ejemplo #1 Ejemplo con curl_version()**



     Este ejemplo analiza las funcionalidades disponibles en la versión
     actual de cURL utilizando la máscara 'features'
     devuelta por la función **curl_version()**.

&lt;?php
// Obtiene la versión de cURL, en forma de array
$version = curl_version();

// Estos son los campos que pueden ser utilizados
// para verificar las funcionalidades presentes en cURL
$bitfields = Array(
'CURL_VERSION_IPV6',
'CURL_VERSION_KERBEROS4',
'CURL_VERSION_SSL',
'CURL_VERSION_LIBZ'
);

foreach($bitfields as $feature)
{
    echo $feature . ($version['features'] &amp; constant($feature) ? ' presente' : ' ausente');
echo PHP_EOL;
}
?&gt;

## Tabla de contenidos

- [curl_close](#function.curl-close) — Cierra una sesión CURL
- [curl_copy_handle](#function.curl-copy-handle) — Copia un recurso cURL con todas sus preferencias
- [curl_errno](#function.curl-errno) — Devuelve el último mensaje de error cURL
- [curl_error](#function.curl-error) — Devuelve un string que contiene el último mensaje de error cURL
- [curl_escape](#function.curl-escape) — Codificar la cadena proporcionada para URL
- [curl_exec](#function.curl-exec) — Ejecuta una sesión cURL
- [curl_getinfo](#function.curl-getinfo) — Obtiene información sobre una transferencia específica
- [curl_init](#function.curl-init) — Inicializa una sesión cURL
- [curl_multi_add_handle](#function.curl-multi-add-handle) — Añade un recurso cURL a un cURL múltiple
- [curl_multi_close](#function.curl-multi-close) — Eliminar todos los gestores cURL de un gestor múltiple
- [curl_multi_errno](#function.curl-multi-errno) — Devuelve el último número de error múltiple cURL
- [curl_multi_exec](#function.curl-multi-exec) — Ejecuta las subpeticiones de la sesión cURL
- [curl_multi_getcontent](#function.curl-multi-getcontent) — Devuelve el contenido obtenido con la opción CURLOPT_RETURNTRANSFER
- [curl_multi_info_read](#function.curl-multi-info-read) — Lee las informaciones sobre las transferencias actuales
- [curl_multi_init](#function.curl-multi-init) — Devuelve un nuevo cURL múltiple
- [curl_multi_remove_handle](#function.curl-multi-remove-handle) — Retira un manejador de un conjunto de manejadores cURL
- [curl_multi_select](#function.curl-multi-select) — Espera hasta que la lectura o la escritura sea posible para cualquier conexión de gestor cURL multi
- [curl_multi_setopt](#function.curl-multi-setopt) — Define una opción múltiple cURL
- [curl_multi_strerror](#function.curl-multi-strerror) — Devuelve la descripción de un código de error
- [curl_pause](#function.curl-pause) — Pone en pausa, o saca de la pausa una conexión
- [curl_reset](#function.curl-reset) — Reinicia todas las opciones de un manejador de sesión libcurl
- [curl_setopt](#function.curl-setopt) — Establece una opción para una transferencia cURL
- [curl_setopt_array](#function.curl-setopt-array) — Establece múltiples opciones para una transferencia cURL
- [curl_share_close](#function.curl-share-close) — Cierra un manejador compartido cURL
- [curl_share_errno](#function.curl-share-errno) — Devuelve el último número de error del gestor compartido cURL
- [curl_share_init](#function.curl-share-init) — Inicializa un manejador compartido cURL
- [curl_share_init_persistent](#function.curl-share-init-persistent) — Inicializa un gestor cURL "share" persistent
- [curl_share_setopt](#function.curl-share-setopt) — Establece una opción del manejador compartido cURL
- [curl_share_strerror](#function.curl-share-strerror) — Devuelve un string que describe el código de error proporcionado
- [curl_strerror](#function.curl-strerror) — Devuelve la cadena descriptiva del código de error proporcionado
- [curl_unescape](#function.curl-unescape) — Decodifica la URL proporcionada
- [curl_upkeep](#function.curl_upkeep) — Realiza los controles de mantenimiento de la conexión
- [curl_version](#function.curl-version) — Devuelve la versión actual de cURL

# La clase CurlHandle

(PHP 8)

## Introducción

    Una clase completamente opaca que reemplaza los recursos de tipo curl a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **CurlHandle**
     {

}

# La clase CurlMultiHandle

(PHP 8)

## Introducción

    Una clase completamente opaca que reemplaza los recursos de tipo curl_multi a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **CurlMultiHandle**
     {

}

# La clase CurlShareHandle

(PHP 8)

## Introducción

    Una clase completamente opaca que reemplaza los recursos de tipo curl_share a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **CurlShareHandle**
     {

}

# La clase CurlSharePersistentHandle

(PHP 8 &gt;= 8.5.0)

## Introducción

    Representa un gestor cURL "share" persistente.

## Sinopsis de la Clase

     final
     class **CurlSharePersistentHandle**
     {

    /* Propiedades */

     public
     readonly
     [array](#language.types.array)
      [$options](#curlsharepersistenthandle.props.options);

}

## Propiedades

     options

      Las cachés **[CURL_LOCK_DATA_*](#constant.curl-lock-data-connect)** compartidas entre las peticiones que utilizan este gestor.


# La clase CURLFile

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

## Introducción

    Esta clase o [CURLStringFile](#class.curlstringfile) debe ser utilizada para transferir un fichero
    con las constantes **[CURLOPT_POSTFIELDS](#constant.curlopt-postfields)**.




    La deserialización de las instancias **CURLFile** no está permitida.
    A partir de PHP 7.4.0, la serialización está prohibida en primer lugar.

## Sinopsis de la Clase

     class **CURLFile**
     {

    /* Propiedades */

     public
     [string](#language.types.string)
      [$name](#curlfile.props.name) = "";

    public
     [string](#language.types.string)
      [$mime](#curlfile.props.mime) = "";

    public
     [string](#language.types.string)
      [$postname](#curlfile.props.postname) = "";


    /* Métodos */

public [\_\_construct](#curlfile.construct)([string](#language.types.string) $filename, [?](#language.types.null)[string](#language.types.string) $mime_type = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $posted_filename = **[null](#constant.null)**)

    public [getFilename](#curlfile.getfilename)(): [string](#language.types.string)

public [getMimeType](#curlfile.getmimetype)(): [string](#language.types.string)
public [getPostFilename](#curlfile.getpostfilename)(): [string](#language.types.string)
public [setMimeType](#curlfile.setmimetype)([string](#language.types.string) $mime_type): [void](language.types.void.html)
public [setPostFilename](#curlfile.setpostfilename)([string](#language.types.string) $posted_filename): [void](language.types.void.html)

}

## Propiedades

     name


       Nombre del fichero a descargar.






     mime


       Tipo MIME del fichero (por omisión, application/octet-stream).






     postname


       El nombre del fichero en los datos descargados (por omisión, la propiedad
       name).





## Ver también

     -
      [curl_setopt()](#function.curl-setopt)


     - [CURLStringFile](#class.curlstringfile)

# CURLFile::\_\_construct

# curl_file_create

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

CURLFile::\_\_construct -- curl_file_create — Crea un objeto CURLFile

### Descripción

Estilo orientado a objetos

public **CURLFile::\_\_construct**([string](#language.types.string) $filename, [?](#language.types.null)[string](#language.types.string) $mime_type = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $posted_filename = **[null](#constant.null)**)

Estilo procedimental

**curl_file_create**([string](#language.types.string) $filename, [?](#language.types.null)[string](#language.types.string) $mime_type = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $posted_filename = **[null](#constant.null)**): [CURLFile](#class.curlfile)

Crea un objeto [CURLFile](#class.curlfile), utilizado para subir
un fichero con **[CURLOPT_POSTFIELDS](#constant.curlopt-postfields)**.

### Parámetros

    filename


      Ruta del fichero a subir.






    mime_type


      Tipo MIME del fichero.






    posted_filename


      Nombre del fichero a utilizar en los datos subidos.


### Valores devueltos

Devuelve un objeto [CURLFile](#class.curlfile).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       mime_type y posted_filename
       ahora son nulos; anteriormente su valor por omisión era 0.



### Ejemplos

**Ejemplo #1 Ejemplo con CURLFile::\_\_construct()**

Estilo orientado a objetos

&lt;?php
/_ http://example.com/upload.php:
&lt;?php var_dump($\_FILES); ?&gt;
_/

// Crea un manejador cURL
$ch = curl_init('http://example.com/upload.php');

// Crea un objeto CURLFile
$cfile = new CURLFile('cats.jpg','image/jpeg','test_name');

// Asigna los datos POST
$data = array('test_file' =&gt; $cfile);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Ejecuta el manejador
curl_exec($ch);
?&gt;

Estilo procedimental

&lt;?php
/_ http://example.com/upload.php:
&lt;?php var_dump($\_FILES); ?&gt;
_/

// Crea un manejador cURL
$ch = curl_init('http://example.com/upload.php');

// Crea un objeto CURLFile
$cfile = curl_file_create('cats.jpg','image/jpeg','test_name');

// Asigna los datos POST
$data = array('test_file' =&gt; $cfile);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Ejecuta el manejador
curl_exec($ch);
?&gt;

El ejemplo anterior mostrará:

array(1) {
["test_file"]=&gt;
array(5) {
["name"]=&gt;
string(9) "test_name"
["type"]=&gt;
string(10) "image/jpeg"
["tmp_name"]=&gt;
string(14) "/tmp/phpPC9Kbx"
["error"]=&gt;
int(0)
["size"]=&gt;
int(46334)
}
}

**Ejemplo #2 Ejemplo de subida de múltiples ficheros con CURLFile::\_\_construct()**

Estilo orientado a objetos

&lt;?php
$request = curl_init('http://www.example.com/upload.php');
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request, CURLOPT_SAFE_UPLOAD, true);
curl_setopt($request, CURLOPT_POSTFIELDS, [
'blob[0]' =&gt; new CURLFile(realpath('first-file.jpg'), 'image/jpeg'),
'blob[1]' =&gt; new CURLFile(realpath('second-file.txt'), 'text/plain'),
'blob[2]' =&gt; new CURLFile(realpath('third-file.exe'), 'application/octet-stream'),
]);
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

echo curl_exec($request);

var_dump(curl_getinfo($request));

Estilo procedimental

&lt;?php
// procedural
$request = curl_init('http://www.example.com/upload.php');
curl_setopt($request, CURLOPT_POST, true);
curl_setopt($request, CURLOPT_SAFE_UPLOAD, true);
curl_setopt($request, CURLOPT_POSTFIELDS, [
'blob[0]' =&gt; curl_file_create(realpath('first-file.jpg'), 'image/jpeg'),
'blob[1]' =&gt; curl_file_create(realpath('second-file.txt'), 'text/plain'),
'blob[2]' =&gt; curl_file_create(realpath('third-file.exe'), 'application/octet-stream'),
]);
curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

echo curl_exec($request);

var_dump(curl_getinfo($request));

El ejemplo anterior mostrará:

array(26) {
["url"]=&gt;
string(31) "http://www.example.com/upload.php"
["content_type"]=&gt;
string(24) "text/html; charset=UTF-8"
["http_code"]=&gt;
int(200)
["header_size"]=&gt;
int(198)
["request_size"]=&gt;
int(196)
["filetime"]=&gt;
int(-1)
["ssl_verify_result"]=&gt;
int(0)
["redirect_count"]=&gt;
int(0)
["total_time"]=&gt;
float(0.060062)
["namelookup_time"]=&gt;
float(0.028575)
["connect_time"]=&gt;
float(0.029011)
["pretransfer_time"]=&gt;
float(0.029121)
["size_upload"]=&gt;
float(3230730)
["size_download"]=&gt;
float(811)
["speed_download"]=&gt;
float(13516)
["speed_upload"]=&gt;
float(53845500)
["download_content_length"]=&gt;
float(811)
["upload_content_length"]=&gt;
float(3230730)
["starttransfer_time"]=&gt;
float(0.030355)
["redirect_time"]=&gt;
float(0)
["redirect_url"]=&gt;
string(0) ""
["primary_ip"]=&gt;
string(13) "0.0.0.0"
["certinfo"]=&gt;
array(0) {
}
["primary_port"]=&gt;
int(80)
["local_ip"]=&gt;
string(12) "0.0.0.0"
["local_port"]=&gt;
int(34856)
}

### Ver también

    - [curl_setopt()](#function.curl-setopt) - Establece una opción para una transferencia cURL

# CURLFile::getFilename

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

CURLFile::getFilename — Obtiene el nombre del fichero

### Descripción

public **CURLFile::getFilename**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del fichero.

# CURLFile::getMimeType

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

CURLFile::getMimeType — Obtiene el tipo MIME

### Descripción

public **CURLFile::getMimeType**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tipo MIME.

# CURLFile::getPostFilename

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

CURLFile::getPostFilename — Obtiene el nombre de fichero para POST

### Descripción

public **CURLFile::getPostFilename**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del fichero para POST.

# CURLFile::setMimeType

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

CURLFile::setMimeType — Define el tipo MIME

### Descripción

public **CURLFile::setMimeType**([string](#language.types.string) $mime_type): [void](language.types.void.html)

### Parámetros

    mime_type


      Tipo MIME a utilizar en los datos POST.


### Valores devueltos

No se retorna ningún valor.

# CURLFile::setPostFilename

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

CURLFile::setPostFilename — Define el nombre del fichero para POST

### Descripción

public **CURLFile::setPostFilename**([string](#language.types.string) $posted_filename): [void](language.types.void.html)

### Parámetros

    posted_filename


      Nombre del fichero a utilizar para los datos POST.


### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [CURLFile::\_\_construct](#curlfile.construct) — Crea un objeto CURLFile
- [CURLFile::getFilename](#curlfile.getfilename) — Obtiene el nombre del fichero
- [CURLFile::getMimeType](#curlfile.getmimetype) — Obtiene el tipo MIME
- [CURLFile::getPostFilename](#curlfile.getpostfilename) — Obtiene el nombre de fichero para POST
- [CURLFile::setMimeType](#curlfile.setmimetype) — Define el tipo MIME
- [CURLFile::setPostFilename](#curlfile.setpostfilename) — Define el nombre del fichero para POST

# La clase CURLStringFile

(PHP 8 &gt;= 8.1.0)

## Introducción

    **CURLStringFile** hace posible subir un archivo directamente desde una variable.
    Esto es similar a [CURLFile](#class.curlfile), pero funciona con los contenidos del archivo, no con su nombre.
    Esta clase o [CURLFile](#class.curlfile) deberían ser utilizadas para subir los contenidos del archivo con **[CURLOPT_POSTFIELDS](#constant.curlopt-postfields)**.

## Sinopsis de la Clase

     class **CURLStringFile**
     {

    /* Propiedades */

     public
     [string](#language.types.string)
      [$data](#curlstringfile.props.data);

    public
     [string](#language.types.string)
      [$postname](#curlstringfile.props.postname);

    public
     [string](#language.types.string)
      [$mime](#curlstringfile.props.mime);


    /* Métodos */

public [\_\_construct](#curlstringfile.construct)([string](#language.types.string) $data, [string](#language.types.string) $postname, [string](#language.types.string) $mime = "application/octet-stream")

}

## Propiedades

     data

      Los contenidos a ser subidos.





     postname

      El nombre del archivo a ser utilizado en los datos subidos.





     mime

      El tipo MIME del archivo (por defecto es application/octet-stream).




## Ver también

     -
      [curl_setopt()](#function.curl-setopt)


     - [CURLFile](#class.curlfile)

# CURLStringFile::\_\_construct

(PHP 8 &gt;= 8.1.0)

CURLStringFile::\_\_construct — Crea un objeto CURLStringFile

### Descripción

public **CURLStringFile::\_\_construct**([string](#language.types.string) $data, [string](#language.types.string) $postname, [string](#language.types.string) $mime = "application/octet-stream")

Crea un objeto [CURLStringFile](#class.curlstringfile), utilizado para subir un archivo con **[CURLOPT_POSTFIELDS](#constant.curlopt-postfields)**.

### Parámetros

    data


      Los contenidos a ser subidos.






    postname


      El nombre del archivo a ser utilizado en los datos subidos.






    mime


      El tipo MIME del archivo (por defecto es application/octet-stream).


### Ejemplos

**Ejemplo #1 Ejemplo con CURLStringFile::\_\_construct()**

&lt;?php
/_ http://example.com/upload.php:
&lt;?php
var_dump($_FILES);
var_dump(file_get_contents($\_FILES['test_string']['tmp_name']));
?&gt;
_/

// Crear un recurso cURL
$ch = curl_init('http://example.com/upload.php');

// Crear un objeto CURLStringFile
$cstringfile = new CURLStringFile('test upload contents','test.txt','text/plain');

// Asignar los datos POST
$data = array('test_string' =&gt; $cstringfile);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Ejecutar el recurso
curl_exec($ch);
?&gt;

El ejemplo anterior mostrará:

array(1) {
["test_string"]=&gt;
array(5) {
["name"]=&gt;
string(8) "test.txt"
["type"]=&gt;
string(10) "text/plain"
["tmp_name"]=&gt;
string(14) "/tmp/phpTtaoCz"
["error"]=&gt;
int(0)
["size"]=&gt;
int(20)
}
}
string(20) "test upload contents"

### Ver también

    - [curl_setopt()](#function.curl-setopt) - Establece una opción para una transferencia cURL

## Tabla de contenidos

- [CURLStringFile::\_\_construct](#curlstringfile.construct) — Crea un objeto CURLStringFile

- [Introducción](#intro.curl)
- [Instalación/Configuración](#curl.setup)<li>[Requerimientos](#curl.requirements)
- [Instalación](#curl.installation)
- [Configuración en tiempo de ejecución](#curl.configuration)
- [Tipos de recursos](#curl.resources)
  </li>- [Constantes predefinidas](#curl.constants)
- [Ejemplos](#curl.examples)<li>[Ejemplo con curl](#curl.examples-basic)
  </li>- [Funciones de cURL](#ref.curl)<li>[curl_close](#function.curl-close) — Cierra una sesión CURL
- [curl_copy_handle](#function.curl-copy-handle) — Copia un recurso cURL con todas sus preferencias
- [curl_errno](#function.curl-errno) — Devuelve el último mensaje de error cURL
- [curl_error](#function.curl-error) — Devuelve un string que contiene el último mensaje de error cURL
- [curl_escape](#function.curl-escape) — Codificar la cadena proporcionada para URL
- [curl_exec](#function.curl-exec) — Ejecuta una sesión cURL
- [curl_getinfo](#function.curl-getinfo) — Obtiene información sobre una transferencia específica
- [curl_init](#function.curl-init) — Inicializa una sesión cURL
- [curl_multi_add_handle](#function.curl-multi-add-handle) — Añade un recurso cURL a un cURL múltiple
- [curl_multi_close](#function.curl-multi-close) — Eliminar todos los gestores cURL de un gestor múltiple
- [curl_multi_errno](#function.curl-multi-errno) — Devuelve el último número de error múltiple cURL
- [curl_multi_exec](#function.curl-multi-exec) — Ejecuta las subpeticiones de la sesión cURL
- [curl_multi_getcontent](#function.curl-multi-getcontent) — Devuelve el contenido obtenido con la opción CURLOPT_RETURNTRANSFER
- [curl_multi_info_read](#function.curl-multi-info-read) — Lee las informaciones sobre las transferencias actuales
- [curl_multi_init](#function.curl-multi-init) — Devuelve un nuevo cURL múltiple
- [curl_multi_remove_handle](#function.curl-multi-remove-handle) — Retira un manejador de un conjunto de manejadores cURL
- [curl_multi_select](#function.curl-multi-select) — Espera hasta que la lectura o la escritura sea posible para cualquier conexión de gestor cURL multi
- [curl_multi_setopt](#function.curl-multi-setopt) — Define una opción múltiple cURL
- [curl_multi_strerror](#function.curl-multi-strerror) — Devuelve la descripción de un código de error
- [curl_pause](#function.curl-pause) — Pone en pausa, o saca de la pausa una conexión
- [curl_reset](#function.curl-reset) — Reinicia todas las opciones de un manejador de sesión libcurl
- [curl_setopt](#function.curl-setopt) — Establece una opción para una transferencia cURL
- [curl_setopt_array](#function.curl-setopt-array) — Establece múltiples opciones para una transferencia cURL
- [curl_share_close](#function.curl-share-close) — Cierra un manejador compartido cURL
- [curl_share_errno](#function.curl-share-errno) — Devuelve el último número de error del gestor compartido cURL
- [curl_share_init](#function.curl-share-init) — Inicializa un manejador compartido cURL
- [curl_share_init_persistent](#function.curl-share-init-persistent) — Inicializa un gestor cURL "share" persistent
- [curl_share_setopt](#function.curl-share-setopt) — Establece una opción del manejador compartido cURL
- [curl_share_strerror](#function.curl-share-strerror) — Devuelve un string que describe el código de error proporcionado
- [curl_strerror](#function.curl-strerror) — Devuelve la cadena descriptiva del código de error proporcionado
- [curl_unescape](#function.curl-unescape) — Decodifica la URL proporcionada
- [curl_upkeep](#function.curl_upkeep) — Realiza los controles de mantenimiento de la conexión
- [curl_version](#function.curl-version) — Devuelve la versión actual de cURL
  </li>- [CurlHandle](#class.curlhandle) — La clase CurlHandle
- [CurlMultiHandle](#class.curlmultihandle) — La clase CurlMultiHandle
- [CurlShareHandle](#class.curlsharehandle) — La clase CurlShareHandle
- [CurlSharePersistentHandle](#class.curlsharepersistenthandle) — La clase CurlSharePersistentHandle
- [CURLFile](#class.curlfile) — La clase CURLFile<li>[CURLFile::\_\_construct](#curlfile.construct) — Crea un objeto CURLFile
- [CURLFile::getFilename](#curlfile.getfilename) — Obtiene el nombre del fichero
- [CURLFile::getMimeType](#curlfile.getmimetype) — Obtiene el tipo MIME
- [CURLFile::getPostFilename](#curlfile.getpostfilename) — Obtiene el nombre de fichero para POST
- [CURLFile::setMimeType](#curlfile.setmimetype) — Define el tipo MIME
- [CURLFile::setPostFilename](#curlfile.setpostfilename) — Define el nombre del fichero para POST
  </li>- [CURLStringFile](#class.curlstringfile) — La clase CURLStringFile<li>[CURLStringFile::__construct](#curlstringfile.construct) — Crea un objeto CURLStringFile
  </li>
