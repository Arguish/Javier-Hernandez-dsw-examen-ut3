# Protocolo Ligero de Acceso a Directorios

# Introducción

LDAP significa: Lightweight Directory Access Protocol
(Protocolo ligero de acceso a directorios). Es un protocolo
utilizado para acceder a los "servidores de directorios". Estos servidores
son bases de datos particulares, que almacenan la información
en forma de árbol jerárquico.

El concepto de árbol jerárquico es similar al de la estructura de su
sistema de archivos, salvo que en este contexto, la raíz
se denomina "el mundo", y el primer nivel de subcarpeta
se denomina "país". Los niveles inferiores son "compañías"
"organización" o "lugares", y aún más abajo, se encuentran
"personas" e incluso "equipos" y "documentos".

Para identificar un archivo en su disco, se utiliza una ruta tal
como

/usr/local/mon_application/documents

La barra indica una división en la referencia, y la secuencia se lee de
izquierda a derecha.

El equivalente de una referencia global en LDAP se denomina
un "nombre distinguido" ("distinguished name"), también llamado "dn". Un ejemplo de
dn sería:

cn=Jean Dupond,ou=Comptabilité,o=Ma Compagnie,c=FR

La coma marca la separación de cada división como referencia, y la
secuencia se lee de derecha a izquierda. Por lo tanto, debe leerse:

country = FR
organization = Ma Compagnie
organizationalUnit = Comptabilité
commonName = Jean Dupond

De la misma manera que no existe una regla obligatoria sobre
cómo organizar los archivos en un disco duro, un administrador de servidor de directorios puede organizar el servidor
como le parezca más práctico. Sin embargo, existen convenciones a utilizar. El principio es que no se puede acceder a un servidor de directorios a menos que se
conozca su estructura, de la misma manera que no se puede escribir una base de datos sin conocer sus tablas y bases.

Se dispone de mucha más información en las siguientes URL (en inglés):

- [» Mozilla](https://wiki.mozilla.org/Directory)

- [» El proyecto OpenLDAP](http://www.openldap.org/)

- Internet Engineering Taskforce RFCs
  [» 4510](https://datatracker.ietf.org/doc/html/rfcrfc4510) a [» 4519](https://datatracker.ietf.org/doc/html/rfcrfc4519).

El SDK de Netscape contiene una guía del programador
([» Programmer's Guide](https://wiki.mozilla.org/Mozilla_LDAP_SDK_Programmer%27s_Guide))
muy útil, en formato HTML (y en inglés).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#ldap.requirements)
- [Instalación](#ldap.installation)
- [Configuración en tiempo de ejecución](#ldap.configuration)
- [Tipos de recursos](#ldap.resources)

    ## Requerimientos

    Es necesario descargar y compilar las bibliotecas clientes LDAP desde
    [» OpenLDAP](https://www.openldap.org/software/download/) o [» Bind9.net](http://www.bind9.net/download-openldap/) para asegurar el soporte LDAP.
    Para PHP 5.6 o versiones posteriores, se requiere OpenLDAP 2.4 o versiones posteriores.

## Instalación

El soporte LDAP de PHP no está activado por omisión. Se debe
utilizar la opción de configuración
**--with-ldap[=DIR]**
al compilar PHP, donde DIR es el directorio de instalación del servidor LDAP.
Para activar el soporte SASL, asegúrese de que la opción de configuración
**--with-ldap-sasl[=DIR]** sea utilizada y que
el fichero sasl.h exista en el sistema.

**Nota**:
**Nota para usuarios Win32**

Para hacer funcionar esta extensión, algunas bibliotecas
DLL deben estar disponibles a través del
PATH del sistema Windows. Lea la
F.A.Q titulada
"[Cómo agregar mi carpeta
PHP a mi PATH de Windows](#faq.installation.addtopath)" para más información. Copiar las bibliotecas DLL desde la
carpeta PHP a la carpeta del sistema de Windows también funciona (ya que la carpeta del sistema está por defecto en el
PATH del sistema), pero este método no es recomendado.
_Esta extensión requiere que los siguientes archivos estén en el
PATH:_
libeay32.dll y
ssleay32.dll, o, desde OpenSSL 1.1
libcrypto-_.dll y libssl-_.dll

Para poder utilizar las bibliotecas Oracle LDAP, un
[entorno Oracle](#oci8.requirements)
adecuado debe ser definido.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de LDAP**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [ldap.max_links](#ini.ldap.max_links)
      "-1"
      **[INI_SYSTEM](#constant.ini-system)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     ldap.max_links
     [integer](#language.types.integer)



      El número máximo de conexiones LDAP por proceso.


## Tipos de recursos

Antes de PHP 8.1.0, la mayoría de las funciones LDAP operan sobre recursos devueltos por
las funciones LDAP (por ejemplo, [ldap_connect()](#function.ldap-connect) devuelve
un identificador de enlace LDAP positivo requerido por varias funciones LDAP).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[LDAP_DEREF_NEVER](#constant.ldap-deref-never)**
    ([int](#language.types.integer))



     Regla de desreferenciación de alias - Nunca.





    **[LDAP_DEREF_SEARCHING](#constant.ldap-deref-searching)**
    ([int](#language.types.integer))



     Regla de desreferenciación de alias - Buscar.





    **[LDAP_DEREF_FINDING](#constant.ldap-deref-finding)**
    ([int](#language.types.integer))



     Regla de desreferenciación de alias - Encontrar.





    **[LDAP_DEREF_ALWAYS](#constant.ldap-deref-always)**
    ([int](#language.types.integer))



     Regla de desreferenciación de alias - Siempre.





    **[LDAP_OPT_DEREF](#constant.ldap-opt-deref)**
    ([int](#language.types.integer))



     Aplica reglas alternativas para seguir los alias en el servidor.





    **[LDAP_OPT_SIZELIMIT](#constant.ldap-opt-sizelimit)**
    ([int](#language.types.integer))



     Especifica el número máximo de entradas que pueden ser devueltas
     de una posición de búsqueda.



    **Nota**:

      El límite real también puede ser dado del lado del servidor.
      El más pequeño de los dos será el utilizado.








    **[LDAP_OPT_TIMELIMIT](#constant.ldap-opt-timelimit)**
    ([int](#language.types.integer))



     Especifica el número de segundos a esperar los resultados de búsqueda.

    **Nota**:

      El límite real también puede ser dado del lado del servidor.
      El más pequeño de los dos será el utilizado.








    **[LDAP_OPT_NETWORK_TIMEOUT](#constant.ldap-opt-network-timeout)**
    ([int](#language.types.integer))



     Opción para [ldap_set_option()](#function.ldap-set-option) que permite definir el timeout.
     (Disponible desde PHP 5.3.0)





    **[LDAP_OPT_PROTOCOL_VERSION](#constant.ldap-opt-protocol-version)**
    ([int](#language.types.integer))



     Especifica la versión del protocolo LDAP a utilizar (V2 o V3).





    **[LDAP_OPT_ERROR_NUMBER](#constant.ldap-opt-error-number)**
    ([int](#language.types.integer))



     Último número de error de sesión.





    **[LDAP_OPT_REFERRALS](#constant.ldap-opt-referrals)**
    ([int](#language.types.integer))



     Especifica si se deben o no seguir los referentes devueltos por el servidor.





    **[LDAP_OPT_RESTART](#constant.ldap-opt-restart)**
    ([int](#language.types.integer))



     Determina si la conexión debe o no ser reiniciada implícitamente.





    **[LDAP_OPT_HOST_NAME](#constant.ldap-opt-host-name)**
    ([int](#language.types.integer))



     Define/obtiene los hosts separados por un espacio cuando se intenta conectar.





    **[LDAP_OPT_ERROR_STRING](#constant.ldap-opt-error-string)**
    ([int](#language.types.integer))



     Alias de **[LDAP_OPT_DIAGNOSTIC_MESSAGE](#constant.ldap-opt-diagnostic-message)**.





    **[LDAP_OPT_DIAGNOSTIC_MESSAGE](#constant.ldap-opt-diagnostic-message)**
    ([int](#language.types.integer))



     Obtiene el último mensaje de error de sesión.





    **[LDAP_OPT_MATCHED_DN](#constant.ldap-opt-matched-dn)**
    ([int](#language.types.integer))



     Define/obtiene el DN asociado correspondiente a la conexión.





    **[LDAP_OPT_SERVER_CONTROLS](#constant.ldap-opt-server-controls)**
    ([int](#language.types.integer))



     Especifica una lista de controles de servidor a enviar con cada petición.





    **[LDAP_OPT_CLIENT_CONTROLS](#constant.ldap-opt-client-controls)**
    ([int](#language.types.integer))



     Especifica una lista de controles de cliente a enviar con cada petición.





    **[LDAP_OPT_DEBUG_LEVEL](#constant.ldap-opt-debug-level)**
    ([int](#language.types.integer))



     Especifica un nivel para las trazas de depuración, en forma de máscara de bits.





    **[LDAP_OPT_X_KEEPALIVE_IDLE](#constant.ldap-opt-x-keepalive-idle)**
    ([int](#language.types.integer))



     Especifica el número de segundos durante los cuales una conexión debe permanecer
     inactiva antes de que TCP comience a enviar sondas KeepAlive.





    **[LDAP_OPT_X_KEEPALIVE_PROBES](#constant.ldap-opt-x-keepalive-probes)**
    ([int](#language.types.integer))



     Especifica el número máximo de sondas KeepAlive que TCP debe enviar antes
     de eliminar la conexión.





    **[LDAP_OPT_X_KEEPALIVE_INTERVAL](#constant.ldap-opt-x-keepalive-interval)**
    ([int](#language.types.integer))



     Especifica el intervalo en segundos entre dos sondas KeepAlive.





    **[LDAP_OPT_X_TLS_CACERTDIR](#constant.ldap-opt-x-tls-cacertdir)**
    ([int](#language.types.integer))



     Especifica la ruta de acceso del directorio que contiene los certificados
     de autoridad de certificación.





    **[LDAP_OPT_X_TLS_CACERTFILE](#constant.ldap-opt-x-tls-cacertfile)**
    ([int](#language.types.integer))



     Especifica la ruta de acceso completa del archivo de certificado de
     la autoridad de certificación.





    **[LDAP_OPT_X_TLS_CERTFILE](#constant.ldap-opt-x-tls-certfile)**
    ([int](#language.types.integer))



     Especifica la ruta de acceso completa del archivo de certificado.





    **[LDAP_OPT_X_TLS_CIPHER_SUITE](#constant.ldap-opt-x-tls-cipher-suite)**
    ([int](#language.types.integer))



     Especifica la suite de cifrado autorizada.





    **[LDAP_OPT_X_TLS_CRLCHECK](#constant.ldap-opt-x-tls-crlcheck)**
    ([int](#language.types.integer))



     Especifica la estrategia de evaluación de las CRL. Debe ser una de las siguientes: **[LDAP_OPT_X_TLS_CRL_NONE](#constant.ldap-opt-x-tls-crl-none)**, **[LDAP_OPT_X_TLS_CRL_PEER](#constant.ldap-opt-x-tls-crl-peer)**, **[LDAP_OPT_X_TLS_CRL_ALL](#constant.ldap-opt-x-tls-crl-all)**.

    **Nota**:

      Solo válido para OpenSSL.








    **[LDAP_OPT_X_TLS_CRLFILE](#constant.ldap-opt-x-tls-crlfile)**
    ([int](#language.types.integer))



     Especifica la ruta de acceso completa del archivo CRL.

    **Nota**:

      Solo válido para GnuTLS.








    **[LDAP_OPT_X_TLS_DHFILE](#constant.ldap-opt-x-tls-dhfile)**
    ([int](#language.types.integer))



     Especifica la ruta de acceso completa del archivo que contiene los parámetros del intercambio de claves efímeras Diffie-Hellman.

    **Nota**:

      Esta opción es ignorada por GnuTLS y Mozilla NSS.








    **[LDAP_OPT_X_TLS_KEYFILE](#constant.ldap-opt-x-tls-keyfile)**
    ([int](#language.types.integer))



     Especifica la ruta de acceso completa del archivo de clave del certificado.





    **[LDAP_OPT_X_TLS_PROTOCOL_MIN](#constant.ldap-opt-x-tls-protocol-min)**
    ([int](#language.types.integer))



     Especifica la versión mínima del protocolo. Puede ser una de las siguientes: **[LDAP_OPT_X_TLS_PROTOCOL_SSL2](#constant.ldap-opt-x-tls-protocol-ssl2)**, **[LDAP_OPT_X_TLS_PROTOCOL_SSL3](#constant.ldap-opt-x-tls-protocol-ssl3)**, **[LDAP_OPT_X_TLS_PROTOCOL_TLS1_0](#constant.ldap-opt-x-tls-protocol-tls1-0)**, **[LDAP_OPT_X_TLS_PROTOCOL_TLS1_1](#constant.ldap-opt-x-tls-protocol-tls1-1)**, **[LDAP_OPT_X_TLS_PROTOCOL_TLS1_2](#constant.ldap-opt-x-tls-protocol-tls1-2)**





    **[LDAP_OPT_X_TLS_RANDOM_FILE](#constant.ldap-opt-x-tls-random-file)**
    ([int](#language.types.integer))



     Define/obtiene el archivo aleatorio cuando uno de los valores por defecto del sistema no está disponible.





    **[LDAP_OPT_X_TLS_REQUIRE_CERT](#constant.ldap-opt-x-tls-require-cert)**
    ([int](#language.types.integer))



     Especifica la estrategia de verificación de certificados. Debe ser una
     de las siguientes: **[LDAP_OPT_X_TLS_NEVER](#constant.ldap-opt-x-tls-never)**, **[LDAP_OPT_X_TLS_HARD](#constant.ldap-opt-x-tls-hard)**, **[LDAP_OPT_X_TLS_DEMAND](#constant.ldap-opt-x-tls-demand)**,

**[LDAP_OPT_X_TLS_ALLOW](#constant.ldap-opt-x-tls-allow)**, **[LDAP_OPT_X_TLS_TRY](#constant.ldap-opt-x-tls-try)**.
(Disponible a partir de PHP 7.0.0)

    **[GSLC_SSL_NO_AUTH](#constant.gslc-ssl-no-auth)**
    ([int](#language.types.integer))



     Modo de autenticación SSL - No se requiere autenticación. (solo
     para Oracle LDAP)





    **[GSLC_SSL_ONEWAY_AUTH](#constant.gslc-ssl-oneway-auth)**
    ([int](#language.types.integer))



     Modo de autenticación SSL - Solo se requiere autenticación del servidor. (solo
     para Oracle LDAP)





    **[GSLC_SSL_TWOWAY_AUTH](#constant.gslc-ssl-twoway-auth)**
    ([int](#language.types.integer))



     Modo de autenticación SSL - Se requiere autenticación del servidor y del cliente. (solo
     para Oracle LDAP)





    **[LDAP_EXOP_START_TLS](#constant.ldap-exop-start-tls)**
    ([string](#language.types.string))



     Constantes de operaciones extendidas - Iniciar TLS ([» RFC 4511](https://datatracker.ietf.org/doc/html/rfc4511)).





    **[LDAP_EXOP_MODIFY_PASSWD](#constant.ldap-exop-modify-passwd)**
    ([string](#language.types.string))



     Constantes de operaciones extendidas - Modificar la contraseña ([» RFC 3062](https://datatracker.ietf.org/doc/html/rfc3062)).





    **[LDAP_EXOP_REFRESH](#constant.ldap-exop-refresh)**
    ([string](#language.types.string))



     Constantes de operaciones extendidas - Actualizar ([» RFC 2589](https://datatracker.ietf.org/doc/html/rfc2589)).





    **[LDAP_EXOP_WHO_AM_I](#constant.ldap-exop-who-am-i)**
    ([string](#language.types.string))



     Constantes de operaciones extendidas - WHOAMI ([» RFC 4532](https://datatracker.ietf.org/doc/html/rfc4532)).





    **[LDAP_EXOP_TURN](#constant.ldap-exop-turn)**
    ([string](#language.types.string))



     Constantes de operaciones extendidas - Girar ([» RFC 4531](https://datatracker.ietf.org/doc/html/rfc4531)).






    **[LDAP_CONTROL_MANAGEDSAIT](#constant.ldap-control-managedsait)**
    ([string](#language.types.string))



     Constante de control - Gestionar DSA IT ([» RFC 3296](https://datatracker.ietf.org/doc/html/rfc3296)).
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_PROXY_AUTHZ](#constant.ldap-control-proxy-authz)**
    ([string](#language.types.string))



     Constante de control - Autorización por Procuración ([» RFC 4370](https://datatracker.ietf.org/doc/html/rfc4730)).
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_SUBENTRIES](#constant.ldap-control-subentries)**
    ([string](#language.types.string))



     Constante de control - Subentrada ([» RFC 3672](https://datatracker.ietf.org/doc/html/rfc3672)).
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_VALUESRETURNFILTER](#constant.ldap-control-valuesreturnfilter)**
    ([string](#language.types.string))



     Constante de control - Filtro de valor devuelto ([» RFC 3876](https://datatracker.ietf.org/doc/html/rfc3876)).
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_ASSERT](#constant.ldap-control-assert)**
    ([string](#language.types.string))



     Constante de control - Afirmación ([» RFC 4528](https://datatracker.ietf.org/doc/html/rfc45282)).
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_PRE_READ](#constant.ldap-control-pre-read)**
    ([string](#language.types.string))



     Constante de control - Antes de leer ([» RFC 4527](https://datatracker.ietf.org/doc/html/rfc4527)).
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_POST_READ](#constant.ldap-control-post-read)**
    ([string](#language.types.string))



     Constante de control - Después de leer ([» RFC 4527](https://datatracker.ietf.org/doc/html/rfc4527)).
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_SORTREQUEST](#constant.ldap-control-sortrequest)**
    ([string](#language.types.string))



     Constante de control - Solicitud de ordenación ([» RFC 2891](https://datatracker.ietf.org/doc/html/rfc2891)).
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_SORTRESPONSE](#constant.ldap-control-sortresponse)**
    ([string](#language.types.string))



     Constante de control - Respuesta de ordenación ([» RFC 2891](https://datatracker.ietf.org/doc/html/rfc2891)).
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_PAGEDRESULTS](#constant.ldap-control-pagedresults)**
    ([string](#language.types.string))



     Constante de control - Resultados paginados ([» RFC 2696](https://datatracker.ietf.org/doc/html/rfc2696)).
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_AUTHZID_REQUEST](#constant.ldap-control-authzid-request)**
    ([string](#language.types.string))



     Constante de control - Solicitud de Autorización de Identidad ([» RFC 3829](https://datatracker.ietf.org/doc/html/rfc3829)).
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_AUTHZID_RESPONSE](#constant.ldap-control-authzid-response)**
    ([string](#language.types.string))



     Constante de control - Respuesta de Autorización de Identidad ([» RFC 3829](https://datatracker.ietf.org/doc/html/rfc3829)).
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_SYNC](#constant.ldap-control-sync)**
    ([string](#language.types.string))



     Constante de control - Operación de sincronización de contenido ([» RFC 4533](https://datatracker.ietf.org/doc/html/rfc4533)).
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_SYNC_STATE](#constant.ldap-control-sync-state)**
    ([string](#language.types.string))



     Constante de control - Estado de la operación de sincronización de contenido ([» RFC 4533](https://datatracker.ietf.org/doc/html/rfc4533)).
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_SYNC_DONE](#constant.ldap-control-sync-done)**
    ([string](#language.types.string))



     Constante de control - Operación de sincronización de contenido completada ([» RFC 4533](https://datatracker.ietf.org/doc/html/rfc4533)).
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_DONTUSECOPY](#constant.ldap-control-dontusecopy)**
    ([string](#language.types.string))



     Constante de control - No usar Copiar ([» RFC 6171](https://datatracker.ietf.org/doc/html/rfc6171)).
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_PASSWORDPOLICYREQUEST](#constant.ldap-control-passwordpolicyrequest)**
    ([string](#language.types.string))



     Constante de control - Solicitud de la política de contraseña.
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_PASSWORDPOLICYRESPONSE](#constant.ldap-control-passwordpolicyresponse)**
    ([string](#language.types.string))



     Constante de control - Respuesta de la política de contraseña.
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_X_INCREMENTAL_VALUES](#constant.ldap-control-x-incremental-values)**
    ([string](#language.types.string))



     Constante de control - Valores incrementales del directorio activo.
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_X_DOMAIN_SCOPE](#constant.ldap-control-x-domain-scope)**
    ([string](#language.types.string))



     Constante de control - Alcance del dominio del directorio activo
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_X_PERMISSIVE_MODIFY](#constant.ldap-control-x-permissive-modify)**
    ([string](#language.types.string))



     Constante de control - Permiso de modificación del directorio activo.
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_X_SEARCH_OPTIONS](#constant.ldap-control-x-search-options)**
    ([string](#language.types.string))



     Constante de control - Opción de búsqueda del directorio activo.
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_X_TREE_DELETE](#constant.ldap-control-x-tree-delete)**
    ([string](#language.types.string))



     Constante de control - Eliminación del árbol del directorio activo.
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_X_EXTENDED_DN](#constant.ldap-control-x-extended-dn)**
    ([string](#language.types.string))



     Constante de control - Directorio activo DN extendido.
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_VLVREQUEST](#constant.ldap-control-vlvrequest)**
    ([string](#language.types.string))



     Constante de control - Lista virtual de solicitud de vista.
     Disponible a partir de PHP 7.3.0.





    **[LDAP_CONTROL_VLVRESPONSE](#constant.ldap-control-vlvresponse)**
    ([string](#language.types.string))



     Constante de control - Lista virtual de respuesta de vista.
     Disponible a partir de PHP 7.3.0.





    **[LDAP_ESCAPE_DN](#constant.ldap-escape-dn)**
    ([int](#language.types.integer))



     Escapar una cadena de caracteres para su uso en un DN LDAP.





    **[LDAP_ESCAPE_FILTER](#constant.ldap-escape-filter)**
    ([int](#language.types.integer))



     Escapar una cadena de caracteres para su uso en un filtro LDAP.






    **[LDAP_MODIFY_BATCH_ATTRIB](#constant.ldap-modify-batch-attrib)**
    ([string](#language.types.string))



     La clave del array de modificaciones que contiene los atributos:
     attrib.





    **[LDAP_MODIFY_BATCH_MODTYPE](#constant.ldap-modify-batch-modtype)**
    ([string](#language.types.string))



     La clave del array de modificaciones que contiene el tipo de modificación:
     modtype.





    **[LDAP_MODIFY_BATCH_VALUES](#constant.ldap-modify-batch-values)**
    ([string](#language.types.string))



     La clave del array de modificaciones que contiene los valores:
     values.






    **[LDAP_MODIFY_BATCH_ADD](#constant.ldap-modify-batch-add)**
    ([int](#language.types.integer))



     Añadir valores a un atributo de una entrada LDAP.





    **[LDAP_MODIFY_BATCH_REMOVE](#constant.ldap-modify-batch-remove)**
    ([int](#language.types.integer))



     Eliminar valores de un atributo de una entrada LDAP.





    **[LDAP_MODIFY_BATCH_REMOVE_ALL](#constant.ldap-modify-batch-remove-all)**
    ([int](#language.types.integer))



     Eliminar todas las valores de un atributo de una entrada LDAP.





    **[LDAP_MODIFY_BATCH_REPLACE](#constant.ldap-modify-batch-replace)**
    ([int](#language.types.integer))



     Reemplazar todas las valores actuales de un atributo de una entrada LDAP por los valores especificados.






    **[LDAP_OPT_TIMEOUT](#constant.ldap-opt-timeout)**
    ([int](#language.types.integer))



     Especifica un tiempo de espera (en segundos) después del cual las llamadas a las API LDAP sincrónicas
     serán abandonadas si no se recibe ninguna respuesta.
     También controla el tiempo de espera durante la comunicación con el KDC en caso de enlace SASL.






    **[LDAP_OPT_X_SASL_AUTHCID](#constant.ldap-opt-x-sasl-authcid)**
    ([int](#language.types.integer))



     Devuelve la identidad de autenticación SASL.





    **[LDAP_OPT_X_SASL_AUTHZID](#constant.ldap-opt-x-sasl-authzid)**
    ([int](#language.types.integer))



     Devuelve la identidad de autorización SASL.





    **[LDAP_OPT_X_SASL_MECH](#constant.ldap-opt-x-sasl-mech)**
    ([int](#language.types.integer))



     Devuelve el mecanismo SASL.





    **[LDAP_OPT_X_SASL_NOCANON](#constant.ldap-opt-x-sasl-nocanon)**
    ([int](#language.types.integer))



     Definir/obtener el flag NOCANON.
     Cuando no está definido, el nombre de host es canonizado.





    **[LDAP_OPT_X_SASL_REALM](#constant.ldap-opt-x-sasl-realm)**
    ([int](#language.types.integer))



     Devuelve el reino SASL.





    **[LDAP_OPT_X_SASL_USERNAME](#constant.ldap-opt-x-sasl-username)**
    ([int](#language.types.integer))



     Devuelve el nombre de usuario SASL.






    **[LDAP_OPT_X_TLS_ALLOW](#constant.ldap-opt-x-tls-allow)**
    ([int](#language.types.integer))



     Se solicita el certificado del par.
     Si no se proporciona ningún certificado, la sesión continúa normalmente.
     Si se proporciona un certificado incorrecto,
     será ignorado y la sesión continuará normalmente.





    **[LDAP_OPT_X_TLS_DEMAND](#constant.ldap-opt-x-tls-demand)**
    ([int](#language.types.integer))



     Se solicita el certificado del par.
     Si no se proporciona ningún certificado, o si se proporciona un certificado incorrecto,
     la sesión se termina inmediatamente.





    **[LDAP_OPT_X_TLS_HARD](#constant.ldap-opt-x-tls-hard)**
    ([int](#language.types.integer))



     Alias de **[LDAP_OPT_X_TLS_DEMAND](#constant.ldap-opt-x-tls-demand)**.





    **[LDAP_OPT_X_TLS_NEVER](#constant.ldap-opt-x-tls-never)**
    ([int](#language.types.integer))



     No se solicita ni verifica el certificado del par.





    **[LDAP_OPT_X_TLS_TRY](#constant.ldap-opt-x-tls-try)**
    ([int](#language.types.integer))



     Se solicita el certificado del par.
     Si no se proporciona ningún certificado, la sesión continúa normalmente.
     Si se proporciona un certificado incorrecto, la sesión se termina inmediatamente.





    **[LDAP_OPT_X_TLS_CRL_ALL](#constant.ldap-opt-x-tls-crl-all)**
    ([int](#language.types.integer))



     Verificar la lista de revocación de certificados (CRL) para toda la cadena de certificados.





    **[LDAP_OPT_X_TLS_CRL_NONE](#constant.ldap-opt-x-tls-crl-none)**
    ([int](#language.types.integer))



     No se realiza ninguna verificación de CRL.





    **[LDAP_OPT_X_TLS_CRL_PEER](#constant.ldap-opt-x-tls-crl-peer)**
    ([int](#language.types.integer))



     Verificar la CRL del certificado del par.






    **[LDAP_OPT_X_TLS_PACKAGE](#constant.ldap-opt-x-tls-package)**
    ([int](#language.types.integer))



     Devuelve el nombre de la implementación TLS subyacente.






    **[LDAP_OPT_X_TLS_PROTOCOL_SSL2](#constant.ldap-opt-x-tls-protocol-ssl2)**
    ([int](#language.types.integer))



     El protocolo SSL 2.0.





    **[LDAP_OPT_X_TLS_PROTOCOL_SSL3](#constant.ldap-opt-x-tls-protocol-ssl3)**
    ([int](#language.types.integer))



     El protocolo SSL 3.0.





    **[LDAP_OPT_X_TLS_PROTOCOL_TLS1_0](#constant.ldap-opt-x-tls-protocol-tls1-0)**
    ([int](#language.types.integer))



     El protocolo TLS 1.0.





    **[LDAP_OPT_X_TLS_PROTOCOL_TLS1_1](#constant.ldap-opt-x-tls-protocol-tls1-1)**
    ([int](#language.types.integer))



     El protocolo TLS 1.1.





    **[LDAP_OPT_X_TLS_PROTOCOL_TLS1_2](#constant.ldap-opt-x-tls-protocol-tls1-2)**
    ([int](#language.types.integer))



     El protocolo TLS 1.2.

# Utilización de las funciones LDAP de PHP

Antes de utilizar las funciones LDAP, debe conocerse :

    -

      El nombre o la dirección del servidor de directorios que se desea utilizar





    -

      El "base dn" del servidor (la parte del directorio mundial
      que está disponible en este servidor, lo cual puede ser
      "o=Mi Compañía,c=FR")





    -

      La posible contraseña de acceso al servidor (muchos
      servidores proporcionan acceso anónimo en lectura, pero
      requieren contraseñas para todo lo demás).


La secuencia LDAP típica que se ejecutará será la
siguiente :

ldap_connect() // establece una conexión al servidor
|
ldap_bind() // conexión anónima o identificada
|
realización de comandos como búsquedas o modificaciones, luego visualización del resultado.
|
ldap_close() // desconexión

# Control LDAP

Los controles son objetos especiales que pueden ser enviados
con una petición LDAP para modificar el comportamiento del servidor LDAP
durante la ejecución de la petición. También pueden existir
controles enviados por el servidor con la respuesta para proporcionar
más información, generalmente para responder a un objeto de control
de la petición.

**Nota**:

    No todos los controles son soportados por todos los servidores LDAP. Para saber
    qué controles son soportados por un servidor, debe interrogarse el DSE
    raíz leyendo un dn vacío con el filtro (objectClass=*).




    **Ejemplo #1 Prueba de soporte para el control de resultados paginados**

&lt;?php
// $ds es un identificador de enlace válido para un servidor de directorio
$result = ldap_read($ds, '', '(objectClass=*)', ['supportedControl']);
if (!in_array(LDAP_CONTROL_PAGEDRESULTS, ldap_get_entries($ds, $result)[0]['supportedcontrol'])) {
die("Este servidor no soporta el control de resultados paginados");
}
?&gt;

Desde PHP 7.3, puede enviarse controles con la petición en todas
las funciones de petición utilizando el parámetro controls. Cuando existe
una versión extendida de una función, debe utilizarse si se desea
acceder al objeto de respuesta completo y ser capaz de analizar
los controles de respuesta a partir de este utilizando [ldap_parse_result()](#function.ldap-parse-result).

controls debe ser un array que contenga un array para cada control a enviar,
conteniendo las siguientes claves :

      oid
      ([string](#language.types.string))



       El OID del control. Deben utilizarse las constantes que comienzan por
       LDAP_CONTROL_ para esto. Ver [constantes de LDAP](#ldap.constants).





      iscritical
      ([bool](#language.types.boolean))



       Si un control está marcado como crítico, la petición fallará si el
       control no es soportado por el servidor, o si falla al ser
       aplicado. Tenga en cuenta que algunos controles deben siempre estar marcados
       como críticos como se indica en el RFC que los introduce. Por omisión a **[false](#constant.false)**.





      value
      ([mixed](#language.types.mixed))



       Si es aplicable, el valor del control. Lea a continuación para más información.



La mayoría de los valores de control son enviados al servidor en BER-encodados.
Puede BER-encodar el valor usted mismo, o puede pasar un array con las claves correctas
para que el encodado sea realizado por usted.
Los controles soportados para pasar como array son :

- **[LDAP_CONTROL_PAGEDRESULTS](#constant.ldap-control-pagedresults)**
  Las claves esperadas son [size] y [cookie]

- **[LDAP_CONTROL_ASSERT](#constant.ldap-control-assert)**
  La clave esperada es [assertion]

- **[LDAP_CONTROL_VALUESRETURNFILTER](#constant.ldap-control-valuesreturnfilter)**
  La clave esperada es filter

- **[LDAP_CONTROL_PRE_READ](#constant.ldap-control-pre-read)**
  La clave esperada es attrs

- **[LDAP_CONTROL_POST_READ](#constant.ldap-control-post-read)**
  La clave esperada es attrs

- **[LDAP_CONTROL_SORTREQUEST](#constant.ldap-control-sortrequest)**
  Espera un array de arrays con las claves attr, [oid], [reverse].

- **[LDAP_CONTROL_VLVREQUEST](#constant.ldap-control-vlvrequest)**
  Las claves esperadas son before, after, attrvalue|(offset, count), [context]

Los siguientes controles no requieren valor :

- **[LDAP_CONTROL_PASSWORDPOLICYREQUEST](#constant.ldap-control-passwordpolicyrequest)**

- **[LDAP_CONTROL_MANAGEDSAIT](#constant.ldap-control-managedsait)**

- **[LDAP_CONTROL_DONTUSECOPY](#constant.ldap-control-dontusecopy)**

El control **[LDAP_CONTROL_PROXY_AUTHZ](#constant.ldap-control-proxy-authz)** es un caso especial
ya que su valor no se espera que esté BER-encodado, por lo que puede
utilizarse directamente una cadena para su valor.

Cuando los controles son analizados por [ldap_parse_result()](#function.ldap-parse-result), los valores son
transformados en array si son soportados.
Esto es soportado para :

- **[LDAP_CONTROL_PASSWORDPOLICYRESPONSE](#constant.ldap-control-passwordpolicyresponse)**
  Las claves son expire, grace, [error]

- **[LDAP_CONTROL_PAGEDRESULTS](#constant.ldap-control-pagedresults)**
  Las claves son size, cookie

- **[LDAP_CONTROL_PRE_READ](#constant.ldap-control-pre-read)**
  Las claves son dn y los nombres de atributos LDAP

- **[LDAP_CONTROL_POST_READ](#constant.ldap-control-post-read)**
  Las claves son dn y los nombres de atributos LDAP

- **[LDAP_CONTROL_SORTRESPONSE](#constant.ldap-control-sortresponse)**
  Las claves son errcode, [attribute]

- **[LDAP_CONTROL_VLVRESPONSE](#constant.ldap-control-vlvresponse)**
  Las claves son target, count, errcode, context

# Ejemplos

## Tabla de contenidos

- [Uso básico](#ldap.examples-basic)
- [Controles LDAP](#ldap.examples-controls)

    ## Uso básico

    Lee las informaciones sobre todas las entradas cuyo nombre
    comienza por "S" en el servidor de directorio, luego muestra
    el nombre y la dirección de correo electrónico.

    **Ejemplo #1 Búsqueda con LDAP**

&lt;?php
// La secuencia de base con LDAP es
// conexión, enlace, búsqueda, interpretación del resultado
// desconexión

echo '&lt;h3&gt;consulta de prueba de LDAP&lt;/h3&gt;';
echo 'Conectando ...';
$ds=ldap_connect("localhost"); // debe ser un servidor LDAP válido !
echo 'El resultado de conexión es ' . $ds . '&lt;br /&gt;';

if ($ds) {
    echo 'Enlazando ...';
    $r=ldap_bind($ds); // conexión anónima, típica
// para un acceso de solo lectura.
echo 'El resultado de conexión es ' . $r . '&lt;br /&gt;';

    echo 'Buscando (sn=S*) ...';
    // Búsqueda por apellido
    $sr=ldap_search($ds, "o=My Company, c=US", "sn=S*");
    echo 'El resultado de la búsqueda es ' . $sr . '&lt;br /&gt;';

    echo 'El número de entradas devueltas es ' . ldap_count_entries($ds,$sr)
         . '&lt;br /&gt;';

    echo 'Lectura de las entradas ...&lt;br /&gt;';
    $info = ldap_get_entries($ds, $sr);
    echo 'Datos para ' . $info["count"] . ' entradas:&lt;br /&gt;';

    for ($i=0; $i&lt;$info["count"]; $i++) {
        echo 'dn es : ' . $info[$i]["dn"] . '&lt;br /&gt;';
        echo 'primera entrada cn : ' . $info[$i]["cn"][0] . '&lt;br /&gt;';
        echo 'primer correo electrónico : ' . $info[$i]["mail"][0] . '&lt;br /&gt;';
    }

    echo 'Cierre de la conexión';
    ldap_close($ds);

} else {
echo '&lt;h4&gt;No es posible conectarse al servidor LDAP.&lt;/h4&gt;';
}
?&gt;

## Controles LDAP

A continuación se muestran algunos ejemplos de uso de los controles LDAP con PHP &gt;= 7.3.0.

**Ejemplo #1 Enlazar con información de política**

&lt;?php

$user   = 'cn=admin,dc=example,dc=com';
$passwd = 'adminpassword';

$ds = ldap_connect('ldap://localhost');

if ($ds) {
    $r = ldap_bind_ext($ds, $user, $passwd, [['oid' =&gt; LDAP_CONTROL_PASSWORDPOLICYREQUEST]]);

    if (ldap_parse_result($ds, $r, $errcode, $matcheddn, $errmsg, $referrals, $ctrls)) {
        if ($errcode != 0) {
            die("Error: $errmsg ($errcode)");
        }
        if (isset($ctrls[LDAP_CONTROL_PASSWORDPOLICYRESPONSE])) {
            $value = $ctrls[LDAP_CONTROL_PASSWORDPOLICYRESPONSE]['value'];
            echo "Expira en : ".$value['expire']." segundos\n";
            echo "Número de autentificaciones restantes : ".$value['grace']."\n";
            if (isset($value['error'])) {
                echo "Código de error de política : ".$value['error'];
            }
        }
    }

} else {
die("No es posible conectarse al servidor LDAP");
}
?&gt;

**Ejemplo #2 Modificar la descripción solo si no está vacía**

&lt;?php
// $link es una conexión LDAP

$result = ldap_mod_replace_ext(
$link,
'o=test,dc=example,dc=com',
['description' =&gt; 'Nueva descripción'],
[
[
'oid' =&gt; LDAP_CONTROL_ASSERT,
'iscritical' =&gt; TRUE,
'value' =&gt; ['filter' =&gt; '(!(description=*))']
]
]
);

// Luego utilizar ldap_parse_result
?&gt;

**Ejemplo #3 Leer valores antes de su eliminación**

&lt;?php
// $link es una conexión LDAP

$result = ldap_delete_ext(
$link,
'o=test,dc=example,dc=com',
[
[
'oid' =&gt; LDAP_CONTROL_PRE_READ,
'iscritical' =&gt; TRUE,
'value' =&gt; ['attrs' =&gt; ['o', 'description']]
]
]
);

// Luego utilizar ldap_parse_result
?&gt;

**Ejemplo #4 Eliminar una referencia**

&lt;?php
// $link es una conexión LDAP

// Sin el control esto eliminaría el nodo referenciado
// Asegúrese de definir el control como crítico para evitar esto
$result = ldap_delete_ext(
$link,
'cn=reference,dc=example,dc=com',
[['oid' =&gt; LDAP_CONTROL_MANAGEDSAIT, 'iscritical' =&gt; TRUE]]
);

// Luego utilizar ldap_parse_result
?&gt;

**Ejemplo #5 Utilizar paginación para una búsqueda**

&lt;?php
// $link es una conexión LDAP

$cookie = '';

do {
$result = ldap_search(
        $link, 'dc=example,dc=base', '(cn=*)', ['cn'], 0, 0, 0, LDAP_DEREF_NEVER,
        [['oid' =&gt; LDAP_CONTROL_PAGEDRESULTS, 'value' =&gt; ['size' =&gt; 2, 'cookie' =&gt; $cookie]]]
    );
    ldap_parse_result($link, $result, $errcode , $matcheddn , $errmsg , $referrals, $controls);
    // Para mantener el ejemplo simple los errores no son verificados
    $entries = ldap_get_entries($link, $result);
    foreach ($entries as $entry) {
        echo "cn: ".$entry['cn'][0]."\n";
}
if (isset($controls[LDAP_CONTROL_PAGEDRESULTS]['value']['cookie'])) {
        // Debe pasar el cookie del último llamado al próximo
        $cookie = $controls[LDAP_CONTROL_PAGEDRESULTS]['value']['cookie'];
    } else {
        $cookie = '';
    }
    // Cookie vacía significa última página
} while (strlen($cookie) &gt; 0);
?&gt;

# LDAP Funciones

# ldap_8859_to_t61

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

ldap_8859_to_t61 — Convierte los caracteres 8859 en caracteres t61

### Descripción

**ldap_8859_to_t61**([string](#language.types.string) $value): [string](#language.types.string)|[false](#language.types.singleton)

Convierte los caracteres ISO-8859 en caracteres t61.

Esta función es útil si se debe utilizar un servidor
LDAPv2.

### Parámetros

     value


       El texto a convertir.





### Valores devueltos

Devuelve la conversión en t61 del texto
value, o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ldap_t61_to_8859()](#function.ldap-t61-to-8859) - Convierte los caracteres t61 en caracteres 8859

# ldap_add

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_add — Añade una entrada en un directorio LDAP

### Descripción

**ldap_add**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [string](#language.types.string) $dn,
    [array](#language.types.array) $entry,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**
): [bool](#language.types.boolean)

Añade una entrada en un directorio LDAP.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     dn


       El nombre DN de la entrada LDAP.






     entry


       Un array con la información sobre la nueva entrada.
       Estos valores están indexados individualmente. En
       caso de valores múltiples para un atributo, están indexados
       numéricamente, comenzando desde 0.





&lt;?php
$entry["attribute1"] = "value";
$entry["attribute2"][0] = "value1";
$entry["attribute2"][1] = "value2";
?&gt;

     controls


       Array de [Controles LDAP](#ldap.controls) para enviar con la petición.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.0.0

controls is nullable now; previously, it defaulted to [].

       7.3.0

        Se añadió soporte para controls.





### Ejemplos

    **Ejemplo #1 Ejemplo completo con identificación LDAP**

&lt;?php
$ds = ldap_connect("localhost"); // se asume que el servidor LDAP está en el servidor local

if ($ds) {
    // Conexión con una identidad que permite modificaciones
    $r = ldap_bind($ds, "cn=root, o=My Company, c=US", "secret");

    // Prepara los datos
    $info["cn"] = "John Jones";
    $info["sn"] = "Jones";
    $info["objectclass"] = "person";

    // Añade los datos al directorio
    $r = ldap_add($ds, "cn=John Jones, o=My Company, c=US", $info);

    ldap_close($ds);

} else {
echo "No es posible conectarse al servidor LDAP";
}
?&gt;

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [ldap_add_ext()](#function.ldap-add-ext) - Añade una entrada en un directorio LDAP

    - [ldap_delete()](#function.ldap-delete) - Elimina una entrada en un directorio

# ldap_add_ext

(PHP 7 &gt;= 7.3.0, PHP 8)

ldap_add_ext — Añade una entrada en un directorio LDAP

### Descripción

**ldap_add_ext**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [string](#language.types.string) $dn,
    [array](#language.types.array) $entry,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**
): [LDAP\Result](#class.ldap-result)|[false](#language.types.singleton)

Realiza lo mismo que la función [ldap_add()](#function.ldap-add)
pero devuelve una instancia [LDAP\Result](#class.ldap-result) para analizar
con [ldap_parse_result()](#function.ldap-parse-result).

### Parámetros

    Ver la función [ldap_add()](#function.ldap-add)

### Valores devueltos

Returns an [LDAP\Result](#class.ldap-result) instance, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

Returns an [LDAP\Result](#class.ldap-result) instance now;
previously, a [resource](#language.types.resource) was returned.

8.0.0

controls is nullable now; previously, it defaulted to [].

### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [ldap_add()](#function.ldap-add) - Añade una entrada en un directorio LDAP

    - [ldap_parse_result()](#function.ldap-parse-result) - Extrae información de un resultado

# ldap_bind

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_bind — Autenticación en el servidor LDAP

### Descripción

**ldap_bind**([LDAP\Connection](#class.ldap-connection) $ldap, [?](#language.types.null)[string](#language.types.string) $dn = **[null](#constant.null)**, [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**): [bool](#language.types.boolean)

Autenticación en el servidor LDAP con el RDN y la contraseña especificados.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     dn








     password







Si password
no está especificado o está vacío, se intenta una autenticación anónima.
dn también puede dejarse vacío para una conexión
anónima. Esto está definido en https://tools.ietf.org/html/rfc2251#section-4.2.2

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Autenticación con LDAP**

&lt;?php

// Elementos de autenticación LDAP
$ldaprdn  = 'uname';     // DN o RDN LDAP
$ldappass = 'password'; // Contraseña asociada

// Conexión al servidor LDAP
$ldapconn = ldap_connect("ldap://ldap.example.com")
or die("No es posible conectarse al servidor LDAP.");

if ($ldapconn) {

    // Conexión al servidor LDAP
    $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

    // Verificación de la autenticación
    if ($ldapbind) {
        echo "Conexión LDAP exitosa...";
    } else {
        echo "Conexión LDAP fallida...";
    }

}

?&gt;

    **Ejemplo #2 Conexión anónima a un servidor LDAP**

&lt;?php

// Conexión anónima a un servidor LDAP

// Conexión al servidor LDAP
$ldapconn = ldap_connect("ldap://ldap.example.com")
or die("No es posible conectarse al servidor LDAP.");

if ($ldapconn) {

    // Autenticación anónima
    $ldapbind = ldap_bind($ldapconn);

    if ($ldapbind) {
        echo "Conexión LDAP anónima exitosa...";
    } else {
        echo "Conexión LDAP anónima fallida...";
    }

}

?&gt;

### Ver también

    - [ldap_bind_ext()](#function.ldap-bind-ext) - Vincula un directorio LDAP

    - [ldap_unbind()](#function.ldap-unbind) - Desconecta de un servidor LDAP

# ldap_bind_ext

(PHP 7 &gt;= 7.3.0, PHP 8)

ldap_bind_ext — Vincula un directorio LDAP

### Descripción

**ldap_bind_ext**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [?](#language.types.null)[string](#language.types.string) $dn = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**
): [LDAP\Result](#class.ldap-result)|[false](#language.types.singleton)

Realiza lo mismo que la función [ldap_bind()](#function.ldap-bind)
pero devuelve una instancia [LDAP\Result](#class.ldap-result) para analizar
con [ldap_parse_result()](#function.ldap-parse-result).

### Parámetros

    Véase [ldap_bind()](#function.ldap-bind)

### Valores devueltos

Returns an [LDAP\Result](#class.ldap-result) instance, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

Returns an [LDAP\Result](#class.ldap-result) instance now;
previously, a [resource](#language.types.resource) was returned.

8.0.0

controls is nullable now; previously, it defaulted to [].

### Ver también

    - [ldap_bind()](#function.ldap-bind) - Autenticación en el servidor LDAP

    - [ldap_parse_result()](#function.ldap-parse-result) - Extrae información de un resultado

# ldap_close

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_close — Alias de [ldap_unbind()](#function.ldap-unbind)

### Descripción

Esta función es un alias de: [ldap_unbind()](#function.ldap-unbind).

# ldap_compare

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

ldap_compare — Comparar una entrada con valores de atributos

### Descripción

**ldap_compare**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [string](#language.types.string) $dn,
    [string](#language.types.string) $attribute,
    [string](#language.types.string) $value,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**
): [bool](#language.types.boolean)|[int](#language.types.integer)

Permite comparar el valor value del atributo
attribute con el valor del mismo atributo de la entrada
dn.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     dn


       El DN de la entrada LDAP.






     attribute


       El nombre del atributo.






     value


       El valor a comparar.






     controls


       Array de [Controles LDAP](#ldap.controls) a enviar con la petición.





### Valores devueltos

Devuelve **[true](#constant.true)** si el valor value coincide, de lo contrario,
devuelve **[false](#constant.false)**. Devuelve -1 si ocurre un error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.0.0

controls is nullable now; previously, it defaulted to [].

       7.3.0

        Se añadió soporte para controls.





### Ejemplos

El siguiente ejemplo muestra cómo verificar que dos contraseñas coinciden,
siendo una de ellas la de una entrada del servidor LDAP.

    **Ejemplo #1 Ejemplo completo de verificación de contraseña con LDAP**

&lt;?php

$ds=ldap_connect("localhost"); // debe ser un servidor LDAP válido!

if ($ds) {

    // Autenticación
    if (ldap_bind($ds)) {

        // Preparación de datos
        $dn = "cn=Matti Meikku, ou=My Unit, o=My Company, c=FI";
        $value = "secretpassword";
        $attr = "password";

        // Comparación de valores
        $r=ldap_compare($ds, $dn, $attr, $value);

        if ($r === -1) {
            echo "Error: " . ldap_error($ds);
        } elseif ($r === true) {
            echo "Contraseña correcta.";
        } elseif ($r === false) {
            echo "¡Mal elegido! ¡Contraseña incorrecta!";
        }

    } else {
        echo "No se pudo conectar al servidor LDAP.";
    }

    ldap_close($ds);

} else {
echo "No se pudo conectar al servidor LDAP.";
}
?&gt;

### Notas

**Advertencia**

    **ldap_compare()** NO puede ser utilizado para comparar
    valores binarios.

# ldap_connect

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_connect — Conexión a un servidor LDAP

### Descripción

**ldap_connect**([?](#language.types.null)[string](#language.types.string) $uri = **[null](#constant.null)**): [LDAP\Connection](#class.ldap-connection)|[false](#language.types.singleton)

**Advertencia**

    A partir de PHP 8.3.0, la firma *siguiente* está obsoleta.

**ldap_connect**([?](#language.types.null)[string](#language.types.string) $host = **[null](#constant.null)**, [int](#language.types.integer) $port = 389): [LDAP\Connection](#class.ldap-connection)|[false](#language.types.singleton)

Crea una instancia [LDAP\Connection](#class.ldap-connection) y verifica si
el uri proporcionado es plausible.

**Nota**:

    Esta función no abre *ninguna* conexión. Verifica si
    los parámetros dados son plausibles y pueden ser utilizados para abrir una
    conexión cuando sea necesario.

### Parámetros

     uri


       Un URI LDAP completo de la forma LDAP://hostname:port
       o LDAPS://hostname:port para el cifrado SSL.




       También puede proporcionarse varios URI LDAP separados por un espacio como una cadena




       Tenga en cuenta que hostname:port no es un URI LDAP soportado ya que falta el esquema.






     host


       El nombre de host al que conectarse.






     port


       El puerto utilizado para la conexión.





### Valores devueltos

Devuelve una instancia de [LDAP\Connection](#class.ldap-connection) cuando
el URI LDAP parece plausible. Se trata de un control sintáctico de los parámetros proporcionados,
pero el servidor(s) no será contactado.
Si la verificación sintáctica falla, devuelve **[false](#constant.false)**.
**ldap_connect()** devolverá entonces una instancia de
[LDAP\Connection](#class.ldap-connection) ya que no se conectará pero
solo inicializará los parámetros de conexión.
Actualmente, la conexión se realiza con la siguiente llamada a las funciones
ldap\_\*, habitualmente con la función
[ldap_bind()](#function.ldap-bind).

Sin argumentos, entonces se devolverá la instancia [LDAP\Connection](#class.ldap-connection)
de la última conexión ya abierta.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a **ldap_connect()** con
       hostname y port
       separados está ahora obsoleto.




      8.1.0

       Ahora devuelve una instancia de [LDAP\Connection](#class.ldap-connection) ;
       anteriormente, se esperaba una [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Ejemplo de conexión a un servidor LDAP**

&lt;?php

// Variables LDAP
$ldapuri = "ldap://ldap.example.com:389"; // su ldap-uri

// Conexión LDAP
$ldapconn = ldap_connect($ldaphost, $ldapport)
or die("Esta LDAP-URI no ha sido analizable");

?&gt;

    **Ejemplo #2 Ejemplo de conexión a un servidor LDAP SSL**

&lt;?php

// Asegúrese de que el host es correcto
// y que tiene un certificado válido
$ldaphost = "ldaps://ldap.example.com/";

// Conexión LDAP
$ldapconn = ldap_connect($ldaphost)
or die("Esta LDAP-URI no ha sido analizable");

?&gt;

### Ver también

    - [ldap_bind()](#function.ldap-bind) - Autenticación en el servidor LDAP

# ldap_connect_wallet

(PHP 8 &gt;= 8.3.0)

ldap_connect_wallet — Conecta a un servidor LDAP

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.5.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**ldap_connect_wallet**(
    [?](#language.types.null)[string](#language.types.string) $uri = **[null](#constant.null)**,
    [string](#language.types.string) $wallet,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $password,
    [int](#language.types.integer) $auth_mode = **[GSLC_SSL_NO_AUTH](#constant.gslc-ssl-no-auth)**
): [LDAP\Connection](#class.ldap-connection)|[false](#language.types.singleton)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     uri









     wallet









     password









     auth_mode








### Valores devueltos

### Ver también

    - [ldap_connect()](#function.ldap-connect) - Conexión a un servidor LDAP

# ldap_control_paged_result

(PHP 5 &gt;= 5.4.0, PHP 7)

ldap_control_paged_result — Envía un control de paginación LDAP

**Advertencia**

This function has been _DEPRECATED_ as of PHP 7.4.0, and _REMOVED_ as of PHP 8.0.0.
Instead the controls parameter of [ldap_search()](#function.ldap-search) should be used.
See also [LDAP Controls](#ldap.controls) for details.

### Descripción

**ldap_control_paged_result**(
    [resource](#language.types.resource) $link,
    [int](#language.types.integer) $pagesize,
    [bool](#language.types.boolean) $iscritical = **[false](#constant.false)**,
    [string](#language.types.string) $cookie = ""
): [bool](#language.types.boolean)

Activa la paginación LDAP enviando el control de paginación
(tamaño de la página, cookie,...).

### Parámetros

     link


       Un [resource](#language.types.resource) LDAP, devuelto por [ldap_connect()](#function.ldap-connect).






     pagesize


       El número de entradas por página.






     iscritical


       Indica si la paginación es crítica o no. Si es **[true](#constant.true)**,
       y si el servidor no soporta la paginación,
       la búsqueda no devolverá ningún resultado.






     cookie


       Una estructura opaca enviada por el servidor
       ([ldap_control_paged_result_response()](#function.ldap-control-paged-result-response)).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función ha sido eliminada.




       7.4.0

        Esta función se ha vuelto obsoleta.





### Ejemplos

El ejemplo siguiente muestra la manera de recuperar la primera página
de una búsqueda paginada con una sola entrada por página.

    **Ejemplo #1 Paginación LDAP**



     &lt;?php
     // $ds es un identificador de enlace válido (ver ldap_connect)
     ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);

     $dn        = 'ou=example,dc=org';
     $filter    = '(|(sn=Doe*)(givenname=John*))';
     $justthese = array('ou', 'sn', 'givenname', 'mail');

     // activa la paginación con un tamaño de página de 1.
     ldap_control_paged_result($ds, 1);

     $sr = ldap_search($ds, $dn, $filter, $justthese);

     $info = ldap_get_entries($ds, $sr);

     echo $info['count'] . ' entradas devueltas' . PHP_EOL;

El ejemplo siguiente muestra la manera de recuperar todos los resultados
paginados con 100 entradas por página.

    **Ejemplo #2 Paginación LDAP**



     &lt;?php
     // $ds es un identificador de enlace válido (ver ldap_connect)
     ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);

     $dn        = 'ou=example,dc=org';
     $filter    = '(|(sn=Doe*)(givenname=John*))';
     $justthese = array('ou', 'sn', 'givenname', 'mail');

     // activa la paginación con un tamaño de página de 100.
     $pageSize = 100;

     $cookie = '';
     do {
         ldap_control_paged_result($ds, $pageSize, true, $cookie);

         $result  = ldap_search($ds, $dn, $filter, $justthese);
         $entries = ldap_get_entries($ds, $result);

         foreach ($entries as $e) {
             echo $e['dn'] . PHP_EOL;
         }

         ldap_control_paged_result_response($ds, $result, $cookie);

     } while($cookie !== null &amp;&amp; $cookie != '');

### Notas

**Nota**:

    El control de paginación es una funcionalidad del protocolo LDAPv3.

### Ver también

    - [ldap_control_paged_result_response()](#function.ldap-control-paged-result-response) - Recupera el cookie de paginación LDAP

    - [» RFC2696 : Extensión de control LDAP para
     una manipulación simplificada de los resultados paginados](https://datatracker.ietf.org/doc/html/rfc2696)

# ldap_control_paged_result_response

(PHP 5 &gt;= 5.4.0, PHP 7)

ldap_control_paged_result_response — Recupera el cookie de paginación LDAP

**Advertencia**

This function has been _DEPRECATED_ as of PHP 7.4.0, and _REMOVED_ as of PHP 8.0.0.
Instead the controls parameter of [ldap_search()](#function.ldap-search) should be used.
See also [LDAP Controls](#ldap.controls) for details.

### Descripción

**ldap_control_paged_result_response**(
    [resource](#language.types.resource) $link,
    [resource](#language.types.resource) $result,
    [string](#language.types.string) &amp;$cookie = ?,
    [int](#language.types.integer) &amp;$estimated = ?
): [bool](#language.types.boolean)

Recupera las informaciones de paginación enviadas por el servidor.

### Parámetros

     link


       Un [resource](#language.types.resource) LDAP, retornado por [ldap_connect()](#function.ldap-connect).






     result








     cookie


       Una estructura opaca enviada por el servidor.






     estimated


       El número estimado de entradas a recuperar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función ha sido suprimida.




       7.4.0

        Esta función se ha vuelto obsoleta.





### Ver también

    - [ldap_control_paged_result()](#function.ldap-control-paged-result) - Envía un control de paginación LDAP

    - [» RFC2696 : Extensión de control LDAP para
     una manipulación simplificada de los resultados paginados](https://datatracker.ietf.org/doc/html/rfc2696)

# ldap_count_entries

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_count_entries — Cuenta el número de entradas tras una búsqueda

### Descripción

**ldap_count_entries**([LDAP\Connection](#class.ldap-connection) $ldap, [LDAP\Result](#class.ldap-result) $result): [int](#language.types.integer)

Devuelve el número de entradas encontradas en el resultado
result_identifier, sobre la conexión
link_identifier.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     result


       An [LDAP\Result](#class.ldap-result) instance, returned by [ldap_list()](#function.ldap-list) or [ldap_search()](#function.ldap-search).





### Valores devueltos

Devuelve el número de entradas en el resultado, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

The result parameter expects an [LDAP\Result](#class.ldap-result)
instance now; previously, a valid ldap result [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con ldap_count_entries()**



     Obtener el número de entradas en el resultado.

// $ds debe ser una instancia de conexión LDAP\Connection válida

$dn        = 'ou=example,dc=org';
$filter = '(|(sn=Doe*)(givenname=John*))';
$justthese = array('ou', 'sn', 'givenname', 'mail');

$sr = ldap_search($ds, $dn, $filter, $justthese);

var_dump(ldap_count_entries($ds, $sr));

    Resultado del ejemplo anterior es similar a:

int(1)

# ldap_count_references

(PHP 8)

ldap_count_references — Cuenta el número de referencias en un resultado de búsqueda

### Descripción

**ldap_count_references**([LDAP\Connection](#class.ldap-connection) $ldap, [LDAP\Result](#class.ldap-result) $result): [int](#language.types.integer)

Cuenta el número de referencias en un resultado de búsqueda.

### Parámetros

    ldap


      An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






    result


      An [LDAP\Result](#class.ldap-result) instance, returned by [ldap_list()](#function.ldap-list) or [ldap_search()](#function.ldap-search).


### Valores devueltos

Devuelve el número de referencias en un resultado de búsqueda.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

The result parameter expects an [LDAP\Result](#class.ldap-result)
instance now; previously, a valid ldap result [resource](#language.types.resource) was expected.

### Ver también

- [ldap_connect()](#function.ldap-connect) - Conexión a un servidor LDAP

# ldap_delete

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_delete — Elimina una entrada en un directorio

### Descripción

**ldap_delete**([LDAP\Connection](#class.ldap-connection) $ldap, [string](#language.types.string) $dn, [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**): [bool](#language.types.boolean)

Elimina una entrada específica de un directorio LDAP.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     dn


       El nombre DN de la entrada LDAP.






     controls


       Array de [Controles LDAP](#ldap.controls) a enviar con la petición.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.0.0

controls is nullable now; previously, it defaulted to [].

       7.3.0

        Se ha añadido soporte para controls.





### Ver también

    - [ldap_delete_ext()](#function.ldap-delete-ext) - Elimina una entrada de un directorio

    - [ldap_add()](#function.ldap-add) - Añade una entrada en un directorio LDAP

# ldap_delete_ext

(PHP 7 &gt;= 7.3.0, PHP 8)

ldap_delete_ext — Elimina una entrada de un directorio

### Descripción

**ldap_delete_ext**([LDAP\Connection](#class.ldap-connection) $ldap, [string](#language.types.string) $dn, [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**): [LDAP\Result](#class.ldap-result)|[false](#language.types.singleton)

Realiza lo mismo que la función [ldap_delete()](#function.ldap-delete)
pero devuelve una instancia [LDAP\Result](#class.ldap-result) para analizar
con [ldap_parse_result()](#function.ldap-parse-result).

### Parámetros

    Ver la función [ldap_delete()](#function.ldap-delete)

### Valores devueltos

Returns an [LDAP\Result](#class.ldap-result) instance, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

Returns an [LDAP\Result](#class.ldap-result) instance now;
previously, a [resource](#language.types.resource) was returned.

8.0.0

controls is nullable now; previously, it defaulted to [].

### Ver también

    - [ldap_delete()](#function.ldap-delete) - Elimina una entrada en un directorio

    - [ldap_parse_result()](#function.ldap-parse-result) - Extrae información de un resultado

# ldap_dn2ufn

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_dn2ufn — Convierte un DN en formato UFN (User Friendly Naming)

### Descripción

**ldap_dn2ufn**([string](#language.types.string) $dn): [string](#language.types.string)|[false](#language.types.singleton)

Convierte el DN dn a un formato más
legible para humanos, eliminando los tipos de nombres.

### Parámetros

     dn


       El DN de la entrada LDAP.





### Valores devueltos

Devuelve el UFN, o **[false](#constant.false)** si ocurre un error.

# ldap_err2str

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_err2str — Convertir un número de error de LDAP a una cadena con un mensaje de error

### Descripción

**ldap_err2str**([int](#language.types.integer) $errno): [string](#language.types.string)

Devuelve una cadena con un mensaje de error explicando el número de error de
errno. Mientras que los números errno de LDAP están estandarizados,
diferentes bibliotecas devuelven aún mensajes de error textuales
localizados. Nunca busque un texto con un mensaje de error específico, pero siempre busque un
número de error que revisar.

### Parámetros

     errno


       El número de error.





### Valores devueltos

Devuelve el mensaje de error como una cadena.

### Ejemplos

    **Ejemplo #1 Enumerando todos los mensajes de error de LDAP**

&lt;?php
for ($i=0; $i&lt;100; $i++) {
    printf("Error $i: %s&lt;br /&gt;\n", ldap_err2str($i));
}
?&gt;

### Ver también

    - [ldap_errno()](#function.ldap-errno) - Devuelve el número de error LDAP de la última orden ejecutada

    - [ldap_error()](#function.ldap-error) - Devuelve el mensaje LDAP de la última orden LDAP

# ldap_errno

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_errno — Devuelve el número de error LDAP de la última orden ejecutada

### Descripción

**ldap_errno**([LDAP\Connection](#class.ldap-connection) $ldap): [int](#language.types.integer)

Devuelve el número de error estándar, generado por la última orden
LDAP, para la conexión link_identifier. Este número
puede ser convertido en mensaje textual con [ldap_err2str()](#function.ldap-err2str).

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).





### Valores devueltos

Devuelve el número de error LDAP generado por la última orden.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

### Ejemplos

A menos que se reduzca suficientemente el nivel de error en
php.ini, o que se prefijen las órdenes LDAP con @
(arroba) para suprimir los mensajes, los errores LDAP también se mostrarán
en la salida HTML.

    **Ejemplo #1 Generar e interceptar un error**

&lt;?php
// Este ejemplo contiene un error, que se interceptará.
$ld = ldap_connect("localhost");
$bind = ldap_bind($ld);
// error de sintaxis en la expresión del filtro (errno 87),
// debe ser "objectclass=*" para funcionar.
$res = @ldap_search($ld, "o=Myorg, c=DE", "objectclass");
if (!$res) {
echo "LDAP-Errno: " . ldap_errno($ld) . "&lt;br /&gt;\n";
    echo "LDAP-Error: " . ldap_error($ld) . "&lt;br /&gt;\n";
die("Argh!&lt;br /&gt;\n");
}
$info = ldap_get_entries($ld, $res);
echo $info["count"] . " entradas coinciden.&lt;br /&gt;\n";
?&gt;

### Ver también

    - [ldap_err2str()](#function.ldap-err2str) - Convertir un número de error de LDAP a una cadena con un mensaje de error

    - [ldap_error()](#function.ldap-error) - Devuelve el mensaje LDAP de la última orden LDAP

# ldap_error

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_error — Devuelve el mensaje LDAP de la última orden LDAP

### Descripción

**ldap_error**([LDAP\Connection](#class.ldap-connection) $ldap): [string](#language.types.string)

Devuelve el mensaje de error asociado a la conexión
ldap. Aunque los números de error LDAP están
estandarizados, diferentes bibliotecas devuelven diferentes mensajes, o
a veces, mensajes en el idioma local. No se debe confiar en el mensaje de
error, sino en el número de error.

A menos que se reduzca el nivel de error en
php.ini, o que se prefijen las órdenes LDAP con
@ para suprimir los mensajes, los errores
LDAP también se mostrarán en la salida HTML.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).





### Valores devueltos

Devuelve un mensaje de error LDAP.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

### Ver también

    - [ldap_err2str()](#function.ldap-err2str) - Convertir un número de error de LDAP a una cadena con un mensaje de error

    - [ldap_errno()](#function.ldap-errno) - Devuelve el número de error LDAP de la última orden ejecutada

# ldap_escape

(PHP 5 &gt;= 5.6.0, PHP 7, PHP 8)

ldap_escape — Escapa una cadena para usarla en un filtro LDAP o un DN

### Descripción

**ldap_escape**([string](#language.types.string) $value, [string](#language.types.string) $ignore = "", [int](#language.types.integer) $flags = 0): [string](#language.types.string)

Escapa la cadena value para usarla en el
contexto implicado por el argumento flags.

### Parámetros

     value


       El valor a escapar.






     ignore


       Los caracteres a ignorar durante el escape.






     flags


       El contexto en el que la cadena escapada será utilizada:
       **[LDAP_ESCAPE_FILTER](#constant.ldap-escape-filter)** para los filtros
       a usar con [ldap_search()](#function.ldap-search), o
       **[LDAP_ESCAPE_DN](#constant.ldap-escape-dn)** para los DNs.
       Si no se pasa ningún flag, todos los caracteres son escapados.





### Valores devueltos

Devuelve la cadena escapada.

### Ejemplos

Al construir un filtro LDAP, debe usarse ldap_escape con el flag LDAP_ESCAPE_FILTER.

    **Ejemplo #1 Buscar una dirección de correo electrónico**

&lt;?php
// $ds debe ser una instancia válida de LDAP\Connection

// $mail es una dirección de correo electrónico proporcionada por el usuario en un formulario

$base   = "o=My Company, c=US";
$filter = "(mail=".ldap_escape($mail, "", LDAP_ESCAPE_FILTER).")";

$sr = ldap_search($ds, $base, $filter, array("sn", "givenname", "mail"));

$info = ldap_get_entries($ds, $sr);

echo $info["count"]." entradas devueltas\n";
?&gt;

# ldap_exop

(PHP 7 &gt;= 7.2.0, PHP 8)

ldap_exop — Realiza una operación extendida

### Descripción

**ldap_exop**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [string](#language.types.string) $request_oid,
    [string](#language.types.string) $request_data = **[null](#constant.null)**,
    [array](#language.types.array) $controls = **[null](#constant.null)**,
    [string](#language.types.string) &amp;$response_data = ?,
    [string](#language.types.string) &amp;$response_oid = ?
): [mixed](#language.types.mixed)

Realiza una operación extendida en el ldap especificado con
request_oid el OID de la operación y
request_data los datos.

### Parámetros

    ldap


      An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






    request_oid


       El OID de la operación extendida. Puede utilizarse **[LDAP_EXOP_START_TLS](#constant.ldap-exop-start-tls)**, **[LDAP_EXOP_MODIFY_PASSWD](#constant.ldap-exop-modify-passwd)**, **[LDAP_EXOP_REFRESH](#constant.ldap-exop-refresh)**, **[LDAP_EXOP_WHO_AM_I](#constant.ldap-exop-who-am-i)**, **[LDAP_EXOP_TURN](#constant.ldap-exop-turn)**, o una cadena con el OID de la operación que se desea enviar.






    request_data


       La operación extendida requiere datos. Puede ser NULL para ciertas operaciones como **[LDAP_EXOP_WHO_AM_I](#constant.ldap-exop-who-am-i)**, puede requerir asimismo un codificación BER.






    controls


      Un array de [controles LDAP](#ldap.controls) a enviar con la solicitud.






    response_data


       Será rellenado con los datos de respuesta de la operación extendida si se proporcionan.
       Si no se proporcionan, puede utilizarse ldap_parse_exop en el objeto resultado
       posteriormente para obtener estos datos.






    response_oid


       Será rellenado con el OID de respuesta si se proporciona, generalmente igual al OID de la solicitud.


### Valores devueltos

Al utilizarse con response_data, devuelve **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** en caso de error.
Al utilizarse sin response_data, devuelve un identificador de resultado o **[false](#constant.false)** en caso de error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

       7.3.0

        Se ha añadido el soporte para controls





### Ejemplos

    **Ejemplo #1 Operación extendida WHOAMI**

&lt;?php
$ds = ldap_connect("localhost");  // asumiendo que el servidor LDAP está en este host
if ($ds) {
// enlace con el dn apropiado para dar acceso de actualización
$bind = ldap_bind($ds, "cn=root, o=My Company, c=US", "secret");
if (!$bind) {
      echo "No se puede enlazar con el servidor LDAP";
      exit;
    }
    // Llamada a la operación extendida WHOAMI
    $r = ldap_exop($ds, LDAP_EXOP_WHO_AM_I);
// analiza el objeto resultado
ldap_parse_exop($ds, $r, $retdata);
    // Salida: string(31) "dn:cn=root, o=My Company, c=US"
    var_dump($retdata);
// Lo mismo utilizando el parámetro $response_data
    $success = ldap_exop($ds, LDAP_EXOP_WHO_AM_I, NULL, NULL, $retdata, $retoid);
    if ($success) {
var_dump($retdata);
    }
    ldap_close($ds);
} else {
echo "No se puede conectar con el servidor LDAP";
}
?&gt;

### Ver también

    - [ldap_parse_result()](#function.ldap-parse-result) - Extrae información de un resultado

    - [ldap_parse_exop()](#function.ldap-parse-exop) - Analiza un objeto de resultado de una operación extendida LDAP

    - [ldap_exop_whoami()](#function.ldap-exop-whoami) - Ayuda de la operación extendida WHOAMI

    - [ldap_exop_refresh()](#function.ldap-exop-refresh) - Actualiza la ayuda de la operación extendida

    - [ldap_exop_passwd()](#function.ldap-exop-passwd) - Asistencia para la operación extendida PASSWD

# ldap_exop_passwd

(PHP 7 &gt;= 7.2.0, PHP 8)

ldap_exop_passwd — Asistencia para la operación extendida PASSWD

### Descripción

**ldap_exop_passwd**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [string](#language.types.string) $user = "",
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $old_password = "",
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [string](#language.types.string) $new_password = "",
    [array](#language.types.array) &amp;$controls = **[null](#constant.null)**
): [string](#language.types.string)|[bool](#language.types.boolean)

Realiza una operación extendida PASSWD.

### Parámetros

    ldap


      An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






    user


       El dn del usuario para cambiar la contraseña.






    old_password


       La contraseña antigua de este usuario. Puede omitirse según la configuración del servidor.






    new_password


       La nueva contraseña para este usuario. Puede omitirse o estar vacía para obtener una contraseña generada.






    controls


       Si se proporciona, un control de solicitud de política de contraseña se envía con la petición y esto se
       rellena con un array de [Controles LDAP](#ldap.controls)
       devueltos con la petición.


### Valores devueltos

    Devuelve la contraseña generada si new_password está vacía u omitida.
    De lo contrario, devuelve **[true](#constant.true)** en caso de éxito y **[false](#constant.false)** en caso de fallo.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.0.0

controls is nullable now; previously, it defaulted to [].

       7.3.0

        Se ha añadido el soporte para controls





### Ejemplos

    **Ejemplo #1 Operación extendida de PASSWD**

&lt;?php
$ds = ldap_connect("localhost");  // asumiendo que el servidor LDAP está en este host
if ($ds) {
// asignar el dn correcto para dar acceso de actualización
$bind = ldap_bind($ds, "cn=root, o=My Company, c=US", "secret");
if (!$bind) {
      echo "No se puede enlazar al servidor LDAP";
      exit;
    }
    // usar PASSWD EXOP para cambiar la contraseña del usuario por una generada
    $genpw = ldap_exop_passwd($ds, "cn=root, o=My Company, c=US", "secret");
if ($genpw) {
      // usar la contraseña generada para enlazar
      $bind = ldap_bind($ds, "cn=root, o=My Company, c=US", $genpw);
    }
    // restablece la contraseña a "secret"
    ldap_exop_passwd($ds, "cn=root, o=My Company, c=US", $genpw, "secret");
    ldap_close($ds);
} else {
echo "No se puede conectar al servidor LDAP";
}
?&gt;

### Ver también

    - [ldap_exop()](#function.ldap-exop) - Realiza una operación extendida

    - [ldap_parse_exop()](#function.ldap-parse-exop) - Analiza un objeto de resultado de una operación extendida LDAP

# ldap_exop_refresh

(PHP 7 &gt;= 7.3.0, PHP 8)

ldap_exop_refresh — Actualiza la ayuda de la operación extendida

### Descripción

**ldap_exop_refresh**([LDAP\Connection](#class.ldap-connection) $ldap, [string](#language.types.string) $dn, [int](#language.types.integer) $ttl): [int](#language.types.integer)|[false](#language.types.singleton)

Realiza una operación extendida de actualización y devuelve los datos.
Performs a Refresh extended operation and returns the data.

### Parámetros

    ldap


      An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






    dn


       dn de la entrada a actualizar.






    ttl


       El tiempo en segundos (entre 1 y 31557600) que
       el cliente solicita que la entrada exista en el directorio antes
       de ser eliminada automáticamente.


### Valores devueltos

Según la RFC:
El campo responseTtl es el tiempo en segundos que el servidor elige
como campo de tiempo de vida para esta entrada. No debe ser
menor que el solicitado por el cliente, y puede ser mayor.
Sin embargo, para permitir a los servidores mantener un directorio relativamente preciso,
y para evitar que los clientes abusen de las extensiones dinámicas, los servidores están autorizados
a acortar un valor de tiempo de vida solicitado por el cliente, hasta un mínimo de 86400 segundos (un día).

**[false](#constant.false)** será devuelto en caso de error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

### Ver también

    - [ldap_exop()](#function.ldap-exop) - Realiza una operación extendida

# ldap_exop_sync

(PHP 8 &gt;= 8.3.0)

ldap_exop_sync — Efectúa una operación extendida

### Descripción

**ldap_exop_sync**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [string](#language.types.string) $request_oid,
    [?](#language.types.null)[string](#language.types.string) $request_data = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**,
    [string](#language.types.string) &amp;$response_data = **[null](#constant.null)**,
    [string](#language.types.string) &amp;$response_oid = **[null](#constant.null)**
): [LDAP\Result](#class.ldap-result)|[bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     request_oid









     request_data









     controls









     response_data









     response_oid








### Valores devueltos

### Ver también

    - [ldap_exop()](#function.ldap-exop) - Realiza una operación extendida

# ldap_exop_whoami

(PHP 7 &gt;= 7.2.0, PHP 8)

ldap_exop_whoami — Ayuda de la operación extendida WHOAMI

### Descripción

**ldap_exop_whoami**([LDAP\Connection](#class.ldap-connection) $ldap): [string](#language.types.string)|[false](#language.types.singleton)

Realiza una operación extendida WHOAMI y devuelve los datos.

### Parámetros

    ldap


      An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).


### Valores devueltos

Los datos devueltos por el servidor, o **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

### Ver también

    - [ldap_exop()](#function.ldap-exop) - Realiza una operación extendida

# ldap_explode_dn

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_explode_dn — Separa los diferentes componentes de un DN

### Descripción

**ldap_explode_dn**([string](#language.types.string) $dn, [int](#language.types.integer) $with_attrib): [array](#language.types.array)|[false](#language.types.singleton)

Sirve para extraer los diferentes componentes del DN
dn. Cada componente se denomina Nombre Distinguido Relativo (Relative Distinguished Name o RDN).

### Parámetros

     dn


       El nombre DN de la entrada LDAP.






     with_attrib


       Sirve para especificar si los RDN se devuelven solos, o bien con sus
       atributos. Para obtener los atributos junto con los RDN
       (en formato atributo=valor), se debe asignar a with_attrib
       el valor de 0 y, en caso contrario, se le debe asignar el valor de 1.





### Valores devueltos

Devuelve un array de todos los componentes DN, o **[false](#constant.false)** si ocurre un error.
El primer elemento del array tiene una clave count
y representa el número de valores devueltos; los demás
elementos son los componentes DN indexados numéricamente.

# ldap_first_attribute

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_first_attribute — Retorna el primer atributo

### Descripción

**ldap_first_attribute**([LDAP\Connection](#class.ldap-connection) $ldap, LDAP\ResultEntry $entry): [string](#language.types.string)|[false](#language.types.singleton)

Retorna el primer atributo de la entrada proporcionada. Los demás atributos son leídos
mediante la función [ldap_next_attribute()](#function.ldap-next-attribute), llamada
tantas veces como sea necesario.

De manera similar a la lectura de las entradas, los atributos son leídos
uno tras otro, para una entrada.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     entry


       An [LDAP\ResultEntry](#class.ldap-result-entry) instance.





### Valores devueltos

Retorna el primer atributo de la entrada en caso de éxito, y
**[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

The entry parameter expects an [LDAP\ResultEntry](#class.ldap-result-entry)
instance now; previously, a valid ldap result entry [resource](#language.types.resource) was expected.

      8.0.0

       El tercer parámetro no utilizado ber_identifier ya no es aceptado.



### Ver también

    - [ldap_next_attribute()](#function.ldap-next-attribute) - Lee el siguiente atributo

    - [ldap_get_attributes()](#function.ldap-get-attributes) - Lee los atributos de una entrada

# ldap_first_entry

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_first_entry — Devuelve la primera entrada

### Descripción

**ldap_first_entry**([LDAP\Connection](#class.ldap-connection) $ldap, [LDAP\Result](#class.ldap-result) $result): LDAP\ResultEntry|[false](#language.types.singleton)

Devuelve la primera entrada del resultado. Las siguientes serán leídas
mediante la función [ldap_next_entry()](#function.ldap-next-entry),
llamándola tantas veces como sea necesario.

Las entradas de un resultado LDAP se leen secuencialmente con las funciones
**ldap_first_entry()** y
[ldap_next_entry()](#function.ldap-next-entry).

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     result


       An [LDAP\Result](#class.ldap-result) instance, returned by [ldap_list()](#function.ldap-list) or [ldap_search()](#function.ldap-search).





### Valores devueltos

Devuelve una instancia de [LDAP\ResultEntry](#class.ldap-result-entry), o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

The result parameter expects an [LDAP\Result](#class.ldap-result)
instance now; previously, a valid ldap result [resource](#language.types.resource) was expected.

8.1.0

Returns an [LDAP\ResultEntry](#class.ldap-result-entry) instance now;
previously, a [resource](#language.types.resource) was returned.

### Ver también

    - [ldap_get_entries()](#function.ldap-get-entries) - Lee todas las entradas del resultado

# ldap_first_reference

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

ldap_first_reference — Devuelve la primera referencia

### Descripción

**ldap_first_reference**([LDAP\Connection](#class.ldap-connection) $ldap, [LDAP\Result](#class.ldap-result) $result): LDAP\ResultEntry|[false](#language.types.singleton)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# ldap_free_result

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_free_result — Libera la memoria del resultado

### Descripción

**ldap_free_result**([LDAP\Result](#class.ldap-result) $result): [bool](#language.types.boolean)

Libera toda la memoria asignada internamente para almacenar el resultado
result_identifier. Si se omite la llamada a esta
función, toda la memoria será liberada automáticamente
al finalizar el script.

Típicamente, toda la memoria asignada para el resultado LDAP
es liberada al finalizar el script. Si el script realiza
búsquedas intensivas, que retornan resultados de gran tamaño,
**ldap_free_result()** puede ser utilizada
para reducir el consumo de memoria.

### Parámetros

     result


       An [LDAP\Result](#class.ldap-result) instance, returned by [ldap_list()](#function.ldap-list) or [ldap_search()](#function.ldap-search).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The result parameter expects an [LDAP\Result](#class.ldap-result)
instance now; previously, a valid ldap result [resource](#language.types.resource) was expected.

# ldap_get_attributes

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_get_attributes — Lee los atributos de una entrada

### Descripción

**ldap_get_attributes**([LDAP\Connection](#class.ldap-connection) $ldap, LDAP\ResultEntry $entry): [array](#language.types.array)

Lee los atributos y los valores para una entrada de un resultado de búsqueda.

Una vez que se ha identificado una entrada en un directorio, se pueden
obtener más información sobre ella con esta función. Podría ser utilizada
en el marco de una aplicación que mapea los directorios y las entradas. En
numerosas aplicaciones, se buscan entradas que posean un atributo preciso,
sin preocuparse por los otros atributos.

return_value["count"] = número de atributos en la entrada
return_value[0] = primer atributo
return_value[n] = n-ésimo atributo

return_value["attribute"]["count"] = número de valores del atributo
return_value["attribute"][0] = primera valor del atributo
return_value["attribute"][i] = (i+1)-ésimo valor del atributo

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     entry


       An [LDAP\ResultEntry](#class.ldap-result-entry) instance.





### Valores devueltos

Devuelve el detalle de las informaciones de una entrada bajo la
forma de un array multidimensional.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

The entry parameter expects an [LDAP\ResultEntry](#class.ldap-result-entry)
instance now; previously, a valid ldap result entry [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Muestra la lista de atributos de una entrada**

&lt;?php
// $ds debe ser una instancia de conexión LDAP\Connection válida

// $sr es una búsqueda válida, resultante de una operación
// previa

$entry = ldap_first_entry($ds, $sr);

$attrs = ldap_get_attributes($ds, $entry);

echo $attrs["count"] . " atributos en esta entrada :&lt;p&gt;";

for ($i=0; $i &lt; $attrs["count"]; $i++) {
    echo $attrs[$i] . "&lt;br /&gt;";
}
?&gt;

### Ver también

    - [ldap_first_attribute()](#function.ldap-first-attribute) - Retorna el primer atributo

    - [ldap_next_attribute()](#function.ldap-next-attribute) - Lee el siguiente atributo

# ldap_get_dn

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_get_dn — Lee el DN de una entrada

### Descripción

**ldap_get_dn**([LDAP\Connection](#class.ldap-connection) $ldap, LDAP\ResultEntry $entry): [string](#language.types.string)|[false](#language.types.singleton)

Lee el DN de una entrada de un resultado.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     entry


       An [LDAP\ResultEntry](#class.ldap-result-entry) instance.





### Valores devueltos

Devuelve el DN de la entrada del resultado, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

The entry parameter expects an [LDAP\ResultEntry](#class.ldap-result-entry)
instance now; previously, a valid ldap result entry [resource](#language.types.resource) was expected.

# ldap_get_entries

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_get_entries — Lee todas las entradas del resultado

### Descripción

**ldap_get_entries**([LDAP\Connection](#class.ldap-connection) $ldap, [LDAP\Result](#class.ldap-result) $result): [array](#language.types.array)|[false](#language.types.singleton)

Lee todas las entradas del resultado proporcionado, así como los atributos y los valores múltiples.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     result


       An [LDAP\Result](#class.ldap-result) instance, returned by [ldap_list()](#function.ldap-list) or [ldap_search()](#function.ldap-search).





### Valores devueltos

Devuelve todas las entradas del resultado en forma de
un array multidimensional, o **[false](#constant.false)** si ocurre un error.

La estructura del array es la siguiente.
El índice de atributo se convierte a minúsculas (los atributos son
sensibles a mayúsculas/minúsculas para los servidores de directorio, pero no lo son
cuando se utilizan como índices de arrays).

return_value["count"] = número de entradas en el resultado
return_value[0] : se refiere a los detalles de la primera entrada

return_value[i]["dn"] = DN de la i-ésima entrada del resultado

return_value[i]["count"] = número de atributos de la i-ésima entrada
return_value[i][j] = Nombre del j-ésimo atributo de la i-ésima entrada del resultado

return_value[i]["attribute"]["count"] = número de valores de los atributos de la i-ésima entrada
return_value[i]["attribute"][j] = j-ésimo valor de la i-ésima entrada

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

The result parameter expects an [LDAP\Result](#class.ldap-result)
instance now; previously, a valid ldap result [resource](#language.types.resource) was expected.

### Ver también

    - [ldap_first_entry()](#function.ldap-first-entry) - Devuelve la primera entrada

    - [ldap_next_entry()](#function.ldap-next-entry) - Lee la siguiente entrada

# ldap_get_option

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

ldap_get_option — Lee/escrit el valor actual de una opción

### Descripción

**ldap_get_option**([LDAP\Connection](#class.ldap-connection) $ldap, [int](#language.types.integer) $option, [array](#language.types.array)|[string](#language.types.string)|[int](#language.types.integer) &amp;$value = **[null](#constant.null)**): [bool](#language.types.boolean)

Establece el valor value a la opción especificada.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     option


       El parámetro option puede tomar uno de los siguientes valores:






           Opción
           Tipo
           Disponible a partir de






           **[LDAP_OPT_DEREF](#constant.ldap-opt-deref)**
           [int](#language.types.integer)
            



           **[LDAP_OPT_SIZELIMIT](#constant.ldap-opt-sizelimit)**
           [int](#language.types.integer)
            



           **[LDAP_OPT_TIMELIMIT](#constant.ldap-opt-timelimit)**
           [int](#language.types.integer)
            



           **[LDAP_OPT_NETWORK_TIMEOUT](#constant.ldap-opt-network-timeout)**
           [int](#language.types.integer)
            



           **[LDAP_OPT_PROTOCOL_VERSION](#constant.ldap-opt-protocol-version)**
           [int](#language.types.integer)
            



           **[LDAP_OPT_ERROR_NUMBER](#constant.ldap-opt-error-number)**
           [int](#language.types.integer)
            



           **[LDAP_OPT_DIAGNOSTIC_MESSAGE](#constant.ldap-opt-diagnostic-message)**
           [string](#language.types.string)
            



           **[LDAP_OPT_REFERRALS](#constant.ldap-opt-referrals)**
           [int](#language.types.integer)
            



           **[LDAP_OPT_RESTART](#constant.ldap-opt-restart)**
           [int](#language.types.integer)
            



           **[LDAP_OPT_HOST_NAME](#constant.ldap-opt-host-name)**
           [string](#language.types.string)
            



           **[LDAP_OPT_ERROR_STRING](#constant.ldap-opt-error-string)**
           [string](#language.types.string)
            



           **[LDAP_OPT_MATCHED_DN](#constant.ldap-opt-matched-dn)**
           [string](#language.types.string)
            



           **[LDAP_OPT_SERVER_CONTROLS](#constant.ldap-opt-server-controls)**
           [array](#language.types.array)
            



           **[LDAP_OPT_CLIENT_CONTROLS](#constant.ldap-opt-client-controls)**
           [array](#language.types.array)
            



           **[LDAP_OPT_X_KEEPALIVE_IDLE](#constant.ldap-opt-x-keepalive-idle)**
           [int](#language.types.integer)
           7.1



           **[LDAP_OPT_X_KEEPALIVE_PROBES](#constant.ldap-opt-x-keepalive-probes)**
           [int](#language.types.integer)
           7.1



           **[LDAP_OPT_X_KEEPALIVE_INTERVAL](#constant.ldap-opt-x-keepalive-interval)**
           [int](#language.types.integer)
           7.1



           **[LDAP_OPT_X_TLS_CACERTDIR](#constant.ldap-opt-x-tls-cacertdir)**
           string
           7.1



           **[LDAP_OPT_X_TLS_CACERTFILE](#constant.ldap-opt-x-tls-cacertfile)**
           [string](#language.types.string)
           7.1



           **[LDAP_OPT_X_TLS_CERTFILE](#constant.ldap-opt-x-tls-certfile)**
           [string](#language.types.string)
           7.1



           **[LDAP_OPT_X_TLS_CIPHER_SUITE](#constant.ldap-opt-x-tls-cipher-suite)**
           [string](#language.types.string)
           7.1



           **[LDAP_OPT_X_TLS_CRLCHECK](#constant.ldap-opt-x-tls-crlcheck)**
           [int](#language.types.integer)
           7.1



           **[LDAP_OPT_X_TLS_CRL_NONE](#constant.ldap-opt-x-tls-crl-none)**
           [int](#language.types.integer)
           7.1



           **[LDAP_OPT_X_TLS_CRL_PEER](#constant.ldap-opt-x-tls-crl-peer)**
           [int](#language.types.integer)
           7.1



           **[LDAP_OPT_X_TLS_CRL_ALL](#constant.ldap-opt-x-tls-crl-all)**
           [int](#language.types.integer)
           7.1



           **[LDAP_OPT_X_TLS_CRLFILE](#constant.ldap-opt-x-tls-crlfile)**
           [string](#language.types.string)
           7.1



           **[LDAP_OPT_X_TLS_DHFILE](#constant.ldap-opt-x-tls-dhfile)**
           [string](#language.types.string)
           7.1



           **[LDAP_OPT_X_TLS_KEYFILE](#constant.ldap-opt-x-tls-keyfile)**
           [string](#language.types.string)
           7.1



           **[LDAP_OPT_X_TLS_PACKAGE](#constant.ldap-opt-x-tls-package)**
           [string](#language.types.string)
           7.1



           **[LDAP_OPT_X_TLS_PROTOCOL_MIN](#constant.ldap-opt-x-tls-protocol-min)**
           [int](#language.types.integer)
           7.1



           **[LDAP_OPT_X_TLS_RANDOM_FILE](#constant.ldap-opt-x-tls-random-file)**
           [string](#language.types.string)
           7.1



           **[LDAP_OPT_X_TLS_REQUIRE_CERT](#constant.ldap-opt-x-tls-require-cert)**
           [int](#language.types.integer)
            










     value


       Valor a establecer para la opción.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Verificación de la versión del protocolo**

&lt;?php
// $ds debe ser una instancia válida de LDAP\Connection
if (ldap_get_option($ds, LDAP_OPT_PROTOCOL_VERSION, $version)) {
echo "Estamos utilizando el protocolo versión $version\n";
} else {
echo "No es posible determinar la versión del protocolo.\n";
}
?&gt;

### Notas

**Nota**:

    Esta función solo está disponible con OpenLDAP 2.x.x O Netscape
    Directory SDK x.x, y fue añadida en PHP 4.0.4.

### Ver también

    - [ldap_set_option()](#function.ldap-set-option) - Modifica el valor de una opción LDAP

# ldap_get_values

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_get_values — Lee todos los valores de una entrada LDAP

### Descripción

**ldap_get_values**([LDAP\Connection](#class.ldap-connection) $ldap, LDAP\ResultEntry $entry, [string](#language.types.string) $attribute): [array](#language.types.array)|[false](#language.types.singleton)

Lee todos los valores del atributo de una entrada en un resultado.

La llamada a esta función requiere una entry
y debe ser precedida por una búsqueda LDAP,
y una de las funciones que permiten acceder a una entrada.

La aplicación debe contener información que permita
leer ciertos atributos (como "nombre" o "mail"), o bien
deberá utilizarse la función [ldap_get_attributes()](#function.ldap-get-attributes)
para saber cuáles son los atributos que existen para una entrada dada.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     entry


       An [LDAP\ResultEntry](#class.ldap-result-entry) instance.






     attribute







### Valores devueltos

Devuelve un array de valores para el atributo, o **[false](#constant.false)** en caso de error.
El número de valores devueltos está disponible en el índice 'count' del array
devuelto. Los valores son accesibles individualmente, con los índices
numéricos del array. La indexación comienza en 0.

LDAP permite más de una entrada por atributo, lo que permite almacenar varias
direcciones de correo electrónico por persona, utilizando solo una etiqueta "mail":

    return_value["count"] = número de valores del atributo
    return_value[0] = primer valor del atributo
    return_value[i] = i-ésimo valor del atributo

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

The entry parameter expects an [LDAP\ResultEntry](#class.ldap-result-entry)
instance now; previously, a valid ldap result entry [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Lista todas las valores del atributo "mail" de una entrada**

&lt;?php
// $ds debe ser una instancia de conexión LDAP\Connection válida

// $sr debe ser un recurso de resultado válido, obtenido con una de las funciones de
// búsqueda LDAP.

// $entry es una entrada LDAP válida, obtenida con una de las funciones
// LDAP que devuelve una entrada

$values = ldap_get_values($ds, $entry,"mail");

echo $values["count"] . " direcciones de correo para esta entrada.&lt;br /&gt;";

for ($i=0; $i &lt; $values["count"]; $i++) {
    echo $values[$i] . "&lt;br /&gt;";
}
?&gt;

### Ver también

    - [ldap_get_values_len()](#function.ldap-get-values-len) - Lee todos los valores binarios de una entrada

# ldap_get_values_len

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_get_values_len — Lee todos los valores binarios de una entrada

### Descripción

**ldap_get_values_len**([LDAP\Connection](#class.ldap-connection) $ldap, LDAP\ResultEntry $entry, [string](#language.types.string) $attribute): [array](#language.types.array)|[false](#language.types.singleton)

Lee todos los valores binarios de una entrada de un resultado.

Esta función se utiliza exactamente como la función
[ldap_get_values()](#function.ldap-get-values), con la excepción de que maneja
datos binarios, y no strings.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     entry


       An [LDAP\ResultEntry](#class.ldap-result-entry) instance.






     attribute







### Valores devueltos

Devuelve un array de valores para el atributo en caso de éxito, y **[false](#constant.false)**
en caso de error. Los valores son accesibles individualmente, con los
índices numéricos del array. La indexación comienza en 0. El número
de valores devueltos está disponible en el índice 'count' del array devuelto.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

The entry parameter expects an [LDAP\ResultEntry](#class.ldap-result-entry)
instance now; previously, a valid ldap result entry [resource](#language.types.resource) was expected.

### Ver también

    - [ldap_get_values()](#function.ldap-get-values) - Lee todos los valores de una entrada LDAP

# ldap_list

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_list — Búsqueda en un nivel

### Descripción

**ldap_list**(
    [LDAP\Connection](#class.ldap-connection)|[array](#language.types.array) $ldap,
    [array](#language.types.array)|[string](#language.types.string) $base,
    [array](#language.types.array)|[string](#language.types.string) $filter,
    [array](#language.types.array) $attributes = [],
    [int](#language.types.integer) $attributes_only = 0,
    [int](#language.types.integer) $sizelimit = -1,
    [int](#language.types.integer) $timelimit = -1,
    [int](#language.types.integer) $deref = **[LDAP_DEREF_NEVER](#constant.ldap-deref-never)**,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**
): [LDAP\Result](#class.ldap-result)|[array](#language.types.array)|[false](#language.types.singleton)

Realiza una búsqueda con el filtro filter
en el directorio base_dn con la opción
**[LDAP_SCOPE_ONELEVEL](#constant.ldap-scope-onelevel)**.

**[LDAP_SCOPE_ONELEVEL](#constant.ldap-scope-onelevel)** indica que la búsqueda
solo puede devolver entradas en el nivel inmediatamente
inferior al nivel base (equivalente al comando **ls**,
para obtener la lista de archivos y directorios del directorio actual).

It is also possible to perform parallel searches. In this case, the first argument should be an array of
[LDAP\Connection](#class.ldap-connection) instances, rather than a single one.
If the searches should not all use the same base DN and filter, an array of base DNs and/or an array of filters can be passed as arguments instead.
These arrays must be of the same size as the [LDAP\Connection](#class.ldap-connection) instances array,
since the first entries of the arrays are used for one search, the second entries are used for another, and so on.
When doing parallel searches an array of [LDAP\Result](#class.ldap-result) instances is returned, except in case of error, when the return value will be **[false](#constant.false)**.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     base


       El DN base del directorio.






     filter








     attributes


       Un array de atributos requeridos, por ejemplo array("mail", "sn", "cn").
       Tenga en cuenta que el "dn" siempre se devuelve, independientemente del tipo de atributo
       solicitado.




       El uso de este argumento es más eficiente que el comportamiento por defecto
       (que es devolver todos los atributos junto con sus valores asociados).
       Por esta razón, el uso de este argumento debe considerarse una buena práctica.






     attributes_only


       Debe establecerse en 1 si solo se solicitan los tipos de atributos.
       Si se establece en 0, se recuperan los tipos y los valores de los atributos,
       lo que corresponde al comportamiento por defecto.






     sizelimit


       Permite limitar el número de entradas a recuperar. Establecer este argumento a 0
       significa que no habrá límite.



      **Nota**:



        Este argumento no puede sobrescribir la configuración del lado del servidor. Sin embargo,
        puede establecerse un valor inferior.




        Algunos servidores pueden estar configurados para devolver solo un número determinado de entradas.
        Si ocurre este comportamiento, el servidor indica que solo se ha devuelto un conjunto de resultados parcial.
        Este comportamiento también ocurre si se utiliza este argumento para limitar el número de entradas recuperadas.







     timelimit


       Define el número máximo de segundos permitidos para la búsqueda.
       Establecer este argumento a 0 significa que no hay límite.



      **Nota**:



        Este argumento no puede sobrescribir la configuración del lado del servidor pero puede utilizarse para ser más restrictivo.







     deref


       Especifica el número de alias que deben gestionarse durante la búsqueda.
       Puede ser uno de los siguientes:



        -

          **[LDAP_DEREF_NEVER](#constant.ldap-deref-never)** - (por defecto) los alias nunca se desreferencian.



        -

          **[LDAP_DEREF_SEARCHING](#constant.ldap-deref-searching)** - los alias deben desreferenciarse
          durante la búsqueda pero no al localizar el objeto base de la búsqueda.



        -

          **[LDAP_DEREF_FINDING](#constant.ldap-deref-finding)** - los alias deben desreferenciarse
          al localizar el objeto base pero no durante la búsqueda.



        -

          **[LDAP_DEREF_ALWAYS](#constant.ldap-deref-always)** - los alias siempre deben desreferenciarse.








     controls


       Array de [Controles LDAP](#ldap.controls) a enviar con la consulta.





### Valores devueltos

Returns an [LDAP\Result](#class.ldap-result) instance, an array of [LDAP\Result](#class.ldap-result) instances, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

Returns an [LDAP\Result](#class.ldap-result) instance now;
previously, a [resource](#language.types.resource) was returned.

8.0.0

controls is nullable now; previously, it defaulted to [].

       7.3.0

        Se añadió soporte para controls.





### Ejemplos

    **Ejemplo #1 Produce una lista de todos los servicios de una empresa**

&lt;?php
// $ds debe ser una instancia válida de LDAP\Connection

$basedn = "o=My Company, c=US";
$justthese = array("ou");

$sr = ldap_list($ds, $basedn, "ou=\*", $justthese);

$info = ldap_get_entries($ds, $sr);

for ($i=0; $i &lt; $info["count"]; $i++) {
    echo $info[$i]["ou"][0];
}
?&gt;

### Ver también

    - [ldap_search()](#function.ldap-search) - Búsqueda en el servidor LDAP

# ldap_mod_add

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_mod_add — Añade un atributo a la entrada actual

### Descripción

**ldap_mod_add**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [string](#language.types.string) $dn,
    [array](#language.types.array) $entry,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**
): [bool](#language.types.boolean)

Añade el atributo entry a la entrada dn.
Para añadir un nuevo objeto completo, consulte la función [ldap_add()](#function.ldap-add).

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     dn


       El nombre DN de la entrada LDAP.






     entry


       Array asociativo que enumera los valores de los atributos a añadir. Si
       un atributo no existía previamente, será añadido. Si un atributo existe,
       solo pueden añadirse valores si admite múltiples valores.






     controls


       Array de [Controles LDAP](#ldap.controls) a enviar con la petición.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.0.0

controls is nullable now; previously, it defaulted to [].

       7.3.0

        Se añadió soporte para controls.





### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [ldap_mod_add_ext()](#function.ldap-mod_add-ext) - Añade valores de atributo a los atributos actuales

    - [ldap_mod_del()](#function.ldap-mod-del) - Elimina un atributo de la entrada actual

    - [ldap_mod_replace()](#function.ldap-mod-replace) - Remplaza un atributo en la entrada actual

    - [ldap_modify_batch()](#function.ldap-modify-batch) - Agrupa modificaciones y las ejecuta en una entrada LDAP

# ldap_mod_add_ext

(PHP 7 &gt;= 7.3.0, PHP 8)

ldap_mod_add_ext — Añade valores de atributo a los atributos actuales

### Descripción

**ldap_mod_add_ext**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [string](#language.types.string) $dn,
    [array](#language.types.array) $entry,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**
): [LDAP\Result](#class.ldap-result)|[false](#language.types.singleton)

Realiza la misma operación que [ldap_mod_add()](#function.ldap-mod-add) pero devuelve una instancia
de [LDAP\Result](#class.ldap-result) para analizar con [ldap_parse_result()](#function.ldap-parse-result).

### Parámetros

    Consulte [ldap_mod_add()](#function.ldap-mod-add)

### Valores devueltos

Returns an [LDAP\Result](#class.ldap-result) instance, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

Returns an [LDAP\Result](#class.ldap-result) instance now;
previously, a [resource](#language.types.resource) was returned.

8.0.0

controls is nullable now; previously, it defaulted to [].

       7.3.0

        Se ha añadido el soporte para controls





### Ver también

    - [ldap_mod_add()](#function.ldap-mod-add) - Añade un atributo a la entrada actual

    - [ldap_parse_result()](#function.ldap-parse-result) - Extrae información de un resultado

# ldap_mod_del

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_mod_del — Elimina un atributo de la entrada actual

### Descripción

**ldap_mod_del**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [string](#language.types.string) $dn,
    [array](#language.types.array) $entry,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**
): [bool](#language.types.boolean)

Elimina uno o varios atributos de la entrada dn.
La eliminación de objetos se realiza mediante
[ldap_delete()](#function.ldap-delete).

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     dn


       El nombre DN de la entrada LDAP.






     entry








     controls


       Array de [Controles LDAP](#ldap.controls) a enviar con la petición.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.0.0

controls is nullable now; previously, it defaulted to [].

       7.3.0

        Se ha añadido soporte para controls.





### Ver también

    - [ldap_mod_del_ext()](#function.ldap-mod_del-ext) - Elimina valores de atributo de los atributos actuales

    - [ldap_mod_add()](#function.ldap-mod-add) - Añade un atributo a la entrada actual

    - [ldap_mod_replace()](#function.ldap-mod-replace) - Remplaza un atributo en la entrada actual

    - [ldap_modify_batch()](#function.ldap-modify-batch) - Agrupa modificaciones y las ejecuta en una entrada LDAP

# ldap_mod_del_ext

(PHP 7 &gt;= 7.3.0, PHP 8)

ldap_mod_del_ext — Elimina valores de atributo de los atributos actuales

### Descripción

**ldap_mod_del_ext**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [string](#language.types.string) $dn,
    [array](#language.types.array) $entry,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**
): [LDAP\Result](#class.ldap-result)|[false](#language.types.singleton)

Realiza la misma operación que [ldap_mod_del()](#function.ldap-mod-del) pero devuelve una instancia
de [LDAP\Result](#class.ldap-result) para analizar con [ldap_parse_result()](#function.ldap-parse-result).

### Parámetros

    Consulte [ldap_mod_del()](#function.ldap-mod-del)

### Valores devueltos

Returns an [LDAP\Result](#class.ldap-result) instance, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

Returns an [LDAP\Result](#class.ldap-result) instance now;
previously, a [resource](#language.types.resource) was returned.

8.0.0

controls is nullable now; previously, it defaulted to [].

       7.3.0

        Se ha añadido el soporte para controls





### Ver también

    - [ldap_mod_del()](#function.ldap-mod-del) - Elimina un atributo de la entrada actual

    - [ldap_parse_result()](#function.ldap-parse-result) - Extrae información de un resultado

# ldap_mod_replace

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_mod_replace — Remplaza un atributo en la entrada actual

### Descripción

**ldap_mod_replace**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [string](#language.types.string) $dn,
    [array](#language.types.array) $entry,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**
): [bool](#language.types.boolean)

Remplaza uno o varios atributos de la entrada dn.
También puede añadir o eliminar atributos.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     dn


       El nombre DN de la entrada LDAP.






     entry


       Array asociativo que enumera los atributos a reemplazar. El envío de un
       array vacío como valor eliminará el atributo, mientras que el envío de un atributo que no exista aún en esta entrada lo añadirá.






     controls


       Array de [Controles LDAP](#ldap.controls) a enviar con la petición.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.0.0

controls is nullable now; previously, it defaulted to [].

       7.3.0

        Soporte para controls ha sido añadido.





### Notas

**Nota**: Esta función es
segura para sistemas binarios.

### Ver también

    - [ldap_mod_replace_ext()](#function.ldap-mod_replace-ext) - Reemplaza los valores de atributo por otros nuevos

    - [ldap_mod_del()](#function.ldap-mod-del) - Elimina un atributo de la entrada actual

    - [ldap_mod_add()](#function.ldap-mod-add) - Añade un atributo a la entrada actual

    - [ldap_modify_batch()](#function.ldap-modify-batch) - Agrupa modificaciones y las ejecuta en una entrada LDAP

# ldap_mod_replace_ext

(PHP 7 &gt;= 7.3.0, PHP 8)

ldap_mod_replace_ext — Reemplaza los valores de atributo por otros nuevos

### Descripción

**ldap_mod_replace_ext**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [string](#language.types.string) $dn,
    [array](#language.types.array) $entry,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**
): [LDAP\Result](#class.ldap-result)|[false](#language.types.singleton)

Hace lo mismo que [ldap_mod_replace()](#function.ldap-mod-replace) pero devuelve una instancia
de [LDAP\Result](#class.ldap-result) para analizar con [ldap_parse_result()](#function.ldap-parse-result).

### Parámetros

    Véase [ldap_mod_replace()](#function.ldap-mod-replace)

### Valores devueltos

Returns an [LDAP\Result](#class.ldap-result) instance, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

Returns an [LDAP\Result](#class.ldap-result) instance now;
previously, a [resource](#language.types.resource) was returned.

8.0.0

controls is nullable now; previously, it defaulted to [].

       7.3.0

        Se ha añadido el soporte para controls





### Ver también

    - [ldap_mod_replace()](#function.ldap-mod-replace) - Remplaza un atributo en la entrada actual

    - [ldap_parse_result()](#function.ldap-parse-result) - Extrae información de un resultado

# ldap_modify

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_modify — Alias de [ldap_mod_replace()](#function.ldap-mod-replace)

### Descripción

Esta función es un alias de: [ldap_mod_replace()](#function.ldap-mod-replace).

### Ver también

    - [ldap_rename()](#function.ldap-rename) - Modifica el nombre de una entrada

# ldap_modify_batch

(PHP 5.4 &gt;= 5.4.26, PHP 5.5 &gt;= 5.5.10, PHP 5.6 &gt;= 5.6.0, PHP 7, PHP 8)

ldap_modify_batch — Agrupa modificaciones y las ejecuta en una entrada LDAP

### Descripción

**ldap_modify_batch**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [string](#language.types.string) $dn,
    [array](#language.types.array) $modifications_info,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**
): [bool](#language.types.boolean)

Modifica una entrada existente en un directorio LDAP. Permite
especificar de manera detallada las modificaciones a realizar.

### Parámetros

     ldap


       Un recurso LDAP, devuelto por la función
       [ldap_connect()](#function.ldap-connect).






     dn


       El nombre único de la entrada LDAP.






     modifications_info


       Un array que especifica las modificaciones a realizar. Cada entrada
       de este array es un array asociativo que contiene dos o tres claves:
       attrib corresponde al nombre del atributo a modificar,
       modtype corresponde al tipo de modificación a realizar,
       y (según el tipo de modificación) values corresponde
       a un array de valores de atributo correspondiente a la modificación.




       Los valores posibles para modtype son:




         **[LDAP_MODIFY_BATCH_ADD](#constant.ldap-modify-batch-add)**


           Cada valor especificado mediante values se añade
           (como valor adicional) al atributo nombrado por attrib.






         **[LDAP_MODIFY_BATCH_REMOVE](#constant.ldap-modify-batch-remove)**


           Cada valor especificado mediante values se elimina
           del atributo nombrado por attrib. Todos los
           valores del atributo que no estén presentes en el array
           values permanecerán sin cambios.






         **[LDAP_MODIFY_BATCH_REMOVE_ALL](#constant.ldap-modify-batch-remove-all)**


           Todos los valores se eliminan del atributo nombrado por
           attrib. No es necesario proporcionar una entrada values.






         **[LDAP_MODIFY_BATCH_REPLACE](#constant.ldap-modify-batch-replace)**


           Todos los valores actuales del atributo nombrado por
           attrib se reemplazan con los valores
           especificados mediante el array values.








       Tenga en cuenta que todos los valores de attrib deben ser
       strings, todos los valores de values
       deben ser un array de strings, y todos los valores
       de modtype deben ser una de las constantes
       LDAP_MODIFY_BATCH_*.






     controls


       Array de [Controles LDAP](#ldap.controls) a enviar con la petición.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.0.0

controls is nullable now; previously, it defaulted to [].

       7.3.0

        Se ha añadido soporte para controls.





### Ejemplos

    **Ejemplo #1 Añadir un número de teléfono a un contacto**

&lt;?php
$dn = "cn=John Smith,ou=Wizards,dc=example,dc=com";
$modifs = [
[
"attrib" =&gt; "telephoneNumber",
"modtype" =&gt; LDAP_MODIFY_BATCH_ADD,
"values" =&gt; ["+1 555 555 1717"],
],
];
ldap_modify_batch($connection, $dn, $modifs);
?&gt;

    **Ejemplo #2 Renombrar un usuario**

&lt;?php
$dn = "cn=John Smith,ou=Wizards,dc=example,dc=com";
$modifs = [
[
"attrib" =&gt; "sn",
"modtype" =&gt; LDAP_MODIFY_BATCH_REPLACE,
"values" =&gt; ["Smith-Jones"],
],
[
"attrib" =&gt; "givenName",
"modtype" =&gt; LDAP_MODIFY_BATCH_REPLACE,
"values" =&gt; ["Jack"],
],
];
ldap_modify_batch($connection, $dn, $modifs);
ldap_rename($connection, $dn, "cn=Jack Smith-Jones", NULL, TRUE);
?&gt;

    **Ejemplo #3 Añadir dos direcciones de correo electrónico a un usuario**

&lt;?php
$dn = "cn=Jack Smith-Jones,ou=Wizards,dc=example,dc=com";
$modifs = [
[
"attrib" =&gt; "mail",
"modtype" =&gt; LDAP_MODIFY_BATCH_ADD,
"values" =&gt; [
"jack.smith@example.com",
"jack.smith-jones@example.com",
],
],
];
ldap_modify_batch($connection, $dn, $modifs);
?&gt;

    **Ejemplo #4 Modificar la contraseña de un usuario**

&lt;?php
$dn = "cn=Jack Smith-Jones,ou=Wizards,dc=example,dc=com";
$modifs = [
[
"attrib" =&gt; "userPassword",
"modtype" =&gt; LDAP_MODIFY_BATCH_REMOVE,
"values" =&gt; ["Tr0ub4dor&amp;3"],
],
[
"attrib" =&gt; "userPassword",
"modtype" =&gt; LDAP_MODIFY_BATCH_ADD,
"values" =&gt; ["correct horse battery staple"],
],
];
ldap_modify_batch($connection, $dn, $modifs);
?&gt;

    **Ejemplo #5 Modificar la contraseña de un usuario (Active Directory)**

&lt;?php
function adifyPw($pw)
{
return iconv("UTF-8", "UTF-16LE", '"' . $pw . '"');
}

$dn = "cn=Jack Smith-Jones,ou=Wizards,dc=ad,dc=example,dc=com";
$modifs = [
[
"attrib" =&gt; "unicodePwd",
"modtype" =&gt; LDAP_MODIFY_BATCH_REMOVE,
"values" =&gt; [adifyPw("Tr0ub4dor&amp;3")],
],
[
"attrib" =&gt; "unicodePwd",
"modtype" =&gt; LDAP_MODIFY_BATCH_ADD,
"values" =&gt; [adifyPw("correct horse battery staple")],
],
];
ldap_modify_batch($connection, $dn, $modifs);

# ldap_next_attribute

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_next_attribute — Lee el siguiente atributo

### Descripción

**ldap_next_attribute**([LDAP\Connection](#class.ldap-connection) $ldap, LDAP\ResultEntry $entry): [string](#language.types.string)|[false](#language.types.singleton)

Lee el siguiente atributo de una entrada. La primera llamada a
**ldap_next_attribute()** se realiza con el
entry devuelto por
[ldap_first_attribute()](#function.ldap-first-attribute).

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     entry


       An [LDAP\ResultEntry](#class.ldap-result-entry) instance.





### Valores devueltos

Devuelve el siguiente atributo de la entrada en caso de éxito, y
**[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

The entry parameter expects an [LDAP\ResultEntry](#class.ldap-result-entry)
instance now; previously, a valid ldap result entry [resource](#language.types.resource) was expected.

      8.0.0

       El tercer argumento no utilizado ber_identifier ya no es aceptado.



### Ver también

    - [ldap_get_attributes()](#function.ldap-get-attributes) - Lee los atributos de una entrada

# ldap_next_entry

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_next_entry — Lee la siguiente entrada

### Descripción

**ldap_next_entry**([LDAP\Connection](#class.ldap-connection) $ldap, LDAP\ResultEntry $entry): LDAP\ResultEntry|[false](#language.types.singleton)

Lee la siguiente entrada del resultado. Llamadas repetidas a
**ldap_next_entry()** devolverán
todas las entradas hasta que no queden más. La primera llamada
debe realizarse con la función [ldap_first_entry()](#function.ldap-first-entry).
El argumento entry es aquel
que fue devuelto por la función [ldap_first_entry()](#function.ldap-first-entry).

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     entry


       An [LDAP\ResultEntry](#class.ldap-result-entry) instance.





### Valores devueltos

Devuelve una instancia de [LDAP\ResultEntry](#class.ldap-result-entry) para la siguiente entrada del resultado, donde
la primera entrada fue leída por la función [ldap_first_entry()](#function.ldap-first-entry).
Si no hay más entradas en el resultado, **[false](#constant.false)** es devuelto.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

The entry parameter expects an [LDAP\ResultEntry](#class.ldap-result-entry)
instance now; previously, a valid ldap result entry [resource](#language.types.resource) was expected.

8.1.0

Returns an [LDAP\Result](#class.ldap-result) instance now;
previously, a [resource](#language.types.resource) was returned.

### Ver también

    - [ldap_get_entries()](#function.ldap-get-entries) - Lee todas las entradas del resultado

# ldap_next_reference

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

ldap_next_reference — Lee la referencia siguiente

### Descripción

**ldap_next_reference**([LDAP\Connection](#class.ldap-connection) $ldap, LDAP\ResultEntry $entry): LDAP\ResultEntry|[false](#language.types.singleton)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# ldap_parse_exop

(PHP 7 &gt;= 7.2.0, PHP 8)

ldap_parse_exop — Analiza un objeto de resultado de una operación extendida LDAP

### Descripción

**ldap_parse_exop**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [LDAP\Result](#class.ldap-result) $result,
    [string](#language.types.string) &amp;$response_data = **[null](#constant.null)**,
    [string](#language.types.string) &amp;$response_oid = **[null](#constant.null)**
): [bool](#language.types.boolean)

Analiza los datos de una operación extendida LDAP a partir de un objeto de resultado result.

### Parámetros

    ldap


      An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






    result


      An [LDAP\Result](#class.ldap-result) instance, returned by [ldap_list()](#function.ldap-list) or [ldap_search()](#function.ldap-search).






    response_data


       Será rellenado con los datos de respuesta.






    response_oid


       Será rellenado con el OID de respuesta.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

The result parameter expects an [LDAP\Result](#class.ldap-result)
instance now; previously, a valid ldap result [resource](#language.types.resource) was expected.

### Ver también

    - [ldap_exop()](#function.ldap-exop) - Realiza una operación extendida

# ldap_parse_reference

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

ldap_parse_reference — Extrae las informaciones de una referencia de entrada

### Descripción

**ldap_parse_reference**([LDAP\Connection](#class.ldap-connection) $ldap, LDAP\ResultEntry $entry, [array](#language.types.array) &amp;$referrals): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# ldap_parse_result

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

ldap_parse_result — Extrae información de un resultado

### Descripción

**ldap_parse_result**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [LDAP\Result](#class.ldap-result) $result,
    [int](#language.types.integer) &amp;$error_code,
    [string](#language.types.string) &amp;$matched_dn = **[null](#constant.null)**,
    [string](#language.types.string) &amp;$error_message = **[null](#constant.null)**,
    [array](#language.types.array) &amp;$referrals = **[null](#constant.null)**,
    [array](#language.types.array) &amp;$controls = **[null](#constant.null)**
): [bool](#language.types.boolean)

Analiza un resultado de búsqueda LDAP.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     result


       An [LDAP\Result](#class.ldap-result) instance, returned by [ldap_list()](#function.ldap-list) or [ldap_search()](#function.ldap-search).






     error_code


       Una referencia a una variable que será valorizada con el código de error
       LDAP en el resultado, o con 0 si no ha ocurrido ningún error.






     matched_dn


       Una referencia a una variable que será valorizada con el DN correspondiente
       si ha sido reconocido en la consulta, de lo contrario, valdrá **[null](#constant.null)**.






     error_message


       Una referencia a una variable que será valorizada con el mensaje de error LDAP
       en el resultado, o con una cadena vacía si no ha ocurrido ningún error.






     referrals


       Una referencia a una variable que será valorizada con un array
       conteniendo las cadenas de referencia en el resultado, o un array
       vacío si no se devuelve ninguna referencia.






     controls


       Array de [Controles LDAP](#ldap.controls) a enviar con la consulta.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

The result parameter expects an [LDAP\Result](#class.ldap-result)
instance now; previously, a valid ldap result [resource](#language.types.resource) was expected.

       7.3.0

        Se ha añadido soporte para controls.





### Ejemplos

    **Ejemplo #1 Ejemplo con ldap_parse_result()**



     &lt;?php

$result = ldap_search($ldap, "cn=userref,dc=my-domain,dc=com", "(cn=user\*)");
$errcode = $dn = $errmsg = $refs =  null;
if (ldap_parse_result($ldap, $result, $errcode, $dn, $errmsg, $refs)) {
// realice algunas acciones con $errcode, $dn, $errmsg y $refs
}
?&gt;

# ldap_read

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_read — Lee una entrada

### Descripción

**ldap_read**(
    [LDAP\Connection](#class.ldap-connection)|[array](#language.types.array) $ldap,
    [array](#language.types.array)|[string](#language.types.string) $base,
    [array](#language.types.array)|[string](#language.types.string) $filter,
    [array](#language.types.array) $attributes = [],
    [int](#language.types.integer) $attributes_only = 0,
    [int](#language.types.integer) $sizelimit = -1,
    [int](#language.types.integer) $timelimit = -1,
    [int](#language.types.integer) $deref = **[LDAP_DEREF_NEVER](#constant.ldap-deref-never)**,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**
): [LDAP\Result](#class.ldap-result)|[array](#language.types.array)|[false](#language.types.singleton)

Realiza una búsqueda con el filtro filter
en el directorio base con la configuración
**[LDAP_SCOPE_BASE](#constant.ldap-scope-base)**. Esto es equivalente a leer una
entrada en un directorio.

It is also possible to perform parallel searches. In this case, the first argument should be an array of
[LDAP\Connection](#class.ldap-connection) instances, rather than a single one.
If the searches should not all use the same base DN and filter, an array of base DNs and/or an array of filters can be passed as arguments instead.
These arrays must be of the same size as the [LDAP\Connection](#class.ldap-connection) instances array,
since the first entries of the arrays are used for one search, the second entries are used for another, and so on.
When doing parallel searches an array of [LDAP\Result](#class.ldap-result) instances is returned, except in case of error, when the return value will be **[false](#constant.false)**.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     base


       La base DN del directorio.






     filter


       Un filtro no puede estar vacío. Si se desea leer toda la información
       de una entrada, utilice el filtro "objectClass=*".
       Si se conocen los tipos utilizados en el servidor de directorios, también
       puede emplearse un filtro adecuado, como
       "objectClass=inetOrgPerson".






     attributes


       Un array de atributos requeridos, por ejemplo array("mail", "sn", "cn").
       Tenga en cuenta que el "dn" siempre se devuelve, independientemente del tipo
       de atributo solicitado.




       El uso de este argumento es más eficiente que el comportamiento por omisión
       (que consiste en devolver todos los atributos junto con sus valores asociados).
       Por esta razón, el uso de este argumento debe considerarse una buena práctica.






     attributes_only


       Debe establecerse en 1 si solo se solicitan los tipos de atributos.
       Si se establece en 0, se recuperan tanto los tipos como los valores
       de los atributos, lo que corresponde al comportamiento por omisión.






     sizelimit


       Permite limitar el número de entradas a recuperar. Establecer este argumento
       en 0 significa que no habrá límite.



      **Nota**:



        Este argumento no puede sobrescribir la configuración del lado del servidor.
        No obstante, puede establecerse un valor inferior.




        Algunos servidores de directorios pueden estar configurados para devolver
        solo un número determinado de entradas. Si ocurre este comportamiento, el
        servidor indica que solo se ha devuelto un conjunto parcial de resultados.
        Este comportamiento también se produce si se utiliza este argumento para
        limitar el número de entradas recuperadas.







     timelimit


       Define el número máximo de segundos permitidos para la búsqueda.
       Establecer este argumento en 0 significa que no hay límite.



      **Nota**:



        Este argumento no puede sobrescribir la configuración del lado del servidor
        pero puede utilizarse para ser más restrictivo.







     deref


       Especifica el número de alias que deben gestionarse durante la búsqueda.
       Puede ser uno de los siguientes:



        -

          **[LDAP_DEREF_NEVER](#constant.ldap-deref-never)** - (por omisión) los alias no se
          desreferencian nunca.



        -

          **[LDAP_DEREF_SEARCHING](#constant.ldap-deref-searching)** - los alias deben desreferenciarse
          durante la búsqueda pero no al localizar el objeto base de la búsqueda.



        -

          **[LDAP_DEREF_FINDING](#constant.ldap-deref-finding)** - los alias deben desreferenciarse
          al localizar el objeto base pero no durante la búsqueda.



        -

          **[LDAP_DEREF_ALWAYS](#constant.ldap-deref-always)** - los alias deben desreferenciarse
          siempre.








     controls


       Array de [Controles LDAP](#ldap.controls) a enviar con la petición.





### Valores devueltos

Returns an [LDAP\Result](#class.ldap-result) instance, an array of [LDAP\Result](#class.ldap-result) instances, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

Returns an [LDAP\Result](#class.ldap-result) instance now;
previously, a [resource](#language.types.resource) was returned.

8.0.0

controls is nullable now; previously, it defaulted to [].

       7.3.0

        Se añadió soporte para controls.





# ldap_rename

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

ldap_rename — Modifica el nombre de una entrada

### Descripción

**ldap_rename**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [string](#language.types.string) $dn,
    [string](#language.types.string) $new_rdn,
    [string](#language.types.string) $new_parent,
    [bool](#language.types.boolean) $delete_old_rdn,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**
): [bool](#language.types.boolean)

Modifica la entrada dn, tanto en su nombre como en su ubicación.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     dn


       El nombre DN de la entrada LDAP.






     new_rdn


       El nuevo RDN.






     new_parent


       La nueva entrada padre/superior.






     delete_old_rdn


       Si este argumento vale **[true](#constant.true)**, el valor RDN antiguo
       es eliminado. De lo contrario, se conserva como
       un valor no distinguido.






     controls


       Array de [Controles LDAP](#ldap.controls) a enviar con la petición.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.0.0

controls is nullable now; previously, it defaulted to [].

       7.3.0

        Soporte para controls ha sido añadido.





### Notas

**Nota**:

    **ldap_rename()** actualmente solo funciona con
    LDAPv3. Puede ser necesario utilizar [ldap_set_option()](#function.ldap-set-option)
    antes de conectarse para poder usar LDAPv3. Esta función solo
    está disponible cuando se utiliza OpenLDAP 2.x.x O
    Netscape Directory SDK x.x.

### Ver también

    - [ldap_rename_ext()](#function.ldap-rename-ext) - Cambia el nombre de una entrada

    - [ldap_modify()](#function.ldap-modify) - Alias de ldap_mod_replace

# ldap_rename_ext

(PHP 7 &gt;= 7.3.0, PHP 8)

ldap_rename_ext — Cambia el nombre de una entrada

### Descripción

**ldap_rename_ext**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [string](#language.types.string) $dn,
    [string](#language.types.string) $new_rdn,
    [string](#language.types.string) $new_parent,
    [bool](#language.types.boolean) $delete_old_rdn,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**
): [LDAP\Result](#class.ldap-result)|[false](#language.types.singleton)

Realiza la misma operación que [ldap_rename()](#function.ldap-rename) pero devuelve una instancia
de [LDAP\Result](#class.ldap-result) para analizar con [ldap_parse_result()](#function.ldap-parse-result).

### Parámetros

    Consulte [ldap_rename()](#function.ldap-rename)

### Valores devueltos

Returns an [LDAP\Result](#class.ldap-result) instance, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

Returns an [LDAP\Result](#class.ldap-result) instance now;
previously, a [resource](#language.types.resource) was returned.

8.0.0

controls is nullable now; previously, it defaulted to [].

       7.3.0

        Se ha añadido el soporte para controls





### Ver también

    - [ldap_rename()](#function.ldap-rename) - Modifica el nombre de una entrada

    - [ldap_parse_result()](#function.ldap-parse-result) - Extrae información de un resultado

# ldap_sasl_bind

(PHP 5, PHP 7, PHP 8)

ldap_sasl_bind — Autenticación en el servidor LDAP utilizando SASL

### Descripción

**ldap_sasl_bind**(
    [LDAP\Connection](#class.ldap-connection) $ldap,
    [?](#language.types.null)[string](#language.types.string) $dn = **[null](#constant.null)**,
    [#[\SensitiveParameter]](class.sensitiveparameter.html) [?](#language.types.null)[string](#language.types.string) $password = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $mech = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $realm = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $authc_id = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $authz_id = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $props = **[null](#constant.null)**
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

      8.0.0

       dn, password, mech,
       realm, authc_id, authz_id
       y props ahora son nulos.



### Notas

**Nota**:
**Condiciones de uso**

    **ldap_sasl_bind()** requiere soporte SASL
    (sasl.h). Asegúrese de que la opción de configuración
    --with-ldap-sasl se utilice durante la compilación de PHP,
    de lo contrario, esta función no estará definida.

# ldap_search

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_search — Búsqueda en el servidor LDAP

### Descripción

**ldap_search**(
    [LDAP\Connection](#class.ldap-connection)|[array](#language.types.array) $ldap,
    [array](#language.types.array)|[string](#language.types.string) $base,
    [array](#language.types.array)|[string](#language.types.string) $filter,
    [array](#language.types.array) $attributes = [],
    [int](#language.types.integer) $attributes_only = 0,
    [int](#language.types.integer) $sizelimit = -1,
    [int](#language.types.integer) $timelimit = -1,
    [int](#language.types.integer) $deref = **[LDAP_DEREF_NEVER](#constant.ldap-deref-never)**,
    [?](#language.types.null)[array](#language.types.array) $controls = **[null](#constant.null)**
): [LDAP\Result](#class.ldap-result)|[array](#language.types.array)|[false](#language.types.singleton)

Realiza una búsqueda con el filtro filter en el
directorio base_dn con la configuración
**[LDAP_SCOPE_SUBTREE](#constant.ldap-scope-subtree)**. Es equivalente
a una búsqueda en el directorio.

It is also possible to perform parallel searches. In this case, the first argument should be an array of
[LDAP\Connection](#class.ldap-connection) instances, rather than a single one.
If the searches should not all use the same base DN and filter, an array of base DNs and/or an array of filters can be passed as arguments instead.
These arrays must be of the same size as the [LDAP\Connection](#class.ldap-connection) instances array,
since the first entries of the arrays are used for one search, the second entries are used for another, and so on.
When doing parallel searches an array of [LDAP\Result](#class.ldap-result) instances is returned, except in case of error, when the return value will be **[false](#constant.false)**.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).






     base


       La base DN para el directorio.






     filter


       El filtro de búsqueda puede ser simple o avanzado, y utilizar estos
       operadores booleanos en el formato descrito en la documentación LDAP
       (consultar [» Netscape Directory SDK](https://wiki.mozilla.org/Mozilla_LDAP_SDK_Programmer%27s_Guide/Searching_the_Directory_With_LDAP_C_SDK)
       o [» RFC4515](https://datatracker.ietf.org/doc/html/rfc4515) para más información sobre los filtros).






     attributes


       Un array de atributos requeridos, por ejemplo array("mail", "sn", "cn").
       Tenga en cuenta que el "dn" siempre se devuelve, independientemente del tipo de atributo
       solicitado.




       El uso de este argumento es más eficiente que la acción por defecto
       (que es devolver todos los atributos junto con sus valores asociados).
       El uso de este argumento debe considerarse por tanto una buena práctica.






     attributes_only


       Debe establecerse en 1 si solo se solicitan los tipos de atributos.
       Si se establece en 0, se recuperan los tipos y los valores de los atributos,
       lo que corresponde al comportamiento por defecto.






     sizelimit


       Permite limitar el número de entradas a recuperar. Establecer este
       argumento a 0 significa que no habrá límite.



      **Nota**:



        Este argumento no puede sobrescribir la configuración del lado del servidor. Sin embargo,
        puede establecerse un valor inferior.




        Algunos directorios del servidor pueden estar configurados para devolver
        solo un número determinado de entradas. Si ocurre este comportamiento, el servidor
        indica que solo se ha devuelto un conjunto de resultados parcial. Este comportamiento
        también ocurre si se utiliza este argumento para limitar el número de entradas recuperadas.







     timelimit


       Define el número máximo de segundos permitidos para la búsqueda.
       Establecer este argumento a 0 significa que no hay límite.



      **Nota**:



        Este argumento no puede sobrescribir la configuración del lado del servidor pero puede utilizarse para ser más restrictivo.







     deref


       Especifica el número de alias que deben gestionarse durante la búsqueda.
       Puede ser uno de los siguientes:



        -

          **[LDAP_DEREF_NEVER](#constant.ldap-deref-never)** - (por defecto) los alias nunca se desreferencian.



        -

          **[LDAP_DEREF_SEARCHING](#constant.ldap-deref-searching)** - los alias deben desreferenciarse
          durante la búsqueda pero no al localizar el objeto base de la búsqueda.



        -

          **[LDAP_DEREF_FINDING](#constant.ldap-deref-finding)** - los alias deben desreferenciarse
          al localizar el objeto base pero no durante la búsqueda.



        -

          **[LDAP_DEREF_ALWAYS](#constant.ldap-deref-always)** - los alias siempre deben
          desreferenciarse.








     controls


       Array de [Controles LDAP](#ldap.controls) a enviar con la petición.





### Valores devueltos

Returns an [LDAP\Result](#class.ldap-result) instance, an array of [LDAP\Result](#class.ldap-result) instances, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

8.1.0

Returns an [LDAP\Result](#class.ldap-result) instance now;
previously, a [resource](#language.types.resource) was returned.

8.0.0

controls is nullable now; previously, it defaulted to [].

       7.3.0

        Se añadió soporte para controls.





### Ejemplos

El ejemplo siguiente lee el nombre del servicio, el nombre, el apellido y
el email de los empleados de la empresa "Mi Compañía", cuyo nombre o apellido
contiene la subcadena: $person.
Este ejemplo ilustra el uso de filtros para indicar al
servidor que realice una búsqueda en dos atributos.

    **Ejemplo #1 Búsqueda LDAP**

&lt;?php
// $ds es una instancia válida de conexión LDAP\Connection para un servidor de directorio.

// $person es un nombre o parte de un nombre (por ejemplo, "Jean")

$dn = "o=My Company, c=US";
$filter="(|(sn=$person*)(givenname=$person\*))";
$justthese = array("ou", "sn", "givenname", "mail");

$sr=ldap_search($ds, $dn, $filter, $justthese);

$info = ldap_get_entries($ds, $sr);

echo $info["count"]." entradas devueltas\n";
?&gt;

# ldap_set_option

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

ldap_set_option — Modifica el valor de una opción LDAP

### Descripción

**ldap_set_option**([?](#language.types.null)[LDAP\Connection](#class.ldap-connection) $ldap, [int](#language.types.integer) $option, [array](#language.types.array)|[string](#language.types.string)|[int](#language.types.integer)|[bool](#language.types.boolean) $value): [bool](#language.types.boolean)

Modifica el valor de la opción option reemplazando el valor
actual por value.

### Parámetros

     ldap


       Puede ser una instancia [LDAP\Connection](#class.ldap-connection), devuelta por [ldap_connect()](#function.ldap-connect),
       para definir la opción para esta conexión, o **[null](#constant.null)** para definir la opción globalmente.






     option


       El parámetro option puede tomar uno de los siguientes valores:






           Opción
           Tipo
           Disponible a partir de






           **[LDAP_OPT_DEREF](#constant.ldap-opt-deref)**
           [int](#language.types.integer)
            



           **[LDAP_OPT_SIZELIMIT](#constant.ldap-opt-sizelimit)**
           [int](#language.types.integer)
            



           **[LDAP_OPT_TIMELIMIT](#constant.ldap-opt-timelimit)**
           [int](#language.types.integer)
            



           **[LDAP_OPT_NETWORK_TIMEOUT](#constant.ldap-opt-network-timeout)**
           [int](#language.types.integer)
            



           **[LDAP_OPT_PROTOCOL_VERSION](#constant.ldap-opt-protocol-version)**
           [int](#language.types.integer)
            



           **[LDAP_OPT_ERROR_NUMBER](#constant.ldap-opt-error-number)**
           [int](#language.types.integer)
            



           **[LDAP_OPT_REFERRALS](#constant.ldap-opt-referrals)**
           [bool](#language.types.boolean)
            



           **[LDAP_OPT_RESTART](#constant.ldap-opt-restart)**
           [bool](#language.types.boolean)
            



           **[LDAP_OPT_HOST_NAME](#constant.ldap-opt-host-name)**
           [string](#language.types.string)
            



           **[LDAP_OPT_ERROR_STRING](#constant.ldap-opt-error-string)**
           [string](#language.types.string)
            



           **[LDAP_OPT_DIAGNOSTIC_MESSAGE](#constant.ldap-opt-diagnostic-message)**
           [string](#language.types.string)
            



           **[LDAP_OPT_MATCHED_DN](#constant.ldap-opt-matched-dn)**
           [string](#language.types.string)
            



           **[LDAP_OPT_SERVER_CONTROLS](#constant.ldap-opt-server-controls)**
           [array](#language.types.array)
            



           **[LDAP_OPT_CLIENT_CONTROLS](#constant.ldap-opt-client-controls)**
           [array](#language.types.array)
            



           **[LDAP_OPT_X_KEEPALIVE_IDLE](#constant.ldap-opt-x-keepalive-idle)**
           [int](#language.types.integer)
           PHP 7.1.0



           **[LDAP_OPT_X_KEEPALIVE_PROBES](#constant.ldap-opt-x-keepalive-probes)**
           [int](#language.types.integer)
           PHP 7.1.0



           **[LDAP_OPT_X_KEEPALIVE_INTERVAL](#constant.ldap-opt-x-keepalive-interval)**
           [int](#language.types.integer)
           PHP 7.1.0



           **[LDAP_OPT_X_TLS_CACERTDIR](#constant.ldap-opt-x-tls-cacertdir)**
           [string](#language.types.string)
           PHP 7.1.0



           **[LDAP_OPT_X_TLS_CACERTFILE](#constant.ldap-opt-x-tls-cacertfile)**
           [string](#language.types.string)
           PHP 7.1.0



           **[LDAP_OPT_X_TLS_CERTFILE](#constant.ldap-opt-x-tls-certfile)**
           [string](#language.types.string)
           PHP 7.1.0



           **[LDAP_OPT_X_TLS_CIPHER_SUITE](#constant.ldap-opt-x-tls-cipher-suite)**
           [string](#language.types.string)
           PHP 7.1.0



           **[LDAP_OPT_X_TLS_CRLCHECK](#constant.ldap-opt-x-tls-crlcheck)**
           [int](#language.types.integer)
           PHP 7.1.0



           **[LDAP_OPT_X_TLS_CRLFILE](#constant.ldap-opt-x-tls-crlfile)**
           [string](#language.types.string)
           PHP 7.1.0



           **[LDAP_OPT_X_TLS_DHFILE](#constant.ldap-opt-x-tls-dhfile)**
           [string](#language.types.string)
           PHP 7.1.0



           **[LDAP_OPT_X_TLS_KEYILE](#constant.ldap-opt-x-tls-keyile)**
           [string](#language.types.string)
           PHP 7.1.0



           **[LDAP_OPT_X_TLS_PROTOCOL_MIN](#constant.ldap-opt-x-tls-protocol-min)**
           [int](#language.types.integer)
           PHP 7.1.0



           **[LDAP_OPT_X_TLS_RANDOM_FILE](#constant.ldap-opt-x-tls-random-file)**
           [string](#language.types.string)
           PHP 7.1.0



           **[LDAP_OPT_X_TLS_REQUIRE_CERT](#constant.ldap-opt-x-tls-require-cert)**
           [int](#language.types.integer)
           PHP 7.0.5








       Las opciones **[LDAP_OPT_SERVER_CONTROLS](#constant.ldap-opt-server-controls)** y
       **[LDAP_OPT_CLIENT_CONTROLS](#constant.ldap-opt-client-controls)** requieren una
       lista de controles, lo que significa que el valor debe ser un array de controles.
       Un control está compuesto por un *oid*
       como identificador, un valor opcional *value*,
       y un flag opcional de "criticalidad" (*criticality*). En PHP,
       un control se define como un array, por lo que las claves son
       *oid* con una cadena como valor, y dos claves
       opcionales. Estas claves son *value* con una
       cadena como valor, y *iscritical* con un valor
       booleano. Por omisión, *iscritical* vale ***[false](#constant.false)***. Ver
       el archivo [» draft-ietf-ldapext-ldap-c-api-xx.txt](https://www.ietf.org/proceedings/50/I-D/ldapext-ldap-c-api-05.txt)
       para más detalles. Consulte el segundo ejemplo para una ilustración.



      **Nota**:



        Todas las opciones TLS deben ser definidas globalmente antes
        de [ldap_connect()](#function.ldap-connect) para una conexión ldaps, o
        para la conexión antes de [ldap_start_tls()](#function.ldap-start-tls).







     value


       El nuevo valor para la opción option especificada.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Modificación de la versión del protocolo**

&lt;?php
// $ds debe ser una instancia de conexión LDAP\Connection válida
if (ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3)) {
echo "Versión LDAPv3";
} else {
echo "No es posible modificar la versión del protocolo a 3";
}
?&gt;

    **Ejemplo #2 Modificación de los controles del servidor**

&lt;?php
// $ds debe ser una instancia de conexión LDAP\Connection válida
$ctrl1 = array("oid" =&gt; "1.2.752.58.10.1", "iscritical" =&gt; true);
// iscritical vale por omisión FALSE
$ctrl2 = array("oid" =&gt; "1.2.752.58.1.10", "value" =&gt; "magic");
// intenta usar los dos controles
if (!ldap_set_option($ds, LDAP_OPT_SERVER_CONTROLS, array($ctrl1, $ctrl2))) {
echo "No es posible modificar los controles del servidor";
}
?&gt;

### Notas

**Nota**:

    Esta función solo está disponible cuando se utiliza
    OpenLDAP 2.x.x o Netscape Directory SDK x.x.

### Ver también

    - [ldap_get_option()](#function.ldap-get-option) - Lee/escrit el valor actual de una opción

# ldap_set_rebind_proc

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

ldap_set_rebind_proc — Configura una función de retorno para rehacer las ligaduras durante la búsqueda de referentes

### Descripción

**ldap_set_rebind_proc**([LDAP\Connection](#class.ldap-connection) $ldap, [?](#language.types.null)[callable](#language.types.callable) $callback): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

      8.0.0

       callback ahora es nullable.



# ldap_sort

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7)

ldap_sort — Ordena las entradas de un resultado LDAP lado-cliente

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.0.0 y ha sido
_ELIMINADA_ a partir de PHP 8.0.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**ldap_sort**([resource](#language.types.resource) $link, [resource](#language.types.resource) $result, [string](#language.types.string) $sortfilter): [bool](#language.types.boolean)

Ordena el resultado de una búsqueda LDAP, retornado por la función
[ldap_search()](#function.ldap-search).

Como esta función ordena los valores retornados lado-cliente, es
posible que no se obtengan los resultados esperados si se alcanza
sizelimit ya sea del servidor o definido en
[ldap_search()](#function.ldap-search).

### Parámetros

     link


       Un [resource](#language.types.resource) LDAP, retornado por [ldap_connect()](#function.ldap-connect).






     result


       Un identificador de búsqueda LDAP, retornado por la función
       [ldap_search()](#function.ldap-search).






     sortfilter


       El atributo a utilizar como clave durante el ordenamiento.





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función ha sido eliminada.





### Ejemplos

Ordena el resultado de una búsqueda.

    **Ejemplo #1 Ordenamiento LDAP**

&lt;?php
// $ds es un identificador de enlace válido (ver ldap_connect)

$dn        = 'ou=example,dc=org';
$filter = '(|(sn=Doe*)(givenname=John*))';
$justthese = array('ou', 'sn', 'givenname', 'mail');

$sr = ldap_search($ds, $dn, $filter, $justthese);

// Ordena
ldap_sort($ds, $sr, 'sn');

// Obtención de los datos
$info = ldap_get_entries($ds, $sr);

# ldap_start_tls

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

ldap_start_tls — Inicia TLS

### Descripción

**ldap_start_tls**([LDAP\Connection](#class.ldap-connection) $ldap): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# ldap_t61_to_8859

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

ldap_t61_to_8859 — Convierte los caracteres t61 en caracteres 8859

### Descripción

**ldap_t61_to_8859**([string](#language.types.string) $value): [string](#language.types.string)|[false](#language.types.singleton)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

# ldap_unbind

(PHP 4, PHP 5, PHP 7, PHP 8)

ldap_unbind — Desconecta de un servidor LDAP

### Descripción

**ldap_unbind**([LDAP\Connection](#class.ldap-connection) $ldap): [bool](#language.types.boolean)

Desconecta de un servidor LDAP.

### Parámetros

     ldap


       An [LDAP\Connection](#class.ldap-connection) instance, returned by [ldap_connect()](#function.ldap-connect).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

The ldap parameter expects an [LDAP\Connection](#class.ldap-connection)
instance now; previously, a valid ldap link [resource](#language.types.resource) was expected.

### Ver también

    - [ldap_bind()](#function.ldap-bind) - Autenticación en el servidor LDAP

## Tabla de contenidos

- [ldap_8859_to_t61](#function.ldap-8859-to-t61) — Convierte los caracteres 8859 en caracteres t61
- [ldap_add](#function.ldap-add) — Añade una entrada en un directorio LDAP
- [ldap_add_ext](#function.ldap-add-ext) — Añade una entrada en un directorio LDAP
- [ldap_bind](#function.ldap-bind) — Autenticación en el servidor LDAP
- [ldap_bind_ext](#function.ldap-bind-ext) — Vincula un directorio LDAP
- [ldap_close](#function.ldap-close) — Alias de ldap_unbind
- [ldap_compare](#function.ldap-compare) — Comparar una entrada con valores de atributos
- [ldap_connect](#function.ldap-connect) — Conexión a un servidor LDAP
- [ldap_connect_wallet](#function.ldap-connect-wallet) — Conecta a un servidor LDAP
- [ldap_control_paged_result](#function.ldap-control-paged-result) — Envía un control de paginación LDAP
- [ldap_control_paged_result_response](#function.ldap-control-paged-result-response) — Recupera el cookie de paginación LDAP
- [ldap_count_entries](#function.ldap-count-entries) — Cuenta el número de entradas tras una búsqueda
- [ldap_count_references](#function.ldap-count-references) — Cuenta el número de referencias en un resultado de búsqueda
- [ldap_delete](#function.ldap-delete) — Elimina una entrada en un directorio
- [ldap_delete_ext](#function.ldap-delete-ext) — Elimina una entrada de un directorio
- [ldap_dn2ufn](#function.ldap-dn2ufn) — Convierte un DN en formato UFN (User Friendly Naming)
- [ldap_err2str](#function.ldap-err2str) — Convertir un número de error de LDAP a una cadena con un mensaje de error
- [ldap_errno](#function.ldap-errno) — Devuelve el número de error LDAP de la última orden ejecutada
- [ldap_error](#function.ldap-error) — Devuelve el mensaje LDAP de la última orden LDAP
- [ldap_escape](#function.ldap-escape) — Escapa una cadena para usarla en un filtro LDAP o un DN
- [ldap_exop](#function.ldap-exop) — Realiza una operación extendida
- [ldap_exop_passwd](#function.ldap-exop-passwd) — Asistencia para la operación extendida PASSWD
- [ldap_exop_refresh](#function.ldap-exop-refresh) — Actualiza la ayuda de la operación extendida
- [ldap_exop_sync](#function.ldap-exop-sync) — Efectúa una operación extendida
- [ldap_exop_whoami](#function.ldap-exop-whoami) — Ayuda de la operación extendida WHOAMI
- [ldap_explode_dn](#function.ldap-explode-dn) — Separa los diferentes componentes de un DN
- [ldap_first_attribute](#function.ldap-first-attribute) — Retorna el primer atributo
- [ldap_first_entry](#function.ldap-first-entry) — Devuelve la primera entrada
- [ldap_first_reference](#function.ldap-first-reference) — Devuelve la primera referencia
- [ldap_free_result](#function.ldap-free-result) — Libera la memoria del resultado
- [ldap_get_attributes](#function.ldap-get-attributes) — Lee los atributos de una entrada
- [ldap_get_dn](#function.ldap-get-dn) — Lee el DN de una entrada
- [ldap_get_entries](#function.ldap-get-entries) — Lee todas las entradas del resultado
- [ldap_get_option](#function.ldap-get-option) — Lee/escrit el valor actual de una opción
- [ldap_get_values](#function.ldap-get-values) — Lee todos los valores de una entrada LDAP
- [ldap_get_values_len](#function.ldap-get-values-len) — Lee todos los valores binarios de una entrada
- [ldap_list](#function.ldap-list) — Búsqueda en un nivel
- [ldap_mod_add](#function.ldap-mod-add) — Añade un atributo a la entrada actual
- [ldap_mod_add_ext](#function.ldap-mod_add-ext) — Añade valores de atributo a los atributos actuales
- [ldap_mod_del](#function.ldap-mod-del) — Elimina un atributo de la entrada actual
- [ldap_mod_del_ext](#function.ldap-mod_del-ext) — Elimina valores de atributo de los atributos actuales
- [ldap_mod_replace](#function.ldap-mod-replace) — Remplaza un atributo en la entrada actual
- [ldap_mod_replace_ext](#function.ldap-mod_replace-ext) — Reemplaza los valores de atributo por otros nuevos
- [ldap_modify](#function.ldap-modify) — Alias de ldap_mod_replace
- [ldap_modify_batch](#function.ldap-modify-batch) — Agrupa modificaciones y las ejecuta en una entrada LDAP
- [ldap_next_attribute](#function.ldap-next-attribute) — Lee el siguiente atributo
- [ldap_next_entry](#function.ldap-next-entry) — Lee la siguiente entrada
- [ldap_next_reference](#function.ldap-next-reference) — Lee la referencia siguiente
- [ldap_parse_exop](#function.ldap-parse-exop) — Analiza un objeto de resultado de una operación extendida LDAP
- [ldap_parse_reference](#function.ldap-parse-reference) — Extrae las informaciones de una referencia de entrada
- [ldap_parse_result](#function.ldap-parse-result) — Extrae información de un resultado
- [ldap_read](#function.ldap-read) — Lee una entrada
- [ldap_rename](#function.ldap-rename) — Modifica el nombre de una entrada
- [ldap_rename_ext](#function.ldap-rename-ext) — Cambia el nombre de una entrada
- [ldap_sasl_bind](#function.ldap-sasl-bind) — Autenticación en el servidor LDAP utilizando SASL
- [ldap_search](#function.ldap-search) — Búsqueda en el servidor LDAP
- [ldap_set_option](#function.ldap-set-option) — Modifica el valor de una opción LDAP
- [ldap_set_rebind_proc](#function.ldap-set-rebind-proc) — Configura una función de retorno para rehacer las ligaduras durante la búsqueda de referentes
- [ldap_sort](#function.ldap-sort) — Ordena las entradas de un resultado LDAP lado-cliente
- [ldap_start_tls](#function.ldap-start-tls) — Inicia TLS
- [ldap_t61_to_8859](#function.ldap-t61-to-8859) — Convierte los caracteres t61 en caracteres 8859
- [ldap_unbind](#function.ldap-unbind) — Desconecta de un servidor LDAP

# The LDAP\Connection class

(PHP 8 &gt;= 8.1.0)

## Introducción

    Una clase completamente opaca que reemplaza el [resource](#language.types.resource)
    ldap a partir de PHP 8.1.0.

## Sinopsis de la Clase

     final
     class **LDAP\Connection**
     {

}

# The LDAP\Result class

(PHP 8 &gt;= 8.1.0)

## Introducción

    Una clase completamente opaca que reemplaza el [resource](#language.types.resource)
    ldap result a partir de PHP 8.1.0.

## Sinopsis de la Clase

     final
     class **LDAP\Result**
     {

}

# The LDAP\ResultEntry class

(PHP 8 &gt;= 8.1.0)

## Introducción

    Una clase completamente opaca que reemplaza el [resource](#language.types.resource)
    ldap result entry a partir de PHP 8.1.0.

## Sinopsis de la Clase

     final
     class **LDAP\ResultEntry**
     {

}

- [Introducción](#intro.ldap)
- [Instalación/Configuración](#ldap.setup)<li>[Requerimientos](#ldap.requirements)
- [Instalación](#ldap.installation)
- [Configuración en tiempo de ejecución](#ldap.configuration)
- [Tipos de recursos](#ldap.resources)
  </li>- [Constantes predefinidas](#ldap.constants)
- [Utilización de las funciones LDAP de PHP](#ldap.using)
- [Control LDAP](#ldap.controls)
- [Ejemplos](#ldap.examples)<li>[Uso básico](#ldap.examples-basic)
- [Controles LDAP](#ldap.examples-controls)
  </li>- [LDAP Funciones](#ref.ldap)<li>[ldap_8859_to_t61](#function.ldap-8859-to-t61) — Convierte los caracteres 8859 en caracteres t61
- [ldap_add](#function.ldap-add) — Añade una entrada en un directorio LDAP
- [ldap_add_ext](#function.ldap-add-ext) — Añade una entrada en un directorio LDAP
- [ldap_bind](#function.ldap-bind) — Autenticación en el servidor LDAP
- [ldap_bind_ext](#function.ldap-bind-ext) — Vincula un directorio LDAP
- [ldap_close](#function.ldap-close) — Alias de ldap_unbind
- [ldap_compare](#function.ldap-compare) — Comparar una entrada con valores de atributos
- [ldap_connect](#function.ldap-connect) — Conexión a un servidor LDAP
- [ldap_connect_wallet](#function.ldap-connect-wallet) — Conecta a un servidor LDAP
- [ldap_control_paged_result](#function.ldap-control-paged-result) — Envía un control de paginación LDAP
- [ldap_control_paged_result_response](#function.ldap-control-paged-result-response) — Recupera el cookie de paginación LDAP
- [ldap_count_entries](#function.ldap-count-entries) — Cuenta el número de entradas tras una búsqueda
- [ldap_count_references](#function.ldap-count-references) — Cuenta el número de referencias en un resultado de búsqueda
- [ldap_delete](#function.ldap-delete) — Elimina una entrada en un directorio
- [ldap_delete_ext](#function.ldap-delete-ext) — Elimina una entrada de un directorio
- [ldap_dn2ufn](#function.ldap-dn2ufn) — Convierte un DN en formato UFN (User Friendly Naming)
- [ldap_err2str](#function.ldap-err2str) — Convertir un número de error de LDAP a una cadena con un mensaje de error
- [ldap_errno](#function.ldap-errno) — Devuelve el número de error LDAP de la última orden ejecutada
- [ldap_error](#function.ldap-error) — Devuelve el mensaje LDAP de la última orden LDAP
- [ldap_escape](#function.ldap-escape) — Escapa una cadena para usarla en un filtro LDAP o un DN
- [ldap_exop](#function.ldap-exop) — Realiza una operación extendida
- [ldap_exop_passwd](#function.ldap-exop-passwd) — Asistencia para la operación extendida PASSWD
- [ldap_exop_refresh](#function.ldap-exop-refresh) — Actualiza la ayuda de la operación extendida
- [ldap_exop_sync](#function.ldap-exop-sync) — Efectúa una operación extendida
- [ldap_exop_whoami](#function.ldap-exop-whoami) — Ayuda de la operación extendida WHOAMI
- [ldap_explode_dn](#function.ldap-explode-dn) — Separa los diferentes componentes de un DN
- [ldap_first_attribute](#function.ldap-first-attribute) — Retorna el primer atributo
- [ldap_first_entry](#function.ldap-first-entry) — Devuelve la primera entrada
- [ldap_first_reference](#function.ldap-first-reference) — Devuelve la primera referencia
- [ldap_free_result](#function.ldap-free-result) — Libera la memoria del resultado
- [ldap_get_attributes](#function.ldap-get-attributes) — Lee los atributos de una entrada
- [ldap_get_dn](#function.ldap-get-dn) — Lee el DN de una entrada
- [ldap_get_entries](#function.ldap-get-entries) — Lee todas las entradas del resultado
- [ldap_get_option](#function.ldap-get-option) — Lee/escrit el valor actual de una opción
- [ldap_get_values](#function.ldap-get-values) — Lee todos los valores de una entrada LDAP
- [ldap_get_values_len](#function.ldap-get-values-len) — Lee todos los valores binarios de una entrada
- [ldap_list](#function.ldap-list) — Búsqueda en un nivel
- [ldap_mod_add](#function.ldap-mod-add) — Añade un atributo a la entrada actual
- [ldap_mod_add_ext](#function.ldap-mod_add-ext) — Añade valores de atributo a los atributos actuales
- [ldap_mod_del](#function.ldap-mod-del) — Elimina un atributo de la entrada actual
- [ldap_mod_del_ext](#function.ldap-mod_del-ext) — Elimina valores de atributo de los atributos actuales
- [ldap_mod_replace](#function.ldap-mod-replace) — Remplaza un atributo en la entrada actual
- [ldap_mod_replace_ext](#function.ldap-mod_replace-ext) — Reemplaza los valores de atributo por otros nuevos
- [ldap_modify](#function.ldap-modify) — Alias de ldap_mod_replace
- [ldap_modify_batch](#function.ldap-modify-batch) — Agrupa modificaciones y las ejecuta en una entrada LDAP
- [ldap_next_attribute](#function.ldap-next-attribute) — Lee el siguiente atributo
- [ldap_next_entry](#function.ldap-next-entry) — Lee la siguiente entrada
- [ldap_next_reference](#function.ldap-next-reference) — Lee la referencia siguiente
- [ldap_parse_exop](#function.ldap-parse-exop) — Analiza un objeto de resultado de una operación extendida LDAP
- [ldap_parse_reference](#function.ldap-parse-reference) — Extrae las informaciones de una referencia de entrada
- [ldap_parse_result](#function.ldap-parse-result) — Extrae información de un resultado
- [ldap_read](#function.ldap-read) — Lee una entrada
- [ldap_rename](#function.ldap-rename) — Modifica el nombre de una entrada
- [ldap_rename_ext](#function.ldap-rename-ext) — Cambia el nombre de una entrada
- [ldap_sasl_bind](#function.ldap-sasl-bind) — Autenticación en el servidor LDAP utilizando SASL
- [ldap_search](#function.ldap-search) — Búsqueda en el servidor LDAP
- [ldap_set_option](#function.ldap-set-option) — Modifica el valor de una opción LDAP
- [ldap_set_rebind_proc](#function.ldap-set-rebind-proc) — Configura una función de retorno para rehacer las ligaduras durante la búsqueda de referentes
- [ldap_sort](#function.ldap-sort) — Ordena las entradas de un resultado LDAP lado-cliente
- [ldap_start_tls](#function.ldap-start-tls) — Inicia TLS
- [ldap_t61_to_8859](#function.ldap-t61-to-8859) — Convierte los caracteres t61 en caracteres 8859
- [ldap_unbind](#function.ldap-unbind) — Desconecta de un servidor LDAP
  </li>- [LDAP\Connection](#class.ldap-connection) — The LDAP\Connection class
- [LDAP\Result](#class.ldap-result) — The LDAP\Result class
- [LDAP\ResultEntry](#class.ldap-result-entry) — The LDAP\ResultEntry class
