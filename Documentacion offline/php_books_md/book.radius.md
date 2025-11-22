# Radius

# Introducción

Este paquete se basa en los libradius de FreeBSD (Autenticación remota telefónica
de servicio de usuario). Permite a los clientes realizar la autenticación y la
contabilidad por medio de solicitudes de red a servidores remotos.

Esta extensión PECL añade soporte completo para la autenticación Radius
([» RFC 2865](https://datatracker.ietf.org/doc/html/rfc2865)) y contabilidad Radius
([» RFC 2866](https://datatracker.ietf.org/doc/html/rfc2866)). Este paquete está disponible
para Unix (probado en FreeBSD y Linux) y para Windows.

**Nota**:

    Una descripción exacta de libradius se pueden encontrar
    [» aquí](http://www.freebsd.org/cgi/man.cgi?query=libradius). Una descripción detallada del archivo
    de configuración se puede encontrar [» aquí](http://www.freebsd.org/cgi/man.cgi?query=radius.conf).

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#radius.installation)

## Instalación

Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/radius](https://pecl.php.net/package/radius).

# Constantes predefinidas

## Tabla de contenidos

- [Opciones RADIUS](#radius.constants.options)
- [Tipos de paquetes RADIUS](#radius.constants.packets)
- [Tipos de atributo RADIUS](#radius.constants.attributes)
- [Tipos de atributo RADIUS específicos del vendedor](#radius.constants.vendor-specific)

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[RADIUS_MPPE_KEY_LEN](#constant.radius-mppe-key-len)**
     ([int](#language.types.integer))



     La longitud máxima de las claves MPPE.

## Opciones RADIUS

Varias funciones RADIUS aceptan opciones en forma de máscara de octetos.
Las constantes que representan estas opciones se enumeran a continuación.

     **[RADIUS_OPTION_SALT](#constant.radius-option-salt)**
     ([int](#language.types.integer))



      Cuando se define, esta opción hará que el valor del atributo
      sea cifrado salt.







     **[RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**
     ([int](#language.types.integer))



      Cuando se define, esta opción hará que el valor del atributo
      provenga del argumento tag.


## Tipos de paquetes RADIUS

Los paquetes RADIUS, ya sean solicitados o recibidos como respuesta, siempre incluyen
un tipo. Esta constante se proporciona para facilitar
la especificación de un tipo al utilizar la función
[radius_create_request()](#function.radius-create-request), y al comparar el resultado con la función [radius_send_request()](#function.radius-send-request).

     **[RADIUS_ACCESS_REQUEST](#constant.radius-access-request)**
     ([int](#language.types.integer))



      Un Access-Request, utilizado para autenticar un usuario
      en un servidor RADIUS. Los paquetes Access-Request deben incluir
      un atributo [**<a href="#constant.radius-nas-ip-address">RADIUS_NAS_IP_ADDRESS](#constant.radius-nas-ip-address)**</a>,
      o un atributo [**<a href="#constant.radius-nas-identifier">RADIUS_NAS_IDENTIFIER](#constant.radius-nas-identifier)**</a>
      pero también incluir un atributo [**<a href="#constant.radius-user-password">RADIUS_USER_PASSWORD](#constant.radius-user-password)**</a>,
      y un atributo [**<a href="#constant.radius-chap-password">RADIUS_CHAP_PASSWORD](#constant.radius-chap-password)**</a>
      o bien un atributo [**<a href="#constant.radius-state">RADIUS_STATE](#constant.radius-state)**</a>,
      y deben incluir un atributo [**<a href="#constant.radius-user-name">RADIUS_USER_NAME](#constant.radius-user-name)**</a>.







     **[RADIUS_ACCESS_ACCEPT](#constant.radius-access-accept)**
     ([int](#language.types.integer))



      Una respuesta Access-Accept a un paquete Access-Request indica que el servidor RADIUS
      ha autenticado al usuario con éxito.







     **[RADIUS_ACCESS_REJECT](#constant.radius-access-reject)**
     ([int](#language.types.integer))



      Una respuesta Access-Reject a un paquete Access-Request indica que el servidor RADIUS
      no ha logrado autenticar al usuario.







     **[RADIUS_ACCESS_CHALLENGE](#constant.radius-access-challenge)**
     ([int](#language.types.integer))



      Una respuesta Access-Challenge a un paquete Access-Request indica que el servidor RADIUS
     requiere más información de otro paquete Access-Request antes de autenticar
     al usuario.







     **[RADIUS_ACCOUNTING_REQUEST](#constant.radius-accounting-request)**
     ([int](#language.types.integer))



      Un paquete Accounting-Request, utilizado para transmitir información de
      contabilidad para un servicio del servidor RADIUS.







     **[RADIUS_ACCOUNTING_RESPONSE](#constant.radius-accounting-response)**
     ([int](#language.types.integer))



      Una respuesta Accounting-Response a un paquete Accounting-Request.







     **[RADIUS_COA_REQUEST](#constant.radius-coa-request)**
     ([int](#language.types.integer))



      Un paquete CoA-Request, enviado desde un servidor RADIUS para
      indicar que los permisos han cambiado en la sesión del usuario.
      Se debe emitir una respuesta en forma de CoA-ACK o CoA-NAK.




      Esta constante está disponible desde PECL radius 1.3.0 y versiones posteriores.







     **[RADIUS_COA_ACK](#constant.radius-coa-ack)**
     ([int](#language.types.integer))



      Un paquete CoA-ACK, enviado al servidor RADIUS para indicar
      que los permisos del usuario han sido actualizados.




      Esta constante está disponible desde PECL radius 1.3.0 y versiones posteriores.







     **[RADIUS_COA_NAK](#constant.radius-coa-nak)**
     ([int](#language.types.integer))



      Un paquete CoA-NAK, enviado al servidor RADIUS para indicar que los permisos
      del usuario no han podido ser actualizados.




      Esta constante está disponible desde PECL radius 1.3.0 y versiones posteriores.







     **[RADIUS_DISCONNECT_REQUEST](#constant.radius-disconnect-request)**
     ([int](#language.types.integer))



      Un paquete Disconnect-Request, enviado desde el servidor RADIUS para indicar
      que la sesión del usuario debe cerrarse.




      Esta constante está disponible desde PECL radius 1.3.0 y versiones posteriores.







     **[RADIUS_DISCONNECT_ACK](#constant.radius-disconnect-ack)**
     ([int](#language.types.integer))



      Un paquete Disconnect-ACK, enviado al servidor RADIUS para indicar que
      la sesión del usuario ha finalizado.




      Esta constante está disponible desde PECL radius 1.3.0 y versiones posteriores.







     **[RADIUS_DISCONNECT_NAK](#constant.radius-disconnect-nak)**
     ([int](#language.types.integer))



      Un paquete Disconnect-NAK, enviado al servidor RADIUS para indicar
      que la sesión del usuario no ha podido finalizar.




      Esta constante está disponible desde PECL radius 1.3.0 y versiones posteriores.


## Tipos de atributo RADIUS

Estas constantes definen tipos de atributo RADIUS que pueden ser utilizadas
con las funciones [radius_put_addr()](#function.radius-put-addr), [radius_put_attr()](#function.radius-put-attr),
[radius_put_int()](#function.radius-put-int) y [radius_put_string()](#function.radius-put-string).

     **[RADIUS_USER_NAME](#constant.radius-user-name)**
     ([int](#language.types.integer))



      El atributo User-Name. El valor del atributo debe ser un string que
      contenga el nombre de usuario que desea autenticarse,
      y puede ser definido utilizando la función [radius_put_attr()](#function.radius-put-attr).







     **[RADIUS_USER_PASSWORD](#constant.radius-user-password)**
     ([int](#language.types.integer))



      El atributo User-Password. El valor del atributo debe ser un string que
      contenga la contraseña del usuario, y puede ser definido utilizando la función [radius_put_attr()](#function.radius-put-attr).
      Este valor será cifrado durante la transmisión como se describe en
      la [» sección 5.2 de la RFC 2865](https://datatracker.ietf.org/doc/html/rfc2865).







     **[RADIUS_CHAP_PASSWORD](#constant.radius-chap-password)**
     ([int](#language.types.integer))



      El atributo Chap-Password. El valor del atributo debe ser un string que
      contenga el primer octeto (que es el identificador CHAP), seguido de
      una subsecuencia de 16 octetos que contenga el hash MD5 del identificador
      CHAP, la contraseña en texto plano, y el valor del desafío CHAP,
      todo concatenado. Tenga en cuenta que el valor del desafío CHAP
      también debe ser enviado por separado en el atributo
      [**<a href="#constant.radius-chap-challenge">RADIUS_CHAP_CHALLENGE](#constant.radius-chap-challenge)**</a>.







       **Ejemplo #1 Uso de contraseñas CHAP**




&lt;?php
// Primero, creamos un manejador de autenticación y una solicitud.
$radh = radius_auth_open();
radius_add_server($radh, $server, $port, $secret, 3, 3);
radius_create_request($radh, RADIUS_ACCESS_REQUEST);

// Supongamos que $password contiene la contraseña en texto plano:

// Generación del desafío.
$challenge = mt_rand();

// Especifica un identificador CHAP.
$ident = 1;

// Añade el atributo Chap-Password.
$cp = hash('md5', pack('Ca*', $ident, $password.$challenge), true);
radius_put_attr($radh, RADIUS_CHAP_PASSWORD, pack('C', $ident).$cp);

// Añade el atributo Chap-Challenge.
radius_put_attr($radh, RADIUS_CHAP_CHALLENGE, $challenge);

/\* A partir de aquí, podemos añadir los otros atributos

- y llamar a la función radius_send_request(). \*/
  ?&gt;

         **[RADIUS_NAS_IP_ADDRESS](#constant.radius-nas-ip-address)**
         ([int](#language.types.integer))



          El atributo NAS-IP-Address. El valor del atributo esperado es la dirección
          IP del cliente RADIUS codificada como un entero, que puede
          ser definida utilizando la función [radius_put_addr()](#function.radius-put-addr).







         **[RADIUS_NAS_PORT](#constant.radius-nas-port)**
         ([int](#language.types.integer))



          El atributo NAS-Port. El valor del atributo esperado es el puerto
          físico del usuario en el cliente RADIUS, codificado como un entero, que puede ser definido
          utilizando la función [radius_put_int()](#function.radius-put-int).







         **[RADIUS_SERVICE_TYPE](#constant.radius-service-type)**
         ([int](#language.types.integer))



          El atributo Service-Type. El valor del atributo indica el tipo
          de servicio que el usuario solicita, y debe ser un entero,
          que puede ser definido utilizando la función
          [radius_put_int()](#function.radius-put-int).




          Se proporcionan constantes para representar los valores posibles
          de este atributo. Aquí están:



           - **[RADIUS_LOGIN](#constant.radius-login)**

           - **[RADIUS_FRAMED](#constant.radius-framed)**

           - **[RADIUS_CALLBACK_LOGIN](#constant.radius-callback-login)**

           - **[RADIUS_CALLBACK_FRAMED](#constant.radius-callback-framed)**

           - **[RADIUS_OUTBOUND](#constant.radius-outbound)**

           - **[RADIUS_ADMINISTRATIVE](#constant.radius-administrative)**

           - **[RADIUS_NAS_PROMPT](#constant.radius-nas-prompt)**

           - **[RADIUS_AUTHENTICATE_ONLY](#constant.radius-authenticate-only)**

           - **[RADIUS_CALLBACK_NAS_PROMPT](#constant.radius-callback-nas-prompt)**







         **[RADIUS_FRAMED_PROTOCOL](#constant.radius-framed-protocol)**
         ([int](#language.types.integer))



          El atributo Framed-Protocol. El valor del atributo esperado es
          un entero, que indica el framing a utilizar para el acceso, y puede ser
          definido utilizando la función [radius_put_int()](#function.radius-put-int).
          Los valores posibles para este atributo son:



           - **[RADIUS_PPP](#constant.radius-ppp)**

           - **[RADIUS_SLIP](#constant.radius-slip)**

           - **[RADIUS_ARAP](#constant.radius-arap)**

           - **[RADIUS_GANDALF](#constant.radius-gandalf)**

           - **[RADIUS_XYLOGICS](#constant.radius-xylogics)**







         **[RADIUS_FRAMED_IP_ADDRESS](#constant.radius-framed-ip-address)**
         ([int](#language.types.integer))



          El atributo Framed-IP-Address. El valor esperado es una dirección
          de la red del usuario codificada como un entero,
          que puede ser definida utilizando la función [radius_put_addr()](#function.radius-put-addr)
          y recuperada utilizando la función [radius_cvt_addr()](#function.radius-cvt-addr).







         **[RADIUS_FRAMED_IP_NETMASK](#constant.radius-framed-ip-netmask)**
         ([int](#language.types.integer))



          El atributo Framed-IP-Netmask. El valor esperado es una máscara de red
          del usuario, codificada como un entero, que
          puede ser definida utilizando la función [radius_put_addr()](#function.radius-put-addr)
          y recuperada utilizando la función [radius_cvt_addr()](#function.radius-cvt-addr).







         **[RADIUS_FRAMED_ROUTING](#constant.radius-framed-routing)**
         ([int](#language.types.integer))



          El atributo Framed-Routing. El valor esperado es un entero
          que indica el método de enrutamiento para el usuario, que puede
          ser definido utilizando la función [radius_put_int()](#function.radius-put-int).




          Valores posibles:



           - 0: Sin enrutamiento

           - 1: Enviar paquetes de enrutamiento

           - 2: Escuchar paquetes de enrutamiento

           - 3: Enviar y escuchar







         **[RADIUS_FILTER_ID](#constant.radius-filter-id)**
         ([int](#language.types.integer))



          El atributo Filter-ID. El valor esperado es una implementación
          específica, legible por humanos, de strings de filtros, que
          pueden ser definidas utilizando la función
          [radius_put_attr()](#function.radius-put-attr).







         **[RADIUS_FRAMED_MTU](#constant.radius-framed-mtu)**
         ([int](#language.types.integer))



          El atributo Framed-MTU. El valor esperado es un entero, que indica
          el MTU a configurar para el usuario, y puede ser
          definido utilizando la función [radius_put_int()](#function.radius-put-int).







         **[RADIUS_FRAMED_COMPRESSION](#constant.radius-framed-compression)**
         ([int](#language.types.integer))



          El atributo Framed-Compression. El valor esperado es un entero,
          que indica el protocolo de compresión a utilizar, y puede ser
          definido utilizando la función [radius_put_int()](#function.radius-put-int).
          Valores posibles:



           - **[RADIUS_COMP_NONE](#constant.radius-comp-none)**: Sin compresión

           - **[RADIUS_COMP_VJ](#constant.radius-comp-vj)**: Compresión de cabecera VJ TCP/IP

           - **[RADIUS_COMP_IPXHDR](#constant.radius-comp-ipxhdr)**: Compresión de cabecera IPX

           -
            **[RADIUS_COMP_STAC_LZS](#constant.radius-comp-stac-lzs)**: Compresión Stac-LZS (añadido en PECL radius 1.3.0b2)








         **[RADIUS_LOGIN_IP_HOST](#constant.radius-login-ip-host)**
         ([int](#language.types.integer))



          El atributo Login-IP-Host. El valor esperado es la dirección IP
          de conexión del usuario, codificada como un entero,
          que puede ser definido utilizando la función
          [radius_put_addr()](#function.radius-put-addr).







         **[RADIUS_LOGIN_SERVICE](#constant.radius-login-service)**
         ([int](#language.types.integer))



          El atributo Login-Service. El valor esperado es un entero que indica
          el servicio al que el usuario se conecta en el host de identificación.
          El valor puede ser convertido a un entero PHP mediante la función
          [radius_cvt_int()](#function.radius-cvt-int).







         **[RADIUS_LOGIN_TCP_PORT](#constant.radius-login-tcp-port)**
         ([int](#language.types.integer))



          El atributo Login-TCP-Port. El valor esperado es un entero que indica
          el puerto al que el usuario se conecta en el host de identificación.
          El valor puede ser convertido a un entero PHP mediante la función
          [radius_cvt_int()](#function.radius-cvt-int).







         **[RADIUS_REPLY_MESSAGE](#constant.radius-reply-message)**
         ([int](#language.types.integer))



          El atributo Reply-Message. El valor esperado es un string que
          contiene un texto que puede ser mostrado al usuario en respuesta
          a una solicitud de acceso.







         **[RADIUS_CALLBACK_NUMBER](#constant.radius-callback-number)**
         ([int](#language.types.integer))



          El atributo Callback-Number. El valor esperado es un string que
          contiene la cadena de marcación a utilizar para
          la función de devolución de llamada.







         **[RADIUS_CALLBACK_ID](#constant.radius-callback-id)**
         ([int](#language.types.integer))



          El atributo Callback-Id. El valor esperado es un string que contiene
          el nombre de la implementación específica del lugar a llamar.







         **[RADIUS_FRAMED_ROUTE](#constant.radius-framed-route)**
         ([int](#language.types.integer))



          El atributo Framed-Route. El valor esperado es un string que
          contiene un conjunto de rutas de implementación específica a configurar
          para el usuario.







         **[RADIUS_FRAMED_IPX_NETWORK](#constant.radius-framed-ipx-network)**
         ([int](#language.types.integer))



          El atributo Framed-IPX-Network. El valor esperado es un entero
          que contiene la red IPX a configurar para el usuario, o
          0xFFFFFFFE para indicar que el cliente RADIUS debe seleccionar
          la red, y puede ser accedido mediante la función
          [radius_cvt_int()](#function.radius-cvt-int).







         **[RADIUS_STATE](#constant.radius-state)**
         ([int](#language.types.integer))



          El atributo State. El valor esperado es un string que contiene
          la implementación definida incluida en un Access-Challenge desde
          un servidor que debe ser incluida en la subsiguiente Access-Request,
          y puede ser definido utilizando la función
          [radius_put_attr()](#function.radius-put-attr).







         **[RADIUS_CLASS](#constant.radius-class)**
         ([int](#language.types.integer))



          El atributo Class. El valor esperado es un string arbitrario que incluye
          el mensaje de un Access-Accept que debe ser enviado al servidor de cuentas
          en los mensajes Accounting-Request, y puede ser definido mediante la función
          [radius_put_attr()](#function.radius-put-attr).







         **[RADIUS_VENDOR_SPECIFIC](#constant.radius-vendor-specific)**
         ([int](#language.types.integer))



          El atributo Vendor-Specific. En general, los valores del atributo del vendedor
          deben ser definidos utilizando las funciones
          [radius_put_vendor_addr()](#function.radius-put-vendor-addr),
          [radius_put_vendor_attr()](#function.radius-put-vendor-attr),
          [radius_put_vendor_int()](#function.radius-put-vendor-int) y
          [radius_put_vendor_string()](#function.radius-put-vendor-string), en lugar de hacerlo directamente.




          Esta constante es útil al interpretar los atributos
          específicos del vendedor en las respuestas de un servidor RADIUS; cuando se recibe
          un atributo específico del vendedor, la función
          [radius_get_vendor_attr()](#function.radius-get-vendor-attr) debe ser utilizada para
          acceder al identificador del vendedor, el tipo de atributo y el valor del atributo.







         **[RADIUS_SESSION_TIMEOUT](#constant.radius-session-timeout)**
         ([int](#language.types.integer))



          Tiempo de espera de la sesión







         **[RADIUS_IDLE_TIMEOUT](#constant.radius-idle-timeout)**
         ([int](#language.types.integer))



          Tiempo de expiración







         **[RADIUS_TERMINATION_ACTION](#constant.radius-termination-action)**
         ([int](#language.types.integer))



          Acción de terminación







         **[RADIUS_CALLED_STATION_ID](#constant.radius-called-station-id)**
         ([int](#language.types.integer))



          Identificador de la estación llamada







         **[RADIUS_CALLING_STATION_ID](#constant.radius-calling-station-id)**
         ([int](#language.types.integer))



          Identificador de la estación llamante







         **[RADIUS_NAS_IDENTIFIER](#constant.radius-nas-identifier)**
         ([int](#language.types.integer))



          Identificador NAS







         **[RADIUS_PROXY_STATE](#constant.radius-proxy-state)**
         ([int](#language.types.integer))



          Estado del Proxy







         **[RADIUS_LOGIN_LAT_SERVICE](#constant.radius-login-lat-service)**
         ([int](#language.types.integer))



          Servicio de identificación LAT







         **[RADIUS_LOGIN_LAT_NODE](#constant.radius-login-lat-node)**
         ([int](#language.types.integer))



          Nodo de identificación LAT







         **[RADIUS_LOGIN_LAT_GROUP](#constant.radius-login-lat-group)**
         ([int](#language.types.integer))



          Grupo de identificación LAT







         **[RADIUS_FRAMED_APPLETALK_LINK](#constant.radius-framed-appletalk-link)**
         ([int](#language.types.integer))



          Enlace framé Appletalk







         **[RADIUS_FRAMED_APPLETALK_NETWORK](#constant.radius-framed-appletalk-network)**
         ([int](#language.types.integer))



          Red framé Appletalk







         **[RADIUS_FRAMED_APPLETALK_ZONE](#constant.radius-framed-appletalk-zone)**
         ([int](#language.types.integer))



          Zona framé Appletalk







         **[RADIUS_CHAP_CHALLENGE](#constant.radius-chap-challenge)**
         ([int](#language.types.integer))



          Desafío







         **[RADIUS_NAS_PORT_TYPE](#constant.radius-nas-port-type)**
         ([int](#language.types.integer))



          Tipo de puerto NAS:



           - **[RADIUS_ASYNC](#constant.radius-async)**

           - **[RADIUS_SYNC](#constant.radius-sync)**

           - **[RADIUS_ISDN_SYNC](#constant.radius-isdn-sync)**

           - **[RADIUS_ISDN_ASYNC_V120](#constant.radius-isdn-async-v120)**

           - **[RADIUS_ISDN_ASYNC_V110](#constant.radius-isdn-async-v110)**

           - **[RADIUS_VIRTUAL](#constant.radius-virtual)**

           - **[RADIUS_PIAFS](#constant.radius-piafs)**

           - **[RADIUS_HDLC_CLEAR_CHANNEL](#constant.radius-hdlc-clear-channel)**

           - **[RADIUS_X_25](#constant.radius-x-25)**

           - **[RADIUS_X_75](#constant.radius-x-75)**

           - **[RADIUS_G_3_FAX](#constant.radius-g-3-fax)**

           - **[RADIUS_SDSL](#constant.radius-sdsl)**

           - **[RADIUS_ADSL_CAP](#constant.radius-adsl-cap)**

           - **[RADIUS_ADSL_DMT](#constant.radius-adsl-dmt)**

           - **[RADIUS_IDSL](#constant.radius-idsl)**

           - **[RADIUS_ETHERNET](#constant.radius-ethernet)**

           - **[RADIUS_XDSL](#constant.radius-xdsl)**

           - **[RADIUS_CABLE](#constant.radius-cable)**

           - **[RADIUS_WIRELESS_OTHER](#constant.radius-wireless-other)**

           - **[RADIUS_WIRELESS_IEEE_802_11](#constant.radius-wireless-ieee-802-11)**







         **[RADIUS_PORT_LIMIT](#constant.radius-port-limit)**
         ([int](#language.types.integer))



          Límite del puerto







         **[RADIUS_LOGIN_LAT_PORT](#constant.radius-login-lat-port)**
         ([int](#language.types.integer))



          Puerto de identificación LAT







         **[RADIUS_CONNECT_INFO](#constant.radius-connect-info)**
         ([int](#language.types.integer))



          Información de conexión







         **[RADIUS_ACCT_STATUS_TYPE](#constant.radius-acct-status-type)**
         ([int](#language.types.integer))



          Tipo de estado de la cuenta:



           - **[RADIUS_START](#constant.radius-start)**

           - **[RADIUS_STOP](#constant.radius-stop)**

           - **[RADIUS_ACCOUNTING_ON](#constant.radius-accounting-on)**

           - **[RADIUS_ACCOUNTING_OFF](#constant.radius-accounting-off)**







         **[RADIUS_ACCT_DELAY_TIME](#constant.radius-acct-delay-time)**
         ([int](#language.types.integer))



          Tiempo de espera máximo de identificación







         **[RADIUS_ACCT_INPUT_OCTETS](#constant.radius-acct-input-octets)**
         ([int](#language.types.integer))



          Octetos de entrada de identificación







         **[RADIUS_ACCT_OUTPUT_OCTETS](#constant.radius-acct-output-octets)**
         ([int](#language.types.integer))



          Octetos de salida de identificación







         **[RADIUS_ACCT_SESSION_ID](#constant.radius-acct-session-id)**
         ([int](#language.types.integer))



          Identificador de sesión de identificación







         **[RADIUS_ACCT_AUTHENTIC](#constant.radius-acct-authentic)**
         ([int](#language.types.integer))



          Identificación auténtica, uno entre:



           - **[RADIUS_AUTH_RADIUS](#constant.radius-auth-radius)**

           - **[RADIUS_AUTH_LOCAL](#constant.radius-auth-local)**

           - **[RADIUS_AUTH_REMOTE](#constant.radius-auth-remote)**







         **[RADIUS_ACCT_SESSION_TIME](#constant.radius-acct-session-time)**
         ([int](#language.types.integer))



          Duración de la sesión de identificación







         **[RADIUS_ACCT_INPUT_PACKETS](#constant.radius-acct-input-packets)**
         ([int](#language.types.integer))



          Paquetes de entrada de identificación







         **[RADIUS_ACCT_OUTPUT_PACKETS](#constant.radius-acct-output-packets)**
         ([int](#language.types.integer))



          Paquetes de salida de identificación







         **[RADIUS_ACCT_TERMINATE_CAUSE](#constant.radius-acct-terminate-cause)**
         ([int](#language.types.integer))



          Causa de la finalización de la identificación, uno entre:



           - **[RADIUS_TERM_USER_REQUEST](#constant.radius-term-user-request)**

           - **[RADIUS_TERM_LOST_CARRIER](#constant.radius-term-lost-carrier)**

           - **[RADIUS_TERM_LOST_SERVICE](#constant.radius-term-lost-service)**

           - **[RADIUS_TERM_IDLE_TIMEOUT](#constant.radius-term-idle-timeout)**

           - **[RADIUS_TERM_SESSION_TIMEOUT](#constant.radius-term-session-timeout)**

           - **[RADIUS_TERM_ADMIN_RESET](#constant.radius-term-admin-reset)**

           - **[RADIUS_TERM_ADMIN_REBOOT](#constant.radius-term-admin-reboot)**

           - **[RADIUS_TERM_PORT_ERROR](#constant.radius-term-port-error)**

           - **[RADIUS_TERM_NAS_ERROR](#constant.radius-term-nas-error)**

           - **[RADIUS_TERM_NAS_REQUEST](#constant.radius-term-nas-request)**

           - **[RADIUS_TERM_NAS_REBOOT](#constant.radius-term-nas-reboot)**

           - **[RADIUS_TERM_PORT_UNNEEDED](#constant.radius-term-port-unneeded)**

           - **[RADIUS_TERM_PORT_PREEMPTED](#constant.radius-term-port-preempted)**

           - **[RADIUS_TERM_PORT_SUSPENDED](#constant.radius-term-port-suspended)**

           - **[RADIUS_TERM_SERVICE_UNAVAILABLE](#constant.radius-term-service-unavailable)**

           - **[RADIUS_TERM_CALLBACK](#constant.radius-term-callback)**

           - **[RADIUS_TERM_USER_ERROR](#constant.radius-term-user-error)**

           - **[RADIUS_TERM_HOST_REQUEST](#constant.radius-term-host-request)**







         **[RADIUS_ACCT_MULTI_SESSION_ID](#constant.radius-acct-multi-session-id)**
         ([int](#language.types.integer))



          Identificador de una sesión múltiple de identificación







         **[RADIUS_ACCT_LINK_COUNT](#constant.radius-acct-link-count)**
         ([int](#language.types.integer))



          Número de enlaces de identificación


    **Constantes de tipo de servicio**

         **[RADIUS_LOGIN](#constant.radius-login)**








         **[RADIUS_FRAMED](#constant.radius-framed)**








         **[RADIUS_CALLBACK_LOGIN](#constant.radius-callback-login)**








         **[RADIUS_CALLBACK_FRAMED](#constant.radius-callback-framed)**








         **[RADIUS_OUTBOUND](#constant.radius-outbound)**








         **[RADIUS_ADMINISTRATIVE](#constant.radius-administrative)**








         **[RADIUS_NAS_PROMPT](#constant.radius-nas-prompt)**








         **[RADIUS_AUTHENTICATE_ONLY](#constant.radius-authenticate-only)**








         **[RADIUS_CALLBACK_NAS_PROMPT](#constant.radius-callback-nas-prompt)**





    **Constantes de Framed-Protocol**

         **[RADIUS_PPP](#constant.radius-ppp)**








         **[RADIUS_SLIP](#constant.radius-slip)**








         **[RADIUS_ARAP](#constant.radius-arap)**








         **[RADIUS_GANDALF](#constant.radius-gandalf)**








         **[RADIUS_XYLOGICS](#constant.radius-xylogics)**





    **Constantes de Framed-Compression**

         **[RADIUS_COMP_NONE](#constant.radius-comp-none)**








         **[RADIUS_COMP_VJ](#constant.radius-comp-vj)**








         **[RADIUS_COMP_IPXHDR](#constant.radius-comp-ipxhdr)**








         **[RADIUS_COMP_STAC_LZS](#constant.radius-comp-stac-lzs)**





    **Constantes de tipo de puerto NAS**

         **[RADIUS_ASYNC](#constant.radius-async)**








         **[RADIUS_SYNC](#constant.radius-sync)**








         **[RADIUS_ISDN_SYNC](#constant.radius-isdn-sync)**








         **[RADIUS_ISDN_ASYNC_V120](#constant.radius-isdn-async-v120)**








         **[RADIUS_ISDN_ASYNC_V110](#constant.radius-isdn-async-v110)**








         **[RADIUS_VIRTUAL](#constant.radius-virtual)**








         **[RADIUS_PIAFS](#constant.radius-piafs)**








         **[RADIUS_HDLC_CLEAR_CHANNEL](#constant.radius-hdlc-clear-channel)**








         **[RADIUS_X_25](#constant.radius-x-25)**








         **[RADIUS_X_75](#constant.radius-x-75)**








         **[RADIUS_G_3_FAX](#constant.radius-g-3-fax)**








         **[RADIUS_SDSL](#constant.radius-sdsl)**








         **[RADIUS_ADSL_CAP](#constant.radius-adsl-cap)**








         **[RADIUS_ADSL_DMT](#constant.radius-adsl-dmt)**








         **[RADIUS_IDSL](#constant.radius-idsl)**








         **[RADIUS_ETHERNET](#constant.radius-ethernet)**








         **[RADIUS_XDSL](#constant.radius-xdsl)**








         **[RADIUS_CABLE](#constant.radius-cable)**








         **[RADIUS_WIRELESS_OTHER](#constant.radius-wireless-other)**








         **[RADIUS_WIRELESS_IEEE_802_11](#constant.radius-wireless-ieee-802-11)**





    **Constantes de tipo de estado de contabilidad**

         **[RADIUS_START](#constant.radius-start)**








         **[RADIUS_STOP](#constant.radius-stop)**








         **[RADIUS_ACCOUNTING_ON](#constant.radius-accounting-on)**








         **[RADIUS_ACCOUNTING_OFF](#constant.radius-accounting-off)**





    **Constantes de autenticación de contabilidad**

         **[RADIUS_AUTH_RADIUS](#constant.radius-auth-radius)**








         **[RADIUS_AUTH_LOCAL](#constant.radius-auth-local)**








         **[RADIUS_AUTH_REMOTE](#constant.radius-auth-remote)**





    **Constantes de causa de terminación de contabilidad**

         **[RADIUS_TERM_USER_REQUEST](#constant.radius-term-user-request)**








         **[RADIUS_TERM_LOST_CARRIER](#constant.radius-term-lost-carrier)**








         **[RADIUS_TERM_LOST_SERVICE](#constant.radius-term-lost-service)**








         **[RADIUS_TERM_IDLE_TIMEOUT](#constant.radius-term-idle-timeout)**








         **[RADIUS_TERM_SESSION_TIMEOUT](#constant.radius-term-session-timeout)**








         **[RADIUS_TERM_ADMIN_RESET](#constant.radius-term-admin-reset)**








         **[RADIUS_TERM_ADMIN_REBOOT](#constant.radius-term-admin-reboot)**








         **[RADIUS_TERM_PORT_ERROR](#constant.radius-term-port-error)**








         **[RADIUS_TERM_NAS_ERROR](#constant.radius-term-nas-error)**








         **[RADIUS_TERM_NAS_REQUEST](#constant.radius-term-nas-request)**








         **[RADIUS_TERM_NAS_REBOOT](#constant.radius-term-nas-reboot)**








         **[RADIUS_TERM_PORT_UNNEEDED](#constant.radius-term-port-unneeded)**








         **[RADIUS_TERM_PORT_PREEMPTED](#constant.radius-term-port-preempted)**








         **[RADIUS_TERM_PORT_SUSPENDED](#constant.radius-term-port-suspended)**








         **[RADIUS_TERM_SERVICE_UNAVAILABLE](#constant.radius-term-service-unavailable)**








         **[RADIUS_TERM_CALLBACK](#constant.radius-term-callback)**








         **[RADIUS_TERM_USER_ERROR](#constant.radius-term-user-error)**








         **[RADIUS_TERM_HOST_REQUEST](#constant.radius-term-host-request)**








         **[RADIUS_MICROSOFT_MS_CHAP_RESPONSE](#constant.radius-microsoft-ms-chap-response)**








         **[RADIUS_MICROSOFT_MS_CHAP_ERROR](#constant.radius-microsoft-ms-chap-error)**








         **[RADIUS_MICROSOFT_MS_CHAP_PW_1](#constant.radius-microsoft-ms-chap-pw-1)**








         **[RADIUS_MICROSOFT_MS_CHAP_PW_2](#constant.radius-microsoft-ms-chap-pw-2)**








         **[RADIUS_MICROSOFT_MS_CHAP_LM_ENC_PW](#constant.radius-microsoft-ms-chap-lm-enc-pw)**








         **[RADIUS_MICROSOFT_MS_CHAP_NT_ENC_PW](#constant.radius-microsoft-ms-chap-nt-enc-pw)**








         **[RADIUS_MICROSOFT_MS_MPPE_ENCRYPTION_POLICY](#constant.radius-microsoft-ms-mppe-encryption-policy)**








         **[RADIUS_MICROSOFT_MS_MPPE_ENCRYPTION_TYPES](#constant.radius-microsoft-ms-mppe-encryption-types)**








         **[RADIUS_MICROSOFT_MS_RAS_VENDOR](#constant.radius-microsoft-ms-ras-vendor)**








         **[RADIUS_MICROSOFT_MS_CHAP_DOMAIN](#constant.radius-microsoft-ms-chap-domain)**








         **[RADIUS_MICROSOFT_MS_CHAP_CHALLENGE](#constant.radius-microsoft-ms-chap-challenge)**








         **[RADIUS_MICROSOFT_MS_CHAP_MPPE_KEYS](#constant.radius-microsoft-ms-chap-mppe-keys)**








         **[RADIUS_MICROSOFT_MS_BAP_USAGE](#constant.radius-microsoft-ms-bap-usage)**








         **[RADIUS_MICROSOFT_MS_LINK_UTILIZATION_THRESHOLD](#constant.radius-microsoft-ms-link-utilization-threshold)**








         **[RADIUS_MICROSOFT_MS_LINK_DROP_TIME_LIMIT](#constant.radius-microsoft-ms-link-drop-time-limit)**








         **[RADIUS_MICROSOFT_MS_MPPE_SEND_KEY](#constant.radius-microsoft-ms-mppe-send-key)**








         **[RADIUS_MICROSOFT_MS_MPPE_RECV_KEY](#constant.radius-microsoft-ms-mppe-recv-key)**








         **[RADIUS_MICROSOFT_MS_RAS_VERSION](#constant.radius-microsoft-ms-ras-version)**








         **[RADIUS_MICROSOFT_MS_OLD_ARAP_PASSWORD](#constant.radius-microsoft-ms-old-arap-password)**








         **[RADIUS_MICROSOFT_MS_NEW_ARAP_PASSWORD](#constant.radius-microsoft-ms-new-arap-password)**








         **[RADIUS_MICROSOFT_MS_ARAP_PASSWORD_CHANGE_REASON](#constant.radius-microsoft-ms-arap-password-change-reason)**








         **[RADIUS_MICROSOFT_MS_FILTER](#constant.radius-microsoft-ms-filter)**








         **[RADIUS_MICROSOFT_MS_ACCT_AUTH_TYPE](#constant.radius-microsoft-ms-acct-auth-type)**








         **[RADIUS_MICROSOFT_MS_ACCT_EAP_TYPE](#constant.radius-microsoft-ms-acct-eap-type)**








         **[RADIUS_MICROSOFT_MS_CHAP2_RESPONSE](#constant.radius-microsoft-ms-chap2-response)**








         **[RADIUS_MICROSOFT_MS_CHAP2_SUCCESS](#constant.radius-microsoft-ms-chap2-success)**








         **[RADIUS_MICROSOFT_MS_CHAP2_PW](#constant.radius-microsoft-ms-chap2-pw)**








         **[RADIUS_MICROSOFT_MS_PRIMARY_DNS_SERVER](#constant.radius-microsoft-ms-primary-dns-server)**








         **[RADIUS_MICROSOFT_MS_SECONDARY_DNS_SERVER](#constant.radius-microsoft-ms-secondary-dns-server)**








         **[RADIUS_MICROSOFT_MS_PRIMARY_NBNS_SERVER](#constant.radius-microsoft-ms-primary-nbns-server)**








         **[RADIUS_MICROSOFT_MS_SECONDARY_NBNS_SERVER](#constant.radius-microsoft-ms-secondary-nbns-server)**








         **[RADIUS_MICROSOFT_MS_ARAP_CHALLENGE](#constant.radius-microsoft-ms-arap-challenge)**





## Tipos de atributo RADIUS específicos del vendedor

     **[RADIUS_VENDOR_MICROSOFT](#constant.radius-vendor-microsoft)**
     ([int](#language.types.integer))



      Atributos específicos de Microsoft ([» RFC 2548](https://datatracker.ietf.org/doc/html/rfc2548)):



       - **[RADIUS_MICROSOFT_MS_CHAP_RESPONSE](#constant.radius-microsoft-ms-chap-response)**

       - **[RADIUS_MICROSOFT_MS_CHAP_ERROR](#constant.radius-microsoft-ms-chap-error)**

       - **[RADIUS_MICROSOFT_MS_CHAP_PW_1](#constant.radius-microsoft-ms-chap-pw-1)**

       - **[RADIUS_MICROSOFT_MS_CHAP_PW_2](#constant.radius-microsoft-ms-chap-pw-2)**

       - **[RADIUS_MICROSOFT_MS_CHAP_LM_ENC_PW](#constant.radius-microsoft-ms-chap-lm-enc-pw)**

       - **[RADIUS_MICROSOFT_MS_CHAP_NT_ENC_PW](#constant.radius-microsoft-ms-chap-nt-enc-pw)**

       - **[RADIUS_MICROSOFT_MS_MPPE_ENCRYPTION_POLICY](#constant.radius-microsoft-ms-mppe-encryption-policy)**

       - **[RADIUS_MICROSOFT_MS_MPPE_ENCRYPTION_TYPES](#constant.radius-microsoft-ms-mppe-encryption-types)**

       - **[RADIUS_MICROSOFT_MS_RAS_VENDOR](#constant.radius-microsoft-ms-ras-vendor)**

       - **[RADIUS_MICROSOFT_MS_CHAP_DOMAIN](#constant.radius-microsoft-ms-chap-domain)**

       - **[RADIUS_MICROSOFT_MS_CHAP_CHALLENGE](#constant.radius-microsoft-ms-chap-challenge)**

       - **[RADIUS_MICROSOFT_MS_CHAP_MPPE_KEYS](#constant.radius-microsoft-ms-chap-mppe-keys)**

       - **[RADIUS_MICROSOFT_MS_BAP_USAGE](#constant.radius-microsoft-ms-bap-usage)**

       - **[RADIUS_MICROSOFT_MS_LINK_UTILIZATION_THRESHOLD](#constant.radius-microsoft-ms-link-utilization-threshold)**

       - **[RADIUS_MICROSOFT_MS_LINK_DROP_TIME_LIMIT](#constant.radius-microsoft-ms-link-drop-time-limit)**

       - **[RADIUS_MICROSOFT_MS_MPPE_SEND_KEY](#constant.radius-microsoft-ms-mppe-send-key)**

       - **[RADIUS_MICROSOFT_MS_MPPE_RECV_KEY](#constant.radius-microsoft-ms-mppe-recv-key)**

       - **[RADIUS_MICROSOFT_MS_RAS_VERSION](#constant.radius-microsoft-ms-ras-version)**

       - **[RADIUS_MICROSOFT_MS_OLD_ARAP_PASSWORD](#constant.radius-microsoft-ms-old-arap-password)**

       - **[RADIUS_MICROSOFT_MS_NEW_ARAP_PASSWORD](#constant.radius-microsoft-ms-new-arap-password)**

       - **[RADIUS_MICROSOFT_MS_ARAP_PASSWORD_CHANGE_REASON](#constant.radius-microsoft-ms-arap-password-change-reason)**

       - **[RADIUS_MICROSOFT_MS_FILTER](#constant.radius-microsoft-ms-filter)**

       - **[RADIUS_MICROSOFT_MS_ACCT_AUTH_TYPE](#constant.radius-microsoft-ms-acct-auth-type)**

       - **[RADIUS_MICROSOFT_MS_ACCT_EAP_TYPE](#constant.radius-microsoft-ms-acct-eap-type)**

       - **[RADIUS_MICROSOFT_MS_CHAP2_RESPONSE](#constant.radius-microsoft-ms-chap2-response)**

       - **[RADIUS_MICROSOFT_MS_CHAP2_SUCCESS](#constant.radius-microsoft-ms-chap2-success)**

       - **[RADIUS_MICROSOFT_MS_CHAP2_PW](#constant.radius-microsoft-ms-chap2-pw)**

       - **[RADIUS_MICROSOFT_MS_PRIMARY_DNS_SERVER](#constant.radius-microsoft-ms-primary-dns-server)**

       - **[RADIUS_MICROSOFT_MS_SECONDARY_DNS_SERVER](#constant.radius-microsoft-ms-secondary-dns-server)**

       - **[RADIUS_MICROSOFT_MS_PRIMARY_NBNS_SERVER](#constant.radius-microsoft-ms-primary-nbns-server)**

       - **[RADIUS_MICROSOFT_MS_SECONDARY_NBNS_SERVER](#constant.radius-microsoft-ms-secondary-nbns-server)**

       - **[RADIUS_MICROSOFT_MS_ARAP_CHALLENGE](#constant.radius-microsoft-ms-arap-challenge)**




# Ejemplos

¿Cómo iniciar?

- Obtener un recurso radius

- Configurar la librería

- Crear la petición

- Poner atributos

- Enviar la petición

- Recibir atributos

- Cerrar el recurso radius (opcional)

También sirve echar un vistazo a los ejemplos en este paquete.

El paquete contiene un ejemplo de script php. Este script demuestra como
autenticar con radius utilizando PAP o CHAP (md5). Si se autentica con
servidores Microsoft Radius entonces no le será posible utilizar CHAP (md5). Si
quisiera autenticarse con servidores Microsoft tiene que utilizar
MS-CHAPv1 o MS-CHAPv2, pero es más complicado, porque usted necesita md4,
sha1 y des para generar los datos correctos. Los ejemplos adjuntos demuestran
todos los métodos de autenticación, incluyendo MS-CHAPv1 y MS-CHAPv2. Para tener
funcionando MS-CHAP necesita las extensiones [mcrypt](#ref.mcrypt) y
[mhash](#ref.mhash) iniciando con la
version 1.2 de este paquete, la extensión mcrypt ya no es necesaria.

# Funciones Radius

# radius_acct_open

(PECL radius &gt;= 1.1.0)

radius_acct_open — Crea un manejador Radius para el conteo

### Descripción

**radius_acct_open**(): [resource](#language.types.resource)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un manejador en caso de tener éxito, **[false](#constant.false)** en caso de error. Esta función falla solamente si
hay insuficiencia de memoria.

### Ejemplos

    **Ejemplo #1 radius_acct_open()** example

&lt;?php
$res = radius_acct_open ()
or die ("No se pudo crear un manejador handle");
print "Manejador creado exitosamente";
?&gt;

# radius_add_server

(PECL radius &gt;= 1.1.0)

radius_add_server — Añade un servidor

### Descripción

**radius_add_server**(
    [resource](#language.types.resource) $radius_handle,
    [string](#language.types.string) $hostname,
    [int](#language.types.integer) $port,
    [string](#language.types.string) $secret,
    [int](#language.types.integer) $timeout,
    [int](#language.types.integer) $max_tries
): [bool](#language.types.boolean)

**radius_add_server()** puede ser utilizado varias veces, y puede ser
utilizado junto con la función [radius_config()](#function.radius-config).
Como máximo, pueden especificarse 10 servidores. Cuando se proporcionan varios servidores,
se intentan de forma round-robin hasta que se recibe una respuesta válida,
o hasta que se alcanza el límite max_tries de cada servidor.

### Parámetros

     radius_handle








     hostname


       El argumento hostname especifica el host servidor,
       ya sea como nombre de dominio completo o como dirección IP.






     port


       El port especifica el puerto UDP al que
       conectar en el servidor. Si el puerto dado es 0, la biblioteca
       buscará el servicio radius/udp o
       radacct/udp
       en la base de datos de servicios de red y utilizará el puerto
       encontrado. Si no se encuentra ninguna entrada, la biblioteca utilizará los puertos
       Radius estándar, 1812 para la autenticación y 1813 para las cuentas.






     secret


       El secreto compartido para el host servidor se pasa al argumento
       secret. El protocolo Radius ignora
       todo excepto los primeros 128 bytes del secreto compartido.






     timeout


       El tiempo límite para recibir respuestas del servidor se pasa al
       argumento timeout, en segundos.






     max_tries


       El número máximo de solicitudes repetidas a realizar antes de fallar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con radius_add_server()**

&lt;?php
if (!radius_add_server($res, 'radius.example.com', 1812, 'testing123', 3, 3)) {
    echo 'Error Radius :' . radius_strerror($res). "\n&lt;br&gt;";
exit;
}
?&gt;

### Ver también

    - [radius_config()](#function.radius-config) - Solicita a la biblioteca que lea un archivo de configuración dado

# radius_auth_open

(PECL radius &gt;= 1.1.0)

radius_auth_open — Crea un identificador de Radius para la autenticación

### Descripción

**radius_auth_open**(): [resource](#language.types.resource)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un manejador en caso de éxito, **[false](#constant.false)** en caso de error. Esta función sólo falla si hay
insuficiente memoria disponible.

### Ejemplos

    **Ejemplo #1 Ejemplo de radius_auth_open()**

&lt;?php
$radh = radius_auth_open()
or die ("No se pudo crear el manejador");
echo "Manejador creado con éxito";
?&gt;

# radius_close

(PECL radius &gt;= 1.1.0)

radius_close — Libera todos los recursos

### Descripción

**radius_close**([resource](#language.types.resource) $radius_handle): [bool](#language.types.boolean)

No es necesario llamar a esta función debido a que php libera todos los recursos
al final de cada petición.

### Parámetros

    radius_handleEl recurso RADIUS.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# radius_config

(PECL radius &gt;= 1.1.0)

radius_config — Solicita a la biblioteca que lea un archivo de configuración dado

### Descripción

**radius_config**([resource](#language.types.resource) $radius_handle, [string](#language.types.string) $file): [bool](#language.types.boolean)

Antes de cualquier petición Radius, la biblioteca debe conocer el servidor a contactar.
La manera sencilla de configurar la biblioteca es llamar a la función
**radius_config()**. **radius_config()**
solicita a la biblioteca que lea un archivo de configuración cuyo formato
se describe en la página [» radius.conf](http://www.freebsd.org/cgi/man.cgi?query=radius.conf).

### Parámetros

     radius_handle









     file


       La ruta hacia el archivo de configuración se pasa como
       argumento a la función **radius_config()**.
       La biblioteca puede ser configurada también llamando a la
       función [radius_add_server()](#function.radius-add-server).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [radius_add_server()](#function.radius-add-server) - Añade un servidor

# radius_create_request

(PECL radius &gt;= 1.1.0)

radius_create_request — Crea una solicitud de cuenta o de identificación

### Descripción

**radius_create_request**([resource](#language.types.resource) $radius_handle, [int](#language.types.integer) $type): [bool](#language.types.boolean)

Una solicitud Radius consiste en código que especifica una solicitud concreta,
así como cero o varios atributos que proporcionan información adicional.
Para comenzar a construir una nueva solicitud, llámese a la función
**radius_create_request()**.

**Nota**:

    Advertencia: Debe llamarse a esta función antes de pasar cualquier argumento.

### Parámetros

     radius_handle








     type


       El tipo es **[RADIUS_ACCESS_REQUEST](#constant.radius-access-request)** o
       **[RADIUS_ACCOUNTING_REQUEST](#constant.radius-accounting-request)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con radius_create_request()**

&lt;?php
if (!radius_create_request($res, RADIUS_ACCESS_REQUEST)) {
    echo 'Error Radius :' . radius_strerror($res). "\n&lt;br /&gt;";
exit;
}
?&gt;

### Ver también

    - [radius_send_request()](#function.radius-send-request) - Envía una solicitud y espera una respuesta

# radius_cvt_addr

(PECL radius &gt;= 1.1.0)

radius_cvt_addr — Convierte datos brutos en dirección IP

### Descripción

**radius_cvt_addr**([string](#language.types.string) $data): [string](#language.types.string)

Convierte datos brutos en dirección IP

### Parámetros

     data


       Datos de entrada





### Valores devueltos

Devuelve la dirección IP.

### Ejemplos

    **Ejemplo #1 Ejemplo con radius_cvt_addr()**

&lt;?php
while ($resa = radius_get_attr($res)) {

    if (!is_array($resa)) {
        printf ("Error al recuperar los atributos: %s\n",  radius_strerror($res));
        exit;
    }

    $attr = $resa['attr'];
    $data = $resa['data'];

    switch ($attr) {

    case RADIUS_FRAMED_IP_ADDRESS:
        $ip = radius_cvt_addr($data);
        echo "IP: $ip&lt;br&gt;\n";
        break;

    case RADIUS_FRAMED_IP_NETMASK:
        $mask = radius_cvt_addr($data);
        echo "MÁSCARA: $mask&lt;br&gt;\n";
        break;
    }

}
?&gt;

### Ver también

    - [radius_cvt_int()](#function.radius-cvt-int) - Convierte datos brutos en entero

    - [radius_cvt_string()](#function.radius-cvt-string) - Convierte datos brutos en string

# radius_cvt_int

(PECL radius &gt;= 1.1.0)

radius_cvt_int — Convierte datos brutos en entero

### Descripción

**radius_cvt_int**([string](#language.types.string) $data): [int](#language.types.integer)

Convierte datos brutos en entero

### Parámetros

     data


       Datos de entrada.





### Valores devueltos

Devuelve el entero, recuperado desde los datos.

### Ejemplos

    **Ejemplo #1 Ejemplo con radius_cvt_int()**

&lt;?php
while ($resa = radius_get_attr($res)) {

    if (!is_array($resa)) {
        printf ("Error al recuperar los atributos: %s\n",  radius_strerror($res));
        exit;
    }

    $attr = $resa['attr'];
    $data = $resa['data'];

    switch ($attr) {

    case RADIUS_FRAMED_MTU:
        $mtu = radius_cvt_int($data);
        echo "MTU: $mtu&lt;br&gt;\n";
        break;
    }

}
?&gt;

### Ver también

    - [radius_cvt_addr()](#function.radius-cvt-addr) - Convierte datos brutos en dirección IP

    - [radius_cvt_string()](#function.radius-cvt-string) - Convierte datos brutos en string

# radius_cvt_string

(PECL radius &gt;= 1.1.0)

radius_cvt_string — Convierte datos brutos en string

### Descripción

**radius_cvt_string**([string](#language.types.string) $data): [string](#language.types.string)

Convierte datos brutos en string

### Parámetros

     data


       Datos de entrada





### Valores devueltos

Devuelve el string, recuperado desde los datos.

### Ejemplos

    **Ejemplo #1 Ejemplo con radius_cvt_string()**

&lt;?php
while ($resa = radius_get_attr($res)) {

    if (!is_array($resa)) {
        printf ("Error al recuperar los atributos: %s\n",  radius_strerror($res));
        exit;
    }

    $attr = $resa['attr'];
    $data = $resa['data'];

    switch ($attr) {

    case RADIUS_FILTER_ID:
        $id = radius_cvt_string($data);
        echo "Filtre ID : $id&lt;br&gt;\n";
        break;
    }

}
?&gt;

### Ver también

    - [radius_cvt_addr()](#function.radius-cvt-addr) - Convierte datos brutos en dirección IP

    - [radius_cvt_int()](#function.radius-cvt-int) - Convierte datos brutos en entero

# radius_demangle

(PECL radius &gt;= 1.2.0)

radius_demangle — Deshidrata datos

### Descripción

**radius_demangle**([resource](#language.types.resource) $radius_handle, [string](#language.types.string) $mangled): [string](#language.types.string)

Algunos datos (contraseñas, claves MS-CHAPv1 MPPE) son "deshidratados" por
razones de seguridad y deben ser "deshidratados" antes de poder utilizarlos.

### Parámetros

    radius_handleEl recurso RADIUS.



     mangled


       Los datos deformados a descifrar





### Valores devueltos

Devuelve la cadena "deshidratada" o **[false](#constant.false)** si ocurre un error.

# radius_demangle_mppe_key

(PECL radius &gt;= 1.2.0)

radius_demangle_mppe_key — Deriva las claves mppe desde datos

### Descripción

**radius_demangle_mppe_key**([resource](#language.types.resource) $radius_handle, [string](#language.types.string) $mangled): [string](#language.types.string)

Al utilizar MPPE con MS-CHAPv2, las claves recibidas y enviadas
son "secadas" (ver la [» RFC 2548](https://datatracker.ietf.org/doc/html/rfc2548)),
sin embargo, esta función es útil, ya que no se sabe si existe o no una
implementación de PPTP-MPPE en PHP.

### Parámetros

    radius_handleEl recurso RADIUS.



     mangled


       Los datos deformados a descifrar





### Valores devueltos

Devuelve el string o **[false](#constant.false)** si ocurre un error.

# radius_get_attr

(PECL radius &gt;= 1.1.0)

radius_get_attr — Extrae un atributo

### Descripción

**radius_get_attr**([resource](#language.types.resource) $radius_handle): [mixed](#language.types.mixed)

Al igual que las solicitudes Radius, cada respuesta debe contener cero o varios atributos.
Tras recibir una respuesta con éxito mediante la función
[radius_send_request()](#function.radius-send-request), estos atributos pueden ser
extraídos uno a uno utilizando la función **radius_get_attr()**.
En cada llamada a **radius_get_attr()**, se recupera el siguiente atributo
desde la respuesta actual.

### Parámetros

    radius_handleEl recurso RADIUS.

### Valores devueltos

Devuelve un array asociativo que contiene el tipo de atributo junto con los datos
o un número de error &lt;= 0.

### Ejemplos

    **Ejemplo #1 Ejemplo con radius_get_attr()**

&lt;?php
while ($resa = radius_get_attr($res)) {

    if (!is_array($resa)) {
        printf("Error al recuperar el atributo: %s\n",  radius_strerror($res));
        exit;
    }

    $attr = $resa['attr'];
    $data = $resa['data'];
    printf("Atributo recuperado :%d %d bytes %s\n", $attr, strlen($data), bin2hex($data));

}
?&gt;

### Ver también

    - [radius_put_attr()](#function.radius-put-attr) - Adjunta un atributo binario

    - [radius_get_vendor_attr()](#function.radius-get-vendor-attr) - Extrae un atributo específico del proveedor

    - [radius_put_vendor_attr()](#function.radius-put-vendor-attr) - Adjunta un atributo binario a un proveedor específico

    - [radius_send_request()](#function.radius-send-request) - Envía una solicitud y espera una respuesta

# radius_get_tagged_attr_data

(PECL radius &gt;= 1.3.0)

radius_get_tagged_attr_data — Extrae los datos de un atributo

### Descripción

**radius_get_tagged_attr_data**([string](#language.types.string) $data): [string](#language.types.string)|[false](#language.types.singleton)

Si un atributo que contiene un tag ha sido devuelto por la
función [radius_get_attr()](#function.radius-get-attr),
**radius_get_tagged_attr_data()** devuelve los
datos desde este atributo.

### Parámetros

     data


       El atributo que contiene un tag a decodificar.





### Valores devueltos

Devuelve los datos del atributo o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con radius_get_tagged_attr_data()**

&lt;?php
while ($resa = radius_get_attr($res)) {
if (!is_array($resa)) {
        printf ("Error al recuperar el atributo: %s\n",  radius_strerror($res));
exit;
}

    $attr = $resa['attr'];
    $data = $resa['data'];

    $tag = radius_get_tagged_attr_tag($data);
    $value = radius_get_tagged_attr_data($data);

    printf("Recuperación del atributo que contiene el tag %d y el valor %s\n", $tag, $value);

}
?&gt;

### Ver también

    - [radius_get_attr()](#function.radius-get-attr) - Extrae un atributo

    - [radius_get_tagged_attr_tag()](#function.radius-get-tagged-attr-tag) - Extrae la etiqueta desde un atributo

# radius_get_tagged_attr_tag

(PECL radius &gt;= 1.3.0)

radius_get_tagged_attr_tag — Extrae la etiqueta desde un atributo

### Descripción

**radius_get_tagged_attr_tag**([string](#language.types.string) $data): [int](#language.types.integer)|[false](#language.types.singleton)

Si un atributo que contiene una etiqueta ha sido devuelto por la función
[radius_get_attr()](#function.radius-get-attr),
[radius_get_tagged_attr_data()](#function.radius-get-tagged-attr-data) va devolver la etiqueta
desde el atributo.

### Parámetros

     data


       El atributo a decodificar.





### Valores devueltos

Devuelve la etiqueta desde el atributo o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con radius_get_tagged_attr_tag()**

&lt;?php
while ($resa = radius_get_attr($res)) {
if (!is_array($resa)) {
        printf ("Error al recuperar el atributo: %s\n",  radius_strerror($res));
exit;
}

    $attr = $resa['attr'];
    $data = $resa['data'];

    $tag = radius_get_tagged_attr_tag($data);
    $value = radius_get_tagged_attr_data($data);

    printf("Recuperación del atributo conteniendo la etiqueta %d y el valor %s\n", $tag, $value);

}
?&gt;

### Ver también

    - [radius_get_attr()](#function.radius-get-attr) - Extrae un atributo

    - [radius_get_tagged_attr_data()](#function.radius-get-tagged-attr-data) - Extrae los datos de un atributo

# radius_get_vendor_attr

(PECL radius &gt;= 1.1.0)

radius_get_vendor_attr — Extrae un atributo específico del proveedor

### Descripción

**radius_get_vendor_attr**([string](#language.types.string) $data): [array](#language.types.array)

Si [radius_get_attr()](#function.radius-get-attr) devuelve
**[RADIUS_VENDOR_SPECIFIC](#constant.radius-vendor-specific)**,
**radius_get_vendor_attr()** puede ser llamado para
determinar el proveedor.

### Parámetros

     data


       Datos de entrada.





### Valores devueltos

Devuelve un array asociativo que contiene el tipo de atributo, el proveedor así
como los datos, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con radius_get_vendor_attr()**

&lt;?php
while ($resa = radius_get_attr($res)) {

    if (!is_array($resa)) {
        printf ("Error al recuperar el atributo: %s\n",  radius_strerror($res));
        exit;
    }

    $attr = $resa['attr'];
    $data = $resa['data'];
    printf("Atributo recuperado :%d %d octetos %s\n", $attr, strlen($data), bin2hex($data));
    if ($attr == RADIUS_VENDOR_SPECIFIC) {

        $resv = radius_get_vendor_attr($data);
        if (is_array($resv)) {
            $vendor = $resv['vendor'];
            $attrv = $resv['attr'];
            $datav = $resv['data'];
            printf("Recuperación del proveedor del atributo :%d %d octetos %s\n", $attrv, strlen($datav), bin2hex($datav));
        }

    }

}
?&gt;

### Ver también

    - [radius_get_attr()](#function.radius-get-attr) - Extrae un atributo

    - [radius_put_vendor_attr()](#function.radius-put-vendor-attr) - Adjunta un atributo binario a un proveedor específico

# radius_put_addr

(PECL radius &gt;= 1.1.0)

radius_put_addr — Adjunta una dirección IP como atributo

### Descripción

**radius_put_addr**(
    [resource](#language.types.resource) $radius_handle,
    [int](#language.types.integer) $type,
    [string](#language.types.string) $addr,
    [int](#language.types.integer) $options = 0,
    [int](#language.types.integer) $tag = ?
): [bool](#language.types.boolean)

Adjunta una dirección IP a la solicitud RADIUS actual.

**Nota**:

Una petición debe ser creada mediante la función [radius_create_request()](#function.radius-create-request) antes de que esta función pueda ser llamada.

### Parámetros

    radius_handleEl recurso RADIUS.


    typeEl tipo de atributo.



     addr


       Una dirección IPv4; por ejemplo 10.0.0.1.





    optionsUna máscara de opciones de atributo. Las opciones disponibles incluyen [**<a href="#constant.radius-option-tagged">RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**</a> y [**<a href="#constant.radius-option-salt">RADIUS_OPTION_SALT](#constant.radius-option-salt)**</a>.


    tagLa etiqueta del atributo. Este parámetro es ignorado mientras que la opción [**<a href="#constant.radius-option-tagged">RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**</a> esté definida.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL radius 1.3.0

        Los parámetros options y tag
        fueron añadidos.





# radius_put_attr

(PECL radius &gt;= 1.1.0)

radius_put_attr — Adjunta un atributo binario

### Descripción

**radius_put_attr**(
    [resource](#language.types.resource) $radius_handle,
    [int](#language.types.integer) $type,
    [string](#language.types.string) $value,
    [int](#language.types.integer) $options = 0,
    [int](#language.types.integer) $tag = ?
): [bool](#language.types.boolean)

Adjunta un atributo binario a la petición RADIUS actual.

**Nota**:

Una petición debe ser creada mediante la función [radius_create_request()](#function.radius-create-request) antes de que esta función pueda ser llamada.

### Parámetros

    radius_handleEl recurso RADIUS.


    typeEl tipo de atributo.



     value


       El valor del atributo, que será tratado como un string sin tratar.





    optionsUna máscara de opciones de atributo. Las opciones disponibles incluyen [**<a href="#constant.radius-option-tagged">RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**</a> y [**<a href="#constant.radius-option-salt">RADIUS_OPTION_SALT](#constant.radius-option-salt)**</a>.


    tagLa etiqueta del atributo. Este parámetro es ignorado mientras que la opción [**<a href="#constant.radius-option-tagged">RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**</a> esté definida.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL radius 1.3.0

        Los parámetros options y tag
        han sido añadidos.





### Ejemplos

    **Ejemplo #1 Ejemplo con radius_put_attr()**



     &lt;?php

mt_srand(time());
$chall = mt_rand();
$chapval = hash('md5', pack('Ca*',1 , 'sepp' . $chall));
$pass = pack('CH*', 1, $chapval);
if (!radius_put_attr($res, RADIUS_CHAP_PASSWORD, $pass)) {
    echo 'RadiusError:' . radius_strerror($res). "\n&lt;br /&gt;";
exit;
}
?&gt;

### Ver también

    - [radius_get_attr()](#function.radius-get-attr) - Extrae un atributo

    - [radius_get_vendor_attr()](#function.radius-get-vendor-attr) - Extrae un atributo específico del proveedor

    - [radius_put_vendor_attr()](#function.radius-put-vendor-attr) - Adjunta un atributo binario a un proveedor específico

# radius_put_int

(PECL radius &gt;= 1.1.0)

radius_put_int — Adjunta un atributo entero

### Descripción

**radius_put_int**(
    [resource](#language.types.resource) $radius_handle,
    [int](#language.types.integer) $type,
    [int](#language.types.integer) $value,
    [int](#language.types.integer) $options = 0,
    [int](#language.types.integer) $tag = ?
): [bool](#language.types.boolean)

Adjunta un atributo entero a la petición RADIUS actual.

**Nota**:

Una petición debe ser creada mediante la función [radius_create_request()](#function.radius-create-request) antes de que esta función pueda ser llamada.

### Parámetros

    radius_handleEl recurso RADIUS.


    typeEl tipo de atributo.



     value


       El valor del atributo.





    optionsUna máscara de opciones de atributo. Las opciones disponibles incluyen [**<a href="#constant.radius-option-tagged">RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**</a> y [**<a href="#constant.radius-option-salt">RADIUS_OPTION_SALT](#constant.radius-option-salt)**</a>.


    tagLa etiqueta del atributo. Este parámetro es ignorado mientras que la opción [**<a href="#constant.radius-option-tagged">RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**</a> esté definida.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL radius 1.3.0

        Los parámetros options y tag
        han sido añadidos.





### Ejemplos

    **Ejemplo #1 Ejemplo con radius_put_int()**

&lt;?php
if (!radius_put_int($res, RAD_FRAMED_PROTOCOL, RAD_PPP)) {
   echo 'Error Radius :' . radius_strerror($res). "\n&lt;br /&gt;";
exit;
}
?&gt;

### Ver también

    - [radius_put_string()](#function.radius-put-string) - Adjunta un atributo de tipo string

    - [radius_put_vendor_int()](#function.radius-put-vendor-int) - Adjunta un atributo entero a un proveedor específico

    - [radius_put_vendor_string()](#function.radius-put-vendor-string) - Adjunta un atributo en forma de string a un vendedor específico

# radius_put_string

(PECL radius &gt;= 1.1.0)

radius_put_string — Adjunta un atributo de tipo string

### Descripción

**radius_put_string**(
    [resource](#language.types.resource) $radius_handle,
    [int](#language.types.integer) $type,
    [string](#language.types.string) $value,
    [int](#language.types.integer) $options = 0,
    [int](#language.types.integer) $tag = ?
): [bool](#language.types.boolean)

Adjunta un atributo en forma de string a la petición RADIUS actual.
Generalmente, la función [radius_put_attr()](#function.radius-put-attr) es más
útil para esto, ya que es segura a nivel de bits.

**Nota**:

Una petición debe ser creada mediante la función [radius_create_request()](#function.radius-create-request) antes de que esta función pueda ser llamada.

### Parámetros

    radius_handleEl recurso RADIUS.


    typeEl tipo de atributo.



     value


       El valor del atributo. Este valor es esperado por la biblioteca
       subyacente como terminado por **[null](#constant.null)** ; por lo tanto, este parámetro
       no es seguro a nivel de bits.





    optionsUna máscara de opciones de atributo. Las opciones disponibles incluyen [**<a href="#constant.radius-option-tagged">RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**</a> y [**<a href="#constant.radius-option-salt">RADIUS_OPTION_SALT](#constant.radius-option-salt)**</a>.


    tagLa etiqueta del atributo. Este parámetro es ignorado mientras que la opción [**<a href="#constant.radius-option-tagged">RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**</a> esté definida.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL radius 1.3.0

        Los parámetros options y tag
        fueron añadidos.





### Ejemplos

    **Ejemplo #1 Ejemplo con radius_put_string()**

&lt;?php
if (!radius_put_string($res, RADIUS_USER_NAME, 'billy')) {
    echo 'Error Radius :' . radius_strerror($res). "\n&lt;br /&gt;";
exit;
}
?&gt;

### Ver también

    - [radius_put_int()](#function.radius-put-int) - Adjunta un atributo entero

    - [radius_put_vendor_int()](#function.radius-put-vendor-int) - Adjunta un atributo entero a un proveedor específico

    - [radius_put_vendor_string()](#function.radius-put-vendor-string) - Adjunta un atributo en forma de string a un vendedor específico

# radius_put_vendor_addr

(PECL radius &gt;= 1.1.0)

radius_put_vendor_addr — Asocia una dirección IP específica a un proveedor

### Descripción

**radius_put_vendor_addr**(
    [resource](#language.types.resource) $radius_handle,
    [int](#language.types.integer) $vendor,
    [int](#language.types.integer) $type,
    [string](#language.types.string) $addr
): [bool](#language.types.boolean)

Asocia una dirección IP específica al proveedor para la solicitud RADIUS actual.

**Nota**:

Una petición debe ser creada mediante la función [radius_create_request()](#function.radius-create-request) antes de que esta función pueda ser llamada.

### Parámetros

    radius_handleEl recurso RADIUS.


    vendorEl identificador del proveedor.


    typeEl tipo de atributo.



     addr


       Una dirección IPv4; por ejemplo 10.0.0.1.





    optionsUna máscara de opciones de atributo. Las opciones disponibles incluyen [**<a href="#constant.radius-option-tagged">RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**</a> y [**<a href="#constant.radius-option-salt">RADIUS_OPTION_SALT](#constant.radius-option-salt)**</a>.


    tagLa etiqueta del atributo. Este parámetro es ignorado mientras que la opción [**<a href="#constant.radius-option-tagged">RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**</a> esté definida.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL radius 1.3.0

        Se han añadido los parámetros options y tag.





# radius_put_vendor_attr

(PECL radius &gt;= 1.1.0)

radius_put_vendor_attr — Adjunta un atributo binario a un proveedor específico

### Descripción

**radius_put_vendor_attr**(
    [resource](#language.types.resource) $radius_handle,
    [int](#language.types.integer) $vendor,
    [int](#language.types.integer) $type,
    [string](#language.types.string) $value,
    [int](#language.types.integer) $options = 0,
    [int](#language.types.integer) $tag = ?
): [bool](#language.types.boolean)

Adjunta un atributo binario específico al proveedor para la petición RADIUS actual.

**Nota**:

Una petición debe ser creada mediante la función [radius_create_request()](#function.radius-create-request) antes de que esta función pueda ser llamada.

    ### Parámetros





      radius_handleEl recurso RADIUS.


      vendorEl identificador del proveedor.


      typeEl tipo de atributo.



       value


         El valor del atributo, que será tratado como un string sin tratar.





      optionsUna máscara de opciones de atributo. Las opciones disponibles incluyen [**<a href="#constant.radius-option-tagged">RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**</a> y [**<a href="#constant.radius-option-salt">RADIUS_OPTION_SALT](#constant.radius-option-salt)**</a>.


      tagLa etiqueta del atributo. Este parámetro es ignorado mientras que la opción [**<a href="#constant.radius-option-tagged">RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**</a> esté definida.








    ### Valores devueltos


     Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL radius 1.3.0

        Los parámetros options y tag
        fueron añadidos.












    ### Ejemplos





      **Ejemplo #1 Ejemplo con radius_put_vendor_attr()**




&lt;?php
if (!radius_put_vendor_attr($res, RADIUS_VENDOR_MICROSOFT, RAD_MICROSOFT_MS_CHAP_CHALLENGE, $challenge)) {
    echo 'Error Radius :' . radius_strerror($res). "\n&lt;br /&gt;";
exit;
}
?&gt;

    ### Ver también





      - [radius_get_vendor_attr()](#function.radius-get-vendor-attr) - Extrae un atributo específico del proveedor



# radius_put_vendor_int

(PECL radius &gt;= 1.1.0)

radius_put_vendor_int — Adjunta un atributo entero a un proveedor específico

### Descripción

**radius_put_vendor_int**(
    [resource](#language.types.resource) $radius_handle,
    [int](#language.types.integer) $vendor,
    [int](#language.types.integer) $type,
    [int](#language.types.integer) $value,
    [int](#language.types.integer) $options = 0,
    [int](#language.types.integer) $tag = ?
): [bool](#language.types.boolean)

Adjunta un atributo específico al proveedor en la petición RADIUS actual.

### Parámetros

    radius_handleEl recurso RADIUS.


    vendorEl identificador del proveedor.


    typeEl tipo de atributo.



     value


       El valor del atributo.





    optionsUna máscara de opciones de atributo. Las opciones disponibles incluyen [**<a href="#constant.radius-option-tagged">RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**</a> y [**<a href="#constant.radius-option-salt">RADIUS_OPTION_SALT](#constant.radius-option-salt)**</a>.


    tagLa etiqueta del atributo. Este parámetro es ignorado mientras que la opción [**<a href="#constant.radius-option-tagged">RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**</a> esté definida.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL radius 1.3.0

        Se han añadido los argumentos options y tag.





### Ver también

    - [radius_put_vendor_string()](#function.radius-put-vendor-string) - Adjunta un atributo en forma de string a un vendedor específico

# radius_put_vendor_string

(PECL radius &gt;= 1.1.0)

radius_put_vendor_string — Adjunta un atributo en forma de string a un vendedor específico

### Descripción

**radius_put_vendor_string**(
    [resource](#language.types.resource) $radius_handle,
    [int](#language.types.integer) $vendor,
    [int](#language.types.integer) $type,
    [string](#language.types.string) $value,
    [int](#language.types.integer) $options = 0,
    [int](#language.types.integer) $tag = ?
): [bool](#language.types.boolean)

Adjunta un atributo específico al vendedor a la petición actual RADIUS.
En general, [radius_put_vendor_attr()](#function.radius-put-vendor-attr) es una función más
práctica para adjuntar atributos, siendo segura a nivel de bits.

### Parámetros

    radius_handleEl recurso RADIUS.


    vendorEl identificador del proveedor.


    typeEl tipo de atributo.



     value


       El valor del atributo. Este valor es esperado por la biblioteca
       subyacente como terminado por **[null](#constant.null)** ; por lo tanto, este parámetro
       no es seguro a nivel de bits.





    optionsUna máscara de opciones de atributo. Las opciones disponibles incluyen [**<a href="#constant.radius-option-tagged">RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**</a> y [**<a href="#constant.radius-option-salt">RADIUS_OPTION_SALT](#constant.radius-option-salt)**</a>.


    tagLa etiqueta del atributo. Este parámetro es ignorado mientras que la opción [**<a href="#constant.radius-option-tagged">RADIUS_OPTION_TAGGED](#constant.radius-option-tagged)**</a> esté definida.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL radius 1.3.0

        Los parámetros options y tag
        fueron añadidos.





### Ver también

    - [radius_put_vendor_int()](#function.radius-put-vendor-int) - Adjunta un atributo entero a un proveedor específico

# radius_request_authenticator

(PECL radius &gt;= 1.1.0)

radius_request_authenticator — Devuelve el identificador solicitado

### Descripción

**radius_request_authenticator**([resource](#language.types.resource) $radius_handle): [string](#language.types.string)

El identificador solicitado es necesario para la recuperación de datos
como contraseñas y claves de cifrado.

### Parámetros

    radius_handleEl recurso RADIUS.

### Valores devueltos

Devuelve el identificador solicitado como string o
**[false](#constant.false)** en caso de error.

### Ver también

    - [radius_demangle()](#function.radius-demangle) - Deshidrata datos

# radius_salt_encrypt_attr

(PECL radius &gt;= 1.3.0)

radius_salt_encrypt_attr — Cifra un valor utilizando un Salt

### Descripción

**radius_salt_encrypt_attr**([resource](#language.types.resource) $radius_handle, [string](#language.types.string) $data): [string](#language.types.string)|[false](#language.types.singleton)

Se aplica el algoritmo RADIUS salt al valor proporcionado.

Generalmente, esto se realiza automáticamente al proporcionar
la opción **[RADIUS_OPTION_SALT](#constant.radius-option-salt)** a la función
que define el atributo, pero esta función puede ser utilizada
si se requiere una construcción de consulta a bajo nivel.

### Parámetros

     data


       Los datos a cifrar con un salt.





### Valores devueltos

Devuelve los datos cifrados utilizando un salt
o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [radius_put_addr()](#function.radius-put-addr) - Adjunta una dirección IP como atributo

    - [radius_put_attr()](#function.radius-put-attr) - Adjunta un atributo binario

    - [radius_put_int()](#function.radius-put-int) - Adjunta un atributo entero

    - [radius_put_string()](#function.radius-put-string) - Adjunta un atributo de tipo string

# radius_send_request

(PECL radius &gt;= 1.1.0)

radius_send_request — Envía una solicitud y espera una respuesta

### Descripción

**radius_send_request**([resource](#language.types.resource) $radius_handle): [int](#language.types.integer)

Una vez que se ha construido una solicitud Radius, esta es enviada mediante
la función **radius_send_request()**.

La función **radius_send_request()** envía la solicitud
y espera una respuesta válida, intentando de nuevo, según el método
round-robin siempre que sea necesario.

### Parámetros

    radius_handleEl recurso RADIUS.

### Valores devueltos

Si se recibe una respuesta válida, **radius_send_request()**
devuelve el código Radius que especifica el tipo de respuesta. Esto es, típicamente,
**[RADIUS_ACCESS_ACCEPT](#constant.radius-access-accept)**,
**[RADIUS_ACCESS_REJECT](#constant.radius-access-reject)** o
**[RADIUS_ACCESS_CHALLENGE](#constant.radius-access-challenge)**. Si no se recibe
ninguna respuesta válida, **radius_send_request()** devolverá **[false](#constant.false)**.

### Ver también

    - [radius_create_request()](#function.radius-create-request) - Crea una solicitud de cuenta o de identificación

# radius_server_secret

(PECL radius &gt;= 1.1.0)

radius_server_secret — Devuelve el secreto compartido

### Descripción

**radius_server_secret**([resource](#language.types.resource) $radius_handle): [string](#language.types.string)

El secreto compartido es necesario para el restablecimiento de los datos
como las contraseñas y las claves de cifrado.

### Parámetros

    radius_handleEl recurso RADIUS.

### Valores devueltos

Devuelve el secreto compartido del servidor como un string
o **[false](#constant.false)** en caso de error.

# radius_strerror

(PECL radius &gt;= 1.1.0)

radius_strerror — Devuelve un mensaje de error

### Descripción

**radius_strerror**([resource](#language.types.resource) $radius_handle): [string](#language.types.string)

Si las funciones radio fallan entonces guardan un mensaje de error. Este mensaje de error
puede ser obtenido con esta función.

### Parámetros

    radius_handleEl recurso RADIUS.

### Valores devueltos

Devuelve mensajes de error como string de funciones radio fallidas.

## Tabla de contenidos

- [radius_acct_open](#function.radius-acct-open) — Crea un manejador Radius para el conteo
- [radius_add_server](#function.radius-add-server) — Añade un servidor
- [radius_auth_open](#function.radius-auth-open) — Crea un identificador de Radius para la autenticación
- [radius_close](#function.radius-close) — Libera todos los recursos
- [radius_config](#function.radius-config) — Solicita a la biblioteca que lea un archivo de configuración dado
- [radius_create_request](#function.radius-create-request) — Crea una solicitud de cuenta o de identificación
- [radius_cvt_addr](#function.radius-cvt-addr) — Convierte datos brutos en dirección IP
- [radius_cvt_int](#function.radius-cvt-int) — Convierte datos brutos en entero
- [radius_cvt_string](#function.radius-cvt-string) — Convierte datos brutos en string
- [radius_demangle](#function.radius-demangle) — Deshidrata datos
- [radius_demangle_mppe_key](#function.radius-demangle-mppe-key) — Deriva las claves mppe desde datos
- [radius_get_attr](#function.radius-get-attr) — Extrae un atributo
- [radius_get_tagged_attr_data](#function.radius-get-tagged-attr-data) — Extrae los datos de un atributo
- [radius_get_tagged_attr_tag](#function.radius-get-tagged-attr-tag) — Extrae la etiqueta desde un atributo
- [radius_get_vendor_attr](#function.radius-get-vendor-attr) — Extrae un atributo específico del proveedor
- [radius_put_addr](#function.radius-put-addr) — Adjunta una dirección IP como atributo
- [radius_put_attr](#function.radius-put-attr) — Adjunta un atributo binario
- [radius_put_int](#function.radius-put-int) — Adjunta un atributo entero
- [radius_put_string](#function.radius-put-string) — Adjunta un atributo de tipo string
- [radius_put_vendor_addr](#function.radius-put-vendor-addr) — Asocia una dirección IP específica a un proveedor
- [radius_put_vendor_attr](#function.radius-put-vendor-attr) — Adjunta un atributo binario a un proveedor específico
- [radius_put_vendor_int](#function.radius-put-vendor-int) — Adjunta un atributo entero a un proveedor específico
- [radius_put_vendor_string](#function.radius-put-vendor-string) — Adjunta un atributo en forma de string a un vendedor específico
- [radius_request_authenticator](#function.radius-request-authenticator) — Devuelve el identificador solicitado
- [radius_salt_encrypt_attr](#function.radius-salt-encrypt-attr) — Cifra un valor utilizando un Salt
- [radius_send_request](#function.radius-send-request) — Envía una solicitud y espera una respuesta
- [radius_server_secret](#function.radius-server-secret) — Devuelve el secreto compartido
- [radius_strerror](#function.radius-strerror) — Devuelve un mensaje de error

- [Introducción](#intro.radius)
- [Instalación/Configuración](#radius.setup)<li>[Instalación](#radius.installation)
  </li>- [Constantes predefinidas](#radius.constants)<li>[Opciones RADIUS](#radius.constants.options)
- [Tipos de paquetes RADIUS](#radius.constants.packets)
- [Tipos de atributo RADIUS](#radius.constants.attributes)
- [Tipos de atributo RADIUS específicos del vendedor](#radius.constants.vendor-specific)
  </li>- [Ejemplos](#radius.examples)
- [Funciones Radius](#ref.radius)<li>[radius_acct_open](#function.radius-acct-open) — Crea un manejador Radius para el conteo
- [radius_add_server](#function.radius-add-server) — Añade un servidor
- [radius_auth_open](#function.radius-auth-open) — Crea un identificador de Radius para la autenticación
- [radius_close](#function.radius-close) — Libera todos los recursos
- [radius_config](#function.radius-config) — Solicita a la biblioteca que lea un archivo de configuración dado
- [radius_create_request](#function.radius-create-request) — Crea una solicitud de cuenta o de identificación
- [radius_cvt_addr](#function.radius-cvt-addr) — Convierte datos brutos en dirección IP
- [radius_cvt_int](#function.radius-cvt-int) — Convierte datos brutos en entero
- [radius_cvt_string](#function.radius-cvt-string) — Convierte datos brutos en string
- [radius_demangle](#function.radius-demangle) — Deshidrata datos
- [radius_demangle_mppe_key](#function.radius-demangle-mppe-key) — Deriva las claves mppe desde datos
- [radius_get_attr](#function.radius-get-attr) — Extrae un atributo
- [radius_get_tagged_attr_data](#function.radius-get-tagged-attr-data) — Extrae los datos de un atributo
- [radius_get_tagged_attr_tag](#function.radius-get-tagged-attr-tag) — Extrae la etiqueta desde un atributo
- [radius_get_vendor_attr](#function.radius-get-vendor-attr) — Extrae un atributo específico del proveedor
- [radius_put_addr](#function.radius-put-addr) — Adjunta una dirección IP como atributo
- [radius_put_attr](#function.radius-put-attr) — Adjunta un atributo binario
- [radius_put_int](#function.radius-put-int) — Adjunta un atributo entero
- [radius_put_string](#function.radius-put-string) — Adjunta un atributo de tipo string
- [radius_put_vendor_addr](#function.radius-put-vendor-addr) — Asocia una dirección IP específica a un proveedor
- [radius_put_vendor_attr](#function.radius-put-vendor-attr) — Adjunta un atributo binario a un proveedor específico
- [radius_put_vendor_int](#function.radius-put-vendor-int) — Adjunta un atributo entero a un proveedor específico
- [radius_put_vendor_string](#function.radius-put-vendor-string) — Adjunta un atributo en forma de string a un vendedor específico
- [radius_request_authenticator](#function.radius-request-authenticator) — Devuelve el identificador solicitado
- [radius_salt_encrypt_attr](#function.radius-salt-encrypt-attr) — Cifra un valor utilizando un Salt
- [radius_send_request](#function.radius-send-request) — Envía una solicitud y espera una respuesta
- [radius_server_secret](#function.radius-server-secret) — Devuelve el secreto compartido
- [radius_strerror](#function.radius-strerror) — Devuelve un mensaje de error
  </li>
