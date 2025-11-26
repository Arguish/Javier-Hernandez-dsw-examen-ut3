# Información Exif

# Introducción

Con la extensión exif, se puede trabajar con los datos meta de las imágenes. Por ejemplo, las funciones exif deben ser utilizadas para leer los datos meta de las imágenes tomadas por cámaras digitales, almacenados en el encabezado. Estos datos están comúnmente presentes en las imágenes JPEG y TIFF.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#exif.requirements)
- [Instalación](#exif.installation)
- [Configuración en tiempo de ejecución](#exif.configuration)

    ## Requerimientos

    PHP debe ser compilado con la opción
    --enable-exif. Para activar el soporte de etiquetas EXIF multibyte, la extensión
    [mbstring](#ref.mbstring) debe ser activada durante la compilación con --enable-mbstring. PHP no requiere ninguna biblioteca adicional para el funcionamiento del módulo exif.

## Instalación

Para habilitar el soporte para exif configure PHP con
**--enable-exif**

Los usuarios de Windows deben habilitar las DLL php_mbstring.dll
y php_exif.dll en php.ini. La DLL
php_mbstring.dll debe cargarse
_antes_ que la DLL php_exif.dll, así que
ajuste su php.ini como corresponde.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

Exif soporta automáticamente la conversión de codificaciones de caracteres
Unicode y JIS de comentarios de usuario cuando el módulo
[mbstring](#ref.mbstring)
está disponible. Ésto se realiza primero decodificando el comentario
utilizando el conjunto de caracteres especificado. El resultado después es codificado
con otro conjunto de caracteres que debería de coincidir con su
salida HTTP.

   <caption>**Opciones de configuración de Exif**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [exif.encode_unicode](#ini.exif.encode-unicode)
      "ISO-8859-15"
      **[INI_ALL](#constant.ini-all)**
       



      [exif.decode_unicode_motorola](#ini.exif.decode-unicode-motorola)
      "UCS-2BE"
      **[INI_ALL](#constant.ini-all)**
       



      [exif.decode_unicode_intel](#ini.exif.decode-unicode-intel)
      "UCS-2LE"
      **[INI_ALL](#constant.ini-all)**
       



      [exif.encode_jis](#ini.exif.encode-jis)
      ""
      **[INI_ALL](#constant.ini-all)**
       



      [exif.decode_jis_motorola](#ini.exif.decode-jis-motorola)
      "JIS"
      **[INI_ALL](#constant.ini-all)**
       



      [exif.decode_jis_intel](#ini.exif.decode-jis-intel)
      "JIS"
      **[INI_ALL](#constant.ini-all)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     exif.encode_unicode
     [string](#language.types.string)



      exif.encode_unicode define el
      conjunto de caracteres UNICODE de los comentarios de usuario que se están tratando.
      Por defecto es ISO-8859-15 lo que debería funcionar para
      la mayoría de los países no asiáticos. La configuración puede estar vacía
      o debe ser una codificacion soportada por mbstring. Si
      está vacía se usa la codificación interna actual de
      mbstring.







     exif.decode_unicode_motorola
     [string](#language.types.string)



       exif.decode_unicode_motorola define
       el conjunto de caracteres interno de la imagen para comentarios
       de usuario codificados con Unicode si la imagen está con el orden de byte de motorola (big-endian).
       Esta configuración no puede estar vacía pero puede especificar una lista
       de codificaciones soportadas por mbstring. El valor por defecto es UCS-2BE.







     exif.decode_unicode_intel
     [string](#language.types.string)



       exif.decode_unicode_intel define
       el conjunto de caracteres interno de la imagen para comentarios
       de usuario codificados con Unicode si la imagen está con el orden de byte de intel (little-endian).
       Esta configuración no puede estar vacía pero puede especificar una lista
       de codificaciones soportadas por mbstring. El valor por defecto es UCS-2LE.







     exif.encode_jis
     [string](#language.types.string)



       exif.encode_jis define el
       conjunto de caracteres JIS de los comentarios de usuario que se están tratando.
       Por defecto está vacía lo que fuerza a las
       funciones a usar la codificación interna actual de
       mbstring.







     exif.decode_jis_motorola
     [string](#language.types.string)



       exif.decode_jis_motorola define
       el conjunto de caracteres interno de la imagen para los comentarios de usuario
       codificados con JIS si la imagen está con el orden de byte de motorola (big-endian).
       Esta configuración no puede estar vacía pero puede especificar una lista
       de codificaciones soportadas por mbstring. El valor por defecto es JIS.







     exif.decode_jis_intel
     [string](#language.types.string)



       exif.decode_jis_intel define
       el conjunto de caracteres interno de la imagen para los comentarios de usuario
       codificados con JIS si la imagen está con el orden de byte de intel (little-endian).
       Esta configuración no puede estar vacía pero puede especificar una lista
       de codificaciones soportadas por mbstring. El valor por defecto es JIS.





# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

     **[EXIF_USE_MBSTRING](#constant.exif-use-mbstring)**
     ([int](#language.types.integer))



      Esta constante tiene el valor 1 si
      [mbstring](#ref.mbstring) está activado, de lo contrario
      su valor es 0.


La función [exif_imagetype()](#function.exif-imagetype) lista varias constantes
relacionadas.

# Funciones de Exif

# exif_imagetype

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

exif_imagetype — Determina el tipo de una imagen

### Descripción

    **exif_imagetype**([string](#language.types.string) $filename): [int](#language.types.integer)|[false](#language.types.singleton)


    **exif_imagetype()** lee los primeros octetos del fichero de imagen
    filename, y verifica su firma.




    **exif_imagetype()** puede ser utilizada para evitar las llamadas
    a las otras funciones [exif](#ref.exif) para los formatos de ficheros que
    no son soportados, o en conjunción con
    [$_SERVER['HTTP_ACCEPT']](#reserved.variables.server) para verificar
    si el usuario podrá ver esta imagen en su navegador.

### Parámetros

      filename


        La imagen a verificar.




### Valores devueltos

    Cuando se encuentra un valor válido, se devuelve la constante apropiada, y de lo contrario, **[false](#constant.false)**. El valor devuelto es el mismo
    que la función [getimagesize()](#function.getimagesize) en el índice 2, pero
    esta función es mucho más rápida.





    Las constantes siguientes están definidas y representan los valores
    posibles de retorno de la función **exif_imagetype()** :



     <caption>**Constantes de tipo de imágenes**</caption>



        Valor
        Constante






        1
        **[IMAGETYPE_GIF](#constant.imagetype-gif)**



        2
        **[IMAGETYPE_JPEG](#constant.imagetype-jpeg)**



        3
        **[IMAGETYPE_PNG](#constant.imagetype-png)**



        4
        **[IMAGETYPE_SWF](#constant.imagetype-swf)**



        5
        **[IMAGETYPE_PSD](#constant.imagetype-psd)**



        6
        **[IMAGETYPE_BMP](#constant.imagetype-bmp)**



        7
        **[IMAGETYPE_TIFF_II](#constant.imagetype-tiff-ii)** (orden de octetos de Intel)



        8

         **[IMAGETYPE_TIFF_MM](#constant.imagetype-tiff-mm)** (orden de octetos Motorola)




        9
        **[IMAGETYPE_JPC](#constant.imagetype-jpc)**



        10
        **[IMAGETYPE_JP2](#constant.imagetype-jp2)**



        11
        **[IMAGETYPE_JPX](#constant.imagetype-jpx)**



        12
        **[IMAGETYPE_JB2](#constant.imagetype-jb2)**



        13
        **[IMAGETYPE_SWC](#constant.imagetype-swc)**



        14
        **[IMAGETYPE_IFF](#constant.imagetype-iff)**



        15
        **[IMAGETYPE_WBMP](#constant.imagetype-wbmp)**



        16
        **[IMAGETYPE_XBM](#constant.imagetype-xbm)**



        17
        **[IMAGETYPE_ICO](#constant.imagetype-ico)**



        18
        **[IMAGETYPE_WEBP](#constant.imagetype-webp)**



        19
        **[IMAGETYPE_AVIF](#constant.imagetype-avif)**





**Nota**:

     La función **exif_imagetype()** emitirá una alerta de
     nivel **[E_NOTICE](#constant.e-notice)** y devolverá **[false](#constant.false)** si no es
     capaz de leer suficientes octetos desde el fichero para determinar
     el tipo de imagen.


### Historial de cambios

        Versión
        Descripción






        7.1.0

         Añadida la compatibilidad con WebP.




        8.1.0

         Añadida la compatibilidad con AVIF.






### Ejemplos

     **Ejemplo #1 Ejemplo con exif_imagetype()**




&lt;?php
if (exif_imagetype('image.gif') != IMAGETYPE_GIF) {
echo 'Esta imagen no es un gif';
}
?&gt;

### Ver también

     - [image_type_to_mime_type()](#function.image-type-to-mime-type) - Lee el Mime-Type de un tipo de imagen

     - [getimagesize()](#function.getimagesize) - Devuelve el tamaño de una imagen

# exif_read_data

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

exif_read_data — Lee los encabezados EXIF en las imágenes

### Descripción

**exif_read_data**(
    [resource](#language.types.resource)|[string](#language.types.string) $file,
    [?](#language.types.null)[string](#language.types.string) $required_sections = **[null](#constant.null)**,
    [bool](#language.types.boolean) $as_arrays = **[false](#constant.false)**,
    [bool](#language.types.boolean) $read_thumbnail = **[false](#constant.false)**
): [array](#language.types.array)|[false](#language.types.singleton)

**exif_read_data()** lee los encabezados EXIF
de las imágenes.
Con esta función, se pueden leer los datos meta generados por las cámaras
digitales.

Los encabezados EXIF tienden a estar presentes en las imágenes
JPEG/TIFF generadas por las cámaras digitales, pero desafortunadamente,
cada cámara digital tiene una idea diferente de cómo
sus imágenes deben ser marcadas, por lo que no siempre se puede contar
con un encabezado EXIF específico, aunque esté presente.

Los parámetros Height y Width
se calculan de la misma manera que para la función [getimagesize()](#function.getimagesize),
por lo que sus valores no formarán parte de ningún encabezado devuelto. De igual manera, el índice
html es la representación textual de la altura/ancho
utilizada en una etiqueta de imagen HTML clásica.

Cuando un encabezado EXIF contiene una nota de Copyright, este encabezado
puede contener a su vez dos valores. Como esta solución es inconsistente con los estándares EXIF 2.10, la sección COMPUTED
devolverá los dos encabezados, Copyright.Photographer
y Copyright.Editor, mientras que las secciones IFD0
contienen el array de bytes con caracteres NULL para separar las dos entradas;
o bien, solo la primera entrada si el tipo de datos era incorrecto
(comportamiento por defecto de EXIF). La sección COMPUTED también
contendrá una entrada Copyright, que será ya sea la cadena original
de copyright, o una lista de valores separados por comas de
fotos y copyright del autor.

La etiqueta UserComment presenta el mismo problema que la etiqueta Copyright.
Puede almacenar dos valores: primero, el juego de caracteres utilizado, luego
el valor en sí. Si es así, la sección IFD contendrá solo
el juego de caracteres, o un array de bytes. La sección COMPUTED
almacenará las dos entradas UserCommentEncoding y
UserComment. El índice UserComment
está disponible en ambos casos, y es preferible usarlo, en lugar del valor de la sección IFD0.

**exif_read_data()** valida los datos de las etiquetas EXIF de acuerdo
con la especificación EXIF ([» http://exif.org/Exif2-2.PDF](http://exif.org/Exif2-2.PDF), página 20).

### Parámetros

     file


       La ubicación del archivo de imagen. Puede ser ya sea una ruta de acceso
       al archivo (los wrappers de flujo también son soportados como
       de costumbre), o un flujo [resource](#language.types.resource).






     required_sections


       Lista de valores separados por comas
       de las secciones que deben presentarse en el array de resultado.
       Si ninguna de las secciones solicitadas se encuentra, el valor devuelto
       es **[false](#constant.false)**.






           FILE
           FileName (nombre del archivo), FileSize (tamaño del archivo),
           FileDateTime (fecha de modificación del archivo), SectionsFound (secciones encontradas)



           COMPUTED

            Atributo Html, ancho, altura, color o blanco y negro y más si está disponible.
            El ancho y la altura se calculan de la misma manera que la función
            [getimagesize()](#function.getimagesize), por lo que sus valores nunca
            deberían diferir. De igual manera, el índice
           html es la representación textual de la altura/ancho
           utilizada en una etiqueta de imagen HTML clásica.




           ANY_TAG

            Toda la información concerniente a esta etiqueta, como
            IFD0, EXIF, ...




           IFD0

            Todas las etiquetas IFD0.
            En imágenes normales, contienen las
            dimensiones de la imagen, etc.




           THUMBNAIL

            Un archivo que contiene una miniatura, si hay un segundo IFD.
            Toda la información etiquetada sobre esta miniatura
            será almacenada en esta sección.




           COMMENT
           Encabezado de comentario de las imágenes JPEG.



           EXIF

            La sección EXIF es una subsección de la sección IFD0. Ella
            contiene información más detallada sobre las imágenes. La mayoría
            de estos índices están relacionados con las cámaras digitales.











     as_arrays


       Especifica si cada sección debe convertirse en un array o no.
       Las required_sections  COMPUTED,
       THUMBNAIL y COMMENT siempre serán
       convertidas en arrays, ya que contienen nombres que podrían entrar en conflicto.






     read_thumbnail


       Cuando se define como **[true](#constant.true)**, la miniatura misma es leída. De lo contrario,
       solo se leen los datos contenidos en el archivo.





### Valores devueltos

Devuelve un array asociativo donde los índices son los nombres de los encabezados y los valores
son los valores asociados a estos encabezados. Si no se puede devolver ningún dato,
**exif_read_data()** devolverá **[false](#constant.false)**.

### Errores/Excepciones

Pueden generarse errores de nivel **[E_WARNING](#constant.e-warning)** y/o **[E_NOTICE](#constant.e-notice)**
para etiquetas no soportadas u otras condiciones de error potencial, pero la función intenta leer toda la información comprensible.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        required_sections ahora es nullable.




       7.2.0


         Se ha añadido el soporte para los siguientes formatos EXIF:



          - Samsung

          - DJI

          - Panasonic

          - Sony

          - Pentax

          - Minolta

          - Sigma/Foveon

          - AGFA

          - Kyocera

          - Ricoh

          - Epson








### Ejemplos

    **Ejemplo #1 Ejemplo con exif_read_data()**

&lt;?php
echo "test1.jpg:&lt;br /&gt;\n";
$exif = exif_read_data('tests/test1.jpg', 'IFD0');
echo $exif===false ? "No se encontraron encabezados de datos.&lt;br /&gt;\n" : "La imagen contiene encabezados&lt;br /&gt;\n";

$exif = exif_read_data('tests/test2.jpg', 0, true);
echo "test2.jpg:&lt;br /&gt;\n";
foreach ($exif as $key =&gt; $section) {
    foreach ($section as $name =&gt; $val) {
        echo "$key.$name: $val&lt;br /&gt;\n";
}
}
?&gt;

     La primera llamada falla porque la imagen no tiene encabezado de información.



    Resultado del ejemplo anterior es similar a:

test1.jpg:
No se encontraron encabezados de datos.
test2.jpg:
FILE.FileName: test2.jpg
FILE.FileDateTime: 1017666176
FILE.FileSize: 1240
FILE.FileType: 2
FILE.SectionsFound: ANY_TAG, IFD0, THUMBNAIL, COMMENT
COMPUTED.html: width="1" height="1"
COMPUTED.Height: 1
COMPUTED.Width: 1
COMPUTED.IsColor: 1
COMPUTED.ByteOrderMotorola: 1
COMPUTED.UserComment: Exif test image.
COMPUTED.UserCommentEncoding: ASCII
COMPUTED.Copyright: Photo (c) M.Boerger, Edited by M.Boerger.
COMPUTED.Copyright.Photographer: Photo (c) M.Boerger
COMPUTED.Copyright.Editor: Edited by M.Boerger.
IFD0.Copyright: Photo (c) M.Boerger
IFD0.UserComment: ASCII
THUMBNAIL.JPEGInterchangeFormat: 134
THUMBNAIL.JPEGInterchangeFormatLength: 523
COMMENT.0: Comment #1.
COMMENT.1: Comment #2.
COMMENT.2: Comment #3end
THUMBNAIL.JPEGInterchangeFormat: 134
THUMBNAIL.Thumbnail.Height: 1
THUMBNAIL.Thumbnail.Height: 1

    **Ejemplo #2 exif_read_data()** con flujos disponibles desde PHP 7.2.0

&lt;?php
// Abrir el archivo, esto debería ser en modo binario
$fp = fopen('/path/to/image.jpg', 'rb');

if (!$fp) {
echo 'Error: No se pudo abrir la imagen para lectura';
exit;
}

// Intentar leer los encabezados EXIF
$headers = exif_read_data($fp);

if (!$headers) {
echo 'Error: No se pudieron leer los encabezados exif';
exit;
}

// Mostrar los encabezados 'COMPUTED'
echo 'EXIF Headers:' . PHP_EOL;

foreach ($headers['COMPUTED'] as $header =&gt; $value) {
printf(' %s =&gt; %s%s', $header, $value, PHP_EOL);
}
?&gt;

    Resultado del ejemplo anterior es similar a:

EXIF Headers:
Height =&gt; 576
Width =&gt; 1024
IsColor =&gt; 1
ByteOrderMotorola =&gt; 0
ApertureFNumber =&gt; f/5.6
UserComment =&gt;
UserCommentEncoding =&gt; UNDEFINED
Copyright =&gt; Denis
Thumbnail.FileType =&gt; 2
Thumbnail.MimeType =&gt; image/jpeg

### Notas

**Nota**:

    Si [mbstring](#ref.mbstring) está activado, EXIF intentará
    tratar el Unicode y elegir un juego de caracteres como se especifica por
    [exif.decode_unicode_motorola](#ini.exif.decode-unicode-motorola) y
    [exif.decode_unicode_intel](#ini.exif.decode-unicode-intel).
    La extensión EXIF no intentará determinar el codificado por sí misma, y es
    responsabilidad del usuario especificar correctamente el codificado a usar
    para el decodificado definiendo una de las dos directivas INI antes
    de llamar a **exif_read_data()**.

**Nota**:

    Si el parámetro file se usa para pasar un
    flujo a la función, entonces el flujo debe ser reposicionable. Tenga en cuenta que la
    posición del puntero de un archivo no se modifica después del retorno de
    esta función.

### Ver también

    - [exif_thumbnail()](#function.exif-thumbnail) - Recupera la miniatura de una imagen

    - [getimagesize()](#function.getimagesize) - Devuelve el tamaño de una imagen

    - [Protocolos y Envolturas soportados](#wrappers)

# exif_tagname

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

exif_tagname — Obtener el nombre de la cabecera de un índice

### Descripción

**exif_tagname**([int](#language.types.integer) $index): [string](#language.types.string)|[false](#language.types.singleton)

### Parámetros

     index


       La etiqueta ID correspondiente a la etiqueta Name que examinará.





### Valores devueltos

Devuelve el nombre de la cabecera, o **[false](#constant.false)** si index no está
definido con un identificador de etiqueta EXIF.

### Ejemplos

    **Ejemplo #1 Ejemplo exif_tagname()**

&lt;?php
echo "256: ".exif_tagname(256).PHP_EOL;
echo "257: ".exif_tagname(257).PHP_EOL;
?&gt;

    El ejemplo anterior mostrará:

256: ImageWidth
257: ImageLength

### Ver también

    - [exif_imagetype()](#function.exif-imagetype) - Determina el tipo de una imagen

    - [» Especificación EXIF](http://exif.org/Exif2-2.PDF)

    - [» Etiquetas EXIF](http://www.sno.phy.queensu.ca/~phil/exiftool/TagNames/EXIF.html)

# exif_thumbnail

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

exif_thumbnail — Recupera la miniatura de una imagen

### Descripción

**exif_thumbnail**(
    [resource](#language.types.resource)|[string](#language.types.string) $file,
    [int](#language.types.integer) &amp;$width = **[null](#constant.null)**,
    [int](#language.types.integer) &amp;$height = **[null](#constant.null)**,
    [int](#language.types.integer) &amp;$image_type = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)

**exif_thumbnail()** lee la miniatura de la imagen.

Si se desea mostrar miniaturas con esta función, debe enviarse el tipo MIME adecuado con la función [header()](#function.header).

Es posible que la función **exif_thumbnail()**
no logre crear la imagen pero pueda determinar su tamaño. En este caso, la función
devuelve **[false](#constant.false)** pero los parámetros width y
height están definidos.

### Parámetros

     file


       Ubicación del fichero de imagen. Puede tratarse de una ruta de acceso
       al fichero o de un flujo [resource](#language.types.resource).






     width


       El ancho devuelto de la miniatura devuelta.






     height


       La altura devuelta de la miniatura devuelta.






     image_type


       El tipo de imagen devuelto de la miniatura devuelta. Puede ser
       TIFF o JPEG.





### Valores devueltos

Devuelve la miniatura integrada o **[false](#constant.false)** si la imagen no contiene
miniatura.

### Historial de cambios

       Versión
       Descripción






       7.2.0

        El parámetro file soporta ficheros
        locales o recursos de flujo.





### Ejemplos

    **Ejemplo #1 Ejemplo con exif_thumbnail()**

&lt;?php
if (array_key_exists('file', $_REQUEST)) {
    $image = exif_thumbnail($\_REQUEST['file'], $width, $height, $type);
} else {
    $image = false;
}
if ($image!==false) {
header('Content-type: ' .image_type_to_mime_type($type));
echo $image;
exit;
} else {
// no hay miniatura disponible, tratamiento del error aquí
echo 'No thumbnail available';
}
?&gt;

### Notas

**Nota**:

    Si el parámetro file se utiliza para pasar un
    flujo a la función, entonces el flujo debe ser reposicionable. Tenga en cuenta que la
    posición del puntero de un fichero no se modifica después del retorno
    de esta función.

### Ver también

    - [exif_read_data()](#function.exif-read-data) - Lee los encabezados EXIF en las imágenes

    - [image_type_to_mime_type()](#function.image-type-to-mime-type) - Lee el Mime-Type de un tipo de imagen

# read_exif_data

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7)

read_exif_data — Alias de [exif_read_data()](#function.exif-read-data)

**Advertencia**Este alias está
_OBSOLETO_ en PHP 7.2.0, y _ELIMINADO_ a partir de PHP 8.0.0.

### Descripción

Esta función es un alias de:
[exif_read_data()](#function.exif-read-data).

### Historial de cambios

       Versión
       Descripción






       7.2.0

        Este alias de función ha sido deprecado.





## Tabla de contenidos

- [exif_imagetype](#function.exif-imagetype) — Determina el tipo de una imagen
- [exif_read_data](#function.exif-read-data) — Lee los encabezados EXIF en las imágenes
- [exif_tagname](#function.exif-tagname) — Obtener el nombre de la cabecera de un índice
- [exif_thumbnail](#function.exif-thumbnail) — Recupera la miniatura de una imagen
- [read_exif_data](#function.read-exif-data) — Alias de exif_read_data

- [Introducción](#intro.exif)
- [Instalación/Configuración](#exif.setup)<li>[Requerimientos](#exif.requirements)
- [Instalación](#exif.installation)
- [Configuración en tiempo de ejecución](#exif.configuration)
  </li>- [Constantes predefinidas](#exif.constants)
- [Funciones de Exif](#ref.exif)<li>[exif_imagetype](#function.exif-imagetype) — Determina el tipo de una imagen
- [exif_read_data](#function.exif-read-data) — Lee los encabezados EXIF en las imágenes
- [exif_tagname](#function.exif-tagname) — Obtener el nombre de la cabecera de un índice
- [exif_thumbnail](#function.exif-thumbnail) — Recupera la miniatura de una imagen
- [read_exif_data](#function.read-exif-data) — Alias de exif_read_data
  </li>
