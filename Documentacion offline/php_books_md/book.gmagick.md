# Gmagick

# Introducción

**Advertencia**
Esta extensión es _EXPERIMENTAL_. El comportamiento de esta extensión, los nombres de sus funciones,
y toda la documentación alrededor de esta extensión puede cambiar sin previo aviso en una próxima versión de PHP.
Esta extensión debe ser utilizada bajo su propio riesgo.

Gmagick es una extensión PHP para crear, modificar y obtener información méta sobre imágenes utilizando la API GraphicsMagick.

GraphicsMagick se enorgullece de ser el cuchillo suizo del tratamiento de imágenes. Funciona con aproximadamente 88 formatos principales, incluyendo formatos importantes como DPX, GIF, JPEG, JPEG-2000, PNG, PDF, PNM y TIFF.

Gmagick se compone de una clase principal Gmagick, una clase GmagickDraw que se encarga del dibujo y una clase GmagickPixel cuyas instancias representan un solo píxel de una imagen (color, opacidad).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#gmagick.requirements)
- [Instalación](#gmagick.installation)

    ## Requerimientos

    Esta extensión funciona perfectamente con GraphicsMagick versión 1.4+.
    Gmagick debería funcionar con versiones anteriores, desde la versión 1.2.6 de GraphicsMagick 1.2.6, pero algunas funcionalidades
    y formatos no están soportados. La versión Windows de GraphicsMagick está disponible
    desde el sitio web de GraphicsMagick. Para conocer las diferencias
    entre ImageMagick y GraphicsMagick, leer la :
    [» FAQ](http://www.graphicsmagick.org/FAQ.html#how-does-graphicsmagick-differ-from-imagemagick) .

    ## Instalación

    Información sobre la instalación de estas extensiones PECL
    puede ser encontrada en el capítulo del manual titulado [Instalación
    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/gmagick](https://pecl.php.net/package/gmagick).

    **Nota**:

        El nombre oficial de esta extensión es *gmagick*.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

**Constantes relativas a los tipos de color**

    **[Gmagick::COLOR_BLACK](#gmagick.constants.color-black)**
    ([int](#language.types.integer))



     Negro





    **[Gmagick::COLOR_BLUE](#gmagick.constants.color-blue)**
    ([int](#language.types.integer))



     Azul





    **[Gmagick::COLOR_CYAN](#gmagick.constants.color-cyan)**
    ([int](#language.types.integer))



     Cian





    **[Gmagick::COLOR_GREEN](#gmagick.constants.color-green)**
    ([int](#language.types.integer))



     Verde





    **[Gmagick::COLOR_RED](#gmagick.constants.color-red)**
    ([int](#language.types.integer))



     Rojo





    **[Gmagick::COLOR_YELLOW](#gmagick.constants.color-yellow)**
    ([int](#language.types.integer))



    Amarillo





    **[Gmagick::COLOR_MAGENTA](#gmagick.constants.color-magenta)**
    ([int](#language.types.integer))



     Magenta





    **[Gmagick::COLOR_OPACITY](#gmagick.constants.color-opacity)**
    ([int](#language.types.integer))



     Opacidad





    **[Gmagick::COLOR_ALPHA](#gmagick.constants.color-alpha)**
    ([int](#language.types.integer))



     Alpha





    **[Gmagick::COLOR_FUZZ](#gmagick.constants.color-fuzz)**
    ([int](#language.types.integer))



     Fuzz

**Constantes relativas a los operadores compuestos**

    **[Gmagick::COMPOSITE_DEFAULT](#gmagick.constants.composite-default)**
    ([int](#language.types.integer))



     El operador compuesto por defecto





    **[Gmagick::COMPOSITE_UNDEFINED](#gmagick.constants.composite-undefined)**
    ([int](#language.types.integer))



     Operador compuesto indefinido





    **[Gmagick::COMPOSITE_NO](#gmagick.constants.composite-no)**
    ([int](#language.types.integer))



     Ningún operador compuesto definido





    **[Gmagick::COMPOSITE_ADD](#gmagick.constants.composite-add)**
    ([int](#language.types.integer))



     El resultado de una imagen + una imagen





    **[Gmagick::COMPOSITE_ATOP](#gmagick.constants.composite-atop)**
    ([int](#language.types.integer))



     El resultado es la misma forma que una imagen; donde la imagen compuesta
     oscurece la imagen, la imagen de la forma la superpone.





    **[Gmagick::COMPOSITE_BLEND](#gmagick.constants.composite-blend)**
    ([int](#language.types.integer))



     Mezcla la imagen





    **[Gmagick::COMPOSITE_BUMPMAP](#gmagick.constants.composite-bumpmap)**
    ([int](#language.types.integer))



     Idéntico a COMPOSITE_MULTIPLY, excepto que la fuente
     se convierte primero a niveles de gris.





    **[Gmagick::COMPOSITE_CLEAR](#gmagick.constants.composite-clear)**
    ([int](#language.types.integer))



     Hace que la imagen de destino sea transparente





    **[Gmagick::COMPOSITE_COLORBURN](#gmagick.constants.composite-colorburn)**
    ([int](#language.types.integer))



     Oscurece la imagen de destino para reflejar la imagen fuente





    **[Gmagick::COMPOSITE_COLORDODGE](#gmagick.constants.composite-colordodge)**
    ([int](#language.types.integer))



     Aclara la imagen de destino para reflejar la imagen fuente





    **[Gmagick::COMPOSITE_COLORIZE](#gmagick.constants.composite-colorize)**
    ([int](#language.types.integer))



     Colorea la imagen de destino utilizando la imagen compuesta





    **[Gmagick::COMPOSITE_COPYBLACK](#gmagick.constants.composite-copyblack)**
    ([int](#language.types.integer))



     Copia los negros desde la fuente hacia la imagen de destino





    **[Gmagick::COMPOSITE_COPYBLUE](#gmagick.constants.composite-copyblue)**
    ([int](#language.types.integer))



     Copia los azules desde la fuente hacia la imagen de destino





    **[Gmagick::COMPOSITE_COPY](#gmagick.constants.composite-copy)**
    ([int](#language.types.integer))



     Copia la imagen fuente sobre la imagen de destino





    **[Gmagick::COMPOSITE_COPYCYAN](#gmagick.constants.composite-copycyan)**
    ([int](#language.types.integer))



     Copia el cian desde la fuente hacia la imagen de destino





    **[Gmagick::COMPOSITE_COPYGREEN](#gmagick.constants.composite-copygreen)**
    ([int](#language.types.integer))



     Copia el verde desde la fuente hacia la imagen de destino





    **[Gmagick::COMPOSITE_COPYMAGENTA](#gmagick.constants.composite-copymagenta)**
    ([int](#language.types.integer))



     Copia el magenta desde la fuente hacia la imagen de destino





    **[Gmagick::COMPOSITE_COPYOPACITY](#gmagick.constants.composite-copyopacity)**
    ([int](#language.types.integer))



     Copia la opacidad desde la fuente hacia la imagen de destino





    **[Gmagick::COMPOSITE_COPYRED](#gmagick.constants.composite-copyred)**
    ([int](#language.types.integer))



     Copia el rojo desde la fuente hacia la imagen de destino





    **[Gmagick::COMPOSITE_COPYYELLOW](#gmagick.constants.composite-copyyellow)**
    ([int](#language.types.integer))



     Copia el amarillo desde la fuente hacia la imagen de destino





    **[Gmagick::COMPOSITE_DARKEN](#gmagick.constants.composite-darken)**
    ([int](#language.types.integer))



     Oscurece la imagen de destino





    **[Gmagick::COMPOSITE_DSTATOP](#gmagick.constants.composite-dstatop)**
    ([int](#language.types.integer))



     La parte de la imagen de destino que está dentro de la fuente
     se compone sobre la fuente y reemplaza la imagen de destino





    **[Gmagick::COMPOSITE_DST](#gmagick.constants.composite-dst)**
    ([int](#language.types.integer))



     La imagen de destino se conserva sin modificación





    **[Gmagick::COMPOSITE_DSTIN](#gmagick.constants.composite-dstin)**
    ([int](#language.types.integer))



     La parte de la fuente reemplaza la imagen de destino





    **[Gmagick::COMPOSITE_DSTOUT](#gmagick.constants.composite-dstout)**
    ([int](#language.types.integer))



     La parte fuera de la fuente reemplaza la imagen de destino





    **[Gmagick::COMPOSITE_DSTOVER](#gmagick.constants.composite-dstover)**
    ([int](#language.types.integer))



     La imagen de destino reemplaza la fuente





    **[Gmagick::COMPOSITE_DIFFERENCE](#gmagick.constants.composite-difference)**
    ([int](#language.types.integer))



     Resta el color más oscuro de los dos colores elementales del más claro





    **[Gmagick::COMPOSITE_DISPLACE](#gmagick.constants.composite-displace)**
    ([int](#language.types.integer))



     Desplaza los píxeles de la imagen de destino según lo definido por la fuente





    **[Gmagick::COMPOSITE_DISSOLVE](#gmagick.constants.composite-dissolve)**
    ([int](#language.types.integer))



     Disuelve la fuente en la imagen de destino





    **[Gmagick::COMPOSITE_EXCLUSION](#gmagick.constants.composite-exclusion)**
    ([int](#language.types.integer))



     Produce un efecto similar a Gmagick::COMPOSITE_DIFFERENCE,
     pero aparece con un contraste más bajo





    **[Gmagick::COMPOSITE_HARDLIGHT](#gmagick.constants.composite-hardlight)**
    ([int](#language.types.integer))



     Multiplica o superpone los colores, dependiendo del valor de color de la fuente





    **[Gmagick::COMPOSITE_HUE](#gmagick.constants.composite-hue)**
    ([int](#language.types.integer))



     Modifica el tono de la imagen de destino según lo definido por la fuente





    **[Gmagick::COMPOSITE_IN](#gmagick.constants.composite-in)**
    ([int](#language.types.integer))



     Realiza una composición de la fuente en la imagen de destino





    **[Gmagick::COMPOSITE_LIGHTEN](#gmagick.constants.composite-lighten)**
    ([int](#language.types.integer))



     Aclara la imagen de destino según lo definido por la fuente





    **[Gmagick::COMPOSITE_LUMINIZE](#gmagick.constants.composite-luminize)**
    ([int](#language.types.integer))



     Ilumina la imagen de destino según lo definido por la fuente





    **[Gmagick::COMPOSITE_MINUS](#gmagick.constants.composite-minus)**
    ([int](#language.types.integer))



     Resta la fuente de la imagen de destino





    **[Gmagick::COMPOSITE_MODULATE](#gmagick.constants.composite-modulate)**
    ([int](#language.types.integer))



     Modula la luminosidad, saturación y tono de la imagen de destino según lo definido
     por la fuente





    **[Gmagick::COMPOSITE_MULTIPLY](#gmagick.constants.composite-multiply)**
    ([int](#language.types.integer))



     Multiplica la imagen de destino por la fuente





    **[Gmagick::COMPOSITE_OUT](#gmagick.constants.composite-out)**
    ([int](#language.types.integer))



     Realiza una composición de las partes exteriores de la
     fuente sobre la imagen de destino





    **[Gmagick::COMPOSITE_OVER](#gmagick.constants.composite-over)**
    ([int](#language.types.integer))



     Realiza una composición sobre la imagen de destino





    **[Gmagick::COMPOSITE_OVERLAY](#gmagick.constants.composite-overlay)**
    ([int](#language.types.integer))



     Superpone la fuente sobre la imagen de destino





    **[Gmagick::COMPOSITE_PLUS](#gmagick.constants.composite-plus)**
    ([int](#language.types.integer))



     Añade la fuente a la imagen de destino





    **[Gmagick::COMPOSITE_REPLACE](#gmagick.constants.composite-replace)**
    ([int](#language.types.integer))



     Reemplaza la imagen de destino por la fuente





    **[Gmagick::COMPOSITE_SATURATE](#gmagick.constants.composite-saturate)**
    ([int](#language.types.integer))



     Satura la imagen de destino según lo definido por la fuente





    **[Gmagick::COMPOSITE_SCREEN](#gmagick.constants.composite-screen)**
    ([int](#language.types.integer))



     La fuente y la imagen de destino son complementadas, luego multiplicadas, luego
     reemplazan la imagen de destino





    **[Gmagick::COMPOSITE_SOFTLIGHT](#gmagick.constants.composite-softlight)**
    ([int](#language.types.integer))



     Oscurece o aclara los colores, siguiendo la fuente





    **[Gmagick::COMPOSITE_SRCATOP](#gmagick.constants.composite-srcatop)**
    ([int](#language.types.integer))



     La parte de la fuente que se encuentra dentro de la imagen de destino se compone
     sobre la imagen de destino





    **[Gmagick::COMPOSITE_SRC](#gmagick.constants.composite-src)**
    ([int](#language.types.integer))



     La fuente se copia hacia la imagen de destino





    **[Gmagick::COMPOSITE_SRCIN](#gmagick.constants.composite-srcin)**
    ([int](#language.types.integer))



     La parte de la fuente que se encuentra dentro de la imagen de destino reemplaza la imagen de destino





    **[Gmagick::COMPOSITE_SRCOUT](#gmagick.constants.composite-srcout)**
    ([int](#language.types.integer))



     La parte de la fuente que se encuentra fuera de la imagen de destino reemplaza la imagen de destino





    **[Gmagick::COMPOSITE_SRCOVER](#gmagick.constants.composite-srcover)**
    ([int](#language.types.integer))



     La fuente reemplaza la imagen de destino





    **[Gmagick::COMPOSITE_SUBTRACT](#gmagick.constants.composite-subtract)**
    ([int](#language.types.integer))



     Resta los colores de la imagen fuente en la imagen de destino





    **[Gmagick::COMPOSITE_THRESHOLD](#gmagick.constants.composite-threshold)**
    ([int](#language.types.integer))



     La fuente se compone de la imagen de destino, según lo definido por la fuente





    **[Gmagick::COMPOSITE_XOR](#gmagick.constants.composite-xor)**
    ([int](#language.types.integer))



     La parte de la fuente que se encuentra fuera de la imagen de destino se
     combina con la parte de la imagen de destino que se encuentra fuera de la fuente

**Constantes de modo de montaje**

    **[Gmagick::MONTAGEMODE_FRAME](#gmagick.constants.montagemode-frame)**
    ([int](#language.types.integer))









    **[Gmagick::MONTAGEMODE_UNFRAME](#gmagick.constants.montagemode-unframe)**
    ([int](#language.types.integer))









    **[Gmagick::MONTAGEMODE_CONCATENATE](#gmagick.constants.montagemode-concatenate)**
    ([int](#language.types.integer))

**Constantes de estilo**

    **[Gmagick::STYLE_NORMAL](#gmagick.constants.style-normal)**
    ([int](#language.types.integer))









    **[Gmagick::STYLE_ITALIC](#gmagick.constants.style-italic)**
    ([int](#language.types.integer))









    **[Gmagick::STYLE_OBLIQUE](#gmagick.constants.style-oblique)**
    ([int](#language.types.integer))









    **[Gmagick::STYLE_ANY](#gmagick.constants.style-any)**
    ([int](#language.types.integer))

**Constantes de filtro**

    **[Gmagick::FILTER_UNDEFINED](#gmagick.constants.filter-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::FILTER_POINT](#gmagick.constants.filter-point)**
    ([int](#language.types.integer))









    **[Gmagick::FILTER_BOX](#gmagick.constants.filter-box)**
    ([int](#language.types.integer))









    **[Gmagick::FILTER_TRIANGLE](#gmagick.constants.filter-triangle)**
    ([int](#language.types.integer))









    **[Gmagick::FILTER_HERMITE](#gmagick.constants.filter-hermite)**
    ([int](#language.types.integer))









    **[Gmagick::FILTER_HANNING](#gmagick.constants.filter-hanning)**
    ([int](#language.types.integer))









    **[Gmagick::FILTER_HAMMING](#gmagick.constants.filter-hamming)**
    ([int](#language.types.integer))









    **[Gmagick::FILTER_BLACKMAN](#gmagick.constants.filter-blackman)**
    ([int](#language.types.integer))









    **[Gmagick::FILTER_GAUSSIAN](#gmagick.constants.filter-gaussian)**
    ([int](#language.types.integer))









    **[Gmagick::FILTER_QUADRATIC](#gmagick.constants.filter-quadratic)**
    ([int](#language.types.integer))









    **[Gmagick::FILTER_CUBIC](#gmagick.constants.filter-cubic)**
    ([int](#language.types.integer))









    **[Gmagick::FILTER_CATROM](#gmagick.constants.filter-catrom)**
    ([int](#language.types.integer))









    **[Gmagick::FILTER_MITCHELL](#gmagick.constants.filter-mitchell)**
    ([int](#language.types.integer))









    **[Gmagick::FILTER_LANCZOS](#gmagick.constants.filter-lanczos)**
    ([int](#language.types.integer))









    **[Gmagick::FILTER_BESSEL](#gmagick.constants.filter-bessel)**
    ([int](#language.types.integer))









    **[Gmagick::FILTER_SINC](#gmagick.constants.filter-sinc)**
    ([int](#language.types.integer))

**Constantes de tipo de imagen**

    **[Gmagick::IMGTYPE_UNDEFINED](#gmagick.constants.imgtype-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::IMGTYPE_BILEVEL](#gmagick.constants.imgtype-bilevel)**
    ([int](#language.types.integer))









    **[Gmagick::IMGTYPE_GRAYSCALE](#gmagick.constants.imgtype-grayscale)**
    ([int](#language.types.integer))









    **[Gmagick::IMGTYPE_GRAYSCALEMATTE](#gmagick.constants.imgtype-grayscalematte)**
    ([int](#language.types.integer))









    **[Gmagick::IMGTYPE_PALETTE](#gmagick.constants.imgtype-palette)**
    ([int](#language.types.integer))









    **[Gmagick::IMGTYPE_PALETTEMATTE](#gmagick.constants.imgtype-palettematte)**
    ([int](#language.types.integer))









    **[Gmagick::IMGTYPE_TRUECOLOR](#gmagick.constants.imgtype-truecolor)**
    ([int](#language.types.integer))









    **[Gmagick::IMGTYPE_TRUECOLORMATTE](#gmagick.constants.imgtype-truecolormatte)**
    ([int](#language.types.integer))









    **[Gmagick::IMGTYPE_COLORSEPARATION](#gmagick.constants.imgtype-colorseparation)**
    ([int](#language.types.integer))









    **[Gmagick::IMGTYPE_COLORSEPARATIONMATTE](#gmagick.constants.imgtype-colorseparationmatte)**
    ([int](#language.types.integer))









    **[Gmagick::IMGTYPE_OPTIMIZE](#gmagick.constants.imgtype-optimize)**
    ([int](#language.types.integer))

**Constantes de resolución**

    **[Gmagick::RESOLUTION_UNDEFINED](#gmagick.constants.resolution-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::RESOLUTION_PIXELSPERINCH](#gmagick.constants.resolution-pixelsperinch)**
    ([int](#language.types.integer))









    **[Gmagick::RESOLUTION_PIXELSPERCENTIMETER](#gmagick.constants.resolution-pixelspercentimeter)**
    ([int](#language.types.integer))

**Constantes de compresión**

    **[Gmagick::COMPRESSION_UNDEFINED](#gmagick.constants.compression-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::COMPRESSION_NO](#gmagick.constants.compression-no)**
    ([int](#language.types.integer))









    **[Gmagick::COMPRESSION_BZIP](#gmagick.constants.compression-bzip)**
    ([int](#language.types.integer))









    **[Gmagick::COMPRESSION_FAX](#gmagick.constants.compression-fax)**
    ([int](#language.types.integer))









    **[Gmagick::COMPRESSION_GROUP4](#gmagick.constants.compression-group4)**
    ([int](#language.types.integer))









    **[Gmagick::COMPRESSION_JPEG](#gmagick.constants.compression-jpeg)**
    ([int](#language.types.integer))









    **[Gmagick::COMPRESSION_JPEG2000](#gmagick.constants.compression-jpeg2000)**
    ([int](#language.types.integer))









    **[Gmagick::COMPRESSION_LOSSLESSJPEG](#gmagick.constants.compression-losslessjpeg)**
    ([int](#language.types.integer))









    **[Gmagick::COMPRESSION_LZW](#gmagick.constants.compression-lzw)**
    ([int](#language.types.integer))









    **[Gmagick::COMPRESSION_RLE](#gmagick.constants.compression-rle)**
    ([int](#language.types.integer))









    **[Gmagick::COMPRESSION_ZIP](#gmagick.constants.compression-zip)**
    ([int](#language.types.integer))

**Constantes de dibujo**

    **[Gmagick::PAINT_POINT](#gmagick.constants.paint-point)**
    ([int](#language.types.integer))









    **[Gmagick::PAINT_REPLACE](#gmagick.constants.paint-replace)**
    ([int](#language.types.integer))









    **[Gmagick::PAINT_FLOODFILL](#gmagick.constants.paint-floodfill)**
    ([int](#language.types.integer))









    **[Gmagick::PAINT_FILLTOBORDER](#gmagick.constants.paint-filltoborder)**
    ([int](#language.types.integer))









    **[Gmagick::PAINT_RESET](#gmagick.constants.paint-reset)**
    ([int](#language.types.integer))

**Constantes de gravedad**

    **[Gmagick::GRAVITY_NORTHWEST](#gmagick.constants.gravity-northwest)**
    ([int](#language.types.integer))









    **[Gmagick::GRAVITY_NORTH](#gmagick.constants.gravity-north)**
    ([int](#language.types.integer))









    **[Gmagick::GRAVITY_NORTHEAST](#gmagick.constants.gravity-northeast)**
    ([int](#language.types.integer))









    **[Gmagick::GRAVITY_WEST](#gmagick.constants.gravity-west)**
    ([int](#language.types.integer))









    **[Gmagick::GRAVITY_CENTER](#gmagick.constants.gravity-center)**
    ([int](#language.types.integer))









    **[Gmagick::GRAVITY_EAST](#gmagick.constants.gravity-east)**
    ([int](#language.types.integer))









    **[Gmagick::GRAVITY_SOUTHWEST](#gmagick.constants.gravity-southwest)**
    ([int](#language.types.integer))









    **[Gmagick::GRAVITY_SOUTH](#gmagick.constants.gravity-south)**
    ([int](#language.types.integer))









    **[Gmagick::GRAVITY_SOUTHEAST](#gmagick.constants.gravity-southeast)**
    ([int](#language.types.integer))

**Constantes de estiramiento**

    **[Gmagick::STRETCH_NORMAL](#gmagick.constants.stretch-normal)**
    ([int](#language.types.integer))









    **[Gmagick::STRETCH_ULTRACONDENSED](#gmagick.constants.stretch-ultracondensed)**
    ([int](#language.types.integer))









    **[Gmagick::STRETCH_CONDENSED](#gmagick.constants.stretch-condensed)**
    ([int](#language.types.integer))









    **[Gmagick::STRETCH_SEMICONDENSED](#gmagick.constants.stretch-semicondensed)**
    ([int](#language.types.integer))









    **[Gmagick::STRETCH_SEMIEXPANDED](#gmagick.constants.stretch-semiexpanded)**
    ([int](#language.types.integer))









    **[Gmagick::STRETCH_EXPANDED](#gmagick.constants.stretch-expanded)**
    ([int](#language.types.integer))









    **[Gmagick::STRETCH_EXTRAEXPANDED](#gmagick.constants.stretch-extraexpanded)**
    ([int](#language.types.integer))









    **[Gmagick::STRETCH_ULTRAEXPANDED](#gmagick.constants.stretch-ultraexpanded)**
    ([int](#language.types.integer))









    **[Gmagick::STRETCH_ANY](#gmagick.constants.stretch-any)**
    ([int](#language.types.integer))

**Constantes de alineación**

    **[Gmagick::ALIGN_UNDEFINED](#gmagick.constants.align-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::ALIGN_LEFT](#gmagick.constants.align-left)**
    ([int](#language.types.integer))









    **[Gmagick::ALIGN_CENTER](#gmagick.constants.align-center)**
    ([int](#language.types.integer))









    **[Gmagick::ALIGN_RIGHT](#gmagick.constants.align-right)**
    ([int](#language.types.integer))

**Constantes de decoración**

    **[Gmagick::DECORATION_NO](#gmagick.constants.decoration-no)**
    ([int](#language.types.integer))









    **[Gmagick::DECORATION_UNDERLINE](#gmagick.constants.decoration-underline)**
    ([int](#language.types.integer))









    **[Gmagick::DECORATION_OVERLINE](#gmagick.constants.decoration-overline)**
    ([int](#language.types.integer))









    **[Gmagick::DECORATION_LINETROUGH](#gmagick.constants.decoration-linetrough)**
    ([int](#language.types.integer))

**Constantes de ruido**

    **[Gmagick::NOISE_UNIFORM](#gmagick.constants.noise-uniform)**
    ([int](#language.types.integer))









    **[Gmagick::NOISE_GAUSSIAN](#gmagick.constants.noise-gaussian)**
    ([int](#language.types.integer))









    **[Gmagick::NOISE_MULTIPLICATIVEGAUSSIAN](#gmagick.constants.noise-multiplicativegaussian)**
    ([int](#language.types.integer))









    **[Gmagick::NOISE_IMPULSE](#gmagick.constants.noise-impulse)**
    ([int](#language.types.integer))









    **[Gmagick::NOISE_LAPLACIAN](#gmagick.constants.noise-laplacian)**
    ([int](#language.types.integer))









    **[Gmagick::NOISE_POISSON](#gmagick.constants.noise-poisson)**
    ([int](#language.types.integer))

**Constantes de canal**

    **[Gmagick::CHANNEL_UNDEFINED](#gmagick.constants.channel-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::CHANNEL_RED](#gmagick.constants.channel-red)**
    ([int](#language.types.integer))









    **[Gmagick::CHANNEL_GRAY](#gmagick.constants.channel-gray)**
    ([int](#language.types.integer))









    **[Gmagick::CHANNEL_CYAN](#gmagick.constants.channel-cyan)**
    ([int](#language.types.integer))









    **[Gmagick::CHANNEL_GREEN](#gmagick.constants.channel-green)**
    ([int](#language.types.integer))









    **[Gmagick::CHANNEL_MAGENTA](#gmagick.constants.channel-magenta)**
    ([int](#language.types.integer))









    **[Gmagick::CHANNEL_BLUE](#gmagick.constants.channel-blue)**
    ([int](#language.types.integer))









    **[Gmagick::CHANNEL_YELLOW](#gmagick.constants.channel-yellow)**
    ([int](#language.types.integer))









    **[Gmagick::CHANNEL_ALPHA](#gmagick.constants.channel-alpha)**
    ([int](#language.types.integer))









    **[Gmagick::CHANNEL_OPACITY](#gmagick.constants.channel-opacity)**
    ([int](#language.types.integer))









    **[Gmagick::CHANNEL_MATTE](#gmagick.constants.channel-matte)**
    ([int](#language.types.integer))









    **[Gmagick::CHANNEL_BLACK](#gmagick.constants.channel-black)**
    ([int](#language.types.integer))









    **[Gmagick::CHANNEL_INDEX](#gmagick.constants.channel-index)**
    ([int](#language.types.integer))









    **[Gmagick::CHANNEL_ALL](#gmagick.constants.channel-all)**
    ([int](#language.types.integer))

**Constantes de medida**

    **[Gmagick::METRIC_UNDEFINED](#gmagick.constants.metric-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::METRIC_MEANABSOLUTEERROR](#gmagick.constants.metric-meanabsoluteerror)**
    ([int](#language.types.integer))









    **[Gmagick::METRIC_MEANSQUAREERROR](#gmagick.constants.metric-meansquareerror)**
    ([int](#language.types.integer))









    **[Gmagick::METRIC_PEAKABSOLUTEERROR](#gmagick.constants.metric-peakabsoluteerror)**
    ([int](#language.types.integer))









    **[Gmagick::METRIC_PEAKSIGNALTONOISERATIO](#gmagick.constants.metric-peaksignaltonoiseratio)**
    ([int](#language.types.integer))









    **[Gmagick::METRIC_ROOTMEANSQUAREDERROR](#gmagick.constants.metric-rootmeansquarederror)**
    ([int](#language.types.integer))

**Constantes de píxel**

    **[Gmagick::PIXEL_CHAR](#gmagick.constants.pixel-char)**
    ([int](#language.types.integer))









    **[Gmagick::PIXEL_DOUBLE](#gmagick.constants.pixel-double)**
    ([int](#language.types.integer))









    **[Gmagick::PIXEL_FLOAT](#gmagick.constants.pixel-float)**
    ([int](#language.types.integer))









    **[Gmagick::PIXEL_INTEGER](#gmagick.constants.pixel-integer)**
    ([int](#language.types.integer))









    **[Gmagick::PIXEL_LONG](#gmagick.constants.pixel-long)**
    ([int](#language.types.integer))









    **[Gmagick::PIXEL_QUANTUM](#gmagick.constants.pixel-quantum)**
    ([int](#language.types.integer))









    **[Gmagick::PIXEL_SHORT](#gmagick.constants.pixel-short)**
    ([int](#language.types.integer))

**Constantes de espacio de color**

    **[Gmagick::COLORSPACE_UNDEFINED](#gmagick.constants.colorspace-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_RGB](#gmagick.constants.colorspace-rgb)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_GRAY](#gmagick.constants.colorspace-gray)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_TRANSPARENT](#gmagick.constants.colorspace-transparent)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_OHTA](#gmagick.constants.colorspace-ohta)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_LAB](#gmagick.constants.colorspace-lab)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_XYZ](#gmagick.constants.colorspace-xyz)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_YCBCR](#gmagick.constants.colorspace-ycbcr)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_YCC](#gmagick.constants.colorspace-ycc)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_YIQ](#gmagick.constants.colorspace-yiq)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_YPBPR](#gmagick.constants.colorspace-ypbpr)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_YUV](#gmagick.constants.colorspace-yuv)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_CMYK](#gmagick.constants.colorspace-cmyk)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_SRGB](#gmagick.constants.colorspace-srgb)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_HSB](#gmagick.constants.colorspace-hsb)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_HSL](#gmagick.constants.colorspace-hsl)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_HWB](#gmagick.constants.colorspace-hwb)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_REC601LUMA](#gmagick.constants.colorspace-rec601luma)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_REC709LUMA](#gmagick.constants.colorspace-rec709luma)**
    ([int](#language.types.integer))









    **[Gmagick::COLORSPACE_LOG](#gmagick.constants.colorspace-log)**
    ([int](#language.types.integer))

**Constantes de método para píxeles virtuales**

    **[Gmagick::VIRTUALPIXELMETHOD_UNDEFINED](#gmagick.constants.virtualpixelmethod-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::VIRTUALPIXELMETHOD_BACKGROUND](#gmagick.constants.virtualpixelmethod-background)**
    ([int](#language.types.integer))









    **[Gmagick::VIRTUALPIXELMETHOD_CONSTANT](#gmagick.constants.virtualpixelmethod-constant)**
    ([int](#language.types.integer))









    **[Gmagick::VIRTUALPIXELMETHOD_EDGE](#gmagick.constants.virtualpixelmethod-edge)**
    ([int](#language.types.integer))









    **[Gmagick::VIRTUALPIXELMETHOD_MIRROR](#gmagick.constants.virtualpixelmethod-mirror)**
    ([int](#language.types.integer))









    **[Gmagick::VIRTUALPIXELMETHOD_TILE](#gmagick.constants.virtualpixelmethod-tile)**
    ([int](#language.types.integer))









    **[Gmagick::VIRTUALPIXELMETHOD_TRANSPARENT](#gmagick.constants.virtualpixelmethod-transparent)**
    ([int](#language.types.integer))

**Constantes de vista previa**

    **[Gmagick::PREVIEW_UNDEFINED](#gmagick.constants.preview-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_ROTATE](#gmagick.constants.preview-rotate)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_SHEAR](#gmagick.constants.preview-shear)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_ROLL](#gmagick.constants.preview-roll)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_HUE](#gmagick.constants.preview-hue)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_SATURATION](#gmagick.constants.preview-saturation)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_BRIGHTNESS](#gmagick.constants.preview-brightness)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_GAMMA](#gmagick.constants.preview-gamma)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_SPIFF](#gmagick.constants.preview-spiff)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_DULL](#gmagick.constants.preview-dull)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_GRAYSCALE](#gmagick.constants.preview-grayscale)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_QUANTIZE](#gmagick.constants.preview-quantize)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_DESPECKLE](#gmagick.constants.preview-despeckle)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_REDUCENOISE](#gmagick.constants.preview-reducenoise)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_ADDNOISE](#gmagick.constants.preview-addnoise)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_SHARPEN](#gmagick.constants.preview-sharpen)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_BLUR](#gmagick.constants.preview-blur)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_THRESHOLD](#gmagick.constants.preview-threshold)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_EDGEDETECT](#gmagick.constants.preview-edgedetect)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_SPREAD](#gmagick.constants.preview-spread)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_SOLARIZE](#gmagick.constants.preview-solarize)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_SHADE](#gmagick.constants.preview-shade)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_RAISE](#gmagick.constants.preview-raise)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_SEGMENT](#gmagick.constants.preview-segment)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_SWIRL](#gmagick.constants.preview-swirl)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_IMPLODE](#gmagick.constants.preview-implode)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_WAVE](#gmagick.constants.preview-wave)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_OILPAINT](#gmagick.constants.preview-oilpaint)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_CHARCOALDRAWING](#gmagick.constants.preview-charcoaldrawing)**
    ([int](#language.types.integer))









    **[Gmagick::PREVIEW_JPEG](#gmagick.constants.preview-jpeg)**
    ([int](#language.types.integer))

**Constantes de renderizado**

    **[Gmagick::RENDERINGINTENT_UNDEFINED](#gmagick.constants.renderingintent-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::RENDERINGINTENT_SATURATION](#gmagick.constants.renderingintent-saturation)**
    ([int](#language.types.integer))









    **[Gmagick::RENDERINGINTENT_PERCEPTUAL](#gmagick.constants.renderingintent-perceptual)**
    ([int](#language.types.integer))









    **[Gmagick::RENDERINGINTENT_ABSOLUTE](#gmagick.constants.renderingintent-absolute)**
    ([int](#language.types.integer))









    **[Gmagick::RENDERINGINTENT_RELATIVE](#gmagick.constants.renderingintent-relative)**
    ([int](#language.types.integer))

**Constantes de regla de relleno**

    **[Gmagick::FILLRULE_UNDEFINED](#gmagick.constants.fillrule-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::FILLRULE_EVENODD](#gmagick.constants.fillrule-evenodd)**
    ([int](#language.types.integer))









    **[Gmagick::FILLRULE_NONZERO](#gmagick.constants.fillrule-nonzero)**
    ([int](#language.types.integer))

**Constantes de unidad de ruta**

    **[Gmagick::PATHUNITS_UNDEFINED](#gmagick.constants.pathunits-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::PATHUNITS_USERSPACE](#gmagick.constants.pathunits-userspace)**
    ([int](#language.types.integer))









    **[Gmagick::PATHUNITS_USERSPACEONUSE](#gmagick.constants.pathunits-userspaceonuse)**
    ([int](#language.types.integer))









    **[Gmagick::PATHUNITS_OBJECTBOUNDINGBOX](#gmagick.constants.pathunits-objectboundingbox)**
    ([int](#language.types.integer))

**Constantes de extremo de línea**

    **[Gmagick::LINECAP_UNDEFINED](#gmagick.constants.linecap-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::LINECAP_BUTT](#gmagick.constants.linecap-butt)**
    ([int](#language.types.integer))









    **[Gmagick::LINECAP_ROUND](#gmagick.constants.linecap-round)**
    ([int](#language.types.integer))









    **[Gmagick::LINECAP_SQUARE](#gmagick.constants.linecap-square)**
    ([int](#language.types.integer))

**Constantes de unión de líneas**

    **[Gmagick::LINEJOIN_UNDEFINED](#gmagick.constants.linejoin-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::LINEJOIN_MITER](#gmagick.constants.linejoin-miter)**
    ([int](#language.types.integer))









    **[Gmagick::LINEJOIN_ROUND](#gmagick.constants.linejoin-round)**
    ([int](#language.types.integer))









    **[Gmagick::LINEJOIN_BEVEL](#gmagick.constants.linejoin-bevel)**
    ([int](#language.types.integer))

**Constantes de tipo de recurso**

    **[Gmagick::RESOURCETYPE_UNDEFINED](#gmagick.constants.resourcetype-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::RESOURCETYPE_AREA](#gmagick.constants.resourcetype-area)**
    ([int](#language.types.integer))









    **[Gmagick::RESOURCETYPE_DISK](#gmagick.constants.resourcetype-disk)**
    ([int](#language.types.integer))









    **[Gmagick::RESOURCETYPE_FILE](#gmagick.constants.resourcetype-file)**
    ([int](#language.types.integer))









    **[Gmagick::RESOURCETYPE_MAP](#gmagick.constants.resourcetype-map)**
    ([int](#language.types.integer))









    **[Gmagick::RESOURCETYPE_MEMORY](#gmagick.constants.resourcetype-memory)**
    ([int](#language.types.integer))

**Constantes de orientación**

    **[Gmagick::ORIENTATION_UNDEFINED](#gmagick.constants.orientation-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::ORIENTATION_TOPLEFT](#gmagick.constants.orientation-topleft)**
    ([int](#language.types.integer))









    **[Gmagick::ORIENTATION_TOPRIGHT](#gmagick.constants.orientation-topright)**
    ([int](#language.types.integer))









    **[Gmagick::ORIENTATION_BOTTOMRIGHT](#gmagick.constants.orientation-bottomright)**
    ([int](#language.types.integer))









    **[Gmagick::ORIENTATION_BOTTOMLEFT](#gmagick.constants.orientation-bottomleft)**
    ([int](#language.types.integer))









    **[Gmagick::ORIENTATION_LEFTTOP](#gmagick.constants.orientation-lefttop)**
    ([int](#language.types.integer))









    **[Gmagick::ORIENTATION_RIGHTTOP](#gmagick.constants.orientation-righttop)**
    ([int](#language.types.integer))









    **[Gmagick::ORIENTATION_RIGHTBOTTOM](#gmagick.constants.orientation-rightbottom)**
    ([int](#language.types.integer))









    **[Gmagick::ORIENTATION_LEFTBOTTOM](#gmagick.constants.orientation-leftbottom)**
    ([int](#language.types.integer))

**Constantes de entrelazado**

    **[Gmagick::INTERLACE_UNDEFINED](#gmagick.constants.interlace-undefined)**
    ([int](#language.types.integer))









    **[Gmagick::INTERLACE_NO](#gmagick.constants.interlace-no)**
    ([int](#language.types.integer))









    **[Gmagick::INTERLACE_NONE](#gmagick.constants.interlace-none)**
    ([int](#language.types.integer))









    **[Gmagick::INTERLACE_LINE](#gmagick.constants.interlace-line)**
    ([int](#language.types.integer))









    **[Gmagick::INTERLACE_PLANE](#gmagick.constants.interlace-plane)**
    ([int](#language.types.integer))









    **[Gmagick::INTERLACE_PARTITION](#gmagick.constants.interlace-partition)**
    ([int](#language.types.integer))

# Ejemplos

A continuación se muestran algunas operaciones comunes con Gmagick.

**Ejemplo #1 Ejemplo de Gmagick**

&lt;?php
// Instanciación de un nuevo objeto Gmagick
$image = new Gmagick('example.jpg');

// Crea una miniatura a partir de la imagen cargada. 0 para uno de los ejes preservará la relación de aspecto
$image-&gt;thumbnailimage(100, 0);

// Crea un borde alrededor de la imagen, luego simula cómo se renderizará la imagen
// después de un renderizado a pintura al óleo.
// Observe el encadenamiento de métodos soportado por Gmagick
$image-&gt;borderimage("yellow", 8, 8)-&gt;oilpaintimage(0.3);

// Escribe la imagen actual en un fichero
$image-&gt;write('example_thumbnail.jpg');
?&gt;

# La clase Gmagick

(PECL gmagick &gt;= Unknown)

## Introducción

## Sinopsis de la Clase

    ****




      class **Gmagick**

     {

     /* Métodos */


public [\_\_construct](#gmagick.construct)([string](#language.types.string) $filename = ?)

     public [addimage](#gmagick.addimage)([Gmagick](#class.gmagick) $source): [Gmagick](#class.gmagick)

public [addnoiseimage](#gmagick.addnoiseimage)([int](#language.types.integer) $noise_type): [Gmagick](#class.gmagick)
public [annotateimage](#gmagick.annotateimage)(
    [GmagickDraw](#class.gmagickdraw) $GmagickDraw,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y,
    [float](#language.types.float) $angle,
    [string](#language.types.string) $text
): [Gmagick](#class.gmagick)
public [blurimage](#gmagick.blurimage)([float](#language.types.float) $radius, [float](#language.types.float) $sigma, [int](#language.types.integer) $channel = ?): [Gmagick](#class.gmagick)
public [borderimage](#gmagick.borderimage)([GmagickPixel](#class.gmagickpixel) $color, [int](#language.types.integer) $width, [int](#language.types.integer) $height): [Gmagick](#class.gmagick)
public [charcoalimage](#gmagick.charcoalimage)([float](#language.types.float) $radius, [float](#language.types.float) $sigma): [Gmagick](#class.gmagick)
public [chopimage](#gmagick.chopimage)(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [Gmagick](#class.gmagick)
public [clear](#gmagick.clear)(): [Gmagick](#class.gmagick)
public [commentimage](#gmagick.commentimage)([string](#language.types.string) $comment): [Gmagick](#class.gmagick)
public [compositeimage](#gmagick.compositeimage)(
    [Gmagick](#class.gmagick) $source,
    [int](#language.types.integer) $COMPOSE,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [Gmagick](#class.gmagick)
public [cropimage](#gmagick.cropimage)(

    

      [int](#language.types.integer) $width
    ,

    

      [int](#language.types.integer) $height
    ,

    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [Gmagick](#class.gmagick)
public [cropthumbnailimage](#gmagick.cropthumbnailimage)([int](#language.types.integer) $width, [int](#language.types.integer) $height): [Gmagick](#class.gmagick)
public [current](#gmagick.current)(): [Gmagick](#class.gmagick)
public [cyclecolormapimage](#gmagick.cyclecolormapimage)([int](#language.types.integer) $displace): [Gmagick](#class.gmagick)
public [deconstructimages](#gmagick.deconstructimages)(): [Gmagick](#class.gmagick)
public [despeckleimage](#gmagick.despeckleimage)(): [Gmagick](#class.gmagick)
public [destroy](#gmagick.destroy)(): [bool](#language.types.boolean)
public [drawimage](#gmagick.drawimage)([GmagickDraw](#class.gmagickdraw) $GmagickDraw): [Gmagick](#class.gmagick)
public [edgeimage](#gmagick.edgeimage)([float](#language.types.float) $radius): [Gmagick](#class.gmagick)
public [embossimage](#gmagick.embossimage)([float](#language.types.float) $radius, [float](#language.types.float) $sigma): [Gmagick](#class.gmagick)
public [enhanceimage](#gmagick.enhanceimage)(): [Gmagick](#class.gmagick)
public [equalizeimage](#gmagick.equalizeimage)(): [Gmagick](#class.gmagick)
public [flipimage](#gmagick.flipimage)(): [Gmagick](#class.gmagick)
public [flopimage](#gmagick.flopimage)(): [Gmagick](#class.gmagick)
public [frameimage](#gmagick.frameimage)(
    [GmagickPixel](#class.gmagickpixel) $color,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $inner_bevel,
    [int](#language.types.integer) $outer_bevel
): [Gmagick](#class.gmagick)
public [gammaimage](#gmagick.gammaimage)([float](#language.types.float) $gamma): [Gmagick](#class.gmagick)
public [getcopyright](#gmagick.getcopyright)(): [string](#language.types.string)
public [getfilename](#gmagick.getfilename)(): [string](#language.types.string)
public [getimagebackgroundcolor](#gmagick.getimagebackgroundcolor)(): [GmagickPixel](#class.gmagickpixel)
public [getimageblueprimary](#gmagick.getimageblueprimary)(): [array](#language.types.array)
public [getimagebordercolor](#gmagick.getimagebordercolor)(): [GmagickPixel](#class.gmagickpixel)
public [getimagechanneldepth](#gmagick.getimagechanneldepth)([int](#language.types.integer) $channel_type): [int](#language.types.integer)
public [getimagecolors](#gmagick.getimagecolors)(): [int](#language.types.integer)
public [getimagecolorspace](#gmagick.getimagecolorspace)(): [int](#language.types.integer)
public [getimagecompose](#gmagick.getimagecompose)(): [int](#language.types.integer)
public [getimagedelay](#gmagick.getimagedelay)(): [int](#language.types.integer)
public [getimagedepth](#gmagick.getimagedepth)(): [int](#language.types.integer)
public [getimagedispose](#gmagick.getimagedispose)(): [int](#language.types.integer)
public [getimageextrema](#gmagick.getimageextrema)(): [array](#language.types.array)
public [getimagefilename](#gmagick.getimagefilename)(): [string](#language.types.string)
public [getimageformat](#gmagick.getimageformat)(): [string](#language.types.string)
public [getimagegamma](#gmagick.getimagegamma)(): [float](#language.types.float)
public [getimagegreenprimary](#gmagick.getimagegreenprimary)(): [array](#language.types.array)
public [getimageheight](#gmagick.getimageheight)(): [int](#language.types.integer)
public [getimagehistogram](#gmagick.getimagehistogram)(): [array](#language.types.array)
public [getimageindex](#gmagick.getimageindex)(): [int](#language.types.integer)
public [getimageinterlacescheme](#gmagick.getimageinterlacescheme)(): [int](#language.types.integer)
public [getimageiterations](#gmagick.getimageiterations)(): [int](#language.types.integer)
public [getimagematte](#gmagick.getimagematte)(): [int](#language.types.integer)
public [getimagemattecolor](#gmagick.getimagemattecolor)(): [GmagickPixel](#class.gmagickpixel)
public [getimageprofile](#gmagick.getimageprofile)([string](#language.types.string) $name): [string](#language.types.string)
public [getimageredprimary](#gmagick.getimageredprimary)(): [array](#language.types.array)
public [getimagerenderingintent](#gmagick.getimagerenderingintent)(): [int](#language.types.integer)
public [getimageresolution](#gmagick.getimageresolution)(): [array](#language.types.array)
public [getimagescene](#gmagick.getimagescene)(): [int](#language.types.integer)
public [getimagesignature](#gmagick.getimagesignature)(): [string](#language.types.string)
public [getimagetype](#gmagick.getimagetype)(): [int](#language.types.integer)
public [getimageunits](#gmagick.getimageunits)(): [int](#language.types.integer)
public [getimagewhitepoint](#gmagick.getimagewhitepoint)(): [array](#language.types.array)
public [getimagewidth](#gmagick.getimagewidth)(): [int](#language.types.integer)
public [getpackagename](#gmagick.getpackagename)(): [string](#language.types.string)
public [getquantumdepth](#gmagick.getquantumdepth)(): [array](#language.types.array)
public [getreleasedate](#gmagick.getreleasedate)(): [string](#language.types.string)
public [getsamplingfactors](#gmagick.getsamplingfactors)(): [array](#language.types.array)
public [getsize](#gmagick.getsize)(): [array](#language.types.array)
public [getversion](#gmagick.getversion)(): [array](#language.types.array)
public [hasnextimage](#gmagick.hasnextimage)(): [mixed](#language.types.mixed)
public [haspreviousimage](#gmagick.haspreviousimage)(): [mixed](#language.types.mixed)
public [implodeimage](#gmagick.implodeimage)([float](#language.types.float) $radius): [mixed](#language.types.mixed)
public [labelimage](#gmagick.labelimage)([string](#language.types.string) $label): [mixed](#language.types.mixed)
public [levelimage](#gmagick.levelimage)(
    [float](#language.types.float) $blackPoint,
    [float](#language.types.float) $gamma,
    [float](#language.types.float) $whitePoint,
    [int](#language.types.integer) $channel = Gmagick::CHANNEL_DEFAULT
): [mixed](#language.types.mixed)
public [magnifyimage](#gmagick.magnifyimage)(): [mixed](#language.types.mixed)
public [mapimage](#gmagick.mapimage)([gmagick](#class.gmagick) $gmagick, [bool](#language.types.boolean) $dither): [Gmagick](#class.gmagick)
public [medianfilterimage](#gmagick.medianfilterimage)([float](#language.types.float) $radius): [void](language.types.void.html)
public [minifyimage](#gmagick.minifyimage)(): [Gmagick](#class.gmagick)
public [modulateimage](#gmagick.modulateimage)([float](#language.types.float) $brightness, [float](#language.types.float) $saturation, [float](#language.types.float) $hue): [Gmagick](#class.gmagick)
public [motionblurimage](#gmagick.motionblurimage)([float](#language.types.float) $radius, [float](#language.types.float) $sigma, [float](#language.types.float) $angle): [Gmagick](#class.gmagick)
public [newimage](#gmagick.newimage)(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [string](#language.types.string) $background,
    [string](#language.types.string) $format = ?
): [Gmagick](#class.gmagick)
public [nextimage](#gmagick.nextimage)(): [bool](#language.types.boolean)
public [normalizeimage](#gmagick.normalizeimage)([int](#language.types.integer) $channel = ?): [Gmagick](#class.gmagick)
public [oilpaintimage](#gmagick.oilpaintimage)(

      [float](#language.types.float) $radius
    ): [Gmagick](#class.gmagick)

public [previousimage](#gmagick.previousimage)(): [bool](#language.types.boolean)
public [profileimage](#gmagick.profileimage)([string](#language.types.string) $name, [string](#language.types.string) $profile): [Gmagick](#class.gmagick)
public [quantizeimage](#gmagick.quantizeimage)(
    [int](#language.types.integer) $numColors,
    [int](#language.types.integer) $colorspace,
    [int](#language.types.integer) $treeDepth,
    [bool](#language.types.boolean) $dither,
    [bool](#language.types.boolean) $measureError
): [Gmagick](#class.gmagick)
public [quantizeimages](#gmagick.quantizeimages)(
    [int](#language.types.integer) $numColors,
    [int](#language.types.integer) $colorspace,
    [int](#language.types.integer) $treeDepth,
    [bool](#language.types.boolean) $dither,
    [bool](#language.types.boolean) $measureError
): [Gmagick](#class.gmagick)
public [queryfontmetrics](#gmagick.queryfontmetrics)([GmagickDraw](#class.gmagickdraw) $draw, [string](#language.types.string) $text): [array](#language.types.array)
public [queryfonts](#gmagick.queryfonts)([string](#language.types.string) $pattern = "_"): [array](#language.types.array)
public [queryformats](#gmagick.queryformats)([string](#language.types.string) $pattern = "_"): [array](#language.types.array)
public [radialblurimage](#gmagick.radialblurimage)([float](#language.types.float) $angle, [int](#language.types.integer) $channel = Gmagick::CHANNEL_DEFAULT): [Gmagick](#class.gmagick)
public [raiseimage](#gmagick.raiseimage)(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [bool](#language.types.boolean) $raise
): [Gmagick](#class.gmagick)
public [read](#gmagick.read)([string](#language.types.string) $filename): [Gmagick](#class.gmagick)
public [readimage](#gmagick.readimage)([string](#language.types.string) $filename): [Gmagick](#class.gmagick)
public [readimageblob](#gmagick.readimageblob)([string](#language.types.string) $imageContents, [string](#language.types.string) $filename = ?): [Gmagick](#class.gmagick)
public [readimagefile](#gmagick.readimagefile)([resource](#language.types.resource) $fp, [string](#language.types.string) $filename = ?): [Gmagick](#class.gmagick)
public [reducenoiseimage](#gmagick.reducenoiseimage)([float](#language.types.float) $radius): [Gmagick](#class.gmagick)
public [removeimage](#gmagick.removeimage)(): [Gmagick](#class.gmagick)
public [removeimageprofile](#gmagick.removeimageprofile)([string](#language.types.string) $name): [string](#language.types.string)
public [resampleimage](#gmagick.resampleimage)(
    [float](#language.types.float) $xResolution,
    [float](#language.types.float) $yResolution,
    [int](#language.types.integer) $filter,
    [float](#language.types.float) $blur
): [Gmagick](#class.gmagick)
public [resizeimage](#gmagick.resizeimage)(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $filter,
    [float](#language.types.float) $blur,
    [bool](#language.types.boolean) $fit = **[false](#constant.false)**
): [Gmagick](#class.gmagick)
public [rollimage](#gmagick.rollimage)([int](#language.types.integer) $x, [int](#language.types.integer) $y): [Gmagick](#class.gmagick)
public [rotateimage](#gmagick.rotateimage)([mixed](#language.types.mixed) $color, [float](#language.types.float) $degrees): [Gmagick](#class.gmagick)
public [scaleimage](#gmagick.scaleimage)([int](#language.types.integer) $width, [int](#language.types.integer) $height, [bool](#language.types.boolean) $fit = **[false](#constant.false)**): [Gmagick](#class.gmagick)
public [separateimagechannel](#gmagick.separateimagechannel)([int](#language.types.integer) $channel): [Gmagick](#class.gmagick)
[setCompressionQuality](#gmagick.setcompressionquality)(
[int](#language.types.integer) $quality
): [Gmagick](#class.gmagick)
public [setfilename](#gmagick.setfilename)([string](#language.types.string) $filename): [Gmagick](#class.gmagick)
public [setimagebackgroundcolor](#gmagick.setimagebackgroundcolor)([GmagickPixel](#class.gmagickpixel) $color): [Gmagick](#class.gmagick)
public [setimageblueprimary](#gmagick.setimageblueprimary)([float](#language.types.float) $x, [float](#language.types.float) $y): [Gmagick](#class.gmagick)
public [setimagebordercolor](#gmagick.setimagebordercolor)([GmagickPixel](#class.gmagickpixel) $color): [Gmagick](#class.gmagick)
public [setimagechanneldepth](#gmagick.setimagechanneldepth)([int](#language.types.integer) $channel, [int](#language.types.integer) $depth): [Gmagick](#class.gmagick)
public [setimagecolorspace](#gmagick.setimagecolorspace)([int](#language.types.integer) $colorspace): [Gmagick](#class.gmagick)
public [setimagecompose](#gmagick.setimagecompose)([int](#language.types.integer) $composite): [Gmagick](#class.gmagick)
public [setimagedelay](#gmagick.setimagedelay)([int](#language.types.integer) $delay): [Gmagick](#class.gmagick)
public [setimagedepth](#gmagick.setimagedepth)([int](#language.types.integer) $depth): [Gmagick](#class.gmagick)
public [setimagedispose](#gmagick.setimagedispose)([int](#language.types.integer) $disposeType): [Gmagick](#class.gmagick)
public [setimagefilename](#gmagick.setimagefilename)([string](#language.types.string) $filename): [Gmagick](#class.gmagick)
public [setimageformat](#gmagick.setimageformat)([string](#language.types.string) $imageFormat): [Gmagick](#class.gmagick)
public [setimagegamma](#gmagick.setimagegamma)([float](#language.types.float) $gamma): [Gmagick](#class.gmagick)
public [setimagegreenprimary](#gmagick.setimagegreenprimary)([float](#language.types.float) $x, [float](#language.types.float) $y): [Gmagick](#class.gmagick)
public [setimageindex](#gmagick.setimageindex)([int](#language.types.integer) $index): [Gmagick](#class.gmagick)
public [setimageinterlacescheme](#gmagick.setimageinterlacescheme)([int](#language.types.integer) $interlace): [Gmagick](#class.gmagick)
public [setimageiterations](#gmagick.setimageiterations)([int](#language.types.integer) $iterations): [Gmagick](#class.gmagick)
public [setimageprofile](#gmagick.setimageprofile)([string](#language.types.string) $name, [string](#language.types.string) $profile): [Gmagick](#class.gmagick)
public [setimageredprimary](#gmagick.setimageredprimary)([float](#language.types.float) $x, [float](#language.types.float) $y): [Gmagick](#class.gmagick)
public [setimagerenderingintent](#gmagick.setimagerenderingintent)([int](#language.types.integer) $rendering_intent): [Gmagick](#class.gmagick)
public [setimageresolution](#gmagick.setimageresolution)([float](#language.types.float) $xResolution, [float](#language.types.float) $yResolution): [Gmagick](#class.gmagick)
public [setimagescene](#gmagick.setimagescene)([int](#language.types.integer) $scene): [Gmagick](#class.gmagick)
public [setimagetype](#gmagick.setimagetype)([int](#language.types.integer) $imgType): [Gmagick](#class.gmagick)
public [setimageunits](#gmagick.setimageunits)([int](#language.types.integer) $resolution): [Gmagick](#class.gmagick)
public [setimagewhitepoint](#gmagick.setimagewhitepoint)([float](#language.types.float) $x, [float](#language.types.float) $y): [Gmagick](#class.gmagick)
public [setsamplingfactors](#gmagick.setsamplingfactors)([array](#language.types.array) $factors): [Gmagick](#class.gmagick)
public [setsize](#gmagick.setsize)([int](#language.types.integer) $columns, [int](#language.types.integer) $rows): [Gmagick](#class.gmagick)
public [shearimage](#gmagick.shearimage)([mixed](#language.types.mixed) $color, [float](#language.types.float) $xShear, [float](#language.types.float) $yShear): [Gmagick](#class.gmagick)
public [solarizeimage](#gmagick.solarizeimage)([int](#language.types.integer) $threshold): [Gmagick](#class.gmagick)
public [spreadimage](#gmagick.spreadimage)([float](#language.types.float) $radius): [Gmagick](#class.gmagick)
public [stripimage](#gmagick.stripimage)(): [Gmagick](#class.gmagick)
public [swirlimage](#gmagick.swirlimage)([float](#language.types.float) $degrees): [Gmagick](#class.gmagick)
public [thumbnailimage](#gmagick.thumbnailimage)([int](#language.types.integer) $width, [int](#language.types.integer) $height, [bool](#language.types.boolean) $fit = **[false](#constant.false)**): [Gmagick](#class.gmagick)
public [trimimage](#gmagick.trimimage)([float](#language.types.float) $fuzz): [Gmagick](#class.gmagick)
public [writeimage](#gmagick.writeimage)([string](#language.types.string) $filename, [bool](#language.types.boolean) $all_frames = **[false](#constant.false)**): [Gmagick](#class.gmagick)

}

# Gmagick::addimage

(PECL gmagick &gt;= Unknown)

Gmagick::addimage — Añade una nueva imagen a la lista de imágenes del objeto Gmagick

### Descripción

public **Gmagick::addimage**([Gmagick](#class.gmagick) $source): [Gmagick](#class.gmagick)

    Añade una nueva imagen al objeto Gmagick desde la posición actual del objeto de origen.
    Después de la operación la posición del iterador se mueve al final de la lista.

### Parámetros

     source


       El objeto Gmagick de origen





### Valores devueltos

El objeto Gmagick con la imagen añadida

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::addnoiseimage

(PECL gmagick &gt;= Unknown)

Gmagick::addnoiseimage — Añade ruido aleatorio a la imagen

### Descripción

public **Gmagick::addnoiseimage**([int](#language.types.integer) $noise_type): [Gmagick](#class.gmagick)

    Añade ruido aleatorio a la imagen.

### Parámetros

     noise_type


       El tipo de ruido. Consulte esta lista de [constantes de ruido](#gmagick.constants.noise).





### Valores devueltos

El objeto Gmagick con el ruido añadido.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::annotateimage

(PECL gmagick &gt;= Unknown)

Gmagick::annotateimage — Anota una imagen con texto

### Descripción

public **Gmagick::annotateimage**(
    [GmagickDraw](#class.gmagickdraw) $GmagickDraw,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y,
    [float](#language.types.float) $angle,
    [string](#language.types.string) $text
): [Gmagick](#class.gmagick)

Anota una imagen con texto.

### Parámetros

     GmagickDraw


       El objeto [GmagickDraw](#class.gmagickdraw) que contiene la configuración para dibujar el texto






     x


       El índice horizontal en píxeles a la izquierda del texto.






     y


       El índice vertical en píxeles a la línea base del texto.






     angle


       El ángulo en el que escribir el texto.






     text


       La cadena a dibujar.





### Valores devueltos

El objeto [Gmagick](#class.gmagick) con la anotación hecha.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::blurimage

(PECL gmagick &gt;= Unknown)

Gmagick::blurimage — Añade un filtro de borrosidad a la imagen

### Descripción

public **Gmagick::blurimage**([float](#language.types.float) $radius, [float](#language.types.float) $sigma, [int](#language.types.integer) $channel = ?): [Gmagick](#class.gmagick)

Añade un filtro de borrosidad a la imagen.

### Parámetros

     radius


       Radio de borrosidad






     sigma


       Desviación estándar





### Valores devueltos

El objeto [Gmagick](#class.gmagick) borroso

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::borderimage

(PECL gmagick &gt;= Unknown)

Gmagick::borderimage — Rodea la imagen con un borde

### Descripción

public **Gmagick::borderimage**([GmagickPixel](#class.gmagickpixel) $color, [int](#language.types.integer) $width, [int](#language.types.integer) $height): [Gmagick](#class.gmagick)

    Rodea la imagen con un borde del color definido por el objeto [GmagickPixel](#class.gmagickpixel) de color de borde o
    por una cadena de color.

### Parámetros

     color


       El objeto [GmagickPixel](#class.gmagickpixel) o una cadena que contiene el color del borde






     width


       Ancho del borode.






     height


       Alto del borde.





### Valores devueltos

El objeto [GmagickPixel](#class.gmagickpixel) con el borde definido

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::charcoalimage

(PECL gmagick &gt;= Unknown)

Gmagick::charcoalimage — Simula un dibujo a carboncillo

### Descripción

public **Gmagick::charcoalimage**([float](#language.types.float) $radius, [float](#language.types.float) $sigma): [Gmagick](#class.gmagick)

Simula un dibujo a carboncillo.

### Parámetros

     radius


       El radio gaussiano, en píxeles, sin contar el píxel central.






     sigma


       La desviación estándar gaussiana, en píxeles.





### Valores devueltos

El objeto [Gmagick](#class.gmagick) con la simulación de carboncillo

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::chopimage

(PECL gmagick &gt;= Unknown)

Gmagick::chopimage — Elimina una región de una imagen y la recorta

### Descripción

public **Gmagick::chopimage**(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [Gmagick](#class.gmagick)

Elimina una región de una imagen y colapsa la imagen para ocupar la porción eliminada.

### Parámetros

     width


       Ancho del área recortada.






     height


       Alto del área recortada.






     x


       Origen X del área recortada.






     y


       Origen Y del área recortada.





### Valores devueltos

El objeto [Gmagick](#class.gmagick) recortado.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::clear

(PECL gmagick &gt;= Unknown)

Gmagick::clear — Limpia todos los recursos asociados con el objeto Gmagick

### Descripción

public **Gmagick::clear**(): [Gmagick](#class.gmagick)

Limpia todos los recursos asociados al objeto [Gmagick](#class.gmagick).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

    El objeto [Gmagick](#class.gmagick) limpiado.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::commentimage

(PECL gmagick &gt;= Unknown)

Gmagick::commentimage — Añade un comentario a una imagen

### Descripción

public **Gmagick::commentimage**([string](#language.types.string) $comment): [Gmagick](#class.gmagick)

Añade un comentario a una imagen.

### Parámetros

     comment


       El comentario a añadir.





### Valores devueltos

El objeto [Gmagick](#class.gmagick) con el comentario añadido.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::compositeimage

(PECL gmagick &gt;= Unknown)

Gmagick::compositeimage — Compone una imagen en otra

### Descripción

public **Gmagick::compositeimage**(
    [Gmagick](#class.gmagick) $source,
    [int](#language.types.integer) $COMPOSE,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [Gmagick](#class.gmagick)

Compone una imagen en otra en el índice especificado.

### Parámetros

     source


       Objeto [Gmagick](#class.gmagick) que contiene la imagen compuesta






     COMPOSE


       Operador de composción.






     x


       El índice de columna de la imagen compuesta.






     y


       El índice de fila de la imagen compuesta.





### Valores devueltos

El objeto [Gmagick](#class.gmagick) con composiciones.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::\_\_construct

(PECL gmagick &gt;= Unknown)

Gmagick::\_\_construct — El constructor Gmagick

### Descripción

public **Gmagick::\_\_construct**([string](#language.types.string) $filename = ?)

El constructor [Gmagick](#class.gmagick)

### Parámetros

     filename


       La ruta a una imagen para cargar o una matriz de rutas.





### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::cropimage

(PECL gmagick &gt;= Unknown)

Gmagick::cropimage — Extrae una región de la imagen

### Descripción

public **Gmagick::cropimage**(

    

      [int](#language.types.integer) $width
    ,

    

      [int](#language.types.integer) $height
    ,

    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y
): [Gmagick](#class.gmagick)

Extrae una región de la imagen.

### Parámetros

         width



          El ancho del recorte.







         height



          El alto del recorte.






     x


       La coordenada X de la esquina superior izquierda de la región recortada.






     y


       La coordenada Y de la esquina superior izquierda de la región recortada.





### Valores devueltos

El objeto [Gmagick](#class.gmagick) recortado

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::cropthumbnailimage

(PECL gmagick &gt;= Unknown)

Gmagick::cropthumbnailimage — Crea una miniatura recortada

### Descripción

public **Gmagick::cropthumbnailimage**([int](#language.types.integer) $width, [int](#language.types.integer) $height): [Gmagick](#class.gmagick)

Crea una miniatura de tamaño fijo ampliando o reduciendo de escala la imagen y recortando
un área específica desde el centro.

### Parámetros

    width


       El ancho de la miniatura.






     height


       El alto de la miniatura.





### Valores devueltos

El objeto [Gmagick](#class.gmagick) recortado.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::current

(PECL gmagick &gt;= Unknown)

Gmagick::current — Devuelve la refencia al objeto Gmagick acutal

### Descripción

public **Gmagick::current**(): [Gmagick](#class.gmagick)

    Devuelve la refencia al objeto Gmagick acutal con el puntero de imagen apuntando a la secuencia correcta.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Se devuelve a sí mismo si se tuvo éxito.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::cyclecolormapimage

(PECL gmagick &gt;= Unknown)

Gmagick::cyclecolormapimage — Desplaza un mapa de color de una imagen

### Descripción

public **Gmagick::cyclecolormapimage**([int](#language.types.integer) $displace): [Gmagick](#class.gmagick)

Desplaza un mapa de color de una imagen por el número de posiciones dado. Si se
realiza un ciclo del mapa de colores varias veces se puede obtener un efecto
psicodélico.

### Parámetros

     displace


       La cantidad a desplazar el mapa de color.





### Valores devueltos

Se devuelve a sí mismo si se tuvo éxito.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::deconstructimages

(PECL gmagick &gt;= Unknown)

Gmagick::deconstructimages — Devuelve ciertas diferencias de píxeles entre imágenes

### Descripción

public **Gmagick::deconstructimages**(): [Gmagick](#class.gmagick)

Compara cada imagen con la siguiente en una secuencia y devuelve la región circundante máxima de cualquier diferencia de píxeles que se descubra.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un nuevo objeto [Gmagick](#class.gmagick) en caso de éxito.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::despeckleimage

(PECL gmagick &gt;= Unknown)

Gmagick::despeckleimage — Reduce el ruido granular de una imagen

### Descripción

public **Gmagick::despeckleimage**(): [Gmagick](#class.gmagick)

Reduce el ruido granular de una imagen mientras preserva los bordes de la imagen original.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El objeto [Gmagick](#class.gmagick) con el ruido granular reducido si se tuvo éxito.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de Gmagick::despeckleimage()**

&lt;?php
/_ ... _/
?&gt;

    Resultado del ejemplo anterior es similar a:

...

# Gmagick::destroy

(PECL gmagick &gt;= Unknown)

Gmagick::destroy — Destruye un objeto Gmagick

### Descripción

public **Gmagick::destroy**(): [bool](#language.types.boolean)

Destruye un objeto [Gmagick](#class.gmagick) y libera todos los recursos asociados con él

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::drawimage

(PECL gmagick &gt;= Unknown)

Gmagick::drawimage — Renderiza el objeto [GmagickDraw](#class.gmagickdraw) en la imagen actual

### Descripción

public **Gmagick::drawimage**([GmagickDraw](#class.gmagickdraw) $GmagickDraw): [Gmagick](#class.gmagick)

Renderiza el objeto [GmagickDraw](#class.gmagickdraw) en la imagen actual

### Parámetros

     GmagickDraw


       Las operaciones de dibujo para renderizar sobre la imagen.





### Valores devueltos

El objeto Gmagick dibujado

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::edgeimage

(PECL gmagick &gt;= Unknown)

Gmagick::edgeimage — Mejora los bordes dentro de una imagen

### Descripción

public **Gmagick::edgeimage**([float](#language.types.float) $radius): [Gmagick](#class.gmagick)

Mejora los bordes dentro de una imagen con un filtro de convolución del radio dado.
Use un radio de 0 y éste será seleccionado automáticamente.

### Parámetros

     radius


       El radio de la operación.





### Valores devueltos

El objeto [Gmagick](#class.gmagick) con los bordes mejorados.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::embossimage

(PECL gmagick &gt;= Unknown)

Gmagick::embossimage — Devuelve una imagen en escala de grises con un efecto tridimensional

### Descripción

public **Gmagick::embossimage**([float](#language.types.float) $radius, [float](#language.types.float) $sigma): [Gmagick](#class.gmagick)

Devuelve una imagen en escala de grises con un efecto tridimensional. Se convoluciona
la imagen con un operador gaussiano del radio y desviación estándar (sigma) dados.
Para obtener resultados razonables, el radio debería ser mayor que
sigma. Use un radio de 0 y se elegirá un radio apropiado automáticamente.

### Parámetros

     radius


       El radio del efecto.






     sigma


       El valor sigma del efecto.





### Valores devueltos

El objeto [Gmagick](#class.gmagick) "repujado".

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::enhanceimage

(PECL gmagick &gt;= Unknown)

Gmagick::enhanceimage — Mejora la calidad de una imagen con ruido

### Descripción

public **Gmagick::enhanceimage**(): [Gmagick](#class.gmagick)

Aplica un filtro digital que mejora la calidad de una imagen con ruido.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El objeto [Gmagick](#class.gmagick) mejorado.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::equalizeimage

(PECL gmagick &gt;= Unknown)

Gmagick::equalizeimage — Ecualiza el histograma de la imagen

### Descripción

public **Gmagick::equalizeimage**(): [Gmagick](#class.gmagick)

Ecualiza el histograma de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El objeto [Gmagick](#class.gmagick) ecualizado.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::flipimage

(PECL gmagick &gt;= Unknown)

Gmagick::flipimage — Crea una imagen espejo vertical

### Descripción

public **Gmagick::flipimage**(): [Gmagick](#class.gmagick)

Crea una imagen espejo vertical reflejando los píxeles alrededor del eje x central.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

The objeto [Gmagick](#class.gmagick) volteado.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

### Ver también

- [Gmagick::flopimage()](#gmagick.flopimage) - Crea una imagen espejo horizontal

# Gmagick::flopimage

(PECL gmagick &gt;= Unknown)

Gmagick::flopimage — Crea una imagen espejo horizontal

### Descripción

public **Gmagick::flopimage**(): [Gmagick](#class.gmagick)

Crea una imagen espejo horizontal reflejando los píxeles alrededor del eje y central.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

The objeto [Gmagick](#class.gmagick) volteado.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

### Ver también

- [Gmagick::flipimage()](#gmagick.flipimage) - Crea una imagen espejo vertical

# Gmagick::frameimage

(PECL gmagick &gt;= Unknown)

Gmagick::frameimage — Añade un borde tridimensional simulado

### Descripción

public **Gmagick::frameimage**(
    [GmagickPixel](#class.gmagickpixel) $color,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $inner_bevel,
    [int](#language.types.integer) $outer_bevel
): [Gmagick](#class.gmagick)

Añade un borde tridimensional simulado alrededor de la imagen.
El ancho y alto especifican el ancho del borde de las caras verticales y
horizontales del marco. Los biseles interior y exterior
indican el ancho de las sombras interiores y exteriores del
marco.

### Parámetros

     color


       Objeto [GmagickPixel](#class.gmagickpixel) o un valor de tipo float que representa el color mate






     width


       El ancho del borde.






     height


       El alto del borde.






     inner_bevel


       El ancho del bisel interior.






     outer_bevel


       El ancho del bisel exterior.





### Valores devueltos

El objeto [Gmagick](#class.gmagick) enmarcado.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::gammaimage

(PECL gmagick &gt;= Unknown)

Gmagick::gammaimage — Corrección gamma de una imagen

### Descripción

public **Gmagick::gammaimage**([float](#language.types.float) $gamma): [Gmagick](#class.gmagick)

Corrección gamma de una imagen. La misma imagen vista en diferentes dispositivos tendrá
diferencias perceptuales en la manera en que la intensidad de la imagen esté representada
en la pantalla. Especifique niveles gamma indivuduales para los canales rojo,
verde y azul, o ajústelos todos con el parámetro gamma.
El rango de valores es típicamente desde 0.8 a 2.3.

### Parámetros

     gamma


       La cantidad de corrección gamma.





### Valores devueltos

El objeto [Gmagick](#class.gmagick) con el valor gamma corregido.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getcopyright

(PECL gmagick &gt;= Unknown)

Gmagick::getcopyright — Devuelve el copyright de la API GraphicsMagick como una cadena

### Descripción

public **Gmagick::getcopyright**(): [string](#language.types.string)

Devuelve el copyright de la API GraphicsMagick como una cadena.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena que contiene el anuncio del copyright de la API GraphicsMagick y
de la API de C Magickwand.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getfilename

(PECL gmagick &gt;= Unknown)

Gmagick::getfilename — El nombre de archivo asociado a una secuencia de imágenes

### Descripción

public **Gmagick::getfilename**(): [string](#language.types.string)

Devuelve el nombre de archivo asociado a una secuencia de imágenes.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena si se tuvo éxito.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagebackgroundcolor

(PECL gmagick &gt;= Unknown)

Gmagick::getimagebackgroundcolor — Devuelve el color de fondo de la imagen

### Descripción

public **Gmagick::getimagebackgroundcolor**(): [GmagickPixel](#class.gmagickpixel)

Devuelve el color de fondo de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto GmagickPixel establecido al color de fondo de la imagen.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimageblueprimary

(PECL gmagick &gt;= Unknown)

Gmagick::getimageblueprimary — Devuelve el punto primario azul de la cromaticidad

### Descripción

public **Gmagick::getimageblueprimary**(): [array](#language.types.array)

Devuelve el punto primario azul de la cromaticidad de una imagen.

### Parámetros

     x


       El punto x primario azul de la cromaticidad.






     y


       El punto y primario azul de la cromaticidad.





### Valores devueltos

Matriz consistente en las coordenadas "x" e "y" del punto.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagebordercolor

(PECL gmagick &gt;= Unknown)

Gmagick::getimagebordercolor — Devuelve el color del borde de la imagen

### Descripción

public **Gmagick::getimagebordercolor**(): [GmagickPixel](#class.gmagickpixel)

Devuelve el color del borde de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Objeto [GmagickPixel](#class.gmagickpixel) que representa el color del borde

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagechanneldepth

(PECL gmagick &gt;= Unknown)

Gmagick::getimagechanneldepth — Obtiene la profundidad de un canal de imagen en particular

### Descripción

public **Gmagick::getimagechanneldepth**([int](#language.types.integer) $channel_type): [int](#language.types.integer)

Obtiene la profundidad de un canal de imagen en particular.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La profundidad del canal de la imagen

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagecolors

(PECL gmagick &gt;= Unknown)

Gmagick::getimagecolors — Devuelve el color del índice del mapa de color especificado

### Descripción

public **Gmagick::getimagecolors**(): [int](#language.types.integer)

Devuelve el color del índice del mapa de color especificado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de colores en la imagen.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagecolorspace

(PECL gmagick &gt;= Unknown)

Gmagick::getimagecolorspace — Obtiene el espacio de colores de la imagen

### Descripción

public **Gmagick::getimagecolorspace**(): [int](#language.types.integer)

Obtiene el espacio de colores de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El espacio de colores

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagecompose

(PECL gmagick &gt;= Unknown)

Gmagick::getimagecompose — Devuelve el operador de composición asociado a la imagen

### Descripción

public **Gmagick::getimagecompose**(): [int](#language.types.integer)

Devuelve el operador de composición asociado a la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el operador de composición asociado a la imagen.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagedelay

(PECL gmagick &gt;= Unknown)

Gmagick::getimagedelay — Obetiene el retraso de la imagen

### Descripción

public **Gmagick::getimagedelay**(): [int](#language.types.integer)

Obetiene el retraso de la imagen

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el operados de composción asociado con la imagen.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagedepth

(PECL gmagick &gt;= Unknown)

Gmagick::getimagedepth — Obtiene la profundidad de la imagen

### Descripción

public **Gmagick::getimagedepth**(): [int](#language.types.integer)

Obtiene la profundidad de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

La profundidad de la imagen.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagedispose

(PECL gmagick &gt;= Unknown)

Gmagick::getimagedispose — Obtiene el método de disposición de la imagen

### Descripción

public **Gmagick::getimagedispose**(): [int](#language.types.integer)

Obtiene el método de disposición de la imagen

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el método de disposición si se tuvo éxito.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimageextrema

(PECL gmagick &gt;= Unknown)

Gmagick::getimageextrema — Obtiene los extremos de la imagen

### Descripción

public **Gmagick::getimageextrema**(): [array](#language.types.array)

Devuelve una matriz asociativa con las claves "min" y "max". Emite una excepción
**GmagickException** en caso de error.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz asociativa con las claves "min" y "max".

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagefilename

(PECL gmagick &gt;= Unknown)

Gmagick::getimagefilename — Devuelve el nombre de archivo de una imagen en particular de una secuencia

### Descripción

public **Gmagick::getimagefilename**(): [string](#language.types.string)

Devuelve el nombre de archivo de una imagen en particular de una secuencia

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena con el nombre de archivo de la imagen

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimageformat

(PECL gmagick &gt;= Unknown)

Gmagick::getimageformat — Devuelve el formato de una imagen en particular de una secuencia

### Descripción

public **Gmagick::getimageformat**(): [string](#language.types.string)

Devuelve el formato de una imagen en particular de una secuencia.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena que contiene el formato de imagen si se tuvo éxito.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagegamma

(PECL gmagick &gt;= Unknown)

Gmagick::getimagegamma — Obtiene el valor gamma de la imagen

### Descripción

public **Gmagick::getimagegamma**(): [float](#language.types.float)

Obtiene el valor gamma de la imagen

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el valor gamma de la imagen si se tuvo éxito

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagegreenprimary

(PECL gmagick &gt;= Unknown)

Gmagick::getimagegreenprimary — Devuelve el punto primario verde de la cromaticidad

### Descripción

public **Gmagick::getimagegreenprimary**(): [array](#language.types.array)

Devuelve el punto primario verde de la cromaticidad. Devuelve una matriz con las claves "x" e "y".

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz con las claves "x" e "y" si se tuvo éxito.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimageheight

(PECL gmagick &gt;= Unknown)

Gmagick::getimageheight — Devuelve el alto de la imagen

### Descripción

public **Gmagick::getimageheight**(): [int](#language.types.integer)

Devuelve el alto de la imagen

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el alto de la imagen en píxeles.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagehistogram

(PECL gmagick &gt;= Unknown)

Gmagick::getimagehistogram — Obtiene el histograma de la imagen

### Descripción

public **Gmagick::getimagehistogram**(): [array](#language.types.array)

Devuelve el histograma de la imagen como una matriz de objetos [GmagickPixel](#class.gmagickpixel). Lanza una
excepción de tipo **GmagickException** si se produjo un error.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el histograma de la imagen como una matriz de objetos [GmagickPixel](#class.gmagickpixel).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimageindex

(PECL gmagick &gt;= Unknown)

Gmagick::getimageindex — Obtiene el índice de la imagen activa actual

### Descripción

public **Gmagick::getimageindex**(): [int](#language.types.integer)

Devuelve el índice de la imagen activa actual dentro del objeto [Gmagick](#class.gmagick).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El índice de la imagen activa actual.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimageinterlacescheme

(PECL gmagick &gt;= Unknown)

Gmagick::getimageinterlacescheme — Obtiene la combinación de entrelazado de la imagen

### Descripción

public **Gmagick::getimageinterlacescheme**(): [int](#language.types.integer)

Obtiene la combinación de entrelazado de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la combinación de entrelazado como un integer si se tuvo éxito

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimageiterations

(PECL gmagick &gt;= Unknown)

Gmagick::getimageiterations — Obtiene las iteraciones de la imagen

### Descripción

public **Gmagick::getimageiterations**(): [int](#language.types.integer)

Obtiene las iteraciones de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve las iteraciones de la imagen como un valor integer.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagematte

(PECL gmagick &gt;= Unknown)

Gmagick::getimagematte — Comprobar si la imagen tiene un canal mate

### Descripción

public **Gmagick::getimagematte**(): [int](#language.types.integer)

Devuelve **[true](#constant.true)** si la imagen tiene un canal mate, si no, devuelve **[false](#constant.false)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si la imagen tiene un canal mate, si no, devuelve **[false](#constant.false)**.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagemattecolor

(PECL gmagick &gt;= Unknown)

Gmagick::getimagemattecolor — Devuelve el color mate de la imagen

### Descripción

public **Gmagick::getimagemattecolor**(): [GmagickPixel](#class.gmagickpixel)

Devuelve un objeto GmagickPixel si se tuvo éxtito. Lanza un excepción GmagickException si se produjo un error.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto GmagickPixel si se tuvo éxito.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimageprofile

(PECL gmagick &gt;= Unknown)

Gmagick::getimageprofile — Devuelve el perfil nominado de la imagen

### Descripción

public **Gmagick::getimageprofile**([string](#language.types.string) $name): [string](#language.types.string)

Devuelve el perfil nominado de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena que contiene el perfil de la imagen.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimageredprimary

(PECL gmagick &gt;= Unknown)

Gmagick::getimageredprimary — Devuelve el punto primario rojo de la cromaticidad

### Descripción

public **Gmagick::getimageredprimary**(): [array](#language.types.array)

Devuelve el punto primario rojo de la cromaticidad como una matriz con las claves "x" e "y".

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el punto primario rojo de la cromaticidad como una matriz con las claves "x" e "y".

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagerenderingintent

(PECL gmagick &gt;= Unknown)

Gmagick::getimagerenderingintent — Obtiene la propuesta de renderización de la imagen

### Descripción

public **Gmagick::getimagerenderingintent**(): [int](#language.types.integer)

Obtiene la propuesta de renderización de la imagen

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Extrae una región de la imagen y la devuelve como una nueva varita

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimageresolution

(PECL gmagick &gt;= Unknown)

Gmagick::getimageresolution — Obtiene la resolución X e Y de la imagen

### Descripción

public **Gmagick::getimageresolution**(): [array](#language.types.array)

Devuelve la resolución como una matriz.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la resolución como una matriz.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagescene

(PECL gmagick &gt;= Unknown)

Gmagick::getimagescene — Obtiene la escena de la imagen

### Descripción

public **Gmagick::getimagescene**(): [int](#language.types.integer)

Obtiene la escena de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la escena de la imagen.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagesignature

(PECL gmagick &gt;= Unknown)

Gmagick::getimagesignature — Genera un resumen de un mensaje SHA-256

### Descripción

public **Gmagick::getimagesignature**(): [string](#language.types.string)

Genera un resumen de un mensaje SHA-256 para el flujo de píxeles de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena que contiene el hash SHA-256 del archivo.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagetype

(PECL gmagick &gt;= Unknown)

Gmagick::getimagetype — Obtiene el tipo de imagen potencial

### Descripción

public **Gmagick::getimagetype**(): [int](#language.types.integer)

Obtiene el tipo de imagen potencial.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tipo de imagen potencial.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimageunits

(PECL gmagick &gt;= Unknown)

Gmagick::getimageunits — Obtiene las unidades de resolución de la imagen

### Descripción

public **Gmagick::getimageunits**(): [int](#language.types.integer)

Obtiene las unidades de resolución de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve las unidades de resolución de la imagen.

# Gmagick::getimagewhitepoint

(PECL gmagick &gt;= Unknown)

Gmagick::getimagewhitepoint — Devuelve el punto blanco de la cromaticidad

### Descripción

public **Gmagick::getimagewhitepoint**(): [array](#language.types.array)

Devuelve el punto blanco de la cromaticidad como una matriz asociativa con las claves "x" e "y".

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el punto blanco de la cromaticidad como una matriz asociativa con las claves "x" e "y".

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getimagewidth

(PECL gmagick &gt;= Unknown)

Gmagick::getimagewidth — Devuelve el ancho de la imagen

### Descripción

public **Gmagick::getimagewidth**(): [int](#language.types.integer)

Devuelve el ancho de la imagen.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el ancho de la imagen.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getpackagename

(PECL gmagick &gt;= Unknown)

Gmagick::getpackagename — Devuelve el nombre del paquete de GraphicsMagick

### Descripción

public **Gmagick::getpackagename**(): [string](#language.types.string)

Devuelve el nombre del paquete de GraphicsMagick.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre del paquete de GraphicsMagick como una cadena.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getquantumdepth

(PECL gmagick &gt;= Unknown)

Gmagick::getquantumdepth — Obtiene la profundidad de la cuantía de Gmagick como una cadena

### Descripción

public **Gmagick::getquantumdepth**(): [array](#language.types.array)

Obtiene la profundidad de la cuantía de [Gmagick](#class.gmagick) como una cadena.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Obtiene la profundidad de la cuantía de [Gmagick](#class.gmagick) como una cadena.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getreleasedate

(PECL gmagick &gt;= Unknown)

Gmagick::getreleasedate — Devuelve la fecha de distribución de GraphicsMagick como una cadena

### Descripción

public **Gmagick::getreleasedate**(): [string](#language.types.string)

Devuelve la fecha de distribución de GraphicsMagick como una cadena.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la fecha de distribución de GraphicsMagick como una cadena.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getsamplingfactors

(PECL gmagick &gt;= Unknown)

Gmagick::getsamplingfactors — Obtiene el factor de muestreo horizontal y vertical

### Descripción

public **Gmagick::getsamplingfactors**(): [array](#language.types.array)

Obtiene el factor de muestreo horizontal y vertical.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una matriz asociativa con el factor de muestreo horizontal y vertical de la imagen.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getsize

(PECL gmagick &gt;= Unknown)

Gmagick::getsize — Devuelve el tamaño asociado con el objeto Gmagick

### Descripción

public **Gmagick::getsize**(): [array](#language.types.array)

Devuelve el tamaño asociado con el objeto [Gmagick](#class.gmagick) como una matriz con las
claves "columns" (columnas) y "rows" (filas).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tamaño asociado con el objeto [Gmagick](#class.gmagick) como una matriz con las
claves "columns" (columnas) y "rows" (filas).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::getversion

(PECL gmagick &gt;= Unknown)

Gmagick::getversion — Devuelve la versión de la API GraphicsMagick

### Descripción

public **Gmagick::getversion**(): [array](#language.types.array)

Devuelve la versión de la API GraphicsMagick como una cadena y como un número.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la versión de la API GraphicsMagick como una cadena y como un número.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::hasnextimage

(PECL gmagick &gt;= Unknown)

Gmagick::hasnextimage — Comprueba si el objeto tiene más imágenes

### Descripción

public **Gmagick::hasnextimage**(): [mixed](#language.types.mixed)

Devuelve **[true](#constant.true)** si el objeto tiene más imágenes cuando se atraviesa la lista en dirección
hacia delante.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el objeto tiene más imágenes cuando se atraviesa la lista en dirección
hacia delante, devuelve **[false](#constant.false)** si no hay ninguna.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::haspreviousimage

(PECL gmagick &gt;= Unknown)

Gmagick::haspreviousimage — Verifica si el objeto tiene una imagen previa

### Descripción

public **Gmagick::haspreviousimage**(): [mixed](#language.types.mixed)

Devuelve **[true](#constant.true)** si el objeto tiene más imágenes cuando se atraviesa la lista en la dirección opuesta

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el objeto tiene más imágenes cuando se atraviesa la lista en la
dirección opuesta, devuelve **[false](#constant.false)** si no hay ninguna.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::implodeimage

(PECL gmagick &gt;= Unknown)

Gmagick::implodeimage — Crea una nueva imagen como una copia

### Descripción

public **Gmagick::implodeimage**([float](#language.types.float) $radius): [mixed](#language.types.mixed)

Crea una nueva imagen que es una copia de una existente con los píxeles de la imagen
"implosionados" por el porcentaje especificado.

### Parámetros

     radius


       El radio de la implosión.





### Valores devueltos

Devuelve el objeto [Gmagick](#class.gmagick) implosionado.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::labelimage

(PECL gmagick &gt;= Unknown)

Gmagick::labelimage — Añade una etiqueta a una imagen

### Descripción

public **Gmagick::labelimage**([string](#language.types.string) $label): [mixed](#language.types.mixed)

Añade una etiqueta a una imagen.

### Parámetros

     label


       La etiqueta a añadir





### Valores devueltos

Objeto Gmagick con etiqueta.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::levelimage

(PECL gmagick &gt;= Unknown)

Gmagick::levelimage — Ajusta los niveles de la imagen

### Descripción

public **Gmagick::levelimage**(
    [float](#language.types.float) $blackPoint,
    [float](#language.types.float) $gamma,
    [float](#language.types.float) $whitePoint,
    [int](#language.types.integer) $channel = Gmagick::CHANNEL_DEFAULT
): [mixed](#language.types.mixed)

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


       El punto negro de la imagen.






     gamma


       El valor gamma






     whitePoint


       El punto blanco de la imagen.






     channel


       Proporcione cualquier constante de canal que sea válida para su modo de canal. Para
       aplicar más de un canal, combine las constantes channeltype usando
       operadores a nivel de bits. Consulte esta lista de
       [constantes de canal](#gmagick.constants.channel).





### Valores devueltos

Objeto [Gmagick](#class.gmagick) con la imagen nivelada.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::magnifyimage

(PECL gmagick &gt;= Unknown)

Gmagick::magnifyimage — Redimensiona una imagen por 2 manteniendo las proporciones

### Descripción

public **Gmagick::magnifyimage**(): [mixed](#language.types.mixed)

Redimensiona una imagen por 2 manteniendo las proporciones.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El objeto [Gmagick](#class.gmagick) modificado.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::mapimage

(PECL gmagick &gt;= Unknown)

Gmagick::mapimage — Sustituye los colores de una imagen por los colores más cercanos de una imagen de referencia

### Descripción

public **Gmagick::mapimage**([gmagick](#class.gmagick) $gmagick, [bool](#language.types.boolean) $dither): [Gmagick](#class.gmagick)

Sustituye los colores de una imagen por los colores más cercanos de una imagen de referencia.

### Parámetros

     gmagick


       La imagen de referencia.






     dither


       Entero mayor que 0 para difuminar la imagen mapeada.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::medianfilterimage

(PECL gmagick &gt;= Unknown)

Gmagick::medianfilterimage — Aplica un filtro digital

### Descripción

public **Gmagick::medianfilterimage**([float](#language.types.float) $radius): [void](language.types.void.html)

Aplica un filtro digital que mejora la calidad del ruido de una imagen.
Cada píxel es reemplazado por la mediana en un conjunto de píxeles vecinos
tal como se define por el radio.

### Parámetros

     radius


       El radio de los píxeles vecinos.





### Valores devueltos

El objeto [Gmagick](#class.gmagick) al cual se le aplicó el filtro.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::minifyimage

(PECL gmagick &gt;= Unknown)

Gmagick::minifyimage — Reduce una imagen a la mitad manteniendo las proporciones

### Descripción

public **Gmagick::minifyimage**(): [Gmagick](#class.gmagick)

Reduce una imagen a la mitad manteniendo las proporciones.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::modulateimage

(PECL gmagick &gt;= Unknown)

Gmagick::modulateimage — Controla la luminosidad, la saturación y el tono

### Descripción

public **Gmagick::modulateimage**([float](#language.types.float) $brightness, [float](#language.types.float) $saturation, [float](#language.types.float) $hue): [Gmagick](#class.gmagick)

Permite controlar la luminosidad, la saturación y el tono de una imagen.
El tono es un porcentaje de una rotación absoluta desde la posición
actual. Por ejemplo, 50 corresponde a una rotación de 90 grados en el sentido
contrario a las agujas de un reloj, 150, una rotación de 90 grados en el sentido
de las agujas de un reloj, o bien, 0 o 200 corresponde a una rotación de 180
grados.

### Parámetros

     brightness


       El número de porcentaje a modificar para la luminosidad (-100 a +100).






     saturation


       El número de porcentaje a modificar para la saturación (-100 a +100).






     hue


       El número de porcentaje a modificar para el tono (-100 a +100).





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::motionblurimage

(PECL gmagick &gt;= Unknown)

Gmagick::motionblurimage — Simula un desenfoque cinético

### Descripción

public **Gmagick::motionblurimage**([float](#language.types.float) $radius, [float](#language.types.float) $sigma, [float](#language.types.float) $angle): [Gmagick](#class.gmagick)

Simula un desenfoque cinético. La imagen es procesada con un operador Gaussiano de un radio
dado y una desviación estándar (sigma). Para obtener buenos resultados, el radio
debe ser mayor que el sigma. Utilice un radio de 0 y el método
**Gmagick::motionblurimage()** selecciona el mejor radio automáticamente. El argumento
angle proporciona el ángulo del desenfoque cinético.

### Parámetros

     radius


       El radio del Gaussiano, en píxeles, sin contar el píxel central.






     sigma


       La desviación estándar del Gaussiano, en píxeles.






     angle


       Aplica el efecto a lo largo del ángulo.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::newimage

(PECL gmagick &gt;= Unknown)

Gmagick::newimage — Crea una nueva imagen

### Descripción

public **Gmagick::newimage**(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [string](#language.types.string) $background,
    [string](#language.types.string) $format = ?
): [Gmagick](#class.gmagick)

Crea una nueva imagen con el color de fondo especificado.

### Parámetros

     width


       Ancho de la nueva imagen.






     height


       Alto de la nueva imagen.






     background


       El color de fondo a utilizar para la imagen (en forma de número de punto flotante).






     format


       El formato de la imagen.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::nextimage

(PECL gmagick &gt;= Unknown)

Gmagick::nextimage — Se desplaza a la imagen siguiente

### Descripción

public **Gmagick::nextimage**(): [bool](#language.types.boolean)

Asocia la imagen siguiente en la lista de imágenes con un objeto
[Gmagick](#class.gmagick).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::normalizeimage

(PECL gmagick &gt;= Unknown)

Gmagick::normalizeimage — Mejora el contraste del color de la imagen

### Descripción

public **Gmagick::normalizeimage**([int](#language.types.integer) $channel = ?): [Gmagick](#class.gmagick)

Mejora el contraste del color de la imagen ajustando
el color de los píxeles para que correspondan al intervalo de colores
disponibles.

### Parámetros

     channel


       Canal a normalizar.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::oilpaintimage

(PECL gmagick &gt;= Unknown)

Gmagick::oilpaintimage — Simula una pintura al óleo

### Descripción

public **Gmagick::oilpaintimage**(

      [float](#language.types.float) $radius
    ): [Gmagick](#class.gmagick)

Aplica un filtro de efecto especial que simula una pintura al óleo.
Cada píxel es reemplazado por el color más frecuente que suceda en una
región circular definida por el radio.

### Parámetros

           radius



            El radio de la zona inmediata circular.







### Valores devueltos

El objeto Gmagick si se tuvo éxito

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::previousimage

(PECL gmagick &gt;= Unknown)

Gmagick::previousimage — Moverse a la imagen previa del objeto

### Descripción

public **Gmagick::previousimage**(): [bool](#language.types.boolean)

Asocia la imagen previa de una lista de imágenes con el objeto Gmagick.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::profileimage

(PECL gmagick &gt;= Unknown)

Gmagick::profileimage — Añade o elimina un perfil de una imagen

### Descripción

public **Gmagick::profileimage**([string](#language.types.string) $name, [string](#language.types.string) $profile): [Gmagick](#class.gmagick)

Añade o elimina un perfil ICC, IPTC o genérico de una imagen.
Si el perfil es **[null](#constant.null)**, será eliminado de la imagen, de lo contrario,
será añadido. Utilice \* como nombre y un perfil **[null](#constant.null)** para
eliminar todos los perfiles de la imagen.

### Parámetros

     name


       Nombre del perfil a añadir o eliminar: perfil ICC, IPTC o genérico.






     profile


       El perfil.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::quantizeimage

(PECL gmagick &gt;= Unknown)

Gmagick::quantizeimage — Analiza los colores dentro de una imagen de referencia

### Descripción

public **Gmagick::quantizeimage**(
    [int](#language.types.integer) $numColors,
    [int](#language.types.integer) $colorspace,
    [int](#language.types.integer) $treeDepth,
    [bool](#language.types.boolean) $dither,
    [bool](#language.types.boolean) $measureError
): [Gmagick](#class.gmagick)

Analiza los colores dentro de una imagen de referencia y elige un número fijo de
colores que representan la imagen. El objetivo del algoritmo es minimizar la diferencia
de colores entre la imagen de entrada y de salida mientras minimiza el tiempo de procesamiento.

### Parámetros

     numColors


       El número de colores.






     colorspace


       Lleva a cabo una reducción de color en este espacio de color, normalmaente RGBColorspace.






     treeDepth


       Normalmente, este valor de tipo integer es cero o uno. Un cero o uno indica a Quantize
       que elija una profundidad de árbol óptima de Log4(número_colores).% Un árbol de esta profundidad
       generalmente permite la mejor representación de la imagen de referencia con la menor cantidad
       de memoria y la velocidad de computación más rápida. En algunos casos, como una imagen con
       dispersión de color baja (un número bajo de colores), se requiere un valor distinto de
       Log4(número_colores). Para expandir el árbol de colores completamente, use un valor de 8.






     dither


       Un valor distinto de cero distribuye la diferencia entre una imagen original y el algoritmo
       de reducción de color correspondiente a los píxeles de la zona inmediata a lo largo de una
       curva de Hilbert.






     measureError


       Un valor distinto de cero mide la diferencia entre la imagen original y la cuantificada. Esta
       diferencia es el error de cuantización total. El error se computa sumando, en todos los píxeles
       de una imagen, la distancia al cuadrado en el espacio RGB entre cada valor de píxel de referncia
       y su valor cuantizado.





### Valores devueltos

El objeto Gmagick si se tuvo éxito

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::quantizeimages

(PECL gmagick &gt;= Unknown)

Gmagick::quantizeimages — Analiza los colores dentro de una secuencia de imágenes

### Descripción

public **Gmagick::quantizeimages**(
    [int](#language.types.integer) $numColors,
    [int](#language.types.integer) $colorspace,
    [int](#language.types.integer) $treeDepth,
    [bool](#language.types.boolean) $dither,
    [bool](#language.types.boolean) $measureError
): [Gmagick](#class.gmagick)

Analiza los colores dentro de una secuencia de imágenes y elige un número fijo de
colores que representan la imagen. El objetivo del algoritmo es minimizar la diferencia
de colores entre la imagen de entrada y de salida mientras minimiza el tiempo de procesamiento.

### Parámetros

     numColors


       El número de colores.






     colorspace


       Lleva a cabo una reducción de color en este espacio de color, normalmaente RGBColorspace.






     treeDepth


       Normalmente, este valor de tipo integer es cero o uno. Un cero o uno indica a Quantize
       que elija una profundidad de árbol óptima de Log4(número_colores).% Un árbol de esta profundidad
       generalmente permite la mejor representación de la imagen de referencia con la menor cantidad
       de memoria y la velocidad de computación más rápida. En algunos casos, como una imagen con
       dispersión de color baja (un número bajo de colores), se requiere un valor distinto de
       Log4(número_colores). Para expandir el árbol de colores completamente, use un valor de 8.






     dither


       Un valor distinto de cero distribuye la diferencia entre una imagen original y el algoritmo
       de reducción de color correspondiente a los píxeles de la zona inmediata a lo largo de una
       curva de Hilbert.






     measureError


       Un valor distinto de cero mide la diferencia entre la imagen original y la cuantificada. Esta
       diferencia es el error de cuantización total. El error se computa sumando, en todos los píxeles
       de una imagen, la distancia al cuadrado en el espacio RGB entre cada valor de píxel de referncia
       y su valor cuantizado.





### Valores devueltos

El objeto Gmagick si se tuvo éxito

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::queryfontmetrics

(PECL gmagick &gt;= Unknown)

Gmagick::queryfontmetrics — Devuelve una matriz que representa las métricas de la fuente

### Descripción

public **Gmagick::queryfontmetrics**([GmagickDraw](#class.gmagickdraw) $draw, [string](#language.types.string) $text): [array](#language.types.array)

MagickQueryFontMetrics() devuelve una matriz que representa las métricas de la fuente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El objeto Gmagick si se tuvo éxito

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::queryfonts

(PECL gmagick &gt;= Unknown)

Gmagick::queryfonts — Devuelve las fuentes configuradas

### Descripción

public **Gmagick::queryfonts**([string](#language.types.string) $pattern = "\*"): [array](#language.types.array)

Devuelve las fuentes soportadas por Gmagick.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El objeto Gmagick si se tuvo éxito

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::queryformats

(PECL gmagick &gt;= Unknown)

Gmagick::queryformats — Devuelve los formatos soportados por Gmagick

### Descripción

public **Gmagick::queryformats**([string](#language.types.string) $pattern = "\*"): [array](#language.types.array)

Devuelve los formatos soportados por [Gmagick](#class.gmagick).

### Parámetros

     pattern


       Especifica un [string](#language.types.string) que contiene un patrón.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::radialblurimage

(PECL gmagick &gt;= Unknown)

Gmagick::radialblurimage — Desenfoca una imagen siguiendo un radio

### Descripción

public **Gmagick::radialblurimage**([float](#language.types.float) $angle, [int](#language.types.integer) $channel = Gmagick::CHANNEL_DEFAULT): [Gmagick](#class.gmagick)

Desenfoca una imagen siguiendo un radio.

### Parámetros

     angle


       El ángulo de desenfoque, en grados.






     channel


       Canal afectado.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::raiseimage

(PECL gmagick &gt;= Unknown)

Gmagick::raiseimage — Crea un botón con un efecto 3D

### Descripción

public **Gmagick::raiseimage**(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $x,
    [int](#language.types.integer) $y,
    [bool](#language.types.boolean) $raise
): [Gmagick](#class.gmagick)

Crea un botón con un efecto 3D aclarando y oscureciendo los ángulos
de la imagen. La altura y el margen de los miembros de raise_info
definen el ancho del borde vertical y horizontal del efecto.

### Parámetros

     width


       Ancho de la zona a tratar.






     height


       Altura de la zona a tratar.






     x


       Coordenada en X.






     y


       Coordenada en Y.






     raise


       Un valor, distinto de 0, para crear el efecto 3D; de lo contrario, el efecto será atenuado.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::read

(PECL gmagick &gt;= Unknown)

Gmagick::read — Lee una imagen desde un fichero

### Descripción

public **Gmagick::read**([string](#language.types.string) $filename): [Gmagick](#class.gmagick)

Lee una imagen desde un fichero.

### Parámetros

     filename


       El nombre del fichero de imagen.





### Valores devueltos

Un objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::readimage

(PECL gmagick &gt;= Unknown)

Gmagick::readimage — Lee una imagen desde un fichero

### Descripción

public **Gmagick::readimage**([string](#language.types.string) $filename): [Gmagick](#class.gmagick)

Lee una imagen desde un fichero.

### Parámetros

     filename


       El nombre del fichero de imagen.





### Valores devueltos

Un objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::readimageblob

(PECL gmagick &gt;= Unknown)

Gmagick::readimageblob — Lee una imagen desde una cadena binaria

### Descripción

public **Gmagick::readimageblob**([string](#language.types.string) $imageContents, [string](#language.types.string) $filename = ?): [Gmagick](#class.gmagick)

Lee una imagen desde una cadena binaria.

### Parámetros

     imageContents


       Contenido de la imagen.






     filename


       El nombre del fichero de imagen.





### Valores devueltos

Un objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::readimagefile

(PECL gmagick &gt;= Unknown)

Gmagick::readimagefile — El propósito de readimagefile

### Descripción

public **Gmagick::readimagefile**([resource](#language.types.resource) $fp, [string](#language.types.string) $filename = ?): [Gmagick](#class.gmagick)

Lee una imagen o una secuencia de imágenes desde un descriptor de fichero abierto.

### Parámetros

     fp


       El descriptor de fichero.





### Valores devueltos

Un objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::reducenoiseimage

(PECL gmagick &gt;= Unknown)

Gmagick::reducenoiseimage — Suaviza los contornos de la imagen

### Descripción

public **Gmagick::reducenoiseimage**([float](#language.types.float) $radius): [Gmagick](#class.gmagick)

Suaviza los contornos de la imagen manteniendo la
información de las esquinas. El algoritmo funciona
reemplazando cada píxel con su vecino más cercano
en valor. Un vecino se define por su radio.
Utilizar un radio de 0 y el método **Gmagick::reducenoiseimage()**
seleccionará un radio apropiado automáticamente.

### Parámetros

     radius


       El radio del píxel vecino.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::removeimage

(PECL gmagick &gt;= Unknown)

Gmagick::removeimage — Elimina una imagen de la lista de imágenes

### Descripción

public **Gmagick::removeimage**(): [Gmagick](#class.gmagick)

Elimina una imagen de la lista de imágenes.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::removeimageprofile

(PECL gmagick &gt;= Unknown)

Gmagick::removeimageprofile — Elimina el perfil nombrado de la imagen y lo devuelve

### Descripción

public **Gmagick::removeimageprofile**([string](#language.types.string) $name): [string](#language.types.string)

Elimina el perfil nombrado de la imagen y lo devuelve.

### Parámetros

     name


       El nombre del perfil a devolver: ICC, IPTC, o perfil genérico.





### Valores devueltos

El perfil nombrado.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::resampleimage

(PECL gmagick &gt;= Unknown)

Gmagick::resampleimage — Re-muestrea la imagen a la resolución deseada

### Descripción

public **Gmagick::resampleimage**(
    [float](#language.types.float) $xResolution,
    [float](#language.types.float) $yResolution,
    [int](#language.types.integer) $filter,
    [float](#language.types.float) $blur
): [Gmagick](#class.gmagick)

Re-muestrea la imagen a la resolución deseada.

### Parámetros

     xResolution


       La nueva resolución x de la imagen.






     yResolution


       La nueva resolución x de la imagen.






     filter


       El filtro de imagen a usar.






     blur


       El factor de borrosidad donde mayor que que es borroso, menor que uno es nítido.





### Valores devueltos

El objeto Gmagick si se tuvo éxito

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::resizeimage

(PECL gmagick &gt;= Unknown)

Gmagick::resizeimage — Redimensiona una imagen

### Descripción

public **Gmagick::resizeimage**(
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $filter,
    [float](#language.types.float) $blur,
    [bool](#language.types.boolean) $fit = **[false](#constant.false)**
): [Gmagick](#class.gmagick)

Redimensiona una imagen a las dimensiones deseadas, con un filtro.

### Parámetros

     width


       El número de columnas en la imagen redimensionada.






     height


       El número de líneas en la imagen redimensionada.






     filter


       El filtro de la imagen a utilizar.






     blur


       El factor de desenfoque, donde los valores superiores a 1 corresponden
       a completamente desenfocado, y los valores inferiores a 1, lo contrario.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::rollimage

(PECL gmagick &gt;= Unknown)

Gmagick::rollimage — Compensa una imagen

### Descripción

public **Gmagick::rollimage**([int](#language.types.integer) $x, [int](#language.types.integer) $y): [Gmagick](#class.gmagick)

Compensa una imagen tal como está definido por x e y.

### Parámetros

     x


       El índice x.






     y


       El índice y.





### Valores devueltos

El objeto Gmagick si se tuvo éxito

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::rotateimage

(PECL gmagick &gt;= Unknown)

Gmagick::rotateimage — Rota una imagen

### Descripción

public **Gmagick::rotateimage**([mixed](#language.types.mixed) $color, [float](#language.types.float) $degrees): [Gmagick](#class.gmagick)

Rota una imagen el número de grados especificado. Los triángulos
vacíos sobrantes por la rotación de la imagen se rellenan
con el color de fondo.

### Parámetros

     color


       El píxel de color de fondo.






     degrees


       El número de grados que se va a rotar la imagen.





### Valores devueltos

El objeto Gmagick si se tuvo éxito

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::scaleimage

(PECL gmagick &gt;= Unknown)

Gmagick::scaleimage — Redimensiona una imagen

### Descripción

public **Gmagick::scaleimage**([int](#language.types.integer) $width, [int](#language.types.integer) $height, [bool](#language.types.boolean) $fit = **[false](#constant.false)**): [Gmagick](#class.gmagick)

Redimensiona una imagen a las dimensiones proporcionadas. Los otros parámetros
serán calculados si 0 es pasado como argumento.

### Parámetros

     width


       El número de columnas en la imagen redimensionada.






     height


       El número de líneas en la imagen redimensionada.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::separateimagechannel

(PECL gmagick &gt;= Unknown)

Gmagick::separateimagechannel — Separa un canal de una imagen

### Descripción

public **Gmagick::separateimagechannel**([int](#language.types.integer) $channel): [Gmagick](#class.gmagick)

Separa un canal de una imagen y devuelve una imagen en escala de grises.
Un canal es un componente de un color particular de cada píxel de una imagen.

### Parámetros

     channel


       Una de las constantes [de canales](#gmagick.constants.channel)
       (Gmagick::CHANNEL_*).





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setCompressionQuality

(No version information available, might only be in Git)

Gmagick::setCompressionQuality — Define la calidad de compresión por defecto del objeto

### Descripción

**Gmagick::setCompressionQuality**(
[int](#language.types.integer) $quality
): [Gmagick](#class.gmagick)

Define la calidad de compresión por defecto del objeto.

### Parámetros

     quality


       El valor por defecto de GraphicsMagick es 75.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

### Ejemplos

      **Ejemplo #1 Ejemplo con Gmagick::setCompressionQuality()**



      &lt;?php

$gm = new Gmagick();
$gm-&gt;read("magick:rose");
$gm-&gt;setCompressionQuality(2);
?&gt;

# Gmagick::setfilename

(PECL gmagick &gt;= Unknown)

Gmagick::setfilename — Define el nombre de archivo antes de leer o escribir una imagen

### Descripción

public **Gmagick::setfilename**([string](#language.types.string) $filename): [Gmagick](#class.gmagick)

Define el nombre de archivo antes de leer o escribir una imagen.

### Parámetros

     filename


       El nombre de archivo de la imagen.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimagebackgroundcolor

(PECL gmagick &gt;= Unknown)

Gmagick::setimagebackgroundcolor — Define la color de fondo de la imagen

### Descripción

public **Gmagick::setimagebackgroundcolor**([GmagickPixel](#class.gmagickpixel) $color): [Gmagick](#class.gmagick)

Define la color de fondo de la imagen.

### Parámetros

     color


       La color de fondo.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimageblueprimary

(PECL gmagick &gt;= Unknown)

Gmagick::setimageblueprimary — Define el punto azul primario de la imagen cromática

### Descripción

public **Gmagick::setimageblueprimary**([float](#language.types.float) $x, [float](#language.types.float) $y): [Gmagick](#class.gmagick)

Define el punto azul primario de la imagen cromática.

### Parámetros

     x


       Coordenada en X del punto del azul primario.






     y


       Coordenada en Y del punto del azul primario.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimagebordercolor

(PECL gmagick &gt;= Unknown)

Gmagick::setimagebordercolor — Define la color de la frontera de la imagen

### Descripción

public **Gmagick::setimagebordercolor**([GmagickPixel](#class.gmagickpixel) $color): [Gmagick](#class.gmagick)

Define la color de la frontera de la imagen.

### Parámetros

     color


       La color de la frontera.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimagechanneldepth

(PECL gmagick &gt;= Unknown)

Gmagick::setimagechanneldepth — Define la profundidad de un canal particular de la imagen

### Descripción

public **Gmagick::setimagechanneldepth**([int](#language.types.integer) $channel, [int](#language.types.integer) $depth): [Gmagick](#class.gmagick)

Define la profundidad de un canal particular de la imagen.

### Parámetros

     channel


       Una de las constantes [de canales](#gmagick.constants.channel)
       (Gmagick::CHANNEL_*).






     depth


       La profundidad de la imagen, en bytes.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimagecolorspace

(PECL gmagick &gt;= Unknown)

Gmagick::setimagecolorspace — Define el espacio de colores de la imagen

### Descripción

public **Gmagick::setimagecolorspace**([int](#language.types.integer) $colorspace): [Gmagick](#class.gmagick)

Define el espacio de colores de la imagen.

### Parámetros

     colorspace


       Una de las constantes de [espacio de colores de la imagen](#gmagick.constants.colorspace)
       (Gmagick::COLORSPACE_*).





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimagecompose

(PECL gmagick &gt;= Unknown)

Gmagick::setimagecompose — Establece el operador de composción de una imagen

### Descripción

public **Gmagick::setimagecompose**([int](#language.types.integer) $composite): [Gmagick](#class.gmagick)

Establece el operador de composción de una imagen.

### Parámetros

     composite


       El operador de composición de la imagen.





### Valores devueltos

El objeto Gmagick si se tuvo éxito

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimagedelay

(PECL gmagick &gt;= Unknown)

Gmagick::setimagedelay — Define el retraso de la imagen

### Descripción

public **Gmagick::setimagedelay**([int](#language.types.integer) $delay): [Gmagick](#class.gmagick)

Define el retraso de la imagen.

### Parámetros

     delay


       El retraso de la imagen, en centésimas de segundo.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimagedepth

(PECL gmagick &gt;= Unknown)

Gmagick::setimagedepth — Define la profundidad de la imagen

### Descripción

public **Gmagick::setimagedepth**([int](#language.types.integer) $depth): [Gmagick](#class.gmagick)

Define la profundidad de la imagen.

### Parámetros

     depth


       La profundidad de la imagen, en bytes: 8, 16, o 32.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimagedispose

(PECL gmagick &gt;= Unknown)

Gmagick::setimagedispose — Define el método de disposición de la imagen

### Descripción

public **Gmagick::setimagedispose**([int](#language.types.integer) $disposeType): [Gmagick](#class.gmagick)

Define el método de disposición de la imagen.

### Parámetros

     disposeType


       El tipo de disposición de la imagen.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimagefilename

(PECL gmagick &gt;= Unknown)

Gmagick::setimagefilename — Define el nombre del fichero para una imagen particular de una secuencia

### Descripción

public **Gmagick::setimagefilename**([string](#language.types.string) $filename): [Gmagick](#class.gmagick)

Define el nombre del fichero para una imagen particular de una secuencia.

### Parámetros

     filename


       El nombre del fichero de la imagen.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimageformat

(PECL gmagick &gt;= Unknown)

Gmagick::setimageformat — Define el formato de una imagen

### Descripción

public **Gmagick::setimageformat**([string](#language.types.string) $imageFormat): [Gmagick](#class.gmagick)

Define el formato de una imagen particular de una secuencia.

### Parámetros

     imageFormat


       El formato de la imagen.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimagegamma

(PECL gmagick &gt;= Unknown)

Gmagick::setimagegamma — Define el gamma de la imagen

### Descripción

public **Gmagick::setimagegamma**([float](#language.types.float) $gamma): [Gmagick](#class.gmagick)

Define el gamma de la imagen.

### Parámetros

     gamma


       El gamma de la imagen.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimagegreenprimary

(PECL gmagick &gt;= Unknown)

Gmagick::setimagegreenprimary — Define el punto verde en la imagen cromática primaria

### Descripción

public **Gmagick::setimagegreenprimary**([float](#language.types.float) $x, [float](#language.types.float) $y): [Gmagick](#class.gmagick)

Define el punto verde en la imagen cromática primaria.

### Parámetros

     x


       Coordenada en X del punto verde de la imagen cromática.






     y


       Coordenada en Y del punto verde de la imagen cromática.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimageindex

(PECL gmagick &gt;= Unknown)

Gmagick::setimageindex — Establece el iterador en la posición especificada en la lista de imágenes apuntada por su índice

### Descripción

public **Gmagick::setimageindex**([int](#language.types.integer) $index): [Gmagick](#class.gmagick)

Establece el iterador en la posición especificada en la lista de imágenes apuntada por su índice.

### Parámetros

     index


       El número de la escena.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimageinterlacescheme

(PECL gmagick &gt;= Unknown)

Gmagick::setimageinterlacescheme — Define el esquema de entrelazado de la imagen

### Descripción

public **Gmagick::setimageinterlacescheme**([int](#language.types.integer) $interlace): [Gmagick](#class.gmagick)

Define el esquema de entrelazado de la imagen.

### Parámetros

     interlace


       Una de las constantes de los [esquemas de entrelazado de la imagen](#gmagick.constants.interlace)
       (Gmagick::INTERLACE_*).





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimageiterations

(PECL gmagick &gt;= Unknown)

Gmagick::setimageiterations — Define las iteraciones de la imagen

### Descripción

public **Gmagick::setimageiterations**([int](#language.types.integer) $iterations): [Gmagick](#class.gmagick)

Define las iteraciones de la imagen.

### Parámetros

     iterations


       El tiempo de la imagen en centésimas de segundo.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimageprofile

(PECL gmagick &gt;= Unknown)

Gmagick::setimageprofile — Añade un perfil nombrado al objeto Gmagick

### Descripción

public **Gmagick::setimageprofile**([string](#language.types.string) $name, [string](#language.types.string) $profile): [Gmagick](#class.gmagick)

Añade un perfil nombrado al objeto Gmagick. Si un perfil con el mismo nobre ya existe, se reemplaza.
Este método difiere del método Gmagick::ProfileImage() en que no aplica ningún perfil de color CMS.

### Parámetros

     name


       El nombre del perfil a añadir o eliminar: ICC, IPTC, o perfil genérico.






     profile


       El perfil.





### Valores devueltos

El objeto Gmagick si se tuvo éxito.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimageredprimary

(PECL gmagick &gt;= Unknown)

Gmagick::setimageredprimary — Define el punto rojo en la imagen cromática primaria

### Descripción

public **Gmagick::setimageredprimary**([float](#language.types.float) $x, [float](#language.types.float) $y): [Gmagick](#class.gmagick)

Define el punto rojo en la imagen cromática primaria.

### Parámetros

     x


       Coordenada en X del punto rojo de la imagen cromática.






     y


       Coordenada en Y del punto rojo de la imagen cromática.





### Valores devueltos

El objeto Gmagick en caso de éxito.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimagerenderingintent

(PECL gmagick &gt;= Unknown)

Gmagick::setimagerenderingintent — Define la imagen de renderizado

### Descripción

public **Gmagick::setimagerenderingintent**([int](#language.types.integer) $rendering_intent): [Gmagick](#class.gmagick)

Define la imagen de renderizado.

### Parámetros

     rendering_intent


       Una de las constantes de [renderizado de imagen](#gmagick.constants.renderingintent)
       (Gmagick::RENDERINGINTENT_*).





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimageresolution

(PECL gmagick &gt;= Unknown)

Gmagick::setimageresolution — Establece la resolución de la imagen

### Descripción

public **Gmagick::setimageresolution**([float](#language.types.float) $xResolution, [float](#language.types.float) $yResolution): [Gmagick](#class.gmagick)

Establece la resolución de la imagen.

### Parámetros

     xResolution


       La resolución x de la imagen.






     yResolution


       La resolución y de la imagen.





### Valores devueltos

El objeto Gmagick si se tuvo éxito.

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimagescene

(PECL gmagick &gt;= Unknown)

Gmagick::setimagescene — Define la imagen de escena

### Descripción

public **Gmagick::setimagescene**([int](#language.types.integer) $scene): [Gmagick](#class.gmagick)

Define la imagen de escena.

### Parámetros

     scene


       El número de la escena en la imagen.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimagetype

(PECL gmagick &gt;= Unknown)

Gmagick::setimagetype — Define el tipo de la imagen

### Descripción

public **Gmagick::setimagetype**([int](#language.types.integer) $imgType): [Gmagick](#class.gmagick)

Define el tipo de la imagen.

### Parámetros

     imgType


       Una de las constantes de [tipo de imagen](#gmagick.constants.imagetype)
       (Gmagick::IMGTYPE_*).





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimageunits

(PECL gmagick &gt;= Unknown)

Gmagick::setimageunits — Define las unidades a utilizar para la resolución de la imagen

### Descripción

public **Gmagick::setimageunits**([int](#language.types.integer) $resolution): [Gmagick](#class.gmagick)

Define las unidades a utilizar para la resolución de la imagen.

### Parámetros

     resolution


       Una de las constantes de [resolución](#gmagick.constants.resolution)
       (Gmagick::RESOLUTION_*).





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setimagewhitepoint

(PECL gmagick &gt;= Unknown)

Gmagick::setimagewhitepoint — Define el punto blanco en la imagen cromática primaria

### Descripción

public **Gmagick::setimagewhitepoint**([float](#language.types.float) $x, [float](#language.types.float) $y): [Gmagick](#class.gmagick)

Define el punto blanco en la imagen cromática primaria.

### Parámetros

     x


       Coordenada en X del punto blanco de la imagen cromática.






     y


       Coordenada en Y del punto blanco de la imagen cromática.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setsamplingfactors

(PECL gmagick &gt;= Unknown)

Gmagick::setsamplingfactors — Define los factores de muestreo de la imagen

### Descripción

public **Gmagick::setsamplingfactors**([array](#language.types.array) $factors): [Gmagick](#class.gmagick)

Define los factores de muestreo de la imagen.

### Parámetros

     factors


       Un array de [float](#language.types.float)s, representando el factor de muestreo
       para cada componente de color (en el orden RGB).





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::setsize

(PECL gmagick &gt;= Unknown)

Gmagick::setsize — Define el tamaño del objeto Gmagick

### Descripción

public **Gmagick::setsize**([int](#language.types.integer) $columns, [int](#language.types.integer) $rows): [Gmagick](#class.gmagick)

Define el tamaño del objeto Gmagick. Defínase el tamaño
antes de leer una imagen sin procesar en el formato **[Gmagick::COLORSPACE_RGB](#gmagick.constants.colorspace-rgb)**, **[Gmagick::COLORSPACE_GRAY](#gmagick.constants.colorspace-gray)**, o **[Gmagick::COLORSPACE_CMYK](#gmagick.constants.colorspace-cmyk)**.

### Parámetros

     columns


       El ancho, en píxeles.






     rows


       La altura, en píxeles.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::shearimage

(PECL gmagick &gt;= Unknown)

Gmagick::shearimage — Crea un paralelogramo

### Descripción

public **Gmagick::shearimage**([mixed](#language.types.mixed) $color, [float](#language.types.float) $xShear, [float](#language.types.float) $yShear): [Gmagick](#class.gmagick)

Mueve una esquina de la imagen a lo largo de los ejes X o Y para crear un paralelogramo.
Una dirección en X mueve a lo largo del eje X, mientras que una dirección en Y mueve a lo largo
del eje Y. La cantidad de corte se controla mediante un ángulo de corte. Para los cortes en
dirección X, x_shear se mide relativamente al eje Y, e inversamente, para los cortes en
dirección Y, y_shear se mide relativamente al eje X. Los triángulos vacíos así creados
durante el corte de la imagen serán rellenados con el color de fondo.

### Parámetros

     color


       El píxel de fondo.






     xShear


       El grado de corte de la imagen.






     yShear


       El grado de corte de la imagen.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::solarizeimage

(PECL gmagick &gt;= Unknown)

Gmagick::solarizeimage — Aplica un efecto de solarización a la imagen

### Descripción

public **Gmagick::solarizeimage**([int](#language.types.integer) $threshold): [Gmagick](#class.gmagick)

Aplica un efecto de solarización a la imagen, similar al efecto creado en
una foto en cámara oscura, exponiendo las zonas de una foto sobre papel sensible
a la luz. El umbral varía de 0 a QuantumRange y es una medida de la extensión de la
solarización.

### Parámetros

     threshold


       Define la extensión de la solarización.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::spreadimage

(PECL gmagick &gt;= Unknown)

Gmagick::spreadimage — Desplaza aleatoriamente cada píxel de un bloque

### Descripción

public **Gmagick::spreadimage**([float](#language.types.float) $radius): [Gmagick](#class.gmagick)

Efecto especial que desplaza aleatoriamente cada píxel de un bloque definido
por el argumento radius.

### Parámetros

     radius


       Selecciona píxeles aleatoriamente en el vecindario de este alcance.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::stripimage

(PECL gmagick &gt;= Unknown)

Gmagick::stripimage — Elimina de una imagen todos los perfiles y todos los comentarios

### Descripción

public **Gmagick::stripimage**(): [Gmagick](#class.gmagick)

Elimina de una imagen todos los perfiles y todos los comentarios.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::swirlimage

(PECL gmagick &gt;= Unknown)

Gmagick::swirlimage — Remue los píxeles del centro de la imagen

### Descripción

public **Gmagick::swirlimage**([float](#language.types.float) $degrees): [Gmagick](#class.gmagick)

Remue los píxeles del centro de la imagen, donde los grados indican el arco de remolino alrededor del cual
los píxeles son desplazados. Se puede obtener un efecto cada vez más pronunciado
modificando los grados de 1 a 360.

### Parámetros

     degrees


       Define la intensidad del efecto de remolino.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::thumbnailimage

(PECL gmagick &gt;= Unknown)

Gmagick::thumbnailimage — Modifica el tamaño de una imagen

### Descripción

public **Gmagick::thumbnailimage**([int](#language.types.integer) $width, [int](#language.types.integer) $height, [bool](#language.types.boolean) $fit = **[false](#constant.false)**): [Gmagick](#class.gmagick)

Modifica el tamaño de una imagen a las dimensiones dadas y elimina los perfiles asociados.
El objetivo es producir una imagen en miniatura, menos pesada, con fines de visualización en la Web.
Si **[true](#constant.true)** se proporciona como valor del 3er argumento, entonces los argumentos width
y height se utilizan como valores máximos para cada lado.
Ambos lados serán escalados durante la operación.

### Parámetros

     width


       Ancho de la imagen.






     height


       Altura de la imagen.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::trimimage

(PECL gmagick &gt;= Unknown)

Gmagick::trimimage — Elimina los bordes de la imagen

### Descripción

public **Gmagick::trimimage**([float](#language.types.float) $fuzz): [Gmagick](#class.gmagick)

Elimina los bordes que son del color del fondo de la imagen.

### Parámetros

     fuzz


       Por omisión, el objetivo debe coincidir exactamente con el color del píxel preciso.
       Sin embargo, en muchos casos, 2 colores pueden diferir ligeramente.
       Este parámetro indica la tolerancia admisible para considerar 2 colores
       como idénticos.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

# Gmagick::write

(PECL gmagick &gt;= Unknown)

Gmagick::write — Alias de [Gmagick::writeimage()](#gmagick.writeimage)

### Descripción

Este método es un alias de: [Gmagick::writeimage()](#gmagick.writeimage).

# Gmagick::writeimage

(PECL gmagick &gt;= Unknown)

Gmagick::writeimage — Escribe una imagen en un archivo

### Descripción

public **Gmagick::writeimage**([string](#language.types.string) $filename, [bool](#language.types.boolean) $all_frames = **[false](#constant.false)**): [Gmagick](#class.gmagick)

Escribe una imagen en un archivo específico. Si el argumento
filename es **[null](#constant.null)**, la imagen
será escrita en el archivo definido por el método [Gmagick::readimage()](#gmagick.readimage)
o el método [Gmagick::setimagefilename()](#gmagick.setimagefilename).

### Parámetros

     filename


       El nombre del archivo.





### Valores devueltos

El objeto [Gmagick](#class.gmagick).

### Errores/Excepciones

Emite una excepción
**GmagickException** en caso de error.

## Tabla de contenidos

- [Gmagick::addimage](#gmagick.addimage) — Añade una nueva imagen a la lista de imágenes del objeto Gmagick
- [Gmagick::addnoiseimage](#gmagick.addnoiseimage) — Añade ruido aleatorio a la imagen
- [Gmagick::annotateimage](#gmagick.annotateimage) — Anota una imagen con texto
- [Gmagick::blurimage](#gmagick.blurimage) — Añade un filtro de borrosidad a la imagen
- [Gmagick::borderimage](#gmagick.borderimage) — Rodea la imagen con un borde
- [Gmagick::charcoalimage](#gmagick.charcoalimage) — Simula un dibujo a carboncillo
- [Gmagick::chopimage](#gmagick.chopimage) — Elimina una región de una imagen y la recorta
- [Gmagick::clear](#gmagick.clear) — Limpia todos los recursos asociados con el objeto Gmagick
- [Gmagick::commentimage](#gmagick.commentimage) — Añade un comentario a una imagen
- [Gmagick::compositeimage](#gmagick.compositeimage) — Compone una imagen en otra
- [Gmagick::\_\_construct](#gmagick.construct) — El constructor Gmagick
- [Gmagick::cropimage](#gmagick.cropimage) — Extrae una región de la imagen
- [Gmagick::cropthumbnailimage](#gmagick.cropthumbnailimage) — Crea una miniatura recortada
- [Gmagick::current](#gmagick.current) — Devuelve la refencia al objeto Gmagick acutal
- [Gmagick::cyclecolormapimage](#gmagick.cyclecolormapimage) — Desplaza un mapa de color de una imagen
- [Gmagick::deconstructimages](#gmagick.deconstructimages) — Devuelve ciertas diferencias de píxeles entre imágenes
- [Gmagick::despeckleimage](#gmagick.despeckleimage) — Reduce el ruido granular de una imagen
- [Gmagick::destroy](#gmagick.destroy) — Destruye un objeto Gmagick
- [Gmagick::drawimage](#gmagick.drawimage) — Renderiza el objeto GmagickDraw en la imagen actual
- [Gmagick::edgeimage](#gmagick.edgeimage) — Mejora los bordes dentro de una imagen
- [Gmagick::embossimage](#gmagick.embossimage) — Devuelve una imagen en escala de grises con un efecto tridimensional
- [Gmagick::enhanceimage](#gmagick.enhanceimage) — Mejora la calidad de una imagen con ruido
- [Gmagick::equalizeimage](#gmagick.equalizeimage) — Ecualiza el histograma de la imagen
- [Gmagick::flipimage](#gmagick.flipimage) — Crea una imagen espejo vertical
- [Gmagick::flopimage](#gmagick.flopimage) — Crea una imagen espejo horizontal
- [Gmagick::frameimage](#gmagick.frameimage) — Añade un borde tridimensional simulado
- [Gmagick::gammaimage](#gmagick.gammaimage) — Corrección gamma de una imagen
- [Gmagick::getcopyright](#gmagick.getcopyright) — Devuelve el copyright de la API GraphicsMagick como una cadena
- [Gmagick::getfilename](#gmagick.getfilename) — El nombre de archivo asociado a una secuencia de imágenes
- [Gmagick::getimagebackgroundcolor](#gmagick.getimagebackgroundcolor) — Devuelve el color de fondo de la imagen
- [Gmagick::getimageblueprimary](#gmagick.getimageblueprimary) — Devuelve el punto primario azul de la cromaticidad
- [Gmagick::getimagebordercolor](#gmagick.getimagebordercolor) — Devuelve el color del borde de la imagen
- [Gmagick::getimagechanneldepth](#gmagick.getimagechanneldepth) — Obtiene la profundidad de un canal de imagen en particular
- [Gmagick::getimagecolors](#gmagick.getimagecolors) — Devuelve el color del índice del mapa de color especificado
- [Gmagick::getimagecolorspace](#gmagick.getimagecolorspace) — Obtiene el espacio de colores de la imagen
- [Gmagick::getimagecompose](#gmagick.getimagecompose) — Devuelve el operador de composición asociado a la imagen
- [Gmagick::getimagedelay](#gmagick.getimagedelay) — Obetiene el retraso de la imagen
- [Gmagick::getimagedepth](#gmagick.getimagedepth) — Obtiene la profundidad de la imagen
- [Gmagick::getimagedispose](#gmagick.getimagedispose) — Obtiene el método de disposición de la imagen
- [Gmagick::getimageextrema](#gmagick.getimageextrema) — Obtiene los extremos de la imagen
- [Gmagick::getimagefilename](#gmagick.getimagefilename) — Devuelve el nombre de archivo de una imagen en particular de una secuencia
- [Gmagick::getimageformat](#gmagick.getimageformat) — Devuelve el formato de una imagen en particular de una secuencia
- [Gmagick::getimagegamma](#gmagick.getimagegamma) — Obtiene el valor gamma de la imagen
- [Gmagick::getimagegreenprimary](#gmagick.getimagegreenprimary) — Devuelve el punto primario verde de la cromaticidad
- [Gmagick::getimageheight](#gmagick.getimageheight) — Devuelve el alto de la imagen
- [Gmagick::getimagehistogram](#gmagick.getimagehistogram) — Obtiene el histograma de la imagen
- [Gmagick::getimageindex](#gmagick.getimageindex) — Obtiene el índice de la imagen activa actual
- [Gmagick::getimageinterlacescheme](#gmagick.getimageinterlacescheme) — Obtiene la combinación de entrelazado de la imagen
- [Gmagick::getimageiterations](#gmagick.getimageiterations) — Obtiene las iteraciones de la imagen
- [Gmagick::getimagematte](#gmagick.getimagematte) — Comprobar si la imagen tiene un canal mate
- [Gmagick::getimagemattecolor](#gmagick.getimagemattecolor) — Devuelve el color mate de la imagen
- [Gmagick::getimageprofile](#gmagick.getimageprofile) — Devuelve el perfil nominado de la imagen
- [Gmagick::getimageredprimary](#gmagick.getimageredprimary) — Devuelve el punto primario rojo de la cromaticidad
- [Gmagick::getimagerenderingintent](#gmagick.getimagerenderingintent) — Obtiene la propuesta de renderización de la imagen
- [Gmagick::getimageresolution](#gmagick.getimageresolution) — Obtiene la resolución X e Y de la imagen
- [Gmagick::getimagescene](#gmagick.getimagescene) — Obtiene la escena de la imagen
- [Gmagick::getimagesignature](#gmagick.getimagesignature) — Genera un resumen de un mensaje SHA-256
- [Gmagick::getimagetype](#gmagick.getimagetype) — Obtiene el tipo de imagen potencial
- [Gmagick::getimageunits](#gmagick.getimageunits) — Obtiene las unidades de resolución de la imagen
- [Gmagick::getimagewhitepoint](#gmagick.getimagewhitepoint) — Devuelve el punto blanco de la cromaticidad
- [Gmagick::getimagewidth](#gmagick.getimagewidth) — Devuelve el ancho de la imagen
- [Gmagick::getpackagename](#gmagick.getpackagename) — Devuelve el nombre del paquete de GraphicsMagick
- [Gmagick::getquantumdepth](#gmagick.getquantumdepth) — Obtiene la profundidad de la cuantía de Gmagick como una cadena
- [Gmagick::getreleasedate](#gmagick.getreleasedate) — Devuelve la fecha de distribución de GraphicsMagick como una cadena
- [Gmagick::getsamplingfactors](#gmagick.getsamplingfactors) — Obtiene el factor de muestreo horizontal y vertical
- [Gmagick::getsize](#gmagick.getsize) — Devuelve el tamaño asociado con el objeto Gmagick
- [Gmagick::getversion](#gmagick.getversion) — Devuelve la versión de la API GraphicsMagick
- [Gmagick::hasnextimage](#gmagick.hasnextimage) — Comprueba si el objeto tiene más imágenes
- [Gmagick::haspreviousimage](#gmagick.haspreviousimage) — Verifica si el objeto tiene una imagen previa
- [Gmagick::implodeimage](#gmagick.implodeimage) — Crea una nueva imagen como una copia
- [Gmagick::labelimage](#gmagick.labelimage) — Añade una etiqueta a una imagen
- [Gmagick::levelimage](#gmagick.levelimage) — Ajusta los niveles de la imagen
- [Gmagick::magnifyimage](#gmagick.magnifyimage) — Redimensiona una imagen por 2 manteniendo las proporciones
- [Gmagick::mapimage](#gmagick.mapimage) — Sustituye los colores de una imagen por los colores más cercanos de una imagen de referencia
- [Gmagick::medianfilterimage](#gmagick.medianfilterimage) — Aplica un filtro digital
- [Gmagick::minifyimage](#gmagick.minifyimage) — Reduce una imagen a la mitad manteniendo las proporciones
- [Gmagick::modulateimage](#gmagick.modulateimage) — Controla la luminosidad, la saturación y el tono
- [Gmagick::motionblurimage](#gmagick.motionblurimage) — Simula un desenfoque cinético
- [Gmagick::newimage](#gmagick.newimage) — Crea una nueva imagen
- [Gmagick::nextimage](#gmagick.nextimage) — Se desplaza a la imagen siguiente
- [Gmagick::normalizeimage](#gmagick.normalizeimage) — Mejora el contraste del color de la imagen
- [Gmagick::oilpaintimage](#gmagick.oilpaintimage) — Simula una pintura al óleo
- [Gmagick::previousimage](#gmagick.previousimage) — Moverse a la imagen previa del objeto
- [Gmagick::profileimage](#gmagick.profileimage) — Añade o elimina un perfil de una imagen
- [Gmagick::quantizeimage](#gmagick.quantizeimage) — Analiza los colores dentro de una imagen de referencia
- [Gmagick::quantizeimages](#gmagick.quantizeimages) — Analiza los colores dentro de una secuencia de imágenes
- [Gmagick::queryfontmetrics](#gmagick.queryfontmetrics) — Devuelve una matriz que representa las métricas de la fuente
- [Gmagick::queryfonts](#gmagick.queryfonts) — Devuelve las fuentes configuradas
- [Gmagick::queryformats](#gmagick.queryformats) — Devuelve los formatos soportados por Gmagick
- [Gmagick::radialblurimage](#gmagick.radialblurimage) — Desenfoca una imagen siguiendo un radio
- [Gmagick::raiseimage](#gmagick.raiseimage) — Crea un botón con un efecto 3D
- [Gmagick::read](#gmagick.read) — Lee una imagen desde un fichero
- [Gmagick::readimage](#gmagick.readimage) — Lee una imagen desde un fichero
- [Gmagick::readimageblob](#gmagick.readimageblob) — Lee una imagen desde una cadena binaria
- [Gmagick::readimagefile](#gmagick.readimagefile) — El propósito de readimagefile
- [Gmagick::reducenoiseimage](#gmagick.reducenoiseimage) — Suaviza los contornos de la imagen
- [Gmagick::removeimage](#gmagick.removeimage) — Elimina una imagen de la lista de imágenes
- [Gmagick::removeimageprofile](#gmagick.removeimageprofile) — Elimina el perfil nombrado de la imagen y lo devuelve
- [Gmagick::resampleimage](#gmagick.resampleimage) — Re-muestrea la imagen a la resolución deseada
- [Gmagick::resizeimage](#gmagick.resizeimage) — Redimensiona una imagen
- [Gmagick::rollimage](#gmagick.rollimage) — Compensa una imagen
- [Gmagick::rotateimage](#gmagick.rotateimage) — Rota una imagen
- [Gmagick::scaleimage](#gmagick.scaleimage) — Redimensiona una imagen
- [Gmagick::separateimagechannel](#gmagick.separateimagechannel) — Separa un canal de una imagen
- [Gmagick::setCompressionQuality](#gmagick.setcompressionquality) — Define la calidad de compresión por defecto del objeto
- [Gmagick::setfilename](#gmagick.setfilename) — Define el nombre de archivo antes de leer o escribir una imagen
- [Gmagick::setimagebackgroundcolor](#gmagick.setimagebackgroundcolor) — Define la color de fondo de la imagen
- [Gmagick::setimageblueprimary](#gmagick.setimageblueprimary) — Define el punto azul primario de la imagen cromática
- [Gmagick::setimagebordercolor](#gmagick.setimagebordercolor) — Define la color de la frontera de la imagen
- [Gmagick::setimagechanneldepth](#gmagick.setimagechanneldepth) — Define la profundidad de un canal particular de la imagen
- [Gmagick::setimagecolorspace](#gmagick.setimagecolorspace) — Define el espacio de colores de la imagen
- [Gmagick::setimagecompose](#gmagick.setimagecompose) — Establece el operador de composción de una imagen
- [Gmagick::setimagedelay](#gmagick.setimagedelay) — Define el retraso de la imagen
- [Gmagick::setimagedepth](#gmagick.setimagedepth) — Define la profundidad de la imagen
- [Gmagick::setimagedispose](#gmagick.setimagedispose) — Define el método de disposición de la imagen
- [Gmagick::setimagefilename](#gmagick.setimagefilename) — Define el nombre del fichero para una imagen particular de una secuencia
- [Gmagick::setimageformat](#gmagick.setimageformat) — Define el formato de una imagen
- [Gmagick::setimagegamma](#gmagick.setimagegamma) — Define el gamma de la imagen
- [Gmagick::setimagegreenprimary](#gmagick.setimagegreenprimary) — Define el punto verde en la imagen cromática primaria
- [Gmagick::setimageindex](#gmagick.setimageindex) — Establece el iterador en la posición especificada en la lista de imágenes apuntada por su índice
- [Gmagick::setimageinterlacescheme](#gmagick.setimageinterlacescheme) — Define el esquema de entrelazado de la imagen
- [Gmagick::setimageiterations](#gmagick.setimageiterations) — Define las iteraciones de la imagen
- [Gmagick::setimageprofile](#gmagick.setimageprofile) — Añade un perfil nombrado al objeto Gmagick
- [Gmagick::setimageredprimary](#gmagick.setimageredprimary) — Define el punto rojo en la imagen cromática primaria
- [Gmagick::setimagerenderingintent](#gmagick.setimagerenderingintent) — Define la imagen de renderizado
- [Gmagick::setimageresolution](#gmagick.setimageresolution) — Establece la resolución de la imagen
- [Gmagick::setimagescene](#gmagick.setimagescene) — Define la imagen de escena
- [Gmagick::setimagetype](#gmagick.setimagetype) — Define el tipo de la imagen
- [Gmagick::setimageunits](#gmagick.setimageunits) — Define las unidades a utilizar para la resolución de la imagen
- [Gmagick::setimagewhitepoint](#gmagick.setimagewhitepoint) — Define el punto blanco en la imagen cromática primaria
- [Gmagick::setsamplingfactors](#gmagick.setsamplingfactors) — Define los factores de muestreo de la imagen
- [Gmagick::setsize](#gmagick.setsize) — Define el tamaño del objeto Gmagick
- [Gmagick::shearimage](#gmagick.shearimage) — Crea un paralelogramo
- [Gmagick::solarizeimage](#gmagick.solarizeimage) — Aplica un efecto de solarización a la imagen
- [Gmagick::spreadimage](#gmagick.spreadimage) — Desplaza aleatoriamente cada píxel de un bloque
- [Gmagick::stripimage](#gmagick.stripimage) — Elimina de una imagen todos los perfiles y todos los comentarios
- [Gmagick::swirlimage](#gmagick.swirlimage) — Remue los píxeles del centro de la imagen
- [Gmagick::thumbnailimage](#gmagick.thumbnailimage) — Modifica el tamaño de una imagen
- [Gmagick::trimimage](#gmagick.trimimage) — Elimina los bordes de la imagen
- [Gmagick::write](#gmagick.write) — Alias de Gmagick::writeimage
- [Gmagick::writeimage](#gmagick.writeimage) — Escribe una imagen en un archivo

# La clase GmagickDraw

(PECL gmagick &gt;= Unknown)

## Introducción

## Sinopsis de la Clase

    ****




      class **GmagickDraw**

     {


    /* Métodos */

public [annotate](#gmagickdraw.annotate)([float](#language.types.float) $x, [float](#language.types.float) $y, [string](#language.types.string) $text): [GmagickDraw](#class.gmagickdraw)
public [arc](#gmagickdraw.arc)(
    [float](#language.types.float) $sx,
    [float](#language.types.float) $sy,
    [float](#language.types.float) $ex,
    [float](#language.types.float) $ey,
    [float](#language.types.float) $sd,
    [float](#language.types.float) $ed
): [GmagickDraw](#class.gmagickdraw)
public [bezier](#gmagickdraw.bezier)([array](#language.types.array) $coordinate_array): [GmagickDraw](#class.gmagickdraw)
public [ellipse](#gmagickdraw.ellipse)(
    [float](#language.types.float) $ox,
    [float](#language.types.float) $oy,
    [float](#language.types.float) $rx,
    [float](#language.types.float) $ry,
    [float](#language.types.float) $start,
    [float](#language.types.float) $end
): [GmagickDraw](#class.gmagickdraw)
public [getfillcolor](#gmagickdraw.getfillcolor)(): [void](language.types.void.html)
public [getfillopacity](#gmagickdraw.getfillopacity)(): [float](#language.types.float)
public [getfont](#gmagickdraw.getfont)(): [mixed](#language.types.mixed)
public [getfontsize](#gmagickdraw.getfontsize)(): [float](#language.types.float)
public [getfontstyle](#gmagickdraw.getfontstyle)(): [int](#language.types.integer)
public [getfontweight](#gmagickdraw.getfontweight)(): [int](#language.types.integer)
public [getstrokecolor](#gmagickdraw.getstrokecolor)(): [GmagickPixel](#class.gmagickpixel)
public [getstrokeopacity](#gmagickdraw.getstrokeopacity)(): [float](#language.types.float)
public [getstrokewidth](#gmagickdraw.getstrokewidth)(): [float](#language.types.float)
public [gettextdecoration](#gmagickdraw.gettextdecoration)(): [int](#language.types.integer)
public [gettextencoding](#gmagickdraw.gettextencoding)(): [mixed](#language.types.mixed)
public [line](#gmagickdraw.line)(
    [float](#language.types.float) $sx,
    [float](#language.types.float) $sy,
    [float](#language.types.float) $ex,
    [float](#language.types.float) $ey
): [GmagickDraw](#class.gmagickdraw)
public [point](#gmagickdraw.point)([float](#language.types.float) $x, [float](#language.types.float) $y): [GmagickDraw](#class.gmagickdraw)
public [polygon](#gmagickdraw.polygon)([array](#language.types.array) $coordinates): [GmagickDraw](#class.gmagickdraw)
public [polyline](#gmagickdraw.polyline)([array](#language.types.array) $coordinate_array): [GmagickDraw](#class.gmagickdraw)
public [rectangle](#gmagickdraw.rectangle)(
    [float](#language.types.float) $x1,
    [float](#language.types.float) $y1,
    [float](#language.types.float) $x2,
    [float](#language.types.float) $y2
): [GmagickDraw](#class.gmagickdraw)
public [rotate](#gmagickdraw.rotate)([float](#language.types.float) $degrees): [GmagickDraw](#class.gmagickdraw)
public [roundrectangle](#gmagickdraw.roundrectangle)(
    [float](#language.types.float) $x1,
    [float](#language.types.float) $y1,
    [float](#language.types.float) $x2,
    [float](#language.types.float) $y2,
    [float](#language.types.float) $rx,
    [float](#language.types.float) $ry
): [GmagickDraw](#class.gmagickdraw)
public [scale](#gmagickdraw.scale)([float](#language.types.float) $x, [float](#language.types.float) $y): [GmagickDraw](#class.gmagickdraw)
public [setfillcolor](#gmagickdraw.setfillcolor)([mixed](#language.types.mixed) $color): [GmagickDraw](#class.gmagickdraw)
public [setfillopacity](#gmagickdraw.setfillopacity)([float](#language.types.float) $fill_opacity): [GmagickDraw](#class.gmagickdraw)
public [setfont](#gmagickdraw.setfont)([string](#language.types.string) $font): [GmagickDraw](#class.gmagickdraw)
public [setfontsize](#gmagickdraw.setfontsize)([float](#language.types.float) $pointsize): [GmagickDraw](#class.gmagickdraw)
public [setfontstyle](#gmagickdraw.setfontstyle)([int](#language.types.integer) $style): [GmagickDraw](#class.gmagickdraw)
public [setfontweight](#gmagickdraw.setfontweight)([int](#language.types.integer) $weight): [GmagickDraw](#class.gmagickdraw)
public [setstrokecolor](#gmagickdraw.setstrokecolor)([mixed](#language.types.mixed) $color): [GmagickDraw](#class.gmagickdraw)
public [setstrokeopacity](#gmagickdraw.setstrokeopacity)([float](#language.types.float) $stroke_opacity): [GmagickDraw](#class.gmagickdraw)
public [setstrokewidth](#gmagickdraw.setstrokewidth)([float](#language.types.float) $width): [GmagickDraw](#class.gmagickdraw)
public [settextdecoration](#gmagickdraw.settextdecoration)([int](#language.types.integer) $decoration): [GmagickDraw](#class.gmagickdraw)
public [settextencoding](#gmagickdraw.settextencoding)([string](#language.types.string) $encoding): [GmagickDraw](#class.gmagickdraw)

}

# GmagickDraw::annotate

(PECL gmagick &gt;= Unknown)

GmagickDraw::annotate — Dibuja texto en la imagen

### Descripción

public **GmagickDraw::annotate**([float](#language.types.float) $x, [float](#language.types.float) $y, [string](#language.types.string) $text): [GmagickDraw](#class.gmagickdraw)

Dibuja texto en la imagen.

### Parámetros

     x


       coordenada x a la izquierda del texto






     y


       coordenada y a la línea base del texto






     text


       texto a dibujar





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito.

# GmagickDraw::arc

(PECL gmagick &gt;= Unknown)

GmagickDraw::arc — Dibuja un arco

### Descripción

public **GmagickDraw::arc**(
    [float](#language.types.float) $sx,
    [float](#language.types.float) $sy,
    [float](#language.types.float) $ex,
    [float](#language.types.float) $ey,
    [float](#language.types.float) $sd,
    [float](#language.types.float) $ed
): [GmagickDraw](#class.gmagickdraw)

Dibuja un arco que cae dentro de un rectángulo circundante en la imagen.

### Parámetros

     sx


       coordenada x del inicio del rectángulo circundante






     sy


       coordenada y del inicio del rectángulo circundante






     ex


       coordenada x del final del rectángulo circundante






     ey


       coordenada y del final del rectángulo circundante






     sd


       grados de inicio de rotación






     ed


       grados finales de rotación





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito.

# GmagickDraw::bezier

(PECL gmagick &gt;= Unknown)

GmagickDraw::bezier — Dibuja una curva Bézier

### Descripción

public **GmagickDraw::bezier**([array](#language.types.array) $coordinate_array): [GmagickDraw](#class.gmagickdraw)

Dibuja una curva Bézier a través de un conjunto de puntos en la imagen.

### Parámetros

     coordinate_array


       Matriz de coordenadas





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::ellipse

(PECL gmagick &gt;= Unknown)

GmagickDraw::ellipse — Dibuja una elipse en la imagen

### Descripción

public **GmagickDraw::ellipse**(
    [float](#language.types.float) $ox,
    [float](#language.types.float) $oy,
    [float](#language.types.float) $rx,
    [float](#language.types.float) $ry,
    [float](#language.types.float) $start,
    [float](#language.types.float) $end
): [GmagickDraw](#class.gmagickdraw)

Dibuja una elipse en la imagen.

### Parámetros

     ox


       coordenada x del origen






     oy


       coordenada y del origen






     rx


       radio en x






     ry


       radio en y






     start


       inicio de rotación en grados






     end


       final de rotación en grados





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::getfillcolor

(PECL gmagick &gt;= Unknown)

GmagickDraw::getfillcolor — Devuelve el color de relleno

### Descripción

public **GmagickDraw::getfillcolor**(): [void](language.types.void.html)

Devuelve el color de relleno usado cuando se dibujan objetos rellenos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El color de relleno de [GmagickPixel](#class.gmagickpixel) usado para dibujar objetos rellenos.

# GmagickDraw::getfillopacity

(PECL gmagick &gt;= Unknown)

GmagickDraw::getfillopacity — Devuelve la opacidad usada cuando se dibuja

### Descripción

public **GmagickDraw::getfillopacity**(): [float](#language.types.float)

Devuelve la opacidad usada cuando se dibuja

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la opacidad usada cuando se dibuja utilizando el color de relleno o la textura de relleno. Completamente opaco es 1.0.

# GmagickDraw::getfont

(PECL gmagick &gt;= Unknown)

GmagickDraw::getfont — Devuelve el tipo de letra

### Descripción

public **GmagickDraw::getfont**(): [mixed](#language.types.mixed)

Devuelve una cadena que especifica el tipo de letra usado cuando se anota texto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena si se tuvo éxito y **[false](#constant.false)** si no está establecido ningún tipo de letra.

# GmagickDraw::getfontsize

(PECL gmagick &gt;= Unknown)

GmagickDraw::getfontsize — Devuelve el tamaño de punto de la fuente

### Descripción

public **GmagickDraw::getfontsize**(): [float](#language.types.float)

Devuelve el tamaño de punto de la fuente usado cuando se anota texto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el tamaño de la fuente asociada con el objeto [GmagickDraw](#class.gmagickdraw) actual.

# GmagickDraw::getfontstyle

(PECL gmagick &gt;= Unknown)

GmagickDraw::getfontstyle — Devuelve el estilo de fuente

### Descripción

public **GmagickDraw::getfontstyle**(): [int](#language.types.integer)

Devuelve el estilo de fuente usado cuando se anota texto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve la constante de estilo de fuente (STYLE\_) asociada con el objeto [GmagickDraw](#class.gmagickdraw) o 0 si no está establecido ningún estilo.

# GmagickDraw::getfontweight

(PECL gmagick &gt;= Unknown)

GmagickDraw::getfontweight — Devuelve el peso de la fuente

### Descripción

public **GmagickDraw::getfontweight**(): [int](#language.types.integer)

Devuelve el peso de la fuente usada cuando se anota texto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un valor de tipo int si se tuvo éxito y 0 si no está establecido el peso.

# GmagickDraw::getstrokecolor

(PECL gmagick &gt;= Unknown)

GmagickDraw::getstrokecolor — Devuelve el color usado para contornear perfiles de objetos

### Descripción

public **GmagickDraw::getstrokecolor**(): [GmagickPixel](#class.gmagickpixel)

Devuelve el color usado para contornear perfiles de objetos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto [GmagickPixel](#class.gmagickpixel) que describe el color.

# GmagickDraw::getstrokeopacity

(PECL gmagick &gt;= Unknown)

GmagickDraw::getstrokeopacity — Devuelve la opacidad de los perfiles del objeto contorneado

### Descripción

public **GmagickDraw::getstrokeopacity**(): [float](#language.types.float)

Devuelve la opacidad de los perfiles del objeto contorneado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un valor de [float](#language.types.float) que describe la opacidad.

# GmagickDraw::getstrokewidth

(PECL gmagick &gt;= Unknown)

GmagickDraw::getstrokewidth — Devuelve el ancho del contorno usado para dibular perfiles del objeto

### Descripción

public **GmagickDraw::getstrokewidth**(): [float](#language.types.float)

Devuelve el ancho del contorno usado para dibular perfiles del objeto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un valor de [float](#language.types.float) que describe el ancho del contorno.

# GmagickDraw::gettextdecoration

(PECL gmagick &gt;= Unknown)

GmagickDraw::gettextdecoration — Devuelve la decoración del texto

### Descripción

public **GmagickDraw::gettextdecoration**(): [int](#language.types.integer)

Devuelve la decoración aplicada cuando se anota texto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una de las constantes DECORATION\_ y 0 si no está establecida la decoración.

# GmagickDraw::gettextencoding

(PECL gmagick &gt;= Unknown)

GmagickDraw::gettextencoding — Devuelve el conjunto de codificación usado para anotaciones de texto

### Descripción

public **GmagickDraw::gettextencoding**(): [mixed](#language.types.mixed)

Devuelve una cadena que especifica el conjunto de codificación usado para anotaciones de texto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena que especifica el conjunto de codificación o **[false](#constant.false)** si no está establecida ningúna codificación.

# GmagickDraw::line

(PECL gmagick &gt;= Unknown)

GmagickDraw::line — Dibuja una línea

### Descripción

public **GmagickDraw::line**(
    [float](#language.types.float) $sx,
    [float](#language.types.float) $sy,
    [float](#language.types.float) $ex,
    [float](#language.types.float) $ey
): [GmagickDraw](#class.gmagickdraw)

Dibuja una línea en la imagen usando el color del contorno, la opacidad del contorno, y el ancho del contorno acutales.

### Parámetros

     sx


       coordenada x de inicio






     sy


       coordenada y de inicio






     ex


       coordenada x final






     ey


       coordenada y final





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::point

(PECL gmagick &gt;= Unknown)

GmagickDraw::point — Dibuja un punto

### Descripción

public **GmagickDraw::point**([float](#language.types.float) $x, [float](#language.types.float) $y): [GmagickDraw](#class.gmagickdraw)

Dibuja un punto usando el color de contorno y el grosor de contorno actuales en las coordenadas especificadas.

### Parámetros

     x


       coordenada x del objetivo






     y


       coordenada y del objetivo





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::polygon

(PECL gmagick &gt;= Unknown)

GmagickDraw::polygon — Dibuja un polígono

### Descripción

public **GmagickDraw::polygon**([array](#language.types.array) $coordinates): [GmagickDraw](#class.gmagickdraw)

Dibuja un polígono usando el contorno, el ancho del contorno, y el color o textura de relleno actuales, usando la matriz de coordenadas especificadas.

### Parámetros

     coordinates


       matriz de coordenadas





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::polyline

(PECL gmagick &gt;= Unknown)

GmagickDraw::polyline — Dibuja una polilínea

### Descripción

public **GmagickDraw::polyline**([array](#language.types.array) $coordinate_array): [GmagickDraw](#class.gmagickdraw)

Dibuja una polilínea usando el contorno, el ancho del contorno, y el color o textura de relleno actuales, usando la matriz de coordenadas especificadas.

### Parámetros

     coordinate_array


       La matriz de coordenadas.





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::rectangle

(PECL gmagick &gt;= Unknown)

GmagickDraw::rectangle — Dibuja un rectángulo

### Descripción

public **GmagickDraw::rectangle**(
    [float](#language.types.float) $x1,
    [float](#language.types.float) $y1,
    [float](#language.types.float) $x2,
    [float](#language.types.float) $y2
): [GmagickDraw](#class.gmagickdraw)

Dibuja un rectángulo dadas dos coordenadas y usando el contorno, el ancho del contorno, y la configuración de relleno actuales.

### Parámetros

     x1


       primera coordenada x






     y1


       primera coordenada y






     x2


       segunda coordenada x






     y2


       primera coordenada y





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::rotate

(PECL gmagick &gt;= Unknown)

GmagickDraw::rotate — Aplica la rotación especificada al espacio de coordenadas actual

### Descripción

public **GmagickDraw::rotate**([float](#language.types.float) $degrees): [GmagickDraw](#class.gmagickdraw)

Aplica la rotación especificada al espacio de coordenadas actual.

### Parámetros

     degrees


       grados de rotación





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::roundrectangle

(PECL gmagick &gt;= Unknown)

GmagickDraw::roundrectangle — Dibuja un rectángulo redondeado

### Descripción

public **GmagickDraw::roundrectangle**(
    [float](#language.types.float) $x1,
    [float](#language.types.float) $y1,
    [float](#language.types.float) $x2,
    [float](#language.types.float) $y2,
    [float](#language.types.float) $rx,
    [float](#language.types.float) $ry
): [GmagickDraw](#class.gmagickdraw)

Dibuja aun rectángulo redondeado dadas dos coordenadas, los radios de las esquinas x e y, y usando
el contorno, el ancho del contorno, y la configuración de relleno actuales.

### Parámetros

     x1


       primera coordenada x






     y1


       primera coordenada y






     x2


       segunda coordenada x






     y2


       segunda coordenada y






     rx


       radio de la esquina en dirección horizontal






     ry


       radio de la esquina en dirección vertical





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::scale

(PECL gmagick &gt;= Unknown)

GmagickDraw::scale — Ajusta el factor de escala

### Descripción

public **GmagickDraw::scale**([float](#language.types.float) $x, [float](#language.types.float) $y): [GmagickDraw](#class.gmagickdraw)

Ajusta el factor de escala a aplicar en las direcciones horizontal y vertical al espacio de coordenadas actual.

### Parámetros

     x


       Factor de escala horizontal






     y


       Factor de escala vertical





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::setfillcolor

(PECL gmagick &gt;= Unknown)

GmagickDraw::setfillcolor — Establece el color de relleno a usar cuando se dibujan objetos rellenos

### Descripción

public **GmagickDraw::setfillcolor**([mixed](#language.types.mixed) $color): [GmagickDraw](#class.gmagickdraw)

Establece el color de relleno a usar cuando se dibujan objetos rellenos.

### Parámetros

     color


       Un objeto [GmagickPixel](#class.gmagickpixel) o un [string](#language.types.string) que indica el color a usar para el relleno.





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::setfillopacity

(PECL gmagick &gt;= Unknown)

GmagickDraw::setfillopacity — Establece la opacidad del relleno

### Descripción

public **GmagickDraw::setfillopacity**([float](#language.types.float) $fill_opacity): [GmagickDraw](#class.gmagickdraw)

Establece la opacidad a usar cuando de dibuja untilizando el color de relleno o la textura de relleno. Establecerlo a 1.0 hará al relleno completamente opaco.

### Parámetros

     fill_opacity


       La opacidad del relleno





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::setfont

(PECL gmagick &gt;= Unknown)

GmagickDraw::setfont — Establece la fuente especificada completamente a usar cuando se anota texto

### Descripción

public **GmagickDraw::setfont**([string](#language.types.string) $font): [GmagickDraw](#class.gmagickdraw)

Establece la fuente especificada completamente a usar cuando se anota texto.

### Parámetros

     font


       El nombre de la fuente





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::setfontsize

(PECL gmagick &gt;= Unknown)

GmagickDraw::setfontsize — Establece el tamaño de punto de la fuente a usar cuando se anota texto

### Descripción

public **GmagickDraw::setfontsize**([float](#language.types.float) $pointsize): [GmagickDraw](#class.gmagickdraw)

Establece el tamaño de punto de la fuente a usar cuando se anota texto.

### Parámetros

     pointsize


       El tamaño de punto del texto





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::setfontstyle

(PECL gmagick &gt;= Unknown)

GmagickDraw::setfontstyle — Establece el estilo de fuente a usar cuando se anota texto

### Descripción

public **GmagickDraw::setfontstyle**([int](#language.types.integer) $style): [GmagickDraw](#class.gmagickdraw)

Establece el estilo de fuente a usar cuando se anota texto. La enumeración AnyStyle actúa como una opción comodín para "no tener cuidado".

### Parámetros

     style


       El estilo de la fuente (NormalStyle, ItalicStyle, ObliqueStyle, AnyStyle)





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::setfontweight

(PECL gmagick &gt;= Unknown)

GmagickDraw::setfontweight — Establece el peso de la fuente

### Descripción

public **GmagickDraw::setfontweight**([int](#language.types.integer) $weight): [GmagickDraw](#class.gmagickdraw)

Establece el peso de la fuente a usar cuando se anota texto.

### Parámetros

     weight


       El peso de la fuente (rango válido 100-900)





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::setstrokecolor

(PECL gmagick &gt;= Unknown)

GmagickDraw::setstrokecolor — Establece el color usado para contornear los perfiles del objeto

### Descripción

public **GmagickDraw::setstrokecolor**([mixed](#language.types.mixed) $color): [GmagickDraw](#class.gmagickdraw)

Establece el color usado para contornear los perfiles del objeto.

### Parámetros

     color


       Un objeto [GmagickPixel](#class.gmagickpixel) o un [string](#language.types.string) que representa el color del contorno.





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::setstrokeopacity

(PECL gmagick &gt;= Unknown)

GmagickDraw::setstrokeopacity — Especifica la opacidad del los perfiles del objeto contorneado

### Descripción

public **GmagickDraw::setstrokeopacity**([float](#language.types.float) $stroke_opacity): [GmagickDraw](#class.gmagickdraw)

Especifica la opacidad del los perfiles del objeto contorneado.

### Parámetros

     stroke_opacity


       La opacidad del contorno. El valor 1.0 es opaco.





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::setstrokewidth

(PECL gmagick &gt;= Unknown)

GmagickDraw::setstrokewidth — Establece el ancho del contorno usado para dibujar los perfiles del objeto.

### Descripción

public **GmagickDraw::setstrokewidth**([float](#language.types.float) $width): [GmagickDraw](#class.gmagickdraw)

Establece el ancho del contorno usado para dibujar los perfiles del objeto

### Parámetros

     width


       El ancho del contorno





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::settextdecoration

(PECL gmagick &gt;= Unknown)

GmagickDraw::settextdecoration — Especifica una decoración

### Descripción

public **GmagickDraw::settextdecoration**([int](#language.types.integer) $decoration): [GmagickDraw](#class.gmagickdraw)

Especifica una decoración que va a ser aplicada cuando se anota texto.

### Parámetros

     int


       Decoración del texto. Una de estas: NoDecoration, UnderlineDecoration, OverlineDecoration, o LineThroughDecoration





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) si se tuvo éxito

# GmagickDraw::settextencoding

(PECL gmagick &gt;= Unknown)

GmagickDraw::settextencoding — Especifica el conjunto de codificación del texto

### Descripción

public **GmagickDraw::settextencoding**([string](#language.types.string) $encoding): [GmagickDraw](#class.gmagickdraw)

Especifica el conjunto de codificación usado para anotaciones el texto. La única codificación
de caracteres que se puede especificar por ahora es "UTF-8" para representar Unicode como
una secuencia de bytes. Especifique un string vacío para establecer la codificación de texto a la
predeterminada por el sistema. El éxito con la anotación de texto usando Unicode puede
requerir fuentes diseñadas para soportar Unicode.

### Parámetros

     encoding


       Cadena de caracteres que especifica la codificación de texto





### Valores devueltos

El objeto [GmagickDraw](#class.gmagickdraw) en caso de éxito

## Tabla de contenidos

- [GmagickDraw::annotate](#gmagickdraw.annotate) — Dibuja texto en la imagen
- [GmagickDraw::arc](#gmagickdraw.arc) — Dibuja un arco
- [GmagickDraw::bezier](#gmagickdraw.bezier) — Dibuja una curva Bézier
- [GmagickDraw::ellipse](#gmagickdraw.ellipse) — Dibuja una elipse en la imagen
- [GmagickDraw::getfillcolor](#gmagickdraw.getfillcolor) — Devuelve el color de relleno
- [GmagickDraw::getfillopacity](#gmagickdraw.getfillopacity) — Devuelve la opacidad usada cuando se dibuja
- [GmagickDraw::getfont](#gmagickdraw.getfont) — Devuelve el tipo de letra
- [GmagickDraw::getfontsize](#gmagickdraw.getfontsize) — Devuelve el tamaño de punto de la fuente
- [GmagickDraw::getfontstyle](#gmagickdraw.getfontstyle) — Devuelve el estilo de fuente
- [GmagickDraw::getfontweight](#gmagickdraw.getfontweight) — Devuelve el peso de la fuente
- [GmagickDraw::getstrokecolor](#gmagickdraw.getstrokecolor) — Devuelve el color usado para contornear perfiles de objetos
- [GmagickDraw::getstrokeopacity](#gmagickdraw.getstrokeopacity) — Devuelve la opacidad de los perfiles del objeto contorneado
- [GmagickDraw::getstrokewidth](#gmagickdraw.getstrokewidth) — Devuelve el ancho del contorno usado para dibular perfiles del objeto
- [GmagickDraw::gettextdecoration](#gmagickdraw.gettextdecoration) — Devuelve la decoración del texto
- [GmagickDraw::gettextencoding](#gmagickdraw.gettextencoding) — Devuelve el conjunto de codificación usado para anotaciones de texto
- [GmagickDraw::line](#gmagickdraw.line) — Dibuja una línea
- [GmagickDraw::point](#gmagickdraw.point) — Dibuja un punto
- [GmagickDraw::polygon](#gmagickdraw.polygon) — Dibuja un polígono
- [GmagickDraw::polyline](#gmagickdraw.polyline) — Dibuja una polilínea
- [GmagickDraw::rectangle](#gmagickdraw.rectangle) — Dibuja un rectángulo
- [GmagickDraw::rotate](#gmagickdraw.rotate) — Aplica la rotación especificada al espacio de coordenadas actual
- [GmagickDraw::roundrectangle](#gmagickdraw.roundrectangle) — Dibuja un rectángulo redondeado
- [GmagickDraw::scale](#gmagickdraw.scale) — Ajusta el factor de escala
- [GmagickDraw::setfillcolor](#gmagickdraw.setfillcolor) — Establece el color de relleno a usar cuando se dibujan objetos rellenos
- [GmagickDraw::setfillopacity](#gmagickdraw.setfillopacity) — Establece la opacidad del relleno
- [GmagickDraw::setfont](#gmagickdraw.setfont) — Establece la fuente especificada completamente a usar cuando se anota texto
- [GmagickDraw::setfontsize](#gmagickdraw.setfontsize) — Establece el tamaño de punto de la fuente a usar cuando se anota texto
- [GmagickDraw::setfontstyle](#gmagickdraw.setfontstyle) — Establece el estilo de fuente a usar cuando se anota texto
- [GmagickDraw::setfontweight](#gmagickdraw.setfontweight) — Establece el peso de la fuente
- [GmagickDraw::setstrokecolor](#gmagickdraw.setstrokecolor) — Establece el color usado para contornear los perfiles del objeto
- [GmagickDraw::setstrokeopacity](#gmagickdraw.setstrokeopacity) — Especifica la opacidad del los perfiles del objeto contorneado
- [GmagickDraw::setstrokewidth](#gmagickdraw.setstrokewidth) — Establece el ancho del contorno usado para dibujar los perfiles del objeto.
- [GmagickDraw::settextdecoration](#gmagickdraw.settextdecoration) — Especifica una decoración
- [GmagickDraw::settextencoding](#gmagickdraw.settextencoding) — Especifica el conjunto de codificación del texto

# La clase GmagickPixel

(PECL gmagick &gt;= Unknown)

## Introducción

## Sinopsis de la Clase

    ****




      class **GmagickPixel**

     {


    /* Métodos */

public [\_\_construct](#gmagickpixel.construct)([string](#language.types.string) $color = ?)

    public [getcolor](#gmagickpixel.getcolor)([bool](#language.types.boolean) $as_array = **[false](#constant.false)**, [bool](#language.types.boolean) $normalize_array = **[false](#constant.false)**): [mixed](#language.types.mixed)

public [getcolorcount](#gmagickpixel.getcolorcount)(): [int](#language.types.integer)
public [getcolorvalue](#gmagickpixel.getcolorvalue)([int](#language.types.integer) $color): [float](#language.types.float)
public [setcolor](#gmagickpixel.setcolor)([string](#language.types.string) $color): [GmagickPixel](#class.gmagickpixel)
public [setcolorvalue](#gmagickpixel.setcolorvalue)([int](#language.types.integer) $color, [float](#language.types.float) $value): [GmagickPixel](#class.gmagickpixel)

}

# GmagickPixel::\_\_construct

(PECL gmagick &gt;= Unknown)

GmagickPixel::\_\_construct — El constructor GmagickPixel

### Descripción

public **GmagickPixel::\_\_construct**([string](#language.types.string) $color = ?)

Construye un nuevo objeto [GmagickPixel](#class.gmagickpixel).
Si se especifica un color, el objeto es construido
y luego inicializado utilizando este color antes de ser devuelto.

### Parámetros

     color


       El color a utilizar como valor inicial de este objeto (opcional).





# GmagickPixel::getcolor

(PECL gmagick &gt;= Unknown)

GmagickPixel::getcolor — Devuelve el color

### Descripción

public **GmagickPixel::getcolor**([bool](#language.types.boolean) $as_array = **[false](#constant.false)**, [bool](#language.types.boolean) $normalize_array = **[false](#constant.false)**): [mixed](#language.types.mixed)

Devuelve el color descrito por el objeto [GmagickPixel](#class.gmagickpixel), en forma de [string](#language.types.string) o un [array](#language.types.array).
Si el color tiene un canal de opacidad definido, este será especificado como cuarto valor
de la lista.

### Parámetros

     as_array


       **[true](#constant.true)** para indicar que el valor devuelto debe ser
       un [array](#language.types.array) en lugar de una [string](#language.types.string).






     normalize_array


       **[true](#constant.true)** para normalizar los valores de color.





### Valores devueltos

Una [string](#language.types.string) o un [array](#language.types.array) de valores de canales, cada uno normalizado si **[true](#constant.true)**
es proporcionado para normalize_array.
Emite una excepción **GmagickPixelException** en caso de error.

# GmagickPixel::getcolorcount

(PECL gmagick &gt;= Unknown)

GmagickPixel::getcolorcount — Devuelve el número de colores asociados con este color

### Descripción

public **GmagickPixel::getcolorcount**(): [int](#language.types.integer)

Devuelve el número de colores asociados con este color.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de colores, en forma de un integer en caso de éxito, y lanza una excepción **GmagickPixelException** si ocurre un error.

# GmagickPixel::getcolorvalue

(PECL gmagick &gt;= Unknown)

GmagickPixel::getcolorvalue — Obtiene el valor normalizado del canal de color proporcionado

### Descripción

public **GmagickPixel::getcolorvalue**([int](#language.types.integer) $color): [float](#language.types.float)

Obtiene el valor normalizado del canal de color proporcionado,
en forma de número de punto flotante comprendido entre 0 y 1.

### Parámetros

     color


       El canal a verificar, especificado en forma de una de las constantes de canal
       Gmagick.





### Valores devueltos

El valor del canal, en forma de número de punto flotante normalizado,
y emite una excepción **GmagickPixelException** en caso de error.

# GmagickPixel::setcolor

(PECL gmagick &gt;= Unknown)

GmagickPixel::setcolor — Define la color

### Descripción

public **GmagickPixel::setcolor**([string](#language.types.string) $color): [GmagickPixel](#class.gmagickpixel)

Define la color descrita por el objeto [GmagickPixel](#class.gmagickpixel), con una [string](#language.types.string)
(i.e. "blue", "#0000ff", "rgb(0,0,255)", "cmyk(100,100,100,10)", etc.).

### Parámetros

     color


       La definición de la color a utilizar para inicializar
       el objeto [GmagickPixel](#class.gmagickpixel).





### Valores devueltos

El objeto [GmagickPixel](#class.gmagickpixel) en caso de éxito.

# GmagickPixel::setcolorvalue

(PECL gmagick &gt;= Unknown)

GmagickPixel::setcolorvalue — Establece el valor normalizado de uno de los canales

### Descripción

public **GmagickPixel::setcolorvalue**([int](#language.types.integer) $color, [float](#language.types.float) $value): [GmagickPixel](#class.gmagickpixel)

Establece el valor del canal especificado de este objeto al valor proporcionado, el cuál debería estar
entre 0 y 1. Esta función se puede usar para proporcionar un canal de opacidad al objeto [GmagickPixel](#class.gmagickpixel).

### Parámetros

     color


       Una de las constantes de color de canal de Gmagick.






     value


       El valor para establecer este canal tiene un rango desde 0 a 1.





### Valores devueltos

El objeto [GmagickPixel](#class.gmagickpixel) si se tuvo éxtio.

## Tabla de contenidos

- [GmagickPixel::\_\_construct](#gmagickpixel.construct) — El constructor GmagickPixel
- [GmagickPixel::getcolor](#gmagickpixel.getcolor) — Devuelve el color
- [GmagickPixel::getcolorcount](#gmagickpixel.getcolorcount) — Devuelve el número de colores asociados con este color
- [GmagickPixel::getcolorvalue](#gmagickpixel.getcolorvalue) — Obtiene el valor normalizado del canal de color proporcionado
- [GmagickPixel::setcolor](#gmagickpixel.setcolor) — Define la color
- [GmagickPixel::setcolorvalue](#gmagickpixel.setcolorvalue) — Establece el valor normalizado de uno de los canales

- [Introducción](#intro.gmagick)
- [Instalación/Configuración](#gmagick.setup)<li>[Requerimientos](#gmagick.requirements)
- [Instalación](#gmagick.installation)
  </li>- [Constantes predefinidas](#gmagick.constants)
- [Ejemplos](#gmagick.examples)
- [Gmagick](#class.gmagick) — La clase Gmagick<li>[Gmagick::addimage](#gmagick.addimage) — Añade una nueva imagen a la lista de imágenes del objeto Gmagick
- [Gmagick::addnoiseimage](#gmagick.addnoiseimage) — Añade ruido aleatorio a la imagen
- [Gmagick::annotateimage](#gmagick.annotateimage) — Anota una imagen con texto
- [Gmagick::blurimage](#gmagick.blurimage) — Añade un filtro de borrosidad a la imagen
- [Gmagick::borderimage](#gmagick.borderimage) — Rodea la imagen con un borde
- [Gmagick::charcoalimage](#gmagick.charcoalimage) — Simula un dibujo a carboncillo
- [Gmagick::chopimage](#gmagick.chopimage) — Elimina una región de una imagen y la recorta
- [Gmagick::clear](#gmagick.clear) — Limpia todos los recursos asociados con el objeto Gmagick
- [Gmagick::commentimage](#gmagick.commentimage) — Añade un comentario a una imagen
- [Gmagick::compositeimage](#gmagick.compositeimage) — Compone una imagen en otra
- [Gmagick::\_\_construct](#gmagick.construct) — El constructor Gmagick
- [Gmagick::cropimage](#gmagick.cropimage) — Extrae una región de la imagen
- [Gmagick::cropthumbnailimage](#gmagick.cropthumbnailimage) — Crea una miniatura recortada
- [Gmagick::current](#gmagick.current) — Devuelve la refencia al objeto Gmagick acutal
- [Gmagick::cyclecolormapimage](#gmagick.cyclecolormapimage) — Desplaza un mapa de color de una imagen
- [Gmagick::deconstructimages](#gmagick.deconstructimages) — Devuelve ciertas diferencias de píxeles entre imágenes
- [Gmagick::despeckleimage](#gmagick.despeckleimage) — Reduce el ruido granular de una imagen
- [Gmagick::destroy](#gmagick.destroy) — Destruye un objeto Gmagick
- [Gmagick::drawimage](#gmagick.drawimage) — Renderiza el objeto GmagickDraw en la imagen actual
- [Gmagick::edgeimage](#gmagick.edgeimage) — Mejora los bordes dentro de una imagen
- [Gmagick::embossimage](#gmagick.embossimage) — Devuelve una imagen en escala de grises con un efecto tridimensional
- [Gmagick::enhanceimage](#gmagick.enhanceimage) — Mejora la calidad de una imagen con ruido
- [Gmagick::equalizeimage](#gmagick.equalizeimage) — Ecualiza el histograma de la imagen
- [Gmagick::flipimage](#gmagick.flipimage) — Crea una imagen espejo vertical
- [Gmagick::flopimage](#gmagick.flopimage) — Crea una imagen espejo horizontal
- [Gmagick::frameimage](#gmagick.frameimage) — Añade un borde tridimensional simulado
- [Gmagick::gammaimage](#gmagick.gammaimage) — Corrección gamma de una imagen
- [Gmagick::getcopyright](#gmagick.getcopyright) — Devuelve el copyright de la API GraphicsMagick como una cadena
- [Gmagick::getfilename](#gmagick.getfilename) — El nombre de archivo asociado a una secuencia de imágenes
- [Gmagick::getimagebackgroundcolor](#gmagick.getimagebackgroundcolor) — Devuelve el color de fondo de la imagen
- [Gmagick::getimageblueprimary](#gmagick.getimageblueprimary) — Devuelve el punto primario azul de la cromaticidad
- [Gmagick::getimagebordercolor](#gmagick.getimagebordercolor) — Devuelve el color del borde de la imagen
- [Gmagick::getimagechanneldepth](#gmagick.getimagechanneldepth) — Obtiene la profundidad de un canal de imagen en particular
- [Gmagick::getimagecolors](#gmagick.getimagecolors) — Devuelve el color del índice del mapa de color especificado
- [Gmagick::getimagecolorspace](#gmagick.getimagecolorspace) — Obtiene el espacio de colores de la imagen
- [Gmagick::getimagecompose](#gmagick.getimagecompose) — Devuelve el operador de composición asociado a la imagen
- [Gmagick::getimagedelay](#gmagick.getimagedelay) — Obetiene el retraso de la imagen
- [Gmagick::getimagedepth](#gmagick.getimagedepth) — Obtiene la profundidad de la imagen
- [Gmagick::getimagedispose](#gmagick.getimagedispose) — Obtiene el método de disposición de la imagen
- [Gmagick::getimageextrema](#gmagick.getimageextrema) — Obtiene los extremos de la imagen
- [Gmagick::getimagefilename](#gmagick.getimagefilename) — Devuelve el nombre de archivo de una imagen en particular de una secuencia
- [Gmagick::getimageformat](#gmagick.getimageformat) — Devuelve el formato de una imagen en particular de una secuencia
- [Gmagick::getimagegamma](#gmagick.getimagegamma) — Obtiene el valor gamma de la imagen
- [Gmagick::getimagegreenprimary](#gmagick.getimagegreenprimary) — Devuelve el punto primario verde de la cromaticidad
- [Gmagick::getimageheight](#gmagick.getimageheight) — Devuelve el alto de la imagen
- [Gmagick::getimagehistogram](#gmagick.getimagehistogram) — Obtiene el histograma de la imagen
- [Gmagick::getimageindex](#gmagick.getimageindex) — Obtiene el índice de la imagen activa actual
- [Gmagick::getimageinterlacescheme](#gmagick.getimageinterlacescheme) — Obtiene la combinación de entrelazado de la imagen
- [Gmagick::getimageiterations](#gmagick.getimageiterations) — Obtiene las iteraciones de la imagen
- [Gmagick::getimagematte](#gmagick.getimagematte) — Comprobar si la imagen tiene un canal mate
- [Gmagick::getimagemattecolor](#gmagick.getimagemattecolor) — Devuelve el color mate de la imagen
- [Gmagick::getimageprofile](#gmagick.getimageprofile) — Devuelve el perfil nominado de la imagen
- [Gmagick::getimageredprimary](#gmagick.getimageredprimary) — Devuelve el punto primario rojo de la cromaticidad
- [Gmagick::getimagerenderingintent](#gmagick.getimagerenderingintent) — Obtiene la propuesta de renderización de la imagen
- [Gmagick::getimageresolution](#gmagick.getimageresolution) — Obtiene la resolución X e Y de la imagen
- [Gmagick::getimagescene](#gmagick.getimagescene) — Obtiene la escena de la imagen
- [Gmagick::getimagesignature](#gmagick.getimagesignature) — Genera un resumen de un mensaje SHA-256
- [Gmagick::getimagetype](#gmagick.getimagetype) — Obtiene el tipo de imagen potencial
- [Gmagick::getimageunits](#gmagick.getimageunits) — Obtiene las unidades de resolución de la imagen
- [Gmagick::getimagewhitepoint](#gmagick.getimagewhitepoint) — Devuelve el punto blanco de la cromaticidad
- [Gmagick::getimagewidth](#gmagick.getimagewidth) — Devuelve el ancho de la imagen
- [Gmagick::getpackagename](#gmagick.getpackagename) — Devuelve el nombre del paquete de GraphicsMagick
- [Gmagick::getquantumdepth](#gmagick.getquantumdepth) — Obtiene la profundidad de la cuantía de Gmagick como una cadena
- [Gmagick::getreleasedate](#gmagick.getreleasedate) — Devuelve la fecha de distribución de GraphicsMagick como una cadena
- [Gmagick::getsamplingfactors](#gmagick.getsamplingfactors) — Obtiene el factor de muestreo horizontal y vertical
- [Gmagick::getsize](#gmagick.getsize) — Devuelve el tamaño asociado con el objeto Gmagick
- [Gmagick::getversion](#gmagick.getversion) — Devuelve la versión de la API GraphicsMagick
- [Gmagick::hasnextimage](#gmagick.hasnextimage) — Comprueba si el objeto tiene más imágenes
- [Gmagick::haspreviousimage](#gmagick.haspreviousimage) — Verifica si el objeto tiene una imagen previa
- [Gmagick::implodeimage](#gmagick.implodeimage) — Crea una nueva imagen como una copia
- [Gmagick::labelimage](#gmagick.labelimage) — Añade una etiqueta a una imagen
- [Gmagick::levelimage](#gmagick.levelimage) — Ajusta los niveles de la imagen
- [Gmagick::magnifyimage](#gmagick.magnifyimage) — Redimensiona una imagen por 2 manteniendo las proporciones
- [Gmagick::mapimage](#gmagick.mapimage) — Sustituye los colores de una imagen por los colores más cercanos de una imagen de referencia
- [Gmagick::medianfilterimage](#gmagick.medianfilterimage) — Aplica un filtro digital
- [Gmagick::minifyimage](#gmagick.minifyimage) — Reduce una imagen a la mitad manteniendo las proporciones
- [Gmagick::modulateimage](#gmagick.modulateimage) — Controla la luminosidad, la saturación y el tono
- [Gmagick::motionblurimage](#gmagick.motionblurimage) — Simula un desenfoque cinético
- [Gmagick::newimage](#gmagick.newimage) — Crea una nueva imagen
- [Gmagick::nextimage](#gmagick.nextimage) — Se desplaza a la imagen siguiente
- [Gmagick::normalizeimage](#gmagick.normalizeimage) — Mejora el contraste del color de la imagen
- [Gmagick::oilpaintimage](#gmagick.oilpaintimage) — Simula una pintura al óleo
- [Gmagick::previousimage](#gmagick.previousimage) — Moverse a la imagen previa del objeto
- [Gmagick::profileimage](#gmagick.profileimage) — Añade o elimina un perfil de una imagen
- [Gmagick::quantizeimage](#gmagick.quantizeimage) — Analiza los colores dentro de una imagen de referencia
- [Gmagick::quantizeimages](#gmagick.quantizeimages) — Analiza los colores dentro de una secuencia de imágenes
- [Gmagick::queryfontmetrics](#gmagick.queryfontmetrics) — Devuelve una matriz que representa las métricas de la fuente
- [Gmagick::queryfonts](#gmagick.queryfonts) — Devuelve las fuentes configuradas
- [Gmagick::queryformats](#gmagick.queryformats) — Devuelve los formatos soportados por Gmagick
- [Gmagick::radialblurimage](#gmagick.radialblurimage) — Desenfoca una imagen siguiendo un radio
- [Gmagick::raiseimage](#gmagick.raiseimage) — Crea un botón con un efecto 3D
- [Gmagick::read](#gmagick.read) — Lee una imagen desde un fichero
- [Gmagick::readimage](#gmagick.readimage) — Lee una imagen desde un fichero
- [Gmagick::readimageblob](#gmagick.readimageblob) — Lee una imagen desde una cadena binaria
- [Gmagick::readimagefile](#gmagick.readimagefile) — El propósito de readimagefile
- [Gmagick::reducenoiseimage](#gmagick.reducenoiseimage) — Suaviza los contornos de la imagen
- [Gmagick::removeimage](#gmagick.removeimage) — Elimina una imagen de la lista de imágenes
- [Gmagick::removeimageprofile](#gmagick.removeimageprofile) — Elimina el perfil nombrado de la imagen y lo devuelve
- [Gmagick::resampleimage](#gmagick.resampleimage) — Re-muestrea la imagen a la resolución deseada
- [Gmagick::resizeimage](#gmagick.resizeimage) — Redimensiona una imagen
- [Gmagick::rollimage](#gmagick.rollimage) — Compensa una imagen
- [Gmagick::rotateimage](#gmagick.rotateimage) — Rota una imagen
- [Gmagick::scaleimage](#gmagick.scaleimage) — Redimensiona una imagen
- [Gmagick::separateimagechannel](#gmagick.separateimagechannel) — Separa un canal de una imagen
- [Gmagick::setCompressionQuality](#gmagick.setcompressionquality) — Define la calidad de compresión por defecto del objeto
- [Gmagick::setfilename](#gmagick.setfilename) — Define el nombre de archivo antes de leer o escribir una imagen
- [Gmagick::setimagebackgroundcolor](#gmagick.setimagebackgroundcolor) — Define la color de fondo de la imagen
- [Gmagick::setimageblueprimary](#gmagick.setimageblueprimary) — Define el punto azul primario de la imagen cromática
- [Gmagick::setimagebordercolor](#gmagick.setimagebordercolor) — Define la color de la frontera de la imagen
- [Gmagick::setimagechanneldepth](#gmagick.setimagechanneldepth) — Define la profundidad de un canal particular de la imagen
- [Gmagick::setimagecolorspace](#gmagick.setimagecolorspace) — Define el espacio de colores de la imagen
- [Gmagick::setimagecompose](#gmagick.setimagecompose) — Establece el operador de composción de una imagen
- [Gmagick::setimagedelay](#gmagick.setimagedelay) — Define el retraso de la imagen
- [Gmagick::setimagedepth](#gmagick.setimagedepth) — Define la profundidad de la imagen
- [Gmagick::setimagedispose](#gmagick.setimagedispose) — Define el método de disposición de la imagen
- [Gmagick::setimagefilename](#gmagick.setimagefilename) — Define el nombre del fichero para una imagen particular de una secuencia
- [Gmagick::setimageformat](#gmagick.setimageformat) — Define el formato de una imagen
- [Gmagick::setimagegamma](#gmagick.setimagegamma) — Define el gamma de la imagen
- [Gmagick::setimagegreenprimary](#gmagick.setimagegreenprimary) — Define el punto verde en la imagen cromática primaria
- [Gmagick::setimageindex](#gmagick.setimageindex) — Establece el iterador en la posición especificada en la lista de imágenes apuntada por su índice
- [Gmagick::setimageinterlacescheme](#gmagick.setimageinterlacescheme) — Define el esquema de entrelazado de la imagen
- [Gmagick::setimageiterations](#gmagick.setimageiterations) — Define las iteraciones de la imagen
- [Gmagick::setimageprofile](#gmagick.setimageprofile) — Añade un perfil nombrado al objeto Gmagick
- [Gmagick::setimageredprimary](#gmagick.setimageredprimary) — Define el punto rojo en la imagen cromática primaria
- [Gmagick::setimagerenderingintent](#gmagick.setimagerenderingintent) — Define la imagen de renderizado
- [Gmagick::setimageresolution](#gmagick.setimageresolution) — Establece la resolución de la imagen
- [Gmagick::setimagescene](#gmagick.setimagescene) — Define la imagen de escena
- [Gmagick::setimagetype](#gmagick.setimagetype) — Define el tipo de la imagen
- [Gmagick::setimageunits](#gmagick.setimageunits) — Define las unidades a utilizar para la resolución de la imagen
- [Gmagick::setimagewhitepoint](#gmagick.setimagewhitepoint) — Define el punto blanco en la imagen cromática primaria
- [Gmagick::setsamplingfactors](#gmagick.setsamplingfactors) — Define los factores de muestreo de la imagen
- [Gmagick::setsize](#gmagick.setsize) — Define el tamaño del objeto Gmagick
- [Gmagick::shearimage](#gmagick.shearimage) — Crea un paralelogramo
- [Gmagick::solarizeimage](#gmagick.solarizeimage) — Aplica un efecto de solarización a la imagen
- [Gmagick::spreadimage](#gmagick.spreadimage) — Desplaza aleatoriamente cada píxel de un bloque
- [Gmagick::stripimage](#gmagick.stripimage) — Elimina de una imagen todos los perfiles y todos los comentarios
- [Gmagick::swirlimage](#gmagick.swirlimage) — Remue los píxeles del centro de la imagen
- [Gmagick::thumbnailimage](#gmagick.thumbnailimage) — Modifica el tamaño de una imagen
- [Gmagick::trimimage](#gmagick.trimimage) — Elimina los bordes de la imagen
- [Gmagick::write](#gmagick.write) — Alias de Gmagick::writeimage
- [Gmagick::writeimage](#gmagick.writeimage) — Escribe una imagen en un archivo
  </li>- [GmagickDraw](#class.gmagickdraw) — La clase GmagickDraw<li>[GmagickDraw::annotate](#gmagickdraw.annotate) — Dibuja texto en la imagen
- [GmagickDraw::arc](#gmagickdraw.arc) — Dibuja un arco
- [GmagickDraw::bezier](#gmagickdraw.bezier) — Dibuja una curva Bézier
- [GmagickDraw::ellipse](#gmagickdraw.ellipse) — Dibuja una elipse en la imagen
- [GmagickDraw::getfillcolor](#gmagickdraw.getfillcolor) — Devuelve el color de relleno
- [GmagickDraw::getfillopacity](#gmagickdraw.getfillopacity) — Devuelve la opacidad usada cuando se dibuja
- [GmagickDraw::getfont](#gmagickdraw.getfont) — Devuelve el tipo de letra
- [GmagickDraw::getfontsize](#gmagickdraw.getfontsize) — Devuelve el tamaño de punto de la fuente
- [GmagickDraw::getfontstyle](#gmagickdraw.getfontstyle) — Devuelve el estilo de fuente
- [GmagickDraw::getfontweight](#gmagickdraw.getfontweight) — Devuelve el peso de la fuente
- [GmagickDraw::getstrokecolor](#gmagickdraw.getstrokecolor) — Devuelve el color usado para contornear perfiles de objetos
- [GmagickDraw::getstrokeopacity](#gmagickdraw.getstrokeopacity) — Devuelve la opacidad de los perfiles del objeto contorneado
- [GmagickDraw::getstrokewidth](#gmagickdraw.getstrokewidth) — Devuelve el ancho del contorno usado para dibular perfiles del objeto
- [GmagickDraw::gettextdecoration](#gmagickdraw.gettextdecoration) — Devuelve la decoración del texto
- [GmagickDraw::gettextencoding](#gmagickdraw.gettextencoding) — Devuelve el conjunto de codificación usado para anotaciones de texto
- [GmagickDraw::line](#gmagickdraw.line) — Dibuja una línea
- [GmagickDraw::point](#gmagickdraw.point) — Dibuja un punto
- [GmagickDraw::polygon](#gmagickdraw.polygon) — Dibuja un polígono
- [GmagickDraw::polyline](#gmagickdraw.polyline) — Dibuja una polilínea
- [GmagickDraw::rectangle](#gmagickdraw.rectangle) — Dibuja un rectángulo
- [GmagickDraw::rotate](#gmagickdraw.rotate) — Aplica la rotación especificada al espacio de coordenadas actual
- [GmagickDraw::roundrectangle](#gmagickdraw.roundrectangle) — Dibuja un rectángulo redondeado
- [GmagickDraw::scale](#gmagickdraw.scale) — Ajusta el factor de escala
- [GmagickDraw::setfillcolor](#gmagickdraw.setfillcolor) — Establece el color de relleno a usar cuando se dibujan objetos rellenos
- [GmagickDraw::setfillopacity](#gmagickdraw.setfillopacity) — Establece la opacidad del relleno
- [GmagickDraw::setfont](#gmagickdraw.setfont) — Establece la fuente especificada completamente a usar cuando se anota texto
- [GmagickDraw::setfontsize](#gmagickdraw.setfontsize) — Establece el tamaño de punto de la fuente a usar cuando se anota texto
- [GmagickDraw::setfontstyle](#gmagickdraw.setfontstyle) — Establece el estilo de fuente a usar cuando se anota texto
- [GmagickDraw::setfontweight](#gmagickdraw.setfontweight) — Establece el peso de la fuente
- [GmagickDraw::setstrokecolor](#gmagickdraw.setstrokecolor) — Establece el color usado para contornear los perfiles del objeto
- [GmagickDraw::setstrokeopacity](#gmagickdraw.setstrokeopacity) — Especifica la opacidad del los perfiles del objeto contorneado
- [GmagickDraw::setstrokewidth](#gmagickdraw.setstrokewidth) — Establece el ancho del contorno usado para dibujar los perfiles del objeto.
- [GmagickDraw::settextdecoration](#gmagickdraw.settextdecoration) — Especifica una decoración
- [GmagickDraw::settextencoding](#gmagickdraw.settextencoding) — Especifica el conjunto de codificación del texto
  </li>- [GmagickPixel](#class.gmagickpixel) — La clase GmagickPixel<li>[GmagickPixel::__construct](#gmagickpixel.construct) — El constructor GmagickPixel
- [GmagickPixel::getcolor](#gmagickpixel.getcolor) — Devuelve el color
- [GmagickPixel::getcolorcount](#gmagickpixel.getcolorcount) — Devuelve el número de colores asociados con este color
- [GmagickPixel::getcolorvalue](#gmagickpixel.getcolorvalue) — Obtiene el valor normalizado del canal de color proporcionado
- [GmagickPixel::setcolor](#gmagickpixel.setcolor) — Define la color
- [GmagickPixel::setcolorvalue](#gmagickpixel.setcolorvalue) — Establece el valor normalizado de uno de los canales
  </li>
