# Analizador XML

# Introducción

XML (eXtensible Markup Language) es un formato de datos para el intercambio
en la web de documentos estructurados. Es un estándar definido por el
World Wide Web consortium (W3C). Se puede encontrar más información sobre XML y
tecnologías relacionadas en [» http://www.w3.org/XML/](http://www.w3.org/XML/).

Esta extensión de PHP implementa el soporte para expat
de James Clark en PHP. Este conjunto de herramientas permite analizar,
pero no validar, documentos XML. Es compatible con tres
[codificaciones de caracteres](#xml.encoding) fuente,
también proporcionadas por PHP: US-ASCII,
ISO-8859-1 y UTF-8.
No está soportada UTF-16.

Esta extensión permite [crear analizadores XML](#function.xml-parser-create)
y luego definir _gestores_ para los diferentes
eventos XML. Cada analizador XML también tiene algunos [parámetros](#function.xml-parser-set-option) que se
pueden ajustar.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#xml.requirements)
- [Instalación](#xml.installation)
- [Tipos de recursos](#xml.resources)

    ## Requerimientos

Esta extensión requiere la extensión PHP [libxml](#book.libxml).
Esto significa pasar la opción de configuración
**--with-libxml**, o anterior a PHP 7.4
la opción de configuración **--enable-libxml**,
aunque esto se realiza implícitamente ya que libxml está activado por omisión.

Esta extensión PHP utiliza expat compat layer
por omisión. Asimismo puede utilizar expat, que está
disponible en [» https://libexpat.github.io/](https://libexpat.github.io/).
El fichero Makefile incluido con expat
no construye una biblioteca por omisión: es necesario utilizar
la siguiente línea:

libexpat.a: $(OBJS)
ar -rc $@ $(OBJS)
ranlib $@

Un paquete RPM fuente de expat está disponible en
[» https://sourceforge.net/projects/expat/](https://sourceforge.net/projects/expat/).

## Instalación

Esta extensión está activada por omisión. Puede ser desactivada utilizando la opción de configuración:
**--disable-xml**

Estas funciones están activadas por omisión y utilizan la
biblioteca expat proporcionada con la distribución. El soporte de XML puede ser desactivado
utilizando la opción de compilación
**--disable-xml**.
Si se compila PHP como módulo para Apache 1.3.9 o superior,
PHP utilizará automáticamente la biblioteca
expat proporcionada por Apache. Si no se desea utilizar la biblioteca expat integrada,
es necesario compilar PHP con la opción
**--with-expat-dir=DIR**, donde DIR es el
directorio de instalación de la biblioteca expat.

La versión Windows de PHP
dispone del soporte automático de esta extensión. No es necesario
añadir ninguna biblioteca adicional para disponer de estas funciones.

## Tipos de recursos

Anterior a PHP 8.0.0, el recurso xml es retornado por
[xml_parser_create()](#function.xml-parser-create) y
[xml_parser_create_ns()](#function.xml-parser-create-ns), y representa
un analizador XML para ser utilizado con las otras funciones de esta
extensión.

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[XML_ERROR_NONE](#constant.xml-error-none)**
    ([int](#language.types.integer))









    **[XML_ERROR_NO_MEMORY](#constant.xml-error-no-memory)**
    ([int](#language.types.integer))









    **[XML_ERROR_SYNTAX](#constant.xml-error-syntax)**
    ([int](#language.types.integer))









    **[XML_ERROR_NO_ELEMENTS](#constant.xml-error-no-elements)**
    ([int](#language.types.integer))









    **[XML_ERROR_INVALID_TOKEN](#constant.xml-error-invalid-token)**
    ([int](#language.types.integer))









    **[XML_ERROR_UNCLOSED_TOKEN](#constant.xml-error-unclosed-token)**
    ([int](#language.types.integer))









    **[XML_ERROR_PARTIAL_CHAR](#constant.xml-error-partial-char)**
    ([int](#language.types.integer))









    **[XML_ERROR_TAG_MISMATCH](#constant.xml-error-tag-mismatch)**
    ([int](#language.types.integer))









    **[XML_ERROR_DUPLICATE_ATTRIBUTE](#constant.xml-error-duplicate-attribute)**
    ([int](#language.types.integer))









    **[XML_ERROR_JUNK_AFTER_DOC_ELEMENT](#constant.xml-error-junk-after-doc-element)**
    ([int](#language.types.integer))









    **[XML_ERROR_PARAM_ENTITY_REF](#constant.xml-error-param-entity-ref)**
    ([int](#language.types.integer))









    **[XML_ERROR_UNDEFINED_ENTITY](#constant.xml-error-undefined-entity)**
    ([int](#language.types.integer))









    **[XML_ERROR_RECURSIVE_ENTITY_REF](#constant.xml-error-recursive-entity-ref)**
    ([int](#language.types.integer))









    **[XML_ERROR_ASYNC_ENTITY](#constant.xml-error-async-entity)**
    ([int](#language.types.integer))









    **[XML_ERROR_BAD_CHAR_REF](#constant.xml-error-bad-char-ref)**
    ([int](#language.types.integer))









    **[XML_ERROR_BINARY_ENTITY_REF](#constant.xml-error-binary-entity-ref)**
    ([int](#language.types.integer))









    **[XML_ERROR_ATTRIBUTE_EXTERNAL_ENTITY_REF](#constant.xml-error-attribute-external-entity-ref)**
    ([int](#language.types.integer))









    **[XML_ERROR_MISPLACED_XML_PI](#constant.xml-error-misplaced-xml-pi)**
    ([int](#language.types.integer))









    **[XML_ERROR_UNKNOWN_ENCODING](#constant.xml-error-unknown-encoding)**
    ([int](#language.types.integer))









    **[XML_ERROR_INCORRECT_ENCODING](#constant.xml-error-incorrect-encoding)**
    ([int](#language.types.integer))









    **[XML_ERROR_UNCLOSED_CDATA_SECTION](#constant.xml-error-unclosed-cdata-section)**
    ([int](#language.types.integer))









    **[XML_ERROR_EXTERNAL_ENTITY_HANDLING](#constant.xml-error-external-entity-handling)**
    ([int](#language.types.integer))









    **[XML_OPTION_CASE_FOLDING](#constant.xml-option-case-folding)**
    ([int](#language.types.integer))









    **[XML_OPTION_PARSE_HUGE](#constant.xml-option-parse-huge)**
    ([int](#language.types.integer))



     Disponible a partir de PHP 8.4.0.
     Cuando se utiliza libxml2 &lt; 2.7.0 (por ejemplo en PHP 7.x),
     esta opción está activada por omisión y no puede ser desactivada.





    **[XML_OPTION_TARGET_ENCODING](#constant.xml-option-target-encoding)**
    ([int](#language.types.integer))









    **[XML_OPTION_SKIP_TAGSTART](#constant.xml-option-skip-tagstart)**
    ([int](#language.types.integer))









    **[XML_OPTION_SKIP_WHITE](#constant.xml-option-skip-white)**
    ([int](#language.types.integer))










    **[XML_SAX_IMPL](#constant.xml-sax-impl)**
    ([string](#language.types.string))



     Indica el método de implementación de SAX.
     Puede ser libxml o expat.

# Manejadores de eventos

Los manejadores XML de eventos definidos son:

   <caption>**Manejadores XML soportados**</caption>
   
    
     
      Función PHP para configurar el manejador
      Descripción del evento


      [xml_set_element_handler()](#function.xml-set-element-handler)

       Los eventos de elemento se producen cada vez que el intérprete XML encuentra etiquetas de inicio o de final. Hay manejadores separados para etiquetas de inicio y final.





       [xml_set_character_data_handler()](#function.xml-set-character-data-handler)


       Por definición los datos de caracteres es todo el contenido no marcado de los documentos XML, incluidos los espacios en blanco entre etiquetas. Tenga en cuenta que el intérprete XML no añade o elimina ningún espacio en blanco, eso depende de la aplicación (usted) decidir si el espacio en blanco es significativo.





       [xml_set_processing_instruction_handler()](#function.xml-set-processing-instruction-handler)


       Los programadores de PHP ya deberían estar familiarizados con las instrucciones de procesado (PI). &lt;?php ?&gt; es una instrucción de procesado, donde php se denomina "PI destino". El manejo de ellos es específico para cada aplicación, excepto los PI destinos que empiecen con "XML", ya que estan reservados.




      [xml_set_default_handler()](#function.xml-set-default-handler)

       Lo que no va a otro manejador va al manejador predeterminado. En el controlador predeterminado se obtendran cosas como el XML y las declaraciones de tipo de documento.





       [xml_set_unparsed_entity_decl_handler()](#function.xml-set-unparsed-entity-decl-handler)


       Este manejador será llamado para la declaración de una entidad no analizada (NDATA).





       [xml_set_notation_decl_handler()](#function.xml-set-notation-decl-handler)


       Este manejador es llamado para la declaración de una notación.





       [xml_set_external_entity_ref_handler()](#function.xml-set-external-entity-ref-handler)


       Este manejador es llamado cuando el intérprete XML encuentra una referencia a una entidad general externa analizada. Por ejemplo puede ser una referencia a un fichero o una URL. Ver [el ejemplo de entidad externa](#example.xml-external-entity) para una demostración.





       [xml_set_start_namespace_decl_handler()](#function.xml-set-start-namespace-decl-handler)


       Este manejador es llamado al principio de una declaración de namespace.





       [xml_set_end_namespace_decl_handler()](#function.xml-set-end-namespace-decl-handler)


       Este manejador es llamado al fin de un espacio de una declaración de namespace.
       Tenga en cuenta que este evento *no* es bajo LibXML.



# Case Folding

Las funciones manejadoras de elementos pueden obtener sus nombres de elementos "case-folded". Case folding se define como "un proceso aplicado a una secuencia de caracteres", en el cual aquellos que son identificados como no-mayúsculas son reemplazados por sus equivalentes en mayúsculas". En otras palabras, cuando se trata de XML, case folding simplemente significa poner en mayúsculas.

Por defecto, todos los nombres de elementos que son pasados al manejador de funciones son pasados a mayúsculas. Este comportamiento puede ser consultado y controlado por el intérprete XML mediante las funciones [xml_parser_get_option()](#function.xml-parser-get-option) y [xml_parser_set_option()](#function.xml-parser-set-option) respectivamente.

# Error Codes

    Las siguientes constantes se definen para códigos de error XML (como

los que devuelve ** xml_parse ()**):

- **[XML_ERROR_NONE](#constant.xml-error-none)**

- **[XML_ERROR_NO_MEMORY](#constant.xml-error-no-memory)**

- **[XML_ERROR_SYNTAX](#constant.xml-error-syntax)**

- **[XML_ERROR_NO_ELEMENTS](#constant.xml-error-no-elements)**

- **[XML_ERROR_INVALID_TOKEN](#constant.xml-error-invalid-token)**

- **[XML_ERROR_UNCLOSED_TOKEN](#constant.xml-error-unclosed-token)**

- **[XML_ERROR_PARTIAL_CHAR](#constant.xml-error-partial-char)**

- **[XML_ERROR_TAG_MISMATCH](#constant.xml-error-tag-mismatch)**

- **[XML_ERROR_DUPLICATE_ATTRIBUTE](#constant.xml-error-duplicate-attribute)**

- **[XML_ERROR_JUNK_AFTER_DOC_ELEMENT](#constant.xml-error-junk-after-doc-element)**

- **[XML_ERROR_PARAM_ENTITY_REF](#constant.xml-error-param-entity-ref)**

- **[XML_ERROR_UNDEFINED_ENTITY](#constant.xml-error-undefined-entity)**

- **[XML_ERROR_RECURSIVE_ENTITY_REF](#constant.xml-error-recursive-entity-ref)**

- **[XML_ERROR_ASYNC_ENTITY](#constant.xml-error-async-entity)**

- **[XML_ERROR_BAD_CHAR_REF](#constant.xml-error-bad-char-ref)**

- **[XML_ERROR_BINARY_ENTITY_REF](#constant.xml-error-binary-entity-ref)**

- **[XML_ERROR_ATTRIBUTE_EXTERNAL_ENTITY_REF](#constant.xml-error-attribute-external-entity-ref)**

- **[XML_ERROR_MISPLACED_XML_PI](#constant.xml-error-misplaced-xml-pi)**

- **[XML_ERROR_UNKNOWN_ENCODING](#constant.xml-error-unknown-encoding)**

- **[XML_ERROR_INCORRECT_ENCODING](#constant.xml-error-incorrect-encoding)**

- **[XML_ERROR_UNCLOSED_CDATA_SECTION](#constant.xml-error-unclosed-cdata-section)**

- **[XML_ERROR_EXTERNAL_ENTITY_HANDLING](#constant.xml-error-external-entity-handling)**

# Codificación de caracteres

La extensión de PHP XML es compatible con el conjunto de caracteres [» Unicode](http://www.unicode.org/) a través de diferentes codificaciones de caracteres. Hay dos tipos de codificaciones de caracteres: la codificación fuente y la codificación de destino. La representación interna de PHP del documento está siempre codificada con
UTF-8.

La codificación fuente se hace cuando un documento XML es [analizado](#function.xml-parse). Una vez [creado un intérprete XML](#function.xml-parser-create), la codificación fuente puede ser especificada (esta codificación no puede ser cambiada más adelante en la vida del intérprete XML). Las codificaciones fuente soportadas son ISO-8859-1,
US-ASCII y UTF-8. Las dos primeras son codificaciones de un solo byte, lo cual significa que cada caracter se representa por un solo byte.
UTF-8 puede codificar caracteres compuestos por un número variable de bits (hasta 21) de uno a cuatro bytes. La codificación fuente por defecto usada por PHP es ISO-8859-1.

La codificación de destino se hace cuando PHP pasa datos al controlador XML de funciones.
Cuando un intérprete XML se ha creado, la codificación de destino se establece igual que la que tenga la codificación fuente, pero esta puede ser cambiada en cualquier punto. La codificación de destino afectará a los caracteres de los datos como también a los nombres de etiquetas y las intrucciones de procesamiento de destino.

Si el intérprete XML encuentra caracteres fuera de rango que su codificación fuente es capaz de representar, devolverá un error.

Si PHP encuentra caracteres en el documento XML analizado que no pueden ser representados en la codificación de destino escogida, los caracteres problemáticos seran "degradados". Actualmente esto significa que tales caracteres seran reemplazados por un signo de interrogación.

# Ejemplos

## Tabla de contenidos

- [Ejemplo de estructura XML](#example.xml-structure)
- [Conversión XML -&gt; HTML](#example.xml-map-tags)
- [Entidad externa](#example.xml-external-entity)
- [Análisis XML con una clase](#example.xml-parsing-with-class)

    ## Ejemplo de estructura XML

    Este primer ejemplo muestra la estructura del elemento
    de inicio en un documento con indentación.

    **Ejemplo #1 Mostrar una estructura XML**

&lt;?php
$file = "examples/book.xml";
$depth = 0;

function startElement($parser, $name, $attrs)
{
global $depth;

    global $depth;

    for ($i = 0; $i &lt; $depth; $i++) {
        echo "  ";
    }
    echo "$name\n";
    $depth++;

}

function endElement($parser, $name)
{
global $depth;
$depth--;
}

$xml_parser = xml_parser_create();
xml_set_element_handler($xml_parser, "startElement", "endElement");
if (!($fp = fopen($file, "r"))) {
die("could not open XML input");
}

while ($data = fread($fp, 4096)) {
if (!xml_parse($xml_parser, $data, feof($fp))) {
die(sprintf("Error XML: %s en la línea %d",
xml_error_string(xml_get_error_code($xml_parser)),
                    xml_get_current_line_number($xml_parser)));
}
}
?&gt;

## Conversión XML -&gt; HTML

    **Ejemplo #1 Conversión XML -&gt; HTML**



     Este ejemplo reemplaza las etiquetas XML de un documento por etiquetas
     HTML. Los elementos desconocidos serán ignorados.
     Por supuesto, este ejemplo se aplicará a un tipo
     específico de archivos XML.

&lt;?php
$file = "examples/book.xml";
$map_array = array(
"BOLD" =&gt; "B",
"EMPHASIS" =&gt; "I",
"LITERAL" =&gt; "TT"
);

function startElement($parser, $name, $attrs)
{
    global $map_array;
    if (isset($map_array[$name])) {
echo "&lt;$map_array[$name]&gt;";
}
}

function endElement($parser, $name)
{
    global $map_array;
    if (isset($map_array[$name])) {
echo "&lt;/$map_array[$name]&gt;";
}
}

function characterData($parser, $data)
{
echo $data;
}

$xml_parser = xml_parser_create();
// Utilizamos el manejo de mayúsculas y minúsculas, para asegurarnos de encontrar la etiqueta en $map_array
xml_parser_set_option($xml_parser, XML_OPTION_CASE_FOLDING, true);
xml_set_element_handler($xml_parser, "startElement", "endElement");
xml_set_character_data_handler($xml_parser, "characterData");
if (!($fp = fopen($file, "r"))) {
die("could not open XML input");
}

while ($data = fread($fp, 4096)) {
if (!xml_parse($xml_parser, $data, feof($fp))) {
die(sprintf("Error XML: %s en la línea %d",
xml_error_string(xml_get_error_code($xml_parser)),
                    xml_get_current_line_number($xml_parser)));
}
}
?&gt;

## Entidad externa

Este ejemplo utiliza las referencias externas de XML:
es posible usar un manejador de entidad externa
para incluir y analizar documentos, así como las instrucciones
ejecutables pueden servir para incluir y analizar
otros documentos, y también proporcionar una indicación de confianza
(ver más abajo).

El documento XML que se utiliza en este ejemplo se proporciona más
adelante en el ejemplo (xmltest.xml y
xmltest2.xml).

    **Ejemplo #1 Entidad externa**

&lt;?php
$file = "xmltest.xml";

function trustedFile($file)
{
    // solo confíe en archivos locales de los que sea propietario
    if (!preg_match("@^([a-z][a-z0-9+.-]*)\:\/\/@i", $file)
        &amp;&amp; fileowner($file) == getmyuid()) {
return true;
}
return false;
}

function startElement($parser, $name, $attribs)
{
    echo "&amp;lt;&lt;font color=\"#0000cc\"&gt;$name&lt;/font&gt;";
if (count($attribs)) {
        foreach ($attribs as $k =&gt; $v) {
            echo " &lt;font color=\"#009900\"&gt;$k&lt;/font&gt;=\"&lt;font
color=\"#990000\"&gt;$v&lt;/font&gt;\"";
}
}
echo "&amp;gt;";
}

function endElement($parser, $name)
{
    echo "&amp;lt;/&lt;font color=\"#0000cc\"&gt;$name&lt;/font&gt;&amp;gt;";
}

function characterData($parser, $data)
{
    echo "&lt;b&gt;$data&lt;/b&gt;";
}

function PIHandler($parser, $target, $data)
{
    switch (strtolower($target)) {
case "php":
global $parser_file;
            // si el documento analizado es de confianza, se declara que es seguro
            // ejecutar el código PHP que contiene. Si no es así, el código se muestra
            // en su lugar.
            if (trustedFile($parser_file[$parser])) {
eval($data);
            } else {
                printf("Código PHP no confiable: &lt;i&gt;%s&lt;/i&gt;",
                        htmlspecialchars($data));
}
break;
}
}

function defaultHandler($parser, $data)
{
    if (substr($data, 0, 1) == "&amp;" &amp;&amp; substr($data, -1, 1) == ";") {
        printf('&lt;font color="#aa00aa"&gt;%s&lt;/font&gt;',
                htmlspecialchars($data));
} else {
printf('&lt;font size="-1"&gt;%s&lt;/font&gt;',
htmlspecialchars($data));
}
}

function externalEntityRefHandler($parser, $openEntityNames, $base, $systemId,
                                  $publicId) {
    if ($systemId) {
if (!list($parser, $fp) = new_xml_parser($systemId)) {
printf("No se pudo abrir la entidad %s en %s\n", $openEntityNames,
                   $systemId);
            return false;
        }
        while ($data = fread($fp, 4096)) {
            if (!xml_parse($parser, $data, feof($fp))) {
printf("Error XML: %s en la línea %d mientras se analiza la entidad %s\n",
xml_error_string(xml_get_error_code($parser)),
                       xml_get_current_line_number($parser), $openEntityNames);
return false;
}
}
return true;
}
return false;
}

function new_xml_parser($file)
{
global $parser_file;

    $xml_parser = xml_parser_create();
    xml_parser_set_option($xml_parser, XML_OPTION_CASE_FOLDING, 1);
    xml_set_element_handler($xml_parser, "startElement", "endElement");
    xml_set_character_data_handler($xml_parser, "characterData");
    xml_set_processing_instruction_handler($xml_parser, "PIHandler");
    xml_set_default_handler($xml_parser, "defaultHandler");
    xml_set_external_entity_ref_handler($xml_parser, "externalEntityRefHandler");

    if (!($fp = @fopen($file, "r"))) {
        return false;
    }
    if (!is_array($parser_file)) {
        settype($parser_file, "array");
    }
    $parser_file[$xml_parser] = $file;
    return array($xml_parser, $fp);

}

if (!(list($xml_parser, $fp) = new_xml_parser($file))) {
die("could not open XML input");
}

echo "&lt;pre&gt;";
while ($data = fread($fp, 4096)) {
if (!xml_parse($xml_parser, $data, feof($fp))) {
die(sprintf("Error XML: %s en la línea %d\n",
xml_error_string(xml_get_error_code($xml_parser)),
                    xml_get_current_line_number($xml_parser)));
}
}
echo "&lt;/pre&gt;";
echo "análisis completo\n";

?&gt;

    **Ejemplo #2 xmltest.xml**

&lt;?xml version='1.0'?&gt;
&lt;!DOCTYPE chapter SYSTEM "/just/a/test.dtd" [
&lt;!ENTITY plainEntity "FOO entity"&gt;
&lt;!ENTITY systemEntity SYSTEM "xmltest2.xml"&gt;
]&gt;
&lt;chapter&gt;
&lt;TITLE&gt;Title &amp;plainEntity;&lt;/TITLE&gt;
&lt;para&gt;
&lt;informaltable&gt;
&lt;tgroup cols="3"&gt;
&lt;tbody&gt;
&lt;row&gt;&lt;entry&gt;a1&lt;/entry&gt;&lt;entry morerows="1"&gt;b1&lt;/entry&gt;&lt;entry&gt;c1&lt;/entry&gt;&lt;/row&gt;
&lt;row&gt;&lt;entry&gt;a2&lt;/entry&gt;&lt;entry&gt;c2&lt;/entry&gt;&lt;/row&gt;
&lt;row&gt;&lt;entry&gt;a3&lt;/entry&gt;&lt;entry&gt;b3&lt;/entry&gt;&lt;entry&gt;c3&lt;/entry&gt;&lt;/row&gt;
&lt;/tbody&gt;
&lt;/tgroup&gt;
&lt;/informaltable&gt;
&lt;/para&gt;
&amp;systemEntity;
&lt;section id="about"&gt;
&lt;title&gt;About this Document&lt;/title&gt;
&lt;para&gt;
&lt;!-- this is a comment --&gt;
&lt;?php echo 'Hi! This is PHP version ' . phpversion(); ?&gt;
&lt;/para&gt;
&lt;/section&gt;
&lt;/chapter&gt;

Este archivo se incluye desde xmltest.xml:

    **Ejemplo #3 xmltest2.xml**

&lt;?xml version="1.0"?&gt;
&lt;!DOCTYPE foo [
&lt;!ENTITY testEnt "test entity"&gt;
]&gt;
&lt;foo&gt;
&lt;element attrib="value"/&gt;
&amp;testEnt;
&lt;?php echo "Esto es código PHP que se ejecuta."; ?&gt;
&lt;/foo&gt;

## Análisis XML con una clase

Este ejemplo muestra cómo utilizar una clase con manejadores.

    **Ejemplo #1 Mostrar la estructura de los elementos XML**

&lt;?php
$file = "examples/book.xml";

class CustomXMLParser
{
private $fp;
private $parser;
private $depth = 0;

    function __construct(string $file)
    {
        if (!($this-&gt;fp = fopen($file, 'r'))) {
            throw new RunTimeException("imposible abrir el archivo XML '{$file}'");
        }

        $this-&gt;parser = xml_parser_create();

        xml_set_element_handler($this-&gt;parser, self::startElement(...), self::endElement(...));
        xml_set_character_data_handler($this-&gt;parser, self::cdata(...));
    }

    private function startElement($parser, $name, $attrs)
    {
        for ($i = 0; $i &lt; $this-&gt;depth; $i++) {
            echo "  ";
        }
        echo "$name\n";
        $this-&gt;depth++;
    }

    private function endElement($parser, $name)
    {
        $this-&gt;depth--;
    }

    private function cdata($parser, $cdata)
    {
        if (trim($cdata) === '') {
            return;
        }
        for ($i = 0; $i &lt; $this-&gt;depth; $i++) {
            echo "  ";
        }
        echo trim($cdata), "\n";
    }

    public function parse()
    {
        while ($data = fread($this-&gt;fp, 4096)) {
            if (!xml_parse($this-&gt;parser, $data, feof($this-&gt;fp))) {
                throw new RunTimeException(
                    sprintf(
                        "Error XML: %s en la línea %d",
                        xml_error_string(xml_get_error_code($this-&gt;parser)),
                        xml_get_current_line_number($this-&gt;parser)
                    )
                );
            }
        }
    }

}

$xmlParser = new CustomXMLParser($file);
$xmlParser-&gt;parse();
?&gt;

# Funciones del Intérprete XML

# xml_error_string

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_error_string — Lee el mensaje de error del analizador XML

### Descripción

**xml_error_string**([int](#language.types.integer) $error_code): [?](#language.types.null)[string](#language.types.string)

Lee el mensaje de error del analizador XML asociado con el código
error_code dado.

### Parámetros

     error_code


       Un código de error proveniente de [xml_get_error_code()](#function.xml-get-error-code).





### Valores devueltos

Devuelve un string que representa la descripción del error
error_code, o **[null](#constant.null)** o "Unknown" si no se encuentra ninguna descripción.

### Ver también

    - [xml_get_error_code()](#function.xml-get-error-code) - Obtiene el código de error del analizador XML

# xml_get_current_byte_index

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_get_current_byte_index — Devuelve el índice del byte actual de un analizador XML

### Descripción

**xml_get_current_byte_index**([XMLParser](#class.xmlparser) $parser): [int](#language.types.integer)

Devuelve el índice del byte actual del analizador XML dado.

### Parámetros

     parser


       Una referencia a un analizador XML válido.





### Valores devueltos

**xml_get_current_byte_index()** devuelve
el índice del byte de análisis actual del analizador XML
(comienza en 0).

### Historial de cambios

      Versión
      Descripción







8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

### Notas

**Advertencia**

    Esta función devuelve el índice del byte de acuerdo con el
    texto codificado en UTF-8 incluso si la entrada está en otra codificación.

### Ver también

    - [xml_get_current_column_number()](#function.xml-get-current-column-number) - Devuelve el número de columna actual de un analizador XML

    - [xml_get_current_line_number()](#function.xml-get-current-line-number) - Devuelve el número de línea actual de un analizador XML

# xml_get_current_column_number

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_get_current_column_number —
Devuelve el número de columna actual de un analizador XML

### Descripción

**xml_get_current_column_number**([XMLParser](#class.xmlparser) $parser): [int](#language.types.integer)

Devuelve el número de columna actual del analizador XML dado.

### Parámetros

     parser


       Una referencia a un analizador XML válido.





### Valores devueltos

**xml_get_current_column_number()** devuelve
el número de columna actual de la línea actual del analizador,
que corresponde a la posición de análisis actual del analizador XML
(como devuelto por [xml_get_current_line_number()](#function.xml-get-current-line-number)).

### Historial de cambios

      Versión
      Descripción







8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

### Ver también

    - [xml_get_current_byte_index()](#function.xml-get-current-byte-index) - Devuelve el índice del byte actual de un analizador XML

    - [xml_get_current_line_number()](#function.xml-get-current-line-number) - Devuelve el número de línea actual de un analizador XML

# xml_get_current_line_number

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_get_current_line_number — Devuelve el número de línea actual de un analizador XML

### Descripción

**xml_get_current_line_number**([XMLParser](#class.xmlparser) $parser): [int](#language.types.integer)

Devuelve el número de línea actual del analizador XML dado.

### Parámetros

     parser


       Una referencia a un analizador XML válido.





### Valores devueltos

Devuelve el número de la línea que se está analizando.

### Historial de cambios

      Versión
      Descripción







8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

### Ver también

    - [xml_get_current_column_number()](#function.xml-get-current-column-number) - Devuelve el número de columna actual de un analizador XML

    - [xml_get_current_byte_index()](#function.xml-get-current-byte-index) - Devuelve el índice del byte actual de un analizador XML

# xml_get_error_code

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_get_error_code — Obtiene el código de error del analizador XML

### Descripción

**xml_get_error_code**([XMLParser](#class.xmlparser) $parser): [int](#language.types.integer)

Obtiene el código de error del analizador XML.

### Parámetros

     parser


       Una referencia a un analizador XML válido.





### Valores devueltos

**xml_get_error_code()** devuelve
uno de los códigos de error listados en la sección
[sobre los códigos de error](#xml.error-codes).

### Historial de cambios

      Versión
      Descripción







8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

### Ver también

    - [xml_error_string()](#function.xml-error-string) - Lee el mensaje de error del analizador XML

# xml_parse

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_parse — Inicia el análisis de un documento XML

### Descripción

**xml_parse**([XMLParser](#class.xmlparser) $parser, [string](#language.types.string) $data, [bool](#language.types.boolean) $is_final = **[false](#constant.false)**): [int](#language.types.integer)

**xml_parse()** analiza un documento XML. Los gestores para los eventos configurados son llamados tantas veces como sea necesario.

### Parámetros

     parser


       Una referencia al analizador XML a utilizar.






     data


       Una parte de los datos a analizar. Un documento puede ser analizado por partes mediante llamadas sucesivas a **xml_parse()** con nuevos datos, siempre que el parámetro is_final esté definido como **[true](#constant.true)** cuando se analicen los últimos datos.






     is_final


       Si está definido y vale **[true](#constant.true)**, data será el último fragmento de datos enviado al analizador.





### Valores devueltos

Devuelve 1 en caso de éxito o 0 en caso de fallo.

En caso de fallo en el análisis, la causa del error puede obtenerse mediante las funciones [xml_get_error_code()](#function.xml-get-error-code), [xml_error_string()](#function.xml-error-string), [xml_get_current_line_number()](#function.xml-get-current-line-number), [xml_get_current_column_number()](#function.xml-get-current-column-number) y [xml_get_current_byte_index()](#function.xml-get-current-byte-index).

**Nota**:

    Algunos errores (incluyendo errores de entidades) son reportados al final de los datos, esto únicamente si is_final vale **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

### Ejemplos

**Ejemplo #1 Análisis de documentos XML grandes por partes**

    Este ejemplo muestra cómo los documentos XML grandes pueden ser leídos y analizados por partes, permitiendo así no mantener en memoria la totalidad del documento. No se ha establecido ningún gestor de errores para hacer el ejemplo más conciso.

&lt;?php
$stream = fopen('examples/book-simple.xml', 'r');
$parser = xml_parser_create();

xml_set_element_handler(
$parser,
    function($parser, $name, $attributes) { echo $name, PHP_EOL; },
    function($parser, $name) { echo $name, PHP_EOL; }
);

while (($data = fread($stream, 16384))) {
xml_parse($parser, $data); // análisis de la parte actual
}
xml_parse($parser, '', true); // finalización del análisis
fclose($stream);

# xml_parse_into_struct

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_parse_into_struct — Analiza una estructura XML

### Descripción

**xml_parse_into_struct**(
    [XMLParser](#class.xmlparser) $parser,
    [string](#language.types.string) $data,
    [array](#language.types.array) &amp;$values,
    [array](#language.types.array) &amp;$index = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)

Esta función analiza la cadena XML data y la coloca en dos arrays: el primero index contiene punteros a la posición de los valores correspondientes en el array values. Estos dos parámetros se pasan por referencia.

### Parámetros

     parser


       Una referencia a un analizador XML.






     data


       Un string que contiene los datos XML.






     values


       Un array que contiene los valores de los datos XML.






     index


       Un array que contiene los punteros a los valores apropiados en el parámetro $values.





### Valores devueltos

**xml_parse_into_struct()** retorna 0 si ocurre un error y 1 en caso de éxito. Esto no es lo mismo que **[false](#constant.false)** y **[true](#constant.true)**, por lo que se debe tener precaución con los operadores como ===.

### Historial de cambios

      Versión
      Descripción







8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

### Ejemplos

A continuación, se encuentra un ejemplo que ilustra la estructura de los dos arrays generados por la función. Se utiliza una etiqueta simple note, colocada dentro de otra etiqueta para. Se analiza todo y se muestra la estructura generada:

    **Ejemplo #1 Ejemplo con xml_parse_into_struct()**

&lt;?php
$simple = "&lt;para&gt;&lt;note&gt;simple note&lt;/note&gt;&lt;/para&gt;";
$p = xml_parser_create();
xml_parse_into_struct($p, $simple, $vals, $index);
echo "Array Index\n";
print_r($index);
echo "\nArray Vals\n";
print_r($vals);
?&gt;

     Mostrará:

Array Index
Array
(
[PARA] =&gt; Array
(
[0] =&gt; 0
[1] =&gt; 2
)

    [NOTE] =&gt; Array
        (
            [0] =&gt; 1
        )

)

Array Vals
Array
(
[0] =&gt; Array
(
[tag] =&gt; PARA
[type] =&gt; open
[level] =&gt; 1
)

    [1] =&gt; Array
        (
            [tag] =&gt; NOTE
            [type] =&gt; complete
            [level] =&gt; 2
            [value] =&gt; simple note
        )

    [2] =&gt; Array
        (
            [tag] =&gt; PARA
            [type] =&gt; close
            [level] =&gt; 1
        )

)

El análisis basado en eventos (como el de expat) puede resultar complejo cuando el documento XML es complejo. **xml_parse_into_struct()** no genera objetos de tipo DOM, sino que genera estructuras que pueden ser recorridas de manera similar a un árbol. Consideremos el siguiente fichero, que representa una pequeña base de datos XML:

    **Ejemplo #2 moldb.xml - Pequeña base de datos molecular**

&lt;?xml version="1.0"?&gt;
&lt;moldb&gt;

&lt;molecule&gt;
&lt;name&gt;Alanine&lt;/name&gt;
&lt;symbol&gt;ala&lt;/symbol&gt;
&lt;code&gt;A&lt;/code&gt;
&lt;type&gt;hydrophobic&lt;/type&gt;
&lt;/molecule&gt;

&lt;molecule&gt;
&lt;name&gt;Lysine&lt;/name&gt;
&lt;symbol&gt;lys&lt;/symbol&gt;
&lt;code&gt;K&lt;/code&gt;
&lt;type&gt;charged&lt;/type&gt;
&lt;/molecule&gt;

&lt;/moldb&gt;

Y ahora, un código que analiza el documento y genera los objetos correspondientes:

    **Ejemplo #3
     parsemoldb.php: Analiza moldb.xml y crea un array de objetos moleculares
    **

&lt;?php

class AminoAcid {
var $name; // nombre aa
var $symbol; // símbolo de tres letras
var $code; // código de una letra
var $type; // hidrofóbico, cargado o neutro

    function __construct ($aa) {
        foreach ($aa as $k=&gt;$v)
            $this-&gt;$k = $aa[$k];
    }

}

function readDatabase($filename)
{
    // lee la base de datos xml de aminoácidos
    $data = file_get_contents($filename);
$parser = xml_parser_create();
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
    xml_parse_into_struct($parser, $data, $values, $tags);
    unset($parser);

    // bucle a través de las estructuras
    foreach ($tags as $key=&gt;$val) {
        if ($key == "molecule") {
            $molranges = $val;
            // cada par contiguo de entradas del array son los límites inferior y superior para cada definición de molécula
            for ($i=0; $i &lt; count($molranges); $i+=2) {
                $offset = $molranges[$i] + 1;
                $len = $molranges[$i + 1] - $offset;
                $tdb[] = parseMol(array_slice($values, $offset, $len));
            }
        } else {
            continue;
        }
    }
    return $tdb;

}

function parseMol($mvalues) {
    for ($i=0; $i &lt; count($mvalues); $i++)
        $mol[$mvalues[$i]["tag"]] = $mvalues[$i]["value"];
return new AminoAcid($mol);
}

$db = readDatabase("moldb.xml");
echo "** Base de objetos AminoAcid:\n";
print_r($db);

?&gt;

Tras la ejecución de parsemoldb.php, la variable $db contiene un array de objetos **AminoAcid**, y la salida lo confirma:

\*\* Base de objetos AminoAcid:
Array
(
[0] =&gt; aminoacid Object
(
[name] =&gt; Alanine
[symbol] =&gt; ala
[code] =&gt; A
[type] =&gt; hydrophobic
)

    [1] =&gt; aminoacid Object
        (
            [name] =&gt; Lysine
            [symbol] =&gt; lys
            [code] =&gt; K
            [type] =&gt; charged
        )

)

# xml_parser_create

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_parser_create — Creación de un analizador XML

### Descripción

**xml_parser_create**([?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**): [XMLParser](#class.xmlparser)

**xml_parser_create()** crea un analizador XML y
devuelve una instancia de [XMLParser](#class.xmlparser) para ser utilizada
con las demás funciones XML.

### Parámetros

     encoding


       La codificación de entrada se detecta automáticamente, por lo que el argumento
       encoding solo especifica la codificación de salida.
       Si se pasa una cadena vacía, el analizador intenta identificar en qué codificación
       está codificado el documento examinando los 3 o 4 octetos superiores.
       El juego de caracteres de salida por omisión es UTF-8. Las codificaciones
       admitidas son ISO-8859-1, UTF-8,
       y US-ASCII.





### Valores devueltos

Devuelve una nueva instancia de [XMLParser](#class.xmlparser).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función devuelve ahora una instancia de [XMLParser](#class.xmlparser);
       anteriormente, se devolvía un [resource](#language.types.resource),  o **[false](#constant.false)** si ocurre un error.




      8.0.0

       encoding es ahora nullable.



### Ver también

    - [xml_parser_create_ns()](#function.xml-parser-create-ns) - Crea un analizador XML

# xml_parser_create_ns

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

xml_parser_create_ns — Crea un analizador XML

### Descripción

**xml_parser_create_ns**([?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**, [string](#language.types.string) $separator = ":"): [XMLParser](#class.xmlparser)

**xml_parser_create_ns()** crea un nuevo analizador
XML con soporte para espacios de nombres y devuelve una instancia de
[XMLParser](#class.xmlparser) para ser utilizada con otras funciones XML.

### Parámetros

     encoding


       El juego de caracteres es detectado automáticamente y,
       por lo tanto, el argumento encoding solo especifica
       la salida. El juego de caracteres de salida por omisión es UTF-8.
       Los juegos de caracteres soportados son ISO-8859-1,
       UTF-8 y US-ASCII.






     separator


       Con un analizador que soporta espacios de nombres, las etiquetas que
       son pasadas a las diferentes funciones de gestión estarán constituidas
       por el nombre del espacio y el nombre de la etiqueta, separados por la cadena
       separator.





### Valores devueltos

Devuelve una nueva instancia de [XMLParser](#class.xmlparser).

### Historial de cambios

      Versión
      Descripción






      8.0.0

      Esta función devuelve ahora una instancia de [XMLParser](#class.xmlparser);
      anteriormente, se devolvía un [resource](#language.types.resource),  o **[false](#constant.false)** si ocurre un error.




      8.0.0

       encoding es ahora nullable.



### Ver también

    - [xml_parser_create()](#function.xml-parser-create) - Creación de un analizador XML

# xml_parser_free

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_parser_free — Destruye un analizador XML

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.5.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**xml_parser_free**([XMLParser](#class.xmlparser) $parser): [bool](#language.types.boolean)

**Nota**:

Esta función no tiene ningún efecto. Anterior a PHP 8.0.0,
esta función era utilizada para cerrar un recurso.

Destruye el analizador XML parser.

**Precaución**

    Anterior a PHP 8.0.0, además de llamar a la función **xml_parser_free()**
    al final del análisis, era necesario eliminar explícitamente la referencia
    al parámetro parser para evitar fugas de memoria,
    si el recurso analizado es referenciado desde un objeto, y este objeto hace referencia
    al recurso analizado.

### Parámetros

     parser


       Una referencia a un analizador XML.



### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.5.0

       Esta función ha sido marcada como obsoleta.





8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

# xml_parser_get_option

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_parser_get_option — Lee las opciones de un analizador XML

### Descripción

**xml_parser_get_option**([XMLParser](#class.xmlparser) $parser, [int](#language.types.integer) $option): [string](#language.types.string)|[int](#language.types.integer)|[bool](#language.types.boolean)

Lee las opciones de un analizador XML.

### Parámetros

     parser


       Una referencia a un analizador XML válido.




     option


       La opción solicitada. **[XML_OPTION_CASE_FOLDING](#constant.xml-option-case-folding)**,
       **[XML_OPTION_PARSE_HUGE](#constant.xml-option-parse-huge)**,
       **[XML_OPTION_SKIP_TAGSTART](#constant.xml-option-skip-tagstart)**, **[XML_OPTION_SKIP_WHITE](#constant.xml-option-skip-white)**
       y **[XML_OPTION_TARGET_ENCODING](#constant.xml-option-target-encoding)** están disponibles.
       Consulte [xml_parser_set_option()](#function.xml-parser-set-option) para sus
       descripciones.



### Valores devueltos

Devuelve el valor de la opción.

### Errores/Excepciones

Genera un [ValueError](#class.valueerror) cuando se pasa un valor inválido
a option.

Anterior a PHP 8.0.0, pasar un valor inválido a
option generaba asimismo un aviso **[E_WARNING](#constant.e-warning)**
y hacía que la función devolviera **[false](#constant.false)**.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       La función devuelve ahora un booleano para las opciones booleanas.





8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

      8.0.0

       Un [ValueError](#class.valueerror) es generado ahora si
       option es inválido.




      7.1.24, 7.2.12, 7.3.0

       options soporta ahora **[XML_OPTION_SKIP_TAGSTART](#constant.xml-option-skip-tagstart)**
       y **[XML_OPTION_SKIP_WHITE](#constant.xml-option-skip-white)**.



# xml_parser_set_option

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_parser_set_option — Establece las opciones de un analizador XML

### Descripción

**xml_parser_set_option**([XMLParser](#class.xmlparser) $parser, [int](#language.types.integer) $option,
[string](#language.types.string)|[int](#language.types.integer)|[bool](#language.types.boolean) $value): [bool](#language.types.boolean)

Establece las opciones de un analizador XML.

### Parámetros

     parser


       Una referencia a un analizador XML.






     option


       La opción a modificar. Ver más abajo.




       Las siguientes opciones están disponibles:



        <caption>**Opciones del analizador XML**</caption>



           Opción
           Tipo de datos
           Descripción






           **[XML_OPTION_CASE_FOLDING](#constant.xml-option-case-folding)**
           bool

            Controla el manejo de la [caja](#xml.case-folding)
            de las etiquetas de este analizador XML. Por omisión, está activado.




           **[XML_OPTION_PARSE_HUGE](#constant.xml-option-parse-huge)**
           bool

            Permite analizar documentos de más de 10 MB.
            Esta opción solo debe activarse si el tamaño del documento está
            limitado, ya que de lo contrario podría conducir a un ataque de denegación de servicio (DoS).
            Esta opción solo está disponible al usar libxml2.




           **[XML_OPTION_SKIP_TAGSTART](#constant.xml-option-skip-tagstart)**
           bool

            Especifica cuántos caracteres deben omitirse al inicio del nombre de la etiqueta.




           **[XML_OPTION_SKIP_WHITE](#constant.xml-option-skip-white)**
           [int](#language.types.integer)

            Omite o no los valores que contienen caracteres en blanco.




           **[XML_OPTION_TARGET_ENCODING](#constant.xml-option-target-encoding)**
           string

            Modifica la [codificación de destino](#xml.encoding)
            utilizada por este analizador XML. Por omisión, es la que
            se especificó al llamar a
            [xml_parser_create()](#function.xml-parser-create). Las codificaciones soportadas
            son ISO-8859-1, US-ASCII
            y UTF-8.











     value


       El nuevo valor de la opción.





### Valores devueltos

Devuelve **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** en caso de fallo.

### Errores/Excepciones

Lanza una [ValueError](#class.valueerror) cuando se pasa un valor inválido
a option.

Antes de PHP 8.0.0, pasar un valor inválido a option
generaba una advertencia **[E_WARNING](#constant.e-warning)**
y hacía que la función devolviera el valor **[false](#constant.false)**.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Se añadió la opción **[XML_OPTION_PARSE_HUGE](#constant.xml-option-parse-huge)**.




      8.3.0

       El parámetro value ahora también acepta valores booleanos.
       Las opciones **[XML_OPTION_CASE_FOLDING](#constant.xml-option-case-folding)** y **[XML_OPTION_SKIP_WHITE](#constant.xml-option-skip-white)**
       ahora son opciones booleanas.





8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

      8.0.0

       Ahora se lanza una excepción [ValueError](#class.valueerror) si
       la option es inválida.



# xml_set_character_data_handler

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_set_character_data_handler — Establece los gestores de datos de caracteres

### Descripción

**xml_set_character_data_handler**([XMLParser](#class.xmlparser) $parser, [callable](#language.types.callable)|[string](#language.types.string)|[null](#language.types.null) $handler): [true](#language.types.singleton)

Establece los gestores de datos de caracteres para el analizador XML
parser.

### Parámetros

parser

El analizador XML.

     handler



Si **[null](#constant.null)** se pasa, el controlador se reinicia a su estado por omisión.

**Advertencia**

    Una cadena vacía también reiniciará el controlador,
    sin embargo esta funcionalidad está deprecada a partir de PHP 8.4.0.

Si handler es un [callable](#language.types.callable),
el callable se define como el controlador.

Si handler es una [string](#language.types.string),
puede ser el nombre de un método de un objeto definido con
[xml_set_object()](#function.xml-set-object).

**Advertencia**

Esta funcionalidad está deprecada a partir de PHP 8.4.0.

**Advertencia**

A partir de PHP 8.4.0, se verifica la validez del callable durante la configuración del controlador,
y no en el momento de su llamada.
Esto significa que [xml_set_object()](#function.xml-set-object) debe ser llamado antes
de definir un método como cadena como devolución de llamada.
Sin embargo, como este comportamiento también está deprecado a partir de PHP 8.4.0,
se recomienda utilizar un [callable](#language.types.callable) adecuado para el método.

       La firma del gestor debe ser:


handler([XMLParser](#class.xmlparser) $parser, [string](#language.types.string) $data): [void](language.types.void.html)

parser

El analizador XML que llama al controlador.

         data


           Datos de caracteres como string.






       El gestor de datos es llamado para cada fragmento de texto
       de un documento XML. Puede ser llamado múltiples veces para cada
       fragmento (por ejemplo, para strings no ASCII).





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.4.0

Passing a non-[callable](#language.types.callable) [string](#language.types.string) to
handler is now deprecated,
use a proper callable for methods, or **[null](#constant.null)** to reset the handler.

8.4.0

The validity of handler as a [callable](#language.types.callable)
is now checked when setting the handler instead of checking when calling it.

8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

# xml_set_default_handler

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_set_default_handler — Establece el gestor XML por defecto

### Descripción

**xml_set_default_handler**([XMLParser](#class.xmlparser) $parser, [callable](#language.types.callable)|[string](#language.types.string)|[null](#language.types.null) $handler): [true](#language.types.singleton)

Establece el gestor por defecto del analizador XML parser.

### Parámetros

parser

El analizador XML.

     handler



Si **[null](#constant.null)** se pasa, el controlador se reinicia a su estado por omisión.

**Advertencia**

    Una cadena vacía también reiniciará el controlador,
    sin embargo esta funcionalidad está deprecada a partir de PHP 8.4.0.

Si handler es un [callable](#language.types.callable),
el callable se define como el controlador.

Si handler es una [string](#language.types.string),
puede ser el nombre de un método de un objeto definido con
[xml_set_object()](#function.xml-set-object).

**Advertencia**

Esta funcionalidad está deprecada a partir de PHP 8.4.0.

**Advertencia**

A partir de PHP 8.4.0, se verifica la validez del callable durante la configuración del controlador,
y no en el momento de su llamada.
Esto significa que [xml_set_object()](#function.xml-set-object) debe ser llamado antes
de definir un método como cadena como devolución de llamada.
Sin embargo, como este comportamiento también está deprecado a partir de PHP 8.4.0,
se recomienda utilizar un [callable](#language.types.callable) adecuado para el método.

       La firma del gestor debe ser:


handler([XMLParser](#class.xmlparser) $parser, [string](#language.types.string) $data): [void](language.types.void.html)

parser

El analizador XML que llama al controlador.

          data



           data contiene los caracteres en forma de string.
           Puede ser una declaración XML, un tipo de documento, una entidad u otros datos para los cuales no se prevé ningún gestor.







### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.4.0

Passing a non-[callable](#language.types.callable) [string](#language.types.string) to
handler is now deprecated,
use a proper callable for methods, or **[null](#constant.null)** to reset the handler.

8.4.0

The validity of handler as a [callable](#language.types.callable)
is now checked when setting the handler instead of checking when calling it.

8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

# xml_set_element_handler

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_set_element_handler — Establece los gestores de inicio y fin de etiqueta XML

### Descripción

**xml_set_element_handler**([XMLParser](#class.xmlparser) $parser, [callable](#language.types.callable)|[string](#language.types.string)|[null](#language.types.null) $start_handler, [callable](#language.types.callable)|[string](#language.types.string)|[null](#language.types.null) $end_handler): [true](#language.types.singleton)

Establece los gestores de inicio y fin del analizador XML
parser.

start_handler es llamado cuando un nuevo elemento XML
es abierto. end_handler es llamado cuando un elemento
XML es cerrado.

### Parámetros

parser

El analizador XML.

     start_handler



Si **[null](#constant.null)** se pasa, el controlador se reinicia a su estado por omisión.

**Advertencia**

    Una cadena vacía también reiniciará el controlador,
    sin embargo esta funcionalidad está deprecada a partir de PHP 8.4.0.

Si handler es un [callable](#language.types.callable),
el callable se define como el controlador.

Si handler es una [string](#language.types.string),
puede ser el nombre de un método de un objeto definido con
[xml_set_object()](#function.xml-set-object).

**Advertencia**

Esta funcionalidad está deprecada a partir de PHP 8.4.0.

**Advertencia**

A partir de PHP 8.4.0, se verifica la validez del callable durante la configuración del controlador,
y no en el momento de su llamada.
Esto significa que [xml_set_object()](#function.xml-set-object) debe ser llamado antes
de definir un método como cadena como devolución de llamada.
Sin embargo, como este comportamiento también está deprecado a partir de PHP 8.4.0,
se recomienda utilizar un [callable](#language.types.callable) adecuado para el método.

       La firma del gestor debe ser:


start_element_handler([XMLParser](#class.xmlparser) $parser, [string](#language.types.string) $name, [array](#language.types.array) $attributes): [void](language.types.void.html)

parser

El analizador XML que llama al controlador.

         name


           Contiene el nombre del elemento que provocó la llamada del
           gestor. Si el analizador gestiona la
           [casse](#xml.case-folding), este
           elemento estará en mayúsculas.




         attributes


           Un array asociativo con los atributos del elemento.
           El array estará vacío si no hay atributos.
           Las claves de este array serán los nombres de los atributos,
           y los valores serán los valores correspondientes de los atributos.
           Los nombres de los atributos estarán en mayúsculas si el analizador gestiona
           la [casse](#xml.case-folding).
           Los valores de los atributos *permanecerán inalterados*.


           El orden en el que attributes es recorrido
           es idéntico al orden en el que los atributos fueron declarados.








     end_handler



Si **[null](#constant.null)** se pasa, el controlador se reinicia a su estado por omisión.

**Advertencia**

    Una cadena vacía también reiniciará el controlador,
    sin embargo esta funcionalidad está deprecada a partir de PHP 8.4.0.

Si handler es un [callable](#language.types.callable),
el callable se define como el controlador.

Si handler es una [string](#language.types.string),
puede ser el nombre de un método de un objeto definido con
[xml_set_object()](#function.xml-set-object).

**Advertencia**

Esta funcionalidad está deprecada a partir de PHP 8.4.0.

**Advertencia**

A partir de PHP 8.4.0, se verifica la validez del callable durante la configuración del controlador,
y no en el momento de su llamada.
Esto significa que [xml_set_object()](#function.xml-set-object) debe ser llamado antes
de definir un método como cadena como devolución de llamada.
Sin embargo, como este comportamiento también está deprecado a partir de PHP 8.4.0,
se recomienda utilizar un [callable](#language.types.callable) adecuado para el método.

       La firma del gestor debe ser:


end_element_handler([XMLParser](#class.xmlparser) $parser, [string](#language.types.string) $name): [void](language.types.void.html)

parser

El analizador XML que llama al controlador.

         name


           Contiene el nombre del elemento que provocó la llamada del
           gestor. Si el analizador gestiona la
           [casse](#xml.case-folding), este
           elemento estará en mayúsculas.







### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.4.0

Passing a non-[callable](#language.types.callable) [string](#language.types.string) to
handler is now deprecated,
use a proper callable for methods, or **[null](#constant.null)** to reset the handler.

8.4.0

The validity of handler as a [callable](#language.types.callable)
is now checked when setting the handler instead of checking when calling it.

8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

# xml_set_end_namespace_decl_handler

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

xml_set_end_namespace_decl_handler — Configura el gestor XML de datos

### Descripción

**xml_set_end_namespace_decl_handler**([XMLParser](#class.xmlparser) $parser, [callable](#language.types.callable)|[string](#language.types.string)|[null](#language.types.null) $handler): [true](#language.types.singleton)

Establece un gestor a llamar cuando se sale del contexto de un espacio
de nombres. Puede ser llamado, para cada declaración del espacio de nombres,
después del gestor de la última etiqueta del elemento cuyo espacio
de nombres ha sido declarado.

**Precaución**

    Este evento no es soportado bajo libXML,
    por lo tanto, un gestor registrado no será llamado.

### Parámetros

parser

El analizador XML.

     handler



Si **[null](#constant.null)** se pasa, el controlador se reinicia a su estado por omisión.

**Advertencia**

    Una cadena vacía también reiniciará el controlador,
    sin embargo esta funcionalidad está deprecada a partir de PHP 8.4.0.

Si handler es un [callable](#language.types.callable),
el callable se define como el controlador.

Si handler es una [string](#language.types.string),
puede ser el nombre de un método de un objeto definido con
[xml_set_object()](#function.xml-set-object).

**Advertencia**

Esta funcionalidad está deprecada a partir de PHP 8.4.0.

**Advertencia**

A partir de PHP 8.4.0, se verifica la validez del callable durante la configuración del controlador,
y no en el momento de su llamada.
Esto significa que [xml_set_object()](#function.xml-set-object) debe ser llamado antes
de definir un método como cadena como devolución de llamada.
Sin embargo, como este comportamiento también está deprecado a partir de PHP 8.4.0,
se recomienda utilizar un [callable](#language.types.callable) adecuado para el método.

       La firma del gestor debe ser:


handler([XMLParser](#class.xmlparser) $parser, [string](#language.types.string)|[false](#language.types.singleton) $prefix)

parser

El analizador XML que llama al controlador.

         prefix


           El prefijo es un [string](#language.types.string) utilizado para referenciar
           el espacio de nombres en un objeto.
           **[false](#constant.false)** si ningún prefijo existe.







### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.4.0

Passing a non-[callable](#language.types.callable) [string](#language.types.string) to
handler is now deprecated,
use a proper callable for methods, or **[null](#constant.null)** to reset the handler.

8.4.0

The validity of handler as a [callable](#language.types.callable)
is now checked when setting the handler instead of checking when calling it.

8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

### Ver también

    - [xml_set_start_namespace_decl_handler()](#function.xml-set-start-namespace-decl-handler) - Configura el gestor de caracteres

# xml_set_external_entity_ref_handler

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_set_external_entity_ref_handler — Configura el gestor XML de referencias externas

### Descripción

**xml_set_external_entity_ref_handler**([XMLParser](#class.xmlparser) $parser, [callable](#language.types.callable)|[string](#language.types.string)|[null](#language.types.null) $handler): [true](#language.types.singleton)

Establece el gestor de entidad externa del analizador XML
parser.

### Parámetros

parser

El analizador XML.

     handler



Si **[null](#constant.null)** se pasa, el controlador se reinicia a su estado por omisión.

**Advertencia**

    Una cadena vacía también reiniciará el controlador,
    sin embargo esta funcionalidad está deprecada a partir de PHP 8.4.0.

Si handler es un [callable](#language.types.callable),
el callable se define como el controlador.

Si handler es una [string](#language.types.string),
puede ser el nombre de un método de un objeto definido con
[xml_set_object()](#function.xml-set-object).

**Advertencia**

Esta funcionalidad está deprecada a partir de PHP 8.4.0.

**Advertencia**

A partir de PHP 8.4.0, se verifica la validez del callable durante la configuración del controlador,
y no en el momento de su llamada.
Esto significa que [xml_set_object()](#function.xml-set-object) debe ser llamado antes
de definir un método como cadena como devolución de llamada.
Sin embargo, como este comportamiento también está deprecado a partir de PHP 8.4.0,
se recomienda utilizar un [callable](#language.types.callable) adecuado para el método.

       La firma del gestor debe ser:


handler(
    [XMLParser](#class.xmlparser) $parser,
    [string](#language.types.string) $open_entity_names,
    [string](#language.types.string)|[false](#language.types.singleton) $base,
    [string](#language.types.string) $system_id,
    [string](#language.types.string)|[false](#language.types.singleton) $public_id
): [bool](#language.types.boolean)

parser

El analizador XML que llama al controlador.

         open_entity_names


           La lista de nombres de entidades, separados por espacios.
           Estas entidades son accesibles al análisis por esta
           entidad (incluyendo el nombre de la entidad referenciada).




         base


           La raíz para la resolución del identificador de sistema
           (system_id) de la entidad externa.




         system_id


           El identificador de sistema tal como se especifica en la
           declaración de entidad.




         public_id


           El identificador público tal como se especifica en la
           declaración de entidad, o una cadena vacía, si
           no se ha especificado ninguna declaración.
           El espacio en el identificador público será normalizado como
           se especifica en las especificaciones XML.






       El gestor debería devolver **[true](#constant.true)** si la entidad ha sido gestionada,
       de lo contrario **[false](#constant.false)**.
       Cuando se devuelve **[false](#constant.false)** el analizador XML detendrá el análisis y
       [xml_get_error_code()](#function.xml-get-error-code) devolverá
       **[XML_ERROR_EXTERNAL_ENTITY_HANDLING](#constant.xml-error-external-entity-handling)**.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.4.0

Passing a non-[callable](#language.types.callable) [string](#language.types.string) to
handler is now deprecated,
use a proper callable for methods, or **[null](#constant.null)** to reset the handler.

8.4.0

The validity of handler as a [callable](#language.types.callable)
is now checked when setting the handler instead of checking when calling it.

8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

      7.3.0

       El valor de retorno de handler ya no es
       ignorado cuando la extensión ha sido compilada contra libxml. Anteriormente,
       el valor de retorno era ignorado y el análisis nunca se detenía.



# xml_set_notation_decl_handler

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_set_notation_decl_handler — Configura el gestor XML de notaciones

### Descripción

**xml_set_notation_decl_handler**([XMLParser](#class.xmlparser) $parser, [callable](#language.types.callable)|[string](#language.types.string)|[null](#language.types.null) $handler): [true](#language.types.singleton)

Establece los gestores de inicio y fin del analizador XML
parser.

Una notación es una parte del DTD del documento, que tiene el formato siguiente:

&lt;!NOTATION &lt;parameter&gt;name&lt;/parameter&gt;
{ &lt;parameter&gt;systemId&lt;/parameter&gt; | &lt;parameter&gt;publicId&lt;/parameter&gt;? }

Consulte la sección
[» de las especificaciones XML 1.0](http://www.w3.org/TR/1998/REC-xml-19980210#Notations)
para conocer las notaciones de las entidades externas.

### Parámetros

parser

El analizador XML.

     handler



Si **[null](#constant.null)** se pasa, el controlador se reinicia a su estado por omisión.

**Advertencia**

    Una cadena vacía también reiniciará el controlador,
    sin embargo esta funcionalidad está deprecada a partir de PHP 8.4.0.

Si handler es un [callable](#language.types.callable),
el callable se define como el controlador.

Si handler es una [string](#language.types.string),
puede ser el nombre de un método de un objeto definido con
[xml_set_object()](#function.xml-set-object).

**Advertencia**

Esta funcionalidad está deprecada a partir de PHP 8.4.0.

**Advertencia**

A partir de PHP 8.4.0, se verifica la validez del callable durante la configuración del controlador,
y no en el momento de su llamada.
Esto significa que [xml_set_object()](#function.xml-set-object) debe ser llamado antes
de definir un método como cadena como devolución de llamada.
Sin embargo, como este comportamiento también está deprecado a partir de PHP 8.4.0,
se recomienda utilizar un [callable](#language.types.callable) adecuado para el método.

       La firma del gestor debe ser:


handler(
    [XMLParser](#class.xmlparser) $parser,
    [string](#language.types.string) $notation_name,
    [string](#language.types.string)|[false](#language.types.singleton) $base,
    [string](#language.types.string) $system_id,
    [string](#language.types.string)|[false](#language.types.singleton) $public_id
): [void](language.types.void.html)

parser

El analizador XML que llama al controlador.

         notation_name


           El nombre de la notación, como
           se especifica en el formato de notación anterior.





          base



           La raíz para la resolución del identificador de sistema
           (system_id) de la entidad externa.




         system_id


           Identificador de sistema para esta entidad externa.





          public_id



           Identificador público para esta entidad externa.







### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.4.0

Passing a non-[callable](#language.types.callable) [string](#language.types.string) to
handler is now deprecated,
use a proper callable for methods, or **[null](#constant.null)** to reset the handler.

8.4.0

The validity of handler as a [callable](#language.types.callable)
is now checked when setting the handler instead of checking when calling it.

8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

# xml_set_object

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_set_object — Configura un objeto como analizador XML

**Advertencia**Esta función está
_OBSOLETA_ a partir de PHP 8.4.0. Depender de esta función
está altamente desaconsejado.

### Descripción

[#[\Deprecated]](class.deprecated.html)
**xml_set_object**([XMLParser](#class.xmlparser) $parser, [object](#language.types.object) $object): [true](#language.types.singleton)

Permite que el analizador parser
sea utilizable desde un objeto. Todos los métodos de retrollamada,
asignados por [xml_set_element_handler()](#function.xml-set-element-handler),
serán los métodos de este objeto.

### Parámetros

     parser


       Una referencia de analizador XML para usar en el objeto.






     object


       El objeto en el que se debe usar el analizador XML.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Esta función está ahora deprecada,
       pase en su lugar valores [callable](#language.types.callable) apropiados a
       **xml_set_()**





8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

### Ejemplos

    **Ejemplo #1 Ejemplo con xml_set_object()**

&lt;?php
class CustomXMLParser
{
private $parser;

    function __construct()
    {
        $this-&gt;parser = xml_parser_create();

        xml_set_object($this-&gt;parser, $this);
        xml_set_element_handler($this-&gt;parser, "tag_open", "tag_close");
        xml_set_character_data_handler($this-&gt;parser, "cdata");
    }

    function parse($data)
    {
        xml_parse($this-&gt;parser, $data);
    }

    function tag_open($parser, $tag, $attributes)
    {
        var_dump($tag, $attributes);
    }

    function cdata($parser, $cdata)
    {
        var_dump($cdata);
    }

    function tag_close($parser, $tag)
    {
        var_dump($tag);
    }

}

$xml_parser = new CustomXMLParser();
$xml_parser-&gt;parse("&lt;A ID='hallo'&gt;PHP&lt;/A&gt;");
?&gt;

    El ejemplo anterior mostrará:

string(1) "A"
array(1) {
["ID"]=&gt;
string(5) "hallo"
}
string(3) "PHP"
string(1) "A"

# xml_set_processing_instruction_handler

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_set_processing_instruction_handler — Establece los gestores de instrucciones de procesamiento

### Descripción

**xml_set_processing_instruction_handler**([XMLParser](#class.xmlparser) $parser, [callable](#language.types.callable)|[string](#language.types.string)|[null](#language.types.null) $handler): [true](#language.types.singleton)

Establece el gestor de instrucciones ejecutables del analizador XML parser.

Una instrucción de procesamiento tiene la siguiente forma:

&lt;?target
data
?&gt;

**Precaución**

    El código PHP está delimitado por la instrucción de procesamiento
    &lt;?php.
    Por lo tanto, es posible tener código PHP en un documento XML.
    Sin embargo, la etiqueta de cierre de la instrucción de procesamiento
    (?&gt;) no debe formar parte de los datos.
    Si existe una etiqueta de cierre de la instrucción de procesamiento en el código
    PHP anidado, el resto del código PHP y la etiqueta de cierre "real"
    de la instrucción de procesamiento serán tratados como datos de texto.

### Parámetros

parser

El analizador XML.

     handler



Si **[null](#constant.null)** se pasa, el controlador se reinicia a su estado por omisión.

**Advertencia**

    Una cadena vacía también reiniciará el controlador,
    sin embargo esta funcionalidad está deprecada a partir de PHP 8.4.0.

Si handler es un [callable](#language.types.callable),
el callable se define como el controlador.

Si handler es una [string](#language.types.string),
puede ser el nombre de un método de un objeto definido con
[xml_set_object()](#function.xml-set-object).

**Advertencia**

Esta funcionalidad está deprecada a partir de PHP 8.4.0.

**Advertencia**

A partir de PHP 8.4.0, se verifica la validez del callable durante la configuración del controlador,
y no en el momento de su llamada.
Esto significa que [xml_set_object()](#function.xml-set-object) debe ser llamado antes
de definir un método como cadena como devolución de llamada.
Sin embargo, como este comportamiento también está deprecado a partir de PHP 8.4.0,
se recomienda utilizar un [callable](#language.types.callable) adecuado para el método.

       La firma del gestor debe ser:


handler([XMLParser](#class.xmlparser) $parser, [string](#language.types.string) $target, [string](#language.types.string) $data): [void](language.types.void.html)

parser

El analizador XML que llama al controlador.

         target


           El objetivo de la instrucción de procesamiento.




         data


           Los datos de la instrucción de procesamiento.







### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.4.0

Passing a non-[callable](#language.types.callable) [string](#language.types.string) to
handler is now deprecated,
use a proper callable for methods, or **[null](#constant.null)** to reset the handler.

8.4.0

The validity of handler as a [callable](#language.types.callable)
is now checked when setting the handler instead of checking when calling it.

8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

# xml_set_start_namespace_decl_handler

(PHP 4 &gt;= 4.0.5, PHP 5, PHP 7, PHP 8)

xml_set_start_namespace_decl_handler — Configura el gestor de caracteres

### Descripción

**xml_set_start_namespace_decl_handler**([XMLParser](#class.xmlparser) $parser, [callable](#language.types.callable)|[string](#language.types.string)|[null](#language.types.null) $handler): [true](#language.types.singleton)

Establece el gestor a llamar cuando se declara el espacio de nombres.
Las declaraciones de espacio de nombres ocurren en las etiquetas de inicio.
Pero el gestor de inicio, llamado al declarar el espacio de nombres,
es llamado antes que el gestor de la etiqueta de inicio para cada espacio
de nombres declarado en dicha etiqueta.

### Parámetros

parser

El analizador XML.

     handler



Si **[null](#constant.null)** se pasa, el controlador se reinicia a su estado por omisión.

**Advertencia**

    Una cadena vacía también reiniciará el controlador,
    sin embargo esta funcionalidad está deprecada a partir de PHP 8.4.0.

Si handler es un [callable](#language.types.callable),
el callable se define como el controlador.

Si handler es una [string](#language.types.string),
puede ser el nombre de un método de un objeto definido con
[xml_set_object()](#function.xml-set-object).

**Advertencia**

Esta funcionalidad está deprecada a partir de PHP 8.4.0.

**Advertencia**

A partir de PHP 8.4.0, se verifica la validez del callable durante la configuración del controlador,
y no en el momento de su llamada.
Esto significa que [xml_set_object()](#function.xml-set-object) debe ser llamado antes
de definir un método como cadena como devolución de llamada.
Sin embargo, como este comportamiento también está deprecado a partir de PHP 8.4.0,
se recomienda utilizar un [callable](#language.types.callable) adecuado para el método.

       La firma del gestor debe ser:


handler([XMLParser](#class.xmlparser) $parser, [string](#language.types.string)|[false](#language.types.singleton) $prefix, [string](#language.types.string) $uri): [void](language.types.void.html)

parser

El analizador XML que llama al controlador.

         prefix


           El prefijo es un [string](#language.types.string) utilizado para referenciar
           el espacio de nombres de un objeto XML.
           **[false](#constant.false)** si no existe ningún prefijo.




         uri


           Identificador de recurso uniforme (URI) de un
           espacio de nombres.







### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.4.0

Passing a non-[callable](#language.types.callable) [string](#language.types.string) to
handler is now deprecated,
use a proper callable for methods, or **[null](#constant.null)** to reset the handler.

8.4.0

The validity of handler as a [callable](#language.types.callable)
is now checked when setting the handler instead of checking when calling it.

8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

### Ver también

    - [xml_set_end_namespace_decl_handler()](#function.xml-set-end-namespace-decl-handler) - Configura el gestor XML de datos

# xml_set_unparsed_entity_decl_handler

(PHP 4, PHP 5, PHP 7, PHP 8)

xml_set_unparsed_entity_decl_handler — Establece los gestores de entidades no analizadas

### Descripción

**xml_set_unparsed_entity_decl_handler**([XMLParser](#class.xmlparser) $parser, [callable](#language.types.callable)|[string](#language.types.string)|[null](#language.types.null) $handler): [true](#language.types.singleton)

Establece los gestores de entidades no analizadas para el analizador XML parser.

El gestor handler será llamado si el analizador XML encuentra una declaración de entidad externa con una declaración NDATA, como sigue:

&lt;!ENTITY &lt;parameter&gt;name&lt;/parameter&gt; {&lt;parameter&gt;publicId&lt;/parameter&gt; | &lt;parameter&gt;systemId&lt;/parameter&gt;}
NDATA &lt;parameter&gt;notationName&lt;/parameter&gt;

Consulte la sección [» de las especificaciones XML 1.0](http://www.w3.org/TR/1998/REC-xml-19980210#sec-external-ent) para conocer las notaciones de las entidades externas.

### Parámetros

parser

El analizador XML.

     handler



Si **[null](#constant.null)** se pasa, el controlador se reinicia a su estado por omisión.

**Advertencia**

    Una cadena vacía también reiniciará el controlador,
    sin embargo esta funcionalidad está deprecada a partir de PHP 8.4.0.

Si handler es un [callable](#language.types.callable),
el callable se define como el controlador.

Si handler es una [string](#language.types.string),
puede ser el nombre de un método de un objeto definido con
[xml_set_object()](#function.xml-set-object).

**Advertencia**

Esta funcionalidad está deprecada a partir de PHP 8.4.0.

**Advertencia**

A partir de PHP 8.4.0, se verifica la validez del callable durante la configuración del controlador,
y no en el momento de su llamada.
Esto significa que [xml_set_object()](#function.xml-set-object) debe ser llamado antes
de definir un método como cadena como devolución de llamada.
Sin embargo, como este comportamiento también está deprecado a partir de PHP 8.4.0,
se recomienda utilizar un [callable](#language.types.callable) adecuado para el método.

       La firma del gestor debe ser:


handler(
    [XMLParser](#class.xmlparser) $parser,
    [string](#language.types.string) $entity_name,
    [string](#language.types.string)|[false](#language.types.singleton) $base,
    [string](#language.types.string) $system_id,
    [string](#language.types.string)|[false](#language.types.singleton) $public_id,
    [string](#language.types.string)|[false](#language.types.singleton) $notation_name
): [void](language.types.void.html)

parser

El analizador XML que llama al controlador.

         entity_name


           El nombre de la entidad que va a ser definida.




         base


           La raíz para la resolución del identificador de sistema (system_id) de la entidad externa.




         system_id


           Identificador de sistema para esta entidad externa.




         public_id


           Identificador público para esta entidad externa.




         notation_name


           Nombre de la notación de esta entidad. (Véase [xml_set_notation_decl_handler()](#function.xml-set-notation-decl-handler)).







### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción







8.4.0

Passing a non-[callable](#language.types.callable) [string](#language.types.string) to
handler is now deprecated,
use a proper callable for methods, or **[null](#constant.null)** to reset the handler.

8.4.0

The validity of handler as a [callable](#language.types.callable)
is now checked when setting the handler instead of checking when calling it.

8.0.0

parser ahora espera una instancia de [XMLParser](#class.xmlparser)
en lugar de un [resource](#language.types.resource) xml.

## Tabla de contenidos

- [xml_error_string](#function.xml-error-string) — Lee el mensaje de error del analizador XML
- [xml_get_current_byte_index](#function.xml-get-current-byte-index) — Devuelve el índice del byte actual de un analizador XML
- [xml_get_current_column_number](#function.xml-get-current-column-number) — Devuelve el número de columna actual de un analizador XML
- [xml_get_current_line_number](#function.xml-get-current-line-number) — Devuelve el número de línea actual de un analizador XML
- [xml_get_error_code](#function.xml-get-error-code) — Obtiene el código de error del analizador XML
- [xml_parse](#function.xml-parse) — Inicia el análisis de un documento XML
- [xml_parse_into_struct](#function.xml-parse-into-struct) — Analiza una estructura XML
- [xml_parser_create](#function.xml-parser-create) — Creación de un analizador XML
- [xml_parser_create_ns](#function.xml-parser-create-ns) — Crea un analizador XML
- [xml_parser_free](#function.xml-parser-free) — Destruye un analizador XML
- [xml_parser_get_option](#function.xml-parser-get-option) — Lee las opciones de un analizador XML
- [xml_parser_set_option](#function.xml-parser-set-option) — Establece las opciones de un analizador XML
- [xml_set_character_data_handler](#function.xml-set-character-data-handler) — Establece los gestores de datos de caracteres
- [xml_set_default_handler](#function.xml-set-default-handler) — Establece el gestor XML por defecto
- [xml_set_element_handler](#function.xml-set-element-handler) — Establece los gestores de inicio y fin de etiqueta XML
- [xml_set_end_namespace_decl_handler](#function.xml-set-end-namespace-decl-handler) — Configura el gestor XML de datos
- [xml_set_external_entity_ref_handler](#function.xml-set-external-entity-ref-handler) — Configura el gestor XML de referencias externas
- [xml_set_notation_decl_handler](#function.xml-set-notation-decl-handler) — Configura el gestor XML de notaciones
- [xml_set_object](#function.xml-set-object) — Configura un objeto como analizador XML
- [xml_set_processing_instruction_handler](#function.xml-set-processing-instruction-handler) — Establece los gestores de instrucciones de procesamiento
- [xml_set_start_namespace_decl_handler](#function.xml-set-start-namespace-decl-handler) — Configura el gestor de caracteres
- [xml_set_unparsed_entity_decl_handler](#function.xml-set-unparsed-entity-decl-handler) — Establece los gestores de entidades no analizadas

# La clase XMLParser

(PHP 8)

## Introducción

    Una clase completamente opaca que reemplaza a los recursos xml a partir de PHP 8.0.0.

## Sinopsis de la Clase

     final
     class **XMLParser**
     {

}

- [Introducción](#intro.xml)
- [Instalación/Configuración](#xml.setup)<li>[Requerimientos](#xml.requirements)
- [Instalación](#xml.installation)
- [Tipos de recursos](#xml.resources)
  </li>- [Constantes predefinidas](#xml.constants)
- [Manejadores de eventos](#xml.eventhandlers)
- [Case Folding](#xml.case-folding)
- [Error Codes](#xml.error-codes)
- [Codificación de caracteres](#xml.encoding)
- [Ejemplos](#xml.examples)<li>[Ejemplo de estructura XML](#example.xml-structure)
- [Conversión XML -&gt; HTML](#example.xml-map-tags)
- [Entidad externa](#example.xml-external-entity)
- [Análisis XML con una clase](#example.xml-parsing-with-class)
  </li>- [Funciones del Intérprete XML](#ref.xml)<li>[xml_error_string](#function.xml-error-string) — Lee el mensaje de error del analizador XML
- [xml_get_current_byte_index](#function.xml-get-current-byte-index) — Devuelve el índice del byte actual de un analizador XML
- [xml_get_current_column_number](#function.xml-get-current-column-number) — Devuelve el número de columna actual de un analizador XML
- [xml_get_current_line_number](#function.xml-get-current-line-number) — Devuelve el número de línea actual de un analizador XML
- [xml_get_error_code](#function.xml-get-error-code) — Obtiene el código de error del analizador XML
- [xml_parse](#function.xml-parse) — Inicia el análisis de un documento XML
- [xml_parse_into_struct](#function.xml-parse-into-struct) — Analiza una estructura XML
- [xml_parser_create](#function.xml-parser-create) — Creación de un analizador XML
- [xml_parser_create_ns](#function.xml-parser-create-ns) — Crea un analizador XML
- [xml_parser_free](#function.xml-parser-free) — Destruye un analizador XML
- [xml_parser_get_option](#function.xml-parser-get-option) — Lee las opciones de un analizador XML
- [xml_parser_set_option](#function.xml-parser-set-option) — Establece las opciones de un analizador XML
- [xml_set_character_data_handler](#function.xml-set-character-data-handler) — Establece los gestores de datos de caracteres
- [xml_set_default_handler](#function.xml-set-default-handler) — Establece el gestor XML por defecto
- [xml_set_element_handler](#function.xml-set-element-handler) — Establece los gestores de inicio y fin de etiqueta XML
- [xml_set_end_namespace_decl_handler](#function.xml-set-end-namespace-decl-handler) — Configura el gestor XML de datos
- [xml_set_external_entity_ref_handler](#function.xml-set-external-entity-ref-handler) — Configura el gestor XML de referencias externas
- [xml_set_notation_decl_handler](#function.xml-set-notation-decl-handler) — Configura el gestor XML de notaciones
- [xml_set_object](#function.xml-set-object) — Configura un objeto como analizador XML
- [xml_set_processing_instruction_handler](#function.xml-set-processing-instruction-handler) — Establece los gestores de instrucciones de procesamiento
- [xml_set_start_namespace_decl_handler](#function.xml-set-start-namespace-decl-handler) — Configura el gestor de caracteres
- [xml_set_unparsed_entity_decl_handler](#function.xml-set-unparsed-entity-decl-handler) — Establece los gestores de entidades no analizadas
  </li>- [XMLParser](#class.xmlparser) — La clase XMLParser
