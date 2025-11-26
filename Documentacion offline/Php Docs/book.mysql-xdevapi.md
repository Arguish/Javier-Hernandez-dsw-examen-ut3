# Mysql_xdevapi

# Introducción

Esta extensión proporciona acceso al Document Store de MySQL a través de la DevAPI X.
La DevAPI X es una API común proporcionada por varios MySQL Connectors que permiten
un acceso fácil a las tablas relacionales así como a las colecciones de documentos,
que se representan en JSON, desde una API con operaciones de estilo CRUD.

La DevAPI de X utiliza el protocolo X, el protocolo de nueva generación cliente-servidor
de MySQL servidor 8.0.

Para información general sobre MySQL Document Store, consulte el capítulo
[» MySQL Document Store](https://dev.mysql.com/doc/refman/8.0/en/document-store.html)
del manual de MySQL.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#mysql-xdevapi.requirements)
- [Instalación](#mysql-xdevapi.installation)
- [Configuración en tiempo de ejecución](#mysql-xdevapi.configuration)
- [Compilar a partir de las fuentes](#mysql-xdevapi.build)

    ## Requerimientos

    Esta extensión requiere un servidor MySQL 8+ con el complemento X
    activado (por omisión).

    Las bibliotecas prerrequisitos para compilar esta extensión son:
    Boost (1.53.0 o superior), OpenSSL y Protobuf.

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Un ejemplo de procedimiento de instalación en Ubuntu 18.04 con PHP 7.2:

// Dependencias
$ apt install build-essential libprotobuf-dev libboost-dev openssl protobuf-compiler liblz4-tool zstd

// PHP con las extensiones deseadas; php7.2-dev es requerido para compilar
$ apt install php7.2-cli php7.2-dev php7.2-mysql php7.2-pdo php7.2-xml

// Compilar esta extensión
$ pecl install mysql_xdevapi

    El comando pecl install no activa las extensiones PHP (por omisión)
    y activar las extensiones PHP puede hacerse de varias maneras.
    Otro ejemplo con PHP 7.2 en Ubuntu 18.04:

// Crear su propio fichero ini
$ echo "extension=mysql_xdevapi.so" &gt; /etc/php/7.2/mods-available/mysql_xdevapi.ini

// Utilizar el comando 'phpenmod' (nota: específico de Debian/Ubuntu)
$ phpenmod -v 7.2 -s ALL mysql_xdevapi

// Una alternativa a 'phpenmod' es crear un enlace simbólico manualmente
// $ ln -s /etc/php/7.2/mods-available/mysql_xdevapi.ini /etc/php/7.2/cli/conf.d/20-mysql_xdevapi.ini

// Veamos qué extensiones MySQL están activadas ahora
$ php -m |grep mysql

mysql_xdevapi
mysqli
mysqlnd
pdo_mysql

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/mysql_xdevapi](https://pecl.php.net/package/mysql_xdevapi).

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración Mysql_xdevapi**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [xmysqlnd.collect_memory_statistics](#ini.xmysqlnd.collect-memory-statistics)
      0
      **[INI_SYSTEM](#constant.ini-system)**




      [xmysqlnd.collect_statistics](#ini.xmysqlnd.collect-statistics)
      1
      **[INI_ALL](#constant.ini-all)**




      [xmysqlnd.debug](#ini.xmysqlnd.debug)
       
      **[INI_SYSTEM](#constant.ini-system)**




      [xmysqlnd.mempool_default_size](#ini.xmysqlnd.mempool-default-size)
      16000
      **[INI_ALL](#constant.ini-all)**




      [xmysqlnd.net_read_timeout](#ini.xmysqlnd.net-read-timeout)
      31536000
      **[INI_SYSTEM](#constant.ini-system)**




      [xmysqlnd.trace_alloc](#ini.xmysqlnd.trace-alloc)
       
      **[INI_SYSTEM](#constant.ini-system)**



Aquí hay una aclaración sobre
el uso de las directivas de configuración.

      xmysqlnd.collect_memory_statistics
      [int](#language.types.integer)











      xmysqlnd.collect_statistics
      [int](#language.types.integer)











      xmysqlnd.debug
      [string](#language.types.string)











      xmysqlnd.mempool_default_size
      [int](#language.types.integer)











      xmysqlnd.net_read_timeout
      [int](#language.types.integer)











      xmysqlnd.trace_alloc
      [string](#language.types.string)









## Compilar a partir de las fuentes

    Consideraciones para compilar esta extensión a partir de las fuentes.





      -

          El nombre de la extensión es 'mysql_xdevapi', por lo tanto, utilice --enable-mysql-xdevapi.





      -

          Boost; requerido, utilice opcionalmente la opción de configuración --with-boost=DIR
          o defina la variable de entorno MYSQL_XDEVAPI_BOOST_ROOT. Solo se requieren
          los ficheros de encabezado boost; no los binarios.





      -

          Google Protocol Buffers (protobuf): requerido, utilice opcionalmente la opción de configuración
          --with-protobuf=DIR o defina la variable de entorno MYSQL_XDEVAPI_PROTOBUF_ROOT.




          Opcionalmente utilice make protobufs para generar los ficheros protobuf (*.pb.cc/.h),
          y make clean-protobufs para eliminar los ficheros protobuf generados.




          Nota específica para Windows: según su entorno, la biblioteca estática con
          un runtime DLL multi-thread puede ser necesaria.
          Para preparar, utilice las siguientes opciones:
          *-Dprotobuf_MSVC_STATIC_RUNTIME=OFF -Dprotobuf_BUILD_SHARED_LIBS=OFF*





      -

          Google Protocol Buffers / protoc: requerido, asegúrese de que el correcto
          'protoc' esté disponible en el PATH durante la compilación. Esto es particularmente
          importante ya que los scripts batch del SDK PHP Windows pueden sobrescribir el entorno.





        -

            Bison: requerido, y disponible en el PATH.




            Nota específica para bison Windows: se recomienda encarecidamente utilizar bison
            proporcionado con el SDK PHP elegido, de lo contrario, un error similar a "zend_globals_macros.h(39):
            error C2375: 'zendparse': redefinition; different linkage
            Zend/zend_language_parser.h(214): note: see declaration of 'zendparse'" puede
            ser el resultado. Además, los scripts batch del SDK PHP Windows pueden sobrescribir el entorno.





      -

          Nota específica para Windows: para preparar el entorno, consulte la documentación oficial
          de construcción de Windows para
          [» el SDK actual](https://wiki.php.net/internals/windows/stepbystepbuild_sdk_2).




          Se recomienda utilizar las barras invertidas '\\' en lugar de una barra '/' para todos los caminos.





# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[MYSQLX_CLIENT_SSL](#constant.mysqlx-client-ssl)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_DECIMAL](#constant.mysqlx-type-decimal)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_TINY](#constant.mysqlx-type-tiny)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_SHORT](#constant.mysqlx-type-short)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_SMALLINT](#constant.mysqlx-type-smallint)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_MEDIUMINT](#constant.mysqlx-type-mediumint)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_INT](#constant.mysqlx-type-int)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_BIGINT](#constant.mysqlx-type-bigint)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_LONG](#constant.mysqlx-type-long)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_FLOAT](#constant.mysqlx-type-float)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_DOUBLE](#constant.mysqlx-type-double)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_NULL](#constant.mysqlx-type-null)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_TIMESTAMP](#constant.mysqlx-type-timestamp)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_LONGLONG](#constant.mysqlx-type-longlong)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_INT24](#constant.mysqlx-type-int24)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_DATE](#constant.mysqlx-type-date)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_TIME](#constant.mysqlx-type-time)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_DATETIME](#constant.mysqlx-type-datetime)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_YEAR](#constant.mysqlx-type-year)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_NEWDATE](#constant.mysqlx-type-newdate)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_ENUM](#constant.mysqlx-type-enum)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_SET](#constant.mysqlx-type-set)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_TINY_BLOB](#constant.mysqlx-type-tiny-blob)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_MEDIUM_BLOB](#constant.mysqlx-type-medium-blob)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_LONG_BLOB](#constant.mysqlx-type-long-blob)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_BLOB](#constant.mysqlx-type-blob)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_VAR_STRING](#constant.mysqlx-type-var-string)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_STRING](#constant.mysqlx-type-string)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_CHAR](#constant.mysqlx-type-char)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_BYTES](#constant.mysqlx-type-bytes)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_INTERVAL](#constant.mysqlx-type-interval)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_GEOMETRY](#constant.mysqlx-type-geometry)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_JSON](#constant.mysqlx-type-json)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_NEWDECIMAL](#constant.mysqlx-type-newdecimal)**
     ([int](#language.types.integer))








     **[MYSQLX_TYPE_BIT](#constant.mysqlx-type-bit)**
     ([int](#language.types.integer))








     **[MYSQLX_LOCK_DEFAULT](#constant.mysqlx-lock-default)**
     ([int](#language.types.integer))








     **[MYSQLX_LOCK_NOWAIT](#constant.mysqlx-lock-nowait)**
     ([int](#language.types.integer))








     **[MYSQLX_LOCK_SKIP_LOCKED](#constant.mysqlx-lock-skip-locked)**
     ([int](#language.types.integer))





# Registro de cambios

A las clases/funciones/métodos de esta extensión se han realizado los siguientes cambios.

### Historial de cambios general de la extensión ext/mysql_xdevapi

Este historial de cambios hace referencia a la extensión ext/mysql_xdevapi.

### Cambios globales de la extensión ext/mysql_xdevapi

       Versión
       Descripción






        8.0.28


           Eliminación del soporte de TLSv1 y TLSv1.1. Los valores "TLSv1",
           "TLSv1.0" y "TLSv1.1" se consideran ahora inválidos
           para el atributo de conexión "tls-versions".







       8.0.26


          Deprecación del soporte de TLSv1 y TLSv1.1.








# Ejemplos

El punto de entrada central de la API X es la función **mysql_xdevapi\getSession()**,
que recibe una URI hacia un servidor MySQL 8.0 y devuelve un objeto
[mysql_xdevapi\Session](#class.mysql-xdevapi-session).

**Ejemplo #1 Conectar a un Servidor MySQL**

&lt;?php
try {
$session = mysql_xdevapi\getSession("mysqlx://user:password@host");
} catch(Exception $e) {
die("La conexión no pudo ser establecida: " . $e-&gt;getMessage());
}

// ... usar $session
?&gt;

La sesión proporciona acceso completo a la API. Para una nueva instalación de servidor MySQL,
el primer paso es crear un esquema de base de datos con una colección
para almacenar datos:

**Ejemplo #2 Crear un Esquema y una Colección en el Servidor MySQL**

&lt;?php
$schema = $session-&gt;createSchema("test");
$collection = $schema-&gt;createCollection("example");
?&gt;

Al almacenar datos, generalmente [json_encode()](#function.json-encode) se utiliza para codificar
los datos en JSON, que luego pueden ser almacenados en una colección.

Los siguientes ejemplos almacenan datos en la colección que hemos creado anteriormente,
y luego recuperan partes de estos datos nuevamente.

**Ejemplo #3 Almacenar y Recuperar Datos**

&lt;?php
$marco = [
  "name" =&gt; "Marco",
  "age"  =&gt; 19,
  "job"  =&gt; "Programmer"
];
$mike = [
"name" =&gt; "Mike",
"age" =&gt; 39,
"job" =&gt; "Manager"
];

$schema = $session-&gt;getSchema("test");
$collection = $schema-&gt;getCollection("example");

$collection-&gt;add($marco, $mike)-&gt;execute();

var_dump($collection-&gt;find("name = 'Mike'")-&gt;execute()-&gt;fetchOne());
?&gt;

Resultado del ejemplo anterior es similar a:

array(4) {
["_id"]=&gt;
string(28) "00005ad66aaf0000000000000003"
["age"]=&gt;
int(39)
["job"]=&gt;
string(7) "Manager"
["name"]=&gt;
string(4) "Mike"
}

Este ejemplo demuestra que el servidor MySQL añade un campo adicional llamado
\_id, que sirve como clave primaria del documento.

Este ejemplo también demuestra que los datos recuperados están ordenados alfabéticamente.
Este orden específico proviene del almacenamiento binario eficiente dentro del servidor MySQL, pero
no debe confiarse en él. Consulte la documentación del tipo de datos JSON de MySQL para más detalles.

Opcionalmente, utilice los iteradores de PHP para recuperar múltiples documentos:

**Ejemplo #4 Recuperar e Iterar sobre Múltiples Documentos**

&lt;?php
$result = $collection-&gt;find()-&gt;execute();
foreach ($result as $doc) {
  echo "{$doc["name"]} es un {$doc["job"]}.\n";
}
?&gt;

Resultado del ejemplo anterior es similar a:

Marco es un Programmer.
Mike es un Manager.

# Funciones Mysql_xdevapi

# expression

(No version information available, might only be in Git)

expression — Vincula una expresión a una variable de consulta preparada

### Descripción

**mysql_xdevapi\expression**([string](#language.types.string) $expression): [object](#language.types.object)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    expression





### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Expression()**

&lt;?php
$expression = mysql_xdevapi\Expression("[age,job]");

$res  = $coll-&gt;find("age &gt; 30")-&gt;fields($expression)-&gt;limit(3)-&gt;execute();
$data = $res-&gt;fetchAll();

print_r($data);
?&gt;

Resultado del ejemplo anterior es similar a:

&lt;?php

# getSession

(No version information available, might only be in Git)

getSession — Conecta a un servidor MySQL

### Descripción

**mysql_xdevapi\getSession**([string](#language.types.string) $uri): [mysql_xdevapi\Session](#class.mysql-xdevapi-session)

Conecta al servidor MySQL.

### Parámetros

    uri


      El URI del servidor MySQL, tal como mysqlx://user:password@host.




      Formato de URI:




      scheme://[user[:[password]]@]target[:port][?attribute1=value1&amp;attribute2=value2...




      -
        scheme: requerido, el protocolo de conexión


        En mysql_xdevapi es siempre 'mysqlx' (para el protocolo X)




      -
        user: opcional, la cuenta de usuario MySQL para la autenticación




      -
        password: opcional, la contraseña del usuario MySQL para la autenticación




      -
        target: requerido, la instancia del servidor a la que se refiere la conexión:


        * Conexión TCP (nombre de host, dirección IPv4 o dirección IPv6)


        * Ruta de socket Unix (ruta de fichero local)


        * Pipe nombrado Windows (ruta de fichero local)




      -
        port: opcional, el puerto de red del servidor MySQL.


        Por omisión, el puerto para el protocolo X es 33060




      -

          ?attribute=value: este elemento es opcional y especifica un diccionario de datos
          que contiene diferentes opciones, incluyendo:




          <li class="listitem">

            El atributo auth (mecanismo de autenticación) relacionado con las conexiones cifradas.
            Para más información, ver [» Opciones de comando para las conexiones cifradas](https://dev.mysql.com/doc/refman/8.0/en/encrypted-connection-options.html).
            Los siguientes valores 'auth' son soportados: plain,
            mysql41, external, y sha256_mem.





          -

           El atributo connect-timeout afecta la conexión y
           no las operaciones siguientes. Se define por conexión, ya sea en
           un solo host o en varios.




           Pasar un entero positivo para definir el tiempo límite de conexión en segundos,
           o pasar 0 (cero) para desactivar el tiempo límite (infinito). No definir
           connect-timeout utiliza el valor por omisión de 10.




            En relación, las variables de entorno MYSQLX_CONNECTION_TIMEOUT (tiempo límite en segundos) y MYSQLX_TEST_CONNECTION_TIMEOUT (utilizado durante la ejecución de pruebas)
            pueden ser definidas y utilizadas en lugar de connect-timeout en el URI. La opción
            connect-timeout del URI tiene prioridad sobre estas variables de entorno.





          -

              El atributo opcional compression acepta estos valores:
              preferred (el cliente negocia con el servidor para encontrar un algoritmo soportado; la conexión no está comprimida si no se encuentra un algoritmo soportado mutuamente),
              required (como "preferred", pero la conexión se termina si no se encuentra un algoritmo soportado mutuamente), o
              disabled (la conexión no está comprimida). Por omisión, preferred.




              Esta opción fue añadida en la versión 8.0.20.





          -

              El atributo opcional compression-algorithms define los algoritmos
              de compresión deseados (y su orden de uso preferido):
              zstd_stream (alias: zstd),
              lz4_message (alias: lz4), o
              deflate_stream (alias: deflate o zlib).
              Por omisión, el orden utilizado (según la disponibilidad del sistema) es lz4_message, zstd_stream, y luego deflate_stream.
              Por ejemplo, pasar compression-algorithms=[lz4,zstd_stream] utiliza lz4 si está disponible, de lo contrario
              se utiliza zstd_stream. Si ninguno de los dos está disponible, el comportamiento depende del valor de compression
              por ejemplo, si compression=required entonces fallará con un error.




              Esta opción fue añadida en la versión 8.0.22.






       </li>


**Ejemplo #1 Ejemplo de URI**

mysqlx://foobar
mysqlx://root@localhost?socket=%2Ftmp%2Fmysqld.sock%2F
mysqlx://foo:bar@localhost:33060
mysqlx://foo:bar@localhost:33160?ssl-mode=disabled
mysqlx://foo:bar@localhost:33260?ssl-mode=required
mysqlx://foo:bar@localhost:33360?ssl-mode=required&amp;auth=mysql41
mysqlx://foo:bar@(/path/to/socket)
mysqlx://foo:bar@(/path/to/socket)?auth=sha256_mem
mysqlx://foo:bar@[localhost:33060, 127.0.0.1:33061]
mysqlx://foobar?ssl-ca=(/path/to/ca.pem)&amp;ssl-crl=(/path/to/crl.pem)
mysqlx://foo:bar@[localhost:33060, 127.0.0.1:33061]?ssl-mode=disabled
mysqlx://foo:bar@localhost:33160/?connect-timeout=0
mysqlx://foo:bar@localhost:33160/?connect-timeout=10&amp;compression=required
mysqlx://foo:bar@localhost:33160/?connect-timeout=10&amp;compression=required&amp;compression-algorithms=[lz4,zstd_stream]

    Para más información, ver conexión a MySQL Shell
    [» utilizando una cadena de URI](https://dev.mysql.com/doc/refman/8.0/en/mysql-shell-connection-using-uri.html).

### Valores devueltos

Un objeto **Session**.

### Errores/Excepciones

Un error de conexión lanza una excepción [Exception](#class.exception).

### Ejemplos

**Ejemplo #2 Ejemplo de mysql_xdevapi\getSession()**

&lt;?php
try {
$session = mysql_xdevapi\getSession("mysqlx://user:password@host");
} catch(Exception $e) {
die("La conexión no pudo ser establecida: " . $e-&gt;getMessage());
}

$schemas = $session-&gt;getSchemas();
print_r($schemas);

$mysql_version = $session-&gt;getServerVersion();
print_r($mysql_version);

var_dump($collection-&gt;find("name = 'Alfred'")-&gt;execute()-&gt;fetchOne());
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; mysql_xdevapi\Schema Object
(
[name] =&gt; helloworld
)
[1] =&gt; mysql_xdevapi\Schema Object
(
[name] =&gt; information_schema
)
[2] =&gt; mysql_xdevapi\Schema Object
(
[name] =&gt; mysql
)
[3] =&gt; mysql_xdevapi\Schema Object
(
[name] =&gt; performance_schema
)
[4] =&gt; mysql_xdevapi\Schema Object
(
[name] =&gt; sys
)
)

80012

array(4) {
["_id"]=&gt;
string(28) "00005ad66abf0001000400000003"
["age"]=&gt;
int(42)
["job"]=&gt;
string(7) "Butler"
["name"]=&gt;
string(4) "Alfred"
}

## Tabla de contenidos

- [expression](#function.mysql-xdevapi-expression) — Vincula una expresión a una variable de consulta preparada
- [getSession](#function.mysql-xdevapi-getsession) — Conecta a un servidor MySQL

# Interfaz BaseResult

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\BaseResult**

     {


    /* Métodos */

abstract public **getWarnings**(): [array](#language.types.array)
abstract public **getWarningsCount**(): [int](#language.types.integer)

}

# BaseResult::getWarnings

(No version information available, might only be in Git)

BaseResult::getWarnings — Recupera los avisos de la última operación

### Descripción

abstract public **mysql_xdevapi\BaseResult::getWarnings**(): [array](#language.types.array)

Recupera los avisos generados por la última operación del servidor MySQL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de objetos Warning de la última operación. Cada objeto
define un 'message' de error, un 'nivel' de error y un 'code' de error. Un array
vacío es devuelto si no hay errores.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\RowResult::getWarnings()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("CREATE DATABASE foo")-&gt;execute();
$session-&gt;sql("CREATE TABLE foo.test_table(x int)")-&gt;execute();

$schema = $session-&gt;getSchema("foo");
$table = $schema-&gt;getTable("test_table");

$table-&gt;insert(['x'])-&gt;values([1])-&gt;values([2])-&gt;execute();

$res = $table-&gt;select(['x/0 as bad_x'])-&gt;execute();
$warnings = $res-&gt;getWarnings();

print_r($warnings);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; mysql_xdevapi\Warning Object
(
[message] =&gt; Division by 0
[level] =&gt; 2
[code] =&gt; 1365
)
[1] =&gt; mysql_xdevapi\Warning Object
(
[message] =&gt; Division by 0
[level] =&gt; 2
[code] =&gt; 1365
)
)

# BaseResult::getWarningsCount

(No version information available, might only be in Git)

BaseResult::getWarningsCount — Recupera el número de advertencias de la última operación

### Descripción

abstract public **mysql_xdevapi\BaseResult::getWarningsCount**(): [int](#language.types.integer)

Devuelve el número de advertencias generadas por la última operación. Más específicamente,
estas advertencias son generadas por el servidor MySQL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de advertencias de la última operación.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\RowResult::getWarningsCount()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS foo")-&gt;execute();
$session-&gt;sql("CREATE DATABASE foo")-&gt;execute();
$session-&gt;sql("CREATE TABLE foo.test_table(x int)")-&gt;execute();

$schema = $session-&gt;getSchema("foo");
$table = $schema-&gt;getTable("test_table");

$table-&gt;insert(['x'])-&gt;values([1])-&gt;values([2])-&gt;execute();

$res = $table-&gt;select(['x/0 as bad_x'])-&gt;execute();

echo $res-&gt;getWarningsCount();
?&gt;

Resultado del ejemplo anterior es similar a:

2

## Tabla de contenidos

- [BaseResult::getWarnings](#mysql-xdevapi-baseresult.getwarnings) — Recupera los avisos de la última operación
- [BaseResult::getWarningsCount](#mysql-xdevapi-baseresult.getwarningscount) — Recupera el número de advertencias de la última operación

# La clase Client

(No version information available, might only be in Git)

## Introducción

    Proporciona acceso a la conexión a la base de datos.

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\Client**

     {


    /* Métodos */

public [close](#mysql-xdevapi-client.close)(): [bool](#language.types.boolean)
public **getSession**(): [mysql_xdevapi\Session](#class.mysql-xdevapi-session)

}

# mysql_xdevapi\Client::close

(No version information available, might only be in Git)

mysql_xdevapi\Client::close — Cierra el cliente

### Descripción

public **mysql_xdevapi\Client::close**(): [bool](#language.types.boolean)

Cierra todas las conexiones del cliente con el servidor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si las conexiones son cerradas.

# Client::\_\_construct

(No version information available, might only be in Git)

Client::\_\_construct — Constructor del cliente

### Descripción

private **mysql_xdevapi\Client::\_\_construct**()

Construye un objeto cliente.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Client::\_\_construct()**

&lt;?php
$pooling_options = '{
  "enabled": true,
    "maxSize": 10,
    "maxIdleTime": 3600,
    "queueTimeOut": 1000
}';
$client = mysql_xdevapi\getClient($connection_uri, $pooling_options);
$session = $client-&gt;getSession();

# Client::getClient

(No version information available, might only be in Git)

Client::getClient — Devuelve la sesión del cliente

### Descripción

public **mysql_xdevapi\Client::getSession**(): [mysql_xdevapi\Session](#class.mysql-xdevapi-session)

Devuelve la sesión asociada al cliente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto Session.

## Tabla de contenidos

- [mysql_xdevapi\Client::close](#mysql-xdevapi-client.close) — Cierra el cliente
- [Client::\_\_construct](#mysql-xdevapi-client.construct) — Constructor del cliente
- [Client::getClient](#mysql-xdevapi-client.getsession) — Devuelve la sesión del cliente

# Clase Collection

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\Collection**


     implements
       [mysql_xdevapi\SchemaObject](#class.mysql-xdevapi-schemaobject) {

    /* Propiedades */

     public
      [$name](#mysql-xdevapi-collection.props.name);


    /* Métodos */

public **add**([mixed](#language.types.mixed) $document): [mysql_xdevapi\CollectionAdd](#class.mysql-xdevapi-collectionadd)
public **addOrReplaceOne**([string](#language.types.string) $id, [string](#language.types.string) $doc): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)
public **count**(): [int](#language.types.integer)
public **createIndex**([string](#language.types.string) $index_name, [string](#language.types.string) $index_desc_json): [void](language.types.void.html)
public **dropIndex**([string](#language.types.string) $index_name): [bool](#language.types.boolean)
public **existsInDatabase**(): [bool](#language.types.boolean)
public **find**([string](#language.types.string) $search_condition = ?): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)
public **getName**(): [string](#language.types.string)
public **getOne**([string](#language.types.string) $id): Document
public **getSchema**(): Schema Object
public **getSession**(): Session
public **modify**([string](#language.types.string) $search_condition): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)
public **remove**([string](#language.types.string) $search_condition): [mysql_xdevapi\CollectionRemove](#class.mysql-xdevapi-collectionremove)
public **removeOne**([string](#language.types.string) $id): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)
public **replaceOne**([string](#language.types.string) $id, [string](#language.types.string) $doc): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

}

## Propiedades

     name






# Collection::add

(No version information available, might only be in Git)

Collection::add — Añade un documento a la colección

### Descripción

public **mysql_xdevapi\Collection::add**([mixed](#language.types.mixed) $document): [mysql_xdevapi\CollectionAdd](#class.mysql-xdevapi-collectionadd)

Desencadena la inserción del o de los documentos dados en la colección, y
se admiten varias variantes de este método. Las opciones incluyen:

- Añadir un solo documento en forma de string JSON.

- Añadir un solo documento en forma de array como:
  [ 'field' =&gt; 'value', 'field2' =&gt; 'value2' ... ]

- Una mezcla de ambos, y varios documentos pueden ser añadidos en la misma operación.

### Parámetros

    document


      Uno o varios documentos, y esto puede ser tanto JSON como un array de campos con
      sus valores asociados. No puede ser un array vacío.




      El servidor MySQL genera automáticamente valores _id únicos para
      cada documento (recomendado), aunque esto también puede ser añadido manualmente. Este
      valor debe ser único, de lo contrario la operación de adición fallará.


### Valores devueltos

Una colección de objetos. Utilizar execute() para devolver un resultado que puede ser utilizado para
consultar el número de elementos afectados, el número de advertencias generadas por la operación, o para
recuperar una lista de identificadores generados para los documentos insertados.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::add()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");

$collection = $schema-&gt;getCollection("people");

// Añade dos documentos
$collection-&gt;add('{"name": "Fred",  "age": 21, "job": "Construction"}')-&gt;execute();
$collection-&gt;add('{"name": "Wilma", "age": 23, "job": "Teacher"}')-&gt;execute();

// Añade dos documentos utilizando un solo objeto JSON
$result = $collection-&gt;add(
'{"name": "Bernie",
"jobs": [{"title":"Cat Herder","Salary":42000}, {"title":"Father","Salary":0}],
"hobbies": ["Sports","Making cupcakes"]}',
'{"name": "Jane",
"jobs": [{"title":"Scientist","Salary":18000}, {"title":"Mother","Salary":0}],
"hobbies": ["Walking","Making pies"]}')-&gt;execute();

// Recupera una lista de identificadores generados a partir del último add()
$ids = $result-&gt;getGeneratedIds();
print_r($ids);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; 00005b6b53610000000000000056
[1] =&gt; 00005b6b53610000000000000057
)

### Notas

**Nota**:

    Un identificador único _id es generado por MySQL Server 8.0 o superior, como se demuestra
    en el ejemplo. El campo _id debe ser definido manualmente si se utiliza
    MySQL Server 5.7.

# Collection::addOrReplaceOne

(No version information available, might only be in Git)

Collection::addOrReplaceOne — Añade o reemplaza un documento de la colección

### Descripción

public **mysql_xdevapi\Collection::addOrReplaceOne**([string](#language.types.string) $id, [string](#language.types.string) $doc): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

Añade un nuevo documento, o reemplaza un documento si ya existe.

Existen varios escenarios para este método:

- Ni el id ni ningún valor de clave única están en conflicto con un documento de la colección,
  entonces el documento es añadido.

- Si el id no corresponde a ningún documento, pero uno o más valores de clave única
  entran en conflicto con un documento de la colección, entonces se lanza un error.

- Si el id corresponde a un documento existente y ninguna clave única está definida para la colección,
  entonces el documento es reemplazado.

- Si el id corresponde a un documento existente, y todas las claves únicas del documento de reemplazo
  corresponden a ese mismo documento o no están en conflicto con ningún otro documento de la colección,
  entonces el documento es reemplazado.

- Si el id corresponde a un documento existente, y una o más claves únicas corresponden a otro
  documento de la colección, entonces se lanza un error.

### Parámetros

    id


      Este es el identificador del filtro. Si este identificador o cualquier otro campo que tiene un índice único ya existe
      en la colección, entonces actualizará el documento correspondiente.




      Por omisión, este identificador es generado automáticamente por el servidor MySQL cuando el documento ha sido añadido,
      y es referenciado como un campo nombrado '_id'.






    doc


      Este es el documento a añadir o reemplazar, que es una cadena JSON.


### Valores devueltos

Un objeto Result.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::addOrReplaceOne()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");

$collection = $schema-&gt;getCollection("people");

// Utilizar add()
$result = $collection-&gt;add('{"name": "Wilma", "age": 23, "job": "Teacher"}')-&gt;execute();

// Utilizar addOrReplaceOne()
// Nota: pasamos aquí un valor \_id conocido
$result = $collection-&gt;addOrReplaceOne('00005b6b53610000000000000056', '{"name": "Fred", "age": 21, "job": "Construction"}');

?&gt;

# Collection::\_\_construct

(No version information available, might only be in Git)

Collection::\_\_construct — Constructor de Collection

### Descripción

private **mysql_xdevapi\Collection::\_\_construct**()

Construye un objeto Collection.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::getOne()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$result = $collection-&gt;add('{"name": "Alfred", "age": 42, "job": "Butler"}')-&gt;execute();

// Un identificador único \_id es generado por MySQL Server
// Esto recupera los \_id generados; uno solo en este ejemplo, por lo tanto $ids[0]
$ids = $result-&gt;getGeneratedIds();
$alfreds_id = $ids[0];

// ...

print_r($alfreds_id);
print_r($collection-&gt;getOne($alfreds_id));
?&gt;

Resultado del ejemplo anterior es similar a:

00005b6b536100000000000000b1

Array
(
[_id] =&gt; 00005b6b536100000000000000b1
[age] =&gt; 42
[job] =&gt; Butler
[name] =&gt; Alfred
)

# Collection::count

(No version information available, might only be in Git)

Collection::count — Devuelve el número de documentos

### Descripción

public **mysql_xdevapi\Collection::count**(): [int](#language.types.integer)

Esta funcionalidad es similar a una operación SQL SELECT COUNT(\*)
en el servidor MySQL para el esquema y la colección actuales.
En otras palabras, cuenta el número de documentos en la colección.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de documentos en la colección.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::count()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");

$collection = $schema-&gt;getCollection("people");

$result = $collection
-&gt;add(
'{"name": "Bernie",
"jobs": [
{"title":"Cat Herder","Salary":42000},
{"title":"Father","Salary":0}
],
"hobbies": ["Sports","Making cupcakes"]}',
'{"name": "Jane",
"jobs": [
{"title":"Scientist","Salary":18000},
{"title":"Mother","Salary":0}
],
"hobbies": ["Walking","Making pies"]}')
-&gt;execute();

var_dump($collection-&gt;count());
?&gt;

El ejemplo anterior mostrará:

int(2)

# Collection::createIndex

(No version information available, might only be in Git)

Collection::createIndex — Crear un índice de colección

### Descripción

public **mysql_xdevapi\Collection::createIndex**([string](#language.types.string) $index_name, [string](#language.types.string) $index_desc_json): [void](language.types.void.html)

    Crear un índice en la colección.




    Se lanza una excepción si ya existe un índice con el mismo nombre,
    o si la definición del índice no está correctamente formada.

### Parámetros

    index_name


      El nombre del índice a crear. Este nombre debe ser un nombre de índice válido tal como
      aceptado por la consulta SQL CREATE INDEX.






    index_desc_json


      La definición del índice a crear. Contiene un array de objetos IndexField,
      y cada objeto describe un solo miembro de documento a incluir en el índice,
      y una cadena opcional para el tipo de índice que podría ser INDEX (por omisión) o SPATIAL.




      Una descripción única de IndexField se compone de los siguientes campos:




      -

          field: string, la ruta completa del documento hacia el miembro del documento o el campo a indexar.





      -

        type: string, uno de los tipos de columnas SQL admitidos para mapear el campo.
        Para los tipos numéricos, la palabra clave opcional UNSIGNED puede seguir.
        Para el tipo TEXT, la longitud a considerar para la indexación puede ser añadida.





      -

          unique: bool, (opcional) true si el campo debe ser existente en el documento.
          Por omisión es **[false](#constant.false)**, excepto para GEOJSON donde por omisión es **[true](#constant.true)**.





      -

          options: integer, (opcional) flags de opciones especiales a utilizar
          al decodificar datos GEOJSON.





      -

          srid: integer, (opcional) valor srid a utilizar al
          decodificar datos GEOJSON.








        Es un error incluir otros campos no descritos anteriormente en
        los documentos IndexDefinition o IndexField.


### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::createIndex()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

// Crear un índice de texto
$collection-&gt;createIndex(
  'myindex1',
  '{"fields": [{
    "field": "$.name",
"type": "TEXT(25)",
"required": true}],
"unique": false}'
);

// Un índice espacial
$collection-&gt;createIndex(
  'myindex2',
  '{"fields": [{
    "field": "$.home",
"type": "GEOJSON",
"required": true}],
"type": "SPATIAL"}'
);

// Índice con múltiples campos
$collection-&gt;createIndex(
  'myindex3',
  '{"fields": [
    {
      "field": "$.name",
"type": "TEXT(20)",
"required": true
},
{
"field": "$.age",
      "type": "INTEGER"
    },
    {
      "field": "$.job",
"type": "TEXT(30)",
"required": false
}
],
"unique": true
}'
);

# Collection::dropIndex

(No version information available, might only be in Git)

Collection::dropIndex — Elimina un índice de colección

### Descripción

public **mysql_xdevapi\Collection::dropIndex**([string](#language.types.string) $index_name): [bool](#language.types.boolean)

Elimina un índice de colección.

Esta operación no lanza un error si el índice no existe, pero
**[false](#constant.false)** es devuelto en este caso.

### Parámetros

    index_name


      El nombre del índice de colección a eliminar.


### Valores devueltos

**[true](#constant.true)** si la operación DROP INDEX ha tenido éxito, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::dropIndex()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");

// ...

$collection = $schema-&gt;getCollection("people");

$collection-&gt;createIndex(
  'myindex',
  '{"fields": [{"field": "$.name", "type": "TEXT(25)", "required": true}], "unique": false}'
);

// ...

if ($collection-&gt;dropIndex('myindex')) {
echo "Un índice llamado 'myindex' fue encontrado y eliminado.";
}
?&gt;

El ejemplo anterior mostrará:

Un índice llamado 'myindex' fue encontrado y eliminado.

# Collection::existsInDatabase

(No version information available, might only be in Git)

Collection::existsInDatabase — Verifica si la colección existe en la base de datos

### Descripción

public **mysql_xdevapi\Collection::existsInDatabase**(): [bool](#language.types.boolean)

Verifica si el objeto Collection hace referencia a una colección en la base de datos (esquema).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la colección existe en la base de datos, de lo contrario **[false](#constant.false)** si no existe.

    Una tabla definida con dos columnas (doc y _id) se considera una colección,
    y una tercera columna _json_schema a partir de MySQL 8.0.21.
    Añadir una columna adicional significa que existsInDatabase() ya no la verá como una colección.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::existsInDatabase()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");

// ...

$collection = $schema-&gt;getCollection("people");

// ...

if (!$collection-&gt;existsInDatabase()) {
echo "La colección ya no existe en la base de datos llamada addressbook. ¿Qué pasó?";
}
?&gt;

# Collection::find

(No version information available, might only be in Git)

Collection::find — Búsqueda de documento

### Descripción

public **mysql_xdevapi\Collection::find**([string](#language.types.string) $search_condition = ?): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)

Busca una colección de base de datos para un documento o un conjunto de documentos. Los
documentos encontrados se devuelven en forma de un objeto CollectionFind para
modificarlos o recuperar resultados adicionales.

### Parámetros

    search_condition


      Aunque es opcional, normalmente se define una condición para limitar los resultados
      a un subconjunto de documentos.




      Varios elementos pueden construir la condición y la sintaxis soporta la ligadura de argumentos.
      La expresión utilizada como condición de búsqueda debe ser una expresión SQL válida.
      Si no se proporciona ninguna condición de búsqueda (campo vacío) entonces se supone find('true').


### Valores devueltos

Un objeto CollectionFind para verificar la operación,
o recuperar los documentos encontrados.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::find()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$collection-&gt;add('{"name": "Alfred",     "age": 18, "job": "Butler"}')-&gt;execute();
$collection-&gt;add('{"name": "Bob", "age": 19, "job": "Swimmer"}')-&gt;execute();
$collection-&gt;add('{"name": "Fred",       "age": 20, "job": "Construction"}')-&gt;execute();
$collection-&gt;add('{"name": "Wilma", "age": 21, "job": "Teacher"}')-&gt;execute();
$collection-&gt;add('{"name": "Suki", "age": 22, "job": "Teacher"}')-&gt;execute();

$find   = $collection-&gt;find('job LIKE :job AND age &gt; :age');
$result = $find
-&gt;bind(['job' =&gt; 'Teacher', 'age' =&gt; 20])
-&gt;sort('age DESC')
-&gt;limit(2)
-&gt;execute();

print_r($result-&gt;fetchAll());
?&gt;

El ejemplo anterior mostrará:

Array
(
[0] =&gt; Array
(
[_id] =&gt; 00005b6b536100000000000000a8
[age] =&gt; 22
[job] =&gt; Teacher
[name] =&gt; Suki
)
[1] =&gt; Array
(
[_id] =&gt; 00005b6b536100000000000000a7
[age] =&gt; 21
[job] =&gt; Teacher
[name] =&gt; Wilma
)
)

# Collection::getName

(No version information available, might only be in Git)

Collection::getName — Devuelve el nombre de la colección

### Descripción

public **mysql_xdevapi\Collection::getName**(): [string](#language.types.string)

Devuelve el nombre de la colección.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre de la colección, en forma de string.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::getName()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

// ...

var_dump($collection-&gt;getName());
?&gt;

Resultado del ejemplo anterior es similar a:

string(6) "people"

# Collection::getOne

(No version information available, might only be in Git)

Collection::getOne — Devuelve un documento

### Descripción

public **mysql_xdevapi\Collection::getOne**([string](#language.types.string) $id): Document

Recupera un documento de la colección.

Esto es un atajo para:
Collection.find("\_id = :id").bind("id", id).execute().fetchOne();

### Parámetros

    id


      El _id del documento en la colección.


### Valores devueltos

El objeto colección, o **[null](#constant.null)** si el \_id no corresponde a un documento.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::getOne()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$result = $collection-&gt;add('{"name": "Alfred", "age": 42, "job": "Butler"}')-&gt;execute();

// Un identificador único \_id (por omisión, y recomendado) es generado por MySQL Server
// Esto recupera los \_id generados; uno solo en este ejemplo, por lo tanto $ids[0]
$ids = $result-&gt;getGeneratedIds();
$alfreds_id = $ids[0];

// ...

print_r($alfreds_id);
print_r($collection-&gt;getOne($alfreds_id));
?&gt;

Resultado del ejemplo anterior es similar a:

00005b6b536100000000000000b1

Array
(
[_id] =&gt; 00005b6b536100000000000000b1
[age] =&gt; 42
[job] =&gt; Butler
[name] =&gt; Alfred
)

# Collection::getSchema

(No version information available, might only be in Git)

Collection::getSchema — Devuelve el objeto esquema

### Descripción

public **mysql_xdevapi\Collection::getSchema**(): Schema Object

Devuelve el objeto esquema que contiene la colección.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El objeto esquema en caso de éxito, o **[null](#constant.null)** si el objeto no puede ser recuperado
para la colección dada.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::getSchema()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

var_dump($collection-&gt;getSchema());
?&gt;

Resultado del ejemplo anterior es similar a:

object(mysql_xdevapi\Schema)#9 (1) {
["name"]=&gt;
string(11) "addressbook"
}

# Collection::getSession

(No version information available, might only be in Git)

Collection::getSession — Devuelve el objeto session

### Descripción

public **mysql_xdevapi\Collection::getSession**(): Session

Devuelve un nuevo objeto Session a partir del objeto Collection.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto Session.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::getSession()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

// ...

$newsession = $collection-&gt;getSession();

var_dump($session);
var_dump($newsession);
?&gt;

Resultado del ejemplo anterior es similar a:

object(mysql_xdevapi\Session)#1 (0) {
}
object(mysql_xdevapi\Session)#4 (0) {
}

# Collection::modify

(No version information available, might only be in Git)

Collection::modify — Modifica los documentos de la colección

### Descripción

public **mysql_xdevapi\Collection::modify**([string](#language.types.string) $search_condition): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)

Modifica los documentos de una colección que cumplen con condiciones de búsqueda específicas.
Se permiten varias operaciones y se soporta la ligadura de argumentos.

### Parámetros

    search_condition


      Debe ser una expresión SQL válida utilizada para hacer coincidir los documentos a modificar.
      Esta expresión puede ser tan simple como **[true](#constant.true)**, que coincide con todos los
      documentos, o puede utilizar funciones y operadores tales como
      'CAST(_id AS SIGNED) &gt;= 10',
      'age MOD 2 = 0 OR age MOD 3 = 0', o
      '_id IN ["2","5","7","10"]'.


### Valores devueltos

SI la operación no se ejecuta, entonces la función devolverá
un objeto Modify que puede ser utilizado para añadir operaciones
de modificación adicionales.

Si la operación de modificación se ejecuta, entonces el objeto devuelto contendrá el
resultado de la operación.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::modify()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$collection-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')-&gt;execute();
$collection-&gt;add('{"name": "Bob", "age": 19, "job": "Painter"}')-&gt;execute();

// Añade dos nuevos trabajos para todos los Painters: Artist y Crafter
$collection
-&gt;modify("job in ('Butler', 'Painter')")
-&gt;arrayAppend('job', 'Artist')
-&gt;arrayAppend('job', 'Crafter')
-&gt;execute();

// Elimina el campo 'beer' de todos los documentos con edad menor a 21
$collection
-&gt;modify('age &lt; 21')
-&gt;unset(['beer'])
-&gt;execute();
?&gt;

# Collection::remove

(No version information available, might only be in Git)

Collection::remove — Elimina documentos de la colección

### Descripción

public **mysql_xdevapi\Collection::remove**([string](#language.types.string) $search_condition): [mysql_xdevapi\CollectionRemove](#class.mysql-xdevapi-collectionremove)

Elimina documentos de una colección que cumplen con condiciones de búsqueda específicas.
Se permiten varias operaciones, y la ligadura de argumentos.

### Parámetros

    search_condition


      Debe ser una expresión SQL válida utilizada para hacer coincidir los documentos a modificar.
      Esta expresión puede ser tan simple como **[true](#constant.true)**, que coincide con todos los
      documentos, o puede utilizar funciones y operadores tales como
      'CAST(_id AS SIGNED) &gt;= 10',
      'age MOD 2 = 0 OR age MOD 3 = 0', o
      '_id IN ["2","5","7","10"]'.


### Valores devueltos

Si la operación no se ejecuta, entonces la función devolverá
un objeto Remove que puede ser utilizado para añadir operaciones
de eliminación adicionales.

SI la operación de eliminación se ejecuta, entonces el objeto devuelto contendrá el
resultado de la operación.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::remove()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$collection-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')-&gt;execute();
$collection-&gt;add('{"name": "Bob", "age": 19, "job": "Painter"}')-&gt;execute();

// Elimina todos los painters
$collection
-&gt;remove("job in ('Painter')")
-&gt;execute();

// Elimina el butler más viejo
$collection
-&gt;remove("job in ('Butler')")
-&gt;sort('age desc')
-&gt;limit(1)
-&gt;execute();

// Elimina el registro con la edad más alta
$collection
-&gt;remove('true')
-&gt;sort('age desc')
-&gt;limit(1)
-&gt;execute();
?&gt;

# Collection::removeOne

(No version information available, might only be in Git)

Collection::removeOne — Elimina un documento de la colección

### Descripción

public **mysql_xdevapi\Collection::removeOne**([string](#language.types.string) $id): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

Elimina un documento de la colección con el ID correspondiente.
Esto es un atajo para Collection.remove("\_id = :id").bind("id", id).execute().

### Parámetros

    id


      El identificador del documento de la colección a eliminar. Generalmente es
      el _id generado por el servidor MySQL al añadir el registro.


### Valores devueltos

Un objeto Result que puede ser utilizado para consultar el número de elementos afectados
o el número de advertencias generadas por la operación.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::removeOne()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$result = $collection-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')-&gt;execute();

// Normalmente el \_id es conocido por otros medios,
// pero para este ejemplo, recuperemos el identificador generado y utilicémoslo
$ids       = $result-&gt;getGeneratedIds();
$alfred_id = $ids[0];

$result = $collection-&gt;removeOne($alfred_id);

if(!$result-&gt;getAffectedItemsCount()) {
echo "Alfred con id $alfred_id no fue eliminado.";
} else {
echo "Adiós, Alfred, puedes llevarte el \_id $alfred_id contigo.";
}
?&gt;

Resultado del ejemplo anterior es similar a:

Adiós, Alfred, puedes llevarte el \_id 00005b6b536100000000000000cb contigo.

# Collection::replaceOne

(No version information available, might only be in Git)

Collection::replaceOne — Reemplaza un documento de la colección

### Descripción

public **mysql_xdevapi\Collection::replaceOne**([string](#language.types.string) $id, [string](#language.types.string) $doc): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

Modifica (o reemplaza) el documento identificado por ID, si existe.

### Parámetros

    id


      El identificador del documento a reemplazar o actualizar. Típicamente es
      el _id generado por el servidor MySQL al añadir el registro.






    doc


      El documento de la colección a actualizar o reemplazar correspondiente
      al argumento **id**.




      Este documento puede ser un objeto documento o un string JSON válido
      que describa el nuevo documento.


### Valores devueltos

Un objeto Result que puede ser utilizado para consultar el número de elementos afectados
y el número de advertencias generadas por la operación.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::replaceOne()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$result = $collection-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')-&gt;execute();

// Normalmente el \_id es conocido por otros medios,
// pero para este ejemplo, recuperemos el identificador generado y utilicémoslo
$ids       = $result-&gt;getGeneratedIds();
$alfred_id = $ids[0];

// ...

$alfred = $collection-&gt;getOne($alfred_id);
$alfred['age'] = 81;
$alfred['job'] = 'Guru';

$collection-&gt;replaceOne($alfred_id, $alfred);

?&gt;

## Tabla de contenidos

- [Collection::add](#mysql-xdevapi-collection.add) — Añade un documento a la colección
- [Collection::addOrReplaceOne](#mysql-xdevapi-collection.addorreplaceone) — Añade o reemplaza un documento de la colección
- [Collection::\_\_construct](#mysql-xdevapi-collection.construct) — Constructor de Collection
- [Collection::count](#mysql-xdevapi-collection.count) — Devuelve el número de documentos
- [Collection::createIndex](#mysql-xdevapi-collection.createindex) — Crear un índice de colección
- [Collection::dropIndex](#mysql-xdevapi-collection.dropindex) — Elimina un índice de colección
- [Collection::existsInDatabase](#mysql-xdevapi-collection.existsindatabase) — Verifica si la colección existe en la base de datos
- [Collection::find](#mysql-xdevapi-collection.find) — Búsqueda de documento
- [Collection::getName](#mysql-xdevapi-collection.getname) — Devuelve el nombre de la colección
- [Collection::getOne](#mysql-xdevapi-collection.getone) — Devuelve un documento
- [Collection::getSchema](#mysql-xdevapi-collection.getschema) — Devuelve el objeto esquema
- [Collection::getSession](#mysql-xdevapi-collection.getsession) — Devuelve el objeto session
- [Collection::modify](#mysql-xdevapi-collection.modify) — Modifica los documentos de la colección
- [Collection::remove](#mysql-xdevapi-collection.remove) — Elimina documentos de la colección
- [Collection::removeOne](#mysql-xdevapi-collection.removeone) — Elimina un documento de la colección
- [Collection::replaceOne](#mysql-xdevapi-collection.replaceone) — Reemplaza un documento de la colección

# Clase CollectionAdd

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\CollectionAdd**


     implements
       [mysql_xdevapi\Executable](#class.mysql-xdevapi-executable) {


    /* Métodos */

public **execute**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

}

# CollectionAdd::\_\_construct

(No version information available, might only be in Git)

CollectionAdd::\_\_construct — Constructor de CollectionAdd

### Descripción

private **mysql_xdevapi\CollectionAdd::\_\_construct**()

Se utiliza para añadir un documento a una colección; se llama desde un objeto Collection.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionAdd::\_\_construct()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");

$collection = $schema-&gt;getCollection("people");

// Añade dos documentos
$collection
-&gt;add('{"name": "Fred", "age": 21, "job": "Construction"}')
-&gt;execute();

$collection
-&gt;add('{"name": "Wilma", "age": 23, "job": "Teacher"}')
-&gt;execute();

// Añade dos documentos utilizando un solo objeto JSON
$result = $collection
-&gt;add(
'{"name": "Bernie",
"jobs": [{"title":"Cat Herder","Salary":42000}, {"title":"Father","Salary":0}],
"hobbies": ["Sports","Making cupcakes"]}',
'{"name": "Jane",
"jobs": [{"title":"Scientist","Salary":18000}, {"title":"Mother","Salary":0}],
"hobbies": ["Walking","Making pies"]}')
-&gt;execute();

// Recupera una lista de ID generados por el último add()
$ids = $result-&gt;getGeneratedIds();
print_r($ids);

?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; 00005b6b53610000000000000056
[1] =&gt; 00005b6b53610000000000000057
)

### Notas

**Nota**:

    Un identificador único _id es generado por MySQL Server 8.0 o superior, como se demuestra
    en el ejemplo. El campo _id debe ser definido manualmente si se utiliza
    MySQL Server 5.7.

# CollectionAdd::execute

(No version information available, might only be in Git)

CollectionAdd::execute — Ejecuta la declaración

### Descripción

public **mysql_xdevapi\CollectionAdd::execute**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

El método execute es requerido para enviar la solicitud de operación CRUD
al servidor MySQL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto Result que puede ser utilizado para verificar el estado de la operación,
como el número de filas afectadas.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionAdd::execute()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");

$collection = $schema-&gt;getCollection("people");

// Añade dos documentos
$collection
-&gt;add('{"name": "Fred", "age": 21, "job": "Construction"}')
-&gt;execute();

$collection
-&gt;add('{"name": "Wilma", "age": 23, "job": "Teacher"}')
-&gt;execute();

// Añade dos documentos utilizando un solo objeto JSON
$result = $collection
-&gt;add(
'{"name": "Bernie",
"jobs": [{"title":"Cat Herder","Salary":42000}, {"title":"Father","Salary":0}],
"hobbies": ["Sports","Making cupcakes"]}',
'{"name": "Jane",
"jobs": [{"title":"Scientist","Salary":18000}, {"title":"Mother","Salary":0}],
"hobbies": ["Walking","Making pies"]}')
-&gt;execute();

// Recupera una lista de ID generados por el último add()
$ids = $result-&gt;getGeneratedIds();
print_r($ids);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; 00005b6b53610000000000000056
[1] =&gt; 00005b6b53610000000000000057
)

## Tabla de contenidos

- [CollectionAdd::\_\_construct](#mysql-xdevapi-collectionadd.construct) — Constructor de CollectionAdd
- [CollectionAdd::execute](#mysql-xdevapi-collectionadd.execute) — Ejecuta la declaración

# Clase CollectionFind

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\CollectionFind**


     implements
       [mysql_xdevapi\Executable](#class.mysql-xdevapi-executable),  [mysql_xdevapi\CrudOperationBindable](#class.mysql-xdevapi-crudoperationbindable),  [mysql_xdevapi\CrudOperationLimitable](#class.mysql-xdevapi-crudoperationlimitable),  [mysql_xdevapi\CrudOperationSortable](#class.mysql-xdevapi-crudoperationsortable) {


    /* Métodos */

public **bind**([array](#language.types.array) $placeholder_values): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)
public **execute**(): [mysql_xdevapi\DocResult](#class.mysql-xdevapi-docresult)
public **fields**([string](#language.types.string) $projection): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)
public **groupBy**([string](#language.types.string) $sort_expr): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)
public **having**([string](#language.types.string) $sort_expr): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)
public **limit**([int](#language.types.integer) $rows): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)
public **lockExclusive**([int](#language.types.integer) $lock_waiting_option = ?): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)
public **lockShared**([int](#language.types.integer) $lock_waiting_option = ?): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)
public **offset**([int](#language.types.integer) $position): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)
public **sort**([string](#language.types.string) $sort_expr): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)

}

# CollectionFind::bind

(No version information available, might only be in Git)

CollectionFind::bind — Liga un valor a un argumento de consulta

### Descripción

public **mysql_xdevapi\CollectionFind::bind**([array](#language.types.array) $placeholder_values): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)

Esto permite ligar un argumento al espacio reservado en la condición de búsqueda de la operación find.
El espacio reservado tiene la forma de :NOMBRE donde ':' es un prefijo común que siempre debe existir antes de cualquier NOMBRE.
NOMBRE es el nombre real del espacio reservado. La función bind acepta una lista de espacios reservados si varias
entidades deben ser sustituidas en la condición de búsqueda.

### Parámetros

    placeholder_values


      Los valores a sustituir en la condición de búsqueda; se permiten varios valores
      y se pasan en forma de array donde "NOMBRE_ESPACIO_RESERVADO =&gt; VALOR_ESPACIO_RESERVADO".


### Valores devueltos

Un objeto CollectionFind,
o encadenado con execute() para devolver un objeto Result.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionFind::bind()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");
$result = $create
-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')
-&gt;execute();

// ...

$collection = $schema-&gt;getCollection("people");

$result = $collection
-&gt;find('job like :job and age &gt; :age')
-&gt;bind(['job' =&gt; 'Butler', 'age' =&gt; 16])
-&gt;execute();

var_dump($result-&gt;fetchAll());
?&gt;

Resultado del ejemplo anterior es similar a:

array(1) {
[0]=&gt;
array(4) {
["_id"]=&gt;
string(28) "00005b6b536100000000000000cf"
["age"]=&gt;
int(18)
["job"]=&gt;
string(6) "Butler"
["name"]=&gt;
string(6) "Alfred"
}
}

# CollectionFind::\_\_construct

(No version information available, might only be in Git)

CollectionFind::\_\_construct — Constructor de CollectionFind

### Descripción

private **mysql_xdevapi\CollectionFind::\_\_construct**()

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de CollectionFind**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");
$result = $create
-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')
-&gt;execute();

// ...

$collection = $schema-&gt;getCollection("people");

$result = $collection
-&gt;find('job like :job and age &gt; :age')
-&gt;bind(['job' =&gt; 'Butler', 'age' =&gt; 16])
-&gt;execute();

var_dump($result-&gt;fetchAll());
?&gt;

Resultado del ejemplo anterior es similar a:

array(1) {
[0]=&gt;
array(4) {
["_id"]=&gt;
string(28) "00005b6b536100000000000000cf"
["age"]=&gt;
int(18)
["job"]=&gt;
string(6) "Butler"
["name"]=&gt;
string(6) "Alfred"
}
}

# CollectionFind::execute

(No version information available, might only be in Git)

CollectionFind::execute — Ejecuta la declaración

### Descripción

public **mysql_xdevapi\CollectionFind::execute**(): [mysql_xdevapi\DocResult](#class.mysql-xdevapi-docresult)

Ejecuta la operación de búsqueda;
esta funcionalidad permite el encadenamiento de métodos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto [mysql_xdevapi\DocResult](#class.mysql-xdevapi-docresult), que puede ser utilizado
para recuperar los resultados, o para interrogar el estado de la operación.

### Ejemplos

**Ejemplo #1 Ejemplo de CollectionFind**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");

$create
-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')
-&gt;execute();

// ...

$collection = $schema-&gt;getCollection("people");

$result = $collection
-&gt;find('job like :job and age &gt; :age')
-&gt;bind(['job' =&gt; 'Butler', 'age' =&gt; 16])
-&gt;execute();

var_dump($result-&gt;fetchAll());
?&gt;

Resultado del ejemplo anterior es similar a:

array(1) {
[0]=&gt;
array(4) {
["_id"]=&gt;
string(28) "00005b6b536100000000000000cf"
["age"]=&gt;
int(18)
["job"]=&gt;
string(6) "Butler"
["name"]=&gt;
string(6) "Alfred"
}
}

# CollectionFind::fields

(No version information available, might only be in Git)

CollectionFind::fields — Define el filtro de campo de documento

### Descripción

public **mysql_xdevapi\CollectionFind::fields**([string](#language.types.string) $projection): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)

Define las columnas para la consulta a devolver. Si no se define,
se utilizan todas las columnas.

### Parámetros

    projection


      Puede ser una cadena única o un array de cadenas identificando las
      columnas a devolver para cada documento que coincida con la condición de búsqueda.


### Valores devueltos

Un objeto CollectionFind que puede ser utilizado para un procesamiento posterior.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionFind::fields()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");

$create
-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')
-&gt;execute();

// ...

$collection = $schema-&gt;getCollection("people");

$result = $collection
-&gt;find('job like :job and age &gt; :age')
-&gt;bind(['job' =&gt; 'Butler', 'age' =&gt; 16])
-&gt;fields('name')
-&gt;execute();

var_dump($result-&gt;fetchAll());
?&gt;

Resultado del ejemplo anterior es similar a:

array(1) {
[0]=&gt;
array(1) {
["name"]=&gt;
string(6) "Alfred"
}
}

# CollectionFind::groupBy

(No version information available, might only be in Git)

CollectionFind::groupBy — Define los criterios de agrupación

### Descripción

public **mysql_xdevapi\CollectionFind::groupBy**([string](#language.types.string) $sort_expr): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)

Esta función puede ser utilizada para agrupar el conjunto de resultados por una o más columnas.
Es a menudo utilizada con funciones de agregación tales como COUNT,
MAX, MIN, SUM etc.

### Parámetros

    sort_expr


      La o las columnas que deben ser utilizadas para la operación de agrupación, esto puede ser una cadena única
      o un array de argumentos de string, uno para cada columna.


### Valores devueltos

Un objeto CollectionFind que puede ser utilizado para un procesamiento posterior.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionFind::groupBy()**

&lt;?php

// Asumiendo que $coll es un objeto Collection válido

// Extrae todos los documentos de la Collection y agrupa los resultados por el campo 'name'
$res = $coll-&gt;find()-&gt;groupBy('name')-&gt;execute();

?&gt;

# CollectionFind::having

(No version information available, might only be in Git)

CollectionFind::having — Define la condición para las funciones de agregación

### Descripción

public **mysql_xdevapi\CollectionFind::having**([string](#language.types.string) $sort_expr): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)

Esta función puede ser utilizada después de la operación 'field' para hacer una selección sobre los documentos a extraer.

### Parámetros

    sort_expr


      Debe ser una expresión SQL válida, el uso de funciones de agregación está permitido.


### Valores devueltos

Un objeto CollectionFind que puede ser utilizado para un procesamiento posterior.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionFind::having()**

&lt;?php

//Asumiendo que $coll es un objeto Collection válido

//Encuentra todos los documentos para los cuales la edad es mayor que 40,
//Solo las columnas 'name' y 'age' son devueltas en el objeto Result
$res = $coll-&gt;find()-&gt;fields(['name','age'])-&gt;having('age &gt; 40')-&gt;execute();

?&gt;

# CollectionFind::limit

(No version information available, might only be in Git)

CollectionFind::limit — Limita el número de documentos devueltos

### Descripción

public **mysql_xdevapi\CollectionFind::limit**([int](#language.types.integer) $rows): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)

Define el número máximo de documentos a devolver.

### Parámetros

    rows


      El número máximo de documentos.


### Valores devueltos

Un objeto mysql_xdevapi\CollectionFind que puede ser utilizado para un procesamiento posterior;
encadene con el método execute() para devolver un objeto DocResult.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionFind::limit()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");
$create
-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')
-&gt;execute();
$create
-&gt;add('{"name": "Reginald", "age": 42, "job": "Butler"}')
-&gt;execute();

// ...

$collection = $schema-&gt;getCollection("people");

$result = $collection
-&gt;find('job like :job and age &gt; :age')
-&gt;bind(['job' =&gt; 'Butler', 'age' =&gt; 16])
-&gt;sort('age desc')
-&gt;limit(1)
-&gt;execute();

var_dump($result-&gt;fetchAll());
?&gt;

Resultado del ejemplo anterior es similar a:

array(1) {
[0]=&gt;
array(4) {
["_id"]=&gt;
string(28) "00005b6b536100000000000000f3"
["age"]=&gt;
int(42)
["job"]=&gt;
string(6) "Butler"
["name"]=&gt;
string(8) "Reginald"
}
}

# CollectionFind::lockExclusive

(No version information available, might only be in Git)

CollectionFind::lockExclusive — Ejecuta la operación con un BLOQUEO EXCLUSIVO

### Descripción

public **mysql_xdevapi\CollectionFind::lockExclusive**([int](#language.types.integer) $lock_waiting_option = ?): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)

Bloquea el documento de manera exclusiva.
Mientras el documento está bloqueado,
otras transacciones no pueden actualizar el documento,
utilizar SELECT ... LOCK IN SHARE MODE,
o leer los datos en ciertos niveles de aislamiento de transacción.
Las lecturas coherentes ignoran los bloqueos establecidos en los registros que existen en la vista de lectura.

Para evitar problemas de concurrencia, es lógico utilizar esta función con el método
**mysql_xdevapi\Collection::modify()**. Esencialmente, esta función utiliza bloqueos de línea para serializar
el acceso a las líneas.

### Parámetros

    lock_waiting_option


      Una opción de espera opcional. Por omisión, es **[MYSQLX_LOCK_DEFAULT](#constant.mysqlx-lock-default)**. Los valores válidos son estas constantes:




      - **[MYSQLX_LOCK_DEFAULT](#constant.mysqlx-lock-default)**



      - **[MYSQLX_LOCK_NOWAIT](#constant.mysqlx-lock-nowait)**



      - **[MYSQLX_LOCK_SKIP_LOCKED](#constant.mysqlx-lock-skip-locked)**





### Valores devueltos

Devuelve un objeto CollectionFind que puede ser utilizado para un procesamiento posterior.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionFind::lockExclusive()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$session-&gt;startTransaction();

$result = $collection
-&gt;find("age &gt; 50")
-&gt;lockExclusive()
-&gt;execute();

// ... realizar una operación sobre el objeto

// Validar la transacción y desbloquear el documento
$session-&gt;commit();
?&gt;

# CollectionFind::lockShared

(No version information available, might only be in Git)

CollectionFind::lockShared — Ejecuta la operación con un BLOQUEO COMPARTIDO

### Descripción

public **mysql_xdevapi\CollectionFind::lockShared**([int](#language.types.integer) $lock_waiting_option = ?): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)

Permite el compartimiento de documentos entre múltiples transacciones que están bloqueadas en modo compartido.

Otras sesiones pueden leer las filas, pero no pueden modificarlas hasta que su transacción no haya sido validada.

Si una de estas filas ha sido modificada por otra transacción que no ha sido validada,
la consulta esperará a que esta transacción termine para poder utilizar los últimos valores.

### Parámetros

    lock_waiting_option


      Una opción de espera opcional. Por omisión, es **[MYSQLX_LOCK_DEFAULT](#constant.mysqlx-lock-default)**. Los valores válidos son estas constantes:




      - **[MYSQLX_LOCK_DEFAULT](#constant.mysqlx-lock-default)**



      - **[MYSQLX_LOCK_NOWAIT](#constant.mysqlx-lock-nowait)**



      - **[MYSQLX_LOCK_SKIP_LOCKED](#constant.mysqlx-lock-skip-locked)**





### Valores devueltos

Un objeto CollectionFind que puede ser utilizado para un tratamiento ulterior.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionFind::lockShared()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$session-&gt;startTransaction();

$result = $collection
-&gt;find("age &gt; 50")
-&gt;lockShared()
-&gt;execute();

// ... leer el objeto en modo compartido

// Validar la transacción y desbloquear el documento
$session-&gt;commit();
?&gt;

# CollectionFind::offset

(No version information available, might only be in Git)

CollectionFind::offset — Ignorar un número dado de elementos a devolver

### Descripción

public **mysql_xdevapi\CollectionFind::offset**([int](#language.types.integer) $position): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)

Ignora (desplaza) un número dado de elementos que de otro modo serían devueltos
por la operación find. Utilícese con el método limit().

Definir un desplazamiento mayor que el tamaño del conjunto de resultados da un conjunto vacío.

### Parámetros

    position


      El número de elementos a ignorar para la operación limit().


### Valores devueltos

Un objeto CollectionFind que puede ser utilizado para un tratamiento ulterior.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionFind::offset()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");
$create
-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')
-&gt;execute();
$create
-&gt;add('{"name": "Reginald", "age": 42, "job": "Butler"}')
-&gt;execute();

// ...

$collection = $schema-&gt;getCollection("people");

$result = $collection
-&gt;find()
-&gt;sort('age asc')
-&gt;offset(1)
-&gt;limit(1)
-&gt;execute();

var_dump($result-&gt;fetchAll());
?&gt;

Resultado del ejemplo anterior es similar a:

array(1) {
[0]=&gt;
array(4) {
["_id"]=&gt;
string(28) "00005b6b536100000000000000f3"
["age"]=&gt;
int(42)
["job"]=&gt;
string(6) "Butler"
["name"]=&gt;
string(8) "Reginald"
}
}

# CollectionFind::sort

(No version information available, might only be in Git)

CollectionFind::sort — Define los criterios de ordenación

### Descripción

public **mysql_xdevapi\CollectionFind::sort**([string](#language.types.string) $sort_expr): [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind)

Ordena el conjunto de resultados por el campo seleccionado en el argumento sort_expr. Los órdenes
permitidos son ASC (Ascendente) o DESC (Descendente). Esta operación es equivalente a la operación 'ORDER BY' SQL
y sigue el mismo conjunto de reglas.

### Parámetros

    sort_expr


      Una o más expresiones de ordenación pueden ser proporcionadas. La evaluación se realiza de izquierda a derecha,
      y cada expresión está separada por una coma.


### Valores devueltos

Un objeto CollectionFind que puede ser utilizado para ejecutar el comando, o para añadir operaciones adicionales.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionFind::sort()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");
$create
-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')
-&gt;execute();
$create
-&gt;add('{"name": "Reginald", "age": 42, "job": "Butler"}')
-&gt;execute();

// ...

$collection = $schema-&gt;getCollection("people");

$result = $collection
-&gt;find()
-&gt;sort('job desc', 'age asc')
-&gt;execute();

var_dump($result-&gt;fetchAll());
?&gt;

Resultado del ejemplo anterior es similar a:

array(2) {
[0]=&gt;
array(4) {
["_id"]=&gt;
string(28) "00005b6b53610000000000000106"
["age"]=&gt;
int(18)
["job"]=&gt;
string(6) "Butler"
["name"]=&gt;
string(6) "Alfred"
}
[1]=&gt;
array(4) {
["_id"]=&gt;
string(28) "00005b6b53610000000000000107"
["age"]=&gt;
int(42)
["job"]=&gt;
string(6) "Butler"
["name"]=&gt;
string(8) "Reginald"
}
}

## Tabla de contenidos

- [CollectionFind::bind](#mysql-xdevapi-collectionfind.bind) — Liga un valor a un argumento de consulta
- [CollectionFind::\_\_construct](#mysql-xdevapi-collectionfind.construct) — Constructor de CollectionFind
- [CollectionFind::execute](#mysql-xdevapi-collectionfind.execute) — Ejecuta la declaración
- [CollectionFind::fields](#mysql-xdevapi-collectionfind.fields) — Define el filtro de campo de documento
- [CollectionFind::groupBy](#mysql-xdevapi-collectionfind.groupby) — Define los criterios de agrupación
- [CollectionFind::having](#mysql-xdevapi-collectionfind.having) — Define la condición para las funciones de agregación
- [CollectionFind::limit](#mysql-xdevapi-collectionfind.limit) — Limita el número de documentos devueltos
- [CollectionFind::lockExclusive](#mysql-xdevapi-collectionfind.lockexclusive) — Ejecuta la operación con un BLOQUEO EXCLUSIVO
- [CollectionFind::lockShared](#mysql-xdevapi-collectionfind.lockshared) — Ejecuta la operación con un BLOQUEO COMPARTIDO
- [CollectionFind::offset](#mysql-xdevapi-collectionfind.offset) — Ignorar un número dado de elementos a devolver
- [CollectionFind::sort](#mysql-xdevapi-collectionfind.sort) — Define los criterios de ordenación

# Clase CollectionModify

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\CollectionModify**


     implements
       [mysql_xdevapi\Executable](#class.mysql-xdevapi-executable),  [mysql_xdevapi\CrudOperationBindable](#class.mysql-xdevapi-crudoperationbindable),  [mysql_xdevapi\CrudOperationLimitable](#class.mysql-xdevapi-crudoperationlimitable),  [mysql_xdevapi\CrudOperationSkippable](#class.mysql-xdevapi-crudoperationskippable),  [mysql_xdevapi\CrudOperationSortable](#class.mysql-xdevapi-crudoperationsortable) {


    /* Métodos */

public **arrayAppend**([string](#language.types.string) $collection_field, [string](#language.types.string) $expression_or_literal): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)
public **arrayInsert**([string](#language.types.string) $collection_field, [string](#language.types.string) $expression_or_literal): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)
public **bind**([array](#language.types.array) $placeholder_values): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)
public **execute**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)
public **limit**([int](#language.types.integer) $rows): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)
public **patch**([string](#language.types.string) $document): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)
public **replace**([string](#language.types.string) $collection_field, [string](#language.types.string) $expression_or_literal): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)
public **set**([string](#language.types.string) $collection_field, [string](#language.types.string) $expression_or_literal): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)
public **skip**([int](#language.types.integer) $position): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)
public **sort**([string](#language.types.string) $sort_expr): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)
public **unset**([array](#language.types.array) $fields): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)

}

# CollectionModify::arrayAppend

(No version information available, might only be in Git)

CollectionModify::arrayAppend — Añade un elemento a un campo de array

### Descripción

public **mysql_xdevapi\CollectionModify::arrayAppend**([string](#language.types.string) $collection_field, [string](#language.types.string) $expression_or_literal): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)

Añade un elemento a un campo de un documento, ya que varios elementos de un campo se representan como un array.
A diferencia de arrayInsert(), arrayAppend() siempre añade el nuevo elemento
al final del array, mientras que arrayInsert() puede definir la ubicación.

### Parámetros

    collection_field


      El identificador del campo donde se inserta el nuevo elemento.






    expression_or_literal


      El nuevo elemento a insertar al final del array del campo del documento.


### Valores devueltos

Un objeto CollectionModify que puede ser utilizado para ejecutar el comando, o para añadir operaciones adicionales.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionModify::arrayAppend()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$result = $collection
-&gt;add(
'{"name": "Bernie",
"traits": ["Friend", "Brother", "Human"]}')
-&gt;execute();

$collection
-&gt;modify("name in ('Bernie', 'Jane')")
-&gt;arrayAppend('traits', 'Happy')
-&gt;execute();

$result = $collection
-&gt;find()
-&gt;execute();

print_r($result-&gt;fetchAll());
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[_id] =&gt; 00005b6b5361000000000000010c
[name] =&gt; Bernie
[traits] =&gt; Array
(
[0] =&gt; Friend
[1] =&gt; Brother
[2] =&gt; Human
[3] =&gt; Happy
)
)
)

# CollectionModify::arrayInsert

(No version information available, might only be in Git)

CollectionModify::arrayInsert — Inserta un elemento en un campo de array

### Descripción

public **mysql_xdevapi\CollectionModify::arrayInsert**([string](#language.types.string) $collection_field, [string](#language.types.string) $expression_or_literal): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)

Añade un elemento a un campo de un documento, ya que varios elementos de un campo están
representados en forma de array. A diferencia de
**mysql_xdevapi\CollectionModify::arrayAppend()** este método
permite especificar dónde se inserta el nuevo elemento definiendo después de qué elemento,
mientras que
**mysql_xdevapi\CollectionModify::arrayAppend()** siempre
añade el nuevo elemento al final del array.

### Parámetros

    collection_field


      Identifica el elemento del array después del cual se insertará el nuevo elemento.
      El formato de este parámetro es
      FIELD_NAME[ INDEX ] donde
      FIELD_NAME es el nombre del campo del documento
      donde se añadirá el elemento, y INDEX
      es el INDEX del elemento en el campo.




      El INDEX está basado en cero, por lo que el primer elemento del array tiene un índice de 0.






    expression_or_literal


      El nuevo elemento a insertar después de FIELD_NAME[ INDEX ]


### Valores devueltos

Un objeto CollectionModify que puede ser utilizado para ejecutar el comando, o para añadir operaciones adicionales.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionModify::arrayInsert()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$result = $collection
-&gt;add(
'{"name": "Bernie",
"traits": ["Friend", "Brother", "Human"]}')
-&gt;execute();

$collection
-&gt;modify("name in ('Bernie', 'Jane')")
-&gt;arrayInsert('traits[1]', 'Happy')
-&gt;execute();

$result = $collection
-&gt;find()
-&gt;execute();

print_r($result-&gt;fetchAll());
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[_id] =&gt; 00005b6b5361000000000000010d
[name] =&gt; Bernie
[traits] =&gt; Array
(
[0] =&gt; Friend
[1] =&gt; Happy
[2] =&gt; Brother
[3] =&gt; Human
)
)
)

# CollectionModify::bind

(No version information available, might only be in Git)

CollectionModify::bind — Liga un valor a un parámetro de consulta

### Descripción

public **mysql_xdevapi\CollectionModify::bind**([array](#language.types.array) $placeholder_values): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)

Liga un parámetro a un espacio reservado en la condición de búsqueda de la operación de modificación.

El espacio reservado tiene la forma de :NOMBRE donde ':' es un prefijo común que siempre debe existir antes de cualquier NOMBRE
donde NOMBRE es el nombre del espacio reservado. El método bind acepta una lista de espacios reservados si varias
entidades deben ser sustituidas en la condición de búsqueda de la operación de modificación.

### Parámetros

    placeholder_values


      Los valores de espacio reservado a sustituir en la condición de búsqueda. Se permiten varios valores
      y deben ser pasados en forma de array de mapeos NOMBRE_ESPACIO_RESERVADO-&gt;VALOR_ESPACIO_RESERVADO.


### Valores devueltos

Un objeto CollectionModify que puede ser utilizado para ejecutar el comando, o para añadir operaciones adicionales.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionModify::bind()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$result = $collection
-&gt;add(
'{"name": "Bernie",
"traits": ["Friend", "Brother", "Human"]}')
-&gt;execute();

$collection
-&gt;modify("name = :name")
-&gt;bind(['name' =&gt; 'Bernie'])
-&gt;arrayAppend('traits', 'Happy')
-&gt;execute();

$result = $collection
-&gt;find()
-&gt;execute();

print_r($result-&gt;fetchAll());
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[_id] =&gt; 00005b6b53610000000000000110
[name] =&gt; Bernie
[traits] =&gt; Array
(
[0] =&gt; Friend
[1] =&gt; Brother
[2] =&gt; Human
[3] =&gt; Happy
)
)
)

# CollectionModify::\_\_construct

(No version information available, might only be in Git)

CollectionModify::\_\_construct — Constructor de CollectionModify

### Descripción

private **mysql_xdevapi\CollectionModify::\_\_construct**()

Modifica (actualiza) una colección y es instanciado por el método
**mysql_xdevapi\Collection::modify()**.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionModify::\_\_construct()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$result = $collection
-&gt;add(
'{"name": "Bernie",
"traits": ["Friend", "Brother", "Human"]}')
-&gt;execute();

$collection
-&gt;modify("name in ('Bernie', 'Jane')")
-&gt;arrayAppend('traits', 'Happy')
-&gt;execute();

$result = $collection
-&gt;find()
-&gt;execute();

print_r($result-&gt;fetchAll());
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[_id] =&gt; 00005b6b5361000000000000010c
[name] =&gt; Bernie
[traits] =&gt; Array
(
[0] =&gt; Friend
[1] =&gt; Brother
[2] =&gt; Human
[3] =&gt; Happy
)
)
)

# CollectionModify::execute

(No version information available, might only be in Git)

CollectionModify::execute — Ejecuta la operación de modificación

### Descripción

public **mysql_xdevapi\CollectionModify::execute**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

El método execute es requerido para enviar la solicitud de operación CRUD
al servidor MySQL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto Result que puede ser utilizado para verificar el estado de la operación,
como el número de filas afectadas.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionModify::execute()**

&lt;?php

/_ ... _/

?&gt;

# CollectionModify::limit

(No version information available, might only be in Git)

CollectionModify::limit — Limita el número de documentos modificados

### Descripción

public **mysql_xdevapi\CollectionModify::limit**([int](#language.types.integer) $rows): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)

Limita el número de documentos modificados por esta operación.
Combina eventualmente con skip() para definir un valor de desplazamiento.

### Parámetros

    rows


      El número máximo de documentos a modificar.


### Valores devueltos

Un objeto CollectionModify.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionModify::limit()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$collection-&gt;add('{"name": "Fred",  "age": 21, "job": "Construction"}')-&gt;execute();
$collection-&gt;add('{"name": "Wilma", "age": 23, "job": "Teacher"}')-&gt;execute();
$collection-&gt;add('{"name": "Betty", "age": 24, "job": "Teacher"}')-&gt;execute();

$collection
-&gt;modify("job = :job")
-&gt;bind(['job' =&gt; 'Teacher'])
-&gt;set('job', 'Principal')
-&gt;limit(1)
-&gt;execute();

$result = $collection
-&gt;find()
-&gt;execute();

print_r($result-&gt;fetchAll());
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[_id] =&gt; 00005b6b53610000000000000118
[age] =&gt; 21
[job] =&gt; Construction
[name] =&gt; Fred
)
[1] =&gt; Array
(
[_id] =&gt; 00005b6b53610000000000000119
[age] =&gt; 23
[job] =&gt; Principal
[name] =&gt; Wilma
)
[2] =&gt; Array
(
[_id] =&gt; 00005b6b5361000000000000011a
[age] =&gt; 24
[job] =&gt; Teacher
[name] =&gt; Betty
)
)

# CollectionModify::patch

(No version information available, might only be in Git)

CollectionModify::patch — Corrige un documento

### Descripción

public **mysql_xdevapi\CollectionModify::patch**([string](#language.types.string) $document): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)

Toma un objeto patch y lo aplica sobre uno o varios documentos, y
puede actualizar varias propiedades del documento.

### Parámetros

    document


      Un documento con las propiedades a aplicar a los documentos correspondientes.


### Valores devueltos

Un objeto CollectionModify.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionModify::patch()**

&lt;?php

$res = $coll-&gt;modify('"Programmatore" IN job')-&gt;patch('{"Hobby" : "Programmare"}')-&gt;execute();

?&gt;

# CollectionModify::replace

(No version information available, might only be in Git)

CollectionModify::replace — Reemplaza un campo de documento

### Descripción

public **mysql_xdevapi\CollectionModify::replace**([string](#language.types.string) $collection_field, [string](#language.types.string) $expression_or_literal): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)

    Reemplaza (actualiza) un valor de campo dado por uno nuevo.

### Parámetros

    collection_field


      La ruta de acceso del documento del elemento a definir.






    expression_or_literal


      El valor a definir en el atributo especificado.


### Valores devueltos

Un objeto CollectionModify.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionModify::replace()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$result = $collection
-&gt;add(
'{"name": "Bernie",
"traits": ["Friend", "Brother", "Human"]}')
-&gt;execute();

$collection
-&gt;modify("name = :name")
-&gt;bind(['name' =&gt; 'Bernie'])
-&gt;replace("name", "Bern")
-&gt;execute();

$result = $collection
-&gt;find()
-&gt;execute();

print_r($result-&gt;fetchAll());
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[_id] =&gt; 00005b6b5361000000000000011b
[name] =&gt; Bern
[traits] =&gt; Array
(
[0] =&gt; Friend
[1] =&gt; Brother
[2] =&gt; Human
)
)
)

# CollectionModify::set

(No version information available, might only be in Git)

CollectionModify::set — Define un atributo de documento

### Descripción

public **mysql_xdevapi\CollectionModify::set**([string](#language.types.string) $collection_field, [string](#language.types.string) $expression_or_literal): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)

Define o actualiza atributos en documentos de una colección.

### Parámetros

    collection_field


      La ruta (nombre) del documento del elemento a definir.






    expression_or_literal


      El valor a definir en el atributo especificado.


### Valores devueltos

Un objeto CollectionModify.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionModify::set()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$result = $collection
-&gt;add(
'{"name": "Bernie",
"traits": ["Friend", "Brother", "Human"]}')
-&gt;execute();

$collection
-&gt;modify("name = :name")
-&gt;bind(['name' =&gt; 'Bernie'])
-&gt;set("name", "Bern")
-&gt;execute();

$result = $collection
-&gt;find()
-&gt;execute();

print_r($result-&gt;fetchAll());
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[_id] =&gt; 00005b6b53610000000000000111
[name] =&gt; Bern
[traits] =&gt; Array
(
[0] =&gt; Friend
[1] =&gt; Brother
[2] =&gt; Human
)
)
)

# CollectionModify::skip

(No version information available, might only be in Git)

CollectionModify::skip — Ignorar los elementos

### Descripción

public **mysql_xdevapi\CollectionModify::skip**([int](#language.types.integer) $position): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)

Ignora los N primeros elementos que de otro modo serían devueltos por una operación de búsqueda.
Si el número de elementos ignorados es superior al tamaño del conjunto de resultados,
entonces la operación de búsqueda devuelve un conjunto vacío.

### Parámetros

    position


      El número de elementos a ignorar.


### Valores devueltos

Un objeto CollectionModify para ser utilizado en un procesamiento posterior.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionModify::skip()**

&lt;?php

$coll-&gt;modify('age &gt; :age')-&gt;sort('age desc')-&gt;unset(['age'])-&gt;bind(['age' =&gt; 20])-&gt;limit(4)-&gt;skip(1)-&gt;execute();

?&gt;

# CollectionModify::sort

(No version information available, might only be in Git)

CollectionModify::sort — Define los criterios de ordenación

### Descripción

public **mysql_xdevapi\CollectionModify::sort**([string](#language.types.string) $sort_expr): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)

Ordena el conjunto de resultados por el campo seleccionado en el argumento sort_expr. Los órdenes permitidos
son ASC (Ascendente) o DESC (Descendente). Esta operación es equivalente a la operación SQL 'ORDER BY'
y sigue el mismo conjunto de reglas.

### Parámetros

    sort_expr


      Una o más expresiones de ordenación pueden ser proporcionadas. La evaluación se realiza de
      izquierda a derecha y cada expresión debe estar separada por una coma.


### Valores devueltos

Un objeto CollectionModify que puede ser utilizado para un procesamiento posterior.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionModify::sort()**

&lt;?php

$res = $coll-&gt;modify('true')-&gt;sort('name desc', 'age asc')-&gt;limit(4)-&gt;set('Married', 'NO')-&gt;execute();

?&gt;

# CollectionModify::unset

(No version information available, might only be in Git)

CollectionModify::unset — Elimina el valor de los campos del documento

### Descripción

public **mysql_xdevapi\CollectionModify::unset**([array](#language.types.array) $fields): [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify)

Elimina los atributos de los documentos en una colección.

### Parámetros

    fields


      Los atributos a eliminar de los documentos en una colección.


### Valores devueltos

Un objeto CollectionModify que puede ser utilizado para un procesamiento posterior.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionModify::unset()**

&lt;?php

$res = $coll-&gt;modify('job like :job_name')-&gt;unset(["age", "name"])-&gt;bind(['job_name' =&gt; 'Plumber'])-&gt;execute();

?&gt;

## Tabla de contenidos

- [CollectionModify::arrayAppend](#mysql-xdevapi-collectionmodify.arrayappend) — Añade un elemento a un campo de array
- [CollectionModify::arrayInsert](#mysql-xdevapi-collectionmodify.arrayinsert) — Inserta un elemento en un campo de array
- [CollectionModify::bind](#mysql-xdevapi-collectionmodify.bind) — Liga un valor a un parámetro de consulta
- [CollectionModify::\_\_construct](#mysql-xdevapi-collectionmodify.construct) — Constructor de CollectionModify
- [CollectionModify::execute](#mysql-xdevapi-collectionmodify.execute) — Ejecuta la operación de modificación
- [CollectionModify::limit](#mysql-xdevapi-collectionmodify.limit) — Limita el número de documentos modificados
- [CollectionModify::patch](#mysql-xdevapi-collectionmodify.patch) — Corrige un documento
- [CollectionModify::replace](#mysql-xdevapi-collectionmodify.replace) — Reemplaza un campo de documento
- [CollectionModify::set](#mysql-xdevapi-collectionmodify.set) — Define un atributo de documento
- [CollectionModify::skip](#mysql-xdevapi-collectionmodify.skip) — Ignorar los elementos
- [CollectionModify::sort](#mysql-xdevapi-collectionmodify.sort) — Define los criterios de ordenación
- [CollectionModify::unset](#mysql-xdevapi-collectionmodify.unset) — Elimina el valor de los campos del documento

# Clase CollectionRemove

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\CollectionRemove**


     implements
       [mysql_xdevapi\Executable](#class.mysql-xdevapi-executable),  [mysql_xdevapi\CrudOperationBindable](#class.mysql-xdevapi-crudoperationbindable),  [mysql_xdevapi\CrudOperationLimitable](#class.mysql-xdevapi-crudoperationlimitable),  [mysql_xdevapi\CrudOperationSortable](#class.mysql-xdevapi-crudoperationsortable) {


    /* Métodos */

public **bind**([array](#language.types.array) $placeholder_values): [mysql_xdevapi\CollectionRemove](#class.mysql-xdevapi-collectionremove)
public **execute**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)
public **limit**([int](#language.types.integer) $rows): [mysql_xdevapi\CollectionRemove](#class.mysql-xdevapi-collectionremove)
public **sort**([string](#language.types.string) $sort_expr): [mysql_xdevapi\CollectionRemove](#class.mysql-xdevapi-collectionremove)

}

# CollectionRemove::bind

(No version information available, might only be in Git)

CollectionRemove::bind — Liga un valor a un argumento

### Descripción

public **mysql_xdevapi\CollectionRemove::bind**([array](#language.types.array) $placeholder_values): [mysql_xdevapi\CollectionRemove](#class.mysql-xdevapi-collectionremove)

Liga un argumento al espacio reservado en la condición de búsqueda de la operación de eliminación.

El espacio reservado tiene la forma :NAME donde ':' es un prefijo común que siempre debe existir antes de cualquier NAME
donde NAME es el nombre del espacio reservado. El método bind acepta una lista de espacios reservados si varias
entidades deben ser sustituidas en la condición de búsqueda de la operación de eliminación.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    placeholder_values


      El valor del espacio reservado a sustituir en la condición de búsqueda. Se permiten varios valores
      y deben ser pasados en forma de un array de mapeos NOMBRE_ESPACIO_RESERVADO-&gt;VALOR_ESPACIO_RESERVADO.


### Valores devueltos

Un objeto CollectionRemove que puede ser utilizado para ejecutar el comando, o para añadir operaciones adicionales.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionRemove::bind()**

&lt;?php

$res = $coll-&gt;remove('age &gt; :age_from and age &lt; :age_to')-&gt;bind(['age_from' =&gt; 20, 'age_to' =&gt; 50])-&gt;limit(7)-&gt;execute();

?&gt;

# CollectionRemove::\_\_construct

(No version information available, might only be in Git)

CollectionRemove::\_\_construct — Constructor de CollectionRemove

### Descripción

private **mysql_xdevapi\CollectionRemove::\_\_construct**()

Elimina los documentos de la colección y es instanciado por el método
**mysql_xdevapi\Collection::remove()**.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Collection::remove()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("people");

$collection-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')-&gt;execute();
$collection-&gt;add('{"name": "Bob", "age": 19, "job": "Painter"}')-&gt;execute();

// Elimina todos los pintores
$collection
-&gt;remove("job in ('Painter')")
-&gt;execute();

// Elimina el mayordomo más viejo
$collection
-&gt;remove("job in ('Butler')")
-&gt;sort('age desc')
-&gt;limit(1)
-&gt;execute();

// Elimina el registro con la edad más baja
$collection
-&gt;remove('true')
-&gt;sort('age desc')
-&gt;limit(1)
-&gt;execute();
?&gt;

# CollectionRemove::execute

(No version information available, might only be in Git)

CollectionRemove::execute — Ejecuta la operación de eliminación

### Descripción

public **mysql_xdevapi\CollectionRemove::execute**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

La función execute debe ser invocada para desencadenar el envío de la solicitud de operación CRUD al servidor por parte del cliente.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Objeto Result.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionRemove::execute()**

&lt;?php

$res = $coll-&gt;remove('true')-&gt;sort('age desc')-&gt;limit(2)-&gt;execute();

?&gt;

# CollectionRemove::limit

(No version information available, might only be in Git)

CollectionRemove::limit — Limita el número de documentos a eliminar

### Descripción

public **mysql_xdevapi\CollectionRemove::limit**([int](#language.types.integer) $rows): [mysql_xdevapi\CollectionRemove](#class.mysql-xdevapi-collectionremove)

Define el número máximo de documentos a eliminar.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    rows


      El número máximo de documentos a eliminar.


### Valores devueltos

Devuelve un objeto CollectionRemove que puede ser utilizado para ejecutar el comando,
o para añadir operaciones adicionales.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionRemove::limit()**

&lt;?php

$res = $coll-&gt;remove('job in (\'Barista\', \'Programmatore\', \'Ballerino\', \'Programmatrice\')')-&gt;limit(5)-&gt;sort(['age desc', 'name asc'])-&gt;execute();

?&gt;

# CollectionRemove::sort

(No version information available, might only be in Git)

CollectionRemove::sort — Define el criterio de ordenación

### Descripción

public **mysql_xdevapi\CollectionRemove::sort**([string](#language.types.string) $sort_expr): [mysql_xdevapi\CollectionRemove](#class.mysql-xdevapi-collectionremove)

Ordena el conjunto de resultados por el campo seleccionado en el argumento sort_expr. Los órdenes permitidos
son ASC (Ascending) o DESC (Descending). Esta operación es equivalente a la operación SQL 'ORDER BY'
y sigue el mismo conjunto de reglas.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    sort_expr


      Una o más expresiones de ordenación pueden ser proporcionadas. La evaluación se realiza de izquierda a derecha,
      y cada expresión está separada por una coma.


### Valores devueltos

Un objeto CollectionRemove que puede ser utilizado para ejecutar el comando, o para añadir operaciones adicionales.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CollectionRemove::sort()**

&lt;?php

$res = $coll-&gt;remove('true')-&gt;sort('age desc')-&gt;limit(2)-&gt;execute();

?&gt;

## Tabla de contenidos

- [CollectionRemove::bind](#mysql-xdevapi-collectionremove.bind) — Liga un valor a un argumento
- [CollectionRemove::\_\_construct](#mysql-xdevapi-collectionremove.construct) — Constructor de CollectionRemove
- [CollectionRemove::execute](#mysql-xdevapi-collectionremove.execute) — Ejecuta la operación de eliminación
- [CollectionRemove::limit](#mysql-xdevapi-collectionremove.limit) — Limita el número de documentos a eliminar
- [CollectionRemove::sort](#mysql-xdevapi-collectionremove.sort) — Define el criterio de ordenación

# Clase ColumnResult

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\ColumnResult**

     {


    /* Métodos */

public **getCharacterSetName**(): [string](#language.types.string)
public **getCollationName**(): [string](#language.types.string)
public **getColumnLabel**(): [string](#language.types.string)
public **getColumnName**(): [string](#language.types.string)
public **getFractionalDigits**(): [int](#language.types.integer)
public **getLength**(): [int](#language.types.integer)
public **getSchemaName**(): [string](#language.types.string)
public **getTableLabel**(): [string](#language.types.string)
public **getTableName**(): [string](#language.types.string)
public **getType**(): [int](#language.types.integer)
public **isNumberSigned**(): [int](#language.types.integer)
public **isPadded**(): [int](#language.types.integer)

}

# ColumnResult::\_\_construct

(No version information available, might only be in Git)

ColumnResult::\_\_construct — Constructor de ColumnResult

### Descripción

private **mysql_xdevapi\ColumnResult::\_\_construct**()

Devuelve los metadatos de columna, tales como su conjunto de caracteres; esto es instanciado
por el método **mysql_xdevapi\RowResult::getColumns()**.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\ColumnResult::\_\_construct()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS nonsense")-&gt;execute();
$session-&gt;sql("CREATE DATABASE nonsense")-&gt;execute();
$session-&gt;sql("CREATE TABLE nonsense.numbers (hello int, world float unsigned)")-&gt;execute();
$session-&gt;sql("INSERT INTO nonsense.numbers values (42, 42)")-&gt;execute();

$schema = $session-&gt;getSchema("nonsense");
$table = $schema-&gt;getTable("numbers");

$result1 = $table-&gt;select('hello','world')-&gt;execute();

// Devuelve un array de objetos ColumnResult
$columns = $result1-&gt;getColumns();

foreach ($columns as $column) {
    echo "\nColumn label " , $column-&gt;getColumnLabel();
    echo " is type "       , $column-&gt;getType();
    echo " and is ", ($column-&gt;isNumberSigned() === 0) ? "unsigned." : "signed.";
}

// O bien
$result2 = $session-&gt;sql("SELECT \* FROM nonsense.numbers")-&gt;execute();

// Devuelve un array de objetos FieldMetadata
print_r($result2-&gt;getColumns());

Resultado del ejemplo anterior es similar a:

Column label hello is type 19 and is signed.
Column label world is type 4 and is unsigned.

Array
(
[0] =&gt; mysql_xdevapi\FieldMetadata Object
(
[type] =&gt; 1
[type_name] =&gt; SINT
[name] =&gt; hello
[original_name] =&gt; hello
[table] =&gt; numbers
[original_table] =&gt; numbers
[schema] =&gt; nonsense
[catalog] =&gt; def
[collation] =&gt; 0
[fractional_digits] =&gt; 0
[length] =&gt; 11
[flags] =&gt; 0
[content_type] =&gt; 0
)
[1] =&gt; mysql_xdevapi\FieldMetadata Object
(
[type] =&gt; 6
[type_name] =&gt; FLOAT
[name] =&gt; world
[original_name] =&gt; world
[table] =&gt; numbers
[original_table] =&gt; numbers
[schema] =&gt; nonsense
[catalog] =&gt; def
[collation] =&gt; 0
[fractional_digits] =&gt; 31
[length] =&gt; 12
[flags] =&gt; 1
[content_type] =&gt; 0
)
)

# ColumnResult::getCharacterSetName

(No version information available, might only be in Git)

ColumnResult::getCharacterSetName — Devuelve el conjunto de caracteres

### Descripción

public **mysql_xdevapi\ColumnResult::getCharacterSetName**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\ColumnResult::getCharacterSetName()**

&lt;?php

/_ ... _/

?&gt;

# ColumnResult::getCollationName

(No version information available, might only be in Git)

ColumnResult::getCollationName — Devuelve el nombre de la intercalación

### Descripción

public **mysql_xdevapi\ColumnResult::getCollationName**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\ColumnResult::getCollationName()**

&lt;?php

/_ ... _/

?&gt;

# ColumnResult::getColumnLabel

(No version information available, might only be in Git)

ColumnResult::getColumnLabel — Devuelve la etiqueta de columna

### Descripción

public **mysql_xdevapi\ColumnResult::getColumnLabel**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\ColumnResult::getColumnLabel()**

&lt;?php

/_ ... _/

?&gt;

# ColumnResult::getColumnName

(No version information available, might only be in Git)

ColumnResult::getColumnName — Devuelve el nombre de la columna

### Descripción

public **mysql_xdevapi\ColumnResult::getColumnName**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\ColumnResult::getColumnName()**

&lt;?php

/_ ... _/

?&gt;

# ColumnResult::getFractionalDigits

(No version information available, might only be in Git)

ColumnResult::getFractionalDigits — Devuelve la longitud de los dígitos fraccionarios

### Descripción

public **mysql_xdevapi\ColumnResult::getFractionalDigits**(): [int](#language.types.integer)

Recupera el número de dígitos fraccionarios para la columna.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\ColumnResult::getFractionalDigits()**

&lt;?php

/_ ... _/

?&gt;

# ColumnResult::getLength

(No version information available, might only be in Git)

ColumnResult::getLength — Devuelve la longitud del campo

### Descripción

public **mysql_xdevapi\ColumnResult::getLength**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\ColumnResult::getLength()**

&lt;?php

/_ ... _/

?&gt;

# ColumnResult::getSchemaName

(No version information available, might only be in Git)

ColumnResult::getSchemaName — Devuelve el nombre del esquema

### Descripción

public **mysql_xdevapi\ColumnResult::getSchemaName**(): [string](#language.types.string)

Recupera el nombre del esquema donde la columna está almacenada.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\ColumnResult::getSchemaName()**

&lt;?php

/_ ... _/

?&gt;

# ColumnResult::getTableLabel

(No version information available, might only be in Git)

ColumnResult::getTableLabel — Devuelve la etiqueta de la tabla

### Descripción

public **mysql_xdevapi\ColumnResult::getTableLabel**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\ColumnResult::getTableLabel()**

&lt;?php

/_ ... _/

?&gt;

# ColumnResult::getTableName

(No version information available, might only be in Git)

ColumnResult::getTableName — Devuelve el nombre de la tabla

### Descripción

public **mysql_xdevapi\ColumnResult::getTableName**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre de la tabla para la columna.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\ColumnResult::getTableName()**

&lt;?php

/_ ... _/

?&gt;

# ColumnResult::getType

(No version information available, might only be in Git)

ColumnResult::getType — Devuelve el tipo de columna

### Descripción

public **mysql_xdevapi\ColumnResult::getType**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\ColumnResult::getType()**

&lt;?php

/_ ... _/

?&gt;

# ColumnResult::isNumberSigned

(No version information available, might only be in Git)

ColumnResult::isNumberSigned — Indica si el tipo es signado

### Descripción

public **mysql_xdevapi\ColumnResult::isNumberSigned**(): [int](#language.types.integer)

Recupera la información de columna de una tabla e instancia el método
**mysql_xdevapi\RowResult::getColumns()**.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si una columna dada es de tipo signado.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\ColumnResult::isNumberSigned()**

&lt;?php

/_ ... _/

?&gt;

# ColumnResult::isPadded

(No version information available, might only be in Git)

ColumnResult::isPadded — Verifica si el campo tiene un relleno

### Descripción

public **mysql_xdevapi\ColumnResult::isPadded**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si una columna dada tiene un relleno.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\ColumnResult::isPadded()**

&lt;?php

/_ ... _/

?&gt;

## Tabla de contenidos

- [ColumnResult::\_\_construct](#mysql-xdevapi-columnresult.construct) — Constructor de ColumnResult
- [ColumnResult::getCharacterSetName](#mysql-xdevapi-columnresult.getcharactersetname) — Devuelve el conjunto de caracteres
- [ColumnResult::getCollationName](#mysql-xdevapi-columnresult.getcollationname) — Devuelve el nombre de la intercalación
- [ColumnResult::getColumnLabel](#mysql-xdevapi-columnresult.getcolumnlabel) — Devuelve la etiqueta de columna
- [ColumnResult::getColumnName](#mysql-xdevapi-columnresult.getcolumnname) — Devuelve el nombre de la columna
- [ColumnResult::getFractionalDigits](#mysql-xdevapi-columnresult.getfractionaldigits) — Devuelve la longitud de los dígitos fraccionarios
- [ColumnResult::getLength](#mysql-xdevapi-columnresult.getlength) — Devuelve la longitud del campo
- [ColumnResult::getSchemaName](#mysql-xdevapi-columnresult.getschemaname) — Devuelve el nombre del esquema
- [ColumnResult::getTableLabel](#mysql-xdevapi-columnresult.gettablelabel) — Devuelve la etiqueta de la tabla
- [ColumnResult::getTableName](#mysql-xdevapi-columnresult.gettablename) — Devuelve el nombre de la tabla
- [ColumnResult::getType](#mysql-xdevapi-columnresult.gettype) — Devuelve el tipo de columna
- [ColumnResult::isNumberSigned](#mysql-xdevapi-columnresult.isnumbersigned) — Indica si el tipo es signado
- [ColumnResult::isPadded](#mysql-xdevapi-columnresult.ispadded) — Verifica si el campo tiene un relleno

# Interfaz CrudOperationBindable

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\CrudOperationBindable**

     {


    /* Métodos */

abstract public **bind**([array](#language.types.array) $placeholder_values): [mysql_xdevapi\CrudOperationBindable](#class.mysql-xdevapi-crudoperationbindable)

}

# CrudOperationBindable::bind

(No version information available, might only be in Git)

CrudOperationBindable::bind — Liga un valor a un espacio reservado

### Descripción

abstract public **mysql_xdevapi\CrudOperationBindable::bind**([array](#language.types.array) $placeholder_values): [mysql_xdevapi\CrudOperationBindable](#class.mysql-xdevapi-crudoperationbindable)

Liga un valor a un espacio reservado específico.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    placeholder_values


      El nombre de los espacios reservados y los valores a ligar.


### Valores devueltos

Un objeto CrudOperationBindable

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CrudOperationBindable::bind()**

&lt;?php

$res = $coll-&gt;modify('name like :name')-&gt;arrayInsert('job[0]', 'Calciatore')-&gt;bind(['name' =&gt; 'ENTITY'])-&gt;execute();
$res = $table-&gt;delete()-&gt;orderby('age desc')-&gt;where('age &lt; 20 and age &gt; 12 and name != :name')-&gt;bind(['name' =&gt; 'Tierney'])-&gt;limit(2)-&gt;execute();

?&gt;

## Tabla de contenidos

- [CrudOperationBindable::bind](#mysql-xdevapi-crudoperationbindable.bind) — Liga un valor a un espacio reservado

# Interfaz CrudOperationLimitable

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\CrudOperationLimitable**

     {


    /* Métodos */

abstract public **limit**([int](#language.types.integer) $rows): [mysql_xdevapi\CrudOperationLimitable](#class.mysql-xdevapi-crudoperationlimitable)

}

# CrudOperationLimitable::limit

(No version information available, might only be in Git)

CrudOperationLimitable::limit — Define el límite de resultados

### Descripción

abstract public **mysql_xdevapi\CrudOperationLimitable::limit**([int](#language.types.integer) $rows): [mysql_xdevapi\CrudOperationLimitable](#class.mysql-xdevapi-crudoperationlimitable)

Define el número máximo de resultados o documentos a devolver.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    rows


      El número máximo de resultados o documentos.


### Valores devueltos

Un objeto CrudOperationLimitable.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CrudOperationLimitable::limit()**

&lt;?php

$res = $coll-&gt;find()-&gt;fields(['name as n','age as a','job as j'])-&gt;groupBy('j')-&gt;limit(11)-&gt;execute();
$res = $table-&gt;update()-&gt;set('age',69)-&gt;where('age &gt; 15 and age &lt; 22')-&gt;limit(4)-&gt;orderby(['age asc','name desc'])-&gt;execute();

?&gt;

## Tabla de contenidos

- [CrudOperationLimitable::limit](#mysql-xdevapi-crudoperationlimitable.limit) — Define el límite de resultados

# Interfaz CrudOperationSkippable

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\CrudOperationSkippable**

     {


    /* Métodos */

abstract public **skip**([int](#language.types.integer) $skip): [mysql_xdevapi\CrudOperationSkippable](#class.mysql-xdevapi-crudoperationskippable)

}

# CrudOperationSkippable::skip

(No version information available, might only be in Git)

CrudOperationSkippable::skip — El número de operaciones a ignorar

### Descripción

abstract public **mysql_xdevapi\CrudOperationSkippable::skip**([int](#language.types.integer) $skip): [mysql_xdevapi\CrudOperationSkippable](#class.mysql-xdevapi-crudoperationskippable)

Ignora este número de registros en la operación devuelta.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    skip


      El número de elementos a ignorar.


### Valores devueltos

Un objeto CrudOperationSkippable.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CrudOperationSkippable::skip()**

&lt;?php

$res = $coll-&gt;find('job like \'Programmatore\'')-&gt;limit(1)-&gt;skip(3)-&gt;sort('age asc')-&gt;execute();

?&gt;

## Tabla de contenidos

- [CrudOperationSkippable::skip](#mysql-xdevapi-crudoperationskippable.skip) — El número de operaciones a ignorar

# Interfaz CrudOperationSortable

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\CrudOperationSortable**

     {


    /* Métodos */

abstract public **sort**([string](#language.types.string) $sort_expr): [mysql_xdevapi\CrudOperationSortable](#class.mysql-xdevapi-crudoperationsortable)

}

# CrudOperationSortable::sort

(No version information available, might only be in Git)

CrudOperationSortable::sort — Ordena los resultados

### Descripción

abstract public **mysql_xdevapi\CrudOperationSortable::sort**([string](#language.types.string) $sort_expr): [mysql_xdevapi\CrudOperationSortable](#class.mysql-xdevapi-crudoperationsortable)

Ordena el conjunto de resultados por el campo seleccionado en el argumento sort_expr. Los órdenes permitidos
son ASC (Ascendente) o DESC (Descendente). Esta operación es equivalente a la operación SQL 'ORDER BY'
y sigue el mismo conjunto de reglas.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    sort_expr


      Una o más expresiones de ordenación pueden ser proporcionadas. La evaluación se realiza de izquierda a derecha,
      y cada expresión está separada por una coma.


### Valores devueltos

Un objeto CrudOperationSortable.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\CrudOperationSortable::sort()**

&lt;?php

$res = $coll-&gt;find('job like \'Cavia\'')-&gt;sort('age desc', '\_id desc')-&gt;execute();

?&gt;

## Tabla de contenidos

- [CrudOperationSortable::sort](#mysql-xdevapi-crudoperationsortable.sort) — Ordena los resultados

# Interfaz DatabaseObject

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\DatabaseObject**

     {


    /* Métodos */

abstract public **existsInDatabase**(): [bool](#language.types.boolean)
abstract public **getName**(): [string](#language.types.string)
abstract public **getSession**(): [mysql_xdevapi\Session](#class.mysql-xdevapi-session)

}

# DatabaseObject::existsInDatabase

(No version information available, might only be in Git)

DatabaseObject::existsInDatabase — Verifica si el objeto existe en la base de datos

### Descripción

abstract public **mysql_xdevapi\DatabaseObject::existsInDatabase**(): [bool](#language.types.boolean)

Verifica si el objeto de base de datos hace referencia a un objeto que existe en la base de datos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el objeto existe en la base de datos, de lo contrario **[false](#constant.false)** si no existe.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\DatabaseObject::existsInDatabase()**

&lt;?php

$existInDb = $dbObj-&gt;existsInDatabase();

?&gt;

# DatabaseObject::getName

(No version information available, might only be in Git)

DatabaseObject::getName — Devuelve el nombre del objeto

### Descripción

abstract public **mysql_xdevapi\DatabaseObject::getName**(): [string](#language.types.string)

Recupera el nombre de este objeto de base de datos.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre de este objeto de base de datos.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\DatabaseObject::getName()**

&lt;?php

$dbObjName = $dbObj-&gt;getName();

?&gt;

# DatabaseObject::getSession

(No version information available, might only be in Git)

DatabaseObject::getSession — Devuelve el nombre de la sesión

### Descripción

abstract public **mysql_xdevapi\DatabaseObject::getSession**(): [mysql_xdevapi\Session](#class.mysql-xdevapi-session)

Recupera la sesión asociada al objeto de base de datos.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El objeto Session.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\DatabaseObject::getSession()**

&lt;?php

$session = $dbObj-&gt;getSession();

?&gt;

## Tabla de contenidos

- [DatabaseObject::existsInDatabase](#mysql-xdevapi-databaseobject.existsindatabase) — Verifica si el objeto existe en la base de datos
- [DatabaseObject::getName](#mysql-xdevapi-databaseobject.getname) — Devuelve el nombre del objeto
- [DatabaseObject::getSession](#mysql-xdevapi-databaseobject.getsession) — Devuelve el nombre de la sesión

# Clase DocResult

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\DocResult**


     implements
       [mysql_xdevapi\BaseResult](#class.mysql-xdevapi-baseresult),  [Traversable](#class.traversable) {


    /* Métodos */

public **fetchAll**(): [array](#language.types.array)
public **fetchOne**(): [array](#language.types.array)
public **getWarnings**(): [Array](#language.types.array)
public **getWarningsCount**(): [int](#language.types.integer)

}

# DocResult::\_\_construct

(No version information available, might only be in Git)

DocResult::\_\_construct — Constructor de DocResult

### Descripción

private **mysql_xdevapi\DocResult::\_\_construct**()

Recupera los resultados y las advertencias del documento,
y es instanciado por CollectionFind.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Un ejemplo de DocResult**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");

$create-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')-&gt;execute();
$create-&gt;add('{"name": "Reginald", "age": 42, "job": "Butler"}')-&gt;execute();

// ...

$collection = $schema-&gt;getCollection("people");

// Devuelve un objeto DocResult
$result = $collection
-&gt;find('job like :job and age &gt; :age')
-&gt;bind(['job' =&gt; 'Butler', 'age' =&gt; 16])
-&gt;sort('age desc')
-&gt;limit(1)
-&gt;execute();

var_dump($result-&gt;fetchAll());
?&gt;

Resultado del ejemplo anterior es similar a:

array(1) {
[0]=&gt;
array(4) {
["_id"]=&gt;
string(28) "00005b6b536100000000000000f3"
["age"]=&gt;
int(42)
["job"]=&gt;
string(6) "Butler"
["name"]=&gt;
string(8) "Reginald"
}
}

# DocResult::fetchAll

(No version information available, might only be in Git)

DocResult::fetchAll — Devuelve todas las filas

### Descripción

public **mysql_xdevapi\DocResult::fetchAll**(): [array](#language.types.array)

Devuelve todas las filas de un conjunto de resultados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array numérico con todos los resultados de la consulta; cada resultado es
un array asociativo. Un array vacío es devuelto si no hay
filas presentes.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\DocResult::fetchAll()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");

$create-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')-&gt;execute();
$create-&gt;add('{"name": "Reginald", "age": 42, "job": "Butler"}')-&gt;execute();

// ...

$collection = $schema-&gt;getCollection("people");

// Devuelve un objeto DocResult
$result = $collection
-&gt;find('job like :job and age &gt; :age')
-&gt;bind(['job' =&gt; 'Butler', 'age' =&gt; 16])
-&gt;sort('age desc')
-&gt;execute();

var_dump($result-&gt;fetchAll());
?&gt;

Resultado del ejemplo anterior es similar a:

array(2) {

[0]=&gt;
array(4) {
["_id"]=&gt;
string(28) "00005b6b53610000000000000123"
["age"]=&gt;
int(42)
["job"]=&gt;
string(6) "Butler"
["name"]=&gt;
string(8) "Reginald"
}

[1]=&gt;
array(4) {
["_id"]=&gt;
string(28) "00005b6b53610000000000000122"
["age"]=&gt;
int(18)
["job"]=&gt;
string(6) "Butler"
["name"]=&gt;
string(6) "Alfred"
}

}

# DocResult::fetchOne

(No version information available, might only be in Git)

DocResult::fetchOne — Devuelve una fila

### Descripción

public **mysql_xdevapi\DocResult::fetchOne**(): [array](#language.types.array)

Recupera un resultado de un conjunto de resultados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El resultado, en forma de array asociativo
o **[null](#constant.null)** si no hay resultado presente.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\DocResult::fetchOne()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");

$create-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')-&gt;execute();
$create-&gt;add('{"name": "Reginald", "age": 42, "job": "Butler"}')-&gt;execute();

// ...

$collection = $schema-&gt;getCollection("people");

// Devuelve un objeto DocResult
$result = $collection
-&gt;find('job like :job and age &gt; :age')
-&gt;bind(['job' =&gt; 'Butler', 'age' =&gt; 16])
-&gt;sort('age desc')
-&gt;execute();

var_dump($result-&gt;fetchOne());
?&gt;

Resultado del ejemplo anterior es similar a:

array(4) {
["_id"]=&gt;
string(28) "00005b6b53610000000000000125"
["age"]=&gt;
int(42)
["job"]=&gt;
string(6) "Butler"
["name"]=&gt;
string(8) "Reginald"
}

# DocResult::getWarnings

(No version information available, might only be in Git)

DocResult::getWarnings — Devuelve los avisos de la última operación

### Descripción

public **mysql_xdevapi\DocResult::getWarnings**(): [Array](#language.types.array)

Recupera los avisos generados por la última operación del servidor MySQL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de objetos Warning de la última operación. Cada objeto
define un 'message' de error, un 'nivel' de error y un 'code' de error. Un array
vacío es devuelto si no hay errores presentes.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\DocResult::getWarnings()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");

$create-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')-&gt;execute();
$create-&gt;add('{"name": "Reginald", "age": 42, "job": "Butler"}')-&gt;execute();

// ...

$collection = $schema-&gt;getCollection("people");

// Devuelve un objeto DocResult
$result = $collection
-&gt;find('job like :job and age &gt; :age')
-&gt;bind(['job' =&gt; 'Butler', 'age' =&gt; 16])
-&gt;sort('age desc')
-&gt;execute();

if (!$result-&gt;getWarningsCount()) {
    echo "Hubo un error:\n";
    print_r($result-&gt;getWarnings());
exit;
}

var_dump($result-&gt;fetchOne());
?&gt;

Resultado del ejemplo anterior es similar a:

Hubo un error:

Array
(
[0] =&gt; mysql_xdevapi\Warning Object
(
[message] =&gt; Algo malo y así sucesivamente
[level] =&gt; 2
[code] =&gt; 1365
)
[1] =&gt; mysql_xdevapi\Warning Object
(
[message] =&gt; Algo malo y así sucesivamente
[level] =&gt; 2
[code] =&gt; 1365
)
)

# DocResult::getWarningsCount

(No version information available, might only be in Git)

DocResult::getWarningsCount — Devuelve el número de advertencias de la última operación

### Descripción

public **mysql_xdevapi\DocResult::getWarningsCount**(): [int](#language.types.integer)

Devuelve el número de advertencias generadas por la última operación. Más
precisamente, estas advertencias son generadas por el servidor MySQL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de advertencias de la última operación.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\DocResult::getWarningsCount()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");

$create-&gt;add('{"name": "Alfred", "age": 18, "job": "Butler"}')-&gt;execute();
$create-&gt;add('{"name": "Reginald", "age": 42, "job": "Butler"}')-&gt;execute();

// ...

$collection = $schema-&gt;getCollection("people");

// Devuelve un objeto DocResult
$result = $collection
-&gt;find('job like :job and age &gt; :age')
-&gt;bind(['job' =&gt; 'Butler', 'age' =&gt; 16])
-&gt;sort('age desc')
-&gt;execute();

if (!$result-&gt;getWarningsCount()) {
    echo "Hubo un error:\n";
    print_r($result-&gt;getWarnings());
exit;
}

var_dump($result-&gt;fetchOne());
?&gt;

Resultado del ejemplo anterior es similar a:

array(4) {
["_id"]=&gt;
string(28) "00005b6b53610000000000000135"
["age"]=&gt;
int(42)
["job"]=&gt;
string(6) "Butler"
["name"]=&gt;
string(8) "Reginald"
}

## Tabla de contenidos

- [DocResult::\_\_construct](#mysql-xdevapi-docresult.construct) — Constructor de DocResult
- [DocResult::fetchAll](#mysql-xdevapi-docresult.fetchall) — Devuelve todas las filas
- [DocResult::fetchOne](#mysql-xdevapi-docresult.fetchone) — Devuelve una fila
- [DocResult::getWarnings](#mysql-xdevapi-docresult.getwarnings) — Devuelve los avisos de la última operación
- [DocResult::getWarningsCount](#mysql-xdevapi-docresult.getwarningscount) — Devuelve el número de advertencias de la última operación

# Clase Exception

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\Exception**



      extends
       [RuntimeException](#class.runtimeexception)


     implements
       [Throwable](#class.throwable) {

}

# Interfaz Executable

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\Executable**

     {


    /* Métodos */

abstract public **execute**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

}

# Executable::execute

(No version information available, might only be in Git)

Executable::execute — Ejecuta una declaración

### Descripción

abstract public **mysql_xdevapi\Executable::execute**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

Ejecuta la declaración a partir de una operación de colección o de una consulta de tabla;
esta funcionalidad permite el encadenamiento de métodos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Uno de los objetos Result, tales como Result o SqlStatementResult.

### Ejemplos

**Ejemplo #1 Ejemplos de execute()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$result_sql = $session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

var_dump($result_sql);

$schema     = $session-&gt;getSchema("addressbook");
$collection = $schema-&gt;createCollection("humans");

$result_collection = $collection-&gt;add(
'{"name": "Jane",
"jobs": [{"title":"Scientist","Salary":18000}, {"title":"Mother","Salary":0}],
"hobbies": ["Walking","Making pies"]}');

$result_collection_executed = $result_collection-&gt;execute();

var_dump($result_collection);
var_dump($result_collection_executed);
?&gt;

Resultado del ejemplo anterior es similar a:

object(mysql_xdevapi\SqlStatementResult)#3 (0) {
}

object(mysql_xdevapi\CollectionAdd)#5 (0) {
}

object(mysql_xdevapi\Result)#7 (0) {
}

## Tabla de contenidos

- [Executable::execute](#mysql-xdevapi-executable.execute) — Ejecuta una declaración

# Clase ExecutionStatus

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\ExecutionStatus**

     {

    /* Propiedades */

     public
      [$affectedItems](#mysql-xdevapi-executionstatus.props.affecteditems);

    public
      [$matchedItems](#mysql-xdevapi-executionstatus.props.matcheditems);

    public
      [$foundItems](#mysql-xdevapi-executionstatus.props.founditems);

    public
      [$lastInsertId](#mysql-xdevapi-executionstatus.props.lastinsertid);

    public
      [$lastDocumentId](#mysql-xdevapi-executionstatus.props.lastdocumentid);


    /* Constructor */

private **\_\_construct**()

}

## Propiedades

     affectedItems







     matchedItems







     foundItems







     lastInsertId







     lastDocumentId






# ExecutionStatus::\_\_construct

(No version information available, might only be in Git)

ExecutionStatus::\_\_construct — Constructor de ExecutionStatus

### Descripción

private **mysql_xdevapi\ExecutionStatus::\_\_construct**()

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\ExecutionStatus::\_\_construct()**

&lt;?php

/_ ... _/

?&gt;

## Tabla de contenidos

- [ExecutionStatus::\_\_construct](#mysql-xdevapi-executionstatus.construct) — Constructor de ExecutionStatus

# Clase Expression

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\Expression**

     {

    /* Propiedades */

     public
      [$name](#mysql-xdevapi-expression.props.name);


    /* Constructor */

public **\_\_construct**([string](#language.types.string) $expression)

}

## Propiedades

     name






# Expression::\_\_construct

(No version information available, might only be in Git)

Expression::\_\_construct — Constructor de Expression

### Descripción

public **mysql_xdevapi\Expression::\_\_construct**([string](#language.types.string) $expression)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    expression





### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Expression::\_\_construct()**

&lt;?php

/_ ... _/

?&gt;

## Tabla de contenidos

- [Expression::\_\_construct](#mysql-xdevapi-expression.construct) — Constructor de Expression

# Clase Result

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\Result**


     implements
       [mysql_xdevapi\BaseResult](#class.mysql-xdevapi-baseresult),  [Traversable](#class.traversable) {


    /* Métodos */

public **getAffectedItemsCount**(): [int](#language.types.integer)
public **getAutoIncrementValue**(): [int](#language.types.integer)
public **getGeneratedIds**(): [array](#language.types.array)
public **getWarnings**(): [array](#language.types.array)
public **getWarningsCount**(): [int](#language.types.integer)

}

# Result::\_\_construct

(No version information available, might only be in Git)

Result::\_\_construct — Constructor de Result

### Descripción

private **mysql_xdevapi\Result::\_\_construct**()

Un objeto que recupera los ID generados, los valores AUTO_INCREMENT y las advertencias,
para un conjunto de resultados.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Result::\_\_construct()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("
CREATE TABLE addressbook.names
(id INT NOT NULL AUTO_INCREMENT, name VARCHAR(30), age INT, PRIMARY KEY (id))
")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$result = $table-&gt;insert("name", "age")-&gt;values(["Suzanne", 31],["Julie", 43])-&gt;execute();
$result = $table-&gt;insert("name", "age")-&gt;values(["Suki", 34])-&gt;execute();

$ai = $result-&gt;getAutoIncrementValue();
var_dump($ai);
?&gt;

El ejemplo anterior mostrará:

int(3)

# Result::getAffectedItemsCount

(No version information available, might only be in Git)

Result::getAffectedItemsCount — Devuelve el número de filas afectadas

### Descripción

public **mysql_xdevapi\Result::getAffectedItemsCount**(): [int](#language.types.integer)

Devuelve el número de filas afectadas por la operación anterior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número (como integer) de filas afectadas.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Result::getAffectedItemsCount()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");

$collection = $schema-&gt;getCollection("people");

$result = $collection-&gt;add('{"name": "Wilma", "age": 23, "job": "Teacher"}')-&gt;execute();

var_dump( $res-&gt;getAffectedItemsCount() );
?&gt;

El ejemplo anterior mostrará:

int(1)

# Result::getAutoIncrementValue

(No version information available, might only be in Git)

Result::getAutoIncrementValue — Devuelve el valor auto-incrementado

### Descripción

public **mysql_xdevapi\Result::getAutoIncrementValue**(): [int](#language.types.integer)

Devuelve el último valor AUTO_INCREMENT (último identificador insertado).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El último valor AUTO_INCREMENT.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Result::getAutoIncrementValue()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("
CREATE TABLE addressbook.names
(id INT NOT NULL AUTO_INCREMENT, name VARCHAR(30), age INT, PRIMARY KEY (id))
")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$result = $table-&gt;insert("name", "age")-&gt;values(["Suzanne", 31],["Julie", 43])-&gt;execute();
$result = $table-&gt;insert("name", "age")-&gt;values(["Suki", 34])-&gt;execute();

$ai = $result-&gt;getAutoIncrementValue();
var_dump($ai);
?&gt;

El ejemplo anterior mostrará:

int(3)

# Result::getGeneratedIds

(No version information available, might only be in Git)

Result::getGeneratedIds — Devuelve los ID generados

### Descripción

public **mysql_xdevapi\Result::getGeneratedIds**(): [array](#language.types.array)

Recupera los valores \_id generados por la última operación.
El campo \_id único es generado por el servidor MySQL.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de \_id generados por la última operación,
o un array vacío si no hay ninguno.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Result::getGeneratedIds()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$create = $schema-&gt;createCollection("people");

$collection = $schema-&gt;getCollection("people");

$result = $collection-&gt;add(
'{"name": "Bernie",
"jobs": [{"title":"Cat Herder","Salary":42000}, {"title":"Father","Salary":0}],
"hobbies": ["Sports","Making cupcakes"]}',
'{"name": "Jane",
"jobs": [{"title":"Scientist","Salary":18000}, {"title":"Mother","Salary":0}],
"hobbies": ["Walking","Making pies"]}')-&gt;execute();

$ids = $result-&gt;getGeneratedIds();
var_dump($ids);
?&gt;

Resultado del ejemplo anterior es similar a:

array(2) {
[0]=&gt;
string(28) "00005b6b53610000000000000064"
[1]=&gt;
string(28) "00005b6b53610000000000000065"
}

# Result::getWarnings

(No version information available, might only be in Git)

Result::getWarnings — Devuelve las advertencias de la última operación

### Descripción

public **mysql_xdevapi\Result::getWarnings**(): [array](#language.types.array)

Devuelve las advertencias de la última operación Result.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de objetos Warning de la última operación. Cada objeto
define un mensaje de error, un nivel de error y un código de error.
Se devuelve un array vacío si no hay errores.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\RowResult::getWarnings()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("CREATE DATABASE foo")-&gt;execute();
$session-&gt;sql("CREATE TABLE foo.test_table(x int)")-&gt;execute();

$schema = $session-&gt;getSchema("foo");
$table = $schema-&gt;getTable("test_table");

$table-&gt;insert(['x'])-&gt;values([1])-&gt;values([2])-&gt;execute();

$res = $table-&gt;select(['x/0 as bad_x'])-&gt;execute();
$warnings = $res-&gt;getWarnings();

print_r($warnings);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; mysql_xdevapi\Warning Object
(
[message] =&gt; Division by 0
[level] =&gt; 2
[code] =&gt; 1365
)
[1] =&gt; mysql_xdevapi\Warning Object
(
[message] =&gt; Division by 0
[level] =&gt; 2
[code] =&gt; 1365
)
)

# Result::getWarningsCount

(No version information available, might only be in Git)

Result::getWarningsCount — Devuelve el número de advertencias de la última operación

### Descripción

public **mysql_xdevapi\Result::getWarningsCount**(): [int](#language.types.integer)

Devuelve el número de advertencias generadas por la última operación.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de advertencias generadas por la última operación.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\RowResult::getWarningsCount()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS foo")-&gt;execute();
$session-&gt;sql("CREATE DATABASE foo")-&gt;execute();
$session-&gt;sql("CREATE TABLE foo.test_table(x int)")-&gt;execute();

$schema = $session-&gt;getSchema("foo");
$table = $schema-&gt;getTable("test_table");

$table-&gt;insert(['x'])-&gt;values([1])-&gt;values([2])-&gt;execute();

$res = $table-&gt;select(['x/0 as bad_x'])-&gt;execute();

echo $res-&gt;getWarningsCount();
?&gt;

Resultado del ejemplo anterior es similar a:

2

## Tabla de contenidos

- [Result::\_\_construct](#mysql-xdevapi-result.construct) — Constructor de Result
- [Result::getAffectedItemsCount](#mysql-xdevapi-result.getaffecteditemscount) — Devuelve el número de filas afectadas
- [Result::getAutoIncrementValue](#mysql-xdevapi-result.getautoincrementvalue) — Devuelve el valor auto-incrementado
- [Result::getGeneratedIds](#mysql-xdevapi-result.getgeneratedids) — Devuelve los ID generados
- [Result::getWarnings](#mysql-xdevapi-result.getwarnings) — Devuelve las advertencias de la última operación
- [Result::getWarningsCount](#mysql-xdevapi-result.getwarningscount) — Devuelve el número de advertencias de la última operación

# Clase RowResult

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\RowResult**


     implements
       [mysql_xdevapi\BaseResult](#class.mysql-xdevapi-baseresult),  [Traversable](#class.traversable) {


    /* Métodos */

public **fetchAll**(): [array](#language.types.array)
public **fetchOne**(): [array](#language.types.array)
public **getColumnsCount**(): [int](#language.types.integer)
public **getColumnNames**(): [array](#language.types.array)
public **getColumns**(): [array](#language.types.array)
public **getWarnings**(): [array](#language.types.array)
public **getWarningsCount**(): [int](#language.types.integer)

}

# RowResult::\_\_construct

(No version information available, might only be in Git)

RowResult::\_\_construct — Constructor de RowResult

### Descripción

private **mysql_xdevapi\RowResult::\_\_construct**()

    Representa el conjunto de resultados obtenidos a partir de la consulta de la base de datos.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\RowResult::\_\_construct()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$row = $table-&gt;select('name', 'age')-&gt;where('age &gt; 18')-&gt;execute()-&gt;fetchAll();

print_r($row);

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[name] =&gt; John
[age] =&gt; 42
)
[1] =&gt; Array
(
[name] =&gt; Sam
[age] =&gt; 33
)
)

# RowResult::fetchAll

(No version information available, might only be in Git)

RowResult::fetchAll — Devuelve todas las filas del resultado

### Descripción

public **mysql_xdevapi\RowResult::fetchAll**(): [array](#language.types.array)

Recupera todas las filas del conjunto de resultados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array numérico con todos los resultados de la consulta; cada resultado es
un array asociativo. Se devuelve un array vacío si no hay filas presentes.

### Ejemplos

**Ejemplo #1 mysql_xdevapi\RowResult::fetchAll()** example

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$row = $table-&gt;select('name', 'age')-&gt;execute()-&gt;fetchAll();

print_r($row);

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[name] =&gt; John
[age] =&gt; 42
)
[1] =&gt; Array
(
[name] =&gt; Sam
[age] =&gt; 33
)
)

# RowResult::fetchOne

(No version information available, might only be in Git)

RowResult::fetchOne — Devuelve una fila del resultado

### Descripción

public **mysql_xdevapi\RowResult::fetchOne**(): [array](#language.types.array)

Recupera una fila del conjunto de resultados.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El resultado, en forma de array asociativo
o **[null](#constant.null)** si no hay resultado presente.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\RowResult::fetchOne()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$row = $table-&gt;select('name', 'age')-&gt;where('age &lt; 40')-&gt;execute()-&gt;fetchOne();

print_r($row);

Resultado del ejemplo anterior es similar a:

Array
(
[name] =&gt; Sam
[age] =&gt; 33
)

# RowResult::getColumnsCount

(No version information available, might only be in Git)

RowResult::getColumnsCount — Devuelve el número de columnas

### Descripción

public **mysql_xdevapi\RowResult::getColumnsCount**(): [int](#language.types.integer)

Devuelve el número de columnas presentes en el conjunto de resultados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de columnas; 0 si no hay ninguna.

### Historial de cambios

      Versión
      Descripción






      8.0.14

       El método ha sido renombrado de getColumnCount() a getColumnsCount().



### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\RowResult::getColumnsCount()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE foo")-&gt;execute();
$session-&gt;sql("CREATE TABLE foo.test_table(x int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$sql = $session-&gt;sql("SELECT \* from addressbook.names")-&gt;execute();

echo $sql-&gt;getColumnsCount();

Resultado del ejemplo anterior es similar a:

2

# RowResult::getColumnNames

(No version information available, might only be in Git)

RowResult::getColumnNames — Devuelve el nombre de todas las columnas

### Descripción

public **mysql_xdevapi\RowResult::getColumnNames**(): [array](#language.types.array)

Devuelve el nombre de las columnas presentes en el conjunto de resultados.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array numérico de nombres de columnas de tabla,
o un array vacío si el conjunto de resultados está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\RowResult::getColumnNames()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE foo")-&gt;execute();
$session-&gt;sql("CREATE TABLE foo.test_table(x int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$sql = $session-&gt;sql("SELECT \* from addressbook.names")-&gt;execute();

$colnames = $sql-&gt;getColumnNames();

print_r($colnames);

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; name
[1] =&gt; age
)

# RowResult::getColumns

(No version information available, might only be in Git)

RowResult::getColumns — Devuelve los metadatos de las columnas

### Descripción

public **mysql_xdevapi\RowResult::getColumns**(): [array](#language.types.array)

Devuelve los metadatos de las columnas presentes en el conjunto de resultados.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de FieldMetadata que representa las columnas del resultado,
o un array vacío si el conjunto de resultados está vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\RowResult::getColumns()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE foo")-&gt;execute();
$session-&gt;sql("CREATE TABLE foo.test_table(x int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$sql = $session-&gt;sql("SELECT \* from addressbook.names")-&gt;execute();

$cols = $sql-&gt;getColumns();

print_r($cols);

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; mysql_xdevapi\FieldMetadata Object
(
[type] =&gt; 7
[type_name] =&gt; BYTES
[name] =&gt; name
[original_name] =&gt; name
[table] =&gt; names
[original_table] =&gt; names
[schema] =&gt; addressbook
[catalog] =&gt; def
[collation] =&gt; 255
[fractional_digits] =&gt; 0
[length] =&gt; 65535
[flags] =&gt; 0
[content_type] =&gt; 0
)
[1] =&gt; mysql_xdevapi\FieldMetadata Object
(
[type] =&gt; 1
[type_name] =&gt; SINT
[name] =&gt; age
[original_name] =&gt; age
[table] =&gt; names
[original_table] =&gt; names
[schema] =&gt; addressbook
[catalog] =&gt; def
[collation] =&gt; 0
[fractional_digits] =&gt; 0
[length] =&gt; 11
[flags] =&gt; 0
[content_type] =&gt; 0
)
)

# RowResult::getWarnings

(No version information available, might only be in Git)

RowResult::getWarnings — Devuelve las advertencias de la última operación

### Descripción

public **mysql_xdevapi\RowResult::getWarnings**(): [array](#language.types.array)

Devuelve las advertencias de la última operación RowResult.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de objetos Warning de la última operación. Cada objeto
define un mensaje de error 'message', un nivel de error 'level', y un código de error 'code'. Un array
vacío es devuelto si no hay errores presentes.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\RowResult::getWarnings()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("CREATE DATABASE foo")-&gt;execute();
$session-&gt;sql("CREATE TABLE foo.test_table(x int)")-&gt;execute();

$schema = $session-&gt;getSchema("foo");
$table = $schema-&gt;getTable("test_table");

$table-&gt;insert(['x'])-&gt;values([1])-&gt;values([2])-&gt;execute();

$res = $table-&gt;select(['x/0 as bad_x'])-&gt;execute();
$warnings = $res-&gt;getWarnings();

print_r($warnings);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; mysql_xdevapi\Warning Object
(
[message] =&gt; Division by 0
[level] =&gt; 2
[code] =&gt; 1365
)
[1] =&gt; mysql_xdevapi\Warning Object
(
[message] =&gt; Division by 0
[level] =&gt; 2
[code] =&gt; 1365
)
)

# RowResult::getWarningsCount

(No version information available, might only be in Git)

RowResult::getWarningsCount — Devuelve el número de advertencias de la última operación

### Descripción

public **mysql_xdevapi\RowResult::getWarningsCount**(): [int](#language.types.integer)

    Devuelve el número de advertencias generadas por la última operación.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de advertencias generadas por la última operación.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\RowResult::getWarningsCount()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS foo")-&gt;execute();
$session-&gt;sql("CREATE DATABASE foo")-&gt;execute();
$session-&gt;sql("CREATE TABLE foo.test_table(x int)")-&gt;execute();

$schema = $session-&gt;getSchema("foo");
$table = $schema-&gt;getTable("test_table");

$table-&gt;insert(['x'])-&gt;values([1])-&gt;values([2])-&gt;execute();

$res = $table-&gt;select(['x/0 as bad_x'])-&gt;execute();

echo $res-&gt;getWarningsCount();
?&gt;

Resultado del ejemplo anterior es similar a:

2

## Tabla de contenidos

- [RowResult::\_\_construct](#mysql-xdevapi-rowresult.construct) — Constructor de RowResult
- [RowResult::fetchAll](#mysql-xdevapi-rowresult.fetchall) — Devuelve todas las filas del resultado
- [RowResult::fetchOne](#mysql-xdevapi-rowresult.fetchone) — Devuelve una fila del resultado
- [RowResult::getColumnsCount](#mysql-xdevapi-rowresult.getcolumncount) — Devuelve el número de columnas
- [RowResult::getColumnNames](#mysql-xdevapi-rowresult.getcolumnnames) — Devuelve el nombre de todas las columnas
- [RowResult::getColumns](#mysql-xdevapi-rowresult.getcolumns) — Devuelve los metadatos de las columnas
- [RowResult::getWarnings](#mysql-xdevapi-rowresult.getwarnings) — Devuelve las advertencias de la última operación
- [RowResult::getWarningsCount](#mysql-xdevapi-rowresult.getwarningscount) — Devuelve el número de advertencias de la última operación

# Clase Schema

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\Schema**


     implements
       [mysql_xdevapi\DatabaseObject](#class.mysql-xdevapi-databaseobject) {

    /* Propiedades */

     public
      [$name](#mysql-xdevapi-schema.props.name);


    /* Métodos */

public **createCollection**([string](#language.types.string) $name, [string](#language.types.string) $validate = ?): [mysql_xdevapi\Collection](#class.mysql-xdevapi-collection)
public **dropCollection**([string](#language.types.string) $collection_name): [bool](#language.types.boolean)
public **existsInDatabase**(): [bool](#language.types.boolean)
public **getCollection**([string](#language.types.string) $name): [mysql_xdevapi\Collection](#class.mysql-xdevapi-collection)
public **getCollectionAsTable**([string](#language.types.string) $name): [mysql_xdevapi\Table](#class.mysql-xdevapi-table)
public **getCollections**(): [array](#language.types.array)
public **getName**(): [string](#language.types.string)
public **getSession**(): [mysql_xdevapi\Session](#class.mysql-xdevapi-session)
public **getTable**([string](#language.types.string) $name): [mysql_xdevapi\Table](#class.mysql-xdevapi-table)
public **getTables**(): [array](#language.types.array)

}

## Propiedades

     name






# Schema::\_\_construct

(No version information available, might only be in Git)

Schema::\_\_construct — Constructor de schema

### Descripción

private **mysql_xdevapi\Schema::\_\_construct**()

El objeto Schema proporciona acceso completo al esquema (base de datos).

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Schema::\_\_construct()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS food")-&gt;execute();
$session-&gt;sql("CREATE DATABASE food")-&gt;execute();
$session-&gt;sql("CREATE TABLE food.fruit(name text, rating text)")-&gt;execute();

$schema = $session-&gt;getSchema("food");
$schema-&gt;createCollection("trees");

print_r($schema-&gt;gettables());
print_r($schema-&gt;getcollections());

Resultado del ejemplo anterior es similar a:

Array
(
[fruit] =&gt; mysql_xdevapi\Table Object
(
[name] =&gt; fruit
)
)
Array
(
[trees] =&gt; mysql_xdevapi\Collection Object
(
[name] =&gt; trees
)
)

# Schema::createCollection

(No version information available, might only be in Git)

Schema::createCollection — Añade una colección al esquema

### Descripción

public **mysql_xdevapi\Schema::createCollection**([string](#language.types.string) $name, [string](#language.types.string) $validate = ?): [mysql_xdevapi\Collection](#class.mysql-xdevapi-collection)

Crea una colección en el esquema.

### Parámetros

    name


      El nombre de la colección.






    validate


      La definición de validación, como un objeto JSON.


### Valores devueltos

El objeto Collection.

    ### Historial de cambios





        Versión
        Descripción






        8.0.20

         Adición del argumento opcional validate.






### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Schema::createCollection()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS food")-&gt;execute();
$session-&gt;sql("CREATE DATABASE food")-&gt;execute();
$session-&gt;sql("CREATE TABLE food.fruit(name text, rating text)")-&gt;execute();

$schema = $session-&gt;getSchema("food");
$schema-&gt;createCollection("trees");

print_r($schema-&gt;gettables());
print_r($schema-&gt;getcollections());

Resultado del ejemplo anterior es similar a:

Array
(
[fruit] =&gt; mysql_xdevapi\Table Object
(
[name] =&gt; fruit
)
)
Array
(
[trees] =&gt; mysql_xdevapi\Collection Object
(
[name] =&gt; trees
)
)

    **Ejemplo #2 Ejemplo de mysql_xdevapi\Schema::createCollection()**

&lt;?php
$collection = $schema-&gt;createCollection("mycollection", '{
    "validation": {
        "level": "strict",
        "schema": {
            "id": "http://json-schema.org/geo",
            "description": "A geographical coordinate",
            "type": "object",
            "properties": {
                "latitude": {
                    "type": "number"
                },
                "longitude": {
                    "type": "number"
                }
            },
            "required": ["latitude", "longitude"]
        }
    }
}');
// Éxito
$collection-&gt;add('{"latitude": 10, "longitude": 20}')-&gt;execute();

// Fallo, tipos inválidos (no son números)
$collection-&gt;add('{"latitude": "lat", "longitude": "long"}')-&gt;execute();

# Schema::dropCollection

(No version information available, might only be in Git)

Schema::dropCollection — Elimina una colección del esquema

### Descripción

public **mysql_xdevapi\Schema::dropCollection**([string](#language.types.string) $collection_name): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    collection_name





### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Schema::dropCollection()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS food")-&gt;execute();
$session-&gt;sql("CREATE DATABASE food")-&gt;execute();
$session-&gt;sql("CREATE TABLE food.fruit(name text, rating text)")-&gt;execute();

$schema = $session-&gt;getSchema("food");

$schema-&gt;createCollection("trees");
$schema-&gt;dropCollection("trees");
$schema-&gt;createCollection("buildings");

print_r($schema-&gt;gettables());
print_r($schema-&gt;getcollections());

Resultado del ejemplo anterior es similar a:

Array
(
[fruit] =&gt; mysql_xdevapi\Table Object
(
[name] =&gt; fruit
)
)
Array
(
[buildings] =&gt; mysql_xdevapi\Collection Object
(
[name] =&gt; buildings
)
)

# Schema::existsInDatabase

(No version information available, might only be in Git)

Schema::existsInDatabase — Verifica si el objeto existe en la base de datos

### Descripción

public **mysql_xdevapi\Schema::existsInDatabase**(): [bool](#language.types.boolean)

Verifica si el objeto actual (esquema, tabla, colección o vista) existe
en el objeto esquema.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el esquema, la tabla, la colección o la vista aún existe en el esquema, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Schema::existsInDatabase()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS food")-&gt;execute();
$session-&gt;sql("CREATE DATABASE food")-&gt;execute();
$session-&gt;sql("CREATE TABLE food.fruit(name text, rating text)")-&gt;execute();

$schema = $session-&gt;getSchema("food");
$schema-&gt;createCollection("trees");

// ...

$trees = $schema-&gt;getCollection("trees");

// ...

// ¿Esta colección aún está en la base de datos (esquema)?
if ($trees-&gt;existsInDatabase()) {
echo "Yes, the 'trees' collection is still present.";
}

Resultado del ejemplo anterior es similar a:

Yes, the 'trees' collection is still present.

# Schema::getCollection

(No version information available, might only be in Git)

Schema::getCollection — Devuelve una colección del esquema

### Descripción

public **mysql_xdevapi\Schema::getCollection**([string](#language.types.string) $name): [mysql_xdevapi\Collection](#class.mysql-xdevapi-collection)

Devuelve una colección del esquema.

### Parámetros

    name


      El nombre de la colección a recuperar.


### Valores devueltos

El objeto Collection para la colección seleccionada.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Schema::getCollection()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS food")-&gt;execute();
$session-&gt;sql("CREATE DATABASE food")-&gt;execute();

$schema = $session-&gt;getSchema("food");
$schema-&gt;createCollection("trees");

// ...

$trees = $schema-&gt;getCollection("trees");

var_dump($trees);

Resultado del ejemplo anterior es similar a:

object(mysql_xdevapi\Collection)#3 (1) {
["name"]=&gt;
string(5) "trees"
}

# Schema::getCollectionAsTable

(No version information available, might only be in Git)

Schema::getCollectionAsTable — Devuelve una colección como objeto Table

### Descripción

public **mysql_xdevapi\Schema::getCollectionAsTable**([string](#language.types.string) $name): [mysql_xdevapi\Table](#class.mysql-xdevapi-table)

Devuelve una colección, pero como objeto Table en lugar de un objeto Collection.

### Parámetros

    name


      El nombre de la colección a partir de la cual instanciar un objeto Table.


### Valores devueltos

Un objeto [mysql_xdevapi\Table](#class.mysql-xdevapi-table) para la colección.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Schema::getCollectionAsTable()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema  = $session-&gt;getSchema("addressbook");
$collect = $schema-&gt;createCollection("people");
$collect-&gt;add('{"name": "Fred", "age": 21, "job": "Construction"}')-&gt;execute();
$collect-&gt;add('{"name": "Wilma", "age": 23, "job": "Teacher"}')-&gt;execute();

$table      = $schema-&gt;getCollectionAsTable("people");
$collection = $schema-&gt;getCollection("people");

var_dump($table);
var_dump($collection);

Resultado del ejemplo anterior es similar a:

object(mysql_xdevapi\Table)#4 (1) {
["name"]=&gt;
string(6) "people"
}

object(mysql_xdevapi\Collection)#5 (1) {
["name"]=&gt;
string(6) "people"
}

# Schema::getCollections

(No version information available, might only be in Git)

Schema::getCollections — Devuelve todas las colecciones del esquema

### Descripción

public **mysql_xdevapi\Schema::getCollections**(): [array](#language.types.array)

Recupera una lista de colecciones para este esquema.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de todas las colecciones de este esquema, donde cada elemento del array
es una Collection con el nombre de la colección como clave.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Schema::getCollections()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema  = $session-&gt;getSchema("addressbook");
$collect = $schema-&gt;createCollection("people");
$collect-&gt;add('{"name": "Fred", "age": 21, "job": "Construction"}')-&gt;execute();
$collect-&gt;add('{"name": "Wilma", "age": 23, "job": "Teacher"}')-&gt;execute();

$collections = $schema-&gt;getCollections();
var_dump($collections);
?&gt;

Resultado del ejemplo anterior es similar a:

array(1) {
["people"]=&gt;
object(mysql_xdevapi\Collection)#4 (1) {
["name"]=&gt;
string(6) "people"
}
}

# Schema::getName

(No version information available, might only be in Git)

Schema::getName — Devuelve el nombre del esquema

### Descripción

public **mysql_xdevapi\Schema::getName**(): [string](#language.types.string)

Devuelve el nombre del esquema.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre del esquema conectado al objeto esquema, en forma de string.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Schema::getName()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");

// ...

var_dump($schema-&gt;getName());
?&gt;

Resultado del ejemplo anterior es similar a:

string(11) "addressbook"

# Schema::getSession

(No version information available, might only be in Git)

Schema::getSession — Devuelve la sesión del esquema

### Descripción

public **mysql_xdevapi\Schema::getSession**(): [mysql_xdevapi\Session](#class.mysql-xdevapi-session)

Devuelve un nuevo objeto Session a partir del objeto Schema.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto Session.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Schema::getSession()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");

// ...

$newsession = $schema-&gt;getSession();

var_dump($session);
var_dump($newsession);
?&gt;

Resultado del ejemplo anterior es similar a:

object(mysql_xdevapi\Session)#1 (0) {
}

object(mysql_xdevapi\Session)#3 (0) {
}

# Schema::getTable

(No version information available, might only be in Git)

Schema::getTable — Devuelve la tabla del esquema

### Descripción

public **mysql_xdevapi\Schema::getTable**([string](#language.types.string) $name): [mysql_xdevapi\Table](#class.mysql-xdevapi-table)

Recupera un objeto Table para la tabla proporcionada en el esquema.

### Parámetros

    name


      El nombre de la tabla.


### Valores devueltos

Un objeto table.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Schema::getTable()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$row = $table-&gt;select('name', 'age')-&gt;execute()-&gt;fetchAll();

print_r($row);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[name] =&gt; John
[age] =&gt; 42
)
[1] =&gt; Array
(
[name] =&gt; Sam
[age] =&gt; 33
)
)

# Schema::getTables

(No version information available, might only be in Git)

Schema::getTables — Devuelve las tablas del esquema

### Descripción

public **mysql_xdevapi\Schema::getTables**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de todas las tablas de este esquema, donde cada elemento del array
es un objeto Table con el nombre de la tabla como clave.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Schema::getTables()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();

$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$session-&gt;sql("CREATE TABLE addressbook.cities(name text, population int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('Portland', 639863), ('Seattle', 704352)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$tables = $schema-&gt;getTables();

var_dump($tables);
?&gt;

Resultado del ejemplo anterior es similar a:

array(2) {
["cities"]=&gt;
object(mysql_xdevapi\Table)#3 (1) {
["name"]=&gt;
string(6) "cities"
}

["names"]=&gt;
object(mysql_xdevapi\Table)#4 (1) {
["name"]=&gt;
string(5) "names"
}
}

## Tabla de contenidos

- [Schema::\_\_construct](#mysql-xdevapi-schema.construct) — Constructor de schema
- [Schema::createCollection](#mysql-xdevapi-schema.createcollection) — Añade una colección al esquema
- [Schema::dropCollection](#mysql-xdevapi-schema.dropcollection) — Elimina una colección del esquema
- [Schema::existsInDatabase](#mysql-xdevapi-schema.existsindatabase) — Verifica si el objeto existe en la base de datos
- [Schema::getCollection](#mysql-xdevapi-schema.getcollection) — Devuelve una colección del esquema
- [Schema::getCollectionAsTable](#mysql-xdevapi-schema.getcollectionastable) — Devuelve una colección como objeto Table
- [Schema::getCollections](#mysql-xdevapi-schema.getcollections) — Devuelve todas las colecciones del esquema
- [Schema::getName](#mysql-xdevapi-schema.getname) — Devuelve el nombre del esquema
- [Schema::getSession](#mysql-xdevapi-schema.getsession) — Devuelve la sesión del esquema
- [Schema::getTable](#mysql-xdevapi-schema.gettable) — Devuelve la tabla del esquema
- [Schema::getTables](#mysql-xdevapi-schema.gettables) — Devuelve las tablas del esquema

# Interfaz SchemaObject

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\SchemaObject**


     implements
       [mysql_xdevapi\DatabaseObject](#class.mysql-xdevapi-databaseobject) {


    /* Métodos */

abstract **getSchema**(): [mysql_xdevapi\Schema](#class.mysql-xdevapi-schema)

}

# SchemaObject::getSchema

(No version information available, might only be in Git)

SchemaObject::getSchema — Devuelve el objeto esquema

### Descripción

abstract **mysql_xdevapi\SchemaObject::getSchema**(): [mysql_xdevapi\Schema](#class.mysql-xdevapi-schema)

Utilizado por otros objetos para recuperar un objeto esquema.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El objeto esquema actual.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::getSchema()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$schema = $session-&gt;getSchema("addressbook");

print_r($schema);

Resultado del ejemplo anterior es similar a:

mysql_xdevapi\Schema Object
(
[name] =&gt; addressbook
)

## Tabla de contenidos

- [SchemaObject::getSchema](#mysql-xdevapi-schemaobject.getschema) — Devuelve el objeto esquema

# Clase Session

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\Session**

     {


    /* Métodos */

public **close**(): [bool](#language.types.boolean)
public **commit**(): [Object](#language.types.object)
public **createSchema**([string](#language.types.string) $schema_name): [mysql_xdevapi\Schema](#class.mysql-xdevapi-schema)
public **dropSchema**([string](#language.types.string) $schema_name): [bool](#language.types.boolean)
public **generateUUID**(): [string](#language.types.string)
public **getDefaultSchema**(): [?](#language.types.null)[mysql_xdevapi\Schema](#class.mysql-xdevapi-schema)
public **getSchema**([string](#language.types.string) $schema_name): [mysql_xdevapi\Schema](#class.mysql-xdevapi-schema)
public **getSchemas**(): [array](#language.types.array)
public **getServerVersion**(): [int](#language.types.integer)
public **listClients**(): [array](#language.types.array)
public **quoteName**([string](#language.types.string) $name): [string](#language.types.string)
public **releaseSavepoint**([string](#language.types.string) $name): [void](language.types.void.html)
public **rollback**(): [void](language.types.void.html)
public **rollbackTo**([string](#language.types.string) $name): [void](language.types.void.html)
public **setSavepoint**([string](#language.types.string) $name = ?): [string](#language.types.string)
public **sql**([string](#language.types.string) $query): [mysql_xdevapi\SqlStatement](#class.mysql-xdevapi-sqlstatement)
public **startTransaction**(): [void](language.types.void.html)

}

# Session::close

(No version information available, might only be in Git)

Session::close — Cierra la sesión

### Descripción

public **mysql_xdevapi\Session::close**(): [bool](#language.types.boolean)

Cierra la sesión con el servidor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la sesión ha sido cerrada.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::close()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$session-&gt;close();

# Session::commit

(PHP 4 &gt;= 4.4.0, PHP 5, PHP 7, PHP 8)

Session::commit — Valida la transacción

### Descripción

public **mysql_xdevapi\Session::commit**(): [Object](#language.types.object)

Valida la transacción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto SqlStatementResult.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::commit()**

&lt;?php
$session    = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$collection = $session-&gt;getSchema("addressbook")-&gt;getCollection("friends");

$session-&gt;startTransaction();

$collection-&gt;add('{"John":42, "Sam":33}')-&gt;execute();
$savepoint = $session-&gt;setSavepoint();

$session-&gt;commit();
$session-&gt;close();

# Session::\_\_construct

(No version information available, might only be in Git)

Session::\_\_construct — Descripción del constructor

### Descripción

private **mysql_xdevapi\Session::\_\_construct**()

Un objeto Session, tal como iniciado por getSession().

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::\_\_construct()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;close();
?&gt;

# Session::createSchema

(No version information available, might only be in Git)

Session::createSchema — Crear un nuevo esquema

### Descripción

public **mysql_xdevapi\Session::createSchema**([string](#language.types.string) $schema_name): [mysql_xdevapi\Schema](#class.mysql-xdevapi-schema)

    Crear un nuevo esquema.

### Parámetros

    schema_name


      El nombre del esquema a crear.


### Valores devueltos

Un objeto Schema en caso de éxito, y lanza una excepción en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::createSchema()**

&lt;?php
$uri  = 'mysqlx://happyuser:password@127.0.0.1:33060/';
$sess = mysql_xdevapi\getSession($uri);

try {

    if ($schema = $sess-&gt;createSchema('fruit')) {
        echo "Info: I created a schema named 'fruit'\n";
    }

} catch (Exception $e) {

echo $e-&gt;getMessage();

}
?&gt;

Resultado del ejemplo anterior es similar a:

Info: I created a schema named 'fruit'

# Session::dropSchema

(No version information available, might only be in Git)

Session::dropSchema — Elimina un esquema

### Descripción

public **mysql_xdevapi\Session::dropSchema**([string](#language.types.string) $schema_name): [bool](#language.types.boolean)

Elimina un esquema (base de datos).

### Parámetros

    schema_name


      El nombre del esquema a eliminar.


### Valores devueltos

**[true](#constant.true)** si el esquema es eliminado, o **[false](#constant.false)** si no existe
o no puede ser eliminado.

Un nivel de error **[E_WARNING](#constant.e-warning)** es generado si el
esquema no existe.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::dropSchema()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;dropSchema("addressbook");

$session-&gt;close();
?&gt;

# Session::generateUUID

(No version information available, might only be in Git)

Session::generateUUID — Devuelve un nuevo UUID

### Descripción

public **mysql_xdevapi\Session::generateUUID**(): [string](#language.types.string)

Genera un identificador único universal (Universal Unique IDentifier - UUID) generado según la
[» RFC 4122](https://datatracker.ietf.org/doc/html/rfc4122).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El UUID; una cadena de 32 caracteres.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::generateUuid()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$uuid = $session-&gt;generateUuid();

var_dump($uuid);

Resultado del ejemplo anterior es similar a:

string(32) "484B18AC7980F8D4FE84613CDA5EE84B"

# Session::getDefaultSchema

(No version information available, might only be in Git)

Session::getDefaultSchema — Devuelve el nombre del esquema predeterminado

### Descripción

public **mysql_xdevapi\Session::getDefaultSchema**(): [?](#language.types.null)[mysql_xdevapi\Schema](#class.mysql-xdevapi-schema)

Recupera el esquema por defecto que se suele establecer en el URI de conexión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El esquema por defecto definido por la conexión, o **[null](#constant.null)** si no se ha establecido ninguno.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::getSchema()**

&lt;?php
$uri = "mysqlx://testuser:testpasswd@localhost:33160/testx?ssl-mode=disabled";
$session = mysql_xdevapi\getSession($uri);

$schema = $session-&gt;getDefaultSchema();
echo $schema-&gt;getName();
?&gt;

El ejemplo anterior mostrará:

testx

# Session::getSchema

(No version information available, might only be in Git)

Session::getSchema — Devuelve un nuevo objeto esquema

### Descripción

public **mysql_xdevapi\Session::getSchema**([string](#language.types.string) $schema_name): [mysql_xdevapi\Schema](#class.mysql-xdevapi-schema)

Un nuevo objeto Schema para el nombre de esquema proporcionado.

### Parámetros

    schema_name


      El nombre del esquema (base de datos) para el cual se obtiene un objeto Schema.


### Valores devueltos

Un objeto Schema.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::getSchema()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$schema = $session-&gt;getSchema("addressbook");

print_r($schema);

Resultado del ejemplo anterior es similar a:

mysql_xdevapi\Schema Object
(
[name] =&gt; addressbook
)

# Session::getSchemas

(No version information available, might only be in Git)

Session::getSchemas — Devuelve los esquemas

### Descripción

public **mysql_xdevapi\Session::getSchemas**(): [array](#language.types.array)

Obtiene los objetos esquema para todos los esquemas disponibles para la sesión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array que contiene objetos que representan todos los esquemas
disponibles para la sesión.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::getSchemas()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$schemas = $session-&gt;getSchemas();

print_r($schemas);

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; mysql_xdevapi\Schema Object
(
[name] =&gt; addressbook
)
[1] =&gt; mysql_xdevapi\Schema Object
(
[name] =&gt; information_schema
)
...

# Session::getServerVersion

(No version information available, might only be in Git)

Session::getServerVersion — Devuelve la versión del servidor

### Descripción

public **mysql_xdevapi\Session::getServerVersion**(): [int](#language.types.integer)

Devuelve la versión del servidor MySQL para la sesión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La versión del servidor MySQL para la sesión, en forma de entero como "80012".

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::getServerVersion()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$version = $session-&gt;getServerVersion();

var_dump($version);

Resultado del ejemplo anterior es similar a:

int(80012)

# Session::listClients

(No version information available, might only be in Git)

Session::listClients — Devuelve la lista de clientes

### Descripción

public **mysql_xdevapi\Session::listClients**(): [array](#language.types.array)

Devuelve la lista de conexiones de clientes al servidor MySQL de la sesión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array que contiene los clientes actualmente conectados. Los elementos
del array son "client_id", "user", "host" y "sql_session".

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::listClients()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$ids = $session-&gt;listClients();

var_dump($ids);
?&gt;

Resultado del ejemplo anterior es similar a:

array(1) {
[0]=&gt;
array(4) {
["client_id"]=&gt;
int(61)
["user"]=&gt;
string(4) "root"
["host"]=&gt;
string(9) "localhost"
["sql_session"]=&gt;
int(72)
}
}

# Session::quoteName

(No version information available, might only be in Git)

Session::quoteName — Añade comillas

### Descripción

public **mysql_xdevapi\Session::quoteName**([string](#language.types.string) $name): [string](#language.types.string)

Una función que pone entre comillas para escapar los nombres e identificadores SQL. Es capaz de
escapar el identificador dado conforme a los parámetros de la conexión actual. Esta función
de escape no debe ser utilizada para escapar valores.

### Parámetros

    name


      La cadena a poner entre comillas.


### Valores devueltos

La cadena puesta entre comillas.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::quoteName()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$first = "MySQL's test";
var_dump($first);
var_dump($session-&gt;quoteName($first));

$second = 'Another `test` "like" `this`';
var_dump($second);
var_dump($session-&gt;quoteName($second));
?&gt;

Resultado del ejemplo anterior es similar a:

string(12) "MySQL's test"
string(14) "`MySQL's test`"

string(28) "Another `test` "like" `this`"
string(34) "`Another `test` "like" ``this```"

# Session::releaseSavepoint

(No version information available, might only be in Git)

Session::releaseSavepoint — Libera el punto de salvaguarda

### Descripción

public **mysql_xdevapi\Session::releaseSavepoint**([string](#language.types.string) $name): [void](language.types.void.html)

Libera un punto de salvaguarda previamente definido.

### Parámetros

    name


      El nombre del punto de salvaguarda a liberar.


### Valores devueltos

Un objeto SqlStatementResult.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::releaseSavepoint()**

&lt;?php
$session    = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$collection = $session-&gt;getSchema("addressbook")-&gt;getCollection("friends");

$session-&gt;startTransaction();
$collection-&gt;add( '{"test1":1, "test2":2}' )-&gt;execute();

$savepoint = $session-&gt;setSavepoint();

$collection-&gt;add( '{"test3":3, "test4":4}' )-&gt;execute();

$session-&gt;releaseSavepoint($savepoint);
$session-&gt;rollback();
?&gt;

# Session::rollback

(No version information available, might only be in Git)

Session::rollback — Revierte la transacción

### Descripción

public **mysql_xdevapi\Session::rollback**(): [void](language.types.void.html)

Revierte la transacción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto SqlStatementResult.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::rollback()**

&lt;?php
$session    = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$collection = $session-&gt;getSchema("addressbook")-&gt;getCollection("names");

$session-&gt;startTransaction();
$collection-&gt;add( '{"test1":1, "test2":2}' )-&gt;execute();

$savepoint = $session-&gt;setSavepoint();

$collection-&gt;add( '{"test3":3, "test4":4}' )-&gt;execute();

$session-&gt;releaseSavepoint($savepoint);
$session-&gt;rollback();
?&gt;

# Session::rollbackTo

(No version information available, might only be in Git)

Session::rollbackTo — Anula la transacción hasta el punto de salvaguarda

### Descripción

public **mysql_xdevapi\Session::rollbackTo**([string](#language.types.string) $name): [void](language.types.void.html)

Anula la transacción hasta el punto de salvaguarda.

### Parámetros

    name


      El nombre del punto de salvaguarda hasta el cual anular; no sensible a mayúsculas y minúsculas.


### Valores devueltos

Un objeto SqlStatementResult.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::rollbackTo()**

&lt;?php
$session    = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$collection = $session-&gt;getSchema("addressbook")-&gt;getCollection("names");

$session-&gt;startTransaction();
$collection-&gt;add( '{"test1":1, "test2":2}' )-&gt;execute();

$savepoint1 = $session-&gt;setSavepoint();

$collection-&gt;add( '{"test3":3, "test4":4}' )-&gt;execute();

$savepoint2 = $session-&gt;setSavepoint();

$session-&gt;rollbackTo($savepoint1);
?&gt;

# Session::setSavepoint

(No version information available, might only be in Git)

Session::setSavepoint — Crear un punto de salvaguarda

### Descripción

public **mysql_xdevapi\Session::setSavepoint**([string](#language.types.string) $name = ?): [string](#language.types.string)

Crear un nuevo punto de salvaguarda para la transacción.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    name


      El nombre del punto de salvaguarda. El nombre se genera automáticamente si el argumento opcional name
      no está definido como 'SAVEPOINT1', 'SAVEPOINT2', etc.


### Valores devueltos

El nombre del punto de salvaguarda.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::setSavepoint()**

&lt;?php
$session    = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$collection = $session-&gt;getSchema("addressbook")-&gt;getCollection("names");

$session-&gt;startTransaction();
$collection-&gt;add( '{"test1":1, "test2":2}' )-&gt;execute();

$savepoint = $session-&gt;setSavepoint();

$collection-&gt;add( '{"test3":3, "test4":4}' )-&gt;execute();

$session-&gt;releaseSavepoint($savepoint);
$session-&gt;rollback();
?&gt;

# Session::sql

(No version information available, might only be in Git)

Session::sql — Crear una consulta SQL

### Descripción

public **mysql_xdevapi\Session::sql**([string](#language.types.string) $query): [mysql_xdevapi\SqlStatement](#class.mysql-xdevapi-sqlstatement)

Crear una declaración SQL nativa. Los espacios reservados son compatibles utilizando la sintaxis nativa "?".
Utilizar el método execute para ejecutar la declaración SQL.

### Parámetros

    query


      La declaración SQL a ejecutar.


### Valores devueltos

Un objeto SqlStatement.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::sql()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
?&gt;

# Session::startTransaction

(No version information available, might only be in Git)

Session::startTransaction — Inicia una transacción

### Descripción

public **mysql_xdevapi\Session::startTransaction**(): [void](language.types.void.html)

Inicia una nueva transacción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto SqlStatementResult.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Session::startTransaction()**

&lt;?php
$session    = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$collection = $session-&gt;getSchema("addressbook")-&gt;getCollection("friends");

$session-&gt;startTransaction();
$collection-&gt;add( '{"test1":1, "test2":2}' )-&gt;execute();

$savepoint = $session-&gt;setSavepoint();

$collection-&gt;add( '{"test3":3, "test4":4}' )-&gt;execute();

$session-&gt;releaseSavepoint($savepoint);
$session-&gt;rollback();
?&gt;

## Tabla de contenidos

- [Session::close](#mysql-xdevapi-session.close) — Cierra la sesión
- [Session::commit](#mysql-xdevapi-session.commit) — Valida la transacción
- [Session::\_\_construct](#mysql-xdevapi-session.construct) — Descripción del constructor
- [Session::createSchema](#mysql-xdevapi-session.createschema) — Crear un nuevo esquema
- [Session::dropSchema](#mysql-xdevapi-session.dropschema) — Elimina un esquema
- [Session::generateUUID](#mysql-xdevapi-session.generateuuid) — Devuelve un nuevo UUID
- [Session::getDefaultSchema](#mysql-xdevapi-session.getdefaultschema) — Devuelve el nombre del esquema predeterminado
- [Session::getSchema](#mysql-xdevapi-session.getschema) — Devuelve un nuevo objeto esquema
- [Session::getSchemas](#mysql-xdevapi-session.getschemas) — Devuelve los esquemas
- [Session::getServerVersion](#mysql-xdevapi-session.getserverversion) — Devuelve la versión del servidor
- [Session::listClients](#mysql-xdevapi-session.listclients) — Devuelve la lista de clientes
- [Session::quoteName](#mysql-xdevapi-session.quotename) — Añade comillas
- [Session::releaseSavepoint](#mysql-xdevapi-session.releasesavepoint) — Libera el punto de salvaguarda
- [Session::rollback](#mysql-xdevapi-session.rollback) — Revierte la transacción
- [Session::rollbackTo](#mysql-xdevapi-session.rollbackto) — Anula la transacción hasta el punto de salvaguarda
- [Session::setSavepoint](#mysql-xdevapi-session.setsavepoint) — Crear un punto de salvaguarda
- [Session::sql](#mysql-xdevapi-session.sql) — Crear una consulta SQL
- [Session::startTransaction](#mysql-xdevapi-session.starttransaction) — Inicia una transacción

# Clase SqlStatement

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\SqlStatement**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [EXECUTE_ASYNC](#mysql-xdevapi-sqlstatement.constants.execute-async) = 1;

    const
     [int](#language.types.integer)
      [BUFFERED](#mysql-xdevapi-sqlstatement.constants.buffered) = 2;


    /* Propiedades */
    public
      [$statement](#mysql-xdevapi-sqlstatement.props.statement);


    /* Métodos */

public **bind**([string](#language.types.string) $param): [mysql_xdevapi\SqlStatement](#class.mysql-xdevapi-sqlstatement)
public **execute**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)
public **getNextResult**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)
public **getResult**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)
public **hasMoreResults**(): [bool](#language.types.boolean)

}

## Propiedades

     statement






## Constantes predefinidas

     **[mysql_xdevapi\SqlStatement::EXECUTE_ASYNC](#mysql-xdevapi-sqlstatement.constants.execute-async)**








     **[mysql_xdevapi\SqlStatement::BUFFERED](#mysql-xdevapi-sqlstatement.constants.buffered)**






# SqlStatement::bind

(No version information available, might only be in Git)

SqlStatement::bind — Liga los argumentos de la instrucción

### Descripción

public **mysql_xdevapi\SqlStatement::bind**([string](#language.types.string) $param): [mysql_xdevapi\SqlStatement](#class.mysql-xdevapi-sqlstatement)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    param





### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatement::bind()**

&lt;?php

/_ ... _/

?&gt;

# SqlStatement::\_\_construct

(No version information available, might only be in Git)

SqlStatement::\_\_construct — Descripción del constructor

### Descripción

private **mysql_xdevapi\SqlStatement::\_\_construct**()

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatement::\_\_construct()**

&lt;?php

/_ ... _/

?&gt;

# SqlStatement::execute

(No version information available, might only be in Git)

SqlStatement::execute — Ejecuta la operación

### Descripción

public **mysql_xdevapi\SqlStatement::execute**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatement::execute()**

&lt;?php

/_ ... _/

?&gt;

# SqlStatement::getNextResult

(No version information available, might only be in Git)

SqlStatement::getNextResult — Devuelve el resultado siguiente

### Descripción

public **mysql_xdevapi\SqlStatement::getNextResult**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatement::getNextResult()**

&lt;?php

/_ ... _/

?&gt;

# SqlStatement::getResult

(No version information available, might only be in Git)

SqlStatement::getResult — Devuelve el resultado

### Descripción

public **mysql_xdevapi\SqlStatement::getResult**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatement::getResult()**

&lt;?php

/_ ... _/

?&gt;

# SqlStatement::hasMoreResults

(No version information available, might only be in Git)

SqlStatement::hasMoreResults — Verifica si hay más resultados

### Descripción

public **mysql_xdevapi\SqlStatement::hasMoreResults**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si quedan objetos por recuperar en el conjunto de resultados.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatement::hasMoreResults()**

&lt;?php

/_ ... _/

?&gt;

## Tabla de contenidos

- [SqlStatement::bind](#mysql-xdevapi-sqlstatement.bind) — Liga los argumentos de la instrucción
- [SqlStatement::\_\_construct](#mysql-xdevapi-sqlstatement.construct) — Descripción del constructor
- [SqlStatement::execute](#mysql-xdevapi-sqlstatement.execute) — Ejecuta la operación
- [SqlStatement::getNextResult](#mysql-xdevapi-sqlstatement.getnextresult) — Devuelve el resultado siguiente
- [SqlStatement::getResult](#mysql-xdevapi-sqlstatement.getresult) — Devuelve el resultado
- [SqlStatement::hasMoreResults](#mysql-xdevapi-sqlstatement.hasmoreresults) — Verifica si hay más resultados

# Clase SqlStatementResult

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\SqlStatementResult**


     implements
       [mysql_xdevapi\BaseResult](#class.mysql-xdevapi-baseresult),  [Traversable](#class.traversable) {


    /* Métodos */

public **fetchAll**(): [array](#language.types.array)
public **fetchOne**(): [array](#language.types.array)
public **getAffectedItemsCount**(): [int](#language.types.integer)
public **getColumnsCount**(): [int](#language.types.integer)
public **getColumnNames**(): [array](#language.types.array)
public **getColumns**(): [Array](#language.types.array)
public **getGeneratedIds**(): [array](#language.types.array)
public **getLastInsertId**(): [String](#language.types.string)
public **getWarnings**(): [array](#language.types.array)
public **getWarningCounts**(): [int](#language.types.integer)
public **hasData**(): [bool](#language.types.boolean)
public **nextResult**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

}

# SqlStatementResult::\_\_construct

(No version information available, might only be in Git)

SqlStatementResult::\_\_construct — Descripción del constructor

### Descripción

private **mysql_xdevapi\SqlStatementResult::\_\_construct**()

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatementResult::\_\_construct()**

&lt;?php

/_ ... _/

?&gt;

# SqlStatementResult::fetchAll

(No version information available, might only be in Git)

SqlStatementResult::fetchAll — Devuelve todas las filas del resultado

### Descripción

public **mysql_xdevapi\SqlStatementResult::fetchAll**(): [array](#language.types.array)

Recupera todas las filas del conjunto de resultados.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array numérico con todos los resultados de la consulta; cada resultado es
un array asociativo. Se devuelve un array vacío si no hay
filas presentes.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatementResult::fetchAll()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS dbtest")-&gt;execute();
$session-&gt;sql("CREATE DATABASE dbtest")-&gt;execute();
$session-&gt;sql("CREATE TABLE dbtest.workers(name text, age int, job text)")-&gt;execute();
$session-&gt;sql("INSERT INTO dbtest.workers values ('John', 42, 'bricklayer'), ('Sam', 33, 'carpenter')")-&gt;execute();

$schema = $session-&gt;getSchema("dbtest");
$table = $schema-&gt;getTable("workers");

$rows = $session-&gt;sql("SELECT \* FROM dbtest.workers")-&gt;execute()-&gt;fetchAll();

print_r($rows);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[name] =&gt; John
[age] =&gt; 42
)
[1] =&gt; Array
(
[name] =&gt; Sam
[age] =&gt; 33
)
)

# SqlStatementResult::fetchOne

(No version information available, might only be in Git)

SqlStatementResult::fetchOne — Devuelve una sola línea

### Descripción

public **mysql_xdevapi\SqlStatementResult::fetchOne**(): [array](#language.types.array)

Recupera una sola línea del conjunto de resultados.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El resultado, en forma de array asociativo. En caso de ausencia de
resultado, null será devuelto.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatementResult::fetchOne()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");
$session-&gt;sql("DROP DATABASE IF EXISTS dbtest")-&gt;execute();
$session-&gt;sql("CREATE DATABASE dbtest")-&gt;execute();
$session-&gt;sql("CREATE TABLE dbtest.workers(name text, age int, job text)")-&gt;execute();
$session-&gt;sql("INSERT INTO dbtest.workers values ('John', 42, 'bricklayer'), ('Sam', 33, 'carpenter')")-&gt;execute();

$schema = $session-&gt;getSchema("dbtest");
$table = $schema-&gt;getTable("workers");

$rows = $session-&gt;sql("SELECT \* FROM dbtest.workers")-&gt;execute()-&gt;fetchOne();

print_r($rows);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[name] =&gt; John
[age] =&gt; 42
[job] =&gt; bricklayer
)

# SqlStatementResult::getAffectedItemsCount

(No version information available, might only be in Git)

SqlStatementResult::getAffectedItemsCount — Devuelve el número de filas afectadas

### Descripción

public **mysql_xdevapi\SqlStatementResult::getAffectedItemsCount**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatementResult::getAffectedItemsCount()**

&lt;?php

/_ ... _/

?&gt;

# SqlStatementResult::getColumnsCount

(No version information available, might only be in Git)

SqlStatementResult::getColumnsCount — Devuelve el número de columnas

### Descripción

public **mysql_xdevapi\SqlStatementResult::getColumnsCount**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de columnas; 0 si no hay ninguna.

### Historial de cambios

      Versión
      Descripción






      8.0.14

       El método fue renombrado de getColumnCount() a getColumnsCount().



### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatementResult::getColumnsCount()**

&lt;?php

/_ ... _/

?&gt;

# SqlStatementResult::getColumnNames

(No version information available, might only be in Git)

SqlStatementResult::getColumnNames — Devuelve el nombre de las columnas

### Descripción

public **mysql_xdevapi\SqlStatementResult::getColumnNames**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatementResult::getColumnNames()**

&lt;?php

/_ ... _/

?&gt;

# SqlStatementResult::getColumns

(No version information available, might only be in Git)

SqlStatementResult::getColumns — Devuelve las columnas

### Descripción

public **mysql_xdevapi\SqlStatementResult::getColumns**(): [Array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatementResult::getColumns()**

&lt;?php

/_ ... _/

?&gt;

# SqlStatementResult::getGeneratedIds

(No version information available, might only be in Git)

SqlStatementResult::getGeneratedIds — Devuelve los identificadores generados

### Descripción

public **mysql_xdevapi\SqlStatementResult::getGeneratedIds**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de identificadores generados a partir de la última operación,
o un array vacío si no hay ninguno.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatementResult::getGeneratedIds()**

&lt;?php

/_ ... _/

?&gt;

# SqlStatementResult::getLastInsertId

(No version information available, might only be in Git)

SqlStatementResult::getLastInsertId — Devuelve el ID de la última inserción

### Descripción

public **mysql_xdevapi\SqlStatementResult::getLastInsertId**(): [String](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El ID de la última operación de inserción.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatementResult::getLastInsertId()**

&lt;?php

/_ ... _/

?&gt;

# SqlStatementResult::getWarnings

(No version information available, might only be in Git)

SqlStatementResult::getWarnings — Devuelve las advertencias de la última operación

### Descripción

public **mysql_xdevapi\SqlStatementResult::getWarnings**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de objetos Warning de la última operación. Cada objeto
define un 'message' de error, un 'nivel' de error y un
'code' de error. Un array vacío es devuelto si no hay errores.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatementResult::getWarnings()**

&lt;?php

/_ ... _/

?&gt;

# SqlStatementResult::getWarningsCount

(No version information available, might only be in Git)

SqlStatementResult::getWarningsCount — Devuelve el número de advertencias de la última operación

### Descripción

public **mysql_xdevapi\SqlStatementResult::getWarningCounts**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de advertencias generadas durante la última operación CRUD.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatementResult::getWarningsCount()**

&lt;?php

/_ ... _/

?&gt;

# SqlStatementResult::hasData

(No version information available, might only be in Git)

SqlStatementResult::hasData — Verifica si el resultado contiene datos

### Descripción

public **mysql_xdevapi\SqlStatementResult::hasData**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si el resultado contiene datos.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatementResult::hasData()**

&lt;?php

/_ ... _/

?&gt;

# SqlStatementResult::nextResult

(No version information available, might only be in Git)

SqlStatementResult::nextResult — Devuelve el resultado siguiente

### Descripción

public **mysql_xdevapi\SqlStatementResult::nextResult**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El objeto Result siguiente del conjunto de resultados.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\SqlStatementResult::nextResult()**

&lt;?php

/_ ... _/

?&gt;

## Tabla de contenidos

- [SqlStatementResult::\_\_construct](#mysql-xdevapi-sqlstatementresult.construct) — Descripción del constructor
- [SqlStatementResult::fetchAll](#mysql-xdevapi-sqlstatementresult.fetchall) — Devuelve todas las filas del resultado
- [SqlStatementResult::fetchOne](#mysql-xdevapi-sqlstatementresult.fetchone) — Devuelve una sola línea
- [SqlStatementResult::getAffectedItemsCount](#mysql-xdevapi-sqlstatementresult.getaffecteditemscount) — Devuelve el número de filas afectadas
- [SqlStatementResult::getColumnsCount](#mysql-xdevapi-sqlstatementresult.getcolumncount) — Devuelve el número de columnas
- [SqlStatementResult::getColumnNames](#mysql-xdevapi-sqlstatementresult.getcolumnnames) — Devuelve el nombre de las columnas
- [SqlStatementResult::getColumns](#mysql-xdevapi-sqlstatementresult.getcolumns) — Devuelve las columnas
- [SqlStatementResult::getGeneratedIds](#mysql-xdevapi-sqlstatementresult.getgeneratedids) — Devuelve los identificadores generados
- [SqlStatementResult::getLastInsertId](#mysql-xdevapi-sqlstatementresult.getlastinsertid) — Devuelve el ID de la última inserción
- [SqlStatementResult::getWarnings](#mysql-xdevapi-sqlstatementresult.getwarnings) — Devuelve las advertencias de la última operación
- [SqlStatementResult::getWarningsCount](#mysql-xdevapi-sqlstatementresult.getwarningcount) — Devuelve el número de advertencias de la última operación
- [SqlStatementResult::hasData](#mysql-xdevapi-sqlstatementresult.hasdata) — Verifica si el resultado contiene datos
- [SqlStatementResult::nextResult](#mysql-xdevapi-sqlstatementresult.nextresult) — Devuelve el resultado siguiente

# Clase Statement

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\Statement**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [EXECUTE_ASYNC](#mysql-xdevapi-statement.constants.execute-async) = 1;

    const
     [int](#language.types.integer)
      [BUFFERED](#mysql-xdevapi-statement.constants.buffered) = 2;


    /* Métodos */

public **getNextResult**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)
public **getResult**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)
public **hasMoreResults**(): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[mysql_xdevapi\Statement::EXECUTE_ASYNC](#mysql-xdevapi-statement.constants.execute-async)**








     **[mysql_xdevapi\Statement::BUFFERED](#mysql-xdevapi-statement.constants.buffered)**






# Statement::\_\_construct

(No version information available, might only be in Git)

Statement::\_\_construct — Descripción del constructor

### Descripción

private **mysql_xdevapi\Statement::\_\_construct**()

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Statement::\_\_construct()**

&lt;?php

/_ ... _/

?&gt;

# Statement::getNextResult

(No version information available, might only be in Git)

Statement::getNextResult — Devuelve el resultado siguiente

### Descripción

public **mysql_xdevapi\Statement::getNextResult**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Statement::getNextResult()**

&lt;?php

/_ ... _/

?&gt;

# Statement::getResult

(No version information available, might only be in Git)

Statement::getResult — Devuelve el resultado

### Descripción

public **mysql_xdevapi\Statement::getResult**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Statement::getResult()**

&lt;?php

/_ ... _/

?&gt;

# Statement::hasMoreResults

(No version information available, might only be in Git)

Statement::hasMoreResults — Verifica si hay más resultados

### Descripción

public **mysql_xdevapi\Statement::hasMoreResults**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Statement::hasMoreResults()**

&lt;?php

/_ ... _/

?&gt;

## Tabla de contenidos

- [Statement::\_\_construct](#mysql-xdevapi-statement.construct) — Descripción del constructor
- [Statement::getNextResult](#mysql-xdevapi-statement.getnextresult) — Devuelve el resultado siguiente
- [Statement::getResult](#mysql-xdevapi-statement.getresult) — Devuelve el resultado
- [Statement::hasMoreResults](#mysql-xdevapi-statement.hasmoreresults) — Verifica si hay más resultados

# Clase Table

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

    Proporciona acceso a la tabla a través de declaraciones INSERT/SELECT/UPDATE/DELETE.

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\Table**


     implements
       [mysql_xdevapi\SchemaObject](#class.mysql-xdevapi-schemaobject) {

    /* Propiedades */

     public
      [$name](#mysql-xdevapi-table.props.name);


    /* Métodos */

public **count**(): [int](#language.types.integer)
public **delete**(): [mysql_xdevapi\TableDelete](#class.mysql-xdevapi-tabledelete)
public **existsInDatabase**(): [bool](#language.types.boolean)
public **getName**(): [string](#language.types.string)
public **getSchema**(): [mysql_xdevapi\Schema](#class.mysql-xdevapi-schema)
public **getSession**(): [mysql_xdevapi\Session](#class.mysql-xdevapi-session)
public **insert**([mixed](#language.types.mixed) $columns, [mixed](#language.types.mixed) ...$more_columns): [mysql_xdevapi\TableInsert](#class.mysql-xdevapi-tableinsert)
public **isView**(): [bool](#language.types.boolean)
public **select**([mixed](#language.types.mixed) $columns, [mixed](#language.types.mixed) ...$more_columns): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)
public **update**(): [mysql_xdevapi\TableUpdate](#class.mysql-xdevapi-tableupdate)

}

## Propiedades

     name






# Table::\_\_construct

(No version information available, might only be in Git)

Table::\_\_construct — Constructor de Table

### Descripción

private **mysql_xdevapi\Table::\_\_construct**()

Construye un objeto table.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Table::\_\_construct()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");
?&gt;

# Table::count

(No version information available, might only be in Git)

Table::count — Devuelve el número de filas

### Descripción

public **mysql_xdevapi\Table::count**(): [int](#language.types.integer)

Recupera el número de filas en la tabla.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número total de filas en la tabla.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Table::count()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

var_dump($table-&gt;count());
?&gt;

El ejemplo anterior mostrará:

int(2)

# Table::delete

(No version information available, might only be in Git)

Table::delete — Elimina filas de la tabla

### Descripción

public **mysql_xdevapi\Table::delete**(): [mysql_xdevapi\TableDelete](#class.mysql-xdevapi-tabledelete)

Elimina filas de una tabla.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto TableDelete; utilice el método execute() para ejecutar la consulta de eliminación.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Table::delete()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$table-&gt;delete()-&gt;where("name = :name")-&gt;orderby("age DESC")-&gt;limit(1)-&gt;bind(['name' =&gt; 'John'])-&gt;execute();
?&gt;

# Table::existsInDatabase

(No version information available, might only be in Git)

Table::existsInDatabase — Verifica si la tabla existe en la base de datos

### Descripción

public **mysql_xdevapi\Table::existsInDatabase**(): [bool](#language.types.boolean)

Verifica si esta tabla existe en la base de datos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la tabla existe en la base de datos, de lo contrario **[false](#constant.false)** si no existe.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Table::existsInDatabase()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

if ($table-&gt;existsInDatabase()) {
echo "Yes, this table still exists in the session's schema.";
}
?&gt;

Resultado del ejemplo anterior es similar a:

Yes, this table still exists in the session's schema.

# Table::getName

(No version information available, might only be in Git)

Table::getName — Devuelve el nombre de la tabla

### Descripción

public **mysql_xdevapi\Table::getName**(): [string](#language.types.string)

Devuelve el nombre de este objeto base de datos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nombre de este objeto base de datos.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Table::getName()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

var_dump($table-&gt;getName());
?&gt;

Resultado del ejemplo anterior es similar a:

string(5) "names"

# Table::getSchema

(No version information available, might only be in Git)

Table::getSchema — Devuelve el esquema de la tabla

### Descripción

public **mysql_xdevapi\Table::getSchema**(): [mysql_xdevapi\Schema](#class.mysql-xdevapi-schema)

Recupera el esquema asociado a la tabla.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto Schema.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Table::getSchema()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

var_dump($table-&gt;getSchema());
?&gt;

Resultado del ejemplo anterior es similar a:

object(mysql_xdevapi\Schema)#9 (1) {
["name"]=&gt;
string(11) "addressbook"
}

# Table::getSession

(No version information available, might only be in Git)

Table::getSession — Devuelve la sesión de la tabla

### Descripción

public **mysql_xdevapi\Table::getSession**(): [mysql_xdevapi\Session](#class.mysql-xdevapi-session)

Obtiene la sesión asociada a la tabla.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto Session.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Table::getSession()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

var_dump($table-&gt;getSession());
?&gt;

Resultado del ejemplo anterior es similar a:

object(mysql_xdevapi\Session)#9 (0) {
}

# Table::insert

(No version information available, might only be in Git)

Table::insert — Inserta filas en una tabla

### Descripción

public **mysql_xdevapi\Table::insert**([mixed](#language.types.mixed) $columns, [mixed](#language.types.mixed) ...$more_columns): [mysql_xdevapi\TableInsert](#class.mysql-xdevapi-tableinsert)

Inserta filas en una tabla.

### Parámetros

    columns


      Las columnas en las que insertar los datos. Puede ser un array
      con uno o más valores, o un string.






    more_columns


      Definiciones de columnas adicionales.


### Valores devueltos

Un objeto TableInsert; utilice el método execute() para ejecutar la instrucción de inserción.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Table::insert()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$table -&gt;insert("name", "age")
-&gt;values(["Suzanne", 31],["Julie", 43])
-&gt;execute();
?&gt;

# Table::isView

(No version information available, might only be in Git)

Table::isView — Devuelve si la tabla es una vista

### Descripción

public **mysql_xdevapi\Table::isView**(): [bool](#language.types.boolean)

Determina si el objeto subyacente es una vista o no.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    **[true](#constant.true)** si el objeto subyacente es una vista, de lo contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Table::isView()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

if ($table-&gt;isView()) {
echo "This is a view.";
} else {
echo "This is not a view.";
}
?&gt;

El ejemplo anterior mostrará:

This is not a view.

# Table::select

(No version information available, might only be in Git)

Table::select — Selecciona filas en una tabla

### Descripción

public **mysql_xdevapi\Table::select**([mixed](#language.types.mixed) $columns, [mixed](#language.types.mixed) ...$more_columns): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)

Recupera datos de una tabla.

### Parámetros

    columns


      Las columnas desde las cuales recuperar los datos. Puede ser un array
      con uno o más valores, o un string.






    more_columns


      Definiciones de columnas adicionales.


### Valores devueltos

Un objeto TableSelect; utilice el método execute() para ejecutar la
selección y devolver un objeto RowResult.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Table::count()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$row = $table-&gt;select('name', 'age')-&gt;execute()-&gt;fetchAll();

print_r($row);

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[name] =&gt; John
[age] =&gt; 42
)
[1] =&gt; Array
(
[name] =&gt; Sam
[age] =&gt; 33
)
)

# Table::update

(No version information available, might only be in Git)

Table::update — Actualiza las filas de la tabla

### Descripción

public **mysql_xdevapi\Table::update**(): [mysql_xdevapi\TableUpdate](#class.mysql-xdevapi-tableupdate)

Actualiza las columnas de una tabla.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto TableUpdate; utilice el método execute() para ejecutar la instrucción de actualización.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Table::update()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$table-&gt;update()-&gt;set('age',34)-&gt;where('name = "Sam"')-&gt;limit(1)-&gt;execute();
?&gt;

## Tabla de contenidos

- [Table::\_\_construct](#mysql-xdevapi-table.construct) — Constructor de Table
- [Table::count](#mysql-xdevapi-table.count) — Devuelve el número de filas
- [Table::delete](#mysql-xdevapi-table.delete) — Elimina filas de la tabla
- [Table::existsInDatabase](#mysql-xdevapi-table.existsindatabase) — Verifica si la tabla existe en la base de datos
- [Table::getName](#mysql-xdevapi-table.getname) — Devuelve el nombre de la tabla
- [Table::getSchema](#mysql-xdevapi-table.getschema) — Devuelve el esquema de la tabla
- [Table::getSession](#mysql-xdevapi-table.getsession) — Devuelve la sesión de la tabla
- [Table::insert](#mysql-xdevapi-table.insert) — Inserta filas en una tabla
- [Table::isView](#mysql-xdevapi-table.isview) — Devuelve si la tabla es una vista
- [Table::select](#mysql-xdevapi-table.select) — Selecciona filas en una tabla
- [Table::update](#mysql-xdevapi-table.update) — Actualiza las filas de la tabla

# Clase TableDelete

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

    Una declaración para operaciones de eliminación en una Tabla.

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\TableDelete**


     implements
       [mysql_xdevapi\Executable](#class.mysql-xdevapi-executable) {


    /* Métodos */

public **bind**([array](#language.types.array) $placeholder_values): [mysql_xdevapi\TableDelete](#class.mysql-xdevapi-tabledelete)
public **execute**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)
public **limit**([int](#language.types.integer) $rows): [mysql_xdevapi\TableDelete](#class.mysql-xdevapi-tabledelete)
public **orderby**([string](#language.types.string) $orderby_expr): [mysql_xdevapi\TableDelete](#class.mysql-xdevapi-tabledelete)
public **where**([string](#language.types.string) $where_expr): [mysql_xdevapi\TableDelete](#class.mysql-xdevapi-tabledelete)

}

# TableDelete::bind

(No version information available, might only be in Git)

TableDelete::bind — Liga los argumentos de la petición de eliminación

### Descripción

public **mysql_xdevapi\TableDelete::bind**([array](#language.types.array) $placeholder_values): [mysql_xdevapi\TableDelete](#class.mysql-xdevapi-tabledelete)

Liga un valor a un espacio reservado.

### Parámetros

    placeholder_values


      El nombre del espacio reservado y el valor a ligar.


### Valores devueltos

Un objeto TableDelete

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableDelete::bind()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$table-&gt;delete()
-&gt;where("name = :name")
-&gt;bind(['name' =&gt; 'John'])
-&gt;orderby("age DESC")
-&gt;limit(1)
-&gt;execute();

?&gt;

# TableDelete::\_\_construct

(No version information available, might only be in Git)

TableDelete::\_\_construct — Constructor de TableDelete

### Descripción

private **mysql_xdevapi\TableDelete::\_\_construct**()

Inicializado utilizando el método delete().

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableDelete::\_\_construct()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$table-&gt;delete()
-&gt;where("name = :name")
-&gt;bind(['name' =&gt; 'John'])
-&gt;orderby("age DESC")
-&gt;limit(1)
-&gt;execute();

?&gt;

# TableDelete::execute

(No version information available, might only be in Git)

TableDelete::execute — Ejecuta la consulta de eliminación

### Descripción

public **mysql_xdevapi\TableDelete::execute**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

Ejecuta la consulta de eliminación.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto Result.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableDelete::execute()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$table-&gt;delete()
-&gt;where("name = :name")
-&gt;bind(['name' =&gt; 'John'])
-&gt;orderby("age DESC")
-&gt;limit(1)
-&gt;execute();

?&gt;

# TableDelete::limit

(No version information available, might only be in Git)

TableDelete::limit — Limita las filas eliminadas

### Descripción

public **mysql_xdevapi\TableDelete::limit**([int](#language.types.integer) $rows): [mysql_xdevapi\TableDelete](#class.mysql-xdevapi-tabledelete)

Define el número máximo de registros o documentos a eliminar.

### Parámetros

    rows


      El máximo de registros o documentos a eliminar.


### Valores devueltos

Un objeto TableDelete.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableDelete::limit()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$table-&gt;delete()
-&gt;where("name = :name")
-&gt;bind(['name' =&gt; 'John'])
-&gt;orderby("age DESC")
-&gt;limit(1)
-&gt;execute();

?&gt;

# TableDelete::orderby

(No version information available, might only be in Git)

TableDelete::orderby — Define los criterios de ordenación de la eliminación

### Descripción

public **mysql_xdevapi\TableDelete::orderby**([string](#language.types.string) $orderby_expr): [mysql_xdevapi\TableDelete](#class.mysql-xdevapi-tabledelete)

Define las opciones de ordenación para un conjunto de resultados.

### Parámetros

    orderby_expr


      La definición de la ordenación.


### Valores devueltos

Un objeto TableDelete.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableDelete::orderBy()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$table-&gt;delete()
-&gt;where("age = :age")
-&gt;bind(['age' =&gt; 42])
-&gt;orderby("name DESC")
-&gt;limit(1)
-&gt;execute();

?&gt;

# TableDelete::where

(No version information available, might only be in Git)

TableDelete::where — Define la condición de búsqueda para la eliminación

### Descripción

public **mysql_xdevapi\TableDelete::where**([string](#language.types.string) $where_expr): [mysql_xdevapi\TableDelete](#class.mysql-xdevapi-tabledelete)

Define la condición de búsqueda para filtrar.

### Parámetros

    where_expr


      Define la condición de búsqueda para filtrar los documentos o los registros.


### Valores devueltos

Un objeto TableDelete.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableDelete::where()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$table-&gt;delete()
-&gt;where("id = :id")
-&gt;bind(['id' =&gt; 42])
-&gt;limit(1)
-&gt;execute();

?&gt;

## Tabla de contenidos

- [TableDelete::bind](#mysql-xdevapi-tabledelete.bind) — Liga los argumentos de la petición de eliminación
- [TableDelete::\_\_construct](#mysql-xdevapi-tabledelete.construct) — Constructor de TableDelete
- [TableDelete::execute](#mysql-xdevapi-tabledelete.execute) — Ejecuta la consulta de eliminación
- [TableDelete::limit](#mysql-xdevapi-tabledelete.limit) — Limita las filas eliminadas
- [TableDelete::orderby](#mysql-xdevapi-tabledelete.orderby) — Define los criterios de ordenación de la eliminación
- [TableDelete::where](#mysql-xdevapi-tabledelete.where) — Define la condición de búsqueda para la eliminación

# Clase TableInsert

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

    Una declaración para operaciones de inserción en una Tabla.

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\TableInsert**


     implements
       [mysql_xdevapi\Executable](#class.mysql-xdevapi-executable) {


    /* Métodos */

public **execute**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)
public **values**([array](#language.types.array) $row_values): [mysql_xdevapi\TableInsert](#class.mysql-xdevapi-tableinsert)

}

# TableInsert::\_\_construct

(No version information available, might only be in Git)

TableInsert::\_\_construct — Constructor de TableInsert

### Descripción

private **mysql_xdevapi\TableInsert::\_\_construct**()

Inicializado por el método insert().

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableInsert::\_\_construct()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$table
-&gt;insert("name", "age")
-&gt;values(["Suzanne", 31],["Julie", 43])
-&gt;execute();
?&gt;

# TableInsert::execute

(No version information available, might only be in Git)

TableInsert::execute — Ejecuta una consulta de inserción

### Descripción

public **mysql_xdevapi\TableInsert::execute**(): [mysql_xdevapi\Result](#class.mysql-xdevapi-result)

Ejecuta la declaración.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto Result.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableInsert::execute()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$table
-&gt;insert("name", "age")
-&gt;values(["Suzanne", 31],["Julie", 43])
-&gt;execute();
?&gt;

# TableInsert::values

(No version information available, might only be in Git)

TableInsert::values — Añade valores de fila

### Descripción

public **mysql_xdevapi\TableInsert::values**([array](#language.types.array) $row_values): [mysql_xdevapi\TableInsert](#class.mysql-xdevapi-tableinsert)

Define los valores a insertar.

### Parámetros

    row_values


      Los valores (un array) de las columnas a insertar.


### Valores devueltos

Un objeto TableInsert.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableInsert::values()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$table
-&gt;insert("name", "age")
-&gt;values(["Suzanne", 31],["Julie", 43])
-&gt;execute();
?&gt;

## Tabla de contenidos

- [TableInsert::\_\_construct](#mysql-xdevapi-tableinsert.construct) — Constructor de TableInsert
- [TableInsert::execute](#mysql-xdevapi-tableinsert.execute) — Ejecuta una consulta de inserción
- [TableInsert::values](#mysql-xdevapi-tableinsert.values) — Añade valores de fila

# Clase TableSelect

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

    Una declaración para operaciones de recuperación de entradas en una Tabla.

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\TableSelect**


     implements
       [mysql_xdevapi\Executable](#class.mysql-xdevapi-executable) {


    /* Métodos */

public **bind**([array](#language.types.array) $placeholder_values): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)
public **execute**(): [mysql_xdevapi\RowResult](#class.mysql-xdevapi-rowresult)
public **groupBy**([mixed](#language.types.mixed) $sort_expr): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)
public **having**([string](#language.types.string) $sort_expr): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)
public **limit**([int](#language.types.integer) $rows): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)
public **lockExclusive**([int](#language.types.integer) $lock_waiting_option = ?): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)
public **lockShared**([int](#language.types.integer) $lock_waiting_option = ?): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)
public **offset**([int](#language.types.integer) $position): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)
public **orderby**([mixed](#language.types.mixed) $sort_expr, [mixed](#language.types.mixed) ...$sort_exprs): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)
public **where**([string](#language.types.string) $where_expr): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)

}

# TableSelect::bind

(No version information available, might only be in Git)

TableSelect::bind — Liga los argumentos de la petición select

### Descripción

public **mysql_xdevapi\TableSelect::bind**([array](#language.types.array) $placeholder_values): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)

Liga un valor a un espacio reservado específico.

### Parámetros

    placeholder_values


      El nombre del espacio reservado y el valor a ligar.


### Valores devueltos

Un objeto TableSelect.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableSelect::bind()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$result = $table-&gt;select('name','age')
-&gt;where('name like :name and age &gt; :age')
-&gt;bind(['name' =&gt; 'John', 'age' =&gt; 42])
-&gt;execute();

$row = $result-&gt;fetchAll();
print_r($row);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[name] =&gt; John
[age] =&gt; 42
)
)

# TableSelect::\_\_construct

(No version information available, might only be in Git)

TableSelect::\_\_construct — Constructor de TableSelect

### Descripción

private **mysql_xdevapi\TableSelect::\_\_construct**()

Un objeto devuelto por el método select(); utilice execute() para
ejecutar la consulta.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableSelect::\_\_construct()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 33)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$result = $table-&gt;select('name','age')
-&gt;where('name like :name and age &gt; :age')
-&gt;bind(['name' =&gt; 'John', 'age' =&gt; 42])
-&gt;orderBy('age desc')
-&gt;execute();

$row = $result-&gt;fetchAll();
print_r($row);

?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[name] =&gt; John
[age] =&gt; 42
)
)

# TableSelect::execute

(No version information available, might only be in Git)

TableSelect::execute — Ejecuta una declaración select

### Descripción

public **mysql_xdevapi\TableSelect::execute**(): [mysql_xdevapi\RowResult](#class.mysql-xdevapi-rowresult)

Ejecuta la declaración select encadenándola con el método execute().

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto RowResult.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableSelect::execute()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$result = $table-&gt;select('name','age')
-&gt;where('name like :name and age &gt; :age')
-&gt;bind(['name' =&gt; 'John', 'age' =&gt; 42])
-&gt;orderBy('age desc')
-&gt;execute();

$row = $result-&gt;fetchAll();
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[name] =&gt; John
[age] =&gt; 42
)
)

# TableSelect::groupBy

(No version information available, might only be in Git)

TableSelect::groupBy — Define los criterios de agrupación de la selección

### Descripción

public **mysql_xdevapi\TableSelect::groupBy**([mixed](#language.types.mixed) $sort_expr): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)

Define un criterio de agrupación para el conjunto de resultados.

### Parámetros

    sort_expr


      El criterio de agrupación.


### Valores devueltos

Un objeto TableSelect.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableSelect::groupBy()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 42)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('Suki', 31)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$result = $table-&gt;select('count(\*) as count', 'age')
-&gt;groupBy('age')-&gt;orderBy('age asc')
-&gt;execute();

$row = $result-&gt;fetchAll();
print_r($row);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[count] =&gt; 1
[age] =&gt; 31
)
[1] =&gt; Array
(
[count] =&gt; 2
[age] =&gt; 42
)
)

# TableSelect::having

(No version information available, might only be in Git)

TableSelect::having — Define la condición de agrupamiento

### Descripción

public **mysql_xdevapi\TableSelect::having**([string](#language.types.string) $sort_expr): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)

Define una condición para los registros a considerar en las operaciones de función de agregación.

### Parámetros

    sort_expr


      Una condición sobre las funciones de agregación utilizadas en los criterios de agrupamiento.


### Valores devueltos

Un objeto TableSelect.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableSelect::having()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 42)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('Suki', 31)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$result = $table-&gt;select('count(\*) as count', 'age')
-&gt;groupBy('age')-&gt;orderBy('age asc')
-&gt;having('count &gt; 1')
-&gt;execute();

$row = $result-&gt;fetchAll();
print_r($row);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[count] =&gt; 2
[age] =&gt; 42
)
)

# TableSelect::limit

(No version information available, might only be in Git)

TableSelect::limit — Limita las filas seleccionadas

### Descripción

public **mysql_xdevapi\TableSelect::limit**([int](#language.types.integer) $rows): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)

Define el número máximo de registros o documentos a devolver.

### Parámetros

    rows


      El número máximo de registros o documentos.


### Valores devueltos

Un objeto TableSelect.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableSelect::limit()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$result = $table-&gt;select('name', 'age')
-&gt;limit(1)
-&gt;execute();

$row = $result-&gt;fetchAll();
print_r($row);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[name] =&gt; John
[age] =&gt; 42
)
)

# TableSelect::lockExclusive

(No version information available, might only be in Git)

TableSelect::lockExclusive — Ejecuta EXCLUSIVE LOCK

### Descripción

public **mysql_xdevapi\TableSelect::lockExclusive**([int](#language.types.integer) $lock_waiting_option = ?): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)

Ejecuta una operación de lectura con EXCLUSIVE LOCK. Solo un bloqueo puede estar activo a la vez.

### Parámetros

    lock_waiting_option


      Una opción de espera opcional que está definida por omisión en **[MYSQLX_LOCK_DEFAULT](#constant.mysqlx-lock-default)**.
      Los valores válidos son:




      - **[MYSQLX_LOCK_DEFAULT](#constant.mysqlx-lock-default)**



      - **[MYSQLX_LOCK_NOWAIT](#constant.mysqlx-lock-nowait)**



      - **[MYSQLX_LOCK_SKIP_LOCKED](#constant.mysqlx-lock-skip-locked)**





### Valores devueltos

Un objeto TableSelect.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableSelect::lockExclusive()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$session-&gt;startTransaction();

$result = $table-&gt;select('name', 'age')
-&gt;lockExclusive(MYSQLX_LOCK_NOWAIT)
-&gt;execute();

$session-&gt;commit();

$row = $result-&gt;fetchAll();
print_r($row);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[name] =&gt; John
[age] =&gt; 42
)
[1] =&gt; Array
(
[name] =&gt; Sam
[age] =&gt; 42
)
)

# TableSelect::lockShared

(No version information available, might only be in Git)

TableSelect::lockShared — Ejecuta SHARED LOCK

### Descripción

public **mysql_xdevapi\TableSelect::lockShared**([int](#language.types.integer) $lock_waiting_option = ?): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)

Ejecuta una operación de lectura con SHARED LOCK. Solo un bloqueo puede estar activo a la vez.

### Parámetros

    lock_waiting_option


      Una opción de espera opcional que se establece por omisión en **[MYSQLX_LOCK_DEFAULT](#constant.mysqlx-lock-default)**.
      Los valores válidos son:




      - **[MYSQLX_LOCK_DEFAULT](#constant.mysqlx-lock-default)**



      - **[MYSQLX_LOCK_NOWAIT](#constant.mysqlx-lock-nowait)**



      - **[MYSQLX_LOCK_SKIP_LOCKED](#constant.mysqlx-lock-skip-locked)**





### Valores devueltos

Un objeto TableSelect.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableSelect::lockShared()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$session-&gt;startTransaction();

$result = $table-&gt;select('name', 'age')
-&gt;lockShared(MYSQLX_LOCK_NOWAIT)
-&gt;execute();

$session-&gt;commit();

$row = $result-&gt;fetchAll();
print_r($row);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[name] =&gt; John
[age] =&gt; 42
)
[1] =&gt; Array
(
[name] =&gt; Sam
[age] =&gt; 42
)
)

# TableSelect::offset

(No version information available, might only be in Git)

TableSelect::offset — Define el desplazamiento del límite

### Descripción

public **mysql_xdevapi\TableSelect::offset**([int](#language.types.integer) $position): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)

Ignora un número dado de filas en el resultado.

### Parámetros

    position


      El desplazamiento del límite.


### Valores devueltos

Un objeto TableSelect.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableSelect::offset()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$session-&gt;sql("DROP DATABASE IF EXISTS addressbook")-&gt;execute();
$session-&gt;sql("CREATE DATABASE addressbook")-&gt;execute();
$session-&gt;sql("CREATE TABLE addressbook.names(name text, age int)")-&gt;execute();
$session-&gt;sql("INSERT INTO addressbook.names values ('John', 42), ('Sam', 42)")-&gt;execute();

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$result = $table-&gt;select('name', 'age')
-&gt;limit(1)
-&gt;offset(1)
-&gt;execute();

$row = $result-&gt;fetchAll();
print_r($row);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[name] =&gt; Sam
[age] =&gt; 42
)
)

# TableSelect::orderby

(No version information available, might only be in Git)

TableSelect::orderby — Define los criterios de ordenación de la selección

### Descripción

public **mysql_xdevapi\TableSelect::orderby**([mixed](#language.types.mixed) $sort_expr, [mixed](#language.types.mixed) ...$sort_exprs): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)

Define los criterios de ordenación.

### Parámetros

    sort_expr


      La expresión que define los criterios de ordenación. Puede ser un array
      con una o más expresiones, o un string.






    sort_exprs


      Parámetros adicionales para sort_expr.


### Valores devueltos

Un objeto TableSelect.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableSelect::orderBy()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$result = $table-&gt;select('name', 'age')
-&gt;orderBy('name desc')
-&gt;execute();

$row = $result-&gt;fetchAll();
print_r($row);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[name] =&gt; Sam
[age] =&gt; 42
)
[1] =&gt; Array
(
[name] =&gt; John
[age] =&gt; 42
)
)

# TableSelect::where

(No version information available, might only be in Git)

TableSelect::where — Define los criterios de búsqueda de la selección

### Descripción

public **mysql_xdevapi\TableSelect::where**([string](#language.types.string) $where_expr): [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect)

Define las condiciones de búsqueda para filtrar.

### Parámetros

    where_expr


      Define la condición de búsqueda para filtrar los documentos o los registros.


### Valores devueltos

Un objeto TableSelect.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableSelect::where()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$result = $table-&gt;select('name','age')
-&gt;where('name like :name and age &gt; :age')
-&gt;bind(['name' =&gt; 'John', 'age' =&gt; 42])
-&gt;execute();

$row = $result-&gt;fetchAll();
print_r($row);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; Array
(
[name] =&gt; John
[age] =&gt; 42
)
)

## Tabla de contenidos

- [TableSelect::bind](#mysql-xdevapi-tableselect.bind) — Liga los argumentos de la petición select
- [TableSelect::\_\_construct](#mysql-xdevapi-tableselect.construct) — Constructor de TableSelect
- [TableSelect::execute](#mysql-xdevapi-tableselect.execute) — Ejecuta una declaración select
- [TableSelect::groupBy](#mysql-xdevapi-tableselect.groupby) — Define los criterios de agrupación de la selección
- [TableSelect::having](#mysql-xdevapi-tableselect.having) — Define la condición de agrupamiento
- [TableSelect::limit](#mysql-xdevapi-tableselect.limit) — Limita las filas seleccionadas
- [TableSelect::lockExclusive](#mysql-xdevapi-tableselect.lockexclusive) — Ejecuta EXCLUSIVE LOCK
- [TableSelect::lockShared](#mysql-xdevapi-tableselect.lockshared) — Ejecuta SHARED LOCK
- [TableSelect::offset](#mysql-xdevapi-tableselect.offset) — Define el desplazamiento del límite
- [TableSelect::orderby](#mysql-xdevapi-tableselect.orderby) — Define los criterios de ordenación de la selección
- [TableSelect::where](#mysql-xdevapi-tableselect.where) — Define los criterios de búsqueda de la selección

# Clase TableUpdate

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

    Una declaración para operaciones de actualización en una Tabla.

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\TableUpdate**


     implements
       [mysql_xdevapi\Executable](#class.mysql-xdevapi-executable) {


    /* Métodos */

public **bind**([array](#language.types.array) $placeholder_values): [mysql_xdevapi\TableUpdate](#class.mysql-xdevapi-tableupdate)
public **execute**(): [mysql_xdevapi\TableUpdate](#class.mysql-xdevapi-tableupdate)
public **limit**([int](#language.types.integer) $rows): [mysql_xdevapi\TableUpdate](#class.mysql-xdevapi-tableupdate)
public **orderby**([mixed](#language.types.mixed) $orderby_expr, [mixed](#language.types.mixed) ...$orderby_exprs): [mysql_xdevapi\TableUpdate](#class.mysql-xdevapi-tableupdate)
public **set**([string](#language.types.string) $table_field, [string](#language.types.string) $expression_or_literal): [mysql_xdevapi\TableUpdate](#class.mysql-xdevapi-tableupdate)
public **where**([string](#language.types.string) $where_expr): [mysql_xdevapi\TableUpdate](#class.mysql-xdevapi-tableupdate)

}

# TableUpdate::bind

(No version information available, might only be in Git)

TableUpdate::bind — Liga los argumentos de la solicitud de actualización

### Descripción

public **mysql_xdevapi\TableUpdate::bind**([array](#language.types.array) $placeholder_values): [mysql_xdevapi\TableUpdate](#class.mysql-xdevapi-tableupdate)

Liga un valor a un emplazamiento específico.

### Parámetros

    placeholder_values


      El nombre del emplazamiento reservado y el valor a ligar, definidos
      como un array JSON.


### Valores devueltos

Un objeto TableUpdate.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableUpdate::bind()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$table-&gt;update()
-&gt;set('status', 'admin')
-&gt;where('name = :name and age &gt; :age')
-&gt;bind(['name' =&gt; 'Bernie', 'age' =&gt; 2000])
-&gt;execute();

?&gt;

# TableUpdate::\_\_construct

(No version information available, might only be in Git)

TableUpdate::\_\_construct — Constructor de TableUpdate

### Descripción

private **mysql_xdevapi\TableUpdate::\_\_construct**()

Inicializado por el método update().

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableUpdate::\_\_construct()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$res = $table-&gt;update()
-&gt;set('level', 3)
-&gt;where('age &gt; 15 and age &lt; 22')
-&gt;limit(4)
-&gt;orderby(['age asc','name desc'])
-&gt;execute();

?&gt;

# TableUpdate::execute

(No version information available, might only be in Git)

TableUpdate::execute — Ejecuta la consulta de actualización

### Descripción

public **mysql_xdevapi\TableUpdate::execute**(): [mysql_xdevapi\TableUpdate](#class.mysql-xdevapi-tableupdate)

Ejecuta la declaración de actualización.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un objeto TableUpdate.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableUpdate::execute()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$res = $table-&gt;update()
-&gt;set('level', 3)
-&gt;where('age &gt; 15 and age &lt; 22')
-&gt;limit(4)
-&gt;orderby(['age asc','name desc'])
-&gt;execute();

?&gt;

# TableUpdate::limit

(No version information available, might only be in Git)

TableUpdate::limit — Limita el número de filas actualizadas

### Descripción

public **mysql_xdevapi\TableUpdate::limit**([int](#language.types.integer) $rows): [mysql_xdevapi\TableUpdate](#class.mysql-xdevapi-tableupdate)

Define el número máximo de filas o documentos a actualizar.

### Parámetros

    rows


      El número máximo de filas o documentos a actualizar.


### Valores devueltos

Un objeto TableUpdate.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableUpdate::limit()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$res = $table-&gt;update()
-&gt;set('level', 3)
-&gt;where('age &gt; 15 and age &lt; 22')
-&gt;limit(4)
-&gt;orderby(['age asc','name desc'])
-&gt;execute();

?&gt;

# TableUpdate::orderby

(No version information available, might only be in Git)

TableUpdate::orderby — Define los criterios de ordenación

### Descripción

public **mysql_xdevapi\TableUpdate::orderby**([mixed](#language.types.mixed) $orderby_expr, [mixed](#language.types.mixed) ...$orderby_exprs): [mysql_xdevapi\TableUpdate](#class.mysql-xdevapi-tableupdate)

Define los criterios de ordenación.

### Parámetros

    orderby_expr


      La expresión que define los criterios de ordenación. Puede ser un array
      con una o más expresiones, o un string.






    orderby_exprs


      Parámetros adicionales para las expresiones de ordenación.


### Valores devueltos

Un objeto TableUpdate.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableUpdate::orderby()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$res = $table-&gt;update()
-&gt;set('level', 3)
-&gt;where('age &gt; 15 and age &lt; 22')
-&gt;limit(4)
-&gt;orderby(['age asc','name desc'])
-&gt;execute();
?&gt;

# TableUpdate::set

(No version information available, might only be in Git)

TableUpdate::set — Añade un campo a actualizar

### Descripción

public **mysql_xdevapi\TableUpdate::set**([string](#language.types.string) $table_field, [string](#language.types.string) $expression_or_literal): [mysql_xdevapi\TableUpdate](#class.mysql-xdevapi-tableupdate)

Actualiza el valor de la columna en los registros de una tabla.

### Parámetros

    table_field


      El nombre de la columna a actualizar.






    expression_or_literal


      El valor a definir en la columna especificada.


### Valores devueltos

Un objeto TableUpdate.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableUpdate::set()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$res = $table-&gt;update()
-&gt;set('level', 3)
-&gt;where('age &gt; 15 and age &lt; 22')
-&gt;limit(4)
-&gt;orderby(['age asc','name desc'])
-&gt;execute();

?&gt;

# TableUpdate::where

(No version information available, might only be in Git)

TableUpdate::where — Define el filtro de búsqueda

### Descripción

public **mysql_xdevapi\TableUpdate::where**([string](#language.types.string) $where_expr): [mysql_xdevapi\TableUpdate](#class.mysql-xdevapi-tableupdate)

Define la condición de búsqueda para el filtro.

### Parámetros

    where_expr


      La condición de búsqueda para filtrar los documentos o los registros.


### Valores devueltos

Un objeto TableUpdate.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\TableUpdate::where()**

&lt;?php
$session = mysql_xdevapi\getSession("mysqlx://user:password@localhost");

$schema = $session-&gt;getSchema("addressbook");
$table = $schema-&gt;getTable("names");

$res = $table-&gt;update()
-&gt;set('level', 3)
-&gt;where('age &gt; 15 and age &lt; 22')
-&gt;limit(4)
-&gt;orderby(['age asc','name desc'])
-&gt;execute();

?&gt;

## Tabla de contenidos

- [TableUpdate::bind](#mysql-xdevapi-tableupdate.bind) — Liga los argumentos de la solicitud de actualización
- [TableUpdate::\_\_construct](#mysql-xdevapi-tableupdate.construct) — Constructor de TableUpdate
- [TableUpdate::execute](#mysql-xdevapi-tableupdate.execute) — Ejecuta la consulta de actualización
- [TableUpdate::limit](#mysql-xdevapi-tableupdate.limit) — Limita el número de filas actualizadas
- [TableUpdate::orderby](#mysql-xdevapi-tableupdate.orderby) — Define los criterios de ordenación
- [TableUpdate::set](#mysql-xdevapi-tableupdate.set) — Añade un campo a actualizar
- [TableUpdate::where](#mysql-xdevapi-tableupdate.where) — Define el filtro de búsqueda

# Clase Warning

(PECL mysql-xdevapi &gt;= 8.0.11)

## Introducción

## Sinopsis de la Clase

    ****




      class **mysql_xdevapi\Warning**

     {

    /* Propiedades */

     public
      [$message](#mysql-xdevapi-warning.props.message);

    public
      [$level](#mysql-xdevapi-warning.props.level);

    public
      [$code](#mysql-xdevapi-warning.props.code);


    /* Constructor */

private **\_\_construct**()

}

## Propiedades

     message







     level







     code






# Warning::\_\_construct

(No version information available, might only be in Git)

Warning::\_\_construct — Constructor de Warning

### Descripción

private **mysql_xdevapi\Warning::\_\_construct**()

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Ejemplos

**Ejemplo #1 Ejemplo de mysql_xdevapi\Warning::\_\_construct()**

&lt;?php

/_ ... _/

?&gt;

## Tabla de contenidos

- [Warning::\_\_construct](#mysql-xdevapi-warning.construct) — Constructor de Warning

- [Introducción](#intro.mysql-xdevapi)
- [Instalación/Configuración](#mysql-xdevapi.setup)<li>[Requerimientos](#mysql-xdevapi.requirements)
- [Instalación](#mysql-xdevapi.installation)
- [Configuración en tiempo de ejecución](#mysql-xdevapi.configuration)
- [Compilar a partir de las fuentes](#mysql-xdevapi.build)
  </li>- [Constantes predefinidas](#mysql-xdevapi.constants)
- [Registro de cambios](#changelog.mysql_xdevapi)
- [Ejemplos](#mysql-xdevapi.examples)
- [Funciones Mysql_xdevapi](#ref.mysql-xdevapi)<li>[expression](#function.mysql-xdevapi-expression) — Vincula una expresión a una variable de consulta preparada
- [getSession](#function.mysql-xdevapi-getsession) — Conecta a un servidor MySQL
  </li>- [mysql_xdevapi\BaseResult](#class.mysql-xdevapi-baseresult) — Interfaz BaseResult<li>[BaseResult::getWarnings](#mysql-xdevapi-baseresult.getwarnings) — Recupera los avisos de la última operación
- [BaseResult::getWarningsCount](#mysql-xdevapi-baseresult.getwarningscount) — Recupera el número de advertencias de la última operación
  </li>- [mysql_xdevapi\Client](#class.mysql-xdevapi-client) — La clase Client<li>[mysql_xdevapi\Client::close](#mysql-xdevapi-client.close) — Cierra el cliente
- [Client::\_\_construct](#mysql-xdevapi-client.construct) — Constructor del cliente
- [Client::getClient](#mysql-xdevapi-client.getsession) — Devuelve la sesión del cliente
  </li>- [mysql_xdevapi\Collection](#class.mysql-xdevapi-collection) — Clase Collection<li>[Collection::add](#mysql-xdevapi-collection.add) — Añade un documento a la colección
- [Collection::addOrReplaceOne](#mysql-xdevapi-collection.addorreplaceone) — Añade o reemplaza un documento de la colección
- [Collection::\_\_construct](#mysql-xdevapi-collection.construct) — Constructor de Collection
- [Collection::count](#mysql-xdevapi-collection.count) — Devuelve el número de documentos
- [Collection::createIndex](#mysql-xdevapi-collection.createindex) — Crear un índice de colección
- [Collection::dropIndex](#mysql-xdevapi-collection.dropindex) — Elimina un índice de colección
- [Collection::existsInDatabase](#mysql-xdevapi-collection.existsindatabase) — Verifica si la colección existe en la base de datos
- [Collection::find](#mysql-xdevapi-collection.find) — Búsqueda de documento
- [Collection::getName](#mysql-xdevapi-collection.getname) — Devuelve el nombre de la colección
- [Collection::getOne](#mysql-xdevapi-collection.getone) — Devuelve un documento
- [Collection::getSchema](#mysql-xdevapi-collection.getschema) — Devuelve el objeto esquema
- [Collection::getSession](#mysql-xdevapi-collection.getsession) — Devuelve el objeto session
- [Collection::modify](#mysql-xdevapi-collection.modify) — Modifica los documentos de la colección
- [Collection::remove](#mysql-xdevapi-collection.remove) — Elimina documentos de la colección
- [Collection::removeOne](#mysql-xdevapi-collection.removeone) — Elimina un documento de la colección
- [Collection::replaceOne](#mysql-xdevapi-collection.replaceone) — Reemplaza un documento de la colección
  </li>- [mysql_xdevapi\CollectionAdd](#class.mysql-xdevapi-collectionadd) — Clase CollectionAdd<li>[CollectionAdd::__construct](#mysql-xdevapi-collectionadd.construct) — Constructor de CollectionAdd
- [CollectionAdd::execute](#mysql-xdevapi-collectionadd.execute) — Ejecuta la declaración
  </li>- [mysql_xdevapi\CollectionFind](#class.mysql-xdevapi-collectionfind) — Clase CollectionFind<li>[CollectionFind::bind](#mysql-xdevapi-collectionfind.bind) — Liga un valor a un argumento de consulta
- [CollectionFind::\_\_construct](#mysql-xdevapi-collectionfind.construct) — Constructor de CollectionFind
- [CollectionFind::execute](#mysql-xdevapi-collectionfind.execute) — Ejecuta la declaración
- [CollectionFind::fields](#mysql-xdevapi-collectionfind.fields) — Define el filtro de campo de documento
- [CollectionFind::groupBy](#mysql-xdevapi-collectionfind.groupby) — Define los criterios de agrupación
- [CollectionFind::having](#mysql-xdevapi-collectionfind.having) — Define la condición para las funciones de agregación
- [CollectionFind::limit](#mysql-xdevapi-collectionfind.limit) — Limita el número de documentos devueltos
- [CollectionFind::lockExclusive](#mysql-xdevapi-collectionfind.lockexclusive) — Ejecuta la operación con un BLOQUEO EXCLUSIVO
- [CollectionFind::lockShared](#mysql-xdevapi-collectionfind.lockshared) — Ejecuta la operación con un BLOQUEO COMPARTIDO
- [CollectionFind::offset](#mysql-xdevapi-collectionfind.offset) — Ignorar un número dado de elementos a devolver
- [CollectionFind::sort](#mysql-xdevapi-collectionfind.sort) — Define los criterios de ordenación
  </li>- [mysql_xdevapi\CollectionModify](#class.mysql-xdevapi-collectionmodify) — Clase CollectionModify<li>[CollectionModify::arrayAppend](#mysql-xdevapi-collectionmodify.arrayappend) — Añade un elemento a un campo de array
- [CollectionModify::arrayInsert](#mysql-xdevapi-collectionmodify.arrayinsert) — Inserta un elemento en un campo de array
- [CollectionModify::bind](#mysql-xdevapi-collectionmodify.bind) — Liga un valor a un parámetro de consulta
- [CollectionModify::\_\_construct](#mysql-xdevapi-collectionmodify.construct) — Constructor de CollectionModify
- [CollectionModify::execute](#mysql-xdevapi-collectionmodify.execute) — Ejecuta la operación de modificación
- [CollectionModify::limit](#mysql-xdevapi-collectionmodify.limit) — Limita el número de documentos modificados
- [CollectionModify::patch](#mysql-xdevapi-collectionmodify.patch) — Corrige un documento
- [CollectionModify::replace](#mysql-xdevapi-collectionmodify.replace) — Reemplaza un campo de documento
- [CollectionModify::set](#mysql-xdevapi-collectionmodify.set) — Define un atributo de documento
- [CollectionModify::skip](#mysql-xdevapi-collectionmodify.skip) — Ignorar los elementos
- [CollectionModify::sort](#mysql-xdevapi-collectionmodify.sort) — Define los criterios de ordenación
- [CollectionModify::unset](#mysql-xdevapi-collectionmodify.unset) — Elimina el valor de los campos del documento
  </li>- [mysql_xdevapi\CollectionRemove](#class.mysql-xdevapi-collectionremove) — Clase CollectionRemove<li>[CollectionRemove::bind](#mysql-xdevapi-collectionremove.bind) — Liga un valor a un argumento
- [CollectionRemove::\_\_construct](#mysql-xdevapi-collectionremove.construct) — Constructor de CollectionRemove
- [CollectionRemove::execute](#mysql-xdevapi-collectionremove.execute) — Ejecuta la operación de eliminación
- [CollectionRemove::limit](#mysql-xdevapi-collectionremove.limit) — Limita el número de documentos a eliminar
- [CollectionRemove::sort](#mysql-xdevapi-collectionremove.sort) — Define el criterio de ordenación
  </li>- [mysql_xdevapi\ColumnResult](#class.mysql-xdevapi-columnresult) — Clase ColumnResult<li>[ColumnResult::__construct](#mysql-xdevapi-columnresult.construct) — Constructor de ColumnResult
- [ColumnResult::getCharacterSetName](#mysql-xdevapi-columnresult.getcharactersetname) — Devuelve el conjunto de caracteres
- [ColumnResult::getCollationName](#mysql-xdevapi-columnresult.getcollationname) — Devuelve el nombre de la intercalación
- [ColumnResult::getColumnLabel](#mysql-xdevapi-columnresult.getcolumnlabel) — Devuelve la etiqueta de columna
- [ColumnResult::getColumnName](#mysql-xdevapi-columnresult.getcolumnname) — Devuelve el nombre de la columna
- [ColumnResult::getFractionalDigits](#mysql-xdevapi-columnresult.getfractionaldigits) — Devuelve la longitud de los dígitos fraccionarios
- [ColumnResult::getLength](#mysql-xdevapi-columnresult.getlength) — Devuelve la longitud del campo
- [ColumnResult::getSchemaName](#mysql-xdevapi-columnresult.getschemaname) — Devuelve el nombre del esquema
- [ColumnResult::getTableLabel](#mysql-xdevapi-columnresult.gettablelabel) — Devuelve la etiqueta de la tabla
- [ColumnResult::getTableName](#mysql-xdevapi-columnresult.gettablename) — Devuelve el nombre de la tabla
- [ColumnResult::getType](#mysql-xdevapi-columnresult.gettype) — Devuelve el tipo de columna
- [ColumnResult::isNumberSigned](#mysql-xdevapi-columnresult.isnumbersigned) — Indica si el tipo es signado
- [ColumnResult::isPadded](#mysql-xdevapi-columnresult.ispadded) — Verifica si el campo tiene un relleno
  </li>- [mysql_xdevapi\CrudOperationBindable](#class.mysql-xdevapi-crudoperationbindable) — Interfaz CrudOperationBindable<li>[CrudOperationBindable::bind](#mysql-xdevapi-crudoperationbindable.bind) — Liga un valor a un espacio reservado
  </li>- [mysql_xdevapi\CrudOperationLimitable](#class.mysql-xdevapi-crudoperationlimitable) — Interfaz CrudOperationLimitable<li>[CrudOperationLimitable::limit](#mysql-xdevapi-crudoperationlimitable.limit) — Define el límite de resultados
  </li>- [mysql_xdevapi\CrudOperationSkippable](#class.mysql-xdevapi-crudoperationskippable) — Interfaz CrudOperationSkippable<li>[CrudOperationSkippable::skip](#mysql-xdevapi-crudoperationskippable.skip) — El número de operaciones a ignorar
  </li>- [mysql_xdevapi\CrudOperationSortable](#class.mysql-xdevapi-crudoperationsortable) — Interfaz CrudOperationSortable<li>[CrudOperationSortable::sort](#mysql-xdevapi-crudoperationsortable.sort) — Ordena los resultados
  </li>- [mysql_xdevapi\DatabaseObject](#class.mysql-xdevapi-databaseobject) — Interfaz DatabaseObject<li>[DatabaseObject::existsInDatabase](#mysql-xdevapi-databaseobject.existsindatabase) — Verifica si el objeto existe en la base de datos
- [DatabaseObject::getName](#mysql-xdevapi-databaseobject.getname) — Devuelve el nombre del objeto
- [DatabaseObject::getSession](#mysql-xdevapi-databaseobject.getsession) — Devuelve el nombre de la sesión
  </li>- [mysql_xdevapi\DocResult](#class.mysql-xdevapi-docresult) — Clase DocResult<li>[DocResult::__construct](#mysql-xdevapi-docresult.construct) — Constructor de DocResult
- [DocResult::fetchAll](#mysql-xdevapi-docresult.fetchall) — Devuelve todas las filas
- [DocResult::fetchOne](#mysql-xdevapi-docresult.fetchone) — Devuelve una fila
- [DocResult::getWarnings](#mysql-xdevapi-docresult.getwarnings) — Devuelve los avisos de la última operación
- [DocResult::getWarningsCount](#mysql-xdevapi-docresult.getwarningscount) — Devuelve el número de advertencias de la última operación
  </li>- [mysql_xdevapi\Exception](#class.mysql-xdevapi-exception) — Clase Exception
- [mysql_xdevapi\Executable](#class.mysql-xdevapi-executable) — Interfaz Executable<li>[Executable::execute](#mysql-xdevapi-executable.execute) — Ejecuta una declaración
  </li>- [mysql_xdevapi\ExecutionStatus](#class.mysql-xdevapi-executionstatus) — Clase ExecutionStatus<li>[ExecutionStatus::__construct](#mysql-xdevapi-executionstatus.construct) — Constructor de ExecutionStatus
  </li>- [mysql_xdevapi\Expression](#class.mysql-xdevapi-expression) — Clase Expression<li>[Expression::__construct](#mysql-xdevapi-expression.construct) — Constructor de Expression
  </li>- [mysql_xdevapi\Result](#class.mysql-xdevapi-result) — Clase Result<li>[Result::__construct](#mysql-xdevapi-result.construct) — Constructor de Result
- [Result::getAffectedItemsCount](#mysql-xdevapi-result.getaffecteditemscount) — Devuelve el número de filas afectadas
- [Result::getAutoIncrementValue](#mysql-xdevapi-result.getautoincrementvalue) — Devuelve el valor auto-incrementado
- [Result::getGeneratedIds](#mysql-xdevapi-result.getgeneratedids) — Devuelve los ID generados
- [Result::getWarnings](#mysql-xdevapi-result.getwarnings) — Devuelve las advertencias de la última operación
- [Result::getWarningsCount](#mysql-xdevapi-result.getwarningscount) — Devuelve el número de advertencias de la última operación
  </li>- [mysql_xdevapi\RowResult](#class.mysql-xdevapi-rowresult) — Clase RowResult<li>[RowResult::__construct](#mysql-xdevapi-rowresult.construct) — Constructor de RowResult
- [RowResult::fetchAll](#mysql-xdevapi-rowresult.fetchall) — Devuelve todas las filas del resultado
- [RowResult::fetchOne](#mysql-xdevapi-rowresult.fetchone) — Devuelve una fila del resultado
- [RowResult::getColumnsCount](#mysql-xdevapi-rowresult.getcolumncount) — Devuelve el número de columnas
- [RowResult::getColumnNames](#mysql-xdevapi-rowresult.getcolumnnames) — Devuelve el nombre de todas las columnas
- [RowResult::getColumns](#mysql-xdevapi-rowresult.getcolumns) — Devuelve los metadatos de las columnas
- [RowResult::getWarnings](#mysql-xdevapi-rowresult.getwarnings) — Devuelve las advertencias de la última operación
- [RowResult::getWarningsCount](#mysql-xdevapi-rowresult.getwarningscount) — Devuelve el número de advertencias de la última operación
  </li>- [mysql_xdevapi\Schema](#class.mysql-xdevapi-schema) — Clase Schema<li>[Schema::__construct](#mysql-xdevapi-schema.construct) — Constructor de schema
- [Schema::createCollection](#mysql-xdevapi-schema.createcollection) — Añade una colección al esquema
- [Schema::dropCollection](#mysql-xdevapi-schema.dropcollection) — Elimina una colección del esquema
- [Schema::existsInDatabase](#mysql-xdevapi-schema.existsindatabase) — Verifica si el objeto existe en la base de datos
- [Schema::getCollection](#mysql-xdevapi-schema.getcollection) — Devuelve una colección del esquema
- [Schema::getCollectionAsTable](#mysql-xdevapi-schema.getcollectionastable) — Devuelve una colección como objeto Table
- [Schema::getCollections](#mysql-xdevapi-schema.getcollections) — Devuelve todas las colecciones del esquema
- [Schema::getName](#mysql-xdevapi-schema.getname) — Devuelve el nombre del esquema
- [Schema::getSession](#mysql-xdevapi-schema.getsession) — Devuelve la sesión del esquema
- [Schema::getTable](#mysql-xdevapi-schema.gettable) — Devuelve la tabla del esquema
- [Schema::getTables](#mysql-xdevapi-schema.gettables) — Devuelve las tablas del esquema
  </li>- [mysql_xdevapi\SchemaObject](#class.mysql-xdevapi-schemaobject) — Interfaz SchemaObject<li>[SchemaObject::getSchema](#mysql-xdevapi-schemaobject.getschema) — Devuelve el objeto esquema
  </li>- [mysql_xdevapi\Session](#class.mysql-xdevapi-session) — Clase Session<li>[Session::close](#mysql-xdevapi-session.close) — Cierra la sesión
- [Session::commit](#mysql-xdevapi-session.commit) — Valida la transacción
- [Session::\_\_construct](#mysql-xdevapi-session.construct) — Descripción del constructor
- [Session::createSchema](#mysql-xdevapi-session.createschema) — Crear un nuevo esquema
- [Session::dropSchema](#mysql-xdevapi-session.dropschema) — Elimina un esquema
- [Session::generateUUID](#mysql-xdevapi-session.generateuuid) — Devuelve un nuevo UUID
- [Session::getDefaultSchema](#mysql-xdevapi-session.getdefaultschema) — Devuelve el nombre del esquema predeterminado
- [Session::getSchema](#mysql-xdevapi-session.getschema) — Devuelve un nuevo objeto esquema
- [Session::getSchemas](#mysql-xdevapi-session.getschemas) — Devuelve los esquemas
- [Session::getServerVersion](#mysql-xdevapi-session.getserverversion) — Devuelve la versión del servidor
- [Session::listClients](#mysql-xdevapi-session.listclients) — Devuelve la lista de clientes
- [Session::quoteName](#mysql-xdevapi-session.quotename) — Añade comillas
- [Session::releaseSavepoint](#mysql-xdevapi-session.releasesavepoint) — Libera el punto de salvaguarda
- [Session::rollback](#mysql-xdevapi-session.rollback) — Revierte la transacción
- [Session::rollbackTo](#mysql-xdevapi-session.rollbackto) — Anula la transacción hasta el punto de salvaguarda
- [Session::setSavepoint](#mysql-xdevapi-session.setsavepoint) — Crear un punto de salvaguarda
- [Session::sql](#mysql-xdevapi-session.sql) — Crear una consulta SQL
- [Session::startTransaction](#mysql-xdevapi-session.starttransaction) — Inicia una transacción
  </li>- [mysql_xdevapi\SqlStatement](#class.mysql-xdevapi-sqlstatement) — Clase SqlStatement<li>[SqlStatement::bind](#mysql-xdevapi-sqlstatement.bind) — Liga los argumentos de la instrucción
- [SqlStatement::\_\_construct](#mysql-xdevapi-sqlstatement.construct) — Descripción del constructor
- [SqlStatement::execute](#mysql-xdevapi-sqlstatement.execute) — Ejecuta la operación
- [SqlStatement::getNextResult](#mysql-xdevapi-sqlstatement.getnextresult) — Devuelve el resultado siguiente
- [SqlStatement::getResult](#mysql-xdevapi-sqlstatement.getresult) — Devuelve el resultado
- [SqlStatement::hasMoreResults](#mysql-xdevapi-sqlstatement.hasmoreresults) — Verifica si hay más resultados
  </li>- [mysql_xdevapi\SqlStatementResult](#class.mysql-xdevapi-sqlstatementresult) — Clase SqlStatementResult<li>[SqlStatementResult::__construct](#mysql-xdevapi-sqlstatementresult.construct) — Descripción del constructor
- [SqlStatementResult::fetchAll](#mysql-xdevapi-sqlstatementresult.fetchall) — Devuelve todas las filas del resultado
- [SqlStatementResult::fetchOne](#mysql-xdevapi-sqlstatementresult.fetchone) — Devuelve una sola línea
- [SqlStatementResult::getAffectedItemsCount](#mysql-xdevapi-sqlstatementresult.getaffecteditemscount) — Devuelve el número de filas afectadas
- [SqlStatementResult::getColumnsCount](#mysql-xdevapi-sqlstatementresult.getcolumncount) — Devuelve el número de columnas
- [SqlStatementResult::getColumnNames](#mysql-xdevapi-sqlstatementresult.getcolumnnames) — Devuelve el nombre de las columnas
- [SqlStatementResult::getColumns](#mysql-xdevapi-sqlstatementresult.getcolumns) — Devuelve las columnas
- [SqlStatementResult::getGeneratedIds](#mysql-xdevapi-sqlstatementresult.getgeneratedids) — Devuelve los identificadores generados
- [SqlStatementResult::getLastInsertId](#mysql-xdevapi-sqlstatementresult.getlastinsertid) — Devuelve el ID de la última inserción
- [SqlStatementResult::getWarnings](#mysql-xdevapi-sqlstatementresult.getwarnings) — Devuelve las advertencias de la última operación
- [SqlStatementResult::getWarningsCount](#mysql-xdevapi-sqlstatementresult.getwarningcount) — Devuelve el número de advertencias de la última operación
- [SqlStatementResult::hasData](#mysql-xdevapi-sqlstatementresult.hasdata) — Verifica si el resultado contiene datos
- [SqlStatementResult::nextResult](#mysql-xdevapi-sqlstatementresult.nextresult) — Devuelve el resultado siguiente
  </li>- [mysql_xdevapi\Statement](#class.mysql-xdevapi-statement) — Clase Statement<li>[Statement::__construct](#mysql-xdevapi-statement.construct) — Descripción del constructor
- [Statement::getNextResult](#mysql-xdevapi-statement.getnextresult) — Devuelve el resultado siguiente
- [Statement::getResult](#mysql-xdevapi-statement.getresult) — Devuelve el resultado
- [Statement::hasMoreResults](#mysql-xdevapi-statement.hasmoreresults) — Verifica si hay más resultados
  </li>- [mysql_xdevapi\Table](#class.mysql-xdevapi-table) — Clase Table<li>[Table::__construct](#mysql-xdevapi-table.construct) — Constructor de Table
- [Table::count](#mysql-xdevapi-table.count) — Devuelve el número de filas
- [Table::delete](#mysql-xdevapi-table.delete) — Elimina filas de la tabla
- [Table::existsInDatabase](#mysql-xdevapi-table.existsindatabase) — Verifica si la tabla existe en la base de datos
- [Table::getName](#mysql-xdevapi-table.getname) — Devuelve el nombre de la tabla
- [Table::getSchema](#mysql-xdevapi-table.getschema) — Devuelve el esquema de la tabla
- [Table::getSession](#mysql-xdevapi-table.getsession) — Devuelve la sesión de la tabla
- [Table::insert](#mysql-xdevapi-table.insert) — Inserta filas en una tabla
- [Table::isView](#mysql-xdevapi-table.isview) — Devuelve si la tabla es una vista
- [Table::select](#mysql-xdevapi-table.select) — Selecciona filas en una tabla
- [Table::update](#mysql-xdevapi-table.update) — Actualiza las filas de la tabla
  </li>- [mysql_xdevapi\TableDelete](#class.mysql-xdevapi-tabledelete) — Clase TableDelete<li>[TableDelete::bind](#mysql-xdevapi-tabledelete.bind) — Liga los argumentos de la petición de eliminación
- [TableDelete::\_\_construct](#mysql-xdevapi-tabledelete.construct) — Constructor de TableDelete
- [TableDelete::execute](#mysql-xdevapi-tabledelete.execute) — Ejecuta la consulta de eliminación
- [TableDelete::limit](#mysql-xdevapi-tabledelete.limit) — Limita las filas eliminadas
- [TableDelete::orderby](#mysql-xdevapi-tabledelete.orderby) — Define los criterios de ordenación de la eliminación
- [TableDelete::where](#mysql-xdevapi-tabledelete.where) — Define la condición de búsqueda para la eliminación
  </li>- [mysql_xdevapi\TableInsert](#class.mysql-xdevapi-tableinsert) — Clase TableInsert<li>[TableInsert::__construct](#mysql-xdevapi-tableinsert.construct) — Constructor de TableInsert
- [TableInsert::execute](#mysql-xdevapi-tableinsert.execute) — Ejecuta una consulta de inserción
- [TableInsert::values](#mysql-xdevapi-tableinsert.values) — Añade valores de fila
  </li>- [mysql_xdevapi\TableSelect](#class.mysql-xdevapi-tableselect) — Clase TableSelect<li>[TableSelect::bind](#mysql-xdevapi-tableselect.bind) — Liga los argumentos de la petición select
- [TableSelect::\_\_construct](#mysql-xdevapi-tableselect.construct) — Constructor de TableSelect
- [TableSelect::execute](#mysql-xdevapi-tableselect.execute) — Ejecuta una declaración select
- [TableSelect::groupBy](#mysql-xdevapi-tableselect.groupby) — Define los criterios de agrupación de la selección
- [TableSelect::having](#mysql-xdevapi-tableselect.having) — Define la condición de agrupamiento
- [TableSelect::limit](#mysql-xdevapi-tableselect.limit) — Limita las filas seleccionadas
- [TableSelect::lockExclusive](#mysql-xdevapi-tableselect.lockexclusive) — Ejecuta EXCLUSIVE LOCK
- [TableSelect::lockShared](#mysql-xdevapi-tableselect.lockshared) — Ejecuta SHARED LOCK
- [TableSelect::offset](#mysql-xdevapi-tableselect.offset) — Define el desplazamiento del límite
- [TableSelect::orderby](#mysql-xdevapi-tableselect.orderby) — Define los criterios de ordenación de la selección
- [TableSelect::where](#mysql-xdevapi-tableselect.where) — Define los criterios de búsqueda de la selección
  </li>- [mysql_xdevapi\TableUpdate](#class.mysql-xdevapi-tableupdate) — Clase TableUpdate<li>[TableUpdate::bind](#mysql-xdevapi-tableupdate.bind) — Liga los argumentos de la solicitud de actualización
- [TableUpdate::\_\_construct](#mysql-xdevapi-tableupdate.construct) — Constructor de TableUpdate
- [TableUpdate::execute](#mysql-xdevapi-tableupdate.execute) — Ejecuta la consulta de actualización
- [TableUpdate::limit](#mysql-xdevapi-tableupdate.limit) — Limita el número de filas actualizadas
- [TableUpdate::orderby](#mysql-xdevapi-tableupdate.orderby) — Define los criterios de ordenación
- [TableUpdate::set](#mysql-xdevapi-tableupdate.set) — Añade un campo a actualizar
- [TableUpdate::where](#mysql-xdevapi-tableupdate.where) — Define el filtro de búsqueda
  </li>- [mysql_xdevapi\Warning](#class.mysql-xdevapi-warning) — Clase Warning<li>[Warning::__construct](#mysql-xdevapi-warning.construct) — Constructor de Warning
  </li>
