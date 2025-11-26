# Apache

# Introducción

Estas funciones sólo están disponibles cuando se ejecuta PHP como módulo de Apache.

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#apache.installation)
- [Configuración en tiempo de ejecución](#apache.configuration)

    ## Instalación

    Para instalar PHP en Apache, vea el [capítulo de instalación](#install).

## Configuración en tiempo de ejecución

El comportamiento del módulo de PHP de Apache está regido por los valores definidos en php.ini.
Estos valores de configuración definidos en php.ini pueden ser sobreescritos por la configuración del
[php_flag](#configuration.changes.apache) definidos en el fichero de configuración
del servidor o por los ficheros .htaccess locales.

**Ejemplo #1 Desactivar el intérprete de PHP en un directorio utilizando .htaccess**

php_flag engine off

   <caption>**Opciones de configuración de Apache**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [engine](#ini.engine)
      "1"
      **[INI_ALL](#constant.ini-all)**
       



      [child_terminate](#ini.child-terminate)
      "0"
      **[INI_ALL](#constant.ini-all)**
       



      [last_modified](#ini.last-modified)
      "0"
      **[INI_ALL](#constant.ini-all)**
       



      [xbithack](#ini.xbithack)
      "0"
      **[INI_ALL](#constant.ini-all)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     engine
     [bool](#language.types.boolean)



      Activa o desactiva la ejecución de PHP.
      Esta directiva se puede utilizar sólo en la versión de PHP
      como módulo de Apache. Se usa en los sitios que deseen controlar
      la activación o desactivación del PHP en cada directorio o servidor
      virtual. Al establecer **engine off**
      en los lugares apropiados en el archivo httpd.conf, PHP puede
      ser activado o desactivado.







     child_terminate
     [bool](#language.types.boolean)



      Especifica si los scripts PHP pueden solicitar la finalización de los procesos hijos al finalizar la petición,
      véase también [apache_child_terminate()](#function.apache-child-terminate).







     last_modified
     [bool](#language.types.boolean)



      Envía la fecha de modificación de los scripts PHP con la cabecera 'Last-Modified:' para estas peticiones.







     xbithack
     [bool](#language.types.boolean)



      Analiza los ficheros con bit de ejecución establecido para PHP, con independencia de la extensión del fichero


# Funciones de Apache

# apache_child_terminate

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

apache_child_terminate — Termina el proceso Apache después de esta petición

### Descripción

**apache_child_terminate**(): [void](language.types.void.html)

**apache_child_terminate()** programa el proceso
Apache para que se termine una vez finalizada la petición PHP actual.
Esto puede servir para terminar un proceso después de un script que
hubiera consumido mucha memoria. En efecto, la memoria es generalmente
liberada de manera interna, pero no devuelta al sistema.

Funciona con los servidores web Apache y FastCGI.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Notas

**Nota**:
Esta función no está implementada en las plataformas Windows.

### Ver también

    - [exit()](#function.exit) - Terminar el script en curso con un código de estado o un mensaje

# apache_get_modules

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

apache_get_modules — Devuelve la lista de módulos Apache cargados

### Descripción

**apache_get_modules**(): [array](#language.types.array)

Devuelve la lista de módulos Apache cargados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array que contiene los módulos Apache cargados.

### Ejemplos

    **Ejemplo #1 Ejemplo con apache_get_modules()**

&lt;?php
print_r(apache_get_modules());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; core
[1] =&gt; http_core
[2] =&gt; mod_so
[3] =&gt; sapi_apache2
[4] =&gt; mod_mime
[5] =&gt; mod_rewrite
)

# apache_get_version

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

apache_get_version — Obtiene la versión de Apache

### Descripción

**apache_get_version**(): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene la versión de Apache.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la versión de Apache en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con apache_get_version()**

&lt;?php
$version = apache_get_version();
echo "$version\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

Apache/1.3.29 (Unix) PHP/4.3.4

### Ver también

    - [phpinfo()](#function.phpinfo) - Muestra numerosas informaciones sobre la configuración de PHP

# apache_getenv

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

apache_getenv — Lee una variable de proceso Apache

### Descripción

**apache_getenv**([string](#language.types.string) $variable, [bool](#language.types.boolean) $walk_to_top = **[false](#constant.false)**): [string](#language.types.string)|[false](#language.types.singleton)

Recupera una variable de entorno de Apache.

### Parámetros

     variable


       La variable de entorno Apache.






     walk_to_top


       Si se pasa a **[true](#constant.true)**, se recupera la variable de nivel superior disponible
       para todas las capas de Apache.





### Valores devueltos

El valor de la variable de entorno de Apache en caso de éxito o
**[false](#constant.false)** en caso de fallo.

### Ejemplos

    **Ejemplo #1 Ejemplo con apache_getenv()**



     El siguiente ejemplo muestra cómo recuperar el valor de la variable
     de entorno SERVER_ADDR.

&lt;?php
$ret = apache_getenv("SERVER_ADDR");
echo $ret;
?&gt;

    Resultado del ejemplo anterior es similar a:

42.24.42.240

### Ver también

    - [apache_setenv()](#function.apache-setenv) - Establece una variable subprocess_env de Apache

    - [getenv()](#function.getenv) - Retorna el valor de una o todas las variables de entorno

    -
     [Superglobales](#language.variables.superglobals)

# apache_lookup_uri

(PHP 4, PHP 5, PHP 7, PHP 8)

apache_lookup_uri —
Realiza una petición parcial para el URI especificado
y devuelve toda la información relacionada con el mismo

### Descripción

**apache_lookup_uri**([string](#language.types.string) $filename): [object](#language.types.object)|[false](#language.types.singleton)

Esta función realiza una petición parcial
para el URI especificado. Esta petición permite simplemente obtener toda la
información importante sobre el recurso concernido.

Esta función
es soportada cuando PHP está instalado como módulo de Apache.

### Parámetros

     filename


       El nombre del fichero (URI) que será solicitado.





### Valores devueltos

Un objeto con la información relativa al URI. Las propiedades del objeto son
las siguientes :

    - status

    - the_request

    - status_line

    - method

    - content_type

    - handler

    - uri

    - filename

    - path_info

    - args

    - boundary

    - no_cache

    - no_local_copy

    - allowed

    - send_bodyct

    - bytes_sent

    - byterange

    - clength

    - unparsed_uri

    - mtime

    - request_time

Devuelve **[false](#constant.false)** en caso de fallo.

### Ejemplos

    **Ejemplo #1 Ejemplo con apache_lookup_uri()**

&lt;?php
$info = apache_lookup_uri('index.php?var=value');
print_r($info);

if (file_exists($info-&gt;filename)) {
echo '¡El fichero existe!';
}
?&gt;

    Resultado del ejemplo anterior es similar a:

stdClass Object
(
[status] =&gt; 200
[the_request] =&gt; GET /dir/file.php HTTP/1.1
[method] =&gt; GET
[mtime] =&gt; 0
[clength] =&gt; 0
[chunked] =&gt; 0
[content_type] =&gt; application/x-httpd-php
[no_cache] =&gt; 0
[no_local_copy] =&gt; 1
[unparsed_uri] =&gt; /dir/index.php?var=value
[uri] =&gt; /dir/index.php
[filename] =&gt; /home/htdocs/dir/index.php
[args] =&gt; var=value
[allowed] =&gt; 0
[sent_bodyct] =&gt; 0
[bytes_sent] =&gt; 0
[request_time] =&gt; 1074282764
)
¡El fichero existe!

# apache_note

(PHP 4, PHP 5, PHP 7, PHP 8)

apache_note — Muestra o asigna la tabla de notas de Apache

### Descripción

**apache_note**([string](#language.types.string) $note_name, [?](#language.types.null)[string](#language.types.string) $note_value = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

Esta función es una abstracción de los comandos table_get y
table_set de Apache. Edita la tabla de notas que existe durante una
petición. El propósito de esta tabla es permitir que los módulos de Apache se comuniquen.

La utilidad de la función **apache_note()** es pasar información
de un módulo a otro, durante la misma petición.

### Parámetros

     note_name


       El nombre de la nota.






     note_value


       El valor de la nota.





### Valores devueltos

Si note_value es omitido o **[null](#constant.null)**, devuelve
el valor actual de la variable note_name. De lo contrario,
asigna a la nota note_name
el valor note_value y
devolverá el valor anterior de la variable note_name.
Si la nota no puede ser recuperada, **[false](#constant.false)** es devuelto.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       note_value ahora es nullable.



### Ejemplos

    **Ejemplo #1 Pasaje de información entre PHP y Perl**

&lt;?php

apache_note('name', 'Fredrik Ekengren');

// Llamada al script Perl
virtual("/perl/some_script.pl");

$result = apache_note("resultdata");
?&gt;

# Recuperación del objeto de petición Apache

my $r = Apache-&gt;request()-&gt;main();

# Recuperación de los datos pasados

my $name = $r-&gt;notes('name');

# Procesamiento

# Envío del resultado hacia PHP

$r-&gt;notes('resultdata', $result);

    **Ejemplo #2 Valores de identificación en el archivo access.log**

&lt;?php

apache_note('sessionID', session_id());

?&gt;

# "%{sessionID}n" puede ser utilizado en la directiva LogFormat

### Ver también

    - [virtual()](#function.virtual) - Efectúa una subpetición Apache

# apache_request_headers

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

apache_request_headers — Recupera todos los encabezados HTTP de la petición

### Descripción

**apache_request_headers**(): [array](#language.types.array)

Recupera todos los encabezados HTTP de la petición actual.
Funciona con los servidores web Apache, FastCGI, CLI, y FPM.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array asociativo con todos los encabezados HTTP de la petición actual.

### Historial de cambios

       Versión
       Descripción







       7.3.0

        Esta función se hace disponible para la API de servidor (SAPI) FPM (FastCGI Process Manager).





### Ejemplos

    **Ejemplo #1 Ejemplo con apache_request_headers()**

&lt;?php
$headers = apache_request_headers();

foreach ($headers as $header =&gt; $value) {
    echo "$header: $value &lt;br /&gt;\n";
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Accept: _/_
Accept-Language: en-us
Accept-Encoding: gzip, deflate
User-Agent: Mozilla/4.0
Host: www.example.com
Connection: Keep-Alive

### Notas

**Nota**:

    También pueden obtenerse los valores de las variables CGI comunes
    leyéndolas en el entorno, lo cual funciona, ya sea en módulo Apache
    o no. Utilice la función [phpinfo()](#function.phpinfo) para conocer la lista de
    [variables de entorno](#language.variables.predefined)
    disponibles.

### Ver también

    - [apache_response_headers()](#function.apache-response-headers) - Recupera todos los encabezados de respuesta HTTP

# apache_response_headers

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

apache_response_headers — Recupera todos los encabezados de respuesta HTTP

### Descripción

**apache_response_headers**(): [array](#language.types.array)

Recupera todos los encabezados de respuesta HTTP.
Funciona con los servidores web Apache, FastCGI, CLI y FPM.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array de todos los encabezados de respuesta de Apache en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con apache_response_headers()**

&lt;?php
print_r(apache_response_headers());
?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[Accept-Ranges] =&gt; bytes
[X-Powered-By] =&gt; PHP/4.3.8
)

### Ver también

    - [apache_request_headers()](#function.apache-request-headers) - Recupera todos los encabezados HTTP de la petición

    - [headers_sent()](#function.headers-sent) - Indica si los encabezados HTTP ya han sido enviados

    - [headers_list()](#function.headers-list) - Devuelve la lista de los encabezados de respuesta del script actual

# apache_setenv

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

apache_setenv — Establece una variable subprocess_env de Apache

### Descripción

**apache_setenv**([string](#language.types.string) $variable, [string](#language.types.string) $value, [bool](#language.types.boolean) $walk_to_top = **[false](#constant.false)**): [bool](#language.types.boolean)

**apache_setenv()** establece el valor de la variable de entorno de Apache especificado por
variable.

**Nota**:

    Al establecer una variable de entorno de Apache, la correspondiente variable
    [$_SERVER](#reserved.variables.server)
    no se modifica.

### Parámetros

     variable


       La variable de entorno que se desea establecer.






     value


       El nuevo valor de variable.






     walk_to_top


       Indica si se va a establecer la variable de nivel superior disponible para todas las capas de Apache.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Estableciendo una variable de entorno de Apache usando apache_setenv()**

&lt;?php
apache_setenv("VARIABLE_EJEMPLO", "Valor de ejemplo");
?&gt;

### Notas

**Nota**:

    **apache_setenv()** puede ser utilizado con
    [apache_getenv()](#function.apache-getenv) en páginas separadas o para establecer variables para pasar Server Side Includes (.shtml)
     que hayan sido incluidos en sprits PHP.

### Ver también

    - [apache_getenv()](#function.apache-getenv) - Lee una variable de proceso Apache

# getallheaders

(PHP 4, PHP 5, PHP 7, PHP 8)

getallheaders — Recupera todos los encabezados de la petición HTTP

### Descripción

**getallheaders**(): [array](#language.types.array)

Recupera todos los encabezados de la petición HTTP.

Esta función es un alias de la función
[apache_request_headers()](#function.apache-request-headers). Consúltense la documentación de
[apache_request_headers()](#function.apache-request-headers) para obtener más información sobre el funcionamiento de esta función.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array asociativo con todos los encabezados HTTP de la petición actual.

### Historial de cambios

       Versión
       Descripción






       7.3.0

        Esta función se hace disponible para la API servidor (SAPI) FPM (FastCGI Process Manager).





### Ejemplos

    **Ejemplo #1 Ejemplo con getallheaders()**

&lt;?php

foreach (getallheaders() as $name =&gt; $value) {
    echo "$name: $value\n";
}

?&gt;

### Ver también

    - [apache_response_headers()](#function.apache-response-headers) - Recupera todos los encabezados de respuesta HTTP

# virtual

(PHP 4, PHP 5, PHP 7, PHP 8)

virtual — Efectúa una subpetición Apache

### Descripción

**virtual**([string](#language.types.string) $uri): [bool](#language.types.boolean)

**virtual()** es una función específica del
servidor Apache. Es similar a la directiva
"&lt;!--#include virtual...--&gt;" cuando se
utiliza el módulo mod_include de Apache.
Esta función efectúa una subpetición Apache.
Es muy útil cuando se desea analizar scripts CGI, archivos
.shtml o cualquier otro tipo de archivo a través del servidor Apache. Se debe tener en cuenta que al utilizarse con scripts CGI, estos deben generar un encabezado válido, es decir, al menos un encabezado Content-Type.

Para ejecutar una subpetición, todos los búferes son detenidos y vaciados hacia el navegador, los encabezados restantes también lo son.

### Parámetros

     uri


       El archivo sobre el cual se ejecutará el comando virtual.





### Valores devueltos

Ejecuta un comando virtual en caso de éxito o devuelve **[false](#constant.false)** en caso de error.

### Ejemplos

Ver la función [apache_note()](#function.apache-note) para un ejemplo.

### Notas

**Advertencia**

    La cadena requerida puede ser pasada al archivo incluido, pero [$_GET](#reserved.variables.get) es copiado desde el script padre y solo la variable [$_SERVER['QUERY_STRING']](#reserved.variables.server) es transmitida al pasar la cadena requerida. La cadena requerida pasada funciona únicamente bajo Apache 2. Los archivos solicitados no son listados en los logs de acceso de Apache.

**Nota**:

    Las variables de entorno establecidas en el archivo solicitado no son visibles en el archivo llamador.

**Nota**:

    Esta función puede ser utilizada sobre archivos PHP. Sin embargo, se recomienda utilizar [include](#function.include) o [require](#function.require) para archivos PHP.

### Ver también

    - [apache_note()](#function.apache-note) - Muestra o asigna la tabla de notas de Apache

## Tabla de contenidos

- [apache_child_terminate](#function.apache-child-terminate) — Termina el proceso Apache después de esta petición
- [apache_get_modules](#function.apache-get-modules) — Devuelve la lista de módulos Apache cargados
- [apache_get_version](#function.apache-get-version) — Obtiene la versión de Apache
- [apache_getenv](#function.apache-getenv) — Lee una variable de proceso Apache
- [apache_lookup_uri](#function.apache-lookup-uri) — Realiza una petición parcial para el URI especificado
  y devuelve toda la información relacionada con el mismo
- [apache_note](#function.apache-note) — Muestra o asigna la tabla de notas de Apache
- [apache_request_headers](#function.apache-request-headers) — Recupera todos los encabezados HTTP de la petición
- [apache_response_headers](#function.apache-response-headers) — Recupera todos los encabezados de respuesta HTTP
- [apache_setenv](#function.apache-setenv) — Establece una variable subprocess_env de Apache
- [getallheaders](#function.getallheaders) — Recupera todos los encabezados de la petición HTTP
- [virtual](#function.virtual) — Efectúa una subpetición Apache

- [Introducción](#intro.apache)
- [Instalación/Configuración](#apache.setup)<li>[Instalación](#apache.installation)
- [Configuración en tiempo de ejecución](#apache.configuration)
  </li>- [Funciones de Apache](#ref.apache)<li>[apache_child_terminate](#function.apache-child-terminate) — Termina el proceso Apache después de esta petición
- [apache_get_modules](#function.apache-get-modules) — Devuelve la lista de módulos Apache cargados
- [apache_get_version](#function.apache-get-version) — Obtiene la versión de Apache
- [apache_getenv](#function.apache-getenv) — Lee una variable de proceso Apache
- [apache_lookup_uri](#function.apache-lookup-uri) — Realiza una petición parcial para el URI especificado
  y devuelve toda la información relacionada con el mismo
- [apache_note](#function.apache-note) — Muestra o asigna la tabla de notas de Apache
- [apache_request_headers](#function.apache-request-headers) — Recupera todos los encabezados HTTP de la petición
- [apache_response_headers](#function.apache-response-headers) — Recupera todos los encabezados de respuesta HTTP
- [apache_setenv](#function.apache-setenv) — Establece una variable subprocess_env de Apache
- [getallheaders](#function.getallheaders) — Recupera todos los encabezados de la petición HTTP
- [virtual](#function.virtual) — Efectúa una subpetición Apache
  </li>
