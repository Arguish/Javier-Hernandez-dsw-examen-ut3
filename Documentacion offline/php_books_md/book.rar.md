# Archivos Rar

# Introducción

Rar es un potente y eficaz archivador creado por Eugene Roshal.
Esta extensión proporciona la posibilidad de leer archivos Rar, pero
no soporta la escritura de los mismos, ya que no es compatible con
la biblioteca UnRar y está directamente prohibido por su licencia.

Se puede encontrar más información sobre Rar y UnRar en [» http://www.rarlabs.com/](http://www.rarlabs.com/).

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#rar.installation)
- [Tipos de recursos](#rar.resources)

    ## Instalación

    Rar está actualmente disponible a través de PECL
    [» https://pecl.php.net/package/rar](https://pecl.php.net/package/rar).

    Puede utilizarse el asistente de instalación PECL para instalar la extensión
    Rar, utilizando el siguiente comando: **pecl -v install rar**.

    Asimismo, puede descargarse el paquete tar.gz e instalarse
    Rar manualmente:

    **Ejemplo #1 Instalación de Rar**

gunzip rar-xxx.tgz
tar -xvf rar-xxx.tar
cd rar-xxx
phpize
./configure &amp;&amp; make &amp;&amp; make install

Los usuarios de Windows deben activar la biblioteca
php_rar.dll en el archivo php.ini
para utilizar estas funciones.

## Tipos de recursos

Esta extensión registra 3 clases internas:
La representación del archivo retornada por la función
[rar_open()](#rararchive.open) – [RarArchive](#class.rararchive),
la representación de las entradas retornadas por
las funciones [rar_list()](#rararchive.getentries) y
[rar_entry_get()](#rararchive.getentry) – [RarEntry](#class.rarentry)
y las excepciones de tipo [RarException](#class.rarexception).

Esta extensión registra también un flujo de recurso llamado "rar"
y un gestor de url llamado "rar wrapper", registrado bajo el prefijo
"rar".

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[RAR_HOST_MSDOS](#constant.rar-host-msdos)**
    ([int](#language.types.integer))



     Use [**<a href="#rarentry.constants.host-msdos">RarEntry::HOST_MSDOS](#rarentry.constants.host-msdos)**</a> en su lugar.





    **[RAR_HOST_OS2](#constant.rar-host-os2)**
    ([int](#language.types.integer))



     Use [**<a href="#rarentry.constants.host-os2">RarEntry::HOST_OS2](#rarentry.constants.host-os2)**</a> en su lugar.





    **[RAR_HOST_WIN32](#constant.rar-host-win32)**
    ([int](#language.types.integer))



     Use [**<a href="#rarentry.constants.host-win32">RarEntry::HOST_WIN32](#rarentry.constants.host-win32)**</a> en su lugar.





    **[RAR_HOST_UNIX](#constant.rar-host-unix)**
    ([int](#language.types.integer))



     Use [**<a href="#rarentry.constants.host-unix">RarEntry::HOST_UNIX](#rarentry.constants.host-unix)**</a> en su lugar.





    **[RAR_HOST_BEOS](#constant.rar-host-beos)**
    ([int](#language.types.integer))



     Use [**<a href="#rarentry.constants.host-beos">RarEntry::HOST_BEOS](#rarentry.constants.host-beos)**</a> en su lugar.

# Ejemplos

Ver también [rar://](#wrappers.rar).

**Ejemplo #1 Descompresión "al vuelo"**

&lt;?php

if (!array_key_exists("i", $_GET) || !is_numeric($\_GET["i"]))
die("Index unspecified or non-numeric");
$index = (int) $\_GET["i"];

$arch = RarArchive::open("example.rar");
if ($arch === FALSE)
die("Cannot open example.rar");

$entries = $arch-&gt;getEntries();
if ($entries === FALSE)
die("Cannot retrieve entries");

if (!array_key_exists($index, $entries))
die("No such index: $index");

$orfilename = $entries[$index]-&gt;getName(); //UTF-8 encoded

$filesize = $entries[$index]-&gt;getUnpackedSize();

/\* you could check HTTP_IF_MODIFIED_SINCE here and compare with

- $entries[$index]-&gt;getFileTime(). You could also send a
- "Last modified" header \*/

$fp = $entries[$index]-&gt;getStream();
if ($fp === FALSE)
die("Cannot open file with index $index insided the archive.");

$arch-&gt;close(); //no longer needed; stream is independent

function detectUserAgent() {
if (!array_key_exists('HTTP_USER_AGENT', $\_SERVER))
return "Other";

    $uas = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match("@Opera/@", $uas))
        return "Opera";
    if (preg_match("@Firefox/@", $uas))
        return "Firefox";
    if (preg_match("@Chrome/@", $uas))
        return "Chrome";
    if (preg_match("@MSIE ([0-9.]+);@", $uas, $matches)) {
        if (((float) $matches[1]) &gt;= 7.0)
            return "IE";
    }

    return "Other";

}

/\*

- We have 3 options:
-   - For FF and Opera, which support RFC 2231, use that format.
-   - For IE and Chrome, use attwithfnrawpctenclong
- (http://greenbytes.de/tech/tc2231/#attwithfnrawpctenclong)
-   - For the others, convert to ISO-8859-1, if possible
      _/
      $formatRFC2231 = 'Content-Disposition: attachment; filename_=UTF-8\'\'%s';
      $formatDef = 'Content-Disposition: attachment; filename="%s"';

switch (detectUserAgent()) {
case "Opera":
case "Firefox":
$orfilename = rawurlencode($orfilename);
$format = $formatRFC2231;
break;

    case "IE":
    case "Chrome":
        $orfilename = rawurlencode($orfilename);
        $format = $formatDef;
        break;
    default:
        if (function_exists('iconv'))
            $orfilename =
                @iconv("UTF-8", "ISO-8859-1//TRANSLIT", $orfilename);
        $format = $formatDef;

}

header(sprintf($format, $orfilename));
//cannot send error messages from now on (headers already sent)

//replace by real content type, perhaps infering from the file extension
$contentType = "application/octet-stream";
header("Content-Type: $contentType");

header("Content-Transfer-Encoding: binary");

header("Content-Length: $filesize");

if ($\_SERVER['REQUEST_METHOD'] == "HEAD")
die();

while (!feof($fp)) {
    $s = @fread($fp, 8192);
if ($s === false)
break; //useless to send error messages

    echo $s;

}
?&gt;

En este ejemplo se obtiene el archivo que contiene el archivo RAR y se ofrece para descargar.

**Ejemplo #2 Ejemplo de sistema de extracción de archivos Rar**

&lt;?php

$rar_file = rar_open('example.rar') or die("Can't open Rar archive");

$entries = rar_list($rar_file);

foreach ($entries as $entry) {
echo 'Filename: ' . $entry-&gt;getName() . "\n";
echo 'Packed size: ' . $entry-&gt;getPackedSize() . "\n";
echo 'Unpacked size: ' . $entry-&gt;getUnpackedSize() . "\n";

    $entry-&gt;extract('/dir/extract/to/');

}

rar_close($rar_file);

?&gt;

Este ejemplo extrae cada archivo del archivo Rar en el directorio especificado.

# Funciones Rar

# rar_wrapper_cache_stats

(PECL rar &gt;= 3.0.0)

rar_wrapper_cache_stats — Caché de aciertos y errores del URL wrapper

### Descripción

**rar_wrapper_cache_stats**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [rar_wrapper_cache_stats](#function.rar-wrapper-cache-stats) — Caché de aciertos y errores del URL wrapper

# La clase RarArchive

(PECL rar &gt;= 2.0.0)

## Introducción

    Esta clase representa un archivo RAR que puede estar formado por varios volúmenes (partes) y que contiene
    una serie de entradas RAR (por ejemplo: archivos, directorios y otros objetos especiales, como enlaces simbólicos).




    Los objetos de esta clase puede ser atravesado, dando las entradas almacenadas en el archivo RAR respectivamente.
    Estas entradas también pueden ser obtenidas mediante [RarArchive::getEntry()](#rararchive.getentry) y
    [RarArchive::getEntries()](#rararchive.getentries).

## Sinopsis de la Clase

    ****




      final
      class **RarArchive**


     implements
       [Traversable](#class.traversable) {


    /* Métodos */

public [close](#rararchive.close)(): [bool](#language.types.boolean)
public [getComment](#rararchive.getcomment)(): [string](#language.types.string)
public [getEntries](#rararchive.getentries)(): [array](#language.types.array)|[false](#language.types.singleton)
public [getEntry](#rararchive.getentry)([string](#language.types.string) $entryname): [RarEntry](#class.rarentry)|[false](#language.types.singleton)
public [isBroken](#rararchive.isbroken)(): [bool](#language.types.boolean)
public [isSolid](#rararchive.issolid)(): [bool](#language.types.boolean)
public static [open](#rararchive.open)([string](#language.types.string) $filename, [string](#language.types.string) $password = NULL, [callable](#language.types.callable) $volume_callback = NULL): [RarArchive](#class.rararchive)|[false](#language.types.singleton)
public [setAllowBroken](#rararchive.setallowbroken)([bool](#language.types.boolean) $allow_broken): [bool](#language.types.boolean)
public [\_\_toString](#rararchive.tostring)(): [string](#language.types.string)

}

# RarArchive::close

# rar_close

(PECL rar &gt;= 2.0.0)

RarArchive::close -- rar_close — Cerrar archivo RAR y liberar todos los recursos

### Descripción

Estilo orientado a objetos (método):

public **RarArchive::close**(): [bool](#language.types.boolean)

Estilo procedimental:

**rar_close**([RarArchive](#class.rararchive) $rarfile): [bool](#language.types.boolean)

Cerar archivo RAR y liberar todos los recursos asignados.

### Parámetros

     rarfile


       Un objeto [RarArchive](#class.rararchive), abierto con [rar_open()](#rararchive.open).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL rar 2.0.0

        Las entradas RAR devueltas por [RarArchive::getEntry()](#rararchive.getentry)
        y [RarArchive::getEntries()](#rararchive.getentries) son ahora invalidadas cuando
        se llama a este método. Esto significa que todos los métodos de instancia llamados por
        tales entradas y no garantizan el éxito.





### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$rar_arch = RarArchive::open('latest_winrar.rar');
echo $rar_arch."\n";
$rar_arch-&gt;close();
echo $rar_arch."\n";
?&gt;

     Resultado del ejemplo anterior es similar a:




RAR Archive "D:\php_rar\trunk\tests\latest_winrar.rar"
RAR Archive "D:\php_rar\trunk\tests\latest_winrar.rar" (closed)

    **Ejemplo #2 Estilo procedimental**

&lt;?php
$rar_arch = rar_open('latest_winrar.rar');
echo $rar_arch."\n";
rar_close($rar_arch);
echo $rar_arch."\n";
?&gt;

# RarArchive::getComment

# rar_comment_get

(PECL rar &gt;= 2.0.0)

RarArchive::getComment -- rar_comment_get — Obtener comentarios de texto desde el archivo RAR

### Descripción

Estilo orientado a objetos (method):

public **RarArchive::getComment**(): [string](#language.types.string)

Estilo procedimental:

**rar_comment_get**([RarArchive](#class.rararchive) $rarfile): [string](#language.types.string)

Obtener (global) comentario almacenado en el archivo RAR. Este puede ser de hasta 64 KiB de longitud.

**Nota**:

    Esta extensión no es compatible con los comentarios en el nivel de entrada.

### Parámetros

     rarfile


       Un objeto [RarArchive](#class.rararchive), abierto con [rar_open()](#rararchive.open).





### Valores devueltos

Devuelve el comentario o **[null](#constant.null)** si no hay ninguno.

**Nota**:

      RAR no tiene actualmente soporte para comentarios unicode. La codificación de los
      resultados de esta función no es especificado, pero esta debe ser probablemente
      Windows-1252.

### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$rar_arch = RarArchive::open('commented.rar');
echo $rar_arch-&gt;getComment();
?&gt;

     Resultado del ejemplo anterior es similar a:




This is the comment of the file commented.rar.

    **Ejemplo #2 Estilo procedimental**

&lt;?php
$rar_arch = rar_open('commented.rar');
echo rar_comment_get($rar_arch);
?&gt;

# RarArchive::getEntries

# rar_list

(PECL rar &gt;= 2.0.0)

RarArchive::getEntries -- rar_list — Obtener la lista completa de entradas del archivo RAR

### Descripción

Estilo orientado a objetos (método):

public **RarArchive::getEntries**(): [array](#language.types.array)|[false](#language.types.singleton)

Estilo procedimental:

**rar_list**([RarArchive](#class.rararchive) $rarfile): [array](#language.types.array)|[false](#language.types.singleton)

Obtener la lista de entradas (archivos y directorios) de el archivo RAR.

**Nota**:

    Si el archivo tiene
    entradas con el mismo nombre, este método, junto con [RarArchive](#class.rararchive)
    foreach iteraciona y otorga un acceso array-like con índices numéricos,
    únicos para acceder a todas las entradas (por ejemplo,
    [RarArchive::getEntry()](#rararchive.getentry) y el [
    rar:// wrapper](#wrappers.rar) son insuficientes).

### Parámetros

     rarfile


       Un objeto [RarArchive](#class.rararchive), abierto con [rar_open()](#rararchive.open).





### Valores devueltos

**rar_list()** devuelve array de objetos [RarEntry](#class.rarentry)
o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL rar 3.0.0

        Soporte para archivos RAR con nombres entrada repetidos que ya no produce deficiencias.





### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$rar_arch = RarArchive::open('solid.rar');
if ($rar_arch === FALSE)
die("Could not open RAR archive.");

$rar_entries = $rar_arch-&gt;getEntries();
if ($rar_entries === FALSE)
die("Could retrieve entries.");

echo "Found " . count($rar_entries) . " entries.\n";

foreach ($rar_entries as $e) {
    echo $e;
    echo "\n";
}
$rar_arch-&gt;close();
?&gt;

     Resultado del ejemplo anterior es similar a:




Found 2 entries.
RarEntry for file "tese.txt" (23b93a7a)
RarEntry for file "unrardll.txt" (2ed64b6e)

    **Ejemplo #2 Estilo procedimental**

&lt;?php
$rar_arch = rar_open('solid.rar');
if ($rar_arch === FALSE)
die("Could not open RAR archive.");

$rar_entries = rar_list($rar_arch);
if ($rar_entries === FALSE)
die("Could not retrieve entries.");

echo "Found " . count($rar_entries) . " entries.\n";

foreach ($rar_entries as $e) {
    echo $e;
    echo "\n";
}
rar_close($rar_arch);
?&gt;

### Ver también

    - [RarArchive::getEntry()](#rararchive.getentry) - Obtener el objeto entrada desde el archivo RAR

    - [rar:// wrapper](#wrappers.rar)

# RarArchive::getEntry

# rar_entry_get

(PECL rar &gt;= 2.0.0)

RarArchive::getEntry -- rar_entry_get — Obtener el objeto entrada desde el archivo RAR

### Descripción

Estilo orientado a objetos (método):

public **RarArchive::getEntry**([string](#language.types.string) $entryname): [RarEntry](#class.rarentry)|[false](#language.types.singleton)

Estilo procedimental:

**rar_entry_get**([RarArchive](#class.rararchive) $rarfile, [string](#language.types.string) $entryname): [RarEntry](#class.rarentry)|[false](#language.types.singleton)

Obtener el objeto entrada (archivo o directorio) desde el archivo RAR.

**Nota**:

También puede obtener objetos de entrada utilizando [RarArchive::getEntries()](#rararchive.getentries).

    Tenga en cuenta que un archivo RAR puede tener varias entradas con el mismo nombre; este método
    recuperará sólo el primero.

### Parámetros

     rarfile


       Un objeto [RarArchive](#class.rararchive), abierto con [rar_open()](#rararchive.open).






     entryname


       Ruta a la entrada dentro del archivo RAR.



      **Nota**:


La ruta debe ser la misma devuelta por
[RarEntry::getName()](#rarentry.getname).

### Valores devueltos

Devuelve el objeto [RarEntry](#class.rarentry) encontrado o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$rar_arch = RarArchive::open('solid.rar');
if ($rar_arch === FALSE)
die("Could not open RAR archive.");
$rar_entry = $rar_arch-&gt;getEntry('tese.txt');
if ($rar_entry === FALSE)
die("Could not get such entry");
echo get_class($rar_entry)."\n";
echo $rar_entry;
$rar_arch-&gt;close();
?&gt;

     Resultado del ejemplo anterior es similar a:




RarEntry
RarEntry for file "tese.txt" (23b93a7a)

    **Ejemplo #2 Estilo procedimental**

&lt;?php
$rar_arch = rar_open('solid.rar');
if ($rar_arch === FALSE)
die("Could not open RAR archive.");
$rar_entry = rar_entry_get($rar_arch, 'tese.txt');
if ($rar_entry === FALSE)
    die("Could not get such entry");
echo get_class($rar_entry)."\n";
echo $rar_entry;
rar_close($rar_arch);
?&gt;

### Ver también

    - [RarArchive::getEntries()](#rararchive.getentries) - Obtener la lista completa de entradas del archivo RAR

    - [rar:// wrapper](#wrappers.rar)

# RarArchive::isBroken

# rar_broken_is

(PECL rar &gt;= 3.0.0)

RarArchive::isBroken -- rar_broken_is — Comprobar si un archivo está dañado (incompleto)

### Descripción

Estilo orientado a objetos (método):

public **RarArchive::isBroken**(): [bool](#language.types.boolean)

Estilo procedimental:

**rar_broken_is**([RarArchive](#class.rararchive) $rarfile): [bool](#language.types.boolean)

Esta función determina si un archivo está incompleto, por ejemplo, Si un volumen no se encuentra o un volumen está truncado.

### Parámetros

     rarfile


       Un objeto [RarArchive](#class.rararchive), abierto con [rar_open()](#rararchive.open).





### Valores devueltos

Devuelve **[true](#constant.true)** si el archivo está dañado, **[false](#constant.false)** en caso contrario. Esta función puede también
devolver **[false](#constant.false)** si el archivo pasado fue cerrado. La única manera
para poder distinguir aparte ambos casos es habilitando y permitiendo
excepciones con [RarException::setUsingExceptions()](#rarexception.setusingexceptions); sin embargo,
esto debería ser innecesario, ya que un programa no debe funcionar con archivos cerrados.

### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php
function retnull() { return null; }
$file = dirname(__FILE__) . "/multi_broken.part1.rar";
/* El tercer argumento es utilizado para omitir avisos */
$arch = RarArchive::open($file, null, 'retnull');
var_dump($arch-&gt;isBroken());
?&gt;

     Resultado del ejemplo anterior es similar a:




bool(true)

    **Ejemplo #2 Estilo procedimental**

&lt;?php
function retnull() { return null; }
$file = dirname(__FILE__) . "/multi_broken.part1.rar";
/* El tercer argumento es utilizado para omitir avisos */
$arch = rar_open($file, null, 'retnull');
var_dump(rar_broken_is($arch));
?&gt;

### Ver también

    - [RarArchive::setAllowBroken()](#rararchive.setallowbroken) - Determina si la apertura de archivos dañados se permite

# RarArchive::isSolid

# rar_solid_is

(PECL rar &gt;= 2.0.0)

RarArchive::isSolid -- rar_solid_is — Comprueba si el archivo RAR es sólido

### Descripción

Estilo orientado a objetos (método):

public **RarArchive::isSolid**(): [bool](#language.types.boolean)

Estilo procedimental:

**rar_solid_is**([RarArchive](#class.rararchive) $rarfile): [bool](#language.types.boolean)

Comprueba si el archivo RAR es sólido. La extracción individual de ficheros es más lenta en archivos sólidos.

### Parámetros

     rarfile


       La instancia del [RarArchive](#class.rararchive), abierto con [rar_open()](#rararchive.open).





### Valores devueltos

Devuelve **[true](#constant.true)** si el archivo es sólido, de lo contrario retorna **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$arch1 = RarArchive::open("store_method.rar");
$arch2 = RarArchive::open("solid.rar");
echo "$arch1: " . ($arch1-&gt;isSolid()?'yes':'no') ."\n";
echo "$arch2: " . ($arch2-&gt;isSolid()?'yes':'no') . "\n";
?&gt;

     Resultado del ejemplo anterior es similar a:




RAR Archive "C:\php_rar\trunk\tests\store_method.rar": no
RAR Archive "C:\php_rar\trunk\tests\solid.rar": yes

    **Ejemplo #2 Estilo procedimental**

&lt;?php
$arch1 = rar_open("store_method.rar");
$arch2 = rar_open("solid.rar");
echo "$arch1: " . (rar_solid_is($arch1)?'yes':'no') ."\n";
echo "$arch2: " . (rar_solid_is($arch2)?'yes':'no') . "\n";
?&gt;

# RarArchive::open

# rar_open

(PECL rar &gt;= 2.0.0)

RarArchive::open -- rar_open — Abre un archivo RAR

### Descripción

Estilo orientado a objetos (método):

public static **RarArchive::open**([string](#language.types.string) $filename, [string](#language.types.string) $password = NULL, [callable](#language.types.callable) $volume_callback = NULL): [RarArchive](#class.rararchive)|[false](#language.types.singleton)

Estilo procedimental:

**rar_open**([string](#language.types.string) $filename, [string](#language.types.string) $password = NULL, [callable](#language.types.callable) $volume_callback = NULL): [RarArchive](#class.rararchive)|[false](#language.types.singleton)

Abre un archivo RAR especificado y devuelve la instancia [RarArchive](#class.rararchive) que lo representa.

**Nota**:

    Si el archivo a abrir esta dividido en volúmenes, se deberá pasar la ruta del primer volúmen como parámetro de la función.
    De lo contrario, no todos los archivos se mostraran.

### Parámetros

     filename


       Ruta del archivo Rar.






     password


       Contraseña en texto plano, si fuera necesario descifrar la cabecera del archivo. También se utilizará por defecto si
       hay archivos encriptados encontrados. Tenga en cuenta que los archivos pueden poseer diferentes contraseñas en cuanto
       a las cabeceras y entre ellos.






     volume_callback


       Una función que recibe como parámetro la ruta del volúmen que no fue encontrado
       y retorna una cadena con la ruta correcta para dicho archivo o **[null](#constant.null)**
       si el volúmen no existe o no es conocido.
       El programador debería asegurar que la función pasada no cause bucles, ya que esta función es
       llamada repetidas veces si la ruta devuelta en una llamada previa no corresponde
       con el volúmen solicitado. Especificando este parámetro se omite
       la notice que se emitiría cuando un volúmen no es encontrado; una implementación que solo devuelva **[null](#constant.null)**
       puede, por lo tanto, utilizarce para omitir dichos notices.





**Advertencia**

    En versiones menores a 2.0.0 de PHP, ­esta función no manejaria rutas
    relativas correctamente. Use [realpath()](#function.realpath) como una solución.

### Valores devueltos

Devuelve una instancia del [RarArchive](#class.rararchive) solicitado o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL rar 3.0.0

        volume_callback fue agregada.





### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php
$rar_arch = RarArchive::open('encrypted_headers.rar', 'samplepassword');
if ($rar_arch === FALSE)
die("Failed opening file");

$entries = $rar_arch-&gt;getEntries();
if ($entries === FALSE)
die("Failed fetching entries");

echo "Found " . count($entries) . " files.\n";

if (empty($entries))
die("No valid entries found.");

$stream = reset($entries)-&gt;getStream();
if ($stream === FALSE)
die("Failed opening first file");

$rar_arch-&gt;close();

echo "Content of first one follows:\n";
echo stream_get_contents($stream);

fclose($stream);
?&gt;

    Resultado del ejemplo anterior es similar a:

Found 2 files.
Content of first one follows:
Encrypted file 1 contents.

    **Ejemplo #2 Estilo procedimental**

&lt;?php
$rar_arch = rar_open('encrypted_headers.rar', 'samplepassword');
if ($rar_arch === FALSE)
die("Failed opening file");

$entries = rar_list($rar_arch);
if ($entries === FALSE)
die("Failed fetching entries");

echo "Found " . count($entries) . " files.\n";

if (empty($entries))
die("No valid entries found.");

$stream = reset($entries)-&gt;getStream();
if ($stream === FALSE)
die("Failed opening first file");

rar_close($rar_arch);

echo "Content of first one follows:\n";
echo stream_get_contents($stream);

fclose($stream);
?&gt;

    **Ejemplo #3 Volume Callback**

&lt;?php
/\* En este ejemplo, hay un volúmen llamdo multi_broken.part1.rar

- cuyo próximo volúmen es llamado multi.part2.rar \*/
  function resolve($vol) {
    if (preg_match('/_broken/', $vol))
        return str_replace('_broken', '', $vol);
    else
        return null;
}
$rar_file1 = rar_open(dirname(**FILE**).'/multi_broken.part1.rar', null, 'resolve');
  $entry = $rar_file1-&gt;getEntry('file2.txt');
$entry-&gt;extract(null, dirname(**FILE**) . "/temp_file2.txt");
  ?&gt;

### Ver también

    - [rar:// wrapper](#wrappers.rar)

# RarArchive::setAllowBroken

(PECL rar &gt;= 3.0.0)

RarArchive::setAllowBroken — Determina si la apertura de archivos dañados se permite

### Descripción

Estilo orientado a objetos (method):

    public **RarArchive::setAllowBroken**([bool](#language.types.boolean) $allow_broken): [bool](#language.types.boolean)

Estilo procedimental:

**rar_allow_broken_set**([RarArchive](#class.rararchive) $rarfile, [bool](#language.types.boolean) $allow_broken): [bool](#language.types.boolean)

Este método determina si los archivos dañados pueden ser leidos o todas las operaciones que
intenten extraer el archivo de las entradas producirán un error. Los archivos rotos son archivos para
los cuales ningún error es detectado cuando el archivo es abierto pero un error se produce cuando leemos
las entradas.

### Parámetros

     rarfile


       Un objeto [RarArchive](#class.rararchive), abierto con [rar_open()](#rararchive.open).






     allow_broken


       Determina si se permite la lectura de archivos dañados (**[true](#constant.true)**) o no (**[false](#constant.false)**).





### Valores devueltos

Devuelve **[true](#constant.true)** o **[false](#constant.false)** si ocurre un error. Sólo se producirá un error si el archivo
ya fue cerrado.

### Ejemplos

    **Ejemplo #1 Estilo orientado a objetos**

&lt;?php
function retnull() { return null; }
$file = dirname(__FILE__) . "/multi_broken.part1.rar";
/* El tercer argumento omite el mensaje "volumen no encontrado" */
$a = RarArchive::open($file, null, 'retnull');
$a-&gt;setAllowBroken(true);
foreach ($a-&gt;getEntries() as $e) {
    echo "$e\n";
}
var_dump(count($a));
?&gt;

     Resultado del ejemplo anterior es similar a:




RarEntry for file "file1.txt" (52b28202)
int(1)

    **Ejemplo #2 Estilo procedimental**

&lt;?php
function retnull() { return null; }
$file = dirname(__FILE__) . "/multi_broken.part1.rar";
/* El tercer argumento omite el mensaje "volumen no encontrado" */
$a = rar_open($file, null, 'retnull');
rar_allow_broken_set($a, true);
foreach (rar_list($a) as $e) {
    echo "$e\n";
}
var_dump(count($a));
?&gt;

### Ver también

    - [RarArchive::isBroken()](#rararchive.isbroken) - Comprobar si un archivo está dañado (incompleto)

# RarArchive::\_\_toString

(PECL rar &gt;= 2.0.0)

RarArchive::\_\_toString — Obtener representación de texto

### Descripción

public **RarArchive::\_\_toString**(): [string](#language.types.string)

Proporciona una representación de cadena para este objeto [RarArchive](#class.rararchive). Esta actualmente muestra
la ruta completa del volumen de archivo que fue abierto y si el recurso es válido
o ya estaba cerrado a través de una llamada a [RarArchive::close()](#rararchive.close).

Este método debe ser utilizado sólo para propósitos de depuración, ya que no existen garantías en cuanto a la
información que contiene el resultado o cómo esta es formateada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una representación textual de este objeto [RarArchive](#class.rararchive).
El contenido de esta representación no es especificado.

### Ejemplos

    **Ejemplo #1 Ejemplo de RarArchive::__toString()**

&lt;?php
$rar_arch = RarArchive::open('latest_winrar.rar');
echo $rar_arch."\n";
$rar_arch-&gt;close();
echo $rar_arch."\n";
?&gt;

    Resultado del ejemplo anterior es similar a:

RAR Archive "D:\php_rar\trunk\tests\latest_winrar.rar"
RAR Archive "D:\php_rar\trunk\tests\latest_winrar.rar" (closed)

## Tabla de contenidos

- [RarArchive::close](#rararchive.close) — Cerrar archivo RAR y liberar todos los recursos
- [RarArchive::getComment](#rararchive.getcomment) — Obtener comentarios de texto desde el archivo RAR
- [RarArchive::getEntries](#rararchive.getentries) — Obtener la lista completa de entradas del archivo RAR
- [RarArchive::getEntry](#rararchive.getentry) — Obtener el objeto entrada desde el archivo RAR
- [RarArchive::isBroken](#rararchive.isbroken) — Comprobar si un archivo está dañado (incompleto)
- [RarArchive::isSolid](#rararchive.issolid) — Comprueba si el archivo RAR es sólido
- [RarArchive::open](#rararchive.open) — Abre un archivo RAR
- [RarArchive::setAllowBroken](#rararchive.setallowbroken) — Determina si la apertura de archivos dañados se permite
- [RarArchive::\_\_toString](#rararchive.tostring) — Obtener representación de texto

# La clase [RarEntry](#class.rarentry)

(PECL rar &gt;= 0.1)

## Introducción

    Una entrada RAR, representa un directorio o un archivo comprimido dentro de un archivo RAR.

## Sinopsis de la Clase

    ****




      final
      class **RarEntry**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [HOST_MSDOS](#rarentry.constants.host-msdos) = 0;

    const
     [int](#language.types.integer)
      [HOST_OS2](#rarentry.constants.host-os2) = 1;

    const
     [int](#language.types.integer)
      [HOST_WIN32](#rarentry.constants.host-win32) = 2;

    const
     [int](#language.types.integer)
      [HOST_UNIX](#rarentry.constants.host-unix) = 3;

    const
     [int](#language.types.integer)
      [HOST_MACOS](#rarentry.constants.host-macos) = 4;

    const
     [int](#language.types.integer)
      [HOST_BEOS](#rarentry.constants.host-beos) = 5;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_WIN_READONLY](#rarentry.constants.attribute-win-readonly) = 1;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_WIN_HIDDEN](#rarentry.constants.attribute-win-hidden) = 2;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_WIN_SYSTEM](#rarentry.constants.attribute-win-system) = 4;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_WIN_DIRECTORY](#rarentry.constants.attribute-win-directory) = 16;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_WIN_ARCHIVE](#rarentry.constants.attribute-win-archive) = 32;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_WIN_DEVICE](#rarentry.constants.attribute-win-device) = 64;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_WIN_NORMAL](#rarentry.constants.attribute-win-normal) = 128;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_WIN_TEMPORARY](#rarentry.constants.attribute-win-temporary) = 256;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_WIN_SPARSE_FILE](#rarentry.constants.attribute-win-sparse-file) = 512;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_WIN_REPARSE_POINT](#rarentry.constants.attribute-win-reparse-point) = 1024;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_WIN_COMPRESSED](#rarentry.constants.attribute-win-compressed) = 2048;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_WIN_OFFLINE](#rarentry.constants.attribute-win-offline) = 4096;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_WIN_NOT_CONTENT_INDEXED](#rarentry.constants.attribute-win-not-content-indexed) = 8192;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_WIN_ENCRYPTED](#rarentry.constants.attribute-win-encrypted) = 16384;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_WIN_VIRTUAL](#rarentry.constants.attribute-win-virtual) = 65536;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_WORLD_EXECUTE](#rarentry.constants.attribute-unix-world-execute) = 1;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_WORLD_WRITE](#rarentry.constants.attribute-unix-world-write) = 2;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_WORLD_READ](#rarentry.constants.attribute-unix-world-read) = 4;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_GROUP_EXECUTE](#rarentry.constants.attribute-unix-group-execute) = 8;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_GROUP_WRITE](#rarentry.constants.attribute-unix-group-write) = 16;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_GROUP_READ](#rarentry.constants.attribute-unix-group-read) = 32;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_OWNER_EXECUTE](#rarentry.constants.attribute-unix-owner-execute) = 64;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_OWNER_WRITE](#rarentry.constants.attribute-unix-owner-write) = 128;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_OWNER_READ](#rarentry.constants.attribute-unix-owner-read) = 256;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_STICKY](#rarentry.constants.attribute-unix-sticky) = 512;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_SETGID](#rarentry.constants.attribute-unix-setgid) = 1024;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_SETUID](#rarentry.constants.attribute-unix-setuid) = 2048;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_FINAL_QUARTET](#rarentry.constants.attribute-unix-final-quartet) = 61440;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_FIFO](#rarentry.constants.attribute-unix-fifo) = 4096;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_CHAR_DEV](#rarentry.constants.attribute-unix-char-dev) = 8192;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_DIRECTORY](#rarentry.constants.attribute-unix-directory) = 16384;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_BLOCK_DEV](#rarentry.constants.attribute-unix-block-dev) = 24576;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_REGULAR_FILE](#rarentry.constants.attribute-unix-regular-file) = 32768;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_SYM_LINK](#rarentry.constants.attribute-unix-sym-link) = 40960;

    const
     [int](#language.types.integer)
      [ATTRIBUTE_UNIX_SOCKET](#rarentry.constants.attribute-unix-socket) = 49152;


    /* Métodos */

public [extract](#rarentry.extract)(
    [string](#language.types.string) $dir,
    [string](#language.types.string) $filepath = "",
    [string](#language.types.string) $password = NULL,
    [bool](#language.types.boolean) $extended_data = **[false](#constant.false)**
): [bool](#language.types.boolean)
public [getAttr](#rarentry.getattr)(): [int](#language.types.integer)
public [getCrc](#rarentry.getcrc)(): [string](#language.types.string)
public [getFileTime](#rarentry.getfiletime)(): [string](#language.types.string)
public [getHostOs](#rarentry.gethostos)(): [int](#language.types.integer)
public [getMethod](#rarentry.getmethod)(): [int](#language.types.integer)
public [getName](#rarentry.getname)(): [string](#language.types.string)
public [getPackedSize](#rarentry.getpackedsize)(): [int](#language.types.integer)
public [getStream](#rarentry.getstream)([string](#language.types.string) $password = ?): [resource](#language.types.resource)|[false](#language.types.singleton)
public [getUnpackedSize](#rarentry.getunpackedsize)(): [int](#language.types.integer)
public [getVersion](#rarentry.getversion)(): [int](#language.types.integer)
public [isDirectory](#rarentry.isdirectory)(): [bool](#language.types.boolean)
public [isEncrypted](#rarentry.isencrypted)(): [bool](#language.types.boolean)
public [\_\_toString](#rarentry.tostring)(): [string](#language.types.string)

}

## Constantes predefinidas

     **[RarEntry::HOST_MSDOS](#rarentry.constants.host-msdos)**

      Si el valor devuelto por [RarEntry::getHostOs()](#rarentry.gethostos) es igual a esta constante, MS-DOS fue utilizado para
      añadir esta entrada. Utilizar en lugar de **[RAR_HOST_MSDOS](#constant.rar-host-msdos)**.






     **[RarEntry::HOST_OS2](#rarentry.constants.host-os2)**

      Si el valor devuelto por [RarEntry::getHostOs()](#rarentry.gethostos) es igual a esta constante, OS/2 fue utilizado para
      añadir esta entrada. Destinado para sustituir a **[RAR_HOST_OS2](#constant.rar-host-os2)**.






     **[RarEntry::HOST_WIN32](#rarentry.constants.host-win32)**

      Si el valor devuelto por [RarEntry::getHostOs()](#rarentry.gethostos) es igual a esta constante, Microsoft Windows fue utilizado para
      añadir esta entrada. Destinado para sustituir a **[RAR_HOST_WIN32](#constant.rar-host-win32)**.






     **[RarEntry::HOST_UNIX](#rarentry.constants.host-unix)**

      Si el valor devuelto por [RarEntry::getHostOs()](#rarentry.gethostos) es igual a esta constante, un Sistema Operativo UNIX no especificado fue utilizado para
      añadir esta entrada. Destinado para sustituir a **[RAR_HOST_UNIX](#constant.rar-host-unix)**.






     **[RarEntry::HOST_MACOS](#rarentry.constants.host-macos)**

      Si el valor devuelto por [RarEntry::getHostOs()](#rarentry.gethostos) es igual a esta constante, un Sistema Operativo Mac fue utilizado para
      añadir esta entrada.






     **[RarEntry::HOST_BEOS](#rarentry.constants.host-beos)**

      Si el valor devuelto por [RarEntry::getHostOs()](#rarentry.gethostos) es igual a esta constante, un Sistema Operativo BeOS fue utilizado para
      añadir esta entrada. Destinado para sustituir a **[RAR_HOST_BEOS](#constant.rar-host-beos)**.






     **[RarEntry::ATTRIBUTE_WIN_READONLY](#rarentry.constants.attribute-win-readonly)**

      Bit que representa una entrada de Windows con un atributo de sólo lectura. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es Microsoft Windows.






     **[RarEntry::ATTRIBUTE_WIN_HIDDEN](#rarentry.constants.attribute-win-hidden)**

      Bit que representa una entrada de Windows con un atributo oculto. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es Microsoft Windows.






     **[RarEntry::ATTRIBUTE_WIN_SYSTEM](#rarentry.constants.attribute-win-system)**

      Bits que representa una entrada de Windows con un atributo del sistema. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es Microsoft Windows.






     **[RarEntry::ATTRIBUTE_WIN_DIRECTORY](#rarentry.constants.attribute-win-directory)**

      Bit que representa una entrada de Windows con un atributo de directorio (entrada es un directorio). Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es Microsoft Windows. Véase también
      [RarEntry::isDirectory()](#rarentry.isdirectory), que también trabaja con entradas que no fueron añadidas en WinRAR.






     **[RarEntry::ATTRIBUTE_WIN_ARCHIVE](#rarentry.constants.attribute-win-archive)**

      Bit que representa una entrada de Windows con un atributo de archivo. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es Microsoft Windows.






     **[RarEntry::ATTRIBUTE_WIN_DEVICE](#rarentry.constants.attribute-win-device)**

      Bit que representa una entrada de Windows con un atributo de dispositivo. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es Microsoft Windows.






     **[RarEntry::ATTRIBUTE_WIN_NORMAL](#rarentry.constants.attribute-win-normal)**

      Bit que representa una entrada de Windows con un atributo de archivo normal (entrada NO es un directorio). Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es Microsoft Windows. Véase también
      [RarEntry::isDirectory()](#rarentry.isdirectory), que también trabaja con entradas que no fueron añadidas en WinRAR.






     **[RarEntry::ATTRIBUTE_WIN_TEMPORARY](#rarentry.constants.attribute-win-temporary)**

      Bit que representa una entrada de Windows con un atributo temporal. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es Microsoft Windows.






     **[RarEntry::ATTRIBUTE_WIN_SPARSE_FILE](#rarentry.constants.attribute-win-sparse-file)**

      Bit que representa una entrada de Windows con un atributo de archivo disperso (archivo es un archivo disperso NTFS). Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es Microsoft Windows.






     **[RarEntry::ATTRIBUTE_WIN_REPARSE_POINT](#rarentry.constants.attribute-win-reparse-point)**

      Bit que representa una entrada de Windows con un atributo punto de re-análisis (entrada es un punto de re-análisis NTFS, por ejemplo, un
      directorio enlace o un sistema de montaje de archivos). Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es Microsoft Windows.






     **[RarEntry::ATTRIBUTE_WIN_COMPRESSED](#rarentry.constants.attribute-win-compressed)**

      Bit que representa una entrada de Windows con un atributo comprimido (sólo NTFS). Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es Microsoft Windows.






     **[RarEntry::ATTRIBUTE_WIN_OFFLINE](#rarentry.constants.attribute-win-offline)**

      Bit que representa una entrada de Windows con un atributo fuera de línea (entrada es desconectada y no accesible). Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es Microsoft Windows.






     **[RarEntry::ATTRIBUTE_WIN_NOT_CONTENT_INDEXED](#rarentry.constants.attribute-win-not-content-indexed)**

      Bit que representa una entrada de Windows con un atributo de contenido no indexado (entrada deberá ser indexada). Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es Microsoft Windows.






     **[RarEntry::ATTRIBUTE_WIN_ENCRYPTED](#rarentry.constants.attribute-win-encrypted)**

      Bit que representa una entrada de Windows con un atributo cifrado (sólo NTFS). Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es Microsoft Windows.






     **[RarEntry::ATTRIBUTE_WIN_VIRTUAL](#rarentry.constants.attribute-win-virtual)**

      Bit que representa una entrada de Windows con un atributo virtual. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es Microsoft Windows.






     **[RarEntry::ATTRIBUTE_UNIX_WORLD_EXECUTE](#rarentry.constants.attribute-unix-world-execute)**

      Bit que representa una entrada que es ejecutable en el mundo UNIX. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX.






     **[RarEntry::ATTRIBUTE_UNIX_WORLD_WRITE](#rarentry.constants.attribute-unix-world-write)**

      Bit que representa una entrada que es escribible en el mundo UNIX. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX.






     **[RarEntry::ATTRIBUTE_UNIX_WORLD_READ](#rarentry.constants.attribute-unix-world-read)**

      Bit que representa una entrada que es leible en el mundo UNIX. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX.






     **[RarEntry::ATTRIBUTE_UNIX_GROUP_EXECUTE](#rarentry.constants.attribute-unix-group-execute)**

      Bit que representa una entrada UNIX que es grupo ejecutable. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX.






     **[RarEntry::ATTRIBUTE_UNIX_GROUP_WRITE](#rarentry.constants.attribute-unix-group-write)**

      Bit que representa una entrada UNIX que es grupo escribible. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX.






     **[RarEntry::ATTRIBUTE_UNIX_GROUP_READ](#rarentry.constants.attribute-unix-group-read)**

      Bit que representa una entrada UNIX que es grupo leible. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX.






     **[RarEntry::ATTRIBUTE_UNIX_OWNER_EXECUTE](#rarentry.constants.attribute-unix-owner-execute)**

      Bit que representa una entrada UNIX que es propietario ejecutable. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX.






     **[RarEntry::ATTRIBUTE_UNIX_OWNER_WRITE](#rarentry.constants.attribute-unix-owner-write)**

      Bit que representa una entrada UNIX que es propietario escribible. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX.






     **[RarEntry::ATTRIBUTE_UNIX_OWNER_READ](#rarentry.constants.attribute-unix-owner-read)**

      Bit que representa una entrada UNIX que es propietario leible. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX.






     **[RarEntry::ATTRIBUTE_UNIX_STICKY](#rarentry.constants.attribute-unix-sticky)**

      Bit que representa el sticky bit UNIX. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX.






     **[RarEntry::ATTRIBUTE_UNIX_SETGID](#rarentry.constants.attribute-unix-setgid)**

      Bit que representa el atributo UNIX setgid. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX.






     **[RarEntry::ATTRIBUTE_UNIX_SETUID](#rarentry.constants.attribute-unix-setuid)**

      Bit que representa el atributo UNIX setuid. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX.






     **[RarEntry::ATTRIBUTE_UNIX_FINAL_QUARTET](#rarentry.constants.attribute-unix-final-quartet)**

      Máscara para aislar a los últimos cuatro bits (nibble) de atributos UNIX
      (_S_IFMT, el tipo de máscara de archivo). Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX y con las
      constantes [**<a href="#rarentry.constants.attribute-unix-fifo">RarEntry::ATTRIBUTE_UNIX_FIFO](#rarentry.constants.attribute-unix-fifo)**</a>,
      [**<a href="#rarentry.constants.attribute-unix-char-dev">RarEntry::ATTRIBUTE_UNIX_CHAR_DEV](#rarentry.constants.attribute-unix-char-dev)**</a>,
      [**<a href="#rarentry.constants.attribute-unix-directory">RarEntry::ATTRIBUTE_UNIX_DIRECTORY](#rarentry.constants.attribute-unix-directory)**</a>,
      [**<a href="#rarentry.constants.attribute-unix-block-dev">RarEntry::ATTRIBUTE_UNIX_BLOCK_DEV](#rarentry.constants.attribute-unix-block-dev)**</a>,
      [**<a href="#rarentry.constants.attribute-unix-regular-file">RarEntry::ATTRIBUTE_UNIX_REGULAR_FILE](#rarentry.constants.attribute-unix-regular-file)**</a>,
      [**<a href="#rarentry.constants.attribute-unix-sym-link">RarEntry::ATTRIBUTE_UNIX_SYM_LINK](#rarentry.constants.attribute-unix-sym-link)**</a> and
      [**<a href="#rarentry.constants.attribute-unix-socket">RarEntry::ATTRIBUTE_UNIX_SOCKET](#rarentry.constants.attribute-unix-socket)**</a>.






     **[RarEntry::ATTRIBUTE_UNIX_FIFO](#rarentry.constants.attribute-unix-fifo)**

      FIFOs Unix tendrá atributos cuyos últimos cuatro bits tienen este valor. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX y con la
      constante [
      **<a href="#rarentry.constants.attribute-unix-final-quartet">RarEntry::ATTRIBUTE_UNIX_FINAL_QUARTET](#rarentry.constants.attribute-unix-final-quartet)**</a>.






     **[RarEntry::ATTRIBUTE_UNIX_CHAR_DEV](#rarentry.constants.attribute-unix-char-dev)**

      Dispositivo de tipo carácter Unix tendrá atributos cuyos últimos cuatro bits tienen este valor. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX y con la
      constante [
      **<a href="#rarentry.constants.attribute-unix-final-quartet">RarEntry::ATTRIBUTE_UNIX_FINAL_QUARTET](#rarentry.constants.attribute-unix-final-quartet)**</a>.






     **[RarEntry::ATTRIBUTE_UNIX_DIRECTORY](#rarentry.constants.attribute-unix-directory)**

      Directorios Unix tendrá atributos cuyos últimos cuatro bits tienen este valor. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX y con la
      constante [
      **<a href="#rarentry.constants.attribute-unix-final-quartet">RarEntry::ATTRIBUTE_UNIX_FINAL_QUARTET](#rarentry.constants.attribute-unix-final-quartet)**</a>. Véase también
      [RarEntry::isDirectory()](#rarentry.isdirectory), que también trabaja con entradas que
      fueron añadidas en otros sistemas operativos.






     **[RarEntry::ATTRIBUTE_UNIX_BLOCK_DEV](#rarentry.constants.attribute-unix-block-dev)**

      Dispositivo de tipo bloque Unix tendrá atributos cuyos últimos cuatro bits tienen este valor. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX y con la
      constante [
      **<a href="#rarentry.constants.attribute-unix-final-quartet">RarEntry::ATTRIBUTE_UNIX_FINAL_QUARTET](#rarentry.constants.attribute-unix-final-quartet)**</a>.






     **[RarEntry::ATTRIBUTE_UNIX_REGULAR_FILE](#rarentry.constants.attribute-unix-regular-file)**

      Archivos regular Unix (no directorios) tendrá atributos cuyos últimos cuatro bits tienen este valor. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX y con la
      constante [
      **<a href="#rarentry.constants.attribute-unix-final-quartet">RarEntry::ATTRIBUTE_UNIX_FINAL_QUARTET](#rarentry.constants.attribute-unix-final-quartet)**</a>. Véase también
      [RarEntry::isDirectory()](#rarentry.isdirectory), ue también trabaja con entradas que
      fueron añadidas en otros sistemas operativos.






     **[RarEntry::ATTRIBUTE_UNIX_SYM_LINK](#rarentry.constants.attribute-unix-sym-link)**

      Enlace simbólico Unix tendrá atributos cuyos últimos cuatro bits tienen este valor. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX y con la
      constante [
      **<a href="#rarentry.constants.attribute-unix-final-quartet">RarEntry::ATTRIBUTE_UNIX_FINAL_QUARTET](#rarentry.constants.attribute-unix-final-quartet)**</a>.






     **[RarEntry::ATTRIBUTE_UNIX_SOCKET](#rarentry.constants.attribute-unix-socket)**

      Sockets Unix will tendrá atributos cuyos últimos cuatro bits tienen este valor. Para ser utilizado con
      [RarEntry::getAttr()](#rarentry.getattr) en entradas cuyo sistema operativo anfitrión es UNIX y con la
      constante [
      **<a href="#rarentry.constants.attribute-unix-final-quartet">RarEntry::ATTRIBUTE_UNIX_FINAL_QUARTET](#rarentry.constants.attribute-unix-final-quartet)**</a>.




# RarEntry::extract

(PECL rar &gt;= 0.1)

RarEntry::extract — Extraer entrada del archivo

### Descripción

public **RarEntry::extract**(
    [string](#language.types.string) $dir,
    [string](#language.types.string) $filepath = "",
    [string](#language.types.string) $password = NULL,
    [bool](#language.types.boolean) $extended_data = **[false](#constant.false)**
): [bool](#language.types.boolean)

**RarEntry::extract()** extrae los datos de entrada.
Esto creará un nuevo archivo en el
dir especificado con el mismo nombre que el nombre de la entrada,
a menos que el segundo argumento sea especificado. Siga leyendo más abajo para obtener mayor información.

### Parámetros

     dir


       Ruta al directorio donde los archivos deben ser extraídos. Este parámetro es
       considerado si y sólo si no es filepath. Si ambos
       parámetros están vacíos se intentará una extracción en el directorio actual.







     filepath


       Ruta (relativa o absoluta) que contiene el directorio y el nombre del
       archivo extraído. Este parámetro anula los parámetros
       dir y el nombre del archivo original.







     password


       La contraseña utilizada para cifrar esta entrada. Si la entrada no está cifrada, este valor no se utilizará y puede
       ser omitido. Si se omite este parámetro y la entrada está cifrada, la contraseña dada a
       [rar_open()](#rararchive.open), será utlizada. Si una contraseña incorrecta es dada, de forma explicita
       o implicita via [rar_open()](#rararchive.open), la comprobación CRC fallará y este método fallará y devolverá **[false](#constant.false)**.
       Si no se da la contraseña y se requiere una, este método fallará y devolverá **[false](#constant.false)**.
       Puede comprobar si una entrada está cifrada con [RarEntry::isEncrypted()](#rarentry.isencrypted).







     extended_data


       Si **[true](#constant.true)**, información extendida tales como NTFS ACLs e información propietaria Unix será establecida en los archivos
      extraidos, siempre que esta esté presente en el archivo.


**Advertencia**
Antes de la versión 2.0.0, esta función no manejaba las rutas
relativas correctamente. Utilice [realpath()](#function.realpath) como una solución.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL rar 3.0.0

        extended_data fue añadido.




       PECL rar 3.0.0

        Soporte para archivos RAR con nombres de entrada que se repiten ya no es defectuoso





### Ejemplos

    **Ejemplo #1 Ejemplo de RarEntry::extract()**

&lt;?php

$rar_file = rar_open('example.rar') or die("Failed to open Rar archive");

$entry = rar_entry_get($rar_file, 'Dir/file.txt') or die("Failed to find such entry");

$entry-&gt;extract('/dir/to'); // crear /dir/to/Dir/file.txt
$entry-&gt;extract(false, '/dir/to/new_name.txt'); // crear /dir/to/new_name.txt

?&gt;

    **Ejemplo #2 ¿Cómo extraer todos los archivos en archivo?: **

&lt;?php

/_ ejemplo por Erik Jenssen también conocido como erix _/

$filename = "foobar.rar";
$filepath = "/home/foo/bar/";

$rar_file = rar_open($filepath.$filename);
$list = rar_list($rar_file);
foreach($list as $file) {
    $entry = rar_entry_get($rar_file, $file);
    $entry-&gt;extract("."); // extraer el directorio actual
}
rar_close($rar_file);

?&gt;

### Ver también

    - [RarEntry::getStream()](#rarentry.getstream) - Obtener manejador de archivo para entrada

    - [rar:// wrapper](#wrappers.rar)

# RarEntry::getAttr

(PECL rar &gt;= 0.1)

RarEntry::getAttr — Obtener los atributos de la entrada

### Descripción

public **RarEntry::getAttr**(): [int](#language.types.integer)

Devuelve los atributos dependientes del SO del archivo de entrada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve los atributos o **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de RarEntry::getAttr()**

&lt;?php

$rar_file = rar_open('example.rar') or die("Can't open Rar archive");

$entry = rar_entry_get($rar_file, 'dir/in/the/archive') or die("Can't find such entry");

$host_os = $entry-&gt;getHostOs();
$attr = $entry-&gt;getAttr();

switch($host_os) {
    case RAR_HOST_MSDOS:
    case RAR_HOST_OS2:
    case RAR_HOST_WIN32:
    case RAR_HOST_MACOS:
        printf("%c%c%c%c%c%c\n",
                ($attr &amp; 0x08) ? 'V' : '.',
($attr &amp; 0x10) ? 'D' : '.',
                ($attr &amp; 0x01) ? 'R' : '.',
($attr &amp; 0x02) ? 'H' : '.',
                ($attr &amp; 0x04) ? 'S' : '.',
($attr &amp; 0x20) ? 'A' : '.');
        break;
    case RAR_HOST_UNIX:
    case RAR_HOST_BEOS:
        switch ($attr &amp; 0xF000)
{
case 0x4000:
printf("d");
break;
case 0xA000:
printf("l");
break;
default:
printf("-");
break;
}
printf("%c%c%c%c%c%c%c%c%c\n",
($attr &amp; 0x0100) ? 'r' : '-',
                ($attr &amp; 0x0080) ? 'w' : '-',
($attr &amp; 0x0040) ? (($attr &amp; 0x0800) ? 's':'x'):(($attr &amp; 0x0800) ? 'S':'-'),
                ($attr &amp; 0x0020) ? 'r' : '-',
($attr &amp; 0x0010) ? 'w' : '-',
                ($attr &amp; 0x0008) ? (($attr &amp; 0x0400) ? 's':'x'):(($attr &amp; 0x0400) ? 'S':'-'),
($attr &amp; 0x0004) ? 'r' : '-',
                ($attr &amp; 0x0002) ? 'w' : '-',
($attr &amp; 0x0001) ? 'x' : '-');
break;
}

rar_close($rar_file);

?&gt;

### Ver también

    - [RarEntry::getHostOs()](#rarentry.gethostos) - Obtener sistema operativo anfitrión del archivo de entrada

    - Las constantes de [RarEntry](#class.rarentry)

# RarEntry::getCrc

(PECL rar &gt;= 0.1)

RarEntry::getCrc — Obtener el CRC de la entrada

### Descripción

public **RarEntry::getCrc**(): [string](#language.types.string)

Devuelve una cadena hexadecimal representación de el CRC del archivo de entrada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el CRC del archivo de entrada o **[false](#constant.false)** en caso de error.

### Historial de cambios

       Versión
       Descripción






       PECL rar 2.0.0

        Este método devuelve ahora valores correctos para archivos de varios volúmenes.





# RarEntry::getFileTime

(PECL rar &gt;= 0.1)

RarEntry::getFileTime — Devolver entrada última fecha de modificación

### Descripción

public **RarEntry::getFileTime**(): [string](#language.types.string)

Devuelve entrada última fecha modificación.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve entrada última fecha de modificación como una cadena en formato
YYYY-MM-DD HH:II:SS, o **[false](#constant.false)** en caso de error.

# RarEntry::getHostOs

(PECL rar &gt;= 0.1)

RarEntry::getHostOs — Obtener sistema operativo anfitrión del archivo de entrada

### Descripción

public **RarEntry::getHostOs**(): [int](#language.types.integer)

Devuelve el código del sistema operativo anfitrión del archivo de entrada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el código del sistema operativo anfitrión, o **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de RarEntry::getHostOs()** (version &gt;= 2.0.0)

&lt;?php

$rar_file = rar_open('example.rar') or die("Failed to open Rar archive");

$entry = rar_entry_get($rar_file, 'Dir/file.txt') or die("Failed to find such entry");

switch ($entry-&gt;getHostOs()) {
case RarEntry::HOST_MSDOS:
echo "MS-DOS\n";
break;
case RarEntry::HOST_OS2:
echo "OS2\n";
break;
case RarEntry::HOST_WIN32:
echo "Win32\n";
break;
case RarEntry::HOST_MACOS:
echo "MacOS\n";
break;
case RarEntry::HOST_UNIX:
echo "Unix/Linux\n";
break;
case RarEntry::HOST_BEOS:
echo "BeOS\n";
break;
}

?&gt;

    **Ejemplo #2 RarEntry::getHostOs()** example (version &lt;= 1.0.0)

&lt;?php

$rar_file = rar_open('example.rar') or die("Failed to open Rar archive");

$entry = rar_entry_get($rar_file, 'Dir/file.txt') or die("Failed to find such entry");

switch ($entry-&gt;getHostOs()) {
case RAR_HOST_MSDOS:
echo "MS-DOS\n";
break;
case RAR_HOST_OS2:
echo "OS2\n";
break;
case RAR_HOST_WIN32:
echo "Win32\n";
break;
case RAR_HOST_MACOS:
echo "MacOS\n";
break;
case RAR_HOST_UNIX:
echo "Unix/Linux\n";
break;
case RAR_HOST_BEOS:
echo "BeOS\n";
break;
}

?&gt;

### Ver también

    - [RarEntry::extract()](#rarentry.extract) - Extraer entrada del archivo

# RarEntry::getMethod

(PECL rar &gt;= 0.1)

RarEntry::getMethod — Obtener método pack de la entrada

### Descripción

public **RarEntry::getMethod**(): [int](#language.types.integer)

**RarEntry::getMethod()** devuelve el número del método utilizado cuando añadimos
archivo actual de entrada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de método o **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de RarEntry::getMethod()**

&lt;?php

$rar_file = rar_open('example.rar') or die("Failed to open Rar archive");

$entry = rar_entry_get($rar_file, 'Dir/file.txt') or die("Failed to find such entry");

echo "Method number: " . $entry-&gt;getMethod();

?&gt;

# RarEntry::getName

(PECL rar &gt;= 0.1)

RarEntry::getName — Obtener el nombre de la entrada

### Descripción

public **RarEntry::getName**(): [string](#language.types.string)

Devuelve el nombre (con la ruta) de el archivo entrada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de la entrada como una cadena, o **[false](#constant.false)** en caso de error.

### Historial de cambios

       Versión
       Descripción






       PECL rar 2.0.0

        Desde la versión 2.0.0, la cadena devuelta está codificada en Unicode/UTF-8.





### Ejemplos

    **Ejemplo #1 Ejemplo de RarEntry::getName()**

&lt;?php

//este ejemplo, es seguro, incluso en páginas no codificados en UTF-8
//para esa codificación en UTF-8, la llamada a mb_convert_encoding es innecesaria.

$rar_file = rar_open('example.rar') or die("Failed to open Rar archive");

$entry = rar_entry_get($rar_file, 'Dir/file.txt') or die("Failed to find such entry");

echo "Entry name: " . mb_convert_encoding(
htmlentities(
$entry-&gt;getName(),
ENT_COMPAT,
"UTF-8"
),
"HTML-ENTITIES",
"UTF-8"
);

?&gt;

# RarEntry::getPackedSize

(PECL rar &gt;= 0.1)

RarEntry::getPackedSize — Obtiene el tamaño empaquetado de la entrada

### Descripción

public **RarEntry::getPackedSize**(): [int](#language.types.integer)

Obtiene el tamaño empaquetado del archivo entrada.

**Nota**:

Tenga en cuenta que en las plataformas de 32 bits de longitud (que incluye Windows
x64), el tamaño máximo devuelto está limitado a 2 GB. Compruebe la constante
**[PHP_INT_MAX](#constant.php-int-max)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tamaño empaquetado, o **[false](#constant.false)** en caso de error.

### Historial de cambios

       Versión
       Descripción






       PECL rar 2.0.0

        Este método devuelve ahora los valores correctos de empaquetado mayores a 2 GB
        en plataformas de 64-bit [int](#language.types.integer)s y nunca
        devuelve valores negativos en otras plataformas.





### Ejemplos

    **Ejemplo #1 Ejemplo de RarEntry::getPackedSize()**

&lt;?php

$rar_file = rar_open('example.rar') or die("Failed to open Rar archive");

$entry = rar_entry_get($rar_file, 'Dir/file.txt') or die("Failed to find such entry");

echo "Packed size of " . $entry-&gt;getName() . " = " . $entry-&gt;getPackedSize() . " bytes";

?&gt;

# RarEntry::getStream

(PECL rar &gt;= 2.0.0)

RarEntry::getStream — Obtener manejador de archivo para entrada

### Descripción

public **RarEntry::getStream**([string](#language.types.string) $password = ?): [resource](#language.types.resource)|[false](#language.types.singleton)

Devuelve un manejador de archivo que
soporta operaciones de lectura. Este manejador proporciona descompresión al vuelo
para esta entrada.

    El manejador no es invalidado por llamar a
    [rar_close()](#rararchive.close).

**Advertencia**
El flujo resultante no tiene verificación de integridad. En particular, archivo corrupto y
descifrado con una clave errónea, no será detectado. Es responsabilidad del programador utilizar la entrada CRC
para comprobar la integridad, si así lo desea.

### Parámetros

     password


       La contraseña utilizada para cifrar esta entrada. Si la entrada no está cifrada, este valor no se utilizará y puede
       ser omitido. Si el parámetro es omitido y la entrada está cifrada, la contraseña dada a
       [rar_open()](#rararchive.open), será utilizada. Si una contraseña incorrecta es dada, ya sea explícita
       o implícitamente via [rar_open()](#rararchive.open), teste método resultante de flujo producirá error de
       salida. Si no se especifica la contraseña y se requiere una, este método fallará y devolverá **[false](#constant.false)**.
       Puede comprobar si una entrada está cifrada con [RarEntry::isEncrypted()](#rarentry.isencrypted).





### Valores devueltos

El manejador de archivo o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL rar 3.0.0

        Soporte para archivos RAR con nombres de entrada que se repiten ya no es defectuoso.





### Ejemplos

    **Ejemplo #1 Ejemplo de RarEntry::getStream()**

&lt;?php

$rar_file = rar_open('example.rar');
if ($rar_file === false)
die("Failed to open Rar archive");

$entry = rar_entry_get($rar_file, 'Dir/file.txt');
if ($entry === false)
die("Failed to find such entry");

$stream = $entry-&gt;getStream();
if ($stream === false)
die("Failed to obtain stream.");

rar_close($rar_file); //flujo es independiente de archivo

while (!feof($stream)) {
    $buff = fread($stream, 8192);
if ($buff !== false)
echo $buff;
else
break; //error fread
}

fclose($stream);

?&gt;

### Ver también

    - [RarEntry::extract()](#rarentry.extract) - Extraer entrada del archivo

    - [rar:// wrapper](#wrappers.rar)

# RarEntry::getUnpackedSize

(PECL rar &gt;= 0.1)

RarEntry::getUnpackedSize — Obtener el tamaño descomprimido de la entrada

### Descripción

public **RarEntry::getUnpackedSize**(): [int](#language.types.integer)

Obtiene el tamaño descomprimido del archivo entrada.

**Nota**:

Tenga en cuenta que en las plataformas de 32 bits de longitud (que incluye Windows
x64), el tamaño máximo devueltos está limitado a 2 GB. Compruebe la constante
**[PHP_INT_MAX](#constant.php-int-max)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tamaño descomprimido, o **[false](#constant.false)** en caso de error.

### Historial de cambios

       Versión
       Descripción






       PECL rar 2.0.0

        Este método devuelve ahora valores correctos de tamaño descomprimido superiores a
        2 GB en plataformas con 64-bit [int](#language.types.integer)s y nunca
        devuelve valores negativos en otras plataformas.





### Valores devueltos

    **Ejemplo #1 Ejemplo de RarEntry::getUnpackedSize()**

&lt;?php

$rar_file = rar_open('example.rar') or die("Failed to open Rar archive");

$entry = rar_entry_get($rar_file, 'Dir/file.txt') or die("Failed to find such entry");

echo "Unpacked size of " . $entry-&gt;getName() . " = " . $entry-&gt;getPackedSize() . " bytes";

?&gt;

# RarEntry::getVersion

(PECL rar &gt;= 0.1)

RarEntry::getVersion — Obtener la versión mínima del programa RAR requerida para desempaquetar la entrada

### Descripción

public **RarEntry::getVersion**(): [int](#language.types.integer)

Devuelve la versión mínima del programa RAR (por ejemplo WinRAR) requerida para desempaquetar la entrada.
Esta es codificada como 10 \* version mayor + versión menor.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la versión o **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de RarEntry::getVersion()**

&lt;?php

$rar_file = rar_open('example.rar') or die("Failed to open Rar archive");

$entry = rar_entry_get($rar_file, 'Dir/file.txt') or die("Failed to find such entry");

echo "Rar version required for unpacking: " . $entry-&gt;getVersion();

?&gt;

# RarEntry::isDirectory

(PECL rar &gt;= 2.0.0)

RarEntry::isDirectory — Comprobar si una entrada representa un directorio

### Descripción

public **RarEntry::isDirectory**(): [bool](#language.types.boolean)

Comprueba si una entrada representa un directorio.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la entrada es un directorio y **[false](#constant.false)** en caso contrario.

### Notas

Esta función sólo está disponible desde la versión 2.0.0, pero también puede
comprobarse si una entrada es un directorio mediante la comprobación de los atributos de entrada,
así (sólo funciona para los archivos comprimidos en RAR por Windows o Unix):

&lt;?php
//...
//Abrir archivo, obtener la entrada y almacenarla en la variable $e...
//...

$isDirectory = (bool) ((($e-&gt;getHostOs() == RAR_HOST_WIN32) &amp;&amp; ($e-&gt;getAttr() &amp; 0x10)) ||
    (($e-&gt;getHostOs() == RAR_HOST_UNIX) &amp;&amp; (($e-&gt;getAttr() &amp; 0xf000) == 0x4000)));
?&gt;

# RarEntry::isEncrypted

(PECL rar &gt;= 2.0.0)

RarEntry::isEncrypted — Comprobar si una entrada está cifrada

### Descripción

public **RarEntry::isEncrypted**(): [bool](#language.types.boolean)

Comprueba si el contenido de la entrada actual está cifrado.

**Nota**:

La contraseña utilizada puede variar entre los archivos dentro del mismo archivo RAR.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la entrada actual se encuentra cifrada y **[false](#constant.false)** en caso contrario.

# RarEntry::\_\_toString

(PECL rar &gt;= 2.0.0)

RarEntry::\_\_toString — Obtener texto representación de entrada

### Descripción

public **RarEntry::\_\_toString**(): [string](#language.types.string)

**RarEntry::\_\_toString()** devuelve una representación textual de esta entrada. Esta incluye si
la entrada es un archivo o un directorio (enlaces simbólicos y otros objetos especiales serán tratados como archivos),
el nombre UTF-8 de la entrada y su CRC. La forma y el contenido de esta representación puede cambiar en el futuro,
así que no son fiables.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una representación textual de la entrada.

## Tabla de contenidos

- [RarEntry::extract](#rarentry.extract) — Extraer entrada del archivo
- [RarEntry::getAttr](#rarentry.getattr) — Obtener los atributos de la entrada
- [RarEntry::getCrc](#rarentry.getcrc) — Obtener el CRC de la entrada
- [RarEntry::getFileTime](#rarentry.getfiletime) — Devolver entrada última fecha de modificación
- [RarEntry::getHostOs](#rarentry.gethostos) — Obtener sistema operativo anfitrión del archivo de entrada
- [RarEntry::getMethod](#rarentry.getmethod) — Obtener método pack de la entrada
- [RarEntry::getName](#rarentry.getname) — Obtener el nombre de la entrada
- [RarEntry::getPackedSize](#rarentry.getpackedsize) — Obtiene el tamaño empaquetado de la entrada
- [RarEntry::getStream](#rarentry.getstream) — Obtener manejador de archivo para entrada
- [RarEntry::getUnpackedSize](#rarentry.getunpackedsize) — Obtener el tamaño descomprimido de la entrada
- [RarEntry::getVersion](#rarentry.getversion) — Obtener la versión mínima del programa RAR requerida para desempaquetar la entrada
- [RarEntry::isDirectory](#rarentry.isdirectory) — Comprobar si una entrada representa un directorio
- [RarEntry::isEncrypted](#rarentry.isencrypted) — Comprobar si una entrada está cifrada
- [RarEntry::\_\_toString](#rarentry.tostring) — Obtener texto representación de entrada

# La clase RarException

(PECL rar &gt;= 2.0.0)

## Introducción

    Esta clase sirve para dos propósitos: estas son el tipo de las excepciones lanzadas por la extensión RAR
    funciones y métodos y esto permite, a través de métodos estáticos consultar y definir el error y
    el comportamiento de la extensión, por ejemplo, si las excepciones son lanzadas o solamente se emiten advertencias.




    Los códigos de error que se utilizan los siguientes:




    -

      -1 - error fuera de biblioteca UnRAR



    -

      11 - memoria insuficiente




    -

      12 - datos dañados




    -

      13 - archivo dañado




    -

      14 - formato desconocido




    -

      15 - error de apertura de archivo




    -

      16 - error al crear archivo




    -

      17 - error al cerrar archivo




    -

      18 - error de lectura



     -

      19 - error de escritura




    -

      20 - búfer demasiado pequeño




    -

      21 - error RAR desconocido




    -

      22 - contraseña requerida pero no especificada


## Sinopsis de la Clase

    ****




      final
      class **RarException**



      extends
       [Exception](#class.exception)

     {


    /* Métodos */

public static [isUsingExceptions](#rarexception.isusingexceptions)(): [bool](#language.types.boolean)
public static [setUsingExceptions](#rarexception.setusingexceptions)([bool](#language.types.boolean) $using_exceptions): [void](language.types.void.html)

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

# RarException::isUsingExceptions

(PECL rar &gt;= 2.0.0)

RarException::isUsingExceptions — Comprobar si el manejador de errores con excepciones está en uso

### Descripción

public static **RarException::isUsingExceptions**(): [bool](#language.types.boolean)

Comprueba si las funciones RAR emitirán avisos y devolverán valores de error o si ellas
lanzarán excepciones en la mayoría de las circunstancias (no incluye algunos errores de programación
tales como pasar el tipo incorrecto de argumento).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si las excepciones estan siendo utilizadas, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo de RarException::isUsingExceptions()**

&lt;?php
//El valor predeterminado es no usar excepciones
var_dump(RarException::isUsingExceptions());
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(false)

### Ver también

    - [RarException::setUsingExceptions()](#rarexception.setusingexceptions) - Activar y desactivar el manejador de errores con excepciones

# RarException::setUsingExceptions

(PECL rar &gt;= 2.0.0)

RarException::setUsingExceptions — Activar y desactivar el manejador de errores con excepciones

### Descripción

public static **RarException::setUsingExceptions**([bool](#language.types.boolean) $using_exceptions): [void](language.types.void.html)

Si y sólo si el argumento es **[true](#constant.true)**, entonces, en lugar de emitir advertencias y devolver un valor especial indicando error cuando la biblioteca UnRAR encuentre un error, una excepción de tipo [RarException](#class.rarexception) será lanzada.

Las excepciones también será lanzado para los siguientes errores, que se producen fuera de la biblioteca (su código de error será -1):

- intentar algunas operaciones en un objeto [RarArchive](#class.rararchive) cerrado o un objeto [RarEntry](#class.rarentry) relativo al primero;

- intentar obtener una entrada que no existe con [RarArchive::getEntry()](#rararchive.getentry).

### Parámetros

     using_exceptions


       Debe ser **[true](#constant.true)** para activar lanzamiento de excepciones, **[false](#constant.false)** para descativarlo (el valor por defecto).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de RarException::setUsingExceptions()**

&lt;?php
var_dump(RarException::isUsingExceptions());
$arch = RarArchive::open("does_not_exist.rar");
var_dump($arch);

RarException::setUsingExceptions(true);
var_dump(RarException::isUsingExceptions());
$arch = RarArchive::open("does_not_exist.rar");
var_dump($arch); //not reached
?&gt;

    Resultado del ejemplo anterior es similar a:

bool(false)

Warning: RarArchive::open(): Failed to open does_not_exist.rar: ERAR_EOPEN (file open error) in C:\php_rar\trunk\tests\test.php on line 3
bool(false)
bool(true)

Fatal error: Uncaught exception 'RarException' with message 'unRAR internal error: Failed to open does_not_exist.rar: ERAR_EOPEN (file open error)' in C:\php_rar\trunk\tests\test.php:8
Stack trace:
#0 C:\php_rar\trunk\tests\test.php(8): RarArchive::open('does_not_exist....')
#1 {main}
thrown in C:\php_rar\trunk\tests\test.php on line 8

### Ver también

    - [RarException::isUsingExceptions()](#rarexception.isusingexceptions) - Comprobar si el manejador de errores con excepciones está en uso

## Tabla de contenidos

- [RarException::isUsingExceptions](#rarexception.isusingexceptions) — Comprobar si el manejador de errores con excepciones está en uso
- [RarException::setUsingExceptions](#rarexception.setusingexceptions) — Activar y desactivar el manejador de errores con excepciones

- [Introducción](#intro.rar)
- [Instalación/Configuración](#rar.setup)<li>[Instalación](#rar.installation)
- [Tipos de recursos](#rar.resources)
  </li>- [Constantes predefinidas](#rar.constants)
- [Ejemplos](#rar.examples)
- [Funciones Rar](#ref.rar)<li>[rar_wrapper_cache_stats](#function.rar-wrapper-cache-stats) — Caché de aciertos y errores del URL wrapper
  </li>- [RarArchive](#class.rararchive) — La clase RarArchive<li>[RarArchive::close](#rararchive.close) — Cerrar archivo RAR y liberar todos los recursos
- [RarArchive::getComment](#rararchive.getcomment) — Obtener comentarios de texto desde el archivo RAR
- [RarArchive::getEntries](#rararchive.getentries) — Obtener la lista completa de entradas del archivo RAR
- [RarArchive::getEntry](#rararchive.getentry) — Obtener el objeto entrada desde el archivo RAR
- [RarArchive::isBroken](#rararchive.isbroken) — Comprobar si un archivo está dañado (incompleto)
- [RarArchive::isSolid](#rararchive.issolid) — Comprueba si el archivo RAR es sólido
- [RarArchive::open](#rararchive.open) — Abre un archivo RAR
- [RarArchive::setAllowBroken](#rararchive.setallowbroken) — Determina si la apertura de archivos dañados se permite
- [RarArchive::\_\_toString](#rararchive.tostring) — Obtener representación de texto
  </li>- [RarEntry](#class.rarentry) — La clase RarEntry<li>[RarEntry::extract](#rarentry.extract) — Extraer entrada del archivo
- [RarEntry::getAttr](#rarentry.getattr) — Obtener los atributos de la entrada
- [RarEntry::getCrc](#rarentry.getcrc) — Obtener el CRC de la entrada
- [RarEntry::getFileTime](#rarentry.getfiletime) — Devolver entrada última fecha de modificación
- [RarEntry::getHostOs](#rarentry.gethostos) — Obtener sistema operativo anfitrión del archivo de entrada
- [RarEntry::getMethod](#rarentry.getmethod) — Obtener método pack de la entrada
- [RarEntry::getName](#rarentry.getname) — Obtener el nombre de la entrada
- [RarEntry::getPackedSize](#rarentry.getpackedsize) — Obtiene el tamaño empaquetado de la entrada
- [RarEntry::getStream](#rarentry.getstream) — Obtener manejador de archivo para entrada
- [RarEntry::getUnpackedSize](#rarentry.getunpackedsize) — Obtener el tamaño descomprimido de la entrada
- [RarEntry::getVersion](#rarentry.getversion) — Obtener la versión mínima del programa RAR requerida para desempaquetar la entrada
- [RarEntry::isDirectory](#rarentry.isdirectory) — Comprobar si una entrada representa un directorio
- [RarEntry::isEncrypted](#rarentry.isencrypted) — Comprobar si una entrada está cifrada
- [RarEntry::\_\_toString](#rarentry.tostring) — Obtener texto representación de entrada
  </li>- [RarException](#class.rarexception) — La clase RarException<li>[RarException::isUsingExceptions](#rarexception.isusingexceptions) — Comprobar si el manejador de errores con excepciones está en uso
- [RarException::setUsingExceptions](#rarexception.setusingexceptions) — Activar y desactivar el manejador de errores con excepciones
  </li>
