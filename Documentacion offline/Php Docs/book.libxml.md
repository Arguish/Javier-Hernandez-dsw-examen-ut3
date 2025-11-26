# libxml

# Introducción

Estas funciones y constantes están disponibles desde PHP 5.1.0 y si se
ha compilado PHP con las extensiones basadas en libxml, es decir,
[DOM](#book.dom),
[libxml](#book.libxml),
[SimpleXML](#book.simplexml),
[SOAP](#book.soap),
[WDDX](#book.wddx),
[XSL](#book.xsl),
[XML](#book.xml),
[XMLReader](#book.xmlreader),
[XMLRPC](#book.xmlrpc) y
[XMLWriter](#book.xmlwriter).

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#libxml.requirements)
- [Instalación para las versiones de PHP &gt;= 7.4](#libxml.installation)
- [Instalación para las versiones de PHP &lt; 7.4](#libxml.installation_old)

    ## Requerimientos

    Esta extensión requiere [» libxml](https://gitlab.gnome.org/GNOME/libxml2/-/wikis/home) &gt;=
    2.9.4 a partir de PHP 8.4.0, libxml &gt;= 2.9.0 a partir de PHP 8.0.0. Anterior a PHP 8.0, libxml debe ser &gt;= 2.6.0.

    ## Instalación para las versiones de PHP &gt;= 7.4

    La extensión libxml está activada por omisión, aunque puede ser desactivada con
    la opción **--without-libxml**.

    PHP utiliza pkg-config para seleccionar el archivo de biblioteca correcto, los archivos de encabezado
    y los indicadores de compilación a utilizar para libxml2.
    Para asegurarse de que la versión deseada de libxml2 sea seleccionada,
    la variable de entorno PKG_CONFIG_PATH puede
    ser utilizada para controlar el camino de búsqueda de pkg-config antes de ejecutar el script de configuración :

PKG_CONFIG_PATH="/ruta/hacia/prefijo/libxml2/lib/pkgconfig:/lib/pkgconfig"

## Instalación para las versiones de PHP &lt; 7.4

La extensión libxml está activada por omisión, y puede ser desactivada con la opción
**--disable-libxml**.

La directiva opcional **--with-libxml-dir**
se utiliza para especificar la carpeta donde libxml
se encuentra en el sistema donde PHP es compilado. En caso de no utilizar
esta opción, las carpetas por omisión serán analizadas. El proceso
configure verifica las carpetas donde se encuentra libxml
(específicamente, xml2-config), en este orden :

- La carpeta ([DIR]) especificada con la opción
  **--with-libxml-dir**
  ([DIR]=/bin/xml2-config)

- /usr/local/bin/xml2-config

- /usr/bin/xml2-config

Si el proceso configure no puede encontrar el archivo
xml2-config en la carpeta especificada por
la opción **--with-libxml-dir**, entonces, continuará
y analizará las carpetas por omisión.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[LIBXML_BIGLINES](#constant.libxml-biglines)**
    ([int](#language.types.integer))



     Permite señalar correctamente los números de línea superiores a 65535.

    **Nota**:



      Disponible únicamente en PHP 7.0.0 con Libxml &gt;= 2.9.0








    **[LIBXML_COMPACT](#constant.libxml-compact)**
    ([int](#language.types.integer))



     Activa la optimización de la asignación de pequeños nodos. Esto podría
     aumentar la rapidez de la aplicación sin necesidad de modificar
     el código.

    **Nota**:



      Disponible únicamente en Libxml &gt;= 2.6.21








    **[LIBXML_DTDATTR](#constant.libxml-dtdattr)**
    ([int](#language.types.integer))



     Atributo DTD por defecto

    **Precaución**

      Activar la carga de atributos DTD permitirá la recuperación de entidades externas.
      La constante **[LIBXML_NO_XXE](#constant.libxml-no-xxe)** puede ser utilizada para evitar esto (disponible únicamente en Libxml &gt;= 2.13.0, a partir de PHP 8.4.0).








    **[LIBXML_DTDLOAD](#constant.libxml-dtdload)**
    ([int](#language.types.integer))



     Carga el subconjunto externo

    **Precaución**

      Activar la carga de subconjuntos externos permitirá la recuperación de entidades externas.
      La constante **[LIBXML_NO_XXE](#constant.libxml-no-xxe)** puede ser utilizada para evitar esto (disponible únicamente en Libxml &gt;= 2.13.0, a partir de PHP 8.4.0).








    **[LIBXML_DTDVALID](#constant.libxml-dtdvalid)**
    ([int](#language.types.integer))



     Valida con la DTD

    **Precaución**

      Activar la validación de DTD puede facilitar ataques por entidades externas XML (XXE).
      La constante **[LIBXML_NO_XXE](#constant.libxml-no-xxe)** puede ser utilizada para evitar esto (disponible únicamente en Libxml &gt;= 2.13.0, a partir de PHP 8.4.0).








    **[LIBXML_HTML_NOIMPLIED](#constant.libxml-html-noimplied)**
    ([int](#language.types.integer))



     Define el flag HTML_PARSE_NOIMPLIED, que desactiva la adición automática
     de elementos html/body...

    **Nota**:



      Disponible únicamente en Libxml &gt;= 2.7.7 (desde PHP &gt;= 5.4.0)








    **[LIBXML_HTML_NODEFDTD](#constant.libxml-html-nodefdtd)**
    ([int](#language.types.integer))



     Define el flag HTML_PARSE_NODEFDTD, que impide la adición automática
     de un doctype si no se encuentra ninguno.

    **Nota**:



      Disponible únicamente en Libxml &gt;= 2.7.8 (desde PHP &gt;= 5.4.0)








    **[LIBXML_LOADED_VERSION](#constant.libxml-loaded-version)**
    ([string](#language.types.string))



     Versión del módulo principal del analizador libxml.





    **[LIBXML_NOBLANKS](#constant.libxml-noblanks)**
    ([int](#language.types.integer))



     Eliminación de nodos vacíos





    **[LIBXML_NOCDATA](#constant.libxml-nocdata)**
    ([int](#language.types.integer))



     Fusión de CDATA en nodos de texto





    **[LIBXML_NOEMPTYTAG](#constant.libxml-noemptytag)**
    ([int](#language.types.integer))



     Expande las etiquetas vacías (por ejemplo, &lt;br/&gt; en
     &lt;br&gt;&lt;/br&gt;)

    **Nota**:



      Esta opción está actualmente disponible únicamente con las funciones
      [DOMDocument::save](#domdocument.save) y
      [DOMDocument::saveXML](#domdocument.savexml).








    **[LIBXML_NOENT](#constant.libxml-noent)**
    ([int](#language.types.integer))



     Sustitución de entidades

    **Precaución**

      Activar la sustitución de entidades puede facilitar ataques XML
      External Entity (XXE).








    **[LIBXML_NOERROR](#constant.libxml-noerror)**
    ([int](#language.types.integer))



     Supresión de informes de error





    **[LIBXML_NONET](#constant.libxml-nonet)**
    ([int](#language.types.integer))



     Desactivación de la red durante la carga de documentos





    **[LIBXML_NOWARNING](#constant.libxml-nowarning)**
    ([int](#language.types.integer))



     Supresión de informes de advertencia





    **[LIBXML_NOXMLDECL](#constant.libxml-noxmldecl)**
    ([int](#language.types.integer))



     Anula la declaración XML durante la guardado del documento

    **Nota**:



      Disponible únicamente en Libxml &gt;= 2.6.21








    **[LIBXML_NO_XXE](#constant.libxml-no-xxe)**
    ([int](#language.types.integer))



     Desactiva las entidades externas XML (XXE) durante la sustitución de entidades

    **Nota**:



      Disponible únicamente en Libxml &gt;= 2.13.0, a partir de PHP 8.4.0








    **[LIBXML_NSCLEAN](#constant.libxml-nsclean)**
    ([int](#language.types.integer))



     Eliminación de espacios de nombres redundantes





    **[LIBXML_PARSEHUGE](#constant.libxml-parsehuge)**
    ([int](#language.types.integer))



     Afecta al flag XML_PARSE_HUGE. Desactiva cualquier límite del
     analizador codificado en el código. Esto afecta a límites como la
     profundidad máxima de un documento o la recursión de entidades, pero también
     a los límites del tamaño del texto de los nodos.

    **Nota**:



      Disponible únicamente desde Libxml &gt;= 2.7.0 (desde PHP
      &gt;= 5.3.2 y PHP &gt;= 5.2.12)








    **[LIBXML_PEDANTIC](#constant.libxml-pedantic)**
    ([int](#language.types.integer))



     Define el flag XML_PARSE_PEDANTIC, que activa el informe de error
     pedantic.

    **Nota**:



      Disponible a partir de PHP &gt;= 5.4.0








    **[LIBXML_RECOVER](#constant.libxml-recover)**
    ([int](#language.types.integer))



     Activa el modo de recuperación durante el análisis de un documento.

    **Nota**:



      Disponible únicamente a partir de PHP 8.4.0








    **[LIBXML_XINCLUDE](#constant.libxml-xinclude)**
    ([int](#language.types.integer))



     Implementación de la sustitución XInclude





    **[LIBXML_ERR_ERROR](#constant.libxml-err-error)**
    ([int](#language.types.integer))



     Error no fatal





    **[LIBXML_ERR_FATAL](#constant.libxml-err-fatal)**
    ([int](#language.types.integer))



     Error fatal





    **[LIBXML_ERR_NONE](#constant.libxml-err-none)**
    ([int](#language.types.integer))



     Ningún error





    **[LIBXML_ERR_WARNING](#constant.libxml-err-warning)**
    ([int](#language.types.integer))



     Una advertencia simple





    **[LIBXML_VERSION](#constant.libxml-version)**
    ([int](#language.types.integer))



     Versión de libxml en formato 20605 o 20617





    **[LIBXML_DOTTED_VERSION](#constant.libxml-dotted-version)**
    ([string](#language.types.string))



     Versión de libxml en formato 2.6.5 o 2.6.17





    **[LIBXML_SCHEMA_CREATE](#constant.libxml-schema-create)**
    ([int](#language.types.integer))



     Crea el valor por defecto/fijo del nodo durante la validación
     del esquema XSD

    **Nota**:



      Disponible únicamente en Libxml &gt;= 2.6.14 (a partir de PHP &gt;= 5.5.2)


# La clase LibXMLError

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    Contiene diversas informaciones sobre los errores emitidos por la
    biblioteca libxml. Los códigos de error son descritos en la
    [» documentación oficial de la API xmlError](https://gnome.pages.gitlab.gnome.org/libxml2/devhelp/libxml2-xmlerror.html).

## Sinopsis de la Clase

     class **LibXMLError**
     {

    /* Propiedades */

     public
     [int](#language.types.integer)
      [$level](#libxmlerror.props.level);

    public
     [int](#language.types.integer)
      [$code](#libxmlerror.props.code);

    public
     [int](#language.types.integer)
      [$column](#libxmlerror.props.column);

    public
     [string](#language.types.string)
      [$message](#libxmlerror.props.message);

    public
     [string](#language.types.string)
      [$file](#libxmlerror.props.file);

    public
     [int](#language.types.integer)
      [$line](#libxmlerror.props.line);

}

## Propiedades

     level


       La severidad del error (una de las constantes siguientes :
       **[LIBXML_ERR_WARNING](#constant.libxml-err-warning)**,
       **[LIBXML_ERR_ERROR](#constant.libxml-err-error)** o
       **[LIBXML_ERR_FATAL](#constant.libxml-err-fatal)**)






     code


       El código del error.






     column


       La columna en la cual el error ha ocurrido.



      **Nota**:



        Esta propiedad no está totalmente implementada por la
        biblioteca libxml; por lo tanto, 0 es a menudo
        retornado.







     message


       El mensaje de error, si existe.






     file


       El nombre del fichero, o vacío si el XML ha sido cargado desde una
       cadena.






     line


       La línea desde la cual el error ha ocurrido.





# Funciones de libxml

# libxml_clear_errors

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

libxml_clear_errors —
Vacía el búfer de errores de libxml

### Descripción

**libxml_clear_errors**(): [void](language.types.void.html)

**libxml_clear_errors()** vacía el búfer de errores de libxml.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [libxml_get_errors()](#function.libxml-get-errors) - Lee el array de errores

    - [libxml_get_last_error()](#function.libxml-get-last-error) - Lee el último error de libxml

# libxml_disable_entity_loader

(PHP 5 &gt;= 5.2.11, PHP 7, PHP 8)

libxml_disable_entity_loader — Desactiva la carga de entidades externas

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.0.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**libxml_disable_entity_loader**([bool](#language.types.boolean) $disable = **[true](#constant.true)**): [bool](#language.types.boolean)

Activa o desactiva la carga de entidades externas.
Se debe tener en cuenta que desactivar la carga de entidades externas puede causar
problemas al cargar documentos XML.

A partir de libxml 2.9.0, la sustitución de entidades
está desactivada por defecto, por lo que
no es necesario desactivar la carga de entidades externas,
a menos que sea necesario resolver referencias de entidades internas con
**[LIBXML_NOENT](#constant.libxml-noent)**,
**[LIBXML_DTDVALID](#constant.libxml-dtdvalid)**, o **[LIBXML_DTDLOAD](#constant.libxml-dtdload)**.
Generalmente, es preferible utilizar [libxml_set_external_entity_loader()](#function.libxml-set-external-entity-loader)
para suprimir la carga de entidades externas.
La constante **[LIBXML_NO_XXE](#constant.libxml-no-xxe)** también puede ser utilizada para evitar esto (disponible únicamente en Libxml &gt;= 2.13.0, a partir de PHP 8.4.0).

### Parámetros

     disable


       Desactiva (**[true](#constant.true)**) o activa (**[false](#constant.false)**) la carga de entidades
       externas por las extensiones libxml (tales
       como [DOM](#book.dom), [XMLWriter](#book.xmlwriter)
       y [XMLReader](#book.xmlreader)).





### Valores devueltos

Devuelve la configuración anterior.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ha sido deprecada.



### Ver también

    - [libxml_use_internal_errors()](#function.libxml-use-internal-errors) - Se desactiva el reporte de errores de libxml y se almacenan para su lectura posterior

    - [libxml_set_external_entity_loader()](#function.libxml-set-external-entity-loader) - Cambia el cargador de entidades externas por defecto

    - La constante **[LIBXML_NOENT](#constant.libxml-noent)**

    - La constante **[LIBXML_DTDVALID](#constant.libxml-dtdvalid)**

    - La constante **[LIBXML_NO_XXE](#constant.libxml-no-xxe)**

# libxml_get_errors

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

libxml_get_errors —
Lee el array de errores

### Descripción

**libxml_get_errors**(): [array](#language.types.array)

Devuelve un array de errores.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**libxml_get_errors()** devuelve un array con
los objetos [LibXMLError](#class.libxmlerror) que representan los errores,
o bien un array vacío si no hay errores.

### Ejemplos

    **Ejemplo #1 Ejemplo con libxml_get_errors()**



     Este ejemplo muestra cómo crear un gestor de errores libxml
     simple.

&lt;?php

libxml_use_internal_errors(true);

$xmlstr = &lt;&lt;&lt; XML
&lt;?xml version='1.0' standalone='yes'?&gt;
&lt;movies&gt;
&lt;movie&gt;
&lt;titles&gt;PHP: Behind the Parser&lt;/title&gt;
&lt;/movie&gt;
&lt;/movies&gt;
XML;

$doc = simplexml_load_string($xmlstr);
$xml = explode("\n", $xmlstr);

if ($doc === false) {
$errors = libxml_get_errors();

    foreach ($errors as $error) {
        echo display_xml_error($error, $xml);
    }

    libxml_clear_errors();

}

function display_xml_error($error, $xml)
{
    $return  = $xml[$error-&gt;line - 1] . "\n";
$return .= str_repeat('-', $error-&gt;column) . "^\n";

    switch ($error-&gt;level) {
        case LIBXML_ERR_WARNING:
            $return .= "Warning $error-&gt;code: ";
            break;
         case LIBXML_ERR_ERROR:
            $return .= "Error $error-&gt;code: ";
            break;
        case LIBXML_ERR_FATAL:
            $return .= "Fatal Error $error-&gt;code: ";
            break;
    }

    $return .= trim($error-&gt;message) .
               "\n  Line: $error-&gt;line" .
               "\n  Column: $error-&gt;column";

    if ($error-&gt;file) {
        $return .= "\n  File: $error-&gt;file";
    }

    return "$return\n\n--------------------------------------------\n\n";

}

?&gt;

    El ejemplo anterior mostrará:

&lt;titles&gt;PHP: Behind the Parser&lt;/title&gt;
----------------------------------------------^
Fatal Error 76: Opening and ending tag mismatch: titles line 4 and title
Line: 4
Column: 46

---

### Ver también

    - [libxml_get_last_error()](#function.libxml-get-last-error) - Lee el último error de libxml

    - [libxml_clear_errors()](#function.libxml-clear-errors) - Vacía el búfer de errores de libxml

# libxml_get_external_entity_loader

(PHP 8 &gt;= 8.2.0)

libxml_get_external_entity_loader — Devuelve el cargador de entidades externas actual

### Descripción

**libxml_get_external_entity_loader**(): [?](#language.types.null)[callable](#language.types.callable)

Devuelve el cargador de entidades externas definido previamente por
[libxml_set_external_entity_loader()](#function.libxml-set-external-entity-loader).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El cargador de entidades externas definido previamente por
[libxml_set_external_entity_loader()](#function.libxml-set-external-entity-loader). Si esta función
nunca ha sido llamada, o si fue llamada con **[null](#constant.null)**, se devolverá **[null](#constant.null)**.

### Ver también

- [libxml_set_external_entity_loader()](#function.libxml-set-external-entity-loader) - Cambia el cargador de entidades externas por defecto

# libxml_get_last_error

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

libxml_get_last_error —
Lee el último error de libxml

### Descripción

**libxml_get_last_error**(): [LibXMLError](#class.libxmlerror)|[false](#language.types.singleton)

**libxml_get_last_error()** lee el último error de libxml.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**libxml_get_last_error()** devuelve un objeto
[LibXMLError](#class.libxmlerror) si hay un error, y
**[false](#constant.false)** en caso contrario.

### Ver también

    - [libxml_get_errors()](#function.libxml-get-errors) - Lee el array de errores

    - [libxml_clear_errors()](#function.libxml-clear-errors) - Vacía el búfer de errores de libxml

# libxml_set_external_entity_loader

(PHP 5 &gt;= 5.4.0, PHP 7, PHP 8)

libxml_set_external_entity_loader — Cambia el cargador de entidades externas por defecto

### Descripción

**libxml_set_external_entity_loader**([?](#language.types.null)[callable](#language.types.callable) $resolver_function): [bool](#language.types.boolean)

Cambia el cargador de entidades externas por defecto.
Esto puede ser utilizado para reprimir la expansión de entidades externas arbitrarias
para prevenir ataques XXE, incluso si **[LIBXML_NOENT](#constant.libxml-noent)** ha
sido definida para la operación respectiva, y esto es generalmente preferible
a llamar a [libxml_disable_entity_loader()](#function.libxml-disable-entity-loader).

### Parámetros

    resolver_function


      Un [callable](#language.types.callable) con la siguiente firma:



       resolver([?](#language.types.null)[string](#language.types.string) $public_id, [string](#language.types.string) $system_id, [array](#language.types.array) $context): [resource](#language.types.resource)|[string](#language.types.string)|[null](#language.types.null)



        public_id


          El ID público.




        system_id


          El ID del sistema.




        context


          Un array que contiene cuatro elementos "directory", "intSubName",
          "extSubURI" y "extSubSystem".




      Esta callable debería devolver un [resource](#language.types.resource), un [string](#language.types.string) a través del cual
      puede abrirse un recurso. Si se devuelve **[null](#constant.null)**, la resolución de referencia de entidad fallará.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Ejemplo con libxml_set_external_entity_loader()**

&lt;?php
$xml = &lt;&lt;&lt;XML
&lt;!DOCTYPE foo PUBLIC "-//FOO/BAR" "http://example.com/foobar"&gt;
&lt;foo&gt;bar&lt;/foo&gt;
XML;

$dtd = &lt;&lt;&lt;DTD
&lt;!ELEMENT foo (#PCDATA)&gt;
DTD;

libxml_set_external_entity_loader(
function ($public, $system, $context) use($dtd) {
var_dump($public);
        var_dump($system);
var_dump($context);
        $f = fopen("php://temp", "r+");
        fwrite($f, $dtd);
        rewind($f);
return $f;
}
);

$dd = new DOMDocument;
$r = $dd-&gt;loadXML($xml);

var_dump($dd-&gt;validate());
?&gt;

    El ejemplo anterior mostrará:

string(10) "-//FOO/BAR"
string(25) "http://example.com/foobar"
array(4) {
["directory"] =&gt; NULL
["intSubName"] =&gt; NULL
["extSubURI"] =&gt; NULL
["extSubSystem"] =&gt; NULL
}
bool(true)

### Ver también

    - [libxml_disable_entity_loader()](#function.libxml-disable-entity-loader) - Desactiva la carga de entidades externas

    - [libxml_get_external_entity_loader()](#function.libxml-get-external-entity-loader) - Devuelve el cargador de entidades externas actual

# libxml_set_streams_context

(PHP 5, PHP 7, PHP 8)

libxml_set_streams_context —
Configura el contexto de flujos para la próxima operación libxml

### Descripción

**libxml_set_streams_context**([resource](#language.types.resource) $context): [void](language.types.void.html)

**libxml_set_streams_context()** configura el contexto de
flujos para la próxima operación libxml.

### Parámetros

     context


        El recurso de contexto de flujos, creado con la función
        [stream_context_create()](#function.stream-context-create).






### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

Genera una [TypeError](#class.typeerror) cuando se pasa un recurso no flujo
al context.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       **libxml_set_streams_context()** genera ahora una
       [TypeError](#class.typeerror) cuando se pasa un recurso no flujo
       al context, en lugar de generarla más tarde cuando
       el contexto es utilizado.



### Ejemplos

    **Ejemplo #1 Ejemplo con libxml_set_streams_context()**

&lt;?php
$opts = [
'http' =&gt; [
'user_agent' =&gt; 'PHP libxml agent',
]
];

$context = stream_context_create($opts);
libxml_set_streams_context($context);

// lee un fichero vía HTTP
$dom = new DOMDocument;
$doc = $dom-&gt;load('http://www.example.com/file.xml');

?&gt;

### Ver también

    - [stream_context_create()](#function.stream-context-create) - Crea un contexto de flujo

# libxml_use_internal_errors

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

libxml_use_internal_errors —
Se desactiva el reporte de errores de libxml y se almacenan para su lectura posterior

### Descripción

**libxml_use_internal_errors**([?](#language.types.null)[bool](#language.types.boolean) $use_errors = **[null](#constant.null)**): [bool](#language.types.boolean)

**libxml_use_internal_errors()** permite desactivar
el gestor de errores estándar de libxml y activar el propio
gestor de errores.

### Parámetros

     use_errors


        Activa (**[true](#constant.true)**) el gestor de errores del usuario
        o lo desactiva (**[false](#constant.false)**). La desactivación borrará también
        todos los errores de libxml existentes.






### Valores devueltos

**libxml_use_internal_errors()** devuelve el valor
previamente configurado para use_errors.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       use_errors ahora es nullable. Anteriormente,
       su valor por omisión era **[false](#constant.false)**.



### Ejemplos

    **Ejemplo #1 Ejemplo con libxml_use_internal_errors()**



     Este ejemplo muestra el uso básico de los errores de libxml, y el valor
     devuelto por esta función.

&lt;?php

// activa la gestión de errores personalizada
var_dump(libxml_use_internal_errors(true));

// Carga del documento
$doc = new DOMDocument;

if (!$doc-&gt;load('file.xml')) {
foreach (libxml_get_errors() as $error) {
// gestionar los errores aquí
}

    libxml_clear_errors();

}

?&gt;

    El ejemplo anterior mostrará:

bool(false)

### Ver también

    - [libxml_clear_errors()](#function.libxml-clear-errors) - Vacía el búfer de errores de libxml

    - [libxml_get_errors()](#function.libxml-get-errors) - Lee el array de errores

## Tabla de contenidos

- [libxml_clear_errors](#function.libxml-clear-errors) — Vacía el búfer de errores de libxml
- [libxml_disable_entity_loader](#function.libxml-disable-entity-loader) — Desactiva la carga de entidades externas
- [libxml_get_errors](#function.libxml-get-errors) — Lee el array de errores
- [libxml_get_external_entity_loader](#function.libxml-get-external-entity-loader) — Devuelve el cargador de entidades externas actual
- [libxml_get_last_error](#function.libxml-get-last-error) — Lee el último error de libxml
- [libxml_set_external_entity_loader](#function.libxml-set-external-entity-loader) — Cambia el cargador de entidades externas por defecto
- [libxml_set_streams_context](#function.libxml-set-streams-context) — Configura el contexto de flujos para la próxima operación libxml
- [libxml_use_internal_errors](#function.libxml-use-internal-errors) — Se desactiva el reporte de errores de libxml y se almacenan para su lectura posterior

- [Introducción](#intro.libxml)
- [Instalación/Configuración](#libxml.setup)<li>[Requerimientos](#libxml.requirements)
- [Instalación para las versiones de PHP &gt;= 7.4](#libxml.installation)
- [Instalación para las versiones de PHP &lt; 7.4](#libxml.installation_old)
  </li>- [Constantes predefinidas](#libxml.constants)
- [LibXMLError](#class.libxmlerror) — La clase LibXMLError
- [Funciones de libxml](#ref.libxml)<li>[libxml_clear_errors](#function.libxml-clear-errors) — Vacía el búfer de errores de libxml
- [libxml_disable_entity_loader](#function.libxml-disable-entity-loader) — Desactiva la carga de entidades externas
- [libxml_get_errors](#function.libxml-get-errors) — Lee el array de errores
- [libxml_get_external_entity_loader](#function.libxml-get-external-entity-loader) — Devuelve el cargador de entidades externas actual
- [libxml_get_last_error](#function.libxml-get-last-error) — Lee el último error de libxml
- [libxml_set_external_entity_loader](#function.libxml-set-external-entity-loader) — Cambia el cargador de entidades externas por defecto
- [libxml_set_streams_context](#function.libxml-set-streams-context) — Configura el contexto de flujos para la próxima operación libxml
- [libxml_use_internal_errors](#function.libxml-use-internal-errors) — Se desactiva el reporte de errores de libxml y se almacenan para su lectura posterior
  </li>
