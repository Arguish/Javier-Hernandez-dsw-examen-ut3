# SOAP

# Introducción

La extensión SOAP se puede utilizar para escribir servidores y clientes SOAP. Admite
los subconjuntos de especificaciones [» SOAP 1.1](http://www.w3.org/TR/soap11/), [» SOAP 1.2](http://www.w3.org/TR/soap12/) y [» WSDL 1.1](http://www.w3.org/TR/wsdl).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#soap.requirements)
- [Instalación](#soap.installation)
- [Configuración en tiempo de ejecución](#soap.configuration)

    ## Requerimientos

Esta extensión requiere la extensión PHP [libxml](#book.libxml).
Esto significa pasar la opción de configuración
**--with-libxml**, o anterior a PHP 7.4
la opción de configuración **--enable-libxml**,
aunque esto se realiza implícitamente ya que libxml está activado por omisión.

## Instalación

Para habilitar el soporte de SOAP, se ha de configurar PHP con **--enable-soap**.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de SOAP**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [soap.wsdl_cache_enabled](#ini.soap.wsdl-cache-enabled)
      1
      **[INI_ALL](#constant.ini-all)**




      [soap.wsdl_cache_dir](#ini.soap.wsdl-cache-dir)
      /tmp
      **[INI_ALL](#constant.ini-all)**




      [soap.wsdl_cache_ttl](#ini.soap.wsdl-cache-ttl)
      86400
      **[INI_ALL](#constant.ini-all)**




      [soap.wsdl_cache](#ini.soap.wsdl-cache)
      1
      **[INI_ALL](#constant.ini-all)**




      [soap.wsdl_cache_limit](#ini.soap.wsdl-cache-limit)
      5
      **[INI_ALL](#constant.ini-all)**



Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     soap.wsdl_cache_enabled
     [integer](#language.types.integer)



      Activa o desactiva la función de almacenamiento en caché de WSDL.







     soap.wsdl_cache_dir
     [string](#language.types.string)



      Define el nombre del directorio donde la extensión SOAP guardará los ficheros en caché.







     soap.wsdl_cache_ttl
     [integer](#language.types.integer)



      Define el número de segundos (tiempo de vida) por los que los ficheros en caché serán
      usados en lugar de los originales.







     soap.wsdl_cache
     [integer](#language.types.integer)



      Si la opción soap.wsdl_cache_enabled está activada, este ajuste
      determina el tipo de almacenamiento en caché. Puede ser cualquiera de estos tipos:
      **[WSDL_CACHE_NONE](#constant.wsdl-cache-none)** (0),
      **[WSDL_CACHE_DISK](#constant.wsdl-cache-disk)** (1),
      **[WSDL_CACHE_MEMORY](#constant.wsdl-cache-memory)** (2) o
      **[WSDL_CACHE_BOTH](#constant.wsdl-cache-both)** (3). También puede
      definirse usando el array options del constructor de
      [SoapClient](#class.soapclient) o de
      [SoapServer](#class.soapserver).







     soap.wsdl_cache_limit
     [integer](#language.types.integer)



      Número máximo de ficheros WSDL almacenados en caché de memoria. Si se añaden más ficheros
      a una caché de memoria llena, se eliminarán los ficheros más antiguos de la misma.


# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

  <caption>**Constantes SOAP**</caption>
  
   
    
     Constante
     Valor
     Descripción


      **[SOAP_1_1](#constant.soap-1-1)**
      ([int](#language.types.integer))

     1

      Especifica el uso de SOAP 1.1 cuando se pasa como opción soap_version
      a [SoapServer::__construct()](#soapserver.construct) o
      [SoapClient::__construct()](#soapclient.construct).





      **[SOAP_1_2](#constant.soap-1-2)**
      ([int](#language.types.integer))

     2

      Especifica el uso de SOAP 1.2 cuando se pasa como opción soap_version
      a [SoapServer::__construct()](#soapserver.construct) o [SoapClient::__construct()](#soapclient.construct).





      **[SOAP_PERSISTENCE_SESSION](#constant.soap-persistence-session)**
      ([int](#language.types.integer))

     1

      Especifica el uso del encodado SOAP cuando se pasa como opción
      use al método [SoapClient::__construct()](#soapclient.construct).





      **[SOAP_PERSISTENCE_REQUEST](#constant.soap-persistence-request)**
      ([int](#language.types.integer))

     2

      Especifica el uso de un encodado específico del servicio cuando se pasa como
      opción use a [SoapClient::__construct()](#soapclient.construct).





      **[SOAP_FUNCTIONS_ALL](#constant.soap-functions-all)**
      ([int](#language.types.integer))

     999
      




      **[SOAP_ENCODED](#constant.soap-encoded)**
      ([int](#language.types.integer))

     1

      Especifica el uso de un enlace de estilo RPC cuando se pasa como opción
      style a [SoapClient::__construct()](#soapclient.construct).





      **[SOAP_LITERAL](#constant.soap-literal)**
      ([int](#language.types.integer))

     2

      Especifica el uso de un enlace de tipo documento cuando se pasa como valor style
      de la opción a [SoapClient::__construct()](#soapclient.construct).





      **[SOAP_RPC](#constant.soap-rpc)**
      ([int](#language.types.integer))

     1
      




      **[SOAP_DOCUMENT](#constant.soap-document)**
      ([int](#language.types.integer))

     2
      




      **[SOAP_ACTOR_NEXT](#constant.soap-actor-next)**
      ([int](#language.types.integer))

     1
      




      **[SOAP_ACTOR_NONE](#constant.soap-actor-none)**
      ([int](#language.types.integer))

     2
      




      **[SOAP_ACTOR_UNLIMATERECEIVER](#constant.soap-actor-unlimatereceiver)**
      ([int](#language.types.integer))

     3
      




      **[SOAP_COMPRESSION_ACCEPT](#constant.soap-compression-accept)**
      ([int](#language.types.integer))

     32

      Especifica el uso del encabezado "Accept-Encoding" cuando se pasa
      como parte de
      [
       la opción compression
      ](#soapclient.construct.options.compression)
      a [SoapClient::__construct()](#soapclient.construct).





      **[SOAP_COMPRESSION_GZIP](#constant.soap-compression-gzip)**
      ([int](#language.types.integer))

     0

      Especifica el uso de la compresión deflate
      cuando se transmite en el marco de
      [
       la opción compression
      ](#soapclient.construct.options.compression)
      del método [SoapClient::__construct()](#soapclient.construct).





      **[SOAP_COMPRESSION_DEFLATE](#constant.soap-compression-deflate)**
      ([int](#language.types.integer))

     16

      Especifica el uso de la compresión deflate
      cuando se transmite en el marco de
      [
       la opción compression
      ](#soapclient.construct.options.compression)
      del método [SoapClient::__construct()](#soapclient.construct).





      **[SOAP_AUTHENTICATION_BASIC](#constant.soap-authentication-basic)**
      ([int](#language.types.integer))

     0

      Especifica el uso de la autenticación HTTP Basic cuando se pasa
      como opción authentication a
      [SoapClient::__construct()](#soapclient.construct).





      **[SOAP_AUTHENTICATION_DIGEST](#constant.soap-authentication-digest)**
      ([int](#language.types.integer))

     1

      Especifica el uso de la autenticación HTTP Digest cuando se pasa como
      opción authentication a
      [SoapClient::__construct()](#soapclient.construct).





      **[SOAP_SSL_METHOD_TLS](#constant.soap-ssl-method-tls)**
      ([int](#language.types.integer))

     0

      Utilizada con la opción obsoleta
      [
       ssl_method
      ](#soapclient.construct.options.ssl-method)
      de [SoapClient::__construct()](#soapclient.construct).





      **[SOAP_SSL_METHOD_SSLv2](#constant.soap-ssl-method-sslv2)**
      ([int](#language.types.integer))

     1

      Utilizada con la opción
      [
       ssl_method
      ](#soapclient.construct.options.ssl-method)
      obsoleta en el método [SoapClient::__construct()](#soapclient.construct).





      **[SOAP_SSL_METHOD_SSLv3](#constant.soap-ssl-method-sslv3)**
      ([int](#language.types.integer))

     2

     Utilizada con la opción obsoleta
     [
      ssl_method
     ](#soapclient.construct.options.ssl-method)
     para [SoapClient::__construct()](#soapclient.construct).





      **[SOAP_SSL_METHOD_SSLv23](#constant.soap-ssl-method-sslv23)**
      ([int](#language.types.integer))

     3

     Utilizada con la opción obsoleta
     [
      ssl_method
     ](#soapclient.construct.options.ssl-method)
     para [SoapClient::__construct()](#soapclient.construct).





      **[UNKNOWN_TYPE](#constant.unknown-type)**
      ([int](#language.types.integer))

     999998
      




      **[XSD_STRING](#constant.xsd-string)**
      ([int](#language.types.integer))

     101
      




      **[XSD_BOOLEAN](#constant.xsd-boolean)**
      ([int](#language.types.integer))

     102
      




      **[XSD_DECIMAL](#constant.xsd-decimal)**
      ([int](#language.types.integer))

     103
      




      **[XSD_FLOAT](#constant.xsd-float)**
      ([int](#language.types.integer))

     104
      




      **[XSD_DOUBLE](#constant.xsd-double)**
      ([int](#language.types.integer))

     105
      




      **[XSD_DURATION](#constant.xsd-duration)**
      ([int](#language.types.integer))

     106
      




      **[XSD_DATETIME](#constant.xsd-datetime)**
      ([int](#language.types.integer))

     107
      




      **[XSD_TIME](#constant.xsd-time)**
      ([int](#language.types.integer))

     108
      




      **[XSD_DATE](#constant.xsd-date)**
      ([int](#language.types.integer))

     109
      




      **[XSD_GYEARMONTH](#constant.xsd-gyearmonth)**
      ([int](#language.types.integer))

     110
      




      **[XSD_GYEAR](#constant.xsd-gyear)**
      ([int](#language.types.integer))

     111
      




      **[XSD_GMONTHDAY](#constant.xsd-gmonthday)**
      ([int](#language.types.integer))

     112
      




      **[XSD_GDAY](#constant.xsd-gday)**
      ([int](#language.types.integer))

     113
      




      **[XSD_GMONTH](#constant.xsd-gmonth)**
      ([int](#language.types.integer))

     114
      




      **[XSD_HEXBINARY](#constant.xsd-hexbinary)**
      ([int](#language.types.integer))

     115
      




      **[XSD_BASE64BINARY](#constant.xsd-base64binary)**
      ([int](#language.types.integer))

     116
      




      **[XSD_ANYURI](#constant.xsd-anyuri)**
      ([int](#language.types.integer))

     117
      




      **[XSD_QNAME](#constant.xsd-qname)**
      ([int](#language.types.integer))

     118
      




      **[XSD_NOTATION](#constant.xsd-notation)**
      ([int](#language.types.integer))

     119
      




      **[XSD_NORMALIZEDSTRING](#constant.xsd-normalizedstring)**
      ([int](#language.types.integer))

     120
      




      **[XSD_TOKEN](#constant.xsd-token)**
      ([int](#language.types.integer))

     121
      




      **[XSD_LANGUAGE](#constant.xsd-language)**
      ([int](#language.types.integer))

     122
      




      **[XSD_NMTOKEN](#constant.xsd-nmtoken)**
      ([int](#language.types.integer))

     123
      




      **[XSD_NAME](#constant.xsd-name)**
      ([int](#language.types.integer))

     124
      




      **[XSD_NCNAME](#constant.xsd-ncname)**
      ([int](#language.types.integer))

     125
      




      **[XSD_ID](#constant.xsd-id)**
      ([int](#language.types.integer))

     126
      




      **[XSD_IDREF](#constant.xsd-idref)**
      ([int](#language.types.integer))

     127
      




      **[XSD_IDREFS](#constant.xsd-idrefs)**
      ([int](#language.types.integer))

     128
      




      **[XSD_ENTITY](#constant.xsd-entity)**
      ([int](#language.types.integer))

     129
      




      **[XSD_ENTITIES](#constant.xsd-entities)**
      ([int](#language.types.integer))

     130
      




      **[XSD_INTEGER](#constant.xsd-integer)**
      ([int](#language.types.integer))

     131
      




      **[XSD_NONPOSITIVEINTEGER](#constant.xsd-nonpositiveinteger)**
      ([int](#language.types.integer))

     132
      




      **[XSD_NEGATIVEINTEGER](#constant.xsd-negativeinteger)**
      ([int](#language.types.integer))

     133
      




      **[XSD_LONG](#constant.xsd-long)**
      ([int](#language.types.integer))

     134
      




      **[XSD_INT](#constant.xsd-int)**
      ([int](#language.types.integer))

     135
      




      **[XSD_SHORT](#constant.xsd-short)**
      ([int](#language.types.integer))

     136
      




      **[XSD_BYTE](#constant.xsd-byte)**
      ([int](#language.types.integer))

     137
      




      **[XSD_NONNEGATIVEINTEGER](#constant.xsd-nonnegativeinteger)**
      ([int](#language.types.integer))

     138
      




      **[XSD_UNSIGNEDLONG](#constant.xsd-unsignedlong)**
      ([int](#language.types.integer))

     139
      




      **[XSD_UNSIGNEDINT](#constant.xsd-unsignedint)**
      ([int](#language.types.integer))

     140
      




      **[XSD_UNSIGNEDSHORT](#constant.xsd-unsignedshort)**
      ([int](#language.types.integer))

     141
      




      **[XSD_UNSIGNEDBYTE](#constant.xsd-unsignedbyte)**
      ([int](#language.types.integer))

     142
      




      **[XSD_POSITIVEINTEGER](#constant.xsd-positiveinteger)**
      ([int](#language.types.integer))

     143
      




      **[XSD_NMTOKENS](#constant.xsd-nmtokens)**
      ([int](#language.types.integer))

     144
      




      **[XSD_ANYTYPE](#constant.xsd-anytype)**
      ([int](#language.types.integer))

     145
      




      **[XSD_ANYXML](#constant.xsd-anyxml)**
      ([int](#language.types.integer))

     147
      




      **[APACHE_MAP](#constant.apache-map)**
      ([int](#language.types.integer))

     200
      




      **[SOAP_ENC_OBJECT](#constant.soap-enc-object)**
      ([int](#language.types.integer))

     301
      




      **[SOAP_ENC_ARRAY](#constant.soap-enc-array)**
      ([int](#language.types.integer))

     300
      




      **[XSD_1999_TIMEINSTANT](#constant.xsd-1999-timeinstant)**
      ([int](#language.types.integer))

     401
      




      **[XSD_NAMESPACE](#constant.xsd-namespace)**
      ([string](#language.types.string))

     http://www.w3.org/2001/XMLSchema
      




      **[XSD_1999_NAMESPACE](#constant.xsd-1999-namespace)**
      ([string](#language.types.string))

     http://www.w3.org/1999/XMLSchema
      




      **[SOAP_SINGLE_ELEMENT_ARRAYS](#constant.soap-single-element-arrays)**
      ([int](#language.types.integer))

     1

      Utilizada con la
      [
       opción features
      ](#soapclient.construct.options.features)
      en el método [SoapClient::__construct()](#soapclient.construct).





      **[SOAP_WAIT_ONE_WAY_CALLS](#constant.soap-wait-one-way-calls)**
      ([int](#language.types.integer))

     2

      Utilizada con la
      [
       opción features
      ](#soapclient.construct.options.features)
      en el método [SoapClient::__construct()](#soapclient.construct).





      **[SOAP_USE_XSI_ARRAY_TYPE](#constant.soap-use-xsi-array-type)**
      ([int](#language.types.integer))

     4

      Utilizada con la
      [
       opción features
      ](#soapclient.construct.options.features)
      en el método [SoapClient::__construct()](#soapclient.construct).





      **[WSDL_CACHE_NONE](#constant.wsdl-cache-none)**
      ([int](#language.types.integer))

     0

      Desactiva el caché WSDL cuando se utiliza en la opción de configuración
      [soap.wsdl_cache](#ini.soap.wsdl-cache) o en la opción
      wsdl_cache de [SoapClient::__construct()](#soapclient.construct)
      y [SoapServer::__construct()](#soapserver.construct).





      **[WSDL_CACHE_DISK](#constant.wsdl-cache-disk)**
      ([int](#language.types.integer))

     1

      Indica el uso del caché WSDL en memoria únicamente cuando se utiliza en la opción de configuración
      [soap.wsdl_cache](#ini.soap.wsdl-cache) o la opción wsdl_cache de
      [SoapClient::__construct()](#soapclient.construct) y [SoapServer::__construct()](#soapserver.construct).





      **[WSDL_CACHE_MEMORY](#constant.wsdl-cache-memory)**
      ([int](#language.types.integer))

     2

      Especifica el uso del caché WSDL en memoria RAM únicamente cuando se utiliza en la opción de configuración
      [soap.wsdl_cache](#ini.soap.wsdl-cache) o la opción wsdl_cache de
      [SoapClient::__construct()](#soapclient.construct) y [SoapServer::__construct()](#soapserver.construct).





      **[WSDL_CACHE_BOTH](#constant.wsdl-cache-both)**
      ([int](#language.types.integer))

     3

      Especifica el uso de los cachés WSDL en memoria y en disco cuando se utiliza en la opción de configuración
      [soap.wsdl_cache](#ini.soap.wsdl-cache) o la opción wsdl_cache de
      [SoapClient::__construct()](#soapclient.construct) y [SoapServer::__construct()](#soapserver.construct).


# Funciones de SOAP

# is_soap_fault

(PHP 5, PHP 7, PHP 8)

is_soap_fault — Verifica si SOAP devuelve un error

### Descripción

**is_soap_fault**([mixed](#language.types.mixed) $objeto): [bool](#language.types.boolean)

**is_soap_fault()** sirve para verificar si la API
SOAP ha fallado, sin utilizar excepciones. Para usarla,
se debe crear un objeto [SoapClient](#class.soapclient) con la opción
exceptions configurada a cero o a **[false](#constant.false)**. En este caso,
el método SOAP devolverá un objeto especial [SoapFault](#class.soapfault),
que encapsula los detalles del error (código de error,
mensaje, actor y detalles).

Si exceptions no está configurada,
SOAP emitirá una excepción.
**is_soap_fault()** verifica si el
argumento proporcionado es un objeto [SoapFault](#class.soapfault).

### Parámetros

     objeto


       El objeto a probar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con is_soap_fault()**

&lt;?php
$client = new SoapClient("some.wsdl", array('exceptions' =&gt; 0));
$result = $client-&gt;SomeFunction();
if (is_soap_fault($result)) {
trigger_error("SOAP Fault: (faultcode: {$result-&gt;faultcode}, faultstring: {$result-&gt;faultstring})", E_USER_ERROR);
}
?&gt;

    **Ejemplo #2 Manejo de errores por excepción con SOAP**

&lt;?php
try {
$client = new SoapClient("some.wsdl");
    $result = $client-&gt;SomeFunction(/* ... */);
} catch (SoapFault $fault) {
    trigger_error("SOAP Fault: (faultcode: {$fault-&gt;faultcode}, faultstring: {$fault-&gt;faultstring})", E_USER_ERROR);
}
?&gt;

### Ver también

    - [SoapClient::__construct()](#soapclient.construct) - Constructor SoapClient

    - [SoapFault::__construct()](#soapfault.construct) - Constructor de SoapFault

# use_soap_error_handler

(PHP 5, PHP 7, PHP 8)

use_soap_error_handler —
Activa el gestor de errores SOAP nativo

### Descripción

**use_soap_error_handler**([bool](#language.types.boolean) $enable = **[true](#constant.true)**): [bool](#language.types.boolean)

**use_soap_error_handler()** activa o desactiva el gestor
de errores SOAP nativo del servidor SOAP. Retorna el valor previamente
utilizado. Si el argumento handler es establecido
a **[true](#constant.true)**, los detalles de los errores del servidor [SoapServer](#class.soapserver)
serán enviados al cliente, como mensaje de error SOAP.
Si es **[false](#constant.false)**, se utilizará el gestor de errores estándar de PHP.
El comportamiento por omisión es enviar el error al cliente en forma
de mensaje SOAP.

### Parámetros

     enable


       Con el valor **[true](#constant.true)**, los detalles de los errores serán enviados
       a los clientes.





### Valores devueltos

Retorna el valor original.

### Ver también

    - [set_error_handler()](#function.set-error-handler) - Especifica una función de usuario como gestor de errores

    - [set_exception_handler()](#function.set-exception-handler) - Define una función de usuario para gestionar excepciones

## Tabla de contenidos

- [is_soap_fault](#function.is-soap-fault) — Verifica si SOAP devuelve un error
- [use_soap_error_handler](#function.use-soap-error-handler) — Activa el gestor de errores SOAP nativo

# La classe [SoapClient](#class.soapclient)

(PHP 5, PHP 7, PHP 8)

## Introducción

    La classe **SoapClient** proporciona un cliente para los
    servidores [» SOAP 1.1](http://www.w3.org/TR/soap11/) y
    [» SOAP 1.2](http://www.w3.org/TR/soap12/).
    Puede ser utilizado con o sin modo WSDL.

## Sinopsis de la Clase

     class **SoapClient**
     {

    /* Propiedades */

     private
     ?[string](#language.types.string)
      [$uri](#soapclient.props.uri) = null;

    private
     ?[int](#language.types.integer)
      [$style](#soapclient.props.style) = null;

    private
     ?[int](#language.types.integer)
      [$use](#soapclient.props.use) = null;

    private
     ?[string](#language.types.string)
      [$location](#soapclient.props.location) = null;

    private
     [bool](#language.types.boolean)
      [$trace](#soapclient.props.trace) = false;

    private
     ?[int](#language.types.integer)
      [$compression](#soapclient.props.compression) = null;

    private
     ?[resource](#language.types.resource)
      [$sdl](#soapclient.props.sdl) = null;

    private
     ?[resource](#language.types.resource)
      [$typemap](#soapclient.props.typemap) = null;

    private
     ?[resource](#language.types.resource)
      [$httpsocket](#soapclient.props.httpsocket) = null;

    private
     ?[resource](#language.types.resource)
      [$httpurl](#soapclient.props.httpurl) = null;

    private
     ?[string](#language.types.string)
      [$_login](#soapclient.props.login) = null;

    private
     ?[string](#language.types.string)
      [$_password](#soapclient.props.password) = null;

    private
     [bool](#language.types.boolean)
      [$_use_digest](#soapclient.props.use-digest) = false;

    private
     ?[string](#language.types.string)
      [$_digest](#soapclient.props.digest) = null;

    private
     ?[string](#language.types.string)
      [$_proxy_host](#soapclient.props.proxy-host) = null;

    private
     ?[int](#language.types.integer)
      [$_proxy_port](#soapclient.props.proxy-port) = null;

    private
     ?[string](#language.types.string)
      [$_proxy_login](#soapclient.props.proxy-login) = null;

    private
     ?[string](#language.types.string)
      [$_proxy_password](#soapclient.props.proxy-password) = null;

    private
     [bool](#language.types.boolean)
      [$_exceptions](#soapclient.props.exceptions) = true;

    private
     ?[string](#language.types.string)
      [$_encoding](#soapclient.props.encoding) = null;

    private
     ?[array](#language.types.array)
      [$_classmap](#soapclient.props.classmap) = null;

    private
     ?[int](#language.types.integer)
      [$_features](#soapclient.props.features) = null;

    private
     [int](#language.types.integer)
      [$_connection_timeout](#soapclient.props.connection-timeout);

    private
     ?[resource](#language.types.resource)
      [$_stream_context](#soapclient.props.stream-context) = null;

    private
     ?[string](#language.types.string)
      [$_user_agent](#soapclient.props.user-agent) = null;

    private
     [bool](#language.types.boolean)
      [$_keep_alive](#soapclient.props.keep-alive) = true;

    private
     ?[int](#language.types.integer)
      [$_ssl_method](#soapclient.props.ssl-method) = null;

    private
     [int](#language.types.integer)
      [$_soap_version](#soapclient.props.soap-version);

    private
     ?[int](#language.types.integer)
      [$_use_proxy](#soapclient.props.use-proxy) = null;

    private
     [array](#language.types.array)
      [$_cookies](#soapclient.props.cookies) = [];

    private
     ?[array](#language.types.array)
      [$__default_headers](#soapclient.props.default-headers) = null;

    private
     ?[SoapFault](#class.soapfault)
      [$__soap_fault](#soapclient.props.soap-fault) = null;

    private
     ?[string](#language.types.string)
      [$__last_request](#soapclient.props.last-request) = null;

    private
     ?[string](#language.types.string)
      [$__last_response](#soapclient.props.last-response) = null;

    private
     ?[string](#language.types.string)
      [$__last_request_headers](#soapclient.props.last-request-headers) = null;

    private
     ?[string](#language.types.string)
      [$__last_response_headers](#soapclient.props.last-response-headers) = null;


    /* Métodos */

public [\_\_construct](#soapclient.construct)([?](#language.types.null)[string](#language.types.string) $wsdl, [array](#language.types.array) $options = [])

    public [__call](#soapclient.call)([string](#language.types.string) $name, [array](#language.types.array) $args): [mixed](#language.types.mixed)

public [\_\_doRequest](#soapclient.dorequest)(
    [string](#language.types.string) $request,
    [string](#language.types.string) $location,
    [string](#language.types.string) $action,
    [int](#language.types.integer) $version,
    [bool](#language.types.boolean) $oneWay = **[false](#constant.false)**
): [?](#language.types.null)[string](#language.types.string)
public [__getCookies](#soapclient.getcookies)(): [array](#language.types.array)
public [__getFunctions](#soapclient.getfunctions)(): [?](#language.types.null)[array](#language.types.array)
public [__getLastRequest](#soapclient.getlastrequest)(): [?](#language.types.null)[string](#language.types.string)
public [__getLastRequestHeaders](#soapclient.getlastrequestheaders)(): [?](#language.types.null)[string](#language.types.string)
public [__getLastResponse](#soapclient.getlastresponse)(): [?](#language.types.null)[string](#language.types.string)
public [__getLastResponseHeaders](#soapclient.getlastresponseheaders)(): [?](#language.types.null)[string](#language.types.string)
public [__getTypes](#soapclient.gettypes)(): [?](#language.types.null)[array](#language.types.array)
public [__setCookie](#soapclient.setcookie)([string](#language.types.string) $name, [?](#language.types.null)[string](#language.types.string) $value = **[null](#constant.null)**): [void](language.types.void.html)
public [__setLocation](#soapclient.setlocation)([?](#language.types.null)[string](#language.types.string) $location = **[null](#constant.null)**): [?](#language.types.null)[string](#language.types.string)
public [__setSoapHeaders](#soapclient.setsoapheaders)([SoapHeader](#class.soapheader)|[array](#language.types.array)|[null](#language.types.null) $headers = **[null](#constant.null)**): [bool](#language.types.boolean)
public [__soapCall](#soapclient.soapcall)(
    [string](#language.types.string) $name,
    [array](#language.types.array) $args,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**,
    [SoapHeader](#class.soapheader)|[array](#language.types.array)|[null](#language.types.null) $inputHeaders = **[null](#constant.null)**,
    [array](#language.types.array) &amp;$outputHeaders = **[null](#constant.null)**
): [mixed](#language.types.mixed)

}

## Propiedades

     __default_headers








     __last_request








     __last_request_headers








     __last_response








     __last_response_headers








     __soap_fault








     _classmap








     _connection_timeout








     _cookies








     _digest








     _encoding








     _exceptions








     _features








     _keep_alive








     _login








     _password








     _proxy_host








     _proxy_login








     _proxy_password








     _proxy_port








     _soap_version








     _ssl_method








     _stream_context








     _use_digest








     _use_proxy








     _user_agent








     compression








     httpsocket








     httpurl








     location








     sdl








     style








     trace








     typemap








     uri








     use







# SoapClient::\_\_call

(PHP 5, PHP 7, PHP 8)

SoapClient::\_\_call — Llamada a una función SOAP (obsoleta)

### Descripción

public **SoapClient::\_\_call**([string](#language.types.string) $name, [array](#language.types.array) $args): [mixed](#language.types.mixed)

La llamada directa a este método es obsoleta. Normalmente, las
funciones SOAP pueden ser llamadas como métodos del objeto
[SoapClient](#class.soapclient); en los casos donde esto no es
posible, o bien es necesario pasar más opciones, utilícese
el método [SoapClient::\_\_soapCall()](#soapclient.soapcall).

### Parámetros

     name


       El nombre de la función SOAP a llamar.






     args


       Un array de argumentos a pasar a la función.
       Esto puede ser un array ordenado o un array asociativo.
       Tenga en cuenta que la mayoría de servidores SOAP exigen que los nombres de los parámetros sean proporcionados, en cuyo caso debe ser un array asociativo.





### Valores devueltos

Las funciones SOAP pueden devolver uno o varios valores. Si solo un valor es devuelto por la función SOAP, el valor de retorno será un escalar.
Si varios valores son devueltos, se devuelve un array asociativo de parámetros de salida nombrados en su lugar.

En caso de error, si el objeto [SoapClient](#class.soapclient) ha sido construido con la opción exceptions definida como **[false](#constant.false)**, se devolverá un objeto [SoapFault](#class.soapfault).

# SoapClient::\_\_construct

(PHP 5, PHP 7, PHP 8)

SoapClient::\_\_construct — Constructor SoapClient

### Descripción

public **SoapClient::\_\_construct**([?](#language.types.null)[string](#language.types.string) $wsdl, [array](#language.types.array) $options = [])

Crea un objeto [SoapClient](#class.soapclient) para conectarse a un servicio SOAP.

### Parámetros

     wsdl


       URI del archivo WSDL que describe el servicio, el cual se usa para
       configurar automáticamente el cliente. Si no se proporciona, el cliente operará en modo
       no-WSDL.



      **Nota**:



        Por omisión, el archivo WSDL será almacenado en caché por razones de rendimiento. Para desactivar
        o configurar este almacenamiento en caché, consulte la sección
        [SOAP Opciones de configuración](#soap.configuration.list)
        y la opción [
        cache_wsdl](#soapclient.construct.options.cache-wsdl)







     options


       Un array asociativo que especifica opciones adicionales para el cliente SOAP.
       Si el parámetro wsdl se proporciona, esto es opcional; de lo contrario,
       al menos los parámetros location y url deben ser
       proporcionados.





          location
          [string](#language.types.string)



           La URL del servidor SOAP al que enviar la petición.




           Requerido si el parámetro wsdl no se proporciona.
           Si tanto un parámetro wsdl como
           la opción location se proporcionan, la opción
           location reemplazará cualquier ubicación especificada en el archivo WSDL.







          uri
          [string](#language.types.string)



           El espacio de nombres objetivo del servicio SOAP.




           Requerido si el parámetro wsdl no se proporciona;
           de lo contrario, se ignora.







          style
          [int](#language.types.integer)



           Especifica el estilo de enlace a utilizar para este cliente, utilizando las constantes
           **[SOAP_RPC](#constant.soap-rpc)** y **[SOAP_DOCUMENT](#constant.soap-document)**.
           **[SOAP_RPC](#constant.soap-rpc)** indica un enlace de estilo RPC, donde el
           cuerpo de la petición SOAP contiene un codificado estándar de una llamada de función.
           **[SOAP_DOCUMENT](#constant.soap-document)** indica un enlace de estilo documento,
           donde el cuerpo de la petición SOAP contiene un documento XML con
           un significado definido por el servicio.




           Si el parámetro wsdl se proporciona, esta
           opción se ignora y el estilo se lee desde el archivo WSDL.




           Si ni esta opción ni el parámetro wsdl
           se proporcionan, se utiliza el estilo RPC.







          use
          [int](#language.types.integer)



           Especifica el estilo de codificación a utilizar para este cliente, utilizando las
           constantes **[SOAP_ENCODED](#constant.soap-encoded)** o **[SOAP_LITERAL](#constant.soap-literal)**.
           **[SOAP_ENCODED](#constant.soap-encoded)** indica una codificación utilizando los tipos
           definidos en la especificación SOAP.
           **[SOAP_LITERAL](#constant.soap-literal)** indica una codificación utilizando un esquema
           definido.




           Si el parámetro wsdl se proporciona, esta
           opción se ignora y la codificación se lee desde el archivo WSDL.




           Si esta opción y el parámetro wsdl no se proporcionan,
           se utiliza el estilo "encoded".







          soap_version
          [int](#language.types.integer)



           Especifica la versión del protocolo SOAP a utilizar:
           **[SOAP_1_1](#constant.soap-1-1)** para SOAP 1.1,
           o **[SOAP_1_2](#constant.soap-1-2)** para SOAP 1.2.




           Si se omite, se utiliza SOAP 1.1.







          authentication
          [int](#language.types.integer)



           Especifica el método de autenticación al utilizar la autenticación
           HTTP en las peticiones. El valor puede ser
           **[SOAP_AUTHENTICATION_BASIC](#constant.soap-authentication-basic)**
           o **[SOAP_AUTHENTICATION_DIGEST](#constant.soap-authentication-digest)**.




           Si se omite y la opción login se proporciona,
           se utiliza la autenticación HTTP Basic.







          login
          [string](#language.types.string)



           Nombre de usuario a utilizar con la autenticación HTTP Basic o HTTP Digest.







          password
          [string](#language.types.string)



           Contraseña a utilizar con la autenticación HTTP Basic o HTTP Digest.




           No confundir con passphrase,
           que se utiliza con la autenticación por certificado cliente HTTPS.







          local_cert
          [string](#language.types.string)



           Ruta hacia un certificado cliente a utilizar con la autenticación HTTPS.
           Debe ser un archivo codificado en PEM que contenga el certificado
           y su clave privada.




           El archivo también puede incluir una cadena de emisores, que debe venir
           después del certificado cliente.




           También puede ser definido a través de
           [
            stream_context](#soapclient.construct.options.stream-context),
           que también permite especificar un archivo de clave privada distinto.







          passphrase
          [string](#language.types.string)



           Passphrase para el certificado cliente especificado en la opción
           local_cert.




           No confundir con password,
           que se utiliza con la autenticación HTTP Basic o HTTP Digest.




           También puede ser definido a través de
           [
            stream_context](#soapclient.construct.options.stream-context).







          proxy_host
          [string](#language.types.string)



           Nombre de host a utilizar como servidor proxy para las peticiones HTTP.




           La opción proxy_port también debe ser especificada.







          proxy_port
          [int](#language.types.integer)



           Puerto TCP a utilizar al conectarse al servidor proxy
           especificado en proxy_host.







          proxy_login
          [string](#language.types.string)



           Nombre de usuario opcional para autenticarse con el servidor proxy
           especificado en proxy_host, utilizando la autenticación
           HTTP Basic.







          proxy_password
          [string](#language.types.string)



           Contraseña opcional para autenticarse con el servidor proxy
           especificado en proxy_host, utilizando la autenticación
           HTTP Basic.







          compression
          [int](#language.types.integer)



           Activa la compresión de las peticiones y respuestas SOAP HTTP.




           El valor debe ser el resultado de la operación OR a nivel de bits de tres partes:
           un **[SOAP_COMPRESSION_ACCEPT](#constant.soap-compression-accept)** opcional,
           para enviar el encabezado "Accept-Encoding"; ya sea
           **[SOAP_COMPRESSION_GZIP](#constant.soap-compression-gzip)**
           o **[SOAP_COMPRESSION_DEFLATE](#constant.soap-compression-deflate)** para indicar
           el algoritmo de compresión a utilizar; y un número entre 1 y 9
           para indicar el nivel de compresión a utilizar en la petición.
           Por ejemplo, para activar la compresión gzip bidireccional con el nivel
           de compresión máximo, utilice
           SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | 9.







          encoding
          [string](#language.types.string)



           Define el codificado de caracteres interno. Las peticiones siempre se envían
           en UTF-8 y se convierten desde y hacia este codificado.







          trace
          [bool](#language.types.boolean)



           Captura la información de petición y respuesta, que luego puede ser
           consultada utilizando los métodos
           [SoapClient::__getLastRequest()](#soapclient.getlastrequest),
           [SoapClient::__getLastRequestHeaders()](#soapclient.getlastrequestheaders),
           [SoapClient::__getLastResponse()](#soapclient.getlastresponse),
           y [SoapClient::__getLastResponseHeaders()](#soapclient.getlastresponseheaders).




           Si se omite, el valor por omisión es **[false](#constant.false)**







          classmap
          [array](#language.types.array)



           Utilizado para asociar los tipos definidos en el WSDL con las clases PHP.
           Debe ser especificado en forma de un [array](#language.types.array) asociativo con
           los nombres de tipos del WSDL como claves y los nombres de clases PHP como valores.
           Tenga en cuenta que el nombre de tipo de un elemento no necesariamente corresponden al nombre
           del elemento (etiqueta).




           Los nombres de clase proporcionados siempre deben estar completamente calificados con
           todos los [espacios de nombres](#language.namespaces), y nunca
           comenzar con un \. La forma correcta puede ser
           generada utilizando
           [::class](#language.oop5.basic.class.class).




           Tenga en cuenta que al crear una clase, el constructor no será llamado,
           pero los métodos mágicos [__set()](#object.set) y
           [__get()](#object.get) para las propiedades individuales sí lo serán.







          typemap
          [array](#language.types.array)



           Utilizado para definir correspondencias de tipos utilizando funciones de devolución de llamada
           definidas por el usuario.
           Cada correspondencia de tipo debe ser un array con las claves
           type_name (un [string](#language.types.string) que especifica el
           tipo de elemento XML),
           type_ns (un [string](#language.types.string) que contiene
           la URI del espacio de nombres),
           from_xml (un [callable](#language.types.callable) que acepta un parámetro
           de tipo string y devuelve un objeto) y
           to_xml (un [callable](#language.types.callable) que acepta un parámetro
           de tipo objeto y devuelve un string).







          exceptions
          [bool](#language.types.boolean)



           Define si los errores generan excepciones de tipo
           [SoapFault](#class.soapfault).




           Por omisión, es **[true](#constant.true)**







          connection_timeout
          [int](#language.types.integer)



           Define un tiempo límite en segundos para la conexión al servicio SOAP.
           Esta opción no define un tiempo límite para los servicios con respuesta lenta.
           Para limitar el tiempo de espera de las llamadas, la opción de configuración
           [default_socket_timeout](#ini.default-socket-timeout)
           está disponible.







          cache_wsdl
          [int](#language.types.integer)



           Si el parámetro wsdl se especifica y la opción de
           configuración
           [soap.wsdl_cache_enabled](#ini.soap.wsdl-cache-enabled)
           está activada, esta opción determina el tipo de almacenamiento en caché.
           Una de las constantes **[WSDL_CACHE_NONE](#constant.wsdl-cache-none)**,
           **[WSDL_CACHE_DISK](#constant.wsdl-cache-disk)**,
           **[WSDL_CACHE_MEMORY](#constant.wsdl-cache-memory)** o
           **[WSDL_CACHE_BOTH](#constant.wsdl-cache-both)**.




           Dos tipos de caché están disponibles: la caché en memoria, que almacena en caché el WSDL
           en la memoria del proceso actual, y la caché en disco, que almacena en caché el WSDL
           en un archivo en el disco compartido entre todos los procesos.
           El directorio a utilizar para la caché en disco es determinado por la opción de configuración
           [soap.wsdl_cache_dir](#ini.soap.wsdl-cache-dir).
           Las dos cachés tienen la misma vida útil, determinada por la opción de configuración
           [soap.wsdl_cache_ttl](#ini.soap.wsdl-cache-ttl).
           La caché en memoria también tiene un número máximo de entradas determinado por la opción de configuración
           [soap.wsdl_cache_limit](#ini.soap.wsdl-cache-limit).




           Si no se especifica, la opción de configuración [
           soap.wsdl_cache](#ini.soap.wsdl-cache) será utilizada.







          user_agent
          [string](#language.types.string)



           El valor a utilizar en el encabezado HTTP User-Agent
           durante las peticiones.




           También puede ser definido a través de [
           stream_context](#soapclient.construct.options.stream-context).




           Si no se especifica, el agente de usuario será "PHP-SOAP/"
           seguido del valor de **[PHP_VERSION](#constant.php-version)**.







          stream_context
          [resource](#language.types.resource)



           Un [contexto de flujo](#context) creado por
           [stream_context_create()](#function.stream-context-create), que permite definir opciones adicionales.




           El contexto puede incluir opciones de contexto [socket](#context.socket),
           opciones de contexto [SSL](#context.ssl),
           así como algunas opciones de contexto [HTTP](#context.http) seleccionadas:
           content_type, header,
           max_redirects, protocol_version,
           y user_agent.




           Tenga en cuenta que los siguientes encabezados HTTP son generados automáticamente o a partir de otras
           opciones, y serán ignorados si se especifican en la opción de contexto 'header':
           host, connection,
           user-agent, content-length,
           content-type, cookie,
           authorization y proxy-authorization.







          features
          [int](#language.types.integer)



           Una máscara de bits para activar una o más de las siguientes funcionalidades:





              **[SOAP_SINGLE_ELEMENT_ARRAYS](#constant.soap-single-element-arrays)**



               Al decodificar una respuesta en array, el comportamiento por omisión consiste en detectar si
               un nombre de elemento aparece una sola vez o múltiples veces en un elemento padre particular.
               Para los elementos que aparecen una sola vez, una propiedad de objeto permite un acceso directo al
               contenido; para los elementos que aparecen más de una vez, la propiedad contiene un
               array con el contenido de cada elemento correspondiente.




               Si la funcionalidad **[SOAP_SINGLE_ELEMENT_ARRAYS](#constant.soap-single-element-arrays)** está activada,
               los elementos que aparecen una sola vez se colocan en un array de un solo elemento, de modo que
               el acceso sea coherente para todos los elementos. Esto solo tiene efecto al utilizar un WSDL
               que contenga un esquema para la respuesta. Consulte la sección de ejemplos para una ilustración.







              **[SOAP_USE_XSI_ARRAY_TYPE](#constant.soap-use-xsi-array-type)**



               Cuando la opción [use
               opción](#soapclient.construct.options.use) o la propiedad WSDL está definida en encoded,
               fuerza a los arrays a utilizar un tipo SOAP-ENC:Array, en lugar de un
               tipo específico del esquema.







              **[SOAP_WAIT_ONE_WAY_CALLS](#constant.soap-wait-one-way-calls)**



               Esperar una respuesta incluso si el WSDL indica una petición de un solo sentido.











          keep_alive
          [bool](#language.types.boolean)



           un valor booleano que define si
           enviar el encabezado Connection: Keep-Alive o
           Connection: close.




           Por omisión, es **[true](#constant.true)**







          ssl_method
          [string](#language.types.string)



           Especifica la versión del protocolo SSL o TLS a utilizar con las conexiones HTTP seguras, en lugar de la negociación por omisión.
           Especificar **[SOAP_SSL_METHOD_SSLv2](#constant.soap-ssl-method-sslv2)** o **[SOAP_SSL_METHOD_SSLv3](#constant.soap-ssl-method-sslv3)** forzará el uso de SSL 2 o SSL 3, respectivamente.
           Especificar **[SOAP_SSL_METHOD_SSLv23](#constant.soap-ssl-method-sslv23)** no tiene ningún efecto;
           esta constante solo existe por razones de compatibilidad ascendente.
           A partir de PHP 7.2.0, especificar **[SOAP_SSL_METHOD_TLS](#constant.soap-ssl-method-tls)**
           tampoco tiene ningún efecto; en versiones anteriores, esto forzaba el uso de TLS 1.0.




           Es de notar que las versiones SSL 2 y 3 se consideran no seguras y pueden no ser soportadas por la biblioteca OpenSSL instalada.




           Esta opción es **obsoleta** a partir de PHP 8.1.0.
           Una alternativa más flexible, que permite especificar versiones individuales de TLS, consiste en utilizar la opción [contexto_de_flux](#soapclient.construct.options.stream-context) con el parámetro de contexto 'crypto_method'.





&lt;?php
// Especificar el uso de TLS 1.3 solamente
$context = stream_context_create([
    'ssl' =&gt; [
        'crypto_method' =&gt; STREAM_CRYPTO_METHOD_TLSv1_3_CLIENT
     ]
]);
$client = new SoapClient("some.wsdl", ['context' =&gt; $context]);

### Errores/Excepciones

**SoapClient::\_\_construct()** generará un error de tipo
**[E_ERROR](#constant.e-error)** si las opciones location y
uri no se proporcionan en modo non-WSDL.

Una excepción de tipo [SoapFault](#class.soapfault) será lanzada si el URI
wsdl no puede ser cargado.

### Ejemplos

    **Ejemplo #1
     Ejemplo SoapClient::__construct()**

&lt;?php

$client = new SoapClient("some.wsdl");

$client = new SoapClient("some.wsdl", array('soap_version' =&gt; SOAP_1_2));

$client = new SoapClient("some.wsdl", array('login' =&gt; "some_name",
'password' =&gt; "some_password"));

$client = new SoapClient("some.wsdl", array('proxy_host' =&gt; "localhost",
'proxy_port' =&gt; 8080));

$client = new SoapClient("some.wsdl", array('proxy_host' =&gt; "localhost",
'proxy_port' =&gt; 8080,
'proxy_login' =&gt; "some_name",
'proxy_password' =&gt; "some_password"));

$client = new SoapClient("some.wsdl", array('local_cert' =&gt; "cert_key.pem"));

$client = new SoapClient(null, array('location' =&gt; "http://localhost/soap.php",
'uri' =&gt; "http://test-uri/"));

$client = new SoapClient(null, array('location' =&gt; "http://localhost/soap.php",
'uri' =&gt; "http://test-uri/",
'style' =&gt; SOAP_DOCUMENT,
'use' =&gt; SOAP_LITERAL));

$client = new SoapClient("some.wsdl",
array('compression' =&gt; SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | 9));

$client = new SoapClient("some.wsdl", array('encoding'=&gt;'ISO-8859-1'));

class MyBook {
public $title;
public $author;
}

$client = new SoapClient("books.wsdl", array('classmap' =&gt; array('book' =&gt; "MyBook")));

$typemap = array(
    array("type_ns"  =&gt; "http://schemas.example.com",
         "type_name" =&gt; "book",
         "from_xml"  =&gt; "unserialize_book",
         "to_xml"    =&gt; "serialize_book")
);
$client = new SoapClient("books.wsdl", array('typemap' =&gt; $typemap));

?&gt;

    **Ejemplo #2 Utilizando la funcionalidad [SOAP_SINGLE_ELEMENT_ARRAYS](#constant.soap-single-element-arrays)**

&lt;?php
/_ Suponiendo una respuesta como esta, y un WSDL apropiado:
&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns="urn:example"&gt;
&lt;SOAP-ENV:Body&gt;
&lt;response&gt;
&lt;collection&gt;
&lt;item&gt;Single&lt;/item&gt;
&lt;/collection&gt;
&lt;collection&gt;
&lt;item&gt;First&lt;/item&gt;
&lt;item&gt;Second&lt;/item&gt;
&lt;/collection&gt;
&lt;/response&gt;
&lt;/SOAP-ENV:Body&gt;
&lt;/SOAP-ENV:Envelope&gt;
_/

echo "Default:\n";

$client = new TestSoapClient(__DIR__ . '/temp.wsdl');
$response = $client-&gt;exampleRequest();
var_dump( $response-&gt;collection[0]-&gt;item );
var_dump( $response-&gt;collection[1]-&gt;item );

echo "\nWith SOAP_SINGLE_ELEMENT_ARRAYS:\n";

$client = new TestSoapClient(__DIR__ . '/temp.wsdl', ['features' =&gt; SOAP_SINGLE_ELEMENT_ARRAYS]);
$response = $client-&gt;exampleRequest();
var_dump( $response-&gt;collection[0]-&gt;item );
var_dump( $response-&gt;collection[1]-&gt;item );

    El ejemplo anterior mostrará:

Default:
string(6) "Single"
array(2) {
[0] =&gt;
string(5) "First"
[1] =&gt;
string(6) "Second"
}

With SOAP_SINGLE_ELEMENT_ARRAYS:
array(1) {
[0] =&gt;
string(6) "Single"
}
array(2) {
[0] =&gt;
string(5) "First"
[1] =&gt;
string(6) "Second"
}

# SoapClient::\_\_doRequest

(PHP 5, PHP 7, PHP 8)

SoapClient::\_\_doRequest — Ejecuta una solicitud SOAP

### Descripción

public **SoapClient::\_\_doRequest**(
    [string](#language.types.string) $request,
    [string](#language.types.string) $location,
    [string](#language.types.string) $action,
    [int](#language.types.integer) $version,
    [bool](#language.types.boolean) $oneWay = **[false](#constant.false)**
): [?](#language.types.null)[string](#language.types.string)

Ejecuta una solicitud SOAP.

Este método puede ser sobrescrito en las subclases para implementar
diferentes transportes, realizar operaciones XML adicionales
o cualquier otra cosa.

### Parámetros

     request


       La solicitud SOAP en XML.






     location


       La URL de la solicitud.






     action


       La acción SOAP.






     version


       La versión SOAP.






     oneWay


       Si oneWay toma el valor de **[true](#constant.true)**,
       este método no devuelve nada. Utilice este valor
       cuando no se espera una respuesta.





### Valores devueltos

La respuesta SOAP en XML.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       El tipo de oneWay es [bool](#language.types.boolean) ahora; anteriormente era [int](#language.types.integer).



### Ejemplos

    **Ejemplo #1 Ejemplo con SoapClient::__doRequest()**

&lt;?php

function Add($x, $y)
{
return $x + $y;
}

class LocalSoapClient extends SoapClient
{
private $server;

     public function __construct($wsdl, $options)
     {
         parent::__construct($wsdl, $options);
         $this-&gt;server = new SoapServer($wsdl, $options);
         $this-&gt;server-&gt;addFunction('Add');
     }

     public function __doRequest(
        $request,
        $location,
        $action,
        $version,
        $one_way = false,
     ): ?string {
     {
         ob_start();
         $this-&gt;server-&gt;handle($request);
         $response = ob_get_contents();
         ob_end_clean();

         return $response;
     }

}

$x = new LocalSoapClient(
null,
[
'location' =&gt; 'test://',
'uri' =&gt; 'http://testuri.org',
]
);

var_dump($x-&gt;Add(3, 4));

?&gt;

# SoapClient::\_\_getCookies

(PHP 5 &gt;= 5.4.30, PHP 7, PHP 8)

SoapClient::\_\_getCookies — Devuelve la lista de cookies

### Descripción

public **SoapClient::\_\_getCookies**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# SoapClient::\_\_getFunctions

(PHP 5, PHP 7, PHP 8)

SoapClient::\_\_getFunctions — Retorna una lista de funciones SOAP publicadas

### Descripción

public **SoapClient::\_\_getFunctions**(): [?](#language.types.null)[array](#language.types.array)

**SoapClient::\_\_getFunctions()** retorna un array de
funciones SOAP publicadas descritas en el WSDL.

**Nota**:

Esta función solo está disponible en modo WSDL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El [array](#language.types.array) de funciones SOAP con el tipo de retorno, el nombre
de la función y los tipos de los argumentos que acepta.

### Ejemplos

    **Ejemplo #1 Ejemplo con SoapClient::__getFunctions()**

&lt;?php
$client = new SoapClient('http://soap.amazon.com/schemas3/AmazonWebServices.wsdl');
var_dump($client-&gt;\_\_getFunctions());
?&gt;

    El ejemplo anterior mostrará:

array(26) {
[0]=&gt;
string(70) "ProductInfo KeywordSearchRequest(KeywordRequest $KeywordSearchRequest)"
[1]=&gt;
string(79) "ProductInfo TextStreamSearchRequest(TextStreamRequest $TextStreamSearchRequest)"
[2]=&gt;
string(64) "ProductInfo PowerSearchRequest(PowerRequest $PowerSearchRequest)"
...
[23]=&gt;
string(107) "ShoppingCart RemoveShoppingCartItemsRequest(RemoveShoppingCartItemsRequest $RemoveShoppingCartItemsRequest)"
[24]=&gt;
string(107) "ShoppingCart ModifyShoppingCartItemsRequest(ModifyShoppingCartItemsRequest $ModifyShoppingCartItemsRequest)"
[25]=&gt;
string(118) "GetTransactionDetailsResponse GetTransactionDetailsRequest(GetTransactionDetailsRequest $GetTransactionDetailsRequest)"
}

### Ver también

    - [SoapClient::__construct()](#soapclient.construct) - Constructor SoapClient

# SoapClient::\_\_getLastRequest

(PHP 5, PHP 7, PHP 8)

SoapClient::\_\_getLastRequest — Devuelve la última petición SOAP

### Descripción

public **SoapClient::\_\_getLastRequest**(): [?](#language.types.null)[string](#language.types.string)

Devuelve el código XML de la última petición SOAP enviada.

**Nota**:

    Este método funciona únicamente si el objeto [SoapClient](#class.soapclient)
    ha sido creado con la opción trace configurada a **[true](#constant.true)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La última petición SOAP, en forma de string de código XML.

### Ejemplos

    **Ejemplo #1 Ejemplo con SoapClient::__getLastRequest()**

&lt;?php
$client = new SoapClient("some.wsdl", array('trace' =&gt; 1));
$result = $client-&gt;SomeFunction();
echo "REQUEST:\n" . $client-&gt;\_\_getLastRequest() . "\n";
?&gt;

### Ver también

    - [SoapClient::__getLastRequestHeaders()](#soapclient.getlastrequestheaders) - Devuelve los encabezados de la última petición SOAP

    - [SoapClient::__getLastResponse()](#soapclient.getlastresponse) - Devuelve la última respuesta SOAP

    - [SoapClient::__getLastResponseHeaders()](#soapclient.getlastresponseheaders) - Retorna los encabezados de la última respuesta SOAP

# SoapClient::\_\_getLastRequestHeaders

(PHP 5, PHP 7, PHP 8)

SoapClient::\_\_getLastRequestHeaders — Devuelve los encabezados de la última petición SOAP

### Descripción

public **SoapClient::\_\_getLastRequestHeaders**(): [?](#language.types.null)[string](#language.types.string)

Devuelve los encabezados de la última petición SOAP

**Nota**:

    Esta función solo está disponible si el objeto
    [SoapClient](#class.soapclient) ha sido creado con la opción
    trace a **[true](#constant.true)**

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Los últimos encabezados SOAP.

### Ejemplos

    **Ejemplo #1 Ejemplo de SoapClient::__getLastRequestHeaders()**

&lt;?php
$client = SoapClient("some.wsdl", array('trace' =&gt; 1));
$result = $client-&gt;SomeFunction();
echo "REQUEST HEADERS:\n" . $client-&gt;\_\_getLastRequestHeaders() . "\n";
?&gt;

### Ver también

    - [SoapClient::__getLastResponseHeaders()](#soapclient.getlastresponseheaders) - Retorna los encabezados de la última respuesta SOAP

    - [SoapClient::__getLastRequest()](#soapclient.getlastrequest) - Devuelve la última petición SOAP

    - [SoapClient::__getLastResponse()](#soapclient.getlastresponse) - Devuelve la última respuesta SOAP

# SoapClient::\_\_getLastResponse

(PHP 5, PHP 7, PHP 8)

SoapClient::\_\_getLastResponse — Devuelve la última respuesta SOAP

### Descripción

public **SoapClient::\_\_getLastResponse**(): [?](#language.types.null)[string](#language.types.string)

Devuelve el código XML de la última respuesta SOAP.

**Nota**:

    Esta función solo está disponible si el objeto
    [SoapClient](#class.soapclient) ha sido creado con la opción
    trace a **[true](#constant.true)**

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La última respuesta SOAP, en forma de string XML.

### Ejemplos

    **Ejemplo #1 Ejemplo con SoapClient::__getLastResponse()**

&lt;?php
$client = SoapClient("some.wsdl", array('trace' =&gt; 1));
$result = $client-&gt;SomeFunction();
echo "Response:\n" . $client-&gt;\_\_getLastResponse() . "\n";
?&gt;

### Ver también

    - [SoapClient::__getLastResponseHeaders()](#soapclient.getlastresponseheaders) - Retorna los encabezados de la última respuesta SOAP

    - [SoapClient::__getLastRequest()](#soapclient.getlastrequest) - Devuelve la última petición SOAP

    - [SoapClient::__getLastRequestHeaders()](#soapclient.getlastrequestheaders) - Devuelve los encabezados de la última petición SOAP

# SoapClient::\_\_getLastResponseHeaders

(PHP 5, PHP 7, PHP 8)

SoapClient::\_\_getLastResponseHeaders — Retorna los encabezados de la última respuesta SOAP

### Descripción

public **SoapClient::\_\_getLastResponseHeaders**(): [?](#language.types.null)[string](#language.types.string)

Retorna los encabezados de la última respuesta SOAP.

**Nota**:

    Esta función solo está disponible si el objeto
    [SoapClient](#class.soapclient) fue creado con la opción
    trace a **[true](#constant.true)**

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Los encabezados de la última respuesta SOAP.

### Ejemplos

    **Ejemplo #1 Ejemplo con SoapClient::__getLastResponseHeaders()**

&lt;?php
$client = SoapClient("some.wsdl", array('trace' =&gt; 1));
$result = $client-&gt;SomeFunction();
echo "RESPONSE HEADERS:\n" . $client-&gt;\_\_getLastResponseHeaders() . "\n";
?&gt;

### Ver también

    - [SoapClient::__getLastRequestHeaders()](#soapclient.getlastrequestheaders) - Devuelve los encabezados de la última petición SOAP

    - [SoapClient::__getLastRequest()](#soapclient.getlastrequest) - Devuelve la última petición SOAP

    - [SoapClient::__getLastResponse()](#soapclient.getlastresponse) - Devuelve la última respuesta SOAP

# SoapClient::\_\_getTypes

(PHP 5, PHP 7, PHP 8)

SoapClient::\_\_getTypes — Devuelve una lista de tipos SOAP

### Descripción

public **SoapClient::\_\_getTypes**(): [?](#language.types.null)[array](#language.types.array)

**SoapClient::\_\_getTypes()**
devuelve la lista de tipos SOAP descritos en el archivo WSDL
del servicio web actual.

**Nota**:

Esta función solo está disponible en modo WSDL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [array](#language.types.array) de tipos SOAP que detallan todas las estructuras
y los tipos

### Ejemplos

    **Ejemplo #1 Ejemplo con SoapClient::__getTypes()**

&lt;?php
$client = new SoapClient("http://soap.amazon.com/schemas3/AmazonWebServices.wsdl");
var_dump($client-&gt;\_\_getTypes());
?&gt;

    El ejemplo anterior mostrará:

array(88) {
[0]=&gt;
string(30) "ProductLine ProductLineArray[]"
[1]=&gt;
string(85) "struct ProductLine {
string Mode;
string RelevanceRank;
ProductInfo ProductInfo;
}"
[2]=&gt;
string(105) "struct ProductInfo {
string TotalResults;
string TotalPages;
string ListName;
DetailsArray Details;
}"
...
[85]=&gt;
string(32) "ShortSummary ShortSummaryArray[]"
[86]=&gt;
string(121) "struct GetTransactionDetailsRequest {
string tag;
string devtag;
string key;
OrderIdArray OrderIds;
string locale;
}"
[87]=&gt;
string(75) "struct GetTransactionDetailsResponse {
ShortSummaryArray ShortSummaries;
}"
}

### Ver también

    - [SoapClient::__construct()](#soapclient.construct) - Constructor SoapClient

# SoapClient::\_\_setCookie

(PHP 5 &gt;= 5.0.4, PHP 7, PHP 8)

SoapClient::\_\_setCookie — Define un cookie para las peticiones SOAP

### Descripción

public **SoapClient::\_\_setCookie**([string](#language.types.string) $name, [?](#language.types.null)[string](#language.types.string) $value = **[null](#constant.null)**): [void](language.types.void.html)

Se define el cookie que será enviado con la petición SOAP.

**Nota**:

    La llamada a este método afectará a todas las llamadas posteriores a
    los métodos [SoapClient](#class.soapclient).

### Parámetros

     name


       El nombre del cookie.






     value


       El valor del cookie. Si no se especifica, el cookie será borrado.





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       value ahora es nullable.



# SoapClient::\_\_setLocation

(PHP 5 &gt;= 5.0.4, PHP 7, PHP 8)

SoapClient::\_\_setLocation — Configura la URL del servicio web a utilizar

### Descripción

public **SoapClient::\_\_setLocation**([?](#language.types.null)[string](#language.types.string) $location = **[null](#constant.null)**): [?](#language.types.null)[string](#language.types.string)

Configura la URL destino a la cual serán enviadas las peticiones SOAP.
Esto equivale a especificar la opción location durante
la construcción del cliente [SoapClient](#class.soapclient).

**Nota**:

    Este método es opcional. [SoapClient](#class.soapclient) utiliza
    la URL indicada en el archivo WDSL por defecto.

### Parámetros

     location


       La nueva URL.





### Valores devueltos

La URL anterior.

### Historial de cambios

      Versión
      Descripción






      8.0.3

       location ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con SoapClient::__setLocation()**

&lt;?php
$client = new SoapClient('http://example.com/webservice.php?wsdl');

$client-&gt;\_\_setLocation('http://www.somethirdparty.com');

$old_location = $client-&gt;\_\_setLocation(); // unsets the location option

echo $old_location;

?&gt;

    Resultado del ejemplo anterior es similar a:

http://www.somethirdparty.com

### Ver también

    - [SoapClient::__construct()](#soapclient.construct) - Constructor SoapClient

# SoapClient::\_\_setSoapHeaders

(PHP 5 &gt;= 5.0.5, PHP 7, PHP 8)

SoapClient::\_\_setSoapHeaders — Añade un encabezado SOAP para las peticiones siguientes

### Descripción

public **SoapClient::\_\_setSoapHeaders**([SoapHeader](#class.soapheader)|[array](#language.types.array)|[null](#language.types.null) $headers = **[null](#constant.null)**): [bool](#language.types.boolean)

Establece un encabezado a utilizar en las peticiones SOAP.

**Nota**:

    Este método va a sobrescribir el valor anterior.

### Parámetros

     headers


       El encabezado a configurar. Puede ser un objeto
       [SoapHeader](#class.soapheader) o un array de objetos
       [SoapHeader](#class.soapheader). Si este argumento no es
       especificado o definido a **[null](#constant.null)**, los encabezados serán eliminados.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con SoapClient::__setSoapHeaders()**

&lt;?php

$client = new SoapClient(null, array('location' =&gt; "http://localhost/soap.php",
                                     'uri'      =&gt; "http://test-uri/"));
$header = new SoapHeader('http://soapinterop.org/echoheader/',
'echoMeStringRequest',
'hello world');

$client-&gt;__setSoapHeaders($header);

$client-&gt;\_\_soapCall("echoVoid", null);
?&gt;

      **Ejemplo #2 Configuración de múltiples encabezados para SOAP**




&lt;?php

$client = new SoapClient(null, array('location' =&gt; "http://localhost/soap.php",
                                     'uri'      =&gt; "http://test-uri/"));
$headers = array();

$headers[] = new SoapHeader('http://soapinterop.org/echoheader/',
'echoMeStringRequest',
'hello world');

$headers[] = new SoapHeader('http://soapinterop.org/echoheader/',
'echoMeStringRequest',
'hello world again');

$client-&gt;__setSoapHeaders($headers);

$client-&gt;\_\_soapCall("echoVoid", null);
?&gt;

# SoapClient::\_\_soapCall

(PHP 5, PHP 7, PHP 8)

SoapClient::\_\_soapCall — Realiza una llamada SOAP

### Descripción

public **SoapClient::\_\_soapCall**(
    [string](#language.types.string) $name,
    [array](#language.types.array) $args,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**,
    [SoapHeader](#class.soapheader)|[array](#language.types.array)|[null](#language.types.null) $inputHeaders = **[null](#constant.null)**,
    [array](#language.types.array) &amp;$outputHeaders = **[null](#constant.null)**
): [mixed](#language.types.mixed)

Esta es una función de bajo nivel de la API que se utiliza para realizar llamadas
SOAP. Normalmente, en modo WSDL, se pueden llamar simplemente las
funciones SOAP como métodos de [SoapClient](#class.soapclient).
Este método es útil en modo no-WSDL cuando
soapaction es desconocido, uri es diferente
del valor por omisión o al enviar y/o recibir encabezados SOAP.

En caso de error, una llamada a una función SOAP puede causar el lanzamiento
de una excepción por PHP o devolver un objeto [SoapFault](#class.soapfault)
si las excepciones están desactivadas. Para verificar si la llamada a esta función no logra atrapar las excepciones [SoapFault](#class.soapfault),
verifique el resultado con la función [is_soap_fault()](#function.is-soap-fault).

### Parámetros

     name


       El nombre de la función SOAP a llamar.






     args


       Un array de argumentos a pasar a la función. Esto puede ser
       un array asociativo u ordenado. Tenga en cuenta que la mayoría de los servidores
       SOAP requieren nombres de parámetros, en cuyo caso, debe ser un
       array asociativo.






     options


       Un array asociativo de opciones a pasar al cliente.




       Una opción de location para el servicio web remoto.




       Una opción uri con el espacio de nombres objetivo del servicio SOAP.




        La opción soapaction es la acción a llamar.






     inputHeaders


       Un array de encabezados a enviar con la petición SOAP.






     outputHeaders


       Si se proporciona, este array será llenado con los encabezados de
       la respuesta SOAP devuelta.





### Valores devueltos

Las funciones SOAP devuelven uno o varios valores. Si un solo valor es
devuelto por la función SOAP, el valor devuelto de
**soapCall será un valor simple (por ejemplo, un entero, un string, etc.). Si varios valores son devueltos,
**soapCall devolverá un array asociativo que contiene los
nombres de los parámetros mostrados.

En caso de error, si el objeto [SoapClient](#class.soapclient) fue construido
con la opción exceptions que valía **[false](#constant.false)**, un objeto
[SoapFault](#class.soapfault) será devuelto.

### Ejemplos

    **Ejemplo #1 Ejemplo con SoapClient::__soapCall()**

&lt;?php

$client = new SoapClient("some.wsdl");
$client-&gt;SomeFunction($a, $b, $c);

$client-&gt;__soapCall("SomeFunction", array($a, $b, $c));
$client-&gt;\_\_soapCall("SomeFunction", array($a, $b, $c), NULL,
new SoapHeader(), $output_headers);

$client = new SoapClient(null, array('location' =&gt; "http://localhost/soap.php",
                                     'uri'      =&gt; "http://test-uri/"));
$client-&gt;SomeFunction($a, $b, $c);
$client-&gt;**soapCall("SomeFunction", array($a, $b, $c));
$client-&gt;**soapCall("SomeFunction", array($a, $b, $c),
array('soapaction' =&gt; 'some_action',
'uri' =&gt; 'some_uri'));
?&gt;

### Ver también

    - [SoapClient::__construct()](#soapclient.construct) - Constructor SoapClient

    - [SoapParam::__construct()](#soapparam.construct) - Constructor SoapParam

    - [SoapVar::__construct()](#soapvar.construct) - Constructor de SoapVar

    - [SoapHeader::__construct()](#soapheader.construct) - Constructor SoapHeader

    - [SoapFault::__construct()](#soapfault.construct) - Constructor de SoapFault

    - [is_soap_fault()](#function.is-soap-fault) - Verifica si SOAP devuelve un error

## Tabla de contenidos

- [SoapClient::\_\_call](#soapclient.call) — Llamada a una función SOAP (obsoleta)
- [SoapClient::\_\_construct](#soapclient.construct) — Constructor SoapClient
- [SoapClient::\_\_doRequest](#soapclient.dorequest) — Ejecuta una solicitud SOAP
- [SoapClient::\_\_getCookies](#soapclient.getcookies) — Devuelve la lista de cookies
- [SoapClient::\_\_getFunctions](#soapclient.getfunctions) — Retorna una lista de funciones SOAP publicadas
- [SoapClient::\_\_getLastRequest](#soapclient.getlastrequest) — Devuelve la última petición SOAP
- [SoapClient::\_\_getLastRequestHeaders](#soapclient.getlastrequestheaders) — Devuelve los encabezados de la última petición SOAP
- [SoapClient::\_\_getLastResponse](#soapclient.getlastresponse) — Devuelve la última respuesta SOAP
- [SoapClient::\_\_getLastResponseHeaders](#soapclient.getlastresponseheaders) — Retorna los encabezados de la última respuesta SOAP
- [SoapClient::\_\_getTypes](#soapclient.gettypes) — Devuelve una lista de tipos SOAP
- [SoapClient::\_\_setCookie](#soapclient.setcookie) — Define un cookie para las peticiones SOAP
- [SoapClient::\_\_setLocation](#soapclient.setlocation) — Configura la URL del servicio web a utilizar
- [SoapClient::\_\_setSoapHeaders](#soapclient.setsoapheaders) — Añade un encabezado SOAP para las peticiones siguientes
- [SoapClient::\_\_soapCall](#soapclient.soapcall) — Realiza una llamada SOAP

# La clase SoapServer

(PHP 5, PHP 7, PHP 8)

## Introducción

    La clase **SoapServer** proporciona un servidor
    para los protocolos [» SOAP 1.1](http://www.w3.org/TR/soap11/)
    y [» SOAP 1.2](http://www.w3.org/TR/soap12/).
    Puede ser utilizado con o sin el servicio de descripción WSDL.

## Sinopsis de la Clase

     class **SoapServer**
     {

    /* Propiedades */

     private
     ?[SoapFault](#class.soapfault)
      [$__soap_fault](#soapserver.props.soap-fault) = null;


    /* Métodos */

public [\_\_construct](#soapserver.construct)([?](#language.types.null)[string](#language.types.string) $wsdl, [array](#language.types.array) $options = [])

    public [addFunction](#soapserver.addfunction)([array](#language.types.array)|[string](#language.types.string)|[int](#language.types.integer) $functions): [void](language.types.void.html)

public [addSoapHeader](#soapserver.addsoapheader)([SoapHeader](#class.soapheader) $header): [void](language.types.void.html)
public [fault](#soapserver.fault)(
    [string](#language.types.string) $code,
    [string](#language.types.string) $string,
    [string](#language.types.string) $actor = "",
    [mixed](#language.types.mixed) $details = **[null](#constant.null)**,
    [string](#language.types.string) $name = ""
): [void](language.types.void.html)
public [getFunctions](#soapserver.getfunctions)(): [array](#language.types.array)
public [__getLastResponse](#soapserver.getlastresponse)(): [?](#language.types.null)[string](#language.types.string)
public [handle](#soapserver.handle)([?](#language.types.null)[string](#language.types.string) $request = **[null](#constant.null)**): [void](language.types.void.html)
public [setClass](#soapserver.setclass)([string](#language.types.string) $class, [mixed](#language.types.mixed) ...$args): [void](language.types.void.html)
public [setObject](#soapserver.setobject)([object](#language.types.object) $object): [void](language.types.void.html)
public [setPersistence](#soapserver.setpersistence)([int](#language.types.integer) $mode): [void](language.types.void.html)

}

## Propiedades

     service








     __soap_fault







# SoapServer::addFunction

(PHP 5, PHP 7, PHP 8)

SoapServer::addFunction — Añade una o varias funciones que gestionarán las peticiones SOAP

### Descripción

public **SoapServer::addFunction**([array](#language.types.array)|[string](#language.types.string)|[int](#language.types.integer) $functions): [void](language.types.void.html)

Exporta una o varias funciones para los clientes remotos.

### Parámetros

     functions


       Para exportar una sola función, debe pasarse su nombre en este argumento
       como string.




       Para exportar varias funciones, debe utilizarse
       un array de nombres de funciones.




       Para exportar todas las funciones, debe utilizarse la constante especial
       **[SOAP_FUNCTIONS_ALL](#constant.soap-functions-all)**.



      **Nota**:



        functions debe recibir todos los argumentos de entrada
        en el mismo orden que el definido en el fichero WSDL (no debe recibir ningún parámetro de salida como argumento) y devuelve uno o varios valores. Para devolver varios valores, debe devolver un array que contenga los nombres de los parámetros de salida.






### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con SoapServer::addFunction()**

&lt;?php

function echoString($inputString)
{
return $inputString;
}

$server-&gt;addFunction("echoString");

function echoTwoStrings($inputString1, $inputString2)
{
    return array("outputString1" =&gt; $inputString1,
                 "outputString2" =&gt; $inputString2);
}
$server-&gt;addFunction(array("echoString", "echoTwoStrings"));

$server-&gt;addFunction(SOAP_FUNCTIONS_ALL);

?&gt;

### Ver también

    - [SoapServer::__construct()](#soapserver.construct) - Constructor de SoapServer

    - [SoapServer::setClass()](#soapserver.setclass) - Configura la clase que será utilizada para gestionar las peticiones SOAP

# SoapServer::addSoapHeader

(PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

SoapServer::addSoapHeader — Añade un encabezado SOAP a una respuesta

### Descripción

public **SoapServer::addSoapHeader**([SoapHeader](#class.soapheader) $header): [void](language.types.void.html)

Añade un encabezado SOAP a la respuesta actual.

### Parámetros

     header


       El encabezado a devolver.





### Valores devueltos

No se retorna ningún valor.

# SoapServer::\_\_construct

(PHP 5, PHP 7, PHP 8)

SoapServer::\_\_construct — Constructor de SoapServer

### Descripción

public **SoapServer::\_\_construct**([?](#language.types.null)[string](#language.types.string) $wsdl, [array](#language.types.array) $options = [])

Este constructor permite la creación de objetos [SoapServer](#class.soapserver)
en modo WSDL o no-WSDL.

### Parámetros

     wsdl


       Para utilizar el modo WSDL, debe definirse la URI del fichero
       WSDL en este argumento. En otras situaciones, debe definirse
       este argumento a **[null](#constant.null)** y definirse la opción uri.






     options


       Permite definir una versión SOAP por omisión (soap_version),
       un juego de caracteres de codificación interna (encoding)
       y una URI actor (actor).




       La opción classmap puede ser utilizada para ligar
       algunos tipos WSDL a clases PHP. Esta opción debe ser un
       array con los tipos WSDL como claves y los nombres de las clases PHP
       como valores.




       La opción typemap es un array cuyas claves son
       type_name, type_ns (URI del espacio de nombres),
       from_xml (función de retrollamada aceptando un argumento de tipo [string](#language.types.string)) y
       to_xml (función de retrollamada aceptando un argumento de tipo [object](#language.types.object)).




       La opción cache_wsdl puede tomar uno de los valores
       **[WSDL_CACHE_NONE](#constant.wsdl-cache-none)**,
       **[WSDL_CACHE_DISK](#constant.wsdl-cache-disk)**,
       **[WSDL_CACHE_MEMORY](#constant.wsdl-cache-memory)** o
       **[WSDL_CACHE_BOTH](#constant.wsdl-cache-both)**.




       La última opción es features
       que puede ser definida a
       **[SOAP_WAIT_ONE_WAY_CALLS](#constant.soap-wait-one-way-calls)**,
       **[SOAP_SINGLE_ELEMENT_ARRAYS](#constant.soap-single-element-arrays)**,
       **[SOAP_USE_XSI_ARRAY_TYPE](#constant.soap-use-xsi-array-type)**.




       La opción send_errors puede ser definida a **[false](#constant.false)** para enviar
       un mensaje de error genérico ("Internal error") en lugar del mensaje de error
       específico.





### Ejemplos

    **Ejemplo #1 Ejemplos con SoapServer::__construct()**

&lt;?php
$server = new SoapServer("some.wsdl");

$server = new SoapServer("some.wsdl", array('soap_version' =&gt; SOAP_1_2));

$server = new SoapServer("some.wsdl", array('actor' =&gt; "http://example.org/ts-tests/C"));

$server = new SoapServer("some.wsdl", array('encoding'=&gt;'ISO-8859-1'));

$server = new SoapServer(null, array('uri' =&gt; "http://test-uri/"));

class MyBook {
public $title;
public $author;
}

$server = new SoapServer("books.wsdl", array('classmap' =&gt; array('book' =&gt; "MyBook")));

?&gt;

### Ver también

    - [SoapClient::__construct()](#soapclient.construct) - Constructor SoapClient

# SoapServer::fault

(PHP 5, PHP 7, PHP 8)

SoapServer::fault — Emitir un error [SoapServer](#class.soapserver)

### Descripción

public **SoapServer::fault**(
    [string](#language.types.string) $code,
    [string](#language.types.string) $string,
    [string](#language.types.string) $actor = "",
    [mixed](#language.types.mixed) $details = **[null](#constant.null)**,
    [string](#language.types.string) $name = ""
): [void](language.types.void.html)

Envía una respuesta al cliente de la petición actual,
con un mensaje de error.

**Nota**:

    Esto solo es posible durante la ejecución de la petición.

### Parámetros

     code


       El código de error a devolver.






     string


       Una descripción del error.






     actor


       Una cadena que identifica al actor involucrado.






     details


       Más detalles sobre el fallo.






     name


       El nombre del error. Esto puede ser utilizado para
       seleccionar un nombre en un archivo WSDL.





### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [SoapFault::__construct()](#soapfault.construct) - Constructor de SoapFault

# SoapServer::getFunctions

(PHP 5, PHP 7, PHP 8)

SoapServer::getFunctions — Devuelve la lista de funciones definidas

### Descripción

public **SoapServer::getFunctions**(): [array](#language.types.array)

**SoapServer::getFunctions()** devuelve la lista
de todas las funciones añadidas al objeto servidor [SoapServer](#class.soapserver).
Devuelve la lista de todas las funciones añadidas mediante
los métodos [SoapServer::addFunction()](#soapserver.addfunction) y
[SoapServer::setClass()](#soapserver.setclass).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [array](#language.types.array) de todas las funciones.

### Ejemplos

    **Ejemplo #1 Ejemplo con SoapServer::getFunctions()**

&lt;?php
$server = new SoapServer(NULL, array("uri" =&gt; "http://test-uri"));
$server-&gt;addFunction(SOAP_FUNCTIONS_ALL);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $server-&gt;handle();
} else {
  echo "Este servidor SOAP puede gestionar las siguientes funciones: ";
  $functions = $server-&gt;getFunctions();
  foreach($functions as $func) {
echo $func . "\n";
}
}
?&gt;

### Ver también

    - [SoapServer::__construct()](#soapserver.construct) - Constructor de SoapServer

    - [SoapServer::addFunction()](#soapserver.addfunction) - Añade una o varias funciones que gestionarán las peticiones SOAP

    - [SoapServer::setClass()](#soapserver.setclass) - Configura la clase que será utilizada para gestionar las peticiones SOAP

# SoapServer::\_\_getLastResponse

(PHP 8 &gt;= 8.4)

SoapServer::\_\_getLastResponse — Devuelve la última respuesta SOAP

### Descripción

public **SoapServer::\_\_getLastResponse**(): [?](#language.types.null)[string](#language.types.string)

Devuelve el XML enviado en la última respuesta SOAP.

**Nota**:

    Este método solo funciona si el objeto [SoapServer](#class.soapserver)
    ha sido creado con la opción trace definida a **[true](#constant.true)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La última respuesta SOAP, en forma de string XML.

### Ejemplos

**Ejemplo #1 Ejemplo de SoapServer::\_\_getLastResponse()**

&lt;?php
$server = SoapServer("some.wsdl", ["trace" =&gt; 1]);
$server-&gt;handle();
echo "Response:\n" . $server-&gt;\_\_getLastResponse() . "\n";
?&gt;

# SoapServer::handle

(PHP 5, PHP 7, PHP 8)

SoapServer::handle — Procesa una solicitud SOAP

### Descripción

public **SoapServer::handle**([?](#language.types.null)[string](#language.types.string) $request = **[null](#constant.null)**): [void](language.types.void.html)

Realiza una solicitud SOAP, llama a las funciones necesarias y envía
una respuesta en retorno.

### Parámetros

     request


       La solicitud SOAP. Si este argumento es omitido, se asume que la solicitud
       se encuentra en los datos POST sin tratar de la petición HTTP.





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       request ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con SoapServer::handle()**

&lt;?php
function test($x)
{
return $x;
}

$server = new SoapServer(null, array('uri' =&gt; "http://test-uri/"));
$server-&gt;addFunction("test");
$server-&gt;handle();
?&gt;

### Ver también

    - [SoapServer::__construct()](#soapserver.construct) - Constructor de SoapServer

# SoapServer::setClass

(PHP 5, PHP 7, PHP 8)

SoapServer::setClass — Configura la clase que será utilizada para gestionar las peticiones SOAP

### Descripción

public **SoapServer::setClass**([string](#language.types.string) $class, [mixed](#language.types.mixed) ...$args): [void](language.types.void.html)

Exporta todos los métodos de la clase especificada.

**SoapServer::setClass()** configura una clase que servirá
como gestor para las peticiones SOAP. El objeto podrá entonces ser
mantenido persistente a través de las peticiones durante una sesión PHP,
con el método [SoapServer::setPersistence()](#soapserver.setpersistence).

### Parámetros

     class


       El nombre de la clase exportada.






     args


       Estos parámetros opcionales serán pasados por defecto al
       constructor de la clase, durante la fase de creación
       del objeto.





### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [SoapServer::__construct()](#soapserver.construct) - Constructor de SoapServer

    - [SoapServer::addFunction()](#soapserver.addfunction) - Añade una o varias funciones que gestionarán las peticiones SOAP

    - [SoapServer::setPersistence()](#soapserver.setpersistence) - Activa el modo persistente de SoapServer

# SoapServer::setObject

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

SoapServer::setObject — Configura el objeto que será utilizado para gestionar las peticiones SOAP

### Descripción

public **SoapServer::setObject**([object](#language.types.object) $object): [void](language.types.void.html)

**SoapServer::setObject()** configura un objeto que servirá
como gestor de las peticiones SOAP, en lugar de una simple clase,
como con [SoapServer::setClass()](#soapserver.setclass).

### Parámetros

     object


       El objeto que gestionará las peticiones.





### Valores devueltos

    No se retorna ningún valor.

### Ver también

    - [SoapServer::setClass()](#soapserver.setclass) - Configura la clase que será utilizada para gestionar las peticiones SOAP

# SoapServer::setPersistence

(PHP 5, PHP 7, PHP 8)

SoapServer::setPersistence — Activa el modo persistente de SoapServer

### Descripción

public **SoapServer::setPersistence**([int](#language.types.integer) $mode): [void](language.types.void.html)

Esta función permite cambiar la persistencia de un objeto SoapServer entre las
peticiones. Permite guardar los datos entre las peticiones, mediante las
sesiones PHP. Esta función solo tiene efecto después de haber exportado la lista de funciones
mediante [SoapServer::setClass()](#soapserver.setclass).

**Nota**:

     La constante de persistencia **[SOAP_PERSISTENCE_SESSION](#constant.soap-persistence-session)**
     hace persistentes únicamente los objetos de la clase dada, pero no
     los datos estáticos. En este caso, $this-&gt;bar
     en lugar de self::$bar.

**Nota**:

     **[SOAP_PERSISTENCE_SESSION](#constant.soap-persistence-session)** serializa los datos del objeto entre
     las peticiones. En el caso de los recursos (por ejemplo [PDO](#class.pdo)),
     [__wakeup()](#object.wakeup) y [__sleep()](#object.sleep) deben ser
     utilizadas.

### Parámetros

     mode


       Una de las constantes **[SOAP_PERSISTENCE_*](#constant.soap-persistence-session)**.




       **[SOAP_PERSISTENCE_REQUEST](#constant.soap-persistence-request)** - Los datos de SoapServer
       no son persistentes entre las peticiones. Este es el comportamiento por
       **omisión** de todo objeto SoapServer después
       de llamar a setClass().




       **[SOAP_PERSISTENCE_SESSION](#constant.soap-persistence-session)** - Los datos de SoapServer
       persisten entre las peticiones. Esto se realiza serializando los datos de
       la clase SoapServer en [$_SESSION['_bogus_session_name']](#reserved.variables.session),
       por lo que [session_start()](#function.session-start) debe ser llamada antes de pasar
       a este modo de persistencia.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo SoapServer::setPersistence()**

&lt;?php
class MyFirstPersistentSoapServer {
private $resource; // (Por ejemplo PDO, mysqli, etc..)
public $myvar1;
public $myvar2;

     public function __construct() {
         $this-&gt;__wakeup(); // Se llama a nuestro wakeup para reiniciar nuestro recurso
     }

     public function __wakeup() {
         $this-&gt;resource = CodeToStartOurResourceUp();
     }

     public function __sleep() {
         // Se asegura de eliminar $resource aquí, así nuestros datos pueden persistir en sesión
         // Si se olvida, la deserialización en la próxima petición fallará y nuestro objeto
         // SoapObject no será persistente entre las peticiones.
         return array('myvar1','myvar2');
     }

}

try {
session_start();
$server = new SoapServer(null, array('uri' =&gt; $\_SERVER['REQUEST_URI']));
$server-&gt;setClass('MyFirstPersistentSoapServer');
// setPersistence() DEBE ser llamada después de setClass(), ya que el comportamiento de setClass()
// afecta SESSION_PERSISTENCE_REQUEST.
$server-&gt;setPersistence(SOAP_PERSISTENCE_SESSION);
$server-&gt;handle();
} catch(SoapFault $e) {
error_log("SOAP ERROR: ". $e-&gt;getMessage());
}
?&gt;

### Ver también

    - [SoapServer::setClass()](#soapserver.setclass) - Configura la clase que será utilizada para gestionar las peticiones SOAP

## Tabla de contenidos

- [SoapServer::addFunction](#soapserver.addfunction) — Añade una o varias funciones que gestionarán las peticiones SOAP
- [SoapServer::addSoapHeader](#soapserver.addsoapheader) — Añade un encabezado SOAP a una respuesta
- [SoapServer::\_\_construct](#soapserver.construct) — Constructor de SoapServer
- [SoapServer::fault](#soapserver.fault) — Emitir un error SoapServer
- [SoapServer::getFunctions](#soapserver.getfunctions) — Devuelve la lista de funciones definidas
- [SoapServer::\_\_getLastResponse](#soapserver.getlastresponse) — Devuelve la última respuesta SOAP
- [SoapServer::handle](#soapserver.handle) — Procesa una solicitud SOAP
- [SoapServer::setClass](#soapserver.setclass) — Configura la clase que será utilizada para gestionar las peticiones SOAP
- [SoapServer::setObject](#soapserver.setobject) — Configura el objeto que será utilizado para gestionar las peticiones SOAP
- [SoapServer::setPersistence](#soapserver.setpersistence) — Activa el modo persistente de SoapServer

# La clase SoapFault

(PHP 5, PHP 7, PHP 8)

## Introducción

    Representa un error SOAP.

## Sinopsis de la Clase

     class **SoapFault**



     extends
      [Exception](#class.exception)
     {

    /* Propiedades */

     public
     [string](#language.types.string)
      [$faultstring](#soapfault.props.faultstring);

    public
     ?[string](#language.types.string)
      [$faultcode](#soapfault.props.faultcode) = null;

    public
     ?[string](#language.types.string)
      [$faultcodens](#soapfault.props.faultcodens) = null;

    public
     ?[string](#language.types.string)
      [$faultactor](#soapfault.props.faultactor) = null;

    public
     [mixed](#language.types.mixed)
      [$detail](#soapfault.props.detail) = null;

    public
     ?[string](#language.types.string)
      [$_name](#soapfault.props.name) = null;

    public
     [mixed](#language.types.mixed)
      [$headerfault](#soapfault.props.headerfault) = null;


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

    /* Métodos */

public [\_\_construct](#soapfault.construct)(
    [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $code,
    [string](#language.types.string) $string,
    [?](#language.types.null)[string](#language.types.string) $actor = **[null](#constant.null)**,
    [mixed](#language.types.mixed) $details = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**,
    [mixed](#language.types.mixed) $headerFault = **[null](#constant.null)**
)

    public [__toString](#soapfault.tostring)(): [string](#language.types.string)


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

}

## Propiedades

     _name








     detail








     faultactor








     faultcode








     faultcodens








     faultstring








     headerfault







# SoapFault::\_\_construct

(PHP 5, PHP 7, PHP 8)

SoapFault::\_\_construct — Constructor de SoapFault

### Descripción

public **SoapFault::\_\_construct**(
    [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $code,
    [string](#language.types.string) $string,
    [?](#language.types.null)[string](#language.types.string) $actor = **[null](#constant.null)**,
    [mixed](#language.types.mixed) $details = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**,
    [mixed](#language.types.mixed) $headerFault = **[null](#constant.null)**
)

[SoapFault](#class.soapfault) sirve para enviar errores SOAP desde
PHP.faultcode, faultstring,
faultactor y detail son
los elementos estándar SOAP.

### Parámetros

     faultcode


       El código de error de [SoapFault](#class.soapfault).






     faultstring


       El mensaje de error de [SoapFault](#class.soapfault).






     faultactor


       Una cadena que identifica al actor que causó el error.






     detail








     faultname


       Puede ser utilizado para seleccionar la codificación adecuada desde WSDL.






     headerfault


       Puede ser utilizado durante la gestión del encabezado SOAP para reportar
       un error en el encabezado de respuesta.





### Ejemplos

    **Ejemplo #1 Algunos ejemplos con [SoapFault](#class.soapfault)**

&lt;?php
function test($x)
{
return new SoapFault("Server", "Un mensaje de error");
}

$server = new SoapServer(null, array('uri' =&gt; "http://test-uri/"));
$server-&gt;addFunction("test");
$server-&gt;handle();
?&gt;

Es posible utilizar el mecanismo de excepciones de PHP para lanzar excepciones [SoapFault](#class.soapfault).

    **Ejemplo #2 Emisión de excepciones [SoapFault](#class.soapfault)**

&lt;?php
function test($x)
{
throw new SoapFault("Server", "Un mensaje de error");
}

$server = new SoapServer(null, array('uri' =&gt; "http://test-uri/"));
$server-&gt;addFunction("test");
$server-&gt;handle();
?&gt;

### Ver también

    - [SoapServer::fault()](#soapserver.fault) - Emitir un error SoapServer

    - [is_soap_fault()](#function.is-soap-fault) - Verifica si SOAP devuelve un error

# SoapFault::\_\_toString

(PHP 5, PHP 7, PHP 8)

SoapFault::\_\_toString — Produce una representación en string de un objeto [SoapFault](#class.soapfault)

### Descripción

public **SoapFault::\_\_toString**(): [string](#language.types.string)

Devuelve una representación en string del objeto [SoapFault](#class.soapfault).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un string que describe el objeto [SoapFault](#class.soapfault).

## Tabla de contenidos

- [SoapFault::\_\_construct](#soapfault.construct) — Constructor de SoapFault
- [SoapFault::\_\_toString](#soapfault.tostring) — Produce una representación en string de un objeto SoapFault

# La clase SoapHeader

(PHP 5, PHP 7, PHP 8)

## Introducción

    Representa un encabezado SOAP.

## Sinopsis de la Clase

     class **SoapHeader**
     {

    /* Propiedades */

     public
     [string](#language.types.string)
      [$namespace](#soapheader.props.namespace);

    public
     [string](#language.types.string)
      [$name](#soapheader.props.name);

    public
     [mixed](#language.types.mixed)
      [$data](#soapheader.props.data) = null;

    public
     [bool](#language.types.boolean)
      [$mustUnderstand](#soapheader.props.mustunderstand);

    public
     [string](#language.types.string)|[int](#language.types.integer)|[null](#language.types.null)
      [$actor](#soapheader.props.actor);


    /* Métodos */

public [\_\_construct](#soapheader.construct)(
    [string](#language.types.string) $namespace,
    [string](#language.types.string) $name,
    [mixed](#language.types.mixed) $data = ?,
    [bool](#language.types.boolean) $mustunderstand = ?,
    [string](#language.types.string) $actor = ?
)

}

## Propiedades

     actor








     data








     mustUnderstand








     name








     namespace







# SoapHeader::\_\_construct

(PHP 5, PHP 7, PHP 8)

SoapHeader::\_\_construct — Constructor SoapHeader

### Descripción

public **SoapHeader::\_\_construct**(
    [string](#language.types.string) $namespace,
    [string](#language.types.string) $name,
    [mixed](#language.types.mixed) $data = ?,
    [bool](#language.types.boolean) $mustunderstand = ?,
    [string](#language.types.string) $actor = ?
)

Construye un nuevo objeto [SoapHeader](#class.soapheader).

### Parámetros

     namespace


       El espacio de nombres del elemento de encabezado SOAP.






     name


       El nombre del elemento de encabezado SOAP.






     data


       Un contenido del encabezado SOAP. Puede ser un valor PHP o
       un objeto [SoapVar](#class.soapvar).






     mustUnderstand


       Valor del atributo mustUnderstand
       del elemento de encabezado SOAP.






     actor


       Valor del atributo actor
       del elemento de encabezado SOAP.





### Ejemplos

    **Ejemplo #1 Ejemplo con SoapHeader::__construct()**

&lt;?php
$client = new SoapClient(null, array('location' =&gt; "http://localhost/soap.php",
                                     'uri'      =&gt; "http://test-uri/"));
$client-&gt;\_\_soapCall("echoVoid", null, null,
new SoapHeader('http://soapinterop.org/echoheader/',
'echoMeStringRequest',
'hello world'));
?&gt;

### Ver también

    - [SoapClient::__soapCall()](#soapclient.soapcall) - Realiza una llamada SOAP

    - [SoapVar::__construct()](#soapvar.construct) - Constructor de SoapVar

    - [SoapParam::__construct()](#soapparam.construct) - Constructor SoapParam

    - [SoapServer::addSoapHeader()](#soapserver.addsoapheader) - Añade un encabezado SOAP a una respuesta

## Tabla de contenidos

- [SoapHeader::\_\_construct](#soapheader.construct) — Constructor SoapHeader

# La clase SoapParam

(PHP 5, PHP 7, PHP 8)

## Introducción

     Representa un parámetro en una llamada SOAP.

## Sinopsis de la Clase

     class **SoapParam**
     {

    /* Propiedades */

     public
     [string](#language.types.string)
      [$param_name](#soapparam.props.param-name);

    public
     [mixed](#language.types.mixed)
      [$param_data](#soapparam.props.param-data);


    /* Métodos */

public [\_\_construct](#soapparam.construct)([mixed](#language.types.mixed) $data, [string](#language.types.string) $name)

}

## Propiedades

     param_data








     param_name







# SoapParam::\_\_construct

(PHP 5, PHP 7, PHP 8)

SoapParam::\_\_construct — Constructor SoapParam

### Descripción

public **SoapParam::\_\_construct**([mixed](#language.types.mixed) $data, [string](#language.types.string) $name)

Construye un nuevo objeto [SoapParam](#class.soapparam).

### Parámetros

     data


       Los datos a pasar o a devolver. Puede pasarse este argumento
       directamente como un valor PHP, pero en este caso, será nombrado
       paramN y el servicio SOAP no lo comprenderá.






     name


       El nombre del argumento.





### Ejemplos

    **Ejemplo #1 Ejemplo con SoapParam::__construct()**

&lt;?php
$client = new SoapClient(null,array('location' =&gt; "http://localhost/soap.php",
                                    'uri'      =&gt; "http://test-uri/"));
$client-&gt;SomeFunction(new SoapParam($a, "a"),
                      new SoapParam($b, "b"),
new SoapParam($c, "c"));
?&gt;

### Ver también

    - [SoapClient::__soapCall()](#soapclient.soapcall) - Realiza una llamada SOAP

    - [SoapVar::__construct()](#soapvar.construct) - Constructor de SoapVar

## Tabla de contenidos

- [SoapParam::\_\_construct](#soapparam.construct) — Constructor SoapParam

# La clase SoapVar

(PHP 5, PHP 7, PHP 8)

## Introducción

    Una clase que representa una variable u objeto que utiliza servicios SOAP.

## Sinopsis de la Clase

     class **SoapVar**
     {

    /* Propiedades */

     public
     [int](#language.types.integer)
      [$enc_type](#soapvar.props.enc-type);

    public
     [mixed](#language.types.mixed)
      [$enc_value](#soapvar.props.enc-value) = null;

    public
     ?[string](#language.types.string)
      [$enc_stype](#soapvar.props.enc-stype) = null;

    public
     ?[string](#language.types.string)
      [$enc_ns](#soapvar.props.enc-ns) = null;

    public
     ?[string](#language.types.string)
      [$enc_name](#soapvar.props.enc-name) = null;

    public
     ?[string](#language.types.string)
      [$enc_namens](#soapvar.props.enc-namens) = null;


    /* Métodos */

public [\_\_construct](#soapvar.construct)(
    [mixed](#language.types.mixed) $data,
    [?](#language.types.null)[int](#language.types.integer) $encoding,
    [?](#language.types.null)[string](#language.types.string) $typeName = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $typeNamespace = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $nodeName = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $nodeNamespace = **[null](#constant.null)**
)

}

## Propiedades

     enc_name








     enc_namens








     enc_ns








     enc_type








     enc_stype








     enc_value







# SoapVar::\_\_construct

(PHP 5, PHP 7, PHP 8)

SoapVar::\_\_construct — Constructor de SoapVar

### Descripción

public **SoapVar::\_\_construct**(
    [mixed](#language.types.mixed) $data,
    [?](#language.types.null)[int](#language.types.integer) $encoding,
    [?](#language.types.null)[string](#language.types.string) $typeName = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $typeNamespace = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $nodeName = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $nodeNamespace = **[null](#constant.null)**
)

Construye un nuevo objeto [SoapVar](#class.soapvar).

### Parámetros

     data


       Los datos a pasar o a devolver.






     encoding


       El ID de codificación, una de las constantes XSD_....






     typeName


       El nombre del tipo.






     typeNamespace


       El tipo del espacio de nombres.






     nodeName


       El nombre del nodo XML.






     nodeNamespace


       El espacio de nombres del nodo XML.





### Historial de cambios

      Versión
      Descripción






      8.0.3

       typeName, typeNamespace, nodeName,
       y nodeNamespace ahora son nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con SoapVar::__construct()**

&lt;?php
class SOAPStruct {
function SOAPStruct($s, $i, $f)
    {
        $this-&gt;varString = $s;
        $this-&gt;varInt = $i;
        $this-&gt;varFloat = $f;
    }
}
$client = new SoapClient(null, array('location' =&gt; "http://localhost/soap.php",
'uri' =&gt; "http://test-uri/"));
$struct = new SOAPStruct('arg', 34, 325.325);
$soapstruct = new SoapVar($struct, SOAP_ENC_OBJECT, "SOAPStruct", "http://soapinterop.org/xsd");
$client-&gt;echoStruct(new SoapParam($soapstruct, "inputStruct"));
?&gt;

### Ver también

    - [SoapClient::__soapCall()](#soapclient.soapcall) - Realiza una llamada SOAP

    - [SoapParam::__construct()](#soapparam.construct) - Constructor SoapParam

## Tabla de contenidos

- [SoapVar::\_\_construct](#soapvar.construct) — Constructor de SoapVar

- [Introducción](#intro.soap)
- [Instalación/Configuración](#soap.setup)<li>[Requerimientos](#soap.requirements)
- [Instalación](#soap.installation)
- [Configuración en tiempo de ejecución](#soap.configuration)
  </li>- [Constantes predefinidas](#soap.constants)
- [Funciones de SOAP](#ref.soap)<li>[is_soap_fault](#function.is-soap-fault) — Verifica si SOAP devuelve un error
- [use_soap_error_handler](#function.use-soap-error-handler) — Activa el gestor de errores SOAP nativo
  </li>- [SoapClient](#class.soapclient) — La classe SoapClient<li>[SoapClient::__call](#soapclient.call) — Llamada a una función SOAP (obsoleta)
- [SoapClient::\_\_construct](#soapclient.construct) — Constructor SoapClient
- [SoapClient::\_\_doRequest](#soapclient.dorequest) — Ejecuta una solicitud SOAP
- [SoapClient::\_\_getCookies](#soapclient.getcookies) — Devuelve la lista de cookies
- [SoapClient::\_\_getFunctions](#soapclient.getfunctions) — Retorna una lista de funciones SOAP publicadas
- [SoapClient::\_\_getLastRequest](#soapclient.getlastrequest) — Devuelve la última petición SOAP
- [SoapClient::\_\_getLastRequestHeaders](#soapclient.getlastrequestheaders) — Devuelve los encabezados de la última petición SOAP
- [SoapClient::\_\_getLastResponse](#soapclient.getlastresponse) — Devuelve la última respuesta SOAP
- [SoapClient::\_\_getLastResponseHeaders](#soapclient.getlastresponseheaders) — Retorna los encabezados de la última respuesta SOAP
- [SoapClient::\_\_getTypes](#soapclient.gettypes) — Devuelve una lista de tipos SOAP
- [SoapClient::\_\_setCookie](#soapclient.setcookie) — Define un cookie para las peticiones SOAP
- [SoapClient::\_\_setLocation](#soapclient.setlocation) — Configura la URL del servicio web a utilizar
- [SoapClient::\_\_setSoapHeaders](#soapclient.setsoapheaders) — Añade un encabezado SOAP para las peticiones siguientes
- [SoapClient::\_\_soapCall](#soapclient.soapcall) — Realiza una llamada SOAP
  </li>- [SoapServer](#class.soapserver) — La clase SoapServer<li>[SoapServer::addFunction](#soapserver.addfunction) — Añade una o varias funciones que gestionarán las peticiones SOAP
- [SoapServer::addSoapHeader](#soapserver.addsoapheader) — Añade un encabezado SOAP a una respuesta
- [SoapServer::\_\_construct](#soapserver.construct) — Constructor de SoapServer
- [SoapServer::fault](#soapserver.fault) — Emitir un error SoapServer
- [SoapServer::getFunctions](#soapserver.getfunctions) — Devuelve la lista de funciones definidas
- [SoapServer::\_\_getLastResponse](#soapserver.getlastresponse) — Devuelve la última respuesta SOAP
- [SoapServer::handle](#soapserver.handle) — Procesa una solicitud SOAP
- [SoapServer::setClass](#soapserver.setclass) — Configura la clase que será utilizada para gestionar las peticiones SOAP
- [SoapServer::setObject](#soapserver.setobject) — Configura el objeto que será utilizado para gestionar las peticiones SOAP
- [SoapServer::setPersistence](#soapserver.setpersistence) — Activa el modo persistente de SoapServer
  </li>- [SoapFault](#class.soapfault) — La clase SoapFault<li>[SoapFault::__construct](#soapfault.construct) — Constructor de SoapFault
- [SoapFault::\_\_toString](#soapfault.tostring) — Produce una representación en string de un objeto SoapFault
  </li>- [SoapHeader](#class.soapheader) — La clase SoapHeader<li>[SoapHeader::__construct](#soapheader.construct) — Constructor SoapHeader
  </li>- [SoapParam](#class.soapparam) — La clase SoapParam<li>[SoapParam::__construct](#soapparam.construct) — Constructor SoapParam
  </li>- [SoapVar](#class.soapvar) — La clase SoapVar<li>[SoapVar::__construct](#soapvar.construct) — Constructor de SoapVar
  </li>
