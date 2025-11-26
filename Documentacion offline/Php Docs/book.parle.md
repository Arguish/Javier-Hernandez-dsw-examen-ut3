# Análisis léxico y sintáctico

# Introducción

**Advertencia**
Esta extensión es _EXPERIMENTAL_. El comportamiento de esta extensión, los nombres de sus funciones,
y toda la documentación alrededor de esta extensión puede cambiar sin previo aviso en una próxima versión de PHP.
Esta extensión debe ser utilizada bajo su propio riesgo.

La extensión parle proporciona facilidades de lexing y parsing de uso general. La implementación se basa en las bibliotecas de [» estas librerías](http://www.benhanson.net/) y requiere un compilador compatible con [» C++14](http://en.cppreference.com/w/cpp/compiler_support). El análisis léxico se basa en la correspondencia regex, el análisis sintáctico es LALR(1). Los analizadores se generan sobre la marcha y pueden ser utilizados inmediatamente después de haber sido finalizados. Parle maneja el análisis léxico y sintáctico, la representación y el tratamiento de las estructuras de datos apropiadas son tarea del implementador. La serialización y la generación de código no son soportadas por la extensión, por el momento.

El analizador léxico es un proceso de división de una secuencia de caracteres en una lista de lexemas. La lista de lexemas puede ser utilizada posteriormente para el análisis sintáctico en relación con una gramática formal. Estas operaciones también son conocidas como análisis léxico (lexing) y análisis sintáctico (parsing). Esta documentación no tiene como objetivo proporcionar información exhaustiva sobre el lexing y el parsing. Buena información sobre estos temas está disponible en numerosos recursos en la red. Varios ejemplos de uso están incluidos para mostrar la funcionalidad. La extensión es útil para los desarrolladores PHP que deseen aprender o utilizar el análisis léxico y sintáctico. Las máquinas de estado y el análisis de gramática no tienen

Los casos de uso comunes para parle son cuando un formato de datos es demasiado complejo para ser manejado por la correspondencia regex con PCRE. La aplicación práctica es, por lo tanto, amplia. Ya sea un formato de datos específico, una modificación del comportamiento de las funciones existentes, o incluso un lenguaje de programación y más allá. Los métodos de ayuda como [Parle\Lexer::dump()](#parle-lexer.dump) para inspeccionar la máquina de estado generada, o [Parle\Parser::dump()](#parle-parser.dump) para inspeccionar la gramática generada, son útiles. El método [Parle\Parser::trace()](#parle-parser.trace) también puede ser utilizado para seguir la operación de análisis.

# Instalación/Configuración

## Tabla de contenidos

- [Requerimientos](#parle.requirements)
- [Instalación](#parle.installation)

    ## Requerimientos

    PHP 7.4 o superior es soportado.
    Un compilador C++14 es necesario. Una compilación exitosa de la extensión
    ha sido realizada con, al menos, clang 5.0, GCC 5.0 y Visual Studio 2015.

    ## Instalación

           Esta extensión [» PECL](https://pecl.php.net/) no está integrada en PHP.




        Información sobre la instalación de estas extensiones PECL
            puede ser encontrada en el capítulo del manual titulado [Instalación

    de extensiones PECL](#install.pecl). Otra información como notas sobre nuevas
    versiones, descargas, fuentes de archivos, información sobre los mantenedores
    así como un CHANGELOG, pueden ser encontradas aquí:
    [» https://pecl.php.net/package/parle](https://pecl.php.net/package/parle).

        <caption>**Opciones de configuración disponibles**</caption>



           OpciónDescripción






           --enable-parleActivación de la extensión parle.



           --enable-parle-utf32Activación del soporte interno UTF-32. Disponible desde parle 0.7.2.




# Constantes predefinidas

Estas constantes son definidas por esta
extensión, y solo están disponibles si esta extensión ha sido compilada con
PHP, o bien cargada en tiempo de ejecución.

    **[Parle\INTERNAL_UTF32](#constant.parle-internal-utf32)**
     [bool](#language.types.boolean)



     Flag que permite saber si el soporte interno UTF-32 ha sido compilado correctamente. Disponible a partir de parle 0.7.2.

# Correspondencia de patrón Parle

Parle soporta la correspondencia de patrón con expresiones regulares similares a flex.
Los siguientes conjuntos de caracteres POSIX también son soportados:
[:alnum:], [:alpha:], [:blank:], [:cntrl:], [:digit:], [:graph:], [:lower:], [:print:], [:punct:], [:space:], [:upper:], [:xdigit:].

Las clases de caracteres Unicode no están actualmente activadas por omisión, pase --enable-parle-utf32 para hacerlas disponibles.
Una codificación particular puede ser mapeada con una regex correctamente construida.
Por ejemplo, para corresponder al símbolo EURO codificado en UTF-8, la expresión regular [\xe2][\x82][\xac] puede ser utilizada.
El patrón para una cadena codificada en UTF-8 podría ser [ -\x7f]{+}[\x80-\xbf]{+}[\xc2-\xdf]{+}[\xe0-\xef]{+}[\xf0-\xff]+.

## Representación de caracteres

    <caption>**Representación de caracteres**</caption>



       SecuenciaDescripción






       \aAlerta (campana).



       \bRetroceso (Backspace).



       \eCarácter ESC, \x1b.



       \nNueva línea.



       \rRetorno de carro.



       \fSalto de página, \x0c.



       \tTabulación horizontal, \x09.



       \vTabulación vertical, \x0b.



       \octCarácter especificado por un código octal de tres dígitos.



       \xhexCarácter especificado por un código hexadecimal.



       \ccharCarácter de control nombrado.




## Clases de caracteres

    <caption>**Clases de caracteres**</caption>



       SecuenciaDescripción






       [...]Un solo carácter listado o contenido en un rango listado. Los rangos pueden ser combinados con los operadores {+} y {-}. Por ejemplo [a-z]{+}[0-9] es lo mismo que [0-9a-z] y [a-z]{-}[aeiou] es lo mismo que [b-df-hj-np-tv-z].



       [^...]Un solo carácter no listado y no contenido en un rango listado.



       .Cualquier carácter, por omisión [^\n].



       \dCarácter numérico, [0-9].



       \DCarácter no numérico, [^0-9].



       \sCarácter de espacio en blanco, [ \t\n\r\f\v].



       \SCarácter no de espacio en blanco, [^ \t\n\r\f\v].



       \wCarácter de palabra, [a-zA-Z0-9_].



       \WCarácter de no palabra, [^a-zA-Z0-9_].




## Clases de caracteres Unicode

    <caption>**Clases de caracteres Unicode**</caption>



       SecuenciaDescripción






       \p{C}Otro.



       \p{Cc}Otro, control.



       \p{Cf}Otro, formato.



       \p{Co}Otro, uso privado.



       \p{Cs}Otro, sustituto.



       \p{L}Letra.



       \p{LC}Letra, con casos.



       \p{Ll}Letra, minúscula.



       \p{Lm}Letra, modificada.



       \p{Lo}Letra, otra.



       \p{Lt}Letra, de título.



       \p{Lu}Letra, mayúscula.



       \p{M}Marca.



       \p{Mc}Marca, espacio combinado.



       \p{Me}Marca, encuadre.



       \p{Mn}Marca, no espaciada.



       \p{N}Número.



       \p{Nd}Número, dígito decimal.



       \p{Nl}Número, letra.



       \p{No}Número, otro.



       \p{P}Puntuación.



       \p{Pc}Puntuación, conector.



       \p{Pd}Puntuación, guion.



       \p{Pe}Puntuación, cierre.



       \p{Pf}Puntuación, comilla final.



       \p{Pi}Puntuación, comilla inicial.



       \p{Po}Puntuación, otra.



       \p{Ps}Puntuación, apertura.



       \p{S}Símbolo.



       \p{Sc}Símbolo, moneda.



       \p{Sk}Símbolo, modificado.



       \p{Sm}Símbolo, matemático.



       \p{So}Símbolo, otro.



       \p{Z}Separador.



       \p{Zl}Separador, línea.



       \p{Zp}Separador, párrafo.



       \p{Zs}Separador, espacio.




Estas clases de caracteres solo están disponibles si la opción --enable-parle-utf32 ha sido pasada durante la compilación.

## Alternancia y repetición

    <caption>**Alternancia y repetición**</caption>



       SecuenciaGreedyDescripción






       ...|...-Probar los subpatrones en alternancia.



       *yesCorresponde 0 o más veces.



       +yesCorresponde 1 o más veces.



       ?yesCorresponde 0 o 1 vez.



       {n}noCorresponde exactamente n veces.



       {n,}noCorresponde al menos n veces.



       {n,m}yesCorresponde al menos n veces pero no más de m veces.



       *?noCorresponde 0 o más veces.



       +?noCorresponde 1 o más veces.



       ??noCorresponde 0 o 1 vez.



       {n,}?noCorresponde al menos n veces.



       {n,m}?noCorresponde al menos n veces pero no más de m veces.



       {MACRO}-Incluye la regex MACRO en la regex actual.




## Ancla

    <caption>**Ancla**</caption>



       SecuenciaDescripción






       ^Comienza por una cadena o después de un retorno de línea.



       $Termina por una cadena o antes de un retorno de línea.




## Agrupamiento

    <caption>**Agrupamiento**</caption>



       Secuencia
       Descripción






       (...)
       Agrupa una expresión regular para modificar el orden de evaluación.



       (?r-s:pattern)


         Aplica la opción r y omite la opción s al interpretar el patrón.
         Las opciones pueden ser cero o más de los caracteres i, s o x.


         i significa insensible a mayúsculas y minúsculas.


         -i significa sensible a mayúsculas y minúsculas.


         s modifica el significado de . para que corresponda a cualquier carácter.


         -s modifica el significado de . para que corresponda a cualquier carácter excepto \n.


         x ignora los comentarios y los espacios en los patrones.
         Los espacios son ignorados excepto si están escapados por una barra invertida, contenidos en ""s,
         o aparecen dentro de un rango de caracteres.


         Estas opciones pueden ser aplicadas globalmente al nivel de las reglas pasando una combinación de los indicadores de bits al analizador léxico.





       (?# comment )
       Omite todo lo que está en (). El primer carácter ) encontrado termina el patrón. No es posible para el comentario contener un carácter ). El comentario puede extenderse sobre varias líneas.




# Ejemplos

## Tabla de contenidos

- [Ejemplos de análisis léxico (Lexer)](#parle.examples.lexer)
- [Ejemplos de análisis sintáctico (Parser)](#parle.examples.parser)

    ## Ejemplos de análisis léxico (Lexer)

    **Ejemplo #1 Tokenizar una lista de enteros separados por comas**

&lt;?php

use Parle\Token;
use Parle\Lexer;
use Parle\LexerException;

/_ name =&gt; id _/
$token = array(
        "COMMA" =&gt; 1,
        "CRLF" =&gt; 2,
        "DECIMAL" =&gt; 3,
);
/* id =&gt; name */
$tokenIdToName = array_flip($token);

$lex = new Lexer;
$lex-&gt;push("[\x2c]", $token["COMMA"]);
$lex-&gt;push("[\r][\n]", $token["CRLF"]);
$lex-&gt;push("[\d]+", $token["DECIMAL"]);
$lex-&gt;build();

$in = "0,1,2\r\n3,42,5\r\n6,77,8\r\n";

$lex-&gt;consume($in);

do {
$lex-&gt;advance();
$tok = $lex-&gt;getToken();

        if (Token::UNKNOWN == $tok-&gt;id) {
                throw new LexerException("Unknown token '{$tok-&gt;value}' at offset {$lex-&gt;marker}.");
        }

        echo "TOKEN: ", $tokenIdToName[$tok-&gt;id], PHP_EOL;

} while (Token::EOI != $tok-&gt;id);

**Ejemplo #2 Tokenizar una instrucción de asignación**

&lt;?php

use Parle\{Token, Lexer};

$lex = new Lexer;

$lex-&gt;push("\$[a-zA-Z_][a-zA-Z0-9_]*", 1);
$lex-&gt;push("=", 2);
$lex-&gt;push("\d+", 3);
$lex-&gt;push(";", 4);

$lex-&gt;build();

$lex-&gt;consume('$x = 42; $y = 24;');

do {
$lex-&gt;advance();
    $tok = $lex-&gt;getToken();
    var_dump($tok);
} while (Token::EOI != $tok-&gt;id);

## Ejemplos de análisis sintáctico (Parser)

**Ejemplo #1 Calculadora simple**

&lt;?php

use Parle\{Parser, ParserException, Lexer, Token};

$p = new Parser;
$p-&gt;token("INTEGER");
$p-&gt;left("'+' '-' '\*' '/'");

$p-&gt;push("start", "exp");
$prod_add = $p-&gt;push("exp", "exp '+' exp");
$prod_sub = $p-&gt;push("exp", "exp '-' exp");
$prod_mul = $p-&gt;push("exp", "exp '*' exp");
$prod_div = $p-&gt;push("exp", "exp '/' exp");
$p-&gt;push("exp", "INTEGER"); /_ Production index unused. _/

$p-&gt;build();

$lex = new Lexer;
$lex-&gt;push("[+]", $p-&gt;tokenId("'+'"));
$lex-&gt;push("[-]", $p-&gt;tokenId("'-'"));
$lex-&gt;push("[*]", $p-&gt;tokenId("'*'"));
$lex-&gt;push("[/]", $p-&gt;tokenId("'/'"));
$lex-&gt;push("\\d+", $p-&gt;tokenId("INTEGER"));
$lex-&gt;push("\\s+", Token::SKIP);

$lex-&gt;build();

$exp = array(
"1 + 1",
"33 / 10",
"100 \* 45",
"17 - 45",
);

foreach ($exp as $in) {
    if (!$p-&gt;validate($in, $lex)) {
throw new ParserException("Failed to validate input");
}

    $p-&gt;consume($in, $lex);

    while (Parser::ACTION_ERROR != $p-&gt;action &amp;&amp; Parser::ACTION_ACCEPT != $p-&gt;action) {
        switch ($p-&gt;action) {
            case Parser::ACTION_ERROR:
                throw new ParserException("Parser error");
                break;
            case Parser::ACTION_SHIFT:
            case Parser::ACTION_GOTO:
            case Parser::ACTION_ACCEPT:
                break;
            case Parser::ACTION_REDUCE:
                switch ($p-&gt;reduceId) {
                    case $prod_add:
                        $l = $p-&gt;sigil(0);
                        $r = $p-&gt;sigil(2);
                        echo "$l + $r = " . ($l + $r) . "\n";
                        break;
                    case $prod_sub:
                        $l = $p-&gt;sigil(0);
                        $r = $p-&gt;sigil(2);
                        echo "$l - $r = " . ($l - $r) . "\n";
                        break;
                    case $prod_mul:
                        $l = $p-&gt;sigil(0);
                        $r = $p-&gt;sigil(2);
                        echo "$l * $r = " . ($l * $r) . "\n";
                        break;
                    case $prod_div:
                        $l = $p-&gt;sigil(0);
                        $r = $p-&gt;sigil(2);
                    echo "$l / $r = " . ($l / $r) . "\n";
                        break;
            }
            break;
        }
        $p-&gt;advance();
    }

}

**Ejemplo #2 Analizar una frase para extraer las palabras**

&lt;?php

use Parle\{Lexer, Token, Parser, ParserException};

$p = new Parser;
$p-&gt;token("WORD");
$p-&gt;push("START", "SENTENCE");
$p-&gt;push("SENTENCE", "WORDS");
$prod_word_0 = $p-&gt;push("WORDS", "WORDS WORD");
$prod_word_1 = $p-&gt;push("WORDS", "WORD");
$p-&gt;build();

$lex = new Lexer;
$lex-&gt;push("[^\s]{-}[\.,\:\;\?]+", $p-&gt;tokenId("WORD"));
$lex-&gt;push("[\s\.,\:\;\?]+", Token::SKIP);
$lex-&gt;build();

$in = "Dis-moi où est ton papa?";
$p-&gt;consume($in, $lex);
do {
    switch ($p-&gt;action) {
case Parser::ACTION_ERROR:
throw new ParserException("Error");
break;
case Parser::ACTION_SHIFT:
case Parser::ACTION_GOTO:
/_ var_dump($p-&gt;trace());_/
break;
case Parser::ACTION_REDUCE:
$rid = $p-&gt;reduceId();
        if ($rid == $prod_word_1) {
            var_dump($p-&gt;sigil(0));
} if ($rid == $prod_word_0) {
            var_dump($p-&gt;sigil(1));
}
break;
}
$p-&gt;advance();
} while (Parser::ACTION_ACCEPT != $p-&gt;action);

# La clase Parle\Lexer

(PECL parle &gt;= 0.5.1)

## Introducción

    Clase de análisis léxico de estado único. Los lexemas pueden ser definidos sobre la marcha. Si la instancia particular del lexer está destinada a ser utilizada con [Parle\Parser](#class.parle-parser), los identificadores de tokens deben ser tomados de allí. De lo contrario, pueden proporcionarse identificadores de tokens arbitrarios. Este lexer puede ofrecer cierta ventaja de rendimiento en comparación con [Parle\RLexer](#class.parle-rlexer), si no se necesitan múltiples estados. Es importante señalar que [Parle\RParser](#class.parle-rparser) no es compatible con este lexer.

## Sinopsis de la Clase

    ****




      class **Parle\Lexer**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [ICASE](#parle-lexer.constants.icase) = 1;

    const
     [int](#language.types.integer)
      [DOT_NOT_LF](#parle-lexer.constants.dot-not-lf) = 2;

    const
     [int](#language.types.integer)
      [DOT_NOT_CRLF](#parle-lexer.constants.dot-not-cr-lf) = 4;

    const
     [int](#language.types.integer)
      [SKIP_WS](#parle-lexer.constants.skip-ws) = 8;

    const
     [int](#language.types.integer)
      [MATCH_ZERO_LEN](#parle-lexer.constants.match-zero-len) = 16;


    /* Propiedades */
    public
     [bool](#language.types.boolean)
      [$bol](#parle-lexer.props.bol) = **[false](#constant.false)**;

    public
     [int](#language.types.integer)
      [$flags](#parle-lexer.props.flags) = 0;

    public
     [int](#language.types.integer)
      [$state](#parle-lexer.props.state) = 0;

    public
     [int](#language.types.integer)
      [$marker](#parle-lexer.props.marker) = 0;

    public
     [int](#language.types.integer)
      [$cursor](#parle-lexer.props.cursor) = 0;


    /* Métodos */

public [advance](#parle-lexer.advance)(): [void](language.types.void.html)
public [build](#parle-lexer.build)(): [void](language.types.void.html)
public [callout](#parle-lexer.callout)([int](#language.types.integer) $id, [callable](#language.types.callable) $callback): [void](language.types.void.html)
public [consume](#parle-lexer.consume)([string](#language.types.string) $data): [void](language.types.void.html)
public [dump](#parle-lexer.dump)(): [void](language.types.void.html)
public [getToken](#parle-lexer.gettoken)(): [Parle\Token](#class.parle-token)
public [insertMacro](#parle-lexer.insertmacro)([string](#language.types.string) $name, [string](#language.types.string) $regex): [void](language.types.void.html)
public [push](#parle-lexer.push)([string](#language.types.string) $regex, [int](#language.types.integer) $id): [void](language.types.void.html)
public [reset](#parle-lexer.reset)([int](#language.types.integer) $pos): [void](language.types.void.html)

}

## Constantes predefinidas

     **[Parle\Lexer::ICASE](#parle-lexer.constants.icase)**








     **[Parle\Lexer::DOT_NOT_LF](#parle-lexer.constants.dot-not-lf)**








     **[Parle\Lexer::DOT_NOT_CRLF](#parle-lexer.constants.dot-not-crlf)**








     **[Parle\Lexer::SKIP_WS](#parle-lexer.constants.skip-ws)**








     **[Parle\Lexer::MATCH_ZERO_LEN](#parle-lexer.constants.match-zero-len)**






## Propiedades

     bol

      Indicador de inicio de entrada.





     flags

      Flags del lexer.





     state

      Estado actual del lexer, solo lectura.





     marker

      Posición de la última coincidencia de token, solo lectura.





     cursor

      Desplazamiento de entrada actual, solo lectura.




# Parle\Lexer::advance

(PECL parle &gt;= 0.5.1)

Parle\Lexer::advance — Avanzar a la regla siguiente del lexer

### Descripción

public **Parle\Lexer::advance**(): [void](language.types.void.html)

Avanza a la regla siguiente y prepara los datos del token resultante.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# Parle\Lexer::build

(PECL parle &gt;= 0.5.1)

Parle\Lexer::build — Finaliza el conjunto de reglas del lexer

### Descripción

public **Parle\Lexer::build**(): [void](language.types.void.html)

Las reglas, previamente añadidas con [Parle\Lexer::push()](#parle-lexer.push), son finalizadas. Esta llamada de método debe realizarse después de que todas las reglas necesarias hayan sido añadidas. El conjunto de reglas se vuelve de solo lectura. El análisis léxico puede comenzar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# Parle\Lexer::callout

(PECL parle &gt;= 0.7.2)

Parle\Lexer::callout — Define una función de retrollamada de token

### Descripción

public **Parle\Lexer::callout**([int](#language.types.integer) $id, [callable](#language.types.callable) $callback): [void](language.types.void.html)

Define una función de retrollamada a invocar una vez que el lexer encuentre un token particular.

### Parámetros

    id


      El identificador del token.






    callback


      La función de retrollamada a invocar. La función de retrollamada no recibe ningún argumento y su valor de retorno es ignorado.


### Valores devueltos

No se retorna ningún valor.

# Parle\Lexer::consume

(PECL parle &gt;= 0.5.1)

Parle\Lexer::consume — Pasa los datos para el procesamiento

### Descripción

public **Parle\Lexer::consume**([string](#language.types.string) $data): [void](language.types.void.html)

Consume los datos para el análisis léxico.

### Parámetros

    data


      Los datos a analizar.


### Valores devueltos

No se retorna ningún valor.

# Parle\Lexer::dump

(PECL parle &gt;= 0.5.1)

Parle\Lexer::dump — Muestra la máquina de estado

### Descripción

public **Parle\Lexer::dump**(): [void](language.types.void.html)

Muestra la máquina de estado actual en la salida estándar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# Parle\Lexer::getToken

(PECL parle &gt;= 0.5.1)

Parle\Lexer::getToken — Devuelve el token actual

### Descripción

public **Parle\Lexer::getToken**(): [Parle\Token](#class.parle-token)

Devuelve el token actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una instancia de [Parle\Token](#class.parle-token).

# Parle\Lexer::insertMacro

(PECL parle &gt;= 0.5.1)

Parle\Lexer::insertMacro — Inserta una macro regex

### Descripción

public **Parle\Lexer::insertMacro**([string](#language.types.string) $name, [string](#language.types.string) $regex): [void](language.types.void.html)

Inserta una macro regex, que puede ser utilizada más tarde como un atajo e incluida en otras expresiones regulares.

### Parámetros

    name


      El nombre de la macro.






    regex


      La expresión regular.


### Valores devueltos

No se retorna ningún valor.

# Parle\Lexer::push

(PECL parle &gt;= 0.5.1)

Parle\Lexer::push — Añade una regla de análisis

### Descripción

public **Parle\Lexer::push**([string](#language.types.string) $regex, [int](#language.types.integer) $id): [void](language.types.void.html)

Añade un patrón para el reconocimiento de los lexemas.

### Parámetros

    regex


      Expresión regular utilizada para el reconocimiento de los lexemas.






    id


      El identificador del token. Si la instancia del analizador léxico está destinada a ser utilizada sola, puede ser un número arbitrario. Si la instancia del analizador léxico debe ser pasada al analizador, debe ser un identificador devuelto por [Parle\Parser::tokenid()](#parle-parser.tokenid).


### Valores devueltos

No se retorna ningún valor.

# Parle\Lexer::reset

(PECL parle &gt;= 0.7.1)

Parle\Lexer::reset — Reinicializa el analizador léxico

### Descripción

public **Parle\Lexer::reset**([int](#language.types.integer) $pos): [void](language.types.void.html)

Reinicializa el analizador léxico pasando opcionalmente la posición deseada.

### Parámetros

    pos


      La posición para reinicializar.


### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [Parle\Lexer::advance](#parle-lexer.advance) — Avanzar a la regla siguiente del lexer
- [Parle\Lexer::build](#parle-lexer.build) — Finaliza el conjunto de reglas del lexer
- [Parle\Lexer::callout](#parle-lexer.callout) — Define una función de retrollamada de token
- [Parle\Lexer::consume](#parle-lexer.consume) — Pasa los datos para el procesamiento
- [Parle\Lexer::dump](#parle-lexer.dump) — Muestra la máquina de estado
- [Parle\Lexer::getToken](#parle-lexer.gettoken) — Devuelve el token actual
- [Parle\Lexer::insertMacro](#parle-lexer.insertmacro) — Inserta una macro regex
- [Parle\Lexer::push](#parle-lexer.push) — Añade una regla de análisis
- [Parle\Lexer::reset](#parle-lexer.reset) — Reinicializa el analizador léxico

# La clase Parle\RLexer

(PECL parle &gt;= 0.5.1)

## Introducción

    Clase de análisis léxico de múltiples estados. Los lexemas pueden ser definidos sobre la marcha. Si la instancia particular del lexer está destinada a ser utilizada con [Parle\RParser](#class.parle-rparser), los identificadores de tokens deben ser tomados de allí. De lo contrario, se pueden proporcionar identificadores de tokens arbitrarios. Es importante señalar que [Parle\Parser](#class.parle-parser) no es compatible con este lexer.

## Sinopsis de la Clase

    ****




      class **Parle\RLexer**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [ICASE](#parle-rlexer.constants.icase) = 1;

    const
     [int](#language.types.integer)
      [DOT_NOT_LF](#parle-rlexer.constants.dot-not-lf) = 2;

    const
     [int](#language.types.integer)
      [DOT_NOT_CRLF](#parle-rlexer.constants.dot-not-cr-lf) = 4;

    const
     [int](#language.types.integer)
      [SKIP_WS](#parle-rlexer.constants.skip-ws) = 8;

    const
     [int](#language.types.integer)
      [MATCH_ZERO_LEN](#parle-rlexer.constants.match-zero-len) = 16;


    /* Propiedades */
    public
     [bool](#language.types.boolean)
      [$bol](#parle-rlexer.props.bol) = **[false](#constant.false)**;

    public
     [int](#language.types.integer)
      [$flags](#parle-rlexer.props.flags) = 0;

    public
     [int](#language.types.integer)
      [$state](#parle-rlexer.props.state) = 0;

    public
     [int](#language.types.integer)
      [$marker](#parle-rlexer.props.marker) = 0;

    public
     [int](#language.types.integer)
      [$cursor](#parle-rlexer.props.cursor) = 0;


    /* Métodos */

public [advance](#parle-rlexer.advance)(): [void](language.types.void.html)
public [build](#parle-rlexer.build)(): [void](language.types.void.html)
public [callout](#parle-rlexer.callout)([int](#language.types.integer) $id, [callable](#language.types.callable) $callback): [void](language.types.void.html)
public [consume](#parle-rlexer.consume)([string](#language.types.string) $data): [void](language.types.void.html)
public [dump](#parle-rlexer.dump)(): [void](language.types.void.html)
public [getToken](#parle-rlexer.gettoken)(): [Parle\Token](#class.parle-token)
public [insertMacro](#parle-rlexer.insertmacro)([string](#language.types.string) $name, [string](#language.types.string) $regex): [void](language.types.void.html)
public [push](#parle-rlexer.push)([string](#language.types.string) $regex, [int](#language.types.integer) $id): [void](language.types.void.html)
public [push](#parle-rlexer.push)(
    [string](#language.types.string) $state,
    [string](#language.types.string) $regex,
    [int](#language.types.integer) $id,
    [string](#language.types.string) $newState
): [void](language.types.void.html)
public [push](#parle-rlexer.push)([string](#language.types.string) $state, [string](#language.types.string) $regex, [string](#language.types.string) $newState): [void](language.types.void.html)
public [pushState](#parle-rlexer.pushstate)([string](#language.types.string) $state): [int](#language.types.integer)
public [reset](#parle-rlexer.reset)([int](#language.types.integer) $pos): [void](language.types.void.html)

}

## Constantes predefinidas

     **[Parle\RLexer::ICASE](#parle-rlexer.constants.icase)**








     **[Parle\RLexer::DOT_NOT_LF](#parle-rlexer.constants.dot-not-lf)**








     **[Parle\RLexer::DOT_NOT_CRLF](#parle-rlexer.constants.dot-not-crlf)**








     **[Parle\RLexer::SKIP_WS](#parle-rlexer.constants.skip-ws)**








     **[Parle\RLexer::MATCH_ZERO_LEN](#parle-rlexer.constants.match-zero-len)**






## Propiedades

     bol

      Indicador de inicio de entrada.





     flags

      Flags del lexer.





     state

      Estado actual del lexer, de solo lectura.





     marker

      Posición de la última coincidencia de token, de solo lectura.





     cursor

      Desplazamiento de entrada actual, de solo lectura.




# Parle\RLexer::advance

(PECL parle &gt;= 0.5.1)

Parle\RLexer::advance — Procesa la regla siguiente del analizador

### Descripción

public **Parle\RLexer::advance**(): [void](language.types.void.html)

Procesa la regla siguiente del analizador y prepara los datos del token resultante.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# Parle\RLexer::build

(PECL parle &gt;= 0.5.1)

Parle\RLexer::build — Finaliza el conjunto de reglas del lexer

### Descripción

public **Parle\RLexer::build**(): [void](language.types.void.html)

Las reglas previamente añadidas con [Parle\RLexer::push()](#parle-rlexer.push) son finalizadas. Esta llamada de método debe realizarse después de que todas las reglas necesarias hayan sido añadidas. El conjunto de reglas se vuelve de solo lectura. El análisis léxico puede comenzar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# Parle\RLexer::callout

(PECL parle &gt;= 0.7.2)

Parle\RLexer::callout — Define una función de retrollamada de token

### Descripción

public **Parle\RLexer::callout**([int](#language.types.integer) $id, [callable](#language.types.callable) $callback): [void](language.types.void.html)

Define una función de retrollamada a invocar una vez que el lexer encuentre un token particular.

### Parámetros

    id


      El identificador del token.






    callback


      La función de retrollamada a invocar. La función de retrollamada no recibe ningún argumento y su valor de retorno es ignorado.


### Valores devueltos

No se retorna ningún valor.

# Parle\RLexer::consume

(PECL parle &gt;= 0.5.1)

Parle\RLexer::consume — Pasa los datos para su procesamiento

### Descripción

public **Parle\RLexer::consume**([string](#language.types.string) $data): [void](language.types.void.html)

Consume los datos para el análisis léxico.

### Parámetros

    data


      Los datos a analizar.


### Valores devueltos

No se retorna ningún valor.

# Parle\RLexer::dump

(PECL parle &gt;= 0.5.1)

Parle\RLexer::dump — Muestra la máquina de estado

### Descripción

public **Parle\RLexer::dump**(): [void](language.types.void.html)

Muestra la máquina de estado actual en la salida estándar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# Parle\RLexer::getToken

(PECL parle &gt;= 0.5.1)

Parle\RLexer::getToken — Devuelve el token actual

### Descripción

public **Parle\RLexer::getToken**(): [Parle\Token](#class.parle-token)

Devuelve el token actual.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una instancia de [Parle\Token](#class.parle-token).

# Parle\RLexer::insertMacro

(PECL parle &gt;= 0.5.1)

Parle\RLexer::insertMacro — Inserta una macro regex

### Descripción

public **Parle\RLexer::insertMacro**([string](#language.types.string) $name, [string](#language.types.string) $regex): [void](language.types.void.html)

Inserta una macro regex, que puede ser utilizada más tarde como un atajo e incluida en otras expresiones regulares.

### Parámetros

    name


      El nombre de la macro.






    regex


      La expresión regular.


### Valores devueltos

No se retorna ningún valor.

# Parle\RLexer::push

(PECL parle &gt;= 0.5.1)

Parle\RLexer::push — Añade una regla de análisis

### Descripción

public **Parle\RLexer::push**([string](#language.types.string) $regex, [int](#language.types.integer) $id): [void](language.types.void.html)

public **Parle\RLexer::push**(
    [string](#language.types.string) $state,
    [string](#language.types.string) $regex,
    [int](#language.types.integer) $id,
    [string](#language.types.string) $newState
): [void](language.types.void.html)

public **Parle\RLexer::push**([string](#language.types.string) $state, [string](#language.types.string) $regex, [string](#language.types.string) $newState): [void](language.types.void.html)

Añade un patrón para el reconocimiento de lexemas.

Un 'estado de inicio' y un 'estado de salida' pueden ser especificados utilizando una firma adecuada.
Un 'estado de inicio' (start state) y un 'estado de salida' (exit state) pueden ser especificados utilizando una firma adecuada.

### Parámetros

    regex


      Expresión regular utilizada para el reconocimiento de lexemas.






    id


      El identificador del token. Si la instancia del analizador léxico está destinada a ser utilizada sola, puede ser un número arbitrario. Si la instancia del analizador léxico debe ser pasada al analizador, debe ser un identificador devuelto por [Parle\RParser::tokenid()](#parle-rparser.tokenid).






    state


      Nombre del estado. Si '*' se utiliza como estado de inicio, entonces la regla se aplica a todos los estados del analizador léxico.






    newState


       El nuevo nombre del estado, después de la aplicación de la regla.




       Si '.' se especifica como estado de salida, entonces el estado del analizador léxico no se modifica cuando esta regla coincide. Un estado de salida con '&gt;' antes del nombre significa empujar. Utilice la firma sin id para la continuación o para comenzar la coincidencia, cuando se requiere una continuación o recursión.




       Si '&lt;' se especifica como estado de salida, esto significa extraer. En este caso, la firma que contiene el id puede ser utilizada para identificar la coincidencia. Es importante señalar que incluso en el caso de que un id sea especificado, la regla terminará primero cuando todas las empujes previas hayan sido eliminadas.





### Valores devueltos

No se retorna ningún valor.

# Parle\RLexer::pushState

(PECL parle &gt;= 0.5.1)

Parle\RLexer::pushState — Empuja un nuevo estado de inicio

### Descripción

public **Parle\RLexer::pushState**([string](#language.types.string) $state): [int](#language.types.integer)

Este analizador léxico puede tener más de una máquina de estados. Esto permite analizar diferentes tokens según el contexto, permitiendo así realizar un análisis sintáctico simple. Una vez empujado un estado, puede ser utilizado con una variante de firma [Parle\RLexer::push()](#parle-rlexer.push) adecuada.

### Parámetros

    state


      El nombre del estado.


### Valores devueltos

# Parle\RLexer::reset

(PECL parle &gt;= 0.7.1)

Parle\RLexer::reset — Reinicializa el analizador léxico

### Descripción

public **Parle\RLexer::reset**([int](#language.types.integer) $pos): [void](language.types.void.html)

Reinicializa el analizador léxico pasando opcionalmente la posición deseada.

### Parámetros

    pos


      La posición para reinicializar.


### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [Parle\RLexer::advance](#parle-rlexer.advance) — Procesa la regla siguiente del analizador
- [Parle\RLexer::build](#parle-rlexer.build) — Finaliza el conjunto de reglas del lexer
- [Parle\RLexer::callout](#parle-rlexer.callout) — Define una función de retrollamada de token
- [Parle\RLexer::consume](#parle-rlexer.consume) — Pasa los datos para su procesamiento
- [Parle\RLexer::dump](#parle-rlexer.dump) — Muestra la máquina de estado
- [Parle\RLexer::getToken](#parle-rlexer.gettoken) — Devuelve el token actual
- [Parle\RLexer::insertMacro](#parle-rlexer.insertmacro) — Inserta una macro regex
- [Parle\RLexer::push](#parle-rlexer.push) — Añade una regla de análisis
- [Parle\RLexer::pushState](#parle-rlexer.pushstate) — Empuja un nuevo estado de inicio
- [Parle\RLexer::reset](#parle-rlexer.reset) — Reinicializa el analizador léxico

# La clase Parle\Parser

(PECL parle &gt;= 0.5.1)

## Introducción

    Clase de análisis sintáctico. Las reglas pueden ser definidas sobre la marcha. Una vez finalizada, se requiere una instancia de [Parle\Lexer](#class.parle-lexer) para proporcionar el flujo de tokens.

## Sinopsis de la Clase

    ****




      class **Parle\Parser**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [ACTION_ERROR](#parle-parser.constants.action-error) = 0;

    const
     [int](#language.types.integer)
      [ACTION_SHIFT](#parle-parser.constants.action-shift) = 1;

    const
     [int](#language.types.integer)
      [ACTION_REDUCE](#parle-parser.constants.action-reduce) = 2;

    const
     [int](#language.types.integer)
      [ACTION_GOTO](#parle-parser.constants.action-goto) = 3;

    const
     [int](#language.types.integer)
      [ACTION_ACCEPT](#parle-parser.constants.action-accept) = 4;

    const
     [int](#language.types.integer)
      [ERROR_SYNTAX](#parle-parser.constants.error-syntax) = 0;

    const
     [int](#language.types.integer)
      [ERROR_NON_ASSOCIATIVE](#parle-parser.constants.error-non-associative) = 1;

    const
     [int](#language.types.integer)
      [ERROR_UNKNOWN_TOKEN](#parle-parser.constants.error-unknown-token) = 2;


    /* Propiedades */
    public
     [int](#language.types.integer)
      [$action](#parle-parser.props.action) = 0;

    public
     [int](#language.types.integer)
      [$reduceId](#parle-parser.props.reduceId) = 0;


    /* Métodos */

public [advance](#parle-parser.advance)(): [void](language.types.void.html)
public [build](#parle-parser.build)(): [void](language.types.void.html)
public [consume](#parle-parser.consume)([string](#language.types.string) $data, [Parle\Lexer](#class.parle-lexer) $lexer): [void](language.types.void.html)
public [dump](#parle-parser.dump)(): [void](language.types.void.html)
public [errorInfo](#parle-parser.errorinfo)(): [Parle\ErrorInfo](#class.parle-errorinfo)
public [left](#parle-parser.left)([string](#language.types.string) $tok): [void](language.types.void.html)
public [nonassoc](#parle-parser.nonassoc)([string](#language.types.string) $tok): [void](language.types.void.html)
public [precedence](#parle-parser.precedence)([string](#language.types.string) $tok): [void](language.types.void.html)
public [push](#parle-parser.push)([string](#language.types.string) $name, [string](#language.types.string) $rule): [int](#language.types.integer)
public [reset](#parle-parser.reset)([int](#language.types.integer) $tokenId = ?): [void](language.types.void.html)
public [right](#parle-parser.right)([string](#language.types.string) $tok): [void](language.types.void.html)
public [sigil](#parle-parser.sigil)([int](#language.types.integer) $idx): [string](#language.types.string)
public [sigilCount](#parle-parser.sigilcount)(): [int](#language.types.integer)
public [sigilName](#parle-parser.sigilname)([int](#language.types.integer) $idx): [string](#language.types.string)
public [token](#parle-parser.token)([string](#language.types.string) $tok): [void](language.types.void.html)
public [tokenId](#parle-parser.tokenid)([string](#language.types.string) $tok): [int](#language.types.integer)
public [trace](#parle-parser.trace)(): [string](#language.types.string)
public [validate](#parle-parser.validate)([string](#language.types.string) $data, [Parle\Lexer](#class.parle-lexer) $lexer): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[Parle\Parser::ACTION_ERROR](#parle-parser.constants.action-error)**








     **[Parle\Parser::ACTION_SHIFT](#parle-parser.constants.action-shift)**








     **[Parle\Parser::ACTION_REDUCE](#parle-parser.constants.action-reduce)**








     **[Parle\Parser::ACTION_GOTO](#parle-parser.constants.action-goto)**








     **[Parle\Parser::ACTION_ACCEPT](#parle-parser.constants.action-accept)**








     **[Parle\Parser::ERROR_SYNTAX](#parle-parser.constants.error-syntax)**








     **[Parle\Parser::ERROR_NON_ASSOCIATIVE](#parle-parser.constants.error-non-associative)**








     **[Parle\Parser::ERROR_UNKNOWN_TOKEN](#parle-parser.constants.error-unknown-token)**






## Propiedades

     action

      Las acciones del analizador actual que corresponden a una de las constantes de clase de acción, en modo de solo lectura.





     reduceId

      Las reglas de gramática id justo tratadas en la acción de reducción. El valor corresponde a un token o a un identificador de producción. En modo de solo lectura.




# Parle\Parser::advance

(PECL parle &gt;= 0.5.1)

Parle\Parser::advance — Procesa la regla siguiente del analizador

### Descripción

public **Parle\Parser::advance**(): [void](language.types.void.html)

Procesa la regla siguiente del analizador.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# Parle\Parser::build

(PECL parle &gt;= 0.5.1)

Parle\Parser::build — Finaliza las reglas de gramática

### Descripción

public **Parle\Parser::build**(): [void](language.types.void.html)

Cada token y regla de gramática previamente añadidos son finalizados. El conjunto de reglas se vuelve de solo lectura y el analizador está listo para comenzar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# Parle\Parser::consume

(PECL parle &gt;= 0.5.1)

Parle\Parser::consume — Consume los datos para el procesamiento

### Descripción

public **Parle\Parser::consume**([string](#language.types.string) $data, [Parle\Lexer](#class.parle-lexer) $lexer): [void](language.types.void.html)

Consume los datos para el procesamiento.

### Parámetros

    data


      Los datos a analizar.






    lexer


      Un objeto lexer que contiene las reglas de análisis lexicales preparadas para la gramática particular.


### Valores devueltos

No se retorna ningún valor.

# Parle\Parser::dump

(PECL parle &gt;= 0.5.1)

Parle\Parser::dump — Muestra la gramática

### Descripción

public **Parle\Parser::dump**(): [void](language.types.void.html)

Muestra la gramática actual en la salida estándar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# Parle\Parser::errorInfo

(PECL parle &gt;= 0.5.1)

Parle\Parser::errorInfo — Recupera las informaciones de error

### Descripción

public **Parle\Parser::errorInfo**(): [Parle\ErrorInfo](#class.parle-errorinfo)

Recupera las informaciones de error en el caso de que **Parle\Parser::action()** hubiera devuelto la acción de error.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una instancia de [Parle\ErrorInfo](#class.parle-errorinfo).

# Parle\Parser::left

(PECL parle &gt;= 0.5.1)

Parle\Parser::left — Declara un token con asociatividad a la izquierda

### Descripción

public **Parle\Parser::left**([string](#language.types.string) $tok): [void](language.types.void.html)

Declara un token con asociatividad a la izquierda.

### Parámetros

    tok


      El nombre del token.


### Valores devueltos

No se retorna ningún valor.

# Parle\Parser::nonassoc

(PECL parle &gt;= 0.5.1)

Parle\Parser::nonassoc — Declara un token sin asociatividad

### Descripción

public **Parle\Parser::nonassoc**([string](#language.types.string) $tok): [void](language.types.void.html)

Declara un token, que solo puede aparecer una vez en la línea.

### Parámetros

    tok


      El nombre del token.


### Valores devueltos

No se retorna ningún valor.

# Parle\Parser::precedence

(PECL parle &gt;= 0.5.1)

Parle\Parser::precedence — Declara una regla de precedencia

### Descripción

public **Parle\Parser::precedence**([string](#language.types.string) $tok): [void](language.types.void.html)

Declara una regla de precedencia para un token ficticio. Esta regla puede ser utilizada más tarde en reglas de gramática específicas.

### Parámetros

    tok


      El nombre del token.


### Valores devueltos

No se retorna ningún valor.

# Parle\Parser::push

(PECL parle &gt;= 0.5.1)

Parle\Parser::push — Añade una regla de gramática

### Descripción

public **Parle\Parser::push**([string](#language.types.string) $name, [string](#language.types.string) $rule): [int](#language.types.integer)

Añade una regla de gramática. El identificador de producción devuelto puede ser utilizado más tarde en el proceso de análisis para identificar la regla correspondiente.

### Parámetros

    name


      El nombre de la regla.






    rule


      La regla a añadir. La sintaxis es compatible con Bison.


### Valores devueltos

Devuelve un [int](#language.types.integer) que representa el índice de la regla.

# Parle\Parser::reset

(PECL parle &gt;= 0.7.1)

Parle\Parser::reset — Reinicializa el estado del analizador

### Descripción

public **Parle\Parser::reset**([int](#language.types.integer) $tokenId = ?): [void](language.types.void.html)

Reinicializa el estado del analizador utilizando el identificador de token dado.

### Parámetros

    tokenId


      El identificador del token.


### Valores devueltos

No se retorna ningún valor.

# Parle\Parser::right

(PECL parle &gt;= 0.5.1)

Parle\Parser::right — Declara un token con asociatividad a la derecha

### Descripción

public **Parle\Parser::right**([string](#language.types.string) $tok): [void](language.types.void.html)

Declara un token con asociatividad a la derecha.

### Parámetros

    tok


      El nombre del token.


### Valores devueltos

No se retorna ningún valor.

# Parle\Parser::sigil

(PECL parle &gt;= 0.5.1)

Parle\Parser::sigil — Recupera una parte correspondiente de una regla

### Descripción

public **Parle\Parser::sigil**([int](#language.types.integer) $idx): [string](#language.types.string)

Recupera una parte correspondiente de una regla. Este método es equivalente a la funcionalidad de pseudo-variable en Bison.

### Parámetros

    idx


      El identificador de correspondencia, basado en cero.


### Valores devueltos

Devuelve una [string](#language.types.string) con la parte correspondiente.

# Parle\Parser::sigilCount

(PECL parle &gt;= 0.8.4)

Parle\Parser::sigilCount — Número de elementos en la regla correspondiente

### Descripción

public **Parle\Parser::sigilCount**(): [int](#language.types.integer)

Devuelve el número de elementos en la regla correspondiente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [int](#language.types.integer)

# Parle\Parser::sigilName

(PECL parle &gt;= 0.8.4)

Parle\Parser::sigilName — Recupera un nombre de regla o de token

### Descripción

public **Parle\Parser::sigilName**([int](#language.types.integer) $idx): [string](#language.types.string)

Recupera un nombre de regla parcial o de token correspondiente al índice de sigil.

### Parámetros

    idx


      El identificador de correspondencia, basado en cero.


### Valores devueltos

Devuelve un [string](#language.types.string) con la parte correspondiente.

# Parle\Parser::token

(PECL parle &gt;= 0.5.1)

Parle\Parser::token — Declara un token

### Descripción

public **Parle\Parser::token**([string](#language.types.string) $tok): [void](language.types.void.html)

Declara un token para utilizar en la gramática.

### Parámetros

    tok


      El nombre del token.


### Valores devueltos

No se retorna ningún valor.

# Parle\Parser::tokenId

(PECL parle &gt;= 0.5.1)

Parle\Parser::tokenId — Devuelve el identificador del token

### Descripción

public **Parle\Parser::tokenId**([string](#language.types.string) $tok): [int](#language.types.integer)

Devuelve el identificador del token nombrado.

### Parámetros

    tok


      El nombre utilizado en [Parle\Parser::token()](#parle-parser.token).


### Valores devueltos

Devuelve un [int](#language.types.integer) que representa el identificador del token.

# Parle\Parser::trace

(PECL parle &gt;= 0.5.1)

Parle\Parser::trace — Rastrea la operación del analizador

### Descripción

public **Parle\Parser::trace**(): [string](#language.types.string)

Recupera la descripción de la operación del analizador en curso. Esto puede ser particularmente útil para estudiar el analizador y optimizar la gramática.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [string](#language.types.string) con la información de rastreo.

# Parle\Parser::validate

(PECL parle &gt;= 0.5.1)

Parle\Parser::validate — Valida una entrada

### Descripción

public **Parle\Parser::validate**([string](#language.types.string) $data, [Parle\Lexer](#class.parle-lexer) $lexer): [bool](#language.types.boolean)

Valida una string de entrada. La string es analizada internamente, por lo que este método es útil para la validación rápida de la entrada.

### Parámetros

    data


      La string a validar.






    lexer


      Un objeto lexer que contiene las reglas de análisis léxico preparadas para la gramática particular.


### Valores devueltos

Devuelve un [bool](#language.types.boolean) que indica si la entrada cumple o no con las reglas definidas.

## Tabla de contenidos

- [Parle\Parser::advance](#parle-parser.advance) — Procesa la regla siguiente del analizador
- [Parle\Parser::build](#parle-parser.build) — Finaliza las reglas de gramática
- [Parle\Parser::consume](#parle-parser.consume) — Consume los datos para el procesamiento
- [Parle\Parser::dump](#parle-parser.dump) — Muestra la gramática
- [Parle\Parser::errorInfo](#parle-parser.errorinfo) — Recupera las informaciones de error
- [Parle\Parser::left](#parle-parser.left) — Declara un token con asociatividad a la izquierda
- [Parle\Parser::nonassoc](#parle-parser.nonassoc) — Declara un token sin asociatividad
- [Parle\Parser::precedence](#parle-parser.precedence) — Declara una regla de precedencia
- [Parle\Parser::push](#parle-parser.push) — Añade una regla de gramática
- [Parle\Parser::reset](#parle-parser.reset) — Reinicializa el estado del analizador
- [Parle\Parser::right](#parle-parser.right) — Declara un token con asociatividad a la derecha
- [Parle\Parser::sigil](#parle-parser.sigil) — Recupera una parte correspondiente de una regla
- [Parle\Parser::sigilCount](#parle-parser.sigilcount) — Número de elementos en la regla correspondiente
- [Parle\Parser::sigilName](#parle-parser.sigilname) — Recupera un nombre de regla o de token
- [Parle\Parser::token](#parle-parser.token) — Declara un token
- [Parle\Parser::tokenId](#parle-parser.tokenid) — Devuelve el identificador del token
- [Parle\Parser::trace](#parle-parser.trace) — Rastrea la operación del analizador
- [Parle\Parser::validate](#parle-parser.validate) — Valida una entrada

# La clase Parle\RParser

(PECL parle &gt;= 0.7.0)

## Introducción

    Clase de análisis sintáctico. Las reglas pueden ser definidas sobre la marcha. Una vez finalizada, se requiere una instancia de [Parle\RLexer](#class.parle-rlexer) para proporcionar el flujo de tokens.

## Sinopsis de la Clase

    ****




      class **Parle\RParser**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [ACTION_ERROR](#parle-rparser.constants.action-error) = 0;

    const
     [int](#language.types.integer)
      [ACTION_SHIFT](#parle-rparser.constants.action-shift) = 1;

    const
     [int](#language.types.integer)
      [ACTION_REDUCE](#parle-rparser.constants.action-reduce) = 2;

    const
     [int](#language.types.integer)
      [ACTION_GOTO](#parle-rparser.constants.action-goto) = 3;

    const
     [int](#language.types.integer)
      [ACTION_ACCEPT](#parle-rparser.constants.action-accept) = 4;

    const
     [int](#language.types.integer)
      [ERROR_SYNTAX](#parle-rparser.constants.error-syntax) = 0;

    const
     [int](#language.types.integer)
      [ERROR_NON_ASSOCIATIVE](#parle-rparser.constants.error-non-associative) = 1;

    const
     [int](#language.types.integer)
      [ERROR_UNKNOWN_TOKEN](#parle-rparser.constants.error-unknown-token) = 2;


    /* Propiedades */
    public
     [int](#language.types.integer)
      [$action](#parle-rparser.props.action) = 0;

    public
     [int](#language.types.integer)
      [$reduceId](#parle-rparser.props.reduceId) = 0;


    /* Métodos */

public [advance](#parle-rparser.advance)(): [void](language.types.void.html)
public [build](#parle-rparser.build)(): [void](language.types.void.html)
public [consume](#parle-rparser.consume)([string](#language.types.string) $data, [Parle\RLexer](#class.parle-rlexer) $rlexer): [void](language.types.void.html)
public [dump](#parle-rparser.dump)(): [void](language.types.void.html)
public [errorInfo](#parle-rparser.errorinfo)(): [Parle\ErrorInfo](#class.parle-errorinfo)
public [left](#parle-rparser.left)([string](#language.types.string) $tok): [void](language.types.void.html)
public [nonassoc](#parle-rparser.nonassoc)([string](#language.types.string) $tok): [void](language.types.void.html)
public [precedence](#parle-rparser.precedence)([string](#language.types.string) $tok): [void](language.types.void.html)
public [push](#parle-rparser.push)([string](#language.types.string) $name, [string](#language.types.string) $rule): [int](#language.types.integer)
public [reset](#parle-rparser.reset)([int](#language.types.integer) $tokenId = ?): [void](language.types.void.html)
public [right](#parle-rparser.right)([string](#language.types.string) $tok): [void](language.types.void.html)
public [sigil](#parle-rparser.sigil)([int](#language.types.integer) $idx = ?): [string](#language.types.string)
public [sigilCount](#parle-rparser.sigilcount)(): [int](#language.types.integer)
public [sigilName](#parle-rparser.sigilname)([int](#language.types.integer) $idx): [string](#language.types.string)
public [token](#parle-rparser.token)([string](#language.types.string) $tok): [void](language.types.void.html)
public [tokenId](#parle-rparser.tokenid)([string](#language.types.string) $tok): [int](#language.types.integer)
public [trace](#parle-rparser.trace)(): [string](#language.types.string)
public [validate](#parle-rparser.validate)([string](#language.types.string) $data, [Parle\RLexer](#class.parle-rlexer) $lexer): [bool](#language.types.boolean)

}

## Constantes predefinidas

     **[Parle\RParser::ACTION_ERROR](#parle-rparser.constants.action-error)**








     **[Parle\RParser::ACTION_SHIFT](#parle-rparser.constants.action-shift)**








     **[Parle\RParser::ACTION_REDUCE](#parle-rparser.constants.action-reduce)**








     **[Parle\RParser::ACTION_GOTO](#parle-rparser.constants.action-goto)**








     **[Parle\RParser::ACTION_ACCEPT](#parle-rparser.constants.action-accept)**








     **[Parle\RParser::ERROR_SYNTAX](#parle-rparser.constants.error-syntax)**








     **[Parle\RParser::ERROR_NON_ASSOCIATIVE](#parle-rparser.constants.error-non-associative)**








     **[Parle\RParser::ERROR_UNKNOWN_TOKEN](#parle-rparser.constants.error-unknown-token)**






## Propiedades

     action

      Las acciones del parser actual que corresponden a una de las constantes de clase de acción, en modo de solo lectura.





     reduceId

      Las reglas de gramática id justo tratadas en la acción de reducción. El valor corresponde a un token o a un identificador de producción. En modo de solo lectura.




# Parle\RParser::advance

(PECL parle &gt;= 0.7.0)

Parle\RParser::advance — Procesa la regla siguiente del analizador

### Descripción

public **Parle\RParser::advance**(): [void](language.types.void.html)

Procesa la regla siguiente del analizador.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# Parle\RParser::build

(PECL parle &gt;= 0.7.0)

Parle\RParser::build — Finaliza las reglas de gramática

### Descripción

public **Parle\RParser::build**(): [void](language.types.void.html)

Cada token y regla de gramática previamente añadidos se finalizan. El conjunto de reglas se vuelve de solo lectura y el analizador está listo para iniciar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# Parle\RParser::consume

(PECL parle &gt;= 0.7.0)

Parle\RParser::consume — Consume los datos para el procesamiento

### Descripción

public **Parle\RParser::consume**([string](#language.types.string) $data, [Parle\RLexer](#class.parle-rlexer) $rlexer): [void](language.types.void.html)

Consume los datos para el procesamiento.

### Parámetros

    data


      Los datos a analizar.






    lexer


      Un objeto lexer que contiene las reglas de análisis léxicas preparadas para la gramática particular.


### Valores devueltos

No se retorna ningún valor.

# Parle\RParser::dump

(PECL parle &gt;= 0.7.0)

Parle\RParser::dump — Muestra la gramática

### Descripción

public **Parle\RParser::dump**(): [void](language.types.void.html)

Muestra la gramática actual en la salida estándar.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# Parle\RParser::errorInfo

(PECL parle &gt;= 0.7.0)

Parle\RParser::errorInfo — Recupera las informaciones de error

### Descripción

public **Parle\RParser::errorInfo**(): [Parle\ErrorInfo](#class.parle-errorinfo)

Recupera las informaciones de error en el caso de que **Parle\RParser::action()** hubiera devuelto la acción de error.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve una instancia de [Parle\ErrorInfo](#class.parle-errorinfo).

# Parle\RParser::left

(PECL parle &gt;= 0.7.0)

Parle\RParser::left — Declara un token con asociatividad a la izquierda

### Descripción

public **Parle\RParser::left**([string](#language.types.string) $tok): [void](language.types.void.html)

Declara un token con asociatividad a la izquierda.

### Parámetros

    tok


      El nombre del token.


### Valores devueltos

No se retorna ningún valor.

# Parle\RParser::nonassoc

(PECL parle &gt;= 0.7.0)

Parle\RParser::nonassoc — Declara un token sin asociatividad

### Descripción

public **Parle\RParser::nonassoc**([string](#language.types.string) $tok): [void](language.types.void.html)

Declara un token, que solo puede aparecer una vez en la línea.

### Parámetros

    tok


      El nombre del token.


### Valores devueltos

No se retorna ningún valor.

# Parle\RParser::precedence

(PECL parle &gt;= 0.7.0)

Parle\RParser::precedence — Declara una regla de precedencia

### Descripción

public **Parle\RParser::precedence**([string](#language.types.string) $tok): [void](language.types.void.html)

Declara una regla de precedencia para un token ficticio. Esta regla puede ser utilizada más tarde en reglas de gramática específicas.

### Parámetros

    tok


      El token ficticio.


### Valores devueltos

No se retorna ningún valor.

# Parle\RParser::push

(PECL parle &gt;= 0.7.0)

Parle\RParser::push — Añade una regla de gramática

### Descripción

public **Parle\RParser::push**([string](#language.types.string) $name, [string](#language.types.string) $rule): [int](#language.types.integer)

Añade una regla de gramática. El identificador de producción devuelto puede ser utilizado más tarde en el proceso de análisis para identificar la regla correspondiente.

### Parámetros

    name


      El nombre de la regla.






    rule


      La regla a añadir. La sintaxis es compatible con Bison.


### Valores devueltos

Devuelve un [int](#language.types.integer) representando el índice de la regla.

# Parle\RParser::reset

(PECL parle &gt;= 0.7.1)

Parle\RParser::reset — Reinicializa el estado del analizador

### Descripción

public **Parle\RParser::reset**([int](#language.types.integer) $tokenId = ?): [void](language.types.void.html)

Reinicializa el estado del analizador utilizando el identificador de token dado.

### Parámetros

    tokenId


      El identificador del token.


### Valores devueltos

No se retorna ningún valor.

# Parle\RParser::right

(PECL parle &gt;= 0.7.0)

Parle\RParser::right — Declara un token con asociatividad a la derecha

### Descripción

public **Parle\RParser::right**([string](#language.types.string) $tok): [void](language.types.void.html)

Declara un token con asociatividad a la derecha.

### Parámetros

    tok


      El nombre del token.


### Valores devueltos

No se retorna ningún valor.

# Parle\RParser::sigil

(PECL parle &gt;= 0.7.0)

Parle\RParser::sigil — Recupera una parte correspondiente de una regla

### Descripción

public **Parle\RParser::sigil**([int](#language.types.integer) $idx = ?): [string](#language.types.string)

Recupera una parte correspondiente de una regla. Este método es equivalente a la funcionalidad de pseudo-variable en Bison.

### Parámetros

    idx


      El identificador de correspondencia, basado en cero.


### Valores devueltos

Devuelve una [string](#language.types.string) con la parte correspondiente.

# Parle\RParser::sigilCount

(PECL parle &gt;= 0.8.4)

Parle\RParser::sigilCount — Número de elementos en la regla correspondiente

### Descripción

public **Parle\RParser::sigilCount**(): [int](#language.types.integer)

Devuelve el número de elementos en la regla correspondiente.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [int](#language.types.integer)

# Parle\RParser::sigilName

(PECL parle &gt;= 0.8.4)

Parle\RParser::sigilName — Recupera un nombre de regla o de token

### Descripción

public **Parle\RParser::sigilName**([int](#language.types.integer) $idx): [string](#language.types.string)

Recupera un nombre de regla parcial o de token correspondiente al índice de sigil.

### Parámetros

    idx


      El identificador de correspondencia, basado en cero.


### Valores devueltos

Devuelve una [string](#language.types.string) con la parte correspondiente.

# Parle\RParser::token

(PECL parle &gt;= 0.7.0)

Parle\RParser::token — Declara un token

### Descripción

public **Parle\RParser::token**([string](#language.types.string) $tok): [void](language.types.void.html)

Declara un token para usar en la gramática.

### Parámetros

    tok


      El nombre del token.


### Valores devueltos

No se retorna ningún valor.

# Parle\RParser::tokenId

(PECL parle &gt;= 0.7.0)

Parle\RParser::tokenId — Devuelve el identificador del token

### Descripción

public **Parle\RParser::tokenId**([string](#language.types.string) $tok): [int](#language.types.integer)

Devuelve el identificador del token nombrado.

### Parámetros

    tok


      El nombre utilizado en [Parle\RParser::token()](#parle-rparser.token).


### Valores devueltos

Devuelve un [int](#language.types.integer) que representa el identificador del token.

# Parle\RParser::trace

(PECL parle &gt;= 0.7.0)

Parle\RParser::trace — Rastrea la operación del analizador

### Descripción

public **Parle\RParser::trace**(): [string](#language.types.string)

Recupera la descripción de la operación del analizador en curso. Esto puede ser particularmente útil para estudiar el analizador y optimizar la gramática.

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

Devuelve un [string](#language.types.string) con la información de rastreo.

# Parle\RParser::validate

(PECL parle &gt;= 0.7.0)

Parle\RParser::validate — Valida una entrada

### Descripción

public **Parle\RParser::validate**([string](#language.types.string) $data, [Parle\RLexer](#class.parle-rlexer) $lexer): [bool](#language.types.boolean)

Valida una cadena de entrada. La cadena es analizada internamente, por lo que este método es útil para la validación rápida de la entrada.

### Parámetros

    data


      La cadena a validar.






    lexer


      Un objeto lexer que contiene las reglas de análisis lexical preparadas para la gramática particular.


### Valores devueltos

Devuelve un [bool](#language.types.boolean) que indica si la entrada cumple o no con las reglas definidas.

## Tabla de contenidos

- [Parle\RParser::advance](#parle-rparser.advance) — Procesa la regla siguiente del analizador
- [Parle\RParser::build](#parle-rparser.build) — Finaliza las reglas de gramática
- [Parle\RParser::consume](#parle-rparser.consume) — Consume los datos para el procesamiento
- [Parle\RParser::dump](#parle-rparser.dump) — Muestra la gramática
- [Parle\RParser::errorInfo](#parle-rparser.errorinfo) — Recupera las informaciones de error
- [Parle\RParser::left](#parle-rparser.left) — Declara un token con asociatividad a la izquierda
- [Parle\RParser::nonassoc](#parle-rparser.nonassoc) — Declara un token sin asociatividad
- [Parle\RParser::precedence](#parle-rparser.precedence) — Declara una regla de precedencia
- [Parle\RParser::push](#parle-rparser.push) — Añade una regla de gramática
- [Parle\RParser::reset](#parle-rparser.reset) — Reinicializa el estado del analizador
- [Parle\RParser::right](#parle-rparser.right) — Declara un token con asociatividad a la derecha
- [Parle\RParser::sigil](#parle-rparser.sigil) — Recupera una parte correspondiente de una regla
- [Parle\RParser::sigilCount](#parle-rparser.sigilcount) — Número de elementos en la regla correspondiente
- [Parle\RParser::sigilName](#parle-rparser.sigilname) — Recupera un nombre de regla o de token
- [Parle\RParser::token](#parle-rparser.token) — Declara un token
- [Parle\RParser::tokenId](#parle-rparser.tokenid) — Devuelve el identificador del token
- [Parle\RParser::trace](#parle-rparser.trace) — Rastrea la operación del analizador
- [Parle\RParser::validate](#parle-rparser.validate) — Valida una entrada

# La clase Parle\Stack

(PECL parle &gt;= 0.7.0)

## Introducción

**Parle\Stack** es una pila LIFO. Los elementos son insertados y retirados únicamente de un extremo.

## Sinopsis de la Clase

    ****




      class **Parle\Stack**

     {


    /* Propiedades */

     public
     [bool](#language.types.boolean)
      [$empty](#parle-stack.props.empty) = **[true](#constant.true)**;

    public
     [int](#language.types.integer)
      [$size](#parle-stack.props.size) = 0;

    public
     [mixed](#language.types.mixed)
      [$top](#parle-stack.props.top);


    /* Métodos */

public [pop](#parle-stack.pop)(): [void](language.types.void.html)
public [push](#parle-stack.push)([mixed](#language.types.mixed) $item): [void](language.types.void.html)

}

## Propiedades

     empty

      Si la pila está vacía, en solo lectura.





     size

      Tamaño de la pila, en solo lectura.





     top

      Elemento en la cima de la pila.




# Parle\Stack::pop

(PECL parle &gt;= 0.5.1)

Parle\Stack::pop — Extrae un elemento de la pila

### Descripción

public **Parle\Stack::pop**(): [void](language.types.void.html)

### Parámetros

Esta función no contiene ningún parámetro.

### Valores devueltos

No se retorna ningún valor.

# Parle\Stack::push

(PECL parle &gt;= 0.5.1)

Parle\Stack::push — Añade un elemento a la pila

### Descripción

public **Parle\Stack::push**([mixed](#language.types.mixed) $item): [void](language.types.void.html)

### Parámetros

    item


      La variable a añadir.


### Valores devueltos

No se retorna ningún valor.

## Tabla de contenidos

- [Parle\Stack::pop](#parle-stack.pop) — Extrae un elemento de la pila
- [Parle\Stack::push](#parle-stack.push) — Añade un elemento a la pila

# La clase Parle\Token

(PECL parle &gt;= 0.5.2)

## Introducción

    Esta clase representa un token. El analizador léxico devuelve instancias de esta clase.

## Sinopsis de la Clase

    ****




      class **Parle\Token**

     {

    /* Constantes */

     const
     [int](#language.types.integer)
      [EOI](#parle-token.constants.eoi) = 0;

    const
     [int](#language.types.integer)
      [UNKNOWN](#parle-token.constants.unknown) = -1;

    const
     [int](#language.types.integer)
      [SKIP](#parle-token.constants.skip) = -2;


    /* Propiedades */
    public
     [int](#language.types.integer)
      [$id](#parle-token.props.id);

    public
     [string](#language.types.string)
      [$value](#parle-token.props.value);


    /* Métodos */

}

## Propiedades

     id

      El identificador del token.





     value

      El valor del token.




## Constantes predefinidas

     **[Parle\Token::EOI](#parle-token.constants.eoi)**

      El identificador de token de fin de entrada.






     **[Parle\Token::UNKNOWN](#parle-token.constants.unknown)**

      El identificador de token desconocido.






     **[Parle\Token::SKIP](#parle-token.constants.skip)**

      El identificador de token a ignorar.




# La clase Parle\ErrorInfo

(PECL parle &gt;= 0.5.2)

## Introducción

    La clase representa la información detallada de los errores, tal como se proporciona
    por el método [Parle\Parser::errorInfo()](#parle-parser.errorinfo)

## Sinopsis de la Clase

    ****




      class **Parle\ErrorInfo**

     {

    /* Propiedades */

     public
     [int](#language.types.integer)
      [$id](#parle-errorinfo.props.id);

    public
     [int](#language.types.integer)
      [$position](#parle-errorinfo.props.position);

    public
     [mixed](#language.types.mixed)
      [$token](#parle-errorinfo.props.token);


    /* Métodos */

}

## Propiedades

     id

      Identificador del error.





     position

      Posición en la entrada donde ocurrió el error.





     token


       Si es aplicable, la clase [Parle\Token](#class.parle-token) relativa al error,
       de lo contrario **[null](#constant.null)**.




# La clase Parle\LexerException

(PECL parle &gt;= 0.5.1)

## Introducción

## Sinopsis de la Clase

    ****




      class **Parle\LexerException**



      extends
       [Exception](#class.exception)


     implements
       [Throwable](#class.throwable) {

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

    /* Métodos */



    /* Métodos heredados */

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

# La clase Parle\ParserException

(PECL parle &gt;= 0.5.1)

## Introducción

## Sinopsis de la Clase

    ****




      class **Parle\ParserException**



      extends
       [Exception](#class.exception)


     implements
       [Throwable](#class.throwable) {

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

    /* Métodos */



    /* Métodos heredados */

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

- [Introducción](#intro.parle)
- [Instalación/Configuración](#parle.setup)<li>[Requerimientos](#parle.requirements)
- [Instalación](#parle.installation)
  </li>- [Constantes predefinidas](#parle.constants)
- [Correspondencia de patrón](#parle.pattern.matching) — Correspondencia de patrón Parle
- [Ejemplos](#parle.examples)<li>[Ejemplos de análisis léxico (Lexer)](#parle.examples.lexer)
- [Ejemplos de análisis sintáctico (Parser)](#parle.examples.parser)
  </li>- [Parle\Lexer](#class.parle-lexer) — La clase Parle\Lexer<li>[Parle\Lexer::advance](#parle-lexer.advance) — Avanzar a la regla siguiente del lexer
- [Parle\Lexer::build](#parle-lexer.build) — Finaliza el conjunto de reglas del lexer
- [Parle\Lexer::callout](#parle-lexer.callout) — Define una función de retrollamada de token
- [Parle\Lexer::consume](#parle-lexer.consume) — Pasa los datos para el procesamiento
- [Parle\Lexer::dump](#parle-lexer.dump) — Muestra la máquina de estado
- [Parle\Lexer::getToken](#parle-lexer.gettoken) — Devuelve el token actual
- [Parle\Lexer::insertMacro](#parle-lexer.insertmacro) — Inserta una macro regex
- [Parle\Lexer::push](#parle-lexer.push) — Añade una regla de análisis
- [Parle\Lexer::reset](#parle-lexer.reset) — Reinicializa el analizador léxico
  </li>- [Parle\RLexer](#class.parle-rlexer) — La clase Parle\RLexer<li>[Parle\RLexer::advance](#parle-rlexer.advance) — Procesa la regla siguiente del analizador
- [Parle\RLexer::build](#parle-rlexer.build) — Finaliza el conjunto de reglas del lexer
- [Parle\RLexer::callout](#parle-rlexer.callout) — Define una función de retrollamada de token
- [Parle\RLexer::consume](#parle-rlexer.consume) — Pasa los datos para su procesamiento
- [Parle\RLexer::dump](#parle-rlexer.dump) — Muestra la máquina de estado
- [Parle\RLexer::getToken](#parle-rlexer.gettoken) — Devuelve el token actual
- [Parle\RLexer::insertMacro](#parle-rlexer.insertmacro) — Inserta una macro regex
- [Parle\RLexer::push](#parle-rlexer.push) — Añade una regla de análisis
- [Parle\RLexer::pushState](#parle-rlexer.pushstate) — Empuja un nuevo estado de inicio
- [Parle\RLexer::reset](#parle-rlexer.reset) — Reinicializa el analizador léxico
  </li>- [Parle\Parser](#class.parle-parser) — La clase Parle\Parser<li>[Parle\Parser::advance](#parle-parser.advance) — Procesa la regla siguiente del analizador
- [Parle\Parser::build](#parle-parser.build) — Finaliza las reglas de gramática
- [Parle\Parser::consume](#parle-parser.consume) — Consume los datos para el procesamiento
- [Parle\Parser::dump](#parle-parser.dump) — Muestra la gramática
- [Parle\Parser::errorInfo](#parle-parser.errorinfo) — Recupera las informaciones de error
- [Parle\Parser::left](#parle-parser.left) — Declara un token con asociatividad a la izquierda
- [Parle\Parser::nonassoc](#parle-parser.nonassoc) — Declara un token sin asociatividad
- [Parle\Parser::precedence](#parle-parser.precedence) — Declara una regla de precedencia
- [Parle\Parser::push](#parle-parser.push) — Añade una regla de gramática
- [Parle\Parser::reset](#parle-parser.reset) — Reinicializa el estado del analizador
- [Parle\Parser::right](#parle-parser.right) — Declara un token con asociatividad a la derecha
- [Parle\Parser::sigil](#parle-parser.sigil) — Recupera una parte correspondiente de una regla
- [Parle\Parser::sigilCount](#parle-parser.sigilcount) — Número de elementos en la regla correspondiente
- [Parle\Parser::sigilName](#parle-parser.sigilname) — Recupera un nombre de regla o de token
- [Parle\Parser::token](#parle-parser.token) — Declara un token
- [Parle\Parser::tokenId](#parle-parser.tokenid) — Devuelve el identificador del token
- [Parle\Parser::trace](#parle-parser.trace) — Rastrea la operación del analizador
- [Parle\Parser::validate](#parle-parser.validate) — Valida una entrada
  </li>- [Parle\RParser](#class.parle-rparser) — La clase Parle\RParser<li>[Parle\RParser::advance](#parle-rparser.advance) — Procesa la regla siguiente del analizador
- [Parle\RParser::build](#parle-rparser.build) — Finaliza las reglas de gramática
- [Parle\RParser::consume](#parle-rparser.consume) — Consume los datos para el procesamiento
- [Parle\RParser::dump](#parle-rparser.dump) — Muestra la gramática
- [Parle\RParser::errorInfo](#parle-rparser.errorinfo) — Recupera las informaciones de error
- [Parle\RParser::left](#parle-rparser.left) — Declara un token con asociatividad a la izquierda
- [Parle\RParser::nonassoc](#parle-rparser.nonassoc) — Declara un token sin asociatividad
- [Parle\RParser::precedence](#parle-rparser.precedence) — Declara una regla de precedencia
- [Parle\RParser::push](#parle-rparser.push) — Añade una regla de gramática
- [Parle\RParser::reset](#parle-rparser.reset) — Reinicializa el estado del analizador
- [Parle\RParser::right](#parle-rparser.right) — Declara un token con asociatividad a la derecha
- [Parle\RParser::sigil](#parle-rparser.sigil) — Recupera una parte correspondiente de una regla
- [Parle\RParser::sigilCount](#parle-rparser.sigilcount) — Número de elementos en la regla correspondiente
- [Parle\RParser::sigilName](#parle-rparser.sigilname) — Recupera un nombre de regla o de token
- [Parle\RParser::token](#parle-rparser.token) — Declara un token
- [Parle\RParser::tokenId](#parle-rparser.tokenid) — Devuelve el identificador del token
- [Parle\RParser::trace](#parle-rparser.trace) — Rastrea la operación del analizador
- [Parle\RParser::validate](#parle-rparser.validate) — Valida una entrada
  </li>- [Parle\Stack](#class.parle-stack) — La clase Parle\Stack<li>[Parle\Stack::pop](#parle-stack.pop) — Extrae un elemento de la pila
- [Parle\Stack::push](#parle-stack.push) — Añade un elemento a la pila
  </li>- [Parle\Token](#class.parle-token) — La clase Parle\Token
- [Parle\ErrorInfo](#class.parle-errorinfo) — La clase Parle\ErrorInfo
- [Parle\LexerException](#class.parle-lexerexception) — La clase Parle\LexerException
- [Parle\ParserException](#class.parle-parserexception) — La clase Parle\ParserException
