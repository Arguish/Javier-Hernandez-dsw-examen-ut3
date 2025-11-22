# XMLReader

# Introducción

La extensión XMLReader es un analizador XML de tipo Pull. El lector actúa como un
cursor que avanza en el flujo del documento y se detiene en cada nodo
a su paso.

## Codificación

    Es importante destacar que, internamente, libxml utiliza la codificación UTF-8
    y, como tal, la codificación de los contenidos recuperados siempre estará en
    codificación UTF-8.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#xmlreader.requirements)
- [Instalación](#xmlreader.installation)

    ## Requerimientos

Esta extensión requiere la extensión PHP [libxml](#book.libxml).
Esto significa pasar la opción de configuración
**--with-libxml**, o anterior a PHP 7.4
la opción de configuración **--enable-libxml**,
aunque esto se realiza implícitamente ya que libxml está activado por omisión.

## Instalación

La extensión XMLReader viene con el código fuente PHP.

Esta extensión está activada por omisión. Puede ser desactivada utilizando la opción de configuración:
**--disable-xmlreader**

# La clase XMLReader

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

## Introducción

    La extensión XMLReader es un analizador XML. El analizador funciona
    como un cursor que recorre el documento y se detiene en cada
    nodo.

## Sinopsis de la Clase

     class **XMLReader**
     {

    /* Constantes */

     public
     const
     [int](#language.types.integer)
      [NONE](#xmlreader.constants.none);

    public
     const
     [int](#language.types.integer)
      [ELEMENT](#xmlreader.constants.element);

    public
     const
     [int](#language.types.integer)
      [ATTRIBUTE](#xmlreader.constants.attribute);

    public
     const
     [int](#language.types.integer)
      [TEXT](#xmlreader.constants.text);

    public
     const
     [int](#language.types.integer)
      [CDATA](#xmlreader.constants.cdata);

    public
     const
     [int](#language.types.integer)
      [ENTITY_REF](#xmlreader.constants.entity-ref);

    public
     const
     [int](#language.types.integer)
      [ENTITY](#xmlreader.constants.entity);

    public
     const
     [int](#language.types.integer)
      [PI](#xmlreader.constants.pi);

    public
     const
     [int](#language.types.integer)
      [COMMENT](#xmlreader.constants.comment);

    public
     const
     [int](#language.types.integer)
      [DOC](#xmlreader.constants.doc);

    public
     const
     [int](#language.types.integer)
      [DOC_TYPE](#xmlreader.constants.doc-type);

    public
     const
     [int](#language.types.integer)
      [DOC_FRAGMENT](#xmlreader.constants.doc-fragment);

    public
     const
     [int](#language.types.integer)
      [NOTATION](#xmlreader.constants.notation);

    public
     const
     [int](#language.types.integer)
      [WHITESPACE](#xmlreader.constants.whitespace);

    public
     const
     [int](#language.types.integer)
      [SIGNIFICANT_WHITESPACE](#xmlreader.constants.significant-whitespace);

    public
     const
     [int](#language.types.integer)
      [END_ELEMENT](#xmlreader.constants.end-element);

    public
     const
     [int](#language.types.integer)
      [END_ENTITY](#xmlreader.constants.end-entity);

    public
     const
     [int](#language.types.integer)
      [XML_DECLARATION](#xmlreader.constants.xml-declaration);

    public
     const
     [int](#language.types.integer)
      [LOADDTD](#xmlreader.constants.loaddtd);

    public
     const
     [int](#language.types.integer)
      [DEFAULTATTRS](#xmlreader.constants.defaultattrs);

    public
     const
     [int](#language.types.integer)
      [VALIDATE](#xmlreader.constants.validate);

    public
     const
     [int](#language.types.integer)
      [SUBST_ENTITIES](#xmlreader.constants.subst-entities);


    /* Propiedades */
    public
     [int](#language.types.integer)
      [$attributeCount](#xmlreader.props.attributecount);

    public
     [string](#language.types.string)
      [$baseURI](#xmlreader.props.baseuri);

    public
     [int](#language.types.integer)
      [$depth](#xmlreader.props.depth);

    public
     [bool](#language.types.boolean)
      [$hasAttributes](#xmlreader.props.hasattributes);

    public
     [bool](#language.types.boolean)
      [$hasValue](#xmlreader.props.hasvalue);

    public
     [bool](#language.types.boolean)
      [$isDefault](#xmlreader.props.isdefault);

    public
     [bool](#language.types.boolean)
      [$isEmptyElement](#xmlreader.props.isemptyelement);

    public
     [string](#language.types.string)
      [$localName](#xmlreader.props.localname);

    public
     [string](#language.types.string)
      [$name](#xmlreader.props.name);

    public
     [string](#language.types.string)
      [$namespaceURI](#xmlreader.props.namespaceuri);

    public
     [int](#language.types.integer)
      [$nodeType](#xmlreader.props.nodetype);

    public
     [string](#language.types.string)
      [$prefix](#xmlreader.props.prefix);

    public
     [string](#language.types.string)
      [$value](#xmlreader.props.value);

    public
     [string](#language.types.string)
      [$xmlLang](#xmlreader.props.xmllang);


    /* Métodos */

public [close](#xmlreader.close)(): [true](#language.types.singleton)
public [expand](#xmlreader.expand)([?](#language.types.null)[DOMNode](#class.domnode) $baseNode = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)
public static [fromStream](#xmlreader.fromstream)(
    [resource](#language.types.resource) $stream,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**,
    [int](#language.types.integer) $flags = 0,
    [?](#language.types.null)[string](#language.types.string) $documentUri = **[null](#constant.null)**
): static
public static [fromString](#xmlreader.fromstring)([string](#language.types.string) $source, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): static
public static [fromUri](#xmlreader.fromuri)([string](#language.types.string) $uri, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): static
public [getAttribute](#xmlreader.getattribute)([string](#language.types.string) $name): [?](#language.types.null)[string](#language.types.string)
public [getAttributeNo](#xmlreader.getattributeno)([int](#language.types.integer) $index): [?](#language.types.null)[string](#language.types.string)
public [getAttributeNs](#xmlreader.getattributens)([string](#language.types.string) $name, [string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)
public [getParserProperty](#xmlreader.getparserproperty)([int](#language.types.integer) $property): [bool](#language.types.boolean)
public [isValid](#xmlreader.isvalid)(): [bool](#language.types.boolean)
public [lookupNamespace](#xmlreader.lookupnamespace)([string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)
public [moveToAttribute](#xmlreader.movetoattribute)([string](#language.types.string) $name): [bool](#language.types.boolean)
public [moveToAttributeNo](#xmlreader.movetoattributeno)([int](#language.types.integer) $index): [bool](#language.types.boolean)
public [moveToAttributeNs](#xmlreader.movetoattributens)([string](#language.types.string) $name, [string](#language.types.string) $namespace): [bool](#language.types.boolean)
public [moveToElement](#xmlreader.movetoelement)(): [bool](#language.types.boolean)
public [moveToFirstAttribute](#xmlreader.movetofirstattribute)(): [bool](#language.types.boolean)
public [moveToNextAttribute](#xmlreader.movetonextattribute)(): [bool](#language.types.boolean)
public [next](#xmlreader.next)([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [bool](#language.types.boolean)
public static [open](#xmlreader.open)([string](#language.types.string) $uri, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [XMLReader](#class.xmlreader)
public [open](#xmlreader.open)([string](#language.types.string) $uri, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)
public [read](#xmlreader.read)(): [bool](#language.types.boolean)
public [readInnerXml](#xmlreader.readinnerxml)(): [string](#language.types.string)
public [readOuterXml](#xmlreader.readouterxml)(): [string](#language.types.string)
public [readString](#xmlreader.readstring)(): [string](#language.types.string)
public [setParserProperty](#xmlreader.setparserproperty)([int](#language.types.integer) $property, [bool](#language.types.boolean) $value): [bool](#language.types.boolean)
public [setRelaxNGSchema](#xmlreader.setrelaxngschema)([?](#language.types.null)[string](#language.types.string) $filename): [bool](#language.types.boolean)
public [setRelaxNGSchemaSource](#xmlreader.setrelaxngschemasource)([?](#language.types.null)[string](#language.types.string) $source): [bool](#language.types.boolean)
public [setSchema](#xmlreader.setschema)([?](#language.types.null)[string](#language.types.string) $filename): [bool](#language.types.boolean)
public static [XML](#xmlreader.xml)([string](#language.types.string) $source, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [XMLReader](#class.xmlreader)
public [XML](#xmlreader.xml)([string](#language.types.string) $source, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

}

## Propiedades

     attributeCount


       El número de atributos en el nodo







     baseURI

      La URI base del nodo






     depth

      Profundidad del nodo en el árbol comenzando en 0






     hasAttributes

      Indica si el nodo tiene atributos






     hasValue

      Indica si el nodo tiene un valor de texto






     isDefault

      Indica si el atributo es por defecto desde el DTD






     isEmptyElement

       Indica si el nodo es un elemento vacío






     localName

      El nombre local del nodo






     name

      El nombre calificado del nodo






     namespaceURI

      El URI del espacio de nombres asociado con el nodo






     nodeType

      El tipo de nodo para el nodo






     prefix

      El prefijo del espacio de nombres asociado con el nodo






     value

      El valor de texto del nodo






     xmlLang

      El ámbito xml:lang en el que reside el nodo




## Constantes predefinidas

    ## Tipos de nodo XMLReader




      **[XMLReader::NONE](#xmlreader.constants.none)**

       Ningún tipo de nodo






      **[XMLReader::ELEMENT](#xmlreader.constants.element)**

       Elemento de inicio






      **[XMLReader::ATTRIBUTE](#xmlreader.constants.attribute)**

       Nodo Atributo






      **[XMLReader::TEXT](#xmlreader.constants.text)**

       Nodo texto






      **[XMLReader::CDATA](#xmlreader.constants.cdata)**

       Nodo CDATA






      **[XMLReader::ENTITY_REF](#xmlreader.constants.entity-ref)**

       Nodo de referencia de entidad






      **[XMLReader::ENTITY](#xmlreader.constants.entity)**

       Nodo de declaración de entidad






      **[XMLReader::PI](#xmlreader.constants.pi)**

       Nodo de instrucción de proceso






      **[XMLReader::COMMENT](#xmlreader.constants.comment)**

       Nodo de comentario






      **[XMLReader::DOC](#xmlreader.constants.doc)**

       Nodo documento






      **[XMLReader::DOC_TYPE](#xmlreader.constants.doc-type)**

       Nodo de tipo de documento






      **[XMLReader::DOC_FRAGMENT](#xmlreader.constants.doc-fragment)**

       Nodo de fragmento de documento






      **[XMLReader::NOTATION](#xmlreader.constants.notation)**

       Nodo de notación






      **[XMLReader::WHITESPACE](#xmlreader.constants.whitespace)**

       Nodo "espacio"






      **[XMLReader::SIGNIFICANT_WHITESPACE](#xmlreader.constants.significant-whitespace)**

       Nodo "espacio" significativo






      **[XMLReader::END_ELEMENT](#xmlreader.constants.end-element)**

       Elemento de fin






      **[XMLReader::END_ENTITY](#xmlreader.constants.end-entity)**

       Entidad de fin






      **[XMLReader::XML_DECLARATION](#xmlreader.constants.xml-declaration)**

       Nodo de declaración XML









    ## Opciones del analizador XMLReader





      **[XMLReader::LOADDTD](#xmlreader.constants.loaddtd)**

       Carga un DTD pero no lo valida






      **[XMLReader::DEFAULTATTRS](#xmlreader.constants.defaultattrs)**

       Carga un DTD y los atributos por defecto pero no lo valida






      **[XMLReader::VALIDATE](#xmlreader.constants.validate)**

       Carga un DTD y valida el documento durante el análisis






      **[XMLReader::SUBST_ENTITIES](#xmlreader.constants.subst-entities)**

       Sustituye las entidades y expande las referencias





## Historial de cambios

       Versión
       Descripción






       8.4.0

        Las constantes de clase ahora están tipadas.





# XMLReader::close

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::close — Cierra la entrada del XMLReader

### Descripción

public **XMLReader::close**(): [true](#language.types.singleton)

Cierra la entrada del objeto XMLReader que es actualmente análizado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna siempre **[true](#constant.true)**.

### Ver también

    - [XMLReader::open()](#xmlreader.open) - Fija el URI que contiene el XML a analizar

    - [XMLReader::XML()](#xmlreader.xml) - Establece los datos que contienen el XML a analizar

# XMLReader::expand

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::expand — Devuelve una copia del nodo actual como un nodo de objeto DOM

### Descripción

public **XMLReader::expand**([?](#language.types.null)[DOMNode](#class.domnode) $baseNode = **[null](#constant.null)**): [DOMNode](#class.domnode)|[false](#language.types.singleton)

Este método copia el nodo actual y devuelve el objeto DOM apropiado.

### Parámetros

     baseNode


       Un [DOMNode](#class.domnode) que define el objetivo
       [DOMDocument](#class.domdocument) para el objeto DOM creado.





### Valores devueltos

El objeto [DOMNode](#class.domnode) resultante o **[false](#constant.false)** en caso
de error.

# XMLReader::fromStream

(PHP 8 &gt;= 8.4.0)

XMLReader::fromStream — Crear un [XMLReader](#class.xmlreader) a partir de un flujo para leer

### Descripción

public static **XMLReader::fromStream**(
    [resource](#language.types.resource) $stream,
    [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**,
    [int](#language.types.integer) $flags = 0,
    [?](#language.types.null)[string](#language.types.string) $documentUri = **[null](#constant.null)**
): static

Crear un [XMLReader](#class.xmlreader) a partir de un flujo para leer.

### Parámetros

    stream


      El flujo desde el cual leer el XML.




    encoding


      La codificación del documento o **[null](#constant.null)**.




    flags


      Una máscara de bits de las constantes
      **[LIBXML_*](#constant.libxml-biglines)**.




    documentUri


      La URI base opcional del documento.


### Valores devueltos

Devuelve un [XMLReader](#class.xmlreader).

### Errores/Excepciones

- Pasar un encoding inválido lanzará una
  [ValueError](#class.valueerror).

- Pasar un recurso que no sea un flujo a stream
  lanzará una [TypeError](#class.typeerror).

### Ver también

- [XMLReader::fromString()](#xmlreader.fromstring) - Crear un XMLReader a partir de una cadena XML

- [XMLReader::fromUri()](#xmlreader.fromuri) - Crear un XMLReader a partir de una URI para leer

# XMLReader::fromString

(PHP 8 &gt;= 8.4.0)

XMLReader::fromString — Crear un [XMLReader](#class.xmlreader) a partir de una cadena XML

### Descripción

public static **XMLReader::fromString**([string](#language.types.string) $source, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): static

Crear un [XMLReader](#class.xmlreader) a partir de una cadena XML.

### Parámetros

     source


       String que contiene el XML a analizar.






     encoding


       La codificación del documento, o **[null](#constant.null)**.






     flags


       Un máscara de constantes [LIBXML_*](#libxml.constants).





### Valores devueltos

Devuelve un [XMLReader](#class.xmlreader).

### Errores/Excepciones

- Pasar un encoding inválido lanzará una
  [ValueError](#class.valueerror).

### Ver también

- [XMLReader::fromStream()](#xmlreader.fromstream) - Crear un XMLReader a partir de un flujo para leer

- [XMLReader::fromUri()](#xmlreader.fromuri) - Crear un XMLReader a partir de una URI para leer

# XMLReader::fromUri

(PHP 8 &gt;= 8.4.0)

XMLReader::fromUri — Crear un [XMLReader](#class.xmlreader) a partir de una URI para leer

### Descripción

public static **XMLReader::fromUri**([string](#language.types.string) $uri, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): static

Crear una instancia de [XMLReader](#class.xmlreader) a partir de una URI para leer.

### Parámetros

     uri


       URI que apunta al documento.






     encoding


       La codificación del documento, o **[null](#constant.null)**.






     flags


       Una máscara de constante [LIBXML_*](#libxml.constants).





### Valores devueltos

Devuelve un [XMLReader](#class.xmlreader).

### Errores/Excepciones

- Pasar un uri inválido lanzará una
  [ValueError](#class.valueerror).

### Ver también

- [XMLReader::fromStream()](#xmlreader.fromstream) - Crear un XMLReader a partir de un flujo para leer

- [XMLReader::fromString()](#xmlreader.fromstring) - Crear un XMLReader a partir de una cadena XML

# XMLReader::getAttribute

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::getAttribute — Obtiener el valor del atributo nombrado

### Descripción

public **XMLReader::getAttribute**([string](#language.types.string) $name): [?](#language.types.null)[string](#language.types.string)

Devuelve el valor del atributo nombrado o **[null](#constant.null)** si
el atributo no existe o no está posicionado en un eleménto del nodo.

### Parámetros

     name


       El nombre del atributo.





### Valores devueltos

El valor del atributo, o **[null](#constant.null)** si no se encuetra un atributo con el
nombre dado por name o no está posicionado en un nodo de elemento.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ya no puede devolver **[false](#constant.false)**.



### Ver también

    - [XMLReader::getAttributeNo()](#xmlreader.getattributeno) - Obtiene el valor de un atributo por el indice

    - [XMLReader::getAttributeNs()](#xmlreader.getattributens) - Recupera el valor de un atributo por nombre local y URI

# XMLReader::getAttributeNo

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::getAttributeNo — Obtiene el valor de un atributo por el indice

### Descripción

public **XMLReader::getAttributeNo**([int](#language.types.integer) $index): [?](#language.types.null)[string](#language.types.string)

Devuelve el valor de un atributo basado en su posición o una
cadena vacia si el atributo no existe o no está posicionado en un eleménto
del nodo.

### Parámetros

     index


       La posición del atributo.





### Valores devueltos

El valor del atributo, o **[null](#constant.null)** si el atributo no existe en
el index o no está posicionado en el eleménto.

### Ver también

    - [XMLReader::getAttribute()](#xmlreader.getattribute) - Obtiener el valor del atributo nombrado

    - [XMLReader::getAttributeNs()](#xmlreader.getattributens) - Recupera el valor de un atributo por nombre local y URI

# XMLReader::getAttributeNs

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::getAttributeNs — Recupera el valor de un atributo por nombre local y URI

### Descripción

public **XMLReader::getAttributeNs**([string](#language.types.string) $name, [string](#language.types.string) $namespace): [?](#language.types.null)[string](#language.types.string)

Devuelve el valor de un atributo por nombre y URI del espacio de nombres o una cadena de caracteres vacía si el atributo no existe o no está establecido en el nodo.

### Parámetros

     name


       El nombre local.






     namespace


       El URI del espacio de nombres.





### Valores devueltos

El valor del atributo, o **[null](#constant.null)** si no se encuentra ningún atributo con el
name y namespace dados o no está establecido en el elemento.

### Historial de cambios

       Versión
       Descripción






       8.0.0

        Esta función ya no puede devolver **[false](#constant.false)**.





### Ver también

    - [XMLReader::getAttribute()](#xmlreader.getattribute) - Obtiener el valor del atributo nombrado

    - [XMLReader::getAttributeNo()](#xmlreader.getattributeno) - Obtiene el valor de un atributo por el indice

# XMLReader::getParserProperty

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::getParserProperty —
Indica si la porpiedad especificada ha sido establecida

### Descripción

public **XMLReader::getParserProperty**([int](#language.types.integer) $property): [bool](#language.types.boolean)

Indica si la porpiedad especificada ha sido establecida.

### Parámetros

     property


       Una de las [constantes analizadoras de
       opción](#xmlreader.constants).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [XMLReader::setParserProperty()](#xmlreader.setparserproperty) - Establecer las opciones del analizador

# XMLReader::isValid

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::isValid — Indica si el documento analizado es válido

### Descripción

public **XMLReader::isValid**(): [bool](#language.types.boolean)

Devuelve un valor booleano que indica si el documento que se está
analizando es válido según el DTD, o un esquema XML o RelaxNG.
Si no hay esquema y la opción de validación DTD no está proporcionada, este método devolverá **[false](#constant.false)**.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** cuando el documento es válido, de lo contrario **[false](#constant.false)**.

### Ejemplos

    **Ejemplo #1 Validación XML**

&lt;?php
$xml = XMLReader::open('examples/book-simple.xml');

// La opción de validación del analizador debe estar
// activa para que este método funcione correctamente
$xml-&gt;setParserProperty(XMLReader::VALIDATE, true);

var_dump($xml-&gt;isValid());
?&gt;

### Notas

**Nota**:

    Este método verifica el nodo actual, no el documento completo.

### Ver también

    - [XMLReader::setParserProperty()](#xmlreader.setparserproperty) - Establecer las opciones del analizador

    - [XMLReader::setRelaxNGSchema()](#xmlreader.setrelaxngschema) - Establece el nomb re del archivo o el URI para un esquema RelaxNG

    - [XMLReader::setRelaxNGSchemaSource()](#xmlreader.setrelaxngschemasource) - Establece los datos contenidos en un esquema RelaxNG

    - [XMLReader::setSchema()](#xmlreader.setschema) - Valida el documento en contra del XSD

# XMLReader::lookupNamespace

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::lookupNamespace — Consulta el espacio de nombres para un prefijo

### Descripción

public **XMLReader::lookupNamespace**([string](#language.types.string) $prefix): [?](#language.types.null)[string](#language.types.string)

Consulta en el ámbito del espacio de nombres para un prefijo dado.

### Parámetros

     prefix


       String que contienen el prefijo.





### Valores devueltos

El valor del espacio de nombres, o **[null](#constant.null)** si no existe ningún espacio de nombres.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       Esta función ya no puede devolver **[false](#constant.false)**.



# XMLReader::moveToAttribute

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::moveToAttribute — Mueve el cursor a un atributo nombrado

### Descripción

public **XMLReader::moveToAttribute**([string](#language.types.string) $name): [bool](#language.types.boolean)

Posciciona el cursor a un atributo nombrado.

### Parámetros

     name


       El nombre del atributo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [XMLReader::moveToElement()](#xmlreader.movetoelement) - Posiciona el cursor en el eleménto padre del actual atributo

    - [XMLReader::moveToAttributeNo()](#xmlreader.movetoattributeno) - Mueve el cursor a un atributo por su índice

    - [XMLReader::moveToAttributeNs()](#xmlreader.movetoattributens) - Mover el cursor a un atributo dado

    - [XMLReader::moveToFirstAttribute()](#xmlreader.movetofirstattribute) - Posiciona el cursor en el primer atributo

# XMLReader::moveToAttributeNo

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::moveToAttributeNo — Mueve el cursor a un atributo por su índice

### Descripción

public **XMLReader::moveToAttributeNo**([int](#language.types.integer) $index): [bool](#language.types.boolean)

Coloca el cursor en el atributo en función de su posición.

### Parámetros

     index


       La posición de el atributo.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [XMLReader::moveToElement()](#xmlreader.movetoelement) - Posiciona el cursor en el eleménto padre del actual atributo

    - [XMLReader::moveToAttribute()](#xmlreader.movetoattribute) - Mueve el cursor a un atributo nombrado

    - [XMLReader::moveToAttributeNs()](#xmlreader.movetoattributens) - Mover el cursor a un atributo dado

    - [XMLReader::moveToFirstAttribute()](#xmlreader.movetofirstattribute) - Posiciona el cursor en el primer atributo

# XMLReader::moveToAttributeNs

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::moveToAttributeNs — Mover el cursor a un atributo dado

### Descripción

public **XMLReader::moveToAttributeNs**([string](#language.types.string) $name, [string](#language.types.string) $namespace): [bool](#language.types.boolean)

Posiciona el cursor en el atributo dado en el espacio de nombres especificado.

### Parámetros

     name


       El nombre local.






     namespace


       El URI namespace.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [XMLReader::moveToElement()](#xmlreader.movetoelement) - Posiciona el cursor en el eleménto padre del actual atributo

    - [XMLReader::moveToAttribute()](#xmlreader.movetoattribute) - Mueve el cursor a un atributo nombrado

    - [XMLReader::moveToAttributeNo()](#xmlreader.movetoattributeno) - Mueve el cursor a un atributo por su índice

    - [XMLReader::moveToFirstAttribute()](#xmlreader.movetofirstattribute) - Posiciona el cursor en el primer atributo

# XMLReader::moveToElement

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::moveToElement — Posiciona el cursor en el eleménto padre del actual atributo

### Descripción

public **XMLReader::moveToElement**(): [bool](#language.types.boolean)

Posiciona el cursor en el eleménto padre del actual atributo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si es satisfactorio y **[false](#constant.false)** si falla o no está posicionado en
el atributo cuando éste método es llamado.

### Ver también

    - [XMLReader::moveToAttribute()](#xmlreader.movetoattribute) - Mueve el cursor a un atributo nombrado

    - [XMLReader::moveToAttributeNo()](#xmlreader.movetoattributeno) - Mueve el cursor a un atributo por su índice

    - [XMLReader::moveToAttributeNs()](#xmlreader.movetoattributens) - Mover el cursor a un atributo dado

    - [XMLReader::moveToFirstAttribute()](#xmlreader.movetofirstattribute) - Posiciona el cursor en el primer atributo

# XMLReader::moveToFirstAttribute

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::moveToFirstAttribute — Posiciona el cursor en el primer atributo

### Descripción

public **XMLReader::moveToFirstAttribute**(): [bool](#language.types.boolean)

Mueve el cursor al primer atributo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [XMLReader::moveToElement()](#xmlreader.movetoelement) - Posiciona el cursor en el eleménto padre del actual atributo

    - [XMLReader::moveToAttribute()](#xmlreader.movetoattribute) - Mueve el cursor a un atributo nombrado

    - [XMLReader::moveToAttributeNo()](#xmlreader.movetoattributeno) - Mueve el cursor a un atributo por su índice

    - [XMLReader::moveToAttributeNs()](#xmlreader.movetoattributens) - Mover el cursor a un atributo dado

    - [XMLReader::moveToNextAttribute()](#xmlreader.movetonextattribute) - Posiciona el cursor en el siguiente atributo

# XMLReader::moveToNextAttribute

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::moveToNextAttribute — Posiciona el cursor en el siguiente atributo

### Descripción

public **XMLReader::moveToNextAttribute**(): [bool](#language.types.boolean)

Posiciona el cursor en el siguiente atributo si se encuentra en un atributo o
lo mueve al primer atributo si se encuentrae un eleménto.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [XMLReader::moveToElement()](#xmlreader.movetoelement) - Posiciona el cursor en el eleménto padre del actual atributo

    - [XMLReader::moveToAttribute()](#xmlreader.movetoattribute) - Mueve el cursor a un atributo nombrado

    - [XMLReader::moveToAttributeNo()](#xmlreader.movetoattributeno) - Mueve el cursor a un atributo por su índice

    - [XMLReader::moveToAttributeNs()](#xmlreader.movetoattributens) - Mover el cursor a un atributo dado

    - [XMLReader::moveToFirstAttribute()](#xmlreader.movetofirstattribute) - Posiciona el cursor en el primer atributo

# XMLReader::next

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::next — Mueve el cursor al siguiente nodo saltandose todos los subárboles

### Descripción

public **XMLReader::next**([?](#language.types.null)[string](#language.types.string) $name = **[null](#constant.null)**): [bool](#language.types.boolean)

Posiciona el cursor al siguiente nodo saltandose todos los subárboles.
Si no existe tal nodo, el cursor se desplaza al final del documento.

### Parámetros

     name


       El nodo del siguiente nodoa mover el cursor.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       name ahora es anulable.



### Ver también

    - [XMLReader::moveToNextAttribute()](#xmlreader.movetonextattribute) - Posiciona el cursor en el siguiente atributo

    - [XMLReader::moveToElement()](#xmlreader.movetoelement) - Posiciona el cursor en el eleménto padre del actual atributo

    - [XMLReader::moveToAttribute()](#xmlreader.movetoattribute) - Mueve el cursor a un atributo nombrado

# XMLReader::open

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::open — Fija el URI que contiene el XML a analizar

### Descripción

public static **XMLReader::open**([string](#language.types.string) $uri, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [XMLReader](#class.xmlreader)

public **XMLReader::open**([string](#language.types.string) $uri, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

Fija el URI que contiene el documento XML a ser analizado.

### Parámetros

     uri


       URI que apunta al documento.






     encoding


       La codificación del documento, o **[null](#constant.null)**.






     flags


       Una máscara de constante [LIBXML_*](#libxml.constants).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error. Si se llama estáticamente, devuelve un objeto
[XMLReader](#class.xmlreader) o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

- Pasar un valor inválido para el encoding generará una
  excepción [ValueError](#class.valueerror).

- Este método puede ser llamado estáticamente, pero, anterior a PHP 8.0.0,
  esto generará un error **[E_DEPRECATED](#constant.e-deprecated)** en tal caso.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Pasar un valor inválido para el encoding ahora generará una
       excepción [ValueError](#class.valueerror).




      8.0.0

       **XMLReader::open()** ahora se declara como método estático,
       pero aún puede ser llamado en una instancia de [XMLReader](#class.xmlreader).



### Ver también

    - [XMLReader::XML()](#xmlreader.xml) - Establece los datos que contienen el XML a analizar

    - [XMLReader::close()](#xmlreader.close) - Cierra la entrada del XMLReader

# XMLReader::read

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::read — Se mueve al siguiente nodo en el documento

### Descripción

public **XMLReader::read**(): [bool](#language.types.boolean)

Mueve el cursor al siguiente nodo en el documento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [XMLReader::moveToElement()](#xmlreader.movetoelement) - Posiciona el cursor en el eleménto padre del actual atributo

    - [XMLReader::moveToAttribute()](#xmlreader.movetoattribute) - Mueve el cursor a un atributo nombrado

    - [XMLReader::next()](#xmlreader.next) - Mueve el cursor al siguiente nodo saltandose todos los subárboles

# XMLReader::readInnerXml

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

XMLReader::readInnerXml — Recupera el XML del actual nodo

### Descripción

public **XMLReader::readInnerXml**(): [string](#language.types.string)

Lee el contenido del actual nodo, incluyendo notas pequeñas y marcado.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Returns the contents of the current node as a string. Empty string on failure.

### Notas

**Precaución**Esta función solo está disponible
si PHP es compilado utilizando la biblioteca libxml 20620 o posterior.

### Ver también

    - [XMLReader::readString()](#xmlreader.readstring) - Lee el contenido del nodo actual como string

    - [XMLReader::readOuterXml()](#xmlreader.readouterxml) - Recupera el XML del actual nodo, incluyendo él mismo

    - [XMLReader::expand()](#xmlreader.expand) - Devuelve una copia del nodo actual como un nodo de objeto DOM

# XMLReader::readOuterXml

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

XMLReader::readOuterXml — Recupera el XML del actual nodo, incluyendo él mismo

### Descripción

public **XMLReader::readOuterXml**(): [string](#language.types.string)

Lee el contenido del actual nodo, incluyendo el nodo mismo.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el contenido del actual nodo, incluyendo el de él mismo, como una cadena. Cadena vacía en fallo.

### Notas

**Precaución**Esta función solo está disponible
si PHP es compilado utilizando la biblioteca libxml 20620 o posterior.

### Ver también

    - [XMLReader::readString()](#xmlreader.readstring) - Lee el contenido del nodo actual como string

    - [XMLReader::readInnerXml()](#xmlreader.readinnerxml) - Recupera el XML del actual nodo

    - [XMLReader::expand()](#xmlreader.expand) - Devuelve una copia del nodo actual como un nodo de objeto DOM

# XMLReader::readString

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

XMLReader::readString — Lee el contenido del nodo actual como string

### Descripción

public **XMLReader::readString**(): [string](#language.types.string)

Lee el contenido del nodo actual como string.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el contenido del nodo actual como cadena. En caso de error
devuelve una cadena vacía.

### Notas

**Precaución**Esta función solo está disponible
si PHP es compilado utilizando la biblioteca libxml 20620 o posterior.

### Ver también

    - [XMLReader::readOuterXml()](#xmlreader.readouterxml) - Recupera el XML del actual nodo, incluyendo él mismo

    - [XMLReader::readInnerXml()](#xmlreader.readinnerxml) - Recupera el XML del actual nodo

    - [XMLReader::expand()](#xmlreader.expand) - Devuelve una copia del nodo actual como un nodo de objeto DOM

# XMLReader::setParserProperty

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::setParserProperty — Establecer las opciones del analizador

### Descripción

public **XMLReader::setParserProperty**([int](#language.types.integer) $property, [bool](#language.types.boolean) $value): [bool](#language.types.boolean)

Establece las opciones del analizador. Las opciones deben ser establecidas después de
llamar a [XMLReader::open()](#xmlreader.open) o
a [XMLReader::XML()](#xmlreader.xml), y antes
de la primera llamada a [XMLReader::read()](#xmlreader.read).

### Parámetros

     property


       Una de las [constantes de opción
       del analizador](#xmlreader.constants).






     value


       Si se establece a **[true](#constant.true)** la opción será habilitada, de otra manera
       será deshabilitada.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

# XMLReader::setRelaxNGSchema

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::setRelaxNGSchema — Establece el nomb re del archivo o el URI para un esquema RelaxNG

### Descripción

public **XMLReader::setRelaxNGSchema**([?](#language.types.null)[string](#language.types.string) $filename): [bool](#language.types.boolean)

Establece el nomb re del archivo o el URI para un esquema RelaxNG a usar para validación.

### Parámetros

     filename


       El nombre del archivo o apuntador URI a un esquema RelaxNG.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [XMLReader::setRelaxNGSchemaSource()](#xmlreader.setrelaxngschemasource) - Establece los datos contenidos en un esquema RelaxNG

    - [XMLReader::setSchema()](#xmlreader.setschema) - Valida el documento en contra del XSD

    - [XMLReader::isValid()](#xmlreader.isvalid) - Indica si el documento analizado es válido

# XMLReader::setRelaxNGSchemaSource

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::setRelaxNGSchemaSource — Establece los datos contenidos en un esquema RelaxNG

### Descripción

public **XMLReader::setRelaxNGSchemaSource**([?](#language.types.null)[string](#language.types.string) $source): [bool](#language.types.boolean)

Establece los datos contenidos en un esquema RelaxNG a usar para validación.

### Parámetros

     source


       SCadena que contiene el esquema RelaxNG.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ver también

    - [XMLReader::setRelaxNGSchema()](#xmlreader.setrelaxngschema) - Establece el nomb re del archivo o el URI para un esquema RelaxNG

    - [XMLReader::setSchema()](#xmlreader.setschema) - Valida el documento en contra del XSD

    - [XMLReader::isValid()](#xmlreader.isvalid) - Indica si el documento analizado es válido

# XMLReader::setSchema

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

XMLReader::setSchema — Valida el documento en contra del XSD

### Descripción

public **XMLReader::setSchema**([?](#language.types.null)[string](#language.types.string) $filename): [bool](#language.types.boolean)

Usa el esquema W3C XSD para validar el documento como es procesado. La activación solo
es posible antes de la primera lectura o Read().

### Parámetros

     filename


       El nombre del archivo del esquema XSD.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

Las cuestiones **[E_WARNING](#constant.e-warning)** si la libxml fue construida sin el esquema
de soporte, el esquema contiene errores si el
[XMLReader::read()](#xmlreader.read) ya ha sido llamado.

### Notas

**Precaución**Esta función solo está disponible
si PHP es compilado utilizando la biblioteca libxml 20620 o posterior.

### Ver también

    - [XMLReader::setRelaxNGSchema()](#xmlreader.setrelaxngschema) - Establece el nomb re del archivo o el URI para un esquema RelaxNG

    - [XMLReader::setRelaxNGSchemaSource()](#xmlreader.setrelaxngschemasource) - Establece los datos contenidos en un esquema RelaxNG

    - [XMLReader::isValid()](#xmlreader.isvalid) - Indica si el documento analizado es válido

# XMLReader::XML

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

XMLReader::XML — Establece los datos que contienen el XML a analizar

### Descripción

public static **XMLReader::XML**([string](#language.types.string) $source, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [XMLReader](#class.xmlreader)

public **XMLReader::XML**([string](#language.types.string) $source, [?](#language.types.null)[string](#language.types.string) $encoding = **[null](#constant.null)**, [int](#language.types.integer) $flags = 0): [bool](#language.types.boolean)

Establece los datos que contienen el XML a analizar.

### Parámetros

     source


       String que contiene el XML a analizar.






     encoding


       La codificación del documento, o **[null](#constant.null)**.






     flags


       Un máscara de constantes [LIBXML_*](#libxml.constants).





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error. Si se llama estáticamente, devuelve un objeto
[XMLReader](#class.xmlreader) o **[false](#constant.false)** si ocurre un error.

### Errores/Excepciones

- Pasar un valor inválido para el encoding generará una
  excepción [ValueError](#class.valueerror).

- Este método puede ser llamado estáticamente, pero, antes de PHP 8.0.0, esto
  generará un error **[E_DEPRECATED](#constant.e-deprecated)** en este caso.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Pasar un valor inválido para el encoding ahora genera una
       excepción [ValueError](#class.valueerror).




      8.0.0

       **XMLReader::xml()** ahora se declara como método estático,
       pero aún puede ser llamado en una instancia de [XMLReader](#class.xmlreader).



### Ver también

    - [XMLReader::open()](#xmlreader.open) - Fija el URI que contiene el XML a analizar

    - [XMLReader::close()](#xmlreader.close) - Cierra la entrada del XMLReader

## Tabla de contenidos

- [XMLReader::close](#xmlreader.close) — Cierra la entrada del XMLReader
- [XMLReader::expand](#xmlreader.expand) — Devuelve una copia del nodo actual como un nodo de objeto DOM
- [XMLReader::fromStream](#xmlreader.fromstream) — Crear un XMLReader a partir de un flujo para leer
- [XMLReader::fromString](#xmlreader.fromstring) — Crear un XMLReader a partir de una cadena XML
- [XMLReader::fromUri](#xmlreader.fromuri) — Crear un XMLReader a partir de una URI para leer
- [XMLReader::getAttribute](#xmlreader.getattribute) — Obtiener el valor del atributo nombrado
- [XMLReader::getAttributeNo](#xmlreader.getattributeno) — Obtiene el valor de un atributo por el indice
- [XMLReader::getAttributeNs](#xmlreader.getattributens) — Recupera el valor de un atributo por nombre local y URI
- [XMLReader::getParserProperty](#xmlreader.getparserproperty) — Indica si la porpiedad especificada ha sido establecida
- [XMLReader::isValid](#xmlreader.isvalid) — Indica si el documento analizado es válido
- [XMLReader::lookupNamespace](#xmlreader.lookupnamespace) — Consulta el espacio de nombres para un prefijo
- [XMLReader::moveToAttribute](#xmlreader.movetoattribute) — Mueve el cursor a un atributo nombrado
- [XMLReader::moveToAttributeNo](#xmlreader.movetoattributeno) — Mueve el cursor a un atributo por su índice
- [XMLReader::moveToAttributeNs](#xmlreader.movetoattributens) — Mover el cursor a un atributo dado
- [XMLReader::moveToElement](#xmlreader.movetoelement) — Posiciona el cursor en el eleménto padre del actual atributo
- [XMLReader::moveToFirstAttribute](#xmlreader.movetofirstattribute) — Posiciona el cursor en el primer atributo
- [XMLReader::moveToNextAttribute](#xmlreader.movetonextattribute) — Posiciona el cursor en el siguiente atributo
- [XMLReader::next](#xmlreader.next) — Mueve el cursor al siguiente nodo saltandose todos los subárboles
- [XMLReader::open](#xmlreader.open) — Fija el URI que contiene el XML a analizar
- [XMLReader::read](#xmlreader.read) — Se mueve al siguiente nodo en el documento
- [XMLReader::readInnerXml](#xmlreader.readinnerxml) — Recupera el XML del actual nodo
- [XMLReader::readOuterXml](#xmlreader.readouterxml) — Recupera el XML del actual nodo, incluyendo él mismo
- [XMLReader::readString](#xmlreader.readstring) — Lee el contenido del nodo actual como string
- [XMLReader::setParserProperty](#xmlreader.setparserproperty) — Establecer las opciones del analizador
- [XMLReader::setRelaxNGSchema](#xmlreader.setrelaxngschema) — Establece el nomb re del archivo o el URI para un esquema RelaxNG
- [XMLReader::setRelaxNGSchemaSource](#xmlreader.setrelaxngschemasource) — Establece los datos contenidos en un esquema RelaxNG
- [XMLReader::setSchema](#xmlreader.setschema) — Valida el documento en contra del XSD
- [XMLReader::XML](#xmlreader.xml) — Establece los datos que contienen el XML a analizar

- [Introducción](#intro.xmlreader)
- [Instalación/Configuración](#xmlreader.setup)<li>[Requerimientos](#xmlreader.requirements)
- [Instalación](#xmlreader.installation)
  </li>- [XMLReader](#class.xmlreader) — La clase XMLReader<li>[XMLReader::close](#xmlreader.close) — Cierra la entrada del XMLReader
- [XMLReader::expand](#xmlreader.expand) — Devuelve una copia del nodo actual como un nodo de objeto DOM
- [XMLReader::fromStream](#xmlreader.fromstream) — Crear un XMLReader a partir de un flujo para leer
- [XMLReader::fromString](#xmlreader.fromstring) — Crear un XMLReader a partir de una cadena XML
- [XMLReader::fromUri](#xmlreader.fromuri) — Crear un XMLReader a partir de una URI para leer
- [XMLReader::getAttribute](#xmlreader.getattribute) — Obtiener el valor del atributo nombrado
- [XMLReader::getAttributeNo](#xmlreader.getattributeno) — Obtiene el valor de un atributo por el indice
- [XMLReader::getAttributeNs](#xmlreader.getattributens) — Recupera el valor de un atributo por nombre local y URI
- [XMLReader::getParserProperty](#xmlreader.getparserproperty) — Indica si la porpiedad especificada ha sido establecida
- [XMLReader::isValid](#xmlreader.isvalid) — Indica si el documento analizado es válido
- [XMLReader::lookupNamespace](#xmlreader.lookupnamespace) — Consulta el espacio de nombres para un prefijo
- [XMLReader::moveToAttribute](#xmlreader.movetoattribute) — Mueve el cursor a un atributo nombrado
- [XMLReader::moveToAttributeNo](#xmlreader.movetoattributeno) — Mueve el cursor a un atributo por su índice
- [XMLReader::moveToAttributeNs](#xmlreader.movetoattributens) — Mover el cursor a un atributo dado
- [XMLReader::moveToElement](#xmlreader.movetoelement) — Posiciona el cursor en el eleménto padre del actual atributo
- [XMLReader::moveToFirstAttribute](#xmlreader.movetofirstattribute) — Posiciona el cursor en el primer atributo
- [XMLReader::moveToNextAttribute](#xmlreader.movetonextattribute) — Posiciona el cursor en el siguiente atributo
- [XMLReader::next](#xmlreader.next) — Mueve el cursor al siguiente nodo saltandose todos los subárboles
- [XMLReader::open](#xmlreader.open) — Fija el URI que contiene el XML a analizar
- [XMLReader::read](#xmlreader.read) — Se mueve al siguiente nodo en el documento
- [XMLReader::readInnerXml](#xmlreader.readinnerxml) — Recupera el XML del actual nodo
- [XMLReader::readOuterXml](#xmlreader.readouterxml) — Recupera el XML del actual nodo, incluyendo él mismo
- [XMLReader::readString](#xmlreader.readstring) — Lee el contenido del nodo actual como string
- [XMLReader::setParserProperty](#xmlreader.setparserproperty) — Establecer las opciones del analizador
- [XMLReader::setRelaxNGSchema](#xmlreader.setrelaxngschema) — Establece el nomb re del archivo o el URI para un esquema RelaxNG
- [XMLReader::setRelaxNGSchemaSource](#xmlreader.setrelaxngschemasource) — Establece los datos contenidos en un esquema RelaxNG
- [XMLReader::setSchema](#xmlreader.setschema) — Valida el documento en contra del XSD
- [XMLReader::XML](#xmlreader.xml) — Establece los datos que contienen el XML a analizar
  </li>
