# Modelo Objeto de un Documento

# Introducción

La extensión DOM permite realizar operaciones sobre documentos XML y HTML
mediante la API DOM de PHP.

**Nota**:

La extensión DOM utiliza el codificado UTF-8. Utilice [mb_convert_encoding()](#function.mb-convert-encoding),
[UConverter::transcode()](#uconverter.transcode), o [iconv()](#function.iconv) para manipular otros codificados.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#dom.requirements)
- [Instalación](#dom.installation)

    ## Requerimientos

Esta extensión requiere la extensión PHP [libxml](#book.libxml).
Esto significa pasar la opción de configuración
**--with-libxml**, o anterior a PHP 7.4
la opción de configuración **--enable-libxml**,
aunque esto se realiza implícitamente ya que libxml está activado por omisión.

## Instalación

Esta extensión está activada por omisión. Puede ser desactivada utilizando la opción de configuración:
**--disable-dom**

# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

  <caption>**Constantes XML**</caption>
  
   
    
     Constantes
     Valor
     Descripción


      **[XML_ELEMENT_NODE](#constant.xml-element-node)**
      ([int](#language.types.integer))

     1
     El nodo es un [DOMElement](#class.domelement) / [Dom\Element](#class.dom-element)




      **[XML_ATTRIBUTE_NODE](#constant.xml-attribute-node)**
      ([int](#language.types.integer))

     2
     El nodo es un [DOMAttr](#class.domattr) / [Dom\Attr](#class.dom-attr)




      **[XML_TEXT_NODE](#constant.xml-text-node)**
      ([int](#language.types.integer))

     3
     El nodo es un [DOMText](#class.domtext) / [Dom\Text](#class.dom-text)




      **[XML_CDATA_SECTION_NODE](#constant.xml-cdata-section-node)**
      ([int](#language.types.integer))

     4
     El nodo es un [DOMCharacterData](#class.domcharacterdata) / [Dom\CharacterData](#class.dom-characterdata)




      **[XML_ENTITY_REF_NODE](#constant.xml-entity-ref-node)**
      ([int](#language.types.integer))

     5
     El nodo es un [DOMEntityReference](#class.domentityreference) / [Dom\EntityReference](#class.dom-entityreference)




      **[XML_ENTITY_NODE](#constant.xml-entity-node)**
      ([int](#language.types.integer))

     6
     El nodo es un [DOMEntity](#class.domentity) / [Dom\Entity](#class.dom-entity)




      **[XML_PI_NODE](#constant.xml-pi-node)**
      ([int](#language.types.integer))

     7
     El nodo es un [DOMProcessingInstruction](#class.domprocessinginstruction) / [Dom\ProcessingInstruction](#class.dom-processinginstruction)




      **[XML_COMMENT_NODE](#constant.xml-comment-node)**
      ([int](#language.types.integer))

     8
     El nodo es un [DOMComment](#class.domcomment) / [Dom\Comment](#class.dom-comment)




      **[XML_DOCUMENT_NODE](#constant.xml-document-node)**
      ([int](#language.types.integer))

     9
     El nodo es un [DOMDocument](#class.domdocument) / [Dom\Document](#class.dom-document)




      **[XML_DOCUMENT_TYPE_NODE](#constant.xml-document-type-node)**
      ([int](#language.types.integer))

     10
     El nodo es un [DOMDocumentType](#class.domdocumenttype) / [Dom\DocumentType](#class.dom-documenttype)




      **[XML_DOCUMENT_FRAG_NODE](#constant.xml-document-frag-node)**
      ([int](#language.types.integer))

     11
     El nodo es un [DOMDocumentFragment](#class.domdocumentfragment) / [Dom\DocumentFragment](#class.dom-documentfragment)




      **[XML_NOTATION_NODE](#constant.xml-notation-node)**
      ([int](#language.types.integer))

     12
     El nodo es un [DOMNotation](#class.domnotation) / [Dom\Notation](#class.dom-notation)




      **[XML_HTML_DOCUMENT_NODE](#constant.xml-html-document-node)**
      ([int](#language.types.integer))

     13
      




      **[XML_DTD_NODE](#constant.xml-dtd-node)**
      ([int](#language.types.integer))

     14
      




      **[XML_ELEMENT_DECL_NODE](#constant.xml-element-decl-node)**
      ([int](#language.types.integer))

     15
      




      **[XML_ATTRIBUTE_DECL_NODE](#constant.xml-attribute-decl-node)**
      ([int](#language.types.integer))

     16
      




      **[XML_ENTITY_DECL_NODE](#constant.xml-entity-decl-node)**
      ([int](#language.types.integer))

     17
      




      **[XML_NAMESPACE_DECL_NODE](#constant.xml-namespace-decl-node)**
      ([int](#language.types.integer))

     18
      




      **[XML_ATTRIBUTE_CDATA](#constant.xml-attribute-cdata)**
      ([int](#language.types.integer))

     1
      




      **[XML_ATTRIBUTE_ID](#constant.xml-attribute-id)**
      ([int](#language.types.integer))

     2
      




      **[XML_ATTRIBUTE_IDREF](#constant.xml-attribute-idref)**
      ([int](#language.types.integer))

     3
      




      **[XML_ATTRIBUTE_IDREFS](#constant.xml-attribute-idrefs)**
      ([int](#language.types.integer))

     4
      




      **[XML_ATTRIBUTE_ENTITY](#constant.xml-attribute-entity)**
      ([int](#language.types.integer))

     5
      




      **[XML_ATTRIBUTE_NMTOKEN](#constant.xml-attribute-nmtoken)**
      ([int](#language.types.integer))

     7
      




      **[XML_ATTRIBUTE_NMTOKENS](#constant.xml-attribute-nmtokens)**
      ([int](#language.types.integer))

     8
      




      **[XML_ATTRIBUTE_ENUMERATION](#constant.xml-attribute-enumeration)**
      ([int](#language.types.integer))

     9
      




      **[XML_ATTRIBUTE_NOTATION](#constant.xml-attribute-notation)**
      ([int](#language.types.integer))

     10
      




      **[XML_LOCAL_NAMESPACE](#constant.xml-local-namespace)**
      ([int](#language.types.integer))

      
     Un nodo de declaración de espacio de nombres.

   <caption>**Constantes HTML**</caption>
   
    
     
      Constantes
      Descripción


       **[Dom\HTML_NO_DEFAULT_NS](#constant.dom-html-no-default-ns)**
       ([int](#language.types.integer))



        Esto desactiva la definición del espacio de nombres de los elementos durante el análisis
        al utilizar [Dom\HTMLDocument](#class.dom-htmldocument).
        Esto existe para la compatibilidad ascendente con
        [DOMDocument](#class.domdocument).

       **Precaución**

         Algunos métodos DOM dependen de la definición del espacio de nombres
         HTML.
         Al utilizar esta opción del analizador, el comportamiento de estos métodos puede ser
         influenciado.







   <caption>**Constantes [DOMException](#class.domexception) / Dom\Exception**</caption>
   
    
     
      Constantes
      Valor
      Descripción


       **[DOM_PHP_ERR](#constant.dom-php-err)**
       ([int](#language.types.integer))

      0

       Código de error que no forma parte de la especificación DOM. Destinado a errores PHP.
       Deprecado a partir de PHP 8.4.0 ya que ya no se utiliza.
       Antes de PHP 8.4.0, se utilizaba de manera inconsistente para indicar
       situaciones de falta de memoria.





       **[DOM_INDEX_SIZE_ERR](#constant.dom-index-size-err)** / **[Dom\INDEX_SIZE_ERR](#constant.dom-index-size-err)**
       ([int](#language.types.integer))

      1

       Si el índice o el tamaño es negativo, o superior al valor permitido.





       **[DOMSTRING_SIZE_ERR](#constant.domstring-size-err)** / **[Dom\STRING_SIZE_ERR](#constant.dom-string-size-err)**
       ([int](#language.types.integer))

      2

       Si el rango de texto especificado no cabe en una
       [string](#language.types.string).





       **[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)** / **[Dom\HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**
       ([int](#language.types.integer))

      3
      Si un nodo es insertado en un lugar donde no tiene cabida




       **[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)** / **[Dom\WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**
       ([int](#language.types.integer))

      4

       Si un nodo es utilizado en un documento diferente al que lo creó.





       **[DOM_INVALID_CHARACTER_ERR](#constant.dom-invalid-character-err)** / **[Dom\INVALID_CHARACTER_ERR](#constant.dom-invalid-character-err)**
       ([int](#language.types.integer))

      5

       Si se especifica un carácter inválido o ilegal, como en un nombre.





       **[DOM_NO_DATA_ALLOWED_ERR](#constant.dom-no-data-allowed-err)** / **[Dom\NO_DATA_ALLOWED_ERR](#constant.dom-no-data-allowed-err)**
       ([int](#language.types.integer))

      6

       Si se especifican datos para un nodo que no soporta datos.





       **[DOM_NO_MODIFICATION_ALLOWED_ERR](#constant.dom-no-modification-allowed-err)** / **[Dom\NO_MODIFICATION_ALLOWED_ERR](#constant.dom-no-modification-allowed-err)**
       ([int](#language.types.integer))

      7

       Si se intenta modificar un objeto cuando las modificaciones no están permitidas.





       **[DOM_NOT_FOUND_ERR](#constant.dom-not-found-err)** / **[Dom\NOT_FOUND_ERR](#constant.dom-not-found-err)**
       ([int](#language.types.integer))

      8

       Si se intenta referenciar un nodo en un contexto donde no existe.





       **[DOM_NOT_SUPPORTED_ERR](#constant.dom-not-supported-err)** / **[Dom\NOT_SUPPORTED_ERR](#constant.dom-not-supported-err)**
       ([int](#language.types.integer))

      9

       Si la implementación no soporta el tipo de objeto o la operación solicitada.





       **[DOM_INUSE_ATTRIBUTE_ERR](#constant.dom-inuse-attribute-err)** / **[Dom\INUSE_ATTRIBUTE_ERR](#constant.dom-inuse-attribute-err)**
       ([int](#language.types.integer))

      10

       Si se intenta añadir un atributo que ya está siendo utilizado en otro lugar.





       **[DOM_INVALID_STATE_ERR](#constant.dom-invalid-state-err)** / **[Dom\INVALID_STATE_ERR](#constant.dom-invalid-state-err)**
       ([int](#language.types.integer))

      11

       Si se intenta utilizar un objeto que no es, o ya no es, utilizable.





       **[DOM_SYNTAX_ERR](#constant.dom-syntax-err)** / **[Dom\SYNTAX_ERR](#constant.dom-syntax-err)**
       ([int](#language.types.integer))

      12
      Si se especifica una cadena de caracteres inválida o ilegal.




       **[DOM_INVALID_MODIFICATION_ERR](#constant.dom-invalid-modification-err)** / **[Dom\INVALID_MODIFICATION_ERR](#constant.dom-invalid-modification-err)**
       ([int](#language.types.integer))

      13
      Si se intenta modificar el tipo del objeto subyacente.




       **[DOM_NAMESPACE_ERR](#constant.dom-namespace-err)** / **[Dom\NAMESPACE_ERR](#constant.dom-namespace-err)**
       ([int](#language.types.integer))

      14

       Si se intenta crear o modificar un objeto de manera incorrecta
       con respecto a los espacios de nombres.





       **[DOM_INVALID_ACCESS_ERR](#constant.dom-invalid-access-err)** / **[Dom\INVALID_ACCESS_ERR](#constant.dom-invalid-access-err)**
       ([int](#language.types.integer))

      15

       Si un parámetro o una operación no es soportada por el objeto subyacente.





       **[DOM_VALIDATION_ERR](#constant.dom-validation-err)** / **[Dom\VALIDATION_ERR](#constant.dom-validation-err)**
       ([int](#language.types.integer))

      16

       Si una llamada a un método como insertBefore o removeChild haría que el nodo
       fuera inválido con respecto a la "valididad parcial", se lanzaría esta excepción y
       la operación no se realizaría.



# Ejemplos

Muchos ejemplos en esta referencia requieren un fichero XML. Utilizaremos
book.xml que contiene lo siguiente:

**Ejemplo #1 book.xml**

&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;!DOCTYPE book PUBLIC "-//OASIS//DTD DocBook XML V4.1.2//EN"
"http://www.oasis-open.org/docbook/xml/4.1.2/docbookx.dtd" [
]&gt;
&lt;book id="listing"&gt;
&lt;title&gt;Mis listas&lt;/title&gt;
&lt;chapter id="books"&gt;
&lt;title&gt;Mis libros&lt;/title&gt;
&lt;para&gt;
&lt;informaltable&gt;
&lt;tgroup cols="4"&gt;
&lt;thead&gt;
&lt;row&gt;
&lt;entry&gt;Título&lt;/entry&gt;
&lt;entry&gt;Autor&lt;/entry&gt;
&lt;entry&gt;Idioma&lt;/entry&gt;
&lt;entry&gt;ISBN&lt;/entry&gt;
&lt;/row&gt;
&lt;/thead&gt;
&lt;tbody&gt;
&lt;row&gt;
&lt;entry&gt;The Grapes of Wrath&lt;/entry&gt;
&lt;entry&gt;John Steinbeck&lt;/entry&gt;
&lt;entry&gt;en&lt;/entry&gt;
&lt;entry&gt;0140186409&lt;/entry&gt;
&lt;/row&gt;
&lt;row&gt;
&lt;entry&gt;The Pearl&lt;/entry&gt;
&lt;entry&gt;John Steinbeck&lt;/entry&gt;
&lt;entry&gt;en&lt;/entry&gt;
&lt;entry&gt;014017737X&lt;/entry&gt;
&lt;/row&gt;
&lt;row&gt;
&lt;entry&gt;Samarcande&lt;/entry&gt;
&lt;entry&gt;Amine Maalouf&lt;/entry&gt;
&lt;entry&gt;fr&lt;/entry&gt;
&lt;entry&gt;2253051209&lt;/entry&gt;
&lt;/row&gt;
&lt;!-- TODO: Tengo muchos libros pendientes de añadir.. --&gt;
&lt;/tbody&gt;
&lt;/tgroup&gt;
&lt;/informaltable&gt;
&lt;/para&gt;
&lt;/chapter&gt;
&lt;/book&gt;

# La clase [DOMAttr](#class.domattr)

(PHP 5, PHP 7, PHP 8)

## Introducción

    **DOMAttr** representa un atributo en el objeto
    [DOMElement](#class.domelement).

## Sinopsis de la Clase

     class **DOMAttr**



     extends
      [DOMNode](#class.domnode)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [DOMNode::DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     [string](#language.types.string)
      [$name](#domattr.props.name);

    public
     readonly
     [bool](#language.types.boolean)
      [$specified](#domattr.props.specified);

    public
     [string](#language.types.string)
      [$value](#domattr.props.value);

    public
     readonly
     ?[DOMElement](#class.domelement)
      [$ownerElement](#domattr.props.ownerelement);

    public
     readonly
     [mixed](#language.types.mixed)
      [$schemaTypeInfo](#domattr.props.schematypeinfo);


    /* Propiedades heredadas */
    public
     readonly
     [string](#language.types.string)
      [$nodeName](#domnode.props.nodename);

public
?[string](#language.types.string)
[$nodeValue](#domnode.props.nodevalue);
public
readonly
[int](#language.types.integer)
[$nodeType](#domnode.props.nodetype);
public
readonly
?[DOMNode](#class.domnode)
[$parentNode](#domnode.props.parentnode);
public
readonly
?[DOMElement](#class.domelement)
[$parentElement](#domnode.props.parentelement);
public
readonly
[DOMNodeList](#class.domnodelist)
[$childNodes](#domnode.props.childnodes);
public
readonly
?[DOMNode](#class.domnode)
[$firstChild](#domnode.props.firstchild);
public
readonly
?[DOMNode](#class.domnode)
[$lastChild](#domnode.props.lastchild);
public
readonly
?[DOMNode](#class.domnode)
[$previousSibling](#domnode.props.previoussibling);
public
readonly
?[DOMNode](#class.domnode)
[$nextSibling](#domnode.props.nextsibling);
public
readonly
?[DOMNamedNodeMap](#class.domnamednodemap)
[$attributes](#domnode.props.attributes);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#domnode.props.isconnected);
public
readonly
?[DOMDocument](#class.domdocument)
[$ownerDocument](#domnode.props.ownerdocument);
public
readonly
?[string](#language.types.string)
[$namespaceURI](#domnode.props.namespaceuri);
public
[string](#language.types.string)
[$prefix](#domnode.props.prefix);
public
readonly
?[string](#language.types.string)
[$localName](#domnode.props.localname);
public
readonly
?[string](#language.types.string)
[$baseURI](#domnode.props.baseuri);
public
[string](#language.types.string)
[$textContent](#domnode.props.textcontent);

    /* Métodos */

public [\_\_construct](#domattr.construct)([string](#language.types.string) $name, [string](#language.types.string) $value = "")

    public [isId](#domattr.isid)(): [bool](#language.types.boolean)


    /* Métodos heredados */
    public [DOMNode::appendChild](#domnode.appendchild)([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)

public [DOMNode::C14N](#domnode.c14n)(
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)
public [DOMNode::C14NFile](#domnode.c14nfile)(
    [string](#language.types.string) $uri,
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)
public [DOMNode::cloneNode](#domnode.clonenode)([bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::compareDocumentPosition](#domnode.comparedocumentposition)([DOMNode](#class.domnode) $other): [int](#language.types.integer)
public [DOMNode::contains](#domnode.contains)([DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null) $other): [bool](#language.types.boolean)
public [DOMNode::getLineNo](#domnode.getlineno)(): [int](#language.types.integer)
public [DOMNode::getNodePath](#domnode.getnodepath)(): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::getRootNode](#domnode.getrootnode)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [DOMNode](#class.domnode)
public [DOMNode::hasAttributes](#domnode.hasattributes)(): [bool](#language.types.boolean)
public [DOMNode::hasChildNodes](#domnode.haschildnodes)(): [bool](#language.types.boolean)
public [DOMNode::insertBefore](#domnode.insertbefore)([DOMNode](#class.domnode) $node, [?](#language.types.null)[DOMNode](#class.domnode) $child = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::isDefaultNamespace](#domnode.isdefaultnamespace)([string](#language.types.string) $namespaceURI): [bool](#language.types.boolean)
public [DOMNode::isEqualNode](#domnode.isequalnode)([?](#language.types.null)[DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSameNode](#domnode.issamenode)([DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSupported](#domnode.issupported)([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)
public [DOMNode::lookupNamespaceURI](#domnode.lookupnamespaceuri)([?](#language.types.null)[string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::lookupPrefix](#domnode.lookupprefix)([string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::normalize](#domnode.normalize)(): [void](language.types.void.html)
public [DOMNode::removeChild](#domnode.removechild)([DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::replaceChild](#domnode.replacechild)([DOMNode](#class.domnode) $node, [DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::\_\_sleep](#domnode.sleep)(): [array](#language.types.array)
public [DOMNode::\_\_wakeup](#domnode.wakeup)(): [void](language.types.void.html)

}

## Propiedades

     name

      El nombre del atributo.





     ownerElement

      El elemento que contiene el atributo o **[null](#constant.null)**.





     schemaTypeInfo

      Aún no implementado, siempre vale **[null](#constant.null)**.





     specified

      Aún no implementado, siempre vale **[null](#constant.null)**.





     value

      El valor del atributo.


      **Nota**:



        Tenga en cuenta que las entidades XML se expanden cuando se define un valor.
        Por lo tanto, el carácter &amp; tiene un significado especial.
        Establecer valor a sí mismo fallará cuando valor contiene un **[&amp;](#constant.&amp;)**.
        Para evitar la expansión de entidades, utilice en su lugar [DOMElement::setAttribute()](#domelement.setattribute).






## Ver también

     - [» Especificación W3C de Attr](http://www.w3.org/TR/2003/WD-DOM-Level-3-Core-20030226/DOM3-Core.html#core-ID-637646024)

# DOMAttr::\_\_construct

(PHP 5, PHP 7, PHP 8)

DOMAttr::\_\_construct — Crea un nuevo objeto [DOMAttr](#class.domattr)

### Descripción

public **DOMAttr::\_\_construct**([string](#language.types.string) $name, [string](#language.types.string) $value = "")

Crea un nuevo objeto [DOMAttr](#class.domattr).
Este objeto es de solo lectura. Puede ser añadido a un documento, pero los
nodos adicionales no pueden ser añadidos a este nodo mientras este nodo esté asociado a un documento. Para crear un nodo accesible en escritura,
utilice [DOMDocument::createAttribute](#domdocument.createattribute).

### Parámetros

     name


       El nombre del atributo.






     value


       El valor del atributo.





### Ejemplos

    **Ejemplo #1 Creación de un nuevo objeto [DOMAttr](#class.domattr)**

&lt;?php

$dom = new DOMDocument('1.0', 'utf-8');
$element = $dom-&gt;appendChild(new DOMElement('root'));
$attr = $element-&gt;setAttributeNode(new DOMAttr('attr', 'attrvalue'));
echo $dom-&gt;saveXML();

?&gt;

    El ejemplo anterior mostrará:

&lt;?xml version="1.0" encoding="iso-8859-1"?&gt;
&lt;root attr="attrvalue"/&gt;

### Ver también

    - [DOMDocument::createAttribute()](#domdocument.createattribute) - Crear nuevo attribute

# DOMAttr::isId

(PHP 5, PHP 7, PHP 8)

DOMAttr::isId —
Verifica si el atributo es un identificador definido

### Descripción

public **DOMAttr::isId**(): [bool](#language.types.boolean)

Esta función verifica si el atributo es un identificador definido.

De acuerdo con el estándar DOM, esto requiere un DTD que defina
el atributo ID que sea del tipo ID. Se debe validar el documento con la función
[DOMDocument::validate](#domdocument.validate)
o la propiedad [DOMDocument::$validateOnParse](#domdocument.props.validateonparse) antes de utilizar
esta función.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si este atributo es un ID definido, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Ejemplo con DOMAttr::isId()**

&lt;?php

$doc = new DOMDocument;

// Debemos validar nuestro documento antes de referirnos al ID
$doc-&gt;validateOnParse = true;
$doc-&gt;load('examples/book-docbook.xml');

// Obtenemos el atributo nombrado id del elemento chapter
$attr = $doc-&gt;getElementsByTagName('chapter')-&gt;item(0)-&gt;getAttributeNode('id');

var_dump($attr-&gt;isId()); // bool(true)

?&gt;

## Tabla de contenidos

- [DOMAttr::\_\_construct](#domattr.construct) — Crea un nuevo objeto DOMAttr
- [DOMAttr::isId](#domattr.isid) — Verifica si el atributo es un identificador definido

# La clase DOMCdataSection

(PHP 5, PHP 7, PHP 8)

## Introducción

    La clase **DOMCdataSection** hereda de la clase
    [DOMText](#class.domtext) para la
    representación textual de la construcción del bloque CData.

## Sinopsis de la Clase

     class **DOMCdataSection**



     extends
      [DOMText](#class.domtext)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [DOMNode::DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades heredadas */
    public
     readonly
     [string](#language.types.string)
      [$wholeText](#domtext.props.wholetext);

    public
     [string](#language.types.string)
      [$data](#domcharacterdata.props.data);

public
readonly
[int](#language.types.integer)
[$length](#domcharacterdata.props.length);
public
readonly
?[DOMElement](#class.domelement)
[$previousElementSibling](#domcharacterdata.props.previouselementsibling);
public
readonly
?[DOMElement](#class.domelement)
[$nextElementSibling](#domcharacterdata.props.nextelementsibling);

    public
     readonly
     [string](#language.types.string)
      [$nodeName](#domnode.props.nodename);

public
?[string](#language.types.string)
[$nodeValue](#domnode.props.nodevalue);
public
readonly
[int](#language.types.integer)
[$nodeType](#domnode.props.nodetype);
public
readonly
?[DOMNode](#class.domnode)
[$parentNode](#domnode.props.parentnode);
public
readonly
?[DOMElement](#class.domelement)
[$parentElement](#domnode.props.parentelement);
public
readonly
[DOMNodeList](#class.domnodelist)
[$childNodes](#domnode.props.childnodes);
public
readonly
?[DOMNode](#class.domnode)
[$firstChild](#domnode.props.firstchild);
public
readonly
?[DOMNode](#class.domnode)
[$lastChild](#domnode.props.lastchild);
public
readonly
?[DOMNode](#class.domnode)
[$previousSibling](#domnode.props.previoussibling);
public
readonly
?[DOMNode](#class.domnode)
[$nextSibling](#domnode.props.nextsibling);
public
readonly
?[DOMNamedNodeMap](#class.domnamednodemap)
[$attributes](#domnode.props.attributes);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#domnode.props.isconnected);
public
readonly
?[DOMDocument](#class.domdocument)
[$ownerDocument](#domnode.props.ownerdocument);
public
readonly
?[string](#language.types.string)
[$namespaceURI](#domnode.props.namespaceuri);
public
[string](#language.types.string)
[$prefix](#domnode.props.prefix);
public
readonly
?[string](#language.types.string)
[$localName](#domnode.props.localname);
public
readonly
?[string](#language.types.string)
[$baseURI](#domnode.props.baseuri);
public
[string](#language.types.string)
[$textContent](#domnode.props.textcontent);

    /* Métodos */

public [\_\_construct](#domcdatasection.construct)([string](#language.types.string) $data)

    /* Métodos heredados */
    public [DOMText::isElementContentWhitespace](#domtext.iselementcontentwhitespace)(): [bool](#language.types.boolean)

public [DOMText::isWhitespaceInElementContent](#domtext.iswhitespaceinelementcontent)(): [bool](#language.types.boolean)
public [DOMText::splitText](#domtext.splittext)([int](#language.types.integer) $offset): [DOMText](#class.domtext)|[false](#language.types.singleton)

    public [DOMCharacterData::after](#domcharacterdata.after)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

public [DOMCharacterData::appendData](#domcharacterdata.appenddata)([string](#language.types.string) $data): [true](#language.types.singleton)
public [DOMCharacterData::before](#domcharacterdata.before)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [DOMCharacterData::deleteData](#domcharacterdata.deletedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [bool](#language.types.boolean)
public [DOMCharacterData::insertData](#domcharacterdata.insertdata)([int](#language.types.integer) $offset, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [DOMCharacterData::remove](#domcharacterdata.remove)(): [void](language.types.void.html)
public [DOMCharacterData::replaceData](#domcharacterdata.replacedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [DOMCharacterData::replaceWith](#domcharacterdata.replacewith)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [DOMCharacterData::substringData](#domcharacterdata.substringdata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [string](#language.types.string)|[false](#language.types.singleton)

    public [DOMNode::appendChild](#domnode.appendchild)([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)

public [DOMNode::C14N](#domnode.c14n)(
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)
public [DOMNode::C14NFile](#domnode.c14nfile)(
    [string](#language.types.string) $uri,
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)
public [DOMNode::cloneNode](#domnode.clonenode)([bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::compareDocumentPosition](#domnode.comparedocumentposition)([DOMNode](#class.domnode) $other): [int](#language.types.integer)
public [DOMNode::contains](#domnode.contains)([DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null) $other): [bool](#language.types.boolean)
public [DOMNode::getLineNo](#domnode.getlineno)(): [int](#language.types.integer)
public [DOMNode::getNodePath](#domnode.getnodepath)(): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::getRootNode](#domnode.getrootnode)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [DOMNode](#class.domnode)
public [DOMNode::hasAttributes](#domnode.hasattributes)(): [bool](#language.types.boolean)
public [DOMNode::hasChildNodes](#domnode.haschildnodes)(): [bool](#language.types.boolean)
public [DOMNode::insertBefore](#domnode.insertbefore)([DOMNode](#class.domnode) $node, [?](#language.types.null)[DOMNode](#class.domnode) $child = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::isDefaultNamespace](#domnode.isdefaultnamespace)([string](#language.types.string) $namespaceURI): [bool](#language.types.boolean)
public [DOMNode::isEqualNode](#domnode.isequalnode)([?](#language.types.null)[DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSameNode](#domnode.issamenode)([DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSupported](#domnode.issupported)([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)
public [DOMNode::lookupNamespaceURI](#domnode.lookupnamespaceuri)([?](#language.types.null)[string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::lookupPrefix](#domnode.lookupprefix)([string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::normalize](#domnode.normalize)(): [void](language.types.void.html)
public [DOMNode::removeChild](#domnode.removechild)([DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::replaceChild](#domnode.replacechild)([DOMNode](#class.domnode) $node, [DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::\_\_sleep](#domnode.sleep)(): [array](#language.types.array)
public [DOMNode::\_\_wakeup](#domnode.wakeup)(): [void](language.types.void.html)

}

# DOMCdataSection::\_\_construct

(PHP 5, PHP 7, PHP 8)

DOMCdataSection::\_\_construct — Construye un nuevo objeto DOMCdataSection

### Descripción

public **DOMCdataSection::\_\_construct**([string](#language.types.string) $data)

Construye un nuevo nodo CDATA. Funciona igual que la clase
[DOMText](#class.domtext).

### Parámetros

    data


      El valor del nodo CDATA. Si no se proporciona, se crea un nodo CDATA vacío.


### Ejemplos

    **Ejemplo #1 Crear un nuevo objeto DOMCdataSection**

&lt;?php

$dom = new DOMDocument('1.0', 'utf-8');
$elemento = $dom-&gt;appendChild(new DOMElement('root'));
$texto = $elemento-&gt;appendChild(new DOMCdataSection('root value'));
echo $dom-&gt;saveXML();

?&gt;

    El ejemplo anterior mostrará:

&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;root&gt;&lt;![CDATA[root value]]&gt;&lt;/root&gt;

### Ver también

    - [DOMText::__construct()](#domtext.construct) - Crea un nuevo objeto DOMText

    - [DOMDocument::createTextNode()](#domdocument.createtextnode) - Crea un nuevo nodo de texto

## Tabla de contenidos

- [DOMCdataSection::\_\_construct](#domcdatasection.construct) — Construye un nuevo objeto DOMCdataSection

# La clase DOMCharacterData

(PHP 5, PHP 7, PHP 8)

## Introducción

    Representa un nodo que contiene datos. Ningún nodo corresponde
    a esta clase, pero otros nodos heredan de ella.

## Sinopsis de la Clase

     class **DOMCharacterData**



     extends
      [DOMNode](#class.domnode)



     implements
      [DOMChildNode](#class.domchildnode) {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [DOMNode::DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     [string](#language.types.string)
      [$data](#domcharacterdata.props.data);

    public
     readonly
     [int](#language.types.integer)
      [$length](#domcharacterdata.props.length);

    public
     readonly
     ?[DOMElement](#class.domelement)
      [$previousElementSibling](#domcharacterdata.props.previouselementsibling);

    public
     readonly
     ?[DOMElement](#class.domelement)
      [$nextElementSibling](#domcharacterdata.props.nextelementsibling);


    /* Propiedades heredadas */
    public
     readonly
     [string](#language.types.string)
      [$nodeName](#domnode.props.nodename);

public
?[string](#language.types.string)
[$nodeValue](#domnode.props.nodevalue);
public
readonly
[int](#language.types.integer)
[$nodeType](#domnode.props.nodetype);
public
readonly
?[DOMNode](#class.domnode)
[$parentNode](#domnode.props.parentnode);
public
readonly
?[DOMElement](#class.domelement)
[$parentElement](#domnode.props.parentelement);
public
readonly
[DOMNodeList](#class.domnodelist)
[$childNodes](#domnode.props.childnodes);
public
readonly
?[DOMNode](#class.domnode)
[$firstChild](#domnode.props.firstchild);
public
readonly
?[DOMNode](#class.domnode)
[$lastChild](#domnode.props.lastchild);
public
readonly
?[DOMNode](#class.domnode)
[$previousSibling](#domnode.props.previoussibling);
public
readonly
?[DOMNode](#class.domnode)
[$nextSibling](#domnode.props.nextsibling);
public
readonly
?[DOMNamedNodeMap](#class.domnamednodemap)
[$attributes](#domnode.props.attributes);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#domnode.props.isconnected);
public
readonly
?[DOMDocument](#class.domdocument)
[$ownerDocument](#domnode.props.ownerdocument);
public
readonly
?[string](#language.types.string)
[$namespaceURI](#domnode.props.namespaceuri);
public
[string](#language.types.string)
[$prefix](#domnode.props.prefix);
public
readonly
?[string](#language.types.string)
[$localName](#domnode.props.localname);
public
readonly
?[string](#language.types.string)
[$baseURI](#domnode.props.baseuri);
public
[string](#language.types.string)
[$textContent](#domnode.props.textcontent);

    /* Métodos */

public [after](#domcharacterdata.after)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [appendData](#domcharacterdata.appenddata)([string](#language.types.string) $data): [true](#language.types.singleton)
public [before](#domcharacterdata.before)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [deleteData](#domcharacterdata.deletedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [bool](#language.types.boolean)
public [insertData](#domcharacterdata.insertdata)([int](#language.types.integer) $offset, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [remove](#domcharacterdata.remove)(): [void](language.types.void.html)
public [replaceData](#domcharacterdata.replacedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [replaceWith](#domcharacterdata.replacewith)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [substringData](#domcharacterdata.substringdata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [string](#language.types.string)|[false](#language.types.singleton)

    /* Métodos heredados */
    public [DOMNode::appendChild](#domnode.appendchild)([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)

public [DOMNode::C14N](#domnode.c14n)(
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)
public [DOMNode::C14NFile](#domnode.c14nfile)(
    [string](#language.types.string) $uri,
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)
public [DOMNode::cloneNode](#domnode.clonenode)([bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::compareDocumentPosition](#domnode.comparedocumentposition)([DOMNode](#class.domnode) $other): [int](#language.types.integer)
public [DOMNode::contains](#domnode.contains)([DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null) $other): [bool](#language.types.boolean)
public [DOMNode::getLineNo](#domnode.getlineno)(): [int](#language.types.integer)
public [DOMNode::getNodePath](#domnode.getnodepath)(): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::getRootNode](#domnode.getrootnode)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [DOMNode](#class.domnode)
public [DOMNode::hasAttributes](#domnode.hasattributes)(): [bool](#language.types.boolean)
public [DOMNode::hasChildNodes](#domnode.haschildnodes)(): [bool](#language.types.boolean)
public [DOMNode::insertBefore](#domnode.insertbefore)([DOMNode](#class.domnode) $node, [?](#language.types.null)[DOMNode](#class.domnode) $child = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::isDefaultNamespace](#domnode.isdefaultnamespace)([string](#language.types.string) $namespaceURI): [bool](#language.types.boolean)
public [DOMNode::isEqualNode](#domnode.isequalnode)([?](#language.types.null)[DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSameNode](#domnode.issamenode)([DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSupported](#domnode.issupported)([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)
public [DOMNode::lookupNamespaceURI](#domnode.lookupnamespaceuri)([?](#language.types.null)[string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::lookupPrefix](#domnode.lookupprefix)([string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::normalize](#domnode.normalize)(): [void](language.types.void.html)
public [DOMNode::removeChild](#domnode.removechild)([DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::replaceChild](#domnode.replacechild)([DOMNode](#class.domnode) $node, [DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::\_\_sleep](#domnode.sleep)(): [array](#language.types.array)
public [DOMNode::\_\_wakeup](#domnode.wakeup)(): [void](language.types.void.html)

}

## Propiedades

     data

      El contenido del nodo.





     length

      El tamaño del contenido.





     nextElementSibling

      El elemento hermano siguiente o **[null](#constant.null)**.





     previousElementSibling

      El elemento hermano anterior o **[null](#constant.null)**.




## Historial de cambios

       Versión
       Descripción






       8.0.0

        Las propiedades nextElementSibling y
        previousElementSibling fueron añadidas.




       8.0.0

        **DOMCharacterData** ahora implementa
        [DOMChildNode](#class.domchildnode).





## Ver también

     - [» Especificación W3C de CharacterData](http://www.w3.org/TR/2003/WD-DOM-Level-3-Core-20030226/DOM3-Core.html#core-ID-FF21A306)

# DOMCharacterData::after

(PHP 8)

DOMCharacterData::after — Añade nodos después de los datos

### Descripción

public **DOMCharacterData::after**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade los nodes pasados después de los datos de carácter.

### Parámetros

     nodes


       Nodos a añadir después del nodo.
       Las cadenas de caracteres son automáticamente convertidas en nodos textuales.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si el padre es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin padre es ahora sin efecto para alinear el comportamiento con la especificación del DOM.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

      8.3.0

       Llamar a este método en un nodo sin documento propietario funciona ahora.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMCharacterData::after()**

    Añade nodos después de los datos.

&lt;?php
$doc = new DOMDocument;
$doc-&gt;loadXML("&lt;container&gt;&lt;![CDATA[hello]]&gt;&lt;/container&gt;");
$cdata = $doc-&gt;documentElement-&gt;firstChild;

$cdata-&gt;after("beautiful", $doc-&gt;createElement("world"));

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;container&gt;&lt;![CDATA[hello]]&gt;beautiful&lt;world/&gt;&lt;/container&gt;

### Ver también

- [DOMChildNode::after()](#domchildnode.after) - Añade nodos después del nodo

- [DOMCharacterData::before()](#domcharacterdata.before) - Añade nodos antes de los datos de carácter

# DOMCharacterData::appendData

(PHP 5, PHP 7, PHP 8)

DOMCharacterData::appendData —
Añade la cadena al final de los datos en el nodo

### Descripción

public **DOMCharacterData::appendData**([string](#language.types.string) $data): [true](#language.types.singleton)

Añade la cadena data al final de los datos en el
nodo.

### Parámetros

     data


       La cadena a añadir.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Esta función ahora tiene un tipo de retorno tentativo de [true](#language.types.singleton).



### Ver también

    - [DOMCharacterData::deleteData()](#domcharacterdata.deletedata) - Elimina un rango de caracteres de los datos de carácter

    - [DOMCharacterData::insertData()](#domcharacterdata.insertdata) - Inserta una cadena en el desplazamiento de punto de código UTF-8 especificado

    - [DOMCharacterData::replaceData()](#domcharacterdata.replacedata) - Reemplaza una subcadena en los datos de carácter

    - [DOMCharacterData::substringData()](#domcharacterdata.substringdata) - Extrae un rango de datos de los datos de carácter

# DOMCharacterData::before

(PHP 8)

DOMCharacterData::before — Añade nodos antes de los datos de carácter

### Descripción

public **DOMCharacterData::before**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade los nodes pasados antes de los datos de carácter.

### Parámetros

     nodes


       Nodos a añadir antes del nodo.
       Las cadenas de caracteres son automáticamente convertidas en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si el padre es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin padre es ahora sin efecto para alinear el comportamiento con la especificación del DOM.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMCharacterData::before()**

    Añade los nodos antes de los datos.

&lt;?php
$doc = new DOMDocument;
$doc-&gt;loadXML("&lt;container&gt;&lt;![CDATA[world]]&gt;&lt;/container&gt;");
$cdata = $doc-&gt;documentElement-&gt;firstChild;

$cdata-&gt;before("hello", $doc-&gt;createElement("beautiful"));

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;container&gt;hello&lt;beautiful/&gt;&lt;![CDATA[world]]&gt;&lt;/container&gt;

### Ver también

- [DOMChildNode::before()](#domchildnode.before) - Añade nodos antes del nodo

- [DOMCharacterData::after()](#domcharacterdata.after) - Añade nodos después de los datos

# DOMCharacterData::deleteData

(PHP 5, PHP 7, PHP 8)

DOMCharacterData::deleteData —
Elimina un rango de caracteres de los datos de carácter

### Descripción

public **DOMCharacterData::deleteData**([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [bool](#language.types.boolean)

Borra count caracteres a partir de la posición
offset.

### Parámetros

     offset


       La posición a partir de la cual se debe comenzar a borrar.






     count


       El número de caracteres a borrar. Si la suma de
       offset y count
       excede la longitud total de la cadena, entonces todos los caracteres hasta el
       final de la cadena serán borrados.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

     **[DOM_INDEX_SIZE_ERR](#constant.dom-index-size-err)**


       Se lanza si offset es negativo o mayor
       que el número de puntos de código UTF-8 en los datos o si
       count es negativo.





### Ver también

    - [DOMCharacterData::appendData()](#domcharacterdata.appenddata) - Añade la cadena al final de los datos en el nodo

    - [DOMCharacterData::insertData()](#domcharacterdata.insertdata) - Inserta una cadena en el desplazamiento de punto de código UTF-8 especificado

    - [DOMCharacterData::replaceData()](#domcharacterdata.replacedata) - Reemplaza una subcadena en los datos de carácter

    - [DOMCharacterData::substringData()](#domcharacterdata.substringdata) - Extrae un rango de datos de los datos de carácter

# DOMCharacterData::insertData

(PHP 5, PHP 7, PHP 8)

DOMCharacterData::insertData —
Inserta una cadena en el desplazamiento de punto de código UTF-8 especificado

### Descripción

public **DOMCharacterData::insertData**([int](#language.types.integer) $offset, [string](#language.types.string) $data): [bool](#language.types.boolean)

Inserta la cadena data en la posición
offset.

### Parámetros

     offset


       La posición de la inserción.






     data


       La cadena a insertar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

     **[DOM_INDEX_SIZE_ERR](#constant.dom-index-size-err)**


       Se lanza si offset es negativo o mayor que
       el número de puntos de código UTF-8 en los datos.





### Ver también

    - [DOMCharacterData::appendData()](#domcharacterdata.appenddata) - Añade la cadena al final de los datos en el nodo

    - [DOMCharacterData::deleteData()](#domcharacterdata.deletedata) - Elimina un rango de caracteres de los datos de carácter

    - [DOMCharacterData::replaceData()](#domcharacterdata.replacedata) - Reemplaza una subcadena en los datos de carácter

    - [DOMCharacterData::substringData()](#domcharacterdata.substringdata) - Extrae un rango de datos de los datos de carácter

# DOMCharacterData::remove

(PHP 8)

DOMCharacterData::remove — Elimina el nodo de datos de carácter

### Descripción

public **DOMCharacterData::remove**(): [void](language.types.void.html)

Elimina el nodo de datos de carácter.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMCharacterData::remove()**

    Elimina los datos.

&lt;?php
$doc = new DOMDocument;
$doc-&gt;loadXML("&lt;container&gt;&lt;![CDATA[hello]]&gt;&lt;world/&gt;&lt;/container&gt;");
$cdata = $doc-&gt;documentElement-&gt;firstChild;

$cdata-&gt;remove();

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;container&gt;&lt;world/&gt;&lt;/container&gt;

### Ver también

- [DOMChildNode::remove()](#domchildnode.remove) - Elimina el nodo

- [DOMCharacterData::after()](#domcharacterdata.after) - Añade nodos después de los datos

- [DOMCharacterData::before()](#domcharacterdata.before) - Añade nodos antes de los datos de carácter

- [DOMCharacterData::replaceWith()](#domcharacterdata.replacewith) - Reemplaza los datos por nuevos nodos

- [DOMNode::removeChild()](#domnode.removechild) - Elimina un hijo de la lista de hijos

# DOMCharacterData::replaceData

(PHP 5, PHP 7, PHP 8)

DOMCharacterData::replaceData —
Reemplaza una subcadena en los datos de carácter

### Descripción

public **DOMCharacterData::replaceData**([int](#language.types.integer) $offset, [int](#language.types.integer) $count, [string](#language.types.string) $data): [bool](#language.types.boolean)

Reemplaza count caracteres a partir de la posición
offset con los datos data.

### Parámetros

     offset


       La posición a partir de la cual se inicia el reemplazo.






     count


       El número de caracteres a reemplazar. Si la suma de
       offset y count
       excede la longitud total de la cadena, entonces todos los caracteres
       hasta el final de los datos serán reemplazados.






     data


       La cadena utilizada para reemplazar los caracteres seleccionados.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

     **[DOM_INDEX_SIZE_ERR](#constant.dom-index-size-err)**


       Lanzado si offset es negativo o mayor que
       el número de unidades de puntos de código UTF-8 en los datos o si count
       es negativo.





### Ver también

    - [DOMCharacterData::appendData()](#domcharacterdata.appenddata) - Añade la cadena al final de los datos en el nodo

    - [DOMCharacterData::deleteData()](#domcharacterdata.deletedata) - Elimina un rango de caracteres de los datos de carácter

    - [DOMCharacterData::insertData()](#domcharacterdata.insertdata) - Inserta una cadena en el desplazamiento de punto de código UTF-8 especificado

    - [DOMCharacterData::substringData()](#domcharacterdata.substringdata) - Extrae un rango de datos de los datos de carácter

# DOMCharacterData::replaceWith

(PHP 8)

DOMCharacterData::replaceWith — Reemplaza los datos por nuevos nodos

### Descripción

public **DOMCharacterData::replaceWith**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Reemplaza los datos por nuevos nodes.

### Parámetros

     nodes


       Los nodos de reemplazo.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si el padre es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin padre es ahora una operación sin efecto para alinear el comportamiento con la especificación del DOM.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMCharacterData::replaceWith()**

    Reemplaza los datos por nuevos nodos.

&lt;?php
$doc = new DOMDocument;
$doc-&gt;loadXML("&lt;container&gt;&lt;![CDATA[hello]]&gt;&lt;/container&gt;");
$cdata = $doc-&gt;documentElement-&gt;firstChild;

$cdata-&gt;replaceWith("beautiful", $doc-&gt;createElement("world"));

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;container&gt;beautiful&lt;world/&gt;&lt;/container&gt;

### Ver también

- [DOMChildNode::replaceWith()](#domchildnode.replacewith) - Reemplaza el nodo por nuevos nodos

- [DOMCharacterData::after()](#domcharacterdata.after) - Añade nodos después de los datos

- [DOMCharacterData::before()](#domcharacterdata.before) - Añade nodos antes de los datos de carácter

- [DOMCharacterData::remove()](#domcharacterdata.remove) - Elimina el nodo de datos de carácter

# DOMCharacterData::substringData

(PHP 5, PHP 7, PHP 8)

DOMCharacterData::substringData —
Extrae un rango de datos de los datos de carácter

### Descripción

public **DOMCharacterData::substringData**([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [string](#language.types.string)|[false](#language.types.singleton)

Devuelve la sub-cadena especificada.

### Parámetros

     offset


       La posición del inicio de la cadena a extraer.






     count


       El número de caracteres a extraer.





### Valores devueltos

La sub-cadena especificada. Si la suma de offset
y count excede la longitud total de la cadena, entonces
todas las unidades de puntos de código UTF-8 hasta el final de los datos serán devueltas.

### Errores/Excepciones

     **[DOM_INDEX_SIZE_ERR](#constant.dom-index-size-err)**


       Lanzado si offset es negativo o mayor que
       el número de unidades de puntos de código UTF-8 en los datos o si
       count es negativo.





### Ver también

    - [DOMCharacterData::appendData()](#domcharacterdata.appenddata) - Añade la cadena al final de los datos en el nodo

    - [DOMCharacterData::deleteData()](#domcharacterdata.deletedata) - Elimina un rango de caracteres de los datos de carácter

    - [DOMCharacterData::insertData()](#domcharacterdata.insertdata) - Inserta una cadena en el desplazamiento de punto de código UTF-8 especificado

    - [DOMCharacterData::replaceData()](#domcharacterdata.replacedata) - Reemplaza una subcadena en los datos de carácter

## Tabla de contenidos

- [DOMCharacterData::after](#domcharacterdata.after) — Añade nodos después de los datos
- [DOMCharacterData::appendData](#domcharacterdata.appenddata) — Añade la cadena al final de los datos en el nodo
- [DOMCharacterData::before](#domcharacterdata.before) — Añade nodos antes de los datos de carácter
- [DOMCharacterData::deleteData](#domcharacterdata.deletedata) — Elimina un rango de caracteres de los datos de carácter
- [DOMCharacterData::insertData](#domcharacterdata.insertdata) — Inserta una cadena en el desplazamiento de punto de código UTF-8 especificado
- [DOMCharacterData::remove](#domcharacterdata.remove) — Elimina el nodo de datos de carácter
- [DOMCharacterData::replaceData](#domcharacterdata.replacedata) — Reemplaza una subcadena en los datos de carácter
- [DOMCharacterData::replaceWith](#domcharacterdata.replacewith) — Reemplaza los datos por nuevos nodos
- [DOMCharacterData::substringData](#domcharacterdata.substringdata) — Extrae un rango de datos de los datos de carácter

# La interfaz DOMChildNode

(PHP 8)

## Sinopsis de la Interfaz

     interface **DOMChildNode** {

    /* Métodos */

public [after](#domchildnode.after)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [before](#domchildnode.before)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [remove](#domchildnode.remove)(): [void](language.types.void.html)
public [replaceWith](#domchildnode.replacewith)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

}

# DOMChildNode::after

(PHP 8)

DOMChildNode::after — Añade nodos después del nodo

### Descripción

public **DOMChildNode::after**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade los nodes pasados después del nodo.

### Parámetros

     nodes


       Nodos a añadir después del nodo.
       Las cadenas de caracteres son automáticamente convertidas en nodos textuales.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si el padre es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin padre es ahora sin efecto para alinear el comportamiento con la especificación del DOM.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

      8.3.0

       Llamar a este método en un nodo sin documento propietario funciona ahora.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ver también

    - [DOMChildNode::before()](#domchildnode.before) - Añade nodos antes del nodo

    - [DOMChildNode::remove()](#domchildnode.remove) - Elimina el nodo

    - [DOMChildNode::replaceWith()](#domchildnode.replacewith) - Reemplaza el nodo por nuevos nodos

    - [DOMNode::appendChild()](#domnode.appendchild) - Añade un nuevo hijo al final de los hijos

# DOMChildNode::before

(PHP 8)

DOMChildNode::before — Añade nodos antes del nodo

### Descripción

public **DOMChildNode::before**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade los nodes pasados antes del nodo.

### Parámetros

     nodes


       Nodos a añadir antes del nodo.
       Las cadenas de caracteres son automáticamente convertidas en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si el padre es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin padre es ahora sin efecto para alinear el comportamiento con la especificación del DOM.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ver también

    - [DOMChildNode::after()](#domchildnode.after) - Añade nodos después del nodo

    - [DOMChildNode::remove()](#domchildnode.remove) - Elimina el nodo

    - [DOMChildNode::replaceWith()](#domchildnode.replacewith) - Reemplaza el nodo por nuevos nodos

# DOMChildNode::remove

(PHP 8)

DOMChildNode::remove — Elimina el nodo

### Descripción

public **DOMChildNode::remove**(): [void](language.types.void.html)

Elimina el nodo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    - [DOMChildNode::after()](#domchildnode.after) - Añade nodos después del nodo

    - [DOMChildNode::before()](#domchildnode.before) - Añade nodos antes del nodo

    - [DOMChildNode::replaceWith()](#domchildnode.replacewith) - Reemplaza el nodo por nuevos nodos

    - [DOMNode::removeChild()](#domnode.removechild) - Elimina un hijo de la lista de hijos

# DOMChildNode::replaceWith

(PHP 8)

DOMChildNode::replaceWith — Reemplaza el nodo por nuevos nodos

### Descripción

public **DOMChildNode::replaceWith**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Reemplaza el nodo por los nuevos nodes.
Una combinación de [DOMChildNode::remove()](#domchildnode.remove) y **DOMChildNode::append()**.

### Parámetros

     nodes


       Los nodos de reemplazo.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si el padre es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin padre es ahora una operación sin efecto para alinear el comportamiento con la especificación del DOM.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ver también

    - [DOMChildNode::after()](#domchildnode.after) - Añade nodos después del nodo

    - [DOMChildNode::before()](#domchildnode.before) - Añade nodos antes del nodo

    - [DOMChildNode::remove()](#domchildnode.remove) - Elimina el nodo

    - [DOMNode::replaceChild()](#domnode.replacechild) - Reemplaza un hijo

## Tabla de contenidos

- [DOMChildNode::after](#domchildnode.after) — Añade nodos después del nodo
- [DOMChildNode::before](#domchildnode.before) — Añade nodos antes del nodo
- [DOMChildNode::remove](#domchildnode.remove) — Elimina el nodo
- [DOMChildNode::replaceWith](#domchildnode.replacewith) — Reemplaza el nodo por nuevos nodos

# La clase [DOMComment](#class.domcomment)

(PHP 5, PHP 7, PHP 8)

## Introducción

    Representa un nodo de comentario, delimitado por &lt;!--
    y --&gt;.

## Sinopsis de la Clase

     class **DOMComment**



     extends
      [DOMCharacterData](#class.domcharacterdata)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [DOMNode::DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades heredadas */
    public
     [string](#language.types.string)
      [$data](#domcharacterdata.props.data);

public
readonly
[int](#language.types.integer)
[$length](#domcharacterdata.props.length);
public
readonly
?[DOMElement](#class.domelement)
[$previousElementSibling](#domcharacterdata.props.previouselementsibling);
public
readonly
?[DOMElement](#class.domelement)
[$nextElementSibling](#domcharacterdata.props.nextelementsibling);

    public
     readonly
     [string](#language.types.string)
      [$nodeName](#domnode.props.nodename);

public
?[string](#language.types.string)
[$nodeValue](#domnode.props.nodevalue);
public
readonly
[int](#language.types.integer)
[$nodeType](#domnode.props.nodetype);
public
readonly
?[DOMNode](#class.domnode)
[$parentNode](#domnode.props.parentnode);
public
readonly
?[DOMElement](#class.domelement)
[$parentElement](#domnode.props.parentelement);
public
readonly
[DOMNodeList](#class.domnodelist)
[$childNodes](#domnode.props.childnodes);
public
readonly
?[DOMNode](#class.domnode)
[$firstChild](#domnode.props.firstchild);
public
readonly
?[DOMNode](#class.domnode)
[$lastChild](#domnode.props.lastchild);
public
readonly
?[DOMNode](#class.domnode)
[$previousSibling](#domnode.props.previoussibling);
public
readonly
?[DOMNode](#class.domnode)
[$nextSibling](#domnode.props.nextsibling);
public
readonly
?[DOMNamedNodeMap](#class.domnamednodemap)
[$attributes](#domnode.props.attributes);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#domnode.props.isconnected);
public
readonly
?[DOMDocument](#class.domdocument)
[$ownerDocument](#domnode.props.ownerdocument);
public
readonly
?[string](#language.types.string)
[$namespaceURI](#domnode.props.namespaceuri);
public
[string](#language.types.string)
[$prefix](#domnode.props.prefix);
public
readonly
?[string](#language.types.string)
[$localName](#domnode.props.localname);
public
readonly
?[string](#language.types.string)
[$baseURI](#domnode.props.baseuri);
public
[string](#language.types.string)
[$textContent](#domnode.props.textcontent);

    /* Métodos */

public [\_\_construct](#domcomment.construct)([string](#language.types.string) $data = "")

    /* Métodos heredados */
    public [DOMCharacterData::after](#domcharacterdata.after)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

public [DOMCharacterData::appendData](#domcharacterdata.appenddata)([string](#language.types.string) $data): [true](#language.types.singleton)
public [DOMCharacterData::before](#domcharacterdata.before)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [DOMCharacterData::deleteData](#domcharacterdata.deletedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [bool](#language.types.boolean)
public [DOMCharacterData::insertData](#domcharacterdata.insertdata)([int](#language.types.integer) $offset, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [DOMCharacterData::remove](#domcharacterdata.remove)(): [void](language.types.void.html)
public [DOMCharacterData::replaceData](#domcharacterdata.replacedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [DOMCharacterData::replaceWith](#domcharacterdata.replacewith)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [DOMCharacterData::substringData](#domcharacterdata.substringdata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [string](#language.types.string)|[false](#language.types.singleton)

    public [DOMNode::appendChild](#domnode.appendchild)([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)

public [DOMNode::C14N](#domnode.c14n)(
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)
public [DOMNode::C14NFile](#domnode.c14nfile)(
    [string](#language.types.string) $uri,
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)
public [DOMNode::cloneNode](#domnode.clonenode)([bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::compareDocumentPosition](#domnode.comparedocumentposition)([DOMNode](#class.domnode) $other): [int](#language.types.integer)
public [DOMNode::contains](#domnode.contains)([DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null) $other): [bool](#language.types.boolean)
public [DOMNode::getLineNo](#domnode.getlineno)(): [int](#language.types.integer)
public [DOMNode::getNodePath](#domnode.getnodepath)(): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::getRootNode](#domnode.getrootnode)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [DOMNode](#class.domnode)
public [DOMNode::hasAttributes](#domnode.hasattributes)(): [bool](#language.types.boolean)
public [DOMNode::hasChildNodes](#domnode.haschildnodes)(): [bool](#language.types.boolean)
public [DOMNode::insertBefore](#domnode.insertbefore)([DOMNode](#class.domnode) $node, [?](#language.types.null)[DOMNode](#class.domnode) $child = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::isDefaultNamespace](#domnode.isdefaultnamespace)([string](#language.types.string) $namespaceURI): [bool](#language.types.boolean)
public [DOMNode::isEqualNode](#domnode.isequalnode)([?](#language.types.null)[DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSameNode](#domnode.issamenode)([DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSupported](#domnode.issupported)([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)
public [DOMNode::lookupNamespaceURI](#domnode.lookupnamespaceuri)([?](#language.types.null)[string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::lookupPrefix](#domnode.lookupprefix)([string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::normalize](#domnode.normalize)(): [void](language.types.void.html)
public [DOMNode::removeChild](#domnode.removechild)([DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::replaceChild](#domnode.replacechild)([DOMNode](#class.domnode) $node, [DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::\_\_sleep](#domnode.sleep)(): [array](#language.types.array)
public [DOMNode::\_\_wakeup](#domnode.wakeup)(): [void](language.types.void.html)

}

## Ver también

     - [» especificación W3C de Comment](http://www.w3.org/TR/2003/WD-DOM-Level-3-Core-20030226/DOM3-Core.html#core-ID-1728279322)

# DOMComment::\_\_construct

(PHP 5, PHP 7, PHP 8)

DOMComment::\_\_construct —
Crea un nuevo objeto DOMComment

### Descripción

public **DOMComment::\_\_construct**([string](#language.types.string) $data = "")

Crea un nuevo objeto [DOMComment](#class.domcomment) . Este objeto es de solo lectura.
Puede ser anexado a un documento, pero nodos adicionales no pueden ser anexados a este nodo
hasta tando no haya sido asociado con un documento.
Para crear un nodo modificable utilice
[DOMDocument::createComment](#domdocument.createcomment).

### Parámetros

     data


       El valor del comentario.





### Ejemplos

    **Ejemplo #1 Creando un nuevo DOMComment**

&lt;?php

$dom = new DOMDocument('1.0', 'iso-8859-1');
$element = $dom-&gt;appendChild(new DOMElement('root'));
$comment = $element-&gt;appendChild(new DOMComment('root comment'));
echo $dom-&gt;saveXML(); /_ &lt;?xml version="1.0" encoding="iso-8859-1"?&gt;&lt;root&gt;&lt;!--root comment--&gt;&lt;/root&gt; _/

?&gt;

### Ver también

    - [DOMDocument::createComment()](#domdocument.createcomment) - Crea un nuevo nodo de comentario

## Tabla de contenidos

- [DOMComment::\_\_construct](#domcomment.construct) — Crea un nuevo objeto DOMComment

# La clase DOMDocument

(PHP 5, PHP 7, PHP 8)

## Introducción

    Representa un documento HTML o XML completo; será la raíz
    del árbol del documento.

## Sinopsis de la Clase

     class **DOMDocument**



     extends
      [DOMNode](#class.domnode)



     implements
      [DOMParentNode](#class.domparentnode) {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [DOMNode::DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     ?[DOMDocumentType](#class.domdocumenttype)
      [$doctype](#domdocument.props.doctype);

    public
     readonly
     [DOMImplementation](#class.domimplementation)
      [$implementation](#domdocument.props.implementation);

    public
     readonly
     ?[DOMElement](#class.domelement)
      [$documentElement](#domdocument.props.documentelement);

    public
     readonly
     ?[string](#language.types.string)
      [$actualEncoding](#domdocument.props.actualencoding);

    public
     ?[string](#language.types.string)
      [$encoding](#domdocument.props.encoding);

    public
     readonly
     ?[string](#language.types.string)
      [$xmlEncoding](#domdocument.props.xmlencoding);

    public
     [bool](#language.types.boolean)
      [$standalone](#domdocument.props.standalone);

    public
     [bool](#language.types.boolean)
      [$xmlStandalone](#domdocument.props.xmlstandalone);

    public
     ?[string](#language.types.string)
      [$version](#domdocument.props.version);

    public
     ?[string](#language.types.string)
      [$xmlVersion](#domdocument.props.xmlversion);

    public
     [bool](#language.types.boolean)
      [$strictErrorChecking](#domdocument.props.stricterrorchecking);

    public
     ?[string](#language.types.string)
      [$documentURI](#domdocument.props.documenturi);

    public
     readonly
     [mixed](#language.types.mixed)
      [$config](#domdocument.props.config);

    public
     [bool](#language.types.boolean)
      [$formatOutput](#domdocument.props.formatoutput);

    public
     [bool](#language.types.boolean)
      [$validateOnParse](#domdocument.props.validateonparse);

    public
     [bool](#language.types.boolean)
      [$resolveExternals](#domdocument.props.resolveexternals);

    public
     [bool](#language.types.boolean)
      [$preserveWhiteSpace](#domdocument.props.preservewhitespace);

    public
     [bool](#language.types.boolean)
      [$recover](#domdocument.props.recover);

    public
     [bool](#language.types.boolean)
      [$substituteEntities](#domdocument.props.substituteentities);

    public
     readonly
     ?[DOMElement](#class.domelement)
      [$firstElementChild](#domdocument.props.firstelementchild);

    public
     readonly
     ?[DOMElement](#class.domelement)
      [$lastElementChild](#domdocument.props.lastelementchild);

    public
     readonly
     [int](#language.types.integer)
      [$childElementCount](#domdocument.props.childelementcount);


    /* Propiedades heredadas */
    public
     readonly
     [string](#language.types.string)
      [$nodeName](#domnode.props.nodename);

public
?[string](#language.types.string)
[$nodeValue](#domnode.props.nodevalue);
public
readonly
[int](#language.types.integer)
[$nodeType](#domnode.props.nodetype);
public
readonly
?[DOMNode](#class.domnode)
[$parentNode](#domnode.props.parentnode);
public
readonly
?[DOMElement](#class.domelement)
[$parentElement](#domnode.props.parentelement);
public
readonly
[DOMNodeList](#class.domnodelist)
[$childNodes](#domnode.props.childnodes);
public
readonly
?[DOMNode](#class.domnode)
[$firstChild](#domnode.props.firstchild);
public
readonly
?[DOMNode](#class.domnode)
[$lastChild](#domnode.props.lastchild);
public
readonly
?[DOMNode](#class.domnode)
[$previousSibling](#domnode.props.previoussibling);
public
readonly
?[DOMNode](#class.domnode)
[$nextSibling](#domnode.props.nextsibling);
public
readonly
?[DOMNamedNodeMap](#class.domnamednodemap)
[$attributes](#domnode.props.attributes);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#domnode.props.isconnected);
public
readonly
?[DOMDocument](#class.domdocument)
[$ownerDocument](#domnode.props.ownerdocument);
public
readonly
?[string](#language.types.string)
[$namespaceURI](#domnode.props.namespaceuri);
public
[string](#language.types.string)
[$prefix](#domnode.props.prefix);
public
readonly
?[string](#language.types.string)
[$localName](#domnode.props.localname);
public
readonly
?[string](#language.types.string)
[$baseURI](#domnode.props.baseuri);
public
[string](#language.types.string)
[$textContent](#domnode.props.textcontent);

    /* Métodos */

public [\_\_construct](#domdocument.construct)([string](#language.types.string) $version = "1.0", [string](#language.types.string) $encoding = "")

    public [adoptNode](#domdocument.adoptnode)([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)

public [append](#domdocument.append)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [createAttribute](#domdocument.createattribute)([string](#language.types.string) $localName): [DOMAttr](#class.domattr)|[false](#language.types.singleton)
public [createAttributeNS](#domdocument.createattributens)([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $qualifiedName): [DOMAttr](#class.domattr)|[false](#language.types.singleton)
public [createCDATASection](#domdocument.createcdatasection)([string](#language.types.string) $data): [DOMCdataSection](#class.domcdatasection)|[false](#language.types.singleton)
public [createComment](#domdocument.createcomment)([string](#language.types.string) $data): [DOMComment](#class.domcomment)
public [createDocumentFragment](#domdocument.createdocumentfragment)(): [DOMDocumentFragment](#class.domdocumentfragment)
public [createElement](#domdocument.createelement)([string](#language.types.string) $localName, [string](#language.types.string) $value = ""): [DOMElement](#class.domelement)|[false](#language.types.singleton)
public [createElementNS](#domdocument.createelementns)([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $qualifiedName, [string](#language.types.string) $value = ""): [DOMElement](#class.domelement)|[false](#language.types.singleton)
public [createEntityReference](#domdocument.createentityreference)([string](#language.types.string) $name): [DOMEntityReference](#class.domentityreference)|[false](#language.types.singleton)
public [createProcessingInstruction](#domdocument.createprocessinginstruction)([string](#language.types.string) $target, [string](#language.types.string) $data = ""): [DOMProcessingInstruction](#class.domprocessinginstruction)|[false](#language.types.singleton)
public [createTextNode](#domdocument.createtextnode)([string](#language.types.string) $data): [DOMText](#class.domtext)
public [getElementById](#domdocument.getelementbyid)([string](#language.types.string) $elementId): [?](#language.types.null)[DOMElement](#class.domelement)
public [getElementsByTagName](#domdocument.getelementsbytagname)([string](#language.types.string) $qualifiedName): [DOMNodeList](#class.domnodelist)
public [getElementsByTagNameNS](#domdocument.getelementsbytagnamens)([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $localName): [DOMNodeList](#class.domnodelist)
public [importNode](#domdocument.importnode)([DOMNode](#class.domnode) $node, [bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [load](#domdocument.load)([string](#language.types.string) $filename, [int](#language.types.integer) $options = 0): [bool](#language.types.boolean)
public [loadHTML](#domdocument.loadhtml)([string](#language.types.string) $source, [int](#language.types.integer) $options = 0): [bool](#language.types.boolean)
public [loadHTMLFile](#domdocument.loadhtmlfile)([string](#language.types.string) $filename, [int](#language.types.integer) $options = 0): [bool](#language.types.boolean)
public [loadXML](#domdocument.loadxml)([string](#language.types.string) $source, [int](#language.types.integer) $options = 0): [bool](#language.types.boolean)
public [normalizeDocument](#domdocument.normalizedocument)(): [void](language.types.void.html)
public [prepend](#domdocument.prepend)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [registerNodeClass](#domdocument.registernodeclass)([string](#language.types.string) $baseClass, [?](#language.types.null)[string](#language.types.string) $extendedClass): [true](#language.types.singleton)
public [relaxNGValidate](#domdocument.relaxngvalidate)([string](#language.types.string) $filename): [bool](#language.types.boolean)
public [relaxNGValidateSource](#domdocument.relaxngvalidatesource)([string](#language.types.string) $source): [bool](#language.types.boolean)
public [replaceChildren](#domdocument.replacechildren)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [save](#domdocument.save)([string](#language.types.string) $filename, [int](#language.types.integer) $options = 0): [int](#language.types.integer)|[false](#language.types.singleton)
public [saveHTML](#domdocument.savehtml)([?](#language.types.null)[DOMNode](#class.domnode) $node = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)
public [saveHTMLFile](#domdocument.savehtmlfile)([string](#language.types.string) $filename): [int](#language.types.integer)|[false](#language.types.singleton)
public [saveXML](#domdocument.savexml)([?](#language.types.null)[DOMNode](#class.domnode) $node = **[null](#constant.null)**, [int](#language.types.integer) $options = 0): [string](#language.types.string)|[false](#language.types.singleton)
public [schemaValidate](#domdocument.schemavalidate)([string](#language.types.string) $filename, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)
public [schemaValidateSource](#domdocument.schemavalidatesource)([string](#language.types.string) $source, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)
public [validate](#domdocument.validate)(): [bool](#language.types.boolean)
public [xinclude](#domdocument.xinclude)([int](#language.types.integer) $options = 0): [int](#language.types.integer)|[false](#language.types.singleton)

    /* Métodos heredados */
    public [DOMNode::appendChild](#domnode.appendchild)([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)

public [DOMNode::C14N](#domnode.c14n)(
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)
public [DOMNode::C14NFile](#domnode.c14nfile)(
    [string](#language.types.string) $uri,
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)
public [DOMNode::cloneNode](#domnode.clonenode)([bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::compareDocumentPosition](#domnode.comparedocumentposition)([DOMNode](#class.domnode) $other): [int](#language.types.integer)
public [DOMNode::contains](#domnode.contains)([DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null) $other): [bool](#language.types.boolean)
public [DOMNode::getLineNo](#domnode.getlineno)(): [int](#language.types.integer)
public [DOMNode::getNodePath](#domnode.getnodepath)(): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::getRootNode](#domnode.getrootnode)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [DOMNode](#class.domnode)
public [DOMNode::hasAttributes](#domnode.hasattributes)(): [bool](#language.types.boolean)
public [DOMNode::hasChildNodes](#domnode.haschildnodes)(): [bool](#language.types.boolean)
public [DOMNode::insertBefore](#domnode.insertbefore)([DOMNode](#class.domnode) $node, [?](#language.types.null)[DOMNode](#class.domnode) $child = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::isDefaultNamespace](#domnode.isdefaultnamespace)([string](#language.types.string) $namespaceURI): [bool](#language.types.boolean)
public [DOMNode::isEqualNode](#domnode.isequalnode)([?](#language.types.null)[DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSameNode](#domnode.issamenode)([DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSupported](#domnode.issupported)([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)
public [DOMNode::lookupNamespaceURI](#domnode.lookupnamespaceuri)([?](#language.types.null)[string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::lookupPrefix](#domnode.lookupprefix)([string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::normalize](#domnode.normalize)(): [void](language.types.void.html)
public [DOMNode::removeChild](#domnode.removechild)([DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::replaceChild](#domnode.replacechild)([DOMNode](#class.domnode) $node, [DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::\_\_sleep](#domnode.sleep)(): [array](#language.types.array)
public [DOMNode::\_\_wakeup](#domnode.wakeup)(): [void](language.types.void.html)

}

## Propiedades

     actualEncoding


       *Obsoleto a partir de PHP 8.4.0*.
       La codificación actual del documento, en lectura única, equivalente
       a encoding.






     childElementCount

      El número de elementos hijos.





     config


       *Obsoleto a partir de PHP 8.4.0*.
       Configuración utilizada cuando
       [DOMDocument::normalizeDocument()](#domdocument.normalizedocument) es llamado.






     doctype

      La Declaración de Tipo de Documento asociada con este documento.





     documentElement


       El objeto [DOMElement](#class.domelement) que es el primer elemento
       del documento. Si no se encuentra, esto se evalúa a **[null](#constant.null)**.






     documentURI

      La localización del documento, o **[null](#constant.null)** si indefinido.





     encoding


       La codificación del documento, tal como se especifica en la declaración XML.
       Este atributo no está presente en la especificación DOM Nivel 3 final,
       pero representa la única manera de manipular la codificación del documento
       XML en esta implementación.






     firstElementChild

      Primer elemento hijo o **[null](#constant.null)**.





     formatOutput


       Formatea elegantemente el resultado con una indentación y espacios
       adicionales. Este parámetro no tiene ningún efecto si el documento ha sido
       cargado con la activación de
       preserveWhiteSpace.






     implementation


       El objeto [DOMImplementation](#class.domimplementation) que gestiona este documento.






     lastElementChild

      Último elemento hijo o **[null](#constant.null)**.





     preserveWhiteSpace


       No eliminar los espacios redundantes. Por omisión, **[true](#constant.true)**.
       Definir este parámetro a **[false](#constant.false)** tiene el mismo efecto de definir
       a **[LIBXML_NOBLANKS](#constant.libxml-noblanks)** el parámetro
       option del método
       [DOMDocument::load()](#domdocument.load).






     recover


       *Propietario*. Activa el modo "recovery", es decir,
       intenta analizar un documento mal formado. Este atributo no forma parte de la especificación DOM y es específico de libxml.






     resolveExternals


       Defínase a **[true](#constant.true)** para cargar entidades externas
       desde la declaración doctype. Es útil para incluir
       entidades en sus documentos XML.






     standalone


       *Obsoleto*. Si el documento es "standalone" o no,
       tal como se especifica en la declaración XML, correspondiente a
       xmlStandalone.






     strictErrorChecking


       Lanza una [DOMException](#class.domexception) en caso de error.
       Por omisión, **[true](#constant.true)**.






     substituteEntities


       *Propietario*. Si se deben o no
       sustituir las entidades. Este atributo no forma parte de la
       especificación DOM y es específico de libxml. Por omisión, **[false](#constant.false)**



      **Precaución**

        Activar la sustitución de entidades puede facilitar los ataques XML
        External Entity (XXE).







     validateOnParse

      Carga y valida la DTD. Por omisión, **[false](#constant.false)**.


      **Precaución**

        Activar la validación del DTD puede facilitar los ataques XML External Entity (XXE).







     version


       *Obsoleto*. Versión del XML, corresponde a
       xmlVersion.






     xmlEncoding


       Un atributo especificando la codificación del documento. Es **[null](#constant.null)**
       cuando la codificación no está especificada, o cuando es desconocida,
       como es el caso cuando el documento ha sido creado en memoria.






     xmlStandalone


       Un atributo especificando si el documento es "standalone".
       Es **[false](#constant.false)** cuando no está especificado.
       Un documento standalone es un documento donde no hay declaraciones de marcado externas.
       Un ejemplo de tal declaración de marcado es cuando la DTD declara un atributo con un valor por omisión.






     xmlVersion


       Un atributo especificando el número de versión del documento. Si no hay
       declaración y si el documento soporta la funcionalidad
       "XML", el valor será "1.0".





## Historial de cambios

       Versión
       Descripción






       8.4.0

        actualEncoding y
        config son ahora formalmente deprecados.




       8.0.0

        **DOMDocument** implementa ahora
        [DOMParentNode](#class.domparentnode).




       8.0.0

        El método no implementado **DOMDocument::renameNode()**
        ha sido retirado.





## Notas

**Nota**:

La extensión DOM utiliza el codificado UTF-8. Utilice [mb_convert_encoding()](#function.mb-convert-encoding),
[UConverter::transcode()](#uconverter.transcode), o [iconv()](#function.iconv) para manipular otros codificados.

**Nota**:

Al utilizar [json_encode()](#function.json-encode) sobre un objeto
**DOMDocument** el resultado será el de codificar un objeto vacío.

## Ver también

     - [» Especificación W3C de Document](http://www.w3.org/TR/2003/WD-DOM-Level-3-Core-20030226/DOM3-Core.html#core-i-Document)

# DOMDocument::adoptNode

(PHP &gt;= 8.3)

DOMDocument::adoptNode — Transfiere un nodo de otro documento

### Descripción

public **DOMDocument::adoptNode**([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)

Transfiere un nodo de otro documento al documento actual.

### Parámetros

     node


       El nodo a transferir.





### Valores devueltos

El nodo que ha sido transferido, o **[false](#constant.false)** en caso de error.

### Errores/Excepciones

     **[DOM_NOT_SUPPORTED_ERR](#constant.dom-not-supported-err)**


       Lanzada si el tipo de nodo no es compatible con las transferencias de documento.





### Ejemplos

**Ejemplo #1 Ejemplo de DOMDocument::adoptNode()**

    Transfiere el elemento hello del primer documento al segundo.

&lt;?php
$doc1 = new DOMDocument;
$doc1-&gt;loadXML("&lt;container&gt;&lt;hello&gt;&lt;world/&gt;&lt;/hello&gt;&lt;/container&gt;");
$hello = $doc1-&gt;documentElement-&gt;firstChild;

$doc2 = new DOMDocument;
$doc2-&gt;loadXML("&lt;root/&gt;");
$doc2-&gt;documentElement-&gt;appendChild($doc2-&gt;adoptNode($hello));

echo $doc1-&gt;saveXML() . PHP_EOL . PHP_EOL;
echo $doc2-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;container/&gt;

&lt;?xml version="1.0"?&gt;
&lt;root&gt;&lt;hello&gt;&lt;world/&gt;&lt;/hello&gt;&lt;/root&gt;

### Ver también

- [DOMDocument::importNode()](#domdocument.importnode) - Importa un nodo dentro del documento actual

# DOMDocument::append

(PHP 8)

DOMDocument::append — Añade nodos después del último nodo hijo

### Descripción

public **DOMDocument::append**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade uno o varios nodes a la lista de hijos después del último nodo hijo.

### Parámetros

     nodes


       Los nodos a añadir.
       Las cadenas de caracteres se convierten automáticamente en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si este nodo es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin documento propietario funciona ahora.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMDocument::append()**

    Añade nodos después del nodo raíz del documento.

&lt;?php
$doc = new DOMDocument;
$doc-&gt;loadXML("&lt;hello/&gt;");

$doc-&gt;append("beautiful", $doc-&gt;createElement("world"));

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;hello/&gt;
beautiful
&lt;world/&gt;

### Ver también

- [DOMParentNode::append()](#domparentnode.append) - Añade nodos después del último nodo hijo

- [DOMDocument::prepend()](#domdocument.prepend) - Añade nodos antes del primer nodo hijo

# DOMDocument::\_\_construct

(PHP 5, PHP 7, PHP 8)

DOMDocument::\_\_construct —
Crea un nuevo objeto DOMDocument

### Descripción

public **DOMDocument::\_\_construct**([string](#language.types.string) $version = "1.0", [string](#language.types.string) $encoding = "")

Crea un nuevo objeto [DOMDocument](#class.domdocument) .

### Parámetros

     version


       El numero de versión del documento como parte de la declaración XML.






     encoding


       La codificación del documento como parte de la declaración XML.





### Ejemplos

    **Ejemplo #1 Creando un  nuevo DOMDocument**

&lt;?php

$dom = new DOMDocument('1.0', 'iso-8859-1');

echo $dom-&gt;saveXML(); /_ &lt;?xml version="1.0" encoding="iso-8859-1"?&gt; _/

?&gt;

### Ver también

    - [DOMImplementation::createDocument()](#domimplementation.createdocument) - Crea un objeto DOM Document del tipo especificado con sus elementos

# DOMDocument::createAttribute

(PHP 5, PHP 7, PHP 8)

DOMDocument::createAttribute — Crear nuevo attribute

### Descripción

public **DOMDocument::createAttribute**([string](#language.types.string) $localName): [DOMAttr](#class.domattr)|[false](#language.types.singleton)

Esta función crea una nueva instancia de la clase [DOMAttr](#class.domattr).
Este nodo no será mostrado en el documento,
a menos que sea insertado con [DOMNode::appendChild()](#domnode.appendchild).

### Parámetros

     localName


       El nombre del atributo.





### Valores devueltos

El nuevo [DOMAttr](#class.domattr) o **[false](#constant.false)** si ha ocurrido un error.

### Errores/Excepciones

     **[DOM_INVALID_CHARACTER_ERR](#constant.dom-invalid-character-err)**


       Lanzado si localName contiene un carácter inválido.





### Ver también

    - [DOMNode::appendChild()](#domnode.appendchild) - Añade un nuevo hijo al final de los hijos

    - [DOMDocument::createAttributeNS()](#domdocument.createattributens) - Crea un nuevo atributo con un espacio de nombres asociado

    - [DOMDocument::createCDATASection()](#domdocument.createcdatasection) - Crea un nuevo nodo cdata

    - [DOMDocument::createComment()](#domdocument.createcomment) - Crea un nuevo nodo de comentario

    - [DOMDocument::createDocumentFragment()](#domdocument.createdocumentfragment) - Crea un nuevo fragmento de documento

    - [DOMDocument::createElement()](#domdocument.createelement) - Crea un nuevo nodo elemento

    - [DOMDocument::createElementNS()](#domdocument.createelementns) - Crea un nuevo nodo elemento con el nombre de espacio asociado

    - [DOMDocument::createEntityReference()](#domdocument.createentityreference) - Create new entity reference node

    - [DOMDocument::createProcessingInstruction()](#domdocument.createprocessinginstruction) - Crea un nuevo nodo PI

    - [DOMDocument::createTextNode()](#domdocument.createtextnode) - Crea un nuevo nodo de texto

# DOMDocument::createAttributeNS

(PHP 5, PHP 7, PHP 8)

DOMDocument::createAttributeNS —
Crea un nuevo atributo con un espacio de nombres asociado

### Descripción

public **DOMDocument::createAttributeNS**([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $qualifiedName): [DOMAttr](#class.domattr)|[false](#language.types.singleton)

Esta función crea una nueva instancia de la clase
[DOMAttr](#class.domattr). Este nodo no será mostrado en el documento,
a menos que sea insertado con [DOMNode::appendChild()](#domnode.appendchild).

### Parámetros

     namespace


       El URI del espacio de nombres.






     qualifiedName


       El nombre de la etiqueta y el prefijo del atributo, en este formato:
       prefijo:nombreEtiqueta.





### Valores devueltos

El nuevo [DOMAttr](#class.domattr) o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

     **[DOM_INVALID_CHARACTER_ERR](#constant.dom-invalid-character-err)**


       Lanzado si qualifiedName contiene un carácter inválido.






     **[DOM_NAMESPACE_ERR](#constant.dom-namespace-err)**


       Lanzado si qualifiedName es un nombre cualificado mal formado
       o si qualifiedName tiene un sufijo y
       namespace es **[null](#constant.null)**.





### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método sin especificar un prefijo elegirá ahora un prefijo en lugar de asumir el espacio de nombres por defecto.
       Anteriormente, esto creaba un atributo sin prefijo y aplicaba incorrectamente el espacio de nombres al elemento propietario
       ya que los espacios de nombres por defecto no se aplican a los atributos.




      8.3.0

       Llamar a este método utilizando un prefijo ya declarado en el elemento propietario con un URI de espacio de nombres diferente
       cambiará ahora el nuevo prefijo para evitar conflictos de espacio de nombres. Esto alinea el comportamiento con la especificación del DOM.
       Anteriormente, esto lanzaba una [DOMException](#class.domexception) con el código **[DOM_NAMESPACE_ERR](#constant.dom-namespace-err)**.





### Ver también

    - [DOMNode::appendChild()](#domnode.appendchild) - Añade un nuevo hijo al final de los hijos

    - [DOMDocument::createAttribute()](#domdocument.createattribute) - Crear nuevo attribute

    - [DOMDocument::createCDATASection()](#domdocument.createcdatasection) - Crea un nuevo nodo cdata

    - [DOMDocument::createComment()](#domdocument.createcomment) - Crea un nuevo nodo de comentario

    - [DOMDocument::createDocumentFragment()](#domdocument.createdocumentfragment) - Crea un nuevo fragmento de documento

    - [DOMDocument::createElement()](#domdocument.createelement) - Crea un nuevo nodo elemento

    - [DOMDocument::createElementNS()](#domdocument.createelementns) - Crea un nuevo nodo elemento con el nombre de espacio asociado

    - [DOMDocument::createEntityReference()](#domdocument.createentityreference) - Create new entity reference node

    - [DOMDocument::createProcessingInstruction()](#domdocument.createprocessinginstruction) - Crea un nuevo nodo PI

    - [DOMDocument::createTextNode()](#domdocument.createtextnode) - Crea un nuevo nodo de texto

# DOMDocument::createCDATASection

(PHP 5, PHP 7, PHP 8)

DOMDocument::createCDATASection — Crea un nuevo nodo cdata

### Descripción

public **DOMDocument::createCDATASection**([string](#language.types.string) $data): [DOMCdataSection](#class.domcdatasection)|[false](#language.types.singleton)

Esta función crea una nueva instancia de la clase
[DOMCDATASection](#class.domcdatasection). Este nodo no será mostrado en el documento,
a menos que sea insertado con [DOMNode::appendChild()](#domnode.appendchild).

### Parámetros

     data


       El contenido del cdata.





### Valores devueltos

El nuevo [DOMCDATASection](#class.domcdatasection) o **[false](#constant.false)** si ha ocurrido un error.

### Ver también

    - [DOMNode::appendChild()](#domnode.appendchild) - Añade un nuevo hijo al final de los hijos

    - [DOMDocument::createAttribute()](#domdocument.createattribute) - Crear nuevo attribute

    - [DOMDocument::createAttributeNS()](#domdocument.createattributens) - Crea un nuevo atributo con un espacio de nombres asociado

    - [DOMDocument::createComment()](#domdocument.createcomment) - Crea un nuevo nodo de comentario

    - [DOMDocument::createDocumentFragment()](#domdocument.createdocumentfragment) - Crea un nuevo fragmento de documento

    - [DOMDocument::createElement()](#domdocument.createelement) - Crea un nuevo nodo elemento

    - [DOMDocument::createElementNS()](#domdocument.createelementns) - Crea un nuevo nodo elemento con el nombre de espacio asociado

    - [DOMDocument::createEntityReference()](#domdocument.createentityreference) - Create new entity reference node

    - [DOMDocument::createProcessingInstruction()](#domdocument.createprocessinginstruction) - Crea un nuevo nodo PI

    - [DOMDocument::createTextNode()](#domdocument.createtextnode) - Crea un nuevo nodo de texto

# DOMDocument::createComment

(PHP 5, PHP 7, PHP 8)

DOMDocument::createComment — Crea un nuevo nodo de comentario

### Descripción

public **DOMDocument::createComment**([string](#language.types.string) $data): [DOMComment](#class.domcomment)

Esta función crea una nueva instancia de la clase
[DOMComment](#class.domcomment).
Este nodo no será mostrado en el documento,
a menos que sea insertado con [DOMNode::appendChild()](#domnode.appendchild).

### Parámetros

     data


       El contenido del comentario.





### Valores devueltos

El nuevo [DOMComment](#class.domcomment).

### Historial de cambios

      Versión
      Descripción






      8.1.0

       En caso de error, una [DomException](#class.domexception) es lanzada ahora.
       Anteriormente, **[false](#constant.false)** era devuelto.



### Ver también

    - [DOMNode::appendChild()](#domnode.appendchild) - Añade un nuevo hijo al final de los hijos

    - [DOMDocument::createAttribute()](#domdocument.createattribute) - Crear nuevo attribute

    - [DOMDocument::createAttributeNS()](#domdocument.createattributens) - Crea un nuevo atributo con un espacio de nombres asociado

    - [DOMDocument::createCDATASection()](#domdocument.createcdatasection) - Crea un nuevo nodo cdata

    - [DOMDocument::createDocumentFragment()](#domdocument.createdocumentfragment) - Crea un nuevo fragmento de documento

    - [DOMDocument::createElement()](#domdocument.createelement) - Crea un nuevo nodo elemento

    - [DOMDocument::createElementNS()](#domdocument.createelementns) - Crea un nuevo nodo elemento con el nombre de espacio asociado

    - [DOMDocument::createEntityReference()](#domdocument.createentityreference) - Create new entity reference node

    - [DOMDocument::createProcessingInstruction()](#domdocument.createprocessinginstruction) - Crea un nuevo nodo PI

    - [DOMDocument::createTextNode()](#domdocument.createtextnode) - Crea un nuevo nodo de texto

# DOMDocument::createDocumentFragment

(PHP 5, PHP 7, PHP 8)

DOMDocument::createDocumentFragment — Crea un nuevo fragmento de documento

### Descripción

public **DOMDocument::createDocumentFragment**(): [DOMDocumentFragment](#class.domdocumentfragment)

Esta función crea una nueva instancia de la clase
[DOMDocumentFragment](#class.domdocumentfragment).
Este nodo no será mostrado en el documento,
a menos que sea insertado con [DOMNode::appendChild()](#domnode.appendchild).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El nuevo [DOMDocumentFragment](#class.domdocumentfragment).

### Historial de cambios

      Versión
      Descripción






      8.1.0

       En caso de error, una [DomException](#class.domexception) es lanzada ahora.
       Anteriormente, **[false](#constant.false)** era devuelto.



### Ver también

    - [DOMNode::appendChild()](#domnode.appendchild) - Añade un nuevo hijo al final de los hijos

    - [DOMDocument::createAttribute()](#domdocument.createattribute) - Crear nuevo attribute

    - [DOMDocument::createAttributeNS()](#domdocument.createattributens) - Crea un nuevo atributo con un espacio de nombres asociado

    - [DOMDocument::createCDATASection()](#domdocument.createcdatasection) - Crea un nuevo nodo cdata

    - [DOMDocument::createComment()](#domdocument.createcomment) - Crea un nuevo nodo de comentario

    - [DOMDocument::createElement()](#domdocument.createelement) - Crea un nuevo nodo elemento

    - [DOMDocument::createElementNS()](#domdocument.createelementns) - Crea un nuevo nodo elemento con el nombre de espacio asociado

    - [DOMDocument::createEntityReference()](#domdocument.createentityreference) - Create new entity reference node

    - [DOMDocument::createProcessingInstruction()](#domdocument.createprocessinginstruction) - Crea un nuevo nodo PI

    - [DOMDocument::createTextNode()](#domdocument.createtextnode) - Crea un nuevo nodo de texto

# DOMDocument::createElement

(PHP 5, PHP 7, PHP 8)

DOMDocument::createElement — Crea un nuevo nodo elemento

### Descripción

public **DOMDocument::createElement**([string](#language.types.string) $localName, [string](#language.types.string) $value = ""): [DOMElement](#class.domelement)|[false](#language.types.singleton)

Esta función crea una nueva instancia de la clase
[DOMElement](#class.domelement). Este nodo no será mostrado en el documento,
a menos que sea insertado con [DOMNode::appendChild()](#domnode.appendchild).

### Parámetros

     localName


       El nombre de etiqueta del elemento.






     value


       El valor del elemento. De manera predeterminada se creará un elemento vacio.
       El valor también puede ser asignado más tarde con [DOMElement::$nodeValue](#domnode.props.nodevalue).




       El valor es usado al pie de la letra, excepto que las referencias de entidad
       &lt; y &gt; se escaparán. Tenga en cuenta que &amp; tiene que ser escapado manualmente;
       de lo contrario, se tomará como inicio de una referencia de entidad. Además "
       no sera escapado.





### Valores devueltos

Devuelve una nueva instanca de la clase [DOMElement](#class.domelement) o **[false](#constant.false)**
si ha ocurrido un error.

### Errores/Excepciones

     **[DOM_INVALID_CHARACTER_ERR](#constant.dom-invalid-character-err)**


       Lanzado si localName contiene un carácter inválido.





### Ejemplos

    **Ejemplo #1 Crear un nuevo elemento e insertarlo como raíz**

&lt;?php

$dom = new DOMDocument('1.0', 'utf-8');

$element = $dom-&gt;createElement('test', 'This is the root element!');

// Insertamos el nuevo elemento como raíz (hijo del documento)
$dom-&gt;appendChild($element);

echo $dom-&gt;saveXML();
?&gt;

    El ejemplo anterior mostrará:

&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;test&gt;This is the root element!&lt;/test&gt;

    **Ejemplo #2 Pasando texto que contiene un &amp; sin escapar como valor**

&lt;?php
$dom = new DOMDocument('1.0', 'utf-8');
$element = $dom-&gt;createElement('foo', 'me &amp; you');
$dom-&gt;appendChild($element);
echo $dom-&gt;saveXML();
?&gt;

    Resultado del ejemplo anterior es similar a:

Warning: DOMDocument::createElement(): unterminated entity reference you in /in/BjTCg on line 4
&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;foo/&gt;

### Notas

**Nota**:

    El parámetro value *no* será escapado.
    Utilice [DOMDocument::createTextNode()](#domdocument.createtextnode) para crear un
    nodo de texto con *soporte para escape de caracteres*.

### Ver también

    - [DOMNode::appendChild()](#domnode.appendchild) - Añade un nuevo hijo al final de los hijos

    - [DOMDocument::createAttribute()](#domdocument.createattribute) - Crear nuevo attribute

    - [DOMDocument::createAttributeNS()](#domdocument.createattributens) - Crea un nuevo atributo con un espacio de nombres asociado

    - [DOMDocument::createCDATASection()](#domdocument.createcdatasection) - Crea un nuevo nodo cdata

    - [DOMDocument::createComment()](#domdocument.createcomment) - Crea un nuevo nodo de comentario

    - [DOMDocument::createDocumentFragment()](#domdocument.createdocumentfragment) - Crea un nuevo fragmento de documento

    - [DOMDocument::createElementNS()](#domdocument.createelementns) - Crea un nuevo nodo elemento con el nombre de espacio asociado

    - [DOMDocument::createEntityReference()](#domdocument.createentityreference) - Create new entity reference node

    - [DOMDocument::createProcessingInstruction()](#domdocument.createprocessinginstruction) - Crea un nuevo nodo PI

    - [DOMDocument::createTextNode()](#domdocument.createtextnode) - Crea un nuevo nodo de texto

# DOMDocument::createElementNS

(PHP 5, PHP 7, PHP 8)

DOMDocument::createElementNS —
Crea un nuevo nodo elemento con el nombre de espacio asociado

### Descripción

public **DOMDocument::createElementNS**([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $qualifiedName, [string](#language.types.string) $value = ""): [DOMElement](#class.domelement)|[false](#language.types.singleton)

Esta función crea un nuevo nodo elemento con el nombre de espacio asociado.
Este nodo no será mostrado en el documento,
a menos que sea insertado con [DOMNode::appendChild()](#domnode.appendchild).

### Parámetros

     namespace


       El URI del nombre de espacio.






     qualifiedName


       Elo nombre cualificado del elemento, como prefix:tagname.






     value


       El valor del elemento. De manera predeterminada se creará un elemento vacio.
       El valor también puede ser asignado más tarde con [DOMElement::$nodeValue](#domnode.props.nodevalue).





### Valores devueltos

El nuevo [DOMElement](#class.domelement) o **[false](#constant.false)** si ha ocurrido un error.

### Errores/Excepciones

     **[DOM_INVALID_CHARACTER_ERR](#constant.dom-invalid-character-err)**


       Lanzado si qualifiedName contiene un carácter inválido.






     **[DOM_NAMESPACE_ERR](#constant.dom-namespace-err)**


       Lanzado si qualifiedName es un nombre cualificado mal formado.





### Ejemplos

    **Ejemplo #1 Crear un nuevo elemento e insertarlo como raíz**

&lt;?php

$dom = new DOMDocument('1.0', 'utf-8');

$element = $dom-&gt;createElementNS('http://www.example.com/XFoo', 'xfoo:test', 'This is the root element!');

// Insertamos el nuevo elemento como raíz (hijo del documento)
$dom-&gt;appendChild($element);

echo $dom-&gt;saveXML();
?&gt;

    El ejemplo anterior mostrará:

&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;xfoo:test xmlns:xfoo="http://www.example.com/XFoo"&gt;This is the root element!&lt;/xfoo:test&gt;

    **Ejemplo #2 Un ejemplo de prefijo de nombre de espacio**

&lt;?php
$doc  = new DOMDocument('1.0', 'utf-8');
$doc-&gt;formatOutput = true;
$root = $doc-&gt;createElementNS('http://www.w3.org/2005/Atom', 'element');
$doc-&gt;appendChild($root);
$root-&gt;setAttributeNS('http://www.w3.org/2000/xmlns/' ,'xmlns:g', 'http://base.google.com/ns/1.0');
$item = $doc-&gt;createElementNS('http://base.google.com/ns/1.0', 'g:item_type', 'house');
$root-&gt;appendChild($item);

echo $doc-&gt;saveXML(), "\n";

echo $item-&gt;namespaceURI, "\n"; // Outputs: http://base.google.com/ns/1.0
echo $item-&gt;prefix, "\n"; // Outputs: g
echo $item-&gt;localName, "\n"; // Outputs: item_type
?&gt;

    El ejemplo anterior mostrará:

&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;element xmlns="http://www.w3.org/2005/Atom" xmlns:g="http://base.google.com/ns/1.0"&gt;
&lt;g:item_type&gt;house&lt;/g:item_type&gt;
&lt;/element&gt;

http://base.google.com/ns/1.0
g
item_type

### Ver también

    - [DOMNode::appendChild()](#domnode.appendchild) - Añade un nuevo hijo al final de los hijos

    - [DOMDocument::createAttribute()](#domdocument.createattribute) - Crear nuevo attribute

    - [DOMDocument::createAttributeNS()](#domdocument.createattributens) - Crea un nuevo atributo con un espacio de nombres asociado

    - [DOMDocument::createCDATASection()](#domdocument.createcdatasection) - Crea un nuevo nodo cdata

    - [DOMDocument::createComment()](#domdocument.createcomment) - Crea un nuevo nodo de comentario

    - [DOMDocument::createDocumentFragment()](#domdocument.createdocumentfragment) - Crea un nuevo fragmento de documento

    - [DOMDocument::createElement()](#domdocument.createelement) - Crea un nuevo nodo elemento

    - [DOMDocument::createEntityReference()](#domdocument.createentityreference) - Create new entity reference node

    - [DOMDocument::createProcessingInstruction()](#domdocument.createprocessinginstruction) - Crea un nuevo nodo PI

    - [DOMDocument::createTextNode()](#domdocument.createtextnode) - Crea un nuevo nodo de texto

# DOMDocument::createEntityReference

(PHP 5, PHP 7, PHP 8)

DOMDocument::createEntityReference — Create new entity reference node

### Descripción

public **DOMDocument::createEntityReference**([string](#language.types.string) $name): [DOMEntityReference](#class.domentityreference)|[false](#language.types.singleton)

Esta función crea una nueva instancia de la clase
[DOMEntityReference](#class.domentityreference). Este nodo no será mostrado en el documento,
a menos que sea insertado con [DOMNode::appendChild()](#domnode.appendchild).

### Parámetros

     name


       El contenido de la entidad referencia, p.ej. la entidad referencia menos los caracteres &amp;  inicial
       y el ; final.





### Valores devueltos

El nuevo [DOMEntityReference](#class.domentityreference) o **[false](#constant.false)** si ha ocurrido un error.

### Errores/Excepciones

     **[DOM_INVALID_CHARACTER_ERR](#constant.dom-invalid-character-err)**


       Lanzado si name contiene un carácter inválido.





### Ver también

    - [DOMNode::appendChild()](#domnode.appendchild) - Añade un nuevo hijo al final de los hijos

    - [DOMDocument::createAttribute()](#domdocument.createattribute) - Crear nuevo attribute

    - [DOMDocument::createAttributeNS()](#domdocument.createattributens) - Crea un nuevo atributo con un espacio de nombres asociado

    - [DOMDocument::createCDATASection()](#domdocument.createcdatasection) - Crea un nuevo nodo cdata

    - [DOMDocument::createComment()](#domdocument.createcomment) - Crea un nuevo nodo de comentario

    - [DOMDocument::createDocumentFragment()](#domdocument.createdocumentfragment) - Crea un nuevo fragmento de documento

    - [DOMDocument::createElement()](#domdocument.createelement) - Crea un nuevo nodo elemento

    - [DOMDocument::createElementNS()](#domdocument.createelementns) - Crea un nuevo nodo elemento con el nombre de espacio asociado

    - [DOMDocument::createProcessingInstruction()](#domdocument.createprocessinginstruction) - Crea un nuevo nodo PI

    - [DOMDocument::createTextNode()](#domdocument.createtextnode) - Crea un nuevo nodo de texto

# DOMDocument::createProcessingInstruction

(PHP 5, PHP 7, PHP 8)

DOMDocument::createProcessingInstruction — Crea un nuevo nodo PI

### Descripción

public **DOMDocument::createProcessingInstruction**([string](#language.types.string) $target, [string](#language.types.string) $data = ""): [DOMProcessingInstruction](#class.domprocessinginstruction)|[false](#language.types.singleton)

Esta función crea una nueva instancia de la clase
[DOMProcessingInstruction](#class.domprocessinginstruction). Este nodo no será mostrado en el documento,
a menos que sea insertado con [DOMNode::appendChild()](#domnode.appendchild).

### Parámetros

     target


       El objetivo de la instrucción de procesamiento.






     data


       El contenido de la instrucción de procesamiento.





### Valores devueltos

El nuevo [DOMProcessingInstruction](#class.domprocessinginstruction) o **[false](#constant.false)** si ha ocurrido un error.

### Errores/Excepciones

     **[DOM_INVALID_CHARACTER_ERR](#constant.dom-invalid-character-err)**


       Lanzado si target contiene un carácter inválido.





### Ver también

    - [DOMNode::appendChild()](#domnode.appendchild) - Añade un nuevo hijo al final de los hijos

    - [DOMDocument::createAttribute()](#domdocument.createattribute) - Crear nuevo attribute

    - [DOMDocument::createAttributeNS()](#domdocument.createattributens) - Crea un nuevo atributo con un espacio de nombres asociado

    - [DOMDocument::createCDATASection()](#domdocument.createcdatasection) - Crea un nuevo nodo cdata

    - [DOMDocument::createComment()](#domdocument.createcomment) - Crea un nuevo nodo de comentario

    - [DOMDocument::createDocumentFragment()](#domdocument.createdocumentfragment) - Crea un nuevo fragmento de documento

    - [DOMDocument::createElement()](#domdocument.createelement) - Crea un nuevo nodo elemento

    - [DOMDocument::createElementNS()](#domdocument.createelementns) - Crea un nuevo nodo elemento con el nombre de espacio asociado

    - [DOMDocument::createEntityReference()](#domdocument.createentityreference) - Create new entity reference node

    - [DOMDocument::createTextNode()](#domdocument.createtextnode) - Crea un nuevo nodo de texto

# DOMDocument::createTextNode

(PHP 5, PHP 7, PHP 8)

DOMDocument::createTextNode — Crea un nuevo nodo de texto

### Descripción

public **DOMDocument::createTextNode**([string](#language.types.string) $data): [DOMText](#class.domtext)

Esta función crea una nueva instancia de la clase
[DOMText](#class.domtext).
Este nodo no será mostrado en el documento,
a menos que sea insertado con [DOMNode::appendChild()](#domnode.appendchild).

### Parámetros

     data


       El contenido del texto.





### Valores devueltos

Un nuevo [DOMText](#class.domtext).

### Historial de cambios

      Versión
      Descripción






      8.1.0

       En caso de error, una [DomException](#class.domexception) es ahora lanzada.
       Anteriormente, **[false](#constant.false)** era devuelto.



### Ver también

    - [DOMNode::appendChild()](#domnode.appendchild) - Añade un nuevo hijo al final de los hijos

    - [DOMDocument::createAttribute()](#domdocument.createattribute) - Crear nuevo attribute

    - [DOMDocument::createAttributeNS()](#domdocument.createattributens) - Crea un nuevo atributo con un espacio de nombres asociado

    - [DOMDocument::createCDATASection()](#domdocument.createcdatasection) - Crea un nuevo nodo cdata

    - [DOMDocument::createComment()](#domdocument.createcomment) - Crea un nuevo nodo de comentario

    - [DOMDocument::createDocumentFragment()](#domdocument.createdocumentfragment) - Crea un nuevo fragmento de documento

    - [DOMDocument::createElement()](#domdocument.createelement) - Crea un nuevo nodo elemento

    - [DOMDocument::createElementNS()](#domdocument.createelementns) - Crea un nuevo nodo elemento con el nombre de espacio asociado

    - [DOMDocument::createEntityReference()](#domdocument.createentityreference) - Create new entity reference node

    - [DOMDocument::createProcessingInstruction()](#domdocument.createprocessinginstruction) - Crea un nuevo nodo PI

# DOMDocument::getElementById

(PHP 5, PHP 7, PHP 8)

DOMDocument::getElementById — Busca un elemento con un cierto identificador

### Descripción

public **DOMDocument::getElementById**([string](#language.types.string) $elementId): [?](#language.types.null)[DOMElement](#class.domelement)

Esta función es similar a la función
[DOMDocument::getElementsByTagName](#domdocument.getelementsbytagname)
pero busca un elemento con un identificador dado.

Para que esta función funcione, es necesario definir los atributos ID
con [DOMElement::setIdAttribute](#domelement.setidattribute)
o definir una DTD que defina un atributo que debe ser de tipo ID.
En el último caso, es necesario validar el documento con
[DOMDocument::validate](#domdocument.validate)
o [DOMDocument::$validateOnParse](#domdocument.props.validateonparse)
antes de utilizar esta función.

### Parámetros

     elementId


       El valor del identificador único para un elemento.





### Valores devueltos

Devuelve un [DOMElement](#class.domelement) o **[null](#constant.null)** si el elemento
no es encontrado.

### Ejemplos

**Ejemplo #1 Ejemplo con DOMDocument::getElementById()**

El siguiente ejemplo
utiliza el archivo book.xml, cuyo contenido es:

&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;!DOCTYPE books [
&lt;!ELEMENT books (book+)&gt;
&lt;!ELEMENT book (title, author+, xhtml:blurb?)&gt;
&lt;!ELEMENT title (#PCDATA)&gt;
&lt;!ELEMENT blurb (#PCDATA)&gt;
&lt;!ELEMENT author (#PCDATA)&gt;
&lt;!ATTLIST books xmlns CDATA #IMPLIED&gt;
&lt;!ATTLIST books xmlns:xhtml CDATA #IMPLIED&gt;
&lt;!ATTLIST book id ID #IMPLIED&gt;
&lt;!ATTLIST author email CDATA #IMPLIED&gt;
]&gt;
&lt;?xml-stylesheet type="text/xsl" href="style.xsl"?&gt;
&lt;books xmlns="http://books.php/" xmlns:xhtml="http://www.w3.org/1999/xhtml"&gt;
&lt;book id="php-basics"&gt;
&lt;title&gt;PHP Basics&lt;/title&gt;
&lt;author email="jim.smith@basics.php"&gt;Jim Smith&lt;/author&gt;
&lt;author email="jane.smith@basics.php"&gt;Jane Smith&lt;/author&gt;
&lt;xhtml:blurb&gt;&lt;![CDATA[
&lt;p&gt;&lt;em&gt;PHP Basics&lt;/em&gt; provides an introduction to PHP.&lt;/p&gt;
]]&gt;&lt;/xhtml:blurb&gt;
&lt;/book&gt;
&lt;book id="php-advanced"&gt;
&lt;title&gt;PHP Advanced Programming&lt;/title&gt;
&lt;author email="jon.doe@advanced.php"&gt;Jon Doe&lt;/author&gt;
&lt;/book&gt;
&lt;/books&gt;

&lt;?php

$doc = new DomDocument;

// Es necesario validar el documento antes de referirse al ID
$doc-&gt;validateOnParse = true;
$doc-&gt;load('examples/book.xml');

echo "El elemento cuyo ID es 'php-basics' es: " . $doc-&gt;getElementById('php-basics')-&gt;tagName . "\n";

?&gt;

El ejemplo anterior mostrará:

El elemento cuyo ID es 'php-basics' es: chapter

### Ver también

    - [DOMDocument::getElementsByTagName()](#domdocument.getelementsbytagname) - Busca todos los elementos con el nombre de etiqueta local dado

# DOMDocument::getElementsByTagName

(PHP 5, PHP 7, PHP 8)

DOMDocument::getElementsByTagName — Busca todos los elementos con el nombre de etiqueta local dado

### Descripción

public **DOMDocument::getElementsByTagName**([string](#language.types.string) $qualifiedName): [DOMNodeList](#class.domnodelist)

Esta función devuelve una nueva instancia de la clase
[DOMNodeList](#class.domnodelist) que contiene los elementos con el nombre de
etiqueta local buscado.

### Parámetros

     qualifiedName


       El nombre local (sin namespace) de la etiqueta con el cual se hará comparación. El valor especial *
       coincindirá con todas las etiquetas.





### Valores devueltos

Un nuevo objeto [DOMNodeList](#class.domnodelist) que contiene todos los elementos coincidentes.

### Ejemplos

    **Ejemplo #1 Ejemplo de uso básico**

&lt;?php
$xml = &lt;&lt;&lt; XML
&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;books&gt;
&lt;book&gt;Patrones de Arquitectura de Aplicaciones Empresariales&lt;/book&gt;
&lt;book&gt;Patrones de diseño: elementos de diseño de software reutilizable&lt;/book&gt;
&lt;book&gt;Código limpio&lt;/book&gt;
&lt;/books&gt;
XML;

$dom = new DOMDocument;
$dom-&gt;loadXML($xml);
$books = $dom-&gt;getElementsByTagName('book');
foreach ($books as $book) {
echo $book-&gt;nodeValue, PHP_EOL;
}
?&gt;

    El ejemplo anterior mostrará:

Patrones de Arquitectura de Aplicaciones Empresariales
Patrones de diseño: elementos de diseño de software reutilizable
Código limpio

### Ver también

    - [DOMDocument::getElementsByTagNameNS()](#domdocument.getelementsbytagnamens) - Búsqueda de todos los elementos con un nombre de etiqueta dado en un espacio de nombres especificado

# DOMDocument::getElementsByTagNameNS

(PHP 5, PHP 7, PHP 8)

DOMDocument::getElementsByTagNameNS —
Búsqueda de todos los elementos con un nombre de etiqueta dado en un espacio de nombres especificado

### Descripción

public **DOMDocument::getElementsByTagNameNS**([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $localName): [DOMNodeList](#class.domnodelist)

Devuelve un [DOMNodeList](#class.domnodelist) de todos los elementos
con un nombre local dado y una URI de espacio de nombres.

### Parámetros

     namespace


       La URI del espacio de nombres de los elementos a buscar.
       El valor especial "*" representa todos los espacios de nombres.
       Pasar **[null](#constant.null)** representa el espacio de nombres vacío.






     localName


       El nombre local de los elementos a buscar.
       El valor especial "*" representa todos los nombres locales.





### Valores devueltos

Un nuevo objeto [DOMNodeList](#class.domnodelist) que contiene
todos los elementos encontrados.

### Historial de cambios

      Versión
      Descripción






      8.0.3

       namespace ahora es nullable.



### Ejemplos

    **Ejemplo #1 Recuperación de todos los elementos XInclude**

&lt;?php

$xml = &lt;&lt;&lt;EOD
&lt;?xml version="1.0" ?&gt;
&lt;chapter xmlns:xi="http://www.w3.org/2001/XInclude"&gt;
&lt;title&gt;Books of the other guy..&lt;/title&gt;
&lt;para&gt;
 &lt;xi:include href="book.xml"&gt;
  &lt;xi:fallback&gt;
   &lt;error&gt;xinclude: book.xml not found&lt;/error&gt;
  &lt;/xi:fallback&gt;
 &lt;/xi:include&gt;
 &lt;include&gt;
  This is another namespace
 &lt;/include&gt;
&lt;/para&gt;
&lt;/chapter&gt;
EOD;
$dom = new DOMDocument;

// load the XML string defined above
$dom-&gt;loadXML($xml);

foreach ($dom-&gt;getElementsByTagNameNS('http://www.w3.org/2001/XInclude', '\*') as $element) {
echo 'local name: ', $element-&gt;localName, ', prefix: ', $element-&gt;prefix, "\n";
}
?&gt;

    El ejemplo anterior mostrará:

local name: include, prefix: xi
local name: fallback, prefix: xi

### Ver también

    - [DOMDocument::getElementsByTagName()](#domdocument.getelementsbytagname) - Busca todos los elementos con el nombre de etiqueta local dado

# DOMDocument::importNode

(PHP 5, PHP 7, PHP 8)

DOMDocument::importNode — Importa un nodo dentro del documento actual

### Descripción

public **DOMDocument::importNode**([DOMNode](#class.domnode) $node, [bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)

Esta función devuelve una copia del nodo a importar y le asocia con el documento actual.

### Parámetros

     node


       El nodo que desea importar






     deep


       Si se establece en **[true](#constant.true)**, este método importará  de forma recursiva el subárbol
       bajo el node.



      **Nota**:



        Para copiar los atributos de los nodos  deep debe establecerse a **[true](#constant.true)**






### Valores devueltos

El nodo copiado o **[false](#constant.false)**, si no puede ser copiado.

### Errores/Excepciones

[DOMException](#class.domexception) es lanzado si el nodo no puede ser importado.

### Ejemplos

    **Ejemplo #1 DOMDocument::importNode()** ejemplo



      Copiando nodos entre documentos.

&lt;?php

$orgdoc = new DOMDocument;
$orgdoc-&gt;loadXML("&lt;root&gt;&lt;element&gt;&lt;child&gt;text in child&lt;/child&gt;&lt;/element&gt;&lt;/root&gt;");

// El nodo que se quiere importar al nuevo documento
$node = $orgdoc-&gt;getElementsByTagName("element")-&gt;item(0);

// Crear un nuevo documento
$newdoc = new DOMDocument;
$newdoc-&gt;formatOutput = true;

// Agregar marcado
$newdoc-&gt;loadXML("&lt;root&gt;&lt;someelement&gt;text in some element&lt;/someelement&gt;&lt;/root&gt;");

echo "The 'new document' before copying nodes into it:\n";
echo $newdoc-&gt;saveXML();

// Importar el nodo y todos sus hijos al documento
$node = $newdoc-&gt;importNode($node, true);
// y entonces anexarlo a el nodo "&lt;root&gt;"
$newdoc-&gt;documentElement-&gt;appendChild($node);

echo "\nThe 'new document' after copying the nodes into it:\n";
echo $newdoc-&gt;saveXML();
?&gt;

    El ejemplo anterior mostrará:

The 'new document' before copying nodes into it:
&lt;?xml version="1.0"?&gt;
&lt;root&gt;
&lt;someelement&gt;text in some element&lt;/someelement&gt;
&lt;/root&gt;

The 'new document' after copying the nodes into it:
&lt;?xml version="1.0"?&gt;
&lt;root&gt;
&lt;someelement&gt;text in some element&lt;/someelement&gt;
&lt;element&gt;
&lt;child&gt;text in child&lt;/child&gt;
&lt;/element&gt;
&lt;/root&gt;

# DOMDocument::load

(PHP 5, PHP 7, PHP 8)

DOMDocument::load —
Cargar un documento XML de un archivo.

### Descripción

public **DOMDocument::load**([string](#language.types.string) $filename, [int](#language.types.integer) $options = 0): [bool](#language.types.boolean)

Cargar un documento XML de un archivo.

**Advertencia**

    Rutas tipo Unix con barras inclinadas hacia a delante, pueden causar una degradacion significativa de rendimiento
    en sistemas Windows; asegúrese de llamar [realpath()](#function.realpath)
    en es el caso.

### Parámetros

     filename


       La ruta al documento XML.






     options


       [Bit a bit OR](#language.operators.bitwise)
       de las [constantes de opción libxml](#libxml.constants).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si se pasa un string vacío como el filename
o se pasa el nombre de un archivo vacío, se generará una advertencia. Esta advertencia
no es generada por libxml y no puede ser manejada utilizando las
funciones de control de errores de libxml.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Esta función ahora tiene un tipo de retorno [bool](#language.types.boolean) tentativo.




      8.0.0

       Llamar a esta función de forma estática
       ahora lanzará un [Error](#class.error).
       Anteriormente, se emitía un **[E_DEPRECATED](#constant.e-deprecated)**.



### Ejemplos

    **Ejemplo #1 Creando un Documento**

&lt;?php
$doc = new DOMDocument();
$doc-&gt;load('examples/book.xml');
echo $doc-&gt;saveXML();
?&gt;

### Ver también

    - [DOMDocument::loadXML()](#domdocument.loadxml) - Carga de XML desde una cadena de caracteres

    - [DOMDocument::save()](#domdocument.save) - Copia el árbol XML interno a un archivo

    - [DOMDocument::saveXML()](#domdocument.savexml) - Guarda el árbol interno XML en una cadena de caracteres

# DOMDocument::loadHTML

(PHP 5, PHP 7, PHP 8)

DOMDocument::loadHTML —
Carga HTML de un string

### Descripción

public **DOMDocument::loadHTML**([string](#language.types.string) $source, [int](#language.types.integer) $options = 0): [bool](#language.types.boolean)

Esta función procesa el HTML contenido un string source.
A diferencia a cargar XML, HTML no tiene que estar bien formado para cargarse.

**Advertencia**

Utilice [Dom\HTMLDocument](#class.dom-htmldocument) para analizar y tratar el HTML moderno en lugar de [DOMDocument](#class.domdocument).

Esta función analiza la entrada utilizando un analizador HTML 4. Las reglas de análisis
del HTML 5, que son las utilizadas por los navegadores web modernos, son diferentes.
Según la entrada, esto puede resultar en una estructura DOM diferente. Por lo tanto,
esta función no puede ser utilizada de forma segura para la sanitización del HTML.

El comportamiento durante el análisis del HTML puede depender de la versión de
libxml que se utilice, especialmente en lo que respecta
a los casos límite y el manejo de errores.
Para un análisis conforme a la especificación HTML5,
utilice [Dom\HTMLDocument::createFromString()](#dom-htmldocument.createfromstring) o
[Dom\HTMLDocument::createFromFile()](#dom-htmldocument.createfromfile), añadidos en PHP 8.4.

Por ejemplo, algunos elementos HTML cerrarán implícitamente un elemento padre
cuando sean encontrados. Las reglas de cierre automático de elementos padres
difieren entre HTML 4 y HTML 5, y por lo tanto, la estructura DOM que
[DOMDocument](#class.domdocument) ve puede ser diferente de la que un navegador
web ve, lo que puede permitir potencialmente a un atacante comprometer el HTML
resultante.

### Parámetros

     source


       Un string HTML.






     options



[Operación de 'OR' lógica](#language.operators.bitwise)
de las [constantes de opción libxml](#libxml.constants).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si se pasa una cadena vacía como source,
se generará una advertencia. Esta advertencia no es generada por libxml
y no puede ser manejada utilizando las funciones de control de errores de libxml.

Aunque el HTML mal-formado debería cargarse con éxito, esta función puede generar
una advertencia de tipo **[E_WARNING](#constant.e-warning)** cuando encuentre una mala etiqueta.
[Las funciones de manejo de errores libxml](#function.libxml-use-internal-errors)
pueden ser utilizadas para manejar estos errores.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Esta función ahora tiene un tipo de retorno [bool](#language.types.boolean) tentativo.




      8.0.0

       Llamar a esta función de forma estática
       ahora lanzará un [Error](#class.error).
       Anteriormente, se emitía un **[E_DEPRECATED](#constant.e-deprecated)**.



### Ejemplos

    **Ejemplo #1 Creando un Documento**

&lt;?php
$doc = new DOMDocument();
$doc-&gt;loadHTML("&lt;html&gt;&lt;body&gt;Test&lt;br&gt;&lt;/body&gt;&lt;/html&gt;");
echo $doc-&gt;saveHTML();
?&gt;

### Ver también

    - [DOMDocument::loadHTMLFile()](#domdocument.loadhtmlfile) - Carga HTML desde un fichero

    - [DOMDocument::saveHTML()](#domdocument.savehtml) - Copia el documento interno a una cadena usando el formato HTML

    - [DOMDocument::saveHTMLFile()](#domdocument.savehtmlfile) - Copia el documento interno a un fichero usando el formato HTML

# DOMDocument::loadHTMLFile

(PHP 5, PHP 7, PHP 8)

DOMDocument::loadHTMLFile —
Carga HTML desde un fichero

### Descripción

public **DOMDocument::loadHTMLFile**([string](#language.types.string) $filename, [int](#language.types.integer) $options = 0): [bool](#language.types.boolean)

Esta función analiza el documento HTML del fichero llamado
filename. A diferencia de cargar XML, HTML no tiene
que estar bien formado para cargarse.

**Advertencia**

Utilice [Dom\HTMLDocument](#class.dom-htmldocument) para analizar y tratar el HTML moderno en lugar de [DOMDocument](#class.domdocument).

Esta función analiza la entrada utilizando un analizador HTML 4. Las reglas de análisis
del HTML 5, que son las utilizadas por los navegadores web modernos, son diferentes.
Según la entrada, esto puede resultar en una estructura DOM diferente. Por lo tanto,
esta función no puede ser utilizada de forma segura para la sanitización del HTML.

El comportamiento durante el análisis del HTML puede depender de la versión de
libxml que se utilice, especialmente en lo que respecta
a los casos límite y el manejo de errores.
Para un análisis conforme a la especificación HTML5,
utilice [Dom\HTMLDocument::createFromString()](#dom-htmldocument.createfromstring) o
[Dom\HTMLDocument::createFromFile()](#dom-htmldocument.createfromfile), añadidos en PHP 8.4.

Por ejemplo, algunos elementos HTML cerrarán implícitamente un elemento padre
cuando sean encontrados. Las reglas de cierre automático de elementos padres
difieren entre HTML 4 y HTML 5, y por lo tanto, la estructura DOM que
[DOMDocument](#class.domdocument) ve puede ser diferente de la que un navegador
web ve, lo que puede permitir potencialmente a un atacante comprometer el HTML
resultante.

### Parámetros

     filename


       La ruta al fichero HTML.






     options



[Operación de 'OR' lógica](#language.operators.bitwise)
de las [constantes de opción libxml](#libxml.constants).

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si se pasa una cadena vacía a filename
o se nombra un fichero vacío, se generará una advertencia. Esta advertencia
no es generada por libxml y no puede ser controlada utilizando las [funciones de manejo de errores de libxml](#function.libxml-use-internal-errors).

Aunque el HTML mal-formado debería cargarse con éxito, esta función puede generar
una advertencia de tipo **[E_WARNING](#constant.e-warning)** cuando encuentre una mala etiqueta.
[Las funciones de manejo de errores libxml](#function.libxml-use-internal-errors)
pueden ser utilizadas para manejar estos errores.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Esta función ahora tiene un tipo de retorno [bool](#language.types.boolean) tentativo.




      8.0.0

       Llamar a esta función de forma estática
       ahora lanzará un [Error](#class.error).
       Anteriormente, se emitía un **[E_DEPRECATED](#constant.e-deprecated)**.



### Ejemplos

    **Ejemplo #1 Creando un Documento**

&lt;?php
$doc = new DOMDocument();
$doc-&gt;loadHTMLFile("filename.html");
echo $doc-&gt;saveHTML();
?&gt;

### Ver también

    - [DOMDocument::loadHTML()](#domdocument.loadhtml) - Carga HTML de un string

    - [DOMDocument::saveHTML()](#domdocument.savehtml) - Copia el documento interno a una cadena usando el formato HTML

    - [DOMDocument::saveHTMLFile()](#domdocument.savehtmlfile) - Copia el documento interno a un fichero usando el formato HTML

# DOMDocument::loadXML

(PHP 5, PHP 7, PHP 8)

DOMDocument::loadXML —
Carga de XML desde una cadena de caracteres

### Descripción

public **DOMDocument::loadXML**([string](#language.types.string) $source, [int](#language.types.integer) $options = 0): [bool](#language.types.boolean)

Carga un documento XML desde una cadena de caracteres.

### Parámetros

     source


       La cadena de caracteres que contiene el XML.






     options


       [El operador OR](#language.operators.bitwise)
       de las [constantes libxml](#libxml.constants).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Si se pasa una cadena vacía como argumento source,
se generará una advertencia. Esta advertencia no es generada
por libxml, y no puede ser gestionada utilizando las funciones de gestión
de errores de libxml.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Esta función tiene ahora un tipo de retorno [bool](#language.types.boolean) provisional.




      8.0.0

       La llamada estática a esta función levantará ahora una [Error](#class.error).
       Anteriormente, se generaba un error **[E_DEPRECATED](#constant.e-deprecated)**.



### Ejemplos

    **Ejemplo #1 Creación de un Documento**

&lt;?php
$doc = new DOMDocument();
$doc-&gt;loadXML('&lt;root&gt;&lt;node/&gt;&lt;/root&gt;');
echo $doc-&gt;saveXML();
?&gt;

### Ver también

    - [DOMDocument::load()](#domdocument.load) - Cargar un documento XML de un archivo.

    - [DOMDocument::save()](#domdocument.save) - Copia el árbol XML interno a un archivo

    - [DOMDocument::saveXML()](#domdocument.savexml) - Guarda el árbol interno XML en una cadena de caracteres

# DOMDocument::normalizeDocument

(PHP 5, PHP 7, PHP 8)

DOMDocument::normalizeDocument — Normaliza el documento

### Descripción

public **DOMDocument::normalizeDocument**(): [void](language.types.void.html)

Este método actúa como si guardara y después cargara el documento, poniendo el
el documento en una forma "normal".

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    -
     [» La Especificación DOM](http://www.w3.org/TR/2003/WD-DOM-Level-3-Core-20030226/DOM3-Core.html#core-Document3-normalizeDocument)


    - [DOMNode::normalize()](#domnode.normalize) - Normaliza el nodo

# DOMDocument::prepend

(PHP 8)

DOMDocument::prepend — Añade nodos antes del primer nodo hijo

### Descripción

public **DOMDocument::prepend**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade uno o varios nodes a la lista de hijos antes del primer nodo hijo.

### Parámetros

     nodes


       Los nodos a añadir.
       Las cadenas de caracteres se convierten automáticamente en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si este nodo es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin documento propietario funciona ahora.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMDocument::prepend()**

    Añade nodos antes del nodo raíz del documento.

&lt;?php
$doc = new DOMDocument;
$doc-&gt;loadXML("&lt;world/&gt;");

$doc-&gt;prepend($doc-&gt;createElement("hello"), "beautiful");

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;hello/&gt;
beautiful
&lt;world/&gt;

### Ver también

- [DOMParentNode::prepend()](#domparentnode.prepend) - Añade nodos antes del primer nodo hijo

- [DOMDocument::append()](#domdocument.append) - Añade nodos después del último nodo hijo

# DOMDocument::registerNodeClass

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DOMDocument::registerNodeClass — Registra la clase extendida utilizada para crear un tipo de nodo base

### Descripción

public **DOMDocument::registerNodeClass**([string](#language.types.string) $baseClass, [?](#language.types.null)[string](#language.types.string) $extendedClass): [true](#language.types.singleton)

Este método permite registrar su propia clase DOM extendida para ser utilizada
posteriormente en la extensión DOM de PHP.

Este método no forma parte del estándar DOM.

**Precaución**

    Los constructores de los objetos de las clases de nodos registrados no son llamados.

### Parámetros

     baseClass


       La clase DOM que se desea extender. Puede encontrarse una lista
       de estas clases en la [introducción del capítulo](#book.dom).






     extendedClass


       El nombre de su clase extendida. Si se proporciona el valor **[null](#constant.null)**, todas
       las clases registradas previamente que extienden
       baseClass serán eliminadas.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       **DOMDocument::registerNodeClass()**
       ahora tiene un tipo de retorno provisional de tipo [true](#language.types.singleton).



### Ejemplos

    **Ejemplo #1 Añadir un nuevo método a DOMElement**

&lt;?php

class myElement extends DOMElement {
function appendElement($name) {
      return $this-&gt;appendChild(new myElement($name));
}
}

class myDocument extends DOMDocument {
function setRoot($name) {
      return $this-&gt;appendChild(new myElement($name));
}
}

$doc = new myDocument();
$doc-&gt;registerNodeClass('DOMElement', 'myElement');

// A partir de aquí, la adición de un elemento a otro se realiza en una sola llamada !
$root = $doc-&gt;setRoot('root');
$child = $root-&gt;appendElement('child');
$child-&gt;setAttribute('foo', 'bar');

echo $doc-&gt;saveXML();

?&gt;

    El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;root&gt;&lt;child foo="bar"/&gt;&lt;/root&gt;

    **Ejemplo #2 Recuperación de elementos en forma de clase personalizada**

&lt;?php
class myElement extends DOMElement {
public function \_\_toString() {
return $this-&gt;nodeValue;
}
}

$doc = new DOMDocument;
$doc-&gt;loadXML("&lt;root&gt;&lt;element&gt;&lt;child&gt;Texto en un hijo&lt;/child&gt;&lt;/element&gt;&lt;/root&gt;");
$doc-&gt;registerNodeClass("DOMElement", "myElement");

$element = $doc-&gt;getElementsByTagName("child")-&gt;item(0);
var_dump(get_class($element));

// Y utilizamos las ventajas del método \_\_toString..
echo $element;
?&gt;

    El ejemplo anterior mostrará:

string(9) "myElement"
Texto en un hijo

    **Ejemplo #3 Recuperación del propietario del documento**



     Al instanciar un [DOMDocument](#class.domdocument)
     personalizado, la propiedad ownerDocument se refiere
     a la clase instanciada. Sin embargo, si todas las referencias a esta clase
     son eliminadas, será destruida y una nueva instancia de
     [DOMDocument](#class.domdocument) será creada en su lugar. Por esta razón,
     puede utilizarse el método **DOMDocument::registerNodeClass()**
     con [DOMDocument](#class.domdocument)

&lt;?php
class MyDOMDocument extends DOMDocument {
}

class MyOtherDOMDocument extends DOMDocument {
}

// Creación de un documento MyDOMDocument con algunos fragmentos XML
$doc = new MyDOMDocument;
$doc-&gt;loadXML("&lt;root&gt;&lt;element&gt;&lt;child&gt;texto en un hijo&lt;/child&gt;&lt;/element&gt;&lt;/root&gt;");

$child = $doc-&gt;getElementsByTagName("child")-&gt;item(0);

// El propietario actual del nodo es MyDOMDocument
var_dump(get_class($child-&gt;ownerDocument));
// MyDOMDocument es destruido
unset($doc);
// Y una nueva instancia de DOMDocument es creada
var_dump(get_class($child-&gt;ownerDocument));

// Importación de un nodo desde MyDOMDocument
$newdoc = new MyOtherDOMDocument;
$child = $newdoc-&gt;importNode($child);

// Registra un DOMDocument personalizado
$newdoc-&gt;registerNodeClass("DOMDocument", "MyOtherDOMDocument");

var_dump(get_class($child-&gt;ownerDocument));
unset($doc);
// Un nuevo MyOtherDOMDocument es creado
var_dump(get_class($child-&gt;ownerDocument));
?&gt;

    El ejemplo anterior mostrará:

string(13) "MyDOMDocument"
string(11) "DOMDocument"
string(18) "MyOtherDOMDocument"
string(18) "MyOtherDOMDocument"

    **Ejemplo #4 Los objetos personalizados son efímeros**


    **Precaución**

      Los objetos de la clase de nodos registrada son efímeros, es decir, son
      destruidos cuando ya no son referenciados desde el código PHP, y
      recreados cuando son recuperados nuevamente. Esto implica que los valores
      de propiedades personalizadas se perderán después de la recreación.


&lt;?php
class MyDOMElement extends DOMElement
{
public $myProp = 'default value';
}

$doc = new DOMDocument();
$doc-&gt;registerNodeClass('DOMElement', 'MyDOMElement');

$node = $doc-&gt;createElement('a');
$node-&gt;myProp = 'modified value';
$doc-&gt;appendChild($node);

echo $doc-&gt;childNodes[0]-&gt;myProp, PHP_EOL;
unset($node);
echo $doc-&gt;childNodes[0]-&gt;myProp, PHP_EOL;
?&gt;

    El ejemplo anterior mostrará:

modified value
default value

# DOMDocument::relaxNGValidate

(PHP 5, PHP 7, PHP 8)

DOMDocument::relaxNGValidate —
Realiza una validación relaxNG del documento

### Descripción

public **DOMDocument::relaxNGValidate**([string](#language.types.string) $filename): [bool](#language.types.boolean)

Realiza una validación [» relaxNG](http://www.relaxng.org/) del documento
basándose en el esquema RNG dado.

### Parámetros

     filename


       El fichero RNG.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [DOMDocument::relaxNGValidateSource()](#domdocument.relaxngvalidatesource) - Realiza una validación relaxNG del documento

    - [DOMDocument::schemaValidate()](#domdocument.schemavalidate) - Valida un documento basado en un esquema. Sólo se admite XML Schema 1.0.

    - [DOMDocument::schemaValidateSource()](#domdocument.schemavalidatesource) - Valida un documento basado en un esquema

    - [DOMDocument::validate()](#domdocument.validate) - Valida un documento basado en su DTD

# DOMDocument::relaxNGValidateSource

(PHP 5, PHP 7, PHP 8)

DOMDocument::relaxNGValidateSource —
Realiza una validación relaxNG del documento

### Descripción

public **DOMDocument::relaxNGValidateSource**([string](#language.types.string) $source): [bool](#language.types.boolean)

Realiza una validación [» relaxNG](http://www.relaxng.org/) del documento
basándose en la fuente RNG dada.

### Parámetros

     source


       Una cadena que contiene el esquema RNG.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [DOMDocument::relaxNGValidate()](#domdocument.relaxngvalidate) - Realiza una validación relaxNG del documento

    - [DOMDocument::schemaValidate()](#domdocument.schemavalidate) - Valida un documento basado en un esquema. Sólo se admite XML Schema 1.0.

    - [DOMDocument::schemaValidateSource()](#domdocument.schemavalidatesource) - Valida un documento basado en un esquema

    - [DOMDocument::validate()](#domdocument.validate) - Valida un documento basado en su DTD

# DOMDocument::replaceChildren

(PHP 8 &gt;= 8.3.0)

DOMDocument::replaceChildren — Reemplaza los hijos en el documento

### Descripción

public **DOMDocument::replaceChildren**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Reemplaza los hijos en el documento por nuevos nodes.

### Parámetros

     nodes


       Los nodos que reemplazan a los hijos.
       Las cadenas de caracteres se convierten automáticamente en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si este nodo es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin documento propietario funciona ahora.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMDocument::replaceChildren()**

    Reemplaza los hijos por nuevos nodos.

&lt;?php
$doc = new DOMDocument;
$doc-&gt;loadXML("&lt;container&gt;&lt;hello/&gt;&lt;/container&gt;");

$doc-&gt;replaceChildren("beautiful", $doc-&gt;createElement("world"));

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
beautiful
&lt;world/&gt;

### Ver también

- [DOMParentNode::replaceChildren()](#domparentnode.replacechildren) - Reemplaza los hijos en un nodo

- [DOMDocument::append()](#domdocument.append) - Añade nodos después del último nodo hijo

- [DOMDocument::prepend()](#domdocument.prepend) - Añade nodos antes del primer nodo hijo

# DOMDocument::save

(PHP 5, PHP 7, PHP 8)

DOMDocument::save —
Copia el árbol XML interno a un archivo

### Descripción

public **DOMDocument::save**([string](#language.types.string) $filename, [int](#language.types.integer) $options = 0): [int](#language.types.integer)|[false](#language.types.singleton)

Crea un documento XML desde la representación DOM. Esta función normalmente
se llama después de construir un nuevo documento desde ceros, como en el ejemplo de abajo.

### Parámetros

     filename


       La ruta al documento XML guardado.






     options


       Opciones Adicionales. Actualmente sólo está soportada [LIBXML_NOEMPTYTAG](#libxml.constants).





### Valores devueltos

Devuelve el número de bytes escritos o **[false](#constant.false)** si ocurrió un error.

### Ejemplos

    **Ejemplo #1 Guardar un árbol DOM en un fichero**

&lt;?php

$doc = new DOMDocument('1.0');
// queremos una impresión buena
$doc-&gt;formatOutput = true;

$root = $doc-&gt;createElement('book');
$root = $doc-&gt;appendChild($root);

$title = $doc-&gt;createElement('title');
$title = $root-&gt;appendChild($title);

$text = $doc-&gt;createTextNode('Este es el título');
$text = $title-&gt;appendChild($text);

echo 'Escrito: ' . $doc-&gt;save("/tmp/test.xml") . ' bytes'; // Escrito: 72 bytes

?&gt;

### Ver también

    - [DOMDocument::saveXML()](#domdocument.savexml) - Guarda el árbol interno XML en una cadena de caracteres

    - [DOMDocument::load()](#domdocument.load) - Cargar un documento XML de un archivo.

    - [DOMDocument::loadXML()](#domdocument.loadxml) - Carga de XML desde una cadena de caracteres

# DOMDocument::saveHTML

(PHP 5, PHP 7, PHP 8)

DOMDocument::saveHTML —
Copia el documento interno a una cadena usando el formato HTML

### Descripción

public **DOMDocument::saveHTML**([?](#language.types.null)[DOMNode](#class.domnode) $node = **[null](#constant.null)**): [string](#language.types.string)|[false](#language.types.singleton)

Crea un documento HTML desde la representación DOM. Esta función normalmente
se llama después de construir un nuevo documento desde cero, como en el ejemplo de abajo.

### Parámetros

     node


       Parámetro opcional que devuelve una parte del documento.





### Valores devueltos

Devuelve el HTML, o **[false](#constant.false)** si ocurrió un error.

### Ejemplos

    **Ejemplo #1 Salvar un árbol HTML en una cadena**

&lt;?php

$doc = new DOMDocument('1.0');

$root = $doc-&gt;createElement('html');
$root = $doc-&gt;appendChild($root);

$head = $doc-&gt;createElement('head');
$head = $root-&gt;appendChild($head);

$title = $doc-&gt;createElement('title');
$title = $head-&gt;appendChild($title);

$text = $doc-&gt;createTextNode('Este es el título');
$text = $title-&gt;appendChild($text);

echo $doc-&gt;saveHTML();

?&gt;

### Ver también

    - [DOMDocument::saveHTMLFile()](#domdocument.savehtmlfile) - Copia el documento interno a un fichero usando el formato HTML

    - [DOMDocument::loadHTML()](#domdocument.loadhtml) - Carga HTML de un string

    - [DOMDocument::loadHTMLFile()](#domdocument.loadhtmlfile) - Carga HTML desde un fichero

# DOMDocument::saveHTMLFile

(PHP 5, PHP 7, PHP 8)

DOMDocument::saveHTMLFile —
Copia el documento interno a un fichero usando el formato HTML

### Descripción

public **DOMDocument::saveHTMLFile**([string](#language.types.string) $filename): [int](#language.types.integer)|[false](#language.types.singleton)

Crea un documento HTML desde la representación DOM. Esta función normalmente
se llama después de construir un nuevo documento desde cero, como en el ejemplo de abajo.

### Parámetros

     filename


       La ruta al documento HTML guardado.





### Valores devueltos

Devuelve el número de bytes escritos o **[false](#constant.false)** si ocurrió un error.

### Ejemplos

    **Ejemplo #1 Guardar un árbol HTML en un archivo**

&lt;?php

$doc = new DOMDocument('1.0');
// queremos una impresión buena
$doc-&gt;formatOutput = true;

$root = $doc-&gt;createElement('html');
$root = $doc-&gt;appendChild($root);

$head = $doc-&gt;createElement('head');
$head = $root-&gt;appendChild($head);

$title = $doc-&gt;createElement('title');
$title = $head-&gt;appendChild($title);

$text = $doc-&gt;createTextNode('Este es el título');
$text = $title-&gt;appendChild($text);

echo 'EScrito: ' . $doc-&gt;saveHTMLFile("/tmp/test.html") . ' bytes'; // Escrito: 129 bytes

?&gt;

### Ver también

    - [DOMDocument::saveHTML()](#domdocument.savehtml) - Copia el documento interno a una cadena usando el formato HTML

    - [DOMDocument::loadHTML()](#domdocument.loadhtml) - Carga HTML de un string

    - [DOMDocument::loadHTMLFile()](#domdocument.loadhtmlfile) - Carga HTML desde un fichero

# DOMDocument::saveXML

(PHP 5, PHP 7, PHP 8)

DOMDocument::saveXML —
Guarda el árbol interno XML en una cadena de caracteres

### Descripción

public **DOMDocument::saveXML**([?](#language.types.null)[DOMNode](#class.domnode) $node = **[null](#constant.null)**, [int](#language.types.integer) $options = 0): [string](#language.types.string)|[false](#language.types.singleton)

Crea un documento XML desde la representación DOM. Esta función es habitualmente
llamada después de la creación de un nuevo documento DOM, como en el ejemplo
que se muestra a continuación.

### Parámetros

     node


       Utilice este argumento para mostrar únicamente un nodo específico sin declaración XML
       en lugar de todo el documento.






     options



Opciones adicionales.
Las opciones **[LIBXML_NOEMPTYTAG](#constant.libxml-noemptytag)**
y **[LIBXML_NOXMLDECL](#constant.libxml-noxmldecl)** son soportadas.
Antes de PHP 8.3.0, solo la opción **[LIBXML_NOEMPTYTAG](#constant.libxml-noemptytag)**
era soportada.

### Valores devueltos

Devuelve el XML o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

     **[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**


       Lanzado si node proviene de otro documento.





### Historial de cambios

      Versión
      Descripción






      8.3.0

       [LIBXML_NOXMLDECL](#libxml.constants) es ahora soportado.



### Ejemplos

    **Ejemplo #1 Guardar el árbol DOM en una cadena de caracteres**

&lt;?php

$doc = new DOMDocument('1.0');
// queremos un formato de salida bonito
$doc-&gt;formatOutput = true;

$root = $doc-&gt;createElement('book');
$root = $doc-&gt;appendChild($root);

$title = $doc-&gt;createElement('title');
$title = $root-&gt;appendChild($title);

$text = $doc-&gt;createTextNode('Este es el título');
$text = $title-&gt;appendChild($text);

echo "Obtención de todo el documento :\n";
echo $doc-&gt;saveXML() . "\n";

echo "Obtención del título, únicamente :\n";
echo $doc-&gt;saveXML($title);

?&gt;

    El ejemplo anterior mostrará:

Obtención de todo el documento :
&lt;?xml version="1.0"?&gt;
&lt;book&gt;
&lt;title&gt;Este es el título&lt;/title&gt;
&lt;/book&gt;

Obtención del título, únicamente :
&lt;title&gt;Este es el título&lt;/title&gt;

### Ver también

    - [DOMDocument::save()](#domdocument.save) - Copia el árbol XML interno a un archivo

    - [DOMDocument::load()](#domdocument.load) - Cargar un documento XML de un archivo.

    - [DOMDocument::loadXML()](#domdocument.loadxml) - Carga de XML desde una cadena de caracteres

# DOMDocument::schemaValidate

(PHP 5, PHP 7, PHP 8)

DOMDocument::schemaValidate —
Valida un documento basado en un esquema. Sólo se admite XML Schema 1.0.

### Descripción

public **DOMDocument::schemaValidate**([string](#language.types.string) $filename, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

Valida un documento basado en el fichero de esquema dado.

### Parámetros

     filename


       La ruta al esquema.






     flags


       Una máscara de bits de banderas de validación de esquemas de Libxml. Actualmente el único valor admitido es [LIBXML_SCHEMA_CREATE](#libxml.constants). Disponible desde Libxml 2.6.14.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [DOMDocument::schemaValidateSource()](#domdocument.schemavalidatesource) - Valida un documento basado en un esquema

    - [DOMDocument::relaxNGValidate()](#domdocument.relaxngvalidate) - Realiza una validación relaxNG del documento

    - [DOMDocument::relaxNGValidateSource()](#domdocument.relaxngvalidatesource) - Realiza una validación relaxNG del documento

    - [DOMDocument::validate()](#domdocument.validate) - Valida un documento basado en su DTD

# DOMDocument::schemaValidateSource

(PHP 5, PHP 7, PHP 8)

DOMDocument::schemaValidateSource —
Valida un documento basado en un esquema

### Descripción

public **DOMDocument::schemaValidateSource**([string](#language.types.string) $source, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

Valida un documento basado en un esquema definido en la cadena dada.

### Parámetros

     source


       Una cadena que contiene el esquema.






     flags


       Una máscara de bits de banderas de validación de esquemas de Libxml. Actualmente el único valor admitido es
       [LIBXML_SCHEMA_CREATE](#libxml.constants). Disponible desde Libxml 2.6.14.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [DOMDocument::schemaValidate()](#domdocument.schemavalidate) - Valida un documento basado en un esquema. Sólo se admite XML Schema 1.0.

    - [DOMDocument::relaxNGValidate()](#domdocument.relaxngvalidate) - Realiza una validación relaxNG del documento

    - [DOMDocument::relaxNGValidateSource()](#domdocument.relaxngvalidatesource) - Realiza una validación relaxNG del documento

    - [DOMDocument::validate()](#domdocument.validate) - Valida un documento basado en su DTD

# DOMDocument::validate

(PHP 5, PHP 7, PHP 8)

DOMDocument::validate —
Valida un documento basado en su DTD

### Descripción

public **DOMDocument::validate**(): [bool](#language.types.boolean)

Valida un documento basado en su DTD.

Puede utilizarse la propiedad validateOnParse de la clase
[DOMDocument](#class.domdocument) para realizar una validación DTD.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.
Si el documento no tiene ninguna DTD asociada, este método retornará **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Ejemplo de validación DTD**

&lt;?php
$dom = new DOMDocument;
$dom-&gt;load('examples/book.xml');
if ($dom-&gt;validate()) {
echo "¡Este documento es válido!\n";
}
?&gt;

     Asimismo, puede validarse el fichero XML al cargarlo:

&lt;?php
$dom = new DOMDocument;
$dom-&gt;validateOnParse = true;
$dom-&gt;load('examples/book.xml');
?&gt;

### Ver también

    - [DOMDocument::schemaValidate()](#domdocument.schemavalidate) - Valida un documento basado en un esquema. Sólo se admite XML Schema 1.0.

    - [DOMDocument::schemaValidateSource()](#domdocument.schemavalidatesource) - Valida un documento basado en un esquema

    - [DOMDocument::relaxNGValidate()](#domdocument.relaxngvalidate) - Realiza una validación relaxNG del documento

    - [DOMDocument::relaxNGValidateSource()](#domdocument.relaxngvalidatesource) - Realiza una validación relaxNG del documento

# DOMDocument::xinclude

(PHP 5, PHP 7, PHP 8)

DOMDocument::xinclude —
Reemplaza los XIncludes en un objeto DOMDocument

### Descripción

public **DOMDocument::xinclude**([int](#language.types.integer) $options = 0): [int](#language.types.integer)|[false](#language.types.singleton)

Este método reemplaza los [» XIncludes](http://www.w3.org/TR/xinclude/) en un objeto DOMDocument.

**Nota**:

    Dado que la biblioteca libxml2 resuelve automáticamente las entidades, este método
    puede producir resultados no esperados si el fichero XML incluido tiene una DTD adjunta.

### Parámetros

     options



[Operación de 'OR' lógica](#language.operators.bitwise)
de las [constantes de opción libxml](#libxml.constants).

### Valores devueltos

Devuelve el número de XIncludes del documento, -1 si ocurre un error
durante el proceso, o **[false](#constant.false)** si no hay sustitución.

### Ejemplos

    **Ejemplo #1 Ejemplo con DOMDocument::xinclude()**

&lt;?php

$xml = &lt;&lt;&lt;EOD
&lt;?xml version="1.0" ?&gt;
&lt;chapter xmlns:xi="http://www.w3.org/2001/XInclude"&gt;
&lt;title&gt;Los libros de otra persona&lt;/title&gt;
&lt;para&gt;
&lt;xi:include href="examples/book.xml"&gt;
&lt;xi:fallback&gt;
&lt;error&gt;xinclude: book.xml no ha sido encontrado&lt;/error&gt;
&lt;/xi:fallback&gt;
&lt;/xi:include&gt;
&lt;/para&gt;
&lt;/chapter&gt;
EOD;

$dom = new DOMDocument;

// Se desea un bonito formato de salida
$dom-&gt;preserveWhiteSpace = false;
$dom-&gt;formatOutput = true;

// carga del string XML definido anteriormente
$dom-&gt;loadXML($xml);

// reemplazo de los xincludes
$dom-&gt;xinclude();

echo $dom-&gt;saveXML();

?&gt;

    Resultado del ejemplo anterior es similar a:

&lt;?xml version="1.0"?&gt;
&lt;chapter xmlns:xi="http://www.w3.org/2001/XInclude"&gt;
&lt;title&gt;Los libros de otra persona&lt;/title&gt;
&lt;para&gt;
&lt;row xml:base="/home/didou/book.xml"&gt;
&lt;entry&gt;The Grapes of Wrath&lt;/entry&gt;
&lt;entry&gt;John Steinbeck&lt;/entry&gt;
&lt;entry&gt;en&lt;/entry&gt;
&lt;entry&gt;0140186409&lt;/entry&gt;
&lt;/row&gt;
&lt;row xml:base="/home/didou/book.xml"&gt;
&lt;entry&gt;The Pearl&lt;/entry&gt;
&lt;entry&gt;John Steinbeck&lt;/entry&gt;
&lt;entry&gt;en&lt;/entry&gt;
&lt;entry&gt;014017737X&lt;/entry&gt;
&lt;/row&gt;
&lt;row xml:base="/home/didou/book.xml"&gt;
&lt;entry&gt;Samarcande&lt;/entry&gt;
&lt;entry&gt;Amine Maalouf&lt;/entry&gt;
&lt;entry&gt;fr&lt;/entry&gt;
&lt;entry&gt;2253051209&lt;/entry&gt;
&lt;/row&gt;
&lt;/para&gt;
&lt;/chapter&gt;

## Tabla de contenidos

- [DOMDocument::adoptNode](#domdocument.adoptnode) — Transfiere un nodo de otro documento
- [DOMDocument::append](#domdocument.append) — Añade nodos después del último nodo hijo
- [DOMDocument::\_\_construct](#domdocument.construct) — Crea un nuevo objeto DOMDocument
- [DOMDocument::createAttribute](#domdocument.createattribute) — Crear nuevo attribute
- [DOMDocument::createAttributeNS](#domdocument.createattributens) — Crea un nuevo atributo con un espacio de nombres asociado
- [DOMDocument::createCDATASection](#domdocument.createcdatasection) — Crea un nuevo nodo cdata
- [DOMDocument::createComment](#domdocument.createcomment) — Crea un nuevo nodo de comentario
- [DOMDocument::createDocumentFragment](#domdocument.createdocumentfragment) — Crea un nuevo fragmento de documento
- [DOMDocument::createElement](#domdocument.createelement) — Crea un nuevo nodo elemento
- [DOMDocument::createElementNS](#domdocument.createelementns) — Crea un nuevo nodo elemento con el nombre de espacio asociado
- [DOMDocument::createEntityReference](#domdocument.createentityreference) — Create new entity reference node
- [DOMDocument::createProcessingInstruction](#domdocument.createprocessinginstruction) — Crea un nuevo nodo PI
- [DOMDocument::createTextNode](#domdocument.createtextnode) — Crea un nuevo nodo de texto
- [DOMDocument::getElementById](#domdocument.getelementbyid) — Busca un elemento con un cierto identificador
- [DOMDocument::getElementsByTagName](#domdocument.getelementsbytagname) — Busca todos los elementos con el nombre de etiqueta local dado
- [DOMDocument::getElementsByTagNameNS](#domdocument.getelementsbytagnamens) — Búsqueda de todos los elementos con un nombre de etiqueta dado en un espacio de nombres especificado
- [DOMDocument::importNode](#domdocument.importnode) — Importa un nodo dentro del documento actual
- [DOMDocument::load](#domdocument.load) — Cargar un documento XML de un archivo.
- [DOMDocument::loadHTML](#domdocument.loadhtml) — Carga HTML de un string
- [DOMDocument::loadHTMLFile](#domdocument.loadhtmlfile) — Carga HTML desde un fichero
- [DOMDocument::loadXML](#domdocument.loadxml) — Carga de XML desde una cadena de caracteres
- [DOMDocument::normalizeDocument](#domdocument.normalizedocument) — Normaliza el documento
- [DOMDocument::prepend](#domdocument.prepend) — Añade nodos antes del primer nodo hijo
- [DOMDocument::registerNodeClass](#domdocument.registernodeclass) — Registra la clase extendida utilizada para crear un tipo de nodo base
- [DOMDocument::relaxNGValidate](#domdocument.relaxngvalidate) — Realiza una validación relaxNG del documento
- [DOMDocument::relaxNGValidateSource](#domdocument.relaxngvalidatesource) — Realiza una validación relaxNG del documento
- [DOMDocument::replaceChildren](#domdocument.replacechildren) — Reemplaza los hijos en el documento
- [DOMDocument::save](#domdocument.save) — Copia el árbol XML interno a un archivo
- [DOMDocument::saveHTML](#domdocument.savehtml) — Copia el documento interno a una cadena usando el formato HTML
- [DOMDocument::saveHTMLFile](#domdocument.savehtmlfile) — Copia el documento interno a un fichero usando el formato HTML
- [DOMDocument::saveXML](#domdocument.savexml) — Guarda el árbol interno XML en una cadena de caracteres
- [DOMDocument::schemaValidate](#domdocument.schemavalidate) — Valida un documento basado en un esquema. Sólo se admite XML Schema 1.0.
- [DOMDocument::schemaValidateSource](#domdocument.schemavalidatesource) — Valida un documento basado en un esquema
- [DOMDocument::validate](#domdocument.validate) — Valida un documento basado en su DTD
- [DOMDocument::xinclude](#domdocument.xinclude) — Reemplaza los XIncludes en un objeto DOMDocument

# La clase DOMDocumentFragment

(PHP 5, PHP 7, PHP 8)

## Sinopsis de la Clase

     class **DOMDocumentFragment**



     extends
      [DOMNode](#class.domnode)



     implements
      [DOMParentNode](#class.domparentnode) {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [DOMNode::DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     ?[DOMElement](#class.domelement)
      [$firstElementChild](#domdocumentfragment.props.firstelementchild);

    public
     readonly
     ?[DOMElement](#class.domelement)
      [$lastElementChild](#domdocumentfragment.props.lastelementchild);

    public
     readonly
     [int](#language.types.integer)
      [$childElementCount](#domdocumentfragment.props.childelementcount);


    /* Propiedades heredadas */
    public
     readonly
     [string](#language.types.string)
      [$nodeName](#domnode.props.nodename);

public
?[string](#language.types.string)
[$nodeValue](#domnode.props.nodevalue);
public
readonly
[int](#language.types.integer)
[$nodeType](#domnode.props.nodetype);
public
readonly
?[DOMNode](#class.domnode)
[$parentNode](#domnode.props.parentnode);
public
readonly
?[DOMElement](#class.domelement)
[$parentElement](#domnode.props.parentelement);
public
readonly
[DOMNodeList](#class.domnodelist)
[$childNodes](#domnode.props.childnodes);
public
readonly
?[DOMNode](#class.domnode)
[$firstChild](#domnode.props.firstchild);
public
readonly
?[DOMNode](#class.domnode)
[$lastChild](#domnode.props.lastchild);
public
readonly
?[DOMNode](#class.domnode)
[$previousSibling](#domnode.props.previoussibling);
public
readonly
?[DOMNode](#class.domnode)
[$nextSibling](#domnode.props.nextsibling);
public
readonly
?[DOMNamedNodeMap](#class.domnamednodemap)
[$attributes](#domnode.props.attributes);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#domnode.props.isconnected);
public
readonly
?[DOMDocument](#class.domdocument)
[$ownerDocument](#domnode.props.ownerdocument);
public
readonly
?[string](#language.types.string)
[$namespaceURI](#domnode.props.namespaceuri);
public
[string](#language.types.string)
[$prefix](#domnode.props.prefix);
public
readonly
?[string](#language.types.string)
[$localName](#domnode.props.localname);
public
readonly
?[string](#language.types.string)
[$baseURI](#domnode.props.baseuri);
public
[string](#language.types.string)
[$textContent](#domnode.props.textcontent);

    /* Métodos */

public [\_\_construct](#domdocumentfragment.construct)()

    public [append](#domdocumentfragment.append)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

public [appendXML](#domdocumentfragment.appendxml)([string](#language.types.string) $data): [bool](#language.types.boolean)
public [prepend](#domdocumentfragment.prepend)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [replaceChildren](#domdocumentfragment.replacechildren)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

    /* Métodos heredados */
    public [DOMNode::appendChild](#domnode.appendchild)([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)

public [DOMNode::C14N](#domnode.c14n)(
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)
public [DOMNode::C14NFile](#domnode.c14nfile)(
    [string](#language.types.string) $uri,
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)
public [DOMNode::cloneNode](#domnode.clonenode)([bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::compareDocumentPosition](#domnode.comparedocumentposition)([DOMNode](#class.domnode) $other): [int](#language.types.integer)
public [DOMNode::contains](#domnode.contains)([DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null) $other): [bool](#language.types.boolean)
public [DOMNode::getLineNo](#domnode.getlineno)(): [int](#language.types.integer)
public [DOMNode::getNodePath](#domnode.getnodepath)(): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::getRootNode](#domnode.getrootnode)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [DOMNode](#class.domnode)
public [DOMNode::hasAttributes](#domnode.hasattributes)(): [bool](#language.types.boolean)
public [DOMNode::hasChildNodes](#domnode.haschildnodes)(): [bool](#language.types.boolean)
public [DOMNode::insertBefore](#domnode.insertbefore)([DOMNode](#class.domnode) $node, [?](#language.types.null)[DOMNode](#class.domnode) $child = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::isDefaultNamespace](#domnode.isdefaultnamespace)([string](#language.types.string) $namespaceURI): [bool](#language.types.boolean)
public [DOMNode::isEqualNode](#domnode.isequalnode)([?](#language.types.null)[DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSameNode](#domnode.issamenode)([DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSupported](#domnode.issupported)([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)
public [DOMNode::lookupNamespaceURI](#domnode.lookupnamespaceuri)([?](#language.types.null)[string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::lookupPrefix](#domnode.lookupprefix)([string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::normalize](#domnode.normalize)(): [void](language.types.void.html)
public [DOMNode::removeChild](#domnode.removechild)([DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::replaceChild](#domnode.replacechild)([DOMNode](#class.domnode) $node, [DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::\_\_sleep](#domnode.sleep)(): [array](#language.types.array)
public [DOMNode::\_\_wakeup](#domnode.wakeup)(): [void](language.types.void.html)

}

## Propiedades

     childElementCount

      El número de elementos hijos.





     firstElementChild

      Primer elemento hijo o **[null](#constant.null)**.





     lastElementChild

      Último elemento hijo o **[null](#constant.null)**.




## Historial de cambios

       Versión
       Descripción






       8.0.0

        Las propiedades firstElementChild, lastElementChild y
        childElementCount fueron añadidas.




       8.0.0

        **DOMDocumentFragment** ahora implementa
        [DOMParentNode](#class.domparentnode).





# DOMDocumentFragment::append

(PHP 8)

DOMDocumentFragment::append — Añade nodos después del último nodo hijo

### Descripción

public **DOMDocumentFragment::append**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade uno o varios nodes a la lista de hijos después del último nodo hijo.

### Parámetros

     nodes


       Los nodos a añadir.
       Las cadenas de caracteres se convierten automáticamente en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si este nodo es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin documento propietario funciona ahora.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMDocumentFragment::append()**

    Añade nodos en el fragmento.

&lt;?php
$doc = new DOMDocument;
$fragment = $doc-&gt;createDocumentFragment();
$fragment-&gt;appendChild($doc-&gt;createElement("hello"));

$fragment-&gt;append("beautiful", $doc-&gt;createElement("world"));

echo $doc-&gt;saveXML($fragment);
?&gt;

El ejemplo anterior mostrará:

&lt;hello/&gt;beautiful&lt;world/&gt;

### Ver también

- [DOMParentNode::append()](#domparentnode.append) - Añade nodos después del último nodo hijo

- [DOMDocumentFragment::prepend()](#domdocumentfragment.prepend) - Añade nodos antes del primer nodo hijo

# DOMDocumentFragment::appendXML

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

DOMDocumentFragment::appendXML — Añade información XML sin formato

### Descripción

public **DOMDocumentFragment::appendXML**([string](#language.types.string) $data): [bool](#language.types.boolean)

Añade información XML sin formato a un DOMDocumentFragment.

Este método no es parte del estándar DOM. Fue creado como enfoque
más sencillo para añadir un DocumentFragment de XML a un DOMDocument.

Si quiere mantener los estándares, tendrá que crear un
DOMDocument temporal con una raíz cualquiera y después ir a través de los nodos
hijo de la raíz de su información XML para añadirlos.

### Parámetros

     data


       XML a añadir.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Añadir información XML a su documento**

&lt;?php
$doc = new DOMDocument();
$doc-&gt;loadXML("&lt;root/&gt;");
$f = $doc-&gt;createDocumentFragment();
$f-&gt;appendXML("&lt;foo&gt;text&lt;/foo&gt;&lt;bar&gt;text2&lt;/bar&gt;");
$doc-&gt;documentElement-&gt;appendChild($f);
echo $doc-&gt;saveXML();
?&gt;

    El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;root&gt;&lt;foo&gt;text&lt;/foo&gt;&lt;bar&gt;text2&lt;/bar&gt;&lt;/root&gt;

# DOMDocumentFragment::\_\_construct

(PHP 5, PHP 7, PHP 8)

DOMDocumentFragment::\_\_construct — Construye un objeto [DOMDocumentFragment](#class.domdocumentfragment)

### Descripción

public **DOMDocumentFragment::\_\_construct**()

### Parámetros

Esta función no contiene ningún parámetro.

# DOMDocumentFragment::prepend

(PHP 8)

DOMDocumentFragment::prepend — Añade nodos antes del primer nodo hijo

### Descripción

public **DOMDocumentFragment::prepend**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade uno o varios nodes a la lista de hijos antes del primer nodo hijo.

### Parámetros

     nodes


       Los nodos a añadir.
       Las cadenas de caracteres se convierten automáticamente en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si este nodo es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin documento propietario funciona ahora.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMDocumentFragment::prepend()**

    Añade nodos antes del fragmento raíz.

&lt;?php
$doc = new DOMDocument;
$fragment = $doc-&gt;createDocumentFragment();
$fragment-&gt;appendChild($doc-&gt;createElement("world"));

$fragment-&gt;prepend($doc-&gt;createElement("hello"), "beautiful");

echo $doc-&gt;saveXML($fragment);
?&gt;

El ejemplo anterior mostrará:

&lt;hello/&gt;beautiful&lt;world/&gt;

### Ver también

- [DOMParentNode::prepend()](#domparentnode.prepend) - Añade nodos antes del primer nodo hijo

- [DOMDocumentFragment::append()](#domdocumentfragment.append) - Añade nodos después del último nodo hijo

# DOMDocumentFragment::replaceChildren

(PHP 8 &gt;= 8.3.0)

DOMDocumentFragment::replaceChildren — Reemplaza los hijos en el fragmento

### Descripción

public **DOMDocumentFragment::replaceChildren**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Reemplaza los hijos en el fragmento por nuevos nodes.

### Parámetros

     nodes


       Los nodos que reemplazan a los hijos.
       Las cadenas de caracteres se convierten automáticamente en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si este nodo es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin documento propietario funciona ahora.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMDocumentFragment::replaceChildren()**

    Reemplaza los hijos por nuevos nodos.

&lt;?php
$doc = new DOMDocument;
$doc-&gt;loadXML("&lt;container&gt;&lt;hello/&gt;&lt;/container&gt;");
$fragment = $doc-&gt;createDocumentFragment();
$fragment-&gt;append("hello");

$fragment-&gt;replaceChildren("beautiful", $doc-&gt;createElement("world"));

echo $doc-&gt;saveXML($fragment);
?&gt;

El ejemplo anterior mostrará:

beautiful
&lt;world/&gt;

### Ver también

- [DOMParentNode::replaceChildren()](#domparentnode.replacechildren) - Reemplaza los hijos en un nodo

- [DOMDocumentFragment::append()](#domdocumentfragment.append) - Añade nodos después del último nodo hijo

- [DOMDocumentFragment::prepend()](#domdocumentfragment.prepend) - Añade nodos antes del primer nodo hijo

## Tabla de contenidos

- [DOMDocumentFragment::append](#domdocumentfragment.append) — Añade nodos después del último nodo hijo
- [DOMDocumentFragment::appendXML](#domdocumentfragment.appendxml) — Añade información XML sin formato
- [DOMDocumentFragment::\_\_construct](#domdocumentfragment.construct) — Construye un objeto DOMDocumentFragment
- [DOMDocumentFragment::prepend](#domdocumentfragment.prepend) — Añade nodos antes del primer nodo hijo
- [DOMDocumentFragment::replaceChildren](#domdocumentfragment.replacechildren) — Reemplaza los hijos en el fragmento

# La clase DOMDocumentType

(PHP 5, PHP 7, PHP 8)

## Introducción

    Cada [DOMDocument](#class.domdocument) tiene un atributo doctype
    cuyo valor es o bien **[null](#constant.null)**, o bien un objeto **DOMDocumentType**.

## Sinopsis de la Clase

     class **DOMDocumentType**



     extends
      [DOMNode](#class.domnode)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [DOMNode::DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     [string](#language.types.string)
      [$name](#domdocumenttype.props.name);

    public
     readonly
     [DOMNamedNodeMap](#class.domnamednodemap)
      [$entities](#domdocumenttype.props.entities);

    public
     readonly
     [DOMNamedNodeMap](#class.domnamednodemap)
      [$notations](#domdocumenttype.props.notations);

    public
     readonly
     [string](#language.types.string)
      [$publicId](#domdocumenttype.props.publicid);

    public
     readonly
     [string](#language.types.string)
      [$systemId](#domdocumenttype.props.systemid);

    public
     readonly
     ?[string](#language.types.string)
      [$internalSubset](#domdocumenttype.props.internalsubset);


    /* Propiedades heredadas */
    public
     readonly
     [string](#language.types.string)
      [$nodeName](#domnode.props.nodename);

public
?[string](#language.types.string)
[$nodeValue](#domnode.props.nodevalue);
public
readonly
[int](#language.types.integer)
[$nodeType](#domnode.props.nodetype);
public
readonly
?[DOMNode](#class.domnode)
[$parentNode](#domnode.props.parentnode);
public
readonly
?[DOMElement](#class.domelement)
[$parentElement](#domnode.props.parentelement);
public
readonly
[DOMNodeList](#class.domnodelist)
[$childNodes](#domnode.props.childnodes);
public
readonly
?[DOMNode](#class.domnode)
[$firstChild](#domnode.props.firstchild);
public
readonly
?[DOMNode](#class.domnode)
[$lastChild](#domnode.props.lastchild);
public
readonly
?[DOMNode](#class.domnode)
[$previousSibling](#domnode.props.previoussibling);
public
readonly
?[DOMNode](#class.domnode)
[$nextSibling](#domnode.props.nextsibling);
public
readonly
?[DOMNamedNodeMap](#class.domnamednodemap)
[$attributes](#domnode.props.attributes);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#domnode.props.isconnected);
public
readonly
?[DOMDocument](#class.domdocument)
[$ownerDocument](#domnode.props.ownerdocument);
public
readonly
?[string](#language.types.string)
[$namespaceURI](#domnode.props.namespaceuri);
public
[string](#language.types.string)
[$prefix](#domnode.props.prefix);
public
readonly
?[string](#language.types.string)
[$localName](#domnode.props.localname);
public
readonly
?[string](#language.types.string)
[$baseURI](#domnode.props.baseuri);
public
[string](#language.types.string)
[$textContent](#domnode.props.textcontent);

    /* Métodos heredados */

public [DOMNode::appendChild](#domnode.appendchild)([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::C14N](#domnode.c14n)(
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)
public [DOMNode::C14NFile](#domnode.c14nfile)(
    [string](#language.types.string) $uri,
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)
public [DOMNode::cloneNode](#domnode.clonenode)([bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::compareDocumentPosition](#domnode.comparedocumentposition)([DOMNode](#class.domnode) $other): [int](#language.types.integer)
public [DOMNode::contains](#domnode.contains)([DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null) $other): [bool](#language.types.boolean)
public [DOMNode::getLineNo](#domnode.getlineno)(): [int](#language.types.integer)
public [DOMNode::getNodePath](#domnode.getnodepath)(): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::getRootNode](#domnode.getrootnode)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [DOMNode](#class.domnode)
public [DOMNode::hasAttributes](#domnode.hasattributes)(): [bool](#language.types.boolean)
public [DOMNode::hasChildNodes](#domnode.haschildnodes)(): [bool](#language.types.boolean)
public [DOMNode::insertBefore](#domnode.insertbefore)([DOMNode](#class.domnode) $node, [?](#language.types.null)[DOMNode](#class.domnode) $child = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::isDefaultNamespace](#domnode.isdefaultnamespace)([string](#language.types.string) $namespaceURI): [bool](#language.types.boolean)
public [DOMNode::isEqualNode](#domnode.isequalnode)([?](#language.types.null)[DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSameNode](#domnode.issamenode)([DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSupported](#domnode.issupported)([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)
public [DOMNode::lookupNamespaceURI](#domnode.lookupnamespaceuri)([?](#language.types.null)[string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::lookupPrefix](#domnode.lookupprefix)([string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::normalize](#domnode.normalize)(): [void](language.types.void.html)
public [DOMNode::removeChild](#domnode.removechild)([DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::replaceChild](#domnode.replacechild)([DOMNode](#class.domnode) $node, [DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::\_\_sleep](#domnode.sleep)(): [array](#language.types.array)
public [DOMNode::\_\_wakeup](#domnode.wakeup)(): [void](language.types.void.html)

}

## Propiedades

     publicId

      El identificador público del subset externo.





     systemId


       El identificador de sistema del subset externo. Puede ser una
       URI absoluta o no.






     name


       El nombre de la DTD; es decir, el nombre que sigue
       inmediatamente a la palabra clave DOCTYPE.






     entities


       Un [DOMNamedNodeMap](#class.domnamednodemap) que contiene las entidades
       generales, tanto externas como internas, declaradas en la DTD.






     notations


       Un [DOMNamedNodeMap](#class.domnamednodemap) que contiene las notaciones,
       declaradas en la DTD.






     internalSubset


       El subset interno, en forma de [string](#language.types.string), o **[null](#constant.null)** si no existe. Esta cadena
       no contiene los corchetes delimitadores.





# La clase DOMElement

(PHP 5, PHP 7, PHP 8)

## Sinopsis de la Clase

     class **DOMElement**



     extends
      [DOMNode](#class.domnode)



     implements
      [DOMParentNode](#class.domparentnode),

     [DOMChildNode](#class.domchildnode) {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [DOMNode::DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     [string](#language.types.string)
      [$tagName](#domelement.props.tagname);

    public
     [string](#language.types.string)
      [$className](#domelement.props.classname);

    public
     [string](#language.types.string)
      [$id](#domelement.props.id);

    public
     readonly
     [mixed](#language.types.mixed)
      [$schemaTypeInfo](#domelement.props.schematypeinfo) = null;

    public
     readonly
     ?[DOMElement](#class.domelement)
      [$firstElementChild](#domelement.props.firstelementchild);

    public
     readonly
     ?[DOMElement](#class.domelement)
      [$lastElementChild](#domelement.props.lastelementchild);

    public
     readonly
     [int](#language.types.integer)
      [$childElementCount](#domelement.props.childelementcount);

    public
     readonly
     ?[DOMElement](#class.domelement)
      [$previousElementSibling](#domelement.props.previouselementsibling);

    public
     readonly
     ?[DOMElement](#class.domelement)
      [$nextElementSibling](#domelement.props.nextelementsibling);


    /* Propiedades heredadas */
    public
     readonly
     [string](#language.types.string)
      [$nodeName](#domnode.props.nodename);

public
?[string](#language.types.string)
[$nodeValue](#domnode.props.nodevalue);
public
readonly
[int](#language.types.integer)
[$nodeType](#domnode.props.nodetype);
public
readonly
?[DOMNode](#class.domnode)
[$parentNode](#domnode.props.parentnode);
public
readonly
?[DOMElement](#class.domelement)
[$parentElement](#domnode.props.parentelement);
public
readonly
[DOMNodeList](#class.domnodelist)
[$childNodes](#domnode.props.childnodes);
public
readonly
?[DOMNode](#class.domnode)
[$firstChild](#domnode.props.firstchild);
public
readonly
?[DOMNode](#class.domnode)
[$lastChild](#domnode.props.lastchild);
public
readonly
?[DOMNode](#class.domnode)
[$previousSibling](#domnode.props.previoussibling);
public
readonly
?[DOMNode](#class.domnode)
[$nextSibling](#domnode.props.nextsibling);
public
readonly
?[DOMNamedNodeMap](#class.domnamednodemap)
[$attributes](#domnode.props.attributes);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#domnode.props.isconnected);
public
readonly
?[DOMDocument](#class.domdocument)
[$ownerDocument](#domnode.props.ownerdocument);
public
readonly
?[string](#language.types.string)
[$namespaceURI](#domnode.props.namespaceuri);
public
[string](#language.types.string)
[$prefix](#domnode.props.prefix);
public
readonly
?[string](#language.types.string)
[$localName](#domnode.props.localname);
public
readonly
?[string](#language.types.string)
[$baseURI](#domnode.props.baseuri);
public
[string](#language.types.string)
[$textContent](#domnode.props.textcontent);

    /* Métodos */

public [\_\_construct](#domelement.construct)([string](#language.types.string) $qualifiedName, [?](#language.types.null)[string](#language.types.string) $value = **[null](#constant.null)**, [string](#language.types.string) $namespace = "")

    public [after](#domelement.after)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

public [append](#domelement.append)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [before](#domelement.before)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [getAttribute](#domelement.getattribute)([string](#language.types.string) $qualifiedName): [string](#language.types.string)
public [getAttributeNames](#domelement.getattributenames)(): [array](#language.types.array)
public [getAttributeNode](#domelement.getattributenode)([string](#language.types.string) $qualifiedName): [DOMAttr](#class.domattr)|[DOMNameSpaceNode](#class.domnamespacenode)|[false](#language.types.singleton)
public [getAttributeNodeNS](#domelement.getattributenodens)([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $localName): [DOMAttr](#class.domattr)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null)
public [getAttributeNS](#domelement.getattributens)([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $localName): [string](#language.types.string)
public [getElementsByTagName](#domelement.getelementsbytagname)([string](#language.types.string) $qualifiedName): [DOMNodeList](#class.domnodelist)
public [getElementsByTagNameNS](#domelement.getelementsbytagnamens)([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $localName): [DOMNodeList](#class.domnodelist)
public [hasAttribute](#domelement.hasattribute)([string](#language.types.string) $qualifiedName): [bool](#language.types.boolean)
public [hasAttributeNS](#domelement.hasattributens)([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $localName): [bool](#language.types.boolean)
public [insertAdjacentElement](#domelement.insertadjacentelement)([string](#language.types.string) $where, [DOMElement](#class.domelement) $element): [?](#language.types.null)[DOMElement](#class.domelement)
public [insertAdjacentText](#domelement.insertadjacenttext)([string](#language.types.string) $where, [string](#language.types.string) $data): [void](language.types.void.html)
public [prepend](#domelement.prepend)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [remove](#domelement.remove)(): [void](language.types.void.html)
public [removeAttribute](#domelement.removeattribute)([string](#language.types.string) $qualifiedName): [bool](#language.types.boolean)
public [removeAttributeNode](#domelement.removeattributenode)([DOMAttr](#class.domattr) $attr): [DOMAttr](#class.domattr)|[false](#language.types.singleton)
public [removeAttributeNS](#domelement.removeattributens)([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $localName): [void](language.types.void.html)
public [replaceChildren](#domelement.replacechildren)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [replaceWith](#domelement.replacewith)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [setAttribute](#domelement.setattribute)([string](#language.types.string) $qualifiedName, [string](#language.types.string) $value): [DOMAttr](#class.domattr)|[bool](#language.types.boolean)
public [setAttributeNode](#domelement.setattributenode)([DOMAttr](#class.domattr) $attr): [DOMAttr](#class.domattr)|[null](#language.types.null)|[false](#language.types.singleton)
public [setAttributeNodeNS](#domelement.setattributenodens)([DOMAttr](#class.domattr) $attr): [DOMAttr](#class.domattr)|[null](#language.types.null)|[false](#language.types.singleton)
public [setAttributeNS](#domelement.setattributens)([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $qualifiedName, [string](#language.types.string) $value): [void](language.types.void.html)
public [setIdAttribute](#domelement.setidattribute)([string](#language.types.string) $qualifiedName, [bool](#language.types.boolean) $isId): [void](language.types.void.html)
public [setIdAttributeNode](#domelement.setidattributenode)([DOMAttr](#class.domattr) $attr, [bool](#language.types.boolean) $isId): [void](language.types.void.html)
public [setIdAttributeNS](#domelement.setidattributens)([string](#language.types.string) $namespace, [string](#language.types.string) $qualifiedName, [bool](#language.types.boolean) $isId): [void](language.types.void.html)
public [toggleAttribute](#domelement.toggleattribute)([string](#language.types.string) $qualifiedName, [?](#language.types.null)[bool](#language.types.boolean) $force = **[null](#constant.null)**): [bool](#language.types.boolean)

    /* Métodos heredados */
    public [DOMNode::appendChild](#domnode.appendchild)([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)

public [DOMNode::C14N](#domnode.c14n)(
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)
public [DOMNode::C14NFile](#domnode.c14nfile)(
    [string](#language.types.string) $uri,
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)
public [DOMNode::cloneNode](#domnode.clonenode)([bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::compareDocumentPosition](#domnode.comparedocumentposition)([DOMNode](#class.domnode) $other): [int](#language.types.integer)
public [DOMNode::contains](#domnode.contains)([DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null) $other): [bool](#language.types.boolean)
public [DOMNode::getLineNo](#domnode.getlineno)(): [int](#language.types.integer)
public [DOMNode::getNodePath](#domnode.getnodepath)(): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::getRootNode](#domnode.getrootnode)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [DOMNode](#class.domnode)
public [DOMNode::hasAttributes](#domnode.hasattributes)(): [bool](#language.types.boolean)
public [DOMNode::hasChildNodes](#domnode.haschildnodes)(): [bool](#language.types.boolean)
public [DOMNode::insertBefore](#domnode.insertbefore)([DOMNode](#class.domnode) $node, [?](#language.types.null)[DOMNode](#class.domnode) $child = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::isDefaultNamespace](#domnode.isdefaultnamespace)([string](#language.types.string) $namespaceURI): [bool](#language.types.boolean)
public [DOMNode::isEqualNode](#domnode.isequalnode)([?](#language.types.null)[DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSameNode](#domnode.issamenode)([DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSupported](#domnode.issupported)([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)
public [DOMNode::lookupNamespaceURI](#domnode.lookupnamespaceuri)([?](#language.types.null)[string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::lookupPrefix](#domnode.lookupprefix)([string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::normalize](#domnode.normalize)(): [void](language.types.void.html)
public [DOMNode::removeChild](#domnode.removechild)([DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::replaceChild](#domnode.replacechild)([DOMNode](#class.domnode) $node, [DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::\_\_sleep](#domnode.sleep)(): [array](#language.types.array)
public [DOMNode::\_\_wakeup](#domnode.wakeup)(): [void](language.types.void.html)

}

## Propiedades

     childElementCount

      El número de elementos hijos.





     firstElementChild

      Primer elemento hijo o **[null](#constant.null)**.





     lastElementChild

      Último elemento hijo o **[null](#constant.null)**.





     nextElementSibling

      El elemento hermano siguiente o **[null](#constant.null)**.





     previousElementSibling

      El elemento hermano anterior o **[null](#constant.null)**.





     schemaTypeInfo

      Todavía no implementado, siempre devuelve **[null](#constant.null)**





     tagName

      El nombre del elemento





     className

      Una cadena que representa las clases del elemento, separadas por espacios.





     id

      Refleja el ID del elemento a través del atributo "id".




## Historial de cambios

       Versión
       Descripción






       8.3.0

         Las propiedades className y id y
         los métodos [DOMElement::getAttributeNames()](#domelement.getattributenames),
         [DOMElement::insertAdjacentElement()](#domelement.insertadjacentelement),
         [DOMElement::insertAdjacentText()](#domelement.insertadjacenttext) y
         [DOMElement::toggleAttribute()](#domelement.toggleattribute) han sido añadidos.




       8.0.0

        Las propiedades firstElementChild, lastElementChild,
        childElementCount, previousElementSibling
        y nextElementSibling fueron añadidas.




       8.0.0

        **DOMElement** ahora implementa
        [DOMParentNode](#class.domparentnode) y
        [DOMChildNode](#class.domchildnode).





## Notas

**Nota**:

La extensión DOM utiliza el codificado UTF-8. Utilice [mb_convert_encoding()](#function.mb-convert-encoding),
[UConverter::transcode()](#uconverter.transcode), o [iconv()](#function.iconv) para manipular otros codificados.

# DOMElement::after

(PHP 8)

DOMElement::after — Añade nodos después del elemento

### Descripción

public **DOMElement::after**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade los nodes pasados después del elemento.

### Parámetros

     nodes


       Nodos a añadir después del nodo.
       Las cadenas de caracteres son automáticamente convertidas en nodos textuales.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si el padre es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin padre es ahora sin efecto para alinear el comportamiento con la especificación del DOM.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

      8.3.0

       Llamar a este método en un nodo sin documento propietario funciona ahora.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMElement::after()**

    Añade los nodos después del elemento hello.

&lt;?php
$doc = new DOMDocument;
$doc-&gt;loadXML("&lt;hello/&gt;");
$container = $doc-&gt;documentElement;

$container-&gt;after("beautiful", $doc-&gt;createElement("world"));

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;hello/&gt;
beautiful
&lt;world/&gt;

### Ver también

- [DOMChildNode::after()](#domchildnode.after) - Añade nodos después del nodo

- [DOMElement::before()](#domelement.before) - Añade nodos antes del elemento

# DOMElement::append

(PHP 8)

DOMElement::append — Añade nodos después del último hijo

### Descripción

public **DOMElement::append**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade uno o varios nodes a la lista de hijos después del último nodo hijo.

### Parámetros

     nodes


       Los nodos a añadir.
       Las cadenas de caracteres se convierten automáticamente en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si este nodo es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin documento propietario funciona ahora.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMElement::append()**

    Añade nodos en el elemento contenedor.

&lt;?php
$doc = new DOMDocument;
$doc-&gt;loadXML("&lt;container&gt;hello &lt;/container&gt;");
$world = $doc-&gt;documentElement;

$world-&gt;append("beautiful", $doc-&gt;createElement("world"));

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;container&gt;hello beautiful&lt;world/&gt;&lt;/container&gt;

### Ver también

- [DOMParentNode::append()](#domparentnode.append) - Añade nodos después del último nodo hijo

- [DOMElement::prepend()](#domelement.prepend) - Añade nodos antes del primer hijo

# DOMElement::before

(PHP 8)

DOMElement::before — Añade nodos antes del elemento

### Descripción

public **DOMElement::before**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade los nodes pasados antes del elemento.

### Parámetros

     nodes


       Nodos a añadir antes del nodo.
       Las cadenas de caracteres son automáticamente convertidas en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si el padre es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin padre es ahora sin efecto para alinear el comportamiento con la especificación del DOM.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMElement::before()**

    Añade los nodos antes del elemento hello.

&lt;?php
$doc = new DOMDocument;
$doc-&gt;loadXML("&lt;world/&gt;");
$world = $doc-&gt;documentElement;

$world-&gt;before("hello", $doc-&gt;createElement("beautiful"));

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

hello
&lt;beautiful/&gt;
&lt;world/&gt;

### Ver también

- [DOMChildNode::before()](#domchildnode.before) - Añade nodos antes del nodo

- [DOMElement::after()](#domelement.after) - Añade nodos después del elemento

# DOMElement::\_\_construct

(PHP 5, PHP 7, PHP 8)

DOMElement::\_\_construct —
Crea un nuevo objeto DOMElement

### Descripción

public **DOMElement::\_\_construct**([string](#language.types.string) $qualifiedName, [?](#language.types.null)[string](#language.types.string) $value = **[null](#constant.null)**, [string](#language.types.string) $namespace = "")

Crea un nuevo objeto [DOMElement](#class.domelement). Este objeto es de sólo lectura.
Puede ser añadido a un documento, pero no se pueden añadir nodos adicionales a este nodo hasta que
el nodo esté asociado con un documento. Para crear un nodo modificable, use
[DOMDocument::createElement](#domdocument.createelement) o
[DOMDocument::createElementNS](#domdocument.createelementns).

### Parámetros

     qualifiedName


       El nombre de la etiqueta del elemento. Cuando también se pasa en namespaceURI, el nombre del
       elemento puede tomar un prefijo para asociarlo con la URI.






     value


       El valor del elemento.






     namespace


       Una URI del espacio de nombres para crear el elemento dentro de un espacio de nombres especificado.





### Ejemplos

    **Ejemplo #1 Crear un nuevo objeto DOMElement**

&lt;?php

$dom = new DOMDocument('1.0', 'iso-8859-1');
$element = $dom-&gt;appendChild(new DOMElement('root'));
$element_ns = new DOMElement('pr:node1', 'thisvalue', 'http://xyz');
$element-&gt;appendChild($element_ns);
echo $dom-&gt;saveXML(); /_ &lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;root&gt;&lt;pr:node1 xmlns:pr="http://xyz"&gt;thisvalue&lt;/pr:node1&gt;&lt;/root&gt; _/

?&gt;

### Ver también

    - [DOMDocument::createElement()](#domdocument.createelement) - Crea un nuevo nodo elemento

    - [DOMDocument::createElementNS()](#domdocument.createelementns) - Crea un nuevo nodo elemento con el nombre de espacio asociado

# DOMElement::getAttribute

(PHP 5, PHP 7, PHP 8)

DOMElement::getAttribute — Devuelve el valor de un atributo

### Descripción

public **DOMElement::getAttribute**([string](#language.types.string) $qualifiedName): [string](#language.types.string)

Obtiene el valor del atributo de nombre qualifiedName
para el nodo actual.

### Parámetros

     qualifiedName


       El nombre del atributo.





### Valores devueltos

El valor del atributo, o una cadena vacía si no se encuentra un atributo con
el nombre dado por qualifiedName.

### Ver también

    - [DOMElement::hasAttribute()](#domelement.hasattribute) - Comprueba si existe un atributo

    - [DOMElement::setAttribute()](#domelement.setattribute) - Añade un nuevo atributo o modifica uno existente

    - [DOMElement::removeAttribute()](#domelement.removeattribute) - Elimina un atributo

# DOMElement::getAttributeNames

(PHP 8 &gt;= 8.3.0)

DOMElement::getAttributeNames — Devuelve los nombres de los atributos

### Descripción

public **DOMElement::getAttributeNames**(): [array](#language.types.array)

Obtener los nombres de los atributos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve los nombres de los atributos.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMElement::getAttributeNames()**

&lt;?php

$dom = new DOMDocument();
$dom-&gt;loadXML('&lt;html xmlns:some="some:ns" some:test="a" test2="b"/&gt;');
var_dump($dom-&gt;documentElement-&gt;getAttributeNames());
?&gt;

El ejemplo anterior mostrará:

array(3) {
[0]=&gt;
string(10) "xmlns:some"
[1]=&gt;
string(9) "some:test"
[2]=&gt;
string(5) "test2"
}

# DOMElement::getAttributeNode

(PHP 5, PHP 7, PHP 8)

DOMElement::getAttributeNode — Devuelve el nodo de un atributo

### Descripción

public **DOMElement::getAttributeNode**([string](#language.types.string) $qualifiedName): [DOMAttr](#class.domattr)|[DOMNameSpaceNode](#class.domnamespacenode)|[false](#language.types.singleton)

Devuelve el nodo del atributo con nombre qualifiedName para el
elemento actual.

### Parámetros

     qualifiedName


       El nombre del atributo.





### Valores devueltos

El nodo de atributos. Observe que para los atributos de las declaraciones
del espacio de nombres XML (xmlns y xmlns:\*) una
instancia de [DOMNameSpaceNode](#class.domnamespacenode) es devuelta en vez de una instancia de
[DOMAttr](#class.domattr).

### Ver también

    - [DOMElement::hasAttribute()](#domelement.hasattribute) - Comprueba si existe un atributo

    - [DOMElement::setAttributeNode()](#domelement.setattributenode) - Añade un nuevo atributo al elemento

    - [DOMElement::removeAttributeNode()](#domelement.removeattributenode) - Elimina un atributo

# DOMElement::getAttributeNodeNS

(PHP 5, PHP 7, PHP 8)

DOMElement::getAttributeNodeNS —
Devuelve el nodo de un atributo

### Descripción

public **DOMElement::getAttributeNodeNS**([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $localName): [DOMAttr](#class.domattr)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null)

Devuelve el nodo del atributo en el espacio de nombres namespace
con el nombre local localName para el nodo actual.

### Parámetros

     namespace


       La URI del espacio de nombres.






     localName


       El nombre local.





### Valores devueltos

El nodo de atributos. Observe que para los atributos de las declaraciones
del espacio de nombres XML (xmlns y xmlns:\*) una
instancia de [DOMNameSpaceNode](#class.domnamespacenode) es devuelta en vez de una instancia de
[DOMAttr](#class.domattr).

### Ver también

    - [DOMElement::hasAttributeNS()](#domelement.hasattributens) - Comprueba si un atributo existe

    - [DOMElement::setAttributeNodeNS()](#domelement.setattributenodens) - Añade un nuevo atributo al elemento

    - [DOMElement::removeAttributeNode()](#domelement.removeattributenode) - Elimina un atributo

# DOMElement::getAttributeNS

(PHP 5, PHP 7, PHP 8)

DOMElement::getAttributeNS — Devuelve el valor de un atributo

### Descripción

public **DOMElement::getAttributeNS**([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $localName): [string](#language.types.string)

Obtiene el valor del atributo en el espacio de nombres namespace
con el nombre local localName para el nodo actual.

### Parámetros

     namespace


       La URI del espacio de nombres.






     localName


       El nombre local.





### Valores devueltos

El valor del atributo, o una cadena vacía si no se ecuentra el atributo con los
localName y namespace
dados.

### Ver también

    - [DOMElement::hasAttributeNS()](#domelement.hasattributens) - Comprueba si un atributo existe

    - [DOMElement::setAttributeNS()](#domelement.setattributens) - Añade un nuevo atributo

    - [DOMElement::removeAttributeNS()](#domelement.removeattributens) - Elimina un atributo

# DOMElement::getElementsByTagName

(PHP 5, PHP 7, PHP 8)

DOMElement::getElementsByTagName — Obtiene los elementos por nombre de etiqueta

### Descripción

public **DOMElement::getElementsByTagName**([string](#language.types.string) $qualifiedName): [DOMNodeList](#class.domnodelist)

Esta función devuelve una nueva instancia de la clase
[DOMNodeList](#class.domnodelist) con todos los elementos descendientes con un nombre de etiqueta
dado por qualifiedName, en el orden en que fueron
encontrados en un recorrido preorden de este elemento árbol.

### Parámetros

     qualifiedName


       El nombre de la etiqueta. Use * para devolver todos los elementos dentro
       del elemento árbol.





### Valores devueltos

Esta función devuelve una nueva instancia de la clase
[DOMNodeList](#class.domnodelist) con todos los elementos coincidentes.

### Ver también

    - [DOMElement::getElementsByTagNameNS()](#domelement.getelementsbytagnamens) - Recupera los elementos por su espacio de nombres y su localName

# DOMElement::getElementsByTagNameNS

(PHP 5, PHP 7, PHP 8)

DOMElement::getElementsByTagNameNS — Recupera los elementos por su espacio de nombres y su localName

### Descripción

public **DOMElement::getElementsByTagNameNS**([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $localName): [DOMNodeList](#class.domnodelist)

Esta función recupera todos los elementos descendientes con un nombre local
localName y un espacio de nombres
namespace dados.

### Parámetros

     namespace


       La URI del espacio de nombres de los elementos a buscar.
       El valor especial "*" representa todos los espacios de nombres.
       Pasar **[null](#constant.null)** representa el espacio de nombres vacío.






     localName


       El nombre local de los elementos a buscar.
       El valor especial "*" representa todos los nombres locales.





### Valores devueltos

Esta función devuelve un nuevo objeto de la clase
[DOMNodeList](#class.domnodelist) que contiene todos los elementos correspondientes
en el orden en que se encuentran durante el recorrido del árbol de este
elemento.

### Historial de cambios

      Versión
      Descripción






      8.0.3

       namespace es ahora nullable.



### Ver también

    - **DOMElement::getElementsByTagNameNS()**

# DOMElement::hasAttribute

(PHP 5, PHP 7, PHP 8)

DOMElement::hasAttribute — Comprueba si existe un atributo

### Descripción

public **DOMElement::hasAttribute**([string](#language.types.string) $qualifiedName): [bool](#language.types.boolean)

Indica si un atributo llamado qualifiedName
existe como miembro del elemento.

### Parámetros

     qualifiedName


       El nombre del atributo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [DOMElement::hasAttributeNS()](#domelement.hasattributens) - Comprueba si un atributo existe

    - [DOMElement::getAttribute()](#domelement.getattribute) - Devuelve el valor de un atributo

    - [DOMElement::setAttribute()](#domelement.setattribute) - Añade un nuevo atributo o modifica uno existente

    - [DOMElement::removeAttribute()](#domelement.removeattribute) - Elimina un atributo

# DOMElement::hasAttributeNS

(PHP 5, PHP 7, PHP 8)

DOMElement::hasAttributeNS —
Comprueba si un atributo existe

### Descripción

public **DOMElement::hasAttributeNS**([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $localName): [bool](#language.types.boolean)

Indica si un atributo en el espacio de nombres namespace
llamado localName existe como miembro del elemento.

### Parámetros

     namespace


       La URI del espacio de nombres.






     localName


       El nombre local.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [DOMElement::hasAttribute()](#domelement.hasattribute) - Comprueba si existe un atributo

    - [DOMElement::getAttributeNS()](#domelement.getattributens) - Devuelve el valor de un atributo

    - [DOMElement::setAttributeNS()](#domelement.setattributens) - Añade un nuevo atributo

    - [DOMElement::removeAttributeNS()](#domelement.removeattributens) - Elimina un atributo

# DOMElement::insertAdjacentElement

(PHP 8 &gt;= 8.3.0)

DOMElement::insertAdjacentElement — Inserta un elemento adyacente

### Descripción

public **DOMElement::insertAdjacentElement**([string](#language.types.string) $where, [DOMElement](#class.domelement) $element): [?](#language.types.null)[DOMElement](#class.domelement)

Inserta un elemento en una posición relativa dada por where.

### Parámetros

     where





        - beforebegin - Inserta antes del elemento objetivo.

        - afterbegin - Inserta como primer hijo del elemento objetivo.

        - beforeend - Inserta como último hijo del elemento objetivo.

        - afterend - Inserta después del elemento objetivo.






     element


       El elemento a insertar.





### Valores devueltos

Devuelve [DOMElement](#class.domelement) o **[null](#constant.null)** en caso de fallo.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMElement::insertAdjacentElement()**

&lt;?php

$dom = new DOMDocument();
$dom-&gt;loadXML('&lt;?xml version="1.0"?&gt;&lt;container&gt;&lt;p&gt;foo&lt;/p&gt;&lt;/container&gt;');
$container = $dom-&gt;documentElement;
$p = $container-&gt;firstElementChild;

$p-&gt;insertAdjacentElement('beforebegin', $dom-&gt;createElement('A'));
echo $dom-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;container&gt;&lt;A/&gt;&lt;p&gt;foo&lt;/p&gt;&lt;/container&gt;

### Ver también

    - [DOMElement::insertAdjacentText()](#domelement.insertadjacenttext) - Inserta un texto adyacente

# DOMElement::insertAdjacentText

(PHP 8 &gt;= 8.3.0)

DOMElement::insertAdjacentText — Inserta un texto adyacente

### Descripción

public **DOMElement::insertAdjacentText**([string](#language.types.string) $where, [string](#language.types.string) $data): [void](language.types.void.html)

Inserta un texto en una posición relativa dada por where.

### Parámetros

     where





        - beforebegin - Inserta antes del elemento objetivo.

        - afterbegin - Inserta como primer hijo del elemento objetivo.

        - beforeend - Inserta como último hijo del elemento objetivo.

        - afterend - Inserta después del elemento objetivo.






     data


       El string a insertar.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMElement::insertAdjacentText()**

&lt;?php

$dom = new DOMDocument();
$dom-&gt;loadXML('&lt;?xml version="1.0"?&gt;&lt;container&gt;&lt;p&gt;H&lt;/p&gt;&lt;/container&gt;');

$container = $dom-&gt;documentElement;
$p = $container-&gt;firstElementChild;

$p-&gt;insertAdjacentText("afterbegin", "P");
$p-&gt;insertAdjacentText("beforeend", "P");

echo $dom-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;container&gt;&lt;p&gt;PHP&lt;/p&gt;&lt;/container&gt;

### Ver también

    - [DOMElement::insertAdjacentElement()](#domelement.insertadjacentelement) - Inserta un elemento adyacente

# DOMElement::prepend

(PHP 8)

DOMElement::prepend — Añade nodos antes del primer hijo

### Descripción

public **DOMElement::prepend**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade uno o varios nodes a la lista de hijos antes del primer nodo hijo.

### Parámetros

     nodes


       Los nodos a añadir.
       Las cadenas de caracteres se convierten automáticamente en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si este nodo es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin documento propietario funciona ahora.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMElement::prepend()**

    Añade los nodos antes del elemento contenedor.

&lt;?php
$doc = new DOMDocument;
$doc-&gt;loadXML("&lt;container&gt; world&lt;/container&gt;");
$world = $doc-&gt;documentElement;

$world-&gt;prepend($doc-&gt;createElement("hello"), "beautiful");

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;container&gt;&lt;hello/&gt;beautiful world&lt;/container&gt;

### Ver también

- [DOMParentNode::prepend()](#domparentnode.prepend) - Añade nodos antes del primer nodo hijo

- [DOMElement::append()](#domelement.append) - Añade nodos después del último hijo

# DOMElement::remove

(PHP 8)

DOMElement::remove — Elimina el elemento

### Descripción

public **DOMElement::remove**(): [void](language.types.void.html)

Elimina el elemento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMElement::remove()**

    Elimina el elemento.

&lt;?php
$doc = new DOMDocument;
$doc-&gt;loadXML("&lt;container&gt;&lt;hello/&gt;&lt;world/&gt;&lt;/container&gt;");
$hello = $doc-&gt;documentElement-&gt;firstChild;

$hello-&gt;remove();

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;container&gt;&lt;world/&gt;&lt;/container&gt;

### Ver también

- [DOMElement::after()](#domelement.after) - Añade nodos después del elemento

- [DOMElement::before()](#domelement.before) - Añade nodos antes del elemento

- [DOMElement::replaceWith()](#domelement.replacewith) - Reemplaza el elemento por nuevos nodos

- [DOMNode::removeChild()](#domnode.removechild) - Elimina un hijo de la lista de hijos

# DOMElement::removeAttribute

(PHP 5, PHP 7, PHP 8)

DOMElement::removeAttribute — Elimina un atributo

### Descripción

public **DOMElement::removeAttribute**([string](#language.types.string) $qualifiedName): [bool](#language.types.boolean)

Elimina el atributo llamado qualifiedName del elemento.

### Parámetros

     qualifiedName


       El nombre del atributo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

     **[DOM_NO_MODIFICATION_ALLOWED_ERR](#constant.dom-no-modification-allowed-err)**


       Lanzado si el nodo es de sólo lectura.





### Ver también

    - [DOMElement::hasAttribute()](#domelement.hasattribute) - Comprueba si existe un atributo

    - [DOMElement::getAttribute()](#domelement.getattribute) - Devuelve el valor de un atributo

    - [DOMElement::setAttribute()](#domelement.setattribute) - Añade un nuevo atributo o modifica uno existente

# DOMElement::removeAttributeNode

(PHP 5, PHP 7, PHP 8)

DOMElement::removeAttributeNode — Elimina un atributo

### Descripción

public **DOMElement::removeAttributeNode**([DOMAttr](#class.domattr) $attr): [DOMAttr](#class.domattr)|[false](#language.types.singleton)

Elimina el atributo attr del elemento.

### Parámetros

     attr


       El nodo atributo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

     **[DOM_NO_MODIFICATION_ALLOWED_ERR](#constant.dom-no-modification-allowed-err)**


       Lanzado si el nodo es de sólo lectura.






     **[DOM_NOT_FOUND_ERR](#constant.dom-not-found-err)**


       Lanzado si attr no es un atributo del elemento.





### Ver también

    - [DOMElement::hasAttribute()](#domelement.hasattribute) - Comprueba si existe un atributo

    - [DOMElement::getAttributeNode()](#domelement.getattributenode) - Devuelve el nodo de un atributo

    - [DOMElement::setAttributeNode()](#domelement.setattributenode) - Añade un nuevo atributo al elemento

# DOMElement::removeAttributeNS

(PHP 5, PHP 7, PHP 8)

DOMElement::removeAttributeNS — Elimina un atributo

### Descripción

public **DOMElement::removeAttributeNS**([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $localName): [void](language.types.void.html)

Elimina el atributo localName en el espacio de nombre namespace de el elemento.

### Parámetros

     namespace


       La URI del espacio de nombres.






     localName


       El nombre local.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

     **[DOM_NO_MODIFICATION_ALLOWED_ERR](#constant.dom-no-modification-allowed-err)**


       Lanzado si el nodo es de sólo lectura.





### Ver también

    - [DOMElement::hasAttributeNS()](#domelement.hasattributens) - Comprueba si un atributo existe

    - [DOMElement::getAttributeNS()](#domelement.getattributens) - Devuelve el valor de un atributo

    - [DOMElement::setAttributeNS()](#domelement.setattributens) - Añade un nuevo atributo

# DOMElement::replaceChildren

(PHP 8 &gt;= 8.3.0)

DOMElement::replaceChildren — Reemplaza los hijos en el elemento

### Descripción

public **DOMElement::replaceChildren**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Reemplaza los hijos en el elemento por nuevos nodes.

### Parámetros

     nodes


       Los nodos que reemplazan a los hijos.
       Las cadenas de caracteres se convierten automáticamente en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si este nodo es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin documento propietario funciona ahora.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMElement::replaceChildren()**

    Reemplaza los hijos por nuevos nodos.

&lt;?php
$doc = new DOMDocument;
$doc-&gt;loadXML("&lt;container&gt;&lt;hello/&gt;&lt;/container&gt;");
$container = $doc-&gt;documentElement;

$container-&gt;replaceWith("beautiful", $doc-&gt;createElement("world"));

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
beautiful
&lt;world/&gt;

### Ver también

- [DOMParentNode::replaceChildren()](#domparentnode.replacechildren) - Reemplaza los hijos en un nodo

- [DOMElement::replaceWith()](#domelement.replacewith) - Reemplaza el elemento por nuevos nodos

- [DOMElement::after()](#domelement.after) - Añade nodos después del elemento

- [DOMElement::before()](#domelement.before) - Añade nodos antes del elemento

- [DOMElement::remove()](#domelement.remove) - Elimina el elemento

# DOMElement::replaceWith

(PHP 8)

DOMElement::replaceWith — Reemplaza el elemento por nuevos nodos

### Descripción

public **DOMElement::replaceWith**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Reemplaza el elemento por nuevos nodes.

### Parámetros

     nodes


       Los nodos de reemplazo.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si el padre es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin padre es ahora una operación sin efecto para alinear el comportamiento con la especificación del DOM.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMElement::replaceWith()**

    Reemplaza el elemento por nuevos nodos.

&lt;?php
$doc = new DOMDocument;
$doc-&gt;loadXML("&lt;container&gt;&lt;hello/&gt;&lt;/container&gt;");
$cdata = $doc-&gt;documentElement-&gt;firstChild;

$cdata-&gt;replaceWith("beautiful", $doc-&gt;createElement("world"));

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;container&gt;beautiful&lt;world/&gt;&lt;/container&gt;

### Ver también

- [DOMChildNode::replaceWith()](#domchildnode.replacewith) - Reemplaza el nodo por nuevos nodos

- [DOMElement::replaceChildren()](#domelement.replacechildren) - Reemplaza los hijos en el elemento

- [DOMElement::after()](#domelement.after) - Añade nodos después del elemento

- [DOMElement::before()](#domelement.before) - Añade nodos antes del elemento

- [DOMElement::remove()](#domelement.remove) - Elimina el elemento

# DOMElement::setAttribute

(PHP 5, PHP 7, PHP 8)

DOMElement::setAttribute — Añade un nuevo atributo o modifica uno existente

### Descripción

public **DOMElement::setAttribute**([string](#language.types.string) $qualifiedName, [string](#language.types.string) $value): [DOMAttr](#class.domattr)|[bool](#language.types.boolean)

Establece un atributo con nombre qualifiedName al valor
dado. Si el atributo no existe, se creará.

### Parámetros

     qualifiedName


       El nombre del atributo.






     value


       El valor del atributo.





### Valores devueltos

El [DOMAttr](#class.domattr) creado o modificado o **[false](#constant.false)** si ocurrió un error.

### Errores/Excepciones

     **[DOM_NO_MODIFICATION_ALLOWED_ERR](#constant.dom-no-modification-allowed-err)**


       Lanzado si el nodo es de sólo lectura.





### Ejemplos

    **Ejemplo #1 Establecer un atributo**

&lt;?php
$doc = new DOMDocument("1.0");
$node = $doc-&gt;createElement("para");
$newnode = $doc-&gt;appendChild($node);
$newnode-&gt;setAttribute("align", "left");
?&gt;

### Ver también

    - [DOMElement::hasAttribute()](#domelement.hasattribute) - Comprueba si existe un atributo

    - [DOMElement::getAttribute()](#domelement.getattribute) - Devuelve el valor de un atributo

    - [DOMElement::removeAttribute()](#domelement.removeattribute) - Elimina un atributo

# DOMElement::setAttributeNode

(PHP 5, PHP 7, PHP 8)

DOMElement::setAttributeNode — Añade un nuevo atributo al elemento

### Descripción

public **DOMElement::setAttributeNode**([DOMAttr](#class.domattr) $attr): [DOMAttr](#class.domattr)|[null](#language.types.null)|[false](#language.types.singleton)

Añade un nuevo atributo attr al elemento.
Si ya existe un atributo con el mismo nombre en el elemento, este atributo es reemplazado por
attr.

### Parámetros

     attr


       El atributo.





### Valores devueltos

Devuelve el atributo antiguo si ha sido reemplazado o **[null](#constant.null)** si no había un atributo antiguo.
Si se produce un error **[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)** y strictErrorChecking es **[false](#constant.false)**, entonces **[false](#constant.false)** es devuelto.

### Errores/Excepciones

     **[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**


       Lanzado si attr pertenece a un documento diferente al del elemento.





### Ver también

    - [DOMElement::hasAttribute()](#domelement.hasattribute) - Comprueba si existe un atributo

    - [DOMElement::getAttributeNode()](#domelement.getattributenode) - Devuelve el nodo de un atributo

    - [DOMElement::removeAttributeNode()](#domelement.removeattributenode) - Elimina un atributo

# DOMElement::setAttributeNodeNS

(PHP 5, PHP 7, PHP 8)

DOMElement::setAttributeNodeNS — Añade un nuevo atributo al elemento

### Descripción

public **DOMElement::setAttributeNodeNS**([DOMAttr](#class.domattr) $attr): [DOMAttr](#class.domattr)|[null](#language.types.null)|[false](#language.types.singleton)

Añade un nuevo atributo attr al elemento, teniendo en cuenta el espacio de nombres (namespace):
Si ya existe un atributo con el mismo nombre en el elemento, este atributo es reemplazado por
attr.

### Parámetros

     attr


       El nombre del atributo.





### Valores devueltos

Devuelve el antiguo atributo si ha sido reemplazado o **[null](#constant.null)** si no había un atributo anterior.
Si se produce un error **[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)** y strictErrorChecking es **[false](#constant.false)**, entonces se devuelve **[false](#constant.false)**.

### Errores/Excepciones

     **[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**


       Se lanza si attr pertenece a un documento diferente al del elemento.





### Ver también

    - [DOMElement::hasAttributeNS()](#domelement.hasattributens) - Comprueba si un atributo existe

    - [DOMElement::getAttributeNodeNS()](#domelement.getattributenodens) - Devuelve el nodo de un atributo

    - [DOMElement::removeAttributeNode()](#domelement.removeattributenode) - Elimina un atributo

# DOMElement::setAttributeNS

(PHP 5, PHP 7, PHP 8)

DOMElement::setAttributeNS — Añade un nuevo atributo

### Descripción

public **DOMElement::setAttributeNS**([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $qualifiedName, [string](#language.types.string) $value): [void](language.types.void.html)

Establece un atributo con el espacio de nombres namespace y
el nombre qualifiedName al valor dado. Si el atributo
no existe, se creará.

### Parámetros

     namespace


       La URI del espacio de nombres.






     qualifiedName


       El nombre cualificado del atributo, como prefijo:nombre_etiqueta.






     value


       El valor del atributo.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

     **[DOM_NO_MODIFICATION_ALLOWED_ERR](#constant.dom-no-modification-allowed-err)**


       Lanzado si el nodo es de sólo lectura.






     **[DOM_NAMESPACE_ERR](#constant.dom-namespace-err)**


       Lanzado si qualifiedName es un nombre cualificado
       malformado, o si qualifiedName tienen un prefijo y
       namespace es **[null](#constant.null)**.





### Ver también

    - [DOMElement::hasAttributeNS()](#domelement.hasattributens) - Comprueba si un atributo existe

    - [DOMElement::getAttributeNS()](#domelement.getattributens) - Devuelve el valor de un atributo

    - [DOMElement::removeAttributeNS()](#domelement.removeattributens) - Elimina un atributo

# DOMElement::setIdAttribute

(PHP 5, PHP 7, PHP 8)

DOMElement::setIdAttribute — Declara el atributo especificado por su nombre como de tipo ID

### Descripción

public **DOMElement::setIdAttribute**([string](#language.types.string) $qualifiedName, [bool](#language.types.boolean) $isId): [void](language.types.void.html)

Declara el atributo qualifiedName como de tipo ID.

### Parámetros

     qualifiedName


       El nombre del atributo.






     isId


       Establecer a **[true](#constant.true)** si se quiere que qualifiedName sea de tipo
       ID, **[false](#constant.false)** si no.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

     **[DOM_NO_MODIFICATION_ALLOWED_ERR](#constant.dom-no-modification-allowed-err)**


       Lanzado si el nodo es de sólo lectura.






     **[DOM_NOT_FOUND_ERR](#constant.dom-not-found-err)**


       Lanzado si qualifiedName no es un atributo de este elemento.





### Ver también

    - [DOMDocument::getElementById()](#domdocument.getelementbyid) - Busca un elemento con un cierto identificador

    - [DOMElement::setIdAttributeNode()](#domelement.setidattributenode) - Declara el atributo especificado por el nodo como de tipo ID

    - [DOMElement::setIdAttributeNS()](#domelement.setidattributens) - Declara el atributo especificado por su nombre local y su URI del espacio de nombres como de tipo ID

# DOMElement::setIdAttributeNode

(PHP 5, PHP 7, PHP 8)

DOMElement::setIdAttributeNode — Declara el atributo especificado por el nodo como de tipo ID

### Descripción

public **DOMElement::setIdAttributeNode**([DOMAttr](#class.domattr) $attr, [bool](#language.types.boolean) $isId): [void](language.types.void.html)

Declara el atributo especificado por attr
como de tipo ID.

### Parámetros

     attr


       El atributo del nodo.






     isId


       Definir como **[true](#constant.true)** si se desea que name
       sea de tipo ID, **[false](#constant.false)** en caso contrario.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

     **[DOM_NO_MODIFICATION_ALLOWED_ERR](#constant.dom-no-modification-allowed-err)**


       Enviado si el nodo es de solo lectura.






     **[DOM_NOT_FOUND_ERR](#constant.dom-not-found-err)**


       Enviado si name no es un atributo de este elemento.





### Ver también

    - [DOMDocument::getElementById()](#domdocument.getelementbyid) - Busca un elemento con un cierto identificador

    - [DOMElement::setIdAttribute()](#domelement.setidattribute) - Declara el atributo especificado por su nombre como de tipo ID

    - [DOMElement::setIdAttributeNS()](#domelement.setidattributens) - Declara el atributo especificado por su nombre local y su URI del espacio de nombres como de tipo ID

# DOMElement::setIdAttributeNS

(PHP 5, PHP 7, PHP 8)

DOMElement::setIdAttributeNS — Declara el atributo especificado por su nombre local y su URI del espacio de nombres como de tipo ID

### Descripción

public **DOMElement::setIdAttributeNS**([string](#language.types.string) $namespace, [string](#language.types.string) $qualifiedName, [bool](#language.types.boolean) $isId): [void](language.types.void.html)

Declara el atributo especificado por qualifiedName y
namespaceURI como de tipo ID.

### Parámetros

     namespaceURI


       La URI del espacio de nombres del atributo.






     qualifiedName


       El nombre local del atributo, como prefijo:nombre_etiqueta.






     isId


       Establecer a **[true](#constant.true)** si se quiere que name sea de tipo
       ID, **[false](#constant.false)** si no.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

     **[DOM_NO_MODIFICATION_ALLOWED_ERR](#constant.dom-no-modification-allowed-err)**


       Lanzado si el nodo es de sólo lectura.






     **[DOM_NOT_FOUND_ERR](#constant.dom-not-found-err)**


       Lanzado si name no es un atributo de este elemento.





### Ver también

    - [DOMDocument::getElementById()](#domdocument.getelementbyid) - Busca un elemento con un cierto identificador

    - [DOMElement::setIdAttribute()](#domelement.setidattribute) - Declara el atributo especificado por su nombre como de tipo ID

    - [DOMElement::setIdAttributeNode()](#domelement.setidattributenode) - Declara el atributo especificado por el nodo como de tipo ID

# DOMElement::toggleAttribute

(PHP 8 &gt;= 8.3.0)

DOMElement::toggleAttribute — Conmuta el atributo

### Descripción

public **DOMElement::toggleAttribute**([string](#language.types.string) $qualifiedName, [?](#language.types.null)[bool](#language.types.boolean) $force = **[null](#constant.null)**): [bool](#language.types.boolean)

Conmuta el atributo.

### Parámetros

     qualifiedName


       El nombre cualificado del atributo.






     force





        - si **[null](#constant.null)**, la función conmuta el atributo.

        - si **[true](#constant.true)**, la función añade el atributo.

        - si **[false](#constant.false)**, la función elimina el atributo.





### Valores devueltos

Devuelve **[true](#constant.true)** si el atributo está presente después de la llamada, en caso contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMElement::toggleAttribute()**

&lt;?php

$dom = new DOMDocument();
$dom-&gt;loadXML("&lt;?xml version='1.0'?&gt;&lt;container selected=\"\"/&gt;");

var_dump($dom-&gt;documentElement-&gt;toggleAttribute('selected'));
echo $dom-&gt;saveXML() . PHP_EOL;

var_dump($dom-&gt;documentElement-&gt;toggleAttribute('selected'));
echo $dom-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

bool(false)
&lt;?xml version="1.0"?&gt;
&lt;container/&gt;

bool(true)
&lt;?xml version="1.0"?&gt;
&lt;container selected=""/&gt;

## Tabla de contenidos

- [DOMElement::after](#domelement.after) — Añade nodos después del elemento
- [DOMElement::append](#domelement.append) — Añade nodos después del último hijo
- [DOMElement::before](#domelement.before) — Añade nodos antes del elemento
- [DOMElement::\_\_construct](#domelement.construct) — Crea un nuevo objeto DOMElement
- [DOMElement::getAttribute](#domelement.getattribute) — Devuelve el valor de un atributo
- [DOMElement::getAttributeNames](#domelement.getattributenames) — Devuelve los nombres de los atributos
- [DOMElement::getAttributeNode](#domelement.getattributenode) — Devuelve el nodo de un atributo
- [DOMElement::getAttributeNodeNS](#domelement.getattributenodens) — Devuelve el nodo de un atributo
- [DOMElement::getAttributeNS](#domelement.getattributens) — Devuelve el valor de un atributo
- [DOMElement::getElementsByTagName](#domelement.getelementsbytagname) — Obtiene los elementos por nombre de etiqueta
- [DOMElement::getElementsByTagNameNS](#domelement.getelementsbytagnamens) — Recupera los elementos por su espacio de nombres y su localName
- [DOMElement::hasAttribute](#domelement.hasattribute) — Comprueba si existe un atributo
- [DOMElement::hasAttributeNS](#domelement.hasattributens) — Comprueba si un atributo existe
- [DOMElement::insertAdjacentElement](#domelement.insertadjacentelement) — Inserta un elemento adyacente
- [DOMElement::insertAdjacentText](#domelement.insertadjacenttext) — Inserta un texto adyacente
- [DOMElement::prepend](#domelement.prepend) — Añade nodos antes del primer hijo
- [DOMElement::remove](#domelement.remove) — Elimina el elemento
- [DOMElement::removeAttribute](#domelement.removeattribute) — Elimina un atributo
- [DOMElement::removeAttributeNode](#domelement.removeattributenode) — Elimina un atributo
- [DOMElement::removeAttributeNS](#domelement.removeattributens) — Elimina un atributo
- [DOMElement::replaceChildren](#domelement.replacechildren) — Reemplaza los hijos en el elemento
- [DOMElement::replaceWith](#domelement.replacewith) — Reemplaza el elemento por nuevos nodos
- [DOMElement::setAttribute](#domelement.setattribute) — Añade un nuevo atributo o modifica uno existente
- [DOMElement::setAttributeNode](#domelement.setattributenode) — Añade un nuevo atributo al elemento
- [DOMElement::setAttributeNodeNS](#domelement.setattributenodens) — Añade un nuevo atributo al elemento
- [DOMElement::setAttributeNS](#domelement.setattributens) — Añade un nuevo atributo
- [DOMElement::setIdAttribute](#domelement.setidattribute) — Declara el atributo especificado por su nombre como de tipo ID
- [DOMElement::setIdAttributeNode](#domelement.setidattributenode) — Declara el atributo especificado por el nodo como de tipo ID
- [DOMElement::setIdAttributeNS](#domelement.setidattributens) — Declara el atributo especificado por su nombre local y su URI del espacio de nombres como de tipo ID
- [DOMElement::toggleAttribute](#domelement.toggleattribute) — Conmuta el atributo

# La classe DOMEntity

(PHP 5, PHP 7, PHP 8)

## Introducción

    Esta interfaz representa una entidad conocida, analizada o no, en un
    documento XML.

## Sinopsis de la Clase

     class **DOMEntity**



     extends
      [DOMNode](#class.domnode)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [DOMNode::DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     ?[string](#language.types.string)
      [$publicId](#domentity.props.publicid);

    public
     readonly
     ?[string](#language.types.string)
      [$systemId](#domentity.props.systemid);

    public
     readonly
     ?[string](#language.types.string)
      [$notationName](#domentity.props.notationname);

    public
     readonly
     ?[string](#language.types.string)
      [$actualEncoding](#domentity.props.actualencoding);

    public
     readonly
     ?[string](#language.types.string)
      [$encoding](#domentity.props.encoding);

    public
     readonly
     ?[string](#language.types.string)
      [$version](#domentity.props.version);


    /* Propiedades heredadas */
    public
     readonly
     [string](#language.types.string)
      [$nodeName](#domnode.props.nodename);

public
?[string](#language.types.string)
[$nodeValue](#domnode.props.nodevalue);
public
readonly
[int](#language.types.integer)
[$nodeType](#domnode.props.nodetype);
public
readonly
?[DOMNode](#class.domnode)
[$parentNode](#domnode.props.parentnode);
public
readonly
?[DOMElement](#class.domelement)
[$parentElement](#domnode.props.parentelement);
public
readonly
[DOMNodeList](#class.domnodelist)
[$childNodes](#domnode.props.childnodes);
public
readonly
?[DOMNode](#class.domnode)
[$firstChild](#domnode.props.firstchild);
public
readonly
?[DOMNode](#class.domnode)
[$lastChild](#domnode.props.lastchild);
public
readonly
?[DOMNode](#class.domnode)
[$previousSibling](#domnode.props.previoussibling);
public
readonly
?[DOMNode](#class.domnode)
[$nextSibling](#domnode.props.nextsibling);
public
readonly
?[DOMNamedNodeMap](#class.domnamednodemap)
[$attributes](#domnode.props.attributes);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#domnode.props.isconnected);
public
readonly
?[DOMDocument](#class.domdocument)
[$ownerDocument](#domnode.props.ownerdocument);
public
readonly
?[string](#language.types.string)
[$namespaceURI](#domnode.props.namespaceuri);
public
[string](#language.types.string)
[$prefix](#domnode.props.prefix);
public
readonly
?[string](#language.types.string)
[$localName](#domnode.props.localname);
public
readonly
?[string](#language.types.string)
[$baseURI](#domnode.props.baseuri);
public
[string](#language.types.string)
[$textContent](#domnode.props.textcontent);

    /* Métodos heredados */

public [DOMNode::appendChild](#domnode.appendchild)([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::C14N](#domnode.c14n)(
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)
public [DOMNode::C14NFile](#domnode.c14nfile)(
    [string](#language.types.string) $uri,
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)
public [DOMNode::cloneNode](#domnode.clonenode)([bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::compareDocumentPosition](#domnode.comparedocumentposition)([DOMNode](#class.domnode) $other): [int](#language.types.integer)
public [DOMNode::contains](#domnode.contains)([DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null) $other): [bool](#language.types.boolean)
public [DOMNode::getLineNo](#domnode.getlineno)(): [int](#language.types.integer)
public [DOMNode::getNodePath](#domnode.getnodepath)(): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::getRootNode](#domnode.getrootnode)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [DOMNode](#class.domnode)
public [DOMNode::hasAttributes](#domnode.hasattributes)(): [bool](#language.types.boolean)
public [DOMNode::hasChildNodes](#domnode.haschildnodes)(): [bool](#language.types.boolean)
public [DOMNode::insertBefore](#domnode.insertbefore)([DOMNode](#class.domnode) $node, [?](#language.types.null)[DOMNode](#class.domnode) $child = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::isDefaultNamespace](#domnode.isdefaultnamespace)([string](#language.types.string) $namespaceURI): [bool](#language.types.boolean)
public [DOMNode::isEqualNode](#domnode.isequalnode)([?](#language.types.null)[DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSameNode](#domnode.issamenode)([DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSupported](#domnode.issupported)([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)
public [DOMNode::lookupNamespaceURI](#domnode.lookupnamespaceuri)([?](#language.types.null)[string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::lookupPrefix](#domnode.lookupprefix)([string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::normalize](#domnode.normalize)(): [void](language.types.void.html)
public [DOMNode::removeChild](#domnode.removechild)([DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::replaceChild](#domnode.replacechild)([DOMNode](#class.domnode) $node, [DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::\_\_sleep](#domnode.sleep)(): [array](#language.types.array)
public [DOMNode::\_\_wakeup](#domnode.wakeup)(): [void](language.types.void.html)

}

## Propiedades

     publicId


       El identificador público asociado con la entidad, si está especificado, y **[null](#constant.null)**
       de lo contrario.






     systemId


       El identificador del sistema asociado con la entidad, si está especificado, y
       **[null](#constant.null)** de lo contrario. Puede ser una URI absoluta o relativa.






     notationName


       Para las entidades no analizadas, el nombre de la notación de la entidad.
       Para las entidades analizadas, vale **[null](#constant.null)**.






     actualEncoding


       *Deprecado a partir de PHP 8.4.0*.
       Esto siempre ha sido igual a **[null](#constant.null)**.






     encoding


       *Deprecado a partir de PHP 8.4.0*.
       Esto siempre ha sido igual a **[null](#constant.null)**.






     version


       *Deprecado a partir de PHP 8.4.0*.
       Esto siempre ha sido igual a **[null](#constant.null)**.





## Historial de cambios

      Versión
      Descripción






      8.4.0

       actualEncoding,
       encoding, y
       version ahora están oficialmente depreciados porque siempre han sido
       iguales a **[null](#constant.null)**.



# La clase [DOMEntityReference](#class.domentityreference)

(PHP 5, PHP 7, PHP 8)

## Sinopsis de la Clase

     class **DOMEntityReference**



     extends
      [DOMNode](#class.domnode)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [DOMNode::DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades heredadas */
    public
     readonly
     [string](#language.types.string)
      [$nodeName](#domnode.props.nodename);

public
?[string](#language.types.string)
[$nodeValue](#domnode.props.nodevalue);
public
readonly
[int](#language.types.integer)
[$nodeType](#domnode.props.nodetype);
public
readonly
?[DOMNode](#class.domnode)
[$parentNode](#domnode.props.parentnode);
public
readonly
?[DOMElement](#class.domelement)
[$parentElement](#domnode.props.parentelement);
public
readonly
[DOMNodeList](#class.domnodelist)
[$childNodes](#domnode.props.childnodes);
public
readonly
?[DOMNode](#class.domnode)
[$firstChild](#domnode.props.firstchild);
public
readonly
?[DOMNode](#class.domnode)
[$lastChild](#domnode.props.lastchild);
public
readonly
?[DOMNode](#class.domnode)
[$previousSibling](#domnode.props.previoussibling);
public
readonly
?[DOMNode](#class.domnode)
[$nextSibling](#domnode.props.nextsibling);
public
readonly
?[DOMNamedNodeMap](#class.domnamednodemap)
[$attributes](#domnode.props.attributes);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#domnode.props.isconnected);
public
readonly
?[DOMDocument](#class.domdocument)
[$ownerDocument](#domnode.props.ownerdocument);
public
readonly
?[string](#language.types.string)
[$namespaceURI](#domnode.props.namespaceuri);
public
[string](#language.types.string)
[$prefix](#domnode.props.prefix);
public
readonly
?[string](#language.types.string)
[$localName](#domnode.props.localname);
public
readonly
?[string](#language.types.string)
[$baseURI](#domnode.props.baseuri);
public
[string](#language.types.string)
[$textContent](#domnode.props.textcontent);

    /* Métodos */

public [\_\_construct](#domentityreference.construct)([string](#language.types.string) $name)

    /* Métodos heredados */
    public [DOMNode::appendChild](#domnode.appendchild)([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)

public [DOMNode::C14N](#domnode.c14n)(
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)
public [DOMNode::C14NFile](#domnode.c14nfile)(
    [string](#language.types.string) $uri,
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)
public [DOMNode::cloneNode](#domnode.clonenode)([bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::compareDocumentPosition](#domnode.comparedocumentposition)([DOMNode](#class.domnode) $other): [int](#language.types.integer)
public [DOMNode::contains](#domnode.contains)([DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null) $other): [bool](#language.types.boolean)
public [DOMNode::getLineNo](#domnode.getlineno)(): [int](#language.types.integer)
public [DOMNode::getNodePath](#domnode.getnodepath)(): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::getRootNode](#domnode.getrootnode)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [DOMNode](#class.domnode)
public [DOMNode::hasAttributes](#domnode.hasattributes)(): [bool](#language.types.boolean)
public [DOMNode::hasChildNodes](#domnode.haschildnodes)(): [bool](#language.types.boolean)
public [DOMNode::insertBefore](#domnode.insertbefore)([DOMNode](#class.domnode) $node, [?](#language.types.null)[DOMNode](#class.domnode) $child = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::isDefaultNamespace](#domnode.isdefaultnamespace)([string](#language.types.string) $namespaceURI): [bool](#language.types.boolean)
public [DOMNode::isEqualNode](#domnode.isequalnode)([?](#language.types.null)[DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSameNode](#domnode.issamenode)([DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSupported](#domnode.issupported)([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)
public [DOMNode::lookupNamespaceURI](#domnode.lookupnamespaceuri)([?](#language.types.null)[string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::lookupPrefix](#domnode.lookupprefix)([string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::normalize](#domnode.normalize)(): [void](language.types.void.html)
public [DOMNode::removeChild](#domnode.removechild)([DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::replaceChild](#domnode.replacechild)([DOMNode](#class.domnode) $node, [DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::\_\_sleep](#domnode.sleep)(): [array](#language.types.array)
public [DOMNode::\_\_wakeup](#domnode.wakeup)(): [void](language.types.void.html)

}

# DOMEntityReference::\_\_construct

(PHP 5, PHP 7, PHP 8)

DOMEntityReference::\_\_construct —
Crea un nuevo objeto DOMEntityReference

### Descripción

public **DOMEntityReference::\_\_construct**([string](#language.types.string) $name)

Crea un nuevo objeto [DOMEntityReference](#class.domentityreference).

### Parámetros

     name


       El nombre de la referencia de entidad.





### Ejemplos

    **Ejemplo #1 Crear un nuevo objeto DOMEntityReference**

&lt;?php

$dom = new DOMDocument('1.0', 'iso-8859-1');
$elemento = $dom-&gt;appendChild(new DOMElement('root'));
$entidad = $elemento-&gt;appendChild(new DOMEntityReference('nbsp'));
echo $dom-&gt;saveXML(); /_ &lt;?xml version="1.0" encoding="utf-8"?&gt;&lt;root&gt;&lt;/root&gt; _/

?&gt;

### Ver también

    - [DOMDocument::createEntityReference()](#domdocument.createentityreference) - Create new entity reference node

## Tabla de contenidos

- [DOMEntityReference::\_\_construct](#domentityreference.construct) — Crea un nuevo objeto DOMEntityReference

# La clase DOMException / Dom\Exception

(PHP 5, PHP 7, PHP 8)

## Introducción

    Las operaciones DOM lanzan excepciones en circunstancias particulares, es decir, cuando no es posible ejecutar una operación por razones lógicas.




    Esta clase se aliasa bajo el nombre **Dom\Exception** en el espacio de nombres Dom.




    Ver también [Las excepciones](#language.exceptions).

## Sinopsis de la Clase

     final
     class **DOMException**



     extends
      [Exception](#class.exception)
     {

    /* Propiedades */

     public
     [int](#language.types.integer)
      [$code](#domexception.props.code);


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

    /* Métodos heredados */

public [Exception::\_\_construct](#exception.construct)([string](#language.types.string) $message = "", [int](#language.types.integer) $code = 0, [?](#language.types.null)[Throwable](#class.throwable) $previous = **[null](#constant.null)**)

    final public [Exception::getMessage](#exception.getmessage)(): [string](#language.types.string)

final public [Exception::getPrevious](#exception.getprevious)(): [?](#language.types.null)[Throwable](#class.throwable)
final public [Exception::getCode](#exception.getcode)(): [int](#language.types.integer)
final public [Exception::getFile](#exception.getfile)(): [string](#language.types.string)
final public [Exception::getLine](#exception.getline)(): [int](#language.types.integer)
final public [Exception::getTrace](#exception.gettrace)(): [array](#language.types.array)
final public [Exception::getTraceAsString](#exception.gettraceasstring)(): [string](#language.types.string)
public [Exception::\_\_toString](#exception.tostring)(): [string](#language.types.string)
private [Exception::\_\_clone](#exception.clone)(): [void](language.types.void.html)

}

## Propiedades

     code

      Un integer que indica el tipo de error generado




# La clase [DOMImplementation](#class.domimplementation)

(PHP 5, PHP 7, PHP 8)

## Introducción

    Esta clase proporciona un número de
    métodos para realizar operaciones que son independientes
    de una instancia particular del modelo objeto de un documento.

## Sinopsis de la Clase

     class **DOMImplementation**
     {

    /* Métodos */

public [createDocument](#domimplementation.createdocument)([?](#language.types.null)[string](#language.types.string) $namespace = **[null](#constant.null)**, [string](#language.types.string) $qualifiedName = "", [?](#language.types.null)[DOMDocumentType](#class.domdocumenttype) $doctype = **[null](#constant.null)**): [DOMDocument](#class.domdocument)
public [createDocumentType](#domimplementation.createdocumenttype)([string](#language.types.string) $qualifiedName, [string](#language.types.string) $publicId = "", [string](#language.types.string) $systemId = ""): [DOMDocumentType](#class.domdocumenttype)|[false](#language.types.singleton)
public [hasFeature](#domimplementation.hasfeature)([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)

}

# DOMImplementation::\_\_construct

(PHP 5, PHP 7)

DOMImplementation::\_\_construct —
Crea un nuevo objeto DOMImplementation

### Descripción

**DOMImplementation::\_\_construct**()

Crea un nuevo objeto [DOMImplementation](#class.domimplementation).

### Parámetros

Esta función no contiene ningún parámetro.

# DOMImplementation::createDocument

(PHP 5, PHP 7, PHP 8)

DOMImplementation::createDocument —
Crea un objeto DOM Document del tipo especificado con sus elementos

### Descripción

public **DOMImplementation::createDocument**([?](#language.types.null)[string](#language.types.string) $namespace = **[null](#constant.null)**, [string](#language.types.string) $qualifiedName = "", [?](#language.types.null)[DOMDocumentType](#class.domdocumenttype) $doctype = **[null](#constant.null)**): [DOMDocument](#class.domdocument)

Crea un objeto [DOMDocument](#class.domdocument) del tipo especificado con
estos elementos del documento.

### Parámetros

     namespace


       La URI del espacio de nombres de los elementos del documento a crear.






     qualifiedName


       El nombre cualificado de los elementos del documento a crear.






     doctype


       El tipo de documento a crear o **[null](#constant.null)**.





### Valores devueltos

Un nuevo objeto [DOMDocument](#class.domdocument). Si
namespace, qualifiedName,
y doctype son nulos, el
[DOMDocument](#class.domdocument) devuelto está vacío sin ningún elemento de
documento.

### Errores/Excepciones

     **[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**


       Lanzado si doctype ya ha sido utilizado con un
       documento diferente o ha sido creado desde una implementación diferente.






     **[DOM_NAMESPACE_ERR](#constant.dom-namespace-err)**


       Lanzado si hay un error en el espacio de nombres, determinado por
       namespace y
       qualifiedName.





### Historial de cambios

       Versión
       Descripción






       8.4.0

        La función ahora tiene un tipo de retorno tentativo [DOMDocument](#class.domdocument).




       8.0.3

        namespace ahora es nullable.




       8.0.0

        doctype ahora es nullable.




       8.0.0

        Llamar a esta función de manera estática ahora lanzará una [Error](#class.error).
        Anteriormente, se generaba un error **[E_DEPRECATED](#constant.e-deprecated)**.





### Ver también

    - [DOMDocument::__construct()](#domdocument.construct) - Crea un nuevo objeto DOMDocument

    - [DOMImplementation::createDocumentType()](#domimplementation.createdocumenttype) - Crea un objeto DOMDocumentType vacío

# DOMImplementation::createDocumentType

(PHP 5, PHP 7, PHP 8)

DOMImplementation::createDocumentType —
Crea un objeto DOMDocumentType vacío

### Descripción

public **DOMImplementation::createDocumentType**([string](#language.types.string) $qualifiedName, [string](#language.types.string) $publicId = "", [string](#language.types.string) $systemId = ""): [DOMDocumentType](#class.domdocumenttype)|[false](#language.types.singleton)

Crea un objeto [DOMDocumentType](#class.domdocumenttype) vacío.
Las declaraciones y notaciones de entidades no están disponibles.
Las expansiones de referencias de entidades y los añadidos de atributos por
omisión no se efectúan tampoco.

### Parámetros

     qualifiedName


       El nombre cualificado del tipo de documento a crear.






     publicId


       El identificador público externo del subconjunto.






     systemId


       El identificador de sistema externo del subconjunto.





### Valores devueltos

Un nuevo nodo [DOMDocumentType](#class.domdocumenttype)
con su ownerDocument definido a **[null](#constant.null)** o **[false](#constant.false)** en caso de error.

### Errores/Excepciones

     **[DOM_NAMESPACE_ERR](#constant.dom-namespace-err)**


       Se lanza si hay un error con el espacio de nombres, determinado por
       qualifiedName.





### Historial de cambios

       Versión
       Descripción






       8.0.0

        Llamar a esta función de manera estática lanzará ahora una [Error](#class.error).
        Anteriormente, se generaba un error **[E_DEPRECATED](#constant.e-deprecated)**.





### Ejemplos

    **Ejemplo #1 Creación de un documento con una DTD adjunta**

&lt;?php

// Creación de una instancia de la clase DOMImplementation
$imp = new DOMImplementation;

// Creación de una instancia DOMDocumentType
$dtd = $imp-&gt;createDocumentType('graph', '', 'graph.dtd');

// Creación de una instancia DOMDocument
$dom = $imp-&gt;createDocument("", "", $dtd);

// Definición de otras propiedades
$dom-&gt;encoding = 'UTF-8';
$dom-&gt;standalone = false;

// Creación de un elemento vacío
$element = $dom-&gt;createElement('graph');

// Adición del elemento
$dom-&gt;appendChild($element);

// Recupera y muestra el documento
echo $dom-&gt;saveXML();

?&gt;

    El ejemplo anterior mostrará:

&lt;?xml version="1.0" encoding="UTF-8" standalone="no"?&gt;
&lt;!DOCTYPE graph SYSTEM "graph.dtd"&gt;
&lt;graph/&gt;

### Ver también

    - [DOMImplementation::createDocument()](#domimplementation.createdocument) - Crea un objeto DOM Document del tipo especificado con sus elementos

# DOMImplementation::hasFeature

(PHP 5, PHP 7, PHP 8)

DOMImplementation::hasFeature —
Verifica si la implementación DOM implementa una funcionalidad específica

### Descripción

public **DOMImplementation::hasFeature**([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)

Verifica si la implementación DOM implementa una funcionalidad
feature específica.

Se puede encontrar una lista de todas las funcionalidades en la sección
[» Conformance](http://www.w3.org/TR/2000/REC-DOM-Level-2-Core-20001113/introduction.html#ID-Conformance) de la especificación
DOM.

### Parámetros

     feature


       La funcionalidad a verificar.






     version


       El número de versión de la funcionalidad feature
       a verificar. En el nivel 2, esto puede ser 2.0 o
       1.0.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Llamar a esta función de manera estática ahora lanzará una [Error](#class.error).
        Anteriormente, se generaba un error **[E_DEPRECATED](#constant.e-deprecated)**.





### Ejemplos

**Ejemplo #1 Pruebe su implementación DOM**

&lt;?php

$features = array(
'Core' =&gt; 'Core module',
'XML' =&gt; 'XML module',
'HTML' =&gt; 'HTML module',
'Views' =&gt; 'Views module',
'Stylesheets' =&gt; 'Style Sheets module',
'CSS' =&gt; 'CSS module',
'CSS2' =&gt; 'CSS2 module',
'Events' =&gt; 'Events module',
'UIEvents' =&gt; 'User interface Events module',
'MouseEvents' =&gt; 'Mouse Events module',
'MutationEvents' =&gt; 'Mutation Events module',
'HTMLEvents' =&gt; 'HTML Events module',
'Range' =&gt; 'Range module',
'Traversal' =&gt; 'Traversal module'
);

$implementation = new DOMImplementation;

foreach ($features as $key =&gt; $name) {
  if ($implementation-&gt;hasFeature($key, '2.0')) {
echo "Tiene la funcionalidad $name\n";
} else {
echo "No tiene la funcionalidad $name\n";
}
}

?&gt;

### Ver también

    - [DOMNode::isSupported()](#domnode.issupported) - Comprueba si una característica está soportada para la versión especificada

## Tabla de contenidos

- [DOMImplementation::\_\_construct](#domimplementation.construct) — Crea un nuevo objeto DOMImplementation
- [DOMImplementation::createDocument](#domimplementation.createdocument) — Crea un objeto DOM Document del tipo especificado con sus elementos
- [DOMImplementation::createDocumentType](#domimplementation.createdocumenttype) — Crea un objeto DOMDocumentType vacío
- [DOMImplementation::hasFeature](#domimplementation.hasfeature) — Verifica si la implementación DOM implementa una funcionalidad específica

# La clase [DOMNamedNodeMap](#class.domnamednodemap)

(PHP 5, PHP 7, PHP 8)

## Sinopsis de la Clase

     class **DOMNamedNodeMap**



     implements
      [IteratorAggregate](#class.iteratoraggregate),

     [Countable](#class.countable) {

    /* Propiedades */

     public
     readonly
     [int](#language.types.integer)
      [$length](#domnamednodemap.props.length);


    /* Métodos */

public [count](#domnamednodemap.count)(): [int](#language.types.integer)
public [getIterator](#domnamednodemap.getiterator)(): [Iterator](#class.iterator)
public [getNamedItem](#domnamednodemap.getnameditem)([string](#language.types.string) $qualifiedName): [?](#language.types.null)[DOMNode](#class.domnode)
public [getNamedItemNS](#domnamednodemap.getnameditemns)([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $localName): [?](#language.types.null)[DOMNode](#class.domnode)
public [item](#domnamednodemap.item)([int](#language.types.integer) $index): [?](#language.types.null)[DOMNode](#class.domnode)

}

## Propiedades

     length


       El número de nodos en el mapa. El rango de índices de los nodos hijos válidos es de 0 a length - 1, inclusivo.





## Historial de cambios

       Versión
       Descripción






       8.0.0

        Los métodos no implementados
        **DOMNamedNodeMap::setNamedItem()**,
        **DOMNamedNodeMap::removeNamedItem()**,
        **DOMNamedNodeMap::setNamedItemNS()** y
        **DOMNamedNodeMap::removeNamedItem()**
        han sido eliminados.




       8.0.0

        La clase **DOMNamedNodeMap** ahora implementa [IteratorAggregate](#class.iteratoraggregate).
        Anteriormente, solo [Traversable](#class.traversable) era implementado.





## Notas

**Nota**:

      Los nodos en el mapa pueden ser accedidos mediante la sintaxis de array.

# DOMNamedNodeMap::count

(PHP 7 &gt;= 7.2.0, PHP 8)

DOMNamedNodeMap::count — Obtiene el número de nodos en la colección no ordenada (map)

### Descripción

public **DOMNamedNodeMap::count**(): [int](#language.types.integer)

Obtiene el número de nodos en la colección no ordenada (map).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de nodos en la colección no ordenada, lo cual es idéntico a
la propiedad [length](#domnamednodemap.props.length).

# DOMNamedNodeMap::getIterator

(PHP 8)

DOMNamedNodeMap::getIterator — Obtiene un iterador externo

### Descripción

public **DOMNamedNodeMap::getIterator**(): [Iterator](#class.iterator)

Devuelve un iterador externo para la colección de nodos nombrados.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una instancia de un objeto que implementa [Iterator](#class.iterator) o
[Traversable](#class.traversable)

### Errores/Excepciones

Lanza una [Exception](#class.exception) en caso de fallo.

### Ver también

- [IteratorAggregate::getIterator()](#iteratoraggregate.getiterator) - Recuperar un Iterator o traversable externo

# DOMNamedNodeMap::getNamedItem

(PHP 5, PHP 7, PHP 8)

DOMNamedNodeMap::getNamedItem —
Devuelve un nodo especificado por su nombre

### Descripción

public **DOMNamedNodeMap::getNamedItem**([string](#language.types.string) $qualifiedName): [?](#language.types.null)[DOMNode](#class.domnode)

Obtiene un nodo especificado por su nodeName.

### Parámetros

     qualifiedName


       El nodeName del nodo a recuperar.





### Valores devueltos

Un nodo (de cualquier tipo) con un nodeName especificado, o
**[null](#constant.null)** si no se encuentra ningún nodo.

### Ejemplos

**Ejemplo #1 Recuperar un atributo en un nodo**

&lt;?php

$doc = new DOMDocument;
$doc-&gt;load('examples/book.xml');

$id = $doc-&gt;firstChild-&gt;nextSibling-&gt;nextSibling-&gt;firstChild-&gt;nextSibling-&gt;attributes-&gt;getNamedItem('id');
?&gt;

**Ejemplo #2 Acceder a un elemento con la sintaxis de array**

&lt;?php
$doc = new DOMDocument;
$doc-&gt;load('examples/book.xml');

$id = $doc-&gt;firstChild-&gt;nextSibling-&gt;nextSibling-&gt;firstChild-&gt;nextSibling-&gt;attributes['id'];
?&gt;

### Ver también

- [DOMNamedNodeMap::getNamedItemNS()](#domnamednodemap.getnameditemns) - Recupera un nodo especificado por el nombre local y la URI del espacio de nombres

# DOMNamedNodeMap::getNamedItemNS

(PHP 5, PHP 7, PHP 8)

DOMNamedNodeMap::getNamedItemNS —
Recupera un nodo especificado por el nombre local y la URI del espacio de nombres

### Descripción

public **DOMNamedNodeMap::getNamedItemNS**([?](#language.types.null)[string](#language.types.string) $namespace, [string](#language.types.string) $localName): [?](#language.types.null)[DOMNode](#class.domnode)

Recupera un nodo especificado por localName y
namespace.

### Parámetros

     namespace


       La URI del espacio de nombres del nodo a recuperar.






     localName


       El nombre local del nodo a recuperar.





### Valores devueltos

Un nodo (de cualquier tipo) con el nombre local y la URI del espacio de nombres especificados, o
**[null](#constant.null)** si no se encuentra ningún nodo.

### Ver también

    - [DOMNamedNodeMap::getNamedItem()](#domnamednodemap.getnameditem) - Devuelve un nodo especificado por su nombre

# DOMNamedNodeMap::item

(PHP 5, PHP 7, PHP 8)

DOMNamedNodeMap::item — Recupera un nodo especificado por su índice

### Descripción

public **DOMNamedNodeMap::item**([int](#language.types.integer) $index): [?](#language.types.null)[DOMNode](#class.domnode)

Recupera un nodo especificado por index dentro del
objeto [DOMNamedNodeMap](#class.domnamednodemap).

### Parámetros

     index


       Índice dentro de este mapa.





### Valores devueltos

El nodo en la posición marcada por index en el mapa, o **[null](#constant.null)**
si no es un índice válido (mayor o igual que el número de nodos
de este mapa).

## Tabla de contenidos

- [DOMNamedNodeMap::count](#domnamednodemap.count) — Obtiene el número de nodos en la colección no ordenada (map)
- [DOMNamedNodeMap::getIterator](#domnamednodemap.getiterator) — Obtiene un iterador externo
- [DOMNamedNodeMap::getNamedItem](#domnamednodemap.getnameditem) — Devuelve un nodo especificado por su nombre
- [DOMNamedNodeMap::getNamedItemNS](#domnamednodemap.getnameditemns) — Recupera un nodo especificado por el nombre local y la URI del espacio de nombres
- [DOMNamedNodeMap::item](#domnamednodemap.item) — Recupera un nodo especificado por su índice

# La clase DOMNameSpaceNode

(PHP 5, PHP 7, PHP 8)

## Sinopsis de la Clase

     class **DOMNameSpaceNode**
     {

    /* Propiedades */

     public
     readonly
     [string](#language.types.string)
      [$nodeName](#domnamespacenode.props.nodename);

    public
     readonly
     ?[string](#language.types.string)
      [$nodeValue](#domnamespacenode.props.nodevalue);

    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#domnamespacenode.props.nodetype);

    public
     readonly
     [string](#language.types.string)
      [$prefix](#domnamespacenode.props.prefix);

    public
     readonly
     ?[string](#language.types.string)
      [$localName](#domnamespacenode.props.localname);

    public
     readonly
     ?[string](#language.types.string)
      [$namespaceURI](#domnamespacenode.props.namespaceuri);

    public
     readonly
     [bool](#language.types.boolean)
      [$isConnected](#domnamespacenode.props.isconnected);

    public
     readonly
     ?[DOMDocument](#class.domdocument)
      [$ownerDocument](#domnamespacenode.props.ownerdocument);

    public
     readonly
     ?[DOMNode](#class.domnode)
      [$parentNode](#domnamespacenode.props.parentnode);

    public
     readonly
     ?[DOMElement](#class.domelement)
      [$parentElement](#domnamespacenode.props.parentelement);


    /* Métodos */

public [\_\_sleep](#domnamespacenode.sleep)(): [array](#language.types.array)
public [\_\_wakeup](#domnamespacenode.wakeup)(): [void](language.types.void.html)

}

## Propiedades

     nodeName


       El nombre calificado de este nodo.






     nodeValue


       El URI del espacio de nombres declarado por este nodo, o **[null](#constant.null)** si el espacio de nombres está vacío.






     nodeType


       El tipo de nodo. En este caso, devuelve
       [
        **<a href="#constant.xml-namespace-decl-node">XML_NAMESPACE_DECL_NODE](#dom.constants)**
       </a>.






     prefix


       El prefijo del espacio de nombres declarado por este nodo.






     localName


       La parte local del nombre calificado de este nodo.






     namespaceURI


       El URI del espacio de nombres declarado por este nodo, o **[null](#constant.null)** si no está especificado.






     isConnected


       Si el nodo está conectado a un documento.






     ownerDocument


       El objeto [DOMDocument](#class.domdocument) asociado a este nodo,
       o **[null](#constant.null)** si este nodo es un [DOMDocument](#class.domdocument).






     parentNode


       El padre de este nodo.
       Si no hay tal nodo, devuelve **[null](#constant.null)**.






     parentElement


       La clase padre de este nodo.
       Si no hay tal clase, devuelve **[null](#constant.null)**.





## Historial de cambios

       Versión
       Descripción






       8.3.0

        Las propiedades [DOMNameSpaceNode::$parentElement](#domnamespacenode.props.parentelement), y
        [DOMNameSpaceNode::$isConnected](#domnamespacenode.props.isconnected) han sido añadidas.





# DOMNameSpaceNode::\_\_sleep

(PHP 8 &gt;= 8.1.25)

DOMNameSpaceNode::\_\_sleep — Prohíbe la serialización a menos que los métodos de serialización estén implementados en una subclase

### Descripción

public **DOMNameSpaceNode::\_\_sleep**(): [array](#language.types.array)

Prohíbe la serialización a menos que los métodos de serialización estén implementados en una subclase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El método lanza siempre una excepción.

### Errores/Excepciones

Lanza una [Error](#class.error) cuando es llamada.

# DOMNameSpaceNode::\_\_wakeup

(PHP 8 PHP 8 &gt;= 8.1.25)

DOMNameSpaceNode::\_\_wakeup — Prohíbe la deserialización a menos que los métodos de deserialización estén implementados en una subclase

### Descripción

public **DOMNameSpaceNode::\_\_wakeup**(): [void](language.types.void.html)

Prohíbe la deserialización a menos que los métodos de deserialización estén implementados en una subclase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El método siempre lanza una excepción.

### Errores/Excepciones

Lanza una [Error](#class.error) cuando es llamada.

## Tabla de contenidos

- [DOMNameSpaceNode::\_\_sleep](#domnamespacenode.sleep) — Prohíbe la serialización a menos que los métodos de serialización estén implementados en una subclase
- [DOMNameSpaceNode::\_\_wakeup](#domnamespacenode.wakeup) — Prohíbe la deserialización a menos que los métodos de deserialización estén implementados en una subclase

# La clase [DOMNode](#class.domnode)

(PHP 5, PHP 7, PHP 8)

## Sinopsis de la Clase

     class **DOMNode**
     {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected) = 0x1;

    public
     const
     [int](#language.types.integer)
      [DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding) = 0x2;

    public
     const
     [int](#language.types.integer)
      [DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following) = 0x4;

    public
     const
     [int](#language.types.integer)
      [DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains) = 0x8;

    public
     const
     [int](#language.types.integer)
      [DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by) = 0x10;

    public
     const
     [int](#language.types.integer)
      [DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific) = 0x20;


    /* Propiedades */
    public
     readonly
     [string](#language.types.string)
      [$nodeName](#domnode.props.nodename);

    public
     ?[string](#language.types.string)
      [$nodeValue](#domnode.props.nodevalue);

    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#domnode.props.nodetype);

    public
     readonly
     ?[DOMNode](#class.domnode)
      [$parentNode](#domnode.props.parentnode);

    public
     readonly
     ?[DOMElement](#class.domelement)
      [$parentElement](#domnode.props.parentelement);

    public
     readonly
     [DOMNodeList](#class.domnodelist)
      [$childNodes](#domnode.props.childnodes);

    public
     readonly
     ?[DOMNode](#class.domnode)
      [$firstChild](#domnode.props.firstchild);

    public
     readonly
     ?[DOMNode](#class.domnode)
      [$lastChild](#domnode.props.lastchild);

    public
     readonly
     ?[DOMNode](#class.domnode)
      [$previousSibling](#domnode.props.previoussibling);

    public
     readonly
     ?[DOMNode](#class.domnode)
      [$nextSibling](#domnode.props.nextsibling);

    public
     readonly
     ?[DOMNamedNodeMap](#class.domnamednodemap)
      [$attributes](#domnode.props.attributes);

    public
     readonly
     [bool](#language.types.boolean)
      [$isConnected](#domnode.props.isconnected);

    public
     readonly
     ?[DOMDocument](#class.domdocument)
      [$ownerDocument](#domnode.props.ownerdocument);

    public
     readonly
     ?[string](#language.types.string)
      [$namespaceURI](#domnode.props.namespaceuri);

    public
     [string](#language.types.string)
      [$prefix](#domnode.props.prefix);

    public
     readonly
     ?[string](#language.types.string)
      [$localName](#domnode.props.localname);

    public
     readonly
     ?[string](#language.types.string)
      [$baseURI](#domnode.props.baseuri);

    public
     [string](#language.types.string)
      [$textContent](#domnode.props.textcontent);


    /* Métodos */

public [appendChild](#domnode.appendchild)([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [C14N](#domnode.c14n)(
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)
public [C14NFile](#domnode.c14nfile)(
    [string](#language.types.string) $uri,
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)
public [cloneNode](#domnode.clonenode)([bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [compareDocumentPosition](#domnode.comparedocumentposition)([DOMNode](#class.domnode) $other): [int](#language.types.integer)
public [contains](#domnode.contains)([DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null) $other): [bool](#language.types.boolean)
public [getLineNo](#domnode.getlineno)(): [int](#language.types.integer)
public [getNodePath](#domnode.getnodepath)(): [?](#language.types.null)[string](#language.types.string)
public [getRootNode](#domnode.getrootnode)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [DOMNode](#class.domnode)
public [hasAttributes](#domnode.hasattributes)(): [bool](#language.types.boolean)
public [hasChildNodes](#domnode.haschildnodes)(): [bool](#language.types.boolean)
public [insertBefore](#domnode.insertbefore)([DOMNode](#class.domnode) $node, [?](#language.types.null)[DOMNode](#class.domnode) $child = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [isDefaultNamespace](#domnode.isdefaultnamespace)([string](#language.types.string) $namespaceURI): [bool](#language.types.boolean)
public [isEqualNode](#domnode.isequalnode)([?](#language.types.null)[DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [isSameNode](#domnode.issamenode)([DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [isSupported](#domnode.issupported)([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)
public [lookupNamespaceURI](#domnode.lookupnamespaceuri)([?](#language.types.null)[string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)
public [lookupPrefix](#domnode.lookupprefix)([string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)
public [normalize](#domnode.normalize)(): [void](language.types.void.html)
public [removeChild](#domnode.removechild)([DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [replaceChild](#domnode.replacechild)([DOMNode](#class.domnode) $node, [DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [\_\_sleep](#domnode.sleep)(): [array](#language.types.array)
public [\_\_wakeup](#domnode.wakeup)(): [void](language.types.void.html)

}

## Constantes predefinidas

      **[DOMNode::DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected)**



       Definido cuando el otro nódo y el nódo de referencia no están en el mismo árbol.





      **[DOMNode::DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding)**



       Definido cuando el otro nódo precede al nódo de referencia.





      **[DOMNode::DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following)**



       Definido cuando el otro nódo sigue al nódo de referencia.





      **[DOMNode::DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains)**



       Definido cuando el otro nódo es un ancestro del nódo de referencia.





      **[DOMNode::DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by)**



       Definido cuando el otro nódo es un descendiente del nódo de referencia.





      **[DOMNode::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific)**



       Definido cuando el resultado depende de un comportamiento específico de la implementación y
       puede no ser portable.
       Esto puede ocurrir con nódulos desconectados o con nódulos de atributos.



## Propiedades

     nodeName

      Devuelve el nombre más preciso para el tipo de nódo actual.





     nodeValue


       El valor de este nódo, según su tipo.
       A diferencia de las especificaciones W3C, el valor del nódo de los
       nódulos [DOMElement](#class.domelement) es igual a
       [DOMNode::textContent](#domnode.props.textcontent)
       en lugar de **[null](#constant.null)**.






     nodeType

      Recupera el tipo del nódo. Una de las [constantes XML_*_NODE](#dom.constants)





     parentNode

      El padre de este nódo. Si este tipo de nódo no existe, esto devolverá **[null](#constant.null)**.





     parentElement

      El elemento padre de este elemento. Si no hay tal elemento, esto devuelve **[null](#constant.null)**.





     childNodes


       Un [DOMNodeList](#class.domnodelist) que contiene todos los hijos
       de este nódo. Si no hay hijos, será un
       [DOMNodeList](#class.domnodelist) vacío.






     firstChild


       El primer hijo de este nódo. Si no hay nódo de este tipo,
       devuelve **[null](#constant.null)**.






     lastChild

      El último hijo de este nódo. Si no hay nódo de este tipo,
       devuelve **[null](#constant.null)**.





     previousSibling


       El nódo que precede inmediatamente a este nódo. Si no hay
       nódo, devuelve **[null](#constant.null)**.






     nextSibling


       El nódo que sigue inmediatamente a este nódo. Si no hay nódo,
       devuelve **[null](#constant.null)**.






     attributes


       Un [DOMNamedNodeMap](#class.domnamednodemap) que contiene los atributos
       de este nódo (si es un [DOMElement](#class.domelement))
       o **[null](#constant.null)** en caso contrario.






     isConnected

      Si el nódo está conectado a un documento o no.





     ownerDocument

      El objeto [DOMDocument](#class.domdocument) asociado con este nódo, o **[null](#constant.null)** si este nódo no tiene un documento asociado (p. ej., si está separado o es un [DOMDocument](#class.domdocument)).





     namespaceURI

      El espacio de nombres de la URL para este nódo, o **[null](#constant.null)** si no está especificado.





     prefix

      El prefijo del espacio de nombres de este nódo.





     localName

      Devuelve la parte local del nombre cualificado del nódo.





     baseURI


       La base de la URL absoluta del nódo, o **[null](#constant.null)** si la implementación
       no ha logrado obtener la URL absoluta.






     textContent

      El contenido textual de este nódo y sus descendientes.




## Historial de cambios

       Versión
       Descripción






       8.4.0

        El método [DOMNode::compareDocumentPosition()](#domnode.comparedocumentposition) ha sido añadido.




       8.4.0

        Las constantes **[DOMNode::DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected)**,
        **[DOMNode::DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding)**,
        **[DOMNode::DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following)**,
        **[DOMNode::DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains)**,
        **[DOMNode::DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by)**,
        y **[DOMNode::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific)**
        han sido añadidas.




       8.3.0

        Los métodos [DOMNode::contains()](#domnode.contains) y
        [DOMNode::isEqualNode()](#domnode.isequalnode) han sido añadidos.




       8.3.0

        Las propiedades [DOMNode::$parentElement](#domnode.props.parentelement), y
        [DOMNode::$isConnected](#domnode.props.isconnected) han sido añadidas.




       8.0.0

        Los métodos no implementados
        [DOMNode::compareDocumentPosition()](#domnode.comparedocumentposition),
        [DOMNode::isEqualNode()](#domnode.isequalnode),
        **DOMNode::getFeature()**,
        **DOMNode::setUserData()** y
        **DOMNode::getUserData()**
        han sido eliminados.





## Notas

**Nota**:

La extensión DOM utiliza el codificado UTF-8. Utilice [mb_convert_encoding()](#function.mb-convert-encoding),
[UConverter::transcode()](#uconverter.transcode), o [iconv()](#function.iconv) para manipular otros codificados.

## Ver también

     - [» La especificación W3C de un nódo](http://www.w3.org/TR/2003/WD-DOM-Level-3-Core-20030226/DOM3-Core.html#core-ID-1950641247)

# DOMNode::appendChild

(PHP 5, PHP 7, PHP 8)

DOMNode::appendChild —
Añade un nuevo hijo al final de los hijos

### Descripción

public **DOMNode::appendChild**([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)

Esta función agrega un hijo a una lista existente de hijos o crea una nueva lista de hijos.
El hijo se puede crear con, p.ej.,
[DOMDocument::createElement()](#domdocument.createelement),
[DOMDocument::createTextNode()](#domdocument.createtextnode) etc. o simplemente usando
cualquier otro nodo.

Si se utiliza un nodo existente, éste se desplazará.

### Parámetros

     node


       El hijo añadido.





### Valores devueltos

El nodo añadido o **[false](#constant.false)** en caso de error.

### Errores/Excepciones

     **[DOM_NO_MODIFICATION_ALLOWED_ERR](#constant.dom-no-modification-allowed-err)**


       Lanzado si este nodo es de sólo lectura o si el padre previo del nodo
       a ser insertado es de sólo lectura.






     **[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**


       Lanzado si este nodo es de un tipo de no permite hijos del tipo
       del nodo node, o si el nodo a
       añadir es uno de los progenitores del nodo o si es el nodo en sí.






     **[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**


       Lanzado si node fue creado desde un documento
       diferente del que creó este nodo.





### Ejemplos

El siguiente ejemplo añadirá un nuevo nodo elemento a un nuevo documento.

    **Ejemplo #1 Añadiendo un hijo**

&lt;?php

$doc = new DOMDocument;

$nodo = $doc-&gt;createElement("para");
$nuevo_nodo = $doc-&gt;appendChild($nodo);

echo $doc-&gt;saveXML();
?&gt;

    **Ejemplo #2 Hijos anidados**

&lt;?php

$doc = new DOMDocument;

$headNode = $doc-&gt;createElement("head");
$doc-&gt;appendChild($headNode);

$titleNode = $doc-&gt;createElement("title");
$headNode-&gt;appendChild($titleNode);

echo $doc-&gt;saveXML();
?&gt;

### Ver también

    - [DOMChildNode::after()](#domchildnode.after) - Añade nodos después del nodo

    - [DOMNode::insertBefore()](#domnode.insertbefore) - Añade un nuevo hijo antes de un nodo de referencia.

    - [DOMNode::removeChild()](#domnode.removechild) - Elimina un hijo de la lista de hijos

    - [DOMNode::replaceChild()](#domnode.replacechild) - Reemplaza un hijo

# DOMNode::C14N

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DOMNode::C14N — Canoniza nodos en una cadena

### Descripción

public **DOMNode::C14N**(
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)

Canoniza nodos en una cadena de caracteres.

### Parámetros

    exclusive


      Activa el análisis de los únicos nodos correspondientes al XPath
      o a los prefijos de espacio de nombres proporcionados.






    withComments


      Conserva los comentarios en la salida.






    xpath


Un array de XPaths para filtrar los nodos.
Cada entrada en este array es un array asociativo con:

    -

      Una clave query requerida que contiene la expresión XPath como cadena de caracteres.



    -

      Una clave namespaces opcional que contiene un array que mapea los prefijos del espacio de nombres (claves) a los URI del espacio de nombres (valores).








    nsPrefixes


      Un array de prefijos de espacios de nombres utilizados para
      filtrar los nodos.


### Valores devueltos

Devuelve los nodos canonizados, en forma de una [string](#language.types.string)
o **[false](#constant.false)** si ocurre un error

### Ejemplos

    **Ejemplo #1 Ejemplo con una consulta XPath**



     Este ejemplo demuestra un uso avanzado mediante la canonicalización y el filtrado de nodos a través de una consulta XPath.

&lt;?php

$dom = new DOMDocument();
$dom-&gt;loadXML(&lt;&lt;&lt;XML
&lt;root xmlns:food="urn:food"&gt;
&lt;!-- declaración de espacio de nombres redundante que será canonizada --&gt;
&lt;food:fruit xmlns:food="urn:food"&gt;Pomme&lt;/food:fruit&gt;
&lt;food:fruit&gt;Orange&lt;/food:fruit&gt;
&lt;food:fruit&gt;Poire&lt;/food:fruit&gt;
&lt;!-- vegetales aquí --&gt;
&lt;food:vegetable&gt;Laitue&lt;/food:vegetable&gt;
&lt;/root&gt;
XML);

echo $dom-&gt;C14N(true, false, [
"query" =&gt; ".//f:fruit|.//f:fruit/text()",
"namespaces" =&gt; ["f" =&gt; "urn:food"],
]);
?&gt;

    El ejemplo anterior mostrará:

&lt;food:fruit&gt;Pomme&lt;/food:fruit&gt;&lt;food:fruit&gt;Orange&lt;/food:fruit&gt;&lt;food:fruit&gt;Poire&lt;/food:fruit&gt;

### Ver también

    - [DOMNode::C14NFile()](#domnode.c14nfile) - Canoniza nodos en archivo

# DOMNode::C14NFile

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DOMNode::C14NFile — Canoniza nodos en archivo

### Descripción

public **DOMNode::C14NFile**(
    [string](#language.types.string) $uri,
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)

Canoniza nodos en archivo.

### Parámetros

    uri


      Ruta hacia la cual se creará el archivo.






    exclusive


      Activa el análisis de los únicos nodos correspondientes al xpath o
      prefijos de espacio de nombres proporcionados.






    withComments


      Conserva los comentarios en la salida.






    xpath


Un array de XPaths para filtrar los nodos.
Cada entrada en este array es un array asociativo con:

    -

      Una clave query requerida que contiene la expresión XPath como cadena de caracteres.



    -

      Una clave namespaces opcional que contiene un array que mapea los prefijos del espacio de nombres (claves) a los URI del espacio de nombres (valores).








    nsPrefixes


      Un array de prefijos de espacio de nombres utilizados para
      filtrar los nodos.


### Valores devueltos

Número de bytes escritos
o **[false](#constant.false)** si ocurre un error

### Ver también

    - [DOMNode::C14N()](#domnode.c14n) - Canoniza nodos en una cadena

# DOMNode::cloneNode

(PHP 5, PHP 7, PHP 8)

DOMNode::cloneNode —
Clona un nodo

### Descripción

public **DOMNode::cloneNode**([bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)

Crea una copia del nodo.

### Parámetros

     deep


       Indica si copiar todos los nodos descendientes. Este parámetro es
       **[false](#constant.false)** de manera predeterminada.





### Valores devueltos

El nodo clonado.

# DOMNode::compareDocumentPosition

(PHP 8 &gt;= 8.4.0)

DOMNode::compareDocumentPosition — Comparar la posición de dos nodos

### Descripción

public **DOMNode::compareDocumentPosition**([DOMNode](#class.domnode) $other): [int](#language.types.integer)

Compara la posición del otro nodo con respecto a este nodo.

### Parámetros

    other


      El nodo cuya posición debe ser comparada, con respecto a este nodo.


### Valores devueltos

Una máscara de bits de las constantes
**[DOMNode::DOCUMENT*POSITION*\*](#domnode.constants.document-position-disconnected)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMNode::compareDocumentPosition()**

&lt;?php
$xml = &lt;&lt;&lt;XML
&lt;root&gt;
&lt;child1/&gt;
&lt;child2/&gt;
&lt;/root&gt;
XML;

$dom = new DOMDocument();
$dom-&gt;loadXML($xml);

$root = $dom-&gt;documentElement;
$child1 = $root-&gt;firstElementChild;
$child2 = $child1-&gt;nextElementSibling;

var_dump($root-&gt;compareDocumentPosition($child1));
var_dump($child2-&gt;compareDocumentPosition($child1));
?&gt;

El ejemplo anterior mostrará:

int(20) // Esto es DOMNode::DOCUMENT_POSITION_CONTAINED_BY | DOMNode::DOCUMENT_POSITION_FOLLOWING
int(2) // Esto es DOMNode::DOCUMENT_POSITION_PRECEDING

# DOMNode::contains

(PHP 8 &gt;= 8.3.0)

DOMNode::contains — Verifica si un nodo contiene otro nodo

### Descripción

public **DOMNode::contains**([DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null) $other): [bool](#language.types.boolean)

Verifica si el nodo contiene el otro nodo other.

### Parámetros

     other


       El nodo a verificar.





### Valores devueltos

Devuelve **[true](#constant.true)** si el nodo contiene el nodo other, en caso contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMNode::contains()**

&lt;?php

$dom = new DOMDocument();
$dom-&gt;loadXML(&lt;&lt;&lt;XML
&lt;!DOCTYPE HTML&gt;
&lt;html&gt;
&lt;body&gt;
&lt;main&gt;
&lt;p&gt;Hello, world!&lt;/p&gt;
&lt;/main&gt;
&lt;/body&gt;
&lt;/html&gt;
XML);

$xpath = new DOMXPath($dom);
$main = $xpath-&gt;query("//main")[0];

var_dump($dom-&gt;documentElement-&gt;contains($main));
?&gt;

El ejemplo anterior mostrará:

bool(true)

# DOMNode::getLineNo

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DOMNode::getLineNo — Obtiene el número de línea de un nodo

### Descripción

public **DOMNode::getLineNo**(): [int](#language.types.integer)

Obtiene el número de línea en el que el nodo
fue definido durante el análisis.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de línea en el que el nodo
fue definido durante el análisis.
Si el nodo fue creado manualmente, el valor devuelto será 0.

### Ejemplos

    **Ejemplo #1 Ejemplo con DOMNode::getLineNo()**

&lt;?php
// XML de ejemplo
$xml = &lt;&lt;&lt;XML
&lt;?xml version="1.0" encoding="ISO-8859-1"?&gt;
&lt;root&gt;
&lt;node /&gt;
&lt;/root&gt;
XML;

// Creación de un objeto DOMDocument
$dom = new DOMDocument;

// Carga del XML
$dom-&gt;loadXML($xml);

// Muestra el número de línea del nodo.
printf('El nodo &lt;node&gt; está definido en la línea %d', $dom-&gt;getElementsByTagName('node')-&gt;item(0)-&gt;getLineNo());
?&gt;

    El ejemplo anterior mostrará:

El nodo &lt;node&gt; está definido en la línea 3

# DOMNode::getNodePath

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

DOMNode::getNodePath — Obtener un XPath de un nodo

### Descripción

public **DOMNode::getNodePath**(): [?](#language.types.null)[string](#language.types.string)

Obtiene una ruta de ubicación XPath del nodo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [string](#language.types.string) que contiene el XPath, o **[null](#constant.null)** en caso de error.

### Ejemplos

    **Ejemplo #1 Ejemplo de DOMNode::getNodePath()**

&lt;?php
// Crear una nueva instancia de DOMDocument
$dom = new DOMDocument;

// Cargar el XML
$dom-&gt;loadXML('
&lt;frutas&gt;
&lt;manzanas&gt;
&lt;manzana&gt;braeburn&lt;/manzana&gt;
&lt;manzana&gt;granny smith&lt;/manzana&gt;
&lt;/manzanas&gt;
&lt;peras&gt;
&lt;pera&gt;conference&lt;/pera&gt;
&lt;/peras&gt;
&lt;/frutas&gt;
');

// Imprimir el XPath para cada elemento
foreach ($dom-&gt;getElementsByTagName('\*') as $nodo) {
echo $nodo-&gt;getNodePath() . "\n";
}
?&gt;

    El ejemplo anterior mostrará:

/frutas
/frutas/manzanas
/frutas/manzanas/manzana[1]
/frutas/manzanas/manzana[2]
/frutas/peras
/frutas/peras/pera

### Ver también

    - [DOMXPath](#class.domxpath)

# DOMNode::getRootNode

(PHP 8 &gt;= 8.3.0)

DOMNode::getRootNode — Devuelve el nodo raíz

### Descripción

public **DOMNode::getRootNode**([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [DOMNode](#class.domnode)

Devuelve el nodo raíz.

### Parámetros

     options


       Este argumento no tiene efecto aún.





### Valores devueltos

Devuelve el nodo raíz.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMNode::getRootNode()**

&lt;?php

$dom = new DOMDocument();
$dom-&gt;loadXML('&lt;?xml version="1.0"?&gt;&lt;html&gt;&lt;body/&gt;&lt;/html&gt;');

var_dump($dom-&gt;documentElement-&gt;firstElementChild-&gt;getRootNode() === $dom);
?&gt;

El ejemplo anterior mostrará:

bool(true)

# DOMNode::hasAttributes

(PHP 5, PHP 7, PHP 8)

DOMNode::hasAttributes —
Comprueba si un nodo tiene atributos

### Descripción

public **DOMNode::hasAttributes**(): [bool](#language.types.boolean)

Este método comprueba si el nodo tiene atributos. El nodo comprobado tiene que ser
un **[XML_ELEMENT_NODE](#constant.xml-element-node)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [DOMNode::hasChildNodes()](#domnode.haschildnodes) - Comprueba si el nodo tiene hijos

# DOMNode::hasChildNodes

(PHP 5, PHP 7, PHP 8)

DOMNode::hasChildNodes —
Comprueba si el nodo tiene hijos

### Descripción

public **DOMNode::hasChildNodes**(): [bool](#language.types.boolean)

Esta función comprueba si el nodo tiene hijos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [DOMNode::hasAttributes()](#domnode.hasattributes) - Comprueba si un nodo tiene atributos

# DOMNode::insertBefore

(PHP 5, PHP 7, PHP 8)

DOMNode::insertBefore —
Añade un nuevo hijo antes de un nodo de referencia.

### Descripción

public **DOMNode::insertBefore**([DOMNode](#class.domnode) $node, [?](#language.types.null)[DOMNode](#class.domnode) $child = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)

Esta función inserta un nuevo nodo justo antes del nodo de referencia.
Si se planea realizar modificaciones posteriores en el hijo añadido, debe
utilizarse el nodo devuelto.

Al utilizar un nodo existente, este será movido.

### Parámetros

     node


       El nuevo nodo.






     child


       El nodo referenciado. Si no se especifica, node
       será añadido a los hijos.





### Valores devueltos

El nodo insertado o **[false](#constant.false)** en caso de error.

### Errores/Excepciones

     **[DOM_NO_MODIFICATION_ALLOWED_ERR](#constant.dom-no-modification-allowed-err)**


       Lanzado si el nodo es de solo lectura o si el padre anterior al nodo a
       insertar es de solo lectura.






     **[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**


       Lanzado si este nodo es de un tipo que no permite hijos del tipo del nodo
       node, o si el nodo a añadir es uno de los ancestros
       de este nodo o este nodo mismo.






     **[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**


       Lanzado si node ha sido creado desde un documento
       diferente al que ha creado este nodo.






     **[DOM_NOT_FOUND_ERR](#constant.dom-not-found-err)**


       Lanzado si child no es un hijo de este nodo.





### Ver también

    - [DOMNode::appendChild()](#domnode.appendchild) - Añade un nuevo hijo al final de los hijos

# DOMNode::isDefaultNamespace

(PHP 5, PHP 7, PHP 8)

DOMNode::isDefaultNamespace — Comprueba si la URI del espacio de nombres especificada es el espacio de nombres predeterminado

### Descripción

public **DOMNode::isDefaultNamespace**([string](#language.types.string) $namespaceURI): [bool](#language.types.boolean)

Indica si namespace es el espacio de nombres especificado.

### Parámetros

     namespace


       La URI del espacio de nombres a buscar.





### Valores devueltos

Devuelve **[true](#constant.true)** si namespace es el espacio de nombres
predeterminado, **[false](#constant.false)** si no.

# DOMNode::isEqualNode

(PHP 8 &gt;= 8.3.0)

DOMNode::isEqualNode — Comprueba si los dos nodos son iguales

### Descripción

public **DOMNode::isEqualNode**([?](#language.types.null)[DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)

Comprueba si los dos nodos son iguales.

### Parámetros

     otherNode


       El nodo.





### Valores devueltos

Devuelve **[true](#constant.true)** si los dos nodos son iguales, en caso contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMNode::isEqualNode()**

&lt;?php

$dom1 = (new DOMDocument())-&gt;createElement('h1', 'Hello World!');
$dom2 = (new DOMDocument())-&gt;createElement('h1', 'Hello World!');

var_dump($dom1-&gt;isEqualNode($dom2));
?&gt;

El ejemplo anterior mostrará:

bool(true)

# DOMNode::isSameNode

(PHP 5, PHP 7, PHP 8)

DOMNode::isSameNode —
Indica si dos nodos son el mismo nodo

### Descripción

public **DOMNode::isSameNode**([DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)

Esta función indica si dos nodos son el mismo nodo.
La comparación _no_ está basada en el contenido

### Parámetros

     otherNode


       El nodo comparado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# DOMNode::isSupported

(PHP 5, PHP 7, PHP 8)

DOMNode::isSupported —
Comprueba si una característica está soportada para la versión especificada

### Descripción

public **DOMNode::isSupported**([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)

Comprueba si la característica solicitada dada por feature está soportada
para la versión especificada dada por version.

### Parámetros

     feature


       La característica a comprobar. Véase el ejemplo de
       [DOMImplementation::hasFeature()](#domimplementation.hasfeature) para una
       lista de características.






     version


       El número de versión de feature a comprobar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [DOMImplementation::hasFeature()](#domimplementation.hasfeature) - Verifica si la implementación DOM implementa una funcionalidad específica

# DOMNode::lookupNamespaceURI

(PHP 5, PHP 7, PHP 8)

DOMNode::lookupNamespaceURI —
Obtiene la URI del espacio de nombres del nodo basado en el prefijo

### Descripción

public **DOMNode::lookupNamespaceURI**([?](#language.types.null)[string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)

Obtiene la URI del espacio de nombres del nodo basado en
prefix.

### Parámetros

     prefix


       El prefijo a buscar. Si este parámetro es **[null](#constant.null)**, el método devolverá el URI del espacio de nombres por defecto, si existe.





### Valores devueltos

Devuelve el URI del espacio de nombres asociado o **[null](#constant.null)** si no se encuentra ninguno.

### Ver también

    - [DOMNode::lookupPrefix()](#domnode.lookupprefix) - Devuelve el prefijo del espacio de nombres según el URI del espacio de nombres

# DOMNode::lookupPrefix

(PHP 5, PHP 7, PHP 8)

DOMNode::lookupPrefix —
Devuelve el prefijo del espacio de nombres según el URI del espacio de nombres

### Descripción

public **DOMNode::lookupPrefix**([string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)

Devuelve el prefijo del espacio del nodo según el URI del espacio de nombres.

### Parámetros

     namespace


       El URI del espacio de nombres.





### Valores devueltos

El prefijo del espacio de nombres o **[null](#constant.null)** en caso de error.

### Ver también

    - [DOMNode::lookupNamespaceUri()](#domnode.lookupnamespaceuri) - Obtiene la URI del espacio de nombres del nodo basado en el prefijo

# DOMNode::normalize

(PHP 5, PHP 7, PHP 8)

DOMNode::normalize —
Normaliza el nodo

### Descripción

public **DOMNode::normalize**(): [void](language.types.void.html)

Elimina nodos de texto vacíos y une nodos de texto adyacentes en este nodo y todos
sus hijos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

    -
     [» La Especificación DOM](http://www.w3.org/TR/2003/WD-DOM-Level-3-Core-20030226/DOM3-Core.html#core-ID-normalize)


    - [DOMDocument::normalizeDocument()](#domdocument.normalizedocument) - Normaliza el documento

# DOMNode::removeChild

(PHP 5, PHP 7, PHP 8)

DOMNode::removeChild —
Elimina un hijo de la lista de hijos

### Descripción

public **DOMNode::removeChild**([DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)

Esta función elimina un hijo de la lista de hijos.

### Parámetros

     child


       El hijo a eliminar.





### Valores devueltos

Si el hijo no puede ser eliminado, la función devuelve el antiguo hijo o **[false](#constant.false)** en caso de error.

### Errores/Excepciones

     **[DOM_NO_MODIFICATION_ALLOWED_ERR](#constant.dom-no-modification-allowed-err)**


       Lanzado si el nodo es de solo lectura.






     **[DOM_NOT_FOUND_ERR](#constant.dom-not-found-err)**


       Lanzado si child no es un hijo
       de este nodo.





### Ejemplos

El siguiente ejemplo elimina el elemento chapter de nuestro
documento XML.

    **Ejemplo #1 Eliminación de un hijo**

&lt;?php

$doc = new DOMDocument;
$doc-&gt;load('examples/book-docbook.xml');

$book = $doc-&gt;documentElement;

// Se recupera el capítulo y se elimina del libro
$chapter = $book-&gt;getElementsByTagName('chapter')-&gt;item(0);
$oldchapter = $book-&gt;removeChild($chapter);

echo $doc-&gt;saveXML();
?&gt;

    El ejemplo anterior mostrará:

&lt;?xml version="1.0" encoding="iso-8859-1"?&gt;
&lt;!DOCTYPE book PUBLIC "-//OASIS//DTD DocBook XML V4.1.2//EN"
"http://www.oasis-open.org/docbook/xml/4.1.2/docbookx.dtd"&gt;
&lt;book id="listing"&gt;
&lt;title&gt;My lists&lt;/title&gt;

&lt;/book&gt;

### Ver también

    - [DOMChildNode::remove()](#domchildnode.remove) - Elimina el nodo

    - [DOMNode::appendChild()](#domnode.appendchild) - Añade un nuevo hijo al final de los hijos

    - [DOMNode::replaceChild()](#domnode.replacechild) - Reemplaza un hijo

# DOMNode::replaceChild

(PHP 5, PHP 7, PHP 8)

DOMNode::replaceChild —
Reemplaza un hijo

### Descripción

public **DOMNode::replaceChild**([DOMNode](#class.domnode) $node, [DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)

Esta función reemplaza el hijo child
por el nuevo nodo especificado. Si node ya es un hijo, no
será añadido una segunda vez. Si el reemplazo tiene éxito, el nodo antiguo
será devuelto.

### Parámetros

     node


       El nuevo nodo. Debe ser miembro del documento destino, es decir,
       creado por una de las métodos de DOMDocument-&gt;createXXX() o importado
       en el documento por [DOMDocument::importNode](#domdocument.importnode).






     child


       El nodo antiguo.





### Valores devueltos

El nodo antiguo o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

     **[DOM_NO_MODIFICATION_ALLOWED_ERR](#constant.dom-no-modification-allowed-err)**


       Lanzado si el nodo es de solo lectura o si el padre anterior del nodo
       a insertar es de solo lectura.






     **[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**


       Lanzado si el nodo es de un tipo que no permite hijos del tipo del nodo
       node, o si el nodo a insertar es uno
       de los ancestros de este nodo o este nodo mismo.






     **[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**


       Emitido si node ha sido creado desde un documento
       diferente al que creó este nodo.






     **[DOM_NOT_FOUND_ERR](#constant.dom-not-found-err)**


       Lanzado si child no es un hijo de este nodo.





### Ver también

    - [DOMChildNode::replaceWith()](#domchildnode.replacewith) - Reemplaza el nodo por nuevos nodos

    - [DOMNode::appendChild()](#domnode.appendchild) - Añade un nuevo hijo al final de los hijos

    - [DOMNode::removeChild()](#domnode.removechild) - Elimina un hijo de la lista de hijos

# DOMNode::\_\_sleep

(PHP 8 &gt;= 8.1.25)

DOMNode::\_\_sleep — Prohíbe la serialización a menos que los métodos de serialización se implementen en una subclase

### Descripción

public **DOMNode::\_\_sleep**(): [array](#language.types.array)

Prohíbe la serialización a menos que los métodos de serialización se implementen en una subclase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El método lanza siempre una excepción.

### Errores/Excepciones

Lanza una [Error](#class.error) cuando se llama.

# DOMNode::\_\_wakeup

(PHP 8 PHP 8 &gt;= 8.1.25)

DOMNode::\_\_wakeup — Prohíbe la deserialización a menos que los métodos de deserialización estén implementados en una subclase

### Descripción

public **DOMNode::\_\_wakeup**(): [void](language.types.void.html)

Prohíbe la deserialización a menos que los métodos de deserialización estén implementados en una subclase.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Este método siempre lanza una excepción.

### Errores/Excepciones

Lanza una excepción [Error](#class.error) cuando es llamada.

## Tabla de contenidos

- [DOMNode::appendChild](#domnode.appendchild) — Añade un nuevo hijo al final de los hijos
- [DOMNode::C14N](#domnode.c14n) — Canoniza nodos en una cadena
- [DOMNode::C14NFile](#domnode.c14nfile) — Canoniza nodos en archivo
- [DOMNode::cloneNode](#domnode.clonenode) — Clona un nodo
- [DOMNode::compareDocumentPosition](#domnode.comparedocumentposition) — Comparar la posición de dos nodos
- [DOMNode::contains](#domnode.contains) — Verifica si un nodo contiene otro nodo
- [DOMNode::getLineNo](#domnode.getlineno) — Obtiene el número de línea de un nodo
- [DOMNode::getNodePath](#domnode.getnodepath) — Obtener un XPath de un nodo
- [DOMNode::getRootNode](#domnode.getrootnode) — Devuelve el nodo raíz
- [DOMNode::hasAttributes](#domnode.hasattributes) — Comprueba si un nodo tiene atributos
- [DOMNode::hasChildNodes](#domnode.haschildnodes) — Comprueba si el nodo tiene hijos
- [DOMNode::insertBefore](#domnode.insertbefore) — Añade un nuevo hijo antes de un nodo de referencia.
- [DOMNode::isDefaultNamespace](#domnode.isdefaultnamespace) — Comprueba si la URI del espacio de nombres especificada es el espacio de nombres predeterminado
- [DOMNode::isEqualNode](#domnode.isequalnode) — Comprueba si los dos nodos son iguales
- [DOMNode::isSameNode](#domnode.issamenode) — Indica si dos nodos son el mismo nodo
- [DOMNode::isSupported](#domnode.issupported) — Comprueba si una característica está soportada para la versión especificada
- [DOMNode::lookupNamespaceURI](#domnode.lookupnamespaceuri) — Obtiene la URI del espacio de nombres del nodo basado en el prefijo
- [DOMNode::lookupPrefix](#domnode.lookupprefix) — Devuelve el prefijo del espacio de nombres según el URI del espacio de nombres
- [DOMNode::normalize](#domnode.normalize) — Normaliza el nodo
- [DOMNode::removeChild](#domnode.removechild) — Elimina un hijo de la lista de hijos
- [DOMNode::replaceChild](#domnode.replacechild) — Reemplaza un hijo
- [DOMNode::\_\_sleep](#domnode.sleep) — Prohíbe la serialización a menos que los métodos de serialización se implementen en una subclase
- [DOMNode::\_\_wakeup](#domnode.wakeup) — Prohíbe la deserialización a menos que los métodos de deserialización estén implementados en una subclase

# La clase DOMNodeList

(PHP 5, PHP 7, PHP 8)

     ## Introducción


      Representa una lista dinámica de nodos.


## Sinopsis de la Clase

      class **DOMNodeList**



      implements
       [IteratorAggregate](#class.iteratoraggregate),

      [Countable](#class.countable) {

    /* Propiedades */

     public
     readonly
     [int](#language.types.integer)
      [$length](#domnodelist.props.length);


    /* Métodos */

public [count](#domnodelist.count)(): [int](#language.types.integer)
public [getIterator](#domnodelist.getiterator)(): [Iterator](#class.iterator)
public [item](#domnodelist.item)([int](#language.types.integer) $index): [DOMElement](#class.domelement)|[DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null)

}

## Propiedades

     length


       El número de nodos en la lista. El intervalo válido
       de los índices de los nodos hijos es 0 a length - 1, inclusivo.





## Historial de cambios

        Versión
        Descripción






        8.0.0

         **DOMNodeList** implementa ahora
         [IteratorAggregate](#class.iteratoraggregate).
         Anteriormente, [Traversable](#class.traversable) era implementado en su lugar.




        7.2.0

         La interfaz [Countable](#class.countable) es implementada y
         devuelve el valor de la propiedad [length](#domnodelist.props.length).






## Notas

**Nota**:

      Los nodos en el mapa pueden ser accedidos a través de la sintaxis de array.

## Ver también

     - [» Las especificaciones W3C de NodeList](http://www.w3.org/TR/2003/WD-DOM-Level-3-Core-20030226/DOM3-Core.html#core-ID-536297177)

# DOMNodeList::count

(PHP 7 &gt;= 7.2.0, PHP 8)

DOMNodeList::count — Obtiene el número de nodos en la lista

### Descripción

public **DOMNodeList::count**(): [int](#language.types.integer)

Obtiene el número de nodos de la lista.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de nodos de la lista, que es idéntica a la propiedad
[length](#domnodelist.props.length).

# DOMNodeList::getIterator

(PHP 8)

DOMNodeList::getIterator — Devuelve un iterador externo

### Descripción

public **DOMNodeList::getIterator**(): [Iterator](#class.iterator)

Devuelve un iterador externo para la lista de nodos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Una instancia de un objeto que implementa [Iterator](#class.iterator) o
[Traversable](#class.traversable)

### Errores/Excepciones

Lanza una [Exception](#class.exception) en caso de fallo.

### Ver también

- [IteratorAggregate::getIterator()](#iteratoraggregate.getiterator) - Recuperar un Iterator o traversable externo

# DOMNodeList::item

(PHP 5, PHP 7, PHP 8)

DOMNodeList::item —
Devuelve un nodo especificado por su índice

### Descripción

public **DOMNodeList::item**([int](#language.types.integer) $index): [DOMElement](#class.domelement)|[DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null)

Devuelve un nodo especificado por su index
en el objeto [DOMNodeList](#class.domnodelist).

**Sugerencia**

    Si se necesita conocer el número de nodos en la colección, utilice
    la propiedad length del objeto
    [DOMNodeList](#class.domnodelist).

### Parámetros

     index


       El índice del nodo en la colección.





### Valores devueltos

El nodo en la posición index en la
[DOMNodeList](#class.domnodelist), o **[null](#constant.null)** si no es un
índice válido.

### Ejemplos

    **Ejemplo #1 Recorrido de todas las entradas de la tabla**

&lt;?php
$doc = new DOMDocument;
$doc-&gt;load('examples/book-docbook.xml');

$items = $doc-&gt;getElementsByTagName('entry');

for ($i = 0; $i &lt; $items-&gt;length; $i++) {
    echo $items-&gt;item($i)-&gt;nodeValue . "\n";
}
?&gt;

    **Ejemplo #2 Acceder a un elemento con la sintaxis de array**

&lt;?php
$doc = new DOMDocument;
$doc-&gt;load('examples/book-docbook.xml');

$items = $doc-&gt;getElementsByTagName('entry');

for ($i = 0; $i &lt; $items-&gt;length; $i++) {
    echo $items[$i]-&gt;nodeValue . "\n";
}

?&gt;

    **Ejemplo #3 Recorrer los elementos con [foreach](#control-structures.foreach)**

&lt;?php
$doc = new DOMDocument;
$doc-&gt;load('examples/book-docbook.xml');

$items = $doc-&gt;getElementsByTagName('entry');

foreach ($items as $item) {
echo $item-&gt;nodeValue . "\n";
}
?&gt;

    El ejemplo anterior mostrará:

Title
Author
Language
ISBN
The Grapes of Wrath
John Steinbeck
en
0140186409
The Pearl
John Steinbeck
en
014017737X
Samarcande
Amine Maalouf
fr
2253051209

## Tabla de contenidos

- [DOMNodeList::count](#domnodelist.count) — Obtiene el número de nodos en la lista
- [DOMNodeList::getIterator](#domnodelist.getiterator) — Devuelve un iterador externo
- [DOMNodeList::item](#domnodelist.item) — Devuelve un nodo especificado por su índice

# La clase [DOMNotation](#class.domnotation)

(PHP 5, PHP 7, PHP 8)

## Sinopsis de la Clase

     class **DOMNotation**



     extends
      [DOMNode](#class.domnode)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [DOMNode::DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     [string](#language.types.string)
      [$publicId](#domnotation.props.publicid);

    public
     readonly
     [string](#language.types.string)
      [$systemId](#domnotation.props.systemid);


    /* Propiedades heredadas */
    public
     readonly
     [string](#language.types.string)
      [$nodeName](#domnode.props.nodename);

public
?[string](#language.types.string)
[$nodeValue](#domnode.props.nodevalue);
public
readonly
[int](#language.types.integer)
[$nodeType](#domnode.props.nodetype);
public
readonly
?[DOMNode](#class.domnode)
[$parentNode](#domnode.props.parentnode);
public
readonly
?[DOMElement](#class.domelement)
[$parentElement](#domnode.props.parentelement);
public
readonly
[DOMNodeList](#class.domnodelist)
[$childNodes](#domnode.props.childnodes);
public
readonly
?[DOMNode](#class.domnode)
[$firstChild](#domnode.props.firstchild);
public
readonly
?[DOMNode](#class.domnode)
[$lastChild](#domnode.props.lastchild);
public
readonly
?[DOMNode](#class.domnode)
[$previousSibling](#domnode.props.previoussibling);
public
readonly
?[DOMNode](#class.domnode)
[$nextSibling](#domnode.props.nextsibling);
public
readonly
?[DOMNamedNodeMap](#class.domnamednodemap)
[$attributes](#domnode.props.attributes);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#domnode.props.isconnected);
public
readonly
?[DOMDocument](#class.domdocument)
[$ownerDocument](#domnode.props.ownerdocument);
public
readonly
?[string](#language.types.string)
[$namespaceURI](#domnode.props.namespaceuri);
public
[string](#language.types.string)
[$prefix](#domnode.props.prefix);
public
readonly
?[string](#language.types.string)
[$localName](#domnode.props.localname);
public
readonly
?[string](#language.types.string)
[$baseURI](#domnode.props.baseuri);
public
[string](#language.types.string)
[$textContent](#domnode.props.textcontent);

    /* Métodos heredados */

public [DOMNode::appendChild](#domnode.appendchild)([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::C14N](#domnode.c14n)(
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)
public [DOMNode::C14NFile](#domnode.c14nfile)(
    [string](#language.types.string) $uri,
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)
public [DOMNode::cloneNode](#domnode.clonenode)([bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::compareDocumentPosition](#domnode.comparedocumentposition)([DOMNode](#class.domnode) $other): [int](#language.types.integer)
public [DOMNode::contains](#domnode.contains)([DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null) $other): [bool](#language.types.boolean)
public [DOMNode::getLineNo](#domnode.getlineno)(): [int](#language.types.integer)
public [DOMNode::getNodePath](#domnode.getnodepath)(): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::getRootNode](#domnode.getrootnode)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [DOMNode](#class.domnode)
public [DOMNode::hasAttributes](#domnode.hasattributes)(): [bool](#language.types.boolean)
public [DOMNode::hasChildNodes](#domnode.haschildnodes)(): [bool](#language.types.boolean)
public [DOMNode::insertBefore](#domnode.insertbefore)([DOMNode](#class.domnode) $node, [?](#language.types.null)[DOMNode](#class.domnode) $child = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::isDefaultNamespace](#domnode.isdefaultnamespace)([string](#language.types.string) $namespaceURI): [bool](#language.types.boolean)
public [DOMNode::isEqualNode](#domnode.isequalnode)([?](#language.types.null)[DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSameNode](#domnode.issamenode)([DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSupported](#domnode.issupported)([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)
public [DOMNode::lookupNamespaceURI](#domnode.lookupnamespaceuri)([?](#language.types.null)[string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::lookupPrefix](#domnode.lookupprefix)([string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::normalize](#domnode.normalize)(): [void](language.types.void.html)
public [DOMNode::removeChild](#domnode.removechild)([DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::replaceChild](#domnode.replacechild)([DOMNode](#class.domnode) $node, [DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::\_\_sleep](#domnode.sleep)(): [array](#language.types.array)
public [DOMNode::\_\_wakeup](#domnode.wakeup)(): [void](language.types.void.html)

}

## Propiedades

     publicId

      El identificador público asociado a la notación.




     systemId

      El identificador de sistema asociado a la notación.


# La interfaz DOMParentNode

(PHP 8)

## Sinopsis de la Interfaz

     interface **DOMParentNode** {

    /* Métodos */

public [append](#domparentnode.append)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [prepend](#domparentnode.prepend)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [replaceChildren](#domparentnode.replacechildren)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

}

# DOMParentNode::append

(PHP 8)

DOMParentNode::append — Añade nodos después del último nodo hijo

### Descripción

public **DOMParentNode::append**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade uno o varios nodes a la lista de hijos después del último nodo hijo.

### Parámetros

     nodes


       Los nodos a añadir.
       Las cadenas de caracteres se convierten automáticamente en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si este nodo es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin documento propietario funciona ahora.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ver también

    - [DOMParentNode::prepend()](#domparentnode.prepend) - Añade nodos antes del primer nodo hijo

# DOMParentNode::prepend

(PHP 8)

DOMParentNode::prepend — Añade nodos antes del primer nodo hijo

### Descripción

public **DOMParentNode::prepend**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade uno o varios nodes a la lista de hijos antes del primer nodo hijo.

### Parámetros

     nodes


       Los nodos a añadir.
       Las cadenas de caracteres se convierten automáticamente en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si este nodo es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin documento propietario funciona ahora.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ver también

    - [DOMParentNode::append()](#domparentnode.append) - Añade nodos después del último nodo hijo

# DOMParentNode::replaceChildren

(PHP 8 &gt;= 8.3.0)

DOMParentNode::replaceChildren — Reemplaza los hijos en un nodo

### Descripción

public **DOMParentNode::replaceChildren**([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Reemplaza los hijos en un nodo.

### Parámetros

     nodes


       Los nodos que reemplazan a los hijos.
       Las cadenas de caracteres se convierten automáticamente en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si este nodo es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Historial de cambios

      Versión
      Descripción






      8.3.0

       Llamar a este método en un nodo sin documento propietario funciona ahora.
       Anteriormente, esto desencadenaba una

[DOMException](#class.domexception) con el código
**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**.

### Ejemplos

**Ejemplo #1 Ejemplo de DOMParentNode::replaceChildren()**

&lt;?php

$dom = new DOMDocument();
$dom-&gt;loadHTML('&lt;!DOCTYPE HTML&gt;&lt;html&gt;&lt;p&gt;hi&lt;/p&gt; test &lt;p&gt;hi2&lt;/p&gt;&lt;/html&gt;');

$dom-&gt;documentElement-&gt;replaceChildren('foo', $dom-&gt;createElement('p'), 'bar');
echo $dom-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0" standalone="yes"?&gt;
&lt;!DOCTYPE HTML&gt;
&lt;html&gt;foo&lt;p/&gt;bar&lt;/html&gt;

## Tabla de contenidos

- [DOMParentNode::append](#domparentnode.append) — Añade nodos después del último nodo hijo
- [DOMParentNode::prepend](#domparentnode.prepend) — Añade nodos antes del primer nodo hijo
- [DOMParentNode::replaceChildren](#domparentnode.replacechildren) — Reemplaza los hijos en un nodo

# La clase [DOMProcessingInstruction](#class.domprocessinginstruction)

(PHP 5, PHP 7, PHP 8)

## Introducción

    Esto representa un nodo de instrucción de procesamiento (PI).
    Estos nodos están destinados a indicar zonas de datos destinadas al procesamiento por aplicaciones específicas.

## Sinopsis de la Clase

     class **DOMProcessingInstruction**



     extends
      [DOMNode](#class.domnode)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [DOMNode::DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     [string](#language.types.string)
      [$target](#domprocessinginstruction.props.target);

    public
     [string](#language.types.string)
      [$data](#domprocessinginstruction.props.data);


    /* Propiedades heredadas */
    public
     readonly
     [string](#language.types.string)
      [$nodeName](#domnode.props.nodename);

public
?[string](#language.types.string)
[$nodeValue](#domnode.props.nodevalue);
public
readonly
[int](#language.types.integer)
[$nodeType](#domnode.props.nodetype);
public
readonly
?[DOMNode](#class.domnode)
[$parentNode](#domnode.props.parentnode);
public
readonly
?[DOMElement](#class.domelement)
[$parentElement](#domnode.props.parentelement);
public
readonly
[DOMNodeList](#class.domnodelist)
[$childNodes](#domnode.props.childnodes);
public
readonly
?[DOMNode](#class.domnode)
[$firstChild](#domnode.props.firstchild);
public
readonly
?[DOMNode](#class.domnode)
[$lastChild](#domnode.props.lastchild);
public
readonly
?[DOMNode](#class.domnode)
[$previousSibling](#domnode.props.previoussibling);
public
readonly
?[DOMNode](#class.domnode)
[$nextSibling](#domnode.props.nextsibling);
public
readonly
?[DOMNamedNodeMap](#class.domnamednodemap)
[$attributes](#domnode.props.attributes);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#domnode.props.isconnected);
public
readonly
?[DOMDocument](#class.domdocument)
[$ownerDocument](#domnode.props.ownerdocument);
public
readonly
?[string](#language.types.string)
[$namespaceURI](#domnode.props.namespaceuri);
public
[string](#language.types.string)
[$prefix](#domnode.props.prefix);
public
readonly
?[string](#language.types.string)
[$localName](#domnode.props.localname);
public
readonly
?[string](#language.types.string)
[$baseURI](#domnode.props.baseuri);
public
[string](#language.types.string)
[$textContent](#domnode.props.textcontent);

    /* Métodos */

public [\_\_construct](#domprocessinginstruction.construct)([string](#language.types.string) $name, [string](#language.types.string) $value = "")

    /* Métodos heredados */
    public [DOMNode::appendChild](#domnode.appendchild)([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)

public [DOMNode::C14N](#domnode.c14n)(
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)
public [DOMNode::C14NFile](#domnode.c14nfile)(
    [string](#language.types.string) $uri,
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)
public [DOMNode::cloneNode](#domnode.clonenode)([bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::compareDocumentPosition](#domnode.comparedocumentposition)([DOMNode](#class.domnode) $other): [int](#language.types.integer)
public [DOMNode::contains](#domnode.contains)([DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null) $other): [bool](#language.types.boolean)
public [DOMNode::getLineNo](#domnode.getlineno)(): [int](#language.types.integer)
public [DOMNode::getNodePath](#domnode.getnodepath)(): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::getRootNode](#domnode.getrootnode)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [DOMNode](#class.domnode)
public [DOMNode::hasAttributes](#domnode.hasattributes)(): [bool](#language.types.boolean)
public [DOMNode::hasChildNodes](#domnode.haschildnodes)(): [bool](#language.types.boolean)
public [DOMNode::insertBefore](#domnode.insertbefore)([DOMNode](#class.domnode) $node, [?](#language.types.null)[DOMNode](#class.domnode) $child = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::isDefaultNamespace](#domnode.isdefaultnamespace)([string](#language.types.string) $namespaceURI): [bool](#language.types.boolean)
public [DOMNode::isEqualNode](#domnode.isequalnode)([?](#language.types.null)[DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSameNode](#domnode.issamenode)([DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSupported](#domnode.issupported)([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)
public [DOMNode::lookupNamespaceURI](#domnode.lookupnamespaceuri)([?](#language.types.null)[string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::lookupPrefix](#domnode.lookupprefix)([string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::normalize](#domnode.normalize)(): [void](language.types.void.html)
public [DOMNode::removeChild](#domnode.removechild)([DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::replaceChild](#domnode.replacechild)([DOMNode](#class.domnode) $node, [DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::\_\_sleep](#domnode.sleep)(): [array](#language.types.array)
public [DOMNode::\_\_wakeup](#domnode.wakeup)(): [void](language.types.void.html)

}

## Propiedades

     target

      Una cadena que representa la aplicación para la cual los datos están destinados.




     data

      Datos específicos de la aplicación.


# DOMProcessingInstruction::\_\_construct

(PHP 5, PHP 7, PHP 8)

DOMProcessingInstruction::\_\_construct —
Crea un nuevo objeto [DOMProcessingInstruction](#class.domprocessinginstruction)

### Descripción

public **DOMProcessingInstruction::\_\_construct**([string](#language.types.string) $name, [string](#language.types.string) $value = "")

Crea un nuevo objeto [DOMProcessingInstruction](#class.domprocessinginstruction).
Este objeto es de sólo lectura. Se puede añadir a un documento, pero
no se pueden añadir nodos adicionales a este nodo hata que
el nodo esté asociado con un documento. Para crear un nodo modificable, use
[DOMDocument::createProcessingInstruction](#domdocument.createprocessinginstruction).

### Parámetros

     name


       El nombre de la etiqueta de la instrucción en proceso.






     value


       El valor de la intrucción en proceso.





### Ejemplos

    **Ejemplo #1 Crear un nuevo objeto [DOMProcessingInstruction](#class.domprocessinginstruction)**

&lt;?php

$dom = new DOMDocument('1.0', 'UTF-8');
$html = $dom-&gt;appendChild(new DOMElement('html'));
$body = $html-&gt;appendChild(new DOMElement('body'));
$pinode = new DOMProcessingInstruction('php', 'echo "Hola Mundo"; ');
$body-&gt;appendChild($pinode);
echo $dom-&gt;saveXML();

?&gt;

    El ejemplo anterior mostrará:

&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;html&gt;&lt;body&gt;&lt;?php echo "Hola Mundo"; ?&gt;&lt;/body&gt;&lt;/html&gt;

### Ver también

    - [DOMDocument::createProcessingInstruction()](#domdocument.createprocessinginstruction) - Crea un nuevo nodo PI

## Tabla de contenidos

- [DOMProcessingInstruction::\_\_construct](#domprocessinginstruction.construct) — Crea un nuevo objeto DOMProcessingInstruction

# La clase DOMText

(PHP 5, PHP 7, PHP 8)

## Introducción

    La clase **DOMText** hereda de
    [DOMCharacterData](#class.domcharacterdata) y representa
    el contenido textual de [DOMElement](#class.domelement) o
    [DOMAttr](#class.domattr).

## Sinopsis de la Clase

     class **DOMText**



     extends
      [DOMCharacterData](#class.domcharacterdata)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [DOMNode::DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[DOMNode::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     [string](#language.types.string)
      [$wholeText](#domtext.props.wholetext);


    /* Propiedades heredadas */
    public
     [string](#language.types.string)
      [$data](#domcharacterdata.props.data);

public
readonly
[int](#language.types.integer)
[$length](#domcharacterdata.props.length);
public
readonly
?[DOMElement](#class.domelement)
[$previousElementSibling](#domcharacterdata.props.previouselementsibling);
public
readonly
?[DOMElement](#class.domelement)
[$nextElementSibling](#domcharacterdata.props.nextelementsibling);

    public
     readonly
     [string](#language.types.string)
      [$nodeName](#domnode.props.nodename);

public
?[string](#language.types.string)
[$nodeValue](#domnode.props.nodevalue);
public
readonly
[int](#language.types.integer)
[$nodeType](#domnode.props.nodetype);
public
readonly
?[DOMNode](#class.domnode)
[$parentNode](#domnode.props.parentnode);
public
readonly
?[DOMElement](#class.domelement)
[$parentElement](#domnode.props.parentelement);
public
readonly
[DOMNodeList](#class.domnodelist)
[$childNodes](#domnode.props.childnodes);
public
readonly
?[DOMNode](#class.domnode)
[$firstChild](#domnode.props.firstchild);
public
readonly
?[DOMNode](#class.domnode)
[$lastChild](#domnode.props.lastchild);
public
readonly
?[DOMNode](#class.domnode)
[$previousSibling](#domnode.props.previoussibling);
public
readonly
?[DOMNode](#class.domnode)
[$nextSibling](#domnode.props.nextsibling);
public
readonly
?[DOMNamedNodeMap](#class.domnamednodemap)
[$attributes](#domnode.props.attributes);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#domnode.props.isconnected);
public
readonly
?[DOMDocument](#class.domdocument)
[$ownerDocument](#domnode.props.ownerdocument);
public
readonly
?[string](#language.types.string)
[$namespaceURI](#domnode.props.namespaceuri);
public
[string](#language.types.string)
[$prefix](#domnode.props.prefix);
public
readonly
?[string](#language.types.string)
[$localName](#domnode.props.localname);
public
readonly
?[string](#language.types.string)
[$baseURI](#domnode.props.baseuri);
public
[string](#language.types.string)
[$textContent](#domnode.props.textcontent);

    /* Métodos */

public [\_\_construct](#domtext.construct)([string](#language.types.string) $data = "")

    public [isElementContentWhitespace](#domtext.iselementcontentwhitespace)(): [bool](#language.types.boolean)

public [isWhitespaceInElementContent](#domtext.iswhitespaceinelementcontent)(): [bool](#language.types.boolean)
public [splitText](#domtext.splittext)([int](#language.types.integer) $offset): [DOMText](#class.domtext)|[false](#language.types.singleton)

    /* Métodos heredados */
    public [DOMCharacterData::after](#domcharacterdata.after)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

public [DOMCharacterData::appendData](#domcharacterdata.appenddata)([string](#language.types.string) $data): [true](#language.types.singleton)
public [DOMCharacterData::before](#domcharacterdata.before)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [DOMCharacterData::deleteData](#domcharacterdata.deletedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [bool](#language.types.boolean)
public [DOMCharacterData::insertData](#domcharacterdata.insertdata)([int](#language.types.integer) $offset, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [DOMCharacterData::remove](#domcharacterdata.remove)(): [void](language.types.void.html)
public [DOMCharacterData::replaceData](#domcharacterdata.replacedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count, [string](#language.types.string) $data): [bool](#language.types.boolean)
public [DOMCharacterData::replaceWith](#domcharacterdata.replacewith)([DOMNode](#class.domnode)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [DOMCharacterData::substringData](#domcharacterdata.substringdata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [string](#language.types.string)|[false](#language.types.singleton)

    public [DOMNode::appendChild](#domnode.appendchild)([DOMNode](#class.domnode) $node): [DOMNode](#class.domnode)|[false](#language.types.singleton)

public [DOMNode::C14N](#domnode.c14n)(
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [string](#language.types.string)|[false](#language.types.singleton)
public [DOMNode::C14NFile](#domnode.c14nfile)(
    [string](#language.types.string) $uri,
    [bool](#language.types.boolean) $exclusive = **[false](#constant.false)**,
    [bool](#language.types.boolean) $withComments = **[false](#constant.false)**,
    [?](#language.types.null)[array](#language.types.array) $xpath = **[null](#constant.null)**,
    [?](#language.types.null)[array](#language.types.array) $nsPrefixes = **[null](#constant.null)**
): [int](#language.types.integer)|[false](#language.types.singleton)
public [DOMNode::cloneNode](#domnode.clonenode)([bool](#language.types.boolean) $deep = **[false](#constant.false)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::compareDocumentPosition](#domnode.comparedocumentposition)([DOMNode](#class.domnode) $other): [int](#language.types.integer)
public [DOMNode::contains](#domnode.contains)([DOMNode](#class.domnode)|[DOMNameSpaceNode](#class.domnamespacenode)|[null](#language.types.null) $other): [bool](#language.types.boolean)
public [DOMNode::getLineNo](#domnode.getlineno)(): [int](#language.types.integer)
public [DOMNode::getNodePath](#domnode.getnodepath)(): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::getRootNode](#domnode.getrootnode)([?](#language.types.null)[array](#language.types.array) $options = **[null](#constant.null)**): [DOMNode](#class.domnode)
public [DOMNode::hasAttributes](#domnode.hasattributes)(): [bool](#language.types.boolean)
public [DOMNode::hasChildNodes](#domnode.haschildnodes)(): [bool](#language.types.boolean)
public [DOMNode::insertBefore](#domnode.insertbefore)([DOMNode](#class.domnode) $node, [?](#language.types.null)[DOMNode](#class.domnode) $child = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::isDefaultNamespace](#domnode.isdefaultnamespace)([string](#language.types.string) $namespaceURI): [bool](#language.types.boolean)
public [DOMNode::isEqualNode](#domnode.isequalnode)([?](#language.types.null)[DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSameNode](#domnode.issamenode)([DOMNode](#class.domnode) $otherNode): [bool](#language.types.boolean)
public [DOMNode::isSupported](#domnode.issupported)([string](#language.types.string) $feature, [string](#language.types.string) $version): [bool](#language.types.boolean)
public [DOMNode::lookupNamespaceURI](#domnode.lookupnamespaceuri)([?](#language.types.null)[string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::lookupPrefix](#domnode.lookupprefix)([string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)
public [DOMNode::normalize](#domnode.normalize)(): [void](language.types.void.html)
public [DOMNode::removeChild](#domnode.removechild)([DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::replaceChild](#domnode.replacechild)([DOMNode](#class.domnode) $node, [DOMNode](#class.domnode) $child): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public [DOMNode::\_\_sleep](#domnode.sleep)(): [array](#language.types.array)
public [DOMNode::\_\_wakeup](#domnode.wakeup)(): [void](language.types.void.html)

}

## Propiedades

     wholeText


       Contiene todo el texto de los nodos de texto adyacentes
       (es decir, nodos que no están separados por
       etiquetas Element, Comment o Processing Instruction).





## Historial de cambios

       Versión
       Descripción






       8.0.0

        El método no implementado **DOMText::replaceWholeText()**
        ha sido eliminado.





# DOMText::\_\_construct

(PHP 5, PHP 7, PHP 8)

DOMText::\_\_construct —
Crea un nuevo objeto [DOMText](#class.domtext)

### Descripción

public **DOMText::\_\_construct**([string](#language.types.string) $data = "")

Crea un nuevo objeto [DOMText](#class.domtext).

### Parámetros

     data


       El valor del nodo de texto. Si no se proporciona, se crea un nodo de texto vacío.





### Ejemplos

    **Ejemplo #1 Crear un nuevo objeto DOMText**

&lt;?php

$dom = new DOMDocument('1.0', 'iso-8859-1');
$element = $dom-&gt;appendChild(new DOMElement('root'));
$text = $element-&gt;appendChild(new DOMText('root value'));
echo $dom-&gt;saveXML(); /_ &lt;?xml version="1.0" encoding="utf-8"?&gt;&lt;root&gt;root value&lt;/root&gt; _/

?&gt;

### Ver también

    - [DOMDocument::createTextNode()](#domdocument.createtextnode) - Crea un nuevo nodo de texto

# DOMText::isElementContentWhitespace

(No version information available, might only be in Git)

DOMText::isElementContentWhitespace — Devuelve si este nodo de texto contiene espacios en blanco en el contenido del elemento

### Descripción

public **DOMText::isElementContentWhitespace**(): [bool](#language.types.boolean)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# DOMText::isWhitespaceInElementContent

(PHP 5, PHP 7, PHP 8)

DOMText::isWhitespaceInElementContent —
Indica si este nodo de texto contiene espacios en blanco

### Descripción

public **DOMText::isWhitespaceInElementContent**(): [bool](#language.types.boolean)

Indica si este nodo de texto contiene únicamente espacios en blanco o si está vacío.
El nodo de texto está determinado a contener espacios en blanco en el contenido del
elemento durante la carga del documento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el nodo contiene cero o más carecteres espacio en blanco y
nada más. De lo contrario deveulve **[false](#constant.false)**.

# DOMText::splitText

(PHP 5, PHP 7, PHP 8)

DOMText::splitText —
Rompe este nodo en dos nodos en el índice especificado

### Descripción

public **DOMText::splitText**([int](#language.types.integer) $offset): [DOMText](#class.domtext)|[false](#language.types.singleton)

Rompe este nodo en dos nodos en el índice especificado por offset,
manteniéndolos en el árbol como hermanos.

Después de la separación, este nodo contendrá todos el contenido hata
offset. Si el nodo original tenía un nodo padre,
el nuevo nodo se inserta como el hermano siguiente del nodo original.
Cuando offset es igual a la longitud de este nodo,
el nuevo nodo no tendrá información.

### Parámetros

     offset


       El índice en el que se hace la separación, comenzando en 0.





### Valores devueltos

El nuevo nodo del mismo tipo, que contiene todo el contenido desde y después de
offset.

## Tabla de contenidos

- [DOMText::\_\_construct](#domtext.construct) — Crea un nuevo objeto DOMText
- [DOMText::isElementContentWhitespace](#domtext.iselementcontentwhitespace) — Devuelve si este nodo de texto contiene espacios en blanco en el contenido del elemento
- [DOMText::isWhitespaceInElementContent](#domtext.iswhitespaceinelementcontent) — Indica si este nodo de texto contiene espacios en blanco
- [DOMText::splitText](#domtext.splittext) — Rompe este nodo en dos nodos en el índice especificado

# La clase DOMXPath

(PHP 5, PHP 7, PHP 8)

## Introducción

    Permite utilizar consultas XPath 1.0 en documentos HTML o XML.

## Sinopsis de la Clase

     class **DOMXPath**
     {

    /* Propiedades */

     public
     readonly
     [DOMDocument](#class.domdocument)
      [$document](#domxpath.props.document);

    public
     [bool](#language.types.boolean)
      [$registerNodeNamespaces](#domxpath.props.registernodenamespaces);


    /* Métodos */

public [\_\_construct](#domxpath.construct)([DOMDocument](#class.domdocument) $document, [bool](#language.types.boolean) $registerNodeNS = **[true](#constant.true)**)

    public [evaluate](#domxpath.evaluate)([string](#language.types.string) $expression, [?](#language.types.null)[DOMNode](#class.domnode) $contextNode = **[null](#constant.null)**, [bool](#language.types.boolean) $registerNodeNS = **[true](#constant.true)**): [mixed](#language.types.mixed)

public [query](#domxpath.query)([string](#language.types.string) $expression, [?](#language.types.null)[DOMNode](#class.domnode) $contextNode = **[null](#constant.null)**, [bool](#language.types.boolean) $registerNodeNS = **[true](#constant.true)**): [mixed](#language.types.mixed)
public static [quote](#domxpath.quote)([string](#language.types.string) $str): [string](#language.types.string)
public [registerNamespace](#domxpath.registernamespace)([string](#language.types.string) $prefix, [string](#language.types.string) $namespace): [bool](#language.types.boolean)
public [registerPhpFunctionNS](#domxpath.registerphpfunctionns)([string](#language.types.string) $namespaceURI, [string](#language.types.string) $name, [callable](#language.types.callable) $callable): [void](language.types.void.html)
public [registerPhpFunctions](#domxpath.registerphpfunctions)([string](#language.types.string)|[array](#language.types.array)|[null](#language.types.null) $restrict = **[null](#constant.null)**): [void](language.types.void.html)

}

## Propiedades

     document

      El documento que está ligado a este objeto.



     registerNodeNamespaces


       Cuando se establece en **[true](#constant.true)**, los espacios de nombres en el nodo son registrados.



## Historial de cambios

       Versión
       Descripción






       8.4.0

        Ya no es posible clonar un objeto **DOMXPath**.
        Esto lanzará ahora una excepción.
        Antes de PHP 8.4.0, esto producía un objeto inutilizable.




       8.0.0

        La propiedad registerNodeNamespaces ha sido añadida.





# DOMXPath::\_\_construct

(PHP 5, PHP 7, PHP 8)

DOMXPath::\_\_construct —
Crea un nuevo objeto [DOMXPath](#class.domxpath)

### Descripción

public **DOMXPath::\_\_construct**([DOMDocument](#class.domdocument) $document, [bool](#language.types.boolean) $registerNodeNS = **[true](#constant.true)**)

Crea un nuevo objeto [DOMXPath](#class.domxpath).

### Parámetros

     document


       El objeto [DOMDocument](#class.domdocument) asociado con el objeto
       [DOMXPath](#class.domxpath).





registerNodeNS

Indica si se deben registrar automáticamente los prefijos de espacio de nombres en vigor del nodo de contexto en el objeto [DOMXPath](#class.domxpath).
Esto puede ser utilizado para evitar tener que llamar manualmente a [DOMXPath::registerNamespace()](#domxpath.registernamespace) para cada espacio de nombres en vigor.
En caso de conflicto de prefijos de espacio de nombres, solo se registra el prefijo de espacio de nombres descendiente más cercano.

# DOMXPath::evaluate

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

DOMXPath::evaluate —
Evalúa una expresión XPath dada y devuelve un resultado tipado si es posible

### Descripción

public **DOMXPath::evaluate**([string](#language.types.string) $expression, [?](#language.types.null)[DOMNode](#class.domnode) $contextNode = **[null](#constant.null)**, [bool](#language.types.boolean) $registerNodeNS = **[true](#constant.true)**): [mixed](#language.types.mixed)

Ejecuta la expresión XPath expression
y devuelve un resultado tipado si es posible.

### Parámetros

     expression


       La expresión XPath a ejecutar.






     contextNode


       El argumento opcional contextNode puede ser
       especificado para realizar consultas XPath relativas. Por omisión, las consultas
       son relativas al elemento root.





registerNodeNS

Indica si se deben registrar automáticamente los prefijos de espacio de nombres en vigor del nodo de contexto en el objeto [DOMXPath](#class.domxpath).
Esto puede ser utilizado para evitar tener que llamar manualmente a [DOMXPath::registerNamespace()](#domxpath.registernamespace) para cada espacio de nombres en vigor.
En caso de conflicto de prefijos de espacio de nombres, solo se registra el prefijo de espacio de nombres descendiente más cercano.

### Errores/Excepciones

Los siguientes errores pueden ocurrir al utilizar una expresión que invoca
retrollamadas PHP.

- Lanza una [Error](#class.error) si
  una retrollamada PHP es invocada pero ninguna retrollamada está registrada,
  o si la retrollamada nombrada no está registrada.

- Lanza una [TypeError](#class.typeerror) si
  la sintaxis php:function es utilizada y el nombre del gestor
  no es un string.

- Lanza una [Error](#class.error) si
  un objeto no-DOM es devuelto por una retrollamada.

### Valores devueltos

Devuelve un resultado tipado si es posible o un [DOMNodeList](#class.domnodelist)
que contiene todos los nodos que coinciden con la expresión XPath
expression.

Si el argumento expression está mal formado
o bien si el argumento contextNode es inválido,
el método **DOMXPath::evaluate()** devolverá **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Recuperación del número total de libros en inglés**

&lt;?php

$doc = new DOMDocument;

$doc-&gt;load('examples/book-dcobook.xml');

$xpath = new DOMXPath($doc);

$tbody = $doc-&gt;getElementsByTagName('tbody')-&gt;item(0);

// nuestra consulta es relativa al nodo tbody
$query = 'count(row/entry[. = "en"])';

$entries = $xpath-&gt;evaluate($query, $tbody);
echo "Hay $entries libros en inglés\n";

?&gt;

    El ejemplo anterior mostrará:

Hay 2 libros en inglés

### Ver también

    - [DOMXPath::query()](#domxpath.query) - Evalúa la expresión XPath dada

# DOMXPath::query

(PHP 5, PHP 7, PHP 8)

DOMXPath::query —
Evalúa la expresión XPath dada

### Descripción

public **DOMXPath::query**([string](#language.types.string) $expression, [?](#language.types.null)[DOMNode](#class.domnode) $contextNode = **[null](#constant.null)**, [bool](#language.types.boolean) $registerNodeNS = **[true](#constant.true)**): [mixed](#language.types.mixed)

Evalúa la expresión expression XPath dada.

### Parámetros

     expression


       La expresión XPath a ejecutar.






     contextNode


       El argumento opcional contextNode puede ser especificado
       para realizar consultas XPath relativas. Por omisión, las consultas son relativas
       al elemento raíz.





registerNodeNS

Indica si se deben registrar automáticamente los prefijos de espacio de nombres en vigor del nodo de contexto en el objeto [DOMXPath](#class.domxpath).
Esto puede ser utilizado para evitar tener que llamar manualmente a [DOMXPath::registerNamespace()](#domxpath.registernamespace) para cada espacio de nombres en vigor.
En caso de conflicto de prefijos de espacio de nombres, solo se registra el prefijo de espacio de nombres descendiente más cercano.

### Valores devueltos

Devuelve un [DOMNodeList](#class.domnodelist) que contiene todos los nodos
que coinciden con la expresión expression XPath dada.
Todas las expresiones que no devuelvan ningún nodo devolverán
un [DOMNodeList](#class.domnodelist) vacío.

Si el argumento expression está malformado o
el argumento contextNode es inválido,
**DOMXPath::query()** devolverá **[false](#constant.false)**.

### Errores/Excepciones

Los siguientes errores pueden ocurrir al utilizar una expresión que invoca
retrollamadas PHP.

- Lanza una [Error](#class.error) si
  una retrollamada PHP es invocada pero ninguna retrollamada está registrada,
  o si la retrollamada nombrada no está registrada.

- Lanza una [TypeError](#class.typeerror) si
  la sintaxis php:function es utilizada y el nombre del gestor
  no es un string.

- Lanza una [Error](#class.error) si
  un objeto no-DOM es devuelto por una retrollamada.

### Ejemplos

    **Ejemplo #1 Recuperación de todos los libros en inglés**

&lt;?php

$doc = new DOMDocument;

// No queremos preocuparnos por los espacios en blanco
$doc-&gt;preserveWhiteSpace = false;

$doc-&gt;load('examples/book-docbook.xml');

$xpath = new DOMXPath($doc);

// Comenzamos en el elemento raíz
$query = '//book/chapter/para/informaltable/tgroup/tbody/row/entry[. = "en"]';

$entries = $xpath-&gt;query($query);

foreach ($entries as $entry) {
    echo "Libro encontrado {$entry-&gt;previousSibling-&gt;previousSibling-&gt;nodeValue}," .
" por {$entry-&gt;previousSibling-&gt;nodeValue}\n";
}
?&gt;

    El ejemplo anterior mostrará:

Libro encontrado : The Grapes of Wrath, por John Steinbeck
Libro encontrado : The Pearl, por John Steinbeck

     También podemos utilizar el argumento contextNode
     para acortar nuestra expresión :

&lt;?php

$doc = new DOMDocument;
$doc-&gt;preserveWhiteSpace = false;

$doc-&gt;load('examples/book-docbook.xml');

$xpath = new DOMXPath($doc);

$tbody = $doc-&gt;getElementsByTagName('tbody')-&gt;item(0);

// nuestra consulta es relativa al nodo tbody
$query = 'row/entry[. = "en"]';

$entries = $xpath-&gt;query($query, $tbody);

foreach ($entries as $entry) {
    echo "Libro encontrado : {$entry-&gt;previousSibling-&gt;previousSibling-&gt;nodeValue}," .
" por {$entry-&gt;previousSibling-&gt;nodeValue}\n";
}
?&gt;

### Ver también

    - **DOMXPath::query()**

# DOMXPath::quote

(PHP 8 &gt;= 8.4.0)

DOMXPath::quote —
Cita un string para su uso en una expresión XPath

### Descripción

public static **DOMXPath::quote**([string](#language.types.string) $str): [string](#language.types.string)

Cita str para su uso en una expresión XPath.

### Parámetros

     str


       El string a citar.



### Valores devueltos

Devuelve un string citado para su uso en una expresión XPath.

### Ejemplos

**Ejemplo #1 Correspondencia del valor de un atributo con comillas**

&lt;?php
$doc = new DOMDocument;
$doc-&gt;loadXML(&lt;&lt;&lt;XML
&lt;books&gt;
&lt;book name="'quoted' name"&gt;Book title&lt;/book&gt;
&lt;/books&gt;
XML);

$xpath = new DOMXPath($doc);

$query = "//book[@name=" . DOMXPath::quote("'quoted' name") . "]";
echo $query, "\n";

$entries = $xpath-&gt;query($query);

foreach ($entries as $entry) {
echo "Found ", $entry-&gt;textContent, "\n";
}
?&gt;

El ejemplo anterior mostrará:

//book[@name="'quoted' name"]
Found Book title

    Las citas mixtas también son admitidas:

&lt;?php
echo DOMXPath::quote("'different' \"quote\" styles");
?&gt;

El ejemplo anterior mostrará:

concat("'different' ",'"quote" styles')

### Ver también

    - [DOMXPath::evaluate()](#domxpath.evaluate) - Evalúa una expresión XPath dada y devuelve un resultado tipado si es posible

    - [DOMXPath::query()](#domxpath.query) - Evalúa la expresión XPath dada

# DOMXPath::registerNamespace

(PHP 5, PHP 7, PHP 8)

DOMXPath::registerNamespace —
Registra el espacio de nombres con el objeto [DOMXPath](#class.domxpath)

### Descripción

public **DOMXPath::registerNamespace**([string](#language.types.string) $prefix, [string](#language.types.string) $namespace): [bool](#language.types.boolean)

Registra namespace y
prefix con el objeto DOMXPath.

### Parámetros

     prefix


       El prefijo.






     namespace


       La URI del espacio de nombres.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# DOMXPath::registerPhpFunctionNS

(PHP &gt;= 8.4.0)

DOMXPath::registerPhpFunctionNS — Registra una función PHP como una función XPath en un espacio de nombres

### Descripción

public **DOMXPath::registerPhpFunctionNS**([string](#language.types.string) $namespaceURI, [string](#language.types.string) $name, [callable](#language.types.callable) $callable): [void](language.types.void.html)

Este método permite utilizar una función PHP como una función XPath con espacio de nombres
dentro de expresiones XPath.

### Parámetros

    namespaceURI


      La URI del espacio de nombres.




    name


      La función local dentro del espacio de nombres.




    callable


      La función PHP a llamar cuando la función XPath es llamada en la expresión XPath.
      Cuando una lista de nodos es pasada como argumento a la retrollamada,
      el argumento se convierte en un array que contiene los nodos DOM correspondientes.


### Errores/Excepciones

- Lanza una [ValueError](#class.valueerror) si
  el nombre de un callback no es válido.

-

Levanta una excepción [ValueError](#class.valueerror) si
options contiene una opción inválida.

- Levanta una excepción [ValueError](#class.valueerror) si
  overrideEncoding utiliza un codificado desconocido.
    - Lanza una [TypeError](#class.typeerror) si
      un callback dado no es llamable.

    ### Valores devueltos

    No se retorna ningún valor.

    ### Ejemplos

    **Ejemplo #1 Registra una función XPath en un espacio de nombres y la llama desde la expresión XPath**

&lt;?php

$xml = &lt;&lt;&lt;EOB
&lt;books&gt;
&lt;book&gt;
&lt;title&gt;PHP Basics&lt;/title&gt;
&lt;author&gt;Jim Smith&lt;/author&gt;
&lt;author&gt;Jane Smith&lt;/author&gt;
&lt;/book&gt;
&lt;book&gt;
&lt;title&gt;PHP Secrets&lt;/title&gt;
&lt;author&gt;Jenny Smythe&lt;/author&gt;
&lt;/book&gt;
&lt;book&gt;
&lt;title&gt;XML basics&lt;/title&gt;
&lt;author&gt;Joe Black&lt;/author&gt;
&lt;/book&gt;
&lt;/books&gt;
EOB;

$doc = new DOMDocument();
$doc-&gt;loadXML($xml);

$xpath = new DOMXPath($doc);

// Registra el espacio de nombres my: (obligatorio)
$xpath-&gt;registerNamespace("my", "urn:my.ns");

// Registra las funciones PHP
$xpath-&gt;registerPhpFunctionNS(
    'urn:my.ns',
    'substring',
    fn (array $arg1, int $start, int $length) =&gt; substr($arg1[0]-&gt;textContent, $start, $length)
);

// Llamada a la función substr en el título del libro
$nodes = $xpath-&gt;query('//book[my:substring(title, 0, 3) = "PHP"]');

echo "Encontrados {$nodes-&gt;length} libros cuyo título comienza con 'PHP':\n";
foreach ($nodes as $node) {
   $title  = $node-&gt;getElementsByTagName("title")-&gt;item(0)-&gt;nodeValue;
   $author = $node-&gt;getElementsByTagName("author")-&gt;item(0)-&gt;nodeValue;
   echo "$title por $author\n";
}

?&gt;

Resultado del ejemplo anterior es similar a:

Encontrados 2 libros cuyo título comienza con 'PHP':
PHP Basics por Jim Smith
PHP Secrets por Jenny Smythe

### Ver también

- [DOMXPath::registerNamespace()](#domxpath.registernamespace) - Registra el espacio de nombres con el objeto DOMXPath

- [DOMXPath::query()](#domxpath.query) - Evalúa la expresión XPath dada

- [DOMXPath::evaluate()](#domxpath.evaluate) - Evalúa una expresión XPath dada y devuelve un resultado tipado si es posible

- [XSLTProcessor::registerPHPFunctions()](#xsltprocessor.registerphpfunctions) - Activa el uso de PHP en las hojas de estilo XSLT

- [XSLTProcessor::registerPHPFunctionNS()](#xsltprocessor.registerphpfunctionns) - Registra una función PHP como una función XSLT en un espacio de nombres

# DOMXPath::registerPhpFunctions

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

DOMXPath::registerPhpFunctions — Registra una función PHP como función XPath

### Descripción

public **DOMXPath::registerPhpFunctions**([string](#language.types.string)|[array](#language.types.array)|[null](#language.types.null) $restrict = **[null](#constant.null)**): [void](language.types.void.html)

Este método activa la posibilidad de utilizar funciones PHP en expresiones XPath.

### Parámetros

     restrict


       Utilice este parámetro únicamente para autorizar ciertas funciones
       a ser llamadas desde XPath.




       Este parámetro puede ser uno de los siguientes elementos:
       un [string](#language.types.string) (nombre de función),
       un [array](#language.types.array) indexado conteniendo nombres de funciones,
       o un [array](#language.types.array) asociativo con claves correspondientes a nombres de funciones
       y valores asociados correspondientes a [callable](#language.types.callable).





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Lanza una [ValueError](#class.valueerror) si
  el nombre de un callback no es válido.

-

Levanta una excepción [ValueError](#class.valueerror) si
options contiene una opción inválida.

- Levanta una excepción [ValueError](#class.valueerror) si
  overrideEncoding utiliza un codificado desconocido.
    - Lanza una [TypeError](#class.typeerror) si
      un callback dado no es llamable.

    ### Historial de cambios

        Versión
        Descripción






         8.4.0

          Los nombres de callback inválidos ahora lanzan una
          [ValueError](#class.valueerror).
          Pasar una entrada no llamable ahora lanza una
          [TypeError](#class.typeerror).




        8.4.0

         Ahora es posible utilizar [callable](#language.types.callable)s para callbacks
         al utilizar restrict con entradas de tipo [array](#language.types.array).

    ### Ejemplos

    Los siguientes ejemplos utilizan el fichero book.xml
    que contiene los siguientes datos:

    **Ejemplo #1 book.xml**

&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;books&gt;
&lt;book&gt;
&lt;title&gt;PHP Basics&lt;/title&gt;
&lt;author&gt;Jim Smith&lt;/author&gt;
&lt;author&gt;Jane Smith&lt;/author&gt;
&lt;/book&gt;
&lt;book&gt;
&lt;title&gt;PHP Secrets&lt;/title&gt;
&lt;author&gt;Jenny Smythe&lt;/author&gt;
&lt;/book&gt;
&lt;book&gt;
&lt;title&gt;XML basics&lt;/title&gt;
&lt;author&gt;Joe Black&lt;/author&gt;
&lt;/book&gt;
&lt;/books&gt;

    **Ejemplo #2 DOMXPath::registerPhpFunctions()** con php:function

&lt;?php
$doc = new DOMDocument;
$doc-&gt;load('examples/book-simple.xml');

$xpath = new DOMXPath($doc);

// Registra el espacio de nombres php (necesario)
$xpath-&gt;registerNamespace("php", "http://php.net/xpath");

// Registra las funciones PHP (Sin restricciones)
$xpath-&gt;registerPhpFunctions();

// Llama a la función substr en el título del libro
$nodes = $xpath-&gt;query('//book[php:functionString("substr", title, 0, 3) = "PHP"]');

echo "{$nodes-&gt;length} libros encontrados cuyo título comienza con 'PHP':\n";
foreach ($nodes as $node) {
    $title  = $node-&gt;getElementsByTagName("title")-&gt;item(0)-&gt;nodeValue;
    $author = $node-&gt;getElementsByTagName("author")-&gt;item(0)-&gt;nodeValue;
    echo "$title por $author\n";
}

?&gt;

    Resultado del ejemplo anterior es similar a:

2 libros encontrados cuyo título comienza con 'PHP':
PHP Basics por Jim Smith
PHP Secrets por Jenny Smythe

    **Ejemplo #3 Ejemplo con DOMXPath::registerPhpFunctions()**
     y php:function

&lt;?php
$doc = new DOMDocument;
$doc-&gt;load('examples/book-simple.xml');

$xpath = new DOMXPath($doc);

// Registra el espacio de nombres php (necesario)
$xpath-&gt;registerNamespace("php", "http://php.net/xpath");

// Registra funciones PHP (solo has_multiple)
$xpath-&gt;registerPhpFunctions("has_multiple");

function has_multiple($nodes) {
    // Retorna true si hay más de un autor
    return count($nodes) &gt; 1;
}
// Filtra los libros cuyos autores son múltiples
$books = $xpath-&gt;query('//book[php:function("has_multiple", author)]');

echo "Libros con múltiples autores :\n";
foreach ($books as $book) {
echo $book-&gt;getElementsByTagName("title")-&gt;item(0)-&gt;nodeValue . "\n";
}

?&gt;

    Resultado del ejemplo anterior es similar a:

Libros con múltiples autores :
PHP Basics

    **Ejemplo #4 DOMXPath::registerPhpFunctions()** con un [callable](#language.types.callable)

&lt;?php
$doc = new DOMDocument;
$doc-&gt;load('examples/book-simple.xml');

$xpath = new DOMXPath($doc);

// Registrar el namespace php: (necesario)
$xpath-&gt;registerNamespace("php", "http://php.net/xpath");

// Registrar las funciones PHP (solo has_multiple)
$xpath-&gt;registerPhpFunctions(["has_multiple" =&gt; fn ($nodes) =&gt; count($nodes) &gt; 1]);

// Filtrar los libros con múltiples autores
$books = $xpath-&gt;query('//book[php:function("has_multiple", author)]');

echo "Libros con múltiples autores :\n";
foreach ($books as $book) {
echo $book-&gt;getElementsByTagName("title")-&gt;item(0)-&gt;nodeValue . "\n";
}

?&gt;

    Resultado del ejemplo anterior es similar a:

Libros con múltiples autores :
PHP Basics

### Ver también

    - [DOMXPath::registerNamespace()](#domxpath.registernamespace) - Registra el espacio de nombres con el objeto DOMXPath

    - [DOMXPath::query()](#domxpath.query) - Evalúa la expresión XPath dada

    - [DOMXPath::evaluate()](#domxpath.evaluate) - Evalúa una expresión XPath dada y devuelve un resultado tipado si es posible

    - [XSLTProcessor::registerPHPFunctions()](#xsltprocessor.registerphpfunctions) - Activa el uso de PHP en las hojas de estilo XSLT

## Tabla de contenidos

- [DOMXPath::\_\_construct](#domxpath.construct) — Crea un nuevo objeto DOMXPath
- [DOMXPath::evaluate](#domxpath.evaluate) — Evalúa una expresión XPath dada y devuelve un resultado tipado si es posible
- [DOMXPath::query](#domxpath.query) — Evalúa la expresión XPath dada
- [DOMXPath::quote](#domxpath.quote) — Cita un string para su uso en una expresión XPath
- [DOMXPath::registerNamespace](#domxpath.registernamespace) — Registra el espacio de nombres con el objeto DOMXPath
- [DOMXPath::registerPhpFunctionNS](#domxpath.registerphpfunctionns) — Registra una función PHP como una función XPath en un espacio de nombres
- [DOMXPath::registerPhpFunctions](#domxpath.registerphpfunctions) — Registra una función PHP como función XPath

# La enumeración Dom\AdjacentPosition

(PHP 8 &gt;= 8.4.0)

## Introducción

    La enumeración **AdjacentPosition** se utiliza para especificar
    dónde, en relación con el elemento contextual, debe realizarse la inserción
    utilizando **Dom\Element::insertAdjacentElement()**
    o **Dom\Element::insertAdjacentText()**.

## Enum synopsis

    enum **AdjacentPosition**

{

         case  BeforeBegin
     ; //
      Insertar antes del elemento contextual.
      Esto solo es posible si el elemento está en un documento y tiene un padre.





         case  AfterBegin
     ; //
      Insertar antes del primer hijo del elemento contextual.





         case  BeforeEnd
     ; //
      Insertar después del último hijo del elemento contextual.





         case  AfterEnd
     ; //
      Insertar después del elemento contextual.
      Esto solo es posible si el elemento está en un documento y tiene un padre.


}

# La clase [Dom\Attr](#class.dom-attr)

(PHP 8 &gt;= 8.4.0)

## Introducción

    **Dom\Attr** representa un atributo en el objeto
    [Dom\Element](#class.dom-element).




    Este es el equivalente moderno y conforme a las especificaciones de
    [DOMAttr](#class.domattr).

## Sinopsis de la Clase

     class **Dom\Attr**



     extends
      [Dom\Node](#class.dom-node)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [Dom\Node::DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     ?[string](#language.types.string)
      [$namespaceURI](#dom-attr.props.namespaceuri);

    public
     readonly
     ?[string](#language.types.string)
      [$prefix](#dom-attr.props.prefix);

    public
     readonly
     [string](#language.types.string)
      [$localName](#dom-attr.props.localname);

    public
     readonly
     [string](#language.types.string)
      [$name](#dom-attr.props.name);

    public
     [string](#language.types.string)
      [$value](#dom-attr.props.value);

    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$ownerElement](#dom-attr.props.ownerelement);

    public
     readonly
     [bool](#language.types.boolean)
      [$specified](#dom-attr.props.specified);


    /* Propiedades heredadas */
    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

public
readonly
[string](#language.types.string)
[$nodeName](#dom-node.props.nodename);
public
readonly
[string](#language.types.string)
[$baseURI](#dom-node.props.baseuri);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#dom-node.props.isconnected);
public
readonly
?[Dom\Document](#class.dom-document)
[$ownerDocument](#dom-node.props.ownerdocument);
public
readonly
?[Dom\Node](#class.dom-node)
[$parentNode](#dom-node.props.parentnode);
public
readonly
?[Dom\Element](#class.dom-element)
[$parentElement](#dom-node.props.parentelement);
public
readonly
[Dom\NodeList](#class.dom-nodelist)
[$childNodes](#dom-node.props.childnodes);
public
readonly
?[Dom\Node](#class.dom-node)
[$firstChild](#dom-node.props.firstchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$lastChild](#dom-node.props.lastchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$previousSibling](#dom-node.props.previoussibling);
public
readonly
?[Dom\Node](#class.dom-node)
[$nextSibling](#dom-node.props.nextsibling);
public
?[string](#language.types.string)
[$nodeValue](#dom-node.props.nodevalue);
public
?[string](#language.types.string)
[$textContent](#dom-node.props.textcontent);

    /* Métodos */

public [isId](#dom-attr.isid)(): [bool](#language.types.boolean)
public [rename](#dom-attr.rename)([?](#language.types.null)[string](#language.types.string) $namespaceURI, [string](#language.types.string) $qualifiedName): [void](language.types.void.html)

    /* Métodos heredados */
    /* Not documented yet */

}

## Propiedades

     namespaceURI

      El URI del espacio de nombres del atributo.



     prefix

      El prefijo del espacio de nombres del atributo.



     localName

      El nombre local del atributo.



     name

      El nombre calificado del atributo.



     value

      El valor del atributo.
      **Nota**:

        A diferencia de la propiedad equivalente en [DOMAttr](#class.domattr),
        esto no sustituye las entidades.







     ownerElement

      El elemento que contiene el atributo o **[null](#constant.null)**.



     specified

      Opción heredada, siempre **[true](#constant.true)**.


## Ver también

    - [» Especificación WHATWG de Attr](https://dom.spec.whatwg.org/#interface-attr)

# Dom\Attr::isId

(PHP 8 &gt;= 8.4.0)

Dom\Attr::isId —
Verifica si el atributo es un identificador definido

### Descripción

public **Dom\Attr::isId**(): [bool](#language.types.boolean)

Esta función verifica si el atributo es un identificador definido.

Según la norma DOM esto requiere un DTD que defina el atributo ID
como de tipo ID. Para utilizar este método, el documento debe
ser validado en el momento del análisis pasando
**[LIBXML_DTDVALID](#constant.libxml-dtdvalid)** como opción.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si este atributo es un ID definido, **[false](#constant.false)** en caso contrario.

### Ejemplos

**Ejemplo #1 Ejemplo de Dom\Attr::isId()**

&lt;?php

// Se debe validar el documento antes de referirse al id
$doc = Dom\XMLDocument::createFromFile('examples/book-docbook.xml', LIBXML_DTDVALID);

// Se obtiene el atributo llamado id del elemento chapter
$attr = $doc-&gt;getElementsByTagName('chapter')-&gt;item(0)-&gt;getAttributeNode('id');

var_dump($attr-&gt;isId()); // bool(true)

?&gt;

# Dom\Attr::rename

(PHP 8 &gt;= 8.4.0)

Dom\Attr::rename — Cambia el nombre calificado o el espacio de nombres de un atributo

### Descripción

public **Dom\Attr::rename**([?](#language.types.null)[string](#language.types.string) $namespaceURI, [string](#language.types.string) $qualifiedName): [void](language.types.void.html)

Este método cambia el nombre calificado o el espacio de nombres de un atributo.

### Parámetros

    namespaceURI


      El nuevo espacio de nombres URI del atributo.




    qualifiedName


      El nuevo nombre calificado del atributo.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

    [DOMException](#class.domexception) con el código **[Dom\NAMESPACE_ERR](#constant.dom-namespace-err)**


      Lanzada si hay un error con el espacio de nombres, tal como se determina por
      qualifiedName.




    [DOMException](#class.domexception) con el código **[Dom\INVALID_MODIFICATION_ERR](#constant.dom-invalid-modification-err)**


      Lanzada si un atributo ya existe en el elemento con el mismo
      nombre calificado.


### Ejemplos

**Ejemplo #1 Ejemplo de Dom\Attr::rename()** para cambiar el espacio de nombres y el nombre calificado

    Esto cambia el nombre calificado de my-attr a
    my-new-attr y también cambia su espacio de nombres a
    urn:my-ns.

&lt;?php

$doc = Dom\XMLDocument::createFromString('&lt;root my-attr="value"/&gt;');

$root = $doc-&gt;documentElement;
$attribute = $root-&gt;attributes['my-attr'];
$attribute-&gt;rename('urn:my-ns', 'my-new-attr');

echo $doc-&gt;saveXml();

?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;root xmlns:ns1="urn:my-ns" ns1:my-new-attr="value"/&gt;

**Ejemplo #2 Ejemplo de Dom\Attr::rename()** para cambiar solo el nombre calificado

    Esto cambia solo el nombre calificado de my-attr
    y mantiene el espacio de nombres URI sin cambios.

&lt;?php

$doc = Dom\XMLDocument::createFromString('&lt;root my-attr="value"/&gt;');

$root = $doc-&gt;documentElement;
$attribute = $root-&gt;attributes['my-attr'];
$attribute-&gt;rename($attribute-&gt;namespaceURI, 'my-new-attr');

echo $doc-&gt;saveXml();

?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;root my-new-attr="value"/&gt;

### Notas

**Nota**:

    A veces es necesario cambiar el nombre calificado y el espacio de nombres
    URI juntos en un solo paso para no infringir
    las reglas de los espacios de nombres.

### Ver también

- **Dom\Element::rename()**

## Tabla de contenidos

- [Dom\Attr::isId](#dom-attr.isid) — Verifica si el atributo es un identificador definido
- [Dom\Attr::rename](#dom-attr.rename) — Cambia el nombre calificado o el espacio de nombres de un atributo

# La clase Dom\CDATASection

(PHP 8 &gt;= 8.4.0)

## Introducción

    La clase **Dom\CDATASection** hereda de
    [Dom\Text](#class.dom-text) para la representación textual
    de las construcciones CData.




    Este es el equivalente moderno y conforme a las especificaciones de
    [DOMCdataSection](#class.domcdatasection).

## Sinopsis de la Clase

     class **Dom\CDATASection**



     extends
      [Dom\Text](#class.dom-text)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [Dom\Node::DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades heredadas */
    public
     readonly
     [string](#language.types.string)
      [$wholeText](#dom-text.props.wholetext);

    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$previousElementSibling](#dom-characterdata.props.previouselementsibling);

public
readonly
?[Dom\Element](#class.dom-element)
[$nextElementSibling](#dom-characterdata.props.nextelementsibling);
public
[string](#language.types.string)
[$data](#dom-characterdata.props.data);
public
readonly
[int](#language.types.integer)
[$length](#dom-characterdata.props.length);

    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

public
readonly
[string](#language.types.string)
[$nodeName](#dom-node.props.nodename);
public
readonly
[string](#language.types.string)
[$baseURI](#dom-node.props.baseuri);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#dom-node.props.isconnected);
public
readonly
?[Dom\Document](#class.dom-document)
[$ownerDocument](#dom-node.props.ownerdocument);
public
readonly
?[Dom\Node](#class.dom-node)
[$parentNode](#dom-node.props.parentnode);
public
readonly
?[Dom\Element](#class.dom-element)
[$parentElement](#dom-node.props.parentelement);
public
readonly
[Dom\NodeList](#class.dom-nodelist)
[$childNodes](#dom-node.props.childnodes);
public
readonly
?[Dom\Node](#class.dom-node)
[$firstChild](#dom-node.props.firstchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$lastChild](#dom-node.props.lastchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$previousSibling](#dom-node.props.previoussibling);
public
readonly
?[Dom\Node](#class.dom-node)
[$nextSibling](#dom-node.props.nextsibling);
public
?[string](#language.types.string)
[$nodeValue](#dom-node.props.nodevalue);
public
?[string](#language.types.string)
[$textContent](#dom-node.props.textcontent);

    /* Métodos heredados */

public [Dom\Text::splitText](#dom-text.splittext)([int](#language.types.integer) $offset): [Dom\Text](#class.dom-text)

    public [Dom\CharacterData::after](#dom-characterdata.after)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

public [Dom\CharacterData::appendData](#dom-characterdata.appenddata)([string](#language.types.string) $data): [void](language.types.void.html)
public [Dom\CharacterData::before](#dom-characterdata.before)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [Dom\CharacterData::deleteData](#dom-characterdata.deletedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [void](language.types.void.html)
public [Dom\CharacterData::insertData](#dom-characterdata.insertdata)([int](#language.types.integer) $offset, [string](#language.types.string) $data): [void](language.types.void.html)
public [Dom\CharacterData::remove](#dom-characterdata.remove)(): [void](language.types.void.html)
public [Dom\CharacterData::replaceData](#dom-characterdata.replacedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count, [string](#language.types.string) $data): [void](language.types.void.html)
public [Dom\CharacterData::replaceWith](#dom-characterdata.replacewith)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [Dom\CharacterData::substringData](#dom-characterdata.substringdata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [string](#language.types.string)

    /* Aún no documentado */

}

# La clase Dom\CharacterData

(PHP 8 &gt;= 8.4.0)

## Introducción

    Representa un nodo que contiene datos. Ningún nodo corresponde
    a esta clase, pero otros nodos heredan de ella.




    Esta es la versión moderna y conforme a las especificaciones de
    [DOMCharacterData](#class.domcharacterdata).

## Sinopsis de la Clase

     class **Dom\CharacterData**



     extends
      [Dom\Node](#class.dom-node)



     implements
      [Dom\ChildNode](#class.dom-childnode) {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [Dom\Node::DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$previousElementSibling](#dom-characterdata.props.previouselementsibling);

    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$nextElementSibling](#dom-characterdata.props.nextelementsibling);

    public
     [string](#language.types.string)
      [$data](#dom-characterdata.props.data);

    public
     readonly
     [int](#language.types.integer)
      [$length](#dom-characterdata.props.length);


    /* Propiedades heredadas */
    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

public
readonly
[string](#language.types.string)
[$nodeName](#dom-node.props.nodename);
public
readonly
[string](#language.types.string)
[$baseURI](#dom-node.props.baseuri);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#dom-node.props.isconnected);
public
readonly
?[Dom\Document](#class.dom-document)
[$ownerDocument](#dom-node.props.ownerdocument);
public
readonly
?[Dom\Node](#class.dom-node)
[$parentNode](#dom-node.props.parentnode);
public
readonly
?[Dom\Element](#class.dom-element)
[$parentElement](#dom-node.props.parentelement);
public
readonly
[Dom\NodeList](#class.dom-nodelist)
[$childNodes](#dom-node.props.childnodes);
public
readonly
?[Dom\Node](#class.dom-node)
[$firstChild](#dom-node.props.firstchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$lastChild](#dom-node.props.lastchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$previousSibling](#dom-node.props.previoussibling);
public
readonly
?[Dom\Node](#class.dom-node)
[$nextSibling](#dom-node.props.nextsibling);
public
?[string](#language.types.string)
[$nodeValue](#dom-node.props.nodevalue);
public
?[string](#language.types.string)
[$textContent](#dom-node.props.textcontent);

    /* Métodos */

public [after](#dom-characterdata.after)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [appendData](#dom-characterdata.appenddata)([string](#language.types.string) $data): [void](language.types.void.html)
public [before](#dom-characterdata.before)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [deleteData](#dom-characterdata.deletedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [void](language.types.void.html)
public [insertData](#dom-characterdata.insertdata)([int](#language.types.integer) $offset, [string](#language.types.string) $data): [void](language.types.void.html)
public [remove](#dom-characterdata.remove)(): [void](language.types.void.html)
public [replaceData](#dom-characterdata.replacedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count, [string](#language.types.string) $data): [void](language.types.void.html)
public [replaceWith](#dom-characterdata.replacewith)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [substringData](#dom-characterdata.substringdata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [string](#language.types.string)

    /* Métodos heredados */
    /* Aún no documentado */

}

## Propiedades

     previousElementSibling
      El elemento hermano anterior o **[null](#constant.null)**.





     nextElementSibling
      El elemento hermano siguiente o **[null](#constant.null)**.





     data
      El contenido del nodo.





     length
      El tamaño del contenido.




## Ver también

    - [» Especificación WHATWG de CharacterData](https://dom.spec.whatwg.org/#interface-characterdata)

# Dom\CharacterData::after

(PHP 8 &gt;= 8.4.0)

Dom\CharacterData::after — Añade nodos después de los datos

### Descripción

public **Dom\CharacterData::after**([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade los nodes pasados después de los datos de carácter.

### Parámetros

     nodes


       Nodos a añadir después del nodo.
       Las cadenas de caracteres son automáticamente convertidas en nodos textuales.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si el padre es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Ejemplos

**Ejemplo #1 Ejemplo de Dom\CharacterData::after()**

    Añade nodos después de los datos de caracteres.

&lt;?php
$doc = Dom\XMLDocument::createFromString("&lt;container&gt;&lt;![CDATA[hello]]&gt;&lt;/container&gt;");
$cdata = $doc-&gt;documentElement-&gt;firstChild;

$cdata-&gt;after("beautiful", $doc-&gt;createElement("world"));

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;container&gt;&lt;![CDATA[hello]]&gt;beautiful&lt;world/&gt;&lt;/container&gt;

### Ver también

- [Dom\ChildNode::after()](#dom-childnode.after) - Añade nodos después del nodo

- [Dom\CharacterData::before()](#dom-characterdata.before) - Añade nodos antes de los datos de carácter

# Dom\CharacterData::appendData

(PHP 8 &gt;= 8.4.0)

Dom\CharacterData::appendData —
Añade la cadena al final de los datos en el nodo

### Descripción

public **Dom\CharacterData::appendData**([string](#language.types.string) $data): [void](language.types.void.html)

Añade la cadena data al final de los datos en el
nodo.

### Parámetros

     data


       La cadena a añadir.





### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Ver también

- [Dom\CharacterData::deleteData()](#dom-characterdata.deletedata) - Elimina un rango de caracteres de los datos de carácter

- [Dom\CharacterData::insertData()](#dom-characterdata.insertdata) - Inserta una cadena en el desplazamiento de punto de código UTF-8 especificado

- [Dom\CharacterData::replaceData()](#dom-characterdata.replacedata) - Reemplaza una subcadena en los datos de carácter

- [Dom\CharacterData::substringData()](#dom-characterdata.substringdata) - Extrae un rango de datos de los datos de carácter

# Dom\CharacterData::before

(PHP 8 &gt;= 8.4.0)

Dom\CharacterData::before — Añade nodos antes de los datos de carácter

### Descripción

public **Dom\CharacterData::before**([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade los nodes pasados antes de los datos de carácter.

### Parámetros

     nodes


       Nodos a añadir antes del nodo.
       Las cadenas de caracteres son automáticamente convertidas en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si el padre es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Ejemplos

**Ejemplo #1 Ejemplo de Dom\CharacterData::before()**

    Añade nodos antes de los datos de caracteres.

&lt;?php
$doc = Dom\XMLDocument::createFromString("&lt;container&gt;&lt;![CDATA[world]]&gt;&lt;/container&gt;");
$cdata = $doc-&gt;documentElement-&gt;firstChild;

$cdata-&gt;before("hello", $doc-&gt;createElement("beautiful"));

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;container&gt;hello&lt;beautiful/&gt;&lt;![CDATA[world]]&gt;&lt;/container&gt;

### Ver también

- [Dom\ChildNode::before()](#dom-childnode.before) - Añade nodos antes del nodo

- [Dom\CharacterData::after()](#dom-characterdata.after) - Añade nodos después de los datos

# Dom\CharacterData::deleteData

(PHP 8 &gt;= 8.4.0)

Dom\CharacterData::deleteData —
Elimina un rango de caracteres de los datos de carácter

### Descripción

public **Dom\CharacterData::deleteData**([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [void](language.types.void.html)

Borra count caracteres a partir de la posición
offset.

### Parámetros

     offset


       La posición a partir de la cual se debe comenzar a borrar.






     count


       El número de caracteres a borrar. Si la suma de
       offset y count
       excede la longitud total de la cadena, entonces todos los caracteres hasta el
       final de la cadena serán borrados.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

     **[DOM_INDEX_SIZE_ERR](#constant.dom-index-size-err)**


       Se lanza si offset es negativo o mayor
       que el número de puntos de código UTF-8 en los datos o si
       count es negativo.





### Ver también

- [Dom\CharacterData::appendData()](#dom-characterdata.appenddata) - Añade la cadena al final de los datos en el nodo

- [Dom\CharacterData::insertData()](#dom-characterdata.insertdata) - Inserta una cadena en el desplazamiento de punto de código UTF-8 especificado

- [Dom\CharacterData::replaceData()](#dom-characterdata.replacedata) - Reemplaza una subcadena en los datos de carácter

- [Dom\CharacterData::substringData()](#dom-characterdata.substringdata) - Extrae un rango de datos de los datos de carácter

# Dom\CharacterData::insertData

(PHP 8 &gt;= 8.4.0)

Dom\CharacterData::insertData —
Inserta una cadena en el desplazamiento de punto de código UTF-8 especificado

### Descripción

public **Dom\CharacterData::insertData**([int](#language.types.integer) $offset, [string](#language.types.string) $data): [void](language.types.void.html)

Inserta la cadena data en la posición
offset.

### Parámetros

     offset


       La posición de la inserción.






     data


       La cadena a insertar.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

     **[DOM_INDEX_SIZE_ERR](#constant.dom-index-size-err)**


       Se lanza si offset es negativo o mayor que
       el número de puntos de código UTF-8 en los datos.





### Ver también

- [Dom\CharacterData::appendData()](#dom-characterdata.appenddata) - Añade la cadena al final de los datos en el nodo

- [Dom\CharacterData::deleteData()](#dom-characterdata.deletedata) - Elimina un rango de caracteres de los datos de carácter

- [Dom\CharacterData::replaceData()](#dom-characterdata.replacedata) - Reemplaza una subcadena en los datos de carácter

- [Dom\CharacterData::substringData()](#dom-characterdata.substringdata) - Extrae un rango de datos de los datos de carácter

# Dom\CharacterData::remove

(PHP 8 &gt;= 8.4.0)

Dom\CharacterData::remove — Elimina el nodo de datos de carácter

### Descripción

public **Dom\CharacterData::remove**(): [void](language.types.void.html)

Elimina el nodo de datos de carácter.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Ejemplo #1 Ejemplo de Dom\CharacterData::remove()**

    Elimina los datos de caracteres.

&lt;?php
$doc = Dom\XMLDocument::createFromString("&lt;container&gt;&lt;![CDATA[hello]]&gt;&lt;world/&gt;&lt;/container&gt;");
$cdata = $doc-&gt;documentElement-&gt;firstChild;

$cdata-&gt;remove();

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;container&gt;&lt;world/&gt;&lt;/container&gt;

### Ver también

- [Dom\ChildNode::remove()](#dom-childnode.remove) - Elimina el nodo

- [Dom\CharacterData::after()](#dom-characterdata.after) - Añade nodos después de los datos

- [Dom\CharacterData::before()](#dom-characterdata.before) - Añade nodos antes de los datos de carácter

- [Dom\CharacterData::replaceWith()](#dom-characterdata.replacewith) - Reemplaza los datos por nuevos nodos

- **Dom\Node::removeChild()**

# Dom\CharacterData::replaceData

(PHP 8 &gt;= 8.4.0)

Dom\CharacterData::replaceData —
Reemplaza una subcadena en los datos de carácter

### Descripción

public **Dom\CharacterData::replaceData**([int](#language.types.integer) $offset, [int](#language.types.integer) $count, [string](#language.types.string) $data): [void](language.types.void.html)

Reemplaza count caracteres a partir de la posición
offset con los datos data.

### Parámetros

     offset


       La posición a partir de la cual se inicia el reemplazo.






     count


       El número de caracteres a reemplazar. Si la suma de
       offset y count
       excede la longitud total de la cadena, entonces todos los caracteres
       hasta el final de los datos serán reemplazados.






     data


       La cadena utilizada para reemplazar los caracteres seleccionados.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

     **[DOM_INDEX_SIZE_ERR](#constant.dom-index-size-err)**


       Lanzado si offset es negativo o mayor que
       el número de unidades de puntos de código UTF-8 en los datos o si count
       es negativo.





### Ver también

- [Dom\CharacterData::appendData()](#dom-characterdata.appenddata) - Añade la cadena al final de los datos en el nodo

- [Dom\CharacterData::deleteData()](#dom-characterdata.deletedata) - Elimina un rango de caracteres de los datos de carácter

- [Dom\CharacterData::insertData()](#dom-characterdata.insertdata) - Inserta una cadena en el desplazamiento de punto de código UTF-8 especificado

- [Dom\CharacterData::substringData()](#dom-characterdata.substringdata) - Extrae un rango de datos de los datos de carácter

# Dom\CharacterData::replaceWith

(PHP 8 &gt;= 8.4.0)

Dom\CharacterData::replaceWith — Reemplaza los datos por nuevos nodos

### Descripción

public **Dom\CharacterData::replaceWith**([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Reemplaza los datos por nuevos nodes.

### Parámetros

     nodes


       Los nodos de reemplazo.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si el padre es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Ejemplos

**Ejemplo #1 Ejemplo de Dom\CharacterData::replaceWith()**

    Reemplaza los datos de caracteres por nuevos nodos.

&lt;?php
$doc = Dom\XMLDocument::createFromString("&lt;container&gt;&lt;![CDATA[hello]]&gt;&lt;/container&gt;");
$cdata = $doc-&gt;documentElement-&gt;firstChild;

$cdata-&gt;replaceWith("beautiful", $doc-&gt;createElement("world"));

echo $doc-&gt;saveXML();
?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;container&gt;beautiful&lt;world/&gt;&lt;/container&gt;

### Ver también

- [Dom\ChildNode::replaceWith()](#dom-childnode.replacewith) - Reemplaza el nodo por nuevos nodos

- [Dom\CharacterData::after()](#dom-characterdata.after) - Añade nodos después de los datos

- [Dom\CharacterData::before()](#dom-characterdata.before) - Añade nodos antes de los datos de carácter

- [Dom\CharacterData::remove()](#dom-characterdata.remove) - Elimina el nodo de datos de carácter

# Dom\CharacterData::substringData

(PHP 8 &gt;= 8.4.0)

Dom\CharacterData::substringData —
Extrae un rango de datos de los datos de carácter

### Descripción

public **Dom\CharacterData::substringData**([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [string](#language.types.string)

Devuelve la sub-cadena especificada.

### Parámetros

     offset


       La posición del inicio de la cadena a extraer.






     count


       El número de caracteres a extraer.





### Valores devueltos

La sub-cadena especificada. Si la suma de offset
y count excede la longitud total de la cadena, entonces
todas las unidades de puntos de código UTF-8 hasta el final de los datos serán devueltas.

### Errores/Excepciones

     **[DOM_INDEX_SIZE_ERR](#constant.dom-index-size-err)**


       Lanzado si offset es negativo o mayor que
       el número de unidades de puntos de código UTF-8 en los datos o si
       count es negativo.





### Ver también

- [Dom\CharacterData::appendData()](#dom-characterdata.appenddata) - Añade la cadena al final de los datos en el nodo

- [Dom\CharacterData::deleteData()](#dom-characterdata.deletedata) - Elimina un rango de caracteres de los datos de carácter

- [Dom\CharacterData::insertData()](#dom-characterdata.insertdata) - Inserta una cadena en el desplazamiento de punto de código UTF-8 especificado

- [Dom\CharacterData::replaceData()](#dom-characterdata.replacedata) - Reemplaza una subcadena en los datos de carácter

## Tabla de contenidos

- [Dom\CharacterData::after](#dom-characterdata.after) — Añade nodos después de los datos
- [Dom\CharacterData::appendData](#dom-characterdata.appenddata) — Añade la cadena al final de los datos en el nodo
- [Dom\CharacterData::before](#dom-characterdata.before) — Añade nodos antes de los datos de carácter
- [Dom\CharacterData::deleteData](#dom-characterdata.deletedata) — Elimina un rango de caracteres de los datos de carácter
- [Dom\CharacterData::insertData](#dom-characterdata.insertdata) — Inserta una cadena en el desplazamiento de punto de código UTF-8 especificado
- [Dom\CharacterData::remove](#dom-characterdata.remove) — Elimina el nodo de datos de carácter
- [Dom\CharacterData::replaceData](#dom-characterdata.replacedata) — Reemplaza una subcadena en los datos de carácter
- [Dom\CharacterData::replaceWith](#dom-characterdata.replacewith) — Reemplaza los datos por nuevos nodos
- [Dom\CharacterData::substringData](#dom-characterdata.substringdata) — Extrae un rango de datos de los datos de carácter

# La interfaz Dom\ChildNode

(PHP 8 &gt;= 8.4.0)

## Introducción

    Esta es la versión moderna y conforme a las especificaciones de
    [DOMChildNode](#class.domchildnode).

## Sinopsis de la Interfaz

     interface **Dom\ChildNode** {

    /* Métodos */

public [after](#dom-childnode.after)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [before](#dom-childnode.before)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [remove](#dom-childnode.remove)(): [void](language.types.void.html)
public [replaceWith](#dom-childnode.replacewith)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

}

# Dom\ChildNode::after

(PHP 8 &gt;= 8.4.0)

Dom\ChildNode::after — Añade nodos después del nodo

### Descripción

public **Dom\ChildNode::after**([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade los nodes pasados después del nodo.

### Parámetros

     nodes


       Nodos a añadir después del nodo.
       Las cadenas de caracteres son automáticamente convertidas en nodos textuales.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si el padre es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Ver también

- [Dom\ChildNode::before()](#dom-childnode.before) - Añade nodos antes del nodo

- [Dom\ChildNode::remove()](#dom-childnode.remove) - Elimina el nodo

- [Dom\ChildNode::replaceWith()](#dom-childnode.replacewith) - Reemplaza el nodo por nuevos nodos

- **Dom\Node::appendChild()**

# Dom\ChildNode::before

(PHP 8 &gt;= 8.4.0)

Dom\ChildNode::before — Añade nodos antes del nodo

### Descripción

public **Dom\ChildNode::before**([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade los nodes pasados antes del nodo.

### Parámetros

     nodes


       Nodos a añadir antes del nodo.
       Las cadenas de caracteres son automáticamente convertidas en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si el padre es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Ver también

- [Dom\ChildNode::after()](#dom-childnode.after) - Añade nodos después del nodo

- [Dom\ChildNode::remove()](#dom-childnode.remove) - Elimina el nodo

- [Dom\ChildNode::replaceWith()](#dom-childnode.replacewith) - Reemplaza el nodo por nuevos nodos

# Dom\ChildNode::remove

(PHP 8 &gt;= 8.4.0)

Dom\ChildNode::remove — Elimina el nodo

### Descripción

public **Dom\ChildNode::remove**(): [void](language.types.void.html)

Elimina el nodo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ver también

- [Dom\ChildNode::after()](#dom-childnode.after) - Añade nodos después del nodo

- [Dom\ChildNode::before()](#dom-childnode.before) - Añade nodos antes del nodo

- [Dom\ChildNode::replaceWith()](#dom-childnode.replacewith) - Reemplaza el nodo por nuevos nodos

- **Dom\Node::removeChild()**

# Dom\ChildNode::replaceWith

(PHP 8 &gt;= 8.4.0)

Dom\ChildNode::replaceWith — Reemplaza el nodo por nuevos nodos

### Descripción

public **Dom\ChildNode::replaceWith**([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Reemplaza el nodo por los nuevos nodes.
Una combinación de [DOMChildNode::remove()](#domchildnode.remove) y **DOMChildNode::append()**.

### Parámetros

     nodes


       Los nodos de reemplazo.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si el padre es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Ver también

- [Dom\ChildNode::after()](#dom-childnode.after) - Añade nodos después del nodo

- [Dom\ChildNode::before()](#dom-childnode.before) - Añade nodos antes del nodo

- [Dom\ChildNode::remove()](#dom-childnode.remove) - Elimina el nodo

- **Dom\Node::replaceChild()**

## Tabla de contenidos

- [Dom\ChildNode::after](#dom-childnode.after) — Añade nodos después del nodo
- [Dom\ChildNode::before](#dom-childnode.before) — Añade nodos antes del nodo
- [Dom\ChildNode::remove](#dom-childnode.remove) — Elimina el nodo
- [Dom\ChildNode::replaceWith](#dom-childnode.replacewith) — Reemplaza el nodo por nuevos nodos

# La clase Dom\Comment

(PHP 8 &gt;= 8.4.0)

## Introducción

    Representa un nodo de comentario, delimitado por &lt;!--
    y --&gt;.




    Esta es la versión moderna y conforme a las especificaciones de
    [DOMComment](#class.domcomment).

## Sinopsis de la Clase

     class **Dom\Comment**



     extends
      [Dom\CharacterData](#class.dom-characterdata)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [Dom\Node::DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades heredadas */
    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$previousElementSibling](#dom-characterdata.props.previouselementsibling);

public
readonly
?[Dom\Element](#class.dom-element)
[$nextElementSibling](#dom-characterdata.props.nextelementsibling);
public
[string](#language.types.string)
[$data](#dom-characterdata.props.data);
public
readonly
[int](#language.types.integer)
[$length](#dom-characterdata.props.length);

    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

public
readonly
[string](#language.types.string)
[$nodeName](#dom-node.props.nodename);
public
readonly
[string](#language.types.string)
[$baseURI](#dom-node.props.baseuri);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#dom-node.props.isconnected);
public
readonly
?[Dom\Document](#class.dom-document)
[$ownerDocument](#dom-node.props.ownerdocument);
public
readonly
?[Dom\Node](#class.dom-node)
[$parentNode](#dom-node.props.parentnode);
public
readonly
?[Dom\Element](#class.dom-element)
[$parentElement](#dom-node.props.parentelement);
public
readonly
[Dom\NodeList](#class.dom-nodelist)
[$childNodes](#dom-node.props.childnodes);
public
readonly
?[Dom\Node](#class.dom-node)
[$firstChild](#dom-node.props.firstchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$lastChild](#dom-node.props.lastchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$previousSibling](#dom-node.props.previoussibling);
public
readonly
?[Dom\Node](#class.dom-node)
[$nextSibling](#dom-node.props.nextsibling);
public
?[string](#language.types.string)
[$nodeValue](#dom-node.props.nodevalue);
public
?[string](#language.types.string)
[$textContent](#dom-node.props.textcontent);

    /* Métodos heredados */

public [Dom\CharacterData::after](#dom-characterdata.after)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [Dom\CharacterData::appendData](#dom-characterdata.appenddata)([string](#language.types.string) $data): [void](language.types.void.html)
public [Dom\CharacterData::before](#dom-characterdata.before)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [Dom\CharacterData::deleteData](#dom-characterdata.deletedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [void](language.types.void.html)
public [Dom\CharacterData::insertData](#dom-characterdata.insertdata)([int](#language.types.integer) $offset, [string](#language.types.string) $data): [void](language.types.void.html)
public [Dom\CharacterData::remove](#dom-characterdata.remove)(): [void](language.types.void.html)
public [Dom\CharacterData::replaceData](#dom-characterdata.replacedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count, [string](#language.types.string) $data): [void](language.types.void.html)
public [Dom\CharacterData::replaceWith](#dom-characterdata.replacewith)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [Dom\CharacterData::substringData](#dom-characterdata.substringdata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [string](#language.types.string)

    /* Aún no documentado */

}

## Ver también

    - [» Especificación WHATWG de Comment](https://dom.spec.whatwg.org/#interface-comment)

# La clase Dom\Document

(PHP 8 &gt;= 8.4.0)

## Introducción

    Representa un documento HTML o XML completo; será la raíz
    del árbol del documento.




    Esta es la versión moderna y conforme a las especificaciones de
    [DOMDocument](#class.domdocument).
    Es la clase base para [Dom\XMLDocument](#class.dom-xmldocument)
    y [Dom\HTMLDocument](#class.dom-htmldocument).

## Sinopsis de la Clase

     abstract
     class **Dom\Document**



     extends
      [Dom\Node](#class.dom-node)



     implements
      [Dom\ParentNode](#class.dom-parentnode) {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [Dom\Node::DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     [Dom\Implementation](#class.dom-implementation)
      [$implementation](#dom-document.props.implementation);

    public
     [string](#language.types.string)
      [$URL](#dom-document.props.url);

    public
     [string](#language.types.string)
      [$documentURI](#dom-document.props.documenturi);

    public
     [string](#language.types.string)
      [$characterSet](#dom-document.props.characterset);

    public
     [string](#language.types.string)
      [$charset](#dom-document.props.charset);

    public
     [string](#language.types.string)
      [$inputEncoding](#dom-document.props.inputencoding);

    public
     readonly
     ?[Dom\DocumentType](#class.dom-documenttype)
      [$doctype](#dom-document.props.doctype);

    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$documentElement](#dom-document.props.documentelement);

    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$firstElementChild](#dom-document.props.firstelementchild);

    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$lastElementChild](#dom-document.props.lastelementchild);

    public
     readonly
     [int](#language.types.integer)
      [$childElementCount](#dom-document.props.childelementcount);

    public
     ?[Dom\HTMLElement](#class.dom-htmlelement)
      [$body](#dom-document.props.body);

    public
     readonly
     ?[Dom\HTMLElement](#class.dom-htmlelement)
      [$head](#dom-document.props.head);

    public
     [string](#language.types.string)
      [$title](#dom-document.props.title);


    /* Propiedades heredadas */
    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

public
readonly
[string](#language.types.string)
[$nodeName](#dom-node.props.nodename);
public
readonly
[string](#language.types.string)
[$baseURI](#dom-node.props.baseuri);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#dom-node.props.isconnected);
public
readonly
?[Dom\Document](#class.dom-document)
[$ownerDocument](#dom-node.props.ownerdocument);
public
readonly
?[Dom\Node](#class.dom-node)
[$parentNode](#dom-node.props.parentnode);
public
readonly
?[Dom\Element](#class.dom-element)
[$parentElement](#dom-node.props.parentelement);
public
readonly
[Dom\NodeList](#class.dom-nodelist)
[$childNodes](#dom-node.props.childnodes);
public
readonly
?[Dom\Node](#class.dom-node)
[$firstChild](#dom-node.props.firstchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$lastChild](#dom-node.props.lastchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$previousSibling](#dom-node.props.previoussibling);
public
readonly
?[Dom\Node](#class.dom-node)
[$nextSibling](#dom-node.props.nextsibling);
public
?[string](#language.types.string)
[$nodeValue](#dom-node.props.nodevalue);
public
?[string](#language.types.string)
[$textContent](#dom-node.props.textcontent);

    /* Métodos */
    /* Aún no documentado */


    /* Métodos heredados */
    /* Aún no documentado */

}

## Propiedades

     implementation

       El objeto [DOMImplementation](#class.domimplementation) que gestiona este documento.






     doctype
      La Declaración de Tipo de Documento asociada con este documento.





     URL

      Equivalente a documentURI.



     characterSet


       La codificación del documento utilizada para la serialización.
       Al analizar un documento, esto se define en la codificación de entrada de dicho
       documento.




     inputEncoding

      Alias heredado de characterSet.



     charset

      Alias heredado de characterSet.



     documentURI
      La localización del documento, o **[null](#constant.null)** si indefinido.





     documentElement


       El [Dom\Element](#class.dom-element) que es el elemento del documento.
       Esto evalúa a **[null](#constant.null)** para documentos sin elementos.




     firstElementChild
      Primer elemento hijo o **[null](#constant.null)**.





     lastElementChild
      Último elemento hijo o **[null](#constant.null)**.





     childElementCount
      El número de elementos hijos.





     body


       El primer hijo del elemento html que es una
       etiqueta body o una etiqueta frameset.
       Estos elementos deben estar en el espacio de nombres HTML.
       Si ningún elemento coincide, esto evalúa a **[null](#constant.null)**.




     head


       El primer elemento head que es un hijo del elemento
       html.
       Estos elementos deben estar en el espacio de nombres HTML.
       Si ningún elemento coincide, esto evalúa a **[null](#constant.null)**.




     title


       El título del documento tal como se define por el elemento title
       para HTML o el elemento title SVG para SVG.
       Si no hay título, esto evalúa a la cadena vacía.



# La clase Dom\DocumentFragment

(PHP 8 &gt;= 8.4.0)

## Introducción

    Representa un fragmento de documento, que puede ser utilizado como un contenedor
    para otros nodos.




    Este es el equivalente moderno y conforme a las especificaciones de
    [DOMDocumentFragment](#class.domdocumentfragment).

## Sinopsis de la Clase

     class **Dom\DocumentFragment**



     extends
      [Dom\Node](#class.dom-node)



     implements
      [Dom\ParentNode](#class.dom-parentnode) {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [Dom\Node::DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$firstElementChild](#dom-documentfragment.props.firstelementchild);

    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$lastElementChild](#dom-documentfragment.props.lastelementchild);

    public
     readonly
     [int](#language.types.integer)
      [$childElementCount](#dom-documentfragment.props.childelementcount);


    /* Propiedades heredadas */
    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

public
readonly
[string](#language.types.string)
[$nodeName](#dom-node.props.nodename);
public
readonly
[string](#language.types.string)
[$baseURI](#dom-node.props.baseuri);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#dom-node.props.isconnected);
public
readonly
?[Dom\Document](#class.dom-document)
[$ownerDocument](#dom-node.props.ownerdocument);
public
readonly
?[Dom\Node](#class.dom-node)
[$parentNode](#dom-node.props.parentnode);
public
readonly
?[Dom\Element](#class.dom-element)
[$parentElement](#dom-node.props.parentelement);
public
readonly
[Dom\NodeList](#class.dom-nodelist)
[$childNodes](#dom-node.props.childnodes);
public
readonly
?[Dom\Node](#class.dom-node)
[$firstChild](#dom-node.props.firstchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$lastChild](#dom-node.props.lastchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$previousSibling](#dom-node.props.previoussibling);
public
readonly
?[Dom\Node](#class.dom-node)
[$nextSibling](#dom-node.props.nextsibling);
public
?[string](#language.types.string)
[$nodeValue](#dom-node.props.nodevalue);
public
?[string](#language.types.string)
[$textContent](#dom-node.props.textcontent);

    /* Métodos */
    /* Aún no documentado */


    /* Métodos heredados */
    /* Aún no documentado */

}

## Propiedades

     firstElementChild
      Primer elemento hijo o **[null](#constant.null)**.





     lastElementChild
      Último elemento hijo o **[null](#constant.null)**.





     childElementCount
      El número de elementos hijos.




# La clase Dom\DocumentType

(PHP 8 &gt;= 8.4.0)

## Introducción

    Cada [Dom\Document](#class.dom-document) tiene un atributo doctype
    cuyo valor es **[null](#constant.null)** o un objeto **Dom\DocumentType**.




    Este es el equivalente moderno y conforme a las especificaciones de
    [DOMImplementation](#class.domimplementation).

## Sinopsis de la Clase

     class **Dom\DocumentType**



     extends
      [Dom\Node](#class.dom-node)



     implements
      [Dom\ChildNode](#class.dom-childnode) {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [Dom\Node::DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     [string](#language.types.string)
      [$name](#dom-documenttype.props.name);

    public
     readonly
     [Dom\DtdNamedNodeMap](#class.dom-dtdnamednodemap)
      [$entities](#dom-documenttype.props.entities);

    public
     readonly
     [Dom\DtdNamedNodeMap](#class.dom-dtdnamednodemap)
      [$notations](#dom-documenttype.props.notations);

    public
     readonly
     [string](#language.types.string)
      [$publicId](#dom-documenttype.props.publicid);

    public
     readonly
     [string](#language.types.string)
      [$systemId](#dom-documenttype.props.systemid);

    public
     readonly
     ?[string](#language.types.string)
      [$internalSubset](#dom-documenttype.props.internalsubset);


    /* Propiedades heredadas */
    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

public
readonly
[string](#language.types.string)
[$nodeName](#dom-node.props.nodename);
public
readonly
[string](#language.types.string)
[$baseURI](#dom-node.props.baseuri);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#dom-node.props.isconnected);
public
readonly
?[Dom\Document](#class.dom-document)
[$ownerDocument](#dom-node.props.ownerdocument);
public
readonly
?[Dom\Node](#class.dom-node)
[$parentNode](#dom-node.props.parentnode);
public
readonly
?[Dom\Element](#class.dom-element)
[$parentElement](#dom-node.props.parentelement);
public
readonly
[Dom\NodeList](#class.dom-nodelist)
[$childNodes](#dom-node.props.childnodes);
public
readonly
?[Dom\Node](#class.dom-node)
[$firstChild](#dom-node.props.firstchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$lastChild](#dom-node.props.lastchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$previousSibling](#dom-node.props.previoussibling);
public
readonly
?[Dom\Node](#class.dom-node)
[$nextSibling](#dom-node.props.nextsibling);
public
?[string](#language.types.string)
[$nodeValue](#dom-node.props.nodevalue);
public
?[string](#language.types.string)
[$textContent](#dom-node.props.textcontent);

    /* Métodos */
    /* Aún no documentado */


    /* Métodos heredados */
    /* Aún no documentado */

}

## Propiedades

     publicId
      El identificador público del subset externo.





     systemId

       El identificador de sistema del subset externo. Puede ser una
       URI absoluta o no.






     name

       El nombre de la DTD; es decir, el nombre que sigue
       inmediatamente a la palabra clave DOCTYPE.






     entities


       Un objeto [Dom\DtdNamedNodeMap](#class.dom-dtdnamednodemap) que contiene las entidades
       generales, tanto externas como internas, declaradas en la DTD.




     notations


       Un [Dom\DtdNamedNodeMap](#class.dom-dtdnamednodemap) que contiene las notaciones
       declaradas en la DTD.




     internalSubset

       El subset interno, en forma de [string](#language.types.string), o **[null](#constant.null)** si no existe. Esta cadena
       no contiene los corchetes delimitadores.





# La clase Dom\DtdNamedNodeMap

(PHP 8 &gt;= 8.4.0)

## Introducción

    Representa un mapa de nodos nombrados para las entidades y los nodos de
    DTD.

## Sinopsis de la Clase

     class **Dom\DtdNamedNodeMap**



     implements
      [IteratorAggregate](#class.iteratoraggregate),

     [Countable](#class.countable) {

    /* Propiedades */

     public
     readonly
     [int](#language.types.integer)
      [$length](#dom-dtdnamednodemap.props.length);


    /* Métodos */
    /* No documentado aún */

}

## Propiedades

     length


       El número total de entidades y nodos de notación.



# La clase Dom\Element

(PHP 8 &gt;= 8.4.0)

## Introducción

    Representa un elemento.




    Este es el equivalente moderno y conforme a las especificaciones de
    [DOMElement](#class.domelement).

## Sinopsis de la Clase

     class **Dom\Element**



     extends
      [Dom\Node](#class.dom-node)



     implements
      [Dom\ParentNode](#class.dom-parentnode),

     [Dom\ChildNode](#class.dom-childnode) {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [Dom\Node::DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     ?[string](#language.types.string)
      [$namespaceURI](#dom-element.props.namespaceuri);

    public
     readonly
     ?[string](#language.types.string)
      [$prefix](#dom-element.props.prefix);

    public
     readonly
     [string](#language.types.string)
      [$localName](#dom-element.props.localname);

    public
     readonly
     [string](#language.types.string)
      [$tagName](#dom-element.props.tagname);

    public
     [string](#language.types.string)
      [$id](#dom-element.props.id);

    public
     [string](#language.types.string)
      [$className](#dom-element.props.classname);

    public
     readonly
     [Dom\TokenList](#class.dom-tokenlist)
      [$classList](#dom-element.props.classlist);

    public
     readonly
     [Dom\NamedNodeMap](#class.dom-namednodemap)
      [$attributes](#dom-element.props.attributes);

    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$firstElementChild](#dom-element.props.firstelementchild);

    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$lastElementChild](#dom-element.props.lastelementchild);

    public
     readonly
     [int](#language.types.integer)
      [$childElementCount](#dom-element.props.childelementcount);

    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$previousElementSibling](#dom-element.props.previouselementsibling);

    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$nextElementSibling](#dom-element.props.nextelementsibling);

    public
     [string](#language.types.string)
      [$innerHTML](#dom-element.props.innerhtml);

    public
     [string](#language.types.string)
      [$substitutedNodeValue](#dom-element.props.substitutednodevalue);


    /* Propiedades heredadas */
    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

public
readonly
[string](#language.types.string)
[$nodeName](#dom-node.props.nodename);
public
readonly
[string](#language.types.string)
[$baseURI](#dom-node.props.baseuri);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#dom-node.props.isconnected);
public
readonly
?[Dom\Document](#class.dom-document)
[$ownerDocument](#dom-node.props.ownerdocument);
public
readonly
?[Dom\Node](#class.dom-node)
[$parentNode](#dom-node.props.parentnode);
public
readonly
?[Dom\Element](#class.dom-element)
[$parentElement](#dom-node.props.parentelement);
public
readonly
[Dom\NodeList](#class.dom-nodelist)
[$childNodes](#dom-node.props.childnodes);
public
readonly
?[Dom\Node](#class.dom-node)
[$firstChild](#dom-node.props.firstchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$lastChild](#dom-node.props.lastchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$previousSibling](#dom-node.props.previoussibling);
public
readonly
?[Dom\Node](#class.dom-node)
[$nextSibling](#dom-node.props.nextsibling);
public
?[string](#language.types.string)
[$nodeValue](#dom-node.props.nodevalue);
public
?[string](#language.types.string)
[$textContent](#dom-node.props.textcontent);

    /* Métodos */
    /* Aún no documentado */


    /* Métodos heredados */
    /* Aún no documentado */

}

## Propiedades

     namespaceURI

      El URI del espacio de nombres del elemento.



     prefix

      El prefijo del espacio de nombres del elemento.



     localName

      El nombre local del elemento.



     tagName

      El nombre en mayúsculas HTML calificado del elemento.



     className
      Una cadena que representa las clases del elemento, separadas por espacios.





     classList


       Devuelve una instancia de [Dom\TokenList](#class.dom-tokenlist) para
       gestionar fácilmente las clases de este elemento.




     attributes


       Devuelve una instancia de [Dom\NamedNodeMap](#class.dom-namednodemap) que
       representa los atributos de este elemento.




     id
      Refleja el ID del elemento a través del atributo "id".





     firstElementChild
      Primer elemento hijo o **[null](#constant.null)**.





     lastElementChild
      Último elemento hijo o **[null](#constant.null)**.





     childElementCount
      El número de elementos hijos.





     previousElementSibling
      El elemento hermano anterior o **[null](#constant.null)**.





     nextElementSibling
      El elemento hermano siguiente o **[null](#constant.null)**.





     innerHTML

      El HTML interno (o XML para documentos XML) del elemento.



     substitutedNodeValue

      El valor del nodo con sustitución de entidad activada.


## Notas

**Nota**:

La extensión DOM utiliza el codificado UTF-8 al utilizar los métodos o las propiedades.
Los métodos del analizador detectan automáticamente el codificado o permiten al llamante especificar un codificado.

# La clase Dom\Entity

(PHP 8 &gt;= 8.4.0)

## Introducción

    Esta interfaz representa una entidad conocida, analizada o no, en un
    documento XML.




    Esta es la versión moderna y conforme a las especificaciones de
    [DOMEntity](#class.domentity).

## Sinopsis de la Clase

     class **Dom\Entity**



     extends
      [Dom\Node](#class.dom-node)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [Dom\Node::DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     ?[string](#language.types.string)
      [$publicId](#dom-entity.props.publicid);

    public
     readonly
     ?[string](#language.types.string)
      [$systemId](#dom-entity.props.systemid);

    public
     readonly
     ?[string](#language.types.string)
      [$notationName](#dom-entity.props.notationname);


    /* Propiedades heredadas */
    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

public
readonly
[string](#language.types.string)
[$nodeName](#dom-node.props.nodename);
public
readonly
[string](#language.types.string)
[$baseURI](#dom-node.props.baseuri);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#dom-node.props.isconnected);
public
readonly
?[Dom\Document](#class.dom-document)
[$ownerDocument](#dom-node.props.ownerdocument);
public
readonly
?[Dom\Node](#class.dom-node)
[$parentNode](#dom-node.props.parentnode);
public
readonly
?[Dom\Element](#class.dom-element)
[$parentElement](#dom-node.props.parentelement);
public
readonly
[Dom\NodeList](#class.dom-nodelist)
[$childNodes](#dom-node.props.childnodes);
public
readonly
?[Dom\Node](#class.dom-node)
[$firstChild](#dom-node.props.firstchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$lastChild](#dom-node.props.lastchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$previousSibling](#dom-node.props.previoussibling);
public
readonly
?[Dom\Node](#class.dom-node)
[$nextSibling](#dom-node.props.nextsibling);
public
?[string](#language.types.string)
[$nodeValue](#dom-node.props.nodevalue);
public
?[string](#language.types.string)
[$textContent](#dom-node.props.textcontent);

    /* Métodos heredados */
    /* Aún no documentado */

}

## Propiedades

     publicId

       El identificador público asociado con la entidad, si está especificado, y **[null](#constant.null)**
       de lo contrario.






     systemId

       El identificador del sistema asociado con la entidad, si está especificado, y
       **[null](#constant.null)** de lo contrario. Puede ser una URI absoluta o relativa.






     notationName

       Para las entidades no analizadas, el nombre de la notación de la entidad.
       Para las entidades analizadas, vale **[null](#constant.null)**.





# La clase Dom\EntityReference

(PHP 8 &gt;= 8.4.0)

## Introducción

    Esta es la versión moderna y conforme a las especificaciones de
    [DOMEntityReference](#class.domentityreference).

## Sinopsis de la Clase

     class **Dom\EntityReference**



     extends
      [Dom\Node](#class.dom-node)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [Dom\Node::DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades heredadas */
    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

public
readonly
[string](#language.types.string)
[$nodeName](#dom-node.props.nodename);
public
readonly
[string](#language.types.string)
[$baseURI](#dom-node.props.baseuri);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#dom-node.props.isconnected);
public
readonly
?[Dom\Document](#class.dom-document)
[$ownerDocument](#dom-node.props.ownerdocument);
public
readonly
?[Dom\Node](#class.dom-node)
[$parentNode](#dom-node.props.parentnode);
public
readonly
?[Dom\Element](#class.dom-element)
[$parentElement](#dom-node.props.parentelement);
public
readonly
[Dom\NodeList](#class.dom-nodelist)
[$childNodes](#dom-node.props.childnodes);
public
readonly
?[Dom\Node](#class.dom-node)
[$firstChild](#dom-node.props.firstchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$lastChild](#dom-node.props.lastchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$previousSibling](#dom-node.props.previoussibling);
public
readonly
?[Dom\Node](#class.dom-node)
[$nextSibling](#dom-node.props.nextsibling);
public
?[string](#language.types.string)
[$nodeValue](#dom-node.props.nodevalue);
public
?[string](#language.types.string)
[$textContent](#dom-node.props.textcontent);

    /* Métodos heredados */
    /* Aún no documentado */

}

# La clase Dom\HTMLCollection

(PHP 8 &gt;= 8.4.0)

## Introducción

    Representa un conjunto estático de elementos.

## Sinopsis de la Clase

     class **Dom\HTMLCollection**



     implements
      [IteratorAggregate](#class.iteratoraggregate),

     [Countable](#class.countable) {

    /* Propiedades */

     public
     readonly
     [int](#language.types.integer)
      [$length](#dom-htmlcollection.props.length);


    /* Métodos */
    /* Aún no documentado */

}

## Propiedades

     length

      El número de elementos.


## Notas

**Nota**:

La extensión DOM utiliza el codificado UTF-8 al utilizar los métodos o las propiedades.
Los métodos del analizador detectan automáticamente el codificado o permiten al llamante especificar un codificado.

# La clase Dom\HTMLDocument

(PHP 8 &gt;= 8.4.0)

## Introducción

    Representa un documento HTML.

## Sinopsis de la Clase

     final
     class **Dom\HTMLDocument**



     extends
      [Dom\Document](#class.dom-document)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [Dom\Node::DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades heredadas */
    public
     readonly
     [Dom\Implementation](#class.dom-implementation)
      [$implementation](#dom-document.props.implementation);

public
[string](#language.types.string)
[$URL](#dom-document.props.url);
public
[string](#language.types.string)
[$documentURI](#dom-document.props.documenturi);
public
[string](#language.types.string)
[$characterSet](#dom-document.props.characterset);
public
[string](#language.types.string)
[$charset](#dom-document.props.charset);
public
[string](#language.types.string)
[$inputEncoding](#dom-document.props.inputencoding);
public
readonly
?[Dom\DocumentType](#class.dom-documenttype)
[$doctype](#dom-document.props.doctype);
public
readonly
?[Dom\Element](#class.dom-element)
[$documentElement](#dom-document.props.documentelement);
public
readonly
?[Dom\Element](#class.dom-element)
[$firstElementChild](#dom-document.props.firstelementchild);
public
readonly
?[Dom\Element](#class.dom-element)
[$lastElementChild](#dom-document.props.lastelementchild);
public
readonly
[int](#language.types.integer)
[$childElementCount](#dom-document.props.childelementcount);
public
?[Dom\HTMLElement](#class.dom-htmlelement)
[$body](#dom-document.props.body);
public
readonly
?[Dom\HTMLElement](#class.dom-htmlelement)
[$head](#dom-document.props.head);
public
[string](#language.types.string)
[$title](#dom-document.props.title);

    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

public
readonly
[string](#language.types.string)
[$nodeName](#dom-node.props.nodename);
public
readonly
[string](#language.types.string)
[$baseURI](#dom-node.props.baseuri);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#dom-node.props.isconnected);
public
readonly
?[Dom\Document](#class.dom-document)
[$ownerDocument](#dom-node.props.ownerdocument);
public
readonly
?[Dom\Node](#class.dom-node)
[$parentNode](#dom-node.props.parentnode);
public
readonly
?[Dom\Element](#class.dom-element)
[$parentElement](#dom-node.props.parentelement);
public
readonly
[Dom\NodeList](#class.dom-nodelist)
[$childNodes](#dom-node.props.childnodes);
public
readonly
?[Dom\Node](#class.dom-node)
[$firstChild](#dom-node.props.firstchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$lastChild](#dom-node.props.lastchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$previousSibling](#dom-node.props.previoussibling);
public
readonly
?[Dom\Node](#class.dom-node)
[$nextSibling](#dom-node.props.nextsibling);
public
?[string](#language.types.string)
[$nodeValue](#dom-node.props.nodevalue);
public
?[string](#language.types.string)
[$textContent](#dom-node.props.textcontent);

    /* Métodos */

public static [createEmpty](#dom-htmldocument.createempty)([string](#language.types.string) $encoding = "UTF-8"): [Dom\HTMLDocument](#class.dom-htmldocument)
public static [createFromFile](#dom-htmldocument.createfromfile)([string](#language.types.string) $path, [int](#language.types.integer) $options = 0, [?](#language.types.null)[string](#language.types.string) $overrideEncoding = **[null](#constant.null)**): [Dom\HTMLDocument](#class.dom-htmldocument)
public static [createFromString](#dom-htmldocument.createfromstring)([string](#language.types.string) $source, [int](#language.types.integer) $options = 0, [?](#language.types.null)[string](#language.types.string) $overrideEncoding = **[null](#constant.null)**): [Dom\HTMLDocument](#class.dom-htmldocument)
public [saveHtml](#dom-htmldocument.savehtml)([?](#language.types.null)[Dom\Node](#class.dom-node) $node = **[null](#constant.null)**): [string](#language.types.string)
public [saveHtmlFile](#dom-htmldocument.savehtmlfile)([string](#language.types.string) $filename): [int](#language.types.integer)|[false](#language.types.singleton)
public [saveXml](#dom-htmldocument.savexml)([?](#language.types.null)[Dom\Node](#class.dom-node) $node = **[null](#constant.null)**, [int](#language.types.integer) $options = 0): [string](#language.types.string)|[false](#language.types.singleton)
public [saveXmlFile](#dom-htmldocument.savexmlfile)([string](#language.types.string) $filename, [int](#language.types.integer) $options = 0): [int](#language.types.integer)|[false](#language.types.singleton)

    /* Métodos heredados */
    /* No documentado aún */

}

## Notas

**Nota**:

La extensión DOM utiliza el codificado UTF-8 al utilizar los métodos o las propiedades.
Los métodos del analizador detectan automáticamente el codificado o permiten al llamante especificar un codificado.

# Dom\HTMLDocument::createEmpty

(PHP 8 &gt;= 8.4.0)

Dom\HTMLDocument::createEmpty — Crear un documento HTML vacío

### Descripción

public static **Dom\HTMLDocument::createEmpty**([string](#language.types.string) $encoding = "UTF-8"): [Dom\HTMLDocument](#class.dom-htmldocument)

Crear un documento HTML vacío sin ningún elemento.

### Parámetros

    encoding


      El juego de caracteres del documento, utilizado para la serialización al
      llamar a los métodos de guardado.


### Valores devueltos

Un documento HTML vacío.

### Ejemplos

**Ejemplo #1 Ejemplo de Dom\HTMLDocument::createEmpty()**

    Crear un documento vacío y serializarlo.

&lt;?php
$dom = Dom\HTMLDocument::createEmpty();
var_dump($dom-&gt;saveHtml());
?&gt;

El ejemplo anterior mostrará:

string(0) ""

### Ver también

- [Dom\HTMLDocument::createFromString()](#dom-htmldocument.createfromstring) - Analiza un documento HTML a partir de un string

- [Dom\HTMLDocument::createFromFile()](#dom-htmldocument.createfromfile) - Analiza un documento HTML a partir de un fichero

# Dom\HTMLDocument::createFromFile

(PHP 8 &gt;= 8.4.0)

Dom\HTMLDocument::createFromFile — Analiza un documento HTML a partir de un fichero

### Descripción

public static **Dom\HTMLDocument::createFromFile**([string](#language.types.string) $path, [int](#language.types.integer) $options = 0, [?](#language.types.null)[string](#language.types.string) $overrideEncoding = **[null](#constant.null)**): [Dom\HTMLDocument](#class.dom-htmldocument)

Analiza un documento HTML a partir de un fichero,
según la norma vigente.

### Parámetros

    path


      La ruta de acceso del fichero a analizar.




    options



[Operación de 'OR' lógica](#language.operators.bitwise)
de las [constantes de opción libxml](#libxml.constants).

También es posible pasar **[Dom\HTML_NO_DEFAULT_NS](#constant.dom-html-no-default-ns)**
para desactivar el uso del espacio de nombres HTML y del elemento template.
Esto solo debería ser utilizado si las implicaciones son correctamente comprendidas.

    overrideEncoding



El codificado en el cual el documento fue creado.
Si no se proporciona, intentará determinar el codificado más probable utilizado.

### Valores devueltos

El documento analizado en forma de una instancia de [Dom\HTMLDocument](#class.dom-htmldocument).

### Errores/Excepciones

- Genera una [ValueError](#class.valueerror) si
  path contiene bytes nulos o contiene
  "%00".

-

Levanta una excepción [ValueError](#class.valueerror) si
options contiene una opción inválida.

- Levanta una excepción [ValueError](#class.valueerror) si
  overrideEncoding utiliza un codificado desconocido.
    - Genera una [ValueError](#class.valueerror) si
      el fichero no ha podido ser abierto.

### Notas

**Nota**:

Los espacios en blanco en las etiquetas html y head
no son considerados significativos y pueden perder su formato.

### Ver también

- [Dom\HTMLDocument::createEmpty()](#dom-htmldocument.createempty) - Crear un documento HTML vacío

- [Dom\HTMLDocument::createFromString()](#dom-htmldocument.createfromstring) - Analiza un documento HTML a partir de un string

# Dom\HTMLDocument::createFromString

(PHP 8 &gt;= 8.4.0)

Dom\HTMLDocument::createFromString — Analiza un documento HTML a partir de un string

### Descripción

public static **Dom\HTMLDocument::createFromString**([string](#language.types.string) $source, [int](#language.types.integer) $options = 0, [?](#language.types.null)[string](#language.types.string) $overrideEncoding = **[null](#constant.null)**): [Dom\HTMLDocument](#class.dom-htmldocument)

Analiza un documento HTML a partir de un string,
según la norma vigente.

### Parámetros

    source


      El string que contiene el HTML a analizar.




    options



[Operación de 'OR' lógica](#language.operators.bitwise)
de las [constantes de opción libxml](#libxml.constants).

También es posible pasar **[Dom\HTML_NO_DEFAULT_NS](#constant.dom-html-no-default-ns)**
para desactivar el uso del espacio de nombres HTML y del elemento template.
Esto solo debería ser utilizado si las implicaciones son correctamente comprendidas.

    overrideEncoding



El codificado en el cual el documento fue creado.
Si no se proporciona, intentará determinar el codificado más probable utilizado.

### Valores devueltos

El documento analizado en forma de una instancia de [Dom\HTMLDocument](#class.dom-htmldocument).

### Errores/Excepciones

-

Levanta una excepción [ValueError](#class.valueerror) si
options contiene una opción inválida.

- Levanta una excepción [ValueError](#class.valueerror) si
  overrideEncoding utiliza un codificado desconocido.

    ### Ejemplos

    **Ejemplo #1 Ejemplo de Dom\HTMLDocument::createFromString()**

    Analiza un documento de ejemplo.

&lt;?php
$dom = Dom\HTMLDocument::createFromString(&lt;&lt;&lt;'HTML'
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;body&gt;
&lt;p&gt;Hello, world!&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;
HTML);
echo $dom-&gt;saveHtml();
?&gt;

El ejemplo anterior mostrará:

&lt;!DOCTYPE html&gt;&lt;html&gt;&lt;head&gt;&lt;/head&gt;&lt;body&gt;
&lt;p&gt;Hello, world!&lt;/p&gt;

&lt;/body&gt;&lt;/html&gt;

### Notas

**Nota**:

Los espacios en blanco en las etiquetas html y head
no son considerados significativos y pueden perder su formato.

### Ver también

- [Dom\HTMLDocument::createEmpty()](#dom-htmldocument.createempty) - Crear un documento HTML vacío

- [Dom\HTMLDocument::createFromFile()](#dom-htmldocument.createfromfile) - Analiza un documento HTML a partir de un fichero

# Dom\HTMLDocument::saveHtml

(PHP 8 &gt;= 8.4.0)

Dom\HTMLDocument::saveHtml — Serializa el documento como string HTML

### Descripción

public **Dom\HTMLDocument::saveHtml**([?](#language.types.null)[Dom\Node](#class.dom-node) $node = **[null](#constant.null)**): [string](#language.types.string)

Serializa el documento como string HTML.

### Parámetros

    node


      El nodo a serializar.
      Si no se proporciona, se serializa todo el documento.


### Valores devueltos

El documento HTML serializado como string en la codificación del
documento actual.

### Errores/Excepciones

-

Levanta una excepción **Dom\DOMException** con el código
**[Dom\WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)** si el node
proviene de otro documento.

### Ver también

- [Dom\HTMLDocument::saveHtmlFile()](#dom-htmldocument.savehtmlfile) - Serializa el documento en forma de fichero HTML

- [Dom\HTMLDocument::saveXml()](#dom-htmldocument.savexml) - Serializa el documento como un string XML

# Dom\HTMLDocument::saveHtmlFile

(PHP 8 &gt;= 8.4.0)

Dom\HTMLDocument::saveHtmlFile — Serializa el documento en forma de fichero HTML

### Descripción

public **Dom\HTMLDocument::saveHtmlFile**([string](#language.types.string) $filename): [int](#language.types.integer)|[false](#language.types.singleton)

Serializa el documento en forma de fichero HTML.

### Parámetros

    filename


      La ruta de acceso del fichero en el que guardar el documento.


### Valores devueltos

El número de bytes escritos en caso de éxito, o **[false](#constant.false)** en caso de fallo.

### Errores/Excepciones

- Genera una [ValueError](#class.valueerror) si
  filename es un string vacío o contiene
  bytes nulos.

### Ver también

- [Dom\HTMLDocument::saveHtml()](#dom-htmldocument.savehtml) - Serializa el documento como string HTML

- [Dom\HTMLDocument::saveXmlFile()](#dom-htmldocument.savexmlfile) - Serializa el documento en forma de fichero XML

# Dom\HTMLDocument::saveXml

(PHP 8 &gt;= 8.4.0)

Dom\HTMLDocument::saveXml — Serializa el documento como un string XML

### Descripción

public **Dom\HTMLDocument::saveXml**([?](#language.types.null)[Dom\Node](#class.dom-node) $node = **[null](#constant.null)**, [int](#language.types.integer) $options = 0): [string](#language.types.string)|[false](#language.types.singleton)

Serializa el documento como un string XML.

### Parámetros

    node


      El nodo a serializar.
      Si no se proporciona, se serializa el documento completo.




    options



Opciones adicionales.
Las opciones **[LIBXML_NOEMPTYTAG](#constant.libxml-noemptytag)**
y **[LIBXML_NOXMLDECL](#constant.libxml-noxmldecl)** son soportadas.
Antes de PHP 8.3.0, solo la opción **[LIBXML_NOEMPTYTAG](#constant.libxml-noemptytag)**
era soportada.

### Valores devueltos

El documento XML serializado como un string en la codificación del
documento actual, o **[false](#constant.false)** en caso de fallo.

### Errores/Excepciones

-

Levanta una excepción **Dom\DOMException** con el código
**[Dom\WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)** si el node
proviene de otro documento.

### Ver también

- [Dom\HTMLDocument::saveXmlFile()](#dom-htmldocument.savexmlfile) - Serializa el documento en forma de fichero XML

- **Dom\XMLDocument::saveHtml()**

# Dom\HTMLDocument::saveXmlFile

(PHP 8 &gt;= 8.4.0)

Dom\HTMLDocument::saveXmlFile — Serializa el documento en forma de fichero XML

### Descripción

public **Dom\HTMLDocument::saveXmlFile**([string](#language.types.string) $filename, [int](#language.types.integer) $options = 0): [int](#language.types.integer)|[false](#language.types.singleton)

Serializa el documento en forma de fichero XML.

### Parámetros

    filename


      La ruta de acceso del fichero en el que guardar el documento.




    options



Opciones adicionales.
Las opciones **[LIBXML_NOEMPTYTAG](#constant.libxml-noemptytag)**
y **[LIBXML_NOXMLDECL](#constant.libxml-noxmldecl)** son soportadas.
Antes de PHP 8.3.0, solo la opción **[LIBXML_NOEMPTYTAG](#constant.libxml-noemptytag)**
era soportada.

### Valores devueltos

El número de bytes escritos en caso de éxito, o **[false](#constant.false)** en caso de fallo.

### Errores/Excepciones

- Genera una [ValueError](#class.valueerror) si
  filename es un string vacío o contiene bytes nulos.

### Ver también

- [Dom\HTMLDocument::saveXml()](#dom-htmldocument.savexml) - Serializa el documento como un string XML

- [Dom\HTMLDocument::saveHtmlFile()](#dom-htmldocument.savehtmlfile) - Serializa el documento en forma de fichero HTML

## Tabla de contenidos

- [Dom\HTMLDocument::createEmpty](#dom-htmldocument.createempty) — Crear un documento HTML vacío
- [Dom\HTMLDocument::createFromFile](#dom-htmldocument.createfromfile) — Analiza un documento HTML a partir de un fichero
- [Dom\HTMLDocument::createFromString](#dom-htmldocument.createfromstring) — Analiza un documento HTML a partir de un string
- [Dom\HTMLDocument::saveHtml](#dom-htmldocument.savehtml) — Serializa el documento como string HTML
- [Dom\HTMLDocument::saveHtmlFile](#dom-htmldocument.savehtmlfile) — Serializa el documento en forma de fichero HTML
- [Dom\HTMLDocument::saveXml](#dom-htmldocument.savexml) — Serializa el documento como un string XML
- [Dom\HTMLDocument::saveXmlFile](#dom-htmldocument.savexmlfile) — Serializa el documento en forma de fichero XML

# La clase Dom\HTMLElement

(PHP 8 &gt;= 8.4.0)

## Introducción

    Representa un elemento en el espacio de nombres HTML.

## Sinopsis de la Clase

     class **Dom\HTMLElement**



     extends
      [Dom\Element](#class.dom-element)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [Dom\Node::DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades heredadas */
    public
     readonly
     ?[string](#language.types.string)
      [$namespaceURI](#dom-element.props.namespaceuri);

public
readonly
?[string](#language.types.string)
[$prefix](#dom-element.props.prefix);
public
readonly
[string](#language.types.string)
[$localName](#dom-element.props.localname);
public
readonly
[string](#language.types.string)
[$tagName](#dom-element.props.tagname);
public
[string](#language.types.string)
[$id](#dom-element.props.id);
public
[string](#language.types.string)
[$className](#dom-element.props.classname);
public
readonly
[Dom\TokenList](#class.dom-tokenlist)
[$classList](#dom-element.props.classlist);
public
readonly
[Dom\NamedNodeMap](#class.dom-namednodemap)
[$attributes](#dom-element.props.attributes);
public
readonly
?[Dom\Element](#class.dom-element)
[$firstElementChild](#dom-element.props.firstelementchild);
public
readonly
?[Dom\Element](#class.dom-element)
[$lastElementChild](#dom-element.props.lastelementchild);
public
readonly
[int](#language.types.integer)
[$childElementCount](#dom-element.props.childelementcount);
public
readonly
?[Dom\Element](#class.dom-element)
[$previousElementSibling](#dom-element.props.previouselementsibling);
public
readonly
?[Dom\Element](#class.dom-element)
[$nextElementSibling](#dom-element.props.nextelementsibling);
public
[string](#language.types.string)
[$innerHTML](#dom-element.props.innerhtml);
public
[string](#language.types.string)
[$substitutedNodeValue](#dom-element.props.substitutednodevalue);

    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

public
readonly
[string](#language.types.string)
[$nodeName](#dom-node.props.nodename);
public
readonly
[string](#language.types.string)
[$baseURI](#dom-node.props.baseuri);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#dom-node.props.isconnected);
public
readonly
?[Dom\Document](#class.dom-document)
[$ownerDocument](#dom-node.props.ownerdocument);
public
readonly
?[Dom\Node](#class.dom-node)
[$parentNode](#dom-node.props.parentnode);
public
readonly
?[Dom\Element](#class.dom-element)
[$parentElement](#dom-node.props.parentelement);
public
readonly
[Dom\NodeList](#class.dom-nodelist)
[$childNodes](#dom-node.props.childnodes);
public
readonly
?[Dom\Node](#class.dom-node)
[$firstChild](#dom-node.props.firstchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$lastChild](#dom-node.props.lastchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$previousSibling](#dom-node.props.previoussibling);
public
readonly
?[Dom\Node](#class.dom-node)
[$nextSibling](#dom-node.props.nextsibling);
public
?[string](#language.types.string)
[$nodeValue](#dom-node.props.nodevalue);
public
?[string](#language.types.string)
[$textContent](#dom-node.props.textcontent);

    /* Métodos heredados */
    /* Aún no documentado */

}

## Notas

**Nota**:

La extensión DOM utiliza el codificado UTF-8 al utilizar los métodos o las propiedades.
Los métodos del analizador detectan automáticamente el codificado o permiten al llamante especificar un codificado.

# La clase Dom\Implementation

(PHP 8 &gt;= 8.4.0)

## Introducción

    Esta clase proporciona un número de
    métodos para realizar operaciones que son independientes
    de una instancia particular del modelo objeto de un documento.





    Esta es la versión moderna y conforme a las especificaciones de
    [DOMImplementation](#class.domimplementation).

## Sinopsis de la Clase

     class **Dom\Implementation**
     {

    /* Métodos */
    /* Aún no documentado */

}

# La clase Dom\NamedNodeMap

(PHP 8 &gt;= 8.4.0)

## Introducción

    Representa el conjunto de atributos en un elemento.

## Sinopsis de la Clase

     class **Dom\NamedNodeMap**



     implements
      [IteratorAggregate](#class.iteratoraggregate),

     [Countable](#class.countable) {

    /* Propiedades */

     public
     readonly
     [int](#language.types.integer)
      [$length](#dom-namednodemap.props.length);


    /* Métodos */
    /* Aún no documentado */

}

## Propiedades

     length

      El número de atributos.


## Notas

**Nota**:

La extensión DOM utiliza el codificado UTF-8 al utilizar los métodos o las propiedades.
Los métodos del analizador detectan automáticamente el codificado o permiten al llamante especificar un codificado.

# La clase Dom\NamespaceInfo

(PHP 8 &gt;= 8.4.0)

## Introducción

    Representa información inmutable sobre los espacios de nombres de un elemento.
    Esto desacopla los espacios de nombres de los atributos, que estaban incorrectamente entrelazados en las antiguas clases DOM.

## Sinopsis de la Clase

     final
     readonly
     class **Dom\NamespaceInfo**
     {

    /* Propiedades */

     public
     ?[string](#language.types.string)
      [$prefix](#dom-namespaceinfo.props.prefix);

    public
     ?[string](#language.types.string)
      [$namespaceURI](#dom-namespaceinfo.props.namespaceuri);

    public
     [Dom\Element](#class.dom-element)
      [$element](#dom-namespaceinfo.props.element);

}

## Propiedades

     prefix

      El prefijo del espacio de nombres del atributo.



     namespaceURI

      El URI del espacio de nombres del atributo.



     element

      El elemento concernido por esta información de espacio de nombres.


# La clase Dom\Node

(PHP 8 &gt;= 8.4.0)

## Introducción

    Esta es la versión moderna y conforme a las especificaciones de
    [DOMNode](#class.domnode).

## Sinopsis de la Clase

     class **Dom\Node**
     {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

    public
     const
     [int](#language.types.integer)
      [DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;

    public
     const
     [int](#language.types.integer)
      [DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;

    public
     const
     [int](#language.types.integer)
      [DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;

    public
     const
     [int](#language.types.integer)
      [DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;

    public
     const
     [int](#language.types.integer)
      [DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;


    /* Propiedades */
    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

    public
     readonly
     [string](#language.types.string)
      [$nodeName](#dom-node.props.nodename);

    public
     readonly
     [string](#language.types.string)
      [$baseURI](#dom-node.props.baseuri);

    public
     readonly
     [bool](#language.types.boolean)
      [$isConnected](#dom-node.props.isconnected);

    public
     readonly
     ?[Dom\Document](#class.dom-document)
      [$ownerDocument](#dom-node.props.ownerdocument);

    public
     readonly
     ?[Dom\Node](#class.dom-node)
      [$parentNode](#dom-node.props.parentnode);

    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$parentElement](#dom-node.props.parentelement);

    public
     readonly
     [Dom\NodeList](#class.dom-nodelist)
      [$childNodes](#dom-node.props.childnodes);

    public
     readonly
     ?[Dom\Node](#class.dom-node)
      [$firstChild](#dom-node.props.firstchild);

    public
     readonly
     ?[Dom\Node](#class.dom-node)
      [$lastChild](#dom-node.props.lastchild);

    public
     readonly
     ?[Dom\Node](#class.dom-node)
      [$previousSibling](#dom-node.props.previoussibling);

    public
     readonly
     ?[Dom\Node](#class.dom-node)
      [$nextSibling](#dom-node.props.nextsibling);

    public
     ?[string](#language.types.string)
      [$nodeValue](#dom-node.props.nodevalue);

    public
     ?[string](#language.types.string)
      [$textContent](#dom-node.props.textcontent);


    /* Métodos */
    /* Aún no documentado */

}

## Constantes predefinidas

      **[DOMNode::DOCUMENT_POSITION_DISCONNECTED](#domnode.constants.document-position-disconnected)**


       Definido cuando el otro nódo y el nódo de referencia no están en el mismo árbol.





      **[DOMNode::DOCUMENT_POSITION_PRECEDING](#domnode.constants.document-position-preceding)**


       Definido cuando el otro nódo precede al nódo de referencia.





      **[DOMNode::DOCUMENT_POSITION_FOLLOWING](#domnode.constants.document-position-following)**


       Definido cuando el otro nódo sigue al nódo de referencia.





      **[DOMNode::DOCUMENT_POSITION_CONTAINS](#domnode.constants.document-position-contains)**


       Definido cuando el otro nódo es un ancestro del nódo de referencia.





      **[DOMNode::DOCUMENT_POSITION_CONTAINED_BY](#domnode.constants.document-position-contained-by)**


       Definido cuando el otro nódo es un descendiente del nódo de referencia.





      **[DOMNode::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#domnode.constants.document-position-implementation-specific)**


       Definido cuando el resultado depende de un comportamiento específico de la implementación y
       puede no ser portable.
       Esto puede ocurrir con nódulos desconectados o con nódulos de atributos.



## Propiedades

     nodeType
      Recupera el tipo del nódo. Una de las [constantes XML_*_NODE](#dom.constants)





     nodeName

      Devuelve el nombre más preciso para el tipo de nodo actual.

       - Para los elementos, es el nombre calificado en mayúsculas HTML.

       - Para los atributos, es el nombre calificado.

       - Para las instrucciones de procesamiento, es el objetivo.

       - Para los nodos de tipo documento, es el nombre.





     baseURI

       La base de la URL absoluta del nódo, o **[null](#constant.null)** si la implementación
       no ha logrado obtener la URL absoluta.






     isConnected
      Si el nódo está conectado a un documento o no.





     ownerDocument


       El objeto [Dom\Document](#class.dom-document) asociado
       a este nodo, o **[null](#constant.null)** si este nodo es un documento.




     parentNode
      El padre de este nódo. Si este tipo de nódo no existe, esto devolverá **[null](#constant.null)**.





     parentElement
      El elemento padre de este elemento. Si no hay tal elemento, esto devuelve **[null](#constant.null)**.





     childNodes


       Un objeto [Dom\NodeList](#class.dom-nodelist) que contiene todos
       los hijos de este nodo. Si no hay hijos, es un
       [Dom\NodeList](#class.dom-nodelist).




     firstChild

       El primer hijo de este nódo. Si no hay nódo de este tipo,
       devuelve **[null](#constant.null)**.






     lastChild
      El último hijo de este nódo. Si no hay nódo de este tipo,
       devuelve **[null](#constant.null)**.





     previousSibling

       El nódo que precede inmediatamente a este nódo. Si no hay
       nódo, devuelve **[null](#constant.null)**.






     nextSibling

       El nódo que sigue inmediatamente a este nódo. Si no hay nódo,
       devuelve **[null](#constant.null)**.






     nodeValue


       El valor de este nodo, según su tipo.




     textContent
      El contenido textual de este nódo y sus descendientes.




## Notas

**Nota**:

La extensión DOM utiliza el codificado UTF-8 al utilizar los métodos o las propiedades.
Los métodos del analizador detectan automáticamente el codificado o permiten al llamante especificar un codificado.

## Ver también

    - [» Especificación WHATWG de Node](https://dom.spec.whatwg.org/#interface-node)

# La clase [Dom\NodeList](#class.dom-nodelist)

(PHP 8 &gt;= 8.4.0)

## Introducción

      Representa una lista dinámica de nodos.




    Este es el equivalente moderno y conforme a las especificaciones de
    [DOMNodeList](#class.domnodelist).

## Sinopsis de la Clase

     class **Dom\NodeList**



     implements
      [IteratorAggregate](#class.iteratoraggregate),

     [Countable](#class.countable) {

    /* Propiedades */

     public
     readonly
     [int](#language.types.integer)
      [$length](#dom-nodelist.props.length);


    /* Métodos */
    /* Aún no documentado */

}

## Propiedades

     length

       El número de nodos en la lista. El intervalo válido
       de los índices de los nodos hijos es 0 a length - 1, inclusivo.





# La clase Dom\Notation

(PHP 8 &gt;= 8.4.0)

## Sinopsis de la Clase

     class **Dom\Notation**



     extends
      [Dom\Node](#class.dom-node)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [Dom\Node::DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     [string](#language.types.string)
      [$publicId](#dom-notation.props.publicid);

    public
     readonly
     [string](#language.types.string)
      [$systemId](#dom-notation.props.systemid);


    /* Propiedades heredadas */
    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

public
readonly
[string](#language.types.string)
[$nodeName](#dom-node.props.nodename);
public
readonly
[string](#language.types.string)
[$baseURI](#dom-node.props.baseuri);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#dom-node.props.isconnected);
public
readonly
?[Dom\Document](#class.dom-document)
[$ownerDocument](#dom-node.props.ownerdocument);
public
readonly
?[Dom\Node](#class.dom-node)
[$parentNode](#dom-node.props.parentnode);
public
readonly
?[Dom\Element](#class.dom-element)
[$parentElement](#dom-node.props.parentelement);
public
readonly
[Dom\NodeList](#class.dom-nodelist)
[$childNodes](#dom-node.props.childnodes);
public
readonly
?[Dom\Node](#class.dom-node)
[$firstChild](#dom-node.props.firstchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$lastChild](#dom-node.props.lastchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$previousSibling](#dom-node.props.previoussibling);
public
readonly
?[Dom\Node](#class.dom-node)
[$nextSibling](#dom-node.props.nextsibling);
public
?[string](#language.types.string)
[$nodeValue](#dom-node.props.nodevalue);
public
?[string](#language.types.string)
[$textContent](#dom-node.props.textcontent);

    /* Métodos heredados */
    /* Aún no documentado */

}

## Propiedades

     publicId
      El identificador público asociado a la notación.



     systemId
      El identificador de sistema asociado a la notación.


# La interfaz Dom\ParentNode

(PHP 8 &gt;= 8.4.0)

## Introducción

    Esta es la versión moderna y conforme a las especificaciones de
    [DOMParentNode](#class.domparentnode).

## Sinopsis de la Interfaz

     interface **Dom\ParentNode** {

    /* Métodos */

public [append](#dom-parentnode.append)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [prepend](#dom-parentnode.prepend)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [querySelector](#dom-parentnode.queryselector)([string](#language.types.string) $selectors): [?](#language.types.null)[Dom\Element](#class.dom-element)
public [querySelectorAll](#dom-parentnode.queryselectorall)([string](#language.types.string) $selectors): [Dom\NodeList](#class.dom-nodelist)
public [replaceChildren](#dom-parentnode.replacechildren)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

}

# Dom\ParentNode::append

(PHP 8 &gt;= 8.4.0)

Dom\ParentNode::append — Añade nodos después del último nodo hijo

### Descripción

public **Dom\ParentNode::append**([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade uno o varios nodes a la lista de hijos después del último nodo hijo.

### Parámetros

     nodes


       Los nodos a añadir.
       Las cadenas de caracteres se convierten automáticamente en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si este nodo es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Ver también

- [Dom\ParentNode::prepend()](#dom-parentnode.prepend) - Añade nodos antes del primer nodo hijo

# Dom\ParentNode::prepend

(PHP 8 &gt;= 8.4.0)

Dom\ParentNode::prepend — Añade nodos antes del primer nodo hijo

### Descripción

public **Dom\ParentNode::prepend**([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Añade uno o varios nodes a la lista de hijos antes del primer nodo hijo.

### Parámetros

     nodes


       Los nodos a añadir.
       Las cadenas de caracteres se convierten automáticamente en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si este nodo es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Ver también

- [Dom\ParentNode::append()](#dom-parentnode.append) - Añade nodos después del último nodo hijo

# Dom\ParentNode::querySelector

(PHP 8 &gt;= 8.4.0)

Dom\ParentNode::querySelector — Devuelve el primer elemento que coincide con los selectores CSS

### Descripción

public **Dom\ParentNode::querySelector**([string](#language.types.string) $selectors): [?](#language.types.null)[Dom\Element](#class.dom-element)

Devuelve el primer elemento que coincide con los selectores CSS especificados
en selectors.

### Parámetros

    selectors


      Un string que contiene uno o varios selectores CSS.


### Valores devueltos

Devuelve el primer [Dom\Element](#class.dom-element) que coincide con
selectors. Devuelve **[null](#constant.null)** si ningún elemento coincide.

### Errores/Excepciones

Lanza una [DOMException](#class.domexception) con el código
**[Dom\SYNTAX_ERR](#constant.dom-syntax-err)** cuando selectors
no es un string de selector CSS válido.

### Ver también

- [Dom\ParentNode::querySelectorAll()](#dom-parentnode.queryselectorall) - Devuelve una colección de elementos que coinciden con los selectores CSS

# Dom\ParentNode::querySelectorAll

(PHP 8 &gt;= 8.4.0)

Dom\ParentNode::querySelectorAll — Devuelve una colección de elementos que coinciden con los selectores CSS

### Descripción

public **Dom\ParentNode::querySelectorAll**([string](#language.types.string) $selectors): [Dom\NodeList](#class.dom-nodelist)

Devuelve una colección de elementos que coinciden con los selectores CSS especificados
en selectors.

### Parámetros

    selectors


      Un string que contiene uno o varios selectores CSS.


### Valores devueltos

Devuelve una colección estática de elementos que coinciden con los selectores CSS
especificados en selectors.

### Errores/Excepciones

Lanza una [DOMException](#class.domexception) con el código
**[Dom\SYNTAX_ERR](#constant.dom-syntax-err)** cuando selectors
no es un string de selector CSS válido.

### Ver también

- [Dom\ParentNode::querySelector()](#dom-parentnode.queryselector) - Devuelve el primer elemento que coincide con los selectores CSS

# Dom\ParentNode::replaceChildren

(PHP 8 &gt;= 8.4.0)

Dom\ParentNode::replaceChildren — Reemplaza los hijos en un nodo

### Descripción

public **Dom\ParentNode::replaceChildren**([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

Reemplaza los hijos en un nodo.

### Parámetros

     nodes


       Los nodos que reemplazan a los hijos.
       Las cadenas de caracteres se convierten automáticamente en nodos de texto.





### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

**[DOM_HIERARCHY_REQUEST_ERR](#constant.dom-hierarchy-request-err)**

    Se levanta si este nodo es de un tipo que no permite hijos del
    tipo de uno de los nodes transmitidos, o si el nodo a
    insertar es uno de los ancestros de este nodo o este nodo mismo.

**[DOM_WRONG_DOCUMENT_ERR](#constant.dom-wrong-document-err)**

    Se levanta si uno de los nodes transmitidos ha sido creado a partir de un documento diferente
    del que creó este nodo.

### Ejemplos

**Ejemplo #1 Ejemplo de Dom\ParentNode::replaceChildren()**

&lt;?php
$dom = Dom\HTMLDocument::createFromString('&lt;!DOCTYPE HTML&gt;&lt;html&gt;&lt;p&gt;hi&lt;/p&gt; test &lt;p&gt;hi2&lt;/p&gt;&lt;/html&gt;');

$dom-&gt;documentElement-&gt;replaceChildren('foo', $dom-&gt;createElement('p'), 'bar');
echo $dom-&gt;saveHtml();
?&gt;

El ejemplo anterior mostrará:

&lt;!DOCTYPE html&gt;&lt;html&gt;foo&lt;p&gt;&lt;/p&gt;bar&lt;/html&gt;

## Tabla de contenidos

- [Dom\ParentNode::append](#dom-parentnode.append) — Añade nodos después del último nodo hijo
- [Dom\ParentNode::prepend](#dom-parentnode.prepend) — Añade nodos antes del primer nodo hijo
- [Dom\ParentNode::querySelector](#dom-parentnode.queryselector) — Devuelve el primer elemento que coincide con los selectores CSS
- [Dom\ParentNode::querySelectorAll](#dom-parentnode.queryselectorall) — Devuelve una colección de elementos que coinciden con los selectores CSS
- [Dom\ParentNode::replaceChildren](#dom-parentnode.replacechildren) — Reemplaza los hijos en un nodo

# La clase Dom\ProcessingInstruction

(PHP 8 &gt;= 8.4.0)

## Introducción

    Esto representa un nodo de instrucción de procesamiento (PI).
    Estos nodos están destinados a indicar zonas de datos destinadas al procesamiento por aplicaciones específicas.




    Este es el equivalente moderno y conforme a las especificaciones de
    [DOMProcessingInstruction](#class.domprocessinginstruction).

## Sinopsis de la Clase

     class **Dom\ProcessingInstruction**



     extends
      [Dom\CharacterData](#class.dom-characterdata)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [Dom\Node::DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     [string](#language.types.string)
      [$target](#dom-processinginstruction.props.target);


    /* Propiedades heredadas */
    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$previousElementSibling](#dom-characterdata.props.previouselementsibling);

public
readonly
?[Dom\Element](#class.dom-element)
[$nextElementSibling](#dom-characterdata.props.nextelementsibling);
public
[string](#language.types.string)
[$data](#dom-characterdata.props.data);
public
readonly
[int](#language.types.integer)
[$length](#dom-characterdata.props.length);

    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

public
readonly
[string](#language.types.string)
[$nodeName](#dom-node.props.nodename);
public
readonly
[string](#language.types.string)
[$baseURI](#dom-node.props.baseuri);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#dom-node.props.isconnected);
public
readonly
?[Dom\Document](#class.dom-document)
[$ownerDocument](#dom-node.props.ownerdocument);
public
readonly
?[Dom\Node](#class.dom-node)
[$parentNode](#dom-node.props.parentnode);
public
readonly
?[Dom\Element](#class.dom-element)
[$parentElement](#dom-node.props.parentelement);
public
readonly
[Dom\NodeList](#class.dom-nodelist)
[$childNodes](#dom-node.props.childnodes);
public
readonly
?[Dom\Node](#class.dom-node)
[$firstChild](#dom-node.props.firstchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$lastChild](#dom-node.props.lastchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$previousSibling](#dom-node.props.previoussibling);
public
readonly
?[Dom\Node](#class.dom-node)
[$nextSibling](#dom-node.props.nextsibling);
public
?[string](#language.types.string)
[$nodeValue](#dom-node.props.nodevalue);
public
?[string](#language.types.string)
[$textContent](#dom-node.props.textcontent);

    /* Métodos heredados */

public [Dom\CharacterData::after](#dom-characterdata.after)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [Dom\CharacterData::appendData](#dom-characterdata.appenddata)([string](#language.types.string) $data): [void](language.types.void.html)
public [Dom\CharacterData::before](#dom-characterdata.before)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [Dom\CharacterData::deleteData](#dom-characterdata.deletedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [void](language.types.void.html)
public [Dom\CharacterData::insertData](#dom-characterdata.insertdata)([int](#language.types.integer) $offset, [string](#language.types.string) $data): [void](language.types.void.html)
public [Dom\CharacterData::remove](#dom-characterdata.remove)(): [void](language.types.void.html)
public [Dom\CharacterData::replaceData](#dom-characterdata.replacedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count, [string](#language.types.string) $data): [void](language.types.void.html)
public [Dom\CharacterData::replaceWith](#dom-characterdata.replacewith)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [Dom\CharacterData::substringData](#dom-characterdata.substringdata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [string](#language.types.string)

    /* Aún no documentado */

}

## Propiedades

     target
      Una cadena que representa la aplicación para la cual los datos están destinados.


# La clase Dom\Text

(PHP 8 &gt;= 8.4.0)

## Introducción

    La clase **Dom\Text** hereda de
    [Dom\CharacterData](#class.dom-characterdata) y representa un nodo de texto.




    Este es el equivalente moderno y conforme a las especificaciones de
    [DOMText](#class.domtext).

## Sinopsis de la Clase

     class **Dom\Text**



     extends
      [Dom\CharacterData](#class.dom-characterdata)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [Dom\Node::DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     [string](#language.types.string)
      [$wholeText](#dom-text.props.wholetext);


    /* Propiedades heredadas */
    public
     readonly
     ?[Dom\Element](#class.dom-element)
      [$previousElementSibling](#dom-characterdata.props.previouselementsibling);

public
readonly
?[Dom\Element](#class.dom-element)
[$nextElementSibling](#dom-characterdata.props.nextelementsibling);
public
[string](#language.types.string)
[$data](#dom-characterdata.props.data);
public
readonly
[int](#language.types.integer)
[$length](#dom-characterdata.props.length);

    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

public
readonly
[string](#language.types.string)
[$nodeName](#dom-node.props.nodename);
public
readonly
[string](#language.types.string)
[$baseURI](#dom-node.props.baseuri);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#dom-node.props.isconnected);
public
readonly
?[Dom\Document](#class.dom-document)
[$ownerDocument](#dom-node.props.ownerdocument);
public
readonly
?[Dom\Node](#class.dom-node)
[$parentNode](#dom-node.props.parentnode);
public
readonly
?[Dom\Element](#class.dom-element)
[$parentElement](#dom-node.props.parentelement);
public
readonly
[Dom\NodeList](#class.dom-nodelist)
[$childNodes](#dom-node.props.childnodes);
public
readonly
?[Dom\Node](#class.dom-node)
[$firstChild](#dom-node.props.firstchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$lastChild](#dom-node.props.lastchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$previousSibling](#dom-node.props.previoussibling);
public
readonly
?[Dom\Node](#class.dom-node)
[$nextSibling](#dom-node.props.nextsibling);
public
?[string](#language.types.string)
[$nodeValue](#dom-node.props.nodevalue);
public
?[string](#language.types.string)
[$textContent](#dom-node.props.textcontent);

    /* Métodos */

public [splitText](#dom-text.splittext)([int](#language.types.integer) $offset): [Dom\Text](#class.dom-text)

    /* Métodos heredados */
    public [Dom\CharacterData::after](#dom-characterdata.after)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)

public [Dom\CharacterData::appendData](#dom-characterdata.appenddata)([string](#language.types.string) $data): [void](language.types.void.html)
public [Dom\CharacterData::before](#dom-characterdata.before)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [Dom\CharacterData::deleteData](#dom-characterdata.deletedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [void](language.types.void.html)
public [Dom\CharacterData::insertData](#dom-characterdata.insertdata)([int](#language.types.integer) $offset, [string](#language.types.string) $data): [void](language.types.void.html)
public [Dom\CharacterData::remove](#dom-characterdata.remove)(): [void](language.types.void.html)
public [Dom\CharacterData::replaceData](#dom-characterdata.replacedata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count, [string](#language.types.string) $data): [void](language.types.void.html)
public [Dom\CharacterData::replaceWith](#dom-characterdata.replacewith)([Dom\Node](#class.dom-node)|[string](#language.types.string) ...$nodes): [void](language.types.void.html)
public [Dom\CharacterData::substringData](#dom-characterdata.substringdata)([int](#language.types.integer) $offset, [int](#language.types.integer) $count): [string](#language.types.string)

    /* Aún no documentado */

}

## Propiedades

     wholeText

       Contiene todo el texto de los nodos de texto adyacentes
       (es decir, nodos que no están separados por
       etiquetas Element, Comment o Processing Instruction).





# Dom\Text::splitText

(PHP 8 &gt;= 8.4.0)

Dom\Text::splitText —
Rompe este nodo en dos nodos en el índice especificado

### Descripción

public **Dom\Text::splitText**([int](#language.types.integer) $offset): [Dom\Text](#class.dom-text)

Rompe este nodo en dos nodos en el índice especificado por offset,
manteniéndolos en el árbol como hermanos.

### Parámetros

     offset


       El índice en el que se hace la separación, comenzando en 0.





### Valores devueltos

El nuevo nodo del mismo tipo, que contiene todo el contenido desde y después de
offset.

## Tabla de contenidos

- [Dom\Text::splitText](#dom-text.splittext) — Rompe este nodo en dos nodos en el índice especificado

# La clase Dom\TokenList

(PHP 8 &gt;= 8.4.0)

## Introducción

    Representa un conjunto de tokens en un atributo (por ejemplo, nombres de clases).

## Sinopsis de la Clase

     final
     class **Dom\TokenList**



     implements
      [IteratorAggregate](#class.iteratoraggregate),

     [Countable](#class.countable) {

    /* Propiedades */

     public
     readonly
     [int](#language.types.integer)
      [$length](#dom-tokenlist.props.length);

    public
     [string](#language.types.string)
      [$value](#dom-tokenlist.props.value);


    /* Métodos */

public [add](#dom-tokenlist.add)([string](#language.types.string) ...$tokens): [void](language.types.void.html)
public [contains](#dom-tokenlist.contains)([string](#language.types.string) $token): [bool](#language.types.boolean)
public [count](#dom-tokenlist.count)(): [int](#language.types.integer)
public [getIterator](#dom-tokenlist.getiterator)(): [Iterator](#class.iterator)
public [item](#dom-tokenlist.item)([int](#language.types.integer) $index): [?](#language.types.null)[string](#language.types.string)
public [remove](#dom-tokenlist.remove)([string](#language.types.string) ...$tokens): [void](language.types.void.html)
public [replace](#dom-tokenlist.replace)([string](#language.types.string) $token, [string](#language.types.string) $newToken): [bool](#language.types.boolean)
public [supports](#dom-tokenlist.supports)([string](#language.types.string) $token): [bool](#language.types.boolean)
public [toggle](#dom-tokenlist.toggle)([string](#language.types.string) $token, [?](#language.types.null)[bool](#language.types.boolean) $force = **[null](#constant.null)**): [bool](#language.types.boolean)

}

## Propiedades

     length

      El número de tokens.



     value

      El valor del atributo vinculado a este objeto.


## Notas

**Nota**:

La extensión DOM utiliza el codificado UTF-8 al utilizar los métodos o las propiedades.
Los métodos del analizador detectan automáticamente el codificado o permiten al llamante especificar un codificado.

**Nota**:

     Los tokens de la lista pueden ser accedidos mediante una sintaxis de tipo array.

# Dom\TokenList::add

(PHP 8 &gt;= 8.4.0)

Dom\TokenList::add — Añade los tokens dados a la lista

### Descripción

public **Dom\TokenList::add**([string](#language.types.string) ...$tokens): [void](language.types.void.html)

Añade los tokens dados a la lista, pero no aquellos
que ya estaban presentes.

### Parámetros

    tokens


      Los tokens a añadir.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Levanta una [ValueError](#class.valueerror) si
  un token contiene bytes nulos.

- Levanta una **Dom\DOMException** con el código
  **[Dom\SYNTAX_ERR](#constant.dom-syntax-err)** si un token es una cadena vacía.

- Levanta una **Dom\DOMException** con el código
  **[Dom\INVALID_CHARACTER_ERR](#constant.dom-invalid-character-err)** si un token contiene
  espacios ASCII.

### Ejemplos

**Ejemplo #1 Ejemplo de Dom\TokenList::add()**

    Añade dos clases a un elemento párrafo recién creado.

&lt;?php
$dom = Dom\HTMLDocument::createEmpty();
$p = $dom-&gt;createElement('p');

$classList = $p-&gt;classList;
$classList-&gt;add('font-bold', 'important');

echo $dom-&gt;saveHtml($p);
?&gt;

El ejemplo anterior mostrará:

&lt;p class="font-bold important"&gt;&lt;/p&gt;

# Dom\TokenList::contains

(PHP 8 &gt;= 8.4.0)

Dom\TokenList::contains — Indica si la lista contiene un token dado

### Descripción

public **Dom\TokenList::contains**([string](#language.types.string) $token): [bool](#language.types.boolean)

Indica si la lista contiene token.

### Parámetros

    token


      El token.


### Valores devueltos

Devuelve **[true](#constant.true)** si la lista contiene token,
en caso contrario **[false](#constant.false)**.

### Ejemplos

**Ejemplo #1 Ejemplo de Dom\TokenList::contains()**

    Verifica si dos clases están presentes en el párrafo.

&lt;?php
$dom = Dom\HTMLDocument::createFromString('&lt;p class="font-bold important"&gt;&lt;/p&gt;', LIBXML_NOERROR);
$p = $dom-&gt;body-&gt;firstChild;

$classList = $p-&gt;classList;
var_dump(
$classList-&gt;contains('important'),
$classList-&gt;contains('font-small'),
);
?&gt;

El ejemplo anterior mostrará:

bool(true)
bool(false)

# Dom\TokenList::count

(PHP 8 &gt;= 8.4.0)

Dom\TokenList::count — Devuelve el número de tokens en la lista

### Descripción

public **Dom\TokenList::count**(): [int](#language.types.integer)

Devuelve el número de tokens en la lista.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El número de tokens en la lista.

# Dom\TokenList::getIterator

(PHP 8 &gt;= 8.4.0)

Dom\TokenList::getIterator — Devuelve un iterador sobre la lista de tokens

### Descripción

public **Dom\TokenList::getIterator**(): [Iterator](#class.iterator)

Devuelve un iterador sobre la lista de tokens.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un iterador sobre la lista de tokens.

# Dom\TokenList::item

(PHP 8 &gt;= 8.4.0)

Dom\TokenList::item — Devuelve un token de la lista

### Descripción

public **Dom\TokenList::item**([int](#language.types.integer) $index): [?](#language.types.null)[string](#language.types.string)

Devuelve un token de la lista en el index.

### Parámetros

    index


      El índice del token.


### Valores devueltos

Devuelve el token en el index o **[null](#constant.null)** cuando el índice
está fuera de los límites.

### Ejemplos

**Ejemplo #1 Ejemplo de Dom\TokenList::item()**

    Accede a un índice válido y a un índice inválido.

&lt;?php
$dom = Dom\HTMLDocument::createFromString('&lt;p class="font-bold important"&gt;&lt;/p&gt;', LIBXML_NOERROR);
$p = $dom-&gt;body-&gt;firstChild;

$classList = $p-&gt;classList;
var_dump(
$classList-&gt;item(0),
$classList-&gt;item(100),
);
?&gt;

El ejemplo anterior mostrará:

string(9) "font-bold"
NULL

### Notas

**Nota**:

    Este método es equivalente al uso de la sintaxis de acceso a arrays.

# Dom\TokenList::remove

(PHP 8 &gt;= 8.4.0)

Dom\TokenList::remove — Elimina los tokens dados de la lista

### Descripción

public **Dom\TokenList::remove**([string](#language.types.string) ...$tokens): [void](language.types.void.html)

Elimina los tokens dados de la lista, pero ignora
aquellos que no estaban presentes.

### Parámetros

    tokens


      Los tokens a eliminar.


### Valores devueltos

No se retorna ningún valor.

### Errores/Excepciones

- Levanta una [ValueError](#class.valueerror) si
  un token contiene bytes nulos.

- Levanta una **Dom\DOMException** con el código
  **[Dom\SYNTAX_ERR](#constant.dom-syntax-err)** si un token es una cadena vacía.

- Levanta una **Dom\DOMException** con el código
  **[Dom\INVALID_CHARACTER_ERR](#constant.dom-invalid-character-err)** si un token contiene
  espacios ASCII.

### Ejemplos

**Ejemplo #1 Ejemplo de Dom\TokenList::remove()**

    Elimina dos clases del párrafo.

&lt;?php
$dom = Dom\HTMLDocument::createFromString('&lt;p class="font-bold important"&gt;&lt;/p&gt;', LIBXML_NOERROR);
$p = $dom-&gt;body-&gt;firstChild;

$p-&gt;classList-&gt;remove('font-bold', 'important');

echo $dom-&gt;saveHtml($p);
?&gt;

El ejemplo anterior mostrará:

&lt;p class=""&gt;&lt;/p&gt;

# Dom\TokenList::replace

(PHP 8 &gt;= 8.4.0)

Dom\TokenList::replace — Reemplaza un token en la lista por otro

### Descripción

public **Dom\TokenList::replace**([string](#language.types.string) $token, [string](#language.types.string) $newToken): [bool](#language.types.boolean)

Reemplaza un token en la lista por otro.

### Parámetros

    token


      El token a reemplazar.




    newToken


      El nuevo token.


### Valores devueltos

Devuelve **[true](#constant.true)** si token estaba en la lista,
en caso contrario **[false](#constant.false)**.

### Errores/Excepciones

- Levanta una [ValueError](#class.valueerror) si
  un token contiene bytes nulos.

- Levanta una **Dom\DOMException** con el código
  **[Dom\SYNTAX_ERR](#constant.dom-syntax-err)** si un token es una cadena vacía.

- Levanta una **Dom\DOMException** con el código
  **[Dom\INVALID_CHARACTER_ERR](#constant.dom-invalid-character-err)** si un token contiene
  espacios ASCII.

### Ejemplos

**Ejemplo #1 Ejemplo de Dom\TokenList::replace()**

    Reemplaza un token en el párrafo por otro.

&lt;?php
$dom = Dom\HTMLDocument::createFromString('&lt;p class="font-bold important"&gt;&lt;/p&gt;', LIBXML_NOERROR);
$p = $dom-&gt;body-&gt;firstChild;

$p-&gt;classList-&gt;replace('font-bold', 'font-small');

echo $dom-&gt;saveHtml($p);
?&gt;

El ejemplo anterior mostrará:

&lt;p class="font-small important"&gt;&lt;/p&gt;

# Dom\TokenList::supports

(PHP 8 &gt;= 8.4.0)

Dom\TokenList::supports — Indica si el token dado es admitido

### Descripción

public **Dom\TokenList::supports**([string](#language.types.string) $token): [bool](#language.types.boolean)

Indica si token está en la lista de
tokens admitidos del atributo asociado.

### Parámetros

    token


      El token.


### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Genera una [TypeError](#class.typeerror) cuando el atributo no
define una lista de tokens admitidos.

# Dom\TokenList::toggle

(PHP 8 &gt;= 8.4.0)

Dom\TokenList::toggle — Conmuta la presencia de un token en la lista

### Descripción

public **Dom\TokenList::toggle**([string](#language.types.string) $token, [?](#language.types.null)[bool](#language.types.boolean) $force = **[null](#constant.null)**): [bool](#language.types.boolean)

Conmuta la presencia del token en la lista.

### Parámetros

    token


      El token a conmutar.




    force


      Si force es proporcionado, al definirlo como **[true](#constant.true)** se añadirá el token,
      y al definirlo como **[false](#constant.false)** se eliminará.


### Valores devueltos

Devuelve **[true](#constant.true)** si el token está en la lista después de la llamada,
en caso contrario **[false](#constant.false)**.

### Errores/Excepciones

- Levanta una [ValueError](#class.valueerror) si
  un token contiene bytes nulos.

- Levanta una **Dom\DOMException** con el código
  **[Dom\SYNTAX_ERR](#constant.dom-syntax-err)** si un token es una cadena vacía.

- Levanta una **Dom\DOMException** con el código
  **[Dom\INVALID_CHARACTER_ERR](#constant.dom-invalid-character-err)** si un token contiene
  espacios ASCII.

### Ejemplos

**Ejemplo #1 Ejemplo de Dom\TokenList::toggle()**

    Conmuta tres clases, dos sin force, y una con.

&lt;?php
$dom = Dom\HTMLDocument::createFromString('&lt;p class="font-bold important"&gt;&lt;/p&gt;', LIBXML_NOERROR);
$p = $dom-&gt;body-&gt;firstChild;

$classList = $p-&gt;classList;
$classList-&gt;toggle('font-bold', 'font-small');
$classList-&gt;toggle('important', force: true);

echo $dom-&gt;saveHtml($p);
?&gt;

El ejemplo anterior mostrará:

&lt;p class="font-bold important"&gt;&lt;/p&gt;

## Tabla de contenidos

- [Dom\TokenList::add](#dom-tokenlist.add) — Añade los tokens dados a la lista
- [Dom\TokenList::contains](#dom-tokenlist.contains) — Indica si la lista contiene un token dado
- [Dom\TokenList::count](#dom-tokenlist.count) — Devuelve el número de tokens en la lista
- [Dom\TokenList::getIterator](#dom-tokenlist.getiterator) — Devuelve un iterador sobre la lista de tokens
- [Dom\TokenList::item](#dom-tokenlist.item) — Devuelve un token de la lista
- [Dom\TokenList::remove](#dom-tokenlist.remove) — Elimina los tokens dados de la lista
- [Dom\TokenList::replace](#dom-tokenlist.replace) — Reemplaza un token en la lista por otro
- [Dom\TokenList::supports](#dom-tokenlist.supports) — Indica si el token dado es admitido
- [Dom\TokenList::toggle](#dom-tokenlist.toggle) — Conmuta la presencia de un token en la lista

# La clase Dom\XMLDocument

(PHP 8 &gt;= 8.4.0)

## Introducción

    Representa un documento XML.

## Sinopsis de la Clase

     final
     class **Dom\XMLDocument**



     extends
      [Dom\Document](#class.dom-document)
     {

    /* Constantaes heredadas constants */

     public
     const
     [int](#language.types.integer)
      [Dom\Node::DOCUMENT_POSITION_DISCONNECTED](#dom-node.constants.document-position-disconnected) = 0x1;

public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_PRECEDING](#dom-node.constants.document-position-preceding) = 0x2;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_FOLLOWING](#dom-node.constants.document-position-following) = 0x4;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINS](#dom-node.constants.document-position-contains) = 0x8;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_CONTAINED_BY](#dom-node.constants.document-position-contained-by) = 0x10;
public
const
[int](#language.types.integer)
[Dom\Node::DOCUMENT_POSITION_IMPLEMENTATION_SPECIFIC](#dom-node.constants.document-position-implementation-specific) = 0x20;

    /* Propiedades */
    public
     readonly
     [string](#language.types.string)
      [$xmlEncoding](#dom-xmldocument.props.xmlencoding);

    public
     [bool](#language.types.boolean)
      [$xmlStandalone](#dom-xmldocument.props.xmlstandalone);

    public
     [string](#language.types.string)
      [$xmlVersion](#dom-xmldocument.props.xmlversion);

    public
     [bool](#language.types.boolean)
      [$formatOutput](#dom-xmldocument.props.formatoutput);


    /* Propiedades heredadas */
    public
     readonly
     [Dom\Implementation](#class.dom-implementation)
      [$implementation](#dom-document.props.implementation);

public
[string](#language.types.string)
[$URL](#dom-document.props.url);
public
[string](#language.types.string)
[$documentURI](#dom-document.props.documenturi);
public
[string](#language.types.string)
[$characterSet](#dom-document.props.characterset);
public
[string](#language.types.string)
[$charset](#dom-document.props.charset);
public
[string](#language.types.string)
[$inputEncoding](#dom-document.props.inputencoding);
public
readonly
?[Dom\DocumentType](#class.dom-documenttype)
[$doctype](#dom-document.props.doctype);
public
readonly
?[Dom\Element](#class.dom-element)
[$documentElement](#dom-document.props.documentelement);
public
readonly
?[Dom\Element](#class.dom-element)
[$firstElementChild](#dom-document.props.firstelementchild);
public
readonly
?[Dom\Element](#class.dom-element)
[$lastElementChild](#dom-document.props.lastelementchild);
public
readonly
[int](#language.types.integer)
[$childElementCount](#dom-document.props.childelementcount);
public
?[Dom\HTMLElement](#class.dom-htmlelement)
[$body](#dom-document.props.body);
public
readonly
?[Dom\HTMLElement](#class.dom-htmlelement)
[$head](#dom-document.props.head);
public
[string](#language.types.string)
[$title](#dom-document.props.title);

    public
     readonly
     [int](#language.types.integer)
      [$nodeType](#dom-node.props.nodetype);

public
readonly
[string](#language.types.string)
[$nodeName](#dom-node.props.nodename);
public
readonly
[string](#language.types.string)
[$baseURI](#dom-node.props.baseuri);
public
readonly
[bool](#language.types.boolean)
[$isConnected](#dom-node.props.isconnected);
public
readonly
?[Dom\Document](#class.dom-document)
[$ownerDocument](#dom-node.props.ownerdocument);
public
readonly
?[Dom\Node](#class.dom-node)
[$parentNode](#dom-node.props.parentnode);
public
readonly
?[Dom\Element](#class.dom-element)
[$parentElement](#dom-node.props.parentelement);
public
readonly
[Dom\NodeList](#class.dom-nodelist)
[$childNodes](#dom-node.props.childnodes);
public
readonly
?[Dom\Node](#class.dom-node)
[$firstChild](#dom-node.props.firstchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$lastChild](#dom-node.props.lastchild);
public
readonly
?[Dom\Node](#class.dom-node)
[$previousSibling](#dom-node.props.previoussibling);
public
readonly
?[Dom\Node](#class.dom-node)
[$nextSibling](#dom-node.props.nextsibling);
public
?[string](#language.types.string)
[$nodeValue](#dom-node.props.nodevalue);
public
?[string](#language.types.string)
[$textContent](#dom-node.props.textcontent);

    /* Métodos */
    /* Aún no documentado */


    /* Métodos heredados */
    /* Aún no documentado */

}

## Propiedades

**Nota**:

     Mientras que la clase **Dom\XMLDocument** permite definir ciertas
     propiedades para influir en el comportamiento del analizador, esta clase solo utiliza las
     constantes **[LIBXML_*](#constant.libxml-biglines)**
     para configurar el analizador.






     xmlEncoding

       Un atributo especificando la codificación del documento. Es **[null](#constant.null)**
       cuando la codificación no está especificada, o cuando es desconocida,
       como es el caso cuando el documento ha sido creado en memoria.






     xmlStandalone

       Un atributo especificando si el documento es "standalone".
       Es **[false](#constant.false)** cuando no está especificado.
       Un documento standalone es un documento donde no hay declaraciones de marcado externas.
       Un ejemplo de tal declaración de marcado es cuando la DTD declara un atributo con un valor por omisión.






     xmlVersion

       Un atributo especificando el número de versión del documento. Si no hay
       declaración y si el documento soporta la funcionalidad
       "XML", el valor será "1.0".






     formatOutput

      Indica correctamente el formato de salida con sangrado y espacio adicional.


## Notas

**Nota**:

La extensión DOM utiliza el codificado UTF-8 al utilizar los métodos o las propiedades.
Los métodos del analizador detectan automáticamente el codificado o permiten al llamante especificar un codificado.

# La clase Dom\XPath

(PHP 8 &gt;= 8.4.0)

## Introducción

    Permite utilizar consultas XPath 1.0 en documentos HTML o XML.




    Esta es la versión moderna y conforme a las especificaciones de
    [DOMXPath](#class.domxpath).

## Sinopsis de la Clase

     final
     class **Dom\XPath**
     {

    /* Propiedades */

     public
     readonly
     [Dom\Document](#class.dom-document)
      [$document](#dom-xpath.props.document);

    public
     [bool](#language.types.boolean)
      [$registerNodeNamespaces](#dom-xpath.props.registernodenamespaces);


    /* Métodos */
    /* Aún no documentado */

}

## Propiedades

     document
      El documento que está ligado a este objeto.



     registerNodeNamespaces

       Cuando se establece en **[true](#constant.true)**, los espacios de nombres en el nodo son registrados.



# DOM Funciones

# dom_import_simplexml

(PHP 5, PHP 7, PHP 8)

dom_import_simplexml —
Transforma un objeto SimpleXMLElement en un objeto [DOMAttr](#class.domattr) o [DOMElement](#class.domelement)

### Descripción

**dom_import_simplexml**([object](#language.types.object) $node): [DOMAttr](#class.domattr)|[DOMElement](#class.domelement)

Esta función toma el atributo o el elemento dado node (una
instancia de [SimpleXMLElement](#class.simplexmlelement)) y crea respectivamente un nodo
[DOMAttr](#class.domattr) o [DOMElement](#class.domelement).
El nuevo [DOMNode](#class.domnode) hace referencia al mismo nodo XML subyacente
que el [SimpleXMLElement](#class.simplexmlelement).

### Parámetros

     node


       El atributo o el elemento nodo a importar (una instancia de [SimpleXMLElement](#class.simplexmlelement)).





### Valores devueltos

El [DOMAttr](#class.domattr) o [DOMElement](#class.domelement).

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ya no devuelve **[null](#constant.null)** en caso de error.



### Ejemplos

**Ejemplo #1 Importación de un objeto SimpleXML en DOM con
dom_import_simplexml()**

&lt;?php

$sxe = simplexml_load_string('&lt;books&gt;&lt;book&gt;&lt;title&gt;blah&lt;/title&gt;&lt;/book&gt;&lt;/books&gt;');

if ($sxe === false) {
echo 'Error al analizar el documento';
exit;
}

$dom_sxe = dom_import_simplexml($sxe);
if (!$dom_sxe) {
echo 'Error al convertir el XML';
exit;
}

$dom = new DOMDocument('1.0');
$dom_sxe = $dom-&gt;importNode($dom_sxe, true);
$dom_sxe = $dom-&gt;appendChild($dom_sxe);

echo $dom-&gt;saveXML();

?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;books&gt;&lt;book&gt;&lt;title&gt;blah&lt;/title&gt;&lt;/book&gt;&lt;/books&gt;

**Ejemplo #2 Importar SimpleXML en DOM y modificar SimpleXML mediante DOM**

    La gestión de errores se omite por razones de concisión.

&lt;?php

$sxe = simplexml_load_string('&lt;books&gt;&lt;book&gt;&lt;title&gt;blah&lt;/title&gt;&lt;/book&gt;&lt;/books&gt;');
$elt = dom_import_simplexml($sxe);
$elt-&gt;setAttribute("foo", "bar");
echo $sxe-&gt;asXML();

?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;books foo="bar"&gt;&lt;book&gt;&lt;title&gt;blah&lt;/title&gt;&lt;/book&gt;&lt;/books&gt;

### Ver también

    - [simplexml_import_dom()](#function.simplexml-import-dom) - Construye un objeto SimpleXMLElement a partir de un

objeto XML o HTML

# Dom\import_simplexml

(PHP 8 &gt;= 8.4.0)

Dom\import_simplexml —
Devuelve un objeto [Dom\Attr](#class.dom-attr) o [Dom\Element](#class.dom-element) a partir de un
objeto [SimpleXMLElement](#class.simplexmlelement)

### Descripción

**Dom\import_simplexml**([object](#language.types.object) $node): [Dom\Attr](#class.dom-attr)|[Dom\Element](#class.dom-element)

Esta función toma el atributo o el elemento node dado (una instancia de
[SimpleXMLElement](#class.simplexmlelement)) y crea
un nodo [Dom\Attr](#class.dom-attr) o [Dom\Element](#class.dom-element), respectivamente.
El nuevo [Dom\Node](#class.dom-node) hace referencia al mismo nodo XML subyacente
que el [SimpleXMLElement](#class.simplexmlelement).

### Parámetros

     node


       El atributo o el elemento nodo a importar (una instancia de [SimpleXMLElement](#class.simplexmlelement)).





### Valores devueltos

El [Dom\Attr](#class.dom-attr) o [Dom\Element](#class.dom-element).

### Ejemplos

**Ejemplo #1 Importa SimpleXML en DOM y modifica SimpleXML a través de DOM**

    La gestión de errores se omite por brevedad.

&lt;?php

$sxe = simplexml_load_string('&lt;books&gt;&lt;book&gt;&lt;title&gt;blah&lt;/title&gt;&lt;/book&gt;&lt;/books&gt;');
$elt = Dom\import_simplexml($sxe);
$elt-&gt;setAttribute("foo", "bar");
echo $sxe-&gt;asXML();

?&gt;

El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;books foo="bar"&gt;&lt;book&gt;&lt;title&gt;blah&lt;/title&gt;&lt;/book&gt;&lt;/books&gt;

### Ver también

- [simplexml_import_dom()](#function.simplexml-import-dom) - Construye un objeto SimpleXMLElement a partir de un
  objeto XML o HTML

## Tabla de contenidos

- [dom_import_simplexml](#function.dom-import-simplexml) — Transforma un objeto SimpleXMLElement en un objeto DOMAttr o DOMElement
- [Dom\import_simplexml](#function.dom-ns-import-simplexml) — Devuelve un objeto Dom\Attr o Dom\Element a partir de un
  objeto SimpleXMLElement

- [Introducción](#intro.dom)
- [Instalación/Configuración](#dom.setup)<li>[Requerimientos](#dom.requirements)
- [Instalación](#dom.installation)
  </li>- [Constantes predefinidas](#dom.constants)
- [Ejemplos](#dom.examples)
- [DOMAttr](#class.domattr) — La clase DOMAttr<li>[DOMAttr::\_\_construct](#domattr.construct) — Crea un nuevo objeto DOMAttr
- [DOMAttr::isId](#domattr.isid) — Verifica si el atributo es un identificador definido
  </li>- [DOMCdataSection](#class.domcdatasection) — La clase DOMCdataSection<li>[DOMCdataSection::__construct](#domcdatasection.construct) — Construye un nuevo objeto DOMCdataSection
  </li>- [DOMCharacterData](#class.domcharacterdata) — La clase DOMCharacterData<li>[DOMCharacterData::after](#domcharacterdata.after) — Añade nodos después de los datos
- [DOMCharacterData::appendData](#domcharacterdata.appenddata) — Añade la cadena al final de los datos en el nodo
- [DOMCharacterData::before](#domcharacterdata.before) — Añade nodos antes de los datos de carácter
- [DOMCharacterData::deleteData](#domcharacterdata.deletedata) — Elimina un rango de caracteres de los datos de carácter
- [DOMCharacterData::insertData](#domcharacterdata.insertdata) — Inserta una cadena en el desplazamiento de punto de código UTF-8 especificado
- [DOMCharacterData::remove](#domcharacterdata.remove) — Elimina el nodo de datos de carácter
- [DOMCharacterData::replaceData](#domcharacterdata.replacedata) — Reemplaza una subcadena en los datos de carácter
- [DOMCharacterData::replaceWith](#domcharacterdata.replacewith) — Reemplaza los datos por nuevos nodos
- [DOMCharacterData::substringData](#domcharacterdata.substringdata) — Extrae un rango de datos de los datos de carácter
  </li>- [DOMChildNode](#class.domchildnode) — La interfaz DOMChildNode<li>[DOMChildNode::after](#domchildnode.after) — Añade nodos después del nodo
- [DOMChildNode::before](#domchildnode.before) — Añade nodos antes del nodo
- [DOMChildNode::remove](#domchildnode.remove) — Elimina el nodo
- [DOMChildNode::replaceWith](#domchildnode.replacewith) — Reemplaza el nodo por nuevos nodos
  </li>- [DOMComment](#class.domcomment) — La clase DOMComment<li>[DOMComment::__construct](#domcomment.construct) — Crea un nuevo objeto DOMComment
  </li>- [DOMDocument](#class.domdocument) — La clase DOMDocument<li>[DOMDocument::adoptNode](#domdocument.adoptnode) — Transfiere un nodo de otro documento
- [DOMDocument::append](#domdocument.append) — Añade nodos después del último nodo hijo
- [DOMDocument::\_\_construct](#domdocument.construct) — Crea un nuevo objeto DOMDocument
- [DOMDocument::createAttribute](#domdocument.createattribute) — Crear nuevo attribute
- [DOMDocument::createAttributeNS](#domdocument.createattributens) — Crea un nuevo atributo con un espacio de nombres asociado
- [DOMDocument::createCDATASection](#domdocument.createcdatasection) — Crea un nuevo nodo cdata
- [DOMDocument::createComment](#domdocument.createcomment) — Crea un nuevo nodo de comentario
- [DOMDocument::createDocumentFragment](#domdocument.createdocumentfragment) — Crea un nuevo fragmento de documento
- [DOMDocument::createElement](#domdocument.createelement) — Crea un nuevo nodo elemento
- [DOMDocument::createElementNS](#domdocument.createelementns) — Crea un nuevo nodo elemento con el nombre de espacio asociado
- [DOMDocument::createEntityReference](#domdocument.createentityreference) — Create new entity reference node
- [DOMDocument::createProcessingInstruction](#domdocument.createprocessinginstruction) — Crea un nuevo nodo PI
- [DOMDocument::createTextNode](#domdocument.createtextnode) — Crea un nuevo nodo de texto
- [DOMDocument::getElementById](#domdocument.getelementbyid) — Busca un elemento con un cierto identificador
- [DOMDocument::getElementsByTagName](#domdocument.getelementsbytagname) — Busca todos los elementos con el nombre de etiqueta local dado
- [DOMDocument::getElementsByTagNameNS](#domdocument.getelementsbytagnamens) — Búsqueda de todos los elementos con un nombre de etiqueta dado en un espacio de nombres especificado
- [DOMDocument::importNode](#domdocument.importnode) — Importa un nodo dentro del documento actual
- [DOMDocument::load](#domdocument.load) — Cargar un documento XML de un archivo.
- [DOMDocument::loadHTML](#domdocument.loadhtml) — Carga HTML de un string
- [DOMDocument::loadHTMLFile](#domdocument.loadhtmlfile) — Carga HTML desde un fichero
- [DOMDocument::loadXML](#domdocument.loadxml) — Carga de XML desde una cadena de caracteres
- [DOMDocument::normalizeDocument](#domdocument.normalizedocument) — Normaliza el documento
- [DOMDocument::prepend](#domdocument.prepend) — Añade nodos antes del primer nodo hijo
- [DOMDocument::registerNodeClass](#domdocument.registernodeclass) — Registra la clase extendida utilizada para crear un tipo de nodo base
- [DOMDocument::relaxNGValidate](#domdocument.relaxngvalidate) — Realiza una validación relaxNG del documento
- [DOMDocument::relaxNGValidateSource](#domdocument.relaxngvalidatesource) — Realiza una validación relaxNG del documento
- [DOMDocument::replaceChildren](#domdocument.replacechildren) — Reemplaza los hijos en el documento
- [DOMDocument::save](#domdocument.save) — Copia el árbol XML interno a un archivo
- [DOMDocument::saveHTML](#domdocument.savehtml) — Copia el documento interno a una cadena usando el formato HTML
- [DOMDocument::saveHTMLFile](#domdocument.savehtmlfile) — Copia el documento interno a un fichero usando el formato HTML
- [DOMDocument::saveXML](#domdocument.savexml) — Guarda el árbol interno XML en una cadena de caracteres
- [DOMDocument::schemaValidate](#domdocument.schemavalidate) — Valida un documento basado en un esquema. Sólo se admite XML Schema 1.0.
- [DOMDocument::schemaValidateSource](#domdocument.schemavalidatesource) — Valida un documento basado en un esquema
- [DOMDocument::validate](#domdocument.validate) — Valida un documento basado en su DTD
- [DOMDocument::xinclude](#domdocument.xinclude) — Reemplaza los XIncludes en un objeto DOMDocument
  </li>- [DOMDocumentFragment](#class.domdocumentfragment) — La clase DOMDocumentFragment<li>[DOMDocumentFragment::append](#domdocumentfragment.append) — Añade nodos después del último nodo hijo
- [DOMDocumentFragment::appendXML](#domdocumentfragment.appendxml) — Añade información XML sin formato
- [DOMDocumentFragment::\_\_construct](#domdocumentfragment.construct) — Construye un objeto DOMDocumentFragment
- [DOMDocumentFragment::prepend](#domdocumentfragment.prepend) — Añade nodos antes del primer nodo hijo
- [DOMDocumentFragment::replaceChildren](#domdocumentfragment.replacechildren) — Reemplaza los hijos en el fragmento
  </li>- [DOMDocumentType](#class.domdocumenttype) — La clase DOMDocumentType
- [DOMElement](#class.domelement) — La clase DOMElement<li>[DOMElement::after](#domelement.after) — Añade nodos después del elemento
- [DOMElement::append](#domelement.append) — Añade nodos después del último hijo
- [DOMElement::before](#domelement.before) — Añade nodos antes del elemento
- [DOMElement::\_\_construct](#domelement.construct) — Crea un nuevo objeto DOMElement
- [DOMElement::getAttribute](#domelement.getattribute) — Devuelve el valor de un atributo
- [DOMElement::getAttributeNames](#domelement.getattributenames) — Devuelve los nombres de los atributos
- [DOMElement::getAttributeNode](#domelement.getattributenode) — Devuelve el nodo de un atributo
- [DOMElement::getAttributeNodeNS](#domelement.getattributenodens) — Devuelve el nodo de un atributo
- [DOMElement::getAttributeNS](#domelement.getattributens) — Devuelve el valor de un atributo
- [DOMElement::getElementsByTagName](#domelement.getelementsbytagname) — Obtiene los elementos por nombre de etiqueta
- [DOMElement::getElementsByTagNameNS](#domelement.getelementsbytagnamens) — Recupera los elementos por su espacio de nombres y su localName
- [DOMElement::hasAttribute](#domelement.hasattribute) — Comprueba si existe un atributo
- [DOMElement::hasAttributeNS](#domelement.hasattributens) — Comprueba si un atributo existe
- [DOMElement::insertAdjacentElement](#domelement.insertadjacentelement) — Inserta un elemento adyacente
- [DOMElement::insertAdjacentText](#domelement.insertadjacenttext) — Inserta un texto adyacente
- [DOMElement::prepend](#domelement.prepend) — Añade nodos antes del primer hijo
- [DOMElement::remove](#domelement.remove) — Elimina el elemento
- [DOMElement::removeAttribute](#domelement.removeattribute) — Elimina un atributo
- [DOMElement::removeAttributeNode](#domelement.removeattributenode) — Elimina un atributo
- [DOMElement::removeAttributeNS](#domelement.removeattributens) — Elimina un atributo
- [DOMElement::replaceChildren](#domelement.replacechildren) — Reemplaza los hijos en el elemento
- [DOMElement::replaceWith](#domelement.replacewith) — Reemplaza el elemento por nuevos nodos
- [DOMElement::setAttribute](#domelement.setattribute) — Añade un nuevo atributo o modifica uno existente
- [DOMElement::setAttributeNode](#domelement.setattributenode) — Añade un nuevo atributo al elemento
- [DOMElement::setAttributeNodeNS](#domelement.setattributenodens) — Añade un nuevo atributo al elemento
- [DOMElement::setAttributeNS](#domelement.setattributens) — Añade un nuevo atributo
- [DOMElement::setIdAttribute](#domelement.setidattribute) — Declara el atributo especificado por su nombre como de tipo ID
- [DOMElement::setIdAttributeNode](#domelement.setidattributenode) — Declara el atributo especificado por el nodo como de tipo ID
- [DOMElement::setIdAttributeNS](#domelement.setidattributens) — Declara el atributo especificado por su nombre local y su URI del espacio de nombres como de tipo ID
- [DOMElement::toggleAttribute](#domelement.toggleattribute) — Conmuta el atributo
  </li>- [DOMEntity](#class.domentity) — La classe DOMEntity
- [DOMEntityReference](#class.domentityreference) — La clase DOMEntityReference<li>[DOMEntityReference::\_\_construct](#domentityreference.construct) — Crea un nuevo objeto DOMEntityReference
  </li>- [DOMException](#class.domexception) — La clase DOMException / Dom\Exception
- [DOMImplementation](#class.domimplementation) — La clase DOMImplementation<li>[DOMImplementation::\_\_construct](#domimplementation.construct) — Crea un nuevo objeto DOMImplementation
- [DOMImplementation::createDocument](#domimplementation.createdocument) — Crea un objeto DOM Document del tipo especificado con sus elementos
- [DOMImplementation::createDocumentType](#domimplementation.createdocumenttype) — Crea un objeto DOMDocumentType vacío
- [DOMImplementation::hasFeature](#domimplementation.hasfeature) — Verifica si la implementación DOM implementa una funcionalidad específica
  </li>- [DOMNamedNodeMap](#class.domnamednodemap) — La clase DOMNamedNodeMap<li>[DOMNamedNodeMap::count](#domnamednodemap.count) — Obtiene el número de nodos en la colección no ordenada (map)
- [DOMNamedNodeMap::getIterator](#domnamednodemap.getiterator) — Obtiene un iterador externo
- [DOMNamedNodeMap::getNamedItem](#domnamednodemap.getnameditem) — Devuelve un nodo especificado por su nombre
- [DOMNamedNodeMap::getNamedItemNS](#domnamednodemap.getnameditemns) — Recupera un nodo especificado por el nombre local y la URI del espacio de nombres
- [DOMNamedNodeMap::item](#domnamednodemap.item) — Recupera un nodo especificado por su índice
  </li>- [DOMNameSpaceNode](#class.domnamespacenode) — La clase DOMNameSpaceNode<li>[DOMNameSpaceNode::__sleep](#domnamespacenode.sleep) — Prohíbe la serialización a menos que los métodos de serialización estén implementados en una subclase
- [DOMNameSpaceNode::\_\_wakeup](#domnamespacenode.wakeup) — Prohíbe la deserialización a menos que los métodos de deserialización estén implementados en una subclase
  </li>- [DOMNode](#class.domnode) — La clase DOMNode<li>[DOMNode::appendChild](#domnode.appendchild) — Añade un nuevo hijo al final de los hijos
- [DOMNode::C14N](#domnode.c14n) — Canoniza nodos en una cadena
- [DOMNode::C14NFile](#domnode.c14nfile) — Canoniza nodos en archivo
- [DOMNode::cloneNode](#domnode.clonenode) — Clona un nodo
- [DOMNode::compareDocumentPosition](#domnode.comparedocumentposition) — Comparar la posición de dos nodos
- [DOMNode::contains](#domnode.contains) — Verifica si un nodo contiene otro nodo
- [DOMNode::getLineNo](#domnode.getlineno) — Obtiene el número de línea de un nodo
- [DOMNode::getNodePath](#domnode.getnodepath) — Obtener un XPath de un nodo
- [DOMNode::getRootNode](#domnode.getrootnode) — Devuelve el nodo raíz
- [DOMNode::hasAttributes](#domnode.hasattributes) — Comprueba si un nodo tiene atributos
- [DOMNode::hasChildNodes](#domnode.haschildnodes) — Comprueba si el nodo tiene hijos
- [DOMNode::insertBefore](#domnode.insertbefore) — Añade un nuevo hijo antes de un nodo de referencia.
- [DOMNode::isDefaultNamespace](#domnode.isdefaultnamespace) — Comprueba si la URI del espacio de nombres especificada es el espacio de nombres predeterminado
- [DOMNode::isEqualNode](#domnode.isequalnode) — Comprueba si los dos nodos son iguales
- [DOMNode::isSameNode](#domnode.issamenode) — Indica si dos nodos son el mismo nodo
- [DOMNode::isSupported](#domnode.issupported) — Comprueba si una característica está soportada para la versión especificada
- [DOMNode::lookupNamespaceURI](#domnode.lookupnamespaceuri) — Obtiene la URI del espacio de nombres del nodo basado en el prefijo
- [DOMNode::lookupPrefix](#domnode.lookupprefix) — Devuelve el prefijo del espacio de nombres según el URI del espacio de nombres
- [DOMNode::normalize](#domnode.normalize) — Normaliza el nodo
- [DOMNode::removeChild](#domnode.removechild) — Elimina un hijo de la lista de hijos
- [DOMNode::replaceChild](#domnode.replacechild) — Reemplaza un hijo
- [DOMNode::\_\_sleep](#domnode.sleep) — Prohíbe la serialización a menos que los métodos de serialización se implementen en una subclase
- [DOMNode::\_\_wakeup](#domnode.wakeup) — Prohíbe la deserialización a menos que los métodos de deserialización estén implementados en una subclase
  </li>- [DOMNodeList](#class.domnodelist) — La clase DOMNodeList<li>[DOMNodeList::count](#domnodelist.count) — Obtiene el número de nodos en la lista
- [DOMNodeList::getIterator](#domnodelist.getiterator) — Devuelve un iterador externo
- [DOMNodeList::item](#domnodelist.item) — Devuelve un nodo especificado por su índice
  </li>- [DOMNotation](#class.domnotation) — La clase DOMNotation
- [DOMParentNode](#class.domparentnode) — La interfaz DOMParentNode<li>[DOMParentNode::append](#domparentnode.append) — Añade nodos después del último nodo hijo
- [DOMParentNode::prepend](#domparentnode.prepend) — Añade nodos antes del primer nodo hijo
- [DOMParentNode::replaceChildren](#domparentnode.replacechildren) — Reemplaza los hijos en un nodo
  </li>- [DOMProcessingInstruction](#class.domprocessinginstruction) — La clase DOMProcessingInstruction<li>[DOMProcessingInstruction::__construct](#domprocessinginstruction.construct) — Crea un nuevo objeto DOMProcessingInstruction
  </li>- [DOMText](#class.domtext) — La clase DOMText<li>[DOMText::__construct](#domtext.construct) — Crea un nuevo objeto DOMText
- [DOMText::isElementContentWhitespace](#domtext.iselementcontentwhitespace) — Devuelve si este nodo de texto contiene espacios en blanco en el contenido del elemento
- [DOMText::isWhitespaceInElementContent](#domtext.iswhitespaceinelementcontent) — Indica si este nodo de texto contiene espacios en blanco
- [DOMText::splitText](#domtext.splittext) — Rompe este nodo en dos nodos en el índice especificado
  </li>- [DOMXPath](#class.domxpath) — La clase DOMXPath<li>[DOMXPath::__construct](#domxpath.construct) — Crea un nuevo objeto DOMXPath
- [DOMXPath::evaluate](#domxpath.evaluate) — Evalúa una expresión XPath dada y devuelve un resultado tipado si es posible
- [DOMXPath::query](#domxpath.query) — Evalúa la expresión XPath dada
- [DOMXPath::quote](#domxpath.quote) — Cita un string para su uso en una expresión XPath
- [DOMXPath::registerNamespace](#domxpath.registernamespace) — Registra el espacio de nombres con el objeto DOMXPath
- [DOMXPath::registerPhpFunctionNS](#domxpath.registerphpfunctionns) — Registra una función PHP como una función XPath en un espacio de nombres
- [DOMXPath::registerPhpFunctions](#domxpath.registerphpfunctions) — Registra una función PHP como función XPath
  </li>- [Dom\AdjacentPosition](#enum.dom-adjacentposition) — La enumeración Dom\AdjacentPosition
- [Dom\Attr](#class.dom-attr) — La clase Dom\Attr<li>[Dom\Attr::isId](#dom-attr.isid) — Verifica si el atributo es un identificador definido
- [Dom\Attr::rename](#dom-attr.rename) — Cambia el nombre calificado o el espacio de nombres de un atributo
  </li>- [Dom\CDATASection](#class.dom-cdatasection) — La clase Dom\CDATASection
- [Dom\CharacterData](#class.dom-characterdata) — La clase Dom\CharacterData<li>[Dom\CharacterData::after](#dom-characterdata.after) — Añade nodos después de los datos
- [Dom\CharacterData::appendData](#dom-characterdata.appenddata) — Añade la cadena al final de los datos en el nodo
- [Dom\CharacterData::before](#dom-characterdata.before) — Añade nodos antes de los datos de carácter
- [Dom\CharacterData::deleteData](#dom-characterdata.deletedata) — Elimina un rango de caracteres de los datos de carácter
- [Dom\CharacterData::insertData](#dom-characterdata.insertdata) — Inserta una cadena en el desplazamiento de punto de código UTF-8 especificado
- [Dom\CharacterData::remove](#dom-characterdata.remove) — Elimina el nodo de datos de carácter
- [Dom\CharacterData::replaceData](#dom-characterdata.replacedata) — Reemplaza una subcadena en los datos de carácter
- [Dom\CharacterData::replaceWith](#dom-characterdata.replacewith) — Reemplaza los datos por nuevos nodos
- [Dom\CharacterData::substringData](#dom-characterdata.substringdata) — Extrae un rango de datos de los datos de carácter
  </li>- [Dom\ChildNode](#class.dom-childnode) — La interfaz Dom\ChildNode<li>[Dom\ChildNode::after](#dom-childnode.after) — Añade nodos después del nodo
- [Dom\ChildNode::before](#dom-childnode.before) — Añade nodos antes del nodo
- [Dom\ChildNode::remove](#dom-childnode.remove) — Elimina el nodo
- [Dom\ChildNode::replaceWith](#dom-childnode.replacewith) — Reemplaza el nodo por nuevos nodos
  </li>- [Dom\Comment](#class.dom-comment) — La clase Dom\Comment
- [Dom\Document](#class.dom-document) — La clase Dom\Document
- [Dom\DocumentFragment](#class.dom-documentfragment) — La clase Dom\DocumentFragment
- [Dom\DocumentType](#class.dom-documenttype) — La clase Dom\DocumentType
- [Dom\DtdNamedNodeMap](#class.dom-dtdnamednodemap) — La clase Dom\DtdNamedNodeMap
- [Dom\Element](#class.dom-element) — La clase Dom\Element
- [Dom\Entity](#class.dom-entity) — La clase Dom\Entity
- [Dom\EntityReference](#class.dom-entityreference) — La clase Dom\EntityReference
- [Dom\HTMLCollection](#class.dom-htmlcollection) — La clase Dom\HTMLCollection
- [Dom\HTMLDocument](#class.dom-htmldocument) — La clase Dom\HTMLDocument<li>[Dom\HTMLDocument::createEmpty](#dom-htmldocument.createempty) — Crear un documento HTML vacío
- [Dom\HTMLDocument::createFromFile](#dom-htmldocument.createfromfile) — Analiza un documento HTML a partir de un fichero
- [Dom\HTMLDocument::createFromString](#dom-htmldocument.createfromstring) — Analiza un documento HTML a partir de un string
- [Dom\HTMLDocument::saveHtml](#dom-htmldocument.savehtml) — Serializa el documento como string HTML
- [Dom\HTMLDocument::saveHtmlFile](#dom-htmldocument.savehtmlfile) — Serializa el documento en forma de fichero HTML
- [Dom\HTMLDocument::saveXml](#dom-htmldocument.savexml) — Serializa el documento como un string XML
- [Dom\HTMLDocument::saveXmlFile](#dom-htmldocument.savexmlfile) — Serializa el documento en forma de fichero XML
  </li>- [Dom\HTMLElement](#class.dom-htmlelement) — La clase Dom\HTMLElement
- [Dom\Implementation](#class.dom-implementation) — La clase Dom\Implementation
- [Dom\NamedNodeMap](#class.dom-namednodemap) — La clase Dom\NamedNodeMap
- [Dom\NamespaceInfo](#class.dom-namespaceinfo) — La clase Dom\NamespaceInfo
- [Dom\Node](#class.dom-node) — La clase Dom\Node
- [Dom\NodeList](#class.dom-nodelist) — La clase Dom\NodeList
- [Dom\Notation](#class.dom-notation) — La clase Dom\Notation
- [Dom\ParentNode](#class.dom-parentnode) — La interfaz Dom\ParentNode<li>[Dom\ParentNode::append](#dom-parentnode.append) — Añade nodos después del último nodo hijo
- [Dom\ParentNode::prepend](#dom-parentnode.prepend) — Añade nodos antes del primer nodo hijo
- [Dom\ParentNode::querySelector](#dom-parentnode.queryselector) — Devuelve el primer elemento que coincide con los selectores CSS
- [Dom\ParentNode::querySelectorAll](#dom-parentnode.queryselectorall) — Devuelve una colección de elementos que coinciden con los selectores CSS
- [Dom\ParentNode::replaceChildren](#dom-parentnode.replacechildren) — Reemplaza los hijos en un nodo
  </li>- [Dom\ProcessingInstruction](#class.dom-processinginstruction) — La clase Dom\ProcessingInstruction
- [Dom\Text](#class.dom-text) — La clase Dom\Text<li>[Dom\Text::splitText](#dom-text.splittext) — Rompe este nodo en dos nodos en el índice especificado
  </li>- [Dom\TokenList](#class.dom-tokenlist) — La clase Dom\TokenList<li>[Dom\TokenList::add](#dom-tokenlist.add) — Añade los tokens dados a la lista
- [Dom\TokenList::contains](#dom-tokenlist.contains) — Indica si la lista contiene un token dado
- [Dom\TokenList::count](#dom-tokenlist.count) — Devuelve el número de tokens en la lista
- [Dom\TokenList::getIterator](#dom-tokenlist.getiterator) — Devuelve un iterador sobre la lista de tokens
- [Dom\TokenList::item](#dom-tokenlist.item) — Devuelve un token de la lista
- [Dom\TokenList::remove](#dom-tokenlist.remove) — Elimina los tokens dados de la lista
- [Dom\TokenList::replace](#dom-tokenlist.replace) — Reemplaza un token en la lista por otro
- [Dom\TokenList::supports](#dom-tokenlist.supports) — Indica si el token dado es admitido
- [Dom\TokenList::toggle](#dom-tokenlist.toggle) — Conmuta la presencia de un token en la lista
  </li>- [Dom\XMLDocument](#class.dom-xmldocument) — La clase Dom\XMLDocument
- [Dom\XPath](#class.dom-xpath) — La clase Dom\XPath
- [DOM Funciones](#ref.dom)<li>[dom_import_simplexml](#function.dom-import-simplexml) — Transforma un objeto SimpleXMLElement en un objeto DOMAttr o DOMElement
- [Dom\import_simplexml](#function.dom-ns-import-simplexml) — Devuelve un objeto Dom\Attr o Dom\Element a partir de un
objeto SimpleXMLElement
  </li>
