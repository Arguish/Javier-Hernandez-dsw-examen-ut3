# SimpleXML

# Introducción

La extensión SimpleXML proporciona un conjunto de herramientas muy simple y
fácil de usar para convertir XML a un objeto que pueda ser procesado
con selectores de propiedades normales e iteradores de arrays.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#simplexml.requirements)
- [Instalación](#simplexml.installation)

    ## Requerimientos

Esta extensión requiere la extensión PHP [libxml](#book.libxml).
Esto significa pasar la opción de configuración
**--with-libxml**, o anterior a PHP 7.4
la opción de configuración **--enable-libxml**,
aunque esto se realiza implícitamente ya que libxml está activado por omisión.

## Instalación

Esta extensión está activada por omisión. Puede ser desactivada utilizando la opción de configuración:
**--disable-simplexml**

# Ejemplos

## Tabla de contenidos

- [Uso básico de SimpleXML](#simplexml.examples-basic)
- [Manejo de errores XML](#simplexml.examples-errors)

    ## Uso básico de SimpleXML

    Varios ejemplos de este capítulo requieren una cadena XML. En lugar de
    repetirla en cada ejemplo, se colocará en un archivo que se incluirá en
    cada uno de ellos. El contenido de este archivo se ilustra con el ejemplo
    que sigue. De lo contrario, puede crearse un documento XML y leerse con
    [simplexml_load_file()](#function.simplexml-load-file).

    **Ejemplo #1 Ejemplo de archivo incluido examples/simplexml-data.php con una cadena XML**

&lt;?php
$xmlstr = &lt;&lt;&lt;XML
&lt;?xml version='1.0' standalone='yes'?&gt;
&lt;movies&gt;
&lt;movie&gt;
&lt;title&gt;PHP: Behind the Parser&lt;/title&gt;
&lt;characters&gt;
&lt;character&gt;
&lt;name&gt;Ms. Coder&lt;/name&gt;
&lt;actor&gt;Onlivia Actora&lt;/actor&gt;
&lt;/character&gt;
&lt;character&gt;
&lt;name&gt;Mr. Coder&lt;/name&gt;
&lt;actor&gt;El Act&amp;#211;r&lt;/actor&gt;
&lt;/character&gt;
&lt;/characters&gt;
&lt;plot&gt;
So, this language. It's like, a programming language. Or is it a
scripting language? All is revealed in this thrilling horror spoof
of a documentary.
&lt;/plot&gt;
&lt;great-lines&gt;
&lt;line&gt;PHP solves all my web problems&lt;/line&gt;
&lt;/great-lines&gt;
&lt;rating type="thumbs"&gt;7&lt;/rating&gt;
&lt;rating type="stars"&gt;5&lt;/rating&gt;
&lt;/movie&gt;
&lt;/movies&gt;
XML;
?&gt;

La simplicidad de SimpleXML se hace más evidente cuando se intenta
extraer una cadena o un número de un documento XML básico.

    **Ejemplo #2 Lectura de &lt;plot&gt;**

&lt;?php
include 'examples/simplexml-data.php';

$movies = new SimpleXMLElement($xmlstr);

echo $movies-&gt;movie[0]-&gt;plot;
?&gt;

    El ejemplo anterior mostrará:

So, this language. It's like, a programming language. Or is it a
scripting language? All is revealed in this thrilling horror spoof
of a documentary.

El acceso a los elementos de un documento XML que contiene caracteres no permitidos
según la convención de nombres de PHP (por ejemplo, palabras clave) es posible
encapsulando el nombre del elemento entre corchetes y comillas simples.

    **Ejemplo #3 Recuperación de &lt;line&gt;**

&lt;?php
include 'examples/simplexml-data.php';

$movies = new SimpleXMLElement($xmlstr);

echo $movies-&gt;movie-&gt;{'great-lines'}-&gt;line;
?&gt;

    El ejemplo anterior mostrará:

PHP solves all my web problems

    **Ejemplo #4 Acceder a un elemento no único con SimpleXML**



     Cuando existen múltiples instancias de un elemento como hijos de un
     elemento padre único, pueden aplicarse las técnicas normales de iteración.

&lt;?php
include 'examples/simplexml-data.php';

$movies = new SimpleXMLElement($xmlstr);

/_ Para cada &lt;character&gt;, se muestra un &lt;name&gt;. _/
foreach ($movies-&gt;movie-&gt;characters-&gt;character as $character) {
echo $character-&gt;name, ' played by ', $character-&gt;actor, PHP_EOL;
}

?&gt;

    El ejemplo anterior mostrará:

Ms. Coder played by Onlivia Actora
Mr. Coder played by El ActÓr

**Nota**:

    Las propiedades ($movies-&gt;movie en nuestro ejemplo anterior)
    no son arrays. Son objetos
    [iterables](#class.iterator) y
    [accesibles](#class.arrayaccess).








    **Ejemplo #5 Uso de atributos**



     Hasta ahora, solo se ha cubierto la lectura de los nombres de los elementos
     y sus valores. SimpleXML también puede acceder a sus atributos.
     El acceso a los atributos de un elemento se realiza de la misma manera que
     el acceso a los elementos de un array.

&lt;?php
include 'examples/simplexml-data.php';

$movies = new SimpleXMLElement($xmlstr);

/\* Acceso al nodo &lt;rating&gt; del primer &lt;movie&gt;.

- Mostrar también los atributos de &lt;rating&gt;. \*/
  foreach ($movies-&gt;movie[0]-&gt;rating as $rating) {
  switch((string) $rating['type']) { // Obtener atributos como índices de elementos
  case 'thumbs':
  echo $rating, ' thumbs up';
  break;
  case 'stars':
  echo $rating, ' stars';
  break;
  }
  }
  ?&gt;

        El ejemplo anterior mostrará:

7 thumbs up5 stars

    **Ejemplo #6 Comparación de elementos y atributos con texto**



     Para comparar un elemento o un atributo con una cadena de caracteres
     o para pasarlo a una función que requiera una cadena de caracteres,
     debe convertirse en una cadena utilizando
     (string).
     De lo contrario, PHP tratará el elemento como un objeto.

&lt;?php
include 'examples/simplexml-data.php';

$movies = new SimpleXMLElement($xmlstr);

if ((string) $movies-&gt;movie-&gt;title == 'PHP: Behind the Parser') {
print 'My favorite movie.';
}

echo htmlentities((string) $movies-&gt;movie-&gt;title);
?&gt;

    El ejemplo anterior mostrará:

My favorite movie.PHP: Behind the Parser

    **Ejemplo #7 Comparación de 2 elementos**



     Dos objetos [SimpleXMLElement](#class.simplexmlelement)
     se consideran diferentes incluso si
     apuntan al mismo elemento.

&lt;?php
include 'examples/simplexml-data.php';

$movies1 = new SimpleXMLElement($xmlstr);
$movies2 = new SimpleXMLElement($xmlstr);
var_dump($movies1 == $movies2);
?&gt;

    El ejemplo anterior mostrará:

bool(false)

    **Ejemplo #8 Uso de XPath**



     SimpleXML incluye soporte integrado para XPath.
     Para encontrar todos los elementos &lt;character&gt;.




     '//' actúa como comodín. Para especificar una ruta absoluta,
     se elimina una barra.

&lt;?php
include 'examples/simplexml-data.php';

$movies = new SimpleXMLElement($xmlstr);

foreach ($movies-&gt;xpath('//character') as $character) {
echo $character-&gt;name, ' played by ', $character-&gt;actor, PHP_EOL;
}
?&gt;

    El ejemplo anterior mostrará:

Ms. Coder played by Onlivia Actora
Mr. Coder played by El ActÓr

    **Ejemplo #9 Asignación de valores**



     Los datos en SimpleXML no tienen que ser constantes. El objeto permite
     la manipulación de todos estos elementos.

&lt;?php
include 'examples/simplexml-data.php';
$movies = new SimpleXMLElement($xmlstr);

$movies-&gt;movie[0]-&gt;characters-&gt;character[0]-&gt;name = 'Miss Coder';

echo $movies-&gt;asXML();
?&gt;

    El ejemplo anterior mostrará:

&lt;?xml version="1.0" standalone="yes"?&gt;
&lt;movies&gt;
&lt;movie&gt;
&lt;title&gt;PHP: Behind the Parser&lt;/title&gt;
&lt;characters&gt;
&lt;character&gt;
&lt;name&gt;Miss Coder&lt;/name&gt;
&lt;actor&gt;Onlivia Actora&lt;/actor&gt;
&lt;/character&gt;
&lt;character&gt;
&lt;name&gt;Mr. Coder&lt;/name&gt;
&lt;actor&gt;El Act&amp;#xD3;r&lt;/actor&gt;
&lt;/character&gt;
&lt;/characters&gt;
&lt;plot&gt;
So, this language. It's like, a programming language. Or is it a
scripting language? All is revealed in this thrilling horror spoof
of a documentary.
&lt;/plot&gt;
&lt;great-lines&gt;
&lt;line&gt;PHP solves all my web problems&lt;/line&gt;
&lt;/great-lines&gt;
&lt;rating type="thumbs"&gt;7&lt;/rating&gt;
&lt;rating type="stars"&gt;5&lt;/rating&gt;
&lt;/movie&gt;
&lt;/movies&gt;

    **Ejemplo #10 Añadir elementos y atributos**



     SimpleXML es capaz de añadir fácilmente
     hijos y atributos.

&lt;?php
include 'examples/simplexml-data.php';
$movies = new SimpleXMLElement($xmlstr);

$character = $movies-&gt;movie[0]-&gt;characters-&gt;addChild('character');
$character-&gt;addChild('name', 'Mr. Parser');
$character-&gt;addChild('actor', 'John Doe');

$rating = $movies-&gt;movie[0]-&gt;addChild('rating', 'PG');
$rating-&gt;addAttribute('type', 'mpaa');

echo $movies-&gt;asXML();
?&gt;

    El ejemplo anterior mostrará:

&lt;?xml version="1.0" standalone="yes"?&gt;
&lt;movies&gt;
&lt;movie&gt;
&lt;title&gt;PHP: Behind the Parser&lt;/title&gt;
&lt;characters&gt;
&lt;character&gt;
&lt;name&gt;Ms. Coder&lt;/name&gt;
&lt;actor&gt;Onlivia Actora&lt;/actor&gt;
&lt;/character&gt;
&lt;character&gt;
&lt;name&gt;Mr. Coder&lt;/name&gt;
&lt;actor&gt;El Act&amp;#xD3;r&lt;/actor&gt;
&lt;/character&gt;
&lt;character&gt;&lt;name&gt;Mr. Parser&lt;/name&gt;&lt;actor&gt;John Doe&lt;/actor&gt;&lt;/character&gt;&lt;/characters&gt;
&lt;plot&gt;
So, this language. It's like, a programming language. Or is it a
scripting language? All is revealed in this thrilling horror spoof
of a documentary.
&lt;/plot&gt;
&lt;great-lines&gt;
&lt;line&gt;PHP solves all my web problems&lt;/line&gt;
&lt;/great-lines&gt;
&lt;rating type="thumbs"&gt;7&lt;/rating&gt;
&lt;rating type="stars"&gt;5&lt;/rating&gt;
&lt;rating type="mpaa"&gt;PG&lt;/rating&gt;&lt;/movie&gt;
&lt;/movies&gt;

    **Ejemplo #11 Interoperabilidad DOM**



     PHP tiene un mecanismo para convertir nodos XML entre los formatos
     SimpleXML y DOM. Este ejemplo muestra cómo cambiar un elemento DOM a
     SimpleXML.

&lt;?php
$dom = new DOMDocument;
$dom-&gt;loadXML('&lt;books&gt;&lt;book&gt;&lt;title&gt;blah&lt;/title&gt;&lt;/book&gt;&lt;/books&gt;');
if (!$dom) {
echo 'Error al analizar el documento';
exit;
}

$books = simplexml_import_dom($dom);

echo $books-&gt;book[0]-&gt;title;
?&gt;

    El ejemplo anterior mostrará:

blah

    **Ejemplo #12 Uso de espacios de nombres**



     &lt;?php

$data = &lt;&lt;&lt;XML
&lt;movies xmlns="http://default" xmlns:a="http://a"&gt;
&lt;movie xml:id="movie1" a:link="IMDB"&gt;
&lt;a:actor&gt;Onlivia Actora&lt;/a:actor&gt;
&lt;/movie&gt;
&lt;/movies&gt;
XML;

$movies = simplexml_load_string($data);

// El espacio de nombres http://www.w3.org/XML/1998/namespace está disponible bajo el nombre "xml".
echo $movies-&gt;movie-&gt;attributes("xml", true)["id"] . "\n";

// Los atributos con espacio de nombres pueden recuperarse con attributes().
echo $movies-&gt;movie-&gt;attributes("a", true)["link"] . "\n";

// El uso de la URI del espacio de nombres permite usar cualquier alias en el documento.
echo $movies-&gt;movie-&gt;attributes("http://a")["link"] . "\n";

// Los hijos pueden recuperarse con children().
echo $movies-&gt;movie-&gt;children("http://a")-&gt;actor . "\n";

// El uso de xpath() con un espacio de nombres requiere registrarlo primero.
$movies-&gt;registerXPathNamespace("a", "http://a");
echo count($movies-&gt;xpath("//a:actor")) . "\n";

// Incluso el espacio de nombres por defecto debe registrarse.
$movies-&gt;registerXPathNamespace("default", "http://default");
echo count($movies-&gt;xpath("//default:movie")) . "\n";

// Esto está vacío.
echo count($movies-&gt;xpath("//movie")) . "\n";
?&gt;

## Manejo de errores XML

El manejo de errores XML al cargar un documento es
una tarea sencilla. Utilizando las funcionalidades
[libxml](#book.libxml), es posible suprimir
todos los errores XML al cargar un documento, y luego recorrerlos.

El objeto [LibXMLError](#class.libxmlerror), devuelto por la función
[libxml_get_errors()](#function.libxml-get-errors), contiene varias propiedades
como el [mensaje](#libxmlerror.props.message),
la [línea](#libxmlerror.props.line) y la
[columna](#libxmlerror.props.column) (posición) del error.

    **Ejemplo #1 Carga de cadenas XML rotas**

&lt;?php
libxml_use_internal_errors(true);
$sxe = simplexml_load_string("&lt;?xml version='1.0'&gt;&lt;broken&gt;&lt;xml&gt;&lt;/broken&gt;");
if ($sxe === false) {
echo "Error al cargar el XML\n";
foreach(libxml_get_errors() as $error) {
echo "\t", $error-&gt;message;
}
}
?&gt;

    El ejemplo anterior mostrará:

Error al cargar el XML
Blank needed here
parsing XML declaration: '?&gt;' expected
Opening and ending tag mismatch: xml line 1 and broken
Premature end of data in tag broken line 1

## Ver también

     - [libxml_use_internal_errors()](#function.libxml-use-internal-errors)

     - [libxml_get_errors()](#function.libxml-get-errors)

     - [LibXMLError](#class.libxmlerror)

# La clase SimpleXMLElement

(PHP 8)

## Introducción

    Representa un elemento del documento XML.

## Sinopsis de la Clase

     class **SimpleXMLElement**



     implements
      [Stringable](#class.stringable),

     [Countable](#class.countable),

     [RecursiveIterator](#class.recursiveiterator) {

    /* Métodos */

public [\_\_construct](#simplexmlelement.construct)(
    [string](#language.types.string) $data,
    [int](#language.types.integer) $options = 0,
    [bool](#language.types.boolean) $dataIsURL = **[false](#constant.false)**,
    [string](#language.types.string) $namespaceOrPrefix = "",
    [bool](#language.types.boolean) $isPrefix = **[false](#constant.false)**
)

    public [addAttribute](#simplexmlelement.addattribute)([string](#language.types.string) $qualifiedName, [string](#language.types.string) $value, [?](#language.types.null)[string](#language.types.string) $namespace = **[null](#constant.null)**): [void](language.types.void.html)

public [addChild](#simplexmlelement.addchild)([string](#language.types.string) $qualifiedName, [?](#language.types.null)[string](#language.types.string) $value = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $namespace = **[null](#constant.null)**): [?](#language.types.null)[SimpleXMLElement](#class.simplexmlelement)
public [asXML](#simplexmlelement.asxml)([?](#language.types.null)[string](#language.types.string) $filename = **[null](#constant.null)**): [string](#language.types.string)|[bool](#language.types.boolean)
public [attributes](#simplexmlelement.attributes)([?](#language.types.null)[string](#language.types.string) $namespaceOrPrefix = **[null](#constant.null)**, [bool](#language.types.boolean) $isPrefix = **[false](#constant.false)**): [?](#language.types.null)[SimpleXMLElement](#class.simplexmlelement)
public [children](#simplexmlelement.children)([?](#language.types.null)[string](#language.types.string) $namespaceOrPrefix = **[null](#constant.null)**, [bool](#language.types.boolean) $isPrefix = **[false](#constant.false)**): [?](#language.types.null)[SimpleXMLElement](#class.simplexmlelement)
public [count](#simplexmlelement.count)(): [int](#language.types.integer)
public [current](#simplexmlelement.current)(): [SimpleXMLElement](#class.simplexmlelement)
public [getDocNamespaces](#simplexmlelement.getdocnamespaces)([bool](#language.types.boolean) $recursive = **[false](#constant.false)**, [bool](#language.types.boolean) $fromRoot = **[true](#constant.true)**): [array](#language.types.array)|[false](#language.types.singleton)
public [getName](#simplexmlelement.getname)(): [string](#language.types.string)
public [getNamespaces](#simplexmlelement.getnamespaces)([bool](#language.types.boolean) $recursive = **[false](#constant.false)**): [array](#language.types.array)
public [getChildren](#simplexmlelement.getchildren)(): [?](#language.types.null)[SimpleXMLElement](#class.simplexmlelement)
public [hasChildren](#simplexmlelement.haschildren)(): [bool](#language.types.boolean)
public [key](#simplexmlelement.key)(): [string](#language.types.string)
public [next](#simplexmlelement.next)(): [void](language.types.void.html)
public [registerXPathNamespace](#simplexmlelement.registerxpathnamespace)([string](#language.types.string) $prefix, [string](#language.types.string) $namespace): [bool](#language.types.boolean)
public [rewind](#simplexmlelement.rewind)(): [void](language.types.void.html)
public [\_\_toString](#simplexmlelement.tostring)(): [string](#language.types.string)
public [valid](#simplexmlelement.valid)(): [bool](#language.types.boolean)
public [xpath](#simplexmlelement.xpath)([string](#language.types.string) $expression): [array](#language.types.array)|[null](#language.types.null)|[false](#language.types.singleton)

}

## Historial de cambios

       Versión
       Descripción






       8.0.0

        La clase **SimpleXMLElement** implementa ahora [Stringable](#class.stringable),
        [Countable](#class.countable)
        y [RecursiveIterator](#class.recursiveiterator).





# SimpleXMLElement::addAttribute

(PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

SimpleXMLElement::addAttribute —
Añade un atributo al elemento SimpleXML

### Descripción

public **SimpleXMLElement::addAttribute**([string](#language.types.string) $qualifiedName, [string](#language.types.string) $value, [?](#language.types.null)[string](#language.types.string) $namespace = **[null](#constant.null)**): [void](language.types.void.html)

Añade un atributo al elemento SimpleXML.

### Parámetros

     qualifiedName


       El nombre del atributo a añadir.






     value


       El valor del atributo.






     namespace


       Si se especifica, el espacio de nombres al que pertenece el atributo.





### Valores devueltos

No se retorna ningún valor.

### Ejemplos

**Nota**:

     Los ejemplos listados incluyen a veces example/simplexml-data.php,
     esto hace referencia a la cadena XML del primer ejemplo de
     [uso básico](#simplexml.examples-basic).





    **Ejemplo #1 Añade atributos y elementos hijos a un elemento SimpleXML**

&lt;?php

include 'examples/simplexml-data.php';

$sxe = new SimpleXMLElement($xmlstr);
$sxe-&gt;addAttribute('type', 'documentary');

$movie = $sxe-&gt;addChild('movie');
$movie-&gt;addChild('title', 'PHP2: More Parser Stories');
$movie-&gt;addChild('plot', 'This is all about the people who make it work.');

$characters = $movie-&gt;addChild('characters');
$character = $characters-&gt;addChild('character');
$character-&gt;addChild('name', 'Mr. Parser');
$character-&gt;addChild('actor', 'John Doe');

$rating = $movie-&gt;addChild('rating', '5');
$rating-&gt;addAttribute('type', 'stars');

echo $sxe-&gt;asXML();

?&gt;

    Resultado del ejemplo anterior es similar a:

&lt;?xml version="1.0" standalone="yes"?&gt;
&lt;movies type="documentary"&gt;
&lt;movie&gt;
&lt;title&gt;PHP: Behind the Parser&lt;/title&gt;
&lt;characters&gt;
&lt;character&gt;
&lt;name&gt;Ms. Coder&lt;/name&gt;
&lt;actor&gt;Onlivia Actora&lt;/actor&gt;
&lt;/character&gt;
&lt;character&gt;
&lt;name&gt;Mr. Coder&lt;/name&gt;
&lt;actor&gt;El Act&amp;#xD3;r&lt;/actor&gt;
&lt;/character&gt;
&lt;/characters&gt;
&lt;plot&gt;
So, this language. It's like, a programming language. Or is it a
scripting language? All is revealed in this thrilling horror spoof
of a documentary.
&lt;/plot&gt;
&lt;great-lines&gt;
&lt;line&gt;PHP solves all my web problems&lt;/line&gt;
&lt;/great-lines&gt;
&lt;rating type="thumbs"&gt;7&lt;/rating&gt;
&lt;rating type="stars"&gt;5&lt;/rating&gt;
&lt;/movie&gt;
&lt;movie&gt;
&lt;title&gt;PHP2: More Parser Stories&lt;/title&gt;
&lt;plot&gt;This is all about the people who make it work.&lt;/plot&gt;
&lt;characters&gt;
&lt;character&gt;
&lt;name&gt;Mr. Parser&lt;/name&gt;
&lt;actor&gt;John Doe&lt;/actor&gt;
&lt;/character&gt;
&lt;/characters&gt;
&lt;rating type="stars"&gt;5&lt;/rating&gt;
&lt;/movie&gt;
&lt;/movies&gt;

### Ver también

    - [SimpleXMLElement::addChild()](#simplexmlelement.addchild) - Añade un elemento hijo al nodo XML

    - [Uso básico de SimpleXML](#simplexml.examples-basic)

# SimpleXMLElement::addChild

(PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

SimpleXMLElement::addChild —
Añade un elemento hijo al nodo XML

### Descripción

public **SimpleXMLElement::addChild**([string](#language.types.string) $qualifiedName, [?](#language.types.null)[string](#language.types.string) $value = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $namespace = **[null](#constant.null)**): [?](#language.types.null)[SimpleXMLElement](#class.simplexmlelement)

Añade un elemento hijo al nodo y devuelve un SimpleXMLElement del hijo.

### Parámetros

     qualifiedName


       El nombre del elemento hijo a añadir.






     value


       Si se especifica, el valor del elemento hijo.






     namespace


       Si se especifica, el espacio de nombres al que pertenece el elemento hijo.





### Valores devueltos

El método addChild devuelve un objeto [SimpleXMLElement](#class.simplexmlelement)
que representa al hijo a añadir al nodo XML en caso de éxito; **[null](#constant.null)** en caso de fallo.

### Ejemplos

**Nota**:

     Los ejemplos listados incluyen a veces examples/simplexml-data.php,
     esto hace referencia a la cadena XML del primer ejemplo de
     [el uso básico](#simplexml.examples-basic).





    **Ejemplo #1 Añade atributos y elementos hijos a un elemento SimpleXML**

&lt;?php

include 'examples/simplexml-data.php';

$sxe = new SimpleXMLElement($xmlstr);
$sxe-&gt;addAttribute('type', 'documentary');

$movie = $sxe-&gt;addChild('movie');
$movie-&gt;addChild('title', 'PHP2: More Parser Stories');
$movie-&gt;addChild('plot', 'This is all about the people who make it work.');

$characters = $movie-&gt;addChild('characters');
$character = $characters-&gt;addChild('character');
$character-&gt;addChild('name', 'Mr. Parser');
$character-&gt;addChild('actor', 'John Doe');

$rating = $movie-&gt;addChild('rating', '5');
$rating-&gt;addAttribute('type', 'stars');

echo $sxe-&gt;asXML();

?&gt;

    Resultado del ejemplo anterior es similar a:

&lt;?xml version="1.0" standalone="yes"?&gt;
&lt;movies type="documentary"&gt;
&lt;movie&gt;
&lt;title&gt;PHP: Behind the Parser&lt;/title&gt;
&lt;characters&gt;
&lt;character&gt;
&lt;name&gt;Ms. Coder&lt;/name&gt;
&lt;actor&gt;Onlivia Actora&lt;/actor&gt;
&lt;/character&gt;
&lt;character&gt;
&lt;name&gt;Mr. Coder&lt;/name&gt;
&lt;actor&gt;El Act&amp;#xD3;r&lt;/actor&gt;
&lt;/character&gt;
&lt;/characters&gt;
&lt;plot&gt;
So, this language. It's like, a programming language. Or is it a
scripting language? All is revealed in this thrilling horror spoof
of a documentary.
&lt;/plot&gt;
&lt;great-lines&gt;
&lt;line&gt;PHP solves all my web problems&lt;/line&gt;
&lt;/great-lines&gt;
&lt;rating type="thumbs"&gt;7&lt;/rating&gt;
&lt;rating type="stars"&gt;5&lt;/rating&gt;
&lt;/movie&gt;
&lt;movie&gt;
&lt;title&gt;PHP2: More Parser Stories&lt;/title&gt;
&lt;plot&gt;This is all about the people who make it work.&lt;/plot&gt;
&lt;characters&gt;
&lt;character&gt;
&lt;name&gt;Mr. Parser&lt;/name&gt;
&lt;actor&gt;John Doe&lt;/actor&gt;
&lt;/character&gt;
&lt;/characters&gt;
&lt;rating type="stars"&gt;5&lt;/rating&gt;
&lt;/movie&gt;
&lt;/movies&gt;

### Ver también

    - [SimpleXMLElement::addAttribute()](#simplexmlelement.addattribute) - Añade un atributo al elemento SimpleXML

    - [Uso básico de SimpleXML](#simplexml.examples-basic)

# SimpleXMLElement::asXML

(PHP 5, PHP 7, PHP 8)

SimpleXMLElement::asXML —
Devuelve un string basado en un elemento SimpleXML

### Descripción

public **SimpleXMLElement::asXML**([?](#language.types.null)[string](#language.types.string) $filename = **[null](#constant.null)**): [string](#language.types.string)|[bool](#language.types.boolean)

Formatea los datos del objeto padre en XML 1.0.

### Parámetros

     filename


       Si se especifica un string, la función escribe los datos al fichero en lugar de devolverlos.





### Valores devueltos

Si el parámetro filename no está especificado, la
función devuelve un string en caso de éxito y false en caso de error.
Si el parámetro está especificado, devuelve true si el fichero ha sido
escrito correctamente y false en otro caso.

### Historial de cambios

      Versión
      Descripción






      8.0.0

       filename ahora es nullable.



### Ejemplos

    **Ejemplo #1 Obtener XML con SimpleXML**

&lt;?php
$string = &lt;&lt;&lt;XML
&lt;a&gt;
&lt;b&gt;
&lt;c&gt;text&lt;/c&gt;
&lt;c&gt;stuff&lt;/c&gt;
&lt;/b&gt;
&lt;d&gt;
&lt;c&gt;code&lt;/c&gt;
&lt;/d&gt;
&lt;/a&gt;
XML;

$xml = new SimpleXMLElement($string);

echo $xml-&gt;asXML();

?&gt;

    El ejemplo anterior mostrará:

&lt;?xml version="1.0"?&gt;
&lt;a&gt;
&lt;b&gt;
&lt;c&gt;text&lt;/c&gt;
&lt;c&gt;stuff&lt;/c&gt;
&lt;/b&gt;
&lt;d&gt;
&lt;c&gt;code&lt;/c&gt;
&lt;/d&gt;
&lt;/a&gt;

**SimpleXMLElement::asXML()** también funciona
con los resultados Xpath:

    **Ejemplo #2
     Uso de SimpleXMLElement::asXML()**
     con los resultados de [SimpleXMLElement::xpath()](#simplexmlelement.xpath)

&lt;?php
$string = &lt;&lt;&lt;XML
&lt;a&gt;
&lt;b&gt;
&lt;c&gt;text&lt;/c&gt;
&lt;c&gt;stuff&lt;/c&gt;
&lt;/b&gt;
&lt;d&gt;
&lt;c&gt;code&lt;/c&gt;
&lt;/d&gt;
&lt;/a&gt;
XML;

$xml = new SimpleXMLElement($string);

/_ Se busca &lt;a&gt;&lt;b&gt;&lt;c&gt; _/
$result = $xml-&gt;xpath('/a/b/c');

foreach ($result as $node) {
echo $node-&gt;asXML();
}
?&gt;

    El ejemplo anterior mostrará:

&lt;c&gt;text&lt;/c&gt;&lt;c&gt;stuff&lt;/c&gt;

### Ver también

    - [SimpleXMLElement::__toString()](#simplexmlelement.tostring) - Devuelve el contenido como string

    - [Uso básico de SimpleXML](#simplexml.examples-basic)

# SimpleXMLElement::attributes

(PHP 5, PHP 7, PHP 8)

SimpleXMLElement::attributes — Identifica los atributos de un elemento

### Descripción

public **SimpleXMLElement::attributes**([?](#language.types.null)[string](#language.types.string) $namespaceOrPrefix = **[null](#constant.null)**, [bool](#language.types.boolean) $isPrefix = **[false](#constant.false)**): [?](#language.types.null)[SimpleXMLElement](#class.simplexmlelement)

Proporciona los atributos y los valores definidos en una etiqueta XML.

**Nota**: SimpleXML añade propiedades
iterativas para casi todos sus métodos. Estas no pueden ser vistas
utilizando [var_dump()](#function.var-dump) o cualquier otra función que examine los
objetos.

### Parámetros

     namespaceOrPrefix


       Un espacio de nombres opcional para los atributos recuperados






     isPrefix


       Por omisión, vale **[false](#constant.false)**





### Valores devueltos

Devuelve un objeto [SimpleXMLElement](#class.simplexmlelement)
que permite recuperar todos los atributos de una etiqueta.

Devuelve **[null](#constant.null)** si se invoca sobre un objeto
[SimpleXMLElement](#class.simplexmlelement) que representa ya un
atributo y no una etiqueta.

### Ejemplos

    **Ejemplo #1 Interpretación de una cadena XML**

&lt;?php
$string = &lt;&lt;&lt;XML
&lt;a&gt;
&lt;foo name="one" game="lonely"&gt;1&lt;/foo&gt;
&lt;/a&gt;
XML;

$xml = simplexml_load_string($string);
foreach($xml-&gt;foo[0]-&gt;attributes() as $a =&gt; $b) {
    echo $a,'="',$b,"\"\n";
}
?&gt;

    El ejemplo anterior mostrará:

name="one"
game="lonely"

### Ver también

    - [Uso básico de SimpleXML](#simplexml.examples-basic)

# SimpleXMLElement::children

(PHP 5, PHP 7, PHP 8)

SimpleXMLElement::children — Busca los hijos de un nodo dado

### Descripción

public **SimpleXMLElement::children**([?](#language.types.null)[string](#language.types.string) $namespaceOrPrefix = **[null](#constant.null)**, [bool](#language.types.boolean) $isPrefix = **[false](#constant.false)**): [?](#language.types.null)[SimpleXMLElement](#class.simplexmlelement)

Este método busca los hijos de un elemento.
El resultado sigue las reglas de la iteración normal.

**Nota**: SimpleXML añade propiedades
iterativas para casi todos sus métodos. Estas no pueden ser vistas
utilizando [var_dump()](#function.var-dump) o cualquier otra función que examine los
objetos.

### Parámetros

     namespaceOrPrefix


       Un espacio de nombres XML.






     isPrefix


       Si isPrefix vale **[true](#constant.true)**,
       namespaceOrPrefix será considerado
       como un prefijo.
       Si vale **[false](#constant.false)**, namespaceOrPrefix será
       considerado como una URL hacia un espacio de nombres.





### Valores devueltos

Devuelve un elemento [SimpleXMLElement](#class.simplexmlelement)
si el nodo tiene un hijo o no, excepto si el nodo representa un atributo,
en cuyo caso se devuelve **[null](#constant.null)**.

### Ejemplos

    **Ejemplo #1 Recorrido de un pseudo-array children()**

&lt;?php
$xml = new SimpleXMLElement(
'&lt;person&gt;
&lt;child role="son"&gt;
&lt;child role="daughter"/&gt;
&lt;/child&gt;
&lt;child role="daughter"&gt;
&lt;child role="son"&gt;
&lt;child role="son"/&gt;
&lt;/child&gt;
&lt;/child&gt;
&lt;/person&gt;');

foreach ($xml-&gt;children() as $second_gen) {
echo ' The person begot a ' . $second_gen['role'];

    foreach ($second_gen-&gt;children() as $third_gen) {
        echo ' who begot a ' . $third_gen['role'] . ';';

        foreach ($third_gen-&gt;children() as $fourth_gen) {
            echo ' and that ' . $third_gen['role'] .
                ' begot a ' . $fourth_gen['role'];
        }
    }

}
?&gt;

    El ejemplo anterior mostrará:

The person begot a son who begot a daughter; The person
begot a daughter who begot a son; and that son begot a son

    **Ejemplo #2 Uso de espacios de nombres**

&lt;?php
$xml = '&lt;example xmlns:foo="my.foo.urn"&gt;
&lt;foo:a&gt;Apple&lt;/foo:a&gt;
&lt;foo:b&gt;Banana&lt;/foo:b&gt;
&lt;c&gt;Cherry&lt;/c&gt;
&lt;/example&gt;';

$sxe = new SimpleXMLElement($xml);

$kids = $sxe-&gt;children('foo');
var_dump(count($kids));

$kids = $sxe-&gt;children('foo', TRUE);
var_dump(count($kids));

$kids = $sxe-&gt;children('my.foo.urn');
var_dump(count($kids));

$kids = $sxe-&gt;children('my.foo.urn', TRUE);
var_dump(count($kids));

$kids = $sxe-&gt;children();
var_dump(count($kids));
?&gt;

int(0)
int(2)
int(2)
int(0)
int(1)

### Ver también

    - [SimpleXMLElement::count()](#simplexmlelement.count) - Cuenta el número de hijos para un elemento

    - [count()](#function.count) - Cuenta todos los elementos de un array o en un objeto Countable

# SimpleXMLElement::\_\_construct

(PHP 5, PHP 7, PHP 8)

SimpleXMLElement::\_\_construct —
Crea un nuevo objeto SimpleXMLElement

### Descripción

public **SimpleXMLElement::\_\_construct**(
    [string](#language.types.string) $data,
    [int](#language.types.integer) $options = 0,
    [bool](#language.types.boolean) $dataIsURL = **[false](#constant.false)**,
    [string](#language.types.string) $namespaceOrPrefix = "",
    [bool](#language.types.boolean) $isPrefix = **[false](#constant.false)**
)

Crea un nuevo objeto [SimpleXMLElement](#class.simplexmlelement).

### Parámetros

     data


       Una cadena XML bien formada o la ruta de acceso o un URL que apunta a un documento XML si dataIsURL vale **[true](#constant.true)**.






     options


       Opcionalmente utilizado para especificar
       [parámetros adicionales de Libxml](#libxml.constants),
       que afectan la lectura de documentos XML. Las opciones que afectan la salida
       de los documentos XML (por ejemplo **[LIBXML_NOEMPTYTAG](#constant.libxml-noemptytag)**)
       son ignoradas silenciosamente.



      **Nota**:



        Puede ser necesario pasar **[LIBXML_PARSEHUGE](#constant.libxml-parsehuge)**
        para poder tratar nodos de texto profundamente anidados o muy voluminosos.







     dataIsURL


       Por omisión, dataIsURL vale **[false](#constant.false)**. Utilice
       **[true](#constant.true)** para especificar que el parámetro data es
       una ruta de acceso o un URL que apunta a un documento XML en lugar de una
       cadena de datos.






     namespaceOrPrefix


       Prefijo de espacio de nombres o URI.






     isPrefix


       **[true](#constant.true)** si namespaceOrPrefix es un prefijo, **[false](#constant.false)** en caso contrario.
       Valor por omisión: **[false](#constant.false)**.





### Errores/Excepciones

Produce un mensaje de error de tipo **[E_WARNING](#constant.e-warning)**
para cada error encontrado en los datos XML y
lanza también una [exception](#class.exception) si los datos XML no pueden ser
analizados.

**Sugerencia**

    Utilice la función [libxml_use_internal_errors()](#function.libxml-use-internal-errors)
    para suprimir todos los errores XML y la función
    [libxml_get_errors()](#function.libxml-get-errors) para recorrerlos.

### Ejemplos

**Nota**:

     Los ejemplos listados incluyen a veces examples/simplexml-data.php,
     esto hace referencia a la cadena XML del primer ejemplo de
     [el uso básico](#simplexml.examples-basic).





    **Ejemplo #1 Crea un objeto SimpleXMLElement**

&lt;?php

include 'examples/simplexml-data.php';

$sxe = new SimpleXMLElement($xmlstr);
echo $sxe-&gt;movie[0]-&gt;title;

?&gt;

    El ejemplo anterior mostrará:

PHP: Behind the Parser

    **Ejemplo #2 Crea un objeto SimpleXMLElement a partir de un URL**

&lt;?php

$sxe = new SimpleXMLElement('http://example.org/document.xml', 0, true);
echo $sxe-&gt;asXML();

?&gt;

### Ver también

    - [Uso básico de SimpleXML](#simplexml.examples-basic)

    - [simplexml_load_string()](#function.simplexml-load-string) - Convierte una cadena XML en objeto

    - [simplexml_load_file()](#function.simplexml-load-file) - Convierte un fichero XML en objeto

    - [Manejo de errores XML](#simplexml.examples-errors)

    - [libxml_use_internal_errors()](#function.libxml-use-internal-errors) - Se desactiva el reporte de errores de libxml y se almacenan para su lectura posterior

    - [libxml_set_streams_context()](#function.libxml-set-streams-context) - Configura el contexto de flujos para la próxima operación libxml

# SimpleXMLElement::count

(PHP 8)

SimpleXMLElement::count — Cuenta el número de hijos para un elemento

### Descripción

public **SimpleXMLElement::count**(): [int](#language.types.integer)

Este método cuenta el número de hijos de un elemento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el número de hijos de un elemento.

### Ejemplos

    **Ejemplo #1 Conteo del número de hijos**

&lt;?php
$xml = &lt;&lt;&lt;EOF
&lt;people&gt;
&lt;person name="Person 1"&gt;
&lt;child/&gt;
&lt;child/&gt;
&lt;child/&gt;
&lt;/person&gt;
&lt;person name="Person 2"&gt;
&lt;child/&gt;
&lt;child/&gt;
&lt;child/&gt;
&lt;child/&gt;
&lt;child/&gt;
&lt;/person&gt;
&lt;/people&gt;
EOF;

$elem = new SimpleXMLElement($xml);

foreach ($elem as $person) {
printf("%s has got %d children.\n", $person['name'], $person-&gt;count());
}
?&gt;

    El ejemplo anterior mostrará:

Person 1 has got 3 children.
Person 2 has got 5 children.

### Ver también

    - [SimpleXMLElement::children()](#simplexmlelement.children) - Busca los hijos de un nodo dado

# SimpleXMLElement::current

(PHP 8)

SimpleXMLElement::current — Retorna la entrada actual

### Descripción

public **SimpleXMLElement::current**(): [SimpleXMLElement](#class.simplexmlelement)

**Advertencia**

    Antes de PHP 8.0, **SimpleXMLElement::current()** solo estaba declarada
    en la subclase [SimpleXMLIterator](#class.simplexmliterator).

Este método retorna el elemento actual como un
objeto [SimpleXMLElement](#class.simplexmlelement).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Retorna el elemento actual como un objeto
[SimpleXMLElement](#class.simplexmlelement).

### Errores/Excepciones

Se lanza una [Error](#class.error) en caso de fallo.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Se lanza una [Error](#class.error) si
       **SimpleXMLElement::current()** es llamada sobre un
       iterador inválido. Anteriormente, se retornaba **[null](#constant.null)**.



### Ejemplos

    **Ejemplo #1 Retorna el elemento actual**

&lt;?php
$xmlElement = new SimpleXMLElement('&lt;books&gt;&lt;book&gt;PHP basics&lt;/book&gt;&lt;book&gt;XML basics&lt;/book&gt;&lt;/books&gt;');

$xmlElement-&gt;rewind(); // Retorno al primer elemento, de lo contrario current() no funciona
var_dump($xmlElement-&gt;current());
?&gt;

    El ejemplo anterior mostrará:

object(SimpleXMLElement)#2 (1) {
[0]=&gt;
string(10) "PHP basics"
}

### Ver también

    - [SimpleXMLElement::key()](#simplexmlelement.key) - Devuelve la clave actual

    - [SimpleXMLElement::next()](#simplexmlelement.next) - Se desplaza al elemento siguiente

    - [SimpleXMLElement::rewind()](#simplexmlelement.rewind) - Reemplaza el puntero al inicio

    - [SimpleXMLElement::valid()](#simplexmlelement.valid) - Verifica si el elemento actual es válido

    - [SimpleXMLElement](#class.simplexmlelement)

# SimpleXMLElement::getDocNamespaces

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SimpleXMLElement::getDocNamespaces —
Devuelve los espacios de nombres declarados en un documento

### Descripción

public **SimpleXMLElement::getDocNamespaces**([bool](#language.types.boolean) $recursive = **[false](#constant.false)**, [bool](#language.types.boolean) $fromRoot = **[true](#constant.true)**): [array](#language.types.array)|[false](#language.types.singleton)

Devuelve los espacios de nombres declarados en un documento.

### Parámetros

     recursive


       Si se especifica, devuelve todos los espacios de nombres declarados en los nodos padres e hijos.
       De lo contrario, devuelve únicamente los espacios de nombres declarados en el nodo raíz.






     fromRoot


       Permite verificar recursivamente los espacios de nombres
       bajo un nodo hijo en lugar de realizar esta verificación desde
       la raíz del documento XML.





### Valores devueltos

El método getDocNamespaces devuelve un array de espacios de nombres
con sus URL asociadas.

### Ejemplos

    **Ejemplo #1 Obtiene los espacios de nombres del documento**

&lt;?php

$xml = &lt;&lt;&lt;XML
&lt;?xml version="1.0" standalone="yes"?&gt;
&lt;people xmlns:p="http://example.org/ns"&gt;
&lt;p:person id="1"&gt;John Doe&lt;/p:person&gt;
&lt;p:person id="2"&gt;Susie Q. Public&lt;/p:person&gt;
&lt;/people&gt;
XML;

$sxe = new SimpleXMLElement($xml);

$namespaces = $sxe-&gt;getDocNamespaces();
var_dump($namespaces);

?&gt;

    El ejemplo anterior mostrará:

array(1) {
["p"]=&gt;
string(21) "http://example.org/ns"
}

    **Ejemplo #2 Trabajo con múltiples espacios de nombres**

&lt;?php

$xml = &lt;&lt;&lt;XML
&lt;?xml version="1.0" standalone="yes"?&gt;
&lt;people xmlns:p="http://example.org/ns" xmlns:t="http://example.org/test"&gt;
&lt;p:person t:id="1"&gt;John Doe&lt;/p:person&gt;
&lt;p:person t:id="2" a:addr="123 Street" xmlns:a="http://example.org/addr"&gt;
Susie Q. Public
&lt;/p:person&gt;
&lt;/people&gt;
XML;

$sxe = new SimpleXMLElement($xml);

$namespaces = $sxe-&gt;getDocNamespaces(TRUE);
var_dump($namespaces);

?&gt;

    El ejemplo anterior mostrará:

array(3) {
["p"]=&gt;
string(21) "http://example.org/ns"
["t"]=&gt;
string(23) "http://example.org/test"
["a"]=&gt;
string(23) "http://example.org/addr"
}

### Ver también

    - [SimpleXMLElement::getNamespaces()](#simplexmlelement.getnamespaces) - Devuelve los espacios de nombres utilizados en un documento

    - [SimpleXMLElement::registerXPathNamespace()](#simplexmlelement.registerxpathnamespace) - Crea un contexto prefijo/ns para la próxima consulta XPath

# SimpleXMLElement::getName

(PHP 5 &gt;= 5.1.3, PHP 7, PHP 8)

SimpleXMLElement::getName — Obtiene el nombre de un elemento XML

### Descripción

public **SimpleXMLElement::getName**(): [string](#language.types.string)

Obtiene el nombre de un elemento XML.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El método getName devuelve un nombre en forma de string de una
etiqueta XML referenciada por el objeto SimpleXMLElement.

### Ejemplos

**Nota**:

     Los ejemplos listados incluyen a veces examples/simplexml-data.php,
     esto hace referencia a la cadena XML del primer ejemplo de
     [el uso básico](#simplexml.examples-basic).





    **Ejemplo #1 Obtiene los nombres de los elementos XML**

&lt;?php
include 'examples/simplexml-data.php';
$sxe = new SimpleXMLElement($xmlstr);

echo $sxe-&gt;getName() . "\n";

foreach ($sxe-&gt;children() as $child)
{
echo $child-&gt;getName() . "\n";
}

?&gt;

    El ejemplo anterior mostrará:

movies
movie

# SimpleXMLElement::getNamespaces

(PHP 5 &gt;= 5.1.2, PHP 7, PHP 8)

SimpleXMLElement::getNamespaces —
Devuelve los espacios de nombres utilizados en un documento

### Descripción

public **SimpleXMLElement::getNamespaces**([bool](#language.types.boolean) $recursive = **[false](#constant.false)**): [array](#language.types.array)

Devuelve los espacios de nombres utilizados en un documento.

### Parámetros

     recursive


       Si se especifica, devuelve todos los espacios de nombres utilizados en los nodos padres e hijos.
       De lo contrario, devuelve únicamente los espacios de nombres utilizados en el nodo raíz.





### Valores devueltos

El método getNamespaces devuelve un array de espacios de nombres
con sus URL asociadas.

### Ejemplos

    **Ejemplo #1 Obtiene los espacios de nombres utilizados en un documento**

&lt;?php

$xml = &lt;&lt;&lt;XML
&lt;?xml version="1.0" standalone="yes"?&gt;
&lt;people xmlns:p="http://example.org/ns" xmlns:t="http://example.org/test"&gt;
&lt;p:person id="1"&gt;John Doe&lt;/p:person&gt;
&lt;p:person id="2"&gt;Susie Q. Public&lt;/p:person&gt;
&lt;/people&gt;
XML;

$sxe = new SimpleXMLElement($xml);

$namespaces = $sxe-&gt;getNamespaces(true);
var_dump($namespaces);

?&gt;

    El ejemplo anterior mostrará:

array(1) {
["p"]=&gt;
string(21) "http://example.org/ns"
}

### Ver también

    - [SimpleXMLElement::getDocNamespaces()](#simplexmlelement.getdocnamespaces) - Devuelve los espacios de nombres declarados en un documento

    - [SimpleXMLElement::registerXPathNamespace()](#simplexmlelement.registerxpathnamespace) - Crea un contexto prefijo/ns para la próxima consulta XPath

# SimpleXMLElement::getChildren

(PHP 8)

SimpleXMLElement::getChildren — Devuelve los subelementos del elemento actual

### Descripción

public **SimpleXMLElement::getChildren**(): [?](#language.types.null)[SimpleXMLElement](#class.simplexmlelement)

**Advertencia**

    Antes de PHP 8.0, **SimpleXMLElement::getChildren()** solo estaba declarada
    en la subclase [SimpleXMLIterator](#class.simplexmliterator).

Este método devuelve un objeto [SimpleXMLElement](#class.simplexmlelement)
que contiene los subelementos del elemento actual
[SimpleXMLElement](#class.simplexmlelement).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un objeto [SimpleXMLElement](#class.simplexmlelement) que contiene
los subelementos del objeto actual.

### Ejemplos

    **Ejemplo #1 Lectura de los subelementos del objeto actual**

&lt;?php
$xml = &lt;&lt;&lt;XML
&lt;books&gt;
&lt;book&gt;
&lt;title&gt;PHP Basics&lt;/title&gt;
&lt;author&gt;Jim Smith&lt;/author&gt;
&lt;/book&gt;
&lt;book&gt;XML basics&lt;/book&gt;
&lt;/books&gt;
XML;

$xmlElement = new SimpleXMLElement($xml);
for ($xmlElement-&gt;rewind(); $xmlElement-&gt;valid(); $xmlElement-&gt;next()) {
    foreach($xmlElement-&gt;getChildren() as $name =&gt; $data) {
    echo "The $name is '$data' from the class " . get_class($data) . "\n";
}
}
?&gt;

    El ejemplo anterior mostrará:

The title is 'PHP Basics' from the class SimpleXMLElement
The author is 'Jim Smith' from the class SimpleXMLElement

# SimpleXMLElement::hasChildren

(PHP 8)

SimpleXMLElement::hasChildren — Verifica si el elemento actual tiene subelementos

### Descripción

public **SimpleXMLElement::hasChildren**(): [bool](#language.types.boolean)

**Advertencia**

    Antes de PHP 8.0, **SimpleXMLElement::hasChildren()** solo estaba declarada
    en la subclase [SimpleXMLIterator](#class.simplexmliterator).

Este método verifica si el objeto actual
[SimpleXMLElement](#class.simplexmlelement) tiene subelementos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

**[true](#constant.true)** si la entrada actual tiene subelementos, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Verifica si un elemento tiene subelementos**

&lt;?php
$xml = &lt;&lt;&lt;XML
&lt;books&gt;
&lt;book&gt;
&lt;title&gt;PHP Basics&lt;/title&gt;
&lt;author&gt;Jim Smith&lt;/author&gt;
&lt;/book&gt;
&lt;book&gt;XML basics&lt;/book&gt;
&lt;/books&gt;
XML;

$xmlElement = new SimpleXMLElement($xml);
for ($xmlElement-&gt;rewind(); $xmlElement-&gt;valid(); $xmlElement-&gt;next()) {
    if ($xmlElement-&gt;hasChildren()) {
var_dump($xmlElement-&gt;current());
}
}
?&gt;

    El ejemplo anterior mostrará:

object(SimpleXMLElement)#2 (2) {
["title"]=&gt;
string(10) "PHP Basics"
["author"]=&gt;
string(9) "Jim Smith"
}

# SimpleXMLElement::key

(PHP 8)

SimpleXMLElement::key — Devuelve la clave actual

### Descripción

public **SimpleXMLElement::key**(): [string](#language.types.string)

**Advertencia**

    Antes de PHP 8.0, **SimpleXMLElement::key()** solo estaba declarada
    en la subclase [SimpleXMLIterator](#class.simplexmliterator).

Este método lee el nombre de la etiqueta XML actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el nombre de la etiqueta XML en el objeto actual del
iterador [SimpleXMLElement](#class.simplexmlelement).

### Errores/Excepciones

Se lanza una [Error](#class.error) en caso de fallo.

### Historial de cambios

      Versión
      Descripción






      8.1.0

       Ahora se lanza una [Error](#class.error) si
       **SimpleXMLElement::key()** se llama sobre un
       iterador no válido. Anteriormente, se devolvía **[false](#constant.false)**.



### Ejemplos

    **Ejemplo #1 El nombre de la etiqueta XML actual**

&lt;?php
$xmlElement = new SimpleXMLElement('&lt;books&gt;&lt;book&gt;PHP basics&lt;/book&gt;&lt;book&gt;XML basics&lt;/book&gt;&lt;/books&gt;');

try {
echo var_dump($xmlElement-&gt;key());
} catch (Error $e) {
echo $e-&gt;getMessage(), "\n";
}

$xmlElement-&gt;rewind(); // retorno al primer elemento
echo var_dump($xmlElement-&gt;key());

?&gt;

     El ejemplo anterior mostrará:

Iterator not initialized or already consumed
string(4) "book"

# SimpleXMLElement::next

(PHP 8)

SimpleXMLElement::next — Se desplaza al elemento siguiente

### Descripción

public **SimpleXMLElement::next**(): [void](language.types.void.html)

**Advertencia**

    Antes de PHP 8.0, **SimpleXMLElement::next()** solo estaba declarada
    en la subclase [SimpleXMLIterator](#class.simplexmliterator).

Este método desplaza el iterador
[SimpleXMLElement](#class.simplexmlelement) al elemento siguiente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Pasa al elemento siguiente**

&lt;?php
$xmlElement = new SimpleXMLElement('&lt;books&gt;&lt;book&gt;PHP Basics&lt;/book&gt;&lt;book&gt;XML basics&lt;/book&gt;&lt;/books&gt;');
$xmlElement-&gt;rewind(); // rewind al primer elemento
$xmlElement-&gt;next();

var_dump($xmlElement-&gt;current());
?&gt;

     El ejemplo anterior mostrará:

object(SimpleXMLElement)#2 (1) {
[0]=&gt;
string(10) "XML basics"
}

# SimpleXMLElement::registerXPathNamespace

(PHP 5 &gt;= 5.1.0, PHP 7, PHP 8)

SimpleXMLElement::registerXPathNamespace —
Crea un contexto prefijo/ns para la próxima consulta XPath

### Descripción

public **SimpleXMLElement::registerXPathNamespace**([string](#language.types.string) $prefix, [string](#language.types.string) $namespace): [bool](#language.types.boolean)

Crea un contexto prefijo/ns para la próxima consulta XPath. En
particular, esto es útil si el proveedor del documento XML dado modifica
los prefijos de espacio de nombres. registerXPathNamespace
creará un prefijo para el espacio de nombres asociado, permitiendo el acceso a
los nodos en este espacio de nombres sin necesidad de cambiar el código para
permitir los nuevos prefijos dictados por el proveedor.

### Parámetros

     prefix


       El prefijo de espacio de nombres a utilizar en la consulta XPath para
       el espacio de nombres dado en namespace.






     namespace


       El espacio de nombres a utilizar para la consulta XPath. Esto debe coincidir
       con un espacio de nombres que es utilizado por el documento XML, de lo contrario la consulta
       XPath que utiliza prefix no retornará ningún
       resultado.





### Valores devueltos

Esta función retorna **[true](#constant.true)** en caso de éxito o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Fija un prefijo de espacio de nombres para utilizar en una consulta XPath**

&lt;?php

$xml = &lt;&lt;&lt;EOD
&lt;book xmlns:chap="http://example.org/chapter-title"&gt;
&lt;title&gt;My Book&lt;/title&gt;
&lt;chapter id="1"&gt;
&lt;chap:title&gt;Chapter 1&lt;/chap:title&gt;
&lt;para&gt;Donec velit. Nullam eget tellus vitae tortor gravida scelerisque.
In orci lorem, cursus imperdiet, ultricies non, hendrerit et, orci.
Nulla facilisi. Nullam velit nisl, laoreet id, condimentum ut,
ultricies id, mauris.&lt;/para&gt;
&lt;/chapter&gt;
&lt;chapter id="2"&gt;
&lt;chap:title&gt;Chapter 2&lt;/chap:title&gt;
&lt;para&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin
gravida. Phasellus tincidunt massa vel urna. Proin adipiscing quam
vitae odio. Sed dictum. Ut tincidunt lorem ac lorem. Duis eros
tellus, pharetra id, faucibus eu, dapibus dictum, odio.&lt;/para&gt;
&lt;/chapter&gt;
&lt;/book&gt;
EOD;

$sxe = new SimpleXMLElement($xml);

$sxe-&gt;registerXPathNamespace('c', 'http://example.org/chapter-title');
$result = $sxe-&gt;xpath('//c:title');

foreach ($result as $title) {
echo $title . "\n";
}

?&gt;

    El ejemplo anterior mostrará:

Chapter 1
Chapter 2

     Observe cómo el documento XML mostrado en este ejemplo fija un espacio de
     nombres con el prefijo chap. Imagine que este documento (o
     otro similar) pudiera haber utilizado un prefijo c
     en el pasado para el mismo espacio de nombres. Dado que ha cambiado, la consulta
     XPath no retornaría los resultados apropiados y la consulta debería
     ser modificada. El uso de registerXPathNamespace
     evita las modificaciones futuras de la consulta incluso si el proveedor
     cambia el prefijo de espacio de nombres.

### Ver también

    - [SimpleXMLElement::xpath()](#simplexmlelement.xpath) - Ejecuta una consulta XPath sobre datos XML

    - [SimpleXMLElement::getDocNamespaces()](#simplexmlelement.getdocnamespaces) - Devuelve los espacios de nombres declarados en un documento

    - [SimpleXMLElement::getNamespaces()](#simplexmlelement.getnamespaces) - Devuelve los espacios de nombres utilizados en un documento

# SimpleXMLElement::rewind

(PHP 8)

SimpleXMLElement::rewind — Reemplaza el puntero al inicio

### Descripción

public **SimpleXMLElement::rewind**(): [void](language.types.void.html)

**Advertencia**

    Antes de PHP 8.0, **SimpleXMLElement::rewind()** solo estaba declarada
    en la subclase [SimpleXMLIterator](#class.simplexmliterator).

Este método reinicia el iterador [SimpleXMLElement](#class.simplexmlelement)
al primer elemento.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

### Ejemplos

    **Ejemplo #1 Retorno al primer elemento**

&lt;?php
$xmlElement = new SimpleXMLElement('&lt;books&gt;&lt;book&gt;PHP Basics&lt;/book&gt;&lt;book&gt;XML Basics&lt;/book&gt;&lt;/books&gt;');
$xmlElement-&gt;rewind();

var_dump($xmlElement-&gt;current());
?&gt;

     El ejemplo anterior mostrará:

object(SimpleXMLElement)#2 (1) {
[0]=&gt;
string(10) "PHP Basics"
}

# SimpleXMLElement::saveXML

(PHP 5 &gt;= 5.2.0, PHP 7, PHP 8)

SimpleXMLElement::saveXML — Alias de [SimpleXMLElement::asXML()](#simplexmlelement.asxml)

### Descripción

Este método es un alias de: [SimpleXMLElement::asXML()](#simplexmlelement.asxml)

# SimpleXMLElement::\_\_toString

(PHP 5 &gt;= 5.3.0, PHP 7, PHP 8)

SimpleXMLElement::\_\_toString — Devuelve el contenido como string

### Descripción

public **SimpleXMLElement::\_\_toString**(): [string](#language.types.string)

Devuelve el contenido de texto almacenado directamente en el elemento.
No devuelve el contenido de texto almacenado en los elementos hijos.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve el contenido como string, o un string vacío en caso de error.

### Ejemplos

    **Ejemplo #1 Obtener el contenido como string**

&lt;?php
$xml = new SimpleXMLElement('&lt;a&gt;1 &lt;b&gt;2 &lt;/b&gt;3&lt;/a&gt;');
echo $xml;
?&gt;

    El ejemplo anterior mostrará:

1 3

### Ver también

    - [SimpleXMLElement::asXML()](#simplexmlelement.asxml) - Devuelve un string basado en un elemento SimpleXML

# SimpleXMLElement::valid

(PHP 8)

SimpleXMLElement::valid — Verifica si el elemento actual es válido

### Descripción

public **SimpleXMLElement::valid**(): [bool](#language.types.boolean)

**Advertencia**

    Antes de PHP 8.0, **SimpleXMLElement::valid()** solo estaba declarada
    en la subclase [SimpleXMLIterator](#class.simplexmliterator).

Este método verifica si el elemento actual es válido, después
de una llamada a [SimpleXMLElement::rewind()](#simplexmlelement.rewind) o
[SimpleXMLElement::next()](#simplexmlelement.next).

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve **[true](#constant.true)** si el elemento actual es válido, **[false](#constant.false)** en caso contrario.

### Ejemplos

    **Ejemplo #1 Verifica si un elemento es válido**

&lt;?php
$xmlElement = new SimpleXMLElement('&lt;books&gt;&lt;book&gt;SQL Basics&lt;/book&gt;&lt;/books&gt;');

$xmlElement-&gt;rewind(); // Retorno al primer elemento
echo var_dump($xmlElement-&gt;valid()); // bool(true)

$xmlElement-&gt;next(); // Avance al siguiente elemento
echo var_dump($xmlElement-&gt;valid()); // bool(false) ya que solo hay un elemento
?&gt;

# SimpleXMLElement::xpath

(PHP 5, PHP 7, PHP 8)

SimpleXMLElement::xpath — Ejecuta una consulta XPath sobre datos XML

### Descripción

public **SimpleXMLElement::xpath**([string](#language.types.string) $expression): [array](#language.types.array)|[null](#language.types.null)|[false](#language.types.singleton)

El método xpath busca en el nodo SimpleXML
hijos que correspondan al expression
Xpath.

### Parámetros

     expression


       Una ruta XPath





### Valores devueltos

Devuelve un array de objetos SimpleXMLElement en caso de éxito o **[null](#constant.null)**
o **[false](#constant.false)** si ocurre un error.

### Ejemplos

    **Ejemplo #1 Xpath**

&lt;?php
$string = &lt;&lt;&lt;XML
&lt;a&gt;
&lt;b&gt;
&lt;c&gt;text&lt;/c&gt;
&lt;c&gt;stuff&lt;/c&gt;
&lt;/b&gt;
&lt;d&gt;
&lt;c&gt;code&lt;/c&gt;
&lt;/d&gt;
&lt;/a&gt;
XML;

$xml = new SimpleXMLElement($string);

/_ Se busca &lt;a&gt;&lt;b&gt;&lt;c&gt; _/
$result = $xml-&gt;xpath('/a/b/c');

foreach ($result as $node) {
    echo '/a/b/c: ',$node,"\n";
}

/_ Las rutas relativas también funcionan... _/
$result = $xml-&gt;xpath('b/c');

foreach ($result as $node) {
    echo 'b/c: ',$node,"\n";
}
?&gt;

    El ejemplo anterior mostrará:

/a/b/c: text
/a/b/c: stuff
b/c: text
b/c: stuff

     Observe que los dos resultados son iguales.

### Ver también

    - [SimpleXMLElement::registerXPathNamespace()](#simplexmlelement.registerxpathnamespace) - Crea un contexto prefijo/ns para la próxima consulta XPath

    - [SimpleXMLElement::getDocNamespaces()](#simplexmlelement.getdocnamespaces) - Devuelve los espacios de nombres declarados en un documento

    - [SimpleXMLElement::getNamespaces()](#simplexmlelement.getnamespaces) - Devuelve los espacios de nombres utilizados en un documento

    - [Uso básico de SimpleXML](#simplexml.examples-basic)

## Tabla de contenidos

- [SimpleXMLElement::addAttribute](#simplexmlelement.addattribute) — Añade un atributo al elemento SimpleXML
- [SimpleXMLElement::addChild](#simplexmlelement.addchild) — Añade un elemento hijo al nodo XML
- [SimpleXMLElement::asXML](#simplexmlelement.asxml) — Devuelve un string basado en un elemento SimpleXML
- [SimpleXMLElement::attributes](#simplexmlelement.attributes) — Identifica los atributos de un elemento
- [SimpleXMLElement::children](#simplexmlelement.children) — Busca los hijos de un nodo dado
- [SimpleXMLElement::\_\_construct](#simplexmlelement.construct) — Crea un nuevo objeto SimpleXMLElement
- [SimpleXMLElement::count](#simplexmlelement.count) — Cuenta el número de hijos para un elemento
- [SimpleXMLElement::current](#simplexmlelement.current) — Retorna la entrada actual
- [SimpleXMLElement::getDocNamespaces](#simplexmlelement.getdocnamespaces) — Devuelve los espacios de nombres declarados en un documento
- [SimpleXMLElement::getName](#simplexmlelement.getname) — Obtiene el nombre de un elemento XML
- [SimpleXMLElement::getNamespaces](#simplexmlelement.getnamespaces) — Devuelve los espacios de nombres utilizados en un documento
- [SimpleXMLElement::getChildren](#simplexmlelement.getchildren) — Devuelve los subelementos del elemento actual
- [SimpleXMLElement::hasChildren](#simplexmlelement.haschildren) — Verifica si el elemento actual tiene subelementos
- [SimpleXMLElement::key](#simplexmlelement.key) — Devuelve la clave actual
- [SimpleXMLElement::next](#simplexmlelement.next) — Se desplaza al elemento siguiente
- [SimpleXMLElement::registerXPathNamespace](#simplexmlelement.registerxpathnamespace) — Crea un contexto prefijo/ns para la próxima consulta XPath
- [SimpleXMLElement::rewind](#simplexmlelement.rewind) — Reemplaza el puntero al inicio
- [SimpleXMLElement::saveXML](#simplexmlelement.savexml) — Alias de SimpleXMLElement::asXML
- [SimpleXMLElement::\_\_toString](#simplexmlelement.tostring) — Devuelve el contenido como string
- [SimpleXMLElement::valid](#simplexmlelement.valid) — Verifica si el elemento actual es válido
- [SimpleXMLElement::xpath](#simplexmlelement.xpath) — Ejecuta una consulta XPath sobre datos XML

# La clase SimpleXMLIterator

(No version information available, might only be in Git)

## Introducción

    El clase SimpleXMLIterator proporciona una iteración recursiva sobre todos los nodos de un objeto [SimpleXMLElement](#class.simplexmlelement).

## Sinopsis de la Clase

     class **SimpleXMLIterator**



     extends
      [SimpleXMLElement](#class.simplexmlelement)
     {

    /* Métodos heredados */

public [SimpleXMLElement::\_\_construct](#simplexmlelement.construct)(
    [string](#language.types.string) $data,
    [int](#language.types.integer) $options = 0,
    [bool](#language.types.boolean) $dataIsURL = **[false](#constant.false)**,
    [string](#language.types.string) $namespaceOrPrefix = "",
    [bool](#language.types.boolean) $isPrefix = **[false](#constant.false)**
)

    public [SimpleXMLElement::addAttribute](#simplexmlelement.addattribute)([string](#language.types.string) $qualifiedName, [string](#language.types.string) $value, [?](#language.types.null)[string](#language.types.string) $namespace = **[null](#constant.null)**): [void](language.types.void.html)

public [SimpleXMLElement::addChild](#simplexmlelement.addchild)([string](#language.types.string) $qualifiedName, [?](#language.types.null)[string](#language.types.string) $value = **[null](#constant.null)**, [?](#language.types.null)[string](#language.types.string) $namespace = **[null](#constant.null)**): [?](#language.types.null)[SimpleXMLElement](#class.simplexmlelement)
public [SimpleXMLElement::asXML](#simplexmlelement.asxml)([?](#language.types.null)[string](#language.types.string) $filename = **[null](#constant.null)**): [string](#language.types.string)|[bool](#language.types.boolean)
public [SimpleXMLElement::attributes](#simplexmlelement.attributes)([?](#language.types.null)[string](#language.types.string) $namespaceOrPrefix = **[null](#constant.null)**, [bool](#language.types.boolean) $isPrefix = **[false](#constant.false)**): [?](#language.types.null)[SimpleXMLElement](#class.simplexmlelement)
public [SimpleXMLElement::children](#simplexmlelement.children)([?](#language.types.null)[string](#language.types.string) $namespaceOrPrefix = **[null](#constant.null)**, [bool](#language.types.boolean) $isPrefix = **[false](#constant.false)**): [?](#language.types.null)[SimpleXMLElement](#class.simplexmlelement)
public [SimpleXMLElement::count](#simplexmlelement.count)(): [int](#language.types.integer)
public [SimpleXMLElement::current](#simplexmlelement.current)(): [SimpleXMLElement](#class.simplexmlelement)
public [SimpleXMLElement::getDocNamespaces](#simplexmlelement.getdocnamespaces)([bool](#language.types.boolean) $recursive = **[false](#constant.false)**, [bool](#language.types.boolean) $fromRoot = **[true](#constant.true)**): [array](#language.types.array)|[false](#language.types.singleton)
public [SimpleXMLElement::getName](#simplexmlelement.getname)(): [string](#language.types.string)
public [SimpleXMLElement::getNamespaces](#simplexmlelement.getnamespaces)([bool](#language.types.boolean) $recursive = **[false](#constant.false)**): [array](#language.types.array)
public [SimpleXMLElement::getChildren](#simplexmlelement.getchildren)(): [?](#language.types.null)[SimpleXMLElement](#class.simplexmlelement)
public [SimpleXMLElement::hasChildren](#simplexmlelement.haschildren)(): [bool](#language.types.boolean)
public [SimpleXMLElement::key](#simplexmlelement.key)(): [string](#language.types.string)
public [SimpleXMLElement::next](#simplexmlelement.next)(): [void](language.types.void.html)
public [SimpleXMLElement::registerXPathNamespace](#simplexmlelement.registerxpathnamespace)([string](#language.types.string) $prefix, [string](#language.types.string) $namespace): [bool](#language.types.boolean)
public [SimpleXMLElement::rewind](#simplexmlelement.rewind)(): [void](language.types.void.html)
public [SimpleXMLElement::\_\_toString](#simplexmlelement.tostring)(): [string](#language.types.string)
public [SimpleXMLElement::valid](#simplexmlelement.valid)(): [bool](#language.types.boolean)
public [SimpleXMLElement::xpath](#simplexmlelement.xpath)([string](#language.types.string) $expression): [array](#language.types.array)|[null](#language.types.null)|[false](#language.types.singleton)

}

## Historial de cambios

       Versión
       Descripción






       8.0.0

        Métodos de iterador (**SimpleXMLIterator::hasChildren()**,
        **SimpleXMLIterator::getChildren()**,
        **SimpleXMLIterator::current()**, **SimpleXMLIterator::key()**,
        **SimpleXMLIterator::next()**,**SimpleXMLIterator::rewind()**,
        **SimpleXMLIterator::valid()**) se han transferido a [SimpleXMLElement](#class.simplexmlelement).




       8.0.0

        **SimpleXMLIterator** implementa
        [Stringable](#class.stringable) ahora.





# Funciones de SimpleXML

# simplexml_import_dom

(PHP 5, PHP 7, PHP 8)

simplexml_import_dom — Construye un objeto [SimpleXMLElement](#class.simplexmlelement) a partir de un
objeto XML o HTML

### Descripción

**simplexml_import_dom**([object](#language.types.object) $node, [?](#language.types.null)[string](#language.types.string) $class_name = SimpleXMLElement::class): [?](#language.types.null)[SimpleXMLElement](#class.simplexmlelement)

**simplexml_import_dom()** toma un nodo
de un documento [DOM](#book.dom)
y lo transforma en nodo **SimpleXML**.
Este nuevo objeto puede entonces ser utilizado como un objeto nativo
**SimpleXML**.

### Parámetros

     node


       Un elemento [DOM](#book.dom)






     class_name


       Este parámetro opcional permite que
       [simplexml_load_string()](#function.simplexml-load-string) retorne un objeto
       de la clase especificada. Esta clase debe extender la clase
       [SimpleXMLElement](#class.simplexmlelement).





### Valores devueltos

Retorna un objeto [SimpleXMLElement](#class.simplexmlelement) o **[null](#constant.null)** en caso de fallo.

### Errores/Excepciones

Lanza una [TypeError](#class.typeerror) cuando
un node no-XML o no-HTML es pasado.

### Historial de cambios

      Versión
      Descripción






      8.4.0

       Se añade soporte para [Dom\Document](#class.dom-document).




      8.4.0

       Esta función ahora lanza una [TypeError](#class.typeerror) en lugar
       de una [ValueError](#class.valueerror) cuando un
       node no-XML o no-HTML es pasado.



### Ejemplos

    **Ejemplo #1 Importar un [DOMDocument](#class.domdocument)**

&lt;?php
$dom = new DOMDocument;
$dom-&gt;loadXML('&lt;books&gt;&lt;book&gt;&lt;title&gt;blah&lt;/title&gt;&lt;/book&gt;&lt;/books&gt;');
if (!$dom) {
echo 'Error durante el análisis del documento';
exit;
}

$s = simplexml_import_dom($dom);

echo $s-&gt;book[0]-&gt;title;
?&gt;

    El ejemplo anterior mostrará:

blah

    **Ejemplo #2 Importar un [Dom\Document](#class.dom-document)**

&lt;?php
$dom = Dom\XMLDocument::createFromString('&lt;books&gt;&lt;book&gt;&lt;title&gt;blah&lt;/title&gt;&lt;/book&gt;&lt;/books&gt;');

$s = simplexml_import_dom($dom);

echo $s-&gt;book[0]-&gt;title;
?&gt;

    El ejemplo anterior mostrará:

blah

### Ver también

    - [dom_import_simplexml()](#function.dom-import-simplexml) - Transforma un objeto SimpleXMLElement en un objeto DOMAttr o DOMElement

    - [Uso básico de SimpleXML](#simplexml.examples-basic)

# simplexml_load_file

(PHP 5, PHP 7, PHP 8)

simplexml_load_file — Convierte un fichero XML en objeto

### Descripción

**simplexml_load_file**(
    [string](#language.types.string) $filename,
    [?](#language.types.null)[string](#language.types.string) $class_name = SimpleXMLElement::class,
    [int](#language.types.integer) $options = 0,
    [string](#language.types.string) $namespace_or_prefix = "",
    [bool](#language.types.boolean) $is_prefix = **[false](#constant.false)**
): [SimpleXMLElement](#class.simplexmlelement)|[false](#language.types.singleton)

Convierte el documento XML filename
en un objeto de tipo [SimpleXMLElement](#class.simplexmlelement).

### Parámetros

     filename


       Ruta hacia el fichero XML






     class_name


       Puede utilizarse este parámetro opcional, y así,
       la función **simplexml_load_file()** devolverá un objeto de
       la clase especificada. Esta clase debe extender la clase
       [SimpleXMLElement](#class.simplexmlelement).






     options



[Operación de 'OR' lógica](#language.operators.bitwise)
de las [constantes de opción libxml](#libxml.constants).

     namespace_or_prefix


       Prefijo o la URI del espacio de nombres.






     is_prefix


       **[true](#constant.true)** si namespace_or_prefix es un prefijo,
       **[false](#constant.false)** si es la URI; por omisión, **[false](#constant.false)**.





### Valores devueltos

Devuelve un [object](#language.types.object) de la clase [SimpleXMLElement](#class.simplexmlelement)
cuyas propiedades contienen los datos del documento XML, o **[false](#constant.false)** si ocurre un error.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Errores/Excepciones

Genera un mensaje de error de nivel **[E_WARNING](#constant.e-warning)**
para cada error encontrado en los datos XML.

**Sugerencia**

    Utilice la función [libxml_use_internal_errors()](#function.libxml-use-internal-errors)
    para suprimir todos los errores XML, y la función
    [libxml_get_errors()](#function.libxml-get-errors) para recorrerlos.

### Ejemplos

    **Ejemplo #1 Interpretación de un documento XML**

&lt;?php
// El fichero examples/book.xml contiene un documento XML con un elemento raíz
// y al menos un elemento /[raíz]/title.

if (file_exists('examples/book.xml')) {
$xml = simplexml_load_file('examples/book.xml');

    print_r($xml);

} else {
exit('Fallo al abrir el fichero examples/test.xml.');
}
?&gt;

     Este script mostrará, en caso de éxito:

SimpleXMLElement Object
(
[book] =&gt; Array
...
)

     A partir de ahí, puede utilizarse $xml-&gt;title
     y cualquier otro elemento.

### Ver también

    - [simplexml_load_string()](#function.simplexml-load-string) - Convierte una cadena XML en objeto

    - [SimpleXMLElement::__construct()](#simplexmlelement.construct) - Crea un nuevo objeto SimpleXMLElement

    - [Manejo de errores XML](#simplexml.examples-errors)

    - [libxml_use_internal_errors()](#function.libxml-use-internal-errors) - Se desactiva el reporte de errores de libxml y se almacenan para su lectura posterior

    - [Uso básico de SimpleXML](#simplexml.examples-basic)

    - [libxml_set_streams_context()](#function.libxml-set-streams-context) - Configura el contexto de flujos para la próxima operación libxml

# simplexml_load_string

(PHP 5, PHP 7, PHP 8)

simplexml_load_string — Convierte una cadena XML en objeto

### Descripción

**simplexml_load_string**(
    [string](#language.types.string) $data,
    [?](#language.types.null)[string](#language.types.string) $class_name = SimpleXMLElement::class,
    [int](#language.types.integer) $options = 0,
    [string](#language.types.string) $namespace_or_prefix = "",
    [bool](#language.types.boolean) $is_prefix = **[false](#constant.false)**
): [SimpleXMLElement](#class.simplexmlelement)|[false](#language.types.singleton)

Convierte la cadena XML data y
devuelve un objeto de la clase [SimpleXMLElement](#class.simplexmlelement).

### Parámetros

     data


       Una cadena XML válida






     class_name


       Puede utilizarse el parámetro opcional y, así,
       la función **simplexml_load_string()**
       devolverá un objeto de la clase especificada. Esta clase debe
       extender la clase [SimpleXMLElement](#class.simplexmlelement).






     options



[Operación de 'OR' lógica](#language.operators.bitwise)
de las [constantes de opción libxml](#libxml.constants).

     namespace_or_prefix


       Prefijo o URI del espacio de nombres.






     is_prefix


       **[true](#constant.true)** si namespace_or_prefix es un prefijo,
       **[false](#constant.false)** si es la URI.





### Valores devueltos

Devuelve un [object](#language.types.object) de la clase [SimpleXMLElement](#class.simplexmlelement)
cuyas propiedades contienen los datos del documento XML, o **[false](#constant.false)** si ocurre un error.

**Advertencia**
Esta función puede retornar **[false](#constant.false)**, pero también puede retornar un valor equivalente a **[false](#constant.false)**.
Por favor, lea la sección sobre los [booleanos](#language.types.boolean) para más información.
Utilice el [operador ===](#language.operators.comparison)
para probar el valor de retorno exacto de esta función.

### Errores/Excepciones

Produce un mensaje de error de nivel **[E_WARNING](#constant.e-warning)**
para cada error encontrado en los datos XML.

**Sugerencia**

    Utilice la función [libxml_use_internal_errors()](#function.libxml-use-internal-errors)
    para suprimir todos los errores XML, y la función
    [libxml_get_errors()](#function.libxml-get-errors) para recorrerlos.

### Ejemplos

    **Ejemplo #1 Convertir una cadena XML**

&lt;?php
$string = &lt;&lt;&lt;XML
&lt;?xml version='1.0'?&gt;
&lt;document&gt;
&lt;title&gt;Forty What?&lt;/title&gt;
&lt;from&gt;Joe&lt;/from&gt;
&lt;to&gt;Jane&lt;/to&gt;
&lt;body&gt;
I know that's the answer -- but what's the question?
&lt;/body&gt;
&lt;/document&gt;
XML;

$xml = simplexml_load_string($string);

print_r($xml);
?&gt;

    El ejemplo anterior mostrará:

SimpleXMLElement Object
(
[title] =&gt; Forty What?
[from] =&gt; Joe
[to] =&gt; Jane
[body] =&gt;
I know that's the answer -- but what's the question?
)

     A partir de ahí, puede utilizarse $xml-&gt;body
     y cualquier otro elemento.

### Ver también

    - [simplexml_load_file()](#function.simplexml-load-file) - Convierte un fichero XML en objeto

    - [SimpleXMLElement::__construct()](#simplexmlelement.construct) - Crea un nuevo objeto SimpleXMLElement

    - [Manejo de errores XML](#simplexml.examples-errors)

    - [libxml_use_internal_errors()](#function.libxml-use-internal-errors) - Se desactiva el reporte de errores de libxml y se almacenan para su lectura posterior

    - [Uso básico de SimpleXML](#simplexml.examples-basic)

## Tabla de contenidos

- [simplexml_import_dom](#function.simplexml-import-dom) — Construye un objeto SimpleXMLElement a partir de un
  objeto XML o HTML
- [simplexml_load_file](#function.simplexml-load-file) — Convierte un fichero XML en objeto
- [simplexml_load_string](#function.simplexml-load-string) — Convierte una cadena XML en objeto

- [Introducción](#intro.simplexml)
- [Instalación/Configuración](#simplexml.setup)<li>[Requerimientos](#simplexml.requirements)
- [Instalación](#simplexml.installation)
  </li>- [Ejemplos](#simplexml.examples)<li>[Uso básico de SimpleXML](#simplexml.examples-basic)
- [Manejo de errores XML](#simplexml.examples-errors)
  </li>- [SimpleXMLElement](#class.simplexmlelement) — La clase SimpleXMLElement<li>[SimpleXMLElement::addAttribute](#simplexmlelement.addattribute) — Añade un atributo al elemento SimpleXML
- [SimpleXMLElement::addChild](#simplexmlelement.addchild) — Añade un elemento hijo al nodo XML
- [SimpleXMLElement::asXML](#simplexmlelement.asxml) — Devuelve un string basado en un elemento SimpleXML
- [SimpleXMLElement::attributes](#simplexmlelement.attributes) — Identifica los atributos de un elemento
- [SimpleXMLElement::children](#simplexmlelement.children) — Busca los hijos de un nodo dado
- [SimpleXMLElement::\_\_construct](#simplexmlelement.construct) — Crea un nuevo objeto SimpleXMLElement
- [SimpleXMLElement::count](#simplexmlelement.count) — Cuenta el número de hijos para un elemento
- [SimpleXMLElement::current](#simplexmlelement.current) — Retorna la entrada actual
- [SimpleXMLElement::getDocNamespaces](#simplexmlelement.getdocnamespaces) — Devuelve los espacios de nombres declarados en un documento
- [SimpleXMLElement::getName](#simplexmlelement.getname) — Obtiene el nombre de un elemento XML
- [SimpleXMLElement::getNamespaces](#simplexmlelement.getnamespaces) — Devuelve los espacios de nombres utilizados en un documento
- [SimpleXMLElement::getChildren](#simplexmlelement.getchildren) — Devuelve los subelementos del elemento actual
- [SimpleXMLElement::hasChildren](#simplexmlelement.haschildren) — Verifica si el elemento actual tiene subelementos
- [SimpleXMLElement::key](#simplexmlelement.key) — Devuelve la clave actual
- [SimpleXMLElement::next](#simplexmlelement.next) — Se desplaza al elemento siguiente
- [SimpleXMLElement::registerXPathNamespace](#simplexmlelement.registerxpathnamespace) — Crea un contexto prefijo/ns para la próxima consulta XPath
- [SimpleXMLElement::rewind](#simplexmlelement.rewind) — Reemplaza el puntero al inicio
- [SimpleXMLElement::saveXML](#simplexmlelement.savexml) — Alias de SimpleXMLElement::asXML
- [SimpleXMLElement::\_\_toString](#simplexmlelement.tostring) — Devuelve el contenido como string
- [SimpleXMLElement::valid](#simplexmlelement.valid) — Verifica si el elemento actual es válido
- [SimpleXMLElement::xpath](#simplexmlelement.xpath) — Ejecuta una consulta XPath sobre datos XML
  </li>- [SimpleXMLIterator](#class.simplexmliterator) — La clase SimpleXMLIterator
- [Funciones de SimpleXML](#ref.simplexml)<li>[simplexml_import_dom](#function.simplexml-import-dom) — Construye un objeto SimpleXMLElement a partir de un
  objeto XML o HTML
- [simplexml_load_file](#function.simplexml-load-file) — Convierte un fichero XML en objeto
- [simplexml_load_string](#function.simplexml-load-string) — Convierte una cadena XML en objeto
  </li>
