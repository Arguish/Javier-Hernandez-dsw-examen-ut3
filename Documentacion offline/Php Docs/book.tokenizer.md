# Tokenizer

# Introducción

Las funciones de la extensión tokenizer proporcionan una interfaz para la
creación de tokens de PHP integrada en el Motor Zend. Utilizando estas
funciones se pueden escribir herramientas propias de análisis o de
modificación de código fuente de PHP, sin tener que hacer frente a las
especificaciones del lenguaje a nivel léxico.

Véase también el [apéndice sobre tokens](#tokens).

# Instalación/Configuración

## Tabla de contenidos

- [Instalación](#tokenizer.installation)

## Instalación

.
Esta extensión está activada por omisión. Puede ser desactivada utilizando la opción de configuración:
**--disable-tokenizer**

La versión Windows de PHP
dispone del soporte automático de esta extensión. No es necesario
añadir ninguna biblioteca adicional para disponer de estas funciones.

# Constantes predefinidas

Cuando la extensión es compilada en PHP o cargada dinámicamente al inicio, los
tokens listados en la [Lista de tokens del analizador](#tokens) son definidos como constantes.

       Constantes
       Descripción



    **[TOKEN_PARSE](#constant.token-parse)**
    ([int](#language.types.integer))



     Se reconoce la capacidad de usar palabras reservadas en contextos específicos.

# Ejemplos

Aquí hay un simple ejemplo de scripts PHP donde se usa el tokenizer
para leer en un archivo PHP, quitar todo los comentarios del archivo
original y mostrar solamente el código puro.

**Ejemplo #1 Quitar comentarios con el tokenizer**

&lt;?php

$source = file_get_contents('example.php');
$tokens = token_get_all($source);

foreach ($tokens as $token) {
   if (is_string($token)) {
// simple 1-character token
echo $token;
   } else {
       // token array
       list($id, $text) = $token;

       switch ($id) {
           case T_COMMENT:
           case T_DOC_COMMENT:
               // ninguna acción en comentarios
               break;

           default:
               // cualquier otra cosa -&gt; salida "tal cual"
               echo $text;
               break;
       }

}
}
?&gt;

# La clase PhpToken

(PHP 8)

## Introducción

    Esta clase proporciona una alternativa a [token_get_all()](#function.token-get-all). Mientras que la función devuelve tokens
    ya sea como una única string, ya sea como un array con un ID de token, un texto de token y un número de línea,
    [PhpToken::tokenize()](#phptoken.tokenize) normaliza todos los tokens en objetos PhpToken, lo que hace que el código que opera
    sobre los tokens sea más eficiente en memoria y más legible.

## Sinopsis de la Clase

     class **PhpToken**



     implements
      [Stringable](#class.stringable) {

    /* Propiedades */

     public
     [int](#language.types.integer)
      [$id](#phptoken.props.id);

    public
     [string](#language.types.string)
      [$text](#phptoken.props.text);

    public
     [int](#language.types.integer)
      [$line](#phptoken.props.line);

    public
     [int](#language.types.integer)
      [$pos](#phptoken.props.pos);


    /* Métodos */

final public [\_\_construct](#phptoken.construct)(
    [int](#language.types.integer) $id,
    [string](#language.types.string) $text,
    [int](#language.types.integer) $line = -1,
    [int](#language.types.integer) $pos = -1
)

    public [getTokenName](#phptoken.gettokenname)(): [?](#language.types.null)[string](#language.types.string)

public [is](#phptoken.is)([int](#language.types.integer)|[string](#language.types.string)|[array](#language.types.array) $kind): [bool](#language.types.boolean)
public [isIgnorable](#phptoken.isignorable)(): [bool](#language.types.boolean)
public [\_\_toString](#phptoken.tostring)(): [string](#language.types.string)
public static [tokenize](#phptoken.tokenize)([string](#language.types.string) $code, [int](#language.types.integer) $flags = 0): [array](#language.types.array)

}

## Propiedades

     id


       Una de las constantes T_* o un código ASCII que representa un token de un solo carácter.






     text


       El contenido textual del token.






     line


       El número de línea (a partir de 1) del token.






     pos


       La posición de inicio (a partir de 0) en la string tokenizada (el número de bytes).





# PhpToken::\_\_construct

(PHP 8)

PhpToken::\_\_construct — Devuelve un nuevo objeto PhpToken

### Descripción

final public **PhpToken::\_\_construct**(
    [int](#language.types.integer) $id,
    [string](#language.types.string) $text,
    [int](#language.types.integer) $line = -1,
    [int](#language.types.integer) $pos = -1
)

Devuelve un nuevo objeto PhpToken

### Parámetros

    id


      Una de las constantes T_* (ver [Lista de tokens del analizador](#tokens)), o un codepoint ASCII que representa un token de un solo carácter.






    text


      El contenido textual del token.






    line


      El número de línea (a partir de 1) del token.






    pos


      La posición de inicio (a partir de 0) en la cadena tokenizada (el número de bytes).


### Ver también

- [PhpToken::tokenize()](#phptoken.tokenize) - Separa el código fuente dado en tokens PHP, representado por objetos PhpToken.

# PhpToken::getTokenName

(PHP 8)

PhpToken::getTokenName — Devuelve el nombre del token.

### Descripción

public **PhpToken::getTokenName**(): [?](#language.types.null)[string](#language.types.string)

Devuelve el nombre del token.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un carácter ASCII para los tokens de un solo carácter,
o una de las constantes T\_\* para los tokens conocidos (ver [Lista de tokens del analizador](#tokens)),
o **[null](#constant.null)** para los tokens desconocidos.

### Ejemplos

**Ejemplo #1 Ejemplo de PhpToken::getTokenName()**

&lt;?php
// token conocido
$token = new PhpToken(T_ECHO, 'echo');
var_dump($token-&gt;getTokenName()); // -&gt; string(6) "T_ECHO"

// token de un solo carácter
$token = new PhpToken(ord(';'), ';');
var_dump($token-&gt;getTokenName()); // -&gt; string(1) ";"

// token desconocido
$token = new PhpToken(10000 , "\0");
var_dump($token-&gt;getTokenName()); // -&gt; NULL

### Ver también

- [PhpToken::tokenize()](#phptoken.tokenize) - Separa el código fuente dado en tokens PHP, representado por objetos PhpToken.

- [token_name()](#function.token-name) - Obtiene el nombre simbólico de un token PHP dado

# PhpToken::is

(PHP 8)

PhpToken::is — Indica si el token es de un tipo dado.

### Descripción

public **PhpToken::is**([int](#language.types.integer)|[string](#language.types.string)|[array](#language.types.array) $kind): [bool](#language.types.boolean)

Indica si el token es de un tipo (kind) dado.

### Parámetros

     kind


       Un valor único para coincidir con el id o el contenido textual del token, o un array de estos valores.





### Valores devueltos

Un valor bool que indica si el token es del tipo dado.

### Ejemplos

**Ejemplo #1 Ejemplo dePhpToken::is()**

&lt;?php
$token = new PhpToken(T_ECHO, 'echo');
var_dump($token-&gt;is(T_ECHO)); // -&gt; bool(true)
var_dump($token-&gt;is('echo'));        // -&gt; bool(true)
var_dump($token-&gt;is(T_FOREACH)); // -&gt; bool(false)
var_dump($token-&gt;is('foreach')); // -&gt; bool(false)

**Ejemplo #2 Uso con array**

&lt;?php
function isClassType(PhpToken $token): bool {
return $token-&gt;is([T_CLASS, T_INTERFACE, T_TRAIT]);
}

$interface = new PhpToken(T_INTERFACE, 'interface');
var_dump(isClassType($interface)); // -&gt; bool(true)

$function = new PhpToken(T_FUNCTION, 'function');
var_dump(isClassType($function)); // -&gt; bool(false)

### Ver también

- [token_name()](#function.token-name) - Obtiene el nombre simbólico de un token PHP dado

# PhpToken::isIgnorable

(PHP 8)

PhpToken::isIgnorable — Indica si el token será ignorado por el analizador PHP.

### Descripción

public **PhpToken::isIgnorable**(): [bool](#language.types.boolean)

Indica si el token será ignorado por el analizador PHP.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Un valor booleano que indica si el token será ignorado por el analizador PHP (como los espacios o los comentarios).

### Ejemplos

**Ejemplo #1 Ejemplo de PhpToken::isIgnorable()**

&lt;?php
$echo = new PhpToken(T_ECHO, 'echo');
var_dump($echo-&gt;isIgnorable()); // -&gt; bool(false)

$space = new PhpToken(T_WHITESPACE, ' ');
var_dump($space-&gt;isIgnorable()); // -&gt; bool(true)

### Ver también

- [PhpToken::tokenize()](#phptoken.tokenize) - Separa el código fuente dado en tokens PHP, representado por objetos PhpToken.

# PhpToken::\_\_toString

(PHP 8)

PhpToken::\_\_toString — Devuelve el contenido textual del token.

### Descripción

public **PhpToken::\_\_toString**(): [string](#language.types.string)

Devuelve el contenido textual del token.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

El contenido textual del token.

### Ejemplos

**Ejemplo #1 Ejemplo de PhpToken::\_\_toString()**

&lt;?php
$token = new PhpToken(T_ECHO, 'echo');
echo $token;

Los ejemplos anteriores mostrarán:

echo

### Ver también

- [token_name()](#function.token-name) - Obtiene el nombre simbólico de un token PHP dado

# PhpToken::tokenize

(PHP 8)

PhpToken::tokenize — Separa el código fuente dado en tokens PHP, representado por objetos PhpToken.

### Descripción

public static **PhpToken::tokenize**([string](#language.types.string) $code, [int](#language.types.integer) $flags = 0): [array](#language.types.array)

Devuelve un array de objetos PhpToken que representan el código (code) dado.

### Parámetros

     code


       El código fuente PHP a analizar.






     flags


       Flags válidos:



        -

          **[TOKEN_PARSE](#constant.token-parse)** - Reconoce la posibilidad de usar
          palabras reservadas en contextos específicos.







### Valores devueltos

Un array de tokens PHP representado por instancias de PhpToken o de sus descendientes.
Este método devuelve static[] para que PhpToken pueda ser extendido de manera transparente.

### Ejemplos

**Ejemplo #1 Ejemplo de PhpToken::tokenize()**

&lt;?php
$tokens = PhpToken::tokenize('&lt;?php echo; ?&gt;');

foreach ($tokens as $token) {
    echo "Line {$token-&gt;line}: {$token-&gt;getTokenName()} ('{$token-&gt;text}')", PHP_EOL;
}

Los ejemplos anteriores mostrarán:

Line 1: T_OPEN_TAG ('&lt;?php ')
Line 1: T_ECHO ('echo')
Line 1: ; (';')
Line 1: T_WHITESPACE (' ')
Line 1: T_CLOSE_TAG ('?&gt;')

**Ejemplo #2 Extensión de PhpToken**

&lt;?php

class MyPhpToken extends PhpToken {
public function getUpperText() {
return strtoupper($this-&gt;text);
}
}

$tokens = MyPhpToken::tokenize('&lt;?php echo; ?&gt;');
echo "'{$tokens[0]-&gt;getUpperText()}'";

Los ejemplos anteriores mostrarán:

'&lt;?PHP '

### Ver también

- [token_get_all()](#function.token-get-all) - Divide la fuente dada en tokens PHP

## Tabla de contenidos

- [PhpToken::\_\_construct](#phptoken.construct) — Devuelve un nuevo objeto PhpToken
- [PhpToken::getTokenName](#phptoken.gettokenname) — Devuelve el nombre del token.
- [PhpToken::is](#phptoken.is) — Indica si el token es de un tipo dado.
- [PhpToken::isIgnorable](#phptoken.isignorable) — Indica si el token será ignorado por el analizador PHP.
- [PhpToken::\_\_toString](#phptoken.tostring) — Devuelve el contenido textual del token.
- [PhpToken::tokenize](#phptoken.tokenize) — Separa el código fuente dado en tokens PHP, representado por objetos PhpToken.

# Funciones Tokenizer

# token_get_all

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

token_get_all — Divide la fuente dada en tokens PHP

### Descripción

**token_get_all**([string](#language.types.string) $code, [int](#language.types.integer) $flags = 0): [array](#language.types.array)

**token_get_all()** parsea el string de la source dada
en tokens PHP usando el escaneador de léxico de Zend Engine.

Para ver la lista de los tokens analizados, vea [Lista de tokens del analizador](#tokens), o use
[token_name()](#function.token-name) para traducir un valor token en su representación en string.

### Parámetros

     source


       La fuente PHP a analizar.






     flags


       Banderas válidas:



        -

          **[TOKEN_PARSE](#constant.token-parse)** - Reconoce la capacidad de usar palabras reservadas en contextos específicos.








     flags


       Valores válidos:



        -

          **[TOKEN_PARSE](#constant.token-parse)** - Reconoce la capacidad de usar
           palabras reservadas en contextos específicos.







### Valores devueltos

Un array de tokens identificadores. Cada token identificador individual es al
mismo tiempo un carácter único (por ejemplo: ;, .,
&gt;, !, etc...),
un array de tres elementos conteniendo el índice de token en el elemento 0, el contenido
del string del token original en el elemento 1 y el número de línea en el elemento 2.

### Ejemplos

    **Ejemplo #1 token_get_all()** ejemplos

&lt;?php
$tokens = token_get_all('&lt;?php echo; ?&gt;');

foreach ($tokens as $token) {
    if (is_array($token)) {
echo "Line {$token[2]}: ", token_name($token[0]), " ('{$token[1]}')", PHP_EOL;
}
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Line 1: T_OPEN_TAG ('&lt;?php ')
Line 1: T_ECHO ('echo')
Line 1: T_WHITESPACE (' ')
Line 1: T_CLOSE_TAG ('?&gt;')

    **Ejemplo #2 token_get_all()** ejemplo de uso incorrecto

&lt;?php
$tokens = token_get_all('/_ comment _/');

foreach ($tokens as $token) {
    if (is_array($token)) {
echo "Line {$token[2]}: ", token_name($token[0]), " ('{$token[1]}')", PHP_EOL;
}
}
?&gt;

    Resultado del ejemplo anterior es similar a:

Line 1: T_INLINE_HTML ('/_ comment _/')

Ten en cuenta en el ejemplo anterior que la cadena se analiza como
**[T_INLINE_HTML](#constant.t-inline-html)** en lugar del esperado
**[T_COMMENT](#constant.t-comment)**. Esto se debe a que no se utilizó ninguna etiqueta de apertura en el
código proporcionado. Esto sería equivalente a colocar un comentario fuera de las
etiquetas PHP en un archivo normal.

    **Ejemplo #3 token_get_all()** en un ejemplo de clase que usa una palabra reservada

&lt;?php

$source = &lt;&lt;&lt;'code'
&lt;?php

class A
{
const PUBLIC = 1;
}
code;

$tokens = token_get_all($source, TOKEN_PARSE);

foreach ($tokens as $token) {
    if (is_array($token)) {
echo token_name($token[0]) , PHP_EOL;
}
}

?&gt;

    Resultado del ejemplo anterior es similar a:

T_OPEN_TAG
T_WHITESPACE
T_CLASS
T_WHITESPACE
T_STRING
T_CONST
T_WHITESPACE
T_STRING
T_LNUMBER

Sin la bandera **[TOKEN_PARSE](#constant.token-parse)**, el penúltimo
token (**[T_STRING](#constant.t-string)**) habría sido
**[T_PUBLIC](#constant.t-public)**.

    **Ejemplo #4
     ejemplo de token_get_all()** usado en una clase con una palabra reservada

&lt;?php

$source = &lt;&lt;&lt;'code'
&lt;?php

class A
{
const PUBLIC = 1;
}
code;

$tokens = token_get_all($source, TOKEN_PARSE);

foreach ($tokens as $token) {
    if (is_array($token)) {
echo token_name($token[0]) , PHP_EOL;
}
}
?&gt;

    Resultado del ejemplo anterior es similar a:

T_OPEN_TAG
T_WHITESPACE
T_CLASS
T_WHITESPACE
T_STRING
T_CONST
T_WHITESPACE
T_STRING
T_LNUMBER

Sin el uso de **[TOKEN_PARSE](#constant.token-parse)**, el penúltimo token (**[T_STRING](#constant.t-string)**) hubiese sido
**[T_PUBLIC](#constant.t-public)**.

### Ver también

    - [PhpToken::tokenize()](#phptoken.tokenize) - Separa el código fuente dado en tokens PHP, representado por objetos PhpToken.

    - [token_name()](#function.token-name) - Obtiene el nombre simbólico de un token PHP dado

# token_name

(PHP 4 &gt;= 4.2.0, PHP 5, PHP 7, PHP 8)

token_name — Obtiene el nombre simbólico de un token PHP dado

### Descripción

**token_name**([int](#language.types.integer) $id): [string](#language.types.string)

**token_name()** obtiene el nombre simbólico para un valor de
id PHP.

### Parámetros

     id


       El valor token.





### Valores devueltos

El nombre simbólico para el id dado.

### Ejemplos

    **Ejemplo #1 token_name()** ejemplo

&lt;?php
// 260 es el valor de token para T_EVAL token
echo token_name(260); // -&gt; "T_EVAL"

// una constante token mapea a su propio nombre
echo token_name(T_FUNCTION); // -&gt; "T_FUNCTION"
?&gt;

### Ver también

- [Listado de Tokens Analizadores](#tokens)

- [PhpToken::getTokenName()](#phptoken.gettokenname) - Devuelve el nombre del token.

## Tabla de contenidos

- [token_get_all](#function.token-get-all) — Divide la fuente dada en tokens PHP
- [token_name](#function.token-name) — Obtiene el nombre simbólico de un token PHP dado

- [Introducción](#intro.tokenizer)
- [Instalación/Configuración](#tokenizer.setup)<li>[Instalación](#tokenizer.installation)
  </li>- [Constantes predefinidas](#tokenizer.constants)
- [Ejemplos](#tokenizer.examples)
- [PhpToken](#class.phptoken) — La clase PhpToken<li>[PhpToken::\_\_construct](#phptoken.construct) — Devuelve un nuevo objeto PhpToken
- [PhpToken::getTokenName](#phptoken.gettokenname) — Devuelve el nombre del token.
- [PhpToken::is](#phptoken.is) — Indica si el token es de un tipo dado.
- [PhpToken::isIgnorable](#phptoken.isignorable) — Indica si el token será ignorado por el analizador PHP.
- [PhpToken::\_\_toString](#phptoken.tostring) — Devuelve el contenido textual del token.
- [PhpToken::tokenize](#phptoken.tokenize) — Separa el código fuente dado en tokens PHP, representado por objetos PhpToken.
  </li>- [Funciones Tokenizer](#ref.tokenizer)<li>[token_get_all](#function.token-get-all) — Divide la fuente dada en tokens PHP
- [token_name](#function.token-name) — Obtiene el nombre simbólico de un token PHP dado
  </li>
