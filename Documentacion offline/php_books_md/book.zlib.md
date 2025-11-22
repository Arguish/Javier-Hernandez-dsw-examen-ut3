# Compresión Zlib

# Introducción

Este módulo permite leer y escribir ficheros comprimidos con
gzip (.gz) de forma transparente, a través de las versiones de la mayoría
de las funciones de [sistemas de ficheros](#book.filesystem)
que trabajan con ficheros comprimidos con gzip (y también con ficheros descomprimidos,
pero no con sockets).

**Nota**:

    PHP viene con una envoltura basada en fopen para ficheros .gz.
    Hay más información disponible en la sección sobre
    [zlib://](#wrappers.compression).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#zlib.requirements)
- [Instalación](#zlib.installation)
- [Configuración en tiempo de ejecución](#zlib.configuration)
- [Tipos de recursos](#zlib.resources)

    ## Requerimientos

    Este módulo usa las funciones de [» zlib](http://www.zlib.net/)
    por Jean-loup Gailly y Mark Adler.
    A partir de PHP 8.4.0, la versión mínima de zlib requerida es 1.2.11.
    Antes de PHP 8.4.0, la versión mínima de zlib requerida era 1.2.0.4.

## Instalación

El soporte para Zlib en PHP no está activado por defecto. Es
necesario configurar PHP con la opción
**--with-zlib[=DIR]**

La versión Windows de PHP
dispone del soporte automático de esta extensión. No es necesario
añadir ninguna biblioteca adicional para disponer de estas funciones.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

La extensión zlib ofrece la opción de comprimir de manera trasparente
las páginas sobre la marcha, si el navegador que hace la solicitud
lo soporta. Por lo tanto hay tres opciones en el [archivo de configuración](#configuration.file) php.ini.

   <caption>**Opciones de Configuración de Zlib**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [zlib.output_compression](#ini.zlib.output-compression)
      "0"
      **[INI_ALL](#constant.ini-all)**
       



      [zlib.output_compression_level](#ini.zlib.output-compression-level)
      "-1"
      **[INI_ALL](#constant.ini-all)**
       



      [zlib.output_handler](#ini.zlib.output-handler)
      ""
      **[INI_ALL](#constant.ini-all)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

    zlib.output_compression
    [bool](#language.types.boolean)/[int](#language.types.integer)



     Para comprimir páginas transparentemente. Si esta opción está
     configurada en "On" en php.ini o en la configuración de
     Apache, las páginas serán comprimidas si el navegador envía
     un encabezado "Accept-Encoding: gzip" o "deflate". Los
     encabezados "Content-Encoding: gzip" (respectivamente
     "deflate") y "Vary: Accept-Encoding" serán agregados a la
     salida. En tiempo de ejecución, esto se puede configurar
     sólo antes de enviar cualquier salida.




     Esta opción también acepta valores enteros (integer) en lugar de
     boolean en "On"/"Off", usando esto se puede configurar el
     tamaño del buffer de salida (por defecto es 4KB).



    **Nota**:



      [output_handler](#ini.output-handler) debe estar
      vacío si ésta se configura en 'On' ! De otra manera se debe usar zlib.output_handler.









    zlib.output_compression_level
    [int](#language.types.integer)



     Nivel de compresión usado para la salida de la compresión transparente.
     Especifica un valor entre 0 (no comprimido) y 9 (máxima compresión).
     El valor por defecto es -1, que deja que el servidor decida cual
     nivel utilizar.








    zlib.output_handler
    [string](#language.types.string)



     No se pueden especificar manejadores adicionales de salida si
     zlib.output_compression está activada aquí. Esta configuración
     hace lo mismo que [
     output_handler](#ini.output-handler) pero en un orden diferente.

## Tipos de recursos

Esta extensión define un recurso de archivo puntero retornado por
[gzopen()](#function.gzopen).
Antes de PHP 8.0.0, zlib.deflate y zlib.inflate recursos también estaban definidos.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[FORCE_GZIP](#constant.force-gzip)**
    ([int](#language.types.integer))









    **[FORCE_DEFLATE](#constant.force-deflate)**
    ([int](#language.types.integer))









    **[ZLIB_ENCODING_RAW](#constant.zlib-encoding-raw)**
    ([int](#language.types.integer))



     Algoritmo DEFLATE según RFC 1951.





    **[ZLIB_ENCODING_DEFLATE](#constant.zlib-encoding-deflate)**
    ([int](#language.types.integer))



     Algoritmo de compresión ZLIB según RFC 1950.





    **[ZLIB_ENCODING_GZIP](#constant.zlib-encoding-gzip)**
    ([int](#language.types.integer))



     Algoritmo GZIP según RFC 1952.





    **[ZLIB_FILTERED](#constant.zlib-filtered)**
    ([int](#language.types.integer))









    **[ZLIB_HUFFMAN_ONLY](#constant.zlib-huffman-only)**
    ([int](#language.types.integer))









    **[ZLIB_FIXED](#constant.zlib-fixed)**
    ([int](#language.types.integer))









    **[ZLIB_RLE](#constant.zlib-rle)**
    ([int](#language.types.integer))









    **[ZLIB_DEFAULT_STRATEGY](#constant.zlib-default-strategy)**
    ([int](#language.types.integer))









    **[ZLIB_BLOCK](#constant.zlib-block)**
    ([int](#language.types.integer))









    **[ZLIB_NO_FLUSH](#constant.zlib-no-flush)**
    ([int](#language.types.integer))









    **[ZLIB_PARTIAL_FLUSH](#constant.zlib-partial-flush)**
    ([int](#language.types.integer))









    **[ZLIB_SYNC_FLUSH](#constant.zlib-sync-flush)**
    ([int](#language.types.integer))









    **[ZLIB_FULL_FLUSH](#constant.zlib-full-flush)**
    ([int](#language.types.integer))









    **[ZLIB_FINISH](#constant.zlib-finish)**
    ([int](#language.types.integer))









    **[ZLIB_VERSION](#constant.zlib-version)**
    ([string](#language.types.string))



     Número de versión de zlib como [string](#language.types.string).





      **[ZLIB_VERNUM](#constant.zlib-vernum)**
      ([int](#language.types.integer))



       Número de versión de zlib como [int](#language.types.integer).





      **[ZLIB_OK](#constant.zlib-ok)**
      ([int](#language.types.integer))



       No hay errores o información adicional de estado.





      **[ZLIB_STREAM_END](#constant.zlib-stream-end)**
      ([int](#language.types.integer))



       El stream terminó exitosamente.





      **[ZLIB_NEED_DICT](#constant.zlib-need-dict)**
      ([int](#language.types.integer))



       Se necesita un diccionario preestablecido.





      **[ZLIB_ERRNO](#constant.zlib-errno)**
      ([int](#language.types.integer))



       Error en la operación de archivo.





      **[ZLIB_STREAM_ERROR](#constant.zlib-stream-error)**
      ([int](#language.types.integer))



       El estado del stream es inconsistente o un parámetro es inválido.





      **[ZLIB_DATA_ERROR](#constant.zlib-data-error)**
      ([int](#language.types.integer))



       Los datos de entrada están corruptos.





      **[ZLIB_MEM_ERROR](#constant.zlib-mem-error)**
      ([int](#language.types.integer))



       Memoria insuficiente.





      **[ZLIB_BUF_ERROR](#constant.zlib-buf-error)**
      ([int](#language.types.integer))



       No se puede progresar debido a espacio de buffer insuficiente o finalización inesperada de un stream de entrada.





      **[ZLIB_VERSION_ERROR](#constant.zlib-version-error)**
      ([int](#language.types.integer))



       La versión de la biblioteca zlib es incompatible con la versión asumida por el llamador.



# Ejemplos

Este ejemplo abre un archivo temporal y escribe una cadena
de prueba en él, entonces muestra el contenido de este
archivo dos veces.

**Ejemplo #1 Pequeño Ejemplo de Zlib**

&lt;?php

$filename = tempnam('/tmp', 'zlibtest') . '.gz';
echo "&lt;html&gt;\n&lt;head&gt;&lt;/head&gt;\n&lt;body&gt;\n&lt;pre&gt;\n";
$s = "Sólo una prueba, prueba, prueba, prueba, prueba, prueba!\n";

// abre el archivo para escribir con compresión máxima
$zp = gzopen($filename, "w9");

// escribe la cadena en el archivo
gzwrite($zp, $s);

// cierra el archivo
gzclose($zp);

// abre el archivo para lectura
$zp = gzopen($filename, "r");

// lee el tercer carácter
echo gzread($zp, 3);

// salida hasta el fin del archivo y lo cierra
gzpassthru($zp);
gzclose($zp);

echo "\n";

// abre el archivo y muestra el contenido (por segunda vez).
if (readgzfile($filename) != strlen($s)) {
echo "Error con funciones de zlib!";
}
unlink($filename);
echo "&lt;/pre&gt;\n&lt;/body&gt;\n&lt;/html&gt;\n";

?&gt;

**Ejemplo #2 Trabajando con la API de compresión y descompresión increemental**

&lt;?php
// Perform GZIP compression:
$deflateContext = deflate_init(ZLIB_ENCODING_GZIP);
$compressed = deflate_add($deflateContext, "Data to compress", ZLIB_NO_FLUSH);
$compressed .= deflate_add($deflateContext, ", more data", ZLIB_NO_FLUSH);
$compressed .= deflate_add($deflateContext, ", and even more data!", ZLIB_FINISH);

// Perform GZIP decompression:
$inflateContext = inflate_init(ZLIB_ENCODING_GZIP);
$uncompressed = inflate_add($inflateContext, $compressed, ZLIB_NO_FLUSH);
$uncompressed .= inflate_add($inflateContext, NULL, ZLIB_FINISH);
echo $uncompressed;
?&gt;

El ejemplo anterior mostrará:

Data to compress, more data, and even more data!

# Funciones de Zlib

# deflate_add

(PHP 7, PHP 8)

deflate_add — Comprime datos de manera incremental

### Descripción

**deflate_add**([DeflateContext](#class.deflatecontext) $context, [string](#language.types.string) $data, [int](#language.types.integer) $flush_mode = **[ZLIB_SYNC_FLUSH](#constant.zlib-sync-flush)**): [string](#language.types.string)|[false](#language.types.singleton)

Comprime de manera incremental los datos en el contexto especificado.

### Parámetros

    context


      Un contexto creado con [deflate_init()](#function.deflate-init).






    data


      Un fragmento de datos a comprimir.






    flush_mode


      Una de las **[ZLIB_BLOCK](#constant.zlib-block)**,
      **[ZLIB_NO_FLUSH](#constant.zlib-no-flush)**,
      **[ZLIB_PARTIAL_FLUSH](#constant.zlib-partial-flush)**,
      **[ZLIB_SYNC_FLUSH](#constant.zlib-sync-flush)** (por defecto),
      **[ZLIB_FULL_FLUSH](#constant.zlib-full-flush)**, **[ZLIB_FINISH](#constant.zlib-finish)**.
      Normalmente, querrá establecer **[ZLIB_NO_FLUSH](#constant.zlib-no-flush)** para
      maximizar la compresión, y **[ZLIB_FINISH](#constant.zlib-finish)** para terminar
      con el último fragmento de datos. Consulte el [» manual de zlib](http://www.zlib.net/manual.html) para una
      descripción detallada de estas constantes.


### Valores devueltos

Devuelve un fragmento de datos comprimidos, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si se proporciona un argumento inválido, se genera un error de nivel
**[E_WARNING](#constant.e-warning)**.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       context ahora espera una instancia de [DeflateContext](#class.deflatecontext);
       anteriormente se esperaba un recurso.



### Ver también

- [deflate_init()](#function.deflate-init) - Inicializa un contexto de compresión incremental

# deflate_init

(PHP 7, PHP 8)

deflate_init — Inicializa un contexto de compresión incremental

### Descripción

**deflate_init**([int](#language.types.integer) $encoding, [array](#language.types.array) $options = []): [DeflateContext](#class.deflatecontext)|[false](#language.types.singleton)

Inicializa un contexto de compresión incremental utilizando el
encoding especificado.

Es importante señalar que la opción window aquí solo define el tamaño de la ventana
del algoritmo, diferente de los filtros zlib donde el mismo parámetro también define
la codificación a utilizar; la codificación debe ser definida con el parámetro
encoding.

Limitación: actualmente no hay manera de establecer la información del encabezado en un flujo comprimido GZIP,
que se define como sigue: firma GZIP
(\x1f\x8B); método de compresión (\x08
== DEFLATE); 6 bytes nulos; el sistema operativo establecido en el sistema actual
(\x00 = Windows, \x03 = Unix, etc.).

### Parámetros

    encoding


      Una de las constantes **[ZLIB_ENCODING_*](#constant.zlib-encoding-raw)**.






    options


      Un array asociativo que puede contener los siguientes elementos:




        level


          El nivel de compresión en el rango -1..9; por defecto -1.






        memory


          El nivel de memoria de compresión en el rango 1..9; por defecto 8.






        window


          El tamaño de la ventana zlib (logarítmico) en el rango 8..15;
          por defecto 15.
          zlib cambia un tamaño de ventana de 8 a 9,
          y a partir de zlib 1.2.8 falla con una advertencia, si se solicita un tamaño de ventana de 8
          para **[ZLIB_ENCODING_RAW](#constant.zlib-encoding-raw)** o **[ZLIB_ENCODING_GZIP](#constant.zlib-encoding-gzip)**.






        strategy


          Una de las **[ZLIB_FILTERED](#constant.zlib-filtered)**,
          **[ZLIB_HUFFMAN_ONLY](#constant.zlib-huffman-only)**, **[ZLIB_RLE](#constant.zlib-rle)**,
          **[ZLIB_FIXED](#constant.zlib-fixed)** o
          **[ZLIB_DEFAULT_STRATEGY](#constant.zlib-default-strategy)** (por defecto).






        dictionary


          Un [string](#language.types.string) o un [array](#language.types.array) de strings
          del diccionario predefinido (por defecto: ningún diccionario predefinido).








### Valores devueltos

Devuelve un contexto de compresión (zlib.deflate) en caso de
éxito, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si se pasa una opción inválida a options o si el
contexto no pudo ser creado, se genera un error de nivel **[E_WARNING](#constant.e-warning)**.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función ahora devuelve una instancia de [DeflateContext](#class.deflatecontext);
       anteriormente, se devolvía un [resource](#language.types.resource).



### Ver también

- [deflate_add()](#function.deflate-add) - Comprime datos de manera incremental

- [inflate_init()](#function.inflate-init) - Inicializa un contexto de descompresión incremental

# gzclose

(PHP 4, PHP 5, PHP 7, PHP 8)

gzclose — Cierra el apuntador de un archivo gz abierto

### Descripción

**gzclose**([resource](#language.types.resource) $stream): [bool](#language.types.boolean)

Cierra el apuntador del archivo gz dado.

### Parámetros

     stream


       El apuntador al archivo gz. Debe ser válido y debe apuntar a un
       archivo abierto exitosamente por [gzopen()](#function.gzopen).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de gzclose()**

&lt;?php
$gz = gzopen('somefile.gz','w9');
gzputs ($gz, 'I was added to somefile.gz');
gzclose($gz);
?&gt;

### Ver también

    - [gzopen()](#function.gzopen) - Abre un archivo gz

# gzcompress

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

gzcompress — Comprime una cadena

### Descripción

**gzcompress**([string](#language.types.string) $data, [int](#language.types.integer) $level = -1, [int](#language.types.integer) $encoding = **[ZLIB_ENCODING_DEFLATE](#constant.zlib-encoding-deflate)**): [string](#language.types.string)|[false](#language.types.singleton)

Esta función comprime la cadena dada usando el formato de datos
ZLIB.

Para detalles sobre el algoritmo de compresión ZLIB, ver el
documento "[» ZLIB Compressed Data Format
Specification version 3.3](https://datatracker.ietf.org/doc/html/rfc1950)" (RFC 1950).

**Nota**:

    Esto *no* es lo mismo que la compresión que gzip,
    la cuál incluye algunos encabezados de datos. Ver [gzencode()](#function.gzencode)
    para la compresión gzip.

### Parámetros

     data


       Los datos a comprimir.






     level


       El nivel de compresión. Se puede dar como 0 para ninguna compresión,
       hasta 9 para la máxima compresión.




       Si se utiliza -1, se usará la compresión por defecto de la librería zlib la cual es 6.






     encoding


       Una de las constentes **[ZLIB_ENCODING_*](#constant.zlib-encoding-raw)**.





### Valores devueltos

La cadena comprimida o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de gzcompress()**

&lt;?php
$compressed = gzcompress('Compress me', 9);
echo $compressed;
?&gt;

### Ver también

    - [gzdeflate()](#function.gzdeflate) - Comprime una cadena

    - [gzinflate()](#function.gzinflate) - Descomprime una cadena comprimida

    - [gzuncompress()](#function.gzuncompress) - Descomprime una cadena comprimida

    - [gzencode()](#function.gzencode) - Crea una cadena comprimida con gzip

# gzdecode

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

gzdecode — Decodifica una cadena comprimida con gzip

### Descripción

**gzdecode**([string](#language.types.string) $data, [int](#language.types.integer) $max_length = 0): [string](#language.types.string)|[false](#language.types.singleton)

Está función retorna una versión decodificada de la entrada
data.

### Parámetros

     data


       Los datos para decodificar, codificados con [gzencode()](#function.gzencode).






     max_length


       La longitud máxima de datos que decodificar.





### Valores devueltos

La cadena decodificada, o o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

En caso de fallo, se emite un error de nivel **[E_WARNING](#constant.e-warning)**.

### Ver también

    - [gzencode()](#function.gzencode) - Crea una cadena comprimida con gzip

# gzdeflate

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gzdeflate — Comprime una cadena

### Descripción

**gzdeflate**([string](#language.types.string) $data, [int](#language.types.integer) $level = -1, [int](#language.types.integer) $encoding = **[ZLIB_ENCODING_RAW](#constant.zlib-encoding-raw)**): [string](#language.types.string)|[false](#language.types.singleton)

Esta función comprime la cadena dada utilizando el formato de datos
DEFLATE.

Para más detalles sobre el algoritmo de compresión DEFLATE ver el
documento "[» DEFLATE Compressed Data Format
Specification version 1.3](https://datatracker.ietf.org/doc/html/rfc1951)" (RFC 1951).

### Parámetros

     data


       Los datos a comprimir.






     level


       El nivel de compresión. Se puede dar desde 0 para ninguna compresión
       hasta 9 para máxima compresión. Si no se especifica, se utilizará el
       nivel de compresión por defecto de la librería zlib.






     encoding


       Una de las constantes **[ZLIB_ENCODING_*](#constant.zlib-encoding-raw)**.





### Valores devueltos

La cadena comprimida o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de gzdeflate()**

&lt;?php
$compressed = gzdeflate('Compress me', 9);
echo $compressed;
?&gt;

### Ver también

    - [gzinflate()](#function.gzinflate) - Descomprime una cadena comprimida

    - [gzcompress()](#function.gzcompress) - Comprime una cadena

    - [gzuncompress()](#function.gzuncompress) - Descomprime una cadena comprimida

    - [gzencode()](#function.gzencode) - Crea una cadena comprimida con gzip

# gzencode

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gzencode — Crea una cadena comprimida con gzip

### Descripción

**gzencode**([string](#language.types.string) $data, [int](#language.types.integer) $level = -1, [int](#language.types.integer) $encoding = **[ZLIB_ENCODING_GZIP](#constant.zlib-encoding-gzip)**): [string](#language.types.string)|[false](#language.types.singleton)

Esta función retorna una versión comprimida de la data
de entrada, compatible con la salida del programa **gzip**.

Para más información sobre el formato de archivo GZIP, ver el
documento: [» GZIP file format specification
version 4.3](https://datatracker.ietf.org/doc/html/rfc1952) (RFC 1952).

### Parámetros

     data


       Los datos a codificar.






     level


       El nivel de compresión. Se puede dar como 0 para ninguna compresión,
       hasta 9 para la máxima compresión. Si no se incluye, se utilizará
       el nivel de compresión por defecto de la librería zlib.






     encoding


       El modo de codificación. Puede ser **[FORCE_GZIP](#constant.force-gzip)**
       (por defecto) o **[FORCE_DEFLATE](#constant.force-deflate)**.




       **[FORCE_DEFLATE](#constant.force-deflate)** genera
       una salida que cumple el RFC 1950, consistente en un encabezado zlib, los datos
       comprimidos y una suma de control Adler.





### Valores devueltos

La cadena codificada o **[false](#constant.false)** si ocurre un error.

### Ejemplos

Los datos resultantes contienen los encabezados y estructura
de datos apropiados para construir un archivo .gz estándar,
por ejemplo:

    **Ejemplo #1 Creando un archivo gzip**

&lt;?php
$data = file_get_contents("bigfile.txt");
$gzdata = gzencode($data, 9);
file_put_contents("bigfile.txt.gz", $gzdata);
?&gt;

### Ver también

    - [gzdecode()](#function.gzdecode) - Decodifica una cadena comprimida con gzip

    - [gzdeflate()](#function.gzdeflate) - Comprime una cadena

    - [gzinflate()](#function.gzinflate) - Descomprime una cadena comprimida

    - [gzuncompress()](#function.gzuncompress) - Descomprime una cadena comprimida

    - [gzcompress()](#function.gzcompress) - Comprime una cadena

    -
     [» 
      Especificación del formato ZLIB de compresión de datos (RFC 1950)
     ](https://datatracker.ietf.org/doc/html/rfc1950)

# gzeof

(PHP 4, PHP 5, PHP 7, PHP 8)

gzeof — Prueba de apuntador para EOF de archivo gz

### Descripción

**gzeof**([resource](#language.types.resource) $stream): [bool](#language.types.boolean)

Prueba el apuntador de archivo GZ dado en busca del EOF (fin de archivo).

### Parámetros

     stream


       El apuntador al archivo gz. Debe ser válido y debe apuntar a un
       archivo abierto exitosamente por [gzopen()](#function.gzopen).





### Valores devueltos

Retorna **[true](#constant.true)** si el apuntador GZ está al EOF del archivo o si ocurrió un error;
de lo contrario retorna **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de gzeof()**

&lt;?php
$gz = gzopen('somefile.gz', 'r');
while (!gzeof($gz)) {
echo gzgetc($gz);
}
gzclose($gz);
?&gt;

# gzfile

(PHP 4, PHP 5, PHP 7, PHP 8)

gzfile — Lee un archivo gz completo en una matriz

### Descripción

**gzfile**([string](#language.types.string) $filename, [int](#language.types.integer) $use_include_path = 0): [array](#language.types.array)|[false](#language.types.singleton)

Está función es identica a [readgzfile()](#function.readgzfile), excepto que
retorna el archivo en una matriz.

### Parámetros

     filename


       El nombre del archivo.






     use_include_path


       Se puede asignar este parámetro opcional en 1,
       si se desea buscar también el archivo en la ruta [include_path](#ini.include-path).





### Valores devueltos

Una matriz que contiene el archivo, una línea por celda, incluidas líneas vacías, y con líneas nuevas aún unidas, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de gzfile()**

&lt;?php
$lines = gzfile('somefile.gz');
foreach ($lines as $line) {
echo $line;
}
?&gt;

### Ver también

    - [readgzfile()](#function.readgzfile) - Lee todo el archivo comprimido

    - [gzopen()](#function.gzopen) - Abre un archivo gz

# gzgetc

(PHP 4, PHP 5, PHP 7, PHP 8)

gzgetc — Obtiene el caracter donde está el apuntador al archivo gz

### Descripción

**gzgetc**([resource](#language.types.resource) $stream): [string](#language.types.string)|[false](#language.types.singleton)

Retorna una cadena que contiene un solo caracter (sin comprimir)
leído del apuntador al archivo gz dado.

### Parámetros

     stream


       El apuntador al archivo gz. Debe ser válido y debe apuntar a un
       archivo abierto exitosamente por [gzopen()](#function.gzopen).





### Valores devueltos

El caracter sin comprimir o **[false](#constant.false)** en caso de EOF
(a diferencia de [gzeof()](#function.gzeof)).

### Ejemplos

    **Ejemplo #1 Ejemplo de gzgetc()**

&lt;?php
$gz = gzopen('somefile.gz', 'r');
while (!gzeof($gz)) {
echo gzgetc($gz);
}
gzclose($gz);
?&gt;

### Ver también

    - [gzopen()](#function.gzopen) - Abre un archivo gz

    - [gzgets()](#function.gzgets) - Obtiene la línea del apuntador al archivo

# gzgets

(PHP 4, PHP 5, PHP 7, PHP 8)

gzgets — Obtiene la línea del apuntador al archivo

### Descripción

**gzgets**([resource](#language.types.resource) $stream, [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

Obtiene una cadena (sin comprimir) de hasta un largo de - 1 bytes leídos desde el
apuntador al archivo dado. La lectura termina cuando el largo de - 1 bytes
ha sido leído, en un salto de línea o cuando se alcance
el fin del archivo (EOF), lo que ocurra primero.

### Parámetros

     stream


       El apuntador al archivo gz. Debe ser válido y debe apuntar a un
       archivo abierto exitosamente por [gzopen()](#function.gzopen).






     length


       La longitud de los datos a obtener.





### Valores devueltos

La cadena sin comprimir o **[false](#constant.false)** en caso de error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       length ahora es anulable; anteriormente,
       el valor predeterminado era 1024.



### Ejemplos

    **Ejemplo #1 Ejemplo de gzgets()**

&lt;?php
$handle = gzopen('somefile.gz', 'r');
while (!gzeof($handle)) {
$buffer = gzgets($handle, 4096);
echo $buffer;
}
gzlose($handle);;
?&gt;

### Ver también

    - [gzopen()](#function.gzopen) - Abre un archivo gz

    - [gzgetc()](#function.gzgetc) - Obtiene el caracter donde está el apuntador al archivo gz

    - [gzwrite()](#function.gzwrite) - Escritura en un archivo gz, segura a nivel binario

# gzgetss

(PHP 4, PHP 5, PHP 7)

gzgetss —
Obtiene la línea del apuntador al archivo gz y retira las etiquetas HTML

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.3.0,
y ha sido _ELIMINADA_ a partir de PHP 8.0.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**gzgetss**([resource](#language.types.resource) $zp, [int](#language.types.integer) $length, [string](#language.types.string) $allowable_tags = ?): [string](#language.types.string)

Función identica a [gzgets()](#function.gzgets), excepto que
**gzgetss()** intenta retirar cualquier
etiqueta HTML y PHP del texto que esta leyendo.

### Parámetros

     zp


       El apuntador al archivo gz. Debe ser válido y debe apuntar a un
       archivo abierto exitosamente por [gzopen()](#function.gzopen).






     length


       La longitud de los datos a obtener.






     allowable_tags


       Se puede usar éste parámetro opcional para especificar cuales etiquetas
       no se deben retirar.





### Valores devueltos

La cadena descomprimida y sin etiquetas o **[false](#constant.false)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de gzgetss()**

&lt;?php
$handle = gzopen('somefile.gz', 'r');
while (!gzeof($handle)) {
$buffer = gzgetss($handle, 4096);
echo $buffer;
}
gzlose($handle);
?&gt;

### Ver también

    - [gzopen()](#function.gzopen) - Abre un archivo gz

    - [gzgets()](#function.gzgets) - Obtiene la línea del apuntador al archivo

    - [strip_tags()](#function.strip-tags) - Elimina las etiquetas HTML y PHP de un string

# gzinflate

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

gzinflate — Descomprime una cadena comprimida

### Descripción

**gzinflate**([string](#language.types.string) $data, [int](#language.types.integer) $max_length = 0): [string](#language.types.string)|[false](#language.types.singleton)

Esta función descomprime una cadena comprimida.

### Parámetros

     data


       Los datos comprimidos con [gzdeflate()](#function.gzdeflate).






     max_length


       La longitud máxima de los datos descodificados.





### Valores devueltos

Los datos originales descomprimidos o **[false](#constant.false)** en caso de error.

La función retornará un error si los datos descomprimidos son
más de 32768 veces la longitud de la data de
entrada o, a menos que max_length sea 0,
mayores que el parámetro opcional max_length.

### Ejemplos

    **Ejemplo #1 Ejemplo de gzinflate()**

&lt;?php
$compressed   = gzdeflate('Compress me', 9);
$uncompressed = gzinflate($compressed);
echo $uncompressed;
?&gt;

### Ver también

    - [gzdeflate()](#function.gzdeflate) - Comprime una cadena

    - [gzcompress()](#function.gzcompress) - Comprime una cadena

    - [gzuncompress()](#function.gzuncompress) - Descomprime una cadena comprimida

    - [gzencode()](#function.gzencode) - Crea una cadena comprimida con gzip

# gzopen

(PHP 4, PHP 5, PHP 7, PHP 8)

gzopen — Abre un archivo gz

### Descripción

**gzopen**([string](#language.types.string) $filename, [string](#language.types.string) $mode, [int](#language.types.integer) $use_include_path = 0): [resource](#language.types.resource)|[false](#language.types.singleton)

Abre un archivo gzip (.gz) para lectura o escritura.

**gzopen()** se puede usar para leer un archivo el
cual no esté en formato gzip; en este caso [gzread()](#function.gzread)
leerá directamente el archivo sin descomprimirlo.

### Parámetros

     filename


       El nombre del archivo.






     mode


       Como en [fopen()](#function.fopen) (rb o
       wb) pero también puede incluir un nivel
       de compresión (wb9) u una estrategia:
       f para datos filtrados como en
       wb6f, h para
       compresión Huffman solamente como en
       wb1h. (Ver la descripción de deflateInit2
       en zlib.h para más información sobre el
       parámetro de estrategia.)






     use_include_path


       Se puede configurar este parámetro opcional en 1,
       si se desea buscar también el archivo en la ruta [include_path](#ini.include-path).





### Valores devueltos

Retorna un apuntador hacia el archivo abierto, después de eso, cualquier
cosa que se lea desde este descriptor de archivo sera descomprimido
de forma transparente y lo que se escriba será comprimido.

Si falla la apertura, la función retorna **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de gzopen()**

&lt;?php
$fp = gzopen("/tmp/file.gz", "r");
?&gt;

### Ver también

    - [gzclose()](#function.gzclose) - Cierra el apuntador de un archivo gz abierto

# gzpassthru

(PHP 4, PHP 5, PHP 7, PHP 8)

gzpassthru —
Muestra todos los datos restantes a partir del apuntador al achivo gz

### Descripción

**gzpassthru**([resource](#language.types.resource) $stream): [int](#language.types.integer)

Lee hasta el EOF desde la posición en el apuntador
al archivo gz y escribe los resultados (sin comprimir) en la salida
estándar.

**Nota**:

    Se puede necesitar llamar a la función [gzrewind()](#function.gzrewind)
    para restablecer el apuntador al inicio del archivo, si ya se han escrito
    datos en él.

**Sugerencia**

    Si sólo se desea volcar el contenido de un archivo en el buffer de salida,
    sin modificarlo primero o buscando una posición particular, se puede
    usar la función [readgzfile()](#function.readgzfile), la cual ahorra el
    llamado a la función [gzopen()](#function.gzopen).

### Parámetros

     stream


       El apuntador al archivo gz. Debe ser válido y debe apuntar a un
       archivo abierto exitosamente por [gzopen()](#function.gzopen).





### Valores devueltos

El número de caracteres sin comprimir leídos de gz
y pasados a través de la entrada.

### Ejemplos

    **Ejemplo #1 Ejemplo de gzpassthru()**

&lt;?php
$fp = gzopen('file.gz', 'r');
gzpassthru($fp);
gzclose($fp);
?&gt;

# gzputs

(PHP 4, PHP 5, PHP 7, PHP 8)

gzputs — Alias de [gzwrite()](#function.gzwrite)

### Descripción

Esta función es un alias de:
[gzwrite()](#function.gzwrite).

# gzread

(PHP 4, PHP 5, PHP 7, PHP 8)

gzread — Lectura de archivo gz segura a nivel binario

### Descripción

**gzread**([resource](#language.types.resource) $stream, [int](#language.types.integer) $length): [string](#language.types.string)|[false](#language.types.singleton)

**gzread()** lee los bytes hasta el parámetro
length desde el apuntador al archivo gz dado.
La lectura se detiene cuando los bytes del parámetro length
(sin comprimir) sean leídos o cuando se alcance el fin del archivo (EOF),
lo que ocurra primero.

### Parámetros

     stream


       El apuntador al archivo gz. Debe ser válido y debe apuntar a un
       archivo abierto exitosamente por [gzopen()](#function.gzopen).






     length


       El número de bytes a leer.





### Valores devueltos

Los datos que han sido leídos, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      7.4.0

       Esta función ahora devuelve **[false](#constant.false)** en caso de fallo; antes se devolvía 0.



### Ejemplos

    **Ejemplo #1 Ejemplo de gzread()**

&lt;?php
// pasar los contenidos de un archivo gz a una cadena
$filename = "/usr/local/something.txt.gz";
$zd = gzopen($filename, "r");
$contents = gzread($zd, 10000);
gzclose($zd);
?&gt;

### Ver también

    - [gzwrite()](#function.gzwrite) - Escritura en un archivo gz, segura a nivel binario

    - [gzopen()](#function.gzopen) - Abre un archivo gz

    - [gzgets()](#function.gzgets) - Obtiene la línea del apuntador al archivo

    - [gzgetss()](#function.gzgetss) - Obtiene la línea del apuntador al archivo gz y retira las etiquetas HTML

    - [gzfile()](#function.gzfile) - Lee un archivo gz completo en una matriz

    - [gzpassthru()](#function.gzpassthru) - Muestra todos los datos restantes a partir del apuntador al achivo gz

# gzrewind

(PHP 4, PHP 5, PHP 7, PHP 8)

gzrewind — Reinicia la posición del apuntador a un archivo gz

### Descripción

**gzrewind**([resource](#language.types.resource) $stream): [bool](#language.types.boolean)

Coloca el indicador de posición del apuntador al archivo gz dado al comienzo
del flujo del archivo.

### Parámetros

     stream


       El apuntador al archivo gz. Debe ser válido y debe apuntar a un
       archivo abierto exitosamente por [gzopen()](#function.gzopen).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [gzseek()](#function.gzseek) - Ubica el apuntador a un archivo gz

    - [gztell()](#function.gztell) - Indica la posición de lectura/escritura del apuntador al archivo gz

# gzseek

(PHP 4, PHP 5, PHP 7, PHP 8)

gzseek — Ubica el apuntador a un archivo gz

### Descripción

**gzseek**([resource](#language.types.resource) $stream, [int](#language.types.integer) $offset, [int](#language.types.integer) $whence = **[SEEK_SET](#constant.seek-set)**): [int](#language.types.integer)

Establece el indicador de posición para el apuntador al archivo
dado en el desplazamiento de bytes fijado en el flujo del archivo.
Es equivalente a llamar (en C) a gzseek(zp, offset, SEEK_SET).

Si el archivo está abierto para lectura, ésta función es emulada
pero puede ser extremadamente lenta. Si el archivo está abierto
para escritura, sólo está soportada la búsqueda hacia adelante;
entonces **gzseek()** comprime una secuencia de
ceros hasta la nueva posición de inicio.

### Parámetros

     stream


       El apuntador al archivo gz. Debe ser válido y debe apuntar a un
       archivo abierto exitosamente por [gzopen()](#function.gzopen).






     offset


       El desplazamiento buscado.






     whence


       Los valores de whence son:



        - **[SEEK_SET](#constant.seek-set)** - Establece la posición igual al offset de bytes.

        - **[SEEK_CUR](#constant.seek-cur)** - Establece la posición en la posición actual más el offset.




       Si whence no se especifica, se asume que es
       **[SEEK_SET](#constant.seek-set)**.





### Valores devueltos

En caso de éxito, retorna 0; en caso contrario, devuelve -1.
Notese que buscar pasado el EOF no es considerado un error.

### Ejemplos

    **Ejemplo #1 Ejamplo de gzseek()**

&lt;?php
$gz = gzopen('somefile.gz', 'r');
gzseek($gz,2);
echo gzgetc($gz);
gzclose($gz);
?&gt;

### Ver también

    - [gztell()](#function.gztell) - Indica la posición de lectura/escritura del apuntador al archivo gz

    - [gzrewind()](#function.gzrewind) - Reinicia la posición del apuntador a un archivo gz

# gztell

(PHP 4, PHP 5, PHP 7, PHP 8)

gztell — Indica la posición de lectura/escritura del apuntador al archivo gz

### Descripción

**gztell**([resource](#language.types.resource) $stream): [int](#language.types.integer)|[false](#language.types.singleton)

Obtiene la posición del apuntador al archivo dado; por ejemplo, su
desplazamiento en el flujo del archivo sin comprimir.

### Parámetros

     stream


       El apuntador al archivo gz. Debe ser válido y debe apuntar a un
       archivo abierto exitosamente por [gzopen()](#function.gzopen).





### Valores devueltos

La posición del apuntador al archivo o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [gzopen()](#function.gzopen) - Abre un archivo gz

    - [gzseek()](#function.gzseek) - Ubica el apuntador a un archivo gz

    - [gzrewind()](#function.gzrewind) - Reinicia la posición del apuntador a un archivo gz

# gzuncompress

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

gzuncompress — Descomprime una cadena comprimida

### Descripción

**gzuncompress**([string](#language.types.string) $data, [int](#language.types.integer) $max_length = 0): [string](#language.types.string)|[false](#language.types.singleton)

Está función descomprime una cadena comprimida

### Parámetros

     data


       Los datos comprimidos con [gzcompress()](#function.gzcompress).






     max_length


       La longitud máxima de datos a decodificar.





### Valores devueltos

Los datos originales sin comprimir o **[false](#constant.false)** en caso de error.

La función retornará un error si los datos descomprimidos son más de
32768 veces la longitud de la entrada comprimida data
o mayores que el parámetro opcional max_length.

### Ejemplos

    **Ejemplo #1 Ejemplo de gzuncompress()**

&lt;?php
$compressed   = gzcompress('Compress me', 9);
$uncompressed = gzuncompress($compressed);
echo $uncompressed;
?&gt;

### Ver también

    - [gzcompress()](#function.gzcompress) - Comprime una cadena

    - [gzinflate()](#function.gzinflate) - Descomprime una cadena comprimida

    - [gzdeflate()](#function.gzdeflate) - Comprime una cadena

    - [gzencode()](#function.gzencode) - Crea una cadena comprimida con gzip

# gzwrite

(PHP 4, PHP 5, PHP 7, PHP 8)

gzwrite — Escritura en un archivo gz, segura a nivel binario

### Descripción

**gzwrite**([resource](#language.types.resource) $stream, [string](#language.types.string) $data, [?](#language.types.null)[int](#language.types.integer) $length = **[null](#constant.null)**): [int](#language.types.integer)|[false](#language.types.singleton)

**gzwrite()** escribe el contenido de
data al archivo gz dado.

### Parámetros

     stream


       El apuntador al archivo gz. Debe ser válido y debe apuntar a un
       archivo abierto exitosamente por [gzopen()](#function.gzopen).






     data


       La cadena a escribir.






     length


       El número de bytes sin comprimir a escribir. Si se suministra, la
       escritura se detendrá después de que se hayan escrito los bytes
       (sin comprimir) del parámetro length
       o de que sea alcanzado el fin de la data,
       lo que ocurra primero.





### Valores devueltos

Retorna el número de bytes (sin comprimir) escritos en el flujo del
archivo gz dado, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       length ahora es anulable; anteriormente,
       el valor predeterminado era 0.




      7.4.0

       Esta función ahora devuelve **[false](#constant.false)** en caso de fallo; antes se devolvía 0.



### Ejemplos

    **Ejemplo #1 Ejemplo de gzwrite()**

&lt;?php
$string = 'Some information to compress';
$gz = gzopen('somefile.gz','w9');
gzwrite($gz, $string);
gzclose($gz);
?&gt;

### Ver también

    - [gzread()](#function.gzread) - Lectura de archivo gz segura a nivel binario

    - [gzopen()](#function.gzopen) - Abre un archivo gz

# inflate_add

(PHP 7, PHP 8)

inflate_add — Descomprime datos de manera incremental

### Descripción

**inflate_add**([InflateContext](#class.inflatecontext) $context, [string](#language.types.string) $data, [int](#language.types.integer) $flush_mode = **[ZLIB_SYNC_FLUSH](#constant.zlib-sync-flush)**): [string](#language.types.string)|[false](#language.types.singleton)

Descomprime de manera incremental los datos en el context especificado.

Limitación: la información del encabezado de un flujo comprimido GZIP no está disponible.

### Parámetros

    context


      Un contexto creado con [inflate_init()](#function.inflate-init).






    data


      Un fragmento de datos comprimidos.






    flush_mode


      Una de las **[ZLIB_BLOCK](#constant.zlib-block)**,
      **[ZLIB_NO_FLUSH](#constant.zlib-no-flush)**,
      **[ZLIB_PARTIAL_FLUSH](#constant.zlib-partial-flush)**,
      **[ZLIB_SYNC_FLUSH](#constant.zlib-sync-flush)** (por defecto),
      **[ZLIB_FULL_FLUSH](#constant.zlib-full-flush)**, **[ZLIB_FINISH](#constant.zlib-finish)**.
      Normalmente querrá establecer **[ZLIB_NO_FLUSH](#constant.zlib-no-flush)** para
      maximizar la compresión, y **[ZLIB_FINISH](#constant.zlib-finish)** para terminar
      con el último fragmento de datos. Consulte el [» manual de zlib](http://www.zlib.net/manual.html) para una
      descripción detallada de estas constantes.


### Valores devueltos

Devuelve un fragmento de datos descomprimidos, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si se proporcionan parámetros inválidos, descomprimir los datos requiere un
diccionario predefinido, pero ninguno está especificado, el flujo comprimido está corrupto
o tiene un checksum inválido, se genera un error de nivel **[E_WARNING](#constant.e-warning)**.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       context ahora espera una instancia [InflateContext](#class.inflatecontext)
       antes se esperaba un [resource](#language.types.resource).



### Ver también

- [inflate_init()](#function.inflate-init) - Inicializa un contexto de descompresión incremental

# inflate_get_read_len

(PHP 7 &gt;= 7.2.0, PHP 8)

inflate_get_read_len — Devuelve el número de bytes leídos hasta el momento

### Descripción

**inflate_get_read_len**([InflateContext](#class.inflatecontext) $context): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    context





### Valores devueltos

Devuelve el número de bytes leídos hasta el momento o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

        context ahora espera una instancia de [InflateContext](#class.inflatecontext);
        anteriormente se esperaba un [resource](#language.types.resource).



# inflate_get_status

(PHP 7 &gt;= 7.2.0, PHP 8)

inflate_get_status — Devuelve el estado de descompresión

### Descripción

**inflate_get_status**([InflateContext](#class.inflatecontext) $context): [int](#language.types.integer)

Generalmente devuelve **[ZLIB_OK](#constant.zlib-ok)** o **[ZLIB_STREAM_END](#constant.zlib-stream-end)**.

### Parámetros

    context





### Valores devueltos

Devuelve el estado de descompresión.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       context ahora espera una instancia de [InflateContext](#class.inflatecontext);
       anteriormente se esperaba un [resource](#language.types.resource).



# inflate_init

(PHP 7, PHP 8)

inflate_init — Inicializa un contexto de descompresión incremental

### Descripción

**inflate_init**([int](#language.types.integer) $encoding, [array](#language.types.array) $options = []): [InflateContext](#class.inflatecontext)|[false](#language.types.singleton)

    Inicializa un contexto de descompresión incremental con el encoding
    especificado.

### Parámetros

    encoding


      Una de las constantes **[ZLIB_ENCODING_*](#constant.zlib-encoding-raw)**.






    options


      Un array asociativo que puede contener los siguientes elementos:




        level


          El nivel de compresión en el rango -1..9; por defecto -1.






        memory


          El nivel de memoria de compresión en el rango 1..9; por defecto 8.






        window


          El tamaño de la ventana de compresión (logarítmica) en el rango 8..15; por defecto 15.






        strategy


          Una de las **[ZLIB_FILTERED](#constant.zlib-filtered)**,
          **[ZLIB_HUFFMAN_ONLY](#constant.zlib-huffman-only)**, **[ZLIB_RLE](#constant.zlib-rle)**,
          **[ZLIB_FIXED](#constant.zlib-fixed)** o
          **[ZLIB_DEFAULT_STRATEGY](#constant.zlib-default-strategy)** (por defecto).






        dictionary


          Un [string](#language.types.string) o un [array](#language.types.array) de strings
          del diccionario predefinido (por defecto: ningún diccionario predefinido).








### Valores devueltos

Devuelve un contexto de descompresión (zlib.inflate) en caso de
éxito, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si se pasa un codificación o una opción inválida a options,
o si el contexto no pudo ser creado, se genera un error de nivel
**[E_WARNING](#constant.e-warning)**.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función ahora devuelve una instancia de [InflateContext](#class.inflatecontext);
       anteriormente, se devolvía un [resource](#language.types.resource).



### Notas

**Precaución**

    A diferencia de [gzinflate()](#function.gzinflate), los contextos de inflado incremental no
    limitan la longitud de los datos decodificados, por lo que no proporcionan ninguna protección
    automática contra las bombas Zip.

### Ver también

- [inflate_add()](#function.inflate-add) - Descomprime datos de manera incremental

- [deflate_init()](#function.deflate-init) - Inicializa un contexto de compresión incremental

# ob_gzhandler

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

ob_gzhandler — Función de recuperación para la compresión automática de pastillas

### Descripción

**ob_gzhandler**([string](#language.types.string) $data, [int](#language.types.integer) $flags): [string](#language.types.string)|[false](#language.types.singleton)

**ob_gzhandler()** está destinada a ser usada como
función de devolución de llamada por [ob_start()](#function.ob-start) para facilitar
el envío de datos comprimidos a los navegadores que soportan páginas
comprimidas. Antes de que **ob_gzhandler()** envíe los datos
comprimidos, determina los tipos de codificación que son soportados por el
navegador ("gzip", "deflate" o ninguno)
y devuelve el contenido de los búferes
de manera apropiada. Todos los navegadores son manejados, ya que es responsabilidad
de los navegadores enviar un encabezado indicando los tipos de páginas soportadas.
Si el navegador no soporta páginas comprimidas, esta función
devolverá **[false](#constant.false)**.

### Parámetros

     data








     flags







### Valores devueltos

### Ejemplos

    **Ejemplo #1 Ejemplo con ob_gzhandler()**

&lt;?php

ob_start("ob_gzhandler");

?&gt;
&lt;html&gt;
&lt;body&gt;
&lt;p&gt;Esto debería ser una página comprimida.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;

### Notas

**Nota**:

    **ob_gzhandler()** requiere la extensión [zlib](#ref.zlib).

**Nota**:

    No puede usar simultáneamente
    **ob_gzhandler()** y
    [zlib.output_compression](#ini.zlib.output-compression).
    Además, tenga en cuenta que
    [zlib.output_compression](#ini.zlib.output-compression) es
    preferible a **ob_gzhandler()**.

### Ver también

    - [ob_start()](#function.ob-start) - Activa el temporizador de salida

    - [ob_end_flush()](#function.ob-end-flush) - Vacía (envía) el valor de retorno del manejador de salida activo

y desactiva el búfer de salida activo

# readgzfile

(PHP 4, PHP 5, PHP 7, PHP 8)

readgzfile — Lee todo el archivo comprimido

### Descripción

**readgzfile**([string](#language.types.string) $filename, [bool](#language.types.boolean) $use_include_path = **[false](#constant.false)**): [int](#language.types.integer)|[false](#language.types.singleton)

**readgzfile()** lee el archivo
filename, lo descomprime y muestra el resultado.

**readgzfile()** también puede utilizarse para leer un archivo
que no está comprimido: en este caso, **readgzfile()**
leerá el archivo sin descomprimirlo.

### Parámetros

     filename


       El nombre del fichero. Este fichero deberá ser abierto desde el sistema de ficheros
       y su contenido será mostrado.






     use_include_path


       Cuando se define como **[true](#constant.true)** la ruta
       [include_path](#ini.include-path)
       será utilizada para determinar el fichero a abrir.



### Valores devueltos

Devuelve el número de bytes (descomprimidos) leídos desde el fichero
en caso de éxito, o **[false](#constant.false)** si ocurre un error

### Errores/Excepciones

En caso de fallo, se emitirá una advertencia de tipo **[E_WARNING](#constant.e-warning)**.

### Ver también

    - [gzpassthru()](#function.gzpassthru) - Muestra todos los datos restantes a partir del apuntador al achivo gz

    - [gzfile()](#function.gzfile) - Lee un archivo gz completo en una matriz

    - [gzopen()](#function.gzopen) - Abre un archivo gz

# zlib_decode

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

zlib_decode — Descomprime datos codificados en craw/gzip/zlib

### Descripción

**zlib_decode**([string](#language.types.string) $data, [int](#language.types.integer) $max_length = 0): [string](#language.types.string)|[false](#language.types.singleton)

Descomprime datos codificados en raw/gzip/zlib.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    data









    max_length





### Valores devueltos

Devuelve los datos no comprimidos, o **[false](#constant.false)** si ocurre un error.

### Ver también

- [zlib_encode()](#function.zlib-encode) - Comprime datos con la codificación especificada

# zlib_encode

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

zlib_encode — Comprime datos con la codificación especificada

### Descripción

**zlib_encode**([string](#language.types.string) $data, [int](#language.types.integer) $encoding, [int](#language.types.integer) $level = -1): [string](#language.types.string)|[false](#language.types.singleton)

Comprime datos con la codificación especificada.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    data


      Los datos a comprimir.






    encoding


      El algoritmo de compresión. O bien **[ZLIB_ENCODING_RAW](#constant.zlib-encoding-raw)**,
      **[ZLIB_ENCODING_DEFLATE](#constant.zlib-encoding-deflate)** o
      **[ZLIB_ENCODING_GZIP](#constant.zlib-encoding-gzip)**.






    level





### Valores devueltos

### Ejemplos

**Ejemplo #1 Ejemplo de zlib_encode()**

&lt;?php
$str = 'hello world';
$enc = zlib_encode($str, ZLIB_ENCODING_DEFLATE);
echo bin2hex($enc);
?&gt;

El ejemplo anterior mostrará:

789ccb48cdc9c95728cf2fca4901001a0b045d

### Ver también

- [zlib_decode()](#function.zlib-decode) - Descomprime datos codificados en craw/gzip/zlib

# zlib_get_coding_type

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

zlib_get_coding_type — Retorna el tipo de codificación utilizada para hacer la compresión

### Descripción

**zlib_get_coding_type**(): [string](#language.types.string)|[false](#language.types.singleton)

Retorna el tipo de codificación utilizada para hacer la compresión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Los posibles valores de retorno son gzip,
deflate o **[false](#constant.false)**.

### Ver también

    -
     La directiva [zlib.output_compression](#ini.zlib.output-compression)

## Tabla de contenidos

- [deflate_add](#function.deflate-add) — Comprime datos de manera incremental
- [deflate_init](#function.deflate-init) — Inicializa un contexto de compresión incremental
- [gzclose](#function.gzclose) — Cierra el apuntador de un archivo gz abierto
- [gzcompress](#function.gzcompress) — Comprime una cadena
- [gzdecode](#function.gzdecode) — Decodifica una cadena comprimida con gzip
- [gzdeflate](#function.gzdeflate) — Comprime una cadena
- [gzencode](#function.gzencode) — Crea una cadena comprimida con gzip
- [gzeof](#function.gzeof) — Prueba de apuntador para EOF de archivo gz
- [gzfile](#function.gzfile) — Lee un archivo gz completo en una matriz
- [gzgetc](#function.gzgetc) — Obtiene el caracter donde está el apuntador al archivo gz
- [gzgets](#function.gzgets) — Obtiene la línea del apuntador al archivo
- [gzgetss](#function.gzgetss) — Obtiene la línea del apuntador al archivo gz y retira las etiquetas HTML
- [gzinflate](#function.gzinflate) — Descomprime una cadena comprimida
- [gzopen](#function.gzopen) — Abre un archivo gz
- [gzpassthru](#function.gzpassthru) — Muestra todos los datos restantes a partir del apuntador al achivo gz
- [gzputs](#function.gzputs) — Alias de gzwrite
- [gzread](#function.gzread) — Lectura de archivo gz segura a nivel binario
- [gzrewind](#function.gzrewind) — Reinicia la posición del apuntador a un archivo gz
- [gzseek](#function.gzseek) — Ubica el apuntador a un archivo gz
- [gztell](#function.gztell) — Indica la posición de lectura/escritura del apuntador al archivo gz
- [gzuncompress](#function.gzuncompress) — Descomprime una cadena comprimida
- [gzwrite](#function.gzwrite) — Escritura en un archivo gz, segura a nivel binario
- [inflate_add](#function.inflate-add) — Descomprime datos de manera incremental
- [inflate_get_read_len](#function.inflate-get-read-len) — Devuelve el número de bytes leídos hasta el momento
- [inflate_get_status](#function.inflate-get-status) — Devuelve el estado de descompresión
- [inflate_init](#function.inflate-init) — Inicializa un contexto de descompresión incremental
- [ob_gzhandler](#function.ob-gzhandler) — Función de recuperación para la compresión automática de pastillas
- [readgzfile](#function.readgzfile) — Lee todo el archivo comprimido
- [zlib_decode](#function.zlib-decode) — Descomprime datos codificados en craw/gzip/zlib
- [zlib_encode](#function.zlib-encode) — Comprime datos con la codificación especificada
- [zlib_get_coding_type](#function.zlib-get-coding-type) — Retorna el tipo de codificación utilizada para hacer la compresión

# La clase DeflateContext

(PHP 8)

## Introducción

    Una clase completamente opaca que reemplaza los recursos zlib.deflate a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **DeflateContext**
     {

}

# La clase InflateContext

(PHP 8)

## Introducción

    Una clase completamente opaca que reemplaza los recursos zlib.inflate de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **InflateContext**
     {

}

- [Introducción](#intro.zlib)
- [Instalación/Configuración](#zlib.setup)<li>[Requerimientos](#zlib.requirements)
- [Instalación](#zlib.installation)
- [Configuración en tiempo de ejecución](#zlib.configuration)
- [Tipos de recursos](#zlib.resources)
  </li>- [Constantes predefinidas](#zlib.constants)
- [Ejemplos](#zlib.examples)
- [Funciones de Zlib](#ref.zlib)<li>[deflate_add](#function.deflate-add) — Comprime datos de manera incremental
- [deflate_init](#function.deflate-init) — Inicializa un contexto de compresión incremental
- [gzclose](#function.gzclose) — Cierra el apuntador de un archivo gz abierto
- [gzcompress](#function.gzcompress) — Comprime una cadena
- [gzdecode](#function.gzdecode) — Decodifica una cadena comprimida con gzip
- [gzdeflate](#function.gzdeflate) — Comprime una cadena
- [gzencode](#function.gzencode) — Crea una cadena comprimida con gzip
- [gzeof](#function.gzeof) — Prueba de apuntador para EOF de archivo gz
- [gzfile](#function.gzfile) — Lee un archivo gz completo en una matriz
- [gzgetc](#function.gzgetc) — Obtiene el caracter donde está el apuntador al archivo gz
- [gzgets](#function.gzgets) — Obtiene la línea del apuntador al archivo
- [gzgetss](#function.gzgetss) — Obtiene la línea del apuntador al archivo gz y retira las etiquetas HTML
- [gzinflate](#function.gzinflate) — Descomprime una cadena comprimida
- [gzopen](#function.gzopen) — Abre un archivo gz
- [gzpassthru](#function.gzpassthru) — Muestra todos los datos restantes a partir del apuntador al achivo gz
- [gzputs](#function.gzputs) — Alias de gzwrite
- [gzread](#function.gzread) — Lectura de archivo gz segura a nivel binario
- [gzrewind](#function.gzrewind) — Reinicia la posición del apuntador a un archivo gz
- [gzseek](#function.gzseek) — Ubica el apuntador a un archivo gz
- [gztell](#function.gztell) — Indica la posición de lectura/escritura del apuntador al archivo gz
- [gzuncompress](#function.gzuncompress) — Descomprime una cadena comprimida
- [gzwrite](#function.gzwrite) — Escritura en un archivo gz, segura a nivel binario
- [inflate_add](#function.inflate-add) — Descomprime datos de manera incremental
- [inflate_get_read_len](#function.inflate-get-read-len) — Devuelve el número de bytes leídos hasta el momento
- [inflate_get_status](#function.inflate-get-status) — Devuelve el estado de descompresión
- [inflate_init](#function.inflate-init) — Inicializa un contexto de descompresión incremental
- [ob_gzhandler](#function.ob-gzhandler) — Función de recuperación para la compresión automática de pastillas
- [readgzfile](#function.readgzfile) — Lee todo el archivo comprimido
- [zlib_decode](#function.zlib-decode) — Descomprime datos codificados en craw/gzip/zlib
- [zlib_encode](#function.zlib-encode) — Comprime datos con la codificación especificada
- [zlib_get_coding_type](#function.zlib-get-coding-type) — Retorna el tipo de codificación utilizada para hacer la compresión
  </li>- [DeflateContext](#class.deflatecontext) — La clase DeflateContext
- [InflateContext](#class.inflatecontext) — La clase InflateContext
