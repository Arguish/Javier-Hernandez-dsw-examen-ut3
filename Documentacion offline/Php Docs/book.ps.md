# Creación de documentos PostScript

# Introducción

Este módulo permite crear documentos PostScript. Tiene muchas
similitudes con la extensión pdf. Actualmente, esta API es
prácticamente idéntica y en la mayoría de los casos, solo se reemplazan
los prefijos de cada función de pdf* por ps*. Esto también funciona
para las funciones que no tienen significado en el documento PostScript
(por ejemplo, la adición de hipervínculos) pero tendrá un efecto si el
documento se convierte en PDF.

Los documentos creados por esta extensión son a veces incluso
superiores a los documentos creados con la extensión pdf, porque las
funciones de rendimiento de texto de pslib pueden manejar el crénage,
la división de palabras y las ligaduras que resultan en una mejor
visualización de la caja de texto.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#ps.requirements)
- [Instalación](#ps.installation)
- [Tipos de recursos](#ps.resources)

    ## Requerimientos

    Se requiere al menos pslib &gt;= 0.1.12. La biblioteca ps
    (pslib) está disponible en [» http://pslib.sourceforge.net/](http://pslib.sourceforge.net/).

## Instalación

Información sobre la instalación de estas extensiones PECL
puede ser encontrada en el capítulo del manual titulado [Instalación
de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
versiones, descargas, fuentes de archivos, información sobre los mantenedores
así como un CHANGELOG, pueden ser encontradas aquí:
[» https://pecl.php.net/package/ps](https://pecl.php.net/package/ps).

## Tipos de recursos

Esta extensión define un recurso de documento PostScript, devuelto
por la función [ps_new()](#function.ps-new).

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

Las dos tablas siguientes listan todas las constantes definidas por
la extensión ps.

   <caption>**Constantes para line caps**</caption>
   
    
     
      Nombre
      Descripción


      **[ps_LINECAP_BUTT](#constant.ps-linecap-butt)**
       



      **[ps_LINECAP_ROUND](#constant.ps-linecap-round)**
       



      **[ps_LINECAP_SQUARED](#constant.ps-linecap-squared)**
       


   <caption>**Constantes para line joins**</caption>
   
    
     
      Nombre
      Descripción


      **[ps_LINEJOIN_MITER](#constant.ps-linejoin-miter)**
       



      **[ps_LINEJOIN_ROUND](#constant.ps-linejoin-round)**
       



      **[ps_LINEJOIN_BEVEL](#constant.ps-linejoin-bevel)**
       


# Funciones de PS

## Información de contacto

    Si tiene comentarios, correcciones de errores, mejoras para esta extensión o
    para pslib, por favor envíeme un correo
    [» steinm@php.net](mailto:steinm@php.net). Cualquier ayuda es
    bienvenida.

# ps_add_bookmark

(PECL ps &gt;= 1.1.0)

ps_add_bookmark — Añadir un marcapáginas a la página actual

### Descripción

**ps_add_bookmark**(
    [resource](#language.types.resource) $psdoc,
    [string](#language.types.string) $text,
    [int](#language.types.integer) $parent = 0,
    [int](#language.types.integer) $open = 0
): [int](#language.types.integer)

Añade un marcapáginas a la página actual. Los marcapáginas normalmente aparecen en
los visualizadores de PDF a la izquierda de la página como un árbol jerárquico. Al hacer clic en un
marcapáginas saltará a la página en cuestión.

La nota no será visible si el documento es impreso o
mostrado, pero será visible si el documento es convertido a PDF, ya sea por
Acrobat Distiller™, o por Ghostview.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     text


       El texto usado para mostrar el marcapáginas.






     parent


       Un marcapáginas previamente creado por esta función que
       se usa como padre del nuevo marcapáginas.






     open


       Si open es distinto de cero, el visualizador de PDF
       mostrará el marcapáginas abierto.





### Valores devueltos

El valor devuelto es una referencia al marcapáginas. Sólo se utiliza si
el marcapáginas se usa como padre. El valor es mayor que cero si
la función tiene éxito. En caso de error se devolverá
cero.

### Ver también

    - [ps_add_launchlink()](#function.ps-add-launchlink) - Añadir un vínculo que lance un fichero

    - [ps_add_pdflink()](#function.ps-add-pdflink) - Añadir un vínculo hacia una página de un segundo documento PDF

    - [ps_add_weblink()](#function.ps-add-weblink) - Añadir un vínculo hacia una ubicación web

# ps_add_launchlink

(PECL ps &gt;= 1.1.0)

ps_add_launchlink — Añadir un vínculo que lance un fichero

### Descripción

**ps_add_launchlink**(
    [resource](#language.types.resource) $psdoc,
    [float](#language.types.float) $llx,
    [float](#language.types.float) $lly,
    [float](#language.types.float) $urx,
    [float](#language.types.float) $ury,
    [string](#language.types.string) $filename
): [bool](#language.types.boolean)

Coloca un hipervínculo, en la posición dada, que apunta a un fichero de un programa,
el cual se iniciará al hacer clic sobre él. La posición origen del hipervículo
es un rectángulo
que tiene su esquina inferior izquierda en (llx, lly) y su esquina superior derecha en
(urx, ury). El rectángulo tiene por defecto un borde fino azul.

La nota no será visible si el documento es impreso o
mostrado, pero será visible si el documento es convertido a PDF, ya sea por
Acrobat Distiller™, o por Ghostview.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     llx


       La coordenada x de la esquina inferior izquierda.






     lly


       La coordenada y de la esquina inferior izquierda.






     urx


       La coordenada x de la esquina superior derecha.






     ury


       La coordenada y de la esquina superior derecha.






     filename


       La ruta del programa a iniciar cuando se haga clic sobre el vínculo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_add_locallink()](#function.ps-add-locallink) - Añadir un vínculo hacia una página del mismo documento

    - [ps_add_pdflink()](#function.ps-add-pdflink) - Añadir un vínculo hacia una página de un segundo documento PDF

    - [ps_add_weblink()](#function.ps-add-weblink) - Añadir un vínculo hacia una ubicación web

# ps_add_locallink

(PECL ps &gt;= 1.1.0)

ps_add_locallink — Añadir un vínculo hacia una página del mismo documento

### Descripción

**ps_add_locallink**(
    [resource](#language.types.resource) $psdoc,
    [float](#language.types.float) $llx,
    [float](#language.types.float) $lly,
    [float](#language.types.float) $urx,
    [float](#language.types.float) $ury,
    [int](#language.types.integer) $page,
    [string](#language.types.string) $dest
): [bool](#language.types.boolean)

Coloca un hipervínculo, en la posición dada, que apunta a una página del mismo
documento. Al hacer clic sobre el vínculo se irá a la página en cuestión. La
primera página de un documento tiene el número 1.

La posición origen del hipervículo es un rectángulo que tiene su esquina inferior izquierda en
(llx, lly) y su esquina
superior derecha en (urx, ury).
El rectángulo tiene por defecto un borde fino azul.

La nota no será visible si el documento es impreso o
mostrado, pero será visible si el documento es convertido a PDF, ya sea por
Acrobat Distiller™, o por Ghostview.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     llx


       La coordenada x de la esquina inferior izquierda.






     lly


       La coordenada y de la esquina inferior izquierda.






     urx


       La coordenada x de la esquina superior derecha.






     ury


       La coordenada y de la esquina superior derecha.






     page


       El número de la página mostrada al hacer clic en el vínculo.






     dest


       El parámetro dest determina cómo visualizar
       el documento. Puede ser fitpage,
       fitwidth, fitheight, o
       fitbbox.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_add_launchlink()](#function.ps-add-launchlink) - Añadir un vínculo que lance un fichero

    - [ps_add_pdflink()](#function.ps-add-pdflink) - Añadir un vínculo hacia una página de un segundo documento PDF

    - [ps_add_weblink()](#function.ps-add-weblink) - Añadir un vínculo hacia una ubicación web

# ps_add_note

(PECL ps &gt;= 1.1.0)

ps_add_note — Añadir una nota a la página actual

### Descripción

**ps_add_note**(
    [resource](#language.types.resource) $psdoc,
    [float](#language.types.float) $llx,
    [float](#language.types.float) $lly,
    [float](#language.types.float) $urx,
    [float](#language.types.float) $ury,
    [string](#language.types.string) $contents,
    [string](#language.types.string) $title,
    [string](#language.types.string) $icon,
    [int](#language.types.integer) $open
): [bool](#language.types.boolean)

Añade una nota en una cierta posición del página. Las notas son como pequeñas
hojas rectangulares con texto dentro que pueden ser colocadas en cualquer lugar de
una página.
Se muestran tanto plegadas como desplegadas. Si están desplegadas se utiliza el
icono especificado como marcador de posición.

La nota no será visible si el documento es impreso o
mostrado, pero será visible si el documento es convertido a PDF, ya sea por
Acrobat Distiller™, o por Ghostview.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     llx


       La coordenada x de la esquina inferior izquierda.






     lly


       La coordenada y de la esquina inferior izquierda.






     urx


       La coordenada x de la esquina superior derecha.






     ury


       La coordenada y de la esquina superior derecha.






     contents


       El texto de la nota.






     title


       El título de la nota a mostrar en la cabecera de la nota.






     icon


       El icono mostrado si la nota está plegada. Este parámetro puede ser establecido
       a comment, insert,
       note, paragraph,
       newparagraph, key, o
       help.






     open


       Si open es distinto de cero, la nota se
       mostrará desplegada después de abrir el documento con un visualizador de pdf.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_add_pdflink()](#function.ps-add-pdflink) - Añadir un vínculo hacia una página de un segundo documento PDF

    - [ps_add_launchlink()](#function.ps-add-launchlink) - Añadir un vínculo que lance un fichero

    - [ps_add_locallink()](#function.ps-add-locallink) - Añadir un vínculo hacia una página del mismo documento

    - [ps_add_weblink()](#function.ps-add-weblink) - Añadir un vínculo hacia una ubicación web

# ps_add_pdflink

(PECL ps &gt;= 1.1.0)

ps_add_pdflink — Añadir un vínculo hacia una página de un segundo documento PDF

### Descripción

**ps_add_pdflink**(
    [resource](#language.types.resource) $psdoc,
    [float](#language.types.float) $llx,
    [float](#language.types.float) $lly,
    [float](#language.types.float) $urx,
    [float](#language.types.float) $ury,
    [string](#language.types.string) $filename,
    [int](#language.types.integer) $page,
    [string](#language.types.string) $dest
): [bool](#language.types.boolean)

Coloca un hipervínculo, en la posición dada, que apunta a un segundo documento pdf.
Al hacer clic sobre el vínculo se irá a la página dada del segundo documento. La
primera página de un documento tiene el número 1.

La posición origen del hipervículo es un rectángulo que tiene su esquina inferior izquierda en
(llx, lly) y su esquina
superior derecha en (urx, ury).
El rectángulo tiene por defecto un borde fino azul.

La nota no será visible si el documento es impreso o
mostrado, pero será visible si el documento es convertido a PDF, ya sea por
Acrobat Distiller™, o por Ghostview.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     llx


       La coordenada x de la esquina inferior izquierda.






     lly


       La coordenada y de la esquina inferior izquierda.






     urx


       La coordenada x de la esquina superior derecha.






     ury


       La coordenada y de la esquina superior derecha.






     filename


       El nombre del documento pdf a abrir cuando se haga clic en
       este vínculo.






     page


       El número de página del documento pdf destino






     dest


       El parámetro dest determina cómo visualizar
       el documento. Puede ser fitpage,
       fitwidth, fitheight, o
       fitbbox.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_add_launchlink()](#function.ps-add-launchlink) - Añadir un vínculo que lance un fichero

    - [ps_add_locallink()](#function.ps-add-locallink) - Añadir un vínculo hacia una página del mismo documento

    - [ps_add_weblink()](#function.ps-add-weblink) - Añadir un vínculo hacia una ubicación web

# ps_add_weblink

(PECL ps &gt;= 1.1.0)

ps_add_weblink — Añadir un vínculo hacia una ubicación web

### Descripción

**ps_add_weblink**(
    [resource](#language.types.resource) $psdoc,
    [float](#language.types.float) $llx,
    [float](#language.types.float) $lly,
    [float](#language.types.float) $urx,
    [float](#language.types.float) $ury,
    [string](#language.types.string) $url
): [bool](#language.types.boolean)

Coloca un hipervínculo, en la posición dada, que apunta a una página web. La
posición origen del hipervículo es un rectángulo que tiene su esquina inferior izquierda en
(llx, lly) y
su esquina superior derecha en (urx,
ury). El rectángulo tiene por defecto un borde
fino azul.

La nota no será visible si el documento es impreso o
mostrado, pero será visible si el documento es convertido a PDF, ya sea por
Acrobat Distiller™, o por Ghostview.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     llx


       La coordenada x de la esquina inferior izquierda.






     lly


       La coordenada y de la esquina inferior izquierda.






     urx


       La coordenada x de la esquina superior derecha.






     ury


       La coordenada y de la esquina superior derecha.






     url


       El URL del hipervínculo a abrir cuando se haga clic en
       este vínculo, p.ej. http://www.php.net.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_add_launchlink()](#function.ps-add-launchlink) - Añadir un vínculo que lance un fichero

    - [ps_add_locallink()](#function.ps-add-locallink) - Añadir un vínculo hacia una página del mismo documento

    - [ps_add_pdflink()](#function.ps-add-pdflink) - Añadir un vínculo hacia una página de un segundo documento PDF

# ps_arc

(PECL ps &gt;= 1.1.0)

ps_arc — Dibujar un arco en el sentido contrario a las agujas del reloj

### Descripción

**ps_arc**(
    [resource](#language.types.resource) $psdoc,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y,
    [float](#language.types.float) $radius,
    [float](#language.types.float) $alpha,
    [float](#language.types.float) $beta
): [bool](#language.types.boolean)

Dibuja una porción de un círculo con su punto medio en
(x, y). El arco comienza en un
ángulo dado por alpha y termina en un ángulo dado por
beta. Se dibuja en el sentido contrario al de las agujas del reloj (use la función
[ps_arcn()](#function.ps-arcn) para dibujarlo en el sentido de las agujas del reloj). El trazado añadido
al trazado actual comienza en el arco con el ángulo alpha
y termina en el arco con el ángulo beta.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     x


       La coordenada x del punto medio del círculo.






     y


       La coordenada y del punto medio del círculo.






     radius


       El radio del círculo






     alpha


       El ángulo de inicio dado en grados.






     beta


       El ángulo final dado en grados.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_arcn()](#function.ps-arcn) - Dibujar un arco en el sentido de las agujas del reloj

# ps_arcn

(PECL ps &gt;= 1.1.0)

ps_arcn — Dibujar un arco en el sentido de las agujas del reloj

### Descripción

**ps_arcn**(
    [resource](#language.types.resource) $psdoc,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y,
    [float](#language.types.float) $radius,
    [float](#language.types.float) $alpha,
    [float](#language.types.float) $beta
): [bool](#language.types.boolean)

Dibuja una porción de un círculo con su punto medio en
(x, y). El arco comienza en un
ángulo dado por alpha y termina en un ángulo dado por
beta. Se dibuja en el sentido de las agujas del reloj (use la función
[ps_arc()](#function.ps-arc) para dibujarlo en sentido contrario al de las agujas del reloj). El trazado añadido
al trazado actual comienza en el arco con el ángulo beta
y termina en el arco con el ángulo alpha.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     x


       La coordenada x del punto medio del círculo.






     y


       La coordenada y del punto medio del círculo.






     radius


       El radio del círculo






     alpha


       El ángulo de inicio dado en grados.






     beta


       El ángulo final dado en grados.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_arc()](#function.ps-arc) - Dibujar un arco en el sentido contrario a las agujas del reloj

# ps_begin_page

(PECL ps &gt;= 1.1.0)

ps_begin_page — Empezar una nueva página

### Descripción

**ps_begin_page**([resource](#language.types.resource) $psdoc, [float](#language.types.float) $width, [float](#language.types.float) $height): [bool](#language.types.boolean)

Empiza una nueva página. Aunque los parámetros width
y height implican un tamaño de página diferente para cada
página, esto no es posible en PostScript. La primera llamada a la función
**ps_begin_page()** establecerá el tamaño de página para el documento
entero. Las llamadas consecutivas no tendrán efecto, excepto para crear una nueva
página. La situación es diferente si se intenta convertir el documento
PostScript a PDF. Esta función coloca marcas pdf dentro del documento, con lo que
se puede establecer el tamaño de cada página individualmente. El documento PDF resultante
tendrá diferentes tamaños de página.

Aunque PostScript no conoce diferentes tamaños de página, pslib coloca
una caja circundante para cada página dentro del documento. Este tamaño es evaluado
por algunos visualizadores de PostScript y tendrá precedencia sobre el campo BoundingBox
de la cabecera (Header) del documento. Esto puede llevar a resultados inesperados cuando
se establece BoundingBox con su esquina inferior izquierda diferente de (0, 0), ya que la
caja circundante de la página siempre tendrá una esquina inferior izquierda (0, 0)
y sobrescribirá la configuración global.

Cada página está encapsulada en la forma guardar/restaurar. Esto significa que la mayoría de los
ajustes hechos en una página no se conservarán para la siguiente página.

Si hasta la primera llamada a la función **ps_begin_page()** no existen
llamadas a la función [ps_findfont()](#function.ps-findfont), la cabecera del documento
PostScript se imprimirá y la caja circundante será establecida al tamaño de
la primera página. La esquina inferior izquierda de la caja circundante se establecerá a (0, 0).
Si si llamó antes a la función [ps_findfont()](#function.ps-findfont), la
cabecera ya ha sido impresa, y el documento no tendrá una caja circundante
válida. Para prevenir esto, se debería llamar a la función
[ps_set_info()](#function.ps-set-info) para establecer el campo de información
BoundingBox y posiblemente Orientation
antes de cualquier llamada a las funciones [ps_findfont()](#function.ps-findfont) o
**ps_begin_page()**.

**Nota**:

    Hasta la versión 0.2.6 de pslib, esta función siempre sobrescribía
    los campos BoundingBox y Orientation si antes habían sido establecidos con la función
    [ps_set_info()](#function.ps-set-info) y no se había llamado antes
    a la función [ps_findfont()](#function.ps-findfont).

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     width


       El ancho de la página en píxeles, p.ej. 596 para el formato A4






     height


       El alto de la página en píxeles, p.ej. 842 para el formato A4





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_end_page()](#function.ps-end-page) - Finaliza una página

    - [ps_findfont()](#function.ps-findfont) - Carga una fuente

    - [ps_set_info()](#function.ps-set-info) - Establecer los campos de información del documento

# ps_begin_pattern

(PECL ps &gt;= 1.2.0)

ps_begin_pattern — Inicia un nuevo patrón

### Descripción

**ps_begin_pattern**(
    [resource](#language.types.resource) $psdoc,
    [float](#language.types.float) $width,
    [float](#language.types.float) $height,
    [float](#language.types.float) $xstep,
    [float](#language.types.float) $ystep,
    [int](#language.types.integer) $painttype
): [int](#language.types.integer)|[false](#language.types.singleton)

Inicia un nuevo patrón. Un patrón es como una página que contiene, por ejemplo,
un dibujo que puede ser utilizado para rellenar sectores. Se utiliza
como un color al llamar a [ps_setcolor()](#function.ps-setcolor) y configurando
la posición del color en el patrón.

### Parámetros

     psdoc


       Identificador de un archivo postscript devuelto por
       [ps_new()](#function.ps-new).






     width


       El ancho del patrón en píxeles.






     height


       La altura del patrón en píxeles.






     x-step


       La distancia en píxeles de la posición del patrón en la dirección
       horizontal.






     y-step


       La distancia en píxeles de la posición del patrón en la dirección
       vertical.






     painttype


       Debe ser 1 o 2.





### Valores devueltos

El identificador del patrón o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Creación y utilización de un patrón**

&lt;?php
$ps = ps_new();

if (!ps_open_file($ps, "pattern.ps")) {
print "Imposible abrir el archivo PostScript\n";
exit;
}

ps_set_parameter($ps, "warning", "true");
ps_set_info($ps, "Creator", "pattern.php");
ps_set_info($ps, "Author", "Uwe Steinmann");
ps_set_info($ps, "Title", "Ejemplo de Patrón");

$pspattern = ps_begin_pattern($ps, 10.0, 10.0, 10.0, 10.0, 1);
ps_setlinewidth($ps, 0.2);
ps_setcolor($ps, "stroke", "rgb", 0.0, 0.0, 1.0, 0.0);
ps_moveto($ps, 0, 0);
ps_lineto($ps, 7, 7);
ps_stroke($ps);
ps_moveto($ps, 0, 7);
ps_lineto($ps, 7, 0);
ps_stroke($ps);
ps_end_pattern($ps);

ps_begin_page($ps, 596, 842);
ps_setcolor($ps, "both", "pattern", $pspattern, 0.0, 0.0, 0.0);
ps_rect($ps, 50, 400, 200, 200);
ps_fill($ps);
ps_end_page($ps);

ps_close($ps);
ps_delete($ps);
?&gt;

### Ver también

    - [ps_end_pattern()](#function.ps-end-pattern) - Finalizar un patrón

    - [ps_setcolor()](#function.ps-setcolor) - Establece el color actual

    - [ps_shading_pattern()](#function.ps-shading-pattern) - Crea un patrón basado en el tono

# ps_begin_template

(PECL ps &gt;= 1.2.0)

ps_begin_template — Iniciar una nueva plantilla

### Descripción

**ps_begin_template**([resource](#language.types.resource) $psdoc, [float](#language.types.float) $width, [float](#language.types.float) $height): [int](#language.types.integer)

Inicia una nueva plantilla. A una plantilla se le conoce como forma en el lenguaje
postscript. Se crea de forma similar a un patrón pero se utiliza como una imagen.
Las plantilla a menudo se usan para dibujar algo que se coloca varias veces
a lo largo de un documento, p.ej. el logotipo de una compañía. Se puede usar
todas las funciones de dibujo dentro de una plantilla. La plantilla no será dibujada hasta
que sea colocada medianta la función [ps_place_image()](#function.ps-place-image).

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     width


       El ancho de la plantilla en píxeles.






     height


       El alto de la plantilla en píxeles.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Crear y utilizar una plantilla**

&lt;?php
$ps = ps_new();

if (!ps_open_file($ps, "plantilla.ps")) {
print "No se puede abrir el fichero PostScript\n";
exit;
}

ps_set_parameter($ps, "warning", "true");
ps_set_info($ps, "Creator", "plantilla.php");
ps_set_info($ps, "Author", "Uwe Steinmann");
ps_set_info($ps, "Title", "Ejemplo de plantilla");

$plantilla_ps = ps_begin_template($ps, 30.0, 30.0);
ps_moveto($ps, 0, 0);
ps_lineto($ps, 30, 30);
ps_moveto($ps, 0, 30);
ps_lineto($ps, 30, 0);
ps_stroke($ps);
ps_end_template($ps);

ps_begin_page($ps, 596, 842);
ps_place_image($ps, $plantilla_ps, 20.0, 20.0, 1.0);
ps_place_image($ps, $plantilla_ps, 50.0, 30.0, 0.5);
ps_place_image($ps, $plantilla_ps, 70.0, 70.0, 0.6);
ps_place_image($ps, $plantilla_ps, 30.0, 50.0, 1.3);
ps_end_page($ps);

ps_close($ps);
ps_delete($ps);
?&gt;

### Ver también

    - [ps_end_template()](#function.ps-end-template) - Finalizar una plantilla

# ps_circle

(PECL ps &gt;= 1.1.0)

ps_circle — Dibujar un círculo

### Descripción

**ps_circle**(
    [resource](#language.types.resource) $psdoc,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y,
    [float](#language.types.float) $radius
): [bool](#language.types.boolean)

Dibuja un círculo con su punto medio en (x,
y). El círculo comienza y termina en la posición
(x+radius,
y). Si esta función es llamada fuera de un trazado
se iniciará un nuevo trazado. Si es llamada dentro de un trazado añadirá el círculo
como un subtrazado. Si la última operación de dibujo no finaliza en el punto
(x+radius,
y) habrá un hueco en el trazado.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     x


       La coordenada x del punto medio del círculo.






     y


       La coordenada y del punto medio del círculo.






     radius


       El radio del círculo





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_arc()](#function.ps-arc) - Dibujar un arco en el sentido contrario a las agujas del reloj

    - [ps_arcn()](#function.ps-arcn) - Dibujar un arco en el sentido de las agujas del reloj

# ps_clip

(PECL ps &gt;= 1.1.0)

ps_clip — Realizar un recorte utilizando el trazado actual

### Descripción

**ps_clip**([resource](#language.types.resource) $psdoc): [bool](#language.types.boolean)

Toma el trazado actual y lo usa para definir el borde de un área de recorte.
Todo lo dibujado fuera de ese área no será visible.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_closepath()](#function.ps-closepath) - Cerrar un trazado

# ps_close

(PECL ps &gt;= 1.1.0)

ps_close — Cerrar un documento PostScript

### Descripción

**ps_close**([resource](#language.types.resource) $psdoc): [bool](#language.types.boolean)

Cierra el documento PostScript.

Esta función escribe el tráiler del documento PostScript.
También escribe el árbol de marcapáginas. **ps_close()** no
libera ningún recurso, lo que se realiza mediante la función [ps_delete()](#function.ps-delete).

Esta función también es llamda por la función [ps_delete()](#function.ps-delete) si
no ha sido llamada antes.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_open_file()](#function.ps-open-file) - Abrir un fichero para su impresión

    - [ps_delete()](#function.ps-delete) - Borrar todos los recursos de un documento PostScript

# ps_close_image

(PECL ps &gt;= 1.1.0)

ps_close_image — Cierra la imagen y libera la memoria

### Descripción

**ps_close_image**([resource](#language.types.resource) $psdoc, [int](#language.types.integer) $imageid): [void](language.types.void.html)|[false](#language.types.singleton)

Cierra una imagen y libera sus recursos. Una vez cerrada la imagen, ya no
puede ser utilizada.

### Parámetros

     psdoc


       Identificador de un fichero postscript devuelto por
       [ps_new()](#function.ps-new).






     imageid


       Identificador de una imagen devuelto por
       [ps_open_image()](#function.ps-open-image) o
       [ps_open_image_file()](#function.ps-open-image-file).





### Valores devueltos

Devuelve **[null](#constant.null)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_open_image()](#function.ps-open-image) - Leer una imagen para su colocación posterior

    - [ps_open_image_file()](#function.ps-open-image-file) - Abre una imagen desde un fichero

# ps_closepath

(PECL ps &gt;= 1.1.0)

ps_closepath — Cerrar un trazado

### Descripción

**ps_closepath**([resource](#language.types.resource) $psdoc): [bool](#language.types.boolean)

Conecta el último punto con el primer punto de un trazado. El trazado
resultante puede usarse para contornear, rellenar, recortar, etc...

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_clip()](#function.ps-clip) - Realizar un recorte utilizando el trazado actual

    - [ps_closepath_stroke()](#function.ps-closepath-stroke) - Cerrar y contornear un trazado

# ps_closepath_stroke

(PECL ps &gt;= 1.1.0)

ps_closepath_stroke — Cerrar y contornear un trazado

### Descripción

**ps_closepath_stroke**([resource](#language.types.resource) $psdoc): [bool](#language.types.boolean)

Conecta el último punto con el primer punto de un trazado y dibuja la línea cerrada
resultante.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_closepath()](#function.ps-closepath) - Cerrar un trazado

# ps_continue_text

(PECL ps &gt;= 1.1.0)

ps_continue_text — Continuar el texto en la siguiente línea

### Descripción

**ps_continue_text**([resource](#language.types.resource) $psdoc, [string](#language.types.string) $text): [bool](#language.types.boolean)

Imprime un texto una línea por debajo de la última línea. La interlínea
se toma del valor "leading", el cual debe establecerse con la función
[ps_set_value()](#function.ps-set-value). La posición actual del
texto se determina por los valores "textx" y "texty", los cuales pueden solicitarse
con la función [ps_get_value()](#function.ps-get-value).

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     text


       El texto a imprimir.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_show()](#function.ps-show) - Imprimir texto

    - [ps_show_xy()](#function.ps-show-xy) - Imprimir texto en una posición dada

    - [ps_show_boxed()](#function.ps-show-boxed) - Escritura de texto en una caja

# ps_curveto

(PECL ps &gt;= 1.1.0)

ps_curveto — Dibujar una curva

### Descripción

**ps_curveto**(
    [resource](#language.types.resource) $psdoc,
    [float](#language.types.float) $x1,
    [float](#language.types.float) $y1,
    [float](#language.types.float) $x2,
    [float](#language.types.float) $y2,
    [float](#language.types.float) $x3,
    [float](#language.types.float) $y3
): [bool](#language.types.boolean)

Añade una sección de una curva cúbica de Bézier al trazado actual descrita por los tres puntos de control
dados.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     x1


       La coordenada x del primer punto de control.






     y1


       La coordenada y del primer punto de control.






     x2


       La coordenada x del segundo punto de control.






     y2


       La coordenada y del segundo punto de control.






     x3


       La coordenada x del tercer punto de control.






     y3


       La coordenada y del tercer punto de control.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_lineto()](#function.ps-lineto) - Dibujar una línea

# ps_delete

(PECL ps &gt;= 1.1.0)

ps_delete — Borrar todos los recursos de un documento PostScript

### Descripción

**ps_delete**([resource](#language.types.resource) $psdoc): [bool](#language.types.boolean)

Principalmente libera la memoria usada por el documento. También cierra un fichero, si no fue
cerrado antes con la función [ps_close()](#function.ps-close). En cualquier caso, antes se
debería cerrar el fichero con la función [ps_close()](#function.ps-close), ya que
[ps_close()](#function.ps-close) no sólo cierra el fichero, sino que también imprime un
tráiler que contiene comentarios de PostScript, como el número de páginas del
documento, y añade la jerarquía de marcapáginas.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_close()](#function.ps-close) - Cerrar un documento PostScript

# ps_end_page

(PECL ps &gt;= 1.1.0)

ps_end_page — Finaliza una página

### Descripción

**ps_end_page**([resource](#language.types.resource) $psdoc): [bool](#language.types.boolean)

Finaliza una página que ha sido iniciada con [ps_begin_page()](#function.ps-begin-page).
Finalizar una página deja el contexto de dibujo actual, lo que por ejemplo
requiere recargar las fuentes si fueron cargadas con la página y fija varios
otros parámetros de dibujo como el grosor de las líneas, el color.

### Parámetros

     psdoc


       Identificador de un archivo postscript devuelto por
       [ps_new()](#function.ps-new).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_begin_page()](#function.ps-begin-page) - Empezar una nueva página

# ps_end_pattern

(PECL ps &gt;= 1.2.0)

ps_end_pattern — Finalizar un patrón

### Descripción

**ps_end_pattern**([resource](#language.types.resource) $psdoc): [bool](#language.types.boolean)

Finaliza un patrón que fue creado con la función [ps_begin_pattern()](#function.ps-begin-pattern).
Una vez que el patrón ha sido finalizado se puede usar como un color para rellenar
áreas.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_begin_pattern()](#function.ps-begin-pattern) - Inicia un nuevo patrón

# ps_end_template

(PECL ps &gt;= 1.2.0)

ps_end_template — Finalizar una plantilla

### Descripción

**ps_end_template**([resource](#language.types.resource) $psdoc): [bool](#language.types.boolean)

Finaliza una plantilla que fue creada con la función [ps_begin_template()](#function.ps-begin-template).
Una vez que la plantilla ha sido finalizada se puede usar como una imagen.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_begin_template()](#function.ps-begin-template) - Iniciar una nueva plantilla

# ps_fill

(PECL ps &gt;= 1.1.0)

ps_fill — Rellenar el trazado actual

### Descripción

**ps_fill**([resource](#language.types.resource) $psdoc): [bool](#language.types.boolean)

Rellena el trazaco construido previamente con llamdas a las funciones de dibujo, como
[ps_lineto()](#function.ps-lineto).

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_fill_stroke()](#function.ps-fill-stroke) - Rellenar y contornear el trazado actual

    - [ps_stroke()](#function.ps-stroke) - Dibujar el trazado actual

# ps_fill_stroke

(PECL ps &gt;= 1.1.0)

ps_fill_stroke — Rellenar y contornear el trazado actual

### Descripción

**ps_fill_stroke**([resource](#language.types.resource) $psdoc): [bool](#language.types.boolean)

Rellena y dibuja el trazado construido previamente con llamadas a funciones de dibujo,
como [ps_lineto()](#function.ps-lineto).

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_fill()](#function.ps-fill) - Rellenar el trazado actual

    - [ps_stroke()](#function.ps-stroke) - Dibujar el trazado actual

# ps_findfont

(PECL ps &gt;= 1.1.0)

ps_findfont — Carga una fuente

### Descripción

**ps_findfont**(
    [resource](#language.types.resource) $psdoc,
    [string](#language.types.string) $fontname,
    [string](#language.types.string) $encoding,
    [bool](#language.types.boolean) $embed = **[false](#constant.false)**
): [int](#language.types.integer)

**ps_findfont()** carga una fuente para su uso posterior.
Antes de que el texto sea escrito con la fuente cargada, debe ser fijada con
[ps_setfont()](#function.ps-setfont). Esta función debe tener el archivo de
métricas de la fuente "adobe" para calcular el espacio utilizado por los
caracteres. Una fuente que se carga en una página solo estará disponible en
esa página. Las fuentes que se utilizarán en todo el documento deben ser
cargadas antes de la primera llamada a
[ps_begin_page()](#function.ps-begin-page). La llamada a
**ps_findfont()** entre páginas hará que esta fuente esté
disponible para todas las páginas siguientes.

El nombre del archivo afm debe ser
fontname.afm. Si la fuente debe
ser incorporada, el archivo
fontname.pfb que contiene el dibujo
de la fuente también debe estar presente.

La llamada a **ps_findfont()** antes de la primera página
requiere mostrar el encabezado del postscript que incluye el BoundingBox para
el documento completo. Normalmente, el BoundingBox se fija con la primera
llamada a [ps_begin_page()](#function.ps-begin-page) que ahora viene después de
**ps_findfont()**. En consecuencia, el BoundingBox no ha sido
fijado y se lanzará un error cuando
**ps_findfont()** sea llamada. Para prever esta situación,
debe llamarse a la función
[ps_set_parameter()](#function.ps-set-parameter) para fijar el BoundingBox antes de que
**ps_findfont()** sea llamada.

### Parámetros

     psdoc


       Identificador de un archivo postscript devuelto por
       [ps_new()](#function.ps-new).






     fontname


       El nombre de la fuente.






     encoding


       **ps_findfont()** intentará cargar el archivo pasado
       en el argumento encoding. Los archivos de
       codificación tienen la misma sintaxis que los utilizados por
       **dvips(1)**. Contienen un vector de codificación de
       fuente (que actualmente no se utiliza, pero que debe estar presente) y
       una lista de ligaduras adicionales para extender la lista de ligaduras
       derivadas del archivo AFM.




       encoding puede ser **[null](#constant.null)** o una [string](#language.types.string) vacía
       si se desea utilizar la codificación por omisión (TeXBase1).




       Si la codificación se establece en builtin entonces
       no habrá codificación adicional y se utilizará la codificación
       específica de la fuente. Esto es muy útil para fuentes con símbolos.






     embed


       Si se establece en un valor &gt;0, la fuente será incorporada en el
       documento. Esto requiere la presencia del archivo de dibujo (.pfb).





### Valores devueltos

Devuelve un identificador de la fuente o cero en caso de error. El
identificador es un número positivo.

### Ver también

    - [ps_begin_page()](#function.ps-begin-page) - Empezar una nueva página

    - [ps_setfont()](#function.ps-setfont) - Establecer la fuente a usar para la siguiente impresión

# ps_get_buffer

(PECL ps &gt;= 1.1.0)

ps_get_buffer — Obtener el buffer completo que contiene la información generada de PS

### Descripción

**ps_get_buffer**([resource](#language.types.resource) $psdoc): [string](#language.types.string)

Esta función aún no está implementada. Siempre devolverá una cadena
vacía. La idea para una implementación posterior es escribir el contenido del
fichero postscript en un buffer interno si se solicita la creación en
memoria, y recuperar el contenifo del buffer con esta función.
Actualmente, los documentos
creados en memoria son enviados al visualizador sin la participación de un buffer.

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).





### Ver también

    - [ps_open_file()](#function.ps-open-file) - Abrir un fichero para su impresión

# ps_get_parameter

(PECL ps &gt;= 1.1.0)

ps_get_parameter — Recupera ciertos parámetros

### Descripción

**ps_get_parameter**([resource](#language.types.resource) $psdoc, [string](#language.types.string) $name, [float](#language.types.float) $modifier = ?): [string](#language.types.string)|[false](#language.types.singleton)

Recupera varios parámetros que han sido establecidos directamente por
[ps_set_parameter()](#function.ps-set-parameter) o indirectamente por una o más
funciones. Los parámetros son, por definición,
valores de [string](#language.types.string). Esta función no puede ser utilizada para
recuperar los recursos que también han sido establecidos por
[ps_set_parameter()](#function.ps-set-parameter).

El parámetro name puede tener una de las siguientes
valores.

     fontname


       El nombre de la fuente actualmente activa o la fuente cuyo identificador
       es pasado en el parámetro modifier.






     fontencoding


       La codificación de la fuente actualmente activa.






     dottedversion


       La versión de la biblioteca subyacente pslib en el formato
       &lt;mayor&gt;.&lt;menor&gt;.&lt;submenor&gt;






     scope


       El ámbito actual del dibujo. Puede ser un objeto, un documento, **[null](#constant.null)**,
       una página, un patrón, un camino, un modelo, un prólogo, una fuente, un
       glifo.






     ligaturedisolvechar


       El carácter que descompone una ligadura. Si se utiliza una fuente que
       contiene una ligadura `ff' y `|` es el carácter para descomponer la
       ligadura, entonces `f|f' dará dos `f' en lugar de la ligadura `ff'.






     imageencoding


       La codificación utilizada para codificar las imágenes. Puede ser
       hex o 85. La codificación hex utiliza
       dos octetos en el archivo PostScript, cada octeto en una imagen.
       85 representa la codificación Ascii85.






     linenumbermode


       Se establece en paragraph si las líneas son numeradas
       dentro de un párrafo o box si son numeradas en una
       caja que las rodea.






     linebreak


       Solo utilizado si el texto es mostrado con
       [ps_show_boxed()](#function.ps-show-boxed). Si se establece en **[true](#constant.true)**, un retorno
       de carro añadirá un salto de línea.






     parbreak


       Solo utilizado si el texto es mostrado con
       [ps_show_boxed()](#function.ps-show-boxed). Si se establece en **[true](#constant.true)**, un retorno
       de carro iniciará un nuevo párrafo.






     hyphenation


       Solo utilizado si el texto es mostrado con
       [ps_show_boxed()](#function.ps-show-boxed). Si se establece en **[true](#constant.true)**, el párrafo
       será dividido si un diccionario de guiones es establecido y existe.






     hyphendict


       Nombre del archivo del diccionario utilizado para el patrón de guiones.





### Parámetros

     psdoc


       Identificador de un archivo postscript devuelto por
       [ps_new()](#function.ps-new).






     name


       Nombre del parámetro.






     modifier


       Un identificador requerido si el parámetro de un recurso es requerido,
       por ejemplo, el tamaño de una imagen. En este caso, el identificador del
       recurso es pasado.





### Valores devueltos

Devuelve el valor del parámetro o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_set_parameter()](#function.ps-set-parameter) - Establecer ciertos parámetros

# ps_get_value

(PECL ps &gt;= 1.1.0)

ps_get_value — Recupera ciertos valores

### Descripción

**ps_get_value**([resource](#language.types.resource) $psdoc, [string](#language.types.string) $name, [float](#language.types.float) $modifier = ?): [float](#language.types.float)

Recupera varios valores que han sido establecidos por
[ps_set_value()](#function.ps-set-value). Los valores son, por definición, valores de [float](#language.types.float).

El argumento name puede tener uno de los siguientes valores.

     fontsize


       El tamaño de la fuente actualmente activa o la fuente cuyo identificador se pasa en el argumento
       modifier.






     font


       La fuente actualmente activa en sí misma.






     imagewidth


       La anchura de la imagen cuyo identificador se pasa en el argumento
       modifier.






     imageheight


       La altura de la imagen cuyo identificador se pasa en el argumento
       modifier.






     capheight


       La altura de una letra mayúscula M en la fuente actualmente activa o la fuente cuyo identificador se pasa en el argumento
       modifier.






     ascender


       La hampe de la fuente actualmente activa o la fuente cuyo identificador se pasa en el argumento
       modifier.






     descender


       El jambage de la fuente actualmente activa o la fuente cuyo identificador se pasa en el argumento
       modifier.






     italicangle


       El parámetro italicangle de la fuente actualmente activa o la fuente cuyo identificador se pasa en el argumento
       modifier.






     underlineposition


       El parámetro underlineposition de la fuente actualmente activa o la fuente cuyo identificador se pasa en el argumento
       modifier.






     underlinethickness


       El parámetro underlinethickness de la fuente actualmente activa o la fuente cuyo identificador se pasa en el argumento
       modifier.






     textx


       La posición x actual de visualización del texto.






     texty


       La posición y actual de visualización del texto.






     textrendering


       El modo actual para el renderizado del texto.






     textrise


       El espacio por el cual el texto es aumentado por encima de la línea de base.






     leading


       La distancia entre las líneas de texto en puntos.






     wordspacing


       El espacio entre las palabras como múltiplo de la anchura de un carácter de espacio.






     charspacing


       El espacio entre los caracteres. Si charspacing es != 0.0, las ligaduras siempre estarán desactivadas.






     hyphenminchars


       Número mínimo de caracteres antes de un guion al final de una palabra.






     parindent


       La indentación de las primeras n líneas en un párrafo.






     numindentlines


       Número de líneas en un párrafo a indentar si paraindent != 0.0.






     parskip


       Distancia entre los párrafos.






     linenumberspace


       Espacio general frente a cada línea para el número de línea.






     linenumbersep


       Espacio entre las líneas y los números de línea.






     major


       El número de versión mayor de pslib.






     minor


       El número de versión menor de pslib.






     subminor, revision


       El número de versión submenor de pslib.





### Parámetros

     psdoc


       Identificador de un archivo postscript devuelto por
       [ps_new()](#function.ps-new).






     name


       Nombre del valor.






     modifier


       El argumento modifier especifica el recurso para el cual se recuperará el valor. Esto puede ser el ID de la fuente o una imagen.





### Valores devueltos

Devuelve el valor del parámetro o **[false](#constant.false)**.

### Ver también

    - [ps_set_value()](#function.ps-set-value) - Establecer ciertos valores

# ps_hyphenate

(PECL ps &gt;= 1.1.1)

ps_hyphenate — Une palabras

### Descripción

**ps_hyphenate**([resource](#language.types.resource) $psdoc, [string](#language.types.string) $text): [array](#language.types.array)|[false](#language.types.singleton)

Une la palabra pasada. **ps_hyphenate()** evalúa la valor
hyphenminchars (establecido por [ps_set_value()](#function.ps-set-value)) y el argumento
hyphendic (establecido por [ps_set_parameter()](#function.ps-set-parameter)). hyphendict debe
ser establecido antes de llamar a esta función.

Esta función requiere que la configuración local **[LC_CTYPE](#constant.lc-ctype)** esté
correctamente hecha. Esto se realiza cuando la extensión es inicializada
utilizando las variables de entorno. En sistemas Unix, consulte las páginas de manual
de locale para más información.

### Parámetros

     psdoc


       Identificador de un archivo postscript devuelto por
       [ps_new()](#function.ps-new).






     text


       text no debería contener caracteres no
       alfabéticos. Las posiciones posibles para los cortes son devueltas en un
       array de números enteros. Cada número es la posición del carácter
       en text después de que la unión pueda tener lugar.





### Valores devueltos

Un array de enteros que indica la posición de los cortes posibles en el
texto o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Corta un texto**

&lt;?php
$word = "Koordinatensystem";
$psdoc = ps_new();
ps_set_parameter($psdoc, "hyphendict", "hyph_de.dic");
$hyphens = ps_hyphenate($psdoc, $word);
for($i=0; $i&lt;strlen($word); $i++) {
  echo $word[$i];
if(in_array($i, $hyphens))
    echo "-";
}
ps_delete($psdoc);
?&gt;

    El ejemplo anterior mostrará:

Ko-ordi-na-ten-sys-tem

### Ver también

    - [ps_show_boxed()](#function.ps-show-boxed) - Escritura de texto en una caja

    - locale(1)

# ps_include_file

(PECL ps &gt;= 1.3.4)

ps_include_file — Leer un fichero externo con código PostScript sin tratar

### Descripción

**ps_include_file**([resource](#language.types.resource) $psdoc, [string](#language.types.string) $file): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     file







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ps_lineto

(PECL ps &gt;= 1.1.0)

ps_lineto — Dibujar una línea

### Descripción

**ps_lineto**([resource](#language.types.resource) $psdoc, [float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

Añade una línea recta al trazado actual desde el punto actual hasta las coordenadas
dadas. Use la función [ps_moveto()](#function.ps-moveto) para establecer el punto de inicio
de la línea.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     x


       La coordenada x del punto final de la línea.






     y


       La coordenada y del punto final de la línea.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Dibujar un rectángulo**

&lt;?php
$ps = ps_new();
if (!ps_open_file($ps, "rectángulo.ps")) {
print "No se puede abrir el fichero PostScript\n";
exit;
}

ps_set_info($ps, "Creator", "rectángulo.php");
ps_set_info($ps, "Author", "Uwe Steinmann");
ps_set_info($ps, "Title", "Ejemplo de lineto");

ps_begin_page($ps, 596, 842);
ps_moveto($ps, 100, 100);
ps_lineto($ps, 100, 200);
ps_lineto($ps, 200, 200);
ps_lineto($ps, 200, 100);
ps_lineto($ps, 100, 100);
ps_stroke($ps);
ps_end_page($ps);

ps_delete($ps);
?&gt;

### Ver también

    - [ps_moveto()](#function.ps-moveto) - Establecer el punto actual

# ps_makespotcolor

(PECL ps &gt;= 1.1.0)

ps_makespotcolor — Crear un color directo

### Descripción

**ps_makespotcolor**([resource](#language.types.resource) $psdoc, [string](#language.types.string) $name, [int](#language.types.integer) $reserved = 0): [int](#language.types.integer)

Crea un color directo desde el color de relleno actual. El color de relleno debe ser
definido en los espacios de color RGB, CMYK o gris. El nombre del color directo puede ser un
nombre arbitrario. Un color directo se puece establecer como cualquier otro color
con la función [ps_setcolor()](#function.ps-setcolor). Cuando el documento no se imprime,
sino que se muestra con un visualizador de postscript, se utiliza el color dado en el espacio
de color especificado.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     name


       El nombre del color directo, p.ej. Pantone 5565.





### Valores devueltos

El ID del nuevo color directo o 0 en caso de error.

### Ejemplos

    **Ejemplo #1 Crear y utilizar un color directo**

&lt;?php
$ps = ps_new();
if (!ps_open_file($ps, "color_directo.ps")) {
print "No se puede abrir el fichero PostScript\n";
exit;
}

ps_set_info($ps, "Creator", "color_directo.php");
ps_set_info($ps, "Author", "Uwe Steinmann");
ps_set_info($ps, "Title", "Ejemplo de color directo");

ps_begin_page($ps, 596, 842);
ps_setcolor($ps, "fill", "cmyk", 0.37, 0.0, 0.34, 0.34);
$color_directo = ps_makespotcolor($ps, "PANTONE 5565 C", 0);
ps_setcolor($ps, "fill", "spot", $color_directo, 0.5, 0.0, 0.0);
ps_moveto($ps, 100, 100);
ps_lineto($ps, 100, 200);
ps_lineto($ps, 200, 200);
ps_lineto($ps, 200, 100);
ps_lineto($ps, 100, 100);
ps_fill($ps);
ps_end_page($ps);

ps_delete($ps);
?&gt;

     Este ejemplo crea el color directo "PANTONE 5565 C" que
     es un verde oscuro (oliva) y rellena un rectángulo con el 50% de intensidad.

### Ver también

    - [ps_setcolor()](#function.ps-setcolor) - Establece el color actual

# ps_moveto

(PECL ps &gt;= 1.1.0)

ps_moveto — Establecer el punto actual

### Descripción

**ps_moveto**([resource](#language.types.resource) $psdoc, [float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

Establece el punto actual a unas coordenadas nuevas. Si esta es la primera llamada a la función
**ps_moveto()** después de haber finalizado un trazado previo,
se iniciará un nuevo trazado. Si esta función es llamada en mitad de un trazado
establecerá el punto actual e iniciará un subtrazado.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     x


       La coordenada x del punto al que moverse.






     y


       La coordenada y del punto al que moverse.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_lineto()](#function.ps-lineto) - Dibujar una línea

# ps_new

(PECL ps &gt;= 1.1.0)

ps_new — Crea un nuevo objeto de documento PostScript

### Descripción

**ps_new**(): [resource](#language.types.resource)|[false](#language.types.singleton)

Crea una nueva instancia de documento. No crea el fichero en el disco ni en la memoria. Simplemente prepara todo.
**ps_new()** es normalmente seguida por una llamada a
[ps_open_file()](#function.ps-open-file) para crear el documento PostScript.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Recurso de un documento PostScript o **[false](#constant.false)** si ocurre un error. El valor de retorno es pasado a todas las demás funciones como primer argumento.

### Ver también

    - [ps_delete()](#function.ps-delete) - Borrar todos los recursos de un documento PostScript

# ps_open_file

(PECL ps &gt;= 1.1.0)

ps_open_file — Abrir un fichero para su impresión

### Descripción

**ps_open_file**([resource](#language.types.resource) $psdoc, [string](#language.types.string) $filename = ?): [bool](#language.types.boolean)

Crea un fichero en disco y escribe el documento PostScript en él. El
fichero será cerrado cuando se llame a la función [ps_close()](#function.ps-close).

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     filename


       El nombre del fichero postscript.
       Si no se proporciona filename el documento será
       creado en memoria y todas las salidas irán directas al visualizador.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_close()](#function.ps-close) - Cerrar un documento PostScript

# ps_open_image

(PECL ps &gt;= 1.1.0)

ps_open_image — Leer una imagen para su colocación posterior

### Descripción

**ps_open_image**(
    [resource](#language.types.resource) $psdoc,
    [string](#language.types.string) $type,
    [string](#language.types.string) $source,
    [string](#language.types.string) $data,
    [int](#language.types.integer) $lenght,
    [int](#language.types.integer) $width,
    [int](#language.types.integer) $height,
    [int](#language.types.integer) $components,
    [int](#language.types.integer) $bpc,
    [string](#language.types.string) $params
): [int](#language.types.integer)

Lee una imagen que ya está disponible en memoria. El parámetro
source actualmente no se evalua y se asume que es
memory. La información de la imagen es una secuencia de píxeles que comienza
en la esquina superior izquierda y termina en la exquina inferior derecha. Cada píxel
consiste en componentes de color dados por components, y cada
componente tiene bpc bits.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     type


       El tipo de la imagen. Los posibles valores son png,
       jpeg, o eps.






     source


       No se utiliza.






     data


       La información de la imagen.






     length


       La longitud de la información de la imagen.






     width


       El ancho de la imagen.






     height


       El alto de la imagen.






     components


       El número de componentes de cada píxel. Puede ser
       1 (imágenes en escala de grises), 3 (imágenes rgb), o 4 (imágenes cmyk, rgba).






     bpc


       Número de bits por componente (normalmente 8).






     params







### Valores devueltos

Devuelve el identificador de la imagen, o cero en caso de error. El identificador es
un número positivo mayor que 0.

### Ver también

    - [ps_open_image_file()](#function.ps-open-image-file) - Abre una imagen desde un fichero

    - [ps_place_image()](#function.ps-place-image) - Colocar una imágen en la página

    - [ps_close_image()](#function.ps-close-image) - Cierra la imagen y libera la memoria

# ps_open_image_file

(PECL ps &gt;= 1.1.0)

ps_open_image_file — Abre una imagen desde un fichero

### Descripción

**ps_open_image_file**(
    [resource](#language.types.resource) $psdoc,
    [string](#language.types.string) $type,
    [string](#language.types.string) $filename,
    [string](#language.types.string) $stringparam = ?,
    [int](#language.types.integer) $intparam = 0
): [int](#language.types.integer)

Carga una imagen para su uso posterior.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     type


       El tipo de la imagen. Los posibles valores son png,
       jpeg, o eps.






     filename


       El nombre del fichero que contiene la información de la imagen.






     stringparam


       No se utiliza.






     intparam


       No se utiliza.





### Valores devueltos

Devuelve el identificador de la imagen, o cero en caso de error. El identificador es
un número positivo mayor que 0.

### Ver también

    - [ps_open_image()](#function.ps-open-image) - Leer una imagen para su colocación posterior

    - [ps_place_image()](#function.ps-place-image) - Colocar una imágen en la página

    - [ps_close_image()](#function.ps-close-image) - Cierra la imagen y libera la memoria

# ps_open_memory_image

(PECL ps &gt;= 1.1.0)

ps_open_memory_image — Tomar una imagen de GD y devolverla como una imagen para colcarla en un documento PS

### Descripción

**ps_open_memory_image**([resource](#language.types.resource) $psdoc, [int](#language.types.integer) $gd): [int](#language.types.integer)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     gd







# ps_place_image

(PECL ps &gt;= 1.1.0)

ps_place_image — Colocar una imágen en la página

### Descripción

**ps_place_image**(
    [resource](#language.types.resource) $psdoc,
    [int](#language.types.integer) $imageid,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y,
    [float](#language.types.float) $scale
): [bool](#language.types.boolean)

Coloca una imagen cargada anteriormente en la página. La imagen puede ser redimensionada.
Si la imagen también debe rotarse, se ha de rotar antes el
sistema de coordenadas con la función [ps_rotate()](#function.ps-rotate).

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     imageid


       El identificador de recursos de la imagen, como el devuelto por las funciones
       [ps_open_image()](#function.ps-open-image) o
       [ps_open_image_file()](#function.ps-open-image-file).






     x


       La coordenada x de la esquina inferior izquierda de la imagen.






     y


       La coordenada y de la esquina inferior izquierda de la imagen.






     scale


       El factor de escala de la imagen. Una escala de 1.0 resultará
       en una resolución de 72 dpi, ya que cada píxel es equivalente a
       1 punto.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_open_image()](#function.ps-open-image) - Leer una imagen para su colocación posterior

    - [ps_open_image_file()](#function.ps-open-image-file) - Abre una imagen desde un fichero

# ps_rect

(PECL ps &gt;= 1.1.0)

ps_rect — Dibujar un rectángulo

### Descripción

**ps_rect**(
    [resource](#language.types.resource) $psdoc,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y,
    [float](#language.types.float) $width,
    [float](#language.types.float) $height
): [bool](#language.types.boolean)

Dibuja un rectángulo con su esquina inferior izquierda en (x,
y). El rectángulo comienza y finaliza en su esquina inferior
izquierda. Si se llama a esta función fuera de un trazado iniciará un nuevo trazado.
Se es llamada dentro de un trazado añadirá el rectángulo como un subtrazado. Si
la última operación de dibujo no finaliza en la esquina inferior izquierda, existirá
un hueco en el trazado.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     x


       La coordenada x de la esquina inferior izquierda del rectángulo.






     y


       La coordenada y de la esquina inferior izquierda del rectángulo.






     width


       El ancho de la imagen.






     height


       El alto de la imagen.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_arc()](#function.ps-arc) - Dibujar un arco en el sentido contrario a las agujas del reloj

    - **ps_cirle()**

    - [ps_lineto()](#function.ps-lineto) - Dibujar una línea

# ps_restore

(PECL ps &gt;= 1.1.0)

ps_restore — Restaurar un contexto previamente guardado

### Descripción

**ps_restore**([resource](#language.types.resource) $psdoc): [bool](#language.types.boolean)

Restaura un conexto de gráficos previamente guardado. Cualquier llamada a la función
[ps_save()](#function.ps-save) debe estar acompañada por una llamada a
**ps_restore()**. Todas las transformaciones de coordenadas, ajustes
de estilos de línea, ajustes de color, etc., son restauradas al estado
anterior de la llamada a la función [ps_save()](#function.ps-save).

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_save()](#function.ps-save) - Guardar el contexto actual

# ps_rotate

(PECL ps &gt;= 1.1.0)

ps_rotate — Establecer el factor de rotación

### Descripción

**ps_rotate**([resource](#language.types.resource) $psdoc, [float](#language.types.float) $rot): [bool](#language.types.boolean)

Establece la rotación del sistema de coordenadas.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     rot


       El ángulo de rotación en grados.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Rotación del sistema de coordenadas**

&lt;?php
function rectángulo($ps) {
    ps_moveto($ps, 0, 0);
ps_lineto($ps, 0, 50);
    ps_lineto($ps, 50, 50);
ps_lineto($ps, 50, 0);
    ps_lineto($ps, 0, 0);
ps_stroke($ps);
}

$ps = ps_new();
if (!ps_open_file($ps, "rotación.ps")) {
print "No se pudo abrir el fichero PostScript\n";
exit;
}

ps_set_info($ps, "Creator", "rotación.php");
ps_set_info($ps, "Author", "Uwe Steinmann");
ps_set_info($ps, "Title", "Ejemplo de rotación");
ps_set_info($ps, "BoundingBox", "0 0 596 842");

$psfont = ps_findfont($ps, "Helvetica", "", 0);

ps_begin_page($ps, 596, 842);
ps_set_text_pos($ps, 100, 100);
ps_save($ps);
ps_translate($ps, 100, 100);
ps_rotate($ps, 45);
rectángulo($ps);
ps_restore($ps);
ps_setfont($ps, $psfont, 8.0);
ps_show($ps, "Texto sin rotación");
ps_end_page($ps);

ps_delete($ps);
?&gt;

     El ejemplo anterior ilustra una forma muy común de rotar un
     gráfico (en este caso un rectángulo) simplemente rotando el
     sistema de coordenadas. Ya que se asume que el origen del sistema de coordenadas del
     gráfico es (0,0), el sistema de coordenadas de la página también es trasladado
     para colocar los gráficos no en el extremo de la pagina. Se debe poner atención
     en el orden de [ps_translate()](#function.ps-translate) y
     **ps_rotate()**. En el caso anterior el rectángulo es
     rotado alrededor del punto (100, 100) en el sistema de coordenadas sin
     trasladar. Si se cambian las dos sentencias se obtendrá un resultado
     completamente diferente.




     Para poder imprimir el texto siguiente en la posición original, todas
     las modificaciones del sistema de coordenadas son encapsuladas en las funciones
     [ps_save()](#function.ps-save) y [ps_restore()](#function.ps-restore).

### Ver también

    - [ps_scale()](#function.ps-scale) - Estalecer el factor de escala

    - [ps_translate()](#function.ps-translate) - Establecer una traslación

# ps_save

(PECL ps &gt;= 1.1.0)

ps_save — Guardar el contexto actual

### Descripción

**ps_save**([resource](#language.types.resource) $psdoc): [bool](#language.types.boolean)

Guarda el contexto de gráficos actual, conteniendo ajustes de color, de traslación y
de rotación, y algunos más. Un contexto guardado puede ser restaurado con
[ps_restore()](#function.ps-restore).

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_restore()](#function.ps-restore) - Restaurar un contexto previamente guardado

# ps_scale

(PECL ps &gt;= 1.1.0)

ps_scale — Estalecer el factor de escala

### Descripción

**ps_scale**([resource](#language.types.resource) $psdoc, [float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

Establece el factor de escala horizontal y vertical del sistema de coordenadas.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     x


       El factor de escala en dirección horizontal.






     y


       El factor de escala en dirección vertical.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_rotate()](#function.ps-rotate) - Establecer el factor de rotación

    - [ps_translate()](#function.ps-translate) - Establecer una traslación

# ps_set_border_color

(PECL ps &gt;= 1.1.0)

ps_set_border_color — Establecer el color del borde de las anotaciones

### Descripción

**ps_set_border_color**(
    [resource](#language.types.resource) $psdoc,
    [float](#language.types.float) $red,
    [float](#language.types.float) $green,
    [float](#language.types.float) $blue
): [bool](#language.types.boolean)

Los vínculos añadidos con una de las funciones [ps_add_weblink()](#function.ps-add-weblink),
[ps_add_pdflink()](#function.ps-add-pdflink), etc., se mostrarán con un
rectángulo circundante cuando el documento postscript es convertido a
pdf y visualizado en un visualizador de pdf. Este rectángulo no es visible en
el documento postscript.
Esta función establece el color de la línea del borde del rectángulo.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     red


       El componente rojo del color del borde.






     green


       El componente verde del color del borde.






     blue


       El componente azul del color del borde.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_set_border_dash()](#function.ps-set-border-dash) - Establece la longitud de las rayas del borde de las anotaciones

    - [ps_set_border_style()](#function.ps-set-border-style) - Establecer el estilo del borde de las anotaciones

# ps_set_border_dash

(PECL ps &gt;= 1.1.0)

ps_set_border_dash — Establece la longitud de las rayas del borde de las anotaciones

### Descripción

**ps_set_border_dash**([resource](#language.types.resource) $psdoc, [float](#language.types.float) $black, [float](#language.types.float) $white): [bool](#language.types.boolean)

Los vínculos añadidos con una de las funciones [ps_add_weblink()](#function.ps-add-weblink),
[ps_add_pdflink()](#function.ps-add-pdflink), etc. se mostrarán con un
rectángulo circundante cuando el documento postscript es convertido a
pdf y visualizado en un visualizador de pdf. Este rectángulo no es visible en
el documento postscript.
Esta función establece la longitud de las porciones negras y blancas de una
línea de borde discontinua.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     black


       La longitud de la raya.






     white


       La longitud del hueco entre rayas.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_set_border_color()](#function.ps-set-border-color) - Establecer el color del borde de las anotaciones

    - [ps_set_border_style()](#function.ps-set-border-style) - Establecer el estilo del borde de las anotaciones

# ps_set_border_style

(PECL ps &gt;= 1.1.0)

ps_set_border_style — Establecer el estilo del borde de las anotaciones

### Descripción

**ps_set_border_style**([resource](#language.types.resource) $psdoc, [string](#language.types.string) $style, [float](#language.types.float) $width): [bool](#language.types.boolean)

Los vínculos añadidos con una de las funciones [ps_add_weblink()](#function.ps-add-weblink),
[ps_add_pdflink()](#function.ps-add-pdflink), etc. se mostrarán con un
rectángulo circundante cuando el documento postscript es convertido a
pdf y visualizado en un visualizador de pdf. Este rectángulo no es visible en
el documento postscript.
Esta función establece la apariencia y el ancho de la línea del borde.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     style


       style puede ser solid o
       dashed.






     width


       El ancho del borde.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_set_border_color()](#function.ps-set-border-color) - Establecer el color del borde de las anotaciones

    - [ps_set_border_dash()](#function.ps-set-border-dash) - Establece la longitud de las rayas del borde de las anotaciones

# ps_set_info

(PECL ps &gt;= 1.1.0)

ps_set_info — Establecer los campos de información del documento

### Descripción

**ps_set_info**([resource](#language.types.resource) $p, [string](#language.types.string) $key, [string](#language.types.string) $val): [bool](#language.types.boolean)

Establece ciertos campos de información del documento. Estos campos se mostrarán
como un comentario en la cabecera del fichero PostScript. Si el documento es
convertido a pdf, estos campos también se usarán para la información del
documento.

El campo BoundingBox normalmente se establece al valor dado a la
primera página. Esto sólo funciona si no se ha llamado antes a la función
[ps_findfont()](#function.ps-findfont). En tal caso BoundingBox estará sin establecer
a menos que se establezca explícitamente con esta función.

Esta función ya no tendrá efecto cuando la cabecera del fichero
postscript ha sido escrita. Debe ser llamada antes de la primera página
o de la primera llamada a la función [ps_findfont()](#function.ps-findfont).

### Parámetros

     psdoc


       Un identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     key


       El nombre del campo de información a establecer. Los valores que se pueden
       establecer son Keywords (palabras clave), Subject (asunto),
       Title (título), Creator (creador),
       Author (autor), BoundingBox (caja circundante), y
       Orientation (orientación). Tenga en cuenta que algunos de ellos tienen un
       significado para los visualizadoes de PostScript.






     value


       El valor del campo de información. El campo
       Orientation puede ser establecido a
       Portrait (horizontal) o Landscape (vertical). El campo
       BoundingBox es una cadena de caracteres que consiste en cuatro números.
       Los dos primeros son las coordenadas de la esquina inferior izquierda de
       la página. Los dos últimos son las coordenadas de la esquina
       superior derecha.



      **Nota**:



        Hasta la versión 0.2.6 de pslib, los campos BoundingBox y Orientation
        eran sobrescritos por la función [ps_begin_page()](#function.ps-begin-page),
        a menos que se llamara antes a la función [ps_findfont()](#function.ps-findfont).






### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_findfont()](#function.ps-findfont) - Carga una fuente

    - [ps_begin_page()](#function.ps-begin-page) - Empezar una nueva página

# ps_set_parameter

(PECL ps &gt;= 1.1.0)

ps_set_parameter — Establecer ciertos parámetros

### Descripción

**ps_set_parameter**([resource](#language.types.resource) $psdoc, [string](#language.types.string) $name, [string](#language.types.string) $value): [bool](#language.types.boolean)

Establece varios parámetros que son utilizados por muchas funciones. Los parámetros son por
definción valores de tipo string.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     name


       Para una lista de los posibles nombres véase la función [ps_get_parameter()](#function.ps-get-parameter).






     value


       El valor del parámetro.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - **ps_get_parameters()**

    - [ps_set_value()](#function.ps-set-value) - Establecer ciertos valores

# ps_set_text_pos

(PECL ps &gt;= 1.1.0)

ps_set_text_pos — Establecer la posición de la salida de texto

### Descripción

**ps_set_text_pos**([resource](#language.types.resource) $psdoc, [float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

Establece la posición de la siguiente salida de texto. Alternativamente se puede establecer los
valores x e y por serparado llamando a la función [ps_set_value()](#function.ps-set-value) y
eligiendo textx y texty respectivamente como
el nombre del valor.

Si se ha de imprimir el texto en una cierta posición es más conveniente
utilizar la función [ps_show_xy()](#function.ps-show-xy) en lugar de establecer la posición del texto
y llamar a la función [ps_show()](#function.ps-show).

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     x


       La coordenada x de la nueva posición del texto.






     y


       La coordenada y de la nueva posición del texto.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Colocar texto en una posición dada**

&lt;?php
$ps = ps_new();
if (!ps_open_file($ps, "texto.ps")) {
print "No se pudo abrir el fichero PostScript\n";
exit;
}

ps_set_info($ps, "Creator", "rectángulo.php");
ps_set_info($ps, "Author", "Uwe Steinmann");
ps_set_info($ps, "Title", "Ejemplo de colocación de texto");

ps_begin_page($ps, 596, 842);
$psfont = ps_findfont($ps, "Helvetica", "", 0);
ps_setfont($ps, $psfont, 8.0);
ps_show_xy($ps, "Algún texto en (100, 100)", 100, 100);

ps_set_value($ps, "textx", 100);
ps_set_value($ps, "texty", 120);
ps_show($ps, "Algún texto en (100, 120)");
ps_end_page($ps);

ps_delete($ps);
?&gt;

### Ver también

    - [ps_set_value()](#function.ps-set-value) - Establecer ciertos valores

    - [ps_show()](#function.ps-show) - Imprimir texto

# ps_set_value

(PECL ps &gt;= 1.1.0)

ps_set_value — Establecer ciertos valores

### Descripción

**ps_set_value**([resource](#language.types.resource) $psdoc, [string](#language.types.string) $name, [float](#language.types.float) $value): [bool](#language.types.boolean)

Establece varios valores que son utilizados por muchas funciones. Los parámetros son por
definición valores de tipo float.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     name


       El nombre dado por name puede ser uno de los siguientes:




         textrendering


           La manera en que se muestra el texto.






         textx


           La coordenada x para la impresión del texto.






         texty


           La coordenada y para la impresión del texto.






         wordspacing


           La distancia entre palabras relativa al ancho de un espacio.






         leading


           La distancia entre líneas en píxeles.










     value


       El valor del parámetro.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_get_value()](#function.ps-get-value) - Recupera ciertos valores

    - [ps_set_parameter()](#function.ps-set-parameter) - Establecer ciertos parámetros

# ps_setcolor

(PECL ps &gt;= 1.1.0)

ps_setcolor — Establece el color actual

### Descripción

**ps_setcolor**(
    [resource](#language.types.resource) $psdoc,
    [string](#language.types.string) $type,
    [string](#language.types.string) $colorspace,
    [float](#language.types.float) $c1,
    [float](#language.types.float) $c2,
    [float](#language.types.float) $c3,
    [float](#language.types.float) $c4
): [bool](#language.types.boolean)

Establece el color para el dibujo, relleno o ambos.

### Parámetros

     psdoc


       Identificador de un fichero postscript devuelto por
       [ps_new()](#function.ps-new).






     type


       El argumento type puede ser
       both, fill o
       fillstroke.






     colorspace


       El espacio de color puede ser gray,
       rgb, cmyk,
       spot, pattern. Dependiendo del
       espacio de color, pueden usarse el primer, los tres primeros o todos los
       argumentos.






     c1


       Dependiendo del espacio de color, este valor puede ser el componente rojo (rgb), el componente cian (cmyk), el valor de gris (gris), el identificador de la mancha de color o el identificador del patrón.






     c2


       Dependiendo del espacio de color, este valor puede ser el componente verde (rgb) o el componente magenta (cmyk).






     c3


       Dependiendo del espacio de color, este valor puede ser el componente azul (rgb) o el componente amarillo (cymk).






     c4


       Este argumento debe fijarse solo en el espacio de color cymk y especifica el componente negro.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Notas

**Precaución**

    El segundo argumento no siempre es evaluado actualmente. La color puede ser establecida para rellenar y dibujar como si
    fillstroke hubiera sido pasado.

# ps_setdash

(PECL ps &gt;= 1.1.0)

ps_setdash — Establecer la apariencia de una línea discontinua

### Descripción

**ps_setdash**([resource](#language.types.resource) $psdoc, [float](#language.types.float) $on, [float](#language.types.float) $off): [bool](#language.types.boolean)

Establece la longitud de las porciones negras y blancas de una línea discontinua.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     on


       La longitud de la raya.






     off


       La longitud del hueco entre rayas.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_setpolydash()](#function.ps-setpolydash) - Establecer la apariencia de una línea discontinua

# ps_setflat

(PECL ps &gt;= 1.1.0)

ps_setflat — Establecer la planicidad

### Descripción

**ps_setflat**([resource](#language.types.resource) $psdoc, [float](#language.types.float) $value): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     value


       El valor dado a value debe estar entre 0.2 y 1.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ps_setfont

(PECL ps &gt;= 1.1.0)

ps_setfont — Establecer la fuente a usar para la siguiente impresión

### Descripción

**ps_setfont**([resource](#language.types.resource) $psdoc, [int](#language.types.integer) $fontid, [float](#language.types.float) $size): [bool](#language.types.boolean)

Establece una fuente, la cual ha de ser cargada antes con la función
[ps_findfont()](#function.ps-findfont). Imprimir texto sin establecer una fuente
resultará en un error.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     fontid


       El identificador de la fuente, como el devuelto por la función [ps_findfont()](#function.ps-findfont).






     size


       El tamaño de la fuente.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_findfont()](#function.ps-findfont) - Carga una fuente

    - [ps_set_text_pos()](#function.ps-set-text-pos) - Establecer la posición de la salida de texto para un ejemplo.

# ps_setgray

(PECL ps &gt;= 1.1.0)

ps_setgray — Establecer el valor de gris

### Descripción

**ps_setgray**([resource](#language.types.resource) $psdoc, [float](#language.types.float) $gray): [bool](#language.types.boolean)

Establece el valor de gris para todas las operaciones de dibujo siguientes.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     gray


       El valor debe estar entre 0 (blanco) and 1 (negro).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_setcolor()](#function.ps-setcolor) - Establece el color actual

# ps_setlinecap

(PECL ps &gt;= 1.1.0)

ps_setlinecap — Establecer la apariencia de los extremos de línea

### Descripción

**ps_setlinecap**([resource](#language.types.resource) $psdoc, [int](#language.types.integer) $type): [bool](#language.types.boolean)

Establece la apariencia de los extremos de línea.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     type


       El tipo de extremo de línea. Los valores posibles son
       PS_LINECAP_BUTT,
       PS_LINECAP_ROUND, o
       PS_LINECAP_SQUARED.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_setlinejoin()](#function.ps-setlinejoin) - Establecer cómo están unidas las líneas conectadas

    - [ps_setlinewidth()](#function.ps-setlinewidth) - Establecer el ancho de una línea

    - [ps_setmiterlimit()](#function.ps-setmiterlimit) - Establecer el límite del inglete

# ps_setlinejoin

(PECL ps &gt;= 1.1.0)

ps_setlinejoin — Establecer cómo están unidas las líneas conectadas

### Descripción

**ps_setlinejoin**([resource](#language.types.resource) $psdoc, [int](#language.types.integer) $type): [bool](#language.types.boolean)

Establece cómo se unen las líneas

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     type


       La forma de unir las líneas. Los valores posibles son
       PS_LINEJOIN_MITER,
       PS_LINEJOIN_ROUND, o
       PS_LINEJOIN_BEVEL.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_setlinecap()](#function.ps-setlinecap) - Establecer la apariencia de los extremos de línea

    - [ps_setlinewidth()](#function.ps-setlinewidth) - Establecer el ancho de una línea

    - [ps_setmiterlimit()](#function.ps-setmiterlimit) - Establecer el límite del inglete

# ps_setlinewidth

(PECL ps &gt;= 1.1.0)

ps_setlinewidth — Establecer el ancho de una línea

### Descripción

**ps_setlinewidth**([resource](#language.types.resource) $psdoc, [float](#language.types.float) $width): [bool](#language.types.boolean)

Esteblece el ancho de línea para todas las operaciones de dibujo siguientes.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     width


       El ancho de las líneas en puntos.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_setlinecap()](#function.ps-setlinecap) - Establecer la apariencia de los extremos de línea

    - [ps_setlinejoin()](#function.ps-setlinejoin) - Establecer cómo están unidas las líneas conectadas

    - [ps_setmiterlimit()](#function.ps-setmiterlimit) - Establecer el límite del inglete

# ps_setmiterlimit

(PECL ps &gt;= 1.1.0)

ps_setmiterlimit — Establecer el límite del inglete

### Descripción

**ps_setmiterlimit**([resource](#language.types.resource) $psdoc, [float](#language.types.float) $value): [bool](#language.types.boolean)

Si dos líneas se unen en un ángulo pequeño y la unión de líneas está establecida a
PS_LINEJOIN_MITER,
el pico resultante será muy largo. El límite de inglete es la proporción
máxima entre la longitud del inglete (la longitud del pico) y del ancho de línea.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     value


       La proporción máxima entre la longitud del inglete y del ancho de línea. Los valores
       grandes (&gt; 10) resultarán en picos muy largos cuando dos líneas se encuentren
       en un ángulo pequeño. Mantenga el predeterminado a menos que sepa lo que está haciendo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_setlinecap()](#function.ps-setlinecap) - Establecer la apariencia de los extremos de línea

    - [ps_setlinejoin()](#function.ps-setlinejoin) - Establecer cómo están unidas las líneas conectadas

    - [ps_setlinewidth()](#function.ps-setlinewidth) - Establecer el ancho de una línea

# ps_setoverprintmode

(PECL ps &gt;= 1.3.0)

ps_setoverprintmode — Establecer el modo de sobreimpresión

### Descripción

**ps_setoverprintmode**([resource](#language.types.resource) $psdoc, [int](#language.types.integer) $mode): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     mode







### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ps_setpolydash

(PECL ps &gt;= 1.1.0)

ps_setpolydash — Establecer la apariencia de una línea discontinua

### Descripción

**ps_setpolydash**([resource](#language.types.resource) $psdoc, [float](#language.types.float) $arr): [bool](#language.types.boolean)

Establece la longitud de las porciones negras y blancas de una línea discontinua.
La función **ps_setpolydash()** se usa para establecer patrones discontinuos
más complejos.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     arr


       arr es una lista de elementos de longitud alternados para
       las porcioines negras y blancas.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Dibujar una línea discontinua**

&lt;?php
$ps = ps_new();
if (!ps_open_file($ps, "poliraya.ps")) {
print "No se puede abrir el fichero PostScript\n";
exit;
}

ps_set_info($ps, "Creator", "poliraya.php");
ps_set_info($ps, "Author", "Uwe Steinmann");
ps_set_info($ps, "Title", "Ejemplo de poliraya");

ps_begin_page($ps, 596, 842);
ps_setpolydash($ps, array(10, 5, 2, 5));
ps_moveto($ps, 100, 100);
ps_lineto($ps, 200, 200);
ps_stroke($ps);
ps_end_page($ps);

ps_delete($ps);
?&gt;

     Este ejemplo dibuja una línea con rayas de 10 y 2 puntos de longitud, y
     huecos de 5 puntos entre ellas.

### Ver también

    - [ps_setdash()](#function.ps-setdash) - Establecer la apariencia de una línea discontinua

# ps_shading

(PECL ps &gt;= 1.3.0)

ps_shading — Crea un tono para uso futuro

### Descripción

**ps_shading**(
    [resource](#language.types.resource) $psdoc,
    [string](#language.types.string) $type,
    [float](#language.types.float) $x0,
    [float](#language.types.float) $y0,
    [float](#language.types.float) $x1,
    [float](#language.types.float) $y1,
    [float](#language.types.float) $c1,
    [float](#language.types.float) $c2,
    [float](#language.types.float) $c3,
    [float](#language.types.float) $c4,
    [string](#language.types.string) $optlist
): [int](#language.types.integer)|[false](#language.types.singleton)

Crea un tono, que puede ser utilizado por [ps_shfill()](#function.ps-shfill) o
[ps_shading_pattern()](#function.ps-shading-pattern).

El color del tono puede ser cualquier color de espacio excepto para
pattern.

### Parámetros

     psdoc


       Identificador de un fichero postscript devuelto por
       [ps_new()](#function.ps-new).






     type


       El tipo de tono puede ser radial o
       axial. Cada tono comienza con el color de relleno actual y termina con el valor de color dado pasado en los argumentos c1 a c4
       (véase [ps_setcolor()](#function.ps-setcolor) para su significado).






     x0, x1, y0, y1


       Las coordenadas x0, y0,
       x1, y1 son el punto de inicio y fin del tono. Si el tipo de tono es radial, los dos puntos son los puntos medios del inicio y fin del círculo.






     c1, c2, c3, c4


       Véase [ps_setcolor()](#function.ps-setcolor) para su significado.






     optlist


       Si el tono es de tipo radial, el
       optlist debe contener también los argumentos
       r0 y r1 con el radio de inicio y fin del círculo.





### Valores devueltos

Devuelve un identificador del patrón o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_shading_pattern()](#function.ps-shading-pattern) - Crea un patrón basado en el tono

    - [ps_shfill()](#function.ps-shfill) - Rellenar un área con un sombreado

# ps_shading_pattern

(PECL ps &gt;= 1.3.0)

ps_shading_pattern — Crea un patrón basado en el tono

### Descripción

**ps_shading_pattern**([resource](#language.types.resource) $psdoc, [int](#language.types.integer) $shadingid, [string](#language.types.string) $optlist): [int](#language.types.integer)|[false](#language.types.singleton)

Crea un patrón basado en el tono, que debe haber sido creado previamente con
[ps_shading()](#function.ps-shading). Los patrones de tono pueden ser utilizados
como patrones regulares.

### Parámetros

     psdoc


       Identificador de un fichero postscript devuelto por
       [ps_new()](#function.ps-new).






     shadingid


       El identificador de tono creado previamente con
       [ps_shading()](#function.ps-shading).






     optlist


       Este argumento no se utiliza actualmente.





### Valores devueltos

El identificador del patrón o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_shading()](#function.ps-shading) - Crea un tono para uso futuro

    - [ps_shfill()](#function.ps-shfill) - Rellenar un área con un sombreado

# ps_shfill

(PECL ps &gt;= 1.3.0)

ps_shfill — Rellenar un área con un sombreado

### Descripción

**ps_shfill**([resource](#language.types.resource) $psdoc, [int](#language.types.integer) $shadingid): [bool](#language.types.boolean)

Rellena un área con un sombreado, que ha de ser creado antes con la función
[ps_shading()](#function.ps-shading). Esta es una manera alternativa de crear
un patrón desde un sombreado con la función [ps_shading_pattern()](#function.ps-shading-pattern) y usar
el patrón como color de relleno.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     shadingid


       El identificador de un sombreado previamente creado con la función
       [ps_shading()](#function.ps-shading).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_shading()](#function.ps-shading) - Crea un tono para uso futuro

    - [ps_shading_pattern()](#function.ps-shading-pattern) - Crea un patrón basado en el tono

# ps_show

(PECL ps &gt;= 1.1.0)

ps_show — Imprimir texto

### Descripción

**ps_show**([resource](#language.types.resource) $psdoc, [string](#language.types.string) $text): [bool](#language.types.boolean)

Imprime un texto en la posición de texto actual. La posición de texto puede ser establecida
almacenado las coordenadas x e y en los valores textx
y texty con la función
[ps_set_value()](#function.ps-set-value). La función emitirá un
error si no se estableció antes una fuente con la función [ps_setfont()](#function.ps-setfont).

**ps_show()** evalúa los siguientes parámetros y valores
establecidos por las funciones [ps_set_parameter()](#function.ps-set-parameter) y
[ps_set_value()](#function.ps-set-value):

    charspacing (valor)


      Distancia entre dos glifos consecutivos. Si este valor es distinto de
      cero todas las ligaduras serán resueltas. Están permitidos valores menores
      que cero.






    kerning (parámetro)


      Establecer este parámetro a "false" desactivará el interletraje. El interletraje está
      activado por defecto.






    ligatures (parámetro)


      Establecer esta parámetro a "false" desactivará el uso de ligaduras.
      Las ligaduras están activadas por defecto.






    underline (parámetro)


      Establecer esta parámetro a "true" activará el subrayado. El subrayado
      está desctivado por defecto.






    overline (parámetro)


      Establecer esta parámetro a "true" activará el suprarayado. El suprarayado está
      desctivado por defecto.






    strikeout (parámetro)


      Establecer esta parámetro a "true" activará el tachado. El tachado
      está desctivado por defecto.


### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     text


       El texto a imprimir.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_continue_text()](#function.ps-continue-text) - Continuar el texto en la siguiente línea

    - [ps_show_xy()](#function.ps-show-xy) - Imprimir texto en una posición dada

    - [ps_setfont()](#function.ps-setfont) - Establecer la fuente a usar para la siguiente impresión

# ps_show_boxed

(PECL ps &gt;= 1.1.0)

ps_show_boxed — Escritura de texto en una caja

### Descripción

**ps_show_boxed**(
    [resource](#language.types.resource) $psdoc,
    [string](#language.types.string) $text,
    [float](#language.types.float) $left,
    [float](#language.types.float) $bottom,
    [float](#language.types.float) $width,
    [float](#language.types.float) $height,
    [string](#language.types.string) $hmode,
    [string](#language.types.string) $feature = ?
): [int](#language.types.integer)

**ps_show_boxed()** escribe texto en una caja dada.
La esquina inferior izquierda de la caja se encuentra en (left,
bottom). Se insertarán saltos de línea donde sea necesario.
Los espacios múltiples se tratan como uno solo. Las tabulaciones se tratan como espacios.

El texto será ligado si el parámetro hyphenation está
fijado a **[true](#constant.true)** y el parámetro hyphendict contiene
un archivo válido para un archivo de ligadura. El espacio entre líneas se toma
de la valor leading. Los párrafos pueden ser separados
por una línea vacía como en TeX. Si el valor parindent
está fijado a un valor &gt; 0.0, entonces las primeras n líneas serán indentadas.
El número n de líneas está fijado por el parámetro numindentlines.
Para prever la indentación de los primeros m párrafos, fije el valor
parindentskip a un número positivo.

### Parámetros

     psdoc


       Identificador de un archivo PostScript devuelto por
       [ps_new()](#function.ps-new).






     text


       El texto a ser mostrado en la caja dada.






     left


       La posición x de la esquina inferior izquierda de la caja.






     bottom


       La posición y de la esquina inferior izquierda de la caja.






     width


       Ancho de la caja.






     height


       Altura de la caja.






     hmode


       El parámetro hmode puede ser
       justify, fulljustify,
       right, left,
       o center. La diferencia entre
       justify y fulljustify afecta
       simplemente a la última línea de la caja.
       En el modo fulljustify, la última línea será
       justificada de izquierda a derecha a menos que sea también la última
       línea del párrafo. En el modo "justify",
       el texto será siempre justificado a la izquierda.






     feature








#### Parámetros utilizados

    La escritura de **ps_show_boxed()** puede ser configurada con
    varios parámetros y valores que pueden ser fijados por [ps_set_parameter()](#function.ps-set-parameter)
    o [ps_set_value()](#function.ps-set-value). Además de los parámetros y valores que afectan
    la escritura del texto, los siguientes parámetros y valores son evaluados.




      leading (valor)


        Distancia entre las líneas de base de dos líneas consecutivas.






      linebreak (parámetro)


        Fijado a **[true](#constant.true)** si se desea un retorno de carro para iniciar una
        nueva línea en lugar de tratarlo como un espacio. Por omisión,
        este parámetro vale **[false](#constant.false)**.






      parbreak (parámetro)


        Fijado a **[true](#constant.true)** si se desea un retorno de carro de una sola línea
        para iniciar un nuevo párrafo en lugar de tratarlo como un espacio.
        Por omisión, este parámetro vale **[true](#constant.true)**.






      hyphenation (parámetro)


        Fijado a **[true](#constant.true)** para activar las ligaduras. Esto requiere un
        diccionario fijado por el parámetro hyphendict.
        Por omisión, este parámetro vale **[false](#constant.false)**.






      hyphendict (parámetro)


        Archivo del diccionario utilizado para un patrón de ligadura (ver más abajo).






      hyphenminchar (valor)


        El número de caracteres que debe haber al menos a la izquierda antes o
        después del guión. Esto implica que solo las palabras con al menos el doble
        de este valor pueden ser ligadas. El valor por omisión es tres. Fijar
        un valor de cero resultará en el valor por omisión.






      parindent (valor)


        Fija el número de espacio en píxeles para la indentación de las primeras m
        líneas de un párrafo. m puede ser configurado con el valor
        numindentlines.






      parskip (valor)


        Fija el número de espacio extra en píxeles entre los párrafos. Por
        omisión, al poner 0, el resultado será una distancia normal
        entre las líneas.






      numindentlines (valor)


        Número de líneas desde el inicio del párrafo que serán indentadas.
        Por omisión, este valor vale 1.






      parindentskip (valor)


        Número de párrafos en la caja a los cuales las primeras líneas no
        serán indentadas. Por omisión, este valor vale 0.
        Esto es útil para los párrafos inmediatamente después de una sección de
        encabezado o texto que comienza en una segunda caja. En ambos casos,
        debe ser fijado a 1.






      linenumbermode (parámetro)


        Fija cómo se numeran las líneas. Los valores posibles son
        box para numerar las líneas en toda la caja o
        paragraph para numerar las líneas en cada párrafo.






      linenumberspace (valor)


        El espacio para la columna dejado de las líneas numeradas que contiene
        el número de línea. El número de las líneas será justificado a la derecha
        en esta columna. Por omisión, este valor vale 20.






      linenumbersep (valor)


        El espacio entre la columna con el número de líneas y la línea
        misma. Por omisión, este valor vale 5.






#### Ligadura

    El texto es ligado si el parámetro hyphenation está fijado a
    **[true](#constant.true)** y un diccionario válido de ligadura está fijado. pslib no proporciona
    su propio diccionario de ligadura, sino que utiliza uno de openoffice, scribus
    o koffice. Puede encontrar estos diccionarios para diferentes idiomas en uno
    de los siguientes directorios si el programa está instalado:



     -
      /usr/share/apps/koffice/hyphdicts/


     -
      /usr/lib/scribus/dicts/


     -
      /usr/lib/openoffice/share/dict/ooo/



    Actualmente, Scribus parece tener los diccionarios de ligadura más completos.

### Valores devueltos

Número de caracteres que no pueden ser escritos.

### Ver también

    - [ps_continue_text()](#function.ps-continue-text) - Continuar el texto en la siguiente línea

# ps_show_xy

(PECL ps &gt;= 1.1.0)

ps_show_xy — Imprimir texto en una posición dada

### Descripción

**ps_show_xy**(
    [resource](#language.types.resource) $psdoc,
    [string](#language.types.string) $text,
    [float](#language.types.float) $x,
    [float](#language.types.float) $y
): [bool](#language.types.boolean)

Imprime texto en la posición de texto dada.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     text


       El texto a imprimir.






     x


       La coordenada x de la esquina inferior izquierda de la caja circundante del texto.






     y


       La coordenada y de la esquina inferior izquierda de la caja circundante del texto.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_continue_text()](#function.ps-continue-text) - Continuar el texto en la siguiente línea

    - [ps_show()](#function.ps-show) - Imprimir texto

# ps_show_xy2

(PECL ps &gt;= 1.1.0)

ps_show_xy2 — Imprimir texto en una posición

### Descripción

**ps_show_xy2**(
    [resource](#language.types.resource) $psdoc,
    [string](#language.types.string) $text,
    [int](#language.types.integer) $len,
    [float](#language.types.float) $xcoor,
    [float](#language.types.float) $ycoor
): [bool](#language.types.boolean)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ps_show2

(PECL ps &gt;= 1.1.0)

ps_show2 — Imprimir texto en la posición actual

### Descripción

**ps_show2**([resource](#language.types.resource) $psdoc, [string](#language.types.string) $text, [int](#language.types.integer) $len): [bool](#language.types.boolean)

Imprime texto en la posición actual. No imprime más de len caracteres.

### Parámetros

     psdoc


       Un identificador de recurso del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     text


       El texto a imprimir.






     len


       El número máximo de caracteres a imprimir.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# ps_string_geometry

(PECL ps &gt;= 1.2.0)

ps_string_geometry — Establecer la geometría de una cadena de caracteres

### Descripción

**ps_string_geometry**(
    [resource](#language.types.resource) $psdoc,
    [string](#language.types.string) $text,
    [int](#language.types.integer) $fontid = 0,
    [float](#language.types.float) $size = 0.0
): [array](#language.types.array)

Esta función es similar a la función [ps_stringwidth()](#function.ps-stringwidth), excepto que devuelve
un array de dimensiones que contiene el ancho, el ascendente y el descendente
del texto.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     text


       El texto por el cual se calcula la geometría.






     fontid


       El identificador de la fuente a usar. Si no se especifica una fuente
       se usará la fuente actual.






     size


       El tamaño de la fuente. Si no se especifica un tamaño se usará el tamaño
       actual.





### Valores devueltos

Un array con las dimensiones de una cadena. El elemento 'width' contiene el
ancho de la cadena devuelto por la función [ps_stringwidth()](#function.ps-stringwidth). El
elemento 'descender' contiene el descendente máximo y 'ascender' el
ascendente máximo de la cadena.

### Ver también

    - [ps_continue_text()](#function.ps-continue-text) - Continuar el texto en la siguiente línea

    - [ps_stringwidth()](#function.ps-stringwidth) - Obtener el ancho de una cadena

# ps_stringwidth

(PECL ps &gt;= 1.1.0)

ps_stringwidth — Obtener el ancho de una cadena

### Descripción

**ps_stringwidth**(
    [resource](#language.types.resource) $psdoc,
    [string](#language.types.string) $text,
    [int](#language.types.integer) $fontid = 0,
    [float](#language.types.float) $size = 0.0
): [float](#language.types.float)

Calcula el ancho de una cadena en puntos si fue impresa
con la fuente y tamaño de fuente dados.
Esta función necesita un fichero de métrica de fuente
de Adobe para calcular el ancho preciso. Si la partición silábica está activada
se tomará en cuenta.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     text


       El texto por el que calcular el ancho.






     fontid


       El identificador de la fuente a usar. Si no se especifica ninguna fuente
       se usará la fuente actual.






     size


       El tamaño de la fuente. Si no se especifica ningún tamaño se usará el
       tamaño actual.





### Valores devueltos

El ancho de una cadena en puntos.

### Ver también

    - [ps_string_geometry()](#function.ps-string-geometry) - Establecer la geometría de una cadena de caracteres

# ps_stroke

(PECL ps &gt;= 1.1.0)

ps_stroke — Dibujar el trazado actual

### Descripción

**ps_stroke**([resource](#language.types.resource) $psdoc): [bool](#language.types.boolean)

Dibuja el trazado construido previamente con las llamadas a las funciones de dibujo como
[ps_lineto()](#function.ps-lineto).

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_closepath_stroke()](#function.ps-closepath-stroke) - Cerrar y contornear un trazado

    - [ps_fill()](#function.ps-fill) - Rellenar el trazado actual

    - [ps_fill_stroke()](#function.ps-fill-stroke) - Rellenar y contornear el trazado actual

# ps_symbol

(PECL ps &gt;= 1.2.0)

ps_symbol — Imprimir un glifo

### Descripción

**ps_symbol**([resource](#language.types.resource) $psdoc, [int](#language.types.integer) $ord): [bool](#language.types.boolean)

Imprime el glifo de la posición ord del vector de
codificación de fuentes de la fuente actual. La codificación de fuente para una fuente se puede
establecer cargando la fuente con la función [ps_findfont()](#function.ps-findfont).

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     ord


       La posición del glifo en el vector de codificación de fuentes.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [ps_symbol_name()](#function.ps-symbol-name) - Obtener el nombre de un glifo

    - [ps_symbol_width()](#function.ps-symbol-width) - Obtener el ancho de un glifo

# ps_symbol_name

(PECL ps &gt;= 1.2.0)

ps_symbol_name — Obtener el nombre de un glifo

### Descripción

**ps_symbol_name**([resource](#language.types.resource) $psdoc, [int](#language.types.integer) $ord, [int](#language.types.integer) $fontid = 0): [string](#language.types.string)

Esta función necesita un fichero de métrica de fuentes de Adobe para conocer los glifos que están
disponibles.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     ord


       El parámetro ord es la posición del glifo
       en el vector de codificación de fuente.






     fontid


       El identificador de la fuente a usar. Si no se especifica ninguna fuente
       se usará la fuente actual.





### Valores devueltos

El nombre de un glifo de la fuente dada.

### Ver también

    - [ps_symbol()](#function.ps-symbol) - Imprimir un glifo

    - [ps_symbol_width()](#function.ps-symbol-width) - Obtener el ancho de un glifo

# ps_symbol_width

(PECL ps &gt;= 1.2.0)

ps_symbol_width — Obtener el ancho de un glifo

### Descripción

**ps_symbol_width**(
    [resource](#language.types.resource) $psdoc,
    [int](#language.types.integer) $ord,
    [int](#language.types.integer) $fontid = 0,
    [float](#language.types.float) $size = 0.0
): [float](#language.types.float)

Calcula el ancho de un glifo en puntos si fue impreso con la fuente
y el tamaño de fuente dados. Esta función necesita un fichero de métrica de fuentes de Adobe para
calcular el ancho preciso.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     ord


       La posición del glifo en el vector de codificación de fuente.






     fontid


       El identificador de la fuente a usar. Si no se especifica ninguna fuente
       se usará la fuente actual.






     size


       El tamaño de la fuente. Si no se especifica ningún tamaño se usará el
       tamaño actual.





### Valores devueltos

El ancho de un glifo en puntos.

### Ver también

    - [ps_symbol()](#function.ps-symbol) - Imprimir un glifo

    - [ps_symbol_name()](#function.ps-symbol-name) - Obtener el nombre de un glifo

# ps_translate

(PECL ps &gt;= 1.1.0)

ps_translate — Establecer una traslación

### Descripción

**ps_translate**([resource](#language.types.resource) $psdoc, [float](#language.types.float) $x, [float](#language.types.float) $y): [bool](#language.types.boolean)

Establece un nuevo punto inicial del sistema de coordenadas.

### Parámetros

     psdoc


       El identificador de recursos del fichero postscript,
       como el devuelto por la función [ps_new()](#function.ps-new).






     x


       La coordenada x del origen del sistema de coordenadas trasladado.






     y


       La coordenada y del origen del sistema de coordenadas trasladado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Traslación del sistema de coordenadas**

&lt;?php
function rectángulo($ps) {
    ps_moveto($ps, 0, 0);
ps_lineto($ps, 0, 50);
    ps_lineto($ps, 50, 50);
ps_lineto($ps, 50, 0);
    ps_lineto($ps, 0, 0);
ps_stroke($ps);
}

$ps = ps_new();
if (!ps_open_file($ps, "traslación.ps")) {
print "No se puede abrir el fichero PostScript\n";
exit;
}

ps_set_info($ps, "Creator", "traslación.php");
ps_set_info($ps, "Author", "Uwe Steinmann");
ps_set_info($ps, "Title", "Ejemplo de traslación");
ps_set_info($ps, "BoundingBox", "0 0 596 842");

$psfont = ps_findfont($ps, "Helvetica", "", 0);

ps_begin_page($ps, 596, 842);
ps_set_text_pos($ps, 100, 100);
ps_translate($ps, 500, 750);
rectángulo($ps);
ps_translate($ps, -500, -750);
ps_setfont($ps, $psfont, 8.0);
ps_show($ps, "Texto en posición inicial");
ps_end_page($ps);

ps_begin_page($ps, 596, 842);
ps_set_text_pos($ps, 100, 100);
ps_save($ps);
ps_translate($ps, 500, 750);
rectángulo($ps);
ps_restore($ps);
ps_setfont($ps, $psfont, 8.0);
ps_show($ps, "Texto en posición inicial");
ps_end_page($ps);

ps_delete($ps);
?&gt;

    El ejemplo anterior demuestra dos maneras posibles de colocar
     un gráfico (en este caso un rectángulo) en cualquier posición de la página,
     mientras que el gráfico mismo utiliza su propio sistema de coordenadas. El truco está
     en cambiar el origen del sistema de coodenadas acutal antes de dibujar
     el rectángulo. La traslación tiene que ser deshecha después de dibujar
     el gráfico.




     En la segunda página se aplica un enfoque algo diferente y más elegante.
     En vez de deshacer la traslación con una segunda llamada a la función
     **ps_translate()** el contexto de gráficos se guarda antes
     de modificar el sistema de coordenadas y se restaura después de dibujar el rectángulo.

### Ver también

    - [ps_scale()](#function.ps-scale) - Estalecer el factor de escala

    - [ps_rotate()](#function.ps-rotate) - Establecer el factor de rotación

## Tabla de contenidos

- [ps_add_bookmark](#function.ps-add-bookmark) — Añadir un marcapáginas a la página actual
- [ps_add_launchlink](#function.ps-add-launchlink) — Añadir un vínculo que lance un fichero
- [ps_add_locallink](#function.ps-add-locallink) — Añadir un vínculo hacia una página del mismo documento
- [ps_add_note](#function.ps-add-note) — Añadir una nota a la página actual
- [ps_add_pdflink](#function.ps-add-pdflink) — Añadir un vínculo hacia una página de un segundo documento PDF
- [ps_add_weblink](#function.ps-add-weblink) — Añadir un vínculo hacia una ubicación web
- [ps_arc](#function.ps-arc) — Dibujar un arco en el sentido contrario a las agujas del reloj
- [ps_arcn](#function.ps-arcn) — Dibujar un arco en el sentido de las agujas del reloj
- [ps_begin_page](#function.ps-begin-page) — Empezar una nueva página
- [ps_begin_pattern](#function.ps-begin-pattern) — Inicia un nuevo patrón
- [ps_begin_template](#function.ps-begin-template) — Iniciar una nueva plantilla
- [ps_circle](#function.ps-circle) — Dibujar un círculo
- [ps_clip](#function.ps-clip) — Realizar un recorte utilizando el trazado actual
- [ps_close](#function.ps-close) — Cerrar un documento PostScript
- [ps_close_image](#function.ps-close-image) — Cierra la imagen y libera la memoria
- [ps_closepath](#function.ps-closepath) — Cerrar un trazado
- [ps_closepath_stroke](#function.ps-closepath-stroke) — Cerrar y contornear un trazado
- [ps_continue_text](#function.ps-continue-text) — Continuar el texto en la siguiente línea
- [ps_curveto](#function.ps-curveto) — Dibujar una curva
- [ps_delete](#function.ps-delete) — Borrar todos los recursos de un documento PostScript
- [ps_end_page](#function.ps-end-page) — Finaliza una página
- [ps_end_pattern](#function.ps-end-pattern) — Finalizar un patrón
- [ps_end_template](#function.ps-end-template) — Finalizar una plantilla
- [ps_fill](#function.ps-fill) — Rellenar el trazado actual
- [ps_fill_stroke](#function.ps-fill-stroke) — Rellenar y contornear el trazado actual
- [ps_findfont](#function.ps-findfont) — Carga una fuente
- [ps_get_buffer](#function.ps-get-buffer) — Obtener el buffer completo que contiene la información generada de PS
- [ps_get_parameter](#function.ps-get-parameter) — Recupera ciertos parámetros
- [ps_get_value](#function.ps-get-value) — Recupera ciertos valores
- [ps_hyphenate](#function.ps-hyphenate) — Une palabras
- [ps_include_file](#function.ps-include-file) — Leer un fichero externo con código PostScript sin tratar
- [ps_lineto](#function.ps-lineto) — Dibujar una línea
- [ps_makespotcolor](#function.ps-makespotcolor) — Crear un color directo
- [ps_moveto](#function.ps-moveto) — Establecer el punto actual
- [ps_new](#function.ps-new) — Crea un nuevo objeto de documento PostScript
- [ps_open_file](#function.ps-open-file) — Abrir un fichero para su impresión
- [ps_open_image](#function.ps-open-image) — Leer una imagen para su colocación posterior
- [ps_open_image_file](#function.ps-open-image-file) — Abre una imagen desde un fichero
- [ps_open_memory_image](#function.ps-open-memory-image) — Tomar una imagen de GD y devolverla como una imagen para colcarla en un documento PS
- [ps_place_image](#function.ps-place-image) — Colocar una imágen en la página
- [ps_rect](#function.ps-rect) — Dibujar un rectángulo
- [ps_restore](#function.ps-restore) — Restaurar un contexto previamente guardado
- [ps_rotate](#function.ps-rotate) — Establecer el factor de rotación
- [ps_save](#function.ps-save) — Guardar el contexto actual
- [ps_scale](#function.ps-scale) — Estalecer el factor de escala
- [ps_set_border_color](#function.ps-set-border-color) — Establecer el color del borde de las anotaciones
- [ps_set_border_dash](#function.ps-set-border-dash) — Establece la longitud de las rayas del borde de las anotaciones
- [ps_set_border_style](#function.ps-set-border-style) — Establecer el estilo del borde de las anotaciones
- [ps_set_info](#function.ps-set-info) — Establecer los campos de información del documento
- [ps_set_parameter](#function.ps-set-parameter) — Establecer ciertos parámetros
- [ps_set_text_pos](#function.ps-set-text-pos) — Establecer la posición de la salida de texto
- [ps_set_value](#function.ps-set-value) — Establecer ciertos valores
- [ps_setcolor](#function.ps-setcolor) — Establece el color actual
- [ps_setdash](#function.ps-setdash) — Establecer la apariencia de una línea discontinua
- [ps_setflat](#function.ps-setflat) — Establecer la planicidad
- [ps_setfont](#function.ps-setfont) — Establecer la fuente a usar para la siguiente impresión
- [ps_setgray](#function.ps-setgray) — Establecer el valor de gris
- [ps_setlinecap](#function.ps-setlinecap) — Establecer la apariencia de los extremos de línea
- [ps_setlinejoin](#function.ps-setlinejoin) — Establecer cómo están unidas las líneas conectadas
- [ps_setlinewidth](#function.ps-setlinewidth) — Establecer el ancho de una línea
- [ps_setmiterlimit](#function.ps-setmiterlimit) — Establecer el límite del inglete
- [ps_setoverprintmode](#function.ps-setoverprintmode) — Establecer el modo de sobreimpresión
- [ps_setpolydash](#function.ps-setpolydash) — Establecer la apariencia de una línea discontinua
- [ps_shading](#function.ps-shading) — Crea un tono para uso futuro
- [ps_shading_pattern](#function.ps-shading-pattern) — Crea un patrón basado en el tono
- [ps_shfill](#function.ps-shfill) — Rellenar un área con un sombreado
- [ps_show](#function.ps-show) — Imprimir texto
- [ps_show_boxed](#function.ps-show-boxed) — Escritura de texto en una caja
- [ps_show_xy](#function.ps-show-xy) — Imprimir texto en una posición dada
- [ps_show_xy2](#function.ps-show-xy2) — Imprimir texto en una posición
- [ps_show2](#function.ps-show2) — Imprimir texto en la posición actual
- [ps_string_geometry](#function.ps-string-geometry) — Establecer la geometría de una cadena de caracteres
- [ps_stringwidth](#function.ps-stringwidth) — Obtener el ancho de una cadena
- [ps_stroke](#function.ps-stroke) — Dibujar el trazado actual
- [ps_symbol](#function.ps-symbol) — Imprimir un glifo
- [ps_symbol_name](#function.ps-symbol-name) — Obtener el nombre de un glifo
- [ps_symbol_width](#function.ps-symbol-width) — Obtener el ancho de un glifo
- [ps_translate](#function.ps-translate) — Establecer una traslación

- [Introducción](#intro.ps)
- [Instalación/Configuración](#ps.setup)<li>[Requerimientos](#ps.requirements)
- [Instalación](#ps.installation)
- [Tipos de recursos](#ps.resources)
  </li>- [Constantes predefinidas](#ps.constants)
- [Funciones de PS](#ref.ps)<li>[ps_add_bookmark](#function.ps-add-bookmark) — Añadir un marcapáginas a la página actual
- [ps_add_launchlink](#function.ps-add-launchlink) — Añadir un vínculo que lance un fichero
- [ps_add_locallink](#function.ps-add-locallink) — Añadir un vínculo hacia una página del mismo documento
- [ps_add_note](#function.ps-add-note) — Añadir una nota a la página actual
- [ps_add_pdflink](#function.ps-add-pdflink) — Añadir un vínculo hacia una página de un segundo documento PDF
- [ps_add_weblink](#function.ps-add-weblink) — Añadir un vínculo hacia una ubicación web
- [ps_arc](#function.ps-arc) — Dibujar un arco en el sentido contrario a las agujas del reloj
- [ps_arcn](#function.ps-arcn) — Dibujar un arco en el sentido de las agujas del reloj
- [ps_begin_page](#function.ps-begin-page) — Empezar una nueva página
- [ps_begin_pattern](#function.ps-begin-pattern) — Inicia un nuevo patrón
- [ps_begin_template](#function.ps-begin-template) — Iniciar una nueva plantilla
- [ps_circle](#function.ps-circle) — Dibujar un círculo
- [ps_clip](#function.ps-clip) — Realizar un recorte utilizando el trazado actual
- [ps_close](#function.ps-close) — Cerrar un documento PostScript
- [ps_close_image](#function.ps-close-image) — Cierra la imagen y libera la memoria
- [ps_closepath](#function.ps-closepath) — Cerrar un trazado
- [ps_closepath_stroke](#function.ps-closepath-stroke) — Cerrar y contornear un trazado
- [ps_continue_text](#function.ps-continue-text) — Continuar el texto en la siguiente línea
- [ps_curveto](#function.ps-curveto) — Dibujar una curva
- [ps_delete](#function.ps-delete) — Borrar todos los recursos de un documento PostScript
- [ps_end_page](#function.ps-end-page) — Finaliza una página
- [ps_end_pattern](#function.ps-end-pattern) — Finalizar un patrón
- [ps_end_template](#function.ps-end-template) — Finalizar una plantilla
- [ps_fill](#function.ps-fill) — Rellenar el trazado actual
- [ps_fill_stroke](#function.ps-fill-stroke) — Rellenar y contornear el trazado actual
- [ps_findfont](#function.ps-findfont) — Carga una fuente
- [ps_get_buffer](#function.ps-get-buffer) — Obtener el buffer completo que contiene la información generada de PS
- [ps_get_parameter](#function.ps-get-parameter) — Recupera ciertos parámetros
- [ps_get_value](#function.ps-get-value) — Recupera ciertos valores
- [ps_hyphenate](#function.ps-hyphenate) — Une palabras
- [ps_include_file](#function.ps-include-file) — Leer un fichero externo con código PostScript sin tratar
- [ps_lineto](#function.ps-lineto) — Dibujar una línea
- [ps_makespotcolor](#function.ps-makespotcolor) — Crear un color directo
- [ps_moveto](#function.ps-moveto) — Establecer el punto actual
- [ps_new](#function.ps-new) — Crea un nuevo objeto de documento PostScript
- [ps_open_file](#function.ps-open-file) — Abrir un fichero para su impresión
- [ps_open_image](#function.ps-open-image) — Leer una imagen para su colocación posterior
- [ps_open_image_file](#function.ps-open-image-file) — Abre una imagen desde un fichero
- [ps_open_memory_image](#function.ps-open-memory-image) — Tomar una imagen de GD y devolverla como una imagen para colcarla en un documento PS
- [ps_place_image](#function.ps-place-image) — Colocar una imágen en la página
- [ps_rect](#function.ps-rect) — Dibujar un rectángulo
- [ps_restore](#function.ps-restore) — Restaurar un contexto previamente guardado
- [ps_rotate](#function.ps-rotate) — Establecer el factor de rotación
- [ps_save](#function.ps-save) — Guardar el contexto actual
- [ps_scale](#function.ps-scale) — Estalecer el factor de escala
- [ps_set_border_color](#function.ps-set-border-color) — Establecer el color del borde de las anotaciones
- [ps_set_border_dash](#function.ps-set-border-dash) — Establece la longitud de las rayas del borde de las anotaciones
- [ps_set_border_style](#function.ps-set-border-style) — Establecer el estilo del borde de las anotaciones
- [ps_set_info](#function.ps-set-info) — Establecer los campos de información del documento
- [ps_set_parameter](#function.ps-set-parameter) — Establecer ciertos parámetros
- [ps_set_text_pos](#function.ps-set-text-pos) — Establecer la posición de la salida de texto
- [ps_set_value](#function.ps-set-value) — Establecer ciertos valores
- [ps_setcolor](#function.ps-setcolor) — Establece el color actual
- [ps_setdash](#function.ps-setdash) — Establecer la apariencia de una línea discontinua
- [ps_setflat](#function.ps-setflat) — Establecer la planicidad
- [ps_setfont](#function.ps-setfont) — Establecer la fuente a usar para la siguiente impresión
- [ps_setgray](#function.ps-setgray) — Establecer el valor de gris
- [ps_setlinecap](#function.ps-setlinecap) — Establecer la apariencia de los extremos de línea
- [ps_setlinejoin](#function.ps-setlinejoin) — Establecer cómo están unidas las líneas conectadas
- [ps_setlinewidth](#function.ps-setlinewidth) — Establecer el ancho de una línea
- [ps_setmiterlimit](#function.ps-setmiterlimit) — Establecer el límite del inglete
- [ps_setoverprintmode](#function.ps-setoverprintmode) — Establecer el modo de sobreimpresión
- [ps_setpolydash](#function.ps-setpolydash) — Establecer la apariencia de una línea discontinua
- [ps_shading](#function.ps-shading) — Crea un tono para uso futuro
- [ps_shading_pattern](#function.ps-shading-pattern) — Crea un patrón basado en el tono
- [ps_shfill](#function.ps-shfill) — Rellenar un área con un sombreado
- [ps_show](#function.ps-show) — Imprimir texto
- [ps_show_boxed](#function.ps-show-boxed) — Escritura de texto en una caja
- [ps_show_xy](#function.ps-show-xy) — Imprimir texto en una posición dada
- [ps_show_xy2](#function.ps-show-xy2) — Imprimir texto en una posición
- [ps_show2](#function.ps-show2) — Imprimir texto en la posición actual
- [ps_string_geometry](#function.ps-string-geometry) — Establecer la geometría de una cadena de caracteres
- [ps_stringwidth](#function.ps-stringwidth) — Obtener el ancho de una cadena
- [ps_stroke](#function.ps-stroke) — Dibujar el trazado actual
- [ps_symbol](#function.ps-symbol) — Imprimir un glifo
- [ps_symbol_name](#function.ps-symbol-name) — Obtener el nombre de un glifo
- [ps_symbol_width](#function.ps-symbol-width) — Obtener el ancho de un glifo
- [ps_translate](#function.ps-translate) — Establecer una traslación
  </li>
