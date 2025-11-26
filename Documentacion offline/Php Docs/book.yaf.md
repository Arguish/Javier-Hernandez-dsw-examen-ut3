# Yet Another Framework

# Introducción

La extensión Yet Another Framework (Yaf) -Otro Framework Más, en español-
es un framework de PHP usado para desarrollar aplicaciones web.

Se puede encontrar una comparativa sencilla en [» Rendimiento de Yaf](http://www.laruence.com/2011/12/02/2333.html).

Para una guía rápida, consulte la sección [Turoriales](#yaf.tutorials).

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#yaf.installation)
- [Configuración en tiempo de ejecución](#yaf.configuration)

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/yaf](https://pecl.php.net/package/yaf).

    Los binarios Windows
    (los archivos DLL)
    para esta extensión PECL están disponibles en el sitio web PECL.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de Yaf**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [yaf.library](#ini.yaf.library)
       
      **[INI_ALL](#constant.ini-all)**




      [yaf.action_prefer](#ini.yaf.action-prefer)
      0
      **[INI_ALL](#constant.ini-all)**




      [yaf.lowcase_path](#ini.yaf.lowcase-path)
      0
      **[INI_ALL](#constant.ini-all)**




      [yaf.use_spl_autoload](#ini.yaf.use-spl-autoload)
      0
      **[INI_ALL](#constant.ini-all)**




      [yaf.forward_limit](#ini.yaf.forward-limit)
      5
      **[INI_ALL](#constant.ini-all)**




      [yaf.name_suffix](#ini.yaf.name-suffix)
      1
      **[INI_ALL](#constant.ini-all)**




      [yaf.name_separator](#ini.yaf.name-separator)
       
      **[INI_ALL](#constant.ini-all)**




      [yaf.cache_config](#ini.yaf.cache-config)
      0
      **[INI_SYSTEM](#constant.ini-system)**




      [yaf.environ](#ini.yaf.environ)
      product
      **[INI_SYSTEM](#constant.ini-system)**




      [yaf.use_namespace](#ini.yaf.use-namespace)
      0
      **[INI_ALL](#constant.ini-all)**



Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     yaf.library
     [string](#language.types.string)



      La ruta de la biblioteca global, Yaf_loader buscará la biblioteca global dentro
      de este directorio.







     yaf.action_prefer
     [int](#language.types.integer)



      Si solamente hay una parte en PATH_INFO, debería considerarse como un
      controlador o una acción.




      Si se configura a "On", se considerará como un nombre de una Acción.







     yaf.lowcase_path
     [int](#language.types.integer)



      Si transformar a minúsculas todas las rutas durante la autocarga de clases.







     yaf.use_spl_autoload
     [int](#language.types.integer)



      Cuando este valor es "On", si [Yaf_Loader](#class.yaf-loader) no puede
      encontrar una clase, devolverá **[false](#constant.false)**, después da la oportunidad de llamar a
      otra función de autocarga.




        Cuando este valor es "Off", si [Yaf_Loader](#class.yaf-loader) no puede
        encontrar una clase, devolverá **[true](#constant.true)**, y hará que la autocarga de la clase
        falle permanentemente.



      **Nota**:



        Yaf registrará su cargador durante la instanciación de
        [Yaf_Application](#class.yaf-application), por lo que cualquier otro autocargador
        que se registre antes de la instanciación será llamado antes de
        [Yaf_Loader::autoload()](#yaf-loader.autoload).





      Cuando este valor es "Off" (predeterminado),
      [Yaf_Loader::autoload()](#yaf-loader.autoload) devolverá siempre
      **[true](#constant.true)**.







     yaf.forward_limit
     [int](#language.types.integer)



      La cuenta hacia adelante máxima, por defecto es 5, lo que significa que se puede tener un valor
      máximo de 5 en la pila hacia adelante.




      Esto es una protección para prevenir
      [Yaf_Controller_Abstract::forward()](#yaf-controller-abstract.forward) recursivas.







     yaf.name_suffix
     [int](#language.types.integer)



      Cuando es "On", Yaf_Loader identificará una clase por su sufijo para decidir
      si es una clase MVC.




      Cuando es "Off", Yaf_Loader buscará el prefijo del nombre de la clase.







     yaf.name_separator
     [string](#language.types.string)



      Cuando no está vacío, Yaf_Loader identificará el sufijo de la clase y
      el valor de la cadena para ésta.




      Por ejemplo, cuando este valor es "_", Yaf_Loader tomará Index_Controller como
      una clase Controladora, e IndexController como una clase normal.







     yaf.cache_config
     [int](#language.types.integer)



      Si es "On", y mientras que se use el archifo de configuración ini como
      parámetro de **Yaf_Application()**, el resultado
      de la compilación del fichero de configuración ini será almacenado en caché en el
      proceso de PHP.


**Nota**:

        Yaf examina el mtime del fichero ini, y si cambió desde
        la última compilación, Yaf lo recargará.




      **Advertencia**

        Yaf utiliza la ruta del fichero ini como la clave de entrada de caché, por lo que
        usa la ruta absoluta en la ruta del fichero ini, de otro modo podrían existir
        conflictos si dos aplicaciones usasen la misma ruta relativa de la configuración
        ini.









     yaf.environ
     [string](#language.types.string)



      Este valor es "product" por omisión, usado por Yaf para obtener la sección
      de configuración de un fichero de configuración ini.




      Es decir, si este valor es "product", Yaf usará la sección llamada
      "product" en el fichero de configuración ini (el primier parámetro de
      la clase [Yaf_Application](#class.yaf-application)) como configuración final de
      la clase [Yaf_Application](#class.yaf-application).








     yaf.use_namespace
     [int](#language.types.integer)



      Si este valor es "On", todas las clases de Yaf
      se nombrarán al estilo del espacio de nombres.




      Por ejemplo:


Yaf_Route_Rewrite =&gt; \Yaf\Route\Rewrite
Yaf_Request_Http =&gt; \Yaf\Request\Http

      Existe una excepción, que es algunas clases como
      [Yaf_Controller_Abstract](#class.yaf-controller-abstract).
      El último coponente es una palabra clave de PHP, no podría usarse como nombre de
      una clase, por lo que para tales clases:


Yaf_Controller_Abstract =&gt; \Yaf\Controller_Abstract
Yaf_Route_Static =&gt; \Yaf\Route_Static

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[YAF_VERSION](#constant.yaf-version)**
     ([string](#language.types.string))








     **[YAF_ENVIRON](#constant.yaf-environ)**
     ([string](#language.types.string))








     **[YAF_ERR_STARTUP_FAILED](#constant.yaf-err-startup-failed)**
     ([int](#language.types.integer))








     **[YAF_ERR_ROUTE_FAILED](#constant.yaf-err-route-failed)**
     ([int](#language.types.integer))








     **[YAF_ERR_DISPATCH_FAILED](#constant.yaf-err-dispatch-failed)**
     ([int](#language.types.integer))








     **[YAF_ERR_AUTOLOAD_FAILED](#constant.yaf-err-autoload-failed)**
     ([int](#language.types.integer))








     **[YAF_ERR_NOTFOUND_MODULE](#constant.yaf-err-notfound-module)**
     ([int](#language.types.integer))








     **[YAF_ERR_NOTFOUND_CONTROLLER](#constant.yaf-err-notfound-controller)**
     ([int](#language.types.integer))








     **[YAF_ERR_NOTFOUND_ACTION](#constant.yaf-err-notfound-action)**
     ([int](#language.types.integer))








     **[YAF_ERR_NOTFOUND_VIEW](#constant.yaf-err-notfound-view)**
     ([int](#language.types.integer))








     **[YAF_ERR_CALL_FAILED](#constant.yaf-err-call-failed)**
     ([int](#language.types.integer))








     **[YAF_ERR_TYPE_ERROR](#constant.yaf-err-type-error)**
     ([int](#language.types.integer))





# Ejemplos

**Ejemplo #1 Distribución clásica del directorio Application**

- index.php
- .htaccess

* conf
  |- application.ini //configuración de la aplicación

- application/
    - Bootstrap.php
    * controllers
        - Index.php //controlador predeterminado
    * views
      |+ index - index.phtml //plantilla de vistas para la acción predeterminada
    * modules
    - library
    - models
    - plugins

    **Ejemplo #2 Entrada**

    index.php en el directorio superior es la única forma de entrada de la aplicación, se deberían reescribir todas las peticiones al mismo (se puede emplear .htaccess de Apache+php_mod)

&lt;?php
define("APPLICATION_PATH", dirname(**FILE**));

$app  = new Yaf_Application(APPLICATION_PATH . "/conf/application.ini");
$app-&gt;bootstrap() //llamar a los métodos de arranque definidos en Bootstrap.php
-&gt;run();
?&gt;

**Ejemplo #3 Regla de sobrescritura**

#para apache (.htaccess)
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule .\* index.php

#para nginx
server {
listen \*\*\*\*;
server_name domain.com;
root document_root;
index index.php index.html index.htm;

if (!-e $request_filename) {
rewrite ^/(.\*) /index.php/$1 last;
}
}

#para lighttpd
$HTTP["host"] =~ "(www.)?domain.com$" {
url.rewrite = (
"^/(.+)/?$" =&gt; "/index.php/$1",
)
}

**Ejemplo #4 Configuración de la aplicación**

[yaf]
;APPLICATION_PATH es la constante definida en index.php
application.directory=APPLICATION_PATH "/application/"

;la sección 'product' hereda de las sección 'yaf'
[product:yaf]
foo=bar

**Ejemplo #5 Controlador predeterminado**

&lt;?php
class IndexController extends Yaf_Controller_Abstract {
/_ acción predeterminada _/
public function indexAction() {
$this-&gt;\_view-&gt;word = "hola mundo";
//or
// $this-&gt;getView()-&gt;word = "hola mundo";
}
}
?&gt;

    **Ejemplo #6 Plantilla de vistas predeterminada**

&lt;html&gt;
&lt;head&gt;
&lt;title&gt;Hola Mundo&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;?php echo $word;?&gt;
&lt;/body&gt;
&lt;/html&gt;

**Ejemplo #7 Ejecutar la aplicación**

Resultado del ejemplo anterior es similar a:

&lt;html&gt;
&lt;head&gt;
&lt;title&gt;Hola Mundo&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
hola mundo
&lt;/body&gt;
&lt;/html&gt;

**Nota**:

     También se puede generar el ejemplo de arriba usando el generado de código de Yaf, el cual
     se puede encontrar en yaf@github.

# Configuración de la Aplicación

Se debería proporcionar una array de configuración o una ruta a un fichero de configuración ini (véase
[Yaf_Config_Ini](#class.yaf-config-ini)) a
[Yaf_Application::\_\_construct()](#yaf-application.construct).

Yaf fusionará las configuraciones de la aplicación y del usuario
automáticamente. Las configuraciones de la aplicación tienen el prefijo "yaf." o
"application.". Si existen ambos prefijos, "yaf." y "application.", "application."
tendrá preferencia.

**Ejemplo #1 Un ejemplo de array de PHP**

&lt;?php

$configs = array(
"application" =&gt; array(
"directory" =&gt; dirname(**FILE**),
"dispatcher" =&gt; array(
"catchException" =&gt; 0,
),
"view" =&gt; array(
"ext" =&gt; "phtml",
),
),
);

$app = new Yaf_Application($configs);

?&gt;

**Ejemplo #2 Un ejemplo de un fichero ini**

[yaf]
yaf.directory = APPLICATION_PATH "/application"
yaf.dispatcher.catchException = 0

[product : yaf]
; user configuration list here

   <caption>**Configuración de la Aplicación Yaf**</caption>
   
    
     
      Nombre
      Por defecto
      Historial de cambios


      application.directory
       




      application.ext
      "php"




      application.view.ext
      "phtml"




      application.modules
      "index"




      application.library
      application.directory . "/library"




      application.library.directory
      application.directory . "/library"




      application.library.namespace
      ""




      application.bootstrap
      application.directory . "/Bootstrap" . application.ext




      application.baseUri
      ""




      application.dispatcher.defaultRoute
       




      application.dispatcher.throwException
      1




      application.dispatcher.catchException
      0




      application.dispatcher.defaultModule
      "index"




      application.dispatcher.defaultController
      "index"




      application.dispatcher.defaultAction
      "index"




      application.system
       



Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     application.directory
     [string](#language.types.string)



      El directorio de la aplicación, que es la caperta que contiene las
      carpetas "controllers", "views", "models", "plugins".






**Nota**:

        Esta entrada de configuración es la única que no tiene un valor predeterminado
        Se debería definir siempre manualmente.









     application.ext
     [string](#language.types.string)



      La extensión de fichero del script de PHP, usado en la autocarga de clases
      ([Yaf_Loader](#class.yaf-loader)).







     application.view.ext
     [string](#language.types.string)



      La extensión de fichero de los script de plantilla de vistas.







     application.modules
     [string](#language.types.string)



      Una lista separada por comas de los módulos registrados, usada en el proceso de
      enrutamiento, especialmente mientras existan más de tres segmentos en PATH_INFO,




      Yaf necesita una forma de averiguar si el primer segmento es un nombre de módulo o no.







     application.library
     [string](#language.types.string)



      El directorio de bibliotecas local, véase [Yaf_Loader](#class.yaf-loader) y
      [yaf.library](#ini.yaf.library).



     **Nota**:



       Después de Yaf 2.1.6, esta entrada de configuración puede ser un array. La ruta de la biblioteca
       intentará emplear los ítems establecidos en [application.library.directory](#configuration.yaf.library.directory)








     application.library.directory
     [string](#language.types.string)



      Alias de [application.library](#configuration.yaf.library). Introducido
      en Yaf 2.1.6







     application.library.namespace
     [string](#language.types.string)



      Un prefijo separado por comas de nombres de espacios de bibliotecas locales.




      Introducido en Yaf 2.1.6







     application.bootstrap
     [string](#language.types.string)



      Una ruta absoluta del script de la clase Bootstrap.







     application.baseUri
     [string](#language.types.string)



      Usado para eliminar un prefijo fijo de un uri de petición en el proceso de enrutamiento.
      Como ejemplo, una petición con la uri de petición
      "/prefix/controller/action". Si se establece application.baseUri a
      "/prefix", solamente se tomará "/controller/action" como PATH_INFO en
      el proceso de enrutamiento.




      En general, no hay necesidad de establecer este valor.







     application.dispatcher.throwException
     [bool](#language.types.boolean)



      Si es On, Yaf lanzará una excepción mientras ocurra algún error.
      Véase también [Yaf_Dispatcher::throwException()](#yaf-dispatcher.throwexception).







     application.dispatcher.catchException
     [bool](#language.types.boolean)



      Si es On, Yaf remitirá al controlador/acción de errores mientras
      exista una excepción no capturada. Véase también
      [Yaf_Dispatcher::catchException()](#yaf-dispatcher.catchexception).







     application.dispatcher.defaultRoute
     [string](#language.types.string)



      El enrutamiento por defecto, si no se especifica se usará un enrutamiento estático
      como predeterminado. Véase
      [Yaf_Router::addRoute()](#yaf-router.addroute).







     application.dispatcher.defaultModule
     [string](#language.types.string)



      El nombre de módulo predeterminado, véase también
      [Yaf_Dispatcher::setDefaultModule()](#yaf-dispatcher.setdefaultmodule).







     application.dispatcher.defaultController
     [string](#language.types.string)



      El nombre de controlador predeterminado, véase también
      [Yaf_Dispatcher::setDefaultController()](#yaf-dispatcher.setdefaultcontroller).







     application.dispatcher.defaultAction
     [string](#language.types.string)



      El nombre de acción predeterminado, véase también
      [Yaf_Dispatcher::setDefaultAction()](#yaf-dispatcher.setdefaultaction).








     application.system
     [string](#language.types.string)



      Establecer la configuración en tiempo de ejecuc de yaf en application.ini, como:
      [application.system.lowcase_path](#ini.yaf.lowcase-path)


**Nota**:

        Solamente las configuraciones de **[INI_ALL](#constant.ini-all)** se pueden establecer de esta manera.






# La clase Yaf_Application

(Yaf &gt;=1.0.0)

## Introducción

    **Yaf_Application** proporciona una característica de arranque
    de aplicaciones que provee de recursos reusables, clases de arranque comunes y
    basadas en módulos y verificación de dependencia.

**Nota**:

      **Yaf_Application** implementa el patrón
      singleton, y **Yaf_Application** no puede ser
      serializada o deserializada, lo que causará problemas al intentar
      usar PHPUnit para escribir algún caso de prueba para Yaf.




      Se puede usar la anotación @backupGlobals de PHPUnit para controlar las
      operaciones de copia de respaldo y restauración de variables globales.
      De este modo se puede solucionar este problema.


## Sinopsis de la Clase

    ****




      final
      class **Yaf_Application**

     {

    /* Propiedades */

     protected
      [$config](#yaf-application.props.config);

    protected
      [$dispatcher](#yaf-application.props.dispatcher);

    protected
     static
      [$_app](#yaf-application.props.app);

    protected
      [$_modules](#yaf-application.props.modules);

    protected
      [$_running](#yaf-application.props.running);

    protected
      [$_environ](#yaf-application.props.environ);



    /* Métodos */

public [\_\_construct](#yaf-application.construct)([mixed](#language.types.mixed) $config, [string](#language.types.string) $envrion = ?)

    public static [app](#yaf-application.app)(): [mixed](#language.types.mixed)

public [bootstrap](#yaf-application.bootstrap)([Yaf_Bootstrap_Abstract](#class.yaf-bootstrap-abstract) $bootstrap = ?): [void](language.types.void.html)
public [clearLastError](#yaf-application.clearlasterror)(): [Yaf_Application](#class.yaf-application)
public [environ](#yaf-application.environ)(): [void](language.types.void.html)
public [execute](#yaf-application.execute)([callable](#language.types.callable) $entry, [string](#language.types.string) ...$args): [void](language.types.void.html)
public [getAppDirectory](#yaf-application.getappdirectory)(): [Yaf_Application](#class.yaf-application)
public [getConfig](#yaf-application.getconfig)(): [Yaf_Config_Abstract](#class.yaf-config-abstract)
public [getDispatcher](#yaf-application.getdispatcher)(): [Yaf_Dispatcher](#class.yaf-dispatcher)
public [getLastErrorMsg](#yaf-application.getlasterrormsg)(): [string](#language.types.string)
public [getLastErrorNo](#yaf-application.getlasterrorno)(): [int](#language.types.integer)
public [getModules](#yaf-application.getmodules)(): [array](#language.types.array)
public [run](#yaf-application.run)(): [void](language.types.void.html)
public [setAppDirectory](#yaf-application.setappdirectory)([string](#language.types.string) $directory): [Yaf_Application](#class.yaf-application)

    public [__destruct](#yaf-application.destruct)()

}

## Propiedades

     config







     dispatcher







     _app







     _modules







     _running







     _environ






# Yaf_Application::app

(Yaf &gt;=1.0.0)

Yaf_Application::app — Recuperar una instancia de la clase Application

### Descripción

public static **Yaf_Application::app**(): [mixed](#language.types.mixed)

Recuperar la instancia de la clase [Yaf_Application](#class.yaf-application).
De forma alternativa se podría utilizar el método
[Yaf_Dispatcher::getApplication()](#yaf-dispatcher.getapplication).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una instancia de la clase Yaf_Application, o **[null](#constant.null)** si no se inicializó
antes ninguna instancia de Yaf_Application.

### Ver también

- [Yaf_Dispatcher::getApplication()](#yaf-dispatcher.getapplication) - Recupera la aplicación

# Yaf_Application::bootstrap

(Yaf &gt;=1.0.0)

Yaf_Application::bootstrap — Llamar al arranque

### Descripción

public **Yaf_Application::bootstrap**([Yaf_Bootstrap_Abstract](#class.yaf-bootstrap-abstract) $bootstrap = ?): [void](language.types.void.html)

Ejecuta un Arranque, todos los métodos definidos en el Arranque y prefijados con
"\_init" serán llamados según su orden de declaración. Si no se proporciona el parámetro bootstrap, Yaf buscará
un Arranque en application.directory.

### Parámetros

    bootstrap


      Una instancia de la clase [Yaf_Bootstrap_Abstract](#class.yaf-bootstrap-abstract)


### Valores devueltos

Una instancia de la clase [Yaf_Application](#class.yaf-application)

### Ejemplos

**Ejemplo #1 Un ejemplo de Bootstrap**

&lt;?php
/\*\*

- Este fichero debería estar en la ruta APPLICATION_PATH . "/application/" (la cual estaría definida en la configuración pasada a Yaf_Application),
- y llamarse Bootstrap.php, para que la instancia de Yaf_Application lo pueda encontrar
  \*/
  class Bootstrap extends Yaf_Bootstrap_Abstract {
  function \_initConfig(Yaf_Dispatcher $dispatcher) {
  echo "Primera llamada\n";
  }

        function _initPlugin($dispatcher) {
            echo "Segunda llamada\n";
        }

    }
    ?&gt;

    **Ejemplo #2 Ejemplo de Yaf_Application::bootstrap()**

&lt;?php

defined('APPLICATION_PATH') // APPLICATION_PATH será usada en el fichero ini de configuración
|| define('APPLICATION_PATH', **DIR**);

$application = new Yaf_Application(APPLICATION_PATH.'/conf/application.ini');
$application-&gt;bootstrap();
?&gt;

Resultado del ejemplo anterior es similar a:

Primera llamada
Segunda llamada

### Ver también

- [Yaf_Bootstrap_Abstract](#class.yaf-bootstrap-abstract)

# Yaf_Application::clearLastError

(Yaf &gt;=2.1.2)

Yaf_Application::clearLastError — Limpiar la información del último error

### Descripción

public **Yaf_Application::clearLastError**(): [Yaf_Application](#class.yaf-application)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Application::clearLastError()**

&lt;?php
function error_handler($errno, $errstr, $errfile, $errline) {
Yaf_Application::app()-&gt;clearLastError();
var_dump(Yaf_Application::app()-&gt;getLastErrorNo());
}

$config = array(
"application" =&gt; array(
"directory" =&gt; "/tmp/noexiste",
"dispatcher" =&gt; array(
"throwException" =&gt; 0, //provocar un error en vez de lanzar una excepción cuando ocurra un error
),
),
);

$app = new Yaf_Application($config);
$app-&gt;getDispatcher()-&gt;setErrorHandler("error_handler", E_RECOVERABLE_ERROR);
$app-&gt;run();
?&gt;

Resultado del ejemplo anterior es similar a:

int(0)

# Yaf_Application::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Application::\_\_construct — El constructor de la clase Yaf_Application

### Descripción

public **Yaf_Application::\_\_construct**([mixed](#language.types.mixed) $config, [string](#language.types.string) $envrion = ?)

Instancia un objeto de la clase [Yaf_Application](#class.yaf-application).

### Parámetros

    config


      La ruta de un fichero de configuración ini, o un array de configuración




      Si es un fichero ini de configuración, debería existir una sección con el mismo nombre que una
      definida por [yaf.environ](#ini.yaf.environ), la cual
      es "product" por omisión.


**Nota**:

        Si se está usando un fichero de configuración ini como contenedor de configuración
        de la aplicación, se debería abrir [yaf.cache_config](#ini.yaf.cache-config) para mejorar
        el rendimiento.






      Y la entrada de configuración (y el valor predeterminado) listada abajo:



       **Ejemplo #1 A ini config file example**




[product]
;esta siempre debería ser definida y no tener un valor predeterminado
application.directory=APPLICATION_PATH

;las siguientes configuraciones tienen un valor predeterminados, no se necesitan definirlas
application.library = APPLICATION_PATH . "/library"
application.dispatcher.throwException=1
application.dispatcher.catchException=1

application.baseUri=""

;el nombre de la extensión de script de php
ap.ext=php

;el nombre de la extensión de la plantilla de vista
ap.view.ext=phtml

ap.dispatcher.defaultModule=Index
ap.dispatcher.defaultController=Index
ap.dispatcher.defaultAction=index

;módulos definidos
ap.modules=Index

    envrion


      Qué sección se cargará como configuración final


### Valores devueltos

### Ejemplos

**Ejemplo #2 Ejemplo de Yaf_Application::\_\_construct()**

&lt;?php
defined('APPLICATION_PATH') // APPLICATION_PATH será usada en el archivo de configuración ini
|| define('APPLICATION_PATH', **DIR**);

$application = new Yaf_Application(APPLICATION_PATH.'/conf/application.ini');
$application-&gt;bootstrap()-&gt;run();
?&gt;

Resultado del ejemplo anterior es similar a:

**Ejemplo #3 Ejemplo de Yaf_Application::\_\_construct()**

&lt;?php
$config = array(
"application" =&gt; array(
"directory" =&gt; realpath(dirname(**FILE**)) . "/application",
),
);

/\*_ Yaf_Application _/
$application = new Yaf_Application($config);
$application-&gt;bootstrap()-&gt;run();
?&gt;

Resultado del ejemplo anterior es similar a:

### Ver también

- [Yaf_Config_Ini](#class.yaf-config-ini)

# Yaf_Application::\_\_destruct

(Yaf &gt;=1.0.0)

Yaf_Application::**destruct — El propósito de **destruct

### Descripción

public **Yaf_Application::\_\_destruct**()

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Application::environ

(Yaf &gt;=1.0.0)

Yaf_Application::environ — Recuperar el entorno

### Descripción

public **Yaf_Application::environ**(): [void](language.types.void.html)

Recupera el entorno que fue definido en yaf.environ, el cual tiene el valor predeterminado
"product".

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Application::environ()**

&lt;?php
$config = array(
"application" =&gt; array(
"directory" =&gt; realpath(dirname(**FILE**)) . "/application",
),
);

/\*_ Yaf_Application _/
$application = new Yaf_Application($config);
print_r($application-&gt;environ());
?&gt;

Resultado del ejemplo anterior es similar a:

product

# Yaf_Application::execute

(Yaf &gt;=1.0.0)

Yaf_Application::execute — Ejecutar una llamada de retorno

### Descripción

public **Yaf_Application::execute**([callable](#language.types.callable) $entry, [string](#language.types.string) ...$args): [void](language.types.void.html)

Este método normalmente se usa para ejecutar Yaf_Application en un trabajo de crontab.
Hacer el trabajo de contrab también puede usar el autocargador y el mecanismo de arranque.

### Parámetros

    entry


      Una llamada de retorno válida






    args


      Los parámetros de se le pasarán a la llamada de retorno


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Application::execute()**

&lt;?php
function main($argc, $argv) {
}

$config = array(
"application" =&gt; array(
"directory" =&gt; realpath(dirname(**FILE**)) . "/application",
),
);

/\*_ Yaf_Application _/
$application = new Yaf_Application($config);
$application-&gt;execute("main", $argc, $argv);
?&gt;

Resultado del ejemplo anterior es similar a:

# Yaf_Application::getAppDirectory

(Yaf &gt;=2.1.4)

Yaf_Application::getAppDirectory — Obtener el directorio de la aplicación

### Descripción

public **Yaf_Application::getAppDirectory**(): [Yaf_Application](#class.yaf-application)

### Parámetros

    directory





### Valores devueltos

# Yaf_Application::getConfig

(Yaf &gt;=1.0.0)

Yaf_Application::getConfig — Recuperar la instancia de configuración

### Descripción

public **Yaf_Application::getConfig**(): [Yaf_Config_Abstract](#class.yaf-config-abstract)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una instancia de la clase [Yaf_Config_Abstract](#class.yaf-config-abstract)

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Application::getConfig()**

&lt;?php
$config = array(
"application" =&gt; array(
"directory" =&gt; realpath(dirname(**FILE**)) . "/application",
),
);

/\*_ Yaf_Application _/
$application = new Yaf_Application($config);
print_r($application-&gt;getConfig());
?&gt;

Resultado del ejemplo anterior es similar a:

Yaf_Config_Simple Object
(
[_config:protected] =&gt; Array
(
[application] =&gt; Array
(
[directory] =&gt; /home/laruence/local/www/htdocs/application
)

        )

    [_readonly:protected] =&gt; 1

)

# Yaf_Application::getDispatcher

(Yaf &gt;=1.0.0)

Yaf_Application::getDispatcher — Obtener la instancia de la clase Yaf_Dispatcher

### Descripción

public **Yaf_Application::getDispatcher**(): [Yaf_Dispatcher](#class.yaf-dispatcher)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Application::getDispatcher()**

&lt;?php
$config = array(
"application" =&gt; array(
"directory" =&gt; realpath(dirname(**FILE**)) . "/application",
),
);

/\*_ Yaf_Application _/
$application = new Yaf_Application($config);
print_r($application-&gt;getDispatcher());
?&gt;

Resultado del ejemplo anterior es similar a:

Yaf_Dispatcher Object
(
[_router:protected] =&gt; Yaf_Router Object
(
[_routes:protected] =&gt; Array
(
[_default] =&gt; Yaf_Route_Static Object
(
)

                )

            [_current:protected] =&gt;
        )

    [_view:protected] =&gt;
    [_request:protected] =&gt; Yaf_Request_Http Object
        (
            [module] =&gt;
            [controller] =&gt;
            [action] =&gt;
            [method] =&gt; Cli
            [params:protected] =&gt; Array
                (
                )

            [language:protected] =&gt;
            [_exception:protected] =&gt;
            [_base_uri:protected] =&gt;
            [uri:protected] =&gt;
            [dispatched:protected] =&gt;
            [routed:protected] =&gt;
        )

    [_plugins:protected] =&gt; Array
        (
        )

    [_auto_render:protected] =&gt; 1
    [_return_response:protected] =&gt;
    [_instantly_flush:protected] =&gt;
    [_default_module:protected] =&gt; Index
    [_default_controller:protected] =&gt; Index
    [_default_action:protected] =&gt; index
    [_response] =&gt; Yaf_Response_Cli Object
        (
            [_header:protected] =&gt; Array
                (
                )

            [_body:protected] =&gt;
            [_sendheader:protected] =&gt;
        )

)

# Yaf_Application::getLastErrorMsg

(Yaf &gt;=2.1.2)

Yaf_Application::getLastErrorMsg — Obtener el mensaje del último error ocurrido

### Descripción

public **Yaf_Application::getLastErrorMsg**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Application::getLastErrorMsg()**

&lt;?php
function error_handler($errno, $errstr, $errfile, $errline) {
var_dump(Yaf_Application::app()-&gt;getLastErrorMsg());
}

$config = array(
"application" =&gt; array(
"directory" =&gt; "/tmp/notexists",
"dispatcher" =&gt; array(
"throwException" =&gt; 0, //provocar un error en lugar de lanzar una excepción cuando ocurra un error
),
),
);

$app = new Yaf_Application($config);
$app-&gt;getDispatcher()-&gt;setErrorHandler("error_handler", E_RECOVERABLE_ERROR);
$app-&gt;run();
?&gt;

Resultado del ejemplo anterior es similar a:

string(69) "Could not find controller script /tmp/notexists/controllers/Index.php"

# Yaf_Application::getLastErrorNo

(Yaf &gt;=2.1.2)

Yaf_Application::getLastErrorNo — Pbetner el código del último error ocurrido

### Descripción

public **Yaf_Application::getLastErrorNo**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Application::getLastErrorNo()**

&lt;?php
function error_handler($errno, $errstr, $errfile, $errline) {
var_dump(Yaf_Application::app()-&gt;getLastErrorNo());
var_dump(Yaf_Application::app()-&gt;getLastErrorNo() == YAF_ERR_NOTFOUND_CONTROLLER);
}

$config = array(
"application" =&gt; array(
"directory" =&gt; "/tmp/notexists",
"dispatcher" =&gt; array(
"throwException" =&gt; 0, //provocar un error en lugar de lanzar una excepción cuando ocurra un error
),
),
);

$app = new Yaf_Application($config);
$app-&gt;getDispatcher()-&gt;setErrorHandler("error_handler", E_RECOVERABLE_ERROR);
$app-&gt;run();
?&gt;

Resultado del ejemplo anterior es similar a:

int(516)
bool(true)

# Yaf_Application::getModules

(Yaf &gt;=1.0.0)

Yaf_Application::getModules — Obtener los nombres de los modulos definidos

### Descripción

public **Yaf_Application::getModules**(): [array](#language.types.array)

Obtiene la lista de módulos definidos en config, si no se han definido siempre habrá
un módulo llamado "Index".

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Application::getModules()**

&lt;?php
$config = array(
"application" =&gt; array(
"directory" =&gt; realpath(dirname(**FILE**)) . "/application",
),
);

/\*_ Yaf_Application _/
$application = new Yaf_Application($config);
print_r($application-&gt;getModules());
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Index
)

# Yaf_Application::run

(Yaf &gt;=1.0.0)

Yaf_Application::run — Iniciar una instancia de la clase Yaf_Application

### Descripción

public **Yaf_Application::run**(): [void](language.types.void.html)

Ejecuta una instancia de la clase Yaf_Application, permite a esta instancia aceptar una petición, y enviar
dicha petición, despacha el controlador/acción, e interpreta la respuesta. Finalmente
devuelve la respuesta al cliente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Application::setAppDirectory

(Yaf &gt;=2.1.4)

Yaf_Application::setAppDirectory — Cambiar el directorio de la aplicación

### Descripción

public **Yaf_Application::setAppDirectory**([string](#language.types.string) $directory): [Yaf_Application](#class.yaf-application)

### Parámetros

    directory





### Valores devueltos

## Tabla de contenidos

- [Yaf_Application::app](#yaf-application.app) — Recuperar una instancia de la clase Application
- [Yaf_Application::bootstrap](#yaf-application.bootstrap) — Llamar al arranque
- [Yaf_Application::clearLastError](#yaf-application.clearlasterror) — Limpiar la información del último error
- [Yaf_Application::\_\_construct](#yaf-application.construct) — El constructor de la clase Yaf_Application
- [Yaf_Application::\_\_destruct](#yaf-application.destruct) — El propósito de \_\_destruct
- [Yaf_Application::environ](#yaf-application.environ) — Recuperar el entorno
- [Yaf_Application::execute](#yaf-application.execute) — Ejecutar una llamada de retorno
- [Yaf_Application::getAppDirectory](#yaf-application.getappdirectory) — Obtener el directorio de la aplicación
- [Yaf_Application::getConfig](#yaf-application.getconfig) — Recuperar la instancia de configuración
- [Yaf_Application::getDispatcher](#yaf-application.getdispatcher) — Obtener la instancia de la clase Yaf_Dispatcher
- [Yaf_Application::getLastErrorMsg](#yaf-application.getlasterrormsg) — Obtener el mensaje del último error ocurrido
- [Yaf_Application::getLastErrorNo](#yaf-application.getlasterrorno) — Pbetner el código del último error ocurrido
- [Yaf_Application::getModules](#yaf-application.getmodules) — Obtener los nombres de los modulos definidos
- [Yaf_Application::run](#yaf-application.run) — Iniciar una instancia de la clase Yaf_Application
- [Yaf_Application::setAppDirectory](#yaf-application.setappdirectory) — Cambiar el directorio de la aplicación

# La clase Yaf_Bootstrap_Abstract

(No version information available, might only be in Git)

## Introducción

    El arranque (bootstrap) es un mecanismo usado para realizar una configuración inicial antes
    de ejecutar una Aplicación.




    Los usuarios puede definir su propia clase Bootstrap heredando la clase
    **Yaf_Bootstrap_Abstract**




    Cualquier método declarado en la clase Arranque al que se le anteponga "_init" será
    llamado uno a uno por el método [Yaf_Application::bootstrap()](#yaf-application.bootstrap)
    según su orden de definición.

## Ejemplos

    **Ejemplo #1 Ejemplo de arranque**

&lt;?php
/_ la clase de arranque debería estar definida bajo ./application/Bootstrap.php _/
class Bootstrap extends Yaf_Bootstrap_Abstract {
public function \_initConfig(Yaf_Dispatcher $dispatcher) {
var_dump(**METHOD**);
}
public function \_initPlugin(Yaf_Dispatcher $dispatcher) {
var_dump(**METHOD**);
}
}

$config = array(
"application" =&gt; array(
"directory" =&gt; dirname(**FILE**) . "/application/",
),
);

$app = new Yaf_Application($config);
$app-&gt;bootstrap();
?&gt;

    Resultado del ejemplo anterior es similar a:

string(22) "Bootstrap::\_initConfig"
string(22) "Bootstrap::\_initPlugin"

## Sinopsis de la Clase

    ****




      abstract
      class **Yaf_Bootstrap_Abstract**

     {
    /* Propiedades */

    /* Métodos */

}

# La clase Yaf_Dispatcher

(Yaf &gt;=1.0.0)

## Introducción

    El propósito de la clase **Yaf_Dispatcher** es inicializar
    el entorno de peticiones, enrutar las peticiones entrantes, y despachar
    cuanlquier acción encontrada; agrega cualesquiera respuestas y las devuelve
    cuando el proceso está completado.




    **Yaf_Dispatcher** también implementa el patrón Singleton,
    lo que significa que solamente puede estar disponible una instancia de la misma a la vez.
    Esto le permite también actuar como un registro en el que se puede establecer el orden
    de los objetos del proceso de despachamiento.

## Sinopsis de la Clase

    ****




      final
      class **Yaf_Dispatcher**

     {

    /* Propiedades */

     protected
      [$_router](#yaf-dispatcher.props.router);

    protected
      [$_view](#yaf-dispatcher.props.view);

    protected
      [$_request](#yaf-dispatcher.props.request);

    protected
      [$_plugins](#yaf-dispatcher.props.plugins);

    protected
     static
      [$_instance](#yaf-dispatcher.props.instance);

    protected
      [$_auto_render](#yaf-dispatcher.props.auto-render);

    protected
      [$_return_response](#yaf-dispatcher.props.return-response);

    protected
      [$_instantly_flush](#yaf-dispatcher.props.instantly-flush);

    protected
      [$_default_module](#yaf-dispatcher.props.default-module);

    protected
      [$_default_controller](#yaf-dispatcher.props.default-controller);

    protected
      [$_default_action](#yaf-dispatcher.props.default-action);



    /* Métodos */

public [\_\_construct](#yaf-dispatcher.construct)()

    public [autoRender](#yaf-dispatcher.autorender)([bool](#language.types.boolean) $flag = ?): [Yaf_Dispatcher](#class.yaf-dispatcher)

public [catchException](#yaf-dispatcher.catchexception)([bool](#language.types.boolean) $flag = ?): [Yaf_Dispatcher](#class.yaf-dispatcher)
public [disableView](#yaf-dispatcher.disableview)(): [bool](#language.types.boolean)
public [dispatch](#yaf-dispatcher.dispatch)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [Yaf_Response_Abstract](#class.yaf-response-abstract)
public [enableView](#yaf-dispatcher.enableview)(): [Yaf_Dispatcher](#class.yaf-dispatcher)
public [flushInstantly](#yaf-dispatcher.flushinstantly)([bool](#language.types.boolean) $flag = ?): [Yaf_Dispatcher](#class.yaf-dispatcher)
public [getApplication](#yaf-dispatcher.getapplication)(): [Yaf_Application](#class.yaf-application)
public [getDefaultAction](#yaf-dispatcher.getdefaultaction)(): [string](#language.types.string)
public [getDefaultController](#yaf-dispatcher.getdefaultcontroller)(): [string](#language.types.string)
public [getDefaultModule](#yaf-dispatcher.getdefaultmodule)(): [string](#language.types.string)
public static [getInstance](#yaf-dispatcher.getinstance)(): [Yaf_Dispatcher](#class.yaf-dispatcher)
public [getRequest](#yaf-dispatcher.getrequest)(): [Yaf_Request_Abstract](#class.yaf-request-abstract)
public [getRouter](#yaf-dispatcher.getrouter)(): [Yaf_Router](#class.yaf-router)
public [initView](#yaf-dispatcher.initview)([string](#language.types.string) $templates_dir, [array](#language.types.array) $options = ?): [Yaf_View_Interface](#class.yaf-view-interface)
public [registerPlugin](#yaf-dispatcher.registerplugin)([Yaf_Plugin_Abstract](#class.yaf-plugin-abstract) $plugin): [Yaf_Dispatcher](#class.yaf-dispatcher)
public [returnResponse](#yaf-dispatcher.returnresponse)([bool](#language.types.boolean) $flag): [Yaf_Dispatcher](#class.yaf-dispatcher)
public [setDefaultAction](#yaf-dispatcher.setdefaultaction)([string](#language.types.string) $action): [Yaf_Dispatcher](#class.yaf-dispatcher)
public [setDefaultController](#yaf-dispatcher.setdefaultcontroller)([string](#language.types.string) $controller): [Yaf_Dispatcher](#class.yaf-dispatcher)
public [setDefaultModule](#yaf-dispatcher.setdefaultmodule)([string](#language.types.string) $module): [Yaf_Dispatcher](#class.yaf-dispatcher)
public [setErrorHandler](#yaf-dispatcher.seterrorhandler)(call $callback, [int](#language.types.integer) $error_types): [Yaf_Dispatcher](#class.yaf-dispatcher)
public [setRequest](#yaf-dispatcher.setrequest)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [Yaf_Dispatcher](#class.yaf-dispatcher)
public [setView](#yaf-dispatcher.setview)([Yaf_View_Interface](#class.yaf-view-interface) $view): [Yaf_Dispatcher](#class.yaf-dispatcher)
public [throwException](#yaf-dispatcher.throwexception)([bool](#language.types.boolean) $flag = ?): [Yaf_Dispatcher](#class.yaf-dispatcher)

}

## Propiedades

     _router







     _view







     _request







     _plugins







     _instance







     _auto_render







     _return_response







     _instantly_flush







     _default_module







     _default_controller







     _default_action






# Yaf_Dispatcher::autoRender

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::autoRender — Activa/desactiva la autointerpretación

### Descripción

public **Yaf_Dispatcher::autoRender**([bool](#language.types.boolean) $flag = ?): [Yaf_Dispatcher](#class.yaf-dispatcher)

Ya que [Yaf_Dispatcher](#class.yaf-dispatcher) realizará la interpretación automáticamente después
de despachar una petición entrante, se puede prevenir la interpretación llamando
a este método con el parámetro flag establecido a **[true](#constant.true)**.

**Nota**:

     Se puede devolver simplemente **[false](#constant.false)** en una acción para evitar la autointerpretación de
     dicha acción.

### Parámetros

    flag


      bool


**Nota**:

        Desde 2.2.0, si no se proporciona este parámetro, será devuelto
        el estado actual






### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Dispatcher::autoRender()**

&lt;?php
class IndexController extends Yaf_Controller_Abstract {
/_ El método init será llamado tan pronto como se inicialice un controlador _/
public function init() {
if ($this-&gt;getRequest()-&gt;isXmlHttpRequest()) {
//do not call render for ajax request
//we will outpu a json string
Yaf_Dispatcher::getInstance()-&gt;autoRender(FALSE);
}
}

}
?&gt;

Resultado del ejemplo anterior es similar a:

# Yaf_Dispatcher::catchException

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::catchException — Activar/desactivar la captura de excepciones

### Descripción

public **Yaf_Dispatcher::catchException**([bool](#language.types.boolean) $flag = ?): [Yaf_Dispatcher](#class.yaf-dispatcher)

Mientras que application.dispatcher.throwException esté activado (también se puede llamar
al método **Yaf_Dispatcher::throwException(TRUE)()** para habilitarlo), Yaf lanzará una excepción
en lugar de emitir un error cuando ocurren errores.

Entonces, si se habilita **Yaf_Dispatcher::catchException()** (también se puede habilitar estableciendo
[application.dispatcher.catchException](#configuration.yaf.dispatcher.catchexception)),
todas las excepciones no capturadas lo serán por ErrorController::error si se ha definido una.

### Parámetros

    flag


      bool


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Dispatcher::catchException()**

/_ si se define una clase ErrorController como la siguiente _/
&lt;?php
class ErrorController extends Yaf_Controller_Abstract {
/\*\*
_ también se puede llamar a Yaf_Request_Abstract::getException para obtener
_ la excepción no capturada.
_/
public function errorAction($excepción) {
/_ error occurs \*/
switch ($excepción-&gt;getCode()) {
case YAF_ERR_NOTFOUND_MODULE:
case YAF_ERR_NOTFOUND_CONTROLLER:
case YAF_ERR_NOTFOUND_ACTION:
case YAF_ERR_NOTFOUND_VIEW:
echo 404, ":", $excepción-&gt;getMessage();
break;
default :
$message = $excepción-&gt;getMessage();
echo 0, ":", $excepción-&gt;getMessage();
break;
}
}
}
?&gt;

Resultado del ejemplo anterior es similar a:

/_ ahora, si ocurre algún error, se asume el acceso a un controlador no existente (o uno mismo puede lanzar una excepción): _/
404:Could not find controller script \*\*/application/controllers/Controlador-no-existente.php

### Ver también

- [Yaf_Dispatcher::throwException()](#yaf-dispatcher.throwexception) - Activa/desactiva el lanzamiento de excepciones

- [Yaf_Dispatcher::setErrorHandler()](#yaf-dispatcher.seterrorhandler) - Establece el gestor de errores

# Yaf_Dispatcher::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::\_\_construct — Constructor de la clase Yaf_Dispatcher

### Descripción

public **Yaf_Dispatcher::\_\_construct**()

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Dispatcher::disableView

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::disableView — Deshabilita la interpretación de vistas

### Descripción

public **Yaf_Dispatcher::disableView**(): [bool](#language.types.boolean)

Deshabilita lel motor de vistas, usado en algunas aplicaciones donde se generan por sí mismas.

**Nota**:

     Se puede devolver simplemente **[false](#constant.false)** en una acción para evitar la autointerpretación de
     dicha acción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Dispatcher::dispatch

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::dispatch — Despachar una petición

### Descripción

public **Yaf_Dispatcher::dispatch**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [Yaf_Response_Abstract](#class.yaf-response-abstract)

Este método realiza el trabajo duro de la clase
[Yaf_Dispatcher](#class.yaf-dispatcher). Toma un objeto de petición.

El proceso de despachamiento posee tres eventos distintos:

    - Enrutamiento

    - Despachamiento

    - Respuesta

El enrutamiento ocurre exactamente una vez, usando los valores del objeto de petición
al llamar a **Yaf_Dispatcher::dispatch()**. El despachamiento tiene lugar en un bucle; una petición puede
indicar o múltiples acciones a despachar, o el controlador, o un complemento
puede reiniciar el objeto de petición para forzar acciones adicionales a despachar (véase
la clase [Yaf_Plugin_Abstract](#class.yaf-plugin-abstract). Cuando todo ha sido realizado, la clase
[Yaf_Dispatcher](#class.yaf-dispatcher) devuelve una respuesta.

### Parámetros

    request





### Valores devueltos

# Yaf_Dispatcher::enableView

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::enableView — Habilita la interpretación de vistas

### Descripción

public **Yaf_Dispatcher::enableView**(): [Yaf_Dispatcher](#class.yaf-dispatcher)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Dispatcher::flushInstantly

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::flushInstantly — Activa/desactiva el vaciado instantáneo

### Descripción

public **Yaf_Dispatcher::flushInstantly**([bool](#language.types.boolean) $flag = ?): [Yaf_Dispatcher](#class.yaf-dispatcher)

### Parámetros

    flag


      Booleano


**Nota**:

        Desde 2.2.0, si no se proporciona este parámetro, será devuelto
        el estado actual






### Valores devueltos

# Yaf_Dispatcher::getApplication

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::getApplication — Recupera la aplicación

### Descripción

public **Yaf_Dispatcher::getApplication**(): [Yaf_Application](#class.yaf-application)

Recupera la instancia de la clase [Yaf_Application](#class.yaf-application). Hace lo mismo que
el método [Yaf_Application::app()](#yaf-application.app).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [Yaf_Application::app()](#yaf-application.app) - Recuperar una instancia de la clase Application

# Yaf_Dispatcher::getDefaultAction

(Yaf &gt;=3.2.0)

Yaf_Dispatcher::getDefaultAction — Recupera el nombre de la acción por defecto

### Descripción

public **Yaf_Dispatcher::getDefaultAction**(): [string](#language.types.string)

obtiene el nombre de la acción por defecto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

[string](#language.types.string), nombre de la acción por defecto, por defecto es "index"

# Yaf_Dispatcher::getDefaultController

(Yaf &gt;=3.2.0)

Yaf_Dispatcher::getDefaultController — Recupera el nombre del controlador predeterminado

### Descripción

public **Yaf_Dispatcher::getDefaultController**(): [string](#language.types.string)

obtiene el nombre del controlador predeterminado

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

[string](#language.types.string), nombre del controlador por defecto, por defecto es "Index"

# Yaf_Dispatcher::getDefaultModule

(Yaf &gt;=3.2.0)

Yaf_Dispatcher::getDefaultModule — Recupera el nombre del módulo por defecto

### Descripción

public **Yaf_Dispatcher::getDefaultModule**(): [string](#language.types.string)

obtiene el nombre del módulo por defecto

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

[string](#language.types.string), nombre del módulo, por defecto es "Index"

# Yaf_Dispatcher::getInstance

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::getInstance — Recupeara la instancia despachadora

### Descripción

public static **Yaf_Dispatcher::getInstance**(): [Yaf_Dispatcher](#class.yaf-dispatcher)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Dispatcher::getRequest

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::getRequest — Recupera la instancia de petición

### Descripción

public **Yaf_Dispatcher::getRequest**(): [Yaf_Request_Abstract](#class.yaf-request-abstract)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Dispatcher::getRouter

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::getRouter — Recuperar la instancia de envío

### Descripción

public **Yaf_Dispatcher::getRouter**(): [Yaf_Router](#class.yaf-router)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Dispatcher::initView

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::initView — Inicializa una vista y la devuelve

### Descripción

public **Yaf_Dispatcher::initView**([string](#language.types.string) $templates_dir, [array](#language.types.array) $options = ?): [Yaf_View_Interface](#class.yaf-view-interface)

### Parámetros

    templates_dir









    options





### Valores devueltos

# Yaf_Dispatcher::registerPlugin

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::registerPlugin — Registra un complemento

### Descripción

public **Yaf_Dispatcher::registerPlugin**([Yaf_Plugin_Abstract](#class.yaf-plugin-abstract) $plugin): [Yaf_Dispatcher](#class.yaf-dispatcher)

Registra un complemento (véase [Yaf_Plugin_Abstract](#class.yaf-plugin-abstract)).
Generalmente se registran complementos en el Arranque (véase la clase
[Yaf_Bootstrap_Abstract](#class.yaf-bootstrap-abstract)).

### Parámetros

    plugin





### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Dispatcher::registerPlugin()**

&lt;?php
class Bootstrap extends Yaf_Bootstrap_Abstract{
public function \_initPlugin(Yaf_Dispatcher $despachador) {
    /**
    * Yaf asume que los scripts de complementos están en [application.directory] .  "/plugins"
    * para este caso, será:
    * [application.directory] . "/plugins/" . "User" . [application.ext]
    */
    $usuario = new UserPlugin();
    $despachador-&gt;registerPlugin($usuario);
}

### Ver también

- [Yaf_Plugin_Abstract](#class.yaf-plugin-abstract)

- [Yaf_Bootstrap_Abstract](#class.yaf-bootstrap-abstract)

# Yaf_Dispatcher::returnResponse

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::returnResponse — El propósito de returnResponse

### Descripción

public **Yaf_Dispatcher::returnResponse**([bool](#language.types.boolean) $flag): [Yaf_Dispatcher](#class.yaf-dispatcher)

### Parámetros

    flag





### Valores devueltos

# Yaf_Dispatcher::setDefaultAction

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::setDefaultAction — Cambia el nombre de la acción predeterminada

### Descripción

public **Yaf_Dispatcher::setDefaultAction**([string](#language.types.string) $action): [Yaf_Dispatcher](#class.yaf-dispatcher)

### Parámetros

    action





### Valores devueltos

# Yaf_Dispatcher::setDefaultController

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::setDefaultController — Cambia el nombre del controlador predeterminado

### Descripción

public **Yaf_Dispatcher::setDefaultController**([string](#language.types.string) $controller): [Yaf_Dispatcher](#class.yaf-dispatcher)

### Parámetros

    controller





### Valores devueltos

# Yaf_Dispatcher::setDefaultModule

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::setDefaultModule — Cambia el nombre del módulo predeterminado

### Descripción

public **Yaf_Dispatcher::setDefaultModule**([string](#language.types.string) $module): [Yaf_Dispatcher](#class.yaf-dispatcher)

### Parámetros

    module





### Valores devueltos

# Yaf_Dispatcher::setErrorHandler

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::setErrorHandler — Establece el gestor de errores

### Descripción

public **Yaf_Dispatcher::setErrorHandler**(call $callback, [int](#language.types.integer) $error_types): [Yaf_Dispatcher](#class.yaf-dispatcher)

Establece el gestor de errores de Yaf. Cuando [application.dispatcher.throwException](#configuration.yaf.dispatcher.throwexception)
está desactivada, Yaf provocará errores capturables mientras ocurran errores inesperados.

Por lo tanto, este gestor de errores será invocado mientras se produce el error.

### Parámetros

    callback


      Una llamada de retorno de tipo callable.






    error_types





### Valores devueltos

### Ver también

- [Yaf_Dispatcher::throwException()](#yaf-dispatcher.throwexception) - Activa/desactiva el lanzamiento de excepciones

- [Yaf_Application::getLastErrorNo()](#yaf-application.getlasterrorno) - Pbetner el código del último error ocurrido

- [Yaf_Application::getLastErrorMsg()](#yaf-application.getlasterrormsg) - Obtener el mensaje del último error ocurrido

# Yaf_Dispatcher::setRequest

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::setRequest — El propósito de setRequest

### Descripción

public **Yaf_Dispatcher::setRequest**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [Yaf_Dispatcher](#class.yaf-dispatcher)

### Parámetros

    plugin





### Valores devueltos

# Yaf_Dispatcher::setView

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::setView — Establecer un motor de vistas personalizado

### Descripción

public **Yaf_Dispatcher::setView**([Yaf_View_Interface](#class.yaf-view-interface) $view): [Yaf_Dispatcher](#class.yaf-dispatcher)

Este método ofrece una solución si desea utilizar una vista personalizada
personalizado en lugar de [Yaf_View_Simple](#class.yaf-view-simple).

### Parámetros

    view


      Una instancia de [Yaf_View_Interface](#class.yaf-view-interface)


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de un motor de Vistas personalizado**

&lt;?php
require "/path/to/smarty/Smarty.class.php";

class Smarty_Adapter implements Yaf_View_Interface
{
/\*\*
_ Smarty object
_ @var Smarty
\*/
public $\_smarty;

    /**
     * Constructor
     *
     * @param string $tmplPath
     * @param array $extraParams
     * @return void
     */
    public function __construct($tmplPath = null, $extraParams = array()) {
        $this-&gt;_smarty = new Smarty;

        if (null !== $tmplPath) {
            $this-&gt;setScriptPath($tmplPath);
        }

        foreach ($extraParams as $clave =&gt; $valor) {
            $this-&gt;_smarty-&gt;$clave = $valor;
        }
    }

    /**
     * Establecer la ruta a las plantillas
     *
     * @param string $ruta El directorio a establecer como ruta.
     * @return void
     */
    public function setScriptPath($ruta)
    {
        if (is_readable($ruta)) {
            $this-&gt;_smarty-&gt;template_dir = $ruta;
            return;
        }

        throw new Exception('La ruta proporcionada no es válida');
    }

    /**
     * Asignar una variable a la plantilla
     *
     * @param string $clave El nombre de la variable.
     * @param mixed $valor El valor de la variable.
     * @return void
     */
    public function __set($clave, $valor)
    {
        $this-&gt;_smarty-&gt;assign($clave, $valor);
    }

    /**
     * Permite que funcionen las pruebas con empty() y isset()
     *
     * @param string $clave
     * @return boolean
     */
    public function __isset($clave)
    {
        return (null !== $this-&gt;_smarty-&gt;get_template_vars($clave));
    }

    /**
     * Permite que funcione unset() con las porpiedades de los objetos
     *
     * @param string $clave
     * @return void
     */
    public function __unset($clave)
    {
        $this-&gt;_smarty-&gt;clear_assign($clave);
    }

    /**
     * Asignar variables a la plantilla
     *
     * Permite establecer una clave específica para el valor especificado, O pasar
     * un array de parejas clave =&gt; valor para establecer masivamente.
     *
     * @see __set()
     * @param string|array $spec La estrategia de asignación a utilizar (clave o
     * array de parejas clave =&gt; valor)
     * @param mixed $valor (Opcional) Si se asignan variables nominadas,
     * utilice este como el valor.
     * @return void
     */
    public function assign($spec, $valor = null) {
        if (is_array($spec)) {
            $this-&gt;_smarty-&gt;assign($spec);
            return;
        }

        $this-&gt;_smarty-&gt;assign($spec, $valor);
    }

    /**
     * Limpiar todas las variables asignadas
     *
     * Limpia todas las variables asignadas a Yaf_View mediante
     * {@link assign()} o con sobrecarga de propiedades
     * ({@link __get()}/{@link __set()}).
     *
     * @return void
     */
    public function clearVars() {
        $this-&gt;_smarty-&gt;clear_all_assign();
    }

    /**
     * Procesa una plantilla y devuelve la salida.
     *
     * @param string $nombre La plantilla a procesar.
     * @return string La salida.
     */
    public function render($nombre, $valor = NULL) {
        return $this-&gt;_smarty-&gt;fetch($nombre);
    }

    public function display($nombre, $valor = NULL) {
        echo $this-&gt;_smarty-&gt;fetch($nombre);
    }

}
?&gt;

**Ejemplo #2 Ejemplo de Yaf_Dispatcher::setView()**

&lt;?php
class Bootstrap extends Yaf_Bootstrap_Abstract {

    /**
     * existen configuraciones para smarty en la configuración:
     *
     * smarty.left_delimiter   = "{{"
     * smarty.right_delimiter  = "}}"
     * smarty.template_dir     = APPLICATION_PATH "/views/scripts/"
     * smarty.compile_dir      = APPLICATION_PATH "/views/templates_c/"
     * smarty.cache_dir        = APPLICATION_PATH "/views/templates_d/"
     *
     */
    public function _initConfig() {
        $config = Yaf_Application::app()-&gt;getConfig();
        Yaf_Registry::set("config", $config);
    }

    public function _initLocalName() {
        /** ponemos la clase Smarty_Adapter bajo el directorio de bibliotecas local */
        Yaf_Loader::getInstance()-&gt;registerLocalNamespace('Smarty');
    }

    public function _initSmarty(Yaf_Dispatcher $despachador) {
        $smarty = new Smarty_Adapter(null, Yaf_Registry::get("config")-&gt;get("smarty"));
        $despachador-&gt;setView($smarty);
        /* ahora el motor de vistas de Smarty se convierte en el motor de vistas predeterminado de Yaf */
    }

}
?&gt;

### Ver también

- [Yaf_View_Interface](#class.yaf-view-interface)

- [Yaf_View_Simple](#class.yaf-view-simple)

# Yaf_Dispatcher::throwException

(Yaf &gt;=1.0.0)

Yaf_Dispatcher::throwException — Activa/desactiva el lanzamiento de excepciones

### Descripción

public **Yaf_Dispatcher::throwException**([bool](#language.types.boolean) $flag = ?): [Yaf_Dispatcher](#class.yaf-dispatcher)

Activa/desactiva el lanzamiento de excepciones mientras ocurran errores inesperados.
Cuando está activado, Yaf lanzará excepciones en lugar de provocar
errores capturables.

También se puede usar [
application.dispatcher.throwException](#configuration.yaf.dispatcher.throwexception) para el mismo
propósito.

### Parámetros

    flag


      Booleano


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Dispatcher::throwexception()**

&lt;?php

$config = array(
    'application' =&gt; array(
        'directory' =&gt; dirname(__FILE__),
    ),
);
$app = new Yaf_Application($config);

$app-&gt;getDispatcher()-&gt;throwException(true);

try {
$app-&gt;run();
} catch (Yaf_Exception $e) {
    var_dump($e-&gt;getMessage());
}
?&gt;

Resultado del ejemplo anterior es similar a:

string(59) "Could not find controller script /tmp/controllers/Index.php"

**Ejemplo #2 Ejemplo de Yaf_Dispatcher::throwexception()**

&lt;?php

$config = array(
    'application' =&gt; array(
        'directory' =&gt; dirname(__FILE__),
    ),
);
$app = new Yaf_Application($config);

$app-&gt;getDispatcher()-&gt;throwException(false);

$app-&gt;run();
?&gt;

Resultado del ejemplo anterior es similar a:

PHP Catchable fatal error: Yaf_Application::run(): Could not find controller script /tmp/controllers/Index.php in /tmp/1.php on line 12

### Ver también

- [Yaf_Dispatcher::catchException()](#yaf-dispatcher.catchexception) - Activar/desactivar la captura de excepciones

- [Yaf_Exception](#class.yaf-exception)

## Tabla de contenidos

- [Yaf_Dispatcher::autoRender](#yaf-dispatcher.autorender) — Activa/desactiva la autointerpretación
- [Yaf_Dispatcher::catchException](#yaf-dispatcher.catchexception) — Activar/desactivar la captura de excepciones
- [Yaf_Dispatcher::\_\_construct](#yaf-dispatcher.construct) — Constructor de la clase Yaf_Dispatcher
- [Yaf_Dispatcher::disableView](#yaf-dispatcher.disableview) — Deshabilita la interpretación de vistas
- [Yaf_Dispatcher::dispatch](#yaf-dispatcher.dispatch) — Despachar una petición
- [Yaf_Dispatcher::enableView](#yaf-dispatcher.enableview) — Habilita la interpretación de vistas
- [Yaf_Dispatcher::flushInstantly](#yaf-dispatcher.flushinstantly) — Activa/desactiva el vaciado instantáneo
- [Yaf_Dispatcher::getApplication](#yaf-dispatcher.getapplication) — Recupera la aplicación
- [Yaf_Dispatcher::getDefaultAction](#yaf-dispatcher.getdefaultaction) — Recupera el nombre de la acción por defecto
- [Yaf_Dispatcher::getDefaultController](#yaf-dispatcher.getdefaultcontroller) — Recupera el nombre del controlador predeterminado
- [Yaf_Dispatcher::getDefaultModule](#yaf-dispatcher.getdefaultmodule) — Recupera el nombre del módulo por defecto
- [Yaf_Dispatcher::getInstance](#yaf-dispatcher.getinstance) — Recupeara la instancia despachadora
- [Yaf_Dispatcher::getRequest](#yaf-dispatcher.getrequest) — Recupera la instancia de petición
- [Yaf_Dispatcher::getRouter](#yaf-dispatcher.getrouter) — Recuperar la instancia de envío
- [Yaf_Dispatcher::initView](#yaf-dispatcher.initview) — Inicializa una vista y la devuelve
- [Yaf_Dispatcher::registerPlugin](#yaf-dispatcher.registerplugin) — Registra un complemento
- [Yaf_Dispatcher::returnResponse](#yaf-dispatcher.returnresponse) — El propósito de returnResponse
- [Yaf_Dispatcher::setDefaultAction](#yaf-dispatcher.setdefaultaction) — Cambia el nombre de la acción predeterminada
- [Yaf_Dispatcher::setDefaultController](#yaf-dispatcher.setdefaultcontroller) — Cambia el nombre del controlador predeterminado
- [Yaf_Dispatcher::setDefaultModule](#yaf-dispatcher.setdefaultmodule) — Cambia el nombre del módulo predeterminado
- [Yaf_Dispatcher::setErrorHandler](#yaf-dispatcher.seterrorhandler) — Establece el gestor de errores
- [Yaf_Dispatcher::setRequest](#yaf-dispatcher.setrequest) — El propósito de setRequest
- [Yaf_Dispatcher::setView](#yaf-dispatcher.setview) — Establecer un motor de vistas personalizado
- [Yaf_Dispatcher::throwException](#yaf-dispatcher.throwexception) — Activa/desactiva el lanzamiento de excepciones

# La clase Yaf_Config_Abstract

(Yaf &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      abstract
      class **Yaf_Config_Abstract**

     {

    /* Propiedades */

     protected
      [$_config](#yaf-config-abstract.props.config);

    protected
      [$_readonly](#yaf-config-abstract.props.readonly);



    /* Métodos */

abstract public [get](#yaf-config-abstract.get)([string](#language.types.string) $name, [mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)
abstract public [readonly](#yaf-config-abstract.readonly)(): [bool](#language.types.boolean)
abstract public [set](#yaf-config-abstract.set)(): [Yaf_Config_Abstract](#class.yaf-config-abstract)
abstract public [toArray](#yaf-config-abstract.toarray)(): [array](#language.types.array)

}

## Propiedades

     _config







     _readonly






# Yaf_Config_Abstract::get

(Yaf &gt;=1.0.0)

Yaf_Config_Abstract::get — Consultor

### Descripción

abstract public **Yaf_Config_Abstract::get**([string](#language.types.string) $name, [mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Abstract::readonly

(Yaf &gt;=1.0.0)

Yaf_Config_Abstract::readonly — Buscar si una configuración es de sólo lectura

### Descripción

abstract public **Yaf_Config_Abstract::readonly**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Abstract::set

(Yaf &gt;=1.0.0)

Yaf_Config_Abstract::set — Modificador

### Descripción

abstract public **Yaf_Config_Abstract::set**(): [Yaf_Config_Abstract](#class.yaf-config-abstract)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Abstract::toArray

(Yaf &gt;=1.0.0)

Yaf_Config_Abstract::toArray — Convertir en un array

### Descripción

abstract public **Yaf_Config_Abstract::toArray**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [Yaf_Config_Abstract::get](#yaf-config-abstract.get) — Consultor
- [Yaf_Config_Abstract::readonly](#yaf-config-abstract.readonly) — Buscar si una configuración es de sólo lectura
- [Yaf_Config_Abstract::set](#yaf-config-abstract.set) — Modificador
- [Yaf_Config_Abstract::toArray](#yaf-config-abstract.toarray) — Convertir en un array

# La clase Yaf_Config_Ini

(Yaf &gt;=1.0.0)

## Introducción

    La clase Yaf_Config_Ini permite a los desarrolladores almacenar la información de configuración en un
    formato INI familiar y leerla en la aplicación utilizando una sintaxis apropiada de
    objetos anidados. El formato INI está especializado en proporcionar la capacidad
    de tener una jerarquía de claves de información de configuación y herencia entre
    secciones de información de configuración. Las jerarquías de información de configuración está soportadas
    separando las claves con el carácter punto ("."). Una sección
    puede extender o heredar de otra sección añadiendo al nombre de la sección
    el carácter dos puntos(":") y el nombre de la sección desde la que se hereda
    la información.

**Nota**:

      Yaf_Config_Ini utiliza la función » parse_ini_file() de PHP. Revise
      esta documentación para conocer sus comportamientos específicos, los cuales propaga
      a la clase Yaf_Config_Ini, tales como el manejo de valores especiales como "**[true](#constant.true)**", "**[false](#constant.false)**",
      "yes", "no", y "**[null](#constant.null)**".


## Sinopsis de la Clase

    ****




      class **Yaf_Config_Ini**



      extends
       [Yaf_Config_Abstract](#class.yaf-config-abstract)


     implements
       [Iterator](#class.iterator),  [ArrayAccess](#class.arrayaccess),  [Countable](#class.countable) {

    /* Propiedades */


    /* Métodos */

public [\_\_construct](#yaf-config-ini.construct)([string](#language.types.string) $config_file, [string](#language.types.string) $section = ?)

    public [count](#yaf-config-ini.count)(): [void](language.types.void.html)

public [current](#yaf-config-ini.current)(): [void](language.types.void.html)
public [\_\_get](#yaf-config-ini.get)([string](#language.types.string) $name = ?): [void](language.types.void.html)
public [\_\_isset](#yaf-config-ini.isset)([string](#language.types.string) $name): [void](language.types.void.html)
public [key](#yaf-config-ini.key)(): [void](language.types.void.html)
public [next](#yaf-config-ini.next)(): [void](language.types.void.html)
public [offsetExists](#yaf-config-ini.offsetexists)([string](#language.types.string) $name): [void](language.types.void.html)
public [offsetGet](#yaf-config-ini.offsetget)([string](#language.types.string) $name): [void](language.types.void.html)
public [offsetSet](#yaf-config-ini.offsetset)([string](#language.types.string) $name, [string](#language.types.string) $value): [void](language.types.void.html)
public [offsetUnset](#yaf-config-ini.offsetunset)([string](#language.types.string) $name): [void](language.types.void.html)
public [readonly](#yaf-config-ini.readonly)(): [void](language.types.void.html)
public [rewind](#yaf-config-ini.rewind)(): [void](language.types.void.html)
public [\_\_set](#yaf-config-ini.set)([string](#language.types.string) $name, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [toArray](#yaf-config-ini.toarray)(): [array](#language.types.array)
public [valid](#yaf-config-ini.valid)(): [void](language.types.void.html)

    /* Métodos heredados */
    abstract public [Yaf_Config_Abstract::get](#yaf-config-abstract.get)([string](#language.types.string) $name, [mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)

abstract public [Yaf_Config_Abstract::readonly](#yaf-config-abstract.readonly)(): [bool](#language.types.boolean)
abstract public [Yaf_Config_Abstract::set](#yaf-config-abstract.set)(): [Yaf_Config_Abstract](#class.yaf-config-abstract)
abstract public [Yaf_Config_Abstract::toArray](#yaf-config-abstract.toarray)(): [array](#language.types.array)

}

## Propiedades

     _config







     _readonly






## Ejemplos

    **Ejemplo #1 Ejemplo de Yaf_Config_Ini()**



     Este ejemplo ilustra el uso básico de la clase Yaf_Config_Ini para cargar
     la información de configuración desde un fichero INI. En este ejemplo existe
     información de configuración para el sistema de producción y el sistema de pruebas (staging).
     Ya que la información de configuración del sistema de pruebas es similar a la
     de producción, la sección de pruebas hereda de la sección de producción.
     En este caso, la decisión es arbitraria y podría haber sido escrito
     a la inversa, con la sección de producción heredando de la sección
     de pruebas, aunque este puede no ser el caso para situaciones más complejas.
     Suponga que la información de configuración siguiente está contenida en
     /ruta/a/config.ini:

; Información de configuración del sitio de producción
[production]
webhost = www.example.com
database.adapter = pdo_mysql
database.params.host = db.example.com
database.params.username = dbuser
database.params.password = secret
database.params.dbname = dbname

; La información de configuración del sitio de pruebas hereda del de producción y
; sobrescribe los valores según sea necesario
[staging : production]
database.params.host = dev.example.com
database.params.username = devuser
database.params.password = devsecret

&lt;?php
$config = new Yaf_Config_Ini('/ruta/a/config.ini', 'staging');

var_dump($config-&gt;database-&gt;params-&gt;host);
var_dump($config-&gt;database-&gt;params-&gt;dbname);
var_dump($config-&gt;get("database.params.username"));
?&gt;

    Resultado del ejemplo anterior es similar a:

string(15) "dev.example.com"
string(6) "dbname"
string(7) "devuser

# Yaf_Config_Ini::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Config_Ini::\_\_construct — Constructor de Yaf_Config_Ini

### Descripción

public **Yaf_Config_Ini::\_\_construct**([string](#language.types.string) $config_file, [string](#language.types.string) $section = ?)

El constructor de [Yaf_Config_Ini](#class.yaf-config-ini)

### Parámetros

    config_file


      Ruta al fichero de configuración INI






    section


      Qué sección en cual fichero INI se quiere analizar


### Valores devueltos

# Yaf_Config_Ini::count

(Yaf &gt;=1.0.0)

Yaf_Config_Ini::count — Contar todos los elementos en Yaf_Config.ini

### Descripción

public **Yaf_Config_Ini::count**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Ini::current

(Yaf &gt;=1.0.0)

Yaf_Config_Ini::current — Recuperar el valor actual

### Descripción

public **Yaf_Config_Ini::current**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Ini::\_\_get

(Yaf &gt;=1.0.0)

Yaf_Config_Ini::\_\_get — Recuperar un elemento

### Descripción

public **Yaf_Config_Ini::\_\_get**([string](#language.types.string) $name = ?): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Config_Ini::\_\_isset

(Yaf &gt;=1.0.0)

Yaf_Config_Ini::\_\_isset — Determinar si existe una clave

### Descripción

public **Yaf_Config_Ini::\_\_isset**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Config_Ini::key

(Yaf &gt;=1.0.0)

Yaf_Config_Ini::key — Buscar la clave del elemento actual

### Descripción

public **Yaf_Config_Ini::key**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Ini::next

(Yaf &gt;=1.0.0)

Yaf_Config_Ini::next — Avanzar el puntero interno

### Descripción

public **Yaf_Config_Ini::next**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Ini::offsetExists

(Yaf &gt;=1.0.0)

Yaf_Config_Ini::offsetExists — El propósito de offsetExists

### Descripción

public **Yaf_Config_Ini::offsetExists**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Config_Ini::offsetGet

(Yaf &gt;=1.0.0)

Yaf_Config_Ini::offsetGet — El propósito de offsetGet

### Descripción

public **Yaf_Config_Ini::offsetGet**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Config_Ini::offsetSet

(Yaf &gt;=1.0.0)

Yaf_Config_Ini::offsetSet — El propósito de offsetSet

### Descripción

public **Yaf_Config_Ini::offsetSet**([string](#language.types.string) $name, [string](#language.types.string) $value): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name









    value





### Valores devueltos

# Yaf_Config_Ini::offsetUnset

(Yaf &gt;=1.0.0)

Yaf_Config_Ini::offsetUnset — El propósito de offsetUnset

### Descripción

public **Yaf_Config_Ini::offsetUnset**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Config_Ini::readonly

(Yaf &gt;=1.0.0)

Yaf_Config_Ini::readonly — El propósito de readonly

### Descripción

public **Yaf_Config_Ini::readonly**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Ini::rewind

(Yaf &gt;=1.0.0)

Yaf_Config_Ini::rewind — El propósito de rewind

### Descripción

public **Yaf_Config_Ini::rewind**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Ini::\_\_set

(Yaf &gt;=1.0.0)

Yaf_Config_Ini::**set — El propósito de **set

### Descripción

public **Yaf_Config_Ini::\_\_set**([string](#language.types.string) $name, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name









    value





### Valores devueltos

# Yaf_Config_Ini::toArray

(Yaf &gt;=1.0.0)

Yaf_Config_Ini::toArray — Devuelve la configuración como un array PHP

### Descripción

public **Yaf_Config_Ini::toArray**(): [array](#language.types.array)

Devuelve un array de PHP desde el [Yaf_Config_Ini](#class.yaf-config-ini)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Ini::valid

(Yaf &gt;=1.0.0)

Yaf_Config_Ini::valid — El propósito de valid

### Descripción

public **Yaf_Config_Ini::valid**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [Yaf_Config_Ini::\_\_construct](#yaf-config-ini.construct) — Constructor de Yaf_Config_Ini
- [Yaf_Config_Ini::count](#yaf-config-ini.count) — Contar todos los elementos en Yaf_Config.ini
- [Yaf_Config_Ini::current](#yaf-config-ini.current) — Recuperar el valor actual
- [Yaf_Config_Ini::\_\_get](#yaf-config-ini.get) — Recuperar un elemento
- [Yaf_Config_Ini::\_\_isset](#yaf-config-ini.isset) — Determinar si existe una clave
- [Yaf_Config_Ini::key](#yaf-config-ini.key) — Buscar la clave del elemento actual
- [Yaf_Config_Ini::next](#yaf-config-ini.next) — Avanzar el puntero interno
- [Yaf_Config_Ini::offsetExists](#yaf-config-ini.offsetexists) — El propósito de offsetExists
- [Yaf_Config_Ini::offsetGet](#yaf-config-ini.offsetget) — El propósito de offsetGet
- [Yaf_Config_Ini::offsetSet](#yaf-config-ini.offsetset) — El propósito de offsetSet
- [Yaf_Config_Ini::offsetUnset](#yaf-config-ini.offsetunset) — El propósito de offsetUnset
- [Yaf_Config_Ini::readonly](#yaf-config-ini.readonly) — El propósito de readonly
- [Yaf_Config_Ini::rewind](#yaf-config-ini.rewind) — El propósito de rewind
- [Yaf_Config_Ini::\_\_set](#yaf-config-ini.set) — El propósito de \_\_set
- [Yaf_Config_Ini::toArray](#yaf-config-ini.toarray) — Devuelve la configuración como un array PHP
- [Yaf_Config_Ini::valid](#yaf-config-ini.valid) — El propósito de valid

# LA clase Yaf_Config_Simple

(Yaf &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yaf_Config_Simple**



      extends
       [Yaf_Config_Abstract](#class.yaf-config-abstract)


     implements
       [Iterator](#class.iterator),  [ArrayAccess](#class.arrayaccess),  [Countable](#class.countable) {

    /* Propiedades */

     protected
      [$_readonly](#yaf-config-simple.props.readonly);



    /* Métodos */

public [\_\_construct](#yaf-config-simple.construct)([array](#language.types.array) $configs, [bool](#language.types.boolean) $readonly = false)

    public [count](#yaf-config-simple.count)(): [void](language.types.void.html)

public [current](#yaf-config-simple.current)(): [void](language.types.void.html)
public [\_\_get](#yaf-config-simple.get)([string](#language.types.string) $name = ?): [void](language.types.void.html)
public [\_\_isset](#yaf-config-simple.isset)([string](#language.types.string) $name): [void](language.types.void.html)
public [key](#yaf-config-simple.key)(): [void](language.types.void.html)
public [next](#yaf-config-simple.next)(): [void](language.types.void.html)
public [offsetExists](#yaf-config-simple.offsetexists)([string](#language.types.string) $name): [void](language.types.void.html)
public [offsetGet](#yaf-config-simple.offsetget)([string](#language.types.string) $name): [void](language.types.void.html)
public [offsetSet](#yaf-config-simple.offsetset)([string](#language.types.string) $name, [string](#language.types.string) $value): [void](language.types.void.html)
public [offsetUnset](#yaf-config-simple.offsetunset)([string](#language.types.string) $name): [void](language.types.void.html)
public [readonly](#yaf-config-simple.readonly)(): [void](language.types.void.html)
public [rewind](#yaf-config-simple.rewind)(): [void](language.types.void.html)
public [\_\_set](#yaf-config-simple.set)([string](#language.types.string) $name, [string](#language.types.string) $value): [void](language.types.void.html)
public [toArray](#yaf-config-simple.toarray)(): [array](#language.types.array)
public [valid](#yaf-config-simple.valid)(): [void](language.types.void.html)

    /* Métodos heredados */
    abstract public [Yaf_Config_Abstract::get](#yaf-config-abstract.get)([string](#language.types.string) $name, [mixed](#language.types.mixed) $value): [mixed](#language.types.mixed)

abstract public [Yaf_Config_Abstract::readonly](#yaf-config-abstract.readonly)(): [bool](#language.types.boolean)
abstract public [Yaf_Config_Abstract::set](#yaf-config-abstract.set)(): [Yaf_Config_Abstract](#class.yaf-config-abstract)
abstract public [Yaf_Config_Abstract::toArray](#yaf-config-abstract.toarray)(): [array](#language.types.array)

}

## Propiedades

     _config







     _readonly






# Yaf_Config_Simple::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Config_Simple::**construct — El propósito de **construct

### Descripción

public **Yaf_Config_Simple::\_\_construct**([array](#language.types.array) $configs, [bool](#language.types.boolean) $readonly = false)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    configs









    readonly





### Valores devueltos

# Yaf_Config_Simple::count

(Yaf &gt;=1.0.0)

Yaf_Config_Simple::count — El propósito de count

### Descripción

public **Yaf_Config_Simple::count**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Simple::current

(Yaf &gt;=1.0.0)

Yaf_Config_Simple::current — El propósito de current

### Descripción

public **Yaf_Config_Simple::current**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Simple::\_\_get

(Yaf &gt;=1.0.0)

Yaf_Config_Simple::**get — El propósito de **get

### Descripción

public **Yaf_Config_Simple::\_\_get**([string](#language.types.string) $name = ?): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Config_Simple::\_\_isset

(Yaf &gt;=1.0.0)

Yaf_Config_Simple::**isset — El propósito de **isset

### Descripción

public **Yaf_Config_Simple::\_\_isset**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Config_Simple::key

(Yaf &gt;=1.0.0)

Yaf_Config_Simple::key — El propósito de key

### Descripción

public **Yaf_Config_Simple::key**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Simple::next

(Yaf &gt;=1.0.0)

Yaf_Config_Simple::next — El propósito de next

### Descripción

public **Yaf_Config_Simple::next**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Simple::offsetExists

(Yaf &gt;=1.0.0)

Yaf_Config_Simple::offsetExists — El propósito de offsetExists

### Descripción

public **Yaf_Config_Simple::offsetExists**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Config_Simple::offsetGet

(Yaf &gt;=1.0.0)

Yaf_Config_Simple::offsetGet — El propósito de offsetGet

### Descripción

public **Yaf_Config_Simple::offsetGet**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Config_Simple::offsetSet

(Yaf &gt;=1.0.0)

Yaf_Config_Simple::offsetSet — El propósito de offsetSet

### Descripción

public **Yaf_Config_Simple::offsetSet**([string](#language.types.string) $name, [string](#language.types.string) $value): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name









    value





### Valores devueltos

# Yaf_Config_Simple::offsetUnset

(Yaf &gt;=1.0.0)

Yaf_Config_Simple::offsetUnset — El propósito de offsetUnset

### Descripción

public **Yaf_Config_Simple::offsetUnset**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Config_Simple::readonly

(Yaf &gt;=1.0.0)

Yaf_Config_Simple::readonly — El propósito de readonly

### Descripción

public **Yaf_Config_Simple::readonly**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Simple::rewind

(Yaf &gt;=1.0.0)

Yaf_Config_Simple::rewind — El propósito de rewind

### Descripción

public **Yaf_Config_Simple::rewind**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Simple::\_\_set

(Yaf &gt;=1.0.0)

Yaf_Config_Simple::**set — El propósito de **set

### Descripción

public **Yaf_Config_Simple::\_\_set**([string](#language.types.string) $name, [string](#language.types.string) $value): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name









    value





### Valores devueltos

# Yaf_Config_Simple::toArray

(Yaf &gt;=1.0.0)

Yaf_Config_Simple::toArray — Devuelve un array de PHP

### Descripción

public **Yaf_Config_Simple::toArray**(): [array](#language.types.array)

Devuelve un array de PHP desde el [Yaf_Config_Simple](#class.yaf-config-simple)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Config_Simple::valid

(Yaf &gt;=1.0.0)

Yaf_Config_Simple::valid — El propósito de valid

### Descripción

public **Yaf_Config_Simple::valid**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [Yaf_Config_Simple::\_\_construct](#yaf-config-simple.construct) — El propósito de \_\_construct
- [Yaf_Config_Simple::count](#yaf-config-simple.count) — El propósito de count
- [Yaf_Config_Simple::current](#yaf-config-simple.current) — El propósito de current
- [Yaf_Config_Simple::\_\_get](#yaf-config-simple.get) — El propósito de \_\_get
- [Yaf_Config_Simple::\_\_isset](#yaf-config-simple.isset) — El propósito de \_\_isset
- [Yaf_Config_Simple::key](#yaf-config-simple.key) — El propósito de key
- [Yaf_Config_Simple::next](#yaf-config-simple.next) — El propósito de next
- [Yaf_Config_Simple::offsetExists](#yaf-config-simple.offsetexists) — El propósito de offsetExists
- [Yaf_Config_Simple::offsetGet](#yaf-config-simple.offsetget) — El propósito de offsetGet
- [Yaf_Config_Simple::offsetSet](#yaf-config-simple.offsetset) — El propósito de offsetSet
- [Yaf_Config_Simple::offsetUnset](#yaf-config-simple.offsetunset) — El propósito de offsetUnset
- [Yaf_Config_Simple::readonly](#yaf-config-simple.readonly) — El propósito de readonly
- [Yaf_Config_Simple::rewind](#yaf-config-simple.rewind) — El propósito de rewind
- [Yaf_Config_Simple::\_\_set](#yaf-config-simple.set) — El propósito de \_\_set
- [Yaf_Config_Simple::toArray](#yaf-config-simple.toarray) — Devuelve un array de PHP
- [Yaf_Config_Simple::valid](#yaf-config-simple.valid) — El propósito de valid

# La clase Yaf_Controller_Abstract

(Yaf &gt;=1.0.0)

## Introducción

    **Yaf_Controller_Abstract** es el corazón del sistema
    de Yaf. MVC significa Modelo Vista Controlador (Model-View-Controller en inglés) y es un
    patrón de diseño cuyo objetivo es separa la lógica de aplicación de la lógica de vista.




    Cada controlador personalizado heredará de la clase
    **Yaf_Controller_Abstract**.




    Se encontrará con que no se pude definir la función __construct en los controladores
    personalizados, y por esto **Yaf_Controller_Abstract** proporciona
    un método mágico: **Yaf_Controller_Abstract::init()()**.




    Si se ha definido un método init() en el controlador personalizado, será
    llamado en cuanto el controlador se instancie.




    Las acciones pueden tener argumentos, al hacerle una petición, si en los parámetros
    de la petición existen los mismos nombres de variables (véase
    [Yaf_Request_Abstract::getParam()](#yaf-request-abstract.getparam)) después del enrutamiento,
    Yaf los pasará al método de acción
    (véase [Yaf_Action_Abstract::execute()](#yaf-action-abstract.execute)).

**Nota**:

      Estos argumentos se obtienen directamente sin filtración, se deberían
      porcesar con cuidado antes de usarlos.


## Sinopsis de la Clase

    ****




      abstract
      class **Yaf_Controller_Abstract**

     {

    /* Propiedades */

     public
      [$actions](#yaf-controller-abstract.props.actions);

    protected
      [$_module](#yaf-controller-abstract.props.module);

    protected
      [$_name](#yaf-controller-abstract.props.name);

    protected
      [$_request](#yaf-controller-abstract.props.request);

    protected
      [$_response](#yaf-controller-abstract.props.response);

    protected
      [$_invoke_args](#yaf-controller-abstract.props.invoke-args);

    protected
      [$_view](#yaf-controller-abstract.props.view);



    /* Métodos */

final private [\_\_construct](#yaf-controller-abstract.construct)()

    protected [display](#yaf-controller-abstract.display)([string](#language.types.string) $tpl, [array](#language.types.array) $parameters = ?): [bool](#language.types.boolean)

public [forward](#yaf-controller-abstract.forward)([string](#language.types.string) $action, [array](#language.types.array) $paramters = ?): [bool](#language.types.boolean)
public [getInvokeArg](#yaf-controller-abstract.getinvokearg)([string](#language.types.string) $name): [void](language.types.void.html)
public [getInvokeArgs](#yaf-controller-abstract.getinvokeargs)(): [void](language.types.void.html)
public [getModuleName](#yaf-controller-abstract.getmodulename)(): [string](#language.types.string)
public [getName](#yaf-controller-abstract.getname)(): [string](#language.types.string)
public [getRequest](#yaf-controller-abstract.getrequest)(): [Yaf_Request_Abstract](#class.yaf-request-abstract)
public [getResponse](#yaf-controller-abstract.getresponse)(): [Yaf_Response_Abstract](#class.yaf-response-abstract)
public [getView](#yaf-controller-abstract.getview)(): [Yaf_View_Interface](#class.yaf-view-interface)
public [getViewpath](#yaf-controller-abstract.getviewpath)(): [string](#language.types.string)
public [init](#yaf-controller-abstract.init)(): [void](language.types.void.html)
public [initView](#yaf-controller-abstract.initview)([array](#language.types.array) $options = ?): [void](language.types.void.html)
public [redirect](#yaf-controller-abstract.redirect)([string](#language.types.string) $url): [bool](#language.types.boolean)
protected [render](#yaf-controller-abstract.render)([string](#language.types.string) $tpl, [array](#language.types.array) $parameters = ?): [string](#language.types.string)
public [setViewpath](#yaf-controller-abstract.setviewpath)([string](#language.types.string) $view_directory): [void](language.types.void.html)

}

## Propiedades

     actions


       También se puede definir un método de acción en un script de PHP por separado usando
       esta propiedad y la clase [Yaf_Action_Abstract](#class.yaf-action-abstract).



        **Ejemplo #1 Definir una acción en un fichero aparte**




&lt;?php
class IndexController extends Yaf_Controller_Abstract {
protected $acciones = array(
/\*_ ahora dummyAction está definida en un fichero aparte _/
"dummy" =&gt; "actions/Dummy_action.php",
);

    /* el método de acción puede tener argumentos */
    public function indexAction($name, $id) {
       /* $name e $id son datos no seguros sin tratar */
       assert($nombre == $this-&gt;getRequest()-&gt;getParam("nombre"));
       assert($id   == $this-&gt;_request-&gt;getParam("id"));
    }

}
?&gt;

        **Ejemplo #2 Dummy_action.php**




&lt;?php
class DummyAction extends Yaf_Action_Abstract {
/_ una clase de acción definirá este método como el punto de entrada _/
public function execute() {
}
}
?&gt;

     _module


       El nombre del módulo






     _name


       El nombre del controlador






     _request


       El objeto de petición actual






     _response


       El objeto respuesta actual






     _invoke_args







     _view


       El objeto de motor de vistas





# Yaf_Controller_Abstract::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Controller_Abstract::\_\_construct — Constructor de Yaf_Controller_Abstract

### Descripción

final private **Yaf_Controller_Abstract::\_\_construct**()

**Yaf_Controller_Abstract::\_\_construct()** es final,
lo que significa que no puede ser sobrescrito.
Véase en su lugar
[Yaf_Controller_Abstract::init()](#yaf-controller-abstract.init).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [Yaf_Controller_Abstract::init()](#yaf-controller-abstract.init) - Inicializador del controlador

# Yaf_Controller_Abstract::display

(Yaf &gt;=1.0.0)

Yaf_Controller_Abstract::display — El propósito de display

### Descripción

protected **Yaf_Controller_Abstract::display**([string](#language.types.string) $tpl, [array](#language.types.array) $parameters = ?): [bool](#language.types.boolean)

### Parámetros

    tpl









    parameters





### Valores devueltos

# Yaf_Controller_Abstract::forward

(Yaf &gt;=1.0.0)

Yaf_Controller_Abstract::forward — Avanza a la siguiente acción

### Descripción

public **Yaf_Controller_Abstract::forward**([string](#language.types.string) $action, [array](#language.types.array) $paramters = ?): [bool](#language.types.boolean)

public **Yaf_Controller_Abstract::forward**([string](#language.types.string) $controller, [string](#language.types.string) $action, [array](#language.types.array) $paramters = ?): [bool](#language.types.boolean)

public **Yaf_Controller_Abstract::forward**(
    [string](#language.types.string) $module,
    [string](#language.types.string) $controller,
    [string](#language.types.string) $action,
    [array](#language.types.array) $paramters = ?
): [bool](#language.types.boolean)

Avanza el proceso de ejecución actual a otra acción.

**Nota**:

     Este método no cambia a la acción destino de inmediato,
     toma lugar después de la finalización del flujo actual.

### Parámetros

    module


      El nombre del módulo destino. Si es NULL, se asume el nombre del
      módulo predeterminado






    controller


      El nombre del controlador destino






    action


      El nombre de la acción destino






    paramters


      Argumentos de llamada


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Controller_Abstract::forward()**

&lt;?php
class IndexController extends Yaf_Controller_Abstract
{
public function indexAction(){
$logined = $_SESSION["login"];
         if (!$logined) {
$this-&gt;forward("login", array("from" =&gt; "Index")); // forward to login action
return FALSE; // this is important, this finish current working flow
// and tell the Yaf do not doing auto-render
}

         // otros procesos
    }

    public function loginAction() {
         echo "login, redirected from ", $this-&gt;getInvokeArg("from") , " action";
    }

}
?&gt;

Resultado del ejemplo anterior es similar a:

login, redirected from Index action

### Ver también

- **Yaf_Request_Abstrace::getParam()**

# Yaf_Controller_Abstract::getInvokeArg

(Yaf &gt;=1.0.0)

Yaf_Controller_Abstract::getInvokeArg — El propósito de getInvokeArg

### Descripción

public **Yaf_Controller_Abstract::getInvokeArg**([string](#language.types.string) $name): [void](language.types.void.html)

### Parámetros

    name





### Valores devueltos

# Yaf_Controller_Abstract::getInvokeArgs

(Yaf &gt;=1.0.0)

Yaf_Controller_Abstract::getInvokeArgs — El propósito de getInvokeArgs

### Descripción

public **Yaf_Controller_Abstract::getInvokeArgs**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Controller_Abstract::getModuleName

(Yaf &gt;=1.0.0)

Yaf_Controller_Abstract::getModuleName — Obtiene el nombre del módulo

### Descripción

public **Yaf_Controller_Abstract::getModuleName**(): [string](#language.types.string)

Obtiene el nombre del módulo del controlador.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Controller_Abstract::getName

(Yaf &gt;=3.2.0)

Yaf_Controller_Abstract::getName — Obtener el nombre propio

### Descripción

public **Yaf_Controller_Abstract::getName**(): [string](#language.types.string)

obtiene el nombre del controlador

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

[string](#language.types.string), nombre del controlador

# Yaf_Controller_Abstract::getRequest

(Yaf &gt;=1.0.0)

Yaf_Controller_Abstract::getRequest — Recupera el objeto petición actual

### Descripción

public **Yaf_Controller_Abstract::getRequest**(): [Yaf_Request_Abstract](#class.yaf-request-abstract)

Recupera el objeto petición actual

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una instancia de [Yaf_Request_Abstract](#class.yaf-request-abstract)

# Yaf_Controller_Abstract::getResponse

(Yaf &gt;=1.0.0)

Yaf_Controller_Abstract::getResponse — Recupera el objeto respuesta actual

### Descripción

public **Yaf_Controller_Abstract::getResponse**(): [Yaf_Response_Abstract](#class.yaf-response-abstract)

Recupera el objeto respuesta actual

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una instancia de [Yaf_Response_Abstract](#class.yaf-response-abstract)

# Yaf_Controller_Abstract::getView

(Yaf &gt;=1.0.0)

Yaf_Controller_Abstract::getView — Recupera el motor de vistas

### Descripción

public **Yaf_Controller_Abstract::getView**(): [Yaf_View_Interface](#class.yaf-view-interface)

Recupera el motor de vistas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Controller_Abstract::getViewpath

(Yaf &gt;=1.0.0)

Yaf_Controller_Abstract::getViewpath — El propósito de getViewpath

### Descripción

public **Yaf_Controller_Abstract::getViewpath**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Controller_Abstract::init

(Yaf &gt;=1.0.0)

Yaf_Controller_Abstract::init — Inicializador del controlador

### Descripción

public **Yaf_Controller_Abstract::init**(): [void](language.types.void.html)

[Yaf_Controller_Abstract::\_\_construct()](#yaf-controller-abstract.construct) es final,
lo que significa que los usuarios no puede sobrescribirlo,
aunque pueden definir
**Yaf_Controller_Abstract::init()**, que será invocado
después de que el objeto controlador sea instanciado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [Yaf_Controller_Abstract::\_\_construct()](#yaf-controller-abstract.construct) - Constructor de Yaf_Controller_Abstract

# Yaf_Controller_Abstract::initView

(Yaf &gt;=1.0.0)

Yaf_Controller_Abstract::initView — El propósito de initView

### Descripción

public **Yaf_Controller_Abstract::initView**([array](#language.types.array) $options = ?): [void](language.types.void.html)

### Parámetros

    options





### Valores devueltos

# Yaf_Controller_Abstract::redirect

(Yaf &gt;=1.0.0)

Yaf_Controller_Abstract::redirect — Redirige a un URL

### Descripción

public **Yaf_Controller_Abstract::redirect**([string](#language.types.string) $url): [bool](#language.types.boolean)

Redirige a un URL enviando una cabecera 302

### Parámetros

    url


      Un URL


### Valores devueltos

bool

# Yaf_Controller_Abstract::render

(Yaf &gt;=1.0.0)

Yaf_Controller_Abstract::render — Interpreta una plantilla de vista

### Descripción

protected **Yaf_Controller_Abstract::render**([string](#language.types.string) $tpl, [array](#language.types.array) $parameters = ?): [string](#language.types.string)

### Parámetros

    tpl









    parameters





### Valores devueltos

# Yaf_Controller_Abstract::setViewpath

(Yaf &gt;=1.0.0)

Yaf_Controller_Abstract::setViewpath — El propósito de setViewpath

### Descripción

public **Yaf_Controller_Abstract::setViewpath**([string](#language.types.string) $view_directory): [void](language.types.void.html)

### Parámetros

    view_directory





### Valores devueltos

## Tabla de contenidos

- [Yaf_Controller_Abstract::\_\_construct](#yaf-controller-abstract.construct) — Constructor de Yaf_Controller_Abstract
- [Yaf_Controller_Abstract::display](#yaf-controller-abstract.display) — El propósito de display
- [Yaf_Controller_Abstract::forward](#yaf-controller-abstract.forward) — Avanza a la siguiente acción
- [Yaf_Controller_Abstract::getInvokeArg](#yaf-controller-abstract.getinvokearg) — El propósito de getInvokeArg
- [Yaf_Controller_Abstract::getInvokeArgs](#yaf-controller-abstract.getinvokeargs) — El propósito de getInvokeArgs
- [Yaf_Controller_Abstract::getModuleName](#yaf-controller-abstract.getmodulename) — Obtiene el nombre del módulo
- [Yaf_Controller_Abstract::getName](#yaf-controller-abstract.getname) — Obtener el nombre propio
- [Yaf_Controller_Abstract::getRequest](#yaf-controller-abstract.getrequest) — Recupera el objeto petición actual
- [Yaf_Controller_Abstract::getResponse](#yaf-controller-abstract.getresponse) — Recupera el objeto respuesta actual
- [Yaf_Controller_Abstract::getView](#yaf-controller-abstract.getview) — Recupera el motor de vistas
- [Yaf_Controller_Abstract::getViewpath](#yaf-controller-abstract.getviewpath) — El propósito de getViewpath
- [Yaf_Controller_Abstract::init](#yaf-controller-abstract.init) — Inicializador del controlador
- [Yaf_Controller_Abstract::initView](#yaf-controller-abstract.initview) — El propósito de initView
- [Yaf_Controller_Abstract::redirect](#yaf-controller-abstract.redirect) — Redirige a un URL
- [Yaf_Controller_Abstract::render](#yaf-controller-abstract.render) — Interpreta una plantilla de vista
- [Yaf_Controller_Abstract::setViewpath](#yaf-controller-abstract.setviewpath) — El propósito de setViewpath

# La clase Yaf_Action_Abstract

(Yaf &gt;=1.0.0)

## Introducción

    Una acción puede ser definida en un fichero aparte en Yaf (véase
    [Yaf_Controller_Abstract](#class.yaf-controller-abstract)). Es decir, un método de acción
    también puede ser una clase **Yaf_Action_Abstract**.




    Dado que debe haber un punto de entrada que pueda ser llamado por Yaf,
    debe implementar el método abstracto
    [Yaf_Action_Abstract::execute()](#yaf-action-abstract.execute) en la clase de
    acción personalizada.

## Sinopsis de la Clase

    ****




      class **Yaf_Action_Abstract**



      extends
       [Yaf_Controller_Abstract](#class.yaf-controller-abstract)

     {

    /* Propiedades */

     protected
      [$_controller](#yaf-action-abstract.props.controller);



    /* Métodos */

abstract public[execute](#yaf-action-abstract.execute)([mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)
public[getController](#yaf-action-abstract.getcontroller)(): [Yaf_Controller_Abstract](#class.yaf-controller-abstract)
public [getControllerName](#yaf-controller-abstract.getcontrollername)(): [string](#language.types.string)

    /* Métodos heredados */
    protected [Yaf_Controller_Abstract::display](#yaf-controller-abstract.display)([string](#language.types.string) $tpl, [array](#language.types.array) $parameters = ?): [bool](#language.types.boolean)

public [Yaf_Controller_Abstract::forward](#yaf-controller-abstract.forward)([string](#language.types.string) $action, [array](#language.types.array) $paramters = ?): [bool](#language.types.boolean)
public [Yaf_Controller_Abstract::getInvokeArg](#yaf-controller-abstract.getinvokearg)([string](#language.types.string) $name): [void](language.types.void.html)
public [Yaf_Controller_Abstract::getInvokeArgs](#yaf-controller-abstract.getinvokeargs)(): [void](language.types.void.html)
public [Yaf_Controller_Abstract::getModuleName](#yaf-controller-abstract.getmodulename)(): [string](#language.types.string)
public [Yaf_Controller_Abstract::getName](#yaf-controller-abstract.getname)(): [string](#language.types.string)
public [Yaf_Controller_Abstract::getRequest](#yaf-controller-abstract.getrequest)(): [Yaf_Request_Abstract](#class.yaf-request-abstract)
public [Yaf_Controller_Abstract::getResponse](#yaf-controller-abstract.getresponse)(): [Yaf_Response_Abstract](#class.yaf-response-abstract)
public [Yaf_Controller_Abstract::getView](#yaf-controller-abstract.getview)(): [Yaf_View_Interface](#class.yaf-view-interface)
public [Yaf_Controller_Abstract::getViewpath](#yaf-controller-abstract.getviewpath)(): [string](#language.types.string)
public [Yaf_Controller_Abstract::init](#yaf-controller-abstract.init)(): [void](language.types.void.html)
public [Yaf_Controller_Abstract::initView](#yaf-controller-abstract.initview)([array](#language.types.array) $options = ?): [void](language.types.void.html)
public [Yaf_Controller_Abstract::redirect](#yaf-controller-abstract.redirect)([string](#language.types.string) $url): [bool](#language.types.boolean)
protected [Yaf_Controller_Abstract::render](#yaf-controller-abstract.render)([string](#language.types.string) $tpl, [array](#language.types.array) $parameters = ?): [string](#language.types.string)
public [Yaf_Controller_Abstract::setViewpath](#yaf-controller-abstract.setviewpath)([string](#language.types.string) $view_directory): [void](language.types.void.html)

}

## Propiedades

     _module







     _name







     _request







     _response







     _invoke_args







     _view







     _controller






# Yaf_Action_Abstract::execute

(Yaf &gt;=1.0.0)

Yaf_Action_Abstract::execute — Punto de entrada de una acción

### Descripción

abstract public**Yaf_Action_Abstract::execute**([mixed](#language.types.mixed) ...$args): [mixed](#language.types.mixed)

El usuario debería definir siempre este método para un acción, este es el punto de entrada
de la misma.
**Yaf_Action_Abstract::execute()** podría tener argumentos.

**Nota**:

     El valor recuperado desde la petición no es seguro. Se debería filtrar
     el trabajo antes de usarlo.

### Parámetros

    args





### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Action_Abstract::execute()**

&lt;?php
/\*\*

- Un ejemplo de controlador
  \*/
  class ProductController extends Yaf_Controller_Abstract {
  protected $actions = array(
  "index" =&gt; "actions/Index.php",
  );
  }
  ?&gt;

    **Ejemplo #2 Ejemplo de Yaf_Action_Abstract::execute()**

&lt;?php
/\*\*

- ListAction
  \*/
  class ListAction extends Yaf_Action_Abstract {
  public function execute ($name, $id) {
         assert($name == $this-&gt;getRequest()-&gt;getParam("name"));
         assert($id == $this-&gt;getRequest()-&gt;getParam("id"));
  }
  }
  ?&gt;

    Resultado del ejemplo anterior es similar a:

/\*\*

- Ahora asumimos que estamos usando la ruta Yaf_Route_Static
- para la petición: http://yourdomain/product/list/name/yaf/id/22
- resultará:
  \*/
  bool(true)
  bool(true)

### Ver también

-

# Yaf_Action_Abstract::getController

(Yaf &gt;=1.0.0)

Yaf_Action_Abstract::getController — Recupera el objeto controlador

### Descripción

public**Yaf_Action_Abstract::getController**(): [Yaf_Controller_Abstract](#class.yaf-controller-abstract)

Recupera el objeto controlador actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una instancia de [Yaf_Controller_Abstract](#class.yaf-controller-abstract)

# Yaf_Action_Abstract::getControllerName

(No version information available, might only be in Git)

Yaf_Action_Abstract::getControllerName — Obtener el nombre del controlador

### Descripción

public **Yaf_Action_Abstract::getControllerName**(): [string](#language.types.string)

obtener el nombre del controlador

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

[string](#language.types.string), nombre del controlador

## Tabla de contenidos

- [Yaf_Action_Abstract::execute](#yaf-action-abstract.execute) — Punto de entrada de una acción
- [Yaf_Action_Abstract::getController](#yaf-action-abstract.getcontroller) — Recupera el objeto controlador
- [Yaf_Action_Abstract::getControllerName](#yaf-controller-abstract.getcontrollername) — Obtener el nombre del controlador

# La clase Yaf_View_Interface

(Yaf &gt;=1.0.0)

## Introducción

    Yaf proporciona a los desarrolladores la capacidad de usar un motor de vistas personalizado
    en lugar del motor integrado [Yaf_View_Simple](#class.yaf-view-simple). Hay
    un ejemplo que explica cómo realizar esto, por favor, veáse
    [Yaf_Dispatcher::setView()](#yaf-dispatcher.setview).

## Sinopsis de la Clase

    ****




      class **Yaf_View_Interface**

     {


    /* Métodos */

abstract public [assign](#yaf-view-interface.assign)([string](#language.types.string) $name, [string](#language.types.string) $value = ?): [bool](#language.types.boolean)
abstract public [display](#yaf-view-interface.display)([string](#language.types.string) $tpl, [array](#language.types.array) $tpl_vars = ?): [bool](#language.types.boolean)
abstract public [getScriptPath](#yaf-view-interface.getscriptpath)(): [void](language.types.void.html)
abstract public [render](#yaf-view-interface.render)([string](#language.types.string) $tpl, [array](#language.types.array) $tpl_vars = ?): [string](#language.types.string)
abstract public [setScriptPath](#yaf-view-interface.setscriptpath)([string](#language.types.string) $template_dir): [void](language.types.void.html)

}

# Yaf_View_Interface::assign

(Yaf &gt;=1.0.0)

Yaf_View_Interface::assign — Asignar valores al motor de Vistas

### Descripción

abstract public **Yaf_View_Interface::assign**([string](#language.types.string) $name, [string](#language.types.string) $value = ?): [bool](#language.types.boolean)

Asigna valores al motor de Vistas, después se pueden acceder a los valores directamente mediante su nombre en la plantilla.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name









    value





### Valores devueltos

# Yaf_View_Interface::display

(Yaf &gt;=1.0.0)

Yaf_View_Interface::display — Interpretar e imprimir una plantilla

### Descripción

abstract public **Yaf_View_Interface::display**([string](#language.types.string) $tpl, [array](#language.types.array) $tpl_vars = ?): [bool](#language.types.boolean)

Interpreta e imprime el resultado inmediatamente.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    tpl









    tpl_vars





### Valores devueltos

# Yaf_View_Interface::getScriptPath

(Yaf &gt;=1.0.0)

Yaf_View_Interface::getScriptPath — El propósito de getScriptPath

### Descripción

abstract public **Yaf_View_Interface::getScriptPath**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_View_Interface::render

(Yaf &gt;=1.0.0)

Yaf_View_Interface::render — Interpretar una plantilla

### Descripción

abstract public **Yaf_View_Interface::render**([string](#language.types.string) $tpl, [array](#language.types.array) $tpl_vars = ?): [string](#language.types.string)

Interpreta una plantilla y devuelve el resultado.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    tpl









    tpl_vars





### Valores devueltos

# Yaf_View_Interface::setScriptPath

(Yaf &gt;=1.0.0)

Yaf_View_Interface::setScriptPath — El propósito de setScriptPath

### Descripción

abstract public **Yaf_View_Interface::setScriptPath**([string](#language.types.string) $template_dir): [void](language.types.void.html)

Establece el directorio base de plantillas. Normalmente es llamado por
[Yaf_Dispatcher](#class.yaf-dispatcher)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    template_dir


      Una ruta absoluta al directorio de plantillas, por omisión,
      [Yaf_Dispatcher](#class.yaf-dispatcher) usa
      [application.directory](#configuration.yaf.directory) . "/views" como este parámetro.


### Valores devueltos

## Tabla de contenidos

- [Yaf_View_Interface::assign](#yaf-view-interface.assign) — Asignar valores al motor de Vistas
- [Yaf_View_Interface::display](#yaf-view-interface.display) — Interpretar e imprimir una plantilla
- [Yaf_View_Interface::getScriptPath](#yaf-view-interface.getscriptpath) — El propósito de getScriptPath
- [Yaf_View_Interface::render](#yaf-view-interface.render) — Interpretar una plantilla
- [Yaf_View_Interface::setScriptPath](#yaf-view-interface.setscriptpath) — El propósito de setScriptPath

# La clase Yaf_View_Simple

(Yaf &gt;=1.0.0)

## Introducción

    **Yaf_View_Simple** es el motor de plantillas incorporade de
    Yaf. Es un motor de plantillas sencillo pero rápido, y sólo soporta plantillas de script
    de PHP.

## Sinopsis de la Clase

    ****




      class **Yaf_View_Simple**


     implements
       [Yaf_View_Interface](#class.yaf-view-interface) {

    /* Propiedades */

     protected
      [$_tpl_vars](#yaf-view-simple.props.tpl-vars);

    protected
      [$_tpl_dir](#yaf-view-simple.props.tpl-dir);



    /* Métodos */

final public [\_\_construct](#yaf-view-simple.construct)([string](#language.types.string) $template_dir, [array](#language.types.array) $options = ?)

    public [assign](#yaf-view-simple.assign)([string](#language.types.string) $name, [mixed](#language.types.mixed) $value = ?): [bool](#language.types.boolean)

public [assignRef](#yaf-view-simple.assignref)([string](#language.types.string) $name, [mixed](#language.types.mixed) &amp;$value): [bool](#language.types.boolean)
public [clear](#yaf-view-simple.clear)([string](#language.types.string) $name = ?): [bool](#language.types.boolean)
public [display](#yaf-view-simple.display)([string](#language.types.string) $tpl, [array](#language.types.array) $tpl_vars = ?): [bool](#language.types.boolean)
public [eval](#yaf-view-simple.eval)([string](#language.types.string) $tpl_content, [array](#language.types.array) $tpl_vars = ?): [string](#language.types.string)
public [\_\_get](#yaf-view-simple.get)([string](#language.types.string) $name = ?): [void](language.types.void.html)
public [getScriptPath](#yaf-view-simple.getscriptpath)(): [string](#language.types.string)
public [\_\_isset](#yaf-view-simple.isset)([string](#language.types.string) $name): [void](language.types.void.html)
public [render](#yaf-view-simple.render)([string](#language.types.string) $tpl, [array](#language.types.array) $tpl_vars = ?): [string](#language.types.string)
public [\_\_set](#yaf-view-simple.set)([string](#language.types.string) $name, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
public [setScriptPath](#yaf-view-simple.setscriptpath)([string](#language.types.string) $template_dir): [bool](#language.types.boolean)

}

## Propiedades

     _tpl_vars







     _tpl_dir






# Yaf_View_Simple::assign

(Yaf &gt;=1.0.0)

Yaf_View_Simple::assign — Asignar valores

### Descripción

public **Yaf_View_Simple::assign**([string](#language.types.string) $name, [mixed](#language.types.mixed) $value = ?): [bool](#language.types.boolean)

Asigna una variable al motor de vistas.

### Parámetros

    name


      Una cadena o un array.




      Si es una cadena se requiere el argumento $value siguiente.






    value


      Valor mixto


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_View_Simple::assign()**

&lt;?php
class IndexController extends Yaf_Controller_Abstract {
public function indexAction() {
$this-&gt;getView()-&gt;assign("foo", "bar");
$this-&gt;\_view-&gt;assign( array( "key" =&gt; "value", "name" =&gt; "value"));
}
}
?&gt;

**Ejemplo #2 Ejemplo de template**

&lt;html&gt;
&lt;head&gt;
&lt;title&gt;&lt;?php echo $foo; ?&gt;&lt;/title&gt;
 &lt;/head&gt;
&lt;body&gt;
  &lt;?php
    foreach ($this-&gt;\_tpl_vars as $name =&gt; $value) {
         echo $$name; // o echo $this-&gt;_tpl_vars[$name];
}
?&gt;
&lt;/body&gt;
&lt;/html&gt;

### Ver también

- [Yaf_View_Simple::assignRef()](#yaf-view-simple.assignref) - El propósito de assignRef

- **Yaf_View_Interface::clear()**

- [Yaf_View_Simple::\_\_set()](#yaf-view-simple.set) - Establece el valor para el motor

# Yaf_View_Simple::assignRef

(Yaf &gt;=1.0.0)

Yaf_View_Simple::assignRef — El propósito de assignRef

### Descripción

public **Yaf_View_Simple::assignRef**([string](#language.types.string) $name, [mixed](#language.types.mixed) &amp;$value): [bool](#language.types.boolean)

A diferencia de [Yaf_View_Simple::assign()](#yaf-view-simple.assign), este método
asigna un valor de referencia al motor.

### Parámetros

    name


      Un nombre como cadena que será usado para acceder al valor de la plantilla.






    value


      Valor mixto


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_View_Simple::assignRef()**

&lt;?php
class IndexController extends Yaf_Controller_Abstract {
public function indexAction() {
$value = "bar";
$this-&gt;getView()-&gt;assign("foo", $value);

        /* por favor, observe que existía un error antes de Yaf 2.1.4,
         * que hacía que lo siguiente imprimiera "bar";
         */
        $dummy = $this-&gt;getView()-&gt;render("index/index.phtml");
        echo $value;

        //prevenir la autointerpretación
        Yaf_Dispatcher::getInstance()-&gt;autoRender(FALSE);
    }

}
?&gt;

**Ejemplo #2 Ejemplo de template**

&lt;html&gt;
&lt;head&gt;
&lt;title&gt;&lt;?php echo $foo; $foo = "cambiado"; ?&gt;&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;/body&gt;
&lt;/html&gt;

Resultado del ejemplo anterior es similar a:

/_ el acceso al controlador index resultará en: _/
cambiado

### Ver también

- [Yaf_View_Simple::assign()](#yaf-view-simple.assign) - Asignar valores

- [Yaf_View_Simple::\_\_set()](#yaf-view-simple.set) - Establece el valor para el motor

# Yaf_View_Simple::clear

(Yaf &gt;=2.2.0)

Yaf_View_Simple::clear — Limpiar valores asignados

### Descripción

public **Yaf_View_Simple::clear**([string](#language.types.string) $name = ?): [bool](#language.types.boolean)

Limpia una variable asignada

### Parámetros

    name


       El nombre de la variable asignada




      Si está vacía, limpiará todas las variables asignadas


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_View_Simple::clear()**

&lt;?php
class IndexController extends Yaf_Controller_Abstract {
public function indexAction() {
$this-&gt;getView()-&gt;clear("foo")-&gt;clear("bar"); // clear "foo" and "bar"
$this-&gt;\_view-&gt;clear(); //clear all assigned variables
}
}
?&gt;

### Ver también

- [Yaf_View_Simple::assignRef()](#yaf-view-simple.assignref) - El propósito de assignRef

- [Yaf_View_Interface::assign()](#yaf-view-interface.assign) - Asignar valores al motor de Vistas

- [Yaf_View_Simple::\_\_set()](#yaf-view-simple.set) - Establece el valor para el motor

# Yaf_View_Simple::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_View_Simple::\_\_construct — El constructor de Yaf_View_Simple

### Descripción

final public **Yaf_View_Simple::\_\_construct**([string](#language.types.string) $template_dir, [array](#language.types.array) $options = ?)

### Parámetros

    template_dir


      El directorio base de las plantillas, por omisión
      es APPLICATOIN . "/views" para Yaf.






    options




Opciones para el motor, a partir de Yaf 2.1.13, se pueden usar etiquetas cortas
"&lt;?=$var?&gt;" en las plantillas (sin tener en cuenta "short_open_tag"),
por lo que viene una opción llamada "short_tag", se puede desactivar
para prevenir el uso de short_tag en las plantillas.

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_View_Simple::\_\_construct()**

&lt;?php
define ("TEMPLATE_DIRECTORY", APPLICATOIN_PATH . '/views');
$view = new Yaf_View_Simple(TEMPLATE_DIRECTORY, array(
'short_tag' =&gt; false //no se permite el uso de etiquetas cortas en las plantillas
));
?&gt;

# Yaf_View_Simple::display

(Yaf &gt;=1.0.0)

Yaf_View_Simple::display — Interpretar y mostrar

### Descripción

public **Yaf_View_Simple::display**([string](#language.types.string) $tpl, [array](#language.types.array) $tpl_vars = ?): [bool](#language.types.boolean)

Interpreta una plantilla y muestra el resultado inmediatamente.

### Parámetros

    tpl









    tpl_vars





### Valores devueltos

# Yaf_View_Simple::eval

(Yaf &gt;=2.2.0)

Yaf_View_Simple::eval — Interpreta una plantilla

### Descripción

public **Yaf_View_Simple::eval**([string](#language.types.string) $tpl_content, [array](#language.types.array) $tpl_vars = ?): [string](#language.types.string)

Interpreta una plantilla de tipo string y devuelve el resultado.

### Parámetros

    tpl_content


      La plantilla de tipo string






    tpl_vars





### Valores devueltos

# Yaf_View_Simple::\_\_get

(Yaf &gt;=1.0.0)

Yaf_View_Simple::\_\_get — Recupera una variable asignada

### Descripción

public **Yaf_View_Simple::\_\_get**([string](#language.types.string) $name = ?): [void](language.types.void.html)

Recupera una variable asignada.

**Nota**:

     El parámetro puede estar vacío desde la versión 2.1.11.

### Parámetros

    name


      El nombre de la variable asignada.




      Si este parámetro está vacío serán devueltas todas las variables asignadas.


### Valores devueltos

# Yaf_View_Simple::getScriptPath

(Yaf &gt;=1.0.0)

Yaf_View_Simple::getScriptPath — Obtiene el directorio de plantillas

### Descripción

public **Yaf_View_Simple::getScriptPath**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_View_Simple::\_\_isset

(Yaf &gt;=1.0.0)

Yaf_View_Simple::**isset — El propósito de **isset

### Descripción

public **Yaf_View_Simple::\_\_isset**([string](#language.types.string) $name): [void](language.types.void.html)

### Parámetros

    name





### Valores devueltos

# Yaf_View_Simple::render

(Yaf &gt;=1.0.0)

Yaf_View_Simple::render — Interpreta una plantilla

### Descripción

public **Yaf_View_Simple::render**([string](#language.types.string) $tpl, [array](#language.types.array) $tpl_vars = ?): [string](#language.types.string)

Interpreta una plantilla y devuelve el resultado.

### Parámetros

    tpl









    tpl_vars





### Valores devueltos

# Yaf_View_Simple::\_\_set

(Yaf &gt;=1.0.0)

Yaf_View_Simple::\_\_set — Establece el valor para el motor

### Descripción

public **Yaf_View_Simple::\_\_set**([string](#language.types.string) $name, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

Esta es una manera alternativa y más sencilla de usar
[Yaf_View_Simple::assign()](#yaf-view-simple.assign).

### Parámetros

    name


      Un nombre de valor de tipo string.






    value


      Valor mixto.


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_View_Simple::\_\_set()**

&lt;?php
class IndexController extends Yaf_Controller_Abstract {
public function indexAction() {
$this-&gt;getView()-&gt;foo = "bar"; // es lo mismo que assign("foo", "bar");
}
}
?&gt;

### Ver también

- [Yaf_View_Simple::assignRef()](#yaf-view-simple.assignref) - El propósito de assignRef

- [Yaf_View_Interface::assign()](#yaf-view-interface.assign) - Asignar valores al motor de Vistas

# Yaf_View_Simple::setScriptPath

(Yaf &gt;=1.0.0)

Yaf_View_Simple::setScriptPath — Establece el directorio de plantillas

### Descripción

public **Yaf_View_Simple::setScriptPath**([string](#language.types.string) $template_dir): [bool](#language.types.boolean)

### Parámetros

    template_dir





### Valores devueltos

## Tabla de contenidos

- [Yaf_View_Simple::assign](#yaf-view-simple.assign) — Asignar valores
- [Yaf_View_Simple::assignRef](#yaf-view-simple.assignref) — El propósito de assignRef
- [Yaf_View_Simple::clear](#yaf-view-simple.clear) — Limpiar valores asignados
- [Yaf_View_Simple::\_\_construct](#yaf-view-simple.construct) — El constructor de Yaf_View_Simple
- [Yaf_View_Simple::display](#yaf-view-simple.display) — Interpretar y mostrar
- [Yaf_View_Simple::eval](#yaf-view-simple.eval) — Interpreta una plantilla
- [Yaf_View_Simple::\_\_get](#yaf-view-simple.get) — Recupera una variable asignada
- [Yaf_View_Simple::getScriptPath](#yaf-view-simple.getscriptpath) — Obtiene el directorio de plantillas
- [Yaf_View_Simple::\_\_isset](#yaf-view-simple.isset) — El propósito de \_\_isset
- [Yaf_View_Simple::render](#yaf-view-simple.render) — Interpreta una plantilla
- [Yaf_View_Simple::\_\_set](#yaf-view-simple.set) — Establece el valor para el motor
- [Yaf_View_Simple::setScriptPath](#yaf-view-simple.setscriptpath) — Establece el directorio de plantillas

# La clase Yaf_Loader

(Yaf &gt;=1.0.0)

## Introducción

    **Yaf_Loader** introduce una solución completa de
    autocarga para Yaf.




    La primera vez que se recupera una instancia de la clase [Yaf_Application](#class.yaf-application),
    **Yaf_Loader** instanciará un singleton, y se registrará a sí mismo con
    spl_autoload. Se recupera una instancia usando el método [Yaf_Loader::getInstance()](#yaf-loader.getinstance)




    **Yaf_Loader** intenta cargar una clase sólo una vez, y si
    falla, dependiendo de [yaf.use_spl_auload](#ini.yaf.use-spl-autoload), si esta configuración
    es "On" [Yaf_Loader::autoload()](#yaf-loader.autoload) devolverá
    **[false](#constant.false)**, y así dará otra oportunidad a otra función de autocarga; si es "Off"
    (por omisión), [Yaf_Loader::autoload()](#yaf-loader.autoload) devolverá
    **[true](#constant.true)**, y lo que es más importante: emitirá una advertencia muy útil
    (muy útil para averiguar por qué no se cargó una clase).

**Nota**:

      Por favor, mantenga yaf.use_spl_autoload en "Off" a menos que exista una biblioteca que
      tenga su propio mecanismo de autocarga y sea imposible reescribirlo.






    Por defecto, **Yaf_Loader** asume que todas las bibliotecas (las clases
    definidas en el script) se almacenan en el [directorio de clases
    global](#ini.yaf.library), el cual está definido en php.ini (yaf.library).





    Si quiere que **Yaf_Loader** busque algunas
    clases (bibliotecas) en el [directorio de
    clases local](#yaf-loader.props.library) (el cual está definido en application.ini, y por omisión
    es [application.directory](#configuration.yaf.directory) . "/libraray"),
    debería registrar el prefijo de clases usando el método
    [Yaf_Loader::registerLocalNameSpace()](#yaf-loader.registerlocalnamespace)





    Veamos algunos ejemplos (asumiendo que APPLICATION_PATH es [application.directory](#configuration.yaf.directory)):



     **Ejemplo #1 Ejemplo de configuración**




// Se asume la siguiente configuración en php.ini:
yaf.library = "/global_dir"

// Se asume la siguiente configuración en application.ini
application.library = APPLICATION_PATH "/library"

    Se asume que el siguiente espacio de nombres local está registrado:

     **Ejemplo #2 Registrar el espacio de nombres local**




&lt;?php
class Bootstrap extends Yaf_Bootstrap_Abstract{
public function \_initLoader($dispatcher) {
Yaf_Loader::getInstance()-&gt;registerLocalNameSpace(array("Foo", "Bar"));
}
}
?&gt;

    Ahora los ejemplos de autocarga:

     **Ejemplo #3 Load class example**




class Foo_Bar_Test =&gt;
// APPLICATION_PATH/library/Foo/Bar/Test.php

class GLO_Name =&gt;
// /global_dir/Glo/Name.php

class BarNon_Test
// /global_dir/Barnon/Test.php

     **Ejemplo #4 Ejemplo de carga de una clase en el espacio de nombres**




class \Foo\Bar\Dummy =&gt;
// APPLICATION_PATH/library/Foo/Bar/Dummy.php

class \FooBar\Bar\Dummy =&gt;
// /global_dir/FooBar/Bar/Dummy.php

    Se puede observar que todas las carpetas tienen la primera letra en mayúsculas, se pueden ponerlas
    en minúsculas estableciendo [yaf.lowcase_path](#ini.yaf.lowcase-path) = On en php.ini





    **Yaf_Loader** también está diseñada para cargar las clases MVC,
    y la regla es:



     **Ejemplo #5 Ejemplo de carga de clase MVC**




Controller Classes =&gt;
// APPLICATION_PATH/controllers/

Model Classes =&gt;
// APPLICATION_PATH/models/

Plugin Classes =&gt;
// APPLICATION_PATH/plugins/

    Yaf identifica un sufijo de clases (por omisión, se puede cambiar
    el sufijo cambiando la opción de configuración [yaf.name_suffix](#ini.yaf.name-suffix)) para decidir si
    es una clase MVC:

     **Ejemplo #6 Distinciones de clases MVC**




Controller Classes =&gt;
// \*\*\*Controller

Model Classes =&gt;
// \*\*\*Model

Plugin Classes =&gt;
// \*\*\*Plugin

    algunos ejemplos:

     **Ejemplo #7 Ejemplo de carga MVC**




class IndexController
// APPLICATION_PATH/controllers/Index.php

class DataModel =&gt;
// APPLICATION_PATH/models/Data.php

class DummyPlugin =&gt;
// APPLICATION_PATH/plugins/Dummy.php

class A_B_TestModel =&gt;
// APPLICATION_PATH/models/A/B/Test.php

    **Nota**:



      A partir de 2.1.18, Yaf admite que los Controllers se autocarguen para el lado del scrpt cliente,
      (lo que significa que la autocarga se desencadena por el script del usuario de php, p.ej., acceder a una
      propiedad de un Controller estático en Bootstrap o Plugins),
      aunque el autocargador solamente intenta localizar el controlador bajo la carpeta del
      módulo predeterminado, que es "APPLICATION_PATH/controllers/".





    también, el directorio será afectado por [yaf.lowcase_path](#ini.yaf.lowcase-path).

## Sinopsis de la Clase

    ****




      class **Yaf_Loader**

     {

    /* Propiedades */

     protected
      [$_local_ns](#yaf-loader.props.local-ns);

    protected
      [$_library](#yaf-loader.props.library);

    protected
      [$_global_library](#yaf-loader.props.global-library);

    static
      [$_instance](#yaf-loader.props.instance);



    /* Métodos */

private [\_\_construct](#yaf-loader.construct)()

    public [autoload](#yaf-loader.autoload)(): [void](language.types.void.html)

public [clearLocalNamespace](#yaf-loader.clearlocalnamespace)(): [void](language.types.void.html)
public static [getInstance](#yaf-loader.getinstance)(): [void](language.types.void.html)
public [getLibraryPath](#yaf-loader.getlibrarypath)([bool](#language.types.boolean) $is_global = **[false](#constant.false)**): [Yaf_Loader](#class.yaf-loader)
public [getLocalNamespace](#yaf-loader.getnamespaces)(): [void](language.types.void.html)
public [getNamespacePath](#yaf-loader.getnamespacepath)([string](#language.types.string) $namespaces): [string](#language.types.string)
public **getNamespaces**(): [array](#language.types.array)
public static [import](#yaf-loader.import)(): [void](language.types.void.html)
public [isLocalName](#yaf-loader.islocalname)(): [void](language.types.void.html)
public [registerLocalNamespace](#yaf-loader.registerlocalnamespace)([mixed](#language.types.mixed) $prefix): [void](language.types.void.html)
public [registerNamespace](#yaf-loader.registernamespace)(string|array $namespaces, [string](#language.types.string) $path = ?): [bool](#language.types.boolean)
public [setLibraryPath](#yaf-loader.setlibrarypath)([string](#language.types.string) $directory, [bool](#language.types.boolean) $is_global = **[false](#constant.false)**): [Yaf_Loader](#class.yaf-loader)

}

## Propiedades

     _local_ns







     _library


       Por omisión, este valor es [application.directory](#configuration.yaf.directory) . "/library",
       se puede cambiar en application.ini (application.library) o llamando al método
       [Yaf_Loader::setLibraryPath()](#yaf-loader.setlibrarypath)






     _global_library







     _instance






# Yaf_Loader::autoload

(Yaf &gt;=1.0.0)

Yaf_Loader::autoload — El propósito de autoload

### Descripción

public **Yaf_Loader::autoload**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Loader::clearLocalNamespace

(Yaf &gt;=1.0.0)

Yaf_Loader::clearLocalNamespace — El propósito de clearLocalNamespace

### Descripción

public **Yaf_Loader::clearLocalNamespace**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Loader::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Loader::**construct — El propósito de **construct

### Descripción

private **Yaf_Loader::\_\_construct**()

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Loader::getInstance

(Yaf &gt;=1.0.0)

Yaf_Loader::getInstance — El propósito de getInstance

### Descripción

public static **Yaf_Loader::getInstance**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Loader::getLibraryPath

(Yaf &gt;=2.1.4)

Yaf_Loader::getLibraryPath — Obtener la ruta de la biblioteca

### Descripción

public **Yaf_Loader::getLibraryPath**([bool](#language.types.boolean) $is_global = **[false](#constant.false)**): [Yaf_Loader](#class.yaf-loader)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Loader::getLocalNamespace

(Yaf &gt;=1.0.0)

Yaf_Loader::getLocalNamespace — El propósito de getLocalNamespace

### Descripción

public [Yaf_Loader::getLocalNamespace](#yaf-loader.getnamespaces)(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Loader::getNamespacePath

(Yaf &gt;=3.2.0)

Yaf_Loader::getNamespacePath — Recupera la ruta de un espacio de nombres registrado

### Descripción

public **Yaf_Loader::getNamespacePath**([string](#language.types.string) $namespaces): [string](#language.types.string)

recupera la ruta de un espacio de nombre registrado

### Parámetros

    namespace


      un string de espacio de nombre.


### Valores devueltos

ruta [string](#language.types.string), si el espacio de nombre no está registrado, entonces **[null](#constant.null)** la biblioteca por defecto será devuelta

### Ejemplos

**Ejemplo #1 Ejemplo de [Yaf_Loader::registerNamespace()](#yaf-loader.registernamespace)**

&lt;?php
$loader = Yaf_Loader::getInstance("/var/application/lib");
$loader-&gt;registerNamespace("\Vendor\PHP", "/var/lib/php");

$loader-&gt;getNamespacePath("\Vendor\PHP"); // '/var/lib/php'
$loader-&gt;getNamespacePath("\Vendor\JSP"); // '/var/application/lib'

?&gt;

# Yaf_Loader::getLocalNamespace

(Yaf &gt;=1.0.0)

Yaf_Loader::getLocalNamespace — Recupera toda la información de un espacio de nombre

### Descripción

public **Yaf_Loader::getNamespaces**(): [array](#language.types.array)

obtener información de espacio de nombre registrados

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

[array](#language.types.array)

# Yaf_Loader::import

(Yaf &gt;=1.0.0)

Yaf_Loader::import — El propósito de import

### Descripción

public static **Yaf_Loader::import**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Loader::isLocalName

(Yaf &gt;=1.0.0)

Yaf_Loader::isLocalName — El propósito de isLocalName

### Descripción

public **Yaf_Loader::isLocalName**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Loader::registerLocalNamespace

(Yaf &gt;=1.0.0)

Yaf_Loader::registerLocalNamespace — Registra un prefijo de clase local

### Descripción

public **Yaf_Loader::registerLocalNamespace**([mixed](#language.types.mixed) $prefix): [void](language.types.void.html)

Registra un nombre de prefijo de clase local. [Yaf_Loader](#class.yaf-loader) busca
clases en dos directorios de bibliotecas, uno se configura mediante [application.library.directory](#configuration.yaf.library) (en
application.ini) al que se le llama directorio de bibliotecas local; el otro se
configura mediante [yaf.library](#ini.yaf.library) (en
php.ini) al que se llamma le directorio de bibliotecas global, ya que puede ser compartido
mediante muchas apliacionies en el mismo servidor.

Al desencadenar una autocarga, [Yaf_Loader](#class.yaf-loader) determinará
en que directorio de bibliotecas debería buscar examinando el nombre de
prefijo del nombre de clase faltante.

Si el nombre de prefijo está registrado como un paquete de nombres local, entonces se le buscará
en el directorio de bibliotecas local, si no, se buscará en el directorio de bibliotecas global.

**Nota**:

     Si yaf.library no está configurado, se asume que el directorio de bibliotecas global es
     el directorio de bibliotecas local. En este caso, todas las auto cargas
     buscarán en el directorio de bibliotecas local.

     Aunque si se quiere que una aplicación Yaf sea fuerte, se han de registrar siempre
     las propias clases como clases locales.

### Parámetros

    prefix


      Un string o un a array con el prefijo del nombre de la clase.
      Todas las clases con este prefijo se cargarán en la ruta de la biblioteca local.


### Valores devueltos

Devuelve un booleano.

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Loader::registerLocalNamespace()**

&lt;?php
$loader = Yaf_Loader::getInstance('/local/library/', '/global/library');
$loader-&gt;registerLocalNamespace("Baidu");
$loader-&gt;registerLocalNamespace(array("Sina", "Weibo"));

$loader-&gt;autoload("Baidu_Name"); // buscar en '/local/library/'
$loader-&gt;autoload("Sina"); // buscar en '/local/library/'
$loader-&gt;autoload("Global_Name");// buscar en '/global/library/'
$loader-&gt;autoload("Foo_Bar"); // buscar en '/global/library/'

?&gt;

# Yaf_Loader::registerNamespace

(Yaf &gt;=3.2.0)

Yaf_Loader::registerNamespace — Registra un espacio de nombre con ruta de búsqueda

### Descripción

public **Yaf_Loader::registerNamespace**(string|array $namespaces, [string](#language.types.string) $path = ?): [bool](#language.types.boolean)

Registra un espacio de nombres con una ruta de búsqueda, [Yaf_Loader](#class.yaf-loader)
busca clases bajo este espacio de nombres en la ruta, el uno es también podría ser
configurado vía [
application.library.directory.namespace](#configuration.yaf.library.namespace)(in application.ini);

**Nota**:

      Yaf sigue pensando que el subrayado es un separador de carpetas.

### Parámetros

    namespace


      un string de espacio de nombre, o un array de espacio de nombres con rutas.






    path


      un string de ruta, es mejor usar la ruta abosoluta aquí para la ejecución.


### Valores devueltos

bool

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Loader::registerNamespace()**

&lt;?php
$loader = Yaf_Loader::getInstance();
$loader-&gt;registerNamespace("\Vendor\PHP", "/var/lib/php");
$loader-&gt;registerNamespace(array(
"\Vendor\ASP" =&gt; "/var/lib/asp",
"\Vendor\JSP" =&gt; "/usr/lib/vendor/",
));

$loader-&gt;autoload("\Vendor\PHP\Dummy");   //load '/var/lib/php/Dummy.php'
$loader-&gt;autoload("\Vendor\PHP\Foo_Bar"); //load '/var/lib/php/Foo/Bar.php'
$loader-&gt;autoload("\Vendor\JSP\Dummy"); //load '/usr/lib/vendor/Dummy.php'

?&gt;

# Yaf_Loader::setLibraryPath

(Yaf &gt;=2.1.4)

Yaf_Loader::setLibraryPath — Cmabiar la ruta de la biblioteca

### Descripción

public **Yaf_Loader::setLibraryPath**([string](#language.types.string) $directory, [bool](#language.types.boolean) $is_global = **[false](#constant.false)**): [Yaf_Loader](#class.yaf-loader)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [Yaf_Loader::autoload](#yaf-loader.autoload) — El propósito de autoload
- [Yaf_Loader::clearLocalNamespace](#yaf-loader.clearlocalnamespace) — El propósito de clearLocalNamespace
- [Yaf_Loader::\_\_construct](#yaf-loader.construct) — El propósito de \_\_construct
- [Yaf_Loader::getInstance](#yaf-loader.getinstance) — El propósito de getInstance
- [Yaf_Loader::getLibraryPath](#yaf-loader.getlibrarypath) — Obtener la ruta de la biblioteca
- [Yaf_Loader::getLocalNamespace](#yaf-loader.getlocalnamespace) — El propósito de getLocalNamespace
- [Yaf_Loader::getNamespacePath](#yaf-loader.getnamespacepath) — Recupera la ruta de un espacio de nombres registrado
- [Yaf_Loader::getLocalNamespace](#yaf-loader.getnamespaces) — Recupera toda la información de un espacio de nombre
- [Yaf_Loader::import](#yaf-loader.import) — El propósito de import
- [Yaf_Loader::isLocalName](#yaf-loader.islocalname) — El propósito de isLocalName
- [Yaf_Loader::registerLocalNamespace](#yaf-loader.registerlocalnamespace) — Registra un prefijo de clase local
- [Yaf_Loader::registerNamespace](#yaf-loader.registernamespace) — Registra un espacio de nombre con ruta de búsqueda
- [Yaf_Loader::setLibraryPath](#yaf-loader.setlibrarypath) — Cmabiar la ruta de la biblioteca

# La clase Yaf_Plugin_Abstract

(Yaf &gt;=1.0.0)

## Introducción

    Los complementos tienen en cuenta una extensibilidad y personalización sencillas del framework.




    Los complementos son clases. La definición real de una clase variará según el
    componente -- se puede necesitar implementar esta interfaz, pero de hecho
    el complemento es en sí mismo una clase.




    Un complemento podría cargarse dentro de Yaf utilizando el método
    [Yaf_Dispatcher::registerPlugin()](#yaf-dispatcher.registerplugin), después de
    registrarlo. Todos los métodos que implementa el complemento según esta
    interfaz, serán llamados a su debido tiempo.

## Ejemplos

    **Ejemplo #1 Plugin example**

&lt;?php
/_ la clase de arranque debería estar definida bajo ./application/Bootstrap.php _/
class Bootstrap extends Yaf_Bootstrap_Abstract {
public function \_initPlugin(Yaf_Dispatcher $dispatcher) {
/_ register a plugin _/
$dispatcher-&gt;registerPlugin(new TestPlugin());
}
}

/_ la clase complemento debería estar ubicada bajo ./application/plugins/ _/
class TestPlugin extends Yaf_Plugin_Abstract {
public function routerStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
/_ before router
en este hook, el usuario puede hacer alguna reescritura de la url _/
var_dump("routerStartup");
}
public function routerShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
/_ router complete
en este hook, el usuario puede hacer un control de acceso _/
var_dump("routerShutdown");
}
public function dispatchLoopStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
var_dump("dispatchLoopStartup");
}
public function preDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
var_dump("preDispatch");
}
public function postDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
var_dump("postDispatch");
}
public function dispatchLoopShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
/_ final hook
en este hook el usuario puede hacer el registro o implementar el diseño _/
var_dump("dispatchLoopShutdown");
}
}

Class IndexController extends Yaf_Controller_Abstract {
public function indexAction() {
return FALSE; //prevent rendering
}
}

$config = array(
"application" =&gt; array(
"directory" =&gt; dirname(**FILE**) . "/application/",
),
);

$app = new Yaf_Application($config);
$app-&gt;bootstrap()-&gt;run();
?&gt;

Resultado del ejemplo anterior es similar a:

string(13) "routerStartup"
string(14) "routerShutdown"
string(19) "dispatchLoopStartup"
string(11) "preDispatch"
string(12) "postDispatch"
string(20) "dispatchLoopShutdown"

## Sinopsis de la Clase

    ****




      class **Yaf_Plugin_Abstract**

     {


    /* Métodos */

public [dispatchLoopShutdown](#yaf-plugin-abstract.dispatchloopshutdown)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request, [Yaf_Response_Abstract](#class.yaf-response-abstract) $response): [void](language.types.void.html)
public [dispatchLoopStartup](#yaf-plugin-abstract.dispatchloopstartup)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request, [Yaf_Response_Abstract](#class.yaf-response-abstract) $response): [void](language.types.void.html)
public [postDispatch](#yaf-plugin-abstract.postdispatch)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request, [Yaf_Response_Abstract](#class.yaf-response-abstract) $response): [void](language.types.void.html)
public [preDispatch](#yaf-plugin-abstract.predispatch)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request, [Yaf_Response_Abstract](#class.yaf-response-abstract) $response): [void](language.types.void.html)
public [preResponse](#yaf-plugin-abstract.preresponse)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request, [Yaf_Response_Abstract](#class.yaf-response-abstract) $response): [void](language.types.void.html)
public [routerShutdown](#yaf-plugin-abstract.routershutdown)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request, [Yaf_Response_Abstract](#class.yaf-response-abstract) $response): [void](language.types.void.html)
public [routerStartup](#yaf-plugin-abstract.routerstartup)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request, [Yaf_Response_Abstract](#class.yaf-response-abstract) $response): [void](language.types.void.html)

}

# Yaf_Plugin_Abstract::dispatchLoopShutdown

(Yaf &gt;=1.0.0)

Yaf_Plugin_Abstract::dispatchLoopShutdown — El propósito de dispatchLoopShutdown

### Descripción

public **Yaf_Plugin_Abstract::dispatchLoopShutdown**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request, [Yaf_Response_Abstract](#class.yaf-response-abstract) $response): [void](language.types.void.html)

Este es el último enganche del sistema de enganches de complementos de Yaf. Si un complemento personalizado
implementa este método, será llamado después de que finalice el bucle
de despachamientos.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    request









    response





### Valores devueltos

### Ver también

- [Yaf_Plugin_Abstract::routerStartup()](#yaf-plugin-abstract.routerstartup) - Enganche deEl propósito de routerStartup

- [Yaf_Plugin_Abstract::routerShutdown()](#yaf-plugin-abstract.routershutdown) - El propósito de routerShutdown

- [Yaf_Plugin_Abstract::dispatchLoopStartup()](#yaf-plugin-abstract.dispatchloopstartup) - Enganchar antes del bucle de envío

- [Yaf_Plugin_Abstract::preDispatch()](#yaf-plugin-abstract.predispatch) - El propósito de preDispatch

- [Yaf_Plugin_Abstract::postDispatch()](#yaf-plugin-abstract.postdispatch) - El propósito de postDispatch

# Yaf_Plugin_Abstract::dispatchLoopStartup

(Yaf &gt;=1.0.0)

Yaf_Plugin_Abstract::dispatchLoopStartup — Enganchar antes del bucle de envío

### Descripción

public **Yaf_Plugin_Abstract::dispatchLoopStartup**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request, [Yaf_Response_Abstract](#class.yaf-response-abstract) $response): [void](language.types.void.html)

### Parámetros

    request









    response





### Valores devueltos

# Yaf_Plugin_Abstract::postDispatch

(Yaf &gt;=1.0.0)

Yaf_Plugin_Abstract::postDispatch — El propósito de postDispatch

### Descripción

public **Yaf_Plugin_Abstract::postDispatch**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request, [Yaf_Response_Abstract](#class.yaf-response-abstract) $response): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    request









    response





### Valores devueltos

# Yaf_Plugin_Abstract::preDispatch

(Yaf &gt;=1.0.0)

Yaf_Plugin_Abstract::preDispatch — El propósito de preDispatch

### Descripción

public **Yaf_Plugin_Abstract::preDispatch**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request, [Yaf_Response_Abstract](#class.yaf-response-abstract) $response): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    request









    response





### Valores devueltos

# Yaf_Plugin_Abstract::preResponse

(Yaf &gt;=1.0.0)

Yaf_Plugin_Abstract::preResponse — El propósito de preResponse

### Descripción

public **Yaf_Plugin_Abstract::preResponse**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request, [Yaf_Response_Abstract](#class.yaf-response-abstract) $response): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    request









    response





### Valores devueltos

# Yaf_Plugin_Abstract::routerShutdown

(Yaf &gt;=1.0.0)

Yaf_Plugin_Abstract::routerShutdown — El propósito de routerShutdown

### Descripción

public **Yaf_Plugin_Abstract::routerShutdown**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request, [Yaf_Response_Abstract](#class.yaf-response-abstract) $response): [void](language.types.void.html)

Este enganche será provocado después de que finalice el proceso de enrutamiento. Este enganche
se usa normalmente para la verificación de identificación.

### Parámetros

    request









    response





### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Plugin_Abstract::routerShutdown()**

&lt;?php
class UserInitPlugin extends Yaf_Plugin_Abstract {

    public function routerShutdown(Yaf_Request_Abstract $petición, Yaf_Response_Abstract $respuesta) {
        $controlador = $petición-&gt;getControllerName();

        /**
         * El uso de accesos a controladores no es necesario para APIs
         */
        if (in_array(strtolower($controlador), array(
            'api',
        ))) {
            return TRUE;
        }

        if (Yaf_Session::getInstance()-&gt;has("login")) {
            return TRUE;
        }

        /* El uso de verificación de acceso falló, se necesita identificarse */
        $respuesta-&gt;setRedirect("http://yourdomain.com/login/");
        return FALSE;
    }

}
?&gt;

### Ver también

- [Yaf_Plugin_Abstract::routerStartup()](#yaf-plugin-abstract.routerstartup) - Enganche deEl propósito de routerStartup

- [Yaf_Plugin_Abstract::dispatchLoopStartup()](#yaf-plugin-abstract.dispatchloopstartup) - Enganchar antes del bucle de envío

- [Yaf_Plugin_Abstract::preDispatch()](#yaf-plugin-abstract.predispatch) - El propósito de preDispatch

- [Yaf_Plugin_Abstract::postDispatch()](#yaf-plugin-abstract.postdispatch) - El propósito de postDispatch

- [Yaf_Plugin_Abstract::dispatchLoopShutdown()](#yaf-plugin-abstract.dispatchloopshutdown) - El propósito de dispatchLoopShutdown

# Yaf_Plugin_Abstract::routerStartup

(Yaf &gt;=1.0.0)

Yaf_Plugin_Abstract::routerStartup — Enganche deEl propósito de routerStartup

### Descripción

public **Yaf_Plugin_Abstract::routerStartup**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request, [Yaf_Response_Abstract](#class.yaf-response-abstract) $response): [void](language.types.void.html)

Este es el primer enchanche del sistema de enganches de complementos de Yaf. Si un complemento personalizado
implementa este método, será llamado antes de enrutar una petición.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    request









    response





### Valores devueltos

### Ver también

- [Yaf_Plugin_Abstract::routerShutdown()](#yaf-plugin-abstract.routershutdown) - El propósito de routerShutdown

- [Yaf_Plugin_Abstract::dispatchLoopStartup()](#yaf-plugin-abstract.dispatchloopstartup) - Enganchar antes del bucle de envío

- [Yaf_Plugin_Abstract::preDispatch()](#yaf-plugin-abstract.predispatch) - El propósito de preDispatch

- [Yaf_Plugin_Abstract::postDispatch()](#yaf-plugin-abstract.postdispatch) - El propósito de postDispatch

- [Yaf_Plugin_Abstract::dispatchLoopShutdown()](#yaf-plugin-abstract.dispatchloopshutdown) - El propósito de dispatchLoopShutdown

## Tabla de contenidos

- [Yaf_Plugin_Abstract::dispatchLoopShutdown](#yaf-plugin-abstract.dispatchloopshutdown) — El propósito de dispatchLoopShutdown
- [Yaf_Plugin_Abstract::dispatchLoopStartup](#yaf-plugin-abstract.dispatchloopstartup) — Enganchar antes del bucle de envío
- [Yaf_Plugin_Abstract::postDispatch](#yaf-plugin-abstract.postdispatch) — El propósito de postDispatch
- [Yaf_Plugin_Abstract::preDispatch](#yaf-plugin-abstract.predispatch) — El propósito de preDispatch
- [Yaf_Plugin_Abstract::preResponse](#yaf-plugin-abstract.preresponse) — El propósito de preResponse
- [Yaf_Plugin_Abstract::routerShutdown](#yaf-plugin-abstract.routershutdown) — El propósito de routerShutdown
- [Yaf_Plugin_Abstract::routerStartup](#yaf-plugin-abstract.routerstartup) — Enganche deEl propósito de routerStartup

# La clase Yaf_Registry

(Yaf &gt;=1.0.0)

## Introducción

    Todos los métodos de la clase **Yaf_Registry** están declarados estáticos,
    haciéndolos universalmente accesibles. Esto proporciona la capacidad de obtener o establecer cualquier
    información personalizada de cualquier modo en el código como sea necesario.

## Sinopsis de la Clase

    ****




      class **Yaf_Registry**

     {

    /* Propiedades */

     static
      [$_instance](#yaf-registry.props.instance);

    protected
      [$_entries](#yaf-registry.props.entries);



    /* Métodos */

private [\_\_construct](#yaf-registry.construct)()

    public static [del](#yaf-registry.del)([string](#language.types.string) $name): [void](language.types.void.html)

public static [get](#yaf-registry.get)([string](#language.types.string) $name): [mixed](#language.types.mixed)
public static [has](#yaf-registry.has)([string](#language.types.string) $name): [bool](#language.types.boolean)
public static [set](#yaf-registry.set)([string](#language.types.string) $name, [string](#language.types.string) $value): [bool](#language.types.boolean)

}

## Propiedades

     _instance







     _entries






# Yaf_Registry::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Registry::\_\_construct — Yaf_Registry implementa «singleton»

### Descripción

private **Yaf_Registry::\_\_construct**()

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Registry::del

(Yaf &gt;=1.0.0)

Yaf_Registry::del — Elimina un elemento del registro

### Descripción

public static **Yaf_Registry::del**([string](#language.types.string) $name): [void](language.types.void.html)

Elimina un elemento del registro.

### Parámetros

    name





### Valores devueltos

# Yaf_Registry::get

(Yaf &gt;=1.0.0)

Yaf_Registry::get — Recupera un elemento del registro

### Descripción

public static **Yaf_Registry::get**([string](#language.types.string) $name): [mixed](#language.types.mixed)

Recupera un elemento del registro.

### Parámetros

    name





### Valores devueltos

# Yaf_Registry::has

(Yaf &gt;=1.0.0)

Yaf_Registry::has — Comprueba si existe un elemento

### Descripción

public static **Yaf_Registry::has**([string](#language.types.string) $name): [bool](#language.types.boolean)

Comprueba si existe un elemento.

### Parámetros

    name





### Valores devueltos

# Yaf_Registry::set

(Yaf &gt;=1.0.0)

Yaf_Registry::set — Añade un elemento al registro

### Descripción

public static **Yaf_Registry::set**([string](#language.types.string) $name, [string](#language.types.string) $value): [bool](#language.types.boolean)

Añade un elemento al registro.

### Parámetros

    name









    value





### Valores devueltos

## Tabla de contenidos

- [Yaf_Registry::\_\_construct](#yaf-registry.construct) — Yaf_Registry implementa «singleton»
- [Yaf_Registry::del](#yaf-registry.del) — Elimina un elemento del registro
- [Yaf_Registry::get](#yaf-registry.get) — Recupera un elemento del registro
- [Yaf_Registry::has](#yaf-registry.has) — Comprueba si existe un elemento
- [Yaf_Registry::set](#yaf-registry.set) — Añade un elemento al registro

# La clase Yaf_Request_Abstract

(Yaf &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yaf_Request_Abstract**

     {

    /* Constantes */

     const
     [string](#language.types.string)
      [SCHEME_HTTP](#yaf-request-abstract.constants.scheme-http) = http;

    const
     [string](#language.types.string)
      [SCHEME_HTTPS](#yaf-request-abstract.constants.scheme-https) = https;


    /* Propiedades */
    public
      [$module](#yaf-request-abstract.props.module);

    public
      [$controller](#yaf-request-abstract.props.controller);

    public
      [$action](#yaf-request-abstract.props.action);

    public
      [$method](#yaf-request-abstract.props.method);

    protected
      [$params](#yaf-request-abstract.props.params);

    protected
      [$language](#yaf-request-abstract.props.language);

    protected
      [$_exception](#yaf-request-abstract.props.exception);

    protected
      [$_base_uri](#yaf-request-abstract.props.base-uri);

    protected
      [$uri](#yaf-request-abstract.props.uri);

    protected
      [$dispatched](#yaf-request-abstract.props.dispatched);

    protected
      [$routed](#yaf-request-abstract.props.routed);



    /* Métodos */

public [clearParams](#yaf-request-abstract.clearparams)(): [bool](#language.types.boolean)
public [getActionName](#yaf-request-abstract.getactionname)(): [void](language.types.void.html)
public [getBaseUri](#yaf-request-abstract.getbaseuri)(): [void](language.types.void.html)
public [getControllerName](#yaf-request-abstract.getcontrollername)(): [void](language.types.void.html)
public [getEnv](#yaf-request-abstract.getenv)([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [void](language.types.void.html)
public [getException](#yaf-request-abstract.getexception)(): [void](language.types.void.html)
public [getLanguage](#yaf-request-abstract.getlanguage)(): [void](language.types.void.html)
public [getMethod](#yaf-request-abstract.getmethod)(): [string](#language.types.string)
public [getModuleName](#yaf-request-abstract.getmodulename)(): [void](language.types.void.html)
public [getParam](#yaf-request-abstract.getparam)([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [mixed](#language.types.mixed)
public [getParams](#yaf-request-abstract.getparams)(): [array](#language.types.array)
public [getRequestUri](#yaf-request-abstract.getrequesturi)(): [void](language.types.void.html)
public [getServer](#yaf-request-abstract.getserver)([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [void](language.types.void.html)
public [isCli](#yaf-request-abstract.iscli)(): [bool](#language.types.boolean)
public [isDispatched](#yaf-request-abstract.isdispatched)(): [bool](#language.types.boolean)
public [isGet](#yaf-request-abstract.isget)(): [bool](#language.types.boolean)
public [isHead](#yaf-request-abstract.ishead)(): [bool](#language.types.boolean)
public [isOptions](#yaf-request-abstract.isoptions)(): [bool](#language.types.boolean)
public [isPost](#yaf-request-abstract.ispost)(): [bool](#language.types.boolean)
public [isPut](#yaf-request-abstract.isput)(): [bool](#language.types.boolean)
public [isRouted](#yaf-request-abstract.isrouted)(): [bool](#language.types.boolean)
public [isXmlHttpRequest](#yaf-request-abstract.isxmlhttprequest)(): [bool](#language.types.boolean)
public [setActionName](#yaf-request-abstract.setactionname)([string](#language.types.string) $action, [bool](#language.types.boolean) $format_name = true): [void](language.types.void.html)
public [setBaseUri](#yaf-request-abstract.setbaseuri)([string](#language.types.string) $uir): [bool](#language.types.boolean)
public [setControllerName](#yaf-request-abstract.setcontrollername)([string](#language.types.string) $controller, [bool](#language.types.boolean) $format_name = true): [void](language.types.void.html)
public [setDispatched](#yaf-request-abstract.setdispatched)(): [void](language.types.void.html)
public [setModuleName](#yaf-request-abstract.setmodulename)([string](#language.types.string) $module, [bool](#language.types.boolean) $format_name = true): [void](language.types.void.html)
public [setParam](#yaf-request-abstract.setparam)([string](#language.types.string) $name, [string](#language.types.string) $value = ?): [bool](#language.types.boolean)
public [setRequestUri](#yaf-request-abstract.setrequesturi)([string](#language.types.string) $uir): [void](language.types.void.html)
public [setRouted](#yaf-request-abstract.setrouted)([string](#language.types.string) $flag = ?): [void](language.types.void.html)

}

## Propiedades

     module







     controller







     action







     method







     params







     language







     _exception







     _base_uri







     uri







     dispatched







     routed






## Constantes predefinidas

     **[Yaf_Request_Abstract::SCHEME_HTTP](#yaf-request-abstract.constants.scheme-http)**








     **[Yaf_Request_Abstract::SCHEME_HTTPS](#yaf-request-abstract.constants.scheme-https)**






# Yaf_Request_Abstract::clearParams

(No version information available, might only be in Git)

Yaf_Request_Abstract::clearParams — Eliminar todos los parámetros

### Descripción

public **Yaf_Request_Abstract::clearParams**(): [bool](#language.types.boolean)

Eliminar todos los parámetros establecidos por el router, o [Yaf_Request_Abstract::setParam()](#yaf-request-abstract.setparam)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

[bool](#language.types.boolean)

### Ver también

- [Yaf_Request_Abstract::isHead()](#yaf-request-abstract.ishead) - Determina si la solicitud es una solicitud HEAD

- [Yaf_Request_Abstract::isGet()](#yaf-request-abstract.isget) - Determina si la solicitud es una solicitud GET

- [Yaf_Request_Abstract::isPost()](#yaf-request-abstract.ispost) - Determina si la solicitud es una solicitud POST

- [Yaf_Request_Abstract::isPut()](#yaf-request-abstract.isput) - Determina si la solicitud es una solicitud PUT

- [Yaf_Request_Abstract::isOptions()](#yaf-request-abstract.isoptions) - Determina si la solicitud es una solicitud de OPCIONES

- [Yaf_Request_Abstract::isXmlHTTPRequest()](#yaf-request-abstract.isxmlhttprequest) - Determina si la solicitud es una solicitud AJAX

# Yaf_Request_Abstract::getActionName

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::getActionName — El propósito de getActionName

### Descripción

public **Yaf_Request_Abstract::getActionName**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Abstract::getBaseUri

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::getBaseUri — El propósito de getBaseUri

### Descripción

public **Yaf_Request_Abstract::getBaseUri**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Abstract::getControllerName

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::getControllerName — El propósito de getControllerName

### Descripción

public **Yaf_Request_Abstract::getControllerName**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Abstract::getEnv

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::getEnv — Recupera la variable ENV

### Descripción

public **Yaf_Request_Abstract::getEnv**([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [void](language.types.void.html)

Recupera la variable ENV.

### Parámetros

    name


      El nombre de la varaible.






    default


      Si se proporciona este parámetro, se devolverá si la variable no puede
      ser encontrada.


### Valores devueltos

Devuelve un string

### Ver también

- [Yaf_Request_Abstract::getServer()](#yaf-request-abstract.getserver) - Recupera la variable SERVER

- [Yaf_Request_Abstract::getParam()](#yaf-request-abstract.getparam) - Recupera el parámetro de llamada

# Yaf_Request_Abstract::getException

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::getException — El propósito de getException

### Descripción

public **Yaf_Request_Abstract::getException**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Abstract::getLanguage

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::getLanguage — Recupera el lenguaje preferido del cliente

### Descripción

public **Yaf_Request_Abstract::getLanguage**(): [void](language.types.void.html)

Recuperar el lenguaje preferido del cliente

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string

# Yaf_Request_Abstract::getMethod

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::getMethod — Recupera el método de solicitud

### Descripción

public **Yaf_Request_Abstract::getMethod**(): [string](#language.types.string)

    Recuperar el método de solicitud

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string, como "POST", "GET", etc.

### Ver también

- [Yaf_Request_Abstract::isHead()](#yaf-request-abstract.ishead) - Determina si la solicitud es una solicitud HEAD

- [Yaf_Request_Abstract::isCli()](#yaf-request-abstract.iscli) - Determina si la solicitud es una solicitud CLI

- [Yaf_Request_Abstract::isPost()](#yaf-request-abstract.ispost) - Determina si la solicitud es una solicitud POST

- [Yaf_Request_Abstract::isPut()](#yaf-request-abstract.isput) - Determina si la solicitud es una solicitud PUT

- [Yaf_Request_Abstract::isOptions()](#yaf-request-abstract.isoptions) - Determina si la solicitud es una solicitud de OPCIONES

- [Yaf_Request_Abstract::isXmlHTTPRequest()](#yaf-request-abstract.isxmlhttprequest) - Determina si la solicitud es una solicitud AJAX

# Yaf_Request_Abstract::getModuleName

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::getModuleName — El propósito de getModuleName

### Descripción

public **Yaf_Request_Abstract::getModuleName**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Abstract::getParam

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::getParam — Recupera el parámetro de llamada

### Descripción

public **Yaf_Request_Abstract::getParam**([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [mixed](#language.types.mixed)

Recuperar el parámetro de llamada

### Parámetros

    name









    default





### Valores devueltos

### Ver también

- [Yaf_Request_Abstract::setParam()](#yaf-request-abstract.setparam) - Establecer un argumento de llamada a una petición

# Yaf_Request_Abstract::getParams

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::getParams — Recupera todos los parámetros de llamada

### Descripción

public **Yaf_Request_Abstract::getParams**(): [array](#language.types.array)

Recuperar todos los parámetros de llamada

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [Yaf_Request_Abstract::setParam()](#yaf-request-abstract.setparam) - Establecer un argumento de llamada a una petición

# Yaf_Request_Abstract::getRequestUri

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::getRequestUri — El propósito de getRequestUri

### Descripción

public **Yaf_Request_Abstract::getRequestUri**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Abstract::getServer

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::getServer — Recupera la variable SERVER

### Descripción

public **Yaf_Request_Abstract::getServer**([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [void](language.types.void.html)

Recupera la variable SERVER.

### Parámetros

    name


      El nombre de la variable






    default


      Si se proporciona este parámetro, se devolverá si la variable no puede
      ser encontrada.


### Valores devueltos

### Ver también

- [Yaf_Request_Abstract::getParam()](#yaf-request-abstract.getparam) - Recupera el parámetro de llamada

- [Yaf_Request_Abstract::getEnv()](#yaf-request-abstract.getenv) - Recupera la variable ENV

# Yaf_Request_Abstract::isCli

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::isCli — Determina si la solicitud es una solicitud CLI

### Descripción

public **Yaf_Request_Abstract::isCli**(): [bool](#language.types.boolean)

Determinar si la solicitud es una solicitud CLI

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

boolean

### Ver también

- [Yaf_Request_Abstract::isHead()](#yaf-request-abstract.ishead) - Determina si la solicitud es una solicitud HEAD

- [Yaf_Request_Abstract::isGet()](#yaf-request-abstract.isget) - Determina si la solicitud es una solicitud GET

- [Yaf_Request_Abstract::isPost()](#yaf-request-abstract.ispost) - Determina si la solicitud es una solicitud POST

- [Yaf_Request_Abstract::isPut()](#yaf-request-abstract.isput) - Determina si la solicitud es una solicitud PUT

- [Yaf_Request_Abstract::isOptions()](#yaf-request-abstract.isoptions) - Determina si la solicitud es una solicitud de OPCIONES

- [Yaf_Request_Abstract::isXmlHTTPRequest()](#yaf-request-abstract.isxmlhttprequest) - Determina si la solicitud es una solicitud AJAX

# Yaf_Request_Abstract::isDispatched

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::isDispatched — Determina si la solicitud es enviada

### Descripción

public **Yaf_Request_Abstract::isDispatched**(): [bool](#language.types.boolean)

Determinar si la solicitud es enviada

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

boolean

### Ver también

- [Yaf_Dispatcher::dispatch()](#yaf-dispatcher.dispatch) - Despachar una petición

# Yaf_Request_Abstract::isGet

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::isGet — Determina si la solicitud es una solicitud GET

### Descripción

public **Yaf_Request_Abstract::isGet**(): [bool](#language.types.boolean)

Determinar si la solicitud es una solicitud GET

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

boolean

### Ver también

- [Yaf_Request_Abstract::isHead()](#yaf-request-abstract.ishead) - Determina si la solicitud es una solicitud HEAD

- [Yaf_Request_Abstract::isCli()](#yaf-request-abstract.iscli) - Determina si la solicitud es una solicitud CLI

- [Yaf_Request_Abstract::isPost()](#yaf-request-abstract.ispost) - Determina si la solicitud es una solicitud POST

- [Yaf_Request_Abstract::isPut()](#yaf-request-abstract.isput) - Determina si la solicitud es una solicitud PUT

- [Yaf_Request_Abstract::isOptions()](#yaf-request-abstract.isoptions) - Determina si la solicitud es una solicitud de OPCIONES

- [Yaf_Request_Abstract::isXmlHTTPRequest()](#yaf-request-abstract.isxmlhttprequest) - Determina si la solicitud es una solicitud AJAX

# Yaf_Request_Abstract::isHead

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::isHead — Determina si la solicitud es una solicitud HEAD

### Descripción

public **Yaf_Request_Abstract::isHead**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

boolean

### Ver también

- [Yaf_Request_Abstract::isGet()](#yaf-request-abstract.isget) - Determina si la solicitud es una solicitud GET

- [Yaf_Request_Abstract::isCli()](#yaf-request-abstract.iscli) - Determina si la solicitud es una solicitud CLI

- [Yaf_Request_Abstract::isPost()](#yaf-request-abstract.ispost) - Determina si la solicitud es una solicitud POST

- [Yaf_Request_Abstract::isPut()](#yaf-request-abstract.isput) - Determina si la solicitud es una solicitud PUT

- [Yaf_Request_Abstract::isOptions()](#yaf-request-abstract.isoptions) - Determina si la solicitud es una solicitud de OPCIONES

- [Yaf_Request_Abstract::isXmlHTTPRequest()](#yaf-request-abstract.isxmlhttprequest) - Determina si la solicitud es una solicitud AJAX

# Yaf_Request_Abstract::isOptions

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::isOptions — Determina si la solicitud es una solicitud de OPCIONES

### Descripción

public **Yaf_Request_Abstract::isOptions**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

boolean

# Yaf_Request_Abstract::isPost

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::isPost — Determina si la solicitud es una solicitud POST

### Descripción

public **Yaf_Request_Abstract::isPost**(): [bool](#language.types.boolean)

Determinar si la solicitud es una solicitud POST

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

boolean

### Ver también

- [Yaf_Request_Abstract::isGet()](#yaf-request-abstract.isget) - Determina si la solicitud es una solicitud GET

- [Yaf_Request_Abstract::isCli()](#yaf-request-abstract.iscli) - Determina si la solicitud es una solicitud CLI

- [Yaf_Request_Abstract::isHead()](#yaf-request-abstract.ishead) - Determina si la solicitud es una solicitud HEAD

- [Yaf_Request_Abstract::isPut()](#yaf-request-abstract.isput) - Determina si la solicitud es una solicitud PUT

- [Yaf_Request_Abstract::isOptions()](#yaf-request-abstract.isoptions) - Determina si la solicitud es una solicitud de OPCIONES

- [Yaf_Request_Abstract::isXmlHTTPRequest()](#yaf-request-abstract.isxmlhttprequest) - Determina si la solicitud es una solicitud AJAX

# Yaf_Request_Abstract::isPut

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::isPut — Determina si la solicitud es una solicitud PUT

### Descripción

public **Yaf_Request_Abstract::isPut**(): [bool](#language.types.boolean)

Determinar si la solicitud es una solicitud PUT

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

boolean

### Ver también

- [Yaf_Request_Abstract::isHead()](#yaf-request-abstract.ishead) - Determina si la solicitud es una solicitud HEAD

- [Yaf_Request_Abstract::isCli()](#yaf-request-abstract.iscli) - Determina si la solicitud es una solicitud CLI

- [Yaf_Request_Abstract::isPost()](#yaf-request-abstract.ispost) - Determina si la solicitud es una solicitud POST

- [Yaf_Request_Abstract::isGet()](#yaf-request-abstract.isget) - Determina si la solicitud es una solicitud GET

- [Yaf_Request_Abstract::isOptions()](#yaf-request-abstract.isoptions) - Determina si la solicitud es una solicitud de OPCIONES

- [Yaf_Request_Abstract::isXmlHTTPRequest()](#yaf-request-abstract.isxmlhttprequest) - Determina si la solicitud es una solicitud AJAX

# Yaf_Request_Abstract::isRouted

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::isRouted — Determina si la solicitud ha sido enrutada

### Descripción

public **Yaf_Request_Abstract::isRouted**(): [bool](#language.types.boolean)

Determinar si la solicitud ha sido enrutada

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

boolean

# Yaf_Request_Abstract::isXmlHttpRequest

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::isXmlHttpRequest — Determina si la solicitud es una solicitud AJAX

### Descripción

public **Yaf_Request_Abstract::isXmlHttpRequest**(): [bool](#language.types.boolean)

Determinar si la solicitud es una solicitud AJAX

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

boolean

### Ver también

- [Yaf_Request_Abstract::isHead()](#yaf-request-abstract.ishead) - Determina si la solicitud es una solicitud HEAD

- [Yaf_Request_Abstract::isCli()](#yaf-request-abstract.iscli) - Determina si la solicitud es una solicitud CLI

- [Yaf_Request_Abstract::isPost()](#yaf-request-abstract.ispost) - Determina si la solicitud es una solicitud POST

- [Yaf_Request_Abstract::isPut()](#yaf-request-abstract.isput) - Determina si la solicitud es una solicitud PUT

- [Yaf_Request_Abstract::isOptions()](#yaf-request-abstract.isoptions) - Determina si la solicitud es una solicitud de OPCIONES

- [Yaf_Request_Abstract::isGet()](#yaf-request-abstract.isget) - Determina si la solicitud es una solicitud GET

# Yaf_Request_Abstract::setActionName

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::setActionName — Establece el nombre de la acción

### Descripción

public **Yaf_Request_Abstract::setActionName**([string](#language.types.string) $action, [bool](#language.types.boolean) $format_name = true): [void](language.types.void.html)

Establecer el nombre de la acción a solicitar, esto es usualmente usado por el enrutador personalizado para establecer el nombre del controlador de resultado de ruta.

### Parámetros

    action


      nombre de la acción como [string](#language.types.string), debe ser en minúsculas, como "index" o "foo_bar"






    format_name


      esto se introduce en Yaf 3.2.0, por omisión Yaf formateará el nombre en minúsculas,
      si este se establece a **[false](#constant.false)** , Yaf pondrá el nombre original a la petición.


### Valores devueltos

# Yaf_Request_Abstract::setBaseUri

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::setBaseUri — Establecer el URI base

### Descripción

public **Yaf_Request_Abstract::setBaseUri**([string](#language.types.string) $uir): [bool](#language.types.boolean)

Establece el URI base. El URI base se usa al enrutar. En la fase de enrutamiento, el
URI solicitado se usa para enrutar una petición, mientras que es URI base para saltar la
parte anterior(URI base) del URI solicitado.

Esto es, si viene una petición con un URI solicitado como a/b/c, si se establece el URI
base a "a/b", se usará solamente "/c" en la fase de enrutamiento.

**Nota**:

     Generalmente, no es necesario establecer esto, Yaf lo determinará automáticamente.

### Parámetros

    uir


      El URI base


### Valores devueltos

booleano

# Yaf_Request_Abstract::setControllerName

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::setControllerName — Establecer el nombre del controlador

### Descripción

public **Yaf_Request_Abstract::setControllerName**([string](#language.types.string) $controller, [bool](#language.types.boolean) $format_name = true): [void](language.types.void.html)

Establecer el nombre del controlador a solicitar, esto es generalmente utilizado por el enrutador personalizado para establecer el nombre del controlador de resultado de ruta.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    controller


      [string](#language.types.string), nombre del controlador, debe ser en estilo camel, como "Index" o "Foo_Bar".






    format_name


      esto se introduce en Yaf 3.2.0, por defecto Yaf formateará el nombre en modo camel,
      si esto se establece a **[false](#constant.false)**, Yaf establecerá el nombre original a petición.


### Valores devueltos

# Yaf_Request_Abstract::setDispatched

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::setDispatched — El propósito de setDispatched

### Descripción

public **Yaf_Request_Abstract::setDispatched**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Abstract::setModuleName

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::setModuleName — Establecer el nombre del módulo

### Descripción

public **Yaf_Request_Abstract::setModuleName**([string](#language.types.string) $module, [bool](#language.types.boolean) $format_name = true): [void](language.types.void.html)

Establecer el nombre del módulo a la petición, esto se utiliza generalmente por un enrutador personalizado para establecer el nombre del módulo del resultado de la ruta.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    module


      [string](#language.types.string) nombre del módulo, debe estar en estilo camel, como "Index" o "Foo_Bar"






    format_name


      Esto se introdujo en Yaf 3.2.0, por omisión Yaf formateará el nombre en modo camel,
      si esto se establece como **[false](#constant.false)**, Yaf establecerá el nombre original a la petición.


### Valores devueltos

# Yaf_Request_Abstract::setParam

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::setParam — Establecer un argumento de llamada a una petición

### Descripción

public **Yaf_Request_Abstract::setParam**([string](#language.types.string) $name, [string](#language.types.string) $value = ?): [bool](#language.types.boolean)

Establecer un argumento a la petición, que puede ser recuperado por [Yaf_Request_Abstract::getParam()](#yaf-request-abstract.getparam)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name









    value





### Valores devueltos

### Ver también

- [Yaf_Request_Abstract::getParam()](#yaf-request-abstract.getparam) - Recupera el parámetro de llamada

- [Yaf_Request_Abstract::getParams()](#yaf-request-abstract.getparams) - Recupera todos los parámetros de llamada

# Yaf_Request_Abstract::setRequestUri

(Yaf &gt;=2.1.0)

Yaf_Request_Abstract::setRequestUri — El propósito de setRequestUri

### Descripción

public **Yaf_Request_Abstract::setRequestUri**([string](#language.types.string) $uir): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    uir





### Valores devueltos

# Yaf_Request_Abstract::setRouted

(Yaf &gt;=1.0.0)

Yaf_Request_Abstract::setRouted — El propósito de setRouted

### Descripción

public **Yaf_Request_Abstract::setRouted**([string](#language.types.string) $flag = ?): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    flag





### Valores devueltos

## Tabla de contenidos

- [Yaf_Request_Abstract::clearParams](#yaf-request-abstract.clearparams) — Eliminar todos los parámetros
- [Yaf_Request_Abstract::getActionName](#yaf-request-abstract.getactionname) — El propósito de getActionName
- [Yaf_Request_Abstract::getBaseUri](#yaf-request-abstract.getbaseuri) — El propósito de getBaseUri
- [Yaf_Request_Abstract::getControllerName](#yaf-request-abstract.getcontrollername) — El propósito de getControllerName
- [Yaf_Request_Abstract::getEnv](#yaf-request-abstract.getenv) — Recupera la variable ENV
- [Yaf_Request_Abstract::getException](#yaf-request-abstract.getexception) — El propósito de getException
- [Yaf_Request_Abstract::getLanguage](#yaf-request-abstract.getlanguage) — Recupera el lenguaje preferido del cliente
- [Yaf_Request_Abstract::getMethod](#yaf-request-abstract.getmethod) — Recupera el método de solicitud
- [Yaf_Request_Abstract::getModuleName](#yaf-request-abstract.getmodulename) — El propósito de getModuleName
- [Yaf_Request_Abstract::getParam](#yaf-request-abstract.getparam) — Recupera el parámetro de llamada
- [Yaf_Request_Abstract::getParams](#yaf-request-abstract.getparams) — Recupera todos los parámetros de llamada
- [Yaf_Request_Abstract::getRequestUri](#yaf-request-abstract.getrequesturi) — El propósito de getRequestUri
- [Yaf_Request_Abstract::getServer](#yaf-request-abstract.getserver) — Recupera la variable SERVER
- [Yaf_Request_Abstract::isCli](#yaf-request-abstract.iscli) — Determina si la solicitud es una solicitud CLI
- [Yaf_Request_Abstract::isDispatched](#yaf-request-abstract.isdispatched) — Determina si la solicitud es enviada
- [Yaf_Request_Abstract::isGet](#yaf-request-abstract.isget) — Determina si la solicitud es una solicitud GET
- [Yaf_Request_Abstract::isHead](#yaf-request-abstract.ishead) — Determina si la solicitud es una solicitud HEAD
- [Yaf_Request_Abstract::isOptions](#yaf-request-abstract.isoptions) — Determina si la solicitud es una solicitud de OPCIONES
- [Yaf_Request_Abstract::isPost](#yaf-request-abstract.ispost) — Determina si la solicitud es una solicitud POST
- [Yaf_Request_Abstract::isPut](#yaf-request-abstract.isput) — Determina si la solicitud es una solicitud PUT
- [Yaf_Request_Abstract::isRouted](#yaf-request-abstract.isrouted) — Determina si la solicitud ha sido enrutada
- [Yaf_Request_Abstract::isXmlHttpRequest](#yaf-request-abstract.isxmlhttprequest) — Determina si la solicitud es una solicitud AJAX
- [Yaf_Request_Abstract::setActionName](#yaf-request-abstract.setactionname) — Establece el nombre de la acción
- [Yaf_Request_Abstract::setBaseUri](#yaf-request-abstract.setbaseuri) — Establecer el URI base
- [Yaf_Request_Abstract::setControllerName](#yaf-request-abstract.setcontrollername) — Establecer el nombre del controlador
- [Yaf_Request_Abstract::setDispatched](#yaf-request-abstract.setdispatched) — El propósito de setDispatched
- [Yaf_Request_Abstract::setModuleName](#yaf-request-abstract.setmodulename) — Establecer el nombre del módulo
- [Yaf_Request_Abstract::setParam](#yaf-request-abstract.setparam) — Establecer un argumento de llamada a una petición
- [Yaf_Request_Abstract::setRequestUri](#yaf-request-abstract.setrequesturi) — El propósito de setRequestUri
- [Yaf_Request_Abstract::setRouted](#yaf-request-abstract.setrouted) — El propósito de setRouted

# La clase Yaf_Request_Http

(Yaf &gt;=1.0.0)

## Introducción

    Cualquier petición de un cliente se inicializa como un
    **Yaf_Request_Http**.
    Se puede obtener la información de la petición, como la consulta de URI y
    los parámetros de POST, mediante los métodos de esta clase.

**Nota**:

      Por seguridad, $_GET/$_POST son de solo lectura en Yaf, lo que significa
      que si se establece un valor en esta variables globales, este no se podrá obtener desde
      [Yaf_Request_Http::getQuery()](#yaf-request-http.getquery) o
      [Yaf_Request_Http::getPost()](#yaf-request-http.getpost).




      Aunque si fuera necesaria tal característica, como en las pruebas unitarias,
      Yaf se puede construir con --enable-yaf-debug, la cual permite a Yaf leer el
      valor establecido por el usuario mediante script.




      En tal caso, Yaf lanzará un aviso E_STRICT para recordarlo:
      Strict Standards: you are running yaf in debug mode


## Sinopsis de la Clase

    ****




      class **Yaf_Request_Http**



      extends
       [Yaf_Request_Abstract](#class.yaf-request-abstract)

     {

    /* Propiedades */


    /* Métodos */

public [\_\_construct](#yaf-request-http.construct)([string](#language.types.string) $request_uri = ?, [string](#language.types.string) $base_uri = ?)

    public [get](#yaf-request-http.get)([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [mixed](#language.types.mixed)

public [getCookie](#yaf-request-http.getcookie)([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [mixed](#language.types.mixed)
public [getFiles](#yaf-request-http.getfiles)(): [void](language.types.void.html)
public [getPost](#yaf-request-http.getpost)([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [mixed](#language.types.mixed)
public [getQuery](#yaf-request-http.getquery)([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [mixed](#language.types.mixed)
public [getRaw](#yaf-request-http.getraw)(): [mixed](#language.types.mixed)
public [getRequest](#yaf-request-http.getrequest)(): [void](language.types.void.html)
public [isXmlHttpRequest](#yaf-request-http.isxmlhttprequest)(): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [Yaf_Request_Abstract::clearParams](#yaf-request-abstract.clearparams)(): [bool](#language.types.boolean)

public [Yaf_Request_Abstract::getActionName](#yaf-request-abstract.getactionname)(): [void](language.types.void.html)
public [Yaf_Request_Abstract::getBaseUri](#yaf-request-abstract.getbaseuri)(): [void](language.types.void.html)
public [Yaf_Request_Abstract::getControllerName](#yaf-request-abstract.getcontrollername)(): [void](language.types.void.html)
public [Yaf_Request_Abstract::getEnv](#yaf-request-abstract.getenv)([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [void](language.types.void.html)
public [Yaf_Request_Abstract::getException](#yaf-request-abstract.getexception)(): [void](language.types.void.html)
public [Yaf_Request_Abstract::getLanguage](#yaf-request-abstract.getlanguage)(): [void](language.types.void.html)
public [Yaf_Request_Abstract::getMethod](#yaf-request-abstract.getmethod)(): [string](#language.types.string)
public [Yaf_Request_Abstract::getModuleName](#yaf-request-abstract.getmodulename)(): [void](language.types.void.html)
public [Yaf_Request_Abstract::getParam](#yaf-request-abstract.getparam)([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [mixed](#language.types.mixed)
public [Yaf_Request_Abstract::getParams](#yaf-request-abstract.getparams)(): [array](#language.types.array)
public [Yaf_Request_Abstract::getRequestUri](#yaf-request-abstract.getrequesturi)(): [void](language.types.void.html)
public [Yaf_Request_Abstract::getServer](#yaf-request-abstract.getserver)([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [void](language.types.void.html)
public [Yaf_Request_Abstract::isCli](#yaf-request-abstract.iscli)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::isDispatched](#yaf-request-abstract.isdispatched)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::isGet](#yaf-request-abstract.isget)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::isHead](#yaf-request-abstract.ishead)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::isOptions](#yaf-request-abstract.isoptions)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::isPost](#yaf-request-abstract.ispost)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::isPut](#yaf-request-abstract.isput)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::isRouted](#yaf-request-abstract.isrouted)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::isXmlHttpRequest](#yaf-request-abstract.isxmlhttprequest)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::setActionName](#yaf-request-abstract.setactionname)([string](#language.types.string) $action, [bool](#language.types.boolean) $format_name = true): [void](language.types.void.html)
public [Yaf_Request_Abstract::setBaseUri](#yaf-request-abstract.setbaseuri)([string](#language.types.string) $uir): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::setControllerName](#yaf-request-abstract.setcontrollername)([string](#language.types.string) $controller, [bool](#language.types.boolean) $format_name = true): [void](language.types.void.html)
public [Yaf_Request_Abstract::setDispatched](#yaf-request-abstract.setdispatched)(): [void](language.types.void.html)
public [Yaf_Request_Abstract::setModuleName](#yaf-request-abstract.setmodulename)([string](#language.types.string) $module, [bool](#language.types.boolean) $format_name = true): [void](language.types.void.html)
public [Yaf_Request_Abstract::setParam](#yaf-request-abstract.setparam)([string](#language.types.string) $name, [string](#language.types.string) $value = ?): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::setRequestUri](#yaf-request-abstract.setrequesturi)([string](#language.types.string) $uir): [void](language.types.void.html)
public [Yaf_Request_Abstract::setRouted](#yaf-request-abstract.setrouted)([string](#language.types.string) $flag = ?): [void](language.types.void.html)

}

## Propiedades

     module







     controller







     action







     method







     params







     language







     _exception







     _base_uri







     uri







     dispatched







     routed






# Yaf_Request_Http::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Request_Http::\_\_construct — Constructor de Yaf_Request_Http

### Descripción

public **Yaf_Request_Http::\_\_construct**([string](#language.types.string) $request_uri = ?, [string](#language.types.string) $base_uri = ?)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Http::get

(Yaf &gt;=1.0.0)

Yaf_Request_Http::get — Recupera una variable del cliente

### Descripción

public **Yaf_Request_Http::get**([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [mixed](#language.types.mixed)

Recupera una variable del cliente. Este método buscará el nombre dado por
name en los parámetros de solicitud, y si no se encuetra el nombre,
buscará en POST, GET, Cookie, Server

### Parámetros

    name


      El nombre de la variable.






    default


      Si se proporciona este parámetro, será devuelto si no se pudo
      encontrar la variable.


### Valores devueltos

### Ver también

- [Yaf_Request_Http::getQuery()](#yaf-request-http.getquery) - Obtiene un parámetro de una consulta

- [Yaf_Request_Http::getPost()](#yaf-request-http.getpost) - Recupera una variable de POST

- [Yaf_Request_Http::getCookie()](#yaf-request-http.getcookie) - Recupera una varible de Cookie

- [Yaf_Request_Http::getRaw()](#yaf-request-http.getraw) - Recupera el cuerpo de la solicitud de raw

- [Yaf_Request_Abstract::getServer()](#yaf-request-abstract.getserver) - Recupera la variable SERVER

- [Yaf_Request_Abstract::getParam()](#yaf-request-abstract.getparam) - Recupera el parámetro de llamada

# Yaf_Request_Http::getCookie

(Yaf &gt;=1.0.0)

Yaf_Request_Http::getCookie — Recupera una varible de Cookie

### Descripción

public **Yaf_Request_Http::getCookie**([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [mixed](#language.types.mixed)

Recupera una varible de Cookie.

### Parámetros

    name


      El nombre de la cookie.






    default


      Si se proporciona este parámetro, será devuelto si no se pudo
      encontrar la cookie.


### Valores devueltos

### Ver también

- [Yaf_Request_Http::get()](#yaf-request-http.get) - Recupera una variable del cliente

- [Yaf_Request_Http::getQuery()](#yaf-request-http.getquery) - Obtiene un parámetro de una consulta

- [Yaf_Request_Http::getPost()](#yaf-request-http.getpost) - Recupera una variable de POST

- [Yaf_Request_Http::getRaw()](#yaf-request-http.getraw) - Recupera el cuerpo de la solicitud de raw

- [Yaf_Request_Abstract::getServer()](#yaf-request-abstract.getserver) - Recupera la variable SERVER

- [Yaf_Request_Abstract::getParam()](#yaf-request-abstract.getparam) - Recupera el parámetro de llamada

# Yaf_Request_Http::getFiles

(Yaf &gt;=1.0.0)

Yaf_Request_Http::getFiles — El propósito de getFiles

### Descripción

public **Yaf_Request_Http::getFiles**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Http::getPost

(Yaf &gt;=1.0.0)

Yaf_Request_Http::getPost — Recupera una variable de POST

### Descripción

public **Yaf_Request_Http::getPost**([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [mixed](#language.types.mixed)

Recupera una variable de POST.

### Parámetros

    name


      El nombre de la variable.






    default


      Si se proporciona este parámetro, será devuelto si no se pudo
      encontrar la variable.


### Valores devueltos

### Ver también

- [Yaf_Request_Http::get()](#yaf-request-http.get) - Recupera una variable del cliente

- [Yaf_Request_Http::getQuery()](#yaf-request-http.getquery) - Obtiene un parámetro de una consulta

- [Yaf_Request_Http::getCookie()](#yaf-request-http.getcookie) - Recupera una varible de Cookie

- [Yaf_Request_Http::getRaw()](#yaf-request-http.getraw) - Recupera el cuerpo de la solicitud de raw

- [Yaf_Request_Abstract::getServer()](#yaf-request-abstract.getserver) - Recupera la variable SERVER

- [Yaf_Request_Abstract::getParam()](#yaf-request-abstract.getparam) - Recupera el parámetro de llamada

# Yaf_Request_Http::getQuery

(Yaf &gt;=1.0.0)

Yaf_Request_Http::getQuery — Obtiene un parámetro de una consulta

### Descripción

public **Yaf_Request_Http::getQuery**([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [mixed](#language.types.mixed)

Recupera una variable de GET.

### Parámetros

    name


      El nombre de la variable.






    default


      Si se proporciona este parámetro, será devuelto si no se pudo
      encontrar la variable.


### Valores devueltos

### Ver también

- [Yaf_Request_Http::get()](#yaf-request-http.get) - Recupera una variable del cliente

- [Yaf_Request_Http::getPost()](#yaf-request-http.getpost) - Recupera una variable de POST

- [Yaf_Request_Http::getCookie()](#yaf-request-http.getcookie) - Recupera una varible de Cookie

- [Yaf_Request_Http::getRaw()](#yaf-request-http.getraw) - Recupera el cuerpo de la solicitud de raw

- [Yaf_Request_Abstract::getServer()](#yaf-request-abstract.getserver) - Recupera la variable SERVER

- [Yaf_Request_Abstract::getParam()](#yaf-request-abstract.getparam) - Recupera el parámetro de llamada

# Yaf_Request_Http::getRaw

(Yaf &gt;=3.0.7)

Yaf_Request_Http::getRaw — Recupera el cuerpo de la solicitud de raw

### Descripción

public **Yaf_Request_Http::getRaw**(): [mixed](#language.types.mixed)

    Recupera el cuerpo de la solicitud de raw

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string en caso de éxito, FALSE en caso de error.

### Ver también

- [Yaf_Request_Http::get()](#yaf-request-http.get) - Recupera una variable del cliente

- [Yaf_Request_Http::getPost()](#yaf-request-http.getpost) - Recupera una variable de POST

- [Yaf_Request_Http::getCookie()](#yaf-request-http.getcookie) - Recupera una varible de Cookie

- [Yaf_Request_Http::getQuery()](#yaf-request-http.getquery) - Obtiene un parámetro de una consulta

- [Yaf_Request_Abstract::getServer()](#yaf-request-abstract.getserver) - Recupera la variable SERVER

- [Yaf_Request_Abstract::getParam()](#yaf-request-abstract.getparam) - Recupera el parámetro de llamada

# Yaf_Request_Http::getRequest

(Yaf &gt;=1.0.0)

Yaf_Request_Http::getRequest — El propósito de getRequest

### Descripción

public **Yaf_Request_Http::getRequest**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Http::isXmlHttpRequest

(Yaf &gt;=1.0.0)

Yaf_Request_Http::isXmlHttpRequest — Determina si la solicitud es una solicitud de Ajax

### Descripción

public **Yaf_Request_Http::isXmlHttpRequest**(): [bool](#language.types.boolean)

Comprueba si la petición es una consulta Ajax.

**Nota**:

     Este método depende de la cabecera de petición: HTTP_X_REQUESTED_WITH, algunas
     bibliotecas de Javascript no establecen esta cabecera mientras se realiza una petición Ajax.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

boolean

## Tabla de contenidos

- [Yaf_Request_Http::\_\_construct](#yaf-request-http.construct) — Constructor de Yaf_Request_Http
- [Yaf_Request_Http::get](#yaf-request-http.get) — Recupera una variable del cliente
- [Yaf_Request_Http::getCookie](#yaf-request-http.getcookie) — Recupera una varible de Cookie
- [Yaf_Request_Http::getFiles](#yaf-request-http.getfiles) — El propósito de getFiles
- [Yaf_Request_Http::getPost](#yaf-request-http.getpost) — Recupera una variable de POST
- [Yaf_Request_Http::getQuery](#yaf-request-http.getquery) — Obtiene un parámetro de una consulta
- [Yaf_Request_Http::getRaw](#yaf-request-http.getraw) — Recupera el cuerpo de la solicitud de raw
- [Yaf_Request_Http::getRequest](#yaf-request-http.getrequest) — El propósito de getRequest
- [Yaf_Request_Http::isXmlHttpRequest](#yaf-request-http.isxmlhttprequest) — Determina si la solicitud es una solicitud de Ajax

# La clase Yaf_Request_Simple

(Yaf &gt;=1.0.0)

## Introducción

    **Yaf_Request_Simple** se utiliza en particular para propósitos
    de pruebas. Es decir, simula alguna petición especial bajo el modo CLI.

## Sinopsis de la Clase

    ****




      class **Yaf_Request_Simple**



      extends
       [Yaf_Request_Abstract](#class.yaf-request-abstract)

     {

    /* Constantes */

     const
     [string](#language.types.string)
      [SCHEME_HTTP](#yaf-request-simple.constants.scheme-http) = http;

    const
     [string](#language.types.string)
      [SCHEME_HTTPS](#yaf-request-simple.constants.scheme-https) = https;


    /* Propiedades */


    /* Métodos */

public [\_\_construct](#yaf-request-simple.construct)(
    [string](#language.types.string) $method = ?,
    [string](#language.types.string) $module = ?,
    [string](#language.types.string) $controller = ?,
    [string](#language.types.string) $action = ?,
    [array](#language.types.array) $params = ?
)

    public [get](#yaf-request-simple.get)(): [void](language.types.void.html)

public [getCookie](#yaf-request-simple.getcookie)(): [void](language.types.void.html)
public [getFiles](#yaf-request-simple.getfiles)(): [void](language.types.void.html)
public [getPost](#yaf-request-simple.getpost)(): [void](language.types.void.html)
public [getQuery](#yaf-request-simple.getquery)(): [void](language.types.void.html)
public [getRequest](#yaf-request-simple.getrequest)(): [void](language.types.void.html)
public [isXmlHttpRequest](#yaf-request-simple.isxmlhttprequest)(): [void](language.types.void.html)

    /* Métodos heredados */
    public [Yaf_Request_Abstract::clearParams](#yaf-request-abstract.clearparams)(): [bool](#language.types.boolean)

public [Yaf_Request_Abstract::getActionName](#yaf-request-abstract.getactionname)(): [void](language.types.void.html)
public [Yaf_Request_Abstract::getBaseUri](#yaf-request-abstract.getbaseuri)(): [void](language.types.void.html)
public [Yaf_Request_Abstract::getControllerName](#yaf-request-abstract.getcontrollername)(): [void](language.types.void.html)
public [Yaf_Request_Abstract::getEnv](#yaf-request-abstract.getenv)([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [void](language.types.void.html)
public [Yaf_Request_Abstract::getException](#yaf-request-abstract.getexception)(): [void](language.types.void.html)
public [Yaf_Request_Abstract::getLanguage](#yaf-request-abstract.getlanguage)(): [void](language.types.void.html)
public [Yaf_Request_Abstract::getMethod](#yaf-request-abstract.getmethod)(): [string](#language.types.string)
public [Yaf_Request_Abstract::getModuleName](#yaf-request-abstract.getmodulename)(): [void](language.types.void.html)
public [Yaf_Request_Abstract::getParam](#yaf-request-abstract.getparam)([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [mixed](#language.types.mixed)
public [Yaf_Request_Abstract::getParams](#yaf-request-abstract.getparams)(): [array](#language.types.array)
public [Yaf_Request_Abstract::getRequestUri](#yaf-request-abstract.getrequesturi)(): [void](language.types.void.html)
public [Yaf_Request_Abstract::getServer](#yaf-request-abstract.getserver)([string](#language.types.string) $name, [string](#language.types.string) $default = ?): [void](language.types.void.html)
public [Yaf_Request_Abstract::isCli](#yaf-request-abstract.iscli)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::isDispatched](#yaf-request-abstract.isdispatched)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::isGet](#yaf-request-abstract.isget)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::isHead](#yaf-request-abstract.ishead)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::isOptions](#yaf-request-abstract.isoptions)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::isPost](#yaf-request-abstract.ispost)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::isPut](#yaf-request-abstract.isput)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::isRouted](#yaf-request-abstract.isrouted)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::isXmlHttpRequest](#yaf-request-abstract.isxmlhttprequest)(): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::setActionName](#yaf-request-abstract.setactionname)([string](#language.types.string) $action, [bool](#language.types.boolean) $format_name = true): [void](language.types.void.html)
public [Yaf_Request_Abstract::setBaseUri](#yaf-request-abstract.setbaseuri)([string](#language.types.string) $uir): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::setControllerName](#yaf-request-abstract.setcontrollername)([string](#language.types.string) $controller, [bool](#language.types.boolean) $format_name = true): [void](language.types.void.html)
public [Yaf_Request_Abstract::setDispatched](#yaf-request-abstract.setdispatched)(): [void](language.types.void.html)
public [Yaf_Request_Abstract::setModuleName](#yaf-request-abstract.setmodulename)([string](#language.types.string) $module, [bool](#language.types.boolean) $format_name = true): [void](language.types.void.html)
public [Yaf_Request_Abstract::setParam](#yaf-request-abstract.setparam)([string](#language.types.string) $name, [string](#language.types.string) $value = ?): [bool](#language.types.boolean)
public [Yaf_Request_Abstract::setRequestUri](#yaf-request-abstract.setrequesturi)([string](#language.types.string) $uir): [void](language.types.void.html)
public [Yaf_Request_Abstract::setRouted](#yaf-request-abstract.setrouted)([string](#language.types.string) $flag = ?): [void](language.types.void.html)

}

## Propiedades

     module







     controller







     action







     method







     params







     language







     _exception







     _base_uri







     uri







     dispatched







     routed






## Constantes predefinidas

     **[Yaf_Request_Simple::SCHEME_HTTP](#yaf-request-simple.constants.scheme-http)**








     **[Yaf_Request_Simple::SCHEME_HTTPS](#yaf-request-simple.constants.scheme-https)**






# Yaf_Request_Simple::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Request_Simple::\_\_construct — Constructor de Yaf_Request_Simple

### Descripción

public **Yaf_Request_Simple::\_\_construct**(
    [string](#language.types.string) $method = ?,
    [string](#language.types.string) $module = ?,
    [string](#language.types.string) $controller = ?,
    [string](#language.types.string) $action = ?,
    [array](#language.types.array) $params = ?
)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Simple::get

(Yaf &gt;=1.0.0)

Yaf_Request_Simple::get — El propósito de get

### Descripción

public **Yaf_Request_Simple::get**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Simple::getCookie

(Yaf &gt;=1.0.0)

Yaf_Request_Simple::getCookie — El propósito de getCookie

### Descripción

public **Yaf_Request_Simple::getCookie**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Simple::getFiles

(Yaf &gt;=1.0.0)

Yaf_Request_Simple::getFiles — El propósito de getFiles

### Descripción

public **Yaf_Request_Simple::getFiles**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Simple::getPost

(Yaf &gt;=1.0.0)

Yaf_Request_Simple::getPost — El propósito de getPost

### Descripción

public **Yaf_Request_Simple::getPost**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Simple::getQuery

(Yaf &gt;=1.0.0)

Yaf_Request_Simple::getQuery — El propósito de getQuery

### Descripción

public **Yaf_Request_Simple::getQuery**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Simple::getRequest

(Yaf &gt;=1.0.0)

Yaf_Request_Simple::getRequest — El propósito de getRequest

### Descripción

public **Yaf_Request_Simple::getRequest**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Request_Simple::isXmlHttpRequest

(Yaf &gt;=1.0.0)

Yaf_Request_Simple::isXmlHttpRequest — Determina si la solicitud es una solicitud AJAX

### Descripción

public **Yaf_Request_Simple::isXmlHttpRequest**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Siempre devuelve false para [Yaf_Request_Simple](#class.yaf-request-simple)

### Ver también

- [Yaf_Request_Abstract::isXmlHTTPRequest()](#yaf-request-abstract.isxmlhttprequest) - Determina si la solicitud es una solicitud AJAX

- [Yaf_Request_Http::isXmlHTTPRequest()](#yaf-request-http.isxmlhttprequest) - Determina si la solicitud es una solicitud de Ajax

## Tabla de contenidos

- [Yaf_Request_Simple::\_\_construct](#yaf-request-simple.construct) — Constructor de Yaf_Request_Simple
- [Yaf_Request_Simple::get](#yaf-request-simple.get) — El propósito de get
- [Yaf_Request_Simple::getCookie](#yaf-request-simple.getcookie) — El propósito de getCookie
- [Yaf_Request_Simple::getFiles](#yaf-request-simple.getfiles) — El propósito de getFiles
- [Yaf_Request_Simple::getPost](#yaf-request-simple.getpost) — El propósito de getPost
- [Yaf_Request_Simple::getQuery](#yaf-request-simple.getquery) — El propósito de getQuery
- [Yaf_Request_Simple::getRequest](#yaf-request-simple.getrequest) — El propósito de getRequest
- [Yaf_Request_Simple::isXmlHttpRequest](#yaf-request-simple.isxmlhttprequest) — Determina si la solicitud es una solicitud AJAX

# La clase Yaf_Response_Abstract

(Yaf &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yaf_Response_Abstract**

     {

    /* Constantes */

     const
     [string](#language.types.string)
      DEFAULT_BODY = "content";


    /* Propiedades */
    protected
      [$_header](#yaf-response-abstract.props.header);

    protected
      [$_body](#yaf-response-abstract.props.body);

    protected
      [$_sendheader](#yaf-response-abstract.props.sendheader);



    /* Métodos */

public [\_\_construct](#yaf-response-abstract.construct)()

    public [appendBody](#yaf-response-abstract.appendbody)([string](#language.types.string) $content, [string](#language.types.string) $key = ?): [bool](#language.types.boolean)

public [clearBody](#yaf-response-abstract.clearbody)([string](#language.types.string) $key = ?): [bool](#language.types.boolean)
public [clearHeaders](#yaf-response-abstract.clearheaders)(): [void](language.types.void.html)
public [getBody](#yaf-response-abstract.getbody)([string](#language.types.string) $key = ?): [mixed](#language.types.mixed)
public [getHeader](#yaf-response-abstract.getheader)(): [void](language.types.void.html)
public [prependBody](#yaf-response-abstract.prependbody)([string](#language.types.string) $content, [string](#language.types.string) $key = ?): [bool](#language.types.boolean)
public [response](#yaf-response-abstract.response)(): [void](language.types.void.html)
protected [setAllHeaders](#yaf-response-abstract.setallheaders)(): [void](language.types.void.html)
public [setBody](#yaf-response-abstract.setbody)([string](#language.types.string) $content, [string](#language.types.string) $key = ?): [bool](#language.types.boolean)
public [setHeader](#yaf-response-abstract.setheader)([string](#language.types.string) $name, [string](#language.types.string) $value, [bool](#language.types.boolean) $replace = ?): [bool](#language.types.boolean)
public [setRedirect](#yaf-response-abstract.setredirect)([string](#language.types.string) $url): [bool](#language.types.boolean)
private [\_\_toString](#yaf-response-abstract.tostring)(): [string](#language.types.string)

    public [__destruct](#yaf-response-abstract.destruct)()

}

## Propiedades

     _header







     _body







     _sendheader






# Yaf_Response_Abstract::appendBody

(Yaf &gt;=1.0.0)

Yaf_Response_Abstract::appendBody — Añadir contenido al cuerpo de respuesta

### Descripción

public **Yaf_Response_Abstract::appendBody**([string](#language.types.string) $content, [string](#language.types.string) $key = ?): [bool](#language.types.boolean)

Añade contenido a un bloque de contenido existente.

### Parámetros

    body


      La cadena con el contenido.






    key


      La clave del contenido, se puede establecer un contenido con una clave, y si no
      se especifica, se usará Yaf_Response_Abstract::DEFAULT_BODY.


**Nota**:

        Este parámetro se introdujo a partir de la versión 2.2.0






### Valores devueltos

Un valor de tipo booleano.

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Response_Abstract::appendBody()**

&lt;?php
$respuesta = new Yaf_Response_Http();

$respuesta-&gt;setBody("Hola")-&gt;appendBody(" Mundo");

echo $respuesta;
?&gt;

Resultado del ejemplo anterior es similar a:

Hola Mundo

### Ver también

- [Yaf_Config_Ini](#class.yaf-config-ini)

- [Yaf_Response_Abstract::getBody()](#yaf-response-abstract.getbody) - Recupera un contenido existente

- [Yaf_Response_Abstract::setBody()](#yaf-response-abstract.setbody) - Establece el contenido de una respuesta

- [Yaf_Response_Abstract::prependBody()](#yaf-response-abstract.prependbody) - El propósito de prependBody

- [Yaf_Response_Abstract::clearBody()](#yaf-response-abstract.clearbody) - Descarta todo el cuerpo de respuesta existente

# Yaf_Response_Abstract::clearBody

(Yaf &gt;=1.0.0)

Yaf_Response_Abstract::clearBody — Descarta todo el cuerpo de respuesta existente

### Descripción

public **Yaf_Response_Abstract::clearBody**([string](#language.types.string) $key = ?): [bool](#language.types.boolean)

Limpia el contenido existente.

### Parámetros

    key


      La clave del contenido, si no se especifica, todo el contenido será
      limpiado.


**Nota**:

        Este parámetro se introdujo a partir de la versión 2.2.0






### Valores devueltos

### Ver también

- [Yaf_Response_Abstract::setBody()](#yaf-response-abstract.setbody) - Establece el contenido de una respuesta

- [Yaf_Response_Abstract::appendBody()](#yaf-response-abstract.appendbody) - Añadir contenido al cuerpo de respuesta

- [Yaf_Response_Abstract::prependBody()](#yaf-response-abstract.prependbody) - El propósito de prependBody

- [Yaf_Response_Abstract::getBody()](#yaf-response-abstract.getbody) - Recupera un contenido existente

# Yaf_Response_Abstract::clearHeaders

(Yaf &gt;=1.0.0)

Yaf_Response_Abstract::clearHeaders — Descarta todas las cabeceras establecidas

### Descripción

public **Yaf_Response_Abstract::clearHeaders**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [Yaf_Response_Abstract::getHeader()](#yaf-response-abstract.getheader) - El propósito de getHeader

- [Yaf_Response_Abstract::setHeader()](#yaf-response-abstract.setheader) - Establece cabecera de respuesta

# Yaf_Response_Abstract::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Response_Abstract::**construct — El propósito de **construct

### Descripción

public **Yaf_Response_Abstract::\_\_construct**()

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Response_Abstract::\_\_destruct

(Yaf &gt;=1.0.0)

Yaf_Response_Abstract::**destruct — El propósito de **destruct

### Descripción

public **Yaf_Response_Abstract::\_\_destruct**()

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Response_Abstract::getBody

(Yaf &gt;=1.0.0)

Yaf_Response_Abstract::getBody — Recupera un contenido existente

### Descripción

public **Yaf_Response_Abstract::getBody**([string](#language.types.string) $key = ?): [mixed](#language.types.mixed)

Recupera un contenido existente.

### Parámetros

    key


      La clave del contenido, si no se especifica, se usará Yaf_Response_Abstract::DEFAULT_BODY.
      Si se pasa **[null](#constant.null)**, todos el contenido será devuelto como
      un array.


**Nota**:

        Este parámetro se introdujo en la versión 2.2.0






### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Response_Abstract::getBody()**

&lt;?php
$respuesta = new Yaf_Response_Http();

$respuesta-&gt;setBody("Hola")-&gt;setBody(" Mundo", "footer");

var_dump($respuesta-&gt;getBody()); // predeterminado
var_dump($respuesta-&gt;getBody(Yaf_Response_Abstract::DEFAULT_BODY)); // lo mismo que arriba
var_dump($respuesta-&gt;getBody("footer"));
var_dump($respuesta-&gt;getBody(NULL)); // obtener todo
?&gt;

Resultado del ejemplo anterior es similar a:

string(4) "Hola"
string(4) "Hola"
string(6) " Mundo"
array(2) {
["content"]=&gt;
string(4) "Hola"
["footer"]=&gt;
string(6) " Mundo"
}

### Ver también

- [Yaf_Response_Abstract::setBody()](#yaf-response-abstract.setbody) - Establece el contenido de una respuesta

- [Yaf_Response_Abstract::appendBody()](#yaf-response-abstract.appendbody) - Añadir contenido al cuerpo de respuesta

- [Yaf_Response_Abstract::prependBody()](#yaf-response-abstract.prependbody) - El propósito de prependBody

- [Yaf_Response_Abstract::clearBody()](#yaf-response-abstract.clearbody) - Descarta todo el cuerpo de respuesta existente

# Yaf_Response_Abstract::getHeader

(Yaf &gt;=1.0.0)

Yaf_Response_Abstract::getHeader — El propósito de getHeader

### Descripción

public **Yaf_Response_Abstract::getHeader**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [Yaf_Response_Abstract::setHeader()](#yaf-response-abstract.setheader) - Establece cabecera de respuesta

- **Yaf_Response_Abstract::cleanHeaders()**

# Yaf_Response_Abstract::prependBody

(Yaf &gt;=1.0.0)

Yaf_Response_Abstract::prependBody — El propósito de prependBody

### Descripción

public **Yaf_Response_Abstract::prependBody**([string](#language.types.string) $content, [string](#language.types.string) $key = ?): [bool](#language.types.boolean)

Antepone un contenido a un bloque de contenido existente

### Parámetros

    body


      La cadena con el contenido.






    key


      La clave del contenido, se puede establecer una clave, y so no se
      especifica, se usará Yaf_Response_Abstract::DEFAULT_BODY.


**Nota**:

        Este parámetro se introdujo a partir de la versión 2.2.0.






### Valores devueltos

Un valor de tipo booleano.

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Response_Abstract::prependBody()**

&lt;?php
$respuesta = new Yaf_Response_Http();

$respuesta-&gt;setBody("Mundo")-&gt;prependBody("Hola ");

echo $respuesta;
?&gt;

Resultado del ejemplo anterior es similar a:

Hola Mundo

### Ver también

- [Yaf_Response_Abstract::getBody()](#yaf-response-abstract.getbody) - Recupera un contenido existente

- [Yaf_Response_Abstract::setBody()](#yaf-response-abstract.setbody) - Establece el contenido de una respuesta

- [Yaf_Response_Abstract::appendBody()](#yaf-response-abstract.appendbody) - Añadir contenido al cuerpo de respuesta

- [Yaf_Response_Abstract::clearBody()](#yaf-response-abstract.clearbody) - Descarta todo el cuerpo de respuesta existente

# Yaf_Response_Abstract::response

(Yaf &gt;=1.0.0)

Yaf_Response_Abstract::response — Envía una respuesta

### Descripción

public **Yaf_Response_Abstract::response**(): [void](language.types.void.html)

Envía una respuesta.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Response_Abstract::response()**

&lt;?php
$respuesta = new Yaf_Response_Http();

$respuesta-&gt;setBody("Hola")-&gt;setBody(" Mundo", "footer");

$respuesta-&gt;respuesta();
?&gt;

Resultado del ejemplo anterior es similar a:

Hola Mundo

### Ver también

- [Yaf_Response_Abstract::setBody()](#yaf-response-abstract.setbody) - Establece el contenido de una respuesta

- [Yaf_Response_Abstract::clearBody()](#yaf-response-abstract.clearbody) - Descarta todo el cuerpo de respuesta existente

# Yaf_Response_Abstract::setAllHeaders

(Yaf &gt;=1.0.0)

Yaf_Response_Abstract::setAllHeaders — El propósito de setAllHeaders

### Descripción

protected **Yaf_Response_Abstract::setAllHeaders**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Response_Abstract::setBody

(Yaf &gt;=1.0.0)

Yaf_Response_Abstract::setBody — Establece el contenido de una respuesta

### Descripción

public **Yaf_Response_Abstract::setBody**([string](#language.types.string) $content, [string](#language.types.string) $key = ?): [bool](#language.types.boolean)

Establece el contenido de una respuesta.

### Parámetros

    body


      La cadena con el contenido.






    key


      La clave del contenido, se puede establecer una clave, y so no se
      especifica, se usará Yaf_Response_Abstract::DEFAULT_BODY.


**Nota**:

        Este parámetro se introdujo a partir de la versión 2.2.0.






### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Response_Abstract::setBody()**

&lt;?php
$respuesta = new Yaf_Response_Http();

$respuesta-&gt;setBody("Hola")-&gt;setBody(" Mundo", "footer");

print_r($respuesta);
echo $respuesta;
?&gt;

Resultado del ejemplo anterior es similar a:

Yaf_Response_Http Object
(
[_header:protected] =&gt; Array
(
)

    [_body:protected] =&gt; Array
        (
            [content] =&gt; Hola
            [footer] =&gt;  Mundo
        )

    [_sendheader:protected] =&gt; 1
    [_response_code:protected] =&gt; 200

)
Hola Mundo

### Ver también

- [Yaf_Response_Abstract::getBody()](#yaf-response-abstract.getbody) - Recupera un contenido existente

- [Yaf_Response_Abstract::appendBody()](#yaf-response-abstract.appendbody) - Añadir contenido al cuerpo de respuesta

- [Yaf_Response_Abstract::prependBody()](#yaf-response-abstract.prependbody) - El propósito de prependBody

- [Yaf_Response_Abstract::clearBody()](#yaf-response-abstract.clearbody) - Descarta todo el cuerpo de respuesta existente

# Yaf_Response_Abstract::setHeader

(Yaf &gt;=1.0.0)

Yaf_Response_Abstract::setHeader — Establece cabecera de respuesta

### Descripción

public **Yaf_Response_Abstract::setHeader**([string](#language.types.string) $name, [string](#language.types.string) $value, [bool](#language.types.boolean) $replace = ?): [bool](#language.types.boolean)

Se utiliza para enviar un encabezado HTTP

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [Yaf_Response_Abstract::getHeader()](#yaf-response-abstract.getheader) - El propósito de getHeader

- **Yaf_Response_Abstract::cleanHeaders()**

# Yaf_Response_Abstract::setRedirect

(Yaf &gt;=1.0.0)

Yaf_Response_Abstract::setRedirect — El propósito de setRedirect

### Descripción

public **Yaf_Response_Abstract::setRedirect**([string](#language.types.string) $url): [bool](#language.types.boolean)

### Parámetros

    url


      dirección redirigida a


### Valores devueltos

# Yaf_Response_Abstract::\_\_toString

(Yaf &gt;=1.0.0)

Yaf_Response_Abstract::\_\_toString — Recupera todo el cuerpo como un string

### Descripción

private **Yaf_Response_Abstract::\_\_toString**(): [string](#language.types.string)

Recuperar todo el cuerpo como un string

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [Yaf_Response_Abstract::appendBody](#yaf-response-abstract.appendbody) — Añadir contenido al cuerpo de respuesta
- [Yaf_Response_Abstract::clearBody](#yaf-response-abstract.clearbody) — Descarta todo el cuerpo de respuesta existente
- [Yaf_Response_Abstract::clearHeaders](#yaf-response-abstract.clearheaders) — Descarta todas las cabeceras establecidas
- [Yaf_Response_Abstract::\_\_construct](#yaf-response-abstract.construct) — El propósito de \_\_construct
- [Yaf_Response_Abstract::\_\_destruct](#yaf-response-abstract.destruct) — El propósito de \_\_destruct
- [Yaf_Response_Abstract::getBody](#yaf-response-abstract.getbody) — Recupera un contenido existente
- [Yaf_Response_Abstract::getHeader](#yaf-response-abstract.getheader) — El propósito de getHeader
- [Yaf_Response_Abstract::prependBody](#yaf-response-abstract.prependbody) — El propósito de prependBody
- [Yaf_Response_Abstract::response](#yaf-response-abstract.response) — Envía una respuesta
- [Yaf_Response_Abstract::setAllHeaders](#yaf-response-abstract.setallheaders) — El propósito de setAllHeaders
- [Yaf_Response_Abstract::setBody](#yaf-response-abstract.setbody) — Establece el contenido de una respuesta
- [Yaf_Response_Abstract::setHeader](#yaf-response-abstract.setheader) — Establece cabecera de respuesta
- [Yaf_Response_Abstract::setRedirect](#yaf-response-abstract.setredirect) — El propósito de setRedirect
- [Yaf_Response_Abstract::\_\_toString](#yaf-response-abstract.tostring) — Recupera todo el cuerpo como un string

# La clase Yaf_Route_Interface

(Yaf &gt;=1.0.0)

## Introducción

    **Yaf_Route_Interface** se usa para que los desarrolladores definan
    sus enrutamientos personalizados.

## Sinopsis de la Clase

    ****




      class **Yaf_Route_Interface**

     {


    /* Métodos */

abstract public [assemble](#yaf-route-interface.assemble)([array](#language.types.array) $info, [array](#language.types.array) $query = ?): [string](#language.types.string)
abstract public [route](#yaf-route-interface.route)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

}

# Yaf_Route_Interface::assemble

(Yaf &gt;=2.3.0)

Yaf_Route_Interface::assemble — Ensamblar una petición

### Descripción

abstract public **Yaf_Route_Interface::assemble**([array](#language.types.array) $info, [array](#language.types.array) $query = ?): [string](#language.types.string)

Este método devuelve un URL según el argumento info info, y pospone
los string de consultas al URL según el argumento query.

Una ruta debería implementar este método según sus propias reglas de ruta, y
realizar un progreso inverso.

### Parámetros

    info










    query





### Valores devueltos

# Yaf_Route_Interface::route

(Yaf &gt;=1.0.0)

Yaf_Route_Interface::route — Enruta una petición

### Descripción

abstract public **Yaf_Route_Interface::route**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

**Yaf_Route_Interface::route()** es el único método
que debería implementar un enrutamiento personalizado.

**Nota**:

      Desde la 2.3.0, hay otro método que también debería ser implementado,
      ver [Yaf_Route_Interface::assemble()](#yaf-route-interface.assemble).


Si este método devuelve **[true](#constant.true)**, el proceso de enrutamiento terminará, de otro modo
[Yaf_Router](#class.yaf-router) llamará a la siguiente ruta de la pila de enrutamiento
para enrutar la petición.

Este método establecería el resultado del enrutamiento al parámetro request,
llamando a los métodos [Yaf_Request_Abstract::setControllerName()](#yaf-request-abstract.setcontrollername),
[Yaf_Request_Abstract::setActionName()](#yaf-request-abstract.setactionname) y
[Yaf_Request_Abstract::setModuleName()](#yaf-request-abstract.setmodulename).

Este método debería también llamar al método
[Yaf_Request_Abstract::setRouted()](#yaf-request-abstract.setrouted) para realizar al fin
la petición enrutada.

### Parámetros

    request


      Una instancia de la clase [Yaf_Request_Abstract](#class.yaf-request-abstract).


### Valores devueltos

## Tabla de contenidos

- [Yaf_Route_Interface::assemble](#yaf-route-interface.assemble) — Ensamblar una petición
- [Yaf_Route_Interface::route](#yaf-route-interface.route) — Enruta una petición

# La clase Yaf_Route_Map

(Yaf &gt;=1.0.0)

## Introducción

    **Yaf_Route_Map** es una ruta interna, simplemente
    convierte el extremo de un URI (la parte del URI que va después del
    URI base: véase [Yaf_Request_Abstract::setBaseUri()](#yaf-request-abstract.setbaseuri))
    a un nombre de controlador o acción (dependen del parámetro pasado a
    [Yaf_Route_Map::__construct()](#yaf-route-map.construct)) en la siguiente regla:
    A =&gt; controlador A.
    A/B/C =&gt; controlador A_B_C.
    A/B/C/D/E =&gt; controlador A_B_C_D_E.





    Si se especifica el segundo parámetro de
    [Yaf_Route_Map::__construct()](#yaf-route-map.construct), solamente
    la parte de antes del delimitador del URI se usará para enrutar, la parte de después
    se usa para enrutar parámetros de petición (véase la sección de ejemplos de
    [Yaf_Route_Map::__construct()](#yaf-route-map.construct)).

## Sinopsis de la Clase

    ****




      class **Yaf_Route_Map**


     implements
       [Yaf_Route_Interface](#class.yaf-route-interface) {

    /* Propiedades */

     protected
      [$_ctl_router](#yaf-route-map.props.ctl-router);

    protected
      [$_delimiter](#yaf-route-map.props.delimiter);



    /* Métodos */

public [\_\_construct](#yaf-route-map.construct)([string](#language.types.string) $controller_prefer = **[false](#constant.false)**, [string](#language.types.string) $delimiter = "")

    public [assemble](#yaf-route-map.assemble)([array](#language.types.array) $info, [array](#language.types.array) $query = ?): [string](#language.types.string)

public [route](#yaf-route-map.route)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

}

## Propiedades

     _ctl_router







     _delimiter






# Yaf_Route_Map::assemble

(Yaf &gt;=2.3.0)

Yaf_Route_Map::assemble — Ensamblar un URL

### Descripción

public **Yaf_Route_Map::assemble**([array](#language.types.array) $info, [array](#language.types.array) $query = ?): [string](#language.types.string)

Ensamblar un URL.

### Parámetros

    info









    query





### Valores devueltos

Devuelve [string](#language.types.string) en caso de éxito o **[null](#constant.null)** en caso de fallo.

### Errores/Excepciones

Puede lanzar [Yaf_Exception_TypeError](#class.yaf-exception-typeerror).

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Route_Map::assemble()**

&lt;?php

$router = new Yaf_Router();

$route = new Yaf_Route_Map();

$router-&gt;addRoute("map", $route);

var_dump($router-&gt;getRoute('map')-&gt;assemble(
array(
':c' =&gt; 'foo_bar'
),
array(
'tkey1' =&gt; 'tval1',
'tkey2' =&gt; 'tval2'
)
)
);

$route = new Yaf_Route_Map(true, '_');
$router-&gt;addRoute("map", $route);

var_dump($router-&gt;getRoute('map')-&gt;assemble(
array(
':a' =&gt; 'foo_bar'
),
array(
'tkey1' =&gt; 'tval1',
'tkey2' =&gt; 'tval2'
)
)
);

Resultado del ejemplo anterior es similar a:

string(%d) "/foo/bar?tkey1=tval1&amp;tkey2=tval2"
string(%d) "/foo/bar/\_/tkey1/tval1/tkey2/tval2"

# Yaf_Route_Map::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Route_Map::**construct — El propósito de **construct

### Descripción

public **Yaf_Route_Map::\_\_construct**([string](#language.types.string) $controller_prefer = **[false](#constant.false)**, [string](#language.types.string) $delimiter = "")

### Parámetros

    controller_prefer


      Si el resultado debería considerarse un controlador o una acción






    delimiter





### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de [Yaf_Route_Map](#class.yaf-route-map)**

&lt;?php
/\*\*
_ Añadir una ruta de mapas a la pila de enrutamiento de Yaf_Router
_/
Yaf_Dispatcher::getInstance()-&gt;getRouter()-&gt;addRoute("name",
new Yaf_Route_Map());
?&gt;

Resultado del ejemplo anterior es similar a:

/\* para http://sudominio.com/producto/foo/bar

- la ruta resultará en los siguiente valores:
  \*/
  array(
  "controller" =&gt; "producto_foo_bar",
  )

    **Ejemplo #2 Ejemplo de [Yaf_Route_Map](#class.yaf-route-map)**

&lt;?php
/\*\*
_ Añadir una ruta de mapas a la pila de enrutamiento de Yaf_Router
_/
Yaf*Dispatcher::getInstance()-&gt;getRouter()-&gt;addRoute("name",
new Yaf_Route_Map(true, "*"));
?&gt;

Resultado del ejemplo anterior es similar a:

/\* para http://sudominio.com/user/list/_/foo/22

- la ruta resultará en los siguientes valores:
  \*/
  array(
  "action" =&gt; "user_list",
  )

/\*\*

- y los parámetros de petición:
  \*/
  array(
  "foo" =&gt; 22,
  )

    **Ejemplo #3 Ejemplo de [Yaf_Route_Map](#class.yaf-route-map)**

&lt;?php
/\*\*
_ Añadir una ruta de mapas a la pila de enrutamiento de Yaf_Router llamando a addconfig
_/
$config = array(
        "name" =&gt; array(
           "type"  =&gt; "map",         //Yaf_Route_Map route
           "controllerPrefer" =&gt; FALSE,
           "delimiter"        =&gt; "#!",
           ),
    );
    Yaf_Dispatcher::getInstance()-&gt;getRouter()-&gt;addConfig(
        new Yaf_Config_Simple($config));
?&gt;

### Ver también

- [Yaf_Router::addRoute()](#yaf-router.addroute) - Añadir una nueva ruta al Enrutador

- [Yaf_Route_Static](#class.yaf-route-static)

- [Yaf_Route_Supervar](#class.yaf-route-supervar)

- [Yaf_Route_Simple](#class.yaf-route-simple)

- [Yaf_Route_Regex](#class.yaf-route-regex)

- [Yaf_Route_Rewrite](#class.yaf-route-rewrite)

# Yaf_Route_Map::route

(Yaf &gt;=1.0.0)

Yaf_Route_Map::route — El propósito de route

### Descripción

public **Yaf_Route_Map::route**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    request





### Valores devueltos

## Tabla de contenidos

- [Yaf_Route_Map::assemble](#yaf-route-map.assemble) — Ensamblar un URL
- [Yaf_Route_Map::\_\_construct](#yaf-route-map.construct) — El propósito de \_\_construct
- [Yaf_Route_Map::route](#yaf-route-map.route) — El propósito de route

# La clase Yaf_Route_Regex

(Yaf &gt;=1.0.0)

## Introducción

    **Yaf_Route_Regex** es la ruta más flexible entre
    las rutas integradas de Yaf.

## Sinopsis de la Clase

    ****




      class **Yaf_Route_Regex**



      extends
       [Yaf_Route_Interface](#class.yaf-route-interface)


     implements
       [Yaf_Route_Interface](#class.yaf-route-interface) {

    /* Propiedades */

     protected
      [$_route](#yaf-route-regex.props.route);

    protected
      [$_default](#yaf-route-regex.props.default);

    protected
      [$_maps](#yaf-route-regex.props.maps);

    protected
      [$_verify](#yaf-route-regex.props.verify);



    /* Métodos */

public [\_\_construct](#yaf-route-regex.construct)(
    [string](#language.types.string) $match,
    [array](#language.types.array) $route,
    [array](#language.types.array) $map = ?,
    [array](#language.types.array) $verify = ?,
    [string](#language.types.string) $reverse = ?
)

    public [assemble](#yaf-route-regex.assemble)([array](#language.types.array) $info, [array](#language.types.array) $query = ?): [?](#language.types.null)[string](#language.types.string)

public [route](#yaf-route-regex.route)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

    /* Métodos heredados */
    abstract public [Yaf_Route_Interface::assemble](#yaf-route-interface.assemble)([array](#language.types.array) $info, [array](#language.types.array) $query = ?): [string](#language.types.string)

abstract public [Yaf_Route_Interface::route](#yaf-route-interface.route)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

}

## Propiedades

     _route







     _default







     _maps







     _verify






# Yaf_Route_Regex::assemble

(Yaf &gt;=2.3.0)

Yaf_Route_Regex::assemble — Ensamblar un URL

### Descripción

public **Yaf_Route_Regex::assemble**([array](#language.types.array) $info, [array](#language.types.array) $query = ?): [?](#language.types.null)[string](#language.types.string)

Ensamblar un URL

### Parámetros

    info









    query





### Valores devueltos

Devuelve [string](#language.types.string) en caso de éxito o **[null](#constant.null)** en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Route_Regex::assemble()**

&lt;?php

$router = new Yaf_Router();

$route = new Yaf_Route_Regex(
"#^/product/([^/]+)/([^/])+#",
array(
'controller' =&gt; "product", //route to product controller,
),
array(),
array(),
'/:m/:c/:a'
);

$router-&gt;addRoute("regex", $route);

var_dump($router-&gt;getRoute('regex')-&gt;assemble(
array(
':m' =&gt; 'module',
':c' =&gt; 'controller',
':a' =&gt; 'action'
),
array(
'tkey1' =&gt; 'tval1',
'tkey2' =&gt;
'tval2'
)
)
);

Resultado del ejemplo anterior es similar a:

string(49) "/module/controller/action?tkey1=tval1&amp;tkey2=tval2"

# Yaf_Route_Regex::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Route_Regex::\_\_construct — Constructor de Yaf_Route_Regex

### Descripción

public **Yaf_Route_Regex::\_\_construct**(
    [string](#language.types.string) $match,
    [array](#language.types.array) $route,
    [array](#language.types.array) $map = ?,
    [array](#language.types.array) $verify = ?,
    [string](#language.types.string) $reverse = ?
)

### Parámetros

    match


      Un patrón de expresión regular completo, se usará para comparar un URI solicitado, si
      no coincide, [Yaf_Route_Regex](#class.yaf-route-regex) devolverá
      **[false](#constant.false)**.






    route


      Cuando el patrón de comparación coincida con el URI solicitado,
      [Yaf_Route_Regex](#class.yaf-route-regex) lo usará para decidir qué
      m/c/a enrutar.




      m/c/a en este array son opcionales, si no se asigna un
      valor específico, será enrutada al valor predeterminado.






    map


      Un array para asignar nombres a las capturas del resultado de comparación.






    reverse


      una cadena, usado para ensamblar url, ver
      [Yaf_Route_Regex::assemble()](#yaf-route-regex.assemble).


**Nota**:

       este parametro se introdujo en 2.3.0








    verify





### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de [Yaf_Route_Regex](#class.yaf-route-regex)**

&lt;?php
/\*\*
_ Añade una ruta de expresión regular a la pila de enrutamiento de Yaf_Router
_/
Yaf_Dispatcher::getInstance()-&gt;getRouter()-&gt;addRoute("name",
new Yaf_Route_Regex(
"#^/product/([^/]+)/([^/])+#", //comparar los URI solicitados que empiecen por "/product"
array(
'controller' =&gt; "product", //ruta al controlador product,
),
array(
1 =&gt; "name", // ahora se puede llamar a $request-&gt;getParam("name")
2 =&gt; "id", // para obtener la primera captura del patrón de comparación.
)
)
);
?&gt;

**Ejemplo #2 Ejemplo de [Yaf_Route_Regex](#class.yaf-route-regex)(como en 2.3.0)**

&lt;?php
/\*\*
_ Usar el resultado de la busqueda como nombre MVC
_/
Yaf_Dispatcher::getInstance()-&gt;getRouter()-&gt;addRoute("name",
new Yaf_Route_Regex(
"#^/product/([^/]+)/([^/])+#i", //buscar primera peticion uri "/product"
array(
'controller' =&gt; ":name", // ruta a :name, el cual es $1 en el resultado de busqueda como nombre de controllador
),
array(
1 =&gt; "name", // ahora puede llamar a $request-&gt;getParam("name")
2 =&gt; "id", // para obtener la primera coincidencia en el patron de busqueda.
)
)
);
?&gt;

**Ejemplo #3 Ejemplo de [Yaf_Route_Regex](#class.yaf-route-regex) y el nombre de la zona de captura (a partir de 2.3.0)**

&lt;?php
/\*\*
_ Usar el resultado de la coincidencia como nombre del MVC
_/
Yaf_Dispatcher::getInstance()-&gt;getRouter()-&gt;addRoute("name",
new Yaf_Route_Regex(
"#^/product/(?&lt;name&gt;[^/]+)/([^/])+#i", //solicitud de coincidencia uri leading "/product"
array(
'controller' =&gt; ":name", // ruta a :name,
// que se denomina "nombre" del grupo de captura en el resultado de la coincidencia como nombre del controlador
),
array(
2 =&gt; "id", // para obtener la primera captura en el patrón de coincidencia.
)
)
);
?&gt;

**Ejemplo #4 Ejemplo de [Yaf_Route_Regex](#class.yaf-route-regex)**

&lt;?php
/\*\*
_ Add a regex route to Yaf_Router route stack by calling addconfig
_/
$config = array(
        "name" =&gt; array(
           "type"  =&gt; "regex",          //ruta Yaf_Route_Regex
           "match" =&gt; "#(.*)#",         //comparar URIs solicitados arbitrarios
           "route" =&gt; array(
               'controller' =&gt; "product",  //ruta al controlador product,
               'action'     =&gt; "dummy",    //ruta a una acción sin sentido
           ),
           "map" =&gt; array(
              1 =&gt; "uri",   // ahora se puede llamar a $request-&gt;getParam("uri")
           ),
        ),
    );
    Yaf_Dispatcher::getInstance()-&gt;getRouter()-&gt;addConfig(
        new Yaf_Config_Simple($config));
?&gt;

### Ver también

- [Yaf_Router::addRoute()](#yaf-router.addroute) - Añadir una nueva ruta al Enrutador

- [Yaf_Router::addConfig()](#yaf-router.addconfig) - Añadir rutas definidas en configuración al Enrutador

- [Yaf_Route_Static](#class.yaf-route-static)

- [Yaf_Route_Supervar](#class.yaf-route-supervar)

- [Yaf_Route_Simple](#class.yaf-route-simple)

- [Yaf_Route_Rewrite](#class.yaf-route-rewrite)

- [Yaf_Route_Map](#class.yaf-route-map)

# Yaf_Route_Regex::route

(Yaf &gt;=1.0.0)

Yaf_Route_Regex::route — El propósito de route

### Descripción

public **Yaf_Route_Regex::route**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

Enruta una petición entrante.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    request





### Valores devueltos

Si el patrón dado por el primer parámetro de
**Yaf_Route_Regex::\_construct()** coincide con el URI
solicitado, devuelve **[true](#constant.true)**, si no devuelve **[false](#constant.false)**.

## Tabla de contenidos

- [Yaf_Route_Regex::assemble](#yaf-route-regex.assemble) — Ensamblar un URL
- [Yaf_Route_Regex::\_\_construct](#yaf-route-regex.construct) — Constructor de Yaf_Route_Regex
- [Yaf_Route_Regex::route](#yaf-route-regex.route) — El propósito de route

# La clase Yaf_Route_Rewrite

(Yaf &gt;=1.0.0)

## Introducción

    Para su uso, veáse la sección de ejemplos de
    [Yaf_Route_Rewrite::__construct()](#yaf-route-rewrite.construct)

## Sinopsis de la Clase

    ****




      class **Yaf_Route_Rewrite**



      extends
       [Yaf_Route_Interface](#class.yaf-route-interface)


     implements
       [Yaf_Route_Interface](#class.yaf-route-interface) {

    /* Propiedades */

     protected
      [$_route](#yaf-route-rewrite.props.route);

    protected
      [$_default](#yaf-route-rewrite.props.default);

    protected
      [$_verify](#yaf-route-rewrite.props.verify);



    /* Métodos */

public [\_\_construct](#yaf-route-rewrite.construct)([string](#language.types.string) $match, [array](#language.types.array) $route, [array](#language.types.array) $verify = ?)

    public [assemble](#yaf-route-rewrite.assemble)([array](#language.types.array) $info, [array](#language.types.array) $query = ?): [string](#language.types.string)

public [route](#yaf-route-rewrite.route)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

    /* Métodos heredados */
    abstract public [Yaf_Route_Interface::assemble](#yaf-route-interface.assemble)([array](#language.types.array) $info, [array](#language.types.array) $query = ?): [string](#language.types.string)

abstract public [Yaf_Route_Interface::route](#yaf-route-interface.route)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

}

## Propiedades

     _route







     _default







     _verify






# Yaf_Route_Rewrite::assemble

(Yaf &gt;=2.3.0)

Yaf_Route_Rewrite::assemble — Ensamblar un URL

### Descripción

public **Yaf_Route_Rewrite::assemble**([array](#language.types.array) $info, [array](#language.types.array) $query = ?): [string](#language.types.string)

Ensamblar un URL.

### Parámetros

    info









    query





### Valores devueltos

Devuelve [string](#language.types.string).

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Route_Rewrite::assemble()**

router = new Yaf_Router();

$route = new Yaf_Route_Rewrite(
"/product/:name/:id/\*",
array(
'controller' =&gt; "product",
),
array()
);

$router-&gt;addRoute("rewrite", $route);

var_dump($router-&gt;getRoute('rewrite')-&gt;assemble(
array(
':name' =&gt; 'foo',
':id' =&gt; 'bar',
':tmpkey1' =&gt; 'tmpval1'
),
array(
'tkey1' =&gt; 'tval1',
'tkey2' =&gt; 'tval2'
)
)
);

Resultado del ejemplo anterior es similar a:

string(57) "/product/foo/bar/tmpkey1/tmpval1/?tkey1=tval1&amp;tkey2=tval2"

# Yaf_Route_Rewrite::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Route_Rewrite::\_\_construct — Constructor de Yaf_Route_Rewrite

### Descripción

public **Yaf_Route_Rewrite::\_\_construct**([string](#language.types.string) $match, [array](#language.types.array) $route, [array](#language.types.array) $verify = ?)

### Parámetros

    match


      Un patrón de expresión regular completo, se usará para comparar un URI solicitado, si
      no coincide, [Yaf_Route_Regex](#class.yaf-route-regex) devolverá
      **[false](#constant.false)**.




      Se puede usar el stilo :name para nombrar segmentos a buscar. y * para
      encontrar el resto de segmentos.






    route


      Cuando el patrón de comparación coincida con el URI solicitado,
      [Yaf_Route_Regex](#class.yaf-route-regex) lo usará para decidir qué
      módulo/ccontrolador/acción enrutar.




      Cada módulo/ccontrolador/acción en este array es opcional, si no se asigna un
      valor específico, será enrutada al valor predeterminado.






    verify





### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de [Yaf_Route_Rewrite](#class.yaf-route-rewrite)**

&lt;?php
/\*\*
_ Añadir una ruta de reescritura a la pila de rutas de Yaf_Router
_/
Yaf_Dispatcher::getInstance()-&gt;getRouter()-&gt;addRoute("name",
new Yaf_Route_rewrite(
"/product/:name/:id/\*", //match request uri leading "/product"
array(
'controller' =&gt; "product", //route to product controller,
),
)
);
?&gt;

Resultado del ejemplo anterior es similar a:

/\* para http://yourdomain.com/product/foo/22/foo/bar

- la ruta resultará en los siguientes valores:
  \*/
  array(
  "controller" =&gt; "product",
  "module" =&gt; "index", //(default)
  "action" =&gt; "index", //(default)
  )

/\*\*

- y los parámetros de petición:
  \*/
  array(
  "name" =&gt; "foo",
  "id" =&gt; 22,
  "foo" =&gt; bar
  )

    **Ejemplo #2 Ejemplo de [Yaf_Route_Rewrite](#class.yaf-route-rewrite)**

&lt;?php
/\*\*
_ Añadir una ruta de reescritura a la pila de rutas de Yaf_Router llamando a addconfig
_/
$config = array(
        "name" =&gt; array(
           "type"  =&gt; "rewrite",        //Yaf_Route_Rewrite route
           "match" =&gt; "/user-list/:id", //match only /user/list/?/
           "route" =&gt; array(
               'controller' =&gt; "user",  //route to user controller,
               'action'     =&gt; "list",  //route to list action
           ),
        ),
    );
    Yaf_Dispatcher::getInstance()-&gt;getRouter()-&gt;addConfig(
        new Yaf_Config_Simple($config));
?&gt;

Resultado del ejemplo anterior es similar a:

/\* para http://yourdomain.com/user-list/22

- la ruta resultará en los siguientes valores:
  \*/
  array(
  "controller" =&gt; "user",
  "action" =&gt; "list",
  "module" =&gt; "index", //(default)
  )

/\*\*

- y los parámetros de petición:
  \*/
  array(
  "id" =&gt; 22,
  )

    **Ejemplo #3 Ejemplo de [Yaf_Route_Rewrite](#class.yaf-route-rewrite) (como en 2.3.0)**

&lt;?php
/\*\*
_ Añadir una ruta de reescritura para usar el resultado de comparar m/c/a como un nombre
_/
$config = array(
        "name" =&gt; array(
           "type"  =&gt; "rewrite",
           "match" =&gt; "/user-list/:a/:id", //coincidir solo /user-list/*
           "route" =&gt; array(
               'controller' =&gt; "user",   //ruta a user controller,
               'action'     =&gt; ":a",     //ruta a acción :a
           ),
        ),
    );
    Yaf_Dispatcher::getInstance()-&gt;getRouter()-&gt;addConfig(
        new Yaf_Config_Simple($config));
?&gt;

Resultado del ejemplo anterior es similar a:

/\* para http://yourdomain.com/user-list/list/22

- la ruta resultará en los siguientes valores:
  \*/
  array(
  "controller" =&gt; "user",
  "action" =&gt; "list",
  "module" =&gt; "index", //(default)
  )

/\*\*

- y los parámetros de petición:
  \*/
  array(
  "id" =&gt; 22,
  )

### Ver también

- [Yaf_Router::addRoute()](#yaf-router.addroute) - Añadir una nueva ruta al Enrutador

- [Yaf_Router::addConfig()](#yaf-router.addconfig) - Añadir rutas definidas en configuración al Enrutador

- [Yaf_Route_Static](#class.yaf-route-static)

- [Yaf_Route_Supervar](#class.yaf-route-supervar)

- [Yaf_Route_Simple](#class.yaf-route-simple)

- [Yaf_Route_Regex](#class.yaf-route-regex)

- [Yaf_Route_Map](#class.yaf-route-map)

# Yaf_Route_Rewrite::route

(Yaf &gt;=1.0.0)

Yaf_Route_Rewrite::route — El propósito de route

### Descripción

public **Yaf_Route_Rewrite::route**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

### Parámetros

    request





### Valores devueltos

## Tabla de contenidos

- [Yaf_Route_Rewrite::assemble](#yaf-route-rewrite.assemble) — Ensamblar un URL
- [Yaf_Route_Rewrite::\_\_construct](#yaf-route-rewrite.construct) — Constructor de Yaf_Route_Rewrite
- [Yaf_Route_Rewrite::route](#yaf-route-rewrite.route) — El propósito de route

# La clase Yaf_Router

(Yaf &gt;=1.0.0)

## Introducción

    **Yaf_Router** es el enrutador estándar del framework. Enrutar es
    el proceso de tomar un extremo de un URI (la parte del URI que va
    antes del URL base: véase [Yaf_Request_Abstract::setBaseUri()](#yaf-request-abstract.setbaseuri))
    y descomponerlo en parámetros para determinar qué módulo, controlador, y
    acción de ese controlador deberían recibir la petición. Estos valores de módulo,
    controlador, acción y demás parámetros, son empaquetados en un
    objeto [Yaf_Request_Abstract](#class.yaf-request-abstract) que es procesado por
    [Yaf_Dispatcher](#class.yaf-dispatcher). El enrutamiento sucede sólo una vez: cuando la petición
    es recibida inicialmente y antes de que el primer controlador sea despachado.

    La clase **Yaf_Router** está diseñada para tener en cuenta una funcionalidad parecida a la directiva
    mod_rewrite usando simples estructuras de PHP. Está basada indirectamente en el enrutamiento de
    Ruby on Rails y no requiere ningún conocimiento previo de la reescritura de URL del
    servidor web. Está diseñada para funcionar con una simple regla de la directiva mod_rewrite de Apache
    (una de):



     **Ejemplo #1 Regla de reescritura para Apache**




RewriteEngine on
RewriteRule !\.(js|ico|gif|jpg|png|css|html)$ index.php

    o (preferible):

     **Ejemplo #2 Regla de reescritura para Apache**




RewriteEngine On
RewriteCond %{REQUEST_FILENAME} -s [OR]
RewriteCond %{REQUEST_FILENAME} -l [OR]
RewriteCond %{REQUEST_FILENAME} -d
RewriteRule ^._$ - [NC,L]
RewriteRule ^._$ index.php [NC,L]

    Si se usa Lighttpd, la siguiente regla de reescritura es válida:

     **Ejemplo #3 Regla de reescritura para Lighttpd**




url.rewrite-once = (
"._\?(._)$" =&gt; "/index.php?$1",
  ".*\.(js|ico|gif|jpg|png|css|html)$" =&gt; "$0",
"" =&gt; "/index.php"
)

    Si se usa Nginx, utilice la siguiente regla de reescritura:

     **Ejemplo #4 Regla de reescritura para Nginx**




server {
listen \*\*\*\*;
server_name yourdomain.com;
root document_root;
index index.php index.html;

if (!-e $request_filename) {
rewrite ^/(.\*) /index.php/$1 last;
}
}

## Enrutamiento predeterminado

    **Yaf_Router** comes viene preconfigurada con un enrutamiento
    [Yaf_Route_Static](#class.yaf-route-static) predeterminado, el cual comparará URIs en la
    forma de controlador/acción. Además, se puede especificar un nombre de módulo como el
    primer elemento de la ruta, permitiendo URIs de la forma módulo/controlador/acción.
    Finalmente, también comparará cualquier parámetro adicional añadido al URI por omisión
    - controlador/acción/variable1/valor1/variable2/valor2.

**Nota**:

      El nombre del módulo debe estar definido en la configuración, considerando application.module="Index,Foo,Bar",
      en este caso, solamente index, foo y bar pueden ser considerados como un nombre de módulo;
      si no está configurado, sólo existe un nombre de módulo llamado "Index".







    Algunos ejemplos de cómo tales enrutamientos son comparados:



     **Ejemplo #5 Ejemplo de [Yaf_Route_Static](#class.yaf-route-static) (ruta predeterminada)**




// Se asume la siguiente configuración:
$conf = array(
"application" =&gt; array(
"modules" =&gt; "Index,Blog",
),
);

Solamente el controlador:
http://example/news
controller == news
Solamente la acción (al definir yaf.action_prefer=1 en php.ini)
action == news

Un módulo inválido mapea el nombre del controlador:
http://example/foo
controller == foo

Módulo + controlador:
http://example/blog/archive
module == blog
controller == archive

Módulo + controlador + acción:
http://example/blog/archive/list
module == blog
controller == archive
action == list

Módulo + controlador + acción + parámetros:
http://example/blog/archive/list/sort/alpha/date/desc
module == blog
controller == archive
action == list
sort == alpha
date == desc

## Sinopsis de la Clase

    ****




      class **Yaf_Router**

     {

    /* Propiedades */

     protected
      [$_routes](#yaf-router.props.routes);

    protected
      [$_current](#yaf-router.props.current);



    /* Métodos */

public [\_\_construct](#yaf-router.construct)()

    public [addConfig](#yaf-router.addconfig)([Yaf_Config_Abstract](#class.yaf-config-abstract) $config): [bool](#language.types.boolean)

public [addRoute](#yaf-router.addroute)([string](#language.types.string) $name, Yaf_Route_Abstract $route): [bool](#language.types.boolean)
public [getCurrentRoute](#yaf-router.getcurrentroute)(): [string](#language.types.string)
public [getRoute](#yaf-router.getroute)([string](#language.types.string) $name): [Yaf_Route_Interface](#class.yaf-route-interface)
public [getRoutes](#yaf-router.getroutes)(): [mixed](#language.types.mixed)
public [route](#yaf-router.route)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

}

## Propiedades

     _routes


       Pila de rutas registradas






     _current


       Después de la fase de enrutamiento, esto indica el nombre de la ruta
       a usar para enrutar la petición actual.

       Se puede obtener este nombre mediante
       [Yaf_Router::getCurrentRoute()](#yaf-router.getcurrentroute).





# Yaf_Router::addConfig

(Yaf &gt;=1.0.0)

Yaf_Router::addConfig — Añadir rutas definidas en configuración al Enrutador

### Descripción

public **Yaf_Router::addConfig**([Yaf_Config_Abstract](#class.yaf-config-abstract) $config): [bool](#language.types.boolean)

Añade rutas definidas mediante configuraciones en
la pila de rutas de [Yaf_Router](#class.yaf-router)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una instancia de [Yaf_Config_Abstract](#class.yaf-config-abstract), la cual debería
contener una o más configuraciones de rutas válidas.

### Ejemplos

**Ejemplo #1 Ejemplo de application.ini()**

;el orden es muy importante, el primero será llamado en primer lugar

;a rewrite route match request /product/_/_
routes.route_name.type="rewrite"
routes.route_name.match="/product/:name/:value"
routes.route_name.route.controller=product
routes.route_name.route.action=info

;a regex route match request /list/_/_
routes.route_name1.type="regex"
routes.route_name1.match="#^list/([^/]_)/([^/]_)#"
routes.route_name1.route.controller=Index
routes.route_name1.route.action=action
routes.route_name1.map.1=name
routes.route_name1.map.2=value

;a simple route match /\*\*?c=controller&amp;a=action&amp;m=module
routes.route_name2.type="simple"
routes.route_name2.controller=c
routes.route_name2.module=m
routes.route_name2.action=a

;a simple router match /\*\*?r=PATH_INFO
routes.route_name3.type="supervar"
routes.route_name3.varname=r

;a map route match any request to controller
routes.route_name4.type="map"
routes.route_name4.controllerPrefer=TRUE
routes.route_namer.delimiter="#!"

**Ejemplo #2 Ejemplo de Yaf_Dispatcher::autoConfig()**

&lt;?php
class Bootstrap extends Yaf_Bootstrap_Abstract{
public function \_initConfig() {
$config = Yaf_Application::app()-&gt;getConfig();
Yaf_Registry::set("config", $config);
}

    public function _initRoute(Yaf_Dispatcher $dispatcher) {
        $router = $dispatcher-&gt;getRouter();
        /**
         * podemos añadir algunas rutas predefinidas en application.ini
         */
        $router-&gt;addConfig(Yaf_Registry::get("config")-&gt;routes);
    }

?&gt;

### Ver también

- [Yaf_Router::addRoute()](#yaf-router.addroute) - Añadir una nueva ruta al Enrutador

- [Yaf_Route_Static](#class.yaf-route-static)

- [Yaf_Route_Supervar](#class.yaf-route-supervar)

- [Yaf_Route_Simple](#class.yaf-route-simple)

- [Yaf_Route_Regex](#class.yaf-route-regex)

- [Yaf_Route_Rewrite](#class.yaf-route-rewrite)

- [Yaf_Route_Map](#class.yaf-route-map)

# Yaf_Router::addRoute

(Yaf &gt;=1.0.0)

Yaf_Router::addRoute — Añadir una nueva ruta al Enrutador

### Descripción

public **Yaf_Router::addRoute**([string](#language.types.string) $name, Yaf_Route_Abstract $route): [bool](#language.types.boolean)

Por defecto, Yaf_Router usa un [Yaf_Route_Static](#class.yaf-route-static) como su ruta predeterminada.
Se pueden añadir nuevas rutas a la pila de rutas del Enrutador llamando a este método.

La ruta más nueva será llamada antes que la más antigua (pila de rutas), y si la ruta más nueva devuelve
**[true](#constant.true)**, el proceso de enrutamiento finalizará. De otro modo, será llamada la ruta más
antigua.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de [Yaf_Dispatcher::autoRender()](#yaf-dispatcher.autorender)**

&lt;?php
class Bootstrap extends Yaf_Bootstrap_Abstract{
public function \_initConfig() {
$config = Yaf_Application::app()-&gt;getConfig();
Yaf_Registry::set("config", $config);
}

    public function _initRoute(Yaf_Dispatcher $dispatcher) {
        $router = $dispatcher-&gt;getRouter();
        /**
         * podemos añadir algunas rutas predefinidas en application.ini
         */
        $router-&gt;addConfig(Yaf_Registry::get("config")-&gt;routes);
        /**
         * add a Rewrite route, then for a request uri:
         * http://example.com/product/list/22/foo
         * will be matched by this route, and result:
         *
         *  [module] =&gt;
         *  [controller] =&gt; product
         *  [action] =&gt; info
         *  [method] =&gt; GET
         *  [params:protected] =&gt; Array
         *      (
         *          [id] =&gt; 22
         *          [name] =&gt; foo
         *      )
         *
         */
        $route  = new Yaf_Route_Rewrite(
            "/product/list/:id/:name",
            array(
                "controller" =&gt; "product",
                "action"     =&gt; "info",
            )
        );

        $router-&gt;addRoute('dummy', $route);
    }

}
?&gt;

### Ver también

- [Yaf_Router::addConfig()](#yaf-router.addconfig) - Añadir rutas definidas en configuración al Enrutador

- [Yaf_Route_Static](#class.yaf-route-static)

- [Yaf_Route_Supervar](#class.yaf-route-supervar)

- [Yaf_Route_Simple](#class.yaf-route-simple)

- [Yaf_Route_Regex](#class.yaf-route-regex)

- [Yaf_Route_Rewrite](#class.yaf-route-rewrite)

- [Yaf_Route_Map](#class.yaf-route-map)

# Yaf_Router::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Router::\_\_construct — El constructor de Yaf_Router

### Descripción

public **Yaf_Router::\_\_construct**()

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Router::getCurrentRoute

(Yaf &gt;=1.0.0)

Yaf_Router::getCurrentRoute — Obtener el nombre de la ruta efectiva

### Descripción

public **Yaf_Router::getCurrentRoute**(): [string](#language.types.string)

Obtiene el nombre de la ruta efectiva del proceso de enrutamiento.

**Nota**:

     Se debería llamar a este método después de que finalice el proceso de enrutamiento, ya que
     si se hace antes, este método devolverá siempre **[null](#constant.null)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una cadena, el nombre de la ruta efectiva.

### Ejemplos

**Ejemplo #1 Registrar algunas rutas en el Arranque**

&lt;?php
class Bootstrap extends Yaf_Bootstrap_Abstract{
public function \_initConfig() {
$config = Yaf_Application::app()-&gt;getConfig();
Yaf_Registry::set("config", $config);
}

    public function _initRoute(Yaf_Dispatcher $dispatcher) {
        $router = $dispatcher-&gt;getRouter();
        $rewrite_route  = new Yaf_Route_Rewrite(
            "/product/list/:page",
            array(
                "controller" =&gt; "product",
                "action"     =&gt; "list",
            )
        );

        $regex_route  = new Yaf_Route_Rewrite(
            "#^/product/info/(\d+)",
            array(
                "controller" =&gt; "product",
                "action"     =&gt; "info",
            )
        );

        $router-&gt;addRoute('rewrite', $rewrite_route)-&gt;addRoute('regex', $regex_route);
    }

    /**
     * registrar un complemento
     */
    public function __initPlugins(Yaf_Dispatcher $dispatcher) {
        $dispatcher-&gt;registerPlugin(new DummyPlugin());
    }

}
?&gt;

**Ejemplo #2 Complemento Dummy.php (bajo [application.directory](#configuration.yaf.directory)/plugins)**

&lt;?php
class DummyPlugin extends Yaf_Plugin_Abstract {
public function routerShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response) {
var_dump(Yaf_Dispatcher::getInstance()-&gt;getRouter()-&gt;getCurrentRoute());
}
}
?&gt;

Resultado del ejemplo anterior es similar a:

/\* para http://yourdomain.com/product/list/1

- DummyPlugin imprimirá:
  \*/
  string(7) "rewrite"

/\* para http://yourdomain.com/product/info/34

- DummyPlugin imprimirá:
  \*/
  string(5) "regex"

/\* para otros URIs solicitados

- DummyPlugin imprimirá:
  \*/
  string(8) "\_default"

### Ver también

- [Yaf_Bootstrap_Abstract](#class.yaf-bootstrap-abstract)

- [Yaf_Plugin_Abstract](#class.yaf-plugin-abstract)

- [Yaf_Router::addRoute()](#yaf-router.addroute) - Añadir una nueva ruta al Enrutador

# Yaf_Router::getRoute

(Yaf &gt;=1.0.0)

Yaf_Router::getRoute — Recupera una ruta por su nombre

### Descripción

public **Yaf_Router::getRoute**([string](#language.types.string) $name): [Yaf_Route_Interface](#class.yaf-route-interface)

Recupera una ruta por su nombre. Véase también
[Yaf_Router::getCurrentRoute()](#yaf-router.getcurrentroute)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ver también

- [Yaf_Bootstrap_Abstract](#class.yaf-bootstrap-abstract)

- [Yaf_Plugin_Abstract](#class.yaf-plugin-abstract)

- [Yaf_Router::addRoute()](#yaf-router.addroute) - Añadir una nueva ruta al Enrutador

- [Yaf_Router::getCurrentRoute()](#yaf-router.getcurrentroute) - Obtener el nombre de la ruta efectiva

# Yaf_Router::getRoutes

(Yaf &gt;=1.0.0)

Yaf_Router::getRoutes — Recupera las rutas registradas

### Descripción

public **Yaf_Router::getRoutes**(): [mixed](#language.types.mixed)

Recupera las rutas registradas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Router::route

(Yaf &gt;=1.0.0)

Yaf_Router::route — El propósito de route

### Descripción

public **Yaf_Router::route**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [Yaf_Router::addConfig](#yaf-router.addconfig) — Añadir rutas definidas en configuración al Enrutador
- [Yaf_Router::addRoute](#yaf-router.addroute) — Añadir una nueva ruta al Enrutador
- [Yaf_Router::\_\_construct](#yaf-router.construct) — El constructor de Yaf_Router
- [Yaf_Router::getCurrentRoute](#yaf-router.getcurrentroute) — Obtener el nombre de la ruta efectiva
- [Yaf_Router::getRoute](#yaf-router.getroute) — Recupera una ruta por su nombre
- [Yaf_Router::getRoutes](#yaf-router.getroutes) — Recupera las rutas registradas
- [Yaf_Router::route](#yaf-router.route) — El propósito de route

# La clase Yaf_Route_Simple

(Yaf &gt;=1.0.0)

## Introducción

    **Yaf_Route_Simple** comparará la cadena de consulta, y
    buscará la información de enrutamiento.




    Todo lo que se necesita es indicar a **Yaf_Route_Simple** qué clave de la variable $_GET es
    un módulo, qué clave es un controlador, y qué clave es una acción.




    [Yaf_Route_Simple::route()](#yaf-route-simple.route) siempre devuelve
    **[true](#constant.true)**,
    por lo que es importante poner **Yaf_Route_Simple** al frente de la pila de enrutamiento,
    de otro modo todas las otras rutas no serán llamadas.

## Sinopsis de la Clase

    ****




      class **Yaf_Route_Simple**


     implements
       [Yaf_Route_Interface](#class.yaf-route-interface) {

    /* Propiedades */

     protected
      [$controller](#yaf-route-simple.props.controller);

    protected
      [$module](#yaf-route-simple.props.module);

    protected
      [$action](#yaf-route-simple.props.action);



    /* Métodos */

public [\_\_construct](#yaf-route-simple.construct)([string](#language.types.string) $module_name, [string](#language.types.string) $controller_name, [string](#language.types.string) $action_name)

    public [assemble](#yaf-route-simple.assemble)([array](#language.types.array) $info, [array](#language.types.array) $query = ?): [string](#language.types.string)

public [route](#yaf-route-simple.route)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

}

## Propiedades

     controller







     module







     action






# Yaf_Route_Simple::assemble

(Yaf &gt;=2.3.0)

Yaf_Route_Simple::assemble — Ensamblar un URL

### Descripción

public **Yaf_Route_Simple::assemble**([array](#language.types.array) $info, [array](#language.types.array) $query = ?): [string](#language.types.string)

Ensamblar un URL.

### Parámetros

    info









    query





### Valores devueltos

Devuelve un [string](#language.types.string).

### Errores/Excepciones

Lanza [Yaf_Exception_TypeError](#class.yaf-exception-typeerror) si las claves ':c' o ':a' de info no están establecidas.

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Route_Simple::assemble()**

&lt;?php

$router = new Yaf_Router();

$route = new Yaf_Route_Simple('m', 'c', 'a');

$router-&gt;addRoute("simple", $route);

var_dump($router-&gt;getRoute('simple')-&gt;assemble(
array(
':a' =&gt; 'yafaction',
'tkey' =&gt; 'tval',
':c' =&gt; 'yafcontroller',
':m' =&gt; 'yafmodule'
),
array(
'tkey1' =&gt; 'tval1',
'tkey2' =&gt; 'tval2'
)
));

Resultado del ejemplo anterior es similar a:

string(64) "?m=yafmodule&amp;c=yafcontroller&amp;a=yafaction&amp;tkey1=tval1&amp;tkey2=tval2"

# Yaf_Route_Simple::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Route_Simple::\_\_construct — El constructor de la clase Yaf_Route_Simple

### Descripción

public **Yaf_Route_Simple::\_\_construct**([string](#language.types.string) $module_name, [string](#language.types.string) $controller_name, [string](#language.types.string) $action_name)

[Yaf_Route_Simple](#class.yaf-route-simple) obtendrá la información de la ruta desde una cadena
de consulta. Los parámetros de este constructor se usarán como claves mientras se busca la
información de la ruta en $\_GET.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    module_name


      El nombre de la clave de la información del módulo.






    controller_name


      El nombre de la clave de la información del controlador.






    action_name


      El nombre de la clave de la información de la acción.


### Valores devueltos

Siempre devuelve **[true](#constant.true)**.

### Ejemplos

**Ejemplo #1 Ejemplo de [Yaf_Route_Simple::route()](#yaf-route-simple.route)**

&lt;?php
$route = new Yaf_Route_Simple("m", "controller", "act");
Yaf_Router::getInstance()-&gt;addRoute("simple", $route);
?&gt;

**Ejemplo #2 Ejemplo de [Yaf_Route_Simple::route()](#yaf-route-simple.route)**

Request: http://yourdomain.com/path/?controller=a&amp;act=b
=&gt; module = default(index), controller = a, action = b

Request: http://yourdomain.com/path
=&gt; module = default(index), controller = default(index), action = default(index)

### Ver también

- [Yaf_Route_Supervar::route()](#yaf-route-supervar.route) - El propósito de route

- [Yaf_Route_Static::route()](#yaf-route-static.route) - Enviar una petición

- [Yaf_Route_Regex::route()](#yaf-route-regex.route) - El propósito de route

- [Yaf_Route_Rewrite::route()](#yaf-route-rewrite.route) - El propósito de route

- [Yaf_Route_Map::route()](#yaf-route-map.route) - El propósito de route

# Yaf_Route_Simple::route

(Yaf &gt;=1.0.0)

Yaf_Route_Simple::route — Enviar una petición

### Descripción

public **Yaf_Route_Simple::route**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

Véase [Yaf_Route_Simple::\_\_construct()](#yaf-route-simple.construct)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    request





### Valores devueltos

Siempre es **[true](#constant.true)**

### Ver también

- [Yaf_Route_Supervar::route()](#yaf-route-supervar.route) - El propósito de route

- [Yaf_Route_Static::route()](#yaf-route-static.route) - Enviar una petición

- [Yaf_Route_Regex::route()](#yaf-route-regex.route) - El propósito de route

- [Yaf_Route_Rewrite::route()](#yaf-route-rewrite.route) - El propósito de route

- [Yaf_Route_Map::route()](#yaf-route-map.route) - El propósito de route

## Tabla de contenidos

- [Yaf_Route_Simple::assemble](#yaf-route-simple.assemble) — Ensamblar un URL
- [Yaf_Route_Simple::\_\_construct](#yaf-route-simple.construct) — El constructor de la clase Yaf_Route_Simple
- [Yaf_Route_Simple::route](#yaf-route-simple.route) — Enviar una petición

# La clase Yaf_Route_Static

(Yaf &gt;=1.0.0)

## Introducción

    Por defecto, [Yaf_Router](#class.yaf-router) sólo tiene un
    **Yaf_Route_Static** como su ruta predeterminada.




    Y **Yaf_Route_Static** está diseñada para manejar el
    80% de los requisitos.




    Por favor, *OBSERVE* que no es necesario instanciar un objeto de la clase **Yaf_Route_Static**, y que también
    es innecesario añadirlo a la pila de enrutamientos de [Yaf_Router](#class.yaf-router),
    ya que siempre hay una en la pila de enrutamiento de [Yaf_Router](#class.yaf-router),
    y que siempre será llamada en el último momento.

## Sinopsis de la Clase

    ****




      class **Yaf_Route_Static**


     implements
       [Yaf_Router](#class.yaf-router) {


    /* Métodos */

public [assemble](#yaf-route-static.assemble)([array](#language.types.array) $info, [array](#language.types.array) $query = ?): [string](#language.types.string)
public [match](#yaf-route-static.match)([string](#language.types.string) $uri): [void](language.types.void.html)
public [route](#yaf-route-static.route)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

}

# Yaf_Route_Static::assemble

(Yaf &gt;=2.3.0)

Yaf_Route_Static::assemble — Ensamblar un URL

### Descripción

public **Yaf_Route_Static::assemble**([array](#language.types.array) $info, [array](#language.types.array) $query = ?): [string](#language.types.string)

Ensamblar un URL.

### Parámetros

    info









    query





### Valores devueltos

Devuelve un [string](#language.types.string).

### Errores/Excepciones

Lanza [Yaf_Exception_TypeError](#class.yaf-exception-typeerror) si las claves ':c' y ':a' de info no están establecidas.

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Route_Static::assemble()**

&lt;?php

$router = new Yaf_Router();

$route = new Yaf_Route_Static();

$router-&gt;addRoute("static", $route);

var_dump($router-&gt;getRoute('static')-&gt;assemble(
array(
':a' =&gt; 'yafaction',
'tkey' =&gt; 'tval',
':c' =&gt; 'yafcontroller',
':m' =&gt; 'yafmodule'
),
)
);

var_dump($router-&gt;getRoute('static')-&gt;assemble(
array(
':a' =&gt; 'yafaction',
'tkey' =&gt; 'tval',
':c' =&gt; 'yafcontroller',
':m' =&gt; 'yafmodule'
),
array(
'tkey1' =&gt; 'tval1',
'tkey2' =&gt; 'tval2'
)
)
);

Resultado del ejemplo anterior es similar a:

string(%d) "/yafmodule/yafcontroller/yafaction"
string(%d) "/yafmodule/yafcontroller/yafaction?tkey1=tval1&amp;tkey2=tval2"

# Yaf_Route_Static::match

(Yaf &gt;=1.0.0)

Yaf_Route_Static::match — El propósito de match

### Descripción

public **Yaf_Route_Static::match**([string](#language.types.string) $uri): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    uri





### Valores devueltos

# Yaf_Route_Static::route

(Yaf &gt;=1.0.0)

Yaf_Route_Static::route — Enviar una petición

### Descripción

public **Yaf_Route_Static::route**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    request





### Valores devueltos

Siempre es **[true](#constant.true)**

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Route_Static::route()**

// se asume que sólo existe un módulo definido: Index
Request: http://yourdomain.com/a/b
=&gt; module = index, controller=a, action=b

//se asume ap.action_prefer = On
Request: http://yourdomain.com/b
=&gt; module = default(index), controller = default(index), action = b

//se asume ap.action_prefer = Off
Request: http://yourdomain.com/b
=&gt; module = default(index), controller = b, action = default(index)

Request: http://yourdomain.com/a/b/foo/bar/test/a/id/4
=&gt; module = default(index), controller = a, action = b, request parameters: foo = bar, test = a, id = 4

### Ver también

- [Yaf_Route_Supervar::route()](#yaf-route-supervar.route) - El propósito de route

- [Yaf_Route_Simple::route()](#yaf-route-simple.route) - Enviar una petición

- [Yaf_Route_Regex::route()](#yaf-route-regex.route) - El propósito de route

- [Yaf_Route_Rewrite::route()](#yaf-route-rewrite.route) - El propósito de route

- [Yaf_Route_Map::route()](#yaf-route-map.route) - El propósito de route

## Tabla de contenidos

- [Yaf_Route_Static::assemble](#yaf-route-static.assemble) — Ensamblar un URL
- [Yaf_Route_Static::match](#yaf-route-static.match) — El propósito de match
- [Yaf_Route_Static::route](#yaf-route-static.route) — Enviar una petición

# La clase Yaf_Route_Supervar

(Yaf &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yaf_Route_Supervar**


     implements
       [Yaf_Route_Interface](#class.yaf-route-interface) {

    /* Propiedades */

     protected
      [$_var_name](#yaf-route-supervar.props.var-name);



    /* Métodos */

public [\_\_construct](#yaf-route-supervar.construct)([string](#language.types.string) $supervar_name)

    public [assemble](#yaf-route-supervar.assemble)([array](#language.types.array) $info, [array](#language.types.array) $query = ?): [string](#language.types.string)

public [route](#yaf-route-supervar.route)([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

}

## Propiedades

     _var_name






# Yaf_Route_Supervar::assemble

(Yaf &gt;=2.3.0)

Yaf_Route_Supervar::assemble — Ensamblar un URL

### Descripción

public **Yaf_Route_Supervar::assemble**([array](#language.types.array) $info, [array](#language.types.array) $query = ?): [string](#language.types.string)

Ensamblar un URL.

### Parámetros

    info









    query





### Valores devueltos

Devuelve un [string](#language.types.string).

### Errores/Excepciones

Lanza [Yaf_Exception_TypeError](#class.yaf-exception-typeerror) si las claves ':c' y ':a' de info no están establecidas.

### Ejemplos

**Ejemplo #1 Ejemplo de Yaf_Route_Supervar::assemble()**

&lt;?php

$router = new Yaf_Router();

$route = new Yaf_Route_Supervar('r');

$router-&gt;addRoute("supervar", $route);

var_dump($router-&gt;getRoute('supervar')-&gt;assemble(
array(
':a' =&gt; 'yafaction',
'tkey' =&gt; 'tval',
':c' =&gt; 'yafcontroller',
':m' =&gt; 'yafmodule'
),
array(
'tkey1' =&gt; 'tval1',
'tkey2' =&gt; 'tval2'
)
));

try {
var_dump($router-&gt;getRoute('supervar')-&gt;assemble(
        array(
              ':a' =&gt; 'yafaction',
              'tkey' =&gt; 'tval',
              ':m' =&gt; 'yafmodule'
        ),
        array(
              'tkey1' =&gt; 'tval1',
              'tkey2' =&gt; 'tval2',
              1 =&gt; array(),
        )
));
} catch (Exception $e) {
    var_dump($e-&gt;getMessage());
}

Resultado del ejemplo anterior es similar a:

string(%d) "?r=/yafmodule/yafcontroller/yafaction&amp;tkey1=tval1&amp;tkey2=tval2"
string(%d) "You need to specify the controller by ':c'"

# Yaf_Route_Supervar::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Route_Supervar::**construct — El propósito de **construct

### Descripción

public **Yaf_Route_Supervar::\_\_construct**([string](#language.types.string) $supervar_name)

[Yaf_Route_Supervar](#class.yaf-route-supervar) es similar a
[Yaf_Route_Static](#class.yaf-route-static), con la diferencia de que
[Yaf_Route_Supervar](#class.yaf-route-supervar) buscará información de ruta en la cadena
de consulta, y el parámetro supervar_name es la clave.

### Parámetros

    supervar_name


      El nombre de la clave


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de [Yaf_Route_Supervar](#class.yaf-route-supervar)**

&lt;?php
/\*\*
_ Añadir una ruta supervar a la pila de rutas de Yaf_Router
_/
Yaf_Dispatcher::getInstance()-&gt;getRouter()-&gt;addRoute(
"name",
new Yaf_Route_Supervar("r")
);
?&gt;

Resultado del ejemplo anterior es similar a:

/\*\* para la petición: http://yourdomain.com/xx/oo/?r=/ctr/act/var/value

- resultará en lo siguiente:
  \*/
  array (
  "module" =&gt; index(default),
  "controller" =&gt; ctr,
  "action" =&gt; act,
  "params" =&gt; array(
  "var" =&gt; value,
  )
  )

### Ver también

- [Yaf_Router::addRoute()](#yaf-router.addroute) - Añadir una nueva ruta al Enrutador

- [Yaf_Router::addConfig()](#yaf-router.addconfig) - Añadir rutas definidas en configuración al Enrutador

- [Yaf_Route_Static](#class.yaf-route-static)

- [Yaf_Route_Regex](#class.yaf-route-regex)

- [Yaf_Route_Simple](#class.yaf-route-simple)

- [Yaf_Route_Rewrite](#class.yaf-route-rewrite)

- [Yaf_Route_Map](#class.yaf-route-map)

# Yaf_Route_Supervar::route

(Yaf &gt;=1.0.0)

Yaf_Route_Supervar::route — El propósito de route

### Descripción

public **Yaf_Route_Supervar::route**([Yaf_Request_Abstract](#class.yaf-request-abstract) $request): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    request





### Valores devueltos

Si existe una clave (la cual fue definida en
[Yaf_Route_Supervar::\_\_construct()](#yaf-route-supervar.construct)) en $\_GET, devuelve **[true](#constant.true)**,
si no devuelve **[false](#constant.false)**.

## Tabla de contenidos

- [Yaf_Route_Supervar::assemble](#yaf-route-supervar.assemble) — Ensamblar un URL
- [Yaf_Route_Supervar::\_\_construct](#yaf-route-supervar.construct) — El propósito de \_\_construct
- [Yaf_Route_Supervar::route](#yaf-route-supervar.route) — El propósito de route

# La clase Yaf_Session

(Yaf &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yaf_Session**


     implements
       [Iterator](#class.iterator),  [ArrayAccess](#class.arrayaccess),  [Countable](#class.countable) {

    /* Propiedades */

     protected
     static
      [$_instance](#yaf-session.props.instance);

    protected
      [$_session](#yaf-session.props.session);

    protected
      [$_started](#yaf-session.props.started);



    /* Métodos */

private [\_\_construct](#yaf-session.construct)()

    public [count](#yaf-session.count)(): [void](language.types.void.html)

public [current](#yaf-session.current)(): [void](language.types.void.html)
public [del](#yaf-session.del)([string](#language.types.string) $name): [void](language.types.void.html)
public [\_\_get](#yaf-session.get)([string](#language.types.string) $name): [void](language.types.void.html)
public static [getInstance](#yaf-session.getinstance)(): [void](language.types.void.html)
public [has](#yaf-session.has)([string](#language.types.string) $name): [void](language.types.void.html)
public [\_\_isset](#yaf-session.isset)([string](#language.types.string) $name): [void](language.types.void.html)
public [key](#yaf-session.key)(): [void](language.types.void.html)
public [next](#yaf-session.next)(): [void](language.types.void.html)
public [offsetExists](#yaf-session.offsetexists)([string](#language.types.string) $name): [void](language.types.void.html)
public [offsetGet](#yaf-session.offsetget)([string](#language.types.string) $name): [void](language.types.void.html)
public [offsetSet](#yaf-session.offsetset)([string](#language.types.string) $name, [string](#language.types.string) $value): [void](language.types.void.html)
public [offsetUnset](#yaf-session.offsetunset)([string](#language.types.string) $name): [void](language.types.void.html)
public [rewind](#yaf-session.rewind)(): [void](language.types.void.html)
public [\_\_set](#yaf-session.set)([string](#language.types.string) $name, [string](#language.types.string) $value): [void](language.types.void.html)
public [start](#yaf-session.start)(): [void](language.types.void.html)
public [\_\_unset](#yaf-session.unset)([string](#language.types.string) $name): [void](language.types.void.html)
public [valid](#yaf-session.valid)(): [void](language.types.void.html)

}

## Propiedades

     _instance







     _session







     _started






# Yaf_Session::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Session::\_\_construct — Constructor de Yaf_Session

### Descripción

private **Yaf_Session::\_\_construct**()

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Session::count

(Yaf &gt;=1.0.0)

Yaf_Session::count — El propósito de count

### Descripción

public **Yaf_Session::count**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Session::current

(Yaf &gt;=1.0.0)

Yaf_Session::current — El propósito de current

### Descripción

public **Yaf_Session::current**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Session::del

(Yaf &gt;=1.0.0)

Yaf_Session::del — El propósito de del

### Descripción

public **Yaf_Session::del**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Session::\_\_get

(Yaf &gt;=1.0.0)

Yaf_Session::**get — El propósito de **get

### Descripción

public **Yaf_Session::\_\_get**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Session::getInstance

(Yaf &gt;=1.0.0)

Yaf_Session::getInstance — El propósito de getInstance

### Descripción

public static **Yaf_Session::getInstance**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Session::has

(Yaf &gt;=1.0.0)

Yaf_Session::has — El propósito de has

### Descripción

public **Yaf_Session::has**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Session::\_\_isset

(Yaf &gt;=1.0.0)

Yaf_Session::**isset — El propósito de **isset

### Descripción

public **Yaf_Session::\_\_isset**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Session::key

(Yaf &gt;=1.0.0)

Yaf_Session::key — El propósito de key

### Descripción

public **Yaf_Session::key**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Session::next

(Yaf &gt;=1.0.0)

Yaf_Session::next — El propósito de next

### Descripción

public **Yaf_Session::next**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Session::offsetExists

(Yaf &gt;=1.0.0)

Yaf_Session::offsetExists — El propósito de offsetExists

### Descripción

public **Yaf_Session::offsetExists**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Session::offsetGet

(Yaf &gt;=1.0.0)

Yaf_Session::offsetGet — El propósito de offsetGet

### Descripción

public **Yaf_Session::offsetGet**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Session::offsetSet

(Yaf &gt;=1.0.0)

Yaf_Session::offsetSet — El propósito de offsetSet

### Descripción

public **Yaf_Session::offsetSet**([string](#language.types.string) $name, [string](#language.types.string) $value): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name









    value





### Valores devueltos

# Yaf_Session::offsetUnset

(Yaf &gt;=1.0.0)

Yaf_Session::offsetUnset — El propósito de offsetUnset

### Descripción

public **Yaf_Session::offsetUnset**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Session::rewind

(Yaf &gt;=1.0.0)

Yaf_Session::rewind — El propósito de rewind

### Descripción

public **Yaf_Session::rewind**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Session::\_\_set

(Yaf &gt;=1.0.0)

Yaf_Session::**set — El propósito de **set

### Descripción

public **Yaf_Session::\_\_set**([string](#language.types.string) $name, [string](#language.types.string) $value): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name









    value





### Valores devueltos

# Yaf_Session::start

(Yaf &gt;=1.0.0)

Yaf_Session::start — El propósito de start

### Descripción

public **Yaf_Session::start**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Session::\_\_unset

(Yaf &gt;=1.0.0)

Yaf_Session::**unset — El propósito de **unset

### Descripción

public **Yaf_Session::\_\_unset**([string](#language.types.string) $name): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name





### Valores devueltos

# Yaf_Session::valid

(Yaf &gt;=1.0.0)

Yaf_Session::valid — El propósito de valid

### Descripción

public **Yaf_Session::valid**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [Yaf_Session::\_\_construct](#yaf-session.construct) — Constructor de Yaf_Session
- [Yaf_Session::count](#yaf-session.count) — El propósito de count
- [Yaf_Session::current](#yaf-session.current) — El propósito de current
- [Yaf_Session::del](#yaf-session.del) — El propósito de del
- [Yaf_Session::\_\_get](#yaf-session.get) — El propósito de \_\_get
- [Yaf_Session::getInstance](#yaf-session.getinstance) — El propósito de getInstance
- [Yaf_Session::has](#yaf-session.has) — El propósito de has
- [Yaf_Session::\_\_isset](#yaf-session.isset) — El propósito de \_\_isset
- [Yaf_Session::key](#yaf-session.key) — El propósito de key
- [Yaf_Session::next](#yaf-session.next) — El propósito de next
- [Yaf_Session::offsetExists](#yaf-session.offsetexists) — El propósito de offsetExists
- [Yaf_Session::offsetGet](#yaf-session.offsetget) — El propósito de offsetGet
- [Yaf_Session::offsetSet](#yaf-session.offsetset) — El propósito de offsetSet
- [Yaf_Session::offsetUnset](#yaf-session.offsetunset) — El propósito de offsetUnset
- [Yaf_Session::rewind](#yaf-session.rewind) — El propósito de rewind
- [Yaf_Session::\_\_set](#yaf-session.set) — El propósito de \_\_set
- [Yaf_Session::start](#yaf-session.start) — El propósito de start
- [Yaf_Session::\_\_unset](#yaf-session.unset) — El propósito de \_\_unset
- [Yaf_Session::valid](#yaf-session.valid) — El propósito de valid

# La clase Yaf_Exception

(Yaf &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yaf_Exception**



      extends
       [Exception](#class.exception)

     {

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

public [\_\_construct](#yaf-exception.construct)()

    public [getPrevious](#yaf-exception.getprevious)(): [void](language.types.void.html)


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

# Yaf_Exception::\_\_construct

(Yaf &gt;=1.0.0)

Yaf_Exception::**construct — El propósito de **construct

### Descripción

public **Yaf_Exception::\_\_construct**()

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Yaf_Exception::getPrevious

(Yaf &gt;=1.0.0)

Yaf_Exception::getPrevious — El propósito de getPrevious

### Descripción

public **Yaf_Exception::getPrevious**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [Yaf_Exception::\_\_construct](#yaf-exception.construct) — El propósito de \_\_construct
- [Yaf_Exception::getPrevious](#yaf-exception.getprevious) — El propósito de getPrevious

# La clase Yaf_Exception_TypeError

(Yaf &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yaf_Exception_TypeError**



      extends
       [Yaf_Exception](#class.yaf-exception)

     {

    /* Propiedades */


    /* Métodos */

    /* Métodos heredados */

public [Yaf_Exception::getPrevious](#yaf-exception.getprevious)(): [void](language.types.void.html)

}

# La clase Yaf_Exception_StartupError

(Yaf &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yaf_Exception_StartupError**



      extends
       [Yaf_Exception](#class.yaf-exception)

     {

    /* Propiedades */


    /* Métodos */

    /* Métodos heredados */

public [Yaf_Exception::getPrevious](#yaf-exception.getprevious)(): [void](language.types.void.html)

}

# La clase Yaf_Exception_DispatchFailed

(Yaf &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yaf_Exception_DispatchFailed**



      extends
       [Yaf_Exception](#class.yaf-exception)

     {

    /* Propiedades */

    /* Métodos */

    /* Métodos heredados */

public [Yaf_Exception::getPrevious](#yaf-exception.getprevious)(): [void](language.types.void.html)

}

# La clase Yaf_Exception_RouterFailed

(Yaf &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yaf_Exception_RouterFailed**



      extends
       [Yaf_Exception](#class.yaf-exception)

     {

    /* Propiedades */


    /* Métodos */

    /* Métodos heredados */

public [Yaf_Exception::getPrevious](#yaf-exception.getprevious)(): [void](language.types.void.html)

}

# La clase Yaf_Exception_LoadFailed

(Yaf &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yaf_Exception_LoadFailed**



      extends
       [Yaf_Exception](#class.yaf-exception)

     {

    /* Propiedades */

    /* Métodos */

    /* Métodos heredados */

public [Yaf_Exception::getPrevious](#yaf-exception.getprevious)(): [void](language.types.void.html)

}

# La clase Yaf_Exception_LoadFailed_Module

(Yaf &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yaf_Exception_LoadFailed_Module**



      extends
       [Yaf_Exception_LoadFailed](#class.yaf-exception-loadfailed)

     {

    /* Propiedades */


    /* Métodos */

    /* Métodos heredados */

public [Yaf_Exception::getPrevious](#yaf-exception.getprevious)(): [void](language.types.void.html)

}

# La clase Yaf_Exception_LoadFailed_Controller

(Yaf &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yaf_Exception_LoadFailed_Controller**



      extends
       [Yaf_Exception_LoadFailed](#class.yaf-exception-loadfailed)

     {

    /* Propiedades */

    /* Métodos */

    /* Métodos heredados */

public [Yaf_Exception::getPrevious](#yaf-exception.getprevious)(): [void](language.types.void.html)

}

# La clase Yaf_Exception_LoadFailed_Action

(Yaf &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yaf_Exception_LoadFailed_Action**



      extends
       [Yaf_Exception_LoadFailed](#class.yaf-exception-loadfailed)

     {

    /* Propiedades */


    /* Métodos */

    /* Métodos heredados */

public [Yaf_Exception::getPrevious](#yaf-exception.getprevious)(): [void](language.types.void.html)

}

# La clase Yaf_Exception_LoadFailed_View

(Yaf &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **Yaf_Exception_LoadFailed_View**



      extends
       [Yaf_Exception_LoadFailed](#class.yaf-exception-loadfailed)

     {

    /* Propiedades */


    /* Métodos */

    /* Métodos heredados */

public [Yaf_Exception::getPrevious](#yaf-exception.getprevious)(): [void](language.types.void.html)

}

- [Introducción](#intro.yaf)
- [Instalación/Configuración](#yaf.setup)<li>[Instalación](#yaf.installation)
- [Configuración en tiempo de ejecución](#yaf.configuration)
  </li>- [Constantes predefinidas](#yaf.constants)
- [Ejemplos](#yaf.tutorials)
- [Configuración de la Aplicación](#yaf.appconfig)
- [Yaf_Application](#class.yaf-application) — La clase Yaf_Application<li>[Yaf_Application::app](#yaf-application.app) — Recuperar una instancia de la clase Application
- [Yaf_Application::bootstrap](#yaf-application.bootstrap) — Llamar al arranque
- [Yaf_Application::clearLastError](#yaf-application.clearlasterror) — Limpiar la información del último error
- [Yaf_Application::\_\_construct](#yaf-application.construct) — El constructor de la clase Yaf_Application
- [Yaf_Application::\_\_destruct](#yaf-application.destruct) — El propósito de \_\_destruct
- [Yaf_Application::environ](#yaf-application.environ) — Recuperar el entorno
- [Yaf_Application::execute](#yaf-application.execute) — Ejecutar una llamada de retorno
- [Yaf_Application::getAppDirectory](#yaf-application.getappdirectory) — Obtener el directorio de la aplicación
- [Yaf_Application::getConfig](#yaf-application.getconfig) — Recuperar la instancia de configuración
- [Yaf_Application::getDispatcher](#yaf-application.getdispatcher) — Obtener la instancia de la clase Yaf_Dispatcher
- [Yaf_Application::getLastErrorMsg](#yaf-application.getlasterrormsg) — Obtener el mensaje del último error ocurrido
- [Yaf_Application::getLastErrorNo](#yaf-application.getlasterrorno) — Pbetner el código del último error ocurrido
- [Yaf_Application::getModules](#yaf-application.getmodules) — Obtener los nombres de los modulos definidos
- [Yaf_Application::run](#yaf-application.run) — Iniciar una instancia de la clase Yaf_Application
- [Yaf_Application::setAppDirectory](#yaf-application.setappdirectory) — Cambiar el directorio de la aplicación
  </li>- [Yaf_Bootstrap_Abstract](#class.yaf-bootstrap-abstract) — La clase Yaf_Bootstrap_Abstract
- [Yaf_Dispatcher](#class.yaf-dispatcher) — La clase Yaf_Dispatcher<li>[Yaf_Dispatcher::autoRender](#yaf-dispatcher.autorender) — Activa/desactiva la autointerpretación
- [Yaf_Dispatcher::catchException](#yaf-dispatcher.catchexception) — Activar/desactivar la captura de excepciones
- [Yaf_Dispatcher::\_\_construct](#yaf-dispatcher.construct) — Constructor de la clase Yaf_Dispatcher
- [Yaf_Dispatcher::disableView](#yaf-dispatcher.disableview) — Deshabilita la interpretación de vistas
- [Yaf_Dispatcher::dispatch](#yaf-dispatcher.dispatch) — Despachar una petición
- [Yaf_Dispatcher::enableView](#yaf-dispatcher.enableview) — Habilita la interpretación de vistas
- [Yaf_Dispatcher::flushInstantly](#yaf-dispatcher.flushinstantly) — Activa/desactiva el vaciado instantáneo
- [Yaf_Dispatcher::getApplication](#yaf-dispatcher.getapplication) — Recupera la aplicación
- [Yaf_Dispatcher::getDefaultAction](#yaf-dispatcher.getdefaultaction) — Recupera el nombre de la acción por defecto
- [Yaf_Dispatcher::getDefaultController](#yaf-dispatcher.getdefaultcontroller) — Recupera el nombre del controlador predeterminado
- [Yaf_Dispatcher::getDefaultModule](#yaf-dispatcher.getdefaultmodule) — Recupera el nombre del módulo por defecto
- [Yaf_Dispatcher::getInstance](#yaf-dispatcher.getinstance) — Recupeara la instancia despachadora
- [Yaf_Dispatcher::getRequest](#yaf-dispatcher.getrequest) — Recupera la instancia de petición
- [Yaf_Dispatcher::getRouter](#yaf-dispatcher.getrouter) — Recuperar la instancia de envío
- [Yaf_Dispatcher::initView](#yaf-dispatcher.initview) — Inicializa una vista y la devuelve
- [Yaf_Dispatcher::registerPlugin](#yaf-dispatcher.registerplugin) — Registra un complemento
- [Yaf_Dispatcher::returnResponse](#yaf-dispatcher.returnresponse) — El propósito de returnResponse
- [Yaf_Dispatcher::setDefaultAction](#yaf-dispatcher.setdefaultaction) — Cambia el nombre de la acción predeterminada
- [Yaf_Dispatcher::setDefaultController](#yaf-dispatcher.setdefaultcontroller) — Cambia el nombre del controlador predeterminado
- [Yaf_Dispatcher::setDefaultModule](#yaf-dispatcher.setdefaultmodule) — Cambia el nombre del módulo predeterminado
- [Yaf_Dispatcher::setErrorHandler](#yaf-dispatcher.seterrorhandler) — Establece el gestor de errores
- [Yaf_Dispatcher::setRequest](#yaf-dispatcher.setrequest) — El propósito de setRequest
- [Yaf_Dispatcher::setView](#yaf-dispatcher.setview) — Establecer un motor de vistas personalizado
- [Yaf_Dispatcher::throwException](#yaf-dispatcher.throwexception) — Activa/desactiva el lanzamiento de excepciones
  </li>- [Yaf_Config_Abstract](#class.yaf-config-abstract) — La clase Yaf_Config_Abstract<li>[Yaf_Config_Abstract::get](#yaf-config-abstract.get) — Consultor
- [Yaf_Config_Abstract::readonly](#yaf-config-abstract.readonly) — Buscar si una configuración es de sólo lectura
- [Yaf_Config_Abstract::set](#yaf-config-abstract.set) — Modificador
- [Yaf_Config_Abstract::toArray](#yaf-config-abstract.toarray) — Convertir en un array
  </li>- [Yaf_Config_Ini](#class.yaf-config-ini) — La clase Yaf_Config_Ini<li>[Yaf_Config_Ini::__construct](#yaf-config-ini.construct) — Constructor de Yaf_Config_Ini
- [Yaf_Config_Ini::count](#yaf-config-ini.count) — Contar todos los elementos en Yaf_Config.ini
- [Yaf_Config_Ini::current](#yaf-config-ini.current) — Recuperar el valor actual
- [Yaf_Config_Ini::\_\_get](#yaf-config-ini.get) — Recuperar un elemento
- [Yaf_Config_Ini::\_\_isset](#yaf-config-ini.isset) — Determinar si existe una clave
- [Yaf_Config_Ini::key](#yaf-config-ini.key) — Buscar la clave del elemento actual
- [Yaf_Config_Ini::next](#yaf-config-ini.next) — Avanzar el puntero interno
- [Yaf_Config_Ini::offsetExists](#yaf-config-ini.offsetexists) — El propósito de offsetExists
- [Yaf_Config_Ini::offsetGet](#yaf-config-ini.offsetget) — El propósito de offsetGet
- [Yaf_Config_Ini::offsetSet](#yaf-config-ini.offsetset) — El propósito de offsetSet
- [Yaf_Config_Ini::offsetUnset](#yaf-config-ini.offsetunset) — El propósito de offsetUnset
- [Yaf_Config_Ini::readonly](#yaf-config-ini.readonly) — El propósito de readonly
- [Yaf_Config_Ini::rewind](#yaf-config-ini.rewind) — El propósito de rewind
- [Yaf_Config_Ini::\_\_set](#yaf-config-ini.set) — El propósito de \_\_set
- [Yaf_Config_Ini::toArray](#yaf-config-ini.toarray) — Devuelve la configuración como un array PHP
- [Yaf_Config_Ini::valid](#yaf-config-ini.valid) — El propósito de valid
  </li>- [Yaf_Config_Simple](#class.yaf-config-simple) — LA clase Yaf_Config_Simple<li>[Yaf_Config_Simple::__construct](#yaf-config-simple.construct) — El propósito de __construct
- [Yaf_Config_Simple::count](#yaf-config-simple.count) — El propósito de count
- [Yaf_Config_Simple::current](#yaf-config-simple.current) — El propósito de current
- [Yaf_Config_Simple::\_\_get](#yaf-config-simple.get) — El propósito de \_\_get
- [Yaf_Config_Simple::\_\_isset](#yaf-config-simple.isset) — El propósito de \_\_isset
- [Yaf_Config_Simple::key](#yaf-config-simple.key) — El propósito de key
- [Yaf_Config_Simple::next](#yaf-config-simple.next) — El propósito de next
- [Yaf_Config_Simple::offsetExists](#yaf-config-simple.offsetexists) — El propósito de offsetExists
- [Yaf_Config_Simple::offsetGet](#yaf-config-simple.offsetget) — El propósito de offsetGet
- [Yaf_Config_Simple::offsetSet](#yaf-config-simple.offsetset) — El propósito de offsetSet
- [Yaf_Config_Simple::offsetUnset](#yaf-config-simple.offsetunset) — El propósito de offsetUnset
- [Yaf_Config_Simple::readonly](#yaf-config-simple.readonly) — El propósito de readonly
- [Yaf_Config_Simple::rewind](#yaf-config-simple.rewind) — El propósito de rewind
- [Yaf_Config_Simple::\_\_set](#yaf-config-simple.set) — El propósito de \_\_set
- [Yaf_Config_Simple::toArray](#yaf-config-simple.toarray) — Devuelve un array de PHP
- [Yaf_Config_Simple::valid](#yaf-config-simple.valid) — El propósito de valid
  </li>- [Yaf_Controller_Abstract](#class.yaf-controller-abstract) — La clase Yaf_Controller_Abstract<li>[Yaf_Controller_Abstract::__construct](#yaf-controller-abstract.construct) — Constructor de Yaf_Controller_Abstract
- [Yaf_Controller_Abstract::display](#yaf-controller-abstract.display) — El propósito de display
- [Yaf_Controller_Abstract::forward](#yaf-controller-abstract.forward) — Avanza a la siguiente acción
- [Yaf_Controller_Abstract::getInvokeArg](#yaf-controller-abstract.getinvokearg) — El propósito de getInvokeArg
- [Yaf_Controller_Abstract::getInvokeArgs](#yaf-controller-abstract.getinvokeargs) — El propósito de getInvokeArgs
- [Yaf_Controller_Abstract::getModuleName](#yaf-controller-abstract.getmodulename) — Obtiene el nombre del módulo
- [Yaf_Controller_Abstract::getName](#yaf-controller-abstract.getname) — Obtener el nombre propio
- [Yaf_Controller_Abstract::getRequest](#yaf-controller-abstract.getrequest) — Recupera el objeto petición actual
- [Yaf_Controller_Abstract::getResponse](#yaf-controller-abstract.getresponse) — Recupera el objeto respuesta actual
- [Yaf_Controller_Abstract::getView](#yaf-controller-abstract.getview) — Recupera el motor de vistas
- [Yaf_Controller_Abstract::getViewpath](#yaf-controller-abstract.getviewpath) — El propósito de getViewpath
- [Yaf_Controller_Abstract::init](#yaf-controller-abstract.init) — Inicializador del controlador
- [Yaf_Controller_Abstract::initView](#yaf-controller-abstract.initview) — El propósito de initView
- [Yaf_Controller_Abstract::redirect](#yaf-controller-abstract.redirect) — Redirige a un URL
- [Yaf_Controller_Abstract::render](#yaf-controller-abstract.render) — Interpreta una plantilla de vista
- [Yaf_Controller_Abstract::setViewpath](#yaf-controller-abstract.setviewpath) — El propósito de setViewpath
  </li>- [Yaf_Action_Abstract](#class.yaf-action-abstract) — La clase Yaf_Action_Abstract<li>[Yaf_Action_Abstract::execute](#yaf-action-abstract.execute) — Punto de entrada de una acción
- [Yaf_Action_Abstract::getController](#yaf-action-abstract.getcontroller) — Recupera el objeto controlador
- [Yaf_Action_Abstract::getControllerName](#yaf-controller-abstract.getcontrollername) — Obtener el nombre del controlador
  </li>- [Yaf_View_Interface](#class.yaf-view-interface) — La clase Yaf_View_Interface<li>[Yaf_View_Interface::assign](#yaf-view-interface.assign) — Asignar valores al motor de Vistas
- [Yaf_View_Interface::display](#yaf-view-interface.display) — Interpretar e imprimir una plantilla
- [Yaf_View_Interface::getScriptPath](#yaf-view-interface.getscriptpath) — El propósito de getScriptPath
- [Yaf_View_Interface::render](#yaf-view-interface.render) — Interpretar una plantilla
- [Yaf_View_Interface::setScriptPath](#yaf-view-interface.setscriptpath) — El propósito de setScriptPath
  </li>- [Yaf_View_Simple](#class.yaf-view-simple) — La clase Yaf_View_Simple<li>[Yaf_View_Simple::assign](#yaf-view-simple.assign) — Asignar valores
- [Yaf_View_Simple::assignRef](#yaf-view-simple.assignref) — El propósito de assignRef
- [Yaf_View_Simple::clear](#yaf-view-simple.clear) — Limpiar valores asignados
- [Yaf_View_Simple::\_\_construct](#yaf-view-simple.construct) — El constructor de Yaf_View_Simple
- [Yaf_View_Simple::display](#yaf-view-simple.display) — Interpretar y mostrar
- [Yaf_View_Simple::eval](#yaf-view-simple.eval) — Interpreta una plantilla
- [Yaf_View_Simple::\_\_get](#yaf-view-simple.get) — Recupera una variable asignada
- [Yaf_View_Simple::getScriptPath](#yaf-view-simple.getscriptpath) — Obtiene el directorio de plantillas
- [Yaf_View_Simple::\_\_isset](#yaf-view-simple.isset) — El propósito de \_\_isset
- [Yaf_View_Simple::render](#yaf-view-simple.render) — Interpreta una plantilla
- [Yaf_View_Simple::\_\_set](#yaf-view-simple.set) — Establece el valor para el motor
- [Yaf_View_Simple::setScriptPath](#yaf-view-simple.setscriptpath) — Establece el directorio de plantillas
  </li>- [Yaf_Loader](#class.yaf-loader) — La clase Yaf_Loader<li>[Yaf_Loader::autoload](#yaf-loader.autoload) — El propósito de autoload
- [Yaf_Loader::clearLocalNamespace](#yaf-loader.clearlocalnamespace) — El propósito de clearLocalNamespace
- [Yaf_Loader::\_\_construct](#yaf-loader.construct) — El propósito de \_\_construct
- [Yaf_Loader::getInstance](#yaf-loader.getinstance) — El propósito de getInstance
- [Yaf_Loader::getLibraryPath](#yaf-loader.getlibrarypath) — Obtener la ruta de la biblioteca
- [Yaf_Loader::getLocalNamespace](#yaf-loader.getlocalnamespace) — El propósito de getLocalNamespace
- [Yaf_Loader::getNamespacePath](#yaf-loader.getnamespacepath) — Recupera la ruta de un espacio de nombres registrado
- [Yaf_Loader::getLocalNamespace](#yaf-loader.getnamespaces) — Recupera toda la información de un espacio de nombre
- [Yaf_Loader::import](#yaf-loader.import) — El propósito de import
- [Yaf_Loader::isLocalName](#yaf-loader.islocalname) — El propósito de isLocalName
- [Yaf_Loader::registerLocalNamespace](#yaf-loader.registerlocalnamespace) — Registra un prefijo de clase local
- [Yaf_Loader::registerNamespace](#yaf-loader.registernamespace) — Registra un espacio de nombre con ruta de búsqueda
- [Yaf_Loader::setLibraryPath](#yaf-loader.setlibrarypath) — Cmabiar la ruta de la biblioteca
  </li>- [Yaf_Plugin_Abstract](#class.yaf-plugin-abstract) — La clase Yaf_Plugin_Abstract<li>[Yaf_Plugin_Abstract::dispatchLoopShutdown](#yaf-plugin-abstract.dispatchloopshutdown) — El propósito de dispatchLoopShutdown
- [Yaf_Plugin_Abstract::dispatchLoopStartup](#yaf-plugin-abstract.dispatchloopstartup) — Enganchar antes del bucle de envío
- [Yaf_Plugin_Abstract::postDispatch](#yaf-plugin-abstract.postdispatch) — El propósito de postDispatch
- [Yaf_Plugin_Abstract::preDispatch](#yaf-plugin-abstract.predispatch) — El propósito de preDispatch
- [Yaf_Plugin_Abstract::preResponse](#yaf-plugin-abstract.preresponse) — El propósito de preResponse
- [Yaf_Plugin_Abstract::routerShutdown](#yaf-plugin-abstract.routershutdown) — El propósito de routerShutdown
- [Yaf_Plugin_Abstract::routerStartup](#yaf-plugin-abstract.routerstartup) — Enganche deEl propósito de routerStartup
  </li>- [Yaf_Registry](#class.yaf-registry) — La clase Yaf_Registry<li>[Yaf_Registry::__construct](#yaf-registry.construct) — Yaf_Registry implementa «singleton»
- [Yaf_Registry::del](#yaf-registry.del) — Elimina un elemento del registro
- [Yaf_Registry::get](#yaf-registry.get) — Recupera un elemento del registro
- [Yaf_Registry::has](#yaf-registry.has) — Comprueba si existe un elemento
- [Yaf_Registry::set](#yaf-registry.set) — Añade un elemento al registro
  </li>- [Yaf_Request_Abstract](#class.yaf-request-abstract) — La clase Yaf_Request_Abstract<li>[Yaf_Request_Abstract::clearParams](#yaf-request-abstract.clearparams) — Eliminar todos los parámetros
- [Yaf_Request_Abstract::getActionName](#yaf-request-abstract.getactionname) — El propósito de getActionName
- [Yaf_Request_Abstract::getBaseUri](#yaf-request-abstract.getbaseuri) — El propósito de getBaseUri
- [Yaf_Request_Abstract::getControllerName](#yaf-request-abstract.getcontrollername) — El propósito de getControllerName
- [Yaf_Request_Abstract::getEnv](#yaf-request-abstract.getenv) — Recupera la variable ENV
- [Yaf_Request_Abstract::getException](#yaf-request-abstract.getexception) — El propósito de getException
- [Yaf_Request_Abstract::getLanguage](#yaf-request-abstract.getlanguage) — Recupera el lenguaje preferido del cliente
- [Yaf_Request_Abstract::getMethod](#yaf-request-abstract.getmethod) — Recupera el método de solicitud
- [Yaf_Request_Abstract::getModuleName](#yaf-request-abstract.getmodulename) — El propósito de getModuleName
- [Yaf_Request_Abstract::getParam](#yaf-request-abstract.getparam) — Recupera el parámetro de llamada
- [Yaf_Request_Abstract::getParams](#yaf-request-abstract.getparams) — Recupera todos los parámetros de llamada
- [Yaf_Request_Abstract::getRequestUri](#yaf-request-abstract.getrequesturi) — El propósito de getRequestUri
- [Yaf_Request_Abstract::getServer](#yaf-request-abstract.getserver) — Recupera la variable SERVER
- [Yaf_Request_Abstract::isCli](#yaf-request-abstract.iscli) — Determina si la solicitud es una solicitud CLI
- [Yaf_Request_Abstract::isDispatched](#yaf-request-abstract.isdispatched) — Determina si la solicitud es enviada
- [Yaf_Request_Abstract::isGet](#yaf-request-abstract.isget) — Determina si la solicitud es una solicitud GET
- [Yaf_Request_Abstract::isHead](#yaf-request-abstract.ishead) — Determina si la solicitud es una solicitud HEAD
- [Yaf_Request_Abstract::isOptions](#yaf-request-abstract.isoptions) — Determina si la solicitud es una solicitud de OPCIONES
- [Yaf_Request_Abstract::isPost](#yaf-request-abstract.ispost) — Determina si la solicitud es una solicitud POST
- [Yaf_Request_Abstract::isPut](#yaf-request-abstract.isput) — Determina si la solicitud es una solicitud PUT
- [Yaf_Request_Abstract::isRouted](#yaf-request-abstract.isrouted) — Determina si la solicitud ha sido enrutada
- [Yaf_Request_Abstract::isXmlHttpRequest](#yaf-request-abstract.isxmlhttprequest) — Determina si la solicitud es una solicitud AJAX
- [Yaf_Request_Abstract::setActionName](#yaf-request-abstract.setactionname) — Establece el nombre de la acción
- [Yaf_Request_Abstract::setBaseUri](#yaf-request-abstract.setbaseuri) — Establecer el URI base
- [Yaf_Request_Abstract::setControllerName](#yaf-request-abstract.setcontrollername) — Establecer el nombre del controlador
- [Yaf_Request_Abstract::setDispatched](#yaf-request-abstract.setdispatched) — El propósito de setDispatched
- [Yaf_Request_Abstract::setModuleName](#yaf-request-abstract.setmodulename) — Establecer el nombre del módulo
- [Yaf_Request_Abstract::setParam](#yaf-request-abstract.setparam) — Establecer un argumento de llamada a una petición
- [Yaf_Request_Abstract::setRequestUri](#yaf-request-abstract.setrequesturi) — El propósito de setRequestUri
- [Yaf_Request_Abstract::setRouted](#yaf-request-abstract.setrouted) — El propósito de setRouted
  </li>- [Yaf_Request_Http](#class.yaf-request-http) — La clase Yaf_Request_Http<li>[Yaf_Request_Http::__construct](#yaf-request-http.construct) — Constructor de Yaf_Request_Http
- [Yaf_Request_Http::get](#yaf-request-http.get) — Recupera una variable del cliente
- [Yaf_Request_Http::getCookie](#yaf-request-http.getcookie) — Recupera una varible de Cookie
- [Yaf_Request_Http::getFiles](#yaf-request-http.getfiles) — El propósito de getFiles
- [Yaf_Request_Http::getPost](#yaf-request-http.getpost) — Recupera una variable de POST
- [Yaf_Request_Http::getQuery](#yaf-request-http.getquery) — Obtiene un parámetro de una consulta
- [Yaf_Request_Http::getRaw](#yaf-request-http.getraw) — Recupera el cuerpo de la solicitud de raw
- [Yaf_Request_Http::getRequest](#yaf-request-http.getrequest) — El propósito de getRequest
- [Yaf_Request_Http::isXmlHttpRequest](#yaf-request-http.isxmlhttprequest) — Determina si la solicitud es una solicitud de Ajax
  </li>- [Yaf_Request_Simple](#class.yaf-request-simple) — La clase Yaf_Request_Simple<li>[Yaf_Request_Simple::__construct](#yaf-request-simple.construct) — Constructor de Yaf_Request_Simple
- [Yaf_Request_Simple::get](#yaf-request-simple.get) — El propósito de get
- [Yaf_Request_Simple::getCookie](#yaf-request-simple.getcookie) — El propósito de getCookie
- [Yaf_Request_Simple::getFiles](#yaf-request-simple.getfiles) — El propósito de getFiles
- [Yaf_Request_Simple::getPost](#yaf-request-simple.getpost) — El propósito de getPost
- [Yaf_Request_Simple::getQuery](#yaf-request-simple.getquery) — El propósito de getQuery
- [Yaf_Request_Simple::getRequest](#yaf-request-simple.getrequest) — El propósito de getRequest
- [Yaf_Request_Simple::isXmlHttpRequest](#yaf-request-simple.isxmlhttprequest) — Determina si la solicitud es una solicitud AJAX
  </li>- [Yaf_Response_Abstract](#class.yaf-response-abstract) — La clase Yaf_Response_Abstract<li>[Yaf_Response_Abstract::appendBody](#yaf-response-abstract.appendbody) — Añadir contenido al cuerpo de respuesta
- [Yaf_Response_Abstract::clearBody](#yaf-response-abstract.clearbody) — Descarta todo el cuerpo de respuesta existente
- [Yaf_Response_Abstract::clearHeaders](#yaf-response-abstract.clearheaders) — Descarta todas las cabeceras establecidas
- [Yaf_Response_Abstract::\_\_construct](#yaf-response-abstract.construct) — El propósito de \_\_construct
- [Yaf_Response_Abstract::\_\_destruct](#yaf-response-abstract.destruct) — El propósito de \_\_destruct
- [Yaf_Response_Abstract::getBody](#yaf-response-abstract.getbody) — Recupera un contenido existente
- [Yaf_Response_Abstract::getHeader](#yaf-response-abstract.getheader) — El propósito de getHeader
- [Yaf_Response_Abstract::prependBody](#yaf-response-abstract.prependbody) — El propósito de prependBody
- [Yaf_Response_Abstract::response](#yaf-response-abstract.response) — Envía una respuesta
- [Yaf_Response_Abstract::setAllHeaders](#yaf-response-abstract.setallheaders) — El propósito de setAllHeaders
- [Yaf_Response_Abstract::setBody](#yaf-response-abstract.setbody) — Establece el contenido de una respuesta
- [Yaf_Response_Abstract::setHeader](#yaf-response-abstract.setheader) — Establece cabecera de respuesta
- [Yaf_Response_Abstract::setRedirect](#yaf-response-abstract.setredirect) — El propósito de setRedirect
- [Yaf_Response_Abstract::\_\_toString](#yaf-response-abstract.tostring) — Recupera todo el cuerpo como un string
  </li>- [Yaf_Route_Interface](#class.yaf-route-interface) — La clase Yaf_Route_Interface<li>[Yaf_Route_Interface::assemble](#yaf-route-interface.assemble) — Ensamblar una petición
- [Yaf_Route_Interface::route](#yaf-route-interface.route) — Enruta una petición
  </li>- [Yaf_Route_Map](#class.yaf-route-map) — La clase Yaf_Route_Map<li>[Yaf_Route_Map::assemble](#yaf-route-map.assemble) — Ensamblar un URL
- [Yaf_Route_Map::\_\_construct](#yaf-route-map.construct) — El propósito de \_\_construct
- [Yaf_Route_Map::route](#yaf-route-map.route) — El propósito de route
  </li>- [Yaf_Route_Regex](#class.yaf-route-regex) — La clase Yaf_Route_Regex<li>[Yaf_Route_Regex::assemble](#yaf-route-regex.assemble) — Ensamblar un URL
- [Yaf_Route_Regex::\_\_construct](#yaf-route-regex.construct) — Constructor de Yaf_Route_Regex
- [Yaf_Route_Regex::route](#yaf-route-regex.route) — El propósito de route
  </li>- [Yaf_Route_Rewrite](#class.yaf-route-rewrite) — La clase Yaf_Route_Rewrite<li>[Yaf_Route_Rewrite::assemble](#yaf-route-rewrite.assemble) — Ensamblar un URL
- [Yaf_Route_Rewrite::\_\_construct](#yaf-route-rewrite.construct) — Constructor de Yaf_Route_Rewrite
- [Yaf_Route_Rewrite::route](#yaf-route-rewrite.route) — El propósito de route
  </li>- [Yaf_Router](#class.yaf-router) — La clase Yaf_Router<li>[Yaf_Router::addConfig](#yaf-router.addconfig) — Añadir rutas definidas en configuración al Enrutador
- [Yaf_Router::addRoute](#yaf-router.addroute) — Añadir una nueva ruta al Enrutador
- [Yaf_Router::\_\_construct](#yaf-router.construct) — El constructor de Yaf_Router
- [Yaf_Router::getCurrentRoute](#yaf-router.getcurrentroute) — Obtener el nombre de la ruta efectiva
- [Yaf_Router::getRoute](#yaf-router.getroute) — Recupera una ruta por su nombre
- [Yaf_Router::getRoutes](#yaf-router.getroutes) — Recupera las rutas registradas
- [Yaf_Router::route](#yaf-router.route) — El propósito de route
  </li>- [Yaf_Route_Simple](#class.yaf-route-simple) — La clase Yaf_Route_Simple<li>[Yaf_Route_Simple::assemble](#yaf-route-simple.assemble) — Ensamblar un URL
- [Yaf_Route_Simple::\_\_construct](#yaf-route-simple.construct) — El constructor de la clase Yaf_Route_Simple
- [Yaf_Route_Simple::route](#yaf-route-simple.route) — Enviar una petición
  </li>- [Yaf_Route_Static](#class.yaf-route-static) — La clase Yaf_Route_Static<li>[Yaf_Route_Static::assemble](#yaf-route-static.assemble) — Ensamblar un URL
- [Yaf_Route_Static::match](#yaf-route-static.match) — El propósito de match
- [Yaf_Route_Static::route](#yaf-route-static.route) — Enviar una petición
  </li>- [Yaf_Route_Supervar](#class.yaf-route-supervar) — La clase Yaf_Route_Supervar<li>[Yaf_Route_Supervar::assemble](#yaf-route-supervar.assemble) — Ensamblar un URL
- [Yaf_Route_Supervar::\_\_construct](#yaf-route-supervar.construct) — El propósito de \_\_construct
- [Yaf_Route_Supervar::route](#yaf-route-supervar.route) — El propósito de route
  </li>- [Yaf_Session](#class.yaf-session) — La clase Yaf_Session<li>[Yaf_Session::__construct](#yaf-session.construct) — Constructor de Yaf_Session
- [Yaf_Session::count](#yaf-session.count) — El propósito de count
- [Yaf_Session::current](#yaf-session.current) — El propósito de current
- [Yaf_Session::del](#yaf-session.del) — El propósito de del
- [Yaf_Session::\_\_get](#yaf-session.get) — El propósito de \_\_get
- [Yaf_Session::getInstance](#yaf-session.getinstance) — El propósito de getInstance
- [Yaf_Session::has](#yaf-session.has) — El propósito de has
- [Yaf_Session::\_\_isset](#yaf-session.isset) — El propósito de \_\_isset
- [Yaf_Session::key](#yaf-session.key) — El propósito de key
- [Yaf_Session::next](#yaf-session.next) — El propósito de next
- [Yaf_Session::offsetExists](#yaf-session.offsetexists) — El propósito de offsetExists
- [Yaf_Session::offsetGet](#yaf-session.offsetget) — El propósito de offsetGet
- [Yaf_Session::offsetSet](#yaf-session.offsetset) — El propósito de offsetSet
- [Yaf_Session::offsetUnset](#yaf-session.offsetunset) — El propósito de offsetUnset
- [Yaf_Session::rewind](#yaf-session.rewind) — El propósito de rewind
- [Yaf_Session::\_\_set](#yaf-session.set) — El propósito de \_\_set
- [Yaf_Session::start](#yaf-session.start) — El propósito de start
- [Yaf_Session::\_\_unset](#yaf-session.unset) — El propósito de \_\_unset
- [Yaf_Session::valid](#yaf-session.valid) — El propósito de valid
  </li>- [Yaf_Exception](#class.yaf-exception) — La clase Yaf_Exception<li>[Yaf_Exception::__construct](#yaf-exception.construct) — El propósito de __construct
- [Yaf_Exception::getPrevious](#yaf-exception.getprevious) — El propósito de getPrevious
  </li>- [Yaf_Exception_TypeError](#class.yaf-exception-typeerror) — La clase Yaf_Exception_TypeError
- [Yaf_Exception_StartupError](#class.yaf-exception-startuperror) — La clase Yaf_Exception_StartupError
- [Yaf_Exception_DispatchFailed](#class.yaf-exception-dispatchfailed) — La clase Yaf_Exception_DispatchFailed
- [Yaf_Exception_RouterFailed](#class.yaf-exception-routerfailed) — La clase Yaf_Exception_RouterFailed
- [Yaf_Exception_LoadFailed](#class.yaf-exception-loadfailed) — La clase Yaf_Exception_LoadFailed
- [Yaf_Exception_LoadFailed_Module](#class.yaf-exception-loadfailed-module) — La clase Yaf_Exception_LoadFailed_Module
- [Yaf_Exception_LoadFailed_Controller](#class.yaf-exception-loadfailed-controller) — La clase Yaf_Exception_LoadFailed_Controller
- [Yaf_Exception_LoadFailed_Action](#class.yaf-exception-loadfailed-action) — La clase Yaf_Exception_LoadFailed_Action
- [Yaf_Exception_LoadFailed_View](#class.yaf-exception-loadfailed-view) — La clase Yaf_Exception_LoadFailed_View
