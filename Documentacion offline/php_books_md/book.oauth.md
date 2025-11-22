# OAuth

# Introducción

Esta extensión proporciona un cliente y un proveedor de servicio OAuth 1.0a. OAuth es un protocolo de autorización
que se construye sobre HTTP, y que permite a las aplicaciones asegurar
el acceso a los datos sin tener que almacenar nombres de usuario y contraseñas.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#oauth.requirements)
- [Instalación](#oauth.installation)

    ## Requerimientos

    PECL/oauth requiere PHP 5.1 o una versión más reciente, así como las extensiones
    ext/hash y ext/pcre.

    PECL/oauth puede también requerir la biblioteca libcurl
    si fue seleccionada durante la compilación. En tal caso, PECL/oauth debe también ser compilado con
    soporte HTTPS.

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pear.php.net/package/oauth](https://pear.php.net/package/oauth)

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

La mayoría de estas constantes implican problemas descritos en la documentación
oficial de [» informe de problemas](http://wiki.oauth.net/ProblemReporting)
de OAuth. Tenga en cuenta, sin embargo, que los nombres de las constantes son específicos de PHP, a pesar
del hecho de que el esquema de nomenclatura es similar.

     **[OAUTH_SIG_METHOD_RSASHA1](#constant.oauth-sig-method-rsasha1)**
     ([string](#language.types.string))



      Método de firma OAuth *RSA-SHA1*.





     **[OAUTH_SIG_METHOD_HMACSHA1](#constant.oauth-sig-method-hmacsha1)**
     ([string](#language.types.string))



      Método de firma OAuth *HMAC-SHA1*.







     **[OAUTH_SIG_METHOD_HMACSHA256](#constant.oauth-sig-method-hmacsha256)**
     ([string](#language.types.string))



      Método de firma OAuth *HMAC-SHA256*.





     **[OAUTH_AUTH_TYPE_AUTHORIZATION](#constant.oauth-auth-type-authorization)**
     ([string](#language.types.string))



      Esta constante representa el encabezado Authorization.







     **[OAUTH_AUTH_TYPE_NONE](#constant.oauth-auth-type-none)**
     ([string](#language.types.string))



      Esta constante indica una petición NoAuth OAuth.







     **[OAUTH_AUTH_TYPE_URI](#constant.oauth-auth-type-uri)**
     ([string](#language.types.string))



      Esta constante representa los parámetros OAuth en el URI de la petición.







     **[OAUTH_AUTH_TYPE_FORM](#constant.oauth-auth-type-form)**
     ([string](#language.types.string))



      Esta constante representa los parámetros OAuth como parte
      del cuerpo HTTP POST.







     **[OAUTH_HTTP_METHOD_GET](#constant.oauth-http-method-get)**
     ([string](#language.types.string))



      Utiliza el método *GET* para la petición OAuth.







     **[OAUTH_HTTP_METHOD_POST](#constant.oauth-http-method-post)**
     ([string](#language.types.string))



      Utiliza el método *POST* para la petición OAuth.







     **[OAUTH_HTTP_METHOD_PUT](#constant.oauth-http-method-put)**
     ([string](#language.types.string))



      Utiliza el método *PUT* para la petición OAuth.







     **[OAUTH_HTTP_METHOD_HEAD](#constant.oauth-http-method-head)**
     ([string](#language.types.string))



      Utiliza el método *HEAD* para la petición OAuth.







     **[OAUTH_HTTP_METHOD_DELETE](#constant.oauth-http-method-delete)**
     ([string](#language.types.string))



      Utiliza el método *DELETE* para la petición OAuth.





     **[OAUTH_REQENGINE_STREAMS](#constant.oauth-reqengine-streams)**
     ([int](#language.types.integer))



      Utilizado por el método [Oauth::setRequestEngine()](#oauth.setrequestengine)
      para definir el motor de [flujos PHP](#book.stream),
      en oposición a **[OAUTH_REQENGINE_CURL](#constant.oauth-reqengine-curl)** para
      [Curl](#book.curl).





     **[OAUTH_REQENGINE_CURL](#constant.oauth-reqengine-curl)**
     ([int](#language.types.integer))



      Utilizado por el método **Oauth::setReqeustEngine()**
      para definir el motor de [Curl](#book.curl),
      en oposición a **[OAUTH_REQENGINE_STREAMS](#constant.oauth-reqengine-streams)** para
      los [flujos PHP](#book.stream).





     **[OAUTH_OK](#constant.oauth-ok)**
     ([int](#language.types.integer))



      La vida es bella.





     **[OAUTH_BAD_NONCE](#constant.oauth-bad-nonce)**
     ([int](#language.types.integer))



       El valor *oauth_nonce* ha sido utilizado para una
      petición previa, y no puede ser utilizado ahora.





     **[OAUTH_BAD_TIMESTAMP](#constant.oauth-bad-timestamp)**
     ([int](#language.types.integer))



      El valor *oauth_timestamp* no es aceptado
      por el proveedor de servicio. En este caso, la respuesta deberá también contener
      el parámetro *oauth_acceptable_timestamps*.





     **[OAUTH_CONSUMER_KEY_UNKNOWN](#constant.oauth-consumer-key-unknown)**
     ([int](#language.types.integer))



      *oauth_consumer_key* es temporalmente inaceptable
      por el proveedor de servicio. Por ejemplo, el proveedor de servicio
      sobrecarga al consumidor.





     **[OAUTH_CONSUMER_KEY_REFUSED](#constant.oauth-consumer-key-refused)**
     ([int](#language.types.integer))



      La clave del consumidor ha sido rechazada.





     **[OAUTH_INVALID_SIGNATURE](#constant.oauth-invalid-signature)**
     ([int](#language.types.integer))



      *oauth_signature* es inválida porque no coincide
      con la firma calculada por el proveedor de servicio.





     **[OAUTH_TOKEN_USED](#constant.oauth-token-used)**
     ([int](#language.types.integer))



      *oauth_token* ha sido consumido. Ya no puede ser utilizado
      porque ha sido utilizado en una o más peticiones previas.





     **[OAUTH_TOKEN_EXPIRED](#constant.oauth-token-expired)**
     ([int](#language.types.integer))



      *oauth_token* ha expirado.





     **[OAUTH_TOKEN_REVOKED](#constant.oauth-token-revoked)**
     ([int](#language.types.integer))



      *oauth_token* ha sido revocado y no será aceptado.





     **[OAUTH_TOKEN_REJECTED](#constant.oauth-token-rejected)**
     ([int](#language.types.integer))



      *oauth_token* no ha sido aceptado por el proveedor de
      servicio. La razón es desconocida, pero podría ser que el token nunca
      haya sido utilizado, ya haya sido consumido, haya expirado y/o haya sido olvidado por el
      proveedor de servicio.





     **[OAUTH_VERIFIER_INVALID](#constant.oauth-verifier-invalid)**
     ([int](#language.types.integer))



      *oauth_verifier* es incorrecto.





     **[OAUTH_PARAMETER_ABSENT](#constant.oauth-parameter-absent)**
     ([int](#language.types.integer))



      Un parámetro requerido no ha sido recibido. En este caso, la respuesta deberá también
      contener el parámetro *oauth_parameters_absent*.





     **[OAUTH_SIGNATURE_METHOD_REJECTED](#constant.oauth-signature-method-rejected)**
     ([int](#language.types.integer))



      *oauth_signature_method* no ha sido aceptado por el proveedor
      de servicio.


# Ejemplos

## Tabla de contenidos

- [FireEagle](#oauth.examples.fireeagle)

    ## FireEagle

&lt;?php
$req_url = 'https://fireeagle.yahooapis.com/oauth/request_token';
$authurl = 'https://fireeagle.yahoo.net/oauth/authorize';
$acc_url = 'https://fireeagle.yahooapis.com/oauth/access_token';
$api_url = 'https://fireeagle.yahooapis.com/api/0.1';
$conskey = 'your_consumer_key';
$conssec = 'your_consumer_secret';

session_start();

// En state=1 la siguiente solicitud debe incluir un oauth_token.
// Si no vuelve a 0 (cero)
if(!isset($_GET['oauth_token']) &amp;&amp; $_SESSION['state']==1) $_SESSION['state'] = 0;
try {
  $oauth = new OAuth($conskey,$conssec,OAUTH_SIG_METHOD_HMACSHA1,OAUTH_AUTH_TYPE_URI);
  $oauth-&gt;enableDebug();
  if(!isset($\_GET['oauth_token']) &amp;&amp; !$_SESSION['state']) {
    $request_token_info = $oauth-&gt;getRequestToken($req_url);
$_SESSION['secret'] = $request_token_info['oauth_token_secret'];
    $_SESSION['state'] = 1;
    header('Location: '.$authurl.'?oauth_token='.$request_token_info['oauth_token']);
    exit;
  } else if($\_SESSION['state']==1) {
$oauth-&gt;setToken($\_GET['oauth_token'],$_SESSION['secret']);
    $access_token_info = $oauth-&gt;getAccessToken($acc_url);
$_SESSION['state'] = 2;
    $_SESSION['token'] = $access_token_info['oauth_token'];
    $_SESSION['secret'] = $access_token_info['oauth_token_secret'];
  }
  $oauth-&gt;setToken($\_SESSION['token'],$_SESSION['secret']);
  $oauth-&gt;fetch("$api_url/user.json");
$json = json_decode($oauth-&gt;getLastResponse());
print_r($json);
} catch(OAuthException $E) {
  print_r($E);
}
?&gt;

# Funciones de OAuth

# oauth_get_sbs

(PECL OAuth &gt;=0.99.7)

oauth_get_sbs — Genera una cadena de firma base

### Descripción

**oauth_get_sbs**([string](#language.types.string) $http_method, [string](#language.types.string) $uri, [array](#language.types.array) $request_parameters = ?): [string](#language.types.string)

Genera un string de firma base con PECL/OAuth.

### Parámetros

     http_method


       El método HTTP.






     uri


       La URI a códificar.






     request_parameters


       Array de parámetros de petición.





### Valores devueltos

Devuelve el string de firma base.

# oauth_urlencode

(PECL OAuth &gt;=0.99.2)

oauth_urlencode — Códifica una URI a RFC 3986

### Descripción

**oauth_urlencode**([string](#language.types.string) $uri): [string](#language.types.string)

Códifica una URI a [» RFC 3986](https://datatracker.ietf.org/doc/html/rfc3986).

### Parámetros

     uri


       URI a codificar.





### Valores devueltos

Returns an [» RFC 3986](https://datatracker.ietf.org/doc/html/rfc3986) encoded string.

## Tabla de contenidos

- [oauth_get_sbs](#function.oauth-get-sbs) — Genera una cadena de firma base
- [oauth_urlencode](#function.oauth-urlencode) — Códifica una URI a RFC 3986

# La clase [OAuth](#class.oauth)

(PECL OAuth &gt;= 0.99.1)

## Introducción

    La extensión OAuth proporciona una interfaz simple para interactuar con
    proveedores de datos, utilizando las especificaciones HTTP OAuth
    para proteger los recursos.

## Sinopsis de la Clase

    ****




      class **OAuth**

     {


    /* Propiedades */

     public
      [$debug](#oauth.props.debug);

    public
      [$sslChecks](#oauth.props.sslchecks);

    public
      [$debugInfo](#oauth.props.debuginfo);


    /* Métodos */

public [\_\_construct](#oauth.construct)(
    [string](#language.types.string) $consumer_key,
    [string](#language.types.string) $consumer_secret,
    [string](#language.types.string) $signature_method = **[OAUTH_SIG_METHOD_HMACSHA1](#constant.oauth-sig-method-hmacsha1)**,
    [int](#language.types.integer) $auth_type = 0
)

    public [__destruct](#oauth.destruct)(): [void](language.types.void.html)

public [disableDebug](#oauth.disabledebug)(): [bool](#language.types.boolean)
public [disableRedirects](#oauth.disableredirects)(): [bool](#language.types.boolean)
public [disableSSLChecks](#oauth.disablesslchecks)(): [bool](#language.types.boolean)
public [enableDebug](#oauth.enabledebug)(): [bool](#language.types.boolean)
public [enableRedirects](#oauth.enableredirects)(): [bool](#language.types.boolean)
public [enableSSLChecks](#oauth.enablesslchecks)(): [bool](#language.types.boolean)
public [fetch](#oauth.fetch)(
    [string](#language.types.string) $protected_resource_url,
    [array](#language.types.array) $extra_parameters = ?,
    [string](#language.types.string) $http_method = ?,
    [array](#language.types.array) $http_headers = ?
): [mixed](#language.types.mixed)
public [generateSignature](#oauth.generatesignature)([string](#language.types.string) $http_method, [string](#language.types.string) $url, [mixed](#language.types.mixed) $extra_parameters = ?): [string](#language.types.string)|[false](#language.types.singleton)
public [getAccessToken](#oauth.getaccesstoken)(
    [string](#language.types.string) $access_token_url,
    [string](#language.types.string) $auth_session_handle = ?,
    [string](#language.types.string) $verifier_token = ?,
    [string](#language.types.string) $http_method = ?
): [array](#language.types.array)
public [getCAPath](#oauth.getcapath)(): [array](#language.types.array)
public [getLastResponse](#oauth.getlastresponse)(): [string](#language.types.string)
public [getLastResponseHeaders](#oauth.getlastresponseheaders)(): [string](#language.types.string)|[false](#language.types.singleton)
public [getLastResponseInfo](#oauth.getlastresponseinfo)(): [array](#language.types.array)
public [getRequestHeader](#oauth.getrequestheader)([string](#language.types.string) $http_method, [string](#language.types.string) $url, [mixed](#language.types.mixed) $extra_parameters = ?): [string](#language.types.string)|[false](#language.types.singleton)
public [getRequestToken](#oauth.getrequesttoken)([string](#language.types.string) $request_token_url, [string](#language.types.string) $callback_url = ?, [string](#language.types.string) $http_method = ?): [array](#language.types.array)
public [setAuthType](#oauth.setauthtype)([int](#language.types.integer) $auth_type): [bool](#language.types.boolean)
public [setCAPath](#oauth.setcapath)([string](#language.types.string) $ca_path = ?, [string](#language.types.string) $ca_info = ?): [mixed](#language.types.mixed)
public [setNonce](#oauth.setnonce)([string](#language.types.string) $nonce): [mixed](#language.types.mixed)
public [setRequestEngine](#oauth.setrequestengine)([int](#language.types.integer) $reqengine): [void](language.types.void.html)
public [setRSACertificate](#oauth.setrsacertificate)([string](#language.types.string) $cert): [mixed](#language.types.mixed)
public [setSSLChecks](#oauth.setsslchecks)([int](#language.types.integer) $sslcheck): [bool](#language.types.boolean)
public [setTimestamp](#oauth.settimestamp)([string](#language.types.string) $timestamp): [mixed](#language.types.mixed)
public [setToken](#oauth.settoken)([string](#language.types.string) $token, [string](#language.types.string) $token_secret): [bool](#language.types.boolean)
public [setVersion](#oauth.setversion)([string](#language.types.string) $version): [bool](#language.types.boolean)

}

## Propiedades

     debug







     sslChecks







     debugInfo






# OAuth::\_\_construct

(PECL OAuth &gt;= 0.99.1)

OAuth::\_\_construct — Crea un nuevo objeto OAuth

### Descripción

public **OAuth::\_\_construct**(
    [string](#language.types.string) $consumer_key,
    [string](#language.types.string) $consumer_secret,
    [string](#language.types.string) $signature_method = **[OAUTH_SIG_METHOD_HMACSHA1](#constant.oauth-sig-method-hmacsha1)**,
    [int](#language.types.integer) $auth_type = 0
)

Crea un nuevo objeto OAuth.

### Parámetros

     consumer_key


       La clave de consumidor proporcionada por el proveedor de servicios.






     consumer_secret


       El secreto de consumidor proporcionado por el proveedor de servicios.






     signature_method


       Este parámetro opcional define el método de firma utilizado.
       Por omisión, es **[OAUTH_SIG_METHOD_HMACSHA1](#constant.oauth-sig-method-hmacsha1)** (HMAC-SHA1).






     auth_type


       Este parámetro opcional define el método de paso de los
       parámetros OAuth al proveedor de servicios. Por omisión, es
       **[OAUTH_AUTH_TYPE_AUTHORIZATION](#constant.oauth-auth-type-authorization)** (en el encabezado
       Authorization).





# OAuth::\_\_destruct

(PECL OAuth &gt;= 0.99.9)

OAuth::\_\_destruct — El destructor

### Descripción

public **OAuth::\_\_destruct**(): [void](language.types.void.html)

El destructor.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [OAuth::\_\_construct()](#oauth.construct) - Crea un nuevo objeto OAuth

# OAuth::disableDebug

(PECL OAuth &gt;= 0.99.3)

OAuth::disableDebug — Desactiva los mensajes de depuración

### Descripción

public **OAuth::disableDebug**(): [bool](#language.types.boolean)

Desactiva los mensajes de depuración. Se encuentra desactivado por omisión.
Puede definirse la propiedad [debug](#oauth.props.debug)
a **[false](#constant.false)** para desactivar la depuración.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)**

### Historial de cambios

       Versión
       Descripción






       PECL oauth 0.99.8

        Se ha añadido la propiedad [debug](#oauth.props.debug)





### Ver también

    - [OAuth::enableDebug()](#oauth.enabledebug) - Activa los mensajes de depuración

# OAuth::disableRedirects

(PECL OAuth &gt;= 0.99.9)

OAuth::disableRedirects — Desactiva las redirecciones

### Descripción

public **OAuth::disableRedirects**(): [bool](#language.types.boolean)

Desactiva las redirecciones automáticas, permitiendo que la petición sea manualmente redirigida.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)**

### Ver también

- [OAuth::enableRedirects()](#oauth.enableredirects) - Activa las re-direcciones

# OAuth::disableSSLChecks

(PECL OAuth &gt;= 0.99.5)

OAuth::disableSSLChecks — Desactiva la verificación SSL

### Descripción

public **OAuth::disableSSLChecks**(): [bool](#language.types.boolean)

Desactiva las verificaciones de certificados y de hosts SSL (activado por omisión).
Se recomienda no utilizar esta función en producción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)**

### Historial de cambios

       Versión
       Descripción






       PECL oauth 0.99.8

        Se ha añadido la propiedad debug





### Ver también

    - [OAuth::enableSSLChecks()](#oauth.enablesslchecks) - Activa la verificación SSL

# OAuth::enableDebug

(PECL OAuth &gt;= 0.99.3)

OAuth::enableDebug — Activa los mensajes de depuración

### Descripción

public **OAuth::enableDebug**(): [bool](#language.types.boolean)

Activa los mensajes de depuración, útiles en desarrollo, pero
innecesarios en producción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)**

### Historial de cambios

       Versión
       Descripción






       PECL oauth 0.99.8

        Se añadió la propiedad debug





### Ver también

    - [OAuth::disableDebug()](#oauth.disabledebug) - Desactiva los mensajes de depuración

# OAuth::enableRedirects

(PECL OAuth &gt;= 0.99.9)

OAuth::enableRedirects — Activa las re-direcciones

### Descripción

public **OAuth::enableRedirects**(): [bool](#language.types.boolean)

Sigue y firma las re-direcciones automáticamente, el cual está en activado por omisión.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)**

### Ver también

- [OAuth::disableRedirects()](#oauth.disableredirects) - Desactiva las redirecciones

# OAuth::enableSSLChecks

(PECL OAuth &gt;= 0.99.5)

OAuth::enableSSLChecks — Activa la verificación SSL

### Descripción

public **OAuth::enableSSLChecks**(): [bool](#language.types.boolean)

Activa las verificaciones de certificados y de hosts SSL (activado por omisión).
Alternativamente, la propiedad [sslChecks](#oauth.props.sslchecks) puede ser definida sobre
un valor diferente de **[false](#constant.false)** para activar las verificaciones SSL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)**

### Historial de cambios

       Versión
       Descripción






       PECL oauth 0.99.8

        La propiedad debug ha sido añadida





### Ver también

    - [OAuth::disableSSLChecks()](#oauth.disablesslchecks) - Desactiva la verificación SSL

# OAuth::fetch

(PECL OAuth &gt;= 0.99.1)

OAuth::fetch — Lee un recurso protegido por OAuth

### Descripción

public **OAuth::fetch**(
    [string](#language.types.string) $protected_resource_url,
    [array](#language.types.array) $extra_parameters = ?,
    [string](#language.types.string) $http_method = ?,
    [array](#language.types.array) $http_headers = ?
): [mixed](#language.types.mixed)

Lee un recurso protegido por OAuth.

### Parámetros

     protected_resource_url


       URL del recurso protegido por OAuth.






     extra_parameters


       Argumentos adicionales a enviar con la petición, al recurso.






     http_method


       Una de las constantes [OAUTH constants](#oauth.constants)
       **[OAUTH_HTTP_METHOD_*](#constant.oauth-http-method-get)**, incluyendo
       GET, POST, PUT, HEAD, o DELETE.




       HEAD (**[OAUTH_HTTP_METHOD_HEAD](#constant.oauth-http-method-head)**) puede ser útil
       para descubrir información antes de la petición (si las autorizaciones
       OAuth están en el encabezado Authorization).






     http_headers


       Los encabezados HTTP del cliente (tales como User-Agent,
       Accept, etc.)





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL oauth 1.0.0

        Antes de esta versión, **[null](#constant.null)** era devuelto en lugar de **[false](#constant.false)**.




       PECL oauth 0.99.5

        Se añadió el argumento http_method




       PECL oauth 0.99.8

        Se añadió el argumento http_headers





### Ejemplos

    **Ejemplo #1 Ejemplo con OAuth::fetch()**

&lt;?php
try {
$oauth = new OAuth("consumer_key","consumer_secret",OAUTH_SIG_METHOD_HMACSHA1,OAUTH_AUTH_TYPE_AUTHORIZATION);
$oauth-&gt;setToken("access_token","access_token_secret");

    $oauth-&gt;fetch("http://photos.example.net/photo?file=vacation.jpg");

    $response_info = $oauth-&gt;getLastResponseInfo();
    header("Content-Type: {$response_info["content_type"]}");
    echo $oauth-&gt;getLastResponse();

} catch(OAuthException $E) {
echo "Exception caught!\n";
echo "Response: ". $E-&gt;lastResponse . "\n";
}
?&gt;

### Ver también

    - [OAuth::getLastResponse()](#oauth.getlastresponse) - Obtiene la última respuesta

    - [OAuth::getLastResponseInfo()](#oauth.getlastresponseinfo) - Obtiene la información HTTP sobre la última respuesta

    - [OAuth::setToken()](#oauth.settoken) - Establece el token y el secreto

# OAuth::generateSignature

(No version information available, might only be in Git)

OAuth::generateSignature — Genera una firma

### Descripción

public **OAuth::generateSignature**([string](#language.types.string) $http_method, [string](#language.types.string) $url, [mixed](#language.types.mixed) $extra_parameters = ?): [string](#language.types.string)|[false](#language.types.singleton)

Genera una firma basada en el método HTTP final,
la URL y una cadena/array de parámetros.

### Parámetros

    http_method


      Método HTTP para la petición.






    url


      URL de la petición.






    extra_parameters


      Cadena o array de parámetros adicionales.


### Valores devueltos

Una cadena que contiene la firma generada o **[false](#constant.false)** si ocurre un error

# OAuth::getAccessToken

(PECL OAuth &gt;= 0.99.1)

OAuth::getAccessToken — Recupera un token de acceso

### Descripción

public **OAuth::getAccessToken**(
    [string](#language.types.string) $access_token_url,
    [string](#language.types.string) $auth_session_handle = ?,
    [string](#language.types.string) $verifier_token = ?,
    [string](#language.types.string) $http_method = ?
): [array](#language.types.array)

Lee un token de acceso, un secreto y cualquier información adicional en
un proveedor de servicios.

### Parámetros

     access_token_url


       La URL a utilizar.






     auth_session_handle


       El identificador de sesión. Este parámetro no existe
       en las especificaciones OAuth 1.0, pero puede ser implementado
       por grandes implementaciones. Véase
       [» ScalableOAuth](http://oauth.pbwiki.com/ScalableOAuth/)
       para más detalles.






     verifier_token


       Para los proveedores de servicio que soportan 1.0a,
       el parámetro verifier_token debe ser
       proporcionado, al intercambiar el token de solicitud para obtener el token
       de acceso. Si verifier_token está presente en
       $_GET o $_POST, es
       automáticamente pasado y el llamante no necesita especificar
       el parámetro verifier_token (generalmente, el token
       de acceso es intercambiado vía la URL de devolución callback_url).
       Véase [» ScalableOAuth](http://oauth.pbwiki.com/ScalableOAuth/)
       para más información.






     http_method


       Método HTTP a utilizar, por ejemplo
       GET o POST.





### Valores devueltos

Devuelve un array que contiene la respuesta OAuth analizada, en caso de éxito,
y **[false](#constant.false)** en caso contrario.

### Historial de cambios

       Versión
       Descripción






       PECL oauth 1.0.0

        Antes de esta versión, **[null](#constant.null)** era devuelto en lugar de **[false](#constant.false)**.




       PECL oauth 0.99.9

        Se añadió el parámetro verifier_token





### Ejemplos

    **Ejemplo #1 Ejemplo con OAuth::getAccessToken()**

&lt;?php
try {
$oauth = new OAuth(OAUTH_CONSUMER_KEY,OAUTH_CONSUMER_SECRET);
    $oauth-&gt;setToken($request_token,$request_token_secret);
    $access_token_info = $oauth-&gt;getAccessToken("https://example.com/oauth/access_token");
    if(!empty($access_token_info)) {
print_r($access_token_info);
} else {
print "Error al obtener el token de acceso, la respuesta fue: " . $oauth-&gt;getLastResponse();
}
} catch(OAuthException $E) {
echo "Respuesta: ". $E-&gt;lastResponse . "\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[oauth_token] =&gt; some_token
[oauth_token_secret] =&gt; some_token_secret
)

### Ver también

    - [OAuth::getLastResponse()](#oauth.getlastresponse) - Obtiene la última respuesta

    - [OAuth::getLastResponseInfo()](#oauth.getlastresponseinfo) - Obtiene la información HTTP sobre la última respuesta

    - [OAuth::setToken()](#oauth.settoken) - Establece el token y el secreto

# OAuth::getCAPath

(PECL OAuth &gt;= 0.99.8)

OAuth::getCAPath — Obtiene la información CA

### Descripción

public **OAuth::getCAPath**(): [array](#language.types.array)

Obtiene la información del certificado de Autoridad, el cual incluye los
ca_path y ca_info establecidos por [OAuth::setCaPath()](#oauth.setcapath).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [array](#language.types.array) con información del Certificado de Autoridad, específicamente como claves
ca_path y ca_info dentro del array asociativo devuelto.

### Ver también

- [OAuth::setCAPath()](#oauth.setcapath) - Define el camino y la información de la CA

- [OAuth::getLastResponseInfo()](#oauth.getlastresponseinfo) - Obtiene la información HTTP sobre la última respuesta

# OAuth::getLastResponse

(PECL OAuth &gt;= 0.99.1)

OAuth::getLastResponse — Obtiene la última respuesta

### Descripción

public **OAuth::getLastResponse**(): [string](#language.types.string)

Obtiene la respuesta original de la más reciente petición.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la cadena conteniendo la última respuesta.

### Ver también

    - [OAuth::getLastResponseInfo()](#oauth.getlastresponseinfo) - Obtiene la información HTTP sobre la última respuesta

    - [OAuth::fetch()](#oauth.fetch) - Lee un recurso protegido por OAuth

# OAuth::getLastResponseHeaders

(No version information available, might only be in Git)

OAuth::getLastResponseHeaders — Recupera los encabezados de la última respuesta

### Descripción

public **OAuth::getLastResponseHeaders**(): [string](#language.types.string)|[false](#language.types.singleton)

Recupera los encabezados de la última respuesta.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [string](#language.types.string) que contiene los encabezados de la última
respuesta o **[false](#constant.false)** si ocurre un error

# OAuth::getLastResponseInfo

(PECL OAuth &gt;= 0.99.1)

OAuth::getLastResponseInfo — Obtiene la información HTTP sobre la última respuesta

### Descripción

public **OAuth::getLastResponseInfo**(): [array](#language.types.array)

Obtiene la información HTTP sobre la última respuesta.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array conteniendo la información de respuesta de la última petición. Constantes de [curl_getinfo()](#function.curl-getinfo) pueden ser usadas.

### Ver también

    - [OAuth::fetch()](#oauth.fetch) - Lee un recurso protegido por OAuth

    - [OAuth::getLastResponse()](#oauth.getlastresponse) - Obtiene la última respuesta

# OAuth::getRequestHeader

(No version information available, might only be in Git)

OAuth::getRequestHeader — Genera una firma de encabezado OAuth

### Descripción

public **OAuth::getRequestHeader**([string](#language.types.string) $http_method, [string](#language.types.string) $url, [mixed](#language.types.mixed) $extra_parameters = ?): [string](#language.types.string)|[false](#language.types.singleton)

Genera una firma de encabezado OAuth basada en el método HTTP
final, así como en la URL y sus parámetros.

### Parámetros

    http_method


      Método HTTP para la petición.






    url


      URL de la petición.






    extra_parameters


      Parámetros adicionales ([string](#language.types.string) o array).


### Valores devueltos

Un [string](#language.types.string) que contiene el encabezado generado de la petición
o **[false](#constant.false)** si ocurre un error

# OAuth::getRequestToken

(PECL OAuth &gt;= 0.99.1)

OAuth::getRequestToken — Lee el token de solicitud

### Descripción

public **OAuth::getRequestToken**([string](#language.types.string) $request_token_url, [string](#language.types.string) $callback_url = ?, [string](#language.types.string) $http_method = ?): [array](#language.types.array)

Lee el token de solicitud, el secreto y cualquier información adicional
del proveedor de servicios.

### Parámetros

     request_token_url


       La URL de la que se debe obtener el token.






     callback_url


       URL de devolución de llamada OAuth. Si callback_url es pasado
       y su valor es vacío, entonces toma el valor de
       "oob" para cumplir con los requisitos de
       OAuth 2009.1 advisory.






     http_method


       Método HTTP a utilizar, por ejemplo
       GET o POST.





### Valores devueltos

Devuelve un array que contiene la respuesta OAuth analizada, en caso de éxito,
o **[false](#constant.false)** en caso de fallo.

### Historial de cambios

       Versión
       Descripción






       PECL oauth 1.0.0

        Antes de esta versión, **[null](#constant.null)** era devuelto en lugar de **[false](#constant.false)**.




       PECL oauth 0.99.9

        Se ha añadido el parámetro callback_url





### Ejemplos

    **Ejemplo #1 Ejemplo con OAuth::getRequestToken()**

&lt;?php
try {
$oauth = new OAuth(OAUTH_CONSUMER_KEY,OAUTH_CONSUMER_SECRET);
    $request_token_info = $oauth-&gt;getRequestToken("https://example.com/oauth/request_token");
    if(!empty($request_token_info)) {
print_r($request_token_info);
} else {
print "Failed fetching request token, response was: " . $oauth-&gt;getLastResponse();
}
} catch(OAuthException $E) {
echo "Response: ". $E-&gt;lastResponse . "\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[oauth_token] =&gt; some_token
[oauth_token_secret] =&gt; some_token_secret
)

### Ver también

    - [OAuth::getLastResponse()](#oauth.getlastresponse) - Obtiene la última respuesta

    - [OAuth::getLastResponseInfo()](#oauth.getlastresponseinfo) - Obtiene la información HTTP sobre la última respuesta

# OAuth::setAuthType

(PECL OAuth &gt;= 0.99.1)

OAuth::setAuthType — Define el tipo de autorización

### Descripción

public **OAuth::setAuthType**([int](#language.types.integer) $auth_type): [bool](#language.types.boolean)

Configura los parámetros OAuth.

### Parámetros

     auth_type


        auth_type puede ser una de las siguientes opciones
        (clasificadas por orden decreciente de preferencia,
        como se especifica en la sección 5.2 de OAuth 1.0) :




          **[OAUTH_AUTH_TYPE_AUTHORIZATION](#constant.oauth-auth-type-authorization)**


           Pasa los parámetros OAuth en el encabezado HTTP Authorization.




         **[OAUTH_AUTH_TYPE_FORM](#constant.oauth-auth-type-form)**


           Añade los parámetros OAuth al cuerpo de la petición HTTP POST.




         **[OAUTH_AUTH_TYPE_URI](#constant.oauth-auth-type-uri)**


           Añade los parámetros OAuth a la URI.




         **[OAUTH_AUTH_TYPE_NONE](#constant.oauth-auth-type-none)**


           Ninguno.







### Valores devueltos

Devuelve **[true](#constant.true)** si un parámetro es definido correctamente,
**[false](#constant.false)** en los demás casos.

### Historial de cambios

       Versión
       Descripción






       PECL oauth 1.0.0

        Antes de esta versión, **[null](#constant.null)** era devuelto en lugar de **[false](#constant.false)**.





# OAuth::setCAPath

(PECL OAuth &gt;= 0.99.8)

OAuth::setCAPath — Define el camino y la información de la CA

### Descripción

public **OAuth::setCAPath**([string](#language.types.string) $ca_path = ?, [string](#language.types.string) $ca_info = ?): [mixed](#language.types.mixed)

Define el certificado de autoridad (CA), tanto para
el camino como para la información.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    ca_path


      El camino de la CA a definir.






    ca_info


      La información de la CA a definir.


### Valores devueltos

Retorna **[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** si ca_path
o ca_info son considerados inválidos.

### Historial de cambios

       Versión
       Descripción






       PECL oauth 1.0.0

        Antes de esta versión, **[null](#constant.null)** era devuelto en lugar de **[false](#constant.false)**.





### Ver también

- [OAuth::getCaPath()](#oauth.getcapath) - Obtiene la información CA

# OAuth::setNonce

(PECL OAuth &gt;= 0.99.1)

OAuth::setNonce — Configura el nonce OAuth

### Descripción

public **OAuth::setNonce**([string](#language.types.string) $nonce): [mixed](#language.types.mixed)

Configura el nonce OAuth para las llamadas siguientes.

### Parámetros

     nonce


       El valor de oauth_nonce.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** si el
argumento nonce es considerado
inválido.

### Historial de cambios

       Versión
       Descripción






       PECL oauth 1.0.0

        Antes de esta versión, **[null](#constant.null)** era devuelto en lugar de **[false](#constant.false)**.





### Ver también

    - [OAuth::setToken()](#oauth.settoken) - Establece el token y el secreto

    - [OAuth::setAuthType()](#oauth.setauthtype) - Define el tipo de autorización

    - [OAuth::setVersion()](#oauth.setversion) - Configura la versión OAuth

# OAuth::setRequestEngine

(PECL OAuth &gt;= 1.0.0)

OAuth::setRequestEngine — El propósito de setRequestEngine

### Descripción

public **OAuth::setRequestEngine**([int](#language.types.integer) $reqengine): [void](language.types.void.html)

Establece el motor de peticiones, que estará enviando las peticiones HTTP.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    reqengine


      El motor de peticiones deseado. Poner a **[OAUTH_REQENGINE_STREAMS](#constant.oauth-reqengine-streams)**
      para usar el Stream PHP, o **[OAUTH_REQENGINE_CURL](#constant.oauth-reqengine-curl)** para usar
      [Curl](#book.curl).


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Emite una excepción [OAuthException](#class.oauthexception) si un motor de peticiones inválido es
escogido.

### Ejemplos

**Ejemplo #1 Ejemplo de OAuth::setRequestEngine()**

&lt;?php
$consumer = new OAuth();

$consumer-&gt;setRequestEngine(OAUTH_REQENGINE_STREAMS);
?&gt;

### Ver también

- [Curl](#book.curl)

- [PHP streams](#book.stream)

- [OAuthException](#class.oauthexception)

# OAuth::setRSACertificate

(PECL OAuth &gt;= 1.0.0)

OAuth::setRSACertificate — Define el certificado RSA

### Descripción

public **OAuth::setRSACertificate**([string](#language.types.string) $cert): [mixed](#language.types.mixed)

Define el certificado RSA.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    cert


      El certificado RSA.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** si ocurre un error
(es decir, el certificado RSA no puede ser analizado).

### Historial de cambios

       Versión
       Descripción






       PECL oauth 1.0.0

        Antes de esta versión, **[null](#constant.null)** era devuelto en lugar de **[false](#constant.false)**.





### Ejemplos

**Ejemplo #1 Ejemplo con OAuth::setRsaCertificate()**

&lt;?php
$consume = new OAuth('1234', '', OAUTH_SIG_METHOD_RSASHA1);

$consume-&gt;setRSACertificate(file_get_contents('test.pem'));
?&gt;

### Ver también

- [OAuth::setCaPath()](#oauth.setcapath) - Define el camino y la información de la CA

# OAuth::setSSLChecks

(No version information available, might only be in Git)

OAuth::setSSLChecks — Ajustar controles específicos de SSL para las solicitudes

### Descripción

public **OAuth::setSSLChecks**([int](#language.types.integer) $sslcheck): [bool](#language.types.boolean)

Ajusta controles específicos de SSL para las solicitudes.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    sslcheck





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# OAuth::setTimestamp

(PECL OAuth &gt;= 1.0.0)

OAuth::setTimestamp — Define el timestamp

### Descripción

public **OAuth::setTimestamp**([string](#language.types.string) $timestamp): [mixed](#language.types.mixed)

Define el timestamp OAuth para las próximas peticiones.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    timestamp


      El timestamp.


### Valores devueltos

Retorna **[true](#constant.true)**, o **[false](#constant.false)** si timestamp es inválido.

### Historial de cambios

       Versión
       Descripción






       PECL oauth 1.0.0

        Antes de esta versión, **[null](#constant.null)** era devuelto en lugar de **[false](#constant.false)**.





### Ver también

- [OAuth::setNonce()](#oauth.setnonce) - Configura el nonce OAuth

# OAuth::setToken

(PECL OAuth &gt;= 0.99.1)

OAuth::setToken — Establece el token y el secreto

### Descripción

public **OAuth::setToken**([string](#language.types.string) $token, [string](#language.types.string) $token_secret): [bool](#language.types.boolean)

Establece el token y el secreto para las subsecuentes peticiones.

### Parámetros

     token


       El token OAuth.






     token_secret


       El secreto OAuth.





### Valores devueltos

**[true](#constant.true)**

### Ejemplos

    **Ejemplo #1 Ejemplo OAuth::setToken()**

&lt;?php
$oauth = new OAuth(OAUTH_CONSUMER_KEY,OAUTH_CONSUMER_SECRET);
$oauth-&gt;setToken("token","token-secret");
?&gt;

# OAuth::setVersion

(PECL OAuth &gt;= 0.99.1)

OAuth::setVersion — Configura la versión OAuth

### Descripción

public **OAuth::setVersion**([string](#language.types.string) $version): [bool](#language.types.boolean)

Establece la versión OAuth para las subsecuentes peticiones

### Parámetros

     version


       Versión OAuth, el valor por omisión es siempre "1.0"





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

## Tabla de contenidos

- [OAuth::\_\_construct](#oauth.construct) — Crea un nuevo objeto OAuth
- [OAuth::\_\_destruct](#oauth.destruct) — El destructor
- [OAuth::disableDebug](#oauth.disabledebug) — Desactiva los mensajes de depuración
- [OAuth::disableRedirects](#oauth.disableredirects) — Desactiva las redirecciones
- [OAuth::disableSSLChecks](#oauth.disablesslchecks) — Desactiva la verificación SSL
- [OAuth::enableDebug](#oauth.enabledebug) — Activa los mensajes de depuración
- [OAuth::enableRedirects](#oauth.enableredirects) — Activa las re-direcciones
- [OAuth::enableSSLChecks](#oauth.enablesslchecks) — Activa la verificación SSL
- [OAuth::fetch](#oauth.fetch) — Lee un recurso protegido por OAuth
- [OAuth::generateSignature](#oauth.generatesignature) — Genera una firma
- [OAuth::getAccessToken](#oauth.getaccesstoken) — Recupera un token de acceso
- [OAuth::getCAPath](#oauth.getcapath) — Obtiene la información CA
- [OAuth::getLastResponse](#oauth.getlastresponse) — Obtiene la última respuesta
- [OAuth::getLastResponseHeaders](#oauth.getlastresponseheaders) — Recupera los encabezados de la última respuesta
- [OAuth::getLastResponseInfo](#oauth.getlastresponseinfo) — Obtiene la información HTTP sobre la última respuesta
- [OAuth::getRequestHeader](#oauth.getrequestheader) — Genera una firma de encabezado OAuth
- [OAuth::getRequestToken](#oauth.getrequesttoken) — Lee el token de solicitud
- [OAuth::setAuthType](#oauth.setauthtype) — Define el tipo de autorización
- [OAuth::setCAPath](#oauth.setcapath) — Define el camino y la información de la CA
- [OAuth::setNonce](#oauth.setnonce) — Configura el nonce OAuth
- [OAuth::setRequestEngine](#oauth.setrequestengine) — El propósito de setRequestEngine
- [OAuth::setRSACertificate](#oauth.setrsacertificate) — Define el certificado RSA
- [OAuth::setSSLChecks](#oauth.setsslchecks) — Ajustar controles específicos de SSL para las solicitudes
- [OAuth::setTimestamp](#oauth.settimestamp) — Define el timestamp
- [OAuth::setToken](#oauth.settoken) — Establece el token y el secreto
- [OAuth::setVersion](#oauth.setversion) — Configura la versión OAuth

# La clase OAuthProvider

(PECL OAuth &gt;= 1.0.0)

## Introducción

    Gestiona una clase OAuthProvider.




    Consúltese también un tutorial externo denominado
    [» Escribir un servicio OAuth Provider](http://toys.lerdorf.com/archives/55-Writing-an-OAuth-Provider-Service.html),
    que proporciona un buen enfoque para ofrecer este servicio. Asimismo, existen
    [» ejemplos OAuth provider](https://svn.php.net/viewvc/pecl/oauth/trunk/examples) directamente
    en las fuentes de la extensión OAuth.

## Sinopsis de la Clase

    ****




      class **OAuthProvider**

     {


    /* Métodos */

final public [addRequiredParameter](#oauthprovider.addrequiredparameter)([string](#language.types.string) $req_params): [bool](#language.types.boolean)
public [callconsumerHandler](#oauthprovider.callconsumerhandler)(): [void](language.types.void.html)
public [callTimestampNonceHandler](#oauthprovider.calltimestampnoncehandler)(): [void](language.types.void.html)
public [calltokenHandler](#oauthprovider.calltokenhandler)(): [void](language.types.void.html)
public [checkOAuthRequest](#oauthprovider.checkoauthrequest)([string](#language.types.string) $uri = ?, [string](#language.types.string) $method = ?): [void](language.types.void.html)
public [\_\_construct](#oauthprovider.construct)([array](#language.types.array) $params_array = ?)
public [consumerHandler](#oauthprovider.consumerhandler)([callable](#language.types.callable) $callback_function): [void](language.types.void.html)
final public static [generateToken](#oauthprovider.generatetoken)([int](#language.types.integer) $size, [bool](#language.types.boolean) $strong = **[false](#constant.false)**): [string](#language.types.string)
public [is2LeggedEndpoint](#oauthprovider.is2leggedendpoint)([mixed](#language.types.mixed) $params_array): [void](language.types.void.html)
public [isRequestTokenEndpoint](#oauthprovider.isrequesttokenendpoint)([bool](#language.types.boolean) $will_issue_request_token): [void](language.types.void.html)
final public [removeRequiredParameter](#oauthprovider.removerequiredparameter)([string](#language.types.string) $req_params): [bool](#language.types.boolean)
final public static [reportProblem](#oauthprovider.reportproblem)([string](#language.types.string) $oauthexception, [bool](#language.types.boolean) $send_headers = **[true](#constant.true)**): [string](#language.types.string)
final public [setParam](#oauthprovider.setparam)([string](#language.types.string) $param_key, [mixed](#language.types.mixed) $param_val = ?): [bool](#language.types.boolean)
final public [setRequestTokenPath](#oauthprovider.setrequesttokenpath)([string](#language.types.string) $path): [bool](#language.types.boolean)
public [timestampNonceHandler](#oauthprovider.timestampnoncehandler)([callable](#language.types.callable) $callback_function): [void](language.types.void.html)
public [tokenHandler](#oauthprovider.tokenhandler)([callable](#language.types.callable) $callback_function): [void](language.types.void.html)

}

# OAuthProvider::addRequiredParameter

(PECL OAuth &gt;= 1.0.0)

OAuthProvider::addRequiredParameter — Agregar parámetros necesarios

### Descripción

final public **OAuthProvider::addRequiredParameter**([string](#language.types.string) $req_params): [bool](#language.types.boolean)

Agregar parámetros requeridos por el proveedor OAuth.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    req_params


      Los parámetros requeridos.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [OAuthProvider::removeRequiredParameter()](#oauthprovider.removerequiredparameter) - Remueve un parámetro requerido

# OAuthProvider::callconsumerHandler

(No version information available, might only be in Git)

OAuthProvider::callconsumerHandler — Llama al callback consumerNonceHandler

### Descripción

public **OAuthProvider::callconsumerHandler**(): [void](language.types.void.html)

Llama al callback del manejador del consumidor registrado, la cual es establecida
con [OAuthProvider::consumerHandler()](#oauthprovider.consumerhandler).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Emite un error **[E_ERROR](#constant.e-error)**
si la función de devolución de llamada no puede ser llamada o no ha sido especificada.

### Ver también

- [OAuthProvider::consumerHandler()](#oauthprovider.consumerhandler) - Establece el manejador callback consumerHandler

# OAuthProvider::callTimestampNonceHandler

(PECL OAuth &gt;= 1.0.0)

OAuthProvider::callTimestampNonceHandler — Llama al callback timestampNonceHandler

### Descripción

public **OAuthProvider::callTimestampNonceHandler**(): [void](language.types.void.html)

Llama a la función callback del timestamp registrado, que fue establecido
con [OAuthProvider::timestampNonceHandler()](#oauthprovider.timestampnoncehandler).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Emite un error **[E_ERROR](#constant.e-error)**
si la función de devolución de llamada no puede ser llamada o no ha sido especificada.

### Ver también

- [OAuthProvider::timestampNonceHandler()](#oauthprovider.timestampnoncehandler) - Establece el callback timestampNonceHandler

# OAuthProvider::calltokenHandler

(PECL OAuth &gt;= 1.0.0)

OAuthProvider::calltokenHandler — Llama al callback tokenNonceHandler

### Descripción

public **OAuthProvider::calltokenHandler**(): [void](language.types.void.html)

Llama a la función callback del token registrado, que fue establecido
con [OAuthProvider::tokenHandler()](#oauthprovider.tokenhandler).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Emite un error **[E_ERROR](#constant.e-error)**
si la función de devolución de llamada no puede ser llamada o no ha sido especificada.

### Ver también

- [OAuthProvider::tokenHandler()](#oauthprovider.tokenhandler) - Establece el manejador callback de tokenHandler

# OAuthProvider::checkOAuthRequest

(PECL OAuth &gt;= 1.0.0)

OAuthProvider::checkOAuthRequest — Verifica una petición OAuth

### Descripción

public **OAuthProvider::checkOAuthRequest**([string](#language.types.string) $uri = ?, [string](#language.types.string) $method = ?): [void](language.types.void.html)

Verifica una petición OAuth.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    uri


      La URI, opcional, o un punto final.






    method


      El método HTTP. Opcional; pase una constante entre las
      [constantes OAuth](#oauth.constants) **[OAUTH_HTTP_METHOD_*](#constant.oauth-http-method-get)**.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Emite un error de nivel **[E_ERROR](#constant.e-error)** si el método
HTTP no puede ser detectado.

### Ver también

- [OAuthProvider::reportProblem()](#oauthprovider.reportproblem) - Se informa sobre un problema

# OAuthProvider::\_\_construct

(PECL OAuth &gt;= 1.0.0)

OAuthProvider::\_\_construct — Construye un nuevo objeto OAuthProvider

### Descripción

public **OAuthProvider::\_\_construct**([array](#language.types.array) $params_array = ?)

Inicia un nuevo [object](#language.types.object) [OAuthProvider](#class.oauthprovider) .

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    params_array


      La configuración de estos parámetros opcionales se limita al
      [CLI SAPI](#features.commandline).


### Valores devueltos

Un [object](#language.types.object) [OAuthProvider](#class.oauthprovider) .

### Ejemplos

**Ejemplo #1 Ejemplo de OAuthProvider::\_\_construct()**

&lt;?php
try {

    $op = new OAuthProvider();

    // Usa funciones callback definidas por el usuario
    $op-&gt;consumerHandler(array($this, 'lookupConsumer'));
    $op-&gt;timestampNonceHandler(array($this, 'timestampNonceChecker'));
    $op-&gt;tokenHandler(array($this, 'myTokenHandler'));

    // Ignora el parámetro foo_uri
    $op-&gt;setParam('foo_uri', NULL);

    // No es necesario el token para este punto final
    $op-&gt;setRequestTokenPath('/v1/oauth/request_token');

    $op-&gt;checkOAuthRequest();

} catch (OAuthException $e) {

    echo OAuthProvider::reportProblem($e);

}
?&gt;

### Ver también

- [OAuthProvider::setParam()](#oauthprovider.setparam) - Establece un parámetro

# OAuthProvider::consumerHandler

(PECL OAuth &gt;= 1.0.0)

OAuthProvider::consumerHandler — Establece el manejador callback consumerHandler

### Descripción

public **OAuthProvider::consumerHandler**([callable](#language.types.callable) $callback_function): [void](language.types.void.html)

Establece el manejador callback, que más tarde será llamado con
[OAuthProvider::callConsumerHandler()](#oauthprovider.callconsumerhandler).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    callback_function


      El nombre de la función [callable](#language.types.callable).


### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo del callback OAuthProvider::consumerHandler()**

&lt;?php
function lookupConsumer($provider) {

    if ($provider-&gt;consumer_key === 'unknown') {
        return OAUTH_CONSUMER_KEY_UNKNOWN;
    } else if($provider-&gt;consumer_key == 'blacklisted' || $provider-&gt;consumer_key === 'throttled') {
        return OAUTH_CONSUMER_KEY_REFUSED;
    }

    $provider-&gt;consumer_secret = "the_consumers_secret";

    return OAUTH_OK;

}
?&gt;

### Ver también

- [OAuthProvider::callConsumerHandler()](#oauthprovider.callconsumerhandler) - Llama al callback consumerNonceHandler

# OAuthProvider::generateToken

(PECL OAuth &gt;= 1.0.0)

OAuthProvider::generateToken — Genera un token aleatorio

### Descripción

final public static **OAuthProvider::generateToken**([int](#language.types.integer) $size, [bool](#language.types.boolean) $strong = **[false](#constant.false)**): [string](#language.types.string)

Genera un [string](#language.types.string) de bytes pseudo-aleatorios.

### Parámetros

    size


      La longitud deseada del token, en bytes.






    strong


      Definido como **[true](#constant.true)**, indica que se utilizará /dev/random,
      de lo contrario, se utilizará /dev/urandom. Este parámetro es ignorado en Windows.


### Valores devueltos

El token generado, en forma de [string](#language.types.string) de bytes.

### Errores/Excepciones

Si el parámetro strong es **[true](#constant.true)**, entonces se emitirá
una advertencia de nivel **[E_WARNING](#constant.e-warning)** cuando la
función de devolución de llamada [rand()](#function.rand) se utilice para completar
los bytes aleatorios faltantes (es decir, cuando no hay suficientes datos
aleatorios inicialmente).

### Ejemplos

**Ejemplo #1 Ejemplo con OAuthProvider::generateToken()**

&lt;?php
$p = new OAuthProvider();

$t = $p-&gt;generateToken(4);

echo strlen($t),  PHP_EOL;
echo bin2hex($t), PHP_EOL;

?&gt;

Resultado del ejemplo anterior es similar a:

4
b6a82c27

### Notas

**Nota**:

    Cuando no hay suficientes datos aleatorios disponibles en el sistema,
    esta función completará los bytes faltantes utilizando la función
    interna de PHP [rand()](#function.rand).

### Ver también

- [openssl_random_pseudo_bytes()](#function.openssl-random-pseudo-bytes) - Genera una cadena pseudo-aleatoria de octetos

- [mcrypt_create_iv()](#function.mcrypt-create-iv) - Crea un vector de inicialización (IV) a partir de una fuente aleatoria

# OAuthProvider::is2LeggedEndpoint

(PECL OAuth &gt;= 1.0.0)

OAuthProvider::is2LeggedEndpoint — is2LeggedEndpoint

### Descripción

public **OAuthProvider::is2LeggedEndpoint**([mixed](#language.types.mixed) $params_array): [void](language.types.void.html)

El flujo de 2-piernas, o la suscripción de petición. No requiere token.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    params_array





### Valores devueltos

An [OAuthProvider](#class.oauthprovider) [object](#language.types.object).

### Ejemplos

**Ejemplo #1 Ejemplo de OAuthProvider::is2LeggedEndpoint()**

&lt;?php

$provider = new OAuthProvider();

$provider-&gt;is2LeggedEndpoint(true);

?&gt;

### Ver también

- [OAuthProvider::\_\_construct()](#oauthprovider.construct) - Construye un nuevo objeto OAuthProvider

# OAuthProvider::isRequestTokenEndpoint

(PECL OAuth &gt;= 1.0.0)

OAuthProvider::isRequestTokenEndpoint — Establece isRequestTokenEndpoint

### Descripción

public **OAuthProvider::isRequestTokenEndpoint**([bool](#language.types.boolean) $will_issue_request_token): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    will_issue_request_token


      Establece si emitirá o no una emisión de petición de token, determinando si
      [OAuthProvider::tokenHandler()](#oauthprovider.tokenhandler) necesita ser llamado.


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [OAuthProvider::setRequestTokenPath()](#oauthprovider.setrequesttokenpath) - Establece la ruta de petición del token

- [OAuthProvider::reportProblem()](#oauthprovider.reportproblem) - Se informa sobre un problema

# OAuthProvider::removeRequiredParameter

(PECL OAuth &gt;= 1.0.0)

OAuthProvider::removeRequiredParameter — Remueve un parámetro requerido

### Descripción

final public **OAuthProvider::removeRequiredParameter**([string](#language.types.string) $req_params): [bool](#language.types.boolean)

Remueve un parámetro requerido.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    req_params


      El parámetro requerido a ser removido.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [OAuthProvider::setParam()](#oauthprovider.setparam) - Establece un parámetro

- [OAuthProvider::addRequiredParameter()](#oauthprovider.addrequiredparameter) - Agregar parámetros necesarios

# OAuthProvider::reportProblem

(PECL OAuth &gt;= 1.0.0)

OAuthProvider::reportProblem — Se informa sobre un problema

### Descripción

final public static **OAuthProvider::reportProblem**([string](#language.types.string) $oauthexception, [bool](#language.types.boolean) $send_headers = **[true](#constant.true)**): [string](#language.types.string)

Se informa sobre un problema en forma de excepción
[OAuthException](#class.oauthexception); los problemas posibles se enumeran
en la sección de las [constantes OAuth](#oauth.constants).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    oauthexception


      La excepción [OAuthException](#class.oauthexception).


### Valores devueltos

No se retorna ningún valor.

### Ver también

- [OAuthProvider::checkOAuthRequest()](#oauthprovider.checkoauthrequest) - Verifica una petición OAuth

- [OAuthProvider::isRequestTokenEndpoint()](#oauthprovider.isrequesttokenendpoint) - Establece isRequestTokenEndpoint

# OAuthProvider::setParam

(PECL OAuth &gt;= 1.0.0)

OAuthProvider::setParam — Establece un parámetro

### Descripción

final public **OAuthProvider::setParam**([string](#language.types.string) $param_key, [mixed](#language.types.mixed) $param_val = ?): [bool](#language.types.boolean)

Establece un parámetro.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    param_key


      La clave del parámetro.






    param_val


      El valor opcional del parámetro.




      Para excluir un parámetro de la verificación de firmas, colocar este valor a **[null](#constant.null)**.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

- [OAuthProvider::addRequiredParameter()](#oauthprovider.addrequiredparameter) - Agregar parámetros necesarios

# OAuthProvider::setRequestTokenPath

(PECL OAuth &gt;= 1.0.0)

OAuthProvider::setRequestTokenPath — Establece la ruta de petición del token

### Descripción

final public **OAuthProvider::setRequestTokenPath**([string](#language.types.string) $path): [bool](#language.types.boolean)

Establece la ruta de petición del token.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    path


      La ruta.


### Valores devueltos

**[true](#constant.true)**

### Ver también

- [OAuthProvider::tokenHandler()](#oauthprovider.tokenhandler) - Establece el manejador callback de tokenHandler

# OAuthProvider::timestampNonceHandler

(PECL OAuth &gt;= 1.0.0)

OAuthProvider::timestampNonceHandler — Establece el callback timestampNonceHandler

### Descripción

public **OAuthProvider::timestampNonceHandler**([callable](#language.types.callable) $callback_function): [void](language.types.void.html)

Establece el manejador callback timestamp nonce, el cual será llamado luego con
[OAuthProvider::callTimestampNonceHandler()](#oauthprovider.calltimestampnoncehandler). Errores relacionados con
timestamp/nonce son lanzados a este callback.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    callback_function


      El nombre de la función [callable](#language.types.callable).


### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de OAuthProvider::timestampNonceHandler()**

&lt;?php
function timestampNonceChecker($provider) {

    if ($provider-&gt;nonce === 'bad') {
        return OAUTH_BAD_NONCE;
    } elseif ($provider-&gt;timestamp == '0') {
        return OAUTH_BAD_TIMESTAMP;
    }

    return OAUTH_OK;

}
?&gt;

### Ver también

- [OAuthProvider::callTimestampNonceHandler()](#oauthprovider.calltimestampnoncehandler) - Llama al callback timestampNonceHandler

# OAuthProvider::tokenHandler

(PECL OAuth &gt;= 1.0.0)

OAuthProvider::tokenHandler — Establece el manejador callback de tokenHandler

### Descripción

public **OAuthProvider::tokenHandler**([callable](#language.types.callable) $callback_function): [void](language.types.void.html)

Establece el token del callback, que será llamado después con
[OAuthProvider::callTokenHandler()](#oauthprovider.calltokenhandler).

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    callback_function


      El nombre de la función [callable](#language.types.callable).


### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo del callback OAuthProvider::tokenHandler()**

&lt;?php
function tokenHandler($provider) {

    if ($provider-&gt;token === 'rejected') {
        return OAUTH_TOKEN_REJECTED;
    } elseif ($provider-&gt;token === 'revoked') {
        return OAUTH_TOKEN_REVOKED;
    }

    $provider-&gt;token_secret = "the_tokens_secret";
    return OAUTH_OK;

}
?&gt;

### Ver también

- [OAuthProvider::callTokenHandler()](#oauthprovider.calltokenhandler) - Llama al callback tokenNonceHandler

## Tabla de contenidos

- [OAuthProvider::addRequiredParameter](#oauthprovider.addrequiredparameter) — Agregar parámetros necesarios
- [OAuthProvider::callconsumerHandler](#oauthprovider.callconsumerhandler) — Llama al callback consumerNonceHandler
- [OAuthProvider::callTimestampNonceHandler](#oauthprovider.calltimestampnoncehandler) — Llama al callback timestampNonceHandler
- [OAuthProvider::calltokenHandler](#oauthprovider.calltokenhandler) — Llama al callback tokenNonceHandler
- [OAuthProvider::checkOAuthRequest](#oauthprovider.checkoauthrequest) — Verifica una petición OAuth
- [OAuthProvider::\_\_construct](#oauthprovider.construct) — Construye un nuevo objeto OAuthProvider
- [OAuthProvider::consumerHandler](#oauthprovider.consumerhandler) — Establece el manejador callback consumerHandler
- [OAuthProvider::generateToken](#oauthprovider.generatetoken) — Genera un token aleatorio
- [OAuthProvider::is2LeggedEndpoint](#oauthprovider.is2leggedendpoint) — is2LeggedEndpoint
- [OAuthProvider::isRequestTokenEndpoint](#oauthprovider.isrequesttokenendpoint) — Establece isRequestTokenEndpoint
- [OAuthProvider::removeRequiredParameter](#oauthprovider.removerequiredparameter) — Remueve un parámetro requerido
- [OAuthProvider::reportProblem](#oauthprovider.reportproblem) — Se informa sobre un problema
- [OAuthProvider::setParam](#oauthprovider.setparam) — Establece un parámetro
- [OAuthProvider::setRequestTokenPath](#oauthprovider.setrequesttokenpath) — Establece la ruta de petición del token
- [OAuthProvider::timestampNonceHandler](#oauthprovider.timestampnoncehandler) — Establece el callback timestampNonceHandler
- [OAuthProvider::tokenHandler](#oauthprovider.tokenhandler) — Establece el manejador callback de tokenHandler

# Clase OAuthException

(PECL OAuth &gt;= 0.99.1)

## Introducción

    Esta excepción es lanzada cuando un error excepcional durante el uso de la extensión OAuth y contiene información útil de depuración.

## Sinopsis de la Clase

    ****




      class **OAuthException**



      extends
       [Exception](#class.exception)

     {

    /* Propiedades */

     public
      [$lastResponse](#oauthexception.props.lastresponse);

    public
      [$debugInfo](#oauthexception.props.debuginfo);


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

     lastResponse

      La respuesta de la excepción ocurrida, si la hubiera





     debugInfo






- [Introducción](#intro.oauth)
- [Instalación/Configuración](#oauth.setup)<li>[Requerimientos](#oauth.requirements)
- [Instalación](#oauth.installation)
  </li>- [Constantes predefinidas](#oauth.constants)
- [Ejemplos](#oauth.examples)<li>[FireEagle](#oauth.examples.fireeagle)
  </li>- [Funciones de OAuth](#ref.oauth)<li>[oauth_get_sbs](#function.oauth-get-sbs) — Genera una cadena de firma base
- [oauth_urlencode](#function.oauth-urlencode) — Códifica una URI a RFC 3986
  </li>- [OAuth](#class.oauth) — La clase OAuth<li>[OAuth::__construct](#oauth.construct) — Crea un nuevo objeto OAuth
- [OAuth::\_\_destruct](#oauth.destruct) — El destructor
- [OAuth::disableDebug](#oauth.disabledebug) — Desactiva los mensajes de depuración
- [OAuth::disableRedirects](#oauth.disableredirects) — Desactiva las redirecciones
- [OAuth::disableSSLChecks](#oauth.disablesslchecks) — Desactiva la verificación SSL
- [OAuth::enableDebug](#oauth.enabledebug) — Activa los mensajes de depuración
- [OAuth::enableRedirects](#oauth.enableredirects) — Activa las re-direcciones
- [OAuth::enableSSLChecks](#oauth.enablesslchecks) — Activa la verificación SSL
- [OAuth::fetch](#oauth.fetch) — Lee un recurso protegido por OAuth
- [OAuth::generateSignature](#oauth.generatesignature) — Genera una firma
- [OAuth::getAccessToken](#oauth.getaccesstoken) — Recupera un token de acceso
- [OAuth::getCAPath](#oauth.getcapath) — Obtiene la información CA
- [OAuth::getLastResponse](#oauth.getlastresponse) — Obtiene la última respuesta
- [OAuth::getLastResponseHeaders](#oauth.getlastresponseheaders) — Recupera los encabezados de la última respuesta
- [OAuth::getLastResponseInfo](#oauth.getlastresponseinfo) — Obtiene la información HTTP sobre la última respuesta
- [OAuth::getRequestHeader](#oauth.getrequestheader) — Genera una firma de encabezado OAuth
- [OAuth::getRequestToken](#oauth.getrequesttoken) — Lee el token de solicitud
- [OAuth::setAuthType](#oauth.setauthtype) — Define el tipo de autorización
- [OAuth::setCAPath](#oauth.setcapath) — Define el camino y la información de la CA
- [OAuth::setNonce](#oauth.setnonce) — Configura el nonce OAuth
- [OAuth::setRequestEngine](#oauth.setrequestengine) — El propósito de setRequestEngine
- [OAuth::setRSACertificate](#oauth.setrsacertificate) — Define el certificado RSA
- [OAuth::setSSLChecks](#oauth.setsslchecks) — Ajustar controles específicos de SSL para las solicitudes
- [OAuth::setTimestamp](#oauth.settimestamp) — Define el timestamp
- [OAuth::setToken](#oauth.settoken) — Establece el token y el secreto
- [OAuth::setVersion](#oauth.setversion) — Configura la versión OAuth
  </li>- [OAuthProvider](#class.oauthprovider) — La clase OAuthProvider<li>[OAuthProvider::addRequiredParameter](#oauthprovider.addrequiredparameter) — Agregar parámetros necesarios
- [OAuthProvider::callconsumerHandler](#oauthprovider.callconsumerhandler) — Llama al callback consumerNonceHandler
- [OAuthProvider::callTimestampNonceHandler](#oauthprovider.calltimestampnoncehandler) — Llama al callback timestampNonceHandler
- [OAuthProvider::calltokenHandler](#oauthprovider.calltokenhandler) — Llama al callback tokenNonceHandler
- [OAuthProvider::checkOAuthRequest](#oauthprovider.checkoauthrequest) — Verifica una petición OAuth
- [OAuthProvider::\_\_construct](#oauthprovider.construct) — Construye un nuevo objeto OAuthProvider
- [OAuthProvider::consumerHandler](#oauthprovider.consumerhandler) — Establece el manejador callback consumerHandler
- [OAuthProvider::generateToken](#oauthprovider.generatetoken) — Genera un token aleatorio
- [OAuthProvider::is2LeggedEndpoint](#oauthprovider.is2leggedendpoint) — is2LeggedEndpoint
- [OAuthProvider::isRequestTokenEndpoint](#oauthprovider.isrequesttokenendpoint) — Establece isRequestTokenEndpoint
- [OAuthProvider::removeRequiredParameter](#oauthprovider.removerequiredparameter) — Remueve un parámetro requerido
- [OAuthProvider::reportProblem](#oauthprovider.reportproblem) — Se informa sobre un problema
- [OAuthProvider::setParam](#oauthprovider.setparam) — Establece un parámetro
- [OAuthProvider::setRequestTokenPath](#oauthprovider.setrequesttokenpath) — Establece la ruta de petición del token
- [OAuthProvider::timestampNonceHandler](#oauthprovider.timestampnoncehandler) — Establece el callback timestampNonceHandler
- [OAuthProvider::tokenHandler](#oauthprovider.tokenhandler) — Establece el manejador callback de tokenHandler
  </li>- [OAuthException](#class.oauthexception) — Clase OAuthException
