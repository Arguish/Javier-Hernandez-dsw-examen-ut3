# Tidy

# Introducción

Tidy es una interfaz con la biblioteca Tidy HTML, para limpiar
y manipular los documentos HTML, XHTML y XML, y tratarlos en forma de
etiquetas jerárquicas, incluyendo aquellos con lenguajes de script incorporados
tales como PHP o ASP utilizando construcciones orientadas a objetos.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#tidy.requirements)
- [Instalación](#tidy.installation)
- [Configuración en tiempo de ejecución](#tidy.configuration)

    ## Requerimientos

    Para utilizar Tidy, debe disponerse de la biblioteca libtidy,
    que está disponible en la [» página de inicio de tidy](http://tidy.sourceforge.net/).
    A partir de PHP 7.1.0, el sucesor consciente de HTML5
    [» libtidy5](http://www.html-tidy.org/) puede ser utilizado alternativamente.
    A partir de PHP 7.3.0, otra opción es utilizar [» libtidyp](https://github.com/petdance/tidyp).

## Instalación

Esta extensión está ligada con PHP, y se instala
usando la opción de configuración **--with-tidy**.

## Configuración en tiempo de ejecución

El comportamiento de estas funciones es
afectado por la configuración en el archivo php.ini.

   <caption>**Opciones de Configuración de Tidy**</caption>
   
    
     
      Nombre
      Por defecto
      Cambiable
      Historial de cambios


      [tidy.default_config](#ini.tidy.default-config)
      ""
      **[INI_SYSTEM](#constant.ini-system)**
       



      [tidy.clean_output](#ini.tidy.clean-output)
      "0"
      **[INI_USER](#constant.ini-user)**
       


Para más detalles sobre los modos INI\_\*,
refiérase a [Dónde una directiva de configuración puede ser modificada](#configuration.changes.modes).

Aquí hay una aclaración sobre
el uso de las directivas de configuración.

     tidy.default_config
     [string](#language.types.string)



      Ruta por defecto al archivo de configuración tidy.







     tidy.clean_output
     [bool](#language.types.boolean)



      Activa/Desactiva la reparación del HTML por Tidy.



     **Advertencia**

       No active tidy.clean_output si usted está generando
       contenido distinto al html, como por ejemplo imágenes dinámicas.





# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

Cada TIDY*TAG*\* representa una etiqueta HTML. Por ejemplo,
**[TIDY_TAG_A](#constant.tidy-tag-a)** representa una etiqueta
"&lt;a href="XX"&gt;link&lt;/a&gt;".

**Constantes de tipo de nodo tidy**

    **[TIDY_TAG_UNKNOWN](#constant.tidy-tag-unknown)**
    ([int](#language.types.integer))








    **[TIDY_TAG_A](#constant.tidy-tag-a)**
    ([int](#language.types.integer))








    **[TIDY_TAG_ABBR](#constant.tidy-tag-abbr)**
    ([int](#language.types.integer))








    **[TIDY_TAG_ACRONYM](#constant.tidy-tag-acronym)**
    ([int](#language.types.integer))








    **[TIDY_TAG_ADDRESS](#constant.tidy-tag-address)**
    ([int](#language.types.integer))








    **[TIDY_TAG_ALIGN](#constant.tidy-tag-align)**
    ([int](#language.types.integer))








    **[TIDY_TAG_APPLET](#constant.tidy-tag-applet)**
    ([int](#language.types.integer))








    **[TIDY_TAG_AREA](#constant.tidy-tag-area)**
    ([int](#language.types.integer))








    **[TIDY_TAG_ARTICLE](#constant.tidy-tag-article)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_ASIDE](#constant.tidy-tag-aside)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_AUDIO](#constant.tidy-tag-audio)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_B](#constant.tidy-tag-b)**
    ([int](#language.types.integer))








    **[TIDY_TAG_BASE](#constant.tidy-tag-base)**
    ([int](#language.types.integer))








    **[TIDY_TAG_BASEFONT](#constant.tidy-tag-basefont)**
    ([int](#language.types.integer))








    **[TIDY_TAG_BDI](#constant.tidy-tag-bdi)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_BDO](#constant.tidy-tag-bdo)**
    ([int](#language.types.integer))








    **[TIDY_TAG_BGSOUND](#constant.tidy-tag-bgsound)**
    ([int](#language.types.integer))








    **[TIDY_TAG_BIG](#constant.tidy-tag-big)**
    ([int](#language.types.integer))








    **[TIDY_TAG_BLINK](#constant.tidy-tag-blink)**
    ([int](#language.types.integer))








    **[TIDY_TAG_BLOCKQUOTE](#constant.tidy-tag-blockquote)**
    ([int](#language.types.integer))








    **[TIDY_TAG_BODY](#constant.tidy-tag-body)**
    ([int](#language.types.integer))








    **[TIDY_TAG_BR](#constant.tidy-tag-br)**
    ([int](#language.types.integer))








    **[TIDY_TAG_BUTTON](#constant.tidy-tag-button)**
    ([int](#language.types.integer))








    **[TIDY_TAG_CANVAS](#constant.tidy-tag-canvas)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_CAPTION](#constant.tidy-tag-caption)**
    ([int](#language.types.integer))








    **[TIDY_TAG_CENTER](#constant.tidy-tag-center)**
    ([int](#language.types.integer))








    **[TIDY_TAG_CITE](#constant.tidy-tag-cite)**
    ([int](#language.types.integer))








    **[TIDY_TAG_CODE](#constant.tidy-tag-code)**
    ([int](#language.types.integer))








    **[TIDY_TAG_COL](#constant.tidy-tag-col)**
    ([int](#language.types.integer))








    **[TIDY_TAG_COLGROUP](#constant.tidy-tag-colgroup)**
    ([int](#language.types.integer))








    **[TIDY_TAG_COMMAND](#constant.tidy-tag-command)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_COMMENT](#constant.tidy-tag-comment)**
    ([int](#language.types.integer))








    **[TIDY_TAG_DATALIST](#constant.tidy-tag-datalist)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_DD](#constant.tidy-tag-dd)**
    ([int](#language.types.integer))








    **[TIDY_TAG_DEL](#constant.tidy-tag-del)**
    ([int](#language.types.integer))








    **[TIDY_TAG_DETAILS](#constant.tidy-tag-details)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_DFN](#constant.tidy-tag-dfn)**
    ([int](#language.types.integer))








    **[TIDY_TAG_DIALOG](#constant.tidy-tag-dialog)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_DIR](#constant.tidy-tag-dir)**
    ([int](#language.types.integer))








    **[TIDY_TAG_DIV](#constant.tidy-tag-div)**
    ([int](#language.types.integer))








    **[TIDY_TAG_DL](#constant.tidy-tag-dl)**
    ([int](#language.types.integer))








    **[TIDY_TAG_DT](#constant.tidy-tag-dt)**
    ([int](#language.types.integer))








    **[TIDY_TAG_EM](#constant.tidy-tag-em)**
    ([int](#language.types.integer))








    **[TIDY_TAG_EMBED](#constant.tidy-tag-embed)**
    ([int](#language.types.integer))








    **[TIDY_TAG_FIELDSET](#constant.tidy-tag-fieldset)**
    ([int](#language.types.integer))








    **[TIDY_TAG_FIGCAPTION](#constant.tidy-tag-figcaption)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_FIGURE](#constant.tidy-tag-figure)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_FONT](#constant.tidy-tag-font)**
    ([int](#language.types.integer))








    **[TIDY_TAG_FOOTER](#constant.tidy-tag-footer)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_FORM](#constant.tidy-tag-form)**
    ([int](#language.types.integer))








    **[TIDY_TAG_FRAME](#constant.tidy-tag-frame)**
    ([int](#language.types.integer))








    **[TIDY_TAG_FRAMESET](#constant.tidy-tag-frameset)**
    ([int](#language.types.integer))








    **[TIDY_TAG_H1](#constant.tidy-tag-h1)**
    ([int](#language.types.integer))








    **[TIDY_TAG_H2](#constant.tidy-tag-h2)**
    ([int](#language.types.integer))








    **[TIDY_TAG_H3](#constant.tidy-tag-h3)**
    ([int](#language.types.integer))








    **[TIDY_TAG_H4](#constant.tidy-tag-h4)**
    ([int](#language.types.integer))








    **[TIDY_TAG_H5](#constant.tidy-tag-h5)**
    ([int](#language.types.integer))








    **[TIDY_TAG_H6](#constant.tidy-tag-h6)**
    ([int](#language.types.integer))








    **[TIDY_TAG_HEAD](#constant.tidy-tag-head)**
    ([int](#language.types.integer))








    **[TIDY_TAG_HEADER](#constant.tidy-tag-header)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_HGROUP](#constant.tidy-tag-hgroup)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_HR](#constant.tidy-tag-hr)**
    ([int](#language.types.integer))








    **[TIDY_TAG_HTML](#constant.tidy-tag-html)**
    ([int](#language.types.integer))








    **[TIDY_TAG_I](#constant.tidy-tag-i)**
    ([int](#language.types.integer))








    **[TIDY_TAG_IFRAME](#constant.tidy-tag-iframe)**
    ([int](#language.types.integer))








    **[TIDY_TAG_ILAYER](#constant.tidy-tag-ilayer)**
    ([int](#language.types.integer))








    **[TIDY_TAG_IMG](#constant.tidy-tag-img)**
    ([int](#language.types.integer))








    **[TIDY_TAG_INPUT](#constant.tidy-tag-input)**
    ([int](#language.types.integer))








    **[TIDY_TAG_INS](#constant.tidy-tag-ins)**
    ([int](#language.types.integer))








    **[TIDY_TAG_ISINDEX](#constant.tidy-tag-isindex)**
    ([int](#language.types.integer))








    **[TIDY_TAG_KBD](#constant.tidy-tag-kbd)**
    ([int](#language.types.integer))








    **[TIDY_TAG_KEYGEN](#constant.tidy-tag-keygen)**
    ([int](#language.types.integer))








    **[TIDY_TAG_LABEL](#constant.tidy-tag-label)**
    ([int](#language.types.integer))








    **[TIDY_TAG_LAYER](#constant.tidy-tag-layer)**
    ([int](#language.types.integer))








    **[TIDY_TAG_LEGEND](#constant.tidy-tag-legend)**
    ([int](#language.types.integer))








    **[TIDY_TAG_LI](#constant.tidy-tag-li)**
    ([int](#language.types.integer))








    **[TIDY_TAG_LINK](#constant.tidy-tag-link)**
    ([int](#language.types.integer))








    **[TIDY_TAG_LISTING](#constant.tidy-tag-listing)**
    ([int](#language.types.integer))








    **[TIDY_TAG_MAIN](#constant.tidy-tag-main)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_MAP](#constant.tidy-tag-map)**
    ([int](#language.types.integer))








    **[TIDY_TAG_MARK](#constant.tidy-tag-mark)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_MARQUEE](#constant.tidy-tag-marquee)**
    ([int](#language.types.integer))








    **[TIDY_TAG_MENU](#constant.tidy-tag-menu)**
    ([int](#language.types.integer))








    **[TIDY_TAG_MENUITEM](#constant.tidy-tag-menuitem)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_META](#constant.tidy-tag-meta)**
    ([int](#language.types.integer))








    **[TIDY_TAG_METER](#constant.tidy-tag-meter)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_MULTICOL](#constant.tidy-tag-multicol)**
    ([int](#language.types.integer))








    **[TIDY_TAG_NAV](#constant.tidy-tag-nav)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_NOBR](#constant.tidy-tag-nobr)**
    ([int](#language.types.integer))








    **[TIDY_TAG_NOEMBED](#constant.tidy-tag-noembed)**
    ([int](#language.types.integer))








    **[TIDY_TAG_NOFRAMES](#constant.tidy-tag-noframes)**
    ([int](#language.types.integer))








    **[TIDY_TAG_NOLAYER](#constant.tidy-tag-nolayer)**
    ([int](#language.types.integer))








    **[TIDY_TAG_NOSAVE](#constant.tidy-tag-nosave)**
    ([int](#language.types.integer))








    **[TIDY_TAG_NOSCRIPT](#constant.tidy-tag-noscript)**
    ([int](#language.types.integer))








    **[TIDY_TAG_OBJECT](#constant.tidy-tag-object)**
    ([int](#language.types.integer))








    **[TIDY_TAG_OL](#constant.tidy-tag-ol)**
    ([int](#language.types.integer))








    **[TIDY_TAG_OPTGROUP](#constant.tidy-tag-optgroup)**
    ([int](#language.types.integer))








    **[TIDY_TAG_OPTION](#constant.tidy-tag-option)**
    ([int](#language.types.integer))








    **[TIDY_TAG_OUTPUT](#constant.tidy-tag-output)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_P](#constant.tidy-tag-p)**
    ([int](#language.types.integer))








    **[TIDY_TAG_PARAM](#constant.tidy-tag-param)**
    ([int](#language.types.integer))








    **[TIDY_TAG_PLAINTEXT](#constant.tidy-tag-plaintext)**
    ([int](#language.types.integer))








    **[TIDY_TAG_PRE](#constant.tidy-tag-pre)**
    ([int](#language.types.integer))








    **[TIDY_TAG_PROGRESS](#constant.tidy-tag-progress)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_Q](#constant.tidy-tag-q)**
    ([int](#language.types.integer))








    **[TIDY_TAG_RB](#constant.tidy-tag-rb)**
    ([int](#language.types.integer))








    **[TIDY_TAG_RBC](#constant.tidy-tag-rbc)**
    ([int](#language.types.integer))








    **[TIDY_TAG_RP](#constant.tidy-tag-rp)**
    ([int](#language.types.integer))








    **[TIDY_TAG_RT](#constant.tidy-tag-rt)**
    ([int](#language.types.integer))








    **[TIDY_TAG_RTC](#constant.tidy-tag-rtc)**
    ([int](#language.types.integer))








    **[TIDY_TAG_RUBY](#constant.tidy-tag-ruby)**
    ([int](#language.types.integer))








    **[TIDY_TAG_S](#constant.tidy-tag-s)**
    ([int](#language.types.integer))








    **[TIDY_TAG_SAMP](#constant.tidy-tag-samp)**
    ([int](#language.types.integer))








    **[TIDY_TAG_SCRIPT](#constant.tidy-tag-script)**
    ([int](#language.types.integer))








    **[TIDY_TAG_SECTION](#constant.tidy-tag-section)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_SELECT](#constant.tidy-tag-select)**
    ([int](#language.types.integer))








    **[TIDY_TAG_SERVER](#constant.tidy-tag-server)**
    ([int](#language.types.integer))








    **[TIDY_TAG_SERVLET](#constant.tidy-tag-servlet)**
    ([int](#language.types.integer))








    **[TIDY_TAG_SMALL](#constant.tidy-tag-small)**
    ([int](#language.types.integer))








    **[TIDY_TAG_SOURCE](#constant.tidy-tag-source)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_SPACER](#constant.tidy-tag-spacer)**
    ([int](#language.types.integer))








    **[TIDY_TAG_SPAN](#constant.tidy-tag-span)**
    ([int](#language.types.integer))








    **[TIDY_TAG_STRIKE](#constant.tidy-tag-strike)**
    ([int](#language.types.integer))








    **[TIDY_TAG_STRONG](#constant.tidy-tag-strong)**
    ([int](#language.types.integer))








    **[TIDY_TAG_STYLE](#constant.tidy-tag-style)**
    ([int](#language.types.integer))








    **[TIDY_TAG_SUB](#constant.tidy-tag-sub)**
    ([int](#language.types.integer))








    **[TIDY_TAG_SUMMARY](#constant.tidy-tag-summary)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_SUP](#constant.tidy-tag-sup)**
    ([int](#language.types.integer))








    **[TIDY_TAG_TABLE](#constant.tidy-tag-table)**
    ([int](#language.types.integer))








    **[TIDY_TAG_TBODY](#constant.tidy-tag-tbody)**
    ([int](#language.types.integer))








    **[TIDY_TAG_TD](#constant.tidy-tag-td)**
    ([int](#language.types.integer))








    **[TIDY_TAG_TEMPLATE](#constant.tidy-tag-template)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_TEXTAREA](#constant.tidy-tag-textarea)**
    ([int](#language.types.integer))








    **[TIDY_TAG_TFOOT](#constant.tidy-tag-tfoot)**
    ([int](#language.types.integer))








    **[TIDY_TAG_TH](#constant.tidy-tag-th)**
    ([int](#language.types.integer))








    **[TIDY_TAG_THEAD](#constant.tidy-tag-thead)**
    ([int](#language.types.integer))








    **[TIDY_TAG_TIME](#constant.tidy-tag-time)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_TITLE](#constant.tidy-tag-title)**
    ([int](#language.types.integer))








    **[TIDY_TAG_TR](#constant.tidy-tag-tr)**
    ([int](#language.types.integer))








    **[TIDY_TAG_TRACK](#constant.tidy-tag-track)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_TT](#constant.tidy-tag-tt)**
    ([int](#language.types.integer))








    **[TIDY_TAG_U](#constant.tidy-tag-u)**
    ([int](#language.types.integer))








    **[TIDY_TAG_UL](#constant.tidy-tag-ul)**
    ([int](#language.types.integer))








    **[TIDY_TAG_VAR](#constant.tidy-tag-var)**
    ([int](#language.types.integer))








    **[TIDY_TAG_VIDEO](#constant.tidy-tag-video)**
    ([int](#language.types.integer))



     Añadido en libtidy 5.0.0. Disponible a partir de PHP 7.4.0.





    **[TIDY_TAG_WBR](#constant.tidy-tag-wbr)**
    ([int](#language.types.integer))








    **[TIDY_TAG_XMP](#constant.tidy-tag-xmp)**
    ([int](#language.types.integer))

**Constantes de tipo de nodo tidy**

    **[TIDY_NODETYPE_ROOT](#constant.tidy-nodetype-root)**
    ([int](#language.types.integer))



     nodo raíz





    **[TIDY_NODETYPE_DOCTYPE](#constant.tidy-nodetype-doctype)**
    ([int](#language.types.integer))



     tipo de documento





    **[TIDY_NODETYPE_COMMENT](#constant.tidy-nodetype-comment)**
    ([int](#language.types.integer))



     comentario HTML





    **[TIDY_NODETYPE_PROCINS](#constant.tidy-nodetype-procins)**
    ([int](#language.types.integer))



     Instrucción de procesamiento





    **[TIDY_NODETYPE_TEXT](#constant.tidy-nodetype-text)**
    ([int](#language.types.integer))



     Texto





    **[TIDY_NODETYPE_START](#constant.tidy-nodetype-start)**
    ([int](#language.types.integer))



     etiqueta de apertura





    **[TIDY_NODETYPE_END](#constant.tidy-nodetype-end)**
    ([int](#language.types.integer))



     etiqueta de cierre





    **[TIDY_NODETYPE_STARTEND](#constant.tidy-nodetype-startend)**
    ([int](#language.types.integer))



     etiqueta vacía

**[TIDY_NODETYPE_CDATA](#constant.tidy-nodetype-cdata)**
([int](#language.types.integer))

    CDATA

**[TIDY_NODETYPE_SECTION](#constant.tidy-nodetype-section)**
([int](#language.types.integer))

    XML section

**[TIDY_NODETYPE_ASP](#constant.tidy-nodetype-asp)**
([int](#language.types.integer))

    Código ASP

**[TIDY_NODETYPE_JSTE](#constant.tidy-nodetype-jste)**
([int](#language.types.integer))

    Código JSTE

**[TIDY_NODETYPE_PHP](#constant.tidy-nodetype-php)**
([int](#language.types.integer))

    Código PHP

**[TIDY_NODETYPE_XMLDECL](#constant.tidy-nodetype-xmldecl)**
([int](#language.types.integer))

    Declaración XML

# Ejemplos

## Tabla de contenidos

- [Ejemplos de Tidy](#tidy.examples.basic)

    ## Ejemplos de Tidy

    Este simple ejemplo muestra el uso básico de Tidy.

    **Ejemplo #1 Uso Básico Tidy**

&lt;?php
ob_start();
?&gt;
&lt;html&gt;a html document&lt;/html&gt;
&lt;?php
$html = ob_get_clean();

// Specify configuration
$config = array(
'indent' =&gt; true,
'output-xhtml' =&gt; true,
'wrap' =&gt; 200);

// Tidy
$tidy = new tidy;
$tidy-&gt;parseString($html, $config, 'utf8');
$tidy-&gt;cleanRepair();

// Output
echo $tidy;
?&gt;

# La clase [tidy](#class.tidy)

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

## Introducción

    Un nodo HTML en un fichero HTML, como es detectado por tidy.

## Sinopsis de la Clase

     class **tidy**
     {

    /* Propiedades */

     public
     ?[string](#language.types.string)
      [$errorBuffer](#tidy.props.errorbuffer) = null;

    public
     ?[string](#language.types.string)
      [$value](#tidy.props.value) = null;


    /* Métodos */

public [\_\_construct](#tidy.construct)(
    [?](#language.types.null)[string](#language.types.string) $filename = **[null](#constant.null)**,
    [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $config = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**,
    [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**
)

    public [body](#tidy.body)(): [?](#language.types.null)[tidyNode](#class.tidynode)

public [cleanRepair](#tidy.cleanrepair)(): [bool](#language.types.boolean)
public [diagnose](#tidy.diagnose)(): [bool](#language.types.boolean)
public [getConfig](#tidy.getconfig)(): [array](#language.types.array)
public [getHtmlVer](#tidy.gethtmlver)(): [int](#language.types.integer)
public [getOpt](#tidy.getopt)([string](#language.types.string) $option): [string](#language.types.string)|[int](#language.types.integer)|[bool](#language.types.boolean)
public [getOptDoc](#tidy.getoptdoc)([string](#language.types.string) $option): [string](#language.types.string)|[false](#language.types.singleton)
public [getRelease](#tidy.getrelease)(): [string](#language.types.string)
public [getStatus](#tidy.getstatus)(): [int](#language.types.integer)
public [head](#tidy.head)(): [?](#language.types.null)[tidyNode](#class.tidynode)
public [html](#tidy.html)(): [?](#language.types.null)[tidyNode](#class.tidynode)
public [isXhtml](#tidy.isxhtml)(): [bool](#language.types.boolean)
public [isXml](#tidy.isxml)(): [bool](#language.types.boolean)
public [parseFile](#tidy.parsefile)(
    [string](#language.types.string) $filename,
    [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $config = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**,
    [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**
): [bool](#language.types.boolean)
public [parseString](#tidy.parsestring)([string](#language.types.string) $string, [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $config = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [bool](#language.types.boolean)
public static [repairFile](#tidy.repairfile)(
    [string](#language.types.string) $filename,
    [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $config = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**,
    [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**
): [string](#language.types.string)|[false](#language.types.singleton)
public static [repairString](#tidy.repairstring)([string](#language.types.string) $string, [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $config = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)
public [root](#tidy.root)(): [?](#language.types.null)[tidyNode](#class.tidynode)

}

## Propiedades

     value

      La representación HTML del nodo, incluyendo las etiquetas de los alrededores.




# tidy::body

# tidy_get_body

(PHP 5, PHP 7, PHP 8, PECL tidy 0.5.2-1.0)

tidy::body -- tidy_get_body — Devuelve un objeto [tidyNode](#class.tidynode) empezando con la etiqueta &lt;body&gt;

### Descripción

Estilo orientado a objetos

public **tidy::body**(): [?](#language.types.null)[tidyNode](#class.tidynode)

Estilo procedimental

**tidy_get_body**([tidy](#class.tidy) $tidy): [?](#language.types.null)[tidyNode](#class.tidynode)

Devuelve un objeto [tidyNode](#class.tidynode) empezando por la
etiqueta &lt;body&gt;.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Devuelve un objeto [tidyNode](#class.tidynode) empezando por la etiqueta
&lt;body&gt; del árbol analizado por tidy.

### Ejemplos

    **Ejemplo #1 Ejemplo de tidy::getBody()**

&lt;?php
$html = '
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;test&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;paragraph&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;';

$tidy = tidy_parse_string($html);

$body = $tidy-&gt;Body();
echo $body-&gt;value;
?&gt;

    El ejemplo anterior mostrará:

&lt;body&gt;
&lt;p&gt;paragraph&lt;/p&gt;
&lt;/body&gt;

### Ver también

- [tidy::head()](#tidy.head) - Devuelve un objeto tidyNode empezando con la etiqueta &lt;head&gt;

- [tidy::html()](#tidy.html) - Devuelve un objeto tidyNode empezando con la etiqueta &lt;html&gt;

# tidy::cleanRepair

# tidy_clean_repair

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy::cleanRepair -- tidy_clean_repair — Ejecuta una operación de limpieza y reparación de las etiquetas HTML

### Descripción

Estilo orientado a objetos

public **tidy::cleanRepair**(): [bool](#language.types.boolean)

Estilo procedimental

**tidy_clean_repair**([tidy](#class.tidy) $tidy): [bool](#language.types.boolean)

Esta función limpia y repara el objeto object pasado como argumento.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de tidy::cleanrepair()**

&lt;?php
$html = '&lt;p&gt;test&lt;/I&gt;';

$tidy = tidy_parse_string($html);
$tidy-&gt;cleanRepair();

echo $tidy;
?&gt;

    El ejemplo anterior mostrará:

&lt;!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN"&gt;
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;test&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;

### Ver también

- [tidy::repairFile()](#tidy.repairfile) - Repara un archivo y lo devuelve como una cadena

- [tidy::repairString()](#tidy.repairstring) - Repara una cadena HTML usando un archivo de configuración opcional

# tidy::\_\_construct

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy::\_\_construct — Construye un nuevo objeto [tidy](#class.tidy)

### Descripción

public **tidy::\_\_construct**(
    [?](#language.types.null)[string](#language.types.string) $filename = **[null](#constant.null)**,
    [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $config = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**,
    [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**
)

construye un nuevo objeto [tidy](#class.tidy).

### Parámetros

     filename


       Si se proporciona el argumento filename,
       esta función también leerá este fichero e inicializará
       el objeto con este fichero, actuando de la misma forma
       que la función [tidy_parse_file()](#tidy.parsefile).






     config


       La configuración config puede pasarse
       en forma de [array](#language.types.array) o de [string](#language.types.string). Si se pasa una [string](#language.types.string),
       se interpreta como el nombre del fichero de configuración,
       y de lo contrario, se interpreta como las opciones mismas.




       Para una explicación sobre cada opción, véase
       [» http://api.html-tidy.org/#quick-reference](http://api.html-tidy.org/#quick-reference).






     encoding


       El argumento encoding configura la codificación
       para los documentos de entrada y salida. Los valores posibles son
       ascii, latin0, latin1,
       raw, utf8, iso2022,
       mac, win1252, ibm858,
       utf16, utf16le, utf16be,
       big5 y shiftjis.






     useIncludePath


       Indica si se debe buscar el fichero en el
       [include_path](#ini.include-path).





### Errores/Excepciones

Levanta una excepción cuando el constructor falla
(por ejemplo, al no poder abrir un fichero).

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Los fallos durante la ejecución del constructor ahora lanzan una excepción
       en lugar de crear silenciosamente un objeto inutilizable.




      8.0.0

       filename, config,
       encoding y useIncludePath ahora son nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con tidy::__construct()**

&lt;?php

$html = &lt;&lt;&lt; HTML

&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"&gt;

&lt;html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"&gt;
&lt;head&gt;&lt;title&gt;title&lt;/title&gt;&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;paragraph &lt;bt /&gt;
text&lt;/p&gt;
&lt;/body&gt;&lt;/html&gt;

HTML;

$tidy = new tidy();
$tidy-&gt;ParseString($html);

$tidy-&gt;cleanRepair();

if ($tidy-&gt;errorBuffer) {
echo "Se han detectado los siguientes errores:\n";
echo $tidy-&gt;errorBuffer;
}

?&gt;

    El ejemplo anterior mostrará:

Se han detectado los siguientes errores:
line 8 column 14 - Error: &lt;bt&gt; no es reconocido!
line 8 column 14 - Warning: se está descartando &lt;bt&gt; inesperado

### Ver también

- [tidy::parseFile()](#tidy.parsefile) - Analiza las etiquetas de un fichero o de una URI

- [tidy::parseString()](#tidy.parsestring) - Analiza un documento HTML contenido en una string

# tidy::diagnose

# tidy_diagnose

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy::diagnose -- tidy_diagnose — Ejecuta un diagnóstico sobre documento analizado y reparado

### Descripción

Estilo orientado a objetos

public **tidy::diagnose**(): [bool](#language.types.boolean)

Estilo procedimental

**tidy_diagnose**([tidy](#class.tidy) $tidy): [bool](#language.types.boolean)

Ejecuta un diagnóstico sobre el objeto tidy tidy,
añadiendo alguna información adicional sobre el documento en un buffer de errores.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo de tidy::diagnose()**

&lt;?php

$html = &lt;&lt;&lt; HTML
&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"&gt;

&lt;p&gt;parrafo&lt;/p&gt;
HTML;

$tidy = tidy_parse_string($html);
$tidy-&gt;cleanRepair();

// note the difference between the two outputs
echo $tidy-&gt;errorBuffer . "\n";

$tidy-&gt;diagnose();
echo $tidy-&gt;errorBuffer;

?&gt;

    El ejemplo anterior mostrará:

line 4 column 1 - Warning: &lt;p&gt; isn't allowed in &lt;head&gt; elements
line 4 column 1 - Warning: inserting missing 'title' element
line 4 column 1 - Warning: &lt;p&gt; isn't allowed in &lt;head&gt; elements
line 4 column 1 - Warning: inserting missing 'title' element
Info: Doctype given is "-//W3C//DTD XHTML 1.0 Strict//EN"
Info: Document content looks like XHTML 1.0 Strict
2 warnings, 0 errors were found!

### Ver también

- **tidy::errorBuffer()**

# tidy::$errorBuffer

# tidy_get_error_buffer

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy::$errorBuffer -- tidy_get_error_buffer — Devuelve advertencias y errores que ocurrieron al analizar el documento especificado

### Descripción

Estilo orientado a objetos (property):

public ?[string](#language.types.string) [$tidy-&gt;errorBuffer](#tidy.props.errorbuffer);

Estilo procedimental:

**tidy_get_error_buffer**([tidy](#class.tidy) $tidy): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve advertencias y errores que ocurrieron al analizar el documento especificado.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Devuelve el búfer de errores como una cadena, o **[false](#constant.false)** si el búfer está vacío.

### Ejemplos

    **Ejemplo #1 Ejemplo de tidy_get_error_buffer()**

&lt;?php
$html = '&lt;p&gt;párrafo&lt;/p&gt;';

$tidy = tidy_parse_string($html);

echo tidy_get_error_buffer($tidy);
/_ o utilizando OO: _/
echo $tidy-&gt;errorBuffer;
?&gt;

    El ejemplo anterior mostrará:

line 1 column 1 - Warning: missing &lt;!DOCTYPE&gt; declaration
line 1 column 1 - Warning: inserting missing 'title' element

### Ver también

- [tidy_access_count()](#function.tidy-access-count) - Devuelve el número de alertas de accesibilidad Tidy encontradas en un documento dado

- [tidy_error_count()](#function.tidy-error-count) - Devuelve el número de errores Tidy encontrados en un documento dado

- [tidy_warning_count()](#function.tidy-warning-count) - Devuelve el número de alertas encontradas en un documendo dado

# tidy::getConfig

# tidy_get_config

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.7.0)

tidy::getConfig -- tidy_get_config — Obtiene la configuración actual de Tidy

### Descripción

Estilo orientado a objetos

public **tidy::getConfig**(): [array](#language.types.array)

Estilo procedimental

**tidy_get_config**([tidy](#class.tidy) $tidy): [array](#language.types.array)

Obtiene la lista de las opciones de configuración en uso de un objeto
tidy tidy.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Devuelve un array con las opciones de configuación.

Para una explicación de cada opción, consulte [» http://api.html-tidy.org/#quick-reference](http://api.html-tidy.org/#quick-reference).

### Ejemplos

    **Ejemplo #1 Ejemplo de tidy::getConfig()**

&lt;?php
$html = '&lt;p&gt;test&lt;/p&gt;';
$config = array('indent' =&gt; TRUE,
'output-xhtml' =&gt; TRUE,
'wrap' =&gt; 200);

$tidy = tidy_parse_string($html, $config);

print_r($tidy-&gt;getConfig());
?&gt;

    El ejemplo anterior mostrará:

Array
(
[indent-spaces] =&gt; 2
[wrap] =&gt; 200
[tab-size] =&gt; 8
[char-encoding] =&gt; 1
[input-encoding] =&gt; 3
[output-encoding] =&gt; 1
[newline] =&gt; 1
[doctype-mode] =&gt; 1
[doctype] =&gt;
[repeated-attributes] =&gt; 1
[alt-text] =&gt;
[slide-style] =&gt;
[error-file] =&gt;
[output-file] =&gt;
[write-back] =&gt;
[markup] =&gt; 1
[show-warnings] =&gt; 1
[quiet] =&gt;
[indent] =&gt; 1
[hide-endtags] =&gt;
[input-xml] =&gt;
[output-xml] =&gt; 1
[output-xhtml] =&gt; 1
[output-html] =&gt;
[add-xml-decl] =&gt;
[uppercase-tags] =&gt;
[uppercase-attributes] =&gt;
[bare] =&gt;
[clean] =&gt;
[logical-emphasis] =&gt;
[drop-proprietary-attributes] =&gt;
[drop-font-tags] =&gt;
[drop-empty-paras] =&gt; 1
[fix-bad-comments] =&gt; 1
[break-before-br] =&gt;
[split] =&gt;
[numeric-entities] =&gt;
[quote-marks] =&gt;
[quote-nbsp] =&gt; 1
[quote-ampersand] =&gt; 1
[wrap-attributes] =&gt;
[wrap-script-literals] =&gt;
[wrap-sections] =&gt; 1
[wrap-asp] =&gt; 1
[wrap-jste] =&gt; 1
[wrap-php] =&gt; 1
[fix-backslash] =&gt; 1
[indent-attributes] =&gt;
[assume-xml-procins] =&gt;
[add-xml-space] =&gt;
[enclose-text] =&gt;
[enclose-block-text] =&gt;
[keep-time] =&gt;
[word-2000] =&gt;
[tidy-mark] =&gt;
[gnu-emacs] =&gt;
[gnu-emacs-file] =&gt;
[literal-attributes] =&gt;
[show-body-only] =&gt;
[fix-uri] =&gt; 1
[lower-literals] =&gt; 1
[hide-comments] =&gt;
[indent-cdata] =&gt;
[force-output] =&gt; 1
[show-errors] =&gt; 6
[ascii-chars] =&gt; 1
[join-classes] =&gt;
[join-styles] =&gt; 1
[escape-cdata] =&gt;
[language] =&gt;
[ncr] =&gt; 1
[output-bom] =&gt; 2
[replace-color] =&gt;
[css-prefix] =&gt;
[new-inline-tags] =&gt;
[new-blocklevel-tags] =&gt;
[new-empty-tags] =&gt;
[new-pre-tags] =&gt;
[accessibility-check] =&gt; 0
[vertical-space] =&gt;
[punctuation-wrap] =&gt;
[merge-divs] =&gt; 1
)

### Ver también

- **tidy_reset_config()**

- **tidy_save_config()**

# tidy::getHtmlVer

# tidy_get_html_ver

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy::getHtmlVer -- tidy_get_html_ver — Obtiene la versión detectada de HTML en un documento especificado

### Descripción

Estilo orientado a objetos

public **tidy::getHtmlVer**(): [int](#language.types.integer)

Estilo procedimental

**tidy_get_html_ver**([tidy](#class.tidy) $tidy): [int](#language.types.integer)

Devuelve la versión detectada HTML de un objeto tidy especificado.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Devuelve la versión detectada HTML.

**Advertencia**

    Esta función aún no está implementada en la librería Tidylib, por tanto siempre
    devolverá 0.

# tidy::getOpt

# tidy_getopt

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy::getOpt -- tidy_getopt — Devuelve el valor de la opción de configuración especificada para el documento tidy

### Descripción

Estilo orientado a objetos

public **tidy::getOpt**([string](#language.types.string) $option): [string](#language.types.string)|[int](#language.types.integer)|[bool](#language.types.boolean)

Estilo procedimental

**tidy_getopt**([tidy](#class.tidy) $tidy, [string](#language.types.string) $option): [string](#language.types.string)|[int](#language.types.integer)|[bool](#language.types.boolean)

Devuelve el valor de la opción option de configuración del objeto
tidy tidy especificado.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)






     option


       Encontrará una lista con cada opción de configuración y sus tipos
       en: [» http://api.html-tidy.org/#quick-reference](http://api.html-tidy.org/#quick-reference).





### Valores devueltos

Devuelve el valor de la opción option especificada.
El tipo de valor depende de la opción.

### Ejemplos

    **Ejemplo #1 Ejemplo de tidy_getopt()**

&lt;?php

$html ='&lt;!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN"&gt;
&lt;html&gt;&lt;head&gt;&lt;title&gt;Title&lt;/title&gt;&lt;/head&gt;
&lt;body&gt;

&lt;p&gt;&lt;img src="img.png"&gt;&lt;/p&gt;

&lt;/body&gt;&lt;/html&gt;';

$config = array('accessibility-check' =&gt; 3,
'alt-text' =&gt; 'some text');

$tidy = new tidy();
$tidy-&gt;parseString($html, $config);

var_dump($tidy-&gt;getOpt('accessibility-check')); //integer
var_dump($tidy-&gt;getOpt('lower-literals')); //boolean
var_dump($tidy-&gt;getOpt('alt-text')); //string

?&gt;

    El ejemplo anterior mostrará:

int(3)
bool(true)
string(9) "some text"

# tidy::getOptDoc

# tidy_get_opt_doc

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

tidy::getOptDoc -- tidy_get_opt_doc —
Devuelve la documentación correspondiente a un nombre de opción dado

### Descripción

Estilo orientado a objetos

public **tidy::getOptDoc**([string](#language.types.string) $option): [string](#language.types.string)|[false](#language.types.singleton)

Estilo procedimental

**tidy_get_opt_doc**([tidy](#class.tidy) $tidy, [string](#language.types.string) $option): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve la documentación **tidy_get_opt_doc()** para el
nombre de opción dado.

**Nota**:

    Se requiere al menos la librería libtidy del 25 April del 2005 paa que la función esté
    disponible.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)






     option


       El nombre de la opción





### Valores devueltos

Devuelve una cadena si la opción existe y tiene documentación disponible, o
**[false](#constant.false)** de otro modo.

### Ejemplos

    **Ejemplo #1 Imprimir todas las opciones, junto con su documentación y sus valores por omisión**

&lt;?php

$tidy = new tidy;
$config = $tidy-&gt;getConfig();

ksort($config);

foreach ($config as $opt =&gt; $val) {

    if (!$doc = $tidy-&gt;getOptDoc($opt))
        $doc = 'no documentation available!';

    $val = ($tidy-&gt;getOpt($opt) === true)  ? 'true'  : $val;
    $val = ($tidy-&gt;getOpt($opt) === false) ? 'false' : $val;

    echo "&lt;p&gt;&lt;b&gt;$opt&lt;/b&gt; (default: '$val')&lt;br /&gt;".
         "$doc&lt;/p&gt;&lt;hr /&gt;\n";

}

?&gt;

### Ver también

    - [tidy::getConfig()](#tidy.getconfig) - Obtiene la configuración actual de Tidy

    - [tidy::getOpt()](#tidy.getopt) - Devuelve el valor de la opción de configuración especificada para el documento tidy

# tidy::getRelease

# tidy_get_release

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy::getRelease -- tidy_get_release — Obtiene la fecha de lanzamiento (versión) de la librería Tidy

### Descripción

Estilo orientado a objetos

public **tidy::getRelease**(): [string](#language.types.string)

Estilo procedimental

**tidy_get_release**(): [string](#language.types.string)

Obtiene la fecha de lanzamiento de la librería Tidy.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una cadena con la fecha de lanzamiento de la librería Tidy,
que puede ser 'unknown'.

# tidy::getStatus

# tidy_get_status

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy::getStatus -- tidy_get_status — Obtiene el status de un documento especificado

### Descripción

Estilo orientado a objetos

public **tidy::getStatus**(): [int](#language.types.integer)

Estilo procedimental

**tidy_get_status**([tidy](#class.tidy) $tidy): [int](#language.types.integer)

Devuelve el status del objeto tidy tidy especificado.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Devuelve 0 si no hay errores/alertas, 1 para alertas de accesibilidad,
o 2 para los errores.

### Ejemplos

    **Ejemplo #1 Ejemplo de tidy::getStatus()**

&lt;?php
$html = '&lt;p&gt;paragraph&lt;/i&gt;';
$tidy = new tidy();
$tidy-&gt;parseString($html);

$tidy2 = new tidy();
$html2 = '&lt;bogus&gt;test&lt;/bogus&gt;';
$tidy2-&gt;parseString($html2);

echo $tidy-&gt;getStatus(); //1

echo $tidy2-&gt;getStatus(); //2
?&gt;

# tidy::head

# tidy_get_head

(PHP 5, PHP 7, PHP 8, PECL tidy 0.5.2-1.0.0)

tidy::head -- tidy_get_head — Devuelve un objeto [tidyNode](#class.tidynode) empezando con la etiqueta &lt;head&gt;

### Descripción

Estilo orientado a objetos

public **tidy::head**(): [?](#language.types.null)[tidyNode](#class.tidynode)

Estilo procedimental

**tidy_get_head**([tidy](#class.tidy) $tidy): [?](#language.types.null)[tidyNode](#class.tidynode)

Devuelve un objeto [tidyNode](#class.tidynode) empezando por la
etiqueta &lt;head&gt;.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Devuelve el objeto [tidyNode](#class.tidynode).

### Ejemplos

    **Ejemplo #1 Ejemplo de tidy::head()**

&lt;?php
$html = '
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;test&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;parrafo&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;';

$tidy = tidy_parse_string($html);

$head = $tidy-&gt;head();
echo $head-&gt;value;
?&gt;

    El ejemplo anterior mostrará:

&lt;head&gt;
&lt;title&gt;test&lt;/title&gt;
&lt;/head&gt;

### Ver también

- [tidy::body()](#tidy.body) - Devuelve un objeto tidyNode empezando con la etiqueta &lt;body&gt;

- [tidy::html()](#tidy.html) - Devuelve un objeto tidyNode empezando con la etiqueta &lt;html&gt;

# tidy::html

# tidy_get_html

(PHP 5, PHP 7, PHP 8, PECL tidy 0.5.2-1.0.0)

tidy::html -- tidy_get_html — Devuelve un objeto [tidyNode](#class.tidynode) empezando con la etiqueta &lt;html&gt;

### Descripción

Estilo orientado a objetos

public **tidy::html**(): [?](#language.types.null)[tidyNode](#class.tidynode)

Estilo procedimental

**tidy_get_html**([tidy](#class.tidy) $tidy): [?](#language.types.null)[tidyNode](#class.tidynode)

Devuelve un objeto [tidyNode](#class.tidynode) empezando por la
etiqueta &lt;html&gt;.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Devuelve el objeto [tidyNode](#class.tidynode).

### Ejemplos

    **Ejemplo #1 Ejemplo de tidy::html()**

&lt;?php
$html = '
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;test&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;parrafo&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;';

$tidy = tidy_parse_string($html);

$html = $tidy-&gt;html();
echo $html-&gt;value;
?&gt;

    El ejemplo anterior mostrará:

&lt;html&gt;
&lt;head&gt;
&lt;title&gt;test&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;parrafo&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;

### Ver también

- [tidy::body()](#tidy.body) - Devuelve un objeto tidyNode empezando con la etiqueta &lt;body&gt;

- [tidy::head()](#tidy.head) - Devuelve un objeto tidyNode empezando con la etiqueta &lt;head&gt;

# tidy::isXhtml

# tidy_is_xhtml

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy::isXhtml -- tidy_is_xhtml — Indica si el documento es XHTML

### Descripción

Estilo orientado a objetos

public **tidy::isXhtml**(): [bool](#language.types.boolean)

Estilo procedimental

**tidy_is_xhtml**([tidy](#class.tidy) $tidy): [bool](#language.types.boolean)

Dice si el documento es XHTML.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Esta función devuelve **[true](#constant.true)** si el objeto
tidy tidy especificado es XHTML,
o **[false](#constant.false)** de otra forma.

**Advertencia**

    Esta función no está implementada aún en Tidylib, por lo que siempre devolverá
    **[false](#constant.false)**.

# tidy::isXml

# tidy_is_xml

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy::isXml -- tidy_is_xml — Indica si el documento es XML (no HTML/XHTML)

### Descripción

Estilo orientado a objetos

public **tidy::isXml**(): [bool](#language.types.boolean)

Estilo procedimental

**tidy_is_xml**([tidy](#class.tidy) $tidy): [bool](#language.types.boolean)

Dice si el documento es un XML genérico (no HTML/XHTML).

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Esta función devuelve **[true](#constant.true)** si el objeto
tidy tidy especificado es un documento XML (no HTML/XHTML),
o **[false](#constant.false)** de otra forma.

**Advertencia**

    Esta función no está implementada aún en Tidylib, por lo que siempre devolverá
    **[false](#constant.false)**.

# tidy::parseFile

# tidy_parse_file

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy::parseFile -- tidy_parse_file —
Analiza las etiquetas de un fichero o de una URI

### Descripción

Estilo orientado a objetos

public **tidy::parseFile**(
    [string](#language.types.string) $filename,
    [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $config = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**,
    [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**
): [bool](#language.types.boolean)

Estilo procedimental

**tidy_parse_file**(
    [string](#language.types.string) $filename,
    [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $config = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**,
    [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**
): [tidy](#class.tidy)|[false](#language.types.singleton)

Analiza el fichero especificado.

### Parámetros

     filename


       Si el parámetro filename es proporcionado,
       esta función también leerá este fichero e inicializará
       el objeto con este fichero, de la misma manera que
       **tidy_parse_file()**.






     config


       La configuración config puede ser pasada
       en forma de [array](#language.types.array) o de [string](#language.types.string). Si una [string](#language.types.string) es pasada,
       es interpretada como el nombre del fichero de configuración,
       y de lo contrario, es interpretada como las opciones mismas.




       Para una explicación sobre cada opción, vea
       [» http://api.html-tidy.org/#quick-reference](http://api.html-tidy.org/#quick-reference).






     encoding


       El parámetro encoding configura la codificación
       para los documentos de entrada y salida. Los valores posibles son
       ascii, latin0, latin1,
       raw, utf8, iso2022,
       mac, win1252, ibm858,
       utf16, utf16le, utf16be,
       big5 y shiftjis.






     useIncludePath


       Activa la búsqueda en el
       [include_path](#ini.include-path).





### Valores devueltos

**tidy::parseFile()** returns **[true](#constant.true)** on success.
**tidy_parse_file()** returns a new [tidy](#class.tidy)
instance on success.
Both, the method and the function return **[false](#constant.false)** on failure.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       config y encoding son ahora nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con tidy::parseFile()**

&lt;?php
$tidy = tidy_parse_file('file.html');

$tidy-&gt;cleanRepair();

if(!empty($tidy-&gt;error_buf)) {
echo 'Los siguientes errores y advertencias han sido encontrados :'."\n";
echo $tidy-&gt;error_buf;
}
?&gt;

### Ver también

- [tidy::parseString()](#tidy.parsestring) - Analiza un documento HTML contenido en una string

- [tidy::repairFile()](#tidy.repairfile) - Repara un archivo y lo devuelve como una cadena

- [tidy::repairString()](#tidy.repairstring) - Repara una cadena HTML usando un archivo de configuración opcional

# tidy::parseString

# tidy_parse_string

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy::parseString -- tidy_parse_string —
Analiza un documento HTML contenido en una string

### Descripción

Estilo orientado a objetos

public **tidy::parseString**([string](#language.types.string) $string, [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $config = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [bool](#language.types.boolean)

Estilo procedimental

**tidy_parse_string**([string](#language.types.string) $string, [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $config = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [tidy](#class.tidy)|[false](#language.types.singleton)

Analiza un documento contenido en una string.

### Parámetros

     string


       Los datos a analizar.






     config


       La configuración config puede ser pasada
       en forma de [array](#language.types.array) o de [string](#language.types.string). Si una [string](#language.types.string) es pasada,
       es interpretada como el nombre del fichero de configuración,
       y si no, es interpretada como las opciones mismas.




       Para una explicación sobre cada opción, véase
       [» http://api.html-tidy.org/#quick-reference](http://api.html-tidy.org/#quick-reference).






     encoding


       El parámetro encoding configura la codificación
       para los documentos de entrada y salida. Los valores posibles son
       ascii, latin0, latin1,
       raw, utf8, iso2022,
       mac, win1252, ibm858,
       utf16, utf16le, utf16be,
       big5 y shiftjis.





### Valores devueltos

**tidy::parseString()** devuelve **[true](#constant.true)** en caso de éxito.
**tidy_parse_string()** devuelve una nueva instancia de
[tidy](#class.tidy) en caso de éxito.
Ambos, el método y la función devuelven **[false](#constant.false)** en caso de fallo.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       config y encoding son ahora nullable.



### Ejemplos

    **Ejemplo #1 Ejemplo con tidy::parseString()**

&lt;?php
ob_start();
?&gt;

&lt;html&gt;
&lt;head&gt;
&lt;title&gt;test&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;error&lt;br /&gt;otra línea&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;

&lt;?php
$buffer = ob_get_clean();
$config = array('indent' =&gt; TRUE,
'output-xhtml' =&gt; TRUE,
'wrap', 200);

$tidy = tidy_parse_string($buffer, $config, 'UTF8');

$tidy-&gt;cleanRepair();

echo $tidy;
?&gt;

    El ejemplo anterior mostrará:

&lt;!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"&gt;
&lt;html xmlns="http://www.w3.org/1999/xhtml"&gt;
&lt;head&gt;
&lt;title&gt;
test
&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;
error&lt;br /&gt;
otra línea
&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;

### Ver también

- [tidy::parseFile()](#tidy.parsefile) - Analiza las etiquetas de un fichero o de una URI

- [tidy::repairFile()](#tidy.repairfile) - Repara un archivo y lo devuelve como una cadena

- [tidy::repairString()](#tidy.repairstring) - Repara una cadena HTML usando un archivo de configuración opcional

# tidy::repairFile

# tidy_repair_file

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.7.0)

tidy::repairFile -- tidy_repair_file — Repara un archivo y lo devuelve como una cadena

### Descripción

Estilo orientado a objetos

public static **tidy::repairFile**(
    [string](#language.types.string) $filename,
    [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $config = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**,
    [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**
): [string](#language.types.string)|[false](#language.types.singleton)

Estilo procedimental

**tidy_repair_file**(
    [string](#language.types.string) $filename,
    [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $config = **[null](#constant.null)**,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**,
    [bool](#language.types.boolean) $useIncludePath = **[false](#constant.false)**
): [string](#language.types.string)|[false](#language.types.singleton)

Repara un archivo dado y devuelve el resultado como una cadena.

### Parámetros

     filename


       El archivo a ser reparado.






     config


       La configuración config puede ser pasada en forma de un
       array o una cadena. Si una cadena es pasada, será interpretada como el
       el nombre del archivo de configuración, de otra forma, será interpretada como opciones
       en sí mismas.




       Revise http://tidy.sourceforge.net/docs/quickref.html para una
       explicación detallada de cada opción.






     encoding


       El parámetro encoding establece la codificación para
       entarda/salida de los documentos. Los posibles valores de codificación son:
       ascii, latin0, latin1,
       raw, utf8, iso2022,
       mac, win1252, ibm858,
       utf16, utf16le, utf16be,
       big5, y shiftjis.






     useIncludePath


       Búsca el archivo en la ruta [include_path](#ini.include-path).





### Valores devueltos

Devuelve el contenido reparado como una cadena, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       **tidy::repairFile()** es un método estático ahora.




      8.0.0

       config y encoding son anulables ahora.



### Ejemplos

    **Ejemplo #1 Ejemplo de tidy::repairFile()**

&lt;?php
$file = 'file.html';

$tidy = new tidy();
$repaired = $tidy-&gt;repairfile($file);
rename($file, $file . '.bak');

file_put_contents($file, $repaired);
?&gt;

### Ver también

- [tidy::parseFile()](#tidy.parsefile) - Analiza las etiquetas de un fichero o de una URI

- [tidy::parseString()](#tidy.parsestring) - Analiza un documento HTML contenido en una string

- [tidy::repairString()](#tidy.repairstring) - Repara una cadena HTML usando un archivo de configuración opcional

# tidy::repairString

# tidy_repair_string

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.7.0)

tidy::repairString -- tidy_repair_string — Repara una cadena HTML usando un archivo de configuración opcional

### Descripción

Estilo orientado a objetos

public static **tidy::repairString**([string](#language.types.string) $string, [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $config = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

Estilo procedimental

**tidy_repair_string**([string](#language.types.string) $string, [array](#language.types.array)|[string](#language.types.string)|[null](#language.types.null) $config = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

Repara una cadena dada.

### Parámetros

     string


       Los datos a ser reparados.






     config


       La configuración config puede ser pasada en forma de un
       array o una cadena. Si una cadena es pasada, será interpretada como el
       el nombre del archivo de configuración, de otra forma, será interpretada como opciones
       en sí mismas.




       Revise [» http://api.html-tidy.org/#quick-reference](http://api.html-tidy.org/#quick-reference) para
       una explicación detallada sobre cada opción.






     encoding


       El parámetro encoding establece la codificación para
       entarda/salida de los documentos. Los posibles valores de codificación son:
       ascii, latin0, latin1,
       raw, utf8, iso2022,
       mac, win1252, ibm858,
       utf16, utf16le, utf16be,
       big5, y shiftjis.





### Valores devueltos

Devuelve la cadena reparada, o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       **tidy::repairString()** es un método estático ahora.




      8.0.0

       config y encoding son anulables ahora.




      8.0.0

       Esta función ya no acepta el parámetro useIncludePath.



### Ejemplos

    **Ejemplo #1 Ejemplo de tidy::repairString()**

&lt;?php
ob_start();
?&gt;

&lt;html&gt;
&lt;head&gt;
&lt;title&gt;test&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;error&lt;/i&gt;
&lt;/body&gt;
&lt;/html&gt;

&lt;?php

$buffer = ob_get_clean();
$tidy = new tidy();
$clean = $tidy-&gt;repairString($buffer);

echo $clean;
?&gt;

    El ejemplo anterior mostrará:

&lt;!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN"&gt;
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;test&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;error&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;

### Ver también

- [tidy::parseFile()](#tidy.parsefile) - Analiza las etiquetas de un fichero o de una URI

- [tidy::parseString()](#tidy.parsestring) - Analiza un documento HTML contenido en una string

- [tidy::repairFile()](#tidy.repairfile) - Repara un archivo y lo devuelve como una cadena

# tidy::root

# tidy_get_root

(PHP 5, PHP 7, PHP 8, PECL tidy 0.5.2-1.0.0)

tidy::root -- tidy_get_root — Devuelve un objeto [tidyNode](#class.tidynode) que representa la raíz del árbol analizado por tidy

### Descripción

Estilo orientado a objetos

public **tidy::root**(): [?](#language.types.null)[tidyNode](#class.tidynode)

Estilo procedimental

**tidy_get_root**([tidy](#class.tidy) $tidy): [?](#language.types.null)[tidyNode](#class.tidynode)

Devuelve un objeto [tidyNode](#class.tidynode) que representa la
raíz del arbol a ser analizada por tidy.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Devuelve el objeto [tidyNode](#class.tidynode).

### Ejemplos

    **Ejemplo #1 tidy::root()** ejemplo

&lt;?php

$html = &lt;&lt;&lt; HTML
&lt;html&gt;&lt;body&gt;

&lt;p&gt;paragraph&lt;/p&gt;
&lt;br/&gt;

&lt;/body&gt;&lt;/html&gt;
HTML;

$tidy = tidy_parse_string($html);
dump_nodes($tidy-&gt;root(), 1);

function dump_nodes($node, $indent) {

    if($node-&gt;hasChildren()) {
        foreach($node-&gt;child as $child) {
            echo str_repeat('.', $indent*2) . ($child-&gt;name ? $child-&gt;name : '"'.$child-&gt;value.'"'). "\n";

            dump_nodes($child, $indent+1);
        }
    }

}
?&gt;

    El ejemplo anterior mostrará:

..html
....head
......title
....body
......p
........"paragraph"
......br

## Tabla de contenidos

- [tidy::body](#tidy.body) — Devuelve un objeto tidyNode empezando con la etiqueta &lt;body&gt;
- [tidy::cleanRepair](#tidy.cleanrepair) — Ejecuta una operación de limpieza y reparación de las etiquetas HTML
- [tidy::\_\_construct](#tidy.construct) — Construye un nuevo objeto tidy
- [tidy::diagnose](#tidy.diagnose) — Ejecuta un diagnóstico sobre documento analizado y reparado
- [tidy::$errorBuffer](#tidy.props.errorbuffer) — Devuelve advertencias y errores que ocurrieron al analizar el documento especificado
- [tidy::getConfig](#tidy.getconfig) — Obtiene la configuración actual de Tidy
- [tidy::getHtmlVer](#tidy.gethtmlver) — Obtiene la versión detectada de HTML en un documento especificado
- [tidy::getOpt](#tidy.getopt) — Devuelve el valor de la opción de configuración especificada para el documento tidy
- [tidy::getOptDoc](#tidy.getoptdoc) — Devuelve la documentación correspondiente a un nombre de opción dado
- [tidy::getRelease](#tidy.getrelease) — Obtiene la fecha de lanzamiento (versión) de la librería Tidy
- [tidy::getStatus](#tidy.getstatus) — Obtiene el status de un documento especificado
- [tidy::head](#tidy.head) — Devuelve un objeto tidyNode empezando con la etiqueta &lt;head&gt;
- [tidy::html](#tidy.html) — Devuelve un objeto tidyNode empezando con la etiqueta &lt;html&gt;
- [tidy::isXhtml](#tidy.isxhtml) — Indica si el documento es XHTML
- [tidy::isXml](#tidy.isxml) — Indica si el documento es XML (no HTML/XHTML)
- [tidy::parseFile](#tidy.parsefile) — Analiza las etiquetas de un fichero o de una URI
- [tidy::parseString](#tidy.parsestring) — Analiza un documento HTML contenido en una string
- [tidy::repairFile](#tidy.repairfile) — Repara un archivo y lo devuelve como una cadena
- [tidy::repairString](#tidy.repairstring) — Repara una cadena HTML usando un archivo de configuración opcional
- [tidy::root](#tidy.root) — Devuelve un objeto tidyNode que representa la raíz del árbol analizado por tidy

# La clase [tidyNode](#class.tidynode)

(PHP 5, PHP 7, PHP 8)

## Introducción

    Un nodo HTML en un fichero HTML, como es detectado por tidy.

## Sinopsis de la Clase

     final
     class **tidyNode**
     {

    /* Propiedades */

     public
     readonly
     [string](#language.types.string)
      [$value](#tidynode.props.value);

    public
     readonly
     [string](#language.types.string)
      [$name](#tidynode.props.name);

    public
     readonly
     [int](#language.types.integer)
      [$type](#tidynode.props.type);

    public
     readonly
     [int](#language.types.integer)
      [$line](#tidynode.props.line);

    public
     readonly
     [int](#language.types.integer)
      [$column](#tidynode.props.column);

    public
     readonly
     [bool](#language.types.boolean)
      [$proprietary](#tidynode.props.proprietary);

    public
     readonly
     ?[int](#language.types.integer)
      [$id](#tidynode.props.id);

    public
     readonly
     ?[array](#language.types.array)
      [$attribute](#tidynode.props.attribute);

    public
     readonly
     ?[array](#language.types.array)
      [$child](#tidynode.props.child);


    /* Métodos */

private [\_\_construct](#tidynode.construct)()

    public [getNextSibling](#tidynode.getnextsibling)(): [?](#language.types.null)[tidyNode](#class.tidynode)

public [getParent](#tidynode.getparent)(): [?](#language.types.null)[tidyNode](#class.tidynode)
public [getPreviousSibling](#tidynode.getprevioussibling)(): [?](#language.types.null)[tidyNode](#class.tidynode)
public [hasChildren](#tidynode.haschildren)(): [bool](#language.types.boolean)
public [hasSiblings](#tidynode.hassiblings)(): [bool](#language.types.boolean)
public [isAsp](#tidynode.isasp)(): [bool](#language.types.boolean)
public [isComment](#tidynode.iscomment)(): [bool](#language.types.boolean)
public [isHtml](#tidynode.ishtml)(): [bool](#language.types.boolean)
public [isJste](#tidynode.isjste)(): [bool](#language.types.boolean)
public [isPhp](#tidynode.isphp)(): [bool](#language.types.boolean)
public [isText](#tidynode.istext)(): [bool](#language.types.boolean)

}

## Propiedades

     value

      La representación HTML del nodo, incluyendo las etiquetas de los alrededores.





     name

      El nombre del nodo HTML





     type

      El tipo de etiqueta (una de las [constantes nodetype](#tidy.constants.nodetype). Por ejemplo, **[TIDY_NODETYPE_PHP](#constant.tidy-nodetype-php)**)





     line

      el número de línea en la que la etiqueta está ubicada en el archivo





     column

      El número de columna en la que la etiqueta está ubicada en el archivo





     proprietary

      Indica si el nodo es una etiqueta de propiedad





     id

      EL ID de la etiqueta (una de las [constantes tag](#tidy.constants.tag). Por ejemplo, **[TIDY_TAG_FRAME](#constant.tidy-tag-frame)**)





     attribute


       Un array de cadena, representando
       los nombres de atributos (como las claves) del nodo actual.






     child


       Un array de **tidyNode**, representando
       el hijo del nodo actual.





# tidyNode::\_\_construct

(PHP 5, PHP 7, PHP 8)

tidyNode::\_\_construct — Constructor privado para prohibir la instanciación directa

### Descripción

private **tidyNode::\_\_construct**()

### Parámetros

Esta función no contiene ningún parámetro.

# tidyNode::getNextSibling

(PHP 8 &gt;= 8.4.0)

tidyNode::getNextSibling — Devuelve el nodo hermano siguiente del nodo actual

### Descripción

public **tidyNode::getNextSibling**(): [?](#language.types.null)[tidyNode](#class.tidynode)

Devuelve el nodo hermano siguiente del nodo actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [tidyNode](#class.tidynode) si el nodo tiene un hermano siguiente, o **[null](#constant.null)**
de lo contrario.

### Ejemplos

**Ejemplo #1 Ejemplo de tidyNode::getNextSibling()**

&lt;?php

$html = &lt;&lt;&lt; HTML
&lt;html&gt;
&lt;head&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;Hello&lt;/p&gt;&lt;p&gt;World&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;

HTML;

$tidy = tidy_parse_string($html);

$node = $tidy-&gt;body();
var_dump($node-&gt;child[0]-&gt;getNextSibling()-&gt;value);

?&gt;

El ejemplo anterior mostrará:

string(13) "&lt;p&gt;World&lt;/p&gt;
"

### Ver también

- [tidyNode::getParent()](#tidynode.getparent) - Devuelve el nodo padre del nodo actual

- [tidyNode::getPreviousSibling()](#tidynode.getprevioussibling) - Devuelve el nodo hermano anterior del nodo actual

# tidyNode::getParent

(PHP 5 &gt;= 5.2.2, PHP 7, PHP 8)

tidyNode::getParent — Devuelve el nodo padre del nodo actual

### Descripción

public **tidyNode::getParent**(): [?](#language.types.null)[tidyNode](#class.tidynode)

Devuelve el nodo padre del nodo actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [tidyNode](#class.tidynode) si el nodo tiene un padre, o **[null](#constant.null)**
en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con tidyNode::getParent()**

&lt;?php

$html = &lt;&lt;&lt; HTML
&lt;html&gt;&lt;head&gt;
&lt;?php echo '&lt;title&gt;title&lt;/title&gt;'; ?&gt;
&lt;#
/_ code JSTE _/
alert('Hello World');
#&gt;
&lt;/head&gt;
&lt;body&gt;
Hello World
&lt;/body&gt;
&lt;/html&gt;

HTML;

$tidy = tidy_parse_string($html);
$num = 0;

$node = $tidy-&gt;html()-&gt;child[0]-&gt;child[0];

var_dump($node-&gt;getParent()-&gt;name);
?&gt;

    El ejemplo anterior mostrará:

string(4) "head"

### Ver también

- [tidyNode::getPreviousSibling()](#tidynode.getprevioussibling) - Devuelve el nodo hermano anterior del nodo actual

- [tidyNode::getNextSibling()](#tidynode.getnextsibling) - Devuelve el nodo hermano siguiente del nodo actual

# tidyNode::getPreviousSibling

(PHP 8 &gt;= 8.4.0)

tidyNode::getPreviousSibling — Devuelve el nodo hermano anterior del nodo actual

### Descripción

public **tidyNode::getPreviousSibling**(): [?](#language.types.null)[tidyNode](#class.tidynode)

Devuelve el nodo hermano anterior del nodo actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [tidyNode](#class.tidynode) si el nodo tiene un hermano anterior, o **[null](#constant.null)**
de lo contrario.

### Ejemplos

**Ejemplo #1 Ejemplo de tidyNode::getPreviousSibling()**

&lt;?php

$html = &lt;&lt;&lt; HTML
&lt;html&gt;
&lt;head&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;Hello&lt;/p&gt;&lt;p&gt;World&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;

HTML;

$tidy = tidy_parse_string($html);

$node = $tidy-&gt;body();
var_dump($node-&gt;child[1]-&gt;getPreviousSibling()-&gt;value);

?&gt;

El ejemplo anterior mostrará:

string(13) "&lt;p&gt;Hello&lt;/p&gt;
"

### Ver también

- [tidyNode::getParent()](#tidynode.getparent) - Devuelve el nodo padre del nodo actual

- [tidyNode::getNextSibling()](#tidynode.getnextsibling) - Devuelve el nodo hermano siguiente del nodo actual

# tidyNode::hasChildren

(PHP 5, PHP 7, PHP 8)

tidyNode::hasChildren — Indica si un nodo tiene hijos

### Descripción

public **tidyNode::hasChildren**(): [bool](#language.types.boolean)

Indica si el nodo tiene hijos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el nodo tiene hijos, **[false](#constant.false)** de lo contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo de tidyNode::hasChildren()**

&lt;?php

$html = &lt;&lt;&lt; HTML
&lt;html&gt;&lt;head&gt;
&lt;?php echo '&lt;title&gt;titulo&lt;/title&gt;'; ?&gt;
&lt;#
/_ código JSTE _/
alert('Hola Mundo');
#&gt;
&lt;/head&gt;
&lt;body&gt;

&lt;?php
// código PHP
echo 'Hola Mundo!';
?&gt;

&lt;%
/_ código ASP _/
response.write("Hola Mundo!")
%&gt;

&lt;!-- Comentarios --&gt;
Hola Mundo
&lt;/body&gt;&lt;/html&gt;
Fuera del HTML
HTML;

$tidy = tidy_parse_string($html);
$num = 0;

// La etiqueta HEAD
var_dump($tidy-&gt;html()-&gt;child[0]-&gt;hasChildren());

// El código PHP dentro de la etiqueta HEAD
var_dump($tidy-&gt;html()-&gt;child[0]-&gt;child[0]-&gt;hasChildren());

?&gt;

    El ejemplo anterior mostrará:

bool(true)
bool(false)

# tidyNode::hasSiblings

(PHP 5, PHP 7, PHP 8)

tidyNode::hasSiblings — Indica si un nodo tiene hermanos

### Descripción

public **tidyNode::hasSiblings**(): [bool](#language.types.boolean)

Indica si un nodo tiene hermanos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si un nodo tiene hermanos, **[false](#constant.false)** de lo contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo de tidyNode::hasSiblings()**

&lt;?php

$html = &lt;&lt;&lt; HTML
&lt;html&gt;&lt;head&gt;
&lt;?php echo '&lt;title&gt;titulo&lt;/title&gt;'; ?&gt;
&lt;#
/_ código JSTE _/
alert('Hola Mundo');
#&gt;
&lt;/head&gt;
&lt;body&gt;

&lt;?php
// código PHP
echo 'Hola Mundo!';
?&gt;

&lt;%
/_ código ASP _/
response.write("Hola Mundo!")
%&gt;

&lt;!-- Comentarios --&gt;
Hola Mundo
&lt;/body&gt;&lt;/html&gt;
Fuera del HTML
HTML;

$tidy = tidy_parse_string($html);
$num = 0;

// La etiqueta HTML
var_dump($tidy-&gt;html()-&gt;hasSiblings());

// La etiqueta HEAD
var_dump($tidy-&gt;html()-&gt;child[0]-&gt;hasSiblings());

?&gt;

    El ejemplo anterior mostrará:

bool(false)
bool(true)

# tidyNode::isAsp

(PHP 5, PHP 7, PHP 8)

tidyNode::isAsp — Comprueba si el nodo es ASP

### Descripción

public **tidyNode::isAsp**(): [bool](#language.types.boolean)

Indica cuando el nodo actual es ASP.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el nodo es código ASP, **[false](#constant.false)** de lo contrario.

### Ejemplos

    **Ejemplo #1 Extraer el código ASP embebido en un documento HTML**

&lt;?php

$html = &lt;&lt;&lt; HTML
&lt;html&gt;&lt;head&gt;
&lt;?php echo '&lt;title&gt;titulo&lt;/title&gt;'; ?&gt;
&lt;#
/_ código JSTE _/
alert('Hola Mundo');
#&gt;
&lt;/head&gt;
&lt;body&gt;

&lt;?php
// código PHP
echo 'Hola Mundo!';
?&gt;

&lt;%
/_ código ASP _/
response.write("Hola Mundo!")
%&gt;

&lt;!-- Comentarios --&gt;
Hola Mundo
&lt;/body&gt;&lt;/html&gt;
Fuera del HTML
HTML;

$tidy = tidy_parse_string($html);
$num = 0;

get_nodes($tidy-&gt;html());

function get_nodes($node) {

    // Verifica si el nodo actual es del tipo requerido
    if($node-&gt;isAsp()) {
        echo "\n\n# asp node #" . ++$GLOBALS['num'] . "\n";
        echo $node-&gt;value;
    }

    // Verifica si el nodo actual tiene hijos
    if($node-&gt;hasChildren()) {
        foreach($node-&gt;child as $child) {
            get_nodes($child);
        }
    }

}

?&gt;

    El ejemplo anterior mostrará:

# asp node #1

&lt;%
/_ código ASP _/
response.write("Hola Mundo!")
%&gt;

# tidyNode::isComment

(PHP 5, PHP 7, PHP 8)

tidyNode::isComment — Comprueba el nodo actual es un comentario

### Descripción

public **tidyNode::isComment**(): [bool](#language.types.boolean)

Indica el nodo actual es un comentario.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el nodo es un comentario, **[false](#constant.false)** de lo contrario.

### Ejemplos

    **Ejemplo #1 Extraer los comentarios de un documento HTML**

&lt;?php

$html = &lt;&lt;&lt; HTML
&lt;html&gt;&lt;head&gt;
&lt;?php echo '&lt;title&gt;titulo&lt;/title&gt;'; ?&gt;
&lt;#
/_ código JSTE _/
alert('Hola Mundo');
#&gt;
&lt;/head&gt;
&lt;body&gt;

&lt;?php
// código PHP
echo 'Hola Mundo!';
?&gt;

&lt;%
/_ código ASP _/
response.write("Hola Mundo!")
%&gt;

&lt;!-- Comentarios --&gt;
Hola Mundo
&lt;/body&gt;&lt;/html&gt;
Fuera del HTML
HTML;

$tidy = tidy_parse_string($html);
$num = 0;

get_nodes($tidy-&gt;html());

function get_nodes($node) {

    // Verifica si el nodo actual es del tipo requerido
    if($node-&gt;isComment()) {
        echo "\n\n# comment node #" . ++$GLOBALS['num'] . "\n";
        echo $node-&gt;value;
    }

    // Verifica si el nodo actual tiene hijos
    if($node-&gt;hasChildren()) {
        foreach($node-&gt;child as $child) {
            get_nodes($child);
        }
    }

}

?&gt;

    El ejemplo anterior mostrará:

# comment node #1

&lt;!-- Comments --&gt;

# tidyNode::isHtml

(PHP 5, PHP 7, PHP 8)

tidyNode::isHtml —
Indica si el nodo es un nodo de elemento

### Descripción

public **tidyNode::isHtml**(): [bool](#language.types.boolean)

Indica si el nodo actual es un nodo de elemento,
pero no el nodo raíz del documento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna **[true](#constant.true)** si el nodo es un nodo de elemento, pero no el nodo raíz
del documento, **[false](#constant.false)** de lo contrario.

### Historial de cambios

      Versión
      Descripción






      7.3.24, 7.4.12

       Esta función fue corregida para tener un comportamiento razonable.
       Anteriormente, la mayoría de los nodos eran reportados como nodos HTML.



### Ejemplos

    **Ejemplo #1 Extracto del código HTML desde un documento mixto**

&lt;?php

$html = &lt;&lt;&lt; HTML
&lt;html&gt;&lt;head&gt;
&lt;?php echo '&lt;title&gt;title&lt;/title&gt;'; ?&gt;
&lt;#
/_ código JSTE _/
alert('Hello World');
#&gt;
&lt;/head&gt;
&lt;body&gt;

&lt;?php
// código PHP
echo 'hello world!';
?&gt;

&lt;%
/_ código ASP _/
response.write("Hello World!")
%&gt;

&lt;!-- Comentarios --&gt;
Hello World
&lt;/body&gt;&lt;/html&gt;
Fuera de HTML
HTML;

$tidy = tidy_parse_string($html);
$num = 0;

get_nodes($tidy-&gt;html());

function get_nodes($node) {
    // Verifica si el nodo actual es del tipo demandado
    if($node-&gt;{isHtml()) {
echo "\n\n# Nodo Html #" . ++$GLOBALS['num'] . "\n";
echo $node-&gt;value;
}

    // Verifica si el nodo actual tiene hijos
    if($node-&gt;hasChildren()) {
        foreach($node-&gt;child as $child) {
            get_nodes($child);
        }
    }

}

?&gt;

    El ejemplo anterior mostrará:

# Nodo html #1

&lt;html&gt;
&lt;head&gt;
&lt;?php echo '&lt;title&gt;title&lt;/title&gt;'; ?&gt;&lt;#
/_ código JSTE _/
alert('Hello World');
#&gt;
&lt;title&gt;&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;?php
// código PHP
echo 'hello world!';
?&gt;&lt;%
/_ código ASP _/
response.write("Hello World!")
%&gt;&lt;!-- Comentarios --&gt;
Hello WorldFuera de HTML
&lt;/body&gt;
&lt;/html&gt;

# Nodo html #2

&lt;head&gt;
&lt;?php echo '&lt;title&gt;title&lt;/title&gt;'; ?&gt;&lt;#
/_ código JSTE _/
alert('Hello World');
#&gt;
&lt;title&gt;&lt;/title&gt;
&lt;/head&gt;

# Nodo html #3

&lt;title&gt;&lt;/title&gt;

# Nodo html #4

&lt;body&gt;
&lt;?php
// código PHP
echo 'hello world!';
?&gt;&lt;%
/_ código ASP _/
response.write("Hello World!")
%&gt;&lt;!-- Comentarios --&gt;
Hello WorldFuera de HTML
&lt;/body&gt;

# tidyNode::isJste

(PHP 5, PHP 7, PHP 8)

tidyNode::isJste — Comprueba si el nodo es JSTE

### Descripción

public **tidyNode::isJste**(): [bool](#language.types.boolean)

Indica si el nodo es JSTE.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el nodo es código JSTE, **[false](#constant.false)** de lo contrario.

### Ejemplos

    **Ejemplo #1 Extrer el código JSTE de un documento HTML**

&lt;?php

$html = &lt;&lt;&lt; HTML
&lt;html&gt;&lt;head&gt;
&lt;?php echo '&lt;title&gt;titulo&lt;/title&gt;'; ?&gt;
&lt;#
/_ código JSTE _/
alert('Hola Mundo');
#&gt;
&lt;/head&gt;
&lt;body&gt;

&lt;?php
// código PHP
echo 'hola mundo!';
?&gt;

&lt;%
/_ código ASP _/
response.write("Hola Mundo!")
%&gt;

&lt;!-- Comentarios --&gt;
Hola Mundo
&lt;/body&gt;&lt;/html&gt;
Fuera del HTML
HTML;

$tidy = tidy_parse_string($html);
$num = 0;

get_nodes($tidy-&gt;html());

function get_nodes($node) {

    // Verifica si el nodo actual es del tipo requerido
    if($node-&gt;isJste()) {
        echo "\n\n# jste node #" . ++$GLOBALS['num'] . "\n";
        echo $node-&gt;value;
    }

    // Verifica si el nodo actual tiene hijos
    if($node-&gt;hasChildren()) {
        foreach($node-&gt;child as $child) {
            get_nodes($child);
        }
    }

}

?&gt;

    El ejemplo anterior mostrará:

# jste node #1

&lt;#
/_ código JSTE _/
alert('Hola Mundo');
#&gt;

/_
var_dump($tidy-&gt;html()-&gt;child[0]-&gt;hasChildren());
var_dump($tidy-&gt;html()-&gt;child[0]-&gt;child[0]-&gt;hasChildren());
_/

# tidyNode::isPhp

(PHP 5, PHP 7, PHP 8)

tidyNode::isPhp — Comprueba si el nodo es PHP

### Descripción

public **tidyNode::isPhp**(): [bool](#language.types.boolean)

Indica cuando el nodo actual es PHP.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el nodo es código PHP, **[false](#constant.false)** de lo contrario.

### Ejemplos

    **Ejemplo #1 Extraer el código PHP embebido en un documento HTML**

&lt;?php

$html = &lt;&lt;&lt; HTML
&lt;html&gt;&lt;head&gt;
&lt;?php echo '&lt;title&gt;titulo&lt;/title&gt;'; ?&gt;
&lt;#
/_ código JSTE _/
alert('Hola Mundo');
#&gt;
&lt;/head&gt;
&lt;body&gt;

&lt;?php
// código PHP
echo 'hola mundo!';
?&gt;

&lt;%
/_ código ASP _/
response.write("Hola Mundo!")
%&gt;

&lt;!-- Comentarios --&gt;
Hola Mundo
&lt;/body&gt;&lt;/html&gt;
Fuera del HTML
HTML;

$tidy = tidy_parse_string($html);
$num = 0;

get_nodes($tidy-&gt;html());

function get_nodes($node) {

    // Verifica si el nodo actual es del tipo requerido
    if($node-&gt;isPhp()) {
        echo "\n\n# php node #" . ++$GLOBALS['num'] . "\n";
        echo $node-&gt;value;
    }

    // Verifica si el nodo actual tiene hijos
    if($node-&gt;hasChildren()) {
        foreach($node-&gt;child as $child) {
            get_nodes($child);
        }
    }

}

?&gt;

    El ejemplo anterior mostrará:

# php node #1

&lt;?php echo '&lt;title&gt;titulo&lt;/title&gt;'; ?&gt;

# php node #2

&lt;?php
// código PHP
echo 'hola mundo!';
?&gt;

# tidyNode::isText

(PHP 5, PHP 7, PHP 8)

tidyNode::isText — Comprueba si un nodo representa un texto (no HTML)

### Descripción

public **tidyNode::isText**(): [bool](#language.types.boolean)

Indica si un nodo representa sólo texto (sin nada de HTML).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si un nodo representa un texto, **[false](#constant.false)** de lo contrario.

### Ejemplos

    **Ejemplo #1 Extraer el texto de un documento HTML**

&lt;?php

$html = &lt;&lt;&lt; HTML
&lt;html&gt;&lt;head&gt;
&lt;?php echo '&lt;title&gt;titulo&lt;/title&gt;'; ?&gt;
&lt;#
/_ código JSTE _/
alert('Hola Mundo');
#&gt;
&lt;/head&gt;
&lt;body&gt;

&lt;?php
// código PHP
echo 'hola mundo!';
?&gt;

&lt;%
/_ código ASP _/
response.write("Hola Mundo!")
%&gt;

&lt;!-- Comentarios --&gt;
Hola Mundo
&lt;/body&gt;&lt;/html&gt;
Fuera del HTML
HTML;

$tidy = tidy_parse_string($html);
$num = 0;

get_nodes($tidy-&gt;html());

function get_nodes($node) {

    // Verifica si el nodo actual es del tipo requerido
    if($node-&gt;isText()) {
        echo "\n\n# text node #" . ++$GLOBALS['num'] . "\n";
        echo $node-&gt;value;
    }

    // Verifica si el nodo actual tiene hijos
    if($node-&gt;hasChildren()) {
        foreach($node-&gt;child as $child) {
            get_nodes($child);
        }
    }

}

?&gt;

    El ejemplo anterior mostrará:

# text node #1

Hola Mundo

# text node #2

Fuera del HTML

## Tabla de contenidos

- [tidyNode::\_\_construct](#tidynode.construct) — Constructor privado para prohibir la instanciación directa
- [tidyNode::getNextSibling](#tidynode.getnextsibling) — Devuelve el nodo hermano siguiente del nodo actual
- [tidyNode::getParent](#tidynode.getparent) — Devuelve el nodo padre del nodo actual
- [tidyNode::getPreviousSibling](#tidynode.getprevioussibling) — Devuelve el nodo hermano anterior del nodo actual
- [tidyNode::hasChildren](#tidynode.haschildren) — Indica si un nodo tiene hijos
- [tidyNode::hasSiblings](#tidynode.hassiblings) — Indica si un nodo tiene hermanos
- [tidyNode::isAsp](#tidynode.isasp) — Comprueba si el nodo es ASP
- [tidyNode::isComment](#tidynode.iscomment) — Comprueba el nodo actual es un comentario
- [tidyNode::isHtml](#tidynode.ishtml) — Indica si el nodo es un nodo de elemento
- [tidyNode::isJste](#tidynode.isjste) — Comprueba si el nodo es JSTE
- [tidyNode::isPhp](#tidynode.isphp) — Comprueba si el nodo es PHP
- [tidyNode::isText](#tidynode.istext) — Comprueba si un nodo representa un texto (no HTML)

# Funciones de Tidy

# ob_tidyhandler

(PHP 5, PHP 7, PHP 8)

ob_tidyhandler — Función callback de ob_start para reparar el buffer

### Descripción

**ob_tidyhandler**([string](#language.types.string) $input, [int](#language.types.integer) $mode = ?): [string](#language.types.string)

Función callback para la función [ob_start()](#function.ob-start) con el fin de reparar el buffer.

### Parámetros

     input


       EL buffer.






     mode


       El modo del buffer.





### Valores devueltos

Devuelve el buffer modificado.

### Ejemplos

    **Ejemplo #1 Ejemplo de ob_tidyhandler()**

&lt;?php
ob_start('ob_tidyhandler');

echo '&lt;p&gt;test&lt;/i&gt;';
?&gt;

    El ejemplo anterior mostrará:

&lt;!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN"&gt;
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;test&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;

### Ver también

    - [ob_start()](#function.ob-start) - Activa el temporizador de salida

# tidy_access_count

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy_access_count — Devuelve el número de alertas de accesibilidad Tidy encontradas en un documento dado

### Descripción

**tidy_access_count**([tidy](#class.tidy) $tidy): [int](#language.types.integer)

**tidy_access_count()** devuelve el número
de alertas de accesibilidad encontradas en un documento específico.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Devuelve el número de alertas.

### Ejemplos

    **Ejemplo #1 Ejemplo de la función tidy_access_count()**

&lt;?php

$html ='&lt;!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN"&gt;
&lt;html&gt;&lt;head&gt;&lt;title&gt;Title&lt;/title&gt;&lt;/head&gt;
&lt;body&gt;

&lt;p&gt;&lt;img src="img.png"&gt;&lt;/p&gt;

&lt;/body&gt;&lt;/html&gt;';

// Seleccione el nivel de accesibilidad a revisar: 1, 2 o 3
$config = array('accessibility-check' =&gt; 3);

$tidy = new tidy();
$tidy-&gt;parseString($html, $config);
$tidy-&gt;cleanRepair();

/_ No olvide ejecutar esto! _/
$tidy-&gt;diagnose();

echo tidy_access_count($tidy); //5

?&gt;

### Notas

**Nota**:

    Dado el diseño de TidyLib, se debe ejecutar
    [tidy_diagnose()](#tidy.diagnose) antes de
    **tidy_access_count()** o siempre devolverá
    0. También se necesita habilitar la opción
    accessibility-check.

### Ver también

    - [tidy_error_count()](#function.tidy-error-count) - Devuelve el número de errores Tidy encontrados en un documento dado

    - [tidy_warning_count()](#function.tidy-warning-count) - Devuelve el número de alertas encontradas en un documendo dado

# tidy_config_count

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy_config_count — Devuelve el número de errores de configuración Tidy encontrados en un documento dado

### Descripción

**tidy_config_count**([tidy](#class.tidy) $tidy): [int](#language.types.integer)

Devuelve el número de errores encontrados en la configuración del
objeto tidy tidy especificado.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Devuelve el número de errores.

### Ejemplos

    **Ejemplo #1 Ejemplo de la función tidy_config_count()**

&lt;?php
$html = '&lt;p&gt;test&lt;/I&gt;';

$config = array('doctype' =&gt; 'bogus');

$tidy = tidy_parse_string($html, $config);

/_ Saldrá 1, porque 'bogus' no es un doctype válido _/
echo tidy_config_count($tidy);
?&gt;

# tidy_error_count

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy_error_count — Devuelve el número de errores Tidy encontrados en un documento dado

### Descripción

**tidy_error_count**([tidy](#class.tidy) $tidy): [int](#language.types.integer)

Devuelve el número de errores Tidy encontrados en un documento específico.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Devuelve el número de errores.

### Ejemplos

    **Ejemplo #1 Ejemplo de la función tidy_error_count()**

&lt;?php
$html = '&lt;p&gt;test&lt;/i&gt;
&lt;bogustag&gt;bogus&lt;/bogustag&gt;';

$tidy = tidy_parse_string($html);

echo tidy_error_count($tidy) . "\n"; //1

echo $tidy-&gt;errorBuffer;
?&gt;

    El ejemplo anterior mostrará:

1
line 1 column 1 - Warning: missing &lt;!DOCTYPE&gt; declaration
line 1 column 8 - Warning: discarding unexpected &lt;/i&gt;
line 2 column 1 - Error: &lt;bogustag&gt; is not recognized!
line 2 column 1 - Warning: discarding unexpected &lt;bogustag&gt;
line 2 column 16 - Warning: discarding unexpected &lt;/bogustag&gt;
line 1 column 1 - Warning: inserting missing 'title' element

### Ver también

- [tidy_access_count()](#function.tidy-access-count) - Devuelve el número de alertas de accesibilidad Tidy encontradas en un documento dado

- [tidy_warning_count()](#function.tidy-warning-count) - Devuelve el número de alertas encontradas en un documendo dado

# tidy_get_output

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy_get_output — Devuelve una cadena que contiene las etiquetas analizadas por Tidy

### Descripción

**tidy_get_output**([tidy](#class.tidy) $tidy): [string](#language.types.string)

Devuelve una cadena con el HTML reparado.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Devuelve las etiquetas analizadas por tidy

### Ejemplos

    **Ejemplo #1 Ejemplo de la función tidy_get_output()**

&lt;?php

$html = '&lt;p&gt;paragraph&lt;/i&gt;';
$tidy = tidy_parse_string($html);

$tidy-&gt;cleanRepair();

echo tidy_get_output($tidy);
?&gt;

    El ejemplo anterior mostrará:

&lt;!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN"&gt;
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
&lt;p&gt;paragraph&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;

# tidy_warning_count

(PHP 5, PHP 7, PHP 8, PECL tidy &gt;= 0.5.2)

tidy_warning_count — Devuelve el número de alertas encontradas en un documendo dado

### Descripción

**tidy_warning_count**([tidy](#class.tidy) $tidy): [int](#language.types.integer)

Devuelve el número de alertas Tidy encontradas en un documento específicado.

### Parámetros

     tidy


       El objeto [Tidy](#class.tidy)





### Valores devueltos

Devuelve el número de alertas.

### Ejemplos

    **Ejemplo #1 Ejemplo de la función tidy_warning_count()**

&lt;?php
$html = '&lt;p&gt;test&lt;/i&gt;
&lt;bogustag&gt;bogus&lt;/bogustag&gt;';

$tidy = tidy_parse_string($html);

echo tidy_error_count($tidy) . "\n"; //1
echo tidy_warning_count($tidy) . "\n"; //5
?&gt;

### Ver también

    - [tidy_error_count()](#function.tidy-error-count) - Devuelve el número de errores Tidy encontrados en un documento dado

    - [tidy_access_count()](#function.tidy-access-count) - Devuelve el número de alertas de accesibilidad Tidy encontradas en un documento dado

## Tabla de contenidos

- [ob_tidyhandler](#function.ob-tidyhandler) — Función callback de ob_start para reparar el buffer
- [tidy_access_count](#function.tidy-access-count) — Devuelve el número de alertas de accesibilidad Tidy encontradas en un documento dado
- [tidy_config_count](#function.tidy-config-count) — Devuelve el número de errores de configuración Tidy encontrados en un documento dado
- [tidy_error_count](#function.tidy-error-count) — Devuelve el número de errores Tidy encontrados en un documento dado
- [tidy_get_output](#function.tidy-get-output) — Devuelve una cadena que contiene las etiquetas analizadas por Tidy
- [tidy_warning_count](#function.tidy-warning-count) — Devuelve el número de alertas encontradas en un documendo dado

- [Introducción](#intro.tidy)
- [Instalación/Configuración](#tidy.setup)<li>[Requerimientos](#tidy.requirements)
- [Instalación](#tidy.installation)
- [Configuración en tiempo de ejecución](#tidy.configuration)
  </li>- [Constantes predefinidas](#tidy.constants)
- [Ejemplos](#tidy.examples)<li>[Ejemplos de Tidy](#tidy.examples.basic)
  </li>- [tidy](#class.tidy) — La clase tidy<li>[tidy::body](#tidy.body) — Devuelve un objeto tidyNode empezando con la etiqueta &lt;body&gt;
- [tidy::cleanRepair](#tidy.cleanrepair) — Ejecuta una operación de limpieza y reparación de las etiquetas HTML
- [tidy::\_\_construct](#tidy.construct) — Construye un nuevo objeto tidy
- [tidy::diagnose](#tidy.diagnose) — Ejecuta un diagnóstico sobre documento analizado y reparado
- [tidy::$errorBuffer](#tidy.props.errorbuffer) — Devuelve advertencias y errores que ocurrieron al analizar el documento especificado
- [tidy::getConfig](#tidy.getconfig) — Obtiene la configuración actual de Tidy
- [tidy::getHtmlVer](#tidy.gethtmlver) — Obtiene la versión detectada de HTML en un documento especificado
- [tidy::getOpt](#tidy.getopt) — Devuelve el valor de la opción de configuración especificada para el documento tidy
- [tidy::getOptDoc](#tidy.getoptdoc) — Devuelve la documentación correspondiente a un nombre de opción dado
- [tidy::getRelease](#tidy.getrelease) — Obtiene la fecha de lanzamiento (versión) de la librería Tidy
- [tidy::getStatus](#tidy.getstatus) — Obtiene el status de un documento especificado
- [tidy::head](#tidy.head) — Devuelve un objeto tidyNode empezando con la etiqueta &lt;head&gt;
- [tidy::html](#tidy.html) — Devuelve un objeto tidyNode empezando con la etiqueta &lt;html&gt;
- [tidy::isXhtml](#tidy.isxhtml) — Indica si el documento es XHTML
- [tidy::isXml](#tidy.isxml) — Indica si el documento es XML (no HTML/XHTML)
- [tidy::parseFile](#tidy.parsefile) — Analiza las etiquetas de un fichero o de una URI
- [tidy::parseString](#tidy.parsestring) — Analiza un documento HTML contenido en una string
- [tidy::repairFile](#tidy.repairfile) — Repara un archivo y lo devuelve como una cadena
- [tidy::repairString](#tidy.repairstring) — Repara una cadena HTML usando un archivo de configuración opcional
- [tidy::root](#tidy.root) — Devuelve un objeto tidyNode que representa la raíz del árbol analizado por tidy
  </li>- [tidyNode](#class.tidynode) — La clase tidyNode<li>[tidyNode::__construct](#tidynode.construct) — Constructor privado para prohibir la instanciación directa
- [tidyNode::getNextSibling](#tidynode.getnextsibling) — Devuelve el nodo hermano siguiente del nodo actual
- [tidyNode::getParent](#tidynode.getparent) — Devuelve el nodo padre del nodo actual
- [tidyNode::getPreviousSibling](#tidynode.getprevioussibling) — Devuelve el nodo hermano anterior del nodo actual
- [tidyNode::hasChildren](#tidynode.haschildren) — Indica si un nodo tiene hijos
- [tidyNode::hasSiblings](#tidynode.hassiblings) — Indica si un nodo tiene hermanos
- [tidyNode::isAsp](#tidynode.isasp) — Comprueba si el nodo es ASP
- [tidyNode::isComment](#tidynode.iscomment) — Comprueba el nodo actual es un comentario
- [tidyNode::isHtml](#tidynode.ishtml) — Indica si el nodo es un nodo de elemento
- [tidyNode::isJste](#tidynode.isjste) — Comprueba si el nodo es JSTE
- [tidyNode::isPhp](#tidynode.isphp) — Comprueba si el nodo es PHP
- [tidyNode::isText](#tidynode.istext) — Comprueba si un nodo representa un texto (no HTML)
  </li>- [Funciones de Tidy](#ref.tidy)<li>[ob_tidyhandler](#function.ob-tidyhandler) — Función callback de ob_start para reparar el buffer
- [tidy_access_count](#function.tidy-access-count) — Devuelve el número de alertas de accesibilidad Tidy encontradas en un documento dado
- [tidy_config_count](#function.tidy-config-count) — Devuelve el número de errores de configuración Tidy encontrados en un documento dado
- [tidy_error_count](#function.tidy-error-count) — Devuelve el número de errores Tidy encontrados en un documento dado
- [tidy_get_output](#function.tidy-get-output) — Devuelve una cadena que contiene las etiquetas analizadas por Tidy
- [tidy_warning_count](#function.tidy-warning-count) — Devuelve el número de alertas encontradas en un documendo dado
  </li>
