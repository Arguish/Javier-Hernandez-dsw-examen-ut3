# CommonMark

# Introducción

Esta extensión proporciona acceso a la implementación de referencia de CommonMark, una versión racionalizada de la sintaxis de Markdown con una especificación.

##### Parsing:

    La extensión CommonMark proporciona una sencilla API de análisis sintáctico:

[CommonMark\Parse](#function.commonmark-parse)([string](#language.types.string) $content, [int](#language.types.integer) $options = ?): [CommonMark\Node](#class.commonmark-node)

##### Rendering:

    La extensión CommonMark proporciona una sencilla API de renderizado que soporta múltiples formatos:

[CommonMark\Render](#function.commonmark-render)([CommonMark\Node](#class.commonmark-node) $node, [int](#language.types.integer) $options = ?, [int](#language.types.integer) $width = ?): [string](#language.types.string)

[CommonMark\Render\HTML](#function.commonmark-render-html)([CommonMark\Node](#class.commonmark-node) $node, [int](#language.types.integer) $options = ?): [string](#language.types.string)

[CommonMark\Render\XML](#function.commonmark-render-xml)([CommonMark\Node](#class.commonmark-node) $node, [int](#language.types.integer) $options = ?): [string](#language.types.string)

[CommonMark\Render\Man](#function.commonmark-render-man)([CommonMark\Node](#class.commonmark-node) $node, [int](#language.types.integer) $options = ?, [int](#language.types.integer) $width = ?): [string](#language.types.string)

[CommonMark\Render\Latex](#function.commonmark-render-latex)([CommonMark\Node](#class.commonmark-node) $node, [int](#language.types.integer) $options = ?, [int](#language.types.integer) $width = ?): [string](#language.types.string)

##### AST:

    La extensión CommonMark implementa la visitación de los objetos CommonMark\NNode:

public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

##### CQL:

    La extensión CommonMark proporciona una interfaz para CQL, CommonMark Query Language:

public [CommonMark\CQL::\_\_construct](#commonmark-cql.construct)([string](#language.types.string) $query)

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#cmark.requirements)
- [Instalación](#cmark.installation)

    ## Requerimientos

    La extensión CommonMark requiere la implementación de referencia (C) de [» cmark](https://github.com/commonmark/cmark).

    ## Instalación

    Las versiones de la extensión CommonMark están alojadas por PECL y el código fuente está alojado en
    [» github](https://github.com/krakjoe/cmark),
    la ruta de instalación más simple es la ruta PECL normal :
    [» https://pecl.php.net/package/cmark](https://pecl.php.net/package/cmark).

    Los usuarios de Windows pueden descargar binarios de versiones precompiladas desde el sitio [» PECL](https://pecl.php.net/package/cmark).

    **Precaución**

    Los usuarios de Windows deben tomar la medida adicional de añadir cmark.dll (distribuido con las versiones de Windows) a su PATH.

# Constantes predefinidas

    **[CommonMark\Parser\Normal](#constant.commonmark-parser-normal)**
    ([int](#language.types.integer))








    **[CommonMark\Parser\Normalize](#constant.commonmark-parser-normalize)**
    ([int](#language.types.integer))








    **[CommonMark\Parser\Smart](#constant.commonmark-parser-smart)**
    ([int](#language.types.integer))








    **[CommonMark\Parser\ValidateUTF8](#constant.commonmark-parser-validateutf8)**
    ([int](#language.types.integer))








    **[CommonMark\Render\HardBreaks](#constant.commonmark-render-hardbreaks)**
    ([int](#language.types.integer))








    **[CommonMark\Render\NoBreaks](#constant.commonmark-render-nobreaks)**
    ([int](#language.types.integer))








    **[CommonMark\Render\Normal](#constant.commonmark-render-normal)**
    ([int](#language.types.integer))








    **[CommonMark\Render\Safe](#constant.commonmark-render-safe)**
    ([int](#language.types.integer))








    **[CommonMark\Render\SourcePos](#constant.commonmark-render-sourcepos)**
    ([int](#language.types.integer))

# Documento CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\Document**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Métodos heredados */

public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# Encabezado CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\Heading**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {


    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Propiedades */
    public
     [int](#language.types.integer)
      $level;


    /* Constructor */

public [\_\_construct](#commonmark-node-heading.construct)()
public [\_\_construct](#commonmark-node-heading.construct)([int](#language.types.integer) $level)

    /* Métodos heredados */
    public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)

public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# CommonMark\Node\Heading::\_\_construct

(cmark &gt;= 1.0.0)

CommonMark\Node\Heading::\_\_construct — Construcción de Heading

### Descripción

public **CommonMark\Node\Heading::\_\_construct**()

public **CommonMark\Node\Heading::\_\_construct**([int](#language.types.integer) $level)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

## Tabla de contenidos

- [CommonMark\Node\Heading::\_\_construct](#commonmark-node-heading.construct) — Construcción de Heading

# Paragraph CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\Paragraph**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Métodos heredados */

public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# BlockQuote CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\BlockQuote**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Métodos heredados */

public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# BulletList CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\BulletList**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {


    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Propiedades */
    public
     [bool](#language.types.boolean)
      $tight;

    public
     [int](#language.types.integer)
      $delimiter;

/_ Constructor _/

public [\_\_construct](#commonmark-node-bulletlist.construct)()
public [\_\_construct](#commonmark-node-bulletlist.construct)([int](#language.types.integer) $tight)
public [\_\_construct](#commonmark-node-bulletlist.construct)([int](#language.types.integer) $tight, [int](#language.types.integer) $delimiter)

    /* Métodos heredados */
    public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)

public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# CommonMark\Node\BulletList::\_\_construct

(cmark &gt;= 1.0.0)

CommonMark\Node\BulletList::\_\_construct — Construcción de BulletList

### Descripción

public **CommonMark\Node\BulletList::\_\_construct**()

public **CommonMark\Node\BulletList::\_\_construct**([int](#language.types.integer) $tight)

public **CommonMark\Node\BulletList::\_\_construct**([int](#language.types.integer) $tight, [int](#language.types.integer) $delimiter)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

## Tabla de contenidos

- [CommonMark\Node\BulletList::\_\_construct](#commonmark-node-bulletlist.construct) — Construcción de BulletList

# OrderedList CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\OrderedList**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Propiedades */
    public
     [bool](#language.types.boolean)
      $tight;

    public
     [int](#language.types.integer)
      $delimiter;

    public
     [int](#language.types.integer)
      $start;


    /* Constructor */

public [\_\_construct](#commonmark-node-orderedlist.construct)()
public [\_\_construct](#commonmark-node-orderedlist.construct)([int](#language.types.integer) $tight)
public [\_\_construct](#commonmark-node-orderedlist.construct)([int](#language.types.integer) $tight, [int](#language.types.integer) $delimiter)
public [\_\_construct](#commonmark-node-orderedlist.construct)([int](#language.types.integer) $tight, [int](#language.types.integer) $delimiter, [int](#language.types.integer) $start)

    /* Métodos heredados */
    public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)

public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# CommonMark\Node\OrderedList::\_\_construct

(cmark &gt;= 1.0.0)

CommonMark\Node\OrderedList::\_\_construct — Constructor OrderedList

### Descripción

public **CommonMark\Node\OrderedList::\_\_construct**()

public **CommonMark\Node\OrderedList::\_\_construct**([int](#language.types.integer) $tight)

public **CommonMark\Node\OrderedList::\_\_construct**([int](#language.types.integer) $tight, [int](#language.types.integer) $delimiter)

public **CommonMark\Node\OrderedList::\_\_construct**([int](#language.types.integer) $tight, [int](#language.types.integer) $delimiter, [int](#language.types.integer) $start)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    tight









    delimiter









    start





## Tabla de contenidos

- [CommonMark\Node\OrderedList::\_\_construct](#commonmark-node-orderedlist.construct) — Constructor OrderedList

# Item CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\Item**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Métodos heredados */

public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# Text CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\Text**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Propiedades */
    public
     ?[string](#language.types.string)
      $literal;


    /* Constructor */

public [\_\_construct](#commonmark-node-text.construct)()
public [\_\_construct](#commonmark-node-text.construct)([string](#language.types.string) $literal)

    /* Métodos heredados */
    public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)

public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# CommonMark\Node\Text::\_\_construct

(cmark &gt;= 1.0.0)

CommonMark\Node\Text::\_\_construct — Construcción de Text

### Descripción

public **CommonMark\Node\Text::\_\_construct**()

public **CommonMark\Node\Text::\_\_construct**([string](#language.types.string) $literal)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    literal





## Tabla de contenidos

- [CommonMark\Node\Text::\_\_construct](#commonmark-node-text.construct) — Construcción de Text

# Strong CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\Text\Strong**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Métodos heredados */

public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# Énfasis CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\Text\Emphasis**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Métodos heredados */

public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# ThematicBreak CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\ThematicBreak**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Métodos heredados */

public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# SoftBreak CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\SoftBreak**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Métodos heredados */

public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# LineBreak CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\LineBreak**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Métodos heredados */

public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# Código CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\Code**



      extends
       [CommonMark\Node\Text](#class.commonmark-node-text)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    public
     ?[string](#language.types.string)
      $literal;


    /* Constructor */

public [CommonMark\Node\Text::\_\_construct](#commonmark-node-text.construct)()
public [CommonMark\Node\Text::\_\_construct](#commonmark-node-text.construct)([string](#language.types.string) $literal)

    /* Métodos heredados */
    public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)

public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# CodeBlock CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\CodeBlock**



      extends
       [CommonMark\Node\Text](#class.commonmark-node-text)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    public
     ?[string](#language.types.string)
      $literal;


    /* Propiedades */
    public
     ?[string](#language.types.string)
      $fence;


    /* Constructor */

public [CommonMark\Node\Text::\_\_construct](#commonmark-node-text.construct)()
public [CommonMark\Node\Text::\_\_construct](#commonmark-node-text.construct)([string](#language.types.string) $literal)

    public [__construct](#commonmark-node-codeblock.construct)([string](#language.types.string) $fence, [string](#language.types.string) $literal)


    /* Métodos heredados */
    public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)

public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# CommonMark\Node\CodeBlock::\_\_construct

(cmark &gt;= 1.0.0)

CommonMark\Node\CodeBlock::\_\_construct — Construcción de CodeBlock

### Descripción

public **CommonMark\Node\CodeBlock::\_\_construct**([string](#language.types.string) $fence, [string](#language.types.string) $literal)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    fence









    literal





## Tabla de contenidos

- [CommonMark\Node\CodeBlock::\_\_construct](#commonmark-node-codeblock.construct) — Construcción de CodeBlock

# HTMLBlock CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\HTMLBlock**



      extends
       [CommonMark\Node\Text](#class.commonmark-node-text)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    public
     ?[string](#language.types.string)
      $literal;


    /* Constructor */

public [CommonMark\Node\Text::\_\_construct](#commonmark-node-text.construct)()
public [CommonMark\Node\Text::\_\_construct](#commonmark-node-text.construct)([string](#language.types.string) $literal)

    /* Métodos heredados */
    public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)

public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# HTMLInline CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\HTMLInline**



      extends
       [CommonMark\Node\Text](#class.commonmark-node-text)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    public
     ?[string](#language.types.string)
      $literal;

/_ Constructor _/

public [CommonMark\Node\Text::\_\_construct](#commonmark-node-text.construct)()
public [CommonMark\Node\Text::\_\_construct](#commonmark-node-text.construct)([string](#language.types.string) $literal)

    /* Métodos heredados */
    public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)

public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# Imagen CommonMark\Node concreta

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\Image**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Propiedades */
    public
     ?[string](#language.types.string)
      $url;

    public
     ?[string](#language.types.string)
      $title;


    /* Constructor */

public [\_\_construct](#commonmark-node-image.construct)()
public [\_\_construct](#commonmark-node-image.construct)([string](#language.types.string) $url)
public [\_\_construct](#commonmark-node-image.construct)([string](#language.types.string) $url, [string](#language.types.string) $title)

    /* Métodos heredados */
    public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)

public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# CommonMark\Node\Image::\_\_construct

(cmark &gt;= 1.0.0)

CommonMark\Node\Image::\_\_construct — Construcción de Image

### Descripción

public **CommonMark\Node\Image::\_\_construct**()

public **CommonMark\Node\Image::\_\_construct**([string](#language.types.string) $url)

public **CommonMark\Node\Image::\_\_construct**([string](#language.types.string) $url, [string](#language.types.string) $title)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    url









    title





## Tabla de contenidos

- [CommonMark\Node\Image::\_\_construct](#commonmark-node-image.construct) — Construcción de Image

# Link CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\Link**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {


    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Propiedades */
    public
     ?[string](#language.types.string)
      $url;

    public
     ?[string](#language.types.string)
      $title;


    /* Constructor */

public [\_\_construct](#commonmark-node-link.construct)()
public [\_\_construct](#commonmark-node-link.construct)([string](#language.types.string) $url)
public [\_\_construct](#commonmark-node-link.construct)([string](#language.types.string) $url, [string](#language.types.string) $title)

    /* Métodos heredados */
    public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)

public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# CommonMark\Node\Link::\_\_construct

(cmark &gt;= 1.0.0)

CommonMark\Node\Link::\_\_construct — Construcción de Link

### Descripción

public **CommonMark\Node\Link::\_\_construct**()

public **CommonMark\Node\Link::\_\_construct**([string](#language.types.string) $url)

public **CommonMark\Node\Link::\_\_construct**([string](#language.types.string) $url, [string](#language.types.string) $title)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    url









    title





## Tabla de contenidos

- [CommonMark\Node\Link::\_\_construct](#commonmark-node-link.construct) — Construcción de Link

# CustomBlock CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\CustomBlock**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {


    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Propiedades */
    public
     ?[string](#language.types.string)
      $onEnter;

    public
     ?[string](#language.types.string)
      $onLeave;


    /* Métodos heredados */

public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# CustomInline CommonMark\Node concreto

(cmark &gt;= 1.0.0)

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Node\CustomInline**



      extends
       [CommonMark\Node](#class.commonmark-node)


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades heredadas */

     public
     readonly
     ?Node
      $parent;

public
readonly
?Node
$previous;
public
readonly
?Node
$next;
public
readonly
?Node
$lastChild;
public
readonly
?Node
$firstChild;
public
readonly
[int](#language.types.integer)
$startLine;
public
readonly
[int](#language.types.integer)
$endLine;
public
readonly
[int](#language.types.integer)
$startColumn;
public
readonly
[int](#language.types.integer)
$endColumn;

    /* Propiedades */
    public
     ?[string](#language.types.string)
      $onEnter;

    public
     ?[string](#language.types.string)
      $onLeave;


    /* Métodos heredados */

public [CommonMark\Node::appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [CommonMark\Node::unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [CommonMark\Node::accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# CommonMark\Node abstracto

(cmark &gt;= 1.0.0)

## Introducción

    Representa un nodo abstracto, esta clase abstracta final no está destinada a ser utilizada directamente por el desarrollador.

## Sinopsis de la Clase

    ****




      final
      abstract
      class **CommonMark\Node**


     implements
       [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable),  [Traversable](#class.traversable) {

    /* Propiedades */

     public
     readonly
     ?Node
      $parent;

    public
     readonly
     ?Node
      $previous;

    public
     readonly
     ?Node
      $next;

    public
     readonly
     ?Node
      $lastChild;

    public
     readonly
     ?Node
      $firstChild;

    public
     readonly
     [int](#language.types.integer)
      $startLine;

    public
     readonly
     [int](#language.types.integer)
      $endLine;

    public
     readonly
     [int](#language.types.integer)
      $startColumn;

    public
     readonly
     [int](#language.types.integer)
      $endColumn;


    /* Métodos */

public [appendChild](#commonmark-node.appendchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [prependChild](#commonmark-node.prependchild)([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)
public [insertAfter](#commonmark-node.insertafter)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [insertBefore](#commonmark-node.insertbefore)([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)
public [replace](#commonmark-node.replace)([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)
public [unlink](#commonmark-node.unlink)(): [void](language.types.void.html)
public [accept](#commonmark-node.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# CommonMark\Node::appendChild

(cmark &gt;= 1.0.0)

CommonMark\Node::appendChild — Manipulación del AST

### Descripción

public **CommonMark\Node::appendChild**([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    child





### Valores devueltos

# CommonMark\Node::prependChild

(cmark &gt;= 1.0.0)

CommonMark\Node::prependChild — Manipulación del AST

### Descripción

public **CommonMark\Node::prependChild**([CommonMark\Node](#class.commonmark-node) $child): [CommonMark\Node](#class.commonmark-node)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    child





### Valores devueltos

# CommonMark\Node::insertAfter

(cmark &gt;= 1.0.0)

CommonMark\Node::insertAfter — Manipulación del AST

### Descripción

public **CommonMark\Node::insertAfter**([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    sibling





### Valores devueltos

# CommonMark\Node::insertBefore

(cmark &gt;= 1.0.0)

CommonMark\Node::insertBefore — Manipulación del AST

### Descripción

public **CommonMark\Node::insertBefore**([CommonMark\Node](#class.commonmark-node) $sibling): [CommonMark\Node](#class.commonmark-node)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    sibling





### Valores devueltos

# CommonMark\Node::replace

(cmark &gt;= 1.0.0)

CommonMark\Node::replace — Manipulación del AST

### Descripción

public **CommonMark\Node::replace**([CommonMark\Node](#class.commonmark-node) $target): [CommonMark\Node](#class.commonmark-node)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    target





### Valores devueltos

# CommonMark\Node::unlink

(cmark &gt;= 1.0.0)

CommonMark\Node::unlink — Manipulación del AST

### Descripción

public **CommonMark\Node::unlink**(): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

# CommonMark\Node::accept

(cmark &gt;= 1.0.0)

CommonMark\Node::accept — Visitación

### Descripción

public **CommonMark\Node::accept**([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

### Parámetros

    visitor


      Un objeto implementando [CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor)


### Ver también

    - [CommonMark\Interfaces\IVisitor::enter](#commonmark-interfaces-ivisitor.enter)

    - [CommonMark\Interfaces\IVisitor::leave](#commonmark-interfaces-ivisitor.leave)

## Tabla de contenidos

- [CommonMark\Node::appendChild](#commonmark-node.appendchild) — Manipulación del AST
- [CommonMark\Node::prependChild](#commonmark-node.prependchild) — Manipulación del AST
- [CommonMark\Node::insertAfter](#commonmark-node.insertafter) — Manipulación del AST
- [CommonMark\Node::insertBefore](#commonmark-node.insertbefore) — Manipulación del AST
- [CommonMark\Node::replace](#commonmark-node.replace) — Manipulación del AST
- [CommonMark\Node::unlink](#commonmark-node.unlink) — Manipulación del AST
- [CommonMark\Node::accept](#commonmark-node.accept) — Visitación

# La interfaz CommonMark\Interfaces\IVisitor

(cmark &gt;= 1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Interfaces\IVisitor**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      Done;

    const
     [int](#language.types.integer)
      Enter;

    const
     [int](#language.types.integer)
      Leave;


    /* Métodos */

abstract public [enter](#commonmark-interfaces-ivisitor.enter)(IVisitable $visitable): [int](#language.types.integer)|IVisitable|[null](#language.types.null)
abstract public [leave](#commonmark-interfaces-ivisitor.leave)(IVisitable $visitable): [int](#language.types.integer)|IVisitable|[null](#language.types.null)

}

# CommonMark\Interfaces\IVisitor::enter

(cmark &gt;= 1.0.0)

CommonMark\Interfaces\IVisitor::enter — Visitación

### Descripción

abstract public **CommonMark\Interfaces\IVisitor::enter**(IVisitable $visitable): [int](#language.types.integer)|IVisitable|[null](#language.types.null)

### Parámetros

    visitable


      El [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable) actual en curso de entrada


### Valores devueltos

Devolver CommonMark\Interfaces\IVisitor::Done provocará la salida del iterador subyacente.

Devolver CommonMark\Interfaces\IVisitor::Enter reinicializará el iterador subyacente al entrar en el **IVisitable** actual

Devolver CommonMark\Interfaces\IVisitor::Leave reinicializará el iterador subyacente al salir del actual **IVisitable**

Devolver un **IVisitable** reinicializará el iterador subyacente al entrar en el **IVisitable** dado

No devolver nada permitirá que el iterador subyacente continúe

### Ver también

    - [CommonMark\Interfaces\IVisitable::accept](#commonmark-interfaces-ivisitable.accept)

# CommonMark\Interfaces\IVisitor::leave

(cmark &gt;= 1.0.0)

CommonMark\Interfaces\IVisitor::leave — Visitación

### Descripción

abstract public **CommonMark\Interfaces\IVisitor::leave**(IVisitable $visitable): [int](#language.types.integer)|IVisitable|[null](#language.types.null)

### Parámetros

    visitable


      El [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable) actual en curso de salida


### Valores devueltos

Devolver CommonMark\Interfaces\IVisitor::Done provocará la salida del iterador subyacente.

Devolver CommonMark\Interfaces\IVisitor::Enter reinicializará el iterador subyacente al entrar en el **IVisitable** actual

Devolver CommonMark\Interfaces\IVisitor::Leave reinicializará el iterador subyacente al salir del **IVisitable** actual

Devolver un **IVisitable** reinicializará el iterador subyacente al entrar en el **IVisitable** dado

No devolver nada permitirá al iterador subyacente continuar

### Ver también

    - [CommonMark\Interfaces\IVisitable::accept](#commonmark-interfaces-ivisitable.accept)

## Tabla de contenidos

- [CommonMark\Interfaces\IVisitor::enter](#commonmark-interfaces-ivisitor.enter) — Visitación
- [CommonMark\Interfaces\IVisitor::leave](#commonmark-interfaces-ivisitor.leave) — Visitación

# La interfaz CommonMark\Interfaces\IVisitable

(cmark &gt;= 1.0.0)

## Introducción

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Interfaces\IVisitable**

     {

abstract public [accept](#commonmark-interfaces-ivisitable.accept)([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

}

# CommonMark\Interfaces\IVisitable::accept

(cmark &gt;= 1.0.0)

CommonMark\Interfaces\IVisitable::accept — Visitación

### Descripción

abstract public **CommonMark\Interfaces\IVisitable::accept**([CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) $visitor): [void](language.types.void.html)

### Parámetros

    visitor


      Un objeto que implementa [CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor)


### Ver también

    - [CommonMark\Interfaces\IVisitor::enter](#commonmark-interfaces-ivisitor.enter)

    - [CommonMark\Interfaces\IVisitor::leave](#commonmark-interfaces-ivisitor.leave)

## Tabla de contenidos

- [CommonMark\Interfaces\IVisitable::accept](#commonmark-interfaces-ivisitable.accept) — Visitación

# La clase CommonMark\Parser

(cmark &gt;= 1.0.0)

## Introducción

    Proporciona un analizador incremental como alternativa a la simple función de análisis de la API Parsing

## Sinopsis de la Clase

    ****




      final
      class **CommonMark\Parser**

     {


    /* Constructor */

public [\_\_construct](#commonmark-parser.construct)([int](#language.types.integer) $options = ?)

    /* Métodos */
    public [parse](#commonmark-parser.parse)([string](#language.types.string) $buffer): [void](language.types.void.html)

public [finish](#commonmark-parser.finish)(): [CommonMark\Node](#class.commonmark-node)

}

# CommonMark\Parser::\_\_construct

(cmark &gt;= 1.0.0)

CommonMark\Parser::\_\_construct — Analizar

### Descripción

public **CommonMark\Parser::\_\_construct**([int](#language.types.integer) $options = ?)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    options


      Una máscara de:






       **[CommonMark\Parser\Normal](#constant.commonmark-parser-normal)**
       ([int](#language.types.integer))








       **[CommonMark\Parser\Normalize](#constant.commonmark-parser-normalize)**
       ([int](#language.types.integer))








       **[CommonMark\Parser\ValidateUTF8](#constant.commonmark-parser-validateutf8)**
       ([int](#language.types.integer))








       **[CommonMark\Parser\Smart](#constant.commonmark-parser-smart)**
       ([int](#language.types.integer))








# CommonMark\Parser::parse

(cmark &gt;= 1.0.0)

CommonMark\Parser::parse — Analizar

### Descripción

public **CommonMark\Parser::parse**([string](#language.types.string) $buffer): [void](language.types.void.html)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    buffer





### Valores devueltos

# CommonMark\Parser::finish

(cmark &gt;= 1.0.0)

CommonMark\Parser::finish — Analizar

### Descripción

public **CommonMark\Parser::finish**(): [CommonMark\Node](#class.commonmark-node)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

## Tabla de contenidos

- [CommonMark\Parser::\_\_construct](#commonmark-parser.construct) — Analizar
- [CommonMark\Parser::parse](#commonmark-parser.parse) — Analizar
- [CommonMark\Parser::finish](#commonmark-parser.finish) — Analizar

# La clase CommonMark\CQL

(cmark &gt;= 1.1.0)

## Introducción

    El CommonMark Query Language es un DSL para describir cómo viajar a través de un árbol de nodos CommonMark implementado como un analizador y un compilador para un pequeño conjunto de instrucciones, y una máquina virtual para ejecutar estas instrucciones.

##### Rutas:

      En su forma más simplista, una consulta CQL combina las siguientes rutas y / para describir cómo viajar a través de un árbol:



       - firstChild

       - lastChild

       - previous

       - next

       - parent


      Por ejemplo, /firstChild/lastChild viaja al último nodo hijo del primer nodo hijo.


##### Bucle

    CQL puede ser instruido para bucles, por ejemplo a través de los hijos de, o los hermanos de un nodo particular, utilizando la ruta children, o siblings. Por ejemplo, /firstChild/children viajará a todos los hijos del primer nodo hijo.

##### Subconsultas

      CQL puede ser instruido para viajar utilizando una subconsulta como [/firstChild]. Por ejemplo, /firstChild/children[/firstChild] viajará al primer nodo hijo de todos los hijos del primer nodo hijo.


##### Restricciones de bucle

      Al buclar, CQL puede ser instruido para restringir la ruta recorrida a los nodos de un tipo particular. Por ejemplo /children(BlockQuote) viajará a los hijos de un nodo donde el tipo es BlockQuote. Los siguientes tipos son reconocidos (insensibles a mayúsculas y minúsculas):



       - BlockQuote

       - List

       - Item

       - CodeBlock

       - HtmlBlock

       - CustomBlock

       - Paragraph

       - Heading

       - ThematicBreak

       - Text

       - SoftBreak

       - LineBreak

       - Code

       - HtmlInline

       - CustomInline

       - Emphasis

       - Strong

       - Link

       - Image


      Los tipos pueden ser utilizados como una unión, por ejemplo /children(BlockQuote|List) viajará a los hijos de un nodo donde el tipo es BlockQuote o List. Los tipos, o uniones de tipos, también pueden ser negados. Por ejemplo /children(~BlockQuote) viajará a los hijos de un nodo donde el tipo no es BlockQuote, y /children(~BlockQuote|Paragraph) viajará a los hijos de un nodo donde el tipo no es BlockQuote o Paragraph.


##### Restricciones de rutas

      CQL puede ser instruido para crear un bucle para viajar a un nodo de un tipo particular, a una ruta particular. Por ejemplo, /firstChild(BlockQuote) viajará al primer nodo hijo donde el tipo es BlockQuote. Tenga en cuenta que como otros bucles para children y siblings, este tipo de ruta solo puede ser seguido por una subconsulta.


##### Notas de implementación

     Aunque CQL ha sido implementado como parte de la extensión PHP CommonMark, está separado de PHP y no utiliza la máquina virtual de PHP o la representación interna de los valores.

## Sinopsis de la Clase

    ****




      class **CommonMark\CQL**

     {


    /* Constructor */

public [\_\_construct](#commonmark-cql.construct)([string](#language.types.string) $query)

    /* Métodos */
    public [__invoke](#commonmark-cql.invoke)([CommonMark\Node](#class.commonmark-node) $root, [callable](#language.types.callable) $handler)

}

# CommonMark\CQL::\_\_construct

(cmark &gt;= 1.1.0)

CommonMark\CQL::\_\_construct — Construcción de CQL

### Descripción

public **CommonMark\CQL::\_\_construct**([string](#language.types.string) $query)

### Parámetros

    query


      Una string CQL.


# CommonMark\CQL::\_\_invoke

(cmark &gt;= 1.1.0)

CommonMark\CQL::\_\_invoke — Ejecución de CQL

### Descripción

public **CommonMark\CQL::\_\_invoke**([CommonMark\Node](#class.commonmark-node) $root, [callable](#language.types.callable) $handler)

Debe invocar la función CQL actual en el root dado,
ejecutando el handler dado a la entrada de un [CommonMark\Node](#class.commonmark-node)

### Parámetros

    root

     el nodo raíz de un árbol





    handler


      Debe tener el prototipo:



       **handler**([CommonMark\Node](#class.commonmark-node) $root, [CommonMark\Node](#class.commonmark-node) $entering): [?](#language.types.null)[bool](#language.types.boolean)


       - Si handler no devuelve (void), o devuelve [null](#language.types.null), el CQL continuará ejecutándose

       - Si el gestor devuelve un valor verdadero, el CQL continuará ejecutándose

       - Si el gestor devuelve un valor falso, el CQL se detendrá




## Tabla de contenidos

- [CommonMark\CQL::\_\_construct](#commonmark-cql.construct) — Construcción de CQL
- [CommonMark\CQL::\_\_invoke](#commonmark-cql.invoke) — Ejecución de CQL

# Funciones de CommonMark

# CommonMark\Parse

(cmark &gt;= 1.0.0)

CommonMark\Parse — Parsing

### Descripción

**CommonMark\Parse**([string](#language.types.string) $content, [int](#language.types.integer) $options = ?): [CommonMark\Node](#class.commonmark-node)

Deberá analizar content

### Parámetros

    content


      reducción de la carga string






    options


      Una máscara de:






       **[CommonMark\Parser\Normal](#constant.commonmark-parser-normal)**
       ([int](#language.types.integer))








       **[CommonMark\Parser\Normalize](#constant.commonmark-parser-normalize)**
       ([int](#language.types.integer))








       **[CommonMark\Parser\ValidateUTF8](#constant.commonmark-parser-validateutf8)**
       ([int](#language.types.integer))








       **[CommonMark\Parser\Smart](#constant.commonmark-parser-smart)**
       ([int](#language.types.integer))








### Valores devueltos

Devolverá la raíz de CommonMark\Node

# CommonMark\Render

(cmark &gt;= 1.0.0)

CommonMark\Render — Genera un renderizado

### Descripción

**CommonMark\Render**([CommonMark\Node](#class.commonmark-node) $node, [int](#language.types.integer) $options = ?, [int](#language.types.integer) $width = ?): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    node









    options


      Una máscara de:






        **[CommonMark\Render\Normal](#constant.commonmark-render-normal)**
        ([int](#language.types.integer))








        **[CommonMark\Render\SourcePos](#constant.commonmark-render-sourcepos)**
        ([int](#language.types.integer))








        **[CommonMark\Render\HardBreaks](#constant.commonmark-render-hardbreaks)**
        ([int](#language.types.integer))








        **[CommonMark\Render\Safe](#constant.commonmark-render-safe)**
        ([int](#language.types.integer))








        **[CommonMark\Render\NoBreaks](#constant.commonmark-render-nobreaks)**
        ([int](#language.types.integer))










    width





### Valores devueltos

# CommonMark\Render\HTML

(cmark &gt;= 1.0.0)

CommonMark\Render\HTML — Genera un renderizado

### Descripción

**CommonMark\Render\HTML**([CommonMark\Node](#class.commonmark-node) $node, [int](#language.types.integer) $options = ?): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    node









    options


      Una máscara de:






        **[CommonMark\Render\Normal](#constant.commonmark-render-normal)**
        ([int](#language.types.integer))








        **[CommonMark\Render\SourcePos](#constant.commonmark-render-sourcepos)**
        ([int](#language.types.integer))








        **[CommonMark\Render\HardBreaks](#constant.commonmark-render-hardbreaks)**
        ([int](#language.types.integer))








        **[CommonMark\Render\Safe](#constant.commonmark-render-safe)**
        ([int](#language.types.integer))








        **[CommonMark\Render\NoBreaks](#constant.commonmark-render-nobreaks)**
        ([int](#language.types.integer))








### Valores devueltos

# CommonMark\Render\Latex

(cmark &gt;= 1.0.0)

CommonMark\Render\Latex — Genera un renderizado

### Descripción

**CommonMark\Render\Latex**([CommonMark\Node](#class.commonmark-node) $node, [int](#language.types.integer) $options = ?, [int](#language.types.integer) $width = ?): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    node









    options


      Una máscara de:






        **[CommonMark\Render\Normal](#constant.commonmark-render-normal)**
        ([int](#language.types.integer))








        **[CommonMark\Render\SourcePos](#constant.commonmark-render-sourcepos)**
        ([int](#language.types.integer))








        **[CommonMark\Render\HardBreaks](#constant.commonmark-render-hardbreaks)**
        ([int](#language.types.integer))








        **[CommonMark\Render\Safe](#constant.commonmark-render-safe)**
        ([int](#language.types.integer))








        **[CommonMark\Render\NoBreaks](#constant.commonmark-render-nobreaks)**
        ([int](#language.types.integer))










    width





### Valores devueltos

# CommonMark\Render\Man

(cmark &gt;= 1.0.0)

CommonMark\Render\Man — Genera un renderizado

### Descripción

**CommonMark\Render\Man**([CommonMark\Node](#class.commonmark-node) $node, [int](#language.types.integer) $options = ?, [int](#language.types.integer) $width = ?): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    node









    options


      Una máscara de:






        **[CommonMark\Render\Normal](#constant.commonmark-render-normal)**
        ([int](#language.types.integer))








        **[CommonMark\Render\SourcePos](#constant.commonmark-render-sourcepos)**
        ([int](#language.types.integer))








        **[CommonMark\Render\HardBreaks](#constant.commonmark-render-hardbreaks)**
        ([int](#language.types.integer))








        **[CommonMark\Render\Safe](#constant.commonmark-render-safe)**
        ([int](#language.types.integer))








        **[CommonMark\Render\NoBreaks](#constant.commonmark-render-nobreaks)**
        ([int](#language.types.integer))










    width





### Valores devueltos

# CommonMark\Render\XML

(cmark &gt;= 1.0.0)

CommonMark\Render\XML — Genera un rendimiento

### Descripción

**CommonMark\Render\XML**([CommonMark\Node](#class.commonmark-node) $node, [int](#language.types.integer) $options = ?): [string](#language.types.string)

**Advertencia**

Esta función está actualmente no documentada; solo la lista de sus argumentos está disponible.

### Parámetros

    node









    options


      Una máscara de:






        **[CommonMark\Render\Normal](#constant.commonmark-render-normal)**
        ([int](#language.types.integer))








        **[CommonMark\Render\SourcePos](#constant.commonmark-render-sourcepos)**
        ([int](#language.types.integer))








        **[CommonMark\Render\HardBreaks](#constant.commonmark-render-hardbreaks)**
        ([int](#language.types.integer))








        **[CommonMark\Render\Safe](#constant.commonmark-render-safe)**
        ([int](#language.types.integer))








        **[CommonMark\Render\NoBreaks](#constant.commonmark-render-nobreaks)**
        ([int](#language.types.integer))








### Valores devueltos

## Tabla de contenidos

- [CommonMark\Parse](#function.commonmark-parse) — Parsing
- [CommonMark\Render](#function.commonmark-render) — Genera un renderizado
- [CommonMark\Render\HTML](#function.commonmark-render-html) — Genera un renderizado
- [CommonMark\Render\Latex](#function.commonmark-render-latex) — Genera un renderizado
- [CommonMark\Render\Man](#function.commonmark-render-man) — Genera un renderizado
- [CommonMark\Render\XML](#function.commonmark-render-xml) — Genera un rendimiento

- [Introducción](#intro.cmark)
- [Instalación/Configuración](#cmark.setup)<li>[Requerimientos](#cmark.requirements)
- [Instalación](#cmark.installation)
  </li>- [Constantes predefinidas](#cmark.constants)
- [CommonMark\Node\Document](#class.commonmark-node-document) — Documento CommonMark\Node concreto
- [CommonMark\Node\Heading](#class.commonmark-node-heading) — Encabezado CommonMark\Node concreto<li>[CommonMark\Node\Heading::\_\_construct](#commonmark-node-heading.construct) — Construcción de Heading
  </li>- [CommonMark\Node\Paragraph](#class.commonmark-node-paragraph) — Paragraph CommonMark\Node concreto
- [CommonMark\Node\BlockQuote](#class.commonmark-node-blockquote) — BlockQuote CommonMark\Node concreto
- [CommonMark\Node\BulletList](#class.commonmark-node-bulletlist) — BulletList CommonMark\Node concreto<li>[CommonMark\Node\BulletList::\_\_construct](#commonmark-node-bulletlist.construct) — Construcción de BulletList
  </li>- [CommonMark\Node\OrderedList](#class.commonmark-node-orderedlist) — OrderedList CommonMark\Node concreto<li>[CommonMark\Node\OrderedList::__construct](#commonmark-node-orderedlist.construct) — Constructor OrderedList
  </li>- [CommonMark\Node\Item](#class.commonmark-node-item) — Item CommonMark\Node concreto
- [CommonMark\Node\Text](#class.commonmark-node-text) — Text CommonMark\Node concreto<li>[CommonMark\Node\Text::\_\_construct](#commonmark-node-text.construct) — Construcción de Text
  </li>- [CommonMark\Node\Text\Strong](#class.commonmark-node-text-strong) — Strong CommonMark\Node concreto
- [CommonMark\Node\Text\Emphasis](#class.commonmark-node-text-emphasis) — Énfasis CommonMark\Node concreto
- [CommonMark\Node\ThematicBreak](#class.commonmark-node-thematicbreak) — ThematicBreak CommonMark\Node concreto
- [CommonMark\Node\SoftBreak](#class.commonmark-node-softbreak) — SoftBreak CommonMark\Node concreto
- [CommonMark\Node\LineBreak](#class.commonmark-node-linebreak) — LineBreak CommonMark\Node concreto
- [CommonMark\Node\Code](#class.commonmark-node-code) — Código CommonMark\Node concreto
- [CommonMark\Node\CodeBlock](#class.commonmark-node-codeblock) — CodeBlock CommonMark\Node concreto<li>[CommonMark\Node\CodeBlock::\_\_construct](#commonmark-node-codeblock.construct) — Construcción de CodeBlock
  </li>- [CommonMark\Node\HTMLBlock](#class.commonmark-node-htmlblock) — HTMLBlock CommonMark\Node concreto
- [CommonMark\Node\HTMLInline](#class.commonmark-node-htmlinline) — HTMLInline CommonMark\Node concreto
- [CommonMark\Node\Image](#class.commonmark-node-image) — Imagen CommonMark\Node concreta<li>[CommonMark\Node\Image::\_\_construct](#commonmark-node-image.construct) — Construcción de Image
  </li>- [CommonMark\Node\Link](#class.commonmark-node-link) — Link CommonMark\Node concreto<li>[CommonMark\Node\Link::__construct](#commonmark-node-link.construct) — Construcción de Link
  </li>- [CommonMark\Node\CustomBlock](#class.commonmark-node-customblock) — CustomBlock CommonMark\Node concreto
- [CommonMark\Node\CustomInline](#class.commonmark-node-custominline) — CustomInline CommonMark\Node concreto
- [CommonMark\Node](#class.commonmark-node) — CommonMark\Node abstracto<li>[CommonMark\Node::appendChild](#commonmark-node.appendchild) — Manipulación del AST
- [CommonMark\Node::prependChild](#commonmark-node.prependchild) — Manipulación del AST
- [CommonMark\Node::insertAfter](#commonmark-node.insertafter) — Manipulación del AST
- [CommonMark\Node::insertBefore](#commonmark-node.insertbefore) — Manipulación del AST
- [CommonMark\Node::replace](#commonmark-node.replace) — Manipulación del AST
- [CommonMark\Node::unlink](#commonmark-node.unlink) — Manipulación del AST
- [CommonMark\Node::accept](#commonmark-node.accept) — Visitación
  </li>- [CommonMark\Interfaces\IVisitor](#class.commonmark-interfaces-ivisitor) — La interfaz CommonMark\Interfaces\IVisitor<li>[CommonMark\Interfaces\IVisitor::enter](#commonmark-interfaces-ivisitor.enter) — Visitación
- [CommonMark\Interfaces\IVisitor::leave](#commonmark-interfaces-ivisitor.leave) — Visitación
  </li>- [CommonMark\Interfaces\IVisitable](#class.commonmark-interfaces-ivisitable) — La interfaz CommonMark\Interfaces\IVisitable<li>[CommonMark\Interfaces\IVisitable::accept](#commonmark-interfaces-ivisitable.accept) — Visitación
  </li>- [CommonMark\Parser](#class.commonmark-parser) — La clase CommonMark\Parser<li>[CommonMark\Parser::__construct](#commonmark-parser.construct) — Analizar
- [CommonMark\Parser::parse](#commonmark-parser.parse) — Analizar
- [CommonMark\Parser::finish](#commonmark-parser.finish) — Analizar
  </li>- [CommonMark\CQL](#class.commonmark-cql) — La clase CommonMark\CQL<li>[CommonMark\CQL::__construct](#commonmark-cql.construct) — Construcción de CQL
- [CommonMark\CQL::\_\_invoke](#commonmark-cql.invoke) — Ejecución de CQL
  </li>- [Funciones de CommonMark](#ref.cmark)<li>[CommonMark\Parse](#function.commonmark-parse) — Parsing
- [CommonMark\Render](#function.commonmark-render) — Genera un renderizado
- [CommonMark\Render\HTML](#function.commonmark-render-html) — Genera un renderizado
- [CommonMark\Render\Latex](#function.commonmark-render-latex) — Genera un renderizado
- [CommonMark\Render\Man](#function.commonmark-render-man) — Genera un renderizado
- [CommonMark\Render\XML](#function.commonmark-render-xml) — Genera un rendimiento
  </li>
