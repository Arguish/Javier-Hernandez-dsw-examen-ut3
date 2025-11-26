# Tratamiento de imágenes (ImageMagick)

# Introducción

Imagick es una extensión PHP nativa para crear y modificar imágenes,
utilizando la API ImageMagick.

## Acerca de ImageMagick

**Advertencia**
Esta extensión es _EXPERIMENTAL_. El comportamiento de esta extensión, los nombres de sus funciones,
y toda la documentación alrededor de esta extensión puede cambiar sin previo aviso en una próxima versión de PHP.
Esta extensión debe ser utilizada bajo su propio riesgo.

    ImageMagick es una suite de software que permite la creación, edición y composición de imágenes bitmap.
    Puede leer, convertir y escribir imágenes en diversos formatos (más de 100)
    entre los que se incluyen DPX, EXR, GIF, JPEG, JPEG-2000, PDF, PhotoCD, PNG, Postscript, SVG y TIFF.


    ImageMagick Studio LLC, una organización sin fines de lucro
    cuyo objetivo es hacer disponible libremente el software relativo
    a la manipulación de imágenes.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#imagick.requirements)
- [Instalación](#imagick.installation)
- [Configuración en tiempo de ejecución](#imagick.configuration)

    ## Requerimientos

    ## Configuración necesaria para la instalación en plataformas distintas de Windows

        Se requiere ImageMagick &gt;= 6.2.4. El número de formatos soportados
        por Imagick depende totalmente de los soportados por la instalación
        de ImageMagick. Por ejemplo, Imagemagick necesita ghostscript para realizar
        las operaciones relativas a los PDF.

    ## Instalación

    Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/imagick](https://pecl.php.net/package/imagick).

    **Nota**:

        El nombre oficial de esta extensión es *imagick*.

    Los usuarios de Windows pueden descargar una DLL preconstruida desde
    el sitio de PECL : [» PECL](https://pecl.php.net/package/imagick).
    Estos paquetes contienen ya la DLL de extensión (php_imagick.dll)
    que debe ser colocada en el [extension_dir](#ini.extension-dir).
    Contienen también las DLL de ImageMagick, que deben ser colocadas en algún lugar del PATH.
    A partir de Imagick 3.6.0, contienen también archivos de configuración XML en config;
    para usarlos en lugar de los valores por omisión integrados,
    deben ser colocados en %USERPROFILE%/.config/ImageMagick,
    o alternativamente en el camino dado por la variable de entorno MAGICK_CONFIGURE_PATH.
    Consúltense la [» Documentación sobre los archivos de configuración de ImageMagick](http://www.imagemagick.org/script/resources.php) para más detalles.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de configuración de Imagick**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [imagick.locale_fix](#ini.imagick.locale-fix)
      **[false](#constant.false)**
      **[INI_ALL](#constant.ini-all)**
      Disponible a partir de 2.1.0



      [imagick.progress_monitor](#ini.imagick.progress-monitor)
      **[false](#constant.false)**
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de Imagick 2.2.2



      [imagick.skip_version_check](#ini.imagick.skip-version-check)
      **[false](#constant.false)**
      **[INI_SYSTEM](#constant.ini-system)**
      Disponible a partir de Imagick 3.3.0


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     imagick.locale_fix
     [bool](#language.types.boolean)



      Corrige un error en el dibujo cuando las configuraciones locales utilizan
      el carácter ',' como separadores.








     imagick.progress_monitor
     [bool](#language.types.boolean)



      Se utiliza para activar la supervisión de la progresión de la imagen.









     imagick.skip_version_check
     [bool](#language.types.boolean)



      Cuando Imagick se carga, se verifica el número de versión de ImageMagick
      utilizado durante la compilación, y se compara con el número de versión
      actualmente utilizado; se emite una alerta si las dos versiones no coinciden.
      Esta alerta puede ser eliminada activando esta opción de configuración.




      El uso de una versión de Imagick diferente a la versión de ImageMagick no es recomendado.
      Aunque esto puede funcionar, puede resultar en errores aleatorios o comportamientos no definidos.


# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

**Constantes COLOR\_\***
Constantes sobre los tipos de color. Estas constantes
se utilizan principalmente con la clase [ImagickPixel](#class.imagickpixel).

    **[imagick::COLOR_BLACK](#imagick.constants.color-black)**
    ([int](#language.types.integer))



     Color negro





    **[imagick::COLOR_BLUE](#imagick.constants.color-blue)**
    ([int](#language.types.integer))



     Color azul





    **[imagick::COLOR_CYAN](#imagick.constants.color-cyan)**
    ([int](#language.types.integer))



     Color cian





    **[imagick::COLOR_GREEN](#imagick.constants.color-green)**
    ([int](#language.types.integer))



     Color verde





    **[imagick::COLOR_RED](#imagick.constants.color-red)**
    ([int](#language.types.integer))



     Color rojo





    **[imagick::COLOR_YELLOW](#imagick.constants.color-yellow)**
    ([int](#language.types.integer))



     Color amarillo





    **[imagick::COLOR_MAGENTA](#imagick.constants.color-magenta)**
    ([int](#language.types.integer))



     Color magenta





    **[imagick::COLOR_OPACITY](#imagick.constants.color-opacity)**
    ([int](#language.types.integer))



     Color de la opacidad





    **[imagick::COLOR_ALPHA](#imagick.constants.color-alpha)**
    ([int](#language.types.integer))



     Color del alpha





    **[imagick::COLOR_FUZZ](#imagick.constants.color-fuzz)**
    ([int](#language.types.integer))



     Color del fuzz

**Constantes DISPOSE\_\***
Constantes relativas a los tipos de disposición

    **[imagick::DISPOSE_UNRECOGNIZED](#imagick.constants.dispose-unrecognized)**
    ([int](#language.types.integer))



     Tipo de disposición no reconocido





    **[imagick::DISPOSE_UNDEFINED](#imagick.constants.dispose-undefined)**
    ([int](#language.types.integer))



     Tipo de disposición no definido





    **[imagick::DISPOSE_NONE](#imagick.constants.dispose-none)**
    ([int](#language.types.integer))



     Ningún tipo de disposición





    **[imagick::DISPOSE_BACKGROUND](#imagick.constants.dispose-background)**
    ([int](#language.types.integer))



     Disposición del fondo





    **[imagick::DISPOSE_PREVIOUS](#imagick.constants.dispose-previous)**
    ([int](#language.types.integer))



     Disposición previa

**Constantes COMPOSITE\_\***

    **[imagick::COMPOSITE_DEFAULT](#imagick.constants.composite-default)**
    ([int](#language.types.integer))



     El operador de composición por defecto.





    **[imagick::COMPOSITE_UNDEFINED](#imagick.constants.composite-undefined)**
    ([int](#language.types.integer))



     Operador de composición indefinido





    **[imagick::COMPOSITE_NO](#imagick.constants.composite-no)**
    ([int](#language.types.integer))



     No hay operador de composición definido





    **[imagick::COMPOSITE_ADD](#imagick.constants.composite-add)**
    ([int](#language.types.integer))



     El resultado de imagen + imagen





    **[imagick::COMPOSITE_ATOP](#imagick.constants.composite-atop)**
    ([int](#language.types.integer))



     El resultado tiene la misma forma que la imagen, con la imagen compuesta que llena
     la imagen donde la forma de la imagen se superpone a la imagen





    **[imagick::COMPOSITE_BLEND](#imagick.constants.composite-blend)**
    ([int](#language.types.integer))



     Combina las imágenes imagen (mezcla)





    **[imagick::COMPOSITE_BUMPMAP](#imagick.constants.composite-bumpmap)**
    ([int](#language.types.integer))



     Lo mismo que COMPOSITE_MULTIPLY, excepto que la fuente se
     convierte primero a niveles de gris





    **[imagick::COMPOSITE_CLEAR](#imagick.constants.composite-clear)**
    ([int](#language.types.integer))



     Hace que la imagen de destino sea transparente





    **[imagick::COMPOSITE_COLORBURN](#imagick.constants.composite-colorburn)**
    ([int](#language.types.integer))



     Oscurece la imagen de destino para reflejar la imagen fuente





    **[imagick::COMPOSITE_COLORDODGE](#imagick.constants.composite-colordodge)**
    ([int](#language.types.integer))



     Aclara la imagen de destino para reflejar la imagen fuente





    **[imagick::COMPOSITE_COLORIZE](#imagick.constants.composite-colorize)**
    ([int](#language.types.integer))



     Colorea la imagen de destino con la imagen compuesta





    **[imagick::COMPOSITE_COPYBLACK](#imagick.constants.composite-copyblack)**
    ([int](#language.types.integer))



     Copia el negro de la fuente al destino





    **[imagick::COMPOSITE_COPYBLUE](#imagick.constants.composite-copyblue)**
    ([int](#language.types.integer))



     Copia el azul de la fuente al destino





    **[imagick::COMPOSITE_COPY](#imagick.constants.composite-copy)**
    ([int](#language.types.integer))



     Copia la fuente al destino





    **[imagick::COMPOSITE_COPYCYAN](#imagick.constants.composite-copycyan)**
    ([int](#language.types.integer))



     Copia el cian de la fuente al destino





    **[imagick::COMPOSITE_COPYGREEN](#imagick.constants.composite-copygreen)**
    ([int](#language.types.integer))



     Copia el verde de la fuente al destino





    **[imagick::COMPOSITE_COPYMAGENTA](#imagick.constants.composite-copymagenta)**
    ([int](#language.types.integer))



     Copia el magenta de la fuente al destino





    **[imagick::COMPOSITE_COPYOPACITY](#imagick.constants.composite-copyopacity)**
    ([int](#language.types.integer))



     Copia la opacidad de la fuente al destino





    **[imagick::COMPOSITE_COPYRED](#imagick.constants.composite-copyred)**
    ([int](#language.types.integer))



     Copia el rojo de la fuente al destino





    **[imagick::COMPOSITE_COPYYELLOW](#imagick.constants.composite-copyyellow)**
    ([int](#language.types.integer))



     Copia el amarillo de la fuente al destino





    **[imagick::COMPOSITE_DARKEN](#imagick.constants.composite-darken)**
    ([int](#language.types.integer))



     Oscurece la imagen de destino





    **[imagick::COMPOSITE_DSTATOP](#imagick.constants.composite-dstatop)**
    ([int](#language.types.integer))



     La parte de la imagen de destino que está dentro de la
     fuente se compone con la fuente y se coloca en el destino.





    **[imagick::COMPOSITE_DST](#imagick.constants.composite-dst)**
    ([int](#language.types.integer))



     El destino se deja intacto





    **[imagick::COMPOSITE_DSTIN](#imagick.constants.composite-dstin)**
    ([int](#language.types.integer))



     La parte dentro de la fuente reemplaza el destino





    **[imagick::COMPOSITE_DSTOUT](#imagick.constants.composite-dstout)**
    ([int](#language.types.integer))



     La parte fuera de la fuente reemplaza el destino





    **[imagick::COMPOSITE_DSTOVER](#imagick.constants.composite-dstover)**
    ([int](#language.types.integer))



     El destino reemplaza la fuente





    **[imagick::COMPOSITE_DIFFERENCE](#imagick.constants.composite-difference)**
    ([int](#language.types.integer))



     Resta el color oscuro del color claro





    **[imagick::COMPOSITE_DISPLACE](#imagick.constants.composite-displace)**
    ([int](#language.types.integer))



     Desplaza los píxeles del destino según lo definido por la fuente





    **[imagick::COMPOSITE_DISSOLVE](#imagick.constants.composite-dissolve)**
    ([int](#language.types.integer))



     Disuelve la fuente en el destino





    **[imagick::COMPOSITE_EXCLUSION](#imagick.constants.composite-exclusion)**
    ([int](#language.types.integer))



     Produce un efecto similar a imagick::COMPOSITE_DIFFERENCE, pero
     con un contraste más bajo





    **[imagick::COMPOSITE_HARDLIGHT](#imagick.constants.composite-hardlight)**
    ([int](#language.types.integer))



     Multiplica o proyecta los colores, dependiendo del valor del color fuente





    **[imagick::COMPOSITE_HUE](#imagick.constants.composite-hue)**
    ([int](#language.types.integer))



     Modifica el matiz del destino, según lo definido por la fuente





    **[imagick::COMPOSITE_IN](#imagick.constants.composite-in)**
    ([int](#language.types.integer))



     Compone la fuente en el destino





    **[imagick::COMPOSITE_LIGHTEN](#imagick.constants.composite-lighten)**
    ([int](#language.types.integer))



     Aclara el destino, según lo definido por la fuente





    **[imagick::COMPOSITE_LUMINIZE](#imagick.constants.composite-luminize)**
    ([int](#language.types.integer))



     Ilumina el destino según lo definido por la fuente





    **[imagick::COMPOSITE_MINUS](#imagick.constants.composite-minus)**
    ([int](#language.types.integer))



     Resta la fuente del destino





    **[imagick::COMPOSITE_MODULATE](#imagick.constants.composite-modulate)**
    ([int](#language.types.integer))



     Modula la claridad del destino, su saturación y su matiz
     según lo definido por el destino





    **[imagick::COMPOSITE_MULTIPLY](#imagick.constants.composite-multiply)**
    ([int](#language.types.integer))



     Multiplica el destino con la fuente





    **[imagick::COMPOSITE_OUT](#imagick.constants.composite-out)**
    ([int](#language.types.integer))



     Compone el exterior de la fuente en el destino





    **[imagick::COMPOSITE_OVER](#imagick.constants.composite-over)**
    ([int](#language.types.integer))



     Compone la fuente sobre el destino





    **[imagick::COMPOSITE_OVERLAY](#imagick.constants.composite-overlay)**
    ([int](#language.types.integer))



     Superpone la fuente sobre el destino





    **[imagick::COMPOSITE_PLUS](#imagick.constants.composite-plus)**
    ([int](#language.types.integer))



     Añade la fuente sobre el destino





    **[imagick::COMPOSITE_REPLACE](#imagick.constants.composite-replace)**
    ([int](#language.types.integer))



     Reemplaza el destino con la fuente





    **[imagick::COMPOSITE_SATURATE](#imagick.constants.composite-saturate)**
    ([int](#language.types.integer))



     Satura el destino según lo definido por la fuente





    **[imagick::COMPOSITE_SCREEN](#imagick.constants.composite-screen)**
    ([int](#language.types.integer))



     La fuente y el destino se complementan, luego se multiplican y finalmente
     reemplazan el destino





    **[imagick::COMPOSITE_SOFTLIGHT](#imagick.constants.composite-softlight)**
    ([int](#language.types.integer))



     Oscurece o aclara los colores, según la fuente





    **[imagick::COMPOSITE_SRCATOP](#imagick.constants.composite-srcatop)**
    ([int](#language.types.integer))



     La parte de la fuente que está en el destino y compuesta sobre el destino





    **[imagick::COMPOSITE_SRC](#imagick.constants.composite-src)**
    ([int](#language.types.integer))



     La fuente se copia sobre el destino





    **[imagick::COMPOSITE_SRCIN](#imagick.constants.composite-srcin)**
    ([int](#language.types.integer))



     La parte de la fuente que está en el destino,
     reemplaza el destino.





    **[imagick::COMPOSITE_SRCOUT](#imagick.constants.composite-srcout)**
    ([int](#language.types.integer))



     La parte de la fuente que está fuera del destino reemplaza el destino





    **[imagick::COMPOSITE_SRCOVER](#imagick.constants.composite-srcover)**
    ([int](#language.types.integer))



     La fuente reemplaza el destino





    **[imagick::COMPOSITE_SUBTRACT](#imagick.constants.composite-subtract)**
    ([int](#language.types.integer))



     Resta los colores en la fuente en el destino





    **[imagick::COMPOSITE_THRESHOLD](#imagick.constants.composite-threshold)**
    ([int](#language.types.integer))



     La fuente se compone sobre el destino, según lo definido por los umbrales de la fuente





    **[imagick::COMPOSITE_XOR](#imagick.constants.composite-xor)**
    ([int](#language.types.integer))



     La parte de la fuente que está fuera del destino y combinada con
     la parte del destino que está fuera de la fuente

**Constantes MONTAGEMODE\_\***

    **[imagick::MONTAGEMODE_FRAME](#imagick.constants.montagemode-frame)**
    ([int](#language.types.integer))








    **[imagick::MONTAGEMODE_UNFRAME](#imagick.constants.montagemode-unframe)**
    ([int](#language.types.integer))








    **[imagick::MONTAGEMODE_CONCATENATE](#imagick.constants.montagemode-concatenate)**
    ([int](#language.types.integer))

**Constantes STYLE\_\***

    **[imagick::STYLE_NORMAL](#imagick.constants.style-normal)**
    ([int](#language.types.integer))








    **[imagick::STYLE_ITALIC](#imagick.constants.style-italic)**
    ([int](#language.types.integer))








    **[imagick::STYLE_OBLIQUE](#imagick.constants.style-oblique)**
    ([int](#language.types.integer))








    **[imagick::STYLE_ANY](#imagick.constants.style-any)**
    ([int](#language.types.integer))

**Constantes [FILTER\_\*](#constant.filter-flag-none)**

    **[imagick::FILTER_UNDEFINED](#imagick.constants.filter-undefined)**
    ([int](#language.types.integer))








    **[imagick::FILTER_POINT](#imagick.constants.filter-point)**
    ([int](#language.types.integer))








    **[imagick::FILTER_BOX](#imagick.constants.filter-box)**
    ([int](#language.types.integer))








    **[imagick::FILTER_TRIANGLE](#imagick.constants.filter-triangle)**
    ([int](#language.types.integer))








    **[imagick::FILTER_HERMITE](#imagick.constants.filter-hermite)**
    ([int](#language.types.integer))








    **[imagick::FILTER_HANNING](#imagick.constants.filter-hanning)**
    ([int](#language.types.integer))








    **[imagick::FILTER_HAMMING](#imagick.constants.filter-hamming)**
    ([int](#language.types.integer))








    **[imagick::FILTER_BLACKMAN](#imagick.constants.filter-blackman)**
    ([int](#language.types.integer))








    **[imagick::FILTER_GAUSSIAN](#imagick.constants.filter-gaussian)**
    ([int](#language.types.integer))








    **[imagick::FILTER_QUADRATIC](#imagick.constants.filter-quadratic)**
    ([int](#language.types.integer))








    **[imagick::FILTER_CUBIC](#imagick.constants.filter-cubic)**
    ([int](#language.types.integer))








    **[imagick::FILTER_CATROM](#imagick.constants.filter-catrom)**
    ([int](#language.types.integer))








    **[imagick::FILTER_MITCHELL](#imagick.constants.filter-mitchell)**
    ([int](#language.types.integer))








    **[imagick::FILTER_LANCZOS](#imagick.constants.filter-lanczos)**
    ([int](#language.types.integer))








    **[imagick::FILTER_BESSEL](#imagick.constants.filter-bessel)**
    ([int](#language.types.integer))








    **[imagick::FILTER_SINC](#imagick.constants.filter-sinc)**
    ([int](#language.types.integer))

**Constantes IMGTYPE\_\***

    **[imagick::IMGTYPE_UNDEFINED](#imagick.constants.imgtype-undefined)**
    ([int](#language.types.integer))








    **[imagick::IMGTYPE_BILEVEL](#imagick.constants.imgtype-bilevel)**
    ([int](#language.types.integer))








    **[imagick::IMGTYPE_GRAYSCALE](#imagick.constants.imgtype-grayscale)**
    ([int](#language.types.integer))








    **[imagick::IMGTYPE_GRAYSCALEMATTE](#imagick.constants.imgtype-grayscalematte)**
    ([int](#language.types.integer))








    **[imagick::IMGTYPE_PALETTE](#imagick.constants.imgtype-palette)**
    ([int](#language.types.integer))








    **[imagick::IMGTYPE_PALETTEMATTE](#imagick.constants.imgtype-palettematte)**
    ([int](#language.types.integer))








    **[imagick::IMGTYPE_TRUECOLOR](#imagick.constants.imgtype-truecolor)**
    ([int](#language.types.integer))








    **[imagick::IMGTYPE_TRUECOLORMATTE](#imagick.constants.imgtype-truecolormatte)**
    ([int](#language.types.integer))








    **[imagick::IMGTYPE_COLORSEPARATION](#imagick.constants.imgtype-colorseparation)**
    ([int](#language.types.integer))








    **[imagick::IMGTYPE_COLORSEPARATIONMATTE](#imagick.constants.imgtype-colorseparationmatte)**
    ([int](#language.types.integer))








    **[imagick::IMGTYPE_OPTIMIZE](#imagick.constants.imgtype-optimize)**
    ([int](#language.types.integer))

**Constantes RESOLUTION\_\***

    **[imagick::RESOLUTION_UNDEFINED](#imagick.constants.resolution-undefined)**
    ([int](#language.types.integer))








    **[imagick::RESOLUTION_PIXELSPERINCH](#imagick.constants.resolution-pixelsperinch)**
    ([int](#language.types.integer))








    **[imagick::RESOLUTION_PIXELSPERCENTIMETER](#imagick.constants.resolution-pixelspercentimeter)**
    ([int](#language.types.integer))

**Constantes COMPRESSION\_\***

    **[imagick::COMPRESSION_UNDEFINED](#imagick.constants.compression-undefined)**
    ([int](#language.types.integer))








    **[imagick::COMPRESSION_NO](#imagick.constants.compression-no)**
    ([int](#language.types.integer))








    **[imagick::COMPRESSION_BZIP](#imagick.constants.compression-bzip)**
    ([int](#language.types.integer))








    **[imagick::COMPRESSION_FAX](#imagick.constants.compression-fax)**
    ([int](#language.types.integer))








    **[imagick::COMPRESSION_GROUP4](#imagick.constants.compression-group4)**
    ([int](#language.types.integer))








    **[imagick::COMPRESSION_JPEG](#imagick.constants.compression-jpeg)**
    ([int](#language.types.integer))








    **[imagick::COMPRESSION_JPEG2000](#imagick.constants.compression-jpeg2000)**
    ([int](#language.types.integer))








    **[imagick::COMPRESSION_LOSSLESSJPEG](#imagick.constants.compression-losslessjpeg)**
    ([int](#language.types.integer))








    **[imagick::COMPRESSION_LZW](#imagick.constants.compression-lzw)**
    ([int](#language.types.integer))








    **[imagick::COMPRESSION_RLE](#imagick.constants.compression-rle)**
    ([int](#language.types.integer))








    **[imagick::COMPRESSION_ZIP](#imagick.constants.compression-zip)**
    ([int](#language.types.integer))








    **[imagick::COMPRESSION_DXT1](#imagick.constants.compression-dxt1)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.0 o superior.





    **[imagick::COMPRESSION_DXT3](#imagick.constants.compression-dxt3)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.0 o superior.





    **[imagick::COMPRESSION_DXT5](#imagick.constants.compression-dxt5)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.0 o superior.

**Constantes PAINT\_\***

    **[imagick::PAINT_POINT](#imagick.constants.paint-point)**
    ([int](#language.types.integer))








    **[imagick::PAINT_REPLACE](#imagick.constants.paint-replace)**
    ([int](#language.types.integer))








    **[imagick::PAINT_FLOODFILL](#imagick.constants.paint-floodfill)**
    ([int](#language.types.integer))








    **[imagick::PAINT_FILLTOBORDER](#imagick.constants.paint-filltoborder)**
    ([int](#language.types.integer))








    **[imagick::PAINT_RESET](#imagick.constants.paint-reset)**
    ([int](#language.types.integer))

**Constantes GRAVITY\_\***

    **[imagick::GRAVITY_NORTHWEST](#imagick.constants.gravity-northwest)**
    ([int](#language.types.integer))








    **[imagick::GRAVITY_NORTH](#imagick.constants.gravity-north)**
    ([int](#language.types.integer))








    **[imagick::GRAVITY_NORTHEAST](#imagick.constants.gravity-northeast)**
    ([int](#language.types.integer))








    **[imagick::GRAVITY_WEST](#imagick.constants.gravity-west)**
    ([int](#language.types.integer))








    **[imagick::GRAVITY_CENTER](#imagick.constants.gravity-center)**
    ([int](#language.types.integer))








    **[imagick::GRAVITY_EAST](#imagick.constants.gravity-east)**
    ([int](#language.types.integer))








    **[imagick::GRAVITY_SOUTHWEST](#imagick.constants.gravity-southwest)**
    ([int](#language.types.integer))








    **[imagick::GRAVITY_SOUTH](#imagick.constants.gravity-south)**
    ([int](#language.types.integer))








    **[imagick::GRAVITY_SOUTHEAST](#imagick.constants.gravity-southeast)**
    ([int](#language.types.integer))

**Constantes STRETCH\_\***

    **[imagick::STRETCH_NORMAL](#imagick.constants.stretch-normal)**
    ([int](#language.types.integer))








    **[imagick::STRETCH_ULTRACONDENSED](#imagick.constants.stretch-ultracondensed)**
    ([int](#language.types.integer))








    **[imagick::STRETCH_CONDENSED](#imagick.constants.stretch-condensed)**
    ([int](#language.types.integer))








    **[imagick::STRETCH_SEMICONDENSED](#imagick.constants.stretch-semicondensed)**
    ([int](#language.types.integer))








    **[imagick::STRETCH_SEMIEXPANDED](#imagick.constants.stretch-semiexpanded)**
    ([int](#language.types.integer))








    **[imagick::STRETCH_EXPANDED](#imagick.constants.stretch-expanded)**
    ([int](#language.types.integer))








    **[imagick::STRETCH_EXTRAEXPANDED](#imagick.constants.stretch-extraexpanded)**
    ([int](#language.types.integer))








    **[imagick::STRETCH_ULTRAEXPANDED](#imagick.constants.stretch-ultraexpanded)**
    ([int](#language.types.integer))








    **[imagick::STRETCH_ANY](#imagick.constants.stretch-any)**
    ([int](#language.types.integer))

**Constantes ALIGN\_\***

    **[imagick::ALIGN_UNDEFINED](#imagick.constants.align-undefined)**
    ([int](#language.types.integer))








    **[imagick::ALIGN_LEFT](#imagick.constants.align-left)**
    ([int](#language.types.integer))








    **[imagick::ALIGN_CENTER](#imagick.constants.align-center)**
    ([int](#language.types.integer))








    **[imagick::ALIGN_RIGHT](#imagick.constants.align-right)**
    ([int](#language.types.integer))

**Constantes DECORATION\_\***

    **[imagick::DECORATION_NO](#imagick.constants.decoration-no)**
    ([int](#language.types.integer))








    **[imagick::DECORATION_UNDERLINE](#imagick.constants.decoration-underline)**
    ([int](#language.types.integer))








    **[imagick::DECORATION_OVERLINE](#imagick.constants.decoration-overline)**
    ([int](#language.types.integer))








    **[imagick::DECORATION_LINETROUGH](#imagick.constants.decoration-linetrough)**
    ([int](#language.types.integer))

**Constantes NOISE\_\***

    **[imagick::NOISE_UNIFORM](#imagick.constants.noise-uniform)**
    ([int](#language.types.integer))








    **[imagick::NOISE_GAUSSIAN](#imagick.constants.noise-gaussian)**
    ([int](#language.types.integer))








    **[imagick::NOISE_MULTIPLICATIVEGAUSSIAN](#imagick.constants.noise-multiplicativegaussian)**
    ([int](#language.types.integer))








    **[imagick::NOISE_IMPULSE](#imagick.constants.noise-impulse)**
    ([int](#language.types.integer))








    **[imagick::NOISE_LAPLACIAN](#imagick.constants.noise-laplacian)**
    ([int](#language.types.integer))








    **[imagick::NOISE_POISSON](#imagick.constants.noise-poisson)**
    ([int](#language.types.integer))








    **[imagick::NOISE_RANDOM](#imagick.constants.noise-random)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.

**Constantes CHANNEL\_\***

    **[imagick::CHANNEL_UNDEFINED](#imagick.constants.channel-undefined)**
    ([int](#language.types.integer))








    **[imagick::CHANNEL_RED](#imagick.constants.channel-red)**
    ([int](#language.types.integer))








    **[imagick::CHANNEL_GRAY](#imagick.constants.channel-gray)**
    ([int](#language.types.integer))








    **[imagick::CHANNEL_CYAN](#imagick.constants.channel-cyan)**
    ([int](#language.types.integer))








    **[imagick::CHANNEL_GREEN](#imagick.constants.channel-green)**
    ([int](#language.types.integer))








    **[imagick::CHANNEL_MAGENTA](#imagick.constants.channel-magenta)**
    ([int](#language.types.integer))








    **[imagick::CHANNEL_BLUE](#imagick.constants.channel-blue)**
    ([int](#language.types.integer))








    **[imagick::CHANNEL_YELLOW](#imagick.constants.channel-yellow)**
    ([int](#language.types.integer))








    **[imagick::CHANNEL_ALPHA](#imagick.constants.channel-alpha)**
    ([int](#language.types.integer))








    **[imagick::CHANNEL_OPACITY](#imagick.constants.channel-opacity)**
    ([int](#language.types.integer))








    **[imagick::CHANNEL_MATTE](#imagick.constants.channel-matte)**
    ([int](#language.types.integer))








    **[imagick::CHANNEL_BLACK](#imagick.constants.channel-black)**
    ([int](#language.types.integer))








    **[imagick::CHANNEL_INDEX](#imagick.constants.channel-index)**
    ([int](#language.types.integer))








    **[imagick::CHANNEL_ALL](#imagick.constants.channel-all)**
    ([int](#language.types.integer))








    **[imagick::CHANNEL_DEFAULT](#imagick.constants.channel-default)**
    ([int](#language.types.integer))

**Constantes METRIC\_\***

    **[imagick::METRIC_UNDEFINED](#imagick.constants.metric-undefined)**
    ([int](#language.types.integer))








    **[imagick::METRIC_MEANABSOLUTEERROR](#imagick.constants.metric-meanabsoluteerror)**
    ([int](#language.types.integer))








    **[imagick::METRIC_MEANSQUAREERROR](#imagick.constants.metric-meansquareerror)**
    ([int](#language.types.integer))








    **[imagick::METRIC_PEAKABSOLUTEERROR](#imagick.constants.metric-peakabsoluteerror)**
    ([int](#language.types.integer))








    **[imagick::METRIC_PEAKSIGNALTONOISERATIO](#imagick.constants.metric-peaksignaltonoiseratio)**
    ([int](#language.types.integer))








    **[imagick::METRIC_ROOTMEANSQUAREDERROR](#imagick.constants.metric-rootmeansquarederror)**
    ([int](#language.types.integer))

**Constantes PIXEL\_\***

    **[imagick::PIXEL_CHAR](#imagick.constants.pixel-char)**
    ([int](#language.types.integer))








    **[imagick::PIXEL_DOUBLE](#imagick.constants.pixel-double)**
    ([int](#language.types.integer))








    **[imagick::PIXEL_FLOAT](#imagick.constants.pixel-float)**
    ([int](#language.types.integer))








    **[imagick::PIXEL_INTEGER](#imagick.constants.pixel-integer)**
    ([int](#language.types.integer))



     Solo disponible con ImageMagick &lt; 7.





    **[imagick::PIXEL_LONG](#imagick.constants.pixel-long)**
    ([int](#language.types.integer))








    **[imagick::PIXEL_QUANTUM](#imagick.constants.pixel-quantum)**
    ([int](#language.types.integer))








    **[imagick::PIXEL_SHORT](#imagick.constants.pixel-short)**
    ([int](#language.types.integer))

**Constantes EVALUATE\_\***

    **[imagick::EVALUATE_UNDEFINED](#imagick.constants.evaluate-undefined)**
    ([int](#language.types.integer))








    **[imagick::EVALUATE_ADD](#imagick.constants.evaluate-add)**
    ([int](#language.types.integer))








    **[imagick::EVALUATE_AND](#imagick.constants.evaluate-and)**
    ([int](#language.types.integer))








    **[imagick::EVALUATE_DIVIDE](#imagick.constants.evaluate-divide)**
    ([int](#language.types.integer))








    **[imagick::EVALUATE_LEFTSHIFT](#imagick.constants.evaluate-leftshift)**
    ([int](#language.types.integer))








    **[imagick::EVALUATE_MAX](#imagick.constants.evaluate-max)**
    ([int](#language.types.integer))








    **[imagick::EVALUATE_MIN](#imagick.constants.evaluate-min)**
    ([int](#language.types.integer))








    **[imagick::EVALUATE_MULTIPLY](#imagick.constants.evaluate-multiply)**
    ([int](#language.types.integer))








    **[imagick::EVALUATE_OR](#imagick.constants.evaluate-or)**
    ([int](#language.types.integer))








    **[imagick::EVALUATE_RIGHTSHIFT](#imagick.constants.evaluate-rightshift)**
    ([int](#language.types.integer))








    **[imagick::EVALUATE_SET](#imagick.constants.evaluate-set)**
    ([int](#language.types.integer))








    **[imagick::EVALUATE_SUBTRACT](#imagick.constants.evaluate-subtract)**
    ([int](#language.types.integer))








    **[imagick::EVALUATE_XOR](#imagick.constants.evaluate-xor)**
    ([int](#language.types.integer))








    **[imagick::EVALUATE_POW](#imagick.constants.evaluate-pow)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.





    **[imagick::EVALUATE_LOG](#imagick.constants.evaluate-log)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.





    **[imagick::EVALUATE_THRESHOLD](#imagick.constants.evaluate-threshold)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.





    **[imagick::EVALUATE_THRESHOLDBLACK](#imagick.constants.evaluate-thresholdblack)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.





    **[imagick::EVALUATE_THRESHOLDWHITE](#imagick.constants.evaluate-thresholdwhite)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.





    **[imagick::EVALUATE_GAUSSIANNOISE](#imagick.constants.evaluate-gaussiannoise)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.





    **[imagick::EVALUATE_IMPULSENOISE](#imagick.constants.evaluate-impulsenoise)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.





    **[imagick::EVALUATE_LAPLACIANNOISE](#imagick.constants.evaluate-laplaciannoise)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.





    **[imagick::EVALUATE_MULTIPLICATIVENOISE](#imagick.constants.evaluate-multiplicativenoise)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.





    **[imagick::EVALUATE_POISSONNOISE](#imagick.constants.evaluate-poissonnoise)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.





    **[imagick::EVALUATE_UNIFORMNOISE](#imagick.constants.evaluate-uniformnoise)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.





    **[imagick::EVALUATE_COSINE](#imagick.constants.evaluate-cosine)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.





    **[imagick::EVALUATE_SINE](#imagick.constants.evaluate-sine)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.





    **[imagick::EVALUATE_ADDMODULUS](#imagick.constants.evaluate-addmodulus)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.

**Constantes COLORSPACE\_\***

    **[imagick::COLORSPACE_UNDEFINED](#imagick.constants.colorspace-undefined)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_RGB](#imagick.constants.colorspace-rgb)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_GRAY](#imagick.constants.colorspace-gray)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_TRANSPARENT](#imagick.constants.colorspace-transparent)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_OHTA](#imagick.constants.colorspace-ohta)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_LAB](#imagick.constants.colorspace-lab)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_XYZ](#imagick.constants.colorspace-xyz)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_YCBCR](#imagick.constants.colorspace-ycbcr)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_YCC](#imagick.constants.colorspace-ycc)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_YIQ](#imagick.constants.colorspace-yiq)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_YPBPR](#imagick.constants.colorspace-ypbpr)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_YUV](#imagick.constants.colorspace-yuv)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_CMYK](#imagick.constants.colorspace-cmyk)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_SRGB](#imagick.constants.colorspace-srgb)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_HSB](#imagick.constants.colorspace-hsb)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_HSL](#imagick.constants.colorspace-hsl)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_HWB](#imagick.constants.colorspace-hwb)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_REC601LUMA](#imagick.constants.colorspace-rec601luma)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_REC709LUMA](#imagick.constants.colorspace-rec709luma)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_LOG](#imagick.constants.colorspace-log)**
    ([int](#language.types.integer))








    **[imagick::COLORSPACE_CMY](#imagick.constants.colorspace-cmy)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.2 o superior.

**Constantes VIRTUALPIXELMETHOD\_\***

    **[imagick::VIRTUALPIXELMETHOD_UNDEFINED](#imagick.constants.virtualpixelmethod-undefined)**
    ([int](#language.types.integer))








    **[imagick::VIRTUALPIXELMETHOD_BACKGROUND](#imagick.constants.virtualpixelmethod-background)**
    ([int](#language.types.integer))








    **[imagick::VIRTUALPIXELMETHOD_CONSTANT](#imagick.constants.virtualpixelmethod-constant)**
    ([int](#language.types.integer))








    **[imagick::VIRTUALPIXELMETHOD_EDGE](#imagick.constants.virtualpixelmethod-edge)**
    ([int](#language.types.integer))








    **[imagick::VIRTUALPIXELMETHOD_MIRROR](#imagick.constants.virtualpixelmethod-mirror)**
    ([int](#language.types.integer))








    **[imagick::VIRTUALPIXELMETHOD_TILE](#imagick.constants.virtualpixelmethod-tile)**
    ([int](#language.types.integer))








    **[imagick::VIRTUALPIXELMETHOD_TRANSPARENT](#imagick.constants.virtualpixelmethod-transparent)**
    ([int](#language.types.integer))








    **[imagick::VIRTUALPIXELMETHOD_MASK](#imagick.constants.virtualpixelmethod-mask)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.2 o superior.





    **[imagick::VIRTUALPIXELMETHOD_BLACK](#imagick.constants.virtualpixelmethod-black)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.2 o superior.





    **[imagick::VIRTUALPIXELMETHOD_GRAY](#imagick.constants.virtualpixelmethod-gray)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.2 o superior.





    **[imagick::VIRTUALPIXELMETHOD_WHITE](#imagick.constants.virtualpixelmethod-white)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.2 o superior.





    **[imagick::VIRTUALPIXELMETHOD_HORIZONTALTILE](#imagick.constants.virtualpixelmethod-horizontaltile)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.3 o superior.





    **[imagick::VIRTUALPIXELMETHOD_VERTICALTILE](#imagick.constants.virtualpixelmethod-verticaltile)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.3 o superior.

**Constantes PREVIEW\_\***

    **[imagick::PREVIEW_UNDEFINED](#imagick.constants.preview-undefined)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_ROTATE](#imagick.constants.preview-rotate)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_SHEAR](#imagick.constants.preview-shear)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_ROLL](#imagick.constants.preview-roll)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_HUE](#imagick.constants.preview-hue)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_SATURATION](#imagick.constants.preview-saturation)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_BRIGHTNESS](#imagick.constants.preview-brightness)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_GAMMA](#imagick.constants.preview-gamma)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_SPIFF](#imagick.constants.preview-spiff)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_DULL](#imagick.constants.preview-dull)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_GRAYSCALE](#imagick.constants.preview-grayscale)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_QUANTIZE](#imagick.constants.preview-quantize)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_DESPECKLE](#imagick.constants.preview-despeckle)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_REDUCENOISE](#imagick.constants.preview-reducenoise)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_ADDNOISE](#imagick.constants.preview-addnoise)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_SHARPEN](#imagick.constants.preview-sharpen)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_BLUR](#imagick.constants.preview-blur)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_THRESHOLD](#imagick.constants.preview-threshold)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_EDGEDETECT](#imagick.constants.preview-edgedetect)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_SPREAD](#imagick.constants.preview-spread)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_SOLARIZE](#imagick.constants.preview-solarize)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_SHADE](#imagick.constants.preview-shade)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_RAISE](#imagick.constants.preview-raise)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_SEGMENT](#imagick.constants.preview-segment)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_SWIRL](#imagick.constants.preview-swirl)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_IMPLODE](#imagick.constants.preview-implode)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_WAVE](#imagick.constants.preview-wave)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_OILPAINT](#imagick.constants.preview-oilpaint)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_CHARCOALDRAWING](#imagick.constants.preview-charcoaldrawing)**
    ([int](#language.types.integer))








    **[imagick::PREVIEW_JPEG](#imagick.constants.preview-jpeg)**
    ([int](#language.types.integer))

**Constantes RENDERINGINTENT\_\***

    **[imagick::RENDERINGINTENT_UNDEFINED](#imagick.constants.renderingintent-undefined)**
    ([int](#language.types.integer))








    **[imagick::RENDERINGINTENT_SATURATION](#imagick.constants.renderingintent-saturation)**
    ([int](#language.types.integer))








    **[imagick::RENDERINGINTENT_PERCEPTUAL](#imagick.constants.renderingintent-perceptual)**
    ([int](#language.types.integer))








    **[imagick::RENDERINGINTENT_ABSOLUTE](#imagick.constants.renderingintent-absolute)**
    ([int](#language.types.integer))








    **[imagick::RENDERINGINTENT_RELATIVE](#imagick.constants.renderingintent-relative)**
    ([int](#language.types.integer))

**Constantes INTERLACE\_\***

    **[imagick::INTERLACE_UNDEFINED](#imagick.constants.interlace-undefined)**
    ([int](#language.types.integer))








    **[imagick::INTERLACE_NO](#imagick.constants.interlace-no)**
    ([int](#language.types.integer))








    **[imagick::INTERLACE_LINE](#imagick.constants.interlace-line)**
    ([int](#language.types.integer))








    **[imagick::INTERLACE_PLANE](#imagick.constants.interlace-plane)**
    ([int](#language.types.integer))








    **[imagick::INTERLACE_PARTITION](#imagick.constants.interlace-partition)**
    ([int](#language.types.integer))








    **[imagick::INTERLACE_GIF](#imagick.constants.interlace-gif)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.4 o superior.





    **[imagick::INTERLACE_JPEG](#imagick.constants.interlace-jpeg)**
    ([int](#language.types.integer))








    **[imagick::INTERLACE_PNG](#imagick.constants.interlace-png)**
    ([int](#language.types.integer))

**Constantes FILLRULE\_\***

    **[imagick::FILLRULE_UNDEFINED](#imagick.constants.fillrule-undefined)**
    ([int](#language.types.integer))








    **[imagick::FILLRULE_EVENODD](#imagick.constants.fillrule-evenodd)**
    ([int](#language.types.integer))








    **[imagick::FILLRULE_NONZERO](#imagick.constants.fillrule-nonzero)**
    ([int](#language.types.integer))

**Constantes PATHUNITS\_\***

    **[imagick::PATHUNITS_UNDEFINED](#imagick.constants.pathunits-undefined)**
    ([int](#language.types.integer))








    **[imagick::PATHUNITS_USERSPACE](#imagick.constants.pathunits-userspace)**
    ([int](#language.types.integer))








    **[imagick::PATHUNITS_USERSPACEONUSE](#imagick.constants.pathunits-userspaceonuse)**
    ([int](#language.types.integer))








    **[imagick::PATHUNITS_OBJECTBOUNDINGBOX](#imagick.constants.pathunits-objectboundingbox)**
    ([int](#language.types.integer))

**Constantes LINECAP\_\***

    **[imagick::LINECAP_UNDEFINED](#imagick.constants.linecap-undefined)**
    ([int](#language.types.integer))








    **[imagick::LINECAP_BUTT](#imagick.constants.linecap-butt)**
    ([int](#language.types.integer))








    **[imagick::LINECAP_ROUND](#imagick.constants.linecap-round)**
    ([int](#language.types.integer))








    **[imagick::LINECAP_SQUARE](#imagick.constants.linecap-square)**
    ([int](#language.types.integer))

**Constantes LINEJOIN\_\***

    **[imagick::LINEJOIN_UNDEFINED](#imagick.constants.linejoin-undefined)**
    ([int](#language.types.integer))








    **[imagick::LINEJOIN_MITER](#imagick.constants.linejoin-miter)**
    ([int](#language.types.integer))








    **[imagick::LINEJOIN_ROUND](#imagick.constants.linejoin-round)**
    ([int](#language.types.integer))








    **[imagick::LINEJOIN_BEVEL](#imagick.constants.linejoin-bevel)**
    ([int](#language.types.integer))

**Constantes RESOURCETYPE\_\***

    **[imagick::RESOURCETYPE_UNDEFINED](#imagick.constants.resourcetype-undefined)**
    ([int](#language.types.integer))








    **[imagick::RESOURCETYPE_AREA](#imagick.constants.resourcetype-area)**
    ([int](#language.types.integer))



     Défini la largeur et la hauteur maximales d'une image
     qui peut être mise dans la mémoire cache des pixels.





    **[imagick::RESOURCETYPE_DISK](#imagick.constants.resourcetype-disk)**
    ([int](#language.types.integer))



     Défini la taille maximale de l'espace disque autorisée à stocker le cache
     des pixels.





    **[imagick::RESOURCETYPE_FILE](#imagick.constants.resourcetype-file)**
    ([int](#language.types.integer))



     Défini le nombre maximal de fichiers de cache de pixels ouverts.





    **[imagick::RESOURCETYPE_MAP](#imagick.constants.resourcetype-map)**
    ([int](#language.types.integer))



     Défini la taille maximale de mémoire en octets, à allouer au cache
     de pixels.





    **[imagick::RESOURCETYPE_MEMORY](#imagick.constants.resourcetype-memory)**
    ([int](#language.types.integer))



     Défini la taille maximale de la mémoire, en octets, à allouer au cache
     de pixels.





     **[imagick::RESOURCETYPE_THREAD](#imagick.constants.resourcetype-thread)**
     ([int](#language.types.integer))



      Défini le nombre maximal de threads parrallèles.
      Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.7.8 o superior.


**Constantes LAYERMETHOD\_\***

    **[imagick::LAYERMETHOD_UNDEFINED](#imagick.constants.layermethod-undefined)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.





    **[imagick::LAYERMETHOD_COALESCE](#imagick.constants.layermethod-coalesce)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.





    **[imagick::LAYERMETHOD_COMPAREANY](#imagick.constants.layermethod-compareany)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.





    **[imagick::LAYERMETHOD_COMPARECLEAR](#imagick.constants.layermethod-compareclear)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.





    **[imagick::LAYERMETHOD_COMPAREOVERLAY](#imagick.constants.layermethod-compareoverlay)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.





    **[imagick::LAYERMETHOD_DISPOSE](#imagick.constants.layermethod-dispose)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.





    **[imagick::LAYERMETHOD_OPTIMIZE](#imagick.constants.layermethod-optimize)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.





    **[imagick::LAYERMETHOD_OPTIMIZEPLUS](#imagick.constants.layermethod-optimizeplus)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.





    **[imagick::LAYERMETHOD_OPTIMIZEIMAGE](#imagick.constants.layermethod-optimizeimage)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.0 o superior.





    **[imagick::LAYERMETHOD_OPTIMIZETRANS](#imagick.constants.layermethod-optimizetrans)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.0 o superior.





    **[imagick::LAYERMETHOD_REMOVEDUPS](#imagick.constants.layermethod-removedups)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.0 o superior.





    **[imagick::LAYERMETHOD_REMOVEZERO](#imagick.constants.layermethod-removezero)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.0 o superior.





    **[imagick::LAYERMETHOD_COMPOSITE](#imagick.constants.layermethod-composite)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.0 o superior.





    **[imagick::LAYERMETHOD_MERGE](#imagick.constants.layermethod-merge)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.7 o superior.





    **[imagick::LAYERMETHOD_FLATTEN](#imagick.constants.layermethod-flatten)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.7 o superior.





    **[imagick::LAYERMETHOD_MOSAIC](#imagick.constants.layermethod-mosaic)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.7 o superior.

**Constantes ORIENTATION\_\***

    **[imagick::ORIENTATION_UNDEFINED](#imagick.constants.orientation-undefined)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.0 o superior.





    **[imagick::ORIENTATION_TOPLEFT](#imagick.constants.orientation-topleft)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.0 o superior.





    **[imagick::ORIENTATION_TOPRIGHT](#imagick.constants.orientation-topright)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.0 o superior.





    **[imagick::ORIENTATION_BOTTOMRIGHT](#imagick.constants.orientation-bottomright)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.0 o superior.





    **[imagick::ORIENTATION_BOTTOMLEFT](#imagick.constants.orientation-bottomleft)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.0 o superior.





    **[imagick::ORIENTATION_LEFTTOP](#imagick.constants.orientation-lefttop)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.0 o superior.





    **[imagick::ORIENTATION_RIGHTTOP](#imagick.constants.orientation-righttop)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.0 o superior.





    **[imagick::ORIENTATION_RIGHTBOTTOM](#imagick.constants.orientation-rightbottom)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.0 o superior.





    **[imagick::ORIENTATION_LEFTBOTTOM](#imagick.constants.orientation-leftbottom)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.0 o superior.

**Constantes DISTORTION\_\***

    **[imagick::DISTORTION_UNDEFINED](#imagick.constants.distortion-undefined)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.





    **[imagick::DISTORTION_AFFINE](#imagick.constants.distortion-affine)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.





    **[imagick::DISTORTION_AFFINEPROJECTION](#imagick.constants.distortion-affineprojection)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.





    **[imagick::DISTORTION_ARC](#imagick.constants.distortion-arc)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.





    **[imagick::DISTORTION_BILINEAR](#imagick.constants.distortion-bilinear)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.





    **[imagick::DISTORTION_PERSPECTIVE](#imagick.constants.distortion-perspective)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.





    **[imagick::DISTORTION_PERSPECTIVEPROJECTION](#imagick.constants.distortion-perspectiveprojection)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.





    **[imagick::DISTORTION_SCALEROTATETRANSLATE](#imagick.constants.distortion-scalerotatetranslate)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.





    **[imagick::DISTORTION_POLYNOMIAL](#imagick.constants.distortion-polynomial)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::DISTORTION_POLAR](#imagick.constants.distortion-polar)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::DISTORTION_DEPOLAR](#imagick.constants.distortion-depolar)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::DISTORTION_BARREL](#imagick.constants.distortion-barrel)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::DISTORTION_BARRELINVERSE](#imagick.constants.distortion-barrelinverse)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::DISTORTION_SHEPARDS](#imagick.constants.distortion-shepards)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::DISTORTION_SENTINEL](#imagick.constants.distortion-sentinel)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.

**Constantes ALPHACHANNEL\_\***

    **[imagick::ALPHACHANNEL_ACTIVATE](#imagick.constants.alphachannel-activate)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.8 o superior.





    **[imagick::ALPHACHANNEL_DEACTIVATE](#imagick.constants.alphachannel-deactivate)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.8 o superior.





    **[imagick::ALPHACHANNEL_RESET](#imagick.constants.alphachannel-reset)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.8 o superior.





    **[imagick::ALPHACHANNEL_SET](#imagick.constants.alphachannel-set)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.8 o superior.





    **[imagick::ALPHACHANNEL_UNDEFINED](#imagick.constants.alphachannel-undefined)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::ALPHACHANNEL_COPY](#imagick.constants.alphachannel-copy)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::ALPHACHANNEL_EXTRACT](#imagick.constants.alphachannel-extract)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::ALPHACHANNEL_OPAQUE](#imagick.constants.alphachannel-opaque)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::ALPHACHANNEL_SHAPE](#imagick.constants.alphachannel-shape)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::ALPHACHANNEL_TRANSPARENT](#imagick.constants.alphachannel-transparent)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::ALPHACHANNEL_BACKGROUND](#imagick.constants.alphachannel-background)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.5.3 o superior.





    **[imagick::ALPHACHANNEL_REMOVE](#imagick.constants.alphachannel-remove)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.7.8 o superior.





    **[imagick::ALPHACHANNEL_ASSOCIATE](#imagick.constants.alphachannel-associate)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.9.0 o superior.





    **[imagick::ALPHACHANNEL_DISSOCIATE](#imagick.constants.alphachannel-dissociate)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.9.0 o superior.





    **[imagick::ALPHACHANNEL_ON](#imagick.constants.alphachannel-on)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 7.0.0 o superior.





    **[imagick::ALPHACHANNEL_OFF](#imagick.constants.alphachannel-off)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 7.0.0 o superior.





    **[imagick::ALPHACHANNEL_DISCRETE](#imagick.constants.alphachannel-discrete)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 7.0.0 o superior.

**Constantes SPARSECOLORMETHOD\_\***

    **[imagick::SPARSECOLORMETHOD_UNDEFINED](#imagick.constants.sparsecolormethod-undefined)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::SPARSECOLORMETHOD_BARYCENTRIC](#imagick.constants.sparsecolormethod-barycentric)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::SPARSECOLORMETHOD_BILINEAR](#imagick.constants.sparsecolormethod-bilinear)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::SPARSECOLORMETHOD_POLYNOMIAL](#imagick.constants.sparsecolormethod-polynomial)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::SPARSECOLORMETHOD_SPEPARDS](#imagick.constants.sparsecolormethod-spepards)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::SPARSECOLORMETHOD_VORONOI](#imagick.constants.sparsecolormethod-voronoi)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.

**Constantes FUNCTION\_\***

    **[imagick::FUNCTION_UNDEFINED](#imagick.constants.function-undefined)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.9 o superior.





    **[imagick::FUNCTION_POLYNOMIAL](#imagick.constants.function-polynomial)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.9 o superior.





    **[imagick::FUNCTION_SINUSOID](#imagick.constants.function-sinusoid)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.9 o superior.

**Constantes INTERPOLATE\_\***

    **[imagick::INTERPOLATE_UNDEFINED](#imagick.constants.interpolate-undefined)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.2 o superior.





    **[imagick::INTERPOLATE_AVERAGE](#imagick.constants.interpolate-average)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.2 o superior.





    **[imagick::INTERPOLATE_BICUBIC](#imagick.constants.interpolate-bicubic)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.2 o superior.





    **[imagick::INTERPOLATE_BILINEAR](#imagick.constants.interpolate-bilinear)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.2 o superior.





    **[imagick::INTERPOLATE_FILTER](#imagick.constants.interpolate-filter)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.2 o superior.





    **[imagick::INTERPOLATE_INTEGER](#imagick.constants.interpolate-integer)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.2 o superior.





    **[imagick::INTERPOLATE_MESH](#imagick.constants.interpolate-mesh)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.2 o superior.





    **[imagick::INTERPOLATE_NEARESTNEIGHBOR](#imagick.constants.interpolate-nearestneighbor)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.2 o superior.





    **[imagick::INTERPOLATE_SPLINE](#imagick.constants.interpolate-spline)**
    ([int](#language.types.integer))



      Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.4 o superior.


**Constantes DITHERMETHOD\_\***

    **[imagick::DITHERMETHOD_UNDEFINED](#imagick.constants.dithermethod-undefined)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::DITHERMETHOD_NO](#imagick.constants.dithermethod-no)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::DITHERMETHOD_RIEMERSMA](#imagick.constants.dithermethod-riemersma)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.





    **[imagick::DITHERMETHOD_FLOYDSTEINBERG](#imagick.constants.dithermethod-floydsteinberg)**
    ([int](#language.types.integer))



     Esta constante solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.6 o superior.

# Ejemplos

## Tabla de contenidos

- [Uso básico](#imagick.examples-1)

    ## Uso básico

    Imagick hace que la manipulación de imágenes en PHP sea extremadamente sencilla a través
    de una interfaz OO. Aquí está un ejemplo breve de cómo hacer una miniatura:

    **Ejemplo #1 Crear una miniatura con Imagick**

&lt;?php

header('Content-type: image/jpeg');

$imagen = new Imagick('imagen.jpg');

// Si se proporciona 0 como parámetro de ancho o alto,
// se mantiene la proporción de aspecto
$imagen-&gt;thumbnailImage(100, 0);

echo $imagen;

?&gt;

Al usar SPL y otras características OO soportadas en Imagick, puede ser sencillo
redimensionar todos los archivos de un directorio (útil para la redimensión por lotes de
muchas imágenes de cámara digital para que sean visibles desde una web). Aquí usamos redimensión,
ya que queremos mantener cierta meta-información:

    **Ejemplo #2 Hacer una miniatura de todos los archivos JPG de un directorio**

&lt;?php

$imágenes = new Imagick(glob('imagenes/\*.JPG'));

foreach($imágenes as $imagen) {

    // Proporcionar 0 fuerza a thumbnailImage a mantener la proporción de aspecto
    $imagen-&gt;thumbnailImage(1024,0);

}

$imágenes-&gt;writeImages();

?&gt;

Este es un ejemplo de crear un reflejo de una imagen.
El reflejo se crea volteando la imagen y poniendo una capa de gradiente sobre ella.
Ambas, la imagen original y el reflejo, están sobrepuestas en un lienzo.

    **Ejemplo #3 Crear un reflejo de una imagen**

&lt;?php
/_ Leer la imagen _/
$im = new Imagick("test.png");

/_ Miniaturizar la imagen _/
$im-&gt;thumbnailImage(200, null);

/_ Crear un borde para la imagen _/
$im-&gt;borderImage(new ImagickPixel("white"), 5, 5);

/_ Clonar la imagen y voltearla _/
$reflejo = $im-&gt;clone();
$reflejo-&gt;flipImage();

/_ Crear un gradiente. Será sobrepuesto en el reflejo _/
$gradiente = new Imagick();

/_ El gradiente necesita ser más grande que la imagen y los bordes _/
$gradiente-&gt;newPseudoImage($reflejo-&gt;getImageWidth() + 10, $reflejo-&gt;getImageHeight() + 10, "gradient:transparent-black");

/_ Componer el gradiente con el reflejo _/
$reflejo-&gt;compositeImage($gradiente, imagick::COMPOSITE_OVER, 0, 0);

/_ Añadir algo de opacidad. Requiere ImageMagick 6.2.9 o superior _/
$reflejo-&gt;setImageOpacity( 0.3 );

/_ Crear un lienzo vacío _/
$lienzo = new Imagick();

/_ El lienzo necesita ser más grande para mantener ambas imágenes _/
$ancho = $im-&gt;getImageWidth() + 40;
$alto = ($im-&gt;getImageHeight() * 2) + 30;
$lienzo-&gt;newImage($ancho, $alto, new ImagickPixel("black"));
$lienzo-&gt;setImageFormat("png");

/_ Componer la imagen original y el reflejo sobre el lienzo _/
$lienzo-&gt;compositeImage($im, imagick::COMPOSITE_OVER, 20, 10);
$lienzo-&gt;compositeImage($reflejo, imagick::COMPOSITE_OVER, 20, $im-&gt;getImageHeight() + 10);

/_ Imprimir la imagen _/
header("Content-Type: image/png");
echo $lienzo;
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Salida del ejemplo : Crear un reflejo de una imagen](php-bigxhtml-data/images/c0d23d2d6769e53e24a1b3136c064577-hello_world_reflection.png)


Este ejemplo ilustra cómo usar patrones de relleno durante el dibujo.

    **Ejemplo #4 Rellenar un texto con un gradiente**

&lt;?php

/_ Crear un nuevo objeto imagick _/
$im = new Imagick();

/_ Crear una nueva imagen. Será usada como patrón de relleno _/
$im-&gt;newPseudoImage(50, 50, "gradient:red-black");

/_ Crear un objeto imagickdraw _/
$dibujo = new ImagickDraw();

/_ Iniciar un nuevo patrón llamado "gradient" _/
$dibujo-&gt;pushPattern('gradient', 0, 0, 50, 50);

/_ Componer el gradiente con el patrón _/
$dibujo-&gt;composite(Imagick::COMPOSITE_OVER, 0, 0, 50, 50, $im);

/_ Cerrar el patrón _/
$dibujo-&gt;popPattern();

/_ Usar el patrón llamado "gradient" como el relleno _/
$dibujo-&gt;setFillPatternURL('#gradient');

/_ Establecer el tamaño de fuente a 52 _/
$dibujo-&gt;setFontSize(52);

/_ Anotar algo de texto _/
$dibujo-&gt;annotation(20, 50, "Hello World!");

/_ Crear un nuevo lienzo y una imagen blanca _/
$lienzo = new Imagick();
$lienzo-&gt;newImage(350, 70, "white");

/_ Dibujar el objeto ImagickDraw sobre el lienzo _/
$lienzo-&gt;drawImage($dibujo);

/_ Borde negro de 1px alrededor de la imagen _/
$lienzo-&gt;borderImage('black', 1, 1);

/_ Establecer el formato a PNG _/
$lienzo-&gt;setImageFormat('png');

/_ Imprimir la imagen _/
header("Content-Type: image/png");
echo $lienzo;
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Salida del ejemplo : Rellenar texto con gradiente](php-bigxhtml-data/images/c0d23d2d6769e53e24a1b3136c064577-hello_world.png)


Trabajar con imágenes GIF animadas

    **Ejemplo #5 Leer una imágen GIF y redimensionar todos los fotogramas**

&lt;?php

/_ Crear un nuevo objeto imagick y leer el GIF _/
$im = new Imagick("ejemplo.gif");

/_ Redimensionar todos los fotogramas _/
foreach ($im as $fotograma) {
/_ Fotogramas de 50x50 _/
$fotograma-&gt;thumbnailImage(50, 50);

/_ Establecer el lienzo virtual para corregir el tamaño _/
$fotograma-&gt;setImagePage(50, 50, 0, 0);
}

/_ Observe: writeImages en vez de writeImage _/
$im-&gt;writeImages("example_small.gif", true);
?&gt;

Trabajar con primitivas de elipse y tipos de letra personalizados

    **Ejemplo #6 Crear un logo de PHP**

&lt;?php
/_ Establecer el ancho y alto en proporción al logo genuino de PHP _/
$ancho = 400;
$alto = 210;

/_ Crear un objeto Imagick con lienzo transparente _/
$img = new Imagick();
$img-&gt;newImage($ancho, $alto, new ImagickPixel('transparent'));

/_ Nueva instancia de ImagickDraw para dibujar la elipse _/
$dibujo = new ImagickDraw();
/* Establecer el color de relleno púrpura para la elipse */
$dibujo-&gt;setFillColor('#777bb4');
/_ Establecer las dimensiones de la elipse _/
$dibujo-&gt;ellipse($ancho / 2, $alto / 2, $ancho / 2, $alto / 2, 0, 360);
/* Dibujar la elipse en el lienzo */
$img-&gt;drawImage($dibujo);

/_ Restablecer el color de relleno de púrpura a negro para el texto (nota: estamos reutilizando el objeto ImagickDraw) _/
$dibujo-&gt;setFillColor('black');
/* Establecer el borde del contorno al color blanco */
$dibujo-&gt;setStrokeColor('white');
/_ Establecer el grosor del borde del contorno _/
$dibujo-&gt;setStrokeWidth(2);
/* Establecer el interletraje («kerning») del tipo de letra (un valor negativo significa que las letras están más juntas entre ellas) */
$dibujo-&gt;setTextKerning(-8);
/_ Establecer el tamaño del tipo de letra usado para el logo de PHP _/
$dibujo-&gt;setFont('Handel Gothic.ttf');
$dibujo-&gt;setFontSize(150);
/_ Centrar el texto horizontal y verticalmente _/
$dibujo-&gt;setGravity(Imagick::GRAVITY_CENTER);

/_ Añadir en el centro "php" con el índice Y de -10 al lienzo (dentro de la elipse) _/
$img-&gt;annotateImage($dibujo, 0, -10, 0, 'php');
$img-&gt;setImageFormat('png');

/_ Establecer la cabecera apropiada para PNG y generar la imagen _/
header('Content-Type: image/png');
echo $img;
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Salida del ejemplo: Crear el logo de PHP con Imagick](php-bigxhtml-data/images/c0d23d2d6769e53e24a1b3136c064577-php_logo.png)


# La classe [Imagick](#class.imagick)

(PECL imagick 2, PECL imagick 3)

## Sinopsis de la Clase

    ****

     class **Imagick**
     implements
       [Iterator](#class.iterator) {

public [\_\_construct](#imagick.construct)([mixed](#language.types.mixed) $files = ?)

    public [adaptiveBlurImage](#imagick.adaptiveblurimage)([float](#language.types.float) $radius, [float](#language.types.float) $sigma, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

public [adaptiveResizeImage](#imagick.adaptiveresizeimage)(
    [int](#language.types.integer) $columns,
    [int](#language.types.integer) $rows,
    [bool](#language.types.boolean) $bestfit = **[false](#constant.false)**,
    [bool](#language.types.boolean) $legacy = **[false](#constant.false)**
): [bool](#language.types.boolean)
public [adaptiveSharpenImage](#imagick.adaptivesharpenimage)([float](#language.types.float) $radius, [float](#language.types.float) $sigma, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [adaptiveThresholdImage](#imagick.adaptivethresholdimage)([int](#language.types.integer) $width, [int](#language.types.integer) $height, [int](#language.types.integer) $offset): [bool](#language.types.boolean)
public [addImage](#imagick.addimage)([Imagick](#class.imagick) $source): [bool](#language.types.boolean)
public [addNoiseImage](#imagick.addnoiseimage)([int](#language.types.integer) $noise_type, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [affineTransformImage](#imagick.affinetransformimage)([ImagickDraw](#class.imagickdraw) $matrix): [bool](#language.types.boolean)
public [animateImages](#imagick.animateimages)([string](#language.types.string) $x_server): [bool](#language.types.boolean)
public [annotateImage](#imagick.annotateimage)(
    [ImagickDraw](#class.imagickdraw) $draw_settings,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y,
    [float](#language.types.float) $angle,
    [string](#language.types.string) $text
): [bool](#language.types.boolean)
public [appendImages](#imagick.appendimages)([bool](#language.types.boolean) $stack): [Imagick](#class.imagick)
public [autoLevelImage](#imagick.autolevelimage)([int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [averageImages](#imagick.averageimages)(): [Imagick](#class.imagick)
public [blackThresholdImage](#imagick.blackthresholdimage)([mixed](#language.types.mixed) $threshold): [bool](#language.types.boolean)
public [blueShiftImage](#imagick.blueshiftimage)([float](#language.types.float) $factor = 1.5): [bool](#language.types.boolean)
public [blurImage](#imagick.blurimage)([float](#language.types.float) $radius, [float](#language.types.float) $sigma, [int](#language.types.integer) $channel = ?): [bool](#language.types.boolean)
public [borderImage](#imagick.borderimage)([mixed](#language.types.mixed) $bordercolor, [int](#language.types.integer) $width, [int](#language.types.integer) $height): [bool](#language.types.boolean)
public [brightnessContrastImage](#imagick.brightnesscontrastimage)([float](#language.types.float) $brightness, [float](#language.types.float) $contrast, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [charcoalImage](#imagick.charcoalimage)([float](#language.types.float) $radius, [float](#language.types.float) $sigma): [bool](#language.types.boolean)
public [chopImage](#imagick.chopimage)(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)
public [clampImage](#imagick.clampimage)([int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [clear](#imagick.clear)(): [bool](#language.types.boolean)
public [clipImage](#imagick.clipimage)(): [bool](#language.types.boolean)
public [clipImagePath](#imagick.clipimagepath)([string](#language.types.string) $pathname, [string](#language.types.string) $inside): [void](language.types.void.html)
public [clipPathImage](#imagick.clippathimage)([string](#language.types.string) $pathname, [bool](#language.types.boolean) $inside): [bool](#language.types.boolean)
public [clone](#imagick.clone)(): [Imagick](#class.imagick)
public [clutImage](#imagick.clutimage)([Imagick](#class.imagick) $lookup_table, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [coalesceImages](#imagick.coalesceimages)(): [Imagick](#class.imagick)
public [colorFloodfillImage](#imagick.colorfloodfillimage)(
    [mixed](#language.types.mixed) $fill,
    [float](#language.types.float) $fuzz,
    [mixed](#language.types.mixed) $bordercolor,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)
public [colorizeImage](#imagick.colorizeimage)([mixed](#language.types.mixed) $colorize, [mixed](#language.types.mixed) $opacity, [bool](#language.types.boolean) $legacy = **[false](#constant.false)**): [bool](#language.types.boolean)
public [colorMatrixImage](#imagick.colormatriximage)([array](#language.types.array) $color_matrix): [bool](#language.types.boolean)
public [combineImages](#imagick.combineimages)([int](#language.types.integer) $channelType): [Imagick](#class.imagick)
public [commentImage](#imagick.commentimage)([string](#language.types.string) $comment): [bool](#language.types.boolean)
public [compareImageChannels](#imagick.compareimagechannels)([Imagick](#class.imagick) $image, [int](#language.types.integer) $channelType, [int](#language.types.integer) $metricType): [array](#language.types.array)
public [compareImageLayers](#imagick.compareimagelayers)([int](#language.types.integer) $method): [Imagick](#class.imagick)
public [compareImages](#imagick.compareimages)([Imagick](#class.imagick) $compare, [int](#language.types.integer) $metric): [array](#language.types.array)
public [compositeImage](#imagick.compositeimage)(
    [Imagick](#class.imagick) $composite_object,
    [int](#language.types.integer) $composite,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)
public [contrastImage](#imagick.contrastimage)([bool](#language.types.boolean) $sharpen): [bool](#language.types.boolean)
public [contrastStretchImage](#imagick.contraststretchimage)([float](#language.types.float) $black_point, [float](#language.types.float) $white_point, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [convolveImage](#imagick.convolveimage)([array](#language.types.array) $kernel, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [count](#imagick.count)([int](#language.types.integer) $mode = 0): [int](#language.types.integer)
public [cropImage](#imagick.cropimage)(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)
public [cropThumbnailImage](#imagick.cropthumbnailimage)([int](#language.types.integer) $width, [int](#language.types.integer) $height, [bool](#language.types.boolean) $legacy = **[false](#constant.false)**): [bool](#language.types.boolean)
public [current](#imagick.current)(): [Imagick](#class.imagick)
public [cycleColormapImage](#imagick.cyclecolormapimage)([int](#language.types.integer) $displace): [bool](#language.types.boolean)
public [decipherImage](#imagick.decipherimage)([string](#language.types.string) $passphrase): [bool](#language.types.boolean)
public [deconstructImages](#imagick.deconstructimages)(): [Imagick](#class.imagick)
public [deleteImageArtifact](#imagick.deleteimageartifact)([string](#language.types.string) $artifact): [bool](#language.types.boolean)
public [deleteImageProperty](#imagick.deleteimageproperty)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [deskewImage](#imagick.deskewimage)([float](#language.types.float) $threshold): [bool](#language.types.boolean)
public [despeckleImage](#imagick.despeckleimage)(): [bool](#language.types.boolean)
public [destroy](#imagick.destroy)(): [bool](#language.types.boolean)
public [displayImage](#imagick.displayimage)([string](#language.types.string) $servername): [bool](#language.types.boolean)
public [displayImages](#imagick.displayimages)([string](#language.types.string) $servername): [bool](#language.types.boolean)
public [distortImage](#imagick.distortimage)([int](#language.types.integer) $method, [array](#language.types.array) $arguments, [bool](#language.types.boolean) $bestfit): [bool](#language.types.boolean)
public [drawImage](#imagick.drawimage)([ImagickDraw](#class.imagickdraw) $draw): [bool](#language.types.boolean)
public [edgeImage](#imagick.edgeimage)([float](#language.types.float) $radius): [bool](#language.types.boolean)
public [embossImage](#imagick.embossimage)([float](#language.types.float) $radius, [float](#language.types.float) $sigma): [bool](#language.types.boolean)
public [encipherImage](#imagick.encipherimage)([string](#language.types.string) $passphrase): [bool](#language.types.boolean)
public [enhanceImage](#imagick.enhanceimage)(): [bool](#language.types.boolean)
public [equalizeImage](#imagick.equalizeimage)(): [bool](#language.types.boolean)
public [evaluateImage](#imagick.evaluateimage)([int](#language.types.integer) $op, [float](#language.types.float) $constant, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [exportImagePixels](#imagick.exportimagepixels)(
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [string](#language.types.string) $map,
    [int](#language.types.integer) $STORAGE
): [array](#language.types.array)
public [extentImage](#imagick.extentimage)(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)
public [filter](#imagick.filter)([ImagickKernel](#class.imagickkernel) $ImagickKernel, [int](#language.types.integer) $channel = Imagick::CHANNEL_UNDEFINED): [bool](#language.types.boolean)
public [flattenImages](#imagick.flattenimages)(): [Imagick](#class.imagick)
public [flipImage](#imagick.flipimage)(): [bool](#language.types.boolean)
public [floodFillPaintImage](#imagick.floodfillpaintimage)(
    [mixed](#language.types.mixed) $fill,
    [float](#language.types.float) $fuzz,
    [mixed](#language.types.mixed) $target,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [bool](#language.types.boolean) $invert,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)
public [flopImage](#imagick.flopimage)(): [bool](#language.types.boolean)
public [forwardFourierTransformimage](#imagick.forwardfouriertransformimage)([bool](#language.types.boolean) $magnitude): [bool](#language.types.boolean)
public [frameImage](#imagick.frameimage)(
    [mixed](#language.types.mixed) $matte_color,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $inner_bevel,
    [int](#language.types.integer) $outer_bevel
): [bool](#language.types.boolean)
public [functionImage](#imagick.functionimage)([int](#language.types.integer) $function, [array](#language.types.array) $arguments, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [fxImage](#imagick.fximage)([string](#language.types.string) $expression, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [Imagick](#class.imagick)
public [gammaImage](#imagick.gammaimage)([float](#language.types.float) $gamma, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [gaussianBlurImage](#imagick.gaussianblurimage)([float](#language.types.float) $radius, [float](#language.types.float) $sigma, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [getColorspace](#imagick.getcolorspace)(): [int](#language.types.integer)
public [getCompression](#imagick.getcompression)(): [int](#language.types.integer)
public [getCompressionQuality](#imagick.getcompressionquality)(): [int](#language.types.integer)
public static [getCopyright](#imagick.getcopyright)(): [string](#language.types.string)
public [getFilename](#imagick.getfilename)(): [string](#language.types.string)
public [getFont](#imagick.getfont)(): [string](#language.types.string)
public [getFormat](#imagick.getformat)(): [string](#language.types.string)
public [getGravity](#imagick.getgravity)(): [int](#language.types.integer)
public static [getHomeURL](#imagick.gethomeurl)(): [string](#language.types.string)
public [getImage](#imagick.getimage)(): [Imagick](#class.imagick)
public [getImageAlphaChannel](#imagick.getimagealphachannel)(): [bool](#language.types.boolean)
public [getImageArtifact](#imagick.getimageartifact)([string](#language.types.string) $artifact): [string](#language.types.string)
public [getImageAttribute](#imagick.getimageattribute)([string](#language.types.string) $key): [string](#language.types.string)
public [getImageBackgroundColor](#imagick.getimagebackgroundcolor)(): [ImagickPixel](#class.imagickpixel)
public [getImageBlob](#imagick.getimageblob)(): [string](#language.types.string)
public [getImageBluePrimary](#imagick.getimageblueprimary)(): [array](#language.types.array)
public [getImageBorderColor](#imagick.getimagebordercolor)(): [ImagickPixel](#class.imagickpixel)
public [getImageChannelDepth](#imagick.getimagechanneldepth)([int](#language.types.integer) $channel): [int](#language.types.integer)
public [getImageChannelDistortion](#imagick.getimagechanneldistortion)([Imagick](#class.imagick) $reference, [int](#language.types.integer) $channel, [int](#language.types.integer) $metric): [float](#language.types.float)
public [getImageChannelDistortions](#imagick.getimagechanneldistortions)([Imagick](#class.imagick) $reference, [int](#language.types.integer) $metric, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [float](#language.types.float)
public [getImageChannelExtrema](#imagick.getimagechannelextrema)([int](#language.types.integer) $channel): [array](#language.types.array)
public [getImageChannelKurtosis](#imagick.getimagechannelkurtosis)([int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [array](#language.types.array)
public [getImageChannelMean](#imagick.getimagechannelmean)([int](#language.types.integer) $channel): [array](#language.types.array)
public [getImageChannelRange](#imagick.getimagechannelrange)([int](#language.types.integer) $channel): [array](#language.types.array)
public [getImageChannelStatistics](#imagick.getimagechannelstatistics)(): [array](#language.types.array)
public [getImageClipMask](#imagick.getimageclipmask)(): [Imagick](#class.imagick)
public [getImageColormapColor](#imagick.getimagecolormapcolor)([int](#language.types.integer) $index): [ImagickPixel](#class.imagickpixel)
public [getImageColors](#imagick.getimagecolors)(): [int](#language.types.integer)
public [getImageColorspace](#imagick.getimagecolorspace)(): [int](#language.types.integer)
public [getImageCompose](#imagick.getimagecompose)(): [int](#language.types.integer)
public [getImageCompression](#imagick.getimagecompression)(): [int](#language.types.integer)
public [getImageCompressionQuality](#imagick.getimagecompressionquality)(): [int](#language.types.integer)
public [getImageDelay](#imagick.getimagedelay)(): [int](#language.types.integer)
public [getImageDepth](#imagick.getimagedepth)(): [int](#language.types.integer)
public [getImageDispose](#imagick.getimagedispose)(): [int](#language.types.integer)
public [getImageDistortion](#imagick.getimagedistortion)(MagickWand $reference, [int](#language.types.integer) $metric): [float](#language.types.float)
public [getImageExtrema](#imagick.getimageextrema)(): [array](#language.types.array)
public [getImageFilename](#imagick.getimagefilename)(): [string](#language.types.string)
public [getImageFormat](#imagick.getimageformat)(): [string](#language.types.string)
public [getImageGamma](#imagick.getimagegamma)(): [float](#language.types.float)
public [getImageGeometry](#imagick.getimagegeometry)(): [array](#language.types.array)
public [getImageGravity](#imagick.getimagegravity)(): [int](#language.types.integer)
public [getImageGreenPrimary](#imagick.getimagegreenprimary)(): [array](#language.types.array)
public [getImageHeight](#imagick.getimageheight)(): [int](#language.types.integer)
public [getImageHistogram](#imagick.getimagehistogram)(): [array](#language.types.array)
public [getImageIndex](#imagick.getimageindex)(): [int](#language.types.integer)
public [getImageInterlaceScheme](#imagick.getimageinterlacescheme)(): [int](#language.types.integer)
public [getImageInterpolateMethod](#imagick.getimageinterpolatemethod)(): [int](#language.types.integer)
public [getImageIterations](#imagick.getimageiterations)(): [int](#language.types.integer)
public [getImageLength](#imagick.getimagelength)(): [int](#language.types.integer)
public [getImageMatte](#imagick.getimagematte)(): [bool](#language.types.boolean)
public [getImageMatteColor](#imagick.getimagemattecolor)(): [ImagickPixel](#class.imagickpixel)
public [getImageMimeType](#imagick.getimagemimetype)(): [string](#language.types.string)
public [getImageOrientation](#imagick.getimageorientation)(): [int](#language.types.integer)
public [getImagePage](#imagick.getimagepage)(): [array](#language.types.array)
public [getImagePixelColor](#imagick.getimagepixelcolor)([int](#language.types.integer) $x, [int](#language.types.integer) $y): [ImagickPixel](#class.imagickpixel)
public [getImageProfile](#imagick.getimageprofile)([string](#language.types.string) $name): [string](#language.types.string)
public [getImageProfiles](#imagick.getimageprofiles)([string](#language.types.string) $pattern = "*", [bool](#language.types.boolean) $include_values = **[true](#constant.true)**): [array](#language.types.array)
public [getImageProperties](#imagick.getimageproperties)([string](#language.types.string) $pattern = "*", [bool](#language.types.boolean) $include_values = **[true](#constant.true)**): [array](#language.types.array)
public [getImageProperty](#imagick.getimageproperty)([string](#language.types.string) $name): [string](#language.types.string)
public [getImageRedPrimary](#imagick.getimageredprimary)(): [array](#language.types.array)
public [getImageRegion](#imagick.getimageregion)(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [Imagick](#class.imagick)
public [getImageRenderingIntent](#imagick.getimagerenderingintent)(): [int](#language.types.integer)
public [getImageResolution](#imagick.getimageresolution)(): [array](#language.types.array)
public [getImagesBlob](#imagick.getimagesblob)(): [string](#language.types.string)
public [getImageScene](#imagick.getimagescene)(): [int](#language.types.integer)
public [getImageSignature](#imagick.getimagesignature)(): [string](#language.types.string)
public [getImageSize](#imagick.getimagesize)(): [int](#language.types.integer)
public [getImageTicksPerSecond](#imagick.getimagetickspersecond)(): [int](#language.types.integer)
public [getImageTotalInkDensity](#imagick.getimagetotalinkdensity)(): [float](#language.types.float)
public [getImageType](#imagick.getimagetype)(): [int](#language.types.integer)
public [getImageUnits](#imagick.getimageunits)(): [int](#language.types.integer)
public [getImageVirtualPixelMethod](#imagick.getimagevirtualpixelmethod)(): [int](#language.types.integer)
public [getImageWhitePoint](#imagick.getimagewhitepoint)(): [array](#language.types.array)
public [getImageWidth](#imagick.getimagewidth)(): [int](#language.types.integer)
public [getInterlaceScheme](#imagick.getinterlacescheme)(): [int](#language.types.integer)
public [getIteratorIndex](#imagick.getiteratorindex)(): [int](#language.types.integer)
public [getNumberImages](#imagick.getnumberimages)(): [int](#language.types.integer)
public [getOption](#imagick.getoption)([string](#language.types.string) $key): [string](#language.types.string)
public static [getPackageName](#imagick.getpackagename)(): [string](#language.types.string)
public [getPage](#imagick.getpage)(): [array](#language.types.array)
public [getPixelIterator](#imagick.getpixeliterator)(): [ImagickPixelIterator](#class.imagickpixeliterator)
public [getPixelRegionIterator](#imagick.getpixelregioniterator)(
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $columns,
    [int](#language.types.integer) $rows
): [ImagickPixelIterator](#class.imagickpixeliterator)
public [getPointSize](#imagick.getpointsize)(): [float](#language.types.float)
public static [getQuantum](#imagick.getquantum)(): [int](#language.types.integer)
public static [getQuantumDepth](#imagick.getquantumdepth)(): [array](#language.types.array)
public static [getQuantumRange](#imagick.getquantumrange)(): [array](#language.types.array)
public static [getRegistry](#imagick.getregistry)([string](#language.types.string) $key): [string](#language.types.string)
public static [getReleaseDate](#imagick.getreleasedate)(): [string](#language.types.string)
public static [getResource](#imagick.getresource)([int](#language.types.integer) $type): [int](#language.types.integer)
public static [getResourceLimit](#imagick.getresourcelimit)([int](#language.types.integer) $type): [int](#language.types.integer)
public [getSamplingFactors](#imagick.getsamplingfactors)(): [array](#language.types.array)
public [getSize](#imagick.getsize)(): [array](#language.types.array)
public [getSizeOffset](#imagick.getsizeoffset)(): [int](#language.types.integer)
public static [getVersion](#imagick.getversion)(): [array](#language.types.array)
public [haldClutImage](#imagick.haldclutimage)([Imagick](#class.imagick) $clut, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [hasNextImage](#imagick.hasnextimage)(): [bool](#language.types.boolean)
public [hasPreviousImage](#imagick.haspreviousimage)(): [bool](#language.types.boolean)
public [identifyFormat](#imagick.identifyformat)([string](#language.types.string) $embedText): [string](#language.types.string)|[false](#language.types.singleton)
[identifyImage](#imagick.identifyimage)([bool](#language.types.boolean) $appendRawOutput = false): [array](#language.types.array)
public [implodeImage](#imagick.implodeimage)([float](#language.types.float) $radius): [bool](#language.types.boolean)
public [importImagePixels](#imagick.importimagepixels)(
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [string](#language.types.string) $map,
    [int](#language.types.integer) $storage,
    [array](#language.types.array) $pixels
): [bool](#language.types.boolean)
public [inverseFourierTransformImage](#imagick.inversefouriertransformimage)([Imagick](#class.imagick) $complement, [bool](#language.types.boolean) $magnitude): [bool](#language.types.boolean)
public [labelImage](#imagick.labelimage)([string](#language.types.string) $label): [bool](#language.types.boolean)
public [levelImage](#imagick.levelimage)(
    [float](#language.types.float) $blackPoint,
    [float](#language.types.float) $gamma,
    [float](#language.types.float) $whitePoint,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)
public [linearStretchImage](#imagick.linearstretchimage)([float](#language.types.float) $blackPoint, [float](#language.types.float) $whitePoint): [bool](#language.types.boolean)
public [liquidRescaleImage](#imagick.liquidrescaleimage)(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [float](#language.types.float) $delta_x,
    [float](#language.types.float) $rigidity
): [bool](#language.types.boolean)
public static [listRegistry](#imagick.listregistry)(): [array](#language.types.array)
public [magnifyImage](#imagick.magnifyimage)(): [bool](#language.types.boolean)
public [mapImage](#imagick.mapimage)([Imagick](#class.imagick) $map, [bool](#language.types.boolean) $dither): [bool](#language.types.boolean)
public [matteFloodfillImage](#imagick.mattefloodfillimage)(
    [float](#language.types.float) $alpha,
    [float](#language.types.float) $fuzz,
    [mixed](#language.types.mixed) $bordercolor,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)
public [medianFilterImage](#imagick.medianfilterimage)([float](#language.types.float) $radius): [bool](#language.types.boolean)
public [mergeImageLayers](#imagick.mergeimagelayers)([int](#language.types.integer) $layer_method): [Imagick](#class.imagick)
public [minifyImage](#imagick.minifyimage)(): [bool](#language.types.boolean)
public [modulateImage](#imagick.modulateimage)([float](#language.types.float) $brightness, [float](#language.types.float) $saturation, [float](#language.types.float) $hue): [bool](#language.types.boolean)
public [montageImage](#imagick.montageimage)(
    [ImagickDraw](#class.imagickdraw) $draw,
    [string](#language.types.string) $tile_geometry,
    [string](#language.types.string) $thumbnail_geometry,
    [int](#language.types.integer) $mode,
    [string](#language.types.string) $frame
): [Imagick](#class.imagick)
public [morphImages](#imagick.morphimages)([int](#language.types.integer) $number_frames): [Imagick](#class.imagick)
public [morphology](#imagick.morphology)(
    [int](#language.types.integer) $morphologyMethod,
    [int](#language.types.integer) $iterations,
    [ImagickKernel](#class.imagickkernel) $ImagickKernel,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)
public [mosaicImages](#imagick.mosaicimages)(): [Imagick](#class.imagick)
public [motionBlurImage](#imagick.motionblurimage)(
    [float](#language.types.float) $radius,
    [float](#language.types.float) $sigma,
    [float](#language.types.float) $angle,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)
public [negateImage](#imagick.negateimage)([bool](#language.types.boolean) $gray, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [newImage](#imagick.newimage)(
    [int](#language.types.integer) $cols,
    [int](#language.types.integer) $rows,
    [mixed](#language.types.mixed) $background,
    [string](#language.types.string) $format = ?
): [bool](#language.types.boolean)
public [newPseudoImage](#imagick.newpseudoimage)([int](#language.types.integer) $columns, [int](#language.types.integer) $rows, [string](#language.types.string) $pseudoString): [bool](#language.types.boolean)
public [nextImage](#imagick.nextimage)(): [bool](#language.types.boolean)
public [normalizeImage](#imagick.normalizeimage)([int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [oilPaintImage](#imagick.oilpaintimage)([float](#language.types.float) $radius): [bool](#language.types.boolean)
public [opaquePaintImage](#imagick.opaquepaintimage)(
    [mixed](#language.types.mixed) $target,
    [mixed](#language.types.mixed) $fill,
    [float](#language.types.float) $fuzz,
    [bool](#language.types.boolean) $invert,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)
public [optimizeImageLayers](#imagick.optimizeimagelayers)(): [bool](#language.types.boolean)
public [orderedPosterizeImage](#imagick.orderedposterizeimage)([string](#language.types.string) $threshold_map, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [paintFloodfillImage](#imagick.paintfloodfillimage)(
    [mixed](#language.types.mixed) $fill,
    [float](#language.types.float) $fuzz,
    [mixed](#language.types.mixed) $bordercolor,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)
public [paintOpaqueImage](#imagick.paintopaqueimage)(
    [mixed](#language.types.mixed) $target,
    [mixed](#language.types.mixed) $fill,
    [float](#language.types.float) $fuzz,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)
public [paintTransparentImage](#imagick.painttransparentimage)([mixed](#language.types.mixed) $target, [float](#language.types.float) $alpha, [float](#language.types.float) $fuzz): [bool](#language.types.boolean)
public [pingImage](#imagick.pingimage)([string](#language.types.string) $filename): [bool](#language.types.boolean)
public [pingImageBlob](#imagick.pingimageblob)([string](#language.types.string) $image): [bool](#language.types.boolean)
public [pingImageFile](#imagick.pingimagefile)([resource](#language.types.resource) $filehandle, [string](#language.types.string) $fileName = ?): [bool](#language.types.boolean)
public [polaroidImage](#imagick.polaroidimage)([ImagickDraw](#class.imagickdraw) $properties, [float](#language.types.float) $angle): [bool](#language.types.boolean)
public [posterizeImage](#imagick.posterizeimage)([int](#language.types.integer) $levels, [bool](#language.types.boolean) $dither): [bool](#language.types.boolean)
public [previewImages](#imagick.previewimages)([int](#language.types.integer) $preview): [bool](#language.types.boolean)
public [previousImage](#imagick.previousimage)(): [bool](#language.types.boolean)
public [profileImage](#imagick.profileimage)([string](#language.types.string) $name, [string](#language.types.string) $profile = ?): [bool](#language.types.boolean)
public [quantizeImage](#imagick.quantizeimage)(
    [int](#language.types.integer) $numberColors,
    [int](#language.types.integer) $colorspace,
    [int](#language.types.integer) $treedepth,
    [bool](#language.types.boolean) $dither,
    [bool](#language.types.boolean) $measureError
): [bool](#language.types.boolean)
public [quantizeImages](#imagick.quantizeimages)(
    [int](#language.types.integer) $numberColors,
    [int](#language.types.integer) $colorspace,
    [int](#language.types.integer) $treedepth,
    [bool](#language.types.boolean) $dither,
    [bool](#language.types.boolean) $measureError
): [bool](#language.types.boolean)
public [queryFontMetrics](#imagick.queryfontmetrics)([ImagickDraw](#class.imagickdraw) $properties, [string](#language.types.string) $text, [bool](#language.types.boolean) $multiline = ?): [array](#language.types.array)
public static [queryFonts](#imagick.queryfonts)([string](#language.types.string) $pattern = "*"): [array](#language.types.array)
public static [queryFormats](#imagick.queryformats)([string](#language.types.string) $pattern = "*"): [array](#language.types.array)
public [radialBlurImage](#imagick.radialblurimage)([float](#language.types.float) $angle, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [raiseImage](#imagick.raiseimage)(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [bool](#language.types.boolean) $raise
): [bool](#language.types.boolean)
public [randomThresholdImage](#imagick.randomthresholdimage)([float](#language.types.float) $low, [float](#language.types.float) $high, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [readImage](#imagick.readimage)([string](#language.types.string) $filename): [bool](#language.types.boolean)
public [readImageBlob](#imagick.readimageblob)([string](#language.types.string) $image, [string](#language.types.string) $filename = ?): [bool](#language.types.boolean)
public [readImageFile](#imagick.readimagefile)([resource](#language.types.resource) $filehandle, [string](#language.types.string) $fileName = **[null](#constant.null)**): [bool](#language.types.boolean)
public [readImages](#imagick.readimages)([array](#language.types.array) $filenames): [bool](#language.types.boolean)
public [recolorImage](#imagick.recolorimage)([array](#language.types.array) $matrix): [bool](#language.types.boolean)
public [reduceNoiseImage](#imagick.reducenoiseimage)([float](#language.types.float) $radius): [bool](#language.types.boolean)
public [remapImage](#imagick.remapimage)([Imagick](#class.imagick) $replacement, [int](#language.types.integer) $DITHER): [bool](#language.types.boolean)
public [removeImage](#imagick.removeimage)(): [bool](#language.types.boolean)
public [removeImageProfile](#imagick.removeimageprofile)([string](#language.types.string) $name): [string](#language.types.string)
public [render](#imagick.render)(): [bool](#language.types.boolean)
public [resampleImage](#imagick.resampleimage)(
    [float](#language.types.float) $x_resolution,
    [float](#language.types.float) $y_resolution,
    [int](#language.types.integer) $filter,
    [float](#language.types.float) $blur
): [bool](#language.types.boolean)
public [resetImagePage](#imagick.resetimagepage)([string](#language.types.string) $page): [bool](#language.types.boolean)
public [resizeImage](#imagick.resizeimage)(
    [int](#language.types.integer) $columns,
    [int](#language.types.integer) $rows,
    [int](#language.types.integer) $filter,
    [float](#language.types.float) $blur,
    [bool](#language.types.boolean) $bestfit = **[false](#constant.false)**,
    [bool](#language.types.boolean) $legacy = **[false](#constant.false)**
): [bool](#language.types.boolean)
public [rollImage](#imagick.rollimage)([int](#language.types.integer) $x, [int](#language.types.integer) $y): [bool](#language.types.boolean)
public [rotateImage](#imagick.rotateimage)([mixed](#language.types.mixed) $background, [float](#language.types.float) $degrees): [bool](#language.types.boolean)
public [rotationalBlurImage](#imagick.rotationalblurimage)([float](#language.types.float) $angle, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [roundCorners](#imagick.roundcorners)(
    [float](#language.types.float) $x_rounding,
    [float](#language.types.float) $y_rounding,
    [float](#language.types.float) $stroke_width = 10,
    [float](#language.types.float) $displace = 5,
    [float](#language.types.float) $size_correction = -6
): [bool](#language.types.boolean)
public [sampleImage](#imagick.sampleimage)([int](#language.types.integer) $columns, [int](#language.types.integer) $rows): [bool](#language.types.boolean)
public [scaleImage](#imagick.scaleimage)(
    [int](#language.types.integer) $columns,
    [int](#language.types.integer) $rows,
    [bool](#language.types.boolean) $bestfit = **[false](#constant.false)**,
    [bool](#language.types.boolean) $legacy = **[false](#constant.false)**
): [bool](#language.types.boolean)
public [segmentImage](#imagick.segmentimage)(
    [int](#language.types.integer) $COLORSPACE,
    [float](#language.types.float) $cluster_threshold,
    [float](#language.types.float) $smooth_threshold,
    [bool](#language.types.boolean) $verbose = **[false](#constant.false)**
): [bool](#language.types.boolean)
public [selectiveBlurImage](#imagick.selectiveblurimage)(
    [float](#language.types.float) $radius,
    [float](#language.types.float) $sigma,
    [float](#language.types.float) $threshold,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)
public [separateImageChannel](#imagick.separateimagechannel)([int](#language.types.integer) $channel): [bool](#language.types.boolean)
public [sepiaToneImage](#imagick.sepiatoneimage)([float](#language.types.float) $threshold): [bool](#language.types.boolean)
public [setBackgroundColor](#imagick.setbackgroundcolor)([mixed](#language.types.mixed) $background): [bool](#language.types.boolean)
public [setColorspace](#imagick.setcolorspace)([int](#language.types.integer) $COLORSPACE): [bool](#language.types.boolean)
public [setCompression](#imagick.setcompression)([int](#language.types.integer) $compression): [bool](#language.types.boolean)
public [setCompressionQuality](#imagick.setcompressionquality)([int](#language.types.integer) $quality): [bool](#language.types.boolean)
public [setFilename](#imagick.setfilename)([string](#language.types.string) $filename): [bool](#language.types.boolean)
public [setFirstIterator](#imagick.setfirstiterator)(): [bool](#language.types.boolean)
public [setFont](#imagick.setfont)([string](#language.types.string) $font): [bool](#language.types.boolean)
public [setFormat](#imagick.setformat)([string](#language.types.string) $format): [bool](#language.types.boolean)
public [setGravity](#imagick.setgravity)([int](#language.types.integer) $gravity): [bool](#language.types.boolean)
public [setImage](#imagick.setimage)([Imagick](#class.imagick) $replace): [bool](#language.types.boolean)
public [setImageAlphaChannel](#imagick.setimagealphachannel)([int](#language.types.integer) $mode): [bool](#language.types.boolean)
public [setImageArtifact](#imagick.setimageartifact)([string](#language.types.string) $artifact, [string](#language.types.string) $value): [bool](#language.types.boolean)
public [setImageAttribute](#imagick.setimageattribute)([string](#language.types.string) $key, [string](#language.types.string) $value): [bool](#language.types.boolean)
public [setImageBackgroundColor](#imagick.setimagebackgroundcolor)([mixed](#language.types.mixed) $background): [bool](#language.types.boolean)
public [setImageBias](#imagick.setimagebias)([float](#language.types.float) $bias): [bool](#language.types.boolean)
public [setImageBiasQuantum](#imagick.setimagebiasquantum)([float](#language.types.float) $bias): [void](language.types.void.html)
public [setImageBluePrimary](#imagick.setimageblueprimary)([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)
public [setImageBorderColor](#imagick.setimagebordercolor)([mixed](#language.types.mixed) $border): [bool](#language.types.boolean)
public [setImageChannelDepth](#imagick.setimagechanneldepth)([int](#language.types.integer) $channel, [int](#language.types.integer) $depth): [bool](#language.types.boolean)
public [setImageClipMask](#imagick.setimageclipmask)([Imagick](#class.imagick) $clip_mask): [bool](#language.types.boolean)
public [setImageColormapColor](#imagick.setimagecolormapcolor)([int](#language.types.integer) $index, [ImagickPixel](#class.imagickpixel) $color): [bool](#language.types.boolean)
public [setImageColorspace](#imagick.setimagecolorspace)([int](#language.types.integer) $colorspace): [bool](#language.types.boolean)
public [setImageCompose](#imagick.setimagecompose)([int](#language.types.integer) $compose): [bool](#language.types.boolean)
public [setImageCompression](#imagick.setimagecompression)([int](#language.types.integer) $compression): [bool](#language.types.boolean)
public [setImageCompressionQuality](#imagick.setimagecompressionquality)([int](#language.types.integer) $quality): [bool](#language.types.boolean)
public [setImageDelay](#imagick.setimagedelay)([int](#language.types.integer) $delay): [bool](#language.types.boolean)
public [setImageDepth](#imagick.setimagedepth)([int](#language.types.integer) $depth): [bool](#language.types.boolean)
public [setImageDispose](#imagick.setimagedispose)([int](#language.types.integer) $dispose): [bool](#language.types.boolean)
public [setImageExtent](#imagick.setimageextent)([int](#language.types.integer) $columns, [int](#language.types.integer) $rows): [bool](#language.types.boolean)
public [setImageFilename](#imagick.setimagefilename)([string](#language.types.string) $filename): [bool](#language.types.boolean)
public [setImageFormat](#imagick.setimageformat)([string](#language.types.string) $format): [bool](#language.types.boolean)
public [setImageGamma](#imagick.setimagegamma)([float](#language.types.float) $gamma): [bool](#language.types.boolean)
public [setImageGravity](#imagick.setimagegravity)([int](#language.types.integer) $gravity): [bool](#language.types.boolean)
public [setImageGreenPrimary](#imagick.setimagegreenprimary)([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)
public [setImageIndex](#imagick.setimageindex)([int](#language.types.integer) $index): [bool](#language.types.boolean)
public [setImageInterlaceScheme](#imagick.setimageinterlacescheme)([int](#language.types.integer) $interlace_scheme): [bool](#language.types.boolean)
public [setImageInterpolateMethod](#imagick.setimageinterpolatemethod)([int](#language.types.integer) $method): [bool](#language.types.boolean)
public [setImageIterations](#imagick.setimageiterations)([int](#language.types.integer) $iterations): [bool](#language.types.boolean)
public [setImageMatte](#imagick.setimagematte)([bool](#language.types.boolean) $matte): [bool](#language.types.boolean)
public [setImageMatteColor](#imagick.setimagemattecolor)([mixed](#language.types.mixed) $matte): [bool](#language.types.boolean)
public [setImageOpacity](#imagick.setimageopacity)([float](#language.types.float) $opacity): [bool](#language.types.boolean)
public [setImageOrientation](#imagick.setimageorientation)([int](#language.types.integer) $orientation): [bool](#language.types.boolean)
public [setImagePage](#imagick.setimagepage)(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)
public [setImageProfile](#imagick.setimageprofile)([string](#language.types.string) $name, [string](#language.types.string) $profile): [bool](#language.types.boolean)
public [setImageProperty](#imagick.setimageproperty)([string](#language.types.string) $name, [string](#language.types.string) $value): [bool](#language.types.boolean)
public [setImageRedPrimary](#imagick.setimageredprimary)([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)
public [setImageRenderingIntent](#imagick.setimagerenderingintent)([int](#language.types.integer) $rendering_intent): [bool](#language.types.boolean)
public [setImageResolution](#imagick.setimageresolution)([float](#language.types.float) $x_resolution, [float](#language.types.float) $y_resolution): [bool](#language.types.boolean)
public [setImageScene](#imagick.setimagescene)([int](#language.types.integer) $scene): [bool](#language.types.boolean)
public [setImageTicksPerSecond](#imagick.setimagetickspersecond)([int](#language.types.integer) $ticks_per_second): [bool](#language.types.boolean)
public [setImageType](#imagick.setimagetype)([int](#language.types.integer) $image_type): [bool](#language.types.boolean)
public [setImageUnits](#imagick.setimageunits)([int](#language.types.integer) $units): [bool](#language.types.boolean)
public [setImageVirtualPixelMethod](#imagick.setimagevirtualpixelmethod)([int](#language.types.integer) $method): [bool](#language.types.boolean)
public [setImageWhitePoint](#imagick.setimagewhitepoint)([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)
public [setInterlaceScheme](#imagick.setinterlacescheme)([int](#language.types.integer) $interlace_scheme): [bool](#language.types.boolean)
public [setIteratorIndex](#imagick.setiteratorindex)([int](#language.types.integer) $index): [bool](#language.types.boolean)
public [setLastIterator](#imagick.setlastiterator)(): [bool](#language.types.boolean)
public [setOption](#imagick.setoption)([string](#language.types.string) $key, [string](#language.types.string) $value): [bool](#language.types.boolean)
public [setPage](#imagick.setpage)(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)
public [setPointSize](#imagick.setpointsize)([float](#language.types.float) $point_size): [bool](#language.types.boolean)
public [setProgressMonitor](#imagick.setprogressmonitor)([callable](#language.types.callable) $callback): [bool](#language.types.boolean)
public static [setRegistry](#imagick.setregistry)([string](#language.types.string) $key, [string](#language.types.string) $value): [bool](#language.types.boolean)
public [setResolution](#imagick.setresolution)([float](#language.types.float) $x_resolution, [float](#language.types.float) $y_resolution): [bool](#language.types.boolean)
public static [setResourceLimit](#imagick.setresourcelimit)([int](#language.types.integer) $type, [int](#language.types.integer) $limit): [bool](#language.types.boolean)
public [setSamplingFactors](#imagick.setsamplingfactors)([array](#language.types.array) $factors): [bool](#language.types.boolean)
public [setSize](#imagick.setsize)([int](#language.types.integer) $columns, [int](#language.types.integer) $rows): [bool](#language.types.boolean)
public [setSizeOffset](#imagick.setsizeoffset)([int](#language.types.integer) $columns, [int](#language.types.integer) $rows, [int](#language.types.integer) $offset): [bool](#language.types.boolean)
public [setType](#imagick.settype)([int](#language.types.integer) $image_type): [bool](#language.types.boolean)
public [shadeImage](#imagick.shadeimage)([bool](#language.types.boolean) $gray, [float](#language.types.float) $azimuth, [float](#language.types.float) $elevation): [bool](#language.types.boolean)
public [shadowImage](#imagick.shadowimage)(
    [float](#language.types.float) $opacity,
    [float](#language.types.float) $sigma,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)
public [sharpenImage](#imagick.sharpenimage)([float](#language.types.float) $radius, [float](#language.types.float) $sigma, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [shaveImage](#imagick.shaveimage)([int](#language.types.integer) $columns, [int](#language.types.integer) $rows): [bool](#language.types.boolean)
public [shearImage](#imagick.shearimage)([mixed](#language.types.mixed) $background, [float](#language.types.float) $x_shear, [float](#language.types.float) $y_shear): [bool](#language.types.boolean)
public [sigmoidalContrastImage](#imagick.sigmoidalcontrastimage)(
    [bool](#language.types.boolean) $sharpen,
    [float](#language.types.float) $alpha,
    [float](#language.types.float) $beta,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)
public [sketchImage](#imagick.sketchimage)([float](#language.types.float) $radius, [float](#language.types.float) $sigma, [float](#language.types.float) $angle): [bool](#language.types.boolean)
public [smushImages](#imagick.smushimages)([bool](#language.types.boolean) $stack, [int](#language.types.integer) $offset): [Imagick](#class.imagick)
public [solarizeImage](#imagick.solarizeimage)([int](#language.types.integer) $threshold): [bool](#language.types.boolean)
public [sparseColorImage](#imagick.sparsecolorimage)([int](#language.types.integer) $SPARSE_METHOD, [array](#language.types.array) $arguments, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [spliceImage](#imagick.spliceimage)(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)
public [spreadImage](#imagick.spreadimage)([float](#language.types.float) $radius): [bool](#language.types.boolean)
public [statisticImage](#imagick.statisticimage)(
    [int](#language.types.integer) $type,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)
public [steganoImage](#imagick.steganoimage)([Imagick](#class.imagick) $watermark_wand, [int](#language.types.integer) $offset): [Imagick](#class.imagick)
public [stereoImage](#imagick.stereoimage)([Imagick](#class.imagick) $offset_wand): [bool](#language.types.boolean)
public [stripImage](#imagick.stripimage)(): [bool](#language.types.boolean)
public [subImageMatch](#imagick.subimagematch)([Imagick](#class.imagick) $Imagick, [array](#language.types.array) &amp;$offset = ?, [float](#language.types.float) &amp;$similarity = ?): [Imagick](#class.imagick)
[swirlImage](#imagick.swirlimage)([float](#language.types.float) $degrees): [bool](#language.types.boolean)
[textureImage](#imagick.textureimage)([Imagick](#class.imagick) $texture_wand): [Imagick](#class.imagick)
public [thresholdImage](#imagick.thresholdimage)([float](#language.types.float) $threshold, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)
public [thumbnailImage](#imagick.thumbnailimage)(
    [int](#language.types.integer) $columns,
    [int](#language.types.integer) $rows,
    [bool](#language.types.boolean) $bestfit = **[false](#constant.false)**,
    [bool](#language.types.boolean) $fill = **[false](#constant.false)**,
    [bool](#language.types.boolean) $legacy = **[false](#constant.false)**
): [bool](#language.types.boolean)
public [tintImage](#imagick.tintimage)([mixed](#language.types.mixed) $tint, [mixed](#language.types.mixed) $opacity, [bool](#language.types.boolean) $legacy = **[false](#constant.false)**): [bool](#language.types.boolean)
public [\_\_toString](#imagick.tostring)(): [string](#language.types.string)
public [transformImage](#imagick.transformimage)([string](#language.types.string) $crop, [string](#language.types.string) $geometry): [Imagick](#class.imagick)
public [transformImageColorspace](#imagick.transformimagecolorspace)([int](#language.types.integer) $colorspace): [bool](#language.types.boolean)
public [transparentPaintImage](#imagick.transparentpaintimage)(
    [mixed](#language.types.mixed) $target,
    [float](#language.types.float) $alpha,
    [float](#language.types.float) $fuzz,
    [bool](#language.types.boolean) $invert
): [bool](#language.types.boolean)
public [transposeImage](#imagick.transposeimage)(): [bool](#language.types.boolean)
public [transverseImage](#imagick.transverseimage)(): [bool](#language.types.boolean)
public [trimImage](#imagick.trimimage)([float](#language.types.float) $fuzz): [bool](#language.types.boolean)
public [uniqueImageColors](#imagick.uniqueimagecolors)(): [bool](#language.types.boolean)
public [unsharpMaskImage](#imagick.unsharpmaskimage)(
    [float](#language.types.float) $radius,
    [float](#language.types.float) $sigma,
    [float](#language.types.float) $amount,
    [float](#language.types.float) $threshold,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)
public [valid](#imagick.valid)(): [bool](#language.types.boolean)
public [vignetteImage](#imagick.vignetteimage)(
    [float](#language.types.float) $blackPoint,
    [float](#language.types.float) $whitePoint,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)
public [waveImage](#imagick.waveimage)([float](#language.types.float) $amplitude, [float](#language.types.float) $length): [bool](#language.types.boolean)
public [whiteThresholdImage](#imagick.whitethresholdimage)([mixed](#language.types.mixed) $threshold): [bool](#language.types.boolean)
public [writeImage](#imagick.writeimage)([string](#language.types.string) $filename = NULL): [bool](#language.types.boolean)
public [writeImageFile](#imagick.writeimagefile)([resource](#language.types.resource) $filehandle, [string](#language.types.string) $format = ?): [bool](#language.types.boolean)
public [writeImages](#imagick.writeimages)([string](#language.types.string) $filename, [bool](#language.types.boolean) $adjoin): [bool](#language.types.boolean)
public [writeImagesFile](#imagick.writeimagesfile)([resource](#language.types.resource) $filehandle, [string](#language.types.string) $format = ?): [bool](#language.types.boolean)

}

## Métodos de imagen y métodos globales

La clase Imagick permite actuar sobre varias imágenes simultáneamente y esto,
gracias a una pila interna. Siempre hay un puntero interno, apuntando
a la imagen actual. Algunas funciones actúan sobre todas las imágenes
de una clase Imagick, pero la mayoría únicamente sobre la imagen actual
en relación con esta pila. Al igual que las conversiones, los nombres de los métodos
pueden contener el nombre de la imagen, relatando únicamente el efecto
sobre la imagen de la pila.

## Métodos de la clase

Dado el número de métodos, aquí se presenta una lista que los muestra de forma general:

   <caption>**Métodos de la clase**</caption>
   
    
     
      Efectos sobre la imagen
      Métodos de recuperación
      Métodos de definición
      Lectura/escritura de la imagen
      Otros


      [Imagick::adaptiveBlurImage()](#imagick.adaptiveblurimage)
      [Imagick::getCompression()](#imagick.getcompression)
      [Imagick::setBackgroundColor()](#imagick.setbackgroundcolor)
      [Imagick::__construct()](#imagick.construct)
      [Imagick::clear()](#imagick.clear)



      [Imagick::adaptiveResizeImage()](#imagick.adaptiveresizeimage)
      [Imagick::getFilename()](#imagick.getfilename)
      [Imagick::setCompressionQuality()](#imagick.setcompressionquality)
      [Imagick::addImage()](#imagick.addimage)
      [Imagick::clone()](#imagick.clone)



      [Imagick::adaptiveSharpenImage()](#imagick.adaptivesharpenimage)
      [Imagick::getFormat()](#imagick.getformat)
      [Imagick::setCompression()](#imagick.setcompression)
      [Imagick::appendImages()](#imagick.appendimages)
      [Imagick::current()](#imagick.current)



      [Imagick::adaptiveThresholdImage()](#imagick.adaptivethresholdimage)
      [Imagick::getImageBackgroundColor()](#imagick.getimagebackgroundcolor)
      [Imagick::setFilename()](#imagick.setfilename)
      [Imagick::getFilename()](#imagick.getfilename)
      [Imagick::destroy()](#imagick.destroy)



      [Imagick::addNoiseImage()](#imagick.addnoiseimage)
      [Imagick::getImageBlob()](#imagick.getimageblob)
      [Imagick::getImagesBlob()](#imagick.getimagesblob)
      [Imagick::setFormat()](#imagick.setformat)
      [Imagick::getFormat()](#imagick.getformat)



      [Imagick::affinetransformimage()](#imagick.affinetransformimage)
      [Imagick::getImageBluePrimary()](#imagick.getimageblueprimary)
      [Imagick::setImageBackgroundColor()](#imagick.setimagebackgroundcolor)
      [Imagick::getImageFilename()](#imagick.getimagefilename)
      [Imagick::getHomeURL()](#imagick.gethomeurl)



      [Imagick::annotateImage()](#imagick.annotateimage)
      [Imagick::getImageBorderColor()](#imagick.getimagebordercolor)
      [Imagick::setFirstIterator()](#imagick.setfirstiterator)
      [Imagick::getImageFormat()](#imagick.getimageformat)
      [Imagick::commentImage()](#imagick.commentimage)



      [Imagick::averageImages()](#imagick.averageimages)
      [Imagick::getImageChannelDepth()](#imagick.getimagechanneldepth)
      [Imagick::setImageBias()](#imagick.setimagebias)
      [Imagick::getImage()](#imagick.getimage)
      [Imagick::getNumberImages()](#imagick.getnumberimages)



      [Imagick::blackThresholdImage()](#imagick.blackthresholdimage)
      [Imagick::getImageChannelDistortion()](#imagick.getimagechanneldistortion)
      [Imagick::setImageBluePrimary()](#imagick.setimageblueprimary)
      [Imagick::setImageFilename()](#imagick.setimagefilename)
      [Imagick::getReleaseDate()](#imagick.getreleasedate)



      [Imagick::blurImage()](#imagick.blurimage)
      [Imagick::getImageChannelExtrema()](#imagick.getimagechannelextrema)
      [Imagick::setImageBorderColor()](#imagick.setimagebordercolor)
      [Imagick::setImageFormat()](#imagick.setimageformat)
      [Imagick::getVersion()](#imagick.getversion)



      [Imagick::borderImage()](#imagick.borderimage)
      [Imagick::getImageChannelMean()](#imagick.getimagechannelmean)
      [Imagick::setImageChannelDepth()](#imagick.setimagechanneldepth)
      [Imagick::readImageFile()](#imagick.readimagefile)
      [Imagick::hasNextImage()](#imagick.hasnextimage)



      [Imagick::charcoalImage()](#imagick.charcoalimage)
      [Imagick::getImageChannelStatistics()](#imagick.getimagechannelstatistics)
      [Imagick::setImageColormapColor()](#imagick.setimagecolormapcolor)
      [Imagick::readImage()](#imagick.readimage)
      [Imagick::hasPreviousImage()](#imagick.haspreviousimage)



      [Imagick::chopImage()](#imagick.chopimage)
      [Imagick::getImageColormapColor()](#imagick.getimagecolormapcolor)
      [Imagick::setImageColorSpace()](#imagick.setimagecolorspace)
      [Imagick::writeImages()](#imagick.writeimages)
      [Imagick::labelImage()](#imagick.labelimage)



      [Imagick::clipImage()](#imagick.clipimage)
      [Imagick::getImageColorspace()](#imagick.getimagecolorspace)
      [Imagick::setImageCompose()](#imagick.setimagecompose)
      [Imagick::writeImage()](#imagick.writeimage)
      [Imagick::newImage()](#imagick.newimage)



      [Imagick::clipPathImage()](#imagick.clippathimage)
      [Imagick::getImageColors()](#imagick.getimagecolors)
      [Imagick::setImageCompression()](#imagick.setimagecompression)
       
      [Imagick::newPseudoImage()](#imagick.newpseudoimage)



      [Imagick::coalesceImages()](#imagick.coalesceimages)
      [Imagick::getImageCompose()](#imagick.getimagecompose)
      [Imagick::setImageDelay()](#imagick.setimagedelay)
       
      [Imagick::nextImage()](#imagick.nextimage)



      [Imagick::colorFloodFillImage()](#imagick.colorfloodfillimage)
      [Imagick::getImageDelay()](#imagick.getimagedelay)
      [Imagick::setImageDepth()](#imagick.setimagedepth)
       
      [Imagick::pingImageBlob()](#imagick.pingimageblob)



      [Imagick::colorizeImage()](#imagick.colorizeimage)
      [Imagick::getImageDepth()](#imagick.getimagedepth)
      [Imagick::setImageDispose()](#imagick.setimagedispose)
       
      [Imagick::pingImageFile()](#imagick.pingimagefile)



      [Imagick::combineImages()](#imagick.combineimages)
      [Imagick::getImageDispose()](#imagick.getimagedispose)
      [Imagick::setImageDispose()](#imagick.setimagedispose)
       
      [Imagick::pingImage()](#imagick.pingimage)



      [Imagick::compareImageChannels()](#imagick.compareimagechannels)
      [Imagick::getImageDistortion()](#imagick.getimagedistortion)
      [Imagick::setImageExtent()](#imagick.setimageextent)
       
      [Imagick::previousImage()](#imagick.previousimage)



      [Imagick::compareImageLayers()](#imagick.compareimagelayers)
      [Imagick::getImageExtrema()](#imagick.getimageextrema)
      [Imagick::setImageFilename()](#imagick.setimagefilename)
       
      [Imagick::profileImage()](#imagick.profileimage)



      [Imagick::compositeImage()](#imagick.compositeimage)
      [Imagick::getImageFilename()](#imagick.getimagefilename)
      [Imagick::setImageFormat()](#imagick.setimageformat)
       
      [Imagick::queryFormats()](#imagick.queryformats)



      [Imagick::contrastImage()](#imagick.contrastimage)
      [Imagick::getImageFormat()](#imagick.getimageformat)
      [Imagick::setImageGamma()](#imagick.setimagegamma)
       
      [Imagick::removeImageProfile()](#imagick.removeimageprofile)



      [Imagick::contrastStretchImage()](#imagick.contraststretchimage)
      [Imagick::getImageGamma()](#imagick.getimagegamma)
      [Imagick::setImageGreenPrimary()](#imagick.setimagegreenprimary)
       
      [Imagick::removeImage()](#imagick.removeimage)



      [Imagick::convolveImage()](#imagick.convolveimage)
      [Imagick::getImageGeometry()](#imagick.getimagegeometry)
      [Imagick::setImageIndex()](#imagick.setimageindex)
       
      [Imagick::setFirstIterator()](#imagick.setfirstiterator)



      [Imagick::cropImage()](#imagick.cropimage)
      [Imagick::getImageGreenPrimary()](#imagick.getimagegreenprimary)
      [Imagick::setImageInterpolateMethod()](#imagick.setimageinterpolatemethod)
       
      [Imagick::setImageIndex()](#imagick.setimageindex)



      [Imagick::cycleColormapImage()](#imagick.cyclecolormapimage)
      [Imagick::getImageHeight()](#imagick.getimageheight)
      [Imagick::setImageIterations()](#imagick.setimageiterations)
       
      [Imagick::valid()](#imagick.valid)



      [Imagick::deconstructImages()](#imagick.deconstructimages)
      [Imagick::getImageHistogram()](#imagick.getimagehistogram)
      [Imagick::setImageMatteColor()](#imagick.setimagemattecolor)
       
      [Imagick::getCopyright()](#imagick.getcopyright)



      [Imagick::drawImage()](#imagick.drawimage)
      [Imagick::getImageIndex()](#imagick.getimageindex)
      [Imagick::setImageMatte()](#imagick.setimagematte)
       
       



      [Imagick::edgeImage()](#imagick.edgeimage)
      [Imagick::getImageInterlaceScheme()](#imagick.getimageinterlacescheme)
      [Imagick::setImagePage()](#imagick.setimagepage)
       
       



      [Imagick::embossImage()](#imagick.embossimage)
      [Imagick::getImageInterpolateMethod()](#imagick.getimageinterpolatemethod)
      [Imagick::setImageProfile()](#imagick.setimageprofile)
       
       



      [Imagick::enhanceImage()](#imagick.enhanceimage)
      [Imagick::getImageIterations()](#imagick.getimageiterations)
      [Imagick::setImageProperty()](#imagick.setimageproperty)
       
       



      [Imagick::equalizeImage()](#imagick.equalizeimage)
      [Imagick::getImageMatteColor()](#imagick.getimagemattecolor)
      [Imagick::setImageRedPrimary()](#imagick.setimageredprimary)
       
       



      [Imagick::evaluateImage()](#imagick.evaluateimage)
      [Imagick::getImageMatte()](#imagick.getimagematte)
      [Imagick::setImageRenderingIntent()](#imagick.setimagerenderingintent)
       
       



      [Imagick::flattenImages()](#imagick.flattenimages)
      [Imagick::getImagePage()](#imagick.getimagepage)
      [Imagick::setImageResolution()](#imagick.setimageresolution)
       
       



      [Imagick::flipImage()](#imagick.flipimage)
      [Imagick::getImagePixelColor()](#imagick.getimagepixelcolor)
      [Imagick::setImageScene()](#imagick.setimagescene)
       
       



      [Imagick::flopImage()](#imagick.flopimage)
      [Imagick::getImageProfile()](#imagick.getimageprofile)
      [Imagick::setImageTicksPerSecond()](#imagick.setimagetickspersecond)
       
       



       
      [Imagick::getImageProperty()](#imagick.getimageproperty)
      [Imagick::setImageType()](#imagick.setimagetype)
       
       



      [Imagick::fxImage()](#imagick.fximage)
      [Imagick::getImageRedPrimary()](#imagick.getimageredprimary)
      [Imagick::setImageUnits()](#imagick.setimageunits)
       
       



      [Imagick::gammaImage()](#imagick.gammaimage)
      [Imagick::getImageRegion()](#imagick.getimageregion)
      [Imagick::setImageVirtualPixelMethod()](#imagick.setimagevirtualpixelmethod)
       
       



      [Imagick::gaussianBlurImage()](#imagick.gaussianblurimage)
      [Imagick::getImageRenderingIntent()](#imagick.getimagerenderingintent)
      [Imagick::setImageWhitepoint()](#imagick.setimagewhitepoint)
       
       



      [Imagick::implodeImage()](#imagick.implodeimage)
      [Imagick::getImageResolution()](#imagick.getimageresolution)
      [Imagick::setInterlaceScheme()](#imagick.setinterlacescheme)
       
       



      [Imagick::levelImage()](#imagick.levelimage)
      [Imagick::getImageScene()](#imagick.getimagescene)
      [Imagick::setOption()](#imagick.setoption)
       
       



      [Imagick::linearStretchImage()](#imagick.linearstretchimage)
      [Imagick::getImageSignature()](#imagick.getimagesignature)
      [Imagick::setPage()](#imagick.setpage)
       
       



      [Imagick::magnifyImage()](#imagick.magnifyimage)
      [Imagick::getImageTicksPerSecond()](#imagick.getimagetickspersecond)
      [Imagick::setResolution()](#imagick.setresolution)
       
       



      [Imagick::matteFloodFillImage()](#imagick.mattefloodfillimage)
      [Imagick::getImageTotalInkDensity()](#imagick.getimagetotalinkdensity)
      [Imagick::setResourceLimit()](#imagick.setresourcelimit)
       
       



      [Imagick::medianFilterImage()](#imagick.medianfilterimage)
      [Imagick::getImageType()](#imagick.getimagetype)
      [Imagick::setSamplingFactors()](#imagick.setsamplingfactors)
       
       



      [Imagick::minifyImage()](#imagick.minifyimage)
      [Imagick::getImageUnits()](#imagick.getimageunits)
      [Imagick::setSizeOffset()](#imagick.setsizeoffset)
       
       



      [Imagick::modulateImage()](#imagick.modulateimage)
      [Imagick::getImageVirtualPixelMethod()](#imagick.getimagevirtualpixelmethod)
      [Imagick::setSize()](#imagick.setsize)
       
       



      [Imagick::montageImage()](#imagick.montageimage)
      [Imagick::getImageWhitepoint()](#imagick.getimagewhitepoint)
      [Imagick::setType()](#imagick.settype)
       
       



      [Imagick::morphImages()](#imagick.morphimages)
      [Imagick::getImageWidth()](#imagick.getimagewidth)
       
       
       



      [Imagick::mosaicImages()](#imagick.mosaicimages)
      [Imagick::getImage()](#imagick.getimage)
       
       
       



      [Imagick::motionBlurImage()](#imagick.motionblurimage)
      [Imagick::getInterlaceScheme()](#imagick.getinterlacescheme)
       
       
       



      [Imagick::negateImage()](#imagick.negateimage)
      [Imagick::getNumberImages()](#imagick.getnumberimages)
       
       
       



      [Imagick::normalizeImage()](#imagick.normalizeimage)
      [Imagick::getOption()](#imagick.getoption)
       
       
       



      [Imagick::oilPaintImage()](#imagick.oilpaintimage)
      [Imagick::getPackageName()](#imagick.getpackagename)
       
       
       



      [Imagick::optimizeImageLayers()](#imagick.optimizeimagelayers)
      [Imagick::getPage()](#imagick.getpage)
       
       
       



      [Imagick::paintOpaqueImage()](#imagick.paintopaqueimage)
      [Imagick::getPixelIterator()](#imagick.getpixeliterator)
       
       
       



      [Imagick::paintTransparentImage()](#imagick.painttransparentimage)
      [Imagick::getPixelRegionIterator()](#imagick.getpixelregioniterator)
       
       
       



      [Imagick::posterizeImage()](#imagick.posterizeimage)
      [Imagick::getQuantumDepth()](#imagick.getquantumdepth)
       
       
       



      [Imagick::radialBlurImage()](#imagick.radialblurimage)
      [Imagick::getQuantumRange()](#imagick.getquantumrange)
       
       
       



      [Imagick::raiseImage()](#imagick.raiseimage)
      [Imagick::getResourceLimit()](#imagick.getresourcelimit)
       
       
       



      [Imagick::randomThresholdImage()](#imagick.randomthresholdimage)
      [Imagick::getResource()](#imagick.getresource)
       
       
       



      [Imagick::reduceNoiseImage()](#imagick.reducenoiseimage)
      [Imagick::getSamplingFactors()](#imagick.getsamplingfactors)
       
       
       



      [Imagick::render()](#imagick.render)
      [Imagick::getSizeOffset()](#imagick.getsizeoffset)
       
       
       



      [Imagick::resampleImage()](#imagick.resampleimage)
      [Imagick::getSize()](#imagick.getsize)
       
       
       



      [Imagick::resizeImage()](#imagick.resizeimage)
      [Imagick::identifyImage()](#imagick.identifyimage)
       
       
       



      [Imagick::rollImage()](#imagick.rollimage)
      [Imagick::getImageSize()](#imagick.getimagesize)
       
       
       



      [Imagick::rotateImage()](#imagick.rotateimage)
       
       
       
       



      [Imagick::sampleImage()](#imagick.sampleimage)
       
       
       
       



      [Imagick::scaleImage()](#imagick.scaleimage)
       
       
       
       



      [Imagick::separateImageChannel()](#imagick.separateimagechannel)
       
       
       
       



      [Imagick::sepiaToneImage()](#imagick.sepiatoneimage)
       
       
       
       



      [Imagick::shadeImage()](#imagick.shadeimage)
       
       
       
       



      [Imagick::shadowImage()](#imagick.shadowimage)
       
       
       
       



      [Imagick::sharpenImage()](#imagick.sharpenimage)
       
       
       
       



      [Imagick::shaveImage()](#imagick.shaveimage)
       
       
       
       



      [Imagick::shearImage()](#imagick.shearimage)
       
       
       
       



      [Imagick::sigmoidalContrastImage()](#imagick.sigmoidalcontrastimage)
       
       
       
       



      [Imagick::sketchImage()](#imagick.sketchimage)
       
       
       
       



      [Imagick::solarizeImage()](#imagick.solarizeimage)
       
       
       
       



      [Imagick::spliceImage()](#imagick.spliceimage)
       
       
       
       



      [Imagick::spreadImage()](#imagick.spreadimage)
       
       
       
       



      [Imagick::steganoImage()](#imagick.steganoimage)
       
       
       
       



      [Imagick::stereoImage()](#imagick.stereoimage)
       
       
       
       



      [Imagick::stripImage()](#imagick.stripimage)
       
       
       
       



      [Imagick::swirlImage()](#imagick.swirlimage)
       
       
       
       



      [Imagick::textureImage()](#imagick.textureimage)
       
       
       
       



      [Imagick::thresholdImage()](#imagick.thresholdimage)
       
       
       
       



      [Imagick::thumbnailImage()](#imagick.thumbnailimage)
       
       
       
       



      [Imagick::tintImage()](#imagick.tintimage)
       
       
       
       



      [Imagick::transverseImage()](#imagick.transverseimage)
       
       
       
       



      [Imagick::trimImage()](#imagick.trimimage)
       
       
       
       



      [Imagick::uniqueImageColors()](#imagick.uniqueimagecolors)
       
       
       
       



      [Imagick::unsharpMaskImage()](#imagick.unsharpmaskimage)
       
       
       
       



      [Imagick::vignetteImage()](#imagick.vignetteimage)
       
       
       
       



      [Imagick::waveImage()](#imagick.waveimage)
       
       
       
       



      [Imagick::whiteThresholdImage()](#imagick.whitethresholdimage)
       
       
       
       


# Imagick::adaptiveBlurImage

(PECL imagick 2, PECL imagick 3)

Imagick::adaptiveBlurImage — Añade un filtro de borrosidad adaptativo a la imagen

### Descripción

public **Imagick::adaptiveBlurImage**([float](#language.types.float) $radius, [float](#language.types.float) $sigma, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Añade un filtro de borrosidad adaptativo a la imagen. La intensidad de una borrosidad adaptativa
depende de si se disminuye dramáticamente en el borde de la imagen, mientras que una borrodidad
estándar es uniforme en toda la imagen. Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

     radius


       El radio gaussiano, en píxeles, sin contar el píxel central.
       Proporcione un valor de 0 y el radio será elegido auto-mágicaente.






     sigma


       La desviación estándar gaussiana, en píxeles.






     channel


       Proporciona una constante de canal válida para su modo de canal. Para aplicarlo a más de un canal, combínense las [constantes de canales](#imagick.constants.channel) utilizando un operador a nivel de bits. Por omisión, vale **[Imagick::CHANNEL_DEFAULT](#imagick.constants.channel-default)**. Consúltese la lista de [constantes de canales](#imagick.constants.channel)





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Usar Imagick::adaptiveBlurImage()**:



     Aplicar borrosidad adaptativa a una imagen, después mostrarla en el navegador.

&lt;?php

header('Content-type: image/jpeg');

$imagen = new Imagick('test.jpg');

$imagen-&gt;adaptiveBlurImage(5,3);
echo $imagen;

?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Salida del ejemplo : Usar Imagick::adaptiveBlurImage()](php-bigxhtml-data/images/c0d23d2d6769e53e24a1b3136c064577-adaptiveBlurImage.gif)


### Ver también

    - [Imagick::blurImage()](#imagick.blurimage) - Añade un filtro de borrosidad a la imagen

    - [Imagick::motionBlurImage()](#imagick.motionblurimage) - Simula borrosidad en movimiento

    - [Imagick::radialBlurImage()](#imagick.radialblurimage) - Hace borrosa de forma radial una imagen

# Imagick::adaptiveResizeImage

(PECL imagick 2, PECL imagick 3)

Imagick::adaptiveResizeImage — Redimensiona una imagen adaptativamente con información dependiente de la triangulación

### Descripción

public **Imagick::adaptiveResizeImage**(
    [int](#language.types.integer) $columns,
    [int](#language.types.integer) $rows,
    [bool](#language.types.boolean) $bestfit = **[false](#constant.false)**,
    [bool](#language.types.boolean) $legacy = **[false](#constant.false)**
): [bool](#language.types.boolean)

Redimensiona una imagen adaptativamente con información dependiente de la triangulación.
Evita la borrosidad a través de cambios de color bruscos. Muy útil cuando se usa para encoger
ligeramente imágenes a un "tamaño web" ligeramente más pequeño; puede que no tenga una
buena apariencia cuando una imagen a tamaño completo se redimensiona adaptativamente a una miniatura.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

**Nota**:

    El comportamiento del parámetro bestfit cambió con Imagick 3.0.0.
    Antes de esta versión, proporcionar las dimensiones 400x400 a una imagen de dimensiones 200x150
    hacía que la parte izquierda permaneciera sin cambios. Con Imagick 3.0.0 y posteriores, la
    imagen se reduce al tamaño 400x300, siendo este el mejor resultado para esas dimensiones. Si el parámetro bestfit es utilizado, la anchura y la altura deben ser proporcionadas.

### Parámetros

     columns


       El número de columnas en la imagen escalada.






     rows


       El número de filas en la imagen escalada.






     bestfit


       Si ajustar la imagen dentro de una caja limitada.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0
       Añadido el parámetro opcional de ajuste.



       PECL imagick 2.1.0

        Este método ahora soporta escalas proporcionales.
        Pase cero como parámetro para escalar proporcionalmente.





### Ejemplos

    **Ejemplo #1 Usar Imagick::adaptiveResizeImage()**



     Redimensiona una imagen al tamaño estándar para la web. Este método trabaja mejor
     cuando se redimensiona a un tamaño sólo ligeramente menor que el tamaño de la imagen
     previa.

&lt;?php
header('Content-type: image/jpeg');

$imagen = new Imagick('image.jpg');
$image-&gt;adaptiveResizeImage(1024,768);

echo $imagen;
?&gt;

### Ver también

    - [Imagick::chopImage()](#imagick.chopimage) - Borra una región de una imagen y la recorta

    - [Imagick::cropImage()](#imagick.cropimage) - Extrae una región de la imagen

    - [Imagick::magnifyImage()](#imagick.magnifyimage) - Duplica el tamaño de una imagen, proporcionalmente

    - [Imagick::minifyImage()](#imagick.minifyimage) - Redimensiona una imagen proporcionalmente para reducirla a la mitad de tamaño

    - [Imagick::resizeImage()](#imagick.resizeimage) - Escala una imagen

    - [Imagick::scaleImage()](#imagick.scaleimage) - Redimensiona la imagen a una escala específica

    - [Imagick::shaveImage()](#imagick.shaveimage) - Recorta píxeles de los extremos de la imagen

    - [Imagick::thumbnailImage()](#imagick.thumbnailimage) - Modifica el tamaño de una imagen

    - [Imagick::trimImage()](#imagick.trimimage) - Elimina los extremos de la imagen

# Imagick::adaptiveSharpenImage

(PECL imagick 2, PECL imagick 3)

Imagick::adaptiveSharpenImage — Afila la imagen adaptativamente

### Descripción

public **Imagick::adaptiveSharpenImage**([float](#language.types.float) $radius, [float](#language.types.float) $sigma, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Afila la imagen adaptativamente afilando con más intensidad
cerca de los bordes de la imagen y con menos intensidad lejos de los bordes. Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

     radius


       El radio gaussiano, en píxeles, sin contar el píxel central. Use 0 para autoseleccionar.






     sigma


       La desviación estándar gaussiana, en píxeles.






     channel


       Proporciona una constante de canal válida para su modo de canal. Para aplicarlo a más de un canal, combínense las [constantes de canales](#imagick.constants.channel) utilizando un operador a nivel de bits. Por omisión, vale **[Imagick::CHANNEL_DEFAULT](#imagick.constants.channel-default)**. Consúltese la lista de [constantes de canales](#imagick.constants.channel)





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Un ejemplo de Imagick::adaptiveSharpenImage()**



     Afilar la imagen adaptativamente con radio 2 y sigma 1.

&lt;?php
try {
$imagen = new Imagick('image.png');
$imagen-&gt;adaptiveSharpenImage(2,1);
} catch(ImagickException $e) {
echo 'Error: ' , $e-&gt;getMessage();
die();
}
header('Content-type: image/png');
echo $imagen;
?&gt;

### Ver también

    - [Imagick::sharpenImage()](#imagick.sharpenimage) - Afila una imagen

# Imagick::adaptiveThresholdImage

(PECL imagick 2, PECL imagick 3)

Imagick::adaptiveThresholdImage — Selecciona un umbral para cada píxel basado en un rango de intensidad

### Descripción

public **Imagick::adaptiveThresholdImage**([int](#language.types.integer) $width, [int](#language.types.integer) $height, [int](#language.types.integer) $offset): [bool](#language.types.boolean)

Selecciona un umbral individual para cada píxel basado en un
rango de valores de intensidad en su zona local. Esto
permite establecer el umbral de una imagen cuyo histograma de intensidad
global no contiene picos distintivos.

### Parámetros

     width


       Ancho de la zona local.






     height


       Alto de la zona local.






     offset


       El índice medio





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1  Imagick::adaptiveThresholdImage()**

&lt;?php
function adaptiveThresholdImage($imagePath, $width, $height, $adaptiveOffset) {
    $imagick = new \Imagick(realpath($imagePath));
$adaptiveOffsetQuantum = intval($adaptiveOffset \* \Imagick::getQuantum());
$imagick-&gt;adaptiveThresholdImage($width, $height, $adaptiveOffsetQuantum);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::addImage

(PECL imagick 2, PECL imagick 3)

Imagick::addImage — Añade una nueva imagen a la lista de imágenes del objeto Imagick

### Descripción

public **Imagick::addImage**([Imagick](#class.imagick) $source): [bool](#language.types.boolean)

Añade una nueva imagen al objeto Imagick desde la posición actual del objeto de origen.
Después de la operación la posición del iterador se mueve al final de la lista.

### Parámetros

     source


       El objeto Imagick de origen





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::addNoiseImage

(PECL imagick 2, PECL imagick 3)

Imagick::addNoiseImage — Añade ruido aleatorio a la imagen

### Descripción

public **Imagick::addNoiseImage**([int](#language.types.integer) $noise_type, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Añade ruido aleatorio a la imagen.

### Parámetros

     noise_type


       El tipo de ruido. Consulte esta lista de
       [constantes de ruido](#imagick.constants.noise).






     channel


       Proporciona una constante de canal válida para su modo de canal. Para aplicarlo a más de un canal, combínense las [constantes de canales](#imagick.constants.channel) utilizando un operador a nivel de bits. Por omisión, vale **[Imagick::CHANNEL_DEFAULT](#imagick.constants.channel-default)**. Consúltese la lista de [constantes de canales](#imagick.constants.channel)





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1  Imagick::addNoiseImage()**

&lt;?php
function addNoiseImage($noiseType, $imagePath, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;addNoiseImage($noiseType, $channel);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::affineTransformImage

(PECL imagick 2, PECL imagick 3)

Imagick::affineTransformImage — Transforma una imagen

### Descripción

public **Imagick::affineTransformImage**([ImagickDraw](#class.imagickdraw) $matrix): [bool](#language.types.boolean)

Transforma una imagen como está establecido en la matriz afín.

### Parámetros

     matrix


       La matriz afín





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1  Imagick::affineTransformImage()**

&lt;?php
function affineTransformImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$draw = new \ImagickDraw();

    $angle = deg2rad(40);

    $affineRotate = array(
        "sx" =&gt; cos($angle), "sy" =&gt; cos($angle),
        "rx" =&gt; sin($angle), "ry" =&gt; -sin($angle),
        "tx" =&gt; 0, "ty" =&gt; 0,
    );

    $draw-&gt;affine($affineRotate);

    $imagick-&gt;affineTransformImage($draw);

    header("Content-Type: image/jpg");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::animateImages

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::animateImages — Anima una imagen o imágenes

### Descripción

public **Imagick::animateImages**([string](#language.types.string) $x_server): [bool](#language.types.boolean)

Este método anima la imagen en un servidor X local o remoto. Este método
no está disponible en Windows.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.

### Parámetros

     x_server


       La dirección del servidor X





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ver también

    - [Imagick::displayImage()](#imagick.displayimage) - Muestra una imagen

# Imagick::annotateImage

(PECL imagick 2, PECL imagick 3)

Imagick::annotateImage — Anota una imagen con texto

### Descripción

public **Imagick::annotateImage**(
    [ImagickDraw](#class.imagickdraw) $draw_settings,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y,
    [float](#language.types.float) $angle,
    [string](#language.types.string) $text
): [bool](#language.types.boolean)

Anota una imagen con texto.

### Parámetros

     draw_settings


       El objeto ImagickDraw que contiene la configuración para el dibujo de texto






     x


       El índice horizontal en píxeles a la izquierda del texto






     y


       El índice vertical en píxeles de la línea base del texto






     angle


       El ángulo en el que se escribe el texto






     text


       La cadena a dibujar





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Usar Imagick::annotateImage()**:



     Anotar texto en una imagen vacía

&lt;?php
/_ Crear algunos objetos _/
$imagen = new Imagick();
$dibujo = new ImagickDraw();
$píxel = new ImagickPixel( 'gray' );

/_ Nueva imagen _/
$imagen-&gt;newImage(800, 75, $píxel);

/_ Texto negro _/
$dibujo-&gt;setColor('black');

/_ Propiedades de la fuente _/
$dibujo-&gt;setFont('Bookman-DemiItalic');
$dibujo-&gt;setFontSize( 30 );

/_ Crear texto _/
$imagen-&gt;annotateImage($dibujo, 10, 45, 0, 'The quick brown fox jumps over the lazy dog');

/_ Dar a la imagen un formato _/
$imagen-&gt;setImageFormat('png');

/_ Imprimir la imagen con cabeceras _/
header('Content-type: image/png');
echo $imagen;

?&gt;

### Ver también

    - [ImagickDraw::annotation()](#imagickdraw.annotation) - Dibuja un texto sobre una imagen

    - [ImagickDraw::setFont()](#imagickdraw.setfont) - Establece la fuente especificada completamente para usarla cuando se escribe texto

# Imagick::appendImages

(PECL imagick 2, PECL imagick 3)

Imagick::appendImages — Añade un conjunto de imágenes

### Descripción

public **Imagick::appendImages**([bool](#language.types.boolean) $stack): [Imagick](#class.imagick)

Añade un conjunto de imágenes en una imagen más grande.

### Parámetros

     stack


       Para apilar las imágenes verticalmente.
       Por defecto (o si **[false](#constant.false)** se especifica) las imágenes se apilan de izquierda a derecha.
       Si stack es **[true](#constant.true)**, las imágenes se apilan de arriba hacia abajo.





### Valores devueltos

Devuelve una instancia Imagick si se tuvo éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de Imagick::appendImages()**

&lt;?php

/_ Crear un nuevo objeto Imagick _/
$im = new Imagick();

/_ Crear imágenes de color rojo, verde y azul _/
$im-&gt;newImage(100, 50, "red");
$im-&gt;newImage(100, 50, "green");
$im-&gt;newImage(100, 50, "blue");

/_ Añadir las imágenes en una sola _/
$im-&gt;resetIterator();
$combined = $im-&gt;appendImages(true);

/_ Imprimir la imagen _/
$combined-&gt;setImageFormat("png");
header("Content-Type: image/png");
echo $combined;
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Salida de ejemplo : Imagick::appendImages()](php-bigxhtml-data/images/c0d23d2d6769e53e24a1b3136c064577-floodfillpaint_intermediate.png)


# Imagick::autoLevelImage

(PECL imagick 3 &gt;= 3.3.0)

Imagick::autoLevelImage — Ajusta el nivel de un canal de una imagen particular

### Descripción

public **Imagick::autoLevelImage**([int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Ajusta el nivel de un canal de una imagen particular escalando los valores mínimos y máximos al rango cuántico completo.

### Parámetros

    channel


      Qué canal debe ser utilizado para el auto-nivelado.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::autoLevelImage()**



      &lt;?php

function autoLevelImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;autoLevelImage();
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::averageImages

(PECL imagick 2, PECL imagick 3)

Imagick::averageImages — Promedio de un conjunto de imágenes

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::averageImages**(): [Imagick](#class.imagick)

Realiza el promedio de un conjunto de imágenes.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un nuevo objeto Imagick en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::blackThresholdImage

(PECL imagick 2, PECL imagick 3)

Imagick::blackThresholdImage — Fuerza a todos los píxeles bajo un umbral a ser negros

### Descripción

public **Imagick::blackThresholdImage**([mixed](#language.types.mixed) $threshold): [bool](#language.types.boolean)

Es como Imagick::thresholdImage() pero fuerza a todos los píxeles bajo un umbral
a ser negros mientras deja todos los píxeles por encima del umbral sin cambios.

### Parámetros

     threshold


       El umbral por debajo del cual todo se vuelve de color negro





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Ahora se permite que una cadena represente el color como un parámetro.
        Versiones anteriores sólo permitían un objeto ImagickPixel.





### Ejemplos

      **Ejemplo #1  Imagick::blackThresholdImage()**



      &lt;?php

function blackThresholdImage($imagePath, $thresholdColor) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;blackthresholdimage($thresholdColor);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::blueShiftImage

(PECL imagick 3 &gt;= 3.3.0)

Imagick::blueShiftImage — Atenúa los colores de la imagen

### Descripción

public **Imagick::blueShiftImage**([float](#language.types.float) $factor = 1.5): [bool](#language.types.boolean)

Atenúa los colores de la imagen para simular una escena nocturna a la luz de la luna.

### Parámetros

    factor





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::blueShiftImage()**



      &lt;?php

function blueShiftImage($imagePath, $blueShift) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;blueShiftImage($blueShift);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::blurImage

(PECL imagick 2, PECL imagick 3)

Imagick::blurImage — Añade un filtro de borrosidad a la imagen

### Descripción

public **Imagick::blurImage**([float](#language.types.float) $radius, [float](#language.types.float) $sigma, [int](#language.types.integer) $channel = ?): [bool](#language.types.boolean)

Añade un filtro de borrosidad a la imagen. El tercer parámetro opcional es para hacer borroso
un canal específico.

### Parámetros

     radius


       Radio de la borrosidad






     sigma


       Desviación estándar






     channel


       La constante [Channeltype](#imagick.constants.channel).
       Cuando no es proporciona, todos los canales se hacen borrosos.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Usar Imagick::blurImage()**:



     Hacer borrosa una imagen, después mostrarla en el navegador.

&lt;?php

header('Content-type: image/jpeg');

$imagen = new Imagick('prueba.jpg');

$imagen-&gt;blurImage(5,3);
echo $imagen;

?&gt;

### Ver también

    - [Imagick::adaptiveBlurImage()](#imagick.adaptiveblurimage) - Añade un filtro de borrosidad adaptativo a la imagen

    - [Imagick::motionBlurImage()](#imagick.motionblurimage) - Simula borrosidad en movimiento

    - [Imagick::radialBlurImage()](#imagick.radialblurimage) - Hace borrosa de forma radial una imagen

# Imagick::borderImage

(PECL imagick 2, PECL imagick 3)

Imagick::borderImage — Rodea la imagen con un borde

### Descripción

public **Imagick::borderImage**([mixed](#language.types.mixed) $bordercolor, [int](#language.types.integer) $width, [int](#language.types.integer) $height): [bool](#language.types.boolean)

Rodea la imagen con un borde del color definido por el objeto ImagickPixel de color de borde.

### Parámetros

     bordercolor


       Objeto ImagickPixel o una cadena que contiene el color del borde






     width


       Ancho del borde






     height


       Alto del borde





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Ahora se permite que una cadena represente el color como el primer parámetro.
        Versiones anteriores sólo permitían un objeto ImagickPixel.





### Ejemplos

      **Ejemplo #1  Imagick::borderImage()**



      &lt;?php

function borderImage($imagePath, $color, $width, $height) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;borderImage($color, $width, $height);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::brightnessContrastImage

(PECL imagick 3 &gt;= 3.3.0)

Imagick::brightnessContrastImage — Cambia el brillo y/o el contraste de una imagen

### Descripción

public **Imagick::brightnessContrastImage**([float](#language.types.float) $brightness, [float](#language.types.float) $contrast, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Cambia el brillo y/o el contraste de una imagen. Convierte los parámetros de brillo y contraste en pendiente e intercepción y llama a una función polinómica para aplicarla a la imagen.

### Parámetros

    brightness








    contrast








    channel




### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::brightnessContrastImage()**



      &lt;?php

function brightnessContrastImage($imagePath, $brightness, $contrast, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;brightnessContrastImage($brightness, $contrast, $channel);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::charcoalImage

(PECL imagick 2, PECL imagick 3)

Imagick::charcoalImage — Simula un dibujo a carboncillo

### Descripción

public **Imagick::charcoalImage**([float](#language.types.float) $radius, [float](#language.types.float) $sigma): [bool](#language.types.boolean)

Simula un dibujo a carboncillo.

### Parámetros

     radius


       El radio gaussiano, en píxeles, sin contar el píxel central






     sigma


       La desviación estándar gaussiana, en píxeles





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::charcoalImage()**



      &lt;?php

function charcoalImage($imagePath, $radius, $sigma) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;charcoalImage($radius, $sigma);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::chopImage

(PECL imagick 2, PECL imagick 3)

Imagick::chopImage — Borra una región de una imagen y la recorta

### Descripción

public **Imagick::chopImage**(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)

Borra una región de una imagen y colapsa la imagen para ocupar la porción borrada.

### Parámetros

     width


       Ancho del área cortada






     height


       Alto del área cortada






     x


       El punto de referencia X del área cortada






     y


       El punto de referencia Y del área cortada





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Usar Imagick::chopImage()**:



     Ejemplo de uso de Imagick::chopImage

&lt;?php
/_ Crear algunos objetos _/
$imagen = new Imagick();
$píxel = new ImagickPixel( 'gray' );

/_ Nueva imagen _/
$imagen-&gt;newImage(400, 200, $píxel);

/_ Cortar imagen _/
$imagen-&gt;chopImage(200, 200, 0, 0);

/_ Dar un formato a la imagen _/
$imagen-&gt;setImageFormat('png');

/_ Imprimir la imagen con cabeceras _/
header('Content-type: image/png');
echo $imagen;

?&gt;

### Ver también

    - [Imagick::cropImage()](#imagick.cropimage) - Extrae una región de la imagen

# Imagick::clampImage

(PECL imagick 3 &gt;= 3.3.0)

Imagick::clampImage — Restringe el rango de colores de 0 a la profundidad cuántica

### Descripción

public **Imagick::clampImage**([int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Restringe el rango de colores de 0 a la profundidad cuántica.

### Parámetros

    channel





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# Imagick::clear

(PECL imagick 2, PECL imagick 3)

Imagick::clear — Libera todos los recursos asociados a un objeto Imagick

### Descripción

public **Imagick::clear**(): [bool](#language.types.boolean)

Libera todos los recursos asociados a un objeto Imagick.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::clipImage

(PECL imagick 2, PECL imagick 3)

Imagick::clipImage — Se alinea con el primer camino de un perfil 8BIM

### Descripción

public **Imagick::clipImage**(): [bool](#language.types.boolean)

Se alinea con el primer camino de un perfil 8BIM, si está presente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::clipImagePath

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::clipImagePath — Recorta a lo largo de las rutas nombradas del perfil 8BIM, si está presente

### Descripción

public **Imagick::clipImagePath**([string](#language.types.string) $pathname, [string](#language.types.string) $inside): [void](language.types.void.html)

Recorta a lo largo de las rutas nombradas del perfil 8BIM, si está presente. Las operaciones posteriores surten efecto dentro de la ruta. Id puede ser un número si va precedido de #, para trabajar en una ruta numerada, por ejemplo, "#1" para utilizar la primera ruta.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    pathname









    inside





### Valores devueltos

# Imagick::clipPathImage

(PECL imagick 2, PECL imagick 3)

Imagick::clipPathImage — Recorta a lo largo de trazados nominados desde un perfil 8BIM

### Descripción

public **Imagick::clipPathImage**([string](#language.types.string) $pathname, [bool](#language.types.boolean) $inside): [bool](#language.types.boolean)

Recorta a lo largo de trazados nominados desde un perfil 8BIM, si está
presente. Las operaiones posteriores toman efecto dentro del trazado.
Puede ser un número si está precedido de #, para trabajar con un
trazado numerado, p.ej., "#1" para usar el primer trazado.

### Parámetros

     pathname


       El nombre del trazado






     inside


       Si es **[true](#constant.true)** las operaciones posteriores toman efecto dentro del patrón de recorte.
       De otro modo, las operaciones toman efecto fuera del patrón de recorte.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::clone

(PECL imagick 2, PECL imagick 3)

Imagick::clone — Realiza una copia exacta de un objeto Imagick

### Descripción

public **Imagick::clone**(): [Imagick](#class.imagick)

Realiza una copia exacta de un objeto Imagick.

**Advertencia**

    Esta función se ha vuelto *OBSOLETA* a partir de imagick 3.1.0.
    Ahora debe utilizarse la palabra clave
    [clone](#language.oop5.cloning).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una copia del objeto Imagick.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 3.1.0

        Este método se ha vuelto obsoleto en favor de la palabra clave
        [clone](#language.oop5.cloning).





### Ejemplos

    **Ejemplo #1 Clonación de objeto Imagick con diferentes versiones de Imagick**



     &lt;?php

// Clonación de un objeto Imagick utilizando la versión 2.x y 3.0:
$newImage = $image-&gt;clone();

// Clonación de un objeto Imagick a partir de la versión 3.1.0:
$newImage = clone $image;
?&gt;

# Imagick::clutImage

(PECL imagick 2, PECL imagick 3)

Imagick::clutImage — Reemplaza los colores de una imagen

### Descripción

public **Imagick::clutImage**([Imagick](#class.imagick) $lookup_table, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Reemplaza los colores en una imagen con una paleta de colores. El segundo parámetro
opcional reemplaza los colores de un canal específico. Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.

### Parámetros

     lookup_table


       Objeto Imagick que contiene la paleta de colores






     channel


       La constante [Channeltype](#imagick.constants.channel).
       Cuando no se proporciona, los canales predeterminados se reemplazan.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Usar Imagick::clutImage()**:



     Reemplzar los colores de una imagen desde una paleta de colores.

&lt;?php
$imagen = new Imagick('test.jpg');
$clut = new Imagick();
$clut-&gt;newImage(1, 1, new ImagickPixel('black'));
$imagen-&gt;clutImage($clut);
$imagen-&gt;writeImage('test_out.jpg');
?&gt;

### Ver también

    - [Imagick::adaptiveBlurImage()](#imagick.adaptiveblurimage) - Añade un filtro de borrosidad adaptativo a la imagen

    - [Imagick::motionBlurImage()](#imagick.motionblurimage) - Simula borrosidad en movimiento

    - [Imagick::radialBlurImage()](#imagick.radialblurimage) - Hace borrosa de forma radial una imagen

# Imagick::coalesceImages

(PECL imagick 2, PECL imagick 3)

Imagick::coalesceImages — Componer un conjunto de imágenes

### Descripción

public **Imagick::coalesceImages**(): [Imagick](#class.imagick)

Componer un conjunto de imágenes respetando todas las posiciones y
los métodos de disposición. Las secuencias de animaciones
GIF, MIFF y MNG, comienzan típicamente con una imagen de fondo,
seguida de todas las imágenes siguientes que varían en tamaño y
posición. Retorna un nuevo objeto Imagick donde cada imagen
de la secuencia tiene el mismo tamaño que la primera, y compuesta
con la siguiente en la secuencia.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna un nuevo objeto Imagick en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::colorFloodfillImage

(PECL imagick 2, PECL imagick 3)

Imagick::colorFloodfillImage — Cambia el valor del color de cualquier píxel que coincida con el objetivo

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::colorFloodfillImage**(
    [mixed](#language.types.mixed) $fill,
    [float](#language.types.float) $fuzz,
    [mixed](#language.types.mixed) $bordercolor,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)

Cambia el valor del color de cualquier píxel que coincida con el objetivo y esté
en el área inmediata.

### Parámetros

     fill


       Objeto ImagickPixel que contiene el color de relleno






     fuzz


       La cantidad de enfoque. Por ejemplo, establecer el enfoque a 10 y el color a rojo con una
       intensidad de 100 y 102 respectivamente ahora se interpreta como el
       mismo color para los propósitos del relleno.






     bordercolor


       Objeto ImagickPixel que contiene el color de borde






     x


       Posición X del inicio del relleno






     y


       Posición Y del inicio del relleno





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Ahora se permite que una cadena represente el color como el primer y tercer
        parámetros. Versiones anteriores sólo permitían un objeto ImagickPixel.





# Imagick::colorizeImage

(PECL imagick 2, PECL imagick 3)

Imagick::colorizeImage — Mezcla el color de relleno con la imagen

### Descripción

public **Imagick::colorizeImage**([mixed](#language.types.mixed) $colorize, [mixed](#language.types.mixed) $opacity, [bool](#language.types.boolean) $legacy = **[false](#constant.false)**): [bool](#language.types.boolean)

Mezcla el color de relleno de cada píxel con la imagen.

### Parámetros

     colorize


       Objeto ImagickPixel o una cadena que contiene el color






     opacity


       Objeto ImagickPixel o un valor float que contiene el valor de la opacidad.
       1.0 es completamente opaco y 0.0 es completamente transparente.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Ahora se permite que una cadena represente el color como el primer parámetro y
        que un valor float represente el valor de la opacidad como el segundo parámetro.
        Versiones anteriores sólo permitían objetos ImagickPixel.





### Ejemplos

      **Ejemplo #1  Imagick::colorizeImage()**



      &lt;?php

function colorizeImage($imagePath, $color, $opacity) {
    $imagick = new \Imagick(realpath($imagePath));
$opacity = $opacity / 255.0;
    $opacityColor = new \ImagickPixel("rgba(0, 0, 0, $opacity)");
    $imagick-&gt;colorizeImage($color, $opacityColor);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::colorMatrixImage

(PECL imagick 3 &gt;= 3.3.0)

Imagick::colorMatrixImage — Aplica una transformación de color a una imagen

### Descripción

public **Imagick::colorMatrixImage**([array](#language.types.array) $color_matrix): [bool](#language.types.boolean)

Aplica una transformación de color a una imagen. El método permite cambios de saturación, rotación de tono, luminancia en alfa y diversos otros efectos. Aunque se pueden utilizar matrices de transformación de tamaño variable, generalmente se usa una matriz 5x5 para una imagen RGBA y una 6x6 para CMYKA (o RGBA con desplazamientos). La matriz es similar a las utilizadas por Adobe Flash, excepto que los desplazamientos están en la columna 6 en lugar de la 5 (para soportar imágenes CMYKA) y los desplazamientos están normalizados (divida el desplazamiento Flash por 255).

### Parámetros

    color_matrix




### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::colorMatrixImage()**



      &lt;?php

function colorMatrixImage($imagePath, $colorMatrix) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;setImageOpacity(1);

    //Una matriz de color debería ser similar a:
    //    $colorMatrix = [
    //        1.5, 0.0, 0.0, 0.0, 0.0, -0.157,
    //        0.0, 1.0, 0.5, 0.0, 0.0, -0.157,
    //        0.0, 0.0, 1.5, 0.0, 0.0, -0.157,
    //        0.0, 0.0, 0.0, 1.0, 0.0,  0.0,
    //        0.0, 0.0, 0.0, 0.0, 1.0,  0.0,
    //        0.0, 0.0, 0.0, 0.0, 0.0,  1.0
    //    ];

    $background = new \Imagick();
    $background-&gt;newPseudoImage($imagick-&gt;getImageWidth(), $imagick-&gt;getImageHeight(),  "pattern:checkerboard");

    $background-&gt;setImageFormat('png');

    $imagick-&gt;setImageFormat('png');
    $imagick-&gt;colorMatrixImage($colorMatrix);

    $background-&gt;compositeImage($imagick, \Imagick::COMPOSITE_ATOP, 0, 0);

    header("Content-Type: image/png");
    echo $background-&gt;getImageBlob();

}

?&gt;

# Imagick::combineImages

(PECL imagick 2, PECL imagick 3)

Imagick::combineImages — Combina una o más imágenes en una sóla imagen

### Descripción

public **Imagick::combineImages**([int](#language.types.integer) $channelType): [Imagick](#class.imagick)

Combina una o más imágenes en una sóla imagen. El valor de la
escala de grises de los píxeles de cada imagen en la secuencia se asigna
para especificar los canales de la imagen combinada. El orden
típico sería imagen 1 =&gt; Red, 2 =&gt; Green,
3 =&gt; Blue, etc.

### Parámetros

     channelType


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta
       lista de [constantes de canal](#imagick.constants.channel).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::commentImage

(PECL imagick 2, PECL imagick 3)

Imagick::commentImage — Añade un comentario a la imagen

### Descripción

public **Imagick::commentImage**([string](#language.types.string) $comment): [bool](#language.types.boolean)

Añade un comentario a la imagen.

### Parámetros

     comment


       El comentario a añadir





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Usar Imagick::commentImage()**:



     Comentar una imagen y recuperar el comentario:

&lt;?php

/_ Crear un nuevo objeto Imagick _/
$im = new imagick();

/_ Crear una imagen vacía _/
$im-&gt;newImage(100, 100, new ImagickPixel("red"));

/_ Añadir el comentario a la imagen _/
$im-&gt;commentImage("¡Hola Mundo!");

/_ Mostrar el comentario _/
echo $im-&gt;getImageProperty("comment");

?&gt;

# Imagick::compareImageChannels

(PECL imagick 2, PECL imagick 3)

Imagick::compareImageChannels — Devuelve la diferencia entre una o más imágenes

### Descripción

public **Imagick::compareImageChannels**([Imagick](#class.imagick) $image, [int](#language.types.integer) $channelType, [int](#language.types.integer) $metricType): [array](#language.types.array)

Compara una o más imágenes y devuelve la imagen de diferencia.

### Parámetros

     image


       Un objeto Imagick que contiene la imagen a comparar.






     channelType


       Proporcione cualquier constante de canal que sea válida para el modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#imagick.constants.channel).






     metricType


       Una de las [constantes de tipos de métrica](#imagick.constants.metric).





### Valores devueltos

Array que consiste en new_wand y
distortion.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::compareImageLayers

(PECL imagick 2, PECL imagick 3)

Imagick::compareImageLayers — Devuelve la región circundante máxima entre imágenes

### Descripción

public **Imagick::compareImageLayers**([int](#language.types.integer) $method): [Imagick](#class.imagick)

Compara cada imagen con la siguiente en una secuencia y devuelve la
región circundante máxima de cualesquiera deferencias de píxeles que se descubra.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

     method


       Una de las [constantes de método de capas](#imagick.constants.layermethod).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Usar Imagick::compareImageLayers()**



      Comparar las capas de la imagen

&lt;?php
/_ crear un nuevo objeto imagick _/
$im = new Imagick("test.gif");

/_ optimizar las capas de la imagen _/
$resultado = $im-&gt;compareImageLayers(imagick::LAYERMETHOD_COALESCE);

/_ trabajar sobre el $resultado _/
?&gt;

### Ver también

    - [Imagick::optimizeImageLayers()](#imagick.optimizeimagelayers) - Elimina las porciones recurrentes de imágenes a optimizar

    - [Imagick::writeImages()](#imagick.writeimages) - Escribe una imagen o secuencia de imágenes

    - [Imagick::writeImage()](#imagick.writeimage) - Escribe una imagen al nombre de fichero especificado

# Imagick::compareImages

(PECL imagick 2, PECL imagick 3)

Imagick::compareImages — Compara una imagen con otra reconstruida

### Descripción

public **Imagick::compareImages**([Imagick](#class.imagick) $compare, [int](#language.types.integer) $metric): [array](#language.types.array)

Devuelve un array que contiene una imagen reconstruida y las diferencias entre las imágenes.

### Parámetros

     compare


       Una imagen a comparar.






     metric


       Proporcione una constante de tipo de métrica válida. Consulte esta lista de
       [constantes métricas](#imagick.constants.metric).





### Valores devueltos

Devuelve un array que contiene una imagen reconstruida y las diferencias entre imágenes.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Uso de Imagick::compareImages()**:



     Comparar imágenes y mostrar la imagen reconstruida

&lt;?php

$imagen1 = new imagick("imagen1.png");
$imagen1 = new imagick("imagen1.png");

$resultado = $imagen1-&gt;compareImages($imagen1, Imagick::METRIC_MEANSQUAREERROR);
$resultado[0]-&gt;setImageFormat("png");

header("Content-Type: image/png");
echo $resultado[0];

?&gt;

# Imagick::compositeImage

(PECL imagick 2, PECL imagick 3)

Imagick::compositeImage — Compone una imagen en otra

### Descripción

public **Imagick::compositeImage**(
    [Imagick](#class.imagick) $composite_object,
    [int](#language.types.integer) $composite,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)

Compone una imagen en otra en el índice especificado. Debería proporcionarse cualquier argumento necesario para el algoritmo de composición a setImageArtifact con 'compose:args' como el primer parámetro y los datos como el segundo.

### Parámetros

     composite_object


       Objeto Imagick que guarda la imagen compuesta






     compose


       Operador de composición. Véase [Constantes de Operadores
       de Composición](#imagick.constants.compositeop)






     x


       El índice de la columna de la imagen compuesta






     y


       El índice de la fila de la imagen compuesta






     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#imagick.constants.channel).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Empleo de Imagick::compositeImage()**:



     Componer dos imágenes con el método de composición 'mathematics'

&lt;?php

// Equivalente a ejecutar el comando
// convert src1.png src2.png -compose mathematics -define compose:args="1,0,-0.5,0.5" -composite output.png

$src1 = new \Imagick("./src1.png");
$src2 = new \Imagick("./src2.png");

$src1-&gt;setImageVirtualPixelMethod(Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
$src1-&gt;setImageArtifact('compose:args', "1,0,-0.5,0.5");
$src1-&gt;compositeImage($src2, Imagick::COMPOSITE_MATHEMATICS, 0, 0);
$src1-&gt;writeImage("./output.png");

?&gt;

### Ver también

    - [Imagick::setImageArtifact()](#imagick.setimageartifact) - Define el artefacto de la imagen

# Imagick::\_\_construct

(PECL imagick 2, PECL imagick 3)

Imagick::\_\_construct — El constructor Imagick

### Descripción

public **Imagick::\_\_construct**([mixed](#language.types.mixed) $files = ?)

Crea una instancia Imagick para una imagen específica o para un
conjunto de imágenes.

### Parámetros

    files


      La ruta hasta la imagen a cargar, o un array de rutas.
      Pueden incluir comodines en los nombres de los ficheros, o
      pueden ser URLs.


### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::contrastImage

(PECL imagick 2, PECL imagick 3)

Imagick::contrastImage — Cambia el contraste de una imagen

### Descripción

public **Imagick::contrastImage**([bool](#language.types.boolean) $sharpen): [bool](#language.types.boolean)

Mejora la diferencias de intensidad entre elementos claros y
oscuros de la imagen. Establezca la agudización a un valor que no
sea 0 para aumentar el contraste de la imagen, de otro modo el contraste
se reduce.

### Parámetros

     sharpen


      El valor de la agudización





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::contrastImage()**



      &lt;?php

function contrastImage($imagePath, $contrastType) {
    $imagick = new \Imagick(realpath($imagePath));
if ($contrastType != 2) {
        $imagick-&gt;contrastImage($contrastType);
}

    header("Content-Type: image/jpg");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::contrastStretchImage

(PECL imagick 2, PECL imagick 3)

Imagick::contrastStretchImage — Mejora el contraste de una imagen en color

### Descripción

public **Imagick::contrastStretchImage**([float](#language.types.float) $black_point, [float](#language.types.float) $white_point, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Mejora el contraste de una imagen en color ajustando los colores de los
píxeles de color para abarcar el rango completo de los colores disponibles. Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

     black_point


      El punto blanco.






     white_point


      El punto negro.






     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. **[Imagick::CHANNEL_ALL](#imagick.constants.channel-all)**. Consulte esta
       lista de [constantes de canal](#imagick.constants.channel).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::convolveImage

(PECL imagick 2, PECL imagick 3)

Imagick::convolveImage — Aplica una semilla de convolución a medida a la imagen

### Descripción

public **Imagick::convolveImage**([array](#language.types.array) $kernel, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Aplica una semilla de convolución a medida a la imagen.

### Parámetros

     kernel


      La semilla de convolución






     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#imagick.constants.channel).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::convolveImage()**



      &lt;?php

function convolveImage($imagePath, $bias, $kernelMatrix) {
    $imagick = new \Imagick(realpath($imagePath));
//$edgeFindingKernel = [-1, -1, -1, -1, 8, -1, -1, -1, -1,];
    $imagick-&gt;setImageBias($bias \* \Imagick::getQuantum());
$imagick-&gt;convolveImage($kernelMatrix);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::count

(PECL imagick 3 &gt;= 3.3.0)

Imagick::count — Devuelve el número de imágenes

### Descripción

public **Imagick::count**([int](#language.types.integer) $mode = 0): [int](#language.types.integer)

Devuelve el número de imágenes.

### Parámetros

    mode


      Un argumento no utilizado. Actualmente, existe una funcionalidad no particularmente bien definida en PHP donde la llamada a count() sobre un objeto contable podría (o no) requerir que este método acepte un parámetro. Este parámetro está aquí para ser conforme a la interfaz de countable, incluso si el parámetro no es utilizado.


### Valores devueltos

Devuelve el número de imágenes.

# Imagick::cropImage

(PECL imagick 2, PECL imagick 3)

Imagick::cropImage — Extrae una región de la imagen

### Descripción

public **Imagick::cropImage**(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)

Extrae una región de la imagen.

### Parámetros

     width


      El ancho del recorte






     height


      El alto del recorte






     x


      La coordenada X de la esquina superior izquierda de la región recortada






     y


      La coordenada Y de la esquina superior izquierda de la región recortada





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::cropImage()**



      &lt;?php

function cropImage($imagePath, $startX, $startY, $width, $height) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;cropImage($width, $height, $startX, $startY);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::cropThumbnailImage

(PECL imagick 2, PECL imagick 3)

Imagick::cropThumbnailImage — Crea una miniatura recortada

### Descripción

public **Imagick::cropThumbnailImage**([int](#language.types.integer) $width, [int](#language.types.integer) $height, [bool](#language.types.boolean) $legacy = **[false](#constant.false)**): [bool](#language.types.boolean)

Crea una miniatura de tamaño fijo ampliando o reduciendo de escala la imagen y recortando
un área específica desde el centro.

### Parámetros

     width


       El ancho de la miniatura






     height


       El alto de la miniatura





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::current

(PECL imagick 2, PECL imagick 3)

Imagick::current — Devuelve una referencia al objeto Imagick actual

### Descripción

public **Imagick::current**(): [Imagick](#class.imagick)

Devuelve una referencia al objeto actual, a partir de una
referencia de secuencia.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve self en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::cycleColormapImage

(PECL imagick 2, PECL imagick 3)

Imagick::cycleColormapImage — Desplaza el mapa de colores de una imagen

### Descripción

public **Imagick::cycleColormapImage**([int](#language.types.integer) $displace): [bool](#language.types.boolean)

Desplaza el mapa de colores de una imagen por el número de posiciones dados. Si se
realiza un ciclo del mapa de colores varias veces se puede obtener un efecto
psicodélico.

### Parámetros

     displace


      La cantidad de desplazamiento del mapa de colores.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::decipherImage

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::decipherImage — Descifra una imagen

### Descripción

public **Imagick::decipherImage**([string](#language.types.string) $passphrase): [bool](#language.types.boolean)

Descifra una imagen que ha sido cifrada anteriormente. La iamgen debe ser cifrada
usando [Imagick::encipherImage()](#imagick.encipherimage).
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.9 o superior.

### Parámetros

     passphrase


       La frase de contraseña





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ver también

    - [Imagick::encipherImage()](#imagick.encipherimage) - Cifra una imagen

# Imagick::deconstructImages

(PECL imagick 2, PECL imagick 3)

Imagick::deconstructImages — Devuelve las diferencias de ciertos píxeles entre dos imágenes

### Descripción

public **Imagick::deconstructImages**(): [Imagick](#class.imagick)

Compara cada imagen con la siguiente en la secuencia, y devuelve
la región máxima de encuadre de los píxeles diferentes que descubre.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un nuevo objeto Imagick en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::deleteImageArtifact

(PECL imagick 3)

Imagick::deleteImageArtifact — Borra un artefacto de imagen

### Descripción

public **Imagick::deleteImageArtifact**([string](#language.types.string) $artifact): [bool](#language.types.boolean)

Borra un artefacto asociado con la imagen. La diferencia entre las propiedades de imagen y
los artefactos de imagen es que las propiedades son públicas y los artefactos son privados.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.5.7 o superior.

### Parámetros

     artifact


       El nombre del artefacto a borrar.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ver también

    - [Imagick::setImageArtifact()](#imagick.setimageartifact) - Define el artefacto de la imagen

    - [Imagick::getImageArtifact()](#imagick.getimageartifact) - Obtener el artefacto de imagen

# Imagick::deleteImageProperty

(PECL imagick 3 &gt;= 3.3.0)

Imagick::deleteImageProperty — Elimina una propiedad de imagen

### Descripción

public **Imagick::deleteImageProperty**([string](#language.types.string) $name): [bool](#language.types.boolean)

Elimina una propiedad de imagen.

### Parámetros

    name


      El nombre de la propiedad a eliminar.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::deskewImage

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3 &gt;= 3.3.0)

Imagick::deskewImage — Elimina la torción de la imagen

### Descripción

public **Imagick::deskewImage**([float](#language.types.float) $threshold): [bool](#language.types.boolean)

Eeste método se puede usar para eliminar la torción de, por ejemplo, imágenes escaneadas donde
el papel no estaba debidamente colocado en la superfice del escáner. Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.5 o superior.

### Parámetros

     threshold


       Umbral de detorción





### Valores devueltos

### Ejemplos

    **Ejemplo #1  Imagick::deskewImage()**

&lt;?php
function deskewImage($threshold) {
$imagick = new \Imagick(realpath("images/NYTimes-Page1-11-11-1918.jpg"));
$deskewImagick = clone $imagick;

    //Esto es lo único que se requiere para eliminar la torción.
    $deskewImagick-&gt;deskewImage($threshold);

    //El resto de este ejemplo es para hacer el resultado obvio, ya que
    //de lo contrario no sería obvio.
    $trim = 9;

    $deskewImagick-&gt;cropImage($deskewImagick-&gt;getImageWidth() - $trim, $deskewImagick-&gt;getImageHeight(), $trim, 0);
    $imagick-&gt;cropImage($imagick-&gt;getImageWidth() - $trim, $imagick-&gt;getImageHeight(), $trim, 0);
    $deskewImagick-&gt;resizeimage($deskewImagick-&gt;getImageWidth() / 2, $deskewImagick-&gt;getImageHeight() / 2, \Imagick::FILTER_LANCZOS, 1);
    $imagick-&gt;resizeimage($imagick-&gt;getImageWidth() / 2, $imagick-&gt;getImageHeight() / 2, \Imagick::FILTER_LANCZOS, 1);
    $newCanvas = new \Imagick();
    $newCanvas-&gt;newimage($imagick-&gt;getImageWidth() + $deskewImagick-&gt;getImageWidth() + 20, $imagick-&gt;getImageHeight(), 'red', 'jpg');
    $newCanvas-&gt;compositeimage($imagick, \Imagick::COMPOSITE_COPY, 5, 0);
    $newCanvas-&gt;compositeimage($deskewImagick, \Imagick::COMPOSITE_COPY, $imagick-&gt;getImageWidth() + 10, 0);

    header("Content-Type: image/jpg");
    echo $newCanvas-&gt;getImageBlob();

}

?&gt;

# Imagick::despeckleImage

(PECL imagick 2, PECL imagick 3)

Imagick::despeckleImage — Reduce el ruido speckle de una imagen

### Descripción

public **Imagick::despeckleImage**(): [bool](#language.types.boolean)

Reduce el ruido speckle de una imagen, preservando los bordes
de la imagen original.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::despeckleImage()**

&lt;?php
function despeckleImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;despeckleImage();
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::destroy

(PECL imagick 2, PECL imagick 3)

Imagick::destroy — Destruye un objeto Imagick

### Descripción

public **Imagick::destroy**(): [bool](#language.types.boolean)

Destruye el objeto Imagick y libera todos los recursos asociados.
Este método está deprecado, en favor del método
[Imagick::clear](#imagick.clear).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::displayImage

(PECL imagick 2, PECL imagick 3)

Imagick::displayImage — Muestra una imagen

### Descripción

public **Imagick::displayImage**([string](#language.types.string) $servername): [bool](#language.types.boolean)

Este método muestra una imagen en un servidor X.

### Parámetros

     servername


       El nombre del servidor X





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::displayImages

(PECL imagick 2, PECL imagick 3)

Imagick::displayImages — Muestra una imagen o una secuencia de imágenes

### Descripción

public **Imagick::displayImages**([string](#language.types.string) $servername): [bool](#language.types.boolean)

Muestra una imagen o una secuencia de imágenes en un servidor X.

### Parámetros

     servername


       El nombre del servidor X





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::distortImage

(PECL imagick 2 &gt;= 2.0.1, PECL imagick 3)

Imagick::distortImage — Deforma una imagen utilizando varios métodos de distorsión

### Descripción

public **Imagick::distortImage**([int](#language.types.integer) $method, [array](#language.types.array) $arguments, [bool](#language.types.boolean) $bestfit): [bool](#language.types.boolean)

Deforma una imagen utilizando varios métodos de distorsión, mapeando la paleta
de colores de la imagen de origen a una nueva imagen destino normalmente del mismo
tamaño que la imagen de origen, a menos que 'bestfit' esté establecido a **[true](#constant.true)**.

Si 'bestfit' está habilitado, y la distorsión lo permite, la imagen destino
se ajusta para asegurarse de que la 'imagen' de origen entera se ajustará dentro de
la imagen destino final, la cuál será redimensionada e compensada acordemente. También,
en la mayoría de los casos el índice virtual de la imagen de origen será tomado en cuenta
en el mapeado.

Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.

### Parámetros

     method


       El método de distorsión de la imagen. Véase [constantes de distorsión](#imagick.constants.distortion)






     arguments


       Los argumentos para este método de distorsión






     bestfit


       Intenta redimensionar la imagen destino para ajustarse a la imagen de origen deformada





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Usar Imagick::distortImage()**:



     Deformar una imagen y mostrarla en el navegador.

&lt;?php
/_ Crear un nuevo objeto _/
$im = new Imagick();

/_ Crear un nuevo patrón de tablero de ajedrez _/
$im-&gt;newPseudoImage(100, 100, "pattern:checkerboard");

/_ Esteblecer el formato de la imagen a png _/
$im-&gt;setImageFormat('png');

/_ Rellenar las nuevas áreas visibles con transparente _/
$im-&gt;setImageVirtualPixelMethod(Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);

/_ Activar el mate _/
$im-&gt;setImageMatte(true);

/_ Puntos de control para la distorsión _/
$puntosControl = array( 10, 10,
10, 5,

                        10, $im-&gt;getImageHeight() - 20,
                        10, $im-&gt;getImageHeight() - 5,

                        $im-&gt;getImageWidth() - 10, 10,
                        $im-&gt;getImageWidth() - 10, 20,

                        $im-&gt;getImageWidth() - 10, $im-&gt;getImageHeight() - 10,
                        $im-&gt;getImageWidth() - 10, $im-&gt;getImageHeight() - 30);

/_ Realizar la distorsión _/
$im-&gt;distortImage(Imagick::DISTORTION_PERSPECTIVE, $puntosControl, true);

/_ Imprimir la imagen _/
header("Content-Type: image/png");
echo $im;
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Salida del ejemplo : Using Imagick::distortImage()](php-bigxhtml-data/images/c0d23d2d6769e53e24a1b3136c064577-distortImage.png)


### Ver también

    - [Imagick::blurImage()](#imagick.blurimage) - Añade un filtro de borrosidad a la imagen

    - [Imagick::motionBlurImage()](#imagick.motionblurimage) - Simula borrosidad en movimiento

    - [Imagick::radialBlurImage()](#imagick.radialblurimage) - Hace borrosa de forma radial una imagen

# Imagick::drawImage

(PECL imagick 2, PECL imagick 3)

Imagick::drawImage — Renderiza el objeto ImagickDraw a la imagen actual

### Descripción

public **Imagick::drawImage**([ImagickDraw](#class.imagickdraw) $draw): [bool](#language.types.boolean)

Renderiza el objeto ImagickDraw a la imagen actual.

### Parámetros

     draw


       Las operaciones de dibujo para renderizar a la imagen.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::edgeImage

(PECL imagick 2, PECL imagick 3)

Imagick::edgeImage — Mejora los bordes de la imagen

### Descripción

public **Imagick::edgeImage**([float](#language.types.float) $radius): [bool](#language.types.boolean)

Mejora los bordes de la imagen con un filtro de convolución del radio
dado. Use un radio de 0 y éste será autoseleccionado.

### Parámetros

     radius


      El radio de la operación.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::edgeImage()**



      &lt;?php

function edgeImage($imagePath, $radius) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;edgeImage($radius);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::embossImage

(PECL imagick 2, PECL imagick 3)

Imagick::embossImage — Devuelve una imagen en escala de grises con un efecto tridimensional

### Descripción

public **Imagick::embossImage**([float](#language.types.float) $radius, [float](#language.types.float) $sigma): [bool](#language.types.boolean)

Devuelve una imagen en escala de grises con un efecto tridimensional. Se convoluciona
la imagen con un operador gaussiano del radio y desviación estándar (sigma) dados.
Para obtener resultados razonables, el radio debería ser mayor que
sigma. Use un radio de 0 y se elegirá un radio apropiado automáticamente.

### Parámetros

     radius


      El radio de el efecto






     sigma


      El valor sigma del efecto





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::embossImage()**



      &lt;?php

function embossImage($imagePath, $radius, $sigma) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;embossImage($radius, $sigma);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::encipherImage

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::encipherImage — Cifra una imagen

### Descripción

public **Imagick::encipherImage**([string](#language.types.string) $passphrase): [bool](#language.types.boolean)

Covierte los píxeles planos en píxeles cifrados. La imagen no es legible
hasta que haya sido descifrada usando [Imagick::decipherImage()](#imagick.decipherimage)
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.9 o superior.

### Parámetros

     passphrase


       La frase de contraseña





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ver también

    - [Imagick::decipherImage()](#imagick.decipherimage) - Descifra una imagen

# Imagick::enhanceImage

(PECL imagick 2, PECL imagick 3)

Imagick::enhanceImage — Mejora la calidad de una imagen ruidosa

### Descripción

public **Imagick::enhanceImage**(): [bool](#language.types.boolean)

Mejora la calidad de una imagen ruidosa con un filtro
digital.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::enhanceImage()**

&lt;?php
function enhanceImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;enhanceImage();
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::equalizeImage

(PECL imagick 2, PECL imagick 3)

Imagick::equalizeImage — Iguala el histograma de una imagen

### Descripción

public **Imagick::equalizeImage**(): [bool](#language.types.boolean)

Iguala el histograma de una imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::equalizeImage()**

&lt;?php
function equalizeImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;equalizeImage();
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::evaluateImage

(PECL imagick 2, PECL imagick 3)

Imagick::evaluateImage — Aplica una expresión a una imagen

### Descripción

public **Imagick::evaluateImage**([int](#language.types.integer) $op, [float](#language.types.float) $constant, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Aplica una expresión aritmética, relacional o lógica a una imagen.
Utilice estos operadores para aclarar u oscurecer una imagen, para
aumentar o reducir el contraste, o para producir una imagen invertida.

### Parámetros

     op


       El operador de evaluación






     constant


       El valor del operador






     channel


       Proporciona una constante de canal válida para su modo de canal.
       Para utilizar más de un canal, combine las constantes de tipo
       de canal utilizando los operadores a nivel de bits. Consulte la lista de
       [constantes de canal](#imagick.constants.channel).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::evaluateImage()**



     Uso de evaluateImage para reducir la opacidad
     de una imagen.

&lt;?php
// Creación de un nuevo objeto con la imagen
$im = new Imagick('example-alpha.png');

// Reducción del alpha en un 50%
$im-&gt;evaluateImage(Imagick::EVALUATE_DIVIDE, 2, Imagick::CHANNEL_ALPHA);

// Mostrar la imagen
header("Content-Type: image/png");
echo $im;
?&gt;

# Imagick::exportImagePixels

(PECL imagick 2 &gt;=2.3.0, PECL imagick 3)

Imagick::exportImagePixels — Exporta los píxeles brutos de la imagen

### Descripción

public **Imagick::exportImagePixels**(
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [string](#language.types.string) $map,
    [int](#language.types.integer) $STORAGE
): [array](#language.types.array)

Exporta los píxeles de la imagen a un array. El mapa define el orden de exportación
de los píxeles. El tamaño del array devuelto corresponde a
width _ height _ strlen(map).
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.7 o superior.

### Parámetros

     x


       Coordenada en X del espacio exportado.






     y


       Coordenada en Y del espacio exportado.






     width


       Ancho del espacio exportado.






     height


       Alto del espacio exportado.






     map


       Orden de los píxeles exportados. Por ejemplo, "RGB".
       Los caracteres válidos para el mapa son R, G, B, A, O, C, Y, M, K, I y P.






     STORAGE


       Consulte la lista de
       [constantes de tipo pixel](#imagick.constants.pixel)





### Valores devueltos

Devuelve un array que contiene los valores de los píxeles.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::exportImagePixels()**



     Exportación de los píxeles de la imagen a un array.

&lt;?php

/_ Crea un nuevo objeto _/
$im = new Imagick();

/_ Crea una nueva imagen _/
$im-&gt;newPseudoImage(0, 0, "magick:rose");

/_ Exporta los píxeles de la imagen _/
$pixels = $im-&gt;exportImagePixels(10, 10, 2, 2, "RGB", Imagick::PIXEL_CHAR);

/_ Visualización _/
var_dump($pixels);
?&gt;

    El ejemplo anterior mostrará:

array(12) {
[0]=&gt;
int(72)
[1]=&gt;
int(64)
[2]=&gt;
int(57)
[3]=&gt;
int(69)
[4]=&gt;
int(59)
[5]=&gt;
int(43)
[6]=&gt;
int(124)
[7]=&gt;
int(120)
[8]=&gt;
int(-96)
[9]=&gt;
int(91)
[10]=&gt;
int(84)
[11]=&gt;
int(111)
}

# Imagick::extentImage

(PECL imagick 2, PECL imagick 3)

Imagick::extentImage — Establecer el tamaño de la imagen

### Descripción

public **Imagick::extentImage**(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)

Método cómodo para establecer el tamaño de una imagen. El método establece el tamaño de la imagen y
permite ajustar las coordenadas x,y donde comienza el nuevo área.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.1 o superior.

**Precaución**

    Antes de ImageMagick 6.5.7-8 (1623), $x era positivo cuando se desplazaba hacia la izquierda y negativo cuando se desplazaba hacia la derecha, e $y era positivo cuando se desplazaba una imagen hacia arriba y negativo cuando se desplazaba hacia abajo.

    Entre ImageMagick 6.3.7 (1591) e ImageMagick 6.5.7-8 (1623), los ejes de $x e $y se voltearon, por lo que $x era negativo cuando se desplazaba hacia la izquierda y positivo cuando se desplazaba hacia la derecha, e $y era negativo cuando se desplazaba una imagen hacia arriba y positivo cuando se desplazaba hacia abajo.

    Entre ImageMagick 6.5.7-8 (1623) e ImageMagick 6.6.9-7 (1641), los ejes de $x e $y se volvieron a voltear a la funcionalidad anterior de ImageMagick 6.5.7-8 (1623).

### Parámetros

     width


       El nuevo ancho






     height


       El nuevo alto






     x


       Posición X para el nuevo tamaño






     y


       Posición Y para el nuevo tamaño





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ver también

    - [Imagick::resizeImage()](#imagick.resizeimage) - Escala una imagen

    - [Imagick::thumbnailImage()](#imagick.thumbnailimage) - Modifica el tamaño de una imagen

    - [Imagick::cropImage()](#imagick.cropimage) - Extrae una región de la imagen

# Imagick::filter

(PECL imagick 3 &gt;= 3.3.0)

Imagick::filter — Aplica un núcleo de convolución personalizado a la imagen

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::filter**([ImagickKernel](#class.imagickkernel) $ImagickKernel, [int](#language.types.integer) $channel = Imagick::CHANNEL_UNDEFINED): [bool](#language.types.boolean)

Aplica un núcleo de convolución personalizado a la imagen.

### Parámetros

    ImagickKernel


      Una instancia de ImagickKernel que representa un solo núcleo o una serie de núcleos vinculados.






    channel


      Proporciona una constante de canal válida para su modo de canal. Para aplicarlo a más de un canal, combínense las [constantes de canales](#imagick.constants.channel) utilizando un operador a nivel de bits. Por omisión, vale **[Imagick::CHANNEL_DEFAULT](#imagick.constants.channel-default)**. Consúltese la lista de [constantes de canales](#imagick.constants.channel)


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::filter()**



      &lt;?php

function filter($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$matrix = [
[-1, 0, -1],
[0, 5, 0],
[-1, 0, -1],
];

    $kernel = \ImagickKernel::fromMatrix($matrix);
    $strength = 0.5;
    $kernel-&gt;scale($strength, \Imagick::NORMALIZE_KERNEL_VALUE);
    $kernel-&gt;addUnityKernel(1 - $strength);

    $imagick-&gt;filter($kernel);
    header("Content-Type: image/jpg");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::flattenImages

(PECL imagick 2, PECL imagick 3)

Imagick::flattenImages — Fusiona una secuencia de imágenes

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::flattenImages**(): [Imagick](#class.imagick)

Fusiona una secuencia de imágenes. Esto es práctico para combinar
una serie de capas de Photoshop en una sola imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::flipImage

(PECL imagick 2, PECL imagick 3)

Imagick::flipImage — Crea una imagen por espejo vertical

### Descripción

public **Imagick::flipImage**(): [bool](#language.types.boolean)

Crea una imagen por espejo vertical, utilizando una simetría alrededor del eje de las abscisas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::flipImage()**

&lt;?php
function flipImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;flipImage();
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

### Ver también

- [Imagick::flopimage()](#imagick.flopimage) - Crea una imagen por espejo horizontal

# Imagick::floodFillPaintImage

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::floodFillPaintImage — Cambia el valor del color de cualquier píxel que coincida con el objetivo

### Descripción

public **Imagick::floodFillPaintImage**(
    [mixed](#language.types.mixed) $fill,
    [float](#language.types.float) $fuzz,
    [mixed](#language.types.mixed) $target,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [bool](#language.types.boolean) $invert,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)

Cambia el valor del color de cualquier píxel que coincida con el objetivo y esté
en el área inmediata. Este método es un sustituto del método obsoleto
[Imagick::paintFloodFillImage()](#imagick.paintfloodfillimage).
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.8 o superior.

### Parámetros

     fill


       Objeto ImagickPixel o una cadena que contiene el color de relleno






     fuzz


       La cantidad de polvo de papel. Por ejemplo, definir el polvo de papel a 10 y el color rojo a una intensidad de 100 y 102 no será interpretado como el mismo color.






     target


       Objeto ImagickPixel o una cadena que contiene el color objetivo a dibujar






     x


       Posición X del inicio del relleno






     y


       Posición Y del inicio del relleno






     invert


       Si es **[true](#constant.true)** se pinta cualquier píxel que no coincida con el color objetivo.






     channel


       Proporciona una constante de canal válida para su modo de canal. Para aplicarlo a más de un canal, combínense las [constantes de canales](#imagick.constants.channel) utilizando un operador a nivel de bits. Por omisión, vale **[Imagick::CHANNEL_DEFAULT](#imagick.constants.channel-default)**. Consúltese la lista de [constantes de canales](#imagick.constants.channel)





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo de Imagick::floodfillPaintImage()**

&lt;?php

/_ Crear un nuevo objeto imagick _/
$im = new Imagick();

/_ Crear imágenes de color rojo, verde y azul _/
$im-&gt;newImage(100, 50, "red");
$im-&gt;newImage(100, 50, "green");
$im-&gt;newImage(100, 50, "blue");

/_ Añadir las imágenes para que sean una _/
$im-&gt;resetIterator();
$combinado = $im-&gt;appendImages(true);

/_ Guardar la imagen intermedia para la comparación _/
$combinado-&gt;writeImage("floodfillpaint_intermedia.png");

/_ El píxel objetivo a pintar _/
$x = 1;
$y = 1;

/_ Obtener el color con el que vamos a pintar _/
$objetivo = $combinado-&gt;getImagePixelColor($x, $y);

/_ Pinta el píxel en la posición 1,1 negro y todos los píxeles
cercanos que coincidan con el color objetivo _/
$combinado-&gt;floodfillPaintImage("black", 1, $objetivo, $x, $y, false);

/_ Guardar el resultado _/
$combinado-&gt;writeImage("floodfillpaint_resultado.png");
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Salida del ejemplo : Imagick::floodfillPaintImage()](php-bigxhtml-data/images/c0d23d2d6769e53e24a1b3136c064577-floodfillpaint_intermediate.png)


      ![Salida del ejemplo : Imagick::floodfillPaintImage()](php-bigxhtml-data/images/c0d23d2d6769e53e24a1b3136c064577-floodfillpaint_result.png)


# Imagick::flopImage

(PECL imagick 2, PECL imagick 3)

Imagick::flopImage — Crea una imagen por espejo horizontal

### Descripción

public **Imagick::flopImage**(): [bool](#language.types.boolean)

Crea una imagen por espejo horizontal, utilizando una simetría alrededor del eje de las ordenadas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::flopImage()**

&lt;?php
function flopImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;flopImage();
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

### Ver también

- [Imagick::flipimage()](#imagick.flipimage) - Crea una imagen por espejo vertical

# Imagick::forwardFourierTransformImage

(PECL imagick 3 &gt;= 3.3.0)

Imagick::forwardFourierTransformImage — Implementa la transformada discreta de Fourier (Discrete Fourier Transform - DFT)

### Descripción

public **Imagick::forwardFourierTransformimage**([bool](#language.types.boolean) $magnitude): [bool](#language.types.boolean)

Implementa la transformada discreta de Fourier (DFT) de la imagen ya sea como un par de imágenes magnitud/fase o como un par de imágenes reales/imaginarias.

### Parámetros

    magnitude


      Si es verdadero, devuelve como un par magnitud/fase, de lo contrario un par de imágenes reales/imaginarias.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::forwardFourierTransformImage()**



      &lt;?php

//Función de utilidad para forwardTransformImage
function createMask() {
$draw = new \ImagickDraw();

    $draw-&gt;setStrokeOpacity(0);
    $draw-&gt;setStrokeColor('rgb(255, 255, 255)');
    $draw-&gt;setFillColor('rgb(255, 255, 255)');

    // Dibuja un círculo en el eje y, con su centro
    // en x, y que toca el origen
    $draw-&gt;circle(250, 250, 220, 250);

    $imagick = new \Imagick();
    $imagick-&gt;newImage(512, 512, "black");
    $imagick-&gt;drawImage($draw);
    $imagick-&gt;gaussianBlurImage(20, 20);
    $imagick-&gt;autoLevelImage();

    return $imagick;

}

function forwardFourierTransformImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;resizeimage(512, 512, \Imagick::FILTER_LANCZOS, 1);

    $mask = createMask();
    $imagick-&gt;forwardFourierTransformImage(true);

    @$imagick-&gt;setimageindex(0);
    $magnitude = $imagick-&gt;getimage();

    @$imagick-&gt;setimageindex(1);
    $imagickPhase = $imagick-&gt;getimage();

    if (true) {
        $imagickPhase-&gt;compositeImage($mask, \Imagick::COMPOSITE_MULTIPLY, 0, 0);
    }

    if (false) {
        $output = clone $imagickPhase;
        $output-&gt;setimageformat('png');
        header("Content-Type: image/png");
        echo $output-&gt;getImageBlob();
    }

    $magnitude-&gt;inverseFourierTransformImage($imagickPhase, true);

    $magnitude-&gt;setimageformat('png');
    header("Content-Type: image/png");
    echo $magnitude-&gt;getImageBlob();

}

?&gt;

# Imagick::frameImage

(PECL imagick 2, PECL imagick 3)

Imagick::frameImage — Añade un borde tridimensional simulado

### Descripción

public **Imagick::frameImage**(
    [mixed](#language.types.mixed) $matte_color,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $inner_bevel,
    [int](#language.types.integer) $outer_bevel
): [bool](#language.types.boolean)

Añade un borde tridimensional simulado alrededor de la imagen.
El ancho y alto especifican el ancho del borde de las caras verticales y
horizontales del marco. Los biseles interior y exterior
indican el ancho de las sombras interiores y exteriores del
marco.

### Parámetros

     matte_color


      Objeto ImagickPixel o una cadena que representa el color mate






     width


      El ancho del borde






     height


      El alto del borde






     inner_bevel


      El ancho del bisel interior






     outer_bevel


      El ancho del bisel exterior





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Ahora se permite que una cadena represente el color como el primer parámetro.
        Versiones anteriores sólo permitían un objeto ImagickPixel.





### Ejemplos

      **Ejemplo #1  Imagick::frameImage()**



      &lt;?php

function frameImage($imagePath, $color, $width, $height, $innerBevel, $outerBevel) {
    $imagick = new \Imagick(realpath($imagePath));

    $width = $width + $innerBevel + $outerBevel;
    $height = $height + $innerBevel + $outerBevel;

    $imagick-&gt;frameimage(
        $color,
        $width,
        $height,
        $innerBevel,
        $outerBevel
    );
    header("Content-Type: image/jpg");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::functionImage

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::functionImage — Aplica una función sobre la imagen

### Descripción

public **Imagick::functionImage**([int](#language.types.integer) $function, [array](#language.types.array) $arguments, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Aplica una expresión aritmética, relacional o lógica a una pseudo-imagen.

Consulte también los [» ejemplos
de ImageMagick v6 - Transformaciones de imágenes — Función, evaluación de varios argumentos](http://www.imagemagick.org/Usage/transform/#function).

Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.9 o superior.

### Parámetros

     function


       Consulte la lista de [constantes de función](#imagick.constants.function).






     arguments


       Array de argumentos a pasar a la función.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Crea un gradiente sinusoidal**

&lt;?php
$imagick = new Imagick();
$imagick-&gt;newPseudoImage(200, 200, 'gradient:black-white');
$arguments = array(3, -90);
$imagick-&gt;functionImage(Imagick::FUNCTION_SINUSOID, $arguments);

header("Content-Type: image/png");
$imagick-&gt;setImageFormat("png");
echo $imagick-&gt;getImageBlob();
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Resultado de la creación de un gradiente sinusoidal](php-bigxhtml-data/images/c0d23d2d6769e53e24a1b3136c064577-functionImage_sinusoidal.png)





    **Ejemplo #2 Crea un gradiente desde el polinomio (4x^2 - 4x + 1)**

&lt;?php
$imagick = new Imagick();
$imagick-&gt;newPseudoImage(200, 200, 'gradient:black-white');
$arguments = array(4, -4, 1);
$imagick-&gt;functionImage(Imagick::FUNCTION_POLYNOMIAL, $arguments);

header("Content-Type: image/png");
$imagick-&gt;setimageformat("png");
echo $imagick-&gt;getImageBlob();
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Resultado de la creación de un gradiente a partir de un polinomio](php-bigxhtml-data/images/c0d23d2d6769e53e24a1b3136c064577-functionImage_polynomial.png)





    **Ejemplo #3
     Crea un gradiente complejo desde el
     polinomio (4x^2 - 4x^2 + 1) modulado por un gradiente sinusoidal
    **

&lt;?php
$imagick1 = new Imagick();
$imagick1-&gt;newPseudoImage(200, 200, 'gradient:black-white');
$arguments = array(9, -90);
$imagick1-&gt;functionImage(Imagick::FUNCTION_SINUSOID, $arguments);

$imagick2 = new Imagick();
$imagick2-&gt;newPseudoImage(200, 200, 'gradient:black-white');
$arguments = array(0.5, 0);
$imagick2-&gt;functionImage(Imagick::FUNCTION_SINUSOID, $arguments);
$imagick1-&gt;compositeimage($imagick2, Imagick::COMPOSITE_MULTIPLY, 0, 0);

header("Content-Type: image/png");
$imagick1-&gt;setImageFormat("png");
echo $imagick1-&gt;getImageBlob();
?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Resultado de la creación de un gradiente complejo](php-bigxhtml-data/images/c0d23d2d6769e53e24a1b3136c064577-functionImage_multiplied.png)


# Imagick::fxImage

(PECL imagick 2, PECL imagick 3)

Imagick::fxImage — Evalúa una expresión por cada píxel de la imagen

### Descripción

public **Imagick::fxImage**([string](#language.types.string) $expression, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [Imagick](#class.imagick)

Evalúa una expresión por cada píxel de la imagen. Consulte [» El Operador de Imagen de Efectos Especiales
Fx](http://www.imagemagick.org/script/fx.php) para más información.

### Parámetros

     expression


       La expresión.






     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#imagick.constants.channel).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::fxImage()**



      &lt;?php

function fxImage() {
$imagick = new \Imagick();
$imagick-&gt;newPseudoImage(200, 200, "xc:white");

    $fx = 'xx=i-w/2; yy=j-h/2; rr=hypot(xx,yy); (.5-rr/140)*1.2+.5';
    $fxImage = $imagick-&gt;fxImage($fx);

    header("Content-Type: image/png");
    $fxImage-&gt;setimageformat('png');
    echo $fxImage-&gt;getImageBlob();

}

?&gt;

# Imagick::gammaImage

(PECL imagick 2, PECL imagick 3)

Imagick::gammaImage — Corrección gamma de una imagen

### Descripción

public **Imagick::gammaImage**([float](#language.types.float) $gamma, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Corrección gamma de una imagen. La misma imagen vista en diferentes dispositivos tendrá
diferencias perceptuales en la manera en que la intensidad de la imagen esté representada
en la pantalla. Especifique niveles gamma indivuduales para los canales rojo,
verde y azul, o ajústelos todos con el parámetro gamma.
El rango de valores es típicamente desde 0.8 a 2.3.

### Parámetros

     gamma


      La cantidad de corrección gamma.






     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#imagick.constants.channel).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::gammaImage()**



      &lt;?php

function gammaImage($imagePath, $gamma, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;gammaImage($gamma, $channel);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::gaussianBlurImage

(PECL imagick 2, PECL imagick 3)

Imagick::gaussianBlurImage — Hace borrosa una imagen

### Descripción

public **Imagick::gaussianBlurImage**([float](#language.types.float) $radius, [float](#language.types.float) $sigma, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Hace borrosa una imagen. Se convoluciona la imagen con un operador gaussiano del
radio y la desviación estándar (sigma) dados. Para obtener resultados razonables, el
radio debería ser mayor que sigma. Use un radio de 0 y se seleccionará un
radio adecuado automáticamente.

### Parámetros

     radius


      El radio gaussiano, en píxeles, sin contar el píxel central.






     sigma


       La desviación estándar gaussiana, en píxeles.






     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#imagick.constants.channel).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::gaussianBlurImage()**



      &lt;?php

function gaussianBlurImage($imagePath, $radius, $sigma, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;gaussianBlurImage($radius, $sigma, $channel);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::getColorspace

(PECL imagick 3)

Imagick::getColorspace — Obtiene el espacio de colores

### Descripción

public **Imagick::getColorspace**(): [int](#language.types.integer)

Obtiene el valor global del espacio de colores.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.5.7 o superior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero que puede ser comparado con las
[constantes COLORSPACE](#imagick.constants.colorspace).

# Imagick::getCompression

(PECL imagick 2, PECL imagick 3)

Imagick::getCompression — Lee el tipo de compresión

### Descripción

public **Imagick::getCompression**(): [int](#language.types.integer)

Lee el tipo de compresión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la constante de compresión.

# Imagick::getCompressionQuality

(PECL imagick 2, PECL imagick 3)

Imagick::getCompressionQuality — Lee la calidad de la compresión

### Descripción

public **Imagick::getCompressionQuality**(): [int](#language.types.integer)

Lee la calidad de la compresión.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un integer que describe la calidad de la compresión.

# Imagick::getCopyright

(PECL imagick 2, PECL imagick 3)

Imagick::getCopyright — Devuelve el copyright de la API ImageMagick

### Descripción

public static **Imagick::getCopyright**(): [string](#language.types.string)

Devuelve el copyright de la API ImageMagick.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string, en caso de éxito.

# Imagick::getFilename

(PECL imagick 2, PECL imagick 3)

Imagick::getFilename — Lee el nombre del fichero asociado a una secuencia

### Descripción

public **Imagick::getFilename**(): [string](#language.types.string)

Lee el nombre del fichero asociado a una secuencia.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getFont

(PECL imagick 2 &gt;= 2.1.0, PECL imagick 3)

Imagick::getFont — Obtiene la fuente de caracteres

### Descripción

public **Imagick::getFont**(): [string](#language.types.string)

Devuelve la propiedad de la fuente de caracteres del objeto.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.7 o superior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [string](#language.types.string) que contiene el nombre de la fuente de caracteres
o **[false](#constant.false)** si la fuente no está definida.

### Ver también

    - [Imagick::setFont()](#imagick.setfont) - Configura la fuente

    - [ImagickDraw::setFont()](#imagickdraw.setfont) - Establece la fuente especificada completamente para usarla cuando se escribe texto

    - [ImagickDraw::getFont()](#imagickdraw.getfont) - Devuelve la fuente

# Imagick::getFormat

(PECL imagick 2, PECL imagick 3)

Imagick::getFormat — Devuelve el formato de la imagen Imagick

### Descripción

public **Imagick::getFormat**(): [string](#language.types.string)

Devuelve el formato de la imagen Imagick.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el formato de la imagen Imagick.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getGravity

(PECL imagick 2, PECL imagick 3)

Imagick::getGravity — Obtiene la gravedad

### Descripción

public **Imagick::getGravity**(): [int](#language.types.integer)

Obtiene la propiedad global de gravedad para el objeto
Imagick.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.0 o superior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la propiedad de gravedad. Consúltese la lista de
[constantes de gravedad](#imagick.constants.gravity).

# Imagick::getHomeURL

(PECL imagick 2, PECL imagick 3)

Imagick::getHomeURL — Devuelve la URL de ImageMagick

### Descripción

public static **Imagick::getHomeURL**(): [string](#language.types.string)

Devuelve la URL de ImageMagick.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la URL de ImageMagick.

# Imagick::getImage

(PECL imagick 2, PECL imagick 3)

Imagick::getImage — Devuelve un nuevo objeto Imagick

### Descripción

public **Imagick::getImage**(): [Imagick](#class.imagick)

Devuelve un nuevo objeto Imagick.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un nuevo objeto Imagick.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageAlphaChannel

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::getImageAlphaChannel — Verifica si la imagen tiene un canal alfa

### Descripción

public **Imagick::getImageAlphaChannel**(): [bool](#language.types.boolean)

Devuelve si la imagen tiene un canal alfa.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la imagen tiene un valor de canal alfa y **[false](#constant.false)** en caso contrario,
es decir, que la imagen es RGB en lugar de RGBA o CMYK en lugar de CMYKA.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      PECL imagick 3.6.0

       Ahora devuelve un [bool](#language.types.boolean) ; anteriormente se devolvía un [int](#language.types.integer).



# Imagick::getImageArtifact

(PECL imagick 3)

Imagick::getImageArtifact — Obtener el artefacto de imagen

### Descripción

public **Imagick::getImageArtifact**([string](#language.types.string) $artifact): [string](#language.types.string)

Obtiene un artefacto asociado con la imagen. La diferencia entre las propiedades de imagen y
los artefactos de imagen es que las propiedades son públicas y los artefactos son privados.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.5.7 o superior.

### Parámetros

     artifact


       El nombre del artefacto





### Valores devueltos

Devuelve el valor del artefacto si se tuvo éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ver también

    - [Imagick::setImageArtifact()](#imagick.setimageartifact) - Define el artefacto de la imagen

    - [Imagick::deleteImageArtifact()](#imagick.deleteimageartifact) - Borra un artefacto de imagen

# Imagick::getImageAttribute

(PECL imagick 2, PECL imagick 3)

Imagick::getImageAttribute — Obtiene un atributo nombrado

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::getImageAttribute**([string](#language.types.string) $key): [string](#language.types.string)

Obtiene un atributo nombrado.

### Parámetros

    key


      La clave del atributo a obtener.


### Valores devueltos

# Imagick::getImageBackgroundColor

(PECL imagick 2, PECL imagick 3)

Imagick::getImageBackgroundColor — Devuelve el color de fondo

### Descripción

public **Imagick::getImageBackgroundColor**(): [ImagickPixel](#class.imagickpixel)

Devuelve el color de fondo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el color de fondo en forma de objeto ImagickPixel.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageBlob

(PECL imagick 2, PECL imagick 3)

Imagick::getImageBlob — Devuelve la secuencia de imágenes como un blob

### Descripción

public **Imagick::getImageBlob**(): [string](#language.types.string)

Implementa un formato directo en memoria. Devuelve la
secuencia de imágenes en forma de string. El formato de la imagen
determina el formato del BLOB devuelto (GIF, JPEG, PNG, etc.).
Para devolver un formato diferente, utilice la función
[Imagick::setImageFormat()](#imagick.setimageformat).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string que contiene las imágenes.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageBluePrimary

(PECL imagick 2, PECL imagick 3)

Imagick::getImageBluePrimary — Devuelve el punto primario azul de la cromaticidad

### Descripción

public **Imagick::getImageBluePrimary**(): [array](#language.types.array)

Devuelve el punto primario azul de la cromaticidad de una imagen.

### Parámetros

     x


       El punto x primario azul de la cromaticidad.






     y


       El punto y primario azul de la cromaticidad.





### Valores devueltos

Matriz consistente en las coordenadas "x" e "y" del punto.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageBorderColor

(PECL imagick 2, PECL imagick 3)

Imagick::getImageBorderColor — Devuelve el color del borde de la imagen

### Descripción

public **Imagick::getImageBorderColor**(): [ImagickPixel](#class.imagickpixel)

Devuelve el color del borde de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageChannelDepth

(PECL imagick 2, PECL imagick 3)

Imagick::getImageChannelDepth — Obtiene la profundidad de un canal de imagen en particular

### Descripción

public **Imagick::getImageChannelDepth**([int](#language.types.integer) $channel): [int](#language.types.integer)

Obtiene la profundidad de un canal de imagen en particular.

### Parámetros

     channel


       Proporciona una constante de canal válida para su modo de canal. Para aplicarlo a más de un canal, combínense las [constantes de canales](#imagick.constants.channel) utilizando un operador a nivel de bits. Por omisión, vale **[Imagick::CHANNEL_DEFAULT](#imagick.constants.channel-default)**. Consúltese la lista de [constantes de canales](#imagick.constants.channel)





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::getImageChannelDistortion

(PECL imagick 2, PECL imagick 3)

Imagick::getImageChannelDistortion — Compara los canales de imagen de una imagen con una imagen reconstruida

### Descripción

public **Imagick::getImageChannelDistortion**([Imagick](#class.imagick) $reference, [int](#language.types.integer) $channel, [int](#language.types.integer) $metric): [float](#language.types.float)

Compara uno o más canales de imagen de una imagen con una imagen reconstruida
y devuelve la métrica de distorsión especificada.

### Parámetros

     reference


      Objeto Imagick que se va a comparar.






     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#imagick.constants.channel).






     metric


      Una de las [constantes de tipo de métrica](#imagick.constants.metric).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageChannelDistortions

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::getImageChannelDistortions — Obtiene las distorsiones de un canal

### Descripción

public **Imagick::getImageChannelDistortions**([Imagick](#class.imagick) $reference, [int](#language.types.integer) $metric, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [float](#language.types.float)

Compara uno o varios canales de una imagen con una imagen reconstruida, y devuelve
las medidas de la distorsión especificada.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.

### Parámetros

     reference


       Objeto Imagick que contiene la referencia de la imagen.






     metric


       Consúltese la lista de
       [constantes de tipo de medidas](#imagick.constants.metric).






     channel


       Proporciona una constante de canal válida para su modo de canal. Para aplicarlo a más de un canal, combínense las [constantes de canales](#imagick.constants.channel) utilizando un operador a nivel de bits. Por omisión, vale **[Imagick::CHANNEL_DEFAULT](#imagick.constants.channel-default)**. Consúltese la lista de [constantes de canales](#imagick.constants.channel)





### Valores devueltos

Devuelve un [float](#language.types.float), que describe la distorsión del canal.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageChannelExtrema

(PECL imagick 2, PECL imagick 3)

Imagick::getImageChannelExtrema — Obtiene los extremos de uno o más canales de imagen

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::getImageChannelExtrema**([int](#language.types.integer) $channel): [array](#language.types.array)

Obtiene los extremos (mínimo y máximo) de uno o más canales de imagen. El valor devuelto es una
matriz asociativa con las claves "minima" (mínimo) y "maxima" (máximo).

### Parámetros

     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#imagick.constants.channel).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageChannelKurtosis

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::getImageChannelKurtosis — Obtiene la curtosis y la asimetría estadística de un canal específico

### Descripción

public **Imagick::getImageChannelKurtosis**([int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [array](#language.types.array)

Obtiene la curtosis y la asimetría estadística de un canal específico. Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.9 o superior.

### Parámetros

     channel


       Proporciona una constante de canal válida para su modo de canal. Para aplicarlo a más de un canal, combínense las [constantes de canales](#imagick.constants.channel) utilizando un operador a nivel de bits. Por omisión, vale **[Imagick::CHANNEL_DEFAULT](#imagick.constants.channel-default)**. Consúltese la lista de [constantes de canales](#imagick.constants.channel)





### Valores devueltos

Devuelve una matriz con los miembros kurtosis (curtosis)
y skewness (asimetría estadística).

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageChannelMean

(PECL imagick 2, PECL imagick 3)

Imagick::getImageChannelMean — Obtiene la media y la desviación estándar

### Descripción

public **Imagick::getImageChannelMean**([int](#language.types.integer) $channel): [array](#language.types.array)

Obtiene la media y la desviación estándar de uno o más canales de imagen.

### Parámetros

     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#imagick.constants.channel).





### Valores devueltos

Devuelve una matriz con miembros "mean" y "standardDeviation".

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageChannelRange

(PECL imagick 2 &gt;= 2.2.1, PECL imagick 3)

Imagick::getImageChannelRange — Obtiene el rango del canal

### Descripción

public **Imagick::getImageChannelRange**([int](#language.types.integer) $channel): [array](#language.types.array)

Obtiene el rango de uno o más canales de imagen.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.0 o superior.

### Parámetros

     channel


       Proporciona una constante de canal válida para su modo de canal. Para aplicarlo a más de un canal, combínense las [constantes de canales](#imagick.constants.channel) utilizando un operador a nivel de bits. Por omisión, vale **[Imagick::CHANNEL_DEFAULT](#imagick.constants.channel-default)**. Consúltese la lista de [constantes de canales](#imagick.constants.channel)





### Valores devueltos

Devuelve una matriz que contiene los valores mínimo y máximo de el/los canal/es.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageChannelStatistics

(PECL imagick 2, PECL imagick 3)

Imagick::getImageChannelStatistics — Devuelve estadísticas sobre cada canal de la imagen

### Descripción

public **Imagick::getImageChannelStatistics**(): [array](#language.types.array)

Devuelve estadísticas sobre cada canal de la imagen. Las estadísticas
incluyen la profundidad del canal, sus mínimos y máximos, la media,
y la desviación estándar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::getImageClipMask

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::getImageClipMask — Obtiene la máscara de recorte de la imagen

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::getImageClipMask**(): [Imagick](#class.imagick)

Devuelve la máscara de recorte de la imagen. La máscara de recorte es un objeto
Imagick que contiene la máscara de recorte.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto Imagick que contiene la máscara de recorte.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageColormapColor

(PECL imagick 2, PECL imagick 3)

Imagick::getImageColormapColor — Devuelve el color del índice del mapa de colores especficado

### Descripción

public **Imagick::getImageColormapColor**([int](#language.types.integer) $index): [ImagickPixel](#class.imagickpixel)

Devuelve el color del índice del mapa de colores especficado.

### Parámetros

     index


      El índice en el mapa de colores de la imagen.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageColors

(PECL imagick 2, PECL imagick 3)

Imagick::getImageColors — Lee el número de colores únicos de la imagen

### Descripción

public **Imagick::getImageColors**(): [int](#language.types.integer)

Lee el número de colores únicos de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [int](#language.types.integer), el número de colores únicos en la imagen.

# Imagick::getImageColorspace

(PECL imagick 2, PECL imagick 3)

Imagick::getImageColorspace — Obtiene el espacio de colores de la imagen

### Descripción

public **Imagick::getImageColorspace**(): [int](#language.types.integer)

Obtiene el espacio de colores de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero que puede ser comparado con las
[constantes COLORSPACE](#imagick.constants.colorspace).

# Imagick::getImageCompose

(PECL imagick 2, PECL imagick 3)

Imagick::getImageCompose — Devuelve el operador de composición asociado a una imagen

### Descripción

public **Imagick::getImageCompose**(): [int](#language.types.integer)

Devuelve el operador de composición asociado a una imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::getImageCompression

(PECL imagick 3 &gt;= 3.3.0)

Imagick::getImageCompression — Lee el tipo de compresión de la imagen

### Descripción

public **Imagick::getImageCompression**(): [int](#language.types.integer)

Lee el tipo de compresión de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una constante de compresión.

# Imagick::getImageCompressionQuality

(PECL imagick 2 &gt;= 2.2.2, PECL imagick 3)

Imagick::getImageCompressionQuality — Lee la calidad de compresión de la imagen

### Descripción

public **Imagick::getImageCompressionQuality**(): [int](#language.types.integer)

Lee la calidad de compresión de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero que describe la calidad de la compresión de la imagen.

# Imagick::getImageDelay

(PECL imagick 2, PECL imagick 3)

Imagick::getImageDelay — Lee el retraso de la imagen

### Descripción

public **Imagick::getImageDelay**(): [int](#language.types.integer)

Lee el retraso de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el retraso de la imagen.
Emite una excepción
[ImagickException](#class.imagickexception) en caso de fallo.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageDepth

(PECL imagick 2, PECL imagick 3)

Imagick::getImageDepth — Se lee la profundidad de la imagen

### Descripción

public **Imagick::getImageDepth**(): [int](#language.types.integer)

Se lee la profundidad de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La profundidad de la imagen.

# Imagick::getImageDispose

(PECL imagick 2, PECL imagick 3)

Imagick::getImageDispose — Lee el método de recuperación

### Descripción

public **Imagick::getImageDispose**(): [int](#language.types.integer)

Lee el método de recuperación.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el método de recuperación en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageDistortion

(PECL imagick 2, PECL imagick 3)

Imagick::getImageDistortion — Compara una imagen con una imagen reconstruida

### Descripción

public **Imagick::getImageDistortion**(MagickWand $reference, [int](#language.types.integer) $metric): [float](#language.types.float)

Compara una imagen con una imagen reconstruida y devuelve la métrica de distorisión
especificada.

### Parámetros

     reference


      Objeto Imagick que se va a comparar.






     metric


      Una de las [constantes de tipo de métrica](#imagick.constants.metric).





### Valores devueltos

Devuelve la métrica de distorsión usada en la imagen (o la mejor deducción
de la misma).

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageExtrema

(PECL imagick 2, PECL imagick 3)

Imagick::getImageExtrema — Lee los extremos de una imagen

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::getImageExtrema**(): [array](#language.types.array)

Lee los extremos de una imagen. Devuelve
un array asociativo, con las claves
"min" y "max".

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array asociativo, con las claves "min" y "max".

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageFilename

(PECL imagick 2, PECL imagick 3)

Imagick::getImageFilename — Devuelve el nombre de un fichero para una imagen en una secuencia

### Descripción

public **Imagick::getImageFilename**(): [string](#language.types.string)

Devuelve el nombre de un fichero para una imagen en una secuencia.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string con el nombre del fichero de la imagen.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageFormat

(PECL imagick 2, PECL imagick 3)

Imagick::getImageFormat — Devuelve el formato de una imagen en una secuencia

### Descripción

public **Imagick::getImageFormat**(): [string](#language.types.string)

Devuelve el formato de una imagen en una secuencia.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el formato de una imagen en una secuencia.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageGamma

(PECL imagick 2, PECL imagick 3)

Imagick::getImageGamma — Obtiene el gamma de la imagen

### Descripción

public **Imagick::getImageGamma**(): [float](#language.types.float)

Obtiene el gamma de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el gamma de la imagen en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageGeometry

(PECL imagick 2, PECL imagick 3)

Imagick::getImageGeometry — Lee las dimensiones de la imagen en un array

### Descripción

public **Imagick::getImageGeometry**(): [array](#language.types.array)

Devuelve el ancho y la altura de la imagen en forma de array asociativo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [array](#language.types.array) con las dimensiones de la imagen.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Uso de Imagick::getImageGeometry()**

&lt;?php
$imagick = new Imagick();
$imagick-&gt;newImage(100, 200, "black");
print_r($imagick-&gt;getImageGeometry());
?&gt;

    El ejemplo anterior mostrará:

Array
(
[width] =&gt; 100
[height] =&gt; 200
)

# Imagick::getImageGravity

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::getImageGravity — Obtiene la gravedad de la imagen

### Descripción

public **Imagick::getImageGravity**(): [int](#language.types.integer)

Obtiene el valor de la gravedad actual de la imagen.
A diferencia del método [Imagick::getGravity()](#imagick.getgravity),
este método devuelve la gravedad definida para la secuencia actual
de la imagen.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la propiedad de gravedad de la imagen. Consúltese la lista de
[constantes de gravedad](#imagick.constants.gravity).

# Imagick::getImageGreenPrimary

(PECL imagick 2, PECL imagick 3)

Imagick::getImageGreenPrimary — Devuelve la cromaticidad del color verde

### Descripción

public **Imagick::getImageGreenPrimary**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la cromaticidad del color verde.
Devuelve un array con las claves "x" y "y".

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array con las claves "x" y "y" en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageHeight

(PECL imagick 2, PECL imagick 3)

Imagick::getImageHeight — Devuelve la altura de la imagen

### Descripción

public **Imagick::getImageHeight**(): [int](#language.types.integer)

Devuelve la altura de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la altura de la imagen en píxeles.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageHistogram

(PECL imagick 2, PECL imagick 3)

Imagick::getImageHistogram — Devuelve el histograma de la imagen

### Descripción

public **Imagick::getImageHistogram**(): [array](#language.types.array)

Devuelve el histograma de la imagen, en forma de un
array de objetos [ImagickPixel](#class.imagickpixel).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array de objetos ImagickPixel.
Emite una excepción
[ImagickException](#class.imagickexception) en caso de fallo.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::getImageHistogram()**

&lt;?php
function getColorStatistics($histogramElements, $colorChannel) {
$colorStatistics = [];

    foreach ($histogramElements as $histogramElement) {
        $color = $histogramElement-&gt;getColorValue($colorChannel);
        $color = intval($color * 255);
        $count = $histogramElement-&gt;getColorCount();

        if (array_key_exists($color, $colorStatistics)) {
            $colorStatistics[$color] += $count;
        }
        else {
            $colorStatistics[$color] = $count;
        }
    }

    ksort($colorStatistics);

    return $colorStatistics;

}

function getImageHistogram($imagePath) {

    $backgroundColor = 'black';

    $draw = new \ImagickDraw();
    $draw-&gt;setStrokeWidth(0); // hace las líneas lo más finas posible

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    $histogramWidth = 256;
    $histogramHeight = 100; // la altura de cada segmento RGB

    $imagick = new \Imagick(realpath($imagePath));
    //Redimensionar la imagen para que sea pequeña, de lo contrario PHP tiende a quedarse sin memoria
    //Esto podría llevar a resultados incorrectos para imágenes que son patológicamente 'pixeladas'
    $imagick-&gt;adaptiveResizeImage(200, 200, true);
    $histogramElements = $imagick-&gt;getImageHistogram();

    $histogram = new \Imagick();
    $histogram-&gt;newpseudoimage($histogramWidth, $histogramHeight * 3, 'xc:black');
    $histogram-&gt;setImageFormat('png');

    $getMax = function ($carry, $item)  {
        if ($item &gt; $carry) {
            return $item;
        }
        return $carry;
    };

    $colorValues = [
        'red' =&gt; getColorStatistics($histogramElements, \Imagick::COLOR_RED),
        'lime' =&gt; getColorStatistics($histogramElements, \Imagick::COLOR_GREEN),
        'blue' =&gt; getColorStatistics($histogramElements, \Imagick::COLOR_BLUE),
    ];

    $max = array_reduce($colorValues['red'] , $getMax, 0);
    $max = array_reduce($colorValues['lime'] , $getMax, $max);
    $max = array_reduce($colorValues['blue'] , $getMax, $max);

    $scale =  $histogramHeight / $max;

    $count = 0;
    foreach ($colorValues as $color =&gt; $values) {
        $draw-&gt;setstrokecolor($color);

        $offset = ($count + 1) * $histogramHeight;

        foreach ($values as $index =&gt; $value) {
            $draw-&gt;line($index, $offset, $index, $offset - ($value * $scale));
        }
        $count++;
    }

    $histogram-&gt;drawImage($draw);

    header( "Content-Type: image/png" );
    echo $histogram;

}

?&gt;

# Imagick::getImageIndex

(PECL imagick 2, PECL imagick 3)

Imagick::getImageIndex — Obtiene el índice de la imagen actual

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::getImageIndex**(): [int](#language.types.integer)

Devuelve el índice de la imagen actual en la secuencia Imagick.
Este método está obsoleto.
Consúltese la función [Imagick::getIteratorIndex()](#imagick.getiteratorindex).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un integer en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageInterlaceScheme

(PECL imagick 2, PECL imagick 3)

Imagick::getImageInterlaceScheme — Se lee el esquema de entrelazado de la imagen

### Descripción

public **Imagick::getImageInterlaceScheme**(): [int](#language.types.integer)

Se lee el esquema de entrelazado de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Se devuelve el esquema de entrelazado de la imagen en caso de éxito.
Emite una excepción
[ImagickException](#class.imagickexception) en caso de fallo.

# Imagick::getImageInterpolateMethod

(PECL imagick 2, PECL imagick 3)

Imagick::getImageInterpolateMethod — Devuelve el método de interpolación

### Descripción

public **Imagick::getImageInterpolateMethod**(): [int](#language.types.integer)

Devuelve el método de interpolación de la imagen especificada.
El método es una de las constantes **[Imagick::INTERPOLATE\_\*](#imagick.constants.interpolate-undefined)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el método de interpolación en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageIterations

(PECL imagick 2, PECL imagick 3)

Imagick::getImageIterations — Obtiene las iteraciones de la imagen

### Descripción

public **Imagick::getImageIterations**(): [int](#language.types.integer)

Obtiene las iteraciones de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve las iteraciones de la imagen.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageLength

(PECL imagick 2, PECL imagick 3)

Imagick::getImageLength — Devuelve el tamaño de la imagen en bytes

### Descripción

public **Imagick::getImageLength**(): [int](#language.types.integer)

Devuelve el tamaño de la imagen en bytes.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un integer.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::getImageLength()**:



     Obtiene el tamaño de la imagen, en bytes

&lt;?php
$image = new Imagick('test.jpg');
echo $image-&gt;getImageLength() . ' bytes';
?&gt;

# Imagick::getImageMatte

(PECL imagick 2, PECL imagick 3)

Imagick::getImageMatte — Indica si la imagen tiene un canal mat

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::getImageMatte**(): [bool](#language.types.boolean)

Devuelve **[true](#constant.true)** si la imagen tiene un canal mat, y **[false](#constant.false)** en caso contrario.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::getImageMatteColor

(PECL imagick 2, PECL imagick 3)

Imagick::getImageMatteColor — Devuelve el color mate de la imagen

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::getImageMatteColor**(): [ImagickPixel](#class.imagickpixel)

Devuelve el color mate de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto ImagickPixel en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageMimeType

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::getImageMimeType — Devuelve el tipo MIME de la imagen

### Descripción

public **Imagick::getImageMimeType**(): [string](#language.types.string)

Devuelve el tipo MIME de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Imagick::getImageOrientation

(PECL imagick 2, PECL imagick 3)

Imagick::getImageOrientation — Lee la orientación de la imagen

### Descripción

public **Imagick::getImageOrientation**(): [int](#language.types.integer)

Lee la orientación de la imagen. El valor devuelto es una de
las constantes [de orientación](#imagick.constants.orientation).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un integer en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImagePage

(PECL imagick 2, PECL imagick 3)

Imagick::getImagePage — Devuelve la geometría de la página

### Descripción

public **Imagick::getImagePage**(): [array](#language.types.array)

Devuelve la geometría de la página de una imagen, en forma de un array
con las claves "width", "height",
"x" y "y".

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la geometría de la página de una imagen, en forma de un array
con las claves "width", "height",
"x" y "y".

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImagePixelColor

(PECL imagick 2, PECL imagick 3)

Imagick::getImagePixelColor — Devuelve el color del píxel especificado

### Descripción

public **Imagick::getImagePixelColor**([int](#language.types.integer) $x, [int](#language.types.integer) $y): [ImagickPixel](#class.imagickpixel)

Devuelve el color del píxel especificado.

### Parámetros

     x


      La coordenada x del píxel






     y


      La coordenada y del píxel





### Valores devueltos

Devuelve una instancia de ImagickPixel para el color en las coordenadas dadas.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageProfile

(PECL imagick 2, PECL imagick 3)

Imagick::getImageProfile — Devuelve el perfil nominado de la imagen

### Descripción

public **Imagick::getImageProfile**([string](#language.types.string) $name): [string](#language.types.string)

Devuelve el perfil nominado de la imagen.

### Parámetros

     name


      El nombre del perfil que se va a devolver.





### Valores devueltos

Devuelve un string que contiene el perfil de la imagen.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageProfiles

(PECL imagick 2, PECL imagick 3)

Imagick::getImageProfiles — Devuelve los perfiles de la imagen

### Descripción

public **Imagick::getImageProfiles**([string](#language.types.string) $pattern = "\*", [bool](#language.types.boolean) $include_values = **[true](#constant.true)**): [array](#language.types.array)

Devuelve los perfiles de la imagen que coinciden con un patrón.
Si **[false](#constant.false)** se pasa como segundo argumento, solo se devuelven los nombres de los perfiles.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.

### Parámetros

     pattern


       El patrón de perfil a leer.






     include_values


       Si se deben devolver solo los nombres de los perfiles.
       Si **[false](#constant.false)** se proporciona, solo se devolverán los nombres de las propiedades.





### Valores devueltos

Devuelve un array con los perfiles de la imagen, o bien
solo los nombres de los perfiles.

# Imagick::getImageProperties

(PECL imagick 2, PECL imagick 3)

Imagick::getImageProperties — Devuelve las propiedades EXIF de la imagen

### Descripción

public **Imagick::getImageProperties**([string](#language.types.string) $pattern = "\*", [bool](#language.types.boolean) $include_values = **[true](#constant.true)**): [array](#language.types.array)

Devuelve todas las propiedades de la imagen que cumplen con un patrón.
Si se pasa **[false](#constant.false)** como segundo argumento, solo se devuelven los nombres de las propiedades. Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.

### Parámetros

     pattern


       El patrón para los nombres de propiedades.






     include_values


       Si se deben devolver únicamente los nombres de las
       propiedades. Si se proporciona **[false](#constant.false)**, entonces solo
       se devolverán los nombres de las propiedades.





### Valores devueltos

Devuelve un array que contiene las propiedades de la imagen,
o sus nombres.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::getImageProperties()**



     Ejemplo de extracción de información EXIF.

&lt;?php

/_ Crea un objeto _/
$im = new imagick("/path/to/example.jpg");

/_ Lee las informaciones EXIF _/
$exifArray = $im-&gt;getImageProperties("exif:\*");

/_ Recorre las propiedades EXIF _/
foreach ($exifArray as $name =&gt; $property)
{
    echo "{$name} =&gt; {$property}&lt;br /&gt;\n";
}

?&gt;

# Imagick::getImageProperty

(PECL imagick 2, PECL imagick 3)

Imagick::getImageProperty — Devuelve una propiedad de una imagen

### Descripción

public **Imagick::getImageProperty**([string](#language.types.string) $name): [string](#language.types.string)

Devuelve una propiedad de una imagen.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.2 o superior.

### Parámetros

     name


       El nombre de la propiedad (por ejemplo, Exif:DateTime)





### Valores devueltos

Devuelve una propiedad de una imagen, o **[false](#constant.false)** si el nombre
solicitado no existe.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::getImageProperty()**



     Definición y recuperación de las propiedades de la imagen.

&lt;?php
$image = new Imagick();
$image-&gt;newImage(300, 200, "black");

$image-&gt;setImageProperty('Exif:Make', 'Imagick');
echo $image-&gt;getImageProperty('Exif:Make');
?&gt;

### Ver también

    - [Imagick::setImageProperty()](#imagick.setimageproperty) - Configura una propiedad de imagen

# Imagick::getImageRedPrimary

(PECL imagick 2, PECL imagick 3)

Imagick::getImageRedPrimary — Devuelve la cromaticidad del punto rojo

### Descripción

public **Imagick::getImageRedPrimary**(): [array](#language.types.array)

Devuelve la cromaticidad del punto rojo en forma de un array
con las claves "x" y "y".

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la cromaticidad del punto rojo en forma de un array
con las claves "x" y "y".
Emite una excepción
[ImagickException](#class.imagickexception) en caso de fallo.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageRegion

(PECL imagick 2, PECL imagick 3)

Imagick::getImageRegion — Extrae una región de la imagen

### Descripción

public **Imagick::getImageRegion**(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [Imagick](#class.imagick)

Extrae una región de la imagen y la devuelve como un nuevo objeto Imagick.

### Parámetros

     width


       El ancho de la región extraída.






     height


       El alto de la región extraída.






     x


       Coordenada X de la esquina superior izquierda de la región extraída.






     y


       Coordenada Y de la esquina superior izquierda de la región extraída.





### Valores devueltos

Extrae una región de la imagen y la devuleve como una nueva varita mágica.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageRenderingIntent

(PECL imagick 2, PECL imagick 3)

Imagick::getImageRenderingIntent — Lee el método de renderizado de la imagen

### Descripción

public **Imagick::getImageRenderingIntent**(): [int](#language.types.integer)

Lee el método de renderizado de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la constante de [renderizado](#imagick.constants.renderingintent).

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageResolution

(PECL imagick 2, PECL imagick 3)

Imagick::getImageResolution — Lee las resoluciones en X y Y de una imagen

### Descripción

public **Imagick::getImageResolution**(): [array](#language.types.array)

Lee las resoluciones en X y Y de una imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Lee las resoluciones en X y Y de una imagen.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImagesBlob

(PECL imagick 2, PECL imagick 3)

Imagick::getImagesBlob — Devuelve todas las imágenes de la secuencia en un BLOB

### Descripción

public **Imagick::getImagesBlob**(): [string](#language.types.string)

Implementa el formato directo en memoria. Devuelve todas las
imágenes de la secuencia en forma de cadena. El formato de la imagen
determina el formato del BLOB devuelto (GIF, JPEG, PNG, etc.). Para
devolver un formato de imagen diferente, utilice
[Imagick::setImageFormat()](#imagick.setimageformat).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena que contiene todas las imágenes.
Emite una excepción
[ImagickException](#class.imagickexception) en caso de fallo.

# Imagick::getImageScene

(PECL imagick 2, PECL imagick 3)

Imagick::getImageScene — Devuelve la escena de la imagen

### Descripción

public **Imagick::getImageScene**(): [int](#language.types.integer)

Devuelve la escena de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la escena de la imagen.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageSignature

(PECL imagick 2, PECL imagick 3)

Imagick::getImageSignature — Genera una firma SHA-256

### Descripción

public **Imagick::getImageSignature**(): [string](#language.types.string)

Genera una firma SHA-256 de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena que contiene la firma SHA-256 de la imagen.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageSize

(PECL imagick 2, PECL imagick 3)

Imagick::getImageSize — Devuelve el tamaño de la imagen en bytes

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::getImageSize**(): [int](#language.types.integer)

Devuelve el tamaño de la imagen en bytes.
Este método está deprecado en favor del método
[Imagick::getImageLength()](#imagick.getimagelength)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero que representa el tamaño de la imagen en bytes.

# Imagick::getImageTicksPerSecond

(PECL imagick 2, PECL imagick 3)

Imagick::getImageTicksPerSecond — Se leen los ticks-por-segundo de la imagen

### Descripción

public **Imagick::getImageTicksPerSecond**(): [int](#language.types.integer)

Se leen los ticks-por-segundo de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Se leen los ticks-por-segundo de la imagen.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageTotalInkDensity

(PECL imagick 2, PECL imagick 3)

Imagick::getImageTotalInkDensity — Lee la densidad total de tinta de la imagen

### Descripción

public **Imagick::getImageTotalInkDensity**(): [float](#language.types.float)

Lee la densidad total de tinta de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    Lee la densidad total de tinta de la imagen.
    Emite una excepción

[ImagickException](#class.imagickexception) en caso de fallo.

# Imagick::getImageType

(PECL imagick 2, PECL imagick 3)

Imagick::getImageType — Obtiene el tipo posible de imagen

### Descripción

public **Imagick::getImageType**(): [int](#language.types.integer)

Devuelve el tipo posible de imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Obtiene el tipo posible de imagen.

    -

      **[imagick::IMGTYPE_UNDEFINED](#imagick.constants.imgtype-undefined)**



    -

      **[imagick::IMGTYPE_BILEVEL](#imagick.constants.imgtype-bilevel)**



    -

      **[imagick::IMGTYPE_GRAYSCALE](#imagick.constants.imgtype-grayscale)**



    -

      **[imagick::IMGTYPE_GRAYSCALEMATTE](#imagick.constants.imgtype-grayscalematte)**



    -

      **[imagick::IMGTYPE_PALETTE](#imagick.constants.imgtype-palette)**



    -

      **[imagick::IMGTYPE_PALETTEMATTE](#imagick.constants.imgtype-palettematte)**



    -

      **[imagick::IMGTYPE_TRUECOLOR](#imagick.constants.imgtype-truecolor)**



    -

      **[imagick::IMGTYPE_TRUECOLORMATTE](#imagick.constants.imgtype-truecolormatte)**



    -

      **[imagick::IMGTYPE_COLORSEPARATION](#imagick.constants.imgtype-colorseparation)**



    -

      **[imagick::IMGTYPE_COLORSEPARATIONMATTE](#imagick.constants.imgtype-colorseparationmatte)**



    -

      **[imagick::IMGTYPE_OPTIMIZE](#imagick.constants.imgtype-optimize)**


### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageUnits

(PECL imagick 2, PECL imagick 3)

Imagick::getImageUnits — Devuelve las unidades de resolución de la imagen

### Descripción

public **Imagick::getImageUnits**(): [int](#language.types.integer)

Devuelve las unidades de resolución de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve las unidades de resolución de la imagen.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageVirtualPixelMethod

(PECL imagick 2, PECL imagick 3)

Imagick::getImageVirtualPixelMethod — Devuelve el método del píxel virtual

### Descripción

public **Imagick::getImageVirtualPixelMethod**(): [int](#language.types.integer)

Devuelve el método del píxel virtual para la imagen especificada.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el método del píxel virtual para la imagen especificada.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageWhitePoint

(PECL imagick 2, PECL imagick 3)

Imagick::getImageWhitePoint — Devuelve la cromaticidad del punto blanco

### Descripción

public **Imagick::getImageWhitePoint**(): [array](#language.types.array)

Devuelve la cromaticidad del punto blanco, en forma de un array
asociativo con las claves "x" y "y".

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la cromaticidad del punto blanco, en forma de un array
asociativo con las claves "x" y "y".

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getImageWidth

(PECL imagick 2, PECL imagick 3)

Imagick::getImageWidth — Devuelve el ancho de la imagen

### Descripción

public **Imagick::getImageWidth**(): [int](#language.types.integer)

Devuelve el ancho de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el ancho de la imagen.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getInterlaceScheme

(PECL imagick 2, PECL imagick 3)

Imagick::getInterlaceScheme — Lee el esquema de entrelazado del objeto

### Descripción

public **Imagick::getInterlaceScheme**(): [int](#language.types.integer)

Lee el esquema de entrelazado del objeto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Lee la constante [de entrelazado](#imagick.constants.interlace).

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getIteratorIndex

(PECL imagick 2, PECL imagick 3)

Imagick::getIteratorIndex — Lee el índice de la imagen activa actual

### Descripción

public **Imagick::getIteratorIndex**(): [int](#language.types.integer)

Lee el índice de la imagen activa actual en el objeto Imagick.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un entero que representa el índice de la imagen en la cola.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::getIteratorIndex()**



     Crea imágenes, define y recupera el índice del iterador.

&lt;?php
$im = new Imagick();
$im-&gt;newImage(100, 100, new ImagickPixel("red"));
$im-&gt;newImage(100, 100, new ImagickPixel("green"));
$im-&gt;newImage(100, 100, new ImagickPixel("blue"));

$im-&gt;setIteratorIndex(1);
echo $im-&gt;getIteratorIndex();
?&gt;

### Ver también

    - [Imagick::setIteratorIndex()](#imagick.setiteratorindex) - Establece la posición del iterador

    - [Imagick::getImageIndex()](#imagick.getimageindex) - Obtiene el índice de la imagen actual

    - [Imagick::setImageIndex()](#imagick.setimageindex) - Establece la posición del iterador

# Imagick::getNumberImages

(PECL imagick 2, PECL imagick 3)

Imagick::getNumberImages — Devuelve el número de imágenes de un objeto

### Descripción

public **Imagick::getNumberImages**(): [int](#language.types.integer)

Devuelve el número de imágenes de un objeto Imagick.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de imágenes de un objeto Imagick.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getOption

(PECL imagick 2, PECL imagick 3)

Imagick::getOption — Devuelve un valor asociado con la clave especificada

### Descripción

public **Imagick::getOption**([string](#language.types.string) $key): [string](#language.types.string)

Devuelve un valor asociado dentro del objeto para una clave especificada.

### Parámetros

     key


      El nombre de la opción





### Valores devueltos

Devuelve un valor asociado con una varita mágica y la clave especificada.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getPackageName

(PECL imagick 2, PECL imagick 3)

Imagick::getPackageName — Devuelve el nombre del paquete ImageMagick

### Descripción

public static **Imagick::getPackageName**(): [string](#language.types.string)

Devuelve el nombre del paquete ImageMagick.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del paquete ImageMagick.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getPage

(PECL imagick 2, PECL imagick 3)

Imagick::getPage — Devuelve la geometría de la página

### Descripción

public **Imagick::getPage**(): [array](#language.types.array)

Devuelve la geometría del objeto [Imagick](#class.imagick), en forma
de un array asociativo, con las claves "width",
"height", "x" y "y".

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la geometría del objeto [Imagick](#class.imagick), en forma
de un array asociativo, con las claves "width",
"height", "x" y "y".
Emite una excepción
[ImagickException](#class.imagickexception) en caso de fallo.

# Imagick::getPixelIterator

(PECL imagick 2, PECL imagick 3)

Imagick::getPixelIterator — Devuelve un MagickPixelIterator

### Descripción

public **Imagick::getPixelIterator**(): [ImagickPixelIterator](#class.imagickpixeliterator)

Devuelve un MagickPixelIterator.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto MagickPixelIterator.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::getPixelIterator()**

&lt;?php
function getPixelIterator($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imageIterator = $imagick-&gt;getPixelIterator();

    foreach ($imageIterator as $row =&gt; $pixels) { /* Se recorren las líneas de píxeles */
        foreach ($pixels as $column =&gt; $pixel) { /* Se recorren los píxeles en la línea (columna) */
            /** @var $pixel \ImagickPixel */
            if ($column % 2) {
                $pixel-&gt;setColor("rgba(0, 0, 0, 0)"); /* Se pintan todos los segundos píxeles en negro */
            }
        }
        $imageIterator-&gt;syncIterator(); /* Se sincroniza el iterador, es importante hacerlo en cada iteración */
    }

    header("Content-Type: image/jpg");
    echo $imagick;

}

?&gt;

# Imagick::getPixelRegionIterator

(PECL imagick 2, PECL imagick 3)

Imagick::getPixelRegionIterator — Obtinene un objeto ImagickPixelIterator de una sección de imagen

### Descripción

public **Imagick::getPixelRegionIterator**(
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $columns,
    [int](#language.types.integer) $rows
): [ImagickPixelIterator](#class.imagickpixeliterator)

Obtinene un objeto ImagickPixelIterator de una sección de imagen.

### Parámetros

     x


      La coordenada x de la región.






     y


      La coordenada y de la región.






     columns


      El ancho de la región.






     rows


      El alto de la región.





### Valores devueltos

Devuelve un objeto ImagickPixelIterator de una sección de imagen.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de Imagick::getPixelRegionIterator()**



     Recorrer los píxeles de la parte alta izquierda de la imagen, cambiándolos a negro.




     &lt;?php

$im = new Imagick(realpath("./testImage.png"));
$areaIterator = $im-&gt;getPixelRegionIterator(0, 0, 10, 10);

foreach ($areaIterator as $rowIterator) {
    foreach ($rowIterator as $píxel) {
        // Pintar cada píxel de negro
        $píxel-&gt;setColor("rgba(0, 0, 0, 0)");
    }
    $areaIterator-&gt;syncIterator();
}
$im-&gt;writeImage("./output.png");
?&gt;

# Imagick::getPointSize

(PECL imagick 2 &gt;= 2.1.0, PECL imagick 3)

Imagick::getPointSize — Obtiene el tamaño del punto

### Descripción

public **Imagick::getPointSize**(): [float](#language.types.float)

Devuelve la propiedad del tamaño del punto del objeto.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.7 o superior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [float](#language.types.float) que contiene el tamaño del punto.

### Ver también

    - [Imagick::setPointSize()](#imagick.setpointsize) - Define la medida del punto

# Imagick::getQuantum

(PECL imagick 3 &gt;= 3.3.0)

Imagick::getQuantum — Devuelve el espacio cuántico de ImageMagick

### Descripción

public static **Imagick::getQuantum**(): [int](#language.types.integer)

Devuelve el espacio cuántico de ImageMagick. Si HDRI está activado, el tipo es un float, de lo contrario es un integer.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# Imagick::getQuantumDepth

(PECL imagick 2, PECL imagick 3)

Imagick::getQuantumDepth — Lee la profundidad cuántica

### Descripción

public static **Imagick::getQuantumDepth**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la profundidad cuántica.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array con los miembros "quantumDepthLong" y
"quantumDepthString".

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getQuantumRange

(PECL imagick 2, PECL imagick 3)

Imagick::getQuantumRange — Devuelve el intervalo cuántico de Imagick

### Descripción

public static **Imagick::getQuantumRange**(): [array](#language.types.array)

Devuelve el intervalo cuántico de la instancia Imagick.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array asociativo que contiene el intervalo cuántico
en forma de [int](#language.types.integer) ("quantumRangeLong")
y en forma de [string](#language.types.string)
("quantumRangeString").

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getRegistry

(PECL imagick 3 &gt;= 3.3.0)

Imagick::getRegistry — Obtiene un elemento de StringRegistry

### Descripción

public static **Imagick::getRegistry**([string](#language.types.string) $key): [string](#language.types.string)

Obtiene la entrada StringRegistry para la clave nombrada o false si no está definida.

### Parámetros

    key


      La entrada a obtener.


### Valores devueltos

# Imagick::getReleaseDate

(PECL imagick 2, PECL imagick 3)

Imagick::getReleaseDate — Devuelve la fecha de publicación de ImageMagick

### Descripción

public static **Imagick::getReleaseDate**(): [string](#language.types.string)

Devuelve la fecha de publicación de ImageMagick, en forma de string.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la fecha de publicación de ImageMagick, en forma de string.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getResource

(PECL imagick 2, PECL imagick 3)

Imagick::getResource — Devuelve el consumo de memoria de la recurso

### Descripción

public static **Imagick::getResource**([int](#language.types.integer) $type): [int](#language.types.integer)

Devuelve el consumo de memoria de la recurso, en megabytes.

### Parámetros

     type


       Véase la lista de
       [constantes de tipo de recursos](#imagick.constants.resourcetypes).





### Valores devueltos

Devuelve el consumo de memoria de la recurso, en megabytes.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getResourceLimit

(PECL imagick 2, PECL imagick 3)

Imagick::getResourceLimit — Devuelve el límite de la recurso

### Descripción

public static **Imagick::getResourceLimit**([int](#language.types.integer) $type): [int](#language.types.integer)

Devuelve el límite de la recurso.

### Parámetros

     type


       Una de las [
       constantes de tipo de recursos](#imagick.constants.resourcetypes).





### Valores devueltos

Devuelve el límite de recurso especificado.
La unidad depende del tipo de recurso que está limitado.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ver también

- [Imagick::setResourceLimit()](#imagick.setresourcelimit) - Define la limitación para una recurso particular

# Imagick::getSamplingFactors

(PECL imagick 2, PECL imagick 3)

Imagick::getSamplingFactors — Lee el factor de muestreo horizontal y vertical

### Descripción

public **Imagick::getSamplingFactors**(): [array](#language.types.array)

Lee el factor de muestreo horizontal y vertical.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array asociativo con los factores de muestreo
horizontal y vertical de la imagen.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getSize

(PECL imagick 2, PECL imagick 3)

Imagick::getSize — Retorna el tamaño asociado con un objeto Imagick

### Descripción

public **Imagick::getSize**(): [array](#language.types.array)

Obtener el tamaño asociado con un objeto Imagick, previamente definido por [Imagick::setSize()](#imagick.setsize).

**Nota**:

    Este método retorna simplemente el tamaño que ha sido definido utilizando
    [Imagick::setSize()](#imagick.setsize). Si se desea obtener la
    anchura/altura real de la imagen, utilícense [Imagick::getImageWidth()](#imagick.getimagewidth) y
    [Imagick::getImageHeight()](#imagick.getimageheight).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna el tamaño asociado con un objeto [Imagick](#class.imagick),
en forma de array, con las claves "columns" (columnas) y
"rows" (filas).

### Ejemplos

    **Ejemplo #1 Obtención del tamaño de una imagen RGB cruda definida a 200x400, tras escalado a 400x800 (en relación a la anchura/altura)**

&lt;?php
//Establecer el tamaño primero y luego cargar la imagen cruda
$img = new Imagick();
$img-&gt;setSize(200, 400);
$img-&gt;readImage("image.rgb");

$img-&gt;scaleImage(400, 800);

$size = $img-&gt;getSize();
print_r($size);

echo $img-&gt;getImageWidth()."x".$img-&gt;getImageHeight();
?&gt;

    El ejemplo anterior mostrará:

Array
(
[columns] =&gt; 200
[rows] =&gt; 400
)
400x800

# Imagick::getSizeOffset

(PECL imagick 2, PECL imagick 3)

Imagick::getSizeOffset — Devuelve el tamaño de la posición

### Descripción

public **Imagick::getSizeOffset**(): [int](#language.types.integer)

Devuelve el tamaño de la posición asociada con el objeto Imagick.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tamaño de la posición asociada con el objeto Imagick.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::getVersion

(PECL imagick 2, PECL imagick 3)

Imagick::getVersion — Devuelve la API de ImageMagick

### Descripción

public static **Imagick::getVersion**(): [array](#language.types.array)

Devuelve la versión de la API de ImageMagick, en forma de string
y de número.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la versión de la API de ImageMagick, en forma de string
y de número.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::haldClutImage

(PECL imagick 3)

Imagick::haldClutImage — Reemplaza los colores de la imagen

### Descripción

public **Imagick::haldClutImage**([Imagick](#class.imagick) $clut, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Reemplaza los colores de la imagen usando una paleta Hald. Las imágenes Hald se pueden crear usando
un codificador de color HALD.

### Parámetros

     clut


       Objeto Imagick que contiene la paleta Hald.






     channel


       Proporciona una constante de canal válida para su modo de canal. Para aplicarlo a más de un canal, combínense las [constantes de canales](#imagick.constants.channel) utilizando un operador a nivel de bits. Por omisión, vale **[Imagick::CHANNEL_DEFAULT](#imagick.constants.channel-default)**. Consúltese la lista de [constantes de canales](#imagick.constants.channel)





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::haldClutImage()**



      &lt;?php

function haldClutImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagickPalette = new \Imagick(realpath("images/hald/hald_8.png"));
    $imagickPalette-&gt;sepiatoneImage(55);
    $imagick-&gt;haldClutImage($imagickPalette);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::hasNextImage

(PECL imagick 2, PECL imagick 3)

Imagick::hasNextImage — Verifica si un objeto tiene una imagen siguiente

### Descripción

public **Imagick::hasNextImage**(): [bool](#language.types.boolean)

Devuelve **[true](#constant.true)** si el objeto tiene más imágenes para revisar
la lista.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el objeto tiene una imagen siguiente, y **[false](#constant.false)** en caso contrario.

# Imagick::hasPreviousImage

(PECL imagick 2, PECL imagick 3)

Imagick::hasPreviousImage — Verifica si un objeto tiene una imagen anterior

### Descripción

public **Imagick::hasPreviousImage**(): [bool](#language.types.boolean)

Devuelve **[true](#constant.true)** si el objeto tiene una imagen anterior, para poder
revisar la lista en orden inverso.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el objeto tiene una imagen anterior, y **[false](#constant.false)** en caso contrario.

# Imagick::identifyFormat

(PECL imagick 3 &gt;= 3.3.0)

Imagick::identifyFormat — Formatea un string con los detalles de la imagen

### Descripción

public **Imagick::identifyFormat**([string](#language.types.string) $embedText): [string](#language.types.string)|[false](#language.types.singleton)

Reemplaza todos los caracteres de formato integrados por la propiedad de imagen apropiada y devuelve el texto interpretado. Consulte http://www.imagemagick.org/script/escape.php para las secuencias de escape.

### Parámetros

    embedText


      Un string que contiene secuencias de formato, por ejemplo "Caja de recorte: %@ número de colores únicos: %k".


### Valores devueltos

Devuelve el formato o **[false](#constant.false)** si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::identifyFormat()**



      &lt;?php
        $output = "La salida de 'Caja de recorte: %@ número de colores únicos: %k' es: &lt;br/&gt;";
        $imagick = new \Imagick(realpath("./images/artifact/mask.png"));
        $output .= $imagick-&gt;identifyFormat("Caja de recorte: %@ número de colores únicos: %k");

?&gt;

# Imagick::identifyImage

(PECL imagick 2, PECL imagick 3)

Imagick::identifyImage — Identifica una imagen y obtiene sus atributos

### Descripción

**Imagick::identifyImage**([bool](#language.types.boolean) $appendRawOutput = false): [array](#language.types.array)

Identifica una imagen y devuelve los atributos. Los atributos incluyen
el ancho, alto, tamaño de la imagen, entre otros.

### Parámetros

     appendRawOutput







### Valores devueltos

Identifica una imagen y devuelve los atributos. Los atributos incluyen
el ancho, alto, tamaño de la imagen, entre otros.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de formato resultante**

Array
(
[imageName] =&gt; /some/path/image.jpg
[format] =&gt; JPEG (Joint Photographic Experts Group JFIF format)
[geometry] =&gt; Array
(
[width] =&gt; 90
[height] =&gt; 90
)

    [type] =&gt; TrueColor
    [colorSpace] =&gt; RGB
    [resolution] =&gt; Array
        (
            [x] =&gt; 300
            [y] =&gt; 300
        )

    [units] =&gt; PixelsPerInch
    [fileSize] =&gt; 1.88672kb
    [compression] =&gt; JPEG
    [signature] =&gt; 9a6dc8f604f97d0d691c0286176ddf992e188f0bebba98494b2146ee2d7118da

)

# Imagick::implodeImage

(PECL imagick 2, PECL imagick 3)

Imagick::implodeImage — Crea una nueva imagen como una copia

### Descripción

public **Imagick::implodeImage**([float](#language.types.float) $radius): [bool](#language.types.boolean)

Crea una nueva imagen que es una copia de una existente con los píxeles de la imagen
"implosionados" por el porcentaje especificado.

### Parámetros

     radius


       El radio de la implosión





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::implodeImage()**



      &lt;?php

function implodeImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;implodeImage(0.0001);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::importImagePixels

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::importImagePixels — Importa los píxeles de una imagen

### Descripción

public **Imagick::importImagePixels**(
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [string](#language.types.string) $map,
    [int](#language.types.integer) $storage,
    [array](#language.types.array) $pixels
): [bool](#language.types.boolean)

Importa los píxeles desde una matriz a un imagen. El mapa map normalmete es
'RGB'. Este método impone las siguientes limitaciones para los parámetros: la cantidad de píxeles
en la matriz debe coincidir con width x height x
longitud del mapa.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.5 o superior.

### Parámetros

     x


       La posición x de la imagen






     y


       La posición y de la imagen






     width


       El ancho de la imagen






     height


       El alto de la imagen






     map


       Mapa de píxeles ordenados, como una cadena. Esto puede ser por ejemplo RGB.
       El valor puede ser cualquier combinación u orden de R = rojo, G = verde, B = azul, A = alfa
       (0 es transparente), O = opacidad (0 es opaco), C = cian, Y = amarillo, M = magenta, K = negro,
       I = intensidad (para escala de grises), P = relleno.






     storage


       El método de almacenamiento de los píxeles.
       Consulte esta lista de [constantes de píxel](#imagick.constants.pixel).






     pixels


       La matriz de píxeles





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo deImagick::importImagePixels()**

&lt;?php

/_ Generar una matriz de píxeles. 2000 píxeles por raya de color _/
$cuenta = 2000 \* 3;

$píxeles =
array_merge(array_pad(array(), $cuenta, 0),
array_pad(array(), $cuenta, 255),
array_pad(array(), $cuenta, 0),
array_pad(array(), $cuenta, 255),
array_pad(array(), $cuenta, 0));

/_ Ancho y alto. El área es la cantidad de píxeles dividido
por tres. Tres viene de 'RGB', tres valores por píxel _/
$ancho = $alto = pow((count($píxeles) / 3), 0.5);

/_ Crear una imagen vacía _/
$im = new Imagick();
$im-&gt;newImage($ancho, $alto, 'gray');

/_ Importar los píxeles a la imagen.
ancho _ alto _ strlen("RGB") debe coincidir con count($píxeles) _/
$im-&gt;importImagePixels(0, 0, $ancho, $alto, "RGB", Imagick::PIXEL_CHAR, $píxeles);

/_ Imprimir como una imagen jpeg _/
$im-&gt;setImageFormat('jpg');
header("Content-Type: image/jpg");
echo $im;

?&gt;

    Resultado del ejemplo anterior es similar a:





      ![Salida del ejemplo : Imagick::importImagePixels()](php-bigxhtml-data/images/c0d23d2d6769e53e24a1b3136c064577-importimagepixels.jpg)


# Imagick::inverseFourierTransformImage

(PECL imagick 3 &gt;= 3.3.0)

Imagick::inverseFourierTransformImage — Implementa la transformada inversa de Fourier discreta (Discrete Fourier Transform - DFT)

### Descripción

public **Imagick::inverseFourierTransformImage**([Imagick](#class.imagick) $complement, [bool](#language.types.boolean) $magnitude): [bool](#language.types.boolean)

Implementa la transformada inversa de Fourier discreta (DFT) de la imagen, ya sea como un par de imágenes magnitud/fase o como un par de imágenes reales/imaginarias.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    complement


      La segunda imagen a combinar con esta para formar ya sea el par de imágenes magnitud/fase o el par de imágenes reales/imaginarias.






    magnitude


      Si es verdadero, combina como un par magnitud/fase, de lo contrario, un par de imágenes reales/imaginarias.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::labelImage

(PECL imagick 2, PECL imagick 3)

Imagick::labelImage — Añade una etiqueta a una imagen

### Descripción

public **Imagick::labelImage**([string](#language.types.string) $label): [bool](#language.types.boolean)

Añade una etiqueta a una imagen.

### Parámetros

     label


       La etiqueta a añadir





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::levelImage

(PECL imagick 2, PECL imagick 3)

Imagick::levelImage — Ajusta los niveles de la imagen

### Descripción

public **Imagick::levelImage**(
    [float](#language.types.float) $blackPoint,
    [float](#language.types.float) $gamma,
    [float](#language.types.float) $whitePoint,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)

Ajusta los niveles de una imagen escalando la caída de los colores
entre los puntos blanco y negro especificados al rango completo de
cuantía disponible. Los parámetros proporcionados representan
los puntos negro, mitad, y blanco. El punto negro especifica
el color más oscuro de la imagen. Los colores más oscuros que el punto
negro se establecen a cero. El punto medio especifica una corrección
gamma a aplicar a la imagen. Mientras que el punto blanco especifica el
color más claro de la imagen. Los colores más claros que el punto
blanco se establecen al valor de cuantía máximo.

### Parámetros

     blackPoint


      El punto negro de la imagen






     gamma


      El valor gamma






     whitePoint


      El punto blanco de la imagen






     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#imagick.constants.channel).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::levelImage()**



      &lt;?php

function levelImage($blackPoint, $gamma, $whitePoint) {
$imagick = new \Imagick();
$imagick-&gt;newPseudoimage(500, 500, 'gradient:black-white');

    $imagick-&gt;setFormat('png');
    $quantum = $imagick-&gt;getQuantum();
    $imagick-&gt;levelImage($blackPoint / 100 , $gamma, $quantum * $whitePoint / 100);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::linearStretchImage

(PECL imagick 2, PECL imagick 3)

Imagick::linearStretchImage — Estrecha con saturación la intensidad de la imagen

### Descripción

public **Imagick::linearStretchImage**([float](#language.types.float) $blackPoint, [float](#language.types.float) $whitePoint): [bool](#language.types.boolean)

Estrecha con saturación la intensidad de la imagen.

### Parámetros

     blackPoint


       El punto negro de la imagen






     whitePoint


       El punto blanco de la imagen





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::linearStretchImage()**



      &lt;?php

function linearStretchImage($imagePath, $blackThreshold, $whiteThreshold) {
    $imagick = new \Imagick(realpath($imagePath));
$pixels = $imagick-&gt;getImageWidth() * $imagick-&gt;getImageHeight();
    $imagick-&gt;linearStretchImage($blackThreshold _ $pixels, $whiteThreshold _ $pixels);

    header("Content-Type: image/jpg");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::liquidRescaleImage

(PECL imagick 2 &gt;= 2.2.0, PECL imagick 3)

Imagick::liquidRescaleImage — Anima una imagen o imágenes

### Descripción

public **Imagick::liquidRescaleImage**(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [float](#language.types.float) $delta_x,
    [float](#language.types.float) $rigidity
): [bool](#language.types.boolean)

Este método escala las imágenes usando un método de re-escalada líquido. Este método
es una implementación de una técnica llamada "seam carving" (talla de costura). Para que este método
funcione como es debido, ImageMagick se debe compilar con el soporte para la biblioteca liblqr.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.9 o superior.

### Parámetros

     width


       El ancho del tamaño objetivo






     height


       El alto del tamaño objetivo






     delta_x


       Cuánto puede atravesar la costura el eje x.
       Pasar 0 causa que las costuras sean rectas.






     rigidity


       Introduce un sesgo para costuras no rectas. Este parámetro normalmente
       es 0.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ver también

    - [Imagick::resizeImage()](#imagick.resizeimage) - Escala una imagen

# Imagick::listRegistry

(PECL imagick 3 &gt;= 3.3.0)

Imagick::listRegistry — Lista todos los parámetros del registro

### Descripción

public static **Imagick::listRegistry**(): [array](#language.types.array)

Lista todos los parámetros del registro. Devuelve un array de todas las parejas clave/valor del registro.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un array que contiene las claves/valores del registro.

# Imagick::magnifyImage

(PECL imagick 2, PECL imagick 3)

Imagick::magnifyImage — Duplica el tamaño de una imagen, proporcionalmente

### Descripción

public **Imagick::magnifyImage**(): [bool](#language.types.boolean)

Este método es un atajo para duplicar el tamaño de una imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::magnifyImage()**

&lt;?php
function magnifyImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;magnifyImage();
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::mapImage

(PECL imagick 2, PECL imagick 3)

Imagick::mapImage — Reemplaza los colores de una imagen con el color más cercano de una imagen de referencia

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::mapImage**([Imagick](#class.imagick) $map, [bool](#language.types.boolean) $dither): [bool](#language.types.boolean)

### Parámetros

     map








     dither







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::matteFloodfillImage

(PECL imagick 2, PECL imagick 3)

Imagick::matteFloodfillImage — Cambia el valor de transparencia de un color

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::matteFloodfillImage**(
    [float](#language.types.float) $alpha,
    [float](#language.types.float) $fuzz,
    [mixed](#language.types.mixed) $bordercolor,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)

Cambia el valor de transparencia de un píxel que coincide con
el objetivo y esté en la zona inmediata. Si el método
**[FillToBorderMethod](#constant.filltobordermethod)** se especifica, el valor de transparencia
se cambia por cualquier píxel inmediato que no coincida con
el miembro color del borde de la imagen.

### Parámetros

     alpha


       El nivel de transparencia: 1.0 es completamente opaco y 0.0 es completamente
       transparente.






     fuzz


       El miembro enfoque de la imagen define cuánta tolerancia se acepta para
       considerar que dos colores son el mismo.






     bordercolor


       Un objeto [ImagickPixel](#class.imagickpixel) o una cadena que representa el color del borde.






     x


      La coordenada x de inicio de la operación.






     y


      La coordenada y de inicio de la operación.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Ahora se permite que una cadena represente el color como tercer parámetro.
        Versiones anteriores sólo permitían un objeto [ImagickPixel](#class.imagickpixel).





# Imagick::medianFilterImage

(PECL imagick 2, PECL imagick 3)

Imagick::medianFilterImage — Aplica un filtro digital

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::medianFilterImage**([float](#language.types.float) $radius): [bool](#language.types.boolean)

Aplica un filtro digital que mejora la calidad de una
imagen con ruido. Cada píxel es reemplazado por la media en un
conjunto de píxeles inmediatos como está definido por el radio.

### Parámetros

     radius


       El radio de la zona inmediata de los píxeles.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::medianFilterImage()**



      &lt;?php

function medianFilterImage($radius, $imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
@$imagick-&gt;medianFilterImage($radius);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::mergeImageLayers

(PECL imagick 2 &gt;= 2.1.0, PECL imagick 3)

Imagick::mergeImageLayers — Fusiona las capas de la imagen

### Descripción

public **Imagick::mergeImageLayers**([int](#language.types.integer) $layer_method): [Imagick](#class.imagick)

Fusiona las capas de la imagen en una sola. Este método es útil
al utilizar formatos de imagen que emplean múltiples capas,
como los PSD. La fusión se controla mediante el argumento
layer_method que define la forma en que las capas
deben fusionarse.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.7 o superior.

### Parámetros

     layer_method


       Una constante entre las constantes **[Imagick::LAYERMETHOD_*](#imagick.constants.layermethod-undefined)**.





### Valores devueltos

Devuelve un objeto Imagick que contiene la imagen fusionada.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::mergeImageLayers()**

&lt;?php
function mergeImageLayers($layerMethodType, $imagePath1, $imagePath2) {

    $imagick = new \Imagick(realpath($imagePath));

    $imagick2 = new \Imagick(realpath($imagePath2));
    $imagick-&gt;addImage($imagick2);
    $imagick-&gt;setImageFormat('png');

    $result = $imagick-&gt;mergeImageLayers($layerMethodType);
    header("Content-Type: image/png");
    echo $result-&gt;getImageBlob();

}

?&gt;

### Ver también

    - [Imagick::flattenImages()](#imagick.flattenimages) - Fusiona una secuencia de imágenes

# Imagick::minifyImage

(PECL imagick 2, PECL imagick 3)

Imagick::minifyImage — Redimensiona una imagen proporcionalmente para reducirla a la mitad de tamaño

### Descripción

public **Imagick::minifyImage**(): [bool](#language.types.boolean)

Esta función es un atajo práctico para redimensionar
una imagen proporcionalmente para reducirla
a la mitad de tamaño.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::modulateImage

(PECL imagick 2, PECL imagick 3)

Imagick::modulateImage — Controla el brillo, la saturación y el tono

### Descripción

public **Imagick::modulateImage**([float](#language.types.float) $brightness, [float](#language.types.float) $saturation, [float](#language.types.float) $hue): [bool](#language.types.boolean)

Permite controlar el brillo, la saturación y el tono de una imagen. El tono
es el porcentaje de la rotación absoluta desde la posición actual. Por
ejemplo, 50 resulta en una rotación en el sentido contrario a las agujas del reloj
de 90 grados, 150 resulta en una rotación en el sentido de las agujas del reloj de
90 grados, con 0 y 200 resultando en una rotación de 180 grados.

### Parámetros

     brightness








     saturation








     hue







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::modulateImage()**



      &lt;?php

function modulateImage($imagePath, $hue, $brightness, $saturation) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;modulateImage($brightness, $saturation, $hue);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::montageImage

(PECL imagick 2, PECL imagick 3)

Imagick::montageImage — Crea una imagen compuesta

### Descripción

public **Imagick::montageImage**(
    [ImagickDraw](#class.imagickdraw) $draw,
    [string](#language.types.string) $tile_geometry,
    [string](#language.types.string) $thumbnail_geometry,
    [int](#language.types.integer) $mode,
    [string](#language.types.string) $frame
): [Imagick](#class.imagick)

Crea una imagen compuesta combinando varias imágenes.
Las imágenes se utilizan como baldosas en la imagen compuesta,
con su nombre opcionalmente debajo.

### Parámetros

     draw


       El nombre de la fuente, el tamaño y el color se solicitan a este objeto.






     tile_geometry


       El número de baldosas por filas y por página (ej. 6x4+0+0).






     thumbnail_geometry


       El tamaño solicitado para la imagen y su borde para cada miniatura
       (ej. 120x120+4+3).






     mode


       El modo de encuadre de las miniaturas. Consulte la lista de [constantes de modo de montaje](#imagick.constants.montagemode).






     frame


       Encuadra la imagen con un borde decorativo (ej. 15x15+3+3). La
       color del borde es el color mate de la miniatura.





### Valores devueltos

Crea una imagen compuesta y la devuelve como un nuevo objeto
[Imagick](#class.imagick).

# Imagick::morphImages

(PECL imagick 2, PECL imagick 3)

Imagick::morphImages — Metamorfosea un conjunto de imágenes

### Descripción

public **Imagick::morphImages**([int](#language.types.integer) $number_frames): [Imagick](#class.imagick)

Metamorfosea un conjunto de imágenes. Los píxeles de la imagen y el tamaño
son interpolados linealmente para dar la apariencia de una
metamorfosis desde una imagen a la siguiente.

### Parámetros

     number_frames


       El número de imágenes intermedias a generar.





### Valores devueltos

Este método devuelve un nuevo objeto Imagick si se tuvo éxito.
Emite una excepción
[ImagickException](#class.imagickexception) en caso de fallo.

# Imagick::morphology

(PECL imagick 3 &gt;= 3.3.0)

Imagick::morphology — Aplica un núcleo personalizado a la imagen según el método de morfología dado

### Descripción

public **Imagick::morphology**(
    [int](#language.types.integer) $morphologyMethod,
    [int](#language.types.integer) $iterations,
    [ImagickKernel](#class.imagickkernel) $ImagickKernel,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)

Aplica un núcleo personalizado a la imagen según el método de morfología dado.

### Parámetros

    morphologyMethod


      Qué método de morfología utilizar entre las constantes \Imagick::MORPHOLOGY_*.






    iterations


      El número de iteraciones a aplicar a la función de morfología. Un valor de -1 significa iterar hasta que no se encuentren más cambios. Cómo se aplica esto puede depender del método de morfología. Típicamente, se trata de un valor de 1.






    ImagickKernel








    channel




### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1 Convolución Imagick::morphology()**



      &lt;?php
        $imagick = $this-&gt;getCharacter();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_GAUSSIAN, "5,1");
        $imagick-&gt;morphology(\Imagick::MORPHOLOGY_CONVOLVE, 2, $kernel);
        header("Content-Type: image/png");
        echo $imagick-&gt;getImageBlob();

?&gt;

      **Ejemplo #2 Correlación Imagick::morphology()**



      &lt;?php
        // El píxel en la esquina superior izquierda debe ser negro
        // El píxel en la esquina inferior derecha debe ser blanco
        // El resto no importa.

        $imagick = $this-&gt;getCharacterOutline();
        $kernel = \ImagickKernel::fromMatrix(self::$correlateMatrix, [2, 2]);
        $imagick-&gt;morphology(\Imagick::MORPHOLOGY_CORRELATE, 1, $kernel);
        header("Content-Type: image/png");
        echo $imagick-&gt;getImageBlob();

?&gt;

      **Ejemplo #3 Erosión Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_ERODE, 2, $kernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #4 Erosión de intensidad Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacter();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "1");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_ERODE_INTENSITY, 2, $kernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #5 Dilatación Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_DILATE, 4, $kernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #6 Dilatación de intensidad Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacter();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "1");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_DILATE_INTENSITY, 4, $kernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #7 Distancia con núcleo de Chebyshev Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_CHEBYSHEV, "3");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas-&gt;autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #8 Distancia con núcleo de Manhattan Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_MANHATTAN, "5");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas-&gt;autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #9 Distancia con núcleo octagonal Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGONAL, "5");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas-&gt;autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #10 Distancia con núcleo euclidiano Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_EUCLIDEAN, "4");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_DISTANCE, 3, $kernel);
        $canvas-&gt;autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #11 Borde Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_EDGE, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #12 Apertura Imagick::morphology()**



      &lt;?php
        // Como consecuencia, se verá que 'Apertura' ha suavizado el contorno, redondeando los puntos salientes y eliminando las partes más pequeñas que la forma utilizada. También desconectará o 'abrirá' los puentes delgados.
        $canvas = $this-&gt;getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "6");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_OPEN, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #13 Apertura de intensidad Imagick::morphology()**



      &lt;?php
        // Como consecuencia, se verá que 'Apertura' ha suavizado el contorno, redondeando los puntos salientes y eliminando las partes más pequeñas que la forma utilizada. También desconectará o 'abrirá' los puentes delgados.
        $canvas = $this-&gt;getCharacter();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "6");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_OPEN_INTENSITY, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #14 Cierre Imagick::morphology()**



      &lt;?php
        //El uso básico del método 'Cierre' es reducir o eliminar los 'huecos' o 'lagunas' aproximadamente del tamaño del elemento de estructura del núcleo. Es decir, 'cerrar' las partes del fondo que son aproximadamente de ese tamaño.
        $canvas = $this-&gt;getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "6");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_CLOSE, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #15 Cierre de intensidad Imagick::morphology()**



      &lt;?php
        //El uso básico del método 'Cierre' es reducir o eliminar los 'huecos' o 'lagunas' aproximadamente del tamaño del elemento de estructura del núcleo. Es decir, 'cerrar' las partes del fondo que son aproximadamente de ese tamaño.
        $canvas = $this-&gt;getCharacter();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "6");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_CLOSE_INTENSITY, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #16 Suavizado Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_SMOOTH, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #17 Borde interior Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_EDGE_IN, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #18 Borde exterior Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "3");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_EDGE_OUT, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #19 El método 'TopHat', o más específicamente 'White Top Hat', devuelve los píxeles que han sido eliminados por una Apertura de la forma, es decir, los píxeles que han sido eliminados para redondear los puntos y los puentes de conexión entre las formas. Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "5");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_TOP_HAT, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #20 El método 'BottomHat', también conocido como 'Black TopHat', son los píxeles que un Cierre de la forma añade a la imagen. Es decir, los píxeles que han sido utilizados para rellenar los 'huecos', las 'lagunas' y los 'puentes'. Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "5");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_BOTTOM_HAT, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #21 Golpe y fallo Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        //Esto encuentra todos los píxeles con 3 píxeles del borde derecho
        $matrix = [[1, false, false, 0]];
        $kernel = \ImagickKernel::fromMatrix(
            $matrix,
            [0, 0]
        );
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_HIT_AND_MISS, 1, $kernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #22 Afinamiento Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        $leftEdgeKernel = \ImagickKernel::fromMatrix([[0, 1]], [1, 0]);
        $rightEdgeKernel = \ImagickKernel::fromMatrix([[1, 0]], [0, 0]);
        $leftEdgeKernel-&gt;addKernel($rightEdgeKernel);

        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_THINNING, 3, $leftEdgeKernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #23 Engrosamiento Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        $leftEdgeKernel = \ImagickKernel::fromMatrix([[0, 1]], [1, 0]);
        $rightEdgeKernel = \ImagickKernel::fromMatrix([[1, 0]], [0, 0]);
        $leftEdgeKernel-&gt;addKernel($rightEdgeKernel);

        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_THICKEN, 3, $leftEdgeKernel);
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #24 Afinamiento para generar una cáscara convexa Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        $diamondKernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DIAMOND, "1");
        $convexKernel =  \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_CONVEX_HULL, "");

        // La morfología de afinamiento no maneja los pequeños espacios. Los cerramos
        // con la morfología de cierre.
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_CLOSE, 1, $diamondKernel);
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_THICKEN, -1, $convexKernel);
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_CLOSE, 1, $diamondKernel);

        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #25 Morfología iterativa Imagick::morphology()**



      &lt;?php
        $canvas = $this-&gt;getCharacterOutline();
        $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DISK, "2");
        $canvas-&gt;morphology(\Imagick::MORPHOLOGY_ITERATIVE, 3, $kernel);
        $canvas-&gt;autoLevelImage();
        header("Content-Type: image/png");
        echo $canvas-&gt;getImageBlob();

?&gt;

      **Ejemplo #26 Función de ayuda para obtener un contorno de imagen Imagick::morphology()**




&lt;?php
function getCharacterOutline() {
$imagick = new \Imagick(realpath("./images/character.png"));
$character = new \Imagick();
$character-&gt;newPseudoImage(
$imagick-&gt;getImageWidth(),
$imagick-&gt;getImageHeight(),
"canvas:white"
);
$canvas = new \Imagick();
$canvas-&gt;newPseudoImage(
$imagick-&gt;getImageWidth(),
$imagick-&gt;getImageHeight(),
"canvas:black"
);

    $character-&gt;compositeimage(
        $imagick,
        \Imagick::COMPOSITE_COPYOPACITY,
        0, 0
    );
    $canvas-&gt;compositeimage(
        $character,
        \Imagick::COMPOSITE_ATOP,
        0, 0
    );
    $canvas-&gt;setFormat('png');

    return $canvas;

}
?&gt;

# Imagick::mosaicImages

(PECL imagick 2, PECL imagick 3)

Imagick::mosaicImages — Forma una mosaico de imágenes

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::mosaicImages**(): [Imagick](#class.imagick)

Alinea las imágenes de una secuencia para formar una sola imagen
coherente. La función devuelve una baguette con cada
imagen de la secuencia, en el lugar del desplazamiento de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::motionBlurImage

(PECL imagick 2, PECL imagick 3)

Imagick::motionBlurImage — Simula borrosidad en movimiento

### Descripción

public **Imagick::motionBlurImage**(
    [float](#language.types.float) $radius,
    [float](#language.types.float) $sigma,
    [float](#language.types.float) $angle,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)

Simula borrosidad en movimiento. Se convoluciona la imagen con un operador
gaussiano del radio y la desviación estándar (sigma) dados.
Para obtener resultados razonables, el radio debe ser mayor que sigma.
Use un radio de 0 y MotionBlurImage() seleccionará un radio
apropiado automáticamente. El ángulo da el ángulo del movimiento borroso.

### Parámetros

     radius


       El radio gaussiano, en píxeles, sin contar el píxel central.






     sigma


       La desviación estándar gaussiana, en píxeles.






     angle


       Aplica el efecto a lo largo de este ángulo.






     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#imagick.constants.channel).
       El argumento channel afecta sólo si Imagick es compilado con la versión 6.4.4 o superior de
       ImageMagick.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::motionBlurImage()**



      &lt;?php

function motionBlurImage($imagePath, $radius, $sigma, $angle, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;motionBlurImage($radius, $sigma, $angle, $channel);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::negateImage

(PECL imagick 2, PECL imagick 3)

Imagick::negateImage — Invierte los colores en la imagen de referencia

### Descripción

public **Imagick::negateImage**([bool](#language.types.boolean) $gray, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Invierte los colores en la imagen de referencia. La opción de escala de grises
significa que sólo los valores de la escala de grises dentro de la imagen
se inverten.

### Parámetros

     gray


       Si sólo se invierten los píxeles de la escala de grises dentro de la imagen.






     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#imagick.constants.channel).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::negateImage()**



      &lt;?php

function negateImage($imagePath, $grayOnly, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;negateImage($grayOnly, $channel);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::newImage

(PECL imagick 2, PECL imagick 3)

Imagick::newImage — Crea una nueva imagen

### Descripción

public **Imagick::newImage**(
    [int](#language.types.integer) $cols,
    [int](#language.types.integer) $rows,
    [mixed](#language.types.mixed) $background,
    [string](#language.types.string) $format = ?
): [bool](#language.types.boolean)

Crea una nueva imagen y asocia el valor de ImagickPixel al color de fondo

### Parámetros

     cols


       Columnas en la nueva imagen






     rows


       Filas en la nueva imagen






     background


       El color de fondo usado para esta imagen






     format


       El formato de la imagen. Este parámetro se añadió en la versión 2.0.1 de Imagick.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Ahora se permite que una cadena represente el color como tercer parámetro
        Versiones anteriores sólo permitían un objeto ImagickPixel.





### Ejemplos

    **Ejemplo #1 Usar Imagick::newImage()**:



     Crear una nueva imagen y mostrarla.

&lt;?php

$imagen = new Imagick();
$imagen-&gt;newImage(100, 100, new ImagickPixel('red'));
$imagen-&gt;setImageFormat('png');

header('Content-type: image/png');
echo $imagen;

?&gt;

# Imagick::newPseudoImage

(PECL imagick 2, PECL imagick 3)

Imagick::newPseudoImage — Crea una nueva imagen

### Descripción

public **Imagick::newPseudoImage**([int](#language.types.integer) $columns, [int](#language.types.integer) $rows, [string](#language.types.string) $pseudoString): [bool](#language.types.boolean)

Crea una nueva imagen usando pseudo-formatos de ImageMagick.

### Parámetros

     columns


       columnas en la nueva imagen






     rows


       filas en la nueva imagen






     pseudoString


       string que contiene la definición de la pseudo-imagen.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::newPseudoImage()**



      &lt;?php

function newPseudoImage($canvasType) {
$imagick = new \Imagick();
$imagick-&gt;newPseudoImage(300, 300, $canvasType);
$imagick-&gt;setImageFormat("png");
header("Content-Type: image/png");
echo $imagick-&gt;getImageBlob();
}

//newPseudoImage('gradient:red-rgba(64, 255, 255, 0.5)');
//newPseudoImage("radial-gradient:red-blue");
newPseudoImage("plasma:fractal");

?&gt;

# Imagick::nextImage

(PECL imagick 2, PECL imagick 3)

Imagick::nextImage — Pasa a la siguiente imagen

### Descripción

public **Imagick::nextImage**(): [bool](#language.types.boolean)

Pasa a la siguiente imagen en la lista del objeto Imagick.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::normalizeImage

(PECL imagick 2, PECL imagick 3)

Imagick::normalizeImage — Mejora el contraste de una imagen a color

### Descripción

public **Imagick::normalizeImage**([int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Mejora el contraste de una imagen a color ajustando los colores de los
píxeles para abarcar el rango completo de colores disponibles.

### Parámetros

     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#imagick.constants.channel).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::normalizeImage()**



      &lt;?php

function normalizeImage($imagePath, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
$original = clone $imagick;
    $original-&gt;cropimage($original-&gt;getImageWidth() / 2, $original-&gt;getImageHeight(), 0, 0);
    $imagick-&gt;normalizeImage($channel);
$imagick-&gt;compositeimage($original, \Imagick::COMPOSITE_ATOP, 0, 0);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::oilPaintImage

(PECL imagick 2, PECL imagick 3)

Imagick::oilPaintImage — Simula una pintura al óleo

### Descripción

public **Imagick::oilPaintImage**([float](#language.types.float) $radius): [bool](#language.types.boolean)

Aplica un filtro de efecto especial que simula una pintura al óleo.
Cada píxel es reemplazado por el color más frecuente que suceda en una
región circular definida por el radio.

### Parámetros

     radius


       El radio de la zona circular inmediata.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::oilPaintImage()**



      &lt;?php

function oilPaintImage($imagePath, $radius) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;oilPaintImage($radius);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::opaquePaintImage

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::opaquePaintImage — Cambia el color de cualquier píxel que coincida con el objetivo

### Descripción

public **Imagick::opaquePaintImage**(
    [mixed](#language.types.mixed) $target,
    [mixed](#language.types.mixed) $fill,
    [float](#language.types.float) $fuzz,
    [bool](#language.types.boolean) $invert,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)

Cambia cualquier píxel que coincida con el color definido para el relleno.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.8 o superior.

### Parámetros

     target


       Objeto ImagickPixel o una cadena que contiene el color a cambiar






     fill


       El color sustituto






     fuzz


       La cantidad de polvo de papel. Por ejemplo, definir el polvo de papel a 10 y el color rojo a una intensidad de 100 y 102 no será interpretado como el mismo color.






     invert


       Si es **[true](#constant.true)** pinta cualquier píxel que no coincida con el color objetivo.






     channel


       Proporciona una constante de canal válida para su modo de canal. Para aplicarlo a más de un canal, combínense las [constantes de canales](#imagick.constants.channel) utilizando un operador a nivel de bits. Por omisión, vale **[Imagick::CHANNEL_DEFAULT](#imagick.constants.channel-default)**. Consúltese la lista de [constantes de canales](#imagick.constants.channel)





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::optimizeImageLayers

(PECL imagick 2, PECL imagick 3)

Imagick::optimizeImageLayers — Elimina las porciones recurrentes de imágenes a optimizar

### Descripción

public **Imagick::optimizeImageLayers**(): [bool](#language.types.boolean)

Compara cada imagen GIF con la anterior en la secuencia. A partir
de ahí, el método intenta seleccionar la parte más pequeña de la imagen
a reemplazar en cada imagen, manteniendo los resultados de la animación.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::optimizeImageLayers()**



      Lectura, optimización y escritura de una imagen GIF

&lt;?php
/_ creación de un nuevo objeto imagick _/
$im = new Imagick("test.gif");

/_ optimización de las capas _/
$im-&gt;optimizeImageLayers();

/_ escritura de la imagen _/
$im-&gt;writeImages("test_optimized.gif", true);
?&gt;

### Ver también

    - [Imagick::compareImageLayers()](#imagick.compareimagelayers) - Devuelve la región circundante máxima entre imágenes

    - [Imagick::writeImages()](#imagick.writeimages) - Escribe una imagen o secuencia de imágenes

    - [Imagick::writeImage()](#imagick.writeimage) - Escribe una imagen al nombre de fichero especificado

# Imagick::orderedPosterizeImage

(PECL imagick 2 &gt;= 2.2.2, PECL imagick 3)

Imagick::orderedPosterizeImage — Realiza un entramado ordenado

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::orderedPosterizeImage**([string](#language.types.string) $threshold_map, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

    Realiza un entramado ordenado basado en varios mapas de umbral de entramado predefinidos,
    pero sobre múltiples niveles de intensidad, lo que puede ser diferente para distintos canales,
    según los argumentos de entrada. Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.1 o superior.

### Parámetros

     threshold_map


        Un string que contiene el nombre del mapa de umbral de entramado que se va a usar






     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#imagick.constants.channel).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::orderedPosterizeImage()**



      &lt;?php

function orderedPosterizeImage($imagePath, $orderedPosterizeType) {
    $imagick = new \Imagick(realpath($imagePath));

    $imagick-&gt;orderedPosterizeImage($orderedPosterizeType);
    $imagick-&gt;setImageFormat('png');

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

//orderedPosterizeImage($imagePath, 'o4x4,3,3');
//orderedPosterizeImage($imagePath, 'o8x8,6,6');
orderedPosterizeImage($imagePath, 'h8x8a');

?&gt;

# Imagick::paintFloodfillImage

(PECL imagick 2 &gt;= 2.1.0, PECL imagick 3)

Imagick::paintFloodfillImage — Cambia el valor del color de cualquier píxel que coincida con el objetivo

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::paintFloodfillImage**(
    [mixed](#language.types.mixed) $fill,
    [float](#language.types.float) $fuzz,
    [mixed](#language.types.mixed) $bordercolor,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)

Cambia el valor del color de cualquier píxel que coincida con el objetivo y esté en
la zona inmediata. A partir de ImageMagick 6.3.8 este método está obsoleto
y se debería usar [Imagick::floodfillPaintImage()](#imagick.floodfillpaintimage) en su lugar.

### Parámetros

     fill


       Objeto ImagickPixel o un string que contiene el color de relleno






     fuzz


       La cantidad de enfoque. Por ejemplo, establecer el enfoque a 10 y el color a rojo con una
       intensidad de 100 y 102 respectivamente ahora se interpreta como el
       mismo color para los propósitos del relleno.






     bordercolor


       Objeto ImagickPixel que contiene el color de borde






     x


       Posición X del inicio del relleno






     y


       Posición Y del inicio del relleno






     channel


       Proporciona una constante de canal válida para su modo de canal. Para aplicarlo a más de un canal, combínense las [constantes de canales](#imagick.constants.channel) utilizando un operador a nivel de bits. Por omisión, vale **[Imagick::CHANNEL_DEFAULT](#imagick.constants.channel-default)**. Consúltese la lista de [constantes de canales](#imagick.constants.channel)





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::paintOpaqueImage

(PECL imagick 2, PECL imagick 3)

Imagick::paintOpaqueImage — Cambia cualquier píxel que coincida con el color

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::paintOpaqueImage**(
    [mixed](#language.types.mixed) $target,
    [mixed](#language.types.mixed) $fill,
    [float](#language.types.float) $fuzz,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)

Cambia cualquier píxel que coincida con el color definido por el relleno.

### Parámetros

     target


       Cambia este color objetivo por el color de relleno de la imagen. Un
       objeto ImagickPixel o una cadena que representa el color objetivo.






     fill


       Un objeto ImagickPixel o un string que representa el color de relleno.






     fuzz


       El miembro enfoque de la imagen define cúanta tolerancia es aceptable para
       considerar que dos colores son el mismo.






     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#imagick.constants.channel).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Ahora se permite que una cadena represente el color como primer y segundo parámetros.
        Versiones anteriores sólo permitían un objeto ImagickPixel.





# Imagick::paintTransparentImage

(PECL imagick 2, PECL imagick 3)

Imagick::paintTransparentImage — Cambia cualquier píxel que coincida con el color definido para el relleno

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::paintTransparentImage**([mixed](#language.types.mixed) $target, [float](#language.types.float) $alpha, [float](#language.types.float) $fuzz): [bool](#language.types.boolean)

Cambia cualquier píxel que coincida con el color definido para el relleno.

### Parámetros

     target


       Cambia este color objetivo por el valor de opacidad especificado dentro de la imagen.






     alpha


       El nivel de transparencia: 1.0 es completamente opaco y 0.0 es completamente
       transparente.






     fuzz


       El miembro enfoque de la imagen define cuánta tolerancia es aceptable para
       considerar que dos colores son el mismo.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Ahora se permite que una cadena represente el color como primer parámetro.
        Versiones anteriores sólo permitían un objeto ImagickPixel.





# Imagick::pingImage

(PECL imagick 2, PECL imagick 3)

Imagick::pingImage — Trae los atributos básicos de una imagen

### Descripción

public **Imagick::pingImage**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Este método se puede usar para preguntar por el ancho, alto, tamaño y formato de la imagen
sin leer toda la imagen de la memoria.

### Parámetros

     filename


       El nombre de fichero de donde se va a leer la información.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::pingImageBlob

(PECL imagick 2, PECL imagick 3)

Imagick::pingImageBlob — Traer los atributos rápidamente

### Descripción

public **Imagick::pingImageBlob**([string](#language.types.string) $image): [bool](#language.types.boolean)

Este método se puede usar para preguntar por el ancho, alto, tamaño y formato de la imagen
sin leer toda la imagen de la memoria.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

     image


       Un string que contiene la imagen.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Usar Imagick::pingImageBlob()**



     Hacer ping a una imagen desde un string

&lt;?php
/_ leer el contenido de la imagen _/
$imagen = file_get_contents("prueba.jpg");

/_ crear un nuevo objeto imagick _/
$im = new Imagick();

/_ pasar el string al objeto imagick _/
$im-&gt;pingImageBlob($imagen);

/_ imprimir el ancho y alto de la image _/
echo $im-&gt;getImageWidth() . 'x' . $im-&gt;getImageHeight();
?&gt;

### Ver también

    - [Imagick::pingImage()](#imagick.pingimage) - Trae los atributos básicos de una imagen

    - [Imagick::pingImageFile()](#imagick.pingimagefile) - Obtener los atrbutos básicos de la imagen de una manera liviana

    - [Imagick::readImage()](#imagick.readimage) - Lee una imagen desde un nombre de fichero

    - [Imagick::readImageBlob()](#imagick.readimageblob) - Lee una imagen desde un string binario

    - [Imagick::readImageFile()](#imagick.readimagefile) - Lee una imagen desde un gestor de fichero abierto

# Imagick::pingImageFile

(PECL imagick 2, PECL imagick 3)

Imagick::pingImageFile — Obtener los atrbutos básicos de la imagen de una manera liviana

### Descripción

public **Imagick::pingImageFile**([resource](#language.types.resource) $filehandle, [string](#language.types.string) $fileName = ?): [bool](#language.types.boolean)

Este método se puede usar para preguntar por el ancho, alto, tamaño y formato de la imagen
sin leer toda la imagen de la memoria.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

     filehandle


       Un gestor de archivo abierto a la imagen.






     fileName


       Nombre de archivo opcional para esta imagen.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Usar Imagick::pingImageFile()**



      Abrir una ubicación remota

&lt;?php
/_ usar fopen para abrir una ubicación remota _/
$fp = fopen("http://example.com/test.jpg");

/_ crear un nuevo objeto imagick _/
$im = new Imagick();

/_ pasar el gestor a imagick _/
$im-&gt;pingImageFile($fp);
?&gt;

### Ver también

    - [Imagick::pingImage()](#imagick.pingimage) - Trae los atributos básicos de una imagen

    - [Imagick::pingImageBlob()](#imagick.pingimageblob) - Traer los atributos rápidamente

    - [Imagick::readImage()](#imagick.readimage) - Lee una imagen desde un nombre de fichero

    - [Imagick::readImageBlob()](#imagick.readimageblob) - Lee una imagen desde un string binario

    - [Imagick::readImageFile()](#imagick.readimagefile) - Lee una imagen desde un gestor de fichero abierto

# Imagick::polaroidImage

(PECL imagick 2, PECL imagick 3)

Imagick::polaroidImage — Simula una fotografía Polaroid

### Descripción

public **Imagick::polaroidImage**([ImagickDraw](#class.imagickdraw) $properties, [float](#language.types.float) $angle): [bool](#language.types.boolean)

Simula una fotografía Polaroid. Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.2 o superior.

### Parámetros

     properties


       Las propiedades de polaroid






     angle


       El ángulo de polaroid





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Un ejemplo de Imagick::polaroidImage()**



     Un ejemplo usando Imagick::polaroidImage()

&lt;?php
/_ Crear el objeto _/
$imagen = new Imagick('fuente.png');

/_ Establecer la opacidad _/
$imagen-&gt;polaroidImage(new ImagickDraw(), 25);

/_ Imprimir la imagen _/
header('Content-type: image/png');
echo $imagen;

?&gt;

# Imagick::posterizeImage

(PECL imagick 2, PECL imagick 3)

Imagick::posterizeImage — Reduce la imagen a un número limitado de niveles de color

### Descripción

public **Imagick::posterizeImage**([int](#language.types.integer) $levels, [bool](#language.types.boolean) $dither): [bool](#language.types.boolean)

Reduce la imagen a un número limitado de niveles de color.

### Parámetros

     levels








     dither







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::posterizeImage()**



      &lt;?php

function posterizeImage($imagePath, $posterizeType, $numberLevels) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;posterizeImage($numberLevels, $posterizeType);
$imagick-&gt;setImageFormat('png');
header("Content-Type: image/png");
echo $imagick-&gt;getImageBlob();
}

posterizeImage($imagePath, \Imagick::DITHERMETHOD_RIEMERSMA, 8);

?&gt;

# Imagick::previewImages

(PECL imagick 2, PECL imagick 3)

Imagick::previewImages — Precisa rápidamente los parámetros apropiados para el procesamiento de la imagen

### Descripción

public **Imagick::previewImages**([int](#language.types.integer) $preview): [bool](#language.types.boolean)

Crea un mosaico de 9 miniaturas de la imagen especificada con la operación de proceso de
imágenes aplicada en varias intensidades. Esto es de útil para precisar
rápidamente un parámetro apropiado para una operación de proceso de imágenes.

### Parámetros

     preview


       Tipo de previsualización. Véase [constantes de tipos
       de previsualización](#imagick.constants.preview)





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::previousImage

(PECL imagick 2, PECL imagick 3)

Imagick::previousImage — Pasa a la imagen anterior en una secuencia de imágenes

### Descripción

public **Imagick::previousImage**(): [bool](#language.types.boolean)

Pasa a la imagen anterior en una secuencia de imágenes Imagick.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::profileImage

(PECL imagick 2, PECL imagick 3)

Imagick::profileImage — Añade o elimina un perfil de una imagen

### Descripción

public **Imagick::profileImage**([string](#language.types.string) $name, [string](#language.types.string) $profile = ?): [bool](#language.types.boolean)

Añade o elimina un perfil ICC, IPTC o genérico de una imagen.
Si el perfil es **[null](#constant.null)**, se elimina de la imagen, y de lo contrario,
se añade. Utilice el nombre '\*' y un perfil **[null](#constant.null)** para
eliminar todos los perfiles de una imagen.

### Parámetros

     name








     profile







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::quantizeImage

(PECL imagick 2, PECL imagick 3)

Imagick::quantizeImage — Analiza los colores dentro de una imagen de referencia

### Descripción

public **Imagick::quantizeImage**(
    [int](#language.types.integer) $numberColors,
    [int](#language.types.integer) $colorspace,
    [int](#language.types.integer) $treedepth,
    [bool](#language.types.boolean) $dither,
    [bool](#language.types.boolean) $measureError
): [bool](#language.types.boolean)

### Parámetros

     numberColors








     colorspace








     treedepth








     dither








     measureError







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::quantizeImage()**



      &lt;?php

function quantizeImage($imagePath, $numberColors, $colorSpace, $treeDepth, $dither) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;quantizeImage($numberColors, $colorSpace, $treeDepth, $dither, false);
$imagick-&gt;setImageFormat('png');
header("Content-Type: image/png");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::quantizeImages

(PECL imagick 2, PECL imagick 3)

Imagick::quantizeImages — Analiza los colores dentro de una secuencia de imágenes

### Descripción

public **Imagick::quantizeImages**(
    [int](#language.types.integer) $numberColors,
    [int](#language.types.integer) $colorspace,
    [int](#language.types.integer) $treedepth,
    [bool](#language.types.boolean) $dither,
    [bool](#language.types.boolean) $measureError
): [bool](#language.types.boolean)

### Parámetros

     numberColors








     colorspace








     treedepth








     dither








     measureError







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::queryFontMetrics

(PECL imagick 2, PECL imagick 3)

Imagick::queryFontMetrics — Devuelve una matriz que representa las métricas de la fuente

### Descripción

public **Imagick::queryFontMetrics**([ImagickDraw](#class.imagickdraw) $properties, [string](#language.types.string) $text, [bool](#language.types.boolean) $multiline = ?): [array](#language.types.array)

Devuelve un array multidimensional que representa las métricas de la fuente.

### Parámetros

     properties


      Objeto ImagickDraw que contiene las propiedades de la fuente






     text


       El texto






     multiline


       Parámetro multilínea. Si se deja vacío se autodetecta





### Valores devueltos

Devuelve un array multidimensional que representa las métricas de la fuente.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Usar Imagick::queryFontMetrics()**:



     Preguntar por las métricas del texto y verter los resultados en la pantalla.

&lt;?php
/_ Crear un nuevo objeto Imagick _/
$im = new Imagick();

/_ Crear un objeto ImagickDraw _/
$draw = new ImagickDraw();

/_ Establecer la fuente _/
$draw-&gt;setFont('/path/to/font.ttf');

/_ Verter las métricas de la fuente, autodetectado multilínea _/
var_dump($im-&gt;queryFontMetrics($draw, "¡Hola Mundo!"));
?&gt;

# Imagick::queryFonts

(PECL imagick 2, PECL imagick 3)

Imagick::queryFonts — Devuelve la lista de fuentes configuradas

### Descripción

public static **Imagick::queryFonts**([string](#language.types.string) $pattern = "\*"): [array](#language.types.array)

Devuelve la lista de fuentes configuradas para Imagick.

### Parámetros

     pattern


       El patrón de búsqueda





### Valores devueltos

Devuelve un array que contiene las fuentes configuradas.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1 Ejemplo con Imagick::queryFonts()**



      &lt;?php
        $output = '';
        $output .= "Las fuentes que coinciden con 'Helvetica*' son:&lt;br/&gt;";

        $fontList = \Imagick::queryFonts("Helvetica*");

        foreach ($fontList as $fontName) {
            $output .= '&lt;li&gt;'. $fontName."&lt;/li&gt;";
        }

        return $output;

?&gt;

# Imagick::queryFormats

(PECL imagick 2, PECL imagick 3)

Imagick::queryFormats — Devuelve los formatos soportados por Imagick

### Descripción

public static **Imagick::queryFormats**([string](#language.types.string) $pattern = "\*"): [array](#language.types.array)

Devuelve los formatos soportados por Imagick.

### Parámetros

     pattern







### Valores devueltos

Devuelve un array que contiene los formatos soportados por Imagick.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::queryFormats()**

&lt;?php
function render() {
$output = "";
$input = \Imagick::queryformats();
$columns = 6;

        $output .= "&lt;table border='2'&gt;";

        for ($i=0; $i &lt; count($input); $i += $columns) {
            $output .= "&lt;tr&gt;";
            for ($c=0; $c&lt;$columns; $c++) {
                $output .= "&lt;td&gt;";
                if (($i + $c) &lt;  count($input)) {
                    $output .= $input[$i + $c];
                }
                $output .= "&lt;/td&gt;";
            }
            $output .= "&lt;/tr&gt;";
        }

        $output .= "&lt;/table&gt;";

        return $output;
    }

?&gt;

# Imagick::radialBlurImage

(PECL imagick 2, PECL imagick 3)

Imagick::radialBlurImage — Hace borrosa de forma radial una imagen

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::radialBlurImage**([float](#language.types.float) $angle, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Hace borrosa de forma radial una imagen.

### Parámetros

     angle








     channel







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::radialBlurImage()**



      &lt;?php

function radialBlurImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
//Blur 3 times with different radii
$imagick-&gt;radialBlurImage(3);
$imagick-&gt;radialBlurImage(5);
$imagick-&gt;radialBlurImage(7);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::raiseImage

(PECL imagick 2, PECL imagick 3)

Imagick::raiseImage — Crea un efecto de botón en 3D simulado

### Descripción

public **Imagick::raiseImage**(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [bool](#language.types.boolean) $raise
): [bool](#language.types.boolean)

Crea un efecto de botón tridimensional simulado
aclarando y oscureciendo los bordes de la imagen.
Los miembros ancho y alto de la información de elevación definen el ancho
del borde vertical y horizontal del efecto.

### Parámetros

     width








     height








     x








     y








     raise







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::raiseImage()**



      &lt;?php

function raiseImage($imagePath, $width, $height, $x, $y, $raise) {
    $imagick = new \Imagick(realpath($imagePath));

    //x and y do nothing?
    $imagick-&gt;raiseImage($width, $height, $x, $y, $raise);
    header("Content-Type: image/jpg");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::randomThresholdImage

(PECL imagick 2, PECL imagick 3)

Imagick::randomThresholdImage — Crea una imagen de alto contraste y dos colores

### Descripción

public **Imagick::randomThresholdImage**([float](#language.types.float) $low, [float](#language.types.float) $high, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Cambia el valor de píxeles individuales basados en la
instensidad de cada píxel comparado con el umbral. El
resultado es una imagen de alto contraste y dos colores. Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

     low


       El punto bajo






     high


       El punto alto






     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#imagick.constants.channel).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::randomThresholdImage()**



      &lt;?php

function randomThresholdimage($imagePath, $lowThreshold, $highThreshold, $channel) {
    $imagick = new \Imagick(realpath($imagePath));

    $imagick-&gt;randomThresholdimage(
        $lowThreshold * \Imagick::getQuantum(),
        $highThreshold * \Imagick::getQuantum(),
        $channel
    );
    header("Content-Type: image/jpg");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::readImage

(PECL imagick 2, PECL imagick 3)

Imagick::readImage — Lee una imagen desde un nombre de fichero

### Descripción

public **Imagick::readImage**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Lee una imagen desde un nombre de fichero

### Parámetros

     filename







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::readImageBlob

(PECL imagick 2, PECL imagick 3)

Imagick::readImageBlob — Lee una imagen desde un string binario

### Descripción

public **Imagick::readImageBlob**([string](#language.types.string) $image, [string](#language.types.string) $filename = ?): [bool](#language.types.boolean)

Lee una imagen desde un string binario

### Parámetros

     image







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::readImageBlob()**



      &lt;?php

function readImageBlob() {
$base64 = "iVBORw0KGgoAAAANSUhEUgAAAM0AAAD
NCAMAAAAsYgRbAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5c
cllPAAAABJQTFRF3NSmzMewPxIG//ncJEJsldTou1jHgAAAARBJREFUeNrs2EEK
gCAQBVDLuv+V20dENbMY831wKz4Y/VHb/5RGQ0NDQ0NDQ0NDQ0NDQ0NDQ
0NDQ0NDQ0NDQ0NDQ0NDQ0NDQ0PzMWtyaGhoaGhoaGhoaGhoaGhoxtb0QGho
aGhoaGhoaGhoaGhoaMbRLEvv50VTQ9OTQ5OpyZ01GpM2g0bfmDQaL7S+ofFC6x
v3ZpxJiywakzbvd9r3RWPS9I2+MWk0+kbf0Hih9Y17U0nTHibrDDQ0NDQ0NDQ0
NDQ0NDQ0NTXbRSL/AK72o6GhoaGhoRlL8951vwsNDQ0NDQ1NDc0WyHtDTEhD
Q0NDQ0NTS5MdGhoaGhoaGhoaGhoaGhoaGhoaGhoaGposzSHAAErMwwQ2HwRQ
AAAAAElFTkSuQmCC";

    $imageBlob = base64_decode($base64);

    $imagick = new Imagick();
    $imagick-&gt;readImageBlob($imageBlob);

    header("Content-Type: image/png");
    echo $imagick;

}

?&gt;

# Imagick::readImageFile

(PECL imagick 2, PECL imagick 3)

Imagick::readImageFile — Lee una imagen desde un gestor de fichero abierto

### Descripción

public **Imagick::readImageFile**([resource](#language.types.resource) $filehandle, [string](#language.types.string) $fileName = **[null](#constant.null)**): [bool](#language.types.boolean)

Lee una imagen desde un gestor de fichero abierto

### Parámetros

     filehandle








     fileName







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::readImages

(PECL imagick 2, PECL imagick 3)

Imagick::readImages — Lee una imagen a partir de un array de nombres de ficheros

### Descripción

public **Imagick::readImages**([array](#language.types.array) $filenames): [bool](#language.types.boolean)

Lee una imagen a partir de un array de nombres de ficheros. Todas las imágenes se almacenan en un solo objeto Imagick.

### Parámetros

    filenames




### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::recolorImage

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::recolorImage — Recolorear la imagen

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::recolorImage**([array](#language.types.array) $matrix): [bool](#language.types.boolean)

Traduce, escala, recorta y rota los colores de la imagen.
Este método soporta matrices variables de escalado, pero normalmente,
se utiliza una matriz 5x5 para RGBA y una matriz 6x6 para CMYK.
La última línea debe contener los valores normalizados.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.

### Parámetros

     matrix


       La matriz que contiene los valores de los colores.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::recolorImage()**

&lt;?php
function recolorImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$remapColor = [ 1, 0, 0,
0, 0, 1,
0, 1, 0,];

//$remapColor = [
// 1.438, -0.122, -0.016, 0, 0, -0.03,
// -0.062, 1.378, -0.016, 0, 0, 0.05,
// -0.062, -0.122, 1.483, 0, 0, -0.02,
//];

    @$imagick-&gt;recolorImage($remapColor);

    header("Content-Type: image/jpg");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

### Ver también

    - [Imagick::displayImage()](#imagick.displayimage) - Muestra una imagen

# Imagick::reduceNoiseImage

(PECL imagick 2, PECL imagick 3)

Imagick::reduceNoiseImage — Suaviza los contornos de una imagen

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::reduceNoiseImage**([float](#language.types.float) $radius): [bool](#language.types.boolean)

Suaviza los contornos de una imagen mientras que se preserva todavía la información del
borde. El algoritmo funciona reemplazando cada píxel con su
más cercano inmediato en valor. La zona inmediata está definida por el radio.
Use un radio de 0 y Imagick::reduceNoiseImage() seleccionará
una radio apropiado automáticamente.

### Parámetros

     radius







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::reduceNoiseImage()**



      &lt;?php

function reduceNoiseImage($imagePath, $reduceNoise) {
    $imagick = new \Imagick(realpath($imagePath));
@$imagick-&gt;reduceNoiseImage($reduceNoise);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::remapImage

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::remapImage — Re-mapea los colores de una imagen

### Descripción

public **Imagick::remapImage**([Imagick](#class.imagick) $replacement, [int](#language.types.integer) $DITHER): [bool](#language.types.boolean)

Reemplaza los colores de una imagen con los definidos por el parámetro
replacement. Los colores son reemplazados con el color más cercano posible.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.5 o superior.

### Parámetros

     replacement


       Un objeto Imagick que contiene los colores sustitutos






     DITHER


       Consulte esta lista de
       [constantes de métodos de entramado](#imagick.constants.dithermethod)





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::removeImage

(PECL imagick 2, PECL imagick 3)

Imagick::removeImage — Elimina una imagen de la lista

### Descripción

public **Imagick::removeImage**(): [bool](#language.types.boolean)

Elimina una imagen de la lista.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::removeImageProfile

(PECL imagick 2, PECL imagick 3)

Imagick::removeImageProfile — Elimina el perfil nominado de la imagen y lo devuelve

### Descripción

public **Imagick::removeImageProfile**([string](#language.types.string) $name): [string](#language.types.string)

Elimina el perfil con nombre de la imagen y lo devuelve.

### Parámetros

     name







### Valores devueltos

Devuelve un string que contiene el perfil de la imagen.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::render

(PECL imagick 2, PECL imagick 3)

Imagick::render — Muestra todas las comandos de dibujo previas

### Descripción

public **Imagick::render**(): [bool](#language.types.boolean)

Muestra todas las comandos de dibujo previas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::resampleImage

(PECL imagick 2, PECL imagick 3)

Imagick::resampleImage — Remuestrea la imagen a la resolución deseada

### Descripción

public **Imagick::resampleImage**(
    [float](#language.types.float) $x_resolution,
    [float](#language.types.float) $y_resolution,
    [int](#language.types.integer) $filter,
    [float](#language.types.float) $blur
): [bool](#language.types.boolean)

Remuestrea la imagen a la resolución deseada.

### Parámetros

     x_resolution








     y_resolution








     filter








     blur







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::resampleImage()**



      &lt;?php

function resampleImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));

    $imagick-&gt;resampleImage(200, 200, \Imagick::FILTER_LANCZOS, 1);
    header("Content-Type: image/jpg");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::resetImagePage

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::resetImagePage — Reinicia una página de imagen

### Descripción

public **Imagick::resetImagePage**([string](#language.types.string) $page): [bool](#language.types.boolean)

La definición de página como un string. El string está en formato WxH+x+y (Ancho+Alto+x+y).
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.

### Parámetros

     page


       La definición de página. Por ejemplo 7168x5147+0+0





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::resizeImage

(PECL imagick 2, PECL imagick 3)

Imagick::resizeImage — Escala una imagen

### Descripción

public **Imagick::resizeImage**(
    [int](#language.types.integer) $columns,
    [int](#language.types.integer) $rows,
    [int](#language.types.integer) $filter,
    [float](#language.types.float) $blur,
    [bool](#language.types.boolean) $bestfit = **[false](#constant.false)**,
    [bool](#language.types.boolean) $legacy = **[false](#constant.false)**
): [bool](#language.types.boolean)

Escala una imagen a las dimensiones deseadas con un
[filtro](#imagick.constants.filters).

**Nota**:

    El comportamiento del parámetro bestfit cambió con Imagick 3.0.0.
    Antes de esta versión, proporcionar las dimensiones 400x400 a una imagen de dimensiones 200x150
    hacía que la parte izquierda permaneciera sin cambios. Con Imagick 3.0.0 y posteriores, la
    imagen se reduce al tamaño 400x300, siendo este el mejor resultado para esas dimensiones. Si el parámetro bestfit es utilizado, la anchura y la altura deben ser proporcionadas.

### Parámetros

     columns


       Ancho de la imagen






     rows


       Alto de la imagen






     filter


       Consulte la lista de [constantes de filtro](#imagick.constants.filters).






     blur


       El factor de borrosidad donde &gt; 1 es borroso, &lt; 1 es nítido.






     bestfit


       Parámetro de ajuste opcional.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Añadido el parámetro opcional de ajuste. Este método ahora soporta escalas proporcionales.
        Pase cero como parámetro para escalar proporcionalmente.





### Ejemplos

      **Ejemplo #1  Imagick::resizeImage()**



      &lt;?php

function resizeImage($imagePath, $width, $height, $filterType, $blur, $bestFit, $cropZoom) {
    //The blur factor where &gt; 1 is blurry, &lt; 1 is sharp.
    $imagick = new \Imagick(realpath($imagePath));

    $imagick-&gt;resizeImage($width, $height, $filterType, $blur, $bestFit);

    $cropWidth = $imagick-&gt;getImageWidth();
    $cropHeight = $imagick-&gt;getImageHeight();

    if ($cropZoom) {
        $newWidth = $cropWidth / 2;
        $newHeight = $cropHeight / 2;

        $imagick-&gt;cropimage(
            $newWidth,
            $newHeight,
            ($cropWidth - $newWidth) / 2,
            ($cropHeight - $newHeight) / 2
        );

        $imagick-&gt;scaleimage(
            $imagick-&gt;getImageWidth() * 4,
            $imagick-&gt;getImageHeight() * 4
        );
    }


    header("Content-Type: image/jpg");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::rollImage

(PECL imagick 2, PECL imagick 3)

Imagick::rollImage — Compensa una imagen

### Descripción

public **Imagick::rollImage**([int](#language.types.integer) $x, [int](#language.types.integer) $y): [bool](#language.types.boolean)

Compensa una imagen como está definido por x e y.

### Parámetros

     x


       El índice X.






     y


       El índice Y.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::rollImage()**



      &lt;?php

function rollImage($imagePath, $rollX, $rollY) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;rollimage($rollX, $rollY);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::rotateImage

(PECL imagick 2, PECL imagick 3)

Imagick::rotateImage — Rota una imagen

### Descripción

public **Imagick::rotateImage**([mixed](#language.types.mixed) $background, [float](#language.types.float) $degrees): [bool](#language.types.boolean)

Rota una imagen el número de grados especificado. Los triángulos
vacíos sobrantes por la rotación de la imagen se rellenan
con el color de fondo.

### Parámetros

     background


       El color de fondo






     degrees


       Ángulo de rotación, en grados. El ángulo de rotación se interpreta como el
       número de grados a rotar la imagen en sentido de las agujas del reloj.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Ahora se permite que una string represente el color como primer parámetro.
        Versiones anteriores sólo permitían un objeto ImagickPixel.





### Ejemplos

      **Ejemplo #1  Imagick::rotateImage()**



      &lt;?php

function rotateImage($imagePath, $angle, $color) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;rotateimage($color, $angle);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::rotationalBlurImage

(PECL imagick 3 &gt;= 3.3.0)

Imagick::rotationalBlurImage — Aplica un desenfoque rotacional a una imagen

### Descripción

public **Imagick::rotationalBlurImage**([float](#language.types.float) $angle, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Aplica un desenfoque rotacional a una imagen.

### Parámetros

    angle


      El ángulo sobre el cual aplicar el desenfoque.






    channel


      Proporciona una constante de canal válida para su modo de canal. Para aplicarlo a más de un canal, combínense las [constantes de canales](#imagick.constants.channel) utilizando un operador a nivel de bits. Por omisión, vale **[Imagick::CHANNEL_DEFAULT](#imagick.constants.channel-default)**. Consúltese la lista de [constantes de canales](#imagick.constants.channel)


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::rotationalBlurImage()**



      &lt;?php

function rotationalBlurImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;rotationalBlurImage(3);
$imagick-&gt;rotationalBlurImage(5);
$imagick-&gt;rotationalBlurImage(7);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::roundCorners

(PECL imagick 2, PECL imagick 3)

Imagick::roundCorners — Redondea las esquinas de una imagen

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::roundCorners**(
    [float](#language.types.float) $x_rounding,
    [float](#language.types.float) $y_rounding,
    [float](#language.types.float) $stroke_width = 10,
    [float](#language.types.float) $displace = 5,
    [float](#language.types.float) $size_correction = -6
): [bool](#language.types.boolean)

Redondea las esquinas de una imagen. Los dos primeros argumentos controlan el
nivel de redondeo, y el tercero puede ser utilizado para afinar este proceso.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.
Este método no está disponible si Imagick ha sido compilado con ImageMagick versión 7.0.0 o superior.

### Parámetros

     x_rounding


       Redondeo en x






     y_rounding


       Redondeo en y






     stroke_width


       Ancho del trazo






     displace


       Desplazamiento de la imagen






     size_correction


       Corrección de tamaño





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::roundCorners()**:



     Redondea las esquinas de una imagen.

&lt;?php

$image = new Imagick();
$image-&gt;newPseudoImage(100, 100, "magick:rose");
$image-&gt;setImageFormat("png");

$image-&gt;roundCorners(5,3);
$image-&gt;writeImage("rounded.png");
?&gt;

# Imagick::sampleImage

(PECL imagick 2, PECL imagick 3)

Imagick::sampleImage — Escala una imagen con un muestreo de píxeles

### Descripción

public **Imagick::sampleImage**([int](#language.types.integer) $columns, [int](#language.types.integer) $rows): [bool](#language.types.boolean)

Escala una imagen a las dimensiones deseadas con un muestreo de píxeles.
A diferencia de otros métodos de escala, este método no introduce
colores adicionales en la imagen escalada.

### Parámetros

     columns








     rows







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::scaleImage

(PECL imagick 2, PECL imagick 3)

Imagick::scaleImage — Redimensiona la imagen a una escala específica

### Descripción

public **Imagick::scaleImage**(
    [int](#language.types.integer) $columns,
    [int](#language.types.integer) $rows,
    [bool](#language.types.boolean) $bestfit = **[false](#constant.false)**,
    [bool](#language.types.boolean) $legacy = **[false](#constant.false)**
): [bool](#language.types.boolean)

Redimensiona la imagen a las dimensiones especificadas. En caso de que alguno de los parámetros sea igual a 0, este será calculado automáticamente.

**Nota**:

    El comportamiento del parámetro bestfit cambió con Imagick 3.0.0.
    Antes de esta versión, proporcionar las dimensiones 400x400 a una imagen de dimensiones 200x150
    hacía que la parte izquierda permaneciera sin cambios. Con Imagick 3.0.0 y posteriores, la
    imagen se reduce al tamaño 400x300, siendo este el mejor resultado para esas dimensiones. Si el parámetro bestfit es utilizado, la anchura y la altura deben ser proporcionadas.

### Parámetros

     columns








     rows








     bestfit







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Se añadió un parámetro opcional de ajuste. Este método soporta ahora el redimensionamiento proporcional. Pase cero en uno de los parámetros para activar esta opción.





### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::scaleImage()**

&lt;?php
function scaleImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;scaleImage(150, 150, true);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::segmentImage

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::segmentImage — Segmenta una imagen

### Descripción

public **Imagick::segmentImage**(
    [int](#language.types.integer) $COLORSPACE,
    [float](#language.types.float) $cluster_threshold,
    [float](#language.types.float) $smooth_threshold,
    [bool](#language.types.boolean) $verbose = **[false](#constant.false)**
): [bool](#language.types.boolean)

Analiza la imagen e identifica las unidades similares.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.5 o superior.

### Parámetros

     COLORSPACE


       Una constante entre las [constantes COLORSPACE](#imagick.constants.colorspace).






     cluster_threshold


       Un porcentaje que describe el número mínimo de píxeles
       contenidos en el hexedro antes de que sea considerado
       válido.






     smooth_threshold


       Elimina el ruido del histograma.






     verbose


       Si se deben o no mostrar las informaciones detalladas
       sobre el reconocimiento de las clases.





### Valores devueltos

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::segmentImage()**

&lt;?php
function segmentImage($imagePath, $colorSpace, $clusterThreshold, $smoothThreshold) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;segmentImage($colorSpace, $clusterThreshold, $smoothThreshold);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

segmentImage($imagePath, \Imagick::COLORSPACE_RGB, 5, 5);

?&gt;

# Imagick::selectiveBlurImage

(PECL imagick 3 &gt;= 3.3.0)

Imagick::selectiveBlurImage — Desenfoca selectivamente una imagen dentro de un umbral de contraste

### Descripción

public **Imagick::selectiveBlurImage**(
    [float](#language.types.float) $radius,
    [float](#language.types.float) $sigma,
    [float](#language.types.float) $threshold,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)

Desenfoca selectivamente una imagen dentro de un umbral de contraste. Es similar al filtro de desenfoque que acentúa todo con un contraste superior a un cierto umbral.

### Parámetros

    radius








    sigma








    threshold








    channel


      Proporciona una constante de canal válida para su modo de canal. Para aplicarlo a más de un canal, combínense las [constantes de canales](#imagick.constants.channel) utilizando un operador a nivel de bits. Por omisión, vale **[Imagick::CHANNEL_DEFAULT](#imagick.constants.channel-default)**. Consúltese la lista de [constantes de canales](#imagick.constants.channel)


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::selectiveBlurImage()**



      &lt;?php

function selectiveBlurImage($imagePath, $radius, $sigma, $threshold, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;selectiveBlurImage($radius, $sigma, $threshold, $channel);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::separateImageChannel

(PECL imagick 2, PECL imagick 3)

Imagick::separateImageChannel — Separa un canal de la imagen

### Descripción

public **Imagick::separateImageChannel**([int](#language.types.integer) $channel): [bool](#language.types.boolean)

Separa un canal de la imagen y devuelve una imagen en escala de grises. Un canal
es un componente de color en particular de cada píxel de la imagen.

### Parámetros

     channel


       Qué 'canal' devolver. Para espacios de color distintos del RGB, aún se pueden utilizar las constantes CHANNEL_RED, CHANNEL_GREEN, CHANNEL_BLUE para indicar el primer, segundo y tercer canal.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::separateImageChannel()**



      &lt;?php

function separateImageChannel($imagePath, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;separateimagechannel($channel);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

separateImageChannel($imagePath, \Imagick::CHANNEL_GREEN);

?&gt;

# Imagick::sepiaToneImage

(PECL imagick 2, PECL imagick 3)

Imagick::sepiaToneImage — Pone una imagen en tono sepia

### Descripción

public **Imagick::sepiaToneImage**([float](#language.types.float) $threshold): [bool](#language.types.boolean)

Aplica un efecto especial a la imagen, similar al efecto logrado
en un cuarto oscuro fotográfico aplicando un tono sepia. El umbral tiene un rango desde 0
hasta el de QuantumRange y es una medida de la extensión del tono sepia. Un
umbral de 80 es un buen punto de partida para un tono razonable.

### Parámetros

     threshold







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::sepiaToneImage()**



      &lt;?php

function sepiaToneImage($imagePath, $sepia) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;sepiaToneImage($sepia);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::setBackgroundColor

(PECL imagick 2, PECL imagick 3)

Imagick::setBackgroundColor — Establece el color de fondo por omisión del objeto

### Descripción

public **Imagick::setBackgroundColor**([mixed](#language.types.mixed) $background): [bool](#language.types.boolean)

Establece el color de fondo por omisión del objeto.

### Parámetros

     background







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Ahora se permite que un string represente el color como un parámetro.
        Las versiones anteriores sólo permiten un objeto ImagickPixel.





# Imagick::setColorspace

(PECL imagick 3)

Imagick::setColorspace — Establecer el espacio de color

### Descripción

public **Imagick::setColorspace**([int](#language.types.integer) $COLORSPACE): [bool](#language.types.boolean)

Establece el valor del espacio de color global para el objeto.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.5.7 o superior.

### Parámetros

     COLORSPACE


       Una de las [constantes COLORSPACE](#imagick.constants.colorspace)





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setCompression

(PECL imagick 2, PECL imagick 3)

Imagick::setCompression — Configura el tipo de compresión del objeto

### Descripción

public **Imagick::setCompression**([int](#language.types.integer) $compression): [bool](#language.types.boolean)

Configura el tipo de compresión del objeto.

### Parámetros

     compression


       El tipo de compresión. Ver las constantes [Imagick::COMPRESSION_*](#imagick.constants).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setCompressionQuality

(PECL imagick 2, PECL imagick 3)

Imagick::setCompressionQuality — Configura la compresión por defecto del objeto

### Descripción

public **Imagick::setCompressionQuality**([int](#language.types.integer) $quality): [bool](#language.types.boolean)

Configura la compresión por defecto del objeto.

**Precaución**

    Este método solo funciona con nuevas imágenes, es decir,
    aquellas creadas con el método Imagick::newPseudoImage. Para imágenes
    existentes, debería utilizarse el método
    [Imagick::setImageCompressionQuality()](#imagick.setimagecompressionquality).

### Parámetros

     quality


       Un [int](#language.types.integer) entre 1 y 100, 1 = compresión alta, 100 compresión baja.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::setCompressionQuality()**

&lt;?php
function setCompressionQuality($imagePath, $quality) {

    $backgroundImagick = new \Imagick(realpath($imagePath));
    $imagick = new \Imagick();
    $imagick-&gt;setCompressionQuality($quality);
    $imagick-&gt;newPseudoImage(
        $backgroundImagick-&gt;getImageWidth(),
        $backgroundImagick-&gt;getImageHeight(),
        'canvas:white'
    );

    $imagick-&gt;compositeImage(
        $backgroundImagick,
        \Imagick::COMPOSITE_ATOP,
        0,
        0
    );

    $imagick-&gt;setFormat("jpg");
    header("Content-Type: image/jpg");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::setFilename

(PECL imagick 2, PECL imagick 3)

Imagick::setFilename — Establece el nombre de archivo antes de que se lea o escriba una imagen

### Descripción

public **Imagick::setFilename**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Establece el nombre de fichero antes de que se lea o escriba un fichero de imagen.

### Parámetros

     filename







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setFirstIterator

(PECL imagick 2, PECL imagick 3)

Imagick::setFirstIterator — Coloca el iterador de Imagick en la primera imagen

### Descripción

public **Imagick::setFirstIterator**(): [bool](#language.types.boolean)

Coloca el iterador de Imagick en la primera imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setFont

(PECL imagick 2 &gt;= 2.1.0, PECL imagick 3)

Imagick::setFont — Configura la fuente

### Descripción

public **Imagick::setFont**([string](#language.types.string) $font): [bool](#language.types.boolean)

Configura la fuente de la imagen. Este método se utiliza para configurar
la fuente utilizada por el pseudoformato : caption. La fuente
debe estar configurada en la configuración de ImageMagick o bien, un fichero
con el nombre de la fuente font debe existir. Este método no debe confundirse con el método
[ImagickDraw::setFont()](#imagickdraw.setfont) que define la fuente para un objeto
ImagickDraw específico.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.7 o superior.

### Parámetros

     font


        El nombre de la fuente o el nombre del fichero





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::setFont()**



     Ejemplo de utilización de **Imagick::setFont()**.

&lt;?php
/_ Crea un nuevo objeto Imagick _/
$im = new Imagick();

/_ Configura la fuente del objeto _/
$im-&gt;setFont("example.ttf");

/_ Crea un nuevo mensaje _/
$im-&gt;newPseudoImage(100, 100, "caption:Hello");

/_ Continuación del procesamiento de la imagen _/
?&gt;

### Ver también

    - [Imagick::getFont()](#imagick.getfont) - Obtiene la fuente de caracteres

    - [ImagickDraw::setFont()](#imagickdraw.setfont) - Establece la fuente especificada completamente para usarla cuando se escribe texto

    - [ImagickDraw::getFont()](#imagickdraw.getfont) - Devuelve la fuente

# Imagick::setFormat

(PECL imagick 2, PECL imagick 3)

Imagick::setFormat — Establece el formato del objeto Imagick

### Descripción

public **Imagick::setFormat**([string](#language.types.string) $format): [bool](#language.types.boolean)

Establece el formato del objeto Imagick.

### Parámetros

     format







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setGravity

(PECL imagick 2 &gt;= 2.2.0, PECL imagick 3)

Imagick::setGravity — Establece la gravedad

### Descripción

public **Imagick::setGravity**([int](#language.types.integer) $gravity): [bool](#language.types.boolean)

Establece la propiedad gravedad global para el objeto Imagick.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.0 o superior.

### Parámetros

     gravity


       La propiedad gravedad. Consulte esta lista de
       [constantes de gravedad](#imagick.constants.gravity).





### Valores devueltos

No se retorna ningún valor.

# Imagick::setImage

(PECL imagick 2, PECL imagick 3)

Imagick::setImage — Reemplaza una imagen en el objeto

### Descripción

public **Imagick::setImage**([Imagick](#class.imagick) $replace): [bool](#language.types.boolean)

Reemplaza la secuencia de imágenes actual por la imagen del objeto sustituto.

### Parámetros

     replace


       El objeto Imagick sustituto.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Un ejemplo de Imagick::setImage()**



     Un ejemplo usando Imagick::setImage()

&lt;?php
/_ Crear los objetos _/
$imagen = new Imagick('origen.jpg');
$sustituto = new Imagick('sustituto.jpg');

/_ origen.jpg es reemplazado por sustituto.jpg _/
$imagen-&gt;setImage($sustituto);

/_ imprimir la imagen _/
header('Content-type: image/jpeg');
echo $imagen;

?&gt;

# Imagick::setImageAlphaChannel

(PECL imagick 2 &gt;= 2.1.0, PECL imagick 3)

Imagick::setImageAlphaChannel — Define el canal alfa de la imagen

### Descripción

public **Imagick::setImageAlphaChannel**([int](#language.types.integer) $mode): [bool](#language.types.boolean)

Activa o desactiva el canal alfa de la imagen. El mode
es una de las constantes **[Imagick::ALPHACHANNEL\_\*](#imagick.constants.alphachannel-activate)**.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.8 o superior.

### Parámetros

     mode


       Una constante entre las constantes **[Imagick::ALPHACHANNEL_*](#imagick.constants.alphachannel-activate)**.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ver también

    - [Imagick::setImageMatte()](#imagick.setimagematte) - Establece el canal mate de la imagen

    - Las [constantes del canal Alfa Imagick](#imagick.constants.alphachannel)

# Imagick::setImageArtifact

(PECL imagick 3)

Imagick::setImageArtifact — Define el artefacto de la imagen

### Descripción

public **Imagick::setImageArtifact**([string](#language.types.string) $artifact, [string](#language.types.string) $value): [bool](#language.types.boolean)

Asocia un artefacto con la imagen. La diferencia entre las propiedades de la imagen
y el artefacto de la imagen es que las propiedades son públicas mientras que los
artefactos son privados.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.5.7 o superior.

### Parámetros

     artifact


       El nombre del artefacto.






     value


       El valor del artefacto.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::setImageArtifact()**

&lt;?php
function setImageArtifact() {

    $src1 = new \Imagick(realpath("./images/artifact/source1.png"));
    $src2 = new \Imagick(realpath("./images/artifact/source2.png"));

    $src2-&gt;setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
    $src2-&gt;setImageArtifact('compose:args', "1,0,-0.5,0.5");
    $src1-&gt;compositeImage($src2, Imagick::COMPOSITE_MATHEMATICS, 0, 0);

    $src1-&gt;setImageFormat('png');
    header("Content-Type: image/png");
    echo $src1-&gt;getImagesBlob();

}

?&gt;

### Ver también

    - [Imagick::getImageArtifact()](#imagick.getimageartifact) - Obtener el artefacto de imagen

    - [Imagick::deleteImageArtifact()](#imagick.deleteimageartifact) - Borra un artefacto de imagen

# Imagick::setImageAttribute

(PECL imagick 2, PECL imagick 3)

Imagick::setImageAttribute — Define un atributo de imagen

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::setImageAttribute**([string](#language.types.string) $key, [string](#language.types.string) $value): [bool](#language.types.boolean)

Define un atributo de imagen.

### Parámetros

    key









    value





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setImageBackgroundColor

(PECL imagick 2, PECL imagick 3)

Imagick::setImageBackgroundColor — Establece el color de fondo de la imagen

### Descripción

public **Imagick::setImageBackgroundColor**([mixed](#language.types.mixed) $background): [bool](#language.types.boolean)

Establece el color de fondo de la imagen.

### Parámetros

     background







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Ahora se permite que un string represente el color como un parámetro.
        Versiones anteriores sólo permitían un objeto ImagickPixel.





# Imagick::setImageBias

(PECL imagick 2, PECL imagick 3)

Imagick::setImageBias — Establece el sesgo de la imagen para cualquier método que convolucione una imagen

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::setImageBias**([float](#language.types.float) $bias): [bool](#language.types.boolean)

Establece el sesgo de la imagen para cualquier método que convolucione una imagen (p.ej. Imagick::ConvolveImage()).

### Parámetros

     bias







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1  Imagick::setImageBias()**

&lt;?php
//requires ImageMagick version 6.9.0-1 to have an effect on convolveImage
function setImageBias($bias) {
$imagick = new \Imagick(realpath("images/stack.jpg"));

    $xKernel = array(
        -0.70, 0, 0.70,
        -0.70, 0, 0.70,
        -0.70, 0, 0.70
    );

    $imagick-&gt;setImageBias($bias * \Imagick::getQuantum());
    $imagick-&gt;convolveImage($xKernel, \Imagick::CHANNEL_ALL);

    $imagick-&gt;setImageFormat('png');

    header('Content-type: image/png');
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::setImageBiasQuantum

(PECL imagick 3 &gt;= 3.3.0)

Imagick::setImageBiasQuantum — Establece el sesgo de la imagen

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::setImageBiasQuantum**([float](#language.types.float) $bias): [void](language.types.void.html)

Establece el sesgo de la imagen. El sesgo debe ser escalado con 0 (sin ajuste) a 1 (valor cuántico).

### Parámetros

    bias





### Valores devueltos

# Imagick::setImageBluePrimary

(PECL imagick 2, PECL imagick 3)

Imagick::setImageBluePrimary — Establece el punto primario azul de la cromaticidad de la imagen

### Descripción

public **Imagick::setImageBluePrimary**([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

Establece el punto primario azul de la cromaticidad de la imagen.

### Parámetros

     x








     y







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageBorderColor

(PECL imagick 2, PECL imagick 3)

Imagick::setImageBorderColor — Establece el color de borde de la imagen

### Descripción

public **Imagick::setImageBorderColor**([mixed](#language.types.mixed) $border): [bool](#language.types.boolean)

Establece el color de borde de la imagen.

### Parámetros

     border


       El color de borde





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Ahora se permite que un string represente el color como parámetro.
        Versiones anteriores sólo permitían un objeto ImagickPixel.





# Imagick::setImageChannelDepth

(PECL imagick 2, PECL imagick 3)

Imagick::setImageChannelDepth — Establece la profundidad de una canal de imagen en particular

### Descripción

public **Imagick::setImageChannelDepth**([int](#language.types.integer) $channel, [int](#language.types.integer) $depth): [bool](#language.types.boolean)

Establece la profundidad de una canal de imagen en particular.

### Parámetros

     channel








     depth







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageClipMask

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::setImageClipMask — Establece la máscara de recorte de una imagen

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::setImageClipMask**([Imagick](#class.imagick) $clip_mask): [bool](#language.types.boolean)

Establece la máscara de recorte de una imagen desde otro objeto Imagick.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.

### Parámetros

     clip_mask


       El objeto Imagick que contiene la máscara de recorte





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1  Imagick::setImageClipMask()**

&lt;?php
function setImageClipMask($imagePath) {
    $imagick = new \Imagick();
    $imagick-&gt;readImage(realpath($imagePath));

    $width = $imagick-&gt;getImageWidth();
    $height = $imagick-&gt;getImageHeight();

    $clipMask = new \Imagick();
    $clipMask-&gt;newPseudoImage(
        $width,
        $height,
        "canvas:transparent"
    );

    $draw = new \ImagickDraw();
    $draw-&gt;setFillColor('white');
    $draw-&gt;circle(
        $width / 2,
        $height / 2,
        ($width / 2) + ($width / 4),
        $height / 2
    );
    $clipMask-&gt;drawImage($draw);
    $imagick-&gt;setImageClipMask($clipMask);

    $imagick-&gt;negateImage(false);
    $imagick-&gt;setFormat("png");

    header("Content-Type: image/png");
    echo $imagick-&gt;getImagesBlob();

}

?&gt;

# Imagick::setImageColormapColor

(PECL imagick 2, PECL imagick 3)

Imagick::setImageColormapColor — Establece el color de un índice de mapa de color especificado

### Descripción

public **Imagick::setImageColormapColor**([int](#language.types.integer) $index, [ImagickPixel](#class.imagickpixel) $color): [bool](#language.types.boolean)

Establece el color de un índice de mapa de color especificado.

### Parámetros

     index








     color







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageColorspace

(PECL imagick 2, PECL imagick 3)

Imagick::setImageColorspace — Establece el espacio de color de una imagen

### Descripción

public **Imagick::setImageColorspace**([int](#language.types.integer) $colorspace): [bool](#language.types.boolean)

Establece el espacio de color de una imagen. Este método debería emplearse al crear imágenes nuevas. Para cambiar el espacio de color de una imagen existente se debería utilizar [Imagick::transformImageColorspace()](#imagick.transformimagecolorspace).

### Parámetros

     colorspace


       Una de las [constantes COLORSPACE](#imagick.constants.colorspace)





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageCompose

(PECL imagick 2, PECL imagick 3)

Imagick::setImageCompose — Establece el operador de composción de una imagen

### Descripción

public **Imagick::setImageCompose**([int](#language.types.integer) $compose): [bool](#language.types.boolean)

Establece el operador de composción de una imagen, útil para especificar cómo
componer la miniatura de la imagen cuando se usa el método
Imagick::montageImage().

### Parámetros

     compose







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageCompression

(PECL imagick 2, PECL imagick 3)

Imagick::setImageCompression — Establece la compresión de una imagen

### Descripción

public **Imagick::setImageCompression**([int](#language.types.integer) $compression): [bool](#language.types.boolean)

### Parámetros

     compression


       Una de las constantes **[COMPRESSION](#constant.compression)**





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageCompressionQuality

(PECL imagick 2, PECL imagick 3)

Imagick::setImageCompressionQuality — Establece la calidad de compresión de una imagen

### Descripción

public **Imagick::setImageCompressionQuality**([int](#language.types.integer) $quality): [bool](#language.types.boolean)

Establece la calidad de compresión de una imagen.

### Parámetros

     quality


       La calidad de compresión de la imagen como un integer





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::setImageCompressionQuality()**



      &lt;?php

function setImageCompressionQuality($imagePath, $quality) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;setImageCompressionQuality($quality);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::setImageDelay

(PECL imagick 2, PECL imagick 3)

Imagick::setImageDelay — Establece el retardo de una imagen

### Descripción

public **Imagick::setImageDelay**([int](#language.types.integer) $delay): [bool](#language.types.boolean)

Establece el retardo de una imagen. Para una imagen animada, esto es la cantidad de
tiempo que debería mostrarse este marco de la imagen, antes de mostrar el siguiente
marco.

El retardo se puede establecer individualmente para cada marco de una imagen.

### Parámetros

     delay


       La cantidad de tiempo expresado en 'ticks' que debería mostrarse
       la imagen. Para GIFs animados son 100 ticks por segundo, por lo que un
       valor de 20 sería 20/100 de un segundo, es decir 1/5 de un segundo.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Modificar un GIF animado con Imagick::setImageDelay()**

&lt;?php

// Modificar un GIF animado, y así sus marcos se reproduzcan a una velocidad variable,
// variando entre que se muestre para 50ms hasta 0ms, que causará que el marco
// sea saltado en la mayoría de los navegadores.
$imagick = new Imagick(realpath("Test.gif"));
$imagick = $imagick-&gt;coalesceImages();

$numMarcos = 0;

foreach ($imagick as $marco) {
    $imagick-&gt;setImageDelay((($numMarcos % 11) \* 5));
$numMarcos++;
}

$imagick = $imagick-&gt;deconstructImages();

$imagick-&gt;writeImages("/ruta/donde/guardar/output.gif", true);

?&gt;

# Imagick::setImageDepth

(PECL imagick 2, PECL imagick 3)

Imagick::setImageDepth — Establece la profundidad de una imagen

### Descripción

public **Imagick::setImageDepth**([int](#language.types.integer) $depth): [bool](#language.types.boolean)

Establece la profundidad de una imagen.

### Parámetros

     depth







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageDispose

(PECL imagick 2, PECL imagick 3)

Imagick::setImageDispose — Establece el método de disposición de una imagen

### Descripción

public **Imagick::setImageDispose**([int](#language.types.integer) $dispose): [bool](#language.types.boolean)

Establece el método de disposición de una imagen.

### Parámetros

     dispose







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageExtent

(PECL imagick 2, PECL imagick 3)

Imagick::setImageExtent — Establece el tamaño de una imagen

### Descripción

public **Imagick::setImageExtent**([int](#language.types.integer) $columns, [int](#language.types.integer) $rows): [bool](#language.types.boolean)

Establece el tamaño de una imagen (p.ej. columnas y filas).

### Parámetros

     columns








     rows







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageFilename

(PECL imagick 2, PECL imagick 3)

Imagick::setImageFilename — Establece el nombre de archivo de una imagen en particular

### Descripción

public **Imagick::setImageFilename**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Establece el nombre de fichero de una imagen en particular en una secuencia.

### Parámetros

     filename







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageFormat

(PECL imagick 2, PECL imagick 3)

Imagick::setImageFormat — Establece el formato de una imagen en particular

### Descripción

public **Imagick::setImageFormat**([string](#language.types.string) $format): [bool](#language.types.boolean)

Establece el formato de una imagen en particular en una secuencia.

### Parámetros

     format


       La representación string de un formato de imagen. Los formatos soportados
       dependen de la instalación de ImageMagick.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setImageGamma

(PECL imagick 2, PECL imagick 3)

Imagick::setImageGamma — Establece el valor gamma de la imagen

### Descripción

public **Imagick::setImageGamma**([float](#language.types.float) $gamma): [bool](#language.types.boolean)

Establece el valor gamma de la imagen.

### Parámetros

     gamma







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageGravity

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::setImageGravity — Establece la gravedad de la imagen

### Descripción

public **Imagick::setImageGravity**([int](#language.types.integer) $gravity): [bool](#language.types.boolean)

Establece la propiedad gravedad de la imagen actual. Este método se puede usar
para establecer la propiedad gravedad de una sóla secuencia de imágenes.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.4 o superior.

### Parámetros

     gravity


       La propiedad gravedad. Consulte esta lista de
       [constantes de gravedad](#imagick.constants.gravity).





### Valores devueltos

No se retorna ningún valor.

# Imagick::setImageGreenPrimary

(PECL imagick 2, PECL imagick 3)

Imagick::setImageGreenPrimary — Establece el punto primario verde de la cromaticidad de la imagen

### Descripción

public **Imagick::setImageGreenPrimary**([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

Establece el punto primario verde de la cromaticidad de la imagen.

### Parámetros

     x








     y







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageIndex

(PECL imagick 2, PECL imagick 3)

Imagick::setImageIndex — Establece la posición del iterador

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::setImageIndex**([int](#language.types.integer) $index): [bool](#language.types.boolean)

Establece la posición del iterador en la lista de imágenes especificada con el parámetro
index.

Este método ha quedado obsoleto. Véase
[Imagick::setIteratorIndex()](#imagick.setiteratorindex).

### Parámetros

     index


       La posición donde se va a establecer el iterador





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageInterlaceScheme

(PECL imagick 2, PECL imagick 3)

Imagick::setImageInterlaceScheme — Establece la compresión de la imagen

### Descripción

public **Imagick::setImageInterlaceScheme**([int](#language.types.integer) $interlace_scheme): [bool](#language.types.boolean)

Establece la compresión de la imagen.

### Parámetros

     interlace_scheme







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageInterpolateMethod

(PECL imagick 2, PECL imagick 3)

Imagick::setImageInterpolateMethod — Configura el método de interpolación de la imagen

### Descripción

public **Imagick::setImageInterpolateMethod**([int](#language.types.integer) $method): [bool](#language.types.boolean)

Configura el método de interpolación de la imagen.

### Parámetros

     method


       Una constante **[Imagick::INTERPOLATE_*](#imagick.constants.interpolate-undefined)**.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setImageIterations

(PECL imagick 2, PECL imagick 3)

Imagick::setImageIterations — Establece las iteraciones de una imagen

### Descripción

public **Imagick::setImageIterations**([int](#language.types.integer) $iterations): [bool](#language.types.boolean)

Establece el número de veces que una imagen animada se repite.

### Parámetros

     iterations


       El número de veces que la imagen debería mostrarse en bucle. Establecer a '0' para
       un bucle infinito.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Uso básido ce Imagick::setImageIterations()**

&lt;?php

$imagick = new Imagick(realpath("Test.gif"));

$imagick = $imagick-&gt;coalesceImages();
$imagick-&gt;setImageIterations(1);
$imagick = $imagick-&gt;deconstructImages();

$imagick-&gt;writeImages('/ruta/donde/guardar/UnaVez.gif', true);

?&gt;

# Imagick::setImageMatte

(PECL imagick 2, PECL imagick 3)

Imagick::setImageMatte — Establece el canal mate de la imagen

### Descripción

public **Imagick::setImageMatte**([bool](#language.types.boolean) $matte): [bool](#language.types.boolean)

Establece el canal mate de la imagen.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

     matte


       Si es true activa el canal mate y si es false lo deshabilita.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setImageMatteColor

(PECL imagick 2, PECL imagick 3)

Imagick::setImageMatteColor — Establece el color mate de la imagen

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::setImageMatteColor**([mixed](#language.types.mixed) $matte): [bool](#language.types.boolean)

Establece el color mate de la imagen.

### Parámetros

     matte







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Ahora se permite que un string represente el color como parámetro.
        Versiones anteriores sólo permitían un objeto ImagickPixel.





# Imagick::setImageOpacity

(PECL imagick 2, PECL imagick 3)

Imagick::setImageOpacity — Establece el nivel de opacidad de la imagen

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::setImageOpacity**([float](#language.types.float) $opacity): [bool](#language.types.boolean)

Establece el nivel de opacidad de la imagen. Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.1 o superior.
Este método opera en todos los canales, lo que significa que, por ejemplo, un valor de la opacidad
de 0.5 establecerá todas las áreas transparentes a parcialmente opacas. Para añadir transparencia a
áreas que no lo son ya, use [Imagick::evaluateImage()](#imagick.evaluateimage)

### Parámetros

     opacity


       El nivel de transpariencia: 1.0 es completamente opaco y 0.0 es completamente
       transparente.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Un ejemplo de Imagick::setImageOpacity()**



     Un ejemplo usando Imagick::setImageOpacity()

&lt;?php
/_ Crear el objeto _/
$imagen = new Imagick('origen.png');

/_ Establecer la opacidad _/
$imagen-&gt;setImageOpacity(0.7);

/_ Mostrar la imagen _/
header('Content-type: image/png');
echo $imagen;

?&gt;

# Imagick::setImageOrientation

(PECL imagick 2, PECL imagick 3)

Imagick::setImageOrientation — Establece la orientación de la imagen

### Descripción

public **Imagick::setImageOrientation**([int](#language.types.integer) $orientation): [bool](#language.types.boolean)

Establece la orientación de la imagen.

### Parámetros

     orientation


       Una de las [constantes de orientación](#imagick.constants.orientation)





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::setImageOrientation()**



      &lt;?php

//Doesn't appear to do anything
function setImageOrientation($imagePath, $orientationType) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;setImageOrientation($orientationType);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::setImagePage

(PECL imagick 2, PECL imagick 3)

Imagick::setImagePage — Establece la geometría de la página de la imagen

### Descripción

public **Imagick::setImagePage**(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)

Establece la geometría de la página de la imagen.

### Parámetros

     width








     height








     x








     y







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageProfile

(PECL imagick 2, PECL imagick 3)

Imagick::setImageProfile — Añade un perfil nominado al objeto Imagick

### Descripción

public **Imagick::setImageProfile**([string](#language.types.string) $name, [string](#language.types.string) $profile): [bool](#language.types.boolean)

Añade un perfil nominado al objeto Imagick. Si un perfil
con el mismo nobre ya existe, se reemplaza. Este
método difiere del método Imagick::ProfileImage() en
que no aplica ningún perfil de color CMS.

### Parámetros

     name








     profile







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageProperty

(PECL imagick 2, PECL imagick 3)

Imagick::setImageProperty — Configura una propiedad de imagen

### Descripción

public **Imagick::setImageProperty**([string](#language.types.string) $name, [string](#language.types.string) $value): [bool](#language.types.boolean)

Configura la propiedad de imagen name al valor
value.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.2 o superior.

### Parámetros

     name








     value







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::setImageProperty()**



     Define y recupera las propiedades de una imagen.

&lt;?php
$image = new Imagick();
$image-&gt;newImage(300, 200, "black");

$image-&gt;setImageProperty('Exif:Make', 'Imagick');
echo $image-&gt;getImageProperty('Exif:Make');
?&gt;

### Ver también

    - [Imagick::getImageProperty()](#imagick.getimageproperty) - Devuelve una propiedad de una imagen

# Imagick::setImageRedPrimary

(PECL imagick 2, PECL imagick 3)

Imagick::setImageRedPrimary — Establece el punto primario rojo de la cromaticidad de la imagen

### Descripción

public **Imagick::setImageRedPrimary**([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

Establece el punto primario rojo de la cromaticidad de la imagen.

### Parámetros

     x








     y







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageRenderingIntent

(PECL imagick 2, PECL imagick 3)

Imagick::setImageRenderingIntent — Establece el propósito de renderización de la imagen

### Descripción

public **Imagick::setImageRenderingIntent**([int](#language.types.integer) $rendering_intent): [bool](#language.types.boolean)

Establece el propósito de renderización de la imagen.

### Parámetros

     rendering_intent







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageResolution

(PECL imagick 2, PECL imagick 3)

Imagick::setImageResolution — Establece la resolución de la imagen

### Descripción

public **Imagick::setImageResolution**([float](#language.types.float) $x_resolution, [float](#language.types.float) $y_resolution): [bool](#language.types.boolean)

Establece la resolución de la imagen.

### Parámetros

     x_resolution








     y_resolution







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::setImageResolution()**



      &lt;?php

function setImageResolution($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;setImageResolution(50, 50);

    header("Content-Type: image/jpg");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::setImageScene

(PECL imagick 2, PECL imagick 3)

Imagick::setImageScene — Establece la escena de la imagen

### Descripción

public **Imagick::setImageScene**([int](#language.types.integer) $scene): [bool](#language.types.boolean)

Establece la escena de la imagen.

### Parámetros

     scene







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setImageTicksPerSecond

(PECL imagick 2, PECL imagick 3)

Imagick::setImageTicksPerSecond — Establece los ticks por segundo de la imagen

### Descripción

public **Imagick::setImageTicksPerSecond**([int](#language.types.integer) $ticks_per_second): [bool](#language.types.boolean)

Ajusta la cantidad de tiempo que se muestra un marco de una imagen animada.

**Nota**:

    Para GIFs animados, esta función no cambia el número de 'ticks de imagen'
    por segundo, el cual está siempre definido como 100. En su lugar, ajusta la cantidad de
    tiempo que se muestra un marco para simular el cambio de 'ticks por
    segundo'.




    Por ejemplo, para un GIF animado donde cada marco se muestra para 20 ticks
    (1/5 de un segundo), al llamar a este método en cada marco de esa imagen
    con un argumento de 50, los marcos se ajustan para que
    se muestren por 40 ticks (2/5 de un segundo) y así, la animación se reproducirá
    a la mitad de la velocidad original.

### Parámetros

     ticks_per_second


       La duración por la que imagen debería mostrarse expresada en ticks
       por segundo.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Modificar un GIF animado con Imagick::setImageTicksPerSecond()**

&lt;?php

// Modificar un GIF animado para que la primera mitad del GIF se reproduzca a
// la mitad de su velocidad, y la segunda mitad se reproduzca al doble de su
// velocidad actual

$imagick = new Imagick(realpath("Test.gif"));
$imagick = $imagick-&gt;coalesceImages();

$totalFrames = $imagick-&gt;getNumberImages();

$frameCount = 0;

foreach ($imagick as $frame) {
$imagick-&gt;setImageTicksPerSecond(50);

    if ($frameCount &lt; ($totalFrames / 2)) {
        // Modificar el marco para que se muestre al doble de lo actual
        $imagick-&gt;setImageTicksPerSecond(50);
    } else {
        // Modificar el marco para que se muestre a la mitad de lo actual
        $imagick-&gt;setImageTicksPerSecond(200);
    }

    $frameCount++;

}

$imagick = $imagick-&gt;deconstructImages();

$imagick-&gt;writeImages("/ruta/donde/guardar/salida.gif", true);

?&gt;

# Imagick::setImageType

(PECL imagick 2, PECL imagick 3)

Imagick::setImageType — Establece el tipo de imagen

### Descripción

public **Imagick::setImageType**([int](#language.types.integer) $image_type): [bool](#language.types.boolean)

Establece el tipo de imagen.

### Parámetros

     image_type







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setImageUnits

(PECL imagick 2, PECL imagick 3)

Imagick::setImageUnits — Establece las unidades de resolución de la imagen

### Descripción

public **Imagick::setImageUnits**([int](#language.types.integer) $units): [bool](#language.types.boolean)

Establece las unidades de resolución de la imagen.

### Parámetros

     units







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setImageVirtualPixelMethod

(PECL imagick 2, PECL imagick 3)

Imagick::setImageVirtualPixelMethod — Establece el método de píxel virtual de la imagen

### Descripción

public **Imagick::setImageVirtualPixelMethod**([int](#language.types.integer) $method): [bool](#language.types.boolean)

Establece el método de píxel virtual de la imagen.

### Parámetros

     method







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setImageWhitePoint

(PECL imagick 2, PECL imagick 3)

Imagick::setImageWhitePoint — Establece el punto blanco de cromaticidad de la imagen

### Descripción

public **Imagick::setImageWhitePoint**([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

Establece el punto blanco de cromaticidad de la imagen.

### Parámetros

     x








     y







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::setInterlaceScheme

(PECL imagick 2, PECL imagick 3)

Imagick::setInterlaceScheme — Establece la compresión de la imagen

### Descripción

public **Imagick::setInterlaceScheme**([int](#language.types.integer) $interlace_scheme): [bool](#language.types.boolean)

Establece la compresión de la imagen.

### Parámetros

     interlace_scheme







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setIteratorIndex

(PECL imagick 2, PECL imagick 3)

Imagick::setIteratorIndex — Establece la posición del iterador

### Descripción

public **Imagick::setIteratorIndex**([int](#language.types.integer) $index): [bool](#language.types.boolean)

Establece el iterador a la posición en la lista de imágenes definida por el parámtro index.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

     index


       La posición donde se va a establecer el iterador





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Usar Imagick::setIteratorIndex()**:



     Crear imágenes, establecer y obtener el índice del iterador

&lt;?php
$im = new Imagick();
$im-&gt;newImage(100, 100, new ImagickPixel("red"));
$im-&gt;newImage(100, 100, new ImagickPixel("green"));
$im-&gt;newImage(100, 100, new ImagickPixel("blue"));

$im-&gt;setIteratorIndex(1);
echo $im-&gt;getIteratorIndex();
?&gt;

### Ver también

    - [Imagick::getIteratorIndex()](#imagick.getiteratorindex) - Lee el índice de la imagen activa actual

    - [Imagick::getImageIndex()](#imagick.getimageindex) - Obtiene el índice de la imagen actual

    - [Imagick::setImageIndex()](#imagick.setimageindex) - Establece la posición del iterador

# Imagick::setLastIterator

(PECL imagick 2 &gt;= 2.0.1, PECL imagick 3)

Imagick::setLastIterator — Posiciona el iterador Imagick en la última imagen

### Descripción

public **Imagick::setLastIterator**(): [bool](#language.types.boolean)

Posiciona el iterador Imagick en la última imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setOption

(PECL imagick 2, PECL imagick 3)

Imagick::setOption — Configura una opción de un objeto Imagick

### Descripción

public **Imagick::setOption**([string](#language.types.string) $key, [string](#language.types.string) $value): [bool](#language.types.boolean)

Configura una o varias opciones del objeto Imagick.

### Parámetros

     key








     value







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Intento de alcanzar el tamaño '$extent' con Imagick::setOption()**

&lt;?php
function renderJPG($extent) {
        $imagePath = $this-&gt;control-&gt;getImagePath();
        $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;setImageFormat('jpg');
$imagick-&gt;setOption('jpeg:extent', $extent);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

    **Ejemplo #2 Ejemplo con Imagick::setOption()**

&lt;?php
function renderPNG($imagePath, $format) {

        $imagick = new \Imagick(realpath($imagePath));
        $imagick-&gt;setImageFormat('png');
        $imagick-&gt;setOption('png:format', $format);
        header("Content-Type: image/png");
        echo $imagick-&gt;getImageBlob();
    }

    //Guardar como PNG de 64 bits.
    renderPNG($imagePath, 'png64');

?&gt;

    **Ejemplo #3 Ejemplo con Imagick::setOption()**

&lt;?php
function renderCustomBitDepthPNG() {
$imagePath = $this-&gt;control-&gt;getImagePath();
        $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;setImageFormat('png');

        $imagick-&gt;setOption('png:bit-depth', '16');
        $imagick-&gt;setOption('png:color-type', 6);
        header("Content-Type: image/png");
        $crash = true;
        if ($crash) {
            echo $imagick-&gt;getImageBlob();
        }
        else {
            $tempFilename = tempnam('./', 'imagick');
            $imagick-&gt;writeimage(realpath($tempFilename));
            echo file_get_contents($tempFilename);
        }
    }

?&gt;

# Imagick::setPage

(PECL imagick 2, PECL imagick 3)

Imagick::setPage — Establece la geometría de página del objeto Imagick

### Descripción

public **Imagick::setPage**(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)

Establece la geometría de página del objeto Imagick.

### Parámetros

     width








     height








     x








     y







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setPointSize

(PECL imagick 2 &gt;= 2.1.0, PECL imagick 3)

Imagick::setPointSize — Define la medida del punto

### Descripción

public **Imagick::setPointSize**([float](#language.types.float) $point_size): [bool](#language.types.boolean)

Define la propiedad de la medida del punto del objeto. Este método
puede ser utilizado para, por ejemplo, definir la medida de la fuente
para la leyenda: pseudo-formato.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.7 o superior.

### Parámetros

     point_size


       La medida del punto.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::setPointSize()**



     Ejemplo de uso del método Imagick::setPointSize

&lt;?php
/_ Crea un nuevo objeto imagick _/
$im = new Imagick();

/_ Define la fuente para el objeto _/
$im-&gt;setFont("example.ttf");

/_ Define la medida del punto _/
$im-&gt;setPointSize(12);

/_ Crea una nueva leyenda _/
$im-&gt;newPseudoImage(100, 100, "caption:Hello");

/_ Realiza algunas operaciones con la nueva imagen _/
?&gt;

### Ver también

    - [Imagick::getPointSize()](#imagick.getpointsize) - Obtiene el tamaño del punto

# Imagick::setProgressMonitor

(PECL imagick 3 &gt;= 3.3.0)

Imagick::setProgressMonitor — Define una función de retrollamada a ser llamada durante el procesamiento

### Descripción

public **Imagick::setProgressMonitor**([callable](#language.types.callable) $callback): [bool](#language.types.boolean)

Define una función de retrollamada que será llamada durante el procesamiento de la imagen Imagick.

### Parámetros

    callback


      La función de progreso a llamar. Debe retornar true si el procesamiento de la imagen debe continuar, o false si debe ser cancelado. El argumento offset indica la progresión y el argumento span indica la cantidad total de trabajo a realizar.






       callback
      (
       [mixed](#language.types.mixed) $offset
      ,

       [mixed](#language.types.mixed) $span
      ): [bool](#language.types.boolean)


     **Precaución**

       Los valores pasados a la función de retrollamada no son consistentes. En particular, el argumento span puede aumentar durante el procesamiento de la imagen. Debido a esto, el cálculo del porcentaje completo de una operación de imagen no es trivial.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::setProgressMonitor()**



      &lt;?php
        $abortReason = null;

        try {
            $imagick = new \Imagick(realpath($this-&gt;control-&gt;getImagePath()));
            $startTime = time();

            $callback = function ($offset, $span)  use ($startTime, &amp;$abortReason) {
                if (((100 * $offset) / $span)  &gt; 20) {
                    $abortReason = "Processing reached 20%";
                    return false;
                }

                $nowTime = time();

                if ($nowTime - $startTime &gt; 5) {
                    $abortReason = "Image processing took more than 5 seconds";
                    return false;
                }
                if (($offset % 5) == 0) {
                    echo "Progress: $offset / $span &lt;br/&gt;";
                }
                return true;
            };

            $imagick-&gt;setProgressMonitor($callback);

            $imagick-&gt;waveImage(2, 15);

            echo "Data len is: ".strlen($imagick-&gt;getImageBlob());
        }
        catch(\ImagickException $e) {
            if ($abortReason != null) {
                echo "Image processing was aborted: ".$abortReason."&lt;br/&gt;";
            }
            else {
                echo "ImagickException caught: ".$e-&gt;getMessage()." Exception type is ".get_class($e);
            }
        }

?&gt;

# Imagick::setRegistry

(PECL imagick 3 &gt;= 3.3.0)

Imagick::setRegistry — Define la entrada del registro ImageMagick nombrada clave para valor

### Descripción

public static **Imagick::setRegistry**([string](#language.types.string) $key, [string](#language.types.string) $value): [bool](#language.types.boolean)

Define la entrada del registro ImageMagick nombrada clave para valor. Esto es lo más
útil para definir "temporary-path" que controla dónde ImageMagick
crea imágenes temporales, por ejemplo durante el procesamiento de PDF.

### Parámetros

    key









    value





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setResolution

(PECL imagick 2, PECL imagick 3)

Imagick::setResolution — Establece la resolución de la imagen

### Descripción

public **Imagick::setResolution**([float](#language.types.float) $x_resolution, [float](#language.types.float) $y_resolution): [bool](#language.types.boolean)

Establece la resolución de la imagen.

### Parámetros

     x_resolution


       La resolución horizontal.






     y_resolution


       La resolución vertical.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Notas

**Imagick::setResolution()** se debe invocar antes de
cargar o crear una imagen.

### Ver también

- [Imagick::setImageResolution()](#imagick.setimageresolution) - Establece la resolución de la imagen

- [Imagick::getImageResolution()](#imagick.getimageresolution) - Lee las resoluciones en X y Y de una imagen

# Imagick::setResourceLimit

(PECL imagick 2, PECL imagick 3)

Imagick::setResourceLimit — Define la limitación para una recurso particular

### Descripción

public static **Imagick::setResourceLimit**([int](#language.types.integer) $type, [int](#language.types.integer) $limit): [bool](#language.types.boolean)

Este método se utiliza para modificar las limitaciones de la recurso
de la biblioteca subyacente ImageMagick.

### Parámetros

     type


       Consulte la lista de [
       constantes de tipo de recursos](#imagick.constants.resourcetypes).






     limit


       Una de las [
       constantes de tipo de recursos](#imagick.constants.resourcetypes).
       La unidad depende del tipo de la recurso a limitar.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ver también

- [Imagick::getResourceLimit()](#imagick.getresourcelimit) - Devuelve el límite de la recurso

# Imagick::setSamplingFactors

(PECL imagick 2, PECL imagick 3)

Imagick::setSamplingFactors — Establece los factores de muestreo de la imagen

### Descripción

public **Imagick::setSamplingFactors**([array](#language.types.array) $factors): [bool](#language.types.boolean)

Establece los factores de muestreo de la imagen.

### Parámetros

     factors







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::setSamplingFactors()**



      &lt;?php

function setSamplingFactors($imagePath) {

    $imagePath = "../imagick/images/FineDetail.png";
    $imagick = new \Imagick(realpath($imagePath));
    $imagick-&gt;setImageFormat('jpg');
    $imagick-&gt;setSamplingFactors(array('2x2', '1x1', '1x1'));

    $compressed = $imagick-&gt;getImageBlob();


    $reopen = new \Imagick();
    $reopen-&gt;readImageBlob($compressed);

    $reopen-&gt;resizeImage(
        $reopen-&gt;getImageWidth() * 4,
        $reopen-&gt;getImageHeight() * 4,
        \Imagick::FILTER_POINT,
        1
    );

    header("Content-Type: image/jpg");
    echo $reopen-&gt;getImageBlob();

}

?&gt;

# Imagick::setSize

(PECL imagick 2, PECL imagick 3)

Imagick::setSize — Establece el tamaño del objeto Imagick

### Descripción

public **Imagick::setSize**([int](#language.types.integer) $columns, [int](#language.types.integer) $rows): [bool](#language.types.boolean)

Establece el tamaño del Imagick. Se debe establecer antes de leer un formato de imagen
en bruto como RGB, GRAY, o CMYK.

### Parámetros

     columns








     rows







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setSizeOffset

(PECL imagick 2, PECL imagick 3)

Imagick::setSizeOffset — Establece el tamaño y el índice del objeto Imagick

### Descripción

public **Imagick::setSizeOffset**([int](#language.types.integer) $columns, [int](#language.types.integer) $rows, [int](#language.types.integer) $offset): [bool](#language.types.boolean)

Establece el tamaño y el índice del objeto Imagick. Se debe establecer antes de leer un
formato de imagen en bruto como RGB, GRAY, o CMYK.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

     columns


       El ancho en píxeles.






     rows


       El alto en píxeles.






     offset


       El índice de la imagen.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::setType

(PECL imagick 2, PECL imagick 3)

Imagick::setType — Establece el atributo tipo de imagen

### Descripción

public **Imagick::setType**([int](#language.types.integer) $image_type): [bool](#language.types.boolean)

Establece el atributo tipo de imagen.

### Parámetros

     image_type







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::shadeImage

(PECL imagick 2, PECL imagick 3)

Imagick::shadeImage — Crea un efecto en 3D

### Descripción

public **Imagick::shadeImage**([bool](#language.types.boolean) $gray, [float](#language.types.float) $azimuth, [float](#language.types.float) $elevation): [bool](#language.types.boolean)

Hace brillar una luz distante sobre una imagen para crear un efecto tridimensional.
Se controla la posición de la luz con los parámetros azimuth (acimut) y elevation (elevación);
el acimut se mide en grados desde el eje X y la elevación se mide
en píxeles por encima del eje Z.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

     gray


       Un valor distinto de cero sombrea la intensidad de cada píxel.






     azimuth


       Define la dirección de la fuente de luz.






     elevation


       Define la dirección de la fuente de luz.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción de tipo ImagickException en caso de error.

### Ejemplos

      **Ejemplo #1  Imagick::shadeImage()**



      &lt;?php

function shadeImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;shadeImage(true, 45, 20);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::shadowImage

(PECL imagick 2, PECL imagick 3)

Imagick::shadowImage — Simula una sombra de imagen

### Descripción

public **Imagick::shadowImage**(
    [float](#language.types.float) $opacity,
    [float](#language.types.float) $sigma,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)

Simula una sombra de imagen.

### Parámetros

     opacity








     sigma








     x








     y







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1  Imagick::shadowImage()**

&lt;?php
function shadowImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;shadowImage(0.4, 10, 50, 5);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::sharpenImage

(PECL imagick 2, PECL imagick 3)

Imagick::sharpenImage — Afila una imagen

### Descripción

public **Imagick::sharpenImage**([float](#language.types.float) $radius, [float](#language.types.float) $sigma, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Afila una imagen. Se convoluciona la imagen con un operador gaussiano
del radio y la desviación estándar (sigma) dados. Para obtener resultados
razonables, el radio debería ser mayor que sigma. Use un radio de 0 y
**Imagick::sketchImage()()** seleccionará un radio apropiado
automáticamente.

### Parámetros

     radius








     sigma








     channel







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::sharpenImage()**



      &lt;?php

function sharpenImage($imagePath, $radius, $sigma, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;sharpenimage($radius, $sigma, $channel);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::shaveImage

(PECL imagick 2, PECL imagick 3)

Imagick::shaveImage — Recorta píxeles de los extremos de la imagen

### Descripción

public **Imagick::shaveImage**([int](#language.types.integer) $columns, [int](#language.types.integer) $rows): [bool](#language.types.boolean)

Recorta píxeles de los extremos de la imagen. Asigna la memoria necesaria para
la estructura de la nueva imagen y devuelve un puntero a la nueva imagen.

### Parámetros

     columns








     rows







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::shaveImage()**



      &lt;?php

function shaveImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;shaveImage(100, 50);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::shearImage

(PECL imagick 2, PECL imagick 3)

Imagick::shearImage — Crea un paralelogramo

### Descripción

public **Imagick::shearImage**([mixed](#language.types.mixed) $background, [float](#language.types.float) $x_shear, [float](#language.types.float) $y_shear): [bool](#language.types.boolean)

Desliza un extremo de una imagen a lo largo del eje X o Y, creando un paralelogramo.
Un recorte en la dirección X desliza un extremo a lo largo del eje X, mientras que un recorte en la
dirección Y desliza un extremo a lo largo del eje Y. La cantidad del recorte se controla
por un ángulo de recorte. Para recortes en la dirección X, x_shear se mide relativo al
eje Y, y de forma similar, para recortes en la dirección Y, y_shear se mide
relativo al eje X. Los triángulos vacíos sobrantes del recorte de la imagen
se rellenan con el color de fondo.

### Parámetros

     background


       El color de fondo






     x_shear


       El número de grados a recortar sobre el eje x






     y_shear


       El número de grados a recortar sobre el eje y





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Ahora se permite que un string represente el color como primer parámetro.
        Versiones previas sólo permitían un objeto ImagickPixel.





### Ejemplos

      **Ejemplo #1  Imagick::shearImage()**



      &lt;?php

function shearImage($imagePath, $color, $shearX, $shearY) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;shearimage($color, $shearX, $shearY);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::sigmoidalContrastImage

(PECL imagick 2, PECL imagick 3)

Imagick::sigmoidalContrastImage — Ajusta el contraste de la imagen

### Descripción

public **Imagick::sigmoidalContrastImage**(
    [bool](#language.types.boolean) $sharpen,
    [float](#language.types.float) $alpha,
    [float](#language.types.float) $beta,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)

Ajusta el contraste de la imagen con un algoritmo de contraste sigmoide
no lineal. Aumenta el contraste de la imagen utilizando una función
de transferencia sigmoide sin saturar las luces altas y las sombras.
El contraste indica cuánto debe aumentarse (0 para no hacer nada, 3 es
un valor típico, 20 es un valor alto); el punto medio indica dónde
estarán los tonos medios en la imagen resultante (0 corresponde a blanco,
50 a gris y 100 a negro). Establezca el parámetro sharpen
en **[true](#constant.true)** para aumentar el contraste de la imagen; de lo contrario,
el contraste se reducirá.

Consulte también los [» ejemplos
de ImageMagick V6 - Transformaciones de imágenes - Contraste no lineal](http://www.imagemagick.org/Usage/color_mods/#sigmoidal)

### Parámetros

     sharpen


       Si es **[true](#constant.true)**, el contraste aumentará; de lo contrario, el contraste disminuirá.






     alpha


       La cantidad de contraste a aplicar. -1 representa una cantidad muy pequeña,
       5 una cantidad significativa y 20 el máximo.






     beta


       Dónde debe situarse el punto medio del gradiente. Este valor debe estar
       en el intervalo 0-1, multiplicado por el valor del quantum para ImageMagick.






     channel


       Canales de color sobre los cuales debe aplicarse el contraste.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1
     Crea un degradado de imagen utilizando el método
     Imagick::sigmoidalContrastImage()**
     para mezclar dos imágenes suavemente, donde la mezcla
     está definida por las variables $contrast y $midpoint.

&lt;?php

function generateBlendImage($width, $height, $contrast = 10, $midpoint = 0.5) {
    $imagick = new Imagick();
    $imagick-&gt;newPseudoImage($width, $height, 'gradient:black-white');
$quanta = $imagick-&gt;getQuantumRange();
$imagick-&gt;sigmoidalContrastImage(true, $contrast, $midpoint \* $quanta["quantumRangeLong"]);

    return $imagick;

}

?&gt;

# Imagick::sketchImage

(PECL imagick 2, PECL imagick 3)

Imagick::sketchImage — Simula el bosquejo de un lapiz

### Descripción

public **Imagick::sketchImage**([float](#language.types.float) $radius, [float](#language.types.float) $sigma, [float](#language.types.float) $angle): [bool](#language.types.boolean)

Simula el bosquejo de un lapiz. Se convoluciona la imagen con un operador gaussiano
del radio y la desviación estándar (sigma) dados. Para obtener resultados
razonables, el radio debería ser mayor que sigma. Use un radio de 0 y
Imagick::sketchImage() seleccionará un radio apropiado automáticamente. El ángulo da el
ángulo del movimiento borroso.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

     radius


       El radio gaussiano, en píxeles, sin contar el píxel central.






     sigma


       La desviación estándar gaussiana, en píxeles.






     angle


       Aplica el efecto a lo largo de este ángulo.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::sketchImage()**



      &lt;?php

function sketchImage($imagePath, $radius, $sigma, $angle) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;sketchimage($radius, $sigma, $angle);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::smushImages

(PECL imagick 3 &gt;= 3.3.0)

Imagick::smushImages — Toma todas las imágenes del puntero de imagen actual hasta el final de la lista de imágenes y las comprime

### Descripción

public **Imagick::smushImages**([bool](#language.types.boolean) $stack, [int](#language.types.integer) $offset): [Imagick](#class.imagick)

Toma todas las imágenes del puntero de imagen actual hasta el final de la lista de imágenes y las comprime
unas sobre otras de arriba hacia abajo si el argumento stack es verdadero, de lo contrario de izquierda a derecha.

### Parámetros

    stack









    offset





### Valores devueltos

La nueva imagen comprimida.

### Ejemplos

      **Ejemplo #1  Imagick::smushImages()**



      &lt;?php

function smushImages($imagePath, $imagePath2) {

    $imagick = new \Imagick(realpath($imagePath));
    $imagick2 = new \Imagick(realpath($imagePath2));

    $imagick-&gt;addimage($imagick2);
    $smushed = $imagick-&gt;smushImages(false, 50);
    $smushed-&gt;setImageFormat('jpg');
    header("Content-Type: image/jpg");
    echo $smushed-&gt;getImageBlob();

}

?&gt;

# Imagick::solarizeImage

(PECL imagick 2, PECL imagick 3)

Imagick::solarizeImage — Aplica un efecto de solarización a la imagen

### Descripción

public **Imagick::solarizeImage**([int](#language.types.integer) $threshold): [bool](#language.types.boolean)

Aplica un efecto especial a la imagen, similar al efecto conseguido en un cuarto oscuro
fotográfico exponiendo selectivamente áreas del papel sensible fotográfico a la luz.
Los rangos de umbral van desde 0 al de QuantumRange y es una medida de la
extensión de la solarización.

### Parámetros

     threshold







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::solarizeImage()**



      &lt;?php

function solarizeImage($imagePath, $solarizeThreshold) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;solarizeImage($solarizeThreshold \* \Imagick::getQuantum());
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::sparseColorImage

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::sparseColorImage — Interpola colores

### Descripción

public **Imagick::sparseColorImage**([int](#language.types.integer) $SPARSE_METHOD, [array](#language.types.array) $arguments, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Dada la matriz de argumentos que contiene valores númericos, este método interpola los colores
encontrados en esas coordenadas a través de la imagen completa usando sparse_method.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.4.5 o superior.

### Parámetros

     SPARSE_METHOD


       Consulte esta lista de [constantes de métodos de escasez](#imagick.constants.sparsecolormethod)






     arguments


       Una matriz que contiene las coodenadas.
       El formato de la matriz es array(1,1, 2,45)






     channel


       Proporciona una constante de canal válida para su modo de canal. Para aplicarlo a más de un canal, combínense las [constantes de canales](#imagick.constants.channel) utilizando un operador a nivel de bits. Por omisión, vale **[Imagick::CHANNEL_DEFAULT](#imagick.constants.channel-default)**. Consúltese la lista de [constantes de canales](#imagick.constants.channel)





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 SPARSECOLORMETHOD_BARYCENTRIC Imagick::sparseColorImage()**

&lt;?php
function renderImageBarycentric2() {
$points = [
[0.30, 0.10, 'red'],
[0.10, 0.80, 'blue'],
[0.70, 0.60, 'lime'],
[0.80, 0.20, 'yellow'],
];
$imagick = createGradientImage(
400, 400,
$points,
\Imagick::SPARSECOLORMETHOD_BARYCENTRIC
);
header("Content-Type: image/png");
echo $imagick-&gt;getImageBlob();
}

?&gt;

    **Ejemplo #2 SPARSECOLORMETHOD_BILINEAR Imagick::sparseColorImage()**

&lt;?php
function renderImageBilinear() {
$points = [[0.30, 0.10, 'red'], [0.10, 0.80, 'blue'], [0.70, 0.60, 'lime'], [0.80, 0.20, 'yellow'],];
$imagick = createGradientImage(500, 500, $points, \Imagick::SPARSECOLORMETHOD_BILINEAR);
header("Content-Type: image/png");
echo $imagick-&gt;getImageBlob();
}

?&gt;

    **Ejemplo #3 SPARSECOLORMETHOD_SPEPARDS Imagick::sparseColorImage()**

&lt;?php
function renderImageShepards() {
$points = [
[0.30, 0.10, 'red'],
[0.10, 0.80, 'blue'],
[0.70, 0.60, 'lime'],
[0.80, 0.20, 'yellow'],
];
$imagick = createGradientImage(600, 600, $points, \Imagick::SPARSECOLORMETHOD_SPEPARDS);
header("Content-Type: image/png");
echo $imagick-&gt;getImageBlob();
}

?&gt;

    **Ejemplo #4 SPARSECOLORMETHOD_VORONOI Imagick::sparseColorImage()**

&lt;?php
function renderImageVoronoi() {
$points = [
[0.30, 0.10, 'red'],
[0.10, 0.80, 'blue'],
[0.70, 0.60, 'lime'],
[0.80, 0.20, 'yellow'],
];
$imagick = createGradientImage(500, 500, $points, \Imagick::SPARSECOLORMETHOD_VORONOI);
header("Content-Type: image/png");
echo $imagick-&gt;getImageBlob();
}

?&gt;

    **Ejemplo #5 SPARSECOLORMETHOD_BARYCENTRIC Imagick::sparseColorImage()**

&lt;?php
function renderImageBarycentric() {
$points = [
[0, 0, 'skyblue'],
[-1, 1, 'skyblue'],
[1, 1, 'black'],
];
$imagick = createGradientImage(600, 200, $points, \Imagick::SPARSECOLORMETHOD_BARYCENTRIC);
header("Content-Type: image/png");
echo $imagick-&gt;getImageBlob();
}

?&gt;

    **Ejemplo #6 createGradientImage is used by other examples. Imagick::sparseColorImage()**

&lt;?php
function createGradientImage($width, $height, $colorPoints, $sparseMethod, $absolute = false) {

    $imagick = new \Imagick();
    $imagick-&gt;newImage($width, $height, "white");
    $imagick-&gt;setImageFormat("png");

    $barycentricPoints = array();

    foreach ($colorPoints as $colorPoint) {

        if ($absolute == true) {
            $barycentricPoints[] = $colorPoint[0];
            $barycentricPoints[] = $colorPoint[1];
        }
        else {
            $barycentricPoints[] = $colorPoint[0] * $width;
            $barycentricPoints[] = $colorPoint[1] * $height;
        }

        if (is_string($colorPoint[2])) {
            $imagickPixel = new \ImagickPixel($colorPoint[2]);
        }
        else if ($colorPoint[2] instanceof \ImagickPixel) {
            $imagickPixel = $colorPoint[2];
        }
        else{
            $errorMessage = sprintf(
                "Value %s is neither a string nor an ImagickPixel class. Cannot use as a color.",
                $colorPoint[2]
            );

            throw new \InvalidArgumentException(
                $errorMessage
            );
        }

        $red = $imagickPixel-&gt;getColorValue(\Imagick::COLOR_RED);
        $green = $imagickPixel-&gt;getColorValue(\Imagick::COLOR_GREEN);
        $blue = $imagickPixel-&gt;getColorValue(\Imagick::COLOR_BLUE);
        $alpha = $imagickPixel-&gt;getColorValue(\Imagick::COLOR_ALPHA);

        $barycentricPoints[] = $red;
        $barycentricPoints[] = $green;
        $barycentricPoints[] = $blue;
        $barycentricPoints[] = $alpha;
    }

    $imagick-&gt;sparseColorImage($sparseMethod, $barycentricPoints);

    return $imagick;

}

?&gt;

# Imagick::spliceImage

(PECL imagick 2, PECL imagick 3)

Imagick::spliceImage — Une un color sólido en la imagen

### Descripción

public **Imagick::spliceImage**(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)

Une un color sólido en la imagen.

### Parámetros

     width








     height








     x








     y







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::spliceImage()**



      &lt;?php

function spliceImage($imagePath, $startX, $startY, $width, $height) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;spliceImage($width, $height, $startX, $startY);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::spreadImage

(PECL imagick 2, PECL imagick 3)

Imagick::spreadImage — Despalza aleatoriamente cada píxel en un bloque

### Descripción

public **Imagick::spreadImage**([float](#language.types.float) $radius): [bool](#language.types.boolean)

Método de efecto especial que desplaza aleatoriamente cada píxel en un bloque
definido por el parámetro radius (radio).

### Parámetros

     radius







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::spreadImage()**



      &lt;?php

function spreadImage($imagePath, $radius) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;spreadImage($radius);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::statisticImage

(PECL imagick 3 &gt;= 3.3.0)

Imagick::statisticImage — Modifica una imagen utilizando una función estadística

### Descripción

public **Imagick::statisticImage**(
    [int](#language.types.integer) $type,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)

Cada píxel es reemplazado por la estadística correspondiente del vecindario de la anchura y altura especificadas.

### Parámetros

    type









    width









    height









    channel





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::statisticImage()**



      &lt;?php

function statisticImage($imagePath, $statisticType, $width, $height, $channel) {
    $imagick = new \Imagick(realpath($imagePath));

    $imagick-&gt;statisticImage(
        $statisticType,
        $width,
        $height,
        $channel
    );

    header("Content-Type: image/jpg");
    echo $imagick-&gt;getImageBlob();

}

statisticImage($imagePath, \Imagick::STATISTIC_MEDIAN, 5, 5, \Imagick::CHANNEL_DEFAULT);

?&gt;

# Imagick::steganoImage

(PECL imagick 2, PECL imagick 3)

Imagick::steganoImage — Oculta una marca de agua digital dentro de la imagen

### Descripción

public **Imagick::steganoImage**([Imagick](#class.imagick) $watermark_wand, [int](#language.types.integer) $offset): [Imagick](#class.imagick)

Oculta una marca de agua digital dentro de la imagen. Recupere la marca de agua oculta
después para demostrar la autenticidad de la imagen. El parámetro offset define la posición
inicial dentro de la imagen para ocultar la marca de agua.

### Parámetros

     watermark_wand








     offset







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::stereoImage

(PECL imagick 2, PECL imagick 3)

Imagick::stereoImage — Compone dos imágenes

### Descripción

public **Imagick::stereoImage**([Imagick](#class.imagick) $offset_wand): [bool](#language.types.boolean)

Compone dos imágenes y produce una sóla imagen que es la composición
de una imagen izquierda y derecha de una pareja estéreo.

### Parámetros

     offset_wand







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::stripImage

(PECL imagick 2, PECL imagick 3)

Imagick::stripImage — Elimina de una imagen todos los perfiles y los comentarios

### Descripción

public **Imagick::stripImage**(): [bool](#language.types.boolean)

Elimina de una imagen todos los perfiles y los comentarios.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

# Imagick::subImageMatch

(PECL imagick 3 &gt;= 3.3.0)

Imagick::subImageMatch — Busca una subimagen en la imagen actual y devuelve una imagen de similitud

### Descripción

public **Imagick::subImageMatch**([Imagick](#class.imagick) $Imagick, [array](#language.types.array) &amp;$offset = ?, [float](#language.types.float) &amp;$similarity = ?): [Imagick](#class.imagick)

Busca una subimagen en la imagen actual y devuelve una imagen de similitud de tal manera que una posición de coincidencia exacta es completamente blanca y si ningún píxel coincide, negro, de lo contrario un cierto nivel de gris entre ambos. Asimismo, pueden pasarse los argumentos opcionales bestMatch y similarity. Tras llamar a la función, similarity será definido en el 'puntuación' de similitud entre la subimagen y la posición correspondiente en la imagen más grande, bestMatch contendrá un array asociativo con los elementos x, y, width, height que describen la región correspondiente.

### Parámetros

    Imagick









    offset









    similarity


      Una nueva imagen que muestra la cantidad de similitud en cada píxel.


### Valores devueltos

### Ejemplos

      **Ejemplo #1  Imagick::subImageMatch()**



      &lt;?php

function subImageMatch($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick2 = clone $imagick;
$imagick2-&gt;cropimage(40, 40, 250, 110);
$imagick2-&gt;vignetteimage(0, 1, 3, 3);

    $similarity = null;
    $bestMatch = null;
    $comparison = $imagick-&gt;subImageMatch($imagick2, $bestMatch, $similarity);

    $comparison-&gt;setImageFormat('png');
    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::swirlImage

(PECL imagick 2, PECL imagick 3)

Imagick::swirlImage — Arremolina los píxeles desde el centro de la imagen

### Descripción

**Imagick::swirlImage**([float](#language.types.float) $degrees): [bool](#language.types.boolean)

Arremolina los píxeles desde el centro de la imagen, donde los grados indican
el alcance del arco a través del cuál cada píxel es movido. Se puede obtener un efecto
más dramático moviendo los grados desde 1 a 360.

### Parámetros

     degrees







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::swirlImage()**



      &lt;?php

function swirlImage($imagePath, $swirl) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;swirlImage($swirl);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::textureImage

(PECL imagick 2, PECL imagick 3)

Imagick::textureImage — Repite los mosaicos de la textura de una imagen

### Descripción

**Imagick::textureImage**([Imagick](#class.imagick) $texture_wand): [Imagick](#class.imagick)

Repite los mosaicos de la textura de una imagen mediante el lienzo de la imagen.

### Parámetros

     texture_wand


       Objeto Imagick a utilizar como imagen de textura





### Valores devueltos

Devuelve un nuevo objeto Imagick, al que se le ha aplicado la textura repetida.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1 Ejemplo con Imagick::textureImage()**



      &lt;?php

function textureImage($imagePath) {
    $image = new \Imagick();
    $image-&gt;newImage(640, 480, new \ImagickPixel('pink'));
    $image-&gt;setImageFormat("jpg");
    $texture = new \Imagick(realpath($imagePath));
$texture-&gt;scaleimage($image-&gt;getimagewidth() / 4, $image-&gt;getimageheight() / 4);
    $image = $image-&gt;textureImage($texture);
header("Content-Type: image/jpg");
echo $image;
}

?&gt;

# Imagick::thresholdImage

(PECL imagick 2, PECL imagick 3)

Imagick::thresholdImage — Cambia el valor de píexeles individuales basdos en un umbral

### Descripción

public **Imagick::thresholdImage**([float](#language.types.float) $threshold, [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT): [bool](#language.types.boolean)

Cambia el valor de píxeles individuales basados en la inatensidad de cada píxel
comparado con el umbral. El resultado es una imagen de alto contraste de dos colores.

### Parámetros

     threshold








     channel







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::thresholdImage()**



      &lt;?php

function thresholdimage($imagePath, $threshold, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;thresholdimage($threshold \* \Imagick::getQuantum(), $channel);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::thumbnailImage

(PECL imagick 2, PECL imagick 3)

Imagick::thumbnailImage — Modifica el tamaño de una imagen

### Descripción

public **Imagick::thumbnailImage**(
    [int](#language.types.integer) $columns,
    [int](#language.types.integer) $rows,
    [bool](#language.types.boolean) $bestfit = **[false](#constant.false)**,
    [bool](#language.types.boolean) $fill = **[false](#constant.false)**,
    [bool](#language.types.boolean) $legacy = **[false](#constant.false)**
): [bool](#language.types.boolean)

Modifica el tamaño de una imagen a las dimensiones dadas y elimina
todos los perfiles asociados. El objetivo es producir una miniatura de bajo costo para su visualización en la web.
Si **[true](#constant.true)** se proporciona como tercer argumento, entonces los argumentos
columns y rows se utilizarán como máximo para cada lado. Cada lado se reducirá hasta que se alcance el tamaño deseado.

**Nota**:

    El comportamiento del parámetro bestfit cambió con Imagick 3.0.0.
    Antes de esta versión, proporcionar las dimensiones 400x400 a una imagen de dimensiones 200x150
    hacía que la parte izquierda permaneciera sin cambios. Con Imagick 3.0.0 y posteriores, la
    imagen se reduce al tamaño 400x300, siendo este el mejor resultado para esas dimensiones. Si el parámetro bestfit es utilizado, la anchura y la altura deben ser proporcionadas.

### Parámetros

     columns


       Ancho de la imagen






     rows


       Alto de la imagen






     bestfit


       Si se deben forzar los valores máximos






     fill


       Si la imagen no llena completamente el área, entonces esta se rellena con
       el color de fondo de la imagen.






     legacy


       Redondea la dimensión más pequeña al entero inferior más cercano.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1 Ejemplo con Imagick::thumbnailImage()**



      &lt;?php

function thumbnailImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;setbackgroundcolor('rgb(64, 64, 64)');
$imagick-&gt;thumbnailImage(100, 100, true, true);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::tintImage

(PECL imagick 2, PECL imagick 3)

Imagick::tintImage — Aplica un vector de color a cada píxel en la imagen

### Descripción

public **Imagick::tintImage**([mixed](#language.types.mixed) $tint, [mixed](#language.types.mixed) $opacity, [bool](#language.types.boolean) $legacy = **[false](#constant.false)**): [bool](#language.types.boolean)

Aplica un vector de color a cada píxel en la imagen. La longitud del vector
es 0 para blanco y negro y su máximo para los medios-tonos. La función de precisión
del vector es f(x)=(1-(4.0*((x-0.5)*(x-0.5)))).

### Parámetros

     tint








     opacity







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       PECL imagick 2.1.0

        Ahora se permite que una string represente el color como primer parámetro y
        que un valor de tipo float represente la opacidad como segundo parámetro.
        Versiones previas sólo permitían un objeto ImagickPixel.





### Ejemplos

      **Ejemplo #1  Imagick::tintImage()**



      &lt;?php

function tintImage($r, $g, $b, $a) {
$a = $a / 100;

    $imagick = new \Imagick();
    $imagick-&gt;newPseudoImage(400, 400, 'gradient:black-white');

    $tint = new \ImagickPixel("rgb($r, $g, $b)");
    $opacity = new \ImagickPixel("rgb(128, 128, 128, $a)");
    $imagick-&gt;tintImage($tint, $opacity);
    $imagick-&gt;setImageFormat('png');
    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::\_\_toString

(PECL imagick 2, PECL imagick 3)

Imagick::\_\_toString — Devuelve la imagen como un string

### Descripción

public **Imagick::\_\_toString**(): [string](#language.types.string)

Devuelve la imagen actual como un string. Solamente devolverá una única imagen; no debería usarse con objetos Imagick que contengan varias imágenges, p.ej., un GIF animado o un PDF con varias páginas.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el contenido del string en caso de éxito o un string vacío en caso de fallo.

### Ver también

- [Imagick::getImageBlob()](#imagick.getimageblob) - Devuelve la secuencia de imágenes como un blob

- [Imagick::getImagesBlob()](#imagick.getimagesblob) - Devuelve todas las imágenes de la secuencia en un BLOB

# Imagick::transformImage

(PECL imagick 2, PECL imagick 3)

Imagick::transformImage — Método conveniente para establecer el tamaño del recorte y la geometría de la imagen

**Advertencia**Esta función está _DEPRECADA_ a partir de Imagick 3.4.4. Depender de esta funcionalidad está fuertemente desaconsejado.

### Descripción

public **Imagick::transformImage**([string](#language.types.string) $crop, [string](#language.types.string) $geometry): [Imagick](#class.imagick)

Método conveniente para establecer el tamaño del recorte y la geometría de la imagen desde cadenas.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

     crop


       Un string de geometría de recorte. Esta geometría define una sub-región de la imagen a recortar.






     geometry


       Un string de geometría de imagen. Esta geometría define el tamaño final de la imagen.





### Valores devueltos

Devuelve un objeto Imagick que contiene la imagen transformada.

### Ejemplos

    **Ejemplo #1 Usar Imagick::transformImage()**:



     El ejemplo crea una imagen negra de 100x100 black.

&lt;?php
$imagen = new Imagick();
$imagen-&gt;newImage(300, 200, "black");
$imagen_nueva = $imagen-&gt;transformImage("100x100", "100x100");
$imagen_nueva-&gt;writeImage('test_out.jpg');
?&gt;

### Ver también

    - [Imagick::cropImage()](#imagick.cropimage) - Extrae una región de la imagen

    - [Imagick::resizeImage()](#imagick.resizeimage) - Escala una imagen

    - [Imagick::thumbnailImage()](#imagick.thumbnailimage) - Modifica el tamaño de una imagen

# Imagick::transformImageColorspace

(PECL imagick 3)

Imagick::transformImageColorspace — Transforma una imagen en un nuevo espacio de color

### Descripción

public **Imagick::transformImageColorspace**([int](#language.types.integer) $colorspace): [bool](#language.types.boolean)

    Transforma una imagen en un nuevo espacio de color.

### Parámetros

    colorspace


       El espacio de color al que debe transformarse la imagen, una de las [constantes COLORSPACE](#imagick.constants.colorspace), por ejemplo Imagick::COLORSPACE_CMYK.


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

**Ejemplo #1 Imagick::transformImageColorspace()** ejemplo

    Transforma una imagen en un nuevo espacio de color, luego extrae un solo canal para que los valores individuales de canal puedan visualizarse.

&lt;?php
function transformImageColorspace($imagePath, $colorSpace, $channel) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;transformimagecolorspace($colorSpace);
//channel debe ser una de las constantes de canal, por ejemplo \Imagick::CHANNEL_BLUE
$imagick-&gt;separateImageChannel($channel);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}
?&gt;

### Ver también

- [Imagick::setColorSpace()](#imagick.setcolorspace) - Establecer el espacio de color

# Imagick::transparentPaintImage

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::transparentPaintImage — Pinta píxeles transparentes

### Descripción

public **Imagick::transparentPaintImage**(
    [mixed](#language.types.mixed) $target,
    [float](#language.types.float) $alpha,
    [float](#language.types.float) $fuzz,
    [bool](#language.types.boolean) $invert
): [bool](#language.types.boolean)

Pinta píxeles transparente que coincidan con el color objetivo.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.8 o superior.

### Parámetros

     target


       El color objetivo a pintar






     alpha


       El grado de transparencia: 1.0 corresponde a totalmente opaco y 0.0 a totalmente transparente.






     fuzz


       La cantidad de polvo de papel. Por ejemplo, definir el polvo de papel a 10 y el color rojo a una intensidad de 100 y 102 no será interpretado como el mismo color.






     invert


       Si es **[true](#constant.true)** pinta cualquier píxel que no coincida con el color objetivo.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  Imagick::transparentPaintImage()**



      &lt;?php

function transparentPaintImage($color, $alpha, $fuzz) {
$imagick = new \Imagick(realpath("images/BlueScreen.jpg"));

    //Need to be in a format that supports transparency
    $imagick-&gt;setimageformat('png');

    $imagick-&gt;transparentPaintImage(
        $color, $alpha, $fuzz * \Imagick::getQuantum(), false
    );

    //Not required, but helps tidy up left over pixels
    $imagick-&gt;despeckleimage();

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# Imagick::transposeImage

(PECL imagick 2, PECL imagick 3)

Imagick::transposeImage — Aplica una simetría vertical

### Descripción

public **Imagick::transposeImage**(): [bool](#language.types.boolean)

Aplica una simetría vertical, creando la reflexión de cada
píxel alrededor de un eje horizontal, con una rotación de 90 grados.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1 Ejemplo con Imagick::transposeImage()**



      &lt;?php

function transposeImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;transposeImage();
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

### Ver también

    - [Imagick::transverseImage()](#imagick.transverseimage) - Crea un espejo horizontal de la imagen

# Imagick::transverseImage

(PECL imagick 2, PECL imagick 3)

Imagick::transverseImage — Crea un espejo horizontal de la imagen

### Descripción

public **Imagick::transverseImage**(): [bool](#language.types.boolean)

Crea un espejo horizontal de la imagen reflejando los píxeles alrededor
de un eje Y central, y realizando una rotación de 270 grados.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1 Ejemplo con Imagick::transverseImage()**



      &lt;?php

function transverseImage($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;transverseImage();
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

### Ver también

    - [Imagick::transposeImage()](#imagick.transposeimage) - Aplica una simetría vertical

# Imagick::trimImage

(PECL imagick 2, PECL imagick 3)

Imagick::trimImage — Elimina los extremos de la imagen

### Descripción

public **Imagick::trimImage**([float](#language.types.float) $fuzz): [bool](#language.types.boolean)

Elimina los extremos que son el color de fondo de la imagen.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

     fuzz


       Por defecto, el objetivo debe coincidir exactamente con un color de píxel en particular.
       Sin embargo, en la mayoría de los casos dos colores pueden diferir por una cantidad pequeña.
       El miembro enfoque de la imagen define cuánta tolerancia es aceptable
       para considerar que dos colores son el mismo. Este parámetro represenata la variación
       del rango de cuantía.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Usar Imagick::trimImage()**:



     Recortar una imagen, después mostrarla en el navegador.

&lt;?php
/_ Crear el objeto y leer la imagen _/
$im = new Imagick("imagen.jpg");

/_ Recortar la imagen. _/
$im-&gt;trimImage(0);

/_ Imprimir la imagen _/
header("Content-Type: image/" . $im-&gt;getImageFormat());
echo $im;
?&gt;

### Ver también

    - [Imagick::getQuantumDepth()](#imagick.getquantumdepth) - Lee la profundidad cuántica

    - [Imagick::getQuantumRange()](#imagick.getquantumrange) - Devuelve el intervalo cuántico de Imagick

    - [imagecropauto()](#function.imagecropauto) - Recorta una imagen automáticamente utilizando uno de los modos disponibles

# Imagick::uniqueImageColors

(PECL imagick 2,PECL imagick 3)

Imagick::uniqueImageColors — Se conserva únicamente un color de píxel

### Descripción

public **Imagick::uniqueImageColors**(): [bool](#language.types.boolean)

Se conserva únicamente un color de píxel y se eliminan los demás.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::uniqueImageColors()**

&lt;?php
function uniqueImageColors($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
//Reduce la imagen a 256 colores de forma agradable.
$imagick-&gt;quantizeImage(256, \Imagick::COLORSPACE_YIQ, 0, false, false);
    $imagick-&gt;uniqueImageColors();
    $imagick-&gt;scaleimage($imagick-&gt;getImageWidth(), $imagick-&gt;getImageHeight() \* 20);
header("Content-Type: image/png");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::unsharpMaskImage

(PECL imagick 2, PECL imagick 3)

Imagick::unsharpMaskImage — Afila una imagen

### Descripción

public **Imagick::unsharpMaskImage**(
    [float](#language.types.float) $radius,
    [float](#language.types.float) $sigma,
    [float](#language.types.float) $amount,
    [float](#language.types.float) $threshold,
    [int](#language.types.integer) $channel = Imagick::CHANNEL_DEFAULT
): [bool](#language.types.boolean)

Afila una imagen. Se convoluciona la imagen con un operador gaussiano
del radio y la desviación estándar (sigma) dados. Para obtener resultados
razonables, el radio debería ser mayor que sigma. Use un radio de 0 y
Imagick::sketchImage() seleccionará un radio apropiado automáticamente.

### Parámetros

     radius








     sigma








     amount








     threshold








     channel







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

      **Ejemplo #1  Imagick::unsharpMaskImage()**



      &lt;?php

function unsharpMaskImage($imagePath, $radius, $sigma, $amount, $unsharpThreshold) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;unsharpMaskImage($radius, $sigma, $amount, $unsharpThreshold);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::valid

(PECL imagick 2, PECL imagick 3)

Imagick::valid — Verifica si el elemento actual es válido

### Descripción

public **Imagick::valid**(): [bool](#language.types.boolean)

Verifica si el elemento actual es válido.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::vignetteImage

(PECL imagick 2, PECL imagick 3)

Imagick::vignetteImage — Añade un filtro de viñeta a la imagen

### Descripción

public **Imagick::vignetteImage**(
    [float](#language.types.float) $blackPoint,
    [float](#language.types.float) $whitePoint,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [bool](#language.types.boolean)

Suaviza los contornos de la imagen, al estilo de las viñetas.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

     blackPoint


       El radio del desenfoque






     whitePoint


       La desviación estándar






     x


       La abscisa de la elipse.






     y


       La ordenada de la elipse.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1 Ejemplo con Imagick::vignetteImage()**



      &lt;?php

function vignetteImage($imagePath, $blackPoint, $whitePoint, $x, $y) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;vignetteImage($blackPoint, $whitePoint, $x, $y);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

### Ver también

    - [Imagick::waveImage()](#imagick.waveimage) - Añade un filtro de ondas a la imagen

    - [Imagick::swirlImage()](#imagick.swirlimage) - Arremolina los píxeles desde el centro de la imagen

# Imagick::waveImage

(PECL imagick 2, PECL imagick 3)

Imagick::waveImage — Añade un filtro de ondas a la imagen

### Descripción

public **Imagick::waveImage**([float](#language.types.float) $amplitude, [float](#language.types.float) $length): [bool](#language.types.boolean)

Añade un filtro de ondas a la imagen.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.2.9 o superior.

### Parámetros

     amplitude


       Amplitud de la onda.






     length


       Longitud de la onda.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Errores/Excepciones

Lanza una excepción [ImagickException](#class.imagickexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 WaveImage puede ser muy lento ; Imagick::waveImage()**

&lt;?php
function waveImage($imagePath, $amplitude, $length) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;waveImage($amplitude, $length);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

### Ver también

    - [Imagick::solarizeImage()](#imagick.solarizeimage) - Aplica un efecto de solarización a la imagen

    - [Imagick::oilpaintImage()](#imagick.oilpaintimage) - Simula una pintura al óleo

    - [Imagick::embossImage()](#imagick.embossimage) - Devuelve una imagen en escala de grises con un efecto tridimensional

    - [Imagick::addNoiseImage()](#imagick.addnoiseimage) - Añade ruido aleatorio a la imagen

    - [Imagick::swirlImage()](#imagick.swirlimage) - Arremolina los píxeles desde el centro de la imagen

# Imagick::whiteThresholdImage

(PECL imagick 2, PECL imagick 3)

Imagick::whiteThresholdImage — Fuerza a todos los píxeles por encima del umbral a ser blancos

### Descripción

public **Imagick::whiteThresholdImage**([mixed](#language.types.mixed) $threshold): [bool](#language.types.boolean)

Es como Imagick::ThresholdImage() excepto que fuerza a todos los píxeles por encima del umbral
a ser blancos dejando todos los píxeles por debajo del umbral sin cambios.

### Parámetros

     threshold







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Historial de cambios

       Versión
       Descripción






       ECL imagick 2.1.0

        Ahora se permite que una cadena represente el color como parámetro.
        Versiones previas sólo permitían un objeto ImagickPixel.





### Ejemplos

      **Ejemplo #1  Imagick::whiteThresholdImage()**



      &lt;?php

function whiteThresholdImage($imagePath, $color) {
    $imagick = new \Imagick(realpath($imagePath));
$imagick-&gt;whiteThresholdImage($color);
header("Content-Type: image/jpg");
echo $imagick-&gt;getImageBlob();
}

?&gt;

# Imagick::writeImage

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::writeImage — Escribe una imagen al nombre de fichero especificado

### Descripción

public **Imagick::writeImage**([string](#language.types.string) $filename = NULL): [bool](#language.types.boolean)

Escribe una imagen al nombre de fichero especificado. Si el parámetro 'filename' es NULL,
la imagen se escribe en el nombre de fichero establecido por Imagick::readImage() o
Imagick::setImageFilename().

### Parámetros

     filename


       Nombre del fichero donde escribir la imagen. La extensión del nombre de fichero
       define el tipo del fichero.
       El formato puede ser forzado independientemente del formato que use la extensión del fichero:
       usando un prefijo, por ejemplo "jpg:test.png".





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::writeImageFile

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::writeImageFile — Escribe una imagen en un descriptor de archivo

### Descripción

public **Imagick::writeImageFile**([resource](#language.types.resource) $filehandle, [string](#language.types.string) $format = ?): [bool](#language.types.boolean)

Escribe la secuencia de la imagen en un descriptor de archivo abierto.
El descriptor debe haber sido abierto con, por ejemplo, la función fopen.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.

### Parámetros

     filehandle


       Descriptor de archivo en el cual la imagen será escrita.






     format


       El formato de la imagen.
       La lista de especificadores de formato válidos depende del conjunto de funcionalidades compilado de ImageMagick,
       y puede ser consultada en tiempo de ejecución mediante [Imagick::queryFormats()](#imagick.queryformats).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ver también

- [Imagick::queryFormats()](#imagick.queryformats) - Devuelve los formatos soportados por Imagick

# Imagick::writeImages

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::writeImages — Escribe una imagen o secuencia de imágenes

### Descripción

public **Imagick::writeImages**([string](#language.types.string) $filename, [bool](#language.types.boolean) $adjoin): [bool](#language.types.boolean)

Escribe una imagen o secuencia de imágenes.

### Parámetros

     filename








     adjoin







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# Imagick::writeImagesFile

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

Imagick::writeImagesFile — Escribe los frames en un descriptor de ficheros

### Descripción

public **Imagick::writeImagesFile**([resource](#language.types.resource) $filehandle, [string](#language.types.string) $format = ?): [bool](#language.types.boolean)

Escribe todas las frames de una imagen en un descriptor de fichero.
Este método puede ser utilizado para escribir gifs animados u otras
imágenes compuestas por múltiples frames en un descriptor de fichero abierto.
Este método solo está disponible si Imagick ha sido compilado con ImageMagick versión 6.3.6 o superior.

### Parámetros

     filehandle


       Descriptor de fichero en el que se escribirán las frames.






     format


       El formato de la imagen.
       La lista de especificadores de formato válidos depende del conjunto de características compiladas de ImageMagick,
       y puede ser consultada en tiempo de ejecución mediante [Imagick::queryFormats()](#imagick.queryformats).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ver también

- [Imagick::queryFormats()](#imagick.queryformats) - Devuelve los formatos soportados por Imagick

## Tabla de contenidos

- [Imagick::adaptiveBlurImage](#imagick.adaptiveblurimage) — Añade un filtro de borrosidad adaptativo a la imagen
- [Imagick::adaptiveResizeImage](#imagick.adaptiveresizeimage) — Redimensiona una imagen adaptativamente con información dependiente de la triangulación
- [Imagick::adaptiveSharpenImage](#imagick.adaptivesharpenimage) — Afila la imagen adaptativamente
- [Imagick::adaptiveThresholdImage](#imagick.adaptivethresholdimage) — Selecciona un umbral para cada píxel basado en un rango de intensidad
- [Imagick::addImage](#imagick.addimage) — Añade una nueva imagen a la lista de imágenes del objeto Imagick
- [Imagick::addNoiseImage](#imagick.addnoiseimage) — Añade ruido aleatorio a la imagen
- [Imagick::affineTransformImage](#imagick.affinetransformimage) — Transforma una imagen
- [Imagick::animateImages](#imagick.animateimages) — Anima una imagen o imágenes
- [Imagick::annotateImage](#imagick.annotateimage) — Anota una imagen con texto
- [Imagick::appendImages](#imagick.appendimages) — Añade un conjunto de imágenes
- [Imagick::autoLevelImage](#imagick.autolevelimage) — Ajusta el nivel de un canal de una imagen particular
- [Imagick::averageImages](#imagick.averageimages) — Promedio de un conjunto de imágenes
- [Imagick::blackThresholdImage](#imagick.blackthresholdimage) — Fuerza a todos los píxeles bajo un umbral a ser negros
- [Imagick::blueShiftImage](#imagick.blueshiftimage) — Atenúa los colores de la imagen
- [Imagick::blurImage](#imagick.blurimage) — Añade un filtro de borrosidad a la imagen
- [Imagick::borderImage](#imagick.borderimage) — Rodea la imagen con un borde
- [Imagick::brightnessContrastImage](#imagick.brightnesscontrastimage) — Cambia el brillo y/o el contraste de una imagen
- [Imagick::charcoalImage](#imagick.charcoalimage) — Simula un dibujo a carboncillo
- [Imagick::chopImage](#imagick.chopimage) — Borra una región de una imagen y la recorta
- [Imagick::clampImage](#imagick.clampimage) — Restringe el rango de colores de 0 a la profundidad cuántica
- [Imagick::clear](#imagick.clear) — Libera todos los recursos asociados a un objeto Imagick
- [Imagick::clipImage](#imagick.clipimage) — Se alinea con el primer camino de un perfil 8BIM
- [Imagick::clipImagePath](#imagick.clipimagepath) — Recorta a lo largo de las rutas nombradas del perfil 8BIM, si está presente
- [Imagick::clipPathImage](#imagick.clippathimage) — Recorta a lo largo de trazados nominados desde un perfil 8BIM
- [Imagick::clone](#imagick.clone) — Realiza una copia exacta de un objeto Imagick
- [Imagick::clutImage](#imagick.clutimage) — Reemplaza los colores de una imagen
- [Imagick::coalesceImages](#imagick.coalesceimages) — Componer un conjunto de imágenes
- [Imagick::colorFloodfillImage](#imagick.colorfloodfillimage) — Cambia el valor del color de cualquier píxel que coincida con el objetivo
- [Imagick::colorizeImage](#imagick.colorizeimage) — Mezcla el color de relleno con la imagen
- [Imagick::colorMatrixImage](#imagick.colormatriximage) — Aplica una transformación de color a una imagen
- [Imagick::combineImages](#imagick.combineimages) — Combina una o más imágenes en una sóla imagen
- [Imagick::commentImage](#imagick.commentimage) — Añade un comentario a la imagen
- [Imagick::compareImageChannels](#imagick.compareimagechannels) — Devuelve la diferencia entre una o más imágenes
- [Imagick::compareImageLayers](#imagick.compareimagelayers) — Devuelve la región circundante máxima entre imágenes
- [Imagick::compareImages](#imagick.compareimages) — Compara una imagen con otra reconstruida
- [Imagick::compositeImage](#imagick.compositeimage) — Compone una imagen en otra
- [Imagick::\_\_construct](#imagick.construct) — El constructor Imagick
- [Imagick::contrastImage](#imagick.contrastimage) — Cambia el contraste de una imagen
- [Imagick::contrastStretchImage](#imagick.contraststretchimage) — Mejora el contraste de una imagen en color
- [Imagick::convolveImage](#imagick.convolveimage) — Aplica una semilla de convolución a medida a la imagen
- [Imagick::count](#imagick.count) — Devuelve el número de imágenes
- [Imagick::cropImage](#imagick.cropimage) — Extrae una región de la imagen
- [Imagick::cropThumbnailImage](#imagick.cropthumbnailimage) — Crea una miniatura recortada
- [Imagick::current](#imagick.current) — Devuelve una referencia al objeto Imagick actual
- [Imagick::cycleColormapImage](#imagick.cyclecolormapimage) — Desplaza el mapa de colores de una imagen
- [Imagick::decipherImage](#imagick.decipherimage) — Descifra una imagen
- [Imagick::deconstructImages](#imagick.deconstructimages) — Devuelve las diferencias de ciertos píxeles entre dos imágenes
- [Imagick::deleteImageArtifact](#imagick.deleteimageartifact) — Borra un artefacto de imagen
- [Imagick::deleteImageProperty](#imagick.deleteimageproperty) — Elimina una propiedad de imagen
- [Imagick::deskewImage](#imagick.deskewimage) — Elimina la torción de la imagen
- [Imagick::despeckleImage](#imagick.despeckleimage) — Reduce el ruido speckle de una imagen
- [Imagick::destroy](#imagick.destroy) — Destruye un objeto Imagick
- [Imagick::displayImage](#imagick.displayimage) — Muestra una imagen
- [Imagick::displayImages](#imagick.displayimages) — Muestra una imagen o una secuencia de imágenes
- [Imagick::distortImage](#imagick.distortimage) — Deforma una imagen utilizando varios métodos de distorsión
- [Imagick::drawImage](#imagick.drawimage) — Renderiza el objeto ImagickDraw a la imagen actual
- [Imagick::edgeImage](#imagick.edgeimage) — Mejora los bordes de la imagen
- [Imagick::embossImage](#imagick.embossimage) — Devuelve una imagen en escala de grises con un efecto tridimensional
- [Imagick::encipherImage](#imagick.encipherimage) — Cifra una imagen
- [Imagick::enhanceImage](#imagick.enhanceimage) — Mejora la calidad de una imagen ruidosa
- [Imagick::equalizeImage](#imagick.equalizeimage) — Iguala el histograma de una imagen
- [Imagick::evaluateImage](#imagick.evaluateimage) — Aplica una expresión a una imagen
- [Imagick::exportImagePixels](#imagick.exportimagepixels) — Exporta los píxeles brutos de la imagen
- [Imagick::extentImage](#imagick.extentimage) — Establecer el tamaño de la imagen
- [Imagick::filter](#imagick.filter) — Aplica un núcleo de convolución personalizado a la imagen
- [Imagick::flattenImages](#imagick.flattenimages) — Fusiona una secuencia de imágenes
- [Imagick::flipImage](#imagick.flipimage) — Crea una imagen por espejo vertical
- [Imagick::floodFillPaintImage](#imagick.floodfillpaintimage) — Cambia el valor del color de cualquier píxel que coincida con el objetivo
- [Imagick::flopImage](#imagick.flopimage) — Crea una imagen por espejo horizontal
- [Imagick::forwardFourierTransformImage](#imagick.forwardfouriertransformimage) — Implementa la transformada discreta de Fourier (Discrete Fourier Transform - DFT)
- [Imagick::frameImage](#imagick.frameimage) — Añade un borde tridimensional simulado
- [Imagick::functionImage](#imagick.functionimage) — Aplica una función sobre la imagen
- [Imagick::fxImage](#imagick.fximage) — Evalúa una expresión por cada píxel de la imagen
- [Imagick::gammaImage](#imagick.gammaimage) — Corrección gamma de una imagen
- [Imagick::gaussianBlurImage](#imagick.gaussianblurimage) — Hace borrosa una imagen
- [Imagick::getColorspace](#imagick.getcolorspace) — Obtiene el espacio de colores
- [Imagick::getCompression](#imagick.getcompression) — Lee el tipo de compresión
- [Imagick::getCompressionQuality](#imagick.getcompressionquality) — Lee la calidad de la compresión
- [Imagick::getCopyright](#imagick.getcopyright) — Devuelve el copyright de la API ImageMagick
- [Imagick::getFilename](#imagick.getfilename) — Lee el nombre del fichero asociado a una secuencia
- [Imagick::getFont](#imagick.getfont) — Obtiene la fuente de caracteres
- [Imagick::getFormat](#imagick.getformat) — Devuelve el formato de la imagen Imagick
- [Imagick::getGravity](#imagick.getgravity) — Obtiene la gravedad
- [Imagick::getHomeURL](#imagick.gethomeurl) — Devuelve la URL de ImageMagick
- [Imagick::getImage](#imagick.getimage) — Devuelve un nuevo objeto Imagick
- [Imagick::getImageAlphaChannel](#imagick.getimagealphachannel) — Verifica si la imagen tiene un canal alfa
- [Imagick::getImageArtifact](#imagick.getimageartifact) — Obtener el artefacto de imagen
- [Imagick::getImageAttribute](#imagick.getimageattribute) — Obtiene un atributo nombrado
- [Imagick::getImageBackgroundColor](#imagick.getimagebackgroundcolor) — Devuelve el color de fondo
- [Imagick::getImageBlob](#imagick.getimageblob) — Devuelve la secuencia de imágenes como un blob
- [Imagick::getImageBluePrimary](#imagick.getimageblueprimary) — Devuelve el punto primario azul de la cromaticidad
- [Imagick::getImageBorderColor](#imagick.getimagebordercolor) — Devuelve el color del borde de la imagen
- [Imagick::getImageChannelDepth](#imagick.getimagechanneldepth) — Obtiene la profundidad de un canal de imagen en particular
- [Imagick::getImageChannelDistortion](#imagick.getimagechanneldistortion) — Compara los canales de imagen de una imagen con una imagen reconstruida
- [Imagick::getImageChannelDistortions](#imagick.getimagechanneldistortions) — Obtiene las distorsiones de un canal
- [Imagick::getImageChannelExtrema](#imagick.getimagechannelextrema) — Obtiene los extremos de uno o más canales de imagen
- [Imagick::getImageChannelKurtosis](#imagick.getimagechannelkurtosis) — Obtiene la curtosis y la asimetría estadística de un canal específico
- [Imagick::getImageChannelMean](#imagick.getimagechannelmean) — Obtiene la media y la desviación estándar
- [Imagick::getImageChannelRange](#imagick.getimagechannelrange) — Obtiene el rango del canal
- [Imagick::getImageChannelStatistics](#imagick.getimagechannelstatistics) — Devuelve estadísticas sobre cada canal de la imagen
- [Imagick::getImageClipMask](#imagick.getimageclipmask) — Obtiene la máscara de recorte de la imagen
- [Imagick::getImageColormapColor](#imagick.getimagecolormapcolor) — Devuelve el color del índice del mapa de colores especficado
- [Imagick::getImageColors](#imagick.getimagecolors) — Lee el número de colores únicos de la imagen
- [Imagick::getImageColorspace](#imagick.getimagecolorspace) — Obtiene el espacio de colores de la imagen
- [Imagick::getImageCompose](#imagick.getimagecompose) — Devuelve el operador de composición asociado a una imagen
- [Imagick::getImageCompression](#imagick.getimagecompression) — Lee el tipo de compresión de la imagen
- [Imagick::getImageCompressionQuality](#imagick.getimagecompressionquality) — Lee la calidad de compresión de la imagen
- [Imagick::getImageDelay](#imagick.getimagedelay) — Lee el retraso de la imagen
- [Imagick::getImageDepth](#imagick.getimagedepth) — Se lee la profundidad de la imagen
- [Imagick::getImageDispose](#imagick.getimagedispose) — Lee el método de recuperación
- [Imagick::getImageDistortion](#imagick.getimagedistortion) — Compara una imagen con una imagen reconstruida
- [Imagick::getImageExtrema](#imagick.getimageextrema) — Lee los extremos de una imagen
- [Imagick::getImageFilename](#imagick.getimagefilename) — Devuelve el nombre de un fichero para una imagen en una secuencia
- [Imagick::getImageFormat](#imagick.getimageformat) — Devuelve el formato de una imagen en una secuencia
- [Imagick::getImageGamma](#imagick.getimagegamma) — Obtiene el gamma de la imagen
- [Imagick::getImageGeometry](#imagick.getimagegeometry) — Lee las dimensiones de la imagen en un array
- [Imagick::getImageGravity](#imagick.getimagegravity) — Obtiene la gravedad de la imagen
- [Imagick::getImageGreenPrimary](#imagick.getimagegreenprimary) — Devuelve la cromaticidad del color verde
- [Imagick::getImageHeight](#imagick.getimageheight) — Devuelve la altura de la imagen
- [Imagick::getImageHistogram](#imagick.getimagehistogram) — Devuelve el histograma de la imagen
- [Imagick::getImageIndex](#imagick.getimageindex) — Obtiene el índice de la imagen actual
- [Imagick::getImageInterlaceScheme](#imagick.getimageinterlacescheme) — Se lee el esquema de entrelazado de la imagen
- [Imagick::getImageInterpolateMethod](#imagick.getimageinterpolatemethod) — Devuelve el método de interpolación
- [Imagick::getImageIterations](#imagick.getimageiterations) — Obtiene las iteraciones de la imagen
- [Imagick::getImageLength](#imagick.getimagelength) — Devuelve el tamaño de la imagen en bytes
- [Imagick::getImageMatte](#imagick.getimagematte) — Indica si la imagen tiene un canal mat
- [Imagick::getImageMatteColor](#imagick.getimagemattecolor) — Devuelve el color mate de la imagen
- [Imagick::getImageMimeType](#imagick.getimagemimetype) — Devuelve el tipo MIME de la imagen
- [Imagick::getImageOrientation](#imagick.getimageorientation) — Lee la orientación de la imagen
- [Imagick::getImagePage](#imagick.getimagepage) — Devuelve la geometría de la página
- [Imagick::getImagePixelColor](#imagick.getimagepixelcolor) — Devuelve el color del píxel especificado
- [Imagick::getImageProfile](#imagick.getimageprofile) — Devuelve el perfil nominado de la imagen
- [Imagick::getImageProfiles](#imagick.getimageprofiles) — Devuelve los perfiles de la imagen
- [Imagick::getImageProperties](#imagick.getimageproperties) — Devuelve las propiedades EXIF de la imagen
- [Imagick::getImageProperty](#imagick.getimageproperty) — Devuelve una propiedad de una imagen
- [Imagick::getImageRedPrimary](#imagick.getimageredprimary) — Devuelve la cromaticidad del punto rojo
- [Imagick::getImageRegion](#imagick.getimageregion) — Extrae una región de la imagen
- [Imagick::getImageRenderingIntent](#imagick.getimagerenderingintent) — Lee el método de renderizado de la imagen
- [Imagick::getImageResolution](#imagick.getimageresolution) — Lee las resoluciones en X y Y de una imagen
- [Imagick::getImagesBlob](#imagick.getimagesblob) — Devuelve todas las imágenes de la secuencia en un BLOB
- [Imagick::getImageScene](#imagick.getimagescene) — Devuelve la escena de la imagen
- [Imagick::getImageSignature](#imagick.getimagesignature) — Genera una firma SHA-256
- [Imagick::getImageSize](#imagick.getimagesize) — Devuelve el tamaño de la imagen en bytes
- [Imagick::getImageTicksPerSecond](#imagick.getimagetickspersecond) — Se leen los ticks-por-segundo de la imagen
- [Imagick::getImageTotalInkDensity](#imagick.getimagetotalinkdensity) — Lee la densidad total de tinta de la imagen
- [Imagick::getImageType](#imagick.getimagetype) — Obtiene el tipo posible de imagen
- [Imagick::getImageUnits](#imagick.getimageunits) — Devuelve las unidades de resolución de la imagen
- [Imagick::getImageVirtualPixelMethod](#imagick.getimagevirtualpixelmethod) — Devuelve el método del píxel virtual
- [Imagick::getImageWhitePoint](#imagick.getimagewhitepoint) — Devuelve la cromaticidad del punto blanco
- [Imagick::getImageWidth](#imagick.getimagewidth) — Devuelve el ancho de la imagen
- [Imagick::getInterlaceScheme](#imagick.getinterlacescheme) — Lee el esquema de entrelazado del objeto
- [Imagick::getIteratorIndex](#imagick.getiteratorindex) — Lee el índice de la imagen activa actual
- [Imagick::getNumberImages](#imagick.getnumberimages) — Devuelve el número de imágenes de un objeto
- [Imagick::getOption](#imagick.getoption) — Devuelve un valor asociado con la clave especificada
- [Imagick::getPackageName](#imagick.getpackagename) — Devuelve el nombre del paquete ImageMagick
- [Imagick::getPage](#imagick.getpage) — Devuelve la geometría de la página
- [Imagick::getPixelIterator](#imagick.getpixeliterator) — Devuelve un MagickPixelIterator
- [Imagick::getPixelRegionIterator](#imagick.getpixelregioniterator) — Obtinene un objeto ImagickPixelIterator de una sección de imagen
- [Imagick::getPointSize](#imagick.getpointsize) — Obtiene el tamaño del punto
- [Imagick::getQuantum](#imagick.getquantum) — Devuelve el espacio cuántico de ImageMagick
- [Imagick::getQuantumDepth](#imagick.getquantumdepth) — Lee la profundidad cuántica
- [Imagick::getQuantumRange](#imagick.getquantumrange) — Devuelve el intervalo cuántico de Imagick
- [Imagick::getRegistry](#imagick.getregistry) — Obtiene un elemento de StringRegistry
- [Imagick::getReleaseDate](#imagick.getreleasedate) — Devuelve la fecha de publicación de ImageMagick
- [Imagick::getResource](#imagick.getresource) — Devuelve el consumo de memoria de la recurso
- [Imagick::getResourceLimit](#imagick.getresourcelimit) — Devuelve el límite de la recurso
- [Imagick::getSamplingFactors](#imagick.getsamplingfactors) — Lee el factor de muestreo horizontal y vertical
- [Imagick::getSize](#imagick.getsize) — Retorna el tamaño asociado con un objeto Imagick
- [Imagick::getSizeOffset](#imagick.getsizeoffset) — Devuelve el tamaño de la posición
- [Imagick::getVersion](#imagick.getversion) — Devuelve la API de ImageMagick
- [Imagick::haldClutImage](#imagick.haldclutimage) — Reemplaza los colores de la imagen
- [Imagick::hasNextImage](#imagick.hasnextimage) — Verifica si un objeto tiene una imagen siguiente
- [Imagick::hasPreviousImage](#imagick.haspreviousimage) — Verifica si un objeto tiene una imagen anterior
- [Imagick::identifyFormat](#imagick.identifyformat) — Formatea un string con los detalles de la imagen
- [Imagick::identifyImage](#imagick.identifyimage) — Identifica una imagen y obtiene sus atributos
- [Imagick::implodeImage](#imagick.implodeimage) — Crea una nueva imagen como una copia
- [Imagick::importImagePixels](#imagick.importimagepixels) — Importa los píxeles de una imagen
- [Imagick::inverseFourierTransformImage](#imagick.inversefouriertransformimage) — Implementa la transformada inversa de Fourier discreta (Discrete Fourier Transform - DFT)
- [Imagick::labelImage](#imagick.labelimage) — Añade una etiqueta a una imagen
- [Imagick::levelImage](#imagick.levelimage) — Ajusta los niveles de la imagen
- [Imagick::linearStretchImage](#imagick.linearstretchimage) — Estrecha con saturación la intensidad de la imagen
- [Imagick::liquidRescaleImage](#imagick.liquidrescaleimage) — Anima una imagen o imágenes
- [Imagick::listRegistry](#imagick.listregistry) — Lista todos los parámetros del registro
- [Imagick::magnifyImage](#imagick.magnifyimage) — Duplica el tamaño de una imagen, proporcionalmente
- [Imagick::mapImage](#imagick.mapimage) — Reemplaza los colores de una imagen con el color más cercano de una imagen de referencia
- [Imagick::matteFloodfillImage](#imagick.mattefloodfillimage) — Cambia el valor de transparencia de un color
- [Imagick::medianFilterImage](#imagick.medianfilterimage) — Aplica un filtro digital
- [Imagick::mergeImageLayers](#imagick.mergeimagelayers) — Fusiona las capas de la imagen
- [Imagick::minifyImage](#imagick.minifyimage) — Redimensiona una imagen proporcionalmente para reducirla a la mitad de tamaño
- [Imagick::modulateImage](#imagick.modulateimage) — Controla el brillo, la saturación y el tono
- [Imagick::montageImage](#imagick.montageimage) — Crea una imagen compuesta
- [Imagick::morphImages](#imagick.morphimages) — Metamorfosea un conjunto de imágenes
- [Imagick::morphology](#imagick.morphology) — Aplica un núcleo personalizado a la imagen según el método de morfología dado
- [Imagick::mosaicImages](#imagick.mosaicimages) — Forma una mosaico de imágenes
- [Imagick::motionBlurImage](#imagick.motionblurimage) — Simula borrosidad en movimiento
- [Imagick::negateImage](#imagick.negateimage) — Invierte los colores en la imagen de referencia
- [Imagick::newImage](#imagick.newimage) — Crea una nueva imagen
- [Imagick::newPseudoImage](#imagick.newpseudoimage) — Crea una nueva imagen
- [Imagick::nextImage](#imagick.nextimage) — Pasa a la siguiente imagen
- [Imagick::normalizeImage](#imagick.normalizeimage) — Mejora el contraste de una imagen a color
- [Imagick::oilPaintImage](#imagick.oilpaintimage) — Simula una pintura al óleo
- [Imagick::opaquePaintImage](#imagick.opaquepaintimage) — Cambia el color de cualquier píxel que coincida con el objetivo
- [Imagick::optimizeImageLayers](#imagick.optimizeimagelayers) — Elimina las porciones recurrentes de imágenes a optimizar
- [Imagick::orderedPosterizeImage](#imagick.orderedposterizeimage) — Realiza un entramado ordenado
- [Imagick::paintFloodfillImage](#imagick.paintfloodfillimage) — Cambia el valor del color de cualquier píxel que coincida con el objetivo
- [Imagick::paintOpaqueImage](#imagick.paintopaqueimage) — Cambia cualquier píxel que coincida con el color
- [Imagick::paintTransparentImage](#imagick.painttransparentimage) — Cambia cualquier píxel que coincida con el color definido para el relleno
- [Imagick::pingImage](#imagick.pingimage) — Trae los atributos básicos de una imagen
- [Imagick::pingImageBlob](#imagick.pingimageblob) — Traer los atributos rápidamente
- [Imagick::pingImageFile](#imagick.pingimagefile) — Obtener los atrbutos básicos de la imagen de una manera liviana
- [Imagick::polaroidImage](#imagick.polaroidimage) — Simula una fotografía Polaroid
- [Imagick::posterizeImage](#imagick.posterizeimage) — Reduce la imagen a un número limitado de niveles de color
- [Imagick::previewImages](#imagick.previewimages) — Precisa rápidamente los parámetros apropiados para el procesamiento de la imagen
- [Imagick::previousImage](#imagick.previousimage) — Pasa a la imagen anterior en una secuencia de imágenes
- [Imagick::profileImage](#imagick.profileimage) — Añade o elimina un perfil de una imagen
- [Imagick::quantizeImage](#imagick.quantizeimage) — Analiza los colores dentro de una imagen de referencia
- [Imagick::quantizeImages](#imagick.quantizeimages) — Analiza los colores dentro de una secuencia de imágenes
- [Imagick::queryFontMetrics](#imagick.queryfontmetrics) — Devuelve una matriz que representa las métricas de la fuente
- [Imagick::queryFonts](#imagick.queryfonts) — Devuelve la lista de fuentes configuradas
- [Imagick::queryFormats](#imagick.queryformats) — Devuelve los formatos soportados por Imagick
- [Imagick::radialBlurImage](#imagick.radialblurimage) — Hace borrosa de forma radial una imagen
- [Imagick::raiseImage](#imagick.raiseimage) — Crea un efecto de botón en 3D simulado
- [Imagick::randomThresholdImage](#imagick.randomthresholdimage) — Crea una imagen de alto contraste y dos colores
- [Imagick::readImage](#imagick.readimage) — Lee una imagen desde un nombre de fichero
- [Imagick::readImageBlob](#imagick.readimageblob) — Lee una imagen desde un string binario
- [Imagick::readImageFile](#imagick.readimagefile) — Lee una imagen desde un gestor de fichero abierto
- [Imagick::readImages](#imagick.readimages) — Lee una imagen a partir de un array de nombres de ficheros
- [Imagick::recolorImage](#imagick.recolorimage) — Recolorear la imagen
- [Imagick::reduceNoiseImage](#imagick.reducenoiseimage) — Suaviza los contornos de una imagen
- [Imagick::remapImage](#imagick.remapimage) — Re-mapea los colores de una imagen
- [Imagick::removeImage](#imagick.removeimage) — Elimina una imagen de la lista
- [Imagick::removeImageProfile](#imagick.removeimageprofile) — Elimina el perfil nominado de la imagen y lo devuelve
- [Imagick::render](#imagick.render) — Muestra todas las comandos de dibujo previas
- [Imagick::resampleImage](#imagick.resampleimage) — Remuestrea la imagen a la resolución deseada
- [Imagick::resetImagePage](#imagick.resetimagepage) — Reinicia una página de imagen
- [Imagick::resizeImage](#imagick.resizeimage) — Escala una imagen
- [Imagick::rollImage](#imagick.rollimage) — Compensa una imagen
- [Imagick::rotateImage](#imagick.rotateimage) — Rota una imagen
- [Imagick::rotationalBlurImage](#imagick.rotationalblurimage) — Aplica un desenfoque rotacional a una imagen
- [Imagick::roundCorners](#imagick.roundcorners) — Redondea las esquinas de una imagen
- [Imagick::sampleImage](#imagick.sampleimage) — Escala una imagen con un muestreo de píxeles
- [Imagick::scaleImage](#imagick.scaleimage) — Redimensiona la imagen a una escala específica
- [Imagick::segmentImage](#imagick.segmentimage) — Segmenta una imagen
- [Imagick::selectiveBlurImage](#imagick.selectiveblurimage) — Desenfoca selectivamente una imagen dentro de un umbral de contraste
- [Imagick::separateImageChannel](#imagick.separateimagechannel) — Separa un canal de la imagen
- [Imagick::sepiaToneImage](#imagick.sepiatoneimage) — Pone una imagen en tono sepia
- [Imagick::setBackgroundColor](#imagick.setbackgroundcolor) — Establece el color de fondo por omisión del objeto
- [Imagick::setColorspace](#imagick.setcolorspace) — Establecer el espacio de color
- [Imagick::setCompression](#imagick.setcompression) — Configura el tipo de compresión del objeto
- [Imagick::setCompressionQuality](#imagick.setcompressionquality) — Configura la compresión por defecto del objeto
- [Imagick::setFilename](#imagick.setfilename) — Establece el nombre de archivo antes de que se lea o escriba una imagen
- [Imagick::setFirstIterator](#imagick.setfirstiterator) — Coloca el iterador de Imagick en la primera imagen
- [Imagick::setFont](#imagick.setfont) — Configura la fuente
- [Imagick::setFormat](#imagick.setformat) — Establece el formato del objeto Imagick
- [Imagick::setGravity](#imagick.setgravity) — Establece la gravedad
- [Imagick::setImage](#imagick.setimage) — Reemplaza una imagen en el objeto
- [Imagick::setImageAlphaChannel](#imagick.setimagealphachannel) — Define el canal alfa de la imagen
- [Imagick::setImageArtifact](#imagick.setimageartifact) — Define el artefacto de la imagen
- [Imagick::setImageAttribute](#imagick.setimageattribute) — Define un atributo de imagen
- [Imagick::setImageBackgroundColor](#imagick.setimagebackgroundcolor) — Establece el color de fondo de la imagen
- [Imagick::setImageBias](#imagick.setimagebias) — Establece el sesgo de la imagen para cualquier método que convolucione una imagen
- [Imagick::setImageBiasQuantum](#imagick.setimagebiasquantum) — Establece el sesgo de la imagen
- [Imagick::setImageBluePrimary](#imagick.setimageblueprimary) — Establece el punto primario azul de la cromaticidad de la imagen
- [Imagick::setImageBorderColor](#imagick.setimagebordercolor) — Establece el color de borde de la imagen
- [Imagick::setImageChannelDepth](#imagick.setimagechanneldepth) — Establece la profundidad de una canal de imagen en particular
- [Imagick::setImageClipMask](#imagick.setimageclipmask) — Establece la máscara de recorte de una imagen
- [Imagick::setImageColormapColor](#imagick.setimagecolormapcolor) — Establece el color de un índice de mapa de color especificado
- [Imagick::setImageColorspace](#imagick.setimagecolorspace) — Establece el espacio de color de una imagen
- [Imagick::setImageCompose](#imagick.setimagecompose) — Establece el operador de composción de una imagen
- [Imagick::setImageCompression](#imagick.setimagecompression) — Establece la compresión de una imagen
- [Imagick::setImageCompressionQuality](#imagick.setimagecompressionquality) — Establece la calidad de compresión de una imagen
- [Imagick::setImageDelay](#imagick.setimagedelay) — Establece el retardo de una imagen
- [Imagick::setImageDepth](#imagick.setimagedepth) — Establece la profundidad de una imagen
- [Imagick::setImageDispose](#imagick.setimagedispose) — Establece el método de disposición de una imagen
- [Imagick::setImageExtent](#imagick.setimageextent) — Establece el tamaño de una imagen
- [Imagick::setImageFilename](#imagick.setimagefilename) — Establece el nombre de archivo de una imagen en particular
- [Imagick::setImageFormat](#imagick.setimageformat) — Establece el formato de una imagen en particular
- [Imagick::setImageGamma](#imagick.setimagegamma) — Establece el valor gamma de la imagen
- [Imagick::setImageGravity](#imagick.setimagegravity) — Establece la gravedad de la imagen
- [Imagick::setImageGreenPrimary](#imagick.setimagegreenprimary) — Establece el punto primario verde de la cromaticidad de la imagen
- [Imagick::setImageIndex](#imagick.setimageindex) — Establece la posición del iterador
- [Imagick::setImageInterlaceScheme](#imagick.setimageinterlacescheme) — Establece la compresión de la imagen
- [Imagick::setImageInterpolateMethod](#imagick.setimageinterpolatemethod) — Configura el método de interpolación de la imagen
- [Imagick::setImageIterations](#imagick.setimageiterations) — Establece las iteraciones de una imagen
- [Imagick::setImageMatte](#imagick.setimagematte) — Establece el canal mate de la imagen
- [Imagick::setImageMatteColor](#imagick.setimagemattecolor) — Establece el color mate de la imagen
- [Imagick::setImageOpacity](#imagick.setimageopacity) — Establece el nivel de opacidad de la imagen
- [Imagick::setImageOrientation](#imagick.setimageorientation) — Establece la orientación de la imagen
- [Imagick::setImagePage](#imagick.setimagepage) — Establece la geometría de la página de la imagen
- [Imagick::setImageProfile](#imagick.setimageprofile) — Añade un perfil nominado al objeto Imagick
- [Imagick::setImageProperty](#imagick.setimageproperty) — Configura una propiedad de imagen
- [Imagick::setImageRedPrimary](#imagick.setimageredprimary) — Establece el punto primario rojo de la cromaticidad de la imagen
- [Imagick::setImageRenderingIntent](#imagick.setimagerenderingintent) — Establece el propósito de renderización de la imagen
- [Imagick::setImageResolution](#imagick.setimageresolution) — Establece la resolución de la imagen
- [Imagick::setImageScene](#imagick.setimagescene) — Establece la escena de la imagen
- [Imagick::setImageTicksPerSecond](#imagick.setimagetickspersecond) — Establece los ticks por segundo de la imagen
- [Imagick::setImageType](#imagick.setimagetype) — Establece el tipo de imagen
- [Imagick::setImageUnits](#imagick.setimageunits) — Establece las unidades de resolución de la imagen
- [Imagick::setImageVirtualPixelMethod](#imagick.setimagevirtualpixelmethod) — Establece el método de píxel virtual de la imagen
- [Imagick::setImageWhitePoint](#imagick.setimagewhitepoint) — Establece el punto blanco de cromaticidad de la imagen
- [Imagick::setInterlaceScheme](#imagick.setinterlacescheme) — Establece la compresión de la imagen
- [Imagick::setIteratorIndex](#imagick.setiteratorindex) — Establece la posición del iterador
- [Imagick::setLastIterator](#imagick.setlastiterator) — Posiciona el iterador Imagick en la última imagen
- [Imagick::setOption](#imagick.setoption) — Configura una opción de un objeto Imagick
- [Imagick::setPage](#imagick.setpage) — Establece la geometría de página del objeto Imagick
- [Imagick::setPointSize](#imagick.setpointsize) — Define la medida del punto
- [Imagick::setProgressMonitor](#imagick.setprogressmonitor) — Define una función de retrollamada a ser llamada durante el procesamiento
- [Imagick::setRegistry](#imagick.setregistry) — Define la entrada del registro ImageMagick nombrada clave para valor
- [Imagick::setResolution](#imagick.setresolution) — Establece la resolución de la imagen
- [Imagick::setResourceLimit](#imagick.setresourcelimit) — Define la limitación para una recurso particular
- [Imagick::setSamplingFactors](#imagick.setsamplingfactors) — Establece los factores de muestreo de la imagen
- [Imagick::setSize](#imagick.setsize) — Establece el tamaño del objeto Imagick
- [Imagick::setSizeOffset](#imagick.setsizeoffset) — Establece el tamaño y el índice del objeto Imagick
- [Imagick::setType](#imagick.settype) — Establece el atributo tipo de imagen
- [Imagick::shadeImage](#imagick.shadeimage) — Crea un efecto en 3D
- [Imagick::shadowImage](#imagick.shadowimage) — Simula una sombra de imagen
- [Imagick::sharpenImage](#imagick.sharpenimage) — Afila una imagen
- [Imagick::shaveImage](#imagick.shaveimage) — Recorta píxeles de los extremos de la imagen
- [Imagick::shearImage](#imagick.shearimage) — Crea un paralelogramo
- [Imagick::sigmoidalContrastImage](#imagick.sigmoidalcontrastimage) — Ajusta el contraste de la imagen
- [Imagick::sketchImage](#imagick.sketchimage) — Simula el bosquejo de un lapiz
- [Imagick::smushImages](#imagick.smushimages) — Toma todas las imágenes del puntero de imagen actual hasta el final de la lista de imágenes y las comprime
- [Imagick::solarizeImage](#imagick.solarizeimage) — Aplica un efecto de solarización a la imagen
- [Imagick::sparseColorImage](#imagick.sparsecolorimage) — Interpola colores
- [Imagick::spliceImage](#imagick.spliceimage) — Une un color sólido en la imagen
- [Imagick::spreadImage](#imagick.spreadimage) — Despalza aleatoriamente cada píxel en un bloque
- [Imagick::statisticImage](#imagick.statisticimage) — Modifica una imagen utilizando una función estadística
- [Imagick::steganoImage](#imagick.steganoimage) — Oculta una marca de agua digital dentro de la imagen
- [Imagick::stereoImage](#imagick.stereoimage) — Compone dos imágenes
- [Imagick::stripImage](#imagick.stripimage) — Elimina de una imagen todos los perfiles y los comentarios
- [Imagick::subImageMatch](#imagick.subimagematch) — Busca una subimagen en la imagen actual y devuelve una imagen de similitud
- [Imagick::swirlImage](#imagick.swirlimage) — Arremolina los píxeles desde el centro de la imagen
- [Imagick::textureImage](#imagick.textureimage) — Repite los mosaicos de la textura de una imagen
- [Imagick::thresholdImage](#imagick.thresholdimage) — Cambia el valor de píexeles individuales basdos en un umbral
- [Imagick::thumbnailImage](#imagick.thumbnailimage) — Modifica el tamaño de una imagen
- [Imagick::tintImage](#imagick.tintimage) — Aplica un vector de color a cada píxel en la imagen
- [Imagick::\_\_toString](#imagick.tostring) — Devuelve la imagen como un string
- [Imagick::transformImage](#imagick.transformimage) — Método conveniente para establecer el tamaño del recorte y la geometría de la imagen
- [Imagick::transformImageColorspace](#imagick.transformimagecolorspace) — Transforma una imagen en un nuevo espacio de color
- [Imagick::transparentPaintImage](#imagick.transparentpaintimage) — Pinta píxeles transparentes
- [Imagick::transposeImage](#imagick.transposeimage) — Aplica una simetría vertical
- [Imagick::transverseImage](#imagick.transverseimage) — Crea un espejo horizontal de la imagen
- [Imagick::trimImage](#imagick.trimimage) — Elimina los extremos de la imagen
- [Imagick::uniqueImageColors](#imagick.uniqueimagecolors) — Se conserva únicamente un color de píxel
- [Imagick::unsharpMaskImage](#imagick.unsharpmaskimage) — Afila una imagen
- [Imagick::valid](#imagick.valid) — Verifica si el elemento actual es válido
- [Imagick::vignetteImage](#imagick.vignetteimage) — Añade un filtro de viñeta a la imagen
- [Imagick::waveImage](#imagick.waveimage) — Añade un filtro de ondas a la imagen
- [Imagick::whiteThresholdImage](#imagick.whitethresholdimage) — Fuerza a todos los píxeles por encima del umbral a ser blancos
- [Imagick::writeImage](#imagick.writeimage) — Escribe una imagen al nombre de fichero especificado
- [Imagick::writeImageFile](#imagick.writeimagefile) — Escribe una imagen en un descriptor de archivo
- [Imagick::writeImages](#imagick.writeimages) — Escribe una imagen o secuencia de imágenes
- [Imagick::writeImagesFile](#imagick.writeimagesfile) — Escribe los frames en un descriptor de ficheros

# La clase [ImagickDraw](#class.imagickdraw)

(PECL imagick 2, PECL imagick 3)

## Sinopsis de la Clase

    ****

     class **ImagickDraw**
     {

public [affine](#imagickdraw.affine)([array](#language.types.array) $affine): [bool](#language.types.boolean)
public [annotation](#imagickdraw.annotation)([float](#language.types.float) $x, [float](#language.types.float) $y, [string](#language.types.string) $text): [bool](#language.types.boolean)
public [arc](#imagickdraw.arc)(
    [float](#language.types.float) $start_x,
    [float](#language.types.float) $start_y,
    [float](#language.types.float) $end_x,
    [float](#language.types.float) $end_y,
    [float](#language.types.float) $start_angle,
    [float](#language.types.float) $end_angle
): [bool](#language.types.boolean)
public [bezier](#imagickdraw.bezier)([array](#language.types.array) $coordinates): [bool](#language.types.boolean)
public [circle](#imagickdraw.circle)(
    [float](#language.types.float) $origin_x,
    [float](#language.types.float) $origin_y,
    [float](#language.types.float) $perimeter_x,
    [float](#language.types.float) $perimeter_y
): [bool](#language.types.boolean)
public [clear](#imagickdraw.clear)(): [bool](#language.types.boolean)
public [clone](#imagickdraw.clone)(): [ImagickDraw](#class.imagickdraw)
public [color](#imagickdraw.color)([float](#language.types.float) $x, [float](#language.types.float) $y, [int](#language.types.integer) $paint): [bool](#language.types.boolean)
public [comment](#imagickdraw.comment)([string](#language.types.string) $comment): [bool](#language.types.boolean)
public [composite](#imagickdraw.composite)(
    [int](#language.types.integer) $composite,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y,
    [float](#language.types.float) $width,
    [float](#language.types.float) $height,
    [Imagick](#class.imagick) $image
): [bool](#language.types.boolean)
public [destroy](#imagickdraw.destroy)(): [bool](#language.types.boolean)
public [ellipse](#imagickdraw.ellipse)(
    [float](#language.types.float) $origin_x,
    [float](#language.types.float) $origin_y,
    [float](#language.types.float) $radius_x,
    [float](#language.types.float) $radius_y,
    [float](#language.types.float) $angle_start,
    [float](#language.types.float) $angle_end
): [bool](#language.types.boolean)
public [getClipPath](#imagickdraw.getclippath)(): [false](#language.types.singleton)|[string](#language.types.string)
public [getClipRule](#imagickdraw.getcliprule)(): [int](#language.types.integer)
public [getClipUnits](#imagickdraw.getclipunits)(): [int](#language.types.integer)
public [getFillColor](#imagickdraw.getfillcolor)(): [ImagickPixel](#class.imagickpixel)
public [getFillOpacity](#imagickdraw.getfillopacity)(): [float](#language.types.float)
public [getFillRule](#imagickdraw.getfillrule)(): [int](#language.types.integer)
public [getFont](#imagickdraw.getfont)(): [string](#language.types.string)
public [getFontFamily](#imagickdraw.getfontfamily)(): [string](#language.types.string)
public [getFontSize](#imagickdraw.getfontsize)(): [float](#language.types.float)
public [getFontStretch](#imagickdraw.getfontstretch)(): [int](#language.types.integer)
public [getFontStyle](#imagickdraw.getfontstyle)(): [int](#language.types.integer)
public [getFontWeight](#imagickdraw.getfontweight)(): [int](#language.types.integer)
public [getGravity](#imagickdraw.getgravity)(): [int](#language.types.integer)
public [getStrokeAntialias](#imagickdraw.getstrokeantialias)(): [bool](#language.types.boolean)
public [getStrokeColor](#imagickdraw.getstrokecolor)(): [ImagickPixel](#class.imagickpixel)
public [getStrokeDashArray](#imagickdraw.getstrokedasharray)(): [array](#language.types.array)
public [getStrokeDashOffset](#imagickdraw.getstrokedashoffset)(): [float](#language.types.float)
public [getStrokeLineCap](#imagickdraw.getstrokelinecap)(): [int](#language.types.integer)
public [getStrokeLineJoin](#imagickdraw.getstrokelinejoin)(): [int](#language.types.integer)
public [getStrokeMiterLimit](#imagickdraw.getstrokemiterlimit)(): [int](#language.types.integer)
public [getStrokeOpacity](#imagickdraw.getstrokeopacity)(): [float](#language.types.float)
public [getStrokeWidth](#imagickdraw.getstrokewidth)(): [float](#language.types.float)
public [getTextAlignment](#imagickdraw.gettextalignment)(): [int](#language.types.integer)
public [getTextAntialias](#imagickdraw.gettextantialias)(): [bool](#language.types.boolean)
public [getTextDecoration](#imagickdraw.gettextdecoration)(): [int](#language.types.integer)
public [getTextEncoding](#imagickdraw.gettextencoding)(): [false](#language.types.singleton)|[string](#language.types.string)
public [getTextInterlineSpacing](#imagickdraw.gettextinterlinespacing)(): [float](#language.types.float)
public [getTextInterwordSpacing](#imagickdraw.gettextinterwordspacing)(): [float](#language.types.float)
public [getTextKerning](#imagickdraw.gettextkerning)(): [float](#language.types.float)
public [getTextUnderColor](#imagickdraw.gettextundercolor)(): [ImagickPixel](#class.imagickpixel)
public [getVectorGraphics](#imagickdraw.getvectorgraphics)(): [string](#language.types.string)
public [line](#imagickdraw.line)(
    [float](#language.types.float) $start_x,
    [float](#language.types.float) $start_y,
    [float](#language.types.float) $end_x,
    [float](#language.types.float) $end_y
): [bool](#language.types.boolean)
public [matte](#imagickdraw.matte)([float](#language.types.float) $x, [float](#language.types.float) $y, [int](#language.types.integer) $paint): [bool](#language.types.boolean)
public [pathClose](#imagickdraw.pathclose)(): [bool](#language.types.boolean)
public [pathCurveToAbsolute](#imagickdraw.pathcurvetoabsolute)(
    [float](#language.types.float) $x1,
    [float](#language.types.float) $y1,
    [float](#language.types.float) $x2,
    [float](#language.types.float) $y2,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)
public [pathCurveToQuadraticBezierAbsolute](#imagickdraw.pathcurvetoquadraticbezierabsolute)(
    [float](#language.types.float) $x1,
    [float](#language.types.float) $y1,
    [float](#language.types.float) $x_end,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)
public [pathCurveToQuadraticBezierRelative](#imagickdraw.pathcurvetoquadraticbezierrelative)(
    [float](#language.types.float) $x1,
    [float](#language.types.float) $y1,
    [float](#language.types.float) $x_end,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)
public [pathCurveToQuadraticBezierSmoothAbsolute](#imagickdraw.pathcurvetoquadraticbeziersmoothabsolute)([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)
public [pathCurveToQuadraticBezierSmoothRelative](#imagickdraw.pathcurvetoquadraticbeziersmoothrelative)([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)
public [pathCurveToRelative](#imagickdraw.pathcurvetorelative)(
    [float](#language.types.float) $x1,
    [float](#language.types.float) $y1,
    [float](#language.types.float) $x2,
    [float](#language.types.float) $y2,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)
public [pathCurveToSmoothAbsolute](#imagickdraw.pathcurvetosmoothabsolute)(
    [float](#language.types.float) $x2,
    [float](#language.types.float) $y2,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)
public [pathCurveToSmoothRelative](#imagickdraw.pathcurvetosmoothrelative)(
    [float](#language.types.float) $x2,
    [float](#language.types.float) $y2,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)
public [pathEllipticArcAbsolute](#imagickdraw.pathellipticarcabsolute)(
    [float](#language.types.float) $rx,
    [float](#language.types.float) $ry,
    [float](#language.types.float) $x_axis_rotation,
    [bool](#language.types.boolean) $large_arc,
    [bool](#language.types.boolean) $sweep,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)
public [pathEllipticArcRelative](#imagickdraw.pathellipticarcrelative)(
    [float](#language.types.float) $rx,
    [float](#language.types.float) $ry,
    [float](#language.types.float) $x_axis_rotation,
    [bool](#language.types.boolean) $large_arc,
    [bool](#language.types.boolean) $sweep,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)
public [pathFinish](#imagickdraw.pathfinish)(): [bool](#language.types.boolean)
public [pathLineToAbsolute](#imagickdraw.pathlinetoabsolute)([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)
public [pathLineToHorizontalAbsolute](#imagickdraw.pathlinetohorizontalabsolute)([float](#language.types.float) $x): [bool](#language.types.boolean)
public [pathLineToHorizontalRelative](#imagickdraw.pathlinetohorizontalrelative)([float](#language.types.float) $x): [bool](#language.types.boolean)
public [pathLineToRelative](#imagickdraw.pathlinetorelative)([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)
public [pathLineToVerticalAbsolute](#imagickdraw.pathlinetoverticalabsolute)([float](#language.types.float) $y): [bool](#language.types.boolean)
public [pathLineToVerticalRelative](#imagickdraw.pathlinetoverticalrelative)([float](#language.types.float) $y): [bool](#language.types.boolean)
public [pathMoveToAbsolute](#imagickdraw.pathmovetoabsolute)([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)
public [pathMoveToRelative](#imagickdraw.pathmovetorelative)([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)
public [pathStart](#imagickdraw.pathstart)(): [bool](#language.types.boolean)
public [point](#imagickdraw.point)([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)
public [polygon](#imagickdraw.polygon)([array](#language.types.array) $coordinates): [bool](#language.types.boolean)
public [polyline](#imagickdraw.polyline)([array](#language.types.array) $coordinates): [bool](#language.types.boolean)
public [pop](#imagickdraw.pop)(): [bool](#language.types.boolean)
public [popClipPath](#imagickdraw.popclippath)(): [bool](#language.types.boolean)
public [popDefs](#imagickdraw.popdefs)(): [bool](#language.types.boolean)
public [popPattern](#imagickdraw.poppattern)(): [bool](#language.types.boolean)
public [push](#imagickdraw.push)(): [bool](#language.types.boolean)
public [pushClipPath](#imagickdraw.pushclippath)([string](#language.types.string) $clip_mask_id): [bool](#language.types.boolean)
public [pushDefs](#imagickdraw.pushdefs)(): [bool](#language.types.boolean)
public [pushPattern](#imagickdraw.pushpattern)(
    [string](#language.types.string) $pattern_id,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y,
    [float](#language.types.float) $width,
    [float](#language.types.float) $height
): [bool](#language.types.boolean)
public [rectangle](#imagickdraw.rectangle)(
    [float](#language.types.float) $top_left_x,
    [float](#language.types.float) $top_left_y,
    [float](#language.types.float) $bottom_right_x,
    [float](#language.types.float) $bottom_right_y
): [bool](#language.types.boolean)
public [render](#imagickdraw.render)(): [bool](#language.types.boolean)
public [resetVectorGraphics](#imagickdraw.resetvectorgraphics)(): [bool](#language.types.boolean)
public [rotate](#imagickdraw.rotate)([float](#language.types.float) $degrees): [bool](#language.types.boolean)
public [roundRectangle](#imagickdraw.roundrectangle)(
    [float](#language.types.float) $top_left_x,
    [float](#language.types.float) $top_left_y,
    [float](#language.types.float) $bottom_right_x,
    [float](#language.types.float) $bottom_right_y,
    [float](#language.types.float) $rounding_x,
    [float](#language.types.float) $rounding_y
): [bool](#language.types.boolean)
public [scale](#imagickdraw.scale)([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)
public [setClipPath](#imagickdraw.setclippath)([string](#language.types.string) $clip_mask): [bool](#language.types.boolean)
public [setClipRule](#imagickdraw.setcliprule)([int](#language.types.integer) $fillrule): [bool](#language.types.boolean)
public [setClipUnits](#imagickdraw.setclipunits)([int](#language.types.integer) $pathunits): [bool](#language.types.boolean)
public [setFillAlpha](#imagickdraw.setfillalpha)([float](#language.types.float) $alpha): [bool](#language.types.boolean)
public [setFillColor](#imagickdraw.setfillcolor)([ImagickPixel](#class.imagickpixel)|[string](#language.types.string) $fill_color): [bool](#language.types.boolean)
public [setFillOpacity](#imagickdraw.setfillopacity)([float](#language.types.float) $opacity): [bool](#language.types.boolean)
public [setFillPatternURL](#imagickdraw.setfillpatternurl)([string](#language.types.string) $fill_url): [bool](#language.types.boolean)
public [setFillRule](#imagickdraw.setfillrule)([int](#language.types.integer) $fillrule): [bool](#language.types.boolean)
public [setFont](#imagickdraw.setfont)([string](#language.types.string) $font_name): [bool](#language.types.boolean)
public [setFontFamily](#imagickdraw.setfontfamily)([string](#language.types.string) $font_family): [bool](#language.types.boolean)
public [setFontSize](#imagickdraw.setfontsize)([float](#language.types.float) $point_size): [bool](#language.types.boolean)
public [setFontStretch](#imagickdraw.setfontstretch)([int](#language.types.integer) $stretch): [bool](#language.types.boolean)
public [setFontStyle](#imagickdraw.setfontstyle)([int](#language.types.integer) $style): [bool](#language.types.boolean)
public [setFontWeight](#imagickdraw.setfontweight)([int](#language.types.integer) $weight): [bool](#language.types.boolean)
public [setGravity](#imagickdraw.setgravity)([int](#language.types.integer) $gravity): [bool](#language.types.boolean)
public [setResolution](#imagickdraw.setresolution)([float](#language.types.float) $resolution_x, [float](#language.types.float) $resolution_y): [bool](#language.types.boolean)
public [setStrokeAlpha](#imagickdraw.setstrokealpha)([float](#language.types.float) $alpha): [bool](#language.types.boolean)
public [setStrokeAntialias](#imagickdraw.setstrokeantialias)([bool](#language.types.boolean) $enabled): [bool](#language.types.boolean)
public [setStrokeColor](#imagickdraw.setstrokecolor)([ImagickPixel](#class.imagickpixel)|[string](#language.types.string) $color): [bool](#language.types.boolean)
public [setStrokeDashArray](#imagickdraw.setstrokedasharray)([?](#language.types.null)[array](#language.types.array) $dashes): [bool](#language.types.boolean)
public [setStrokeDashOffset](#imagickdraw.setstrokedashoffset)([float](#language.types.float) $dash_offset): [bool](#language.types.boolean)
public [setStrokeLineCap](#imagickdraw.setstrokelinecap)([int](#language.types.integer) $linecap): [bool](#language.types.boolean)
public [setStrokeLineJoin](#imagickdraw.setstrokelinejoin)([int](#language.types.integer) $linejoin): [bool](#language.types.boolean)
public [setStrokeMiterLimit](#imagickdraw.setstrokemiterlimit)([int](#language.types.integer) $miterlimit): [bool](#language.types.boolean)
public [setStrokeOpacity](#imagickdraw.setstrokeopacity)([float](#language.types.float) $opacity): [bool](#language.types.boolean)
public [setStrokePatternURL](#imagickdraw.setstrokepatternurl)([string](#language.types.string) $stroke_url): [bool](#language.types.boolean)
public [setStrokeWidth](#imagickdraw.setstrokewidth)([float](#language.types.float) $width): [bool](#language.types.boolean)
public [setTextAlignment](#imagickdraw.settextalignment)([int](#language.types.integer) $align): [bool](#language.types.boolean)
public [setTextAntialias](#imagickdraw.settextantialias)([bool](#language.types.boolean) $antialias): [bool](#language.types.boolean)
public [setTextDecoration](#imagickdraw.settextdecoration)([int](#language.types.integer) $decoration): [bool](#language.types.boolean)
public [setTextEncoding](#imagickdraw.settextencoding)([string](#language.types.string) $encoding): [bool](#language.types.boolean)
public [setTextInterlineSpacing](#imagickdraw.settextinterlinespacing)([float](#language.types.float) $spacing): [bool](#language.types.boolean)
public [setTextInterwordSpacing](#imagickdraw.settextinterwordspacing)([float](#language.types.float) $spacing): [bool](#language.types.boolean)
public [setTextKerning](#imagickdraw.settextkerning)([float](#language.types.float) $kerning): [bool](#language.types.boolean)
public [setTextUnderColor](#imagickdraw.settextundercolor)([ImagickPixel](#class.imagickpixel)|[string](#language.types.string) $under_color): [bool](#language.types.boolean)
public [setVectorGraphics](#imagickdraw.setvectorgraphics)([string](#language.types.string) $xml): [bool](#language.types.boolean)
public [setViewbox](#imagickdraw.setviewbox)(
    [int](#language.types.integer) $left_x,
    [int](#language.types.integer) $top_y,
    [int](#language.types.integer) $right_x,
    [int](#language.types.integer) $bottom_y
): [bool](#language.types.boolean)
public [skewX](#imagickdraw.skewx)([float](#language.types.float) $degrees): [bool](#language.types.boolean)
public [skewY](#imagickdraw.skewy)([float](#language.types.float) $degrees): [bool](#language.types.boolean)
public [translate](#imagickdraw.translate)([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

}

# ImagickDraw::affine

(PECL imagick 2, PECL imagick 3)

ImagickDraw::affine — Ajusta la matriz de transformación afín actual

### Descripción

public **ImagickDraw::affine**([array](#language.types.array) $affine): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Ajusta la matriz de transformación afín actual con la matriz de transformación
afín especificada.

### Parámetros

     affine


       Los parámetros de la matriz afín





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::affine()**



      &lt;?php

function affine($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeWidth(1);
    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);

    $draw-&gt;setStrokeWidth(2);

    $PI = 3.141592653589794;
    $angle = 60 * $PI / 360;

    //Scale the drawing co-ordinates.
    $affineScale = array("sx" =&gt; 1.75, "sy" =&gt; 1.75, "rx" =&gt; 0, "ry" =&gt; 0, "tx" =&gt; 0, "ty" =&gt; 0);

    //Shear the drawing co-ordinates.
    $affineShear = array("sx" =&gt; 1, "sy" =&gt; 1, "rx" =&gt; sin($angle), "ry" =&gt; -sin($angle), "tx" =&gt; 0, "ty" =&gt; 0);

    //Rotate the drawing co-ordinates. The shear affine matrix
    //produces incorrectly scaled drawings.
    $affineRotate = array("sx" =&gt; cos($angle), "sy" =&gt; cos($angle), "rx" =&gt; sin($angle), "ry" =&gt; -sin($angle), "tx" =&gt; 0, "ty" =&gt; 0,);

    //Translate (offset) the drawing
    $affineTranslate = array("sx" =&gt; 1, "sy" =&gt; 1, "rx" =&gt; 0, "ry" =&gt; 0, "tx" =&gt; 30, "ty" =&gt; 30);

    //The identiy affine matrix
    $affineIdentity = array("sx" =&gt; 1, "sy" =&gt; 1, "rx" =&gt; 0, "ry" =&gt; 0, "tx" =&gt; 0, "ty" =&gt; 0);

    $examples = [$affineScale, $affineShear, $affineRotate, $affineTranslate, $affineIdentity,];

    $count = 0;

    foreach ($examples as $example) {
        $draw-&gt;push();
        $draw-&gt;translate(($count % 2) * 250, intval($count / 2) * 250);
        $draw-&gt;translate(100, 100);
        $draw-&gt;affine($example);
        $draw-&gt;rectangle(-50, -50, 50, 50);
        $draw-&gt;pop();
        $count++;
    }

    //Create an image object which the draw commands can be rendered into
    $image = new \Imagick();
    $image-&gt;newImage(500, 750, $backgroundColor);
    $image-&gt;setImageFormat("png");

    //Render the draw commands in the ImagickDraw object
    //into the image.
    $image-&gt;drawImage($draw);

    //Send the image to the browser
    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::annotation

(PECL imagick 2, PECL imagick 3)

ImagickDraw::annotation — Dibuja un texto sobre una imagen

### Descripción

public **ImagickDraw::annotation**([float](#language.types.float) $x, [float](#language.types.float) $y, [string](#language.types.string) $text): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja un texto sobre una imagen.

### Parámetros

     x


       La abscisa del texto a dibujar.






     y


       La ordenada del texto a dibujar.






     text


       El texto a dibujar.





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::arc

(PECL imagick 2, PECL imagick 3)

ImagickDraw::arc — Dibuja un arco

### Descripción

public **ImagickDraw::arc**(
    [float](#language.types.float) $start_x,
    [float](#language.types.float) $start_y,
    [float](#language.types.float) $end_x,
    [float](#language.types.float) $end_y,
    [float](#language.types.float) $start_angle,
    [float](#language.types.float) $end_angle
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja un arco, situado dentro de un rectángulo.

### Parámetros

     start_x


       Abscisa del punto de inicio del arco en el rectángulo de contorno






     start_y


       Ordenada del punto de inicio del arco en el rectángulo de contorno






     end_x


       Abscisa del punto final del arco en el rectángulo de contorno






     end_y


       Ordenada del punto final del arco en el rectángulo de contorno






     start_angle


       Grado de rotación inicial






     end_angle


       Grado de rotación final





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::arc()**

&lt;?php
function arc($strokeColor, $fillColor, $backgroundColor, $startX, $startY, $endX, $endY, $startAngle, $endAngle) {

    //Create a ImagickDraw object to draw into.
    $draw = new \ImagickDraw();
    $draw-&gt;setStrokeWidth(1);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeWidth(2);

    $draw-&gt;arc($startX, $startY, $endX, $endY, $startAngle, $endAngle);

    //Create an image object which the draw commands can be rendered into
    $image = new \Imagick();
    $image-&gt;newImage(IMAGE_WIDTH, IMAGE_HEIGHT, $backgroundColor);
    $image-&gt;setImageFormat("png");

    //Render the draw commands in the ImagickDraw object
    //into the image.
    $image-&gt;drawImage($draw);

    //Send the image to the browser
    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::bezier

(PECL imagick 2, PECL imagick 3)

ImagickDraw::bezier — Dibuja una curva de Bézier

### Descripción

public **ImagickDraw::bezier**([array](#language.types.array) $coordinates): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una curva de Bézier a través de un conjunto de puntos en la imagen.

### Parámetros

     coordinates


       Array multidimensional como array( array( 'x' =&gt; 1, 'y' =&gt; 2 ),
       array( 'x' =&gt; 3, 'y' =&gt; 4 ) )





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::bezier()**



      &lt;?php

function bezier($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $strokeColor = new \ImagickPixel($strokeColor);
    $fillColor = new \ImagickPixel($fillColor);

    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);

    $draw-&gt;setStrokeWidth(2);

    $smoothPointsSet = [
        [
            ['x' =&gt; 10.0 * 5, 'y' =&gt; 10.0 * 5],
            ['x' =&gt; 30.0 * 5, 'y' =&gt; 90.0 * 5],
            ['x' =&gt; 25.0 * 5, 'y' =&gt; 10.0 * 5],
            ['x' =&gt; 50.0 * 5, 'y' =&gt; 50.0 * 5],
        ],
        [
            ['x' =&gt; 50.0 * 5, 'y' =&gt; 50.0 * 5],
            ['x' =&gt; 75.0 * 5, 'y' =&gt; 90.0 * 5],
            ['x' =&gt; 70.0 * 5, 'y' =&gt; 10.0 * 5],
            ['x' =&gt; 90.0 * 5, 'y' =&gt; 40.0 * 5],
        ],
    ];

    foreach ($smoothPointsSet as $points) {
        $draw-&gt;bezier($points);
    }

    $disjointPoints = [
        [
            ['x' =&gt; 10 * 5, 'y' =&gt; 10 * 5],
            ['x' =&gt; 30 * 5, 'y' =&gt; 90 * 5],
            ['x' =&gt; 25 * 5, 'y' =&gt; 10 * 5],
            ['x' =&gt; 50 * 5, 'y' =&gt; 50 * 5],
        ],
        [
            ['x' =&gt; 50 * 5, 'y' =&gt; 50 * 5],
            ['x' =&gt; 80 * 5, 'y' =&gt; 50 * 5],
            ['x' =&gt; 70 * 5, 'y' =&gt; 10 * 5],
            ['x' =&gt; 90 * 5, 'y' =&gt; 40 * 5],
         ]
    ];
    $draw-&gt;translate(0, 200);

    foreach ($disjointPoints as $points) {
        $draw-&gt;bezier($points);
    }

    //Create an image object which the draw commands can be rendered into
    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");

    //Render the draw commands in the ImagickDraw object
    //into the image.
    $imagick-&gt;drawImage($draw);

    //Send the image to the browser
    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::circle

(PECL imagick 2, PECL imagick 3)

ImagickDraw::circle — Dibuja un círculo

### Descripción

public **ImagickDraw::circle**(
    [float](#language.types.float) $origin_x,
    [float](#language.types.float) $origin_y,
    [float](#language.types.float) $perimeter_x,
    [float](#language.types.float) $perimeter_y
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja un círculo.

### Parámetros

     origin_x


       Abscisa del origen






     origin_y


       Ordenada del origen






     perimeter_x


       Abscisa del perímetro






     perimeter_y


       Ordenada del perímetro





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::circle()**

&lt;?php
function circle($strokeColor, $fillColor, $backgroundColor, $originX, $originY, $endX, $endY) {

    //Creación de un objeto ImagickDraw.
    $draw = new \ImagickDraw();

    $strokeColor = new \ImagickPixel($strokeColor);
    $fillColor = new \ImagickPixel($fillColor);

    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);

    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFontSize(72);

    $draw-&gt;circle($originX, $originY, $endX, $endY);

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::clear

(PECL imagick 2, PECL imagick 3)

ImagickDraw::clear — Borra el objeto ImagickDraw

### Descripción

public **ImagickDraw::clear**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Borra el objeto ImagickDraw de cualquier comando acumulado, y reinicia la
configuración que contiene a sus valores predeterminados.

### Valores devueltos

Devuelve un objeto [ImagickDraw](#class.imagickdraw).

# ImagickDraw::clone

(PECL imagick 2, PECL imagick 3)

ImagickDraw::clone — Realiza una copia exacta del objeto ImagickDraw

### Descripción

public **ImagickDraw::clone**(): [ImagickDraw](#class.imagickdraw)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Realiza una copia exacta del objeto [ImagickDraw](#class.imagickdraw).

### Valores devueltos

Devuelve una copia exacta del objeto [ImagickDraw](#class.imagickdraw).

# ImagickDraw::color

(PECL imagick 2, PECL imagick 3)

ImagickDraw::color — Dibuja un color sobre una imagen

### Descripción

public **ImagickDraw::color**([float](#language.types.float) $x, [float](#language.types.float) $y, [int](#language.types.integer) $paint): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja un color sobre una imagen, con el color de relleno actual,
comenzando en una posición dada, y utilizando el método de coloración
indicado.

### Parámetros

     x


       Abscisa del punto de pintura






     y


       Ordenada del punto de pintura






     paint


       Una de las constantes [PAINT](#imagick.constants.paint)
       (imagick::PAINT_*).





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::comment

(PECL imagick 2, PECL imagick 3)

ImagickDraw::comment — Añade un comentario

### Descripción

public **ImagickDraw::comment**([string](#language.types.string) $comment): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Añade un comentario al flujo de salida.

### Parámetros

     comment


       La cadena de comentario





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::composite

(PECL imagick 2, PECL imagick 3)

ImagickDraw::composite — Componer una imagen con otra

### Descripción

public **ImagickDraw::composite**(
    [int](#language.types.integer) $composite,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y,
    [float](#language.types.float) $width,
    [float](#language.types.float) $height,
    [Imagick](#class.imagick) $image
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Componer una imagen con otra, utilizando el operador de composición, en la posición y tamaño indicados.

### Parámetros

     composite


       El operador de composición.
       Una de las constantes de [operador de composición](#imagick.constants.compositeop)
       (imagick::COMPOSITE_*).






     x


       Abscisa del ángulo superior izquierdo.






     y


       Ordenada del ángulo superior izquierdo.






     width


       Ancho de la imagen de composición.






     height


       Alto de la imagen de composición.






     image


       El objeto [Imagick](#class.imagick) donde se toma la composición.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::composite()**

&lt;?php
function composite($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setFillOpacity(1);
    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFontSize(72);
    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFont("../fonts/CANDY.TTF");
    $draw-&gt;setFontSize(140);
    $draw-&gt;rectangle(0, 0, 1000, 300);
    $draw-&gt;setFillColor('white');
    $draw-&gt;setfillopacity(1);
    $draw-&gt;annotation(50, 180, "Lorem Ipsum!");

    //Crea un objeto imagen que sirve de base
    $imagick = new \Imagick();
    $imagick-&gt;newImage(1000, 302, $backgroundColor);
    $imagick-&gt;setImageFormat("png");

    //Se aplican las órdenes de dibujo en el objeto ImagickDraw
    //y en la imagen.
    $imagick-&gt;drawImage($draw);

    //Se envía la imagen al navegador
    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::\_\_construct

(PECL imagick 2, PECL imagick 3)

ImagickDraw::\_\_construct — El constructor ImagickDraw

### Descripción

public **ImagickDraw::\_\_construct**()

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

El constructor de la clase [ImagickDraw](#class.imagickdraw).

### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::destroy

(PECL imagick 2, PECL imagick 3)

ImagickDraw::destroy — Libera todos los recursos asociados

### Descripción

public **ImagickDraw::destroy**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Libera todos los recursos asociados con el objeto [ImagickDraw](#class.imagickdraw).

### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::ellipse

(PECL imagick 2, PECL imagick 3)

ImagickDraw::ellipse — Dibuja una elipse sobre una imagen

### Descripción

public **ImagickDraw::ellipse**(
    [float](#language.types.float) $origin_x,
    [float](#language.types.float) $origin_y,
    [float](#language.types.float) $radius_x,
    [float](#language.types.float) $radius_y,
    [float](#language.types.float) $angle_start,
    [float](#language.types.float) $angle_end
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una elipse sobre una imagen.

### Parámetros

     origin_x








     origin_y








     radius_x








     radius_y








     angle_start








     angle_end







### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::ellipse()**

&lt;?php
function ellipse($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);

    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFontSize(72);

    $draw-&gt;ellipse(125, 70, 100, 50, 0, 360);
    $draw-&gt;ellipse(350, 70, 100, 50, 0, 315);

    $draw-&gt;push();
    $draw-&gt;translate(125, 250);
    $draw-&gt;rotate(30);
    $draw-&gt;ellipse(0, 0, 100, 50, 0, 360);
    $draw-&gt;pop();

    $draw-&gt;push();
    $draw-&gt;translate(350, 250);
    $draw-&gt;rotate(30);
    $draw-&gt;ellipse(0, 0, 100, 50, 0, 315);
    $draw-&gt;pop();

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");

    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::getClipPath

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getClipPath — Devuelve el identificador del camino actual

### Descripción

public **ImagickDraw::getClipPath**(): [false](#language.types.singleton)|[string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el identificador del camino actual.

### Valores devueltos

Devuelve un string, o **[false](#constant.false)** si no existe ningún camino.

# ImagickDraw::getClipRule

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getClipRule — Devuelve la regla de relleno de un polígono actual

### Descripción

public **ImagickDraw::getClipRule**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la regla de relleno de un polígono actual usada por el trazado de recorte.

### Valores devueltos

Devuelve una constante [FILLRULE](#imagick.constants.fillrule) (**[imagick::FILLRULE\_\*](#imagick.constants.fillrule-*)**).

# ImagickDraw::getClipUnits

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getClipUnits — Devuelve la interpretación de unidades del trazado de recorte

### Descripción

public **ImagickDraw::getClipUnits**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la interpretación de unidades del trazado de recorte.

### Valores devueltos

Devuelve un [int](#language.types.integer) si se tuvo éxito.

# ImagickDraw::getFillColor

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getFillColor — Devuelve el color de relleno

### Descripción

public **ImagickDraw::getFillColor**(): [ImagickPixel](#class.imagickpixel)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el color de relleno usado cuando se dibujan objetos rellenos.

### Valores devueltos

Devuelve un objeto [ImagickPixel](#class.imagickpixel).

# ImagickDraw::getFillOpacity

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getFillOpacity — Devuelve la opacidad de dibujo

### Descripción

public **ImagickDraw::getFillOpacity**(): [float](#language.types.float)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la opacidad de dibujo. 1.0 representa la opacidad total.

### Valores devueltos

La opacidad.

# ImagickDraw::getFillRule

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getFillRule — Devuelve la regla de relleno

### Descripción

public **ImagickDraw::getFillRule**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la regla de relleno usada mientras se dibujan polígonos.

### Valores devueltos

Devuelve una constante [FILLRULE](#imagick.constants.fillrule) (**[imagick::FILLRULE\_\*](#imagick.constants.fillrule-*)**).

# ImagickDraw::getFont

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getFont — Devuelve la fuente

### Descripción

public **ImagickDraw::getFont**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve un string que especifica la fuente utilizada para las anotaciones.

### Valores devueltos

Devuelve un string en caso de éxito, y **[false](#constant.false)** en caso contrario.

# ImagickDraw::getFontFamily

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getFontFamily — Devuelve la familia de fuentes

### Descripción

public **ImagickDraw::getFontFamily**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la familia de fuentes de las anotaciones.

### Valores devueltos

Devuelve la familia de fuentes de las anotaciones, o **[false](#constant.false)** si la familia de
fuentes no está configurada.

# ImagickDraw::getFontSize

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getFontSize — Devuelve el tamaño de punto de la fuente

### Descripción

public **ImagickDraw::getFontSize**(): [float](#language.types.float)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el tamaño de punto de la fuente usado cuando se escribe texto.

### Valores devueltos

Devuelve el tamaño de punto de la fuente asociada al objeto [ImagickDraw](#class.imagickdraw) actual.

# ImagickDraw::getFontStretch

(PECL imagick 2 &gt;=2.3.0, PECL imagick 3)

ImagickDraw::getFontStretch — Devuelve el estiramiento de la fuente a utilizar durante la anotación con texto

### Descripción

public **ImagickDraw::getFontStretch**(): [int](#language.types.integer)

Devuelve el estiramiento de la fuente a utilizar durante la anotación con texto. Devuelve un StretchType.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# ImagickDraw::getFontStyle

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getFontStyle — Devuelve el estilo de la fuente

### Descripción

public **ImagickDraw::getFontStyle**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el estilo de la fuente.

### Valores devueltos

Devuelve una constante [STYLE](#imagick.constants.styles)
(imagick::STYLE\_\*), asociada al objeto [ImagickDraw](#class.imagickdraw),
o 0 si el estilo no está definido.

# ImagickDraw::getFontWeight

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getFontWeight — Devuelve el peso de la fuente

### Descripción

public **ImagickDraw::getFontWeight**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el peso de la fuente usada cuando se escribe texto.

### Valores devueltos

Devuelve un [int](#language.types.integer) si se tuvo éxito o 0 si no está estabecido ningún peso.

# ImagickDraw::getGravity

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getGravity — Devuelve la gravedad de colocación de texto

### Descripción

public **ImagickDraw::getGravity**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la gravedad de colocación de texto, utilizada durante la anotación.

### Valores devueltos

Devuelve una constante [GRAVITY](#imagick.constants.gravity)
(imagick::GRAVITY\_\*) en caso de éxito, o 0 si la
gravedad no está configurada.

# ImagickDraw::getStrokeAntialias

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getStrokeAntialias — Devuelve la configuración de antialias de contorno actual

### Descripción

public **ImagickDraw::getStrokeAntialias**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la configuración antialias de contorno actual. Los perfiles contorneados tienen
antialias por defecto. Cuando se deshabilita el antialias, los píxeles contorneados son
puestos en el umbral para determinar si se debería usar el color de contorno o el color
del lienzo subyacente.

### Valores devueltos

Devuelve **[true](#constant.true)** si el antialias está on y **[false](#constant.false)** si está off.

# ImagickDraw::getStrokeColor

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getStrokeColor — Devuelve el color usado por los perfiles de objetos contorneados

### Descripción

public **ImagickDraw::getStrokeColor**(): [ImagickPixel](#class.imagickpixel)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el color usado por los perfiles de objetos contorneados.

### Parámetros

     stroke_color







### Valores devueltos

Devuelve un objeto [ImagickPixel](#class.imagickpixel) que describe el color.

# ImagickDraw::getStrokeDashArray

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getStrokeDashArray — Devuelve un array que representa el patrón de trazos

### Descripción

public **ImagickDraw::getStrokeDashArray**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve un array que representa el patrón de trazos,
los espacios y los trazos.

### Valores devueltos

Devuelve un array en caso de éxito, y un array vacío en caso contrario.

# ImagickDraw::getStrokeDashOffset

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getStrokeDashOffset — Devuelve el desplazamiento del punto en el patrón

### Descripción

public **ImagickDraw::getStrokeDashOffset**(): [float](#language.types.float)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el desplazamiento del punto en el patrón.

### Valores devueltos

Devuelve un número decimal que representa el inicio del punto en el patrón.

# ImagickDraw::getStrokeLineCap

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getStrokeLineCap — Devuelve la forma a utilizar para dibujar los extremos de subrutas

### Descripción

public **ImagickDraw::getStrokeLineCap**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la forma a utilizar para dibujar los extremos de subrutas.

### Valores devueltos

Devuelve una constante [LINECAP](#imagick.constants.linecap)
(imagick::LINECAP\_\*), o 0 si los extremos de líneas no están configurados.

# ImagickDraw::getStrokeLineJoin

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getStrokeLineJoin — Devuelve la forma a utilizar para dibujar las esquinas de un camino

### Descripción

public **ImagickDraw::getStrokeLineJoin**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la forma a utilizar para dibujar las esquinas de un camino (u otras
formas vectoriales), cuando son dibujadas.

### Valores devueltos

Devuelve una constante [LINEJOIN](#imagick.constants.linejoin)
(imagick::LINEJOIN\_\*),
o 0 si las esquinas no están configuradas.

# ImagickDraw::getStrokeMiterLimit

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getStrokeMiterLimit — Devuelve el valor de 'miterLimit'

### Descripción

public **ImagickDraw::getStrokeMiterLimit**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el valor de 'miterLimit'. Cuando dos segmentos se encuentran en ángulo
agudo y se ha especificado que las uniones miter para
'lineJoin',
es posible que el miter exceda el grosor del trazo del camino.
La 'miterLimit' establece un límite al ratio entre la longitud del miter
y 'lineWidth'.

### Valores devueltos

Devuelve un entero que describe el valor de 'miterLimit', y
0 si la 'miterLimit' no está configurada.

# ImagickDraw::getStrokeOpacity

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getStrokeOpacity — Devuelve la opacidad de los contornos de un objeto

### Descripción

public **ImagickDraw::getStrokeOpacity**(): [float](#language.types.float)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la opacidad de los contornos de un objeto.

### Valores devueltos

Devuelve un [float](#language.types.float) que describe la opacidad de los contornos de un objeto.

# ImagickDraw::getStrokeWidth

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getStrokeWidth — Devuelve el ancho de trazo utilizado

### Descripción

public **ImagickDraw::getStrokeWidth**(): [float](#language.types.float)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el ancho de trazo utilizado.

### Valores devueltos

Devuelve un [float](#language.types.float) que describe el ancho de trazo.

# ImagickDraw::getTextAlignment

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getTextAlignment — Devuelve la alineación del texto

### Descripción

public **ImagickDraw::getTextAlignment**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la alineación del texto.

### Valores devueltos

Devuelve una constante [ALIGN](#imagick.constants.align)
(imagick::ALIGN\_\*), o 0 si la alineación no está configurada.

# ImagickDraw::getTextAntialias

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getTextAntialias — Devuelve la configuración de antialias del texto actual

### Descripción

public **ImagickDraw::getTextAntialias**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la configuración de antialias del texto actual, que determina si el texto
tiene antialias o no. El texto tiene antialias por defecto.

### Valores devueltos

Devuelve **[true](#constant.true)** si el texto tiene antialias y **[false](#constant.false)** si no.

# ImagickDraw::getTextDecoration

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getTextDecoration — Devuelve la decoración del texto

### Descripción

public **ImagickDraw::getTextDecoration**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la decoración del texto de anotación.

### Valores devueltos

Devuelve una constante [DECORATION](#imagick.constants.decoration)
(imagick::DECORATION\_\*),
o bien 0 si no se ha configurado ninguna decoración.

# ImagickDraw::getTextEncoding

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getTextEncoding — Devuelve el juego de caracteres utilizado para las anotaciones de texto

### Descripción

public **ImagickDraw::getTextEncoding**(): [false](#language.types.singleton)|[string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el juego de caracteres utilizado para las anotaciones de texto.

### Valores devueltos

Devuelve una cadena que especifica el juego de caracteres, o bien
**[false](#constant.false)** si el juego de caracteres no está configurado.

# ImagickDraw::getTextInterlineSpacing

(PECL imagick 3 &gt;= 3.1.0)

ImagickDraw::getTextInterlineSpacing — Obtiene el espacio entre líneas de un texto.

### Descripción

public **ImagickDraw::getTextInterlineSpacing**(): [float](#language.types.float)

Obtiene el espacio entre líneas de un texto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# ImagickDraw::getTextInterwordSpacing

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3 &gt;= 3.1.0)

ImagickDraw::getTextInterwordSpacing — Obtiene el espacio entre palabras de un texto.

### Descripción

public **ImagickDraw::getTextInterwordSpacing**(): [float](#language.types.float)

Obtiene el espacio entre palabras de un texto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# ImagickDraw::getTextKerning

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3 &gt;= 3.1.0)

ImagickDraw::getTextKerning — Obtiene el interletraje de un texto.

### Descripción

public **ImagickDraw::getTextKerning**(): [float](#language.types.float)

Obtiene el interletraje de un texto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# ImagickDraw::getTextUnderColor

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getTextUnderColor — Devuelve el color debajo del texto

### Descripción

public **ImagickDraw::getTextUnderColor**(): [ImagickPixel](#class.imagickpixel)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve el color de un rectángulo de fondo para colocar bajo anotaciones de texto.

### Valores devueltos

Devuelve un objeto [ImagickPixel](#class.imagickpixel) que describe el color.

# ImagickDraw::getVectorGraphics

(PECL imagick 2, PECL imagick 3)

ImagickDraw::getVectorGraphics — Devuelve una cadena que contiene gráficos vectoriales

### Descripción

public **ImagickDraw::getVectorGraphics**(): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve un string que especifica los gráficos vectoriales generados por cualquier
llamada a gráficos hecha desde que el objeto [ImagickDraw](#class.imagickdraw) fue instanciado.

### Valores devueltos

Devuelve un string que contiene los gráficos vectoriales.

# ImagickDraw::line

(PECL imagick 2, PECL imagick 3)

ImagickDraw::line — Dibuja una línea

### Descripción

public **ImagickDraw::line**(
    [float](#language.types.float) $start_x,
    [float](#language.types.float) $start_y,
    [float](#language.types.float) $end_x,
    [float](#language.types.float) $end_y
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una línea utilizando el color de trazo actual, su opacidad y su
grosor.

### Parámetros

     start_x


       La coordenada X de inicio






     start_y


       La coordenada Y de inicio






     end_x


       La coordenada X de fin






     end_y


       La coordenada Y de fin





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::line()**

&lt;?php
function line($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);

    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFontSize(72);

    $draw-&gt;line(125, 70, 100, 50);
    $draw-&gt;line(350, 170, 100, 150);

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::matte

(PECL imagick 2, PECL imagick 3)

ImagickDraw::matte — Dibuja sobre el canal de opacidad de la imagen

### Descripción

public **ImagickDraw::matte**([float](#language.types.float) $x, [float](#language.types.float) $y, [int](#language.types.integer) $paint): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja sobre el canal de opacidad de la imagen, con el fin de hacer transparentes
los píxeles indicados.

### Parámetros

     x


       Abscisa del mate






     y


       Ordenada del mate






     paint


       Una de las constantes [PAINT](#imagick.constants.paint)
       (imagick::PAINT_*).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::matte()**

&lt;?php
function matte($strokeColor, $fillColor, $backgroundColor, $paintType) {
$draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);

    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFontSize(72);

    $draw-&gt;matte(120, 120, $paintType);
    $draw-&gt;rectangle(100, 100, 300, 200);

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::pathClose

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathClose — Añade un elemento de camino al camino actual

### Descripción

public **ImagickDraw::pathClose**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Añade un elemento de camino al camino actual, que cerrará el subcamino
dibujando una línea recta desde el punto actual hasta el punto de inicio
más reciente (generalmente, el último punto de desplazamiento).

### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathCurveToAbsolute

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathCurveToAbsolute — Dibuja una curva de Bézier cúbica, en coordenadas absolutas

### Descripción

public **ImagickDraw::pathCurveToAbsolute**(
    [float](#language.types.float) $x1,
    [float](#language.types.float) $y1,
    [float](#language.types.float) $x2,
    [float](#language.types.float) $y2,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una curva de Bézier cúbica, a partir del punto actual
(x,y) utilizando el punto
(x1,y1) como punto de
control al inicio de la curva y
(x2,y2) como punto de control
al final de la curva, utilizando coordenadas absolutas. Al final de
la orden, el nuevo punto actual es el punto final
(x,y), utilizado por el polybezier.

### Parámetros

     x1


       Abscisa del primer punto de control






     y1


       Ordenada del primer punto de control






     x2


       Abscisa del segundo punto de control






     y2


       Ordenada del segundo punto de control






     x


       Abscisa del final de la curva






     y


       Ordenada del final de la curva





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathCurveToQuadraticBezierAbsolute

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathCurveToQuadraticBezierAbsolute — Dibuja una curva de Bézier cuadrática, en coordenadas absolutas

### Descripción

public **ImagickDraw::pathCurveToQuadraticBezierAbsolute**(
    [float](#language.types.float) $x1,
    [float](#language.types.float) $y1,
    [float](#language.types.float) $x_end,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una curva de Bézier cuadrática, en coordenadas relativas, con respecto al punto actual (x,y), utilizando el punto (x1,y1) como punto de control. Al finalizar el dibujo, el nuevo punto actual se convierte en el punto final (x,y) utilizado por el polybezier.

### Parámetros

     x1


       Abscisa del punto de control






     y1


       Ordenada del punto de control






     x_end


       Abscisa del punto final






     y


       Ordenada del punto final





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::pathCurveToQuadraticBezierAbsolute()**

&lt;?php
function pathCurveToQuadraticBezierAbsolute($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);

    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFontSize(72);

    $draw-&gt;pathStart();
    $draw-&gt;pathMoveToAbsolute(50,250);

    // This specifies a quadratic bezier curve with the current position as the start
    // point, the control point is the first two params, and the end point is the last two params.
    $draw-&gt;pathCurveToQuadraticBezierAbsolute(
        150,50,
        250,250
    );

    // This specifies a quadratic bezier curve with the current position as the start
    // point, the control point is mirrored from the previous curves control point
    // and the end point is defined by the x, y values.
    $draw-&gt;pathCurveToQuadraticBezierSmoothAbsolute(
        450,250
    );

    // This specifies a quadratic bezier curve with the current position as the start
    // point, the control point is mirrored from the previous curves control point
    // and the end point is defined relative from the current position by the x, y values.
    $draw-&gt;pathCurveToQuadraticBezierSmoothRelative(
        200,-100
    );

    $draw-&gt;pathFinish();

    $imagick = new \Imagick();
    $imagick-&gt;newImage(700, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");

    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::pathCurveToQuadraticBezierRelative

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathCurveToQuadraticBezierRelative — Dibuja una curva de Bézier cuadrática, en coordenadas relativas

### Descripción

public **ImagickDraw::pathCurveToQuadraticBezierRelative**(
    [float](#language.types.float) $x1,
    [float](#language.types.float) $y1,
    [float](#language.types.float) $x_end,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una curva de Bézier cuadrática, en coordenadas relativas,
respecto al punto actual (x,y),
utilizando el punto (x1,y1) como
punto de control. Al finalizar el dibujo, el nuevo punto actual
se convierte en el punto final (x,y)
utilizado por el polybezier.

### Parámetros

     x1


       coordenada x de inicio






     y1


       coordenada y de inicio






     x_end


       coordenada x de fin






     y


       coordenada y de fin





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathCurveToQuadraticBezierSmoothAbsolute

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathCurveToQuadraticBezierSmoothAbsolute — Dibuja una curva Bézier cuadrática

### Descripción

public **ImagickDraw::pathCurveToQuadraticBezierSmoothAbsolute**([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

Dibuja una curva Bézier cuadrática (usando coordenadas absolutas) desde el
punto actual a (x, y). Se asume que el punto de control es la refelxión del
punto de control del comando previo relativo al punto actual.
(Si no hay comando previo o el comando previo no es
DrawPathCurveToQuadraticBezierAbsolute,
DrawPathCurveToQuadraticBezierRelative,
DrawPathCurveToQuadraticBezierSmoothAbsolut o
DrawPathCurveToQuadraticBezierSmoothRelative, se asume que el punto de control
coincide con el punto actual). Al final del comando, el nuevo punto actual se
convierte en el par de coordenadas final (x, y) usado en el Bezígono.

Esta función no se puede utilizar para continuar de forma suave una curva Bézier cúbica. Solamente puede continuarse suavemente desde una curva cuadrática.

### Parámetros

     x


       coordenada x final






     y


       coordenada y final





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de ImagickDraw::pathCurveToQuadraticBezierSmoothAbsolute()**

&lt;?php
$draw = new \ImagickDraw();

$draw-&gt;setStrokeOpacity(1);
$draw-&gt;setStrokeColor("black");
$draw-&gt;setFillColor("blue");

$draw-&gt;setStrokeWidth(2);
$draw-&gt;setFontSize(72);

$draw-&gt;pathStart();
$draw-&gt;pathMoveToAbsolute(50,250);

// This specifies a quadratic bezier curve with the current position as the start
// point, the control point is the first two params, and the end point is the last two params.
$draw-&gt;pathCurveToQuadraticBezierAbsolute(
150,50,
250,250
);

// This specifies a quadratic bezier curve with the current position as the start
// point, the control point is mirrored from the previous curves control point
// and the end point is defined by the x, y values.
$draw-&gt;pathCurveToQuadraticBezierSmoothAbsolute(
450,250
);

// This specifies a quadratic bezier curve with the current position as the start
// point, the control point is mirrored from the previous curves control point
// and the end point is defined relative from the current position by the x, y values.
$draw-&gt;pathCurveToQuadraticBezierSmoothRelative(
200,-100
);

$draw-&gt;pathFinish();

$imagick = new \Imagick();
$imagick-&gt;newImage(700, 500, $backgroundColor);
$imagick-&gt;setImageFormat("png");

$imagick-&gt;drawImage($draw);

header("Content-Type: image/png");
echo $imagick-&gt;getImageBlob();
?&gt;

# ImagickDraw::pathCurveToQuadraticBezierSmoothRelative

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathCurveToQuadraticBezierSmoothRelative — Dibuja una curva Bézier cuadrática

### Descripción

public **ImagickDraw::pathCurveToQuadraticBezierSmoothRelative**([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una curva Bézier cuadrática (usando coordenadas relativas) desde el
punto actual a (x, y). Se asume que el punto de control es la refelxión del
punto de control del comando previo relativo al punto actual.
(Si no hay comando previo o el comando previo no es
DrawPathCurveToQuadraticBezierAbsolute,
DrawPathCurveToQuadraticBezierRelative,
DrawPathCurveToQuadraticBezierSmoothAbsolut o
DrawPathCurveToQuadraticBezierSmoothRelative, se asume que el punto de control
coincide con el punto actual). Al final del comando, el nuevo punto actual se
convierte en el par de coordenadas final (x, y) usado en el Bezígono.

Esta función no se puede utilizar para continuar de forma suave una curva Bézier cúbica. Solamente puede continuarse suavemente desde una curva cuadrática.

### Parámetros

     x


       coordenada x final






     y


       coordenada y final





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo de ImagickDraw::pathCurveToQuadraticBezierSmoothRelative()**

&lt;?php
$draw = new \ImagickDraw();

$draw-&gt;setStrokeOpacity(1);
$draw-&gt;setStrokeColor("black");
$draw-&gt;setFillColor("blue");

$draw-&gt;setStrokeWidth(2);
$draw-&gt;setFontSize(72);

$draw-&gt;pathStart();
$draw-&gt;pathMoveToAbsolute(50,250);

// This specifies a quadratic bezier curve with the current position as the start
// point, the control point is the first two params, and the end point is the last two params.
$draw-&gt;pathCurveToQuadraticBezierAbsolute(
150,50,
250,250
);

// This specifies a quadratic bezier curve with the current position as the start
// point, the control point is mirrored from the previous curves control point
// and the end point is defined by the x, y values.
$draw-&gt;pathCurveToQuadraticBezierSmoothAbsolute(
450,250
);

// This specifies a quadratic bezier curve with the current position as the start
// point, the control point is mirrored from the previous curves control point
// and the end point is defined relative from the current position by the x, y values.
$draw-&gt;pathCurveToQuadraticBezierSmoothRelative(
200,-100
);

$draw-&gt;pathFinish();

$imagick = new \Imagick();
$imagick-&gt;newImage(700, 500, $backgroundColor);
$imagick-&gt;setImageFormat("png");

$imagick-&gt;drawImage($draw);

header("Content-Type: image/png");
echo $imagick-&gt;getImageBlob();
?&gt;

# ImagickDraw::pathCurveToRelative

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathCurveToRelative — Dibuja una curva de Bézier cúbica, en coordenadas relativas

### Descripción

public **ImagickDraw::pathCurveToRelative**(
    [float](#language.types.float) $x1,
    [float](#language.types.float) $y1,
    [float](#language.types.float) $x2,
    [float](#language.types.float) $y2,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una curva de Bézier cúbica, a partir del punto actual
(x,y) utilizando el punto
(x1,y1) como punto de
control al inicio de la curva y
(x2,y2) como punto de
control al final de la curva, utilizando coordenadas relativas.
Al finalizar la orden, el nuevo punto actual es el punto final
(x,y), utilizado por el polybezier.

### Parámetros

     x1


       Abscisa del punto de inicio






     y1


       Ordenada del punto de inicio






     x2


       Abscisa del punto de control final






     y2


       Ordenada del punto de control final






     x


       Abscisa del punto final






     y


       Ordenada del punto final





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathCurveToSmoothAbsolute

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathCurveToSmoothAbsolute — Dibuja una curva de Bézier, en coordenadas absolutas

### Descripción

public **ImagickDraw::pathCurveToSmoothAbsolute**(
    [float](#language.types.float) $x2,
    [float](#language.types.float) $y2,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una curva de Bézier, en coordenadas absolutas, a partir del punto
actual (x,y).
El primer punto de control es la reflexión del segundo
punto de control del comando anterior, relativo al punto actual.
Si no ha habido un comando anterior, o si el comando anterior
no era DrawPathCurveToAbsolute, DrawPathCurveToRelative,
DrawPathCurveToSmoothAbsolute o DrawPathCurveToSmoothRelative, se asume
entonces que el primer punto de control coincide con el punto actual.
(x2,y2)
es el segundo punto de control (es decir, el punto de control al final
de la línea. Al final del comando, el nuevo punto actual es el punto
final, de coordenadas (x,y),
en el polybezier.

### Parámetros

     x2


       abscisa del segundo punto de control






     y2


       ordenada del segundo punto de control






     x


       abscisa del punto de control final






     y


       ordenada del punto de control final





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathCurveToSmoothRelative

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathCurveToSmoothRelative — Dibuja una curva de Bézier, en coordenadas relativas

### Descripción

public **ImagickDraw::pathCurveToSmoothRelative**(
    [float](#language.types.float) $x2,
    [float](#language.types.float) $y2,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una curva de Bézier, en coordenadas relativas, a partir del punto
actual (x,y).
El primer punto de control es la reflexión del segundo
punto de control del comando anterior, relativo al punto actual.
Si no ha habido un comando anterior, o si el comando anterior
no era DrawPathCurveToAbsolute, DrawPathCurveToRelative,
DrawPathCurveToSmoothAbsolute o DrawPathCurveToSmoothRelative, se asume
entonces que el primer punto de control coincide con el punto actual.
(x2,y2)
es el segundo punto de control (i.e., el punto de control al final
de la línea. Al final del comando, el nuevo punto actual es el punto
final, de coordenadas (x,y),
en el polybezier.

### Parámetros

     x2


       Abscisa del segundo punto de control






     y2


       Ordenada del segundo punto de control






     x


       Abscisa del punto de control final






     y


       Ordenada del punto de control final





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathEllipticArcAbsolute

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathEllipticArcAbsolute — Dibuja un arco de elipse, en coordenadas absolutas

### Descripción

public **ImagickDraw::pathEllipticArcAbsolute**(
    [float](#language.types.float) $rx,
    [float](#language.types.float) $ry,
    [float](#language.types.float) $x_axis_rotation,
    [bool](#language.types.boolean) $large_arc,
    [bool](#language.types.boolean) $sweep,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja un arco de elipse a partir del punto actual (x, y), utilizando
coordenadas relativas. El tamaño y la orientación de la elipse
se definen mediante dos radios, (rx, ry) y una rotación xAxisRotation,
que indica cómo la elipse, en su conjunto, está situada en
el sistema de coordenadas. El centro (cx, cy) de la elipse se calcula
automáticamente para satisfacer las restricciones de los demás parámetros.
Si large_arc es **[true](#constant.true)**, entonces se dibuja el arco
más grande.
Si sweep es **[true](#constant.true)**, entonces el dibujo del arco se realiza
en sentido horario.

### Parámetros

     rx


       Radio X






     ry


       Radio Y






     x_axis_rotation


       Rotación sobre el eje X






     large_arc


       Opción de large_arc_flag






     sweep


       Opción sweep_flag






     x


       La abscisa






     y


       La ordenada





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathEllipticArcRelative

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathEllipticArcRelative — Dibuja un arco de elipse, en coordenadas relativas

### Descripción

public **ImagickDraw::pathEllipticArcRelative**(
    [float](#language.types.float) $rx,
    [float](#language.types.float) $ry,
    [float](#language.types.float) $x_axis_rotation,
    [bool](#language.types.boolean) $large_arc,
    [bool](#language.types.boolean) $sweep,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja un arco de elipse a partir del punto actual (x, y), utilizando
coordenadas relativas. El tamaño y la orientación de la elipse
se definen mediante dos radios, (rx, ry) y una rotación xAxisRotation,
que indica cómo la elipse, en su conjunto, está situada en
el sistema de coordenadas. El centro (cx, cy) de la elipse se calcula
automáticamente para satisfacer las restricciones de los demás parámetros.
Si large_arc es **[true](#constant.true)**, entonces se dibuja el arco más grande.
Si sweep es **[true](#constant.true)**, entonces el dibujo del arco se realiza
en sentido horario.

### Parámetros

     rx


       Radio X






     ry


       Radio Y






     x_axis_rotation


       Rotación sobre el eje X






     large_arc


       La opción de large_arc_flag






     sweep


       La opción de sweep_flag






     x


       La abscisa






     y


       La ordenada





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathFinish

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathFinish — Finaliza el camino actual

### Descripción

public **ImagickDraw::pathFinish**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Finaliza el camino actual.

### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathLineToAbsolute

(PECL imagick 2)

ImagickDraw::pathLineToAbsolute — Dibuja una línea de camino, en coordenadas absolutas

### Descripción

public **ImagickDraw::pathLineToAbsolute**([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una línea desde el punto actual hasta el punto objetivo,
utilizando coordenadas absolutas. El punto objetivo se convierte entonces en el punto
actual.

### Parámetros

     x


       La abscisa de inicio






     y


       La abscisa de fin





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathLineToHorizontalAbsolute

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathLineToHorizontalAbsolute — Dibuja una línea de camino horizontal, en coordenadas absolutas

### Descripción

public **ImagickDraw::pathLineToHorizontalAbsolute**([float](#language.types.float) $x): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una línea vertical desde el punto actual hasta el punto objetivo,
utilizando coordenadas relativas. El punto objetivo se convierte entonces en el punto
actual.

### Parámetros

     x


       La abscisa





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathLineToHorizontalRelative

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathLineToHorizontalRelative — Dibuja una línea de camino horizontal, en coordenadas relativas

### Descripción

public **ImagickDraw::pathLineToHorizontalRelative**([float](#language.types.float) $x): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una línea horizontal desde el punto actual hasta el punto objetivo,
utilizando coordenadas relativas. El punto objetivo se convierte entonces en el punto
actual.

### Parámetros

     x


       La abscisa





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathLineToRelative

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathLineToRelative — Dibuja una línea de camino, en coordenadas relativas

### Descripción

public **ImagickDraw::pathLineToRelative**([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una línea a partir del punto actual, hasta el punto objetivo,
utilizando coordenadas relativas. El punto objetivo se convierte entonces en el punto
actual.

### Parámetros

     x


       abscisa de inicio






     y


       ordenada de inicio





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathLineToVerticalAbsolute

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathLineToVerticalAbsolute — Dibuja una línea de camino vertical, en coordenadas absolutas

### Descripción

public **ImagickDraw::pathLineToVerticalAbsolute**([float](#language.types.float) $y): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una línea vertical desde el punto actual hasta el punto objetivo,
utilizando coordenadas absolutas. El punto objetivo se convierte entonces en el punto
actual.

### Parámetros

     y


       Ordenada





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathLineToVerticalRelative

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathLineToVerticalRelative — Dibuja una línea de camino vertical, en coordenadas relativas

### Descripción

public **ImagickDraw::pathLineToVerticalRelative**([float](#language.types.float) $y): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una línea vertical desde el punto actual hasta el punto objetivo,
utilizando coordenadas relativas. El punto objetivo se convierte entonces en el punto
actual.

### Parámetros

     y


       ordenada objetivo





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathMoveToAbsolute

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathMoveToAbsolute — Inicia un nuevo subcamino, en coordenadas absolutas

### Descripción

public **ImagickDraw::pathMoveToAbsolute**([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Inicia un nuevo subcamino a partir de las coordenadas indicadas,
utilizando coordenadas absolutas. El punto actual se convierte entonces
en las coordenadas especificadas.

### Parámetros

     x


       La abscisa objetivo






     y


       La ordenada objetivo





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathMoveToRelative

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathMoveToRelative — Inicia un nuevo subcamino, en coordenadas relativas

### Descripción

public **ImagickDraw::pathMoveToRelative**([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Inicia un nuevo subcamino a partir de las coordenadas indicadas,
utilizando coordenadas relativas. El punto actual se convierte entonces
en las coordenadas especificadas.

### Parámetros

     x


       La abscisa objetivo






     y


       La ordenada objetivo





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pathStart

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pathStart — Declara el inicio de una lista de dibujo de trazados

### Descripción

public **ImagickDraw::pathStart**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Declara el inicio de una lista de dibujo de trazados que finaliza con un comando
DrawPathFinish() coincidente. Todos los demás comandos DrawPath deben estar encerrados
entre comandos DrawPathFinish(). Ésto es debido a que los comandos de dibujo de trazados
son comandos subordinados y no funcionan por sí mismos.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::pathStart()**



      &lt;?php

function pathStart($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);

    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFontSize(72);

    $draw-&gt;pathStart();
    $draw-&gt;pathMoveToAbsolute(50, 50);
    $draw-&gt;pathLineToAbsolute(100, 50);
    $draw-&gt;pathLineToRelative(0, 50);
    $draw-&gt;pathLineToHorizontalRelative(-50);
    $draw-&gt;pathFinish();

    $draw-&gt;pathStart();
    $draw-&gt;pathMoveToAbsolute(50, 50);
    $draw-&gt;pathMoveToRelative(300, 0);
    $draw-&gt;pathLineToRelative(50, 0);
    $draw-&gt;pathLineToVerticalRelative(50);
    $draw-&gt;pathLineToHorizontalAbsolute(350);
    $draw-&gt;pathclose();
    $draw-&gt;pathFinish();

    $draw-&gt;pathStart();
    $draw-&gt;pathMoveToAbsolute(50, 300);
    $draw-&gt;pathCurveToAbsolute(50, 300, 100, 200, 300, 300);
    $draw-&gt;pathLineToVerticalAbsolute(350);
    $draw-&gt;pathFinish();

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");

    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::point

(PECL imagick 2, PECL imagick 3)

ImagickDraw::point — Dibuja un punto

### Descripción

public **ImagickDraw::point**([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja un punto usando el color del contorno y el grosor del contorno en las coordenadas especificadas.

### Parámetros

     x


       coordenada x del punto






     y


       coordenada y del punto





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::point()**



      &lt;?php

function point($fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setFillColor($fillColor);

    for ($x = 0; $x &lt; 10000; $x++) {
        $draw-&gt;point(rand(0, 500), rand(0, 500));
    }

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::polygon

(PECL imagick 2, PECL imagick 3)

ImagickDraw::polygon — Dibuja un polígono

### Descripción

public **ImagickDraw::polygon**([array](#language.types.array) $coordinates): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja un polígono usando el contorno, el ancho del contorno, y el color de relleno o de la
textura actuales, usando el array de coordenadas especificado.

### Parámetros

     coordinates


       array multidimensional como array( array( 'x' =&gt; 3, 'y' =&gt; 4 ), array( 'x' =&gt; 2, 'y' =&gt; 6 ) );





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::polygon()**



      &lt;?php

function polygon($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setStrokeWidth(4);

    $draw-&gt;setFillColor($fillColor);

    $points = [
        ['x' =&gt; 40 * 5, 'y' =&gt; 10 * 5],
        ['x' =&gt; 20 * 5, 'y' =&gt; 20 * 5],
        ['x' =&gt; 70 * 5, 'y' =&gt; 50 * 5],
        ['x' =&gt; 60 * 5, 'y' =&gt; 15 * 5],
    ];

    $draw-&gt;polygon($points);

    $image = new \Imagick();
    $image-&gt;newImage(500, 300, $backgroundColor);
    $image-&gt;setImageFormat("png");
    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::polyline

(PECL imagick 2, PECL imagick 3)

ImagickDraw::polyline — Dibuja una poli-línea

### Descripción

public **ImagickDraw::polyline**([array](#language.types.array) $coordinates): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja una poli-línea usando el contorno, el ancho del contorno, y el color de relleno
o de la textura actuales, usando el array de coordenadas especificado.

### Parámetros

     coordinates


       array de coordenadas x e y: array( array( 'x' =&gt; 4, 'y' =&gt; 6 ), array( 'x' =&gt; 8, 'y' =&gt; 10 ) )





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::polyline()**



      &lt;?php

function polyline($strokeColor, $fillColor, $backgroundColor) {
$draw = new \ImagickDraw();

    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);

    $draw-&gt;setStrokeWidth(5);

    $points = [
        ['x' =&gt; 40 * 5, 'y' =&gt; 10 * 5],
        ['x' =&gt; 20 * 5, 'y' =&gt; 20 * 5],
        ['x' =&gt; 70 * 5, 'y' =&gt; 50 * 5],
        ['x' =&gt; 60 * 5, 'y' =&gt; 15 * 5]
    ];

    $draw-&gt;polyline($points);

    $image = new \Imagick();
    $image-&gt;newImage(500, 300, $backgroundColor);
    $image-&gt;setImageFormat("png");
    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::pop

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pop — Destruye el objeto ImagickDraw actual de la pila, y lo devuelve al objeto ImagickDraw previamente metido

### Descripción

public **ImagickDraw::pop**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Destruye el objeto ImagickDraw actual de la pila, y lo devuelve
al objeto ImagickDraw previamente metido. Pueden existir mútiples objetos ImagickDraw.
Es un error intentar sacar más objetos ImagickDraw de los que se han metido, y es una
forma apropiada sacar todos los objetos ImagickDraw que han sido metidos.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ImagickDraw::popClipPath

(PECL imagick 2, PECL imagick 3)

ImagickDraw::popClipPath — Finaliza la definición de un camino

### Descripción

public **ImagickDraw::popClipPath**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Finaliza la definición de un camino.

### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::popDefs

(PECL imagick 2, PECL imagick 3)

ImagickDraw::popDefs — Finaliza una lista de definiciones

### Descripción

public **ImagickDraw::popDefs**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Finaliza una lista de definiciones.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::popDefs()**



      &lt;?php

function popDefs($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setstrokeOpacity(1);
    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFontSize(72);
    $draw-&gt;pushDefs();
    $draw-&gt;setStrokeColor('white');
    $draw-&gt;rectangle(50, 50, 200, 200);
    $draw-&gt;popDefs();

    $draw-&gt;rectangle(300, 50, 450, 200);

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");

    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::popPattern

(PECL imagick 2, PECL imagick 3)

ImagickDraw::popPattern — Finaliza una definición de patrón

### Descripción

public **ImagickDraw::popPattern**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Finaliza una definición de patrón.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ImagickDraw::push

(PECL imagick 2, PECL imagick 3)

ImagickDraw::push — Clona el objeto ImagickDraw actual y lo mete en la pila

### Descripción

public **ImagickDraw::push**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Clona el objeto ImagickDraw actual para crear un nuevo objeto ImagickDraw, que es
añadido a la pila de ImagickDraw. Los objetos de dibujo ImagickDraw originales pueden ser
devueltos invocando a [ImagickDraw::pop()](#imagickdraw.pop). Los objetos ImagickDraw son almacenados en una pila
ImagickDraw. Por cada Pop debe haber habido un Push
equivalente.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::push()**



      &lt;?php

function push($strokeColor, $fillColor, $backgroundColor, $fillModifiedColor) {

    $draw = new \ImagickDraw();
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillModifiedColor);
    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFontSize(72);
    $draw-&gt;push();
    $draw-&gt;translate(50, 50);
    $draw-&gt;rectangle(200, 200, 300, 300);
    $draw-&gt;pop();
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;rectangle(200, 200, 300, 300);

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");

    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::pushClipPath

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pushClipPath — Inicia la definición de un trazado de recorte

### Descripción

public **ImagickDraw::pushClipPath**([string](#language.types.string) $clip_mask_id): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Inicia la definición de un trazado de recorte el cuál está compuesto por cualquier número de
comandos de dibujo y finalizado por un comando [ImagickDraw::popClipPath()](#imagickdraw.popclippath).

### Parámetros

     clip_mask_id


       Id de la máscara de recorte





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pushDefs

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pushDefs — Indica que los siguientes comandos crean elementos con nombre para un procesamiento previo

### Descripción

public **ImagickDraw::pushDefs**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Indica que los comandos hasta un comando [ImagickDraw::popDefs()](#imagickdraw.popdefs) finalizador
crean elementos nominados (p.ej. trazados de recorte, texturas, etc.) los cuales
pueden ser procesados previamente de forma segura para la eficiencia.

### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::pushPattern

(PECL imagick 2, PECL imagick 3)

ImagickDraw::pushPattern — Indica que los comandos subsiguientes hasta un comando ImagickDraw::opPattern() comprenden la definición de un patrón nominado

### Descripción

public **ImagickDraw::pushPattern**(
    [string](#language.types.string) $pattern_id,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y,
    [float](#language.types.float) $width,
    [float](#language.types.float) $height
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Indica que los comandos subsiguientes hasta un comando DrawPopPattern()
comprenden la definición de un patrón nominado. Al espacio del patrón se le asigna
las coordenadas de la esquina superior izquierda, un ancho y alto, y se convierte en su propio
espacio de dibujo. Cualquier cosa que se pueda dibujar se puede usar en una definición de
patrón. Los patrones nominados se pueden usar como definiciones de contorno o pincel.

### Parámetros

     pattern_id


       el id del patrón






     x


       coordenada x de la esquina superior izquierda






     y


       coordenada y de la esquina superior izquierda






     width


       ancho del patrón






     height


       alto del patrón





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::pushPattern()**



      &lt;?php

function pushPattern($strokeColor, $fillColor, $backgroundColor) {
$draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeWidth(1);
    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);

    $draw-&gt;setStrokeWidth(1);

    $draw-&gt;pushPattern("MyFirstPattern", 0, 0, 50, 50);
    for ($x = 0; $x &lt; 50; $x += 10) {
        for ($y = 0; $y &lt; 50; $y += 5) {
            $positionX = $x + (($y / 5) % 5);
            $draw-&gt;rectangle($positionX, $y, $positionX + 5, $y + 5);
        }
    }
    $draw-&gt;popPattern();

    $draw-&gt;setFillOpacity(0);
    $draw-&gt;rectangle(100, 100, 400, 400);
    $draw-&gt;setFillOpacity(1);

    $draw-&gt;setFillOpacity(1);

    $draw-&gt;push();
    $draw-&gt;setFillPatternURL('#MyFirstPattern');
    $draw-&gt;setFillColor('yellow');
    $draw-&gt;rectangle(100, 100, 400, 400);
    $draw-&gt;pop();

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");

    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::rectangle

(PECL imagick 2, PECL imagick 3)

ImagickDraw::rectangle — Dibuja un rectángulo

### Descripción

public **ImagickDraw::rectangle**(
    [float](#language.types.float) $top_left_x,
    [float](#language.types.float) $top_left_y,
    [float](#language.types.float) $bottom_right_x,
    [float](#language.types.float) $bottom_right_y
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja un rectángulo a partir de sus coordenadas y utilizando
el trazo actual, su ancho y su patrón.

### Parámetros

     top_left_x








     top_left_y


       ordenada del ángulo superior izquierdo






     bottom_right_x


       abscisa del ángulo inferior derecho






     bottom_right_y


       ordenada del ángulo inferior derecho





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::rectangle()**

&lt;?php
function rectangle($strokeColor, $fillColor, $backgroundColor) {
    $draw = new \ImagickDraw();
    $strokeColor = new \ImagickPixel($strokeColor);
$fillColor = new \ImagickPixel($fillColor);

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeWidth(2);

    $draw-&gt;rectangle(200, 200, 300, 300);
    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");

    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::render

(PECL imagick 2, PECL imagick 3)

ImagickDraw::render — Realiza el renderizado de todos los dibujos en la imagen

### Descripción

public **ImagickDraw::render**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Realiza el renderizado de todos los dibujos en la imagen.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ImagickDraw::resetVectorGraphics

(PECL imagick 2, PECL imagick 3)

ImagickDraw::resetVectorGraphics — Restablece los gráficos vectoriales

### Descripción

public **ImagickDraw::resetVectorGraphics**(): [bool](#language.types.boolean)

Restablece los gráficos vectoriales.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# ImagickDraw::rotate

(PECL imagick 2, PECL imagick 3)

ImagickDraw::rotate — Aplica la rotación especificada al espacio de coordenadas actual

### Descripción

public **ImagickDraw::rotate**([float](#language.types.float) $degrees): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Aplica la rotación especificada al espacio de coordenadas actual.

### Parámetros

     degrees


       grados a rotar.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::rotate()**



      &lt;?php

function rotate($strokeColor, $fillColor, $backgroundColor, $fillModifiedColor) {
    $draw = new \ImagickDraw();
    $draw-&gt;setStrokeColor($strokeColor);
$draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setFillColor($fillColor);
$draw-&gt;rectangle(200, 200, 300, 300);
    $draw-&gt;setFillColor($fillModifiedColor);
$draw-&gt;rotate(15);
$draw-&gt;rectangle(200, 200, 300, 300);

    $image = new \Imagick();
    $image-&gt;newImage(500, 500, $backgroundColor);
    $image-&gt;setImageFormat("png");
    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::roundRectangle

(PECL imagick 2, PECL imagick 3)

ImagickDraw::roundRectangle — Dibuja un rectángulo con esquinas redondeadas

### Descripción

public **ImagickDraw::roundRectangle**(
    [float](#language.types.float) $top_left_x,
    [float](#language.types.float) $top_left_y,
    [float](#language.types.float) $bottom_right_x,
    [float](#language.types.float) $bottom_right_y,
    [float](#language.types.float) $rounding_x,
    [float](#language.types.float) $rounding_y
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Dibuja un rectángulo con esquinas redondeadas, a partir de dos coordenadas,
x &amp; y, el radio de esquina y utilizando el trazo actual, su grosor
y su color de relleno.

### Parámetros

     top_left_x


       La abscisa de la esquina superior izquierda






     top_left_y


       La ordenada de la esquina superior izquierda






     bottom_right_x


       La abscisa de la esquina inferior derecha






     bottom_right_y


       La ordenada de la esquina inferior derecha






     rounding_x


       El radio en x






     rounding_y


       El radio en y





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::roundRectangle()**

&lt;?php
function roundRectangle($strokeColor, $fillColor, $backgroundColor, $startX, $startY, $endX, $endY, $roundX, $roundY) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeWidth(2);

    $draw-&gt;roundRectangle($startX, $startY, $endX, $endY, $roundX, $roundY);

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");

    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::scale

(PECL imagick 2, PECL imagick 3)

ImagickDraw::scale — Ajusta el factor de escala

### Descripción

public **ImagickDraw::scale**([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Ajusta el factor de escala a aplicar en las direcciones horizontal y vertical
al espacio de coordenadas actual.

### Parámetros

     x


       factor horizontal






     y


       factor vertical





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::scale()**



      &lt;?php

function scale($strokeColor, $fillColor, $backgroundColor, $fillModifiedColor) {

    $draw = new \ImagickDraw();
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setStrokeWidth(4);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;rectangle(200, 200, 300, 300);
    $draw-&gt;setFillColor($fillModifiedColor);
    $draw-&gt;scale(1.4, 1.4);
    $draw-&gt;rectangle(200, 200, 300, 300);

    $image = new \Imagick();
    $image-&gt;newImage(500, 500, $backgroundColor);
    $image-&gt;setImageFormat("png");
    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setClipPath

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setClipPath — Asocia un trazado de recorte nominado con la imagen

### Descripción

public **ImagickDraw::setClipPath**([string](#language.types.string) $clip_mask): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Asocia un trazado de recorte nominado con la imagen. Sólo las áreas dibujadas
por el trazado de recorte serán modificadas mientras permanezca el efecto.

### Parámetros

     clip_mask


       el nombre del trazado de recorte





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::setClipPath()**



      &lt;?php

function setClipPath($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeWidth(2);

    $clipPathName = 'testClipPath';

    $draw-&gt;pushClipPath($clipPathName);
    $draw-&gt;rectangle(0, 0, 250, 250);
    $draw-&gt;popClipPath();
    $draw-&gt;setClipPath($clipPathName);
    $draw-&gt;rectangle(100, 100, 400, 400);

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");

    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setClipRule

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setClipRule — Configura la regla de relleno del polígono a utilizar con los caminos

### Descripción

public **ImagickDraw::setClipRule**([int](#language.types.integer) $fillrule): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Configura la regla de relleno del polígono a utilizar con los caminos.

### Parámetros

     fillrule


       Una de las constantes [FILLRULE](#imagick.constants.fillrule)
       (imagick::FILLRULE_*).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setClipRule()**

&lt;?php
function setClipRule($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeWidth(2);
    //\Imagick::FILLRULE_EVENODD
    //\Imagick::FILLRULE_NONZERO

    $clipPathName = 'testClipPath';
    $draw-&gt;pushClipPath($clipPathName);
    $draw-&gt;setClipRule(\Imagick::FILLRULE_EVENODD);
    $draw-&gt;rectangle(0, 0, 300, 500);
    $draw-&gt;rectangle(200, 0, 500, 500);
    $draw-&gt;popClipPath();
    $draw-&gt;setClipPath($clipPathName);
    $draw-&gt;rectangle(200, 200, 300, 300);

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");

    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setClipUnits

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setClipUnits — Configura el modo de interpretación de las unidades de ruta

### Descripción

public **ImagickDraw::setClipUnits**([int](#language.types.integer) $pathunits): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Configura el modo de interpretación de las unidades de ruta.

### Parámetros

     pathunits


       El número de unidades de clip





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setClipUnits()**

&lt;?php
function setClipUnits($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeWidth(2);
    $clipPathName = 'testClipPath';
    $draw-&gt;setClipUnits(\Imagick::RESOLUTION_PIXELSPERINCH);
    $draw-&gt;pushClipPath($clipPathName);
    $draw-&gt;rectangle(0, 0, 250, 250);
    $draw-&gt;popClipPath();
    $draw-&gt;setClipPath($clipPathName);

    //RESOLUTION_PIXELSPERINCH
    //RESOLUTION_PIXELSPERCENTIMETER

    $draw-&gt;rectangle(200, 200, 300, 300);
    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");

    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setFillAlpha

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setFillAlpha — Configura la opacidad del color de relleno

### Descripción

public **ImagickDraw::setFillAlpha**([float](#language.types.float) $alpha): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Configura la opacidad a utilizar cuando el color de relleno es usado.
1.0 es completamente opaco.

### Parámetros

     alpha


       Canal alpha del color de relleno





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setFillAlpha()**

&lt;?php
function setFillAlpha($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;rectangle(100, 200, 200, 300);
    @$draw-&gt;setFillAlpha(0.4);
    $draw-&gt;rectangle(300, 200, 400, 300);

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setFillColor

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setFillColor — Configura el color de relleno de los objetos dibujados

### Descripción

public **ImagickDraw::setFillColor**([ImagickPixel](#class.imagickpixel)|[string](#language.types.string) $fill_color): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Configura el color de relleno de los objetos dibujados.

### Parámetros

     fill_color


       El objeto ImagickPixel a utilizar para el color.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setFillColor()**

&lt;?php
function setFillColor($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeWidth(1.5);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;rectangle(50, 50, 150, 150);

    $draw-&gt;setFillColor("rgb(200, 32, 32)");
    $draw-&gt;rectangle(200, 50, 300, 150);

    $image = new \Imagick();
    $image-&gt;newImage(500, 500, $backgroundColor);
    $image-&gt;setImageFormat("png");

    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setFillOpacity

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setFillOpacity — Configura la opacidad a utilizar para el relleno

### Descripción

public **ImagickDraw::setFillOpacity**([float](#language.types.float) $opacity): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Configura la opacidad a utilizar para el relleno.
Totalmente opaco es 1.0.

### Parámetros

     opacity


       La opacidad de relleno.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setFillOpacity()**

&lt;?php
function setFillOpacity($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeWidth(2);

    $draw-&gt;rectangle(100, 200, 200, 300);

    $draw-&gt;setFillOpacity(0.4);
    $draw-&gt;rectangle(300, 200, 400, 300);

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setFillPatternURL

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setFillPatternURL — Configura la URL del patrón de relleno de superficies

### Descripción

public **ImagickDraw::setFillPatternURL**([string](#language.types.string) $fill_url): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Configura la URL del patrón de relleno de superficies. Actualmente, solo se
soportan las URL locales ("#identifier"). Estas URL se
crean normalmente al definir un nombre de patrón de relleno con
DrawPushPattern/DrawPopPattern.

### Parámetros

     fill_url


       La URL a utilizar para acceder al patrón.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ImagickDraw::setFillRule

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setFillRule — Configura la regla de relleno de los polígonos

### Descripción

public **ImagickDraw::setFillRule**([int](#language.types.integer) $fillrule): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Configura la regla de relleno de los polígonos.

### Parámetros

     fillrule


       Una de las constantes [FILLRULE](#imagick.constants.fillrule)
       (imagick::FILLRULE_*).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setFillRule()**

&lt;?php
function setFillRule($fillColor, $strokeColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeWidth(1);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);

    $fillRules = [\Imagick::FILLRULE_NONZERO, \Imagick::FILLRULE_EVENODD];

    $points = 11;
    $size = 150;

    $draw-&gt;translate(175, 160);

    for ($x = 0; $x &lt; 2; $x++) {
        $draw-&gt;setFillRule($fillRules[$x]);
        $draw-&gt;pathStart();
        for ($n = 0; $n &lt; $points * 2; $n++) {

            if ($n &gt;= $points) {
                $angle = fmod($n * 360 * 4 / $points, 360) * pi() / 180;
            }
            else {
                $angle = fmod($n * 360 * 3 / $points, 360) * pi() / 180;
            }

            $positionX = $size * sin($angle);
            $positionY = $size * cos($angle);

            if ($n == 0) {
                $draw-&gt;pathMoveToAbsolute($positionX, $positionY);
            }
            else {
                $draw-&gt;pathLineToAbsolute($positionX, $positionY);
            }
        }

        $draw-&gt;pathClose();
        $draw-&gt;pathFinish();

        $draw-&gt;translate(325, 0);
    }

    $image = new \Imagick();
    $image-&gt;newImage(700, 320, $backgroundColor);
    $image-&gt;setImageFormat("png");
    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setFont

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setFont — Establece la fuente especificada completamente para usarla cuando se escribe texto

### Descripción

public **ImagickDraw::setFont**([string](#language.types.string) $font_name): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Establece la fuente especificada completamente para usarla cuando se escribe texto.

### Parámetros

     font_name







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::setFont()**



      &lt;?php

function setFont($fillColor, $strokeColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);

    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFontSize(36);

    $draw-&gt;setFont("../fonts/Arial.ttf");
    $draw-&gt;annotation(50, 50, "Lorem Ipsum!");

    $draw-&gt;setFont("../fonts/Consolas.ttf");
    $draw-&gt;annotation(50, 100, "Lorem Ipsum!");

    $draw-&gt;setFont("../fonts/CANDY.TTF");
    $draw-&gt;annotation(50, 150, "Lorem Ipsum!");

    $draw-&gt;setFont("../fonts/Inconsolata-dz.otf");
    $draw-&gt;annotation(50, 200, "Lorem Ipsum!");

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 300, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setFontFamily

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setFontFamily — Establece la familia de fuentes para usarla cuando se escribe texto

### Descripción

public **ImagickDraw::setFontFamily**([string](#language.types.string) $font_family): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Establece la familia de fuentes para usarla cuando se escribe texto.

### Parámetros

     font_family


       la familia de fuentes





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::setFontFamily()**



      &lt;?php

function setFontFamily($fillColor, $strokeColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $strokeColor = new \ImagickPixel($strokeColor);
    $fillColor = new \ImagickPixel($fillColor);

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);

    $draw-&gt;setStrokeWidth(2);

    $draw-&gt;setFontSize(48);

    $draw-&gt;setFontFamily("Times");
    $draw-&gt;annotation(50, 50, "Lorem Ipsum!");

    $draw-&gt;setFontFamily("AvantGarde");
    $draw-&gt;annotation(50, 100, "Lorem Ipsum!");

    $draw-&gt;setFontFamily("NewCenturySchlbk");
    $draw-&gt;annotation(50, 150, "Lorem Ipsum!");

    $draw-&gt;setFontFamily("Palatino");
    $draw-&gt;annotation(50, 200, "Lorem Ipsum!");

    $imagick = new \Imagick();
    $imagick-&gt;newImage(450, 250, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setFontSize

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setFontSize — Configura el tamaño de punto para los textos

### Descripción

public **ImagickDraw::setFontSize**([float](#language.types.float) $point_size): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Configura el tamaño de punto para los textos.

### Parámetros

     point_size


       El tamaño de punto.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setFontSize()**

&lt;?php
function setFontSize($fillColor, $strokeColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFont("../fonts/Arial.ttf");

    $sizes = [24, 36, 48, 60, 72];

    foreach ($sizes as $size) {
        $draw-&gt;setFontSize($size);
        $draw-&gt;annotation(50, ($size * $size / 16), "Lorem Ipsum!");
    }

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setFontStretch

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setFontStretch — Configura el estiramiento del texto

### Descripción

public **ImagickDraw::setFontStretch**([int](#language.types.integer) $stretch): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Configura el estiramiento del texto para el dibujo de anotaciones.
La enumeración AnyStretch sirve como comodín y
significa "no importa".

### Parámetros

     stretch


       Una de las constantes [STRETCH](#imagick.constants.stretch)
       (imagick::STRETCH_*).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setFontStretch()**

&lt;?php
function setFontStretch($fillColor, $strokeColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFontSize(36);

    $fontStretchTypes = [
        \Imagick::STRETCH_ULTRACONDENSED,
        \Imagick::STRETCH_CONDENSED,
        \Imagick::STRETCH_SEMICONDENSED,
        \Imagick::STRETCH_SEMIEXPANDED,
        \Imagick::STRETCH_EXPANDED,
        \Imagick::STRETCH_EXTRAEXPANDED,
        \Imagick::STRETCH_ULTRAEXPANDED,
        \Imagick::STRETCH_ANY
    ];

    $offset = 0;
    foreach ($fontStretchTypes as $fontStretch) {
        $draw-&gt;setFontStretch($fontStretch);
        $draw-&gt;annotation(50, 75 + $offset, "Lorem Ipsum!");
        $offset += 50;
    }

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setFontStyle

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setFontStyle — Configura el estilo de la fuente

### Descripción

public **ImagickDraw::setFontStyle**([int](#language.types.integer) $style): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Configura el estilo de la fuente utilizada para dibujar anotaciones.
La enumeración AnyStyle actúa como comodín,
y significa "no importa".

### Parámetros

     style


       Una de las constantes [STYLE](#imagick.constants.styles)
       (imagick::STYLE_*).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setFontStyle()**

&lt;?php
function setFontStyle($fillColor, $strokeColor, $backgroundColor) {
    $draw = new \ImagickDraw();
    $draw-&gt;setStrokeColor($strokeColor);
$draw-&gt;setFillColor($fillColor);
$draw-&gt;setStrokeWidth(1);
$draw-&gt;setFontSize(36);
$draw-&gt;setFontStyle(\Imagick::STYLE_NORMAL);
$draw-&gt;annotation(50, 50, "Lorem Ipsum!");

    $draw-&gt;setFontStyle(\Imagick::STYLE_ITALIC);
    $draw-&gt;annotation(50, 100, "Lorem Ipsum!");

    $draw-&gt;setFontStyle(\Imagick::STYLE_OBLIQUE);
    $draw-&gt;annotation(50, 150, "Lorem Ipsum!");

    $imagick = new \Imagick();
    $imagick-&gt;newImage(350, 300, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setFontWeight

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setFontWeight — Configura el peso de la fuente

### Descripción

public **ImagickDraw::setFontWeight**([int](#language.types.integer) $weight): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Configura el peso de la fuente para dibujar anotaciones.

### Parámetros

     weight







### Valores devueltos

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setFontWeight()**

&lt;?php
function setFontWeight($fillColor, $strokeColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);

    $draw-&gt;setStrokeWidth(1);

    $draw-&gt;setFontSize(36);

    $draw-&gt;setFontWeight(100);
    $draw-&gt;annotation(50, 50, "Lorem Ipsum!");

    $draw-&gt;setFontWeight(200);
    $draw-&gt;annotation(50, 100, "Lorem Ipsum!");

    $draw-&gt;setFontWeight(400);
    $draw-&gt;annotation(50, 150, "Lorem Ipsum!");

    $draw-&gt;setFontWeight(800);
    $draw-&gt;annotation(50, 200, "Lorem Ipsum!");

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setGravity

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setGravity — Configura la gravedad de colocación de texto

### Descripción

public **ImagickDraw::setGravity**([int](#language.types.integer) $gravity): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Configura la gravedad de colocación de texto, a utilizar para dibujar
las anotaciones.

### Parámetros

     gravity


       Una de las constantes [GRAVITY](#imagick.constants.gravity)
       (imagick::GRAVITY_*).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setGravity()**

&lt;?php
function setGravity($fillColor, $strokeColor, $backgroundColor) {

    $draw = new \ImagickDraw();
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeWidth(1);
    $draw-&gt;setFontSize(24);

    $gravitySettings = array(
        \Imagick::GRAVITY_NORTHWEST =&gt; 'NorthWest',
        \Imagick::GRAVITY_NORTH =&gt; 'North',
        \Imagick::GRAVITY_NORTHEAST =&gt; 'NorthEast',
        \Imagick::GRAVITY_WEST =&gt; 'West',
        \Imagick::GRAVITY_CENTER =&gt; 'Centro',
        \Imagick::GRAVITY_SOUTHWEST =&gt; 'SouthWest',
        \Imagick::GRAVITY_SOUTH =&gt; 'South',
        \Imagick::GRAVITY_SOUTHEAST =&gt; 'SouthEast',
        \Imagick::GRAVITY_EAST =&gt; 'East'
    );

    $draw-&gt;setFont("../fonts/Arial.ttf");

    foreach ($gravitySettings as $type =&gt; $description) {
        $draw-&gt;setGravity($type);
        $draw-&gt;annotation(50, 50, '"' . $description . '"');
    }

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setResolution

(PECL imagick 3 &gt;= 3.1.0)

ImagickDraw::setResolution — Define la resolución

### Descripción

public **ImagickDraw::setResolution**([float](#language.types.float) $resolution_x, [float](#language.types.float) $resolution_y): [bool](#language.types.boolean)

Define la resolución.

### Parámetros

    resolution_x









    resolution_y





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# ImagickDraw::setStrokeAlpha

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setStrokeAlpha — Especifica la opacidad de los contornos de los objetos

### Descripción

public **ImagickDraw::setStrokeAlpha**([float](#language.types.float) $alpha): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Especifica la opacidad de los contornos de los objetos.

### Parámetros

     alpha


       La opacidad





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setStrokeAlpha()**

&lt;?php
function setStrokeAlpha($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeWidth(4);
    $draw-&gt;line(100, 100, 400, 145);
    $draw-&gt;rectangle(100, 200, 225, 350);
    $draw-&gt;setStrokeOpacity(0.1);
    $draw-&gt;line(100, 120, 400, 165);
    $draw-&gt;rectangle(275, 200, 400, 350);

    $image = new \Imagick();
    $image-&gt;newImage(500, 400, $backgroundColor);
    $image-&gt;setImageFormat("png");

    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setStrokeAntialias

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setStrokeAntialias — Controla el anti-aliasing de los trazos

### Descripción

public **ImagickDraw::setStrokeAntialias**([bool](#language.types.boolean) $enabled): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Controla el anti-aliasing de los trazos. Los contornos a trazos están anti-aliaseados
por omisión. Cuando el anti-aliasing está desactivado, los trazos utilizan
un valor de umbral para definir si el píxel subyacente debe ser coloreado o no.

### Parámetros

     enabled


       La configuración de uso del anti-aliasing





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setStrokeAntialias()**

&lt;?php
function setStrokeAntialias($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeWidth(1);
    $draw-&gt;setStrokeAntialias(false);
    $draw-&gt;line(100, 100, 400, 105);

    $draw-&gt;line(100, 140, 400, 185);

    $draw-&gt;setStrokeAntialias(true);
    $draw-&gt;line(100, 110, 400, 115);
    $draw-&gt;line(100, 150, 400, 195);

    $image = new \Imagick();
    $image-&gt;newImage(500, 250, $backgroundColor);
    $image-&gt;setImageFormat("png");

    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setStrokeColor

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setStrokeColor — Configura el color utilizado para dibujar objetos

### Descripción

public **ImagickDraw::setStrokeColor**([ImagickPixel](#class.imagickpixel)|[string](#language.types.string) $color): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Configura el color utilizado para dibujar objetos.

### Parámetros

     color


       El color del trazo.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setStrokeColor()**

&lt;?php
function setStrokeColor($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);

    $draw-&gt;setStrokeWidth(5);

    $draw-&gt;line(100, 100, 400, 145);
    $draw-&gt;rectangle(100, 200, 225, 350);

    $draw-&gt;setStrokeOpacity(0.1);
    $draw-&gt;line(100, 120, 400, 165);
    $draw-&gt;rectangle(275, 200, 400, 350);

    $image = new \Imagick();
    $image-&gt;newImage(500, 400, $backgroundColor);
    $image-&gt;setImageFormat("png");

    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setStrokeDashArray

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setStrokeDashArray — Especifica el patrón de trazo discontinuo

### Descripción

public **ImagickDraw::setStrokeDashArray**([?](#language.types.null)[array](#language.types.array) $dashes): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Especifica el patrón de trazo discontinuo, los segmentos de línea continua y los espacios. El objeto
strokeDashArray representa un array de números que especifican las
longitudes de los segmentos de línea continua y los espacios, en píxeles. Si se proporciona un número impar de valores,
entonces la lista se repite para obtener un número par de valores.
Para eliminar un array de patrón existente, se debe pasar un array con cero elementos, y **[null](#constant.null)** como segundo valor. Un array strokeDashArray típico contiene los miembros 5 3 2.

### Parámetros

     dashes


       Un array de números decimales





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setStrokeDashArray()**

&lt;?php
function setStrokeDashArray($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeWidth(4);

    $draw-&gt;setStrokeDashArray([10, 10]);
    $draw-&gt;rectangle(100, 50, 225, 175);

    $draw-&gt;setStrokeDashArray([20, 5, 20, 5, 5, 5,]);
    $draw-&gt;rectangle(275, 50, 400, 175);

    $draw-&gt;setStrokeDashArray([20, 5, 20, 5, 5]);
    $draw-&gt;rectangle(100, 200, 225, 350);

    $draw-&gt;setStrokeDashArray([1, 1, 1, 1, 2, 2, 3, 3, 5, 5, 8, 8, 13, 13, 21, 21, 34, 34, 55, 55, 89, 89, 144, 144, 233, 233, 377, 377, 610, 610, 987, 987, 1597, 1597, 2584, 2584, 4181, 4181,]);

    $draw-&gt;rectangle(275, 200, 400, 350);

    $image = new \Imagick();
    $image-&gt;newImage(500, 400, $backgroundColor);
    $image-&gt;setImageFormat("png");
    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setStrokeDashOffset

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setStrokeDashOffset — Especifica el índice dentro del patrón de discontinuidad para iniciar la discontinuidad

### Descripción

public **ImagickDraw::setStrokeDashOffset**([float](#language.types.float) $dash_offset): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Especifica el índice dentro del patrón de discontinuidad para iniciar la discontinuidad.

### Parámetros

     dash_offset


       índice de discontinuidad





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::setStrokeDashOffset()**



      &lt;?php

function setStrokeDashOffset($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeWidth(4);
    $draw-&gt;setStrokeDashArray([20, 20]);
    $draw-&gt;setStrokeDashOffset(0);
    $draw-&gt;rectangle(100, 50, 225, 175);

    //Start the dash effect halfway through the solid portion
    $draw-&gt;setStrokeDashOffset(10);
    $draw-&gt;rectangle(275, 50, 400, 175);

    //Start the dash effect on the space portion
    $draw-&gt;setStrokeDashOffset(20);
    $draw-&gt;rectangle(100, 200, 225, 350);
    $draw-&gt;setStrokeDashOffset(5);
    $draw-&gt;rectangle(275, 200, 400, 350);

    $image = new \Imagick();
    $image-&gt;newImage(500, 400, $backgroundColor);
    $image-&gt;setImageFormat("png");
    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setStrokeLineCap

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setStrokeLineCap — Especifica la forma a utilizar al final de los subcampos

### Descripción

public **ImagickDraw::setStrokeLineCap**([int](#language.types.integer) $linecap): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Especifica la forma a utilizar al final de los subcaminos.

### Parámetros

     linecap


       Una de las constantes [LINECAP](#imagick.constants.linecap)
       (imagick::LINECAP_*).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setStrokeLineCap()**

&lt;?php
function setStrokeLineCap($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeWidth(25);

    $lineTypes = [\Imagick::LINECAP_BUTT, \Imagick::LINECAP_ROUND, \Imagick::LINECAP_SQUARE,];

    $offset = 0;

    foreach ($lineTypes as $lineType) {
        $draw-&gt;setStrokeLineCap($lineType);
        $draw-&gt;line(50 + $offset, 50, 50 + $offset, 250);
        $offset += 50;
    }

    $imagick = new \Imagick();
    $imagick-&gt;newImage(300, 300, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setStrokeLineJoin

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setStrokeLineJoin — Especifica la forma a utilizar para dibujar los extremos de las líneas

### Descripción

public **ImagickDraw::setStrokeLineJoin**([int](#language.types.integer) $linejoin): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Especifica la forma a utilizar para dibujar los extremos de las líneas
y otras formas vectoriales cuando utilizan un trazo.

### Parámetros

     linejoin


       Una de las constantes [LINEJOIN](#imagick.constants.linejoin)
       (imagick::LINEJOIN_*).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setStrokeLineJoin()**

&lt;?php
function setStrokeLineJoin($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();
    $draw-&gt;setStrokeWidth(1);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);

    $draw-&gt;setStrokeWidth(20);

    $offset = 220;

    $lineJoinStyle = [
        \Imagick::LINEJOIN_MITER,
        \Imagick::LINEJOIN_ROUND,
        \Imagick::LINEJOIN_BEVEL,
        ];

    for ($x = 0; $x &lt; count($lineJoinStyle); $x++) {
        $draw-&gt;setStrokeLineJoin($lineJoinStyle[$x]);
        $points = [
            ['x' =&gt; 40 * 5, 'y' =&gt; 10 * 5 + $x * $offset],
            ['x' =&gt; 20 * 5, 'y' =&gt; 20 * 5 + $x * $offset],
            ['x' =&gt; 70 * 5, 'y' =&gt; 50 * 5 + $x * $offset],
            ['x' =&gt; 40 * 5, 'y' =&gt; 10 * 5 + $x * $offset],
        ];

        $draw-&gt;polyline($points);
    }

    $image = new \Imagick();
    $image-&gt;newImage(500, 700, $backgroundColor);
    $image-&gt;setImageFormat("png");

    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setStrokeMiterLimit

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setStrokeMiterLimit — Especifica el límite del inglete

### Descripción

public **ImagickDraw::setStrokeMiterLimit**([int](#language.types.integer) $miterlimit): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Especifica el límite del inglete. Cuando dos segmentos de línea se encuentran en
un águlo agudo y la unión del inglete ha sido especificada para 'lineJoin', es posible que el
inglete se extienda más allá del grosor de la línea que contornea el trazado.
'miterLimit' impone un límite en la proporción de la longitud del inglete a
'lineWidth'.

### Parámetros

     miterlimit


       el límite del inglete





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::setStrokeMiterLimit()**



      &lt;?php

function setStrokeMiterLimit($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setStrokeOpacity(0.6);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeWidth(10);

    $yOffset = 100;

    $draw-&gt;setStrokeLineJoin(\Imagick::LINEJOIN_MITER);

    for ($y = 0; $y &lt; 3; $y++) {

        $draw-&gt;setStrokeMiterLimit(40 * $y);

        $points = [
            ['x' =&gt; 22 * 3, 'y' =&gt; 15 * 4 + $y * $yOffset],
            ['x' =&gt; 20 * 3, 'y' =&gt; 20 * 4 + $y * $yOffset],
            ['x' =&gt; 70 * 5, 'y' =&gt; 45 * 4 + $y * $yOffset],
        ];

        $draw-&gt;polygon($points);
    }

    $image = new \Imagick();
    $image-&gt;newImage(500, 500, $backgroundColor);
    $image-&gt;setImageFormat("png");
    $image-&gt;drawImage($draw);

    $image-&gt;setImageType(\Imagick::IMGTYPE_PALETTE);
    $image-&gt;setImageCompressionQuality(100);
    $image-&gt;stripImage();

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setStrokeOpacity

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setStrokeOpacity — Especifica la opacidad para dibujar los contornos

### Descripción

public **ImagickDraw::setStrokeOpacity**([float](#language.types.float) $opacity): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Especifica la opacidad para dibujar los contornos.

### Parámetros

     opacity


       La opacidad del trazo. 1.0 es completamente opaco.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setStrokeOpacity()**

&lt;?php
function setStrokeOpacity($strokeColor, $fillColor, $backgroundColor) {
$draw = new \ImagickDraw();

    $draw-&gt;setStrokeWidth(1);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeWidth(10);
    $draw-&gt;setStrokeOpacity(1);
    $draw-&gt;line(100, 80, 400, 125);
    $draw-&gt;rectangle(25, 200, 150, 350);
    $draw-&gt;setStrokeOpacity(0.5);
    $draw-&gt;line(100, 100, 400, 145);
    $draw-&gt;rectangle(200, 200, 325, 350);
    $draw-&gt;setStrokeOpacity(0.2);
    $draw-&gt;line(100, 120, 400, 165);
    $draw-&gt;rectangle(375, 200, 500, 350);

    $image = new \Imagick();
    $image-&gt;newImage(550, 400, $backgroundColor);
    $image-&gt;setImageFormat("png");
    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setStrokePatternURL

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setStrokePatternURL — Establece el patrón usado para los perfiles de objetos contorneados

### Descripción

public **ImagickDraw::setStrokePatternURL**([string](#language.types.string) $stroke_url): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Establece el patrón usado para los perfiles de objetos contorneados.

### Parámetros

     stroke_url


       URL contorneada





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# ImagickDraw::setStrokeWidth

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setStrokeWidth — Configura el ancho del trazo para dibujar contornos

### Descripción

public **ImagickDraw::setStrokeWidth**([float](#language.types.float) $width): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Configura el ancho del trazo para dibujar contornos.

### Parámetros

     width


       El ancho del trazo





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setStrokeWidth()**

&lt;?php
function setStrokeWidth($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeWidth(1);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;line(100, 100, 400, 145);
    $draw-&gt;rectangle(100, 200, 225, 350);
    $draw-&gt;setStrokeWidth(5);
    $draw-&gt;line(100, 120, 400, 165);
    $draw-&gt;rectangle(275, 200, 400, 350);

    $image = new \Imagick();
    $image-&gt;newImage(500, 400, $backgroundColor);
    $image-&gt;setImageFormat("png");
    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setTextAlignment

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setTextAlignment — Especifica la alineación del texto

### Descripción

public **ImagickDraw::setTextAlignment**([int](#language.types.integer) $align): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Especifica la alineación del texto a aplicar al texto de una anotación.

### Parámetros

     align


       Una de las constantes [ALIGN](#imagick.constants.align)
       (imagick::ALIGN_*).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setTextAlignment()**

&lt;?php
function setTextAlignment($strokeColor, $fillColor, $backgroundColor) {
    $draw = new \ImagickDraw();
    $draw-&gt;setStrokeColor($strokeColor);
$draw-&gt;setFillColor($fillColor);
$draw-&gt;setStrokeWidth(1);
$draw-&gt;setFontSize(36);

    $draw-&gt;setTextAlignment(\Imagick::ALIGN_LEFT);
    $draw-&gt;annotation(250, 75, "Lorem Ipsum!");
    $draw-&gt;setTextAlignment(\Imagick::ALIGN_CENTER);
    $draw-&gt;annotation(250, 150, "Lorem Ipsum!");
    $draw-&gt;setTextAlignment(\Imagick::ALIGN_RIGHT);
    $draw-&gt;annotation(250, 225, "Lorem Ipsum!");
    $draw-&gt;line(250, 0, 250, 500);

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setTextAntialias

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setTextAntialias — Controla el anti-aliaseo del texto

### Descripción

public **ImagickDraw::setTextAntialias**([bool](#language.types.boolean) $antialias): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Controla el anti-aliaseo del texto. El texto es anti-aliaseado por omisión.

### Parámetros

     antialias







### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setTextAntialias()**

&lt;?php
function setTextAntialias($fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();
    $draw-&gt;setStrokeColor('none');
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeWidth(1);
    $draw-&gt;setFontSize(32);
    $draw-&gt;setTextAntialias(false);
    $draw-&gt;annotation(5, 30, "Lorem Ipsum!");
    $draw-&gt;setTextAntialias(true);
    $draw-&gt;annotation(5, 65, "Lorem Ipsum!");

    $imagick = new \Imagick();
    $imagick-&gt;newImage(220, 80, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    //Scale the image so that people can see the aliasing.
    $imagick-&gt;scaleImage(220 * 6, 80 * 6);
    $imagick-&gt;cropImage(640, 480, 0, 0);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setTextDecoration

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setTextDecoration — Especifica los ornamentos de texto

### Descripción

public **ImagickDraw::setTextDecoration**([int](#language.types.integer) $decoration): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Especifica los ornamentos de texto utilizados para las anotaciones.

### Parámetros

     decoration


       Una de las constantes [DECORATION](#imagick.constants.decoration)
       (imagick::DECORATION_*).





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setTextDecoration()**

&lt;?php
function setTextDecoration($strokeColor, $fillColor, $backgroundColor, $textDecoration) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFontSize(72);
    $draw-&gt;setTextDecoration($textDecoration);
    $draw-&gt;annotation(50, 75, "Lorem Ipsum!");

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 200, $backgroundColor);
    $imagick-&gt;setImageFormat("png");
    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setTextEncoding

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setTextEncoding — Especifica el juego de caracteres

### Descripción

public **ImagickDraw::setTextEncoding**([string](#language.types.string) $encoding): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Especifica el juego de caracteres a utilizar para las anotaciones de texto.
El único juego de caracteres que puede ser especificado actualmente es
"UTF-8", que representa el Unicode bajo la forma de una secuencia de octetos.
Especifique una cadena vacía para utilizar el juego de caracteres del sistema.
El dibujo de textos puede requerir una fuente que soporte Unicode.

### Parámetros

     encoding


       El juego de caracteres





### Valores devueltos

No se retorna ningún valor.

# ImagickDraw::setTextInterlineSpacing

(PECL imagick 3 &gt;= 3.1.0)

ImagickDraw::setTextInterlineSpacing — Define el espacio entre las líneas de un texto

### Descripción

public **ImagickDraw::setTextInterlineSpacing**([float](#language.types.float) $spacing): [bool](#language.types.boolean)

Define el espacio entre las líneas de un texto.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    spacing





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# ImagickDraw::setTextInterwordSpacing

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

ImagickDraw::setTextInterwordSpacing — Define el espacio entre las palabras de un texto

### Descripción

public **ImagickDraw::setTextInterwordSpacing**([float](#language.types.float) $spacing): [bool](#language.types.boolean)

Define el espacio entre las palabras de un texto.

### Parámetros

    spacing





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# ImagickDraw::setTextKerning

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

ImagickDraw::setTextKerning — Define el interletraje de un texto

### Descripción

public **ImagickDraw::setTextKerning**([float](#language.types.float) $kerning): [bool](#language.types.boolean)

Define el interletraje de un texto.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    kerning





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# ImagickDraw::setTextUnderColor

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setTextUnderColor — Especifica el color de fondo de un rectángulo

### Descripción

public **ImagickDraw::setTextUnderColor**([ImagickPixel](#class.imagickpixel)|[string](#language.types.string) $under_color): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Especifica el color de fondo de un rectángulo a colocar bajo los textos.

### Parámetros

     under_color


       El color de fondo





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setTextUnderColor()**

&lt;?php
function setTextUnderColor($strokeColor, $fillColor, $backgroundColor, $textUnderColor) {
$draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFontSize(72);
    $draw-&gt;annotation(50, 75, "Lorem Ipsum!");
    $draw-&gt;setTextUnderColor($textUnderColor);
    $draw-&gt;annotation(50, 175, "Lorem Ipsum!");

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");

    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setVectorGraphics

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setVectorGraphics — Establece los gráficos vectoriales

### Descripción

public **ImagickDraw::setVectorGraphics**([string](#language.types.string) $xml): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Establece los gráficos vectoriales asociados al objeto ImagickDraw
especificado. Use este método con [ImagickDraw::getVectorGraphics()](#imagickdraw.getvectorgraphics) como un método
de persistencia del estado de los gráficos vectoriales.

### Parámetros

     xml


       archivo xml que contiene los gráficos vectoriales





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::setVectorGraphics()**



      &lt;?php

function setVectorGraphics() {
//Setup a draw object with some drawing in it.
$draw = new \ImagickDraw();
$draw-&gt;setFillColor("red");
$draw-&gt;circle(20, 20, 50, 50);
$draw-&gt;setFillColor("blue");
$draw-&gt;circle(50, 70, 50, 50);
$draw-&gt;rectangle(50, 120, 80, 150);

    //Get the drawing as a string
    $SVG = $draw-&gt;getVectorGraphics();

    //$svg is a string, and could be saved anywhere a string can be saved

    //Use the saved drawing to generate a new draw object
    $draw2 = new \ImagickDraw();
    //Apparently the SVG text is missing the root element.
    $draw2-&gt;setVectorGraphics("&lt;root&gt;".$SVG."&lt;/root&gt;");

    $imagick = new \Imagick();
    $imagick-&gt;newImage(200, 200, 'white');
    $imagick-&gt;setImageFormat("png");

    $imagick-&gt;drawImage($draw2);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::setViewbox

(PECL imagick 2, PECL imagick 3)

ImagickDraw::setViewbox — Configura el tamaño del lienzo

### Descripción

public **ImagickDraw::setViewbox**(
    [int](#language.types.integer) $left_x,
    [int](#language.types.integer) $top_y,
    [int](#language.types.integer) $right_x,
    [int](#language.types.integer) $bottom_y
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Configura el tamaño general del lienzo, a registrar con los datos
vectoriales. Generalmente, este valor se configura con el mismo tamaño
que la imagen. Cuando los datos vectoriales se guardan en SVG o MVG,
la caja de vista se utiliza para especificar el tamaño de la imagen en la que
el visualizador dibujará los datos.

### Parámetros

     left_x


       Abscisa izquierda






     top_y


       Ordenada superior






     right_x


       Abscisa derecha






     bottom_y


       Ordenada inferior





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickDraw::setViewBox()**

&lt;?php
function setViewBox($strokeColor, $fillColor, $backgroundColor) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFontSize(72);

    /*
      Configura el tamaño general del lienzo a registrar con los datos vectoriales. Generalmente, este valor se configura con el mismo tamaño que la imagen. Cuando los datos vectoriales se guardan en SVG o MVG, la caja de vista se utiliza para especificar el tamaño de la imagen en la que el visualizador dibujará los datos.
     */

    $draw-&gt;circle(250, 250, 250, 0);
    $draw-&gt;setviewbox(0, 0, 200, 200);
    $draw-&gt;circle(125, 250, 250, 250);
    $draw-&gt;translate(250, 125);
    $draw-&gt;circle(0, 0, 125, 0);

    $imagick = new \Imagick();
    $imagick-&gt;newImage(500, 500, $backgroundColor);
    $imagick-&gt;setImageFormat("png");

    $imagick-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::skewX

(PECL imagick 2, PECL imagick 3)

ImagickDraw::skewX — Tuerce el sistema de coordenadas actual en la dirección horizontal

### Descripción

public **ImagickDraw::skewX**([float](#language.types.float) $degrees): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Tuerce el sistema de coordenadas actual en la dirección horizontal.

### Parámetros

     degrees


       grados de torción





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::skewX()**



      &lt;?php

function skewX($strokeColor, $fillColor, $backgroundColor, $fillModifiedColor,
$startX, $startY, $endX, $endY, $skew) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;rectangle($startX, $startY, $endX, $endY);
    $draw-&gt;setFillColor($fillModifiedColor);
    $draw-&gt;skewX($skew);
    $draw-&gt;rectangle($startX, $startY, $endX, $endY);

    $image = new \Imagick();
    $image-&gt;newImage(500, 500, $backgroundColor);
    $image-&gt;setImageFormat("png");

    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::skewY

(PECL imagick 2, PECL imagick 3)

ImagickDraw::skewY — Tuerce el sistema de coordenadas actual en la dirección vertical

### Descripción

public **ImagickDraw::skewY**([float](#language.types.float) $degrees): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Tuerce el sistema de coordenadas actual en la dirección vertical.

### Parámetros

     degrees


       grados de torción





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::skewY()**



      &lt;?php

function skewY($strokeColor, $fillColor, $backgroundColor, $fillModifiedColor,
$startX, $startY, $endX, $endY, $skew) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setStrokeWidth(2);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;rectangle($startX, $startY, $endX, $endY);
    $draw-&gt;setFillColor($fillModifiedColor);
    $draw-&gt;skewY($skew);
    $draw-&gt;rectangle($startX, $startY, $endX, $endY);

    $image = new \Imagick();
    $image-&gt;newImage(500, 500, $backgroundColor);
    $image-&gt;setImageFormat("png");
    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickDraw::translate

(PECL imagick 2, PECL imagick 3)

ImagickDraw::translate — Aplica una traslación del sistema de coordenadas actual

### Descripción

public **ImagickDraw::translate**([float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Aplica una traslación del sistema de coordenadas actual el cuál mueve el
origen del sistema de coordenadas a las coordenadas especifiacadas.

### Parámetros

     x


       traslación horizontal






     y


       traslación vertical





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

      **Ejemplo #1 Ejemplo de ImagickDraw::translate()**



      &lt;?php

function translate($strokeColor, $fillColor, $backgroundColor, $fillModifiedColor,
$startX, $startY, $endX, $endY, $translateX, $translateY) {

    $draw = new \ImagickDraw();

    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;rectangle($startX, $startY, $endX, $endY);

    $draw-&gt;setFillColor($fillModifiedColor);
    $draw-&gt;translate($translateX, $translateY);
    $draw-&gt;rectangle($startX, $startY, $endX, $endY);

    $image = new \Imagick();
    $image-&gt;newImage(500, 500, $backgroundColor);
    $image-&gt;setImageFormat("png");

    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

## Tabla de contenidos

- [ImagickDraw::affine](#imagickdraw.affine) — Ajusta la matriz de transformación afín actual
- [ImagickDraw::annotation](#imagickdraw.annotation) — Dibuja un texto sobre una imagen
- [ImagickDraw::arc](#imagickdraw.arc) — Dibuja un arco
- [ImagickDraw::bezier](#imagickdraw.bezier) — Dibuja una curva de Bézier
- [ImagickDraw::circle](#imagickdraw.circle) — Dibuja un círculo
- [ImagickDraw::clear](#imagickdraw.clear) — Borra el objeto ImagickDraw
- [ImagickDraw::clone](#imagickdraw.clone) — Realiza una copia exacta del objeto ImagickDraw
- [ImagickDraw::color](#imagickdraw.color) — Dibuja un color sobre una imagen
- [ImagickDraw::comment](#imagickdraw.comment) — Añade un comentario
- [ImagickDraw::composite](#imagickdraw.composite) — Componer una imagen con otra
- [ImagickDraw::\_\_construct](#imagickdraw.construct) — El constructor ImagickDraw
- [ImagickDraw::destroy](#imagickdraw.destroy) — Libera todos los recursos asociados
- [ImagickDraw::ellipse](#imagickdraw.ellipse) — Dibuja una elipse sobre una imagen
- [ImagickDraw::getClipPath](#imagickdraw.getclippath) — Devuelve el identificador del camino actual
- [ImagickDraw::getClipRule](#imagickdraw.getcliprule) — Devuelve la regla de relleno de un polígono actual
- [ImagickDraw::getClipUnits](#imagickdraw.getclipunits) — Devuelve la interpretación de unidades del trazado de recorte
- [ImagickDraw::getFillColor](#imagickdraw.getfillcolor) — Devuelve el color de relleno
- [ImagickDraw::getFillOpacity](#imagickdraw.getfillopacity) — Devuelve la opacidad de dibujo
- [ImagickDraw::getFillRule](#imagickdraw.getfillrule) — Devuelve la regla de relleno
- [ImagickDraw::getFont](#imagickdraw.getfont) — Devuelve la fuente
- [ImagickDraw::getFontFamily](#imagickdraw.getfontfamily) — Devuelve la familia de fuentes
- [ImagickDraw::getFontSize](#imagickdraw.getfontsize) — Devuelve el tamaño de punto de la fuente
- [ImagickDraw::getFontStretch](#imagickdraw.getfontstretch) — Devuelve el estiramiento de la fuente a utilizar durante la anotación con texto
- [ImagickDraw::getFontStyle](#imagickdraw.getfontstyle) — Devuelve el estilo de la fuente
- [ImagickDraw::getFontWeight](#imagickdraw.getfontweight) — Devuelve el peso de la fuente
- [ImagickDraw::getGravity](#imagickdraw.getgravity) — Devuelve la gravedad de colocación de texto
- [ImagickDraw::getStrokeAntialias](#imagickdraw.getstrokeantialias) — Devuelve la configuración de antialias de contorno actual
- [ImagickDraw::getStrokeColor](#imagickdraw.getstrokecolor) — Devuelve el color usado por los perfiles de objetos contorneados
- [ImagickDraw::getStrokeDashArray](#imagickdraw.getstrokedasharray) — Devuelve un array que representa el patrón de trazos
- [ImagickDraw::getStrokeDashOffset](#imagickdraw.getstrokedashoffset) — Devuelve el desplazamiento del punto en el patrón
- [ImagickDraw::getStrokeLineCap](#imagickdraw.getstrokelinecap) — Devuelve la forma a utilizar para dibujar los extremos de subrutas
- [ImagickDraw::getStrokeLineJoin](#imagickdraw.getstrokelinejoin) — Devuelve la forma a utilizar para dibujar las esquinas de un camino
- [ImagickDraw::getStrokeMiterLimit](#imagickdraw.getstrokemiterlimit) — Devuelve el valor de 'miterLimit'
- [ImagickDraw::getStrokeOpacity](#imagickdraw.getstrokeopacity) — Devuelve la opacidad de los contornos de un objeto
- [ImagickDraw::getStrokeWidth](#imagickdraw.getstrokewidth) — Devuelve el ancho de trazo utilizado
- [ImagickDraw::getTextAlignment](#imagickdraw.gettextalignment) — Devuelve la alineación del texto
- [ImagickDraw::getTextAntialias](#imagickdraw.gettextantialias) — Devuelve la configuración de antialias del texto actual
- [ImagickDraw::getTextDecoration](#imagickdraw.gettextdecoration) — Devuelve la decoración del texto
- [ImagickDraw::getTextEncoding](#imagickdraw.gettextencoding) — Devuelve el juego de caracteres utilizado para las anotaciones de texto
- [ImagickDraw::getTextInterlineSpacing](#imagickdraw.gettextinterlinespacing) — Obtiene el espacio entre líneas de un texto.
- [ImagickDraw::getTextInterwordSpacing](#imagickdraw.gettextinterwordspacing) — Obtiene el espacio entre palabras de un texto.
- [ImagickDraw::getTextKerning](#imagickdraw.gettextkerning) — Obtiene el interletraje de un texto.
- [ImagickDraw::getTextUnderColor](#imagickdraw.gettextundercolor) — Devuelve el color debajo del texto
- [ImagickDraw::getVectorGraphics](#imagickdraw.getvectorgraphics) — Devuelve una cadena que contiene gráficos vectoriales
- [ImagickDraw::line](#imagickdraw.line) — Dibuja una línea
- [ImagickDraw::matte](#imagickdraw.matte) — Dibuja sobre el canal de opacidad de la imagen
- [ImagickDraw::pathClose](#imagickdraw.pathclose) — Añade un elemento de camino al camino actual
- [ImagickDraw::pathCurveToAbsolute](#imagickdraw.pathcurvetoabsolute) — Dibuja una curva de Bézier cúbica, en coordenadas absolutas
- [ImagickDraw::pathCurveToQuadraticBezierAbsolute](#imagickdraw.pathcurvetoquadraticbezierabsolute) — Dibuja una curva de Bézier cuadrática, en coordenadas absolutas
- [ImagickDraw::pathCurveToQuadraticBezierRelative](#imagickdraw.pathcurvetoquadraticbezierrelative) — Dibuja una curva de Bézier cuadrática, en coordenadas relativas
- [ImagickDraw::pathCurveToQuadraticBezierSmoothAbsolute](#imagickdraw.pathcurvetoquadraticbeziersmoothabsolute) — Dibuja una curva Bézier cuadrática
- [ImagickDraw::pathCurveToQuadraticBezierSmoothRelative](#imagickdraw.pathcurvetoquadraticbeziersmoothrelative) — Dibuja una curva Bézier cuadrática
- [ImagickDraw::pathCurveToRelative](#imagickdraw.pathcurvetorelative) — Dibuja una curva de Bézier cúbica, en coordenadas relativas
- [ImagickDraw::pathCurveToSmoothAbsolute](#imagickdraw.pathcurvetosmoothabsolute) — Dibuja una curva de Bézier, en coordenadas absolutas
- [ImagickDraw::pathCurveToSmoothRelative](#imagickdraw.pathcurvetosmoothrelative) — Dibuja una curva de Bézier, en coordenadas relativas
- [ImagickDraw::pathEllipticArcAbsolute](#imagickdraw.pathellipticarcabsolute) — Dibuja un arco de elipse, en coordenadas absolutas
- [ImagickDraw::pathEllipticArcRelative](#imagickdraw.pathellipticarcrelative) — Dibuja un arco de elipse, en coordenadas relativas
- [ImagickDraw::pathFinish](#imagickdraw.pathfinish) — Finaliza el camino actual
- [ImagickDraw::pathLineToAbsolute](#imagickdraw.pathlinetoabsolute) — Dibuja una línea de camino, en coordenadas absolutas
- [ImagickDraw::pathLineToHorizontalAbsolute](#imagickdraw.pathlinetohorizontalabsolute) — Dibuja una línea de camino horizontal, en coordenadas absolutas
- [ImagickDraw::pathLineToHorizontalRelative](#imagickdraw.pathlinetohorizontalrelative) — Dibuja una línea de camino horizontal, en coordenadas relativas
- [ImagickDraw::pathLineToRelative](#imagickdraw.pathlinetorelative) — Dibuja una línea de camino, en coordenadas relativas
- [ImagickDraw::pathLineToVerticalAbsolute](#imagickdraw.pathlinetoverticalabsolute) — Dibuja una línea de camino vertical, en coordenadas absolutas
- [ImagickDraw::pathLineToVerticalRelative](#imagickdraw.pathlinetoverticalrelative) — Dibuja una línea de camino vertical, en coordenadas relativas
- [ImagickDraw::pathMoveToAbsolute](#imagickdraw.pathmovetoabsolute) — Inicia un nuevo subcamino, en coordenadas absolutas
- [ImagickDraw::pathMoveToRelative](#imagickdraw.pathmovetorelative) — Inicia un nuevo subcamino, en coordenadas relativas
- [ImagickDraw::pathStart](#imagickdraw.pathstart) — Declara el inicio de una lista de dibujo de trazados
- [ImagickDraw::point](#imagickdraw.point) — Dibuja un punto
- [ImagickDraw::polygon](#imagickdraw.polygon) — Dibuja un polígono
- [ImagickDraw::polyline](#imagickdraw.polyline) — Dibuja una poli-línea
- [ImagickDraw::pop](#imagickdraw.pop) — Destruye el objeto ImagickDraw actual de la pila, y lo devuelve al objeto ImagickDraw previamente metido
- [ImagickDraw::popClipPath](#imagickdraw.popclippath) — Finaliza la definición de un camino
- [ImagickDraw::popDefs](#imagickdraw.popdefs) — Finaliza una lista de definiciones
- [ImagickDraw::popPattern](#imagickdraw.poppattern) — Finaliza una definición de patrón
- [ImagickDraw::push](#imagickdraw.push) — Clona el objeto ImagickDraw actual y lo mete en la pila
- [ImagickDraw::pushClipPath](#imagickdraw.pushclippath) — Inicia la definición de un trazado de recorte
- [ImagickDraw::pushDefs](#imagickdraw.pushdefs) — Indica que los siguientes comandos crean elementos con nombre para un procesamiento previo
- [ImagickDraw::pushPattern](#imagickdraw.pushpattern) — Indica que los comandos subsiguientes hasta un comando ImagickDraw::opPattern() comprenden la definición de un patrón nominado
- [ImagickDraw::rectangle](#imagickdraw.rectangle) — Dibuja un rectángulo
- [ImagickDraw::render](#imagickdraw.render) — Realiza el renderizado de todos los dibujos en la imagen
- [ImagickDraw::resetVectorGraphics](#imagickdraw.resetvectorgraphics) — Restablece los gráficos vectoriales
- [ImagickDraw::rotate](#imagickdraw.rotate) — Aplica la rotación especificada al espacio de coordenadas actual
- [ImagickDraw::roundRectangle](#imagickdraw.roundrectangle) — Dibuja un rectángulo con esquinas redondeadas
- [ImagickDraw::scale](#imagickdraw.scale) — Ajusta el factor de escala
- [ImagickDraw::setClipPath](#imagickdraw.setclippath) — Asocia un trazado de recorte nominado con la imagen
- [ImagickDraw::setClipRule](#imagickdraw.setcliprule) — Configura la regla de relleno del polígono a utilizar con los caminos
- [ImagickDraw::setClipUnits](#imagickdraw.setclipunits) — Configura el modo de interpretación de las unidades de ruta
- [ImagickDraw::setFillAlpha](#imagickdraw.setfillalpha) — Configura la opacidad del color de relleno
- [ImagickDraw::setFillColor](#imagickdraw.setfillcolor) — Configura el color de relleno de los objetos dibujados
- [ImagickDraw::setFillOpacity](#imagickdraw.setfillopacity) — Configura la opacidad a utilizar para el relleno
- [ImagickDraw::setFillPatternURL](#imagickdraw.setfillpatternurl) — Configura la URL del patrón de relleno de superficies
- [ImagickDraw::setFillRule](#imagickdraw.setfillrule) — Configura la regla de relleno de los polígonos
- [ImagickDraw::setFont](#imagickdraw.setfont) — Establece la fuente especificada completamente para usarla cuando se escribe texto
- [ImagickDraw::setFontFamily](#imagickdraw.setfontfamily) — Establece la familia de fuentes para usarla cuando se escribe texto
- [ImagickDraw::setFontSize](#imagickdraw.setfontsize) — Configura el tamaño de punto para los textos
- [ImagickDraw::setFontStretch](#imagickdraw.setfontstretch) — Configura el estiramiento del texto
- [ImagickDraw::setFontStyle](#imagickdraw.setfontstyle) — Configura el estilo de la fuente
- [ImagickDraw::setFontWeight](#imagickdraw.setfontweight) — Configura el peso de la fuente
- [ImagickDraw::setGravity](#imagickdraw.setgravity) — Configura la gravedad de colocación de texto
- [ImagickDraw::setResolution](#imagickdraw.setresolution) — Define la resolución
- [ImagickDraw::setStrokeAlpha](#imagickdraw.setstrokealpha) — Especifica la opacidad de los contornos de los objetos
- [ImagickDraw::setStrokeAntialias](#imagickdraw.setstrokeantialias) — Controla el anti-aliasing de los trazos
- [ImagickDraw::setStrokeColor](#imagickdraw.setstrokecolor) — Configura el color utilizado para dibujar objetos
- [ImagickDraw::setStrokeDashArray](#imagickdraw.setstrokedasharray) — Especifica el patrón de trazo discontinuo
- [ImagickDraw::setStrokeDashOffset](#imagickdraw.setstrokedashoffset) — Especifica el índice dentro del patrón de discontinuidad para iniciar la discontinuidad
- [ImagickDraw::setStrokeLineCap](#imagickdraw.setstrokelinecap) — Especifica la forma a utilizar al final de los subcampos
- [ImagickDraw::setStrokeLineJoin](#imagickdraw.setstrokelinejoin) — Especifica la forma a utilizar para dibujar los extremos de las líneas
- [ImagickDraw::setStrokeMiterLimit](#imagickdraw.setstrokemiterlimit) — Especifica el límite del inglete
- [ImagickDraw::setStrokeOpacity](#imagickdraw.setstrokeopacity) — Especifica la opacidad para dibujar los contornos
- [ImagickDraw::setStrokePatternURL](#imagickdraw.setstrokepatternurl) — Establece el patrón usado para los perfiles de objetos contorneados
- [ImagickDraw::setStrokeWidth](#imagickdraw.setstrokewidth) — Configura el ancho del trazo para dibujar contornos
- [ImagickDraw::setTextAlignment](#imagickdraw.settextalignment) — Especifica la alineación del texto
- [ImagickDraw::setTextAntialias](#imagickdraw.settextantialias) — Controla el anti-aliaseo del texto
- [ImagickDraw::setTextDecoration](#imagickdraw.settextdecoration) — Especifica los ornamentos de texto
- [ImagickDraw::setTextEncoding](#imagickdraw.settextencoding) — Especifica el juego de caracteres
- [ImagickDraw::setTextInterlineSpacing](#imagickdraw.settextinterlinespacing) — Define el espacio entre las líneas de un texto
- [ImagickDraw::setTextInterwordSpacing](#imagickdraw.settextinterwordspacing) — Define el espacio entre las palabras de un texto
- [ImagickDraw::setTextKerning](#imagickdraw.settextkerning) — Define el interletraje de un texto
- [ImagickDraw::setTextUnderColor](#imagickdraw.settextundercolor) — Especifica el color de fondo de un rectángulo
- [ImagickDraw::setVectorGraphics](#imagickdraw.setvectorgraphics) — Establece los gráficos vectoriales
- [ImagickDraw::setViewbox](#imagickdraw.setviewbox) — Configura el tamaño del lienzo
- [ImagickDraw::skewX](#imagickdraw.skewx) — Tuerce el sistema de coordenadas actual en la dirección horizontal
- [ImagickDraw::skewY](#imagickdraw.skewy) — Tuerce el sistema de coordenadas actual en la dirección vertical
- [ImagickDraw::translate](#imagickdraw.translate) — Aplica una traslación del sistema de coordenadas actual

# La clase ImagickDrawException

(PECL imagick 3)

## Introducción

## Sinopsis de la Clase

     ****




      class **ImagickDrawException**



      extends
       [Exception](#class.exception)


     implements
       [Throwable](#class.throwable) {
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


    /* Métodos heredados */

}

# La clase ImagickException

(PECL imagick 3)

## Introducción

## Sinopsis de la Clase

     ****




      class **ImagickException**



      extends
       [Exception](#class.exception)


     implements
       [Throwable](#class.throwable) {
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


    /* Métodos heredados */

}

# La clase ImagickKernel

(PECL imagick &gt;= 3.3.0)

## Introducción

## Sinopsis de la Clase

    ****




      class **ImagickKernel**

     {


    /* Métodos */

public [addKernel](#imagickkernel.addkernel)([ImagickKernel](#class.imagickkernel) $ImagickKernel): [void](language.types.void.html)
public [addUnityKernel](#imagickkernel.addunitykernel)([float](#language.types.float) $scale): [void](language.types.void.html)
public static [fromBuiltin](#imagickkernel.frombuiltin)([int](#language.types.integer) $kernelType, [string](#language.types.string) $kernelString): [ImagickKernel](#class.imagickkernel)
public static [fromMatrix](#imagickkernel.frommatrix)([array](#language.types.array) $matrix, [array](#language.types.array) $origin = ?): [ImagickKernel](#class.imagickkernel)
public [getMatrix](#imagickkernel.getmatrix)(): [array](#language.types.array)
public [scale](#imagickkernel.scale)([float](#language.types.float) $scale, [int](#language.types.integer) $normalizeFlag = ?): [void](language.types.void.html)
public [separate](#imagickkernel.separate)(): [array](#language.types.array)

}

# ImagickKernel::addKernel

(PECL imagick &gt;= 3.3.0)

ImagickKernel::addKernel — Adjunta otro núcleo a una lista de núcleos

### Descripción

public **ImagickKernel::addKernel**([ImagickKernel](#class.imagickkernel) $ImagickKernel): [void](language.types.void.html)

Adjunta otro núcleo a este núcleo para permitir que ambos sean aplicados en una sola función de morfología o filtro. Devuelve el nuevo núcleo combinado.

### Parámetros

    ImagickKernel





### Valores devueltos

### Ejemplos

      **Ejemplo #1  ImagickKernel::addKernel()**



      &lt;?php

function addKernel($imagePath) {
$matrix1 = [
[-1, -1, -1],
[ 0, 0, 0],
[ 1, 1, 1],
];

    $matrix2 = [
        [-1,  0,  1],
        [-1,  0,  1],
        [-1,  0,  1],
    ];

    $kernel1 = ImagickKernel::fromMatrix($matrix1);
    $kernel2 = ImagickKernel::fromMatrix($matrix2);
    $kernel1-&gt;addKernel($kernel2);

    $imagick = new \Imagick(realpath($imagePath));
    $imagick-&gt;filter($kernel1);
    header("Content-Type: image/jpg");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickKernel::addUnityKernel

(PECL imagick &gt;= 3.3.0)

ImagickKernel::addUnityKernel — Añade un núcleo Unity a la lista de núcleos

### Descripción

public **ImagickKernel::addUnityKernel**([float](#language.types.float) $scale): [void](language.types.void.html)

Añade una cantidad dada del núcleo de convolución 'Unity' al núcleo de convolución pre-escalado
y normalizado dado. Esto tiene como efecto añadir esta cantidad de la imagen original
en el núcleo de convolución resultante. El efecto resultante es convertir los núcleos
definidos en desenfoques suaves mezclados, en núcleos no afilados o en núcleos de nitidez.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

      **Ejemplo #1  ImagickKernel::addUnityKernel()**



      &lt;?php



    function renderKernelTable($matrix) {
        $output = "&lt;table class='infoTable'&gt;";

        foreach ($matrix as $row) {
            $output .= "&lt;tr&gt;";
            foreach ($row as $cell) {
                $output .= "&lt;td style='text-align:left'&gt;";
                if ($cell === false) {
                    $output .= "false";
                }
                else {
                    $output .= round($cell, 3);
                }
                $output .= "&lt;/td&gt;";
            }
            $output .= "&lt;/tr&gt;";
        }

        $output .= "&lt;/table&gt;";

        return $output;
    }

    $matrix = [
        [-1, 0, -1],
        [ 0, 4,  0],
        [-1, 0, -1],
    ];

    $kernel = \ImagickKernel::fromMatrix($matrix);
    $kernel-&gt;scale(1, \Imagick::NORMALIZE_KERNEL_VALUE);
    $output = "Before adding unity kernel: &lt;br/&gt;";
    $output .= renderKernelTable($kernel-&gt;getMatrix());
    $kernel-&gt;addUnityKernel(0.5);
    $output .= "After adding unity kernel: &lt;br/&gt;";
    $output .= renderKernelTable($kernel-&gt;getMatrix());

    $kernel-&gt;scale(1, \Imagick::NORMALIZE_KERNEL_VALUE);
    $output .= "After renormalizing kernel: &lt;br/&gt;";
    $output .= renderKernelTable($kernel-&gt;getMatrix());

    echo $output;

?&gt;

      **Ejemplo #2  ImagickKernel::addUnityKernel()**



      &lt;?php

function addUnityKernel($imagePath) {

    $matrix = [
        [-1, 0, -1],
        [ 0, 4,  0],
        [-1, 0, -1],
    ];

    $kernel = ImagickKernel::fromMatrix($matrix);

    $kernel-&gt;scale(4, \Imagick::NORMALIZE_KERNEL_VALUE);
    $kernel-&gt;addUnityKernel(0.5);

    $imagick = new \Imagick(realpath($imagePath));
    $imagick-&gt;filter($kernel);
    header("Content-Type: image/jpg");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickKernel::fromBuiltIn

(PECL imagick &gt;= 3.3.0)

ImagickKernel::fromBuiltIn — Crear un núcleo a partir de un núcleo integrado

### Descripción

public static **ImagickKernel::fromBuiltin**([int](#language.types.integer) $kernelType, [string](#language.types.string) $kernelString): [ImagickKernel](#class.imagickkernel)

Crear un núcleo a partir de un núcleo integrado. Ver http://www.imagemagick.org/Usage/morphology/#kernel para ejemplos. Actualmente, los símbolos de 'rotación' no son soportados. Ejemplo:
$diamondKernel = ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DIAMOND, "2");

### Parámetros

    kerneltype


      El tipo de núcleo a construir, por ejemplo \Imagick::KERNEL_DIAMOND






    kernelString


      Una cadena que describe los parámetros, por ejemplo "4,2.5"


### Valores devueltos

### Ejemplos

      **Ejemplo #1  ImagickKernel::fromBuiltin()**



      &lt;?php

function renderKernel(ImagickKernel $imagickKernel) {
$matrix = $imagickKernel-&gt;getMatrix();

    $imageMargin = 20;

    $tileSize = 20;
    $tileSpace = 4;
    $shadowSigma = 4;
    $shadowDropX = 20;
    $shadowDropY = 0;

    $radius = ($tileSize / 2) * 0.9;

    $rows = count($matrix);
    $columns = count($matrix[0]);

    $imagickDraw = new \ImagickDraw();

    $imagickDraw-&gt;setFillColor('#afafaf');
    $imagickDraw-&gt;setStrokeColor('none');

    $imagickDraw-&gt;translate($imageMargin, $imageMargin);
    $imagickDraw-&gt;push();

    ksort($matrix);

    foreach ($matrix as $row) {
        ksort($row);
        $imagickDraw-&gt;push();
        foreach ($row as $cell) {
            if ($cell !== false) {
                $color = intval(255 * $cell);
                $colorString = sprintf("rgb(%f, %f, %f)", $color, $color, $color);
                $imagickDraw-&gt;setFillColor($colorString);
                $imagickDraw-&gt;rectangle(0, 0, $tileSize, $tileSize);
            }
            $imagickDraw-&gt;translate(($tileSize + $tileSpace), 0);
        }
        $imagickDraw-&gt;pop();
        $imagickDraw-&gt;translate(0, ($tileSize + $tileSpace));
    }

    $imagickDraw-&gt;pop();

    $width = ($columns * $tileSize) + (($columns - 1) * $tileSpace);
    $height = ($rows * $tileSize) + (($rows - 1) * $tileSpace);

    $imagickDraw-&gt;push();
    $imagickDraw-&gt;translate($width/2 , $height/2);
    $imagickDraw-&gt;setFillColor('rgba(0, 0, 0, 0)');
    $imagickDraw-&gt;setStrokeColor('white');
    $imagickDraw-&gt;circle(0, 0, $radius - 1, 0);
    $imagickDraw-&gt;setStrokeColor('black');
    $imagickDraw-&gt;circle(0, 0, $radius, 0);
    $imagickDraw-&gt;pop();

    $canvasWidth = $width + (2 * $imageMargin);
    $canvasHeight = $height + (2 * $imageMargin);

    $kernel = new \Imagick();
    $kernel-&gt;newPseudoImage(
        $canvasWidth,
        $canvasHeight,
        'canvas:none'
    );

    $kernel-&gt;setImageFormat('png');
    $kernel-&gt;drawImage($imagickDraw);

    /* crear una sombra paralela en su propia capa */
    $canvas = $kernel-&gt;clone();
    $canvas-&gt;setImageBackgroundColor(new \ImagickPixel('rgb(0, 0, 0)'));
    $canvas-&gt;shadowImage(100, $shadowSigma, $shadowDropX, $shadowDropY);

    $canvas-&gt;setImagePage($canvasWidth, $canvasHeight, -5, -5);
    $canvas-&gt;cropImage($canvasWidth, $canvasHeight, 0, 0);

    /* composite original text_layer onto shadow_layer */
    $canvas-&gt;compositeImage($kernel, \Imagick::COMPOSITE_OVER, 0, 0);
    $canvas-&gt;setImageFormat('png');

    return $canvas;

}

function createFromBuiltin($kernelType, $kernelFirstTerm, $kernelSecondTerm, $kernelThirdTerm) {
$string = '';

    if ($kernelFirstTerm != false &amp;&amp; strlen(trim($kernelFirstTerm)) != 0) {
        $string .= $kernelFirstTerm;

        if ($kernelSecondTerm != false &amp;&amp; strlen(trim($kernelSecondTerm)) != 0) {
            $string .= ','.$kernelSecondTerm;
            if ($kernelThirdTerm != false &amp;&amp; strlen(trim($kernelThirdTerm)) != 0) {
                $string .= ','.$kernelThirdTerm;
            }
        }
    }

    $kernel = ImagickKernel::fromBuiltIn(
        $kernelType,
        $string
    );

    return $kernel;

}

function fromBuiltin($kernelType, $kernelFirstTerm, $kernelSecondTerm, $kernelThirdTerm) {
    $diamondKernel = createFromBuiltin($kernelType, $kernelFirstTerm, $kernelSecondTerm, $kernelThirdTerm);
    $imagick = renderKernel($diamondKernel);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

fromBuiltin(\Imagick::KERNEL_DIAMOND, 2, false, false);

?&gt;

# ImagickKernel::fromMatrix

(PECL imagick &gt;= 3.3.0)

ImagickKernel::fromMatrix — Crear un núcleo a partir de una matriz 2D de valores

### Descripción

public static **ImagickKernel::fromMatrix**([array](#language.types.array) $matrix, [array](#language.types.array) $origin = ?): [ImagickKernel](#class.imagickkernel)

Crear un núcleo a partir de una matriz 2D de valores. Cada valor debe ser un float
(si el elemento debe ser utilizado) o 'false' si el elemento debe ser ignorado. Para
las matrices que tienen tamaños impares en ambas dimensiones, el píxel de origen será por defecto
en el centro del núcleo. Para todas las demás dimensiones de núcleo, el píxel de origen debe ser especificado.

### Parámetros

    array


      Una matriz (es decir, un array 2D) de valores que definen el núcleo. Cada elemento debe ser un valor float, o FALSE si este elemento no debe ser utilizado por el núcleo.






    array


      Cuál elemento del núcleo debe ser utilizado como píxel de origen. Por ejemplo, para una matriz 3x3 especificando el origen como [2, 2] especificaría que el elemento en la parte inferior derecha debería ser el píxel de origen.


### Valores devueltos

El objeto ImagickKernel generado.

### Ejemplos

      **Ejemplo #1  ImagickKernel::fromMatrix()**



      &lt;?php

function renderKernel(ImagickKernel $imagickKernel) {
$matrix = $imagickKernel-&gt;getMatrix();

    $imageMargin = 20;

    $tileSize = 20;
    $tileSpace = 4;
    $shadowSigma = 4;
    $shadowDropX = 20;
    $shadowDropY = 0;

    $radius = ($tileSize / 2) * 0.9;

    $rows = count($matrix);
    $columns = count($matrix[0]);

    $imagickDraw = new \ImagickDraw();

    $imagickDraw-&gt;setFillColor('#afafaf');
    $imagickDraw-&gt;setStrokeColor('none');

    $imagickDraw-&gt;translate($imageMargin, $imageMargin);
    $imagickDraw-&gt;push();

    ksort($matrix);

    foreach ($matrix as $row) {
        ksort($row);
        $imagickDraw-&gt;push();
        foreach ($row as $cell) {
            if ($cell !== false) {
                $color = intval(255 * $cell);
                $colorString = sprintf("rgb(%f, %f, %f)", $color, $color, $color);
                $imagickDraw-&gt;setFillColor($colorString);
                $imagickDraw-&gt;rectangle(0, 0, $tileSize, $tileSize);
            }
            $imagickDraw-&gt;translate(($tileSize + $tileSpace), 0);
        }
        $imagickDraw-&gt;pop();
        $imagickDraw-&gt;translate(0, ($tileSize + $tileSpace));
    }

    $imagickDraw-&gt;pop();

    $width = ($columns * $tileSize) + (($columns - 1) * $tileSpace);
    $height = ($rows * $tileSize) + (($rows - 1) * $tileSpace);

    $imagickDraw-&gt;push();
    $imagickDraw-&gt;translate($width/2 , $height/2);
    $imagickDraw-&gt;setFillColor('rgba(0, 0, 0, 0)');
    $imagickDraw-&gt;setStrokeColor('white');
    $imagickDraw-&gt;circle(0, 0, $radius - 1, 0);
    $imagickDraw-&gt;setStrokeColor('black');
    $imagickDraw-&gt;circle(0, 0, $radius, 0);
    $imagickDraw-&gt;pop();

    $canvasWidth = $width + (2 * $imageMargin);
    $canvasHeight = $height + (2 * $imageMargin);

    $kernel = new \Imagick();
    $kernel-&gt;newPseudoImage(
        $canvasWidth,
        $canvasHeight,
        'canvas:none'
    );

    $kernel-&gt;setImageFormat('png');
    $kernel-&gt;drawImage($imagickDraw);

    /* crear una sombra paralela en su propia capa */
    $canvas = $kernel-&gt;clone();
    $canvas-&gt;setImageBackgroundColor(new \ImagickPixel('rgb(0, 0, 0)'));
    $canvas-&gt;shadowImage(100, $shadowSigma, $shadowDropX, $shadowDropY);

    $canvas-&gt;setImagePage($canvasWidth, $canvasHeight, -5, -5);
    $canvas-&gt;cropImage($canvasWidth, $canvasHeight, 0, 0);

    /* composite original text_layer onto shadow_layer */
    $canvas-&gt;compositeImage($kernel, \Imagick::COMPOSITE_OVER, 0, 0);
    $canvas-&gt;setImageFormat('png');

    return $canvas;

}

function createFromMatrix() {
$matrix = [
[0.5, 0, 0.2],
[0, 1, 0],
[0.9, 0, false],
];

    $kernel = \ImagickKernel::fromMatrix($matrix);

    return $kernel;

}

function fromMatrix() {
$kernel = createFromMatrix();
    $imagick = renderKernel($kernel);

    header("Content-Type: image/png");
    echo $imagick-&gt;getImageBlob();

}

?&gt;

# ImagickKernel::getMatrix

(PECL imagick &gt;= 3.3.0)

ImagickKernel::getMatrix — Devuelve la matriz 2D de los valores utilizados en este núcleo

### Descripción

public **ImagickKernel::getMatrix**(): [array](#language.types.array)

Devuelve la matriz 2D de los valores utilizados en este núcleo. Los elementos son
flotantes para los elementos que son utilizados, o 'false' si el elemento debe ser ignorado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una matriz (array 2D) de los valores que representan el núcleo.

### Ejemplos

      **Ejemplo #1  ImagickKernel::getMatrix()**



      &lt;?php

function renderKernelTable($matrix) {
$output = "&lt;table class='infoTable'&gt;";

    foreach ($matrix as $row) {
        $output .= "&lt;tr&gt;";
        foreach ($row as $cell) {
            $output .= "&lt;td style='text-align:left'&gt;";
            if ($cell === false) {
                $output .= "false";
            }
            else {
                $output .= round($cell, 3);
            }
            $output .= "&lt;/td&gt;";
        }
        $output .= "&lt;/tr&gt;";
    }

    $output .= "&lt;/table&gt;";

    return $output;

}

    $output = "El nombre de núcleo interno 'ring' con parámetros de '2,3.5':&lt;br/&gt;";
    $kernel = \ImagickKernel::fromBuiltIn(
        \Imagick::KERNEL_RING,
        "2,3.5"
    );
    $matrix = $kernel-&gt;getMatrix();
    $output .= renderKernelTable($matrix);

    echo $output;

?&gt;

# ImagickKernel::scale

(PECL imagick &gt;= 3.3.0)

ImagickKernel::scale — Redimensiona una lista de núcleos por la cantidad dada

### Descripción

public **ImagickKernel::scale**([float](#language.types.float) $scale, [int](#language.types.integer) $normalizeFlag = ?): [void](language.types.void.html)

Redimensiona la lista de núcleos dada por la cantidad dada, con o sin
normalización de la suma de los valores del núcleo (según los indicadores dados).

El comportamiento exacto de esta función depende del tipo de normalización utilizado
consúltense http://www.imagemagick.org/api/morphology.php#ScaleKernelInfo para más detalles.

### Parámetros

     scale









     normalizeFlag





        - Imagick::NORMALIZE_KERNEL_NONE

        - Imagick::NORMALIZE_KERNEL_VALUE

        - Imagick::NORMALIZE_KERNEL_CORRELATE

        - Imagick::NORMALIZE_KERNEL_PERCENT





### Valores devueltos

### Ejemplos

      **Ejemplo #1  ImagickKernel::scale()**



      &lt;?php

    function renderKernelTable($matrix) {
        $output = "&lt;table class='infoTable'&gt;";

        foreach ($matrix as $row) {
            $output .= "&lt;tr&gt;";
            foreach ($row as $cell) {
                $output .= "&lt;td style='text-align:left'&gt;";
                if ($cell === false) {
                    $output .= "false";
                }
                else {
                    $output .= round($cell, 3);
                }
                $output .= "&lt;/td&gt;";
            }
            $output .= "&lt;/tr&gt;";
        }

        $output .= "&lt;/table&gt;";

        return $output;
    }

    $output = "";

    $matrix = [
        [-1, 0, -1],
        [ 0, 4,  0],
        [-1, 0, -1],
    ];

    $kernel = \ImagickKernel::fromMatrix($matrix);
    $kernelClone = clone $kernel;

    $output .= "Núcleo inicial&lt;br/&gt;";
    $output .= renderKernelTable($kernel-&gt;getMatrix());

    $output .= "Redimensionamiento con NORMALIZE_KERNEL_VALUE. El  &lt;br/&gt;";
    $kernel-&gt;scale(2, \Imagick::NORMALIZE_KERNEL_VALUE);
    $output .= renderKernelTable($kernel-&gt;getMatrix());

    $kernel = clone $kernelClone;
    $output .= "Redimensionamiento por porcentaje&lt;br/&gt;";
    $kernel-&gt;scale(2, \Imagick::NORMALIZE_KERNEL_PERCENT);
    $output .= renderKernelTable($kernel-&gt;getMatrix());

    $matrix2 = [
        [-1, -1, 1],
        [ -1, false,  1],
        [1, 1, 1],
    ];

    $kernel = \ImagickKernel::fromMatrix($matrix2);
    $output .= "Redimensionamiento por correlación&lt;br/&gt;";
    $kernel-&gt;scale(1, \Imagick::NORMALIZE_KERNEL_CORRELATE);
    $output .= renderKernelTable($kernel-&gt;getMatrix());

    return $output;

?&gt;

# ImagickKernel::separate

(PECL imagick &gt;= 3.3.0)

ImagickKernel::separate — Separa un conjunto de núcleos vinculados y devuelve un array de ImagickKernels

### Descripción

public **ImagickKernel::separate**(): [array](#language.types.array)

Separa un conjunto de núcleos vinculados y devuelve un array de ImagickKernels.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

### Ejemplos

      **Ejemplo #1  ImagickKernel::separate()**



      &lt;?php

    function renderKernelTable($matrix) {

        $output = "&lt;table class='infoTable'&gt;";
        foreach ($matrix as $row) {
            $output .= "&lt;tr&gt;";
            foreach ($row as $cell) {
                $output .= "&lt;td style='text-align:left'&gt;";
                if ($cell === false) {
                    $output .= "false";
                }
                else {
                    $output .= round($cell, 3);
                }
                $output .= "&lt;/td&gt;";
            }
            $output .= "&lt;/tr&gt;";
        }

        $output .= "&lt;/table&gt;";

        return $output;
    }

    $matrix = [
        [-1, 0, -1],
        [ 0, 4,  0],
        [-1, 0, -1],
    ];

    $kernel = \ImagickKernel::fromMatrix($matrix);
    $kernel-&gt;scale(4, \Imagick::NORMALIZE_KERNEL_VALUE);
    $diamondKernel = \ImagickKernel::fromBuiltIn(
        \Imagick::KERNEL_DIAMOND,
        "2"
    );

    $kernel-&gt;addKernel($diamondKernel);

    $kernelList = $kernel-&gt;separate();

    $output = '';
    $count = 0;
    foreach ($kernelList as $kernel) {
        $output .= "&lt;br/&gt;Kernel $count&lt;br/&gt;";
        $output .= renderKernelTable($kernel-&gt;getMatrix());
        $count++;
    }

    return $output;

?&gt;

## Tabla de contenidos

- [ImagickKernel::addKernel](#imagickkernel.addkernel) — Adjunta otro núcleo a una lista de núcleos
- [ImagickKernel::addUnityKernel](#imagickkernel.addunitykernel) — Añade un núcleo Unity a la lista de núcleos
- [ImagickKernel::fromBuiltIn](#imagickkernel.frombuiltin) — Crear un núcleo a partir de un núcleo integrado
- [ImagickKernel::fromMatrix](#imagickkernel.frommatrix) — Crear un núcleo a partir de una matriz 2D de valores
- [ImagickKernel::getMatrix](#imagickkernel.getmatrix) — Devuelve la matriz 2D de los valores utilizados en este núcleo
- [ImagickKernel::scale](#imagickkernel.scale) — Redimensiona una lista de núcleos por la cantidad dada
- [ImagickKernel::separate](#imagickkernel.separate) — Separa un conjunto de núcleos vinculados y devuelve un array de ImagickKernels

# La clase ImagickKernelException

(PECL imagick 3)

## Introducción

## Sinopsis de la Clase

    ****




      class **ImagickKernelException**



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


    /* Métodos heredados */

}

# La clase [ImagickPixel](#class.imagickpixel)

(PECL imagick 2, PECL imagick 3)

## Sinopsis de la Clase

    ****

     class **ImagickPixel**
     {

public [clear](#imagickpixel.clear)(): [bool](#language.types.boolean)
public [\_\_construct](#imagickpixel.construct)([string](#language.types.string) $color = ?)
public [destroy](#imagickpixel.destroy)(): [bool](#language.types.boolean)
public [getColor](#imagickpixel.getcolor)([int](#language.types.integer) $normalized = 0): [array](#language.types.array)
public [getColorAsString](#imagickpixel.getcolorasstring)(): [string](#language.types.string)
public [getColorCount](#imagickpixel.getcolorcount)(): [int](#language.types.integer)
public [getColorQuantum](#imagickpixel.getcolorquantum)(): [array](#language.types.array)
public [getColorValue](#imagickpixel.getcolorvalue)([int](#language.types.integer) $color): [float](#language.types.float)
public [getColorValueQuantum](#imagickpixel.getcolorvaluequantum)([int](#language.types.integer) $color): [int](#language.types.integer)|[float](#language.types.float)
public [getHSL](#imagickpixel.gethsl)(): [array](#language.types.array)
public [getIndex](#imagickpixel.getindex)(): [int](#language.types.integer)
public [isPixelSimilar](#imagickpixel.ispixelsimilar)([ImagickPixel](#class.imagickpixel) $color, [float](#language.types.float) $fuzz): [bool](#language.types.boolean)
public [isPixelSimilarQuantum](#imagickpixel.ispixelsimilarquantum)([string](#language.types.string) $color, [string](#language.types.string) $fuzz = ?): [bool](#language.types.boolean)
public [isSimilar](#imagickpixel.issimilar)([ImagickPixel](#class.imagickpixel) $color, [float](#language.types.float) $fuzz): [bool](#language.types.boolean)
public [setColor](#imagickpixel.setcolor)([string](#language.types.string) $color): [bool](#language.types.boolean)
public [setcolorcount](#imagickpixel.setcolorcount)([int](#language.types.integer) $colorCount): [bool](#language.types.boolean)
public [setColorValue](#imagickpixel.setcolorvalue)([int](#language.types.integer) $color, [float](#language.types.float) $value): [bool](#language.types.boolean)
public [setColorValueQuantum](#imagickpixel.setcolorvaluequantum)([int](#language.types.integer) $color, [int](#language.types.integer)|[float](#language.types.float) $value): [bool](#language.types.boolean)
public [setHSL](#imagickpixel.sethsl)([float](#language.types.float) $hue, [float](#language.types.float) $saturation, [float](#language.types.float) $luminosity): [bool](#language.types.boolean)
public [setIndex](#imagickpixel.setindex)([int](#language.types.integer) $index): [bool](#language.types.boolean)

}

# ImagickPixel::clear

(PECL imagick 2, PECL imagick 3)

ImagickPixel::clear — Elimina todos los recursos asociados con el objeto

### Descripción

public **ImagickPixel::clear**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Elimina el objeto ImagickPixel, dejándolo en un estado inicial.
Asimismo, elimina todos los colores asociados con el objeto.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# ImagickPixel::\_\_construct

(PECL imagick 2, PECL imagick 3)

ImagickPixel::\_\_construct — El constructor [ImagickPixel](#class.imagickpixel)

### Descripción

public **ImagickPixel::\_\_construct**([string](#language.types.string) $color = ?)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Construye un objeto [ImagickPixel](#class.imagickpixel).
Si se especifica un color, el objeto
se construye, luego se inicializa con ese color antes de ser devuelto.

### Parámetros

     color


       Una cadena que representa el color opcional a utilizar como valor
       inicial del objeto.





### Valores devueltos

Devuelve un objeto [ImagickPixel](#class.imagickpixel) en caso de éxito o lanza
una excepción [ImagickPixelException](#class.imagickpixelexception) si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickPixel::construct()**

&lt;?php
function construct() {

    $columns = 4;

    $exampleColors = array(
        "rgba(100%, 0%, 0%, 0.5)",
        "hsb(33.3333%, 100%,  75%)", // verde medio
        "hsl(120, 255,   191.25)", //verde medio
        "graya(50%, 0.5)", // gris medio, semi-transparente
        "LightCoral", "none", //"cmyk(0.9, 0.48, 0.83, 0.50)",
        "#f00", //  #rgb
        "#ff0000", //  #rrggbb
        "#ff0000ff", //  #rrggbbaa
        "#ffff00000000", //  #rrrrggggbbbb
        "#ffff00000000ffff", //  #rrrrggggbbbbaaaa
        "rgb(255, 0, 0)", //  un entero en el rango 0—255 para cada componente
        "rgb(100.0%, 0.0%, 0.0%)", //  un valor de punto flotante, en el rango 0—100% para cada componente
        "rgb(255, 0, 0)", //  rango 0 - 255
        "rgba(255, 0, 0, 1.0)", //  lo mismo, pero con un valor alpha explícito
        "rgb(100%, 0%, 0%)", //  rango 0.0% - 100.0%
        "rgba(100%, 0%, 0%, 1.0)", //  lo mismo, pero con un valor alpha explícito
    );

    $draw = new \ImagickDraw();
    $count = 0;
    $black = new \ImagickPixel('rgb(0, 0, 0)');

    foreach ($exampleColors as $exampleColor) {
        $color = new \ImagickPixel($exampleColor);

        $draw-&gt;setstrokewidth(1.0);
        $draw-&gt;setStrokeColor($black);
        $draw-&gt;setFillColor($color);
        $offsetX = ($count % $columns) * 50 + 5;
        $offsetY = intval($count / $columns) * 50 + 5;
        $draw-&gt;rectangle(0 + $offsetX, 0 + $offsetY, 40 + $offsetX, 40 + $offsetY);
        $count++;
    }

    $image = new \Imagick();
    $image-&gt;newImage(350, 350, "blue");
    $image-&gt;setImageFormat("png");
    $image-&gt;drawImage($draw);
    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickPixel::destroy

(PECL imagick 2, PECL imagick 3)

ImagickPixel::destroy — Libera los recursos asociados con el objeto

### Descripción

public **ImagickPixel::destroy**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Libera todos los recursos utilizados por el objeto ImagickPixel y
elimina todos los colores asociados. El objeto no debe ser utilizado
tras la llamada a esta función.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# ImagickPixel::getColor

(PECL imagick 2, PECL imagick 3)

ImagickPixel::getColor — Devuelve el color

### Descripción

public **ImagickPixel::getColor**([int](#language.types.integer) $normalized = 0): [array](#language.types.array)

Devuelve el color descrito por el objeto [ImagickPixel](#class.imagickpixel),
en forma de un [array](#language.types.array). Si el color contiene un canal de opacidad, este
será proporcionado como cuarta valor de la lista.

### Parámetros

     normalized


       Normaliza los valores de color. Los valores posibles son 0,
       1 o 2.




        <caption>**
         Lista de valores posibles para normalized
        **</caption>



           normalized
           Descripción







            0


            Los valores RGB son devueltos como [int](#language.types.integer)s en el intervalo (inclusivo)
            0 a 255. El valor alpha es devuelto como
            [int](#language.types.integer) y es 0 o 1.





            1


            Los valores RGBA son devueltos como [float](#language.types.float)s en el intervalo (inclusivo)
            0 a 1.





            2


            Los valores RGBA son devueltos como [int](#language.types.integer)s en el intervalo (inclusivo)
            0 a 255.










### Valores devueltos

Un array de los valores de los canales. Genera
[ImagickPixelException](#class.imagickpixelexception) en caso de error.

### Ejemplos

    **Ejemplo #1 Uso simple del método Imagick::getColor()**

&lt;?php

// Crea un objeto ImagickPixel con el color predeterminado 'marron'
$color = new ImagickPixel('brown');

// Define el color para tener un canal alpha del 25%
$color-&gt;setColorValue(Imagick::COLOR_ALPHA, 64 / 256.0);

$colorInfo = $color-&gt;getColor();

echo "Valores estándar :".PHP_EOL;
print_r($colorInfo);

$colorInfo = $color-&gt;getColor(1);

echo "Valores normalizados :".PHP_EOL;
print_r($colorInfo);

?&gt;

    El ejemplo anterior mostrará:



    Valores estándar :

Array
(
[r] =&gt; 165
[g] =&gt; 42
[b] =&gt; 42
[a] =&gt; 0
)
Valores normalizados :
Array
(
[r] =&gt; 0.64705882352941
[g] =&gt; 0.16470588235294
[b] =&gt; 0.16470588235294
[a] =&gt; 0.25000381475547
)

# ImagickPixel::getColorAsString

(PECL imagick 2 &gt;= 2.1.0, PECL imagick 3)

ImagickPixel::getColorAsString — Devuelve un color

### Descripción

public **ImagickPixel::getColorAsString**(): [string](#language.types.string)

Devuelve el color del objeto ImagickPixel, en forma de [string](#language.types.string).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el color del objeto ImagickPixel, en forma de [string](#language.types.string).

### Ejemplos

    **Ejemplo #1 Uso básico del método Imagick::getColorAsString()**

&lt;?php

//Crea un objeto ImagickPixel con el color predefinido 'marron'
$color = new ImagickPixel('brown');

$color-&gt;setColorValue(Imagick::COLOR_ALPHA, 64 / 256.0);

$colorInfo = $color-&gt;getColorAsString();

print_r($colorInfo);
?&gt;

    El ejemplo anterior mostrará:

rgb(165,42,42)

### Notas

**Nota**:
**Alpha no devuelto**

    Este método no devuelve el valor del alpha del color en la cadena.

# ImagickPixel::getColorCount

(PECL imagick 2, PECL imagick 3)

ImagickPixel::getColorCount — Devuelve el número de colores asociados con un color

### Descripción

public **ImagickPixel::getColorCount**(): [int](#language.types.integer)

Devuelve el número de colores asociados con el color.

El número de píxeles de la imagen que tienen el mismo color que este ImagickPixel.

ImagickPixel::getColorCount parece funcionar únicamente para los objetos ImagickPixel creados mediante Imagick::getImageHistogram()

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de colores, en forma de [int](#language.types.integer) en
caso de éxito o lanza una excepción [ImagickPixelException](#class.imagickpixelexception)
si
ocurre un error.

### Ejemplos

    **Ejemplo #1 ImagickPixel getColorCount()**

&lt;?php
$imagick = new \Imagick();
    $imagick-&gt;newPseudoImage(640, 480, "magick:logo");
    $histogramElements = $imagick-&gt;getImageHistogram();
    $lastColor = array_pop($histogramElements);
echo "Last pixel color count is: ".$lastColor-&gt;getColorCount();
?&gt;

     La salida para esto será similar a:

Last pixel color count is: 256244

# ImagickPixel::getColorQuantum

(No version information available, might only be in Git)

ImagickPixel::getColorQuantum — Devuelve el color del píxel en un array como valores cuánticos

### Descripción

public **ImagickPixel::getColorQuantum**(): [array](#language.types.array)

Devuelve el color del píxel en un array como valores cuánticos. Si ImageMagick ha sido compilado
como HDRI, estos valores serán floats, de lo contrario serán integers.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un array con las claves "r", "g",
"b", "a".

# ImagickPixel::getColorValue

(PECL imagick 2, PECL imagick 3)

ImagickPixel::getColorValue — Obtiene el valor normalizado del canal de color proporcionado

### Descripción

public **ImagickPixel::getColorValue**([int](#language.types.integer) $color): [float](#language.types.float)

Obtiene el valor del canal de color especificado, en forma de número de punto flotante
comprendido entre 0 y 1.

### Parámetros

     color


       El color para el cual se obtendrá el valor, especificado
       en forma de constante de colores Imagick. Puede ser colores
       RGB, colores CMYK, alpha y opacidad, i.e. Imagick::COLOR_BLUE
       o Imagick::COLOR_MAGENTA.





### Valores devueltos

El valor del canal, en forma de número de punto flotante normalizado,
o lanza una excepción [ImagickPixelException](#class.imagickpixelexception)
si ocurre un error.

### Ejemplos

    **Ejemplo #1 Uso básico del método Imagick::getColorValue()**

&lt;?php

$color = new ImagickPixel('rgba(90%, 20%, 20%, 0.75)');

echo "El valor alpha es ".$color-&gt;getColorValue(Imagick::COLOR_ALPHA).PHP_EOL;
echo "".PHP_EOL;
echo "El valor rojo es ".$color-&gt;getColorValue(Imagick::COLOR_RED).PHP_EOL;
echo "El valor verde es ".$color-&gt;getColorValue(Imagick::COLOR_GREEN).PHP_EOL;
echo "El valor azul es ".$color-&gt;getColorValue(Imagick::COLOR_BLUE).PHP_EOL;
echo "".PHP_EOL;
echo "El valor Cian es ".$color-&gt;getColorValue(Imagick::COLOR_CYAN).PHP_EOL;
echo "El valor Magenta es ".$color-&gt;getColorValue(Imagick::COLOR_MAGENTA).PHP_EOL;
echo "El valor amarillo es ".$color-&gt;getColorValue(Imagick::COLOR_YELLOW).PHP_EOL;
echo "El valor negro es ".$color-&gt;getColorValue(Imagick::COLOR_BLACK).PHP_EOL;

?&gt;

    El ejemplo anterior mostrará:

El valor alpha es 0.74999618524453

El valor rojo es 0.90000762951095
El valor verde es 0.2
El valor azul es 0.2

El valor Cian es 0.90000762951095
El valor Magenta es 0.2
El valor amarillo es 0.2
El valor negro es 0

# ImagickPixel::getColorValueQuantum

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

ImagickPixel::getColorValueQuantum — Devuelve el valor cuántico de un color en ImagickPixel

### Descripción

public **ImagickPixel::getColorValueQuantum**([int](#language.types.integer) $color): [int](#language.types.integer)|[float](#language.types.float)

Devuelve el valor cuántico de un color en ImagickPixel. El valor de retorno es un float si ImageMagick ha sido compilado con HDRI, de lo contrario un integer.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El valor cuántico del elemento de color. Float si ImageMagick ha sido compilado con HDRI, de lo contrario un integer.

### Ejemplos

      **Ejemplo #1  ImagickPixel::getColorValueQuantum()**



      &lt;?php
        $color = new \ImagickPixel('rgb(128, 5, 255)');
        $colorRed = $color-&gt;getColorValueQuantum(\Imagick::COLOR_RED);
        $colorGreen = $color-&gt;getColorValueQuantum(\Imagick::COLOR_GREEN);
        $colorBlue = $color-&gt;getColorValueQuantum(\Imagick::COLOR_BLUE);
        $colorAlpha = $color-&gt;getColorValueQuantum(\Imagick::COLOR_ALPHA);

        printf(
            "Red: %s Green: %s  Blue %s Alpha: %s",
            $colorRed,
            $colorGreen,
            $colorBlue,
            $colorAlpha
        );

?&gt;

# ImagickPixel::getHSL

(PECL imagick 2, PECL imagick 3)

ImagickPixel::getHSL — Retorna el color HSL normalizado del objeto [ImagickPixel](#class.imagickpixel)

### Descripción

public **ImagickPixel::getHSL**(): [array](#language.types.array)

Retorna el color HSL normalizado, descrito por el objeto
[ImagickPixel](#class.imagickpixel), donde cada una de las tres
valores será un número decimal, comprendido entre 0.0 y 1.0.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna el valor HSL en un array que contiene las claves
"hue", "saturation" y
"luminosity". Genera una excepción
[ImagickPixelException](#class.imagickpixelexception)
en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::getHSL()**

&lt;?php

$color = new ImagickPixel('rgb(90%, 10%, 10%)');

$colorInfo = $color-&gt;getHSL();

print_r($colorInfo);

?&gt;

    El ejemplo anterior mostrará:

Array
(
[hue] =&gt; 0
[saturation] =&gt; 0.80001220740379
[luminosity] =&gt; 0.50000762951095
)

### Notas

**Nota**:

    Disponible a partir de la versión 6.2.9 y superior de la biblioteca
    ImageMagick.

# ImagickPixel::getIndex

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

ImagickPixel::getIndex — Devuelve el índice de la tabla de colores del píxel

### Descripción

public **ImagickPixel::getIndex**(): [int](#language.types.integer)

Devuelve el índice de la tabla de colores del píxel.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# ImagickPixel::isPixelSimilar

(PECL imagick 3 &gt;= 3.3.0)

ImagickPixel::isPixelSimilar — Verifica la distancia entre este color y otro

### Descripción

public **ImagickPixel::isPixelSimilar**([ImagickPixel](#class.imagickpixel) $color, [float](#language.types.float) $fuzz): [bool](#language.types.boolean)

Verifica la distancia entre el color descrito por este objeto ImagickPixel
y el del objeto proporcionado. Si la distancia entre los dos puntos es
inferior al valor del argumento fuzz proporcionado, el color es similar.
Este método reemplaza al método
[ImagickPixel::isSimilar()](#imagickpixel.issimilar)
y normaliza correctamente el valor fuzz de ImageMagick QuantumRange.

### Parámetros

     color


       El objeto ImagickPixel a utilizar para la comparación.






     fuzz


       La distancia máxima para la cual se consideran los colores como
       similares. El valor máximo teórico para este argumento es la raíz
       cuadrada de tres (1.732).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# ImagickPixel::isPixelSimilarQuantum

(PECL imagick 3 &gt;= 3.3.0)

ImagickPixel::isPixelSimilarQuantum — Indica si dos colores difieren en menos de la distancia especificada

### Descripción

public **ImagickPixel::isPixelSimilarQuantum**([string](#language.types.string) $color, [string](#language.types.string) $fuzz = ?): [bool](#language.types.boolean)

Indica si dos colores difieren en menos de la distancia especificada.
El valor de flou debe estar comprendido entre 0 y QuantumRange.
El valor máximo representa la distancia más larga posible en el espacio colorimétrico.
Por ejemplo, de RGB(0, 0, 0) a RGB(255, 255, 255) para el espacio colorimétrico RGB

### Parámetros

    color









    fuzz





### Valores devueltos

# ImagickPixel::isSimilar

(PECL imagick 2, PECL imagick 3)

ImagickPixel::isSimilar — Verifica la distancia entre 2 colores

### Descripción

public **ImagickPixel::isSimilar**([ImagickPixel](#class.imagickpixel) $color, [float](#language.types.float) $fuzz): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Verifica la distancia entre la color descrita por el objeto ImagickPixel
y la del objeto proporcionado, colocando sus valores RGB en el cubo
de color. Si la distancia entre los 2 puntos es inferior al valor
del argumento fuzz, la color es similar.
Obsoleto en favor del método
[ImagickPixel::isPixelSimilar()](#imagickpixel.ispixelsimilar).

### Parámetros

     color


       El objeto ImagickPixel utilizado para la comparación.






     fuzz


       La distancia máxima utilizada para considerar que los colores
       son similares. El valor máximo teórico es la raíz cuadrada
       de 3 (1.732).





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickPixel::isSimilar()**

&lt;?php
// La prueba a continuación fue escrita con una distancia máxima de 255,
// por lo tanto, debemos escalarla con una raíz cuadrada de 3 -
// la longitud de la diagonal de un cubo.
$root3 = 1.732050807568877;

        $tests = array(
            ['rgb(245, 0, 0)',      'rgb(255, 0, 0)',   9 / $root3,         false,],
            ['rgb(245, 0, 0)',      'rgb(255, 0, 0)',  10 / $root3,         true,],
            ['rgb(0, 0, 0)',        'rgb(7, 7, 0)',     9 / $root3,         false,],
            ['rgb(0, 0, 0)',        'rgb(7, 7, 0)',    10 / $root3,         true,],
            ['rgba(0, 0, 0, 1)',    'rgba(7, 7, 0, 1)', 9 / $root3,         false,],
            ['rgba(0, 0, 0, 1)',    'rgba(7, 7, 0, 1)',    10 / $root3,     true,],
            ['rgb(128, 128, 128)',  'rgb(128, 128, 120)',   7 / $root3,     false,],
            ['rgb(128, 128, 128)',  'rgb(128, 128, 120)',   8 / $root3,     true,],
            ['rgb(0, 0, 0)',        'rgb(255, 255, 255)',   254.9,          false,],
            ['rgb(0, 0, 0)',        'rgb(255, 255, 255)',   255,            true,],
            ['rgb(255, 0, 0)',      'rgb(0, 255, 255)',     254.9,          false,],
            ['rgb(255, 0, 0)',      'rgb(0, 255, 255)',     255,            true,],
            ['black',               'rgba(0, 0, 0)',        0.0,            true],
            ['black',               'rgba(10, 0, 0, 1.0)',  10.0 / $root3,  true],);

        $output = "&lt;table width='100%' class='infoTable'&gt;&lt;thead&gt;
                &lt;tr&gt;
                &lt;th&gt;
                Color 1
                &lt;/th&gt;
                &lt;th&gt;
                Color 2
                &lt;/th&gt;
                &lt;th&gt;
                    Test distance * 255
                &lt;/th&gt;
                &lt;th&gt;
                    Is within distance
                &lt;/th&gt;
                &lt;/tr&gt;
        &lt;/thead&gt;";

        $output .= "&lt;tbody&gt;";

        foreach ($tests as $testInfo) {
            $color1 = $testInfo[0];
            $color2 = $testInfo[1];
            $distance = $testInfo[2];
            $expectation = $testInfo[3];
            $testDistance = ($distance / 255.0);

            $color1Pixel = new \ImagickPixel($color1);
            $color2Pixel = new \ImagickPixel($color2);

            $isSimilar = $color1Pixel-&gt;isPixelSimilar($color2Pixel, $testDistance);

            if ($isSimilar !== $expectation) {
                echo "Test distance failed. Color [$color1] compared to color [$color2] is not within distance $testDistance FAILED.".NL;
            }

            $layout = "&lt;tr&gt;
                &lt;td&gt;%s&lt;/td&gt;
                &lt;td&gt;%s&lt;/td&gt;
                &lt;td&gt;%s&lt;/td&gt;
                &lt;td style='text-align: center;'&gt;%s&lt;/td&gt;
            &lt;/tr&gt;";

            $output .= sprintf(
                $layout,
                $color1,
                $color2,
                $distance,
                $isSimilar ? 'yes' : 'no'
            );
        }

        $output .= "&lt;/tbody&gt;&lt;/table&gt;";

        return $output;

?&gt;

# ImagickPixel::setColor

(PECL imagick 2, PECL imagick 3)

ImagickPixel::setColor — Define la color

### Descripción

public **ImagickPixel::setColor**([string](#language.types.string) $color): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Define la color, descrita por el objeto ImagickPixel, con un [string](#language.types.string)
(por ejemplo, "blue", "#0000ff",
"rgb(0,0,255)", "cmyk(100,100,100,10)", etc.).

### Parámetros

     color


       La definición de la color a utilizar para inicializar
       el objeto ImagickPixel.





### Valores devueltos

Retorna **[true](#constant.true)** si la color especificada ha sido definida o **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickPixel::setColor()**

&lt;?php
function setColor() {
$draw = new \ImagickDraw();

    $strokeColor = new \ImagickPixel('green');
    $fillColor = new \ImagickPixel();
    $fillColor-&gt;setColor('rgba(100%, 75%, 0%, 1.0)');

    $draw-&gt;setstrokewidth(3.0);
    $draw-&gt;setStrokeColor($strokeColor);
    $draw-&gt;setFillColor($fillColor);
    $draw-&gt;rectangle(200, 200, 300, 300);

    $image = new \Imagick();
    $image-&gt;newImage(500, 500, "SteelBlue2");
    $image-&gt;setImageFormat("png");

    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickPixel::setColorCount

(PECL imagick 2, PECL imagick 3)

ImagickPixel::setColorCount — Define la cantidad de colores asociada a este píxel

### Descripción

public **ImagickPixel::setcolorcount**([int](#language.types.integer) $colorCount): [bool](#language.types.boolean)

Define la cantidad de colores asociada a este píxel.

### Parámetros

    colorCount





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# ImagickPixel::setColorValue

(PECL imagick 2, PECL imagick 3)

ImagickPixel::setColorValue — Define el valor normalizado de uno de los canales

### Descripción

public **ImagickPixel::setColorValue**([int](#language.types.integer) $color, [float](#language.types.float) $value): [bool](#language.types.boolean)

Define el valor del canal especificado del objeto al valor especificado,
que debe estar comprendido entre 0 y 1. Esta función puede ser utilizada
para proporcionar un canal de opacidad al objeto ImagickPixel.

### Parámetros

     color


       Una constante de color Imagick, i.e. \Imagick::COLOR_GREEN o
       \Imagick::COLOR_ALPHA.






     value


       El valor a definir para este canal, comprendido entre 0 y 1.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con Imagick::setColorValue()**

&lt;?php

$color = new \ImagickPixel('firebrick');

$color-&gt;setColorValue(Imagick::COLOR_ALPHA, 0.5);

print_r($color-&gt;getcolor(true));
?&gt;

    El ejemplo anterior mostrará:

Array
(
[r] =&gt; 0.69803921568627
[g] =&gt; 0.13333333333333
[b] =&gt; 0.13333333333333
[a] =&gt; 0.50000762951095
)

# ImagickPixel::setColorValueQuantum

(PECL imagick 2 &gt;=2.3.0, PECL imagick 3)

ImagickPixel::setColorValueQuantum — Define la valor cuántica de un elemento de color de ImagickPixel

### Descripción

public **ImagickPixel::setColorValueQuantum**([int](#language.types.integer) $color, [int](#language.types.integer)|[float](#language.types.float) $value): [bool](#language.types.boolean)

Define la valor cuántica de un elemento de color de ImagickPixel.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    color


      Color a definir, por ejemplo \Imagick::COLOR_GREEN.







    value


      Valor cuántica a definir para el elemento de color. Debería ser un float si ImageMagick ha sido compilado con HDRI, de lo contrario un integer en el rango 0 a Imagick::getQuantum().


### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

      **Ejemplo #1  ImagickPixel::setColorValueQuantum()**



      &lt;?php

function setColorValueQuantum() {
$image = new \Imagick();

    $quantumRange = $image-&gt;getQuantumRange();

    $draw = new \ImagickDraw();
    $color = new \ImagickPixel('blue');
    $color-&gt;setcolorValueQuantum(\Imagick::COLOR_RED, 128 * $quantumRange['quantumRangeLong'] / 256);

    $draw-&gt;setstrokewidth(1.0);
    $draw-&gt;setStrokeColor($color);
    $draw-&gt;setFillColor($color);
    $draw-&gt;rectangle(200, 200, 300, 300);

    $image-&gt;newImage(500, 500, "SteelBlue2");
    $image-&gt;setImageFormat("png");

    $image-&gt;drawImage($draw);

    header("Content-Type: image/png");
    echo $image-&gt;getImageBlob();

}

?&gt;

# ImagickPixel::setHSL

(PECL imagick 2, PECL imagick 3)

ImagickPixel::setHSL — Define el color HSL normalizado

### Descripción

public **ImagickPixel::setHSL**([float](#language.types.float) $hue, [float](#language.types.float) $saturation, [float](#language.types.float) $luminosity): [bool](#language.types.boolean)

Define el color descrito por el objeto ImagickPixel utilizando
los valores normalizados para la densidad, la saturación y la luminosidad.

### Parámetros

     hue


       El valor normalizado para la densidad, descrito por un arco fraccionario
       (entre 0 y 1) del círculo de densidad, cuyo valor cero corresponde a
       rojo.






     saturation


       El valor normalizado para la saturación, donde 1 corresponde a una
       saturación completa.






     luminosity


       El valor normalizado para la luminosidad, comprendido entre 0 (negro)
       y 1 (blanco), con el valor HS completo a 0.5 de luminosidad.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickPixel::setHSL()** para modificar un color

&lt;?php

// Crea un rojo puro
$color = new ImagickPixel('rgb(90%, 10%, 10%)');

// Obtiene sus valores HSL
$colorInfo = $color-&gt;getHSL();

// Realiza una rotación del tono de 180 grados
$newHue = $colorInfo['hue'] + 0.5;
if ($newHue &gt; 1) {
$newHue = $newHue - 1;
}

// Define el objeto ImagickPixel al nuevo color
$colorInfo = $color-&gt;setHSL($newHue, $colorInfo['saturation'], $colorInfo['luminosity']);

// Verifica que el nuevo color sea azul/verde
$colorInfo = $color-&gt;getcolor();
print_r($colorInfo);

?&gt;

    El ejemplo anterior mostrará:

Array
(
[r] =&gt; 26
[g] =&gt; 230
[b] =&gt; 230
[a] =&gt; 255
)

### Notas

**Nota**:

    Disponible a partir de la versión 6.2.9 de la biblioteca
    ImageMagick.

# ImagickPixel::setIndex

(PECL imagick 2 &gt;= 2.3.0, PECL imagick 3)

ImagickPixel::setIndex — Define el índice de la tabla de colores del píxel

### Descripción

public **ImagickPixel::setIndex**([int](#language.types.integer) $index): [bool](#language.types.boolean)

Define el índice de la tabla de colores del píxel.

### Parámetros

    index





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

## Tabla de contenidos

- [ImagickPixel::clear](#imagickpixel.clear) — Elimina todos los recursos asociados con el objeto
- [ImagickPixel::\_\_construct](#imagickpixel.construct) — El constructor ImagickPixel
- [ImagickPixel::destroy](#imagickpixel.destroy) — Libera los recursos asociados con el objeto
- [ImagickPixel::getColor](#imagickpixel.getcolor) — Devuelve el color
- [ImagickPixel::getColorAsString](#imagickpixel.getcolorasstring) — Devuelve un color
- [ImagickPixel::getColorCount](#imagickpixel.getcolorcount) — Devuelve el número de colores asociados con un color
- [ImagickPixel::getColorQuantum](#imagickpixel.getcolorquantum) — Devuelve el color del píxel en un array como valores cuánticos
- [ImagickPixel::getColorValue](#imagickpixel.getcolorvalue) — Obtiene el valor normalizado del canal de color proporcionado
- [ImagickPixel::getColorValueQuantum](#imagickpixel.getcolorvaluequantum) — Devuelve el valor cuántico de un color en ImagickPixel
- [ImagickPixel::getHSL](#imagickpixel.gethsl) — Retorna el color HSL normalizado del objeto ImagickPixel
- [ImagickPixel::getIndex](#imagickpixel.getindex) — Devuelve el índice de la tabla de colores del píxel
- [ImagickPixel::isPixelSimilar](#imagickpixel.ispixelsimilar) — Verifica la distancia entre este color y otro
- [ImagickPixel::isPixelSimilarQuantum](#imagickpixel.ispixelsimilarquantum) — Indica si dos colores difieren en menos de la distancia especificada
- [ImagickPixel::isSimilar](#imagickpixel.issimilar) — Verifica la distancia entre 2 colores
- [ImagickPixel::setColor](#imagickpixel.setcolor) — Define la color
- [ImagickPixel::setColorCount](#imagickpixel.setcolorcount) — Define la cantidad de colores asociada a este píxel
- [ImagickPixel::setColorValue](#imagickpixel.setcolorvalue) — Define el valor normalizado de uno de los canales
- [ImagickPixel::setColorValueQuantum](#imagickpixel.setcolorvaluequantum) — Define la valor cuántica de un elemento de color de ImagickPixel
- [ImagickPixel::setHSL](#imagickpixel.sethsl) — Define el color HSL normalizado
- [ImagickPixel::setIndex](#imagickpixel.setindex) — Define el índice de la tabla de colores del píxel

# La clase ImagickPixelException

(PECL imagick 3)

## Introducción

## Sinopsis de la Clase

     ****




      class **ImagickPixelException**



      extends
       [Exception](#class.exception)


     implements
       [Throwable](#class.throwable) {
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


    /* Métodos heredados */

}

# La clase [ImagickPixelIterator](#class.imagickpixeliterator)

(PECL imagick 2, PECL imagick 3)

## Sinopsis de la Clase

    ****

     class **ImagickPixelIterator**
     {

public [clear](#imagickpixeliterator.clear)(): [bool](#language.types.boolean)
public [\_\_construct](#imagickpixeliterator.construct)([Imagick](#class.imagick) $wand)
public [destroy](#imagickpixeliterator.destroy)(): [bool](#language.types.boolean)
public [getCurrentIteratorRow](#imagickpixeliterator.getcurrentiteratorrow)(): [array](#language.types.array)
public [getIteratorRow](#imagickpixeliterator.getiteratorrow)(): [int](#language.types.integer)
public [getNextIteratorRow](#imagickpixeliterator.getnextiteratorrow)(): [array](#language.types.array)
public [getPreviousIteratorRow](#imagickpixeliterator.getpreviousiteratorrow)(): [array](#language.types.array)
public [newPixelIterator](#imagickpixeliterator.newpixeliterator)([Imagick](#class.imagick) $wand): [bool](#language.types.boolean)
public [newPixelRegionIterator](#imagickpixeliterator.newpixelregioniterator)(
    [Imagick](#class.imagick) $wand,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $columns,
    [int](#language.types.integer) $rows
): [bool](#language.types.boolean)
public [resetIterator](#imagickpixeliterator.resetiterator)(): [bool](#language.types.boolean)
public [setIteratorFirstRow](#imagickpixeliterator.setiteratorfirstrow)(): [bool](#language.types.boolean)
public [setIteratorLastRow](#imagickpixeliterator.setiteratorlastrow)(): [bool](#language.types.boolean)
public [setIteratorRow](#imagickpixeliterator.setiteratorrow)([int](#language.types.integer) $row): [bool](#language.types.boolean)
public [syncIterator](#imagickpixeliterator.synciterator)(): [bool](#language.types.boolean)

}

# ImagickPixelIterator::clear

(PECL imagick 2, PECL imagick 3)

ImagickPixelIterator::clear — Elimina todos los recursos asociados a PixelIterator

### Descripción

public **ImagickPixelIterator::clear**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Elimina todos los recursos asociados a PixelIterator.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickPixelIterator::clear()**

&lt;?php
function clear($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));

    $imageIterator = $imagick-&gt;getPixelRegionIterator(100, 100, 250, 200);

    /* Se recorren las líneas de píxeles */
    foreach ($imageIterator as $pixels) {
        /** @var $pixel \ImagickPixel */
        /* Se recorren los píxeles de la línea (columna) */
        foreach ($pixels as $column =&gt; $pixel) {
            if ($column % 2) {
                /* Pintar cada segundo píxel de negro */
                $pixel-&gt;setColor("rgba(0, 0, 0, 0)");
            }
        }
        /* Se sincroniza el iterador, esto es importante en cada iteración */
        $imageIterator-&gt;syncIterator();
    }

    $imageIterator-&gt;clear();

    header("Content-Type: image/jpg");
    echo $imagick;

}

?&gt;

# ImagickPixelIterator::\_\_construct

(PECL imagick 2, PECL imagick 3)

ImagickPixelIterator::\_\_construct — El constructor de la clase [ImagickPixelIterator](#class.imagickpixeliterator)

### Descripción

public **ImagickPixelIterator::\_\_construct**([Imagick](#class.imagick) $wand)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

El constructor de la clase [ImagickPixelIterator](#class.imagickpixeliterator).

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickPixelIterator::construct()**

&lt;?php
function construct($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imageIterator = new \ImagickPixelIterator($imagick);

    /* Se recorren las líneas de píxeles */
    foreach ($imageIterator as $pixels) {
        /* Se recorren los píxeles de la línea (columna) */
        foreach ($pixels as $column =&gt; $pixel) {
            /** @var $pixel \ImagickPixel */
            if ($column % 2) {
                /* Se tiñen todos los dos píxeles en negro */
                $pixel-&gt;setColor("rgba(0, 0, 0, 0)");
            }
        }
        /* Se sincroniza el iterador, esto es importante en cada iteración */
        $imageIterator-&gt;syncIterator();
    }

    header("Content-Type: image/jpg");
    echo $imagick;

}

?&gt;

# ImagickPixelIterator::destroy

(PECL imagick 2, PECL imagick 3)

ImagickPixelIterator::destroy — Libera los recursos asociados a PixelIterator

### Descripción

public **ImagickPixelIterator::destroy**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Libera los recursos asociados a PixelIterator.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# ImagickPixelIterator::getCurrentIteratorRow

(PECL imagick 2, PECL imagick 3)

ImagickPixelIterator::getCurrentIteratorRow — Devuelve la fila actual de los objetos ImagickPixel

### Descripción

public **ImagickPixelIterator::getCurrentIteratorRow**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la fila actual, en forma de array, de los objetos ImagickPixel
desde el iterador de píxeles.

### Valores devueltos

Devuelve una fila, en forma de array, de los objetos ImagickPixel,
que puede ser iterada a su vez.

# ImagickPixelIterator::getIteratorRow

(PECL imagick 2, PECL imagick 3)

ImagickPixelIterator::getIteratorRow — Devuelve la fila actual del iterador de píxeles

### Descripción

public **ImagickPixelIterator::getIteratorRow**(): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la fila actual del iterador de píxeles.

### Valores devueltos

Devuelve la posición, en forma de [int](#language.types.integer) de la fila
o lanza una excepción ImagickPixelIteratorException en caso de error.

# ImagickPixelIterator::getNextIteratorRow

(PECL imagick 2, PECL imagick 3)

ImagickPixelIterator::getNextIteratorRow — Devuelve la siguiente línea del iterador de píxeles

### Descripción

public **ImagickPixelIterator::getNextIteratorRow**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la siguiente línea, en forma de [array](#language.types.array), desde el iterador
de píxeles.

### Valores devueltos

Devuelve la siguiente línea, en forma de [array](#language.types.array) de objetos ImagickPixel,
o lanza una excepción ImagickPixelIteratorException en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickPixelIterator::getNextIteratorRow()**

&lt;?php
function getNextIteratorRow($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imageIterator = $imagick-&gt;getPixelIterator();

    $count = 0;
    while ($pixels = $imageIterator-&gt;getNextIteratorRow()) {
        if (($count % 3) == 0) {
            /* Se recorren los píxeles de la línea (columna) */
            foreach ($pixels as $column =&gt; $pixel) {
                /** @var $pixel \ImagickPixel */
                if ($column % 2) {
                    /* Se tiñen todos los dos píxeles en negro */
                    $pixel-&gt;setColor("rgba(0, 0, 0, 0)");
                }
            }
            /* Se sincroniza el iterador, esto es importante en cada iteración */
            $imageIterator-&gt;syncIterator();
        }

        $count += 1;
    }

    header("Content-Type: image/jpg");
    echo $imagick;

}

?&gt;

# ImagickPixelIterator::getPreviousIteratorRow

(PECL imagick 2, PECL imagick 3)

ImagickPixelIterator::getPreviousIteratorRow — Devuelve la línea anterior

### Descripción

public **ImagickPixelIterator::getPreviousIteratorRow**(): [array](#language.types.array)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve la línea anterior, en forma de [array](#language.types.array), desde el iterador de píxeles.

### Valores devueltos

Devuelve la línea anterior, en forma de [array](#language.types.array) de objetos ImagickPixelWand,
o lanza una excepción ImagickPixelIteratorException en caso de error.

# ImagickPixelIterator::newPixelIterator

(PECL imagick 2, PECL imagick 3)

ImagickPixelIterator::newPixelIterator — Devuelve un nuevo píxel del iterador

### Descripción

public **ImagickPixelIterator::newPixelIterator**([Imagick](#class.imagick) $wand): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve un nuevo píxel del iterador.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito..
Se lanza una excepción ImagickPixelIteratorException en caso de error.

# ImagickPixelIterator::newPixelRegionIterator

(PECL imagick 2, PECL imagick 3)

ImagickPixelIterator::newPixelRegionIterator — Devuelve un nuevo iterador de píxeles

### Descripción

public **ImagickPixelIterator::newPixelRegionIterator**(
    [Imagick](#class.imagick) $wand,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [int](#language.types.integer) $columns,
    [int](#language.types.integer) $rows
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Devuelve un nuevo iterador de píxeles.

### Parámetros

     wand








     x








     y








     columns








     rows







### Valores devueltos

Devuelve un nuevo [ImagickPixelIterator](#class.imagickpixeliterator) en caso de éxito o
lanza una excepción [ImagickPixelIteratorException](#class.imagickpixeliteratorexception)
si ocurre un error.

# ImagickPixelIterator::resetIterator

(PECL imagick 2, PECL imagick 3)

ImagickPixelIterator::resetIterator — Reinicia el iterador de píxeles

### Descripción

public **ImagickPixelIterator::resetIterator**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Reinicia el iterador de píxeles. Utilice este método con
ImagickPixelIterator::getNextIteratorRow() para iterar sobre todos los
píxeles de un contenedor de píxeles.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickPixelIterator::resetIterator()**

&lt;?php
function resetIterator($imagePath) {

    $imagick = new \Imagick(realpath($imagePath));

    $imageIterator = $imagick-&gt;getPixelIterator();

    /* Se recorren las líneas de píxeles */
    foreach ($imageIterator as $pixels) {
        /* Se recorren los píxeles de la línea (columna) */
        foreach ($pixels as $column =&gt; $pixel) {
            /** @var $pixel \ImagickPixel */
            if ($column % 2) {

                /* Cada dos píxeles, se añade un 25% de rojo */
                $pixel-&gt;setColorValue(\Imagick::COLOR_RED, 64);
            }
        }
        /* Se sincroniza el iterador, esto es importante en cada iteración */
        $imageIterator-&gt;syncIterator();
    }

    $imageIterator-&gt;resetiterator();

    /* Se recorren las líneas de píxeles */
    foreach ($imageIterator as $pixels) {
        /* Se recorren los píxeles de la línea (columna) */
        foreach ($pixels as $column =&gt; $pixel) {
            /** @var $pixel \ImagickPixel */
            if ($column % 3) {
                $pixel-&gt;setColorValue(\Imagick::COLOR_BLUE, 64); /* Cada dos píxeles, se los hace un poco más azules */
                //$pixel-&gt;setColor("rgba(0, 0, 128, 0)"); /* Se tiñen todos los dos píxeles en negro */
            }
        }
        $imageIterator-&gt;syncIterator(); /* Se sincroniza el iterador, esto es importante en cada iteración */
    }

    $imageIterator-&gt;clear();

    header("Content-Type: image/jpg");
    echo $imagick;

}

?&gt;

# ImagickPixelIterator::setIteratorFirstRow

(PECL imagick 2, PECL imagick 3)

ImagickPixelIterator::setIteratorFirstRow — Establece el iterador de píxeles en la primera línea de píxeles

### Descripción

public **ImagickPixelIterator::setIteratorFirstRow**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Establece el iterador de píxeles en la primera línea de píxeles.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# ImagickPixelIterator::setIteratorLastRow

(PECL imagick 2, PECL imagick 3)

ImagickPixelIterator::setIteratorLastRow — Define el iterador de píxeles en la última línea de píxeles

### Descripción

public **ImagickPixelIterator::setIteratorLastRow**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Define el iterador de píxeles en la última línea de píxeles.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

# ImagickPixelIterator::setIteratorRow

(PECL imagick 2, PECL imagick 3)

ImagickPixelIterator::setIteratorRow — Define la línea del iterador de píxeles

### Descripción

public **ImagickPixelIterator::setIteratorRow**([int](#language.types.integer) $row): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Define la línea del iterador de píxeles.

### Parámetros

     row







### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

### Ejemplos

    **Ejemplo #1 Ejemplo con ImagickPixelIterator::setIteratorRow()**

&lt;?php
function setIteratorRow($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
$imageIterator = $imagick-&gt;getPixelRegionIterator(200, 100, 200, 200);

    for ($x = 0; $x &lt; 20; $x++) {
        $imageIterator-&gt;setIteratorRow($x * 5);
        $pixels = $imageIterator-&gt;getCurrentIteratorRow();
        /* Se recorren los píxeles de la línea (columna) */
        foreach ($pixels as $pixel) {
            /** @var $pixel \ImagickPixel */
            /* Se tiñen todos los píxeles en negro */
            $pixel-&gt;setColor("rgba(0, 0, 0, 0)");
        }

        /* Se sincroniza el iterador; esto es importante en cada iteración */
        $imageIterator-&gt;syncIterator();
    }

    header("Content-Type: image/jpg");
    echo $imagick;

}

?&gt;

# ImagickPixelIterator::syncIterator

(PECL imagick 2, PECL imagick 3)

ImagickPixelIterator::syncIterator — Sincroniza el iterador de píxeles

### Descripción

public **ImagickPixelIterator::syncIterator**(): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

Sincroniza el iterador de píxeles.

### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito.

## Tabla de contenidos

- [ImagickPixelIterator::clear](#imagickpixeliterator.clear) — Elimina todos los recursos asociados a PixelIterator
- [ImagickPixelIterator::\_\_construct](#imagickpixeliterator.construct) — El constructor de la clase ImagickPixelIterator
- [ImagickPixelIterator::destroy](#imagickpixeliterator.destroy) — Libera los recursos asociados a PixelIterator
- [ImagickPixelIterator::getCurrentIteratorRow](#imagickpixeliterator.getcurrentiteratorrow) — Devuelve la fila actual de los objetos ImagickPixel
- [ImagickPixelIterator::getIteratorRow](#imagickpixeliterator.getiteratorrow) — Devuelve la fila actual del iterador de píxeles
- [ImagickPixelIterator::getNextIteratorRow](#imagickpixeliterator.getnextiteratorrow) — Devuelve la siguiente línea del iterador de píxeles
- [ImagickPixelIterator::getPreviousIteratorRow](#imagickpixeliterator.getpreviousiteratorrow) — Devuelve la línea anterior
- [ImagickPixelIterator::newPixelIterator](#imagickpixeliterator.newpixeliterator) — Devuelve un nuevo píxel del iterador
- [ImagickPixelIterator::newPixelRegionIterator](#imagickpixeliterator.newpixelregioniterator) — Devuelve un nuevo iterador de píxeles
- [ImagickPixelIterator::resetIterator](#imagickpixeliterator.resetiterator) — Reinicia el iterador de píxeles
- [ImagickPixelIterator::setIteratorFirstRow](#imagickpixeliterator.setiteratorfirstrow) — Establece el iterador de píxeles en la primera línea de píxeles
- [ImagickPixelIterator::setIteratorLastRow](#imagickpixeliterator.setiteratorlastrow) — Define el iterador de píxeles en la última línea de píxeles
- [ImagickPixelIterator::setIteratorRow](#imagickpixeliterator.setiteratorrow) — Define la línea del iterador de píxeles
- [ImagickPixelIterator::syncIterator](#imagickpixeliterator.synciterator) — Sincroniza el iterador de píxeles

# La clase ImagickPixelIteratorException

(PECL imagick 3)

## Introducción

## Sinopsis de la Clase

     ****




      class **ImagickPixelIteratorException**



      extends
       [Exception](#class.exception)


     implements
       [Throwable](#class.throwable) {
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


    /* Métodos heredados */

}

- [Introducción](#intro.imagick)
- [Instalación/Configuración](#imagick.setup)<li>[Requerimientos](#imagick.requirements)
- [Instalación](#imagick.installation)
- [Configuración en tiempo de ejecución](#imagick.configuration)
  </li>- [Constantes predefinidas](#imagick.constants)
- [Ejemplos](#imagick.examples)<li>[Uso básico](#imagick.examples-1)
  </li>- [Imagick](#class.imagick) — La classe Imagick<li>[Imagick::adaptiveBlurImage](#imagick.adaptiveblurimage) — Añade un filtro de borrosidad adaptativo a la imagen
- [Imagick::adaptiveResizeImage](#imagick.adaptiveresizeimage) — Redimensiona una imagen adaptativamente con información dependiente de la triangulación
- [Imagick::adaptiveSharpenImage](#imagick.adaptivesharpenimage) — Afila la imagen adaptativamente
- [Imagick::adaptiveThresholdImage](#imagick.adaptivethresholdimage) — Selecciona un umbral para cada píxel basado en un rango de intensidad
- [Imagick::addImage](#imagick.addimage) — Añade una nueva imagen a la lista de imágenes del objeto Imagick
- [Imagick::addNoiseImage](#imagick.addnoiseimage) — Añade ruido aleatorio a la imagen
- [Imagick::affineTransformImage](#imagick.affinetransformimage) — Transforma una imagen
- [Imagick::animateImages](#imagick.animateimages) — Anima una imagen o imágenes
- [Imagick::annotateImage](#imagick.annotateimage) — Anota una imagen con texto
- [Imagick::appendImages](#imagick.appendimages) — Añade un conjunto de imágenes
- [Imagick::autoLevelImage](#imagick.autolevelimage) — Ajusta el nivel de un canal de una imagen particular
- [Imagick::averageImages](#imagick.averageimages) — Promedio de un conjunto de imágenes
- [Imagick::blackThresholdImage](#imagick.blackthresholdimage) — Fuerza a todos los píxeles bajo un umbral a ser negros
- [Imagick::blueShiftImage](#imagick.blueshiftimage) — Atenúa los colores de la imagen
- [Imagick::blurImage](#imagick.blurimage) — Añade un filtro de borrosidad a la imagen
- [Imagick::borderImage](#imagick.borderimage) — Rodea la imagen con un borde
- [Imagick::brightnessContrastImage](#imagick.brightnesscontrastimage) — Cambia el brillo y/o el contraste de una imagen
- [Imagick::charcoalImage](#imagick.charcoalimage) — Simula un dibujo a carboncillo
- [Imagick::chopImage](#imagick.chopimage) — Borra una región de una imagen y la recorta
- [Imagick::clampImage](#imagick.clampimage) — Restringe el rango de colores de 0 a la profundidad cuántica
- [Imagick::clear](#imagick.clear) — Libera todos los recursos asociados a un objeto Imagick
- [Imagick::clipImage](#imagick.clipimage) — Se alinea con el primer camino de un perfil 8BIM
- [Imagick::clipImagePath](#imagick.clipimagepath) — Recorta a lo largo de las rutas nombradas del perfil 8BIM, si está presente
- [Imagick::clipPathImage](#imagick.clippathimage) — Recorta a lo largo de trazados nominados desde un perfil 8BIM
- [Imagick::clone](#imagick.clone) — Realiza una copia exacta de un objeto Imagick
- [Imagick::clutImage](#imagick.clutimage) — Reemplaza los colores de una imagen
- [Imagick::coalesceImages](#imagick.coalesceimages) — Componer un conjunto de imágenes
- [Imagick::colorFloodfillImage](#imagick.colorfloodfillimage) — Cambia el valor del color de cualquier píxel que coincida con el objetivo
- [Imagick::colorizeImage](#imagick.colorizeimage) — Mezcla el color de relleno con la imagen
- [Imagick::colorMatrixImage](#imagick.colormatriximage) — Aplica una transformación de color a una imagen
- [Imagick::combineImages](#imagick.combineimages) — Combina una o más imágenes en una sóla imagen
- [Imagick::commentImage](#imagick.commentimage) — Añade un comentario a la imagen
- [Imagick::compareImageChannels](#imagick.compareimagechannels) — Devuelve la diferencia entre una o más imágenes
- [Imagick::compareImageLayers](#imagick.compareimagelayers) — Devuelve la región circundante máxima entre imágenes
- [Imagick::compareImages](#imagick.compareimages) — Compara una imagen con otra reconstruida
- [Imagick::compositeImage](#imagick.compositeimage) — Compone una imagen en otra
- [Imagick::\_\_construct](#imagick.construct) — El constructor Imagick
- [Imagick::contrastImage](#imagick.contrastimage) — Cambia el contraste de una imagen
- [Imagick::contrastStretchImage](#imagick.contraststretchimage) — Mejora el contraste de una imagen en color
- [Imagick::convolveImage](#imagick.convolveimage) — Aplica una semilla de convolución a medida a la imagen
- [Imagick::count](#imagick.count) — Devuelve el número de imágenes
- [Imagick::cropImage](#imagick.cropimage) — Extrae una región de la imagen
- [Imagick::cropThumbnailImage](#imagick.cropthumbnailimage) — Crea una miniatura recortada
- [Imagick::current](#imagick.current) — Devuelve una referencia al objeto Imagick actual
- [Imagick::cycleColormapImage](#imagick.cyclecolormapimage) — Desplaza el mapa de colores de una imagen
- [Imagick::decipherImage](#imagick.decipherimage) — Descifra una imagen
- [Imagick::deconstructImages](#imagick.deconstructimages) — Devuelve las diferencias de ciertos píxeles entre dos imágenes
- [Imagick::deleteImageArtifact](#imagick.deleteimageartifact) — Borra un artefacto de imagen
- [Imagick::deleteImageProperty](#imagick.deleteimageproperty) — Elimina una propiedad de imagen
- [Imagick::deskewImage](#imagick.deskewimage) — Elimina la torción de la imagen
- [Imagick::despeckleImage](#imagick.despeckleimage) — Reduce el ruido speckle de una imagen
- [Imagick::destroy](#imagick.destroy) — Destruye un objeto Imagick
- [Imagick::displayImage](#imagick.displayimage) — Muestra una imagen
- [Imagick::displayImages](#imagick.displayimages) — Muestra una imagen o una secuencia de imágenes
- [Imagick::distortImage](#imagick.distortimage) — Deforma una imagen utilizando varios métodos de distorsión
- [Imagick::drawImage](#imagick.drawimage) — Renderiza el objeto ImagickDraw a la imagen actual
- [Imagick::edgeImage](#imagick.edgeimage) — Mejora los bordes de la imagen
- [Imagick::embossImage](#imagick.embossimage) — Devuelve una imagen en escala de grises con un efecto tridimensional
- [Imagick::encipherImage](#imagick.encipherimage) — Cifra una imagen
- [Imagick::enhanceImage](#imagick.enhanceimage) — Mejora la calidad de una imagen ruidosa
- [Imagick::equalizeImage](#imagick.equalizeimage) — Iguala el histograma de una imagen
- [Imagick::evaluateImage](#imagick.evaluateimage) — Aplica una expresión a una imagen
- [Imagick::exportImagePixels](#imagick.exportimagepixels) — Exporta los píxeles brutos de la imagen
- [Imagick::extentImage](#imagick.extentimage) — Establecer el tamaño de la imagen
- [Imagick::filter](#imagick.filter) — Aplica un núcleo de convolución personalizado a la imagen
- [Imagick::flattenImages](#imagick.flattenimages) — Fusiona una secuencia de imágenes
- [Imagick::flipImage](#imagick.flipimage) — Crea una imagen por espejo vertical
- [Imagick::floodFillPaintImage](#imagick.floodfillpaintimage) — Cambia el valor del color de cualquier píxel que coincida con el objetivo
- [Imagick::flopImage](#imagick.flopimage) — Crea una imagen por espejo horizontal
- [Imagick::forwardFourierTransformImage](#imagick.forwardfouriertransformimage) — Implementa la transformada discreta de Fourier (Discrete Fourier Transform - DFT)
- [Imagick::frameImage](#imagick.frameimage) — Añade un borde tridimensional simulado
- [Imagick::functionImage](#imagick.functionimage) — Aplica una función sobre la imagen
- [Imagick::fxImage](#imagick.fximage) — Evalúa una expresión por cada píxel de la imagen
- [Imagick::gammaImage](#imagick.gammaimage) — Corrección gamma de una imagen
- [Imagick::gaussianBlurImage](#imagick.gaussianblurimage) — Hace borrosa una imagen
- [Imagick::getColorspace](#imagick.getcolorspace) — Obtiene el espacio de colores
- [Imagick::getCompression](#imagick.getcompression) — Lee el tipo de compresión
- [Imagick::getCompressionQuality](#imagick.getcompressionquality) — Lee la calidad de la compresión
- [Imagick::getCopyright](#imagick.getcopyright) — Devuelve el copyright de la API ImageMagick
- [Imagick::getFilename](#imagick.getfilename) — Lee el nombre del fichero asociado a una secuencia
- [Imagick::getFont](#imagick.getfont) — Obtiene la fuente de caracteres
- [Imagick::getFormat](#imagick.getformat) — Devuelve el formato de la imagen Imagick
- [Imagick::getGravity](#imagick.getgravity) — Obtiene la gravedad
- [Imagick::getHomeURL](#imagick.gethomeurl) — Devuelve la URL de ImageMagick
- [Imagick::getImage](#imagick.getimage) — Devuelve un nuevo objeto Imagick
- [Imagick::getImageAlphaChannel](#imagick.getimagealphachannel) — Verifica si la imagen tiene un canal alfa
- [Imagick::getImageArtifact](#imagick.getimageartifact) — Obtener el artefacto de imagen
- [Imagick::getImageAttribute](#imagick.getimageattribute) — Obtiene un atributo nombrado
- [Imagick::getImageBackgroundColor](#imagick.getimagebackgroundcolor) — Devuelve el color de fondo
- [Imagick::getImageBlob](#imagick.getimageblob) — Devuelve la secuencia de imágenes como un blob
- [Imagick::getImageBluePrimary](#imagick.getimageblueprimary) — Devuelve el punto primario azul de la cromaticidad
- [Imagick::getImageBorderColor](#imagick.getimagebordercolor) — Devuelve el color del borde de la imagen
- [Imagick::getImageChannelDepth](#imagick.getimagechanneldepth) — Obtiene la profundidad de un canal de imagen en particular
- [Imagick::getImageChannelDistortion](#imagick.getimagechanneldistortion) — Compara los canales de imagen de una imagen con una imagen reconstruida
- [Imagick::getImageChannelDistortions](#imagick.getimagechanneldistortions) — Obtiene las distorsiones de un canal
- [Imagick::getImageChannelExtrema](#imagick.getimagechannelextrema) — Obtiene los extremos de uno o más canales de imagen
- [Imagick::getImageChannelKurtosis](#imagick.getimagechannelkurtosis) — Obtiene la curtosis y la asimetría estadística de un canal específico
- [Imagick::getImageChannelMean](#imagick.getimagechannelmean) — Obtiene la media y la desviación estándar
- [Imagick::getImageChannelRange](#imagick.getimagechannelrange) — Obtiene el rango del canal
- [Imagick::getImageChannelStatistics](#imagick.getimagechannelstatistics) — Devuelve estadísticas sobre cada canal de la imagen
- [Imagick::getImageClipMask](#imagick.getimageclipmask) — Obtiene la máscara de recorte de la imagen
- [Imagick::getImageColormapColor](#imagick.getimagecolormapcolor) — Devuelve el color del índice del mapa de colores especficado
- [Imagick::getImageColors](#imagick.getimagecolors) — Lee el número de colores únicos de la imagen
- [Imagick::getImageColorspace](#imagick.getimagecolorspace) — Obtiene el espacio de colores de la imagen
- [Imagick::getImageCompose](#imagick.getimagecompose) — Devuelve el operador de composición asociado a una imagen
- [Imagick::getImageCompression](#imagick.getimagecompression) — Lee el tipo de compresión de la imagen
- [Imagick::getImageCompressionQuality](#imagick.getimagecompressionquality) — Lee la calidad de compresión de la imagen
- [Imagick::getImageDelay](#imagick.getimagedelay) — Lee el retraso de la imagen
- [Imagick::getImageDepth](#imagick.getimagedepth) — Se lee la profundidad de la imagen
- [Imagick::getImageDispose](#imagick.getimagedispose) — Lee el método de recuperación
- [Imagick::getImageDistortion](#imagick.getimagedistortion) — Compara una imagen con una imagen reconstruida
- [Imagick::getImageExtrema](#imagick.getimageextrema) — Lee los extremos de una imagen
- [Imagick::getImageFilename](#imagick.getimagefilename) — Devuelve el nombre de un fichero para una imagen en una secuencia
- [Imagick::getImageFormat](#imagick.getimageformat) — Devuelve el formato de una imagen en una secuencia
- [Imagick::getImageGamma](#imagick.getimagegamma) — Obtiene el gamma de la imagen
- [Imagick::getImageGeometry](#imagick.getimagegeometry) — Lee las dimensiones de la imagen en un array
- [Imagick::getImageGravity](#imagick.getimagegravity) — Obtiene la gravedad de la imagen
- [Imagick::getImageGreenPrimary](#imagick.getimagegreenprimary) — Devuelve la cromaticidad del color verde
- [Imagick::getImageHeight](#imagick.getimageheight) — Devuelve la altura de la imagen
- [Imagick::getImageHistogram](#imagick.getimagehistogram) — Devuelve el histograma de la imagen
- [Imagick::getImageIndex](#imagick.getimageindex) — Obtiene el índice de la imagen actual
- [Imagick::getImageInterlaceScheme](#imagick.getimageinterlacescheme) — Se lee el esquema de entrelazado de la imagen
- [Imagick::getImageInterpolateMethod](#imagick.getimageinterpolatemethod) — Devuelve el método de interpolación
- [Imagick::getImageIterations](#imagick.getimageiterations) — Obtiene las iteraciones de la imagen
- [Imagick::getImageLength](#imagick.getimagelength) — Devuelve el tamaño de la imagen en bytes
- [Imagick::getImageMatte](#imagick.getimagematte) — Indica si la imagen tiene un canal mat
- [Imagick::getImageMatteColor](#imagick.getimagemattecolor) — Devuelve el color mate de la imagen
- [Imagick::getImageMimeType](#imagick.getimagemimetype) — Devuelve el tipo MIME de la imagen
- [Imagick::getImageOrientation](#imagick.getimageorientation) — Lee la orientación de la imagen
- [Imagick::getImagePage](#imagick.getimagepage) — Devuelve la geometría de la página
- [Imagick::getImagePixelColor](#imagick.getimagepixelcolor) — Devuelve el color del píxel especificado
- [Imagick::getImageProfile](#imagick.getimageprofile) — Devuelve el perfil nominado de la imagen
- [Imagick::getImageProfiles](#imagick.getimageprofiles) — Devuelve los perfiles de la imagen
- [Imagick::getImageProperties](#imagick.getimageproperties) — Devuelve las propiedades EXIF de la imagen
- [Imagick::getImageProperty](#imagick.getimageproperty) — Devuelve una propiedad de una imagen
- [Imagick::getImageRedPrimary](#imagick.getimageredprimary) — Devuelve la cromaticidad del punto rojo
- [Imagick::getImageRegion](#imagick.getimageregion) — Extrae una región de la imagen
- [Imagick::getImageRenderingIntent](#imagick.getimagerenderingintent) — Lee el método de renderizado de la imagen
- [Imagick::getImageResolution](#imagick.getimageresolution) — Lee las resoluciones en X y Y de una imagen
- [Imagick::getImagesBlob](#imagick.getimagesblob) — Devuelve todas las imágenes de la secuencia en un BLOB
- [Imagick::getImageScene](#imagick.getimagescene) — Devuelve la escena de la imagen
- [Imagick::getImageSignature](#imagick.getimagesignature) — Genera una firma SHA-256
- [Imagick::getImageSize](#imagick.getimagesize) — Devuelve el tamaño de la imagen en bytes
- [Imagick::getImageTicksPerSecond](#imagick.getimagetickspersecond) — Se leen los ticks-por-segundo de la imagen
- [Imagick::getImageTotalInkDensity](#imagick.getimagetotalinkdensity) — Lee la densidad total de tinta de la imagen
- [Imagick::getImageType](#imagick.getimagetype) — Obtiene el tipo posible de imagen
- [Imagick::getImageUnits](#imagick.getimageunits) — Devuelve las unidades de resolución de la imagen
- [Imagick::getImageVirtualPixelMethod](#imagick.getimagevirtualpixelmethod) — Devuelve el método del píxel virtual
- [Imagick::getImageWhitePoint](#imagick.getimagewhitepoint) — Devuelve la cromaticidad del punto blanco
- [Imagick::getImageWidth](#imagick.getimagewidth) — Devuelve el ancho de la imagen
- [Imagick::getInterlaceScheme](#imagick.getinterlacescheme) — Lee el esquema de entrelazado del objeto
- [Imagick::getIteratorIndex](#imagick.getiteratorindex) — Lee el índice de la imagen activa actual
- [Imagick::getNumberImages](#imagick.getnumberimages) — Devuelve el número de imágenes de un objeto
- [Imagick::getOption](#imagick.getoption) — Devuelve un valor asociado con la clave especificada
- [Imagick::getPackageName](#imagick.getpackagename) — Devuelve el nombre del paquete ImageMagick
- [Imagick::getPage](#imagick.getpage) — Devuelve la geometría de la página
- [Imagick::getPixelIterator](#imagick.getpixeliterator) — Devuelve un MagickPixelIterator
- [Imagick::getPixelRegionIterator](#imagick.getpixelregioniterator) — Obtinene un objeto ImagickPixelIterator de una sección de imagen
- [Imagick::getPointSize](#imagick.getpointsize) — Obtiene el tamaño del punto
- [Imagick::getQuantum](#imagick.getquantum) — Devuelve el espacio cuántico de ImageMagick
- [Imagick::getQuantumDepth](#imagick.getquantumdepth) — Lee la profundidad cuántica
- [Imagick::getQuantumRange](#imagick.getquantumrange) — Devuelve el intervalo cuántico de Imagick
- [Imagick::getRegistry](#imagick.getregistry) — Obtiene un elemento de StringRegistry
- [Imagick::getReleaseDate](#imagick.getreleasedate) — Devuelve la fecha de publicación de ImageMagick
- [Imagick::getResource](#imagick.getresource) — Devuelve el consumo de memoria de la recurso
- [Imagick::getResourceLimit](#imagick.getresourcelimit) — Devuelve el límite de la recurso
- [Imagick::getSamplingFactors](#imagick.getsamplingfactors) — Lee el factor de muestreo horizontal y vertical
- [Imagick::getSize](#imagick.getsize) — Retorna el tamaño asociado con un objeto Imagick
- [Imagick::getSizeOffset](#imagick.getsizeoffset) — Devuelve el tamaño de la posición
- [Imagick::getVersion](#imagick.getversion) — Devuelve la API de ImageMagick
- [Imagick::haldClutImage](#imagick.haldclutimage) — Reemplaza los colores de la imagen
- [Imagick::hasNextImage](#imagick.hasnextimage) — Verifica si un objeto tiene una imagen siguiente
- [Imagick::hasPreviousImage](#imagick.haspreviousimage) — Verifica si un objeto tiene una imagen anterior
- [Imagick::identifyFormat](#imagick.identifyformat) — Formatea un string con los detalles de la imagen
- [Imagick::identifyImage](#imagick.identifyimage) — Identifica una imagen y obtiene sus atributos
- [Imagick::implodeImage](#imagick.implodeimage) — Crea una nueva imagen como una copia
- [Imagick::importImagePixels](#imagick.importimagepixels) — Importa los píxeles de una imagen
- [Imagick::inverseFourierTransformImage](#imagick.inversefouriertransformimage) — Implementa la transformada inversa de Fourier discreta (Discrete Fourier Transform - DFT)
- [Imagick::labelImage](#imagick.labelimage) — Añade una etiqueta a una imagen
- [Imagick::levelImage](#imagick.levelimage) — Ajusta los niveles de la imagen
- [Imagick::linearStretchImage](#imagick.linearstretchimage) — Estrecha con saturación la intensidad de la imagen
- [Imagick::liquidRescaleImage](#imagick.liquidrescaleimage) — Anima una imagen o imágenes
- [Imagick::listRegistry](#imagick.listregistry) — Lista todos los parámetros del registro
- [Imagick::magnifyImage](#imagick.magnifyimage) — Duplica el tamaño de una imagen, proporcionalmente
- [Imagick::mapImage](#imagick.mapimage) — Reemplaza los colores de una imagen con el color más cercano de una imagen de referencia
- [Imagick::matteFloodfillImage](#imagick.mattefloodfillimage) — Cambia el valor de transparencia de un color
- [Imagick::medianFilterImage](#imagick.medianfilterimage) — Aplica un filtro digital
- [Imagick::mergeImageLayers](#imagick.mergeimagelayers) — Fusiona las capas de la imagen
- [Imagick::minifyImage](#imagick.minifyimage) — Redimensiona una imagen proporcionalmente para reducirla a la mitad de tamaño
- [Imagick::modulateImage](#imagick.modulateimage) — Controla el brillo, la saturación y el tono
- [Imagick::montageImage](#imagick.montageimage) — Crea una imagen compuesta
- [Imagick::morphImages](#imagick.morphimages) — Metamorfosea un conjunto de imágenes
- [Imagick::morphology](#imagick.morphology) — Aplica un núcleo personalizado a la imagen según el método de morfología dado
- [Imagick::mosaicImages](#imagick.mosaicimages) — Forma una mosaico de imágenes
- [Imagick::motionBlurImage](#imagick.motionblurimage) — Simula borrosidad en movimiento
- [Imagick::negateImage](#imagick.negateimage) — Invierte los colores en la imagen de referencia
- [Imagick::newImage](#imagick.newimage) — Crea una nueva imagen
- [Imagick::newPseudoImage](#imagick.newpseudoimage) — Crea una nueva imagen
- [Imagick::nextImage](#imagick.nextimage) — Pasa a la siguiente imagen
- [Imagick::normalizeImage](#imagick.normalizeimage) — Mejora el contraste de una imagen a color
- [Imagick::oilPaintImage](#imagick.oilpaintimage) — Simula una pintura al óleo
- [Imagick::opaquePaintImage](#imagick.opaquepaintimage) — Cambia el color de cualquier píxel que coincida con el objetivo
- [Imagick::optimizeImageLayers](#imagick.optimizeimagelayers) — Elimina las porciones recurrentes de imágenes a optimizar
- [Imagick::orderedPosterizeImage](#imagick.orderedposterizeimage) — Realiza un entramado ordenado
- [Imagick::paintFloodfillImage](#imagick.paintfloodfillimage) — Cambia el valor del color de cualquier píxel que coincida con el objetivo
- [Imagick::paintOpaqueImage](#imagick.paintopaqueimage) — Cambia cualquier píxel que coincida con el color
- [Imagick::paintTransparentImage](#imagick.painttransparentimage) — Cambia cualquier píxel que coincida con el color definido para el relleno
- [Imagick::pingImage](#imagick.pingimage) — Trae los atributos básicos de una imagen
- [Imagick::pingImageBlob](#imagick.pingimageblob) — Traer los atributos rápidamente
- [Imagick::pingImageFile](#imagick.pingimagefile) — Obtener los atrbutos básicos de la imagen de una manera liviana
- [Imagick::polaroidImage](#imagick.polaroidimage) — Simula una fotografía Polaroid
- [Imagick::posterizeImage](#imagick.posterizeimage) — Reduce la imagen a un número limitado de niveles de color
- [Imagick::previewImages](#imagick.previewimages) — Precisa rápidamente los parámetros apropiados para el procesamiento de la imagen
- [Imagick::previousImage](#imagick.previousimage) — Pasa a la imagen anterior en una secuencia de imágenes
- [Imagick::profileImage](#imagick.profileimage) — Añade o elimina un perfil de una imagen
- [Imagick::quantizeImage](#imagick.quantizeimage) — Analiza los colores dentro de una imagen de referencia
- [Imagick::quantizeImages](#imagick.quantizeimages) — Analiza los colores dentro de una secuencia de imágenes
- [Imagick::queryFontMetrics](#imagick.queryfontmetrics) — Devuelve una matriz que representa las métricas de la fuente
- [Imagick::queryFonts](#imagick.queryfonts) — Devuelve la lista de fuentes configuradas
- [Imagick::queryFormats](#imagick.queryformats) — Devuelve los formatos soportados por Imagick
- [Imagick::radialBlurImage](#imagick.radialblurimage) — Hace borrosa de forma radial una imagen
- [Imagick::raiseImage](#imagick.raiseimage) — Crea un efecto de botón en 3D simulado
- [Imagick::randomThresholdImage](#imagick.randomthresholdimage) — Crea una imagen de alto contraste y dos colores
- [Imagick::readImage](#imagick.readimage) — Lee una imagen desde un nombre de fichero
- [Imagick::readImageBlob](#imagick.readimageblob) — Lee una imagen desde un string binario
- [Imagick::readImageFile](#imagick.readimagefile) — Lee una imagen desde un gestor de fichero abierto
- [Imagick::readImages](#imagick.readimages) — Lee una imagen a partir de un array de nombres de ficheros
- [Imagick::recolorImage](#imagick.recolorimage) — Recolorear la imagen
- [Imagick::reduceNoiseImage](#imagick.reducenoiseimage) — Suaviza los contornos de una imagen
- [Imagick::remapImage](#imagick.remapimage) — Re-mapea los colores de una imagen
- [Imagick::removeImage](#imagick.removeimage) — Elimina una imagen de la lista
- [Imagick::removeImageProfile](#imagick.removeimageprofile) — Elimina el perfil nominado de la imagen y lo devuelve
- [Imagick::render](#imagick.render) — Muestra todas las comandos de dibujo previas
- [Imagick::resampleImage](#imagick.resampleimage) — Remuestrea la imagen a la resolución deseada
- [Imagick::resetImagePage](#imagick.resetimagepage) — Reinicia una página de imagen
- [Imagick::resizeImage](#imagick.resizeimage) — Escala una imagen
- [Imagick::rollImage](#imagick.rollimage) — Compensa una imagen
- [Imagick::rotateImage](#imagick.rotateimage) — Rota una imagen
- [Imagick::rotationalBlurImage](#imagick.rotationalblurimage) — Aplica un desenfoque rotacional a una imagen
- [Imagick::roundCorners](#imagick.roundcorners) — Redondea las esquinas de una imagen
- [Imagick::sampleImage](#imagick.sampleimage) — Escala una imagen con un muestreo de píxeles
- [Imagick::scaleImage](#imagick.scaleimage) — Redimensiona la imagen a una escala específica
- [Imagick::segmentImage](#imagick.segmentimage) — Segmenta una imagen
- [Imagick::selectiveBlurImage](#imagick.selectiveblurimage) — Desenfoca selectivamente una imagen dentro de un umbral de contraste
- [Imagick::separateImageChannel](#imagick.separateimagechannel) — Separa un canal de la imagen
- [Imagick::sepiaToneImage](#imagick.sepiatoneimage) — Pone una imagen en tono sepia
- [Imagick::setBackgroundColor](#imagick.setbackgroundcolor) — Establece el color de fondo por omisión del objeto
- [Imagick::setColorspace](#imagick.setcolorspace) — Establecer el espacio de color
- [Imagick::setCompression](#imagick.setcompression) — Configura el tipo de compresión del objeto
- [Imagick::setCompressionQuality](#imagick.setcompressionquality) — Configura la compresión por defecto del objeto
- [Imagick::setFilename](#imagick.setfilename) — Establece el nombre de archivo antes de que se lea o escriba una imagen
- [Imagick::setFirstIterator](#imagick.setfirstiterator) — Coloca el iterador de Imagick en la primera imagen
- [Imagick::setFont](#imagick.setfont) — Configura la fuente
- [Imagick::setFormat](#imagick.setformat) — Establece el formato del objeto Imagick
- [Imagick::setGravity](#imagick.setgravity) — Establece la gravedad
- [Imagick::setImage](#imagick.setimage) — Reemplaza una imagen en el objeto
- [Imagick::setImageAlphaChannel](#imagick.setimagealphachannel) — Define el canal alfa de la imagen
- [Imagick::setImageArtifact](#imagick.setimageartifact) — Define el artefacto de la imagen
- [Imagick::setImageAttribute](#imagick.setimageattribute) — Define un atributo de imagen
- [Imagick::setImageBackgroundColor](#imagick.setimagebackgroundcolor) — Establece el color de fondo de la imagen
- [Imagick::setImageBias](#imagick.setimagebias) — Establece el sesgo de la imagen para cualquier método que convolucione una imagen
- [Imagick::setImageBiasQuantum](#imagick.setimagebiasquantum) — Establece el sesgo de la imagen
- [Imagick::setImageBluePrimary](#imagick.setimageblueprimary) — Establece el punto primario azul de la cromaticidad de la imagen
- [Imagick::setImageBorderColor](#imagick.setimagebordercolor) — Establece el color de borde de la imagen
- [Imagick::setImageChannelDepth](#imagick.setimagechanneldepth) — Establece la profundidad de una canal de imagen en particular
- [Imagick::setImageClipMask](#imagick.setimageclipmask) — Establece la máscara de recorte de una imagen
- [Imagick::setImageColormapColor](#imagick.setimagecolormapcolor) — Establece el color de un índice de mapa de color especificado
- [Imagick::setImageColorspace](#imagick.setimagecolorspace) — Establece el espacio de color de una imagen
- [Imagick::setImageCompose](#imagick.setimagecompose) — Establece el operador de composción de una imagen
- [Imagick::setImageCompression](#imagick.setimagecompression) — Establece la compresión de una imagen
- [Imagick::setImageCompressionQuality](#imagick.setimagecompressionquality) — Establece la calidad de compresión de una imagen
- [Imagick::setImageDelay](#imagick.setimagedelay) — Establece el retardo de una imagen
- [Imagick::setImageDepth](#imagick.setimagedepth) — Establece la profundidad de una imagen
- [Imagick::setImageDispose](#imagick.setimagedispose) — Establece el método de disposición de una imagen
- [Imagick::setImageExtent](#imagick.setimageextent) — Establece el tamaño de una imagen
- [Imagick::setImageFilename](#imagick.setimagefilename) — Establece el nombre de archivo de una imagen en particular
- [Imagick::setImageFormat](#imagick.setimageformat) — Establece el formato de una imagen en particular
- [Imagick::setImageGamma](#imagick.setimagegamma) — Establece el valor gamma de la imagen
- [Imagick::setImageGravity](#imagick.setimagegravity) — Establece la gravedad de la imagen
- [Imagick::setImageGreenPrimary](#imagick.setimagegreenprimary) — Establece el punto primario verde de la cromaticidad de la imagen
- [Imagick::setImageIndex](#imagick.setimageindex) — Establece la posición del iterador
- [Imagick::setImageInterlaceScheme](#imagick.setimageinterlacescheme) — Establece la compresión de la imagen
- [Imagick::setImageInterpolateMethod](#imagick.setimageinterpolatemethod) — Configura el método de interpolación de la imagen
- [Imagick::setImageIterations](#imagick.setimageiterations) — Establece las iteraciones de una imagen
- [Imagick::setImageMatte](#imagick.setimagematte) — Establece el canal mate de la imagen
- [Imagick::setImageMatteColor](#imagick.setimagemattecolor) — Establece el color mate de la imagen
- [Imagick::setImageOpacity](#imagick.setimageopacity) — Establece el nivel de opacidad de la imagen
- [Imagick::setImageOrientation](#imagick.setimageorientation) — Establece la orientación de la imagen
- [Imagick::setImagePage](#imagick.setimagepage) — Establece la geometría de la página de la imagen
- [Imagick::setImageProfile](#imagick.setimageprofile) — Añade un perfil nominado al objeto Imagick
- [Imagick::setImageProperty](#imagick.setimageproperty) — Configura una propiedad de imagen
- [Imagick::setImageRedPrimary](#imagick.setimageredprimary) — Establece el punto primario rojo de la cromaticidad de la imagen
- [Imagick::setImageRenderingIntent](#imagick.setimagerenderingintent) — Establece el propósito de renderización de la imagen
- [Imagick::setImageResolution](#imagick.setimageresolution) — Establece la resolución de la imagen
- [Imagick::setImageScene](#imagick.setimagescene) — Establece la escena de la imagen
- [Imagick::setImageTicksPerSecond](#imagick.setimagetickspersecond) — Establece los ticks por segundo de la imagen
- [Imagick::setImageType](#imagick.setimagetype) — Establece el tipo de imagen
- [Imagick::setImageUnits](#imagick.setimageunits) — Establece las unidades de resolución de la imagen
- [Imagick::setImageVirtualPixelMethod](#imagick.setimagevirtualpixelmethod) — Establece el método de píxel virtual de la imagen
- [Imagick::setImageWhitePoint](#imagick.setimagewhitepoint) — Establece el punto blanco de cromaticidad de la imagen
- [Imagick::setInterlaceScheme](#imagick.setinterlacescheme) — Establece la compresión de la imagen
- [Imagick::setIteratorIndex](#imagick.setiteratorindex) — Establece la posición del iterador
- [Imagick::setLastIterator](#imagick.setlastiterator) — Posiciona el iterador Imagick en la última imagen
- [Imagick::setOption](#imagick.setoption) — Configura una opción de un objeto Imagick
- [Imagick::setPage](#imagick.setpage) — Establece la geometría de página del objeto Imagick
- [Imagick::setPointSize](#imagick.setpointsize) — Define la medida del punto
- [Imagick::setProgressMonitor](#imagick.setprogressmonitor) — Define una función de retrollamada a ser llamada durante el procesamiento
- [Imagick::setRegistry](#imagick.setregistry) — Define la entrada del registro ImageMagick nombrada clave para valor
- [Imagick::setResolution](#imagick.setresolution) — Establece la resolución de la imagen
- [Imagick::setResourceLimit](#imagick.setresourcelimit) — Define la limitación para una recurso particular
- [Imagick::setSamplingFactors](#imagick.setsamplingfactors) — Establece los factores de muestreo de la imagen
- [Imagick::setSize](#imagick.setsize) — Establece el tamaño del objeto Imagick
- [Imagick::setSizeOffset](#imagick.setsizeoffset) — Establece el tamaño y el índice del objeto Imagick
- [Imagick::setType](#imagick.settype) — Establece el atributo tipo de imagen
- [Imagick::shadeImage](#imagick.shadeimage) — Crea un efecto en 3D
- [Imagick::shadowImage](#imagick.shadowimage) — Simula una sombra de imagen
- [Imagick::sharpenImage](#imagick.sharpenimage) — Afila una imagen
- [Imagick::shaveImage](#imagick.shaveimage) — Recorta píxeles de los extremos de la imagen
- [Imagick::shearImage](#imagick.shearimage) — Crea un paralelogramo
- [Imagick::sigmoidalContrastImage](#imagick.sigmoidalcontrastimage) — Ajusta el contraste de la imagen
- [Imagick::sketchImage](#imagick.sketchimage) — Simula el bosquejo de un lapiz
- [Imagick::smushImages](#imagick.smushimages) — Toma todas las imágenes del puntero de imagen actual hasta el final de la lista de imágenes y las comprime
- [Imagick::solarizeImage](#imagick.solarizeimage) — Aplica un efecto de solarización a la imagen
- [Imagick::sparseColorImage](#imagick.sparsecolorimage) — Interpola colores
- [Imagick::spliceImage](#imagick.spliceimage) — Une un color sólido en la imagen
- [Imagick::spreadImage](#imagick.spreadimage) — Despalza aleatoriamente cada píxel en un bloque
- [Imagick::statisticImage](#imagick.statisticimage) — Modifica una imagen utilizando una función estadística
- [Imagick::steganoImage](#imagick.steganoimage) — Oculta una marca de agua digital dentro de la imagen
- [Imagick::stereoImage](#imagick.stereoimage) — Compone dos imágenes
- [Imagick::stripImage](#imagick.stripimage) — Elimina de una imagen todos los perfiles y los comentarios
- [Imagick::subImageMatch](#imagick.subimagematch) — Busca una subimagen en la imagen actual y devuelve una imagen de similitud
- [Imagick::swirlImage](#imagick.swirlimage) — Arremolina los píxeles desde el centro de la imagen
- [Imagick::textureImage](#imagick.textureimage) — Repite los mosaicos de la textura de una imagen
- [Imagick::thresholdImage](#imagick.thresholdimage) — Cambia el valor de píexeles individuales basdos en un umbral
- [Imagick::thumbnailImage](#imagick.thumbnailimage) — Modifica el tamaño de una imagen
- [Imagick::tintImage](#imagick.tintimage) — Aplica un vector de color a cada píxel en la imagen
- [Imagick::\_\_toString](#imagick.tostring) — Devuelve la imagen como un string
- [Imagick::transformImage](#imagick.transformimage) — Método conveniente para establecer el tamaño del recorte y la geometría de la imagen
- [Imagick::transformImageColorspace](#imagick.transformimagecolorspace) — Transforma una imagen en un nuevo espacio de color
- [Imagick::transparentPaintImage](#imagick.transparentpaintimage) — Pinta píxeles transparentes
- [Imagick::transposeImage](#imagick.transposeimage) — Aplica una simetría vertical
- [Imagick::transverseImage](#imagick.transverseimage) — Crea un espejo horizontal de la imagen
- [Imagick::trimImage](#imagick.trimimage) — Elimina los extremos de la imagen
- [Imagick::uniqueImageColors](#imagick.uniqueimagecolors) — Se conserva únicamente un color de píxel
- [Imagick::unsharpMaskImage](#imagick.unsharpmaskimage) — Afila una imagen
- [Imagick::valid](#imagick.valid) — Verifica si el elemento actual es válido
- [Imagick::vignetteImage](#imagick.vignetteimage) — Añade un filtro de viñeta a la imagen
- [Imagick::waveImage](#imagick.waveimage) — Añade un filtro de ondas a la imagen
- [Imagick::whiteThresholdImage](#imagick.whitethresholdimage) — Fuerza a todos los píxeles por encima del umbral a ser blancos
- [Imagick::writeImage](#imagick.writeimage) — Escribe una imagen al nombre de fichero especificado
- [Imagick::writeImageFile](#imagick.writeimagefile) — Escribe una imagen en un descriptor de archivo
- [Imagick::writeImages](#imagick.writeimages) — Escribe una imagen o secuencia de imágenes
- [Imagick::writeImagesFile](#imagick.writeimagesfile) — Escribe los frames en un descriptor de ficheros
  </li>- [ImagickDraw](#class.imagickdraw) — La clase ImagickDraw<li>[ImagickDraw::affine](#imagickdraw.affine) — Ajusta la matriz de transformación afín actual
- [ImagickDraw::annotation](#imagickdraw.annotation) — Dibuja un texto sobre una imagen
- [ImagickDraw::arc](#imagickdraw.arc) — Dibuja un arco
- [ImagickDraw::bezier](#imagickdraw.bezier) — Dibuja una curva de Bézier
- [ImagickDraw::circle](#imagickdraw.circle) — Dibuja un círculo
- [ImagickDraw::clear](#imagickdraw.clear) — Borra el objeto ImagickDraw
- [ImagickDraw::clone](#imagickdraw.clone) — Realiza una copia exacta del objeto ImagickDraw
- [ImagickDraw::color](#imagickdraw.color) — Dibuja un color sobre una imagen
- [ImagickDraw::comment](#imagickdraw.comment) — Añade un comentario
- [ImagickDraw::composite](#imagickdraw.composite) — Componer una imagen con otra
- [ImagickDraw::\_\_construct](#imagickdraw.construct) — El constructor ImagickDraw
- [ImagickDraw::destroy](#imagickdraw.destroy) — Libera todos los recursos asociados
- [ImagickDraw::ellipse](#imagickdraw.ellipse) — Dibuja una elipse sobre una imagen
- [ImagickDraw::getClipPath](#imagickdraw.getclippath) — Devuelve el identificador del camino actual
- [ImagickDraw::getClipRule](#imagickdraw.getcliprule) — Devuelve la regla de relleno de un polígono actual
- [ImagickDraw::getClipUnits](#imagickdraw.getclipunits) — Devuelve la interpretación de unidades del trazado de recorte
- [ImagickDraw::getFillColor](#imagickdraw.getfillcolor) — Devuelve el color de relleno
- [ImagickDraw::getFillOpacity](#imagickdraw.getfillopacity) — Devuelve la opacidad de dibujo
- [ImagickDraw::getFillRule](#imagickdraw.getfillrule) — Devuelve la regla de relleno
- [ImagickDraw::getFont](#imagickdraw.getfont) — Devuelve la fuente
- [ImagickDraw::getFontFamily](#imagickdraw.getfontfamily) — Devuelve la familia de fuentes
- [ImagickDraw::getFontSize](#imagickdraw.getfontsize) — Devuelve el tamaño de punto de la fuente
- [ImagickDraw::getFontStretch](#imagickdraw.getfontstretch) — Devuelve el estiramiento de la fuente a utilizar durante la anotación con texto
- [ImagickDraw::getFontStyle](#imagickdraw.getfontstyle) — Devuelve el estilo de la fuente
- [ImagickDraw::getFontWeight](#imagickdraw.getfontweight) — Devuelve el peso de la fuente
- [ImagickDraw::getGravity](#imagickdraw.getgravity) — Devuelve la gravedad de colocación de texto
- [ImagickDraw::getStrokeAntialias](#imagickdraw.getstrokeantialias) — Devuelve la configuración de antialias de contorno actual
- [ImagickDraw::getStrokeColor](#imagickdraw.getstrokecolor) — Devuelve el color usado por los perfiles de objetos contorneados
- [ImagickDraw::getStrokeDashArray](#imagickdraw.getstrokedasharray) — Devuelve un array que representa el patrón de trazos
- [ImagickDraw::getStrokeDashOffset](#imagickdraw.getstrokedashoffset) — Devuelve el desplazamiento del punto en el patrón
- [ImagickDraw::getStrokeLineCap](#imagickdraw.getstrokelinecap) — Devuelve la forma a utilizar para dibujar los extremos de subrutas
- [ImagickDraw::getStrokeLineJoin](#imagickdraw.getstrokelinejoin) — Devuelve la forma a utilizar para dibujar las esquinas de un camino
- [ImagickDraw::getStrokeMiterLimit](#imagickdraw.getstrokemiterlimit) — Devuelve el valor de 'miterLimit'
- [ImagickDraw::getStrokeOpacity](#imagickdraw.getstrokeopacity) — Devuelve la opacidad de los contornos de un objeto
- [ImagickDraw::getStrokeWidth](#imagickdraw.getstrokewidth) — Devuelve el ancho de trazo utilizado
- [ImagickDraw::getTextAlignment](#imagickdraw.gettextalignment) — Devuelve la alineación del texto
- [ImagickDraw::getTextAntialias](#imagickdraw.gettextantialias) — Devuelve la configuración de antialias del texto actual
- [ImagickDraw::getTextDecoration](#imagickdraw.gettextdecoration) — Devuelve la decoración del texto
- [ImagickDraw::getTextEncoding](#imagickdraw.gettextencoding) — Devuelve el juego de caracteres utilizado para las anotaciones de texto
- [ImagickDraw::getTextInterlineSpacing](#imagickdraw.gettextinterlinespacing) — Obtiene el espacio entre líneas de un texto.
- [ImagickDraw::getTextInterwordSpacing](#imagickdraw.gettextinterwordspacing) — Obtiene el espacio entre palabras de un texto.
- [ImagickDraw::getTextKerning](#imagickdraw.gettextkerning) — Obtiene el interletraje de un texto.
- [ImagickDraw::getTextUnderColor](#imagickdraw.gettextundercolor) — Devuelve el color debajo del texto
- [ImagickDraw::getVectorGraphics](#imagickdraw.getvectorgraphics) — Devuelve una cadena que contiene gráficos vectoriales
- [ImagickDraw::line](#imagickdraw.line) — Dibuja una línea
- [ImagickDraw::matte](#imagickdraw.matte) — Dibuja sobre el canal de opacidad de la imagen
- [ImagickDraw::pathClose](#imagickdraw.pathclose) — Añade un elemento de camino al camino actual
- [ImagickDraw::pathCurveToAbsolute](#imagickdraw.pathcurvetoabsolute) — Dibuja una curva de Bézier cúbica, en coordenadas absolutas
- [ImagickDraw::pathCurveToQuadraticBezierAbsolute](#imagickdraw.pathcurvetoquadraticbezierabsolute) — Dibuja una curva de Bézier cuadrática, en coordenadas absolutas
- [ImagickDraw::pathCurveToQuadraticBezierRelative](#imagickdraw.pathcurvetoquadraticbezierrelative) — Dibuja una curva de Bézier cuadrática, en coordenadas relativas
- [ImagickDraw::pathCurveToQuadraticBezierSmoothAbsolute](#imagickdraw.pathcurvetoquadraticbeziersmoothabsolute) — Dibuja una curva Bézier cuadrática
- [ImagickDraw::pathCurveToQuadraticBezierSmoothRelative](#imagickdraw.pathcurvetoquadraticbeziersmoothrelative) — Dibuja una curva Bézier cuadrática
- [ImagickDraw::pathCurveToRelative](#imagickdraw.pathcurvetorelative) — Dibuja una curva de Bézier cúbica, en coordenadas relativas
- [ImagickDraw::pathCurveToSmoothAbsolute](#imagickdraw.pathcurvetosmoothabsolute) — Dibuja una curva de Bézier, en coordenadas absolutas
- [ImagickDraw::pathCurveToSmoothRelative](#imagickdraw.pathcurvetosmoothrelative) — Dibuja una curva de Bézier, en coordenadas relativas
- [ImagickDraw::pathEllipticArcAbsolute](#imagickdraw.pathellipticarcabsolute) — Dibuja un arco de elipse, en coordenadas absolutas
- [ImagickDraw::pathEllipticArcRelative](#imagickdraw.pathellipticarcrelative) — Dibuja un arco de elipse, en coordenadas relativas
- [ImagickDraw::pathFinish](#imagickdraw.pathfinish) — Finaliza el camino actual
- [ImagickDraw::pathLineToAbsolute](#imagickdraw.pathlinetoabsolute) — Dibuja una línea de camino, en coordenadas absolutas
- [ImagickDraw::pathLineToHorizontalAbsolute](#imagickdraw.pathlinetohorizontalabsolute) — Dibuja una línea de camino horizontal, en coordenadas absolutas
- [ImagickDraw::pathLineToHorizontalRelative](#imagickdraw.pathlinetohorizontalrelative) — Dibuja una línea de camino horizontal, en coordenadas relativas
- [ImagickDraw::pathLineToRelative](#imagickdraw.pathlinetorelative) — Dibuja una línea de camino, en coordenadas relativas
- [ImagickDraw::pathLineToVerticalAbsolute](#imagickdraw.pathlinetoverticalabsolute) — Dibuja una línea de camino vertical, en coordenadas absolutas
- [ImagickDraw::pathLineToVerticalRelative](#imagickdraw.pathlinetoverticalrelative) — Dibuja una línea de camino vertical, en coordenadas relativas
- [ImagickDraw::pathMoveToAbsolute](#imagickdraw.pathmovetoabsolute) — Inicia un nuevo subcamino, en coordenadas absolutas
- [ImagickDraw::pathMoveToRelative](#imagickdraw.pathmovetorelative) — Inicia un nuevo subcamino, en coordenadas relativas
- [ImagickDraw::pathStart](#imagickdraw.pathstart) — Declara el inicio de una lista de dibujo de trazados
- [ImagickDraw::point](#imagickdraw.point) — Dibuja un punto
- [ImagickDraw::polygon](#imagickdraw.polygon) — Dibuja un polígono
- [ImagickDraw::polyline](#imagickdraw.polyline) — Dibuja una poli-línea
- [ImagickDraw::pop](#imagickdraw.pop) — Destruye el objeto ImagickDraw actual de la pila, y lo devuelve al objeto ImagickDraw previamente metido
- [ImagickDraw::popClipPath](#imagickdraw.popclippath) — Finaliza la definición de un camino
- [ImagickDraw::popDefs](#imagickdraw.popdefs) — Finaliza una lista de definiciones
- [ImagickDraw::popPattern](#imagickdraw.poppattern) — Finaliza una definición de patrón
- [ImagickDraw::push](#imagickdraw.push) — Clona el objeto ImagickDraw actual y lo mete en la pila
- [ImagickDraw::pushClipPath](#imagickdraw.pushclippath) — Inicia la definición de un trazado de recorte
- [ImagickDraw::pushDefs](#imagickdraw.pushdefs) — Indica que los siguientes comandos crean elementos con nombre para un procesamiento previo
- [ImagickDraw::pushPattern](#imagickdraw.pushpattern) — Indica que los comandos subsiguientes hasta un comando ImagickDraw::opPattern() comprenden la definición de un patrón nominado
- [ImagickDraw::rectangle](#imagickdraw.rectangle) — Dibuja un rectángulo
- [ImagickDraw::render](#imagickdraw.render) — Realiza el renderizado de todos los dibujos en la imagen
- [ImagickDraw::resetVectorGraphics](#imagickdraw.resetvectorgraphics) — Restablece los gráficos vectoriales
- [ImagickDraw::rotate](#imagickdraw.rotate) — Aplica la rotación especificada al espacio de coordenadas actual
- [ImagickDraw::roundRectangle](#imagickdraw.roundrectangle) — Dibuja un rectángulo con esquinas redondeadas
- [ImagickDraw::scale](#imagickdraw.scale) — Ajusta el factor de escala
- [ImagickDraw::setClipPath](#imagickdraw.setclippath) — Asocia un trazado de recorte nominado con la imagen
- [ImagickDraw::setClipRule](#imagickdraw.setcliprule) — Configura la regla de relleno del polígono a utilizar con los caminos
- [ImagickDraw::setClipUnits](#imagickdraw.setclipunits) — Configura el modo de interpretación de las unidades de ruta
- [ImagickDraw::setFillAlpha](#imagickdraw.setfillalpha) — Configura la opacidad del color de relleno
- [ImagickDraw::setFillColor](#imagickdraw.setfillcolor) — Configura el color de relleno de los objetos dibujados
- [ImagickDraw::setFillOpacity](#imagickdraw.setfillopacity) — Configura la opacidad a utilizar para el relleno
- [ImagickDraw::setFillPatternURL](#imagickdraw.setfillpatternurl) — Configura la URL del patrón de relleno de superficies
- [ImagickDraw::setFillRule](#imagickdraw.setfillrule) — Configura la regla de relleno de los polígonos
- [ImagickDraw::setFont](#imagickdraw.setfont) — Establece la fuente especificada completamente para usarla cuando se escribe texto
- [ImagickDraw::setFontFamily](#imagickdraw.setfontfamily) — Establece la familia de fuentes para usarla cuando se escribe texto
- [ImagickDraw::setFontSize](#imagickdraw.setfontsize) — Configura el tamaño de punto para los textos
- [ImagickDraw::setFontStretch](#imagickdraw.setfontstretch) — Configura el estiramiento del texto
- [ImagickDraw::setFontStyle](#imagickdraw.setfontstyle) — Configura el estilo de la fuente
- [ImagickDraw::setFontWeight](#imagickdraw.setfontweight) — Configura el peso de la fuente
- [ImagickDraw::setGravity](#imagickdraw.setgravity) — Configura la gravedad de colocación de texto
- [ImagickDraw::setResolution](#imagickdraw.setresolution) — Define la resolución
- [ImagickDraw::setStrokeAlpha](#imagickdraw.setstrokealpha) — Especifica la opacidad de los contornos de los objetos
- [ImagickDraw::setStrokeAntialias](#imagickdraw.setstrokeantialias) — Controla el anti-aliasing de los trazos
- [ImagickDraw::setStrokeColor](#imagickdraw.setstrokecolor) — Configura el color utilizado para dibujar objetos
- [ImagickDraw::setStrokeDashArray](#imagickdraw.setstrokedasharray) — Especifica el patrón de trazo discontinuo
- [ImagickDraw::setStrokeDashOffset](#imagickdraw.setstrokedashoffset) — Especifica el índice dentro del patrón de discontinuidad para iniciar la discontinuidad
- [ImagickDraw::setStrokeLineCap](#imagickdraw.setstrokelinecap) — Especifica la forma a utilizar al final de los subcampos
- [ImagickDraw::setStrokeLineJoin](#imagickdraw.setstrokelinejoin) — Especifica la forma a utilizar para dibujar los extremos de las líneas
- [ImagickDraw::setStrokeMiterLimit](#imagickdraw.setstrokemiterlimit) — Especifica el límite del inglete
- [ImagickDraw::setStrokeOpacity](#imagickdraw.setstrokeopacity) — Especifica la opacidad para dibujar los contornos
- [ImagickDraw::setStrokePatternURL](#imagickdraw.setstrokepatternurl) — Establece el patrón usado para los perfiles de objetos contorneados
- [ImagickDraw::setStrokeWidth](#imagickdraw.setstrokewidth) — Configura el ancho del trazo para dibujar contornos
- [ImagickDraw::setTextAlignment](#imagickdraw.settextalignment) — Especifica la alineación del texto
- [ImagickDraw::setTextAntialias](#imagickdraw.settextantialias) — Controla el anti-aliaseo del texto
- [ImagickDraw::setTextDecoration](#imagickdraw.settextdecoration) — Especifica los ornamentos de texto
- [ImagickDraw::setTextEncoding](#imagickdraw.settextencoding) — Especifica el juego de caracteres
- [ImagickDraw::setTextInterlineSpacing](#imagickdraw.settextinterlinespacing) — Define el espacio entre las líneas de un texto
- [ImagickDraw::setTextInterwordSpacing](#imagickdraw.settextinterwordspacing) — Define el espacio entre las palabras de un texto
- [ImagickDraw::setTextKerning](#imagickdraw.settextkerning) — Define el interletraje de un texto
- [ImagickDraw::setTextUnderColor](#imagickdraw.settextundercolor) — Especifica el color de fondo de un rectángulo
- [ImagickDraw::setVectorGraphics](#imagickdraw.setvectorgraphics) — Establece los gráficos vectoriales
- [ImagickDraw::setViewbox](#imagickdraw.setviewbox) — Configura el tamaño del lienzo
- [ImagickDraw::skewX](#imagickdraw.skewx) — Tuerce el sistema de coordenadas actual en la dirección horizontal
- [ImagickDraw::skewY](#imagickdraw.skewy) — Tuerce el sistema de coordenadas actual en la dirección vertical
- [ImagickDraw::translate](#imagickdraw.translate) — Aplica una traslación del sistema de coordenadas actual
  </li>- [ImagickDrawException](#class.imagickdrawexception) — La clase ImagickDrawException
- [ImagickException](#class.imagickexception) — La clase ImagickException
- [ImagickKernel](#class.imagickkernel) — La clase ImagickKernel<li>[ImagickKernel::addKernel](#imagickkernel.addkernel) — Adjunta otro núcleo a una lista de núcleos
- [ImagickKernel::addUnityKernel](#imagickkernel.addunitykernel) — Añade un núcleo Unity a la lista de núcleos
- [ImagickKernel::fromBuiltIn](#imagickkernel.frombuiltin) — Crear un núcleo a partir de un núcleo integrado
- [ImagickKernel::fromMatrix](#imagickkernel.frommatrix) — Crear un núcleo a partir de una matriz 2D de valores
- [ImagickKernel::getMatrix](#imagickkernel.getmatrix) — Devuelve la matriz 2D de los valores utilizados en este núcleo
- [ImagickKernel::scale](#imagickkernel.scale) — Redimensiona una lista de núcleos por la cantidad dada
- [ImagickKernel::separate](#imagickkernel.separate) — Separa un conjunto de núcleos vinculados y devuelve un array de ImagickKernels
  </li>- [ImagickKernelException](#class.imagickkernelexception) — La clase ImagickKernelException
- [ImagickPixel](#class.imagickpixel) — La clase ImagickPixel<li>[ImagickPixel::clear](#imagickpixel.clear) — Elimina todos los recursos asociados con el objeto
- [ImagickPixel::\_\_construct](#imagickpixel.construct) — El constructor ImagickPixel
- [ImagickPixel::destroy](#imagickpixel.destroy) — Libera los recursos asociados con el objeto
- [ImagickPixel::getColor](#imagickpixel.getcolor) — Devuelve el color
- [ImagickPixel::getColorAsString](#imagickpixel.getcolorasstring) — Devuelve un color
- [ImagickPixel::getColorCount](#imagickpixel.getcolorcount) — Devuelve el número de colores asociados con un color
- [ImagickPixel::getColorQuantum](#imagickpixel.getcolorquantum) — Devuelve el color del píxel en un array como valores cuánticos
- [ImagickPixel::getColorValue](#imagickpixel.getcolorvalue) — Obtiene el valor normalizado del canal de color proporcionado
- [ImagickPixel::getColorValueQuantum](#imagickpixel.getcolorvaluequantum) — Devuelve el valor cuántico de un color en ImagickPixel
- [ImagickPixel::getHSL](#imagickpixel.gethsl) — Retorna el color HSL normalizado del objeto ImagickPixel
- [ImagickPixel::getIndex](#imagickpixel.getindex) — Devuelve el índice de la tabla de colores del píxel
- [ImagickPixel::isPixelSimilar](#imagickpixel.ispixelsimilar) — Verifica la distancia entre este color y otro
- [ImagickPixel::isPixelSimilarQuantum](#imagickpixel.ispixelsimilarquantum) — Indica si dos colores difieren en menos de la distancia especificada
- [ImagickPixel::isSimilar](#imagickpixel.issimilar) — Verifica la distancia entre 2 colores
- [ImagickPixel::setColor](#imagickpixel.setcolor) — Define la color
- [ImagickPixel::setColorCount](#imagickpixel.setcolorcount) — Define la cantidad de colores asociada a este píxel
- [ImagickPixel::setColorValue](#imagickpixel.setcolorvalue) — Define el valor normalizado de uno de los canales
- [ImagickPixel::setColorValueQuantum](#imagickpixel.setcolorvaluequantum) — Define la valor cuántica de un elemento de color de ImagickPixel
- [ImagickPixel::setHSL](#imagickpixel.sethsl) — Define el color HSL normalizado
- [ImagickPixel::setIndex](#imagickpixel.setindex) — Define el índice de la tabla de colores del píxel
  </li>- [ImagickPixelException](#class.imagickpixelexception) — La clase ImagickPixelException
- [ImagickPixelIterator](#class.imagickpixeliterator) — La clase ImagickPixelIterator<li>[ImagickPixelIterator::clear](#imagickpixeliterator.clear) — Elimina todos los recursos asociados a PixelIterator
- [ImagickPixelIterator::\_\_construct](#imagickpixeliterator.construct) — El constructor de la clase ImagickPixelIterator
- [ImagickPixelIterator::destroy](#imagickpixeliterator.destroy) — Libera los recursos asociados a PixelIterator
- [ImagickPixelIterator::getCurrentIteratorRow](#imagickpixeliterator.getcurrentiteratorrow) — Devuelve la fila actual de los objetos ImagickPixel
- [ImagickPixelIterator::getIteratorRow](#imagickpixeliterator.getiteratorrow) — Devuelve la fila actual del iterador de píxeles
- [ImagickPixelIterator::getNextIteratorRow](#imagickpixeliterator.getnextiteratorrow) — Devuelve la siguiente línea del iterador de píxeles
- [ImagickPixelIterator::getPreviousIteratorRow](#imagickpixeliterator.getpreviousiteratorrow) — Devuelve la línea anterior
- [ImagickPixelIterator::newPixelIterator](#imagickpixeliterator.newpixeliterator) — Devuelve un nuevo píxel del iterador
- [ImagickPixelIterator::newPixelRegionIterator](#imagickpixeliterator.newpixelregioniterator) — Devuelve un nuevo iterador de píxeles
- [ImagickPixelIterator::resetIterator](#imagickpixeliterator.resetiterator) — Reinicia el iterador de píxeles
- [ImagickPixelIterator::setIteratorFirstRow](#imagickpixeliterator.setiteratorfirstrow) — Establece el iterador de píxeles en la primera línea de píxeles
- [ImagickPixelIterator::setIteratorLastRow](#imagickpixeliterator.setiteratorlastrow) — Define el iterador de píxeles en la última línea de píxeles
- [ImagickPixelIterator::setIteratorRow](#imagickpixeliterator.setiteratorrow) — Define la línea del iterador de píxeles
- [ImagickPixelIterator::syncIterator](#imagickpixeliterator.synciterator) — Sincroniza el iterador de píxeles
  </li>- [ImagickPixelIteratorException](#class.imagickpixeliteratorexception) — La clase ImagickPixelIteratorException
