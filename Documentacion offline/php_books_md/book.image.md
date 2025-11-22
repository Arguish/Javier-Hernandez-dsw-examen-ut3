# Procesamiento de imágenes y GD

# Introducción

PHP no se limita a la generación de páginas HTML. También puede servir
para crear y manipular imágenes, en una amplia variedad de formatos,
como GIF, PNG, JPEG,
WBMP y XPM. Además, PHP puede generar
directamente imágenes para el navegador, con la biblioteca GD.
GD y PHP también necesitarán otras bibliotecas, dependiendo
de los formatos que se deseen utilizar.

Las funciones PHP pueden usarse para obtener las
dimensiones de las imágenes en los formatos
JPEG, GIF,
PNG, SWF,
TIFF y JPEG2000.

Con la extensión [exif](#ref.exif), se podrá trabajar con
las informaciones almacenadas en los encabezados de las imágenes
JPEG y TIFF. De esta manera,
se podrán leer las metadatos generadas por los dispositivos digitales. Las funciones
exif no requieren la biblioteca GD.

**Nota**:

     Léase la sección sobre los requisitos para saber cómo extender las capacidades
     de las funciones sobre imágenes para leer, escribir y modificar imágenes.
     Para leer las metadatos de las fotos tomadas con dispositivos digitales,
     se debe utilizar la extensión [exif](#ref.exif) mencionada
     anteriormente.

**Nota**:

     La función [getimagesize()](#function.getimagesize) no requiere la extensión GD.

**Precaución**

     Mientras que la versión empaquetada de la biblioteca GD utiliza el gestor de
     memoria Zend para asignar memoria, las versiones del sistema no lo hacen, por lo que
     [memory_limit](#ini.memory-limit) no se aplica.

GD soporta un gran número de formatos; a continuación se presenta una lista de formatos soportados por GD
junto con notas que especifican la disponibilidad del soporte en lectura/escritura.

    <caption>**Formatos soportados por GD**</caption>



       Formato
       Soporte en lectura
       Soporte en escritura
       Notas






       JPEG
       **[true](#constant.true)**
       **[true](#constant.true)**
        



       PNG
       **[true](#constant.true)**
       **[true](#constant.true)**
        



       GIF
       **[true](#constant.true)**
       **[true](#constant.true)**
        



       XBM
       **[true](#constant.true)**
       **[true](#constant.true)**
        



       XPM
       **[true](#constant.true)**
       **[false](#constant.false)**
        



       WBMP
       **[true](#constant.true)**
       **[true](#constant.true)**
        



       WebP
       **[true](#constant.true)**
       **[true](#constant.true)**
        



       BMP
       **[true](#constant.true)**
       **[true](#constant.true)**
       Disponible a partir de PHP 7.2.0




Aunque la mayoría de los formatos estén disponibles con soporte en lectura
y escritura en la tabla anterior, esto no significa que PHP haya sido compilado
con el soporte adecuado. Para conocer los formatos soportados por GD durante la compilación,
utilícese la función [gd_info()](#function.gd-info); para más información sobre el
soporte durante la compilación de uno o varios formatos, consúltese el capítulo sobre
la instalación.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#image.requirements)
- [Instalación](#image.installation)
- [Configuración en tiempo de ejecución](#image.configuration)
- [Tipos de recursos](#image.resources)

    ## Requerimientos

    Si se dispone de la biblioteca GD (disponible
    en [» http://www.libgd.org/](http://www.libgd.org/)) también se podrán crear
    y manipular imágenes.

    Los formatos de imágenes que se podrán manipular dependen de la
    versión de GD que se instale, y de todas
    las demás bibliotecas que GD necesita para tratar
    estas imágenes.

**Nota**:

     Se requiere libgd-2.1.0 o superior. Alternativamente,
     utilice la biblioteca GD proporcionada con PHP.

**Nota**:

     La biblioteca GD requiere zlib &gt;= 1.2.0.4.

También se puede mejorar GD añadiendo formatos
de imágenes adicionales.

   <caption>**Formatos de imágenes soportados**</caption>
    
     
      
       Formato de imagen
       Biblioteca a descargar
       Notas


       gif
        
        



       avif
        
        



       jpeg
       [» http://www.ijg.org/](http://www.ijg.org/)

        Al compilar la biblioteca jpeg (antes de la de PHP),
        debe utilizarse la opción de configuración **--enable-shared**.
        De lo contrario, se recibirá un error indicando que
        libjpeg.(a|so) not found al intentar configurar PHP
        antes de compilarlo.




       png
       [» http://www.libpng.org/pub/png/libpng.html](http://www.libpng.org/pub/png/libpng.html)





       xpm
       [» http://www.ibiblio.org/pub/Linux/libs/X/!INDEX.html](http://www.ibiblio.org/pub/Linux/libs/X/!INDEX.html)

        Es probable que ya disponga de esta biblioteca si
        su sistema tiene un entorno X.




       webp
        
        




Puede querer extender GD para hacerla funcionar
con diferentes tipos de fuentes.
La biblioteca [» FreeType 2](http://www.freetype.org/) es soportada.

## Instalación

Para activar el soporte de GD, es necesario compilar PHP con
la opción **--with-gd[=DIR]**, donde DIR es el
directorio de instalación de GD. Se recomienda utilizar la versión
de GD que se distribuye con PHP, utilizando simplemente la opción
**--with-gd**.
La biblioteca GD requiere libpng y
libjpeg para compilar.
A partir de PHP 7.4.0, **--with-gd** se convierte
en **--enable-gd** (si es necesario activar la extensión
completa) y **--with-external-gd**
(para elegir utilizar una libgd externa, en lugar de la proporcionada).

En Windows, es necesario incluir la biblioteca
php_gd.dll como extensión en el archivo php.ini.
Anterior a PHP 8.0.0, la DLL se llamaba php_gd2.dll.

Se amplían las capacidades de GD para manejar otros formatos de imagen
especificando las siguientes opciones de compilación --with-XXXX:

   <caption>**Formatos de imagen soportados**</caption>
   
    
     
      Formato de imagen
      Opción de compilación


      avif

       Para activar el soporte de la biblioteca avif, añadir la opción
       **--with-avif**.
       Disponible a partir de PHP 8.1.0.




      jpeg

       Para activar el soporte de la biblioteca JPEG, añadir la opción
       **--with-jpeg-dir=DIR**. Jpeg 6b, 7 u 8
       son soportados.
       A partir de PHP 7.4.0, utilizar en su lugar
       **--with-jpeg**




      png

       Para activar el soporte de la biblioteca PNG, añadir la opción
       **--with-png-dir=DIR**. Tenga en cuenta que libpng
       requiere la biblioteca [zlib](#zlib.requirements)
       y, por lo tanto, será necesario añadir también
       **--with-zlib-dir[=DIR]** en su línea de compilación.
       A partir de PHP 7.4.0, **--with-png-dir**
       y **--with-zlib-dir** han sido eliminadas.
       libpng y zlib
       son necesarias.




      xpm

       Para activar el soporte de la biblioteca XPM, añadir la opción
       **--with-xpm-dir=DIR**. Si el script
       de compilación no es capaz de encontrar las bibliotecas
       necesarias, será necesario añadir la ruta hacia las bibliotecas X11.
       A partir de PHP 7.4.0, utilizar en su lugar
       **--with-xpm**




      webp

       Para activar el soporte de WebP, añadir
       **--with-vpx-dir=DIR**.
       A partir de PHP 7.4.0, utilizar en su lugar
       **--with-webp**



**Nota**:

    Al compilar PHP con libpng, es necesario utilizar la misma
    versión que la vinculada a la biblioteca GD.

Se amplían las capacidades de GD para manejar diferentes tipos
de fuentes de caracteres añadiendo las siguientes opciones
--with-XXXX de compilación:

   <caption>**Bibliotecas de fuentes soportadas**</caption>
   
    
     
      Biblioteca
      Opción de configuración


      FreeType 2

       Para activar el soporte de FreeType 2, añadir la opción
       **--with-freetype-dir=DIR**.
       A partir de PHP 7.4.0 utilizar **--with-freetype**
       en su lugar, que depende de pkg-config.




      TrueType strings

       Para activar el soporte de strings TrueType,
       añadir la opción
       **--enable-gd-native-ttf**.
       (Esta opción no tiene efecto y ha sido eliminada desde PHP 7.2.0.)



## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de Imagen**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [gd.jpeg_ignore_warning](#ini.gd.jpeg-ignore-warning)
      "1"
      **[INI_ALL](#constant.ini-all)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     gd.jpeg_ignore_warning
     [bool](#language.types.boolean)



      Ignora las advertencias (pero no los errores) creadas por libjpeg(-turbo).


   <caption>**Registro de cambios para gd.jpeg_ignore_warning**</caption>
   
    
     
      Versión
      Descripción


      7.1.0

       El valor predeterminado de gd.jpeg_ignore_warning ha cambiado de 0 a 1.



Véase también las directivas de configuración de
[exif](#exif.configuration).

**Advertencia**

Las funciones de imagen consumen mucha memoria. Asegúrese de establecer [memory_limit](#ini.memory-limit) con un valor bastante alto, si
está utilizando la versión incluida de la biblioteca GD.

## Tipos de recursos

Esta extensión define los siguientes tipos de recursos :

   <caption>**Lista de recursos en GD**</caption>
    
     
      
       Nombre
       Descripción
       Notas


       gd
       Recurso de imagen, utilizado por funciones como [imagecreatefrompng()](#function.imagecreatefrompng)
       Anterior a PHP 8.0.0



       gd font
       Recurso de fuente creado internamente por [imageloadfont()](#function.imageloadfont)
       Anterior a PHP 8.1.0




# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[GD_VERSION](#constant.gd-version)**
    ([string](#language.types.string))



     La versión GD de PHP.






    **[GD_MAJOR_VERSION](#constant.gd-major-version)**
    ([int](#language.types.integer))



     La versión mayor GD de PHP.






    **[GD_MINOR_VERSION](#constant.gd-minor-version)**
    ([int](#language.types.integer))



     La versión menor GD de PHP.






    **[GD_RELEASE_VERSION](#constant.gd-release-version)**
    ([int](#language.types.integer))



     La versión GD incluida con PHP.






    **[GD_EXTRA_VERSION](#constant.gd-extra-version)**
    ([string](#language.types.string))



     La versión "extra" GD (beta/rc..) de PHP.






    **[GD_BUNDLED](#constant.gd-bundled)**
    ([int](#language.types.integer))



     Cuando se utiliza la versión interna de GD, esta constante vale 1,
     de lo contrario, vale 0.





    **[IMG_AVIF](#constant.img-avif)**
    ([int](#language.types.integer))



    Used as a return value by [imagetypes()](#function.imagetypes)


     (Disponible a partir de PHP 8.1.0)





    **[IMG_BMP](#constant.img-bmp)**
    ([int](#language.types.integer))



    Used as a return value by [imagetypes()](#function.imagetypes)





    **[IMG_GIF](#constant.img-gif)**
    ([int](#language.types.integer))



    Used as a return value by [imagetypes()](#function.imagetypes)





    **[IMG_JPG](#constant.img-jpg)**
    ([int](#language.types.integer))



    Used as a return value by [imagetypes()](#function.imagetypes)





    **[IMG_JPEG](#constant.img-jpeg)**
    ([int](#language.types.integer))



    Used as a return value by [imagetypes()](#function.imagetypes)

    **Nota**:



      Esta constante tiene el mismo valor que **[IMG_JPG](#constant.img-jpg)**








    **[IMG_PNG](#constant.img-png)**
    ([int](#language.types.integer))



    Used as a return value by [imagetypes()](#function.imagetypes)





    **[IMG_TGA](#constant.img-tga)**
    ([int](#language.types.integer))



    Used as a return value by [imagetypes()](#function.imagetypes)


     (Disponible a partir de PHP 7.4.0)





    **[IMG_WBMP](#constant.img-wbmp)**
    ([int](#language.types.integer))



    Used as a return value by [imagetypes()](#function.imagetypes)





    **[IMG_XPM](#constant.img-xpm)**
    ([int](#language.types.integer))



    Used as a return value by [imagetypes()](#function.imagetypes)





    **[IMG_WEBP](#constant.img-webp)**
    ([int](#language.types.integer))



    Used as a return value by [imagetypes()](#function.imagetypes)


     (Disponible a partir de PHP 7.0.10)





    **[IMG_WEBP_LOSSLESS](#constant.img-webp-lossless)**
    ([int](#language.types.integer))



     (Disponible a partir de PHP 8.1.0)





    **[IMG_COLOR_TILED](#constant.img-color-tiled)**
    ([int](#language.types.integer))



    Special color option which can be used instead of a color allocated with
    [imagecolorallocate()](#function.imagecolorallocate) or
    [imagecolorallocatealpha()](#function.imagecolorallocatealpha).





    **[IMG_COLOR_STYLED](#constant.img-color-styled)**
    ([int](#language.types.integer))



    Special color option which can be used instead of a color allocated with
    [imagecolorallocate()](#function.imagecolorallocate) or
    [imagecolorallocatealpha()](#function.imagecolorallocatealpha).





    **[IMG_COLOR_BRUSHED](#constant.img-color-brushed)**
    ([int](#language.types.integer))



    Special color option which can be used instead of a color allocated with
    [imagecolorallocate()](#function.imagecolorallocate) or
    [imagecolorallocatealpha()](#function.imagecolorallocatealpha).





    **[IMG_COLOR_STYLEDBRUSHED](#constant.img-color-styledbrushed)**
    ([int](#language.types.integer))



    Special color option which can be used instead of a color allocated with
    [imagecolorallocate()](#function.imagecolorallocate) or
    [imagecolorallocatealpha()](#function.imagecolorallocatealpha).





    **[IMG_COLOR_TRANSPARENT](#constant.img-color-transparent)**
    ([int](#language.types.integer))



    Special color option which can be used instead of a color allocated with
    [imagecolorallocate()](#function.imagecolorallocate) or
    [imagecolorallocatealpha()](#function.imagecolorallocatealpha).





    **[IMG_AFFINE_TRANSLATE](#constant.img-affine-translate)**
    ([int](#language.types.integer))



    An affine transformation type constant used by the [imageaffinematrixget()](#function.imageaffinematrixget) function.





    **[IMG_AFFINE_SCALE](#constant.img-affine-scale)**
    ([int](#language.types.integer))



    An affine transformation type constant used by the [imageaffinematrixget()](#function.imageaffinematrixget) function.





    **[IMG_AFFINE_ROTATE](#constant.img-affine-rotate)**
    ([int](#language.types.integer))



    An affine transformation type constant used by the [imageaffinematrixget()](#function.imageaffinematrixget) function.





    **[IMG_AFFINE_SHEAR_HORIZONTAL](#constant.img-affine-shear-horizontal)**
    ([int](#language.types.integer))



    An affine transformation type constant used by the [imageaffinematrixget()](#function.imageaffinematrixget) function.





    **[IMG_AFFINE_SHEAR_VERTICAL](#constant.img-affine-shear-vertical)**
    ([int](#language.types.integer))



    An affine transformation type constant used by the [imageaffinematrixget()](#function.imageaffinematrixget) function.





    **[IMG_ARC_ROUNDED](#constant.img-arc-rounded)**
    ([int](#language.types.integer))



    A style constant used by the [imagefilledarc()](#function.imagefilledarc) function.

    **Nota**:



      Esta constante tiene el mismo valor que **[IMG_ARC_PIE](#constant.img-arc-pie)**








    **[IMG_ARC_PIE](#constant.img-arc-pie)**
    ([int](#language.types.integer))



    A style constant used by the [imagefilledarc()](#function.imagefilledarc) function.





    **[IMG_ARC_CHORD](#constant.img-arc-chord)**
    ([int](#language.types.integer))



    A style constant used by the [imagefilledarc()](#function.imagefilledarc) function.





    **[IMG_ARC_NOFILL](#constant.img-arc-nofill)**
    ([int](#language.types.integer))



    A style constant used by the [imagefilledarc()](#function.imagefilledarc) function.





    **[IMG_ARC_EDGED](#constant.img-arc-edged)**
    ([int](#language.types.integer))



    A style constant used by the [imagefilledarc()](#function.imagefilledarc) function.





    **[IMG_GD2_RAW](#constant.img-gd2-raw)**
    ([int](#language.types.integer))



    A type constant used by the [imagegd2()](#function.imagegd2) function.





    **[IMG_GD2_COMPRESSED](#constant.img-gd2-compressed)**
    ([int](#language.types.integer))



    A type constant used by the [imagegd2()](#function.imagegd2) function.





    **[IMG_EFFECT_REPLACE](#constant.img-effect-replace)**
    ([int](#language.types.integer))



    Alpha blending effect used by the [imagelayereffect()](#function.imagelayereffect) function.





    **[IMG_EFFECT_ALPHABLEND](#constant.img-effect-alphablend)**
    ([int](#language.types.integer))



    Alpha blending effect used by the [imagelayereffect()](#function.imagelayereffect) function.





    **[IMG_EFFECT_NORMAL](#constant.img-effect-normal)**
    ([int](#language.types.integer))



    Alpha blending effect used by the [imagelayereffect()](#function.imagelayereffect) function.





    **[IMG_EFFECT_OVERLAY](#constant.img-effect-overlay)**
    ([int](#language.types.integer))



    Alpha blending effect used by the [imagelayereffect()](#function.imagelayereffect) function.





    **[IMG_EFFECT_MULTIPLY](#constant.img-effect-multiply)**
    ([int](#language.types.integer))



    Alpha blending effect used by the [imagelayereffect()](#function.imagelayereffect) function.





    **[IMG_FILTER_NEGATE](#constant.img-filter-negate)**
    ([int](#language.types.integer))



    Special GD filter used by the [imagefilter()](#function.imagefilter) function.





    **[IMG_FILTER_GRAYSCALE](#constant.img-filter-grayscale)**
    ([int](#language.types.integer))



    Special GD filter used by the [imagefilter()](#function.imagefilter) function.





    **[IMG_FILTER_BRIGHTNESS](#constant.img-filter-brightness)**
    ([int](#language.types.integer))



    Special GD filter used by the [imagefilter()](#function.imagefilter) function.





    **[IMG_FILTER_CONTRAST](#constant.img-filter-contrast)**
    ([int](#language.types.integer))



    Special GD filter used by the [imagefilter()](#function.imagefilter) function.





    **[IMG_FILTER_COLORIZE](#constant.img-filter-colorize)**
    ([int](#language.types.integer))



    Special GD filter used by the [imagefilter()](#function.imagefilter) function.





    **[IMG_FILTER_EDGEDETECT](#constant.img-filter-edgedetect)**
    ([int](#language.types.integer))



    Special GD filter used by the [imagefilter()](#function.imagefilter) function.





    **[IMG_FILTER_GAUSSIAN_BLUR](#constant.img-filter-gaussian-blur)**
    ([int](#language.types.integer))



    Special GD filter used by the [imagefilter()](#function.imagefilter) function.





    **[IMG_FILTER_SELECTIVE_BLUR](#constant.img-filter-selective-blur)**
    ([int](#language.types.integer))



    Special GD filter used by the [imagefilter()](#function.imagefilter) function.





    **[IMG_FILTER_EMBOSS](#constant.img-filter-emboss)**
    ([int](#language.types.integer))



    Special GD filter used by the [imagefilter()](#function.imagefilter) function.





    **[IMG_FILTER_MEAN_REMOVAL](#constant.img-filter-mean-removal)**
    ([int](#language.types.integer))



    Special GD filter used by the [imagefilter()](#function.imagefilter) function.





    **[IMG_FILTER_SMOOTH](#constant.img-filter-smooth)**
    ([int](#language.types.integer))



    Special GD filter used by the [imagefilter()](#function.imagefilter) function.





    **[IMG_FILTER_PIXELATE](#constant.img-filter-pixelate)**
    ([int](#language.types.integer))



    Special GD filter used by the [imagefilter()](#function.imagefilter) function.





    **[IMG_FILTER_SCATTER](#constant.img-filter-scatter)**
    ([int](#language.types.integer))



    Special GD filter used by the [imagefilter()](#function.imagefilter) function.


     (Disponible a partir de PHP 7.4.0)





    **[IMAGETYPE_GIF](#constant.imagetype-gif)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_JPEG](#constant.imagetype-jpeg)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_JPEG2000](#constant.imagetype-jpeg2000)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_PNG](#constant.imagetype-png)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_SWF](#constant.imagetype-swf)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_PSD](#constant.imagetype-psd)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_BMP](#constant.imagetype-bmp)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_WBMP](#constant.imagetype-wbmp)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_XBM](#constant.imagetype-xbm)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_TIFF_II](#constant.imagetype-tiff-ii)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_TIFF_MM](#constant.imagetype-tiff-mm)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_IFF](#constant.imagetype-iff)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_JB2](#constant.imagetype-jb2)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_JPC](#constant.imagetype-jpc)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_JP2](#constant.imagetype-jp2)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_JPX](#constant.imagetype-jpx)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_SWC](#constant.imagetype-swc)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_ICO](#constant.imagetype-ico)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_WEBP](#constant.imagetype-webp)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.


     (Disponible a partir de PHP 7.1.0)





    **[IMAGETYPE_AVIF](#constant.imagetype-avif)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.


     (Disponible a partir de PHP 8.1.0)





    **[IMAGETYPE_UNKNOWN](#constant.imagetype-unknown)**
    ([int](#language.types.integer))



    Image type constant used by the [image_type_to_mime_type()](#function.image-type-to-mime-type)
    and [image_type_to_extension()](#function.image-type-to-extension) functions.





    **[IMAGETYPE_COUNT](#constant.imagetype-count)**
    ([int](#language.types.integer))



     El número de constantes de tipo de imagen (incluyendo el tipo "desconocido")
     soportadas por las funciones [image_type_to_mime_type()](#function.image-type-to-mime-type) y [image_type_to_extension()](#function.image-type-to-extension)





    **[PNG_NO_FILTER](#constant.png-no-filter)**
    ([int](#language.types.integer))



    A special PNG filter, used by the [imagepng()](#function.imagepng) function.





    **[PNG_FILTER_NONE](#constant.png-filter-none)**
    ([int](#language.types.integer))



    A special PNG filter, used by the [imagepng()](#function.imagepng) function.





    **[PNG_FILTER_SUB](#constant.png-filter-sub)**
    ([int](#language.types.integer))



    A special PNG filter, used by the [imagepng()](#function.imagepng) function.





    **[PNG_FILTER_UP](#constant.png-filter-up)**
    ([int](#language.types.integer))



    A special PNG filter, used by the [imagepng()](#function.imagepng) function.





    **[PNG_FILTER_AVG](#constant.png-filter-avg)**
    ([int](#language.types.integer))



    A special PNG filter, used by the [imagepng()](#function.imagepng) function.





    **[PNG_FILTER_PAETH](#constant.png-filter-paeth)**
    ([int](#language.types.integer))



    A special PNG filter, used by the [imagepng()](#function.imagepng) function.





    **[PNG_ALL_FILTERS](#constant.png-all-filters)**
    ([int](#language.types.integer))



    A special PNG filter, used by the [imagepng()](#function.imagepng) function.






    **[IMG_FLIP_VERTICAL](#constant.img-flip-vertical)**
    ([int](#language.types.integer))



    Used together with [imageflip()](#function.imageflip), available as of PHP 5.5.0.






    **[IMG_FLIP_HORIZONTAL](#constant.img-flip-horizontal)**
    ([int](#language.types.integer))



    Used together with [imageflip()](#function.imageflip), available as of PHP 5.5.0.






    **[IMG_FLIP_BOTH](#constant.img-flip-both)**
    ([int](#language.types.integer))



    Used together with [imageflip()](#function.imageflip), available as of PHP 5.5.0.






    **[IMG_BELL](#constant.img-bell)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_BESSEL](#constant.img-bessel)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_BILINEAR_FIXED](#constant.img-bilinear-fixed)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_BICUBIC](#constant.img-bicubic)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_BICUBIC](#constant.img-bicubic)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_BLACKMAN](#constant.img-blackman)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_BOX](#constant.img-box)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_BSPLINE](#constant.img-bspline)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_CATMULLROM](#constant.img-catmullrom)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_GAUSSIAN](#constant.img-gaussian)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_GENERALIZED_CUBIC](#constant.img-generalized-cubic)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_HERMITE](#constant.img-hermite)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_HAMMING](#constant.img-hamming)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_HANNING](#constant.img-hanning)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_MITCHELL](#constant.img-mitchell)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_POWER](#constant.img-power)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_QUADRATIC](#constant.img-quadratic)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_SINC](#constant.img-sinc)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_NEAREST_NEIGHBOUR](#constant.img-nearest-neighbour)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_WEIGHTED4](#constant.img-weighted4)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.






    **[IMG_TRIANGLE](#constant.img-triangle)**
    ([int](#language.types.integer))



    Used together with [imagesetinterpolation()](#function.imagesetinterpolation), available as of PHP 5.5.0.





    **[IMG_CROP_BLACK](#constant.img-crop-black)**
    ([int](#language.types.integer))



     Recorta un fondo negro.





    **[IMG_CROP_DEFAULT](#constant.img-crop-default)**
    ([int](#language.types.integer))



     Idéntico a **[IMG_CROP_TRANSPARENT](#constant.img-crop-transparent)**.
     Antes de PHP 7.4.0, la libgd incluida volvía a **[IMG_CROP_SIDES](#constant.img-crop-sides)**
     si la imagen no tenía color transparente.





    **[IMG_CROP_SIDES](#constant.img-crop-sides)**
    ([int](#language.types.integer))



     Utiliza las 4 esquinas de la imagen para intentar detectar el fondo a recortar.





    **[IMG_CROP_THRESHOLD](#constant.img-crop-threshold)**
    ([int](#language.types.integer))



     Recorta una imagen utilizando el umbral
     y el color dados.





    **[IMG_CROP_TRANSPARENT](#constant.img-crop-transparent)**
    ([int](#language.types.integer))



     Recorta un fondo transparente.





    **[IMG_CROP_WHITE](#constant.img-crop-white)**
    ([int](#language.types.integer))



     Recorta un fondo blanco.

# Ejemplos

## Tabla de contenidos

- [Creación de una imagen PNG con PHP](#image.examples-png)
- [Añadir un sello digital a imágenes utilizando un canal Alpha](#image.examples-watermark)
- [Ejemplo con imagecopymerge para crear un
  sello digital translúcido](#image.examples.merged-watermark)

    ## Creación de una imagen PNG con PHP

    **Ejemplo #1 Creación de una imagen PNG con PHP**

&lt;?php

header("Content-type: image/png");
$string = $_GET['text'];
$im = imagecreatefrompng("images/button1.png");
$orange = imagecolorallocate($im, 220, 210, 60);
$px     = (imagesx($im) - 7.5 \* strlen($string)) / 2;
imagestring($im, 3, $px, 9, $string, $orange);
imagepng($im);

?&gt;

Este ejemplo debe ser llamado desde una página HTML con una etiqueta
de imagen como: &lt;img src="button.php?text"&gt;.
El script anterior, button.php, toma el string
"texto" y lo escribe
sobre el fondo de imagen llamado "images/button1.png",
luego lo muestra. Este es un método muy práctico para evitar redibujar
un nuevo botón cada vez que se cambia su texto. De esta manera, se generan
dinámicamente.

## Añadir un sello digital a imágenes utilizando un canal Alpha

    **Ejemplo #1 Añadir un sello digital a imágenes utilizando un canal Alpha**

&lt;?php
// Carga el sello y la foto para aplicar el sello digital
$stamp = imagecreatefrompng('stamp.png');
$im = imagecreatefromjpeg('photo.jpeg');

// Define los márgenes para el sello y obtiene la altura y anchura de este
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Copia el sello sobre la foto utilizando los márgenes y la anchura de la
// foto original para calcular la posición del sello
imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

// Mostrar
header('Content-type: image/png');
imagepng($im);
?&gt;

      ![Añadir un sello digital a la imagen utilizando un canal alpha](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-watermarks.png)


Este ejemplo muestra un método simple para aplicar un sello digital
y un sello a sus fotos e imágenes con licencia.
Observe la presencia de un canal Alpha en el sello así como texto
anti-aliaseado. Estos dos elementos serán preservados durante la copia.

## Ejemplo con [imagecopymerge()](#function.imagecopymerge) para crear un

sello digital translúcido

    **Ejemplo #1 Ejemplo con [imagecopymerge()](#function.imagecopymerge) para crear un
    sello digital translúcido**

&lt;?php
// Carga el sello y la foto para aplicar el sello digital
$im = imagecreatefromjpeg('photo.jpeg');

// Primero, creamos un sello manualmente usando GD
$stamp = imagecreatetruecolor(100, 70);
imagefilledrectangle($stamp, 0, 0, 99, 69, 0x0000FF);
imagefilledrectangle($stamp, 9, 9, 90, 60, 0xFFFFFF);
imagestring($stamp, 5, 20, 20, 'libGD', 0x0000FF);
imagestring($stamp, 3, 20, 40, '(c) 2007-9', 0x0000FF);

// Define los márgenes del sello y obtiene la anchura y altura del sello
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Fusiona el sello en nuestra foto con una opacidad del 50%
imagecopymerge($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 50);

// Guarda la imagen en un archivo
imagepng($im, 'photo_stamp.png');

?&gt;

      ![Uso de imagecopymerge() para crear un sello translúcido](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-watermark-merged.png)


Este ejemplo utiliza la función [imagecopymerge()](#function.imagecopymerge)
para fusionar el sello con nuestra imagen original. Usando esta
función, podemos definir la opacidad de nuestro sello - en nuestro
ejemplo, lo hemos establecido en 50%. En la práctica, es más conveniente
hacer nuestra protección semi-transparente, lo que la hace más difícil de
eliminar pero también permite a los visores de imágenes leerla sin problemas.

# Funciones de GD e Imágenes

# gd_info

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

gd_info — Devuelve información sobre la biblioteca GD instalada

### Descripción

**gd_info**(): [array](#language.types.array)

Devuelve información sobre la biblioteca GD instalada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array asociativo.

    <caption>**Elementos del array devueltos por gd_info()**</caption>



       Atributo
       Significado






       GD Version
       [string](#language.types.string) que describe la versión de
        libgd que está instalada.



       FreeType Support
       [bool](#language.types.boolean). **[true](#constant.true)**
        si el soporte FreeType está instalado.



       FreeType Linkage
       [string](#language.types.string) que describe la forma en la que
        FreeType ha sido vinculado. Los valores esperados son:
        'with freetype', 'with TTF library' y
        'with unknown library'. Este elemento solo estará
        definido si FreeType Support es evaluado
        **[true](#constant.true)**.



       GIF Read Support
       [bool](#language.types.boolean). **[true](#constant.true)**
        si el soporte para la *lectura* de imágenes
        GIF está incluido.



       GIF Create Support
       [bool](#language.types.boolean). **[true](#constant.true)**
        si el soporte para la *creación* de imágenes
        GIF está incluido.



       JPEG Support
       [bool](#language.types.boolean). **[true](#constant.true)**
        si el soporte de JPEG está incluido.



       PNG Support
       [bool](#language.types.boolean). **[true](#constant.true)**
        si el soporte de PNG está incluido.



       WBMP Support
       [bool](#language.types.boolean). **[true](#constant.true)**
        si el soporte de WBMP está incluido.



       XBM Support
       [bool](#language.types.boolean). **[true](#constant.true)**
        si el soporte de XBM está incluido.



       WebP Support
       Valor de tipo [bool](#language.types.boolean).  **[true](#constant.true)**
        si el soporte WebP está incluido.



       AVIF Support

        Valor de tipo [bool](#language.types.boolean). **[true](#constant.true)** si el soporte AVIF está incluido.
        Disponible a partir de PHP 8.1.0.





### Ejemplos

    **Ejemplo #1 Ejemplo con gd_info()**

&lt;?php
var_dump(gd_info());
?&gt;

    Resultado del ejemplo anterior es similar a:

array(9) {
["GD Version"]=&gt;
string(24) "bundled (2.1.0 compatible)"
["FreeType Support"]=&gt;
bool(false)
["GIF Read Support"]=&gt;
bool(true)
["GIF Create Support"]=&gt;
bool(false)
["JPEG Support"]=&gt;
bool(false)
["PNG Support"]=&gt;
bool(true)
["WBMP Support"]=&gt;
bool(true)
["XBM Support"]=&gt;
bool(false)
["WebP Support"]=&gt;
bool(false)
["AVIF Support"]=&gt;
bool(false)
}

### Ver también

- [imagepng()](#function.imagepng) - Envía una imagen PNG a un navegador o a un fichero

- [imagejpeg()](#function.imagejpeg) - Output image to browser or file

- [imagegif()](#function.imagegif) - Output image to browser or file

- [imagewbmp()](#function.imagewbmp) - Output image to browser or file

- [imagewebp()](#function.imagewebp) - Muestra una imagen WebP hacia un navegador o un fichero

- [imageavif()](#function.imageavif) - Output image to browser or file

- [imagetypes()](#function.imagetypes) - Devuelve los tipos de imágenes soportados por la versión actual de PHP

# getimagesize

(PHP 4, PHP 5, PHP 7, PHP 8)

getimagesize — Devuelve el tamaño de una imagen

### Descripción

**getimagesize**([string](#language.types.string) $filename, [array](#language.types.array) &amp;$image_info = **[null](#constant.null)**): [array](#language.types.array)|[false](#language.types.singleton)

**getimagesize()** determina el tamaño de cualquier imagen soportada
proporcionada y devuelve las dimensiones, el tipo de imagen y una cadena tipo
height/width para colocar en una etiqueta
HTML IMG normal
y el tipo de contenido HTTP correspondiente.

**getimagesize()** puede también devolver más información
en el argumento image_info.

**Precaución**

    Esta función espera que filename sea un
    fichero de imagen válido. Si se proporciona un fichero no imagen, puede ser
    detectado incorrectamente como imagen y la función devolverá con éxito, pero el array puede contener valores absurdos.




    No se debe utilizar **getimagesize()** para verificar que un
    fichero dado es una imagen válida. En su lugar, debe utilizarse una solución diseñada para ello como la extensión [FileInfo](#book.fileinfo).

**Nota**:

    Se debe tener en cuenta que JPC y JP2 pueden tener componentes con diferentes profundidades de bit. En este caso, el valor de "bits" es la mayor profundidad de bit encontrada. Asimismo, los ficheros JP2 disponen de soporte para multiple JPEG 2000 codestreams.
    En este caso, **getimagesize()** devuelve los valores
    para el primer codestream encontrado en la raíz del fichero.

**Nota**:

    La información sobre iconos se recupera desde el icono con mayor resolución.

**Nota**:

    Las imágenes GIF consistentes en uno o varios fotogramas, donde cada fotograma puede ocupar
    únicamente una parte de la imagen. El tamaño de la imagen que es reportado por
    **getimagesize()** es el tamaño global (leído desde el descriptor lógico de la pantalla).

### Parámetros

     filename


       Este argumento especifica el fichero del cual se desean obtener
       las informaciones. Puede ser un fichero local o (dependiendo
       de la configuración), un fichero remoto utilizando uno de los
       [flujos soportados](#wrappers).






     image_info


       Este argumento opcional permite extraer información adicional del fichero de imagen. Actualmente, esta opción
       devuelve diferentes marcadores JPG APP en un array asociativo. Algunos programas utilizan
       estos marcadores APP para especificar información en las etiquetas
       HTML. Un marcador común es el marcador APP13, descrito
       en [» IPTC](http://www.iptc.org/). Puede utilizarse
       la función [iptcparse()](#function.iptcparse) para analizar este marcador,
       y obtener información legible.



      **Nota**:



        image_info soporta únicamente
        los ficheros JFIF.






### Valores devueltos

Devuelve un array que contiene hasta 7 elementos. No todos los tipos
de imágenes incluyen los elementos channels y
bits.

El índice 0 contiene el ancho. El índice 1 contiene la altura.

**Nota**:

    Algunos formatos pueden no contener ninguna imagen, o bien varias.
    En estos casos, **getimagesize()** puede no ser capaz
    de determinar correctamente el tamaño de la imagen.
    **getimagesize()** devuelve entonces cero como tamaño de
    altura y ancho.

**Nota**:

    **getimagesize()** es independiente de las metadatos de la imagen.
    Por ejemplo, si la bandera Exif Orientation está definida en un valor que gira la imagen 90 o 270 grados, los índices 0 y 1 son intercambiados,
    es decir, contienen respectivamente la altura y el ancho.

El índice 2 es una constante entre **[IMAGETYPE\_\*](#constant.imagetype-gif)**,
indicando el tipo de la imagen.

El índice 3 contiene la cadena para colocar en las etiquetas
IMG: height="xxx" width="yyy".

mime corresponde al tipo MIME de una imagen.
Esta información puede ser utilizada para enviar el encabezado
HTTP Content-type correcto:

    **Ejemplo #1 getimagesize()** y tipos MIME

&lt;?php
$size = getimagesize($filename);
$fp = fopen($filename, "rb");
if ($size &amp;&amp; $fp) {
    header("Content-type: {$size['mime']}");
fpassthru($fp);
exit;
} else {
// error
}
?&gt;

channels será 3 para imágenes RGB y 4 para
imágenes CMYK.

bits es el número de bytes para cada color.

Sin embargo, la presencia de los valores de channels y
de bits puede llevar a la confusión. Por
ejemplo, una imagen GIF utiliza siempre tres canales por
píxel, pero el número de bits por píxel no puede ser calculado en el caso
de una imagen animada GIF con una tabla de colores global.

Si ocurre un error, **[false](#constant.false)** es devuelto.

### Errores/Excepciones

Si el acceso a filename es imposible,
**getimagesize()** generará un error de nivel
**[E_WARNING](#constant.e-warning)**. Si ocurre un error durante la lectura,
**getimagesize()** generará un error de nivel
**[E_NOTICE](#constant.e-notice)**.

### Historial de cambios

       Versión
       Descripción






       8.2.0

        Devuelve las dimensiones actuales de la imagen, bits y strings de imágenes AVIF;
        previamente, las dimensiones eran reportadas como 0x0,
        y bits y strings no eran reportados en absoluto.




       7.1.0

        Añadido el soporte para WebP.





### Ejemplos

    **Ejemplo #2 Ejemplo con getimagesize()**

&lt;?php
list($width, $height, $type, $attr) = getimagesize("img/flag.jpg");
echo "&lt;img src=\"img/flag.jpg\" $attr alt=\"Ejemplo con getimagesize()\" /&gt;";
?&gt;

    **Ejemplo #3 getimagesize()** con una URL

&lt;?php
$size = getimagesize("http://www.example.com/gifs/logo.gif");

// Si el nombre del fichero contiene espacios, codifíquelo!
$size = getimagesize("http://www.example.com/gifs/lo%20go.gif");

?&gt;

    **Ejemplo #4 getimagesize()** que devuelve IPTC

&lt;?php
$size = getimagesize("testimg.jpg", $info);
if (isset($info["APP13"])) {
$iptc = iptcparse($info["APP13"]);
var_dump($iptc);
}
?&gt;

### Notas

**Nota**:

Esta función no requiere la biblioteca GD.

### Ver también

- [image_type_to_mime_type()](#function.image-type-to-mime-type) - Lee el Mime-Type de un tipo de imagen

- [exif_imagetype()](#function.exif-imagetype) - Determina el tipo de una imagen

- [exif_read_data()](#function.exif-read-data) - Lee los encabezados EXIF en las imágenes

- [exif_thumbnail()](#function.exif-thumbnail) - Recupera la miniatura de una imagen

- [imagesx()](#function.imagesx) - Devuelve el ancho de una imagen

- [imagesy()](#function.imagesy) - Devuelve la altura de la imagen

# getimagesizefromstring

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

getimagesizefromstring — Obtiene el tamaño de una imagen desde una cadena

### Descripción

**getimagesizefromstring**([string](#language.types.string) $string, [array](#language.types.array) &amp;$image_info = **[null](#constant.null)**): [array](#language.types.array)|[false](#language.types.singleton)

Idéntico a la función [getimagesize()](#function.getimagesize)
excepto que la función **getimagesizefromstring()**
acepta una cadena en lugar de un nombre de fichero como primer argumento.

Consulte la documentación de la función [getimagesize()](#function.getimagesize)
para obtener más detalles sobre cómo funciona esta función.

### Parámetros

    string


      Los datos de la imagen, en forma de cadena.






    image_info


      Consulte la función [getimagesize()](#function.getimagesize).


### Valores devueltos

Consulte la función [getimagesize()](#function.getimagesize).

### Ejemplos

    **Ejemplo #1 Ejemplo con getimagesizefromstring()**

&lt;?php
$img = '/path/to/test.png';

// Apertura mediante un fichero
$size_info1 = getimagesize($img);

// Apertura mediante una cadena
$data       = file_get_contents($img);
$size_info2 = getimagesizefromstring($data);
?&gt;

### Ver también

- [getimagesize()](#function.getimagesize) - Devuelve el tamaño de una imagen

# image_type_to_extension

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

image_type_to_extension — Devuelve la extensión del fichero para el tipo de imagen

### Descripción

**image_type_to_extension**([int](#language.types.integer) $image_type, [bool](#language.types.boolean) $include_dot = **[true](#constant.true)**): [string](#language.types.string)|[false](#language.types.singleton)

**image_type_to_extension()** devuelve la extensión
para la constante **[IMAGETYPE\_\*](#constant.imagetype-gif)** proporcionada.

### Parámetros

     image_type


       Una de las constantes **[IMAGETYPE_*](#constant.imagetype-gif)**.






     include_dot


       Si se debe añadir un punto a la extensión o no.
       Por omisión, vale **[true](#constant.true)**.





### Valores devueltos

Un [string](#language.types.string) con la extensión, correspondiente al tipo de
la imagen proporcionada, o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con image_type_to_extension()**

&lt;?php
// Creación de una instancia de imagen
$im = imagecreatetruecolor(100, 100);

// Guardado de la imagen
imagepng($im, './test' . image_type_to_extension(IMAGETYPE_PNG));
?&gt;

### Notas

**Nota**:

Esta función no requiere la biblioteca GD.

# image_type_to_mime_type

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

image_type_to_mime_type — Lee el Mime-Type de un tipo de imagen

### Descripción

**image_type_to_mime_type**([int](#language.types.integer) $image_type): [string](#language.types.string)

Determina el tipo MIME (Mime-Type) a utilizar
en el encabezado HTTP Content-type.

### Parámetros

     image_type


       Una de las constantes **[IMAGETYPE_*](#constant.imagetype-gif)**.





### Valores devueltos

Los valores devueltos son los siguientes

   <caption>**Valores de las constantes devueltas**</caption>
    
     
      
       image_type
       Valor devuelto


       **[IMAGETYPE_GIF](#constant.imagetype-gif)**
       image/gif



       **[IMAGETYPE_JPEG](#constant.imagetype-jpeg)**
       image/jpeg



       **[IMAGETYPE_PNG](#constant.imagetype-png)**
       image/png



       **[IMAGETYPE_SWF](#constant.imagetype-swf)**
       application/x-shockwave-flash



       **[IMAGETYPE_PSD](#constant.imagetype-psd)**
       image/psd



       **[IMAGETYPE_BMP](#constant.imagetype-bmp)**
       image/bmp



       **[IMAGETYPE_TIFF_II](#constant.imagetype-tiff-ii)** (orden intel)
       image/tiff




        **[IMAGETYPE_TIFF_MM](#constant.imagetype-tiff-mm)** (orden motorola)

       image/tiff



       **[IMAGETYPE_JPC](#constant.imagetype-jpc)**
       application/octet-stream



       **[IMAGETYPE_JP2](#constant.imagetype-jp2)**
       image/jp2



       **[IMAGETYPE_JPX](#constant.imagetype-jpx)**
       application/octet-stream



       **[IMAGETYPE_JB2](#constant.imagetype-jb2)**
       application/octet-stream



       **[IMAGETYPE_SWC](#constant.imagetype-swc)**
       application/x-shockwave-flash



       **[IMAGETYPE_IFF](#constant.imagetype-iff)**
       image/iff



       **[IMAGETYPE_WBMP](#constant.imagetype-wbmp)**
       image/vnd.wap.wbmp



       **[IMAGETYPE_XBM](#constant.imagetype-xbm)**
       image/xbm



       **[IMAGETYPE_ICO](#constant.imagetype-ico)**
       image/vnd.microsoft.icon



       **[IMAGETYPE_WEBP](#constant.imagetype-webp)**
       image/webp



       **[IMAGETYPE_AVIF](#constant.imagetype-avif)**
       image/avif




### Ejemplos

    **Ejemplo #1 Ejemplo con image_type_to_mime_type()**

&lt;?php
header("Content-type: " . image_type_to_mime_type(IMAGETYPE_PNG));
?&gt;

### Notas

**Nota**:

Esta función no requiere la biblioteca GD.

### Ver también

- [getimagesize()](#function.getimagesize) - Devuelve el tamaño de una imagen

- [exif_imagetype()](#function.exif-imagetype) - Determina el tipo de una imagen

- [exif_read_data()](#function.exif-read-data) - Lee los encabezados EXIF en las imágenes

- [exif_thumbnail()](#function.exif-thumbnail) - Recupera la miniatura de una imagen

# image2wbmp

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7)

image2wbmp — Output image to browser or file

**Advertencia**
Esta función está _OBSOLETA_ a partir de PHP 7.3.0,
y ha sido _ELIMINADA_ a partir de PHP 8.0.0.
Depender de esta función está altamente desaconsejado.

### Descripción

**image2wbmp**([resource](#language.types.resource) $image, [string](#language.types.string) $filename = ?, [int](#language.types.integer) $foreground = ?): [bool](#language.types.boolean)

**image2wbmp()** muestra o guarda una versión WBMP
de la imagen image proporcionada.

### Parámetros

     image


       Un recurso de imagen, devuelto por una de las funciones de creación
       de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).






     filename


       Ruta del fichero de guardado. Si no se proporciona, el flujo
       de la imagen se mostrará directamente.






     foreground


       El color del primer plano puede ser definido con este argumento
       proporcionando un identificador obtenido con [imagecolorallocate()](#function.imagecolorallocate).
       El color del primer plano por omisión es negro.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Precaución**However, if libgd fails to output the image, this function returns **[true](#constant.true)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con image2wbmp()**

&lt;?php

$file = 'php.png';
$image = imagecreatefrompng($file);

header('Content-Type: ' . image_type_to_mime_type(IMAGETYPE_WBMP));
image2wbmp($image); // Mostrar directamente

?&gt;

### Ver también

- [imagewbmp()](#function.imagewbmp) - Output image to browser or file

# imageaffine

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

imageaffine — Devuelve una imagen que contiene la imagen fuente transformada, utilizando opcionalmente una zona de recorte

### Descripción

**imageaffine**([GdImage](#class.gdimage) $image, [array](#language.types.array) $affine, [?](#language.types.null)[array](#language.types.array) $clip = **[null](#constant.null)**): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

    affine


      Un array con las claves de 0 a 5.






    clip


      Un array con las claves "x", "y", "width" y "height"; o **[null](#constant.null)**.


### Valores devueltos

Devuelve el objeto de imagen vinculado en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       clip ahora es nullable.




      8.0.0

       En caso de éxito, esta función ahora devuelve una instancia de
       [GDImage](#class.gdimage);
       anteriormente se devolvía un [resource](#language.types.resource).



# imageaffinematrixconcat

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

imageaffinematrixconcat — Concatena dos matrices de transformación afín

### Descripción

**imageaffinematrixconcat**([array](#language.types.array) $matrix1, [array](#language.types.array) $matrix2): [array](#language.types.array)|[false](#language.types.singleton)

    Devuelve la concatenación de dos matrices de transformación afín, lo cual

es útil si varias transformaciones deben aplicarse a la misma
imagen en una sola vez.

### Parámetros

    matrix1


      Una matriz de transformación afín (un array con claves de 0 a 5 y números decimales como valores).






    matrix2


      Una matriz de transformación afín (un array con claves de 0 a 5 y números decimales como valores).


### Valores devueltos

Una matriz de transformación afín (un array con claves de 0 a 5 y números decimales como valores).
o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo para imageaffinematrixconcat()**

&lt;?php
$m1 = imageaffinematrixget(IMG_AFFINE_TRANSLATE, array('x' =&gt; 2, 'y' =&gt; 3));
$m2 = imageaffinematrixget(IMG_AFFINE_SCALE, array('x' =&gt; 4, 'y' =&gt; 5));
$matrix = imageaffinematrixconcat($m1, $m2);
print_r($matrix);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; 4
[1] =&gt; 0
[2] =&gt; 0
[3] =&gt; 5
[4] =&gt; 8
[5] =&gt; 15
)

### Ver también

- [imageaffine()](#function.imageaffine) - Devuelve una imagen que contiene la imagen fuente transformada, utilizando opcionalmente una zona de recorte

- [imageaffinematrixget()](#function.imageaffinematrixget) - Obtener una matriz de transformación afín

# imageaffinematrixget

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

imageaffinematrixget — Obtener una matriz de transformación afín

### Descripción

**imageaffinematrixget**([int](#language.types.integer) $type, [array](#language.types.array)|[float](#language.types.float) $options): [array](#language.types.array)|[false](#language.types.singleton)

    Devuelve una matriz de transformación afín.

### Parámetros

    type


      Una constante entre **[IMG_AFFINE_*](#constant.img-affine-translate)**.






    options


      Si type es **[IMG_AFFINE_TRANSLATE](#constant.img-affine-translate)**
      o **[IMG_AFFINE_SCALE](#constant.img-affine-scale)**,
      options debe ser un [array](#language.types.array) con
      las claves x
      y y, ambas con valores [float](#language.types.float).




      Si type es **[IMG_AFFINE_ROTATE](#constant.img-affine-rotate)**,
      **[IMG_AFFINE_SHEAR_HORIZONTAL](#constant.img-affine-shear-horizontal)** o
      **[IMG_AFFINE_SHEAR_VERTICAL](#constant.img-affine-shear-vertical)**,
      options debe ser un valor [float](#language.types.float)
      que especifique el ángulo.


### Valores devueltos

Una matriz de transformación afín (un array con claves de 0 a 5 y números decimales como valores).
o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo para imageaffinematrixget()**

&lt;?php
$matrix = imageaffinematrixget(IMG_AFFINE_TRANSLATE, array('x' =&gt; 2, 'y' =&gt; 3));
print_r($matrix);
?&gt;

    El ejemplo anterior mostrará:

Array
(
[0] =&gt; 1
[1] =&gt; 0
[2] =&gt; 0
[3] =&gt; 1
[4] =&gt; 2
[5] =&gt; 3
)

### Ver también

- [imageaffine()](#function.imageaffine) - Devuelve una imagen que contiene la imagen fuente transformada, utilizando opcionalmente una zona de recorte

- [imageaffinematrixconcat()](#function.imageaffinematrixconcat) - Concatena dos matrices de transformación afín

# imagealphablending

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

imagealphablending — Modifica el modo de mezcla de una imagen

### Descripción

**imagealphablending**([GdImage](#class.gdimage) $image, [bool](#language.types.boolean) $enable): [bool](#language.types.boolean)

**imagealphablending()** proporciona dos modos de dibujo
para imágenes en colores verdaderos (truecolors). En modo "mezcla", el canal
alpha de cada color es proporcionado a cada función de dibujo, de modo que
[imagesetpixel()](#function.imagesetpixel) pueda determinar su transparencia. GD mezcla
entonces automáticamente el color en ese punto y almacena el resultado en
la imagen. El píxel resultante es entonces opaco. En modo no mezclante, el
color es copiado literalmente con sus informaciones de canal alpha,
y reemplaza el píxel de destino. La mezcla no está disponible
con imágenes de paleta.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     enable


       Si se debe activar el modo de mezcla o no.
       En imágenes de colores verdaderos, el valor por omisión
       es **[true](#constant.true)**, de lo contrario, el valor por omisión es **[false](#constant.false)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

**Ejemplo #1 Ejemplo con imagealphablending()**

&lt;?php
// Creación de una imagen
$im = imagecreatetruecolor(100, 100);

// Define el alphablending a on
imagealphablending($im, true);

// Dibuja un rectángulo
imagefilledrectangle($im, 30, 30, 70, 70, imagecolorallocate($im, 255, 0, 0));

// Mostrar
header('Content-Type: image/png');

imagepng($im);
?&gt;

# imageantialias

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

imageantialias — Activar o desactivar las funciones de antialias

### Descripción

**imageantialias**([GdImage](#class.gdimage) $image, [bool](#language.types.boolean) $enable): [bool](#language.types.boolean)

Activa los métodos de dibujo rápido antialias para líneas y polígonos.
Los componentes alpha no son soportados. Funciona utilizando una operación
directa de mezcla, únicamente con imágenes truecolor.

El grosor y los estilos no son soportados.

El uso de primitivas antialias con fondos transparentes puede
llevar a resultados inesperados. El método de mezcla utiliza
el color de fondo como cualquier otra color. La falta de soporte
del componente alpha impide el uso de antialias basado en alpha.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     enable


       Si se debe activar el antialias o no.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

      7.2.0

       **imageantialias()** ahora está generalmente
       disponible. Anteriormente, solo estaba disponible si PHP fue
       compilado con la versión agrupada de la biblioteca GD.



### Ejemplos

    **Ejemplo #1 Comparación de 2 líneas, una con antialias y otra sin**

&lt;?php
// Define una imagen antialias y una normal
$aa = imagecreatetruecolor(400, 100);
$normal = imagecreatetruecolor(200, 100);

// Activa el antialiasing para una imagen
imageantialias($aa, true);

// Asigna los colores
$red = imagecolorallocate($normal, 255, 0, 0);
$red_aa = imagecolorallocate($aa, 255, 0, 0);

// Dibuja 2 líneas, una con antialiasing
imageline($normal, 0, 0, 200, 100, $red);
imageline($aa, 0, 0, 200, 100, $red_aa);

// Fusiona las 2 imágenes, lado a lado para la visualización
// (AA: izquierda, Normal: derecha)
imagecopymerge($aa, $normal, 200, 0, 0, 0, 200, 100, 100);

// Muestra la imagen
header('Content-type: image/png');

imagepng($aa);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: Comparación de 2 líneas, una con antialias](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imageantialias.png)


### Ver también

- [imagecreatetruecolor()](#function.imagecreatetruecolor) - Crea una nueva imagen en colores verdaderos

# imagearc

(PHP 4, PHP 5, PHP 7, PHP 8)

imagearc — Dibuja una elipse parcial

### Descripción

**imagearc**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $center_x,
    [int](#language.types.integer) $center_y,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $start_angle,
    [int](#language.types.integer) $end_angle,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

**imagearc()** dibuja una elipse parcial, centrada en las
coordenadas proporcionadas.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     center_x


       X: coordenada del centro.






     center_y


       Y: coordenada del centro.






     width


       El ancho de la elipse.






     height


       La altura de la elipse.






     start_angle


       El ángulo de inicio de la elipse, en grados.






     end_angle


       El ángulo de fin de la elipse, en grados.
       0° corresponde a la posición "tres horas" y la elipse es
       dibujada en el sentido de las agujas de un reloj.






     color


       A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Dibujar un círculo con imagearc()**

&lt;?php

// Creación de una imagen 200\*200
$img = imagecreatetruecolor(200, 200);

// Asignación de colores
$white = imagecolorallocate($img, 255, 255, 255);
$red   = imagecolorallocate($img, 255, 0, 0);
$green = imagecolorallocate($img, 0, 255, 0);
$blue  = imagecolorallocate($img, 0, 0, 255);

// Dibujar la cabeza
imagearc($img, 100, 100, 200, 200,  0, 360, $white);
// La boca
imagearc($img, 100, 100, 150, 150, 25, 155, $red);
// Los ojos izquierdo y derecho
imagearc($img, 60, 75, 50, 50, 0, 360, $green);
imagearc($img, 140, 75, 50, 50, 0, 360, $blue);

// Mostrar en el navegador
header("Content-type: image/png");
imagepng($img);

?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: Dibujar un círculo con imagearc()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagearc.png)


### Ver también

- [imagefilledarc()](#function.imagefilledarc) - Dibuja un arco parcial y lo rellena

- [imageellipse()](#function.imageellipse) - Dibuja una elipse

- [imagefilledellipse()](#function.imagefilledellipse) - Dibuja una elipse llena

# imageavif

(PHP 8 &gt;= 8.1.0)

imageavif — Output image to browser or file

### Descripción

**imageavif**(
    [GdImage](#class.gdimage) $image,
    [resource](#language.types.resource)|[string](#language.types.string)|[null](#language.types.null) $file = **[null](#constant.null)**,
    [int](#language.types.integer) $quality = -1,
    [int](#language.types.integer) $speed = -1
): [bool](#language.types.boolean)

Muestra o guarda una imagen en formato AVIF utilizando
la image proporcionada.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     file


       The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or **[null](#constant.null)**, the raw image stream will be output directly.






     quality


       quality es un argumento opcional cuyo rango varía de 0
       (peor calidad, archivo más pequeño) a 100 (mejor calidad, archivo más grande).
       Si se pasa -1 como argumento, se utilizará el valor por
       omisión 52.






     speed


       speed es un argumento opcional cuyo rango varía de 0
       (codificación lenta, archivo más pequeño) a 10 (codificación rápida, archivo más grande).
       Si se pasa -1 como argumento, se utilizará el valor por
       omisión 6.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Precaución**However, if libgd fails to output the image, this function returns **[true](#constant.true)**.

### Errores/Excepciones

Genera una [ValueError](#class.valueerror) si quality
o speed no es válido.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Genera ahora una [ValueError](#class.valueerror) si quality
       o speed no es válido.



### Ver también

- [imagepng()](#function.imagepng) - Envía una imagen PNG a un navegador o a un fichero

- [imagewbmp()](#function.imagewbmp) - Output image to browser or file

- [imagejpeg()](#function.imagejpeg) - Output image to browser or file

- [imagetypes()](#function.imagetypes) - Devuelve los tipos de imágenes soportados por la versión actual de PHP

# imagebmp

(PHP 7 &gt;= 7.2.0, PHP 8)

imagebmp — Muestra o guarda una imagen BMP en el navegador o en un fichero

### Descripción

**imagebmp**([GdImage](#class.gdimage) $image, [resource](#language.types.resource)|[string](#language.types.string)|[null](#language.types.null) $file = **[null](#constant.null)**, [bool](#language.types.boolean) $compressed = **[true](#constant.true)**): [bool](#language.types.boolean)

Muestra o guarda una versión BMP de la image proporcionada.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     file

      The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or **[null](#constant.null)**, the raw image stream will be output directly.


      **Nota**:



        **[null](#constant.null)** no es válido si el argumento compressed no se utiliza.







     compressed


       Si el BMP debe ser comprimido con run-length encoding (RLE), o no.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Precaución**However, if libgd fails to output the image, this function returns **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

      8.0.0

       El tipo de compressed es ahora [bool](#language.types.boolean);
       anteriormente era [int](#language.types.integer).



### Ejemplos

    **Ejemplo #1 Guardar un fichero BMP**

&lt;?php
// Crear una imagen en blanco y añadir texto
$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);

imagestring($im, 1, 5, 5, 'BMP con PHP', $text_color);

// Guardar la imagen
imagebmp($im, 'php.bmp');
?&gt;

# imagechar

(PHP 4, PHP 5, PHP 7, PHP 8)

imagechar — Dibuja un carácter horizontalmente

### Descripción

**imagechar**(
    [GdImage](#class.gdimage) $image,
    [GdFont](#class.gdfont)|[int](#language.types.integer) $font,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [string](#language.types.string) $char,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

**imagechar()** dibuja el primer carácter de la cadena
char en la imagen image con la esquina
superior izquierda situada en la posición x,y
(la esquina superior izquierda es el origen (0,0)) con el color
color.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

font
Puede ser 1, 2, 3, 4, 5 para las fuentes internas de codificación Latin2
(donde los números más grandes corresponden a fuentes anchas) o una instancia
de [GdFont](#class.gdfont) retornado por [imageloadfont()](#function.imageloadfont).

     x


       X: coordenada de inicio.






     y


       Y: coordenada de inicio.






     char


       El carácter a dibujar.






     color


       A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro font ahora acepta una instancia de [GdFont](#class.gdfont)
y un [int](#language.types.integer); anteriormente solo un [int](#language.types.integer) era aceptado.

8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagechar()**

&lt;?php

$im = imagecreate(100, 100);

$string = 'PHP';

$bg = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);

// muestra un "P" negro en la esquina superior izquierda
imagechar($im, 1, 0, 0, $string, $black);

header('Content-type: image/png');
imagepng($im);

?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagechar()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagechar.png)


### Ver también

- [imagecharup()](#function.imagecharup) - Dibuja un carácter verticalmente

- [imageloadfont()](#function.imageloadfont) - Carga una nueva fuente

# imagecharup

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecharup — Dibuja un carácter verticalmente

### Descripción

**imagecharup**(
    [GdImage](#class.gdimage) $image,
    [GdFont](#class.gdfont)|[int](#language.types.integer) $font,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [string](#language.types.string) $char,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

Dibuja el primer carácter de la cadena char
verticalmente en la imagen image proporcionada.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

font
Puede ser 1, 2, 3, 4, 5 para las fuentes internas de codificación Latin2
(donde los números más grandes corresponden a fuentes anchas) o una instancia
de [GdFont](#class.gdfont) retornado por [imageloadfont()](#function.imageloadfont).

     x


       X: coordenada de inicio.






     y


       Y: coordenada de inicio.






     char


       El carácter a dibujar.






     color


       A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro font ahora acepta una instancia de [GdFont](#class.gdfont)
y un [int](#language.types.integer); anteriormente solo un [int](#language.types.integer) era aceptado.

8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagecharup()**

&lt;?php

$im = imagecreate(100, 100);

$string = 'Notez que la première lettre est un N';

$bg = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);

// Muestra una "Z" negra sobre un fondo blanco
imagecharup($im, 3, 10, 10, $string, $black);

header('Content-type: image/png');
imagepng($im);

?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagecharup()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagecharup.png)


### Ver también

- [imagechar()](#function.imagechar) - Dibuja un carácter horizontalmente

- [imageloadfont()](#function.imageloadfont) - Carga una nueva fuente

# imagecolorallocate

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecolorallocate — Asigna una coloración para una imagen

### Descripción

**imagecolorallocate**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $red,
    [int](#language.types.integer) $green,
    [int](#language.types.integer) $blue
): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve un identificador de color, representando la coloración compuesta con
los colores RGB.

**imagecolorallocate()** debe ser invocada para
crear cada color que será representado por image.

**Nota**:

    La primera llamada a **imagecolorallocate()**
    llena la coloración de fondo con la paleta de las imágenes - imágenes creadas
    utilizando [imagecreate()](#function.imagecreate).

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     red

      Value of red component.





     green

      Value of green component.





     blue

      Value of blue component.




Estos argumentos son enteros comprendidos entre 0 y 255 o hexadecimales
comprendidos entre 0x00 y 0xFF.

### Valores devueltos

Un identificador de color o **[false](#constant.false)** si la asignación falla.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagecolorallocate()**

&lt;?php

$im = imagecreate(100, 100);

// El fondo de la imagen es rojo
$background = imagecolorallocate($im, 255, 0, 0);

// Se definen colores con enteros ..
$white = imagecolorallocate($im, 255, 255, 255);
$black = imagecolorallocate($im, 0, 0, 0);

// .. o hexadecimales
$white = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
$black = imagecolorallocate($im, 0x00, 0x00, 0x00);

?&gt;

### Ver también

- [imagecolorallocatealpha()](#function.imagecolorallocatealpha) - Asigna un color a una imagen

- [imagecolordeallocate()](#function.imagecolordeallocate) - Elimina un color de una imagen

# imagecolorallocatealpha

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

imagecolorallocatealpha — Asigna un color a una imagen

### Descripción

**imagecolorallocatealpha**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $red,
    [int](#language.types.integer) $green,
    [int](#language.types.integer) $blue,
    [int](#language.types.integer) $alpha
): [int](#language.types.integer)|[false](#language.types.singleton)

**imagecolorallocatealpha()** se comporta como
[imagecolorallocate()](#function.imagecolorallocate) con el parámetro adicional de
transparencia alpha.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     red

      Value of red component.





     green

      Value of green component.





     blue

      Value of blue component.





     alpha


       Un valor entre 0 y 127.
       0 indica opacidad completa mientras que
       127 indica transparencia completa.





Los parámetros red, green
y blue son enteros comprendidos entre 0 y 255, o
hexadecimales comprendidos entre 0x00 y 0xFF.

### Valores devueltos

Un identificador de color o **[false](#constant.false)** si la asignación falla.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

**Ejemplo #1 Ejemplo de uso de imagecolorallocatealpha()**

&lt;?php
$size = 300;
$image=imagecreatetruecolor($size, $size);

// algo para obtener un fondo blanco con un borde negro
$back = imagecolorallocate($image, 255, 255, 255);
$border = imagecolorallocate($image, 0, 0, 0);
imagefilledrectangle($image, 0, 0, $size - 1, $size - 1, $back);
imagerectangle($image, 0, 0, $size - 1, $size - 1, $border);

$yellow_x = 100;
$yellow_y = 75;
$red_x    = 120;
$red_y = 165;
$blue_x   = 187;
$blue_y = 125;
$radius = 150;

// asigna colores con valores alpha
$yellow = imagecolorallocatealpha($image, 255, 255, 0, 75);
$red    = imagecolorallocatealpha($image, 255, 0, 0, 75);
$blue   = imagecolorallocatealpha($image, 0, 0, 255, 75);

// Dibuja 3 elipses
imagefilledellipse($image, $yellow_x, $yellow_y, $radius, $radius, $yellow);
imagefilledellipse($image, $red_x, $red_y, $radius, $radius, $red);
imagefilledellipse($image, $blue_x, $blue_y, $radius, $radius, $blue);

// No olvidar enviar un header correcto
header('Content-Type: image/png');

// y finalmente, mostrar el resultado
imagepng($image);
?&gt;

Resultado del ejemplo anterior es similar a:

     ![Salida del ejemplo: imagecolorallocatealpha()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagecolorallocatealpha.png)

**Ejemplo #2
Conversión de valor alpha típico para usarlo con
imagecolorallocatealpha()**

    Generalmente los valores alpha 0 designan los píxeles
    completamente transparentes, y el canal alpha tiene 8 bits. Para convertir
    tales valores alpha para ser compatibles con
    **imagecolorallocatealpha()**, un poco de aritmética simple
    es suficiente:

&lt;?php
$alpha8 = 0; // completamente transparente
var_dump(127 - ($alpha8 &gt;&gt; 1));
$alpha8 = 255; // completamente opaco
var_dump(127 - ($alpha8 &gt;&gt; 1));
?&gt;

El ejemplo anterior mostrará:

int(127)
int(0)

### Ver también

- [imagecolorallocate()](#function.imagecolorallocate) - Asigna una coloración para una imagen

- [imagecolordeallocate()](#function.imagecolordeallocate) - Elimina un color de una imagen

# imagecolorat

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecolorat — Devuelve el índice del color de un píxel dado

### Descripción

**imagecolorat**([GdImage](#class.gdimage) $image, [int](#language.types.integer) $x, [int](#language.types.integer) $y): [int](#language.types.integer)|[false](#language.types.singleton)

Devuelve el índice del color del píxel situado en las coordenadas especificadas,
en la imagen image.

Si la imagen
es una imagen en TrueColor, esta función devuelve el valor RGB
del píxel, en forma de un entero. Utilizar los operadores a nivel de bits y los
máscaras para distinguir el rojo, del verde y del azul :

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     x


       X : coordenada del punto.






     y


       Y : coordenada del punto.





### Valores devueltos

Devuelve el índice del color o **[false](#constant.false)** si ocurre un error.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Acceso a los valores RGB**

&lt;?php
$im = imagecreatefrompng("php.png");
$rgb = imagecolorat($im, 10, 15);
$r = ($rgb &gt;&gt; 16) &amp; 0xFF;
$g = ($rgb &gt;&gt; 8) &amp; 0xFF;
$b = $rgb &amp; 0xFF;
var_dump($r, $g, $b);
?&gt;

    Resultado del ejemplo anterior es similar a:

int(119)
int(123)
int(180)

    **Ejemplo #2 Valores RVB legibles utilizando la función
     [imagecolorsforindex()](#function.imagecolorsforindex)**

&lt;?php
$im = imagecreatefrompng("php.png");
$rgb = imagecolorat($im, 10, 15);

$colors = imagecolorsforindex($im, $rgb);

var_dump($colors);
?&gt;

    Resultado del ejemplo anterior es similar a:

array(4) {
["red"]=&gt;
int(119)
["green"]=&gt;
int(123)
["blue"]=&gt;
int(180)
["alpha"]=&gt;
int(127)
}

### Ver también

- [imagecolorset()](#function.imagecolorset) - Cambia el color en una paleta en el índice dado

- [imagecolorsforindex()](#function.imagecolorsforindex) - Retorna el color asociado a un índice

- [imagesetpixel()](#function.imagesetpixel) - Dibuja un píxel

# imagecolorclosest

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecolorclosest — Devuelve el índice de la color más cercana a una color dada

### Descripción

**imagecolorclosest**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $red,
    [int](#language.types.integer) $green,
    [int](#language.types.integer) $blue
): [int](#language.types.integer)

Devuelve el índice de la color de la paleta que es la más cercana al valor
RGB pasado.

La "distancia" entre la color deseada y las colores de
la paleta se calcula considerando el espacio RGB
como un espacio de 3 dimensiones.

If you created the image from a file, only colors used in the image are resolved. Colors present only in the palette are not resolved.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     red

      Value of red component.





     green

      Value of green component.





     blue

      Value of blue component.




Los argumentos sobre las colores son enteros comprendidos entre 0 y 255
o hexadecimales comprendidos entre 0x00 y 0xFF.

### Valores devueltos

Devuelve el índice de la color más cercana, en la paleta de la imagen,
a la dada.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Búsqueda de un juego de colores en una imagen**

&lt;?php
// Se comienza con una imagen y se convierte en una imagen de paleta
$im = imagecreatefrompng('figures/imagecolorclosest.png');
imagetruecolortopalette($im, false, 255);

// Colores buscados (RGB)
$colors = array(
array(254, 145, 154),
array(153, 145, 188),
array(153, 90, 145),
array(255, 137, 92)
);

// Se itera sobre cada búsqueda y se encuentra la color de la paleta más cercana.
// Devuelve el número de la búsqueda, el RGB buscado y la correspondencia en RGB
foreach($colors as $id =&gt; $rgb)
{
    $result = imagecolorclosest($im, $rgb[0], $rgb[1], $rgb[2]);
    $result = imagecolorsforindex($im, $result);
    $result = "({$result['red']}, {$result['green']}, {$result['blue']})";

    echo "#$id: Búsqueda ($rgb[0], $rgb[1], $rgb[2]); Correspondencia : $result.\n";

}

?&gt;

    Resultado del ejemplo anterior es similar a:

#0: Búsqueda (254, 145, 154); Correspondencia : (252, 150, 148).
#1: Búsqueda (153, 145, 188); Correspondencia : (148, 150, 196).
#2: Búsqueda (153, 90, 145); Correspondencia : (148, 90, 156).
#3: Búsqueda (255, 137, 92); Correspondencia : (252, 150, 92).

### Ver también

- [imagecolorexact()](#function.imagecolorexact) - Devuelve el índice del color especificado

- [imagecolorclosestalpha()](#function.imagecolorclosestalpha) - Devuelve el color más cercano, teniendo en cuenta el canal alpha

- [imagecolorclosesthwb()](#function.imagecolorclosesthwb) - Obtiene el índice de la color especificada con su tono, blanco y negro

# imagecolorclosestalpha

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

imagecolorclosestalpha — Devuelve el color más cercano, teniendo en cuenta el canal alpha

### Descripción

**imagecolorclosestalpha**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $red,
    [int](#language.types.integer) $green,
    [int](#language.types.integer) $blue,
    [int](#language.types.integer) $alpha
): [int](#language.types.integer)

Devuelve el índice del color, en la paleta de la imagen image,
más cercano al color especificado por los demás parámetros,
en formato RGB y con canal alpha
alpha.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     red

      Value of red component.





     green

      Value of green component.





     blue

      Value of blue component.





     alpha


       Un valor comprendido entre 0 y 127.
       0 indica una opacidad completa mientras que
       127 indica una transparencia completa.





Los parámetros sobre los colores son enteros comprendidos entre 0 y 255 o
hexadecimales comprendidos entre 0x00 y 0xFF.

### Valores devueltos

Devuelve el índice del color más cercano en la paleta.

### Ejemplos

    **Ejemplo #1 Busca un juego de colores en una imagen**

&lt;?php
// Se comienza con una imagen y se la convierte en paleta
$im = imagecreatefrompng('figures/imagecolorclosest.png');
imagetruecolortopalette($im, false, 255);

// Búsqueda de colores (RGB)
$colors = array(
array(254, 145, 154, 50),
array(153, 145, 188, 127),
array(153, 90, 145, 0),
array(255, 137, 92, 84)
);

// Se itera sobre cada búsqueda y se encuentra el color más cercano de la paleta.
// Devuelve el número de la búsqueda, la búsqueda RGB y el resultado convertido en RGB
foreach($colors as $id =&gt; $rgb)
{
    $result = imagecolorclosestalpha($im, $rgb[0], $rgb[1], $rgb[2], $rgb[3]);
    $result = imagecolorsforindex($im, $result);
    $result = "({$result['red']}, {$result['green']}, {$result['blue']}, {$result['alpha']})";

    echo "#$id: Búsqueda ($rgb[0], $rgb[1], $rgb[2], $rgb[3]); Resultado más cercano: $result.\n";

}

?&gt;

    Resultado del ejemplo anterior es similar a:

#0: Búsqueda (254, 145, 154, 50); Resultado más cercano : (252, 150, 148, 0).
#1: Búsqueda (153, 145, 188, 127); Resultado más cercano : (148, 150, 196, 0).
#2: Búsqueda (153, 90, 145, 0); Resultado más cercano : (148, 90, 156, 0).
#3: Búsqueda (255, 137, 92, 84); Resultado más cercano : (252, 150, 92, 0).

### Ver también

- [imagecolorexactalpha()](#function.imagecolorexactalpha) - Devuelve el índice de un color con su canal alfa

- [imagecolorclosest()](#function.imagecolorclosest) - Devuelve el índice de la color más cercana a una color dada

- [imagecolorclosesthwb()](#function.imagecolorclosesthwb) - Obtiene el índice de la color especificada con su tono, blanco y negro

# imagecolorclosesthwb

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

imagecolorclosesthwb — Obtiene el índice de la color especificada con su tono, blanco y negro

### Descripción

**imagecolorclosesthwb**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $red,
    [int](#language.types.integer) $green,
    [int](#language.types.integer) $blue
): [int](#language.types.integer)

Obtiene el índice de la color especificada con su tono, blanco y negro.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     red

      Value of red component.





     green

      Value of green component.





     blue

      Value of blue component.




### Valores devueltos

Devuelve un integer que representa el índice de la color.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagecolorclosesthwb()**

&lt;?php
$im = imagecreatefromgif('php.gif');

echo 'HWB : ' . imagecolorclosesthwb($im, 116, 115, 152);
?&gt;

    Resultado del ejemplo anterior es similar a:

HWB: 33

### Ver también

    - [imagecolorclosest()](#function.imagecolorclosest) - Devuelve el índice de la color más cercana a una color dada

# imagecolordeallocate

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecolordeallocate — Elimina un color de una imagen

### Descripción

**imagecolordeallocate**([GdImage](#class.gdimage) $image, [int](#language.types.integer) $color): [bool](#language.types.boolean)

Elimina el color color
previamente asignado con la función
[imagecolorallocate()](#function.imagecolorallocate), para la imagen
image.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     color


       El identificador del color.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagecolordeallocate()**

&lt;?php
$white = imagecolorallocate($im, 255, 255, 255);
imagecolordeallocate($im, $white);
?&gt;

### Ver también

- [imagecolorallocate()](#function.imagecolorallocate) - Asigna una coloración para una imagen

- [imagecolorallocatealpha()](#function.imagecolorallocatealpha) - Asigna un color a una imagen

# imagecolorexact

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecolorexact — Devuelve el índice del color especificado

### Descripción

**imagecolorexact**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $red,
    [int](#language.types.integer) $green,
    [int](#language.types.integer) $blue
): [int](#language.types.integer)

Devuelve el índice del color especificado en la paleta de la imagen
image.

If you created the image from a file, only colors used in the image are resolved. Colors present only in the palette are not resolved.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     red

      Value of red component.





     green

      Value of green component.





     blue

      Value of blue component.




### Valores devueltos

Devuelve el índice del color especificado en la paleta, o -1 si
el color no existe.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

**Ejemplo #1 Obtención de los colores que componen el logo GD**

&lt;?php
// Define la imagen
$im = imagecreatefrompng('./gdlogo.png');

$colors   = Array();
$colors[] = imagecolorexact($im, 255, 0, 0);
$colors[] = imagecolorexact($im, 0, 0, 0);
$colors[] = imagecolorexact($im, 255, 255, 255);
$colors[] = imagecolorexact($im, 100, 255, 52);

print_r($colors);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; 16711680
[1] =&gt; 0
[2] =&gt; 16777215
[3] =&gt; 6618932
)

### Ver también

- [imagecolorclosest()](#function.imagecolorclosest) - Devuelve el índice de la color más cercana a una color dada

# imagecolorexactalpha

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

imagecolorexactalpha — Devuelve el índice de un color con su canal alfa

### Descripción

**imagecolorexactalpha**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $red,
    [int](#language.types.integer) $green,
    [int](#language.types.integer) $blue,
    [int](#language.types.integer) $alpha
): [int](#language.types.integer)

Devuelve el índice de un color con su canal alfa.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     red

      Value of red component.





     green

      Value of green component.





     blue

      Value of blue component.





     alpha


       Un valor comprendido entre 0 y 127.
       0 indica una opacidad completa mientras que
       127 indica una transparencia completa.





Los parámetros sobre los colores son enteros comprendidos entre 0 y 255
o hexadecimales comprendidos entre 0x00 y 0xFF.

### Valores devueltos

Devuelve el índice del color proporcionado y su canal alfa en la paleta
de la imagen, o -1 si el color no existe en la paleta de la imagen.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

**Ejemplo #1 Obtención de los colores que componen el logo GD**

&lt;?php

// Define la imagen
$im = imagecreatefrompng('./gdlogo.png');

$colors   = Array();
$colors[] = imagecolorexactalpha($im, 255, 0, 0, 0);
$colors[] = imagecolorexactalpha($im, 0, 0, 0, 127);
$colors[] = imagecolorexactalpha($im, 255, 255, 255, 55);
$colors[] = imagecolorexactalpha($im, 100, 255, 52, 20);

print_r($colors);

?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; 16711680
[1] =&gt; 2130706432
[2] =&gt; 939524095
[3] =&gt; 342163252
)

### Ver también

- [imagecolorclosestalpha()](#function.imagecolorclosestalpha) - Devuelve el color más cercano, teniendo en cuenta el canal alpha

# imagecolormatch

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

imagecolormatch — Hace que las colores de la versión palette de una imagen coincidan más con las de su versión truecolor

### Descripción

**imagecolormatch**([GdImage](#class.gdimage) $image1, [GdImage](#class.gdimage) $image2): [bool](#language.types.boolean)

Hace que las colores de la versión palette de una imagen coincidan más con las de su versión truecolor.

### Parámetros

     image1


       Un objeto de imagen truecolor.






     image2


       Un objeto de imagen palette que apunta a una imagen
       que tiene el mismo tamaño que image1.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       image1 y image2 ahora requieren instancias de [GdImage](#class.gdimage); anteriormente se esperaban [resource](#language.types.resource)s



### Ejemplos

**Ejemplo #1 Ejemplo con imagecolormatch()**

&lt;?php
// Define la imagen true color y la palette
$im1 = imagecreatefrompng('./gdlogo.png');
$im2 = imagecreate(imagesx($im1), imagesy($im1));

// Añade algunas colores a $im2
$colors = Array();
$colors[] = imagecolorallocate($im2, 255, 36, 74);
$colors[] = imagecolorallocate($im2, 40, 0, 240);
$colors[] = imagecolorallocate($im2, 82, 100, 255);
$colors[] = imagecolorallocate($im2, 84, 63, 44);

// Hace que estas colores coincidan con la imagen true color
imagecolormatch($im1, $im2);
?&gt;

### Ver también

- [imagecreatetruecolor()](#function.imagecreatetruecolor) - Crea una nueva imagen en colores verdaderos

# imagecolorresolve

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecolorresolve — Devuelve el índice de la color dada, o la más cercana posible

### Descripción

**imagecolorresolve**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $red,
    [int](#language.types.integer) $green,
    [int](#language.types.integer) $blue
): [int](#language.types.integer)

**imagecolorresolve()** devuelve un índice
de color en todos los casos. O bien encuentra
la color solicitada en la paleta, o bien encuentra
la color más cercana.

If you created the image from a file, only colors used in the image are resolved. Colors present only in the palette are not resolved.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     red

      Value of red component.





     green

      Value of green component.





     blue

      Value of blue component.




### Valores devueltos

Devuelve un índice de color.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

**Ejemplo #1 Ejemplo con imagecoloresolve()**
para obtener las colores de una imagen

&lt;?php
// Carga de una imagen
$im = imagecreatefromgif('phplogo.gif');

// Obtención de las colores más cercanas de la imagen
$colors = array();
$colors[] = imagecolorresolve($im, 255, 255, 255);
$colors[] = imagecolorresolve($im, 0, 0, 200)

// Mostrar
print_r($colors);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; 89
[1] =&gt; 85
)

### Ver también

- [imagecolorclosest()](#function.imagecolorclosest) - Devuelve el índice de la color más cercana a una color dada

# imagecolorresolvealpha

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

imagecolorresolvealpha —
Devuelve un índice de color o su alternativa más cercana,
incluyendo el canal alpha

### Descripción

**imagecolorresolvealpha**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $red,
    [int](#language.types.integer) $green,
    [int](#language.types.integer) $blue,
    [int](#language.types.integer) $alpha
): [int](#language.types.integer)

**imagecolorresolvealpha()** siempre devuelve
un índice de color, disponible en la paleta
de la imagen image: ya sea el color
exacto o la mejor aproximación.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     red

      Value of red component.





     green

      Value of green component.





     blue

      Value of blue component.





     alpha


       Un valor comprendido entre 0 y 127.
       0 indica una opacidad completa mientras que
       127 indica una transparencia completa.





Los parámetros sobre los colores son enteros entre 0 y 255 o
hexadecimales comprendidos entre 0x00 y 0xFF.

### Valores devueltos

Devuelve un índice de color.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

**Ejemplo #1 Ejemplo con imagecoloresolve()**
para recuperar los colores de una imagen

&lt;?php
// Carga de la imagen
$im = imagecreatefromgif('phplogo.gif');

// Recuperación de los colores más cercanos de la imagen
$colors = array();
$colors[] = imagecolorresolvealpha($im, 255, 255, 255, 0);
$colors[] = imagecolorresolvealpha($im, 0, 0, 200, 127);

// Mostrar
print_r($colors);
?&gt;

Resultado del ejemplo anterior es similar a:

Array
(
[0] =&gt; 89
[1] =&gt; 85
)

### Ver también

- [imagecolorclosestalpha()](#function.imagecolorclosestalpha) - Devuelve el color más cercano, teniendo en cuenta el canal alpha

# imagecolorset

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecolorset — Cambia el color en una paleta en el índice dado

### Descripción

**imagecolorset**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $color,
    [int](#language.types.integer) $red,
    [int](#language.types.integer) $green,
    [int](#language.types.integer) $blue,
    [int](#language.types.integer) $alpha = 0
): [?](#language.types.null)[false](#language.types.singleton)

Permite asignar a un índice de una paleta un color específico. Es una función muy
práctica para realizar relleno de color sin hacerlo realmente.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     color


       Un índice de la paleta.






     red

      Value of red component.





     green

      Value of green component.





     blue

      Value of blue component.





     alpha


       Valor del componente alpha.





### Valores devueltos

La función devuelve **[null](#constant.null)** en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagecolorset()**

&lt;?php
// Creación de una imagen de 300x100 píxeles
$im = imagecreate(300, 100);

// Define el color de fondo a rojo
imagecolorallocate($im, 255, 0, 0);

// Obtención del índice del color de fondo
$bg = imagecolorat($im, 0, 0);

// Define el color de fondo a azul
imagecolorset($im, $bg, 0, 0, 255);

// Muestra la imagen en el navegador
header('Content-Type: image/png');

imagepng($im);
?&gt;

### Ver también

- [imagecolorat()](#function.imagecolorat) - Devuelve el índice del color de un píxel dado

# imagecolorsforindex

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecolorsforindex — Retorna el color asociado a un índice

### Descripción

**imagecolorsforindex**([GdImage](#class.gdimage) $image, [int](#language.types.integer) $color): [array](#language.types.array)

Retorna el color asociado a un índice especificado.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     color


       El índice del color.





### Valores devueltos

Retorna un array asociativo con las claves "red",
"green", "blue" y "alpha"
que contienen los valores para el índice del color especificado.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

      8.0.0

       La función **imagecolorsforindex()** ahora lanza una excepción [ValueError](#class.valueerror)
       si color está fuera de rango; anteriormente, se retornaba **[false](#constant.false)** en su lugar.



### Ejemplos

    **Ejemplo #1 Ejemplo con imagecolorsforindex()**

&lt;?php

// se abre una imagen
$im = imagecreatefrompng('nexen.png');

// se obtiene un color
$start_x = 40;
$start_y = 50;
$color_index = imagecolorat($im, $start_x, $start_y);

// se lo hace legible
$color_tran = imagecolorsforindex($im, $color_index);

// ¿Cuál es?
print_r($color_tran);

?&gt;

    Resultado del ejemplo anterior es similar a:

Array
(
[red] =&gt; 226
[green] =&gt; 222
[blue] =&gt; 252
[alpha] =&gt; 0
)

### Ver también

- [imagecolorat()](#function.imagecolorat) - Devuelve el índice del color de un píxel dado

- [imagecolorexact()](#function.imagecolorexact) - Devuelve el índice del color especificado

# imagecolorstotal

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecolorstotal — Calcula el número de colores de una paleta

### Descripción

**imagecolorstotal**([GdImage](#class.gdimage) $image): [int](#language.types.integer)

Devuelve el número de colores de la paleta de la imagen.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

### Valores devueltos

Devuelve el número de colores de la paleta para la imagen
image o 0 para las imágenes
truecolor.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Obtención del número total de colores en una imagen utilizando
     la función imagecolorstotal()**

&lt;?php
// Creación de una instancia de imagen
$im = imagecreatefromgif('php.gif');

echo 'Número total de colores en la imagen : ' . imagecolorstotal($im);
?&gt;

    Resultado del ejemplo anterior es similar a:

Número total de colores en la imagen : 128

### Ver también

- [imagecolorat()](#function.imagecolorat) - Devuelve el índice del color de un píxel dado

- [imagecolorsforindex()](#function.imagecolorsforindex) - Retorna el color asociado a un índice

- [imageistruecolor()](#function.imageistruecolor) - Determina si una imagen es una imagen truecolor

# imagecolortransparent

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecolortransparent — Define la color transparente

### Descripción

**imagecolortransparent**([GdImage](#class.gdimage) $image, [?](#language.types.null)[int](#language.types.integer) $color = **[null](#constant.null)**): [int](#language.types.integer)

Obtiene o define la color transparente para la image proporcionada.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     color


       A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Se devuelve el identificador de la nueva color transparente (o la actual,
si no se especifica ninguna). Si el argumento color
es **[null](#constant.null)** y la imagen no tiene color transparente,
el identificador devuelto será -1.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

      8.0.0

       color ahora es nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con imagecolortransparent()**

&lt;?php
// Creación de una imagen de 55x30
$im = imagecreatetruecolor(55, 30);
$red = imagecolorallocate($im, 255, 0, 0);
$black = imagecolorallocate($im, 0, 0, 0);

// Se hace el fondo transparente
imagecolortransparent($im, $black);

// Se dibuja un rectángulo rojo
imagefilledrectangle($im, 4, 4, 50, 25, $red);

// Se guarda la imagen
imagepng($im, './imagecolortransparent.png');
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagecolortransparent()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagecolortransparent.png)


### Notas

**Nota**:

    La transparencia se copia únicamente con la función
    [imagecopymerge()](#function.imagecopymerge) y las imágenes en color verdadero,
    no con la función [imagecopy()](#function.imagecopy) ni las imágenes de paleta.

**Nota**:

    La color de transparencia es una propiedad de la imagen, no es
    una propiedad de la color. Una vez que se ha definido la color de
    transparencia, cada región de la imagen de esa color que se haya
    dibujado previamente será transparente.

# imageconvolution

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

imageconvolution — Aplica una matriz de convolución 3x3, utilizando el coeficiente y el desplazamiento

### Descripción

**imageconvolution**(
    [GdImage](#class.gdimage) $image,
    [array](#language.types.array) $matrix,
    [float](#language.types.float) $divisor,
    [float](#language.types.float) $offset
): [bool](#language.types.boolean)

**imageconvolution()** aplica una matriz de convolución
3x3, utilizando el coeficiente div y el desplazamiento
offset.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     matrix


       Una matriz 3x3: un array que contiene tres arrays de tres
       números de punto flotante.






     divisor


       El divisor del resultado de la convolución, utilizado para la normalización.






     offset


       La posición del color.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Impresión del logo PHP.net con imageconvolution()**

&lt;?php
$image = imagecreatefromgif('http://www.php.net/images/php.gif');

$emboss = array(array(2, 0, 0), array(0, -1, 0), array(0, 0, -1));
imageconvolution($image, $emboss, 1, 127);

header('Content-Type: image/png');
imagepng($image, null, 9);
?&gt;

    El ejemplo anterior mostrará:




      ![imageconvolution_emboss.png](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imageconvolution_emboss.png)




    **Ejemplo #2 Desenfoque gaussiano con imageconvolution()**

&lt;?php
$image = imagecreatetruecolor(180,40);

// Escribe el texto y aplica un desenfoque gaussiano a la imagen
imagestring($image, 5, 10, 8, 'Texto desenfocado gaussiano', 0x00ff00);
$gaussian = array(array(1.0, 2.0, 1.0), array(2.0, 4.0, 2.0), array(1.0, 2.0, 1.0));
imageconvolution($image, $gaussian, 16, 0);

// Reescribe el texto para la comparación
imagestring($image, 5, 10, 18, 'Texto desenfocado gaussiano', 0x00ff00);

header('Content-Type: image/png');
imagepng($image, null, 9);
?&gt;

    El ejemplo anterior mostrará:





      ![Visualización del ejemplo: Desenfoque gaussiano](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imageconvolution_gaussian.png)


### Ver también

- [imagefilter()](#function.imagefilter) - Aplica un filtro a una imagen

# imagecopy

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecopy — Copia una parte de una imagen

### Descripción

**imagecopy**(
    [GdImage](#class.gdimage) $dst_image,
    [GdImage](#class.gdimage) $src_image,
    [int](#language.types.integer) $dst_x,
    [int](#language.types.integer) $dst_y,
    [int](#language.types.integer) $src_x,
    [int](#language.types.integer) $src_y,
    [int](#language.types.integer) $src_width,
    [int](#language.types.integer) $src_height
): [bool](#language.types.boolean)

Copia una parte de la imagen src_image a la imagen de
destino dst_image, comenzando en las coordenadas
src_x, src_y y con un ancho
de src_width y una altura de src_height.
La porción así definida será copiada y colocada en las coordenadas dst_x
y dst_y.

### Parámetros

     dst_image

      Destination image resource.





     src_image

      Source image resource.





     dst_x


       X: coordenadas del punto de destino.






     dst_y


       Y: coordenadas del punto de destino.






     src_x


       X: coordenadas del punto origen.






     src_y


       Y: coordenadas del punto origen.






     src_width

      Source width.





     src_height

      Source height.




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       dst_image y src_image
       ahora requieren instancias de [GdImage](#class.gdimage);
       anteriormente se esperaban [resource](#language.types.resource)s.



### Ejemplos

**Ejemplo #1 Se recorta el logo PHP.net**

&lt;?php
// Creación de las instancias de imagen
$src = imagecreatefromgif('php.gif');
$dest = imagecreatetruecolor(80, 40);

// Copia
imagecopy($dest, $src, 0, 0, 20, 13, 80, 40);

// Visualización y liberación de la memoria
header('Content-Type: image/gif');
imagegif($dest);
?&gt;

Resultado del ejemplo anterior es similar a:

      ![Visualización del ejemplo: Copia una parte del logo PHP.net](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagecopy.gif)


### Ver también

- [imagecrop()](#function.imagecrop) - Recorta una imagen en el rectángulo dado

# imagecopymerge

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

imagecopymerge — Copia y fusiona una parte de una imagen

### Descripción

**imagecopymerge**(
    [GdImage](#class.gdimage) $dst_image,
    [GdImage](#class.gdimage) $src_image,
    [int](#language.types.integer) $dst_x,
    [int](#language.types.integer) $dst_y,
    [int](#language.types.integer) $src_x,
    [int](#language.types.integer) $src_y,
    [int](#language.types.integer) $src_width,
    [int](#language.types.integer) $src_height,
    [int](#language.types.integer) $pct
): [bool](#language.types.boolean)

Copia una parte de la imagen src_image
en la imagen de destino dst_image
comenzando en las coordenadas (src_x,
src_y), con el ancho
src_width y la altura src_height.
La zona de la imagen así definida será copiada en las coordenadas
(dst_x, dst_y),
en la imagen de destino.

### Parámetros

     dst_image

      Destination image resource.





     src_image

      Source image resource.





     dst_x


       X: coordenada del punto de destino.






     dst_y


       Y: coordenada del punto de destino.






     src_x


       X: coordenada del punto origen.






     src_y


       Y: coordenada del punto origen.






     src_width

      Source width.





     src_height

      Source height.





     pct


       Las dos imágenes serán fusionadas
       según el argumento pct, que puede valer de
       0 a 100. Si pct = 0, no se realiza ninguna acción,
       mientras que si pct = 100,
       **imagecopymerge()** se comporta exactamente como
       [imagecopy()](#function.imagecopy) para las imágenes de paleta, excepto
       por la ignorancia de los componentes alpha, mientras que implementa la
       transparencia alpha para las imágenes en color verdadero.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       dst_image y src_image
       ahora esperan instancias de [GdImage](#class.gdimage);
       anteriormente, se esperaban [resource](#language.types.resource)s.



### Ejemplos

    **Ejemplo #1 Fusiona 2 copias del logo PHP.net con 75% de transparencia**

&lt;?php
// Creación de las instancias de imagen
$dest = imagecreatefromgif('php.gif');
$src = imagecreatefromgif('php.gif');

// Copia y fusiona
imagecopymerge($dest, $src, 10, 10, 0, 0, 100, 47, 75);

// Mostrar y liberar la memoria
header('Content-Type: image/gif');
imagegif($dest);
?&gt;

# imagecopymergegray

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

imagecopymergegray — Copia y fusiona una parte de una imagen en niveles de gris

### Descripción

**imagecopymergegray**(
    [GdImage](#class.gdimage) $dst_image,
    [GdImage](#class.gdimage) $src_image,
    [int](#language.types.integer) $dst_x,
    [int](#language.types.integer) $dst_y,
    [int](#language.types.integer) $src_x,
    [int](#language.types.integer) $src_y,
    [int](#language.types.integer) $src_width,
    [int](#language.types.integer) $src_height,
    [int](#language.types.integer) $pct
): [bool](#language.types.boolean)

**imagecopymergegray()** copia una parte de
la imagen src_image en la imagen de destino
dst_image comenzando en las coordenadas
(src_x, src_y), con
el ancho src_width y la altura
src_height. La zona de la imagen así definida será
copiada en las coordenadas (dst_x, dst_y),
en la imagen de destino.

**imagecopymergegray()** es idéntica a la función
[imagecopymerge()](#function.imagecopymerge), excepto que durante la
fusión, el "hue" de la imagen será conservado mediante la conversión
de la zona en la imagen de destino a gris, antes de la operación de copia.

### Parámetros

     dst_image

      Destination image resource.





     src_image

      Source image resource.





     dst_x


       X: coordenada del punto de destino.






     dst_y


       Y: coordenada del punto de destino.






     src_x


       X: coordenada del punto origen.






     src_y


       Y: coordenada del punto origen.






     src_width

      Source width.





     src_height

      Source height.





     pct


       El parámetro src_image será convertido
       a niveles de gris de acuerdo con el parámetro
       pct donde 0 corresponde a una conversión total a
       niveles de gris y 100 no modifica nada.
       Cuando pct = 100, esta función se comporta de la
       misma manera que la función [imagecopy()](#function.imagecopy) para las paletas,
       excepto por la ignorancia de los componentes alpha, mientras que implementa la
       transparencia alpha para las imágenes true colour.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       dst_image y src_image
       ahora esperan instancias de [GdImage](#class.gdimage);
       anteriormente, se esperaban [resource](#language.types.resource)s.



### Ejemplos

    **Ejemplo #1 Ejemplo con imagecopymergegray()**

&lt;?php
// Creación de las instancias de imagen
$dest = imagecreatefromgif('php.gif');
$src = imagecreatefromgif('php.gif');

// Copia y fusiona - Gris = 20%
imagecopymergegray($dest, $src, 10, 10, 0, 0, 100, 47, 20);

// Muestra y libera la memoria
header('Content-Type: image/gif');
imagegif($dest);
?&gt;

# imagecopyresampled

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

imagecopyresampled — Copia, redimensiona y reinterpolación de una imagen

### Descripción

**imagecopyresampled**(
    [GdImage](#class.gdimage) $dst_image,
    [GdImage](#class.gdimage) $src_image,
    [int](#language.types.integer) $dst_x,
    [int](#language.types.integer) $dst_y,
    [int](#language.types.integer) $src_x,
    [int](#language.types.integer) $src_y,
    [int](#language.types.integer) $dst_width,
    [int](#language.types.integer) $dst_height,
    [int](#language.types.integer) $src_width,
    [int](#language.types.integer) $src_height
): [bool](#language.types.boolean)

**imagecopyresampled()** copia una zona
rectangular de la imagen src_im hacia
la imagen dst_im. Durante la copia,
la zona es reinterpolada para mantener la claridad
de la imagen durante una reducción.

En otras palabras, **imagecopyresampled()** tomará una
forma rectangular src_image de un ancho de
src_width y una altura src_height
en la posición (src_x,src_y)
y la colocará en una zona rectangular dst_image
de un ancho de dst_width y una altura de
dst_height en la posición
(dst_x,dst_y).

Si las alturas y anchos de origen y destino
difieren, la imagen copiada será estirada de manera apropiada.
Las coordenadas son las del ángulo superior izquierdo.
**imagecopyresampled()** puede usarse para copiar
zonas de una imagen hacia sí misma, (si dst_image
es la misma que src_image) pero si las regiones se
superponen, los resultados son impredecibles.

### Parámetros

     dst_image

      Destination image resource.





     src_image

      Source image resource.





     dst_x


       X: coordenadas del punto de destino.






     dst_y


       Y: coordenadas del punto de destino.






     src_x


       X: coordenadas del punto origen.






     src_y


       Y: coordenadas del punto origen.






     dst_width


       Ancho del destino.






     dst_height


       Altura del destino.






     src_width

      Source width.





     src_height

      Source height.




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       dst_image y src_image
       ahora esperan instancias de [GdImage](#class.gdimage);
       anteriormente, se esperaban [resource](#language.types.resource)s.



### Ejemplos

    **Ejemplo #1 Ejemplo simple**



     Este ejemplo redimensiona una imagen a la mitad de su tamaño original.

&lt;?php
// El archivo
$filename = 'test.jpg';
$percent = 0.5;

// Tipo de contenido
header('Content-Type: image/jpeg');

// Cálculo de las nuevas dimensiones
list($width, $height) = getimagesize($filename);
$new_width = $width * $percent;
$new_height = $height \* $percent;

// Redimensionamiento
$image_p = imagecreatetruecolor($new_width, $new_height);
$image = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

// Mostrar
imagejpeg($image_p, null, 100);
?&gt;

    Resultado del ejemplo anterior es similar a:




      ![imagecopyresampled.jpg](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagecopyresampled.jpg)








    **Ejemplo #2 Redimensionamiento proporcional de una imagen**



     Este ejemplo mostrará una imagen con un ancho o altura máxima
     de 200 píxeles.

&lt;?php
// El archivo
$filename = 'test.jpg';

// Definición del ancho y altura máxima
$width = 200;
$height = 200;

// Tipo de contenido
header('Content-Type: image/jpeg');

// Cálculo de las nuevas dimensiones
list($width_orig, $height_orig) = getimagesize($filename);

$ratio_orig = $width_orig/$height_orig;

if ($width/$height &gt; $ratio_orig) {
   $width = $height*$ratio_orig;
} else {
$height = $width/$ratio_orig;
}

// Redimensionamiento
$image_p = imagecreatetruecolor($width, $height);
$image = imagecreatefromjpeg($filename);
imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

// Mostrar
imagejpeg($image_p, null, 100);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: Reinterpolación de una imagen proporcionalmente](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagecopyresampled_2.jpg)


### Notas

**Nota**:

    Existe un problema debido a las limitaciones del tamaño de la paleta
    (255 + 1 colores diferentes). Filtrar o reinterpolar una imagen
    requiere más de 255 colores, entonces se usa una aproximación para
    calcular el nuevo número de colores. Con una paleta, si un nuevo
    color no puede ser asignado, se usa el color más cercano (en teoría).
    Esto no siempre es el color más cercano visualmente.
    Esto puede generar problemas extraños, como imágenes blancas.
    Para evitar este problema, convierta la imagen a TrueColor, como la
    generada por la función [imagecreatetruecolor()](#function.imagecreatetruecolor).

### Ver también

- [imagecopyresized()](#function.imagecopyresized) - Copia y redimensiona una parte de una imagen

- [imagescale()](#function.imagescale) - Redimensiona una imagen utilizando una altura y una anchura proporcionadas

- [imagecrop()](#function.imagecrop) - Recorta una imagen en el rectángulo dado

# imagecopyresized

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecopyresized — Copia y redimensiona una parte de una imagen

### Descripción

**imagecopyresized**(
    [GdImage](#class.gdimage) $dst_image,
    [GdImage](#class.gdimage) $src_image,
    [int](#language.types.integer) $dst_x,
    [int](#language.types.integer) $dst_y,
    [int](#language.types.integer) $src_x,
    [int](#language.types.integer) $src_y,
    [int](#language.types.integer) $dst_width,
    [int](#language.types.integer) $dst_height,
    [int](#language.types.integer) $src_width,
    [int](#language.types.integer) $src_height
): [bool](#language.types.boolean)

**imagecopyresized()** copia una parte rectangular de una imagen
en otra imagen de destino. dst_image es la
imagen de destino, src_image es la imagen fuente.

En otras palabras, **imagecopyresized()** tomará una
forma rectangular src_image de un ancho de
src_width y una altura src_height
en la posición (src_x,src_y)
y la colocará en una zona rectangular dst_image
de un ancho de dst_width y una altura de
dst_height en la posición
(dst_x,dst_y).

Si las dimensiones de la fuente y el destino no son iguales, se realiza
un estiramiento adecuado para hacer coincidir
las dos. Las coordenadas proporcionadas se definen
en relación con la esquina superior izquierda. Esta función puede ser
utilizada para copiar regiones dentro
de una misma imagen (si dst_image y
src_image son idénticas), pero si las
regiones se superponen, el resultado podría ser
inconsistente.

### Parámetros

     dst_image

      Destination image resource.





     src_image

      Source image resource.





     dst_x


       X: coordenada del punto de destino.






     dst_y


       Y: coordenada del punto de destino.






     src_x


       X: coordenada del punto fuente.






     src_y


       Y: coordenada del punto fuente.






     dst_width


       Ancho del destino.






     dst_height


       Altura del destino.






     src_width

      Source width.





     src_height

      Source height.




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       dst_image y src_image
       ahora esperan instancias de [GdImage](#class.gdimage);
       anteriormente, se esperaban [resource](#language.types.resource)s.



### Ejemplos

    **Ejemplo #1 Redimensionamiento de una imagen**



     Este ejemplo mostrará la imagen redimensionada a la mitad de su tamaño original.

&lt;?php
// Archivo y nuevo tamaño
$filename = 'test.jpg';
$percent = 0.5;

// Tipo de contenido
header('Content-Type: image/jpeg');

// Cálculo de las nuevas dimensiones
list($width, $height) = getimagesize($filename);
$newwidth = $width * $percent;
$newheight = $height \* $percent;

// Carga
$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = imagecreatefromjpeg($filename);

// Redimensionamiento
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

// Mostrar
imagejpeg($thumb);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagecopyresized()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagecopyresized.jpg)



     La imagen mostrada tendrá la mitad del tamaño de la imagen original, pero una
     mejor calidad puede obtenerse utilizando la función
     [imagecopyresampled()](#function.imagecopyresampled).

### Notas

**Nota**:

    Existe un problema debido a las limitaciones del tamaño de la paleta
    (255 + 1 colores diferentes). Filtrar o reescalar una imagen
    requiere más de 255 colores, entonces se utiliza una aproximación para
    calcular el nuevo número de colores. Con una paleta, si un nuevo
    color no puede ser asignado, se utiliza el color más cercano (en teoría);
    esto no siempre es el más cercano visualmente.
    Esto puede generar problemas extraños, como imágenes blancas.
    Para evitar este problema, convierta a imágenes TrueColor, como las
    generadas por la función [imagecreatetruecolor()](#function.imagecreatetruecolor).

### Ver también

- [imagecopyresampled()](#function.imagecopyresampled) - Copia, redimensiona y reinterpolación de una imagen

- [imagescale()](#function.imagescale) - Redimensiona una imagen utilizando una altura y una anchura proporcionadas

- [imagecrop()](#function.imagecrop) - Recorta una imagen en el rectángulo dado

# imagecreate

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecreate — Crea una nueva imagen con paleta

### Descripción

**imagecreate**([int](#language.types.integer) $width, [int](#language.types.integer) $height): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**imagecreate()** devuelve un identificador de imagen
que representa una imagen vacía.

En general, se recomienda el uso de la función
[imagecreatetruecolor()](#function.imagecreatetruecolor) en lugar de la función
**imagecreate()** para que las operaciones sobre la imagen
se realicen con la mayor calidad posible. Si se desea utilizar una paleta, entonces la función [imagetruecolortopalette()](#function.imagetruecolortopalette)
debe ser llamada inmediatamente antes de guardar la imagen con la función
[imagepng()](#function.imagepng) o la función [imagegif()](#function.imagegif).

### Parámetros

     width


       El ancho de la imagen.






     height


       La altura de la imagen.





### Valores devueltos

Returns an image object on success, **[false](#constant.false)** on errors.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage) ; anteriormente,
       se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1
     Creación de una imagen GD y visualización de esta imagen
    **

&lt;?php
header("Content-Type: image/png");
$im = @imagecreate(110, 20)
    or die("Imposible inicializar la biblioteca GD");
$background_color = imagecolorallocate($im, 0, 0, 0);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, "A Simple Text String", $text_color);
imagepng($im);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo : imagecreate()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagecreate.png)


### Ver también

- [imagedestroy()](#function.imagedestroy) - Destruye una imagen

- [imagecreatetruecolor()](#function.imagecreatetruecolor) - Crea una nueva imagen en colores verdaderos

# imagecreatefromavif

(PHP 8 &gt;= 8.1.0)

imagecreatefromavif — Create a new image from file or URL

### Descripción

**imagecreatefromavif**([string](#language.types.string) $filename): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**imagecreatefromavif()** devuelve un objeto imagen
obtenido a partir del fichero filename.

### Parámetros

     filename


        Ruta de acceso a la imagen AVIF.





### Valores devueltos

Returns an image object on success, **[false](#constant.false)** on errors.

# imagecreatefrombmp

(PHP 7 &gt;= 7.2.0, PHP 8)

imagecreatefrombmp — Create a new image from file or URL

### Descripción

**imagecreatefrombmp**([string](#language.types.string) $filename): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**imagecreatefrombmp()** devuelve un identificador de imagen
que representa la imagen obtenida a partir del nombre de fichero proporcionado.

**Sugerencia**
Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

### Parámetros

     filename


       Ruta de acceso al fichero BMP.





### Valores devueltos

Returns an image object on success, **[false](#constant.false)** on errors.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage); anteriormente,
       se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Convierte una imagen BMP en imagen PNG utilizando imagecreatefrombmp()**

&lt;?php
// Carga el fichero BMP
$im = imagecreatefrombmp('./example.bmp');

// Lo convierte en un fichero PNG con los parámetros por omisión
imagepng($im, './example.png');
?&gt;

# imagecreatefromgd

(PHP 4 &gt;= 4.0.7, PHP 5, PHP 7, PHP 8)

imagecreatefromgd — Crea una nueva imagen a partir de un fichero GD o de una URL

### Descripción

**imagecreatefromgd**([string](#language.types.string) $filename): [GdImage](#class.gdimage)|[false](#language.types.singleton)

Crea una nueva imagen a partir de un fichero GD o de una URL.

**Sugerencia**
Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

### Parámetros

     filename


       Ruta de acceso a un fichero GD.





### Valores devueltos

Returns an image object on success, **[false](#constant.false)** on errors.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage) ; anteriormente,
       se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Ejemplo con imagecreatefromgd()**

&lt;?php
// Carga una imagen GD
$im = @imagecreatefromgd('./test.gd');

// Verifica si la imagen se ha cargado correctamente
if(!$im)
{
die('No ha sido posible cargar la imagen GD');
}

// Operaciones sobre la imagen aquí

// Guardado de la imagen
imagegd($im, './test_updated.gd');
?&gt;

### Notas

**Advertencia**The GD
and GD2 image formats are proprietary image formats of libgd. They have to be regarded
_obsolete_, and should only be used for development and testing
purposes.

# imagecreatefromgd2

(PHP 4 &gt;= 4.0.7, PHP 5, PHP 7, PHP 8)

imagecreatefromgd2 — Crea una nueva imagen a partir de un fichero GD2 o de una URL

### Descripción

**imagecreatefromgd2**([string](#language.types.string) $filename): [GdImage](#class.gdimage)|[false](#language.types.singleton)

Crea una nueva imagen desde un fichero GD2 o una URL.

**Sugerencia**
Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

### Parámetros

     filename


       Ruta de acceso a la imagen GD2.





### Valores devueltos

Returns an image object on success, **[false](#constant.false)** on errors.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage) ; anteriormente,
       se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Ejemplo con imagecreatefromgd2()**

&lt;?php
// Carga la imagen gd2
$im = imagecreatefromgd2('./test.gd2');

// Aplica un efecto a la imagen: se aplica aquí un filtro negativo si existe
if(function_exists('imagefilter'))
{
imagefilter($im, IMG_FILTER_NEGATE);
}

// Guarda la imagen
imagegd2($im, './test_updated.gd2');
?&gt;

### Notas

**Advertencia**The GD
and GD2 image formats are proprietary image formats of libgd. They have to be regarded
_obsolete_, and should only be used for development and testing
purposes.

# imagecreatefromgd2part

(PHP 4 &gt;= 4.0.7, PHP 5, PHP 7, PHP 8)

imagecreatefromgd2part — Crea una nueva imagen a partir de una parte de un archivo GD2 o de una URL

### Descripción

**imagecreatefromgd2part**(
    [string](#language.types.string) $filename,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height
): [GdImage](#class.gdimage)|[false](#language.types.singleton)

Crea una nueva imagen a partir de una parte de un archivo GD2 o de una URL.

**Sugerencia**
Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

### Parámetros

     filename


       Ruta hacia la imagen GD2.






     x


       Coordenada en X del punto de origen.






     y


       Coordenada en Y del punto de origen.






     width

      Source width.





     height

      Source height.




### Valores devueltos

Returns an image object on success, **[false](#constant.false)** on errors.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage) ; anteriormente,
       se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Ejemplo con imagecreatefromgd2part()**

&lt;?php
// Para este ejemplo, primero se necesitan las dimensiones de la imagen
$image = getimagesize('./test.gd2');

// Creación de la instancia de imagen ahora que se tienen las dimensiones
$im = imagecreatefromgd2part('./test.gd2', 4, 4, ($image[0] / 2) - 6, ($image[1] / 2) - 6);

// Operación sobre la imagen: aquí se imprime la imagen
if(function_exists('imagefilter'))
{
imagefilter($im, IMG_FILTER_EMBOSS);
}

// Guardado de la imagen optimizada
imagegd2($im, './test_emboss.gd2');
?&gt;

### Notas

**Advertencia**The GD
and GD2 image formats are proprietary image formats of libgd. They have to be regarded
_obsolete_, and should only be used for development and testing
purposes.

# imagecreatefromgif

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecreatefromgif — Create a new image from file or URL

### Descripción

**imagecreatefromgif**([string](#language.types.string) $filename): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**imagecreatefromgif()** devuelve un identificador de imagen que
representa la imagen obtenida a partir del fichero cuyo nombre es
dado por filename.

**Precaución**

    Al leer en memoria ficheros GIF animados, solo el primer frame
    es devuelto por el objeto de la imagen. El tamaño de la imagen no
    es necesariamente el que se reporta mediante [getimagesize()](#function.getimagesize).

**Sugerencia**
Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

### Parámetros

     filename


       Ruta hacia la imagen GIF.





### Valores devueltos

Returns an image object on success, **[false](#constant.false)** on errors.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage) ; anteriormente,
       se devolvía un [resource](#language.types.resource).



### Ejemplos

**Ejemplo #1 Ejemplo de manejo de errores al cargar una imagen GIF**

&lt;?php
function LoadGif($imgname)
{
    /* Intenta abrir la imagen */
    $im = @imagecreatefromgif($imgname);

    /* Procesamiento si la apertura falló */
    if(!$im)
    {
        /* Creación de una imagen vacía */
        $im = imagecreatetruecolor (150, 30);
        $bgc = imagecolorallocate ($im, 255, 255, 255);
        $tc = imagecolorallocate ($im, 0, 0, 0);

        imagefilledrectangle ($im, 0, 0, 150, 30, $bgc);

        /* Muestra un mensaje de error en la imagen */
        imagestring ($im, 1, 5, 5, 'Error loading ' . $imgname, $tc);
    }

    return $im;

}

header('Content-Type: image/gif');

$img = LoadGif('bogus.image');

imagegif($img);
?&gt;

Resultado del ejemplo anterior es similar a:

     ![Visualización del ejemplo: imagecreatefromgif()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagecreatefromgif.gif)

# imagecreatefromjpeg

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecreatefromjpeg — Create a new image from file or URL

### Descripción

**imagecreatefromjpeg**([string](#language.types.string) $filename): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**imagecreatefromjpeg()** devuelve un identificador de imagen
que representa una imagen obtenida a partir del fichero
filename.

**Sugerencia**
Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

### Parámetros

     filename


       Ruta hacia la imagen JPEG.





### Valores devueltos

Returns an image object on success, **[false](#constant.false)** on errors.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage) ; anteriormente,
       se devolvía un [resource](#language.types.resource).



### Ejemplos

**Ejemplo #1 Ejemplo de gestión de un error durante la carga de una imagen JPEG**

&lt;?php
function LoadJpeg($imgname)
{
    /* Intento de abrir la imagen */
    $im = @imagecreatefromjpeg($imgname);

    /* Procesamiento en caso de fallo */
    if(!$im)
    {
        /* Creación de una imagen vacía */
        $im  = imagecreatetruecolor(150, 30);
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);

        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

        /* Se muestra un mensaje de error */
        imagestring($im, 1, 5, 5, 'Error de carga ' . $imgname, $tc);
    }

    return $im;

}

header('Content-Type: image/jpeg');

$img = LoadJpeg('bogus.image');

imagejpeg($img);
?&gt;

Resultado del ejemplo anterior es similar a:

     ![Visualización del ejemplo: Ejemplo de gestión de un error durante la carga de un JPEG](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagecreatefromjpeg.jpg)

# imagecreatefrompng

(PHP 4, PHP 5, PHP 7, PHP 8)

imagecreatefrompng — Create a new image from file or URL

### Descripción

**imagecreatefrompng**([string](#language.types.string) $filename): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**imagecreatefrompng()** devuelve un identificador de imagen
que representa una imagen obtenida a partir del fichero
filename.

**Sugerencia**
Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

### Parámetros

     filename


       Ruta de acceso a la imagen PNG.





### Valores devueltos

Returns an image object on success, **[false](#constant.false)** on errors.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage) ; anteriormente,
       se devolvía un [resource](#language.types.resource).



### Ejemplos

**Ejemplo #1 Ejemplo de gestión de un error al cargar una imagen PNG**

&lt;?php
function LoadPNG($imgname)
{
    /* Intento de abrir la imagen */
    $im = @imagecreatefrompng($imgname);

    /* Procesamiento en caso de fallo */
    if(!$im)
    {
        /* Creación de una imagen vacía */
        $im  = imagecreatetruecolor(150, 30);
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);

        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

        /* Se muestra un mensaje de error */
        imagestring($im, 1, 5, 5, 'Error de carga ' . $imgname, $tc);
    }

    return $im;

}

header('Content-Type: image/png');

$img = LoadPNG('bogus.image');

imagepng($img);
?&gt;

Resultado del ejemplo anterior es similar a:

     ![Ejemplo con la función imagecreatefrompng()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagecreatefrompng.png)

# imagecreatefromstring

(PHP 4 &gt;= 4.0.4, PHP 5, PHP 7, PHP 8)

imagecreatefromstring — Crea una imagen a partir de una cadena

### Descripción

**imagecreatefromstring**([string](#language.types.string) $data): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**imagecreatefromstring()** devuelve un identificador de imagen
que representa la imagen obtenida desde la cadena data.
El tipo de la imagen será detectado automáticamente si PHP ha sido compilado con
soporte para: JPEG, PNG, GIF, BMP, WBMP, GD2, WEBP y AVIF.

### Parámetros

     data


       Una cadena que contiene los datos de la imagen.





### Valores devueltos

Un objeto de imagen será devuelto en caso de éxito. **[false](#constant.false)** es devuelto si
el tipo de la imagen no es soportado, si los datos no están en un formato reconocido
o si la imagen está corrupta y por lo tanto no puede ser cargada.

### Errores/Excepciones

**imagecreatefromstring()** emite un error de nivel
E_WARNING si los datos no están en un formato reconocido.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage); anteriormente,
       se devolvía un [resource](#language.types.resource).




      7.3.0

       WEBP es soportado ahora (si es soportado por la libgd utilizada).



### Ejemplos

    **Ejemplo #1 Ejemplo con imagecreatefromstring()**

&lt;?php
$data = 'iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABl'
       . 'BMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDr'
       . 'EX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r'
       . '8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==';
$data = base64_decode($data);

$im = imagecreatefromstring($data);
if ($im !== false) {
    header('Content-Type: image/png');
    imagepng($im);
}
else {
echo 'An error occurred.';
}
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagecreatefromstring()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagecreatefromstring.png)


### Ver también

- [imagecreatefromjpeg()](#function.imagecreatefromjpeg) - Create a new image from file or URL

- [imagecreatefrompng()](#function.imagecreatefrompng) - Create a new image from file or URL

- [imagecreatefromgif()](#function.imagecreatefromgif) - Create a new image from file or URL

- [imagecreatetruecolor()](#function.imagecreatetruecolor) - Crea una nueva imagen en colores verdaderos

# imagecreatefromtga

(PHP 7 &gt;= 7.4.0, PHP 8)

imagecreatefromtga — Create a new image from file or URL

### Descripción

**imagecreatefromtga**([string](#language.types.string) $filename): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**imagecreatefromtga()** devuelve un objeto imagen
que representa la imagen obtenida a partir del nombre de fichero proporcionado.

### Parámetros

     filename


       Ruta de acceso a la imagen TGA Truevision.





### Valores devueltos

Returns an image object on success, **[false](#constant.false)** on errors.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia [GDImage](#class.gdimage);
       anteriormente, se devolvía un [resource](#language.types.resource).



# imagecreatefromwbmp

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

imagecreatefromwbmp — Create a new image from file or URL

### Descripción

**imagecreatefromwbmp**([string](#language.types.string) $filename): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**imagecreatefromwbmp()** devuelve un recurso de imagen
PHP, que representa la imagen filename.

**Nota**:

    Las imágenes WBMP son Wireless Bitmaps, y no Windows Bitmaps. Estas últimas
    pueden cargarse mediante [imagecreatefrombmp()](#function.imagecreatefrombmp).

**Sugerencia**
Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

### Parámetros

     filename


       Ruta de acceso a la imagen WBMP.





### Valores devueltos

Returns an image object on success, **[false](#constant.false)** on errors.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage) ; anteriormente,
       se devolvía un [resource](#language.types.resource).



### Ejemplos

**Ejemplo #1 Ejemplo de gestión de un error al cargar una imagen WBMP**

&lt;?php
function LoadWBMP($imgname)
{
    /* Intento de abrir la imagen */
    $im = @imagecreatefromwbmp($imgname);

    /* Procesamiento en caso de fallo */
    if(!$im)
    {
        /* Creación de una imagen vacía */
        $im  = imagecreatetruecolor(150, 30);
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);

        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

        /* Se muestra un mensaje de error */
        imagestring($im, 1, 5, 5, 'Error de carga ' . $imgname, $tc);
    }

    return $im;

}

header('Content-Type: image/vnd.wap.wbmp');

$img = LoadWBMP('bogus.image');

imagewbmp($img);
?&gt;

# imagecreatefromwebp

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

imagecreatefromwebp — Create a new image from file or URL

### Descripción

**imagecreatefromwebp**([string](#language.types.string) $filename): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**imagecreatefromwebp()** devuelve un identificador de imagen
que representa la imagen obtenida desde el fichero proporcionado.
Tenga en cuenta que los ficheros WebP animados no pueden ser leídos.

**Sugerencia**
Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

### Parámetros

     filename


       Ruta hacia la imagen WebP.





### Valores devueltos

Returns an image object on success, **[false](#constant.false)** on errors.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage) ; anteriormente,
       se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Convierte una imagen WebP en una imagen jpeg utilizando la función imagecreatefromwebp()**

&lt;?php
// Carga el fichero WebP
$im = imagecreatefromwebp('./example.webp');

// Se convierte en un fichero jpeg con una calidad del 100%
imagejpeg($im, './example.jpeg', 100);
?&gt;

# imagecreatefromxbm

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

imagecreatefromxbm — Create a new image from file or URL

### Descripción

**imagecreatefromxbm**([string](#language.types.string) $filename): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**imagecreatefromxbm()** devuelve un identificador
de imagen que representa la imagen obtenida a partir del fichero
filename.

**Sugerencia**
Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

### Parámetros

     filename


       Ruta de acceso a la imagen XBM.





### Valores devueltos

Returns an image object on success, **[false](#constant.false)** on errors.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage) ; anteriormente,
       se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Convertir una imagen XBM a una imagen PNG utilizando la función
     imagecreatefromxbm()**

&lt;?php
// Carga del fichero XBM
$xbm = imagecreatefromxbm('./example.xbm');

// Se convierte en fichero PNG
imagepng($xbm, './example.png');
?&gt;

# imagecreatefromxpm

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

imagecreatefromxpm — Create a new image from file or URL

### Descripción

**imagecreatefromxpm**([string](#language.types.string) $filename): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**imagecreatefromxpm()** devuelve un identificador
de imagen que representa la imagen obtenida a partir del archivo
filename.

**Sugerencia**
Puede utilizar una URL como nombre de archivo con esta función, si el
[gestor fopen](#ini.allow-url-fopen) ha sido activado. Véase [fopen()](#function.fopen)
para más detalles sobre cómo especificar el nombre del archivo. Consulte
[Protocolos y Envolturas soportados](#wrappers) para más información sobre las capacidades de los diferentes gestores,
las notas sobre su uso, así como la información sobre las variables predefinidas que proporcionan.

### Parámetros

     filename


       Ruta de acceso a la imagen XPM.





### Valores devueltos

Returns an image object on success, **[false](#constant.false)** on errors.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage) ; anteriormente,
       se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Creación de una instancia de imagen utilizando la función
     imagecreatefromxpm()**

&lt;?php
// Verifica el soporte XPM
if(!(imagetypes() &amp; IMG_XPM))
{
die('El soporte XPM no ha podido ser verificado !');
}

// Creación de la instancia de una imagen
$xpm = imagecreatefromxpm('./example.xpm');

// Algunas operaciones sobre la imagen aquí

// PHP no tiene soporte para la escritura de imágenes XPM
// por lo tanto, en este caso, se guarda la imagen en un archivo JPEG
// con una calidad del 100%
imagejpeg($xpm, './example.jpg', 100);
?&gt;

# imagecreatetruecolor

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

imagecreatetruecolor — Crea una nueva imagen en colores verdaderos

### Descripción

**imagecreatetruecolor**([int](#language.types.integer) $width, [int](#language.types.integer) $height): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**imagecreatetruecolor()** devuelve un objeto
que representa una imagen negra.

### Parámetros

     width


       Ancho de la imagen.






     height


       Alto de la imagen.





### Valores devueltos

Returns an image object on success, **[false](#constant.false)** on errors.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage) ; anteriormente,
       se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1
     Creación de un flujo de imagen GD y visualización
    **

&lt;?php
header ('Content-Type: image/png');
$im = @imagecreatetruecolor(120, 20)
      or die('Imposible crear un flujo de imagen GD');
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, 'Una simple cadena de texto', $text_color);
imagepng($im);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: Creación de un nuevo flujo de imagen GD y salida de una imagen.](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagecreatetruecolor.png)


### Ver también

- [imagedestroy()](#function.imagedestroy) - Destruye una imagen

- [imagecreate()](#function.imagecreate) - Crea una nueva imagen con paleta

# imagecrop

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

imagecrop — Recorta una imagen en el rectángulo dado

### Descripción

**imagecrop**([GdImage](#class.gdimage) $image, [array](#language.types.array) $rectangle): [GdImage](#class.gdimage)|[false](#language.types.singleton)

    Recorta una imagen en la zona rectangular dada y devuelve la imagen

resultante. La image no se modifica.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

    rectangle


      [array](#language.types.array) que contiene las claves x,
      y, width y
      height.


### Valores devueltos

Devuelve el objeto de la imagen recortada en caso de
éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage); anteriormente,
       se devolvía un [resource](#language.types.resource).



### Ejemplos

**Ejemplo #1 Ejemplo con imagecrop()**

     Este ejemplo muestra cómo recortar una imagen en una zona cuadrada.

&lt;?php
$im = imagecreatefrompng('example.png');
$size = min(imagesx($im), imagesy($im));
$im2 = imagecrop($im, ['x' =&gt; 0, 'y' =&gt; 0, 'width' =&gt; $size, 'height' =&gt; $size]);
if ($im2 !== FALSE) {
    imagepng($im2, 'example-cropped.png');
}
?&gt;

### Ver también

- [imagecropauto()](#function.imagecropauto) - Recorta una imagen automáticamente utilizando uno de los modos disponibles

# imagecropauto

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

imagecropauto — Recorta una imagen automáticamente utilizando uno de los modos disponibles

### Descripción

**imagecropauto**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $mode = **[IMG_CROP_DEFAULT](#constant.img-crop-default)**,
    [float](#language.types.float) $threshold = 0.5,
    [int](#language.types.integer) $color = -1
): [GdImage](#class.gdimage)|[false](#language.types.singleton)

Recorta automáticamente una imagen según el mode.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

    mode


      Una constante entre:





       **[IMG_CROP_DEFAULT](#constant.img-crop-default)**


         Idéntico a **[IMG_CROP_TRANSPARENT](#constant.img-crop-transparent)**.
         Anterior a PHP 7.4.0, la biblioteca libgd integrada utilizaba
         **[IMG_CROP_SIDES](#constant.img-crop-sides)** como solución de respaldo,
         si la imagen no tenía color de transparencia.




       **[IMG_CROP_TRANSPARENT](#constant.img-crop-transparent)**


         Recorta el fondo transparente.




       **[IMG_CROP_BLACK](#constant.img-crop-black)**


         Recorta el fondo negro.




       **[IMG_CROP_WHITE](#constant.img-crop-white)**


         Recorta el fondo blanco.




       **[IMG_CROP_SIDES](#constant.img-crop-sides)**


         Utiliza las 4 esquinas de la imagen para intentar detectar el fondo
         a recortar.




       **[IMG_CROP_THRESHOLD](#constant.img-crop-threshold)**


         Recorta la imagen utilizando el umbral threshold y
         color.








    threshold


      Especifica la tolerancia en porcentaje a utilizar durante la comparación de
      la color de la imagen y la color a recortar. El método utilizado para
      calcular la diferencia de color se basa en la distancia de colores
      en el cubo RVB(a).




      Utilizado únicamente en modo **[IMG_CROP_THRESHOLD](#constant.img-crop-threshold)**.



     **Nota**:

       Anterior a PHP 7.4.0, la biblioteca libgd integrada utilizaba un algoritmo
       algo diferente, por lo que el mismo threshold producía
       resultados diferentes para libgd sistema e integrado.







    color


      Puede ser un valor de color RVB o un índice de paleta.




      Utilizado únicamente en modo **[IMG_CROP_THRESHOLD](#constant.img-crop-threshold)**.


### Valores devueltos

Devuelve el objeto de la imagen recortada en caso de éxito o **[false](#constant.false)** si ocurre un error.
**[false](#constant.false)** también será devuelto si toda la imagen ha sido recortada.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage); anteriormente,
       se devolvía un [resource](#language.types.resource).




      7.4.0

       El comportamiento de imagecropauto de la biblioteca libgd integrada ha sido
       sincronizado con la de libgd sistema: **[IMG_CROP_DEFAULT](#constant.img-crop-default)**
       ya no utiliza **[IMG_CROP_SIDES](#constant.img-crop-sides)** como solución de respaldo y
       la tolerancia de recorte utiliza ahora el mismo algoritmo que libgd sistema.




      7.4.0

       El valor por omisión de mode ha sido modificado a
       **[IMG_CROP_AUTO](#constant.img-crop-auto)**. Anteriormente, el valor por omisión era
       -1 que corresponde a **[IMG_CROP_DEFAULT](#constant.img-crop-default)**,
       pero pasar -1 está ahora obsoleto.



### Ejemplos

    **Ejemplo #1 Recorte automático correcto**



     Como se indica en la sección valor de retorno, **imagecropauto()**
     devuelve **[false](#constant.false)** si toda la imagen ha sido recortada. En este ejemplo, tenemos
     un objeto de imagen $im que solo debería ser
     automáticamente recortado si hay algo que recortar; de lo contrario,
     se desea conservar la imagen original.

&lt;?php
$cropped = imagecropauto($im, IMG_CROP_DEFAULT);
if ($cropped !== false) { // Si se ha devuelto un nuevo objeto de imagen
$im = $cropped; // y asigna la imagen recortada a $im
}
?&gt;

### Ver también

- [imagecrop()](#function.imagecrop) - Recorta una imagen en el rectángulo dado

# imagedashedline

(PHP 4, PHP 5, PHP 7, PHP 8)

imagedashedline — Dibuja una línea punteada

### Descripción

**imagedashedline**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $x1,
    [int](#language.types.integer) $y1,
    [int](#language.types.integer) $x2,
    [int](#language.types.integer) $y2,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

**imagedashedline()** está obsoleto. Se recomienda utilizar
una combinación de las funciones [imagesetstyle()](#function.imagesetstyle) y
[imageline()](#function.imageline).

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     x1


       Coordenada en X: En la parte superior, a la izquierda.






     y1


       Coordenada en Y: En la parte superior, a la izquierda. 0 es la esquina superior izquierda
       de la imagen.






     x2


       Coordenada en X: En la parte inferior, a la derecha.






     y2


       Coordenada en Y: En la parte inferior, a la derecha.






     color


       El color de relleno. A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagedashedline()**

&lt;?php
// Crea una imagen de 100x100 píxeles
$im = imagecreatetruecolor(100, 100);
$white = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);

// Dibuja una línea vertical punteada
imagedashedline($im, 50, 25, 50, 75, $white);

// Guarda la imagen
imagepng($im, './dashedline.png');
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagedashedline()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagedashedline.png)




    **Ejemplo #2 Alternativa a la función imagedashedline()**

&lt;?php
// Crea una imagen de 100x100 píxeles
$im = imagecreatetruecolor(100, 100);
$white = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);

// Define el estilo: Los 4 primeros píxeles son blancos y los 4 siguientes
// son transparentes. Esto va a crear el efecto de línea punteada
$style = Array(
$white,
$white,
$white,
$white,
IMG_COLOR_TRANSPARENT,
IMG_COLOR_TRANSPARENT,
IMG_COLOR_TRANSPARENT,
IMG_COLOR_TRANSPARENT
);

imagesetstyle($im, $style);

// Dibuja la línea punteada
imageline($im, 50, 25, 50, 75, IMG_COLOR_STYLED);

// Guarda la imagen
imagepng($im, './imageline.png');
?&gt;

### Ver también

- [imagesetstyle()](#function.imagesetstyle) - Configura el estilo para el dibujo de líneas

- [imageline()](#function.imageline) - Dibuja una línea

# imagedestroy

(PHP 4, PHP 5, PHP 7, PHP 8)

imagedestroy — Destruye una imagen

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.5.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**imagedestroy**([GdImage](#class.gdimage) $image): [bool](#language.types.boolean)

**Nota**:

Esta función no tiene ningún efecto. Anterior a PHP 8.0.0,
esta función era utilizada para cerrar un recurso.

Anterior a PHP 8.0.0, **imagedestroy()** liberaba toda la memoria
asociada a la recurso image. A partir de la versión 8.0.0,
la extensión GD utiliza objetos en lugar de recursos, y los objetos
no pueden ser cerrados explícitamente.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función es ahora un NOP.





8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Uso de imagedestroy()** anterior a PHP 8.0.0

&lt;?php
// Crea una imagen de 100 x 100 píxeles
$im = imagecreatetruecolor(100, 100);

// Modificación y/o guardado de la imagen

// Liberación de la memoria asociada
imagedestroy($im);
?&gt;

# imageellipse

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

imageellipse — Dibuja una elipse

### Descripción

**imageellipse**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $center_x,
    [int](#language.types.integer) $center_y,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

Dibuja una elipse centrada en el punto especificado.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     center_x


       X: coordenada del centro.






     center_y


       Y: coordenada del centro.






     width


       El ancho de la elipse.






     height


       La altura de la elipse.






     color


       El color de la elipse. A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imageellipse()**

&lt;?php
// Creación de una imagen vacía
$image = imagecreatetruecolor(400, 300);

// Selección del color de fondo
$bg = imagecolorallocate($image, 0, 0, 0);

// Rellena el fondo con el color seleccionado
imagefill($image, 0, 0, $bg);

// Selección del color de la elipse
$col_ellipse = imagecolorallocate($image, 255, 255, 255);

// Dibuja la elipse
imageellipse($image, 200, 150, 300, 200, $col_ellipse);

// Muestra la imagen
header("Content-type: image/png");
imagepng($image);

?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imageellipse()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imageellipse.png)


### Notas

**Nota**:

    **imageellipse()** ignora [imagesetthickness()](#function.imagesetthickness).

### Ver también

- [imagefilledellipse()](#function.imagefilledellipse) - Dibuja una elipse llena

- [imagearc()](#function.imagearc) - Dibuja una elipse parcial

# imagefill

(PHP 4, PHP 5, PHP 7, PHP 8)

imagefill — Relleno

### Descripción

**imagefill**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

Realiza un relleno con el color color,
en la imagen image, a partir del punto de
coordenadas (x, y)
(la esquina superior izquierda es el origen (0,0)).

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     x


       X: coordenada del punto de inicio.






     y


       Y: coordenada del punto de inicio.






     color


       El color de relleno. A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagefill()**

&lt;?php

$im = imagecreatetruecolor(100, 100);

// Establece el fondo rojo
$red = imagecolorallocate($im, 255, 0, 0);
imagefill($im, 0, 0, $red);

header('Content-type: image/png');
imagepng($im);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagefill()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagefill.png)


### Ver también

- [imagecolorallocate()](#function.imagecolorallocate) - Asigna una coloración para una imagen

# imagefilledarc

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

imagefilledarc — Dibuja un arco parcial y lo rellena

### Descripción

**imagefilledarc**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $center_x,
    [int](#language.types.integer) $center_y,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $start_angle,
    [int](#language.types.integer) $end_angle,
    [int](#language.types.integer) $color,
    [int](#language.types.integer) $style
): [bool](#language.types.boolean)

Dibuja un arco parcial, centrado en las coordenadas especificadas en
la imagen proporcionada.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     center_x


       X: coordenada del centro.






     center_y


       Y: coordenada del centro.






     width


       El ancho del arco.






     height


       La altura del arco.






     start_angle


       El ángulo de inicio del arco, en grados.






     end_angle


       El ángulo de fin del arco, en grados.
       0° se encuentra en la posición de las 3 en punto en un reloj, y
       el arco se dibuja en el sentido de las agujas del reloj.






     color


       A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).






     style


       Un campo de bytes, combinado con el operador OR:



        - **[IMG_ARC_PIE](#constant.img-arc-pie)**

        - **[IMG_ARC_CHORD](#constant.img-arc-chord)**

        - **[IMG_ARC_NOFILL](#constant.img-arc-nofill)**

        - **[IMG_ARC_EDGED](#constant.img-arc-edged)**


       **[IMG_ARC_PIE](#constant.img-arc-pie)** y **[IMG_ARC_CHORD](#constant.img-arc-chord)** son
       mutuamente excluyentes; **[IMG_ARC_CHORD](#constant.img-arc-chord)** solo conecta
       los ángulos de inicio y fin con una línea recta, mientras que
       **[IMG_ARC_PIE](#constant.img-arc-pie)** produce una línea curva.
       **[IMG_ARC_NOFILL](#constant.img-arc-nofill)** indica que el arco (o cuerda) debe ser
       dibujado pero no rellenado. **[IMG_ARC_EDGED](#constant.img-arc-edged)**, usado junto
       con **[IMG_ARC_NOFILL](#constant.img-arc-nofill)**, indica que los ángulos de
       inicio y fin deben ser conectados al centro. Esta función es recomendada
       para crear gráficos de tipo pastel.



### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Creación de un gráfico de pastel en 3D**

&lt;?php

// Creación de la imagen
$image = imagecreatetruecolor(100, 100);

// Asignación de algunas colores
$white    = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
$gray     = imagecolorallocate($image, 0xC0, 0xC0, 0xC0);
$darkgray = imagecolorallocate($image, 0x90, 0x90, 0x90);
$navy     = imagecolorallocate($image, 0x00, 0x00, 0x80);
$darknavy = imagecolorallocate($image, 0x00, 0x00, 0x50);
$red      = imagecolorallocate($image, 0xFF, 0x00, 0x00);
$darkred  = imagecolorallocate($image, 0x90, 0x00, 0x00);

// Creación del efecto 3D
for ($i = 60; $i &gt; 50; $i--) {
   imagefilledarc($image, 50, $i, 100, 50, 0, 45, $darknavy, IMG_ARC_PIE);
   imagefilledarc($image, 50, $i, 100, 50, 45, 75 , $darkgray, IMG_ARC_PIE);
   imagefilledarc($image, 50, $i, 100, 50, 75, 360 , $darkred, IMG_ARC_PIE);
}

imagefilledarc($image, 50, 50, 100, 50, 0, 45, $navy, IMG_ARC_PIE);
imagefilledarc($image, 50, 50, 100, 50, 45, 75 , $gray, IMG_ARC_PIE);
imagefilledarc($image, 50, 50, 100, 50, 75, 360 , $red, IMG_ARC_PIE);

// Mostrar la imagen
header('Content-type: image/png');
imagepng($image);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: Creación de un gráfico 3D](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagefilledarc.png)


# imagefilledellipse

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

imagefilledellipse — Dibuja una elipse llena

### Descripción

**imagefilledellipse**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $center_x,
    [int](#language.types.integer) $center_y,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

Dibuja una elipse centrada en las coordenadas especificadas sobre la imagen proporcionada.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     center_x


       X: coordenada del centro.






     center_y


       Y: coordenada del centro.






     width


       El ancho de la elipse.






     height


       La altura de la elipse.






     color


       El color de relleno. A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagefilledellipse()**

&lt;?php

// Nueva imagen
$image = imagecreatetruecolor(400, 300);

// Color de fondo
$bg = imagecolorallocate($image, 0, 0, 0);

// Color de relleno de la elipse
$col_ellipse = imagecolorallocate($image, 255, 255, 255);

// Se dibuja la elipse blanca
imagefilledellipse($image, 200, 150, 300, 200, $col_ellipse);

// Se muestra la imagen
header("Content-type: image/png");
imagepng($image);

?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagefilledellipse()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagefilledellipse.png)


### Notas

**Nota**:

    **imagefilledellipse()** ignora [imagesetthickness()](#function.imagesetthickness).

### Ver también

- [imageellipse()](#function.imageellipse) - Dibuja una elipse

- [imagefilledarc()](#function.imagefilledarc) - Dibuja un arco parcial y lo rellena

# imagefilledpolygon

(PHP 4, PHP 5, PHP 7, PHP 8)

imagefilledpolygon — Dibuja un polígono relleno

### Descripción

Firma a partir de PHP 8.0.0 (no soportada con argumentos nombrados)

**imagefilledpolygon**([GdImage](#class.gdimage) $image, [array](#language.types.array) $points, [int](#language.types.integer) $color): [bool](#language.types.boolean)

Firma alternativa (obsoleta a partir de PHP 8.1.0)

**imagefilledpolygon**(
    [GdImage](#class.gdimage) $image,
    [array](#language.types.array) $points,
    [int](#language.types.integer) $num_points,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

**imagefilledpolygon()** dibuja un polígono relleno en la imagen
image.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     points


       Un array que contiene las coordenadas
       x y y
       del vértice de los polígonos.






     num_points


       Número total de puntos (vértices), que deben ser al menos 3.




       Si este parámetro es omitido conforme a la segunda firma,
       points debe tener un número par de elementos, y
       num_points se asume como count($points)/2.




     color


       A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       El parámetro num_points ha sido marcado como obsoleto.





8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagefilledpolygon()**

&lt;?php
// Definición del array de puntos para el polígono
$values = array(
40, 50, // Punto 1 (x, y)
20, 240, // Punto 2 (x, y)
60, 60, // Punto 3 (x, y)
240, 20, // Punto 4 (x, y)
50, 40, // Punto 5 (x, y)
10, 10 // Punto 6 (x, y)
);

// Creación de una imagen
$image = imagecreatetruecolor(250, 250);

// Asignación de algunos colores
$bg   = imagecolorallocate($image, 0, 0, 0);
$blue = imagecolorallocate($image, 0, 0, 255);

// Relleno del fondo
imagefilledrectangle($image, 0, 0, 249, 249, $bg);

// Dibujo del polígono
imagefilledpolygon($image, $values, $blue);

// Visualización de la imagen
header('Content-type: image/png');
imagepng($image);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagefilledpolygon()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagefilledpolygon.png)


### Ver también

- [imagepolygon()](#function.imagepolygon) - Dibuja un polígono

# imagefilledrectangle

(PHP 4, PHP 5, PHP 7, PHP 8)

imagefilledrectangle — Dibuja un rectángulo relleno

### Descripción

**imagefilledrectangle**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $x1,
    [int](#language.types.integer) $y1,
    [int](#language.types.integer) $x2,
    [int](#language.types.integer) $y2,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

Dibuja un rectángulo de color color en la imagen
image, comenzando por el vértice superior
izquierdo (1) y finalizando en el vértice inferior derecho (2). La esquina superior izquierda es
el origen (0, 0).

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     x1


       X: coordenada del punto 1.






     y1


       Y: coordenada del punto 1.






     x2


       X: coordenada del punto 2.






     y2


       Y: coordenada del punto 2.






     color


       El color de relleno. A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagefilledrectangle()**

&lt;?php
// Creación de una imagen de 55x30 píxeles
$im = imagecreatetruecolor(55, 30);
$white = imagecolorallocate($im, 255, 255, 255);

// Dibuja un rectángulo blanco
imagefilledrectangle($im, 4, 4, 50, 25, $white);

// Guarda la imagen
imagepng($im, './imagefilledrectangle.png');
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagefilledrectangle()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagefilledrectangle.png)


# imagefilltoborder

(PHP 4, PHP 5, PHP 7, PHP 8)

imagefilltoborder — Rellena una región con un color específico

### Descripción

**imagefilltoborder**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $border_color,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

**imagefilltoborder()** rellena con el color
color toda la región dentro de
la región limitada por el color border_color.
El punto de partida es (x,
y) (la esquina superior izquierda es el origen
(0,0)) y el color de la región es color.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     x


       X: coordenada de inicio.






     y


       Y: coordenada de inicio.






     border_color


       El color del borde. A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).






     color


       El color de relleno. A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Relleno de una elipse con un color**

&lt;?php
// Creación de un gestor de imagen, luego define el color de fondo
// a blanco
$im = imagecreatetruecolor(100, 100);
imagefilledrectangle($im, 0, 0, 100, 100, imagecolorallocate($im, 255, 255, 255));

// Dibuja una elipse cuyos bordes serán negros
imageellipse($im, 50, 50, 50, 50, imagecolorallocate($im, 0, 0, 0));

// Define el borde y rellena la elipse del color elegido
$border = imagecolorallocate($im, 0, 0, 0);
$fill = imagecolorallocate($im, 255, 0, 0);

// Rellena la selección
imagefilltoborder($im, 50, 50, $border, $fill);

// Visualización y liberación de la memoria
header('Content-type: image/png');
imagepng($im);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagefilltoborder()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagefilltoborder.png)


### Notas

El algoritmo no recuerda explícitamente qué píxeles ya han
sido definidos, sino que lo infiere a partir del color del
píxel, por lo que no puede distinguir entre un píxel que
acaba de ser definido y un píxel que ya estaba presente.
Esto significa que elegir cualquier color de relleno que ya
esté presente en la imagen puede producir resultados no deseados.

# imagefilter

(PHP 5, PHP 7, PHP 8)

imagefilter — Aplica un filtro a una imagen

### Descripción

**imagefilter**([GdImage](#class.gdimage) $image, [int](#language.types.integer) $filter, [array](#language.types.array)|[int](#language.types.integer)|[float](#language.types.float)|[bool](#language.types.boolean) ...$args): [bool](#language.types.boolean)

**imagefilter()** aplica el filtro dado
filter sobre la image.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     filter


       filter puede ser uno de los siguientes:



        -

          **[IMG_FILTER_NEGATE](#constant.img-filter-negate)** : Invierte todos los colores de
          la imagen.



        -

          **[IMG_FILTER_GRAYSCALE](#constant.img-filter-grayscale)** : Convierte la imagen a
          niveles de gris cambiando las componentes roja, verde y azul a su
          suma ponderada utilizando los mismos coeficientes que el cálculo luma REC.601 (Y').
          Las componentes alfa se conservan. Para imágenes de paleta, el
          resultado puede ser diferente debido a las limitaciones de la paleta.



        -

          **[IMG_FILTER_BRIGHTNESS](#constant.img-filter-brightness)** : Modifica el brillo
          de la imagen. Utilice args para definir el nivel de
          brillo. El rango de brillo está entre -255 y 255.



        -

          **[IMG_FILTER_CONTRAST](#constant.img-filter-contrast)** : Modifica el contraste de
          la imagen. Utilice args para definir el nivel de
          contraste.



        -

          **[IMG_FILTER_COLORIZE](#constant.img-filter-colorize)** : similar a
          **[IMG_FILTER_GRAYSCALE](#constant.img-filter-grayscale)**, excepto que es posible especificar el
          color. Utilice args, arg2 y
          arg3 en forma de
          red, green,
          blue y arg4 para el canal
          alpha. El rango de cada color está entre 0 y 255.



        -

          **[IMG_FILTER_EDGEDETECT](#constant.img-filter-edgedetect)** : Utiliza la detección de bordes para
          resaltar los bordes de la imagen.



        -

          **[IMG_FILTER_EMBOSS](#constant.img-filter-emboss)** : Permite embosar la imagen.



        -

          **[IMG_FILTER_GAUSSIAN_BLUR](#constant.img-filter-gaussian-blur)** : Desenfoca la imagen utilizando el
          método gaussiano.



        -

          **[IMG_FILTER_SELECTIVE_BLUR](#constant.img-filter-selective-blur)** : Desenfoca la imagen.



        -

          **[IMG_FILTER_MEAN_REMOVAL](#constant.img-filter-mean-removal)** : Utiliza la supresión de la media
          para obtener un efecto "croquis".



        -

          **[IMG_FILTER_SMOOTH](#constant.img-filter-smooth)** : Hace la imagen más suave.
          Utilice args para definir el nivel de suavizado.



        -

          **[IMG_FILTER_PIXELATE](#constant.img-filter-pixelate)** : Aplica un efecto de pixeles a
          la imagen, utilice args para definir el tamaño del bloque
          y arg2 para definir el modo de efecto de pixeles.



        -

          **[IMG_FILTER_SCATTER](#constant.img-filter-scatter)** : Aplica un efecto de dispersión
          a la imagen, utilice args y
          arg2 para definir la intensidad del efecto y
          arg3 para aplicar el efecto solo
          sobre ciertos colores de píxeles.








     args





        -

          **[IMG_FILTER_BRIGHTNESS](#constant.img-filter-brightness)** : Nivel de brillo.



        -

          **[IMG_FILTER_CONTRAST](#constant.img-filter-contrast)** : Nivel de contraste.



        -

          **[IMG_FILTER_COLORIZE](#constant.img-filter-colorize)** : Value of red component.



        -

          **[IMG_FILTER_SMOOTH](#constant.img-filter-smooth)** : Nivel de suavizado.



        -

          **[IMG_FILTER_PIXELATE](#constant.img-filter-pixelate)** : Tamaño del bloque en píxeles.



        -

          **[IMG_FILTER_SCATTER](#constant.img-filter-scatter)** : Nivel de sustracción del efecto.
          No debe ser superior o igual al nivel de adición definido con
          arg2.








     arg2





        -

          **[IMG_FILTER_COLORIZE](#constant.img-filter-colorize)** : Value of green component.



        -

          **[IMG_FILTER_PIXELATE](#constant.img-filter-pixelate)** : Uso o no del efecto de pixeles
          avanzado (el valor por omisión es **[false](#constant.false)**).



        -

          **[IMG_FILTER_SCATTER](#constant.img-filter-scatter)** : Nivel de adición del efecto.








     arg3





        -

          **[IMG_FILTER_COLORIZE](#constant.img-filter-colorize)** : Value of blue component.



        -

          **[IMG_FILTER_SCATTER](#constant.img-filter-scatter)** : Array opcional de valores de color indexados
          para aplicar el efecto.








     arg4





        -

          **[IMG_FILTER_COLORIZE](#constant.img-filter-colorize)** canal Alpha, un valor
          entre 0 y 127. 0 indica opacidad total mientras que 127 indica transparencia total.







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Genera un [ValueError](#class.valueerror)
si sub o plus provoca un desbordamiento o
un subdesbordamiento con el **[IMG_FILTER_SCATTER](#constant.img-filter-scatter)** filter.

### Historial de cambios

       Versión
       Descripción






       8.4.0

        Genera ahora un [ValueError](#class.valueerror)
        si sub o plus provoca un desbordamiento o
        un subdesbordamiento con el **[IMG_FILTER_SCATTER](#constant.img-filter-scatter)** filter.





8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

       7.4.0

        Se añadió el soporte para la dispersión (**[IMG_FILTER_SCATTER](#constant.img-filter-scatter)**).





### Ejemplos

    **Ejemplo #1 Ejemplo de niveles de gris con imagefilter()**

&lt;?php
$im = imagecreatefrompng('dave.png');

if($im &amp;&amp; imagefilter($im, IMG_FILTER_GRAYSCALE))
{
echo 'Imagen convertida a escala de grises.';

    imagepng($im, 'dave.png');

}
else
{
echo 'Conversión a escala de grises fallida.';
}
?&gt;

    **Ejemplo #2 Ejemplo de brillo con imagefilter()**

&lt;?php
$im = imagecreatefrompng('sean.png');

if($im &amp;&amp; imagefilter($im, IMG_FILTER_BRIGHTNESS, 20))
{
echo 'Brillo de la imagen cambiado.';

    imagepng($im, 'sean.png');

}
else
{
echo 'Cambio de brillo fallido.';
}
?&gt;

    **Ejemplo #3 Ejemplo de colorización con imagefilter()**

&lt;?php
$im = imagecreatefrompng('philip.png');

/_ R, G, B, así que 0, 255, 0 es verde _/
if($im &amp;&amp; imagefilter($im, IMG_FILTER_COLORIZE, 0, 255, 0))
{
echo 'Imagen teñida de verde con éxito.';

    imagepng($im, 'philip.png');

}
else
{
echo 'Teñido de verde fallido.';
}
?&gt;

    **Ejemplo #4 Ejemplo de negativo con imagefilter()**

&lt;?php
// Define la función negate para que sea portable para
// versiones de php sin imagefilter()
function negate($im)
{
    if(function_exists('imagefilter'))
    {
        return imagefilter($im, IMG_FILTER_NEGATE);
}

    for($x = 0; $x &lt; imagesx($im); ++$x)
    {
        for($y = 0; $y &lt; imagesy($im); ++$y)
        {
            $index = imagecolorat($im, $x, $y);
            $rgb = imagecolorsforindex($index);
            $color = imagecolorallocate($im, 255 - $rgb['red'], 255 - $rgb['green'], 255 - $rgb['blue']);

            imagesetpixel($im, $x, $y, $color);
        }
    }

    return(true);

}

$im = imagecreatefromjpeg('kalle.jpg');

if($im &amp;&amp; negate($im))
{
echo 'Imagen convertida a colores negativos con éxito.';

    imagejpeg($im, 'kalle.jpg', 100);

}
else
{
echo 'Conversión a colores negativos fallida.';
}
?&gt;

    **Ejemplo #5 Ejemplo de pixeles con imagefilter()**

&lt;?php
// Carga el logo PHP, debemos crear dos instancias
// para ver las diferencias
$logo1 = imagecreatefrompng('./php.png');
$logo2 = imagecreatefrompng('./php.png');

// Creación de la instancia de imagen sobre la cual queremos
// ver las diferencias
$output = imagecreatetruecolor(imagesx($logo1) \* 2, imagesy($logo1));

// Aplica el efecto de pixeles a cada instancia con un
// tamaño de bloque de 3
imagefilter($logo1, IMG_FILTER_PIXELATE, 3);
imagefilter($logo2, IMG_FILTER_PIXELATE, 3, true);

// Fusiona las diferencias sobre la imagen de salida
imagecopy($output, $logo1, 0, 0, 0, 0, imagesx($logo1) - 1, imagesy($logo1) - 1);
imagecopy($output, $logo2, imagesx($logo2), 0, 0, 0, imagesx($logo2) - 1, imagesy($logo2) - 1);

// Muestra las diferencias
header('Content-Type: image/png');
imagepng($output);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Salida del ejemplo de pixeles con imagefilter](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagefilterpixelate.png)








    **Ejemplo #6 Ejemplo de dispersión con imagefilter()**

&lt;?php
// Carga la imagen
$logo = imagecreatefrompng('./php.png');

// Aplica un efecto de dispersión muy suave a la imagen
imagefilter($logo, IMG_FILTER_SCATTER, 3, 5);

// Muestra la imagen con el efecto de dispersión
header('Content-Type: image/png');
imagepng($logo);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Salida del ejemplo de dispersión con imagefilter](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-scatter.png)


### Notas

**Nota**:

    El resultado de **[IMG_FILTER_SCATTER](#constant.img-filter-scatter)** siempre es aleatorio.

### Ver también

- [imageconvolution()](#function.imageconvolution) - Aplica una matriz de convolución 3x3, utilizando el coeficiente y el desplazamiento

# imageflip

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

imageflip — Devuelve una imagen utilizando el modo proporcionado

### Descripción

**imageflip**([GdImage](#class.gdimage) $image, [int](#language.types.integer) $mode): [bool](#language.types.boolean)

Devuelve la imagen image utilizando el
mode proporcionado.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     mode


       Modo de volteo; puede ser una de las constantes **[IMG_FLIP_*](#constant.img-flip-vertical)**:










           Constante
           Significado






           **[IMG_FLIP_HORIZONTAL](#constant.img-flip-horizontal)**

            Voltea la imagen horizontalmente.




           **[IMG_FLIP_VERTICAL](#constant.img-flip-vertical)**

            Voltea la imagen verticalmente.




           **[IMG_FLIP_BOTH](#constant.img-flip-both)**

            Voltea la imagen tanto horizontal como verticalmente.










### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Voltear una imagen verticalmente**



     Este ejemplo utiliza la constante **[IMG_FLIP_VERTICAL](#constant.img-flip-vertical)**.

&lt;?php
// Archivo
$filename = 'phplogo.png';

// Tipo de contenido
header('Content-type: image/png');

// Carga
$im = imagecreatefrompng($filename);

// Volteo vertical
imageflip($im, IMG_FLIP_VERTICAL);

// Mostrar
imagejpeg($im);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Salida del ejemplo: Imagen volteada verticalmente](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imageflipvertical.png)








    **Ejemplo #2 Voltear una imagen horizontalmente**



     Este ejemplo utiliza la constante **[IMG_FLIP_HORIZONTAL](#constant.img-flip-horizontal)**.

&lt;?php
// Archivo
$filename = 'phplogo.png';

// Tipo de contenido
header('Content-type: image/png');

// Carga
$im = imagecreatefrompng($filename);

// Volteo horizontal
imageflip($im, IMG_FLIP_HORIZONTAL);

// Mostrar
imagejpeg($im);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Salida del ejemplo: Imagen volteada horizontalmente](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagefliphorizontal.png)


# imagefontheight

(PHP 4, PHP 5, PHP 7, PHP 8)

imagefontheight — Devuelve la altura de la fuente

### Descripción

**imagefontheight**([GdFont](#class.gdfont)|[int](#language.types.integer) $font): [int](#language.types.integer)

Devuelve la altura de la fuente font en píxeles.

### Parámetros

font
Puede ser 1, 2, 3, 4, 5 para las fuentes internas de codificación Latin2
(donde los números más grandes corresponden a fuentes anchas) o una instancia
de [GdFont](#class.gdfont) retornado por [imageloadfont()](#function.imageloadfont).

### Valores devueltos

Devuelve la altura de la fuente, en píxeles.

### Historial de cambios

       Versión
       Descripción







8.1.0

El parámetro font ahora acepta una instancia de [GdFont](#class.gdfont)
y un [int](#language.types.integer); anteriormente solo un [int](#language.types.integer) era aceptado.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagefontheight()** y fuentes internas

&lt;?php
echo 'Altura de la fuente : ' . imagefontheight(4);
?&gt;

    Resultado del ejemplo anterior es similar a:

Altura de la fuente : 16

    **Ejemplo #2 Ejemplo con imagefontheight()** y [imageloadfont()](#function.imageloadfont)

&lt;?php
// Carga de una fuente .gdf
$font = imageloadfont('anonymous.gdf');

echo 'Altura de la fuente : ' . imagefontheight($font);
?&gt;

    Resultado del ejemplo anterior es similar a:

Altura de la fuente : 43

### Ver también

- [imagefontwidth()](#function.imagefontwidth) - Devuelve el ancho de la fuente

- [imageloadfont()](#function.imageloadfont) - Carga una nueva fuente

# imagefontwidth

(PHP 4, PHP 5, PHP 7, PHP 8)

imagefontwidth — Devuelve el ancho de la fuente

### Descripción

**imagefontwidth**([GdFont](#class.gdfont)|[int](#language.types.integer) $font): [int](#language.types.integer)

Devuelve el ancho de la fuente font en píxeles.

### Parámetros

font
Puede ser 1, 2, 3, 4, 5 para las fuentes internas de codificación Latin2
(donde los números más grandes corresponden a fuentes anchas) o una instancia
de [GdFont](#class.gdfont) retornado por [imageloadfont()](#function.imageloadfont).

### Valores devueltos

Devuelve el ancho de la fuente.

### Historial de cambios

       Versión
       Descripción







8.1.0

El parámetro font ahora acepta una instancia de [GdFont](#class.gdfont)
y un [int](#language.types.integer); anteriormente solo un [int](#language.types.integer) era aceptado.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagefontwidth()** y las fuentes internas

&lt;?php
echo 'Ancho de la fuente : ' . imagefontwidth(4);
?&gt;

    Resultado del ejemplo anterior es similar a:

Ancho de la fuente : 8

    **Ejemplo #2 Ejemplo con imagefontwidth()** y [imageloadfont()](#function.imageloadfont)

&lt;?php
// Carga de una fuente .gdf
$font = imageloadfont('anonymous.gdf');

echo 'Ancho de la fuente : ' . imagefontwidth($font);
?&gt;

    Resultado del ejemplo anterior es similar a:

Ancho de la fuente : 23

### Ver también

- [imagefontheight()](#function.imagefontheight) - Devuelve la altura de la fuente

- [imageloadfont()](#function.imageloadfont) - Carga una nueva fuente

# imageftbbox

(PHP 4 &gt;= 4.0.7, PHP 5, PHP 7, PHP 8)

imageftbbox — Calcula el rectángulo de delimitación para un texto, utilizando la fuente actual y freetype2

### Descripción

**imageftbbox**(
    [float](#language.types.float) $size,
    [float](#language.types.float) $angle,
    [string](#language.types.string) $font_filename,
    [string](#language.types.string) $string,
    [array](#language.types.array) $options = []
): [array](#language.types.array)|[false](#language.types.singleton)

**imageftbbox()** calcula el rectángulo de delimitación
para el texto text, utilizando la fuente
actual y freetype2.

**Nota**:

    Anterior a PHP 8.0.0, **imageftbbox()** era una variante
    extendida de [imagettfbbox()](#function.imagettfbbox) que además soporta
    extrainfo.
    A partir de PHP 8.0.0, [imagettfbbox()](#function.imagettfbbox) es un alias de
    **imageftbbox()**.

### Parámetros

     size

      The font size in points.





     angle


       Ángulo, en grados, en el cual el parámetro string
       será medido.






     font_filename


       El nombre del archivo de la fuente TrueType (puede ser una URL).
       Dependiendo de la versión de GD utilizada por PHP, se buscarán
       los archivos que no comiencen con un '/', añadiendo la extensión
       '.ttf', y siguiendo la ruta de fuentes definida por la biblioteca.






     string


       La cadena a medir.






     options





       <caption>**Índices posibles para el array options**</caption>



           Clave
           Tipo
           Significado






           linespacing
           [float](#language.types.float)
           Representa el espaciado entre líneas al dibujar









### Valores devueltos

**imageftbbox()** devuelve un array que contiene 8 elementos
representando los 4 puntos del rectángulo que rodea el texto:

       0
       Esquina inferior izquierda, posición en X



       1
       Esquina inferior izquierda, posición en Y



       2
       Esquina inferior derecha, posición en X



       3
       Esquina inferior derecha, posición en Y



       4
       Esquina superior derecha, posición en X



       5
       Esquina superior derecha, posición en Y



       6
       Esquina superior izquierda, posición en X



       7
       Esquina superior izquierda, posición en Y




Los puntos son relativos al _texto_ según el parámetro
angle, por lo que "arriba a la izquierda" significa la esquina en
la parte superior izquierda cuando se mira el texto horizontalmente.

En caso de error, se devuelve **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con imageftbbox()**

&lt;?php
// Creación de una imagen de 300x150 píxeles
$im = imagecreatetruecolor(300, 150);
$black = imagecolorallocate($im, 0, 0, 0);
$white = imagecolorallocate($im, 255, 255, 255);

// Define el fondo en blanco
imagefilledrectangle($im, 0, 0, 299, 299, $white);

// Ruta hacia nuestro archivo de fuente
$font = './arial.ttf';

// Primero, creamos un rectángulo que contenga nuestro texto
$bbox = imageftbbox(10, 0, $font, 'The PHP Documentation Group');

// Nuestras coordenadas en X y en Y
$x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) - 5;
$y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 5;

imagefttext($im, 10, 0, $x, $y, $black, $font, 'The PHP Documentation Group');

// Muestra hacia el navegador
header('Content-Type: image/png');

imagepng($im);
?&gt;

### Notas

**Nota**: Esta función solo está disponible si
si PHP es compilado con soporte Freetype (**--with-freetype-dir=DIR**)

### Ver también

- [imagefttext()](#function.imagefttext) - Escribe texto en una imagen con la fuente actual FreeType 2

- [imagettfbbox()](#function.imagettfbbox) - Devuelve el rectángulo que rodea un texto dibujado con una fuente TrueType

# imagefttext

(PHP 4 &gt;= 4.0.7, PHP 5, PHP 7, PHP 8)

imagefttext — Escribe texto en una imagen con la fuente actual FreeType 2

### Descripción

**imagefttext**(
    [GdImage](#class.gdimage) $image,
    [float](#language.types.float) $size,
    [float](#language.types.float) $angle,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $color,
    [string](#language.types.string) $font_filename,
    [string](#language.types.string) $text,
    [array](#language.types.array) $options = []
): [array](#language.types.array)|[false](#language.types.singleton)

**Nota**:

    Antes de PHP 8.0.0, **imagefttext()** era una variante
    extendida de [imagettftext()](#function.imagettftext) que además soporta
    extrainfo.
    A partir de PHP 8.0.0, **imagefttext()** es un alias de
    **imagefttext()**.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     size


       El tamaño de la fuente a utilizar, en número de puntos.






     angle


       El ángulo, en grados; 0 grados para una lectura del texto de izquierda a derecha.
       Los grandes valores representan una rotación en el sentido de las agujas
       de un reloj. Por ejemplo, un valor de 90 tendrá como efecto leer el
       texto de abajo hacia arriba.






     x


       Las coordenadas, proporcionadas por x y
       y definen el punto de inicio del
       primer carácter (y más precisamente, la esquina en la parte inferior
       izquierda del carácter). Este es un comportamiento diferente de la función
       [imagestring()](#function.imagestring), donde x
       y y definen la esquina superior, a la izquierda
       del primer carácter. Por ejemplo, en la parte superior izquierda vale
       0, 0.






     y


       La ordenada y-ordinate. Este parámetro configura la
       posición base de la fuente, y no la parte inferior de esta última.






     color


       El índice del color deseado para el texto, ver
       la función [imagecolorexact()](#function.imagecolorexact).






     font_filename


       La ruta hacia la fuente TrueType a utilizar.




       Dependiendo de la versión de GD utilizada por PHP, se buscarán los
       ficheros *que no comienzan con un '/', añadiendo
       la extensión '.ttf'*, y siguiendo la ruta de las
       fuentes definida por la biblioteca.




       En la mayoría de los casos, cuando la fuente se encuentra en el mismo directorio
       que el script que intenta utilizarla, la siguiente solución permite
       evitar todos los problemas relativos a la inclusión.


&lt;?php
// Define la variable de entorno para GD
putenv('GDFONTPATH=' . realpath('.'));

// Nombre de la fuente a utilizar (nota que no hay extensión .ttf)
$font = 'SomeFont';
?&gt;

     text


       El texto a insertar en la imagen.






     options





       <caption>**Índices posibles para el array options**</caption>



           Clave
           Tipo
           Significado






           linespacing
           [float](#language.types.float)
           Define el espaciado entre líneas al dibujar









### Valores devueltos

Esta función devuelve un array que define los 4 puntos de una caja, comenzando
por la esquina inferior, a la izquierda, luego, los siguientes, en el sentido
de las agujas de un reloj:

       0
       x : coordenada en la parte inferior, a la izquierda



       1
       y : coordenada en la parte inferior, a la izquierda



       2
       x : coordenada en la parte inferior, a la derecha



       3
       y : coordenada en la parte inferior, a la derecha



       4
       x : coordenada en la parte superior, a la derecha



       5
       y : coordenada en la parte superior, a la derecha



       6
       x : coordenada en la parte superior, a la izquierda



       7
       y : coordenada en la parte superior, a la izquierda




En caso de error, **[false](#constant.false)** es devuelto.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagefttext()**

&lt;?php
// Creación de una imagen de 300x100 píxeles
$im = imagecreatetruecolor(300, 100);
$red = imagecolorallocate($im, 0xFF, 0x00, 0x00);
$black = imagecolorallocate($im, 0x00, 0x00, 0x00);

// Define el fondo en rojo
imagefilledrectangle($im, 0, 0, 299, 99, $red);

// Ruta hacia nuestro fichero de fuente ttf
$font_file = './arial.ttf';

// Dibuja el texto 'PHP Manual' utilizando una fuente de tamaño 13
imagefttext($im, 13, 0, 105, 55, $black, $font_file, 'PHP Manual');

// Muestra la imagen en el navegador
header('Content-Type: image/png');

imagepng($im);
?&gt;

### Notas

**Nota**: Esta función solo está disponible si
si PHP es compilado con soporte Freetype (**--with-freetype-dir=DIR**)

### Ver también

- [imageftbbox()](#function.imageftbbox) - Calcula el rectángulo de delimitación para un texto, utilizando la fuente actual y freetype2

- [imagettftext()](#function.imagettftext) - Dibuja un texto con una fuente TrueType

# imagegammacorrect

(PHP 4, PHP 5, PHP 7, PHP 8)

imagegammacorrect — Aplica una corrección gamma a la imagen GD

### Descripción

**imagegammacorrect**([GdImage](#class.gdimage) $image, [float](#language.types.float) $input_gamma, [float](#language.types.float) $output_gamma): [bool](#language.types.boolean)

Aplica una corrección gamma a la imagen GD image.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     input_gamma


       El factor gamma de entrada.






     output_gamma


       El factor gamma de salida.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagegammacorrect()**

&lt;?php
// Creación de una imagen
$im = imagecreatefromgif('php.gif');

// Corrección gamma, salida a 1.537
imagegammacorrect($im, 1.0, 1.537);

// Guardado y liberación de la memoria
imagegif($im, './php_gamma_corrected.gif');
?&gt;

# imagegd

(PHP 4 &gt;= 4.0.7, PHP 5, PHP 7, PHP 8)

imagegd — Genera una imagen en formato GD, hacia el navegador o un fichero

### Descripción

**imagegd**([GdImage](#class.gdimage) $image, [?](#language.types.null)[string](#language.types.string) $file = **[null](#constant.null)**): [bool](#language.types.boolean)

Genera o guarda el fichero file en formato GD.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     file

      The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or **[null](#constant.null)**, the raw image stream will be output directly.




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Precaución**However, if libgd fails to output the image, this function returns **[true](#constant.true)**.

### Historial de cambios

       Versión
       Descripción






       8.0.3

        file ahora es nullable.





8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

       7.2.0

        **imagegd()** ahora permite producir imágenes
        TrueColor. Anteriormente, eran convertidas implícitamente a paleta.





### Ejemplos

    **Ejemplo #1 Mostrar una imagen GD**

&lt;?php
// Creación de una imagen vacía y adición de texto
$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, "Un texto simple", $text_color);

// Mostrar la imagen
imagegd($im);

?&gt;

    **Ejemplo #2 Guardar una imagen GD**

&lt;?php
// Creación de una imagen vacía y adición de texto
$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, "Un texto simple", $text_color);

// Guardar la imagen GD
// El formato de fichero para imágenes GD es .gd, ver http://www.libgd.org/GdFileFormats
imagegd($im, 'simple.gd');

?&gt;

### Notas

**Nota**:

    El formato GD se utiliza comúnmente para permitir la carga rápida
    de partes de una imagen. Tenga en cuenta que el formato GD solo
    es utilizable en aplicaciones compatibles con GD.

**Advertencia**The GD
and GD2 image formats are proprietary image formats of libgd. They have to be regarded
_obsolete_, and should only be used for development and testing
purposes.

### Ver también

- [imagegd2()](#function.imagegd2) - Genera una imagen en formato GD2, hacia el navegador o un fichero

# imagegd2

(PHP 4 &gt;= 4.0.7, PHP 5, PHP 7, PHP 8)

imagegd2 — Genera una imagen en formato GD2, hacia el navegador o un fichero

### Descripción

**imagegd2**(
    [GdImage](#class.gdimage) $image,
    [?](#language.types.null)[string](#language.types.string) $file = **[null](#constant.null)**,
    [int](#language.types.integer) $chunk_size = 128,
    [int](#language.types.integer) $mode = **[IMG_GD2_RAW](#constant.img-gd2-raw)**
): [bool](#language.types.boolean)

Genera o guarda el fichero file en formato GD2.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     file

      The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or **[null](#constant.null)**, the raw image stream will be output directly.





     chunk_size


       Tamaño del fragmento.






     mode


       Puede ser **[IMG_GD2_RAW](#constant.img-gd2-raw)** o
       **[IMG_GD2_COMPRESSED](#constant.img-gd2-compressed)**. Por omisión, vale
       **[IMG_GD2_RAW](#constant.img-gd2-raw)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Precaución**However, if libgd fails to output the image, this function returns **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción






      8.0.3

       file ahora es nulo.





8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

**Ejemplo #1 Mostrar una imagen GD2**

&lt;?php
// Creación de una imagen vacía y adición de texto
$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, "Un texto simple", $text_color);

// Mostrar la imagen
imagegd2($im);

?&gt;

    **Ejemplo #2 Guardar una imagen GD2**

&lt;?php
// Creación de una imagen vacía y adición de texto
$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, "Un texto simple", $text_color);

// Guardar la imagen GD2
// El formato de fichero para imágenes GD2 es .gd2, ver http://www.libgd.org/GdFileFormats
imagegd2($im, 'simple.gd2');

?&gt;

### Notas

**Nota**:

    El formato GD2 se utiliza comúnmente para cargar rápidamente las
    partes de una imagen. Tenga en cuenta que el formato GD2 solo es
    utilizable en aplicaciones compatibles con GD2.

**Advertencia**The GD
and GD2 image formats are proprietary image formats of libgd. They have to be regarded
_obsolete_, and should only be used for development and testing
purposes.

### Ver también

- [imagegd()](#function.imagegd) - Genera una imagen en formato GD, hacia el navegador o un fichero

# imagegetclip

(PHP 7 &gt;= 7.2.0, PHP 8)

imagegetclip — Obtiene el rectángulo de recorte

### Descripción

**imagegetclip**([GdImage](#class.gdimage) $image): [array](#language.types.array)

**imagegetclip()** obtiene el rectángulo de recorte actual,
es decir, el área más allá de la cual ningún píxel será dibujado.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

### Valores devueltos

La función devuelve un array indexado con las coordenadas del rectángulo de
recorte con las siguientes entradas:

    -
     la coordenada x de la esquina superior izquierda


    -
     la coordenada y de la esquina superior izquierda


    -
     la coordenada x de la esquina inferior derecha


    -
     la coordenada y de la esquina inferior derecha

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

**Ejemplo #1 Ejemplo con imagegetclip()**

    Definir y obtener el rectángulo de recorte.

&lt;?php
$im = imagecreate(100, 100);
imagesetclip($im, 10,10, 89,89);
print_r(imagegetclip($im));

El ejemplo anterior mostrará:

Array
(
[0] =&gt; 10
[1] =&gt; 10
[2] =&gt; 89
[3] =&gt; 89
)

### Ver también

- [imagesetclip()](#function.imagesetclip) - Establece el rectángulo de recorte

# imagegetinterpolation

(PHP 8)

imagegetinterpolation — Obtiene el método de interpolación

### Descripción

**imagegetinterpolation**([GdImage](#class.gdimage) $image): [int](#language.types.integer)

Obtiene el método de interpolación actualmente definido para la image.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

### Valores devueltos

Devuelve el método de interpolación.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ver también

- [imagesetinterpolation()](#function.imagesetinterpolation) - Define el método de interpolación

# imagegif

(PHP 4, PHP 5, PHP 7, PHP 8)

imagegif — Output image to browser or file

### Descripción

**imagegif**([GdImage](#class.gdimage) $image, [resource](#language.types.resource)|[string](#language.types.string)|[null](#language.types.null) $file = **[null](#constant.null)**): [bool](#language.types.boolean)

**imagegif()** crea un fichero de imagen GIF en
file a partir de la imagen image.
El argumento image es un identificador válido devuelto por la
función [imagecreate()](#function.imagecreate) o las funciones imagecreatefrom\*.

El formato de la imagen será GIF87a, a menos que la imagen tenga
un color transparente (establecido mediante la función
[imagecolortransparent()](#function.imagecolortransparent)), lo que hará que sea en formato
GIF89a.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     file

      The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or **[null](#constant.null)**, the raw image stream will be output directly.




### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Precaución**However, if libgd fails to output the image, this function returns **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Visualización de una imagen utilizando imagegif()**

&lt;?php
// Creación de una imagen
$im = imagecreatetruecolor(100, 100);

// Define el fondo como blanco
imagefilledrectangle($im, 0, 0, 99, 99, 0xFFFFFF);

// Dibuja texto en la imagen
imagestring($im, 3, 40, 20, 'GD Library', 0xFFBA00);

// Muestra la imagen en el navegador
header('Content-Type: image/gif');

imagegif($im);
?&gt;

    **Ejemplo #2 Conversión de una imagen PNG a GIF, utilizando imagegif()**

&lt;?php
// Carga de la imagen PNG
$png = imagecreatefrompng('./php.png');

// Guardado de la imagen como GIF
imagegif($png, './php.gif');

// ¡Listo!
echo 'Conversión exitosa de la imagen PNG a GIF !';
?&gt;

### Notas

**Nota**:

    El siguiente código permite escribir scripts PHP más portables:
    el tipo de GD se detecta automáticamente. Reemplaza la
    secuencia header ("Content-Type: image/gif"); ImageGif($im);
    por un código más flexible:





&lt;?php
// Creación de una imagen
$im = imagecreatetruecolor(100, 100);

// Se realizan algunas operaciones en la imagen aquí...

// Manejo de la visualización
if(function_exists('imagegif'))
{
// Para GIF
header('Content-Type: image/gif');

    imagegif($im);

}
elseif(function_exists('imagejpeg'))
{
// Para JPEG
header('Content-Type: image/jpeg');

    imagejpeg($im, NULL, 100);

}
elseif(function_exists('imagepng'))
{
// Para PNG
header('Content-Type: image/png');

    imagepng($im);

}
elseif(function_exists('imagewbmp'))
{
// Para WBMP
header('Content-Type: image/vnd.wap.wbmp');

    imagewbmp($im);

}
else
{
die('No se encontró soporte para ningún formato de imagen en este servidor PHP');
}

?&gt;

**Nota**:

    Puede utilizarse la
    función [imagetypes()](#function.imagetypes) en lugar de
    [function_exists()](#function.function-exists) para verificar
    la presencia de los diferentes formatos de imagen soportados:





&lt;?php
if(imagetypes() &amp; IMG_GIF)
{
header('Content-Type: image/gif');
imagegif($im);
}
elseif(imagetypes() &amp; IMG_JPG)
{
/_ ... etc. _/
}
?&gt;

### Ver también

- [imagepng()](#function.imagepng) - Envía una imagen PNG a un navegador o a un fichero

- [imagewbmp()](#function.imagewbmp) - Output image to browser or file

- [imagejpeg()](#function.imagejpeg) - Output image to browser or file

- [imagetypes()](#function.imagetypes) - Devuelve los tipos de imágenes soportados por la versión actual de PHP

# imagegrabscreen

(PHP 5 &gt;= 5.2.2, PHP 7, PHP 8)

imagegrabscreen — Captura la pantalla completa

### Descripción

**imagegrabscreen**(): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**imagegrabscreen()** realiza una captura
de toda la pantalla.

**Nota**:

    Esta función solo está disponible en Windows.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto imagen en caso de éxito, o **[false](#constant.false)**
si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage) ; anteriormente,
       se devolvía un [resource](#language.types.resource).



### Ejemplos

    **Ejemplo #1 Ejemplo con imagegrabscreen()**



     Este ejemplo muestra cómo realizar una captura de pantalla y guardarla
     en una imagen png.

&lt;?php
$im = imagegrabscreen();
imagepng($im, "myscreenshot.png");
?&gt;

### Ver también

- [imagegrabwindow()](#function.imagegrabwindow) - Captura una ventana

# imagegrabwindow

(PHP 5 &gt;= 5.2.2, PHP 7, PHP 8)

imagegrabwindow — Captura una ventana

### Descripción

**imagegrabwindow**([int](#language.types.integer) $handle, [bool](#language.types.boolean) $client_area = **[false](#constant.false)**): [GdImage](#class.gdimage)|[false](#language.types.singleton)

Captura una ventana o el espacio de su cliente, utilizando un gestor
de ventanas (propiedad HWND de la instancia COM).

**Nota**:

    Esta función solo está disponible en Windows.

### Parámetros

     handle


       El identificador HWND de la ventana.






     client_area


       Incluir o no el espacio del cliente de la ventana de la aplicación.





### Valores devueltos

Devuelve un objeto imagen en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Se emite una alerta de tipo E_NOTICE si window_handle es
un gestor de ventana no válido.
Se emite una alerta de tipo E_WARNING si la API de Windows es demasiado antigua.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage) ; anteriormente,
       se devolvía un [resource](#language.types.resource).




      8.0.0

       client_area ahora espera un [bool](#language.types.boolean) ;
       anteriormente esperaba un [int](#language.types.integer).



### Ejemplos

    **Ejemplo #1 Ejemplo con imagegrabwindow()**



     Captura una ventana (por ejemplo, IE).

&lt;?php
$browser = new COM("InternetExplorer.Application");
$handle = $browser-&gt;HWND;
$browser-&gt;Visible = true;
$im = imagegrabwindow($handle);
$browser-&gt;Quit();
imagepng($im, "iesnap.png");
?&gt;

     Captura una ventana (por ejemplo, IE) pero con su contenido.

&lt;?php
$browser = new COM("InternetExplorer.Application");
$handle = $browser-&gt;HWND;
$browser-&gt;Visible = true;
$browser-&gt;Navigate("http://www.libgd.org");

/_ ¿Funciona siempre? _/
while ($browser-&gt;Busy) {
    com_message_pump(4000);
}
$im = imagegrabwindow($handle, 0);
$browser-&gt;Quit();
imagepng($im, "iesnap.png");
?&gt;

### Ver también

- [imagegrabscreen()](#function.imagegrabscreen) - Captura la pantalla completa

# imageinterlace

(PHP 4, PHP 5, PHP 7, PHP 8)

imageinterlace — Activa o desactiva el entrelazado

### Descripción

**imageinterlace**([GdImage](#class.gdimage) $image, [?](#language.types.null)[bool](#language.types.boolean) $enable = **[null](#constant.null)**): [bool](#language.types.boolean)

**imageinterlace()** activa o desactiva el bit de entrelazado.

Si el entrelazado es 1 y la imagen es JPEG,
la imagen creada será un JPEG progresivo.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     interlace


       Si **[true](#constant.true)**, la imagen será entrelazada, si **[false](#constant.false)** el bit de entrelazado es desactivado.
       Pasar **[null](#constant.null)** hará que el comportamiento de entrelazado no sea cambiado.





### Valores devueltos

Retorna **[true](#constant.true)** si el entrelazado está activado para la imagen, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción






      8.0.5

       **imageinterlace()** ahora retorna un [bool](#language.types.boolean);
       anteriormente se retornaba un [int](#language.types.integer)
       (no-cero para imágenes entrelazadas, cero en caso contrario).





8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

      8.0.0

       enable ahora espera un [bool](#language.types.boolean);
       anteriormente esperaba un [int](#language.types.integer).



### Ejemplos

    **Ejemplo #1 Activación del entrelazado utilizando la función imageinterlace()**

&lt;?php
// Creación de una imagen
$im = imagecreatefromgif('php.gif');

// Activación del entrelazado
imageinterlace($im, true);

// Guardado de la imagen
imagegif($im, './php_interlaced.gif');
?&gt;

# imageistruecolor

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

imageistruecolor — Determina si una imagen es una imagen truecolor

### Descripción

**imageistruecolor**([GdImage](#class.gdimage) $image): [bool](#language.types.boolean)

**imageistruecolor()**determina si la imagen
image es una imagen truecolor.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

### Valores devueltos

Devuelve **[true](#constant.true)** si la imagen es truecolor, **[false](#constant.false)** en caso contrario.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Detección simple de una imagen en truecolor con imageistruecolor()**

&lt;?php
// $im es una instancia de imagen

// Verifica si la imagen es truecolor o no
if(!imageistruecolor($im))
{
    // Creación de una nueva imagen en truecolor
    $tc = imagecreatetruecolor(imagesx($im), imagesy($im));

    // Copia de los píxeles
    imagecopy($tc, $im, 0, 0, 0, 0, imagesx($im), imagesy($im));

    $im = $tc;
    $tc = NULL;

    // O utilice imagepalettetotruecolor()

}

// Se continúa trabajando con la instancia de la imagen
?&gt;

### Ver también

- [imagecreatetruecolor()](#function.imagecreatetruecolor) - Crea una nueva imagen en colores verdaderos

- [imagepalettetotruecolor()](#function.imagepalettetotruecolor) - Convierte una imagen basada en una paleta a color verdadero

# imagejpeg

(PHP 4, PHP 5, PHP 7, PHP 8)

imagejpeg — Output image to browser or file

### Descripción

**imagejpeg**([GdImage](#class.gdimage) $image, [resource](#language.types.resource)|[string](#language.types.string)|[null](#language.types.null) $file = **[null](#constant.null)**, [int](#language.types.integer) $quality = -1): [bool](#language.types.boolean)

**imagejpeg()** crea un fichero JPEG
a partir de la imagen proporcionada.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     file

      The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or **[null](#constant.null)**, the raw image stream will be output directly.





     quality


       quality es opcional, y toma valores en
       el intervalo 0 (peor calidad, fichero pequeño) a 100 (mejor calidad, fichero grande).
       Por omisión (-1), se utiliza el valor de calidad IJG por defecto (aproximadamente 75).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Precaución**However, if libgd fails to output the image, this function returns **[true](#constant.true)**.

### Errores/Excepciones

Se genera una [ValueError](#class.valueerror) si quality es inválido.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Ahora se genera una [ValueError](#class.valueerror) si quality es inválido.





8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Mostrar una imagen JPEG hacia el navegador**

&lt;?php
// Creación de una imagen vacía y adición de texto
$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, 'A Simple Text String', $text_color);

// Define el contenido del encabezado - en este caso, image/jpeg
header('Content-Type: image/jpeg');

// Mostrar la imagen
imagejpeg($im);

?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagejpeg()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagejpeg.jpg)








    **Ejemplo #2 Guardar una imagen JPEG en un fichero**

&lt;?php
// Creación de una imagen vacía y adición de texto
$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, 'Un texto simple', $text_color);

// Guardar la imagen con el nombre 'simpletext.jpg'
imagejpeg($im, 'simpletext.jpg');

?&gt;

    **Ejemplo #3 Mostrar la imagen con una calidad del 75% hacia el navegador**

&lt;?php
// Creación de una imagen vacía y adición de texto
$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, 'Un texto simple', $text_color);

// Define el contenido del encabezado - en este caso, image/jpeg
header('Content-Type: image/jpeg');

// No se proporciona el nombre del fichero (se utiliza el valor NULL),
// luego, se define la calidad a 75%
imagejpeg($im, NULL, 75);

?&gt;

### Notas

**Nota**:

    Si se desea generar imágenes JPEG progresivas,
    es necesario activar el entrelazado utilizando la función
    [imageinterlace()](#function.imageinterlace).

### Ver también

- [imagepng()](#function.imagepng) - Envía una imagen PNG a un navegador o a un fichero

- [imagegif()](#function.imagegif) - Output image to browser or file

- [imagewbmp()](#function.imagewbmp) - Output image to browser or file

- [imageinterlace()](#function.imageinterlace) - Activa o desactiva el entrelazado

- [imagetypes()](#function.imagetypes) - Devuelve los tipos de imágenes soportados por la versión actual de PHP

# imagelayereffect

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

imagelayereffect — Activa la opción de mezcla alfa para utilizar los efectos de libgd

### Descripción

**imagelayereffect**([GdImage](#class.gdimage) $image, [int](#language.types.integer) $effect): [bool](#language.types.boolean)

Activa la opción de mezcla alfa para utilizar los efectos de libgd.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     effect


       Una de las constantes siguientes:




         **[IMG_EFFECT_REPLACE](#constant.img-effect-replace)**


           Utiliza el reemplazo de píxeles (equivalente a pasar
           **[true](#constant.true)** a la función [imagealphablending()](#function.imagealphablending))




         **[IMG_EFFECT_ALPHABLEND](#constant.img-effect-alphablend)**


           Utiliza la mezcla normal de píxeles (equivalente a pasar
           **[false](#constant.false)** a la función [imagealphablending()](#function.imagealphablending))




         **[IMG_EFFECT_NORMAL](#constant.img-effect-normal)**


           Idéntico a la constante **[IMG_EFFECT_ALPHABLEND](#constant.img-effect-alphablend)**.




         **[IMG_EFFECT_OVERLAY](#constant.img-effect-overlay)**


           El overlay tiene como efecto que los píxeles negros del fondo permanecerán
           negros, los blancos del fondo permanecerán blancos, pero los grises del
           fondo tomarán el color del píxel del primer plano.




         **[IMG_EFFECT_MULTIPLY](#constant.img-effect-multiply)**


           Overlay con un efecto de multiplicación.







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

      7.2.0

       Añadida la constante **[IMG_EFFECT_MULTIPLY](#constant.img-effect-multiply)**
       (requiere la libgd del sistema &gt;= 2.1.1 o la libgd integrada).



### Ejemplos

**Ejemplo #1 Ejemplo con imagelayereffect()**

&lt;?php
// Creación de una imagen
$im = imagecreatetruecolor(100, 100);

// Define el fondo
imagefilledrectangle($im, 0, 0, 100, 100, imagecolorallocate($im, 220, 220, 220));

// Aplica el overlay
imagelayereffect($im, IMG_EFFECT_OVERLAY);

// Dibuja 2 elipses grises
imagefilledellipse($im, 50, 50, 40, 40, imagecolorallocate($im, 100, 255, 100));
imagefilledellipse($im, 50, 50, 50, 80, imagecolorallocate($im, 100, 100, 255));
imagefilledellipse($im, 50, 50, 80, 50, imagecolorallocate($im, 255, 100, 100));

// Visualización
header('Content-type: image/png');

imagepng($im);
?&gt;

Resultado del ejemplo anterior es similar a:

      ![Visualización del ejemplo: imagelayereffect()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagelayereffect.png)


# imageline

(PHP 4, PHP 5, PHP 7, PHP 8)

imageline — Dibuja una línea

### Descripción

**imageline**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $x1,
    [int](#language.types.integer) $y1,
    [int](#language.types.integer) $x2,
    [int](#language.types.integer) $y2,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

Dibuja una línea entre dos puntos proporcionados.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     x1


       X: coordenada del primer punto.






     y1


       Y: coordenada del primer punto.






     x2


       X: coordenada del segundo punto.






     y2


       Y: coordenada del segundo punto.






     color


       El color de relleno. A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Dibuja una línea fina**

&lt;?php

function imagelinethick($image, $x1, $y1, $x2, $y2, $color, $thick = 1)
{
    /* de esta manera, solo funciona bien para líneas ortogonales
    imagesetthickness($image, $thick);
    return imageline($image, $x1, $y1, $x2, $y2, $color);
    */
    if ($thick == 1) {
return imageline($image, $x1, $y1, $x2, $y2, $color);
    }
    $t = $thick / 2 - 0.5;
    if ($x1 == $x2 || $y1 == $y2) {
        return imagefilledrectangle($image, round(min($x1, $x2) - $t), round(min($y1, $y2) - $t), round(max($x1, $x2) + $t), round(max($y1, $y2) + $t), $color);
    }
    $k = ($y2 - $y1) / ($x2 - $x1); //y = kx + q
    $a = $t / sqrt(1 + pow($k, 2));
$points = array(
        round($x1 - (1+$k)*$a), round($y1 + (1-$k)_$a),
        round($x1 - (1-$k)_$a), round($y1 - (1+$k)*$a),
round($x2 + (1+$k)_$a), round($y2 - (1-$k)_$a),
        round($x2 + (1-$k)*$a), round($y2 + (1+$k)\*$a),
    );
    imagefilledpolygon($image, $points, 4, $color);
    return imagepolygon($image, $points, 4, $color);
}

?&gt;

### Ver también

- [imagecreatetruecolor()](#function.imagecreatetruecolor) - Crea una nueva imagen en colores verdaderos

- [imagecolorallocate()](#function.imagecolorallocate) - Asigna una coloración para una imagen

# imageloadfont

(PHP 4, PHP 5, PHP 7, PHP 8)

imageloadfont — Carga una nueva fuente

### Descripción

**imageloadfont**([string](#language.types.string) $filename): [GdFont](#class.gdfont)|[false](#language.types.singleton)

**imageloadfont()** carga una nueva fuente de usuario y
devuelve su identificador.

### Parámetros

     filename


       El formato de las fuentes depende actualmente del sistema
       operativo. Esto significa que es necesario generar
       archivos de fuentes para la máquina que ejecuta PHP.







        <caption>**Formato de archivo de fuente**</caption>



          Posición
          Tipo de datos C
          Descripción






           Octetos 0-3
           int
           Número de caracteres de la fuente



           Octetos 4-7
           int

            Valor del primer carácter de la fuente (generalmente 32 para espacio)




           Octetos 8-11
           int
           Ancho en píxeles de los caracteres



           Octetos 12-15
           int
           Altura en píxeles de los caracteres



           Octetos 16-
           char

            Tabla con los datos de los caracteres, un octeto por píxel para cada
            carácter, con un total de (número de caracteres * ancho * altura) octetos.










### Valores devueltos

Devuelve una instancia [GdFont](#class.gdfont), o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.1.0

        Ahora devuelve una instancia de [GdFont](#class.gdfont);
        anteriormente se devolvía un [int](#language.types.integer).





### Ejemplos

    **Ejemplo #1 Ejemplo con imageloadfont()**

&lt;?php
// Creación de una nueva imagen
$im = imagecreatetruecolor(50, 20);
$black = imagecolorallocate($im, 0, 0, 0);
$white = imagecolorallocate($im, 255, 255, 255);

// Define el fondo en blanco
imagefilledrectangle($im, 0, 0, 49, 19, $white);

// Carga la fuente GD y escribe '¡Hola!'
$font = imageloadfont('./04b.gdf');
imagestring($im, $font, 0, 0, '¡Hola!', $black);

// Muestra en el navegador
header('Content-type: image/png');

imagepng($im);
?&gt;

### Ver también

- [imagefontwidth()](#function.imagefontwidth) - Devuelve el ancho de la fuente

- [imagefontheight()](#function.imagefontheight) - Devuelve la altura de la fuente

- [imagestring()](#function.imagestring) - Dibuja una cadena horizontal

# imageopenpolygon

(PHP 7 &gt;= 7.2.0, PHP 8)

imageopenpolygon — Dibuja un polígono abierto

### Descripción

Firma disponible a partir de PHP 8.0.0 (no soportada con argumentos nombrados)

**imageopenpolygon**([GdImage](#class.gdimage) $image, [array](#language.types.array) $points, [int](#language.types.integer) $color): [bool](#language.types.boolean)

Firma alternativa (obsoleta a partir de PHP 8.1.0)

**imageopenpolygon**(
    [GdImage](#class.gdimage) $image,
    [array](#language.types.array) $points,
    [int](#language.types.integer) $num_points,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

**imageopenpolygon()** dibuja un polígono abierto en
la image. A diferencia de [imagepolygon()](#function.imagepolygon),
no se dibuja ninguna línea entre el último y el primer punto.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     points


       Un array que contiene los vértices del polígono, por ejemplo:






           points[0]
           = x0



           points[1]
           = y0



           points[2]
           = x1



           points[3]
           = y1










     num_points


       Número total de puntos (vértices), que deben ser al menos 3.




       Si este parámetro se omite conforme a la segunda firma,
       points debe tener un número par de elementos, y
       num_points se asume que es count($points)/2.




     color


       A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       El parámetro num_points ha sido declarado obsoleto.





8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imageopenpolygon()**

&lt;?php
// Crear una imagen vacía
$image = imagecreatetruecolor(400, 300);

// Asignar un color para el polígono
$col_poly = imagecolorallocate($image, 255, 255, 255);

// Dibujar el polígono
imageopenpolygon($image, array(
0, 0,
100, 200,
300, 200
),
$col_poly);

// Mostrar la imagen en el navegador
header('Content-type: image/png');

imagepng($image);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Salida del ejemplo: imageopenpolygon()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imageopenpolygon.png)


### Ver también

- [imagepolygon()](#function.imagepolygon) - Dibuja un polígono

# imagepalettecopy

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

imagepalettecopy — Copia la paleta de una imagen a otra

### Descripción

**imagepalettecopy**([GdImage](#class.gdimage) $dst, [GdImage](#class.gdimage) $src): [void](language.types.void.html)

**imagepalettecopy()** copia la paleta de
la imagen src a la imagen
dst.

### Parámetros

     dst


       El objeto de la imagen de destino.






     src


       El objeto de la imagen fuente.





### Valores devueltos

No se retorna ningún valor.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       dst y src ahora esperan
       instancias de [GdImage](#class.gdimage) ; anteriormente,
       se esperaban [resource](#language.types.resource)s.



### Ejemplos

    **Ejemplo #1 Ejemplo con imagepalettecopy()**

&lt;?php
// Creación de 2 paletas
$palette1 = imagecreate(100, 100);
$palette2 = imagecreate(100, 100);

// Define el fondo en verde
// para la primera
$green = imagecolorallocate($palette1, 0, 255, 0);

// Copia la primera paleta a la segunda
imagepalettecopy($palette2, $palette1);

// Sabiendo que la paleta ahora está copiada, se puede
// usar el color verde asignado a la primera paleta
// sin necesidad de usar de nuevo la función imagecolorallocate()
imagefilledrectangle($palette2, 0, 0, 99, 99, $green);

// Muestra la imagen en el navegador
header('Content-type: image/png');

imagepng($palette2);
?&gt;

# imagepalettetotruecolor

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

imagepalettetotruecolor — Convierte una imagen basada en una paleta a color verdadero

### Descripción

**imagepalettetotruecolor**([GdImage](#class.gdimage) $image): [bool](#language.types.boolean)

Convierte una imagen basada en una paleta, creada por una función
como [imagecreate()](#function.imagecreate), en una imagen en color
verdadero, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

### Valores devueltos

Devuelve **[true](#constant.true)** si la conversión ha sido exitosa, o si la
imagen de origen ya es de color verdadero, en caso contrario,
devuelve **[false](#constant.false)**.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1
     Convierte cualquier objeto imagen a color verdadero
    **

&lt;?php
// Compatibilidad ascendente
if(!function_exists('imagepalettetotruecolor'))
{
function imagepalettetotruecolor(&amp;$src)
    {
        if(imageistruecolor($src))
{
return(true);
}

        $dst = imagecreatetruecolor(imagesx($src), imagesy($src));

        imagecopy($dst, $src, 0, 0, 0, 0, imagesx($src), imagesy($src));

        $src = $dst;

        return(true);
    }

}

// Utilización de una Closure
$typeof = function() use($im)
{
echo 'typeof($im) = ' . (imageistruecolor($im) ? 'true color' : 'palette'), PHP_EOL;
};

// Crea una imagen basada en una paleta
$im = imagecreate(100, 100);
$typeof();

// La convierte a color verdadero
imagepalettetotruecolor($im);
$typeof();

?&gt;

    El ejemplo anterior mostrará:

typeof($im) = palette
typeof($im) = true color

### Ver también

- [imagecreatetruecolor()](#function.imagecreatetruecolor) - Crea una nueva imagen en colores verdaderos

- [imageistruecolor()](#function.imageistruecolor) - Determina si una imagen es una imagen truecolor

# imagepng

(PHP 4, PHP 5, PHP 7, PHP 8)

imagepng — Envía una imagen PNG a un navegador o a un fichero

### Descripción

**imagepng**(
    [GdImage](#class.gdimage) $image,
    [resource](#language.types.resource)|[string](#language.types.string)|[null](#language.types.null) $file = **[null](#constant.null)**,
    [int](#language.types.integer) $quality = -1,
    [int](#language.types.integer) $filters = -1
): [bool](#language.types.boolean)

**imagepng()** muestra o guarda una
imagen en formato PNG utilizando
la imagen image.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     file

      The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or **[null](#constant.null)**, the raw image stream will be output directly.


      **Nota**:



        El valor **[null](#constant.null)** es inválido si el argumento quality
        y el argumento filters no son utilizados.







     quality


       Grado de compresión: desde 0 (ninguna compresión) hasta 9.
       El valor por omisión (-1) utiliza la compresión por omisión de zlib.
       Para más información ver el [» manual zlib](http://www.zlib.net/manual.html).






     filters


       Permite la reducción del tamaño del fichero PNG. Es una máscara que
       puede ser definida por una combinación de las constantes
       **[PNG_FILTER_*](#constant.png-filter-none)**.
       **[PNG_NO_FILTER](#constant.png-no-filter)** o
       **[PNG_ALL_FILTERS](#constant.png-all-filters)** pueden ser utilizados
       para, respectivamente, desactivar o activar todos los filtros.
       El valor por omisión (-1) desactiva el filtrado.



      **Precaución**

        El argumento filters es ignorado por system libgd.






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Precaución**However, if libgd fails to output the image, this function returns **[true](#constant.true)**.

### Errores/Excepciones

Genera una [ValueError](#class.valueerror) si quality es inválido.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Genera ahora una [ValueError](#class.valueerror) si quality es inválido.





8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

&lt;?php
$im = imagecreatefrompng("test.png");

header('Content-Type: image/png');

imagepng($im);
?&gt;

### Ver también

- [imagegif()](#function.imagegif) - Output image to browser or file

- [imagewbmp()](#function.imagewbmp) - Output image to browser or file

- [imagejpeg()](#function.imagejpeg) - Output image to browser or file

- [imagetypes()](#function.imagetypes) - Devuelve los tipos de imágenes soportados por la versión actual de PHP

- [imagesavealpha()](#function.imagesavealpha) - Determina si la información completa del canal alpha debe conservarse al guardar imágenes

# imagepolygon

(PHP 4, PHP 5, PHP 7, PHP 8)

imagepolygon — Dibuja un polígono

### Descripción

Firma disponible a partir de PHP 8.0.0 (no soportada con argumentos nombrados)

**imagepolygon**([GdImage](#class.gdimage) $image, [array](#language.types.array) $points, [int](#language.types.integer) $color): [bool](#language.types.boolean)

Firma alternativa (deprecada a partir de PHP 8.1.0)

**imagepolygon**(
    [GdImage](#class.gdimage) $image,
    [array](#language.types.array) $points,
    [int](#language.types.integer) $num_points,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

**imagepolygon()** dibuja un polígono en la imagen
image.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     points


       Un array que contiene los vértices del polígono, por ejemplo:






           points[0]
           = x0



           points[1]
           = y0



           points[2]
           = x1



           points[3]
           = y1










     num_points


       Número total de puntos (vértices), que deben ser al menos 3.




       Si este argumento es omitido conforme a la segunda firma,
       points debe tener un número par de elementos, y
       num_points se asume como count($points)/2.




     color


       A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       El argumento num_points ha sido deprecado.





8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagepolygon()**

&lt;?php
// Creación de una imagen vacía
$image = imagecreatetruecolor(400, 300);

// Asigna un color para el polígono
$col_poly = imagecolorallocate($image, 255, 255, 255);

// Dibuja el polígono
imagepolygon($image, array(
0, 0,
100, 200,
300, 200
),
$col_poly);

// Muestra la imagen en el navegador
header('Content-type: image/png');

imagepng($image);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagepolygon()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagepolygon.png)


### Ver también

- [imagefilledpolygon()](#function.imagefilledpolygon) - Dibuja un polígono relleno

- [imageopenpolygon()](#function.imageopenpolygon) - Dibuja un polígono abierto

- [imagecreate()](#function.imagecreate) - Crea una nueva imagen con paleta

- [imagecreatetruecolor()](#function.imagecreatetruecolor) - Crea una nueva imagen en colores verdaderos

# imagerectangle

(PHP 4, PHP 5, PHP 7, PHP 8)

imagerectangle — Dibuja un rectángulo

### Descripción

**imagerectangle**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $x1,
    [int](#language.types.integer) $y1,
    [int](#language.types.integer) $x2,
    [int](#language.types.integer) $y2,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

**imagerectangle()** dibuja un rectángulo en las coordenadas
especificadas.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     x1


       X: coordenada de la esquina superior izquierda.






     y1


       Y: coordenada de la esquina superior izquierda.
       0, 0 es la esquina superior izquierda de la imagen.






     x2


       X: coordenada del punto inferior derecho.






     y2


       Y: coordenada del punto inferior derecho.






     color


       A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagerectangle()**

&lt;?php
// Creación de una imagen de 200 x 200 píxeles
$canvas = imagecreatetruecolor(200, 200);

// Asigna los colores
$pink = imagecolorallocate($canvas, 255, 105, 180);
$white = imagecolorallocate($canvas, 255, 255, 255);
$green = imagecolorallocate($canvas, 132, 135, 28);

// Dibuja 3 rectángulos, cada uno con su color
imagerectangle($canvas, 50, 50, 150, 150, $pink);
imagerectangle($canvas, 45, 60, 120, 100, $white);
imagerectangle($canvas, 100, 120, 75, 160, $green);

// Visualización
header('Content-Type: image/jpeg');
imagejpeg($canvas);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagerectangle()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagerectangle.jpg)


# imageresolution

(PHP 7 &gt;= 7.2.0, PHP 8)

imageresolution — Recupera o define la resolución de la imagen

### Descripción

**imageresolution**([GdImage](#class.gdimage) $image, [?](#language.types.null)[int](#language.types.integer) $resolution_x = **[null](#constant.null)**, [?](#language.types.null)[int](#language.types.integer) $resolution_y = **[null](#constant.null)**): [array](#language.types.array)|[bool](#language.types.boolean)

**imageresolution()** permite definir y recuperar la resolución de una imagen
en DPI (puntos por pulgada). Si los parámetros opcionales son **[null](#constant.null)**,
la resolución actual se devuelve en un array indexado. Si únicamente
resolution_x no es **[null](#constant.null)**, la resolución horizontal y vertical se
establece a este valor. Si ninguno de los parámetros opcionales es **[null](#constant.null)**, la resolución
horizontal y vertical se establecen a estos valores respectivamente.

La resolución se utiliza únicamente como metadatos cuando las imágenes
se leen y escriben en formatos que soportan este tipo de información (actualmente
PNG y JPEG). Esto no afecta a las operaciones de dibujo. La resolución por
defecto de las nuevas imágenes es de 96 DPI.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

    resolution_x


      La resolución horizontal en DPI/PPP.






    resolution_y


      La resolución vertical en DPI/PPP.


### Valores devueltos

Cuando se utiliza como recuperador,
esto devuelve un array indexado con las resoluciones horizontal y
vertical en caso de éxito, o **[false](#constant.false)** si ocurre un error.
Cuando se utiliza como definidor,
esto devuelve **[true](#constant.true)** en caso de éxito, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       resolution_x y resolution_y son ahora nullable.



### Ejemplos

**Ejemplo #1 Definir y recuperar la resolución de una imagen**

&lt;?php
$im = imagecreatetruecolor(100, 100);
imageresolution($im, 200);
print_r(imageresolution($im));
imageresolution($im, 300, 72);
print_r(imageresolution($im));
?&gt;

El ejemplo anterior mostrará:

Array
(
[0] =&gt; 200
[1] =&gt; 200
)
Array
(
[0] =&gt; 300
[1] =&gt; 72
)

# imagerotate

(PHP 4 &gt;= 4.3.0, PHP 5, PHP 7, PHP 8)

imagerotate — Rota una imagen en un ángulo

### Descripción

**imagerotate**([GdImage](#class.gdimage) $image, [float](#language.types.float) $angle, [int](#language.types.integer) $background_color): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**imagerotate()** rota la imagen image
en un ángulo de angle, en grados.

El centro de rotación es el centro de la imagen, y la imagen rotada puede tener
dimensiones diferentes de la imagen original.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     angle


       El ángulo de rotación, en grados. El ángulo de rotación es
       interpretado como el número de grados para rotar la imagen
       en sentido contrario a las agujas del reloj.






     background_color


       Especifica el color de las zonas que serán descubiertas después de la rotación.





### Valores devueltos

Devuelve un objeto de imagen correspondiente a la
imagen después de la rotación, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       El parámetro no utilizado ignore_transparent ha sido completamente eliminado.




      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage) ; anteriormente,
       se devolvía un [resource](#language.types.resource).





8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

      8.0.0

       El parámetro no utilizado ignore_transparent ahora espera un [bool](#language.types.boolean) ;
       anteriormente esperaba un [int](#language.types.integer).



### Ejemplos

    **Ejemplo #1 Rotación de una imagen de 180 grados**



     Este ejemplo rota una imagen de 180 grados - al revés.

&lt;?php
// Archivo y grados de rotación
$filename = 'test.jpg';
$degrees = 180;

// Tipo de contenido
header('Content-type: image/jpeg');

// Carga
$source = imagecreatefromjpeg($filename);

// Rotación
$rotate = imagerotate($source, $degrees, 0);

// Mostrar
imagejpeg($rotate);

?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: Rotación de una imagen de 180 grados](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagerotate.jpg)


### Notas

**Nota**:

Esta función es afectada por
el método de interpolación, definido por la función [imagesetinterpolation()](#function.imagesetinterpolation).

### Ver también

- [imagesetinterpolation()](#function.imagesetinterpolation) - Define el método de interpolación

# imagesavealpha

(PHP 4 &gt;= 4.3.2, PHP 5, PHP 7, PHP 8)

imagesavealpha — Determina si la información completa del canal alpha debe conservarse al guardar imágenes

### Descripción

**imagesavealpha**([GdImage](#class.gdimage) $image, [bool](#language.types.boolean) $enable): [bool](#language.types.boolean)

**imagesavealpha()** define el flag que determina si
la información del canal alpha (en oposición a la transparencia de color único)
debe conservarse al guardar imágenes.
Esto es soportado solo para los formatos de imagen que soportan toda
la información de strings alpha, por ejemplo PNG, WebP
y AVIF.

**Nota**:

     **imagesavealpha()** es solo significativo para las
     imágenes PNG, ya que los strings alpha completos siempre son guardados
     para WebP y AVIF. No se recomienda confiar en este comportamiento,
     ya que podría cambiar en el futuro.
     Por lo tanto, **imagesavealpha()** debe ser llamado intencionalmente también
     para las imágenes WebP y AVIF.

El alphablending debe ser desactivado (imagealphablending($im, false))
para conservar el canal alpha en primer lugar.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     enable


       Si el canal alpha debe o no ser guardado. Por omisión **[false](#constant.false)**.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Uso simple de imagesavealpha()**

&lt;?php
// Carga una imagen PNG con un canal alpha
$png = imagecreatefrompng('./alphachannel_example.png');

// Desactivar el alpha blending
imagealphablending($png, false);

// Realizar las operaciones deseadas

// Definir el flag alpha
imagesavealpha($png, true);

// Mostrar la imagen en el navegador
header('Content-Type: image/png');

imagepng($png);
?&gt;

### Ver también

- [imagealphablending()](#function.imagealphablending) - Modifica el modo de mezcla de una imagen

# imagescale

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

imagescale — Redimensiona una imagen utilizando una altura y una anchura proporcionadas

### Descripción

**imagescale**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height = -1,
    [int](#language.types.integer) $mode = **[IMG_BILINEAR_FIXED](#constant.img-bilinear-fixed)**
): [GdImage](#class.gdimage)|[false](#language.types.singleton)

**imagescale()** redimensiona una imagen utilizando el algoritmo de interpolación dado.

**Nota**:

    A diferencia de muchas otras funciones de imagen, **imagescale()**
    no modifica la image proporcionada; en su lugar, se
    devuelve una *nueva* imagen.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

    width


      La anchura a utilizar para el redimensionamiento de la imagen.






    height


      La altura a utilizar para el redimensionamiento de la imagen. Si se omite o
      es negativa, se preservará la relación de aspecto de la imagen.






    mode


      Una de las constantes **[IMG_NEAREST_NEIGHBOUR](#constant.img-nearest-neighbour)**,
      **[IMG_BILINEAR_FIXED](#constant.img-bilinear-fixed)**,
      **[IMG_BICUBIC](#constant.img-bicubic)**,
      **[IMG_BICUBIC_FIXED](#constant.img-bicubic-fixed)** o cualquier otra (utilizará dos pasadas).


**Nota**:

        **[IMG_WEIGHTED4](#constant.img-weighted4)** aún no está soportado.






### Valores devueltos

Devuelve el objeto de la imagen redimensionada en caso de
éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Genera una [ValueError](#class.valueerror) si width
o height provoca un desbordamiento o un subdesbordamiento.

Genera una [ValueError](#class.valueerror) si mode es inválido.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Ahora genera una [ValueError](#class.valueerror) si width
       o height provoca un desbordamiento o un subdesbordamiento.




      8.4.0

       Ahora genera una [ValueError](#class.valueerror) si mode es inválido.




      8.0.0

       En caso de éxito, esta función devuelve ahora una instancia de
       [GDImage](#class.gdimage); anteriormente,
       se devolvía un [resource](#language.types.resource).





8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ver también

- [imagecopyresized()](#function.imagecopyresized) - Copia y redimensiona una parte de una imagen

- [imagecopyresampled()](#function.imagecopyresampled) - Copia, redimensiona y reinterpolación de una imagen

# imagesetbrush

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

imagesetbrush — Modifica el pincel para el dibujo de líneas

### Descripción

**imagesetbrush**([GdImage](#class.gdimage) $image, [GdImage](#class.gdimage) $brush): [bool](#language.types.boolean)

**imagesetbrush()** reemplaza el pincel actual
para el dibujo de líneas por brush.
Este pincel será entonces utilizado con funciones como
[imageline()](#function.imageline) o [imagepolygon()](#function.imagepolygon)
y con los colores especiales **[IMG_COLOR_BRUSHED](#constant.img-color-brushed)** o
**[IMG_COLOR_STYLEDBRUSHED](#constant.img-color-styledbrushed)**.

**Precaución**

    No es necesario realizar ninguna acción cuando se ha terminado con un pincel,
    pero si se destruye la imagen del pincel, NO DEBE utilizarse
    las opciones **[IMG_COLOR_BRUSHED](#constant.img-color-brushed)** y
    **[IMG_COLOR_STYLEDBRUSHED](#constant.img-color-styledbrushed)**
    antes de crear un nuevo pincel.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     brush


       Un objeto de imagen.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       image y brush ahora
       requieren instancias de [GdImage](#class.gdimage) ; anteriormente,
       se esperaban [resource](#language.types.resource)s.



### Ejemplos

    **Ejemplo #1 Ejemplo con imagesetbrush()**

&lt;?php
// Carga un mini-logo PHP
$php = imagecreatefrompng('./php.png');

// Creación de la imagen principal, 100x100
$im = imagecreatetruecolor(100, 100);

// Define el fondo en blanco
$white = imagecolorallocate($im, 255, 255, 255);
imagefilledrectangle($im, 0, 0, 299, 99, $white);

// Define el pincel
imagesetbrush($im, $php);

// Dibuja algunas pinceladas
imageline($im, 50, 50, 50, 60, IMG_COLOR_BRUSHED);

// Muestra la imagen en el navegador
header('Content-type: image/png');

imagepng($im);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagesetbrush()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagesetbrush.png)


# imagesetclip

(PHP 7 &gt;= 7.2.0, PHP 8)

imagesetclip — Establece el rectángulo de recorte

### Descripción

**imagesetclip**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $x1,
    [int](#language.types.integer) $y1,
    [int](#language.types.integer) $x2,
    [int](#language.types.integer) $y2
): [bool](#language.types.boolean)

**imagesetclip()** establece el rectángulo de recorte actual,
es decir, el área más allá de la cual ningún píxel será dibujado.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

    x1


      La coordenada x de la esquina superior izquierda.






    y1


      La coordenada y de la esquina superior izquierda.






    x2


      La coordenada x de la esquina inferior derecha.






    y2


      La coordenada y de la esquina inferior derecha.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ver también

- [imagegetclip()](#function.imagegetclip) - Obtiene el rectángulo de recorte

# imagesetinterpolation

(PHP 5 &gt;= 5.5.0, PHP 7, PHP 8)

imagesetinterpolation — Define el método de interpolación

### Descripción

**imagesetinterpolation**([GdImage](#class.gdimage) $image, [int](#language.types.integer) $method = **[IMG_BILINEAR_FIXED](#constant.img-bilinear-fixed)**): [bool](#language.types.boolean)

Define el método de interpolación; el hecho de definir un método de interpolación
afecta el rendimiento de varias funciones en GD, como por ejemplo la función
[imagerotate()](#function.imagerotate).

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     method


       El método de interpolación, que puede ser uno de los siguientes:



        -

          **[IMG_BELL](#constant.img-bell)**: filtro Bell.



        -

          **[IMG_BESSEL](#constant.img-bessel)**: filtro Bessel.



        -

          **[IMG_BICUBIC](#constant.img-bicubic)**: interpolación bicúbica.



        -

          **[IMG_BICUBIC_FIXED](#constant.img-bicubic-fixed)**: implementación de punto fijo de una interpolación bicúbica.



        -

          **[IMG_BILINEAR_FIXED](#constant.img-bilinear-fixed)**: implementación de punto fijo de una interpolación bilineal
          (por defecto (incluyendo para la creación de imágenes)).



        -

          **[IMG_BLACKMAN](#constant.img-blackman)**: función de ventana Blackman.



        -

          **[IMG_BOX](#constant.img-box)**: filtro de desenfoque Box.



        -

          **[IMG_BSPLINE](#constant.img-bspline)**: interpolación Spline.



        -

          **[IMG_CATMULLROM](#constant.img-catmullrom)**: interpolación cubica Hermite spline.



        -

          **[IMG_GAUSSIAN](#constant.img-gaussian)**: función Gaussiana.



        -

          **[IMG_GENERALIZED_CUBIC](#constant.img-generalized-cubic)**: interpolación fractal cubica generalizada spline.



        -

          **[IMG_HERMITE](#constant.img-hermite)**: interpolación Hermite.



        -

          **[IMG_HAMMING](#constant.img-hamming)**: filtro Hamming.



        -

          **[IMG_HANNING](#constant.img-hanning)**: filtro Hanning.



        -

          **[IMG_MITCHELL](#constant.img-mitchell)**: filtro Mitchell.



        -

          **[IMG_POWER](#constant.img-power)**: interpolación Power.



        -

          **[IMG_QUADRATIC](#constant.img-quadratic)**: interpolación cuadrática inversa.



        -

          **[IMG_SINC](#constant.img-sinc)**: función Sinc.



        -

          **[IMG_NEAREST_NEIGHBOUR](#constant.img-nearest-neighbour)**: interpolación del vecino más cercano.



        -

          **[IMG_WEIGHTED4](#constant.img-weighted4)**: filtro Weighting.



        -

          **[IMG_TRIANGLE](#constant.img-triangle)**: interpolación Triangle.







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagesetinterpolation()**

&lt;?php
// Carga de la imagen
$im = imagecreate(500, 500);

// Por defecto, la interpolación es IMG_BILINEAR_FIXED; se utiliza en su lugar
// el filtro 'Mitchell':
imagesetinterpolation($im, IMG_MITCHELL);

// Se continúa trabajando con $im...
?&gt;

### Notas

La modificación del método de interpolación afecta a las siguientes funciones durante el rendimiento:

    -

      [imageaffine()](#function.imageaffine)



    -

      [imagerotate()](#function.imagerotate)


### Ver también

- [imagegetinterpolation()](#function.imagegetinterpolation) - Obtiene el método de interpolación

# imagesetpixel

(PHP 4, PHP 5, PHP 7, PHP 8)

imagesetpixel — Dibuja un píxel

### Descripción

**imagesetpixel**(
    [GdImage](#class.gdimage) $image,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

**imagesetpixel()** dibuja un píxel en las coordenadas especificadas.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     x


       X: coordenada.






     y


       Y: coordenada.






     color


       A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagesetpixel()**



     Un dibujo aleatorio que termina con una imagen regular.

&lt;?php

$x = 200;
$y = 200;

$gd = imagecreatetruecolor($x, $y);

$corners[0] = array('x' =&gt; 100, 'y' =&gt;  10);
$corners[1] = array('x' =&gt; 0, 'y' =&gt; 190);
$corners[2] = array('x' =&gt; 200, 'y' =&gt; 190);

$red = imagecolorallocate($gd, 255, 0, 0);

for ($i = 0; $i &lt; 100000; $i++) {
  imagesetpixel($gd, round($x), round($y), $red);
  $a = rand(0, 2);
  $x = ($x + $corners[$a]['x']) / 2;
$y = ($y + $corners[$a]['y']) / 2;
}

header('Content-Type: image/png');
imagepng($gd);

?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagesetpixel()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagesetpixel.png)


### Ver también

- [imagecreatetruecolor()](#function.imagecreatetruecolor) - Crea una nueva imagen en colores verdaderos

- [imagecolorallocate()](#function.imagecolorallocate) - Asigna una coloración para una imagen

- [imagecolorat()](#function.imagecolorat) - Devuelve el índice del color de un píxel dado

# imagesetstyle

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

imagesetstyle — Configura el estilo para el dibujo de líneas

### Descripción

**imagesetstyle**([GdImage](#class.gdimage) $image, [array](#language.types.array) $style): [bool](#language.types.boolean)

**imagesetstyle()** permite seleccionar el estilo a utilizar
al dibujar líneas (como con las funciones [imageline()](#function.imageline)
y [imagepolygon()](#function.imagepolygon)) al utilizar la
color especial **[IMG_COLOR_STYLED](#constant.img-color-styled)** o bien al
dibujar líneas con la color **[IMG_COLOR_STYLEDBRUSHED](#constant.img-color-styledbrushed)**.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     style


       Un array de colores de píxeles. Puede utilizarse la constante
       **[IMG_COLOR_TRANSPARENT](#constant.img-color-transparent)** para añadir
       un píxel transparente.
       Tenga en cuenta que style no debe ser un array [array](#language.types.array) vacío.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

El siguiente ejemplo dibuja una línea punteada desde la esquina superior
izquierda hacia la esquina inferior derecha de la imagen:

    **Ejemplo #1 Ejemplo para imagesetstyle()**

&lt;?php
header("Content-type: image/jpeg");
$im  = imagecreatetruecolor(100, 100);
$w = imagecolorallocate($im, 255, 255, 255);
$red = imagecolorallocate($im, 255, 0, 0);

/_ Dibuja una línea punteada de 5 píxeles rojos, 5 píxeles blancos _/
$style = array($red, $red, $red, $red, $red, $w, $w, $w, $w, $w);
imagesetstyle($im, $style);
imageline($im, 0, 0, 100, 100, IMG_COLOR_STYLED);

/_ Dibuja una línea con smileys, utilizando imagesetbrush() y imagesetstyle _/
$style = array($w, $w, $w, $w, $w, $w, $w, $w, $w, $w, $w, $w, $red);
imagesetstyle($im, $style);

$brush = imagecreatefrompng("http://www.libpng.org/pub/png/images/smile.happy.png");
$w2 = imagecolorallocate($brush, 255, 255, 255);
imagecolortransparent($brush, $w2);
imagesetbrush($im, $brush);
imageline($im, 100, 0, 0, 100, IMG_COLOR_STYLEDBRUSHED);

imagejpeg($im);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagesetstyle()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagesetstyle.jpg)


### Ver también

- [imagesetbrush()](#function.imagesetbrush) - Modifica el pincel para el dibujo de líneas

- [imageline()](#function.imageline) - Dibuja una línea

# imagesetthickness

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

imagesetthickness — Modifica el grosor de una línea

### Descripción

**imagesetthickness**([GdImage](#class.gdimage) $image, [int](#language.types.integer) $thickness): [bool](#language.types.boolean)

**imagesetthickness()** modifica el grosor
de las líneas en la imagen image. Este
grosor se aplica en los dibujos de polígonos,
círculos, rectángulos, etc. thickness
se expresa en píxeles.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     thickness


       El grosor, en píxeles.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagesetthickness()**

&lt;?php
// Creación de una imagen de 200x100
$im = imagecreatetruecolor(200, 100);
$white = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
$black = imagecolorallocate($im, 0x00, 0x00, 0x00);

// Establece el fondo en blanco
imagefilledrectangle($im, 0, 0, 299, 99, $white);

// Establece el grosor de la línea a 5
imagesetthickness($im, 5);

// Dibuja el rectángulo
imagerectangle($im, 14, 14, 185, 85, $black);

// Muestra la imagen en el navegador
header('Content-Type: image/png');

imagepng($im);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagesetthickness()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagesetthickness.png)


# imagesettile

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

imagesettile — Modifica la imagen utilizada para el mosaico

### Descripción

**imagesettile**([GdImage](#class.gdimage) $image, [GdImage](#class.gdimage) $tile): [bool](#language.types.boolean)

**imagesettile()** reemplaza la imagen de
pavimentación actual por la imagen tile,
a utilizar en todos los rellenos (como con las funciones
[imagefill()](#function.imagefill) y [imagefilledpolygon()](#function.imagefilledpolygon))
durante los rellenos con la opción **[IMG_COLOR_TILED](#constant.img-color-tiled)**.

Una imagen de mosaico es una imagen utilizada para rellenar una zona,
de manera repetitiva. _Cualquier imagen GD_
puede servir como imagen de relleno. El uso de la transparencia
(gestionada con la función [imagecolortransparent()](#function.imagecolortransparent)) permite que
ciertas zonas aparezcan a través del mosaico.

**Precaución**

    No hay nada que hacer cuando se ha terminado con un pincel,
    pero si se destruye la imagen del pincel (o se deja que PHP lo destruya), ya no DEBE utilizarse
    la opción **[IMG_COLOR_TILED](#constant.img-color-tiled)** de las funciones
    [imagefill()](#function.imagefill) y [imagefilledpolygon()](#function.imagefilledpolygon),
    antes de crear un nuevo pincel.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     tile


       El objeto de la imagen a utilizar como mosaico.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       image y tile ahora esperan
       instancias de [GdImage](#class.gdimage) ; anteriormente,
       se esperaban [resource](#language.types.resource)s.



### Ejemplos

    **Ejemplo #1 Ejemplo con imagesettile()**

&lt;?php
// Carga de una imagen externa
$zend = imagecreatefromgif('./zend.gif');

// Creación de una imagen de 200x200 píxeles
$im = imagecreatetruecolor(200, 200);

// Definición del mosaico
imagesettile($im, $zend);

// Repetición de la imagen
imagefilledrectangle($im, 0, 0, 199, 199, IMG_COLOR_TILED);

// Visualización en el navegador
header('Content-Type: image/png');

imagepng($im);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagesettile()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagesettile.png)


# imagestring

(PHP 4, PHP 5, PHP 7, PHP 8)

imagestring — Dibuja una cadena horizontal

### Descripción

**imagestring**(
    [GdImage](#class.gdimage) $image,
    [GdFont](#class.gdfont)|[int](#language.types.integer) $font,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [string](#language.types.string) $string,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

Dibuja una cadena en las coordenadas especificadas.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

font
Puede ser 1, 2, 3, 4, 5 para las fuentes internas de codificación Latin2
(donde los números más grandes corresponden a fuentes anchas) o una instancia
de [GdFont](#class.gdfont) retornado por [imageloadfont()](#function.imageloadfont).

     x


       X: coordenada de la esquina superior izquierda.






     y


       Y: coordenada de la esquina superior izquierda.






     string


       El string a escribir.






     color


       A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro font ahora acepta una instancia de [GdFont](#class.gdfont)
y un [int](#language.types.integer); anteriormente solo un [int](#language.types.integer) era aceptado.

8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagestring()**

&lt;?php
// Nueva imagen 100\*30
$im = imagecreate(100, 30);

// Fondo blanco y texto azul
$bg = imagecolorallocate($im, 255, 255, 255);
$textcolor = imagecolorallocate($im, 0, 0, 255);

// Añadir la frase en la esquina superior izquierda
imagestring($im, 5, 0, 0, 'Hello world!', $textcolor);

// Mostrar la imagen
header('Content-type: image/png');

imagepng($im);
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagestring()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagestring.png)


### Ver también

- [imagestringup()](#function.imagestringup) - Dibuja una cadena vertical

- [imageloadfont()](#function.imageloadfont) - Carga una nueva fuente

- [imagettftext()](#function.imagettftext) - Dibuja un texto con una fuente TrueType

# imagestringup

(PHP 4, PHP 5, PHP 7, PHP 8)

imagestringup — Dibuja una cadena vertical

### Descripción

**imagestringup**(
    [GdImage](#class.gdimage) $image,
    [GdFont](#class.gdfont)|[int](#language.types.integer) $font,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [string](#language.types.string) $string,
    [int](#language.types.integer) $color
): [bool](#language.types.boolean)

Dibuja una cadena en una línea vertical en la imagen
image en las coordenadas especificadas.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

font
Puede ser 1, 2, 3, 4, 5 para las fuentes internas de codificación Latin2
(donde los números más grandes corresponden a fuentes anchas) o una instancia
de [GdFont](#class.gdfont) retornado por [imageloadfont()](#function.imageloadfont).

     x


       Coordenada X del ángulo superior izquierdo.






     y


       Coordenada Y del ángulo superior izquierdo.






     string


       El [string](#language.types.string) a escribir.






     color


       A color identifier created with [imagecolorallocate()](#function.imagecolorallocate).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.1.0

El parámetro font ahora acepta una instancia de [GdFont](#class.gdfont)
y un [int](#language.types.integer); anteriormente solo un [int](#language.types.integer) era aceptado.

8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagestringup()**

&lt;?php
// Creación de una imagen de 100\*100 píxeles
$im = imagecreatetruecolor(100, 100);

// Dibuja un texto
$textcolor = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
imagestringup($im, 3, 40, 80, 'gd library', $textcolor);

// Guarda la imagen
imagepng($im, './stringup.png');
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagestringup()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagestringup.png)


### Ver también

- [imagestring()](#function.imagestring) - Dibuja una cadena horizontal

- [imageloadfont()](#function.imageloadfont) - Carga una nueva fuente

# imagesx

(PHP 4, PHP 5, PHP 7, PHP 8)

imagesx — Devuelve el ancho de una imagen

### Descripción

**imagesx**([GdImage](#class.gdimage) $image): [int](#language.types.integer)

Devuelve el ancho del objeto imagen image.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

### Valores devueltos

Devuelve el ancho de la imagen image.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagesx()**

&lt;?php

// Creación de una imagen de 300\*200
$img = imagecreatetruecolor(300, 200);

echo imagesx($img); // 300

?&gt;

### Ver también

- [imagecreatetruecolor()](#function.imagecreatetruecolor) - Crea una nueva imagen en colores verdaderos

- [getimagesize()](#function.getimagesize) - Devuelve el tamaño de una imagen

- [imagesy()](#function.imagesy) - Devuelve la altura de la imagen

# imagesy

(PHP 4, PHP 5, PHP 7, PHP 8)

imagesy — Devuelve la altura de la imagen

### Descripción

**imagesy**([GdImage](#class.gdimage) $image): [int](#language.types.integer)

Devuelve la altura de la imagen image.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

### Valores devueltos

Devuelve la altura de la imagen image.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Ejemplo con imagesy()**

&lt;?php

// Creación de una imagen 300\*200
$img = imagecreatetruecolor(300, 200);

echo imagesy($img); // 200

?&gt;

### Ver también

- [imagecreatetruecolor()](#function.imagecreatetruecolor) - Crea una nueva imagen en colores verdaderos

- [getimagesize()](#function.getimagesize) - Devuelve el tamaño de una imagen

- [imagesx()](#function.imagesx) - Devuelve el ancho de una imagen

# imagetruecolortopalette

(PHP 4 &gt;= 4.0.6, PHP 5, PHP 7, PHP 8)

imagetruecolortopalette — Convierte una imagen en colores verdaderos a imagen con paleta

### Descripción

**imagetruecolortopalette**([GdImage](#class.gdimage) $image, [bool](#language.types.boolean) $dither, [int](#language.types.integer) $num_colors): [bool](#language.types.boolean)

**imagetruecolortopalette()** convierte la imagen
en colores verdaderos image a imagen con paleta.
El código de esta función es directamente tomado de la biblioteca del
Independent JPEG Group, que es simplemente genial.
El código ha sido modificado para preservar la mayor parte del canal alfa en la nueva
paleta, además de conservar las colores lo mejor posible. Pero
esto no siempre funciona como se desea. En ese caso, es preferible
generar un resultado en colores verdaderos, lo que siempre proporciona el
mejor rendimiento.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     dither


       Indica si la imagen debe ser granulada - si se define como **[true](#constant.true)**,
       entonces la imagen será un poco más granulada pero la aproximación
       de los colores será mejor.






     num_colors


       El número máximo de colores en la paleta final.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Conversión de una imagen truecolor a una paleta**

&lt;?php
// Creación de una imagen truecolor
$im = imagecreatetruecolor(100, 100);

// Conversión a paleta de 255 colores
imagetruecolortopalette($im, false, 255);

// Guardado de la imagen
imagepng($im, './paletteimage.png');
?&gt;

# imagettfbbox

(PHP 4, PHP 5, PHP 7, PHP 8)

imagettfbbox — Devuelve el rectángulo que rodea un texto dibujado con una fuente TrueType

### Descripción

**imagettfbbox**(
    [float](#language.types.float) $size,
    [float](#language.types.float) $angle,
    [string](#language.types.string) $font_filename,
    [string](#language.types.string) $string,
    [array](#language.types.array) $options = []
): [array](#language.types.array)|[false](#language.types.singleton)

Calcula y devuelve el rectángulo que rodea el texto
text, escrito con una fuente TrueType.

**Nota**:

    Antes de PHP 8.0.0, [imageftbbox()](#function.imageftbbox) era una variante
    extendida de **imagettfbbox()** que además soporta
    extrainfo.
    A partir de PHP 8.0.0, **imagettfbbox()** es un alias de
    [imageftbbox()](#function.imageftbbox).

### Parámetros

     size

      The font size in points.





     angle


       El ángulo, en grados, en el que el parámetro string
       será medido.







     fontfile


       La ruta de acceso al fichero de la fuente TrueType que desea utilizar.




       Dependiendo de qué versión de la biblioteca GD esté utilizando PHP, *cuando
       fontfile no comienza con una barra diagonal inicial
       / entonces .ttf será añadido*
       al nombre del fichero y la biblioteca intentará buscar ese
       nombre de fichero a lo largo de una ruta de acceso de fuentes definida por la biblioteca.




       Al utilizar versiones de la biblioteca GD inferiores a 2.0.18, un carácter espacio,
       en lugar de un punto y coma, se utilizaba como 'separador de rutas' para diferentes ficheros de fuentes.
       El uso no intencional de esta característica resultará en el mensaje de advertencia:
       Advertencia: No se pudo encontrar/abrir la fuente. Para estas versiones afectadas, la
       única solución es mover la fuente a una ruta que no contenga espacios.




       En muchos casos donde una fuente reside en el mismo directorio que el script que la utiliza,
       el siguiente truco aliviará cualquier problema de inclusión.


&lt;?php
// Establecer la variable de entorno para GD
putenv('GDFONTPATH=' . realpath('.'));
// Nombre de la fuente a ser utilizada (note la falta de la extensión .ttf)
$font = 'SomeFont';
?&gt;

      **Nota**:



        Tenga en cuenta que [open_basedir](#ini.open-basedir) no
        *aplica* a fontfile.








     string


       La cadena a medir.






     options


       Similar a [imagettftext()](#function.imagettftext).





### Valores devueltos

**imagettfbbox()** devuelve un array con 8
elementos representando los 4 vértices del rectángulo
en caso de éxito, **[false](#constant.false)** si ocurre un error.

       Clave
       Significado






       0
       Esquina inferior izquierda, abscisa



       1
       Esquina inferior izquierda, ordenada



       2
       Esquina inferior derecha, abscisa



       3
       Esquina inferior derecha, ordenada



       4
       Esquina superior derecha, abscisa



       5
       Esquina superior derecha, ordenada



       6
       Esquina superior izquierda, abscisa



       7
       Esquina superior izquierda, ordenada




Las posiciones de los puntos son relativas al texto _text_,
independientemente del ángulo: esquina superior izquierda hace
referencia a la esquina superior izquierda del texto escrito
horizontalmente.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       El parámetro options ha sido añadido.



### Ejemplos

    **Ejemplo #1 Ejemplo con imagettfbbox()**

&lt;?php
// Creación de una imagen de 300x150 píxeles
$im = imagecreatetruecolor(300, 150);
$black = imagecolorallocate($im, 0, 0, 0);
$white = imagecolorallocate($im, 255, 255, 255);

// Define el fondo en blanco
imagefilledrectangle($im, 0, 0, 299, 299, $white);

// Ruta al archivo de la fuente
$font = './arial.ttf';

// Primero, creamos nuestro rectángulo que rodea nuestro primer texto
$bbox = imagettfbbox(10, 45, $font, 'Powered by PHP ' . phpversion());

// Nuestras coordenadas en X y en Y
$x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) - 25;
$y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 5;

// Dibujo del texto
imagettftext($im, 10, 45, $x, $y, $black, $font, 'Powered by PHP ' . phpversion());

// Creamos nuestro rectángulo que rodea nuestro segundo texto
$bbox = imagettfbbox(10, 45, $font, 'and Zend Engine ' . zend_version());

// Define las coordenadas para que el segundo texto siga al primero
$x = $bbox[0] + (imagesx($im) / 2) - ($bbox[4] / 2) + 10;
$y = $bbox[1] + (imagesy($im) / 2) - ($bbox[5] / 2) - 5;

// Dibujo del texto
imagettftext($im, 10, 45, $x, $y, $black, $font, 'and Zend Engine ' . zend_version());

// Envío al navegador
header('Content-Type: image/png');

imagepng($im);
?&gt;

### Notas

**Nota**: Esta función solo está disponible si
si PHP es compilado con soporte Freetype (**--with-freetype-dir=DIR**)

### Ver también

- [imagettftext()](#function.imagettftext) - Dibuja un texto con una fuente TrueType

- [imageftbbox()](#function.imageftbbox) - Calcula el rectángulo de delimitación para un texto, utilizando la fuente actual y freetype2

# imagettftext

(PHP 4, PHP 5, PHP 7, PHP 8)

imagettftext — Dibuja un texto con una fuente TrueType

### Descripción

**imagettftext**(
    [GdImage](#class.gdimage) $image,
    [float](#language.types.float) $size,
    [float](#language.types.float) $angle,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $color,
    [string](#language.types.string) $font_filename,
    [string](#language.types.string) $text,
    [array](#language.types.array) $options = []
): [array](#language.types.array)|[false](#language.types.singleton)

**imagettftext()** dibuja el texto text
con la fuente TrueType fontfile.

**Nota**:

    Antes de PHP 8.0.0, [imagefttext()](#function.imagefttext) era una variante
    extendida de **imagettftext()** que además soporta
    extrainfo.
    A partir de PHP 8.0.0, [imagefttext()](#function.imagefttext) es un alias de
    [imagefttext()](#function.imagefttext).

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     size

      The font size in points.





     angle


       El ángulo, en grados; 0 grados corresponde a la lectura del texto
       de izquierda a derecha. Los valores positivos representan una rotación
       en el sentido contrario a las agujas de un reloj. Por ejemplo,
       un valor de 90 corresponderá a una lectura del texto de abajo hacia arriba.






     x


       Las coordenadas dadas por x y
       y definirán la posición del primer carácter
       (la esquina inferior izquierda del carácter). Esto es diferente de la función
       [imagestring()](#function.imagestring), donde
       x y y definen
       la esquina superior izquierda del primer carácter. Por ejemplo, "superior izquierda"
       corresponde a 0, 0.






     y


       La coordenada Y. Esto define la posición de la línea base
       de la fuente, y no el fondo de los caracteres.






     color


       El índice del color. Utilizar un índice de color negativo desactivará
       el antialiasing. Ver la función [imagecolorallocate()](#function.imagecolorallocate).







     fontfile


       La ruta de acceso al fichero de la fuente TrueType que desea utilizar.




       Dependiendo de qué versión de la biblioteca GD esté utilizando PHP, *cuando
       fontfile no comienza con una barra diagonal inicial
       / entonces .ttf será añadido*
       al nombre del fichero y la biblioteca intentará buscar ese
       nombre de fichero a lo largo de una ruta de acceso de fuentes definida por la biblioteca.




       Al utilizar versiones de la biblioteca GD inferiores a 2.0.18, un carácter espacio,
       en lugar de un punto y coma, se utilizaba como 'separador de rutas' para diferentes ficheros de fuentes.
       El uso no intencional de esta característica resultará en el mensaje de advertencia:
       Advertencia: No se pudo encontrar/abrir la fuente. Para estas versiones afectadas, la
       única solución es mover la fuente a una ruta que no contenga espacios.




       En muchos casos donde una fuente reside en el mismo directorio que el script que la utiliza,
       el siguiente truco aliviará cualquier problema de inclusión.


&lt;?php
// Establecer la variable de entorno para GD
putenv('GDFONTPATH=' . realpath('.'));
// Nombre de la fuente a ser utilizada (note la falta de la extensión .ttf)
$font = 'SomeFont';
?&gt;

      **Nota**:



        Tenga en cuenta que [open_basedir](#ini.open-basedir) no
        *aplica* a fontfile.








     text


       La cadena de texto, en UTF-8.




       Puede incluir referencias a caracteres numéricos,
       decimales (en la forma: &amp;#8364;) para acceder a los caracteres
       de una fuente más allá del primer 127.
       El formato hexadecimal (como &amp;#xA9;) es soportado.
       Las cadenas de caracteres codificadas en UTF-8 pueden ser pasadas directamente.




       Las entidades nombradas, como &amp;copy;, no son soportadas. Utilice la
       función [html_entity_decode()](#function.html-entity-decode) para codificar estas entidades
       nombradas en cadena UTF-8.




       Si un carácter es utilizado en una cadena que no es soportada
       por la fuente, un rectángulo hueco reemplazará el carácter.






     options


       Un array con una clave linespacing que contiene un valor [float](#language.types.float).





### Valores devueltos

Devuelve un array de 8 elementos que representan cuatro puntos
que marcan los límites del texto. El orden de los puntos es: inferior
izquierdo, inferior derecho, superior derecho, superior izquierdo. Los
puntos son relativos al texto con respecto al ángulo, por lo que, "superior
izquierdo" significa en la esquina superior izquierda cuando se mira el texto horizontalmente.
Devuelve **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       El parámetro options ha sido añadido.



### Ejemplos

    **Ejemplo #1 Ejemplo con imagettftext()**



     Este ejemplo producirá una imagen PNG blanca de 400x30 píxeles,
     con el texto "Test..." en negro, con una sombra
     gris, utilizando la fuente Arial.

&lt;?php

// Definición del content-type
header('Content-Type: image/png');

// Creación de la imagen
$im = imagecreatetruecolor(400, 30);

// Creación de algunos colores
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 29, $white);

// El texto a dibujar
$text = 'Test...';

// Reemplazar la ruta por su propia ruta de fuente
$font = 'arial.ttf';

// Añadir sombras al texto
imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);

// Añadir el texto
imagettftext($im, 20, 0, 10, 20, $black, $font, $text);

// Utilizar imagepng() dará un texto más claro,
// comparado con el uso de la función imagejpeg()
imagepng($im);

?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Visualización del ejemplo: imagettftext()](php-bigxhtml-data/images/21009b70229598c6a80eef8b45bf282b-imagettftext.png)


### Notas

**Nota**: Esta función solo está disponible si
si PHP es compilado con soporte Freetype (**--with-freetype-dir=DIR**)

### Ver también

- [imagettfbbox()](#function.imagettfbbox) - Devuelve el rectángulo que rodea un texto dibujado con una fuente TrueType

- [imagefttext()](#function.imagefttext) - Escribe texto en una imagen con la fuente actual FreeType 2

- [imagestring()](#function.imagestring) - Dibuja una cadena horizontal

# imagetypes

(PHP 4 &gt;= 4.0.2, PHP 5, PHP 7, PHP 8)

imagetypes — Devuelve los tipos de imágenes soportados por la versión actual de PHP

### Descripción

**imagetypes**(): [int](#language.types.integer)

Devuelve un campo de octetos correspondiente a los formatos de imágenes soportados
por la versión de PHP utilizada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un campo de octetos correspondiente a los formatos de imágenes soportados
por la versión de GD utilizada. Los valores siguientes son posibles:
**[IMG_AVIF](#constant.img-avif)** | **[IMG_BMP](#constant.img-bmp)** |
**[IMG_GIF](#constant.img-gif)** | **[IMG_JPG](#constant.img-jpg)** |
**[IMG_PNG](#constant.img-png)** | **[IMG_WBMP](#constant.img-wbmp)** |
**[IMG_XPM](#constant.img-xpm)** | **[IMG_WEBP](#constant.img-webp)**.

### Historial de cambios

       Versión
       Descripción






       8.1.0

        Añadida la constante **[IMG_AVIF](#constant.img-avif)**.




       7.2.0

        Añadida la constante **[IMG_BMP](#constant.img-bmp)**.




       7.0.10

        Añadida la constante **[IMG_WEBP](#constant.img-webp)**.





### Ejemplos

    **Ejemplo #1 Ejemplo con imagetypes()**

&lt;?php
if (imagetypes() &amp; IMG_PNG) {
echo "El tipo PNG es soportado";
}
?&gt;

### Ver también

- [gd_info()](#function.gd-info) - Devuelve información sobre la biblioteca GD instalada

# imagewbmp

(PHP 4 &gt;= 4.0.1, PHP 5, PHP 7, PHP 8)

imagewbmp — Output image to browser or file

### Descripción

**imagewbmp**([GdImage](#class.gdimage) $image, [resource](#language.types.resource)|[string](#language.types.string)|[null](#language.types.null) $file = **[null](#constant.null)**, [?](#language.types.null)[int](#language.types.integer) $foreground_color = **[null](#constant.null)**): [bool](#language.types.boolean)

**imagewbmp()** muestra o guarda una versión
WBMP de la imagen image.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     file

      The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or **[null](#constant.null)**, the raw image stream will be output directly.





     foreground_color


       Puede seleccionarse el color de primer plano con este argumento.
       Utilice el identificador devuelto por [imagecolorallocate()](#function.imagecolorallocate)
       como valor de este argumento. El color de primer plano por omisión es negro.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Precaución**However, if libgd fails to output the image, this function returns **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

      8.0.0

       foreground_color ahora es nullable.



### Ejemplos

    **Ejemplo #1 Mostrar una imagen WBMP**

&lt;?php
// Creación de una imagen vacía y adición de texto
$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, 'Un texto simple', $text_color);

// Define el contenido del encabezado - en este caso, image/vnd.wap.wbmp
// Sugerencia: ver image_type_to_mime_type() para tipos de contenido
header('Content-Type: image/vnd.wap.wbmp');

// Mostrar la imagen
imagewbmp($im);

?&gt;

    **Ejemplo #2 Guardar la imagen WBMP**

&lt;?php
// Creación de una imagen vacía y adición de texto
$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, 'Un texto simple', $text_color);

// Guardar la imagen
imagewbmp($im, 'simpletext.wbmp');

?&gt;

    **Ejemplo #3 Mostrar la imagen con un primer plano diferente**

&lt;?php
// Creación de una imagen vacía y adición de texto
$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, 'Un texto simple', $text_color);

// Define el contenido del encabezado - en este caso, image/vnd.wap.wbmp
// Sugerencia: ver la función image_type_to_mime_type() para tipos de contenido
header('Content-type: image/vnd.wap.wbmp');

// Define un primer plano
$foreground_color = imagecolorallocate($im, 255, 0, 0);

imagewbmp($im, NULL, $foreground_color);

?&gt;

### Ver también

- [image2wbmp()](#function.image2wbmp) - Output image to browser or file

- [imagepng()](#function.imagepng) - Envía una imagen PNG a un navegador o a un fichero

- [imagegif()](#function.imagegif) - Output image to browser or file

- [imagejpeg()](#function.imagejpeg) - Output image to browser or file

- [imagetypes()](#function.imagetypes) - Devuelve los tipos de imágenes soportados por la versión actual de PHP

# imagewebp

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

imagewebp — Muestra una imagen WebP hacia un navegador o un fichero

### Descripción

**imagewebp**([GdImage](#class.gdimage) $image, [resource](#language.types.resource)|[string](#language.types.string)|[null](#language.types.null) $file = **[null](#constant.null)**, [int](#language.types.integer) $quality = -1): [bool](#language.types.boolean)

Muestra o guarda una versión WebP de la image proporcionada.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     file

      The path or an open stream resource (which is automatically closed after this function returns) to save the file to. If not set or **[null](#constant.null)**, the raw image stream will be output directly.





     quality


       quality rango de 0 (la peor calidad, fichero más pequeño)
       a 100 (mejor calidad, fichero más grande).
       Si se proporciona el valor -1, se utiliza el valor por omisión 80.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Precaución**However, if libgd fails to output the image, this function returns **[true](#constant.true)**.

### Errores/Excepciones

Genera una [ValueError](#class.valueerror) si quality es inválido.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Genera ahora una [ValueError](#class.valueerror) si quality es inválido.





8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

### Ejemplos

    **Ejemplo #1 Guardado de un fichero WebP**

&lt;?php
// Crea una imagen vacía y se añade texto
$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);

imagestring($im, 1, 5, 5, 'WebP con PHP', $text_color);

// Guardado de la imagen
imagewebp($im, 'php.webp');

?&gt;

# imagexbm

(PHP 5, PHP 7, PHP 8)

imagexbm — Genera una imagen en formato XBM

### Descripción

**imagexbm**([GdImage](#class.gdimage) $image, [?](#language.types.null)[string](#language.types.string) $filename, [?](#language.types.null)[int](#language.types.integer) $foreground_color = **[null](#constant.null)**): [bool](#language.types.boolean)

Muestra o guarda una versión XBM
de la imagen image.

**Nota**:

    **imagexbm()** no aplica relleno, por lo que
    el ancho de la imagen debe ser un múltiplo de 8. Esta restricción ya no
    se aplica a partir de PHP 7.0.9, respectivamente.

### Parámetros

image
Un objeto [GdImage](#class.gdimage), retornado por una de las funciones de
creación de imágenes, como [imagecreatetruecolor()](#function.imagecreatetruecolor).

     filename


       Ruta de acceso donde se guardará el fichero, en forma
       de [string](#language.types.string). Si no está definido, el flujo de imágenes RAW se
       mostrará directamente en la salida estándar.




       El nombre de fichero filename (sin la extensión .xbm)
       también se utiliza para los identificadores C del XBM, en cuyo caso los caracteres no alfanuméricos de la configuración local actual son reemplazados por subrayados. Si
       filename tiene el valor null,
       image se utiliza para generar los identificadores C.






     foreground_color


       Puede definirse el primer plano con este parámetro definiendo
       un identificador obtenido desde la función [imagecolorallocate()](#function.imagecolorallocate).
       Por omisión, el color del primer plano es negro. Todas las demás
       colores se tratan como fondo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Precaución**However, if libgd fails to output the image, this function returns **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.0.0

image expects a [GdImage](#class.gdimage)
instance now; previously, a valid gd [resource](#language.types.resource) was expected.

      8.0.0

       foreground_color ahora es nullable.




      8.0.0

       El cuarto parámetro, que no se utilizaba, ha sido eliminado.



### Ejemplos

    **Ejemplo #1 Guardar un fichero XBM**

&lt;?php
// Creación de una imagen vacía y adición de texto
$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, 'Un texto simple', $text_color);

// Guardar la imagen
imagexbm($im, 'simpletext.xbm');

?&gt;

    **Ejemplo #2 Guardar un fichero XBM con un color de primer plano diferente**

&lt;?php
// Creación de una imagen vacía y adición de texto
$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5, 'Un texto simple', $text_color);

// Definir el color de primer plano
$foreground_color = imagecolorallocate($im, 255, 0, 0);

// Guardar la imagen
imagexbm($im, NULL, $foreground_color);

?&gt;

# iptcembed

(PHP 4, PHP 5, PHP 7, PHP 8)

iptcembed — Incorpora datos binarios IPTC en una imagen JPEG

### Descripción

**iptcembed**([string](#language.types.string) $iptc_data, [string](#language.types.string) $filename, [int](#language.types.integer) $spool = 0): [string](#language.types.string)|[bool](#language.types.boolean)

**iptcembed()** incorpora datos binarios IPTC
en una imagen JPEG.

### Parámetros

     iptc_data


       Los datos a escribir.






     filename


       Ruta hacia el fichero JPEG.






     spool


       El flag de la bobina. Si la bobina es inferior a 2, entonces el fichero JPEG
       será devuelto en forma de [string](#language.types.string). De lo contrario el fichero JPEG será enviado a STDOUT.





### Valores devueltos

Si spool es inferior a 2, el fichero JPEG será devuelto,
o **[false](#constant.false)** si ocurre un error. De lo contrario devuelve **[true](#constant.true)** en caso de éxito
o **[false](#constant.false)** si ocurre un error.

### Ejemplos

**Ejemplo #1 Ejemplo con iptcembed()**

&lt;?php

// Función iptc_make_tag() por Thies C. Arntzen
function iptc_make_tag($rec, $data, $value)
{
    $length = strlen($value);
$retval = chr(0x1C) . chr($rec) . chr($data);

    if($length &lt; 0x8000)
    {
        $retval .= chr($length &gt;&gt; 8) .  chr($length &amp; 0xFF);
    }
    else
    {
        $retval .= chr(0x80) .
                   chr(0x04) .
                   chr(($length &gt;&gt; 24) &amp; 0xFF) .
                   chr(($length &gt;&gt; 16) &amp; 0xFF) .
                   chr(($length &gt;&gt; 8) &amp; 0xFF) .
                   chr($length &amp; 0xFF);
    }

    return $retval . $value;

}

// Ruta hacia el fichero JPEG
$path = './phplogo.jpg';

// Define las etiquetas IPTC
$iptc = array(
'2#120' =&gt; 'Test image',
'2#116' =&gt; 'Copyright 2008-2009, The PHP Group'
);

// Conversión de las etiquetas IPTC a código binario
$data = '';

foreach($iptc as $tag =&gt; $string)
{
    $tag = substr($tag, 2);
$data .= iptc_make_tag(2, $tag, $string);
}

// Incorporación de los datos IPTC
$content = iptcembed($data, $path);

// Escribe los datos de la nueva imagen en un fichero.
$fp = fopen($path, "wb");
fwrite($fp, $content);
fclose($fp);
?&gt;

### Notas

**Nota**:

Esta función no requiere la biblioteca GD.

# iptcparse

(PHP 4, PHP 5, PHP 7, PHP 8)

iptcparse — Analiza un bloque binario IPTC y busca las etiquetas simples

### Descripción

**iptcparse**([string](#language.types.string) $iptc_block): [array](#language.types.array)|[false](#language.types.singleton)

Analiza un bloque binario [» IPTC](http://www.iptc.org/) y busca las etiquetas simples.

### Parámetros

     iptc_block


       Un bloque binario IPTC.





### Valores devueltos

Retorna un array con las etiquetas como índices y los valores
de estas etiquetas IPTC en los valores del array correspondientes.
En caso de error, o si ninguna etiqueta IPTC ha sido encontrada, esta
función retorna **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con iptcparse() y [getimagesize()](#function.getimagesize)**

&lt;?php
$size = getimagesize('./test.jpg', $info);
if(isset($info['APP13']))
{
$iptc = iptcparse($info['APP13']);
var_dump($iptc);
}
?&gt;

### Notas

**Nota**:

Esta función no requiere la biblioteca GD.

# jpeg2wbmp

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7)

jpeg2wbmp — Convierte una imagen JPEG en imagen WBMP

**Advertencia**
Esta funcionalidad está _OBSOLETA_ a partir de PHP 7.2.0 y ha sido
_ELIMINADA_ a partir de PHP 8.0.0.

### Descripción

**jpeg2wbmp**(
    [string](#language.types.string) $jpegname,
    [string](#language.types.string) $wbmpname,
    [int](#language.types.integer) $dest_height,
    [int](#language.types.integer) $dest_width,
    [int](#language.types.integer) $threshold
): [bool](#language.types.boolean)

Convierte una imagen JPEG en imagen WBMP.

### Parámetros

     jpegname


       Ruta hacia el fichero JPEG.






     wbmpname


       Ruta hacia el fichero final WBMP.






     dest_height


       Altura de la imagen de destino.






     dest_width


       Ancho de la imagen de destino.






     threshold


       Valor del umbral, entre 0 y 8 inclusive.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Precaución**However, if libgd fails to output the image, this function returns **[true](#constant.true)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con jpeg2wbmp()**

&lt;?php
// Ruta hacia el objetivo jpeg
$path = './test.jpg';

// Obtención del tamaño de la imagen
$image = getimagesize($path);

// Conversión de la imagen
jpeg2wbmp($path, './test.wbmp', $image[1], $image[0], 5);
?&gt;

### Ver también

- [png2wbmp()](#function.png2wbmp) - Convierte una imagen PNG en imagen WBMP

# png2wbmp

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7)

png2wbmp — Convierte una imagen PNG en imagen WBMP

**Advertencia**
Esta funcionalidad está _OBSOLETA_ a partir de PHP 7.2.0 y ha sido
_ELIMINADA_ a partir de PHP 8.0.0.

### Descripción

**png2wbmp**(
    [string](#language.types.string) $pngname,
    [string](#language.types.string) $wbmpname,
    [int](#language.types.integer) $dest_height,
    [int](#language.types.integer) $dest_width,
    [int](#language.types.integer) $threshold
): [bool](#language.types.boolean)

Convierte una imagen PNG en imagen WBMP.

### Parámetros

     pngname


       Ruta al fichero PNG.






     wbmpname


       Ruta al fichero final WBMP.






     dest_height


       Altura de la imagen de destino.






     dest_width


       Ancho de la imagen de destino.






     threshold


       Valor del umbral, entre 0 y 8 inclusive.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

**Precaución**However, if libgd fails to output the image, this function returns **[true](#constant.true)**.

### Ejemplos

    **Ejemplo #1 Ejemplo con png2wbmp()**

&lt;?php
// Ruta a la imagen PNG
$path = './test.png';

// Obtención del tamaño de la imagen
$image = getimagesize($path);

// Conversión de la imagen
png2wbmp($path, './test.wbmp', $image[1], $image[0], 7);
?&gt;

### Ver también

- [jpeg2wbmp()](#function.jpeg2wbmp) - Convierte una imagen JPEG en imagen WBMP

## Tabla de contenidos

- [gd_info](#function.gd-info) — Devuelve información sobre la biblioteca GD instalada
- [getimagesize](#function.getimagesize) — Devuelve el tamaño de una imagen
- [getimagesizefromstring](#function.getimagesizefromstring) — Obtiene el tamaño de una imagen desde una cadena
- [image_type_to_extension](#function.image-type-to-extension) — Devuelve la extensión del fichero para el tipo de imagen
- [image_type_to_mime_type](#function.image-type-to-mime-type) — Lee el Mime-Type de un tipo de imagen
- [image2wbmp](#function.image2wbmp) — Output image to browser or file
- [imageaffine](#function.imageaffine) — Devuelve una imagen que contiene la imagen fuente transformada, utilizando opcionalmente una zona de recorte
- [imageaffinematrixconcat](#function.imageaffinematrixconcat) — Concatena dos matrices de transformación afín
- [imageaffinematrixget](#function.imageaffinematrixget) — Obtener una matriz de transformación afín
- [imagealphablending](#function.imagealphablending) — Modifica el modo de mezcla de una imagen
- [imageantialias](#function.imageantialias) — Activar o desactivar las funciones de antialias
- [imagearc](#function.imagearc) — Dibuja una elipse parcial
- [imageavif](#function.imageavif) — Output image to browser or file
- [imagebmp](#function.imagebmp) — Muestra o guarda una imagen BMP en el navegador o en un fichero
- [imagechar](#function.imagechar) — Dibuja un carácter horizontalmente
- [imagecharup](#function.imagecharup) — Dibuja un carácter verticalmente
- [imagecolorallocate](#function.imagecolorallocate) — Asigna una coloración para una imagen
- [imagecolorallocatealpha](#function.imagecolorallocatealpha) — Asigna un color a una imagen
- [imagecolorat](#function.imagecolorat) — Devuelve el índice del color de un píxel dado
- [imagecolorclosest](#function.imagecolorclosest) — Devuelve el índice de la color más cercana a una color dada
- [imagecolorclosestalpha](#function.imagecolorclosestalpha) — Devuelve el color más cercano, teniendo en cuenta el canal alpha
- [imagecolorclosesthwb](#function.imagecolorclosesthwb) — Obtiene el índice de la color especificada con su tono, blanco y negro
- [imagecolordeallocate](#function.imagecolordeallocate) — Elimina un color de una imagen
- [imagecolorexact](#function.imagecolorexact) — Devuelve el índice del color especificado
- [imagecolorexactalpha](#function.imagecolorexactalpha) — Devuelve el índice de un color con su canal alfa
- [imagecolormatch](#function.imagecolormatch) — Hace que las colores de la versión palette de una imagen coincidan más con las de su versión truecolor
- [imagecolorresolve](#function.imagecolorresolve) — Devuelve el índice de la color dada, o la más cercana posible
- [imagecolorresolvealpha](#function.imagecolorresolvealpha) — Devuelve un índice de color o su alternativa más cercana,
  incluyendo el canal alpha
- [imagecolorset](#function.imagecolorset) — Cambia el color en una paleta en el índice dado
- [imagecolorsforindex](#function.imagecolorsforindex) — Retorna el color asociado a un índice
- [imagecolorstotal](#function.imagecolorstotal) — Calcula el número de colores de una paleta
- [imagecolortransparent](#function.imagecolortransparent) — Define la color transparente
- [imageconvolution](#function.imageconvolution) — Aplica una matriz de convolución 3x3, utilizando el coeficiente y el desplazamiento
- [imagecopy](#function.imagecopy) — Copia una parte de una imagen
- [imagecopymerge](#function.imagecopymerge) — Copia y fusiona una parte de una imagen
- [imagecopymergegray](#function.imagecopymergegray) — Copia y fusiona una parte de una imagen en niveles de gris
- [imagecopyresampled](#function.imagecopyresampled) — Copia, redimensiona y reinterpolación de una imagen
- [imagecopyresized](#function.imagecopyresized) — Copia y redimensiona una parte de una imagen
- [imagecreate](#function.imagecreate) — Crea una nueva imagen con paleta
- [imagecreatefromavif](#function.imagecreatefromavif) — Create a new image from file or URL
- [imagecreatefrombmp](#function.imagecreatefrombmp) — Create a new image from file or URL
- [imagecreatefromgd](#function.imagecreatefromgd) — Crea una nueva imagen a partir de un fichero GD o de una URL
- [imagecreatefromgd2](#function.imagecreatefromgd2) — Crea una nueva imagen a partir de un fichero GD2 o de una URL
- [imagecreatefromgd2part](#function.imagecreatefromgd2part) — Crea una nueva imagen a partir de una parte de un archivo GD2 o de una URL
- [imagecreatefromgif](#function.imagecreatefromgif) — Create a new image from file or URL
- [imagecreatefromjpeg](#function.imagecreatefromjpeg) — Create a new image from file or URL
- [imagecreatefrompng](#function.imagecreatefrompng) — Create a new image from file or URL
- [imagecreatefromstring](#function.imagecreatefromstring) — Crea una imagen a partir de una cadena
- [imagecreatefromtga](#function.imagecreatefromtga) — Create a new image from file or URL
- [imagecreatefromwbmp](#function.imagecreatefromwbmp) — Create a new image from file or URL
- [imagecreatefromwebp](#function.imagecreatefromwebp) — Create a new image from file or URL
- [imagecreatefromxbm](#function.imagecreatefromxbm) — Create a new image from file or URL
- [imagecreatefromxpm](#function.imagecreatefromxpm) — Create a new image from file or URL
- [imagecreatetruecolor](#function.imagecreatetruecolor) — Crea una nueva imagen en colores verdaderos
- [imagecrop](#function.imagecrop) — Recorta una imagen en el rectángulo dado
- [imagecropauto](#function.imagecropauto) — Recorta una imagen automáticamente utilizando uno de los modos disponibles
- [imagedashedline](#function.imagedashedline) — Dibuja una línea punteada
- [imagedestroy](#function.imagedestroy) — Destruye una imagen
- [imageellipse](#function.imageellipse) — Dibuja una elipse
- [imagefill](#function.imagefill) — Relleno
- [imagefilledarc](#function.imagefilledarc) — Dibuja un arco parcial y lo rellena
- [imagefilledellipse](#function.imagefilledellipse) — Dibuja una elipse llena
- [imagefilledpolygon](#function.imagefilledpolygon) — Dibuja un polígono relleno
- [imagefilledrectangle](#function.imagefilledrectangle) — Dibuja un rectángulo relleno
- [imagefilltoborder](#function.imagefilltoborder) — Rellena una región con un color específico
- [imagefilter](#function.imagefilter) — Aplica un filtro a una imagen
- [imageflip](#function.imageflip) — Devuelve una imagen utilizando el modo proporcionado
- [imagefontheight](#function.imagefontheight) — Devuelve la altura de la fuente
- [imagefontwidth](#function.imagefontwidth) — Devuelve el ancho de la fuente
- [imageftbbox](#function.imageftbbox) — Calcula el rectángulo de delimitación para un texto, utilizando la fuente actual y freetype2
- [imagefttext](#function.imagefttext) — Escribe texto en una imagen con la fuente actual FreeType 2
- [imagegammacorrect](#function.imagegammacorrect) — Aplica una corrección gamma a la imagen GD
- [imagegd](#function.imagegd) — Genera una imagen en formato GD, hacia el navegador o un fichero
- [imagegd2](#function.imagegd2) — Genera una imagen en formato GD2, hacia el navegador o un fichero
- [imagegetclip](#function.imagegetclip) — Obtiene el rectángulo de recorte
- [imagegetinterpolation](#function.imagegetinterpolation) — Obtiene el método de interpolación
- [imagegif](#function.imagegif) — Output image to browser or file
- [imagegrabscreen](#function.imagegrabscreen) — Captura la pantalla completa
- [imagegrabwindow](#function.imagegrabwindow) — Captura una ventana
- [imageinterlace](#function.imageinterlace) — Activa o desactiva el entrelazado
- [imageistruecolor](#function.imageistruecolor) — Determina si una imagen es una imagen truecolor
- [imagejpeg](#function.imagejpeg) — Output image to browser or file
- [imagelayereffect](#function.imagelayereffect) — Activa la opción de mezcla alfa para utilizar los efectos de libgd
- [imageline](#function.imageline) — Dibuja una línea
- [imageloadfont](#function.imageloadfont) — Carga una nueva fuente
- [imageopenpolygon](#function.imageopenpolygon) — Dibuja un polígono abierto
- [imagepalettecopy](#function.imagepalettecopy) — Copia la paleta de una imagen a otra
- [imagepalettetotruecolor](#function.imagepalettetotruecolor) — Convierte una imagen basada en una paleta a color verdadero
- [imagepng](#function.imagepng) — Envía una imagen PNG a un navegador o a un fichero
- [imagepolygon](#function.imagepolygon) — Dibuja un polígono
- [imagerectangle](#function.imagerectangle) — Dibuja un rectángulo
- [imageresolution](#function.imageresolution) — Recupera o define la resolución de la imagen
- [imagerotate](#function.imagerotate) — Rota una imagen en un ángulo
- [imagesavealpha](#function.imagesavealpha) — Determina si la información completa del canal alpha debe conservarse al guardar imágenes
- [imagescale](#function.imagescale) — Redimensiona una imagen utilizando una altura y una anchura proporcionadas
- [imagesetbrush](#function.imagesetbrush) — Modifica el pincel para el dibujo de líneas
- [imagesetclip](#function.imagesetclip) — Establece el rectángulo de recorte
- [imagesetinterpolation](#function.imagesetinterpolation) — Define el método de interpolación
- [imagesetpixel](#function.imagesetpixel) — Dibuja un píxel
- [imagesetstyle](#function.imagesetstyle) — Configura el estilo para el dibujo de líneas
- [imagesetthickness](#function.imagesetthickness) — Modifica el grosor de una línea
- [imagesettile](#function.imagesettile) — Modifica la imagen utilizada para el mosaico
- [imagestring](#function.imagestring) — Dibuja una cadena horizontal
- [imagestringup](#function.imagestringup) — Dibuja una cadena vertical
- [imagesx](#function.imagesx) — Devuelve el ancho de una imagen
- [imagesy](#function.imagesy) — Devuelve la altura de la imagen
- [imagetruecolortopalette](#function.imagetruecolortopalette) — Convierte una imagen en colores verdaderos a imagen con paleta
- [imagettfbbox](#function.imagettfbbox) — Devuelve el rectángulo que rodea un texto dibujado con una fuente TrueType
- [imagettftext](#function.imagettftext) — Dibuja un texto con una fuente TrueType
- [imagetypes](#function.imagetypes) — Devuelve los tipos de imágenes soportados por la versión actual de PHP
- [imagewbmp](#function.imagewbmp) — Output image to browser or file
- [imagewebp](#function.imagewebp) — Muestra una imagen WebP hacia un navegador o un fichero
- [imagexbm](#function.imagexbm) — Genera una imagen en formato XBM
- [iptcembed](#function.iptcembed) — Incorpora datos binarios IPTC en una imagen JPEG
- [iptcparse](#function.iptcparse) — Analiza un bloque binario IPTC y busca las etiquetas simples
- [jpeg2wbmp](#function.jpeg2wbmp) — Convierte una imagen JPEG en imagen WBMP
- [png2wbmp](#function.png2wbmp) — Convierte una imagen PNG en imagen WBMP

# La clase GdImage

(PHP 8)

## Introducción

    Una clase totalmente opaca que reemplaza los recursos gd a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **GdImage**
     {

}

# La clase GdFont

(PHP 8 &gt;= 8.1.0)

## Introducción

    Una clase completamente opaca que reemplaza el [resource](#language.types.resource)
    gd font a partir de PHP 8.1.0.

## Sinopsis de la Clase

     final
     class **GdFont**
     {

}

- [Introducción](#intro.image)
- [Instalación/Configuración](#image.setup)<li>[Requerimientos](#image.requirements)
- [Instalación](#image.installation)
- [Configuración en tiempo de ejecución](#image.configuration)
- [Tipos de recursos](#image.resources)
  </li>- [Constantes predefinidas](#image.constants)
- [Ejemplos](#image.examples)<li>[Creación de una imagen PNG con PHP](#image.examples-png)
- [Añadir un sello digital a imágenes utilizando un canal Alpha](#image.examples-watermark)
- [Ejemplo con imagecopymerge para crear un
sello digital translúcido](#image.examples.merged-watermark)
  </li>- [Funciones de GD e Imágenes](#ref.image)<li>[gd_info](#function.gd-info) — Devuelve información sobre la biblioteca GD instalada
- [getimagesize](#function.getimagesize) — Devuelve el tamaño de una imagen
- [getimagesizefromstring](#function.getimagesizefromstring) — Obtiene el tamaño de una imagen desde una cadena
- [image_type_to_extension](#function.image-type-to-extension) — Devuelve la extensión del fichero para el tipo de imagen
- [image_type_to_mime_type](#function.image-type-to-mime-type) — Lee el Mime-Type de un tipo de imagen
- [image2wbmp](#function.image2wbmp) — Output image to browser or file
- [imageaffine](#function.imageaffine) — Devuelve una imagen que contiene la imagen fuente transformada, utilizando opcionalmente una zona de recorte
- [imageaffinematrixconcat](#function.imageaffinematrixconcat) — Concatena dos matrices de transformación afín
- [imageaffinematrixget](#function.imageaffinematrixget) — Obtener una matriz de transformación afín
- [imagealphablending](#function.imagealphablending) — Modifica el modo de mezcla de una imagen
- [imageantialias](#function.imageantialias) — Activar o desactivar las funciones de antialias
- [imagearc](#function.imagearc) — Dibuja una elipse parcial
- [imageavif](#function.imageavif) — Output image to browser or file
- [imagebmp](#function.imagebmp) — Muestra o guarda una imagen BMP en el navegador o en un fichero
- [imagechar](#function.imagechar) — Dibuja un carácter horizontalmente
- [imagecharup](#function.imagecharup) — Dibuja un carácter verticalmente
- [imagecolorallocate](#function.imagecolorallocate) — Asigna una coloración para una imagen
- [imagecolorallocatealpha](#function.imagecolorallocatealpha) — Asigna un color a una imagen
- [imagecolorat](#function.imagecolorat) — Devuelve el índice del color de un píxel dado
- [imagecolorclosest](#function.imagecolorclosest) — Devuelve el índice de la color más cercana a una color dada
- [imagecolorclosestalpha](#function.imagecolorclosestalpha) — Devuelve el color más cercano, teniendo en cuenta el canal alpha
- [imagecolorclosesthwb](#function.imagecolorclosesthwb) — Obtiene el índice de la color especificada con su tono, blanco y negro
- [imagecolordeallocate](#function.imagecolordeallocate) — Elimina un color de una imagen
- [imagecolorexact](#function.imagecolorexact) — Devuelve el índice del color especificado
- [imagecolorexactalpha](#function.imagecolorexactalpha) — Devuelve el índice de un color con su canal alfa
- [imagecolormatch](#function.imagecolormatch) — Hace que las colores de la versión palette de una imagen coincidan más con las de su versión truecolor
- [imagecolorresolve](#function.imagecolorresolve) — Devuelve el índice de la color dada, o la más cercana posible
- [imagecolorresolvealpha](#function.imagecolorresolvealpha) — Devuelve un índice de color o su alternativa más cercana,
  incluyendo el canal alpha
- [imagecolorset](#function.imagecolorset) — Cambia el color en una paleta en el índice dado
- [imagecolorsforindex](#function.imagecolorsforindex) — Retorna el color asociado a un índice
- [imagecolorstotal](#function.imagecolorstotal) — Calcula el número de colores de una paleta
- [imagecolortransparent](#function.imagecolortransparent) — Define la color transparente
- [imageconvolution](#function.imageconvolution) — Aplica una matriz de convolución 3x3, utilizando el coeficiente y el desplazamiento
- [imagecopy](#function.imagecopy) — Copia una parte de una imagen
- [imagecopymerge](#function.imagecopymerge) — Copia y fusiona una parte de una imagen
- [imagecopymergegray](#function.imagecopymergegray) — Copia y fusiona una parte de una imagen en niveles de gris
- [imagecopyresampled](#function.imagecopyresampled) — Copia, redimensiona y reinterpolación de una imagen
- [imagecopyresized](#function.imagecopyresized) — Copia y redimensiona una parte de una imagen
- [imagecreate](#function.imagecreate) — Crea una nueva imagen con paleta
- [imagecreatefromavif](#function.imagecreatefromavif) — Create a new image from file or URL
- [imagecreatefrombmp](#function.imagecreatefrombmp) — Create a new image from file or URL
- [imagecreatefromgd](#function.imagecreatefromgd) — Crea una nueva imagen a partir de un fichero GD o de una URL
- [imagecreatefromgd2](#function.imagecreatefromgd2) — Crea una nueva imagen a partir de un fichero GD2 o de una URL
- [imagecreatefromgd2part](#function.imagecreatefromgd2part) — Crea una nueva imagen a partir de una parte de un archivo GD2 o de una URL
- [imagecreatefromgif](#function.imagecreatefromgif) — Create a new image from file or URL
- [imagecreatefromjpeg](#function.imagecreatefromjpeg) — Create a new image from file or URL
- [imagecreatefrompng](#function.imagecreatefrompng) — Create a new image from file or URL
- [imagecreatefromstring](#function.imagecreatefromstring) — Crea una imagen a partir de una cadena
- [imagecreatefromtga](#function.imagecreatefromtga) — Create a new image from file or URL
- [imagecreatefromwbmp](#function.imagecreatefromwbmp) — Create a new image from file or URL
- [imagecreatefromwebp](#function.imagecreatefromwebp) — Create a new image from file or URL
- [imagecreatefromxbm](#function.imagecreatefromxbm) — Create a new image from file or URL
- [imagecreatefromxpm](#function.imagecreatefromxpm) — Create a new image from file or URL
- [imagecreatetruecolor](#function.imagecreatetruecolor) — Crea una nueva imagen en colores verdaderos
- [imagecrop](#function.imagecrop) — Recorta una imagen en el rectángulo dado
- [imagecropauto](#function.imagecropauto) — Recorta una imagen automáticamente utilizando uno de los modos disponibles
- [imagedashedline](#function.imagedashedline) — Dibuja una línea punteada
- [imagedestroy](#function.imagedestroy) — Destruye una imagen
- [imageellipse](#function.imageellipse) — Dibuja una elipse
- [imagefill](#function.imagefill) — Relleno
- [imagefilledarc](#function.imagefilledarc) — Dibuja un arco parcial y lo rellena
- [imagefilledellipse](#function.imagefilledellipse) — Dibuja una elipse llena
- [imagefilledpolygon](#function.imagefilledpolygon) — Dibuja un polígono relleno
- [imagefilledrectangle](#function.imagefilledrectangle) — Dibuja un rectángulo relleno
- [imagefilltoborder](#function.imagefilltoborder) — Rellena una región con un color específico
- [imagefilter](#function.imagefilter) — Aplica un filtro a una imagen
- [imageflip](#function.imageflip) — Devuelve una imagen utilizando el modo proporcionado
- [imagefontheight](#function.imagefontheight) — Devuelve la altura de la fuente
- [imagefontwidth](#function.imagefontwidth) — Devuelve el ancho de la fuente
- [imageftbbox](#function.imageftbbox) — Calcula el rectángulo de delimitación para un texto, utilizando la fuente actual y freetype2
- [imagefttext](#function.imagefttext) — Escribe texto en una imagen con la fuente actual FreeType 2
- [imagegammacorrect](#function.imagegammacorrect) — Aplica una corrección gamma a la imagen GD
- [imagegd](#function.imagegd) — Genera una imagen en formato GD, hacia el navegador o un fichero
- [imagegd2](#function.imagegd2) — Genera una imagen en formato GD2, hacia el navegador o un fichero
- [imagegetclip](#function.imagegetclip) — Obtiene el rectángulo de recorte
- [imagegetinterpolation](#function.imagegetinterpolation) — Obtiene el método de interpolación
- [imagegif](#function.imagegif) — Output image to browser or file
- [imagegrabscreen](#function.imagegrabscreen) — Captura la pantalla completa
- [imagegrabwindow](#function.imagegrabwindow) — Captura una ventana
- [imageinterlace](#function.imageinterlace) — Activa o desactiva el entrelazado
- [imageistruecolor](#function.imageistruecolor) — Determina si una imagen es una imagen truecolor
- [imagejpeg](#function.imagejpeg) — Output image to browser or file
- [imagelayereffect](#function.imagelayereffect) — Activa la opción de mezcla alfa para utilizar los efectos de libgd
- [imageline](#function.imageline) — Dibuja una línea
- [imageloadfont](#function.imageloadfont) — Carga una nueva fuente
- [imageopenpolygon](#function.imageopenpolygon) — Dibuja un polígono abierto
- [imagepalettecopy](#function.imagepalettecopy) — Copia la paleta de una imagen a otra
- [imagepalettetotruecolor](#function.imagepalettetotruecolor) — Convierte una imagen basada en una paleta a color verdadero
- [imagepng](#function.imagepng) — Envía una imagen PNG a un navegador o a un fichero
- [imagepolygon](#function.imagepolygon) — Dibuja un polígono
- [imagerectangle](#function.imagerectangle) — Dibuja un rectángulo
- [imageresolution](#function.imageresolution) — Recupera o define la resolución de la imagen
- [imagerotate](#function.imagerotate) — Rota una imagen en un ángulo
- [imagesavealpha](#function.imagesavealpha) — Determina si la información completa del canal alpha debe conservarse al guardar imágenes
- [imagescale](#function.imagescale) — Redimensiona una imagen utilizando una altura y una anchura proporcionadas
- [imagesetbrush](#function.imagesetbrush) — Modifica el pincel para el dibujo de líneas
- [imagesetclip](#function.imagesetclip) — Establece el rectángulo de recorte
- [imagesetinterpolation](#function.imagesetinterpolation) — Define el método de interpolación
- [imagesetpixel](#function.imagesetpixel) — Dibuja un píxel
- [imagesetstyle](#function.imagesetstyle) — Configura el estilo para el dibujo de líneas
- [imagesetthickness](#function.imagesetthickness) — Modifica el grosor de una línea
- [imagesettile](#function.imagesettile) — Modifica la imagen utilizada para el mosaico
- [imagestring](#function.imagestring) — Dibuja una cadena horizontal
- [imagestringup](#function.imagestringup) — Dibuja una cadena vertical
- [imagesx](#function.imagesx) — Devuelve el ancho de una imagen
- [imagesy](#function.imagesy) — Devuelve la altura de la imagen
- [imagetruecolortopalette](#function.imagetruecolortopalette) — Convierte una imagen en colores verdaderos a imagen con paleta
- [imagettfbbox](#function.imagettfbbox) — Devuelve el rectángulo que rodea un texto dibujado con una fuente TrueType
- [imagettftext](#function.imagettftext) — Dibuja un texto con una fuente TrueType
- [imagetypes](#function.imagetypes) — Devuelve los tipos de imágenes soportados por la versión actual de PHP
- [imagewbmp](#function.imagewbmp) — Output image to browser or file
- [imagewebp](#function.imagewebp) — Muestra una imagen WebP hacia un navegador o un fichero
- [imagexbm](#function.imagexbm) — Genera una imagen en formato XBM
- [iptcembed](#function.iptcembed) — Incorpora datos binarios IPTC en una imagen JPEG
- [iptcparse](#function.iptcparse) — Analiza un bloque binario IPTC y busca las etiquetas simples
- [jpeg2wbmp](#function.jpeg2wbmp) — Convierte una imagen JPEG en imagen WBMP
- [png2wbmp](#function.png2wbmp) — Convierte una imagen PNG en imagen WBMP
  </li>- [GdImage](#class.gdimage) — La clase GdImage
- [GdFont](#class.gdfont) — La clase GdFont
