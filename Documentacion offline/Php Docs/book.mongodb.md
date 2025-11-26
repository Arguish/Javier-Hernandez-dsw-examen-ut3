# La extensión MongoDB

    Esta extensión se desarrolla sobre las bibliotecas
    [» libmongoc](https://github.com/mongodb/mongo-c-driver) y
    [» libbson](https://github.com/mongodb/mongo-c-driver/tree/master/src/libbson).
    Proporciona una API mínima para las funcionalidades básicas del controlador:
    [comandos](#class.mongodb-driver-command),
    [consultas](#class.mongodb-driver-query),
    [escrituras](#class.mongodb-driver-bulkwrite),
    [gestión de conexión](#class.mongodb-driver-manager),
    y [serialización BSON](#mongodb.bson).




    Las bibliotecas PHP del lado del usuario que dependen de esta extensión
    pueden proporcionar API de nivel más alto, tales como constructores
    de consultas, métodos de ayuda para comandos individuales, y GridFS. Los desarrolladores de aplicaciones deberían considerar utilizar
    esta extensión en conjunción con la
    [» biblioteca MongoDB PHP](https://github.com/mongodb/mongo-php-library),
    que implementa las mismas API de nivel más alto que se encuentran en los
    controladores MongoDB para otros lenguajes. Esta separación de preocupaciones
    permite a la extensión concentrarse en las funcionalidades esenciales
    para las cuales una implementación de extensión es primordial para el rendimiento.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#mongodb.requirements)
- [Instalación](#mongodb.installation)
- [Configuración en tiempo de ejecución](#mongodb.configuration)

    ## Requerimientos

    Desde la versión 1.16.0, la extensión requiere PHP 7.2 o superior. Las
    versiones anteriores de la extensión permiten la compatibilidad con las antiguas versiones de PHP.

    La extensión requiere
    [» libbson](https://github.com/mongodb/mongo-c-driver/tree/master/src/libbson) y
    [» libmongoc](https://github.com/mongodb/mongo-c-driver), y utilizará
    las versiones incluidas por omisión. Las bibliotecas del sistema pueden también
    ser utilizadas, como se discute en la documentación
    [de instalación manual](#mongodb.installation.manual).

    La extensión, a través de libmongoc, depende opcionalmente de una biblioteca TLS
    (por ejemplo OpenSSL) y la utilizará si está disponible. Si el proceso
    de construcción no logra encontrar una biblioteca TLS, los usuarios deben verificar que el paquete de desarrollo apropiado
    (por ejemplo libssl-dev) y
    [» pkg-config](https://en.wikipedia.org/wiki/Pkg-config) están
    ambos instalados. El proceso de detección y configuración de las
    bibliotecas TLS se discute con más detalle en la documentación
    [de instalación manual](#mongodb.installation.manual).

    [» Cyrus SASL](http://cyrusimap.org/) es una dependencia opcional
    para soportar la autenticación Kerberos y será utilizada si está disponible.

    **Nota**:

    Debido a problemas potenciales de representación de enteros de 64 bits en plataformas de 32 bits, se recomienda a los usuarios utilizar entornos de 64 bits. Al utilizar una plataforma de 32 bits, tenga en cuenta que cualquier entero de 64 bits leído desde la base de datos será devuelto como una instancia [MongoDB\BSON\Int64](#class.mongodb-bson-int64) en lugar de un tipo entero PHP.

## Instalación

## Instalar la extensión de MongoDB PHP con PECL

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/mongodb](https://pecl.php.net/package/mongodb)

Los usuarios de Linux, Unix y macOS pueden ejecutar el siguiente comando para
instalar la extensión:

$ sudo pecl install mongodb

En sistemas con múltiples versiones de PHP instaladas (por ejemplo, macOS por omisión,
Homebrew, [» XAMPP](https://www.apachefriends.org/)), cada versión de PHP
tendrá su propio comando [pecl](#install.pecl)
y fichero php.ini. Además, cada entorno PHP (por ejemplo
CLI, web) puede utilizar ficheros php.ini separados.

Desde la versión 1.17.0 de la extensión, PECL solicitará diversas opciones de
configuraciones. Para instalar la extensión con las opciones por omisión
en un script no interactivo, una entrada vacía puede ser enviada a
pecl install utilizando el comando yes :

$ yes '' | sudo pecl install mongodb

Una lista completa de las opciones configure soportadas puede ser
encontrada en el fichero package.xml incluido en el paquete PECL.
Para instalar la extensión con opciones de configuraciones específicas
en un script no interactivo, la opción
--configureoptions para
pecl install puede ser utilizada :

$ sudo pecl install --configureoptions='with-mongodb-system-libs="yes" enable-mongodb-developer-flags="no"' mongodb

Por omisión la instalación de la extensión via PECL utilizará las versiones incluidas de
[» libbson](https://github.com/mongodb/mongo-c-driver/tree/master/src/libbson),
[» libmongoc](https://github.com/mongodb/mongo-c-driver), y
[» libmongocrypt](https://github.com/mongodb/libmongocrypt) y tratará automáticamente
de configurarlas.

**Nota**:

    Si el proceso de construcción falla al encontrar una biblioteca SSL, verifique que los
    paquetes de desarrollo (por ejemplo libssl-dev) y
    [» pkg-config](https://en.wikipedia.org/wiki/Pkg-config) están ambos
    instalados. Si esto no resuelve el problema, considere utilizar el
    proceso
    [de instalación manual](#mongodb.installation.manual).

Para finalizar, añada la siguiente línea al fichero php.ini para cada entorno
que necesitará utilizar la extensión:

extension=mongodb.so

## Instalar la extensión de MongoDB PHP en macOS con Homebrew

[» Homebrew 1.5.0](https://brew.sh/2018/01/19/homebrew-1.5.0/)
ha deprecado el [» tap Homebrew/php](https://github.com/Homebrew/brew)
y ha eliminado las fórmulas para las extensiones PHP individuales. En el futuro, los usuarios
de macOS están invitados a instalar la fórmula
[» php](https://formulae.brew.sh/formula/php) y a seguir las instrucciones
[de instalación estándar de PECL](#mongodb.installation.pecl)
utilizando el comando [pecl](#install.pecl)
proporcionado por la instalación PHP Homebrew.

De lo contrario, el
[» tap shivammathur/extensions](https://github.com/shivammathur/homebrew-extensions)
proporciona fórmulas para las extensiones PHP individuales. Por ejemplo, para instalar
la extensión para PHP 8.4, ejecute:

$ brew install shivammathur/extensions/mongodb@8.4

Es de notar que solo la última versión de la extensión está disponible en brew.

**Nota**:
**Instalar las dependencias requeridas**

    Para garantizar que el soporte SSL puede ser configurado correctamente, asegúrese de que las
    fórmulas openssl y pkgconf están
    instaladas. Si alguno de estos paquetes falta, la extensión será compilada
    con Secure Transport, lo que puede causar problemas de compatibilidad.

## Instalar la extensión de MongoDB PHP en Windows

Los binarios precompilados están adjuntos a las
[» versiones Github](https://github.com/mongodb/mongo-php-driver/releases/)
del proyecto. Los archivos son publicados para diversas combinaciones de versión PHP,
seguridad de hilos (TS o NTS) y arquitectura (x86 o x64). Determine
el archivo correcto para el entorno PHP y extraiga el fichero
php_mongodb.dll en el directorio de extensión ("ext" por omisión).

Añada la siguiente línea al fichero php.ini para cada entorno que necesitará
utilizar la extensión:

extension=php_mongodb.dll

La falla en la selección del binario correcto resultará en un error al intentar
cargar la extensión DLL en la ejecución:

PHP Warning: PHP Startup: Unable to load dynamic library 'mongodb'

Asegúrese de que la DLL descargada coincida con las siguientes propiedades de ejecución PHP:

    - Versión de PHP(**[PHP_VERSION](#constant.php-version)**)

    - Seguridad de hilos (**[PHP_ZTS](#constant.php-zts)**)

    - Arquitectura (**[PHP_INT_SIZE](#constant.php-int-size)**)

Además de las constantes mencionadas anteriormente, estas propiedades también pueden ser
deducidas de [phpinfo()](#function.phpinfo). Si un sistema tiene múltiples ejecuciones PHP
instaladas, verifique que la salida de [phpinfo()](#function.phpinfo) es para
el entorno correcto.

**Nota**:
**Dependencias adicionales DLL para los usuarios de Windows**

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
libsasl.dll

## Instalación manual de la extensión de MongoDB PHP

Para los desarrolladores y usuarios interesados en las últimas correcciones de errores,
la extensión puede ser compilada a partir del último código fuente en
[» Github](https://github.com/mongodb/mongo-php-driver). Ejecute los siguientes comandos
para clonar y construir el proyecto:

$ git clone https://github.com/mongodb/mongo-php-driver.git
$ cd mongo-php-driver
$ git submodule update --init
$ phpize
$ ./configure
$ make all
$ sudo make install

En sistemas con múltiples versiones de PHP instaladas (por ejemplo, macOS por omisión,
Homebrew, [» XAMPP](https://www.apachefriends.org/)), cada versión de PHP
tendrá su propio comando [phpize](#install.pecl.phpize)
y fichero php.ini. Además, cada entorno PHP (por ejemplo
CLI, web) puede utilizar ficheros php.ini separados.

Por omisión, la extensión utilizará las versiones incluidas de
[» libbson](https://github.com/mongodb/mongo-c-driver/tree/master/src/libbson),
[» libmongoc](https://github.com/mongodb/mongo-c-driver), y
[» libmongocrypt](https://github.com/mongodb/libmongocrypt) y
tratará de configurarlas automáticamente. Si estas bibliotecas ya están
instaladas como bibliotecas del sistema, la extensión puede utilizarlas especificando
--with-mongodb-system-libs=yes como opción a
configure.

Para una lista completa de las opciones configure, ejecute
**configure --help**.

Cuando se utilizan las versiones agrupadas de libmongoc y libmongocrypt,
la extensión también tratará de seleccionar una biblioteca SSL según la opción de
configuración --with-mongodb-ssl.
A partir de la versión 1.17.0 de la extensión, OpenSSL es siempre preferido por omisión.
Anteriormente, Secure Transport era el valor por omisión en macOS y OpenSSL era el valor por omisión
en todas las otras plataformas.

**Nota**:

    Si el proceso de construcción falla al encontrar una biblioteca SSL, verifique que los
    paquetes de desarrollo (por ejemplo libssl-dev) y
    [» pkg-config](https://en.wikipedia.org/wiki/Pkg-config) están ambos
    instalados.





    Cuando se utiliza Homebrew en macOS, es común que un sistema tenga
    múltiples versiones de OpenSSL instaladas. Para garantizar que la versión de OpenSSL
    deseada es seleccionada, la variable de entorno PKG_CONFIG_PATH
    puede ser utilizada para controlar la ruta de búsqueda de pkg-config.

El último paso de construcción, **make install**, indicará dónde
mongodb.so ha sido instalado, similar a:

Installing shared extensions: /usr/lib/php/extensions/debug-non-zts-20220829/

Asegúrese de que la opción [extension_dir](#ini.extension-dir)
en php.ini apunte al directorio donde mongodb.so
ha sido instalado. La opción puede ser consultada ejecutando:

$ php -i | grep extension_dir
extension_dir =&gt; /usr/lib/php/extensions/debug-non-zts-20220829 =&gt;
/usr/lib/php/extensions/debug-non-zts-20220829

Si los directorios difieren, modifique
[extension_dir](#ini.extension-dir) en php.ini o
mueva manualmente mongodb.so al directorio correcto.

Para finalizar, añada la siguiente línea al fichero php.ini para cada entorno
que necesitará utilizar la extensión:

extension=mongodb.so

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de mongodb**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [mongodb.debug](#ini.mongodb.debug)
      ""
      **[INI_ALL](#constant.ini-all)**
       


Aquí hay una aclaración sobre
el uso de las directivas de configuración.

      mongodb.debug
      [string](#language.types.string)



       Esta opción puede ser utilizada para activar o desactivar el registro de depuración de nivel trace
       en la extensión (y libmongoc).




       Especifique una cadena vacía, "0",
       "off", "no", o
       "false" para desactivar el registro.




       Especifique "stderr" o "stdout" para registrar
       en stderr o stdout, respectivamente.




       Especifique "1", "on",
       "yes", o "true" para registrar en un nuevo
       fichero temporal en el directorio temporal del sistema por omisión (es decir,
       [sys_get_temp_dir()](#function.sys-get-temp-dir)).




       Especifique otra cadena para registrar en un nuevo fichero temporal en ese
       directorio. Si el directorio no puede ser utilizado, el directorio temporal del sistema por omisión
       será utilizado en su lugar.



      **Nota**:



        Tenga en cuenta que el registro de depuración puede contener información sensible,
        como las credenciales del servidor MongoDB y los documentos completos
        escritos o leídos desde el servidor. Verifique cualquier registro de depuración antes de compartirlo
        con otras personas.






# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[MONGODB_VERSION](#constant.mongodb-version)**
     ([string](#language.types.string))



      Número de versión estilo x.y.z de la extensión





     **[MONGODB_STABILITY](#constant.mongodb-stability)**
     ([string](#language.types.string))



      Estabilidad actual (alpha/beta/stable)


# Tutoriales

## Tabla de contenidos

- [Utilizar la biblioteca PHP para MongoDB (PHPLIB)](#mongodb.tutorial.library)
- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

    En esta sección se encuentran varios tutoriales sobre cómo utilizar el controlador
    de MongoDB para PHP.

## Utilizar la biblioteca PHP para MongoDB (PHPLIB)

Después de la configuración inicial de la extensión, se continuará explicando cómo comenzar
con la biblioteca de usuario correspondiente para escribir nuestro primer proyecto.

## Instalar la biblioteca PHP con Composer

La última cosa que se debe instalar para comenzar la aplicación
en sí es la biblioteca PHP.

La biblioteca debe ser instalada con
[» Composer](https://getcomposer.org/), un gestor de
paquetes para PHP. Las instrucciones para instalar Composer en diferentes
plataformas pueden encontrarse en su sitio web.

    Instalar la biblioteca ejecutando:

$ composer require mongodb/mongodb

    Esto producirá una salida similar a:

./composer.json has been created
Loading composer repositories with package information
Updating dependencies (including require-dev)

- Installing mongodb/mongodb (1.0.0)
  Downloading: 100%

Writing lock file
Generating autoload files

    Composer creará varios ficheros: composer.json,
    composer.lock, y un directorio vendor que
    contendrá la biblioteca y todas las otras dependencias que su proyecto podría necesitar.

## Utilizar la biblioteca PHP

    Además de gestionar sus dependencias, Composer también le proporcionará un
    autocargador (para las clases de estas dependencias). Asegúrese de que esté incluido al inicio de su script o en el código de arranque de
    su aplicación:

&lt;?php
// Esta ruta debe apuntar al autocargador de Composer
require 'vendor/autoload.php';

    Con esto hecho, ahora puede utilizar cualquier
    funcionalidad como se describe en la
    [» documentación de la biblioteca](https://www.mongodb.com/docs/php-library/current/).





    Si ha utilizado controladores MongoDB en otros lenguajes, la API de la
    biblioteca debería resultarle familiar. Contiene una clase
    [» Client](https://www.mongodb.com/docs/php-library/master/reference/class/MongoDBClient/)
    para conectarse a MongoDB, una clase
    [» Database](https://www.mongodb.com/docs/php-library/master/reference/class/MongoDBDatabase/)
    para las operaciones a nivel de la base de datos (por ejemplo, los comandos, la gestión de las colecciones),
    y una clase
    [» Collection](https://www.mongodb.com/docs/php-library/master/reference/class/MongoDBCollection)
    para las operaciones a nivel de la colección (por ejemplo, los métodos
    [» CRUD](https://en.wikipedia.org/wiki/Create,_read,_update_and_delete), la gestión de los índices).





    Como ejemplo, aquí se muestra cómo insertar un documento en la colección
    *beers* de la base de datos *demo*:

&lt;?php
require 'vendor/autoload.php'; // incluir el autocargador de Composer

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client-&gt;demo-&gt;beers;

$result = $collection-&gt;insertOne( [ 'name' =&gt; 'Hinterland', 'brewery' =&gt; 'BrewDog' ] );

echo "Inserted with Object ID '{$result-&gt;getInsertedId()}'";
?&gt;

    Dado que el documento insertado no contenía un campo _id, la extensión
    generará un [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) para que el servidor
    lo utilice como _id. Este valor también está disponible para
    el llamador a través del objeto de resultado devuelto por el método insertOne.





    Después de la inserción, se pueden consultar los datos que acaba de insertar. Para ello, se utiliza el método find, que devuelve un cursor
    iterable:

&lt;?php
require 'vendor/autoload.php'; // incluir el autocargador de Composer

$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client-&gt;demo-&gt;beers;

$result = $collection-&gt;find( [ 'name' =&gt; 'Hinterland', 'brewery' =&gt; 'BrewDog' ] );

foreach ($result as $entry) {
echo $entry['_id'], ': ', $entry['name'], "\n";
}
?&gt;

    Aunque los ejemplos no lo muestran, los documentos BSON y los arrays
    son deserializados como clases especiales en la biblioteca por defecto. Estas clases extienden [ArrayObject](#class.arrayobject) para facilidad de uso
    e implementan las interfaces [MongoDB\BSON\Serializable](#class.mongodb-bson-serializable)
    y [MongoDB\BSON\Unserializable](#class.mongodb-bson-unserializable) de la extensión para garantizar que los valores conserven su tipo cuando se serializan nuevamente en BSON. Esto evita un inconveniente de la antigua extensión mongo
    donde los arrays podrían convertirse en documentos, y viceversa. Ver la
    especificación [Persistir datos](#mongodb.persistence) para más información sobre
    cómo se convierten los valores entre PHP y BSON.

## Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)

La extensión contiene una API de observaciones de eventos, que permite a las aplicaciones
monitorear las órdenes y las actividades internas relacionadas con la
[» Especificación de descubrimiento y monitoreo del servidor](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md).
Este tutorial demostrará el monitoreo de las órdenes utilizando la interfaz
[MongoDB\Driver\Monitoring\CommandSubscriber](#class.mongodb-driver-monitoring-commandsubscriber).

La interfaz
[MongoDB\Driver\Monitoring\CommandSubscriber](#class.mongodb-driver-monitoring-commandsubscriber)
define tres métodos: commandStarted,
commandSucceeded, y commandFailed.
Cada uno de estos tres métodos acepta un solo argumento event
de una clase específica para el evento respectivo. Por ejemplo, el argumento
$event de commandSucceeded
es un objeto [MongoDB\Driver\Monitoring\CommandSucceededEvent](#class.mongodb-driver-monitoring-commandsucceededevent).

En este tutorial, se implementará un observador que crea una lista de todos
los perfiles de solicitud y el tiempo promedio que han tomado.

## Estructura de las clases de observaciones

Se comienza con el marco del observador:

&lt;?php

class QueryTimeCollector implements \MongoDB\Driver\Monitoring\CommandSubscriber
{
public function commandStarted( \MongoDB\Driver\Monitoring\CommandStartedEvent $event ): void
{
}

    public function commandSucceeded( \MongoDB\Driver\Monitoring\CommandSucceededEvent $event ): void
    {
    }

    public function commandFailed( \MongoDB\Driver\Monitoring\CommandFailedEvent $event ): void
    {
    }

}

?&gt;

## Registro del observador

Una vez que un objeto observador es instanciado, debe ser registrado con el
sistema de monitoreo de la extensión. Esto se hace llamando a
[MongoDB\Driver\Monitoring\addSubscriber()](#function.mongodb.driver.monitoring.addsubscriber) o
[MongoDB\Driver\Manager::addSubscriber()](#mongodb-driver-manager.addsubscriber) para registrar
el observador globalmente o con un Manager específico, respectivamente.

&lt;?php

\MongoDB\Driver\Monitoring\addSubscriber( new QueryTimeCollector() );

?&gt;

## Implementar la lógica

Con el objeto registrado, la única cosa que queda es implementar la lógica
en la clase observadora. Para correlacionar los dos eventos que componen una
orden ejecutada con éxito (commandStarted y commandSucceeded), cada
objeto de evento expone un campo requestId.

Para registrar el tiempo promedio por forma de solicitud, se comenzará verificando
una orden find en el evento commandStarted. Luego, se añadirá un elemento a la propiedad pendingCommands indexado por su
requestId y con su valor representando la forma de solicitud.

Si se recibe un evento commandSucceeded correspondiente con el mismo
requestId, se añade la duración del evento (desde
durationMicros) al tiempo total e incrementa el
contador de operaciones.

Si se encuentra un evento commandFailed correspondiente, simplemente se elimina
la entrada de la propiedad pendingCommands.

&lt;?php

class QueryTimeCollector implements \MongoDB\Driver\Monitoring\CommandSubscriber
{
private $pendingCommands = [];
private $queryShapeStats = [];

    /* Crear una forma de solicitud a partir del argumento de filtro. Por ahora, solo se consideran
     * los campos de primer nivel */
    private function createQueryShape( array $filter )
    {
        return json_encode( array_keys( $filter ) );
    }

    public function commandStarted( \MongoDB\Driver\Monitoring\CommandStartedEvent $event ): void
    {
        if ( 'find' === $event-&gt;getCommandName() )
        {
            $queryShape = $this-&gt;createQueryShape( (array) $event-&gt;getCommand()-&gt;filter );
            $this-&gt;pendingCommands[$event-&gt;getRequestId()] = $queryShape;
        }
    }

    public function commandSucceeded( \MongoDB\Driver\Monitoring\CommandSucceededEvent $event ): void
    {
        $requestId = $event-&gt;getRequestId();
        if ( array_key_exists( $requestId, $this-&gt;pendingCommands ) )
        {
            $this-&gt;queryShapeStats[$this-&gt;pendingCommands[$requestId]]['count']++;
            $this-&gt;queryShapeStats[$this-&gt;pendingCommands[$requestId]]['duration'] += $event-&gt;getDurationMicros();
            unset( $this-&gt;pendingCommands[$requestId] );
        }
    }

    public function commandFailed( \MongoDB\Driver\Monitoring\CommandFailedEvent $event ): void
    {
        if ( array_key_exists( $event-&gt;getRequestId(), $this-&gt;pendingCommands ) )
        {
            unset( $this-&gt;pendingCommands[$event-&gt;getRequestId()] );
        }
    }

    public function __destruct()
    {
        foreach( $this-&gt;queryShapeStats as $shape =&gt; $stats )
        {
            echo "Shape: ", $shape, " (", $stats['count'], ")\n  ",
                $stats['duration'] / $stats['count'], "µs\n\n";
        }
    }

}

$m = new \MongoDB\Driver\Manager( 'mongodb://localhost:27016' );

/_ Añadir el observador _/
\MongoDB\Driver\Monitoring\addSubscriber( new QueryTimeCollector() );

/_ Realizar una serie de solicitudes _/
$query = new \MongoDB\Driver\Query( [
    'region_slug' =&gt; 'scotland-highlands', 'age' =&gt; [ '$gte' =&gt; 20 ]
] );
$cursor = $m-&gt;executeQuery( 'dramio.whisky', $query );

$query = new \MongoDB\Driver\Query( [
    'region_slug' =&gt; 'scotland-lowlands', 'age' =&gt; [ '$gte' =&gt; 15 ]
] );
$cursor = $m-&gt;executeQuery( 'dramio.whisky', $query );

$query = new \MongoDB\Driver\Query( [ 'region_slug' =&gt; 'scotland-lowlands' ] );
$cursor = $m-&gt;executeQuery( 'dramio.whisky', $query );

?&gt;

# Explicaciones de la arquitectura del controlador y de las funcionalidades especiales

## Tabla de contenidos

- [Arquitectura](#mongodb.overview)
- [Conexiones](#mongodb.connection-handling)
- [Persistir datos](#mongodb.persistence)

    ## Visión general de la arquitectura

    Este artículo explica cómo se integran todos los diferentes componentes del controlador PHP, desde las bibliotecas del sistema base, hasta la extensión, y las bibliotecas PHP en la parte superior.

        ![
        El diagrama de la arquitectura del controlador MongoDB PHP. El nivel más bajo del controlador son nuestras bibliotecas del sistema: libmongoc, libbson, y libmongocrypt. El nivel intermedio es la extensión PHP MongoDB. El nivel superior es el código del usuario PHP e incluye la biblioteca MongoDB PHP y paquetes de nivel superior como las integraciones de marcos de trabajo y las aplicaciones.

    ](php-bigxhtml-data/images/f3bc48edf40d5e3e09a166c7fadc7efb-driver_arch.svg)

    En la parte superior de esta pila se encuentra una
    [» biblioteca PHP](https://github.com/mongodb/mongo-php-library),
    que distribuye un
    [» paquete Composer](https://packagist.org/packages//mongodb/mongodb).
    Esta biblioteca proporciona una API coherente con otros
    [» controladores](https://www.mongodb.com/docs/drivers/)
    MongoDB e implementa diversas
    [» especificaciones](https://github.com/mongodb/specifications)
    cruzadas. Aunque la extensión puede ser utilizada directamente, la biblioteca
    tiene un sobrecoste mínimo y debería ser una dependencia común para la mayoría
    de las aplicaciones construidas con MongoDB.

    Debajo de esta biblioteca se encuentra una extensión PHP, que se distribuye a través de
    [» PECL](https://pecl.php.net/package/mongodb).
    La extensión forma la cola entre PHP y nuestras bibliotecas del sistema
    ([» libmongoc](https://github.com/mongodb/mongo-c-driver),
    [» libbson](https://github.com/mongodb/mongo-c-driver/tree/master/src/libbson), y
    [» libmongocrypt](https://github.com/mongodb/libmongocrypt)).
    Su API pública proporciona únicamente las funcionalidades más esenciales:
    - Gestión de conexiones

    - Codificación y decodificación BSON

    - Serialización y deserialización de documentos (soporte de bibliotecas ODM)

    - Ejecución de comandos, consultas y operaciones de escritura

    - Gestión de cursores para los resultados de comandos y consultas

       <caption>**Código fuente del controlador y proyectos JIRA**</caption>
       
        
         
          Proyecto
          GitHub
          JIRA


          Bibliotecas PHP
          [» mongodb/mongo-php-library](https://github.com/mongodb/mongo-php-library)
          [» PHPLIB](https://jira.mongodb.org/browse/PHPLIB)



          Extensiones PHP
          [» mongodb/mongo-php-driver](https://github.com/mongodb/mongo-php-driver)
          [» PHPC](https://jira.mongodb.org/browse/PHPC)


    ## Gestión de la conexión y de la persistencia

    **Nota**:

En las plataformas Unix, la extensión MongoDB es sensible a los scripts que utilizan
la llamada al sistema fork() sin llamar a exec(). No se deben reutilizar
instancias [MongoDB\Driver\Manager](#class.mongodb-driver-manager) en un proceso
hijo derivado de un fork.

## Conexiones y topología persistente (versión PHP desde 1.2.0)

    Todas las versiones de la extensión desde 1.2.0 conservan el objeto cliente
    [» libmongoc](https://github.com/mongodb/mongo-c-driver) en el proceso
    PHP, lo que le permite reutilizar las conexiones de base de datos, los
    estados de autenticación, *y* la información de
    topología a través de múltiples consultas.





    Cuando [MongoDB\Driver\Manager::__construct()](#mongodb-driver-manager.construct) es
    invocado, se crea un hash a partir de sus argumentos (es decir, la
    cadena URI y el array de opciones). La extensión intentará encontrar un objeto
    cliente [» libmongoc](https://github.com/mongodb/mongo-c-driver) persistido
    previamente para este hash. Si no se puede encontrar un cliente existente para el hash, se creará un nuevo cliente y se persistirá para su uso futuro. Este comportamiento puede ser desactivado a través de la opción del controlador
    "disableClientPersistence".





    Cada cliente contiene sus propias conexiones de base de datos y una vista
    de la topología del servidor (por ejemplo, autónomo, conjunto de réplicas,
    grupo de fragmentos). Al persistir el cliente entre las consultas PHP,
    la extensión es capaz de reutilizar las conexiones de base de datos
    establecidas y eliminar la necesidad de
    [» descubrir la topología del servidor](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md)
    en cada consulta.





    Considere el siguiente ejemplo:

&lt;?php

$managers = [
new MongoDB\Driver\Manager('mongodb://127.0.0.1'),
new MongoDB\Driver\Manager('mongodb://127.0.0.1'),
new MongoDB\Driver\Manager('mongodb://127.0.0.1:27017'),
new MongoDB\Driver\Manager('mongodb://rs1.example.com,rs2.example.com/', ['replicaSet' =&gt; 'myReplicaSet']),
];

foreach ($managers as $manager) {
$manager-&gt;executeCommand('test', new MongoDB\Driver\Command(['ping' =&gt; 1]));
}

?&gt;

    Los dos primeros objetos **Manager** compartirán el mismo
    cliente [» libmongoc](https://github.com/mongodb/mongo-c-driver) ya que sus
    argumentos de constructor son idénticos. Los tercer y cuarto objetos
    utilizarán cada uno su propio cliente. En total, se crearán tres clientes y el proceso PHP ejecutando este script abrirá dos conexiones a
    127.0.0.1 y una conexión a cada uno de
    rs1.example.com y rs2.example.com.
    Si la extensión descubre miembros adicionales del conjunto de réplicas
    después de emitir comandos hello, abrirá conexiones adicionales a estos servidores también.





    Si las mismas conexiones son reutilizadas por el mismo proceso PHP, los tres
    clientes serán reutilizados y no se establecerá ninguna nueva conexión. En
    función del tiempo transcurrido desde la última consulta servida, la extensión
    puede necesitar emitir comandos hello adicionales para actualizar su vista de las topologías.

## Persistencia de sockets (versiones PHP antes de 1.2.0)

    Las versiones de la extensión antes de 1.2.0 utilizan la API de flujos PHP para
    las conexiones de base de datos, utilizando una API en
    [» libmongoc](https://github.com/mongodb/mongo-c-driver) para designar gestores personalizados para la comunicación por socket; sin embargo, se crea un nuevo cliente libmongoc para cada
    [MongoDB\Driver\Manager](#class.mongodb-driver-manager). En consecuencia, la extensión persiste las conexiones de base de datos individuales pero no el estado
    de autentificación o la información de topología. Esto significa que
    la extensión debe emitir comandos al inicio de cada consulta para
    autenticarse y
    [» descubrir la topología del servidor](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md).





    Las conexiones de base de datos son persistidas por un hash derivado del
    host del servidor, del puerto y de la cadena URI utilizada para construir el
    [MongoDB\Driver\Manager](#class.mongodb-driver-manager). Las opciones del array del
    constructor no están incluidas en este hash.

**Nota**:

     Las versiones de la extensión &gt;= 1.1.8 y &lt; 1.2.0 no persisten los
     sockets para las conexiones SSL. Ver
     [» PHPC-720](https://jira.mongodb.org/browse/PHPC-720) para más
     información.






    A pesar de sus carencias con las conexiones SSL persistentes y la información
    de topología, esta versión de la extensión soporta todas las
    [» opciones de contexto SSL](context.ssl) ya que utiliza la API de flujos PHP.

## Serialización y deserialización de variables PHP en MongoDB

Este documento explica cómo se convierten las estructuras compuestas (es decir, los
documentos, los arrays y los objetos) entre los valores BSON y PHP.

## Serialización en BSON

    ## Arrays



     Si un array es un *array compacto* — es decir, un
     array vacío o las claves comienzan en 0 y son secuenciales sin huecos :
     *array BSON*.





     Si el array no es compacto — es decir, que tiene claves
     asociativas (cadenas), que las claves no comienzan en 0, o que hay
     huecos : *objeto BSON*.





     Un documento de nivel superior (raíz), *siempre*
     serializado como documento BSON.





     ## Ejemplos



      Estos ejemplos se serializan como array BSON :






[ 8, 5, 2, 3 ] =&gt; [ 8, 5, 2, 3 ]
[ 0 =&gt; 4, 1 =&gt; 9 ] =&gt; [ 4, 9 ]

      Estos ejemplos se serializan como objeto BSON :






[ 0 =&gt; 1, 2 =&gt; 8, 3 =&gt; 12 ] =&gt; { "0" : 1, "2" : 8, "3" : 12 }
[ "foo" =&gt; 42 ] =&gt; { "foo" : 42 }
[ 1 =&gt; 9, 0 =&gt; 10 ] =&gt; { "1" : 9, "0" : 10 }

      Es de notar que los cinco ejemplos son *extractos*
      de un documento completo, y solo representan un *valor*
      dentro de un documento.








    ## Objetos



      Si un objeto es de la clase [stdClass](#class.stdclass), serializar
      como *documento BSON*.





      Si un objeto es una clase soportada que implementa
      [MongoDB\BSON\Type](#class.mongodb-bson-type), entonces utilizar la lógica
      de serialización BSON para este tipo específico.
      Las instancias de [MongoDB\BSON\Type](#class.mongodb-bson-type) (a
      excepción de [MongoDB\BSON\Serializable](#class.mongodb-bson-serializable))
      solo pueden ser serializadas como valor de campo de documento. Intentar
      serializar tal objeto como documento raíz lanzará una
      [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception).





      Si un objeto es de una clase desconocida que implementa la interfaz
      [MongoDB\BSON\Type](#class.mongodb-bson-type), entonces se lanza una
      [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception).





      Si un objeto es de otra clase, sin implementar una interfaz especial,
      serializar como *documento BSON*. Mantener solo
      las propiedades *públicas*, e ignorar las propiedades
      *protegidas* y *privadas*.





      Si un objeto es de una clase que implementa
      [MongoDB\BSON\Serializable](#class.mongodb-bson-serializable), llamar
      [MongoDB\BSON\Serializable::bsonSerialize()](#mongodb-bson-serializable.bsonserialize) y
      utilizar el array o [stdClass](#class.stdclass) devuelto para
      serializar como documento BSON o array. El tipo BSON será
      determinado por las siguientes reglas :








       -

         Los documentos raíz deben ser serializados como
         documento BSON.





       -

         Los objetos [MongoDB\BSON\Persistable](#class.mongodb-bson-persistable) deben
         ser serializados como documento BSON.





       -

         Si [MongoDB\BSON\Serializable::bsonSerialize()](#mongodb-bson-serializable.bsonserialize)
         devuelve un array compacto, serializar como array BSON.





       -

         Si [MongoDB\BSON\Serializable::bsonSerialize()](#mongodb-bson-serializable.bsonserialize)
         devuelve un array no compacto o [stdClass](#class.stdclass), serializar como objeto BSON.





       -

         Si [MongoDB\BSON\Serializable::bsonSerialize()](#mongodb-bson-serializable.bsonserialize)
         no devuelve un array o [stdClass](#class.stdclass), lanzar una excepción
         [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception).









      Si un objeto es de una clase que implementa la interfaz
      [MongoDB\BSON\Persistable](#class.mongodb-bson-persistable) (lo que implica
      [MongoDB\BSON\Serializable](#class.mongodb-bson-serializable)), obtener las
      propiedades de manera similar a los párrafos anteriores, pero
      *también* añadir una propiedad
      __pclass como valor binario, con un subtipo
      0x80 y datos que llevan el nombre de la clase
      completamente calificado del objeto que se serializa.





      La propiedad __pclass se añade al array o al
      objeto devuelto por
      [MongoDB\BSON\Serializable::bsonSerialize()](#mongodb-bson-serializable.bsonserialize), lo que
      significa que sobrescribirá cualquier clave/propiedad __pclass
      en el valor de retorno de
      [MongoDB\BSON\Serializable::bsonSerialize()](#mongodb-bson-serializable.bsonserialize). Si se
      desea evitar este comportamiento y definir su propio valor
      __pclass,
      no se debe *implementar*
      [MongoDB\BSON\Persistable](#class.mongodb-bson-persistable) y se debería implementar
      [MongoDB\BSON\Serializable](#class.mongodb-bson-serializable) directamente.





      ## Ejemplos




&lt;?php

class stdClass
{
public $foo = 42;
} // =&gt; {"foo": 42}

class MyClass
{
public $foo = 42;
protected $prot = 'wine';
private $fpr = 'cheese';
} // =&gt; {"foo": 42}

class AnotherClass1 implements MongoDB\BSON\Serializable
{
public $foo = 42;
protected $prot = 'wine';
private $fpr = 'cheese';

    public function bsonSerialize(): array
    {
        return ['foo' =&gt; $this-&gt;foo, 'prot' =&gt; $this-&gt;prot];
    }

} // =&gt; {"foo": 42, "prot": "wine"}

class AnotherClass2 implements MongoDB\BSON\Serializable
{
public $foo = 42;

    public function bsonSerialize(): self
    {
        return $this;
    }

} // =&gt; MongoDB\Driver\Exception\UnexpectedValueException("bsonSerialize() did not return an array or stdClass")

class AnotherClass3 implements MongoDB\BSON\Serializable
{
private $elements = ['foo', 'bar'];

    public function bsonSerialize(): array
    {
        return $this-&gt;elements;
    }

} // =&gt; {"0": "foo", "1": "bar"}

/\*\*

- Nesting Serializable classes
  \*/

class AnotherClass4 implements MongoDB\BSON\Serializable
{
private $elements = [0 =&gt; 'foo', 2 =&gt; 'bar'];

    public function bsonSerialize(): array
    {
        return $this-&gt;elements;
    }

} // =&gt; {"0": "foo", "2": "bar"}

class ContainerClass1 implements MongoDB\BSON\Serializable
{
public $things;

    public function __construct()
    {
        $this-&gt;things = new AnotherClass4();
    }

    function bsonSerialize(): array
    {
        return ['things' =&gt; $this-&gt;things];
    }

} // =&gt; {"things": {"0": "foo", "2": "bar"}}

class AnotherClass5 implements MongoDB\BSON\Serializable
{
private $elements = [0 =&gt; 'foo', 2 =&gt; 'bar'];

    public function bsonSerialize(): array
    {
        return array_values($this-&gt;elements);
    }

} // =&gt; {"0": "foo", "1": "bar"} como clase raíz
// ["foo", "bar"] como valor anidado

class ContainerClass2 implements MongoDB\BSON\Serializable
{
public $things;

    public function __construct()
    {
        $this-&gt;things = new AnotherClass5();
    }

    public function bsonSerialize(): array
    {
        return ['things' =&gt; $this-&gt;things];
    }

} // =&gt; {"things": ["foo", "bar"]}

class AnotherClass6 implements MongoDB\BSON\Serializable
{
private $elements = ['foo', 'bar'];

    function bsonSerialize(): object
    {
        return (object) $this-&gt;elements;
    }

} // =&gt; {"0": "foo", "1": "bar"}

class ContainerClass3 implements MongoDB\BSON\Serializable
{
public $things;

    public function __construct()
    {
        $this-&gt;things = new AnotherClass6();
    }

    public function bsonSerialize(): array
    {
        return ['things' =&gt; $this-&gt;things];
    }

} // =&gt; {"things": {"0": "foo", "1": "bar"}}

class UpperClass implements MongoDB\BSON\Persistable
{
public $foo = 42;
protected $prot = 'wine';
private $fpr = 'cheese';

    private $data;

    public function bsonUnserialize(array $data): void
    {
        $this-&gt;data = $data;
    }

    public function bsonSerialize(): array
    {
        return ['foo' =&gt; $this-&gt;foo, 'prot' =&gt; $this-&gt;prot];
    }

} // =&gt; {"foo": 42, "prot": "wine", "\_\_pclass": {"$type": "80", "$binary": "VXBwZXJDbGFzcw=="}}

?&gt;

## Deserialización desde BSON

**Advertencia**

Los documentos BSON pueden contener técnicamente claves duplicadas ya que
los documentos se almacenan como una lista de pares clave-valor;
sin embargo, las aplicaciones deben abstenerse de generar
documentos con claves duplicadas ya que el comportamiento del servidor y del
controlador puede ser indefinido. Dado que los objetos y arrays de PHP no pueden
tener claves duplicadas, los datos también podrían perderse al decodificar
un documento BSON con claves duplicadas.

    La extensión mongodb deserializa los documentos BSON
    y los arrays BSON como arrays PHP. Aunque los arrays PHP son
    prácticos de usar, este comportamiento era problemático ya que diferentes
    tipos BSON podían ser deserializados en el mismo valor PHP (por ejemplo
    {"0": "foo"} y ["foo"]) y hacía
    imposible inferir el tipo BSON original. Por defecto, la extensión
    mongodb aborda esta preocupación asegurándose de que los
    arrays BSON y los documentos BSON se conviertan en arrays y objetos PHP,
    respectivamente.




    Para los tipos compuestos, existen tres tipos de datos :









      raíz


        se refiere a un documento BSON de nivel superior *solo*






      documento


        se refiere a documentos BSON anidados *solo*






      array


        se refiere a un array BSON









    Además de los tres tipos colectivos, también es posible configurar campos específicos en su documento para mapear los tipos de datos
    mencionados a continuación. Por ejemplo, el siguiente tipo de mapa le permite mapear cada documento incrustado en un array "addresses" a una clase **Address** *y* cada
    campo "city" en estos documentos de dirección incrustados a una
    clase **City**:

[
'fieldPaths' =&gt; [
'addresses.$' =&gt; 'MyProject\Address',
'addresses.$.city' =&gt; 'MyProject\City',
],
]

    Cada uno de estos tres tipos de datos, así como los mapeos específicos
    de los campos, pueden ser mapeados contra diferentes tipos PHP. Los valores de
    mapeo posibles son:









      *no definido* o [NULL](#language.types.null) (por defecto)





         -

           Un array BSON será deserializado en un [array](#language.types.array) PHP.





         -

           Un documento BSON (raíz o anidado) sin propiedad
            __pclass
            [[1]](#fnidmongodb.pclass)


           se convierte en un objeto [stdClass](#class.stdclass), con cada clave de documento
           BSON definida como una propiedad de [stdClass](#class.stdclass)
           pública.





         -

           Un documento BSON (raíz o anidado) con una propiedad
           __pclass se convierte en un objeto PHP de la clase
           nombrada por la propiedad __pclass.




           Si la clase nombrada implementa la interfaz
           [MongoDB\BSON\Persistable](#class.mongodb-bson-persistable), entonces las
           propiedades del documento BSON, incluyendo la propiedad
           __pclass, se envían como array asociativo a la función
           [MongoDB\BSON\Unserializable::bsonUnserialize()](#mongodb-bson-unserializable.bsonunserialize)
           para inicializar las propiedades del objeto.




           Si la clase nombrada no existe o no implementa la interfaz
           [MongoDB\BSON\Persistable](#class.mongodb-bson-persistable),
           [stdClass](#class.stdclass) será
           utilizado y cada clave de documento BSON (incluyendo __pclass)
           será definida como una propiedad pública de [stdClass](#class.stdclass).




           La funcionalidad __pclass se basa en el hecho
           de que la propiedad sea parte de un documento MongoDB recuperado. Si utiliza una
           [» proyección](mongodb-driver-query.construct-queryOptions)
           al buscar documentos, debe incluir el campo
           __pclass en la proyección para que esta
           funcionalidad funcione.











      "array"


        Transforma un array BSON en un [array](#language.types.array) PHP. No habrá
        tratamiento especial de una propiedad __pclass [[1]](#fnidmongodb.pclass)
        pero puede ser definida como un elemento en el array devuelto
        si estaba presente en el documento BSON.







      "object" o "stdClass"


        Transforma un array BSON o un documento BSON en un objeto
        [stdClass](#class.stdclass). No habrá tratamiento especial de una
        propiedad __pclass [[1]](#fnidmongodb.pclass)
        pero puede ser definida como una propiedad pública en el objeto
        devuelto si estaba presente en el documento BSON.







      "bson"


        Transforma un array BSON en un [MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray)
        y un documento BSON en un [MongoDB\BSON\Document](#class.mongodb-bson-document),
        independientemente de si el documento BSON tiene una propiedad
        __pclass [[1]](#fnidmongodb.pclass).



       **Nota**:

         El valor bson solo está disponible para los tres
         tipos raíz, y no en los mapeos específicos de los campos.








      todas las otras cadenas de caracteres


        Define el nombre de la clase a la que el documento BSON debe ser
        deserializado. Para los documentos BSON que incluyen propiedades
        __pclass,
        esta clase tendrá prioridad.





        Si la clase nombrada no existe o no implementa la interfaz
        [MongoDB\BSON\Unserializable](#class.mongodb-bson-unserializable),
        se lanza una excepción
        [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception).





        Si el objeto BSON tiene una propiedad __pclass y
        esta clase existe e implementa
        [MongoDB\BSON\Persistable](#class.mongodb-bson-persistable), tendrá
        prioridad sobre la clase proporcionada en el mapa de tipos.





        Las propiedades del documento BSON, *incluyendo* la propiedad
        __pclass,
        serán enviadas como array asociativo a la función
        [MongoDB\BSON\Unserializable::bsonUnserialize()](#mongodb-bson-unserializable.bsonunserialize)
        para inicializar las propiedades del objeto.









    ## TypeMaps



      Los TypeMaps pueden ser definidos a través del método
      [MongoDB\Driver\Cursor::setTypeMap()](#mongodb-driver-cursor.settypemap) en un objeto
      [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor), o el argumento
      $typeMap de
      [MongoDB\BSON\toPHP()](#function.mongodb.bson-tophp),
      [MongoDB\BSON\Document::toPHP()](#mongodb-bson-document.tophp), y
      [MongoDB\BSON\PackedArray::toPHP()](#mongodb-bson-packedarray.tophp). Cada una de las tres
      clases (*raíz*, *documento*, y
      *array*) puede ser definida individualmente, además de los
      tipos específicos de los campos.





      Si el valor en el TypeMap es [NULL](#language.types.null), esto significa lo mismo que el valor *por defecto* para este elemento.






     ## Ejemplos



      Estos ejemplos utilizan las siguientes clases:









        MyClass


          que no implementa *ninguna* interfaz






        YourClass


          que implementa
          [MongoDB\BSON\Unserializable](#class.mongodb-bson-unserializable)






        OurClass


          que implementa
          [MongoDB\BSON\Persistable](#class.mongodb-bson-persistable)






        TheirClass


          que extiende OurClass









      El método [MongoDB\BSON\Unserializable::bsonUnserialize()](#mongodb-bson-unserializable.bsonunserialize)
      de YourClass, OurClass, TheirClass itera sobre el array y define las
      propiedades sin modificaciones. También *añade* la
      propiedad $unserialized a **[true](#constant.true)**:



&lt;?php

function bsonUnserialize( array $map )
{
    foreach ( $map as $k =&gt; $value )
    {
        $this-&gt;$k = $value;
}
$this-&gt;unserialized = true;
}

/_ typemap: [] (todos los valores por defecto) _/
{ "foo": "yes", "bar" : false }
-&gt; stdClass { $foo =&gt; 'yes', $bar =&gt; false }

{ "foo": "no", "array" : [ 5, 6 ] }
-&gt; stdClass { $foo =&gt; 'no', $array =&gt; [ 5, 6 ] }

{ "foo": "no", "obj" : { "embedded" : 3.14 } }
-&gt; stdClass { $foo =&gt; 'no', $obj =&gt; stdClass { $embedded =&gt; 3.14 } }

{ "foo": "yes", "**pclass": "MyClass" }
-&gt; stdClass { $foo =&gt; 'yes', $**pclass =&gt; 'MyClass' }

{ "foo": "yes", "**pclass": { "$type" : "80", "$binary" : "MyClass" } }
-&gt; stdClass { $foo =&gt; 'yes', $**pclass =&gt; Binary(0x80, 'MyClass') }

{ "foo": "yes", "**pclass": { "$type" : "80", "$binary" : "YourClass") }
-&gt; stdClass { $foo =&gt; 'yes', $**pclass =&gt; Binary(0x80, 'YourClass') }

{ "foo": "yes", "**pclass": { "$type" : "80", "$binary" : "OurClass") }
-&gt; OurClass { $foo =&gt; 'yes', $**pclass =&gt; Binary(0x80, 'OurClass'), $unserialized =&gt; true }

{ "foo": "yes", "**pclass": { "$type" : "44", "$binary" : "YourClass") }
-&gt; stdClass { $foo =&gt; 'yes', $**pclass =&gt; Binary(0x44, 'YourClass') }

/_ typemap: [ "root" =&gt; "MissingClass" ] _/
{ "foo": "yes" }
-&gt; MongoDB\Driver\Exception\InvalidArgumentException("MissingClass does not exist")

/_ typemap: [ "root" =&gt; "MyClass" ] _/
{ "foo": "yes", "\_\_pclass" : { "$type": "80", "$binary": "MyClass" } }
-&gt; MongoDB\Driver\Exception\InvalidArgumentException("MyClass does not implement Unserializable interface")

/_ typemap: [ "root" =&gt; "MongoDB\BSON\Unserializable" ] _/
{ "foo": "yes" }
-&gt; MongoDB\Driver\Exception\InvalidArgumentException("Unserializable is not a concrete class")

/_ typemap: [ "root" =&gt; "YourClass" ] _/
{ "foo": "yes", "**pclass" : { "$type": "80", "$binary": "MongoDB\BSON\Unserializable" } }
-&gt; YourClass { $foo =&gt; "yes", $**pclass =&gt; Binary(0x80, "MongoDB\BSON\Unserializable"), $unserialized =&gt; true }

/_ typemap: [ "root" =&gt; "YourClass" ] _/
{ "foo": "yes", "**pclass" : { "$type": "80", "$binary": "MyClass" } }
-&gt; YourClass { $foo =&gt; "yes", $**pclass =&gt; Binary(0x80, "MyClass"), $unserialized =&gt; true }

/_ typemap: [ "root" =&gt; "YourClass" ] _/
{ "foo": "yes", "**pclass" : { "$type": "80", "$binary": "OurClass" } }
-&gt; OurClass { $foo =&gt; "yes", $**pclass =&gt; Binary(0x80, "OurClass"), $unserialized =&gt; true }

/_ typemap: [ "root" =&gt; "YourClass" ] _/
{ "foo": "yes", "**pclass" : { "$type": "80", "$binary": "TheirClass" } }
-&gt; TheirClass { $foo =&gt; "yes", $**pclass =&gt; Binary(0x80, "TheirClass"), $unserialized =&gt; true }

/_ typemap: [ "root" =&gt; "OurClass" ] _/
{ foo: "yes", "**pclass" : { "$type": "80", "$binary": "TheirClass" } }
-&gt; TheirClass { $foo =&gt; "yes", $**pclass =&gt; Binary(0x80, "TheirClass"), $unserialized =&gt; true }

/_ typemap: [ 'root' =&gt; 'YourClass' ] _/
{ foo: "yes", "**pclass" : { "$type": "80", "$binary": "YourClass" } }
-&gt; YourClass { $foo =&gt; 'yes', $**pclass =&gt; Binary(0x80, 'YourClass'), $unserialized =&gt; true }

/_ typemap: [ 'root' =&gt; 'array', 'document' =&gt; 'array' ] _/
{ "foo": "yes", "bar" : false }
-&gt; [ "foo" =&gt; "yes", "bar" =&gt; false ]

{ "foo": "no", "array" : [ 5, 6 ] }
-&gt; [ "foo" =&gt; "no", "array" =&gt; [ 5, 6 ] ]

{ "foo": "no", "obj" : { "embedded" : 3.14 } }
-&gt; [ "foo" =&gt; "no", "obj" =&gt; [ "embedded =&gt; 3.14 ] ]

{ "foo": "yes", "**pclass": "MyClass" }
-&gt; [ "foo" =&gt; "yes", "**pclass" =&gt; "MyClass" ]

{ "foo": "yes", "**pclass" : { "$type": "80", "$binary": "MyClass" } }
-&gt; [ "foo" =&gt; "yes", "**pclass" =&gt; Binary(0x80, "MyClass") ]

{ "foo": "yes", "**pclass" : { "$type": "80", "$binary": "OurClass" } }
-&gt; [ "foo" =&gt; "yes", "**pclass" =&gt; Binary(0x80, "OurClass") ]

/_ typemap: [ 'root' =&gt; 'object', 'document' =&gt; 'object' ] _/
{ "foo": "yes", "**pclass": { "$type": "80", "$binary": "MyClass" } }
-&gt; stdClass { $foo =&gt; "yes", "**pclass" =&gt; Binary(0x80, "MyClass") }

# Seguridad

## Tabla de contenidos

- [Ataques por inyección de consultas](#mongodb.security.request_injection)
- [Ataque por inyección de scripts](#mongodb.security.script_injection)

    ## Ataques por inyección de consultas

    Si se pasan parámetros $\_GET (o $\_POST)
    a las consultas, asegúrese de convertirlos en strings antes.
    Los usuarios pueden insertar arrays asociativos en las consultas
    GET y POST, que podrían convertirse en consultas $ no deseadas.

    Un ejemplo bastante inofensivo: supongamos que se buscan las informaciones de un
    usuario con la consulta *http://www.example.com?username=bob*.
    La aplicación crea la consulta
    $q = new \MongoDB\Driver\Query( [ 'username' =&gt; $\_GET['username'] ]).

    Esto funciona bien, pero alguien podría subvertirlo pasando
    *http://www.example.com?username[$ne]=foo*, que PHP
    transformará mágicamente en un array asociativo, transformando la consulta en
    $q = new \MongoDB\Driver\Query( [ 'username' =&gt; [ '$ne' =&gt; 'foo' ] ] ),
    que devolverá todos los usuarios cuyo nombre no es "foo" (todos los usuarios, probablemente).

    Este es un ataque bastante fácil de contrarrestar: asegúrese de que los parámetros
    $\_GET y $\_POST sean del tipo esperado
    antes de enviarlos a la base de datos. PHP dispone de la función
    [filter_var()](#function.filter-var) para ayudar.

    Tenga en cuenta que este tipo de ataque puede ser utilizado con cualquier interacción
    con la base de datos que localice un documento, incluyendo actualizaciones,
    upserts, eliminaciones y comandos findAndModify.

    Ver [» la documentación principal](https://www.mongodb.com/docs/manual/security/)
    para más información sobre los problemas de tipo inyección SQL con MongoDB.

    ## Ataque por inyección de scripts

    Si se utiliza JavaScript, asegúrese de que todas las variables que
    atraviesan la frontera PHP-JavaScript se pasen en el campo
    scope de [MongoDB\BSON\Javascript](#class.mongodb-bson-javascript),
    y no se interpolen en la string JavaScript. Esto puede ocurrir cuando
    se utilizan cláusulas $where en las consultas, los
    comandos mapReduce y group, y en cualquier otro momento en que se pueda pasar
    JavaScript a la base de datos.

    Por ejemplo, supongamos que tenemos un JavaScript para saludar a un usuario
    en los logs de la base de datos. Podríamos hacer:

&lt;?php
$m = new MongoDB\Driver\Manager;

// No haga esto !!!
$username = $\_GET['field'];

$cmd = new \MongoDB\Driver\Command( [
'eval' =&gt; "print('Hello, $username!');"
] );

$r = $m-&gt;executeCommand( 'dramio', $cmd );
?&gt;

Sin embargo, ¿qué pasa si un usuario malintencionado pasa JavaScript?

&lt;?php
$m = new MongoDB\Driver\Manager;

// No haga esto !!!
$username = $\_GET['field'];
// $username equivale a "'); db.users.drop(); print('"

$cmd = new \MongoDB\Driver\Command( [
'eval' =&gt; "print('Hello, $username!');"
] );

$r = $m-&gt;executeCommand( 'dramio', $cmd );
?&gt;

Ahora MongoDB ejecuta la string JavaScript
"print('Hello, '); db.users.drop(); print('!');".
Este ataque es fácil de evitar: utilice args para pasar
variables de PHP a JavaScript:

&lt;?php
$m = new MongoDB\Driver\Manager;

$_GET['field'] = 'derick';
$args = [ $\_GET['field'] ];

$cmd = new \MongoDB\Driver\Command( [
'eval' =&gt; "function greet(username) { print('Hello, ' + username + '!'); }",
'args' =&gt; $args,
] );

$r = $m-&gt;executeCommand( 'dramio', $cmd );
?&gt;

Esto añade un argumento al ámbito JavaScript, que se utiliza como argumento
para la función greet. Ahora si
alguien intenta enviar código malintencionado, MongoDB imprimirá inofensivamente
Hello, '); db.dropDatabase(); print('!.

Utilizar argumentos ayuda a prevenir la ejecución de entradas malintencionadas por
la base de datos. Sin embargo, se debe asegurar de que el código no
devuelva ni ejecute la entrada de ninguna manera. Es preferible evitar ejecutar
_cualquier_ JavaScript en el servidor en primer lugar.

Se recomienda mantenerse alejado de la cláusula [» $where](https://www.mongodb.com/docs/manual/reference/operator/query/where/#considerations)
en las consultas, ya que afecta significativamente el rendimiento. En la medida de lo posible, utilice operadores de consulta normales o el [» Framework
de agregación](https://www.mongodb.com/docs/manual/core/aggregation-pipeline).

Una alternativa a [» MapReduce](https://www.mongodb.com/docs/manual/core/map-reduce/), que utiliza
JavaScript, es el [» Framework
de agregación](https://www.mongodb.com/docs/manual/core/aggregation-pipeline). A diferencia de Map/Reduce, utiliza un lenguaje idiomático para construir consultas, sin tener que escribir y utilizar el enfoque JavaScript más lento que Map/Reduce requiere.

La [» comando eval](https://www.mongodb.com/docs/manual/reference/command/eval/)
ha sido deprecado desde MongoDB 3.0, y también debe ser evitado.

# Clases de la extensión MongoDB

## Tabla de contenidos

- [MongoDB\Driver\Manager](#class.mongodb-driver-manager)
- [MongoDB\Driver\Command](#class.mongodb-driver-command)
- [MongoDB\Driver\Query](#class.mongodb-driver-query)
- [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite)
- [MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand)
- [MongoDB\Driver\Session](#class.mongodb-driver-session)
- [MongoDB\Driver\ClientEncryption](#class.mongodb-driver-clientencryption)
- [MongoDB\Driver\ServerApi](#class.mongodb-driver-serverapi)
- [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)
- [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference)
- [MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern)
- [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)
- [MongoDB\Driver\CursorId](#class.mongodb-driver-cursorid)
- [MongoDB\Driver\CursorInterface](#class.mongodb-driver-cursorinterface)
- [MongoDB\Driver\Server](#class.mongodb-driver-server)
- [MongoDB\Driver\ServerDescription](#class.mongodb-driver-serverdescription)
- [MongoDB\Driver\TopologyDescription](#class.mongodb-driver-topologydescription)
- [MongoDB\Driver\WriteConcernError](#class.mongodb-driver-writeconcernerror)
- [MongoDB\Driver\WriteError](#class.mongodb-driver-writeerror)
- [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)
- [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)

# La clase MongoDB\Driver\Manager

(mongodb &gt;=1.0.0)

## Introducción

    El **MongoDB\Driver\Manager** es el punto de entrada
    principal de la extensión. Es responsable de mantener las conexiones a MongoDB
    (ya sea un servidor autónomo, un conjunto de réplicas o un clúster compartido).




    Ninguna conexión a MongoDB se establece durante la instanciación del Manager.
    Esto significa que el **MongoDB\Driver\Manager** puede ser
    construido siempre, incluso si uno o más servidores MongoDB están fuera de servicio.




    Cualquier escritura o consulta puede lanzar excepciones de conexión ya que las conexiones se crean de manera perezosa.
    Un servidor MongoDB también puede volverse indisponible durante la vida útil del script.
    Por lo tanto, es importante que todas las acciones sobre el Manager estén envueltas en instrucciones try/catch.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Manager**

     {


    /* Métodos */

final public [addSubscriber](#mongodb-driver-manager.addsubscriber)([MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber) $subscriber): [void](language.types.void.html)
final public [\_\_construct](#mongodb-driver-manager.construct)([?](#language.types.null)[string](#language.types.string) $uri = **[null](#constant.null)**, [?](#language.types.null)[array](#language.types.array) $uriOptions = **[null](#constant.null)**, [?](#language.types.null)[array](#language.types.array) $driverOptions = **[null](#constant.null)**)
final public [createClientEncryption](#mongodb-driver-manager.createclientencryption)([array](#language.types.array) $options): [MongoDB\Driver\ClientEncryption](#class.mongodb-driver-clientencryption)
final public [executeBulkWrite](#mongodb-driver-manager.executebulkwrite)([string](#language.types.string) $namespace, [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite) $bulk, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)
final public [executeBulkWriteCommand](#mongodb-driver-manager.executebulkwritecommand)([MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand) $bulk, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)
final public [executeCommand](#mongodb-driver-manager.executecommand)([string](#language.types.string) $db, [MongoDB\Driver\Command](#class.mongodb-driver-command) $command, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)
final public [executeQuery](#mongodb-driver-manager.executequery)([string](#language.types.string) $namespace, [MongoDB\Driver\Query](#class.mongodb-driver-query) $query, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)
final public [executeReadCommand](#mongodb-driver-manager.executereadcommand)([string](#language.types.string) $db, [MongoDB\Driver\Command](#class.mongodb-driver-command) $command, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)
final public [executeReadWriteCommand](#mongodb-driver-manager.executereadwritecommand)([string](#language.types.string) $db, [MongoDB\Driver\Command](#class.mongodb-driver-command) $command, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)
final public [executeWriteCommand](#mongodb-driver-manager.executewritecommand)([string](#language.types.string) $db, [MongoDB\Driver\Command](#class.mongodb-driver-command) $command, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)
final public [getEncryptedFieldsMap](#mongodb-driver-manager.getencryptedfieldsmap)(): [array](#language.types.array)|[object](#language.types.object)|[null](#language.types.null)
final public [getReadConcern](#mongodb-driver-manager.getreadconcern)(): [MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern)
final public [getReadPreference](#mongodb-driver-manager.getreadpreference)(): [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference)
final public [getServers](#mongodb-driver-manager.getservers)(): [array](#language.types.array)
final public [getWriteConcern](#mongodb-driver-manager.getwriteconcern)(): [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)
final public [removeSubscriber](#mongodb-driver-manager.removesubscriber)([MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber) $subscriber): [void](language.types.void.html)
final public [selectServer](#mongodb-driver-manager.selectserver)([?](#language.types.null)[MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference) $readPreference = **[null](#constant.null)**): [MongoDB\Driver\Server](#class.mongodb-driver-server)
final public [startSession](#mongodb-driver-manager.startsession)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Session](#class.mongodb-driver-session)

}

## Ejemplos

    **Ejemplo #1 Uso básico de [MongoDB\Driver\Manager::__construct()](#mongodb-driver-manager.construct)**



     [var_dump()](#function.var-dump) un
     **MongoDB\Driver\Manager** mostrará diversos
     detalles sobre el Manager que no están normalmente expuestos.
     Esto puede ser útil para depurar cómo el controlador ve su configuración MongoDB, y
     qué opciones se están utilizando.

&lt;?php

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
var_dump($manager);

?&gt;

    Resultado del ejemplo anterior es similar a:

object(MongoDB\Driver\Manager)#1 (2) {
["uri"]=&gt;
string(26) "mongodb://127.0.0.1:27017/"
["cluster"]=&gt;
array(0) {
}
}

# MongoDB\Driver\Manager::addSubscriber

(mongodb &gt;=1.10.0)

MongoDB\Driver\Manager::addSubscriber — Registra un observador de eventos de monitoreo con este manager

### Descripción

final public **MongoDB\Driver\Manager::addSubscriber**([MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber) $subscriber): [void](language.types.void.html)

Registra un observador de eventos de monitoreo con este Manager. El observador
será notificado de todos los eventos para este Manager.

**Nota**:

    Si subscriber ya está registrado con este manager, esta
    función no hace nada. Si subscriber también está
    registrado globalmente, solo será notificado una vez de cada evento para este manager.

### Parámetros

    subscriber ([MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber))


      Un observador de eventos de monitoreo a registrar con este Manager.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una
  [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si
  subscriber es un
  **MongoDB\Driver\Monitoring\LogSubscriber**, ya que los
  observadores solo pueden ser registrados globalmente.

### Ver también

- [MongoDB\Driver\Manager::removeSubscriber()](#mongodb-driver-manager.removesubscriber) - Elimina un observador de eventos de supervisión de este Manager

- [MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber)

- [MongoDB\Driver\Monitoring\CommandSubscriber](#class.mongodb-driver-monitoring-commandsubscriber)

- [MongoDB\Driver\Monitoring\addSubscriber()](#function.mongodb.driver.monitoring.addsubscriber) - Registra una suscripción de supervisión de eventos

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Manager::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\Driver\Manager::\_\_construct — Crea un nuevo Manager MongoDB

### Descripción

final public **MongoDB\Driver\Manager::\_\_construct**([?](#language.types.null)[string](#language.types.string) $uri = **[null](#constant.null)**, [?](#language.types.null)[array](#language.types.array) $uriOptions = **[null](#constant.null)**, [?](#language.types.null)[array](#language.types.array) $driverOptions = **[null](#constant.null)**)

Construye un nuevo objeto [MongoDB\Driver\Manager](#class.mongodb-driver-manager) con las opciones especificadas.

**Nota**:

    Con la [» Especificación de descubrimiento y supervisión del servidor](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md#single-threaded-client-construction),
    este constructor no realiza E/S. Las conexiones se inicializarán bajo demanda,
    durante la ejecución de la primera operación.

**Nota**:

    Cuando se especifican opciones de URI SSL o TLS a través de la cadena de conexión o el
    parámetro uriOptions, la extensión activará implícitamente TLS para sus conexiones.
    Para evitar esto, desactive explícitamente la opción
    tls o no especifique ninguna opción TLS.

**Nota**:

En las plataformas Unix, la extensión MongoDB es sensible a los scripts que utilizan
la llamada al sistema fork() sin llamar a exec(). No se deben reutilizar
instancias [MongoDB\Driver\Manager](#class.mongodb-driver-manager) en un proceso
hijo derivado de un fork.

### Parámetros

    uri


      Una URI de conexión [» mongodb://](https://www.mongodb.com/docs/manual/reference/connection-string/):


mongodb://[username:password@]host1[:port1],host2[:port2],...[,hostN[:portN]]][/[defaultAuthDb][?options]]

      Para los detalles sobre las opciones de URI admitidas, ver
      [» Opciones de cadena de conexión](https://www.mongodb.com/docs/manual/reference/connection-string/#connections-connection-options)
      en el manual MongoDB.
      [» Opciones de pool de conexiones](https://www.mongodb.com/docs/manual/reference/connection-string/#connection-pool-options)
      no son admitidas, ya que la extensión no implementa pools de conexiones.




      Por omisión, "mongodb://127.0.0.1:27017" si no se especifica.




      El uri es una URL, por lo que todos los caracteres especiales en
      sus componentes deben estar codificados en URL según la
      [» RFC 3986](https://datatracker.ietf.org/doc/html/rfc3986). Esto es particularmente
      relevante para el nombre de usuario y la contraseña, que pueden incluir caracteres especiales tales como
      @, : o %.
      Al conectarse a través de un socket de dominio Unix, la ruta del socket
      puede contener caracteres especiales como barras diagonales y debe estar codificada.
      La función [rawurlencode()](#function.rawurlencode) puede ser utilizada para codificar
      las partes constitutivas de la URI.




      El componente defaultAuthDb puede ser utilizado para especificar la
      base de datos asociada a las credenciales del usuario; sin embargo, la opción de URI
      authSource tendrá prioridad si se especifica.
      Si ni defaultAuthDb ni authSource se especifican, la base de datos
      admin será utilizada por omisión. El componente defaultAuthDb
      no tiene ningún efecto en ausencia de credenciales de usuario.






    uriOptions


      Opciones adicionales
      [» de cadena de conexión](https://www.mongodb.com/docs/manual/reference/connection-string/#connections-connection-options),
      que sobrescribirán cualquier opción con el mismo nombre en el parámetro
      uri.







       <caption>**uriOptions**</caption>



          Opción
          Tipo
          Descripción






          appname
          [string](#language.types.string)


            MongoDB 3.4+ tiene la capacidad de anotar las conexiones con metadatos
            proporcionados por el cliente conectado. Estos metadatos se incluyen en los
            registros del servidor al establecer una conexión y también se registran en
            los registros de consultas lentas cuando el perfilado de la base de datos está activado.




            Esta opción puede ser utilizada para especificar un nombre de aplicación, que será
            incluido en los metadatos. El valor no puede exceder 128 caracteres de longitud.







          authMechanism
          [string](#language.types.string)


            El mecanismo de autenticación que MongoDB utilizará para autenticar
            la conexión. Para más detalles y una lista de los valores admitidos, ver
            [» Opciones de autenticación](https://www.mongodb.com/docs/manual/reference/connection-string/#urioption.authMechanism)
            en el manual MongoDB.







          authMechanismProperties
          [array](#language.types.array)


            Las propiedades específicas del mecanismo de autenticación seleccionado. Para más
            detalles y una lista de las propiedades admitidas, ver la
            [» Especificación de autenticación del controlador](https://github.com/mongodb/specifications/blob/master/source/auth/auth.rst#auth-related-options).



           **Nota**:

             Cuando no se especifica en la cadena de URI, esta opción se expresa como
             un array de pares clave/valor. Las claves y valores de este array
             deben ser strings.








          authSource
          [string](#language.types.string)


            El nombre de la base de datos asociada a las credenciales del usuario. Por omisión
            al componente de la base de datos de la URI de conexión, o a la base de datos
            admin si ambos no se especifican.




            Para los mecanismos de autenticación que no admiten la noción de base de datos
            (por ejemplo, GSSAPI), esto debería ser
            "$external".







          compressors
          [string](#language.types.string)


            Una lista priorizada y delimitada por comas de compresores que el cliente
            desea utilizar. Los mensajes solo se comprimen si el cliente y el servidor
            comparten compresores en común, y el compresor utilizado en cada
            dirección dependerá de la configuración individual del servidor
            o del controlador. Ver la
            [» Especificación de compresión del controlador](https://github.com/mongodb/specifications/blob/master/source/compression/OP_COMPRESSED.rst#compressors)
            para más información.







          connectTimeoutMS
          [int](#language.types.integer)


            El tiempo en milisegundos para intentar una conexión antes de expirar.
            Por omisión, 10 000 milisegundos.







          directConnection
          [bool](#language.types.boolean)


            Esta opción puede ser utilizada para controlar el comportamiento de descubrimiento del conjunto de réplicas
            cuando solo se proporciona un host en la cadena de conexión.
            Por omisión, proporcionar un solo miembro en la cadena de conexión
            establecerá una conexión directa o descubrirá miembros adicionales
            según si la opción de URI "replicaSet" está omitida o presente,
            respectivamente. Especifique **[false](#constant.false)** para forzar el descubrimiento a que ocurra
            (si "replicaSet" está omitido)
            o especifique **[true](#constant.true)** para forzar una conexión directa (si
            "replicaSet" está presente).







          heartbeatFrequencyMS
          [int](#language.types.integer)


            Especifica el intervalo en milisegundos entre las verificaciones de la topología MongoDB,
            contado desde el final de la verificación previa hasta el inicio de la siguiente.
            Por omisión, 60 000 milisegundos.




            Para la
            [» Especificación de descubrimiento y supervisión del servidor](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md#heartbeatfrequencyms),
            este valor no puede ser inferior a 500 milisegundos.







          journal
          [bool](#language.types.boolean)


            Corresponde a la opción journal del write concern por omisión.
            Si **[true](#constant.true)**, las escrituras requerirán un acuse de recibo de MongoDB indicando que la operación ha sido
            escrita en el diario. Para más detalles, ver
            [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern).







          loadBalanced
          [bool](#language.types.boolean)


            Especifica si el controlador se conecta a un clúster MongoDB a través
            de un equilibrador de carga. Si **[true](#constant.true)**, el controlador solo puede conectarse a
            un solo host (especificado por la cadena de conexión o la búsqueda SRV),
            la opción de URI "directConnection" no puede
            ser **[true](#constant.true)**, y la opción de URI "replicaSet"
            debe ser omitida. Por omisión, **[false](#constant.false)**.







          localThresholdMS
          [int](#language.types.integer)


            El tamaño en milisegundos de la ventana de latencia para la selección entre
            múltiples instancias MongoDB apropiadas al resolver una preferencia de lectura.
            Por omisión, 15 milisegundos.







          maxStalenessSeconds
          [int](#language.types.integer)


            Corresponde a la opción maxStalenessSeconds de la preferencia de lectura.
            Especifica, en segundos, la duración máxima de validez de una instancia secundaria antes de que el cliente deje de usarla para las
            operaciones de lectura. Por omisión, no hay una duración máxima de validez y
            los clientes no tendrán en cuenta el retraso de una instancia secundaria al elegir la dirección de una operación de lectura. Para más detalles, ver
            [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference).




            Si se especifica, la duración máxima de validez debe ser un entero de 32 bits firmado
            superior o igual a
            **[MongoDB\Driver\ReadPreference::SMALLEST_MAX_STALENESS_SECONDS](#mongodb-driver-readpreference.constants.smallest-max-staleness-seconds)**
            (por ejemplo, 90 segundos).







          password
          [string](#language.types.string)

           La contraseña del usuario en proceso de autenticación. Esta opción es útil
           si la contraseña contiene caracteres especiales, que de otro modo
           deberían estar codificados en URL para la URI de conexión.




          readConcernLevel
          [string](#language.types.string)

           Corresponde a la opción level de la preferencia de lectura.
           Especifica el nivel de aislamiento de lectura. Para más detalles, ver
           [MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern).




          readPreference
          [string](#language.types.string)


            Corresponde a la opción mode de la preferencia de lectura.
            Por omisión, "primary". Para más detalles, ver
            [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference).







          readPreferenceTags
          [array](#language.types.array)


            Corresponde a la opción tagSets de la preferencia de lectura.
            Los conjuntos de etiquetas permiten dirigir las operaciones de lectura a
            miembros específicos de un conjunto de réplicas. Para más detalles,
            ver [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference).



           **Nota**:

             Cuando no se especifica en la cadena de URI, esta opción se expresa como
             un array conforme al formato esperado por
             [MongoDB\Driver\ReadPreference::__construct()](#mongodb-driver-readpreference.construct).








          replicaSet
          [string](#language.types.string)


            Especifica el nombre del conjunto de réplicas.







          retryReads
          [bool](#language.types.boolean)


            Especifica si el controlador debe reintentar automáticamente
            ciertas operaciones de lectura que fallan debido a errores de red transitorios
            o elecciones de conjunto de réplicas. Esta funcionalidad requiere MongoDB 3.6+. Por omisión, **[true](#constant.true)**.




            Ver la
            [» Especificación de lectura reintentable](https://github.com/mongodb/specifications/blob/master/source/retryable-reads/retryable-reads.rst)
            para más información.







          retryWrites
          [bool](#language.types.boolean)


            Especifica si el controlador debe reintentar automáticamente
            ciertas operaciones de escritura que fallan debido a errores de red transitorios
            o elecciones de conjunto de réplicas. Esta funcionalidad requiere MongoDB 3.6+. Por omisión, **[true](#constant.true)**.




            Ver
            [» Escrituras reintentables](https://www.mongodb.com/docs/manual/core/retryable-writes/)
            en el manual MongoDB para más información.







          serverSelectionTimeoutMS
          [int](#language.types.integer)


            Especifica cuánto tiempo en milisegundos bloquear para la selección del servidor
            antes de lanzar una excepción. Por omisión, 30 000 milisegundos.







          serverSelectionTryOnce
          [bool](#language.types.boolean)


            Cuando **[true](#constant.true)**, indica al controlador que escanee el despliegue MongoDB
            exactamente una vez después de un fallo de selección del servidor, luego seleccione
            un servidor o lance una excepción. Cuando **[false](#constant.false)**, el controlador bloquea y
            busca un servidor hasta el valor de
            "serverSelectionTimeoutMS". Por omisión, **[true](#constant.true)**.







          socketCheckIntervalMS
          [int](#language.types.integer)


            Si un socket no ha sido utilizado recientemente, el controlador debe verificarlo a través
            de un comando hello antes de usarlo para cualquier
            operación. Por omisión, 5 000 milisegundos.







          socketTimeoutMS
          [int](#language.types.integer)


            El tiempo en milisegundos para intentar un envío o recepción en un socket
            antes de expirar. Por omisión, 300 000 milisegundos (es decir, cinco
            minutos).







          srvMaxHosts
          [int](#language.types.integer)


            El número máximo de resultados SRV a seleccionar aleatoriamente durante la
            primera población de la lista de semillas o, durante la consulta SRV, la adición de nuevos hosts a
            la topología. Por omisión, 0 (es decir, sin máximo).







          srvServiceName
          [string](#language.types.string)


            El nombre de servicio a utilizar para la búsqueda SRV en la lista de semillas inicial
            y la consulta SRV. Por omisión, "mongodb".







          tls
          [bool](#language.types.boolean)


            Inicializa la conexión con TLS/SSL si **[true](#constant.true)**. Por omisión, **[false](#constant.false)**.







          tlsAllowInvalidCertificates
          [bool](#language.types.boolean)


            Especifica si el controlador debe generar un error cuando el certificado
            TLS del servidor es inválido. Por omisión, **[false](#constant.false)**.



           **Advertencia**

             Desactivar la validación del certificado crea una vulnerabilidad.








          tlsAllowInvalidHostnames
          [bool](#language.types.boolean)


            Especifica si el controlador debe generar un error cuando hay un
            desacuerdo entre el nombre de host del servidor y el nombre de host especificado por
            el certificado TLS. Por omisión, **[false](#constant.false)**.



           **Advertencia**

             Desactivar la validación del certificado crea una vulnerabilidad. Permitir
             nombres de host inválidos puede exponer al controlador a una
             [» ataque del hombre del medio](https://en.wikipedia.org/wiki/Man-in-the-middle_attack).








          tlsCAFile
          [string](#language.types.string)


            La ruta del archivo que contiene un solo certificado o un conjunto de certificados
            de autoridades a considerar confiables al establecer una conexión TLS.
            Se utilizará el almacén de certificados del sistema por omisión.







          tlsCertificateKeyFile
          [string](#language.types.string)


            La ruta del archivo de certificado del cliente o del archivo de clave privada del cliente;
            en el caso de que ambos sean necesarios, los archivos deben estar
            concatenados.







          tlsCertificateKeyFilePassword
          [string](#language.types.string)


            La contraseña para descifrar la clave privada del cliente (es decir,
            la opción de URI "tlsCertificateKeyFile") a utilizar
            para las conexiones TLS.







          tlsDisableCertificateRevocationCheck
          [bool](#language.types.boolean)


            Si **[true](#constant.true)**, el controlador no intentará verificar el estado de revocación del certificado
            (por ejemplo, OCSP, CRL). Por omisión, **[false](#constant.false)**.







          tlsDisableOCSPEndpointCheck
          [bool](#language.types.boolean)


            Si **[true](#constant.true)**, el controlador no intentará contactar un punto de extremo de responso OCSP
            si es necesario (es decir, una respuesta OCSP no está grapada). Por omisión, **[false](#constant.false)**.







          tlsInsecure
          [bool](#language.types.boolean)


            Relaja las restricciones TLS tanto como sea posible. Especificar **[true](#constant.true)** para
            que esta opción tenga el mismo efecto que especificar **[true](#constant.true)** para las
            opciones de URI "tlsAllowInvalidCertificates" y
            "tlsAllowInvalidHostnames". Por omisión, **[false](#constant.false)**.



           **Advertencia**

             Desactivar la validación del certificado crea una vulnerabilidad. Permitir
             nombres de host inválidos puede exponer al controlador a una
             [» ataque del hombre del medio](https://en.wikipedia.org/wiki/Man-in-the-middle_attack).








          username
          [string](#language.types.string)

           El nombre de usuario del usuario en proceso de autenticación. Esta opción es útil
           si el nombre de usuario contiene caracteres especiales, que de otro modo
           deberían estar codificados en URL para la URI de conexión.




          w
          [int](#language.types.integer)|[string](#language.types.string)


            Corresponde a la opción w del write concern por omisión.
            Para más detalles, ver
            [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern).







          wTimeoutMS
          [int](#language.types.integer)|[string](#language.types.string)


            Corresponde a la opción wtimeout del write concern
            por omisión. Especifica un límite de tiempo,
            en milisegundos, para el write concern. Para más detalles, ver
            [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern).




            Si se especifica, wTimeoutMS debe ser un entero de 32 bits firmado
            superior o igual a cero.







          zlibCompressionLevel
          [int](#language.types.integer)


            Especifica el nivel de compresión a utilizar para el compresor zlib. Esta
            opción no tiene ningún efecto si zlib no está incluido en
            la opción de URI "compressors". Ver la
            [» Especificación de compresión del controlador](https://github.com/mongodb/specifications/blob/master/source/compression/OP_COMPRESSED.rst#zlibcompressionlevel)
            para más información.














    driverOptions





       <caption>**driverOptions**</caption>



          Opción
          Tipo
          Descripción






          autoEncryption
          [array](#language.types.array)


            Proporciona opciones para activar el cifrado automático a nivel de campo.
            La lista de opciones se describe en la
            [tabla de abajo](#mongodb-driver-manager.construct-autoencryption).



           **Nota**:



             El cifrado automático es una funcionalidad empresarial
             que solo se aplica a las operaciones sobre una colección. El cifrado automático no es
             admitido para las operaciones sobre una base de datos o una vista, y las operaciones que no
             son sorteadas resultarán en un error (ver
             [» libmongocrypt: La lista de autorización de cifrado automático](https://github.com/mongodb/specifications/blob/master/source/client-side-encryption/client-side-encryption.rst#libmongocrypt-auto-encryption-allow-list)). Para sortear el cifrado automático
             para todas las operaciones, establezca bypassAutoEncryption a
             **[true](#constant.true)**.




             El cifrado automático requiere que el usuario autenticado tenga el
             privilegio de acción
             [» listCollections](https://www.mongodb.com/docs/manual/reference/command/listCollections/#required-access).




             El cifrado explícito y automático es una funcionalidad de la comunidad.
             El controlador siempre puede descifrar automáticamente cuando
             bypassAutoEncryption es **[true](#constant.true)**.








          ca_dir
          [string](#language.types.string)


            La ruta del directorio de certificados correctamente hashados. Se utilizará el almacén de certificados del sistema
            por omisión.







          crl_file
          [string](#language.types.string)
          La ruta del archivo de lista de revocación de certificados.



          disableClientPersistence
          [bool](#language.types.boolean)


            Si **[true](#constant.true)**, este Manager utilizará un nuevo cliente libmongoc, que no será
            persistido ni compartido con otros objetos Manager. Cuando este
            objeto Manager es liberado, su cliente será destruido y todas
            las conexiones serán cerradas. Por omisión, **[false](#constant.false)**.



           **Nota**:

             Desactivar la persistencia del cliente no es generalmente recomendado.








          driver
          [array](#language.types.array)


            Permite a un nivel superior de biblioteca añadir sus propias metadatos
            al apretón de manos del servidor. Por omisión, la extensión envía su propio nombre,
            versión y plataforma (es decir, versión PHP) en el apretón de manos. Las cadenas
            pueden ser especificadas para las claves "name",
            "version" y "platform" de este array, y serán
            añadidas al campo respectivo(s)
            del apretón de manos del servidor.



           **Nota**:

             Las informaciones del apretón de manos están limitadas a 512 bytes. La extensión
             truncará los datos del apretón de manos para adaptarse a esta cadena de 512 bytes. Las
             bibliotecas de nivel superior están animadas a mantener sus propias metadatos concisas.








          serverApi
          [MongoDB\Driver\ServerApi](#class.mongodb-driver-serverapi)


            Esta opción se utiliza para declarar una versión de API de servidor para el Manager.
            Si se omite, no se declara ninguna versión de API.












      Las siguientes opciones son admitidas:




       <caption>**Opciones para el cifrado automático**</caption>



          Opción
          Tipo
          Descripción







          keyVaultClient
          [MongoDB\Driver\Manager](#class.mongodb-driver-manager)
          El Manager utilizado para enrutar las peticiones de claves de datos a un cluster MongoDB diferente. Por omisión, el Manager y cluster actual es utilizado.





          keyVaultNamespace
          [string](#language.types.string)
          Un nombre de espacio completamente calificado (por ejemplo "databaseName.collectionName") denotando la colección que contiene todas las claves de datos utilizadas para el cifrado y descifrado. Esta opción es requerida.





          kmsProviders
          [array](#language.types.array)


            Un documento que contiene la configuración de uno o varios
            proveedores KMS, que se utilizan para cifrar las claves de datos.
            Los proveedores soportados son "aws",
            "azure", "gcp" y
            "local", y al menos uno debe ser especificado.




            Si se especifica un documento vacío para "aws",
            "azure", o "gcp", el controlador
            intentará configurar el proveedor utilizando
            [» Automatic Credentials](https://github.com/mongodb/specifications/blob/master/source/client-side-encryption/client-side-encryption.rst#automatic-credentials).




            El formato para "aws" es el siguiente:





aws: {
accessKeyId: &lt;string&gt;,
secretAccessKey: &lt;string&gt;,
sessionToken: &lt;optional string&gt;
}

            El formato para "azure" es el siguiente:





azure: {
tenantId: &lt;string&gt;,
clientId: &lt;string&gt;,
clientSecret: &lt;string&gt;,
identityPlatformEndpoint: &lt;optional string&gt; // Defaults to "login.microsoftonline.com"

}

            El formato para "gcp" es el siguiente:





gcp: {
email: &lt;string&gt;,
privateKey: &lt;base64 string&gt;|&lt;MongoDB\BSON\Binary&gt;,
endpoint: &lt;optional string&gt; // Defaults to "oauth2.googleapis.com"

}

            El formato para "kmip" es el siguiente:





kmip: {
endpoint: &lt;string&gt;
}

            El formato para "local" es el siguiente:





local: {
// 96-byte master key used to encrypt/decrypt data keys
key: &lt;base64 string&gt;|&lt;MongoDB\BSON\Binary&gt;
}

tlsOptions
[array](#language.types.array)

    Un documento que contiene la configuración TLS de uno o varios
    proveedores KMS.
    Los proveedores soportados son "aws",
    "azure", "gcp" y
    "kmip".
    Todos los proveedores soportan las siguientes opciones:

&lt;provider&gt;: {
tlsCaFile: &lt;optional string&gt;,
tlsCertificateKeyFile: &lt;optional string&gt;,
tlsCertificateKeyFilePassword: &lt;optional string&gt;,
tlsDisableOCSPEndpointCheck: &lt;optional bool&gt;
}

          schemaMap
          [array](#language.types.array)|[object](#language.types.object)


            Mapea los espacios de nombres de colección a un esquema JSON local. Esto se
            utiliza para configurar el cifrado automático. Ver
            [» Reglas de cifrado automático](https://www.mongodb.com/docs/manual/reference/security-client-side-automatic-json-schema/)
            en el manual MongoDB para más información. Es un error
            especificar una colección tanto en schemaMap como
            en encryptedFieldsMap.



           **Nota**:

             Proporcionar un schemaMap proporciona más
             seguridad que confiar en los esquemas JSON obtenidos del
             servidor. Esto protege contra un servidor malintencionado anunciando un falso
             esquema JSON, que podría engañar al cliente para enviar
             datos no cifrados que deberían estar cifrados.




           **Nota**:

             Los esquemas proporcionados en el schemaMap solo se aplican
             a la configuración del cifrado automático para el cifrado del lado del cliente.
             Otras reglas de validación en el esquema JSON no serán
             aplicadas por el controlador y resultarán en un error.








          bypassAutoEncryption
          [bool](#language.types.boolean)

           Si **[true](#constant.true)**, mongocryptd no será lanzado
           automáticamente. Esto se utiliza para desactivar el cifrado automático.
           Por omisión, **[false](#constant.false)**.




          bypassQueryAnalysis
          [bool](#language.types.boolean)


            Si **[true](#constant.true)**, el análisis automático de las comandos salientes será desactivado y
            mongocryptd no será lanzado automáticamente. Esto permite
            el caso de uso del cifrado explícito para consultar campos indexados sin requerir
            la biblioteca crypt_shared bajo licencia empresarial o
            el proceso mongocryptd. Por omisión, **[false](#constant.false)**.







          encryptedFieldsMap
          [array](#language.types.array)|[object](#language.types.object)


            Mapea los espacios de nombres de colección a un documento
            encryptedFields. Esto se utiliza para
            configurar el cifrado consultable. Ver
            [» Cifrado de campo y consultabilidad](https://www.mongodb.com/docs/manual/core/queryable-encryption/fundamentals/encrypt-and-query/)
            en el manual MongoDB para más información. Es un error
            especificar una colección tanto en
            encryptedFieldsMap como
            en schemaMap.



           **Nota**:

             Proporcionar un encryptedFieldsMap proporciona más
             seguridad que confiar en los
             encryptedFields obtenidos del servidor.
             Esto protege contra un servidor malintencionado anunciando un falso
             encryptedFields.








          extraOptions
          [array](#language.types.array)


            El extraOptions se refieren al
            proceso mongocryptd. Las siguientes
            opciones son admitidas:




            - mongocryptdURI ([string](#language.types.string)): URI para conectarse a un proceso mongocryptd existente. Por omisión, "mongodb://localhost:27020".

            - mongocryptdBypassSpawn ([bool](#language.types.boolean)): Si **[true](#constant.true)**, impide que el controlador lance mongocryptd. Por omisión, **[false](#constant.false)**.

            - mongocryptdSpawnPath ([string](#language.types.string)): Ruta absoluta para buscar el binario mongocryptd. Por omisión, una cadena vacía y consulta las rutas del sistema.

            - mongocryptdSpawnArgs ([array](#language.types.array)): Array de argumentos de cadena a pasar a mongocryptd al lanzarlo. Por omisión, ["--idleShutdownTimeoutSecs=60"].

            - cryptSharedLibPath ([string](#language.types.string)): Ruta absoluta hacia la biblioteca compartida crypt_shared. Por omisión, una cadena vacía y consulta las rutas del sistema.

            - cryptSharedLibRequired ([bool](#language.types.boolean)): Si **[true](#constant.true)**, exige que el controlador cargue crypt_shared. Por omisión, **[false](#constant.false)**.



            Ver la [» Especificación de cifrado del lado del cliente](https://github.com/mongodb/specifications/blob/master/source/client-side-encryption/client-side-encryption.rst#extraoptions) para más información.












     **Nota**:

       El cifrado automático es una funcionalidad empresarial que
       solo se aplica a las operaciones sobre una colección. El cifrado automático no es
       admitido para las operaciones sobre una base de datos o una vista, y las operaciones que
       no son sorteadas resultarán en un error. Para sortear el cifrado automático
       para todas las operaciones, establezca bypassAutoEncryption=true
       en autoEncryption. Para más información sobre las operaciones admitidas,
       ver la [» Especificación de cifrado del lado del cliente](https://github.com/mongodb/specifications/blob/master/source/client-side-encryption/client-side-encryption.rst#libmongocrypt-auto-encryption-whitelist).



### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si un parámetro es de tipo incorrecto

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 2.0.0


         La opción de URI "authMechanismProperties" ha sido eliminada.
         Utilizar la propiedad "CANONICALIZE_HOST_NAME" de la opción de URI
         "authMechanismProperties" en su lugar.




         La opción de URI "authMechanism" ha sido eliminada.
         Utilizar la propiedad "SERVICE_NAME" de la opción de URI
         "authMechanismProperties" en su lugar.




         La opción de URI "authSource" ha sido eliminada.
         Utilizar las opciones de URI "w" y "wTimeoutMS"
         en su lugar.




         La opción de URI "ssl" ha sido eliminada. Utilizar la opción
         de URI "tls" en su lugar.




         La opción de controlador "allow_invalid_hostname" ha
         sido eliminada. Utilizar la opción de URI
         "tlsAllowInvalidHostnames" en su lugar.




         La opción de controlador "ca_file" ha
         sido eliminada. Utilizar la opción de URI
         "tlsCAFile" en su lugar.




         La opción de controlador "context" ha sido eliminada. Todas las
         opciones de contexto han sido deprecadas en favor de las diversas opciones
         de URI relacionadas con TLS.




         La opción de controlador "pem_file" ha sido eliminada. Utilizar
         la opción de URI "tlsCertificateKeyFile" en su lugar.




         La opción de controlador "pem_pwd" ha sido eliminada. Utilizar
         la opción de URI "tlsCertificateKeyFilePassword" en su lugar.




         La opción de controlador "weak_cert_validation" ha sido eliminada.
         Utilizar la opción de URI "tlsAllowInvalidCertificates"
         en su lugar.







       PECL mongodb 1.16.0


         El proveedor AWS KMS para el cifrado del lado del cliente ahora acepta una
         opción "sessionToken", que puede ser utilizada para
         autenticarse con credenciales AWS temporales.




         Añadido "tlsDisableOCSPEndpointCheck" al
         campo "tlsOptions" de la opción de controlador
         "autoEncryption".




         Si se especifica un documento vacío para el proveedor KMS "azure" o
         "gcp", el controlador intentará configurar el proveedor utilizando
         [» las credenciales automáticas](https://github.com/mongodb/specifications/blob/master/source/client-side-encryption/client-side-encryption.rst#automatic-credentials).
         If an empty document is specified for the "azure" or







       PECL mongodb 1.15.0


         Si se especifica un documento vacío para el proveedor KMS "aws", el controlador
         intentará configurar el proveedor utilizando
         [» las credenciales automáticas](https://github.com/mongodb/specifications/blob/master/source/client-side-encryption/client-side-encryption.rst#automatic-credentials).







       PECL mongodb 1.14.0


         Añadidas las opciones de cifrado del lado del cliente "bypassQueryAnalysis" y
         "encryptedFieldsMap". Opciones adicionales relacionadas con crypt_shared son
         ahora admitidas en la opción de cifrado del lado del cliente
         "extraOptions".







       PECL mongodb 1.13.0


         Añadidas las opciones de URI "srvMaxHosts" y
         "srvServiceName".







       PECL mongodb 1.12.0


         KMIP es ahora admitido como proveedor KMS para el cifrado del lado del cliente y
         puede ser configurado en el campo "kmsProviders" de la opción de controlador
         "autoEncryption". Además, las opciones TLS
         para los proveedores KMS pueden ahora ser configuradas en el
         campo "tlsOptions" de la opción de controlador
         "autoEncryption".







       PECL mongodb 1.11.0


         Añadida la opción de URI "loadBalanced".







       PECL mongodb 1.10.0


         Añadida la opción de controlador "disableClientPersistence".




         Azure y GCP son ahora admitidos como proveedores KMS para
         el cifrado del lado del cliente y pueden ser configurados en el campo
         "kmsProviders" de la opción de controlador
         "autoEncryption". Las cadenas codificadas en base64 son ahora aceptadas
         como alternativa a [MongoDB\BSON\Binary](#class.mongodb-bson-binary) para las opciones en
         "kmsProviders".







       PECL mongodb 1.8.0


         Añadidas las opciones de URI "directConnection",
         "tlsDisableCertificateRevocationCheck" y
         "tlsDisableOCSPEndpointCheck".




         Añadida la opción de controlador "driver".







       PECL mongodb 1.7.0


         Añadida la opción de controlador "autoEncryption".




         Especificar cualquier opción SSL o TLS a través del parámetro
         driverOptions activará ahora implícitamente TLS, como
         ocurre con las opciones de URI correspondientes.







       PECL mongodb 1.6.0


         Añadidas las opciones de URI "retryReads", "tls",
         "tlsAllowInvalidCertificates",
         "tlsAllowInvalidHostnames",
         "tlsCAFile",
         "tlsCertificateKeyFile",
         "tlsCertificateKeyFilePassword", y
         "tlsInsecure".




         La opción de URI "retryWrites" está ahora a **[true](#constant.true)** por omisión.




         Especificar una opción de URI SSL o TLS a través de la cadena de conexión o
         el parámetro uriOptions activará ahora
         implícitamente TLS a menos que ssl o tls sea **[false](#constant.false)**.
         TLS no es *implícitamente* activado para las opciones en
         el parámetro driverOptions, lo que es inalterado
         con respecto a las versiones anteriores.







       PECL mongodb 1.5.0


         "wtimeoutMS" es ahora siempre validado y aplicado al write concern. Anteriormente, la opción era ignorada si
         "w" era &lt;= 1, ya que el tiempo de espera solo se aplica a
         la replicación.







       PECL mongodb 1.4.0


         Añadidas las opciones de URI "compressors",
         "retryWrites", y
         "zlibCompressionLevel".







       PECL mongodb 1.3.0


         El argumento uriOptions ahora acepta
         las opciones "authMechanism" y
         "authMechanismProperties". Anteriormente, estas
         opciones solo eran admitidas en el argumento
         uri.







       PECL mongodb 1.2.0


         El argumento uri es ahora opcional y
         por omisión "mongodb://. El puerto por omisión sigue siendo
         27017.




         Añadida la opción de URI "appname".




         Añadidas las opciones de controlador "allow_invalid_hostname",
         "ca_file", "ca_dir",
         "clr_file", "pem_file",
         "pem_pwd", y
         "weak_cert_validation".




         La API de flujos PHP ya no se utiliza para la comunicación por socket. La opción
         "connectTimeoutMS" de la URI es ahora por omisión 10
         segundos en lugar de
         [default_socket_timeout](#ini.default-socket-timeout)
         en versiones anteriores. Además, la extensión ya no admite todas las [opciones de contexto SSL](#context.ssl) a través
         de la opción de controlador "context".







       PECL mongodb 1.1.0


         El argumento uri es ahora opcional y por omisión a
         "mongodb://localhost:27017/".








### Ejemplos

**Ejemplo #1 Ejemplos básicos MongoDB\Driver\Manager::\_\_construct()**

Conexión a un nodo MongoDB autónomo:

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://example.com:27017");

?&gt;

    Conexión a un nodo MongoDB autónomo a través de un socket de dominio Unix. La ruta del
    socket puede incluir caracteres especiales como barras diagonales y debe ser codificada
    con [rawurlencode()](#function.rawurlencode).

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://" . rawurlencode("/tmp/mongodb-27017.sock"));

?&gt;

Conexión a un conjunto de réplicas:

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://rs1.example.com,rs2.example.com/?replicaSet=myReplicaSet");

?&gt;

Conexión a un clúster fragmentado (es decir, una o más instancias mongos):

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://mongos1.example.com,mongos2.example.com/");

?&gt;

Conexión a MongoDB con credenciales de autenticación para un usuario y una base de datos específicos:

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://myusername:mypassword@example.com/?authSource=databaseName");

?&gt;

    Conexión a MongoDB con credenciales de autenticación para un usuario
    y una base de datos específicos, donde el nombre de usuario o la contraseña incluye
    caracteres especiales (por ejemplo @, :,
    %). En el ejemplo siguiente, la cadena de contraseña
    myp@ss:w%rd ha sido manualmente escapada; sin embargo,
    [rawurlencode()](#function.rawurlencode) también puede ser utilizada para escapar
    los componentes de la URI que pueden contener caracteres especiales.

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://myusername:myp%40ss%3Aw%25rd@example.com/?authSource=databaseName");

?&gt;

Conexión a MongoDB con autenticación X509:

&lt;?php

$manager = new MongoDB\Driver\Manager(
"mongodb://example.com/?ssl=true&amp;authMechanism=MONGODB-X509",
[],
[
"pem_file" =&gt; "/path/to/client.pem",
]
);
?&gt;

### Ver también

- [Manejo de la conexión y persistencia](#mongodb.connection-handling)

- [» Formato de cadena de conexión MongoDB](https://www.mongodb.com/docs/manual/reference/connection-string/)

# MongoDB\Driver\Manager::createClientEncryption

(mongodb &gt;=1.7.0)

MongoDB\Driver\Manager::createClientEncryption — Crear un nuevo objeto ClientEncryption

### Descripción

final public **MongoDB\Driver\Manager::createClientEncryption**([array](#language.types.array) $options): [MongoDB\Driver\ClientEncryption](#class.mongodb-driver-clientencryption)

Construye un nuevo objeto [MongoDB\Driver\ClientEncryption](#class.mongodb-driver-clientencryption) con las opciones especificadas.

### Parámetros

    options





       <caption>**options**</caption>



          Option
          Type
          Description







          keyVaultClient
          [MongoDB\Driver\Manager](#class.mongodb-driver-manager)
          El Manager utilizado para enrutar las peticiones de claves de datos a un cluster MongoDB diferente. Por omisión, el Manager y cluster actual es utilizado.





          keyVaultNamespace
          [string](#language.types.string)
          Un nombre de espacio completamente calificado (por ejemplo "databaseName.collectionName") denotando la colección que contiene todas las claves de datos utilizadas para el cifrado y descifrado. Esta opción es requerida.





          kmsProviders
          [array](#language.types.array)


            Un documento que contiene la configuración de uno o varios
            proveedores KMS, que se utilizan para cifrar las claves de datos.
            Los proveedores soportados son "aws",
            "azure", "gcp" y
            "local", y al menos uno debe ser especificado.




            Si se especifica un documento vacío para "aws",
            "azure", o "gcp", el controlador
            intentará configurar el proveedor utilizando
            [» Automatic Credentials](https://github.com/mongodb/specifications/blob/master/source/client-side-encryption/client-side-encryption.rst#automatic-credentials).




            El formato para "aws" es el siguiente:





aws: {
accessKeyId: &lt;string&gt;,
secretAccessKey: &lt;string&gt;,
sessionToken: &lt;optional string&gt;
}

            El formato para "azure" es el siguiente:





azure: {
tenantId: &lt;string&gt;,
clientId: &lt;string&gt;,
clientSecret: &lt;string&gt;,
identityPlatformEndpoint: &lt;optional string&gt; // Defaults to "login.microsoftonline.com"

}

            El formato para "gcp" es el siguiente:





gcp: {
email: &lt;string&gt;,
privateKey: &lt;base64 string&gt;|&lt;MongoDB\BSON\Binary&gt;,
endpoint: &lt;optional string&gt; // Defaults to "oauth2.googleapis.com"

}

            El formato para "kmip" es el siguiente:





kmip: {
endpoint: &lt;string&gt;
}

            El formato para "local" es el siguiente:





local: {
// 96-byte master key used to encrypt/decrypt data keys
key: &lt;base64 string&gt;|&lt;MongoDB\BSON\Binary&gt;
}

tlsOptions
[array](#language.types.array)

    Un documento que contiene la configuración TLS de uno o varios
    proveedores KMS.
    Los proveedores soportados son "aws",
    "azure", "gcp" y
    "kmip".
    Todos los proveedores soportan las siguientes opciones:

&lt;provider&gt;: {
tlsCaFile: &lt;optional string&gt;,
tlsCertificateKeyFile: &lt;optional string&gt;,
tlsCertificateKeyFilePassword: &lt;optional string&gt;,
tlsDisableOCSPEndpointCheck: &lt;optional bool&gt;
}

### Valores devueltos

Devuelve una nueva instancia de [MongoDB\Driver\ClientEncryption](#class.mongodb-driver-clientencryption).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una excepción [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) si la extensión ha sido compilada sin el soporte de libmongocrypt

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.16.0


         El proveedor AWS KMS para el cifrado del lado del cliente acepta
         ahora una opción "sessionToken", que puede ser utilizada
         para autenticarse con credenciales AWS temporales.




         Añadido "tlsDisableOCSPEndpointCheck" a la opción
         "tlsOptions".




         Si se especifica un documento vacío para el proveedor KMS "azure" o
         "gcp", el controlador intentará
         configurar el proveedor utilizando
         [» Las credenciales automáticas](https://github.com/mongodb/specifications/blob/master/source/client-side-encryption/client-side-encryption.rst#automatic-credentials).







       PECL mongodb 1.15.0


         Si se especifica un documento vacío para el proveedor KMS "aws",
         el controlador intentará configurar el proveedor utilizando
         [» Las credenciales automáticas](https://github.com/mongodb/specifications/blob/master/source/client-side-encryption/client-side-encryption.rst#automatic-credentials).







       PECL mongodb 1.12.0


         KMIP es ahora soportado como proveedor KMS para el cifrado
         del lado del cliente y puede ser configurado en la opción "kmsProviders".




         Añadida la opción "tlsOptions".







       PECL mongodb 1.10.0


         Azure y GCP son ahora soportados como proveedores KMS para el cifrado
         del lado del cliente y pueden ser configurados en la opción
         "kmsProviders".
         Las cadenas codificadas en base64 son ahora aceptadas como alternativa a
         [MongoDB\BSON\Binary](#class.mongodb-bson-binary)
         para las opciones en "kmsProviders".








### Ver también

- [MongoDB\Driver\ClientEncryption::\_\_construct()](#mongodb-driver-clientencryption.construct) - Crear un nuevo objeto ClientEncryption

- [» Cifrado del lado del cliente explícito (manual)](https://www.mongodb.com/docs/manual/core/security-explicit-client-side-encryption/) en el manual de MongoDB

# MongoDB\Driver\Manager::executeBulkWrite

(mongodb &gt;=1.0.0)

MongoDB\Driver\Manager::executeBulkWrite — Ejecuta una o varias operaciones de escritura

### Descripción

final public **MongoDB\Driver\Manager::executeBulkWrite**([string](#language.types.string) $namespace, [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite) $bulk, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)

Ejecuta una o varias operaciones de escritura en el servidor primario.

Un [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite) puede ser construido con
una o varias operaciones de escritura de tipos variados (por ejemplo, actualizaciones, eliminaciones e inserciones). El controlador intentará enviar las
operaciones del mismo tipo al servidor en el menor número de solicitudes posible
para optimizar los intercambios.

El valor por omisión de la opción "writeConcern" será
deducido a partir de una transacción activa (indicada por la opción
"session"), seguida de la
[URI de conexión](#mongodb-driver-manager.construct-uri).

### Parámetros

namespace ([string](#language.types.string))

        Un espacio de nombres completamente calificado (ej. "databaseName.collectionName")

bulk ([MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite))

        Escritura(s) a ejecutar.







    options





       <caption>**options**</caption>



          Option
          Type
          Description







session
[MongoDB\Driver\Session](#class.mongodb-driver-session)

        Una sesión a asociar a la operación.









writeConcern
[MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

        Una preocupación de escritura a aplicar a la operación.













### Valores devueltos

Retorna un [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult) en caso de éxito.

### Errores/Excepciones

- Lanza una [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si bulk no contiene ninguna operación de escritura.

- Lanza una [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si bulk ya ha sido ejecutado. Los objetos [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite) no pueden ser ejecutados varias veces.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si la opción "session" se utiliza junto con una preocupación de escritura no reconocida.

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una excepción **MongoDB\Driver\BulkWriteException** en caso de error de una operación de escritura (un error WriteError y WriteConcern)

    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otros errores.

    ### Historial de cambios

         Versión
         Descripción






         PECL mongodb 2.0.0

          El parámetro options ya no acepta
          una instancia de [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern).




         PECL mongodb 1.21.0

          Pasar un objeto [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern) como
          options está obsoleto y será eliminado en la versión 2.0.




         PECL mongodb 1.4.4

          Se lanzará una [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception)
          si la opción "session" se utiliza en combinación con un
          "writeConcern" no-acknowledged.




         PECL mongodb 1.4.0

          El tercer parámetro es ahora un array de options.
          Por razones de compatibilidad ascendente, este parámetro siempre aceptará
          un objeto [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern).




         PECL mongodb 1.3.0

          Se lanza una [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception)
          si bulk no contiene ninguna operación de escritura. Anteriormente,
          se lanzaba una [MongoDB\Driver\Exception\BulkWriteException](#class.mongodb-driver-exception-bulkwriteexception).


    ### Ejemplos

    **Ejemplo #1 Ejemplo de MongoDB\Driver\Manager::executeBulkWrite()**

&lt;?php

$bulk = new MongoDB\Driver\BulkWrite();

$bulk-&gt;insert(['_id' =&gt; 1, 'x' =&gt; 1]);
$bulk-&gt;insert(['_id' =&gt; 2, 'x' =&gt; 2]);

$bulk-&gt;update(['x' =&gt; 2], ['$set' =&gt; ['x' =&gt; 1]], ['multi' =&gt; false, 'upsert' =&gt; false]);
$bulk-&gt;update(['x' =&gt; 3], ['$set' =&gt; ['x' =&gt; 3]], ['multi' =&gt; false, 'upsert' =&gt; true]);
$bulk-&gt;update(['_id' =&gt; 3], ['$set' =&gt; ['x' =&gt; 3]], ['multi' =&gt; false, 'upsert' =&gt; true]);

$bulk-&gt;insert(['_id' =&gt; 4, 'x' =&gt; 2]);

$bulk-&gt;delete(['x' =&gt; 1], ['limit' =&gt; 1]);

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 100);
$result = $manager-&gt;executeBulkWrite('db.collection', $bulk, ['writeConcern' =&gt; $writeConcern]);

printf("Inserted %d document(s)\n", $result-&gt;getInsertedCount());
printf("Matched %d document(s)\n", $result-&gt;getMatchedCount());
printf("Updated %d document(s)\n", $result-&gt;getModifiedCount());
printf("Upserted %d document(s)\n", $result-&gt;getUpsertedCount());
printf("Deleted %d document(s)\n", $result-&gt;getDeletedCount());

foreach ($result-&gt;getUpsertedIds() as $index =&gt; $id) {
    printf('upsertedId[%d]: ', $index);
    var_dump($id);
}

/_ Si el WriteConcern no ha podido ser satisfecho _/
if ($writeConcernError = $result-&gt;getWriteConcernError()) {
    printf("%s (%d): %s\n", $writeConcernError-&gt;getMessage(), $writeConcernError-&gt;getCode(), var_export($writeConcernError-&gt;getInfo(), true));
}

/_ Si una escritura no ha podido hacerse en absoluto _/
foreach ($result-&gt;getWriteErrors() as $writeError) {
printf("Operation#%d: %s (%d)\n", $writeError-&gt;getIndex(), $writeError-&gt;getMessage(), $writeError-&gt;getCode());
}
?&gt;

Resultado del ejemplo anterior es similar a:

Inserted 3 document(s)
Matched 1 document(s)
Updated 1 document(s)
Upserted 2 document(s)
Deleted 1 document(s)
upsertedId[3]: object(MongoDB\BSON\ObjectId)#5 (1) {
["oid"]=&gt;
string(24) "54d3adc3ce7a792f4d703756"
}
upsertedId[4]: int(3)

### Ver también

- [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite)

- [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)

- [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

- [MongoDB\Driver\Server::executeBulkWrite()](#mongodb-driver-server.executebulkwrite) - Ejecuta una o varias operaciones de escritura en este servidor

# MongoDB\Driver\Manager::executeBulkWriteCommand

(mongodb &gt;=2.1.0)

MongoDB\Driver\Manager::executeBulkWriteCommand — Ejecuta operaciones de escritura utilizando el comando bulkWrite

### Descripción

final public **MongoDB\Driver\Manager::executeBulkWriteCommand**([MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand) $bulk, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)

Ejecuta una o varias operaciones de escritura en el servidor primario utilizando el
comando [» bulkWrite](https://www.mongodb.com/docs/manual/reference/command/bulkWrite)
introducido en MongoDB 8.0.

Una [MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand) puede ser construida
con una o varias operaciones de escritura de tipos variados (por ejemplo, inserciones,
actualizaciones y eliminaciones). Cada operación de escritura puede apuntar a una colección diferente.

El valor por omisión para la opción "writeConcern" será
deducido de una transacción activa (indicada por la opción
"session"), seguida por
[la URI de conexión](#mongodb-driver-manager.construct-uri).

### Parámetros

    bulk ([MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand))


      Escritura(s) a ejecutar.







    options





       <caption>**options**</caption>



          Opción
          Tipo
          Descripción







session
[MongoDB\Driver\Session](#class.mongodb-driver-session)

        Una sesión a asociar a la operación.









writeConcern
[MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

        Una preocupación de escritura a aplicar a la operación.













### Valores devueltos

Retorna un [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult) en caso de éxito.

### Errores/Excepciones

- Lanza una [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si bulk no contiene operaciones de escritura válidas.

- Lanza una [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si bulk ya ha sido ejecutada. Los objetos [MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand) no pueden ser ejecutados múltiples veces.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si la opción "session" se utiliza junto con una preocupación de escritura no reconocida.

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una excepción [MongoDB\Driver\Exception\BulkWriteCommandException](#class.mongodb-driver-exception-bulkwritecommandexception) en caso de error de escritura (por ejemplo, fallo de comando, error de escritura o preocupación de escritura)

    - Lanza [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otro error.

    ### Ejemplos

    **Ejemplo #1 Operaciones de escritura mixtas**

    Las operaciones de escritura mixtas (por ejemplo, inserción, actualización y eliminación) serán enviadas
    al servidor utilizando una sola
    comando
    [» bulkWrite](https://www.mongodb.com/docs/manual/reference/command/bulkWrite)

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;

// Elimina documentos de dos colecciones
$bulk-&gt;deleteMany('db.coll_one', []);
$bulk-&gt;deleteMany('db.coll_two', []);

// Añade documentos a dos colecciones
$bulk-&gt;insertOne('db.coll_one', ['_id' =&gt; 1]);
$bulk-&gt;insertOne('db.coll_two', ['_id' =&gt; 2]);
$bulk-&gt;insertOne('db.coll_two', ['_id' =&gt; 3]);

// Actualiza un documento en "coll_one"
$bulk-&gt;updateOne('db.coll_one', ['_id' =&gt; 1], ['$set' =&gt; ['x' =&gt; 1]]);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

printf("Insertados %d documento(s)\n", $result-&gt;getInsertedCount());
printf("Actualizados %d documento(s)\n", $result-&gt;getModifiedCount());

?&gt;

El ejemplo anterior mostrará:

Insertados 3 documento(s)
Actualizados 1 documento(s)

**Ejemplo #2 Operación de escritura ordenada que provoca un error**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;

$bulk-&gt;deleteMany('db.coll', []);
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 1]);
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 2]);
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 1]);
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 3]);

try {
$result = $manager-&gt;executeBulkWriteCommand($bulk);
} catch (MongoDB\Driver\Exception\BulkWriteCommandException $e) {
$result = $e-&gt;getPartialResult();

    var_dump($e-&gt;getWriteErrors());

}

printf("Insertados %d documento(s)\n", $result-&gt;getInsertedCount());

?&gt;

Resultado del ejemplo anterior es similar a:

array(1) {
[3]=&gt;
object(MongoDB\Driver\WriteError)#5 (4) {
["message"]=&gt;
string(78) "E11000 duplicate key error collection: db.coll index: _id_ dup key: { \_id: 1 }"
["code"]=&gt;
int(11000)
["index"]=&gt;
int(3)
["info"]=&gt;
object(stdClass)#6 (0) {
}
}
}
Insertados 2 documento(s)

### Ver también

- [MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand)

- [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)

- [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

- [MongoDB\Driver\Server::executeBulkWriteCommand()](#mongodb-driver-server.executebulkwritecommand) - Ejecuta operaciones de escritura en este servidor utilizando el comando bulkWrite

# MongoDB\Driver\Manager::executeCommand

(mongodb &gt;=1.0.0)

MongoDB\Driver\Manager::executeCommand — Ejecuta un comando de base de datos

### Descripción

final public **MongoDB\Driver\Manager::executeCommand**([string](#language.types.string) $db, [MongoDB\Driver\Command](#class.mongodb-driver-command) $command, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

Selecciona un servidor en función de la opción "readPreference"
y ejecuta el comando en ese servidor.

Este método no aplica ninguna lógica especial al comando. Los valores
por defecto de las opciones "readPreference",
"readConcern" y "writeConcern" serán
deducidos a partir de una transacción activa (indicada por la opción
"session"). Si no hay una transacción activa, se utilizará
una preferencia de lectura primaria para la selección del servidor.

Los valores por defecto no serán _no_ deducidos a partir de
la [URI de conexión](#mongodb-driver-manager.construct-uri).
Por lo tanto, se recomienda a los usuarios utilizar métodos de comando de lectura
y/o escritura específicos si es posible.

### Parámetros

db ([string](#language.types.string))

        El nombre de la base de datos sobre la cual se ejecutará el comando.

command ([MongoDB\Driver\Command](#class.mongodb-driver-command))

        El comando a ejecutar.







    options





       <caption>**options**</caption>



          Option
          Type
          Description







readConcern
[MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern)

        Una preocupación de lectura a aplicar a la operación.




        Esta opción está disponible en MongoDB 3.2+ y se traducirá en
        una excepción en el momento de la ejecución si se especifica para
        una versión más antigua del servidor.









readPreference
[MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference)

        Una preferencia de lectura a utilizar para seleccionar un servidor
        para la operación.









session
[MongoDB\Driver\Session](#class.mongodb-driver-session)

        Una sesión a asociar a la operación.









writeConcern
[MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

        Una preocupación de escritura a aplicar a la operación.














**Advertencia**

    Si se utiliza una "session" que tiene una transacción
    en curso, no se puede especificar la opción "readConcern"
    o "writeConcern". Intentar hacer esto lanzará una excepción
    [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception).
    En su lugar, debe definir estas opciones cuando se crea la transacción con
    [MongoDB\Driver\Session::startTransaction()](#mongodb-driver-session.starttransaction).

### Valores devueltos

Retorna un [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor) en caso de éxito.

### Errores/Excepciones

- Throws [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) if the "session" option is used with an associated transaction in combination with a "readConcern" or "writeConcern" option.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si la opción "session" se utiliza junto con una preocupación de escritura no reconocida.

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en otros errores (por ejemplo: comando inválido, entrega de un comando de escritura a un secundario).

    ### Historial de cambios

         Versión
         Descripción






         PECL mongodb 2.0.0

          El parámetro options ya no acepta
          una instancia de [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference).




         PECL mongodb 1.21.0

          Pasar un objeto [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference) como
          options está obsoleto y será eliminado en la 2.0.




         PECL mongodb 1.4.4

          Se lanzará una [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception)
          si la opción "session" se utiliza en combinación con una
          preferencia de escritura no reconocida.




         PECL mongodb 1.4.0

          Este tercer parámetro es ahora un array de options.
          Por razones de compatibilidad ascendente, este parámetro siempre aceptará
          un objeto [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference).


    ### Ejemplos

    **Ejemplo #1 MongoDB\Driver\Manager::executeCommand()** con un comando que devuelve un solo documento de resultado

&lt;?php

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
$command = new MongoDB\Driver\Command(['ping' =&gt; 1]);

try {
$cursor = $manager-&gt;executeCommand('admin', $command);
} catch(MongoDB\Driver\Exception $e) {
echo $e-&gt;getMessage(), "\n";
exit;
}

/\* El comando ping devuelve un solo documento de resultado, por lo que

- se debe acceder al primer resultado en el cursor. \*/
  $response = $cursor-&gt;toArray()[0];

var_dump($response);

?&gt;

El ejemplo anterior mostrará:

array(1) {
["ok"]=&gt;
float(1)
}

**Ejemplo #2 MongoDB\Driver\Manager::executeCommand()** con un comando que devuelve un cursor

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1, 'y' =&gt; 'foo']);
$bulk-&gt;insert(['x' =&gt; 2, 'y' =&gt; 'bar']);
$bulk-&gt;insert(['x' =&gt; 3, 'y' =&gt; 'bar']);
$manager-&gt;executeBulkWrite('db.collection', $bulk);

$command = new MongoDB\Driver\Command([
    'aggregate' =&gt; 'collection',
    'pipeline' =&gt; [
        ['$group' =&gt; ['\_id' =&gt; '$y', 'sum' =&gt; ['$sum' =&gt; '$x']]],
    ],
    'cursor' =&gt; new stdClass,
]);
$cursor = $manager-&gt;executeCommand('db', $command);

/\* El comando de agregación puede eventualmente devolver sus resultados en

- un cursor en lugar de un solo documento de resultado. En este caso, se puede
- iterar directamente sobre el cursor para acceder a estos resultados. \*/
  foreach ($cursor as $document) {
    var_dump($document);
  }

?&gt;

El ejemplo anterior mostrará:

object(stdClass)#6 (2) {
["_id"]=&gt;
string(3) "bar"
["sum"]=&gt;
int(10)
}
object(stdClass)#7 (2) {
["_id"]=&gt;
string(3) "foo"
["sum"]=&gt;
int(2)
}

**Ejemplo #3 Limitar el tiempo de ejecución de un comando**

    El tiempo de ejecución de un comando puede ser limitado especificando un valor para
    "maxTimeMS" en el documento [MongoDB\Driver\Command](#class.mongodb-driver-command).
    Tenga en cuenta que este límite de tiempo se aplica en el lado del servidor y no tiene en cuenta
    la latencia de la red. Ver [» Terminar las operaciones en curso
    ](https://www.mongodb.com/docs/manual/tutorial/terminate-running-operations/#maxtimems) en el manual de MongoDB para más información.

&lt;?php

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');

$command = new MongoDB\Driver\Command([
    'count' =&gt; 'collection',
    'query' =&gt; ['x' =&gt; ['$gt' =&gt; 1]],
'maxTimeMS' =&gt; 1000,
]);

$cursor = $manager-&gt;executeCommand('db', $command);

var_dump($cursor-&gt;toArray()[0]);

?&gt;

    Si el comando no logra completarse después de un segundo de ejecución en el servidor,
    se lanzará una [MongoDB\Driver\Exception\ExecutionTimeoutException](#class.mongodb-driver-exception-executiontimeoutexception).

### Notas

**Nota**:

    Si se utiliza una segunda readPreference, es responsabilidad del llamante
    asegurarse de que el comando pueda ser ejecutado en un secundario. No se realiza
    ninguna validación por parte del controlador.

**Nota**:

    Este método no utiliza por defecto la preferencia de lectura de la
    [URI de conexión MongoDB](#mongodb-driver-manager.construct-uri).
    Las aplicaciones que lo necesiten deberían considerar el uso de
    [MongoDB\Driver\Manager::executeReadCommand()](#mongodb-driver-manager.executereadcommand).

### Ver también

- [MongoDB\Driver\Command](#class.mongodb-driver-command)

- [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

- [MongoDB\Driver\Manager::executeReadCommand()](#mongodb-driver-manager.executereadcommand) - Ejecuta un comando de base de datos que lee

- [MongoDB\Driver\Manager::executeReadWriteCommand()](#mongodb-driver-manager.executereadwritecommand) - Ejecuta un comando de base de datos que lee y escribe

- [MongoDB\Driver\Manager::executeWriteCommand()](#mongodb-driver-manager.executewritecommand) - Ejecuta un comando de base de datos que escribe

- [MongoDB\Driver\Server::executeCommand()](#mongodb-driver-server.executecommand) - Ejecuta un comando de base de datos en este servidor

# MongoDB\Driver\Manager::executeQuery

(mongodb &gt;=1.0.0)

MongoDB\Driver\Manager::executeQuery — Ejecuta una consulta de base de datos

### Descripción

final public **MongoDB\Driver\Manager::executeQuery**([string](#language.types.string) $namespace, [MongoDB\Driver\Query](#class.mongodb-driver-query) $query, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

Selecciona un servidor en función de la opción "readPreference"
y ejecuta la consulta en ese servidor.

Los valores por omisión de la opción "readPreference" y de
la opción "readConcern" de la consulta serán deducidos a
partir de una transacción activa (indicada por la opción "session"),
seguida de la [URI de conexión](#mongodb-driver-manager.construct-uri).

### Parámetros

namespace ([string](#language.types.string))

        Un espacio de nombres completamente calificado (ej. "databaseName.collectionName")

query ([MongoDB\Driver\Query](#class.mongodb-driver-query))

        La consulta a ejecutar.







    options





       <caption>**options**</caption>



          Option
          Type
          Description







readPreference
[MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference)

        Una preferencia de lectura a utilizar para seleccionar un servidor
        para la operación.









session
[MongoDB\Driver\Session](#class.mongodb-driver-session)

        Una sesión a asociar a la operación.













### Valores devueltos

Retorna un [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor) en caso de éxito.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otro error (por ejemplo: operadores de consulta inválidos).

    ### Historial de cambios

         Versión
         Descripción






         PECL mongodb 2.0.0

          El parámetro options ya no acepta
          una instancia de [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference).




         PECL mongodb 1.21.0

          Pasar un objeto [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference) como
          options está obsoleto y será eliminado en la 2.0.




         PECL mongodb 1.4.0

          El tercer parámetro es ahora un array options.
          Por razones de compatibilidad ascendente, este parámetro siempre aceptará un
          objeto [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference).


    ### Ejemplos

    **Ejemplo #1 Ejemplo de MongoDB\Driver\Manager::executeQuery()**

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);
$bulk-&gt;insert(['x' =&gt; 2]);
$bulk-&gt;insert(['x' =&gt; 3]);
$manager-&gt;executeBulkWrite('db.collection', $bulk);

$filter = ['x' =&gt; ['$gt' =&gt; 1]];
$options = [
'projection' =&gt; ['_id' =&gt; 0],
'sort' =&gt; ['x' =&gt; -1],
];

$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager-&gt;executeQuery('db.collection', $query);

foreach ($cursor as $document) {
    var_dump($document);
}

?&gt;

El ejemplo anterior mostrará:

object(stdClass)#6 (1) {
["x"]=&gt;
int(3)
}
object(stdClass)#7 (1) {
["x"]=&gt;
int(2)
}

**Ejemplo #2 Limitar el tiempo de ejecución de una consulta**

    La opción "maxTimeMS" de la clase
    [MongoDB\Driver\Query](#class.mongodb-driver-query) puede ser utilizada para limitar
    el tiempo de ejecución de una consulta. Tenga en cuenta que este límite de tiempo es
    aplicado en el lado del servidor y no tiene en cuenta la latencia de la red. Ver
    [» Terminar las operaciones en curso
    ](https://www.mongodb.com/docs/manual/tutorial/terminate-running-operations/#maxtimems) en el manual de MongoDB para más información.

&lt;?php

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');

$filter = ['x' =&gt; ['$gt' =&gt; 1]];
$options = [
'maxTimeMS' =&gt; 1000,
];

$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager-&gt;executeQuery('db.collection', $query);

foreach ($cursor as $document) {
    var_dump($document);
}

?&gt;

    Si la consulta no logra terminar después de un segundo de ejecución
    en el servidor, una
    [MongoDB\Driver\Exception\ExecutionTimeoutException](#class.mongodb-driver-exception-executiontimeoutexception)
    será lanzada.

### Ver también

- [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

- [MongoDB\Driver\Query](#class.mongodb-driver-query)

- [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference)

- [MongoDB\Driver\Server::executeQuery()](#mongodb-driver-server.executequery) - Ejecuta una consulta de base de datos en este servidor

# MongoDB\Driver\Manager::executeReadCommand

(mongodb &gt;=1.4.0)

MongoDB\Driver\Manager::executeReadCommand — Ejecuta un comando de base de datos que lee

### Descripción

final public **MongoDB\Driver\Manager::executeReadCommand**([string](#language.types.string) $db, [MongoDB\Driver\Command](#class.mongodb-driver-command) $command, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

Selecciona un servidor en función de la opción "readPreference"
y ejecuta el comando en este servidor.

Este método aplicará una lógica específica a los comandos que leen (por ejemplo
[» distinct](https://www.mongodb.com/docs/manual/reference/command/distinct/)).
Los valores por omisión de las opciones "readPreference" y
"readConcern" serán deducidos a partir de una transacción activa
(indicada por la opción "session"), seguida de la
[URI de conexión](#mongodb-driver-manager.construct-uri).

### Parámetros

db ([string](#language.types.string))

        El nombre de la base de datos sobre la cual se ejecutará el comando.

command ([MongoDB\Driver\Command](#class.mongodb-driver-command))

        El comando a ejecutar.







    options





       <caption>**options**</caption>



          Option
          Type
          Description







readConcern
[MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern)

        Una preocupación de lectura a aplicar a la operación.




        Esta opción está disponible en MongoDB 3.2+ y se traducirá en
        una excepción en el momento de la ejecución si se especifica para
        una versión más antigua del servidor.









readPreference
[MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference)

        Una preferencia de lectura a utilizar para seleccionar un servidor
        para la operación.









session
[MongoDB\Driver\Session](#class.mongodb-driver-session)

        Una sesión a asociar a la operación.














**Advertencia**

    Si se utiliza una "session" que tiene una transacción
    en curso, no se puede especificar la opción "readConcern"
    o "writeConcern". Intentar hacer esto lanzará una excepción
    [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception).
    En su lugar, debe definir estas opciones cuando se crea la transacción con
    [MongoDB\Driver\Session::startTransaction()](#mongodb-driver-session.starttransaction).

### Valores devueltos

Retorna un [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor) en caso de éxito.

### Errores/Excepciones

- Throws [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) if the "session" option is used with an associated transaction in combination with a "readConcern" or "writeConcern" option.

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otros errores (por ejemplo: comando inválido).

    ### Ver también
    - [MongoDB\Driver\Command](#class.mongodb-driver-command)

    - [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

    - [MongoDB\Driver\Manager::executeCommand()](#mongodb-driver-manager.executecommand) - Ejecuta un comando de base de datos

    - [MongoDB\Driver\Manager::executeReadWriteCommand()](#mongodb-driver-manager.executereadwritecommand) - Ejecuta un comando de base de datos que lee y escribe

    - [MongoDB\Driver\Manager::executeWriteCommand()](#mongodb-driver-manager.executewritecommand) - Ejecuta un comando de base de datos que escribe

    - [MongoDB\Driver\Server::executeReadCommand()](#mongodb-driver-server.executereadcommand) - Ejecuta un comando de base de datos que lee en este servidor

    # MongoDB\Driver\Manager::executeReadWriteCommand

    (mongodb &gt;=1.4.0)

MongoDB\Driver\Manager::executeReadWriteCommand — Ejecuta un comando de base de datos que lee y escribe

### Descripción

final public **MongoDB\Driver\Manager::executeReadWriteCommand**([string](#language.types.string) $db, [MongoDB\Driver\Command](#class.mongodb-driver-command) $command, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

Ejecuta un comando en el servidor primario.

Este método aplicará una lógica específica a los comandos que leen y escriben
(por ejemplo [» aggregate](https://www.mongodb.com/docs/manual/reference/command/aggregate/)).
Los valores por omisión de las opciones "readConcern" y
"writeConcern" serán deducidos a partir de una transacción activa
(indicada por la opción "session"), seguida de la
[URI de conexión](#mongodb-driver-manager.construct-uri).

### Parámetros

db ([string](#language.types.string))

        El nombre de la base de datos sobre la cual se ejecutará el comando.

command ([MongoDB\Driver\Command](#class.mongodb-driver-command))

        El comando a ejecutar.







    options





       <caption>**options**</caption>



          Option
          Type
          Description







readConcern
[MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern)

        Una preocupación de lectura a aplicar a la operación.




        Esta opción está disponible en MongoDB 3.2+ y se traducirá en
        una excepción en el momento de la ejecución si se especifica para
        una versión más antigua del servidor.









session
[MongoDB\Driver\Session](#class.mongodb-driver-session)

        Una sesión a asociar a la operación.









writeConcern
[MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

        Una preocupación de escritura a aplicar a la operación.














**Advertencia**

    Si se utiliza una "session" que tiene una transacción
    en curso, no se puede especificar la opción "readConcern"
    o "writeConcern". Intentar hacer esto lanzará una excepción
    [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception).
    En su lugar, debe definir estas opciones cuando se crea la transacción con
    [MongoDB\Driver\Session::startTransaction()](#mongodb-driver-session.starttransaction).

### Valores devueltos

Retorna un [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor) en caso de éxito.

### Errores/Excepciones

- Throws [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) if the "session" option is used with an associated transaction in combination with a "readConcern" or "writeConcern" option.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si la opción "session" se utiliza junto con una preocupación de escritura no reconocida.

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otros errores (por ejemplo: comando inválido).

    ### Historial de cambios

         Versión
         Descripción






         PECL mongodb 1.4.4

          Una [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception)
          será lanzada si la opción "session" es utilizada en
          combinación con un criterio de lectura o escritura no reconocido.


    ### Ver también
    - [MongoDB\Driver\Command](#class.mongodb-driver-command)

    - [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

    - [MongoDB\Driver\Manager::executeCommand()](#mongodb-driver-manager.executecommand) - Ejecuta un comando de base de datos

    - [MongoDB\Driver\Manager::executeReadCommand()](#mongodb-driver-manager.executereadcommand) - Ejecuta un comando de base de datos que lee

    - [MongoDB\Driver\Manager::executeWriteCommand()](#mongodb-driver-manager.executewritecommand) - Ejecuta un comando de base de datos que escribe

    - [MongoDB\Driver\Server::executeReadWriteCommand()](#mongodb-driver-server.executereadwritecommand) - Ejecuta un comando de base de datos que lee y escribe en este servidor

    # MongoDB\Driver\Manager::executeWriteCommand

    (mongodb &gt;=1.4.0)

MongoDB\Driver\Manager::executeWriteCommand — Ejecuta un comando de base de datos que escribe

### Descripción

final public **MongoDB\Driver\Manager::executeWriteCommand**([string](#language.types.string) $db, [MongoDB\Driver\Command](#class.mongodb-driver-command) $command, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

Ejecuta el comando en el servidor primario.

Este método aplicará una lógica específica a los comandos que escriben (por ejemplo
[» drop](https://www.mongodb.com/docs/manual/reference/command/drop/)).
Los valores por omisión de la opción "writeConcern" serán deducidos a
partir de una transacción activa (indicada por la opción "session"), seguida de
la [URI de conexión](#mongodb-driver-manager.construct-uri).

**Nota**:

    Este método no está destinado a ser utilizado para ejecutar
    [» insert](https://www.mongodb.com/docs/manual/reference/command/insert/),
    [» update](https://www.mongodb.com/docs/manual/reference/command/update/),
    o [» delete](https://www.mongodb.com/docs/manual/reference/command/delete/).
    Se recomienda a los usuarios utilizar
    [MongoDB\Driver\Manager::executeBulkWrite()](#mongodb-driver-manager.executebulkwrite) para estas
    operaciones.

### Parámetros

db ([string](#language.types.string))

        El nombre de la base de datos sobre la cual se ejecutará el comando.

command ([MongoDB\Driver\Command](#class.mongodb-driver-command))

        El comando a ejecutar.







    options





       <caption>**options**</caption>



          Option
          Type
          Description







session
[MongoDB\Driver\Session](#class.mongodb-driver-session)

        Una sesión a asociar a la operación.









writeConcern
[MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

        Una preocupación de escritura a aplicar a la operación.














**Advertencia**

    Si se utiliza una "session" que tiene una transacción
    en curso, no se puede especificar la opción "readConcern"
    o "writeConcern". Intentar hacer esto lanzará una excepción
    [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception).
    En su lugar, debe definir estas opciones cuando se crea la transacción con
    [MongoDB\Driver\Session::startTransaction()](#mongodb-driver-session.starttransaction).

### Valores devueltos

Retorna un [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor) en caso de éxito.

### Errores/Excepciones

- Throws [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) if the "session" option is used with an associated transaction in combination with a "readConcern" or "writeConcern" option.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si la opción "session" se utiliza junto con una preocupación de escritura no reconocida.

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otros errores (por ejemplo: comando inválido).

    ### Historial de cambios

         Versión
         Descripción






         PECL mongodb 1.4.4

          Una [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception)
          será lanzada si la opción "session" es utilizada en
          combinación con un "writeConcern" no reconocido.


    ### Ver también
    - [MongoDB\Driver\Command](#class.mongodb-driver-command)

    - [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

    - [MongoDB\Driver\Manager::executeCommand()](#mongodb-driver-manager.executecommand) - Ejecuta un comando de base de datos

    - [MongoDB\Driver\Manager::executeReadCommand()](#mongodb-driver-manager.executereadcommand) - Ejecuta un comando de base de datos que lee

    - [MongoDB\Driver\Manager::executeReadWriteCommand()](#mongodb-driver-manager.executereadwritecommand) - Ejecuta un comando de base de datos que lee y escribe

    - [MongoDB\Driver\Server::executeWriteCommand()](#mongodb-driver-server.executewritecommand) - Ejecuta un comando de base de datos que escribe en este servidor

    # MongoDB\Driver\Manager::getEncryptedFieldsMap

    (mongodb &gt;=1.14.0)

MongoDB\Driver\Manager::getEncryptedFieldsMap — Devuelve la opción de cifrado automático encryptedFieldsMap para el Manager

### Descripción

final public **MongoDB\Driver\Manager::getEncryptedFieldsMap**(): [array](#language.types.array)|[object](#language.types.object)|[null](#language.types.null)

Devuelve la opción de cifrado automático encryptedFieldsMap
para el Manager, si se ha especificado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La opción de cifrado automático encryptedFieldsMap para el
Manager, o **[null](#constant.null)** si no se ha especificado.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Manager::\_\_construct()](#mongodb-driver-manager.construct) - Crea un nuevo Manager MongoDB

# MongoDB\Driver\Manager::getReadConcern

(mongodb &gt;=1.1.0)

MongoDB\Driver\Manager::getReadConcern — Devuelve el ReadConcern para el Manager

### Descripción

final public **MongoDB\Driver\Manager::getReadConcern**(): [MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern)

Devuelve el [MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern) para el
Manager, que se deriva de sus opciones URI. Es el ReadConcern por omisión
para las peticiones y comandos ejecutados en el Manager.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El [MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern) para el Manager.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo MongoDB\Driver\Manager::getReadConcern()**

&lt;?php

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
var_dump($manager-&gt;getReadConcern());

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017/?readConcernLevel=local');
var_dump($manager-&gt;getReadConcern());

?&gt;

Resultado del ejemplo anterior es similar a:

object(MongoDB\Driver\ReadConcern)#2 (0) {
}
object(MongoDB\Driver\ReadConcern)#1 (1) {
["level"]=&gt;
string(5) "local"
}

### Ver también

- [MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern)

- [MongoDB\Driver\Manager::\_\_construct()](#mongodb-driver-manager.construct) - Crea un nuevo Manager MongoDB

# MongoDB\Driver\Manager::getReadPreference

(mongodb &gt;=1.0.0)

MongoDB\Driver\Manager::getReadPreference — Devuelve el ReadPreference para el Manager

### Descripción

final public **MongoDB\Driver\Manager::getReadPreference**(): [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference)

Devuelve el [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference) para el
Manager, que se deriva de sus opciones URI. Es el ReadPreference por omisión
para las peticiones y comandos ejecutados en el Manager.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference) para el Manager.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\Manager::getReadPreference()**

&lt;?php

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
var_dump($manager-&gt;getReadPreference());

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017/?readPreference=secondaryPreferred&amp;readPreferenceTags=dc:ny,rack:1&amp;readPreferenceTags=dc:ny&amp;readPreferenceTags=');
var_dump($manager-&gt;getReadPreference());

?&gt;

Resultado del ejemplo anterior es similar a:

object(MongoDB\Driver\ReadPreference)#2 (1) {
["mode"]=&gt;
string(7) "primary"
}
object(MongoDB\Driver\ReadPreference)#1 (2) {
["mode"]=&gt;
string(18) "secondaryPreferred"
["tags"]=&gt;
array(3) {
[0]=&gt;
object(stdClass)#3 (2) {
["dc"]=&gt;
string(2) "ny"
["rack"]=&gt;
string(1) "1"
}
[1]=&gt;
object(stdClass)#4 (1) {
["dc"]=&gt;
string(2) "ny"
}
[2]=&gt;
object(stdClass)#5 (0) {
}
}
}

### Ver también

- [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference)

- [MongoDB\Driver\Manager::\_\_construct()](#mongodb-driver-manager.construct) - Crea un nuevo Manager MongoDB

# MongoDB\Driver\Manager::getServers

(mongodb &gt;=1.0.0)

MongoDB\Driver\Manager::getServers — Devolver los servidores a los que está conectado este gestor

### Descripción

final public **MongoDB\Driver\Manager::getServers**(): [array](#language.types.array)

Devuelve un [array](#language.types.array) de instancias [MongoDB\Driver\Server](#class.mongodb-driver-server) a las que está conectado este gestor.

**Nota**:

    Dado que el controlador se conecta perezosamente a la base de datos, este método puede devolver un [array](#language.types.array) vacío si se llama antes de ejecutar una operación en el [MongoDB\Driver\Manager](#class.mongodb-driver-manager).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [array](#language.types.array) de instancias [MongoDB\Driver\Server](#class.mongodb-driver-server) a las que está conectado este gestor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\Manager::getServers()**

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

/\* El controlador se conecta al servidor de la base de datos de manera perezosa, por lo que Manager::getServers()

- puede devolver inicialmente un array vacío. \*/
  var_dump($manager-&gt;getServers());

$command = new MongoDB\Driver\Command(['ping' =&gt; 1]);
$manager-&gt;executeCommand('db', $command);

var_dump($manager-&gt;getServers());

?&gt;

Resultado del ejemplo anterior es similar a:

array(0) {
}
array(1) {
[0]=&gt;
object(MongoDB\Driver\Server)#3 (10) {
["host"]=&gt;
string(9) "localhost"
["port"]=&gt;
int(27017)
["type"]=&gt;
int(1)
["is_primary"]=&gt;
bool(false)
["is_secondary"]=&gt;
bool(false)
["is_arbiter"]=&gt;
bool(false)
["is_hidden"]=&gt;
bool(false)
["is_passive"]=&gt;
bool(false)
["last_hello_response"]=&gt;
array(8) {
["isWritablePrimary"]=&gt;
bool(true)
["maxBsonObjectSize"]=&gt;
int(16777216)
["maxMessageSizeBytes"]=&gt;
int(48000000)
["maxWriteBatchSize"]=&gt;
int(1000)
["localTime"]=&gt;
object(MongoDB\BSON\UTCDateTime)#4 (1) {
["milliseconds"]=&gt;
int(1447267964517)
}
["maxWireVersion"]=&gt;
int(3)
["minWireVersion"]=&gt;
int(0)
["ok"]=&gt;
float(1)
}
["round_trip_time"]=&gt;
int(554)
}
}

### Ver también

- [MongoDB\Driver\Server](#class.mongodb-driver-server)

- [MongoDB\Driver\Manager::selectServer()](#mongodb-driver-manager.selectserver) - Selecciona un servidor correspondiente a una preferencia de lectura

# MongoDB\Driver\Manager::getWriteConcern

(mongodb &gt;=1.0.0)

MongoDB\Driver\Manager::getWriteConcern — Devuelve el WriteConcern para el Manager

### Descripción

final public **MongoDB\Driver\Manager::getWriteConcern**(): [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

Devuelve el [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern) para el
Manager, que se deriva de sus opciones URI. Es el WriteConcern por omisión
para las escrituras y comandos ejecutados en el Manager.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern) para el Manager.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\Manager::getWriteConcern()**

&lt;?php

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
var_dump($manager-&gt;getWriteConcern());

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017/?w=majority&amp;wtimeoutMS=2000');
var_dump($manager-&gt;getWriteConcern());

?&gt;

Resultado del ejemplo anterior es similar a:

object(MongoDB\Driver\WriteConcern)#2 (0) {
}
object(MongoDB\Driver\WriteConcern)#1 (2) {
["w"]=&gt;
string(8) "majority"
["wtimeout"]=&gt;
int(2000)
}

### Ver también

- [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

- [MongoDB\Driver\Manager::\_\_construct()](#mongodb-driver-manager.construct) - Crea un nuevo Manager MongoDB

# MongoDB\Driver\Manager::removeSubscriber

(mongodb &gt;=1.10.0)

MongoDB\Driver\Manager::removeSubscriber — Elimina un observador de eventos de supervisión de este Manager

### Descripción

final public **MongoDB\Driver\Manager::removeSubscriber**([MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber) $subscriber): [void](language.types.void.html)

Elimina un observador de eventos de supervisión de este Manager.

**Nota**:

    Si subscriber no está ya registrado con este
    Manager, esta función no hace nada.

### Parámetros

    subscriber ([MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber))


      Un observador de eventos de supervisión a eliminar de este Manager.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Manager::addSubscriber()](#mongodb-driver-manager.addsubscriber) - Registra un observador de eventos de monitoreo con este manager

- [MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber)

- [MongoDB\Driver\Monitoring\CommandSubscriber](#class.mongodb-driver-monitoring-commandsubscriber)

- [MongoDB\Driver\Monitoring\removeSubscriber()](#function.mongodb.driver.monitoring.removesubscriber) - Elimina una suscripción de monitoreo de eventos global

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Manager::selectServer

(mongodb &gt;=1.0.0)

MongoDB\Driver\Manager::selectServer — Selecciona un servidor correspondiente a una preferencia de lectura

### Descripción

final public **MongoDB\Driver\Manager::selectServer**([?](#language.types.null)[MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference) $readPreference = **[null](#constant.null)**): [MongoDB\Driver\Server](#class.mongodb-driver-server)

Selecciona un [MongoDB\Driver\Server](#class.mongodb-driver-server) correspondiente a
readPreference. Si readPreference
es **[null](#constant.null)** o se omite, el servidor primario será seleccionado por omisión. Esto puede
ser utilizado para preseleccionar un servidor a fin de realizar una verificación
de versión antes de ejecutar una operación.

**Nota**:

    A diferencia de [MongoDB\Driver\Manager::getServers()](#mongodb-driver-manager.getservers), este
    método inicializará las conexiones de base de datos y realizará el descubrimiento de servidores si es necesario. Ver la
    [» Especificación de selección de servidor](https://github.com/mongodb/specifications/blob/master/source/server-selection/server-selection.md#single-threaded-server-selection)
    para más información.

### Parámetros

    readPreference ([MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference))


      Las preferencias de lectura a utilizar para seleccionar un servidor. Si
      **[null](#constant.null)** o se omite, el servidor primario será seleccionado por omisión.


### Valores devueltos

Devuelve un [MongoDB\Driver\Server](#class.mongodb-driver-server) correspondiente a la
preferencia de lectura.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) si un servidor correspondiente a la preferencia de lectura no ha podido ser encontrado.

    ### Historial de cambios

         Versión
         Descripción






         PECL mongodb 1.11.0

          El readPreference es ahora opcional. Si **[null](#constant.null)** o
          se omite, el servidor primario será seleccionado por omisión.


    ### Ver también
    - [MongoDB\Driver\Server](#class.mongodb-driver-server)

    - [MongoDB\Driver\Manager::getServers()](#mongodb-driver-manager.getservers) - Devolver los servidores a los que está conectado este gestor

    - [» Especificación de selección de servidor](https://github.com/mongodb/specifications/blob/master/source/server-selection/server-selection.md)

    # MongoDB\Driver\Manager::startSession

    (mongodb &gt;=1.4.0)

MongoDB\Driver\Manager::startSession — Inicia una nueva sesión de cliente para ser utilizada con este cliente

### Descripción

final public **MongoDB\Driver\Manager::startSession**([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Session](#class.mongodb-driver-session)

Crear una [MongoDB\Driver\Session](#class.mongodb-driver-session) para las opciones dadas.
La sesión puede luego ser especificada durante la ejecución de comandos, consultas
y operaciones de escritura.

**Nota**:

    Una [MongoDB\Driver\Session](#class.mongodb-driver-session) solo puede ser utilizada con el
    [MongoDB\Driver\Manager](#class.mongodb-driver-manager) desde el cual fue creada.

### Parámetros

    options





       <caption>**options**</caption>



          Option
          Type
          Description
          Default






          causalConsistency
          [bool](#language.types.boolean)


            Configura la coherencia causal en una sesión. Si **[true](#constant.true)**, cada operación
            en la sesión será ordenada de manera causal después de la operación de lectura
            o escritura previa. Definir a **[false](#constant.false)** para desactivar la coherencia causal.




            Ver
            [» Consistencia causal](https://www.mongodb.com/docs/manual/core/read-isolation-consistency-recency/#causal-consistency)
            en el manual de MongoDB para más información.




          **[true](#constant.true)**



          defaultTransactionOptions
          [array](#language.types.array)


            Las opciones por defecto a aplicar a las transacciones recién creadas. Estas
            opciones se utilizan a menos que sean reemplazadas cuando una transacción es
            iniciada con un valor diferente para cada opción.







             <caption>**options**</caption>



                Option
                Type
                Description







maxCommitTimeMS
integer

El tiempo máximo en milisegundos para permitir que una sola
comando commitTransaction se ejecute.

Si se especifica, maxCommitTimeMS debe ser un entero
32 bits con signo superior o igual a cero.

readConcern
[MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern)

        Una preocupación de lectura a aplicar a la operación.




        Esta opción está disponible en MongoDB 3.2+ y se traducirá en
        una excepción en el momento de la ejecución si se especifica para
        una versión más antigua del servidor.









readPreference
[MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference)

        Una preferencia de lectura a utilizar para seleccionar un servidor
        para la operación.









writeConcern
[MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

        Una preocupación de escritura a aplicar a la operación.













            Esta opción está disponible en MongoDB 4.0+.




          []



          snapshot
          [bool](#language.types.boolean)


            Configura las lecturas instantáneas en una sesión. Si **[true](#constant.true)**, un timestamp será
            obtenido de la primera operación de lectura soportada en la sesión
            (es decir, find, aggregate, o
            distinct no fragmentado). Las operaciones de lectura posteriores
            en la sesión utilizarán luego un nivel de coherencia de lectura "snapshot"
            para leer datos mayoritariamente comprometidos desde ese timestamp. Definir
            a **[false](#constant.false)** para desactivar las lecturas instantáneas.




            Las lecturas instantáneas requieren MongoDB 5.0+ y no pueden ser utilizadas
            con la coherencia causal, transacciones o operaciones de escritura. Si
            "snapshot" es **[true](#constant.true)**,
            "causalConsistency" será por defecto **[false](#constant.false)**.




            Ver
            [» Read Concern "instantáneas"](https://www.mongodb.com/docs/manual/reference/read-concern-snapshot/#read-concern-and-atclustertime)
            en el manual de MongoDB para más información.




          **[false](#constant.false)**








### Valores devueltos

Devuelve una [MongoDB\Driver\Session](#class.mongodb-driver-session).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si las opciones "causalConsistency" y "snapshot" son ambas **[true](#constant.true)**.

- Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) si la sesión no puede ser creada (por ejemplo, libmongoc no soporta el cifrado).

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.11.0


         La opción "snapshot" fue añadida.







       PECL mongodb 1.6.0


         La opción "maxCommitTimeMS" fue añadida a
         "defaultTransactionOptions".







       PECL mongodb 1.5.0


         La opción "defaultTransactionOptions" fue añadida.








### Ver también

- [MongoDB\Driver\Session](#class.mongodb-driver-session)

- [» Consistencia causal](https://www.mongodb.com/docs/manual/core/read-isolation-consistency-recency/#causal-consistency) en el manual de MongoDB

## Tabla de contenidos

- [MongoDB\Driver\Manager::addSubscriber](#mongodb-driver-manager.addsubscriber) — Registra un observador de eventos de monitoreo con este manager
- [MongoDB\Driver\Manager::\_\_construct](#mongodb-driver-manager.construct) — Crea un nuevo Manager MongoDB
- [MongoDB\Driver\Manager::createClientEncryption](#mongodb-driver-manager.createclientencryption) — Crear un nuevo objeto ClientEncryption
- [MongoDB\Driver\Manager::executeBulkWrite](#mongodb-driver-manager.executebulkwrite) — Ejecuta una o varias operaciones de escritura
- [MongoDB\Driver\Manager::executeBulkWriteCommand](#mongodb-driver-manager.executebulkwritecommand) — Ejecuta operaciones de escritura utilizando el comando bulkWrite
- [MongoDB\Driver\Manager::executeCommand](#mongodb-driver-manager.executecommand) — Ejecuta un comando de base de datos
- [MongoDB\Driver\Manager::executeQuery](#mongodb-driver-manager.executequery) — Ejecuta una consulta de base de datos
- [MongoDB\Driver\Manager::executeReadCommand](#mongodb-driver-manager.executereadcommand) — Ejecuta un comando de base de datos que lee
- [MongoDB\Driver\Manager::executeReadWriteCommand](#mongodb-driver-manager.executereadwritecommand) — Ejecuta un comando de base de datos que lee y escribe
- [MongoDB\Driver\Manager::executeWriteCommand](#mongodb-driver-manager.executewritecommand) — Ejecuta un comando de base de datos que escribe
- [MongoDB\Driver\Manager::getEncryptedFieldsMap](#mongodb-driver-manager.getencryptedfieldsmap) — Devuelve la opción de cifrado automático encryptedFieldsMap para el Manager
- [MongoDB\Driver\Manager::getReadConcern](#mongodb-driver-manager.getreadconcern) — Devuelve el ReadConcern para el Manager
- [MongoDB\Driver\Manager::getReadPreference](#mongodb-driver-manager.getreadpreference) — Devuelve el ReadPreference para el Manager
- [MongoDB\Driver\Manager::getServers](#mongodb-driver-manager.getservers) — Devolver los servidores a los que está conectado este gestor
- [MongoDB\Driver\Manager::getWriteConcern](#mongodb-driver-manager.getwriteconcern) — Devuelve el WriteConcern para el Manager
- [MongoDB\Driver\Manager::removeSubscriber](#mongodb-driver-manager.removesubscriber) — Elimina un observador de eventos de supervisión de este Manager
- [MongoDB\Driver\Manager::selectServer](#mongodb-driver-manager.selectserver) — Selecciona un servidor correspondiente a una preferencia de lectura
- [MongoDB\Driver\Manager::startSession](#mongodb-driver-manager.startsession) — Inicia una nueva sesión de cliente para ser utilizada con este cliente

# La clase MongoDB\Driver\Command

(mongodb &gt;=1.0.0)

## Introducción

    La clase **MongoDB\Driver\Command** es un objeto de valor
    que representa un comando de base de datos.




    Para proporcionar Command Helpers, el objeto **MongoDB\Driver\Command** debe ser compuesto.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Command**

     {


    /* Métodos */

final public [\_\_construct](#mongodb-driver-command.construct)([array](#language.types.array)|[object](#language.types.object) $document, [?](#language.types.null)[array](#language.types.array) $commandOptions = **[null](#constant.null)**)

}

## Ejemplos

    **Ejemplo #1 Compuesto MongoDB\Driver\Command** para proporcionar un asistente para crear colecciones

&lt;?php
class CreateCollection {
protected $cmd = array();

    function __construct($collectionName) {
        $this-&gt;cmd["create"] = (string) $collectionName;
    }
    function setCappedCollection($maxBytes, $maxDocuments = false) {
        $this-&gt;cmd["capped"] = true;
        $this-&gt;cmd["size"]   = (int) $maxBytes;

        if ($maxDocuments) {
            $this-&gt;cmd["max"] = (int) $maxDocuments;
        }
    }
    function usePowerOf2Sizes($bool) {
        if ($bool) {
            $this-&gt;cmd["flags"] = 1;
        } else {
            $this-&gt;cmd["flags"] = 0;
        }
    }
    function setFlags($flags) {
        $this-&gt;cmd["flags"] = (int) $flags;
    }
    function getCommand() {
        return new MongoDB\Driver\Command($this-&gt;cmd);
    }
    function getCollectionName() {
        return $this-&gt;cmd["create"];
    }

}

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$createCollection = new CreateCollection("cappedCollection");
$createCollection-&gt;setCappedCollection(64 \* 1024);

try {
$command = $createCollection-&gt;getCommand();
    $cursor = $manager-&gt;executeCommand("databaseName", $command);
    $response = $cursor-&gt;toArray()[0];
    var_dump($response);

    $collstats = ["collstats" =&gt; $createCollection-&gt;getCollectionName()];
    $cursor = $manager-&gt;executeCommand("databaseName", new MongoDB\Driver\Command($collstats));
    $response = $cursor-&gt;toArray()[0];
    var_dump($response);

} catch(MongoDB\Driver\Exception $e) {
echo $e-&gt;getMessage(), "\n";
exit;
}

?&gt;

El ejemplo anterior mostrará:

object(MongoDB\Driver\Command)#3 (1) {
["command"]=&gt;
array(3) {
["create"]=&gt;
string(16) "cappedCollection"
["capped"]=&gt;
bool(true)
["size"]=&gt;
int(65536)
}
}
array(1) {
["ok"]=&gt;
float(1)
}
array(16) {
["ns"]=&gt;
string(29) "databaseName.cappedCollection"
["count"]=&gt;
int(0)
["size"]=&gt;
int(0)
["numExtents"]=&gt;
int(1)
["storageSize"]=&gt;
int(65536)
["nindexes"]=&gt;
int(1)
["lastExtentSize"]=&gt;
float(65536)
["paddingFactor"]=&gt;
float(1)
["paddingFactorNote"]=&gt;
string(101) "paddingFactor is unused and unmaintained in 2.8. It remains hard coded to 1.0 for compatibility only."
["userFlags"]=&gt;
int(0)
["capped"]=&gt;
bool(true)
["max"]=&gt;
int(9223372036854775807)
["maxSize"]=&gt;
int(65536)
["totalIndexSize"]=&gt;
int(8176)
["indexSizes"]=&gt;
object(stdClass)#4 (1) {
["_id_"]=&gt;
int(8176)
}
["ok"]=&gt;
float(1)
}

# MongoDB\Driver\Command::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\Driver\Command::\_\_construct — Crea un nuevo comando

### Descripción

final public **MongoDB\Driver\Command::\_\_construct**([array](#language.types.array)|[object](#language.types.object) $document, [?](#language.types.null)[array](#language.types.array) $commandOptions = **[null](#constant.null)**)

Construye un nuevo [MongoDB\Driver\Command](#class.mongodb-driver-command), que es
un objeto de valor inmutable que representa un comando de base de datos.
El comando puede entonces ser ejecutado con
[MongoDB\Driver\Manager::executeCommand()](#mongodb-driver-manager.executecommand).

El documento de comando completo, que incluye el nombre del comando y sus
opciones, debe ser expresado en el parámetro document.
El parámetro commandOptions se utiliza únicamente
para especificar las opciones relacionadas con la ejecución del comando y el resultado
[MongoDB\Driver\Cursor](#class.mongodb-driver-cursor).

### Parámetros

    document


      El documento de comando completo, que será enviado al servidor.







    commandOptions

     **Nota**:

       No utilice este parámetro para especificar las opciones descritas en la
       referencia del comando en el manual de MongoDB. Este parámetro solo debe
       ser utilizado para las opciones explícitamente enumeradas a continuación.








       <caption>**commandOptions**</caption>



          Option
          Type
          Descripción






          maxAwaitTimeMS
          [int](#language.types.integer)


            Entero positivo que indica el límite de tiempo en milisegundos para
            que el servidor bloquee una operación getMore si no hay datos disponibles. Esta opción solo debe ser utilizada
            en conjunción con los comandos que devuelven un cursor a cola (por ejemplo,
            [» Change Streams](https://www.mongodb.com/docs/manual/changeStreams/)).












### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.4.0


         Adición de un segundo argumento commandOptions, que
         soporta la opción "maxAwaitTimeMS".








### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\Command::\_\_construct()**

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$command = new MongoDB\Driver\Command(array("buildinfo" =&gt; 1));

try {
$cursor = $manager-&gt;executeCommand("admin", $command);
    $response = $cursor-&gt;toArray()[0];
} catch(MongoDB\Driver\Exception $e) {
    echo $e-&gt;getMessage(), "\n";
    exit;
}
var_dump($response);

?&gt;

Resultado del ejemplo anterior es similar a:

array(13) {
["version"]=&gt;
string(14) "2.8.0-rc2-pre-"
["gitVersion"]=&gt;
string(62) "b743d7158f7642f4da6b7eac8320374b3b88dc2e modules: subscription"
["OpenSSLVersion"]=&gt;
string(25) "OpenSSL 1.0.1f 6 Jan 2014"
["sysInfo"]=&gt;
string(104) "Linux infant 3.16.0-24-generic #32-Ubuntu SMP Tue Oct 28 13:07:32 UTC 2014 x86_64 BOOST_LIB_VERSION=1_49"
["loaderFlags"]=&gt;
string(91) "-fPIC -pthread -Wl,-z,now -rdynamic -Wl,-Bsymbolic-functions -Wl,-z,relro -Wl,-z,now -Wl,-E"
["compilerFlags"]=&gt;
string(301) "-Wnon-virtual-dtor -Woverloaded-virtual -std=c++11 -fPIC -fno-strict-aliasing -ggdb -pthread -Wall -Wsign-compare -Wno-unknown-pragmas -Winvalid-pch -pipe -Werror -O3 -Wno-unused-local-typedefs -Wno-unused-function -Wno-deprecated-declarations -Wno-unused-but-set-variable -fno-builtin-memcmp -std=c99"
["allocator"]=&gt;
string(8) "tcmalloc"
["versionArray"]=&gt;
array(4) {
[0]=&gt;
int(2)
[1]=&gt;
int(8)
[2]=&gt;
int(0)
[3]=&gt;
int(-8)
}
["javascriptEngine"]=&gt;
string(2) "V8"
["bits"]=&gt;
int(64)
["debug"]=&gt;
bool(false)
["maxBsonObjectSize"]=&gt;
int(16777216)
["ok"]=&gt;
float(1)
}

**Ejemplo #2 Ejemplo con MongoDB\Driver\Command::\_\_construct()**

    Los comandos también pueden aceptar opciones, dentro de la estructura normal que se crea para enviar al servidor. Por ejemplo, la opción maxTimeMS puede ser pasada con la mayoría de los comandos para restringir la duración durante la cual un comando específico puede ejecutarse en el servidor.

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$command = new MongoDB\Driver\Command(
array(
"distinct" =&gt; "beer",
"key" =&gt; "beer_name",
"maxTimeMS" =&gt; 10,
)
);

try {
$cursor = $manager-&gt;executeCommand("beerdb", $command);
    $response = $cursor-&gt;toArray()[0];
} catch(MongoDB\Driver\Exception\Exception $e) {
    echo $e-&gt;getMessage(), "\n";
    exit;
}
var_dump($response);

?&gt;

Resultado del ejemplo anterior es similar a:

    operation exceeded time limit

### Ver también

- [MongoDB\Driver\Manager::executeCommand()](#mongodb-driver-manager.executecommand) - Ejecuta un comando de base de datos

- [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

## Tabla de contenidos

- [MongoDB\Driver\Command::\_\_construct](#mongodb-driver-command.construct) — Crea un nuevo comando

# La clase MongoDB\Driver\Query

(mongodb &gt;=1.0.0)

## Introducción

    La clase **MongoDB\Driver\Query** es un objeto
    que representa una consulta de base de datos.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Query**

     {


    /* Métodos */

final public [\_\_construct](#mongodb-driver-query.construct)([array](#language.types.array)|[object](#language.types.object) $filter, [?](#language.types.null)[array](#language.types.array) $queryOptions = **[null](#constant.null)**)

}

# MongoDB\Driver\Query::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\Driver\Query::\_\_construct — Crear una nueva consulta

### Descripción

final public **MongoDB\Driver\Query::\_\_construct**([array](#language.types.array)|[object](#language.types.object) $filter, [?](#language.types.null)[array](#language.types.array) $queryOptions = **[null](#constant.null)**)

Construye un nuevo objeto [MongoDB\Driver\Query](#class.mongodb-driver-query), que es un objeto
de valor inmutable que representa una consulta de base de datos. La consulta puede
luego ser ejecutada con
[MongoDB\Driver\Manager::executeQuery()](#mongodb-driver-manager.executequery).

### Parámetros

filter ([array](#language.types.array)|[object](#language.types.object))

        El [» atributo de la consulta](https://www.mongodb.com/docs/manual/tutorial/query-documents/).
        Un atributo vacío hará coincidir todos los documentos de la colección.



    **Nota**:

            Al evaluar los criterios de consulta, MongoDB compara los tipos y los valores según sus propias [» reglas de comparación para los tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-type-comparison-order/), que difieren de las reglas de [comparación](#types.comparisons) y de [manipulación de tipos](#language.types.type-juggling) de PHP. Al hacer coincidir un tipo BSON especial, los criterios de consulta deben utilizar la [clase BSON](#mongodb.bson) (ej.: utilizar [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) para hacer coincidir un [» ObjectId](https://www.mongodb.com/docs/manual/reference/bson-types/#objectid)).








    queryOptions





       <caption>**queryOptions**</caption>



          Option
          Type
          Description






          allowDiskUse
          [bool](#language.types.boolean)


            Autoriza a MongoDB a utilizar ficheros temporales en el disco
            para almacenar datos que excedan el límite de memoria del sistema
            de 100 megabytes al procesar una operación de clasificación bloqueante.







          allowPartialResults
          [bool](#language.types.boolean)


            Para las consultas en una colección fragmentada, devuelve resultados parciales del mongos si algunos fragmentos no están
            disponibles en lugar de generar un error.




            Retoma la opción deprecada "partial" si no
            se especifica.







          awaitData
          [bool](#language.types.boolean)

           Utilizar en conjunción con la opción "tailable" para
           bloquear temporalmente una operación getMore en el cursor si al final
           de los datos en lugar de no devolver datos. Después de un período
           de espera, la consulta termina normalmente.




          batchSize
          [int](#language.types.integer)


            El número de documentos a devolver en el primer lote. Por omisión a
            101. Un tamaño de lote de 0 significa que el cursor será establecido, pero
            ningún documento será devuelto en el primer lote.




            En las versiones de MongoDB anteriores a 3.2, donde las consultas
            utilizan el protocolo de filaire heredado OP_QUERY, un tamaño de lote
            de 1 cerrará el cursor independientemente del número de documentos.








collation
[array](#language.types.array)|[object](#language.types.object)

        [» Collation](https://www.mongodb.com/docs/upcoming/reference/collation/) permite a los usuarios especificar reglas específicas del lenguaje para la comparación de cadenas, por ejemplo, reglas para mayúsculas o acentos. Al especificar una collation, el campo "locale" es obligatorio; todos los demás campos de la collation son opcionales. Para la descripción de estos campos, consúltese el [» documento Collation](https://www.mongodb.com/docs/upcoming/reference/collation/#collation-document).




        Si la collation no es especificada pero la colección tiene una collation por omisión, la operación utilizará la collation especificada para la colección. Si ninguna collation es especificada para la colección o para la operación, MongoDB utilizará el binario simple de comparación utilizado en versiones anteriores para las comparaciones de cadenas.




        Esta opción está disponible en MongoDB 3.4+ y una excepción será emitida en tiempo de ejecución si es especificada en una versión anterior.








          comment
          [mixed](#language.types.mixed)


            Un comentario arbitrario para ayudar a rastrear la operación a través
            del perfil de la base de datos, la salida currentOp y los registros.




            El comentario puede ser cualquier tipo BSON válido para MongoDB
            4.4+. Las versiones de servidor anteriores solo admiten
            valores de cadena.




            Retoma la opción deprecada "$comment" si no
            se especifica.







          exhaust
          [bool](#language.types.boolean)


            El flujo de datos aguas abajo a plena potencia en varios paquetes
            "more", asumiendo que el cliente leerá completamente todos los datos
            consultados. Más rápido cuando se extraen muchos datos y
            se sabe que se quiere extraer todo. Nota: el cliente no está autorizado
            a no leer todos los datos a menos que cierre la conexión.




            Esta opción no es admitida por el comando find en MongoDB
            3.2+ y forzará al controlador a utilizar la versión del protocolo de filaire
            heredado (es decir, OP_QUERY).







          explain
          [bool](#language.types.boolean)


            Si **[true](#constant.true)** el cursor [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor) devuelto
            contendrá un solo documento que describe el proceso y los índices utilizados
            para devolver la consulta.




            Retoma la opción deprecada "$explain" si no
            se especifica.




            Esta opción no es admitida por el comando find en MongoDB
            3.2+ y solo será respetada al utilizar la versión del protocolo de filaire
            heredado (es decir, OP_QUERY). El comando
            [» explain](https://www.mongodb.com/docs/manual/reference/command/explain/)
            debe ser utilizado en MongoDB 3.0+.







          hint
          [string](#language.types.string)|[array](#language.types.array)|[object](#language.types.object)


            Especificación del índice. Especifique el nombre del índice como
            cadena, o el patrón de clave de índice. Si se especifica, el sistema de consulta
            solo considerará los planes que utilicen el índice sugerido.




            Retoma la opción deprecada "hint" si no se especifica.








let
[array](#language.types.array)|[object](#language.types.object)

    Diccionario de nombres y valores de parámetros. Los valores deben ser constantes o expresiones cerradas que no hagan referencia a campos del documento. Los parámetros pueden ser accedidos luego como variables en un contexto de expresión agregada (por ejemplo $$var).




    Esta opción está disponible en MongoDB 5.0+ y resultará en una excepción en tiempo de ejecución si es especificada para una versión anterior del servidor.








          limit
          [int](#language.types.integer)


            El número máximo de documentos a devolver. Si no se especifica, entonces
            por omisión a ningún límite. Un límite de 0 es equivalente a no establecer
            un límite.







          max
          [array](#language.types.array)|[object](#language.types.object)


            El límite superior *exclusivo* para un índice específico.




            Retoma la opción deprecada "$max" si no
            se especifica.







          maxAwaitTimeMS
          [int](#language.types.integer)


            Entero positivo que indica el límite de tiempo en milisegundos para que el
            servidor bloquee una operación getMore si no hay datos disponibles. Esta opción solo debe
            ser utilizada en conjunción con las opciones "tailable" y
            "awaitData".







          maxTimeMS
          [int](#language.types.integer)


            El límite de tiempo acumulativo en milisegundos para el procesamiento de
            las operaciones en el cursor. MongoDB detiene la operación en el primer punto
            de interrupción más cercano.




            Retoma la opción deprecada "$maxTimeMS" si no
            se especifica.







          min
          [array](#language.types.array)|[object](#language.types.object)


            El límite inferior *inclusivo* para un índice específico.




            Retoma la opción deprecada "$min" si no
            se especifica.







          noCursorTimeout
          [bool](#language.types.boolean)

           Evita que el servidor finalice los cursores inactivos después de un período
           de inactividad (10 minutos).




          projection
          [array](#language.types.array)|[object](#language.types.object)


            Las [» especificaciones de proyección](https://www.mongodb.com/docs/manual/tutorial/project-fields-from-query-results/)
            para determinar qué campos incluir en los documentos devueltos.




            Si se utiliza la
            [funcionalidad ODM](#mongodb.persistence.deserialization)
            para deserializar los documentos como su clase PHP original,
            asegúrese de incluir el campo __pclass en la
            proyección. Esto es necesario para que la deserialización funcione
            y sin ello, la extensión devolverá (por omisión) un objeto
            [stdClass](#class.stdclass) en su lugar.







          readConcern
          [MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern)


            Un read concern a aplicar a la operación. Por omisión, el read concern
            de la [URI
            de conexión MongoDB](#mongodb-driver-manager.construct-uri)
            será utilizado.




            Esta opción está disponible en MongoDB 3.2+ y provocará una
            excepción en el momento de la ejecución si se especifica para una
            versión de servidor más antigua.







          returnKey
          [bool](#language.types.boolean)


            Si **[true](#constant.true)**, solo devuelve las claves de índice en los documentos
            resultantes. El valor por omisión es **[false](#constant.false)**. Si **[true](#constant.true)** y la
            comando find no utiliza un índice, los documentos devueltos estarán vacíos.




            Retoma la opción deprecada "$returnKey" si no
            se especifica.







          showRecordId
          [bool](#language.types.boolean)


            Determina si el identificador de registro debe ser devuelto para
            cada documento. Si **[true](#constant.true)**, añade un campo "$recordId"
            de primer nivel a los documentos devueltos.




            Retoma la opción deprecada "$showDiskLoc" si no
            se especifica.







          singleBatch
          [bool](#language.types.boolean)

           Determina si el cursor debe ser cerrado después del primer lote.
           Por omisión a **[false](#constant.false)**.




          skip
          [int](#language.types.integer)
          Número de documentos a saltar. Por omisión a 0.



          sort
          [array](#language.types.array)|[object](#language.types.object)

           La especificación de clasificación para el ordenamiento de los resultados.



            Retoma la opción deprecada "$orderby" si no
            se especifica.







          tailable
          [bool](#language.types.boolean)
          Devuelve un cursor tailable para una colección acotada.








### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 2.0.0


         La opción "partial" ha sido eliminada. Utilice
         "allowPartialResults" en su lugar.




         La opción "maxScan" ha sido eliminada. El soporte
         para esta opción ha sido eliminado en MongoDB 4.2.




         La opción "modifiers" ha sido eliminada. Esta opción era
         utilizada para los modificadores de consulta antigua, que están todos deprecados.




         La opción "oplogReplay" ha sido eliminada. Esto es ignorado
         en MongoDB 4.4 y versiones más recientes.




         La opción "snapshot" ha sido eliminada. Su soporte ha sido
         eliminado en MongoDB 4.0.




         Un valor negativo para la opción "limit" ya no implica **[true](#constant.true)** para la opción
         "singleBatch". Para recibir solo un lote de resultados, combine un valor positivo
         "limit" con la opción
         "singleBatch".







       PECL mongodb 1.14.0


         Añadida la opción "let". La opción
         "comment" ahora acepta cualquier tipo.







       PECL mongodb 1.8.0


         Añadida la opción "allowDiskUse".




         La opción "oplogReplay" está deprecada.







       PECL mongodb 1.5.0


         Las opciones "maxScan" y "snapshot"
         están deprecadas.







       PECL mongodb 1.3.0


         Añadida la opción "maxAwaitTimeMS"







       PECL mongodb 1.2.0


         Añadidas las opciones "allowPartialResults",
         "collation", "comment",
         "hint", "max",
         "maxScan", "maxTimeMS",
         "min", "returnKey",
         "showRecordId", y "snapshot".




         Renombrada la opción "partial" a
         "allowPartialResults". Por compatibilidad ascendente,
         "partial" será siempre leído si
         "allowPartialResults" no está especificado.




         Eliminada la opción "secondaryOk" obsoleta. Para las
         consultas que utilizan el protocolo de filaire heredado OP_QUERY, el controlador
         establecerá el bit secondaryOk según sea necesario
         conforme a la
         [» Especificación de selección del servidor](https://github.com/mongodb/specifications/blob/master/source/server-selection/server-selection.md).







       PECL mongodb 1.1.0
       Añadida la opción "readConcern".




### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\Query::\_\_construct()**

&lt;?php
/_ Selecciona solo los documentos escritos por "bjori" con al menos 100 vistas _/
$filter = [
    'author' =&gt; 'bjori',
    'views' =&gt; [
        '$gte' =&gt; 100,
],
];

$options = [
/_ Devuelve solo los siguientes campos en los documentos correspondientes _/
'projection' =&gt; [
'title' =&gt; 1,
'article' =&gt; 1,
],
/_ Devuelve los documentos en orden descendente de vistas _/
'sort' =&gt; [
'views' =&gt; -1
],
];

$query = new MongoDB\Driver\Query($filter, $options);

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
$readPreference = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::PRIMARY);
$cursor = $manager-&gt;executeQuery('databaseName.collectionName', $query, ['readPreference' =&gt; $readPreference]);

foreach($cursor as $document) {
    var_dump($document);
}

?&gt;

### Ver también

- [MongoDB\Driver\Manager::executeQuery()](#mongodb-driver-manager.executequery) - Ejecuta una consulta de base de datos

- [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

## Tabla de contenidos

- [MongoDB\Driver\Query::\_\_construct](#mongodb-driver-query.construct) — Crear una nueva consulta

# La clase MongoDB\Driver\BulkWrite

(mongodb &gt;=1.0.0)

## Introducción

    El **MongoDB\Driver\BulkWrite** recopila una o más
    operaciones de escritura que deberían ser enviadas al servidor. Después de agregar
    un número cualquiera de operaciones de inserción, actualización y eliminación,
    la colección puede ser ejecutada a través de
    [MongoDB\Driver\Manager::executeBulkWrite()](#mongodb-driver-manager.executebulkwrite).




    Las operaciones de escritura pueden ser ordenadas (por omisión) o no ordenadas.
    Las operaciones de escritura ordenadas son enviadas al servidor, en el orden
    proporcionado, para una ejecución serial. Si una escritura falla, todas las
    operaciones restantes serán canceladas. Las operaciones no ordenadas son enviadas
    al servidor en un orden arbitrario donde pueden ser ejecutadas en paralelo.
    Todos los errores que ocurren son reportados después de que todas las
    operaciones hayan sido intentadas.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\BulkWrite**


     implements
       [Countable](#class.countable) {


    /* Métodos */

public [\_\_construct](#mongodb-driver-bulkwrite.construct)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**)
public [count](#mongodb-driver-bulkwrite.count)(): [int](#language.types.integer)
public [delete](#mongodb-driver-bulkwrite.delete)([array](#language.types.array)|[object](#language.types.object) $filter, [?](#language.types.null)[array](#language.types.array) $deleteOptions = **[null](#constant.null)**): [void](language.types.void.html)
public [insert](#mongodb-driver-bulkwrite.insert)([array](#language.types.array)|[object](#language.types.object) $document): [mixed](#language.types.mixed)
public [update](#mongodb-driver-bulkwrite.update)([array](#language.types.array)|[object](#language.types.object) $filter, [array](#language.types.array)|[object](#language.types.object) $newObj, [?](#language.types.null)[array](#language.types.array) $updateOptions = **[null](#constant.null)**): [void](language.types.void.html)

}

## Ejemplos

    **Ejemplo #1 Operaciones de escritura ordenadas por tipo**



     Las operaciones de escritura mixtas (es decir, las inserciones, las actualizaciones y las eliminaciones) serán ensambladas en comandos de escritura tipificados para ser enviados secuencialmente al servidor.

&lt;?php

$bulk = new MongoDB\Driver\BulkWrite(['ordered' =&gt; true]);
$bulk-&gt;insert(['_id' =&gt; 1, 'x' =&gt; 1]);
$bulk-&gt;insert(['_id' =&gt; 2, 'x' =&gt; 2]);
$bulk-&gt;update(['x' =&gt; 2], ['$set' =&gt; ['x' =&gt; 1]]);
$bulk-&gt;insert(['_id' =&gt; 3, 'x' =&gt; 3]);
$bulk-&gt;delete(['x' =&gt; 1]);

?&gt;

     Resulta en cuatro comandos de escritura (es decir, idas y vueltas)
     ejecutadas. Dado que las operaciones son ordenadas, la tercera inserción no puede ser enviada
     hasta que la actualización previa sea ejecutada.





    **Ejemplo #2 Operaciones de escritura ordenadas causando un error**

&lt;?php

$bulk = new MongoDB\Driver\BulkWrite(['ordered' =&gt; true]);
$bulk-&gt;delete([]);
$bulk-&gt;insert(['_id' =&gt; 1]);
$bulk-&gt;insert(['_id' =&gt; 2]);
$bulk-&gt;insert(['_id' =&gt; 3, 'hello' =&gt; 'world']);
$bulk-&gt;update(['_id' =&gt; 3], ['$set' =&gt; ['hello' =&gt; 'earth']]);
$bulk-&gt;insert(['_id' =&gt; 4, 'hello' =&gt; 'pluto']);
$bulk-&gt;update(['_id' =&gt; 4], ['$set' =&gt; ['hello' =&gt; 'moon']]);
$bulk-&gt;insert(['_id' =&gt; 3]);
$bulk-&gt;insert(['_id' =&gt; 4]);
$bulk-&gt;insert(['_id' =&gt; 5]);

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

try {
$result = $manager-&gt;executeBulkWrite('db.collection', $bulk, ['writeConcern' =&gt; $writeConcern]);
} catch (MongoDB\Driver\Exception\BulkWriteException $e) {
$result = $e-&gt;getWriteResult();

    // Verifica si la escritura no pudo ser satisfecha
    if ($writeConcernError = $result-&gt;getWriteConcernError()) {
        printf("%s (%d): %s\n",
            $writeConcernError-&gt;getMessage(),
            $writeConcernError-&gt;getCode(),
            var_export($writeConcernError-&gt;getInfo(), true)
        );
    }

    // Verifica si una operación de escritura no pudo ser completada
    foreach ($result-&gt;getWriteErrors() as $writeError) {
        printf("Operación#%d: %s (%d)\n",
            $writeError-&gt;getIndex(),
            $writeError-&gt;getMessage(),
            $writeError-&gt;getCode()
        );
    }

} catch (MongoDB\Driver\Exception\Exception $e) {
printf("Otro error: %s\n", $e-&gt;getMessage());
exit;
}

printf("Insertados %d documento(s)\n", $result-&gt;getInsertedCount());
printf("Actualizados %d documento(s)\n", $result-&gt;getModifiedCount());

?&gt;

El ejemplo anterior mostrará:

Operación#7: E11000 duplicate key error index: db.collection.$_id_ dup key: { : 3 } (11000)
Insertados 4 documento(s)
Actualizados 2 documento(s)

    Si el write concern no puede ser satisfecho, el ejemplo anterior mostrará
    algo como:

esperando la replicación tiempo agotado (64): array (
'wtimeout' =&gt; true,
)
Operación#7: E11000 duplicate key error index: databaseName.collectionName.$_id_ dup key: { : 3 } (11000)
Insertados 4 documento(s)
Actualizados 2 documento(s)

    Si se ejecuta el ejemplo anterior, pero se permiten escrituras no ordenadas:

&lt;?php

$bulk = new MongoDB\Driver\BulkWrite(['ordered' =&gt; false]);
/_ ... _/

?&gt;

El ejemplo anterior mostrará:

Operación#7: E11000 duplicate key error index: db.collection.$_id_ dup key: { : 3 } (11000)
Operación#8: E11000 duplicate key error index: db.collection.$_id_ dup key: { : 4 } (11000)
Insertados 5 documento(s)
Actualizados 2 documento(s)

## Ver también

    - [MongoDB\Driver\Manager::executeBulkWrite()](#mongodb-driver-manager.executebulkwrite)

    - [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)

    - [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

    - [MongoDB\Driver\WriteConcernError](#class.mongodb-driver-writeconcernerror)

    - [MongoDB\Driver\WriteError](#class.mongodb-driver-writeerror)

# MongoDB\Driver\BulkWrite::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\Driver\BulkWrite::\_\_construct — Crear un nuevo BulkWrite

### Descripción

public **MongoDB\Driver\BulkWrite::\_\_construct**([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**)

Construye un nuevo [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite), que es un
objeto mutable al cual se pueden añadir una o más operaciones de escritura. Las
escrituras pueden ser ejecutadas posteriormente con
[MongoDB\Driver\Manager::executeBulkWrite()](#mongodb-driver-manager.executebulkwrite).

### Parámetros

    options ([array](#language.types.array))





       <caption>**options**</caption>



          Option
          Type
          Description
          Defaut






          bypassDocumentValidation
          [bool](#language.types.boolean)


            Si **[true](#constant.true)**, permite que las operaciones de inserción y actualización contorneen la validación a nivel de documento.




            Esta opción está disponible en MongoDB 3.2+ y es ignorada para las versiones anteriores del servidor, que no soportan la validación a nivel de documento.




          **[false](#constant.false)**



          comment
          [mixed](#language.types.mixed)


            Un comentario arbitrario para ayudar a trazar la operación a través del perfil del servidor de base de datos, la salida currentOp y los registros.




            Esta opción está disponible en MongoDB 4.4+ y lanzará una excepción en el momento de la ejecución si se especifica para una versión de servidor más antigua.








let
[array](#language.types.array)|[object](#language.types.object)

    Diccionario de nombres y valores de parámetros. Los valores deben ser constantes o expresiones cerradas que no hagan referencia a campos del documento. Los parámetros pueden ser accedidos luego como variables en un contexto de expresión agregada (por ejemplo $$var).




    Esta opción está disponible en MongoDB 5.0+ y resultará en una excepción en tiempo de ejecución si es especificada para una versión anterior del servidor.








          ordered
          [bool](#language.types.boolean)

           Las operaciones ordenadas (**[true](#constant.true)**) son ejecutadas secuencialmente en el servidor MongoDB,
           mientras que las operaciones no ordenadas (**[false](#constant.false)**) son enviadas al servidor
           en un orden arbitrario y pueden ser ejecutadas en paralelo.

          **[true](#constant.true)**








### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.14.0

        Adición de las opciones "comment" y "let".




       PECL mongodb 1.1.0

        Adición de la opción "bypassDocumentValidation".





### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWrite::\_\_construct()**

&lt;?php

$bulk = new MongoDB\Driver\BulkWrite(['ordered' =&gt; true]);
$bulk-&gt;delete([]);
$bulk-&gt;insert(['_id' =&gt; 1, 'x' =&gt; 1]);
$bulk-&gt;insert(['_id' =&gt; 2, 'x' =&gt; 2]);
$bulk-&gt;update(
    ['x' =&gt; 2],
    ['$set' =&gt; ['x' =&gt; 1]],
['limit' =&gt; 1, 'upsert' =&gt; false]
);
$bulk-&gt;delete(['x' =&gt; 1], ['limit' =&gt; 1]);
$bulk-&gt;update(
['_id' =&gt; 3],
['$set' =&gt; ['x' =&gt; 3]],
['limit' =&gt; 1, 'upsert' =&gt; true]
);

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
$writeConcern = new MongoDB\Driver\WriteConcern(1);

try {
$result = $manager-&gt;executeBulkWrite('db.collection', $bulk, ['writeConcern' =&gt; $writeConcern]);
} catch (MongoDB\Driver\Exception\BulkWriteException $e) {
$result = $e-&gt;getWriteResult();

    // Verifica si la escritura no pudo ser realizada
    if ($writeConcernError = $result-&gt;getWriteConcernError()) {
        printf("%s (%d): %s\n",
            $writeConcernError-&gt;getMessage(),
            $writeConcernError-&gt;getCode(),
            var_export($writeConcernError-&gt;getInfo(), true)
        );
    }

    // Verifica si algunas operaciones de escritura no fueron realizadas
    foreach ($result-&gt;getWriteErrors() as $writeError) {
        printf("Operation#%d: %s (%d)\n",
            $writeError-&gt;getIndex(),
            $writeError-&gt;getMessage(),
            $writeError-&gt;getCode()
        );
    }

} catch (MongoDB\Driver\Exception\Exception $e) {
printf("Otro error: %s\n", $e-&gt;getMessage());
exit;
}

printf("Inserted %d document(s)\n", $result-&gt;getInsertedCount());
printf("Updated %d document(s)\n", $result-&gt;getModifiedCount());
printf("Upserted %d document(s)\n", $result-&gt;getUpsertedCount());
printf("Deleted %d document(s)\n", $result-&gt;getDeletedCount());

?&gt;

El ejemplo anterior mostrará:

Inserted 2 document(s)
Updated 1 document(s)
Upserted 1 document(s)
Deleted 1 document(s)

### Ver también

- [MongoDB\Driver\Manager::executeBulkWrite()](#mongodb-driver-manager.executebulkwrite) - Ejecuta una o varias operaciones de escritura

- [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)

# MongoDB\Driver\BulkWrite::count

(mongodb &gt;=1.0.0)

MongoDB\Driver\BulkWrite::count — Cuenta el número de operaciones de escritura en el lote

### Descripción

public **MongoDB\Driver\BulkWrite::count**(): [int](#language.types.integer)

Devuelve el número de operaciones de escritura añadidas al objeto
[MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de operaciones de escritura añadidas al objeto
[MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.2.0

        Devuelve el número de operaciones de escritura añadidas al objeto
        [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite). Las versiones anteriores
        devolvían el número de idas y vueltas cliente-servidor necesarias para ejecutar
        todas las operaciones de escritura.





### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWrite::count()**

&lt;?php

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['_id' =&gt; 1, 'x' =&gt; 1]);
$bulk-&gt;insert(['_id' =&gt; 2, 'x' =&gt; 2]);
$bulk-&gt;update(['x' =&gt; 2], ['$set' =&gt; ['x' =&gt; 1]]);
$bulk-&gt;delete(['x' =&gt; 1]);

var_dump(count($bulk));

?&gt;

El ejemplo anterior mostrará:

int(4)

# MongoDB\Driver\BulkWrite::delete

(mongodb &gt;=1.0.0)

MongoDB\Driver\BulkWrite::delete — Añade una operación de eliminación al lote

### Descripción

public **MongoDB\Driver\BulkWrite::delete**([array](#language.types.array)|[object](#language.types.object) $filter, [?](#language.types.null)[array](#language.types.array) $deleteOptions = **[null](#constant.null)**): [void](language.types.void.html)

Añade una operación de eliminación al
[MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite).

### Parámetros

filter ([array](#language.types.array)|[object](#language.types.object))

        El [» atributo de la consulta](https://www.mongodb.com/docs/manual/tutorial/query-documents/).
        Un atributo vacío hará coincidir todos los documentos de la colección.



    **Nota**:

            Al evaluar los criterios de consulta, MongoDB compara los tipos y los valores según sus propias [» reglas de comparación para los tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-type-comparison-order/), que difieren de las reglas de [comparación](#types.comparisons) y de [manipulación de tipos](#language.types.type-juggling) de PHP. Al hacer coincidir un tipo BSON especial, los criterios de consulta deben utilizar la [clase BSON](#mongodb.bson) (ej.: utilizar [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) para hacer coincidir un [» ObjectId](https://www.mongodb.com/docs/manual/reference/bson-types/#objectid)).








    deleteOptions





       <caption>**deleteOptions**</caption>



          Option
          Type
          Description
          Defaut







collation
[array](#language.types.array)|[object](#language.types.object)

        [» Collation](https://www.mongodb.com/docs/upcoming/reference/collation/) permite a los usuarios especificar reglas específicas del lenguaje para la comparación de cadenas, por ejemplo, reglas para mayúsculas o acentos. Al especificar una collation, el campo "locale" es obligatorio; todos los demás campos de la collation son opcionales. Para la descripción de estos campos, consúltese el [» documento Collation](https://www.mongodb.com/docs/upcoming/reference/collation/#collation-document).




        Si la collation no es especificada pero la colección tiene una collation por omisión, la operación utilizará la collation especificada para la colección. Si ninguna collation es especificada para la colección o para la operación, MongoDB utilizará el binario simple de comparación utilizado en versiones anteriores para las comparaciones de cadenas.




        Esta opción está disponible en MongoDB 3.4+ y una excepción será emitida en tiempo de ejecución si es especificada en una versión anterior.








          hint
          [string](#language.types.string)|[array](#language.types.array)|[object](#language.types.object)


            Especificación de índice. Especifique el nombre del índice como string
            o el patrón de clave de índice. Si se especifica, el sistema de consulta
            solo considerará los planes que utilicen el índice sugerido.




            Esta opción está disponible en MongoDB 4.4+ y lanzará una
            excepción en el momento de la ejecución si se especifica para una versión de servidor
            más antigua.







          limit
          [bool](#language.types.boolean)
          Elimina todos los documentos coincidentes (**[false](#constant.false)**), o solo el primer documento coincidente (**[true](#constant.true)**)
          **[false](#constant.false)**








### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.8.0

        Adición de la opción "hint".




       PECL mongodb 1.2.0

        Adición de la opción "collation".





### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWrite::delete()**

&lt;?php

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;delete(['x' =&gt; 1], ['limit' =&gt; 1]);
$bulk-&gt;delete(['x' =&gt; 2], ['limit' =&gt; 0]);

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
$result = $manager-&gt;executeBulkWrite('db.collection', $bulk);

?&gt;

### Ver también

- [MongoDB\Driver\Manager::executeBulkWrite()](#mongodb-driver-manager.executebulkwrite) - Ejecuta una o varias operaciones de escritura

- [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)

# MongoDB\Driver\BulkWrite::insert

(mongodb &gt;=1.0.0)

MongoDB\Driver\BulkWrite::insert — Añade una operación de inserción al lote

### Descripción

public **MongoDB\Driver\BulkWrite::insert**([array](#language.types.array)|[object](#language.types.object) $document): [mixed](#language.types.mixed)

Añade una operación de inserción al
[MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite).

### Parámetros

    document ([array](#language.types.array)|[object](#language.types.object))


      El documento a insertar.


### Valores devueltos

Devuelve el \_id del documento insertado. Si el
document no tenía \_id, el
[MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) generado para la inserción será
devuelto.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.3.0

        El _id del documento insertado es siempre devuelto.
        Anteriormente, el método solo devolvía un valor si un
        [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) era generado.





### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWrite::insert()**

&lt;?php

$bulk = new MongoDB\Driver\BulkWrite;

$doc1 = ['x' =&gt; 1];
$doc2 = ['_id' =&gt; 'custom-id', 'x' =&gt; 2];
$doc3 = ['_id' =&gt; new MongoDB\BSON\ObjectId('0123456789abcdef01234567'), 'x' =&gt; 3];

$id1 = $bulk-&gt;insert($doc1);
$id2 = $bulk-&gt;insert($doc2);
$id3 = $bulk-&gt;insert($doc3);

var_dump($id1, $id2, $id3);

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
$result = $manager-&gt;executeBulkWrite('db.collection', $bulk);

?&gt;

Resultado del ejemplo anterior es similar a:

object(MongoDB\BSON\ObjectId)#3 (1) {
["oid"]=&gt;
string(24) "67f58058d1a0aa2fd80d55d0"
}
string(9) "custom-id"
object(MongoDB\BSON\ObjectId)#4 (1) {
["oid"]=&gt;
string(24) "0123456789abcdef01234567"
}

### Ver también

- [MongoDB\Driver\Manager::executeBulkWrite()](#mongodb-driver-manager.executebulkwrite) - Ejecuta una o varias operaciones de escritura

- [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)

- [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

- [MongoDB\BSON\Persistable](#class.mongodb-bson-persistable)

# MongoDB\Driver\BulkWrite::update

(mongodb &gt;=1.0.0)

MongoDB\Driver\BulkWrite::update — Añade una operación de actualización al lote

### Descripción

public **MongoDB\Driver\BulkWrite::update**([array](#language.types.array)|[object](#language.types.object) $filter, [array](#language.types.array)|[object](#language.types.object) $newObj, [?](#language.types.null)[array](#language.types.array) $updateOptions = **[null](#constant.null)**): [void](language.types.void.html)

Añade una operación de actualización al
[MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite).

### Parámetros

filter ([array](#language.types.array)|[object](#language.types.object))

        El [» atributo de la consulta](https://www.mongodb.com/docs/manual/tutorial/query-documents/).
        Un atributo vacío hará coincidir todos los documentos de la colección.



    **Nota**:

            Al evaluar los criterios de consulta, MongoDB compara los tipos y los valores según sus propias [» reglas de comparación para los tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-type-comparison-order/), que difieren de las reglas de [comparación](#types.comparisons) y de [manipulación de tipos](#language.types.type-juggling) de PHP. Al hacer coincidir un tipo BSON especial, los criterios de consulta deben utilizar la [clase BSON](#mongodb.bson) (ej.: utilizar [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) para hacer coincidir un [» ObjectId](https://www.mongodb.com/docs/manual/reference/bson-types/#objectid)).








    newObj ([array](#language.types.array)|[object](#language.types.object))


      Un documento que contiene operadores de actualización (por ejemplo
      $set), un documento de reemplazo (es decir,
      *solo* expresiones field:value), o
      una [» pipeline de agregación](https://www.mongodb.com/docs/manual/reference/command/update/#update-with-an-aggregation-pipeline).






    updateOptions





       <caption>**updateOptions**</caption>



          Option
          Type
          Description
          Defaut






          arrayFilters
          [array](#language.types.array)


            Un array de documentos de filtro que determina qué elementos de array
            modificar para una operación de actualización en un campo de array. Véase
            [» Especificar arrayFilters para las operaciones de actualización de array](https://www.mongodb.com/docs/manual/reference/command/update/#update-command-arrayfilters)
            en el manual de MongoDB para más información.




            Esta opción está disponible en MongoDB 3.6+ y causará una
            excepción en el momento de la ejecución si se especifica para una versión de servidor
            más antigua.








collation
[array](#language.types.array)|[object](#language.types.object)

        [» Collation](https://www.mongodb.com/docs/upcoming/reference/collation/) permite a los usuarios especificar reglas específicas del lenguaje para la comparación de cadenas, por ejemplo, reglas para mayúsculas o acentos. Al especificar una collation, el campo "locale" es obligatorio; todos los demás campos de la collation son opcionales. Para la descripción de estos campos, consúltese el [» documento Collation](https://www.mongodb.com/docs/upcoming/reference/collation/#collation-document).




        Si la collation no es especificada pero la colección tiene una collation por omisión, la operación utilizará la collation especificada para la colección. Si ninguna collation es especificada para la colección o para la operación, MongoDB utilizará el binario simple de comparación utilizado en versiones anteriores para las comparaciones de cadenas.




        Esta opción está disponible en MongoDB 3.4+ y una excepción será emitida en tiempo de ejecución si es especificada en una versión anterior.








          hint
          [string](#language.types.string)|[array](#language.types.array)|[object](#language.types.object)


            Especificación de índice. Especifique el nombre del índice como string
            o el patrón de clave de índice. Si se especifica, el sistema de consultas
            solo considerará los planes que usen el índice sugerido.




            Esta opción está disponible en MongoDB 4.4+ y causará una
            excepción en el momento de la ejecución si se especifica para una versión de servidor
            más antigua.







          multi
          [bool](#language.types.boolean)

           Actualiza solo el primer documento coincidente si **[false](#constant.false)**, o todos
           los documentos coincidentes **[true](#constant.true)**. Esta opción no puede ser **[true](#constant.true)** si
           newObj es un documento de reemplazo.

          **[false](#constant.false)**



          sort
          [array](#language.types.array)|[object](#language.types.object)


            Especifica qué documento la operación actualiza si la consulta coincide
            con varios documentos. El primer documento coincidente por el orden de clasificación
            será actualizado.




            Esta opción no puede ser utilizada si "multi" es **[true](#constant.true)**.




            Esta opción está disponible en MongoDB 4.4+ y causará una
            excepción en el momento de la ejecución si se especifica para una versión de servidor
            más antigua.







          upsert
          [bool](#language.types.boolean)

           Si filter no coincide con un documento existente,
           inserta un *único* documento. El documento será
           creado a partir de newObj si es un documento de reemplazo
           (es decir, sin operadores de actualización); de lo contrario, los operadores en
           newObj serán aplicados a
           filter para crear el nuevo documento.

          **[false](#constant.false)**








### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.21.0

        Adición de la opción "sort".




       PECL mongodb 1.7.0

        Adición de la opción "hint".




       PECL mongodb 1.6.0

        El parámetro newObj acepta ahora una pipeline
        de agregación. Esta funcionalidad requiere MongoDB 4.2+ y causará una
        excepción en el momento de la ejecución si se especifica para una versión de servidor
        más antigua.




       PECL mongodb 1.5.0

        Utilizar la opción "arrayFilters" causará una excepción
        en el momento de la ejecución si no es soportada por el servidor. Anteriormente, ninguna excepción era lanzada y la opción podía ser ignorada.




       PECL mongodb 1.4.0

        Adición de la opción "arrayFilters".




       PECL mongodb 1.2.0

        Adición de la opción "collation".





### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWrite::update()**

&lt;?php

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;update(
['x' =&gt; 2],
['$set' =&gt; ['y' =&gt; 3]],
['multi' =&gt; false, 'upsert' =&gt; false]
);

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
$result = $manager-&gt;executeBulkWrite('db.collection', $bulk);

?&gt;

### Ver también

- [MongoDB\Driver\Manager::executeBulkWrite()](#mongodb-driver-manager.executebulkwrite) - Ejecuta una o varias operaciones de escritura

- [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)

## Tabla de contenidos

- [MongoDB\Driver\BulkWrite::\_\_construct](#mongodb-driver-bulkwrite.construct) — Crear un nuevo BulkWrite
- [MongoDB\Driver\BulkWrite::count](#mongodb-driver-bulkwrite.count) — Cuenta el número de operaciones de escritura en el lote
- [MongoDB\Driver\BulkWrite::delete](#mongodb-driver-bulkwrite.delete) — Añade una operación de eliminación al lote
- [MongoDB\Driver\BulkWrite::insert](#mongodb-driver-bulkwrite.insert) — Añade una operación de inserción al lote
- [MongoDB\Driver\BulkWrite::update](#mongodb-driver-bulkwrite.update) — Añade una operación de actualización al lote

# La clase MongoDB\Driver\BulkWriteCommand

(mongodb &gt;=2.1.0)

## Introducción

    **MongoDB\Driver\BulkWriteCommand** recupera una o varias
    operaciones de escritura que deben ser enviadas al servidor mediante el comando
    [» bulkWrite](https://www.mongodb.com/docs/manual/reference/command/bulkWrite)
    introducido en MongoDB 8.0. Tras añadir cualquier número de operaciones de escritura,
    operaciones de modificación y operaciones de eliminación, el comando puede ser ejecutado a través de
    [MongoDB\Driver\Manager::executeBulkWriteCommand()](#mongodb-driver-manager.executebulkwritecommand).




    A diferencia de [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite), donde todas las operaciones
    de escritura deben apuntar a la misma colección, cada operación de escritura en
    **MongoDB\Driver\BulkWriteCommand** debe apuntar a una
    colección diferente.




    Las operaciones de escritura pueden ser ordenadas (por defecto) o no ordenadas. Las operaciones
    ordenadas son enviadas al servidor, en el orden proporcionado, para una ejecución
    serial. Si una escritura falla, todas las operaciones restantes serán canceladas.
    Las operaciones no ordenadas son enviadas al servidor en un orden arbitrario
    donde pueden ser ejecutadas en paralelo. Todos los errores que ocurran
    son reportados después de que todas las operaciones hayan sido intentadas.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\BulkWriteCommand**


     implements
       [Countable](#class.countable) {


    /* Métodos */

public [\_\_construct](#mongodb-driver-bulkwritecommand.construct)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**)
public [count](#mongodb-driver-bulkwritecommand.count)(): [int](#language.types.integer)
public [deleteMany](#mongodb-driver-bulkwritecommand.deletemany)([string](#language.types.string) $namespace, [array](#language.types.array)|[object](#language.types.object) $filter, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [void](language.types.void.html)
public [deleteOne](#mongodb-driver-bulkwritecommand.deleteone)([string](#language.types.string) $namespace, [array](#language.types.array)|[object](#language.types.object) $filter, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [void](language.types.void.html)
public [insertOne](#mongodb-driver-bulkwritecommand.insertone)([string](#language.types.string) $namespace, [array](#language.types.array)|[object](#language.types.object) $document): [mixed](#language.types.mixed)
public [replaceOne](#mongodb-driver-bulkwritecommand.replaceone)(
    [string](#language.types.string) $namespace,
    [array](#language.types.array)|[object](#language.types.object) $filter,
    [array](#language.types.array)|[object](#language.types.object) $replacement,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): [void](language.types.void.html)
public [updateMany](#mongodb-driver-bulkwritecommand.updatemany)(
    [string](#language.types.string) $namespace,
    [array](#language.types.array)|[object](#language.types.object) $filter,
    [array](#language.types.array)|[object](#language.types.object) $update,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): [void](language.types.void.html)
public [updateOne](#mongodb-driver-bulkwritecommand.updateone)(
    [string](#language.types.string) $namespace,
    [array](#language.types.array)|[object](#language.types.object) $filter,
    [array](#language.types.array)|[object](#language.types.object) $update,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): [void](language.types.void.html)

}

## Ejemplos

    **Ejemplo #1 Operaciones de escritura mixtas**



     Las operaciones de escritura mixtas (por ejemplo, inserciones, actualizaciones y eliminaciones) serán enviadas
     al servidor mediante una sola
     comando
     [» bulkWrite](https://www.mongodb.com/docs/manual/reference/command/bulkWrite).

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;

// Eliminar documentos de ambas colecciones
$bulk-&gt;deleteMany('db.coll_one', []);
$bulk-&gt;deleteMany('db.coll_two', []);

// Insertar documentos en dos colecciones
$bulk-&gt;insertOne('db.coll_one', ['_id' =&gt; 1]);
$bulk-&gt;insertOne('db.coll_two', ['_id' =&gt; 2]);
$bulk-&gt;insertOne('db.coll_two', ['_id' =&gt; 3]);

// Actualizar un documento en "coll_one"
$bulk-&gt;updateOne('db.coll_one', ['_id' =&gt; 1], ['$set' =&gt; ['x' =&gt; 1]]);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

printf("%d documento(s) han sido insertado(s)\n", $result-&gt;getInsertedCount());
printf("%d documento(s) han sido actualizado(s)\n", $result-&gt;getModifiedCount());

?&gt;

    El ejemplo anterior mostrará:

3 documento(s) han sido insertado(s)
1 documento(s) han sido actualizado(s)

    **Ejemplo #2 Operaciones de escritura ordenadas que causan un error**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;

$bulk-&gt;deleteMany('db.coll', []);
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 1]);
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 2]);
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 1]);
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 3]);

try {
$result = $manager-&gt;executeBulkWriteCommand($bulk);
} catch (MongoDB\Driver\Exception\BulkWriteCommandException $e) {
$result = $e-&gt;getPartialResult();

    var_dump($e-&gt;getWriteErrors());

}

printf("%d documento(s) han sido insertado(s)\n", $result-&gt;getInsertedCount());

?&gt;

    Resultado del ejemplo anterior es similar a:

array(1) {
[3]=&gt;
object(MongoDB\Driver\WriteError)#5 (4) {
["message"]=&gt;
string(78) "E11000 duplicate key error collection: db.coll index: _id_ dup key: { \_id: 1 }"
["code"]=&gt;
int(11000)
["index"]=&gt;
int(3)
["info"]=&gt;
object(stdClass)#6 (0) {
}
}
}
2 documento(s) han sido insertado(s)

## Ver también

    - [MongoDB\Driver\Manager::executeBulkWriteCommand()](#mongodb-driver-manager.executebulkwritecommand)

    - [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)

    - [MongoDB\Driver\Exception\BulkWriteCommandException](#class.mongodb-driver-exception-bulkwritecommandexception)

    - [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

    - [MongoDB\Driver\WriteConcernError](#class.mongodb-driver-writeconcernerror)

    - [MongoDB\Driver\WriteError](#class.mongodb-driver-writeerror)

# MongoDB\Driver\BulkWriteCommand::\_\_construct

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommand::\_\_construct — Crear una nueva BulkWriteCommand

### Descripción

public **MongoDB\Driver\BulkWriteCommand::\_\_construct**([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**)

Construye una nueva [MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand),
que puede ser utilizada para realizar múltiples operaciones de inserción, actualización y eliminación
en varias colecciones en una sola petición utilizando el comando
[» bulkWrite](https://www.mongodb.com/docs/manual/reference/command/bulkWrite)
introducido en MongoDB 8.0. Esto difiere de
[MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite), que es compatible con todas
las versiones del servidor pero limitado a una sola colección.

Después de que todas las operaciones de escritura hayan sido añadidas, este objeto puede ser ejecutado con
[MongoDB\Driver\Manager::executeBulkWriteCommand()](#mongodb-driver-manager.executebulkwritecommand).

### Parámetros

    options ([array](#language.types.array))





       <caption>**options**</caption>



          Opción
          Tipo
          Descripción
          Por omisión






          bypassDocumentValidation
          [bool](#language.types.boolean)


            Si **[true](#constant.true)**, permite que las operaciones de inserción y actualización omitan
            la validación a nivel de documento.




          **[false](#constant.false)**



          comment
          [mixed](#language.types.mixed)


            Un comentario arbitrario para ayudar a rastrear la operación a través del
            perfilador de la base de datos, la salida currentOp y los registros.








let
[array](#language.types.array)|[object](#language.types.object)

    Diccionario de nombres y valores de parámetros. Los valores deben ser constantes o expresiones cerradas que no hagan referencia a campos del documento. Los parámetros pueden ser accedidos luego como variables en un contexto de expresión agregada (por ejemplo $$var).




    Esta opción está disponible en MongoDB 5.0+ y resultará en una excepción en tiempo de ejecución si es especificada para una versión anterior del servidor.








          ordered
          [bool](#language.types.boolean)


            Si las operaciones en esta escritura masiva deben ser ejecutadas en el
            orden en que fueron especificadas. Si **[false](#constant.false)**, las escrituras
            continuarán siendo ejecutadas si una escritura individual falla. Si **[true](#constant.true)**,
            las escrituras se detendrán si una escritura individual falla.




          **[true](#constant.true)**



          verboseResults
          [bool](#language.types.boolean)


            Si los detalles de los resultados de cada operación exitosa deben ser
            incluidos en el resultado en la
            [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult) retornada.




          **[false](#constant.false)**








### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWriteCommand::\_\_construct()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;

// Elimina los documentos de dos colecciones
$bulk-&gt;deleteMany('db.coll_one', []);
$bulk-&gt;deleteMany('db.coll_two', []);

// Añade los documentos a dos colecciones
$bulk-&gt;insertOne('db.coll_one', ['_id' =&gt; 1]);
$bulk-&gt;insertOne('db.coll_two', ['_id' =&gt; 2]);
$bulk-&gt;insertOne('db.coll_two', ['_id' =&gt; 3]);

// Modifica un documento en "coll_one"
$bulk-&gt;updateOne('db.coll_one', ['_id' =&gt; 1], ['$set' =&gt; ['x' =&gt; 1]]);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

printf("%d documento(s) han sido insertado(s)\n", $result-&gt;getInsertedCount());
printf("%d documento(s) han sido actualizado(s)\n", $result-&gt;getModifiedCount());

?&gt;

El ejemplo anterior mostrará:

3 documento(s) han sido insertado(s)
1 documento(s) han sido actualizado(s)

### Ver también

- [MongoDB\Driver\Manager::executeBulkWriteCommand()](#mongodb-driver-manager.executebulkwritecommand) - Ejecuta operaciones de escritura utilizando el comando bulkWrite

- [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)

# MongoDB\Driver\BulkWriteCommand::count

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommand::count — Cuenta el número de operaciones de escritura en la BulkWriteCommand

### Descripción

public **MongoDB\Driver\BulkWriteCommand::count**(): [int](#language.types.integer)

Devuelve el número de operaciones de escritura añadidas al
objeto [MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de operaciones de escritura añadidas al
objeto [MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWriteCommand::count()**

&lt;?php

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 1, 'x' =&gt; 1]);
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 2, 'x' =&gt; 2]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 2], ['$set' =&gt; ['x' =&gt; 1]]);
$bulk-&gt;deleteMany('db.coll', ['x' =&gt; 1]);

var_dump(count($bulk));

?&gt;

El ejemplo anterior mostrará:

int(4)

# MongoDB\Driver\BulkWriteCommand::deleteMany

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommand::deleteMany — Añade una operación deleteMany

### Descripción

public **MongoDB\Driver\BulkWriteCommand::deleteMany**([string](#language.types.string) $namespace, [array](#language.types.array)|[object](#language.types.object) $filter, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [void](language.types.void.html)

Añade una operación deleteMany a la
[MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand). Todos los documentos
que coincidan con filter en la colección identificada por
namespace serán eliminados.

### Parámetros

namespace ([string](#language.types.string))

        Un espacio de nombres completamente calificado (ej. "databaseName.collectionName")

filter ([array](#language.types.array)|[object](#language.types.object))

        El [» atributo de la consulta](https://www.mongodb.com/docs/manual/tutorial/query-documents/).
        Un atributo vacío hará coincidir todos los documentos de la colección.



    **Nota**:

            Al evaluar los criterios de consulta, MongoDB compara los tipos y los valores según sus propias [» reglas de comparación para los tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-type-comparison-order/), que difieren de las reglas de [comparación](#types.comparisons) y de [manipulación de tipos](#language.types.type-juggling) de PHP. Al hacer coincidir un tipo BSON especial, los criterios de consulta deben utilizar la [clase BSON](#mongodb.bson) (ej.: utilizar [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) para hacer coincidir un [» ObjectId](https://www.mongodb.com/docs/manual/reference/bson-types/#objectid)).








    options





       <caption>**options**</caption>



          Opción
          Tipo
          Descripción
          Por omisión







collation
[array](#language.types.array)|[object](#language.types.object)

        [» Collation](https://www.mongodb.com/docs/upcoming/reference/collation/) permite a los usuarios especificar reglas específicas del lenguaje para la comparación de cadenas, por ejemplo, reglas para mayúsculas o acentos. Al especificar una collation, el campo "locale" es obligatorio; todos los demás campos de la collation son opcionales. Para la descripción de estos campos, consúltese el [» documento Collation](https://www.mongodb.com/docs/upcoming/reference/collation/#collation-document).




        Si la collation no es especificada pero la colección tiene una collation por omisión, la operación utilizará la collation especificada para la colección. Si ninguna collation es especificada para la colección o para la operación, MongoDB utilizará el binario simple de comparación utilizado en versiones anteriores para las comparaciones de cadenas.




        Esta opción está disponible en MongoDB 3.4+ y una excepción será emitida en tiempo de ejecución si es especificada en una versión anterior.








          hint
          [string](#language.types.string)|[array](#language.types.array)|[object](#language.types.object)


            Especificación del índice. Especifique el nombre del índice como string
            o el modelo de clave del índice. Si se especifica, el sistema de consulta solo
            considerará los planes que utilicen el índice sugerido.












### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWriteCommand::deleteMany()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;deleteMany('db.coll', ['x' =&gt; ['$gt' =&gt; 1]]);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

?&gt;

### Ver también

- [MongoDB\Driver\BulkWriteCommand::deleteOne()](#mongodb-driver-bulkwritecommand.deleteone) - Añade una operación deleteOne

- [MongoDB\Driver\Manager::executeBulkWriteCommand()](#mongodb-driver-manager.executebulkwritecommand) - Ejecuta operaciones de escritura utilizando el comando bulkWrite

- [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)

# MongoDB\Driver\BulkWriteCommand::deleteOne

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommand::deleteOne — Añade una operación deleteOne

### Descripción

public **MongoDB\Driver\BulkWriteCommand::deleteOne**([string](#language.types.string) $namespace, [array](#language.types.array)|[object](#language.types.object) $filter, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [void](language.types.void.html)

Añade una operación deleteOne a la
[MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand). El primer documento
que coincida con filter en la colección identificada por
namespace será eliminado.

### Parámetros

namespace ([string](#language.types.string))

        Un espacio de nombres completamente calificado (ej. "databaseName.collectionName")

filter ([array](#language.types.array)|[object](#language.types.object))

        El [» atributo de la consulta](https://www.mongodb.com/docs/manual/tutorial/query-documents/).
        Un atributo vacío hará coincidir todos los documentos de la colección.



    **Nota**:

            Al evaluar los criterios de consulta, MongoDB compara los tipos y los valores según sus propias [» reglas de comparación para los tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-type-comparison-order/), que difieren de las reglas de [comparación](#types.comparisons) y de [manipulación de tipos](#language.types.type-juggling) de PHP. Al hacer coincidir un tipo BSON especial, los criterios de consulta deben utilizar la [clase BSON](#mongodb.bson) (ej.: utilizar [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) para hacer coincidir un [» ObjectId](https://www.mongodb.com/docs/manual/reference/bson-types/#objectid)).








    options





       <caption>**options**</caption>



          Opción
          Tipo
          Descripción
          Por omisión







collation
[array](#language.types.array)|[object](#language.types.object)

        [» Collation](https://www.mongodb.com/docs/upcoming/reference/collation/) permite a los usuarios especificar reglas específicas del lenguaje para la comparación de cadenas, por ejemplo, reglas para mayúsculas o acentos. Al especificar una collation, el campo "locale" es obligatorio; todos los demás campos de la collation son opcionales. Para la descripción de estos campos, consúltese el [» documento Collation](https://www.mongodb.com/docs/upcoming/reference/collation/#collation-document).




        Si la collation no es especificada pero la colección tiene una collation por omisión, la operación utilizará la collation especificada para la colección. Si ninguna collation es especificada para la colección o para la operación, MongoDB utilizará el binario simple de comparación utilizado en versiones anteriores para las comparaciones de cadenas.




        Esta opción está disponible en MongoDB 3.4+ y una excepción será emitida en tiempo de ejecución si es especificada en una versión anterior.








          hint
          [string](#language.types.string)|[array](#language.types.array)|[object](#language.types.object)


            Especificación del índice. Especifique el nombre del índice como string
            o el modelo de clave del índice. Si se especifica, el sistema de consulta solo
            considerará los planes que utilicen el índice sugerido.












### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWriteCommand::deleteOne()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;deleteOne('db.coll', ['x' =&gt; 1]);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

?&gt;

### Ver también

- [MongoDB\Driver\BulkWriteCommand::deleteMany()](#mongodb-driver-bulkwritecommand.deletemany) - Añade una operación deleteMany

- [MongoDB\Driver\Manager::executeBulkWriteCommand()](#mongodb-driver-manager.executebulkwritecommand) - Ejecuta operaciones de escritura utilizando el comando bulkWrite

- [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)

# MongoDB\Driver\BulkWriteCommand::insertOne

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommand::insertOne — Añade una operación insertOne

### Descripción

public **MongoDB\Driver\BulkWriteCommand::insertOne**([string](#language.types.string) $namespace, [array](#language.types.array)|[object](#language.types.object) $document): [mixed](#language.types.mixed)

Añade una operación insertOne a la
[MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand). El documento será
insertado en la colección identificada por
namespace.

### Parámetros

namespace ([string](#language.types.string))

        Un espacio de nombres completamente calificado (ej. "databaseName.collectionName")







    document ([array](#language.types.array)|[object](#language.types.object))


      El documento a insertar.


### Valores devueltos

Devuelve el \_id del documento insertado. Si el
document no tenía un \_id, el
[MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) generado para la inserción será
devuelto.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWriteCommand::insertOne()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;

$doc1 = ['x' =&gt; 1];
$doc2 = ['_id' =&gt; 'custom-id', 'x' =&gt; 2];
$doc3 = ['_id' =&gt; new MongoDB\BSON\ObjectId('0123456789abcdef01234567'), 'x' =&gt; 3];

$id1 = $bulk-&gt;insertOne('db.coll', $doc1);
$id2 = $bulk-&gt;insertOne('db.coll', $doc2);
$id3 = $bulk-&gt;insertOne('db.coll', $doc3);

var_dump($id1, $id2, $id3);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

?&gt;

Resultado del ejemplo anterior es similar a:

object(MongoDB\BSON\ObjectId)#3 (1) {
["oid"]=&gt;
string(24) "67f58058d1a0aa2fd80d55d0"
}
string(9) "custom-id"
object(MongoDB\BSON\ObjectId)#4 (1) {
["oid"]=&gt;
string(24) "0123456789abcdef01234567"
}

### Ver también

- [MongoDB\Driver\Manager::executeBulkWriteCommand()](#mongodb-driver-manager.executebulkwritecommand) - Ejecuta operaciones de escritura utilizando el comando bulkWrite

- [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)

- [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

# MongoDB\Driver\BulkWriteCommand::replaceOne

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommand::replaceOne — Añade una operación replaceOne

### Descripción

public **MongoDB\Driver\BulkWriteCommand::replaceOne**(
    [string](#language.types.string) $namespace,
    [array](#language.types.array)|[object](#language.types.object) $filter,
    [array](#language.types.array)|[object](#language.types.object) $replacement,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): [void](language.types.void.html)

Añade una operación replaceOne a la
[MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand). El primer documento que
coincida con filter en la colección identificada por
namespace será reemplazado.

### Parámetros

namespace ([string](#language.types.string))

        Un espacio de nombres completamente calificado (ej. "databaseName.collectionName")

filter ([array](#language.types.array)|[object](#language.types.object))

        El [» atributo de la consulta](https://www.mongodb.com/docs/manual/tutorial/query-documents/).
        Un atributo vacío hará coincidir todos los documentos de la colección.



    **Nota**:

            Al evaluar los criterios de consulta, MongoDB compara los tipos y los valores según sus propias [» reglas de comparación para los tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-type-comparison-order/), que difieren de las reglas de [comparación](#types.comparisons) y de [manipulación de tipos](#language.types.type-juggling) de PHP. Al hacer coincidir un tipo BSON especial, los criterios de consulta deben utilizar la [clase BSON](#mongodb.bson) (ej.: utilizar [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) para hacer coincidir un [» ObjectId](https://www.mongodb.com/docs/manual/reference/bson-types/#objectid)).








    replacement ([array](#language.types.array)|[object](#language.types.object))


      Un documento de reemplazo.






    options





       <caption>**options**</caption>



          Opción
          Tipo
          Descripción
          Valor por omisión







collation
[array](#language.types.array)|[object](#language.types.object)

        [» Collation](https://www.mongodb.com/docs/upcoming/reference/collation/) permite a los usuarios especificar reglas específicas del lenguaje para la comparación de cadenas, por ejemplo, reglas para mayúsculas o acentos. Al especificar una collation, el campo "locale" es obligatorio; todos los demás campos de la collation son opcionales. Para la descripción de estos campos, consúltese el [» documento Collation](https://www.mongodb.com/docs/upcoming/reference/collation/#collation-document).




        Si la collation no es especificada pero la colección tiene una collation por omisión, la operación utilizará la collation especificada para la colección. Si ninguna collation es especificada para la colección o para la operación, MongoDB utilizará el binario simple de comparación utilizado en versiones anteriores para las comparaciones de cadenas.




        Esta opción está disponible en MongoDB 3.4+ y una excepción será emitida en tiempo de ejecución si es especificada en una versión anterior.








          hint
          [string](#language.types.string)|[array](#language.types.array)|[object](#language.types.object)


            Especificación del índice. Especifique el nombre del índice como string
            o el modelo de clave del índice. Si se especifica, el sistema de consulta no
            considerará planes que no utilicen el índice sugerido.







          sort
          [array](#language.types.array)|[object](#language.types.object)


            Especifica qué documento reemplazará la operación si la consulta coincide con
            múltiples documentos. El primer documento que coincida con el orden de clasificación
            será reemplazado.







          upsert
          [bool](#language.types.boolean)

           Si filter no coincide con ningún documento,
           inserta un documento *single*. El documento será
           creado desde replacement.

          **[false](#constant.false)**








### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWriteCommand::replaceOne()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;replaceOne('db.coll', ['x' =&gt; 1], ['x' =&gt; 1, 'y' =&gt; 2]);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

?&gt;

### Ver también

- [MongoDB\Driver\BulkWriteCommand::updateOne()](#mongodb-driver-bulkwritecommand.updateone) - Añade una operación updateOne

- [MongoDB\Driver\BulkWriteCommand::updateMany()](#mongodb-driver-bulkwritecommand.updatemany) - Añade una operación updateMany

- [MongoDB\Driver\Manager::executeBulkWriteCommand()](#mongodb-driver-manager.executebulkwritecommand) - Ejecuta operaciones de escritura utilizando el comando bulkWrite

- [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)

# MongoDB\Driver\BulkWriteCommand::updateMany

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommand::updateMany — Añade una operación updateMany

### Descripción

public **MongoDB\Driver\BulkWriteCommand::updateMany**(
    [string](#language.types.string) $namespace,
    [array](#language.types.array)|[object](#language.types.object) $filter,
    [array](#language.types.array)|[object](#language.types.object) $update,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): [void](language.types.void.html)

Añade una operación updateMany a la
[MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand). Todos los documentos
que coincidan con filter en la colección identificada por
namespace serán actualizados.

### Parámetros

namespace ([string](#language.types.string))

        Un espacio de nombres completamente calificado (ej. "databaseName.collectionName")

filter ([array](#language.types.array)|[object](#language.types.object))

        El [» atributo de la consulta](https://www.mongodb.com/docs/manual/tutorial/query-documents/).
        Un atributo vacío hará coincidir todos los documentos de la colección.



    **Nota**:

            Al evaluar los criterios de consulta, MongoDB compara los tipos y los valores según sus propias [» reglas de comparación para los tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-type-comparison-order/), que difieren de las reglas de [comparación](#types.comparisons) y de [manipulación de tipos](#language.types.type-juggling) de PHP. Al hacer coincidir un tipo BSON especial, los criterios de consulta deben utilizar la [clase BSON](#mongodb.bson) (ej.: utilizar [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) para hacer coincidir un [» ObjectId](https://www.mongodb.com/docs/manual/reference/bson-types/#objectid)).








    update ([array](#language.types.array)|[object](#language.types.object))


      Un documento que contiene operadores de actualización (por ejemplo
      $set) o una
      [» pipeline de agregación](https://www.mongodb.com/docs/manual/reference/command/update/#update-with-an-aggregation-pipeline).






    options





       <caption>**options**</caption>



          Opción
          Tipo
          Descripción
          Por omisión






          arrayFilters
          [array](#language.types.array)


            Un array de documentos de filtro que determina qué elementos de array
            modificar para una operación de actualización en un campo de array. Consulte
            [» Especificar arrayFilters para operaciones de actualización de array](https://www.mongodb.com/docs/manual/reference/command/update/#update-command-arrayfilters)
            en el manual de MongoDB para obtener más información.








collation
[array](#language.types.array)|[object](#language.types.object)

        [» Collation](https://www.mongodb.com/docs/upcoming/reference/collation/) permite a los usuarios especificar reglas específicas del lenguaje para la comparación de cadenas, por ejemplo, reglas para mayúsculas o acentos. Al especificar una collation, el campo "locale" es obligatorio; todos los demás campos de la collation son opcionales. Para la descripción de estos campos, consúltese el [» documento Collation](https://www.mongodb.com/docs/upcoming/reference/collation/#collation-document).




        Si la collation no es especificada pero la colección tiene una collation por omisión, la operación utilizará la collation especificada para la colección. Si ninguna collation es especificada para la colección o para la operación, MongoDB utilizará el binario simple de comparación utilizado en versiones anteriores para las comparaciones de cadenas.




        Esta opción está disponible en MongoDB 3.4+ y una excepción será emitida en tiempo de ejecución si es especificada en una versión anterior.








          hint
          [string](#language.types.string)|[array](#language.types.array)|[object](#language.types.object)


            Especificación del índice. Especifique el nombre del índice como string o
            mediante el patrón de clave del índice. Si se especifica, el sistema de consulta solo
            considerará los planes que utilicen el índice sugerido.







          upsert
          [bool](#language.types.boolean)

           Si filter no coincide con ningún documento existente,
           insertar un documento *single*. El documento será creado
           aplicando los operadores en update a todos
           los valores de campo en filter.

          **[false](#constant.false)**








### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWriteCommand::updateMany()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;updateMany('db.coll', ['x' =&gt; ['$gt' =&gt; 1]], ['$set' =&gt; ['y' =&gt; 2]]);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

?&gt;

### Ver también

- [MongoDB\Driver\BulkWriteCommand::replaceOne()](#mongodb-driver-bulkwritecommand.replaceone) - Añade una operación replaceOne

- **MongoDB\Driver\BulkWriteCommand::updateMany()**

- [MongoDB\Driver\Manager::executeBulkWriteCommand()](#mongodb-driver-manager.executebulkwritecommand) - Ejecuta operaciones de escritura utilizando el comando bulkWrite

- [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)

# MongoDB\Driver\BulkWriteCommand::updateOne

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommand::updateOne — Añade una operación updateOne

### Descripción

public **MongoDB\Driver\BulkWriteCommand::updateOne**(
    [string](#language.types.string) $namespace,
    [array](#language.types.array)|[object](#language.types.object) $filter,
    [array](#language.types.array)|[object](#language.types.object) $update,
    [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**
): [void](language.types.void.html)

Añade una operación updateOne a la
[MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand). El primer documento que
coincida con filter en la colección identificada por
namespace será actualizado.

### Parámetros

namespace ([string](#language.types.string))

        Un espacio de nombres completamente calificado (ej. "databaseName.collectionName")

filter ([array](#language.types.array)|[object](#language.types.object))

        El [» atributo de la consulta](https://www.mongodb.com/docs/manual/tutorial/query-documents/).
        Un atributo vacío hará coincidir todos los documentos de la colección.



    **Nota**:

            Al evaluar los criterios de consulta, MongoDB compara los tipos y los valores según sus propias [» reglas de comparación para los tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-type-comparison-order/), que difieren de las reglas de [comparación](#types.comparisons) y de [manipulación de tipos](#language.types.type-juggling) de PHP. Al hacer coincidir un tipo BSON especial, los criterios de consulta deben utilizar la [clase BSON](#mongodb.bson) (ej.: utilizar [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) para hacer coincidir un [» ObjectId](https://www.mongodb.com/docs/manual/reference/bson-types/#objectid)).








    update ([array](#language.types.array)|[object](#language.types.object))


      Un documento que contiene operadores de actualización (por ejemplo
      $set) o una
      [» pipeline de agregación](https://www.mongodb.com/docs/manual/reference/command/update/#update-with-an-aggregation-pipeline).






    options





       <caption>**options**</caption>



          Opción
          Tipo
          Descripción
          Valor por omisión






          arrayFilters
          [array](#language.types.array)


            Un array de documentos de filtro que determina qué elementos de array
            deben ser modificados para una operación de actualización en un campo de array. Ver
            [» Especificar arrayFilters para operaciones de actualización de array](https://www.mongodb.com/docs/manual/reference/command/update/#update-command-arrayfilters)
            en la documentación de MongoDB para más información.








collation
[array](#language.types.array)|[object](#language.types.object)

        [» Collation](https://www.mongodb.com/docs/upcoming/reference/collation/) permite a los usuarios especificar reglas específicas del lenguaje para la comparación de cadenas, por ejemplo, reglas para mayúsculas o acentos. Al especificar una collation, el campo "locale" es obligatorio; todos los demás campos de la collation son opcionales. Para la descripción de estos campos, consúltese el [» documento Collation](https://www.mongodb.com/docs/upcoming/reference/collation/#collation-document).




        Si la collation no es especificada pero la colección tiene una collation por omisión, la operación utilizará la collation especificada para la colección. Si ninguna collation es especificada para la colección o para la operación, MongoDB utilizará el binario simple de comparación utilizado en versiones anteriores para las comparaciones de cadenas.




        Esta opción está disponible en MongoDB 3.4+ y una excepción será emitida en tiempo de ejecución si es especificada en una versión anterior.








          hint
          [string](#language.types.string)|[array](#language.types.array)|[object](#language.types.object)


            Especificación del índice. Especifique el nombre del índice como string
            o el patrón de clave del índice. Si se especifica, el sistema de consulta no
            considerará planes que no utilicen el índice sugerido.







          sort
          [array](#language.types.array)|[object](#language.types.object)


            Especifica qué documento será reemplazado por la operación si la consulta coincide
            con múltiples documentos. El primer documento que coincida con el orden de clasificación
            será reemplazado.







          upsert
          [bool](#language.types.boolean)

           Si filter no coincide con ningún documento existente,
           insertar un documento *single*. El documento será creado
           aplicando los operadores en update a todos
           los valores de campo en filter.

          **[false](#constant.false)**








### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWriteCommand::updateOne()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 1], ['$set' =&gt; ['y' =&gt; 2]]);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

?&gt;

### Ver también

- [MongoDB\Driver\BulkWriteCommand::replaceOne()](#mongodb-driver-bulkwritecommand.replaceone) - Añade una operación replaceOne

- [MongoDB\Driver\BulkWriteCommand::updateMany()](#mongodb-driver-bulkwritecommand.updatemany) - Añade una operación updateMany

- [MongoDB\Driver\Manager::executeBulkWriteCommand()](#mongodb-driver-manager.executebulkwritecommand) - Ejecuta operaciones de escritura utilizando el comando bulkWrite

- [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)

## Tabla de contenidos

- [MongoDB\Driver\BulkWriteCommand::\_\_construct](#mongodb-driver-bulkwritecommand.construct) — Crear una nueva BulkWriteCommand
- [MongoDB\Driver\BulkWriteCommand::count](#mongodb-driver-bulkwritecommand.count) — Cuenta el número de operaciones de escritura en la BulkWriteCommand
- [MongoDB\Driver\BulkWriteCommand::deleteMany](#mongodb-driver-bulkwritecommand.deletemany) — Añade una operación deleteMany
- [MongoDB\Driver\BulkWriteCommand::deleteOne](#mongodb-driver-bulkwritecommand.deleteone) — Añade una operación deleteOne
- [MongoDB\Driver\BulkWriteCommand::insertOne](#mongodb-driver-bulkwritecommand.insertone) — Añade una operación insertOne
- [MongoDB\Driver\BulkWriteCommand::replaceOne](#mongodb-driver-bulkwritecommand.replaceone) — Añade una operación replaceOne
- [MongoDB\Driver\BulkWriteCommand::updateMany](#mongodb-driver-bulkwritecommand.updatemany) — Añade una operación updateMany
- [MongoDB\Driver\BulkWriteCommand::updateOne](#mongodb-driver-bulkwritecommand.updateone) — Añade una operación updateOne

# La clase MongoDB\Driver\Session

(mongodb &gt;=1.4.0)

## Introducción

    La clase **MongoDB\Driver\Session** representa una
    sesión cliente y es devuelta por
    [MongoDB\Driver\Manager::startSession()](#mongodb-driver-manager.startsession). Los comandos,
    las consultas y las operaciones de escritura pueden luego ser asociadas a la sesión.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Session**

     {


    /* Constantes */

     const
     [string](#language.types.string)
      [TRANSACTION_NONE](#mongodb-driver-session.constants.transaction-none) = none;

    const
     [string](#language.types.string)
      [TRANSACTION_STARTING](#mongodb-driver-session.constants.transaction-starting) = starting;

    const
     [string](#language.types.string)
      [TRANSACTION_IN_PROGRESS](#mongodb-driver-session.constants.transaction-in-progress) = in_progress;

    const
     [string](#language.types.string)
      [TRANSACTION_COMMITTED](#mongodb-driver-session.constants.transaction-committed) = committed;

    const
     [string](#language.types.string)
      [TRANSACTION_ABORTED](#mongodb-driver-session.constants.transaction-aborted) = aborted;


    /* Métodos */

final public [abortTransaction](#mongodb-driver-session.aborttransaction)(): [void](language.types.void.html)
final public [advanceClusterTime](#mongodb-driver-session.advanceclustertime)([array](#language.types.array)|[object](#language.types.object) $clusterTime): [void](language.types.void.html)
final public [advanceOperationTime](#mongodb-driver-session.advanceoperationtime)([MongoDB\BSON\TimestampInterface](#class.mongodb-bson-timestampinterface) $operationTime): [void](language.types.void.html)
final public [commitTransaction](#mongodb-driver-session.committransaction)(): [void](language.types.void.html)
final private [\_\_construct](#mongodb-driver-session.construct)()
final public [endSession](#mongodb-driver-session.endsession)(): [void](language.types.void.html)
final public [getClusterTime](#mongodb-driver-session.getclustertime)(): [?](#language.types.null)[object](#language.types.object)
final public [getLogicalSessionId](#mongodb-driver-session.getlogicalsessionid)(): [object](#language.types.object)
final public [getOperationTime](#mongodb-driver-session.getoperationtime)(): [?](#language.types.null)[MongoDB\BSON\Timestamp](#class.mongodb-bson-timestamp)
final public [getServer](#mongodb-driver-session.getserver)(): [?](#language.types.null)[MongoDB\Driver\Server](#class.mongodb-driver-server)
final public [getTransactionOptions](#mongodb-driver-session.gettransactionoptions)(): [?](#language.types.null)[array](#language.types.array)
final public [getTransactionState](#mongodb-driver-session.gettransactionstate)(): [string](#language.types.string)
final public [isDirty](#mongodb-driver-session.isdirty)(): [bool](#language.types.boolean)
final public [isInTransaction](#mongodb-driver-session.isintransaction)(): [bool](#language.types.boolean)
final public [startTransaction](#mongodb-driver-session.starttransaction)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [void](language.types.void.html)

}

## Constantes predefinidas

     **[MongoDB\Driver\Session::TRANSACTION_NONE](#mongodb-driver-session.constants.transaction-none)**


       No hay transacción en curso.







     **[MongoDB\Driver\Session::TRANSACTION_STARTING](#mongodb-driver-session.constants.transaction-starting)**


       Se ha iniciado una transacción, pero no se ha enviado ninguna operación al servidor.







     **[MongoDB\Driver\Session::TRANSACTION_IN_PROGRESS](#mongodb-driver-session.constants.transaction-in-progress)**


       Una transacción está en curso.







     **[MongoDB\Driver\Session::TRANSACTION_COMMITTED](#mongodb-driver-session.constants.transaction-committed)**


       Una transacción ha sido validada.







     **[MongoDB\Driver\Session::TRANSACTION_ABORTED](#mongodb-driver-session.constants.transaction-aborted)**


       Una transacción ha sido anulada.





# MongoDB\Driver\Session::abortTransaction

(mongodb &gt;=1.5.0)

MongoDB\Driver\Session::abortTransaction — Anula una transacción

### Descripción

final public **MongoDB\Driver\Session::abortTransaction**(): [void](language.types.void.html)

Termina la transacción multi-documento y anula todas las modificaciones de datos
realizadas por las operaciones en la transacción. Es decir, la transacción se termina
sin guardar ninguna de las modificaciones realizadas por las operaciones en la transacción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) si la transacción no puede ser anulada (por ejemplo, una transacción no ha sido iniciada).

### Ver también

- [MongoDB\Driver\Manager::startSession()](#mongodb-driver-manager.startsession) - Inicia una nueva sesión de cliente para ser utilizada con este cliente

- [MongoDB\Driver\Session::commitTransaction()](#mongodb-driver-session.committransaction) - Valida la transacción

- [MongoDB\Driver\Session::startTransaction()](#mongodb-driver-session.starttransaction) - Inicia una transacción

# MongoDB\Driver\Session::advanceClusterTime

(mongodb &gt;=1.4.0)

MongoDB\Driver\Session::advanceClusterTime — Avance el tiempo del cluster para esta sesión

### Descripción

final public **MongoDB\Driver\Session::advanceClusterTime**([array](#language.types.array)|[object](#language.types.object) $clusterTime): [void](language.types.void.html)

Avance el tiempo del cluster para esta sesión. Si el tiempo del cluster es inferior o igual
al tiempo del cluster actual de la sesión, esta función no hace nada.

Al utilizar este método en conjunción con
[MongoDB\Driver\Session::advanceOperationTime()](#mongodb-driver-session.advanceoperationtime) para copiar
los tiempos del cluster y de las operaciones de otra sesión
se puede asegurar que las operaciones en esta sesión sean coherentes
con la última operación en la otra sesión.

### Parámetros

    clusterTime


      El tiempo del cluster es un documento que contiene un horodatage lógico y una firma de servidor.
      Típicamente, este valor se obtendrá llamando a
      [MongoDB\Driver\Session::getClusterTime()](#mongodb-driver-session.getclustertime) en otro
      objeto de sesión.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Session::advanceOperationTime()](#mongodb-driver-session.advanceoperationtime) - Avance el tiempo de operación para esta sesión

- [MongoDB\Driver\Session::getClusterTime()](#mongodb-driver-session.getclustertime) - Devuelve el tiempo del cluster para esta sesión

# MongoDB\Driver\Session::advanceOperationTime

(mongodb &gt;=1.4.0)

MongoDB\Driver\Session::advanceOperationTime — Avance el tiempo de operación para esta sesión

### Descripción

final public **MongoDB\Driver\Session::advanceOperationTime**([MongoDB\BSON\TimestampInterface](#class.mongodb-bson-timestampinterface) $operationTime): [void](language.types.void.html)

Avance el tiempo de operación para esta sesión. Si el tiempo de operación es inferior o igual
al tiempo de operación actual de la sesión, esta función no hace nada.

Al utilizar este método en conjunción con
[MongoDB\Driver\Session::advanceClusterTime()](#mongodb-driver-session.advanceclustertime) para copiar
los tiempos de operación y de cluster de otra sesión
se puede asegurar que las operaciones en esta sesión sean coherentes
con la última operación en la otra sesión.

### Parámetros

    operationTime


      La operación es un timestamp lógico. Típicamente, este valor
      será obtenido llamando a
      [MongoDB\Driver\Session::getOperationTime()](#mongodb-driver-session.getoperationtime) en
      otro objeto de sesión.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Session::advanceClusterTime()](#mongodb-driver-session.advanceclustertime) - Avance el tiempo del cluster para esta sesión

- [MongoDB\Driver\Session::getClusterTime()](#mongodb-driver-session.getclustertime) - Devuelve el tiempo del cluster para esta sesión

# MongoDB\Driver\Session::commitTransaction

(mongodb &gt;=1.5.0)

MongoDB\Driver\Session::commitTransaction — Valida la transacción

### Descripción

final public **MongoDB\Driver\Session::commitTransaction**(): [void](language.types.void.html)

Guarda los cambios realizados por las operaciones en la transacción
multi-documento y finaliza la transacción. Hasta la validación, ninguno de
los cambios de datos realizados por las operaciones en la transacción
es visible fuera de la transacción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una
  [MongoDB\Driver\Exception\CommandException](#class.mongodb-driver-exception-commandexception) si el
  servidor no puede validar la transacción (por ejemplo, debido a conflictos,
  problemas de red). Si la excepción contiene un elemento
  "errorLabels" y este array contiene un valor
  "TransientTransactionError" o
  "UnknownTransactionCommitResult", es seguro reintentar
  la _totalidad_ de la transacción. En versiones más
  recientes de la extensión,
  [MongoDB\Driver\Exception\RuntimeException::hasErrorLabel()](#mongodb-driver-runtimeexception.haserrorlabel)
  debería ser utilizado para probar esta situación en su lugar.

- Lanza una
  [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) si la
  transacción no puede ser validada (por ejemplo, una transacción no ha sido
  iniciada).

### Ver también

- [MongoDB\Driver\Manager::startSession()](#mongodb-driver-manager.startsession) - Inicia una nueva sesión de cliente para ser utilizada con este cliente

- [MongoDB\Driver\Session::abortTransaction()](#mongodb-driver-session.aborttransaction) - Anula una transacción

- [MongoDB\Driver\Session::startTransaction()](#mongodb-driver-session.starttransaction) - Inicia una transacción

- [MongoDB\Driver\Exception\RuntimeException::hasErrorLabel()](#mongodb-driver-runtimeexception.haserrorlabel) - Devuelve si un label de error está asociado con una excepción

# MongoDB\Driver\Session::\_\_construct

(mongodb &gt;=1.4.0)

MongoDB\Driver\Session::\_\_construct — Crear una nueva sesión (sin usar)

### Descripción

final private **MongoDB\Driver\Session::\_\_construct**()

Los objetos [MongoDB\Driver\Session](#class.mongodb-driver-session) son devueltos por
[MongoDB\Driver\Manager::startSession()](#mongodb-driver-manager.startsession) y no pueden ser
construidos directamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Ver también

- [MongoDB\Driver\Manager::startSession()](#mongodb-driver-manager.startsession) - Inicia una nueva sesión de cliente para ser utilizada con este cliente

# MongoDB\Driver\Session::endSession

(mongodb &gt;=1.5.0)

MongoDB\Driver\Session::endSession — Termina una sesión

### Descripción

final public **MongoDB\Driver\Session::endSession**(): [void](language.types.void.html)

Este método cierra una sesión existente. Si una transacción estaba asociada
a esta sesión, la transacción será anulada. Después de llamar a este
método, las aplicaciones no deben invocar otros métodos en la sesión.

**Nota**:

    Las sesiones también se cierran durante la recolección de basura. No debería ser
    necesario llamar a este método en circunstancias normales.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Manager::startSession()](#mongodb-driver-manager.startsession) - Inicia una nueva sesión de cliente para ser utilizada con este cliente

- [MongoDB\Driver\Session::abortTransaction()](#mongodb-driver-session.aborttransaction) - Anula una transacción

- [MongoDB\Driver\Session::commitTransaction()](#mongodb-driver-session.committransaction) - Valida la transacción

- [MongoDB\Driver\Session::startTransaction()](#mongodb-driver-session.starttransaction) - Inicia una transacción

# MongoDB\Driver\Session::getClusterTime

(mongodb &gt;=1.4.0)

MongoDB\Driver\Session::getClusterTime — Devuelve el tiempo del cluster para esta sesión

### Descripción

final public **MongoDB\Driver\Session::getClusterTime**(): [?](#language.types.null)[object](#language.types.object)

Devuelve el tiempo del cluster para esta sesión. Si la sesión no ha sido utilizada
para una operación y
[MongoDB\Driver\Session::advanceClusterTime()](#mongodb-driver-session.advanceclustertime) no ha
sido llamado, el tiempo del cluster será **[null](#constant.null)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tiempo del cluster para esta sesión, o **[null](#constant.null)** si la sesión no tiene
tiempo del cluster.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Session::advanceClusterTime()](#mongodb-driver-session.advanceclustertime) - Avance el tiempo del cluster para esta sesión

# MongoDB\Driver\Session::getLogicalSessionId

(mongodb &gt;=1.4.0)

MongoDB\Driver\Session::getLogicalSessionId — Devuelve el identificador de sesión lógica para esta sesión

### Descripción

final public **MongoDB\Driver\Session::getLogicalSessionId**(): [object](#language.types.object)

Devuelve el identificador de sesión lógica para esta sesión, que puede ser utilizado para
identificar las operaciones de esta sesión en el servidor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador de sesión lógica para esta sesión.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Session::getOperationTime

(mongodb &gt;=1.4.0)

MongoDB\Driver\Session::getOperationTime — Devuelve el tiempo de operación para esta sesión

### Descripción

final public **MongoDB\Driver\Session::getOperationTime**(): [?](#language.types.null)[MongoDB\BSON\Timestamp](#class.mongodb-bson-timestamp)

Devuelve el tiempo de operación para esta sesión. Si la sesión no ha sido utilizada
para una operación y
[MongoDB\Driver\Session::advanceOperationTime()](#mongodb-driver-session.advanceoperationtime) no ha
sido llamado, el tiempo de operación será **[null](#constant.null)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tiempo de operación para esta sesión, o **[null](#constant.null)** si la sesión no tiene
tiempo de operación.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Session::advanceOperationTime()](#mongodb-driver-session.advanceoperationtime) - Avance el tiempo de operación para esta sesión

# MongoDB\Driver\Session::getServer

(mongodb &gt;=1.6.0)

MongoDB\Driver\Session::getServer — Devuelve el servidor al que esta sesión está fijada

### Descripción

final public **MongoDB\Driver\Session::getServer**(): [?](#language.types.null)[MongoDB\Driver\Server](#class.mongodb-driver-server)

Devuelve el [MongoDB\Driver\Server](#class.mongodb-driver-server) al que esta sesión
está fijada. Si la sesión no está fijada a un servidor, **[null](#constant.null)**
será devuelto.

La fijación de la sesión se utiliza principalmente para las transacciones
distribuidas, ya que todas las órdenes en una transacción distribuida deben
ser enviadas a la misma instancia mongos. Este método está destinado a ser
utilizado por bibliotecas construidas sobre la extensión para permitir el uso
de un servidor fijado en lugar de invocar la selección del servidor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el [MongoDB\Driver\Server](#class.mongodb-driver-server) al que esta sesión
está fijada, o **[null](#constant.null)** si la sesión no está fijada a un servidor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Session::getTransactionOptions

(mongodb &gt;=1.7.0)

MongoDB\Driver\Session::getTransactionOptions — Devuelve las opciones para la transacción en curso

### Descripción

final public **MongoDB\Driver\Session::getTransactionOptions**(): [?](#language.types.null)[array](#language.types.array)

Devuelve las opciones para la transacción en curso.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [array](#language.types.array) que contiene las opciones de transacción actuales, o
**[null](#constant.null)** si no hay ninguna transacción en curso.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Session::getTransactionState()](#mongodb-driver-session.gettransactionstate) - Devuelve el estado de la transacción actual para esta sesión

# MongoDB\Driver\Session::getTransactionState

(mongodb &gt;=1.7.0)

MongoDB\Driver\Session::getTransactionState — Devuelve el estado de la transacción actual para esta sesión

### Descripción

final public **MongoDB\Driver\Session::getTransactionState**(): [string](#language.types.string)

Devuelve el estado de la transacción para esta sesión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el estado de la transacción actual para esta sesión.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Session::isInTransaction()](#mongodb-driver-session.isintransaction) - Indica si una transacción multi-documento está en curso

- [MongoDB\Driver\Session::getTransactionOptions()](#mongodb-driver-session.gettransactionoptions) - Devuelve las opciones para la transacción en curso

# MongoDB\Driver\Session::isDirty

(mongodb &gt;=1.13.0)

MongoDB\Driver\Session::isDirty — Indica si la sesión ha sido marcada como sucia

### Descripción

final public **MongoDB\Driver\Session::isDirty**(): [bool](#language.types.boolean)

Indica si la sesión ha sido marcada como sucia (es decir, que ha sido utilizada
con un comando que ha encontrado un error de red).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Indica si la sesión ha sido marcada como sucia.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Session::isInTransaction

(mongodb &gt;=1.6.0)

MongoDB\Driver\Session::isInTransaction — Indica si una transacción multi-documento está en curso

### Descripción

final public **MongoDB\Driver\Session::isInTransaction**(): [bool](#language.types.boolean)

Indica si una transacción multi-documento está actualmente en curso para
esta sesión. Una transacción se considera "en curso" si ha sido
iniciada pero no ha sido confirmada o anulada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si una transacción está actualmente en curso para esta sesión,
y **[false](#constant.false)** en caso contrario.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Session::getTransactionState()](#mongodb-driver-session.gettransactionstate) - Devuelve el estado de la transacción actual para esta sesión

# MongoDB\Driver\Session::startTransaction

(mongodb &gt;=1.5.0)

MongoDB\Driver\Session::startTransaction — Inicia una transacción

### Descripción

final public **MongoDB\Driver\Session::startTransaction**([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [void](language.types.void.html)

Inicia una transacción multi-documento asociada a la sesión. En un momento dado,
solo se puede tener una transacción abierta para una sesión. Después de iniciar una transacción, el objeto de sesión debe ser pasado a cada operación a través
de la opción "session" (por ejemplo
[MongoDB\Driver\Manager::executeBulkWrite()](#mongodb-driver-manager.executebulkwrite)) para asociar
esta operación a la transacción.

Las transacciones pueden ser confirmadas a través de
[MongoDB\Driver\Session::commitTransaction()](#mongodb-driver-session.committransaction), y
anuladas con
[MongoDB\Driver\Session::abortTransaction()](#mongodb-driver-session.aborttransaction).
Las transacciones también se anulan automáticamente cuando la sesión se cierra por la recolección de basura o al llamar explícitamente a
[MongoDB\Driver\Session::endSession()](#mongodb-driver-session.endsession).

### Parámetros

    options


      Las opciones pueden ser pasadas como argumento a este método. Cada elemento de este
      array de opciones reemplaza la opción correspondiente de la opción
      "defaultTransactionOptions", si se define al
      iniciar la sesión con
      [MongoDB\Driver\Manager::startSession()](#mongodb-driver-manager.startsession).







       <caption>**options**</caption>



          Option
          Type
          Description







maxCommitTimeMS
integer

El tiempo máximo en milisegundos para permitir que una sola
comando commitTransaction se ejecute.

Si se especifica, maxCommitTimeMS debe ser un entero
32 bits con signo superior o igual a cero.

readConcern
[MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern)

        Una preocupación de lectura a aplicar a la operación.




        Esta opción está disponible en MongoDB 3.2+ y se traducirá en
        una excepción en el momento de la ejecución si se especifica para
        una versión más antigua del servidor.









readPreference
[MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference)

        Una preferencia de lectura a utilizar para seleccionar un servidor
        para la operación.









writeConcern
[MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

        Una preocupación de escritura a aplicar a la operación.













### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\CommandException](#class.mongodb-driver-exception-commandexception) si la transacción no pudo ser iniciada debido a un problema en el lado del servidor (por ejemplo, un bloqueo no pudo ser obtenido).

- Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) si la transacción no pudo ser iniciada (por ejemplo, una transacción ya estaba en curso).

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.6.0


         La opción "maxCommitTimeMS" fue añadida.








### Ver también

- [MongoDB\Driver\Manager::startSession()](#mongodb-driver-manager.startsession) - Inicia una nueva sesión de cliente para ser utilizada con este cliente

- [MongoDB\Driver\Session::commitTransaction()](#mongodb-driver-session.committransaction) - Valida la transacción

- [MongoDB\Driver\Session::abortTransaction()](#mongodb-driver-session.aborttransaction) - Anula una transacción

## Tabla de contenidos

- [MongoDB\Driver\Session::abortTransaction](#mongodb-driver-session.aborttransaction) — Anula una transacción
- [MongoDB\Driver\Session::advanceClusterTime](#mongodb-driver-session.advanceclustertime) — Avance el tiempo del cluster para esta sesión
- [MongoDB\Driver\Session::advanceOperationTime](#mongodb-driver-session.advanceoperationtime) — Avance el tiempo de operación para esta sesión
- [MongoDB\Driver\Session::commitTransaction](#mongodb-driver-session.committransaction) — Valida la transacción
- [MongoDB\Driver\Session::\_\_construct](#mongodb-driver-session.construct) — Crear una nueva sesión (sin usar)
- [MongoDB\Driver\Session::endSession](#mongodb-driver-session.endsession) — Termina una sesión
- [MongoDB\Driver\Session::getClusterTime](#mongodb-driver-session.getclustertime) — Devuelve el tiempo del cluster para esta sesión
- [MongoDB\Driver\Session::getLogicalSessionId](#mongodb-driver-session.getlogicalsessionid) — Devuelve el identificador de sesión lógica para esta sesión
- [MongoDB\Driver\Session::getOperationTime](#mongodb-driver-session.getoperationtime) — Devuelve el tiempo de operación para esta sesión
- [MongoDB\Driver\Session::getServer](#mongodb-driver-session.getserver) — Devuelve el servidor al que esta sesión está fijada
- [MongoDB\Driver\Session::getTransactionOptions](#mongodb-driver-session.gettransactionoptions) — Devuelve las opciones para la transacción en curso
- [MongoDB\Driver\Session::getTransactionState](#mongodb-driver-session.gettransactionstate) — Devuelve el estado de la transacción actual para esta sesión
- [MongoDB\Driver\Session::isDirty](#mongodb-driver-session.isdirty) — Indica si la sesión ha sido marcada como sucia
- [MongoDB\Driver\Session::isInTransaction](#mongodb-driver-session.isintransaction) — Indica si una transacción multi-documento está en curso
- [MongoDB\Driver\Session::startTransaction](#mongodb-driver-session.starttransaction) — Inicia una transacción

# La clase MongoDB\Driver\ClientEncryption

(mongodb &gt;=1.7.0)

## Introducción

    La clase **MongoDB\Driver\ClientEncryption** gestiona la
    creación de claves de datos para el cifrado del lado del cliente, así como el
    cifrado y descifrado manual de los valores.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\ClientEncryption**

     {



    /* Constantes */

     const
     [string](#language.types.string)
      [AEAD_AES_256_CBC_HMAC_SHA_512_DETERMINISTIC](#mongodb-driver-clientencryption.constants.deterministic) = AEAD_AES_256_CBC_HMAC_SHA_512-Deterministic;

    const
     [string](#language.types.string)
      [AEAD_AES_256_CBC_HMAC_SHA_512_RANDOM](#mongodb-driver-clientencryption.constants.random) = AEAD_AES_256_CBC_HMAC_SHA_512-Random;

    const
     [string](#language.types.string)
      [ALGORITHM_INDEXED](#mongodb-driver-clientencryption.constants.algorithm-indexed) = Indexed;

    const
     [string](#language.types.string)
      [ALGORITHM_UNINDEXED](#mongodb-driver-clientencryption.constants.algorithm-unindexed) = Unindexed;

    const
     [string](#language.types.string)
      [ALGORITHM_RANGE](#mongodb-driver-clientencryption.constants.algorithm-range) = Range;

    const
     [string](#language.types.string)
      [QUERY_TYPE_EQUALITY](#mongodb-driver-clientencryption.constants.query-type-equality) = equality;

    const
     [string](#language.types.string)
      [QUERY_TYPE_RANGE](#mongodb-driver-clientencryption.constants.query-type-range) = range;


    /* Métodos */

final public [addKeyAltName](#mongodb-driver-clientencryption.addkeyaltname)([MongoDB\BSON\Binary](#class.mongodb-bson-binary) $keyId, [string](#language.types.string) $keyAltName): [?](#language.types.null)[object](#language.types.object)
final public [\_\_construct](#mongodb-driver-clientencryption.construct)([array](#language.types.array) $options)
final public [createDataKey](#mongodb-driver-clientencryption.createdatakey)([string](#language.types.string) $kmsProvider, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\BSON\Binary](#class.mongodb-bson-binary)
final public [decrypt](#mongodb-driver-clientencryption.decrypt)([MongoDB\BSON\Binary](#class.mongodb-bson-binary) $value): [mixed](#language.types.mixed)
final public [deleteKey](#mongodb-driver-clientencryption.deletekey)([MongoDB\BSON\Binary](#class.mongodb-bson-binary) $keyId): [object](#language.types.object)
final public [encrypt](#mongodb-driver-clientencryption.encrypt)([mixed](#language.types.mixed) $value, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\BSON\Binary](#class.mongodb-bson-binary)
final public [encryptExpression](#mongodb-driver-clientencryption.encryptexpression)([array](#language.types.array)|[object](#language.types.object) $expr, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [object](#language.types.object)
final public [getKey](#mongodb-driver-clientencryption.getkey)([MongoDB\BSON\Binary](#class.mongodb-bson-binary) $keyId): [?](#language.types.null)[object](#language.types.object)
final public [getKeyByAltName](#mongodb-driver-clientencryption.getkeybyaltname)([string](#language.types.string) $keyAltName): [?](#language.types.null)[object](#language.types.object)
final public [getKeys](#mongodb-driver-clientencryption.getkeys)(): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)
final public [removeKeyAltName](#mongodb-driver-clientencryption.removekeyaltname)([MongoDB\BSON\Binary](#class.mongodb-bson-binary) $keyId, [string](#language.types.string) $keyAltName): [?](#language.types.null)[object](#language.types.object)
final public [rewrapManyDataKey](#mongodb-driver-clientencryption.rewrapmanydatakey)([array](#language.types.array)|[object](#language.types.object) $filter, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [object](#language.types.object)

}

## Constantes predefinidas

     **[MongoDB\Driver\ClientEncryption::AEAD_AES_256_CBC_HMAC_SHA_512_DETERMINISTIC](#mongodb-driver-clientencryption.constants.aead-aes-256-cbc-hmac-sha-512-deterministic)**

      Especifica un algoritmo para [» el cifrado determinista](https://www.mongodb.com/docs/manual/core/csfle/fundamentals/encryption-algorithms/#deterministic-encryption), que es adecuado para las consultas.






     **[MongoDB\Driver\ClientEncryption::AEAD_AES_256_CBC_HMAC_SHA_512_RANDOM](#mongodb-driver-clientencryption.constants.aead-aes-256-cbc-hmac-sha-512-random)**

      Especifica un algoritmo para [» el cifrado aleatorio](https://www.mongodb.com/docs/manual/core/csfle/fundamentals/encryption-algorithms/#randomized-encryption).






     **[MongoDB\Driver\ClientEncryption::ALGORITHM_INDEXED](#mongodb-driver-clientencryption.constants.algorithm-indexed)**

      Especifica un algoritmo para una carga útil indexada y cifrada, que puede ser utilizada con el cifrado de consultas.


      Para insertar o consultar con una carga útil indexada y cifrada, el [MongoDB\Driver\Manager](#class.mongodb-driver-manager) debe ser configurado con la opción de controlador "autoEncryption". La opción de cifrado automático "bypassQueryAnalysis" puede ser **[true](#constant.true)**. La opción de cifrado automático "bypassAutoEncryption" debe ser **[false](#constant.false)**.






     **[MongoDB\Driver\ClientEncryption::ALGORITHM_UNINDEXED](#mongodb-driver-clientencryption.constants.algorithm-unindexed)**

      Especifica un algoritmo para una carga útil no indexada y cifrada.






     **[MongoDB\Driver\ClientEncryption::ALGORITHM_RANGE](#mongodb-driver-clientencryption.constants.algorithm-range)**


       Especifica un algoritmo para una carga útil cifrada por rango, que puede ser utilizada
       con el cifrado de consultas.




       Para consultar con una carga útil cifrada por rango, el
       [MongoDB\Driver\Manager](#class.mongodb-driver-manager) debe ser configurado con la opción de controlador
       "autoEncryption". La opción de cifrado automático
       "bypassQueryAnalysis" puede ser **[true](#constant.true)**. La opción de cifrado automático
       "bypassAutoEncryption" debe ser **[false](#constant.false)**.



      **Nota**:


La extensión aún no soporta las consultas de rango para los tipos de campo BSON Decimal128.

     **[MongoDB\Driver\ClientEncryption::QUERY_TYPE_EQUALITY](#mongodb-driver-clientencryption.constants.query-type-equality)**


       Especifica un tipo de consulta de igualdad, que es utilizado en conjunción con
       **[MongoDB\Driver\ClientEncryption::ALGORITHM_INDEXED](#mongodb-driver-clientencryption.constants.algorithm-indexed)**.







     **[MongoDB\Driver\ClientEncryption::QUERY_TYPE_RANGE](#mongodb-driver-clientencryption.constants.query-type-range)**


       Especifica un tipo de consulta de rango, que es utilizado en conjunción con
       **[MongoDB\Driver\ClientEncryption::ALGORITHM_RANGE](#mongodb-driver-clientencryption.constants.algorithm-range)**.





## Historial de cambios

        Versión
        Descripción






        PECL mongodb 2.0.0


          Eliminar **[MongoDB\Driver\ClientEncryption::ALGORITHM_INDEXED](#mongodb-driver-clientencryption.constants.algorithm-indexed)**
          y

          Eliminado **[MongoDB\Driver\ClientEncryption::ALGORITHM_RANGE_PREVIEW](#mongodb-driver-clientencryption.constants.algorithm-range-preview)**
          y **[MongoDB\Driver\ClientEncryption::QUERY_TYPE_RANGE_PREVIEW](#mongodb-driver-clientencryption.constants.query-type-range-preview)**.







        PECL mongodb 1.20.0


          Añadido **[MongoDB\Driver\ClientEncryption::ALGORITHM_RANGE](#mongodb-driver-clientencryption.constants.algorithm-range)**
          y **[MongoDB\Driver\ClientEncryption::QUERY_TYPE_RANGE](#mongodb-driver-clientencryption.constants.query-type-range)**.




          Deprecado **[MongoDB\Driver\ClientEncryption::ALGORITHM_RANGE_PREVIEW](#mongodb-driver-clientencryption.constants.algorithm-range-preview)**
          y **[MongoDB\Driver\ClientEncryption::QUERY_TYPE_RANGE_PREVIEW](#mongodb-driver-clientencryption.constants.query-type-range-preview)**.







        PECL mongodb 1.16.0

         Añadido **[MongoDB\Driver\ClientEncryption::ALGORITHM_RANGE_PREVIEW](#mongodb-driver-clientencryption.constants.algorithm-range-preview)**
         y **[MongoDB\Driver\ClientEncryption::QUERY_TYPE_RANGE_PREVIEW](#mongodb-driver-clientencryption.constants.query-type-range-preview)**.




        PECL mongodb 1.14.0

         Añadido **[MongoDB\Driver\ClientEncryption::ALGORITHM_INDEXED](#mongodb-driver-clientencryption.constants.algorithm-indexed)**,
         **[MongoDB\Driver\ClientEncryption::ALGORITHM_UNINDEXED](#mongodb-driver-clientencryption.constants.algorithm-unindexed)**,
         y **[MongoDB\Driver\ClientEncryption::QUERY_TYPE_EQUALITY](#mongodb-driver-clientencryption.constants.query-type-equality)**.






## Ver también

    - [MongoDB\Driver\Manager::createClientEncryption()](#mongodb-driver-manager.createclientencryption)

# MongoDB\Driver\ClientEncryption::addKeyAltName

(mongodb &gt;=1.15.0)

MongoDB\Driver\ClientEncryption::addKeyAltName — Añade un nombre alternativo a un documento clave

### Descripción

final public **MongoDB\Driver\ClientEncryption::addKeyAltName**([MongoDB\BSON\Binary](#class.mongodb-bson-binary) $keyId, [string](#language.types.string) $keyAltName): [?](#language.types.null)[object](#language.types.object)

Añade keyAltName al conjunto de nombres alternativos para el
documento clave con el UUID dado keyId.

### Parámetros

    keyId


      Una instancia [MongoDB\BSON\Binary](#class.mongodb-bson-binary) con el subtipo 4
      (UUID) que identifica el documento clave.







    keyAltName


      Nombre alternativo a añadir al documento clave.


### Valores devueltos

Devuelve la versión anterior del documento clave, o **[null](#constant.null)** si no se encuentra ningún documento
correspondiente.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otros errores.

    ### Ver también
    - [MongoDB\Driver\ClientEncryption::getKeyByAltName()](#mongodb-driver-clientencryption.getkeybyaltname) - Devuelve un documento clave por un nombre alternativo

    - [MongoDB\Driver\ClientEncryption::removeKeyAltName()](#mongodb-driver-clientencryption.removekeyaltname) - Elimina un nombre alternativo de un documento clave

    # MongoDB\Driver\ClientEncryption::\_\_construct

    (mongodb &gt;=1.14.0)

MongoDB\Driver\ClientEncryption::\_\_construct — Crear un nuevo objeto ClientEncryption

### Descripción

final public **MongoDB\Driver\ClientEncryption::\_\_construct**([array](#language.types.array) $options)

Construye un nuevo objeto [MongoDB\Driver\ClientEncryption](#class.mongodb-driver-clientencryption) con las opciones especificadas.

### Parámetros

    options





       <caption>**options**</caption>



          Option
          Type
          Description






          keyVaultClient
          [MongoDB\Driver\Manager](#class.mongodb-driver-manager)
          El gestor utilizado para enrutar las solicitudes de clave de datos. Esta opción es requerida (a diferencia de [MongoDB\Driver\Manager::createClientEncryption()](#mongodb-driver-manager.createclientencryption)).




          keyVaultNamespace
          [string](#language.types.string)
          Un nombre de espacio completamente calificado (por ejemplo "databaseName.collectionName") denotando la colección que contiene todas las claves de datos utilizadas para el cifrado y descifrado. Esta opción es requerida.





          kmsProviders
          [array](#language.types.array)


            Un documento que contiene la configuración de uno o varios
            proveedores KMS, que se utilizan para cifrar las claves de datos.
            Los proveedores soportados son "aws",
            "azure", "gcp" y
            "local", y al menos uno debe ser especificado.




            Si se especifica un documento vacío para "aws",
            "azure", o "gcp", el controlador
            intentará configurar el proveedor utilizando
            [» Automatic Credentials](https://github.com/mongodb/specifications/blob/master/source/client-side-encryption/client-side-encryption.rst#automatic-credentials).




            El formato para "aws" es el siguiente:





aws: {
accessKeyId: &lt;string&gt;,
secretAccessKey: &lt;string&gt;,
sessionToken: &lt;optional string&gt;
}

            El formato para "azure" es el siguiente:





azure: {
tenantId: &lt;string&gt;,
clientId: &lt;string&gt;,
clientSecret: &lt;string&gt;,
identityPlatformEndpoint: &lt;optional string&gt; // Defaults to "login.microsoftonline.com"

}

            El formato para "gcp" es el siguiente:





gcp: {
email: &lt;string&gt;,
privateKey: &lt;base64 string&gt;|&lt;MongoDB\BSON\Binary&gt;,
endpoint: &lt;optional string&gt; // Defaults to "oauth2.googleapis.com"

}

            El formato para "kmip" es el siguiente:





kmip: {
endpoint: &lt;string&gt;
}

            El formato para "local" es el siguiente:





local: {
// 96-byte master key used to encrypt/decrypt data keys
key: &lt;base64 string&gt;|&lt;MongoDB\BSON\Binary&gt;
}

tlsOptions
[array](#language.types.array)

    Un documento que contiene la configuración TLS de uno o varios
    proveedores KMS.
    Los proveedores soportados son "aws",
    "azure", "gcp" y
    "kmip".
    Todos los proveedores soportan las siguientes opciones:

&lt;provider&gt;: {
tlsCaFile: &lt;optional string&gt;,
tlsCertificateKeyFile: &lt;optional string&gt;,
tlsCertificateKeyFilePassword: &lt;optional string&gt;,
tlsDisableOCSPEndpointCheck: &lt;optional bool&gt;
}

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) si la extensión no ha sido compilada con soporte libmongocrypt

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.16.0


         El proveedor AWS KMS para el cifrado del lado del cliente acepta ahora
         una opción "sessionToken", que puede ser utilizada para
         autenticarse con credenciales temporales de AWS.




         Adición de "tlsDisableOCSPEndpointCheck" a
         la opción "tlsOptions".




         Si se especifica un documento vacío para el proveedor KMS "azure" o
         "gcp", el controlador intentará configurar el proveedor utilizando las
         [» credenciales automáticas](https://github.com/mongodb/specifications/blob/master/source/client-side-encryption/client-side-encryption.rst#automatic-credentials).







       PECL mongodb 1.15.0


         Si se especifica un documento vacío para el proveedor KMS "aws",
         el controlador intentará configurar el proveedor utilizando las
         [» credenciales automáticas](https://github.com/mongodb/specifications/blob/master/source/client-side-encryption/client-side-encryption.rst#automatic-credentials).








### Ver también

- [MongoDB\Driver\Manager::createClientEncryption()](#mongodb-driver-manager.createclientencryption) - Crear un nuevo objeto ClientEncryption

- [» La criptografía explícita del lado del cliente (manual)](https://www.mongodb.com/docs/manual/core/security-explicit-client-side-encryption/) en el manual de MongoDB

# MongoDB\Driver\ClientEncryption::createDataKey

(mongodb &gt;=1.7.0)

MongoDB\Driver\ClientEncryption::createDataKey — Crear un documento clave

### Descripción

final public **MongoDB\Driver\ClientEncryption::createDataKey**([string](#language.types.string) $kmsProvider, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\BSON\Binary](#class.mongodb-bson-binary)

Crear un nuevo documento clave e insertarlo en la colección de claves.

### Parámetros

    kmsProvider


      El proveedor KMS (por ejemplo "local",
      "aws") que se utilizará para cifrar el nuevo documento clave.







    options





       <caption>**Opciones de datos de clave**</caption>



          Opción
          Tipo
          Descripción






          masterKey
          [array](#language.types.array)


            El documento masterKey identifica una clave específica de KMS utilizada para
            cifrar el nuevo documento clave. Esta opción es requerida a menos que
            kmsProvider sea "local".








    <caption>**Opciones del proveedor "aws"**</caption>



       Opción
       Tipo
       Descripción






       region
       string
       Requis.



       key
       string
       Requis. El nombre de recurso Amazon (ARN) de la clave maestra del cliente AWS (CMK).



       endpoint
       string
       Opcional. Un identificador de host alternativo para enviar las solicitudes KMS. Puede incluir el número de puerto.











    <caption>**Opciones del proveedor "azure"**</caption>



       Opción
       Tipo
       Descripción






       keyVaultEndpoint
       string
       Requis. Host con puerto opcional (por ejemplo, "example.vault.azure.net").



       keyName
       string
       Requis.



       keyVersion
       string
       Opcional. Una versión específica de la clave nombrada. Por omisión, se utiliza la versión primaria de la clave.











    <caption>**Opciones del proveedor "gcp"**</caption>



       Opción
       Tipo
       Descripción






       projectId
       string
       Requis.



       location
       string
       Requis.



       keyRing
       string
       Requis.



       keyName
       string
       Requis.



       keyVersion
       string
       Opcional. Una versión específica de la clave nombrada. Por omisión, se utiliza la versión primaria de la clave.



       endpoint
       string
       Opcional. Host con puerto opcional. El valor por omisión es "cloudkms.googleapis.com".











    <caption>**Opciones del proveedor "kmip"**</caption>



       Opción
       Tipo
       Descripción






       keyId
       string
       Opcional. Identificador único de un objeto gestionado de 96 bytes de datos secretos KMIP. Si no se especifica, el controlador crea un objeto gestionado aleatorio de 96 bytes de datos secretos KMIP.



       endpoint
       string
       Opcional. Host con puerto opcional.



       delegated
       bool
       Opcional. Si es verdadero, esta clave debe ser descifrada por el servidor KMIP.












          keyAltNames
          [array](#language.types.array)


            Una lista opcional de nombres alternativos de string utilizados para referenciar una clave.
            Si una clave se crea con nombres alternativos, entonces el cifrado puede referirse
            a la clave por el nombre alternativo único en lugar de por
            _id.







          keyMaterial
          [MongoDB\BSON\Binary](#class.mongodb-bson-binary)


            Un valor opcional de 96 bytes a utilizar como material de clave
            para el documento clave en curso de creación. Si keyMaterial es dado,
            el material de clave personalizado se utiliza para cifrar y descifrar
            los datos. De lo contrario, el material de clave para el nuevo documento clave es
            generado a partir de un dispositivo aleatorio criptográficamente seguro.












### Valores devueltos

Devuelve un identificador del nuevo documento clave como un objeto
[MongoDB\BSON\Binary](#class.mongodb-bson-binary) con el subtipo 4 (UUID).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otros errores.

    ### Historial de cambios

         Versión
         Descripción






         PECL mongodb 1.20.0

          Adición de "delegated" a las opciones masterKey del proveedor KMIP.




         PECL mongodb 1.15.0

          Adición de la opción "keyMaterial".




         PECL mongodb 1.10.0

          Azure y GCP son ahora soportados como proveedores KMS para
          el cifrado lado-cliente.


    # MongoDB\Driver\ClientEncryption::decrypt

    (mongodb &gt;=1.7.0)

MongoDB\Driver\ClientEncryption::decrypt — Desencripta un valor

### Descripción

final public **MongoDB\Driver\ClientEncryption::decrypt**([MongoDB\BSON\Binary](#class.mongodb-bson-binary) $value): [mixed](#language.types.mixed)

Desencripta el valor.

### Parámetros

    value


      Una instancia de [MongoDB\BSON\Binary](#class.mongodb-bson-binary) con el subtipo 6
      que contiene el valor encriptado.


### Valores devueltos

Devuelve el valor desencriptado tal como fue pasado a
[MongoDB\Driver\ClientEncryption::encrypt()](#mongodb-driver-clientencryption.encrypt).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\EncryptionException](#class.mongodb-driver-exception-encryptionexception) si ocurre un error durante el desencriptado del valor

### Ver también

- [MongoDB\Driver\ClientEncryption::encrypt()](#mongodb-driver-clientencryption.encrypt) - Cifra un valor

# MongoDB\Driver\ClientEncryption::deleteKey

(mongodb &gt;=1.15.0)

MongoDB\Driver\ClientEncryption::deleteKey — Elimina un documento clave

### Descripción

final public **MongoDB\Driver\ClientEncryption::deleteKey**([MongoDB\BSON\Binary](#class.mongodb-bson-binary) $keyId): [object](#language.types.object)

Elimina el documento clave con el UUID dado keyId
de la colección de almacén de claves.

### Parámetros

    keyId


      Una instancia de [MongoDB\BSON\Binary](#class.mongodb-bson-binary) con el subtipo 4
      (UUID) identificando el documento clave.


### Valores devueltos

Devuelve el resultado de la operación interna deleteOne sobre
la colección de almacén de claves.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otros errores.

    # MongoDB\Driver\ClientEncryption::encrypt

    (mongodb &gt;=1.7.0)

MongoDB\Driver\ClientEncryption::encrypt — Cifra un valor

### Descripción

final public **MongoDB\Driver\ClientEncryption::encrypt**([mixed](#language.types.mixed) $value, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\BSON\Binary](#class.mongodb-bson-binary)

Cifra el valor.

### Parámetros

    value


      El valor a cifrar. Cualquier valor que pueda ser insertado en MongoDB puede
      ser cifrado utilizando este método.








    options






        <caption>**Opciones de cifrado**</caption>



              Opción
              Tipo
              Descripción






              algorithm

                [string](#language.types.string)



                  El algoritmo de cifrado a utilizar. Esta opción es requerida. Especifique una de las siguientes constantes de
                  [ClientEncryption](#mongodb-driver-clientencryption.constants):




                  -
                    **[MongoDB\Driver\ClientEncryption::AEAD_AES_256_CBC_HMAC_SHA_512_DETERMINISTIC](#mongodb-driver-clientencryption.constants.aead-aes-256-cbc-hmac-sha-512-deterministic)**


                  -
                    **[MongoDB\Driver\ClientEncryption::AEAD_AES_256_CBC_HMAC_SHA_512_RANDOM](#mongodb-driver-clientencryption.constants.aead-aes-256-cbc-hmac-sha-512-random)**


                  -
                    **[MongoDB\Driver\ClientEncryption::ALGORITHM_INDEXED](#mongodb-driver-clientencryption.constants.algorithm-indexed)**


                  -
                    **[MongoDB\Driver\ClientEncryption::ALGORITHM_UNINDEXED](#mongodb-driver-clientencryption.constants.algorithm-unindexed)**


                  -
                    **[MongoDB\Driver\ClientEncryption::ALGORITHM_RANGE](#mongodb-driver-clientencryption.constants.algorithm-range)**







              contentionFactor

                [int](#language.types.integer)



                  El factor de contención para evaluar las consultas con cargas útiles cifradas indexadas.




                  Esta opción se aplica únicamente y solo puede ser especificada cuando
                  algorithm es
                  **[MongoDB\Driver\ClientEncryption::ALGORITHM_INDEXED](#mongodb-driver-clientencryption.constants.algorithm-indexed)** o
                  **[MongoDB\Driver\ClientEncryption::ALGORITHM_RANGE](#mongodb-driver-clientencryption.constants.algorithm-range)**.







              keyAltName

                [string](#language.types.string)



                  Identifica un documento de colección de cofre de claves por keyAltName. Esta opción es mutuamente exclusiva
                  con keyId y una de las dos es requerida.







              keyId

                [MongoDB\BSON\Binary](#class.mongodb-bson-binary)



                  Identifica una clave de datos por _id. El valor es un UUID (subtipo binario 4). Esta opción es mutuamente
                  exclusiva con keyAltName y una de las dos es requerida.







              queryType

                [string](#language.types.string)



                  El tipo de consulta para evaluar las consultas con cargas útiles cifradas indexadas. Especifique una de las siguientes constantes de
                  [ClientEncryption](#mongodb-driver-clientencryption.constants):




                  -
                    **[MongoDB\Driver\ClientEncryption::QUERY_TYPE_EQUALITY](#mongodb-driver-clientencryption.constants.query-type-equality)**


                  -
                    **[MongoDB\Driver\ClientEncryption::QUERY_TYPE_RANGE](#mongodb-driver-clientencryption.constants.query-type-range)**




                  Esta opción se aplica únicamente y solo puede ser especificada cuando
                  algorithm es
                  **[MongoDB\Driver\ClientEncryption::ALGORITHM_INDEXED](#mongodb-driver-clientencryption.constants.algorithm-indexed)** o
                  **[MongoDB\Driver\ClientEncryption::ALGORITHM_RANGE](#mongodb-driver-clientencryption.constants.algorithm-range)**.







              rangeOpts

                [array](#language.types.array)



                  Opciones de índice para un campo de cifrado interrogeable que soporta consultas "range". Las opciones a continuación deben coincidir
                  con los valores definidos en encryptedFields de la colección objetivo. Para los tipos de campo BSON double y decimal128,
                  min, max y precision deben ser todos definidos o todos no definidos.







                    <caption>**Opciones de índice de rango**</caption>



                          Opción
                          Tipo
                          Descripción






                          min

                            [mixed](#language.types.mixed)

                          Requisito si precision está definido. El valor BSON mínimo del rango.



                          max

                            [mixed](#language.types.mixed)

                          Requisito si precision está definido. El valor BSON máximo del rango.



                          sparsity

                            [int](#language.types.integer)

                          Opcional. Entero positivo de 64 bits.



                          precision

                            [int](#language.types.integer)


                           Opcional. Entero positivo de 32 bits que especifica la precisión a utilizar
                           para el cifrado explícito. Solo puede ser definido para los tipos
                           de campo BSON double o decimal128.




                        trimFactor
                        [int](#language.types.integer)
                        Opcional. Entero positivo de 32 bits.














### Valores devueltos

Devuelve el valor cifrado como un objeto
[MongoDB\Driver\ClientEncryption::decrypt()](#mongodb-driver-clientencryption.decrypt) de subtipo 6.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\EncryptionException](#class.mongodb-driver-exception-encryptionexception) si ocurre un error durante el cifrado del valor

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.20.0

        Se añadió la opción de rango "trimFactor". La opción de rango
        "sparsity" es ahora opcional.




       PECL mongodb 1.16.0

        Se añadió la opción "rangeOpts".




       PECL mongodb 1.14.0

        Se añadieron las opciones "contentionFactor" y
        "queryType".





### Ver también

- [MongoDB\Driver\ClientEncryption::decrypt()](#mongodb-driver-clientencryption.decrypt) - Desencripta un valor

- [MongoDB\Driver\ClientEncryption::encryptExpression()](#mongodb-driver-clientencryption.encryptexpression) - Cifra una expresión de coincidencia o agregación

# MongoDB\Driver\ClientEncryption::encryptExpression

(mongodb &gt;=1.16.0)

MongoDB\Driver\ClientEncryption::encryptExpression — Cifra una expresión de coincidencia o agregación

### Descripción

final public **MongoDB\Driver\ClientEncryption::encryptExpression**([array](#language.types.array)|[object](#language.types.object) $expr, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [object](#language.types.object)

Cifra una expresión de coincidencia o agregación para consultar un índice de rango.

Para consultar con una carga útil cifrada por rango, la opción del controlador [MongoDB\Driver\Manager](#class.mongodb-driver-manager) debe ser configurada con la opción del controlador "autoEncryption". La opción de cifrado automático "bypassQueryAnalysis" puede ser **[true](#constant.true)**. La opción de cifrado automático "bypassAutoEncryption" debe ser **[false](#constant.false)**.

**Nota**:

La extensión aún no admite consultas de rango para los tipos de campo BSON Decimal128.

### Parámetros

    expr


      La expresión de coincidencia o agregación a cifrar. Las expresiones deben
      utilizar al menos uno de los operadores $gt, $gte,
      $lt o $lte. Se utiliza un único operador de
      comparación.




      Un ejemplo de expresión de coincidencia admitida (aplicable a consultas y a la etapa de agregación
      $match) es el siguiente:





[
'$and' =&gt; [
        [ '&lt;field&gt;' =&gt; [ '$gt' =&gt; '&lt;value1&gt;' ] ],
[ '&lt;field&gt;' =&gt; [ '$lte' =&gt; '&lt;value2&gt;' ] ],
],
]

      Un ejemplo de expresión de agregación admitida es el siguiente:





[
'$and' =&gt; [
        [ '$gte' =&gt; [ '&lt;fieldPath&gt;', '&lt;value1&gt;' ] ],
[ '$lt' =&gt; [ '&lt;fieldPath&gt;', '&lt;value2&gt;' ] ],
],
]

    options






        <caption>**Opciones de cifrado**</caption>



              Opción
              Tipo
              Descripción






              algorithm

                [string](#language.types.string)



                  El algoritmo de cifrado a utilizar. Esta opción es requerida. Especifique una de las siguientes constantes de
                  [ClientEncryption](#mongodb-driver-clientencryption.constants):




                  -
                    **[MongoDB\Driver\ClientEncryption::AEAD_AES_256_CBC_HMAC_SHA_512_DETERMINISTIC](#mongodb-driver-clientencryption.constants.aead-aes-256-cbc-hmac-sha-512-deterministic)**


                  -
                    **[MongoDB\Driver\ClientEncryption::AEAD_AES_256_CBC_HMAC_SHA_512_RANDOM](#mongodb-driver-clientencryption.constants.aead-aes-256-cbc-hmac-sha-512-random)**


                  -
                    **[MongoDB\Driver\ClientEncryption::ALGORITHM_INDEXED](#mongodb-driver-clientencryption.constants.algorithm-indexed)**


                  -
                    **[MongoDB\Driver\ClientEncryption::ALGORITHM_UNINDEXED](#mongodb-driver-clientencryption.constants.algorithm-unindexed)**


                  -
                    **[MongoDB\Driver\ClientEncryption::ALGORITHM_RANGE](#mongodb-driver-clientencryption.constants.algorithm-range)**







              contentionFactor

                [int](#language.types.integer)



                  El factor de contención para evaluar las consultas con cargas útiles cifradas indexadas.




                  Esta opción se aplica únicamente y solo puede ser especificada cuando
                  algorithm es
                  **[MongoDB\Driver\ClientEncryption::ALGORITHM_INDEXED](#mongodb-driver-clientencryption.constants.algorithm-indexed)** o
                  **[MongoDB\Driver\ClientEncryption::ALGORITHM_RANGE](#mongodb-driver-clientencryption.constants.algorithm-range)**.







              keyAltName

                [string](#language.types.string)



                  Identifica un documento de colección de cofre de claves por keyAltName. Esta opción es mutuamente exclusiva
                  con keyId y una de las dos es requerida.







              keyId

                [MongoDB\BSON\Binary](#class.mongodb-bson-binary)



                  Identifica una clave de datos por _id. El valor es un UUID (subtipo binario 4). Esta opción es mutuamente
                  exclusiva con keyAltName y una de las dos es requerida.







              queryType

                [string](#language.types.string)



                  El tipo de consulta para evaluar las consultas con cargas útiles cifradas indexadas. Especifique una de las siguientes constantes de
                  [ClientEncryption](#mongodb-driver-clientencryption.constants):




                  -
                    **[MongoDB\Driver\ClientEncryption::QUERY_TYPE_EQUALITY](#mongodb-driver-clientencryption.constants.query-type-equality)**


                  -
                    **[MongoDB\Driver\ClientEncryption::QUERY_TYPE_RANGE](#mongodb-driver-clientencryption.constants.query-type-range)**




                  Esta opción se aplica únicamente y solo puede ser especificada cuando
                  algorithm es
                  **[MongoDB\Driver\ClientEncryption::ALGORITHM_INDEXED](#mongodb-driver-clientencryption.constants.algorithm-indexed)** o
                  **[MongoDB\Driver\ClientEncryption::ALGORITHM_RANGE](#mongodb-driver-clientencryption.constants.algorithm-range)**.







              rangeOpts

                [array](#language.types.array)



                  Opciones de índice para un campo de cifrado interrogeable que soporta consultas "range". Las opciones a continuación deben coincidir
                  con los valores definidos en encryptedFields de la colección objetivo. Para los tipos de campo BSON double y decimal128,
                  min, max y precision deben ser todos definidos o todos no definidos.







                    <caption>**Opciones de índice de rango**</caption>



                          Opción
                          Tipo
                          Descripción






                          min

                            [mixed](#language.types.mixed)

                          Requisito si precision está definido. El valor BSON mínimo del rango.



                          max

                            [mixed](#language.types.mixed)

                          Requisito si precision está definido. El valor BSON máximo del rango.



                          sparsity

                            [int](#language.types.integer)

                          Opcional. Entero positivo de 64 bits.



                          precision

                            [int](#language.types.integer)


                           Opcional. Entero positivo de 32 bits que especifica la precisión a utilizar
                           para el cifrado explícito. Solo puede ser definido para los tipos
                           de campo BSON double o decimal128.




                        trimFactor
                        [int](#language.types.integer)
                        Opcional. Entero positivo de 32 bits.














### Valores devueltos

Devuelve la expresión cifrada como objeto.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\EncryptionException](#class.mongodb-driver-exception-encryptionexception) si ocurre un error durante el cifrado de la expresión

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.20.0

        Añadida la opción de rango "trimFactor". La opción de rango
        "sparsity" es ahora opcional.





### Ver también

- [MongoDB\Driver\Manager::\_\_construct()](#mongodb-driver-manager.construct) - Crea un nuevo Manager MongoDB

- [MongoDB\Driver\ClientEncryption::encrypt()](#mongodb-driver-clientencryption.encrypt) - Cifra un valor

# MongoDB\Driver\ClientEncryption::getKey

(mongodb &gt;=1.15.0)

MongoDB\Driver\ClientEncryption::getKey — Devuelve un documento clave

### Descripción

final public **MongoDB\Driver\ClientEncryption::getKey**([MongoDB\BSON\Binary](#class.mongodb-bson-binary) $keyId): [?](#language.types.null)[object](#language.types.object)

Encuentra un documento clave único en la colección de almacén de claves con el UUID dado
keyId.

### Parámetros

    keyId


      Una instancia de [MongoDB\BSON\Binary](#class.mongodb-bson-binary) con el subtipo 4
      (UUID) identificando el documento clave.


### Valores devueltos

Devuelve el documento clave, o **[null](#constant.null)** si no se encontró ningún documento.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otros errores.

    # MongoDB\Driver\ClientEncryption::getKeyByAltName

    (mongodb &gt;=1.15.0)

MongoDB\Driver\ClientEncryption::getKeyByAltName — Devuelve un documento clave por un nombre alternativo

### Descripción

final public **MongoDB\Driver\ClientEncryption::getKeyByAltName**([string](#language.types.string) $keyAltName): [?](#language.types.null)[object](#language.types.object)

Encuentra un documento clave único en la colección de almacén de claves con
el nombre alternativo dado keyAltName.

### Parámetros

    keyAltName


      El nombre alternativo para el documento clave.


### Valores devueltos

Devuelve el documento clave, o **[null](#constant.null)** si no se encontró ningún documento.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otros errores.

    ### Ver también
    - [MongoDB\Driver\ClientEncryption::addKeyAltName()](#mongodb-driver-clientencryption.addkeyaltname) - Añade un nombre alternativo a un documento clave

    - [MongoDB\Driver\ClientEncryption::removeKeyAltName()](#mongodb-driver-clientencryption.removekeyaltname) - Elimina un nombre alternativo de un documento clave

    # MongoDB\Driver\ClientEncryption::getKeys

    (mongodb &gt;=1.15.0)

MongoDB\Driver\ClientEncryption::getKeys — Devuelve todos los documentos clave

### Descripción

final public **MongoDB\Driver\ClientEncryption::getKeys**(): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

Encuentra todos los documentos clave en la colección de almacén de claves.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna un [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor) en caso de éxito.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otros errores.

    # MongoDB\Driver\ClientEncryption::removeKeyAltName

    (mongodb &gt;=1.15.0)

MongoDB\Driver\ClientEncryption::removeKeyAltName — Elimina un nombre alternativo de un documento clave

### Descripción

final public **MongoDB\Driver\ClientEncryption::removeKeyAltName**([MongoDB\BSON\Binary](#class.mongodb-bson-binary) $keyId, [string](#language.types.string) $keyAltName): [?](#language.types.null)[object](#language.types.object)

Elimina keyAltName del conjunto de nombres alternativos para
el documento clave con el UUID dado keyId.

### Parámetros

    keyId


      Una instancia de [MongoDB\BSON\Binary](#class.mongodb-bson-binary) con el subtipo 4
      (UUID) que identifica el documento clave.







    keyAltName


      El nombre alternativo a eliminar del documento clave.


### Valores devueltos

Devuelve la versión anterior del documento clave, o **[null](#constant.null)** si no se encontró ningún documento.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otros errores.

    ### Ver también
    - [MongoDB\Driver\ClientEncryption::addKeyAltName()](#mongodb-driver-clientencryption.addkeyaltname) - Añade un nombre alternativo a un documento clave

    - [MongoDB\Driver\ClientEncryption::getKeyByAltName()](#mongodb-driver-clientencryption.getkeybyaltname) - Devuelve un documento clave por un nombre alternativo

    # MongoDB\Driver\ClientEncryption::rewrapManyDataKey

    (mongodb &gt;=1.15.0)

MongoDB\Driver\ClientEncryption::rewrapManyDataKey — Re-embala las claves de datos

### Descripción

final public **MongoDB\Driver\ClientEncryption::rewrapManyDataKey**([array](#language.types.array)|[object](#language.types.object) $filter, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [object](#language.types.object)

Re-embala (es decir, descifra y vuelve a cifrar) cero o más claves de datos
en la colección de caja fuerte de claves que coinciden con el filter dado.

Si la opción "provider" no se especifica, las claves de datos
coincidentes serán re-embaladas con su proveedor KMS actual. De lo contrario, las claves de datos
coincidentes serán recifradas según las opciones "provider" y
"masterKey" especificadas.

### Parámetros

filter ([array](#language.types.array)|[object](#language.types.object))

        El [» atributo de la consulta](https://www.mongodb.com/docs/manual/tutorial/query-documents/).
        Un atributo vacío hará coincidir todos los documentos de la colección.



    **Nota**:

            Al evaluar los criterios de consulta, MongoDB compara los tipos y los valores según sus propias [» reglas de comparación para los tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-type-comparison-order/), que difieren de las reglas de [comparación](#types.comparisons) y de [manipulación de tipos](#language.types.type-juggling) de PHP. Al hacer coincidir un tipo BSON especial, los criterios de consulta deben utilizar la [clase BSON](#mongodb.bson) (ej.: utilizar [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) para hacer coincidir un [» ObjectId](https://www.mongodb.com/docs/manual/reference/bson-types/#objectid)).








    options





       <caption>**Opciones de RewrapManyDataKey**</caption>



          Option
          Type
          Description






          provider
          [string](#language.types.string)


            El proveedor KMS (por ejemplo "local",
            "aws") que será utilizado para recifrar las
            claves de datos coincidentes.




            Si un proveedor KMS no se especifica, las claves de datos
            coincidentes serán recifradas con su proveedor KMS actual.







          masterKey
          [array](#language.types.array)


            La clave masterKey identifica una clave específica a un KMS utilizada para
            cifrar la nueva clave de datos. Esta opción no debe ser especificada sin
            la opción "provider". Esta opción es requerida si
            "provider" es especificado y no es
            "local".








    <caption>**Opciones del proveedor "aws"**</caption>



       Opción
       Tipo
       Descripción






       region
       string
       Requis.



       key
       string
       Requis. El nombre de recurso Amazon (ARN) de la clave maestra del cliente AWS (CMK).



       endpoint
       string
       Opcional. Un identificador de host alternativo para enviar las solicitudes KMS. Puede incluir el número de puerto.











    <caption>**Opciones del proveedor "azure"**</caption>



       Opción
       Tipo
       Descripción






       keyVaultEndpoint
       string
       Requis. Host con puerto opcional (por ejemplo, "example.vault.azure.net").



       keyName
       string
       Requis.



       keyVersion
       string
       Opcional. Una versión específica de la clave nombrada. Por omisión, se utiliza la versión primaria de la clave.











    <caption>**Opciones del proveedor "gcp"**</caption>



       Opción
       Tipo
       Descripción






       projectId
       string
       Requis.



       location
       string
       Requis.



       keyRing
       string
       Requis.



       keyName
       string
       Requis.



       keyVersion
       string
       Opcional. Una versión específica de la clave nombrada. Por omisión, se utiliza la versión primaria de la clave.



       endpoint
       string
       Opcional. Host con puerto opcional. El valor por omisión es "cloudkms.googleapis.com".











    <caption>**Opciones del proveedor "kmip"**</caption>



       Opción
       Tipo
       Descripción






       keyId
       string
       Opcional. Identificador único de un objeto gestionado de 96 bytes de datos secretos KMIP. Si no se especifica, el controlador crea un objeto gestionado aleatorio de 96 bytes de datos secretos KMIP.



       endpoint
       string
       Opcional. Host con puerto opcional.



       delegated
       bool
       Opcional. Si es verdadero, esta clave debe ser descifrada por el servidor KMIP.

















### Valores devueltos

Devuelve un objeto, que eventualmente tendrá una propiedad
bulkWriteResult conteniendo el resultado de la operación
bulkWrite interna en forma de un objeto. Si ninguna clave de datos
coincidió con el filtro o si la escritura no fue acusada, la propiedad
bulkWriteResult será **[null](#constant.null)**.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\EncryptionException](#class.mongodb-driver-exception-encryptionexception) si ocurre un error durante el descifrado o recifrado de una clave de datos.

    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en otros errores.

    ### Historial de cambios

         Versión
         Descripción






         PECL mongodb 1.20.0

          Adición de "delegated" a las opciones masterKey del proveedor KMIP.


## Tabla de contenidos

- [MongoDB\Driver\ClientEncryption::addKeyAltName](#mongodb-driver-clientencryption.addkeyaltname) — Añade un nombre alternativo a un documento clave
- [MongoDB\Driver\ClientEncryption::\_\_construct](#mongodb-driver-clientencryption.construct) — Crear un nuevo objeto ClientEncryption
- [MongoDB\Driver\ClientEncryption::createDataKey](#mongodb-driver-clientencryption.createdatakey) — Crear un documento clave
- [MongoDB\Driver\ClientEncryption::decrypt](#mongodb-driver-clientencryption.decrypt) — Desencripta un valor
- [MongoDB\Driver\ClientEncryption::deleteKey](#mongodb-driver-clientencryption.deletekey) — Elimina un documento clave
- [MongoDB\Driver\ClientEncryption::encrypt](#mongodb-driver-clientencryption.encrypt) — Cifra un valor
- [MongoDB\Driver\ClientEncryption::encryptExpression](#mongodb-driver-clientencryption.encryptexpression) — Cifra una expresión de coincidencia o agregación
- [MongoDB\Driver\ClientEncryption::getKey](#mongodb-driver-clientencryption.getkey) — Devuelve un documento clave
- [MongoDB\Driver\ClientEncryption::getKeyByAltName](#mongodb-driver-clientencryption.getkeybyaltname) — Devuelve un documento clave por un nombre alternativo
- [MongoDB\Driver\ClientEncryption::getKeys](#mongodb-driver-clientencryption.getkeys) — Devuelve todos los documentos clave
- [MongoDB\Driver\ClientEncryption::removeKeyAltName](#mongodb-driver-clientencryption.removekeyaltname) — Elimina un nombre alternativo de un documento clave
- [MongoDB\Driver\ClientEncryption::rewrapManyDataKey](#mongodb-driver-clientencryption.rewrapmanydatakey) — Re-embala las claves de datos

# La clase MongoDB\Driver\ServerApi

(mongodb &gt;=1.10.0)

## Introducción

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\ServerApi**

     implements
       [MongoDB\BSON\Serializable](#class.mongodb-bson-serializable),  [Serializable](#class.serializable) {

    /* Constantes */

     const
     [string](#language.types.string)
      [MongoDB\Driver\ServerAPI::V1](#mongodb-driver-serverapi.constants.v1) = "1";


    /* Métodos */

final public [bsonSerialize](#mongodb-driver-serverapi.bsonserialize)(): [stdClass](#class.stdclass)
final public [\_\_construct](#mongodb-driver-serverapi.construct)([string](#language.types.string) $version, [?](#language.types.null)[bool](#language.types.boolean) $strict = **[null](#constant.null)**, [?](#language.types.null)[bool](#language.types.boolean) $deprecationErrors = **[null](#constant.null)**)

}

## Constantes predefinidas

     **[MongoDB\Driver\ServerApi::V1](#mongodb-driver-serverapi.constants.v1)**

      Versión 1 de la API del servidor.




## Ejemplos

    **Ejemplo #1 Declarar una versión de API en un gestor**

&lt;?php

use MongoDB\Driver\Manager;
use MongoDB\Driver\ServerApi;

$v1 = new ServerApi(ServerApi::v1);
$manager = new Manager('mongodb://localhost:27017', [], ['serverApi' =&gt; $v1]);

$command = new MongoDB\Driver\Command(['buildInfo' =&gt; 1]);

try {
$cursor = $manager-&gt;executeCommand('admin', $command);
} catch(MongoDB\Driver\Exception $e) {
echo $e-&gt;getMessage(), "\n";
exit;
}

/\* La comando buildInfo devuelve un documento único, por lo que es necesario acceder

- al primer resultado del cursor. \*/
  $buildInfo = $cursor-&gt;toArray()[0];

echo $buildInfo-&gt;version, "\n";

?&gt;

    El ejemplo anterior mostrará:

4.9.0-alpha7-49-gb968ca0

    **Ejemplo #2 Declarar una versión de API estricta en un gestor**



     El siguiente ejemplo establece el flag strict, que
     indica al servidor rechazar cualquier comando que no forme parte de la versión
     de API declarada. Esto provoca un error al ejecutar el comando buildInfo.

&lt;?php

use MongoDB\Driver\Manager;
use MongoDB\Driver\ServerApi;

$v1 = new ServerApi(ServerApi::v1, true);
$manager = new Manager('mongodb://localhost:27017', [], ['serverApi' =&gt; $v1]);

$command = new MongoDB\Driver\Command(['buildInfo' =&gt; 1]);

try {
$cursor = $manager-&gt;executeCommand('admin', $command);
} catch(MongoDB\Driver\Exception $e) {
echo $e-&gt;getMessage(), "\n";
exit;
}

/\* El comando buildInfo devuelve un documento único, por lo que es necesario acceder

- al primer resultado del cursor. \*/
  $buildInfo = $cursor-&gt;toArray()[0];

echo $buildInfo-&gt;version, "\n";

?&gt;

    El ejemplo anterior mostrará:

Provided apiStrict:true, but the command buildInfo is not in API Version 1

# MongoDB\Driver\ServerApi::bsonSerialize

(mongodb &gt;=1.10.0)

MongoDB\Driver\ServerApi::bsonSerialize — Devuelve un objeto para la serialización BSON

### Descripción

final public **MongoDB\Driver\ServerApi::bsonSerialize**(): [stdClass](#class.stdclass)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto para la serialización del ServerApi en BSON.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\BSON\Serializable::bsonSerialize()](#mongodb-bson-serializable.bsonserialize) - Proporciona un array o un documento a serializar como BSON

# MongoDB\Driver\ServerApi::\_\_construct

(mongodb &gt;=1.10.0)

MongoDB\Driver\ServerApi::\_\_construct — Crear una nueva instancia de ServerApi

### Descripción

final public **MongoDB\Driver\ServerApi::\_\_construct**([string](#language.types.string) $version, [?](#language.types.null)[bool](#language.types.boolean) $strict = **[null](#constant.null)**, [?](#language.types.null)[bool](#language.types.boolean) $deprecationErrors = **[null](#constant.null)**)

Crear una nueva instancia de [MongoDB\Driver\ServerApi](#class.mongodb-driver-serverapi) utilizada para
declarar una versión de API al crear un
[MongoDB\Driver\Manager](#class.mongodb-driver-manager).

### Parámetros

    version


      Una versión de API de servidor.




      Las versiones de API admitidas se proporcionan como constantes
      en [MongoDB\Driver\ServerApi](#class.mongodb-driver-serverapi). La única versión de API
      admitida es **[MongoDB\Driver\ServerApi::V1](#mongodb-driver-serverapi.constants.v1)**.






    strict


      Si el parámetro strict se establece en **[true](#constant.true)**, el
      servidor devolverá un error para cualquier comando que no forme parte de la
      versión de API especificada. Si no se proporciona ningún valor, se utiliza el valor predeterminado del servidor
      (**[false](#constant.false)**).






    deprecationErrors


      Si el parámetro deprecationErrors se establece en **[true](#constant.true)**,
      el servidor devolverá un error al utilizar un comando que está obsoleto en
      la versión de API especificada. Si no se proporciona ningún valor, se utiliza el valor predeterminado del servidor
      (**[false](#constant.false)**).


## Tabla de contenidos

- [MongoDB\Driver\ServerApi::bsonSerialize](#mongodb-driver-serverapi.bsonserialize) — Devuelve un objeto para la serialización BSON
- [MongoDB\Driver\ServerApi::\_\_construct](#mongodb-driver-serverapi.construct) — Crear una nueva instancia de ServerApi

# La clase MongoDB\Driver\WriteConcern

(mongodb &gt;=1.0.0)

## Introducción

    **MongoDB\Driver\WriteConcern** describe el nivel
    de acuse de recibo solicitado por MongoDB para las operaciones de escritura
    a un mongod autónomo o a conjuntos de réplicas
    o a clusters fragmentados. En los clusters fragmentados, las instancias
    de mongos transmiten el control de escritura a los
    fragmentos.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\WriteConcern**


     implements
       [MongoDB\BSON\Serializable](#class.mongodb-bson-serializable),  [Serializable](#class.serializable) {

    /* Constantes */

     const
     [string](#language.types.string)
      [MAJORITY](#mongodb-driver-writeconcern.constants.majority) = "majority";


    /* Métodos */

final public [bsonSerialize](#mongodb-driver-writeconcern.bsonserialize)(): [stdClass](#class.stdclass)
final public [\_\_construct](#mongodb-driver-writeconcern.construct)([string](#language.types.string)|[int](#language.types.integer) $w, [?](#language.types.null)[int](#language.types.integer) $wtimeout = **[null](#constant.null)**, [?](#language.types.null)[bool](#language.types.boolean) $journal = **[null](#constant.null)**)
final public [getJournal](#mongodb-driver-writeconcern.getjournal)(): [?](#language.types.null)[bool](#language.types.boolean)
final public [getW](#mongodb-driver-writeconcern.getw)(): [string](#language.types.string)|[int](#language.types.integer)|[null](#language.types.null)
final public [getWtimeout](#mongodb-driver-writeconcern.getwtimeout)(): [int](#language.types.integer)
final public [isDefault](#mongodb-driver-writeconcern.isdefault)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[MongoDB\Driver\WriteConcern::MAJORITY](#mongodb-driver-writeconcern.constants.majority)**


       La mayoría de todos los miembros del conjunto; árbitros, los mismos no votantes,
       los miembros pasivos, los miembros ocultos y los miembros en espera están
       todos incluidos en la definición de una preocupación de escritura de la mayoría.





## Historial de cambios

        Versión
        Descripción






        PECL mongodb 1.7.0

         Implementa [Serializable](#class.serializable).




        PECL mongodb 1.2.0

         Implementa [MongoDB\BSON\Serializable](#class.mongodb-bson-serializable).






# MongoDB\Driver\WriteConcern::bsonSerialize

(mongodb &gt;=1.2.0)

MongoDB\Driver\WriteConcern::bsonSerialize — Devuelve un objeto para la serialización BSON

### Descripción

final public **MongoDB\Driver\WriteConcern::bsonSerialize**(): [stdClass](#class.stdclass)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto para la serialización del WriteConcern en BSON.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 MongoDB\Driver\WriteConcern::bsonSerialize()** con el write concern majority

&lt;?php

$wc = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY);
var_dump($wc-&gt;bsonSerialize());

echo "\n", MongoDB\BSON\Document::fromPHP($wc)-&gt;toRelaxedExtendedJSON();

?&gt;

Resultado del ejemplo anterior es similar a:

object(stdClass)#2 (1) {
["w"]=&gt;
string(8) "majority"
}

{ "w" : "majority" }

**Ejemplo #2 MongoDB\Driver\WriteConcern::bsonSerialize()** con el wtimeout y el journal

&lt;?php

$wc = new MongoDB\Driver\WriteConcern(2, 1000, true);
var_dump($wc-&gt;bsonSerialize());

echo "\n", MongoDB\BSON\Document::fromPHP($wc)-&gt;toRelaxedExtendedJSON();

?&gt;

Resultado del ejemplo anterior es similar a:

object(stdClass)#2 (3) {
["w"]=&gt;
int(2)
["j"]=&gt;
bool(true)
["wtimeout"]=&gt;
int(1000)
}

{ "w" : 2, "j" : true, "wtimeout" : 1000 }

### Ver también

- [MongoDB\BSON\Serializable::bsonSerialize()](#mongodb-bson-serializable.bsonserialize) - Proporciona un array o un documento a serializar como BSON

- [» Referencia de Write Concern](https://www.mongodb.com/docs/manual/reference/write-concern/)

# MongoDB\Driver\WriteConcern::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteConcern::\_\_construct — Construye un WriteConcern

### Descripción

final public **MongoDB\Driver\WriteConcern::\_\_construct**([string](#language.types.string)|[int](#language.types.integer) $w, [?](#language.types.null)[int](#language.types.integer) $wtimeout = **[null](#constant.null)**, [?](#language.types.null)[bool](#language.types.boolean) $journal = **[null](#constant.null)**)

Construye un nuevo [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern), que es un objeto de valor inmutable.

### Parámetros

    w





       <caption>**Preocupación de escritura**</caption>



          Valor
          Descripción






          1

           Solicita el acuse de recibo de que la operación de escritura se ha propagado
           al mongod autónomo o al principal en un conjunto de
           réplicas. Es la preocupación de escritura por omisión para MongoDB.




          0

           No solicita ningún acuse de recibo de la operación de escritura.
           Sin embargo, puede devolver información sobre las excepciones de socket y los errores de red a la aplicación.




          &lt;entero superior a 1&gt;

           Los números superiores a 1 son válidos únicamente para los conjuntos de
           réplicas para solicitar el acuse de recibo del número especificado de miembros, incluyendo el principal.




          **[MongoDB\Driver\WriteConcern::MAJORITY](#mongodb-driver-writeconcern.constants.majority)**


            Solicita el acuse de recibo de que las operaciones de escritura se han
            propagado a la mayoría de los nodos votantes, incluyendo el principal, y
            han sido escritas en el journal en disco para esos nodos.




            Antes de MongoDB 3.0, es la mayoría de los miembros del conjunto de
            réplicas (y no solo de los nodos votantes).







          string

           Un valor de string es interpretado como un conjunto de etiquetas. Solicita
           el acuse de recibo de que las operaciones de escritura se han propagado a
           un miembro del conjunto de réplicas con la etiqueta especificada.











    wtimeout


      Tiempo máximo de espera (en milisegundos) antes de que los secundarios
      fallen.




      wtimeout hará que las operaciones de escritura devuelvan
      un error (**WriteConcernError**) después del
      tiempo especificado. Cuando estas operaciones de escritura devuelvan, MongoDB
      no cancelará los datos modificados antes de que las preocupaciones
      de escritura alcancen el tiempo límite wtimeout.




      Si se especifica, wtimeout debe ser un entero con signo de 64 bits
      mayor o igual a cero.







       <caption>**Tiempo máximo de espera de las preocupaciones de escritura**</caption>



          Valor
          Descripción






          0
          Bloquea indefinidamente. Es el comportamiento por omisión.



          &lt;entero superior a 0&gt;

           Número de milisegundos a esperar antes de devolver.











    journal


      Espera antes de que mongod aplique la escritura al journal.


### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si w es inválido o wtimeout es negativo o superior a los límites de un entero con signo de 32 bits.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.7.0

        El parámetro wTimeout acepta ahora valores de 64 bits.





### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\WriteConcern::\_\_construct()**

&lt;?php

/_ Solicita una confirmación de las solicitudes de escritura para la mayoría de los nodos
del conjunto de réplicas _/
$wc = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 500);

/_ Solicita una confirmación de las solicitudes de escritura, configurada por la etiqueta
"MultipleDC" _/
$wc = new MongoDB\Driver\WriteConcern("MultipleDC", 500);

?&gt;

### Ver también

- [» Write Concern reference](https://www.mongodb.com/docs/manual/reference/write-concern/)

# MongoDB\Driver\WriteConcern::getJournal

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteConcern::getJournal — Devuelve la opción "journal" del WriteConcern

### Descripción

final public **MongoDB\Driver\WriteConcern::getJournal**(): [?](#language.types.null)[bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la opción "journal" del WriteConcern.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\WriteConcern::getJournal()**

&lt;?php

$wc = new MongoDB\Driver\WriteConcern(1);
var_dump($wc-&gt;getJournal());

$wc = new MongoDB\Driver\WriteConcern(1, 0, true);
var_dump($wc-&gt;getJournal());

$wc = new MongoDB\Driver\WriteConcern(1, 0, false);
var_dump($wc-&gt;getJournal());

?&gt;

El ejemplo anterior mostrará:

NULL
bool(true)
bool(false)

### Ver también

- [» Referencia de Write Concern](https://www.mongodb.com/docs/manual/reference/write-concern/)

# MongoDB\Driver\WriteConcern::getW

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteConcern::getW — Devuelve la opción "w" del WriteConcern

### Descripción

final public **MongoDB\Driver\WriteConcern::getW**(): [string](#language.types.string)|[int](#language.types.integer)|[null](#language.types.null)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la opción "w" del WriteConcern.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\WriteConcern::getW()**

&lt;?php

$wc = new MongoDB\Driver\WriteConcern(1);
var_dump($wc-&gt;getW());

$wc = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY);
var_dump($wc-&gt;getW());

?&gt;

El ejemplo anterior mostrará:

int(1)
string(8) "majority"

### Ver también

- [» Referencia de Write Concern](https://www.mongodb.com/docs/manual/reference/write-concern/)

# MongoDB\Driver\WriteConcern::getWtimeout

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteConcern::getWtimeout — Devuelve la opción "wtimeout" del WriteConcern

### Descripción

final public **MongoDB\Driver\WriteConcern::getWtimeout**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la opción "wtimeout" del WriteConcern.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.7.0

        En sistemas de 32 bits, este método siempre truncará el valor
        wTimeout si excede el rango de 32 bits. En tal caso, se emitirá
        una advertencia.





### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\WriteConcern::getWtimeout()**

&lt;?php

$wc = new MongoDB\Driver\WriteConcern(1);
var_dump($wc-&gt;getWtimeout());

$wc = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 3000);
var_dump($wc-&gt;getWtimeout());

?&gt;

El ejemplo anterior mostrará:

int(0)
int(3000)

### Ver también

- [» Referencia de Write Concern](https://www.mongodb.com/docs/manual/reference/write-concern/)

# MongoDB\Driver\WriteConcern::isDefault

(mongodb &gt;=1.3.0)

MongoDB\Driver\WriteConcern::isDefault — Verifica si es el WriteConcern por omisión

### Descripción

final public **MongoDB\Driver\WriteConcern::isDefault**(): [bool](#language.types.boolean)

Devuelve si es el WriteConcern por omisión (es decir, sin opciones especificadas). Este método está principalmente destinado a ser utilizado en conjunción con
[MongoDB\Driver\Manager::getWriteConcern()](#mongodb-driver-manager.getwriteconcern) para determinar
si el Manager ha sido construido sin ninguna opción de WriteConcern.

El controlador no incluirá un WriteConcern por omisión en sus operaciones de escritura
(por ejemplo [MongoDB\Driver\Manager::executeBulkWrite()](#mongodb-driver-manager.executebulkwrite)) para permitir que el servidor aplique su propio WriteConcern por omisión, que puede haber sido
[» modificado](https://www.mongodb.com/docs/manual/core/replica-set-write-concern/#modify-default-write-concern).
Las bibliotecas que acceden al WriteConcern del Manager para incluirlo en sus propios
comandos de escritura deberían utilizar este método para asegurarse de que los WriteConcern por omisión
no están definidos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si es el WriteConcern por omisión y **[false](#constant.false)** en caso contrario.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\WriteConcern::isDefault()**

&lt;?php

$wc = new MongoDB\Driver\WriteConcern(1);
var_dump($wc-&gt;isDefault());

$manager = new MongoDB\Driver\Manager('mongodb://127.0.0.1/?w=majority');
$wc = $manager-&gt;getWriteConcern();
var_dump($wc-&gt;isDefault());

$manager = new MongoDB\Driver\Manager('mongodb://127.0.0.1/');
$wc = $manager-&gt;getWriteConcern();
var_dump($wc-&gt;isDefault());

?&gt;

El ejemplo anterior mostrará:

bool(false)
bool(false)
bool(true)

### Ver también

- [MongoDB\Driver\Manager::getWriteConcern()](#mongodb-driver-manager.getwriteconcern) - Devuelve el WriteConcern para el Manager

- [» Modificar el Write Concern por omisión](https://www.mongodb.com/docs/manual/core/replica-set-write-concern/#modify-default-write-concern) en el manual de MongoDB

- [» Referencia de Write Concern](https://www.mongodb.com/docs/manual/reference/write-concern/)

## Tabla de contenidos

- [MongoDB\Driver\WriteConcern::bsonSerialize](#mongodb-driver-writeconcern.bsonserialize) — Devuelve un objeto para la serialización BSON
- [MongoDB\Driver\WriteConcern::\_\_construct](#mongodb-driver-writeconcern.construct) — Construye un WriteConcern
- [MongoDB\Driver\WriteConcern::getJournal](#mongodb-driver-writeconcern.getjournal) — Devuelve la opción "journal" del WriteConcern
- [MongoDB\Driver\WriteConcern::getW](#mongodb-driver-writeconcern.getw) — Devuelve la opción "w" del WriteConcern
- [MongoDB\Driver\WriteConcern::getWtimeout](#mongodb-driver-writeconcern.getwtimeout) — Devuelve la opción "wtimeout" del WriteConcern
- [MongoDB\Driver\WriteConcern::isDefault](#mongodb-driver-writeconcern.isdefault) — Verifica si es el WriteConcern por omisión

# La clase MongoDB\Driver\ReadPreference

(mongodb &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\ReadPreference**


     implements
       [MongoDB\BSON\Serializable](#class.mongodb-bson-serializable),  [Serializable](#class.serializable) {

    /* Constantes */

     const
     [string](#language.types.string)
      [PRIMARY](#mongodb-driver-readpreference.constants.primary) = primary;

    const
     [string](#language.types.string)
      [PRIMARY_PREFERRED](#mongodb-driver-readpreference.constants.primary-preferred) = primaryPreferred;

    const
     [string](#language.types.string)
      [SECONDARY](#mongodb-driver-readpreference.constants.secondary) = secondary;

    const
     [string](#language.types.string)
      [SECONDARY_PREFERRED](#mongodb-driver-readpreference.constants.secondary-preferred) = secondaryPreferred;

    const
     [string](#language.types.string)
      [NEAREST](#mongodb-driver-readpreference.constants.nearest) = nearest;

    const
     [int](#language.types.integer)
      [NO_MAX_STALENESS](#mongodb-driver-readpreference.constants.no-max-staleness) = -1;

    const
     [int](#language.types.integer)
      [SMALLEST_MAX_STALENESS_SECONDS](#mongodb-driver-readpreference.constants.smallest-max-staleness-seconds) = 90;


    /* Métodos */

final public [bsonSerialize](#mongodb-driver-readpreference.bsonserialize)(): [stdClass](#class.stdclass)
final public [\_\_construct](#mongodb-driver-readpreference.construct)([string](#language.types.string) $mode, [?](#language.types.null)[array](#language.types.array) $tagSets = **[null](#constant.null)**, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**)
final public [getHedge](#mongodb-driver-readpreference.gethedge)(): [?](#language.types.null)[object](#language.types.object)
final public [getMaxStalenessSeconds](#mongodb-driver-readpreference.getmaxstalenessseconds)(): [int](#language.types.integer)
final public [getMode](#mongodb-driver-readpreference.getmode)(): [int](#language.types.integer)
final public [getModeString](#mongodb-driver-readpreference.getmodestring)(): [string](#language.types.string)
final public [getTagSets](#mongodb-driver-readpreference.gettagsets)(): [array](#language.types.array)

}

## Constantes predefinidas

     **[MongoDB\Driver\ReadPreference::PRIMARY](#mongodb-driver-readpreference.constants.primary)**


       Todas las operaciones se leen desde el primario actual del conjunto de réplicas.
       Esta es la preferencia de lectura por omisión para MongoDB.







     **[MongoDB\Driver\ReadPreference::PRIMARY_PREFERRED](#mongodb-driver-readpreference.constants.primary-preferred)**


       En la mayoría de las situaciones, las operaciones se leen desde el
       primario, pero si no está disponible, las operaciones se leen desde
       los miembros secundarios.







     **[MongoDB\Driver\ReadPreference::SECONDARY](#mongodb-driver-readpreference.constants.secondary)**


       Todas las operaciones se leen desde los miembros secundarios del conjunto de réplicas.







     **[MongoDB\Driver\ReadPreference::SECONDARY_PREFERRED](#mongodb-driver-readpreference.constants.secondary-preferred)**


       En la mayoría de los casos, las operaciones se leen desde los miembros
       secundarios, pero si ningún miembro secundario está disponible, las
       operaciones se leen desde el primario.







     **[MongoDB\Driver\ReadPreference::NEAREST](#mongodb-driver-readpreference.constants.nearest)**


       Las operaciones se leen desde el miembro del conjunto de réplicas con la
       menor latencia de red, independientemente del tipo de miembro.







     **[MongoDB\Driver\ReadPreference::NO_MAX_STALENESS](#mongodb-driver-readpreference.constants.no-max-staleness)**


       El valor por omisión de la opción "maxStalenessSeconds"
       es no especificar ningún límite sobre la obsolescencia máxima, lo que
       significa que el controlador no tendrá en cuenta el desfase de un
       secundario al elegir dónde dirigir una operación de lectura.







     **[MongoDB\Driver\ReadPreference::SMALLEST_MAX_STALENESS_SECONDS](#mongodb-driver-readpreference.constants.smallest-max-staleness-seconds)**


       El valor mínimo de la opción "maxStalenessSeconds"
       es de 90 segundos. El controlador estima la obsolescencia de los segundos verificando
       periódicamente la última fecha de escritura de cada miembro del conjunto de réplicas. Como
       estos controles son poco frecuentes, la estimación de la obsolescencia es aproximada. Por
       lo tanto, el controlador no puede aplicar un valor de obsolescencia máxima inferior a 90 segundos.





## Historial de cambios

        Versión
        Descripción






        PECL mongodb 2.0.0


          Eliminar las constantes
          **[MongoDB\Driver\ReadPreference::RP_PRIMARY](#mongodb-driver-readpreference.constants.rp-primary)**,
          **[MongoDB\Driver\ReadPreference::RP_PRIMARY_PREFERRED](#mongodb-driver-readpreference.constants.rp-primary-preferred)**,
          **[MongoDB\Driver\ReadPreference::RP_SECONDARY](#mongodb-driver-readpreference.constants.rp-secondary)**,
          **[MongoDB\Driver\ReadPreference::RP_SECONDARY_PREFERRED](#mongodb-driver-readpreference.constants.rp-secondary-preferred)**,
          y **[MongoDB\Driver\ReadPreference::RP_NEAREST](#mongodb-driver-readpreference.constants.rp-nearest)**.
          El método **getMode()** también fue eliminado.







        PECL mongodb 1.7.0


          Añadir las constantes
          **[MongoDB\Driver\ReadPreference::PRIMARY](#mongodb-driver-readpreference.constants.primary)**,
          **[MongoDB\Driver\ReadPreference::PRIMARY_PREFERRED](#mongodb-driver-readpreference.constants.primary-preferred)**,
          **[MongoDB\Driver\ReadPreference::SECONDARY](#mongodb-driver-readpreference.constants.secondary)**,
          **[MongoDB\Driver\ReadPreference::SECONDARY_PREFERRED](#mongodb-driver-readpreference.constants.secondary-preferred)**,
          **[MongoDB\Driver\ReadPreference::NEAREST](#mongodb-driver-readpreference.constants.nearest)**.




          Implementa [Serializable](#class.serializable).







        PECL mongodb 1.2.0


          Añadir las constantes
          **[MongoDB\Driver\ReadPreference::NO_MAX_STALENESS](#mongodb-driver-readpreference.constants.no-max-staleness)**
          y
          **[MongoDB\Driver\ReadPreference::SMALLEST_MAX_STALENESS_SECONDS](#mongodb-driver-readpreference.constants.smallest-max-staleness-seconds)**.




          Implementa [MongoDB\BSON\Serializable](#class.mongodb-bson-serializable).









# MongoDB\Driver\ReadPreference::bsonSerialize

(mongodb &gt;=1.2.0)

MongoDB\Driver\ReadPreference::bsonSerialize — Devuelve un objeto para la serialización BSON

### Descripción

final public **MongoDB\Driver\ReadPreference::bsonSerialize**(): [stdClass](#class.stdclass)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto para la serialización de la ReadPreference en BSON.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 MongoDB\Driver\ReadPreference::bsonSerialize()** con una preferencia de lectura primaria

&lt;?php

$rp = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::PRIMARY);
var_dump($rp-&gt;bsonSerialize());

echo "\n", MongoDB\BSON\Document::fromPHP($rp)-&gt;toRelaxedExtendedJSON();

?&gt;

Resultado del ejemplo anterior es similar a:

object(stdClass)#2 (1) {
["mode"]=&gt;
string(7) "primary"
}

{ "mode" : "primary" }

**Ejemplo #2 MongoDB\Driver\ReadPreference::bsonSerialize()** con una preferencia de lectura secundaria

&lt;?php

$rp = new MongoDB\Driver\ReadPreference(
    MongoDB\Driver\ReadPreference::SECONDARY,
    [
        ['dc' =&gt; 'ny'],
        ['dc' =&gt; 'sf', 'use' =&gt; 'reporting'],
        []
    ]
);
var_dump($rp-&gt;bsonSerialize());

echo "\n", MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($rp));

?&gt;

Resultado del ejemplo anterior es similar a:

object(stdClass)#2 (2) {
["mode"]=&gt;
string(9) "secondary"
["tags"]=&gt;
array(3) {
[0]=&gt;
object(stdClass)#1 (1) {
["dc"]=&gt;
string(2) "ny"
}
[1]=&gt;
object(stdClass)#5 (2) {
["dc"]=&gt;
string(2) "sf"
["use"]=&gt;
string(9) "reporting"
}
[2]=&gt;
object(stdClass)#4 (0) {
}
}
}

{ "mode" : "secondary", "tags" : [ { "dc" : "ny" }, { "dc" : "sf", "use" : "reporting" }, { } ] }

**Ejemplo #3 MongoDB\Driver\ReadPreference::bsonSerialize()** con una preferencia de lectura secundaria y un tiempo máximo de retraso

&lt;?php

$rp = new MongoDB\Driver\ReadPreference(
    MongoDB\Driver\ReadPreference::SECONDARY,
    null,
    ['maxStalenessSeconds' =&gt; 120]
);
var_dump($rp-&gt;bsonSerialize());

echo "\n", MongoDB\BSON\Document::fromPHP($rp)-&gt;toRelaxedExtendedJSON();

?&gt;

Resultado del ejemplo anterior es similar a:

object(stdClass)#2 (2) {
["mode"]=&gt;
string(9) "secondary"
["maxStalenessSeconds"]=&gt;
int(120)
}

{ "mode" : "secondary", "maxStalenessSeconds" : 120 }

### Ver también

- [MongoDB\BSON\Serializable::bsonSerialize()](#mongodb-bson-serializable.bsonserialize) - Proporciona un array o un documento a serializar como BSON

- [» Referencia de Read Preference](https://www.mongodb.com/docs/manual/core/read-preference/)

# MongoDB\Driver\ReadPreference::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\Driver\ReadPreference::\_\_construct — Crear una nueva ReadPreference

### Descripción

final public **MongoDB\Driver\ReadPreference::\_\_construct**([string](#language.types.string) $mode, [?](#language.types.null)[array](#language.types.array) $tagSets = **[null](#constant.null)**, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**)

Construye un nuevo [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference), que es un objeto de valor inmutable.

### Parámetros

    mode





       <caption>**Modo de preferencia de lectura**</caption>



          Valor
          Descripción






          "primary"


            Todas las operaciones leídas desde el conjunto de réplicas actual primario.
            Este es el modo de preferencia de lectura por omisión para MongoDB.







          "primaryPreferred"


            En la mayoría de las situaciones, las operaciones son leídas desde el
            primario, pero si no está disponible, las operaciones son leídas desde un miembro secundario.







          "secondary"


            Todas las operaciones son leídas desde los miembros secundarios del conjunto de réplicas.







          "secondaryPreferred"


            En la mayoría de los casos, las operaciones son leídas por miembros secundarios, pero si ningún miembro secundario está disponible, las operaciones son leídas desde el primario.







          "nearest"


            Operaciones leídas desde el miembro del conjunto de réplicas con la latencia de red más baja, independientemente del tipo de miembro.














    tagSets


      Los conjuntos de etiquetas permiten dirigir las operaciones de lectura a miembros específicos de un conjunto de réplicas. Este parámetro debe ser un array de arrays asociativos, que contienen cada uno cero o más pares clave/valor. Al seleccionar un servidor para una operación de lectura, el controlador intenta seleccionar un nodo que contenga todas las etiquetas de un conjunto (es decir, el array asociativo de pares clave/valor). Si la selección falla, el controlador intentará con los siguientes conjuntos. Un conjunto de etiquetas vacío (array()) corresponde a cualquier nodo y puede ser utilizado como respaldo.




      Las etiquetas no son compatibles con el modo "primary" y, en general, solo se aplican cuando se selecciona un miembro secundario de un conjunto para una operación de lectura. Sin embargo, el modo "nearest", cuando se combina con un conjunto de etiquetas, selecciona el miembro correspondiente con la latencia de red más baja. Este miembro puede ser primario o secundario.






    options





       <caption>**options**</caption>



          Opción
          Tipo
          Descripción






          hedge
          [object](#language.types.object)|[array](#language.types.array)

           Especifica si se debe utilizar o no [» las lecturas cruzadas](https://www.mongodb.com/docs/manual/core/sharded-cluster-query-router/#mongos-hedged-reads), que son soportadas desde MongoDB 4.4+ para las consultas compartidas.



            El servidor de lecturas cruzadas está disponible para todas las lecturas de referencias no primarias, y está activado por omisión al utilizar el modo "nearest". Esta opción permite activar explícitamente el servidor de lecturas cruzadas para las lecturas de referencias no primarias especificando ['enabled' =&gt; true], o desactivar explícitamente el servidor de lecturas cruzadas para las lecturas de referencias "nearest" especificando ['enabled' =&gt; false].







          maxStalenessSeconds
          [int](#language.types.integer)


            Especifica un desfase de replicación máximo, o "obsolescencia", para las lecturas de los secundarios. Cuando la obsolescencia estimada de un secundario supera este valor, el controlador deja de utilizarlo para las operaciones de lectura.




            Si se especifica, la obsolescencia máxima debe ser un entero signado de 32 bits mayor o igual a **[MongoDB\Driver\ReadPreference::SMALLEST_MAX_STALENESS_SECONDS](#mongodb-driver-readpreference.constants.smallest-max-staleness-seconds)**.




            Por omisión, **[MongoDB\Driver\ReadPreference::NO_MAX_STALENESS](#mongodb-driver-readpreference.constants.no-max-staleness)**, lo que significa que el controlador no tendrá en cuenta el desfase de un secundario al elegir dónde dirigir una operación de lectura.




            Esta opción no es compatible con el modo "primary". La especificación de una obsolescencia máxima requiere asimismo que todas las instancias de MongoDB del despliegue utilicen MongoDB 3.4+. Se lanzará una excepción en tiempo de ejecución si todas las instancias de MongoDB en el despliegue son de una versión de servidor más antigua.












### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si mode es incorrecto.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si tagSets es proporcionado para una preferencia de lectura primaria o es incorrecto (es decir, no es un array de cero o más documentos).

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si la opción "maxStalenessSeconds" es proporcionada para una preferencia de lectura primaria o está fuera de rango.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 2.0.0

        Pasar un [int](#language.types.integer) para el argumento mode ya no es soportado.




       PECL mongodb 1.20.0

        Pasar un [int](#language.types.integer) para el argumento mode está *DEPRECADO*.




       PECL mongodb 1.8.0

        Añadida la opción "hedge".




       PECL mongodb 1.3.0


         El argumento mode acepta ahora un valor de string, que es compatible con la opción URI "readPreference" para [MongoDB\Driver\Manager::__construct()](#mongodb-driver-manager.construct)







       PECL mongodb 1.2.0


         Añadido un tercer argumento de options, que soporta la opción "maxStalenessSeconds".








### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\ReadPreference::\_\_construct()**

&lt;?php

/_ Prefiera un nodo secundario pero recurra a un primario. _/
var_dump(new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::SECONDARY_PREFERRED));

/_ Prefiera un nodo en el centro de datos de Nueva York con la latencia más baja. _/
var_dump(new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::NEAREST, [['dc' =&gt; 'ny']]));

/_ Requiere un nodo secundario cuyo desfase de replicación se encuentre dentro de los dos minutos _/
var_dump(new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::SECONDARY, null, ['maxStalenessSeconds' =&gt; 120]));

/_ Activa explícitamente el servidor de lecturas cruzadas _/
var_dump(new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::SECONDARY, null, ['hedge' =&gt; ['enabled' =&gt; true]]));
?&gt;

Resultado del ejemplo anterior es similar a:

object(MongoDB\Driver\ReadPreference)#1 (1) {
["mode"]=&gt;
string(18) "secondaryPreferred"
}
object(MongoDB\Driver\ReadPreference)#1 (2) {
["mode"]=&gt;
string(7) "nearest"
["tags"]=&gt;
array(1) {
[0]=&gt;
object(stdClass)#2 (1) {
["dc"]=&gt;
string(2) "ny"
}
}
}
object(MongoDB\Driver\ReadPreference)#1 (2) {
["mode"]=&gt;
string(9) "secondary"
["maxStalenessSeconds"]=&gt;
int(120)
}
object(MongoDB\Driver\ReadPreference)#1 (2) {
["mode"]=&gt;
string(9) "secondary"
["hedge"]=&gt;
object(stdClass)#1 (1) {
["enabled"]=&gt;
bool(true)
}
}

### Ver también

- [» Read Preference reference](https://www.mongodb.com/docs/manual/core/read-preference/)

# MongoDB\Driver\ReadPreference::getHedge

(mongodb &gt;=1.8.0)

MongoDB\Driver\ReadPreference::getHedge — Devuelve la opción "hedge" del ReadPreference

### Descripción

final public **MongoDB\Driver\ReadPreference::getHedge**(): [?](#language.types.null)[object](#language.types.object)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la opción "hedge" del ReadPreference.
Returns the ReadPreference's "hedge" option.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [» Referencia de Read Preference](https://www.mongodb.com/docs/manual/core/read-preference/)

# MongoDB\Driver\ReadPreference::getMaxStalenessSeconds

(mongodb &gt;=1.2.0)

MongoDB\Driver\ReadPreference::getMaxStalenessSeconds — Devuelve la opción "maxStalenessSeconds" del ReadPreference

### Descripción

final public **MongoDB\Driver\ReadPreference::getMaxStalenessSeconds**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la opción "maxStalenessSeconds" del ReadPreference. Si no se ha especificado ningún tiempo máximo,
**[MongoDB\Driver\ReadPreference::NO_MAX_STALENESS](#mongodb-driver-readpreference.constants.no-max-staleness)** será
devuelto.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\ReadPreference::getMaxStalenessSeconds()**

&lt;?php

$rp = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::SECONDARY);
var_dump($rp-&gt;getMaxStalenessSeconds());

$rp = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::SECONDARY, null, [
    'maxStalenessSeconds' =&gt; MongoDB\Driver\ReadPreference::NO_MAX_STALENESS,
]);
var_dump($rp-&gt;getMaxStalenessSeconds());

$rp = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::SECONDARY, null, [
    'maxStalenessSeconds' =&gt; MongoDB\Driver\ReadPreference::SMALLEST_MAX_STALENESS_SECONDS,
]);
var_dump($rp-&gt;getMaxStalenessSeconds());

$rp = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::SECONDARY, null, [
    'maxStalenessSeconds' =&gt; 1000,
]);
var_dump($rp-&gt;getMaxStalenessSeconds());

?&gt;

El ejemplo anterior mostrará:

int(-1)
int(-1)
int(90)
int(1000)

### Ver también

    - [» Referencia de Read Preference](https://www.mongodb.com/docs/manual/core/read-preference/)

# MongoDB\Driver\ReadPreference::getMode

(mongodb &gt;=1.0.0)

MongoDB\Driver\ReadPreference::getMode — Devuelve la opción "mode" del ReadPreference

**Advertencia**

    Esta función ha sido *DEPRECADA* desde la versión 1.20.0 de la extensión
    y ha sido eliminada en la versión 2.0. Las aplicaciones deberían utilizar
    [MongoDB\Driver\ReadPreference::getModeString()](#mongodb-driver-readpreference.getmodestring) en su lugar.

### Descripción

final public **MongoDB\Driver\ReadPreference::getMode**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la opción "mode" del ReadPreference.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0

            Este método ha sido eliminado.






### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\ReadPreference::getMode()**

&lt;?php

$rp = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::PRIMARY);
var_dump($rp-&gt;getMode());

$rp = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::PRIMARY_PREFERRED);
var_dump($rp-&gt;getMode());

$rp = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::SECONDARY);
var_dump($rp-&gt;getMode());

$rp = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::SECONDARY_PREFERRED);
var_dump($rp-&gt;getMode());

$rp = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::NEAREST);
var_dump($rp-&gt;getMode());

?&gt;

El ejemplo anterior mostrará:

int(1)
int(5)
int(2)
int(6)
int(10)

### Ver también

- [MongoDB\Driver\ReadPreference::getModeString()](#mongodb-driver-readpreference.getmodestring) - Devuelve la opción "mode" del ReadPreference

- [» Referencia de Read Preference](https://www.mongodb.com/docs/manual/core/read-preference/)

# MongoDB\Driver\ReadPreference::getModeString

(mongodb &gt;=1.7.0)

MongoDB\Driver\ReadPreference::getModeString — Devuelve la opción "mode" del ReadPreference

### Descripción

final public **MongoDB\Driver\ReadPreference::getModeString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la opción "mode" del ReadPreference como string.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\ReadPreference::getModeString()**

&lt;?php

$rp = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::PRIMARY);
var_dump($rp-&gt;getModeString());

$rp = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::PRIMARY_PREFERRED);
var_dump($rp-&gt;getModeString());

$rp = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::SECONDARY);
var_dump($rp-&gt;getModeString());

$rp = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::SECONDARY_PREFERRED);
var_dump($rp-&gt;getModeString());

$rp = new MongoDB\Driver\ReadPreference(MongoDB\Driver\ReadPreference::NEAREST);
var_dump($rp-&gt;getModeString());

?&gt;

El ejemplo anterior mostrará:

string(7) "primary"
string(16) "primaryPreferred"
string(9) "secondary"
string(18) "secondaryPreferred"
string(7) "nearest"

### Ver también

- [MongoDB\Driver\ReadPreference::getMode()](#mongodb-driver-readpreference.getmode) - Devuelve la opción "mode" del ReadPreference

- [» Referencia de Read Preference](https://www.mongodb.com/docs/manual/core/read-preference/)

# MongoDB\Driver\ReadPreference::getTagSets

(mongodb &gt;=1.0.0)

MongoDB\Driver\ReadPreference::getTagSets — Devuelve la opción "tagSets" de ReadPreference

### Descripción

final public **MongoDB\Driver\ReadPreference::getTagSets**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la opción "tagSets" de ReadPreference.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\ReadPreference::getTagSets()**

&lt;?php

$mode = MongoDB\Driver\ReadPreference::SECONDARY_PREFERRED;

/_ Null y un array vacío indican ambos la ausencia de preferencia de conjunto de etiquetas. _/
$rp = new MongoDB\Driver\ReadPreference($mode, null);
var_dump($rp-&gt;getTagSets());

$rp = new MongoDB\Driver\ReadPreference($mode, []);
var_dump($rp-&gt;getTagSets());

/_ Preferir un nodo en Nueva York, pero volver a cualquier nodo disponible. _/
$rp = new MongoDB\Driver\ReadPreference($mode, [['dc' =&gt; 'ny']]);
var_dump($rp-&gt;getTagSets());

/_ Preferir un nodo en Nueva York, seguido de un nodo en San Francisco
etiquetado para el reporting, y finalmente volver a cualquier nodo disponible. _/
$rp = new MongoDB\Driver\ReadPreference($mode, [
['dc' =&gt; 'ny'],
['dc' =&gt; 'sf', 'use' =&gt; 'reporting'],
[],
]);
var_dump($rp-&gt;getTagSets());

?&gt;

El ejemplo anterior mostrará:

array(0) {
}
array(0) {
}
array(2) {
[0]=&gt;
array(1) {
["dc"]=&gt;
string(2) "ny"
}
[1]=&gt;
array(0) {
}
}
array(3) {
[0]=&gt;
array(1) {
["dc"]=&gt;
string(2) "ny"
}
[1]=&gt;
array(2) {
["dc"]=&gt;
string(2) "sf"
["use"]=&gt;
string(9) "reporting"
}
[2]=&gt;
array(0) {
}
}

### Ver también

- [» Referencia de Read Preference](https://www.mongodb.com/docs/manual/core/read-preference/)

## Tabla de contenidos

- [MongoDB\Driver\ReadPreference::bsonSerialize](#mongodb-driver-readpreference.bsonserialize) — Devuelve un objeto para la serialización BSON
- [MongoDB\Driver\ReadPreference::\_\_construct](#mongodb-driver-readpreference.construct) — Crear una nueva ReadPreference
- [MongoDB\Driver\ReadPreference::getHedge](#mongodb-driver-readpreference.gethedge) — Devuelve la opción "hedge" del ReadPreference
- [MongoDB\Driver\ReadPreference::getMaxStalenessSeconds](#mongodb-driver-readpreference.getmaxstalenessseconds) — Devuelve la opción "maxStalenessSeconds" del ReadPreference
- [MongoDB\Driver\ReadPreference::getMode](#mongodb-driver-readpreference.getmode) — Devuelve la opción "mode" del ReadPreference
- [MongoDB\Driver\ReadPreference::getModeString](#mongodb-driver-readpreference.getmodestring) — Devuelve la opción "mode" del ReadPreference
- [MongoDB\Driver\ReadPreference::getTagSets](#mongodb-driver-readpreference.gettagsets) — Devuelve la opción "tagSets" de ReadPreference

# La clase MongoDB\Driver\ReadConcern

(mongodb &gt;=1.1.0)

## Introducción

    **MongoDB\Driver\ReadConcern** controla el nivel
    de aislamiento para las operaciones de lectura para los conjuntos de réplicas y las réplicas de réplicas. Esta
    opción requiere MongoDB 3.2 o posterior.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\ReadConcern**


     implements
       [MongoDB\BSON\Serializable](#class.mongodb-bson-serializable),  [Serializable](#class.serializable) {

    /* Constantes */

     const
     [string](#language.types.string)
      [AVAILABLE](#mongodb-driver-readconcern.constants.linearizable) = "available";

    const
     [string](#language.types.string)
      [LINEARIZABLE](#mongodb-driver-readconcern.constants.linearizable) = "linearizable";

    const
     [string](#language.types.string)
      [LOCAL](#mongodb-driver-readconcern.constants.local) = "local";

    const
     [string](#language.types.string)
      [MAJORITY](#mongodb-driver-readconcern.constants.majority) = "majority";

    const
     [string](#language.types.string)
      [SNAPSHOT](#mongodb-driver-readconcern.constants.snapshot) = "snapshot";


    /* Métodos */

final public [bsonSerialize](#mongodb-driver-readconcern.bsonserialize)(): [stdClass](#class.stdclass)
final public [\_\_construct](#mongodb-driver-readconcern.construct)([?](#language.types.null)[string](#language.types.string) $level = **[null](#constant.null)**)
final public [getLevel](#mongodb-driver-readconcern.getlevel)(): [?](#language.types.null)[string](#language.types.string)
final public [isDefault](#mongodb-driver-readconcern.isdefault)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[MongoDB\Driver\ReadConcern::AVAILABLE](#mongodb-driver-readconcern.constants.available)**


       Por omisión para las lecturas en los secundarios cuando
       afterClusterTime y level no están
       especificados.




       La consulta devuelve los datos más recientes de la instancia. No garantiza
       que los datos hayan sido escritos en la mayoría de los miembros del conjunto de réplicas
       (es decir, que puedan ser anulados).




       Para las colecciones no fragmentadas (incluyendo las colecciones en un
       despliegue autónomo o un despliegue de réplicas), las lecturas
       "local" y "available" se comportan de manera idéntica.




       Para un clúster compartido, la lectura "available" proporciona
       una mayor tolerancia a las particiones ya que no espera para
       garantizar garantías de coherencia. Sin embargo, una consulta con
       una lectura "available" puede devolver documentos huérfanos
       si el fragmento está en proceso de migración de piezas ya que la lectura
       "available", a diferencia de la lectura
       "local", no contacta al
       primario del fragmento ni a los servidores de configuración para obtener metadatos actualizados.







     **[MongoDB\Driver\ReadConcern::LINEARIZABLE](#mongodb-driver-readconcern.constants.linearizable)**


       La consulta devuelve los datos que reflejan todas las escrituras exitosas emitidas con un
       nivel de escritura de "majority" *y*
       reconocido antes del inicio de la operación de lectura. Para los conjuntos de réplicas
       que funcionan con writeConcernMajorityJournalDefault definido
       en **[true](#constant.true)**, la lectura linealizable devuelve datos que nunca serán
       anulados.




       Con writeConcernMajorityJournalDefault definido en
       **[false](#constant.false)**, MongoDB no esperará que las escrituras w: "majority"
       sean durables antes de acusar recibo de las escrituras. En consecuencia,
       las operaciones de escritura "majority" podrían eventualmente ser anuladas
       en caso de pérdida de un miembro del conjunto de réplicas.




       Se puede especificar un nivel de lectura linealizable para las operaciones de lectura en el
       primario únicamente.




       La lectura linealizable garantiza que las operaciones
       de lectura especifiquen un filtro de consulta que identifique de manera única un solo
       documento.



      **Sugerencia**

        Siempre utilizar maxTimeMS con una lectura linealizable
        en caso de no disponibilidad de la mayoría de los miembros portadores de datos.
        maxTimeMS garantiza que la operación no bloquee
        indefinidamente y garantiza que la operación devuelva un error si
        el nivel de lectura no puede ser satisfecho.





       La lectura linealizable requiere MongoDB 3.4.







     **[MongoDB\Driver\ReadConcern::LOCAL](#mongodb-driver-readconcern.constants.local)**


       Por omisión para las lecturas en el primario si level no está
       especificado y para las lecturas en los secundarios si level
       no está especificado pero afterClusterTime está especificado.




       La consulta devuelve los datos más recientes de la instancia. No garantiza
       que los datos hayan sido escritos en la mayoría de los miembros del conjunto de réplicas
       (es decir, que puedan ser anulados).







     **[MongoDB\Driver\ReadConcern::MAJORITY](#mongodb-driver-readconcern.constants.majority)**


       La consulta devuelve los datos más recientes reconocidos como haber sido
       escritos en la mayoría de los miembros del conjunto de réplicas.




       Para utilizar el nivel de lectura "majority", los conjuntos de réplicas
       deben utilizar el motor de almacenamiento WiredTiger y el protocolo de elección versión 1.







     **[MongoDB\Driver\ReadConcern::SNAPSHOT](#mongodb-driver-readconcern.constants.snapshot)**


       La lectura "snapshot" está disponible para las transacciones
       multi-documentos, y a partir de MongoDB 5.0, para ciertas operaciones de lectura
       fuera de las transacciones multi-documentos.




       Si la transacción no forma parte de una sesión coherente, al validar la transacción con un nivel de escritura "majority", las
       operaciones de transacción están garantizadas de haber leído desde una instantánea de datos
       mayoritariamente comprometidos.




       Si la transacción forma parte de una sesión coherente, al validar la transacción con un nivel de escritura "majority", las
       operaciones de transacción están garantizadas de haber leído desde una instantánea de datos
       mayoritariamente comprometidos que aseguran la coherencia causal con la operación inmediatamente
       anterior al inicio de la transacción.




       Fuera de las transacciones multi-documentos, el nivel de lectura
       "snapshot" está disponible en los primarios y los secundarios
       para las siguientes operaciones de lectura: find,
       aggregate y distinct (en
       colecciones no fragmentadas). Todas las demás órdenes de lectura prohíben
       "snapshot".





## Historial de cambios

        Versión
        Descripción






        PECL mongodb 1.11.0


          Adición de la constante
          **[MongoDB\Driver\ReadConcern::SNAPSHOT](#mongodb-driver-readconcern.constants.snapshot)**.







        PECL mongodb 1.7.0

         Implementa [Serializable](#class.serializable).




        PECL mongodb 1.4.0


          Adición de la constante
          **[MongoDB\Driver\ReadConcern::MAJORITY](#mongodb-driver-readconcern.constants.majority)**.







        PECL mongodb 1.2.0


          Adición de la constante
          **[MongoDB\Driver\ReadConcern::LINEARIZABLE](#mongodb-driver-readconcern.constants.linearizable)**




          Implementa [MongoDB\BSON\Serializable](#class.mongodb-bson-serializable).









## Ver también

- [» Referencia de lectura](https://www.mongodb.com/docs/manual/reference/read-concern/)

# MongoDB\Driver\ReadConcern::bsonSerialize

(mongodb &gt;=1.2.0)

MongoDB\Driver\ReadConcern::bsonSerialize — Devuelve un objeto para la serialización BSON

### Descripción

final public **MongoDB\Driver\ReadConcern::bsonSerialize**(): [stdClass](#class.stdclass)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto para la serialización del ReadConcern en BSON.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 MongoDB\Driver\ReadConcern::bsonSerialize()** con un read concern vacío

&lt;?php

$rc = new MongoDB\Driver\ReadConcern;
var_dump($rc-&gt;bsonSerialize());

echo "\n", MongoDB\BSON\Document::fromPHP($rc)-&gt;toRelaxedExtendedJSON();

?&gt;

Resultado del ejemplo anterior es similar a:

object(stdClass)#2 (0) {
}

{ }

**Ejemplo #2 MongoDB\Driver\ReadConcern::bsonSerialize()** con un read concern local

&lt;?php

$rc = new MongoDB\Driver\ReadConcern(MongoDB\Driver\ReadConcern::LOCAL);
var_dump($rc-&gt;bsonSerialize());

echo "\n", MongoDB\BSON\Document::fromPHP($rc)-&gt;toRelaxedExtendedJSON();

?&gt;

Resultado del ejemplo anterior es similar a:

object(stdClass)#2 (1) {
["level"]=&gt;
string(5) "local"
}

{ "level" : "local" }

### Ver también

- [MongoDB\BSON\Serializable::bsonSerialize()](#mongodb-bson-serializable.bsonserialize) - Proporciona un array o un documento a serializar como BSON

- [» Referencia de Read Concern](https://www.mongodb.com/docs/manual/reference/read-concern/)

# MongoDB\Driver\ReadConcern::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\Driver\ReadConcern::\_\_construct — Crear un nuevo ReadConcern

### Descripción

final public **MongoDB\Driver\ReadConcern::\_\_construct**([?](#language.types.null)[string](#language.types.string) $level = **[null](#constant.null)**)

Construye un nuevo [MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern), que es
un objeto de valor inmutable.

### Parámetros

    level


      El [» nivel del read concern](https://www.mongodb.com/docs/manual/reference/read-concern/#read-concern-levels).
      Se puede utilizar, pero no se limita a, una de las
      [constantes de clase](#mongodb-driver-readconcern.constants).


### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\ReadConcern::\_\_construct()**

&lt;?php

/_ Nivel de lectura aislado no especificado (utiliza el comportamiento por omisión del servidor) _/
$rc = new MongoDB\Driver\ReadConcern();

/_ Consulta con un nivel de lectura aislado a partir de un solo nodo del conjunto de réplicas _/
$rc = new MongoDB\Driver\ReadConcern(MongoDB\Driver\ReadConcern::LOCAL);

/_ Consulta con un nivel de lectura aislado a partir de una mayoría de los nodos del conjunto de réplicas _/
$rc = new MongoDB\Driver\ReadConcern(MongoDB\Driver\ReadConcern::MAJORITY);

?&gt;

### Ver también

- [» Referencia de Read Concern](https://www.mongodb.com/docs/manual/reference/read-concern/)

# MongoDB\Driver\ReadConcern::getLevel

(mongodb &gt;=1.0.0)

MongoDB\Driver\ReadConcern::getLevel — Devuelve la opción "level" del ReadConcern

### Descripción

final public **MongoDB\Driver\ReadConcern::getLevel**(): [?](#language.types.null)[string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la opción "level" del ReadConcern.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\ReadConcern::getLevel()**

&lt;?php

$rc = new MongoDB\Driver\ReadConcern();
var_dump($rc-&gt;getLevel());

$rc = new MongoDB\Driver\ReadConcern(MongoDB\Driver\ReadConcern::LOCAL);
var_dump($rc-&gt;getLevel());

$rc = new MongoDB\Driver\ReadConcern(MongoDB\Driver\ReadConcern::MAJORITY);
var_dump($rc-&gt;getLevel());

?&gt;

El ejemplo anterior mostrará:

NULL
string(5) "local"
string(8) "majority"

### Ver también

- [» Referencia de Read Concern](https://www.mongodb.com/docs/manual/reference/read-concern/)

# MongoDB\Driver\ReadConcern::isDefault

(mongodb &gt;=1.3.0)

MongoDB\Driver\ReadConcern::isDefault — Verifica si es el read concern por omisión

### Descripción

final public **MongoDB\Driver\ReadConcern::isDefault**(): [bool](#language.types.boolean)

Devuelve si es el read concern por omisión (es decir, sin opciones especificadas). Este método está principalmente destinado a ser utilizado en conjunción con
[MongoDB\Driver\Manager::getReadConcern()](#mongodb-driver-manager.getreadconcern) para determinar si el Manager ha sido construido sin ninguna opción de read concern.

El controlador no incluirá un read concern por omisión en sus operaciones de lectura (por ejemplo [MongoDB\Driver\Manager::executeQuery()](#mongodb-driver-manager.executequery)) para permitir que el servidor aplique su propio valor por omisión. Las bibliotecas que acceden al read concern del Manager para incluirlo en sus propios comandos de lectura deberían utilizar este método para asegurarse de que los read concerns por omisión se dejan sin definir.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si es el read concern por omisión y **[false](#constant.false)** en caso contrario.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\ReadConcern::isDefault()**

&lt;?php

$rc = new MongoDB\Driver\ReadConcern(null);
var_dump($rc-&gt;isDefault());

$rc = new MongoDB\Driver\ReadConcern(MongoDB\Driver\ReadConcern::MAJORITY);
var_dump($rc-&gt;isDefault());

$manager = new MongoDB\Driver\Manager('mongodb://127.0.0.1/?readConcernLevel=majority');
$rc = $manager-&gt;getReadConcern();
var_dump($rc-&gt;isDefault());

$manager = new MongoDB\Driver\Manager('mongodb://127.0.0.1/');
$rc = $manager-&gt;getReadConcern();
var_dump($rc-&gt;isDefault());

?&gt;

El ejemplo anterior mostrará:

bool(true)
bool(false)
bool(false)
bool(true)

### Ver también

- [MongoDB\Driver\Manager::getReadConcern()](#mongodb-driver-manager.getreadconcern) - Devuelve el ReadConcern para el Manager

- [» Referencia de Read Concern](https://www.mongodb.com/docs/manual/reference/read-concern/)

## Tabla de contenidos

- [MongoDB\Driver\ReadConcern::bsonSerialize](#mongodb-driver-readconcern.bsonserialize) — Devuelve un objeto para la serialización BSON
- [MongoDB\Driver\ReadConcern::\_\_construct](#mongodb-driver-readconcern.construct) — Crear un nuevo ReadConcern
- [MongoDB\Driver\ReadConcern::getLevel](#mongodb-driver-readconcern.getlevel) — Devuelve la opción "level" del ReadConcern
- [MongoDB\Driver\ReadConcern::isDefault](#mongodb-driver-readconcern.isdefault) — Verifica si es el read concern por omisión

# La clase MongoDB\Driver\Cursor

(mongodb &gt;=1.0.0)

## Introducción

    La clase **MongoDB\Driver\Cursor**
    encapsula el resultado de un comando o de una consulta MongoDB,
    que puede ser devuelto por, respectivamente,
    [MongoDB\Driver\Manager::executeCommand()](#mongodb-driver-manager.executecommand) o
    [MongoDB\Driver\Manager::executeQuery()](#mongodb-driver-manager.executequery).

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Cursor**


     implements
       [MongoDB\Driver\CursorInterface](#class.mongodb-driver-cursorinterface) {


    /* Métodos */

final private [\_\_construct](#mongodb-driver-cursor.construct)()
public [current](#mongodb-driver-cursor.current)(): [array](#language.types.array)|[object](#language.types.object)|[null](#language.types.null)
final public [getId](#mongodb-driver-cursor.getid)(): [MongoDB\BSON\Int64](#class.mongodb-bson-int64)
final public [getServer](#mongodb-driver-cursor.getserver)(): [MongoDB\Driver\Server](#class.mongodb-driver-server)
final public [isDead](#mongodb-driver-cursor.isdead)(): [bool](#language.types.boolean)
public [key](#mongodb-driver-cursor.key)(): [int](#language.types.integer)
public [next](#mongodb-driver-cursor.next)(): [void](language.types.void.html)
public [rewind](#mongodb-driver-cursor.rewind)(): [void](language.types.void.html)
final public [setTypeMap](#mongodb-driver-cursor.settypemap)([array](#language.types.array) $typemap): [void](language.types.void.html)
final public [toArray](#mongodb-driver-cursor.toarray)(): [array](#language.types.array)
public [valid](#mongodb-driver-cursor.valid)(): [bool](#language.types.boolean)

}

## Historial de cambios

        Versión
        Descripción






        PECL mongodb 1.9.0

         Implementa [Iterator](#class.iterator).




        PECL mongodb 1.6.0

         Implementación de [MongoDB\Driver\CursorInterface](#class.mongodb-driver-cursorinterface),
         que extiende [Traversable](#class.traversable).






## Ejemplos

    **Ejemplo #1 Lectura de un conjunto de resultados**



     [MongoDB\Driver\Manager::executeCommand()](#mongodb-driver-manager.executecommand) y
     [MongoDB\Driver\Manager::executeQuery()](#mongodb-driver-manager.executequery) ambos
     devuelven su(s) resultado(s) como un objeto **MongoDB\Driver\Cursor**.
     Este objeto puede ser utilizado para iterar dentro del conjunto de resultados de la
     comando o de la consulta.




     Debido a que **MongoDB\Driver\Cursor** implementa la interfaz
     [Traversable](#class.traversable), se puede simplemente iterar
     sobre el conjunto de resultados con
     [foreach](#control-structures.foreach).

&lt;?php

$manager = new MongoDB\Driver\Manager();

/_ Inserte documentos para que nuestra consulta devuelva información _/
$bulkWrite = new MongoDB\Driver\BulkWrite;
$bulkWrite-&gt;insert(['name' =&gt; 'Ceres', 'size' =&gt; 946, 'distance' =&gt; 2.766]);
$bulkWrite-&gt;insert(['name' =&gt; 'Vesta', 'size' =&gt; 525, 'distance' =&gt; 2.362]);
$manager-&gt;executeBulkWrite("test.asteroids", $bulkWrite);

/_ Consulta para todos los elementos de la colección _/
$query = new MongoDB\Driver\Query( [] );

/_ Interroga la colección "asteroids" de la base de datos "test" _/
$cursor = $manager-&gt;executeQuery("test.asteroids", $query);

/\* $cursor contiene ahora un objeto que envuelve el conjunto de resultados.

- Utilice foreach() para iterar sobre todos los resultados \*/
  foreach($cursor as $document) {
    print_r($document);
  }

?&gt;

Resultado del ejemplo anterior es similar a:

stdClass Object
(
[_id] =&gt; MongoDB\BSON\ObjectId Object
(
[oid] =&gt; 5a4cff2f122d3321565d8cc2
)

    [name] =&gt; Ceres
    [size] =&gt; 946
    [distance] =&gt; 2.766

)
stdClass Object
(
[_id] =&gt; MongoDB\BSON\ObjectId Object
(
[oid] =&gt; 5a4cff2f122d3321565d8cc3
)

    [name] =&gt; Vesta
    [size] =&gt; 525
    [distance] =&gt; 2.362

}

    **Ejemplo #2 Lectura de un conjunto de resultados para un cursor en cola**



     Los [» cursores en cola](https://www.mongodb.com/docs/manual/core/tailable-cursors)
     son un tipo especial de cursor MongoDB que permite al cliente leer
     algunos resultados y esperar hasta que más documentos
     se vuelvan disponibles. Estos cursores se utilizan principalmente con
     [» Capped Collections](https://www.mongodb.com/docs/manual/core/capped-collections)
     y [» Change Streams](https://www.mongodb.com/docs/manual/changeStreams).




     Aunque los cursores normales pueden ser recorridos una vez con
     foreach, este enfoque no funcionará con los
     cursores en cola. Cuando foreach se utiliza con un
     cursor en cola, el bucle se detendrá al final del conjunto de resultados inicial.
     Intentar continuar la iteración sobre el cursor con un segundo
     foreach lanzaría una excepción, ya que PHP intenta
     rebobinar el cursor. Al igual que los objetos result en otros controladores
     de base de datos, los cursores en MongoDB solo admiten la iteración hacia adelante, lo que significa que no pueden ser rebobinados.




     Para leer continuamente desde un cursor en cola, el objeto Cursor debe ser
     envuelto con un [IteratorIterator](#class.iteratoriterator). Esto permite
     a la aplicación controlar directamente la iteración del cursor, evitar
     rebobinar accidentalmente el cursor y decidir cuándo esperar nuevos resultados o detener completamente la iteración.




     Para demostrar un cursor en acción, se utilizarán dos scripts: un
     "Productor" y un "Consumidor". El script Productor creará una nueva colección plafonada utilizando el
     comando
     [» Create](https://www.mongodb.com/docs/manual/reference/command/create) y
     procederá a insertar un nuevo documento en esta colección
     cada segundo.

&lt;?php

$manager = new MongoDB\Driver\Manager;

$manager-&gt;executeCommand('test', new MongoDB\Driver\Command([
'create' =&gt; 'asteroids',
'capped' =&gt; true,
'size' =&gt; 1048576,
]));

while (true) {
$bulkWrite = new MongoDB\Driver\BulkWrite;
$bulkWrite-&gt;insert(['createdAt' =&gt; new MongoDB\BSON\UTCDateTime]);
$manager-&gt;executeBulkWrite('test.asteroids', $bulkWrite);

    sleep(1);

}

?&gt;

     Con el script Productor aún en ejecución, un segundo script consumidor puede ser ejecutado para leer los documentos insertados utilizando un cursor en cola, indicado por las opciones tailable y awaitData a
     [MongoDB\Driver\Query::__construct()](#mongodb-driver-query.construct).

&lt;?php

$manager = new MongoDB\Driver\Manager;

$query = new MongoDB\Driver\Query([], [
'tailable' =&gt; true,
'awaitData' =&gt; true,
]);

$cursor = $manager-&gt;executeQuery('test.asteroids', $query);

$iterator = new IteratorIterator($cursor);

$iterator-&gt;rewind();

while (true) {
if ($iterator-&gt;valid()) {
$document = $iterator-&gt;current();
printf("Consumed document created at: %s\n", $document-&gt;createdAt);
}

    $iterator-&gt;next();

}

?&gt;

     El script consumidor comenzará imprimiendo rápidamente todos los
     documentos disponibles en la colección plafonada (como si
     foreach hubiera sido utilizado); sin embargo, no se
     detendrá al final del conjunto de resultados inicial. Dado que
     el cursor está en cola, la llamada a
     [IteratorIterator::next()](#iteratoriterator.next) se bloquea y espera resultados adicionales. [IteratorIterator::valid()](#iteratoriterator.valid) también se utiliza para verificar si realmente hay datos disponibles para leer en cada paso.



    **Nota**:

      Este ejemplo utiliza la opción de consulta awaitData para
      indicar al servidor que bloquee durante un corto período (por ejemplo, un segundo) al final del conjunto de resultados antes de devolver una respuesta al controlador. Esto se utiliza para evitar que el controlador interrogue agresivamente
      al servidor cuando no haya resultados disponibles. La opción
      maxAwaitTimeMS puede ser utilizada conjuntamente con
      tailable y awaitData para especificar
      la duración durante la cual el servidor debe bloquearse cuando alcance el final del conjunto de resultados.


## Errores/Excepciones

    Durante la iteración sobre el objeto Cursor, los datos BSON se convierten en variables PHP. Esta iteración puede provocar las siguientes excepciones:




    -
     Lanza una excepción
     [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si
     una clase en el mapeo de tipo no puede ser instanciada o
     no implementa [MongoDB\BSON\Unserializable](#class.mongodb-bson-unserializable).


    - Lanza una excepción [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception) si la entrada no contiene exactamente un documento BSON. Las razones posibles incluyen, pero no se limitan a, BSON inválido, datos adicionales (después de leer un documento BSON), o un error inesperado de [» libbson](https://github.com/mongodb/mongo-c-driver/tree/master/src/libbson).

# MongoDB\Driver\Cursor::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\Driver\Cursor::\_\_construct — Crear un nuevo cursor (no utilizado)

### Descripción

final private **MongoDB\Driver\Cursor::\_\_construct**()

Los objetos [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor) son devueltos como
resultado de una orden o consulta ejecutada y no pueden ser construidos directamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Ver también

- [MongoDB\Driver\Manager::executeCommand()](#mongodb-driver-manager.executecommand) - Ejecuta un comando de base de datos

- [MongoDB\Driver\Manager::executeQuery()](#mongodb-driver-manager.executequery) - Ejecuta una consulta de base de datos

- [MongoDB\Driver\Server::executeCommand()](#mongodb-driver-server.executecommand) - Ejecuta un comando de base de datos en este servidor

- [MongoDB\Driver\Server::executeQuery()](#mongodb-driver-server.executequery) - Ejecuta una consulta de base de datos en este servidor

# MongoDB\Driver\Cursor::current

(mongodb &gt;=1.9.0)

MongoDB\Driver\Cursor::current — Devuelve el elemento actual

### Descripción

public **MongoDB\Driver\Cursor::current**(): [array](#language.types.array)|[object](#language.types.object)|[null](#language.types.null)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el documento resultante actual en forma de array u objeto, dependiendo del
tipo de mapa del cursor. Si la iteración no ha comenzado o si la posición actual
no es válida, **[null](#constant.null)** será devuelto.

### Ver también

- [Iterator::current()](#iterator.current) - Devuelve el elemento actual

# MongoDB\Driver\Cursor::getId

(mongodb &gt;=1.0.0)

MongoDB\Driver\Cursor::getId — Devuelve el ID de este cursor

### Descripción

final public **MongoDB\Driver\Cursor::getId**(): [MongoDB\BSON\Int64](#class.mongodb-bson-int64)

Devuelve el ID de este cursor, que identifica de manera única el cursor en el servidor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el ID de este cursor. El ID será devuelto como un objeto
[MongoDB\BSON\Int64](#class.mongodb-bson-int64).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 2.0.0

        El tipo de retorno ha sido cambiado a [MongoDB\BSON\Int64](#class.mongodb-bson-int64)
        El argumento asInt64 ha sido eliminado.




       PECL mongodb 1.20.0

        Deprecación del retorno de un [MongoDB\Driver\CursorId](#class.mongodb-driver-cursorid).
        Adición del argumento asInt64 para facilitar
        la migración a versiones futuras. Si asInt64
        es **[true](#constant.true)**, el ID será devuelto como un
        [MongoDB\BSON\Int64](#class.mongodb-bson-int64).





### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\Cursor::getId()**

&lt;?php

/\* En este ejemplo, introducimos varios documentos en la colección y

- especificamos un BatchSize más pequeño para garantizar que el primer lote contenga
- solo un subconjunto de nuestros resultados y que el cursor permanezca abierto en el
- servidor. \*/
  $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$query = new MongoDB\Driver\Query([], ['batchSize' =&gt; 2]);

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);
$bulk-&gt;insert(['x' =&gt; 2]);
$bulk-&gt;insert(['x' =&gt; 3]);
$manager-&gt;executeBulkWrite('db.collection', $bulk);

$cursor = $manager-&gt;executeQuery('db.collection', $query);
var_dump($cursor-&gt;getId(true));

?&gt;

Resultado del ejemplo anterior es similar a:

object(MongoDB\BSON\Int64)#5 (1) {
["integer"]=&gt;
string(11) "94810124093"
}

### Ver también

- [MongoDB\BSON\Int64](#class.mongodb-bson-int64)

# MongoDB\Driver\Cursor::getServer

(mongodb &gt;=1.0.0)

MongoDB\Driver\Cursor::getServer — Devuelve el servidor asociado a este cursor

### Descripción

final public **MongoDB\Driver\Cursor::getServer**(): [MongoDB\Driver\Server](#class.mongodb-driver-server)

    Devuelve el [MongoDB\Driver\Server](#class.mongodb-driver-server) asociado a este cursor.

Se trata del servidor que ha ejecutado la
[MongoDB\Driver\Query](#class.mongodb-driver-query) o
[MongoDB\Driver\Command](#class.mongodb-driver-command).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el [MongoDB\Driver\Server](#class.mongodb-driver-server) asociado a este cursor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\Cursor::getServer()**

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$query = new MongoDB\Driver\Query([]);

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);
$manager-&gt;executeBulkWrite('db.collection', $bulk);

$cursor = $manager-&gt;executeQuery('db.collection', $query);
var_dump($cursor-&gt;getServer());

?&gt;

Resultado del ejemplo anterior es similar a:

object(MongoDB\Driver\Server)#5 (10) {
["host"]=&gt;
string(9) "localhost"
["port"]=&gt;
int(27017)
["type"]=&gt;
int(1)
["is_primary"]=&gt;
bool(false)
["is_secondary"]=&gt;
bool(false)
["is_arbiter"]=&gt;
bool(false)
["is_hidden"]=&gt;
bool(false)
["is_passive"]=&gt;
bool(false)
["last_hello_response"]=&gt;
array(8) {
["isWritablePrimary"]=&gt;
bool(true)
["maxBsonObjectSize"]=&gt;
int(16777216)
["maxMessageSizeBytes"]=&gt;
int(48000000)
["maxWriteBatchSize"]=&gt;
int(1000)
["localTime"]=&gt;
object(MongoDB\BSON\UTCDateTime)#6 (1) {
["milliseconds"]=&gt;
int(1446505367907)
}
["maxWireVersion"]=&gt;
int(3)
["minWireVersion"]=&gt;
int(0)
["ok"]=&gt;
float(1)
}
["round_trip_time"]=&gt;
int(584)
}

### Ver también

- [MongoDB\Driver\Server](#class.mongodb-driver-server)

# MongoDB\Driver\Cursor::isDead

(mongodb &gt;=1.0.0)

MongoDB\Driver\Cursor::isDead — Verifica si el cursor está agotado o puede tener resultados adicionales

### Descripción

final public **MongoDB\Driver\Cursor::isDead**(): [bool](#language.types.boolean)

Verifica si no hay más resultados adicionales disponibles en el cursor. Este método es similar al método
[» cursor.isExhausted()](https://www.mongodb.com/docs/manual/reference/method/cursor.isExhausted/)
en el shell de MongoDB y su utilidad principal es durante la iteración de
[» cursores de cola](https://www.mongodb.com/docs/manual/core/tailable-cursors/).

Un cursor no tiene más resultados adicionales y se considera "muerto" si cumple una de las siguientes condiciones:

    -
     El lote actual ha sido completamente iterado *y* el ID del cursor es cero (es decir, es imposible entregar un [» getMore](https://www.mongodb.com/docs/manual/reference/command/getMore/)).


    - Se ha encontrado un error durante la iteración del cursor.

    - El cursor ha alcanzado su límite configurado.

Por su diseño, no siempre es posible determinar si un cursor tiene resultados adicionales. Los casos en los que un cursor _puede_
tener más datos disponibles son los siguientes:

    -
     Hay documentos adicionales en el lote actual, que están en el búfer del lado del cliente. Iterar recuperará un documento del búfer local.


    -
     No hay documentos adicionales en el lote actual (es decir, búfer local), pero el ID del cursor es diferente de cero. Iterar solicitará más documentos desde el servidor a través de una operación
     [» getMore](https://www.mongodb.com/docs/manual/reference/command/getMore/),
     que devolverá o no resultados adicionales y/o indicará que el cursor ha sido cerrado en el servidor devolviendo cero para su ID.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si se confirma que no hay resultados adicionales disponibles en el cursor, y **[false](#constant.false)** en caso contrario.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\Cursor::isDead()**

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$query = new MongoDB\Driver\Query([]);

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);
$bulk-&gt;insert(['x' =&gt; 2]);
$bulk-&gt;insert(['x' =&gt; 3]);
$manager-&gt;executeBulkWrite('db.collection', $bulk);

$cursor = $manager-&gt;executeQuery('db.collection', $query);

$iterator = new IteratorIterator($cursor);

$iterator-&gt;rewind();
var_dump($cursor-&gt;isDead());

$iterator-&gt;next();
var_dump($cursor-&gt;isDead());

$iterator-&gt;next();
var_dump($cursor-&gt;isDead());

$iterator-&gt;next();
var_dump($cursor-&gt;isDead());

?&gt;

Resultado del ejemplo anterior es similar a:

bool(false)
bool(false)
bool(false)
bool(true)

### Ver también

- [» Tailable Cursors](https://www.mongodb.com/docs/manual/core/tailable-cursors/) en el manual de MongoDB

- [» cursor.isExhausted()](https://www.mongodb.com/docs/manual/reference/method/cursor.isExhausted/) en el manual de MongoDB

# MongoDB\Driver\Cursor::key

(mongodb &gt;=1.9.0)

MongoDB\Driver\Cursor::key — Devuelve el número del índice del resultado actual en el cursor

### Descripción

public **MongoDB\Driver\Cursor::key**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el índice numérico del resultado actual en el cursor.

### Ver también

- [Iterator::key()](#iterator.key) - Devuelve la clave del elemento actual

# MongoDB\Driver\Cursor::next

(mongodb &gt;=1.9.0)

MongoDB\Driver\Cursor::next — Avance el cursor hacia el resultado siguiente

### Descripción

public **MongoDB\Driver\Cursor::next**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Desplaza la posición actual hacia el elemento siguiente en el cursor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación

    ### Ver también
    - [Iterator::next()](#iterator.next) - Avanza al siguiente elemento

    # MongoDB\Driver\Cursor::rewind

    (mongodb &gt;=1.9.0)

MongoDB\Driver\Cursor::rewind — Rebobina el cursor hasta el primer resultado

### Descripción

public **MongoDB\Driver\Cursor::rewind**(): [void](language.types.void.html)

Si el cursor ha avanzado más allá de su primera posición, ya no puede ser rebobinado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[null](#constant.null)**.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception) si este método es llamado después de que el cursor ha avanzado más allá de su primera posición.

    ### Ver también
    - [Iterator::rewind()](#iterator.rewind) - Rebobine la Iterator al primer elemento

    # MongoDB\Driver\Cursor::setTypeMap

    (mongodb &gt;=1.0.0)

MongoDB\Driver\Cursor::setTypeMap — Define un tipo de mapa a utilizar para la deserialización BSON

### Descripción

final public **MongoDB\Driver\Cursor::setTypeMap**([array](#language.types.array) $typemap): [void](language.types.void.html)

Define la
[configuración de mapeo de tipo](#mongodb.persistence.typemaps)
a utilizar durante la deserialización de los resultados BSON en valores PHP.

### Parámetros

typeMap ([array](#language.types.array))

        [Configuración del mapa de tipos](#mongodb.persistence.typemaps).

### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

Durante la iteración sobre el cursor, las siguientes excepciones pueden también ser lanzadas debido a una configuración de mapeo de tipo incorrecta:

    -
     Lanza una excepción
     [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si
     una clase en el mapeo de tipo no puede ser instanciada o
     no implementa
     [MongoDB\BSON\Unserializable](#class.mongodb-bson-unserializable).

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\Cursor::setTypeMap()**

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$bulk = new MongoDB\Driver\BulkWrite;
$id = $bulk-&gt;insert(['x' =&gt; 1]);
$manager-&gt;executeBulkWrite('db.collection', $bulk);

$query = new MongoDB\Driver\Query(['_id' =&gt; $id]);
$cursor = $manager-&gt;executeQuery('db.collection', $query);
$cursor-&gt;setTypeMap(['root' =&gt; 'array']);

foreach ($cursor as $document) {
    var_dump($document);
}

?&gt;

Resultado del ejemplo anterior es similar a:

array(2) {
["_id"]=&gt;
object(MongoDB\BSON\ObjectId)#6 (1) {
["oid"]=&gt;
string(24) "56424fb76118fd3267180741"
}
["x"]=&gt;
int(1)
}

### Ver también

- [Persistir datos](#mongodb.persistence)

# MongoDB\Driver\Cursor::toArray

(mongodb &gt;=1.0.0)

MongoDB\Driver\Cursor::toArray — Devuelve un array que contiene todos los resultados para este cursor

### Descripción

final public **MongoDB\Driver\Cursor::toArray**(): [array](#language.types.array)

Itera el cursor y devuelve sus resultados en un array.
[MongoDB\Driver\Cursor::setTypeMap()](#mongodb-driver-cursor.settypemap) puede ser utilizado para
controlar cómo los documentos son deserializados en valores PHP.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [array](#language.types.array) que contiene todos los resultados para este cursor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\Cursor::toArray()**

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);
$bulk-&gt;insert(['x' =&gt; 2]);
$bulk-&gt;insert(['x' =&gt; 3]);
$manager-&gt;executeBulkWrite('db.collection', $bulk);

$query = new MongoDB\Driver\Query([]);
$cursor = $manager-&gt;executeQuery('db.collection', $query);

var_dump($cursor-&gt;toArray());

?&gt;

Resultado del ejemplo anterior es similar a:

array(3) {
[0]=&gt;
object(stdClass)#6 (2) {
["_id"]=&gt;
object(MongoDB\BSON\ObjectId)#5 (1) {
["oid"]=&gt;
string(24) "564259a96118fd40b41bcf61"
}
["x"]=&gt;
int(1)
}
[1]=&gt;
object(stdClass)#8 (2) {
["_id"]=&gt;
object(MongoDB\BSON\ObjectId)#7 (1) {
["oid"]=&gt;
string(24) "564259a96118fd40b41bcf62"
}
["x"]=&gt;
int(2)
}
[2]=&gt;
object(stdClass)#10 (2) {
["_id"]=&gt;
object(MongoDB\BSON\ObjectId)#9 (1) {
["oid"]=&gt;
string(24) "564259a96118fd40b41bcf63"
}
["x"]=&gt;
int(3)
}
}

### Ver también

- [MongoDB\Driver\Cursor::setTypeMap()](#mongodb-driver-cursor.settypemap) - Define un tipo de mapa a utilizar para la deserialización BSON

# MongoDB\Driver\Cursor::valid

(mongodb &gt;=1.9.0)

MongoDB\Driver\Cursor::valid — Verifica si la posición actual del cursor es válida

### Descripción

public **MongoDB\Driver\Cursor::valid**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la posición actual del cursor es válida, de lo contrario **[false](#constant.false)**.

### Ver también

- [Iterator::valid()](#iterator.valid) - Comprueba si la posición actual es válido

## Tabla de contenidos

- [MongoDB\Driver\Cursor::\_\_construct](#mongodb-driver-cursor.construct) — Crear un nuevo cursor (no utilizado)
- [MongoDB\Driver\Cursor::current](#mongodb-driver-cursor.current) — Devuelve el elemento actual
- [MongoDB\Driver\Cursor::getId](#mongodb-driver-cursor.getid) — Devuelve el ID de este cursor
- [MongoDB\Driver\Cursor::getServer](#mongodb-driver-cursor.getserver) — Devuelve el servidor asociado a este cursor
- [MongoDB\Driver\Cursor::isDead](#mongodb-driver-cursor.isdead) — Verifica si el cursor está agotado o puede tener resultados adicionales
- [MongoDB\Driver\Cursor::key](#mongodb-driver-cursor.key) — Devuelve el número del índice del resultado actual en el cursor
- [MongoDB\Driver\Cursor::next](#mongodb-driver-cursor.next) — Avance el cursor hacia el resultado siguiente
- [MongoDB\Driver\Cursor::rewind](#mongodb-driver-cursor.rewind) — Rebobina el cursor hasta el primer resultado
- [MongoDB\Driver\Cursor::setTypeMap](#mongodb-driver-cursor.settypemap) — Define un tipo de mapa a utilizar para la deserialización BSON
- [MongoDB\Driver\Cursor::toArray](#mongodb-driver-cursor.toarray) — Devuelve un array que contiene todos los resultados para este cursor
- [MongoDB\Driver\Cursor::valid](#mongodb-driver-cursor.valid) — Verifica si la posición actual del cursor es válida

# La clase MongoDB\Driver\CursorId

(mongodb &gt;=1.0.0)

## Introducción

    La clase **MongoDB\Driver\CursorID** es un objeto
    valor que representa un identificador de cursor.
    Las instancias de esta clase son devueltas por
    [MongoDB\Driver\Cursor::getId()](#mongodb-driver-cursor.getid).

**Advertencia**

     Esta clase ha sido *DEPRECADA* desde la versión
     1.20.0 de la extensión y ha sido eliminada en la versión 2.0. Las
     aplicaciones deberían actualizar su uso de
     [MongoDB\Driver\Cursor::getId()](#mongodb-driver-cursor.getid) para devolver
     [MongoDB\BSON\Int64](#class.mongodb-bson-int64) en su lugar.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\CursorId**


     implements
       [Serializable](#class.serializable),  [Stringable](#class.stringable) {


    /* Métodos */

final private [\_\_construct](#mongodb-driver-cursorid.construct)()
final public [\_\_toString](#mongodb-driver-cursorid.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 1.20.0

         Esta clase ha sido deprecada y será eliminada en la versión 2.0.




        PECL mongodb 1.12.0

         Implementa [Stringable](#class.stringable) para PHP 8.0+.




        PECL mongodb 1.7.0

         Implementa [Serializable](#class.serializable).






# MongoDB\Driver\CursorId::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\Driver\CursorId::\_\_construct — Crear un nuevo CursorId (no utilizado)

### Descripción

final private **MongoDB\Driver\CursorId::\_\_construct**()

Los objetos [MongoDB\Driver\CursorId](#class.mongodb-driver-cursorid) son devueltos por
[MongoDB\Driver\Cursor::getId()](#mongodb-driver-cursor.getid) y no pueden ser
construidos directamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Ver también

- [MongoDB\Driver\Cursor::getId()](#mongodb-driver-cursor.getid) - Devuelve el ID de este cursor

# MongoDB\Driver\CursorId::\_\_toString

(mongodb &gt;=1.0.0)

MongoDB\Driver\CursorId::\_\_toString — Representación en forma de string del ID de cursor

### Descripción

final public **MongoDB\Driver\CursorId::\_\_toString**(): [string](#language.types.string)

Devuelve la representación en forma de [string](#language.types.string) del ID de cursor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación en forma de [string](#language.types.string) del ID de cursor.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\CursorId::\_\_toString()**

&lt;?php

/\* En este ejemplo, introducimos varios documentos en la colección y

- especificamos un BatchSize más pequeño para garantizar que el primer lote contenga
- solo un subconjunto de nuestros resultados y que el cursor permanezca abierto en el
- servidor. \*/
  $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$query = new MongoDB\Driver\Query([], ['batchSize' =&gt; 2]);

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);
$bulk-&gt;insert(['x' =&gt; 2]);
$bulk-&gt;insert(['x' =&gt; 3]);
$manager-&gt;executeBulkWrite('db.collection', $bulk);

$cursor = $manager-&gt;executeQuery('db.collection', $query);
var_dump((string) $cursor-&gt;getId());

?&gt;

Resultado del ejemplo anterior es similar a:

string(11) "98061641158"

### Ver también

- [MongoDB\Driver\Cursor::getId()](#mongodb-driver-cursor.getid) - Devuelve el ID de este cursor

## Tabla de contenidos

- [MongoDB\Driver\CursorId::\_\_construct](#mongodb-driver-cursorid.construct) — Crear un nuevo CursorId (no utilizado)
- [MongoDB\Driver\CursorId::\_\_toString](#mongodb-driver-cursorid.tostring) — Representación en forma de string del ID de cursor

# La interfaz MongoDB\Driver\CursorInterface

(mongodb &gt;=1.6.0)

## Introducción

    Esta interfaz es implementada por
    [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor) para ser utilizada como
    tipo de argumento, de retorno o de propiedad en las clases de usuario.

## Sinopsis de la Clase

    ****




      class **MongoDB\Driver\CursorInterface**


     implements
       [Iterator](#class.iterator) {


    /* Métodos */

abstract public [getId](#mongodb-driver-cursorinterface.getid)(): [MongoDB\BSON\Int64](#class.mongodb-bson-int64)
abstract public [getServer](#mongodb-driver-cursorinterface.getserver)(): [MongoDB\Driver\Server](#class.mongodb-driver-server)
abstract public [isDead](#mongodb-driver-cursorinterface.isdead)(): [bool](#language.types.boolean)
abstract public [setTypeMap](#mongodb-driver-cursorinterface.settypemap)([array](#language.types.array) $typemap): [void](language.types.void.html)
abstract public [toArray](#mongodb-driver-cursorinterface.toarray)(): [array](#language.types.array)

}

## Historial de cambios

        Versión
        Descripción






        PECL mongodb 2.0.0


          Esta interfaz ahora extiende [Iterator](#class.iterator).




          Los tipos de retorno previamente declarados como tentativos ahora se aplican.








PECL mongodb 1.15.0

    Los tipos de retorno de los métodos son declarados como provisionales en PHP 8.0 y posteriores,
    lo que desencadena avisos de depreciación en el código que implementa esta interfaz sin declarar
    los tipos de retorno apropiados.
    El atributo #[ReturnTypeWillChange] puede ser añadido
    para ignorar la notificación de depreciación.







# MongoDB\Driver\CursorInterface::getId

(mongodb &gt;=1.6.0)

MongoDB\Driver\CursorInterface::getId — Devuelve el ID del cursor

### Descripción

abstract public **MongoDB\Driver\CursorInterface::getId**(): [MongoDB\BSON\Int64](#class.mongodb-bson-int64)

Devuelve el ID de este cursor, que identifica de manera única el cursor en el
servidor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el ID de este cursor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.20.0

        Adición de [MongoDB\BSON\Int64](#class.mongodb-bson-int64) al tipo de retorno
        provisional para este método. [MongoDB\Driver\CursorId](#class.mongodb-driver-cursorid)
        será eliminado del tipo de retorno en la versión 2.0.





### Ver también

- [MongoDB\Driver\Cursor::getId()](#mongodb-driver-cursor.getid) - Devuelve el ID de este cursor

- [MongoDB\Driver\CursorId](#class.mongodb-driver-cursorid)

- [MongoDB\BSON\Int64](#class.mongodb-bson-int64)

# MongoDB\Driver\CursorInterface::getServer

(mongodb &gt;=1.6.0)

MongoDB\Driver\CursorInterface::getServer — Devuelve el servidor asociado a este cursor

### Descripción

abstract public **MongoDB\Driver\CursorInterface::getServer**(): [MongoDB\Driver\Server](#class.mongodb-driver-server)

Devuelve el [MongoDB\Driver\Server](#class.mongodb-driver-server) asociado a este
cursor. Es el servidor que ha ejecutado la
[MongoDB\Driver\Query](#class.mongodb-driver-query) o
[MongoDB\Driver\Command](#class.mongodb-driver-command).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el [MongoDB\Driver\Server](#class.mongodb-driver-server) para este
cursor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Cursor::getServer()](#mongodb-driver-cursor.getserver) - Devuelve el servidor asociado a este cursor

- [MongoDB\Driver\Server](#class.mongodb-driver-server)

# MongoDB\Driver\CursorInterface::isDead

(mongodb &gt;=1.6.0)

MongoDB\Driver\CursorInterface::isDead — Indica si el cursor puede tener resultados adicionales

### Descripción

abstract public **MongoDB\Driver\CursorInterface::isDead**(): [bool](#language.types.boolean)

Verifica si el cursor puede tener resultados adicionales para leer. Un
cursor está inicialmente "vivo" pero puede volverse "muerto" por una de las
siguientes razones:

    - Avanzar un cursor no-tailable no ha devuelto ningún documento

    - El cursor ha encontrado un error

    - El cursor ha leído su último lote hasta el final

    - El cursor ha alcanzado su límite configurado

Esto es principalmente útil con los cursores tailables.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si no hay resultados adicionales disponibles, y **[false](#constant.false)**
en caso contrario.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Cursor::isDead()](#mongodb-driver-cursor.isdead) - Verifica si el cursor está agotado o puede tener resultados adicionales

# MongoDB\Driver\CursorInterface::setTypeMap

(mongodb &gt;=1.6.0)

MongoDB\Driver\CursorInterface::setTypeMap — Define un mapa de tipos para usar en la deserialización BSON

### Descripción

abstract public **MongoDB\Driver\CursorInterface::setTypeMap**([array](#language.types.array) $typemap): [void](language.types.void.html)

Define la [configuración
type map](#mongodb.persistence.typemaps) a utilizar durante la deserialización de los resultados BSON en
valores PHP.

### Parámetros

typeMap ([array](#language.types.array))

        [Configuración del mapa de tipos](#mongodb.persistence.typemaps).

### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Cursor::setTypeMap()](#mongodb-driver-cursor.settypemap) - Define un tipo de mapa a utilizar para la deserialización BSON

- [Persistir datos](#mongodb.persistence)

# MongoDB\Driver\CursorInterface::toArray

(mongodb &gt;=1.6.0)

MongoDB\Driver\CursorInterface::toArray — Devuelve un array que contiene todos los resultados de este cursor

### Descripción

abstract public **MongoDB\Driver\CursorInterface::toArray**(): [array](#language.types.array)

Itera el cursor y devuelve sus resultados en un array.
[MongoDB\Driver\CursorInterface::setTypeMap()](#mongodb-driver-cursorinterface.settypemap) puede ser utilizado
para controlar cómo los documentos son deserializados en valores PHP.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [array](#language.types.array) que contiene todos los resultados de este cursor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Cursor::toArray()](#mongodb-driver-cursor.toarray) - Devuelve un array que contiene todos los resultados para este cursor

- [MongoDB\Driver\CursorInterface::setTypeMap()](#mongodb-driver-cursorinterface.settypemap) - Define un mapa de tipos para usar en la deserialización BSON

## Tabla de contenidos

- [MongoDB\Driver\CursorInterface::getId](#mongodb-driver-cursorinterface.getid) — Devuelve el ID del cursor
- [MongoDB\Driver\CursorInterface::getServer](#mongodb-driver-cursorinterface.getserver) — Devuelve el servidor asociado a este cursor
- [MongoDB\Driver\CursorInterface::isDead](#mongodb-driver-cursorinterface.isdead) — Indica si el cursor puede tener resultados adicionales
- [MongoDB\Driver\CursorInterface::setTypeMap](#mongodb-driver-cursorinterface.settypemap) — Define un mapa de tipos para usar en la deserialización BSON
- [MongoDB\Driver\CursorInterface::toArray](#mongodb-driver-cursorinterface.toarray) — Devuelve un array que contiene todos los resultados de este cursor

# La clase MongoDB\Driver\Server

(mongodb &gt;=1.0.0)

## Introducción

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Server**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [TYPE_UNKNOWN](#mongodb-driver-server.constants.type-unknown) = 0;

    const
     [int](#language.types.integer)
      [TYPE_STANDALONE](#mongodb-driver-server.constants.type-standalone) = 1;

    const
     [int](#language.types.integer)
      [TYPE_MONGOS](#mongodb-driver-server.constants.type-mongos) = 2;

    const
     [int](#language.types.integer)
      [TYPE_POSSIBLE_PRIMARY](#mongodb-driver-server.constants.type-possible-primary) = 3;

    const
     [int](#language.types.integer)
      [TYPE_RS_PRIMARY](#mongodb-driver-server.constants.type-rs-primary) = 4;

    const
     [int](#language.types.integer)
      [TYPE_RS_SECONDARY](#mongodb-driver-server.constants.type-rs-secondary) = 5;

    const
     [int](#language.types.integer)
      [TYPE_RS_ARBITER](#mongodb-driver-server.constants.type-rs-arbiter) = 6;

    const
     [int](#language.types.integer)
      [TYPE_RS_OTHER](#mongodb-driver-server.constants.type-rs-other) = 7;

    const
     [int](#language.types.integer)
      [TYPE_RS_GHOST](#mongodb-driver-server.constants.type-rs-ghost) = 8;

    const
     [int](#language.types.integer)
      [TYPE_LOAD_BALANCER](#mongodb-driver-server.constants.type-load-balancer) = 9;


    /* Métodos */

final private [\_\_construct](#mongodb-driver-server.construct)()
final public [executeBulkWrite](#mongodb-driver-server.executebulkwrite)([string](#language.types.string) $namespace, [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite) $bulk, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)
final public [executeBulkWriteCommand](#mongodb-driver-server.executebulkwritecommand)([MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand) $bulk, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)
final public [executeCommand](#mongodb-driver-server.executecommand)([string](#language.types.string) $db, [MongoDB\Driver\Command](#class.mongodb-driver-command) $command, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)
final public [executeQuery](#mongodb-driver-server.executequery)([string](#language.types.string) $namespace, [MongoDB\Driver\Query](#class.mongodb-driver-query) $query, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)
final public [executeReadCommand](#mongodb-driver-server.executereadcommand)([string](#language.types.string) $db, [MongoDB\Driver\Command](#class.mongodb-driver-command) $command, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)
final public [executeReadWriteCommand](#mongodb-driver-server.executereadwritecommand)([string](#language.types.string) $db, [MongoDB\Driver\Command](#class.mongodb-driver-command) $command, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)
final public [executeWriteCommand](#mongodb-driver-server.executewritecommand)([string](#language.types.string) $db, [MongoDB\Driver\Command](#class.mongodb-driver-command) $command, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)
final public [getHost](#mongodb-driver-server.gethost)(): [string](#language.types.string)
final public [getInfo](#mongodb-driver-server.getinfo)(): [array](#language.types.array)
final public [getLatency](#mongodb-driver-server.getlatency)(): [?](#language.types.null)[integer](#language.types.integer)
final public [getPort](#mongodb-driver-server.getport)(): [int](#language.types.integer)
final public [getServerDescription](#mongodb-driver-server.getserverdescription)(): [MongoDB\Driver\ServerDescription](#class.mongodb-driver-serverdescription)
final public [getTags](#mongodb-driver-server.gettags)(): [array](#language.types.array)
final public [getType](#mongodb-driver-server.gettype)(): [int](#language.types.integer)
final public [isArbiter](#mongodb-driver-server.isarbiter)(): [bool](#language.types.boolean)
final public [isHidden](#mongodb-driver-server.ishidden)(): [bool](#language.types.boolean)
final public [isPassive](#mongodb-driver-server.ispassive)(): [bool](#language.types.boolean)
final public [isPrimary](#mongodb-driver-server.isprimary)(): [bool](#language.types.boolean)
final public [isSecondary](#mongodb-driver-server.issecondary)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[MongoDB\Driver\Server::TYPE_UNKNOWN](#mongodb-driver-server.constants.type-unknown)**

      Tipo de servidor desconocido, devuelto por [MongoDB\Driver\Server::getType()](#mongodb-driver-server.gettype).






     **[MongoDB\Driver\Server::TYPE_STANDALONE](#mongodb-driver-server.constants.type-standalone)**

      Tipo de servidor autónomo, devuelto por [MongoDB\Driver\Server::getType()](#mongodb-driver-server.gettype).






     **[MongoDB\Driver\Server::TYPE_MONGOS](#mongodb-driver-server.constants.type-mongos)**

      Tipo de servidor Mongos, devuelto por [MongoDB\Driver\Server::getType()](#mongodb-driver-server.gettype).






     **[MongoDB\Driver\Server::TYPE_POSSIBLE_PRIMARY](#mongodb-driver-server.constants.type-possible-primary)**

      Conjunto de réplicas tipo de servidor principal posible, devuelto por [MongoDB\Driver\Server::getType()](#mongodb-driver-server.gettype).


      Un servidor puede ser identificado como un posible primario si no ha sido verificado aún, pero otro miembro del conjunto de réplicas piensa que es el principal.






     **[MongoDB\Driver\Server::TYPE_RS_PRIMARY](#mongodb-driver-server.constants.type-rs-primary)**

      Tipo de servidor principal del conjunto de réplicas, devuelto por [MongoDB\Driver\Server::getType()](#mongodb-driver-server.gettype).






     **[MongoDB\Driver\Server::TYPE_RS_SECONDARY](#mongodb-driver-server.constants.type-rs-secondary)**

      Réplica de tipo de servidor secundario, devuelto por [MongoDB\Driver\Server::getType()](#mongodb-driver-server.gettype).






     **[MongoDB\Driver\Server::TYPE_RS_ARBITER](#mongodb-driver-server.constants.type-rs-arbiter)**

      Tipo de servidor árbitro de conjunto de réplicas, devuelto por [MongoDB\Driver\Server::getType()](#mongodb-driver-server.gettype).






     **[MongoDB\Driver\Server::TYPE_RS_OTHER](#mongodb-driver-server.constants.type-rs-other)**

      Tipo de servidor otro de conjunto de réplicas, devuelto por [MongoDB\Driver\Server::getType()](#mongodb-driver-server.gettype).


      Estos servidores pueden estar ocultos, en proceso de inicio o en recuperación. No pueden ser consultados, pero sus listas de hosts son útiles para descubrir la configuración actual del conjunto de réplicas.






     **[MongoDB\Driver\Server::TYPE_RS_GHOST](#mongodb-driver-server.constants.type-rs-ghost)**

      Tipo de servidor fantasma de conjunto de réplicas, devuelto por [MongoDB\Driver\Server::getType()](#mongodb-driver-server.gettype).



       Los servidores pueden ser identificados como tales en al menos tres
       situaciones: brevemente durante el arranque del servidor;
       en un conjunto de réplicas no inicializado; o cuando el servidor es evitado
       (es decir, eliminado de la configuración del conjunto de réplicas).
       No pueden ser consultados y su lista de hosts no puede
       ser utilizada para descubrir la configuración actual del conjunto de
       réplicas; sin embargo, el cliente puede monitorear este servidor con la esperanza
       de que cambie a un estado más útil.







     **[MongoDB\Driver\Server::TYPE_LOAD_BALANCER](#mongodb-driver-server.constants.type-load-balancer)**

      Tipo de servidor de balanceo de carga, devuelto por [MongoDB\Driver\Server::getType()](#mongodb-driver-server.gettype).




## Historial de cambios

        Versión
        Descripción






        PECL mongodb 1.11.0


          Adición de la constante
          **[MongoDB\Driver\Server::TYPE_LOAD_BALANCER](#mongodb-driver-server.constants.type-load-balancer)**.









# MongoDB\Driver\Server::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\Driver\Server::\_\_construct — Crear un nuevo servidor (no utilizado)

### Descripción

final private **MongoDB\Driver\Server::\_\_construct**()

    Los objetos [MongoDB\Driver\Server](#class.mongodb-driver-server) son creados internamente

por [MongoDB\Driver\Manager](#class.mongodb-driver-manager) cuando se establece una conexión de base de
datos y pueden ser devueltos por
[MongoDB\Driver\Manager::getServers()](#mongodb-driver-manager.getservers) y
[MongoDB\Driver\Manager::selectServer()](#mongodb-driver-manager.selectserver).

### Parámetros

Esta función no contiene ningún parámetro.

### Ver también

- [MongoDB\Driver\Manager::getServers()](#mongodb-driver-manager.getservers) - Devolver los servidores a los que está conectado este gestor

- [MongoDB\Driver\Manager::selectServer()](#mongodb-driver-manager.selectserver) - Selecciona un servidor correspondiente a una preferencia de lectura

# MongoDB\Driver\Server::executeBulkWrite

(mongodb &gt;=1.0.0)

MongoDB\Driver\Server::executeBulkWrite — Ejecuta una o varias operaciones de escritura en este servidor

### Descripción

final public **MongoDB\Driver\Server::executeBulkWrite**([string](#language.types.string) $namespace, [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite) $bulk, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)

Ejecuta una o varias operaciones de escritura en este servidor.

Un objeto [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite) puede ser construido con
una o varias operaciones de diferentes tipos (i.e. actualización, eliminación,
e inserción). El driver intentará enviar las operaciones del mismo tipo al
servidor en un mínimo de solicitudes posibles para optimizar los viajes de ida y vuelta.

El valor por omisión para la opción "writeConcern" será
deducido de una transacción activa (indicada por la opción
"session"), luego por el
[URI de conexión](#mongodb-driver-manager.construct-uri).

### Parámetros

namespace ([string](#language.types.string))

        Un espacio de nombres completamente calificado (ej. "databaseName.collectionName")

bulk ([MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite))

        Escritura(s) a ejecutar.







    options





       <caption>**options**</caption>



          Option
          Type
          Description







session
[MongoDB\Driver\Session](#class.mongodb-driver-session)

        Una sesión a asociar a la operación.









writeConcern
[MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

        Una preocupación de escritura a aplicar a la operación.













### Valores devueltos

Retorna un [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult) en caso de éxito.

### Errores/Excepciones

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si bulk no contiene ninguna operación de escritura.
    - Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si bulk ya ha sido ejecutado. Los objetos [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite) no pueden ser ejecutados varias veces.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si la opción "session" se utiliza junto con una preocupación de escritura no reconocida.

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una excepción **MongoDB\Driver\BulkWriteException** en caso de error de una operación de escritura (un error WriteError y WriteConcern)

    - Lanza una excepción [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception)
      si ocurre un error.

    ### Historial de cambios

          Versión
          Descripción






          PECL mongodb 2.0.0

           El parámetro options ya no acepta
           instancias [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern).




          PECL mongodb 1.21.0

           Pasar un objeto [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern) como
           options está obsoleto y será eliminado en la 2.0.




          PECL mongodb 1.4.4

           [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception)
           será lanzado si la opción "session" es utilizada
           conjuntamente con una preocupación de escritura no reconocida.




          PECL mongodb 1.4.0

           El tercer parámetro es ahora un array
           de options. Para la compatibilidad ascendente,
           este parámetro siempre aceptará un objeto [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern).




          PECL mongodb 1.3.0

           **MongoDBDriverExceptionInvalidArgumentException** es
           ahora lanzado si Bulk no contiene
           operaciones de escritura. Anteriormente, una
           [MongoDB\Driver\Exception\BulkWriteException](#class.mongodb-driver-exception-bulkwriteexception) era lanzada.



    ### Notas

    **Nota**:

Es responsabilidad del llamante asegurarse de que el
servidor sea capaz de ejecutar la operación de escritura. Por
ejemplo, la ejecución de una operación de escritura en un
secundario (excluyendo su base de datos "local") fallará.

### Ver también

- [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite)

- [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)

- [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

- [MongoDB\Driver\Manager::executeBulkWrite()](#mongodb-driver-manager.executebulkwrite) - Ejecuta una o varias operaciones de escritura

# MongoDB\Driver\Server::executeBulkWriteCommand

(mongodb &gt;=2.1.0)

MongoDB\Driver\Server::executeBulkWriteCommand — Ejecuta operaciones de escritura en este servidor utilizando el comando bulkWrite

### Descripción

final public **MongoDB\Driver\Server::executeBulkWriteCommand**([MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand) $bulk, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)

Ejecuta una o varias operaciones de escritura en el servidor primario utilizando el
comando [» bulkWrite](https://www.mongodb.com/docs/manual/reference/command/bulkWrite)
introducido en MongoDB 8.0.

Una [MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand) puede ser construida
con una o varias operaciones de escritura de tipos variados (por ejemplo, inserciones, actualizaciones
y eliminaciones). Cada operación de escritura puede apuntar a una colección diferente.

El valor por omisión para la opción "writeConcern" será
deducido de una transacción activa (indicada por la opción
"session"), seguida de
[la URI de conexión](#mongodb-driver-manager.construct-uri).

### Parámetros

    bulk ([MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand))


      Escritura(s) a ejecutar.







    options





       <caption>**options**</caption>



          Opción
          Tipo
          Descripción







session
[MongoDB\Driver\Session](#class.mongodb-driver-session)

        Una sesión a asociar a la operación.









writeConcern
[MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

        Una preocupación de escritura a aplicar a la operación.













### Valores devueltos

Retorna un [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult) en caso de éxito.

### Errores/Excepciones

- Lanza una [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si bulk no contiene operaciones de escritura válidas.

- Lanza una [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si bulk ya ha sido ejecutada. Los objetos [MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand) no pueden ser ejecutados múltiples veces.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si la opción "session" se utiliza junto con una preocupación de escritura no reconocida.

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una excepción [MongoDB\Driver\Exception\BulkWriteCommandException](#class.mongodb-driver-exception-bulkwritecommandexception) en caso de error de escritura (por ejemplo, fallo de comando, error de escritura o preocupación de escritura)

    - Lanza [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otro error.

    ### Ver también
    - [MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand)

    - [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)

    - [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

    - [MongoDB\Driver\Manager::executeBulkWriteCommand()](#mongodb-driver-manager.executebulkwritecommand) - Ejecuta operaciones de escritura utilizando el comando bulkWrite

    # MongoDB\Driver\Server::executeCommand

    (mongodb &gt;=1.0.0)

MongoDB\Driver\Server::executeCommand — Ejecuta un comando de base de datos en este servidor

### Descripción

final public **MongoDB\Driver\Server::executeCommand**([string](#language.types.string) $db, [MongoDB\Driver\Command](#class.mongodb-driver-command) $command, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

Ejecuta un comando en este servidor.

Este método no aplica ninguna lógica especial al comando. Los valores por omisión para las opciones "readPreference", "readConcern" y "writeConcern" serán deducidos de una transacción activa (indicada por la opción "session"). Si no hay una transacción activa, se utilizará una preferencia de lectura primaria para la selección del servidor.

Los valores por omisión _no_ serán deducidos de la [URI de conexión](#mongodb-driver-manager.construct-uri). Por lo tanto, se recomienda a los usuarios utilizar métodos de comando de lectura y/o escritura específicos si es posible.

**Nota**:

La opción readPreference no controla el servidor hacia
el cual el controlador emite la operación; siempre se ejecutará en este objeto
servidor. En su lugar, puede ser utilizado al emitir
la operación a un secundario (desde una conexión de conjunto de réplicas,
no autónoma) o el nodo Mongos para asegurarse de que el controlador defina el
protocolo de fila en consecuencia o añada la preferencia de lectura a
la operación, respectivamente.

### Parámetros

db ([string](#language.types.string))

        El nombre de la base de datos sobre la cual se ejecutará el comando.

command ([MongoDB\Driver\Command](#class.mongodb-driver-command))

        El comando a ejecutar.







    options





       <caption>**options**</caption>



          Option
          Type
          Description







readConcern
[MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern)

        Una preocupación de lectura a aplicar a la operación.




        Esta opción está disponible en MongoDB 3.2+ y se traducirá en
        una excepción en el momento de la ejecución si se especifica para
        una versión más antigua del servidor.









readPreference
[MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference)

        Una preferencia de lectura a utilizar para seleccionar un servidor
        para la operación.









session
[MongoDB\Driver\Session](#class.mongodb-driver-session)

        Una sesión a asociar a la operación.









writeConcern
[MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

        Una preocupación de escritura a aplicar a la operación.














**Advertencia**

    Si se utiliza una "session" que tiene una transacción
    en curso, no se puede especificar la opción "readConcern"
    o "writeConcern". Intentar hacer esto lanzará una excepción
    [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception).
    En su lugar, debe definir estas opciones cuando se crea la transacción con
    [MongoDB\Driver\Session::startTransaction()](#mongodb-driver-session.starttransaction).

### Valores devueltos

Retorna un [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor) en caso de éxito.

### Errores/Excepciones

- Throws [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) if the "session" option is used with an associated transaction in combination with a "readConcern" or "writeConcern" option.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si la opción "session" se utiliza junto con una preocupación de escritura no reconocida.

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una excepción [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) si ocurre un error (i.e. comando inválido, envío de un comando de escritura a un secundario).

    ### Historial de cambios

          Versión
          Descripción






          PECL mongodb 2.0.0

           El parámetro options ya no acepta instancias de [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern).




          PECL mongodb 1.21.0

           Pasar un objeto [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference) como options está obsoleto y será eliminado en la versión 2.0.




          PECL mongodb 1.4.4

           Se lanzará [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si la opción "session" se utiliza conjuntamente con una preocupación de escritura no reconocida.




          PECL mongodb 1.4.0

           El tercer parámetro es ahora un array de options. Para la compatibilidad ascendente, este parámetro siempre aceptará un objeto [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference).



    ### Notas

    **Nota**:

Es responsabilidad del llamante asegurarse de que el
servidor sea capaz de ejecutar la operación de escritura. Por
ejemplo, la ejecución de una operación de escritura en un
secundario (excluyendo su base de datos "local") fallará.

### Ver también

- [MongoDB\Driver\Command](#class.mongodb-driver-command)

- [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

- [MongoDB\Driver\Server::executeReadCommand()](#mongodb-driver-server.executereadcommand) - Ejecuta un comando de base de datos que lee en este servidor

- [MongoDB\Driver\Server::executeReadWriteCommand()](#mongodb-driver-server.executereadwritecommand) - Ejecuta un comando de base de datos que lee y escribe en este servidor

- [MongoDB\Driver\Server::executeWriteCommand()](#mongodb-driver-server.executewritecommand) - Ejecuta un comando de base de datos que escribe en este servidor

- [MongoDB\Driver\Manager::executeCommand()](#mongodb-driver-manager.executecommand) - Ejecuta un comando de base de datos

# MongoDB\Driver\Server::executeQuery

(mongodb &gt;=1.0.0)

MongoDB\Driver\Server::executeQuery — Ejecuta una consulta de base de datos en este servidor

### Descripción

final public **MongoDB\Driver\Server::executeQuery**([string](#language.types.string) $namespace, [MongoDB\Driver\Query](#class.mongodb-driver-query) $query, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

Ejecuta la consulta en este servidor.

Los valores por omisión para la opción "readPreference" y
la opción "readConcern" de la consulta se deducirán de una transacción activa
(indicada por la opción "session"), luego por la [URI de conexión](#mongodb-driver-manager.construct-uri).

**Nota**:

La opción readPreference no controla el servidor hacia
el cual el controlador emite la operación; siempre se ejecutará en este objeto
servidor. En su lugar, puede ser utilizado al emitir
la operación a un secundario (desde una conexión de conjunto de réplicas,
no autónoma) o el nodo Mongos para asegurarse de que el controlador defina el
protocolo de fila en consecuencia o añada la preferencia de lectura a
la operación, respectivamente.

### Parámetros

namespace ([string](#language.types.string))

        Un espacio de nombres completamente calificado (ej. "databaseName.collectionName")

query ([MongoDB\Driver\Query](#class.mongodb-driver-query))

        La consulta a ejecutar.







    options





       <caption>**options**</caption>



          Option
          Type
          Description







readPreference
[MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference)

        Una preferencia de lectura a utilizar para seleccionar un servidor
        para la operación.









session
[MongoDB\Driver\Session](#class.mongodb-driver-session)

        Una sesión a asociar a la operación.













### Valores devueltos

Retorna un [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor) en caso de éxito.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una excepción [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception)
      si ocurre un error (i.e. operadores de consulta inválidos).

    ### Historial de cambios

         Versión
         Descripción






         PECL mongodb 2.0.0

          El parámetro options ya no acepta
          una instancia [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern).




         PECL mongodb 1.21.0

          Pasar un objeto [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference) como
          options está obsoleto y será eliminado en la 2.0.




         PECL mongodb 1.4.0

          El tercer parámetro es ahora un array
          de options. Para la compatibilidad ascendente,
          este parámetro siempre aceptará un objeto [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference).


    ### Ver también
    - [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

    - [MongoDB\Driver\Query](#class.mongodb-driver-query)

    - [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference)

    - [MongoDB\Driver\Manager::executeQuery()](#mongodb-driver-manager.executequery) - Ejecuta una consulta de base de datos

    # MongoDB\Driver\Server::executeReadCommand

    (mongodb &gt;=1.4.0)

MongoDB\Driver\Server::executeReadCommand — Ejecuta un comando de base de datos que lee en este servidor

### Descripción

final public **MongoDB\Driver\Server::executeReadCommand**([string](#language.types.string) $db, [MongoDB\Driver\Command](#class.mongodb-driver-command) $command, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

Ejecuta el comando en este servidor, independientemente de la opción
"readPreference".

Este método aplicará una lógica específica a los comandos de lectura (por ejemplo
[» distinct](https://www.mongodb.com/docs/manual/reference/command/distinct/)).
Los valores por omisión para las opciones "readPreference" y
"readConcern" serán deducidos de una transacción activa (indicada por
la opción "session"), seguida de la
[URI de conexión](#mongodb-driver-manager.construct-uri).

**Nota**:

La opción readPreference no controla el servidor hacia
el cual el controlador emite la operación; siempre se ejecutará en este objeto
servidor. En su lugar, puede ser utilizado al emitir
la operación a un secundario (desde una conexión de conjunto de réplicas,
no autónoma) o el nodo Mongos para asegurarse de que el controlador defina el
protocolo de fila en consecuencia o añada la preferencia de lectura a
la operación, respectivamente.

### Parámetros

db ([string](#language.types.string))

        El nombre de la base de datos sobre la cual se ejecutará el comando.

command ([MongoDB\Driver\Command](#class.mongodb-driver-command))

        El comando a ejecutar.







    options





       <caption>**options**</caption>



          Option
          Type
          Description







readConcern
[MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern)

        Una preocupación de lectura a aplicar a la operación.




        Esta opción está disponible en MongoDB 3.2+ y se traducirá en
        una excepción en el momento de la ejecución si se especifica para
        una versión más antigua del servidor.









readPreference
[MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference)

        Una preferencia de lectura a utilizar para seleccionar un servidor
        para la operación.









session
[MongoDB\Driver\Session](#class.mongodb-driver-session)

        Una sesión a asociar a la operación.














**Advertencia**

    Si se utiliza una "session" que tiene una transacción
    en curso, no se puede especificar la opción "readConcern"
    o "writeConcern". Intentar hacer esto lanzará una excepción
    [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception).
    En su lugar, debe definir estas opciones cuando se crea la transacción con
    [MongoDB\Driver\Session::startTransaction()](#mongodb-driver-session.starttransaction).

### Valores devueltos

Retorna un [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor) en caso de éxito.

### Errores/Excepciones

- Throws [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) if the "session" option is used with an associated transaction in combination with a "readConcern" or "writeConcern" option.

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otros errores (por ejemplo: comando inválido).

    ### Ver también
    - [MongoDB\Driver\Command](#class.mongodb-driver-command)

    - [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

    - [MongoDB\Driver\Server::executeCommand()](#mongodb-driver-server.executecommand) - Ejecuta un comando de base de datos en este servidor

    - [MongoDB\Driver\Server::executeReadWriteCommand()](#mongodb-driver-server.executereadwritecommand) - Ejecuta un comando de base de datos que lee y escribe en este servidor

    - [MongoDB\Driver\Server::executeWriteCommand()](#mongodb-driver-server.executewritecommand) - Ejecuta un comando de base de datos que escribe en este servidor

    - [MongoDB\Driver\Manager::executeReadCommand()](#mongodb-driver-manager.executereadcommand) - Ejecuta un comando de base de datos que lee

    # MongoDB\Driver\Server::executeReadWriteCommand

    (mongodb &gt;=1.4.0)

MongoDB\Driver\Server::executeReadWriteCommand — Ejecuta un comando de base de datos que lee y escribe en este servidor

### Descripción

final public **MongoDB\Driver\Server::executeReadWriteCommand**([string](#language.types.string) $db, [MongoDB\Driver\Command](#class.mongodb-driver-command) $command, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

Ejecuta el comando en este servidor.

Este método aplicará una lógica específica a los comandos de lectura y escritura
(por ejemplo [» aggregate](https://www.mongodb.com/docs/manual/reference/command/aggregate/)).
Los valores por omisión para las opciones "readConcern" y
"writeConcern" serán deducidos de una transacción activa (indicada por
la opción "session"), seguida de la
[URI de conexión](#mongodb-driver-manager.construct-uri).

### Parámetros

db ([string](#language.types.string))

        El nombre de la base de datos sobre la cual se ejecutará el comando.

command ([MongoDB\Driver\Command](#class.mongodb-driver-command))

        El comando a ejecutar.







    options





       <caption>**options**</caption>



          Option
          Type
          Description







readConcern
[MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern)

        Una preocupación de lectura a aplicar a la operación.




        Esta opción está disponible en MongoDB 3.2+ y se traducirá en
        una excepción en el momento de la ejecución si se especifica para
        una versión más antigua del servidor.









session
[MongoDB\Driver\Session](#class.mongodb-driver-session)

        Una sesión a asociar a la operación.









writeConcern
[MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

        Una preocupación de escritura a aplicar a la operación.














**Advertencia**

    Si se utiliza una "session" que tiene una transacción
    en curso, no se puede especificar la opción "readConcern"
    o "writeConcern". Intentar hacer esto lanzará una excepción
    [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception).
    En su lugar, debe definir estas opciones cuando se crea la transacción con
    [MongoDB\Driver\Session::startTransaction()](#mongodb-driver-session.starttransaction).

### Valores devueltos

Retorna un [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor) en caso de éxito.

### Errores/Excepciones

- Throws [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) if the "session" option is used with an associated transaction in combination with a "readConcern" or "writeConcern" option.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si la opción "session" se utiliza junto con una preocupación de escritura no reconocida.

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otros errores (por ejemplo: comando inválido).

    ### Historial de cambios

          Versión
          Descripción






          PECL mongodb 1.4.4

           Una [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception)
           será lanzada si la opción "session" es utilizada en
           combinación con un writeConcern no reconocido.



    ### Notas

    **Nota**:

Es responsabilidad del llamante asegurarse de que el
servidor sea capaz de ejecutar la operación de escritura. Por
ejemplo, la ejecución de una operación de escritura en un
secundario (excluyendo su base de datos "local") fallará.

### Ver también

- [MongoDB\Driver\Command](#class.mongodb-driver-command)

- [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

- [MongoDB\Driver\Server::executeCommand()](#mongodb-driver-server.executecommand) - Ejecuta un comando de base de datos en este servidor

- [MongoDB\Driver\Server::executeReadCommand()](#mongodb-driver-server.executereadcommand) - Ejecuta un comando de base de datos que lee en este servidor

- [MongoDB\Driver\Server::executeWriteCommand()](#mongodb-driver-server.executewritecommand) - Ejecuta un comando de base de datos que escribe en este servidor

- [MongoDB\Driver\Manager::executeReadWriteCommand()](#mongodb-driver-manager.executereadwritecommand) - Ejecuta un comando de base de datos que lee y escribe

# MongoDB\Driver\Server::executeWriteCommand

(mongodb &gt;=1.4.0)

MongoDB\Driver\Server::executeWriteCommand — Ejecuta un comando de base de datos que escribe en este servidor

### Descripción

final public **MongoDB\Driver\Server::executeWriteCommand**([string](#language.types.string) $db, [MongoDB\Driver\Command](#class.mongodb-driver-command) $command, [?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

Ejecuta el comando en este servidor.

Este método aplicará una lógica específica a los comandos que escriben (por ejemplo
[» drop](https://www.mongodb.com/docs/manual/reference/command/drop/)).
El valor por omisión para la opción "writeConcern" será deducido de una transacción activa (indicada por
la opción "session"), seguida de la
[URI de conexión](#mongodb-driver-manager.construct-uri).

**Nota**:

    Este método no está destinado a ser utilizado para ejecutar
    [» insert](https://www.mongodb.com/docs/manual/reference/command/insert/),
    [» update](https://www.mongodb.com/docs/manual/reference/command/update/),
    o [» delete](https://www.mongodb.com/docs/manual/reference/command/delete/)
    comandos. Se recomienda a los usuarios utilizar
    [MongoDB\Driver\Server::executeBulkWrite()](#mongodb-driver-server.executebulkwrite) para estas
    operaciones.

### Parámetros

db ([string](#language.types.string))

        El nombre de la base de datos sobre la cual se ejecutará el comando.

command ([MongoDB\Driver\Command](#class.mongodb-driver-command))

        El comando a ejecutar.







    options





       <caption>**options**</caption>



          Option
          Type
          Description







session
[MongoDB\Driver\Session](#class.mongodb-driver-session)

        Una sesión a asociar a la operación.









writeConcern
[MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

        Una preocupación de escritura a aplicar a la operación.














**Advertencia**

    Si se utiliza una "session" que tiene una transacción
    en curso, no se puede especificar la opción "readConcern"
    o "writeConcern". Intentar hacer esto lanzará una excepción
    [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception).
    En su lugar, debe definir estas opciones cuando se crea la transacción con
    [MongoDB\Driver\Session::startTransaction()](#mongodb-driver-session.starttransaction).

### Valores devueltos

Retorna un [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor) en caso de éxito.

### Errores/Excepciones

- Throws [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) if the "session" option is used with an associated transaction in combination with a "readConcern" or "writeConcern" option.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si la opción "session" se utiliza junto con una preocupación de escritura no reconocida.

- Lanza una excepción **MongoDB\Driver\AuthenticationException** si se requiere una identificación pero falla
- Lanza una excepción **MongoDB\Driver\ConnectionException** si la conexión al servidor falla por una razón distinta a un problema de identificación
    - Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) en caso de otros errores (por ejemplo: comando inválido).

    ### Historial de cambios

          Versión
          Descripción






          PECL mongodb 1.4.4

           Una [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception)
           será lanzada si la opción "session" es utilizada en
           combinación con un writeConcern no reconocido.



    ### Notas

    **Nota**:

Es responsabilidad del llamante asegurarse de que el
servidor sea capaz de ejecutar la operación de escritura. Por
ejemplo, la ejecución de una operación de escritura en un
secundario (excluyendo su base de datos "local") fallará.

### Ver también

- [MongoDB\Driver\Command](#class.mongodb-driver-command)

- [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor)

- [MongoDB\Driver\Server::executeCommand()](#mongodb-driver-server.executecommand) - Ejecuta un comando de base de datos en este servidor

- [MongoDB\Driver\Server::executeReadCommand()](#mongodb-driver-server.executereadcommand) - Ejecuta un comando de base de datos que lee en este servidor

- [MongoDB\Driver\Server::executeReadWriteCommand()](#mongodb-driver-server.executereadwritecommand) - Ejecuta un comando de base de datos que lee y escribe en este servidor

- [MongoDB\Driver\Manager::executeWriteCommand()](#mongodb-driver-manager.executewritecommand) - Ejecuta un comando de base de datos que escribe

# MongoDB\Driver\Server::getHost

(mongodb &gt;=1.0.0)

MongoDB\Driver\Server::getHost — Devuelve el nombre del host del servidor

### Descripción

final public **MongoDB\Driver\Server::getHost**(): [string](#language.types.string)

Devuelve el nombre del host del servidor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del host del servidor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\Server::getHost()**

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017/");

$server = $manager-&gt;selectServer();

var_dump($server-&gt;getHost());

?&gt;

El ejemplo anterior mostrará:

string(9) "localhost"

### Ver también

- [MongoDB\Driver\Server::getInfo()](#mongodb-driver-server.getinfo) - Devuelve un array de información que describe este servidor

- [MongoDB\Driver\ServerDescription::getHost()](#mongodb-driver-serverdescription.gethost) - Devuelve el nombre de host de este servidor

# MongoDB\Driver\Server::getInfo

(mongodb &gt;=1.0.0)

MongoDB\Driver\Server::getInfo — Devuelve un array de información que describe este servidor

### Descripción

final public **MongoDB\Driver\Server::getInfo**(): [array](#language.types.array)

Devuelve un array de información que describe el servidor. Este array se deriva
de la respuesta más reciente a la comando [» hello](https://www.mongodb.com/docs/manual/reference/command/hello/)
obtenida por la [» supervisión del servidor](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md).

**Nota**:

    Cuando el controlador está conectado a un balanceador de carga, este método devuelve
    la respuesta al comando [» hello](https://www.mongodb.com/docs/manual/reference/command/hello/)
    del servidor de respaldo durante el apretón de manos inicial de la conexión.
    Esto contrasta con otros métodos (por ejemplo, [MongoDB\Driver\Server::getType()](#mongodb-driver-server.gettype)),
    que devolverán información sobre el balanceador de carga mismo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de información que describe este servidor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\Server::getInfo()**

&lt;?php

$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017/');

$rp = new MongoDB\Driver\ReadPreference('primary');
$server = $manager-&gt;selectServer($rp);

var_dump($server-&gt;getInfo());

?&gt;

Resultado del ejemplo anterior es similar a:

array(23) {
["helloOk"]=&gt;
bool(true)
["topologyVersion"]=&gt;
array(2) {
["processId"]=&gt;
object(MongoDB\BSON\ObjectId)#4 (1) {
["oid"]=&gt;
string(24) "617b6d696a3a89d2f77e6df0"
}
["counter"]=&gt;
int(6)
}
["hosts"]=&gt;
array(1) {
[0]=&gt;
string(15) "localhost:27017"
}
["setName"]=&gt;
string(3) "rs0"
["setVersion"]=&gt;
int(1)
["ismaster"]=&gt;
bool(true)
["secondary"]=&gt;
bool(false)
["primary"]=&gt;
string(15) "localhost:27017"
["me"]=&gt;
string(15) "localhost:27017"
["electionId"]=&gt;
object(MongoDB\BSON\ObjectId)#5 (1) {
["oid"]=&gt;
string(24) "7fffffff0000000000000001"
}
["lastWrite"]=&gt;
array(4) {
["opTime"]=&gt;
array(2) {
["ts"]=&gt;
object(MongoDB\BSON\Timestamp)#6 (2) {
["increment"]=&gt;
string(1) "1"
["timestamp"]=&gt;
string(10) "1635478989"
}
["t"]=&gt;
int(1)
}
["lastWriteDate"]=&gt;
object(MongoDB\BSON\UTCDateTime)#7 (1) {
["milliseconds"]=&gt;
string(13) "1635478989000"
}
["majorityOpTime"]=&gt;
array(2) {
["ts"]=&gt;
object(MongoDB\BSON\Timestamp)#8 (2) {
["increment"]=&gt;
string(1) "1"
["timestamp"]=&gt;
string(10) "1635478989"
}
["t"]=&gt;
int(1)
}
["majorityWriteDate"]=&gt;
object(MongoDB\BSON\UTCDateTime)#9 (1) {
["milliseconds"]=&gt;
string(13) "1635478989000"
}
}
["maxBsonObjectSize"]=&gt;
int(16777216)
["maxMessageSizeBytes"]=&gt;
int(48000000)
["maxWriteBatchSize"]=&gt;
int(100000)
["localTime"]=&gt;
object(MongoDB\BSON\UTCDateTime)#10 (1) {
["milliseconds"]=&gt;
string(13) "1635478992136"
}
["logicalSessionTimeoutMinutes"]=&gt;
int(30)
["connectionId"]=&gt;
int(3)
["minWireVersion"]=&gt;
int(0)
["maxWireVersion"]=&gt;
int(13)
["readOnly"]=&gt;
bool(false)
["ok"]=&gt;
float(1)
["$clusterTime"]=&gt;
array(2) {
["clusterTime"]=&gt;
object(MongoDB\BSON\Timestamp)#11 (2) {
["increment"]=&gt;
string(1) "1"
["timestamp"]=&gt;
string(10) "1635478989"
}
["signature"]=&gt;
array(2) {
["hash"]=&gt;
object(MongoDB\BSON\Binary)#12 (2) {
["data"]=&gt;
string(20) ""
["type"]=&gt;
int(0)
}
["keyId"]=&gt;
int(0)
}
}
["operationTime"]=&gt;
object(MongoDB\BSON\Timestamp)#13 (2) {
["increment"]=&gt;
string(1) "1"
["timestamp"]=&gt;
string(10) "1635478989"
}
}

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.11.0

        Cuando el controlador está conectado a un balanceador de carga,
        este método devuelve la respuesta al comando hello del servidor
        de respaldo a partir del apretón de manos de conexión inicial.





### Ver también

- [MongoDB\Driver\ServerDescription::getHelloResponse()](#mongodb-driver-serverdescription.gethelloresponse) - Devuelve la respuesta "hello" más reciente del servidor

- Comando [» hello](https://www.mongodb.com/docs/manual/reference/command/hello/) en el manual de MongoDB

- [» Especificación de la detección y supervisión de servidores](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md)

# MongoDB\Driver\Server::getLatency

(mongodb &gt;=1.0.0)

MongoDB\Driver\Server::getLatency — Devuelve la latencia de este servidor en milisegundos

### Descripción

final public **MongoDB\Driver\Server::getLatency**(): [?](#language.types.null)[integer](#language.types.integer)

Devuelve la latencia de este servidor en milisegundos. Es la medida del cliente del tiempo de
[» ida y vuelta](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md#round-trip-time)
de un comando hello.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la latencia del servidor en milisegundos,
o **[null](#constant.null)** si no se ha medido ninguna latencia (por ejemplo, el cliente está conectado a un balanceador de carga).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.11.0

        Este método devolverá **[null](#constant.null)** si no se ha medido ninguna latencia.
        En versiones anteriores, siempre se devolvía un número entero
        y un valor no definido podía ser señalado como -1.





### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\Server::getLatency()**

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017/");

$server = $manager-&gt;selectServer();

var_dump($server-&gt;getLatency());

?&gt;

Resultado del ejemplo anterior es similar a:

int(592)

### Ver también

- [MongoDB\Driver\Server::getInfo()](#mongodb-driver-server.getinfo) - Devuelve un array de información que describe este servidor

- [MongoDB\Driver\ServerDescription::getRoundTripTime()](#mongodb-driver-serverdescription.getroundtriptime) - Devuelve el tiempo de ida y vuelta del servidor en milisegundos

- [» La especificación sobre el descubrimiento y la supervisión de un servidor](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md)

# MongoDB\Driver\Server::getPort

(mongodb &gt;=1.0.0)

MongoDB\Driver\Server::getPort — Devuelve el puerto en el que el servidor está escuchando

### Descripción

final public **MongoDB\Driver\Server::getPort**(): [int](#language.types.integer)

Devuelve el puerto en el que el servidor está escuchando.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el puerto en el que el servidor está escuchando.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\Server::getPort()**

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017/");

$server = $manager-&gt;selectServer();

var_dump($server-&gt;getPort());

?&gt;

El ejemplo anterior mostrará:

int(27017)

### Ver también

- [MongoDB\Driver\Server::getInfo()](#mongodb-driver-server.getinfo) - Devuelve un array de información que describe este servidor

- [MongoDB\Driver\ServerDescription::getPort()](#mongodb-driver-serverdescription.getport) - Devuelve el puerto en el que este servidor escucha

# MongoDB\Driver\Server::getServerDescription

(mongodb &gt;=1.13.0)

MongoDB\Driver\Server::getServerDescription — Devuelve una ServerDescription para este servidor

### Descripción

final public **MongoDB\Driver\Server::getServerDescription**(): [MongoDB\Driver\ServerDescription](#class.mongodb-driver-serverdescription)

Devuelve una [MongoDB\Driver\ServerDescription](#class.mongodb-driver-serverdescription) para este
servidor. Es un objeto de valor inmutable que describirá el servidor en el momento
en que se llame a este método.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una [MongoDB\Driver\ServerDescription](#class.mongodb-driver-serverdescription) para este
servidor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Server::getTags

(mongodb &gt;=1.0.0)

MongoDB\Driver\Server::getTags — Devuelve un array de tags que describen este servidor en un conjunto de réplicas

### Descripción

final public **MongoDB\Driver\Server::getTags**(): [array](#language.types.array)

Devuelve un [array](#language.types.array) de
[» tags](https://www.mongodb.com/docs/manual/reference/glossary/#term-tag) utilizados para
describir este servidor en un conjunto de réplicas. El array contendrá cero o más
pares clave y valor de tipo [string](#language.types.string).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [array](#language.types.array) de tags utilizados para describir este servidor en un
conjunto de réplicas.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Server::getInfo()](#mongodb-driver-server.getinfo) - Devuelve un array de información que describe este servidor

# MongoDB\Driver\Server::getType

(mongodb &gt;=1.0.0)

MongoDB\Driver\Server::getType — Devuelve un integer que representa el tipo del servidor

### Descripción

final public **MongoDB\Driver\Server::getType**(): [int](#language.types.integer)

Devuelve un [int](#language.types.integer) que representa el tipo del servidor. El valor
corresponderá a una constante [MongoDB\Driver\Server](#class.mongodb-driver-server).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [int](#language.types.integer) que representa el tipo del servidor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Server::getInfo()](#mongodb-driver-server.getinfo) - Devuelve un array de información que describe este servidor

- [MongoDB\Driver\ServerDescription::getType()](#mongodb-driver-serverdescription.gettype) - Devuelve un string que indica el tipo de este servidor

# MongoDB\Driver\Server::isArbiter

(mongodb &gt;=1.0.0)

MongoDB\Driver\Server::isArbiter — Verifica si este servidor es un miembro árbitro de un conjunto de réplicas

### Descripción

final public **MongoDB\Driver\Server::isArbiter**(): [bool](#language.types.boolean)

Devuelve si este servidor es un
[» miembro árbitro](https://www.mongodb.com/docs/manual/reference/glossary/#term-arbiter)
de un conjunto de réplicas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si este servidor es un miembro árbitro de un conjunto de réplicas, y
**[false](#constant.false)** en caso contrario.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Server::getInfo()](#mongodb-driver-server.getinfo) - Devuelve un array de información que describe este servidor

# MongoDB\Driver\Server::isHidden

(mongodb &gt;=1.0.0)

MongoDB\Driver\Server::isHidden — Indica si este servidor es un miembro oculto de un conjunto de réplicas

### Descripción

final public **MongoDB\Driver\Server::isHidden**(): [bool](#language.types.boolean)

Indica si este servidor es un
[» miembro oculto](https://www.mongodb.com/docs/manual/reference/glossary/#term-hidden-member)
de un conjunto de réplicas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si este servidor es un miembro oculto de un conjunto de réplicas, y
**[false](#constant.false)** en caso contrario.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Server::getInfo()](#mongodb-driver-server.getinfo) - Devuelve un array de información que describe este servidor

# MongoDB\Driver\Server::isPassive

(mongodb &gt;=1.0.0)

MongoDB\Driver\Server::isPassive — Verifica si el servidor es un miembro pasivo del conjunto de réplicas

### Descripción

final public **MongoDB\Driver\Server::isPassive**(): [bool](#language.types.boolean)

Devuelve si el servidor es un
[» miembro pasivo](https://www.mongodb.com/docs/manual/reference/glossary/#term-passive-member)
de un conjunto de réplicas (i.e. su prioridad es 0).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el servidor es un miembro pasivo de un conjunto de réplicas,
y **[false](#constant.false)** en caso contrario.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Server::getInfo()](#mongodb-driver-server.getinfo) - Devuelve un array de información que describe este servidor

# MongoDB\Driver\Server::isPrimary

(mongodb &gt;=1.0.0)

MongoDB\Driver\Server::isPrimary — Verifica si este servidor es un miembro principal de un conjunto de réplicas

### Descripción

final public **MongoDB\Driver\Server::isPrimary**(): [bool](#language.types.boolean)

Devuelve si este servidor es un
[» miembro principal](https://www.mongodb.com/docs/manual/reference/glossary/#term-primary)
de un conjunto de réplicas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si este servidor es un miembro principal de un conjunto de réplicas, y
**[false](#constant.false)** en caso contrario.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Server::getInfo()](#mongodb-driver-server.getinfo) - Devuelve un array de información que describe este servidor

# MongoDB\Driver\Server::isSecondary

(mongodb &gt;=1.0.0)

MongoDB\Driver\Server::isSecondary — Verifica si este servidor es un miembro secundario de un conjunto de réplicas

### Descripción

final public **MongoDB\Driver\Server::isSecondary**(): [bool](#language.types.boolean)

Devuelve si este servidor es un
[» miembro secundario](https://www.mongodb.com/docs/manual/reference/glossary/#term-secondary)
de un conjunto de réplicas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si este servidor es un miembro secundario de un conjunto de réplicas, y
**[false](#constant.false)** en caso contrario.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Server::getInfo()](#mongodb-driver-server.getinfo) - Devuelve un array de información que describe este servidor

## Tabla de contenidos

- [MongoDB\Driver\Server::\_\_construct](#mongodb-driver-server.construct) — Crear un nuevo servidor (no utilizado)
- [MongoDB\Driver\Server::executeBulkWrite](#mongodb-driver-server.executebulkwrite) — Ejecuta una o varias operaciones de escritura en este servidor
- [MongoDB\Driver\Server::executeBulkWriteCommand](#mongodb-driver-server.executebulkwritecommand) — Ejecuta operaciones de escritura en este servidor utilizando el comando bulkWrite
- [MongoDB\Driver\Server::executeCommand](#mongodb-driver-server.executecommand) — Ejecuta un comando de base de datos en este servidor
- [MongoDB\Driver\Server::executeQuery](#mongodb-driver-server.executequery) — Ejecuta una consulta de base de datos en este servidor
- [MongoDB\Driver\Server::executeReadCommand](#mongodb-driver-server.executereadcommand) — Ejecuta un comando de base de datos que lee en este servidor
- [MongoDB\Driver\Server::executeReadWriteCommand](#mongodb-driver-server.executereadwritecommand) — Ejecuta un comando de base de datos que lee y escribe en este servidor
- [MongoDB\Driver\Server::executeWriteCommand](#mongodb-driver-server.executewritecommand) — Ejecuta un comando de base de datos que escribe en este servidor
- [MongoDB\Driver\Server::getHost](#mongodb-driver-server.gethost) — Devuelve el nombre del host del servidor
- [MongoDB\Driver\Server::getInfo](#mongodb-driver-server.getinfo) — Devuelve un array de información que describe este servidor
- [MongoDB\Driver\Server::getLatency](#mongodb-driver-server.getlatency) — Devuelve la latencia de este servidor en milisegundos
- [MongoDB\Driver\Server::getPort](#mongodb-driver-server.getport) — Devuelve el puerto en el que el servidor está escuchando
- [MongoDB\Driver\Server::getServerDescription](#mongodb-driver-server.getserverdescription) — Devuelve una ServerDescription para este servidor
- [MongoDB\Driver\Server::getTags](#mongodb-driver-server.gettags) — Devuelve un array de tags que describen este servidor en un conjunto de réplicas
- [MongoDB\Driver\Server::getType](#mongodb-driver-server.gettype) — Devuelve un integer que representa el tipo del servidor
- [MongoDB\Driver\Server::isArbiter](#mongodb-driver-server.isarbiter) — Verifica si este servidor es un miembro árbitro de un conjunto de réplicas
- [MongoDB\Driver\Server::isHidden](#mongodb-driver-server.ishidden) — Indica si este servidor es un miembro oculto de un conjunto de réplicas
- [MongoDB\Driver\Server::isPassive](#mongodb-driver-server.ispassive) — Verifica si el servidor es un miembro pasivo del conjunto de réplicas
- [MongoDB\Driver\Server::isPrimary](#mongodb-driver-server.isprimary) — Verifica si este servidor es un miembro principal de un conjunto de réplicas
- [MongoDB\Driver\Server::isSecondary](#mongodb-driver-server.issecondary) — Verifica si este servidor es un miembro secundario de un conjunto de réplicas

# La clase MongoDB\Driver\ServerDescription

(mongodb &gt;=1.13.0)

## Introducción

    La clase **MongoDB\Driver\ServerDescription** es un objeto de valor
    que representa un servidor al cual el controlador está conectado. Las instancias
    de esta clase son devueltas por los métodos
    [MongoDB\Driver\Server::getServerDescription()](#mongodb-driver-server.getserverdescription) y
    [MongoDB\Driver\Monitoring\ServerChangedEvent](#class.mongodb-driver-monitoring-serverchangedevent).

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\ServerDescription**

     {

    /* Constantes */

     const
     [string](#language.types.string)
      [TYPE_UNKNOWN](#mongodb-driver-serverdescription.constants.type-unknown) = "Unknown";

    const
     [string](#language.types.string)
      [TYPE_STANDALONE](#mongodb-driver-serverdescription.constants.type-standalone) = "Standalone";

    const
     [string](#language.types.string)
      [TYPE_MONGOS](#mongodb-driver-serverdescription.constants.type-mongos) = "Mongos";

    const
     [string](#language.types.string)
      [TYPE_POSSIBLE_PRIMARY](#mongodb-driver-serverdescription.constants.type-possible-primary) = "PossiblePrimary";

    const
     [string](#language.types.string)
      [TYPE_RS_PRIMARY](#mongodb-driver-serverdescription.constants.type-rs-primary) = "RSPrimary";

    const
     [string](#language.types.string)
      [TYPE_RS_SECONDARY](#mongodb-driver-serverdescription.constants.type-rs-secondary) = "RSSecondary";

    const
     [string](#language.types.string)
      [TYPE_RS_ARBITER](#mongodb-driver-serverdescription.constants.type-rs-arbiter) = "RSArbiter";

    const
     [string](#language.types.string)
      [TYPE_RS_OTHER](#mongodb-driver-serverdescription.constants.type-rs-other) = "RSOther";

    const
     [string](#language.types.string)
      [TYPE_RS_GHOST](#mongodb-driver-serverdescription.constants.type-rs-ghost) = "RSGhost";

    const
     [string](#language.types.string)
      [TYPE_LOAD_BALANCER](#mongodb-driver-serverdescription.constants.type-load-balancer) = "LoadBalancer";


    /* Métodos */

final public [getHelloResponse](#mongodb-driver-serverdescription.gethelloresponse)(): [array](#language.types.array)
final public [getHost](#mongodb-driver-serverdescription.gethost)(): [string](#language.types.string)
final public [getLastUpdateTime](#mongodb-driver-serverdescription.getlastupdatetime)(): [int](#language.types.integer)
final public [getPort](#mongodb-driver-serverdescription.getport)(): [int](#language.types.integer)
final public [getRoundTripTime](#mongodb-driver-serverdescription.getroundtriptime)(): [?](#language.types.null)[int](#language.types.integer)
final public [getType](#mongodb-driver-serverdescription.gettype)(): [string](#language.types.string)

}

## Constantes predefinidas

     **[MongoDB\Driver\ServerDescription::TYPE_UNKNOWN](#mongodb-driver-serverdescription.constants.type-unknown)**

      El tipo de servidor desconocido, devuelto por [MongoDB\Driver\ServerDescription::getType()](#mongodb-driver-serverdescription.gettype).






     **[MongoDB\Driver\ServerDescription::TYPE_STANDALONE](#mongodb-driver-serverdescription.constants.type-standalone)**

      El tipo de servidor autónomo, devuelto por [MongoDB\Driver\ServerDescription::getType()](#mongodb-driver-serverdescription.gettype).






     **[MongoDB\Driver\ServerDescription::TYPE_MONGOS](#mongodb-driver-serverdescription.constants.type-mongos)**

      El tipo de servidor Mongos, devuelto por [MongoDB\Driver\ServerDescription::getType()](#mongodb-driver-serverdescription.gettype).






     **[MongoDB\Driver\ServerDescription::TYPE_POSSIBLE_PRIMARY](#mongodb-driver-serverdescription.constants.type-possible-primary)**

      El tipo de servidor primario posible de un conjunto de réplicas, devuelto por [MongoDB\Driver\ServerDescription::getType()](#mongodb-driver-serverdescription.gettype).


      Un servidor puede ser identificado como un primario posible si no ha sido verificado aún, pero otro servidor de la réplica piensa que es el primario.






     **[MongoDB\Driver\ServerDescription::TYPE_RS_PRIMARY](#mongodb-driver-serverdescription.constants.type-rs-primary)**

      El tipo de servidor primario de un conjunto de réplicas, devuelto por [MongoDB\Driver\ServerDescription::getType()](#mongodb-driver-serverdescription.gettype).






     **[MongoDB\Driver\ServerDescription::TYPE_RS_SECONDARY](#mongodb-driver-serverdescription.constants.type-rs-secondary)**

      El tipo de servidor secundario de un conjunto de réplicas, devuelto por [MongoDB\Driver\ServerDescription::getType()](#mongodb-driver-serverdescription.gettype).






     **[MongoDB\Driver\ServerDescription::TYPE_RS_ARBITER](#mongodb-driver-serverdescription.constants.type-rs-arbiter)**

      El tipo de servidor árbitro de un conjunto de réplicas, devuelto por [MongoDB\Driver\ServerDescription::getType()](#mongodb-driver-serverdescription.gettype).






     **[MongoDB\Driver\ServerDescription::TYPE_RS_OTHER](#mongodb-driver-serverdescription.constants.type-rs-other)**

      El tipo de servidor de un conjunto de réplicas distinto de primario, secundario o árbitro, devuelto por [MongoDB\Driver\ServerDescription::getType()](#mongodb-driver-serverdescription.gettype).


      Estos servidores pueden estar ocultos, iniciando o recuperándose. No pueden ser consultados, pero sus listas de hosts son útiles para descubrir la configuración actual del conjunto de réplicas.






     **[MongoDB\Driver\ServerDescription::TYPE_RS_GHOST](#mongodb-driver-serverdescription.constants.type-rs-ghost)**

      El tipo de servidor fantasma de un conjunto de réplicas, devuelto por [MongoDB\Driver\ServerDescription::getType()](#mongodb-driver-serverdescription.gettype).


      Los servidores pueden ser identificados como tales en al menos tres situaciones: brevemente durante el inicio del servidor; en un conjunto de réplicas no inicializado; o cuando el servidor es descartado (es decir, retirado de la configuración del conjunto de réplicas). No pueden ser consultados, ni su lista de hosts utilizada para descubrir la configuración actual del conjunto de réplicas; sin embargo, el cliente puede monitorear este servidor con la esperanza de que pase a un estado más útil.






     **[MongoDB\Driver\ServerDescription::TYPE_LOAD_BALANCER](#mongodb-driver-serverdescription.constants.type-load-balancer)**

      El tipo de servidor equilibrador de carga, devuelto por [MongoDB\Driver\ServerDescription::getType()](#mongodb-driver-serverdescription.gettype).




# MongoDB\Driver\ServerDescription::getHelloResponse

(mongodb &gt;=1.13.0)

MongoDB\Driver\ServerDescription::getHelloResponse — Devuelve la respuesta "hello" más reciente del servidor

### Descripción

final public **MongoDB\Driver\ServerDescription::getHelloResponse**(): [array](#language.types.array)

Devuelve un array de información que describe el servidor. Este array se deriva de la respuesta
[» hello](https://www.mongodb.com/docs/manual/reference/command/hello/)
más reciente (en el momento en que la
[MongoDB\Driver\ServerDescription](#class.mongodb-driver-serverdescription) fue construida) obtenida a través de
[» la supervisión del servidor](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md).

**Nota**:

    Cuando el controlador está conectado a un balanceador de carga, este método devolverá
    un array vacío porque los balanceadores de carga no son supervisados. Esto contrasta con
    [MongoDB\Driver\Server::getInfo()](#mongodb-driver-server.getinfo), que devolvería la respuesta del
    [» hello](https://www.mongodb.com/docs/manual/reference/command/hello/)
    de la comando de apretón de manos de conexión inicial del servidor base.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de información que describe este servidor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Server::getInfo()](#mongodb-driver-server.getinfo) - Devuelve un array de información que describe este servidor

- [» hello](https://www.mongodb.com/docs/manual/reference/command/hello/) comando en el manual de MongoDB

- [» Descubrimiento y supervisión de servidores](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md)

# MongoDB\Driver\ServerDescription::getHost

(mongodb &gt;=1.13.0)

MongoDB\Driver\ServerDescription::getHost — Devuelve el nombre de host de este servidor

### Descripción

final public **MongoDB\Driver\ServerDescription::getHost**(): [string](#language.types.string)

Devuelve el nombre de host de este servidor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de host de este servidor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Server::getHost()](#mongodb-driver-server.gethost) - Devuelve el nombre del host del servidor

# MongoDB\Driver\ServerDescription::getLastUpdateTime

(mongodb &gt;=1.13.0)

MongoDB\Driver\ServerDescription::getLastUpdateTime — Devuelve la hora de la última actualización del servidor en microsegundos

### Descripción

final public **MongoDB\Driver\ServerDescription::getLastUpdateTime**(): [int](#language.types.integer)

Devuelve la hora de la última actualización del servidor en microsegundos.

**Nota**:

    El valor devuelto es un timestamp monotónico, que comienza en un punto arbitrario.
    Por lo tanto, es únicamente adecuado para ser comparado con otros valores de retorno de
    **MongoDB\Driver\ServerDescription::getLastUpdateTime()**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la hora de la última actualización del servidor en microsegundos.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\ServerDescription::getPort

(mongodb &gt;=1.13.0)

MongoDB\Driver\ServerDescription::getPort — Devuelve el puerto en el que este servidor escucha

### Descripción

final public **MongoDB\Driver\ServerDescription::getPort**(): [int](#language.types.integer)

Devuelve el puerto en el que este servidor escucha.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el puerto en el que este servidor escucha.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Server::getPort()](#mongodb-driver-server.getport) - Devuelve el puerto en el que el servidor está escuchando

# MongoDB\Driver\ServerDescription::getRoundTripTime

(mongodb &gt;=1.13.0)

MongoDB\Driver\ServerDescription::getRoundTripTime — Devuelve el tiempo de ida y vuelta del servidor en milisegundos

### Descripción

final public **MongoDB\Driver\ServerDescription::getRoundTripTime**(): [?](#language.types.null)[int](#language.types.integer)

Devuelve el tiempo de ida y vuelta del servidor en milisegundos. Se trata de
la medida del cliente de la duración de una
comando
[» hello](https://www.mongodb.com/docs/manual/reference/command/hello/).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tiempo de ida y vuelta del servidor en milisegundos.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Server::getLatency()](#mongodb-driver-server.getlatency) - Devuelve la latencia de este servidor en milisegundos

# MongoDB\Driver\ServerDescription::getType

(mongodb &gt;=1.13.0)

MongoDB\Driver\ServerDescription::getType — Devuelve un string que indica el tipo de este servidor

### Descripción

final public **MongoDB\Driver\ServerDescription::getType**(): [string](#language.types.string)

Devuelve un [string](#language.types.string) que indica el tipo de este servidor. El valor
estará correlacionado con una constante
[MongoDB\Driver\ServerDescription](#class.mongodb-driver-serverdescription).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [string](#language.types.string) que indica el tipo de este servidor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Server::getType()](#mongodb-driver-server.gettype) - Devuelve un integer que representa el tipo del servidor

## Tabla de contenidos

- [MongoDB\Driver\ServerDescription::getHelloResponse](#mongodb-driver-serverdescription.gethelloresponse) — Devuelve la respuesta "hello" más reciente del servidor
- [MongoDB\Driver\ServerDescription::getHost](#mongodb-driver-serverdescription.gethost) — Devuelve el nombre de host de este servidor
- [MongoDB\Driver\ServerDescription::getLastUpdateTime](#mongodb-driver-serverdescription.getlastupdatetime) — Devuelve la hora de la última actualización del servidor en microsegundos
- [MongoDB\Driver\ServerDescription::getPort](#mongodb-driver-serverdescription.getport) — Devuelve el puerto en el que este servidor escucha
- [MongoDB\Driver\ServerDescription::getRoundTripTime](#mongodb-driver-serverdescription.getroundtriptime) — Devuelve el tiempo de ida y vuelta del servidor en milisegundos
- [MongoDB\Driver\ServerDescription::getType](#mongodb-driver-serverdescription.gettype) — Devuelve un string que indica el tipo de este servidor

# La clase MongoDB\Driver\TopologyDescription

(mongodb &gt;=1.13.0)

## Introducción

    La clase **MongoDB\Driver\TopologyDescription** es un
    objeto de valor que representa una topología a la cual el controlador está
    conectado. Las instancias de esta clase son devueltas por los métodos de
    [MongoDB\Driver\Monitoring\TopologyChangedEvent](#class.mongodb-driver-monitoring-topologychangedevent).

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\TopologyDescription**

     {

    /* Constantes */

     const
     [string](#language.types.string)
      [TYPE_UNKNOWN](#mongodb-driver-topologydescription.constants.type-unknown) = "Unknown";

    const
     [string](#language.types.string)
      [TYPE_SINGLE](#mongodb-driver-topologydescription.constants.type-single) = "Single";

    const
     [string](#language.types.string)
      [TYPE_SHARDED](#mongodb-driver-topologydescription.constants.type-sharded) = "Sharded";

    const
     [string](#language.types.string)
      [TYPE_REPLICA_SET_NO_PRIMARY](#mongodb-driver-topologydescription.constants.type-replica-set-no-primary) = "ReplicaSetNoPrimary";

    const
     [string](#language.types.string)
      [TYPE_REPLICA_SET_WITH_PRIMARY](#mongodb-driver-topologydescription.constants.type-replica-set-with-primary) = "ReplicaSetWithPrimary";

    const
     [string](#language.types.string)
      [TYPE_LOAD_BALANCED](#mongodb-driver-topologydescription.constants.type-load-balanced) = "LoadBalanced";


    /* Métodos */

final public [getServers](#mongodb-driver-topologydescription.getservers)(): [array](#language.types.array)
final public [getType](#mongodb-driver-topologydescription.gettype)(): [string](#language.types.string)
final public [hasReadableServer](#mongodb-driver-topologydescription.hasreadableserver)([?](#language.types.null)[MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference) $readPreference = **[null](#constant.null)**): [bool](#language.types.boolean)
final public [hasWritableServer](#mongodb-driver-topologydescription.haswritableserver)(): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[MongoDB\Driver\TopologyDescription::TYPE_UNKNOWN](#mongodb-driver-topologydescription.constants.type-unknown)**

      Topología desconocida, devuelta por [MongoDB\Driver\TopologyDescription::getType()](#mongodb-driver-topologydescription.gettype).






     **[MongoDB\Driver\TopologyDescription::TYPE_SINGLE](#mongodb-driver-topologydescription.constants.type-single)**

      Servidor único (es decir, conexión directa), devuelta por [MongoDB\Driver\TopologyDescription::getType()](#mongodb-driver-topologydescription.gettype).






     **[MongoDB\Driver\TopologyDescription::TYPE_SHARDED](#mongodb-driver-topologydescription.constants.type-sharded)**

      Cluster compartido, devuelta por [MongoDB\Driver\TopologyDescription::getType()](#mongodb-driver-topologydescription.gettype).






     **[MongoDB\Driver\TopologyDescription::TYPE_REPLICA_SET_NO_PRIMARY](#mongodb-driver-topologydescription.constants.type-replica-set-no-primary)**

      Conjunto de réplicas sin servidor primario, devuelta por [MongoDB\Driver\TopologyDescription::getType()](#mongodb-driver-topologydescription.gettype).






     **[MongoDB\Driver\TopologyDescription::TYPE_REPLICA_SET_WITH_PRIMARY](#mongodb-driver-topologydescription.constants.type-replica-set-with-primary)**

      Conjunto de réplicas con un servidor primario, devuelta por [MongoDB\Driver\TopologyDescription::getType()](#mongodb-driver-topologydescription.gettype).






     **[MongoDB\Driver\TopologyDescription::TYPE_LOAD_BALANCED](#mongodb-driver-topologydescription.constants.type-load-balanced)**

      Topología equilibrada, devuelta por [MongoDB\Driver\TopologyDescription::getType()](#mongodb-driver-topologydescription.gettype).




# MongoDB\Driver\TopologyDescription::getServers

(mongodb &gt;=1.13.0)

MongoDB\Driver\TopologyDescription::getServers — Devuelve los servidores de la topología

### Descripción

final public **MongoDB\Driver\TopologyDescription::getServers**(): [array](#language.types.array)

Devuelve un array de objetos [MongoDB\Driver\ServerDescription](#class.mongodb-driver-serverdescription)
correspondiente a los servidores conocidos en la topología.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de objetos [MongoDB\Driver\ServerDescription](#class.mongodb-driver-serverdescription)
correspondiente a los servidores conocidos en la topología.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\TopologyDescription::getType

(mongodb &gt;=1.13.0)

MongoDB\Driver\TopologyDescription::getType — Devuelve un string que denota el tipo de esta topología

### Descripción

final public **MongoDB\Driver\TopologyDescription::getType**(): [string](#language.types.string)

Devuelve un [string](#language.types.string) que denota el tipo de esta topología. El valor
estará correlacionado con una constante de
[MongoDB\Driver\TopologyDescription](#class.mongodb-driver-topologydescription).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [string](#language.types.string) que denota el tipo de esta topología.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\TopologyDescription::hasReadableServer

(mongodb &gt;=1.13.0)

MongoDB\Driver\TopologyDescription::hasReadableServer — Indica si la topología tiene un servidor legible

### Descripción

final public **MongoDB\Driver\TopologyDescription::hasReadableServer**([?](#language.types.null)[MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference) $readPreference = **[null](#constant.null)**): [bool](#language.types.boolean)

Indica si la topología tiene un servidor legible o, si
readPreference está especificado, un servidor que corresponde a
la preferencia de lectura especificada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Indica si la topología tiene un servidor legible o, si
readPreference está especificado, un servidor que corresponde a
la preferencia de lectura especificada.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\TopologyDescription::hasWritableServer

(mongodb &gt;=1.13.0)

MongoDB\Driver\TopologyDescription::hasWritableServer — Indica si la topología dispone de un servidor en escritura

### Descripción

final public **MongoDB\Driver\TopologyDescription::hasWritableServer**(): [bool](#language.types.boolean)

Indica si la topología dispone de un servidor en escritura.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Indica si la topología dispone de un servidor en escritura.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

## Tabla de contenidos

- [MongoDB\Driver\TopologyDescription::getServers](#mongodb-driver-topologydescription.getservers) — Devuelve los servidores de la topología
- [MongoDB\Driver\TopologyDescription::getType](#mongodb-driver-topologydescription.gettype) — Devuelve un string que denota el tipo de esta topología
- [MongoDB\Driver\TopologyDescription::hasReadableServer](#mongodb-driver-topologydescription.hasreadableserver) — Indica si la topología tiene un servidor legible
- [MongoDB\Driver\TopologyDescription::hasWritableServer](#mongodb-driver-topologydescription.haswritableserver) — Indica si la topología dispone de un servidor en escritura

# La clase MongoDB\Driver\WriteConcernError

(mongodb &gt;=1.0.0)

## Introducción

    La clase **MongoDB\Driver\WriteConcernError**
    contiene información relativa a un error de escritura y puede ser devuelta por

[MongoDB\Driver\WriteResult::getWriteConcernError()](#mongodb-driver-writeresult.getwriteconcernerror).

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\WriteConcernError**

     {


    /* Métodos */

final public [getCode](#mongodb-driver-writeconcernerror.getcode)(): [int](#language.types.integer)
final public [getInfo](#mongodb-driver-writeconcernerror.getinfo)(): [?](#language.types.null)[object](#language.types.object)
final public [getMessage](#mongodb-driver-writeconcernerror.getmessage)(): [string](#language.types.string)

}

# MongoDB\Driver\WriteConcernError::getCode

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteConcernError::getCode — Devuelve el código de error de WriteConcernError

### Descripción

final public **MongoDB\Driver\WriteConcernError::getCode**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el código de error de WriteConcernError

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\WriteConcernError::getCode()**

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://rs1.example.com,rs2.example.com/?replicaSet=myReplicaSet");

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);

$writeConcern = new MongoDB\Driver\WriteConcern(2, 1);

try {
$manager-&gt;executeBulkWrite('db.collection', $bulk, ['writeConcern' =&gt; $writeConcern]);
} catch(MongoDB\Driver\Exception\BulkWriteException $e) {
    var_dump($e-&gt;getWriteResult()-&gt;getWriteConcernError()-&gt;getCode());
}

?&gt;

Resultado del ejemplo anterior es similar a:

int(64)

### Ver también

- [» Referencia Write Concern](https://www.mongodb.com/docs/manual/reference/write-concern/)

# MongoDB\Driver\WriteConcernError::getInfo

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteConcernError::getInfo — Devuelve el documento de metadatos para WriteConcernError

### Descripción

final public **MongoDB\Driver\WriteConcernError::getInfo**(): [?](#language.types.null)[object](#language.types.object)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Devuelve el documento de metadatos para WriteConcernError, o **[null](#constant.null)**

si no hay metadatos disponibles.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\WriteConcernError::getInfo()**

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://rs1.example.com,rs2.example.com/?replicaSet=myReplicaSet");

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);

$writeConcern = new MongoDB\Driver\WriteConcern(2, 1);

try {
$manager-&gt;executeBulkWrite('db.collection', $bulk, ['writeConcern' =&gt; $writeConcern]);
} catch(MongoDB\Driver\Exception\BulkWriteException $e) {
    var_dump($e-&gt;getWriteResult()-&gt;getWriteConcernError()-&gt;getInfo());
}

?&gt;

Resultado del ejemplo anterior es similar a:

object(stdClass)#1 (1) {
["wtimeout"]=&gt;
bool(true)
}

### Ver también

- [» Referencia Write Concern](https://www.mongodb.com/docs/manual/reference/write-concern/)

# MongoDB\Driver\WriteConcernError::getMessage

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteConcernError::getMessage — Devuelve el mensaje de error del WriteConcernError

### Descripción

final public **MongoDB\Driver\WriteConcernError::getMessage**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el mensaje de error del WriteConcernError

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\WriteConcernError::getMessage()**

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://rs1.example.com,rs2.example.com/?replicaSet=myReplicaSet");

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);

$writeConcern = new MongoDB\Driver\WriteConcern(2, 1);

try {
$manager-&gt;executeBulkWrite('db.collection', $bulk, ['writeConcern' =&gt; $writeConcern]);
} catch(MongoDB\Driver\Exception\BulkWriteException $e) {
    var_dump($e-&gt;getWriteResult()-&gt;getWriteConcernError()-&gt;getMessage());
}

?&gt;

Resultado del ejemplo anterior es similar a:

string(33) "waiting for replication timed out"

### Ver también

- [» Referencia Write Concern](https://www.mongodb.com/docs/manual/reference/write-concern/)

## Tabla de contenidos

- [MongoDB\Driver\WriteConcernError::getCode](#mongodb-driver-writeconcernerror.getcode) — Devuelve el código de error de WriteConcernError
- [MongoDB\Driver\WriteConcernError::getInfo](#mongodb-driver-writeconcernerror.getinfo) — Devuelve el documento de metadatos para WriteConcernError
- [MongoDB\Driver\WriteConcernError::getMessage](#mongodb-driver-writeconcernerror.getmessage) — Devuelve el mensaje de error del WriteConcernError

# La clase MongoDB\Driver\WriteError

(mongodb &gt;=1.0.0)

## Introducción

    La clase **MongoDB\Driver\WriteError** contiene
    información sobre un error de escritura y puede ser devuelta como
    elemento de un array a partir de    [MongoDB\Driver\WriteResult::getWriteErrors()](#mongodb-driver-writeresult.getwriteerrors).

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\WriteError**

     {


    /* Métodos */

final public [getCode](#mongodb-driver-writeerror.getcode)(): [int](#language.types.integer)
final public [getIndex](#mongodb-driver-writeerror.getindex)(): [int](#language.types.integer)
final public [getInfo](#mongodb-driver-writeerror.getinfo)(): [?](#language.types.null)[object](#language.types.object)
final public [getMessage](#mongodb-driver-writeerror.getmessage)(): [string](#language.types.string)

}

# MongoDB\Driver\WriteError::getCode

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteError::getCode — Devuelve el código de error de WriteError

### Descripción

final public **MongoDB\Driver\WriteError::getCode**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el código de error de WriteError

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\WriteError::getCode()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['_id' =&gt; 1]);
$bulk-&gt;insert(['_id' =&gt; 1]);

try {
$manager-&gt;executeBulkWrite('db.collection', $bulk);
} catch(MongoDB\Driver\Exception\BulkWriteException $e) {
    var_dump($e-&gt;getWriteResult()-&gt;getWriteErrors()[0]-&gt;getCode());
}

?&gt;

Resultado del ejemplo anterior es similar a:

int(11000)

# MongoDB\Driver\WriteError::getIndex

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteError::getIndex — Devuelve el índice de la operación de escritura correspondiente a este WriteError

### Descripción

final public **MongoDB\Driver\WriteError::getIndex**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el índice de la operación de escritura (a partir de
**MongoDBDriverBulkWrite**) correspondiente a este WriteError.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\WriteError::getIndex()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['_id' =&gt; 1]);
$bulk-&gt;insert(['_id' =&gt; 1]);

try {
$manager-&gt;executeBulkWrite('db.collection', $bulk);
} catch(MongoDB\Driver\Exception\BulkWriteException $e) {
    var_dump($e-&gt;getWriteResult()-&gt;getWriteErrors()[0]-&gt;getIndex());
}

?&gt;

Resultado del ejemplo anterior es similar a:

int(1)

### Ver también

- [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite)

# MongoDB\Driver\WriteError::getInfo

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteError::getInfo — Devuelve el documento de metadatos para WriteError

### Descripción

final public **MongoDB\Driver\WriteError::getInfo**(): [?](#language.types.null)[object](#language.types.object)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el documento de metadatos para WriteError, o **[null](#constant.null)** si
no hay metadatos disponibles.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\WriteError::getMessage

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteError::getMessage — Devuelve el mensaje de error del WriteError

### Descripción

final public **MongoDB\Driver\WriteError::getMessage**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el mensaje de error del WriteError.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\WriteError::getMessage()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['_id' =&gt; 1]);
$bulk-&gt;insert(['_id' =&gt; 1]);

try {
$manager-&gt;executeBulkWrite('db.collection', $bulk);
} catch(MongoDB\Driver\Exception\BulkWriteException $e) {
    var_dump($e-&gt;getWriteResult()-&gt;getWriteErrors()[0]-&gt;getMessage());
}

?&gt;

Resultado del ejemplo anterior es similar a:

string(70) "E11000 duplicate key error index: db.collection.$_id_ dup key: { : 1 }"

## Tabla de contenidos

- [MongoDB\Driver\WriteError::getCode](#mongodb-driver-writeerror.getcode) — Devuelve el código de error de WriteError
- [MongoDB\Driver\WriteError::getIndex](#mongodb-driver-writeerror.getindex) — Devuelve el índice de la operación de escritura correspondiente a este WriteError
- [MongoDB\Driver\WriteError::getInfo](#mongodb-driver-writeerror.getinfo) — Devuelve el documento de metadatos para WriteError
- [MongoDB\Driver\WriteError::getMessage](#mongodb-driver-writeerror.getmessage) — Devuelve el mensaje de error del WriteError

# La clase MongoDB\Driver\WriteResult

(mongodb &gt;=1.0.0)

## Introducción

    La clase **MongoDB\Driver\WriteResult** contiene las
    informaciones sobre una ejecución [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite)
    y puede ser retornado por

[MongoDB\Driver\Manager::executeBulkWrite()](#mongodb-driver-manager.executebulkwrite).

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\WriteResult**

     {


    /* Métodos */

final public [getDeletedCount](#mongodb-driver-writeresult.getdeletedcount)(): [int](#language.types.integer)
final public [getInsertedCount](#mongodb-driver-writeresult.getinsertedcount)(): [int](#language.types.integer)
final public [getMatchedCount](#mongodb-driver-writeresult.getmatchedcount)(): [int](#language.types.integer)
final public [getModifiedCount](#mongodb-driver-writeresult.getmodifiedcount)(): [int](#language.types.integer)
final public [getServer](#mongodb-driver-writeresult.getserver)(): [MongoDB\Driver\Server](#class.mongodb-driver-server)
final public [getUpsertedCount](#mongodb-driver-writeresult.getupsertedcount)(): [int](#language.types.integer)
final public [getUpsertedIds](#mongodb-driver-writeresult.getupsertedids)(): [array](#language.types.array)
final public [getWriteConcernError](#mongodb-driver-writeresult.getwriteconcernerror)(): [?](#language.types.null)[MongoDB\Driver\WriteConcernError](#class.mongodb-driver-writeconcernerror)
final public [getWriteErrors](#mongodb-driver-writeresult.getwriteerrors)(): [array](#language.types.array)
final public [isAcknowledged](#mongodb-driver-writeresult.isacknowledged)(): [bool](#language.types.boolean)

}

# MongoDB\Driver\WriteResult::getDeletedCount

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteResult::getDeletedCount — Devuelve el número de documentos eliminados

### Descripción

final public **MongoDB\Driver\WriteResult::getDeletedCount**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de documentos eliminados.

### Errores/Excepciones

    -
        Levanta una excepción [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception)
        si la escritura no ha sido reconocida.

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0


                Este método ahora lanza una excepción cuando es llamado
                para una escritura no reconocida, en lugar de retornar **[null](#constant.null)**.









### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\WriteResult::getDeletedCount()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);
$bulk-&gt;update(['x' =&gt; 1], ['$set' =&gt; ['y' =&gt; 3]]);
$bulk-&gt;update(['x' =&gt; 2], ['$set' =&gt; ['y' =&gt; 1]], ['upsert' =&gt; true]);
$bulk-&gt;update(['x' =&gt; 3], ['$set' =&gt; ['y' =&gt; 2]], ['upsert' =&gt; true]);
$bulk-&gt;delete(['x' =&gt; 1]);

$result = $manager-&gt;executeBulkWrite('db.collection', $bulk);

var_dump($result-&gt;getDeletedCount());

?&gt;

Resultado del ejemplo anterior es similar a:

int(1)

### Ver también

- [MongoDB\Driver\WriteResult::isAcknowledged()](#mongodb-driver-writeresult.isacknowledged) - Indica si la escritura ha sido reconocida

# MongoDB\Driver\WriteResult::getInsertedCount

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteResult::getInsertedCount — Devuelve el número de documentos insertados (excepto Upserts)

### Descripción

final public **MongoDB\Driver\WriteResult::getInsertedCount**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de documentos insertados (excepto Upserts permitidos).

### Errores/Excepciones

    -
        Levanta una excepción [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception)
        si la escritura no ha sido reconocida.

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0


                Este método ahora lanza una excepción cuando es llamado
                para una escritura no reconocida, en lugar de retornar **[null](#constant.null)**.









### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\WriteResult::getInsertedCount()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);
$bulk-&gt;update(['x' =&gt; 1], ['$set' =&gt; ['y' =&gt; 3]]);
$bulk-&gt;update(['x' =&gt; 2], ['$set' =&gt; ['y' =&gt; 1]], ['upsert' =&gt; true]);
$bulk-&gt;update(['x' =&gt; 3], ['$set' =&gt; ['y' =&gt; 2]], ['upsert' =&gt; true]);
$bulk-&gt;delete(['x' =&gt; 1]);

$result = $manager-&gt;executeBulkWrite('db.collection', $bulk);

var_dump($result-&gt;getInsertedCount());

?&gt;

Resultado del ejemplo anterior es similar a:

int(1)

### Ver también

- [MongoDB\Driver\WriteResult::isAcknowledged()](#mongodb-driver-writeresult.isacknowledged) - Indica si la escritura ha sido reconocida

# MongoDB\Driver\WriteResult::getMatchedCount

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteResult::getMatchedCount — Devuelve el número de documentos seleccionados para la actualización

### Descripción

final public **MongoDB\Driver\WriteResult::getMatchedCount**(): [int](#language.types.integer)

Si la operación de actualización no resulta en ninguna modificación del documento
(por ejemplo, al establecer el valor de un campo en su valor actual),
el número correspondiente puede ser mayor que el valor devuelto por
[MongoDB\Driver\WriteResult::getModifiedCount()](#mongodb-driver-writeresult.getmodifiedcount).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de documentos seleccionados para la actualización.

### Errores/Excepciones

    -
        Levanta una excepción [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception)
        si la escritura no ha sido reconocida.

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0


                Este método ahora lanza una excepción cuando es llamado
                para una escritura no reconocida, en lugar de retornar **[null](#constant.null)**.









### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\WriteResult::getMatchedCount()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);
$bulk-&gt;update(['x' =&gt; 1], ['$set' =&gt; ['y' =&gt; 3]]);
$bulk-&gt;update(['x' =&gt; 2], ['$set' =&gt; ['y' =&gt; 1]], ['upsert' =&gt; true]);
$bulk-&gt;update(['x' =&gt; 3], ['$set' =&gt; ['y' =&gt; 2]], ['upsert' =&gt; true]);
$bulk-&gt;delete(['x' =&gt; 1]);

$result = $manager-&gt;executeBulkWrite('db.collection', $bulk);

var_dump($result-&gt;getMatchedCount());

?&gt;

Resultado del ejemplo anterior es similar a:

int(1)

### Ver también

- [MongoDB\Driver\WriteResult::getModifiedCount()](#mongodb-driver-writeresult.getmodifiedcount) - Devuelve el número de documentos existentes actualizados

- [MongoDB\Driver\WriteResult::isAcknowledged()](#mongodb-driver-writeresult.isacknowledged) - Indica si la escritura ha sido reconocida

# MongoDB\Driver\WriteResult::getModifiedCount

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteResult::getModifiedCount — Devuelve el número de documentos existentes actualizados

### Descripción

final public **MongoDB\Driver\WriteResult::getModifiedCount**(): [int](#language.types.integer)

    Si la operación de actualización no resulta en ninguna modificación del documento

(por ejemplo, al establecer el valor de un campo en su valor actual),
el número modificado puede ser inferior al valor devuelto por
[MongoDB\Driver\WriteResult::getMatchedCount()](#mongodb-driver-writeresult.getmatchedcount).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de documentos existentes actualizados.

### Errores/Excepciones

    -
        Levanta una excepción [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception)
        si la escritura no ha sido reconocida.

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0


                Este método ahora lanza una excepción cuando es llamado
                para una escritura no reconocida, en lugar de retornar **[null](#constant.null)**.









### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\WriteResult::getModifiedCount()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);
$bulk-&gt;update(['x' =&gt; 1], ['$set' =&gt; ['y' =&gt; 3]]);
$bulk-&gt;update(['x' =&gt; 2], ['$set' =&gt; ['y' =&gt; 1]], ['upsert' =&gt; true]);
$bulk-&gt;update(['x' =&gt; 3], ['$set' =&gt; ['y' =&gt; 2]], ['upsert' =&gt; true]);
$bulk-&gt;delete(['x' =&gt; 1]);

$result = $manager-&gt;executeBulkWrite('db.collection', $bulk);

var_dump($result-&gt;getModifiedCount());

?&gt;

Resultado del ejemplo anterior es similar a:

int(1)

### Ver también

- [MongoDB\Driver\WriteResult::getMatchedCount()](#mongodb-driver-writeresult.getmatchedcount) - Devuelve el número de documentos seleccionados para la actualización

- [MongoDB\Driver\WriteResult::isAcknowledged()](#mongodb-driver-writeresult.isacknowledged) - Indica si la escritura ha sido reconocida

# MongoDB\Driver\WriteResult::getServer

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteResult::getServer — Devuelve el servidor asociado a este resultado de escritura

### Descripción

final public **MongoDB\Driver\WriteResult::getServer**(): [MongoDB\Driver\Server](#class.mongodb-driver-server)

Devuelve el [MongoDB\Driver\Server](#class.mongodb-driver-server) asociado a este resultado de escritura. Se trata del servidor que ejecutó el [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el [MongoDB\Driver\Server](#class.mongodb-driver-server) asociado a este resultado de escritura.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\WriteResult::getServer()**

&lt;?php

$manager = new MongoDB\Driver\Manager;
$server = $manager-&gt;selectServer();

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);

$result = $server-&gt;executeBulkWrite('db.collection', $bulk);

var_dump($result-&gt;getServer() == $server);

?&gt;

Resultado del ejemplo anterior es similar a:

bool(true)

### Ver también

- [MongoDB\Driver\Server](#class.mongodb-driver-server)

# MongoDB\Driver\WriteResult::getUpsertedCount

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteResult::getUpsertedCount — Devuelve el número de documentos insertados por un upsert

### Descripción

final public **MongoDB\Driver\WriteResult::getUpsertedCount**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de documentos insertados por un upsert.

### Errores/Excepciones

    -
        Levanta una excepción [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception)
        si la escritura no ha sido reconocida.

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0


                Este método ahora lanza una excepción cuando es llamado
                para una escritura no reconocida, en lugar de retornar **[null](#constant.null)**.









### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\WriteResult::getUpsertedCount()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);
$bulk-&gt;update(['x' =&gt; 1], ['$set' =&gt; ['y' =&gt; 3]]);
$bulk-&gt;update(['x' =&gt; 2], ['$set' =&gt; ['y' =&gt; 1]], ['upsert' =&gt; true]);
$bulk-&gt;update(['x' =&gt; 3], ['$set' =&gt; ['y' =&gt; 2]], ['upsert' =&gt; true]);
$bulk-&gt;delete(['x' =&gt; 1]);

$result = $manager-&gt;executeBulkWrite('db.collection', $bulk);

var_dump($result-&gt;getUpsertedCount());

?&gt;

Resultado del ejemplo anterior es similar a:

int(2)

### Ver también

- [MongoDB\Driver\WriteResult::getUpsertedIds()](#mongodb-driver-writeresult.getupsertedids) - Devuelve un array de identificadores para los documentos upserted

- [MongoDB\Driver\WriteResult::isAcknowledged()](#mongodb-driver-writeresult.isacknowledged) - Indica si la escritura ha sido reconocida

# MongoDB\Driver\WriteResult::getUpsertedIds

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteResult::getUpsertedIds — Devuelve un array de identificadores para los documentos upserted

### Descripción

final public **MongoDB\Driver\WriteResult::getUpsertedIds**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de identificadores (por ejemplo, el valor del campo "\_id") para los documentos upserted. Las claves del array corresponden al índice de la operación de escritura (desde **MongoDBDriverBulkWrite**) responsable del upsert.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\WriteResult::getUpsertedIds()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);
$bulk-&gt;update(['x' =&gt; 1], ['$set' =&gt; ['y' =&gt; 3]]);
$bulk-&gt;update(['x' =&gt; 2], ['$set' =&gt; ['y' =&gt; 1]], ['upsert' =&gt; true]);
$bulk-&gt;update(['x' =&gt; 3], ['$set' =&gt; ['y' =&gt; 2]], ['upsert' =&gt; true]);
$bulk-&gt;delete(['x' =&gt; 1]);

$result = $manager-&gt;executeBulkWrite('db.collection', $bulk);

var_dump($result-&gt;getUpsertedIds());

?&gt;

Resultado del ejemplo anterior es similar a:

array(2) {
[2]=&gt;
object(MongoDB\BSON\ObjectId)#4 (1) {
["oid"]=&gt;
string(24) "580e62a224f2302f191b880b"
}
[3]=&gt;
object(MongoDB\BSON\ObjectId)#5 (1) {
["oid"]=&gt;
string(24) "580e62a224f2302f191b880c"
}
}

### Ver también

- [MongoDB\Driver\WriteResult::getUpsertedCount()](#mongodb-driver-writeresult.getupsertedcount) - Devuelve el número de documentos insertados por un upsert

- [MongoDB\Driver\WriteResult::isAcknowledged()](#mongodb-driver-writeresult.isacknowledged) - Indica si la escritura ha sido reconocida

# MongoDB\Driver\WriteResult::getWriteConcernError

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteResult::getWriteConcernError — Devuelve cualquier error de WriteConcern que haya ocurrido

### Descripción

final public **MongoDB\Driver\WriteResult::getWriteConcernError**(): [?](#language.types.null)[MongoDB\Driver\WriteConcernError](#class.mongodb-driver-writeconcernerror)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un **MongoDBDriverWriteConcernError** si se encontró un error de preocupación de escritura durante la operación de escritura, y **[null](#constant.null)** en caso contrario.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\WriteResult::getWriteConcernError()**

&lt;?php

$manager = new MongoDB\Driver\Manager("mongodb://rs1.example.com,rs2.example.com/?replicaSet=myReplicaSet");

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);

$writeConcern = new MongoDB\Driver\WriteConcern(2, 1);

try {
$manager-&gt;executeBulkWrite('db.collection', $bulk, ['writeConcern' =&gt; $writeConcern]);
} catch(MongoDB\Driver\Exception\BulkWriteException $e) {
    var_dump($e-&gt;getWriteResult()-&gt;getWriteConcernError());
}

?&gt;

Resultado del ejemplo anterior es similar a:

object(MongoDB\Driver\WriteConcernError)#6 (3) {
["message"]=&gt;
string(33) "waiting for replication timed out"
["code"]=&gt;
int(64)
["info"]=&gt;
object(stdClass)#7 (1) {
["wtimeout"]=&gt;
bool(true)
}
}

### Ver también

- [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

- [» Referencia Write Concern](https://www.mongodb.com/docs/manual/reference/write-concern/)

# MongoDB\Driver\WriteResult::getWriteErrors

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteResult::getWriteErrors — Devuelve todos los errores de escritura que se han producido

### Descripción

final public **MongoDB\Driver\WriteResult::getWriteErrors**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de objetos **MongoDBDriverWriteError**
para todos los errores de escritura encontrados durante la operación
de escritura. El array estará vacío si no se ha producido ningún error de escritura.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 MongoDB\Driver\WriteResult::getWriteErrors()** con un solo error

&lt;?php

$manager = new MongoDB\Driver\Manager;

/\* Por omisión, las operaciones de escritura en bloque se ejecutan en serie en

- el orden y la ejecución se detendrá después del primer error.
  \*/
  $bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['_id' =&gt; 1]);
  $bulk-&gt;insert(['_id' =&gt; 2]);
$bulk-&gt;insert(['_id' =&gt; 2]);
  $bulk-&gt;insert(['_id' =&gt; 3]);
$bulk-&gt;insert(['_id' =&gt; 4]);
  $bulk-&gt;insert(['_id' =&gt; 4]);

try {
$result = $manager-&gt;executeBulkWrite('db.collection', $bulk);
} catch (MongoDB\Driver\Exception\BulkWriteException $e) {
    var_dump($e-&gt;getWriteResult()-&gt;getWriteErrors());
}

?&gt;

Resultado del ejemplo anterior es similar a:

array(1) {
[0]=&gt;
object(MongoDB\Driver\WriteError)#5 (4) {
["message"]=&gt;
string(81) "E11000 duplicate key error collection: db.collection index: _id_ dup key: { : 2 }"
["code"]=&gt;
int(11000)
["index"]=&gt;
int(2)
["info"]=&gt;
NULL
}
}

**Ejemplo #2 MongoDB\Driver\WriteResult::getWriteErrors()** con múltiples errores

&lt;?php

$manager = new MongoDB\Driver\Manager;

/\* La opción "ordered" puede ser utilizada para permitir que las operaciones

- de escritura en bloque continúen ejecutándose después del primer error.
  \*/
  $bulk = new MongoDB\Driver\BulkWrite(['ordered' =&gt; false]);
$bulk-&gt;insert(['_id' =&gt; 1]);
  $bulk-&gt;insert(['_id' =&gt; 2]);
$bulk-&gt;insert(['_id' =&gt; 2]);
  $bulk-&gt;insert(['_id' =&gt; 3]);
$bulk-&gt;insert(['_id' =&gt; 4]);
  $bulk-&gt;insert(['_id' =&gt; 4]);

try {
$result = $manager-&gt;executeBulkWrite('db.collection', $bulk);
} catch (MongoDB\Driver\Exception\BulkWriteException $e) {
    var_dump($e-&gt;getWriteResult()-&gt;getWriteErrors());
}

?&gt;

Resultado del ejemplo anterior es similar a:

array(2) {
[0]=&gt;
object(MongoDB\Driver\WriteError)#5 (4) {
["message"]=&gt;
string(81) "E11000 duplicate key error collection: db.collection index: _id_ dup key: { : 2 }"
["code"]=&gt;
int(11000)
["index"]=&gt;
int(2)
["info"]=&gt;
NULL
}
[1]=&gt;
object(MongoDB\Driver\WriteError)#6 (4) {
["message"]=&gt;
string(81) "E11000 duplicate key error collection: db.collection index: _id_ dup key: { : 4 }"
["code"]=&gt;
int(11000)
["index"]=&gt;
int(5)
["info"]=&gt;
NULL
}
}

### Ver también

- [MongoDB\Driver\WriteError](#class.mongodb-driver-writeerror)

# MongoDB\Driver\WriteResult::isAcknowledged

(mongodb &gt;=1.0.0)

MongoDB\Driver\WriteResult::isAcknowledged — Indica si la escritura ha sido reconocida

### Descripción

final public **MongoDB\Driver\WriteResult::isAcknowledged**(): [bool](#language.types.boolean)

Si la escritura ha sido reconocida, otros campos de conteo estarán disponibles
para el objeto [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la escritura ha sido reconocida, y **[false](#constant.false)** en caso contrario.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 MongoDB\Driver\WriteResult::isAcknowledged()** con la preocupación de escritura reconocida

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);

$result = $manager-&gt;executeBulkWrite('db.collection', $bulk);

var_dump($result-&gt;isAcknowledged());

?&gt;

El ejemplo anterior mostrará:

bool(true)

**Ejemplo #2 MongoDB\Driver\WriteResult::isAcknowledged()** con la preocupación de escritura no reconocida

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['x' =&gt; 1]);

$writeConcern = new MongoDB\Driver\WriteConcern(0);

$result = $manager-&gt;executeBulkWrite('db.collection', $bulk, ['writeConcern' =&gt; $writeConcern]);

var_dump($result-&gt;isAcknowledged());

?&gt;

El ejemplo anterior mostrará:

bool(false)

### Ver también

- [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

- [» Referencia sobre la Preocupación de Escritura](https://www.mongodb.com/docs/manual/reference/write-concern/)

## Tabla de contenidos

- [MongoDB\Driver\WriteResult::getDeletedCount](#mongodb-driver-writeresult.getdeletedcount) — Devuelve el número de documentos eliminados
- [MongoDB\Driver\WriteResult::getInsertedCount](#mongodb-driver-writeresult.getinsertedcount) — Devuelve el número de documentos insertados (excepto Upserts)
- [MongoDB\Driver\WriteResult::getMatchedCount](#mongodb-driver-writeresult.getmatchedcount) — Devuelve el número de documentos seleccionados para la actualización
- [MongoDB\Driver\WriteResult::getModifiedCount](#mongodb-driver-writeresult.getmodifiedcount) — Devuelve el número de documentos existentes actualizados
- [MongoDB\Driver\WriteResult::getServer](#mongodb-driver-writeresult.getserver) — Devuelve el servidor asociado a este resultado de escritura
- [MongoDB\Driver\WriteResult::getUpsertedCount](#mongodb-driver-writeresult.getupsertedcount) — Devuelve el número de documentos insertados por un upsert
- [MongoDB\Driver\WriteResult::getUpsertedIds](#mongodb-driver-writeresult.getupsertedids) — Devuelve un array de identificadores para los documentos upserted
- [MongoDB\Driver\WriteResult::getWriteConcernError](#mongodb-driver-writeresult.getwriteconcernerror) — Devuelve cualquier error de WriteConcern que haya ocurrido
- [MongoDB\Driver\WriteResult::getWriteErrors](#mongodb-driver-writeresult.getwriteerrors) — Devuelve todos los errores de escritura que se han producido
- [MongoDB\Driver\WriteResult::isAcknowledged](#mongodb-driver-writeresult.isacknowledged) — Indica si la escritura ha sido reconocida

# La clase MongoDB\Driver\BulkWriteCommandResult

(mongodb &gt;=2.1.0)

## Introducción

    La clase **MongoDB\Driver\BulkWriteCommandResult** encapsula
    la información sobre una
    [MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand) ejecutada y devuelta por
    [MongoDB\Driver\Manager::executeBulkWriteCommand()](#mongodb-driver-manager.executebulkwritecommand).

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\BulkWriteCommandResult**

     {


    /* Métodos */

final public [getDeletedCount](#mongodb-driver-bulkwritecommandresult.getdeletedcount)(): [int](#language.types.integer)
final public [getDeleteResults](#mongodb-driver-bulkwritecommandresult.getdeleteresults)(): [?](#language.types.null)[MongoDB\BSON\Document](#class.mongodb-bson-document)
final public [getInsertedCount](#mongodb-driver-bulkwritecommandresult.getinsertedcount)(): [int](#language.types.integer)
final public [getInsertResults](#mongodb-driver-bulkwritecommandresult.getinsertresults)(): [?](#language.types.null)[MongoDB\BSON\Document](#class.mongodb-bson-document)
final public [getMatchedCount](#mongodb-driver-bulkwritecommandresult.getmatchedcount)(): [int](#language.types.integer)
final public [getModifiedCount](#mongodb-driver-bulkwritecommandresult.getmodifiedcount)(): [int](#language.types.integer)
final public [getUpdateResults](#mongodb-driver-bulkwritecommandresult.getupdateresults)(): [?](#language.types.null)[MongoDB\BSON\Document](#class.mongodb-bson-document)
final public [getUpsertedCount](#mongodb-driver-bulkwritecommandresult.getupsertedcount)(): [int](#language.types.integer)
final public [isAcknowledged](#mongodb-driver-bulkwritecommandresult.isacknowledged)(): [bool](#language.types.boolean)

}

# MongoDB\Driver\BulkWriteCommandResult::getDeletedCount

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommandResult::getDeletedCount — Devuelve el número de documentos eliminados

### Descripción

final public **MongoDB\Driver\BulkWriteCommandResult::getDeletedCount**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número total de documentos eliminados por todas las operaciones.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Levanta una excepción [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception)
  si la escritura no ha sido reconocida.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWriteCommandResult::getDeletedCount()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;insertOne('db.coll', ['x' =&gt; 1]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 1], ['$set' =&gt; ['y' =&gt; 3]]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 2], ['$set' =&gt; ['y' =&gt; 1]], ['upsert' =&gt; true]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 3], ['$set' =&gt; ['y' =&gt; 2]], ['upsert' =&gt; true]);
$bulk-&gt;deleteMany('db.coll', []);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

var_dump($result-&gt;getDeletedCount());

?&gt;

El ejemplo anterior mostrará:

int(3)

### Ver también

- [MongoDB\Driver\BulkWriteCommandResult::getDeleteResults()](#mongodb-driver-bulkwritecommandresult.getdeleteresults) - Devuelve los resultados detallados de las eliminaciones exitosas

- [MongoDB\Driver\BulkWriteCommandResult::isAcknowledged()](#mongodb-driver-bulkwritecommandresult.isacknowledged) - Indica si la escritura fue reconocida

# MongoDB\Driver\BulkWriteCommandResult::getDeleteResults

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommandResult::getDeleteResults — Devuelve los resultados detallados de las eliminaciones exitosas

### Descripción

final public **MongoDB\Driver\BulkWriteCommandResult::getDeleteResults**(): [?](#language.types.null)[MongoDB\BSON\Document](#class.mongodb-bson-document)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un documento que contiene los resultados de cada operación de
eliminación exitosa, o **[null](#constant.null)** si los resultados detallados no fueron solicitados. Las
claves del documento corresponderán al índice de la operación de escritura
de [MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Levanta una excepción [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception)
  si la escritura no ha sido reconocida.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWriteCommandResult::getDeleteResults()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand(['verboseResults' =&gt; true]);
$bulk-&gt;insertOne('db.coll', ['x' =&gt; 1]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 1], ['$set' =&gt; ['y' =&gt; 3]]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 2], ['$set' =&gt; ['y' =&gt; 1]], ['upsert' =&gt; true]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 3], ['$set' =&gt; ['y' =&gt; 2]], ['upsert' =&gt; true]);
$bulk-&gt;deleteMany('db.coll', []);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

var_dump($result-&gt;getDeleteResults()-&gt;toPHP());

?&gt;

Resultado del ejemplo anterior es similar a:

object(stdClass)#7 (1) {
["4"]=&gt;
object(stdClass)#6 (1) {
["deletedCount"]=&gt;
object(MongoDB\BSON\Int64)#5 (1) {
["integer"]=&gt;
string(1) "3"
}
}
}

### Ver también

- [MongoDB\Driver\BulkWriteCommandResult::getDeletedCount()](#mongodb-driver-bulkwritecommandresult.getdeletedcount) - Devuelve el número de documentos eliminados

- [MongoDB\Driver\BulkWriteCommandResult::isAcknowledged()](#mongodb-driver-bulkwritecommandresult.isacknowledged) - Indica si la escritura fue reconocida

# MongoDB\Driver\BulkWriteCommandResult::getInsertedCount

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommandResult::getInsertedCount — Devuelve el número de documentos insertados

### Descripción

final public **MongoDB\Driver\BulkWriteCommandResult::getInsertedCount**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número total de documentos insertados (excluyendo los upserts) por todas
las operaciones.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Levanta una excepción [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception)
  si la escritura no ha sido reconocida.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWriteCommandResult::getInsertedCount()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;insertOne('db.coll', ['x' =&gt; 1]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 1], ['$set' =&gt; ['y' =&gt; 3]]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 2], ['$set' =&gt; ['y' =&gt; 1]], ['upsert' =&gt; true]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 3], ['$set' =&gt; ['y' =&gt; 2]], ['upsert' =&gt; true]);
$bulk-&gt;deleteMany('db.coll', []);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

var_dump($result-&gt;getInsertedCount());

?&gt;

El ejemplo anterior mostrará:

int(1)

### Ver también

- [MongoDB\Driver\BulkWriteCommandResult::getInsertResults()](#mongodb-driver-bulkwritecommandresult.getinsertresults) - Devuelve los resultados detallados de las inserciones exitosas

- [MongoDB\Driver\BulkWriteCommandResult::isAcknowledged()](#mongodb-driver-bulkwritecommandresult.isacknowledged) - Indica si la escritura fue reconocida

# MongoDB\Driver\BulkWriteCommandResult::getInsertResults

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommandResult::getInsertResults — Devuelve los resultados detallados de las inserciones exitosas

### Descripción

final public **MongoDB\Driver\BulkWriteCommandResult::getInsertResults**(): [?](#language.types.null)[MongoDB\BSON\Document](#class.mongodb-bson-document)

Dado que los campos \_id de los documentos insertados son generados por
la extensión, el valor de insertedId en cada resultado
corresponderá al valor de retorno de
[MongoDB\Driver\BulkWriteCommand::insertOne()](#mongodb-driver-bulkwritecommand.insertone) para
la operación de inserción correspondiente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un documento que contiene los resultados de cada operación de inserción
o **[null](#constant.null)** si los resultados detallados no fueron solicitados. Las claves
del documento corresponderán al índice de la operación de escritura de
[MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Levanta una excepción [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception)
  si la escritura no ha sido reconocida.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWriteCommandResult::getInsertResults()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand(['verboseResults' =&gt; true]);

$generatedId = $bulk-&gt;insertOne('db.coll', ['x' =&gt; 1]);

$bulk-&gt;updateOne('db.coll', ['x' =&gt; 1], ['$set' =&gt; ['y' =&gt; 3]]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 2], ['$set' =&gt; ['y' =&gt; 1]], ['upsert' =&gt; true]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 3], ['$set' =&gt; ['y' =&gt; 2]], ['upsert' =&gt; true]);
$bulk-&gt;deleteMany('db.coll', []);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

var_dump($generatedId);

var_dump($result-&gt;getInsertResults()-&gt;toPHP());

?&gt;

Resultado del ejemplo anterior es similar a:

object(MongoDB\BSON\ObjectId)#3 (1) {
["oid"]=&gt;
string(24) "67f7ee69783dcce702097b41"
}
object(stdClass)#8 (1) {
["0"]=&gt;
object(stdClass)#7 (1) {
["insertedId"]=&gt;
object(MongoDB\BSON\ObjectId)#6 (1) {
["oid"]=&gt;
string(24) "67f7ee69783dcce702097b41"
}
}
}

### Ver también

- [MongoDB\Driver\BulkWriteCommandResult::getInsertedCount()](#mongodb-driver-bulkwritecommandresult.getinsertedcount) - Devuelve el número de documentos insertados

- [MongoDB\Driver\BulkWriteCommandResult::isAcknowledged()](#mongodb-driver-bulkwritecommandresult.isacknowledged) - Indica si la escritura fue reconocida

- [MongoDB\Driver\BulkWriteCommand::insertOne()](#mongodb-driver-bulkwritecommand.insertone) - Añade una operación insertOne

# MongoDB\Driver\BulkWriteCommandResult::getMatchedCount

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommandResult::getMatchedCount — Devuelve el número de documentos seleccionados para la actualización

### Descripción

final public **MongoDB\Driver\BulkWriteCommandResult::getMatchedCount**(): [int](#language.types.integer)

Si la operación de actualización no realiza ningún cambio en el documento (por ejemplo, al
definir el valor de un campo a su valor actual), el número de documentos puede ser mayor
que el valor devuelto por
[MongoDB\Driver\BulkWriteCommandResult::getModifiedCount()](#mongodb-driver-bulkwritecommandresult.getmodifiedcount).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número total de documentos seleccionados para la actualización por todas las operaciones.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Levanta una excepción [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception)
  si la escritura no ha sido reconocida.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWriteCommandResult::getMatchedCount()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;insertOne('db.coll', ['x' =&gt; 1]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 1], ['$set' =&gt; ['y' =&gt; 3]]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 2], ['$set' =&gt; ['y' =&gt; 1]], ['upsert' =&gt; true]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 3], ['$set' =&gt; ['y' =&gt; 2]], ['upsert' =&gt; true]);
$bulk-&gt;deleteMany('db.coll', []);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

var_dump($result-&gt;getMatchedCount());

?&gt;

El ejemplo anterior mostrará:

int(1)

### Ver también

- [MongoDB\Driver\BulkWriteCommandResult::getModifiedCount()](#mongodb-driver-bulkwritecommandresult.getmodifiedcount) - Devuelve el número de documentos existentes actualizados

- [MongoDB\Driver\BulkWriteCommandResult::getUpdateResults()](#mongodb-driver-bulkwritecommandresult.getupdateresults) - Devuelve los resultados detallados de las actualizaciones exitosas

- [MongoDB\Driver\BulkWriteCommandResult::isAcknowledged()](#mongodb-driver-bulkwritecommandresult.isacknowledged) - Indica si la escritura fue reconocida

# MongoDB\Driver\BulkWriteCommandResult::getModifiedCount

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommandResult::getModifiedCount — Devuelve el número de documentos existentes actualizados

### Descripción

final public **MongoDB\Driver\BulkWriteCommandResult::getModifiedCount**(): [int](#language.types.integer)

Si la operación de actualización no realiza ningún cambio en el documento (por ejemplo, al
establecer el valor de un campo a su valor actual), el número de documentos puede ser menor
que el valor devuelto por
[MongoDB\Driver\BulkWriteCommandResult::getMatchedCount()](#mongodb-driver-bulkwritecommandresult.getmatchedcount).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número total de documentos existentes actualizados por todas las operaciones.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Levanta una excepción [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception)
  si la escritura no ha sido reconocida.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWriteCommandResult::getModifiedCount()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 1], ['$set' =&gt; ['y' =&gt; 3]]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 2], ['$set' =&gt; ['y' =&gt; 1]], ['upsert' =&gt; true]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 3], ['$set' =&gt; ['y' =&gt; 2]], ['upsert' =&gt; true]);
$bulk-&gt;deleteMany('db.coll', []);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

var_dump($result-&gt;getModifiedCount());

?&gt;

El ejemplo anterior mostrará:

int(1)

### Ver también

- [MongoDB\Driver\BulkWriteCommandResult::getMatchedCount()](#mongodb-driver-bulkwritecommandresult.getmatchedcount) - Devuelve el número de documentos seleccionados para la actualización

- [MongoDB\Driver\BulkWriteCommandResult::getUpdateResults()](#mongodb-driver-bulkwritecommandresult.getupdateresults) - Devuelve los resultados detallados de las actualizaciones exitosas

- [MongoDB\Driver\BulkWriteCommandResult::isAcknowledged()](#mongodb-driver-bulkwritecommandresult.isacknowledged) - Indica si la escritura fue reconocida

# MongoDB\Driver\BulkWriteCommandResult::getUpdateResults

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommandResult::getUpdateResults — Devuelve los resultados detallados de las actualizaciones exitosas

### Descripción

final public **MongoDB\Driver\BulkWriteCommandResult::getUpdateResults**(): [?](#language.types.null)[MongoDB\BSON\Document](#class.mongodb-bson-document)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un documento que contiene los resultados de cada operación de actualización
exitosa, o **[null](#constant.null)** si los resultados detallados no fueron solicitados. Las claves
del documento corresponderán al índice de la operación de escritura de
[MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Levanta una excepción [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception)
  si la escritura no ha sido reconocida.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWriteCommandResult::getUpdateResults()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand(['verboseResults' =&gt; true]);
$bulk-&gt;insertOne('db.coll', ['x' =&gt; 1]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 1], ['$set' =&gt; ['y' =&gt; 3]]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 2], ['$set' =&gt; ['y' =&gt; 1]], ['upsert' =&gt; true]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 3], ['$set' =&gt; ['y' =&gt; 2]], ['upsert' =&gt; true]);
$bulk-&gt;deleteMany('db.coll', []);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

var_dump($result-&gt;getUpdateResults()-&gt;toPHP());

?&gt;

Resultado del ejemplo anterior es similar a:

object(stdClass)#16 (3) {
["1"]=&gt;
object(stdClass)#7 (2) {
["matchedCount"]=&gt;
object(MongoDB\BSON\Int64)#5 (1) {
["integer"]=&gt;
string(1) "1"
}
["modifiedCount"]=&gt;
object(MongoDB\BSON\Int64)#6 (1) {
["integer"]=&gt;
string(1) "1"
}
}
["2"]=&gt;
object(stdClass)#11 (3) {
["matchedCount"]=&gt;
object(MongoDB\BSON\Int64)#8 (1) {
["integer"]=&gt;
string(1) "1"
}
["modifiedCount"]=&gt;
object(MongoDB\BSON\Int64)#9 (1) {
["integer"]=&gt;
string(1) "0"
}
["upsertedId"]=&gt;
object(MongoDB\BSON\ObjectId)#10 (1) {
["oid"]=&gt;
string(24) "67f7eb9b1f198bbcb880d575"
}
}
["3"]=&gt;
object(stdClass)#15 (3) {
["matchedCount"]=&gt;
object(MongoDB\BSON\Int64)#12 (1) {
["integer"]=&gt;
string(1) "1"
}
["modifiedCount"]=&gt;
object(MongoDB\BSON\Int64)#13 (1) {
["integer"]=&gt;
string(1) "0"
}
["upsertedId"]=&gt;
object(MongoDB\BSON\ObjectId)#14 (1) {
["oid"]=&gt;
string(24) "67f7eb9b1f198bbcb880d576"
}
}
}

### Ver también

- [MongoDB\Driver\BulkWriteCommandResult::getMatchedCount()](#mongodb-driver-bulkwritecommandresult.getmatchedcount) - Devuelve el número de documentos seleccionados para la actualización

- [MongoDB\Driver\BulkWriteCommandResult::getModifiedCount()](#mongodb-driver-bulkwritecommandresult.getmodifiedcount) - Devuelve el número de documentos existentes actualizados

- [MongoDB\Driver\BulkWriteCommandResult::getUpsertedCount()](#mongodb-driver-bulkwritecommandresult.getupsertedcount) - Devuelve el número de documentos insertados/actualizados

- [MongoDB\Driver\BulkWriteCommandResult::isAcknowledged()](#mongodb-driver-bulkwritecommandresult.isacknowledged) - Indica si la escritura fue reconocida

# MongoDB\Driver\BulkWriteCommandResult::getUpsertedCount

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommandResult::getUpsertedCount — Devuelve el número de documentos insertados/actualizados

### Descripción

final public **MongoDB\Driver\BulkWriteCommandResult::getUpsertedCount**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número total de documentos insertados/actualizados por todas las operaciones.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Levanta una excepción [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception)
  si la escritura no ha sido reconocida.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\BulkWriteCommandResult::getUpsertedCount()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;insertOne('db.coll', ['x' =&gt; 1]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 1], ['$set' =&gt; ['y' =&gt; 3]]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 2], ['$set' =&gt; ['y' =&gt; 1]], ['upsert' =&gt; true]);
$bulk-&gt;updateOne('db.coll', ['x' =&gt; 3], ['$set' =&gt; ['y' =&gt; 2]], ['upsert' =&gt; true]);
$bulk-&gt;deleteMany('db.coll', []);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

var_dump($result-&gt;getUpsertedCount());

?&gt;

El ejemplo anterior mostrará:

int(2)

### Ver también

- [MongoDB\Driver\BulkWriteCommandResult::getUpdateResults()](#mongodb-driver-bulkwritecommandresult.getupdateresults) - Devuelve los resultados detallados de las actualizaciones exitosas

- [MongoDB\Driver\BulkWriteCommandResult::isAcknowledged()](#mongodb-driver-bulkwritecommandresult.isacknowledged) - Indica si la escritura fue reconocida

# MongoDB\Driver\BulkWriteCommandResult::isAcknowledged

(mongodb &gt;=2.1.0)

MongoDB\Driver\BulkWriteCommandResult::isAcknowledged — Indica si la escritura fue reconocida

### Descripción

final public **MongoDB\Driver\BulkWriteCommandResult::isAcknowledged**(): [bool](#language.types.boolean)

Si la escritura fue reconocida, los demás campos estarán disponibles en el objeto [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la escritura fue reconocida, y **[false](#constant.false)** en caso contrario.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 MongoDB\Driver\BulkWriteCommandResult::isAcknowledged()** con escritura reconocida

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;insertOne('db.coll', ['x' =&gt; 1]);

$result = $manager-&gt;executeBulkWriteCommand($bulk);

var_dump($result-&gt;isAcknowledged());

?&gt;

El ejemplo anterior mostrará:

bool(true)

**Ejemplo #2 MongoDB\Driver\BulkWriteCommandResult::isAcknowledged()** con escritura no reconocida

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand(['ordered' =&gt; false]);
$bulk-&gt;insertOne('db.coll', ['x' =&gt; 1]);

$writeConcern = new MongoDB\Driver\WriteConcern(0);

$result = $manager-&gt;executeBulkWriteCommand($bulk, ['writeConcern' =&gt; $writeConcern]);

var_dump($result-&gt;isAcknowledged());

?&gt;

El ejemplo anterior mostrará:

bool(false)

### Ver también

- [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

- [» Referencia de Write Concern](https://www.mongodb.com/docs/manual/reference/write-concern/)

## Tabla de contenidos

- [MongoDB\Driver\BulkWriteCommandResult::getDeletedCount](#mongodb-driver-bulkwritecommandresult.getdeletedcount) — Devuelve el número de documentos eliminados
- [MongoDB\Driver\BulkWriteCommandResult::getDeleteResults](#mongodb-driver-bulkwritecommandresult.getdeleteresults) — Devuelve los resultados detallados de las eliminaciones exitosas
- [MongoDB\Driver\BulkWriteCommandResult::getInsertedCount](#mongodb-driver-bulkwritecommandresult.getinsertedcount) — Devuelve el número de documentos insertados
- [MongoDB\Driver\BulkWriteCommandResult::getInsertResults](#mongodb-driver-bulkwritecommandresult.getinsertresults) — Devuelve los resultados detallados de las inserciones exitosas
- [MongoDB\Driver\BulkWriteCommandResult::getMatchedCount](#mongodb-driver-bulkwritecommandresult.getmatchedcount) — Devuelve el número de documentos seleccionados para la actualización
- [MongoDB\Driver\BulkWriteCommandResult::getModifiedCount](#mongodb-driver-bulkwritecommandresult.getmodifiedcount) — Devuelve el número de documentos existentes actualizados
- [MongoDB\Driver\BulkWriteCommandResult::getUpdateResults](#mongodb-driver-bulkwritecommandresult.getupdateresults) — Devuelve los resultados detallados de las actualizaciones exitosas
- [MongoDB\Driver\BulkWriteCommandResult::getUpsertedCount](#mongodb-driver-bulkwritecommandresult.getupsertedcount) — Devuelve el número de documentos insertados/actualizados
- [MongoDB\Driver\BulkWriteCommandResult::isAcknowledged](#mongodb-driver-bulkwritecommandresult.isacknowledged) — Indica si la escritura fue reconocida

    # Clases y funciones BSON de MongoDB

## Tabla de contenidos

- [Funciones](#ref.bson.functions)
- [MongoDB\BSON\Document](#class.mongodb-bson-document)
- [MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray)
- [MongoDB\BSON\Iterator](#class.mongodb-bson-iterator)
- [MongoDB\BSON\Binary](#class.mongodb-bson-binary)
- [MongoDB\BSON\Decimal128](#class.mongodb-bson-decimal128)
- [MongoDB\BSON\Javascript](#class.mongodb-bson-javascript)
- [MongoDB\BSON\MaxKey](#class.mongodb-bson-maxkey)
- [MongoDB\BSON\MinKey](#class.mongodb-bson-minkey)
- [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)
- [MongoDB\BSON\Regex](#class.mongodb-bson-regex)
- [MongoDB\BSON\Timestamp](#class.mongodb-bson-timestamp)
- [MongoDB\BSON\UTCDatetime](#class.mongodb-bson-utcdatetime)
- [MongoDB\BSON\Type](#class.mongodb-bson-type)
- [MongoDB\BSON\Persistable](#class.mongodb-bson-persistable)
- [MongoDB\BSON\Serializable](#class.mongodb-bson-serializable)
- [MongoDB\BSON\Unserializable](#class.mongodb-bson-unserializable)
- [MongoDB\BSON\BinaryInterface](#class.mongodb-bson-binaryinterface)
- [MongoDB\BSON\Decimal128Interface](#class.mongodb-bson-decimal128interface)
- [MongoDB\BSON\JavascriptInterface](#class.mongodb-bson-javascriptinterface)
- [MongoDB\BSON\MaxKeyInterface](#class.mongodb-bson-maxkeyinterface)
- [MongoDB\BSON\MinKeyInterface](#class.mongodb-bson-minkeyinterface)
- [MongoDB\BSON\ObjectIdInterface](#class.mongodb-bson-objectidinterface)
- [MongoDB\BSON\RegexInterface](#class.mongodb-bson-regexinterface)
- [MongoDB\BSON\TimestampInterface](#class.mongodb-bson-timestampinterface)
- [MongoDB\BSON\UTCDateTimeInterface](#class.mongodb-bson-utcdatetimeinterface)
- [MongoDB\BSON\DBPointer](#class.mongodb-bson-dbpointer)
- [MongoDB\BSON\Int64](#class.mongodb-bson-int64)
- [MongoDB\BSON\Symbol](#class.mongodb-bson-symbol)
- [MongoDB\BSON\Undefined](#class.mongodb-bson-undefined)

    # Funciones

    # MongoDB\BSON\fromJSON

    (mongodb &gt;=1.0.0)

MongoDB\BSON\fromJSON — Devuelve la representación BSON de un valor JSON

**Advertencia**

    Esta función ha sido *DEPRECADA* desde la versión 1.20.0 de la extensión
    y ha sido eliminada en la versión 2.0. Las aplicaciones deberían utilizar
    [MongoDB\BSON\Document::fromJSON()](#mongodb-bson-document.fromjson) en su lugar.

### Descripción

**MongoDB\BSON\fromJSON**([string](#language.types.string) $json): [string](#language.types.string)

Convierte una cadena
[» JSON extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)
en su representación BSON.

### Parámetros

    json ([string](#language.types.string))


      Valor JSON a convertir.


### Valores devueltos

El documento serializado BSON como una cadena binaria.

### Errores/Excepciones

- Lanza una excepción
  [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception) si
  el valor JSON no puede ser convertido en BSON (por ejemplo, debido a
  un error de sintaxis).

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0

            Esta función ha sido eliminada.






### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\fromJSON()**

&lt;?php

$json = '{ "_id": { "$oid": "563143b280d2387c91807965" } }';
$bson = MongoDB\BSON\fromJSON($json);
$value = MongoDB\BSON\toPHP($bson);
var_dump($value);

?&gt;

El ejemplo anterior mostrará:

object(stdClass)#2 (1) {
["_id"]=&gt;
object(MongoDB\BSON\ObjectId)#1 (1) {
["oid"]=&gt;
string(24) "563143b280d2387c91807965"
}
}

### Ver también

- [MongoDB\BSON\Document::fromJSON()](#mongodb-bson-document.fromjson) - Construye una nueva instancia de documento desde un string JSON

- [MongoDB\BSON\toJSON()](#function.mongodb.bson-tojson) - Devuelve la representación JSON extendida heredada de un valor BSON

- [» MongoDB JSON extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

- [» MongoDB BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\fromPHP

(mongodb &gt;=1.0.0)

MongoDB\BSON\fromPHP — Devuelve la representación BSON de un valor PHP

**Advertencia**

    Esta función ha sido *DEPRECADA* desde la versión 1.20.0 de la extensión
    y ha sido eliminada en la versión 2.0. Las aplicaciones deberían utilizar
    [MongoDB\BSON\Document::fromPHP()](#mongodb-bson-document.fromphp) en su lugar.

### Descripción

**MongoDB\BSON\fromPHP**([array](#language.types.array)|[object](#language.types.object) $value): [string](#language.types.string)

Serializa un array o objeto PHP (por ejemplo, documento) en su
representación [» BSON](https://www.mongodb.com/docs/manual/reference/bson-types/).
La cadena binaria devuelta describirá un documento BSON.

### Parámetros

    value ([array](#language.types.array)|[object](#language.types.object))


      El valor PHP a serializar.


### Valores devueltos

El documento BSON serializado como cadena binaria.

### Errores/Excepciones

- Lanza
  [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception) si
  el valor PHP no puede ser convertido en BSON. Las razones posibles incluyen,
  pero no se limitan a, encontrar una instancia inesperada de
  [MongoDB\BSON\Type](#class.mongodb-bson-type) o
  [MongoDB\BSON\Serializable::bsonSerialize()](#mongodb-bson-serializable.bsonserialize) fallando al
  devolver un [array](#language.types.array) o una [stdClass](#class.stdclass).

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0

            Esta función ha sido eliminada.






### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\fromPHP()**

&lt;?php

$bson = MongoDB\BSON\fromPHP(['foo' =&gt; 1]);
echo bin2hex($bson), "\n";

?&gt;

El ejemplo anterior mostrará:

0e00000010666f6f000100000000cat

### Ver también

- [MongoDB\BSON\Document::fromPHP()](#mongodb-bson-document.fromphp) - Construye una nueva instancia de documento a partir de datos PHP

- [MongoDB\BSON\toPHP()](#function.mongodb.bson-tophp) - Devuelve la representación PHP de un valor BSON

- [» MongoDB BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

- [Persistir datos](#mongodb.persistence)

# MongoDB\BSON\toCanonicalExtendedJSON

(mongodb &gt;=1.3.0)

MongoDB\BSON\toCanonicalExtendedJSON — Devuelve la representación JSON extendida canónica de un valor BSON

**Advertencia**

    Esta función ha sido *DEPRECADA* desde la versión 1.20.0 de la extensión
    y ha sido eliminada en la versión 2.0. Las aplicaciones deberían utilizar
    [MongoDB\BSON\Document::toCanonicalExtendedJSON()](#mongodb-bson-document.tocanonicalextendedjson) en su lugar.

### Descripción

**MongoDB\BSON\toCanonicalExtendedJSON**([string](#language.types.string) $bson): [string](#language.types.string)

Convierte una cadena BSON en su
[» representación JSON extendida canónica](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extendedjson-example).
El formato canónico privilegia la fidelidad de los tipos en detrimento de la
concisión de la salida y es el más adecuado para producir una salida que
puede ser convertida en BSON sin pérdida de información de tipo (por ejemplo,
los tipos numéricos permanecerán diferenciados).

### Parámetros

    bson ([string](#language.types.string))


      El BSON a convertir.


### Valores devueltos

El JSON convertido.

### Errores/Excepciones

- Lanza una excepción [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception) si la entrada no contiene exactamente un documento BSON. Las razones posibles incluyen, pero no se limitan a, BSON inválido, datos adicionales (después de leer un documento BSON), o un error inesperado de [» libbson](https://github.com/mongodb/mongo-c-driver/tree/master/src/libbson).

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0

            Esta función ha sido eliminada.






### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\BSON\toCanonicalExtendedJSON()**

&lt;?php

$documents = [
[ 'null' =&gt; null ],
[ 'boolean' =&gt; true ],
[ 'string' =&gt; 'foo' ],
[ 'int32' =&gt; 123 ],
[ 'int64' =&gt; 4294967295 ],
[ 'double' =&gt; 1.0, ],
[ 'nan' =&gt; NAN ],
[ 'pos_inf' =&gt; INF ],
[ 'neg_inf' =&gt; -INF ],
[ 'array' =&gt; [ 'foo', 'bar' ]],
[ 'document' =&gt; [ 'foo' =&gt; 'bar' ]],
[ 'oid' =&gt; new MongoDB\BSON\ObjectId('56315a7c6118fd1b920270b1') ],
[ 'dec128' =&gt; new MongoDB\BSON\Decimal128('1234.5678') ],
[ 'binary' =&gt; new MongoDB\BSON\Binary('foo', MongoDB\BSON\Binary::TYPE_GENERIC) ],
[ 'date' =&gt; new MongoDB\BSON\UTCDateTime(1445990400000) ],
[ 'timestamp' =&gt; new MongoDB\BSON\Timestamp(1234, 5678) ],
[ 'regex' =&gt; new MongoDB\BSON\Regex('pattern', 'i') ],
[ 'code' =&gt; new MongoDB\BSON\Javascript('function() { return 1; }') ],
[ 'code_ws' =&gt; new MongoDB\BSON\Javascript('function() { return a; }', ['a' =&gt; 1]) ],
[ 'minkey' =&gt; new MongoDB\BSON\MinKey ],
[ 'maxkey' =&gt; new MongoDB\BSON\MaxKey ],
];

foreach ($documents as $document) {
    $bson = MongoDB\BSON\fromPHP($document);
echo MongoDB\BSON\toCanonicalExtendedJSON($bson), "\n";
}

?&gt;

El ejemplo anterior mostrará:

{ "null" : null }
{ "boolean" : true }
{ "string" : "foo" }
{ "int32" : { "$numberInt" : "123" } }
{ "int64" : { "$numberLong" : "4294967295"} }
{ "double" : { "$numberDouble" : "1.0" } }
{ "nan" : { "$numberDouble" : "NaN" } }
{ "pos_inf" : { "$numberDouble" : "Infinity" } }
{ "neg_inf" : { "$numberDouble" : "-Infinity" } }
{ "array" : [ "foo", "bar" ] }
{ "document" : { "foo" : "bar" } }
{ "oid" : { "$oid" : "56315a7c6118fd1b920270b1" } }
{ "dec128" : { "$numberDecimal" : "1234.5678" } }
{ "binary" : { "$binary" : { "base64": "Zm9v", "subType" : "00" } } }
{ "date" : { "$date" : { "$numberLong" : "1445990400000" } } }
{ "timestamp" : { "$timestamp" : { "t" : 5678, "i" : 1234 } } }
{ "regex" : { "$regularExpression" : { "pattern" : "pattern", "options" : "i" } } }
{ "code" : { "$code" : "function() { return 1; }" } }
{ "code_ws" : { "$code" : "function() { return a; }", "$scope" : { "a" : { "$numberInt" : "1" } } } }
{ "minkey" : { "$minKey" : 1 } }
{ "maxkey" : { "$maxKey" : 1 } }

### Ver también

- [MongoDB\BSON\Document::fromJSON()](#mongodb-bson-document.fromjson) - Construye una nueva instancia de documento desde un string JSON

- [MongoDB\BSON\Document::toCanonicalExtendedJSON()](#mongodb-bson-document.tocanonicalextendedjson) - Devuelve la representación Canónica Extendida JSON del documento BSON

- [MongoDB\BSON\fromJSON()](#function.mongodb.bson-fromjson) - Devuelve la representación BSON de un valor JSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» Especificación de JSON extendido](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md)

- [» MongoDB BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\toJSON

(mongodb &gt;=1.0.0)

MongoDB\BSON\toJSON — Devuelve la representación JSON extendida heredada de un valor BSON

**Advertencia**

    Esta función ha sido *DEPRECADA* desde la versión 1.20.0 de la extensión
    y ha sido eliminada en la versión 2.0. Las aplicaciones deberían utilizar
    [MongoDB\BSON\Document::toCanonicalExtendedJSON()](#mongodb-bson-document.tocanonicalextendedjson) o
    [MongoDB\BSON\Document::toRelaxedExtendedJSON()](#mongodb-bson-document.torelaxedextendedjson) en su lugar.

### Descripción

**MongoDB\BSON\toJSON**([string](#language.types.string) $bson): [string](#language.types.string)

Convierte una cadena BSON en su [» representación JSON extendida heredada](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/).

**Nota**:

    Existen varios formatos JSON para representar BSON. Esta función
    implementa el "modo estricto" definido en
    [» MongoDB Extended JSON](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/),
    que ha sido reemplazado por los formatos canónicos y extendidos definidos en la
    [» especificación JSON extendida](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md)
    e implementado por [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson)
    y [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson), respectivamente.

**Advertencia**

    [» JSON](http://www.json.org/) no soporta
    [**<a href="#constant.nan">NAN](#language.types.float.nan)**</a> y
    [**<a href="#constant.inf">INF](#function.is-infinite)**</a> y el
    formato JSON extendido de MongoDB no define otra representación para
    estos valores ([» libbson](https://github.com/mongodb/mongo-c-driver/tree/master/src/libbson) producirá nan y inf literalmente,
    que no pueden ser analizados como JSON válido). Si se trabaja con BSON que puede contener números no finitos, utilice por favor
    [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) o
    [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson).

### Parámetros

    bson ([string](#language.types.string))


      Valor BSON a convertir.


### Valores devueltos

El valor JSON convertido.

### Errores/Excepciones

- Lanza una excepción [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception) si la entrada no contiene exactamente un documento BSON. Las razones posibles incluyen, pero no se limitan a, BSON inválido, datos adicionales (después de leer un documento BSON), o un error inesperado de [» libbson](https://github.com/mongodb/mongo-c-driver/tree/master/src/libbson).

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0

            Esta función ha sido eliminada.






### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\toJSON()**

&lt;?php

$documents = [
[ 'null' =&gt; null ],
[ 'boolean' =&gt; true ],
[ 'string' =&gt; 'foo' ],
[ 'int32' =&gt; 123 ],
[ 'int64' =&gt; 4294967295 ],
[ 'double' =&gt; 1.0, ],
[ 'nan' =&gt; NAN ],
[ 'pos_inf' =&gt; INF ],
[ 'neg_inf' =&gt; -INF ],
[ 'array' =&gt; [ 'foo', 'bar' ]],
[ 'document' =&gt; [ 'foo' =&gt; 'bar' ]],
[ 'oid' =&gt; new MongoDB\BSON\ObjectId('56315a7c6118fd1b920270b1') ],
[ 'dec128' =&gt; new MongoDB\BSON\Decimal128('1234.5678') ],
[ 'binary' =&gt; new MongoDB\BSON\Binary('foo', MongoDB\BSON\Binary::TYPE_GENERIC) ],
[ 'date' =&gt; new MongoDB\BSON\UTCDateTime(1445990400000) ],
[ 'timestamp' =&gt; new MongoDB\BSON\Timestamp(1234, 5678) ],
[ 'regex' =&gt; new MongoDB\BSON\Regex('pattern', 'i') ],
[ 'code' =&gt; new MongoDB\BSON\Javascript('function() { return 1; }') ],
[ 'code_ws' =&gt; new MongoDB\BSON\Javascript('function() { return a; }', ['a' =&gt; 1]) ],
[ 'minkey' =&gt; new MongoDB\BSON\MinKey ],
[ 'maxkey' =&gt; new MongoDB\BSON\MaxKey ],
];

foreach ($documents as $document) {
    $bson = MongoDB\BSON\fromPHP($document);
echo MongoDB\BSON\toJSON($bson), "\n";
}

?&gt;

El ejemplo anterior mostrará:

{ "null" : null }
{ "boolean" : true }
{ "string" : "foo" }
{ "int32" : 123 }
{ "int64" : 4294967295 }
{ "double" : 1.0 }
{ "nan" : nan }
{ "pos_inf" : inf }
{ "neg_inf" : -inf }
{ "array" : [ "foo", "bar" ] }
{ "document" : { "foo" : "bar" } }
{ "oid" : { "$oid" : "56315a7c6118fd1b920270b1" } }
{ "dec128" : { "$numberDecimal" : "1234.5678" } }
{ "binary" : { "$binary" : "Zm9v", "$type" : "00" } }
{ "date" : { "$date" : 1445990400000 } }
{ "timestamp" : { "$timestamp" : { "t" : 5678, "i" : 1234 } } }
{ "regex" : { "$regex" : "pattern", "$options" : "i" } }
{ "code" : { "$code" : "function() { return 1; }" } }
{ "code_ws" : { "$code" : "function() { return a; }", "$scope" : { "a" : 1 } } }
{ "minkey" : { "$minKey" : 1 } }
{ "maxkey" : { "$maxKey" : 1 } }

### Ver también

- [MongoDB\BSON\fromJSON()](#function.mongodb.bson-fromjson) - Devuelve la representación BSON de un valor JSON

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» MongoDB JSON Extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

- [» MongoDB BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\toPHP

(mongodb &gt;=1.0.0)

MongoDB\BSON\toPHP — Devuelve la representación PHP de un valor BSON

**Advertencia**

    Esta función ha sido *DEPRECADA* desde la versión 1.20.0 de la extensión
    y ha sido eliminada en la versión 2.0. Las aplicaciones deberían utilizar
    [MongoDB\BSON\Document::toPHP()](#mongodb-bson-document.tophp) en su lugar.

### Descripción

**MongoDB\BSON\toPHP**([string](#language.types.string) $bson, [array](#language.types.array) $typeMap = array()): [array](#language.types.array)|[object](#language.types.object)

Deserializa un documento BSON (es decir, una cadena binaria) en su representación PHP.
El parámetro typeMap puede ser utilizado para controlar los tipos PHP utilizados
para convertir los arrays y documentos BSON (tanto raíz como integrados).

**Advertencia**

Los documentos BSON pueden contener técnicamente claves duplicadas ya que
los documentos se almacenan como una lista de pares clave-valor;
sin embargo, las aplicaciones deben abstenerse de generar
documentos con claves duplicadas ya que el comportamiento del servidor y del
controlador puede ser indefinido. Dado que los objetos y arrays de PHP no pueden
tener claves duplicadas, los datos también podrían perderse al decodificar
un documento BSON con claves duplicadas.

### Parámetros

    bson ([string](#language.types.string))


      El valor BSON a deserializar.


typeMap ([array](#language.types.array))

        [Configuración del mapa de tipos](#mongodb.persistence.typemaps).

### Valores devueltos

El valor PHP no serializado.

### Errores/Excepciones

- Lanza una
  [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si
  una clase en la tabla de tipos no puede ser instanciada o no implementa
  [MongoDB\BSON\Unserializable](#class.mongodb-bson-unserializable).

- Lanza una excepción [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception) si la entrada no contiene exactamente un documento BSON. Las razones posibles incluyen, pero no se limitan a, BSON inválido, datos adicionales (después de leer un documento BSON), o un error inesperado de [» libbson](https://github.com/mongodb/mongo-c-driver/tree/master/src/libbson).

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0

            Esta función ha sido eliminada.





       PECL mongodb 1.4.0


         Si la entrada contiene un tipo BSON no soportado o obsoleto, la extensión
         ya no generará una advertencia en el registro de depuración, sino que creará
         un objeto que represente dicho tipo.







       PECL mongodb 1.3.2


         [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception)
         ya no lanza una excepción si la entrada contiene un tipo BSON no soportado
         o obsoleto. Estos tipos serán ignorados (como lo eran en versiones anteriores a 1.3.0), aunque la extensión ahora escribirá una advertencia
         en el registro de depuración (ver: [mongodb.debug](#ini.mongodb.debug)).







       PECL mongodb 1.3.0


         [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception)
         es lanzada si la entrada contiene un tipo BSON no soportado o obsoleto.
         Anteriormente, dichos tipos eran ignorados.








### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\BSON\toPHP()**

&lt;?php

$bson = hex2bin('0e00000010666f6f000100000000');
$value = MongoDB\BSON\toPHP($bson);
var_dump($value);

?&gt;

El ejemplo anterior mostrará:

object(stdClass)#1 (1) {
["foo"]=&gt;
int(1)
}

### Ver también

- [MongoDB\BSON\Document::toPHP()](#mongodb-bson-document.tophp) - Devuelve la representación PHP del documento BSON

- [MongoDB\BSON\fromPHP()](#function.mongodb.bson-fromphp) - Devuelve la representación BSON de un valor PHP

- [» MongoDB BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

- [Persistir datos](#mongodb.persistence)

# MongoDB\BSON\toRelaxedExtendedJSON

(mongodb &gt;=1.3.0)

MongoDB\BSON\toRelaxedExtendedJSON — Devuelve la representación JSON extendida relajada de un valor BSON

**Advertencia**

    Esta función ha sido *DEPRECADA* desde la versión 1.20.0 de la extensión
    y ha sido eliminada en la versión 2.0. Las aplicaciones deberían utilizar
    [MongoDB\BSON\Document::toRelaxedExtendedJSON()](#mongodb-bson-document.torelaxedextendedjson) en su lugar.

### Descripción

**MongoDB\BSON\toRelaxedExtendedJSON**([string](#language.types.string) $bson): [string](#language.types.string)

Convierte una cadena BSON en su representación
[» JSON extendida relajada](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example).
El formato relajado privilegia el uso de los tipos primitivos JSON
en detrimento de la fidelidad de los tipos y es el más adecuado para producir una salida que puede
ser fácilmente consumida por APIs web y humanos.

### Parámetros

    bson ([string](#language.types.string))


      La cadena BSON a convertir.


### Valores devueltos

El valor JSON convertido.

### Errores/Excepciones

- Lanza una excepción [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception) si la entrada no contiene exactamente un documento BSON. Las razones posibles incluyen, pero no se limitan a, BSON inválido, datos adicionales (después de leer un documento BSON), o un error inesperado de [» libbson](https://github.com/mongodb/mongo-c-driver/tree/master/src/libbson).

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0

            Esta función ha sido eliminada.






### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\BSON\toRelaxedExtendedJSON()**

&lt;?php

$documents = [
[ 'null' =&gt; null ],
[ 'boolean' =&gt; true ],
[ 'string' =&gt; 'foo' ],
[ 'int32' =&gt; 123 ],
[ 'int64' =&gt; 4294967295 ],
[ 'double' =&gt; 1.0, ],
[ 'nan' =&gt; NAN ],
[ 'pos_inf' =&gt; INF ],
[ 'neg_inf' =&gt; -INF ],
[ 'array' =&gt; [ 'foo', 'bar' ]],
[ 'document' =&gt; [ 'foo' =&gt; 'bar' ]],
[ 'oid' =&gt; new MongoDB\BSON\ObjectId('56315a7c6118fd1b920270b1') ],
[ 'dec128' =&gt; new MongoDB\BSON\Decimal128('1234.5678') ],
[ 'binary' =&gt; new MongoDB\BSON\Binary('foo', MongoDB\BSON\Binary::TYPE_GENERIC) ],
[ 'date' =&gt; new MongoDB\BSON\UTCDateTime(1445990400000) ],
[ 'timestamp' =&gt; new MongoDB\BSON\Timestamp(1234, 5678) ],
[ 'regex' =&gt; new MongoDB\BSON\Regex('pattern', 'i') ],
[ 'code' =&gt; new MongoDB\BSON\Javascript('function() { return 1; }') ],
[ 'code_ws' =&gt; new MongoDB\BSON\Javascript('function() { return a; }', ['a' =&gt; 1]) ],
[ 'minkey' =&gt; new MongoDB\BSON\MinKey ],
[ 'maxkey' =&gt; new MongoDB\BSON\MaxKey ],
];

foreach ($documents as $document) {
    $bson = MongoDB\BSON\fromPHP($document);
echo MongoDB\BSON\toRelaxedExtendedJSON($bson), "\n";
}

?&gt;

El ejemplo anterior mostrará:

{ "null" : null }
{ "boolean" : true }
{ "string" : "foo" }
{ "int32" : 123 }
{ "int64" : 4294967295 }
{ "double" : 1.0 }
{ "nan" : { "$numberDouble" : "NaN" } }
{ "pos_inf" : { "$numberDouble" : "Infinity" } }
{ "neg_inf" : { "$numberDouble" : "-Infinity" } }
{ "array" : [ "foo", "bar" ] }
{ "document" : { "foo" : "bar" } }
{ "oid" : { "$oid" : "56315a7c6118fd1b920270b1" } }
{ "dec128" : { "$numberDecimal" : "1234.5678" } }
{ "binary" : { "$binary" : { "base64": "Zm9v", "subType" : "00" } } }
{ "date" : { "$date" : "2015-10-28T00:00:00Z" } }
{ "timestamp" : { "$timestamp" : { "t" : 5678, "i" : 1234 } } }
{ "regex" : { "$regularExpression" : { "pattern" : "pattern", "options" : "i" } } }
{ "code" : { "$code" : "function() { return 1; }" } }
{ "code_ws" : { "$code" : "function() { return a; }", "$scope" : { "a" : 1 } } }
{ "minkey" : { "$minKey" : 1 } }
{ "maxkey" : { "$maxKey" : 1 } }

### Ver también

- [MongoDB\BSON\Document::fromJSON()](#mongodb-bson-document.fromjson) - Construye una nueva instancia de documento desde un string JSON

- [MongoDB\BSON\Document::toRelaxedExtendedJSON()](#mongodb-bson-document.torelaxedextendedjson) - Devuelve la representación relajada extendida JSON del documento BSON

- [MongoDB\BSON\fromJSON()](#function.mongodb.bson-fromjson) - Devuelve la representación BSON de un valor JSON

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [» JSON extendido](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md)

- [» MongoDB BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

## Tabla de contenidos

- [MongoDB\BSON\fromJSON](#function.mongodb.bson-fromjson) — Devuelve la representación BSON de un valor JSON
- [MongoDB\BSON\fromPHP](#function.mongodb.bson-fromphp) — Devuelve la representación BSON de un valor PHP
- [MongoDB\BSON\toCanonicalExtendedJSON](#function.mongodb.bson-tocanonicalextendedjson) — Devuelve la representación JSON extendida canónica de un valor BSON
- [MongoDB\BSON\toJSON](#function.mongodb.bson-tojson) — Devuelve la representación JSON extendida heredada de un valor BSON
- [MongoDB\BSON\toPHP](#function.mongodb.bson-tophp) — Devuelve la representación PHP de un valor BSON
- [MongoDB\BSON\toRelaxedExtendedJSON](#function.mongodb.bson-torelaxedextendedjson) — Devuelve la representación JSON extendida relajada de un valor BSON

# la clase MongoDB\BSON\Document

(mongodb &gt;=1.16.0)

## Introducción

    Representa un documento BSON. Esta clase se utiliza al leer datos como BSON sin tratar
    y no puede ser modificada.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\BSON\Document**


     implements
       [MongoDB\BSON\Type](#class.mongodb-bson-type),  [ArrayAccess](#class.arrayaccess),  [IteratorAggregate](#class.iteratoraggregate) {


    /* Métodos */

final private [\_\_construct](#mongodb-bson-document.construct)()
final static public [fromBSON](#mongodb-bson-document.frombson)([string](#language.types.string) $bson): [MongoDB\BSON\Document](#class.mongodb-bson-document)
final static public [fromJSON](#mongodb-bson-document.fromjson)([string](#language.types.string) $json): [MongoDB\BSON\Document](#class.mongodb-bson-document)
final static public [fromPHP](#mongodb-bson-document.fromphp)([object](#language.types.object)|[array](#language.types.array) $value): [MongoDB\BSON\Document](#class.mongodb-bson-document)
final public [get](#mongodb-bson-document.get)([string](#language.types.string) $key): [mixed](#language.types.mixed)
final public [getIterator](#mongodb-bson-document.getiterator)(): [MongoDB\BSON\Iterator](#class.mongodb-bson-iterator)
final public [has](#mongodb-bson-document.has)([string](#language.types.string) $key): [bool](#language.types.boolean)
final public [offsetExists](#mongodb-bson-document.offsetexists)([mixed](#language.types.mixed) $key): [bool](#language.types.boolean)
final public [offsetGet](#mongodb-bson-document.offsetget)([mixed](#language.types.mixed) $key): [mixed](#language.types.mixed)
final public [offsetSet](#mongodb-bson-document.offsetset)([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
final public [offsetUnset](#mongodb-bson-document.offsetunset)([mixed](#language.types.mixed) $key): [void](language.types.void.html)
final public [toCanonicalExtendedJSON](#mongodb-bson-document.tocanonicalextendedjson)(): [string](#language.types.string)
final public [toPHP](#mongodb-bson-document.tophp)([?](#language.types.null)[array](#language.types.array) $typeMap = **[null](#constant.null)**): [array](#language.types.array)|[object](#language.types.object)
final public [toRelaxedExtendedJSON](#mongodb-bson-document.torelaxedextendedjson)(): [string](#language.types.string)
final public [\_\_toString](#mongodb-bson-document.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0


                Esta clase ya no implementa la interfaz
                [Serializable](#class.serializable).








        PECL mongodb 1.17.0

         Implementa [MongoDB\BSON\Type](#class.mongodb-bson-type).






# MongoDB\BSON\Document::\_\_construct

(mongodb &gt;=1.16.0)

MongoDB\BSON\Document::\_\_construct — Construye un nuevo documento BSON (no utilizado)

### Descripción

final private **MongoDB\BSON\Document::\_\_construct**()

Los objetos [MongoDB\BSON\Document](#class.mongodb-bson-document) son creados a través
de métodos de fábrica estáticos y no pueden ser instanciados directamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Ver también

- [MongoDB\BSON\Document::fromPHP()](#mongodb-bson-document.fromphp) - Construye una nueva instancia de documento a partir de datos PHP

- [MongoDB\BSON\Document::fromBSON()](#mongodb-bson-document.frombson) - Construye una nueva instancia de documento a partir de un string BSON

- [MongoDB\BSON\Document::fromJSON()](#mongodb-bson-document.fromjson) - Construye una nueva instancia de documento desde un string JSON

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Document::fromBSON

(mongodb &gt;=1.16.0)

MongoDB\BSON\Document::fromBSON — Construye una nueva instancia de documento a partir de un string BSON

### Descripción

final static public **MongoDB\BSON\Document::fromBSON**([string](#language.types.string) $bson): [MongoDB\BSON\Document](#class.mongodb-bson-document)

### Parámetros

    bson ([string](#language.types.string))


      Un string que contiene un documento en formato BSON.


### Valores devueltos

Devuelve una nueva instancia de [MongoDB\BSON\Document](#class.mongodb-bson-document).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception) si bson es un string inválido o contiene más de un documento

### Ver también

- [MongoDB\BSON\Document::fromPHP()](#mongodb-bson-document.fromphp) - Construye una nueva instancia de documento a partir de datos PHP

- [MongoDB\BSON\Document::fromJSON()](#mongodb-bson-document.fromjson) - Construye una nueva instancia de documento desde un string JSON

- [» BSON Types](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Document::fromJSON

(mongodb &gt;=1.16.0)

MongoDB\BSON\Document::fromJSON — Construye una nueva instancia de documento desde un string JSON

### Descripción

final static public **MongoDB\BSON\Document::fromJSON**([string](#language.types.string) $json): [MongoDB\BSON\Document](#class.mongodb-bson-document)

Convierte un string
[» JSON extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)
a su representación BSON.

### Parámetros

    json ([string](#language.types.string))


      El valor JSON a convertir.


### Valores devueltos

Retorna una nueva instancia de [MongoDB\BSON\Document](#class.mongodb-bson-document).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza
  [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception) si
  el valor JSON no puede ser convertido a un documento BSON (por ejemplo, debido a un error
  de sintaxis).

### Ver también

- [MongoDB\BSON\Document::fromPHP()](#mongodb-bson-document.fromphp) - Construye una nueva instancia de documento a partir de datos PHP

- [MongoDB\BSON\Document::fromBSON()](#mongodb-bson-document.frombson) - Construye una nueva instancia de documento a partir de un string BSON

- [» MongoDB JSON extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

- [» Tipo BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Document::fromPHP

(mongodb &gt;=1.16.0)

MongoDB\BSON\Document::fromPHP — Construye una nueva instancia de documento a partir de datos PHP

### Descripción

final static public **MongoDB\BSON\Document::fromPHP**([object](#language.types.object)|[array](#language.types.array) $value): [MongoDB\BSON\Document](#class.mongodb-bson-document)

### Parámetros

    value ([object](#language.types.object)|[array](#language.types.array))


      Un objeto PHP o un array que contiene el documento. Cuando se pasa un array con claves numéricas, los valores numéricos se convierten en strings y se utilizan como claves del documento.


### Valores devueltos

Devuelve una nueva instancia de [MongoDB\BSON\Document](#class.mongodb-bson-document).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\BSON\Document::fromBSON()](#mongodb-bson-document.frombson) - Construye una nueva instancia de documento a partir de un string BSON

- [MongoDB\BSON\Document::fromJSON()](#mongodb-bson-document.fromjson) - Construye una nueva instancia de documento desde un string JSON

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Document::get

(mongodb &gt;=1.16.0)

MongoDB\BSON\Document::get — Devuelve el valor de una clave en un documento

### Descripción

final public **MongoDB\BSON\Document::get**([string](#language.types.string) $key): [mixed](#language.types.mixed)

### Parámetros

    key ([string](#language.types.string))


      La clave a recuperar en el documento.


### Valores devueltos

Devuelve el valor asociado a la clave dada. Si la clave no está presente en
el documento, se lanza una excepción.

**Nota**:

    Cuando se encuentra un valor codificado como un entero de 64 bits en el documento BSON,
    el valor de retorno de este método será una
    instancia de [MongoDB\BSON\Int64](#class.mongodb-bson-int64).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) si la clave no está presente en el documento.

### Ver también

- [MongoDB\BSON\Document::has()](#mongodb-bson-document.has) - Indica si una clave está presente en el documento

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Document::getIterator

(mongodb &gt;=1.16.0)

MongoDB\BSON\Document::getIterator — Devuelve un iterador para el documento BSON

### Descripción

final public **MongoDB\BSON\Document::getIterator**(): [MongoDB\BSON\Iterator](#class.mongodb-bson-iterator)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una instancia de [MongoDB\BSON\Iterator](#class.mongodb-bson-iterator) que puede ser
utilizada para iterar sobre todas las claves del documento.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception) si el iterador BSON no puede ser inicializado.

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Document::has

(mongodb &gt;=1.16.0)

MongoDB\BSON\Document::has — Indica si una clave está presente en el documento

### Descripción

final public **MongoDB\BSON\Document::has**([string](#language.types.string) $key): [bool](#language.types.boolean)

### Parámetros

    key ([string](#language.types.string))


      La clave a buscar en el documento.


### Valores devueltos

Devuelve **[true](#constant.true)** si la clave está presente en el documento, de lo contrario **[false](#constant.false)**.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\BSON\Document::get()](#mongodb-bson-document.get) - Devuelve el valor de una clave en un documento

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Document::offsetExists

(mongodb &gt;=1.17.0)

MongoDB\BSON\Document::offsetExists — Indica si una clave está presente en el documento

### Descripción

final public **MongoDB\BSON\Document::offsetExists**([mixed](#language.types.mixed) $key): [bool](#language.types.boolean)

### Parámetros

     key


       La clave a buscar en el documento.





### Valores devueltos

Devuelve **[true](#constant.true)** si la clave está presente en el documento, de lo contrario **[false](#constant.false)**.

### Ver también

    - [ArrayAccess::offsetExists()](#arrayaccess.offsetexists) - Comprobar si existe un índice

    - [MongoDB\BSON\Document::has()](#mongodb-bson-document.has) - Indica si una clave está presente en el documento

# MongoDB\BSON\Document::offsetGet

(mongodb &gt;=1.17.0)

MongoDB\BSON\Document::offsetGet — Devuelve el valor de una clave en un documento

### Descripción

final public **MongoDB\BSON\Document::offsetGet**([mixed](#language.types.mixed) $key): [mixed](#language.types.mixed)

### Parámetros

     key


       La clave a recuperar en el documento.





### Valores devueltos

Devuelve el valor asociado a la clave dada. Si la clave no está presente en
el documento, se lanza una excepción.

**Nota**:

    Cuando se encuentra un valor codificado como un entero de 64 bits en el documento BSON,
    el valor de retorno de este método será una
    instancia de [MongoDB\BSON\Int64](#class.mongodb-bson-int64).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) si la clave no está presente en el documento.

### Ver también

    - [ArrayAccess::offsetGet()](#arrayaccess.offsetget) - Offset para recuperar

    - [MongoDB\BSON\Document::get()](#mongodb-bson-document.get) - Devuelve el valor de una clave en un documento

# MongoDB\BSON\Document::offsetSet

(mongodb &gt;=1.17.0)

MongoDB\BSON\Document::offsetSet — Implementación de [ArrayAccess](#class.arrayaccess)

### Descripción

final public **MongoDB\BSON\Document::offsetSet**([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

Cambia el valor en la key especificada por value.

### Parámetros

     key


       El índice a definir.






     value


       El nuevo valor para la key.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Siempre lanza una [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception).

# MongoDB\BSON\Document::offsetUnset

(mongodb &gt;=1.17.0)

MongoDB\BSON\Document::offsetUnset — Implementación de [ArrayAccess](#class.arrayaccess)

### Descripción

final public **MongoDB\BSON\Document::offsetUnset**([mixed](#language.types.mixed) $key): [void](language.types.void.html)

Elimina el valor en el índice especificado.

### Parámetros

     key


       El índice a eliminar.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Siempre lanza una [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception).

# MongoDB\BSON\Document::toCanonicalExtendedJSON

(mongodb &gt;=1.16.0)

MongoDB\BSON\Document::toCanonicalExtendedJSON — Devuelve la representación Canónica Extendida JSON del documento BSON

### Descripción

final public **MongoDB\BSON\Document::toCanonicalExtendedJSON**(): [string](#language.types.string)

Convierte el documento BSON en su
representación [» Canónica Extendida JSON](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example).
El formato canónico prefiere la fidelidad de los tipos a la salida concisa y es el más adecuado para producir una salida que puede ser convertida
en BSON sin pérdida de información de tipo (por ejemplo, los tipos numéricos
permanecerán diferenciados).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string que contiene la
[» representación Canonical Extended JSON](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example)
del documento BSON.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\BSON\Document::toCanonicalExtendedJSON()**

    &lt;?php

$documents = [
[ 'null' =&gt; null ],
[ 'boolean' =&gt; true ],
[ 'string' =&gt; 'foo' ],
[ 'int32' =&gt; 123 ],
[ 'int64' =&gt; 4294967295 ],
[ 'double' =&gt; 1.0 ],
[ 'nan' =&gt; NAN ],
[ 'pos_inf' =&gt; INF ],
[ 'neg_inf' =&gt; -INF ],
[ 'array' =&gt; [ 'foo', 'bar' ]],
[ 'document' =&gt; [ 'foo' =&gt; 'bar' ]],
[ 'oid' =&gt; new MongoDB\BSON\ObjectId('56315a7c6118fd1b920270b1') ],
[ 'dec128' =&gt; new MongoDB\BSON\Decimal128('1234.5678') ],
[ 'binary' =&gt; new MongoDB\BSON\Binary('foo', MongoDB\BSON\Binary::TYPE_GENERIC) ],
[ 'date' =&gt; new MongoDB\BSON\UTCDateTime(1445990400000) ],
[ 'timestamp' =&gt; new MongoDB\BSON\Timestamp(1234, 5678) ],
[ 'regex' =&gt; new MongoDB\BSON\Regex('pattern', 'i') ],
[ 'code' =&gt; new MongoDB\BSON\Javascript('function() { return 1; }') ],
[ 'code_ws' =&gt; new MongoDB\BSON\Javascript('function() { return a; }', ['a' =&gt; 1]) ],
[ 'minkey' =&gt; new MongoDB\BSON\MinKey ],
[ 'maxkey' =&gt; new MongoDB\BSON\MaxKey ],
];

foreach ($documents as $document) {
    $bson = MongoDB\BSON\Document::fromPHP($document);
echo $bson-&gt;toCanonicalExtendedJSON(), "\n";
}

?&gt;

El ejemplo anterior mostrará:

    { "null" : null }

{ "boolean" : true }
{ "string" : "foo" }
{ "int32" : { "$numberInt" : "123" } }
{ "int64" : { "$numberLong" : "4294967295"} }
{ "double" : { "$numberDouble" : "1.0" } }
{ "nan" : { "$numberDouble" : "NaN" } }
{ "pos_inf" : { "$numberDouble" : "Infinity" } }
{ "neg_inf" : { "$numberDouble" : "-Infinity" } }
{ "array" : [ "foo", "bar" ] }
{ "document" : { "foo" : "bar" } }
{ "oid" : { "$oid" : "56315a7c6118fd1b920270b1" } }
{ "dec128" : { "$numberDecimal" : "1234.5678" } }
{ "binary" : { "$binary" : { "base64": "Zm9v", "subType" : "00" } } }
{ "date" : { "$date" : { "$numberLong" : "1445990400000" } } }
{ "timestamp" : { "$timestamp" : { "t" : 5678, "i" : 1234 } } }
{ "regex" : { "$regularExpression" : { "pattern" : "pattern", "options" : "i" } } }
{ "code" : { "$code" : "function() { return 1; }" } }
{ "code_ws" : { "$code" : "function() { return a; }", "$scope" : { "a" : { "$numberInt" : "1" } } } }
{ "minkey" : { "$minKey" : 1 } }
{ "maxkey" : { "$maxKey" : 1 } }

### Ver también

- [MongoDB\BSON\Document::fromJSON()](#mongodb-bson-document.fromjson) - Construye una nueva instancia de documento desde un string JSON

- [MongoDB\BSON\Document::toRelaxedExtendedJSON()](#mongodb-bson-document.torelaxedextendedjson) - Devuelve la representación relajada extendida JSON del documento BSON

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [» Canónica Extendida JSON](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md)

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Document::toPHP

(mongodb &gt;=1.16.0)

MongoDB\BSON\Document::toPHP — Devuelve la representación PHP del documento BSON

### Descripción

final public **MongoDB\BSON\Document::toPHP**([?](#language.types.null)[array](#language.types.array) $typeMap = **[null](#constant.null)**): [array](#language.types.array)|[object](#language.types.object)

Deserializa el documento BSON en su representación PHP. El parámetro
typeMap puede ser utilizado para controlar los tipos PHP
utilizados para convertir los arrays y documentos BSON (raíz e integrados).

**Advertencia**

Los documentos BSON pueden contener técnicamente claves duplicadas ya que
los documentos se almacenan como una lista de pares clave-valor;
sin embargo, las aplicaciones deben abstenerse de generar
documentos con claves duplicadas ya que el comportamiento del servidor y del
controlador puede ser indefinido. Dado que los objetos y arrays de PHP no pueden
tener claves duplicadas, los datos también podrían perderse al decodificar
un documento BSON con claves duplicadas.

### Parámetros

typeMap ([array](#language.types.array))

        [Configuración del mapa de tipos](#mongodb.persistence.typemaps).

### Valores devueltos

El valor decodificado PHP.

**Nota**:

    Cuando se encuentra un valor codificado como un entero de 64 bits en el documento BSON,
    el valor de retorno de este método será una
    instancia de [MongoDB\BSON\Int64](#class.mongodb-bson-int64).

### Errores/Excepciones

- Lanza una
  [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si
  un tipo en el mapa de tipos no puede ser instanciado o no implementa
  [MongoDB\BSON\Unserializable](#class.mongodb-bson-unserializable).

### Ver también

- [MongoDB\BSON\toPHP()](#function.mongodb.bson-tophp) - Devuelve la representación PHP de un valor BSON

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Document::toRelaxedExtendedJSON

(mongodb &gt;=1.16.0)

MongoDB\BSON\Document::toRelaxedExtendedJSON — Devuelve la representación relajada extendida JSON del documento BSON

### Descripción

final public **MongoDB\BSON\Document::toRelaxedExtendedJSON**(): [string](#language.types.string)

Convierte el documento BSON en su representación
[» Relajada Extendida JSON](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example).
El formato relajado prefiere el uso de las primitivas de tipo JSON en detrimento de la fidelidad de los tipos y es el más adecuado para producir una salida que puede ser
fácilmente consumida por las API web y los humanos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string que contiene la
[» representación Relaxed Extended JSON](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example)
del documento BSON.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\BSON\Document::toRelaxedExtendedJSON()**

    &lt;?php

$documents = [
[ 'null' =&gt; null ],
[ 'boolean' =&gt; true ],
[ 'string' =&gt; 'foo' ],
[ 'int32' =&gt; 123 ],
[ 'int64' =&gt; 4294967295 ],
[ 'double' =&gt; 1.0 ],
[ 'nan' =&gt; NAN ],
[ 'pos_inf' =&gt; INF ],
[ 'neg_inf' =&gt; -INF ],
[ 'array' =&gt; [ 'foo', 'bar' ]],
[ 'document' =&gt; [ 'foo' =&gt; 'bar' ]],
[ 'oid' =&gt; new MongoDB\BSON\ObjectId('56315a7c6118fd1b920270b1') ],
[ 'dec128' =&gt; new MongoDB\BSON\Decimal128('1234.5678') ],
[ 'binary' =&gt; new MongoDB\BSON\Binary('foo', MongoDB\BSON\Binary::TYPE_GENERIC) ],
[ 'date' =&gt; new MongoDB\BSON\UTCDateTime(1445990400000) ],
[ 'timestamp' =&gt; new MongoDB\BSON\Timestamp(1234, 5678) ],
[ 'regex' =&gt; new MongoDB\BSON\Regex('pattern', 'i') ],
[ 'code' =&gt; new MongoDB\BSON\Javascript('function() { return 1; }') ],
[ 'code_ws' =&gt; new MongoDB\BSON\Javascript('function() { return a; }', ['a' =&gt; 1]) ],
[ 'minkey' =&gt; new MongoDB\BSON\MinKey ],
[ 'maxkey' =&gt; new MongoDB\BSON\MaxKey ],
];

foreach ($documents as $document) {
    $bson = MongoDB\BSON\Document::fromPHP($document);
echo $bson-&gt;toRelaxedExtendedJSON(), "\n";
}

?&gt;

El ejemplo anterior mostrará:

    { "null" : null }

{ "boolean" : true }
{ "string" : "foo" }
{ "int32" : 123 }
{ "int64" : 4294967295 }
{ "double" : 1.0 }
{ "nan" : { "$numberDouble" : "NaN" } }
{ "pos_inf" : { "$numberDouble" : "Infinity" } }
{ "neg_inf" : { "$numberDouble" : "-Infinity" } }
{ "array" : [ "foo", "bar" ] }
{ "document" : { "foo" : "bar" } }
{ "oid" : { "$oid" : "56315a7c6118fd1b920270b1" } }
{ "dec128" : { "$numberDecimal" : "1234.5678" } }
{ "binary" : { "$binary" : { "base64": "Zm9v", "subType" : "00" } } }
{ "date" : { "$date" : "2015-10-28T00:00:00Z" } }
{ "timestamp" : { "$timestamp" : { "t" : 5678, "i" : 1234 } } }
{ "regex" : { "$regularExpression" : { "pattern" : "pattern", "options" : "i" } } }
{ "code" : { "$code" : "function() { return 1; }" } }
{ "code_ws" : { "$code" : "function() { return a; }", "$scope" : { "a" : 1 } } }
{ "minkey" : { "$minKey" : 1 } }
{ "maxkey" : { "$maxKey" : 1 } }

### Ver también

- [MongoDB\BSON\Document::fromJSON()](#mongodb-bson-document.fromjson) - Construye una nueva instancia de documento desde un string JSON

- [MongoDB\BSON\Document::toCanonicalExtendedJSON()](#mongodb-bson-document.tocanonicalextendedjson) - Devuelve la representación Canónica Extendida JSON del documento BSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» Especificación JSON extendida](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md)

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Document::\_\_toString

(mongodb &gt;=1.16.0)

MongoDB\BSON\Document::\_\_toString — Devuelve la representación en string de este documento BSON

### Descripción

final public **MongoDB\BSON\Document::\_\_toString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación en string de este documento BSON.

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

## Tabla de contenidos

- [MongoDB\BSON\Document::\_\_construct](#mongodb-bson-document.construct) — Construye un nuevo documento BSON (no utilizado)
- [MongoDB\BSON\Document::fromBSON](#mongodb-bson-document.frombson) — Construye una nueva instancia de documento a partir de un string BSON
- [MongoDB\BSON\Document::fromJSON](#mongodb-bson-document.fromjson) — Construye una nueva instancia de documento desde un string JSON
- [MongoDB\BSON\Document::fromPHP](#mongodb-bson-document.fromphp) — Construye una nueva instancia de documento a partir de datos PHP
- [MongoDB\BSON\Document::get](#mongodb-bson-document.get) — Devuelve el valor de una clave en un documento
- [MongoDB\BSON\Document::getIterator](#mongodb-bson-document.getiterator) — Devuelve un iterador para el documento BSON
- [MongoDB\BSON\Document::has](#mongodb-bson-document.has) — Indica si una clave está presente en el documento
- [MongoDB\BSON\Document::offsetExists](#mongodb-bson-document.offsetexists) — Indica si una clave está presente en el documento
- [MongoDB\BSON\Document::offsetGet](#mongodb-bson-document.offsetget) — Devuelve el valor de una clave en un documento
- [MongoDB\BSON\Document::offsetSet](#mongodb-bson-document.offsetset) — Implementación de ArrayAccess
- [MongoDB\BSON\Document::offsetUnset](#mongodb-bson-document.offsetunset) — Implementación de ArrayAccess
- [MongoDB\BSON\Document::toCanonicalExtendedJSON](#mongodb-bson-document.tocanonicalextendedjson) — Devuelve la representación Canónica Extendida JSON del documento BSON
- [MongoDB\BSON\Document::toPHP](#mongodb-bson-document.tophp) — Devuelve la representación PHP del documento BSON
- [MongoDB\BSON\Document::toRelaxedExtendedJSON](#mongodb-bson-document.torelaxedextendedjson) — Devuelve la representación relajada extendida JSON del documento BSON
- [MongoDB\BSON\Document::\_\_toString](#mongodb-bson-document.tostring) — Devuelve la representación en string de este documento BSON

# La clase MongoDB\BSON\PackedArray

(mongodb &gt;=1.16.0)

## Introducción

    Representa un array BSON. Esta clase se utiliza al leer datos como BSON sin tratar
    y no puede ser modificada.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\BSON\PackedArray**


     implements
       [MongoDB\BSON\Type](#class.mongodb-bson-type),  [ArrayAccess](#class.arrayaccess),  [IteratorAggregate](#class.iteratoraggregate) {


    /* Métodos */

final private [\_\_construct](#mongodb-bson-packedarray.construct)()
final static public [fromJSON](#mongodb-bson-packedarray.fromjson)([string](#language.types.string) $json): [MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray)
final static public [fromPHP](#mongodb-bson-packedarray.fromphp)([array](#language.types.array) $value): [MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray)
final public [get](#mongodb-bson-packedarray.get)([int](#language.types.integer) $key): [mixed](#language.types.mixed)
final public [getIterator](#mongodb-bson-packedarray.getiterator)(): [MongoDB\BSON\Iterator](#class.mongodb-bson-iterator)
final public [has](#mongodb-bson-packedarray.has)([int](#language.types.integer) $index): [bool](#language.types.boolean)
final public [offsetExists](#mongodb-bson-packedarray.offsetexists)([mixed](#language.types.mixed) $key): [bool](#language.types.boolean)
final public [offsetGet](#mongodb-bson-packedarray.offsetget)([mixed](#language.types.mixed) $key): [mixed](#language.types.mixed)
final public [offsetSet](#mongodb-bson-packedarray.offsetset)([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $value): [void](language.types.void.html)
final public [offsetUnset](#mongodb-bson-packedarray.offsetunset)([mixed](#language.types.mixed) $key): [void](language.types.void.html)
final public [toCanonicalExtendedJSON](#mongodb-bson-packedarray.tocanonicalextendedjson)(): [string](#language.types.string)
final public [toPHP](#mongodb-bson-packedarray.tophp)([?](#language.types.null)[array](#language.types.array) $typeMap = **[null](#constant.null)**): [array](#language.types.array)|[object](#language.types.object)
final public [toRelaxedExtendedJSON](#mongodb-bson-packedarray.torelaxedextendedjson)(): [string](#language.types.string)
final public [\_\_toString](#mongodb-bson-packedarray.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0


                Esta clase ya no implementa la interfaz
                [Serializable](#class.serializable).








        PECL mongodb 1.17.0

         Implementa [MongoDB\BSON\Type](#class.mongodb-bson-type).




        PECL mongodb 1.17.0

         **MongoDB\BSON\PackedArray** no puede ser serializado
         en contextos donde se espera un documento BSON. En versiones anteriores,
         el array BSON habría sido convertido en documento.






# MongoDB\BSON\PackedArray::\_\_construct

(mongodb &gt;=1.16.0)

MongoDB\BSON\PackedArray::\_\_construct — Construye un nuevo array BSON (no utilizado)

### Descripción

final private **MongoDB\BSON\PackedArray::\_\_construct**()

Los objetos [MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray) se crean con
métodos de fábrica estáticos y no pueden ser instanciados directamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Ver también

- [MongoDB\BSON\PackedArray::fromPHP()](#mongodb-bson-packedarray.fromphp) - Construye una nueva instancia de array BSON a partir de datos PHP

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\PackedArray::fromJSON

(mongodb &gt;=1.20.0)

MongoDB\BSON\PackedArray::fromJSON — Construye una nueva instancia de array BSON a partir de un string JSON

### Descripción

final static public **MongoDB\BSON\PackedArray::fromJSON**([string](#language.types.string) $json): [MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray)

Convierte un string
[» JSON extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)
en su representación BSON.

### Parámetros

    json ([string](#language.types.string))


      El valor JSON a convertir.


### Valores devueltos

Devuelve una nueva instancia de [MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una
  [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception) si
  el valor JSON no puede ser convertido en un array BSON (por ejemplo, debido
  a un error de sintaxis).

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\BSON\PackedArray::fromJSON()**

    &lt;?php

$json = '[ "foo", { "$numberInt" : "123" }, { "$numberLong" : "4294967295" }, { "$oid" : "56315a7c6118fd1b920270b1" } ]';
$packedArray = MongoDB\BSON\PackedArray::fromJSON($json);
var_dump($packedArray);

?&gt;

El ejemplo anterior mostrará:

    object(MongoDB\BSON\PackedArray)#1 (2) {

["data"]=&gt;
string(68) "MQAAAAIwAAQAAABmb28AEDEAewAAABIyAP////8AAAAABzMAVjFafGEY/RuSAnCxAA=="
["value"]=&gt;
array(4) {
[0]=&gt;
string(3) "foo"
[1]=&gt;
int(123)
[2]=&gt;
int(4294967295)
[3]=&gt;
object(MongoDB\BSON\ObjectId)#2 (1) {
["oid"]=&gt;
string(24) "56315a7c6118fd1b920270b1"
}
}
}

### Ver también

- [MongoDB\BSON\PackedArray::fromPHP()](#mongodb-bson-packedarray.fromphp) - Construye una nueva instancia de array BSON a partir de datos PHP

- [» Json extendido de MongoDB](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\PackedArray::fromPHP

(mongodb &gt;=1.16.0)

MongoDB\BSON\PackedArray::fromPHP — Construye una nueva instancia de array BSON a partir de datos PHP

### Descripción

final static public **MongoDB\BSON\PackedArray::fromPHP**([array](#language.types.array) $value): [MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray)

### Parámetros

    value ([array](#language.types.array))


      El array PHP a convertir en array BSON. El array debe ser una lista
      (es decir, tener claves numéricas secuenciales comenzando por 0).


### Valores devueltos

Devuelve una nueva instancia de [MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si el array dado no es una lista (por ejemplo, tiene secuencias numéricas comenzando por 0).

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\PackedArray::get

(mongodb &gt;=1.16.0)

MongoDB\BSON\PackedArray::get — Devuelve el valor de un índice del array

### Descripción

final public **MongoDB\BSON\PackedArray::get**([int](#language.types.integer) $key): [mixed](#language.types.mixed)

### Parámetros

    key ([int](#language.types.integer))


      El índice a recuperar del array.


### Valores devueltos

Devuelve el valor asociado al índice dado. Si el índice no está
presente en el array, se lanza una excepción.

**Nota**:

    Cuando se encuentra un valor codificado como un entero de 64 bits en el array BSON,
    el valor de retorno de este método será una instancia de
    [MongoDB\BSON\Int64](#class.mongodb-bson-int64).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) si el índice no está presente en el array.

### Ver también

- [MongoDB\BSON\PackedArray::has()](#mongodb-bson-packedarray.has) - Indica si un índice está presente en el array

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\PackedArray::getIterator

(mongodb &gt;=1.16.0)

MongoDB\BSON\PackedArray::getIterator — Devuelve el iterador para el array BSON

### Descripción

final public **MongoDB\BSON\PackedArray::getIterator**(): [MongoDB\BSON\Iterator](#class.mongodb-bson-iterator)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una instancia de [MongoDB\BSON\Iterator](#class.mongodb-bson-iterator) que puede ser
utilizada para iterar sobre todos los índices del array.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception) si el iterador BSON no puede ser instanciado.

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\PackedArray::has

(mongodb &gt;=1.16.0)

MongoDB\BSON\PackedArray::has — Indica si un índice está presente en el array

### Descripción

final public **MongoDB\BSON\PackedArray::has**([int](#language.types.integer) $index): [bool](#language.types.boolean)

### Parámetros

    index ([int](#language.types.integer))


      El índice a buscar en el array.


### Valores devueltos

Devuelve **[true](#constant.true)** si el índice está presente en el array, de lo contrario **[false](#constant.false)**.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\BSON\PackedArray::get()](#mongodb-bson-packedarray.get) - Devuelve el valor de un índice del array

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\PackedArray::offsetExists

(mongodb &gt;=1.17.0)

MongoDB\BSON\PackedArray::offsetExists — Indica si un índice está presente en el array

### Descripción

final public **MongoDB\BSON\PackedArray::offsetExists**([mixed](#language.types.mixed) $key): [bool](#language.types.boolean)

### Parámetros

     key


       El índice a buscar en el array.





### Valores devueltos

Devuelve **[true](#constant.true)** si el índice está presente en el array, de lo contrario **[false](#constant.false)**.

### Ver también

    - [ArrayAccess::offsetExists()](#arrayaccess.offsetexists) - Comprobar si existe un índice

    - [MongoDB\BSON\PackedArray::has()](#mongodb-bson-packedarray.has) - Indica si un índice está presente en el array

# MongoDB\BSON\PackedArray::offsetGet

(mongodb &gt;=1.17.0)

MongoDB\BSON\PackedArray::offsetGet — Devuelve el valor de un índice del array

### Descripción

final public **MongoDB\BSON\PackedArray::offsetGet**([mixed](#language.types.mixed) $key): [mixed](#language.types.mixed)

### Parámetros

     key


        El índice a recuperar del array. Solo [int](#language.types.integer) es soportado.





### Valores devueltos

Devuelve el valor asociado al índice dado. Si el índice no está
presente en el array, se lanza una excepción.

**Nota**:

    Cuando se encuentra un valor codificado como un entero de 64 bits en el array BSON,
    el valor de retorno de este método será una instancia de
    [MongoDB\BSON\Int64](#class.mongodb-bson-int64).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) si el índice no está presente en el array.

### Ver también

    - [ArrayAccess::offsetGet()](#arrayaccess.offsetget) - Offset para recuperar

    - [MongoDB\BSON\PackedArray::get()](#mongodb-bson-packedarray.get) - Devuelve el valor de un índice del array

# MongoDB\BSON\PackedArray::offsetSet

(mongodb &gt;=1.17.0)

MongoDB\BSON\PackedArray::offsetSet — Implementación de [ArrayAccess](#class.arrayaccess)

### Descripción

final public **MongoDB\BSON\PackedArray::offsetSet**([mixed](#language.types.mixed) $key, [mixed](#language.types.mixed) $value): [void](language.types.void.html)

Cambia el valor de key a value.

### Parámetros

     key


       El índice a modificar.






     value


       El nuevo valor de key.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Siempre lanza una [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception).

# MongoDB\BSON\PackedArray::offsetUnset

(mongodb &gt;=1.17.0)

MongoDB\BSON\PackedArray::offsetUnset — Implementación de [ArrayAccess](#class.arrayaccess)

### Descripción

final public **MongoDB\BSON\PackedArray::offsetUnset**([mixed](#language.types.mixed) $key): [void](language.types.void.html)

Elimina el valor en el índice dado.

### Parámetros

     key


       El valor a eliminar.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Siempre lanza una [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception).

# MongoDB\BSON\PackedArray::toCanonicalExtendedJSON

(mongodb &gt;=1.20.0)

MongoDB\BSON\PackedArray::toCanonicalExtendedJSON — Devuelve la representación JSON extendida canónica del array BSON

### Descripción

final public **MongoDB\BSON\PackedArray::toCanonicalExtendedJSON**(): [string](#language.types.string)

Convierte el array BSON en su representación
[» JSON extendida canónica](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example).
El formato canónico privilegia la fidelidad de los tipos en detrimento de la
concisión de la salida y es el más adecuado para producir una salida que
puede ser convertida en BSON sin pérdida de información de tipo (por ejemplo,
los tipos numéricos permanecerán diferenciados).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string que contiene la representación
[» JSON extendida canónica](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example)
del array BSON.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\BSON\PackedArray::toCanonicalExtendedJSON()**

    &lt;?php

$array = [
'foo',
123,
4294967295,
new MongoDB\BSON\ObjectId('56315a7c6118fd1b920270b1'),
];

$packedArray = MongoDB\BSON\PackedArray::fromPHP($array);
echo $packedArray-&gt;toCanonicalExtendedJSON(), "\n";

?&gt;

El ejemplo anterior mostrará:

    [ "foo", { "$numberInt" : "123" }, { "$numberLong" : "4294967295" }, { "$oid" : "56315a7c6118fd1b920270b1" } ]

### Ver también

- [MongoDB\BSON\PackedArray::fromJSON()](#mongodb-bson-packedarray.fromjson) - Construye una nueva instancia de array BSON a partir de un string JSON

- [MongoDB\BSON\PackedArray::toRelaxedExtendedJSON()](#mongodb-bson-packedarray.torelaxedextendedjson) - Devuelve la representación JSON extendida relajada del array BSON

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [» Especificación del JSON extendido](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md)

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\PackedArray::toPHP

(mongodb &gt;=1.16.0)

MongoDB\BSON\PackedArray::toPHP — Devuelve la representación PHP del array BSON

### Descripción

final public **MongoDB\BSON\PackedArray::toPHP**([?](#language.types.null)[array](#language.types.array) $typeMap = **[null](#constant.null)**): [array](#language.types.array)|[object](#language.types.object)

### Parámetros

typeMap ([array](#language.types.array))

        [Configuración del mapa de tipos](#mongodb.persistence.typemaps).

### Valores devueltos

El valor decodificado en PHP.

**Nota**:

    Cuando se encuentra un valor codificado como un entero de 64 bits en el array BSON,
    el valor de retorno de este método será una instancia de
    [MongoDB\BSON\Int64](#class.mongodb-bson-int64).

### Errores/Excepciones

- Lanza una
  [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si
  una clase en el type map no puede ser instanciada o no implementa
  [MongoDB\BSON\Unserializable](#class.mongodb-bson-unserializable).

### Ver también

- [MongoDB\BSON\toPHP()](#function.mongodb.bson-tophp) - Devuelve la representación PHP de un valor BSON

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\PackedArray::toRelaxedExtendedJSON

(mongodb &gt;=1.20.0)

MongoDB\BSON\PackedArray::toRelaxedExtendedJSON — Devuelve la representación JSON extendida relajada del array BSON

### Descripción

final public **MongoDB\BSON\PackedArray::toRelaxedExtendedJSON**(): [string](#language.types.string)

Convierte el array BSON en su representación
[» JSON extendida relajada](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example).
El formato relajado prefiere el uso de los tipos primitivos JSON en detrimento de la
fidelidad de los tipos y es el más adecuado para producir una salida que puede ser
fácilmente consumida por APIs web y humanos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string que contiene la representación
[» JSON extendida relajada](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example)
del array BSON.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\BSON\PackedArray::toRelaxedExtendedJSON()**

    &lt;?php

$array = [
'foo',
123,
4294967295,
new MongoDB\BSON\ObjectId('56315a7c6118fd1b920270b1'),
];

$packedArray = MongoDB\BSON\PackedArray::fromPHP($array);
echo $packedArray-&gt;toRelaxedExtendedJSON(), "\n";

?&gt;

El ejemplo anterior mostrará:

    [ "foo", 123, 4294967295, { "$oid" : "56315a7c6118fd1b920270b1" } ]

### Ver también

- [MongoDB\BSON\PackedArray::fromJSON()](#mongodb-bson-packedarray.fromjson) - Construye una nueva instancia de array BSON a partir de un string JSON

- [MongoDB\BSON\PackedArray::toCanonicalExtendedJSON()](#mongodb-bson-packedarray.tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica del array BSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» Especificación del JSON extendido](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md)

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\PackedArray::\_\_toString

(mongodb &gt;=1.16.0)

MongoDB\BSON\PackedArray::\_\_toString — Devuelve la representación en string para este array BSON

### Descripción

final public **MongoDB\BSON\PackedArray::\_\_toString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación en string de este array BSON.

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

## Tabla de contenidos

- [MongoDB\BSON\PackedArray::\_\_construct](#mongodb-bson-packedarray.construct) — Construye un nuevo array BSON (no utilizado)
- [MongoDB\BSON\PackedArray::fromJSON](#mongodb-bson-packedarray.fromjson) — Construye una nueva instancia de array BSON a partir de un string JSON
- [MongoDB\BSON\PackedArray::fromPHP](#mongodb-bson-packedarray.fromphp) — Construye una nueva instancia de array BSON a partir de datos PHP
- [MongoDB\BSON\PackedArray::get](#mongodb-bson-packedarray.get) — Devuelve el valor de un índice del array
- [MongoDB\BSON\PackedArray::getIterator](#mongodb-bson-packedarray.getiterator) — Devuelve el iterador para el array BSON
- [MongoDB\BSON\PackedArray::has](#mongodb-bson-packedarray.has) — Indica si un índice está presente en el array
- [MongoDB\BSON\PackedArray::offsetExists](#mongodb-bson-packedarray.offsetexists) — Indica si un índice está presente en el array
- [MongoDB\BSON\PackedArray::offsetGet](#mongodb-bson-packedarray.offsetget) — Devuelve el valor de un índice del array
- [MongoDB\BSON\PackedArray::offsetSet](#mongodb-bson-packedarray.offsetset) — Implementación de ArrayAccess
- [MongoDB\BSON\PackedArray::offsetUnset](#mongodb-bson-packedarray.offsetunset) — Implementación de ArrayAccess
- [MongoDB\BSON\PackedArray::toCanonicalExtendedJSON](#mongodb-bson-packedarray.tocanonicalextendedjson) — Devuelve la representación JSON extendida canónica del array BSON
- [MongoDB\BSON\PackedArray::toPHP](#mongodb-bson-packedarray.tophp) — Devuelve la representación PHP del array BSON
- [MongoDB\BSON\PackedArray::toRelaxedExtendedJSON](#mongodb-bson-packedarray.torelaxedextendedjson) — Devuelve la representación JSON extendida relajada del array BSON
- [MongoDB\BSON\PackedArray::\_\_toString](#mongodb-bson-packedarray.tostring) — Devuelve la representación en string para este array BSON

# La clase MongoDB\BSON\Iterator

(mongodb &gt;=1.16.0)

## Introducción

    Iterador utilizado para recorrer un documento o un array BSON.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\BSON\Iterator**


     implements
       [Iterator](#class.iterator) {


    /* Métodos */

final private [\_\_construct](#mongodb-bson-iterator.construct)()
public [current](#mongodb-bson-iterator.current)(): [mixed](#language.types.mixed)
public [key](#mongodb-bson-iterator.key)(): [string](#language.types.string)|[int](#language.types.integer)
public [next](#mongodb-bson-iterator.next)(): [void](language.types.void.html)
public [rewind](#mongodb-bson-iterator.rewind)(): [void](language.types.void.html)
public [valid](#mongodb-bson-iterator.valid)(): [bool](#language.types.boolean)

}

# MongoDB\BSON\Iterator::\_\_construct

(mongodb &gt;=1.16.0)

MongoDB\BSON\Iterator::\_\_construct — Construye un nuevo iterador BSON (no utilizado)

### Descripción

final private **MongoDB\BSON\Iterator::\_\_construct**()

Los objetos [MongoDB\BSON\Iterator](#class.mongodb-bson-iterator) se crean llamando a
[MongoDB\BSON\Document::getIterator()](#mongodb-bson-document.getiterator) o
[MongoDB\BSON\PackedArray::getIterator()](#mongodb-bson-packedarray.getiterator) y no pueden ser
instanciados directamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Ver también

- [MongoDB\BSON\Document::getIterator()](#mongodb-bson-document.getiterator) - Devuelve un iterador para el documento BSON

- [MongoDB\BSON\PackedArray::getIterator()](#mongodb-bson-packedarray.getiterator) - Devuelve el iterador para el array BSON

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Iterator::current

(mongodb &gt;=1.16.0)

MongoDB\BSON\Iterator::current — Devuelve el elemento actual/corriente

### Descripción

public **MongoDB\BSON\Iterator::current**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el valor del elemento actual/corriente.

**Nota**:

    Cuando un valor es codificado como un integer de 64 bits en la estructura BSON es encontrado,
    el valor de retorno de este método será una instancia de
    [MongoDB\BSON\Int64](#class.mongodb-bson-int64).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception) si el iterador no es válido.

### Ver también

- [Iterator::current()](#iterator.current) - Devuelve el elemento actual

# MongoDB\BSON\Iterator::key

(mongodb &gt;=1.16.0)

MongoDB\BSON\Iterator::key — Devuelve la clave del elemento actual/corriente

### Descripción

public **MongoDB\BSON\Iterator::key**(): [string](#language.types.string)|[int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la clave del elemento actual/corriente. Durante la iteración de un documento BSON, la
clave será siempre una [string](#language.types.string). Durante la iteración de un array BSON, la
clave será un [int](#language.types.integer).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception) si el iterador no es válido.

### Ver también

- [Iterator::key()](#iterator.key) - Devuelve la clave del elemento actual

# MongoDB\BSON\Iterator::next

(mongodb &gt;=1.16.0)

MongoDB\BSON\Iterator::next — Avance el iterador al siguiente elemento

### Descripción

public **MongoDB\BSON\Iterator::next**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Ver también

- [Iterator::next()](#iterator.next) - Avanza al siguiente elemento

# MongoDB\BSON\Iterator::rewind

(mongodb &gt;=1.16.0)

MongoDB\BSON\Iterator::rewind — Rebobina el iterador al elemento anterior

### Descripción

public **MongoDB\BSON\Iterator::rewind**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Ver también

- [Iterator::rewind()](#iterator.rewind) - Rebobine la Iterator al primer elemento

# MongoDB\BSON\Iterator::valid

(mongodb &gt;=1.16.0)

MongoDB\BSON\Iterator::valid — Verifica si la posición actual es válida

### Descripción

public **MongoDB\BSON\Iterator::valid**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la posición actual del iterador es válida, de lo contrario **[false](#constant.false)**.

### Ver también

- [Iterator::valid()](#iterator.valid) - Comprueba si la posición actual es válido

## Tabla de contenidos

- [MongoDB\BSON\Iterator::\_\_construct](#mongodb-bson-iterator.construct) — Construye un nuevo iterador BSON (no utilizado)
- [MongoDB\BSON\Iterator::current](#mongodb-bson-iterator.current) — Devuelve el elemento actual/corriente
- [MongoDB\BSON\Iterator::key](#mongodb-bson-iterator.key) — Devuelve la clave del elemento actual/corriente
- [MongoDB\BSON\Iterator::next](#mongodb-bson-iterator.next) — Avance el iterador al siguiente elemento
- [MongoDB\BSON\Iterator::rewind](#mongodb-bson-iterator.rewind) — Rebobina el iterador al elemento anterior
- [MongoDB\BSON\Iterator::valid](#mongodb-bson-iterator.valid) — Verifica si la posición actual es válida

# La clase MongoDB\BSON\Binary

(mongodb &gt;=1.0.0)

## Introducción

    Tipo BSON para datos binarios (i.e. array de bytes). Los valores binarios también tienen un subtipo, que se utiliza para indicar qué tipo de datos se encuentra en el array de bytes. Los subtipos de cero a 127 están predefinidos o reservados. Los subtipos de 128-255 son definidos por el usuario.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\BSON\Binary**


     implements
       [MongoDB\BSON\BinaryInterface](#class.mongodb-bson-binaryinterface),  [MongoDB\BSON\Type](#class.mongodb-bson-type),  [JsonSerializable](#class.jsonserializable),  [Stringable](#class.stringable) {

    /* Constantes */

     const
     [int](#language.types.integer)
      [TYPE_GENERIC](#mongodb-bson-binary.constants.type-generic) = 0;

    const
     [int](#language.types.integer)
      [TYPE_FUNCTION](#mongodb-bson-binary.constants.type-function) = 1;

    const
     [int](#language.types.integer)
      [TYPE_OLD_BINARY](#mongodb-bson-binary.constants.type-old-binary) = 2;

    const
     [int](#language.types.integer)
      [TYPE_OLD_UUID](#mongodb-bson-binary.constants.type-old-uuid) = 3;

    const
     [int](#language.types.integer)
      [TYPE_UUID](#mongodb-bson-binary.constants.type-uuid) = 4;

    const
     [int](#language.types.integer)
      [TYPE_MD5](#mongodb-bson-binary.constants.type-md5) = 5;

    const
     [int](#language.types.integer)
      [TYPE_ENCRYPTED](#mongodb-bson-binary.constants.type-encrypted) = 6;

    const
     [int](#language.types.integer)
      [TYPE_COLUMN](#mongodb-bson-binary.constants.type-column) = 7;

    const
     [int](#language.types.integer)
      [TYPE_SENSITIVE](#mongodb-bson-binary.constants.type-sensitive) = 8;

    const
     [int](#language.types.integer)
      [TYPE_USER_DEFINED](#mongodb-bson-binary.constants.type-user-defined) = 128;


    /* Métodos */

final public [\_\_construct](#mongodb-bson-binary.construct)([string](#language.types.string) $data, [int](#language.types.integer) $type = MongoDB\BSON\Binary::TYPE_GENERIC)
final public [getData](#mongodb-bson-binary.getdata)(): [string](#language.types.string)
final public [getType](#mongodb-bson-binary.gettype)(): [int](#language.types.integer)
final public [jsonSerialize](#mongodb-bson-binary.jsonserialize)(): [mixed](#language.types.mixed)
final public [\_\_toString](#mongodb-bson-binary.tostring)(): [string](#language.types.string)

}

## Constantes predefinidas

     **[MongoDB\BSON\Binary::TYPE_GENERIC](#mongodb-bson-binary.constants.type-generic)**

      Datos binarios genéricos.






     **[MongoDB\BSON\Binary::TYPE_FUNCTION](#mongodb-bson-binary.constants.type-function)**

      Función.






     **[MongoDB\BSON\Binary::TYPE_OLD_BINARY](#mongodb-bson-binary.constants.type-old-binary)**


       Datos binarios genéricos (desaconsejados en favor de **[MongoDB\BSON\Binary::TYPE_GENERIC](#mongodb-bson-binary.constants.type-generic)**).







     **[MongoDB\BSON\Binary::TYPE_OLD_UUID](#mongodb-bson-binary.constants.type-old-uuid)**


       Identificador universalmente único (desaconsejado en favor de
       **[MongoDB\BSON\Binary::TYPE_UUID](#mongodb-bson-binary.constants.type-uuid)**). Al utilizar este tipo, los datos del binario deben tener una longitud de 16 bytes.




       Históricamente, otros controladores codifican valores con este tipo según sus convenciones lingüísticas (por ejemplo, variable indianness), lo que lo hace no portable. El controlador PHP no aplica ninguna manipulación especial para codificar o decodificar datos con este tipo.







     **[MongoDB\BSON\Binary::TYPE_UUID](#mongodb-bson-binary.constants.type-uuid)**

      Identificador universalmente único. Al utilizar este tipo, los datos del binario deben tener una longitud de 16 bytes y estar codificados según [» RFC 4122](https://datatracker.ietf.org/doc/html/rfc4122).






     **[MongoDB\BSON\Binary::TYPE_MD5](#mongodb-bson-binary.constants.type-md5)**


       Hash MD5. Al utilizar este tipo, los datos del binario deben tener una longitud de 16 bytes.







     **[MongoDB\BSON\Binary::TYPE_ENCRYPTED](#mongodb-bson-binary.constants.type-encrypted)**

      Valor cifrado. Este subtipo se utiliza para el cifrado del lado del cliente.






     **[MongoDB\BSON\Binary::TYPE_COLUMN](#mongodb-bson-binary.constants.type-column)**

      Dato de columna. Este subtipo se utiliza para las colecciones de series temporales.






     **[MongoDB\BSON\Binary::TYPE_SENSITIVE](#mongodb-bson-binary.constants.type-sensitive)**


       Datos sensibles. Este subtipo se utiliza para los datos sensibles
       que deberían ser excluidos de los registros de eventos del lado del servidor si es posible.







     **[MongoDB\BSON\Binary::TYPE_USER_DEFINED](#mongodb-bson-binary.constants.type-user-defined)**


       Tipo definido por el usuario. Mientras que los tipos entre 0 y 127 están predefinidos o reservados, los tipos entre 128 y 255 son definidos por el usuario y pueden ser utilizados para cualquier cosa.





## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0


                Esta clase ya no implementa la interfaz
                [Serializable](#class.serializable).








        PECL mongodb 1.17.0

         Adición de **[MongoDB\BSON\Binary::TYPE_SENSITIVE](#mongodb-bson-binary.constants.type-sensitive)**.




        PECL mongodb 1.12.0


          Implementa [Stringable](#class.stringable) para PHP 8.0+.




          Adición de **[MongoDB\BSON\Binary::TYPE_COLUMN](#mongodb-bson-binary.constants.type-column)**.







        PECL mongodb 1.7.0

         Adición de **[MongoDB\BSON\Binary::TYPE_ENCRYPTED](#mongodb-bson-binary.constants.type-encrypted)**.




        PECL mongodb 1.3.0

         Implementa [MongoDB\BSON\BinaryInterface](#class.mongodb-bson-binaryinterface).




        PECL mongodb 1.2.0

         Implementa [Serializable](#class.serializable) y
         [JsonSerializable](#class.jsonserializable).






# MongoDB\BSON\Binary::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\BSON\Binary::\_\_construct — Construye un nuevo binario

### Descripción

final public **MongoDB\BSON\Binary::\_\_construct**([string](#language.types.string) $data, [int](#language.types.integer) $type = MongoDB\BSON\Binary::TYPE_GENERIC)

### Parámetros

    data ([string](#language.types.string))


      Los datos binarios.






    type ([int](#language.types.integer))


      Entero de 8 bits sin signo que indica el tipo de datos. Por omisión,
      el valor es **[MongoDB\BSON\Binary::TYPE_GENERIC](#mongodb-bson-binary.constants.type-generic)** si no se especifica.


### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si type no es un entero sin signo de 8 bits.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si type es **[MongoDB\BSON\Binary::TYPE_UUID](#mongodb-bson-binary.constants.type-uuid)** o **[MongoDB\BSON\Binary::TYPE_OLD_UUID](#mongodb-bson-binary.constants.type-old-uuid)** y data no tiene exactamente 16 bytes de longitud.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.15.0


         El parámetro type es ahora opcional
         y tiene el valor por omisión **[MongoDB\BSON\Binary::TYPE_GENERIC](#mongodb-bson-binary.constants.type-generic)** si no se especifica.







       PECL mongodb 1.3.0


         [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception)
         se lanza si type es
         **[MongoDB\BSON\Binary::TYPE_UUID](#mongodb-bson-binary.constants.type-uuid)** o
         **[MongoDB\BSON\Binary::TYPE_OLD_UUID](#mongodb-bson-binary.constants.type-old-uuid)** y
         data no tiene exactamente 16 bytes de longitud.







       PECL mongodb 1.1.3


         [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception)
         se lanza si type no es un entero sin signo
         de 8 bits.








### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\Binary::\_\_construct()**

&lt;?php

$binary = new MongoDB\BSON\Binary('foo', MongoDB\BSON\Binary::TYPE_GENERIC);
var_dump($binary);

?&gt;

El ejemplo anterior mostrará:

object(MongoDB\BSON\Binary)#1 (2) {
["data"]=&gt;
string(3) "foo"
["type"]=&gt;
int(0)
}

### Ver también

- [» Los tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Binary::getData

(mongodb &gt;=1.0.0)

MongoDB\BSON\Binary::getData — Devuelve los datos de Binary

### Descripción

final public **MongoDB\BSON\Binary::getData**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve los datos de Binary.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\Binary::getData()**

&lt;?php

$binary = new MongoDB\BSON\Binary('foo', MongoDB\BSON\Binary::TYPE_GENERIC);
var_dump($binary-&gt;getData());

?&gt;

El ejemplo anterior mostrará:

string(3) "foo"

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Binary::getType

(mongodb &gt;=1.0.0)

MongoDB\BSON\Binary::getType — Devuelve el tipo de Binary

### Descripción

final public **MongoDB\BSON\Binary::getType**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tipo de Binary.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\Binary::getType()**

&lt;?php

$binary = new MongoDB\BSON\Binary('foo', MongoDB\BSON\Binary::TYPE_GENERIC);
var_dump($binary-&gt;getType());

?&gt;

El ejemplo anterior mostrará:

int(0)

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Binary::jsonSerialize

(mongodb &gt;=1.2.0)

MongoDB\BSON\Binary::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

final public **MongoDB\BSON\Binary::jsonSerialize**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve datos que pueden ser serializados por [json_encode()](#function.json-encode)
para producir una representación JSON extendida de
[MongoDB\BSON\Binary](#class.mongodb-bson-binary).

**Nota**:

La salida es coherente con la función [MongoDB\BSON\toJSON()](#function.mongodb.bson-tojson),
que utiliza el formato JSON extendido específico del controlador. Esto no corresponde
necesariamente a las representaciones JSON extendidas
[» relajadas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example)
o [» canónicas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example)
utilizadas por [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) y
[MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson), respectivamente.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize) - Especifica los datos que deben ser serializados en JSON

- [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» MongoDB JSON Extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

# MongoDB\BSON\Binary::\_\_toString

(mongodb &gt;=1.2.0)

MongoDB\BSON\Binary::\_\_toString — Devuelve los datos de Binary

### Descripción

final public **MongoDB\BSON\Binary::\_\_toString**(): [string](#language.types.string)

Este método es un alias de: [MongoDB\BSON\Binary::getData()](#mongodb-bson-binary.getdata).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve los datos de Binary.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\Binary::\_\_toString()**

&lt;?php

var_dump((string) new MongoDB\BSON\Binary('foo', MongoDB\BSON\Binary::TYPE_GENERIC));

?&gt;

El ejemplo anterior mostrará:

string(3) "foo"

### Ver también

- [MongoDB\BSON\Binary::getData()](#mongodb-bson-binary.getdata) - Devuelve los datos de Binary

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

## Tabla de contenidos

- [MongoDB\BSON\Binary::\_\_construct](#mongodb-bson-binary.construct) — Construye un nuevo binario
- [MongoDB\BSON\Binary::getData](#mongodb-bson-binary.getdata) — Devuelve los datos de Binary
- [MongoDB\BSON\Binary::getType](#mongodb-bson-binary.gettype) — Devuelve el tipo de Binary
- [MongoDB\BSON\Binary::jsonSerialize](#mongodb-bson-binary.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [MongoDB\BSON\Binary::\_\_toString](#mongodb-bson-binary.tostring) — Devuelve los datos de Binary

# La clase MongoDB\BSON\Decimal128

(mongodb &gt;=1.2.0)

## Introducción

    Tipo BSON para el
    [» formato de coma flotante Decimal128](https://en.wikipedia.org/wiki/Decimal128_floating-point_format),
    que soporta números con hasta 34 dígitos decimales (i.e. dígitos
    significativos) y un rango de exponentes de −6143 a +6144.




    A diferencia del tipo BSON double (i.e. [float](#language.types.float) en PHP), que solo
    almacena una aproximación de los valores decimales, el tipo de datos decimal almacena
    el valor exacto. Por ejemplo, MongoDB\BSON\Decimal128('9.99')
    tiene un valor preciso de 9.99 mientras que un double 9.99 tendría un valor
    aproximado de 9.9900000000000002131628….

**Nota**:

    **MongoDB\BSON\Decimal128** solo es compatible con
    MongoDB 3.4+. Si se intenta utilizar el tipo BSON con una versión antigua
    de MongoDB, se emitirá un error.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\BSON\Decimal128**


     implements
       [MongoDB\BSON\Decimal128Interface](#class.mongodb-bson-decimal128interface),  [MongoDB\BSON\Type](#class.mongodb-bson-type),  [JsonSerializable](#class.jsonserializable),  [Stringable](#class.stringable) {


    /* Métodos */

final public [\_\_construct](#mongodb-bson-decimal128.construct)([string](#language.types.string) $value)
final public [jsonSerialize](#mongodb-bson-decimal128.jsonserialize)(): [mixed](#language.types.mixed)
final public [\_\_toString](#mongodb-bson-decimal128.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0


                Esta clase ya no implementa la interfaz
                [Serializable](#class.serializable).








        PECL mongodb 1.12.0

         Implementa [Stringable](#class.stringable) para PHP 8.0+.




        PECL mongodb 1.3.0

         Implementa [MongoDB\BSON\Decimal128Interface](#class.mongodb-bson-decimal128interface).




        PECL mongodb 1.2.0

         Implementa [Serializable](#class.serializable) y
         [JsonSerializable](#class.jsonserializable).






# MongoDB\BSON\Decimal128::\_\_construct

(mongodb &gt;=1.2.0)

MongoDB\BSON\Decimal128::\_\_construct — Construye un nuevo Decimal128

### Descripción

final public **MongoDB\BSON\Decimal128::\_\_construct**([string](#language.types.string) $value)

**Nota**:

    [MongoDB\BSON\Decimal128](#class.mongodb-bson-decimal128) solo es compatible con
    MongoDB 3.4+. Si se intenta utilizar el tipo BSON con una versión antigua
    de MongoDB, se emitirá un error.

### Parámetros

    value ([string](#language.types.string))


      Una cadena decimal


### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si value no es una cadena decimal válida.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\Decimal128::\_\_construct()**

&lt;?php

var_dump(new MongoDB\BSON\Decimal128(1234.5678));
var_dump(new MongoDB\BSON\Decimal128(NAN));
var_dump(new MongoDB\BSON\Decimal128(INF));

?&gt;

Resultado del ejemplo anterior es similar a:

object(MongoDB\BSON\Decimal128)#1 (1) {
["dec"]=&gt;
string(9) "1234.5678"
}
object(MongoDB\BSON\Decimal128)#1 (1) {
["dec"]=&gt;
string(3) "NaN"
}
object(MongoDB\BSON\Decimal128)#1 (1) {
["dec"]=&gt;
string(8) "Infinity"
}

### Ver también

- [» Formato de coma flotante Decimal128](https://en.wikipedia.org/wiki/Decimal128_floating-point_format)

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Decimal128::jsonSerialize

(mongodb &gt;=1.2.0)

MongoDB\BSON\Decimal128::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

final public **MongoDB\BSON\Decimal128::jsonSerialize**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve datos que pueden ser serializados por [json_encode()](#function.json-encode)
para producir una representación JSON extendida de
[MongoDB\BSON\Decimal128](#class.mongodb-bson-decimal128).

**Nota**:

La salida es coherente con la función [MongoDB\BSON\toJSON()](#function.mongodb.bson-tojson),
que utiliza el formato JSON extendido específico del controlador. Esto no corresponde
necesariamente a las representaciones JSON extendidas
[» relajadas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example)
o [» canónicas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example)
utilizadas por [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) y
[MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson), respectivamente.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize) - Especifica los datos que deben ser serializados en JSON

- [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» MongoDB JSON Extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

# MongoDB\BSON\Decimal128::\_\_toString

(mongodb &gt;=1.2.0)

MongoDB\BSON\Decimal128::\_\_toString — Devuelve la representación en forma de string de Decimal128

### Descripción

final public **MongoDB\BSON\Decimal128::\_\_toString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación en forma de string de Decimal128.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\Decimal128::\_\_toString()**

&lt;?php

var_dump((string) new MongoDB\BSON\Decimal128(1234.5678));
var_dump((string) new MongoDB\BSON\Decimal128(NAN));
var_dump((string) new MongoDB\BSON\Decimal128(INF));

?&gt;

Resultado del ejemplo anterior es similar a:

string(9) "1234.5678"
string(3) "NaN"
string(8) "Infinity"

### Ver también

- [» Formato de coma flotante Decimal128](https://en.wikipedia.org/wiki/Decimal128_floating-point_format)

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

## Tabla de contenidos

- [MongoDB\BSON\Decimal128::\_\_construct](#mongodb-bson-decimal128.construct) — Construye un nuevo Decimal128
- [MongoDB\BSON\Decimal128::jsonSerialize](#mongodb-bson-decimal128.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [MongoDB\BSON\Decimal128::\_\_toString](#mongodb-bson-decimal128.tostring) — Devuelve la representación en forma de string de Decimal128

# La clase MongoDB\BSON\Javascript

(mongodb &gt;=1.0.0)

## Introducción

    Tipo BSON para el código JavaScript. Un documento de ámbito opcional puede
    ser especificado que mapea los identificadores a los valores y define el ámbito
    en el cual el código debe ser evaluado por el servidor.

**Nota**:

     Este tipo BSON es principalmente utilizado durante la ejecución de comandos
     de base de datos que toman una función JavaScript como argumento, tal como
     [» mapReduce](https://www.mongodb.com/docs/manual/reference/command/mapReduce/).

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\BSON\Javascript**


     implements
       [MongoDB\BSON\JavascriptInterface](#class.mongodb-bson-javascriptinterface),  [MongoDB\BSON\Type](#class.mongodb-bson-type),  [JsonSerializable](#class.jsonserializable),  [Stringable](#class.stringable) {


    /* Métodos */

final public [\_\_construct](#mongodb-bson-javascript.construct)([string](#language.types.string) $code, [array](#language.types.array)|[object](#language.types.object)|[null](#language.types.null) $scope = **[null](#constant.null)**)
final public [getCode](#mongodb-bson-javascript.getcode)(): [string](#language.types.string)
final public [getScope](#mongodb-bson-javascript.getscope)(): [?](#language.types.null)[object](#language.types.object)
final public [jsonSerialize](#mongodb-bson-javascript.jsonserialize)(): [mixed](#language.types.mixed)
final public [\_\_toString](#mongodb-bson-javascript.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0


                Esta clase ya no implementa la interfaz
                [Serializable](#class.serializable).








        PECL mongodb 1.12.0

         Implementa [Stringable](#class.stringable) para PHP 8.0+.




        PECL mongodb 1.3.0

         Implementa [MongoDB\BSON\JavascriptInterface](#class.mongodb-bson-javascriptinterface).




        PECL mongodb 1.2.0

         Implementa [Serializable](#class.serializable) y
         [JsonSerializable](#class.jsonserializable).






# MongoDB\BSON\Javascript::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\BSON\Javascript::\_\_construct — Construye un nuevo objeto Javascript

### Descripción

final public **MongoDB\BSON\Javascript::\_\_construct**([string](#language.types.string) $code, [array](#language.types.array)|[object](#language.types.object)|[null](#language.types.null) $scope = **[null](#constant.null)**)

### Parámetros

    code ([string](#language.types.string))


      El código Javascript.






    scope ([array](#language.types.array)|[object](#language.types.object))


      El ámbito del Javascript.


### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si code contiene un byte nulo.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.2.0


         [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception)
         se lanza si code contiene un byte nulo.
         Anteriormente, los valores eran truncados en el primer byte nulo.








### Ejemplos

**Ejemplo #1 MongoDB\BSON\Javascript::\_\_construct()** example

&lt;?php

$code = new MongoDB\BSON\Javascript('function() { return 1; }');
var_dump($code);

$codews = new MongoDB\BSON\Javascript('function() { return foo; }', ['foo' =&gt; 'bar']);
var_dump($codews);

?&gt;

El ejemplo anterior mostrará:

object(MongoDB\BSON\Javascript)#1 (2) {
["javascript"]=&gt;
string(24) "function() { return 1; }"
["scope"]=&gt;
object(stdClass)#2 (0) {
}
}
object(MongoDB\BSON\Javascript)#2 (2) {
["javascript"]=&gt;
string(26) "function() { return foo; }"
["scope"]=&gt;
object(stdClass)#1 (1) {
["foo"]=&gt;
string(3) "bar"
}
}

### Ver también

- [» Los tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Javascript::getCode

(mongodb &gt;=1.2.0)

MongoDB\BSON\Javascript::getCode — Devuelve el código Javascript

### Descripción

final public **MongoDB\BSON\Javascript::getCode**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el código Javascript.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\Javascript::getCode()**

&lt;?php

$js = new MongoDB\BSON\Javascript('function foo(bar) { return bar; }');
var_dump($js-&gt;getCode());

?&gt;

El ejemplo anterior mostrará:

string(33) "function foo(bar) { return bar; }"

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Javascript::getScope

(mongodb &gt;=1.2.0)

MongoDB\BSON\Javascript::getScope — Devuelve el documento de ámbito de Javascript

### Descripción

final public **MongoDB\BSON\Javascript::getScope**(): [?](#language.types.null)[object](#language.types.object)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el documento de ámbito de Javascript, o **[null](#constant.null)** si no tiene ámbito.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\Javascript::getScope()**

&lt;?php

$js = new MongoDB\BSON\Javascript('function foo(bar) { return bar; }');
var_dump($js-&gt;getScope());

$js = new MongoDB\BSON\Javascript('function foo() { return foo; }', ['foo' =&gt; 42]);
var_dump($js-&gt;getScope());

?&gt;

El ejemplo anterior mostrará:

NULL
object(stdClass)#1 (1) {
["foo"]=&gt;
int(42)
}

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Javascript::jsonSerialize

(mongodb &gt;=1.2.0)

MongoDB\BSON\Javascript::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

final public **MongoDB\BSON\Javascript::jsonSerialize**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve datos que pueden ser serializados por [json_encode()](#function.json-encode)
para producir una representación JSON extendida de
[MongoDB\BSON\Javascript](#class.mongodb-bson-javascript).

**Nota**:

La salida es coherente con la función [MongoDB\BSON\toJSON()](#function.mongodb.bson-tojson),
que utiliza el formato JSON extendido específico del controlador. Esto no corresponde
necesariamente a las representaciones JSON extendidas
[» relajadas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example)
o [» canónicas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example)
utilizadas por [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) y
[MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson), respectivamente.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize) - Especifica los datos que deben ser serializados en JSON

- [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» MongoDB JSON Extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

# MongoDB\BSON\Javascript::\_\_toString

(mongodb &gt;=1.2.0)

MongoDB\BSON\Javascript::\_\_toString — Devuelve el código Javascript

### Descripción

final public **MongoDB\BSON\Javascript::\_\_toString**(): [string](#language.types.string)

Este método es un alias de: [MongoDB\BSON\Javascript::getCode()](#mongodb-bson-javascript.getcode).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el código Javascript.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\Javascript::\_\_toString()**

&lt;?php

var_dump((string) new MongoDB\BSON\Javascript('function foo(bar) { return bar; }'));

?&gt;

El ejemplo anterior mostrará:

string(33) "function foo(bar) { return bar; }"

### Ver también

- [MongoDB\BSON\Javascript::getCode()](#mongodb-bson-javascript.getcode) - Devuelve el código Javascript

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

## Tabla de contenidos

- [MongoDB\BSON\Javascript::\_\_construct](#mongodb-bson-javascript.construct) — Construye un nuevo objeto Javascript
- [MongoDB\BSON\Javascript::getCode](#mongodb-bson-javascript.getcode) — Devuelve el código Javascript
- [MongoDB\BSON\Javascript::getScope](#mongodb-bson-javascript.getscope) — Devuelve el documento de ámbito de Javascript
- [MongoDB\BSON\Javascript::jsonSerialize](#mongodb-bson-javascript.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [MongoDB\BSON\Javascript::\_\_toString](#mongodb-bson-javascript.tostring) — Devuelve el código Javascript

# La clase MongoDB\BSON\MaxKey

(mongodb &gt;=1.0.0)

## Introducción

     Tipo BSON especial que compara el valor más grande posible de todos los
     otros valores de elementos BSON posibles.

**Nota**:

     Se trata de un tipo interno de MongoDB utilizado para la indexación y la
     desfragmentación.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\BSON\MaxKey**


     implements
       [MongoDB\BSON\MaxKeyInterface](#class.mongodb-bson-maxkeyinterface),  [MongoDB\BSON\Type](#class.mongodb-bson-type),  [JsonSerializable](#class.jsonserializable) {


    /* Métodos */

final public [\_\_construct](#mongodb-bson-maxkey.construct)()
final public [jsonSerialize](#mongodb-bson-maxkey.jsonserialize)(): [mixed](#language.types.mixed)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0


                Esta clase ya no implementa la interfaz
                [Serializable](#class.serializable).








        PECL mongodb 1.3.0

         Implementa [MongoDB\BSON\MaxKeyInterface](#class.mongodb-bson-maxkeyinterface).




        PECL mongodb 1.2.0

         Implementa [Serializable](#class.serializable) y
         [JsonSerializable](#class.jsonserializable).






# MongoDB\BSON\MaxKey::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\BSON\MaxKey::\_\_construct — Construye un nuevo MaxKey

### Descripción

final public **MongoDB\BSON\MaxKey::\_\_construct**()

### Parámetros

Esta función no contiene ningún parámetro.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\MaxKey::\_\_construct()**

&lt;?php

var_dump(new MongoDB\BSON\MaxKey());

?&gt;

El ejemplo anterior mostrará:

object(MongoDB\BSON\MaxKey)#1 (0) {
}

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\MaxKey::jsonSerialize

(mongodb &gt;=1.2.0)

MongoDB\BSON\MaxKey::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

final public **MongoDB\BSON\MaxKey::jsonSerialize**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve datos que pueden ser serializados por [json_encode()](#function.json-encode)
para producir una representación JSON extendida de
[MongoDB\BSON\MaxKey](#class.mongodb-bson-maxkey).

**Nota**:

La salida es coherente con la función [MongoDB\BSON\toJSON()](#function.mongodb.bson-tojson),
que utiliza el formato JSON extendido específico del controlador. Esto no corresponde
necesariamente a las representaciones JSON extendidas
[» relajadas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example)
o [» canónicas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example)
utilizadas por [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) y
[MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson), respectivamente.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize) - Especifica los datos que deben ser serializados en JSON

- [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» MongoDB JSON Extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

## Tabla de contenidos

- [MongoDB\BSON\MaxKey::\_\_construct](#mongodb-bson-maxkey.construct) — Construye un nuevo MaxKey
- [MongoDB\BSON\MaxKey::jsonSerialize](#mongodb-bson-maxkey.jsonserialize) — Devuelve una representación que puede ser convertida en JSON

# La clase MongoDB\BSON\MinKey

(mongodb &gt;=1.0.0)

## Introducción

    Tipo BSON especial que compara el valor más pequeño posible de todos los demás valores de elementos BSON posibles.

**Nota**:

     Se trata de un tipo interno de MongoDB utilizado para la indexación y la desfragmentación.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\BSON\MinKey**


     implements
       [MongoDB\BSON\MinKeyInterface](#class.mongodb-bson-minkeyinterface),  [MongoDB\BSON\Type](#class.mongodb-bson-type),  [JsonSerializable](#class.jsonserializable) {


    /* Métodos */

final public [\_\_construct](#mongodb-bson-minkey.construct)()
final public [jsonSerialize](#mongodb-bson-minkey.jsonserialize)(): [mixed](#language.types.mixed)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0


                Esta clase ya no implementa la interfaz
                [Serializable](#class.serializable).








        PECL mongodb 1.3.0

         Implementa [MongoDB\BSON\MinKeyInterface](#class.mongodb-bson-minkeyinterface).




        PECL mongodb 1.2.0

         Implementa [Serializable](#class.serializable) y
         [JsonSerializable](#class.jsonserializable).






# MongoDB\BSON\MinKey::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\BSON\MinKey::\_\_construct — Construye un nuevo MinKey

### Descripción

final public **MongoDB\BSON\MinKey::\_\_construct**()

### Parámetros

Esta función no contiene ningún parámetro.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\MinKey::\_\_construct()**

&lt;?php

var_dump(new MongoDB\BSON\MinKey());

?&gt;

El ejemplo anterior mostrará:

object(MongoDB\BSON\MinKey)#1 (0) {
}

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\MinKey::jsonSerialize

(mongodb &gt;=1.2.0)

MongoDB\BSON\MinKey::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

final public **MongoDB\BSON\MinKey::jsonSerialize**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve datos que pueden ser serializados por [json_encode()](#function.json-encode)
para producir una representación JSON extendida de
[MongoDB\BSON\MinKey](#class.mongodb-bson-minkey).

**Nota**:

La salida es coherente con la función [MongoDB\BSON\toJSON()](#function.mongodb.bson-tojson),
que utiliza el formato JSON extendido específico del controlador. Esto no corresponde
necesariamente a las representaciones JSON extendidas
[» relajadas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example)
o [» canónicas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example)
utilizadas por [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) y
[MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson), respectivamente.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize) - Especifica los datos que deben ser serializados en JSON

- [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» MongoDB JSON Extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

## Tabla de contenidos

- [MongoDB\BSON\MinKey::\_\_construct](#mongodb-bson-minkey.construct) — Construye un nuevo MinKey
- [MongoDB\BSON\MinKey::jsonSerialize](#mongodb-bson-minkey.jsonserialize) — Devuelve una representación que puede ser convertida en JSON

# La clase MongoDB\BSON\ObjectId

(mongodb &gt;=1.0.0)

## Introducción

    Tipo BSON para un
    [» ObjectId](https://www.mongodb.com/docs/manual/reference/bson-types/#objectid). El
    valor se compone de 12 bytes, donde los primeros cuatro bytes son un
    timestamp que refleja la creación del ObjectId. Más precisamente,
    el valor se compone de :




    - un valor de 4 bytes representando los segundos desde la época UNIX,

    - un número aleatorio de 5 bytes único a una máquina y un proceso, y

    - un contador de 3 bytes, comenzando por un valor aleatorio.



    En MongoDB, cada documento almacenado en una colección requiere un campo
    _id único que actúa como clave primaria. Si un documento
    insertado omite el campo _id, la extensión genera
    automáticamente un ObjectId para el campo _id.




    El uso de ObjectId para el campo _id proporciona las
    siguientes ventajas adicionales:




    -
     La hora de creación del ObjectId puede ser accedida utilizando el método
     [MongoDB\BSON\ObjectId::getTimestamp()](#mongodb-bson-objectid.gettimestamp).


    -
     La ordenación en un campo _id que almacena valores ObjectId
     equivale aproximadamente a la ordenación por fecha de creación.


## Sinopsis de la Clase

    ****



     final

      class **MongoDB\BSON\ObjectId**


     implements
       [MongoDB\BSON\ObjectIdInterface](#class.mongodb-bson-objectidinterface),  [MongoDB\BSON\Type](#class.mongodb-bson-type),  [JsonSerializable](#class.jsonserializable),  [Stringable](#class.stringable) {


    /* Métodos */

final public [\_\_construct](#mongodb-bson-objectid.construct)([?](#language.types.null)[string](#language.types.string) $id = **[null](#constant.null)**)
final public [getTimestamp](#mongodb-bson-objectid.gettimestamp)(): [int](#language.types.integer)
final public [jsonSerialize](#mongodb-bson-objectid.jsonserialize)(): [mixed](#language.types.mixed)
final public [\_\_toString](#mongodb-bson-objectid.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0


                Esta clase ya no implementa la interfaz
                [Serializable](#class.serializable).








        PECL mongodb 1.12.0

         Implementa [Stringable](#class.stringable) para PHP 8.0+.




        PECL mongodb 1.3.0


          Renombrado de MongoDB\BSON\ObjectID a
          MongoDB\BSON\ObjectId.




          Implementa [MongoDB\BSON\ObjectIdInterface](#class.mongodb-bson-objectidinterface).







        PECL mongodb 1.2.0

         Implementa [Serializable](#class.serializable) y
         [JsonSerializable](#class.jsonserializable).






# MongoDB\BSON\ObjectId::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\BSON\ObjectId::\_\_construct — Construye un nuevo ObjectId

### Descripción

final public **MongoDB\BSON\ObjectId::\_\_construct**([?](#language.types.null)[string](#language.types.string) $id = **[null](#constant.null)**)

### Parámetros

    id ([string](#language.types.string))


      Una cadena hexadecimal de 24 caracteres. Si no se proporciona, la extensión generará un ObjectId.


### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception)
  si id no es una cadena hexadecimal de 24 caracteres.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\ObjectId::\_\_construct()**

&lt;?php

var_dump(new MongoDB\BSON\ObjectId());

var_dump(new MongoDB\BSON\ObjectId('000000000000000000000001'));

?&gt;

Resultado del ejemplo anterior es similar a:

object(MongoDB\BSON\ObjectId)#1 (1) {
["oid"]=&gt;
string(24) "56732d3dda14d81214634921"
}
object(MongoDB\BSON\ObjectId)#1 (1) {
["oid"]=&gt;
string(24) "000000000000000000000001"
}

### Ver también

- [» La referencia ObjectId](https://www.mongodb.com/docs/manual/reference/bson-types/#objectid)

- [» El tipo BSON : ObjectId](https://www.mongodb.com/docs/manual/reference/bson-types/#objectid)

# MongoDB\BSON\ObjectId::getTimestamp

(mongodb &gt;=1.2.0)

MongoDB\BSON\ObjectId::getTimestamp — Devuelve el componente de timestamp de ObjectId

### Descripción

final public **MongoDB\BSON\ObjectId::getTimestamp**(): [int](#language.types.integer)

El componente de timestamp de un ObjectId son sus 32 bits más significativos,
que denotan el número de segundos desde el epoch Unix. Este valor se lee como
un entero de 32 bits sin signo con un orden de bytes big-endian.

**Nota**:

Dado que el tipo entero de PHP es firmado, algunos valores
devueltos por este método pueden aparecer como enteros negativos
en las plataformas de 32 bits. El formateador "%u" de
[sprintf()](#function.sprintf) puede ser utilizado para obtener una
representación en forma de string del valor decimal no firmado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el componente de timestamp de ObjectId.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\ObjectId::getTimestamp()**

&lt;?php

var_dump((new MongoDB\BSON\ObjectId())-&gt;getTimestamp());

var_dump((new MongoDB\BSON\ObjectId('0000002a0000000000000000'))-&gt;getTimestamp());

?&gt;

Resultado del ejemplo anterior es similar a:

integer(1484854719)
integer(42)

### Ver también

- [» Referencia ObjectId](https://www.mongodb.com/docs/manual/reference/bson-types/#objectid)

- [» Tipos BSON : ObjectId](https://www.mongodb.com/docs/manual/reference/bson-types/#objectid)

# MongoDB\BSON\ObjectId::jsonSerialize

(mongodb &gt;=1.2.0)

MongoDB\BSON\ObjectId::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

final public **MongoDB\BSON\ObjectId::jsonSerialize**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve datos que pueden ser serializados por [json_encode()](#function.json-encode)
para producir una representación JSON extendida de
[MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid).

**Nota**:

La salida es coherente con la función [MongoDB\BSON\toJSON()](#function.mongodb.bson-tojson),
que utiliza el formato JSON extendido específico del controlador. Esto no corresponde
necesariamente a las representaciones JSON extendidas
[» relajadas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example)
o [» canónicas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example)
utilizadas por [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) y
[MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson), respectivamente.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize) - Especifica los datos que deben ser serializados en JSON

- [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» MongoDB JSON Extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

# MongoDB\BSON\ObjectId::\_\_toString

(mongodb &gt;=1.0.0)

MongoDB\BSON\ObjectId::\_\_toString — Devuelve la representación hexadecimal de este ObjectId

### Descripción

final public **MongoDB\BSON\ObjectId::\_\_toString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación hexadecimal de este ObjectId.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\ObjectId::\_\_toString()**

&lt;?php

var_dump((string) new MongoDB\BSON\ObjectId());
var_dump((string) new MongoDB\BSON\ObjectId('000000000000000000000001'));

?&gt;

Resultado del ejemplo anterior es similar a:

string(24) "56731b49da14d8747d701211"
string(24) "000000000000000000000001"

### Ver también

- [» La referencia ObjectId](https://www.mongodb.com/docs/manual/reference/bson-types/#objectid)

- [» El tipo BSON : ObjectId](https://www.mongodb.com/docs/manual/reference/bson-types/#objectid)

## Tabla de contenidos

- [MongoDB\BSON\ObjectId::\_\_construct](#mongodb-bson-objectid.construct) — Construye un nuevo ObjectId
- [MongoDB\BSON\ObjectId::getTimestamp](#mongodb-bson-objectid.gettimestamp) — Devuelve el componente de timestamp de ObjectId
- [MongoDB\BSON\ObjectId::jsonSerialize](#mongodb-bson-objectid.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [MongoDB\BSON\ObjectId::\_\_toString](#mongodb-bson-objectid.tostring) — Devuelve la representación hexadecimal de este ObjectId

# La clase MongoDB\BSON\Regex

(mongodb &gt;=1.0.0)

## Introducción

    Tipo BSON para un patrón de expresión regular y
    [» flag](https://www.mongodb.com/docs/manual/reference/operator/query/regex/#op._S_options) opcional.

**Nota**:

     Este tipo BSON se utiliza principalmente durante la consulta de la base
     de datos. Alternativamente, el operador de consulta
     [» $regex](https://www.mongodb.com/docs/manual/reference/operator/query/regex)
     puede ser utilizado.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\BSON\Regex**


     implements
       [MongoDB\BSON\RegexInterface](#class.mongodb-bson-regexinterface),  [MongoDB\BSON\Type](#class.mongodb-bson-type),  [JsonSerializable](#class.jsonserializable),  [Stringable](#class.stringable) {


    /* Métodos */

final public [\_\_construct](#mongodb-bson-regex.construct)([string](#language.types.string) $pattern, [string](#language.types.string) $flags = "")
final public [getFlags](#mongodb-bson-regex.getflags)(): [string](#language.types.string)
final public [getPattern](#mongodb-bson-regex.getpattern)(): [string](#language.types.string)
final public [jsonSerialize](#mongodb-bson-regex.jsonserialize)(): [mixed](#language.types.mixed)
final public [\_\_toString](#mongodb-bson-regex.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0


                Esta clase ya no implementa la interfaz
                [Serializable](#class.serializable).








        PECL mongodb 1.12.0

         Implementa [Stringable](#class.stringable) para PHP 8.0+.




        PECL mongodb 1.3.0

         Implementa [MongoDB\BSON\RegexInterface](#class.mongodb-bson-regexinterface).




        PECL mongodb 1.2.0

         Implementa [Serializable](#class.serializable) y
         [JsonSerializable](#class.jsonserializable).






# MongoDB\BSON\Regex::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\BSON\Regex::\_\_construct — Construye una nueva REGEX

### Descripción

final public **MongoDB\BSON\Regex::\_\_construct**([string](#language.types.string) $pattern, [string](#language.types.string) $flags = "")

### Parámetros

    pattern ([string](#language.types.string))


      La máscara de la expresión regular.



     **Nota**:

       La máscara no debe estar rodeada de caracteres delimitadores.







    flags ([string](#language.types.string))


      Los [» 
      flags de la expresión regular](https://www.mongodb.com/docs/manual/reference/operator/query/regex/#op._S_options).


### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una excepción [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si pattern o flags contiene un byte nulo.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.2.0


         El argumento flags es opcional y el valor por omisión es una cadena vacía.




         Los caracteres en el argumento flags serán ordenados alfabéticamente cuando se construya una Regex. Anteriormente, los caracteres se almacenaban en el orden proporcionado.




         [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception)
         es lanzada si pattern o
         flags contiene un byte nulo. Anteriormente, los valores eran truncados en el primer byte nulo.








### Ejemplos

**Ejemplo #1 MongoDB\BSON\Regex::\_\_construct()** ejemplo

&lt;?php

$regex = new MongoDB\BSON\Regex('^foo', 'i');
var_dump($regex);

?&gt;

El ejemplo anterior mostrará:

object(MongoDB\BSON\Regex)#1 (2) {
["pattern"]=&gt;
string(4) "^foo"
["flags"]=&gt;
string(1) "i"
}

### Ver también

- [» Los tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

- [» Los flags soportados
  para las expresiones regulares](https://www.mongodb.com/docs/manual/reference/operator/query/regex/#op._S_options)

# MongoDB\BSON\Regex::getFlags

(mongodb &gt;=1.0.0)

MongoDB\BSON\Regex::getFlags — Devuelve los flags de la REGEX

### Descripción

final public **MongoDB\BSON\Regex::getFlags**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve los flags de la REGEX.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con BSON\Regex::getFlags()**

&lt;?php

$regex = new MongoDB\BSON\Regex('regex', 'i');
var_dump($regex-&gt;getFlags());

?&gt;

Resultado del ejemplo anterior es similar a:

string(1) "i"

### Ver también

- [» Los tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

- [» Los flags soportados
  de las expresiones regulares](https://www.mongodb.com/docs/manual/reference/operator/query/regex/#op._S_options)

# MongoDB\BSON\Regex::getPattern

(mongodb &gt;=1.0.0)

MongoDB\BSON\Regex::getPattern — Devuelve la máscara del REGEX

### Descripción

final public **MongoDB\BSON\Regex::getPattern**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la máscara del REGEX.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con BSON\Regex::getPattern()**

&lt;?php

$regex = new MongoDB\BSON\Regex('regex', 'i');
var_dump($regex-&gt;getPattern());

?&gt;

Resultado del ejemplo anterior es similar a:

string(5) "regex"

### Ver también

- [» Los tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Regex::jsonSerialize

(mongodb &gt;=1.2.0)

MongoDB\BSON\Regex::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

final public **MongoDB\BSON\Regex::jsonSerialize**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve datos que pueden ser serializados por [json_encode()](#function.json-encode)
para producir una representación JSON extendida de
[MongoDB\BSON\Regex](#class.mongodb-bson-regex).

**Nota**:

La salida es coherente con la función [MongoDB\BSON\toJSON()](#function.mongodb.bson-tojson),
que utiliza el formato JSON extendido específico del controlador. Esto no corresponde
necesariamente a las representaciones JSON extendidas
[» relajadas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example)
o [» canónicas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example)
utilizadas por [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) y
[MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson), respectivamente.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize) - Especifica los datos que deben ser serializados en JSON

- [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» MongoDB JSON Extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

# MongoDB\BSON\Regex::\_\_toString

(mongodb &gt;=1.0.0)

MongoDB\BSON\Regex::\_\_toString — Devuelve el string que representa esta REGEX

### Descripción

final public **MongoDB\BSON\Regex::\_\_toString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el string que representa esta REGEX.

### Ejemplos

**Ejemplo #1 Ejemplo con BSON\Regex::\_\_toString()**

&lt;?php

$regex = new MongoDB\BSON\Regex('regex', 'i');
var_dump((string) $regex);

?&gt;

Resultado del ejemplo anterior es similar a:

string(8) "/regex/i"

### Ver también

- [» Los tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

## Tabla de contenidos

- [MongoDB\BSON\Regex::\_\_construct](#mongodb-bson-regex.construct) — Construye una nueva REGEX
- [MongoDB\BSON\Regex::getFlags](#mongodb-bson-regex.getflags) — Devuelve los flags de la REGEX
- [MongoDB\BSON\Regex::getPattern](#mongodb-bson-regex.getpattern) — Devuelve la máscara del REGEX
- [MongoDB\BSON\Regex::jsonSerialize](#mongodb-bson-regex.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [MongoDB\BSON\Regex::\_\_toString](#mongodb-bson-regex.tostring) — Devuelve el string que representa esta REGEX

# La clase MongoDB\BSON\Timestamp

(mongodb &gt;=1.0.0)

## Introducción

    Representa un
    [» horodatage BSON](https://www.mongodb.com/docs/manual/reference/bson-types/#timestamps),
    el valor se compone de un horodatage de 4 bytes (i.e. segundos desde
    la época) y un incremento de 4 bytes.

**Nota**:

     Se trata de un tipo interno de MongoDB utilizado para la replicación y la
     fragmentación. No está previsto para el almacenamiento de fechas generales
     ([MongoDB\BSON\UTCDateTime](#class.mongodb-bson-utcdatetime) debe ser utilizado en su lugar).

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\BSON\Timestamp**


     implements
       [MongoDB\BSON\TimestampInterface](#class.mongodb-bson-timestampinterface),  [MongoDB\BSON\Type](#class.mongodb-bson-type),  [JsonSerializable](#class.jsonserializable),  [Stringable](#class.stringable) {


    /* Métodos */

final public [\_\_construct](#mongodb-bson-timestamp.construct)([int](#language.types.integer) $increment, [int](#language.types.integer) $timestamp)
final public [getIncrement](#mongodb-bson-timestamp.getincrement)(): [int](#language.types.integer)
final public [getTimestamp](#mongodb-bson-timestamp.gettimestamp)(): [int](#language.types.integer)
final public [jsonSerialize](#mongodb-bson-timestamp.jsonserialize)(): [mixed](#language.types.mixed)
final public **BSON\Timestamp::\_\_toString**(): ReturnType

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0


                Esta clase ya no implementa la interfaz
                [Serializable](#class.serializable).








        PECL mongodb 1.12.0

         Implementa [Stringable](#class.stringable) para PHP 8.0+.




        PECL mongodb 1.3.0

         Implementa [MongoDB\BSON\TimestampInterface](#class.mongodb-bson-timestampinterface).




        PECL mongodb 1.2.0

         Implementa [Serializable](#class.serializable) y
         [JsonSerializable](#class.jsonserializable).






# MongoDB\BSON\Timestamp::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\BSON\Timestamp::\_\_construct — Construye un nuevo Timestamp

### Descripción

final public **MongoDB\BSON\Timestamp::\_\_construct**([int](#language.types.integer) $increment, [int](#language.types.integer) $timestamp)

### Parámetros

    increment ([int](#language.types.integer))


      Entero de 32 bits que indica el ordinal incremental para las operaciones en un segundo dado.






    timestamp ([int](#language.types.integer))


      Entero de 32 bits que indica segundos desde la época UNIX.


### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\Timestamp::\_\_construct()**

&lt;?php

$timestamp = new MongoDB\BSON\Timestamp(1234, 5678);

?&gt;

Resultado del ejemplo anterior es similar a:

object(MongoDB\BSON\Timestamp)#1 (2) {
["increment"]=&gt;
int(1234)
["timestamp"]=&gt;
int(5678)
}

### Ver también

- [» El tipo BSON : Timestamps](https://www.mongodb.com/docs/manual/reference/bson-types/#timestamps)

# MongoDB\BSON\Timestamp::getIncrement

(mongodb &gt;=1.3.0)

MongoDB\BSON\Timestamp::getIncrement — Devuelve el componente de incremento de este Timestamp

### Descripción

final public **MongoDB\BSON\Timestamp::getIncrement**(): [int](#language.types.integer)

El componente de incremento de un Timestamp son sus 32 bits menos significativos,
que designa el ordinal incremental para las operaciones para un segundo dado.
Este valor se lee como un entero de 32 bits no signado con un orden de bytes big-endian.

**Nota**:

Dado que el tipo entero de PHP es firmado, algunos valores
devueltos por este método pueden aparecer como enteros negativos
en las plataformas de 32 bits. El formateador "%u" de
[sprintf()](#function.sprintf) puede ser utilizado para obtener una
representación en forma de string del valor decimal no firmado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el componente de incremento de este Timestamp.

**Advertencia**

    En sistemas de 32 bits, este método puede devolver un número negativo.
    Aunque las partes de incremento y de timestamp del tipo BSON timestamp
    consisten en dos valores de 32 bits no signados, PHP no puede representarlos en
    plataformas de 32 bits.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [» Tipos BSON : Timestamps](https://www.mongodb.com/docs/manual/reference/bson-types/#timestamps)

# MongoDB\BSON\Timestamp::getTimestamp

(mongodb &gt;=1.3.0)

MongoDB\BSON\Timestamp::getTimestamp — Devuelve el componente de timestamp de Timestamp

### Descripción

final public **MongoDB\BSON\Timestamp::getTimestamp**(): [int](#language.types.integer)

El componente de timestamp de un Timestamp es sus 32 bits más significativos,
que denota el número de segundos desde la época Unix. Este valor se lee como
un entero de 32 bits no signado con un orden de bytes big-endian.

**Nota**:

Dado que el tipo entero de PHP es firmado, algunos valores
devueltos por este método pueden aparecer como enteros negativos
en las plataformas de 32 bits. El formateador "%u" de
[sprintf()](#function.sprintf) puede ser utilizado para obtener una
representación en forma de string del valor decimal no firmado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el componente de timestamp de Timestamp.

**Advertencia**

    En sistemas de 32 bits, este método puede devolver un número negativo.
    Aunque las partes de incremento y timestamp del tipo timestamp BSON
    consisten en dos valores de 32 bits no signados, PHP no puede representarlos en plataformas de 32 bits.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [» Tipos BSON : Timestamps](https://www.mongodb.com/docs/manual/reference/bson-types/#timestamps)

# MongoDB\BSON\Timestamp::jsonSerialize

(mongodb &gt;=1.2.0)

MongoDB\BSON\Timestamp::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

final public **MongoDB\BSON\Timestamp::jsonSerialize**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve datos que pueden ser serializados por [json_encode()](#function.json-encode)
para producir una representación JSON extendida de
[MongoDB\BSON\Timestamp](#class.mongodb-bson-timestamp).

**Nota**:

La salida es coherente con la función [MongoDB\BSON\toJSON()](#function.mongodb.bson-tojson),
que utiliza el formato JSON extendido específico del controlador. Esto no corresponde
necesariamente a las representaciones JSON extendidas
[» relajadas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example)
o [» canónicas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example)
utilizadas por [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) y
[MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson), respectivamente.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize) - Especifica los datos que deben ser serializados en JSON

- [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» MongoDB JSON Extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

# MongoDB\BSON\Timestamp::\_\_toString

(mongodb &gt;=1.0.0)

MongoDB\BSON\Timestamp::\_\_toString — Devuelve la representación en forma de string de este timestamp

### Descripción

final public **BSON\Timestamp::\_\_toString**(): ReturnType

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación en forma de string de este timestamp

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\Timestamp::\_\_toString()**

&lt;?php

$timestamp = new MongoDB\BSON\Timestamp(1234, 5678);
var_dump((string) $timestamp);

?&gt;

Resultado del ejemplo anterior es similar a:

string(11) "[1234:5678]"

### Ver también

- [» El tipo BSON: Timestamps](https://www.mongodb.com/docs/manual/reference/bson-types/#timestamps)

## Tabla de contenidos

- [MongoDB\BSON\Timestamp::\_\_construct](#mongodb-bson-timestamp.construct) — Construye un nuevo Timestamp
- [MongoDB\BSON\Timestamp::getIncrement](#mongodb-bson-timestamp.getincrement) — Devuelve el componente de incremento de este Timestamp
- [MongoDB\BSON\Timestamp::getTimestamp](#mongodb-bson-timestamp.gettimestamp) — Devuelve el componente de timestamp de Timestamp
- [MongoDB\BSON\Timestamp::jsonSerialize](#mongodb-bson-timestamp.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [MongoDB\BSON\Timestamp::\_\_toString](#mongodb-bson-timestamp.tostring) — Devuelve la representación en forma de string de este timestamp

# La clase MongoDB\BSON\UTCDatetime

(mongodb &gt;=1.0.0)

## Introducción

    Representa una
    [» fecha BSON](https://www.mongodb.com/docs/manual/reference/bson-types/#date). El valor
    es un integer de 64 bits que representa el número de milisegundos desde
    la época UNIX (1 de enero de 1970). Los valores negativos representan fechas anteriores a 1970.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\BSON\UTCDateTime**


     implements
       [MongoDB\BSON\UTCDateTimeInterface](#class.mongodb-bson-utcdatetimeinterface),  [MongoDB\BSON\Type](#class.mongodb-bson-type),  [JsonSerializable](#class.jsonserializable),  [Stringable](#class.stringable) {


    /* Métodos */

final public [\_\_construct](#mongodb-bson-utcdatetime.construct)([int](#language.types.integer)|[MongoDB\BSON\Int64](#class.mongodb-bson-int64)|[DateTimeInterface](#class.datetimeinterface)|[null](#language.types.null) $milliseconds = **[null](#constant.null)**)
final public [jsonSerialize](#mongodb-bson-utcdatetime.jsonserialize)(): [mixed](#language.types.mixed)
final public [MongoDB\BSON\UTCDatetime::toDateTime](#mongodb-bson-utcdatetime.todatetime)(): [DateTime](#class.datetime)
final public [toDateTimeImmutable](#mongodb-bson-utcdatetime.todatetimeimmutable)(): [DateTimeImmutable](#class.datetimeimmutable)
final public [\_\_toString](#mongodb-bson-utcdatetime.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0


                Esta clase ya no implementa la interfaz
                [Serializable](#class.serializable).








        PECL mongodb 1.12.0

         Implementa [Stringable](#class.stringable) para PHP 8.0+.




        PECL mongodb 1.3.0

         Implementa [MongoDB\BSON\UTCDateTimeInterface](#class.mongodb-bson-utcdatetimeinterface).




        PECL mongodb 1.2.0

         Implementa [Serializable](#class.serializable) y
         [JsonSerializable](#class.jsonserializable).






# MongoDB\BSON\UTCDateTime::\_\_construct

(mongodb &gt;=1.0.0)

MongoDB\BSON\UTCDateTime::\_\_construct — Construye un nuevo UTCDateTime

### Descripción

final public **MongoDB\BSON\UTCDateTime::\_\_construct**([int](#language.types.integer)|[MongoDB\BSON\Int64](#class.mongodb-bson-int64)|[DateTimeInterface](#class.datetimeinterface)|[null](#language.types.null) $milliseconds = **[null](#constant.null)**)

### Parámetros

    milliseconds ([int](#language.types.integer)|[MongoDB\BSON\Int64](#class.mongodb-bson-int64)|[DateTimeInterface](#class.datetimeinterface)|[null](#language.types.null))


      Número de milisegundos desde la época UNIX (1 de enero de 1970). Los valores
      negativos representan fechas anteriores a 1970. Este valor puede ser
      proporcionado como un [int](#language.types.integer) de 64 bits. Para la compatibilidad en sistemas de 32 bits, este parámetro también puede ser proporcionado como una
      [MongoDB\BSON\Int64](#class.mongodb-bson-int64).




      Si el argumento es un [DateTimeInterface](#class.datetimeinterface), el número
      de milisegundos desde la época UNIX se derivará de este valor.




      Si este argumento es **[null](#constant.null)**, la hora actual se utilizará por omisión.


### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción






       PECL mongodb 2.0.0


         El parámetro milliseconds ya no acepta
         [string](#language.types.string) ni [float](#language.types.float).







       PECL mongodb 1.20.0


         El argumento milliseconds acepta ahora un objeto
         [MongoDB\BSON\Int64](#class.mongodb-bson-int64) (para compatibilidad con las
         plataformas de 32 bits). Especificar una [string](#language.types.string) o un
         [float](#language.types.float) está deprecado.







       PECL mongodb 1.2.0


         El argumento milliseconds es opcional y por
         omisión es **[null](#constant.null)** (es decir, la hora actual). El argumento también acepta un
         [DateTimeInterface](#class.datetimeinterface), que puede ser utilizado para calcular el número de milisegundos desde la época UNIX. Anteriormente, solo se aceptaban los tipos [int](#language.types.integer), [float](#language.types.float) y [string](#language.types.string).








### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\UTCDatetime::\_\_construct()**

&lt;?php

var_dump(new MongoDB\BSON\UTCDateTime);

var_dump(new MongoDB\BSON\UTCDateTime(new DateTime));

var_dump(new MongoDB\BSON\UTCDateTime(1416445411987));

?&gt;

Resultado del ejemplo anterior es similar a:

object(MongoDB\BSON\UTCDateTime)#1 (1) {
["milliseconds"]=&gt;
string(13) "1484852905560"
}
object(MongoDB\BSON\UTCDateTime)#1 (1) {
["milliseconds"]=&gt;
string(13) "1484852905560"
}
object(MongoDB\BSON\UTCDateTime)#1 (1) {
["milliseconds"]=&gt;
string(13) "1416445411987"
}

### Ver también

- [» BSON Types: Date](https://www.mongodb.com/docs/manual/reference/bson-types/#date)

# MongoDB\BSON\UTCDateTime::jsonSerialize

(mongodb &gt;=1.2.0)

MongoDB\BSON\UTCDateTime::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

final public **MongoDB\BSON\UTCDateTime::jsonSerialize**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve datos que pueden ser serializados por [json_encode()](#function.json-encode)
para producir una representación JSON extendida de
[MongoDB\BSON\UTCDateTime](#class.mongodb-bson-utcdatetime).

**Nota**:

La salida es coherente con la función [MongoDB\BSON\toJSON()](#function.mongodb.bson-tojson),
que utiliza el formato JSON extendido específico del controlador. Esto no corresponde
necesariamente a las representaciones JSON extendidas
[» relajadas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example)
o [» canónicas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example)
utilizadas por [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) y
[MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson), respectivamente.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize) - Especifica los datos que deben ser serializados en JSON

- [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» MongoDB JSON Extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

# MongoDB\BSON\UTCDateTime::toDateTime

(mongodb &gt;=1.0.0)

MongoDB\BSON\UTCDateTime::toDateTime — Devuelve la representación DateTime de este UTCDateTime

### Descripción

final public **MongoDB\BSON\UTCDatetime::toDateTime**(): [DateTime](#class.datetime)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación [DateTime](#class.datetime) de este UTCDateTime.
El [DateTime](#class.datetime) devuelto utilizará el huso horario UTC.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\UTCDatetime::toDateTime()**

&lt;?php

$utcdatetime = new MongoDB\BSON\UTCDateTime(1416445411987);
$datetime = $utcdatetime-&gt;toDateTime();
var_dump($datetime-&gt;format('r'));
var_dump($datetime-&gt;format('U.u'));
var_dump($datetime-&gt;getTimezone());

?&gt;

Resultado del ejemplo anterior es similar a:

string(31) "Thu, 20 Nov 2014 01:03:31 +0000"
string(17) "1416445411.987000"
object(DateTimeZone)#3 (2) {
["timezone_type"]=&gt;
int(1)
["timezone"]=&gt;
string(6) "+00:00"
}

### Ver también

- [MongoDB\BSON\UTCDateTime::toDateTimeImmutable()](#mongodb-bson-utcdatetime.todatetimeimmutable) - Devuelve la representación DateTimeImmutable de esta UTCDateTime

- [» El tipo BSON : Date](https://www.mongodb.com/docs/manual/reference/bson-types/#date)

# MongoDB\BSON\UTCDateTime::toDateTimeImmutable

(mongodb &gt;=1.20.0)

MongoDB\BSON\UTCDateTime::toDateTimeImmutable — Devuelve la representación DateTimeImmutable de esta UTCDateTime

### Descripción

final public **MongoDB\BSON\UTCDateTime::toDateTimeImmutable**(): [DateTimeImmutable](#class.datetimeimmutable)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación [DateTimeImmutable](#class.datetimeimmutable) de esta
UTCDateTime. El [DateTimeImmutable](#class.datetimeimmutable) devuelto utilizará
el huso horario UTC.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\BSON\UTCDatetime::toDateTimeImmutable()**

&lt;?php

$utcdatetime = new MongoDB\BSON\UTCDateTime(1416445411987);
$datetime = $utcdatetime-&gt;toDateTimeImmutable();
var_dump($datetime-&gt;format('r'));
var_dump($datetime-&gt;format('U.u'));
var_dump($datetime-&gt;getTimezone());

?&gt;

Resultado del ejemplo anterior es similar a:

string(31) "Thu, 20 Nov 2014 01:03:31 +0000"
string(17) "1416445411.987000"
object(DateTimeZone)#3 (2) {
["timezone_type"]=&gt;
int(1)
["timezone"]=&gt;
string(6) "+00:00"
}

### Ver también

- [MongoDB\BSON\UTCDateTime::toDateTime()](#mongodb-bson-utcdatetime.todatetime) - Devuelve la representación DateTime de este UTCDateTime

- [» Tipos BSON : Date](https://www.mongodb.com/docs/manual/reference/bson-types/#date)

# MongoDB\BSON\UTCDateTime::\_\_toString

(mongodb &gt;=1.0.0)

MongoDB\BSON\UTCDateTime::\_\_toString — Devuelve la representación en forma de string de este UTCDateTime

### Descripción

final public **MongoDB\BSON\UTCDateTime::\_\_toString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación en forma de string de este UTCDateTime.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\UTCDatetime::\_\_toString()**

&lt;?php

$utcdatetime = new MongoDB\BSON\UTCDateTime(1416445411987);
var_dump((string) $utcdatetime);

?&gt;

El ejemplo anterior mostrará:

string(13) "1416445411987"

### Ver también

- [» BSON Types: Date](https://www.mongodb.com/docs/manual/reference/bson-types/#date)

## Tabla de contenidos

- [MongoDB\BSON\UTCDateTime::\_\_construct](#mongodb-bson-utcdatetime.construct) — Construye un nuevo UTCDateTime
- [MongoDB\BSON\UTCDateTime::jsonSerialize](#mongodb-bson-utcdatetime.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [MongoDB\BSON\UTCDateTime::toDateTime](#mongodb-bson-utcdatetime.todatetime) — Devuelve la representación DateTime de este UTCDateTime
- [MongoDB\BSON\UTCDateTime::toDateTimeImmutable](#mongodb-bson-utcdatetime.todatetimeimmutable) — Devuelve la representación DateTimeImmutable de esta UTCDateTime
- [MongoDB\BSON\UTCDateTime::\_\_toString](#mongodb-bson-utcdatetime.tostring) — Devuelve la representación en forma de string de este UTCDateTime

# La interfaz MongoDB\BSON\Type

(mongodb &gt;=1.0.0)

## Introducción

    Interfaz abstracta base que no debe ser implementada directamente.

## Sinopsis de la Interfaz

    ****




      class **MongoDB\BSON\Type**

     {

}

    Esta interfaz no tiene métodos. Su único propósito es ser la interfaz base para todas las clases de tipo BSON.

# La clase MongoDB\BSON\Persistable

(mongodb &gt;=1.0.0)

## Introducción

    Las clases pueden implementar esta interfaz para tener la posibilidad de utilizar los ODM automáticos (los objetos de mapeo de documentos) de esta extensión. Durante la serialización, la extensión inyectará una propiedad __pclass que contiene el nombre de la clase PHP en los datos devueltos por [MongoDB\BSON\Serializable::bsonSerialize()](#mongodb-bson-serializable.bsonserialize). Durante la deserialización, la misma propiedad __pclass se utilizará para solicitar a la clase PHP (independientemente de la configuración [type map](#mongodb.persistence.typemaps)) que se construya antes de que se invoque [MongoDB\BSON\Unserializable::bsonUnserialize()](#mongodb-bson-unserializable.bsonunserialize). Ver [Persistir datos](#mongodb.persistence) para más información.

**Nota**:

     Aunque [MongoDB\BSON\Serializable::bsonSerialize()](#mongodb-bson-serializable.bsonserialize) quiera devolver un array secuencial, la inyección de la propiedad __pclass hará que el objeto se serialice como documento BSON.

## Sinopsis de la Interfaz

    ****




      class **MongoDB\BSON\Persistable**


     implements
       [MongoDB\BSON\Unserializable](#class.mongodb-bson-unserializable),  [MongoDB\BSON\Serializable](#class.mongodb-bson-serializable) {


    /* Métodos */

abstract public [bsonSerialize](#mongodb-bson-persistable.bsonserialize)(): [array](#language.types.array)|[stdClass](#class.stdclass)|[MongoDB\BSON\Document](#class.mongodb-bson-document)

    /* Métodos heredados */
    abstract public [MongoDB\BSON\Serializable::bsonSerialize](#mongodb-bson-serializable.bsonserialize)(): [array](#language.types.array)|[stdClass](#class.stdclass)|[MongoDB\BSON\Document](#class.mongodb-bson-document)|[MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray)

    abstract public [MongoDB\BSON\Unserializable::bsonUnserialize](#mongodb-bson-unserializable.bsonunserialize)([array](#language.types.array) $data): [void](language.types.void.html)

}

# MongoDB\BSON\Persistable::bsonSerialize

(mongodb &gt;=1.0.0)

MongoDB\BSON\Persistable::bsonSerialize — Proporciona un array o un documento a serializar como BSON

### Descripción

abstract public **MongoDB\BSON\Persistable::bsonSerialize**(): [array](#language.types.array)|[stdClass](#class.stdclass)|[MongoDB\BSON\Document](#class.mongodb-bson-document)

Se invoca durante la serialización del objeto en BSON. El método debe devolver un
[array](#language.types.array), [stdClass](#class.stdclass), o
[MongoDB\BSON\Document](#class.mongodb-bson-document).

El valor devuelto será siempre serializado como documento BSON. El documento
serializado incluirá un campo que contiene el nombre de la clase del objeto. Por esta
razón, no es posible devolver una instancia de
[MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray) en este método.

Se recomienda incluir una propiedad \_id (por ejemplo
un [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) inicializado en el constructor) al devolver
datos para un documento BSON raíz. En ausencia de una propiedad
\_id, la extensión o el servidor generará un
[MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) para las operaciones de inserción o upsert,
respectivamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un [array](#language.types.array), [stdClass](#class.stdclass), o [MongoDB\BSON\Document](#class.mongodb-bson-document)
a serializar como documento BSON.

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0

            Los tipos de retorno previamente declarados como provisionales ahora son aplicados.





       PECL mongodb 1.17.0


         Este método puede ahora también devolver instancias de [MongoDB\BSON\Document](#class.mongodb-bson-document)
         además de [array](#language.types.array) y [stdClass](#class.stdclass).








### Ver también

- [MongoDB\BSON\Serializable::bsonSerialize()](#mongodb-bson-serializable.bsonserialize) - Proporciona un array o un documento a serializar como BSON

- [MongoDB\BSON\Unserializable::bsonUnserialize()](#mongodb-bson-unserializable.bsonunserialize) - Construye el objeto a partir de un array o de un documento BSON

- [MongoDB\BSON\Persistable](#class.mongodb-bson-persistable)

- [Persistir datos](#mongodb.persistence)

## Tabla de contenidos

- [MongoDB\BSON\Persistable::bsonSerialize](#mongodb-bson-persistable.bsonserialize) — Proporciona un array o un documento a serializar como BSON

# La clase MongoDB\BSON\Serializable

(mongodb &gt;=1.0.0)

## Introducción

    Las clases que implementan esta interfaz pueden devolver datos
    para serializar como un array BSON, o un documento como propiedades públicas
    de objetos.

## Sinopsis de la Interfaz

    ****




      class **MongoDB\BSON\Serializable**


     implements
       [MongoDB\BSON\Type](#class.mongodb-bson-type) {


    /* Métodos */

abstract public [bsonSerialize](#mongodb-bson-serializable.bsonserialize)(): [array](#language.types.array)|[stdClass](#class.stdclass)|[MongoDB\BSON\Document](#class.mongodb-bson-document)|[MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0

            Los tipos de retorno previamente declarados como provisionales ahora son aplicados.






PECL mongodb 1.15.0

    Los tipos de retorno de los métodos son declarados como provisionales en PHP 8.0 y posteriores,
    lo que desencadena avisos de depreciación en el código que implementa esta interfaz sin declarar
    los tipos de retorno apropiados.
    El atributo #[ReturnTypeWillChange] puede ser añadido
    para ignorar la notificación de depreciación.







# MongoDB\BSON\Serializable::bsonSerialize

(mongodb &gt;=1.0.0)

MongoDB\BSON\Serializable::bsonSerialize — Proporciona un array o un documento a serializar como BSON

### Descripción

abstract public **MongoDB\BSON\Serializable::bsonSerialize**(): [array](#language.types.array)|[stdClass](#class.stdclass)|[MongoDB\BSON\Document](#class.mongodb-bson-document)|[MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray)

Invocado durante la serialización del objeto a BSON. El método debe devolver
un [array](#language.types.array), [stdClass](#class.stdclass),
[MongoDB\BSON\Document](#class.mongodb-bson-document) o
[MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray).

Los documentos raíz (por ejemplo, un
[MongoDB\BSON\Serializable](#class.mongodb-bson-serializable) pasado a
[MongoDB\BSON\Document::fromPHP()](#mongodb-bson-document.fromphp)) siempre serán serializados
como documento BSON. Para los valores de campo, los arrays asociativos y las
instancias [stdClass](#class.stdclass) serán serializados como
documento BSON y los arrays secuenciales (es decir, índices numéricos secuenciales
comenzando en 0) serán serializados como array BSON.

Se recomienda incluir una propiedad \_id
(por ejemplo un [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) inicializado en el constructor)
al devolver datos para un documento raíz BSON. En ausencia de una
propiedad \_id, la extensión o el servidor generará un
[MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) para las operaciones de inserción o
actualización, respectivamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

[array](#language.types.array), [stdClass](#class.stdclass), [MongoDB\BSON\Document](#class.mongodb-bson-document),
o [MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray) a serializar como array o documento BSON.

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0

            Los tipos de retorno previamente declarados como provisionales ahora son aplicados.





       PECL mongodb 1.17.0


         El tipo de retorno ya no es [array](#language.types.array)|[object](#language.types.object).
         En lugar de un [object](#language.types.object), el tipo de retorno especifica ahora
         [stdClass](#class.stdclass). Las clases que implementan esta interfaz deben
         ser modificadas para no utilizar el tipo de retorno [object](#language.types.object).
         Al ser el tipo de retorno provisional, se emite una advertencia de deprecación en PHP 8.1
         o superior si las implementaciones no utilizan el tipo de retorno correcto.




         Además de los cambios anteriores, la extensión ahora soporta devolver instancias de
         [MongoDB\BSON\Document](#class.mongodb-bson-document)
         y [MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray). Cabe señalar que
         cualquier instancia de [MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray)
         será convertida silenciosamente en objeto cuando se almacene como documento raíz.
         Estas instancias se almacenan como arrays cuando se utilizan como valor de campo integrado.








### Ejemplos

**Ejemplo #1 MongoDB\BSON\Serializable::bsonSerialize()** devolviendo un array asociativo para el documento raíz

&lt;?php

class MyDocument implements MongoDB\BSON\Serializable
{
private $id;

    function __construct()
    {
        $this-&gt;id = new MongoDB\BSON\ObjectId;
    }

    function bsonSerialize(): array
    {
        return ['_id' =&gt; $this-&gt;id, 'foo' =&gt; 'bar'];
    }

}

echo MongoDB\BSON\Document::fromPHP(new MyDocument)-&gt;toRelaxedExtendedJSON(), "\n";

?&gt;

Resultado del ejemplo anterior es similar a:

{ "\_id" : { "$oid" : "56cccdcada14d8755a58c591" }, "foo" : "bar" }

**Ejemplo #2 MongoDB\BSON\Serializable::bsonSerialize()** devolviendo un array secuencial para el documento raíz

&lt;?php

class MyArray implements MongoDB\BSON\Serializable
{
function bsonSerialize(): array
{
return [1, 2, 3];
}
}

echo MongoDB\BSON\Document::fromPHP(new MyArray)-&gt;toRelaxedExtendedJSON(), "\n";

?&gt;

El ejemplo anterior mostrará:

{ "0" : 1, "1" : 2, "2" : 3 }

**Ejemplo #3 MongoDB\BSON\Serializable::bsonSerialize()** devolviendo un array asociativo para el campo de documento

&lt;?php

class MyDocument implements MongoDB\BSON\Serializable
{
function bsonSerialize(): array
{
return ['foo' =&gt; 'bar'];
}
}

$value = ['document' =&gt; new MyDocument];

echo MongoDB\BSON\Document::fromPHP($value)-&gt;toRelaxedExtendedJSON(), "\n";

?&gt;

El ejemplo anterior mostrará:

{ "document" : { "foo" : "bar" } }

**Ejemplo #4 MongoDB\BSON\Serializable::bsonSerialize()** devolviendo un array secuencial para el campo de documento

&lt;?php

class MyArray implements MongoDB\BSON\Serializable
{
function bsonSerialize(): array
{
return [1, 2, 3];
}
}

$value = ['array' =&gt; new MyArray];
$bson = MongoDB\BSON\fromPHP($value);
echo MongoDB\BSON\toJSON($bson), "\n";

?&gt;

El ejemplo anterior mostrará:

{ "array" : [ 1, 2, 3 ] }

### Ver también

- [MongoDB\BSON\Unserializable::bsonUnserialize()](#mongodb-bson-unserializable.bsonunserialize) - Construye el objeto a partir de un array o de un documento BSON

- [MongoDB\BSON\Persistable](#class.mongodb-bson-persistable)

- [Persistir datos](#mongodb.persistence)

## Tabla de contenidos

- [MongoDB\BSON\Serializable::bsonSerialize](#mongodb-bson-serializable.bsonserialize) — Proporciona un array o un documento a serializar como BSON

# La interfaz MongoDB\BSON\Unserializable

(mongodb &gt;=1.0.0)

## Introducción

    Las clases que implementan esta interfaz deben ser especificadas
    en una [mapa de tipos](#mongodb.persistence.typemaps)
    para los arrays y los documentos BSON deserializados (tanto raíz como
    embebidos).

## Sinopsis de la Interfaz

    ****




      class **MongoDB\BSON\Unserializable**

     {


    /* Métodos */

abstract public [bsonUnserialize](#mongodb-bson-unserializable.bsonunserialize)([array](#language.types.array) $data): [void](language.types.void.html)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0

            Los tipos de retorno previamente declarados como provisionales ahora son aplicados.






PECL mongodb 1.15.0

    Los tipos de retorno de los métodos son declarados como provisionales en PHP 8.0 y posteriores,
    lo que desencadena avisos de depreciación en el código que implementa esta interfaz sin declarar
    los tipos de retorno apropiados.
    El atributo #[ReturnTypeWillChange] puede ser añadido
    para ignorar la notificación de depreciación.







# MongoDB\BSON\Unserializable::bsonUnserialize

(mongodb &gt;=1.0.0)

MongoDB\BSON\Unserializable::bsonUnserialize — Construye el objeto a partir de un array o de un documento BSON

### Descripción

abstract public **MongoDB\BSON\Unserializable::bsonUnserialize**([array](#language.types.array) $data): [void](language.types.void.html)

Se invoca durante la deserialización del objeto a partir de BSON. Las propiedades
del array o del documento BSON serán pasadas a la función en forma de [array](#language.types.array).

No se olvide de buscar una propiedad \_id al manejar datos
a partir de un documento BSON.

**Nota**:

    Este método actúa como el
    [constructor](#language.oop5.decon.constructor) del
    objeto. El método [__construct()](#object.construct)
    *no será* invocado después de este método.

### Parámetros

    data ([array](#language.types.array))


      Propiedades que contienen el array o el documento BSON.


### Valores devueltos

El valor de retorno de este método es ignorado.

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0

            Los tipos de retorno previamente declarados como provisionales ahora son aplicados.






### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\Unserializable::bsonUnserialize()**

&lt;?php

class MyDocument implements MongoDB\BSON\Unserializable
{
private $data = [];

    function bsonUnserialize(array $data): void
    {
        $this-&gt;data = $data;
    }

}

$bson = MongoDB\BSON\Document::fromJSON('{ "foo": "bar" }');

var_dump($bson-&gt;toPHP(['root' =&gt; 'MyDocument']));

?&gt;

Resultado del ejemplo anterior es similar a:

object(MyDocument)#1 (1) {
["data":"MyDocument":private]=&gt;
array(1) {
["foo"]=&gt;
string(3) "bar"
}
}

### Ver también

- [MongoDB\BSON\Serializable::bsonSerialize()](#mongodb-bson-serializable.bsonserialize) - Proporciona un array o un documento a serializar como BSON

- [MongoDB\BSON\Persistable](#class.mongodb-bson-persistable)

- [Persistir datos](#mongodb.persistence)

## Tabla de contenidos

- [MongoDB\BSON\Unserializable::bsonUnserialize](#mongodb-bson-unserializable.bsonunserialize) — Construye el objeto a partir de un array o de un documento BSON

# La interfaz MongoDB\BSON\BinaryInterface

(mongodb &gt;=1.3.0)

## Introducción

    Esta interfaz es implementada por [MongoDB\BSON\Binary](#class.mongodb-bson-binary)
    para ser utilizada como tipo de argumento, de retorno o de propiedad en las clases de usuario.

## Sinopsis de la Clase

    ****


      class **MongoDB\BSON\BinaryInterface**

     {
    /* Métodos */

abstract public [getData](#mongodb-bson-binaryinterface.getdata)(): [string](#language.types.string)
abstract public [getType](#mongodb-bson-binaryinterface.gettype)(): [int](#language.types.integer)
abstract public [\_\_toString](#mongodb-bson-binaryinterface.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0

            Los tipos de retorno previamente declarados como provisionales ahora son aplicados.






PECL mongodb 1.15.0

    Los tipos de retorno de los métodos son declarados como provisionales en PHP 8.0 y posteriores,
    lo que desencadena avisos de depreciación en el código que implementa esta interfaz sin declarar
    los tipos de retorno apropiados.
    El atributo #[ReturnTypeWillChange] puede ser añadido
    para ignorar la notificación de depreciación.







# MongoDB\BSON\BinaryInterface::getData

(mongodb &gt;=1.3.0)

MongoDB\BSON\BinaryInterface::getData — Devuelve los datos de BinaryInterface

### Descripción

abstract public **MongoDB\BSON\BinaryInterface::getData**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve los datos de BinaryInterface.

### Ver también

- [MongoDB\BSON\Binary::getData()](#mongodb-bson-binary.getdata) - Devuelve los datos de Binary

# MongoDB\BSON\BinaryInterface::getType

(mongodb &gt;=1.3.0)

MongoDB\BSON\BinaryInterface::getType — Devuelve el tipo de BinaryInterface

### Descripción

abstract public **MongoDB\BSON\BinaryInterface::getType**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tipo de BinaryInterface.

### Ver también

- [MongoDB\BSON\Binary::getType()](#mongodb-bson-binary.gettype) - Devuelve el tipo de Binary

# MongoDB\BSON\BinaryInterface::\_\_toString

(mongodb &gt;=1.3.0)

MongoDB\BSON\BinaryInterface::\_\_toString — Devuelve los datos de BinaryInterface

### Descripción

abstract public **MongoDB\BSON\BinaryInterface::\_\_toString**(): [string](#language.types.string)

Este método es un alias de: [MongoDB\BSON\BinaryInterface::getData()](#mongodb-bson-binaryinterface.getdata).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve los datos de BinaryInterface.

### Ver también

- [MongoDB\BSON\BinaryInterface::getData()](#mongodb-bson-binaryinterface.getdata) - Devuelve los datos de BinaryInterface

- [MongoDB\BSON\Binary::\_\_toString()](#mongodb-bson-binary.tostring) - Devuelve los datos de Binary

## Tabla de contenidos

- [MongoDB\BSON\BinaryInterface::getData](#mongodb-bson-binaryinterface.getdata) — Devuelve los datos de BinaryInterface
- [MongoDB\BSON\BinaryInterface::getType](#mongodb-bson-binaryinterface.gettype) — Devuelve el tipo de BinaryInterface
- [MongoDB\BSON\BinaryInterface::\_\_toString](#mongodb-bson-binaryinterface.tostring) — Devuelve los datos de BinaryInterface

# La interfaz MongoDB\BSON\Decimal128Interface

(mongodb &gt;=1.3.0)

## Introducción

    Esta interfaz es implementada por
    [MongoDB\BSON\Decimal128](#class.mongodb-bson-decimal128) para ser utilizada como tipo de argumento,
    de retorno o de propiedad en las clases de usuario.

## Sinopsis de la Clase

    ****


      class **MongoDB\BSON\Decimal128Interface**

     {
    /* Métodos */

abstract public [\_\_toString](#mongodb-bson-decimal128interface.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0

            Los tipos de retorno previamente declarados como provisionales ahora son aplicados.






PECL mongodb 1.15.0

    Los tipos de retorno de los métodos son declarados como provisionales en PHP 8.0 y posteriores,
    lo que desencadena avisos de depreciación en el código que implementa esta interfaz sin declarar
    los tipos de retorno apropiados.
    El atributo #[ReturnTypeWillChange] puede ser añadido
    para ignorar la notificación de depreciación.







# MongoDB\BSON\Decimal128Interface::\_\_toString

(mongodb &gt;=1.3.0)

MongoDB\BSON\Decimal128Interface::\_\_toString — Devuelve una representación en string de Decimal128Interface

### Descripción

abstract public **MongoDB\BSON\Decimal128Interface::\_\_toString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una representación en string de Decimal128Interface.

### Ver también

- [MongoDB\BSON\Decimal128::\_\_toString()](#mongodb-bson-decimal128.tostring) - Devuelve la representación en forma de string de Decimal128

## Tabla de contenidos

- [MongoDB\BSON\Decimal128Interface::\_\_toString](#mongodb-bson-decimal128interface.tostring) — Devuelve una representación en string de Decimal128Interface

# La interfaz MongoDB\BSON\JavascriptInterface

(mongodb &gt;=1.3.0)

## Introducción

    Esta interfaz es implementada por
    [MongoDB\BSON\Javascript](#class.mongodb-bson-javascript) para ser utilizada como tipo de argumento,
    de retorno o de propiedad en las clases de usuario.

## Sinopsis de la Clase

    ****


      class **MongoDB\BSON\JavascriptInterface**

     {
    /* Métodos */

abstract public [getCode](#mongodb-bson-javascriptinterface.getcode)(): [string](#language.types.string)
abstract public [getScope](#mongodb-bson-javascriptinterface.getscope)(): [?](#language.types.null)[object](#language.types.object)
abstract public [\_\_toString](#mongodb-bson-javascriptinterface.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0

            Los tipos de retorno previamente declarados como provisionales ahora son aplicados.






PECL mongodb 1.15.0

    Los tipos de retorno de los métodos son declarados como provisionales en PHP 8.0 y posteriores,
    lo que desencadena avisos de depreciación en el código que implementa esta interfaz sin declarar
    los tipos de retorno apropiados.
    El atributo #[ReturnTypeWillChange] puede ser añadido
    para ignorar la notificación de depreciación.







# MongoDB\BSON\JavascriptInterface::getCode

(mongodb &gt;=1.3.0)

MongoDB\BSON\JavascriptInterface::getCode — Devuelve el código de JavascriptInterface

### Descripción

abstract public **MongoDB\BSON\JavascriptInterface::getCode**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el código de JavascriptInterface.

### Ver también

- [MongoDB\BSON\Javascript::getCode()](#mongodb-bson-javascript.getcode) - Devuelve el código Javascript

# MongoDB\BSON\JavascriptInterface::getScope

(mongodb &gt;=1.3.0)

MongoDB\BSON\JavascriptInterface::getScope — Devuelve el documento de ámbito de JavascriptInterface

### Descripción

abstract public **MongoDB\BSON\JavascriptInterface::getScope**(): [?](#language.types.null)[object](#language.types.object)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el documento de ámbito de JavascriptInterface.

### Ver también

- [MongoDB\BSON\Javascript::getScope()](#mongodb-bson-javascript.getscope) - Devuelve el documento de ámbito de Javascript

# MongoDB\BSON\JavascriptInterface::\_\_toString

(mongodb &gt;=1.3.0)

MongoDB\BSON\JavascriptInterface::\_\_toString — Devuelve el código de JavascriptInterface

### Descripción

abstract public **MongoDB\BSON\JavascriptInterface::\_\_toString**(): [string](#language.types.string)

Este método es un alias de: [MongoDB\BSON\JavascriptInterface::getCode()](#mongodb-bson-javascriptinterface.getcode).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el código de JavascriptInterface.

### Ver también

- [MongoDB\BSON\JavascriptInterface::getCode()](#mongodb-bson-javascriptinterface.getcode) - Devuelve el código de JavascriptInterface

- [MongoDB\BSON\Javascript::\_\_toString()](#mongodb-bson-javascript.tostring) - Devuelve el código Javascript

## Tabla de contenidos

- [MongoDB\BSON\JavascriptInterface::getCode](#mongodb-bson-javascriptinterface.getcode) — Devuelve el código de JavascriptInterface
- [MongoDB\BSON\JavascriptInterface::getScope](#mongodb-bson-javascriptinterface.getscope) — Devuelve el documento de ámbito de JavascriptInterface
- [MongoDB\BSON\JavascriptInterface::\_\_toString](#mongodb-bson-javascriptinterface.tostring) — Devuelve el código de JavascriptInterface

# La interfaz MongoDB\BSON\MaxKeyInterface

(mongodb &gt;=1.3.0)

## Introducción

    Esta interfaz es implementada por [MongoDB\BSON\MaxKey](#class.mongodb-bson-maxkey)
    para ser utilizada como tipo de argumento, de retorno o de propiedad en las clases de usuario.

## Sinopsis de la Clase

    ****


      class **MongoDB\BSON\MaxKeyInterface**

     {

}

    Esta interfaz no contiene métodos.

# La interfaz MongoDB\BSON\MinKeyInterface

(mongodb &gt;=1.3.0)

## Introducción

    Esta interfaz es implementada por [MongoDB\BSON\MinKey](#class.mongodb-bson-minkey)
    para ser utilizada como tipo de argumento, de retorno o de propiedad en las clases de usuario.

## Sinopsis de la Clase

    ****


      class **MongoDB\BSON\MinKeyInterface**

     {

}

    Esta interfaz no contiene métodos.

# La interfaz MongoDB\BSON\ObjectIdInterface

(mongodb &gt;=1.3.0)

## Introducción

    Esta interfaz es implementada por
    [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) para ser utilizada como tipo de argumento,
    de retorno o de propiedad en las clases de usuario.

## Sinopsis de la Clase

    ****


      class **MongoDB\BSON\ObjectIdInterface**

     {
    /* Métodos */

abstract public [getTimestamp](#mongodb-bson-objectidinterface.gettimestamp)(): [int](#language.types.integer)
abstract public [\_\_toString](#mongodb-bson-objectidinterface.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0

            Los tipos de retorno previamente declarados como provisionales ahora son aplicados.






PECL mongodb 1.15.0

    Los tipos de retorno de los métodos son declarados como provisionales en PHP 8.0 y posteriores,
    lo que desencadena avisos de depreciación en el código que implementa esta interfaz sin declarar
    los tipos de retorno apropiados.
    El atributo #[ReturnTypeWillChange] puede ser añadido
    para ignorar la notificación de depreciación.







# MongoDB\BSON\ObjectIdInterface::getTimestamp

(mongodb &gt;=1.3.0)

MongoDB\BSON\ObjectIdInterface::getTimestamp — Devuelve el componente de timestamp de ObjectIdInterface

### Descripción

abstract public **MongoDB\BSON\ObjectIdInterface::getTimestamp**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el componente de timestamp de ObjectIdInterface.

### Ver también

- [MongoDB\BSON\ObjectId::getTimestamp()](#mongodb-bson-objectid.gettimestamp) - Devuelve el componente de timestamp de ObjectId

# MongoDB\BSON\ObjectIdInterface::\_\_toString

(mongodb &gt;=1.3.0)

MongoDB\BSON\ObjectIdInterface::\_\_toString — Devuelve la representación hexadecimal de ObjectIdInterface

### Descripción

abstract public **MongoDB\BSON\ObjectIdInterface::\_\_toString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación hexadecimal de ObjectIdInterface.

### Ver también

- [MongoDB\BSON\ObjectId::\_\_toString()](#mongodb-bson-objectid.tostring) - Devuelve la representación hexadecimal de este ObjectId

## Tabla de contenidos

- [MongoDB\BSON\ObjectIdInterface::getTimestamp](#mongodb-bson-objectidinterface.gettimestamp) — Devuelve el componente de timestamp de ObjectIdInterface
- [MongoDB\BSON\ObjectIdInterface::\_\_toString](#mongodb-bson-objectidinterface.tostring) — Devuelve la representación hexadecimal de ObjectIdInterface

# La interfaz MongoDB\BSON\RegexInterface

(mongodb &gt;=1.3.0)

## Introducción

    Esta interfaz es implementada por [MongoDB\BSON\Regex](#class.mongodb-bson-regex)
    para ser utilizada como tipo de argumento, de retorno o de propiedad en las clases de usuario.

## Sinopsis de la Clase

    ****


      class **MongoDB\BSON\RegexInterface**

     {
    /* Métodos */

abstract public [getFlags](#mongodb-bson-regexinterface.getflags)(): [string](#language.types.string)
abstract public [getPattern](#mongodb-bson-regexinterface.getpattern)(): [string](#language.types.string)
abstract public [\_\_toString](#mongodb-bson-regexinterface.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0

            Los tipos de retorno previamente declarados como provisionales ahora son aplicados.






PECL mongodb 1.15.0

    Los tipos de retorno de los métodos son declarados como provisionales en PHP 8.0 y posteriores,
    lo que desencadena avisos de depreciación en el código que implementa esta interfaz sin declarar
    los tipos de retorno apropiados.
    El atributo #[ReturnTypeWillChange] puede ser añadido
    para ignorar la notificación de depreciación.







# MongoDB\BSON\RegexInterface::getFlags

(mongodb &gt;=1.3.0)

MongoDB\BSON\RegexInterface::getFlags — Devuelve los flags de RegexInterface

### Descripción

abstract public **MongoDB\BSON\RegexInterface::getFlags**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve los flags de RegexInterface.

### Ver también

- [MongoDB\BSON\Regex::getFlags()](#mongodb-bson-regex.getflags) - Devuelve los flags de la REGEX

# MongoDB\BSON\RegexInterface::getPattern

(mongodb &gt;=1.3.0)

MongoDB\BSON\RegexInterface::getPattern — Devuelve el patrón de RegexInterface

### Descripción

abstract public **MongoDB\BSON\RegexInterface::getPattern**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el patrón de RegexInterface.

### Ver también

- [MongoDB\BSON\Regex::getPattern()](#mongodb-bson-regex.getpattern) - Devuelve la máscara del REGEX

# MongoDB\BSON\RegexInterface::\_\_toString

(mongodb &gt;=1.3.0)

MongoDB\BSON\RegexInterface::\_\_toString — Devuelve la representación en forma de string de esta RegexInterface

### Descripción

abstract public **MongoDB\BSON\RegexInterface::\_\_toString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación en forma de string de esta RegexInterface.

### Ver también

- [MongoDB\BSON\Regex::\_\_toString()](#mongodb-bson-regex.tostring) - Devuelve el string que representa esta REGEX

## Tabla de contenidos

- [MongoDB\BSON\RegexInterface::getFlags](#mongodb-bson-regexinterface.getflags) — Devuelve los flags de RegexInterface
- [MongoDB\BSON\RegexInterface::getPattern](#mongodb-bson-regexinterface.getpattern) — Devuelve el patrón de RegexInterface
- [MongoDB\BSON\RegexInterface::\_\_toString](#mongodb-bson-regexinterface.tostring) — Devuelve la representación en forma de string de esta RegexInterface

# La interfaz MongoDB\BSON\TimestampInterface

(mongodb &gt;=1.3.0)

## Introducción

    Esta interfaz es implementada por [MongoDB\BSON\Timestamp](#class.mongodb-bson-timestamp) para ser utilizada como tipo de argumento,
    de retorno o de propiedad en las clases de usuario.

## Sinopsis de la Clase

    ****


      class **MongoDB\BSON\TimestampInterface**

     {
    /* Métodos */

abstract public [getIncrement](#mongodb-bson-timestampinterface.getincrement)(): [int](#language.types.integer)
abstract public [getTimestamp](#mongodb-bson-timestampinterface.gettimestamp)(): [int](#language.types.integer)
abstract public [\_\_toString](#mongodb-bson-timestampinterface.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0

            Los tipos de retorno previamente declarados como provisionales ahora son aplicados.






PECL mongodb 1.15.0

    Los tipos de retorno de los métodos son declarados como provisionales en PHP 8.0 y posteriores,
    lo que desencadena avisos de depreciación en el código que implementa esta interfaz sin declarar
    los tipos de retorno apropiados.
    El atributo #[ReturnTypeWillChange] puede ser añadido
    para ignorar la notificación de depreciación.







# MongoDB\BSON\TimestampInterface::getIncrement

(mongodb &gt;=1.3.0)

MongoDB\BSON\TimestampInterface::getIncrement — Devuelve el componente de incremento de este TimestampInterface

### Descripción

abstract public **MongoDB\BSON\TimestampInterface::getIncrement**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el componente de incremento de este TimestampInterface.

**Advertencia**

    En sistemas de 32 bits, este método puede devolver un número negativo.
    Aunque las partes de incremento y de timestamp del tipo BSON timestamp
    consisten en dos valores de 32 bits sin signo, PHP no puede representarlos en
    plataformas de 32 bits.

### Ver también

- [MongoDB\BSON\Timestamp::getIncrement()](#mongodb-bson-timestamp.getincrement) - Devuelve el componente de incremento de este Timestamp

# MongoDB\BSON\TimestampInterface::getTimestamp

(mongodb &gt;=1.3.0)

MongoDB\BSON\TimestampInterface::getTimestamp — Devuelve el componente de timestamp de TimestampInterface

### Descripción

abstract public **MongoDB\BSON\TimestampInterface::getTimestamp**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el componente de timestamp de TimestampInterface.

**Advertencia**

    En sistemas de 32 bits, este método puede devolver un número negativo.
    Aunque las partes de incremento y timestamp del tipo timestamp BSON
    consisten en dos valores de 32 bits sin signo, PHP no puede representarlos en plataformas de 32 bits.

### Ver también

- [MongoDB\BSON\Timestamp::getTimestamp()](#mongodb-bson-timestamp.gettimestamp) - Devuelve el componente de timestamp de Timestamp

# MongoDB\BSON\TimestampInterface::\_\_toString

(mongodb &gt;=1.3.0)

MongoDB\BSON\TimestampInterface::\_\_toString — Devuelve la representación en forma de string de TimestampInterface

### Descripción

abstract public **MongoDB\BSON\TimestampInterface::\_\_toString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación en forma de string de TimestampInterface.

### Ver también

- [MongoDB\BSON\Timestamp::\_\_toString()](#mongodb-bson-timestamp.tostring) - Devuelve la representación en forma de string de este timestamp

## Tabla de contenidos

- [MongoDB\BSON\TimestampInterface::getIncrement](#mongodb-bson-timestampinterface.getincrement) — Devuelve el componente de incremento de este TimestampInterface
- [MongoDB\BSON\TimestampInterface::getTimestamp](#mongodb-bson-timestampinterface.gettimestamp) — Devuelve el componente de timestamp de TimestampInterface
- [MongoDB\BSON\TimestampInterface::\_\_toString](#mongodb-bson-timestampinterface.tostring) — Devuelve la representación en forma de string de TimestampInterface

# La interfaz MongoDB\BSON\UTCDateTimeInterface

(mongodb &gt;=1.3.0)

## Introducción

    Esta interfaz es implementada por [MongoDB\BSON\UTCDateTime](#class.mongodb-bson-utcdatetime) para ser utilizada como
    tipo de argumento, de retorno o de propiedad en las clases de usuario.

## Sinopsis de la Clase

    ****


      class **MongoDB\BSON\UTCDateTimeInterface**

     {
    /* Métodos */

abstract public [toDateTime](#mongodb-bson-utcdatetimeinterface.todatetime)(): [DateTime](#class.datetime)
abstract public [toDateTimeImmutable](#mongodb-bson-utcdatetimeinterface.todatetimeimmutable)(): [DateTimeImmutable](#class.datetimeimmutable)
abstract public [\_\_toString](#mongodb-bson-utcdatetimeinterface.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0

            Los tipos de retorno previamente declarados como provisionales ahora son aplicados.






PECL mongodb 1.15.0

    Los tipos de retorno de los métodos son declarados como provisionales en PHP 8.0 y posteriores,
    lo que desencadena avisos de depreciación en el código que implementa esta interfaz sin declarar
    los tipos de retorno apropiados.
    El atributo #[ReturnTypeWillChange] puede ser añadido
    para ignorar la notificación de depreciación.







# MongoDB\BSON\UTCDateTimeInterface::toDateTime

(mongodb &gt;=1.3.0)

MongoDB\BSON\UTCDateTimeInterface::toDateTime — Devuelve la representación DateTime de UTCDateTimeInterface

### Descripción

abstract public **MongoDB\BSON\UTCDateTimeInterface::toDateTime**(): [DateTime](#class.datetime)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación [DateTime](#class.datetime) de esta
UTCDateTimeInterface. El [DateTime](#class.datetime) debería utilizar
el huso horario UTC.

### Ver también

- [MongoDB\BSON\UTCDateTime::toDateTime()](#mongodb-bson-utcdatetime.todatetime) - Devuelve la representación DateTime de este UTCDateTime

# MongoDB\BSON\UTCDateTimeInterface::toDateTimeImmutable

(mongodb &gt;=2.0.0)

MongoDB\BSON\UTCDateTimeInterface::toDateTimeImmutable — Devuelve la representación DateTimeImmutable de esta UTCDateTimeInterface

### Descripción

abstract public **MongoDB\BSON\UTCDateTimeInterface::toDateTimeImmutable**(): [DateTimeImmutable](#class.datetimeimmutable)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación [DateTimeImmutable](#class.datetimeimmutable) de esta
UTCDateTimeInterface. La [DateTimeImmutable](#class.datetimeimmutable) devuelta utilizará la zona horaria UTC.

### Ver también

- [MongoDB\BSON\UTCDateTime::toDateTimeImmutable()](#mongodb-bson-utcdatetime.todatetimeimmutable) - Devuelve la representación DateTimeImmutable de esta UTCDateTime

# MongoDB\BSON\UTCDateTimeInterface::\_\_toString

(mongodb &gt;=1.3.0)

MongoDB\BSON\UTCDateTimeInterface::\_\_toString — Devuelve la representación en forma de string de UTCDateTimeInterface

### Descripción

abstract public **MongoDB\BSON\UTCDateTimeInterface::\_\_toString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación en forma de string de UTCDateTimeInterface.

### Ver también

- [MongoDB\BSON\UTCDateTime::\_\_toString()](#mongodb-bson-utcdatetime.tostring) - Devuelve la representación en forma de string de este UTCDateTime

## Tabla de contenidos

- [MongoDB\BSON\UTCDateTimeInterface::toDateTime](#mongodb-bson-utcdatetimeinterface.todatetime) — Devuelve la representación DateTime de UTCDateTimeInterface
- [MongoDB\BSON\UTCDateTimeInterface::toDateTimeImmutable](#mongodb-bson-utcdatetimeinterface.todatetimeimmutable) — Devuelve la representación DateTimeImmutable de esta UTCDateTimeInterface
- [MongoDB\BSON\UTCDateTimeInterface::\_\_toString](#mongodb-bson-utcdatetimeinterface.tostring) — Devuelve la representación en forma de string de UTCDateTimeInterface

# La clase MongoDB\BSON\DBPointer

(mongodb &gt;=1.4.0)

## Introducción

    El tipo BSON para el tipo "DBPointer". Este tipo BSON está deprecado, y esta
    clase no puede ser instanciada. Será creada a partir de un tipo BSON DBPointer
    durante la conversión BSON a PHP, y puede también ser convertida en
    BSON durante el almacenamiento de documentos en la base de datos.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\BSON\DBPointer**


     implements
       [MongoDB\BSON\Type](#class.mongodb-bson-type),  [JsonSerializable](#class.jsonserializable),  [Stringable](#class.stringable) {


    /* Métodos */

final private [\_\_construct](#mongodb-bson-dbpointer.construct)()
final public [jsonSerialize](#mongodb-bson-dbpointer.jsonserialize)(): [mixed](#language.types.mixed)
final public [\_\_toString](#mongodb-bson-dbpointer.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0


                Esta clase ya no implementa la interfaz
                [Serializable](#class.serializable).








        PECL mongodb 1.12.0

         Implementa [Stringable](#class.stringable) para PHP 8.0+.






# MongoDB\BSON\DBPointer::\_\_construct

(mongodb &gt;=1.4.0)

MongoDB\BSON\DBPointer::\_\_construct — Construye un nuevo DBPointer (no utilizado)

### Descripción

final private **MongoDB\BSON\DBPointer::\_\_construct**()

Los objetos [MongoDB\BSON\DBPointer](#class.mongodb-bson-dbpointer) son creados a través
de una conversión desde un tipo BSON obsoleto y no pueden ser construidos directamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\DBPointer::jsonSerialize

(mongodb &gt;=1.4.0)

MongoDB\BSON\DBPointer::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

final public **MongoDB\BSON\DBPointer::jsonSerialize**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve datos que pueden ser serializados por [json_encode()](#function.json-encode)
para producir una representación JSON extendida de
[MongoDB\BSON\DBPointer](#class.mongodb-bson-dbpointer).

**Nota**:

La salida es coherente con la función [MongoDB\BSON\toJSON()](#function.mongodb.bson-tojson),
que utiliza el formato JSON extendido específico del controlador. Esto no corresponde
necesariamente a las representaciones JSON extendidas
[» relajadas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example)
o [» canónicas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example)
utilizadas por [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) y
[MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson), respectivamente.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize) - Especifica los datos que deben ser serializados en JSON

- [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» MongoDB JSON Extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

# MongoDB\BSON\DBPointer::\_\_toString

(mongodb &gt;=1.4.0)

MongoDB\BSON\DBPointer::\_\_toString — Devuelve un string vacío

### Descripción

final public **MongoDB\BSON\DBPointer::\_\_toString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string vacío.

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

## Tabla de contenidos

- [MongoDB\BSON\DBPointer::\_\_construct](#mongodb-bson-dbpointer.construct) — Construye un nuevo DBPointer (no utilizado)
- [MongoDB\BSON\DBPointer::jsonSerialize](#mongodb-bson-dbpointer.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [MongoDB\BSON\DBPointer::\_\_toString](#mongodb-bson-dbpointer.tostring) — Devuelve un string vacío

# La clase MongoDB\BSON\Int64

(mongodb &gt;=1.5.0)

## Introducción

    Tipo BSON para un entero de 64 bits. Al decodificar BSON en datos PHP, esta clase
    se utiliza cuando un entero de 64 bits no puede ser representado como un entero PHP en
    plataformas de 32 bits. Estos objetos soportan los operadores
    [aritméticos](#language.operators.arithmetic),
    [a nivel de bits](#language.operators.bitwise), y
    [comparación](#language.operators.comparison) sobrecargados.




    Al trabajar con datos BSON sin tratar a través de las clases
    [MongoDB\BSON\Document](#class.mongodb-bson-document),
    [MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray), y
    [MongoDB\BSON\Iterator](#class.mongodb-bson-iterator), cualquier entero de 64 bits
    será devuelto como una instancia de esta clase, independientemente de la plataforma y
    de la posibilidad de representar el valor como un entero PHP. Esto garantiza que
    los valores pueden ser recorridos sin cambiar el tipo.




    Al codificar BSON, los objetos de esta clase serán convertidos en un tipo entero
    64 bits, incluso cuando el valor podría caber en un entero de 32 bits. Esto
    permite almacenar explícitamente valores como enteros de 64 bits en BSON.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\BSON\Int64**


     implements
       [MongoDB\BSON\Type](#class.mongodb-bson-type),  [JsonSerializable](#class.jsonserializable),  [Stringable](#class.stringable) {


    /* Métodos */

final public [\_\_construct](#mongodb-bson-int64.construct)([int](#language.types.integer)|[string](#language.types.string) $value)
final public [jsonSerialize](#mongodb-bson-int64.jsonserialize)(): [mixed](#language.types.mixed)
final public [\_\_toString](#mongodb-bson-int64.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0


                Esta clase ya no implementa la interfaz
                [Serializable](#class.serializable).








        PECL mongodb 1.16.0

         Esta clase puede ahora ser instanciada en todas las plataformas. Se añade soporte para
         los operadores aritméticos, a nivel de bits, y de comparación sobrecargados.




        PECL mongodb 1.12.0

         Implementa [Stringable](#class.stringable) para PHP 8.0+.






# MongoDB\BSON\Int64::\_\_construct

(mongodb &gt;=1.5.0)

MongoDB\BSON\Int64::\_\_construct — Construye un nuevo Int64

### Descripción

final public **MongoDB\BSON\Int64::\_\_construct**([int](#language.types.integer)|[string](#language.types.string) $value)

Crea una nueva instancia de [MongoDB\BSON\Int64](#class.mongodb-bson-int64) para el
valor entero dado.

### Parámetros

    value ([int](#language.types.integer)|[string](#language.types.string))


      El valor a asignar a la instancia de **Int64**. Este
      valor puede ser proporcionado como [int](#language.types.integer) o [string](#language.types.string),
      siendo este último requerido en plataformas de 32 bits para representar valores de 64 bits.


### Historial de cambios

       Versión
       Descripción






       PECL mongodb 1.16.0


         Este método se hizo público para soportar la creación de instancias Int64 durante la manipulación de BSON sin tratar.








### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

- Lanza una [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) si el string
  value no puede ser analizado como un entero de 64 bits.

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Int64::jsonSerialize

(mongodb &gt;=1.5.0)

MongoDB\BSON\Int64::jsonSerialize — Devuelve una representación que puede ser convertida a JSON

### Descripción

final public **MongoDB\BSON\Int64::jsonSerialize**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve datos que pueden ser serializados por [json_encode()](#function.json-encode)
para producir una representación JSON extendida de
[MongoDB\BSON\Int64](#class.mongodb-bson-int64).

**Nota**:

    La salida es concordante con la función
    [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson), que
    utiliza el formato JSON extendido
    [» canonical](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example).
    Esto difiere de otras clases BDON, que utilizan el formato
    JSON extendido heredado del controlador específico
    ([MongoDB\BSON\toJSON()](#function.mongodb.bson-tojson)), para asegurar que los
    valores enteros de 64 bits sean correctamente representados en plataformas de 32 bits.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize) - Especifica los datos que deben ser serializados en JSON

- [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» MongoDB JSON Extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

# MongoDB\BSON\Int64::\_\_toString

(mongodb &gt;=1.5.0)

MongoDB\BSON\Int64::\_\_toString — Devuelve la representación en forma de string de Int64

### Descripción

final public **MongoDB\BSON\Int64::\_\_toString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación en forma de string de Int64.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\BSON\Int64::\_\_toString()**

&lt;?php

$int64 = new MongoDB\BSON\Int64('9223372036854775807');

var_dump((string) $int64);

?&gt;

Resultado del ejemplo anterior es similar a:

string(19) "9223372036854775807"

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

## Tabla de contenidos

- [MongoDB\BSON\Int64::\_\_construct](#mongodb-bson-int64.construct) — Construye un nuevo Int64
- [MongoDB\BSON\Int64::jsonSerialize](#mongodb-bson-int64.jsonserialize) — Devuelve una representación que puede ser convertida a JSON
- [MongoDB\BSON\Int64::\_\_toString](#mongodb-bson-int64.tostring) — Devuelve la representación en forma de string de Int64

# La clase MongoDB\BSON\Symbol

(mongodb &gt;=1.4.0)

## Introducción

    Tipo BSON para el tipo "Symbol". Este tipo BSON está deprecado, y esta
    clase no puede ser instanciada. Será creada a partir de un tipo
    symbol BSON durante la conversión BSON a PHP, y puede también ser
    convertida en BSON durante el almacenamiento de documentos en la base de datos.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\BSON\Symbol**


     implements
       [MongoDB\BSON\Type](#class.mongodb-bson-type),  [JsonSerializable](#class.jsonserializable),  [Stringable](#class.stringable) {


    /* Métodos */

final private [\_\_construct](#mongodb-bson-symbol.construct)()
final public [jsonSerialize](#mongodb-bson-symbol.jsonserialize)(): [mixed](#language.types.mixed)
final public [\_\_toString](#mongodb-bson-symbol.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0


                Esta clase ya no implementa la interfaz
                [Serializable](#class.serializable).








        PECL mongodb 1.12.0

         Implementa [Stringable](#class.stringable) para PHP 8.0+.






# MongoDB\BSON\Symbol::\_\_construct

(mongodb &gt;=1.4.0)

MongoDB\BSON\Symbol::\_\_construct — Construye un nuevo Symbol (no utilizado)

### Descripción

final private **MongoDB\BSON\Symbol::\_\_construct**()

Los objetos [MongoDB\BSON\Symbol](#class.mongodb-bson-symbol) se crean a través de una
conversión desde un tipo BSON obsoleto y no pueden ser construidos directamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Symbol::jsonSerialize

(mongodb &gt;=1.4.0)

MongoDB\BSON\Symbol::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

final public **MongoDB\BSON\Symbol::jsonSerialize**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve datos que pueden ser serializados por [json_encode()](#function.json-encode)
para producir una representación JSON extendida de
[MongoDB\BSON\Symbol](#class.mongodb-bson-symbol).

**Nota**:

La salida es coherente con la función [MongoDB\BSON\toJSON()](#function.mongodb.bson-tojson),
que utiliza el formato JSON extendido específico del controlador. Esto no corresponde
necesariamente a las representaciones JSON extendidas
[» relajadas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example)
o [» canónicas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example)
utilizadas por [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) y
[MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson), respectivamente.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize) - Especifica los datos que deben ser serializados en JSON

- [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» MongoDB JSON Extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

# MongoDB\BSON\Symbol::\_\_toString

(mongodb &gt;=1.4.0)

MongoDB\BSON\Symbol::\_\_toString — Devuelve la representación en forma de string de Symbol

### Descripción

final public **MongoDB\BSON\Symbol::\_\_toString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la representación en forma de string de Symbol.

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

## Tabla de contenidos

- [MongoDB\BSON\Symbol::\_\_construct](#mongodb-bson-symbol.construct) — Construye un nuevo Symbol (no utilizado)
- [MongoDB\BSON\Symbol::jsonSerialize](#mongodb-bson-symbol.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [MongoDB\BSON\Symbol::\_\_toString](#mongodb-bson-symbol.tostring) — Devuelve la representación en forma de string de Symbol

# La clase MongoDB\BSON\Undefined

(mongodb &gt;=1.4.0)

## Introducción

    Tipo BSON para el tipo "Undefined". Este tipo BSON está deprecado, y esta
    clase no puede ser instanciada. Será creada a partir de un tipo BSON undefined
    durante la conversión BSON a PHP, y puede ser también convertida en BSON
    durante el almacenamiento de documentos en la base de datos.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\BSON\Undefined**


     implements
       [MongoDB\BSON\Type](#class.mongodb-bson-type),  [JsonSerializable](#class.jsonserializable),  [Stringable](#class.stringable) {


    /* Métodos */

final private [\_\_construct](#mongodb-bson-undefined.construct)()
final public [jsonSerialize](#mongodb-bson-undefined.jsonserialize)(): [mixed](#language.types.mixed)
final public [\_\_toString](#mongodb-bson-undefined.tostring)(): [string](#language.types.string)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0


                Esta clase ya no implementa la interfaz
                [Serializable](#class.serializable).








        PECL mongodb 1.12.0

         Implementa [Stringable](#class.stringable) para PHP 8.0+.






# MongoDB\BSON\Undefined::\_\_construct

(mongodb &gt;=1.4.0)

MongoDB\BSON\Undefined::\_\_construct — Construye un nuevo Undefined (no utilizado)

### Descripción

final private **MongoDB\BSON\Undefined::\_\_construct**()

Los objetos [MongoDB\BSON\Undefined](#class.mongodb-bson-undefined) se crean a través de
una conversión desde un tipo BSON obsoleto y no pueden ser construidos directamente.

### Parámetros

Esta función no contiene ningún parámetro.

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

# MongoDB\BSON\Undefined::jsonSerialize

(mongodb &gt;=1.4.0)

MongoDB\BSON\Undefined::jsonSerialize — Devuelve una representación que puede ser convertida en JSON

### Descripción

final public **MongoDB\BSON\Undefined::jsonSerialize**(): [mixed](#language.types.mixed)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve datos que pueden ser serializados por [json_encode()](#function.json-encode)
para producir una representación JSON extendida de
[MongoDB\BSON\Undefined](#class.mongodb-bson-undefined).

**Nota**:

La salida es coherente con la función [MongoDB\BSON\toJSON()](#function.mongodb.bson-tojson),
que utiliza el formato JSON extendido específico del controlador. Esto no corresponde
necesariamente a las representaciones JSON extendidas
[» relajadas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#relaxed-extended-json-example)
o [» canónicas](https://github.com/mongodb/specifications/blob/master/source/extended-json/extended-json.md#canonical-extended-json-example)
utilizadas por [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) y
[MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson), respectivamente.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [JsonSerializable::jsonSerialize()](#jsonserializable.jsonserialize) - Especifica los datos que deben ser serializados en JSON

- [json_encode()](#function.json-encode) - Retorna la representación JSON de un valor

- [MongoDB\BSON\toCanonicalExtendedJSON()](#function.mongodb.bson-tocanonicalextendedjson) - Devuelve la representación JSON extendida canónica de un valor BSON

- [MongoDB\BSON\toRelaxedExtendedJSON()](#function.mongodb.bson-torelaxedextendedjson) - Devuelve la representación JSON extendida relajada de un valor BSON

- [» MongoDB JSON Extendido](https://www.mongodb.com/docs/manual/reference/mongodb-extended-json/)

# MongoDB\BSON\Undefined::\_\_toString

(mongodb &gt;=1.4.0)

MongoDB\BSON\Undefined::\_\_toString — Devuelve un string vacío

### Descripción

final public **MongoDB\BSON\Undefined::\_\_toString**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string vacío.

### Ver también

- [» Tipos BSON](https://www.mongodb.com/docs/manual/reference/bson-types/)

## Tabla de contenidos

- [MongoDB\BSON\Undefined::\_\_construct](#mongodb-bson-undefined.construct) — Construye un nuevo Undefined (no utilizado)
- [MongoDB\BSON\Undefined::jsonSerialize](#mongodb-bson-undefined.jsonserialize) — Devuelve una representación que puede ser convertida en JSON
- [MongoDB\BSON\Undefined::\_\_toString](#mongodb-bson-undefined.tostring) — Devuelve un string vacío

    # Monitorización de clases y funciones de suscriptor

## Tabla de contenidos

- [Funciones](#ref.monitoring.functions)
- [MongoDB\Driver\Monitoring\CommandFailedEvent](#class.mongodb-driver-monitoring-commandfailedevent)
- [MongoDB\Driver\Monitoring\CommandStartedEvent](#class.mongodb-driver-monitoring-commandstartedevent)
- [MongoDB\Driver\Monitoring\CommandSucceededEvent](#class.mongodb-driver-monitoring-commandsucceededevent)
- [MongoDB\Driver\Monitoring\ServerChangedEvent](#class.mongodb-driver-monitoring-serverchangedevent)
- [MongoDB\Driver\Monitoring\ServerClosedEvent](#class.mongodb-driver-monitoring-serverclosedevent)
- [MongoDB\Driver\Monitoring\ServerOpeningEvent](#class.mongodb-driver-monitoring-serveropeningevent)
- [MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent](#class.mongodb-driver-monitoring-serverheartbeatfailedevent)
- [MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent](#class.mongodb-driver-monitoring-serverheartbeatstartedevent)
- [MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent](#class.mongodb-driver-monitoring-serverheartbeatsucceededevent)
- [MongoDB\Driver\Monitoring\TopologyChangedEvent](#class.mongodb-driver-monitoring-topologychangedevent)
- [MongoDB\Driver\Monitoring\TopologyClosedEvent](#class.mongodb-driver-monitoring-topologyclosedevent)
- [MongoDB\Driver\Monitoring\TopologyOpeningEvent](#class.mongodb-driver-monitoring-topologyopeningevent)
- [MongoDB\Driver\Monitoring\CommandSubscriber](#class.mongodb-driver-monitoring-commandsubscriber)
- [MongoDB\Driver\Monitoring\SDAMSubscriber](#class.mongodb-driver-monitoring-sdamsubscriber)
- [MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber)

    # Funciones

    # MongoDB\Driver\Monitoring\addSubscriber

    (mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\addSubscriber — Registra una suscripción de supervisión de eventos

### Descripción

**MongoDB\Driver\Monitoring\addSubscriber**([MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber) $subscriber): [void](language.types.void.html)

Registra una suscripción de supervisión de eventos global.
Los suscriptores serán notificados de todos los eventos en la extensión
para cualquier tipo de Manager.

**Nota**:

    Si subscriber ya está registrado globalmente, esta
    función no realiza ninguna operación. Si subscriber también
    está registrado para uno o más Managers, será notificado solo una vez por evento para cada Manager.

### Parámetros

    subscriber ([MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber))


      Un objeto de suscripción de supervisión de eventos para registrar globalmente.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\removeSubscriber()](#function.mongodb.driver.monitoring.removesubscriber) - Elimina una suscripción de monitoreo de eventos global

- [MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber)

- [MongoDB\Driver\Monitoring\CommandSubscriber](#class.mongodb-driver-monitoring-commandsubscriber)

- [MongoDB\Driver\Manager::addSubscriber()](#mongodb-driver-manager.addsubscriber) - Registra un observador de eventos de monitoreo con este manager

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\removeSubscriber

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\removeSubscriber — Elimina una suscripción de monitoreo de eventos global

### Descripción

**MongoDB\Driver\Monitoring\removeSubscriber**([MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber) $subscriber): [void](language.types.void.html)

Elimina una suscripción de monitoreo de eventos global.

**Nota**:

    Si subscriber no está ya registrado,
    esta función no realiza ninguna operación.

### Parámetros

    subscriber ([MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber))


      Una suscripción de monitoreo de eventos a eliminar globalmente.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\addSubscriber()](#function.mongodb.driver.monitoring.addsubscriber) - Registra una suscripción de supervisión de eventos

- [MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber)

- [MongoDB\Driver\Monitoring\CommandSubscriber](#class.mongodb-driver-monitoring-commandsubscriber)

- [MongoDB\Driver\Manager::removeSubscriber()](#mongodb-driver-manager.removesubscriber) - Elimina un observador de eventos de supervisión de este Manager

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

## Tabla de contenidos

- [MongoDB\Driver\Monitoring\addSubscriber](#function.mongodb.driver.monitoring.addsubscriber) — Registra una suscripción de supervisión de eventos
- [MongoDB\Driver\Monitoring\removeSubscriber](#function.mongodb.driver.monitoring.removesubscriber) — Elimina una suscripción de monitoreo de eventos global

# La clase MongoDB\Driver\Monitoring\CommandFailedEvent

(mongodb &gt;=1.3.0)

## Introducción

    La clase **MongoDB\Driver\Monitoring\CommandFailedEvent**
    contiene la información sobre una comando que ha fallado.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Monitoring\CommandFailedEvent**

     {


    /* Métodos */

final public [getCommandName](#mongodb-driver-monitoring-commandfailedevent.getcommandname)(): [string](#language.types.string)
final public [getDatabaseName](#mongodb-driver-monitoring-commandfailedevent.getdatabasename)(): [string](#language.types.string)
final public [getDurationMicros](#mongodb-driver-monitoring-commandfailedevent.getdurationmicros)(): [int](#language.types.integer)
final public [getError](#mongodb-driver-monitoring-commandfailedevent.geterror)(): [Exception](#class.exception)
final public [getHost](#mongodb-driver-monitoring-commandfailedevent.gethost)(): [string](#language.types.string)
final public [getOperationId](#mongodb-driver-monitoring-commandfailedevent.getoperationid)(): [string](#language.types.string)
final public [getPort](#mongodb-driver-monitoring-commandfailedevent.getport)(): [int](#language.types.integer)
final public [getReply](#mongodb-driver-monitoring-commandfailedevent.getreply)(): [object](#language.types.object)
final public [getRequestId](#mongodb-driver-monitoring-commandfailedevent.getrequestid)(): [string](#language.types.string)
final public [getServer](#mongodb-driver-monitoring-commandfailedevent.getserver)(): [MongoDB\Driver\Server](#class.mongodb-driver-server)
final public [getServerConnectionId](#mongodb-driver-monitoring-commandfailedevent.getserverconnectionid)(): [?](#language.types.null)[int](#language.types.integer)
final public [getServiceId](#mongodb-driver-monitoring-commandfailedevent.getserviceid)(): [?](#language.types.null)[MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

}

# MongoDB\Driver\Monitoring\CommandFailedEvent::getCommandName

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandFailedEvent::getCommandName — Devuelve el nombre de la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandFailedEvent::getCommandName**(): [string](#language.types.string)

Devuelve el nombre de la orden (por ejemplo "find",
"aggregate").

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de la orden.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandFailedEvent::getDatabaseName

(mongodb &gt;=1.19.0)

MongoDB\Driver\Monitoring\CommandFailedEvent::getDatabaseName — Devuelve el nombre de la base de datos sobre la cual se ejecutó el comando

### Descripción

final public **MongoDB\Driver\Monitoring\CommandFailedEvent::getDatabaseName**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la base de datos sobre la cual se ejecutó el comando.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandFailedEvent::getDurationMicros

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandFailedEvent::getDurationMicros — Devuelve la duración de la orden en microsegundos

### Descripción

final public **MongoDB\Driver\Monitoring\CommandFailedEvent::getDurationMicros**(): [int](#language.types.integer)

La duración de la orden es un valor calculado que incluye el tiempo para enviar
el mensaje y recibir la respuesta del servidor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la duración de la orden en microsegundos.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandFailedEvent::getError

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandFailedEvent::getError — Devuelve la excepción asociada al comando fallido

### Descripción

final public **MongoDB\Driver\Monitoring\CommandFailedEvent::getError**(): [Exception](#class.exception)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la [Exception](#class.exception) asociada al comando fallido.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandFailedEvent::getHost

(mongodb &gt;=1.20.0)

MongoDB\Driver\Monitoring\CommandFailedEvent::getHost — Devuelve el nombre de host del servidor para la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandFailedEvent::getHost**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de host del servidor en el que se ejecutó la orden.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\CommandFailedEvent::getOperationId

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandFailedEvent::getOperationId — Devuelve el identificador de la operación de la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandFailedEvent::getOperationId**(): [string](#language.types.string)

El ID de la operación es generado por la extensión y puede ser utilizado para ligar eventos
juntos, como operaciones de escritura masiva, que pueden haber sido divididas en varias
órdenes a nivel de protocolo.

**Nota**:

    Dado que varias órdenes pueden compartir el mismo ID de operación, no es fiable
    utilizar este valor para asociar objetos de evento entre sí. El ID de petición
    devuelto por
    [MongoDB\Driver\Monitoring\CommandFailedEvent::getRequestId()](#mongodb-driver-monitoring-commandfailedevent.getrequestid)
    debería ser utilizado en su lugar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador de la operación de la orden.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\CommandStartedEvent::getOperationId()](#mongodb-driver-monitoring-commandstartedevent.getoperationid) - Devuelve el identificador de la operación de la orden

- [MongoDB\Driver\Monitoring\CommandFailedEvent::getRequestId()](#mongodb-driver-monitoring-commandfailedevent.getrequestid) - Devuelve el identificador de la petición de la orden

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandFailedEvent::getPort

(mongodb &gt;=1.20.0)

MongoDB\Driver\Monitoring\CommandFailedEvent::getPort — Devuelve el puerto del servidor para la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandFailedEvent::getPort**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el puerto del servidor en el cual la orden fue ejecutada.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\CommandFailedEvent::getReply

(mongodb &gt;=1.5.0)

MongoDB\Driver\Monitoring\CommandFailedEvent::getReply — Devuelve el documento de respuesta del comando

### Descripción

final public **MongoDB\Driver\Monitoring\CommandFailedEvent::getReply**(): [object](#language.types.object)

El documento de respuesta será convertido de BSON a PHP utilizando las reglas de
[deserialización](#mongodb.persistence.deserialization)
por omisión (por ejemplo, los documentos BSON serán convertidos en [stdClass](#class.stdclass)).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el documento de respuesta del comando en forma de un
objeto [stdClass](#class.stdclass).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

- [Persistir datos](#mongodb.persistence)

# MongoDB\Driver\Monitoring\CommandFailedEvent::getRequestId

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandFailedEvent::getRequestId — Devuelve el identificador de la petición de la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandFailedEvent::getRequestId**(): [string](#language.types.string)

El identificador de la petición es generado por la extensión y puede ser utilizado para asociar
este [MongoDB\Driver\Monitoring\CommandFailedEvent](#class.mongodb-driver-monitoring-commandfailedevent) con un
[MongoDB\Driver\Monitoring\CommandStartedEvent](#class.mongodb-driver-monitoring-commandstartedevent) anterior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador de la petición de la orden.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\CommandStartedEvent::getRequestId()](#mongodb-driver-monitoring-commandstartedevent.getrequestid) - Devuelve el identificador de la solicitud de la orden

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandFailedEvent::getServer

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandFailedEvent::getServer — Devuelve el servidor en el cual se ejecutó el comando

**Advertencia**

    Este método ha sido *DEPRECADO* a partir de la versión
    1.20.0 de la extensión y ha sido eliminado en la versión 2.0. Las aplicaciones deben utilizar
    [MongoDB\Driver\Monitoring\CommandFailedEvent::getHost()](#mongodb-driver-monitoring-commandfailedevent.gethost)
    y
    [MongoDB\Driver\Monitoring\CommandFailedEvent::getPort()](#mongodb-driver-monitoring-commandfailedevent.getport)
    en su lugar.

### Descripción

final public **MongoDB\Driver\Monitoring\CommandFailedEvent::getServer**(): [MongoDB\Driver\Server](#class.mongodb-driver-server)

Devuelve el [MongoDB\Driver\Server](#class.mongodb-driver-server) en el cual se ejecutó el comando.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el [MongoDB\Driver\Server](#class.mongodb-driver-server) en el cual se ejecutó el comando.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0

            Este método ha sido eliminado.






### Ver también

- [MongoDB\Driver\Monitoring\CommandStartedEvent::getServer()](#mongodb-driver-monitoring-commandstartedevent.getserver) - Devuelve el servidor en el que se ejecutó el comando

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandFailedEvent::getServerConnectionId

(mongodb &gt;=1.14.0)

MongoDB\Driver\Monitoring\CommandFailedEvent::getServerConnectionId — Devuelve el identificador de conexión del servidor para la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandFailedEvent::getServerConnectionId**(): [?](#language.types.null)[int](#language.types.integer)

Devuelve el identificador de conexión del servidor para la orden. El identificador de conexión del servidor es
distinto del servidor (es decir,
[MongoDB\Driver\Monitoring\CommandFailedEvent::getServer()](#mongodb-driver-monitoring-commandfailedevent.getserver))
y es devuelto en el campo "connectionId" de una respuesta de orden hello
MongoDB 4.2+.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador de conexión del servidor, o **[null](#constant.null)** si no está disponible.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\CommandFailedEvent::getServiceId

(mongodb &gt;=1.11.0)

MongoDB\Driver\Monitoring\CommandFailedEvent::getServiceId — Devuelve el identificador del servicio del equilibrador de carga para la comanda

### Descripción

final public **MongoDB\Driver\Monitoring\CommandFailedEvent::getServiceId**(): [?](#language.types.null)[MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

Cuando el controlador está conectado a un clúster MongoDB a través de un equilibrador de carga,
el identificador del servicio corresponde al campo serviceId en la
respuesta de la comanda hello.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador del servicio del equilibrador de carga, o **[null](#constant.null)** si el controlador no está
conectado a un equilibrador de carga.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

## Tabla de contenidos

- [MongoDB\Driver\Monitoring\CommandFailedEvent::getCommandName](#mongodb-driver-monitoring-commandfailedevent.getcommandname) — Devuelve el nombre de la orden
- [MongoDB\Driver\Monitoring\CommandFailedEvent::getDatabaseName](#mongodb-driver-monitoring-commandfailedevent.getdatabasename) — Devuelve el nombre de la base de datos sobre la cual se ejecutó el comando
- [MongoDB\Driver\Monitoring\CommandFailedEvent::getDurationMicros](#mongodb-driver-monitoring-commandfailedevent.getdurationmicros) — Devuelve la duración de la orden en microsegundos
- [MongoDB\Driver\Monitoring\CommandFailedEvent::getError](#mongodb-driver-monitoring-commandfailedevent.geterror) — Devuelve la excepción asociada al comando fallido
- [MongoDB\Driver\Monitoring\CommandFailedEvent::getHost](#mongodb-driver-monitoring-commandfailedevent.gethost) — Devuelve el nombre de host del servidor para la orden
- [MongoDB\Driver\Monitoring\CommandFailedEvent::getOperationId](#mongodb-driver-monitoring-commandfailedevent.getoperationid) — Devuelve el identificador de la operación de la orden
- [MongoDB\Driver\Monitoring\CommandFailedEvent::getPort](#mongodb-driver-monitoring-commandfailedevent.getport) — Devuelve el puerto del servidor para la orden
- [MongoDB\Driver\Monitoring\CommandFailedEvent::getReply](#mongodb-driver-monitoring-commandfailedevent.getreply) — Devuelve el documento de respuesta del comando
- [MongoDB\Driver\Monitoring\CommandFailedEvent::getRequestId](#mongodb-driver-monitoring-commandfailedevent.getrequestid) — Devuelve el identificador de la petición de la orden
- [MongoDB\Driver\Monitoring\CommandFailedEvent::getServer](#mongodb-driver-monitoring-commandfailedevent.getserver) — Devuelve el servidor en el cual se ejecutó el comando
- [MongoDB\Driver\Monitoring\CommandFailedEvent::getServerConnectionId](#mongodb-driver-monitoring-commandfailedevent.getserverconnectionid) — Devuelve el identificador de conexión del servidor para la orden
- [MongoDB\Driver\Monitoring\CommandFailedEvent::getServiceId](#mongodb-driver-monitoring-commandfailedevent.getserviceid) — Devuelve el identificador del servicio del equilibrador de carga para la comanda

# La clase MongoDB\Driver\Monitoring\CommandStartedEvent

(mongodb &gt;=1.3.0)

## Introducción

    La clase **MongoDB\Driver\Monitoring\CommandStartedEvent**
    contiene la información sobre una orden que ha comenzado.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Monitoring\CommandStartedEvent**

     {


    /* Métodos */

final public [getCommand](#mongodb-driver-monitoring-commandstartedevent.getcommand)(): [object](#language.types.object)
final public [getCommandName](#mongodb-driver-monitoring-commandstartedevent.getcommandname)(): [string](#language.types.string)
final public [getDatabaseName](#mongodb-driver-monitoring-commandstartedevent.getdatabasename)(): [string](#language.types.string)
final public [getHost](#mongodb-driver-monitoring-commandstartedevent.gethost)(): [string](#language.types.string)
final public [getOperationId](#mongodb-driver-monitoring-commandstartedevent.getoperationid)(): [string](#language.types.string)
final public [getPort](#mongodb-driver-monitoring-commandstartedevent.getport)(): [int](#language.types.integer)
final public [getRequestId](#mongodb-driver-monitoring-commandstartedevent.getrequestid)(): [string](#language.types.string)
final public [getServer](#mongodb-driver-monitoring-commandstartedevent.getserver)(): [MongoDB\Driver\Server](#class.mongodb-driver-server)
final public [getServerConnectionId](#mongodb-driver-monitoring-commandstartedevent.getserverconnectionid)(): [?](#language.types.null)[int](#language.types.integer)
final public [getServiceId](#mongodb-driver-monitoring-commandstartedevent.getserviceid)(): [?](#language.types.null)[MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

}

# MongoDB\Driver\Monitoring\CommandStartedEvent::getCommand

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandStartedEvent::getCommand — Devuelve el documento de comando

### Descripción

final public **MongoDB\Driver\Monitoring\CommandStartedEvent::getCommand**(): [object](#language.types.object)

El documento devuelto será convertido de BSON a PHP utilizando las reglas de
[deserialización](#mongodb.persistence.deserialization)
por omisión (por ejemplo, los documentos BSON serán convertidos en [stdClass](#class.stdclass)).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el documento de comando en forma de objeto [stdClass](#class.stdclass).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

- [Persistir datos](#mongodb.persistence)

# MongoDB\Driver\Monitoring\CommandStartedEvent::getCommandName

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandStartedEvent::getCommandName — Devuelve el nombre del comando

### Descripción

final public **MongoDB\Driver\Monitoring\CommandStartedEvent::getCommandName**(): [string](#language.types.string)

Devuelve el nombre del comando (por ejemplo, "find",
"aggregate").

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del comando.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandStartedEvent::getDatabaseName

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandStartedEvent::getDatabaseName — Devuelve la base de datos sobre la cual se ejecutó el comando

### Descripción

final public **MongoDB\Driver\Monitoring\CommandStartedEvent::getDatabaseName**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la base de datos sobre la cual se ejecutó el comando.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandStartedEvent::getHost

(mongodb &gt;=1.20.0)

MongoDB\Driver\Monitoring\CommandStartedEvent::getHost — Devuelve el nombre del host del servidor para el comando

### Descripción

final public **MongoDB\Driver\Monitoring\CommandStartedEvent::getHost**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del host del servidor en el que se ejecutó el comando.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\CommandStartedEvent::getOperationId

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandStartedEvent::getOperationId — Devuelve el identificador de la operación de la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandStartedEvent::getOperationId**(): [string](#language.types.string)

El identificador de la operación es generado por la extensión y puede ser utilizado
para vincular eventos juntos, tales como operaciones de escritura en masa, que pueden haber sido divididas en varias órdenes a nivel del
protocolo.

**Nota**:

    Dado que varias órdenes pueden compartir el mismo identificador de operación, no es fiable utilizar este valor para asociar objetos de evento entre sí. El identificador de la petición devuelto por
    [MongoDB\Driver\Monitoring\CommandStartedEvent::getRequestId()](#mongodb-driver-monitoring-commandstartedevent.getrequestid)
    debería ser utilizado en su lugar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador de la operación de la orden.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\CommandFailedEvent::getOperationId()](#mongodb-driver-monitoring-commandfailedevent.getoperationid) - Devuelve el identificador de la operación de la orden

- [MongoDB\Driver\Monitoring\CommandSucceededEvent::getOperationId()](#mongodb-driver-monitoring-commandsucceededevent.getoperationid) - Devuelve el identificador de la operación de la orden

- [MongoDB\Driver\Monitoring\CommandStartedEvent::getRequestId()](#mongodb-driver-monitoring-commandstartedevent.getrequestid) - Devuelve el identificador de la solicitud de la orden

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandStartedEvent::getPort

(mongodb &gt;=1.20.0)

MongoDB\Driver\Monitoring\CommandStartedEvent::getPort — Devuelve el puerto del servidor para la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandStartedEvent::getPort**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el puerto del servidor en el que se ejecutó la orden.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\CommandStartedEvent::getRequestId

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandStartedEvent::getRequestId — Devuelve el identificador de la solicitud de la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandStartedEvent::getRequestId**(): [string](#language.types.string)

El identificador de la solicitud es generado por la extensión y puede ser utilizado
para asociar este evento
[MongoDB\Driver\Monitoring\CommandStartedEvent](#class.mongodb-driver-monitoring-commandstartedevent)
con un
[MongoDB\Driver\Monitoring\CommandFailedEvent](#class.mongodb-driver-monitoring-commandfailedevent) o
[MongoDB\Driver\Monitoring\CommandSucceededEvent](#class.mongodb-driver-monitoring-commandsucceededevent) posterior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador de la solicitud de la orden.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\CommandFailedEvent::getRequestId()](#mongodb-driver-monitoring-commandfailedevent.getrequestid) - Devuelve el identificador de la petición de la orden

- [MongoDB\Driver\Monitoring\CommandSucceededEvent::getRequestId()](#mongodb-driver-monitoring-commandsucceededevent.getrequestid) - Devuelve el identificador de la solicitud de la orden

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandStartedEvent::getServer

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandStartedEvent::getServer — Devuelve el servidor en el que se ejecutó el comando

**Advertencia**

    Este método ha sido *DEPRECADO* a partir de la versión
    1.20.0 de la extensión y ha sido eliminado en la versión 2.0. Las aplicaciones deben utilizar
    [MongoDB\Driver\Monitoring\CommandStartedEvent::getHost()](#mongodb-driver-monitoring-commandstartedevent.gethost)
    y
    [MongoDB\Driver\Monitoring\CommandStartedEvent::getPort()](#mongodb-driver-monitoring-commandstartedevent.getport)
    en su lugar.

### Descripción

final public **MongoDB\Driver\Monitoring\CommandStartedEvent::getServer**(): [MongoDB\Driver\Server](#class.mongodb-driver-server)

Devuelve el [MongoDB\Driver\Server](#class.mongodb-driver-server) en el que se ejecutó el comando.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el [MongoDB\Driver\Server](#class.mongodb-driver-server) en el que se ejecutó el comando.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0

            Este método ha sido eliminado.






### Ver también

- [MongoDB\Driver\Monitoring\CommandFailedEvent::getServer()](#mongodb-driver-monitoring-commandfailedevent.getserver) - Devuelve el servidor en el cual se ejecutó el comando

- [MongoDB\Driver\Monitoring\CommandSucceededEvent::getServer()](#mongodb-driver-monitoring-commandsucceededevent.getserver) - Devuelve el servidor en el cual el comando fue ejecutado

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandStartedEvent::getServerConnectionId

(mongodb &gt;=1.14.0)

MongoDB\Driver\Monitoring\CommandStartedEvent::getServerConnectionId — Devuelve el identificador de conexión del servidor para la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandStartedEvent::getServerConnectionId**(): [?](#language.types.null)[int](#language.types.integer)

Devuelve el identificador de conexión del servidor para la orden. El identificador de conexión del servidor es
distinto del servidor (es decir,
[MongoDB\Driver\Monitoring\CommandFailedEvent::getServer()](#mongodb-driver-monitoring-commandfailedevent.getserver))
y es devuelto en el campo "connectionId" de una respuesta de orden hello
MongoDB 4.2+.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador de conexión del servidor, o **[null](#constant.null)** si no está disponible.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\CommandStartedEvent::getServiceId

(mongodb &gt;=1.11.0)

MongoDB\Driver\Monitoring\CommandStartedEvent::getServiceId — Devuelve el identificador del servicio del equilibrador de carga para la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandStartedEvent::getServiceId**(): [?](#language.types.null)[MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

Cuando el controlador está conectado a un clúster MongoDB a través de un equilibrador de carga,
el identificador del servicio corresponde al campo serviceId en la
respuesta de la orden hello.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador del servicio del equilibrador de carga, o **[null](#constant.null)** si el controlador no está
conectado a un equilibrador de carga.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

## Tabla de contenidos

- [MongoDB\Driver\Monitoring\CommandStartedEvent::getCommand](#mongodb-driver-monitoring-commandstartedevent.getcommand) — Devuelve el documento de comando
- [MongoDB\Driver\Monitoring\CommandStartedEvent::getCommandName](#mongodb-driver-monitoring-commandstartedevent.getcommandname) — Devuelve el nombre del comando
- [MongoDB\Driver\Monitoring\CommandStartedEvent::getDatabaseName](#mongodb-driver-monitoring-commandstartedevent.getdatabasename) — Devuelve la base de datos sobre la cual se ejecutó el comando
- [MongoDB\Driver\Monitoring\CommandStartedEvent::getHost](#mongodb-driver-monitoring-commandstartedevent.gethost) — Devuelve el nombre del host del servidor para el comando
- [MongoDB\Driver\Monitoring\CommandStartedEvent::getOperationId](#mongodb-driver-monitoring-commandstartedevent.getoperationid) — Devuelve el identificador de la operación de la orden
- [MongoDB\Driver\Monitoring\CommandStartedEvent::getPort](#mongodb-driver-monitoring-commandstartedevent.getport) — Devuelve el puerto del servidor para la orden
- [MongoDB\Driver\Monitoring\CommandStartedEvent::getRequestId](#mongodb-driver-monitoring-commandstartedevent.getrequestid) — Devuelve el identificador de la solicitud de la orden
- [MongoDB\Driver\Monitoring\CommandStartedEvent::getServer](#mongodb-driver-monitoring-commandstartedevent.getserver) — Devuelve el servidor en el que se ejecutó el comando
- [MongoDB\Driver\Monitoring\CommandStartedEvent::getServerConnectionId](#mongodb-driver-monitoring-commandstartedevent.getserverconnectionid) — Devuelve el identificador de conexión del servidor para la orden
- [MongoDB\Driver\Monitoring\CommandStartedEvent::getServiceId](#mongodb-driver-monitoring-commandstartedevent.getserviceid) — Devuelve el identificador del servicio del equilibrador de carga para la orden

# La clase MongoDB\Driver\Monitoring\CommandSucceededEvent

(mongodb &gt;=1.3.0)

## Introducción

    La clase **MongoDB\Driver\Monitoring\CommandSucceededEvent**
    encapsula información sobre un comando exitoso.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Monitoring\CommandSucceededEvent**

     {


    /* Métodos */

final public [getCommandName](#mongodb-driver-monitoring-commandsucceededevent.getcommandname)(): [string](#language.types.string)
final public [getDatabaseName](#mongodb-driver-monitoring-commandsucceededevent.getdatabasename)(): [string](#language.types.string)
final public [getDurationMicros](#mongodb-driver-monitoring-commandsucceededevent.getdurationmicros)(): [int](#language.types.integer)
final public [getHost](#mongodb-driver-monitoring-commandsucceededevent.gethost)(): [string](#language.types.string)
final public [getOperationId](#mongodb-driver-monitoring-commandsucceededevent.getoperationid)(): [string](#language.types.string)
final public [getPort](#mongodb-driver-monitoring-commandsucceededevent.getport)(): [int](#language.types.integer)
final public [getReply](#mongodb-driver-monitoring-commandsucceededevent.getreply)(): [object](#language.types.object)
final public [getRequestId](#mongodb-driver-monitoring-commandsucceededevent.getrequestid)(): [string](#language.types.string)
final public [getServer](#mongodb-driver-monitoring-commandsucceededevent.getserver)(): [MongoDB\Driver\Server](#class.mongodb-driver-server)
final public [getServerConnectionId](#mongodb-driver-monitoring-commandsucceededevent.getserverconnectionid)(): [?](#language.types.null)[int](#language.types.integer)
final public [getServiceId](#mongodb-driver-monitoring-commandsucceededevent.getserviceid)(): [?](#language.types.null)[MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

}

# MongoDB\Driver\Monitoring\CommandSucceededEvent::getCommandName

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandSucceededEvent::getCommandName — Devuelve el nombre del comando

### Descripción

final public **MongoDB\Driver\Monitoring\CommandSucceededEvent::getCommandName**(): [string](#language.types.string)

Devuelve el nombre del comando (por ejemplo "find",
"aggregate").

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del comando.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandSucceededEvent::getDatabaseName

(mongodb &gt;=1.19.0)

MongoDB\Driver\Monitoring\CommandSucceededEvent::getDatabaseName — Devuelve el nombre de la base de datos sobre la cual se ejecutó el comando

### Descripción

final public **MongoDB\Driver\Monitoring\CommandSucceededEvent::getDatabaseName**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de la base de datos sobre la cual se ejecutó el comando.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandSucceededEvent::getDurationMicros

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandSucceededEvent::getDurationMicros — Devuelve la duración del comando en microsegundos

### Descripción

final public **MongoDB\Driver\Monitoring\CommandSucceededEvent::getDurationMicros**(): [int](#language.types.integer)

La duración del comando es un valor calculado que incluye el tiempo para enviar
el mensaje y recibir la respuesta del servidor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la duración del comando en microsegundos.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandSucceededEvent::getHost

(mongodb &gt;=1.20.0)

MongoDB\Driver\Monitoring\CommandSucceededEvent::getHost — Devuelve el nombre de host del servidor para el comando

### Descripción

final public **MongoDB\Driver\Monitoring\CommandSucceededEvent::getHost**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de host del servidor en el que se ejecutó el comando.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\CommandSucceededEvent::getOperationId

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandSucceededEvent::getOperationId — Devuelve el identificador de la operación de la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandSucceededEvent::getOperationId**(): [string](#language.types.string)

El identificador de la operación es generado por la extensión y puede ser utilizado para vincular eventos
juntos tales como operaciones de escritura en masa, que pueden haber sido divididas
en varias órdenes a nivel del protocolo.

**Nota**:

    Dado que varias órdenes pueden compartir el mismo identificador de operación, no es fiable
    utilizar este valor para asociar objetos de evento entre sí. El identificador de la petición
    devuelto por
    [MongoDB\Driver\Monitoring\CommandSucceededEvent::getRequestId()](#mongodb-driver-monitoring-commandsucceededevent.getrequestid)
    debería ser utilizado en su lugar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador de la operación de la orden.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\CommandStartedEvent::getOperationId()](#mongodb-driver-monitoring-commandstartedevent.getoperationid) - Devuelve el identificador de la operación de la orden

- [MongoDB\Driver\Monitoring\CommandSucceededEvent::getRequestId()](#mongodb-driver-monitoring-commandsucceededevent.getrequestid) - Devuelve el identificador de la solicitud de la orden

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandSucceededEvent::getPort

(mongodb &gt;=1.20.0)

MongoDB\Driver\Monitoring\CommandSucceededEvent::getPort — Devuelve el puerto del servidor para la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandSucceededEvent::getPort**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el puerto del servidor en el cual la orden fue ejecutada.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\CommandSucceededEvent::getReply

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandSucceededEvent::getReply — Devuelve el documento de respuesta de la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandSucceededEvent::getReply**(): [object](#language.types.object)

El documento de respuesta será convertido de BSON a PHP utilizando las reglas de
[deserialización](#mongodb.persistence.deserialization)
por omisión (por ejemplo, los documentos BSON serán convertidos en [stdClass](#class.stdclass)).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el documento de respuesta de la orden en forma de un objeto
[stdClass](#class.stdclass).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

- [Persistir datos](#mongodb.persistence)

# MongoDB\Driver\Monitoring\CommandSucceededEvent::getRequestId

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandSucceededEvent::getRequestId — Devuelve el identificador de la solicitud de la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandSucceededEvent::getRequestId**(): [string](#language.types.string)

El identificador de la solicitud es generado por la extensión y puede ser utilizado para asociar
este [MongoDB\Driver\Monitoring\CommandSucceededEvent](#class.mongodb-driver-monitoring-commandsucceededevent) con un
[MongoDB\Driver\Monitoring\CommandStartedEvent](#class.mongodb-driver-monitoring-commandstartedevent) anterior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador de la solicitud de la orden.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\CommandStartedEvent::getRequestId()](#mongodb-driver-monitoring-commandstartedevent.getrequestid) - Devuelve el identificador de la solicitud de la orden

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandSucceededEvent::getServer

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandSucceededEvent::getServer — Devuelve el servidor en el cual el comando fue ejecutado

**Advertencia**

    Este método ha sido *DEPRECADO* a partir de la versión
    1.20.0 de la extensión y ha sido eliminado en la versión 2.0. Las aplicaciones deben utilizar
    [MongoDB\Driver\Monitoring\CommandSucceededEvent::getHost()](#mongodb-driver-monitoring-commandsucceededevent.gethost)
    y
    [MongoDB\Driver\Monitoring\CommandSucceededEvent::getPort()](#mongodb-driver-monitoring-commandsucceededevent.getport)
    en su lugar.

### Descripción

final public **MongoDB\Driver\Monitoring\CommandSucceededEvent::getServer**(): [MongoDB\Driver\Server](#class.mongodb-driver-server)

Devuelve el [MongoDB\Driver\Server](#class.mongodb-driver-server) en el cual el comando
fue ejecutado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el [MongoDB\Driver\Server](#class.mongodb-driver-server) en el cual el comando
fue ejecutado.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Historial de cambios

       Versión
       Descripción







        PECL mongodb 2.0.0

            Este método ha sido eliminado.






### Ver también

- [MongoDB\Driver\Monitoring\CommandStartedEvent::getServer()](#mongodb-driver-monitoring-commandstartedevent.getserver) - Devuelve el servidor en el que se ejecutó el comando

- [MongoDB\Driver\Cursor::getServer()](#mongodb-driver-cursor.getserver) - Devuelve el servidor asociado a este cursor

- [MongoDB\Driver\WriteResult::getServer()](#mongodb-driver-writeresult.getserver) - Devuelve el servidor asociado a este resultado de escritura

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandSucceededEvent::getServerConnectionId

(mongodb &gt;=1.14.0)

MongoDB\Driver\Monitoring\CommandSucceededEvent::getServerConnectionId — Devuelve el identificador de conexión del servidor para la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandSucceededEvent::getServerConnectionId**(): [?](#language.types.null)[int](#language.types.integer)

Devuelve el identificador de conexión del servidor para la orden. El identificador de conexión del servidor es
distinto del servidor (es decir,
[MongoDB\Driver\Monitoring\CommandSucceededEvent::getServer()](#mongodb-driver-monitoring-commandsucceededevent.getserver))
y es devuelto en el campo "connectionId" de una respuesta de orden hello
MongoDB 4.2+.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador de conexión del servidor, o **[null](#constant.null)** si no está disponible.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\CommandSucceededEvent::getServiceId

(mongodb &gt;=1.11.0)

MongoDB\Driver\Monitoring\CommandSucceededEvent::getServiceId — Devuelve el identificador del servicio del balanceador de carga para la orden

### Descripción

final public **MongoDB\Driver\Monitoring\CommandSucceededEvent::getServiceId**(): [?](#language.types.null)[MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

Cuando el controlador está conectado a un clúster MongoDB a través de un balanceador de carga,
el identificador del servicio corresponde al campo serviceId en la
respuesta de la orden hello.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador del servicio del balanceador de carga, o **[null](#constant.null)** si el controlador no está
conectado a un balanceador de carga.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

## Tabla de contenidos

- [MongoDB\Driver\Monitoring\CommandSucceededEvent::getCommandName](#mongodb-driver-monitoring-commandsucceededevent.getcommandname) — Devuelve el nombre del comando
- [MongoDB\Driver\Monitoring\CommandSucceededEvent::getDatabaseName](#mongodb-driver-monitoring-commandsucceededevent.getdatabasename) — Devuelve el nombre de la base de datos sobre la cual se ejecutó el comando
- [MongoDB\Driver\Monitoring\CommandSucceededEvent::getDurationMicros](#mongodb-driver-monitoring-commandsucceededevent.getdurationmicros) — Devuelve la duración del comando en microsegundos
- [MongoDB\Driver\Monitoring\CommandSucceededEvent::getHost](#mongodb-driver-monitoring-commandsucceededevent.gethost) — Devuelve el nombre de host del servidor para el comando
- [MongoDB\Driver\Monitoring\CommandSucceededEvent::getOperationId](#mongodb-driver-monitoring-commandsucceededevent.getoperationid) — Devuelve el identificador de la operación de la orden
- [MongoDB\Driver\Monitoring\CommandSucceededEvent::getPort](#mongodb-driver-monitoring-commandsucceededevent.getport) — Devuelve el puerto del servidor para la orden
- [MongoDB\Driver\Monitoring\CommandSucceededEvent::getReply](#mongodb-driver-monitoring-commandsucceededevent.getreply) — Devuelve el documento de respuesta de la orden
- [MongoDB\Driver\Monitoring\CommandSucceededEvent::getRequestId](#mongodb-driver-monitoring-commandsucceededevent.getrequestid) — Devuelve el identificador de la solicitud de la orden
- [MongoDB\Driver\Monitoring\CommandSucceededEvent::getServer](#mongodb-driver-monitoring-commandsucceededevent.getserver) — Devuelve el servidor en el cual el comando fue ejecutado
- [MongoDB\Driver\Monitoring\CommandSucceededEvent::getServerConnectionId](#mongodb-driver-monitoring-commandsucceededevent.getserverconnectionid) — Devuelve el identificador de conexión del servidor para la orden
- [MongoDB\Driver\Monitoring\CommandSucceededEvent::getServiceId](#mongodb-driver-monitoring-commandsucceededevent.getserviceid) — Devuelve el identificador del servicio del balanceador de carga para la orden

# La clase MongoDB\Driver\Monitoring\ServerChangedEvent

(mongodb &gt;=1.13.0)

## Introducción

    La clase **MongoDB\Driver\Monitoring\ServerChangedEvent**
    encapsula información sobre una descripción de servidor modificada. Por
    ejemplo, el tipo de un servidor pasando de secundario a primario entraînerait
    un cambio en la descripción de este servidor.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Monitoring\ServerChangedEvent**

     {


    /* Métodos */

final public [getHost](#mongodb-driver-monitoring-serverchangedevent.gethost)(): [string](#language.types.string)
final public [getNewDescription](#mongodb-driver-monitoring-serverchangedevent.getnewdescription)(): [MongoDB\Driver\ServerDescription](#class.mongodb-driver-serverdescription)
final public [getPort](#mongodb-driver-monitoring-serverchangedevent.getport)(): [int](#language.types.integer)
final public [getPreviousDescription](#mongodb-driver-monitoring-serverchangedevent.getpreviousdescription)(): [MongoDB\Driver\ServerDescription](#class.mongodb-driver-serverdescription)
final public [getTopologyId](#mongodb-driver-monitoring-serverchangedevent.gettopologyid)(): [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

}

# MongoDB\Driver\Monitoring\ServerChangedEvent::getHost

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerChangedEvent::getHost — Devuelve el nombre del host del servidor

### Descripción

final public **MongoDB\Driver\Monitoring\ServerChangedEvent::getHost**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del host del servidor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerChangedEvent::getNewDescription

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerChangedEvent::getNewDescription — Devuelve la nueva descripción del servidor

### Descripción

final public **MongoDB\Driver\Monitoring\ServerChangedEvent::getNewDescription**(): [MongoDB\Driver\ServerDescription](#class.mongodb-driver-serverdescription)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la nueva [MongoDB\Driver\ServerDescription](#class.mongodb-driver-serverdescription)
del servidor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerChangedEvent::getPort

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerChangedEvent::getPort — Devuelve el puerto en el que este servidor está escuchando

### Descripción

final public **MongoDB\Driver\Monitoring\ServerChangedEvent::getPort**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el puerto en el que este servidor está escuchando.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerChangedEvent::getPreviousDescription

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerChangedEvent::getPreviousDescription — Devuelve la descripción anterior del servidor

### Descripción

final public **MongoDB\Driver\Monitoring\ServerChangedEvent::getPreviousDescription**(): [MongoDB\Driver\ServerDescription](#class.mongodb-driver-serverdescription)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la [MongoDB\Driver\ServerDescription](#class.mongodb-driver-serverdescription) anterior
del servidor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerChangedEvent::getTopologyId

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerChangedEvent::getTopologyId — Devuelve el ID de topología asociado a este servidor

### Descripción

final public **MongoDB\Driver\Monitoring\ServerChangedEvent::getTopologyId**(): [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el ID de topología.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

## Tabla de contenidos

- [MongoDB\Driver\Monitoring\ServerChangedEvent::getHost](#mongodb-driver-monitoring-serverchangedevent.gethost) — Devuelve el nombre del host del servidor
- [MongoDB\Driver\Monitoring\ServerChangedEvent::getNewDescription](#mongodb-driver-monitoring-serverchangedevent.getnewdescription) — Devuelve la nueva descripción del servidor
- [MongoDB\Driver\Monitoring\ServerChangedEvent::getPort](#mongodb-driver-monitoring-serverchangedevent.getport) — Devuelve el puerto en el que este servidor está escuchando
- [MongoDB\Driver\Monitoring\ServerChangedEvent::getPreviousDescription](#mongodb-driver-monitoring-serverchangedevent.getpreviousdescription) — Devuelve la descripción anterior del servidor
- [MongoDB\Driver\Monitoring\ServerChangedEvent::getTopologyId](#mongodb-driver-monitoring-serverchangedevent.gettopologyid) — Devuelve el ID de topología asociado a este servidor

# La clase MongoDB\Driver\Monitoring\ServerClosedEvent

(mongodb &gt;=1.13.0)

## Introducción

    La clase **MongoDB\Driver\Monitoring\ServerClosedEvent**
    encapsula información sobre un servidor cerrado. Esto corresponde a un
    servidor existente que ha sido retirado de la topología.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Monitoring\ServerClosedEvent**

     {


    /* Métodos */

final public [getHost](#mongodb-driver-monitoring-serverclosedevent.gethost)(): [string](#language.types.string)
final public [getPort](#mongodb-driver-monitoring-serverclosedevent.getport)(): [int](#language.types.integer)
final public [getTopologyId](#mongodb-driver-monitoring-serverclosedevent.gettopologyid)(): [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

}

# MongoDB\Driver\Monitoring\ServerClosedEvent::getHost

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerClosedEvent::getHost — Devuelve el nombre de host del servidor

### Descripción

final public **MongoDB\Driver\Monitoring\ServerClosedEvent::getHost**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de host del servidor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerClosedEvent::getPort

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerClosedEvent::getPort — Devuelve el puerto en el que este servidor escucha

### Descripción

final public **MongoDB\Driver\Monitoring\ServerClosedEvent::getPort**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el puerto en el que este servidor escucha.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerClosedEvent::getTopologyId

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerClosedEvent::getTopologyId — Devuelve el ID de topología asociado a este servidor

### Descripción

final public **MongoDB\Driver\Monitoring\ServerClosedEvent::getTopologyId**(): [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el ID de topología.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

## Tabla de contenidos

- [MongoDB\Driver\Monitoring\ServerClosedEvent::getHost](#mongodb-driver-monitoring-serverclosedevent.gethost) — Devuelve el nombre de host del servidor
- [MongoDB\Driver\Monitoring\ServerClosedEvent::getPort](#mongodb-driver-monitoring-serverclosedevent.getport) — Devuelve el puerto en el que este servidor escucha
- [MongoDB\Driver\Monitoring\ServerClosedEvent::getTopologyId](#mongodb-driver-monitoring-serverclosedevent.gettopologyid) — Devuelve el ID de topología asociado a este servidor

# La clase MongoDB\Driver\Monitoring\ServerOpeningEvent

(mongodb &gt;=1.13.0)

## Introducción

    La clase **MongoDB\Driver\Monitoring\ServerOpeningEvent**
    encapsula información sobre un servidor abierto. Esto corresponde a un
    nuevo servidor que se añade a la topología.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Monitoring\ServerOpeningEvent**

     {


    /* Métodos */

final public [getHost](#mongodb-driver-monitoring-serveropeningevent.gethost)(): [string](#language.types.string)
final public [getPort](#mongodb-driver-monitoring-serveropeningevent.getport)(): [int](#language.types.integer)
final public [getTopologyId](#mongodb-driver-monitoring-serveropeningevent.gettopologyid)(): [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

}

# MongoDB\Driver\Monitoring\ServerOpeningEvent::getHost

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerOpeningEvent::getHost — Devuelve el nombre de host del servidor

### Descripción

final public **MongoDB\Driver\Monitoring\ServerOpeningEvent::getHost**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de host del servidor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerOpeningEvent::getPort

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerOpeningEvent::getPort — Devuelve el puerto en el que este servidor está escuchando

### Descripción

final public **MongoDB\Driver\Monitoring\ServerOpeningEvent::getPort**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el puerto en el que este servidor está escuchando.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerOpeningEvent::getTopologyId

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerOpeningEvent::getTopologyId — Devuelve el ID de topología asociado a este servidor

### Descripción

final public **MongoDB\Driver\Monitoring\ServerOpeningEvent::getTopologyId**(): [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el ID de topología.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

## Tabla de contenidos

- [MongoDB\Driver\Monitoring\ServerOpeningEvent::getHost](#mongodb-driver-monitoring-serveropeningevent.gethost) — Devuelve el nombre de host del servidor
- [MongoDB\Driver\Monitoring\ServerOpeningEvent::getPort](#mongodb-driver-monitoring-serveropeningevent.getport) — Devuelve el puerto en el que este servidor está escuchando
- [MongoDB\Driver\Monitoring\ServerOpeningEvent::getTopologyId](#mongodb-driver-monitoring-serveropeningevent.gettopologyid) — Devuelve el ID de topología asociado a este servidor

# La clase MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent

(mongodb &gt;=1.13.0)

## Introducción

    La clase **MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent**
    encapsula información sobre un fallo de latido de servidor (es decir,

[» hello](https://www.mongodb.com/docs/manual/reference/command/hello/)
comando emitido por
[» monitoreo del servidor](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md)).

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent**

     {


    /* Métodos */

final public [getDurationMicros](#mongodb-driver-monitoring-serverheartbeatfailedevent.getdurationmicros)(): [int](#language.types.integer)
final public [getError](#mongodb-driver-monitoring-serverheartbeatfailedevent.geterror)(): [Exception](#class.exception)
final public [getHost](#mongodb-driver-monitoring-serverheartbeatfailedevent.gethost)(): [string](#language.types.string)
final public [getPort](#mongodb-driver-monitoring-serverheartbeatfailedevent.getport)(): [int](#language.types.integer)
final public [isAwaited](#mongodb-driver-monitoring-serverheartbeatfailedevent.isawaited)(): [bool](#language.types.boolean)

}

# MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::getDurationMicros

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::getDurationMicros — Devuelve la duración del latido en microsegundos

### Descripción

final public **MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::getDurationMicros**(): [int](#language.types.integer)

La duración del latido es un valor calculado que incluye el tiempo
para enviar el mensaje y recibir la respuesta del servidor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la duración del latido en microsegundos.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::getError

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::getError — Devuelve la excepción asociada al fallo del latido periódico

### Descripción

final public **MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::getError**(): [Exception](#class.exception)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la [Exception](#class.exception) asociada al fallo del latido periódico.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::getHost

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::getHost — Devuelve el nombre de host del servidor

### Descripción

final public **MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::getHost**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de host del servidor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::getPort

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::getPort — Devuelve el puerto en el que este servidor escucha

### Descripción

final public **MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::getPort**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el puerto en el que este servidor escucha.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::isAwaited

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::isAwaited — Indica si el latido periódico ha utilizado un protocolo de difusión de flujo

### Descripción

final public **MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::isAwaited**(): [bool](#language.types.boolean)

Indica si el latido periódico ha utilizado un protocolo de difusión de flujo.
La extensión no utiliza el protocolo de difusión de flujo para la supervisión, por lo tanto, este método siempre devolverá
**[false](#constant.false)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[false](#constant.false)**.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

## Tabla de contenidos

- [MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::getDurationMicros](#mongodb-driver-monitoring-serverheartbeatfailedevent.getdurationmicros) — Devuelve la duración del latido en microsegundos
- [MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::getError](#mongodb-driver-monitoring-serverheartbeatfailedevent.geterror) — Devuelve la excepción asociada al fallo del latido periódico
- [MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::getHost](#mongodb-driver-monitoring-serverheartbeatfailedevent.gethost) — Devuelve el nombre de host del servidor
- [MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::getPort](#mongodb-driver-monitoring-serverheartbeatfailedevent.getport) — Devuelve el puerto en el que este servidor escucha
- [MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent::isAwaited](#mongodb-driver-monitoring-serverheartbeatfailedevent.isawaited) — Indica si el latido periódico ha utilizado un protocolo de difusión de flujo

# La clase MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent

(mongodb &gt;=1.13.0)

## Introducción

    La clase **MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent**
    encapsula información sobre un latido de servidor iniciado (es decir,

[» comando hello](https://www.mongodb.com/docs/manual/reference/command/hello/)
emitido a través de
[» la supervisión del servidor](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md)).

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent**

     {


    /* Métodos */

final public [getHost](#mongodb-driver-monitoring-serverheartbeatstartedevent.gethost)(): [string](#language.types.string)
final public [getPort](#mongodb-driver-monitoring-serverheartbeatstartedevent.getport)(): [int](#language.types.integer)
final public [isAwaited](#mongodb-driver-monitoring-serverheartbeatstartedevent.isawaited)(): [bool](#language.types.boolean)

}

# MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent::getHost

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent::getHost — Devuelve el nombre del host del servidor

### Descripción

final public **MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent::getHost**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del host del servidor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent::getPort

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent::getPort — Devuelve el puerto en el que este servidor está escuchando

### Descripción

final public **MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent::getPort**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el puerto en el que este servidor está escuchando.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent::isAwaited

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent::isAwaited — Indica si el latido periódico ha utilizado un protocolo de difusión de flujo

### Descripción

final public **MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent::isAwaited**(): [bool](#language.types.boolean)

Indica si el latido periódico ha utilizado un protocolo de difusión de flujo.
La extensión no utiliza el protocolo de difusión de flujo para la monitorización, por lo que este método siempre devolverá
**[false](#constant.false)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[false](#constant.false)**.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

## Tabla de contenidos

- [MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent::getHost](#mongodb-driver-monitoring-serverheartbeatstartedevent.gethost) — Devuelve el nombre del host del servidor
- [MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent::getPort](#mongodb-driver-monitoring-serverheartbeatstartedevent.getport) — Devuelve el puerto en el que este servidor está escuchando
- [MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent::isAwaited](#mongodb-driver-monitoring-serverheartbeatstartedevent.isawaited) — Indica si el latido periódico ha utilizado un protocolo de difusión de flujo

# La clase MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent

(mongodb &gt;=1.13.0)

## Introducción

    La clase **MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent**
    encapsula información sobre un latido de servidor exitoso (es decir,

[» comando hello](https://www.mongodb.com/docs/manual/reference/command/hello/)
emitido a través de
[» la supervisión del servidor](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md)).

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent**

     {


    /* Métodos */

final public [getDurationMicros](#mongodb-driver-monitoring-serverheartbeatsucceededevent.getdurationmicros)(): [int](#language.types.integer)
final public [getHost](#mongodb-driver-monitoring-serverheartbeatsucceededevent.gethost)(): [string](#language.types.string)
final public [getPort](#mongodb-driver-monitoring-serverheartbeatsucceededevent.getport)(): [int](#language.types.integer)
final public [getReply](#mongodb-driver-monitoring-serverheartbeatsucceededevent.getreply)(): [object](#language.types.object)
final public [isAwaited](#mongodb-driver-monitoring-serverheartbeatsucceededevent.isawaited)(): [bool](#language.types.boolean)

}

# MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::getDurationMicros

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::getDurationMicros — Devuelve la duración del latido en microsegundos

### Descripción

final public **MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::getDurationMicros**(): [int](#language.types.integer)

La duración del latido es un valor calculado que incluye el tiempo
para enviar el mensaje y recibir la respuesta del servidor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la duración del latido en microsegundos.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::getHost

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::getHost — Devuelve el nombre de host del servidor

### Descripción

final public **MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::getHost**(): [string](#language.types.string)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de host del servidor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::getPort

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::getPort — Devuelve el puerto en el que este servidor escucha

### Descripción

final public **MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::getPort**(): [int](#language.types.integer)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el puerto en el que este servidor escucha.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::getReply

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::getReply — Devuelve el documento de respuesta del heartbeat

### Descripción

final public **MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::getReply**(): [object](#language.types.object)

El documento de respuesta será convertido de BSON a PHP utilizando las reglas de
[deserialización](#mongodb.persistence.deserialization)
por omisión (por ejemplo, los documentos BSON serán convertidos en [stdClass](#class.stdclass)).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el documento de respuesta del heartbeat en forma de un objeto
[stdClass](#class.stdclass).

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

- [Persistir datos](#mongodb.persistence)

# MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::isAwaited

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::isAwaited — Indica si el latido periódico ha utilizado un protocolo de difusión de flujo

### Descripción

final public **MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::isAwaited**(): [bool](#language.types.boolean)

Indica si el latido periódico ha utilizado un protocolo de difusión de flujo.
La extensión no utiliza el protocolo de difusión de flujo para la supervisión, por lo que este método siempre devolverá
**[false](#constant.false)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[false](#constant.false)**.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

## Tabla de contenidos

- [MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::getDurationMicros](#mongodb-driver-monitoring-serverheartbeatsucceededevent.getdurationmicros) — Devuelve la duración del latido en microsegundos
- [MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::getHost](#mongodb-driver-monitoring-serverheartbeatsucceededevent.gethost) — Devuelve el nombre de host del servidor
- [MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::getPort](#mongodb-driver-monitoring-serverheartbeatsucceededevent.getport) — Devuelve el puerto en el que este servidor escucha
- [MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::getReply](#mongodb-driver-monitoring-serverheartbeatsucceededevent.getreply) — Devuelve el documento de respuesta del heartbeat
- [MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent::isAwaited](#mongodb-driver-monitoring-serverheartbeatsucceededevent.isawaited) — Indica si el latido periódico ha utilizado un protocolo de difusión de flujo

# La clase MongoDB\Driver\Monitoring\TopologyChangedEvent

(mongodb &gt;=1.13.0)

## Introducción

    La clase **MongoDB\Driver\Monitoring\TopologyChangedEvent**
    encapsula información sobre una descripción de topología modificada. Por
    ejemplo, el descubrimiento de un nuevo primario en un conjunto de réplicas
    resultaría en un cambio en la descripción de la topología.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Monitoring\TopologyChangedEvent**

     {


    /* Métodos */

final public [getNewDescription](#mongodb-driver-monitoring-topologychangedevent.getnewdescription)(): [MongoDB\Driver\TopologyDescription](#class.mongodb-driver-topologydescription)
final public [getPreviousDescription](#mongodb-driver-monitoring-topologychangedevent.getpreviousdescription)(): [MongoDB\Driver\TopologyDescription](#class.mongodb-driver-topologydescription)
final public [getTopologyId](#mongodb-driver-monitoring-topologychangedevent.gettopologyid)(): [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

}

# MongoDB\Driver\Monitoring\TopologyChangedEvent::getNewDescription

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\TopologyChangedEvent::getNewDescription — Devuelve la nueva descripción de la topología

### Descripción

final public **MongoDB\Driver\Monitoring\TopologyChangedEvent::getNewDescription**(): [MongoDB\Driver\TopologyDescription](#class.mongodb-driver-topologydescription)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la nueva [MongoDB\Driver\TopologyDescription](#class.mongodb-driver-topologydescription)
para la topología.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\TopologyChangedEvent::getPreviousDescription

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\TopologyChangedEvent::getPreviousDescription — Devuelve la descripción anterior de la topología

### Descripción

final public **MongoDB\Driver\Monitoring\TopologyChangedEvent::getPreviousDescription**(): [MongoDB\Driver\TopologyDescription](#class.mongodb-driver-topologydescription)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la descripción anterior [MongoDB\Driver\TopologyDescription](#class.mongodb-driver-topologydescription)
para la topología.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

# MongoDB\Driver\Monitoring\TopologyChangedEvent::getTopologyId

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\TopologyChangedEvent::getTopologyId — Devuelve el identificador de la topología

### Descripción

final public **MongoDB\Driver\Monitoring\TopologyChangedEvent::getTopologyId**(): [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador de la topología.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

## Tabla de contenidos

- [MongoDB\Driver\Monitoring\TopologyChangedEvent::getNewDescription](#mongodb-driver-monitoring-topologychangedevent.getnewdescription) — Devuelve la nueva descripción de la topología
- [MongoDB\Driver\Monitoring\TopologyChangedEvent::getPreviousDescription](#mongodb-driver-monitoring-topologychangedevent.getpreviousdescription) — Devuelve la descripción anterior de la topología
- [MongoDB\Driver\Monitoring\TopologyChangedEvent::getTopologyId](#mongodb-driver-monitoring-topologychangedevent.gettopologyid) — Devuelve el identificador de la topología

# La clase MongoDB\Driver\Monitoring\TopologyClosedEvent

(mongodb &gt;=1.13.0)

## Introducción

    La clase **MongoDB\Driver\Monitoring\TopologyClosedEvent**
    encapsula información sobre una topología cerrada.

**Nota**:

     Debido al comportamiento
     [de gestión y persistencia de las conexiones](#mongodb.connection-handling)
     del controlador, este evento solo puede ser observado cuando un
     [MongoDB\Driver\Manager](#class.mongodb-driver-manager) es creado con la opción del controlador
     "disableClientPersistence" y liberado antes del cierre de la solicitud (RSHUTDOWN).

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Monitoring\TopologyClosedEvent**

     {


    /* Métodos */

final public [getTopologyId](#mongodb-driver-monitoring-topologyclosedevent.gettopologyid)(): [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

}

# MongoDB\Driver\Monitoring\TopologyClosedEvent::getTopologyId

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\TopologyClosedEvent::getTopologyId — Devuelve el identificador de la topología

### Descripción

final public **MongoDB\Driver\Monitoring\TopologyClosedEvent::getTopologyId**(): [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador de la topología.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

## Tabla de contenidos

- [MongoDB\Driver\Monitoring\TopologyClosedEvent::getTopologyId](#mongodb-driver-monitoring-topologyclosedevent.gettopologyid) — Devuelve el identificador de la topología

# La clase MongoDB\Driver\Monitoring\TopologyOpeningEvent

(mongodb &gt;=1.13.0)

## Introducción

    La clase **MongoDB\Driver\Monitoring\TopologyOpeningEvent**
    encapsula información sobre una topología abierta.

**Nota**:

     Debido al comportamiento
     [de gestión y persistencia de las conexiones](#mongodb.connection-handling)
     del controlador, este evento puede no ser observado si un
     [MongoDB\Driver\Manager](#class.mongodb-driver-manager) utiliza un cliente
     [» libmongoc](https://github.com/mongodb/mongo-c-driver) previamente persistente.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Monitoring\TopologyOpeningEvent**

     {


    /* Métodos */

final public [getTopologyId](#mongodb-driver-monitoring-topologyopeningevent.gettopologyid)(): [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

}

# MongoDB\Driver\Monitoring\TopologyOpeningEvent::getTopologyId

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\TopologyOpeningEvent::getTopologyId — Devuelve el identificador de la topología

### Descripción

final public **MongoDB\Driver\Monitoring\TopologyOpeningEvent::getTopologyId**(): [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el identificador de la topología.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

## Tabla de contenidos

- [MongoDB\Driver\Monitoring\TopologyOpeningEvent::getTopologyId](#mongodb-driver-monitoring-topologyopeningevent.gettopologyid) — Devuelve el identificador de la topología

# La interfaz MongoDB\Driver\Monitoring\CommandSubscriber

(mongodb &gt;=1.3.0)

## Introducción

    Las clases pueden implementar esta interfaz para registrar un observador
    de eventos que es notificado para cada evento de comando iniciado,
    [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm) para más información.

## Sinopsis de la Interfaz

    ****




      class **MongoDB\Driver\Monitoring\CommandSubscriber**


     implements
       [MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber) {


    /* Métodos */

abstract public [commandFailed](#mongodb-driver-monitoring-commandsubscriber.commandfailed)([MongoDB\Driver\Monitoring\CommandFailedEvent](#class.mongodb-driver-monitoring-commandfailedevent) $event): [void](language.types.void.html)
abstract public [commandStarted](#mongodb-driver-monitoring-commandsubscriber.commandstarted)([MongoDB\Driver\Monitoring\CommandStartedEvent](#class.mongodb-driver-monitoring-commandstartedevent) $event): [void](language.types.void.html)
abstract public [commandSucceeded](#mongodb-driver-monitoring-commandsubscriber.commandsucceeded)([MongoDB\Driver\Monitoring\CommandSucceededEvent](#class.mongodb-driver-monitoring-commandsucceededevent) $event): [void](language.types.void.html)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0

            Los tipos de retorno previamente declarados como provisionales ahora son aplicados.






PECL mongodb 1.15.0

    Los tipos de retorno de los métodos son declarados como provisionales en PHP 8.0 y posteriores,
    lo que desencadena avisos de depreciación en el código que implementa esta interfaz sin declarar
    los tipos de retorno apropiados.
    El atributo #[ReturnTypeWillChange] puede ser añadido
    para ignorar la notificación de depreciación.







# MongoDB\Driver\Monitoring\CommandSubscriber::commandFailed

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandSubscriber::commandFailed — Método de notificación para una orden fallida

### Descripción

abstract public **MongoDB\Driver\Monitoring\CommandSubscriber::commandFailed**([MongoDB\Driver\Monitoring\CommandFailedEvent](#class.mongodb-driver-monitoring-commandfailedevent) $event): [void](language.types.void.html)

Si el observador está registrado, este método es llamado cuando una orden falla.

### Parámetros

    event ([MongoDB\Driver\Monitoring\CommandFailedEvent](#class.mongodb-driver-monitoring-commandfailedevent))


      Un objeto de evento que encapsula información sobre la orden fallida.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\CommandFailedEvent](#class.mongodb-driver-monitoring-commandfailedevent)

- [MongoDB\Driver\Monitoring\addSubscriber()](#function.mongodb.driver.monitoring.addsubscriber) - Registra una suscripción de supervisión de eventos

- [MongoDB\Driver\Manager::addSubscriber()](#mongodb-driver-manager.addsubscriber) - Registra un observador de eventos de monitoreo con este manager

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandSubscriber::commandStarted

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandSubscriber::commandStarted — Método de notificación para una orden iniciada

### Descripción

abstract public **MongoDB\Driver\Monitoring\CommandSubscriber::commandStarted**([MongoDB\Driver\Monitoring\CommandStartedEvent](#class.mongodb-driver-monitoring-commandstartedevent) $event): [void](language.types.void.html)

Si el observador está registrado, este método es llamado cuando una orden es enviada
al servidor.

### Parámetros

    event ([MongoDB\Driver\Monitoring\CommandStartedEvent](#class.mongodb-driver-monitoring-commandstartedevent))


      Un objeto de evento que encapsula información sobre la orden iniciada.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\CommandStartedEvent](#class.mongodb-driver-monitoring-commandstartedevent)

- [MongoDB\Driver\Monitoring\addSubscriber()](#function.mongodb.driver.monitoring.addsubscriber) - Registra una suscripción de supervisión de eventos

- [MongoDB\Driver\Manager::addSubscriber()](#mongodb-driver-manager.addsubscriber) - Registra un observador de eventos de monitoreo con este manager

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

# MongoDB\Driver\Monitoring\CommandSubscriber::commandSucceeded

(mongodb &gt;=1.3.0)

MongoDB\Driver\Monitoring\CommandSubscriber::commandSucceeded — Método de notificación para un comando exitoso

### Descripción

abstract public **MongoDB\Driver\Monitoring\CommandSubscriber::commandSucceeded**([MongoDB\Driver\Monitoring\CommandSucceededEvent](#class.mongodb-driver-monitoring-commandsucceededevent) $event): [void](language.types.void.html)

Si el observador está registrado, este método es llamado cuando un
comando tiene éxito.

### Parámetros

    event ([MongoDB\Driver\Monitoring\CommandSucceededEvent](#class.mongodb-driver-monitoring-commandsucceededevent))


      Un objeto de evento que encapsula información sobre el comando exitoso.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\CommandSucceededEvent](#class.mongodb-driver-monitoring-commandsucceededevent)

- [MongoDB\Driver\Monitoring\addSubscriber()](#function.mongodb.driver.monitoring.addsubscriber) - Registra una suscripción de supervisión de eventos

- [MongoDB\Driver\Manager::addSubscriber()](#mongodb-driver-manager.addsubscriber) - Registra un observador de eventos de monitoreo con este manager

- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)

## Tabla de contenidos

- [MongoDB\Driver\Monitoring\CommandSubscriber::commandFailed](#mongodb-driver-monitoring-commandsubscriber.commandfailed) — Método de notificación para una orden fallida
- [MongoDB\Driver\Monitoring\CommandSubscriber::commandStarted](#mongodb-driver-monitoring-commandsubscriber.commandstarted) — Método de notificación para una orden iniciada
- [MongoDB\Driver\Monitoring\CommandSubscriber::commandSucceeded](#mongodb-driver-monitoring-commandsubscriber.commandsucceeded) — Método de notificación para un comando exitoso

# La interfaz MongoDB\Driver\Monitoring\SDAMSubscriber

(mongodb &gt;=1.13.0)

## Introducción

    Las clases pueden implementar esta interfaz para registrar un observador
    de eventos que es notificado para diversos eventos SDAM. Ver las
    especificaciones [» Descubrimiento y supervisión de server](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md)
    y [» Supervisión de SDAM](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring-logging-and-monitoring.md)
    para más información.

## Sinopsis de la Interfaz

    ****




      class **MongoDB\Driver\Monitoring\SDAMSubscriber**


     implements
       [MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber) {


    /* Métodos */

abstract public [serverChanged](#mongodb-driver-monitoring-sdamsubscriber.serverchanged)([MongoDB\Driver\Monitoring\ServerChangedEvent](#class.mongodb-driver-monitoring-serverchangedevent) $event): [void](language.types.void.html)
abstract public [serverClosed](#mongodb-driver-monitoring-sdamsubscriber.serverclosed)([MongoDB\Driver\Monitoring\ServerClosedEvent](#class.mongodb-driver-monitoring-serverclosedevent) $event): [void](language.types.void.html)
abstract public [serverHeartbeatFailed](#mongodb-driver-monitoring-sdamsubscriber.serverheartbeatfailed)([MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent](#class.mongodb-driver-monitoring-serverheartbeatfailedevent) $event): [void](language.types.void.html)
abstract public [serverHeartbeatStarted](#mongodb-driver-monitoring-sdamsubscriber.serverheartbeatstarted)([MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent](#class.mongodb-driver-monitoring-serverheartbeatstartedevent) $event): [void](language.types.void.html)
abstract public [serverHeartbeatSucceeded](#mongodb-driver-monitoring-sdamsubscriber.serverheartbeatsucceeded)([MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent](#class.mongodb-driver-monitoring-serverheartbeatsucceededevent) $event): [void](language.types.void.html)
abstract public [serverOpening](#mongodb-driver-monitoring-sdamsubscriber.serveropening)([MongoDB\Driver\Monitoring\ServerOpeningEvent](#class.mongodb-driver-monitoring-serveropeningevent) $event): [void](language.types.void.html)
abstract public [topologyChanged](#mongodb-driver-monitoring-sdamsubscriber.topologychanged)([MongoDB\Driver\Monitoring\TopologyChangedEvent](#class.mongodb-driver-monitoring-topologychangedevent) $event): [void](language.types.void.html)
abstract public [topologyClosed](#mongodb-driver-monitoring-sdamsubscriber.topologyclosed)([MongoDB\Driver\Monitoring\TopologyClosedEvent](#class.mongodb-driver-monitoring-topologyclosedevent) $event): [void](language.types.void.html)
abstract public [topologyOpening](#mongodb-driver-monitoring-sdamsubscriber.topologyopening)([MongoDB\Driver\Monitoring\TopologyOpeningEvent](#class.mongodb-driver-monitoring-topologyopeningevent) $event): [void](language.types.void.html)

}

## Historial de cambios

        Versión
        Descripción







        PECL mongodb 2.0.0

            Los tipos de retorno previamente declarados como provisionales ahora son aplicados.






PECL mongodb 1.15.0

    Los tipos de retorno de los métodos son declarados como provisionales en PHP 8.0 y posteriores,
    lo que desencadena avisos de depreciación en el código que implementa esta interfaz sin declarar
    los tipos de retorno apropiados.
    El atributo #[ReturnTypeWillChange] puede ser añadido
    para ignorar la notificación de depreciación.







# MongoDB\Driver\Monitoring\SDAMSubscriber::serverChanged

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\SDAMSubscriber::serverChanged — Método de notificación para un cambio de descripción de servidor

### Descripción

abstract public **MongoDB\Driver\Monitoring\SDAMSubscriber::serverChanged**([MongoDB\Driver\Monitoring\ServerChangedEvent](#class.mongodb-driver-monitoring-serverchangedevent) $event): [void](language.types.void.html)

Si un observador está registrado, este método es llamado cuando una
descripción de servidor cambia. Por ejemplo, el tipo de un servidor pasando de secundario a
primario resultaría en un cambio de la descripción de ese servidor.

### Parámetros

    event ([MongoDB\Driver\Monitoring\ServerChangedEvent](#class.mongodb-driver-monitoring-serverchangedevent))


      Un objeto de evento que encapsula información sobre la descripción de
      servidor modificada.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\ServerChangedEvent](#class.mongodb-driver-monitoring-serverchangedevent)

- [MongoDB\Driver\Monitoring\addSubscriber()](#function.mongodb.driver.monitoring.addsubscriber) - Registra una suscripción de supervisión de eventos

- [MongoDB\Driver\Manager::addSubscriber()](#mongodb-driver-manager.addsubscriber) - Registra un observador de eventos de monitoreo con este manager

# MongoDB\Driver\Monitoring\SDAMSubscriber::serverClosed

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\SDAMSubscriber::serverClosed — Método de notificación para el cierre de un servidor

### Descripción

abstract public **MongoDB\Driver\Monitoring\SDAMSubscriber::serverClosed**([MongoDB\Driver\Monitoring\ServerClosedEvent](#class.mongodb-driver-monitoring-serverclosedevent) $event): [void](language.types.void.html)

Si un observador está registrado, este método es llamado cuando un servidor existente
es retirado de la topología.

### Parámetros

    event ([MongoDB\Driver\Monitoring\ServerClosedEvent](#class.mongodb-driver-monitoring-serverclosedevent))


      Un objeto de evento que encapsula información sobre el servidor cerrado.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\ServerClosedEvent](#class.mongodb-driver-monitoring-serverclosedevent)

- [MongoDB\Driver\Monitoring\addSubscriber()](#function.mongodb.driver.monitoring.addsubscriber) - Registra una suscripción de supervisión de eventos

- [MongoDB\Driver\Manager::addSubscriber()](#mongodb-driver-manager.addsubscriber) - Registra un observador de eventos de monitoreo con este manager

# MongoDB\Driver\Monitoring\SDAMSubscriber::serverHeartbeatFailed

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\SDAMSubscriber::serverHeartbeatFailed — Método de notificación para un fallo de latido de servidor

### Descripción

abstract public **MongoDB\Driver\Monitoring\SDAMSubscriber::serverHeartbeatFailed**([MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent](#class.mongodb-driver-monitoring-serverheartbeatfailedevent) $event): [void](language.types.void.html)

Si un observador está registrado, este método es llamado cuando un latido de servidor (es decir, un comando
[» hello](https://www.mongodb.com/docs/manual/reference/command/hello/)
emitido mediante
[» monitoreo de servidor](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md)) falla.

### Parámetros

    event ([MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent](#class.mongodb-driver-monitoring-serverheartbeatfailedevent))


      Un objeto de evento que encapsula información sobre el fallo de latido de servidor.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent](#class.mongodb-driver-monitoring-serverheartbeatfailedevent)

- [MongoDB\Driver\Monitoring\addSubscriber()](#function.mongodb.driver.monitoring.addsubscriber) - Registra una suscripción de supervisión de eventos

- [MongoDB\Driver\Manager::addSubscriber()](#mongodb-driver-manager.addsubscriber) - Registra un observador de eventos de monitoreo con este manager

# MongoDB\Driver\Monitoring\SDAMSubscriber::serverHeartbeatStarted

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\SDAMSubscriber::serverHeartbeatStarted — Método de notificación para un latido de servidor iniciado

### Descripción

abstract public **MongoDB\Driver\Monitoring\SDAMSubscriber::serverHeartbeatStarted**([MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent](#class.mongodb-driver-monitoring-serverheartbeatstartedevent) $event): [void](language.types.void.html)

Si un observador está registrado, este método es llamado cuando un latido de servidor (es decir, un comando
[» hello](https://www.mongodb.com/docs/manual/reference/command/hello/)
emitido a través de
[» monitoreo de servidor](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md)) es enviado
al servidor.

### Parámetros

    event ([MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent](#class.mongodb-driver-monitoring-serverheartbeatstartedevent))


      Un objeto de evento que encapsula información sobre el latido de servidor iniciado.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent](#class.mongodb-driver-monitoring-serverheartbeatstartedevent)

- [MongoDB\Driver\Monitoring\addSubscriber()](#function.mongodb.driver.monitoring.addsubscriber) - Registra una suscripción de supervisión de eventos

- [MongoDB\Driver\Manager::addSubscriber()](#mongodb-driver-manager.addsubscriber) - Registra un observador de eventos de monitoreo con este manager

# MongoDB\Driver\Monitoring\SDAMSubscriber::serverHeartbeatSucceeded

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\SDAMSubscriber::serverHeartbeatSucceeded — Método de notificación para un latido de servidor exitoso

### Descripción

abstract public **MongoDB\Driver\Monitoring\SDAMSubscriber::serverHeartbeatSucceeded**([MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent](#class.mongodb-driver-monitoring-serverheartbeatsucceededevent) $event): [void](language.types.void.html)

Si un observador está registrado, este método es llamado cuando un latido de servidor (es decir, una comando
[» hello](https://www.mongodb.com/docs/manual/reference/command/hello/)
emitido a través de
[» monitoreo de servidor](https://github.com/mongodb/specifications/blob/master/source/server-discovery-and-monitoring/server-discovery-and-monitoring.md)) tiene éxito.

### Parámetros

    event ([MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent](#class.mongodb-driver-monitoring-serverheartbeatsucceededevent))


      Un objeto de evento que encapsula información sobre el latido de servidor exitoso.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent](#class.mongodb-driver-monitoring-serverheartbeatsucceededevent)

- [MongoDB\Driver\Monitoring\addSubscriber()](#function.mongodb.driver.monitoring.addsubscriber) - Registra una suscripción de supervisión de eventos

- [MongoDB\Driver\Manager::addSubscriber()](#mongodb-driver-manager.addsubscriber) - Registra un observador de eventos de monitoreo con este manager

# MongoDB\Driver\Monitoring\SDAMSubscriber::serverOpening

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\SDAMSubscriber::serverOpening — Método de notificación para la apertura de un servidor

### Descripción

abstract public **MongoDB\Driver\Monitoring\SDAMSubscriber::serverOpening**([MongoDB\Driver\Monitoring\ServerOpeningEvent](#class.mongodb-driver-monitoring-serveropeningevent) $event): [void](language.types.void.html)

Si un observador está registrado, este método es llamado cuando un servidor existente
es retirado de la topología.

### Parámetros

    event ([MongoDB\Driver\Monitoring\ServerOpeningEvent](#class.mongodb-driver-monitoring-serveropeningevent))


      Un objeto de evento que encapsula información sobre el servidor abierto.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\ServerOpeningEvent](#class.mongodb-driver-monitoring-serveropeningevent)

- [MongoDB\Driver\Monitoring\addSubscriber()](#function.mongodb.driver.monitoring.addsubscriber) - Registra una suscripción de supervisión de eventos

- [MongoDB\Driver\Manager::addSubscriber()](#mongodb-driver-manager.addsubscriber) - Registra un observador de eventos de monitoreo con este manager

# MongoDB\Driver\Monitoring\SDAMSubscriber::topologyChanged

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\SDAMSubscriber::topologyChanged — Método de notificación para un cambio de descripción de topología

### Descripción

abstract public **MongoDB\Driver\Monitoring\SDAMSubscriber::topologyChanged**([MongoDB\Driver\Monitoring\TopologyChangedEvent](#class.mongodb-driver-monitoring-topologychangedevent) $event): [void](language.types.void.html)

Si un observador está registrado, este método es llamado cuando una
descripción de topología cambia. Por ejemplo, el descubrimiento de un nuevo primario en un conjunto de réplicas
resultaría en un cambio de la descripción de la topología.

### Parámetros

    event ([MongoDB\Driver\Monitoring\TopologyChangedEvent](#class.mongodb-driver-monitoring-topologychangedevent))


      Un objeto de evento que encapsula información sobre la descripción de
      topología modificada.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\TopologyChangedEvent](#class.mongodb-driver-monitoring-topologychangedevent)

- [MongoDB\Driver\Monitoring\addSubscriber()](#function.mongodb.driver.monitoring.addsubscriber) - Registra una suscripción de supervisión de eventos

- [MongoDB\Driver\Manager::addSubscriber()](#mongodb-driver-manager.addsubscriber) - Registra un observador de eventos de monitoreo con este manager

# MongoDB\Driver\Monitoring\SDAMSubscriber::topologyClosed

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\SDAMSubscriber::topologyClosed — Método de notificación para el cierre de topología

### Descripción

abstract public **MongoDB\Driver\Monitoring\SDAMSubscriber::topologyClosed**([MongoDB\Driver\Monitoring\TopologyClosedEvent](#class.mongodb-driver-monitoring-topologyclosedevent) $event): [void](language.types.void.html)

Si un observador está registrado, este método es llamado cuando una
topología es cerrada.

**Nota**:

    Debido al comportamiento del controlador
    [de gestión y persistencia de conexiones](#mongodb.connection-handling),
    este evento solo puede ser observado cuando un
    [MongoDB\Driver\Manager](#class.mongodb-driver-manager) es creado con la opción del controlador
    "disableClientPersistence" y liberado antes del cierre de la solicitud (RSHUTDOWN).

### Parámetros

    event ([MongoDB\Driver\Monitoring\TopologyClosedEvent](#class.mongodb-driver-monitoring-topologyclosedevent))


      Un objeto de evento que encapsula información sobre la topología cerrada.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\TopologyClosedEvent](#class.mongodb-driver-monitoring-topologyclosedevent)

- [MongoDB\Driver\Monitoring\addSubscriber()](#function.mongodb.driver.monitoring.addsubscriber) - Registra una suscripción de supervisión de eventos

- [MongoDB\Driver\Manager::addSubscriber()](#mongodb-driver-manager.addsubscriber) - Registra un observador de eventos de monitoreo con este manager

# MongoDB\Driver\Monitoring\SDAMSubscriber::topologyOpening

(mongodb &gt;=1.13.0)

MongoDB\Driver\Monitoring\SDAMSubscriber::topologyOpening — Método de notificación para la apertura de topología

### Descripción

abstract public **MongoDB\Driver\Monitoring\SDAMSubscriber::topologyOpening**([MongoDB\Driver\Monitoring\TopologyOpeningEvent](#class.mongodb-driver-monitoring-topologyopeningevent) $event): [void](language.types.void.html)

Si un observador está registrado, este método es llamado cuando una
topología es abierta.

**Nota**:

    Debido al comportamiento del controlador
    [de gestión y persistencia de conexiones](#mongodb.connection-handling),
    este evento puede no ser observado si un
    [MongoDB\Driver\Manager](#class.mongodb-driver-manager) utiliza un cliente
    [» libmongoc](https://github.com/mongodb/mongo-c-driver) previamente persistente.

### Parámetros

    event ([MongoDB\Driver\Monitoring\TopologyOpeningEvent](#class.mongodb-driver-monitoring-topologyopeningevent))


      Un objeto de evento que encapsula información sobre la topología abierta.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una excepción **MongoDB\Driver\InvalidArgumentException** en caso de error durante el análisis de un argumento.

### Ver también

- [MongoDB\Driver\Monitoring\TopologyOpeningEvent](#class.mongodb-driver-monitoring-topologyopeningevent)

- [MongoDB\Driver\Monitoring\addSubscriber()](#function.mongodb.driver.monitoring.addsubscriber) - Registra una suscripción de supervisión de eventos

- [MongoDB\Driver\Manager::addSubscriber()](#mongodb-driver-manager.addsubscriber) - Registra un observador de eventos de monitoreo con este manager

## Tabla de contenidos

- [MongoDB\Driver\Monitoring\SDAMSubscriber::serverChanged](#mongodb-driver-monitoring-sdamsubscriber.serverchanged) — Método de notificación para un cambio de descripción de servidor
- [MongoDB\Driver\Monitoring\SDAMSubscriber::serverClosed](#mongodb-driver-monitoring-sdamsubscriber.serverclosed) — Método de notificación para el cierre de un servidor
- [MongoDB\Driver\Monitoring\SDAMSubscriber::serverHeartbeatFailed](#mongodb-driver-monitoring-sdamsubscriber.serverheartbeatfailed) — Método de notificación para un fallo de latido de servidor
- [MongoDB\Driver\Monitoring\SDAMSubscriber::serverHeartbeatStarted](#mongodb-driver-monitoring-sdamsubscriber.serverheartbeatstarted) — Método de notificación para un latido de servidor iniciado
- [MongoDB\Driver\Monitoring\SDAMSubscriber::serverHeartbeatSucceeded](#mongodb-driver-monitoring-sdamsubscriber.serverheartbeatsucceeded) — Método de notificación para un latido de servidor exitoso
- [MongoDB\Driver\Monitoring\SDAMSubscriber::serverOpening](#mongodb-driver-monitoring-sdamsubscriber.serveropening) — Método de notificación para la apertura de un servidor
- [MongoDB\Driver\Monitoring\SDAMSubscriber::topologyChanged](#mongodb-driver-monitoring-sdamsubscriber.topologychanged) — Método de notificación para un cambio de descripción de topología
- [MongoDB\Driver\Monitoring\SDAMSubscriber::topologyClosed](#mongodb-driver-monitoring-sdamsubscriber.topologyclosed) — Método de notificación para el cierre de topología
- [MongoDB\Driver\Monitoring\SDAMSubscriber::topologyOpening](#mongodb-driver-monitoring-sdamsubscriber.topologyopening) — Método de notificación para la apertura de topología

# La interfaz MongoDB\Driver\Monitoring\Subscriber

(mongodb &gt;=1.3.0)

## Introducción

    La interfaz base para los observadores de eventos. Es utilizada como tipo de argumento en las funciones
    [MongoDB\Driver\Monitoring\addSubscriber()](#function.mongodb.driver.monitoring.addsubscriber) y
    [MongoDB\Driver\Monitoring\removeSubscriber()](#function.mongodb.driver.monitoring.removesubscriber) y no debe
    ser implementada directamente.

## Sinopsis de la Interfaz

    ****




      class **MongoDB\Driver\Monitoring\Subscriber**

     {

}

    Esta interfaz no tiene métodos. Su único propósito es ser la interfaz base
    para todos los observadores de eventos.

# Las clases de excepción

## Tabla de contenidos

- [MongoDB\Driver\Exception\AuthenticationException](#class.mongodb-driver-exception-authenticationexception)
- [MongoDB\Driver\Exception\BulkWriteException](#class.mongodb-driver-exception-bulkwriteexception)
- [MongoDB\Driver\Exception\BulkWriteCommandException](#class.mongodb-driver-exception-bulkwritecommandexception)
- [MongoDB\Driver\Exception\CommandException](#class.mongodb-driver-exception-commandexception)
- [MongoDB\Driver\Exception\ConnectionException](#class.mongodb-driver-exception-connectionexception)
- [MongoDB\Driver\Exception\ConnectionTimeoutException](#class.mongodb-driver-exception-connectiontimeoutexception)
- [MongoDB\Driver\Exception\EncryptionException](#class.mongodb-driver-exception-encryptionexception)
- [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception)
- [MongoDB\Driver\Exception\ExecutionTimeoutException](#class.mongodb-driver-exception-executiontimeoutexception)
- [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception)
- [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception)
- [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception)
- [MongoDB\Driver\Exception\ServerException](#class.mongodb-driver-exception-serverexception)
- [MongoDB\Driver\Exception\SSLConnectionException](#class.mongodb-driver-exception-sslconnectionexception)
- [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception)
- [MongoDB\Driver\Exception\WriteException](#class.mongodb-driver-exception-writeexception)
- [Árbol de clases](#mongodb.exceptions.tree)

# La clase MongoDB\Driver\Exception\AuthenticationException

(mongodb &gt;= 1.0.0)

## Introducción

    Se lanza cuando el controlador no logra autenticarse con el servidor.

## Sinopsis de la Clase

    ****




      class **MongoDB\Driver\Exception\AuthenticationException**



      extends
       [MongoDB\Driver\Exception\ConnectionException](#class.mongodb-driver-exception-connectionexception)


     implements
       [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception) {

    /* Propiedades heredadas */


     protected
     ?[array](#language.types.array)
      [$errorLabels](#mongodb-driver-exception-runtimeexception.props.errorlabels);


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

final public [MongoDB\Driver\Exception\RuntimeException::hasErrorLabel](#mongodb-driver-runtimeexception.haserrorlabel)([string](#language.types.string) $errorLabel): [bool](#language.types.boolean)

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

# La clase MongoDB\Driver\Exception\BulkWriteException

(mongodb &gt;= 1.0.0)

## Introducción

    Se levanta cuando una operación de escritura en bloque falla.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Exception\BulkWriteException**



      extends
       [MongoDB\Driver\Exception\ServerException](#class.mongodb-driver-exception-serverexception)


     implements
       [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception) {

    /* Propiedades */

     protected
     [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)
      [$writeResult](#mongodb-driver-exception-bulkwriteexception.props.writeresult);

    /* Propiedades heredadas */

    protected
     ?[array](#language.types.array)
      [$errorLabels](#mongodb-driver-exception-runtimeexception.props.errorlabels);


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

final public [getWriteResult](#mongodb-driver-bulkwriteexception.getwriteresult)(): [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)

    /* Métodos heredados */

    final public [MongoDB\Driver\Exception\RuntimeException::hasErrorLabel](#mongodb-driver-runtimeexception.haserrorlabel)([string](#language.types.string) $errorLabel): [bool](#language.types.boolean)


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

     writeResult


       El [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult) asociado a la operación de escritura
       fallida.





## Historial de cambios

        Versión
        Descripción






        PECL mongodb 2.0.0


          Esta clase extiende ahora
          [MongoDB\Driver\Exception\ServerException](#class.mongodb-driver-exception-serverexception)
          en lugar de
          [MongoDB\Driver\Exception\WriteException](#class.mongodb-driver-exception-writeexception).









# MongoDB\Driver\Exception\BulkWriteException::getWriteResult

(mongodb &gt;= 1.0.0)

MongoDB\Driver\Exception\BulkWriteException::getWriteResult — Devuelve el WriteResult para la operación de escritura fallida

### Descripción

final public **MongoDB\Driver\Exception\BulkWriteException::getWriteResult**(): [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)

Devuelve el [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult) para la operación
de escritura fallida. Los métodos
[MongoDB\Driver\WriteResult::getWriteErrors()](#mongodb-driver-writeresult.getwriteerrors) y
[MongoDB\Driver\WriteResult::getWriteConcernError()](#mongodb-driver-writeresult.getwriteconcernerror)
pueden ser utilizados para obtener detalles adicionales sobre el error.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult) para la operación
de escritura fallida.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\Exception\BulkWriteException::getWriteResult()**

&lt;?php

$manager = new MongoDB\Driver\Manager('mongodb://localhost');
$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['_id' =&gt; 1]);
$bulk-&gt;insert(['_id' =&gt; 1]);

try {
$manager-&gt;executeBulkWrite('db.collection', $bulk);
} catch (MongoDB\Driver\Exception\BulkWriteException $e) {
$writeResult = $e-&gt;getWriteResult();

    if ($writeConcernError = $writeResult-&gt;getWriteConcernError()) {
        var_dump($writeConcernError);
    }

    if ($writeErrors = $writeResult-&gt;getWriteErrors()) {
        var_dump($writeErrors);
    }

}

?&gt;

Resultado del ejemplo anterior es similar a:

array(1) {
[0]=&gt;
object(MongoDB\Driver\WriteError)#5 (4) {
["message"]=&gt;
string(70) "E11000 duplicate key error index: db.collection.$_id_ dup key: { : 1 }"
["code"]=&gt;
int(11000)
["index"]=&gt;
int(1)
["info"]=&gt;
NULL
}
}

### Ver también

- [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)

- [MongoDB\Driver\Manager::executeBulkWrite()](#mongodb-driver-manager.executebulkwrite) - Ejecuta una o varias operaciones de escritura

## Tabla de contenidos

- [MongoDB\Driver\Exception\BulkWriteException::getWriteResult](#mongodb-driver-bulkwriteexception.getwriteresult) — Devuelve el WriteResult para la operación de escritura fallida

# La clase MongoDB\Driver\Exception\BulkWriteCommandException

(mongodb &gt;=2.1.0)

## Introducción

    Excepción lanzada durante la ejecución fallida de un
    [MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand). Los métodos de la
    clase proporcionan más detalles sobre los errores que se han producido, incluyendo los errores
    de respuesta y los resultados parciales de la escritura masiva.

## Sinopsis de la Clase

    ****




      class **MongoDB\Driver\Exception\BulkWriteCommandException**



      extends
       [MongoDB\Driver\Exception\ServerException](#class.mongodb-driver-exception-serverexception)


     implements
       [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception) {

    /* Propiedades */

     private
     ?[MongoDB\BSON\Document](#class.mongodb-bson-document)
      [$errorReply](#mongodb-driver-exception-bulkwritecommandexception.props.errorreply);

    private
     ?[MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)
      [$partialResult](#mongodb-driver-exception-bulkwritecommandexception.props.partialresult);

    private
     [array](#language.types.array)
      [$writeConcernErrors](#mongodb-driver-exception-bulkwritecommandexception.props.writeconcernerrors);

    private
     [array](#language.types.array)
      [$writeErrors](#mongodb-driver-exception-bulkwritecommandexception.props.writeerrors);


    /* Propiedades heredadas */

    protected
     ?[array](#language.types.array)
      [$errorLabels](#mongodb-driver-exception-runtimeexception.props.errorlabels);


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

final public [getErrorReply](#mongodb-driver-bulkwritecommandexception.geterrorreply)(): [?](#language.types.null)[MongoDB\BSON\Document](#class.mongodb-bson-document)
final public [getPartialResult](#mongodb-driver-bulkwritecommandexception.getpartialresult)(): [?](#language.types.null)[MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)
final public [getWriteConcernErrors](#mongodb-driver-bulkwritecommandexception.getwriteconcernerrors)(): [array](#language.types.array)
final public [getWriteErrors](#mongodb-driver-bulkwritecommandexception.getwriteerrors)(): [array](#language.types.array)

    /* Métodos heredados */

    final public [MongoDB\Driver\Exception\RuntimeException::hasErrorLabel](#mongodb-driver-runtimeexception.haserrorlabel)([string](#language.types.string) $errorLabel): [bool](#language.types.boolean)


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

     errorReply


       Cada uno de los errores de nivel superior que ocurrieron al intentar
       comunicarse con el servidor o al ejecutar la escritura masiva. Este valor puede ser **[null](#constant.null)** si
       la excepción fue lanzada debido a errores que ocurrieron durante escrituras individuales.






     partialResult


       Una [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult) proporciona
       el resultado de todas las operaciones que se realizaron antes
       del error. Este valor puede ser **[null](#constant.null)** si no puede determinarse que al menos una escritura se haya realizado con éxito (y
       reconocido).






     writeConcernErrors


       Un array de cada uno de los [MongoDB\Driver\WriteConcernError](#class.mongodb-driver-writeconcernerror)
       que ocurrieron durante la ejecución de la escritura masiva. Esta lista puede tener
       múltiples entradas si se requirió más de un comando de servidor para ejecutar
       la escritura masiva.






     writeErrors


       Un array de cada uno de los [MongoDB\Driver\WriteError](#class.mongodb-driver-writeerror)
       que ocurrieron durante la ejecución de la escritura individual. Las claves
       del array corresponden al índice de la operación de escritura de
       [MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand). Esta lista contendrá
       como máximo una entrada si la escritura masiva estaba ordenada.





# MongoDB\Driver\Exception\BulkWriteCommandException::getErrorReply

(mongodb &gt;=2.1.0)

MongoDB\Driver\Exception\BulkWriteCommandException::getErrorReply — Devuelve un error de comando de nivel superior

### Descripción

final public **MongoDB\Driver\Exception\BulkWriteCommandException::getErrorReply**(): [?](#language.types.null)[MongoDB\BSON\Document](#class.mongodb-bson-document)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un error de comando de nivel superior que ocurrió al intentar comunicarse
con el servidor o al ejecutar la escritura masiva. Este valor puede ser **[null](#constant.null)** si la excepción
fue lanzada debido a errores que ocurrieron en escrituras individuales.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\Exception\BulkWriteCommandException::getErrorReply()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

// Este ejemplo utiliza configureFailPoint para simular un error de comando de nivel superior
$manager-&gt;executeCommand('admin', new MongoDB\Driver\Command([
'configureFailPoint' =&gt; 'failCommand',
'mode' =&gt; ['times' =&gt; 1],
'data' =&gt; [
'failCommands' =&gt; ['bulkWrite'],
'errorCode' =&gt; 8, /_ UnknownError _/
],
]));

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;insertOne('db.coll', ['x' =&gt; 1]);

try {
$result = $manager-&gt;executeBulkWriteCommand($bulk);
} catch (MongoDB\Driver\Exception\BulkWriteCommandException $e) {
    var_dump($e-&gt;getErrorReply()?-&gt;toPHP());
}

?&gt;

Resultado del ejemplo anterior es similar a:

object(stdClass)#12 (6) {
["ok"]=&gt;
float(0)
["errmsg"]=&gt;
string(43) "Failing command via 'failCommand' failpoint"
["code"]=&gt;
int(8)
["codeName"]=&gt;
string(12) "UnknownError"
["$clusterTime"]=&gt;
object(stdClass)#10 (2) {
["clusterTime"]=&gt;
object(MongoDB\BSON\Timestamp)#6 (2) {
["increment"]=&gt;
string(1) "7"
["timestamp"]=&gt;
string(10) "1744319389"
}
["signature"]=&gt;
object(stdClass)#9 (2) {
["hash"]=&gt;
object(MongoDB\BSON\Binary)#7 (2) {
["data"]=&gt;
string(20) ""
["type"]=&gt;
int(0)
}
["keyId"]=&gt;
object(MongoDB\BSON\Int64)#8 (1) {
["integer"]=&gt;
string(1) "0"
}
}
}
["operationTime"]=&gt;
object(MongoDB\BSON\Timestamp)#11 (2) {
["increment"]=&gt;
string(1) "7"
["timestamp"]=&gt;
string(10) "1744319389"
}
}

### Ver también

- [MongoDB\Driver\Manager::executeBulkWriteCommand()](#mongodb-driver-manager.executebulkwritecommand) - Ejecuta operaciones de escritura utilizando el comando bulkWrite

# MongoDB\Driver\Exception\BulkWriteCommandException::getPartialResult

(mongodb &gt;=2.1.0)

MongoDB\Driver\Exception\BulkWriteCommandException::getPartialResult — Devuelve el resultado de todas las operaciones de escritura exitosas

### Descripción

final public **MongoDB\Driver\Exception\BulkWriteCommandException::getPartialResult**(): [?](#language.types.null)[MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)
que proporciona los resultados de cada una de las operaciones exitosas que se realizaron antes
de que se encontrara el error. El valor devuelto será **[null](#constant.null)** si no se puede
determinar si al menos una escritura se realizó con éxito (y
fue reconocida).

### Ejemplos

**Ejemplo #1 Resultado parcial si al menos una escritura es exitosa**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;deleteMany('db.coll', []);
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 1]);
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 1]);

try {
$result = $manager-&gt;executeBulkWriteCommand($bulk);
} catch (MongoDB\Driver\Exception\BulkWriteCommandException $e) {
$result = $e-&gt;getPartialResult();
}

var_dump($result?-&gt;getInsertedCount());

?&gt;

El ejemplo anterior mostrará:

int(1)

**Ejemplo #2 Ningún resultado parcial si ninguna escritura es exitosa**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;deleteMany('db.coll', []);
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 1]);
$manager-&gt;executeBulkWriteCommand($bulk);

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 1]);

try {
$result = $manager-&gt;executeBulkWriteCommand($bulk);
} catch (MongoDB\Driver\Exception\BulkWriteCommandException $e) {
$result = $e-&gt;getPartialResult();
}

var_dump($result?-&gt;getInsertedCount());

?&gt;

El ejemplo anterior mostrará:

NULL

### Ver también

- [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult)

- [MongoDB\Driver\Manager::executeBulkWriteCommand()](#mongodb-driver-manager.executebulkwritecommand) - Ejecuta operaciones de escritura utilizando el comando bulkWrite

# MongoDB\Driver\Exception\BulkWriteCommandException::getWriteConcernErrors

(mongodb &gt;=2.1.0)

MongoDB\Driver\Exception\BulkWriteCommandException::getWriteConcernErrors — Devuelve los errores de preocupación de escritura

### Descripción

final public **MongoDB\Driver\Exception\BulkWriteCommandException::getWriteConcernErrors**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de cada uno de los [MongoDB\Driver\WriteConcernError](#class.mongodb-driver-writeconcernerror)s
que se produjeron durante la ejecución de la escritura masiva. Esta lista puede tener
múltiples entradas si se necesitó más de un comando de servidor para ejecutar la
escritura masiva.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\Exception\BulkWriteCommandException::getWriteConcernErrors()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand;
$bulk-&gt;insertOne('db.coll', ['x' =&gt; 1]);

$writeConcern = new MongoDB\Driver\WriteConcern(50);

try {
$result = $manager-&gt;executeBulkWriteCommand($bulk, ['writeConcern' =&gt; $writeConcern]);
} catch (MongoDB\Driver\Exception\BulkWriteCommandException $e) {
    var_dump($e-&gt;getWriteConcernErrors());
}

?&gt;

Resultado del ejemplo anterior es similar a:

array(1) {
[0]=&gt;
object(MongoDB\Driver\WriteConcernError)#6 (3) {
["message"]=&gt;
string(29) "Not enough data-bearing nodes"
["code"]=&gt;
int(100)
["info"]=&gt;
object(stdClass)#8 (1) {
["writeConcern"]=&gt;
object(stdClass)#7 (3) {
["w"]=&gt;
int(50)
["wtimeout"]=&gt;
int(0)
["provenance"]=&gt;
string(14) "clientSupplied"
}
}
}
}

### Ver también

- [MongoDB\Driver\Manager::executeBulkWriteCommand()](#mongodb-driver-manager.executebulkwritecommand) - Ejecuta operaciones de escritura utilizando el comando bulkWrite

- [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern)

- [MongoDB\Driver\WriteConcernError](#class.mongodb-driver-writeconcernerror)

# MongoDB\Driver\Exception\BulkWriteCommandException::getWriteErrors

(mongodb &gt;=2.1.0)

MongoDB\Driver\Exception\BulkWriteCommandException::getWriteErrors — Devuelve los errores de escritura

### Descripción

final public **MongoDB\Driver\Exception\BulkWriteCommandException::getWriteErrors**(): [array](#language.types.array)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de [MongoDB\Driver\WriteError](#class.mongodb-driver-writeerror) que se
produjeron durante la ejecución de la escritura individual. Las claves del array
corresponden al índice de la operación de escritura en
[MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand). Esta lista
contendrá como máximo una entrada si la escritura masiva estaba ordenada.

### Ejemplos

**Ejemplo #1 Ejemplo de MongoDB\Driver\Exception\BulkWriteCommandException::getWriteErrors()**

&lt;?php

$manager = new MongoDB\Driver\Manager;

$bulk = new MongoDB\Driver\BulkWriteCommand(['ordered' =&gt; false]);
$bulk-&gt;deleteMany('db.coll', []);
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 1]);
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 1]);
$bulk-&gt;insertOne('db.coll', ['_id' =&gt; 1]);

try {
$result = $manager-&gt;executeBulkWriteCommand($bulk);
} catch (MongoDB\Driver\Exception\BulkWriteCommandException $e) {
    var_dump($e-&gt;getWriteErrors());
}

?&gt;

Resultado del ejemplo anterior es similar a:

array(2) {
[2]=&gt;
object(MongoDB\Driver\WriteError)#5 (4) {
["message"]=&gt;
string(78) "E11000 duplicate key error collection: db.coll index: _id_ dup key: { _id: 1 }"
["code"]=&gt;
int(11000)
["index"]=&gt;
int(2)
["info"]=&gt;
object(stdClass)#6 (0) {
}
}
[3]=&gt;
object(MongoDB\Driver\WriteError)#7 (4) {
["message"]=&gt;
string(78) "E11000 duplicate key error collection: db.coll index: \_id_ dup key: { \_id: 1 }"
["code"]=&gt;
int(11000)
["index"]=&gt;
int(3)
["info"]=&gt;
object(stdClass)#8 (0) {
}
}
}

### Ver también

- [MongoDB\Driver\Manager::executeBulkWriteCommand()](#mongodb-driver-manager.executebulkwritecommand) - Ejecuta operaciones de escritura utilizando el comando bulkWrite

- [MongoDB\Driver\WriteError](#class.mongodb-driver-writeerror)

## Tabla de contenidos

- [MongoDB\Driver\Exception\BulkWriteCommandException::getErrorReply](#mongodb-driver-bulkwritecommandexception.geterrorreply) — Devuelve un error de comando de nivel superior
- [MongoDB\Driver\Exception\BulkWriteCommandException::getPartialResult](#mongodb-driver-bulkwritecommandexception.getpartialresult) — Devuelve el resultado de todas las operaciones de escritura exitosas
- [MongoDB\Driver\Exception\BulkWriteCommandException::getWriteConcernErrors](#mongodb-driver-bulkwritecommandexception.getwriteconcernerrors) — Devuelve los errores de preocupación de escritura
- [MongoDB\Driver\Exception\BulkWriteCommandException::getWriteErrors](#mongodb-driver-bulkwritecommandexception.getwriteerrors) — Devuelve los errores de escritura

# La clase MongoDB\Driver\Exception\CommandException

(mongodb &gt;= 1.5.0)

## Introducción

    Lanzada cuando una orden falla.

## Sinopsis de la Clase

    ****




      class **MongoDB\Driver\Exception\CommandException**



      extends
       [MongoDB\Driver\Exception\ServerException](#class.mongodb-driver-exception-serverexception)


     implements
       [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception) {

    /* Propiedades */

     protected
     [object](#language.types.object)
      [$resultDocument](#mongodb-driver-exception-commandexception.props.resultdocument);


    /* Propiedades heredadas */

    protected
     ?[array](#language.types.array)
      [$errorLabels](#mongodb-driver-exception-runtimeexception.props.errorlabels);


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

final public [getResultDocument](#mongodb-driver-commandexception.getresultdocument)(): [object](#language.types.object)

    /* Métodos heredados */

    final public [MongoDB\Driver\Exception\RuntimeException::hasErrorLabel](#mongodb-driver-runtimeexception.haserrorlabel)([string](#language.types.string) $errorLabel): [bool](#language.types.boolean)


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

     resultDocument


       El resultado del documento asociado a la orden fallida.





# MongoDB\Driver\Exception\CommandException::getResultDocument

(mongodb &gt;= 1.5.0)

MongoDB\Driver\Exception\CommandException::getResultDocument — Devuelve el documento resultante para el comando fallido

### Descripción

final public **MongoDB\Driver\Exception\CommandException::getResultDocument**(): [object](#language.types.object)

Devuelve el documento resultante para el comando fallido.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El documento resultante para el comando fallido.

### Ver también

- [MongoDB\Driver\Manager::executeCommand()](#mongodb-driver-manager.executecommand) - Ejecuta un comando de base de datos

## Tabla de contenidos

- [MongoDB\Driver\Exception\CommandException::getResultDocument](#mongodb-driver-commandexception.getresultdocument) — Devuelve el documento resultante para el comando fallido

# La clase MongoDB\Driver\Exception\ConnectionException

(mongodb &gt;= 1.0.0)

## Introducción

    Clase base para las excepciones lanzadas cuando el controlador no logra
    establecer una conexión de base de datos.

## Sinopsis de la Clase

    ****




      class **MongoDB\Driver\Exception\ConnectionException**



      extends
       [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception)


     implements
       [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception) {

    /* Propiedades heredadas */

     protected
     ?[array](#language.types.array)
      [$errorLabels](#mongodb-driver-exception-runtimeexception.props.errorlabels);


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

final public [MongoDB\Driver\Exception\RuntimeException::hasErrorLabel](#mongodb-driver-runtimeexception.haserrorlabel)([string](#language.types.string) $errorLabel): [bool](#language.types.boolean)

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

# La clase MongoDB\Driver\Exception\ConnectionTimeoutException

(mongodb &gt;= 1.0.0)

## Introducción

    Lanzada cuando el controlador falla al establecer una conexión a la base de datos
    en un tiempo especificado
    ([connectTimeoutMS](#mongodb-driver-manager.construct-urioptions))
    o cuando la selección del servidor falla
    ([serverSelectionTimeoutMS](#mongodb-driver-manager.construct-urioptions)).

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Exception\ConnectionTimeoutException**



      extends
       [MongoDB\Driver\Exception\ConnectionException](#class.mongodb-driver-exception-connectionexception)


     implements
       [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception) {

    /* Propiedades heredadas */


     protected
     ?[array](#language.types.array)
      [$errorLabels](#mongodb-driver-exception-runtimeexception.props.errorlabels);


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

final public [MongoDB\Driver\Exception\RuntimeException::hasErrorLabel](#mongodb-driver-runtimeexception.haserrorlabel)([string](#language.types.string) $errorLabel): [bool](#language.types.boolean)

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

# La clase MongoDB\Driver\Exception\EncryptionException

(mongodb &gt;= 1.7.0)

## Introducción

    La clase base para las excepciones lanzadas durante el cifrado en el lado-cliente.

## Sinopsis de la Clase

    ****




      class **MongoDB\Driver\Exception\EncryptionException**



      extends
       [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception)


     implements
       [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception) {

    /* Propiedades heredadas */

     protected
     ?[array](#language.types.array)
      [$errorLabels](#mongodb-driver-exception-runtimeexception.props.errorlabels);


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

final public [MongoDB\Driver\Exception\RuntimeException::hasErrorLabel](#mongodb-driver-runtimeexception.haserrorlabel)([string](#language.types.string) $errorLabel): [bool](#language.types.boolean)

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

# La clase MongoDB\Driver\Exception\Exception

(mongodb &gt;= 1.0.0)

## Introducción

    Interfaz común para todas las excepciones de la extensión. Esta interfaz es también utilizada
    por la biblioteca, y puede ser utilizada para identificar cualquier excepción proveniente
    del controlador PHP de MongoDB (es decir, la extensión y la biblioteca).

## Sinopsis de la Clase

    ****




      class **MongoDB\Driver\Exception\Exception**

     {

}

# La clase MongoDB\Driver\Exception\ExecutionTimeoutException

(mongodb &gt;= 1.0.0)

## Introducción

    Lanzada cuando una petición o una orden falla en completarse dentro de un
    tiempo límite especificado (por ejemplo
    [» maxTimeMS](https://www.mongodb.com/docs/manual/tutorial/terminate-running-operations/#maxtimems)).

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Exception\ExecutionTimeoutException**



      extends
       [MongoDB\Driver\Exception\ServerException](#class.mongodb-driver-exception-serverexception)


     implements
       [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception) {

    /* Propiedades heredadas */


     protected
     ?[array](#language.types.array)
      [$errorLabels](#mongodb-driver-exception-runtimeexception.props.errorlabels);


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

final public [MongoDB\Driver\Exception\RuntimeException::hasErrorLabel](#mongodb-driver-runtimeexception.haserrorlabel)([string](#language.types.string) $errorLabel): [bool](#language.types.boolean)

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

## Historial de cambios

        Versión
        Descripción






        PECL mongodb 1.5.0


          Esta clase ahora extiende
          [MongoDB\Driver\Exception\ServerException](#class.mongodb-driver-exception-serverexception)
          en lugar de
          [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception).









# La clase MongoDB\Driver\Exception\InvalidArgumentException

(mongodb &gt;= 1.0.0)

## Introducción

    Se lanza cuando un método de controlador recibe argumentos no válidos (por ejemplo, tipos de opciones no válidos).

## Sinopsis de la Clase

    ****




      class **MongoDB\Driver\Exception\InvalidArgumentException**



      extends
       [InvalidArgumentException](#class.invalidargumentexception)


     implements
       [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception) {

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

# La clase MongoDB\Driver\Exception\LogicException

(mongodb &gt;= 1.0.0)

## Introducción

    Se lanza cuando el controlador se utiliza incorrectamente (por ejemplo, rebobinar un cursor).

## Sinopsis de la Clase

    ****




      class **MongoDB\Driver\Exception\LogicException**



      extends
       [LogicException](#class.logicexception)


     implements
       [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception) {

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

# La clase MongoDB\Driver\Exception\RuntimeException

(mongodb &gt;= 1.0.0)

## Introducción

    Se lanza cuando el controlador encuentra un error de ejecución (por ejemplo, error interno de [» libmongoc](https://github.com/mongodb/mongo-c-driver)).

## Sinopsis de la Clase

    ****




      class **MongoDB\Driver\Exception\RuntimeException**



      extends
       [RuntimeException](#class.runtimeexception)


     implements
       [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception) {

    /* Propiedades */

     protected
     ?[array](#language.types.array)
      [$errorLabels](#mongodb-driver-exception-runtimeexception.props.errorlabels);


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

final public [hasErrorLabel](#mongodb-driver-runtimeexception.haserrorlabel)([string](#language.types.string) $errorLabel): [bool](#language.types.boolean)

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

     errorLabels


       Contiene un array de etiquetas de error para recorrer con una excepción.
       Por ejemplo, las etiquetas de error pueden ser utilizadas para detectar
       si una transacción puede ser reintentada de manera segura si la etiqueta
       TransientTransactionError está presente. La existencia
       de una etiqueta de error específica debe ser probada con
       [MongoDB\Driver\Exception\RuntimeException::hasErrorLabel()](#mongodb-driver-runtimeexception.haserrorlabel),
       en lugar de interpretar manualmente la propiedad
       errorLabels.





## Historial de cambios

        Versión
        Descripción






        PECL mongodb 1.6.0


          El método
          [MongoDB\Driver\Exception\RuntimeException::hasErrorLabel()](#mongodb-driver-runtimeexception.haserrorlabel)
          y la propiedad
          [MongoDB\Driver\Exception\RuntimeException::errorLabels](#mongodb-driver-exception-runtimeexception.props.errorlabels)
           fueron añadidos.









# MongoDB\Driver\Exception\RuntimeException::hasErrorLabel

(mongodb &gt;= 1.6.0)

MongoDB\Driver\Exception\RuntimeException::hasErrorLabel — Devuelve si un label de error está asociado con una excepción

### Descripción

final public **MongoDB\Driver\Exception\RuntimeException::hasErrorLabel**([string](#language.types.string) $errorLabel): [bool](#language.types.boolean)

Devuelve si el errorLabel ha sido definido para esta excepción.
Los labels de error son definidos por el servidor o por la extensión para
indicar situaciones específicas donde se desea decidir cómo manejar
una excepción específica. Una situación común sería determinar si se puede
relanzar una transacción que ha fallado debido a un error pasajero
(como un error de red o un conflicto de transacción) sin problemas.
Ejemplos de labels de error son TransientTransactionError
y UnknownTransactionCommitResult.

### Parámetros

    errorLabel

     El nombre del errorLabel a verificar.

### Valores devueltos

Si el errorLabel proporcionado está asociado con esta
excepción.

### Ver también

- [MongoDB\Driver\Session::commitTransaction()](#mongodb-driver-session.committransaction) - Valida la transacción

- [» Documentación de MongoDB sobre las transacciones](https://www.mongodb.com/docs/manual/core/transactions/)

## Tabla de contenidos

- [MongoDB\Driver\Exception\RuntimeException::hasErrorLabel](#mongodb-driver-runtimeexception.haserrorlabel) — Devuelve si un label de error está asociado con una excepción

# La clase MongoDB\Driver\Exception\ServerException

(mongodb &gt;= 1.5.0)

## Introducción

    La clase base para las excepciones lanzadas por el servidor. El código de esta excepción y de sus subclases corresponderá al código de error original del servidor.

## Sinopsis de la Clase

    ****




      class **MongoDB\Driver\Exception\ServerException**



      extends
       [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception)


     implements
       [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception) {

    /* Propiedades heredadas */

     protected
     ?[array](#language.types.array)
      [$errorLabels](#mongodb-driver-exception-runtimeexception.props.errorlabels);


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

final public [MongoDB\Driver\Exception\RuntimeException::hasErrorLabel](#mongodb-driver-runtimeexception.haserrorlabel)([string](#language.types.string) $errorLabel): [bool](#language.types.boolean)

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

# La clase MongoDB\Driver\Exception\SSLConnectionException

(mongodb &gt;= 1.0.0)

**Advertencia**

    Esta clase de excepción está *DEPRECADA* desde la versión 1.5.0 de la extensión
    y ha sido eliminada en la versión 2.0. Esta excepción nunca fue lanzada por la extensión.
    Las aplicaciones deberían utilizar [MongoDB\Driver\Exception\ConnectionException](#class.mongodb-driver-exception-connectionexception)
    en su lugar.

## Introducción

    Se lanza cuando el controlador no logra establecer una conexión SSL con
    el servidor.

## Sinopsis de la Clase

    ****



     final

      class **MongoDB\Driver\Exception\SSLConnectionException**



      extends
       [MongoDB\Driver\Exception\ConnectionException](#class.mongodb-driver-exception-connectionexception)


     implements
       [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception) {

    /* Propiedades heredadas */


     protected
     ?[array](#language.types.array)
      [$errorLabels](#mongodb-driver-exception-runtimeexception.props.errorlabels);


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

final public [MongoDB\Driver\Exception\RuntimeException::hasErrorLabel](#mongodb-driver-runtimeexception.haserrorlabel)([string](#language.types.string) $errorLabel): [bool](#language.types.boolean)

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

# La clase MongoDB\Driver\Exception\UnexpectedValueException

(mongodb &gt;= 1.0.0)

## Introducción

    Lanzada cuando el controlador encuentra un valor inesperado (por ejemplo, durante la serialización
    o deserialización BSON).

## Sinopsis de la Clase

    ****




      class **MongoDB\Driver\Exception\UnexpectedValueException**



      extends
       [UnexpectedValueException](#class.unexpectedvalueexception)


     implements
       [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception) {

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

# La clase MongoDB\Driver\Exception\WriteException

(mongodb &gt;= 1.0.0)

**Advertencia**

    Esta clase de excepción está *DEPRECADA* desde la versión 1.20.0 de la extensión
    y ha sido eliminada en la versión 2.0.
    Esta excepción nunca fue lanzada directamente por la extensión.
    Las aplicaciones deberían utilizar [MongoDB\Driver\Exception\BulkWriteException](#class.mongodb-driver-exception-bulkwriteexception)
    en su lugar.

## Introducción

    Clase base para las excepciones lanzadas por una operación de escritura
    fallida. La excepción encapsula un objeto [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult).

## Sinopsis de la Clase

    ****




      class **MongoDB\Driver\Exception\WriteException**



      extends
       [MongoDB\Driver\Exception\ServerException](#class.mongodb-driver-exception-serverexception)


     implements
       [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception) {

    /* Propiedades */

     protected
     [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)
      [$writeResult](#mongodb-driver-exception-writeexception.props.writeresult);


    /* Propiedades heredadas */

    protected
     ?[array](#language.types.array)
      [$errorLabels](#mongodb-driver-exception-runtimeexception.props.errorlabels);


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

final public [getWriteResult](#mongodb-driver-writeexception.getwriteresult)(): [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)

    /* Métodos heredados */

    final public [MongoDB\Driver\Exception\RuntimeException::hasErrorLabel](#mongodb-driver-runtimeexception.haserrorlabel)([string](#language.types.string) $errorLabel): [bool](#language.types.boolean)


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

     writeResult


       [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult) asociado a la operación
       de escritura fallida.





## Historial de cambios

        Versión
        Descripción






        PECL mongodb 1.20.0

         Esta clase ha sido deprecada y será eliminada en la versión 2.0.




        PECL mongodb 1.5.0


          Esta clase ahora extiende
          [MongoDB\Driver\Exception\ServerException](#class.mongodb-driver-exception-serverexception)
          en lugar de
          [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception).









# MongoDB\Driver\Exception\WriteException::getWriteResult

(mongodb &gt;= 1.0.0)

MongoDB\Driver\Exception\WriteException::getWriteResult — Devuelve el WriteResult para la operación de escritura que falló

### Descripción

final public **MongoDB\Driver\Exception\WriteException::getWriteResult**(): [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)

Devuelve el [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult) para la operación de escritura
que falló. Los métodos
[MongoDB\Driver\WriteResult::getWriteErrors()](#mongodb-driver-writeresult.getwriteerrors) y
[MongoDB\Driver\WriteResult::getWriteConcernError()](#mongodb-driver-writeresult.getwriteconcernerror)
pueden ser utilizados para recuperar más detalles sobre el fallo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult) para la operación de escritura
que falló.

### Ejemplos

**Ejemplo #1 Ejemplo con MongoDB\Driver\Exception\WriteException::getWriteResult()**

&lt;?php

$manager = new MongoDB\Driver\Manager('mongodb://localhost');
$bulk = new MongoDB\Driver\BulkWrite;
$bulk-&gt;insert(['_id' =&gt; 1]);
$bulk-&gt;insert(['_id' =&gt; 1]);

try {
$manager-&gt;executeBulkWrite('db.collection', $bulk);
} catch (MongoDB\Driver\Exception\WriteException $e) {
$writeResult = $e-&gt;getWriteResult();

    if ($writeConcernError = $writeResult-&gt;getWriteConcernError()) {
        var_dump($writeConcernError);
    }

    if ($writeErrors = $writeResult-&gt;getWriteErrors()) {
        var_dump($writeErrors);
    }

}

?&gt;

Resultado del ejemplo anterior es similar a:

array(1) {
[0]=&gt;
object(MongoDB\Driver\WriteError)#5 (4) {
["message"]=&gt;
string(70) "E11000 duplicate key error index: db.collection.$_id_ dup key: { : 1 }"
["code"]=&gt;
int(11000)
["index"]=&gt;
int(1)
["info"]=&gt;
NULL
}
}

### Ver también

- [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult)

- [MongoDB\Driver\Manager::executeBulkWrite()](#mongodb-driver-manager.executebulkwrite) - Ejecuta una o varias operaciones de escritura

## Tabla de contenidos

- [MongoDB\Driver\Exception\WriteException::getWriteResult](#mongodb-driver-writeexception.getwriteresult) — Devuelve el WriteResult para la operación de escritura que falló

    # El árbol de excepciones MongoDB

    La jerarquía de clases para las excepciones MongoDB está modelada según
    la de las [Excepciones SPL](#spl.exceptions). Las clases
    base extienden su homólogo SPL y todas las clases de excepción de la extensión
    implementan la interfaz [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception).
    - [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception) (extends [LogicException](#class.logicexception))

    - [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) (extends [InvalidArgumentException](#class.invalidargumentexception))

    - [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception) (extends [UnexpectedValueException](#class.unexpectedvalueexception))

    - [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) (extends [RuntimeException](#class.runtimeexception))

         <li class="listitem">
          [MongoDB\Driver\Exception\ConnectionException](#class.mongodb-driver-exception-connectionexception)
          
           <li class="listitem">[MongoDB\Driver\Exception\AuthenticationException](#class.mongodb-driver-exception-authenticationexception)
        - [MongoDB\Driver\Exception\ConnectionTimeoutException](#class.mongodb-driver-exception-connectiontimeoutexception)

        - [MongoDB\Driver\Exception\SSLConnectionException](#class.mongodb-driver-exception-sslconnectionexception) (deprecado)

         </li>
         - [MongoDB\Driver\Exception\EncryptionException](#class.mongodb-driver-exception-encryptionexception)
        - [MongoDB\Driver\Exception\ServerException](#class.mongodb-driver-exception-serverexception)

             <li class="listitem">[MongoDB\Driver\Exception\BulkWriteCommandException](#class.mongodb-driver-exception-bulkwritecommandexception)
            - [MongoDB\Driver\Exception\CommandException](#class.mongodb-driver-exception-commandexception)

            - [MongoDB\Driver\Exception\ExecutionTimeoutException](#class.mongodb-driver-exception-executiontimeoutexception)

            - [MongoDB\Driver\Exception\WriteException](#class.mongodb-driver-exception-writeexception) (deprecado)

                 <li class="listitem">[MongoDB\Driver\Exception\BulkWriteException](#class.mongodb-driver-exception-bulkwriteexception)

             </li>

         </li>

      </li>


- [Instalación/Configuración](#mongodb.setup)<li>[Requerimientos](#mongodb.requirements)
- [Instalación](#mongodb.installation)
- [Configuración en tiempo de ejecución](#mongodb.configuration)
  </li>- [Constantes predefinidas](#mongodb.constants)
- [Tutoriales](#mongodb.tutorial)<li>[Utilizar la biblioteca PHP para MongoDB (PHPLIB)](#mongodb.tutorial.library)
- [Monitoreo del rendimiento de la aplicación (Application Performance Monitoring - APM)](#mongodb.tutorial.apm)
  </li>- [Arquitectura y funcionalidades especiales](#mongodb.architecture) — Explicaciones de la arquitectura del controlador y de las funcionalidades especiales<li>[Arquitectura](#mongodb.overview) — Visión general de la arquitectura
- [Conexiones](#mongodb.connection-handling) — Gestión de la conexión y de la persistencia
- [Persistir datos](#mongodb.persistence) — Serialización y deserialización de variables PHP en MongoDB
  </li>- [Seguridad](#mongodb.security)<li>[Ataques por inyección de consultas](#mongodb.security.request_injection)
- [Ataque por inyección de scripts](#mongodb.security.script_injection)
  </li>- [MongoDB\Driver](#mongodb.mongodb) — Clases de la extensión MongoDB<li>[MongoDB\Driver\Manager](#class.mongodb-driver-manager) — La clase MongoDB\Driver\Manager
- [MongoDB\Driver\Command](#class.mongodb-driver-command) — La clase MongoDB\Driver\Command
- [MongoDB\Driver\Query](#class.mongodb-driver-query) — La clase MongoDB\Driver\Query
- [MongoDB\Driver\BulkWrite](#class.mongodb-driver-bulkwrite) — La clase MongoDB\Driver\BulkWrite
- [MongoDB\Driver\BulkWriteCommand](#class.mongodb-driver-bulkwritecommand) — La clase MongoDB\Driver\BulkWriteCommand
- [MongoDB\Driver\Session](#class.mongodb-driver-session) — La clase MongoDB\Driver\Session
- [MongoDB\Driver\ClientEncryption](#class.mongodb-driver-clientencryption) — La clase MongoDB\Driver\ClientEncryption
- [MongoDB\Driver\ServerApi](#class.mongodb-driver-serverapi) — La clase MongoDB\Driver\ServerApi
- [MongoDB\Driver\WriteConcern](#class.mongodb-driver-writeconcern) — La clase MongoDB\Driver\WriteConcern
- [MongoDB\Driver\ReadPreference](#class.mongodb-driver-readpreference) — La clase MongoDB\Driver\ReadPreference
- [MongoDB\Driver\ReadConcern](#class.mongodb-driver-readconcern) — La clase MongoDB\Driver\ReadConcern
- [MongoDB\Driver\Cursor](#class.mongodb-driver-cursor) — La clase MongoDB\Driver\Cursor
- [MongoDB\Driver\CursorId](#class.mongodb-driver-cursorid) — La clase MongoDB\Driver\CursorId
- [MongoDB\Driver\CursorInterface](#class.mongodb-driver-cursorinterface) — La interfaz MongoDB\Driver\CursorInterface
- [MongoDB\Driver\Server](#class.mongodb-driver-server) — La clase MongoDB\Driver\Server
- [MongoDB\Driver\ServerDescription](#class.mongodb-driver-serverdescription) — La clase MongoDB\Driver\ServerDescription
- [MongoDB\Driver\TopologyDescription](#class.mongodb-driver-topologydescription) — La clase MongoDB\Driver\TopologyDescription
- [MongoDB\Driver\WriteConcernError](#class.mongodb-driver-writeconcernerror) — La clase MongoDB\Driver\WriteConcernError
- [MongoDB\Driver\WriteError](#class.mongodb-driver-writeerror) — La clase MongoDB\Driver\WriteError
- [MongoDB\Driver\WriteResult](#class.mongodb-driver-writeresult) — La clase MongoDB\Driver\WriteResult
- [MongoDB\Driver\BulkWriteCommandResult](#class.mongodb-driver-bulkwritecommandresult) — La clase MongoDB\Driver\BulkWriteCommandResult
  </li>- [MongoDB\BSON](#mongodb.bson) — Clases y funciones BSON de MongoDB<li>[Funciones](#ref.bson.functions)
- [MongoDB\BSON\Document](#class.mongodb-bson-document) — la clase MongoDB\BSON\Document
- [MongoDB\BSON\PackedArray](#class.mongodb-bson-packedarray) — La clase MongoDB\BSON\PackedArray
- [MongoDB\BSON\Iterator](#class.mongodb-bson-iterator) — La clase MongoDB\BSON\Iterator
- [MongoDB\BSON\Binary](#class.mongodb-bson-binary) — La clase MongoDB\BSON\Binary
- [MongoDB\BSON\Decimal128](#class.mongodb-bson-decimal128) — La clase MongoDB\BSON\Decimal128
- [MongoDB\BSON\Javascript](#class.mongodb-bson-javascript) — La clase MongoDB\BSON\Javascript
- [MongoDB\BSON\MaxKey](#class.mongodb-bson-maxkey) — La clase MongoDB\BSON\MaxKey
- [MongoDB\BSON\MinKey](#class.mongodb-bson-minkey) — La clase MongoDB\BSON\MinKey
- [MongoDB\BSON\ObjectId](#class.mongodb-bson-objectid) — La clase MongoDB\BSON\ObjectId
- [MongoDB\BSON\Regex](#class.mongodb-bson-regex) — La clase MongoDB\BSON\Regex
- [MongoDB\BSON\Timestamp](#class.mongodb-bson-timestamp) — La clase MongoDB\BSON\Timestamp
- [MongoDB\BSON\UTCDatetime](#class.mongodb-bson-utcdatetime) — La clase MongoDB\BSON\UTCDatetime
- [MongoDB\BSON\Type](#class.mongodb-bson-type) — La interfaz MongoDB\BSON\Type
- [MongoDB\BSON\Persistable](#class.mongodb-bson-persistable) — La clase MongoDB\BSON\Persistable
- [MongoDB\BSON\Serializable](#class.mongodb-bson-serializable) — La clase MongoDB\BSON\Serializable
- [MongoDB\BSON\Unserializable](#class.mongodb-bson-unserializable) — La interfaz MongoDB\BSON\Unserializable
- [MongoDB\BSON\BinaryInterface](#class.mongodb-bson-binaryinterface) — La interfaz MongoDB\BSON\BinaryInterface
- [MongoDB\BSON\Decimal128Interface](#class.mongodb-bson-decimal128interface) — La interfaz MongoDB\BSON\Decimal128Interface
- [MongoDB\BSON\JavascriptInterface](#class.mongodb-bson-javascriptinterface) — La interfaz MongoDB\BSON\JavascriptInterface
- [MongoDB\BSON\MaxKeyInterface](#class.mongodb-bson-maxkeyinterface) — La interfaz MongoDB\BSON\MaxKeyInterface
- [MongoDB\BSON\MinKeyInterface](#class.mongodb-bson-minkeyinterface) — La interfaz MongoDB\BSON\MinKeyInterface
- [MongoDB\BSON\ObjectIdInterface](#class.mongodb-bson-objectidinterface) — La interfaz MongoDB\BSON\ObjectIdInterface
- [MongoDB\BSON\RegexInterface](#class.mongodb-bson-regexinterface) — La interfaz MongoDB\BSON\RegexInterface
- [MongoDB\BSON\TimestampInterface](#class.mongodb-bson-timestampinterface) — La interfaz MongoDB\BSON\TimestampInterface
- [MongoDB\BSON\UTCDateTimeInterface](#class.mongodb-bson-utcdatetimeinterface) — La interfaz MongoDB\BSON\UTCDateTimeInterface
- [MongoDB\BSON\DBPointer](#class.mongodb-bson-dbpointer) — La clase MongoDB\BSON\DBPointer
- [MongoDB\BSON\Int64](#class.mongodb-bson-int64) — La clase MongoDB\BSON\Int64
- [MongoDB\BSON\Symbol](#class.mongodb-bson-symbol) — La clase MongoDB\BSON\Symbol
- [MongoDB\BSON\Undefined](#class.mongodb-bson-undefined) — La clase MongoDB\BSON\Undefined
  </li>- [MongoDB\Driver\Monitoring](#mongodb.monitoring) — Monitorización de clases y funciones de suscriptor<li>[Funciones](#ref.monitoring.functions)
- [MongoDB\Driver\Monitoring\CommandFailedEvent](#class.mongodb-driver-monitoring-commandfailedevent) — La clase MongoDB\Driver\Monitoring\CommandFailedEvent
- [MongoDB\Driver\Monitoring\CommandStartedEvent](#class.mongodb-driver-monitoring-commandstartedevent) — La clase MongoDB\Driver\Monitoring\CommandStartedEvent
- [MongoDB\Driver\Monitoring\CommandSucceededEvent](#class.mongodb-driver-monitoring-commandsucceededevent) — La clase MongoDB\Driver\Monitoring\CommandSucceededEvent
- [MongoDB\Driver\Monitoring\ServerChangedEvent](#class.mongodb-driver-monitoring-serverchangedevent) — La clase MongoDB\Driver\Monitoring\ServerChangedEvent
- [MongoDB\Driver\Monitoring\ServerClosedEvent](#class.mongodb-driver-monitoring-serverclosedevent) — La clase MongoDB\Driver\Monitoring\ServerClosedEvent
- [MongoDB\Driver\Monitoring\ServerOpeningEvent](#class.mongodb-driver-monitoring-serveropeningevent) — La clase MongoDB\Driver\Monitoring\ServerOpeningEvent
- [MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent](#class.mongodb-driver-monitoring-serverheartbeatfailedevent) — La clase MongoDB\Driver\Monitoring\ServerHeartbeatFailedEvent
- [MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent](#class.mongodb-driver-monitoring-serverheartbeatstartedevent) — La clase MongoDB\Driver\Monitoring\ServerHeartbeatStartedEvent
- [MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent](#class.mongodb-driver-monitoring-serverheartbeatsucceededevent) — La clase MongoDB\Driver\Monitoring\ServerHeartbeatSucceededEvent
- [MongoDB\Driver\Monitoring\TopologyChangedEvent](#class.mongodb-driver-monitoring-topologychangedevent) — La clase MongoDB\Driver\Monitoring\TopologyChangedEvent
- [MongoDB\Driver\Monitoring\TopologyClosedEvent](#class.mongodb-driver-monitoring-topologyclosedevent) — La clase MongoDB\Driver\Monitoring\TopologyClosedEvent
- [MongoDB\Driver\Monitoring\TopologyOpeningEvent](#class.mongodb-driver-monitoring-topologyopeningevent) — La clase MongoDB\Driver\Monitoring\TopologyOpeningEvent
- [MongoDB\Driver\Monitoring\CommandSubscriber](#class.mongodb-driver-monitoring-commandsubscriber) — La interfaz MongoDB\Driver\Monitoring\CommandSubscriber
- [MongoDB\Driver\Monitoring\SDAMSubscriber](#class.mongodb-driver-monitoring-sdamsubscriber) — La interfaz MongoDB\Driver\Monitoring\SDAMSubscriber
- [MongoDB\Driver\Monitoring\Subscriber](#class.mongodb-driver-monitoring-subscriber) — La interfaz MongoDB\Driver\Monitoring\Subscriber
  </li>- [MongoDB\Driver\Exception](#mongodb.exceptions) — Las clases de excepción<li>[MongoDB\Driver\Exception\AuthenticationException](#class.mongodb-driver-exception-authenticationexception) — La clase MongoDB\Driver\Exception\AuthenticationException
- [MongoDB\Driver\Exception\BulkWriteException](#class.mongodb-driver-exception-bulkwriteexception) — La clase MongoDB\Driver\Exception\BulkWriteException
- [MongoDB\Driver\Exception\BulkWriteCommandException](#class.mongodb-driver-exception-bulkwritecommandexception) — La clase MongoDB\Driver\Exception\BulkWriteCommandException
- [MongoDB\Driver\Exception\CommandException](#class.mongodb-driver-exception-commandexception) — La clase MongoDB\Driver\Exception\CommandException
- [MongoDB\Driver\Exception\ConnectionException](#class.mongodb-driver-exception-connectionexception) — La clase MongoDB\Driver\Exception\ConnectionException
- [MongoDB\Driver\Exception\ConnectionTimeoutException](#class.mongodb-driver-exception-connectiontimeoutexception) — La clase MongoDB\Driver\Exception\ConnectionTimeoutException
- [MongoDB\Driver\Exception\EncryptionException](#class.mongodb-driver-exception-encryptionexception) — La clase MongoDB\Driver\Exception\EncryptionException
- [MongoDB\Driver\Exception\Exception](#class.mongodb-driver-exception-exception) — La clase MongoDB\Driver\Exception\Exception
- [MongoDB\Driver\Exception\ExecutionTimeoutException](#class.mongodb-driver-exception-executiontimeoutexception) — La clase MongoDB\Driver\Exception\ExecutionTimeoutException
- [MongoDB\Driver\Exception\InvalidArgumentException](#class.mongodb-driver-exception-invalidargumentexception) — La clase MongoDB\Driver\Exception\InvalidArgumentException
- [MongoDB\Driver\Exception\LogicException](#class.mongodb-driver-exception-logicexception) — La clase MongoDB\Driver\Exception\LogicException
- [MongoDB\Driver\Exception\RuntimeException](#class.mongodb-driver-exception-runtimeexception) — La clase MongoDB\Driver\Exception\RuntimeException
- [MongoDB\Driver\Exception\ServerException](#class.mongodb-driver-exception-serverexception) — La clase MongoDB\Driver\Exception\ServerException
- [MongoDB\Driver\Exception\SSLConnectionException](#class.mongodb-driver-exception-sslconnectionexception) — La clase MongoDB\Driver\Exception\SSLConnectionException
- [MongoDB\Driver\Exception\UnexpectedValueException](#class.mongodb-driver-exception-unexpectedvalueexception) — La clase MongoDB\Driver\Exception\UnexpectedValueException
- [MongoDB\Driver\Exception\WriteException](#class.mongodb-driver-exception-writeexception) — La clase MongoDB\Driver\Exception\WriteException
- [Árbol de clases](#mongodb.exceptions.tree) — El árbol de excepciones MongoDB
  </li>
