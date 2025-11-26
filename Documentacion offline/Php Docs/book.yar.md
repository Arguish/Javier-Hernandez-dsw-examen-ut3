# Yet Another RPC Framework

# Introducción

Yar es un «framework» de RPC que pretende simplificar y facilitar la manera
en que se comunican las aplicaciones de PHP entre ellas.
Tiene la capacidad de llamar concurrentemente a varios servicios remotos.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#yar.requirements)
- [Instalación](#yar.installation)
- [Configuración en tiempo de ejecución](#yar.configuration)
- [Tipos de recursos](#yar.resources)

    ## Requerimientos

    Si se desea utilizar msgpack como empaquetador, es necesario compilar
    Yar con la opción de configuración ./configure --enable-msgpack

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/yar](https://pecl.php.net/package/yar).

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Yar Opciones de configuración**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [yar.packager](#ini.yar.packager)
      php
      **[INI_SYSTEM](#constant.ini-system)**




      [yar.debug](#ini.yar.debug)
      Off
      **[INI_ALL](#constant.ini-all)**




      [yar.connect_timeout](#ini.yar.connect-timeout)
      1000
      **[INI_ALL](#constant.ini-all)**




      [yar.timeout](#ini.yar.timeout)
      5000
      **[INI_ALL](#constant.ini-all)**




      [yar.expose_info](#ini.yar.expose-info)
      On
      **[INI_SYSTEM](#constant.ini-system)**



Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     yar.packager
     [string](#language.types.string)



      Podría ser php, json, y msgpack (requiere construcción con soporte para msgpack)







     yar.debug
     [string](#language.types.string)











     yar.connect_timeout
     [int](#language.types.integer)



      Tiempo de espera en ms







     yar.timeout
     [int](#language.types.integer)



      Tiempo de espera en ms







     yar.expose_info
     [bool](#language.types.boolean)



      Si exponer la información del servicio (al acceder al servidor mediante GET)


## Tipos de recursos

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[YAR_VERSION](#constant.yar-version)**
     ([string](#language.types.string))








     **[YAR_CLIENT_PROTOCOL_HTTP](#constant.yar-client-protocol-http)**
     ([int](#language.types.integer))








     **[YAR_OPT_PACKAGER](#constant.yar-opt-packager)**
     ([int](#language.types.integer))








     **[YAR_OPT_TIMEOUT](#constant.yar-opt-timeout)**
     ([int](#language.types.integer))








     **[YAR_OPT_CONNECT_TIMEOUT](#constant.yar-opt-connect-timeout)**
     ([int](#language.types.integer))








     **[YAR_OPT_HEADER](#constant.yar-opt-header)**
     ([array](#language.types.array))



      Desde 2.0.4





     **[YAR_PACKAGER_PHP](#constant.yar-packager-php)**
     ([string](#language.types.string))








     **[YAR_PACKAGER_JSON](#constant.yar-packager-json)**
     ([string](#language.types.string))








     **[YAR_ERR_OKEY](#constant.yar-err-okey)**
     ([int](#language.types.integer))








     **[YAR_ERR_OUTPUT](#constant.yar-err-output)**
     ([int](#language.types.integer))








     **[YAR_ERR_TRANSPORT](#constant.yar-err-transport)**
     ([int](#language.types.integer))








     **[YAR_ERR_REQUEST](#constant.yar-err-request)**
     ([int](#language.types.integer))








     **[YAR_ERR_PROTOCOL](#constant.yar-err-protocol)**
     ([int](#language.types.integer))








     **[YAR_ERR_PACKAGER](#constant.yar-err-packager)**
     ([int](#language.types.integer))








     **[YAR_ERR_EXCEPTION](#constant.yar-err-exception)**
     ([int](#language.types.integer))





# Ejemplos

**Ejemplo #1 Ejemplo de servidor de Yar**

&lt;?php

/_ Se asume que a esta página se puede acceder mediante http://example.com/operator.php _/

class Operator {

    /**
     * Add two operands
     * @param interge
     * @return interge
     */
    public function add($a, $b) {
        return $this-&gt;_add($a, $b);
    }

    /**
     * Sub
     */
    public function sub($a, $b) {
        return $a - $b;
    }

    /**
     * Mul
     */
    public function mul($a, $b) {
        return $a * $b;
    }

    /**
     * Protected methods will not be exposed
     * @param interge
     * @return interge
     */
    protected function _add($a, $b) {
        return $a + $b;
    }

}

$servidor = new Yar_Server(new Operator());
$servidor-&gt;handle();
?&gt;

**Ejemplo #2 Acceder al servidor desde el navegador (petición GET)**

Resultado del ejemplo anterior es similar a:

    ![Información del servidor de Yar](php-bigxhtml-data/images/4fd86c7f1b197d1d954ad0f4b033dc93-yar.png)

**Ejemplo #3 Ejemplo de cliente de Yar**

&lt;?php
$cliente = new yar_client("http://example.com/operator.php");

/_ llamar directamente _/
var_dump($cliente-&gt;add(1, 2));

/_ llamar mediante el método 'call' _/
var_dump($cliente-&gt;call("add", array(3, 2)));

/_ \_\_add no puede ser llamado _/
var_dump($cliente-&gt;\_add(1, 2));
?&gt;

Resultado del ejemplo anterior es similar a:

int(3)
int(5)
PHP Fatal error: Uncaught exception 'Yar_Server_Exception' with message 'call to api Operator::\_add() failed' in \*

**Ejemplo #4 Ejemplo de cliente concurrente de Yar**

&lt;?php
function callback($ret, $callinfo) {
echo $callinfo['method'] , " result: ", $ret , "\n";
}

/_ registrar las llamadas asíncronas a servicios remotos _/
Yar_Concurrent_Client::call("http://example.com/operator.php", "add", array(1, 2), "callback");
Yar_Concurrent_Client::call("http://example.com/operator.php", "sub", array(2, 1), "callback");
Yar_Concurrent_Client::call("http://example.com/operator.php", "mul", array(2, 2), "callback");

/_ enviar todas las peticiones y esperar una respuesta _/
Yar_Concurrent_Client::loop();
?&gt;

Resultado del ejemplo anterior es similar a:

mul result: 4
sub result: 1
add result: 3

# La clase Yar_Server

(No version information available, might only be in Git)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yar_Server**

     {

    /* Propiedades */

     protected
      [$_executor](#yar-server.props.executor);



    /* Métodos */

final public [\_\_construct](#yar-server.construct)([Object](#language.types.object) $obj)
public [handle](#yar-server.handle)(): [bool](#language.types.boolean)

}

## Propiedades

     _executor






# Yar_Server::\_\_construct

(PECL yar &gt;= 1.0.0)

Yar_Server::\_\_construct — Registrar un servidor

### Descripción

final public **Yar_Server::\_\_construct**([Object](#language.types.object) $obj)

Configurar un Servidor Yar HTTP RPC. Todos los métodos públicos de $obj serán
registrados como un servicio RPC.

### Parámetros

    obj


      Un objeto, todos sus métodos publicos serán registrados como
      servicioes RPC.


### Valores devueltos

Una instancia de [Yar_Server](#class.yar-server).

### Ejemplos

**Ejemplo #1 Ejemplo de Yar_Server::\_\_construct()**

&lt;?php
class API {
/\*\*
_ the doc info will be generated automatically into service info page.
_ @params
_ @return
_/
public function some_method($parameter, $option = "foo") {
return "some_method";
}

    protected function client_can_not_see() {
    }

}

$service = new Yar_Server(new API());
$service-&gt;handle();
?&gt;

Resultado del ejemplo anterior es similar a:

### Ver también

- [Yar_Server::handle()](#yar-server.handle) - Iniciar un servidor RPC

# Yar_Server::handle

(PECL yar &gt;= 1.0.0)

Yar_Server::handle — Iniciar un servidor RPC

### Descripción

public **Yar_Server::handle**(): [bool](#language.types.boolean)

Inicia un servidor de HTTP de RPC listo para aceptar peticiones RPC.

**Nota**:

     Las llamadas RPC usuales serán emitidas como peticiones POST de HTTP. Si se emite
     una petición GET de HTTP al URI, se imprimierá en la página la información
     del servicio (la sección comentada anteriormente).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

boolean

### Ejemplos

**Ejemplo #1 Ejemplo de Yar_Server::handle()**

&lt;?php
class API {
/\*\*
_ the doc info will be generated automatically into service info page.
_ @params
_ @return
_/
public function some_method($parameter, $option = "foo") {
}

    protected function client_can_not_see() {
    }

}

$service = new Yar_Server(new API());
$service-&gt;handle();
?&gt;

Resultado del ejemplo anterior es similar a:

### Ver también

- [Yar_Server::\_\_construct()](#yar-server.construct) - Registrar un servidor

## Tabla de contenidos

- [Yar_Server::\_\_construct](#yar-server.construct) — Registrar un servidor
- [Yar_Server::handle](#yar-server.handle) — Iniciar un servidor RPC

# La clase Yar_Client

(No version information available, might only be in Git)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yar_Client**

     {

    /* Propiedades */

     protected
      [$_protocol](#yar-client.props.protocol);

    protected
      [$_uri](#yar-client.props.uri);

    protected
      [$_options](#yar-client.props.options);

    protected
      [$_running](#yar-client.props.running);



    /* Métodos */

public [\_\_call](#yar-client.call)([string](#language.types.string) $method, [array](#language.types.array) $parameters): [void](language.types.void.html)
final public [\_\_construct](#yar-client.construct)([string](#language.types.string) $url, [array](#language.types.array) $options = ?)
public [setOpt](#yar-client.setopt)([int](#language.types.integer) $name, [mixed](#language.types.mixed) $value): [Yar_Client](#class.yar-client)|[false](#language.types.singleton)

}

## Propiedades

     _protocol







     _uri







     _options







     _running






# Yar_Client::\_\_call

(PECL yar &gt;= 1.0.0)

Yar_Client::\_\_call — Llamar a un servicio

### Descripción

public **Yar_Client::\_\_call**([string](#language.types.string) $method, [array](#language.types.array) $parameters): [void](language.types.void.html)

Emite una llamada a un método RPC remoto.

### Parámetros

    method


       Nombre del método RPC remono.






    parameters


       Parámetros.


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yar_Client::\_\_call()**

&lt;?php

$cliente = new Yar_Client("http://host/api/");

/_ llamar al servicio remoto _/
$resultado = $cliente-&gt;some_method("parameter");
?&gt;

Resultado del ejemplo anterior es similar a:

### Ver también

- [Yar_Client::setOpt()](#yar-client.setopt) - Establecer los contextos de una llamada

# Yar_Client::\_\_construct

(PECL yar &gt;= 1.0.0)

Yar_Client::\_\_construct — Crear un cliente

### Descripción

final public **Yar_Client::\_\_construct**([string](#language.types.string) $url, [array](#language.types.array) $options = ?)

    Crea un [Yar_Client](#class.yar-client) hacia un
    [Yar_Server](#class.yar-server).

### Parámetros

    url


       El URL del servidor de Yar.


### Valores devueltos

    Una instancia de [Yar_Client](#class.yar-client).

### Ejemplos

**Ejemplo #1 Ejemplo de Yar_Client::\_\_construct()**

&lt;?php
$cliente = new Yar_Client("http://host/api/");
?&gt;

Resultado del ejemplo anterior es similar a:

### Ver también

- [Yar_Client::\_\_call()](#yar-client.call) - Llamar a un servicio

- [Yar_Client::setOpt()](#yar-client.setopt) - Establecer los contextos de una llamada

# Yar_Client::setOpt

(PECL yar &gt;= 1.0.0)

Yar_Client::setOpt — Establecer los contextos de una llamada

### Descripción

public **Yar_Client::setOpt**([int](#language.types.integer) $name, [mixed](#language.types.mixed) $value): [Yar_Client](#class.yar-client)|[false](#language.types.singleton)

### Parámetros

    name


      El nombre puede ser:
      **[YAR_OPT_PACKAGER](#constant.yar-opt-packager)**,
      **[YAR_OPT_PERSISTENT](#constant.yar-opt-persistent)** (Necesita soporte en el servidor),
      **[YAR_OPT_TIMEOUT](#constant.yar-opt-timeout)**,
      **[YAR_OPT_CONNECT_TIMEOUT](#constant.yar-opt-connect-timeout)**,
      **[YAR_OPT_HEADER](#constant.yar-opt-header)** (desde 2.0.4),
      **[YAR_OPT_PROXY](#constant.yar-opt-proxy)** (desde 2.2.0)






    value





### Valores devueltos

Devuelve $this en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de Yar_Client::setOpt()**

&lt;?php

$cliente = new Yar_Client("http://host/api/");

//Establecer el tiempo de espera a 1s
$cliente-&gt;SetOpt(YAR_OPT_CONNECT_TIMEOUT, 1000);

//Establecer el empaquetador a JSON
$cliente-&gt;SetOpt(YAR_OPT_PACKAGER, "json");

//Establecer cabeceras personalizadas
$client-&gt;SetOpt(YAR_OPT_HEADER, array("hr1: val1", "hd2: val2"));

// Establecer Http Proxy
$client-&gt;SetOpt(YAR_OPT_PROXY, "127.0.0.1:8888");

/_ llamar al servicio remoto _/
$result = $cliente-&gt;some_method("parameter");
?&gt;

Resultado del ejemplo anterior es similar a:

### Ver también

- [Yar_Client::\_\_call()](#yar-client.call) - Llamar a un servicio

## Tabla de contenidos

- [Yar_Client::\_\_call](#yar-client.call) — Llamar a un servicio
- [Yar_Client::\_\_construct](#yar-client.construct) — Crear un cliente
- [Yar_Client::setOpt](#yar-client.setopt) — Establecer los contextos de una llamada

# La clase Yar_Concurrent_Client

(No version information available, might only be in Git)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yar_Concurrent_Client**

     {

    /* Propiedades */

     static
      [$_callstack](#yar-concurrent-client.props.callstack);

    static
      [$_callback](#yar-concurrent-client.props.callback);

    static
      [$_error_callback](#yar-concurrent-client.props.error-callback);



    /* Métodos */

public static [call](#yar-concurrent-client.call)(
    [string](#language.types.string) $uri,
    [string](#language.types.string) $method,
    [array](#language.types.array) $parameters = ?,
    [callable](#language.types.callable) $callback = ?,
    [callable](#language.types.callable) $error_callback = ?,
    [array](#language.types.array) $options = ?
): [int](#language.types.integer)
public static [loop](#yar-concurrent-client.loop)([callable](#language.types.callable) $callback = ?, [callable](#language.types.callable) $error_callback = ?): [bool](#language.types.boolean)
public static [reset](#yar-concurrent-client.reset)(): [boolean](#language.types.boolean)

}

## Propiedades

     _callstack







     _callback







     _error_callback






# Yar_Concurrent_Client::call

(PECL yar &gt;= 1.0.0)

Yar_Concurrent_Client::call — Registrar una llamada concurrente

### Descripción

public static **Yar_Concurrent_Client::call**(
    [string](#language.types.string) $uri,
    [string](#language.types.string) $method,
    [array](#language.types.array) $parameters = ?,
    [callable](#language.types.callable) $callback = ?,
    [callable](#language.types.callable) $error_callback = ?,
    [array](#language.types.array) $options = ?
): [int](#language.types.integer)

Registra una llamada RPC, aunque no la envía inmediatamente. Se enviará al
llamar a [Yar_Concurrent_Client::loop()](#yar-concurrent-client.loop)

### Parámetros

    uri


       El URI del servidor de RPC (http, tcp)






    method


      El nombre del servicio (es decir, el nombre del método)






    parameters


      Parámetros






    callback


      Una retrollamada a una función, la cual será invocada mientras se devuelve la respuesta.


### Valores devueltos

Un ID único que se puede utilizar para identificar la llamada que es.

### Ejemplos

**Ejemplo #1 Ejemplo de Yar_Concurrent_Client::call()**

&lt;?php
function callback($retval, $callinfo) {
     var_dump($retval);
}

function error_callback($type, $error, $callinfo) {
    error_log($error);
}

Yar_Concurrent_Client::call("http://host/api/", "some_method", array("parameters"), "callback");
Yar_Concurrent_Client::call("http://host/api/", "some_method", array("parameters")); // si no se especifica la retrollamada,
// se usará la retrollamada en bucle
Yar_Concurrent_Client::call("http://host/api/", "some_method", array("parameters"), "callback", NULL, array(YAR_OPT_PACKAGER =&gt; "json"));
//este servidor acepta empaquetadores json
Yar_Concurrent_Client::call("http://host/api/", "some_method", array("parameters"), "callback", NULL, array(YAR_OPT_TIMEOUT=&gt;1));
//tiempo de espera personalizado

//Las peticiones aún no se han enviado
?&gt;

Resultado del ejemplo anterior es similar a:

### Ver también

- [Yar_Concurrent_Client::loop()](#yar-concurrent-client.loop) - Enviar todas las llamadas

- [Yar_Concurrent_Client::reset()](#yar-concurrent-client.reset) - Limpiar todas las llamadas registradas

- [Yar_Server::\_\_construct()](#yar-server.construct) - Registrar un servidor

- [Yar_Server::handle()](#yar-server.handle) - Iniciar un servidor RPC

# Yar_Concurrent_Client::loop

(PECL yar &gt;= 1.0.0)

Yar_Concurrent_Client::loop — Enviar todas las llamadas

### Descripción

public static **Yar_Concurrent_Client::loop**([callable](#language.types.callable) $callback = ?, [callable](#language.types.callable) $error_callback = ?): [bool](#language.types.boolean)

    Envía todas las llamadas RPC remotas registradas.

### Parámetros

    callback


      Si se establece esta retrollamada, Yar la invocará después de haber
      enviado todas las llamadas y antes de cualquier respuesta, con un $callinfo NULL.




      Entonces, si un usuario no especifica la retrollamada al registrar una llamada concurretne,
      esta retrollamada se utilizará para manejar la resupesta, o si no, se utilizará la
      retrollamada especificada durante el registro.






    error_callback


      Si se establece esta retrollamada, Yar la invocará cuando suceda un
      error.


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yar_Concurrent_Client::loop()**

&lt;?php
function callback($retval, $callinfo) {
     if ($callinfo == NULL) {
echo "Now, all requests are sent, and no any response available\n";
} else {
echo "This is a remote call response, the method name is", $callinfo["method"],
             ". calling sequence is " , $callinfo["sequence"] , "\n";
        var_dump($retval);
}
}

function error_callback($type, $error, $callinfo) {
    error_log($error);
}

Yar_Concurrent_Client::call("http://host/api/", "some_method", array("parameters"), "callback");
Yar_Concurrent_Client::call("http://host/api/", "some_method", array("parameters")); // if the callback is not specificed,
// callback in loop will be used
Yar_Concurrent_Client::call("http://host/api/", "some_method", array("parameters"), "callback", NULL, array(YAR_OPT_PACKAGER =&gt; "json"));
//this server accept json packager
Yar_Concurrent_Client::call("http://host/api/", "some_method", array("parameters"), "callback", NULL, array(YAR_OPT_TIMEOUT=&gt;1));
//custom timeout

Yar_Concurrent_Client::loop("callback", "error_callback"); //send the requests,
//the error_callback is optional
?&gt;

Resultado del ejemplo anterior es similar a:

Now, all requests are sent, and no any response available
This is a remote call response, the method name issome_method. calling sequence is 4
string(11) "some_method"
This is a remote call response, the method name issome_method. calling sequence is 1
string(11) "some_method"
This is a remote call response, the method name issome_method. calling sequence is 2
string(11) "some_method"
This is a remote call response, the method name issome_method. calling sequence is 3
string(11) "some_method"

### Ver también

- [Yar_Concurrent_Client::call()](#yar-concurrent-client.call) - Registrar una llamada concurrente

- [Yar_Concurrent_Client::reset()](#yar-concurrent-client.reset) - Limpiar todas las llamadas registradas

- [Yar_Server::\_\_construct()](#yar-server.construct) - Registrar un servidor

- [Yar_Server::handle()](#yar-server.handle) - Iniciar un servidor RPC

# Yar_Concurrent_Client::reset

(PECL yar &gt;= 1.2.4)

Yar_Concurrent_Client::reset — Limpiar todas las llamadas registradas

### Descripción

public static **Yar_Concurrent_Client::reset**(): [boolean](#language.types.boolean)

Limpia todas las llamadas registradas

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yar_Concurrent_Client::reset()**

Resultado del ejemplo anterior es similar a:

### Ver también

- [Yar_Concurrent_Client::call()](#yar-concurrent-client.call) - Registrar una llamada concurrente

- [Yar_Concurrent_Client::loop()](#yar-concurrent-client.loop) - Enviar todas las llamadas

- [Yar_Server::\_\_construct()](#yar-server.construct) - Registrar un servidor

- [Yar_Server::handle()](#yar-server.handle) - Iniciar un servidor RPC

## Tabla de contenidos

- [Yar_Concurrent_Client::call](#yar-concurrent-client.call) — Registrar una llamada concurrente
- [Yar_Concurrent_Client::loop](#yar-concurrent-client.loop) — Enviar todas las llamadas
- [Yar_Concurrent_Client::reset](#yar-concurrent-client.reset) — Limpiar todas las llamadas registradas

# La clase Yar_Server_Exception

(No version information available, might only be in Git)

## Introducción

     Si un servicio lanza excepciones, se lanzará una Yar_Server_Exception en
     el lado del cliente.

## Sinopsis de la Clase

    ****




      class **Yar_Server_Exception**



      extends
       [Exception](#class.exception)

     {

    /* Propiedades */

     protected
      [$_type](#yar-server-exception.props.type);



    /* Métodos */

public [getType](#yar-server-exception.gettype)(): [string](#language.types.string)

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

     message







     code







     file







     line







     _type






# Yar_Server_Exception::getType

(PECL yar &gt;= 1.0.0)

Yar_Server_Exception::getType — Recuperar el tipo de excepción

### Descripción

public **Yar_Server_Exception::getType**(): [string](#language.types.string)

Obtener el tipo original de la excepción lanzada por el servidor

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

string

### Ejemplos

**Ejemplo #1 Ejemplo de Yar_Server_Exception::getType()**

//Server.php
&lt;?php
class Custom_Exception extends Exception {};

class API {
public function throw_exception($name) {
        throw new Custom_Exception($name);
}
}

$service = new Yar_Server(new API());
$service-&gt;handle();
?&gt;

//Client.php
&lt;?php
$client = new Yar_Client("http://host/api.php");

try {
$client-&gt;throw_exception("client");
} catch (Yar_Server_Exception $e) {
    var_dump($e-&gt;getType());
var_dump($e-&gt;getMessage());
}

Resultado del ejemplo anterior es similar a:

string(16) "Custom_Exception"
string(6) "client"

### Ver también

-

## Tabla de contenidos

- [Yar_Server_Exception::getType](#yar-server-exception.gettype) — Recuperar el tipo de excepción

# La clase Yar_Client_Exception

(No version information available, might only be in Git)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yar_Client_Exception**



      extends
       [Exception](#class.exception)

     {

    /* Propiedades */


    /* Métodos */

public [getType](#yar-client-exception.gettype)(): [string](#language.types.string)

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

     message







     code







     file







     line






# Yar_Client_Exception::getType

(PECL yar &gt;= 1.0.0)

Yar_Client_Exception::getType — Recuperar el tipo de excepción

### Descripción

public **Yar_Client_Exception::getType**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve "Yar_Exception_Client".

### Ejemplos

**Ejemplo #1 Ejemplo de Yar_Client_Exception::getType()**

&lt;?php

/_ ... _/

?&gt;

Resultado del ejemplo anterior es similar a:

...

### Ver también

- **Yaf_Server_Exception::getType()**

## Tabla de contenidos

- [Yar_Client_Exception::getType](#yar-client-exception.gettype) — Recuperar el tipo de excepción

- [Introducción](#intro.yar)
- [Instalación/Configuración](#yar.setup)<li>[Requerimientos](#yar.requirements)
- [Instalación](#yar.installation)
- [Configuración en tiempo de ejecución](#yar.configuration)
- [Tipos de recursos](#yar.resources)
  </li>- [Constantes predefinidas](#yar.constants)
- [Ejemplos](#yar.examples)
- [Yar_Server](#class.yar-server) — La clase Yar_Server<li>[Yar_Server::\_\_construct](#yar-server.construct) — Registrar un servidor
- [Yar_Server::handle](#yar-server.handle) — Iniciar un servidor RPC
  </li>- [Yar_Client](#class.yar-client) — La clase Yar_Client<li>[Yar_Client::__call](#yar-client.call) — Llamar a un servicio
- [Yar_Client::\_\_construct](#yar-client.construct) — Crear un cliente
- [Yar_Client::setOpt](#yar-client.setopt) — Establecer los contextos de una llamada
  </li>- [Yar_Concurrent_Client](#class.yar-concurrent-client) — La clase Yar_Concurrent_Client<li>[Yar_Concurrent_Client::call](#yar-concurrent-client.call) — Registrar una llamada concurrente
- [Yar_Concurrent_Client::loop](#yar-concurrent-client.loop) — Enviar todas las llamadas
- [Yar_Concurrent_Client::reset](#yar-concurrent-client.reset) — Limpiar todas las llamadas registradas
  </li>- [Yar_Server_Exception](#class.yar-server-exception) — La clase Yar_Server_Exception<li>[Yar_Server_Exception::getType](#yar-server-exception.gettype) — Recuperar el tipo de excepción
  </li>- [Yar_Client_Exception](#class.yar-client-exception) — La clase Yar_Client_Exception<li>[Yar_Client_Exception::getType](#yar-client-exception.gettype) — Recuperar el tipo de excepción
  </li>
