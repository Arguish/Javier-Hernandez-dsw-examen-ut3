# wkhtmltox

# Introducción

libwkhtmltox es una librería LGPLv3 de código abierto para renderizar HTML en PDF y varios formatos de
imagen usando el motor de renderización QtWebKit.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#wkhtmltox.requirements)
- [Instalación](#wkhtmltox.installation)
- [Configuración en tiempo de ejecución](#wkhtmltox.configuration)

    ## Requerimientos

    La fuente de libwkhtmltox y las liberaciones binarias se distribuyen en [» wkhtmltopdf.org](http://wkhtmltopdf.org).

    **Precaución**

    Los usuarios de Windows necesitan dar el paso adicional de añadir wkhtmltox.dll a su PATH.

    ## Instalación

    El código fuente de esta extensión, y los binarios para Windows están alojados en [» github](https://github.com/krakjoe/wkhtmltox),

    Buscando el código fuente y construyendo la extensión:

git clone https://github.com/krakjoe/wkhtmltox
cd wkhtmltox
phpize
./configure --with-wkhtmltox=/path/to/wkhtmltox/installation
make
sudo make install

Buscando actualizaciones y reconstruyendo la extensión:

cd wkhtmltox
phpize --clean
git pull origin master
phpize
./configure --with-wkhtmltox=/path/to/wkhtmltox/installation
make
sudo make install

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

  <caption>**wkhtmltox Opciones de configuración**</caption>
  
  
   
    Nombre
    Por defecto
    Cambiable
    Historial de cambios


    [wkhtmltox.graphics](#ini.wkhtmltox.graphics)
    Off
    **[INI_SYSTEM](#constant.ini-system)**|**[INI_PERDIR](#constant.ini-perdir)**
    &gt;= 0.3.2

Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

    wkhtmltox.graphics
    [bool](#language.types.boolean)



     Permite que libwkhtmltox utilice gráficos.

# La clase wkhtmltox\PDF\Converter

(wkhtmltox &gt;= 0.1.0)

## Introducción

    Convierte una entrada HTML, o un conjunto de entradas HTML, en una salida PDF

## Sinopsis de la Clase

    ****




      class **wkhtmltox\PDF\Converter**

     {


    /* Constructor */

public [\_\_construct](#wkhtmltox-pdf-converter.construct)([array](#language.types.array) $settings = ?)

    /* Métodos */
    public [add](#wkhtmltox-pdf-converter.add)([wkhtmltox\PDF\Object](#class.wkhtmltox-pdf-object) $object): [void](language.types.void.html)

public [convert](#wkhtmltox-pdf-converter.convert)(): [?](#language.types.null)[string](#language.types.string)
public [getVersion](#wkhtmltox-pdf-converter.getversion)(): [string](#language.types.string)

}

# wkhtmltox\PDF\Converter::add

(wkhtmltox &gt;= 0.1.0)

wkhtmltox\PDF\Converter::add — Añade un objeto para su conversión

### Descripción

public **wkhtmltox\PDF\Converter::add**([wkhtmltox\PDF\Object](#class.wkhtmltox-pdf-object) $object): [void](language.types.void.html)

Añade el objeto dado a la conversión

### Parámetros

    object


      El objeto a añadir


# wkhtmltox\PDF\Converter::\_\_construct

(wkhtmltox &gt;= 0.1.0)

wkhtmltox\PDF\Converter::\_\_construct — Crea un nuevo conversor de PDF

### Descripción

public **wkhtmltox\PDF\Converter::\_\_construct**([array](#language.types.array) $settings = ?)

Crea un nuevo conversor de PDF, utilizando opcionalmente una configuración.

### Parámetros

    settings









          Nombre
          Descripción
          Valores
          Registro de cambios






          size.pageSize
          Tamaño del papel del documento final
          A4
          &gt;= 0.1.0



          size.width
          Ancho del documento final
          210mm
          &gt;= 0.1.0



          size.height
          Altura del documento final
          297mm
          &gt;= 0.1.0



          orientation
          Orientación del documento final






               Landscape



               Portrait







          &gt;= 0.1.0



          colorMode
          Modo de color del documento final






               Color



               Greyscale







          &gt;= 0.1.0



          resolution
          Resolución del documento final
          La mayoría de las veces, no tiene ningún efecto
          &gt;= 0.1.0



          dpi
          DPI a usar al imprimir
          80
          &gt;= 0.1.0



          pageOffset
          Entero a añadir a los números de página generados para el encabezado,
           el pie de página y el índice
           
          &gt;= 0.1.0



          copies
           
           
          &gt;= 0.1.0



          collate
          Si se deben intercalar las copias
          booleano
          &gt;= 0.1.0



          outline
          Genera un índice PDF
          booleano
          &gt;= 0.1.0



          outlineDepth
          Profundidad máxima del índice
           
          &gt;= 0.1.0



          dumpOutline
          Ruta del archivo para extraer el índice XML
           
          &gt;= 0.1.0



          out
          Ruta para el archivo final, si es "-" se usa stdout
           
          &gt;= 0.1.0



          documentTitle
          Título del documento final
           
          &gt;= 0.1.0



          useCompression
          Activa o desactiva la compresión sin pérdida
          booleano
          &gt;= 0.1.0



          margin.top
          Tamaño del margen superior
          2cm
          &gt;= 0.1.0



          margin.bottom
          Tamaño del margen inferior
          2cm
          &gt;= 0.1.0



          margin.left
          Tamaño del margen izquierdo
          2cm
          &gt;= 0.1.0



          margin.right
          Tamaño del margen derecho
          2cm
          &gt;= 0.1.0



          imageDPI
          DPI máximo para las imágenes en el documento final
           
          &gt;= 0.1.0



          imageQuality
          El factor de compresión jpeg para las imágenes en el documento final
          94
          &gt;= 0.1.0



           load.cookieJar
           Ruta hacia el archivo utilizado para cargar y almacenar las cookies
           /tmp/cookies.txt
           &gt;= 0.1.0








# wkhtmltox\PDF\Converter::convert

(wkhtmltox &gt;= 0.1.0)

wkhtmltox\PDF\Converter::convert — Realiza la conversión a PDF

### Descripción

public **wkhtmltox\PDF\Converter::convert**(): [?](#language.types.null)[string](#language.types.string)

Realiza la conversión de todos los objetos añadidos anteriormente

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Donde se utiliza el valor de retorno, se llenará con el contenido del buffer de conversión

# wkhtmltox\PDF\Converter::getVersion

(wkhtmltox &gt;= 0.3.2)

wkhtmltox\PDF\Converter::getVersion — Determina la versión del convertidor

### Descripción

public **wkhtmltox\PDF\Converter::getVersion**(): [string](#language.types.string)

Determina la versión del convertidor según lo informado por libwkhtmltox

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string de versión

## Tabla de contenidos

- [wkhtmltox\PDF\Converter::add](#wkhtmltox-pdf-converter.add) — Añade un objeto para su conversión
- [wkhtmltox\PDF\Converter::\_\_construct](#wkhtmltox-pdf-converter.construct) — Crea un nuevo conversor de PDF
- [wkhtmltox\PDF\Converter::convert](#wkhtmltox-pdf-converter.convert) — Realiza la conversión a PDF
- [wkhtmltox\PDF\Converter::getVersion](#wkhtmltox-pdf-converter.getversion) — Determina la versión del convertidor

# La clase wkhtmltox\PDF\Object

(wkhtmltox &gt;= 0.1.0)

## Introducción

    Representa un documento HTML, convertidor de entrada a PDF

## Sinopsis de la Clase

    ****




      class **wkhtmltox\PDF\Object**

     {


    /* Constructor */

public [\_\_construct](#wkhtmltox-pdf-object.construct)([string](#language.types.string) $buffer, [array](#language.types.array) $settings = ?)

}

# wkhtmltox\PDF\Object::\_\_construct

(wkhtmltox &gt;= 0.1.0)

wkhtmltox\PDF\Object::\_\_construct — Crea un nuevo objeto PDF

### Descripción

public **wkhtmltox\PDF\Object::\_\_construct**([string](#language.types.string) $buffer, [array](#language.types.array) $settings = ?)

Crea un nuevo objeto PDF desde el buffer proporcionado,
y las configuraciones opcionales.

### Parámetros

    buffer


      HTML






    settings









          Nombre
          Descripción
          Valor
          Registro de cambios






          page
          URL o ruta del archivo HTML a
           convertir
           
          &gt;= 0.1.0



          useExternalLinks
          Establecer en **[true](#constant.true)** para convertir los enlaces externos
            enlaces PDF en la salida
          booleano
          &gt;= 0.1.0



          useLocalLinks
          Establecer en **[true](#constant.true)** para convertir los enlaces internos
           en los datos de entrada en enlaces PDF en la salida
          booleano
          &gt;= 0.1.0



          produceForms
          Establecer en **[true](#constant.true)** para convertir los formularios
           HTML en formularios PDF
          booleano
          &gt;= 0.1.0



          replacements
          no documentado
           
          &gt;= 0.1.0



          includeInOutline
          Establecer en **[true](#constant.true)** para incluir las secciones
           de este objeto en el contorno y la tabla de contenidos
          booleano
          &gt;= 0.1.0



          pagesCount
          Establecer en **[true](#constant.true)** para incluir en la tabla de contenidos el número
           de páginas de este objeto
          booleano
          &gt;= 0.1.0



          tocXsl
          Establecer en hoja de estilo para convertir este objeto en un objeto de tabla de contenidos
           
          &gt;= 0.1.0



          toc.useDottedLines
          Establecer en **[true](#constant.true)** para usar líneas de puntos
           en la tabla de contenidos
          booleano
          &gt;= 0.1.0



          toc.captionText
          El pie de ilustración para la tabla de contenidos
           
          &gt;= 0.1.0



          toc.forwardLinks
          Establecer en **[true](#constant.true)** para crear enlaces
           desde la tabla de contenidos hacia el contenido
          booleano
          &gt;= 0.1.0



          toc.backLinks
          Establecer en **[true](#constant.true)** para crear enlaces
           desde el contenido hacia la tabla de contenidos
          booleano
          &gt;= 0.1.0



          toc.indentation
          La indentación para la tabla de contenidos
          2em
          &gt;= 0.1.0



          toc.fontScale
          El factor para reducir la fuente de caracteres
           en todos los niveles de la tabla de contenidos
          0.8
          &gt;= 0.1.0



          header.fontSize
          El tamaño de la fuente de caracteres a usar en el encabezado
          13
          &gt;= 0.1.0



          header.fontName
          El nombre de la fuente de caracteres a usar en el encabezado
          times
          &gt;= 0.1.0



          header.left
          El texto para el lado izquierdo del encabezado
           
          &gt;= 0.1.0



          header.center
          El texto para el centro del encabezado
           
          &gt;= 0.1.0



          header.right
          El texto para el lado derecho del encabezado
           
          &gt;= 0.1.0



          header.line
          Activa o desactiva la regla horizontal bajo el encabezado
          booleano
          &gt;= 0.1.0



          header.spacing
          El espacio entre el encabezado y el contenido
          1.8
          &gt;= 0.1.0



          header.htmlUrl
          URL o la ruta hacia el archivo HTML a usar
           en el encabezado
           
          &gt;= 0.1.0



          footer.fontSize
          El tamaño de la fuente de caracteres a usar en el pie de página
          13
          &gt;= 0.1.0



          footer.fontName
          El nombre de la fuente de caracteres a usar en el pie de página
          times
          &gt;= 0.1.0



          footer.left
          El texto para el lado izquierdo del pie de página
           
          &gt;= 0.1.0



          footer.center
          El texto para el centro del pie de página
           
          &gt;= 0.1.0



          footer.right
          El texto para el lado derecho del pie de página
           
          &gt;= 0.1.0



          footer.line
          Activa o desactiva la regla horizontal bajo el pie de página
          booleano
          &gt;= 0.1.0



          footer.spacing
          El espacio entre el pie de página y el contenido
          1.8
          &gt;= 0.1.0



          footer.htmlUrl
          URL o la ruta del archivo HTML a usar en el
           pie de página
           
          &gt;= 0.1.0




load.username
nombre de usuario a utilizar al conectarse a un sitio web
bart
&gt;= 0.1.0

load.password
contraseña a utilizar al conectarse a un sitio web
elbarto
&gt;= 0.1.0

load.jsdelay
el tiempo en milisegundos a esperar después de cargar una página antes de capturarla
1200
&gt;= 0.1.0

load.zoomFactor
cuánto zoom debe aplicarse al contenido
2.2
&gt;= 0.1.0

load.customHeaders
encabezados personalizados a enviar al solicitar la página web principal

 
&gt;= 0.1.0

load.repertCustomHeaders
establecer en true para enviar con todas las solicitudes
booleano
&gt;= 0.1.0

load.cookies
cookie a enviar al solicitar la página web principal

 
&gt;= 0.1.0

load.post
string a enviar al realizar una solicitud post a la página web principal

 
&gt;= 0.1.0

load.blockLocalFileAccess
impide que los archivos locales y los archivos de tubería accedan a otros archivos locales
booleano
&gt;= 0.1.0

load.stopSlowScript
detiene los scripts lentos de javascript
booleano

 

load.debugJavascript
permite que javascript lance advertencias
booleano
&gt;= 0.1.0

load.loadErrorHandling
define la estrategia de manejo de errores

       abort
       aborta el proceso de conversión



       skip
       no añade el objeto a la salida final



       ignore
       intenta añadir el objeto a la salida final




&gt;= 0.1.0

load.proxy

 

 
&gt;= 0.1.0

web.background
incluye una imagen de fondo en la salida
booleano
&gt;= 0.1.0

web.loadImages
incluye imágenes en la salida
booleano
&gt;= 0.1.0

web.enableJavascript
activa o desactiva javascript
booleano
&gt;= 0.1.0

web.enableIntelligentShrinking
activa el intento de poner más contenido en la página, se aplica solo a la salida PDF
booleano
&gt;= 0.1.0

web.minimumFontSize
el tamaño de fuente mínimo permitido
9
&gt;= 0.1.0

web.printMediaType
muestra el contenido usando el tipo de medio de impresión en lugar del tipo de medio de pantalla
booleano
&gt;= 0.1.0

web.defaultEncoding
el contenido a usar cuando no se especifica ninguna codificación
utf-8
&gt;= 0.1.0

web.userStyleSheet
URL o ruta hacia una hoja de estilo de usuario especificada
/ruta/hacia/estilo.css
&gt;= 0.1.0

web.enablePlugins
activa o desactiva los plugins NS
booleano
&gt;= 0.1.0

## Tabla de contenidos

- [wkhtmltox\PDF\Object::\_\_construct](#wkhtmltox-pdf-object.construct) — Crea un nuevo objeto PDF

# La clase wkhtmltox\Image\Converter

(wkhtmltox &gt;= 0.1.0)

## Introducción

    Convierte una entrada HTML en varios formatos de imagen

## Sinopsis de la Clase

    ****




      class **wkhtmltox\Image\Converter**

     {


    /* Constructor */

public [\_\_construct](#wkhtmltox-image-converter.construct)([string](#language.types.string) $buffer = ?, [array](#language.types.array) $settings = ?)

    /* Métodos */
    public [convert](#wkhtmltox-image-converter.convert)(): [?](#language.types.null)[string](#language.types.string)

public [getVersion](#wkhtmltox-image-converter.getversion)(): [string](#language.types.string)

}

# wkhtmltox\Image\Converter::\_\_construct

(wkhtmltox &gt;= 0.1.0)

wkhtmltox\Image\Converter::\_\_construct — Crea un nuevo convertidor de imágenes

### Descripción

public **wkhtmltox\Image\Converter::\_\_construct**([string](#language.types.string) $buffer = ?, [array](#language.types.array) $settings = ?)

Crea un convertidor de imágenes, utilizando opcionalmente un buffer de entrada
así como una configuración

### Parámetros

    buffer


      HTML






    settings









          Nombre
          Descripción
          Valor
          Registro de cambios






          in
          URL o ruta del archivo de entrada, si se usa la salida "-"
          /ruta/hacia/marcado.html
          &gt;= 0.1.0



          out
          Ruta del archivo de salida, si es "-" se usa stdout; por omisión, se usa un buffer interno
          /ruta/hacia/salida.png
          &gt;= 0.1.0



          fmt
          Formato de salida a usar






               ""
               predeterminado



               jpg
               salida como JPEG



               png
               salida como PNG



               bmp
               salida como mapa de bits



               svg
               salida como SVG







          &gt;= 0.1.0



          transparent
          En la salida PNG o SVG, hace el fondo transparente
          booleano
          &gt;= 0.1.0



          screenWidth
          El ancho de pantalla a usar para el renderizado en píxeles
          800
          &gt;= 0.1.0



          smartWidth
          Cuando es **[true](#constant.true)**, el ancho de la pantalla se extiende al ancho del contenido
          booleano
          &gt;= 0.1.0



          quality
          Factor de compresión a usar cuando la salida es una imagen JPEG
          94
          &gt;= 0.1.0



          crop.left
          Izquierda/coordenada X de la ventana a capturar, en píxeles
          200
          &gt;= 0.1.0



          crop.top
          Arriba/coordenada Y de la ventana a capturar, en píxeles
          200
          &gt;= 0.1.0



          crop.width
          Ancho de la ventana a capturar, en píxeles
          200
          &gt;= 0.1.0



          crop.height
          Altura de la ventana a capturar, en píxeles
          200
          &gt;= 0.1.0



           load.cookieJar
           Ruta del archivo utilizado para cargar y almacenar las cookies.
           /tmp/cookies.txt
           &gt;= 0.1.0




load.username
nombre de usuario a utilizar al conectarse a un sitio web
bart
&gt;= 0.1.0

load.password
contraseña a utilizar al conectarse a un sitio web
elbarto
&gt;= 0.1.0

load.jsdelay
el tiempo en milisegundos a esperar después de cargar una página antes de capturarla
1200
&gt;= 0.1.0

load.zoomFactor
cuánto zoom debe aplicarse al contenido
2.2
&gt;= 0.1.0

load.customHeaders
encabezados personalizados a enviar al solicitar la página web principal

 
&gt;= 0.1.0

load.repertCustomHeaders
establecer en true para enviar con todas las solicitudes
booleano
&gt;= 0.1.0

load.cookies
cookie a enviar al solicitar la página web principal

 
&gt;= 0.1.0

load.post
string a enviar al realizar una solicitud post a la página web principal

 
&gt;= 0.1.0

load.blockLocalFileAccess
impide que los archivos locales y los archivos de tubería accedan a otros archivos locales
booleano
&gt;= 0.1.0

load.stopSlowScript
detiene los scripts lentos de javascript
booleano

 

load.debugJavascript
permite que javascript lance advertencias
booleano
&gt;= 0.1.0

load.loadErrorHandling
define la estrategia de manejo de errores

       abort
       aborta el proceso de conversión



       skip
       no añade el objeto a la salida final



       ignore
       intenta añadir el objeto a la salida final




&gt;= 0.1.0

load.proxy

 

 
&gt;= 0.1.0

web.background
incluye una imagen de fondo en la salida
booleano
&gt;= 0.1.0

web.loadImages
incluye imágenes en la salida
booleano
&gt;= 0.1.0

web.enableJavascript
activa o desactiva javascript
booleano
&gt;= 0.1.0

web.enableIntelligentShrinking
activa el intento de poner más contenido en la página, se aplica solo a la salida PDF
booleano
&gt;= 0.1.0

web.minimumFontSize
el tamaño de fuente mínimo permitido
9
&gt;= 0.1.0

web.printMediaType
muestra el contenido usando el tipo de medio de impresión en lugar del tipo de medio de pantalla
booleano
&gt;= 0.1.0

web.defaultEncoding
el contenido a usar cuando no se especifica ninguna codificación
utf-8
&gt;= 0.1.0

web.userStyleSheet
URL o ruta hacia una hoja de estilo de usuario especificada
/ruta/hacia/estilo.css
&gt;= 0.1.0

web.enablePlugins
activa o desactiva los plugins NS
booleano
&gt;= 0.1.0

# wkhtmltox\Image\Converter::convert

(wkhtmltox &gt;= 0.1.0)

wkhtmltox\Image\Converter::convert — Realiza la conversión de la imagen

### Descripción

public **wkhtmltox\Image\Converter::convert**(): [?](#language.types.null)[string](#language.types.string)

Realiza la conversión de la memoria intermedia de entrada

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Cuando se utilice el valor de retorno, se rellenará con el contenido de la memoria intermedia de conversión

# wkhtmltox\Image\Converter::getVersion

(wkhtmltox &gt;= 0.3.2)

wkhtmltox\Image\Converter::getVersion — Determina la versión del convertidor

### Descripción

public **wkhtmltox\Image\Converter::getVersion**(): [string](#language.types.string)

Determina la versión del convertidor según lo informado por libwkhtmltox

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un string de versión

**Advertencia**

    Esto todavía no se ha implementado por libwkhtmltox

## Tabla de contenidos

- [wkhtmltox\Image\Converter::\_\_construct](#wkhtmltox-image-converter.construct) — Crea un nuevo convertidor de imágenes
- [wkhtmltox\Image\Converter::convert](#wkhtmltox-image-converter.convert) — Realiza la conversión de la imagen
- [wkhtmltox\Image\Converter::getVersion](#wkhtmltox-image-converter.getversion) — Determina la versión del convertidor

- [Introducción](#intro.wkhtmltox)
- [Instalación/Configuración](#wkhtmltox.setup)<li>[Requerimientos](#wkhtmltox.requirements)
- [Instalación](#wkhtmltox.installation)
- [Configuración en tiempo de ejecución](#wkhtmltox.configuration)
  </li>- [wkhtmltox\PDF\Converter](#class.wkhtmltox-pdf-converter) — La clase wkhtmltox\PDF\Converter<li>[wkhtmltox\PDF\Converter::add](#wkhtmltox-pdf-converter.add) — Añade un objeto para su conversión
- [wkhtmltox\PDF\Converter::\_\_construct](#wkhtmltox-pdf-converter.construct) — Crea un nuevo conversor de PDF
- [wkhtmltox\PDF\Converter::convert](#wkhtmltox-pdf-converter.convert) — Realiza la conversión a PDF
- [wkhtmltox\PDF\Converter::getVersion](#wkhtmltox-pdf-converter.getversion) — Determina la versión del convertidor
  </li>- [wkhtmltox\PDF\Object](#class.wkhtmltox-pdf-object) — La clase wkhtmltox\PDF\Object<li>[wkhtmltox\PDF\Object::__construct](#wkhtmltox-pdf-object.construct) — Crea un nuevo objeto PDF
  </li>- [wkhtmltox\Image\Converter](#class.wkhtmltox-image-converter) — La clase wkhtmltox\Image\Converter<li>[wkhtmltox\Image\Converter::__construct](#wkhtmltox-image-converter.construct) — Crea un nuevo convertidor de imágenes
- [wkhtmltox\Image\Converter::convert](#wkhtmltox-image-converter.convert) — Realiza la conversión de la imagen
- [wkhtmltox\Image\Converter::getVersion](#wkhtmltox-image-converter.getversion) — Determina la versión del convertidor
  </li>
